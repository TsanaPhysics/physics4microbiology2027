#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Bespoke 3D Realistic Illustration Generator for All 35 Sections (Ch 1-12) + Table 1.1
- Every section across Chapters 1-12 gets its own 100% unique, topic-matched 3D scene
  (never reusing the same image across sections).
- Clean sequential figure numbering (ภาพที่ 1.1 ... ภาพที่ 12.3) with NO '8K Deep Skin' label.
"""

import os
import math
import numpy as np
from PIL import Image, ImageDraw, ImageFont

OUT_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/figures/sec_3d"
ARTIFACT_DIR = "/Users/chewathassana/.gemini/antigravity/brain/5adc1603-12c9-4f07-b8b3-e35754ab42b0"
os.makedirs(OUT_DIR, exist_ok=True)


def get_thai_font(size=24, bold=False):
    candidates = [
        "/System/Library/Fonts/Supplemental/ThonburiBold.ttc" if bold else "/System/Library/Fonts/Supplemental/Thonburi.ttc",
        "/System/Library/Fonts/Thonburi.ttc",
        "/Library/Fonts/Arial Unicode.ttf",
        "/System/Library/Fonts/Supplemental/Ayuthaya.ttf",
        "/System/Library/Fonts/Helvetica.ttc",
    ]
    for path in candidates:
        if os.path.exists(path):
            try:
                return ImageFont.truetype(path, size)
            except Exception:
                pass
    return ImageFont.load_default()


def clean_glyphs(text):
    repl = {
        "→": " >> ",
        "⇔": " <=> ",
        "◆": "•",
        "⁻": "-",
        "¹": "1",
        "²": "2",
        "³": "3",
        "⁴": "4",
        "⁵": "5",
        "⁶": "6",
        "⁷": "7",
        "⁸": "8",
        "⁹": "9",
        "⁰": "0",
        "₀": "0",
        "₁": "1",
        "₂": "2",
        "₃": "3",
        "₄": "4",
        "∝": " ~ ",
        "≈": " ~ ",
        "√": "sqrt",
        "Σ": "Sum ",
        "Δ": "d",
        "λ": "lambda ",
        "θ": "theta ",
        "η": "eta ",
        "ρ": "rho ",
        "ε": "eps ",
        "Ω": " Ohm",
        "½": "1/2",
    }
    for k, v in repl.items():
        text = text.replace(k, v)
    return text


# ==============================================================================
# 3D RAYTRACED PBR & SUBSURFACE SCATTERING PRIMITIVES
# ==============================================================================

def make_studio_canvas(w, h, theme="navy_bio", variant=0):
    y, x = np.mgrid[0:h, 0:w].astype(np.float32)
    nx = (x / w) - (0.45 + 0.05 * ((variant % 3) - 1))
    ny = (y / h) - 0.42
    rad = np.sqrt(nx * nx + ny * ny)

    palettes = {
        "navy_bio": ((9, 20, 40), (22, 65, 118), (56, 189, 248)),
        "emerald_cell": ((8, 26, 30), (16, 78, 68), (52, 211, 153)),
        "amber_thermal": ((28, 15, 18), (92, 42, 24), (251, 191, 36)),
        "purple_electro": ((18, 12, 36), (66, 32, 108), (192, 132, 252)),
        "cyan_optics": ((8, 24, 38), (16, 84, 112), (34, 211, 238)),
        "crimson_rad": ((26, 12, 24), (88, 24, 48), (244, 63, 94)),
        "teal_lab": ((7, 24, 32), (18, 76, 86), (45, 212, 191)),
        "indigo_phys": ((12, 16, 42), (44, 52, 120), (129, 140, 248)),
    }
    dark, mid, glow = palettes.get(theme, palettes["navy_bio"])

    img = np.zeros((h, w, 3), dtype=np.float32)
    vignette = np.clip(1.0 - 0.82 * rad, 0.0, 1.0)
    floor_mask = np.clip((y - h * 0.68) / (h * 0.32), 0.0, 1.0)

    for c in range(3):
        base = dark[c] + (mid[c] - dark[c]) * vignette
        base += glow[c] * 0.20 * np.exp(-3.2 * (nx * nx + (ny + 0.08) ** 2))
        base = base * (1.0 - 0.35 * floor_mask) + (mid[c] * 0.45 + glow[c] * 0.14) * floor_mask
        img[:, :, c] = base

    # Perspective 3D studio bench grid
    grid_y = y > h * 0.72
    gy = (y[grid_y] - h * 0.72) / (h * 0.28) + 0.05
    gx = nx[grid_y] / gy
    grid_line = (np.abs(np.sin(gx * (16.0 + (variant % 4) * 2.0))) > 0.965) | (np.abs(np.sin(1.25 / gy)) > 0.955)
    for c in range(3):
        ch = img[:, :, c]
        vals = ch[grid_y]
        vals[grid_line] += glow[c] * 0.18 * (1.0 - gy[grid_line] * 0.6)
        ch[grid_y] = vals

    return np.clip(img, 0, 255).astype(np.uint8)


def render_deepskin_sphere(canvas, cx, cy, radius, base_rgb, sss_rgb=(255, 95, 65),
                           roughness=0.18, metallic=0.0, glass_alpha=1.0, bump_scale=0.12, seed=1):
    h, w, _ = canvas.shape
    r = int(math.ceil(radius))
    x0, x1 = max(0, int(cx - r - 2)), min(w, int(cx + r + 3))
    y0, y1 = max(0, int(cy - r - 2)), min(h, int(cy + r + 3))
    if x1 <= x0 or y1 <= y0:
        return

    yy, xx = np.mgrid[y0:y1, x0:x1].astype(np.float32)
    dx = (xx - cx) / radius
    dy = (yy - cy) / radius
    d2 = dx * dx + dy * dy
    mask = d2 <= 1.0
    if not np.any(mask):
        return

    dz = np.zeros_like(dx)
    dz[mask] = np.sqrt(np.maximum(0.0, 1.0 - d2[mask]))

    if bump_scale > 0:
        freq1, freq2 = 14.0, 31.0
        nx_p = bump_scale * (0.6 * np.sin(dx * freq1 + seed) * np.cos(dy * freq1 - seed) + 0.4 * np.cos(dx * freq2 - dy * freq2 + seed * 1.7))
        ny_p = bump_scale * (0.6 * np.cos(dx * freq1 - seed) * np.sin(dy * freq1 + seed) + 0.4 * np.sin(dx * freq2 + dy * freq2 - seed * 1.3))
        nx, ny, nz = dx + nx_p * dz, dy + ny_p * dz, dz
        norm = np.sqrt(nx * nx + ny * ny + nz * nz + 1e-6)
        nx, ny, nz = nx / norm, ny / norm, nz / norm
    else:
        nx, ny, nz = dx, dy, dz

    lx, ly, lz = -0.48, -0.55, 0.68
    ndotl = nx * lx + ny * ly + nz * lz
    diffuse = np.clip(ndotl, 0.0, 1.0)

    wrap = 0.48
    sss_wrap = np.clip((ndotl + wrap) / ((1.0 + wrap) ** 2), 0.0, 1.0)
    terminator = np.exp(-((ndotl - 0.05) / 0.38) ** 2) * (1.0 - metallic)
    edge_translucency = np.power(np.clip(1.0 - dz, 0.0, 1.0), 1.8) * (1.0 - metallic)
    sss_factor = (0.55 * terminator + 0.45 * edge_translucency + 0.35 * sss_wrap) * (1.0 - metallic)

    hx, hy, hz = lx, ly, lz + 1.0
    hnorm = math.sqrt(hx * hx + hy * hy + hz * hz)
    hx, hy, hz = hx / hnorm, hy / hnorm, hz / hnorm
    ndoth = np.clip(nx * hx + ny * hy + nz * hz, 0.0, 1.0)

    shininess = max(8.0, 180.0 * (1.0 - roughness))
    spec_primary = np.power(ndoth, shininess) * (0.85 + 0.6 * metallic)
    spec_clearcoat = np.power(ndoth, 260.0) * 0.65
    fresnel = np.power(np.clip(1.0 - dz, 0.0, 1.0), 3.0)

    dist = np.sqrt(d2)
    aa = np.clip((1.0 - dist) * radius * 0.85, 0.0, 1.0) * glass_alpha

    sub = canvas[y0:y1, x0:x1].astype(np.float32)
    for c in range(3):
        b_col = base_rgb[c]
        s_col = sss_rgb[c]
        lit = (
            b_col * (0.18 + 0.78 * diffuse)
            + s_col * 0.58 * sss_factor
            + (255.0 if metallic < 0.5 else b_col * 0.6 + 100.0) * spec_primary
            + 255.0 * spec_clearcoat
            + (0.5 * s_col + 125.0) * 0.55 * fresnel
        )
        lit = np.clip(lit, 0.0, 255.0)
        sub[:, :, c] = np.where(mask, sub[:, :, c] * (1.0 - aa) + lit * aa, sub[:, :, c])

    canvas[y0:y1, x0:x1] = sub.astype(np.uint8)


def render_deepskin_capsule(canvas, x1, y1, x2, y2, radius, base_rgb, sss_rgb=(255, 110, 80),
                            roughness=0.16, metallic=0.0, glass_alpha=1.0, bump_scale=0.10, seed=2):
    h, w, _ = canvas.shape
    pad = int(math.ceil(radius + 4))
    bx0, bx1 = max(0, int(min(x1, x2) - pad)), min(w, int(max(x1, x2) + pad))
    by0, by1 = max(0, int(min(y1, y2) - pad)), min(h, int(max(y1, y2) + pad))
    if bx1 <= bx0 or by1 <= by0:
        return

    yy, xx = np.mgrid[by0:by1, bx0:bx1].astype(np.float32)
    vx, vy = float(x2 - x1), float(y2 - y1)
    vlen2 = vx * vx + vy * vy
    if vlen2 < 1e-4:
        render_deepskin_sphere(canvas, x1, y1, radius, base_rgb, sss_rgb, roughness, metallic, glass_alpha, bump_scale, seed)
        return

    t = np.clip(((xx - x1) * vx + (yy - y1) * vy) / vlen2, 0.0, 1.0)
    px, py = x1 + t * vx, y1 + t * vy
    dx, dy = (xx - px) / radius, (yy - py) / radius
    d2 = dx * dx + dy * dy
    mask = d2 <= 1.0
    if not np.any(mask):
        return

    dz = np.zeros_like(dx)
    dz[mask] = np.sqrt(np.maximum(0.0, 1.0 - d2[mask]))

    if bump_scale > 0:
        nx = dx + bump_scale * np.sin(xx * 0.22 + seed) * np.cos(yy * 0.22 - seed) * dz
        ny = dy + bump_scale * np.cos(xx * 0.19 - seed) * np.sin(yy * 0.19 + seed) * dz
        nz = dz
        norm = np.sqrt(nx * nx + ny * ny + nz * nz + 1e-6)
        nx, ny, nz = nx / norm, ny / norm, nz / norm
    else:
        nx, ny, nz = dx, dy, dz

    lx, ly, lz = -0.45, -0.58, 0.67
    ndotl = nx * lx + ny * ly + nz * lz
    diffuse = np.clip(ndotl, 0.0, 1.0)
    terminator = np.exp(-((ndotl - 0.04) / 0.36) ** 2) * (1.0 - metallic)
    edge_trans = np.power(np.clip(1.0 - dz, 0.0, 1.0), 1.7) * (1.0 - metallic)
    sss_factor = (0.55 * terminator + 0.45 * edge_trans) * (1.0 - metallic)

    hx, hy, hz = lx, ly, lz + 1.0
    hnorm = math.sqrt(hx * hx + hy * hy + hz * hz)
    hx, hy, hz = hx / hnorm, hy / hnorm, hz / hnorm
    ndoth = np.clip(nx * hx + ny * hy + nz * hz, 0.0, 1.0)

    shininess = max(10.0, 190.0 * (1.0 - roughness))
    spec = np.power(ndoth, shininess) * (0.85 + 0.55 * metallic)
    clearcoat = np.power(ndoth, 280.0) * 0.65
    fresnel = np.power(np.clip(1.0 - dz, 0.0, 1.0), 2.8)

    dist = np.sqrt(d2)
    aa = np.clip((1.0 - dist) * radius * 0.85, 0.0, 1.0) * glass_alpha

    sub = canvas[by0:by1, bx0:bx1].astype(np.float32)
    for c in range(3):
        b_col = base_rgb[c]
        s_col = sss_rgb[c]
        lit = (
            b_col * (0.18 + 0.78 * diffuse)
            + s_col * 0.58 * sss_factor
            + 255.0 * (spec + clearcoat)
            + (0.5 * s_col + 125.0) * 0.5 * fresnel
        )
        lit = np.clip(lit, 0.0, 255.0)
        sub[:, :, c] = np.where(mask, sub[:, :, c] * (1.0 - aa) + lit * aa, sub[:, :, c])

    canvas[by0:by1, bx0:bx1] = sub.astype(np.uint8)


def render_3d_cylinder_vessel(canvas, cx, y_top, y_bot, radius, body_rgb, liquid_ratio=0.65, liq_rgb=(52, 211, 153), metallic=0.15):
    """Renders a 3D glass/metallic vertical cylinder or test tube/cuvette/beaker with internal liquid."""
    h, w, _ = canvas.shape
    x0, x1 = max(0, int(cx - radius - 2)), min(w, int(cx + radius + 3))
    y0, y1 = max(0, int(y_top)), min(h, int(y_bot))
    if x1 <= x0 or y1 <= y0:
        return
    yy, xx = np.mgrid[y0:y1, x0:x1].astype(np.float32)
    dx = (xx - cx) / radius
    mask = np.abs(dx) <= 1.0
    dz = np.sqrt(np.maximum(0.0, 1.0 - dx * dx))
    lx, lz = -0.52, 0.85
    ndotl = np.clip(dx * lx + dz * lz, 0.0, 1.0)
    spec = np.power(np.clip(dx * (-0.3) + dz * 0.95, 0.0, 1.0), 90.0)
    fresnel = np.power(1.0 - dz, 2.6)

    y_liq = y_bot - (y_bot - y_top) * liquid_ratio
    is_liq = yy >= y_liq

    sub = canvas[y0:y1, x0:x1].astype(np.float32)
    for c in range(3):
        glass_col = body_rgb[c] * (0.25 + 0.65 * ndotl) + 255.0 * 0.75 * spec + 180.0 * fresnel
        l_col = liq_rgb[c] * (0.28 + 0.72 * ndotl) + 255.0 * 0.85 * spec + 140.0 * fresnel
        col = np.where(is_liq, l_col, glass_col)
        alpha = np.where(is_liq, 0.88, 0.48 if metallic < 0.5 else 0.94)
        sub[:, :, c] = np.where(mask, sub[:, :, c] * (1.0 - alpha) + np.clip(col, 0, 255) * alpha, sub[:, :, c])
    canvas[y0:y1, x0:x1] = sub.astype(np.uint8)


def draw_glow_beam(canvas, x1, y1, x2, y2, radius, rgb, intensity=0.85):
    h, w, _ = canvas.shape
    pad = int(radius * 2.5 + 4)
    bx0, bx1 = max(0, int(min(x1, x2) - pad)), min(w, int(max(x1, x2) + pad))
    by0, by1 = max(0, int(min(y1, y2) - pad)), min(h, int(max(y1, y2) + pad))
    if bx1 <= bx0 or by1 <= by0:
        return
    yy, xx = np.mgrid[by0:by1, bx0:bx1].astype(np.float32)
    vx, vy = float(x2 - x1), float(y2 - y1)
    vlen2 = max(1.0, vx * vx + vy * vy)
    t = np.clip(((xx - x1) * vx + (yy - y1) * vy) / vlen2, 0.0, 1.0)
    px, py = x1 + t * vx, y1 + t * vy
    d2 = ((xx - px) ** 2 + (yy - py) ** 2) / (radius * radius)
    glow = np.exp(-1.6 * d2) * intensity
    core = np.exp(-6.5 * d2) * intensity
    sub = canvas[by0:by1, bx0:bx1].astype(np.float32)
    for c in range(3):
        sub[:, :, c] = np.clip(sub[:, :, c] + rgb[c] * glow + 255.0 * 0.65 * core, 0, 255)
    canvas[by0:by1, bx0:bx1] = sub.astype(np.uint8)


# ==============================================================================
# BESPOKE 3D SCENE BUILDER FOR EVERY SECTION (ZERO DUPLICATE IMAGES!)
# ==============================================================================

def render_bespoke_3d_scene(arr, fname):
    """Renders a completely unique 3D laboratory / biophysical scene tailored to `fname`."""
    h, w, _ = arr.shape
    pil = Image.fromarray(arr)
    dr = ImageDraw.Draw(pil, "RGBA")

    if fname == "ch01_s2.jpg":
        # 3D 4-Step Metric Conversion Staircase + 3D Vessels/Cells on Each Step
        steps = [
            (180, 230, 440, 285, (56, 189, 248), "10⁰ (m, L, g)"),
            (510, 300, 770, 355, (52, 211, 153), "10⁻³ milli (mm, mL)"),
            (840, 370, 1100, 425, (251, 191, 36), "10⁻⁶ micro (µm, µL)"),
            (1170, 440, 1430, 495, (192, 132, 252), "10⁻⁹ nano (nm, ng)"),
        ]
        for x0, y0, x1, y1, col, lbl in steps:
            # 3D Extruded block
            dr.polygon([(x0, y0), (x0 + 25, y0 - 22), (x1 + 25, y0 - 22), (x1, y0)], fill=(col[0] // 2, col[1] // 2, col[2] // 2, 230))
            dr.rounded_rectangle([x0, y0, x1, y1], radius=8, fill=(col[0] // 3, col[1] // 3, col[2] // 3, 240), outline=(col[0], col[1], col[2], 255), width=3)
            dr.text((x0 + 22, y0 + 14), clean_glyphs(lbl), font=get_thai_font(19, bold=True), fill=(255, 255, 255, 255))
        arr[:] = np.array(pil)
        # Render 3D objects above each step + glowing conversion arcs
        render_3d_cylinder_vessel(arr, 310, 145, 225, 38, (180, 220, 255), 0.7, (56, 189, 248))
        render_deepskin_sphere(arr, 640, 250, 38, (52, 211, 153), (255, 140, 80), 0.12, 0.0, 0.95, 0.12, 11)
        render_deepskin_capsule(arr, 930, 320, 1015, 330, 26, (251, 191, 36), (255, 90, 60), 0.14, 0.0, 0.95, 0.14, 12)
        render_deepskin_sphere(arr, 1300, 395, 24, (192, 132, 252), (255, 100, 180), 0.10, 0.2, 0.95, 0.18, 13)
        draw_glow_beam(arr, 440, 250, 510, 315, 10, (251, 191, 36), 0.85)
        draw_glow_beam(arr, 770, 320, 840, 385, 10, (251, 191, 36), 0.85)
        draw_glow_beam(arr, 1100, 390, 1170, 455, 10, (251, 191, 36), 0.85)

    elif fname == "ch01_s3.jpg":
        # 3D P1000 Micropipette Two-Stop Plunger + 4-Decimal Digital Analytical Balance
        arr[:] = np.array(pil)
        # Left: First Stop & Second Stop 3D Cylinders
        render_deepskin_capsule(arr, 320, 190, 320, 470, 34, (30, 64, 175), (56, 189, 248), 0.15, 0.3, 0.98, 0.05, 21)
        render_deepskin_capsule(arr, 320, 145, 320, 195, 18, (56, 189, 248), (255, 255, 255), 0.1, 0.5, 0.98, 0.02, 22)
        render_deepskin_capsule(arr, 780, 210, 780, 470, 34, (30, 64, 175), (251, 191, 36), 0.15, 0.3, 0.98, 0.05, 23)
        render_deepskin_capsule(arr, 780, 180, 780, 215, 18, (244, 63, 94), (255, 180, 180), 0.1, 0.5, 0.98, 0.02, 24)
        # Droplet
        render_deepskin_sphere(arr, 780, 515, 18, (56, 189, 248), (180, 240, 255), 0.08, 0.0, 0.9, 0.02, 25)
        # Right: 3D Analytical Balance + Beaker
        render_3d_cylinder_vessel(arr, 1260, 250, 410, 62, (200, 230, 255), 0.65, (56, 189, 248))
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        dr.rounded_rectangle([1130, 410, 1390, 515], radius=12, fill=(15, 23, 42, 245), outline=(52, 211, 153, 255), width=3)
        dr.rounded_rectangle([1165, 435, 1355, 490], radius=6, fill=(6, 48, 36, 255), outline=(52, 211, 153, 220), width=2)
        dr.text((1190, 446), "1.0000 g", font=get_thai_font(28, bold=True), fill=(52, 211, 153, 255))
        arr[:] = np.array(pil)

    elif fname == "ch01_s4.jpg":
        # 3D Lab 1: Vernier Caliper + Petri Dish, Micrometer + Glass Slide, Pipette Calibration
        render_deepskin_sphere(arr, 340, 360, 88, (16, 185, 129), (255, 190, 90), 0.14, 0.0, 0.88, 0.12, 31)
        render_deepskin_capsule(arr, 210, 255, 490, 255, 16, (148, 163, 184), (255, 255, 255), 0.12, 0.85, 0.98, 0.02, 32)
        render_deepskin_capsule(arr, 720, 355, 910, 355, 28, (56, 189, 248), (200, 240, 255), 0.08, 0.1, 0.75, 0.02, 33)
        render_deepskin_sphere(arr, 815, 355, 48, (245, 158, 11), (255, 220, 120), 0.15, 0.75, 0.96, 0.04, 34)
        render_3d_cylinder_vessel(arr, 1270, 240, 480, 56, (180, 220, 255), 0.50, (251, 191, 36))

    elif fname == "ch02_s1.jpg":
        # 3D Winding Scalar Path (s = 120 um) vs Straight Vector Displacement (d = 30 um)
        # Draw winding glowing 3D path + straight vector arrow
        pts = [(260, 430), (390, 260), (540, 460), (710, 240), (890, 440), (1060, 260), (1260, 340)]
        for (x0, y0), (x1, y1) in zip(pts[:-1], pts[1:]):
            draw_glow_beam(arr, x0, y0, x1, y1, 9, (251, 191, 36), 0.75)
        # Straight vector displacement d
        draw_glow_beam(arr, 260, 430, 1260, 340, 14, (56, 189, 248), 0.95)
        render_deepskin_capsule(arr, 230, 425, 300, 435, 32, (56, 189, 248), (255, 110, 80), 0.14, 0.0, 0.95, 0.14, 41)
        render_deepskin_sphere(arr, 1290, 340, 68, (52, 211, 153), (255, 200, 90), 0.12, 0.0, 0.92, 0.16, 42)

    elif fname == "ch02_s3.jpg":
        # 3D Lab 2: Bubble/Bead Velocity Tube + Cold (10°C) vs Warm (45°C) Petri Dish Dye Diffusion
        render_3d_cylinder_vessel(arr, 350, 190, 520, 44, (180, 225, 255), 0.88, (34, 211, 238))
        for by in [460, 390, 320, 250]:
            render_deepskin_sphere(arr, 350, by, 18, (251, 191, 36), (255, 255, 255), 0.1, 0.2, 0.95, 0.05, 51)
        # Cold Petri Dish (small blue diffusion ring)
        render_deepskin_sphere(arr, 820, 375, 95, (30, 58, 138), (56, 189, 248), 0.2, 0.0, 0.65, 0.05, 52)
        render_deepskin_sphere(arr, 820, 375, 32, (56, 189, 248), (180, 230, 255), 0.1, 0.0, 0.95, 0.08, 53)
        # Warm Petri Dish (wide rapid diffusion ring)
        render_deepskin_sphere(arr, 1270, 375, 95, (124, 45, 18), (251, 191, 36), 0.2, 0.0, 0.65, 0.05, 54)
        render_deepskin_sphere(arr, 1270, 375, 76, (245, 158, 11), (255, 90, 60), 0.12, 0.0, 0.92, 0.10, 55)

    elif fname == "ch03_s1.jpg":
        # 3D Biophysical Newton's 3 Laws: Overdamped Drag (Law 1), F=ma (Law 2), Flagella Action-Reaction (Law 3)
        render_deepskin_sphere(arr, 350, 365, 62, (56, 189, 248), (255, 110, 80), 0.14, 0.0, 0.95, 0.15, 61)
        draw_glow_beam(arr, 230, 365, 470, 365, 10, (56, 189, 248), 0.8)
        render_deepskin_capsule(arr, 750, 365, 870, 365, 46, (251, 191, 36), (255, 90, 50), 0.14, 0.0, 0.95, 0.14, 62)
        draw_glow_beam(arr, 870, 365, 1010, 365, 14, (251, 191, 36), 0.9)
        # Action-Reaction Bacterium
        render_deepskin_capsule(arr, 1230, 365, 1350, 365, 44, (52, 211, 153), (255, 120, 80), 0.12, 0.0, 0.95, 0.14, 63)
        draw_glow_beam(arr, 1210, 365, 1090, 365, 12, (244, 63, 94), 0.9)
        draw_glow_beam(arr, 1360, 365, 1480, 365, 12, (52, 211, 153), 0.9)

    elif fname == "ch03_s3.jpg":
        # 3D Lab 3: Falling-Sphere Viscometer (Water vs. Glycerol Graduated Cylinders)
        render_3d_cylinder_vessel(arr, 430, 185, 535, 64, (180, 225, 255), 0.85, (56, 189, 248))
        render_deepskin_sphere(arr, 430, 470, 24, (203, 213, 225), (255, 255, 255), 0.08, 0.9, 1.0, 0.02, 71)
        draw_glow_beam(arr, 430, 250, 430, 450, 8, (56, 189, 248), 0.85)

        render_3d_cylinder_vessel(arr, 980, 185, 535, 64, (255, 235, 180), 0.85, (245, 158, 11))
        render_deepskin_sphere(arr, 980, 290, 24, (203, 213, 225), (255, 255, 255), 0.08, 0.9, 1.0, 0.02, 72)
        draw_glow_beam(arr, 980, 240, 980, 285, 8, (251, 191, 36), 0.85)
        # Stopwatch / Laser timer on right
        render_deepskin_sphere(arr, 1330, 365, 74, (16, 185, 129), (56, 189, 248), 0.15, 0.4, 0.95, 0.05, 73)

    elif fname == "ch04_s1.jpg":
        # 3D Energy Conversion: Electrical Power (W) -> Motor Work (J) -> Rotor Rotational Kinetic Energy
        render_deepskin_capsule(arr, 260, 365, 440, 365, 55, (56, 189, 248), (255, 180, 80), 0.15, 0.65, 0.98, 0.05, 81)
        draw_glow_beam(arr, 450, 365, 720, 365, 16, (251, 191, 36), 0.95)
        render_deepskin_sphere(arr, 810, 365, 86, (16, 185, 129), (56, 189, 248), 0.12, 0.55, 0.98, 0.08, 82)
        for ang in range(0, 360, 60):
            rad = math.radians(ang)
            render_deepskin_sphere(arr, 810 + 52 * math.cos(rad), 365 + 52 * math.sin(rad), 16, (251, 191, 36), (255, 255, 255), 0.1, 0.3, 0.98, 0.02, 83)
        draw_glow_beam(arr, 910, 365, 1180, 365, 16, (52, 211, 153), 0.95)
        render_deepskin_sphere(arr, 1270, 365, 72, (245, 158, 11), (255, 90, 60), 0.14, 0.2, 0.95, 0.10, 84)

    elif fname == "ch04_s3.jpg":
        # 3D Lab 4: Rotor Radius Measurement (r_cm = 10 cm) & Supernatant vs. Yeast Pellet Tubes
        render_deepskin_sphere(arr, 360, 370, 92, (71, 85, 105), (56, 189, 248), 0.18, 0.75, 0.98, 0.04, 91)
        draw_glow_beam(arr, 360, 370, 450, 370, 10, (56, 189, 248), 0.95)
        # Balanced pair of microcentrifuge tubes
        render_3d_cylinder_vessel(arr, 810, 230, 500, 46, (200, 230, 255), 0.75, (52, 211, 153))
        # Separated Tube (Supernatant + Compacted Bottom Pellet)
        render_3d_cylinder_vessel(arr, 1270, 230, 500, 52, (200, 230, 255), 0.75, (125, 211, 252))
        render_deepskin_sphere(arr, 1270, 480, 38, (245, 158, 11), (255, 90, 50), 0.12, 0.0, 0.98, 0.16, 92)

    elif fname == "ch05_s1.jpg":
        # 3D Specific Heat of Water (Q = mcΔT) & Latent Heat of Agar Media Boiling (Q = mL)
        render_3d_cylinder_vessel(arr, 350, 220, 500, 72, (200, 230, 255), 0.70, (251, 191, 36))
        draw_glow_beam(arr, 270, 515, 430, 515, 16, (244, 63, 94), 0.95)
        # Heating curve plateau in middle
        pts = [(640, 470), (760, 310), (920, 310), (1020, 210)]
        for (x0, y0), (x1, y1) in zip(pts[:-1], pts[1:]):
            draw_glow_beam(arr, x0, y0, x1, y1, 12, (56, 189, 248), 0.95)
        # Steam condensation on endospore on right
        render_deepskin_sphere(arr, 1270, 370, 68, (244, 63, 94), (251, 191, 36), 0.12, 0.0, 0.95, 0.16, 101)
        for sx, sy in [(1190, 290), (1350, 290), (1270, 260)]:
            render_deepskin_sphere(arr, sx, sy, 22, (125, 211, 252), (255, 255, 255), 0.08, 0.0, 0.85, 0.05, 102)

    elif fname == "ch05_s3.jpg":
        # 3D Lab 5: Insulated Calorimeter + 3-Shelf 37.0°C Incubator Thermal Mapping + 50°C Water Bath
        render_3d_cylinder_vessel(arr, 350, 230, 500, 66, (245, 158, 11), 0.65, (56, 189, 248), metallic=0.6)
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        # 3-Shelf Incubator in center
        dr.rounded_rectangle([670, 200, 950, 520], radius=12, fill=(15, 32, 56, 235), outline=(52, 211, 153, 255), width=3)
        for sy, temp_txt in [(280, "Top: 37.1 °C"), (370, "Mid: 37.0 °C"), (460, "Bot: 36.8 °C")]:
            dr.line([(690, sy), (930, sy)], fill=(56, 189, 248, 220), width=3)
            dr.text((735, sy - 28), temp_txt, font=get_thai_font(18, bold=True), fill=(52, 211, 153, 255))
        arr[:] = np.array(pil)
        render_3d_cylinder_vessel(arr, 1270, 260, 500, 74, (56, 189, 248), 0.72, (251, 191, 36))

    elif fname == "ch06_s1.jpg":
        # 3D Bourdon Pressure Gauge (P_atm = 14.7 psi, P_gauge = 15 psi, P_abs = 29.7 psi)
        render_deepskin_sphere(arr, 350, 370, 78, (56, 189, 248), (200, 240, 255), 0.14, 0.2, 0.9, 0.08, 111)
        render_deepskin_sphere(arr, 810, 365, 96, (226, 232, 240), (251, 191, 36), 0.12, 0.7, 0.98, 0.02, 112)
        draw_glow_beam(arr, 810, 365, 865, 295, 10, (244, 63, 94), 0.95)
        render_3d_cylinder_vessel(arr, 1270, 215, 510, 68, (244, 63, 94), 0.75, (251, 191, 36), metallic=0.7)

    elif fname == "ch06_s3.jpg":
        # 3D Lab 6: Low-Pressure Syringe Boiling at 70°C + Autoclave Indicator Tape Dark Stripes
        render_deepskin_capsule(arr, 230, 365, 470, 365, 48, (125, 211, 252), (56, 189, 248), 0.10, 0.1, 0.85, 0.04, 121)
        for bx in [300, 345, 390]:
            render_deepskin_sphere(arr, bx, 365, 16, (251, 191, 36), (255, 255, 255), 0.08, 0.0, 0.95, 0.04, 122)
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        # Autoclave Indicator Tape with diagonal black stripes
        dr.rounded_rectangle([670, 285, 950, 445], radius=10, fill=(254, 243, 199, 245), outline=(251, 191, 36, 255), width=3)
        for sx in range(690, 930, 42):
            dr.line([(sx, 440), (sx + 45, 290)], fill=(24, 24, 27, 245), width=12)
        arr[:] = np.array(pil)
        render_3d_cylinder_vessel(arr, 1270, 215, 510, 68, (52, 211, 153), 0.7, (56, 189, 248), metallic=0.65)

    elif fname == "ch07_s1.jpg":
        # 3D Coulomb's Law: Crystal Violet Cation (+q1) Attracting Bacterial Cell Wall Phosphate (-q2)
        draw_glow_beam(arr, 380, 365, 1220, 365, 20, (192, 132, 252), 0.85)
        render_deepskin_sphere(arr, 350, 365, 78, (56, 189, 248), (192, 132, 252), 0.12, 0.1, 0.96, 0.14, 131)
        render_deepskin_sphere(arr, 810, 365, 42, (251, 191, 36), (255, 255, 255), 0.10, 0.3, 0.95, 0.08, 132)
        render_deepskin_sphere(arr, 1270, 365, 84, (244, 63, 94), (251, 191, 36), 0.12, 0.1, 0.96, 0.16, 133)

    elif fname == "ch07_s2.jpg":
        # 3D Basic Dye (+ Direct Staining) vs. Acidic Dye (- Negative Capsule Staining)
        # Left: Gram-positive/negative cell wall with negative charges
        render_deepskin_capsule(arr, 260, 365, 440, 365, 52, (168, 85, 247), (255, 110, 80), 0.12, 0.0, 0.96, 0.16, 141)
        # Middle: Basic dye cations tightly bound to cell surface
        render_deepskin_capsule(arr, 720, 365, 900, 365, 54, (59, 130, 246), (192, 132, 252), 0.10, 0.1, 0.98, 0.14, 142)
        # Right: Acidic dye repelled around clear halo capsule
        render_deepskin_sphere(arr, 1270, 365, 96, (251, 191, 36), (244, 63, 94), 0.25, 0.0, 0.55, 0.08, 143)
        render_deepskin_capsule(arr, 1210, 365, 1330, 365, 38, (248, 250, 252), (56, 189, 248), 0.08, 0.0, 0.98, 0.06, 144)

    elif fname == "ch07_s3.jpg":
        # 3D Lab 7: Cellulose Filter Strips — Methylene Blue (+) Retained vs. Eosin (-) Washed Out
        render_3d_cylinder_vessel(arr, 350, 220, 510, 62, (180, 225, 255), 0.45, (56, 189, 248))
        render_3d_cylinder_vessel(arr, 810, 210, 515, 58, (240, 249, 255), 0.30, (59, 130, 246))
        render_deepskin_sphere(arr, 810, 395, 36, (37, 99, 235), (192, 132, 252), 0.12, 0.0, 0.98, 0.12, 151)
        render_3d_cylinder_vessel(arr, 1270, 210, 515, 58, (240, 249, 255), 0.30, (244, 63, 94))
        draw_glow_beam(arr, 1270, 430, 1270, 245, 24, (251, 191, 36), 0.9)

    elif fname == "ch08_s1.jpg":
        # 3D Electrophoresis DC Power Supply (100 V), Ionic Current (I = V/R), Joule Heating (P = I²R)
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        dr.rounded_rectangle([210, 255, 490, 475], radius=14, fill=(15, 23, 42, 245), outline=(56, 189, 248, 255), width=3)
        dr.text((255, 295), "DC 100 V", font=get_thai_font(30, bold=True), fill=(56, 189, 248, 255))
        dr.text((255, 355), "I = 50 mA", font=get_thai_font(26, bold=True), fill=(52, 211, 153, 255))
        dr.text((255, 410), "P = 5.0 W", font=get_thai_font(24, bold=True), fill=(251, 191, 36, 255))
        arr[:] = np.array(pil)
        draw_glow_beam(arr, 500, 365, 1120, 365, 18, (52, 211, 153), 0.9)
        render_deepskin_sphere(arr, 810, 365, 68, (52, 211, 153), (56, 189, 248), 0.12, 0.2, 0.95, 0.12, 161)
        render_deepskin_sphere(arr, 1270, 365, 76, (251, 191, 36), (244, 63, 94), 0.12, 0.1, 0.95, 0.15, 162)

    elif fname == "ch08_s2.jpg":
        # 3D Agarose Gel Molecular Sieve: Negative DNA Migrating from Black Cathode (-) to Red Anode (+)
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        dr.rounded_rectangle([190, 235, 1410, 505], radius=14, fill=(14, 38, 64, 225), outline=(56, 189, 248, 240), width=3)
        # Black Cathode (-) on left, Red Anode (+) on right
        dr.rectangle([220, 255, 265, 485], fill=(30, 41, 59, 255), outline=(148, 163, 184, 255), width=2)
        dr.rectangle([1335, 255, 1380, 485], fill=(225, 29, 72, 255), outline=(251, 113, 133, 255), width=2)
        # Fluorescent DNA bands across lanes
        for lane_y in [290, 365, 440]:
            dr.rounded_rectangle([320, lane_y - 14, 355, lane_y + 14], radius=4, fill=(56, 189, 248, 240))
            dr.rounded_rectangle([620, lane_y - 12, 665, lane_y + 12], radius=4, fill=(192, 132, 252, 255))
            dr.rounded_rectangle([920, lane_y - 12, 965, lane_y + 12], radius=4, fill=(52, 211, 153, 255))
            dr.rounded_rectangle([1190, lane_y - 12, 1235, lane_y + 12], radius=4, fill=(251, 191, 36, 255))
        arr[:] = np.array(pil)
        draw_glow_beam(arr, 350, 365, 1250, 365, 14, (52, 211, 153), 0.75)

    elif fname == "ch08_s3.jpg":
        # 3D Lab 8: Ohm's Law Multimeter + Agarose Dye Band Distance Measurement (mm)
        render_deepskin_sphere(arr, 350, 370, 76, (56, 189, 248), (192, 132, 252), 0.14, 0.5, 0.96, 0.06, 171)
        pil = Image.fromarray(arr)
        dr = ImageDraw.Draw(pil, "RGBA")
        dr.rounded_rectangle([620, 250, 1020, 490], radius=12, fill=(15, 23, 42, 235), outline=(52, 211, 153, 255), width=3)
        for bx, col in [(690, (192, 132, 252)), (790, (56, 189, 248)), (890, (52, 211, 153)), (960, (251, 191, 36))]:
            dr.rounded_rectangle([bx, 280, bx + 24, 460], radius=5, fill=(col[0], col[1], col[2], 245))
        arr[:] = np.array(pil)
        render_deepskin_sphere(arr, 1270, 370, 74, (251, 191, 36), (244, 63, 94), 0.12, 0.3, 0.96, 0.08, 172)

    elif fname == "ch09_s1.jpg":
        # 3D Optical Media Comparison: Air (n=1.000), Water/Cytoplasm (n=1.333), Glass & Immersion Oil (n=1.515)
        render_3d_cylinder_vessel(arr, 350, 220, 505, 72, (180, 225, 255), 0.85, (56, 189, 248))
        render_3d_cylinder_vessel(arr, 810, 220, 505, 72, (167, 243, 208), 0.85, (52, 211, 153))
        render_3d_cylinder_vessel(arr, 1270, 220, 505, 72, (254, 240, 138), 0.85, (251, 191, 36))
        draw_glow_beam(arr, 160, 310, 520, 310, 14, (56, 189, 248), 0.95)
        draw_glow_beam(arr, 630, 350, 980, 350, 14, (52, 211, 153), 0.95)
        draw_glow_beam(arr, 1090, 390, 1440, 390, 14, (251, 191, 36), 0.95)

    elif fname == "ch09_s3.jpg":
        # 3D Lab 9: Semicircular Acrylic Block Laser Protractor & Handheld Brix Refractometer
        render_deepskin_sphere(arr, 350, 375, 86, (56, 189, 248), (255, 255, 255), 0.08, 0.1, 0.72, 0.02, 181)
        draw_glow_beam(arr, 210, 260, 350, 375, 10, (244, 63, 94), 0.95)
        draw_glow_beam(arr, 350, 375, 470, 495, 10, (244, 63, 94), 0.95)
        # Handheld Brix Refractometer telescope tube
        render_deepskin_capsule(arr, 690, 365, 950, 365, 44, (52, 211, 153), (56, 189, 248), 0.15, 0.65, 0.98, 0.04, 182)
        # Brix scale circle on right
        render_deepskin_sphere(arr, 1270, 365, 84, (251, 191, 36), (56, 189, 248), 0.12, 0.2, 0.95, 0.04, 183)

    elif fname == "ch10_s1.jpg":
        # 3D Compound Microscope Dual Convex Lens System: Objective (4x-100x) x Ocular (10x) = 1,000x
        render_deepskin_capsule(arr, 310, 290, 390, 440, 48, (56, 189, 248), (255, 255, 255), 0.08, 0.2, 0.82, 0.02, 191)
        render_deepskin_capsule(arr, 770, 270, 850, 460, 56, (52, 211, 153), (255, 255, 255), 0.08, 0.2, 0.82, 0.02, 192)
        draw_glow_beam(arr, 200, 365, 1380, 365, 16, (251, 191, 36), 0.9)
        render_deepskin_sphere(arr, 1270, 365, 82, (251, 191, 36), (192, 132, 252), 0.12, 0.1, 0.95, 0.14, 193)

    elif fname == "ch10_s3.jpg":
        # 3D Lab 10: Gram-Stained S. aureus (Purple Cocci) & E. coli (Pink Bacilli) under 100x Oil Immersion
        # Left: 4 Objective lenses
        for ox, col in [(290, (244, 63, 94)), (340, (251, 191, 36)), (390, (56, 189, 248)), (440, (248, 250, 252))]:
            render_deepskin_capsule(arr, ox, 260, ox, 440, 18, col, (255, 255, 255), 0.12, 0.75, 0.98, 0.02, 201)
        # Center: 100x Oil drop contact
        render_deepskin_sphere(arr, 810, 400, 56, (251, 191, 36), (255, 240, 150), 0.06, 0.0, 0.88, 0.02, 202)
        render_deepskin_capsule(arr, 810, 230, 810, 365, 42, (226, 232, 240), (56, 189, 248), 0.10, 0.85, 0.98, 0.02, 203)
        # Right: 1000x Field of view with Gram+ purple cocci & Gram- pink rods
        for cx, cy in [(1220, 330), (1260, 350), (1240, 390), (1285, 325)]:
            render_deepskin_sphere(arr, cx, cy, 20, (147, 51, 234), (216, 180, 254), 0.12, 0.0, 0.98, 0.12, 204)
        render_deepskin_capsule(arr, 1290, 410, 1350, 430, 18, (244, 63, 94), (255, 160, 180), 0.12, 0.0, 0.98, 0.12, 205)

    elif fname == "ch11_s2.jpg":
        # 3D Stepwise Halving Decay (100% -> 50% -> 25% -> 12.5%) & Inverse-Square Law (I ~ 1/r²)
        for idx_s, (sx, rad, col) in enumerate([(280, 76, (56, 189, 248)), (530, 56, (52, 211, 153)), (760, 40, (251, 191, 36)), (960, 28, (244, 63, 94))]):
            render_deepskin_sphere(arr, sx, 370, rad, col, (255, 140, 80), 0.12, 0.1, 0.96, 0.14, 210 + idx_s)
        draw_glow_beam(arr, 280, 370, 960, 370, 10, (52, 211, 153), 0.8)
        # Inverse square UV cone on right
        draw_glow_beam(arr, 1120, 370, 1430, 260, 14, (192, 132, 252), 0.9)
        draw_glow_beam(arr, 1120, 370, 1430, 480, 14, (192, 132, 252), 0.9)
        render_deepskin_sphere(arr, 1120, 370, 38, (192, 132, 252), (255, 255, 255), 0.08, 0.2, 0.98, 0.05, 215)

    elif fname == "ch11_s3.jpg":
        # 3D Lab 11: 100-Coin Half-Life Decay Curve + UV Radiometer Distance Check (10, 20, 40 cm)
        pts = [(240, 240), (350, 360), (460, 425), (570, 462), (680, 482)]
        for (x0, y0), (x1, y1) in zip(pts[:-1], pts[1:]):
            draw_glow_beam(arr, x0, y0, x1, y1, 11, (56, 189, 248), 0.95)
        for x0, y0 in pts:
            render_deepskin_sphere(arr, x0, y0, 18, (251, 191, 36), (255, 255, 255), 0.1, 0.7, 0.98, 0.04, 221)
        draw_glow_beam(arr, 800, 370, 1360, 370, 16, (192, 132, 252), 0.85)
        for rx in [860, 1060, 1280]:
            render_deepskin_capsule(arr, rx, 310, rx, 430, 22, (52, 211, 153), (56, 189, 248), 0.12, 0.5, 0.96, 0.04, 222)

    elif fname == "ch12_s1.jpg":
        # 3D Spectrophotometer Optical Bench: 600 nm Light Source (I0) -> 1 cm Cuvette Mie Scattering -> Detector (OD600)
        render_deepskin_sphere(arr, 310, 365, 62, (251, 191, 36), (255, 255, 200), 0.08, 0.1, 0.98, 0.04, 231)
        draw_glow_beam(arr, 370, 365, 740, 365, 20, (251, 191, 36), 0.95)
        render_3d_cylinder_vessel(arr, 810, 215, 510, 68, (200, 240, 255), 0.78, (52, 211, 153))
        for cx, cy in [(790, 330), (825, 365), (800, 410), (830, 445)]:
            render_deepskin_capsule(arr, cx - 14, cy, cx + 14, cy + 8, 11, (251, 191, 36), (255, 90, 60), 0.12, 0.0, 0.95, 0.12, 232)
        draw_glow_beam(arr, 880, 365, 1210, 365, 9, (251, 191, 36), 0.65)
        render_deepskin_capsule(arr, 1230, 290, 1320, 440, 46, (56, 189, 248), (52, 211, 153), 0.14, 0.6, 0.98, 0.04, 233)

    elif fname == "ch12_s2.jpg":
        # 3D Lab 12-13: 5-Cuvette Serial Dilution Rack (Blank 0%, 20%, 40%, 60%, 80%, 100%) + Standard Curve
        dilutions = [
            (260, 0.12, (186, 230, 253)),
            (430, 0.28, (125, 211, 252)),
            (600, 0.45, (52, 211, 153)),
            (770, 0.62, (16, 185, 129)),
            (940, 0.78, (245, 158, 11)),
            (1110, 0.92, (217, 119, 6)),
        ]
        for cx, alpha_turb, col in dilutions:
            render_3d_cylinder_vessel(arr, cx, 235, 505, 42, (220, 240, 255), 0.76, col)
        # Linear calibration line on right
        draw_glow_beam(arr, 1190, 480, 1430, 250, 12, (52, 211, 153), 0.95)
        for lx, ly in [(1210, 460), (1265, 408), (1320, 355), (1375, 302), (1425, 255)]:
            render_deepskin_sphere(arr, lx, ly, 14, (251, 191, 36), (255, 255, 255), 0.1, 0.3, 0.98, 0.04, 241)


def add_hud_chrome_and_labels(pil_img, badge_code, title_th, subtitle_en, callouts, formulas):
    """Adds a clean academic header bar, callout pills, and bottom key-equation dock (NO '8K Deep Skin' text)."""
    w, h = pil_img.size
    overlay = Image.new("RGBA", (w, h), (0, 0, 0, 0))
    draw = ImageDraw.Draw(overlay)

    badge_code = clean_glyphs(badge_code)
    title_th = clean_glyphs(title_th)
    subtitle_en = clean_glyphs(subtitle_en)

    f_badge = get_thai_font(18, bold=True)
    f_title = get_thai_font(23, bold=True)
    f_sub = get_thai_font(16, bold=False)
    f_call = get_thai_font(17, bold=True)
    f_form = get_thai_font(16, bold=True)

    # Top translucent dark glass header bar
    draw.rounded_rectangle([16, 12, w - 16, 84], radius=12, fill=(7, 18, 36, 222), outline=(56, 189, 248, 195), width=2)
    # Clean Figure & Section Pill (NO '8K Deep Skin' label)
    draw.rounded_rectangle([26, 20, 310, 76], radius=8, fill=(14, 116, 144, 245), outline=(125, 211, 252, 230), width=1)
    draw.text((40, 24), badge_code, font=f_badge, fill=(255, 255, 255, 255))
    draw.text((40, 49), "ฟิสิกส์สำหรับจุลชีววิทยา", font=get_thai_font(14, bold=True), fill=(186, 230, 253, 255))

    # Title & Subtitle
    draw.text((328, 20), title_th, font=f_title, fill=(255, 255, 255, 255))
    draw.text((328, 51), subtitle_en, font=f_sub, fill=(148, 210, 255, 240))

    # Draw callouts into 3 non-overlapping horizontal zones
    num_c = max(1, len(callouts))
    zone_w = (w - 48) // num_c
    for idx, (px, py, tx, ty, text_str, accent) in enumerate(callouts):
        text_str = clean_glyphs(text_str)
        bbox = draw.textbbox((0, 0), text_str, font=f_call)
        tw = bbox[2] - bbox[0] + 22
        th = bbox[3] - bbox[1] + 12

        z_left = 24 + idx * zone_w
        z_right = z_left + zone_w - 12
        bx0 = max(z_left, min(z_right - tw, int(tx - tw // 2)))
        by0 = 100 if (idx % 2 == 0) else 114

        pin_x = int(bx0 + tw // 2)
        pin_y = int(py)
        draw.line([(pin_x, by0 + th), (pin_x, pin_y)], fill=(accent[0], accent[1], accent[2], 215), width=2)
        draw.ellipse([pin_x - 6, pin_y - 6, pin_x + 6, pin_y + 6],
                     fill=(255, 255, 255, 255), outline=(accent[0], accent[1], accent[2], 255), width=3)

        draw.rounded_rectangle([bx0, by0, bx0 + tw, by0 + th], radius=8,
                               fill=(8, 19, 38, 228), outline=(accent[0], accent[1], accent[2], 240), width=2)
        draw.text((bx0 + 11, by0 + 4), text_str, font=f_call, fill=(248, 250, 252, 255))

    # Bottom formula / key-insight dock
    if formulas:
        draw.rounded_rectangle([16, h - 54, w - 16, h - 12], radius=10,
                               fill=(8, 19, 38, 228), outline=(52, 211, 153, 195), width=2)
        col_w = (w - 56) // len(formulas)
        for idx, f_str in enumerate(formulas):
            f_str = clean_glyphs(f_str)
            fx = 30 + idx * col_w
            if idx > 0:
                draw.line([(fx - 12, h - 46), (fx - 12, h - 20)], fill=(56, 189, 248, 110), width=1)
            draw.text((fx, h - 44), f"• {f_str}", font=f_form, fill=(167, 243, 208, 255))

    draw.rounded_rectangle([4, 4, w - 5, h - 5], radius=16, outline=(56, 189, 248, 130), width=2)
    return Image.alpha_composite(pil_img.convert("RGBA"), overlay).convert("RGB")


def find_exact_artifact_image(prefix_str):
    """Finds an artifact image ONLY if `prefix_str` is explicitly provided (never falls back to duplicate images)."""
    if not prefix_str or not os.path.exists(ARTIFACT_DIR):
        return None
    matches = [
        os.path.join(ARTIFACT_DIR, f)
        for f in os.listdir(ARTIFACT_DIR)
        if f.startswith(prefix_str) and (f.endswith(".jpg") or f.endswith(".png"))
    ]
    if matches:
        matches.sort(key=lambda p: os.path.getmtime(p), reverse=True)
        return matches[0]
    return None


def build_table1_prefix_images():
    configs = [
        (
            "prefix_milli.jpg",
            "prefix_milli_ai",
            "มิลลิ (milli, 10⁻³)",
            "โคโลนีแบคทีเรีย (1–5 mm) และอาหารเหลว (5–10 mL)",
            "คำอุปสรรค มิลลิ • milli (10⁻³)",
            (16, 185, 129),
            "navy_bio",
        ),
        (
            "prefix_micro.jpg",
            "prefix_micro_ai",
            "ไมโคร (micro, 10⁻⁶)",
            "เซลล์ E. coli (2 µm), ยีสต์ (6 µm) และไมโครปิเปต (µL)",
            "คำอุปสรรค ไมโคร • micro (10⁻⁶)",
            (245, 158, 11),
            "emerald_cell",
        ),
        (
            "prefix_nano.jpg",
            "prefix_nano_ai",
            "นาโน (nano, 10⁻⁹)",
            "อนุภาคไวรัส/ฟาจ (20–300 nm) และลำแสง OD600 (600 nm)",
            "คำอุปสรรค นาโน • nano (10⁻⁹)",
            (168, 85, 247),
            "purple_electro",
        ),
    ]

    for out_name, ai_prefix, title_th, sub_th, badge, accent, theme in configs:
        w, h = 900, 520
        ai_path = find_exact_artifact_image(ai_prefix)
        if ai_path and os.path.exists(ai_path):
            base_im = Image.open(ai_path).convert("RGB").resize((w, h), Image.Resampling.LANCZOS)
        else:
            arr = make_studio_canvas(w, h, theme)
            render_deepskin_sphere(arr, w * 0.35, h * 0.48, 110, accent, (255, 120, 80), 0.12, 0.0, 0.95, 0.16, 3)
            base_im = Image.fromarray(arr)

        ov = Image.new("RGBA", (w, h), (0, 0, 0, 0))
        dr = ImageDraw.Draw(ov)
        badge = clean_glyphs(badge)
        title_th = clean_glyphs(title_th)
        sub_th = clean_glyphs(sub_th)
        dr.rounded_rectangle([14, 14, 415, 56], radius=10, fill=(8, 18, 36, 220), outline=(accent[0], accent[1], accent[2], 240), width=2)
        dr.text((26, 22), badge, font=get_thai_font(18, bold=True), fill=(255, 255, 255, 255))
        dr.rounded_rectangle([14, h - 86, w - 14, h - 12], radius=10, fill=(8, 18, 36, 225), outline=(accent[0], accent[1], accent[2], 220), width=2)
        dr.text((28, h - 78), title_th, font=get_thai_font(22, bold=True), fill=(accent[0], accent[1], accent[2], 255))
        dr.text((28, h - 46), sub_th, font=get_thai_font(18, bold=False), fill=(241, 245, 249, 255))
        dr.rounded_rectangle([3, 3, w - 4, h - 4], radius=14, outline=(accent[0], accent[1], accent[2], 180), width=2)

        final_im = Image.alpha_composite(base_im.convert("RGBA"), ov).convert("RGB")
        out_path = os.path.join(OUT_DIR, out_name)
        final_im.save(out_path, quality=94)
        print("Saved Table 1.1 prefix image:", out_path)


# ==============================================================================
# 35 UNIQUE SECTION ILLUSTRATIONS (EACH AI HERO USED AT MOST ONCE!)
# ==============================================================================

SECTION_SPECS = [
    # CHAPTER 1 (Figures 1.1, 1.2, 1.4, 1.5; Figure 1.3 is TikZ Ladder)
    ("ch01_s1.jpg", "ภาพที่ 1.1 • หัวข้อ 1.1", "ch01_hero_ai", "navy_bio",
     "ระบบหน่วยเอสไอ (SI Units) และสเกลขนาดในโลกจุลชีววิทยา",
     "Scale Comparison: Macro Colony (mm) >> Micro Cell (µm) >> Nano Virus (nm)",
     [(290, 290, 250, 145, "โคโลนีบนจานวุ้น (1–5 mm)", (52, 211, 153)),
      (780, 320, 780, 145, "เซลล์แบคทีเรีย E. coli (2 µm)", (56, 189, 248)),
      (1280, 310, 1280, 145, "อนุภาคไวรัสฟาจ (20–200 nm)", (244, 114, 182))],
     ["หน่วยฐาน SI: m, kg, s, K, mol", "milli (10⁻³) | micro (10⁻⁶) | nano (10⁻⁹)", "T(K) = T(°C) + 273.15"]),

    ("ch01_s2.jpg", "ภาพที่ 1.2 • หัวข้อ 1.2", None, "emerald_cell",
     "เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละ 1,000 เท่า และการเจือจางเชื้อ",
     "Step-by-1,000 Metric Conversion Ladder & Micropipette Volume Scaling",
     [(310, 250, 290, 138, "หน่วยฐาน (m, L, g)", (56, 189, 248)),
      (640, 320, 640, 155, "มิลลิ (mm, mL) ×1,000", (52, 211, 153)),
      (980, 380, 980, 175, "ไมโคร (µm, µL) ×1,000", (251, 191, 36)),
      (1310, 430, 1310, 195, "นาโน (nm, ng) ×1,000", (192, 132, 252))],
     ["ใหญ่ → เล็ก: คูณ 1,000 (เลื่อนจุดขวา 3 ตำแหน่ง)", "เล็ก → ใหญ่: หาร 1,000 (เลื่อนจุดซ้าย 3 ตำแหน่ง)", "1 mL = 1,000 µL"]),

    ("ch01_s3.jpg", "ภาพที่ 1.4 • หัวข้อ 1.3", None, "indigo_phys",
     "เลขนัยสำคัญ ความแม่น (Accuracy) ความเที่ยง (Precision) และไมโครปิเปต 2 จังหวะ",
     "P1000 Two-Stop Plunger Mechanics & Gravimetric Calibration on 0.0001 g Balance",
     [(320, 260, 320, 145, "จังหวะที่ 1 (First Stop): ดูดสารพอดี", (56, 189, 248)),
      (780, 280, 780, 150, "จังหวะที่ 2 (Second Stop): ปล่อยสารหมดทิป", (251, 191, 36)),
      (1260, 340, 1260, 145, "ชั่งน้ำกลั่น 1,000 µL = 1.0000 g", (52, 211, 153))],
     ["%Error = (|ค่าจริง - ค่ามาตรฐาน| / ค่ามาตรฐาน) × 100%", "น้ำบริสุทธิ์ 100 µL = 0.1000 g", "ห้ามกดเลย First Stop ขณะดูดเชื้อ"]),

    ("ch01_s4.jpg", "ภาพที่ 1.5 • หัวข้อ 1.4", None, "cyan_optics",
     "ปฏิบัติการที่ 1: เวอร์เนียร์คาลิปเปอร์ ไมโครมิเตอร์ และการสอบเทียบไมโครปิเปต",
     "Lab 1 Apparatus: Vernier Caliper (0.05 mm), Micrometer (0.01 mm) & P1000 Verification",
     [(340, 330, 340, 150, "เวอร์เนียร์วัดจานเพาะเชื้อ (mm → µm)", (56, 189, 248)),
      (815, 350, 815, 150, "ไมโครมิเตอร์วัดความหนาสไลด์แก้ว", (52, 211, 153)),
      (1270, 330, 1270, 150, "สอบเทียบปิเปต 500 µL (0.5000 g)", (251, 191, 36))],
     ["Vernier Resolution = 0.05 mm", "Micrometer Resolution = 0.01 mm", "P1000 Set 500 µL → 0.5000 g Standard"]),

    # CHAPTER 2
    ("ch02_s1.jpg", "ภาพที่ 2.1 • หัวข้อ 2.1", None, "navy_bio",
     "ปริมาณสเกลาร์ (ระยะทาง s) และปริมาณเวกเตอร์ (การกระจัด d) ของเซลล์จุลินทรีย์",
     "Flagellated Bacterial Trajectory: Winding Scalar Path (s) vs. Directed Vector Displacement (d)",
     [(390, 300, 360, 148, "เส้นทางว่ายคดเคี้ยว: ระยะทาง s = 120 µm", (251, 191, 36)),
      (810, 370, 810, 145, "เวกเตอร์การกระจัดลัพธ์ d = 30 µm", (56, 189, 248)),
      (1290, 320, 1280, 148, "แหล่งสารอาหารดึงดูด (Chemoattractant)", (52, 211, 153))],
     ["อัตราเร็วเฉลี่ย v = s / t (สเกลาร์)", "ขนาดความเร็วเฉลี่ย |v_avg| = d / t (เวกเตอร์)", "เวกเตอร์ต้องระบุทั้งขนาดและทิศทาง"]),

    ("ch02_s2.jpg", "ภาพที่ 2.2 • หัวข้อ 2.2", "ch02_hero_ai", "emerald_cell",
     "กลไกการว่ายแบบพุ่งสลับหมุนสุ่ม (Run & Tumble) เทียบกับการสั่นแบบบราวน์",
     "Flagellar Motor Run-and-Tumble Chemotaxis vs. Thermal Brownian Motion",
     [(360, 330, 360, 148, "Brownian Motion: โมเลกุลน้ำชนสุ่ม (d ≈ 0)", (248, 113, 113)),
      (820, 320, 820, 148, "ช่วง Run: แฟลกเจลลาหมุนทวนเข็มรวมเป็นมัด", (52, 211, 153)),
      (1280, 340, 1260, 148, "การแพร่ยาปฏิชีวนะ x_rms = √(2Dt)", (56, 189, 248))],
     ["Brownian Motion: เซลล์สั่นอยู่กับที่ ไม่ได้เคลื่อนที่จริง", "Chemotaxis: ยืดเวลาช่วง Run มุ่งหาอาหาร", "ระยะแพร่เฉลี่ย x_rms = √(2Dt)"]),

    ("ch02_s3.jpg", "ภาพที่ 2.4 • หัวข้อ 2.3", None, "teal_lab",
     "ปฏิบัติการที่ 2: การวัดอัตราเร็วและการแพร่ของสีย้อมตามอุณหภูมิ",
     "Lab 2 Setup: Bubble/Bead Velocity Tube & Thermal Dye Diffusion in Petri Dishes",
     [(350, 340, 350, 148, "หลอดวัดอัตราเร็ว v = s / t คงที่", (56, 189, 248)),
      (820, 340, 820, 148, "การแพร่สีในน้ำเย็น 10 °C (แพร่ช้า)", (125, 211, 252)),
      (1270, 340, 1270, 148, "การแพร่สีในน้ำอุ่น 45 °C (พลังงานจลน์สูง)", (251, 191, 36))],
     ["ความชันกราฟ s–t คืออัตราเร็ว v", "อุณหภูมิ T สูงขึ้น → สัมประสิทธิ์การแพร่ D สูงขึ้น", "แยกแยะ Brownian Motion ในสไลด์หยดแขวน"]),

    # CHAPTER 3
    ("ch03_s1.jpg", "ภาพที่ 3.1 • หัวข้อ 3.1", None, "indigo_phys",
     "กฎการเคลื่อนที่สามข้อของนิวตันในโลกเรย์โนลด์ต่ำของเซลล์จุลินทรีย์",
     "Biophysical Newton's Laws: Low-Inertia Overdamped Regime & Flagellar Action-Reaction",
     [(350, 330, 350, 148, "กฎข้อ 1: มวลเซลล์ ~10⁻¹⁵ kg ความหนืดชนะความเฉื่อย", (56, 189, 248)),
      (810, 330, 810, 148, "กฎข้อ 2: แรงลัพธ์ F_net = m a", (251, 191, 36)),
      (1290, 330, 1260, 148, "กฎข้อ 3: แฟลกเจลลาผลักน้ำ (F_action = -F_reaction)", (52, 211, 153))],
     ["กฎข้อ 1: ΣF = 0 (สมดุลแรง)", "กฎข้อ 2: F_net = m a (หน่วยนิวตัน N)", "กฎข้อ 3: แรงกิริยา = แรงปฏิกิริยาทิศตรงข้าม"]),

    ("ch03_s2.jpg", "ภาพที่ 3.2 • หัวข้อ 3.2", "ch03_hero_ai", "emerald_cell",
     "แรงหนืด กฎของสโตกส์ (Stokes' Law) และการตกตะกอนของเซลล์ยีสต์และแบคทีเรีย",
     "Free-Body Force Balance: Gravity (Fg) vs. Buoyancy (Fb) + Stokes Drag (6πηrv)",
     [(360, 340, 360, 148, "แรงหนืดต้านการจม F_drag = 6πηrv (ชี้ขึ้น)", (52, 211, 153)),
      (810, 330, 810, 148, "แรงลอยตัว F_b (ชี้ขึ้น) ต้านแรงโน้มถ่วง F_g (ชี้ลง)", (56, 189, 248)),
      (1270, 330, 1260, 148, "ยีสต์ (r=2.5 µm) จมเร็วกว่าแบคทีเรีย (r=0.5 µm) 25 เท่า!", (251, 191, 36))],
     ["แรงหนืดสโตกส์: F_drag = 6 π η r v", "สมดุลความเร็วสุดท้าย: F_drag + F_b = F_g", "อัตราเร็วตกตะกอน v_t ∝ r² (แปรผันกับรัศมีกำลังสอง)"]),

    ("ch03_s3.jpg", "ภาพที่ 3.4 • หัวข้อ 3.3", None, "cyan_optics",
     "ปฏิบัติการที่ 3: การหาสัมประสิทธิ์ความหนืดของของเหลวด้วยวิธีปล่อยลูกเหล็ก",
     "Lab 3 Falling-Sphere Viscometry: Measuring Terminal Velocity (vt) in Water vs. Glycerol",
     [(430, 330, 380, 148, "กระบอกตวงน้ำกลั่น (ความหนืด η ต่ำ จมเร็ว)", (56, 189, 248)),
      (980, 290, 900, 148, "กระบอกตวงกลีเซอรีน (ความหนืด η สูง จมช้า)", (251, 191, 36)),
      (1330, 330, 1300, 148, "จับเวลาผ่านระยะ s = 20 cm หาค่า v_t = s / t", (52, 211, 153))],
     ["v_t = s / t (วัดเมื่อลูกเหล็กเคลื่อนที่ด้วยความเร็วคงที่)", "η = 2 r² (ρ_p - ρ_f) g / (9 v_t)", "หน่วยความหนืด: Pa·s หรือ mPa·s"]),

    # CHAPTER 4
    ("ch04_s1.jpg", "ภาพที่ 4.1 • หัวข้อ 4.1", None, "navy_bio",
     "งาน (Work) พลังงานกล (Mechanical Energy) และกำลังไฟฟ้าของเครื่องมือห้องแล็บ",
     "Energy Conversion in Lab Instruments: Electrical Power (W) to Rotational Kinetic Energy",
     [(350, 330, 350, 148, "งานกล W = F s (หน่วยจูล J)", (56, 189, 248)),
      (810, 320, 810, 148, "พลังงานจลน์การหมุนโรเตอร์ E_k = ½ m v²", (52, 211, 153)),
      (1270, 330, 1260, 148, "กำลังเครื่องมือ P = W / t = E / t (วัตต์ W)", (251, 191, 36))],
     ["งาน W = F s (N·m หรือ J)", "พลังงานจลน์ E_k = ½ m v² | พลังงานศักย์ E_p = m g h", "กำลัง P = W / t (1 W = 1 J/s)"]),

    ("ch04_s2.jpg", "ภาพที่ 4.2 • หัวข้อ 4.2", "ch04_hero_ai", "emerald_cell",
     "ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge): การแปลงค่า RPM เป็น RCF (×g) และสมดุลโรเตอร์",
     "Cutaway Fixed-Angle Rotor: Symmetrical Tube Balancing (ΣFc = 0) & RCF Pellet Compaction",
     [(350, 330, 350, 148, "วางหลอดมวลเท่ากันตรงข้ามกันเสมอ (ΣF_c = 0)", (52, 211, 153)),
      (810, 320, 810, 148, "รัศมีโรเตอร์ r_cm วัดจากแกนหมุนถึงก้นหลอด", (56, 189, 248)),
      (1270, 330, 1260, 148, "เม็ดตะกอนเซลล์ (Pellet) อัดแน่นที่ก้นหลอด", (251, 191, 36))],
     ["RCF (×g) = 1.118 × 10⁻⁵ × r_cm × (RPM)²", "ถ้า RPM เพิ่ม 2 เท่า → แรงเหวี่ยง RCF เพิ่มขึ้น 2² = 4 เท่า", "รายงานวิจัยต้องระบุเป็นค่า ×g เสมอ"]),

    ("ch04_s3.jpg", "ภาพที่ 4.4 • หัวข้อ 4.3", None, "teal_lab",
     "ปฏิบัติการที่ 4: การวัดรัศมีโรเตอร์ คำนวณค่า RCF และปั่นแยกตะกอนเซลล์ยีสต์",
     "Lab 4 Microcentrifuge Pellet & Supernatant Separation at 2,000 / 4,000 / 6,000 RPM",
     [(360, 340, 350, 148, "วัดรัศมีโรเตอร์ r_cm ด้วยไม้บรรทัด", (56, 189, 248)),
      (810, 330, 810, 148, "หลอดถ่วงดุล (Balance Tube) มวลเท่ากันเป๊ะ", (52, 211, 153)),
      (1270, 340, 1260, 148, "แยกระหว่างส่วนใส (Supernatant) กับตะกอน (Pellet)", (251, 191, 36))],
     ["r_cm = 10 cm, 5,000 rpm → RCF = 2,795 ×g", "ห้ามเดินเครื่องโดยไม่ใส่หลอดถ่วงสมดุล", "รอโรเตอร์หยุดสนิทก่อนเปิดฝาเครื่อง"]),

    # CHAPTER 5
    ("ch05_s1.jpg", "ภาพที่ 5.1 • หัวข้อ 5.1", None, "amber_thermal",
     "อุณหภูมิ ความจุความร้อนจำเพาะของน้ำ (c) และความร้อนแฝงในอาหารเลี้ยงเชื้อ",
     "Thermal Physics of Culture Media: Sensible Heat (Q = mcΔT) vs. Latent Heat (Q = mL)",
     [(350, 330, 350, 148, "การต้มละลายวุ้น: Q = m c ΔT (เปลี่ยนอุณหภูมิ)", (251, 191, 36)),
      (810, 310, 810, 148, "น้ำมีค่า c = 4.184 J/(g·°C) ช่วยรักษาอุณหภูมิเซลล์", (56, 189, 248)),
      (1270, 330, 1260, 148, "ไอน้ำควบแน่นคายความร้อนแฝง L_v = 2,260 J/g", (248, 113, 113))],
     ["T(K) = T(°C) + 273.15", "เปลี่ยนอุณหภูมิ: Q = m c ΔT", "เปลี่ยนสถานะที่ T คงที่: Q = m L"]),

    ("ch05_s2.jpg", "ภาพที่ 5.2 • หัวข้อ 5.2", "ch05_hero_ai", "amber_thermal",
     "กลไกการถ่ายโอนความร้อน 3 รูปแบบในห้องปฏิบัติการจุลชีววิทยา",
     "Heat Transfer Modes: Water Bath Conduction, Incubator Convection & Bunsen Flame Radiation",
     [(350, 330, 350, 148, "1. การนำความร้อน (Conduction): อ่าง Water Bath", (56, 189, 248)),
      (810, 320, 810, 148, "2. การพาความร้อน (Convection): ตู้อบ Incubator 37°C", (52, 211, 153)),
      (1270, 330, 1260, 148, "3. การแผ่รังสี (Radiation): ลนไฟเข็มเขี่ยเชื้อปลอดเชื้อ", (251, 191, 36))],
     ["Water Bath นำความร้อนสู่วุ้นได้เร็วกว่าอากาศถึง 25 เท่า", "Incubator ใช้การพาความร้อนหมุนเวียนอากาศอุ่น", "Bunsen Burner แผ่รังสีอินฟราเรดและสร้างกระแสอากาศยกตัว"]),

    ("ch05_s3.jpg", "ภาพที่ 5.4 • หัวข้อ 5.3", None, "navy_bio",
     "ปฏิบัติการที่ 5: สมดุลความร้อนแคลอริมิเตอร์และเสถียรภาพอุณหภูมิตู้อบ 37.0 °C",
     "Lab 5 Multi-Point Thermal Mapping Inside 37.0 °C Microbiological Incubator & Calorimetry",
     [(350, 330, 350, 148, "แคลอริมิเตอร์: Q_ลด = Q_เพิ่ม (สมดุลความร้อน)", (56, 189, 248)),
      (810, 260, 810, 148, "วัดอุณหภูมิ 3 ชั้นในตู้ Incubator 37.0 °C", (52, 211, 153)),
      (1270, 330, 1260, 148, "อ่างน้ำอุ่น Water Bath 48–50 °C เลี้ยงวุ้นไม่ให้แข็งตัว", (251, 191, 36))],
     ["สมดุลความร้อน: m₁c(T₂ - T_mix) = m₂c(T_mix - T₁)", "Mesophiles เจริญดีที่สุดที่ 37.0 ± 0.5 °C", "ห้ามวางจานเพาะเชื้อบังช่องพัดลมหมุนเวียนอากาศ"]),

    # CHAPTER 6
    ("ch06_s1.jpg", "ภาพที่ 6.1 • หัวข้อ 6.1", None, "amber_thermal",
     "ความดันเกจ (Gauge Pressure) ความดันสัมบูรณ์ และกฎของแก๊สในภาชนะปิด",
     "Bourdon Pressure Gauge Mechanics & Gay-Lussac's Pressure-Temperature Law (P/T = const)",
     [(350, 330, 350, 148, "ความดันบรรยากาศ P_atm = 1 atm ≈ 14.7 psi", (56, 189, 248)),
      (810, 300, 810, 148, "หน้าปัดอ่านค่าความดันเกจ P_gauge = 15 psi", (251, 191, 36)),
      (1270, 330, 1260, 148, "ความดันสัมบูรณ์จริง P_abs = 14.7 + 15 = 29.7 psi", (248, 113, 113))],
     ["P_abs = P_atm + P_gauge", "1 atm = 101.3 kPa ≈ 14.7 psi", "กฎเกย์-ลูสแซก: P₁ / T₁ = P₂ / T₂ (ใช้หน่วยเคลวิน K เสมอ)"]),

    ("ch06_s2.jpg", "ภาพที่ 6.2 • หัวข้อ 6.2", "ch06_hero_ai_clean", "crimson_rad",
     "ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave): ทำไมต้อง 121 °C ที่ความดันเกจ 15 psi",
     "Bacillus Endospore Denaturation by Saturated Steam Condensation at 121 °C, 15 psi",
     [(350, 330, 350, 148, "ความดันเกจ 15 psi ยกจุดเดือดน้ำขึ้นไปที่ 121 °C", (251, 191, 36)),
      (810, 320, 810, 148, "ไอน้ำอิ่มตัวควบแน่นคายความร้อนแฝงทำลายเอนโดสปอร์", (248, 113, 113)),
      (1270, 330, 1260, 148, "ต้องไล่อากาศออกให้หมด 100% ก่อนปิดวาล์วอัดความดัน", (52, 211, 153))],
     ["0 psi → น้ำเดือด 100 °C (ฆ่าสปอร์ไม่ได้)", "15 psi (ไอน้ำล้วน) → 121 °C นาน 15–20 นาที (สปอร์ตาย 100%)", "คลายฝาขวดเกลียวครึ่งรอบเสมอเพื่อป้องกันขวดระเบิด"]),

    ("ch06_s3.jpg", "ภาพที่ 6.4 • หัวข้อ 6.3", None, "teal_lab",
     "ปฏิบัติการที่ 6: การเดือดที่ความดันต่ำและการตรวจสอบรอบทำงานจริงของ Autoclave",
     "Lab 6 Autoclave Sterilization Cycle Verification: Low-Pressure Boiling & Indicator Tape",
     [(350, 330, 350, 148, "น้ำอุ่น 70 °C เดือดได้เมื่อดึงกระบอกฉีดยาลดความดัน", (56, 189, 248)),
      (810, 300, 810, 148, "เทป Autoclave Tape เปลี่ยนเป็นแถบสีดำเมื่อถึง 121 °C", (251, 191, 36)),
      (1270, 330, 1260, 148, "รอความดันเกจลงถึง 0 psi และ T < 80 °C ก่อนเปิดฝา", (52, 211, 153))],
     ["ความดันลดลง → จุดเดือดลดลง", "ความดันเพิ่มขึ้น (15 psi) → จุดเดือดเพิ่มขึ้น (121 °C)", "ห้ามเปิดฝาขณะมีแรงดัน (ระวัง Superheated Boiling)"]),

    # CHAPTER 7
    ("ch07_s1.jpg", "ภาพที่ 7.1 • หัวข้อ 7.1", None, "purple_electro",
     "ประจุไฟฟ้าและกฎของคูลอมบ์ (Coulomb's Law) ในระดับโมเลกุลชีวภาพ",
     "Electrostatic Force Interaction (Fe = k|q1q2|/r²) Between Dye Cations and Cell Wall Anions",
     [(350, 320, 350, 148, "ไอออนสีย้อมประจุบวก (+q₁) เช่น Crystal Violet", (56, 189, 248)),
      (810, 330, 810, 148, "แรงดึงดูดทางไฟฟ้า F_e ∝ 1 / r² พุ่งเข้าหากัน", (192, 132, 252)),
      (1270, 320, 1260, 148, "หมู่ฟอสเฟตประจุลบ (-q₂) บนผนังเซลล์แบคทีเรีย", (248, 113, 113))],
     ["กฎของคูลอมบ์: F_e = k |q₁ q₂| / r²", "ประจุต่างชนิดดึงดูดกัน | ประจุชนิดเดียวกันผลักกัน", "ระยะห่าง r ลดลง 3 เท่า → แรงดึงดูดเพิ่มขึ้น 3² = 9 เท่า"]),

    ("ch07_s2.jpg", "ภาพที่ 7.2 • หัวข้อ 7.2", None, "indigo_phys",
     "ฟิสิกส์ของการย้อมสีแบคทีเรีย: สีย้อมประจุบวก (Basic Dye) เทียบกับสีย้อมประจุลบ (Acidic Dye)",
     "Bacterial Cell Wall Surface Charge (pH 7) in Direct Staining vs. Negative Capsule Staining",
     [(350, 330, 350, 148, "ผนังเซลล์แบคทีเรียมีประจุสุทธิเป็นลบ (-) จากหมู่ PO₄³⁻", (192, 132, 252)),
      (810, 330, 810, 148, "Basic Dye (+): ดูดติดตัวเซลล์โดยตรง (ย้อมแกรม/ย้อมเดี่ยว)", (56, 189, 248)),
      (1270, 310, 1260, 148, "Acidic Dye (-): ถูกผลักออก ย้อมพื้นหลังมืดเพื่อดูแคปซูลใส", (251, 191, 36))],
     ["Basic Dyes (+): Crystal Violet, Methylene Blue, Safranin", "Acidic Dyes (-): Nigrosin, India Ink, Eosin", "การย้อมแคปซูลใช้แรงผลักระหว่างประจุลบกับประจุลบ"]),

    ("ch07_s3.jpg", "ภาพที่ 7.4 • หัวข้อ 7.3", None, "navy_bio",
     "ปฏิบัติการที่ 7: ไฟฟ้าสถิตและการยึดเกาะของสีย้อมประจุบวกและประจุลบบนเส้นใยเซลลูโลส",
     "Lab 7 Electrostatic Dye Binding Assay: Methylene Blue (+) Retention vs. Eosin (-) Washout",
     [(350, 320, 350, 148, "เส้นใยเซลลูโลสมีประจุผิวเป็นลบจำลองผนังเซลล์", (56, 189, 248)),
      (810, 320, 810, 148, "Methylene Blue (+) ยึดเกาะแน่น ไม่ถูกน้ำชะหลุด", (192, 132, 252)),
      (1270, 320, 1260, 148, "Eosin (-) ถูกแรงไฟฟ้าผลัก จึงถูกน้ำชะเคลื่อนที่ไปไกล", (251, 191, 36))],
     ["แรงคูลอมบ์ยึดสีย้อมประจุบวกไว้กับผนังเซลล์ประจุลบ", "การล้างน้ำ (Washing) ไม่สามารถชะสีประจุบวกออกได้ง่าย", "อธิบายกลไกพื้นฐานของการย้อมสีจุลินทรีย์ทุกชนิด"]),

    # CHAPTER 8
    ("ch08_s1.jpg", "ภาพที่ 8.1 • หัวข้อ 8.1", None, "purple_electro",
     "กระแสไฟฟ้า ความต้านทาน กฎของโอห์ม (V = IR) และกำลังความร้อนในสารละลายบัฟเฟอร์",
     "Electrophoresis Power Supply Circuit: Voltage (V), Ionic Current (I), Resistance (R) & Joule Heating",
     [(350, 260, 350, 148, "แหล่งจ่ายไฟกระแสตรง V = 100 V", (56, 189, 248)),
      (810, 310, 810, 148, "ไอออนในบัฟเฟอร์ TAE/TBE นำกระแส I = V / R", (52, 211, 153)),
      (1270, 310, 1260, 148, "กำลังความร้อนจูล P = V I = I² R (ระวังวุ้นละลาย!)", (251, 191, 36))],
     ["กฎของโอห์ม: V = I R  ⇔  I = V / R  ⇔  R = V / I", "กำลังไฟฟ้า: P = V I = I² R (หน่วยวัตต์ W)", "1 A = 1,000 mA (เช่น 50 mA = 0.05 A)"]),

    ("ch08_s2.jpg", "ภาพที่ 8.2 • หัวข้อ 8.2", None, "emerald_cell",
     "ฟิสิกส์ของเจลอิเล็กโทรโฟรีซิส (Agarose Gel Electrophoresis) ในการแยกขนาดดีเอ็นเอ",
     "Agarose Molecular Sieve: Negative DNA (PO4³⁻) Migrating 'Run to Red' (+ Anode)",
     [(340, 290, 340, 148, "หยด DNA ฝั่งขั้วลบสีดำ (Cathode -) เสมอ", (56, 189, 248)),
      (645, 290, 650, 148, "DNA ชิ้นใหญ่ติดตาข่ายวุ้น จึงเคลื่อนที่ได้ช้า (อยู่ใกล้หลุม)", (192, 132, 252)),
      (1210, 290, 1210, 148, "DNA ชิ้นเล็กคล่องตัว วิ่งเข้าหาขั้วบวกสีแดง (+) ได้ไกลสุด", (52, 211, 153))],
     ["DNA มีประจุสุทธิเป็นลบ (-) จากหมู่ฟอสเฟต PO₄³⁻", "หลักจำ: Run to Red (วิ่งจากขั้วลบสีดำ ไปขั้วบวกสีแดง)", "ห้ามใช้น้ำกลั่นแทนบัฟเฟอร์ TAE/TBE เด็ดขาด"]),

    ("ch08_s3.jpg", "ภาพที่ 8.4 • หัวข้อ 8.3", None, "navy_bio",
     "ปฏิบัติการที่ 8: การตรวจสอบกฎของโอห์มและการแยกแถบสีมาตรฐานในแผ่นวุ้นอะกาโรส",
     "Lab 8 Gel Electrophoresis Chamber Run at 100 V & UV Transilluminator DNA Band Analysis",
     [(350, 310, 350, 148, "วัดค่ากระแส I (mA) ที่แรงดัน V = 50 V และ 100 V", (56, 189, 248)),
      (810, 270, 810, 148, "แถบสีโมเลกุลเล็กเคลื่อนที่ไปใกล้ขั้วบวกได้ระยะทางมากกว่า", (52, 211, 153)),
      (1270, 310, 1260, 148, "ปิดฝาครอบนิรภัยก่อนเปิดสวิตช์จ่ายไฟ 100 V ทุกครั้ง", (251, 191, 36))],
     ["R = V / I = 100 V / 0.05 A = 2,000 Ω", "P = V I = 100 V × 0.05 A = 5.0 W", "วัดระยะทางเคลื่อนที่ของแถบสีในหน่วยมิลลิเมตร (mm)"]),

    # CHAPTER 9
    ("ch09_s1.jpg", "ภาพที่ 9.1 • หัวข้อ 9.1", None, "cyan_optics",
     "ธรรมชาติของคลื่นแสงและดัชนีหักเห (Refractive Index, n = c/v) ของตัวกลางชีวภาพ",
     "Optical Media Comparison: Air (n=1.00), Water/Cytoplasm (n=1.33), Glass & Immersion Oil (n=1.515)",
     [(350, 250, 350, 148, "อากาศ n = 1.000 (แสงเดินทางเร็วสุด c = 3×10⁸ m/s)", (56, 189, 248)),
      (810, 250, 810, 148, "น้ำและไซโทพลาซึมเซลล์สด n ≈ 1.333 (จึงดูใสกลืนกัน)", (52, 211, 153)),
      (1270, 250, 1260, 148, "กระจกสไลด์และน้ำมันช่วยส่อง n = 1.515 เท่ากันเป๊ะ!", (251, 191, 36))],
     ["ดัชนีหักเห: n = c / v  ⇔  v = c / n", "แสงที่ตามองเห็น: λ = 400 nm (ม่วง) ถึง 700 nm (แดง)", "ค่า n ยิ่งมาก แสงยิ่งเดินทางช้าลง"]),

    ("ch09_s2.jpg", "ภาพที่ 9.2 • หัวข้อ 9.2", "ch09_hero_ai", "navy_bio",
     "กฎการสะท้อนและกฎการหักเหของแสง (Snell's Law) ฉบับเข้าใจง่ายไม่ต้องจำตรีโกณมิติ",
     "Laser Ray Refraction Across Interfaces: Bending Toward vs. Away from the Normal Line",
     [(350, 330, 350, 148, "จาก n น้อย (อากาศ) → n มาก (แก้ว): เบนเข้าหาเส้นฉาก", (52, 211, 153)),
      (810, 320, 810, 148, "จาก n มาก (แก้ว) → n น้อย (อากาศ): เบนหนีออกจากเส้นฉาก", (248, 113, 113)),
      (1270, 330, 1260, 148, "ถ้า n₁ = n₂ (แก้วสู่น้ำมัน 1.515): แสงพุ่งตรงไม่หักเหเลย!", (251, 191, 36))],
     ["กฎการสะท้อน: มุมตกกระทบ = มุมสะท้อน", "กฎของสเนลล์: n₁ sin θ₁ = n₂ sin θ₂", "รอยต่อสไลด์แก้วสู่อากาศทำให้แสงหักเหหนีออกจากหน้าเลนส์"]),

    ("ch09_s3.jpg", "ภาพที่ 9.4 • หัวข้อ 9.3", None, "emerald_cell",
     "ปฏิบัติการที่ 9: การหักเหของลำแสงเลเซอร์และการวัดความหวานน้ำหมักยีสต์ด้วย Refractometer",
     "Lab 9 Optical Ray-Box Protractor Setup & Handheld Brix Refractometer for Fermentation",
     [(350, 300, 350, 148, "ฉายเลเซอร์ผ่านแท่งอะคริลิกใส วัดมุม θ₁ และ θ₂", (56, 189, 248)),
      (810, 320, 810, 148, "หยดน้ำกลั่นตั้งศูนย์เครื่อง Hand Refractometer (0 °Brix)", (52, 211, 153)),
      (1270, 300, 1260, 148, "วัดความเข้มข้นน้ำตาลกลูโคส 5%, 10%, 20% สำหรับหมักยีสต์", (251, 191, 36))],
     ["ความเข้มข้นน้ำตาลสูงขึ้น → ดัชนีหักเห n สูงขึ้น → ค่า °Brix สูงขึ้น", "เมื่อยีสต์กินน้ำตาลเปลี่ยนเป็นแอลกอฮอล์ ค่า °Brix จะลดลง", "เช็ดหน้าปริซึมด้วยกระดาษเช็ดเลนส์ทุกครั้ง"]),

    # CHAPTER 10
    ("ch10_s1.jpg", "ภาพที่ 10.1 • หัวข้อ 10.1", None, "navy_bio",
     "ระบบเลนส์นูนสองชั้นและกำลังขยายรวม (Total Magnification) ของกล้องจุลทรรศน์",
     "Compound Light Microscope Optical Pathway: Objective Lens (4x–100x) × Ocular Lens (10x)",
     [(350, 290, 350, 148, "เลนส์ใกล้วัตถุ (Objective): 4×, 10×, 40×, 100×", (56, 189, 248)),
      (810, 280, 810, 148, "เลนส์ใกล้ตา (Ocular / Eyepiece): ขยายซ้ำอีก 10×", (52, 211, 153)),
      (1270, 300, 1260, 148, "หัวเลนส์ 100× ร่วมกับเลนส์ตา 10× = กำลังขยาย 1,000 เท่า", (251, 191, 36))],
     ["กำลังขยายรวม: M_total = M_obj × M_oc", "เลนส์ใกล้วัตถุสร้างภาพจริงหัวกลับขยายใหญ่", "เลนส์ใกล้ตาขยายซ้ำเป็นภาพเสมือนหัวกลับขนาดใหญ่"]),

    ("ch10_s2.jpg", "ภาพที่ 10.2 • หัวข้อ 10.2", "ch10_hero_ai", "cyan_optics",
     "ขีดจำกัดการแยกชัด (d_min) และเหตุผลทางฟิสิกส์ที่ต้องหยดน้ำมันช่วยส่อง (Immersion Oil)",
     "100x Oil-Immersion Objective Cone: Eliminating Refraction Loss (n_glass = n_oil = 1.515)",
     [(350, 330, 350, 148, "ไม่หยดน้ำมัน (อากาศ n=1.00): แสงหักเหหนี ภาพมืดและเบลอ", (248, 113, 113)),
      (810, 320, 810, 148, "หยด Immersion Oil (n=1.515): แสงพุ่งตรงเข้าเลนส์ 100× เต็มที่", (52, 211, 153)),
      (1270, 330, 1260, 148, "NA เพิ่มเป็น 1.25 → แยกชัดระดับ d_min ≈ 0.22 µm คมกริบ!", (251, 191, 36))],
     ["สมการอับเบอ: d_min = 0.61 λ / NA = 0.61 λ / (n sin θ)", "ยิ่งค่า d_min น้อย → ภาพยิ่งคมชัดรายละเอียดสูง", "กล้องใช้แสงเห็นแบคทีเรีย (1 µm) ชัด แต่ไม่เห็นไวรัส (0.08 µm)"]),

    ("ch10_s3.jpg", "ภาพที่ 10.4 • หัวข้อ 10.3", None, "emerald_cell",
     "ปฏิบัติการที่ 10: การคำนวณค่า d_min และทักษะการใช้หัวเลนส์น้ำมัน 100x ส่องแบคทีเรียย้อมสีแกรม",
     "Lab 10 Gram-Stained S. aureus & E. coli at 1,000x Oil Immersion & Lens Care Protocol",
     [(365, 270, 350, 148, "คำนวณค่า d_min ของหัวเลนส์ 10×, 40× และ 100×", (56, 189, 248)),
      (810, 250, 810, 148, "หยด Immersion Oil 1 หยดเมื่อใช้หัวเลนส์ 100× เท่านั้น", (251, 191, 36)),
      (1270, 310, 1260, 148, "เช็ดคราบน้ำมันด้วยกระดาษเช็ดเลนส์ทันทีหลังใช้งาน", (52, 211, 153))],
     ["ห้ามให้หัวเลนส์ 40× สัมผัสโดนหยดน้ำมันโดยเด็ดขาด", "ที่หัว 100× ห้ามหมุนปุ่มปรับภาพหยาบ (Coarse Knob) เด็ดขาด", "100× (NA 1.25, λ 500 nm) → d_min = 0.244 µm"]),

    # CHAPTER 11
    ("ch11_s1.jpg", "ภาพที่ 11.1 • หัวข้อ 11.1", "ch11_hero_ai", "crimson_rad",
     "ชนิดของรังสี อำนาจทะลุทะลวง และการทำลายดีเอ็นเอจุลินทรีย์ด้วยรังสี UV-C (254 nm)",
     "UV-C (254 nm) Thymine Dimer DNA Lesion vs. Alpha, Beta & Cobalt-60 Gamma Penetration",
     [(350, 330, 350, 148, "รังสี UV-C (254 nm): สร้างพันธะ Thymine Dimer ในสาย DNA", (192, 132, 252)),
      (810, 320, 810, 148, "UV-C ไม่ทะลุฝาพลาสติก/กระจก (ฆ่าเชื้อเฉพาะพื้นผิวเปิดโล่ง)", (248, 113, 113)),
      (1270, 330, 1260, 148, "รังสีแกมมา (⁶⁰Co): ทะลุฆ่าเชื้อจานเพาะเชื้อพลาสติกทั้งลัง", (52, 211, 153))],
     ["UV-C (254 nm): รังสีไม่ก่อไอออน ใช้ในตู้ Biosafety Cabinet", "แอลฟา (α) กั้นด้วยกระดาษ | บีตา (β) กั้นด้วยอะลูมิเนียม", "แกมมา (γ) ทะลุทะลวงสูงมาก กั้นด้วยกำแพงตะกั่วหนา"]),

    ("ch11_s2.jpg", "ภาพที่ 11.3 • หัวข้อ 11.2", None, "purple_electro",
     "การคำนวณครึ่งชีวิต (Half-Life) แบบหารสองทีละขั้น และกฎกำลังสองผกผันของความเข้มรังสี",
     "Stepwise Halving Decay (100% → 50% → 25% → 12.5%) & Inverse Square Law (I ∝ 1/r²)",
     [(280, 300, 350, 148, "ครึ่งชีวิต T₁/₂: หารด้วย 2 ตามจำนวนรอบ n = t / T₁/₂", (56, 189, 248)),
      (760, 330, 810, 148, "3 รอบครึ่งชีวิต: 100% → 50% → 25% → เหลือ 12.5%", (52, 211, 153)),
      (1270, 310, 1260, 148, "ระยะห่าง r เพิ่ม 2 เท่า → ความเข้มรังสี UV ลดลงเหลือ 1/4 เท่า", (251, 191, 36))],
     ["สูตรครึ่งชีวิต: N = N₀ × (1/2)ⁿ  โดยที่  n = t / T₁/₂", "ไม่ต้องใช้ลอการิทึม: แค่หารครึ่งไปทีละรอบ", "กฎกำลังสองผกผัน: I₁ / I₂ = (r₂ / r₁)²"]),

    ("ch11_s3.jpg", "ภาพที่ 11.4 • หัวข้อ 11.3", None, "navy_bio",
     "ปฏิบัติการที่ 11: การจำลองกราฟการสลายตัวครึ่งชีวิตและการวัดความเข้มแสงตามระยะห่าง",
     "Lab 11 Half-Life Probability Decay Simulation & UV Radiometer Inverse-Square Verification",
     [(350, 320, 350, 148, "จำลองการสลายตัวด้วยเหรียญ 100 ชิ้น (5 รอบครึ่งชีวิต)", (56, 189, 248)),
      (860, 300, 810, 148, "วัดความเข้มแสงที่ระยะห่าง r = 10, 20 และ 40 cm", (251, 191, 36)),
      (1280, 300, 1260, 148, "ปิดกระจกหน้าตู้ปลอดเชื้อทุกครั้งขณะเปิดไฟฆ่าเชื้อ UV-C", (248, 113, 113))],
     ["กราฟครึ่งชีวิตลดลงแบบโค้งเอ็กซ์โพเนนเชียล (หารสองทุกๆ รอบ)", "ห้ามจ้องมองแสงหลอด UV-C หรือสอดมือเข้าตู้ขณะเปิด UV", "ระยะห่างเพิ่มขึ้น 4 เท่า → ความเข้มลดลง 4² = 16 เท่า"]),

    # CHAPTER 12
    ("ch12_s1.jpg", "ภาพที่ 12.1 • หัวข้อ 12.1", None, "cyan_optics",
     "กฎของเบียร์-แลมเบิร์ต (Beer-Lambert Law) และการวัดความขุ่นของเซลล์ด้วยค่า OD600",
     "UV-Vis Spectrophotometer Optical Bench: 600 nm Beam Attenuation & Mie Scattering by Bacteria",
     [(310, 310, 350, 148, "ลำแสงเริ่มต้น I₀ ที่ความยาวคลื่น λ = 600 nm (ไม่ทำลายเซลล์)", (251, 191, 36)),
      (810, 240, 810, 148, "เซลล์แบคทีเรียในหลอด Cuvette (b = 1 cm) กระเจิงลำแสง", (52, 211, 153)),
      (1275, 290, 1260, 148, "ค่า OD600 แปรผันตรงกับความหนาแน่นเซลล์ (A = ε b c)", (56, 189, 248))],
     ["กฎเบียร์-แลมเบิร์ต: A = ε b c", "สัดส่วนตรง: OD₁ / OD₂ = c₁ / c₂ (ไม่ต้องกด log)", "ช่วงวัดแม่นยำ: OD600 ระหว่าง 0.1 ถึง 0.8 (ถ้าเกิน 1.0 ต้องเจือจาง)"]),

    ("ch12_s2.jpg", "ภาพที่ 12.3 • หัวข้อ 12.2", None, "emerald_cell",
     "ปฏิบัติการที่ 12–13: การสร้างกราฟมาตรฐาน OD600 และโครงงานย่อยบูรณาการฟิสิกส์จุลชีววิทยา",
     "Lab 12–13 Serial Dilution Standard Curve (0%–100%) & Integrated Microbiology Physics Capstone",
     [(260, 250, 350, 148, "เซตศูนย์ (Blank = 0.000) ด้วยอาหารเหลวปลอดเชื้อชนิดเดียวกัน", (56, 189, 248)),
      (770, 250, 810, 148, "วัดค่า OD600 ที่ความเข้มข้นสัมพัทธ์ 20%, 40%, 60%, 80%, 100%", (52, 211, 153)),
      (1320, 290, 1260, 148, "คูณด้วยตัวคูณการเจือจาง (DF) เพื่อหาความเข้มข้นขวดต้นฉบับ", (251, 191, 36))],
     ["c_ต้นฉบับ = c_เจือจาง × ตัวคูณการเจือจาง (DF)", "จับหลอด Cuvette เฉพาะด้านขุ่น และเช็ดด้านใสด้วยกระดาษเช็ดเลนส์", "บูรณาการฟิสิกส์สู่ทักษะห้องปฏิบัติการจุลชีววิทยาครบทั้ง 12 บท"]),
]


def build_all_section_plates():
    w, h = 1600, 660
    used_ai_paths = set()
    for idx, (fname, badge_code, ai_prefix, theme, title_th, sub_en, callouts, formulas) in enumerate(SECTION_SPECS):
        ai_path = find_exact_artifact_image(ai_prefix)
        if ai_path and os.path.exists(ai_path) and ai_path not in used_ai_paths:
            used_ai_paths.add(ai_path)
            ai_im = Image.open(ai_path).convert("RGB")
            aw, ah = ai_im.size
            cropped = ai_im.crop((0, int(ah * 0.05), aw, int(ah * 0.88))).resize((w, h), Image.Resampling.LANCZOS)
            arr = np.array(cropped, dtype=np.uint8)
        else:
            arr = make_studio_canvas(w, h, theme, variant=idx)
            render_bespoke_3d_scene(arr, fname)

        pil_im = Image.fromarray(arr)
        final_im = add_hud_chrome_and_labels(pil_im, badge_code, title_th, sub_en, callouts, formulas)
        out_path = os.path.join(OUT_DIR, fname)
        final_im.save(out_path, quality=93)
        print(f"[{idx+1}/35] Saved unique section plate: {out_path}")


if __name__ == "__main__":
    build_table1_prefix_images()
    build_all_section_plates()
    print("ALL 38 UNIQUE ILLUSTRATIONS GENERATED SUCCESSFULLY.")
