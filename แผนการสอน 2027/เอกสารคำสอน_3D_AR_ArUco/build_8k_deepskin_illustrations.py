#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
3D Realistic 8K Deep-Skin (Subsurface Scattering + PBR Studio) Illustration Generator
Generates:
1. Chapter 1 Table 1.1 SI Prefix 3D Realistic Deep-Skin Cards:
   - figures/sec_3d/prefix_milli.jpg
   - figures/sec_3d/prefix_micro.jpg
   - figures/sec_3d/prefix_nano.jpg
2. All 35 Section 3D Realistic 8K Deep-Skin Plates across Chapters 1-12:
   - figures/sec_3d/ch01_s1.jpg ... ch12_s2.jpg
"""

import os
import math
import numpy as np
from PIL import Image, ImageDraw, ImageFont, ImageFilter

OUT_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/figures/sec_3d"
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


# ==============================================================================
# 3D RAYTRACED DEEP-SKIN SUBSURFACE SCATTERING (SSS) & PBR SHADING PRIMITIVES
# ==============================================================================

def make_studio_canvas(w, h, theme="navy_bio"):
    """Creates a volumetric 3D studio dark-room background with subtle bokeh and floor reflection."""
    y, x = np.mgrid[0:h, 0:w].astype(np.float32)
    nx = (x - w * 0.5) / (w * 0.5)
    ny = (y - h * 0.5) / (h * 0.5)
    r2 = nx * nx + ny * ny

    palettes = {
        "navy_bio": ((8, 20, 42), (18, 58, 98), (0, 210, 255)),
        "emerald_cell": ((6, 26, 28), (14, 72, 68), (52, 211, 153)),
        "amber_thermal": ((28, 14, 10), (82, 38, 16), (251, 191, 36)),
        "purple_electro": ((18, 10, 38), (58, 28, 108), (192, 132, 252)),
        "crimson_rad": ((28, 10, 18), (78, 22, 42), (248, 113, 113)),
        "cyan_optics": ((6, 22, 38), (12, 68, 102), (56, 189, 248)),
    }
    dark, mid, glow = palettes.get(theme, palettes["navy_bio"])

    vig = np.clip(1.0 - 0.55 * r2, 0.15, 1.0)
    # Studio horizon floor at y = 0.76*h
    floor_mask = np.clip((y - h * 0.75) / (h * 0.25), 0.0, 1.0)
    horizon_glow = np.exp(-((y - h * 0.75) / (h * 0.08)) ** 2) * np.exp(-0.8 * nx * nx)

    img = np.zeros((h, w, 3), dtype=np.float32)
    for c in range(3):
        base = dark[c] * (1.0 - vig) + mid[c] * vig
        base += glow[c] * 0.28 * horizon_glow
        base = base * (1.0 - 0.35 * floor_mask) + (dark[c] * 0.7 + glow[c] * 0.12) * floor_mask
        img[:, :, c] = base

    # Subtle 3D perspective studio grid on the floor
    grid_y = y > h * 0.75
    gy = (y[grid_y] - h * 0.75) / (h * 0.25) + 0.05
    gx = nx[grid_y] / gy
    grid_line = (np.abs(np.sin(gx * 18.0)) > 0.96) | (np.abs(np.sin(1.2 / gy)) > 0.95)
    for c in range(3):
        ch = img[:, :, c]
        vals = ch[grid_y]
        vals[grid_line] += glow[c] * 0.18 * (1.0 - gy[grid_line] * 0.6)
        ch[grid_y] = vals

    return np.clip(img, 0, 255).astype(np.uint8)


def render_deepskin_sphere(canvas, cx, cy, radius, base_rgb, sss_rgb=(255, 95, 65),
                           roughness=0.18, metallic=0.0, glass_alpha=1.0, bump_scale=0.14, seed=1):
    """
    Raycasts a 3D sphere onto `canvas` using an 8K Deep-Skin Subsurface Scattering (SSS)
    + Micro-Pore Cellular Bump + Fresnel Rim + Dual-Specular Clearcoat PBR shader.
    """
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

    # Procedural 8K Deep-Skin cellular / organic micro-pore normal perturbation
    if bump_scale > 0:
        freq1 = 14.0
        freq2 = 31.0
        nx_p = bump_scale * (
            0.6 * np.sin(dx * freq1 + seed) * np.cos(dy * freq1 - seed)
            + 0.4 * np.cos(dx * freq2 - dy * freq2 + seed * 1.7)
        )
        ny_p = bump_scale * (
            0.6 * np.cos(dx * freq1 - seed) * np.sin(dy * freq1 + seed)
            + 0.4 * np.sin(dx * freq2 + dy * freq2 - seed * 1.3)
        )
        nx = dx + nx_p * dz
        ny = dy + ny_p * dz
        nz = dz
        norm = np.sqrt(nx * nx + ny * ny + nz * nz + 1e-6)
        nx, ny, nz = nx / norm, ny / norm, nz / norm
    else:
        nx, ny, nz = dx, dy, dz

    # Key light (-0.48, -0.55, 0.68), Fill light (0.55, 0.25, 0.79), Back Rim (0.1, -0.85, -0.5)
    lx, ly, lz = -0.48, -0.55, 0.68
    ndotl = nx * lx + ny * ly + nz * lz
    diffuse = np.clip(ndotl, 0.0, 1.0)

    # Subsurface Scattering (Deep Skin Wrap Lighting + Epidermal/Dermal Scatter Band)
    wrap = 0.48
    sss_wrap = np.clip((ndotl + wrap) / ((1.0 + wrap) ** 2), 0.0, 1.0)
    # Strongest subsurface red/amber glow near the terminator & thin edges
    terminator = np.exp(-((ndotl - 0.05) / 0.38) ** 2) * (1.0 - metallic)
    edge_translucency = np.power(np.clip(1.0 - dz, 0.0, 1.0), 1.8) * (1.0 - metallic)
    sss_factor = (0.55 * terminator + 0.45 * edge_translucency + 0.35 * sss_wrap) * (1.0 - metallic)

    # Halfway vector for Blinn-Phong + Clearcoat Specular
    hx, hy, hz = lx, ly, lz + 1.0
    hnorm = math.sqrt(hx * hx + hy * hy + hz * hz)
    hx, hy, hz = hx / hnorm, hy / hnorm, hz / hnorm
    ndoth = np.clip(nx * hx + ny * hy + nz * hz, 0.0, 1.0)

    shininess = max(8.0, 180.0 * (1.0 - roughness))
    spec_primary = np.power(ndoth, shininess) * (0.85 + 0.6 * metallic)
    spec_clearcoat = np.power(ndoth, 260.0) * 0.65

    # Fresnel Rim Glow
    fresnel = np.power(np.clip(1.0 - dz, 0.0, 1.0), 3.0)

    # Anti-aliased edge alpha
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
                            roughness=0.16, metallic=0.0, glass_alpha=1.0, bump_scale=0.12, seed=2):
    """
    Raycasts a 3D capsule / rod-shaped bacterium / cylinder with hemispherical or flat-beveled caps
    and 8K Deep-Skin Subsurface Scattering + PBR specular highlights.
    """
    h, w, _ = canvas.shape
    pad = int(math.ceil(radius + 4))
    bx0 = max(0, int(min(x1, x2) - pad))
    bx1 = min(w, int(max(x1, x2) + pad))
    by0 = max(0, int(min(y1, y2) - pad))
    by1 = min(h, int(max(y1, y2) + pad))
    if bx1 <= bx0 or by1 <= by0:
        return

    yy, xx = np.mgrid[by0:by1, bx0:bx1].astype(np.float32)
    vx, vy = float(x2 - x1), float(y2 - y1)
    vlen2 = vx * vx + vy * vy
    if vlen2 < 1e-4:
        render_deepskin_sphere(canvas, x1, y1, radius, base_rgb, sss_rgb, roughness, metallic, glass_alpha, bump_scale, seed)
        return

    t = np.clip(((xx - x1) * vx + (yy - y1) * vy) / vlen2, 0.0, 1.0)
    px = x1 + t * vx
    py = y1 + t * vy
    dx = (xx - px) / radius
    dy = (yy - py) / radius
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


def draw_glow_beam(canvas, x1, y1, x2, y2, radius, rgb, intensity=0.85):
    """Draws a volumetric glowing laser/optical beam or electric field line."""
    h, w, _ = canvas.shape
    pad = int(radius * 2.5 + 4)
    bx0 = max(0, int(min(x1, x2) - pad))
    bx1 = min(w, int(max(x1, x2) + pad))
    by0 = max(0, int(min(y1, y2) - pad))
    by1 = min(h, int(max(y1, y2) + pad))
    if bx1 <= bx0 or by1 <= by0:
        return
    yy, xx = np.mgrid[by0:by1, bx0:bx1].astype(np.float32)
    vx, vy = float(x2 - x1), float(y2 - y1)
    vlen2 = max(1.0, vx * vx + vy * vy)
    t = np.clip(((xx - x1) * vx + (yy - y1) * vy) / vlen2, 0.0, 1.0)
    px = x1 + t * vx
    py = y1 + t * vy
    d2 = ((xx - px) ** 2 + (yy - py) ** 2) / (radius * radius)
    glow = np.exp(-1.6 * d2) * intensity
    core = np.exp(-6.5 * d2) * intensity
    sub = canvas[by0:by1, bx0:bx1].astype(np.float32)
    for c in range(3):
        sub[:, :, c] = np.clip(sub[:, :, c] + rgb[c] * glow + 255.0 * 0.65 * core, 0, 255)
    canvas[by0:by1, bx0:bx1] = sub.astype(np.uint8)


def clean_glyphs(text):
    """Replaces Unicode math/arrow characters unsupported by Thonburi with crisp supported glyphs."""
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


def add_hud_chrome_and_labels(pil_img, badge_code, title_th, subtitle_en, callouts, formulas):
    """Adds a sleek 8K Deep-Skin Studio HUD frame, top header bar, callout pills, and formula badges."""
    w, h = pil_img.size
    overlay = Image.new("RGBA", (w, h), (0, 0, 0, 0))
    draw = ImageDraw.Draw(overlay)

    badge_code = clean_glyphs(badge_code)
    title_th = clean_glyphs(title_th)
    subtitle_en = clean_glyphs(subtitle_en)

    f_badge = get_thai_font(17, bold=True)
    f_title = get_thai_font(23, bold=True)
    f_sub = get_thai_font(16, bold=False)
    f_call = get_thai_font(17, bold=True)
    f_form = get_thai_font(16, bold=True)

    # Top translucent dark glass header bar
    draw.rounded_rectangle([16, 12, w - 16, 84], radius=12, fill=(7, 18, 36, 218), outline=(56, 189, 248, 190), width=2)
    # 8K Deep Skin Studio Pill (wide enough so badge text never overflows)
    draw.rounded_rectangle([26, 20, 348, 76], radius=8, fill=(14, 116, 144, 240), outline=(125, 211, 252, 225), width=1)
    draw.text((38, 25), f"3D 8K DEEP SKIN • {badge_code}", font=f_badge, fill=(255, 255, 255, 255))
    draw.text((38, 49), "SSS + PBR STUDIO RENDER", font=get_thai_font(13, bold=True), fill=(186, 230, 253, 255))

    # Title & Subtitle
    draw.text((366, 20), title_th, font=f_title, fill=(255, 255, 255, 255))
    draw.text((366, 51), subtitle_en, font=f_sub, fill=(148, 210, 255, 240))

    # Draw callouts into 3 non-overlapping horizontal zones (Left, Center, Right)
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

        # Pin target on the 3D object
        pin_x = int(bx0 + tw // 2)
        pin_y = int(py)
        draw.line([(pin_x, by0 + th), (pin_x, pin_y)], fill=(accent[0], accent[1], accent[2], 215), width=2)
        draw.ellipse([pin_x - 6, pin_y - 6, pin_x + 6, pin_y + 6],
                     fill=(255, 255, 255, 255), outline=(accent[0], accent[1], accent[2], 255), width=3)

        draw.rounded_rectangle([bx0, by0, bx0 + tw, by0 + th], radius=8,
                               fill=(8, 19, 38, 228), outline=(accent[0], accent[1], accent[2], 240), width=2)
        draw.text((bx0 + 11, by0 + 4), text_str, font=f_call, fill=(248, 250, 252, 255))

    # Bottom formula / key-insight dock with 3 non-overlapping columns
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

    # Outer border
    draw.rounded_rectangle([4, 4, w - 5, h - 5], radius=16, outline=(56, 189, 248, 130), width=2)
    return Image.alpha_composite(pil_img.convert("RGBA"), overlay).convert("RGB")


# ==============================================================================
# TABLE 1.1 SI PREFIX 3D 8K DEEP-SKIN CARDS (MILLI, MICRO, NANO)
# ==============================================================================

ARTIFACT_DIR = "/Users/chewathassana/.gemini/antigravity/brain/5adc1603-12c9-4f07-b8b3-e35754ab42b0"


def find_artifact_image(prefix_str):
    if not os.path.exists(ARTIFACT_DIR):
        return None
    matches = [
        os.path.join(ARTIFACT_DIR, f)
        for f in os.listdir(ARTIFACT_DIR)
        if f.startswith(prefix_str) and (f.endswith(".jpg") or f.endswith(".png"))
    ]
    if matches:
        matches.sort(key=lambda p: os.path.getmtime(p), reverse=True)
        return matches[0]
    # Fallback mapping to photorealistic 3D 8K Deep-Skin renders for Ch 7, 8, 12
    fallback_map = {
        "ch07_hero_ai": "prefix_micro_ai",
        "ch08_hero_ai": "ch11_hero_ai",
        "ch12_hero_ai": "prefix_nano_ai",
    }
    fb = fallback_map.get(prefix_str)
    if fb:
        return find_artifact_image(fb)
    return None


def build_table1_prefix_images():
    configs = [
        (
            "prefix_milli.jpg",
            "prefix_milli_ai",
            "มิลลิ (milli, 10⁻³)",
            "โคโลนีแบคทีเรีย (1–5 mm) และอาหารเหลว (5–10 mL)",
            "8K DEEP SKIN • MILLI (10⁻³)",
            (16, 185, 129),
            "navy_bio",
        ),
        (
            "prefix_micro.jpg",
            "prefix_micro_ai",
            "ไมโคร (micro, 10⁻⁶)",
            "เซลล์ E. coli (2 µm), ยีสต์ (6 µm) และไมโครปิเปต (µL)",
            "8K DEEP SKIN • MICRO (10⁻⁶)",
            (245, 158, 11),
            "emerald_cell",
        ),
        (
            "prefix_nano.jpg",
            "prefix_nano_ai",
            "นาโน (nano, 10⁻⁹)",
            "อนุภาคไวรัส/ฟาจ (20–300 nm) และลำแสง OD600 (600 nm)",
            "8K DEEP SKIN • NANO (10⁻⁹)",
            (168, 85, 247),
            "purple_electro",
        ),
    ]

    for out_name, ai_prefix, title_th, sub_th, badge, accent, theme in configs:
        w, h = 900, 520
        ai_path = find_artifact_image(ai_prefix)
        if ai_path and os.path.exists(ai_path):
            base_im = Image.open(ai_path).convert("RGB").resize((w, h), Image.Resampling.LANCZOS)
        else:
            arr = make_studio_canvas(w, h, theme)
            render_deepskin_sphere(arr, w * 0.35, h * 0.48, 110, accent, (255, 120, 80), 0.12, 0.0, 0.95, 0.16, 3)
            render_deepskin_capsule(arr, w * 0.58, h * 0.42, w * 0.78, h * 0.55, 62, (56, 189, 248), (255, 90, 90), 0.14, 0.1, 0.95, 0.14, 7)
            base_im = Image.fromarray(arr)

        ov = Image.new("RGBA", (w, h), (0, 0, 0, 0))
        dr = ImageDraw.Draw(ov)
        badge = clean_glyphs(badge)
        title_th = clean_glyphs(title_th)
        sub_th = clean_glyphs(sub_th)
        # Top badge pill
        dr.rounded_rectangle([14, 14, 415, 56], radius=10, fill=(8, 18, 36, 220), outline=(accent[0], accent[1], accent[2], 240), width=2)
        dr.text((26, 22), badge, font=get_thai_font(18, bold=True), fill=(255, 255, 255, 255))
        # Bottom caption bar
        dr.rounded_rectangle([14, h - 86, w - 14, h - 12], radius=10, fill=(8, 18, 36, 225), outline=(accent[0], accent[1], accent[2], 220), width=2)
        dr.text((28, h - 78), title_th, font=get_thai_font(22, bold=True), fill=(accent[0], accent[1], accent[2], 255))
        dr.text((28, h - 46), sub_th, font=get_thai_font(18, bold=False), fill=(241, 245, 249, 255))
        dr.rounded_rectangle([3, 3, w - 4, h - 4], radius=14, outline=(accent[0], accent[1], accent[2], 180), width=2)

        final_im = Image.alpha_composite(base_im.convert("RGBA"), ov).convert("RGB")
        out_path = os.path.join(OUT_DIR, out_name)
        final_im.save(out_path, quality=94)
        print("Saved Table 1.1 prefix image:", out_path)


# ==============================================================================
# 35 SECTION 3D REALISTIC 8K DEEP-SKIN PLATES ACROSS CHAPTERS 1 - 12
# ==============================================================================

SECTION_SPECS = [
    # CHAPTER 1
    ("ch01_s1.jpg", "CH01 • SEC 1.1", "ch01_hero_ai", "navy_bio",
     "ระบบหน่วยเอสไอ (SI Units) และสเกลขนาดในโลกจุลชีววิทยา 3 มิติ",
     "3D 8K Deep-Skin Scale Comparison: Macro Colony (mm) → Micro Cell (µm) → Nano Virus (nm)",
     [(290, 290, 250, 145, "โคโลนีบนจานวุ้น (1–5 mm)", (52, 211, 153)),
      (780, 320, 780, 145, "เซลล์แบคทีเรีย E. coli (2 µm)", (56, 189, 248)),
      (1280, 310, 1280, 145, "อนุภาคไวรัสฟาจ (20–200 nm)", (244, 114, 182))],
     ["หน่วยฐาน SI: m, kg, s, K, mol", "milli (10⁻³) | micro (10⁻⁶) | nano (10⁻⁹)", "T(K) = T(°C) + 273.15"]),

    ("ch01_s2.jpg", "CH01 • SEC 1.2", "ch01_hero_ai", "emerald_cell",
     "เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละ 1,000 เท่า และการเจือจางเชื้อ",
     "3D Step-by-1,000 Metric Conversion Ladder & Micropipette Volume Scaling",
     [(310, 250, 290, 138, "หน่วยฐาน (m, L, g)", (56, 189, 248)),
      (640, 320, 640, 155, "มิลลิ (mm, mL) ×1,000", (52, 211, 153)),
      (980, 380, 980, 175, "ไมโคร (µm, µL) ×1,000", (251, 191, 36)),
      (1310, 430, 1310, 195, "นาโน (nm, ng) ×1,000", (192, 132, 252))],
     ["ใหญ่ → เล็ก: คูณ 1,000 (เลื่อนจุดขวา 3 ตำแหน่ง)", "เล็ก → ใหญ่: หาร 1,000 (เลื่อนจุดซ้าย 3 ตำแหน่ง)", "1 mL = 1,000 µL"]),

    ("ch01_s3.jpg", "CH01 • SEC 1.3", "ch01_hero_ai", "navy_bio",
     "เลขนัยสำคัญ ความแม่น (Accuracy) ความเที่ยง (Precision) และไมโครปิเปต 2 จังหวะ",
     "3D P1000 Two-Stop Plunger Mechanics & Gravimetric Calibration on 0.0001 g Balance",
     [(370, 310, 350, 145, "จังหวะที่ 1 (First Stop): ดูดสารพอดี", (56, 189, 248)),
      (820, 340, 820, 150, "จังหวะที่ 2 (Second Stop): ปล่อยสารหมดทิป", (251, 191, 36)),
      (1270, 320, 1270, 145, "ชั่งน้ำกลั่น 1,000 µL = 1.0000 g", (52, 211, 153))],
     ["%Error = (|ค่าจริง - ค่ามาตรฐาน| / ค่ามาตรฐาน) × 100%", "น้ำบริสุทธิ์ 100 µL = 0.1000 g", "ห้ามกดเลย First Stop ขณะดูดเชื้อ"]),

    ("ch01_s4.jpg", "CH01 • SEC 1.4", "ch01_hero_ai", "cyan_optics",
     "ปฏิบัติการที่ 1: เวอร์เนียร์คาลิปเปอร์ ไมโครมิเตอร์ และการสอบเทียบไมโครปิเปต",
     "3D Lab Apparatus: Vernier Caliper (0.05 mm), Micrometer (0.01 mm) & P1000 Verification",
     [(340, 330, 340, 150, "เวอร์เนียร์วัดจานเพาะเชื้อ (mm → µm)", (56, 189, 248)),
      (810, 350, 810, 150, "ไมโครมิเตอร์วัดความหนาสไลด์แก้ว", (52, 211, 153)),
      (1270, 330, 1270, 150, "สอบเทียบปิเปต 500 µL (0.5000 g)", (251, 191, 36))],
     ["Vernier Resolution = 0.05 mm", "Micrometer Resolution = 0.01 mm", "P1000 Set 500 µL → 0.5000 g Standard"]),

    # CHAPTER 2
    ("ch02_s1.jpg", "CH02 • SEC 2.1", "ch02_hero_ai", "navy_bio",
     "ปริมาณสเกลาร์ (ระยะทาง s) และปริมาณเวกเตอร์ (การกระจัด d) ของเซลล์จุลินทรีย์",
     "3D Flagellated Bacterial Trajectory: Winding Scalar Path (s) vs. Directed Vector Displacement (d)",
     [(380, 340, 360, 148, "เส้นทางว่ายคดเคี้ยว: ระยะทาง s = 120 µm", (251, 191, 36)),
      (860, 300, 860, 145, "เวกเตอร์การกระจัดลัพธ์ d = 30 µm", (56, 189, 248)),
      (1290, 320, 1280, 148, "แหล่งสารอาหารดึงดูด (Chemoattractant)", (52, 211, 153))],
     ["อัตราเร็วเฉลี่ย v = s / t (สเกลาร์)", "ขนาดความเร็วเฉลี่ย |v_avg| = d / t (เวกเตอร์)", "เวกเตอร์ต้องระบุทั้งขนาดและทิศทาง"]),

    ("ch02_s2.jpg", "CH02 • SEC 2.2", "ch02_hero_ai", "emerald_cell",
     "กลไกการว่ายแบบพุ่งสลับหมุนสุ่ม (Run & Tumble) เทียบกับการสั่นแบบบราวน์",
     "3D Deep-Skin Flagellar Motor Run-and-Tumble Chemotaxis vs. Thermal Brownian Motion",
     [(360, 330, 360, 148, "Brownian Motion: โมเลกุลน้ำชนสุ่ม (d ≈ 0)", (248, 113, 113)),
      (820, 320, 820, 148, "ช่วง Run: แฟลกเจลลาหมุนทวนเข็มรวมเป็นมัด", (52, 211, 153)),
      (1280, 340, 1260, 148, "การแพร่ยาปฏิชีวนะ x_rms = √(2Dt)", (56, 189, 248))],
     ["Brownian Motion: เซลล์สั่นอยู่กับที่ ไม่ได้เคลื่อนที่จริง", "Chemotaxis: ยืดเวลาช่วง Run มุ่งหาอาหาร", "ระยะแพร่เฉลี่ย x_rms = √(2Dt)"]),

    ("ch02_s3.jpg", "CH02 • SEC 2.3", "ch02_hero_ai", "cyan_optics",
     "ปฏิบัติการที่ 2: การวัดอัตราเร็วและการแพร่ของสีย้อมตามอุณหภูมิ",
     "3D Experimental Setup: Bubble/Bead Velocity Tube & Thermal Dye Diffusion in Petri Dishes",
     [(360, 340, 360, 148, "หลอดวัดอัตราเร็ว v = s / t คงที่", (56, 189, 248)),
      (820, 340, 820, 148, "การแพร่สีในน้ำเย็น 10 °C (แพร่ช้า)", (125, 211, 252)),
      (1270, 340, 1270, 148, "การแพร่สีในน้ำอุ่น 45 °C (พลังงานจลน์สูง)", (251, 191, 36))],
     ["ความชันกราฟ s–t คืออัตราเร็ว v", "อุณหภูมิ T สูงขึ้น → สัมประสิทธิ์การแพร่ D สูงขึ้น", "แยกแยะ Brownian Motion ในสไลด์หยดแขวน"]),

    # CHAPTER 3
    ("ch03_s1.jpg", "CH03 • SEC 3.1", "ch03_hero_ai", "navy_bio",
     "กฎการเคลื่อนที่สามข้อของนิวตันในโลกเรย์โนลด์ต่ำของเซลล์จุลินทรีย์",
     "3D Biophysical Newton's Laws: Low-Inertia Overdamped Regime & Flagellar Action-Reaction",
     [(350, 330, 350, 148, "กฎข้อ 1: มวลเซลล์ ~10⁻¹⁵ kg ความหนืดชนะความเฉื่อย", (56, 189, 248)),
      (810, 320, 810, 148, "กฎข้อ 2: แรงลัพธ์ F_net = m a", (251, 191, 36)),
      (1270, 330, 1260, 148, "กฎข้อ 3: แฟลกเจลลาผลักน้ำ (F_action = -F_reaction)", (52, 211, 153))],
     ["กฎข้อ 1: ΣF = 0 (สมดุลแรง)", "กฎข้อ 2: F_net = m a (หน่วยนิวตัน N)", "กฎข้อ 3: แรงกิริยา = แรงปฏิกิริยาทิศตรงข้าม"]),

    ("ch03_s2.jpg", "CH03 • SEC 3.2", "ch03_hero_ai", "emerald_cell",
     "แรงหนืด กฎของสโตกส์ (Stokes' Law) และการตกตะกอนของเซลล์ยีสต์และแบคทีเรีย",
     "3D Deep-Skin Free-Body Force Balance: Gravity (Fg) vs. Buoyancy (Fb) + Stokes Drag (6πηrv)",
     [(360, 340, 360, 148, "แรงหนืดต้านการจม F_drag = 6πηrv (ชี้ขึ้น)", (52, 211, 153)),
      (810, 330, 810, 148, "แรงลอยตัว F_b (ชี้ขึ้น) ต้านแรงโน้มถ่วง F_g (ชี้ลง)", (56, 189, 248)),
      (1270, 330, 1260, 148, "ยีสต์ (r=2.5 µm) จมเร็วกว่าแบคทีเรีย (r=0.5 µm) 25 เท่า!", (251, 191, 36))],
     ["แรงหนืดสโตกส์: F_drag = 6 π η r v", "สมดุลความเร็วสุดท้าย: F_drag + F_b = F_g", "อัตราเร็วตกตะกอน v_t ∝ r² (แปรผันกับรัศมีกำลังสอง)"]),

    ("ch03_s3.jpg", "CH03 • SEC 3.3", "ch03_hero_ai", "cyan_optics",
     "ปฏิบัติการที่ 3: การหาสัมประสิทธิ์ความหนืดของของเหลวด้วยวิธีปล่อยลูกเหล็ก",
     "3D Falling-Sphere Viscometry: Measuring Terminal Velocity (vt) in Water vs. Glycerol",
     [(360, 330, 360, 148, "กระบอกตวงน้ำกลั่น (ความหนืด η ต่ำ จมเร็ว)", (56, 189, 248)),
      (820, 340, 820, 148, "กระบอกตวงกลีเซอรีน (ความหนืด η สูง จมช้า)", (251, 191, 36)),
      (1270, 330, 1270, 148, "จับเวลาผ่านระยะ s = 20 cm หาค่า v_t = s / t", (52, 211, 153))],
     ["v_t = s / t (วัดเมื่อลูกเหล็กเคลื่อนที่ด้วยความเร็วคงที่)", "η = 2 r² (ρ_p - ρ_f) g / (9 v_t)", "หน่วยความหนืด: Pa·s หรือ mPa·s"]),

    # CHAPTER 4
    ("ch04_s1.jpg", "CH04 • SEC 4.1", "ch04_hero_ai", "navy_bio",
     "งาน (Work) พลังงานกล (Mechanical Energy) และกำลังไฟฟ้าของเครื่องมือห้องแล็บ",
     "3D Energy Conversion in Lab Instruments: Electrical Power (W) to Rotational Kinetic Energy",
     [(350, 330, 350, 148, "งานกล W = F s (หน่วยจูล J)", (56, 189, 248)),
      (810, 320, 810, 148, "พลังงานจลน์การหมุนโรเตอร์ E_k = ½ m v²", (52, 211, 153)),
      (1270, 330, 1260, 148, "กำลังเครื่องมือ P = W / t = E / t (วัตต์ W)", (251, 191, 36))],
     ["งาน W = F s (N·m หรือ J)", "พลังงานจลน์ E_k = ½ m v² | พลังงานศักย์ E_p = m g h", "กำลัง P = W / t (1 W = 1 J/s)"]),

    ("ch04_s2.jpg", "CH04 • SEC 4.2", "ch04_hero_ai", "emerald_cell",
     "ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge): การแปลงค่า RPM เป็น RCF (×g) และสมดุลโรเตอร์",
     "3D Cutaway Fixed-Angle Rotor: Symmetrical Tube Balancing (ΣFc = 0) & RCF Pellet Compaction",
     [(350, 330, 350, 148, "วางหลอดมวลเท่ากันตรงข้ามกันเสมอ (ΣF_c = 0)", (52, 211, 153)),
      (810, 320, 810, 148, "รัศมีโรเตอร์ r_cm วัดจากแกนหมุนถึงก้นหลอด", (56, 189, 248)),
      (1270, 330, 1260, 148, "เม็ดตะกอนเซลล์ (Pellet) อัดแน่นที่ก้นหลอด", (251, 191, 36))],
     ["RCF (×g) = 1.118 × 10⁻⁵ × r_cm × (RPM)²", "ถ้า RPM เพิ่ม 2 เท่า → แรงเหวี่ยง RCF เพิ่มขึ้น 2² = 4 เท่า", "รายงานวิจัยต้องระบุเป็นค่า ×g เสมอ"]),

    ("ch04_s3.jpg", "CH04 • SEC 4.3", "ch04_hero_ai", "cyan_optics",
     "ปฏิบัติการที่ 4: การวัดรัศมีโรเตอร์ คำนวณค่า RCF และปั่นแยกตะกอนเซลล์ยีสต์",
     "3D Microcentrifuge Pellet & Supernatant Separation at 2,000 / 4,000 / 6,000 RPM",
     [(350, 340, 350, 148, "วัดรัศมีโรเตอร์ r_cm ด้วยไม้บรรทัด", (56, 189, 248)),
      (810, 330, 810, 148, "หลอดถ่วงดุล (Balance Tube) มวลเท่ากันเป๊ะ", (52, 211, 153)),
      (1270, 340, 1260, 148, "แยกระหว่างส่วนใส (Supernatant) กับตะกอน (Pellet)", (251, 191, 36))],
     ["r_cm = 10 cm, 5,000 rpm → RCF = 2,795 ×g", "ห้ามเดินเครื่องโดยไม่ใส่หลอดถ่วงสมดุล", "รอโรเตอร์หยุดสนิทก่อนเปิดฝาเครื่อง"]),

    # CHAPTER 5
    ("ch05_s1.jpg", "CH05 • SEC 5.1", "ch05_hero_ai", "amber_thermal",
     "อุณหภูมิ ความจุความร้อนจำเพาะของน้ำ (c) และความร้อนแฝงในอาหารเลี้ยงเชื้อ",
     "3D Thermal Physics of Culture Media: Sensible Heat (Q = mcΔT) vs. Latent Heat of Vaporization (Q = mL)",
     [(350, 330, 350, 148, "การต้มละลายวุ้น: Q = m c ΔT (เปลี่ยนอุณหภูมิ)", (251, 191, 36)),
      (810, 320, 810, 148, "น้ำมีค่า c = 4.184 J/(g·°C) ช่วยรักษาอุณหภูมิเซลล์", (56, 189, 248)),
      (1270, 330, 1260, 148, "ไอน้ำควบแน่นคายความร้อนแฝง L_v = 2,260 J/g", (248, 113, 113))],
     ["T(K) = T(°C) + 273.15", "เปลี่ยนอุณหภูมิ: Q = m c ΔT", "เปลี่ยนสถานะที่ T คงที่: Q = m L"]),

    ("ch05_s2.jpg", "CH05 • SEC 5.2", "ch05_hero_ai", "amber_thermal",
     "กลไกการถ่ายโอนความร้อน 3 รูปแบบในห้องปฏิบัติการจุลชีววิทยา",
     "3D Heat Transfer Modes: Water Bath Conduction, Incubator Convection & Bunsen Flame Radiation",
     [(350, 330, 350, 148, "1. การนำความร้อน (Conduction): อ่าง Water Bath", (56, 189, 248)),
      (810, 320, 810, 148, "2. การพาความร้อน (Convection): ตู้อบ Incubator 37°C", (52, 211, 153)),
      (1270, 330, 1260, 148, "3. การแผ่รังสี (Radiation): ลนไฟเข็มเขี่ยเชื้อปลอดเชื้อ", (251, 191, 36))],
     ["Water Bath นำความร้อนสู่วุ้นได้เร็วกว่าอากาศถึง 25 เท่า", "Incubator ใช้การพาความร้อนหมุนเวียนอากาศอุ่น", "Bunsen Burner แผ่รังสีอินฟราเรดและสร้างกระแสอากาศยกตัว"]),

    ("ch05_s3.jpg", "CH05 • SEC 5.3", "ch05_hero_ai", "navy_bio",
     "ปฏิบัติการที่ 5: สมดุลความร้อนแคลอริมิเตอร์และเสถียรภาพอุณหภูมิตู้อบ 37.0 °C",
     "3D Multi-Point Thermal Mapping Inside 37.0 °C Microbiological Incubator & Calorimetry",
     [(350, 330, 350, 148, "แคลอริมิเตอร์: Q_ลด = Q_เพิ่ม (สมดุลความร้อน)", (56, 189, 248)),
      (810, 330, 810, 148, "วัดอุณหภูมิ 3 ชั้นในตู้ Incubator 37.0 °C", (52, 211, 153)),
      (1270, 330, 1260, 148, "อ่างน้ำอุ่น Water Bath 48–50 °C เลี้ยงวุ้นไม่ให้แข็งตัว", (251, 191, 36))],
     ["สมดุลความร้อน: m₁c(T₂ - T_mix) = m₂c(T_mix - T₁)", "Mesophiles เจริญดีที่สุดที่ 37.0 ± 0.5 °C", "ห้ามวางจานเพาะเชื้อบังช่องพัดลมหมุนเวียนอากาศ"]),

    # CHAPTER 6
    ("ch06_s1.jpg", "CH06 • SEC 6.1", "ch06_hero_ai", "amber_thermal",
     "ความดันเกจ (Gauge Pressure) ความดันสัมบูรณ์ และกฎของแก๊สในภาชนะปิด",
     "3D Bourdon Pressure Gauge Mechanics & Gay-Lussac's Pressure-Temperature Law (P/T = const)",
     [(350, 330, 350, 148, "ความดันบรรยากาศ P_atm = 1 atm ≈ 14.7 psi", (56, 189, 248)),
      (810, 320, 810, 148, "หน้าปัดอ่านค่าความดันเกจ P_gauge = 15 psi", (251, 191, 36)),
      (1270, 330, 1260, 148, "ความดันสัมบูรณ์จริง P_abs = 14.7 + 15 = 29.7 psi", (248, 113, 113))],
     ["P_abs = P_atm + P_gauge", "1 atm = 101.3 kPa ≈ 14.7 psi", "กฎเกย์-ลูสแซก: P₁ / T₁ = P₂ / T₂ (ใช้หน่วยเคลวิน K เสมอ)"]),

    ("ch06_s2.jpg", "CH06 • SEC 6.2", "ch06_hero_ai", "crimson_rad",
     "ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave): ทำไมต้อง 121 °C ที่ความดันเกจ 15 psi",
     "3D Deep-Skin Bacillus Endospore Denaturation by Saturated Steam Condensation at 121 °C, 15 psi",
     [(350, 330, 350, 148, "ความดันเกจ 15 psi ยกจุดเดือดน้ำขึ้นไปที่ 121 °C", (251, 191, 36)),
      (810, 320, 810, 148, "ไอน้ำอิ่มตัวควบแน่นคายความร้อนแฝงทำลายเอนโดสปอร์", (248, 113, 113)),
      (1270, 330, 1260, 148, "ต้องไล่อากาศออกให้หมด 100% ก่อนปิดวาล์วอัดความดัน", (52, 211, 153))],
     ["0 psi → น้ำเดือด 100 °C (ฆ่าสปอร์ไม่ได้)", "15 psi (ไอน้ำล้วน) → 121 °C นาน 15–20 นาที (สปอร์ตาย 100%)", "คลายฝาขวดเกลียวครึ่งรอบเสมอเพื่อป้องกันขวดระเบิด"]),

    ("ch06_s3.jpg", "CH06 • SEC 6.3", "ch06_hero_ai", "navy_bio",
     "ปฏิบัติการที่ 6: การเดือดที่ความดันต่ำและการตรวจสอบรอบทำงานจริงของ Autoclave",
     "3D Autoclave Sterilization Cycle Verification: Indicator Tape & Biological Spore Vials",
     [(350, 330, 350, 148, "น้ำอุ่น 70 °C เดือดได้เมื่อดึงกระบอกฉีดยาลดความดัน", (56, 189, 248)),
      (810, 330, 810, 148, "เทป Autoclave Tape เปลี่ยนเป็นแถบสีดำเมื่อถึง 121 °C", (251, 191, 36)),
      (1270, 330, 1260, 148, "รอความดันเกจลงถึง 0 psi และ T < 80 °C ก่อนเปิดฝา", (52, 211, 153))],
     ["ความดันลดลง → จุดเดือดลดลง", "ความดันเพิ่มขึ้น (15 psi) → จุดเดือดเพิ่มขึ้น (121 °C)", "ห้ามเปิดฝาขณะมีแรงดัน (ระวัง Superheated Boiling)"]),

    # CHAPTER 7
    ("ch07_s1.jpg", "CH07 • SEC 7.1", "ch07_hero_ai", "purple_electro",
     "ประจุไฟฟ้าและกฎของคูลอมบ์ (Coulomb's Law) ในระดับโมเลกุลชีวภาพ",
     "3D Electrostatic Force Interaction (Fe = k|q1q2|/r²) Between Dye Cations and Cell Wall Anions",
     [(350, 330, 350, 148, "ไอออนสีย้อมประจุบวก (+q₁) เช่น Crystal Violet", (56, 189, 248)),
      (810, 320, 810, 148, "แรงดึงดูดทางไฟฟ้า F_e ∝ 1 / r² พุ่งเข้าหากัน", (192, 132, 252)),
      (1270, 330, 1260, 148, "หมู่ฟอสเฟตประจุลบ (-q₂) บนผนังเซลล์แบคทีเรีย", (248, 113, 113))],
     ["กฎของคูลอมบ์: F_e = k |q₁ q₂| / r²", "ประจุต่างชนิดดึงดูดกัน | ประจุชนิดเดียวกันผลักกัน", "ระยะห่าง r ลดลง 3 เท่า → แรงดึงดูดเพิ่มขึ้น 3² = 9 เท่า"]),

    ("ch07_s2.jpg", "CH07 • SEC 7.2", "ch07_hero_ai", "purple_electro",
     "ฟิสิกส์ของการย้อมสีแบคทีเรีย: สีย้อมประจุบวก (Basic Dye) เทียบกับสีย้อมประจุลบ (Acidic Dye)",
     "3D Deep-Skin Bacterial Cell Wall Surface Charge (pH 7) in Direct vs. Negative Capsule Staining",
     [(350, 330, 350, 148, "ผนังเซลล์แบคทีเรียมีประจุสุทธิเป็นลบ (-) จากหมู่ PO₄³⁻", (192, 132, 252)),
      (810, 320, 810, 148, "Basic Dye (+): ดูดติดตัวเซลล์โดยตรง (ย้อมแกรม/ย้อมเดี่ยว)", (56, 189, 248)),
      (1270, 330, 1260, 148, "Acidic Dye (-): ถูกผลักออก ย้อมพื้นหลังมืดเพื่อดูแคปซูลใส", (251, 191, 36))],
     ["Basic Dyes (+): Crystal Violet, Methylene Blue, Safranin", "Acidic Dyes (-): Nigrosin, India Ink, Eosin", "การย้อมแคปซูลใช้แรงผลักระหว่างประจุลบกับประจุลบ"]),

    ("ch07_s3.jpg", "CH07 • SEC 7.3", "ch07_hero_ai", "navy_bio",
     "ปฏิบัติการที่ 7: ไฟฟ้าสถิตและการยึดเกาะของสีย้อมประจุบวกและประจุลบบนเส้นใยเซลลูโลส",
     "3D Electrostatic Dye Binding Assay: Methylene Blue (+) Retention vs. Eosin (-) Washout",
     [(350, 330, 350, 148, "เส้นใยเซลลูโลสมีประจุผิวเป็นลบจำลองผนังเซลล์", (56, 189, 248)),
      (810, 330, 810, 148, "Methylene Blue (+) ยึดเกาะแน่น ไม่ถูกน้ำชะหลุด", (192, 132, 252)),
      (1270, 330, 1260, 148, "Eosin (-) ถูกแรงไฟฟ้าผลัก จึงถูกน้ำชะเคลื่อนที่ไปไกล", (251, 191, 36))],
     ["แรงคูลอมบ์ยึดสีย้อมประจุบวกไว้กับผนังเซลล์ประจุลบ", "การล้างน้ำ (Washing) ไม่สามารถชะสีประจุบวกออกได้ง่าย", "อธิบายกลไกพื้นฐานของการย้อมสีจุลินทรีย์ทุกชนิด"]),

    # CHAPTER 8
    ("ch08_s1.jpg", "CH08 • SEC 8.1", "ch08_hero_ai", "purple_electro",
     "กระแสไฟฟ้า ความต้านทาน กฎของโอห์ม (V = IR) และกำลังความร้อนในสารละลายบัฟเฟอร์",
     "3D Electrophoresis Power Supply Circuit: Voltage (V), Ionic Current (I), Resistance (R) & Joule Heating",
     [(350, 330, 350, 148, "แหล่งจ่ายไฟกระแสตรง V = 100 V", (56, 189, 248)),
      (810, 320, 810, 148, "ไอออนในบัฟเฟอร์ TAE/TBE นำกระแส I = V / R", (52, 211, 153)),
      (1270, 330, 1260, 148, "กำลังความร้อนจูล P = V I = I² R (ระวังวุ้นละลาย!)", (251, 191, 36))],
     ["กฎของโอห์ม: V = I R  ⇔  I = V / R  ⇔  R = V / I", "กำลังไฟฟ้า: P = V I = I² R (หน่วยวัตต์ W)", "1 A = 1,000 mA (เช่น 50 mA = 0.05 A)"]),

    ("ch08_s2.jpg", "CH08 • SEC 8.2", "ch08_hero_ai", "emerald_cell",
     "ฟิสิกส์ของเจลอิเล็กโทรโฟรีซิส (Agarose Gel Electrophoresis) ในการแยกขนาดดีเอ็นเอ",
     "3D Deep-Skin Agarose Molecular Sieve: Negative DNA (PO4³⁻) Migrating 'Run to Red' (+ Anode)",
     [(350, 330, 350, 148, "หยด DNA ฝั่งขั้วลบสีดำ (Cathode -) เสมอ", (56, 189, 248)),
      (810, 320, 810, 148, "DNA ชิ้นใหญ่ติดตาข่ายวุ้น จึงเคลื่อนที่ได้ช้า (อยู่ใกล้หลุม)", (192, 132, 252)),
      (1270, 330, 1260, 148, "DNA ชิ้นเล็กคล่องตัว วิ่งเข้าหาขั้วบวกสีแดง (+) ได้ไกลสุด", (52, 211, 153))],
     ["DNA มีประจุสุทธิเป็นลบ (-) จากหมู่ฟอสเฟต PO₄³⁻", "หลักจำ: Run to Red (วิ่งจากขั้วลบสีดำ ไปขั้วบวกสีแดง)", "ห้ามใช้น้ำกลั่นแทนบัฟเฟอร์ TAE/TBE เด็ดขาด"]),

    ("ch08_s3.jpg", "CH08 • SEC 8.3", "ch08_hero_ai", "navy_bio",
     "ปฏิบัติการที่ 8: การตรวจสอบกฎของโอห์มและการแยกแถบสีมาตรฐานในแผ่นวุ้นอะกาโรส",
     "3D Gel Electrophoresis Chamber Run at 100 V & UV Transilluminator DNA Ladder Band Analysis",
     [(350, 330, 350, 148, "วัดค่ากระแส I (mA) ที่แรงดัน V = 50 V และ 100 V", (56, 189, 248)),
      (810, 330, 810, 148, "แถบสีโมเลกุลเล็กเคลื่อนที่ไปใกล้ขั้วบวกได้ระยะทางมากกว่า", (52, 211, 153)),
      (1270, 330, 1260, 148, "ปิดฝาครอบนิรภัยก่อนเปิดสวิตช์จ่ายไฟ 100 V ทุกครั้ง", (251, 191, 36))],
     ["R = V / I = 100 V / 0.05 A = 2,000 Ω", "P = V I = 100 V × 0.05 A = 5.0 W", "วัดระยะทางเคลื่อนที่ของแถบสีในหน่วยมิลลิเมตร (mm)"]),

    # CHAPTER 9
    ("ch09_s1.jpg", "CH09 • SEC 9.1", "ch09_hero_ai", "cyan_optics",
     "ธรรมชาติของคลื่นแสงและดัชนีหักเห (Refractive Index, n = c/v) ของตัวกลางชีวภาพ",
     "3D Optical Media Comparison: Air (n=1.00), Water/Cytoplasm (n=1.33), Glass & Immersion Oil (n=1.515)",
     [(350, 330, 350, 148, "อากาศ n = 1.000 (แสงเดินทางเร็วสุด c = 3×10⁸ m/s)", (56, 189, 248)),
      (810, 320, 810, 148, "น้ำและไซโทพลาซึมเซลล์สด n ≈ 1.333 (จึงดูใสกลืนกัน)", (52, 211, 153)),
      (1270, 330, 1260, 148, "กระจกสไลด์และน้ำมันช่วยส่อง n = 1.515 เท่ากันเป๊ะ!", (251, 191, 36))],
     ["ดัชนีหักเห: n = c / v  ⇔  v = c / n", "แสงที่ตามองเห็น: λ = 400 nm (ม่วง) ถึง 700 nm (แดง)", "ค่า n ยิ่งมาก แสงยิ่งเดินทางช้าลง"]),

    ("ch09_s2.jpg", "CH09 • SEC 9.2", "ch09_hero_ai", "navy_bio",
     "กฎการสะท้อนและกฎการหักเหของแสง (Snell's Law) ฉบับเข้าใจง่ายไม่ต้องจำตรีโกณมิติ",
     "3D Laser Ray Refraction Across Interfaces: Bending Toward vs. Away from the Normal Line",
     [(350, 330, 350, 148, "จาก n น้อย (อากาศ) → n มาก (แก้ว): เบนเข้าหาเส้นฉาก", (52, 211, 153)),
      (810, 320, 810, 148, "จาก n มาก (แก้ว) → n น้อย (อากาศ): เบนหนีออกจากเส้นฉาก", (248, 113, 113)),
      (1270, 330, 1260, 148, "ถ้า n₁ = n₂ (แก้วสู่น้ำมัน 1.515): แสงพุ่งตรงไม่หักเหเลย!", (251, 191, 36))],
     ["กฎการสะท้อน: มุมตกกระทบ = มุมสะท้อน", "กฎของสเนลล์: n₁ sin θ₁ = n₂ sin θ₂", "รอยต่อสไลด์แก้วสู่อากาศทำให้แสงหักเหหนีออกจากหน้าเลนส์"]),

    ("ch09_s3.jpg", "CH09 • SEC 9.3", "ch09_hero_ai", "emerald_cell",
     "ปฏิบัติการที่ 9: การหักเหของลำแสงเลเซอร์และการวัดความหวานน้ำหมักยีสต์ด้วย Refractometer",
     "3D Optical Ray-Box Protractor Setup & Handheld Brix Refractometer for Microbial Fermentation",
     [(350, 330, 350, 148, "ฉายเลเซอร์ผ่านแท่งอะคริลิกใส วัดมุม θ₁ และ θ₂", (56, 189, 248)),
      (810, 330, 810, 148, "หยดน้ำกลั่นตั้งศูนย์เครื่อง Hand Refractometer (0 °Brix)", (52, 211, 153)),
      (1270, 330, 1260, 148, "วัดความเข้มข้นน้ำตาลกลูโคส 5%, 10%, 20% สำหรับหมักยีสต์", (251, 191, 36))],
     ["ความเข้มข้นน้ำตาลสูงขึ้น → ดัชนีหักเห n สูงขึ้น → ค่า °Brix สูงขึ้น", "เมื่อยีสต์กินน้ำตาลเปลี่ยนเป็นแอลกอฮอล์ ค่า °Brix จะลดลง", "เช็ดหน้าปริซึมด้วยกระดาษเช็ดเลนส์ทุกครั้ง"]),

    # CHAPTER 10
    ("ch10_s1.jpg", "CH10 • SEC 10.1", "ch10_hero_ai", "navy_bio",
     "ระบบเลนส์นูนสองชั้นและกำลังขยายรวม (Total Magnification) ของกล้องจุลทรรศน์",
     "3D Compound Light Microscope Optical Pathway: Objective Lens (4x–100x) × Ocular Lens (10x)",
     [(350, 330, 350, 148, "เลนส์ใกล้วัตถุ (Objective): 4×, 10×, 40×, 100×", (56, 189, 248)),
      (810, 320, 810, 148, "เลนส์ใกล้ตา (Ocular / Eyepiece): ขยายซ้ำอีก 10×", (52, 211, 153)),
      (1270, 330, 1260, 148, "หัวเลนส์ 100× ร่วมกับเลนส์ตา 10× = กำลังขยาย 1,000 เท่า", (251, 191, 36))],
     ["กำลังขยายรวม: M_total = M_obj × M_oc", "เลนส์ใกล้วัตถุสร้างภาพจริงหัวกลับขยายใหญ่", "เลนส์ใกล้ตาขยายซ้ำเป็นภาพเสมือนหัวกลับขนาดใหญ่"]),

    ("ch10_s2.jpg", "CH10 • SEC 10.2", "ch10_hero_ai", "cyan_optics",
     "ขีดจำกัดการแยกชัด (d_min) และเหตุผลทางฟิสิกส์ที่ต้องหยดน้ำมันช่วยส่อง (Immersion Oil)",
     "3D 100x Oil-Immersion Objective Cone: Eliminating Refraction Loss (n_glass = n_oil = 1.515)",
     [(350, 330, 350, 148, "ไม่หยดน้ำมัน (อากาศ n=1.00): แสงหักเหหนี ภาพมืดและเบลอ", (248, 113, 113)),
      (810, 320, 810, 148, "หยด Immersion Oil (n=1.515): แสงพุ่งตรงเข้าเลนส์ 100× เต็มที่", (52, 211, 153)),
      (1270, 330, 1260, 148, "NA เพิ่มเป็น 1.25 → แยกชัดระดับ d_min ≈ 0.22 µm คมกริบ!", (251, 191, 36))],
     ["สมการอับเบอ: d_min = 0.61 λ / NA = 0.61 λ / (n sin θ)", "ยิ่งค่า d_min น้อย → ภาพยิ่งคมชัดรายละเอียดสูง", "กล้องใช้แสงเห็นแบคทีเรีย (1 µm) ชัด แต่ไม่เห็นไวรัส (0.08 µm)"]),

    ("ch10_s3.jpg", "CH10 • SEC 10.3", "ch10_hero_ai", "emerald_cell",
     "ปฏิบัติการที่ 10: การคำนวณค่า d_min และทักษะการใช้หัวเลนส์น้ำมัน 100x ส่องแบคทีเรียย้อมสีแกรม",
     "3D Gram-Stained S. aureus & E. coli at 1,000x Oil Immersion & Lens Care Protocol",
     [(350, 330, 350, 148, "คำนวณค่า d_min ของหัวเลนส์ 10×, 40× และ 100×", (56, 189, 248)),
      (810, 330, 810, 148, "หยด Immersion Oil 1 หยดเมื่อใช้หัวเลนส์ 100× เท่านั้น", (251, 191, 36)),
      (1270, 330, 1260, 148, "เช็ดคราบน้ำมันด้วยกระดาษเช็ดเลนส์ทันทีหลังใช้งาน", (52, 211, 153))],
     ["ห้ามให้หัวเลนส์ 40× สัมผัสโดนหยดน้ำมันโดยเด็ดขาด", "ที่หัว 100× ห้ามหมุนปุ่มปรับภาพหยาบ (Coarse Knob) เด็ดขาด", "100× (NA 1.25, λ 500 nm) → d_min = 0.244 µm"]),

    # CHAPTER 11
    ("ch11_s1.jpg", "CH11 • SEC 11.1", "ch11_hero_ai", "crimson_rad",
     "ชนิดของรังสี อำนาจทะลุทะลวง และการทำลายดีเอ็นเอจุลินทรีย์ด้วยรังสี UV-C (254 nm)",
     "3D Deep-Skin UV-C (254 nm) Thymine Dimer DNA Lesion vs. Alpha, Beta & Cobalt-60 Gamma Penetration",
     [(350, 330, 350, 148, "รังสี UV-C (254 nm): สร้างพันธะ Thymine Dimer ในสาย DNA", (192, 132, 252)),
      (810, 320, 810, 148, "UV-C ไม่ทะลุฝาพลาสติก/กระจก (ฆ่าเชื้อเฉพาะพื้นผิวเปิดโล่ง)", (248, 113, 113)),
      (1270, 330, 1260, 148, "รังสีแกมมา (⁶⁰Co): ทะลุฆ่าเชื้อจานเพาะเชื้อพลาสติกทั้งลัง", (52, 211, 153))],
     ["UV-C (254 nm): รังสีไม่ก่อไอออน ใช้ในตู้ Biosafety Cabinet", "แอลฟา (α) กั้นด้วยกระดาษ | บีตา (β) กั้นด้วยอะลูมิเนียม", "แกมมา (γ) ทะลุทะลวงสูงมาก กั้นด้วยกำแพงตะกั่วหนา"]),

    ("ch11_s2.jpg", "CH11 • SEC 11.2", "ch11_hero_ai", "purple_electro",
     "การคำนวณครึ่งชีวิต (Half-Life) แบบหารสองทีละขั้น และกฎกำลังสองผกผันของความเข้มรังสี",
     "3D Stepwise Halving Decay (100% → 50% → 25% → 12.5%) & Inverse Square Law (I ∝ 1/r²)",
     [(350, 330, 350, 148, "ครึ่งชีวิต T₁/₂: หารด้วย 2 ตามจำนวนรอบ n = t / T₁/₂", (56, 189, 248)),
      (810, 320, 810, 148, "3 รอบครึ่งชีวิต: 100% → 50% → 25% → เหลือ 12.5%", (52, 211, 153)),
      (1270, 330, 1260, 148, "ระยะห่าง r เพิ่ม 2 เท่า → ความเข้มรังสี UV ลดลงเหลือ 1/4 เท่า", (251, 191, 36))],
     ["สูตรครึ่งชีวิต: N = N₀ × (1/2)ⁿ  โดยที่  n = t / T₁/₂", "ไม่ต้องใช้ลอการิทึม: แค่หารครึ่งไปทีละรอบ", "กฎกำลังสองผกผัน: I₁ / I₂ = (r₂ / r₁)²"]),

    ("ch11_s3.jpg", "CH11 • SEC 11.3", "ch11_hero_ai", "navy_bio",
     "ปฏิบัติการที่ 11: การจำลองกราฟการสลายตัวครึ่งชีวิตและการวัดความเข้มแสงตามระยะห่าง",
     "3D Half-Life Probability Decay Simulation & UV Radiometer Inverse-Square Verification",
     [(350, 330, 350, 148, "จำลองการสลายตัวด้วยเหรียญ 100 ชิ้น (5 รอบครึ่งชีวิต)", (56, 189, 248)),
      (810, 330, 810, 148, "วัดความเข้มแสงที่ระยะห่าง r = 10, 20 และ 40 cm", (251, 191, 36)),
      (1270, 330, 1260, 148, "ปิดกระจกหน้าตู้ปลอดเชื้อทุกครั้งขณะเปิดไฟฆ่าเชื้อ UV-C", (248, 113, 113))],
     ["กราฟครึ่งชีวิตลดลงแบบโค้งเอ็กซ์โพเนนเชียล (หารสองทุกๆ รอบ)", "ห้ามจ้องมองแสงหลอด UV-C หรือสอดมือเข้าตู้ขณะเปิด UV", "ระยะห่างเพิ่มขึ้น 4 เท่า → ความเข้มลดลง 4² = 16 เท่า"]),

    # CHAPTER 12
    ("ch12_s1.jpg", "CH12 • SEC 12.1", "ch12_hero_ai", "cyan_optics",
     "กฎของเบียร์-แลมเบิร์ต (Beer-Lambert Law) และการวัดความขุ่นของเซลล์ด้วยค่า OD600",
     "3D UV-Vis Spectrophotometer Optical Bench: 600 nm Beam Attenuation & Mie Scattering by Bacteria",
     [(350, 330, 350, 148, "ลำแสงเริ่มต้น I₀ ที่ความยาวคลื่น λ = 600 nm (ไม่ทำลายเซลล์)", (251, 191, 36)),
      (810, 320, 810, 148, "เซลล์แบคทีเรียในหลอด Cuvette (b = 1 cm) กระเจิงลำแสง", (52, 211, 153)),
      (1270, 330, 1260, 148, "ค่า OD600 แปรผันตรงกับความหนาแน่นเซลล์ (A = ε b c)", (56, 189, 248))],
     ["กฎเบียร์-แลมเบิร์ต: A = ε b c", "สัดส่วนตรง: OD₁ / OD₂ = c₁ / c₂ (ไม่ต้องกด log)", "ช่วงวัดแม่นยำ: OD600 ระหว่าง 0.1 ถึง 0.8 (ถ้าเกิน 1.0 ต้องเจือจาง)"]),

    ("ch12_s2.jpg", "CH12 • SEC 12.2", "ch12_hero_ai", "emerald_cell",
     "ปฏิบัติการที่ 12–13: การสร้างกราฟมาตรฐาน OD600 และโครงงานย่อยบูรณาการฟิสิกส์จุลชีววิทยา",
     "3D 5-Cuvette Serial Dilution Standard Curve (0%–100%) & Integrated Microbiology Physics Capstone",
     [(350, 330, 350, 148, "เซตศูนย์ (Blank = 0.000) ด้วยอาหารเหลวปลอดเชื้อชนิดเดียวกัน", (56, 189, 248)),
      (810, 330, 810, 148, "วัดค่า OD600 ที่ความเข้มข้นสัมพัทธ์ 20%, 40%, 60%, 80%, 100%", (52, 211, 153)),
      (1270, 330, 1260, 148, "คูณด้วยตัวคูณการเจือจาง (DF) เพื่อหาความเข้มข้นขวดต้นฉบับ", (251, 191, 36))],
     ["c_ต้นฉบับ = c_เจือจาง × ตัวคูณการเจือจาง (DF)", "จับหลอด Cuvette เฉพาะด้านขุ่น และเช็ดด้านใสด้วยกระดาษเช็ดเลนส์", "บูรณาการฟิสิกส์สู่ทักษะห้องปฏิบัติการจุลชีววิทยาครบทั้ง 12 บท"]),
]


def decorate_procedural_3d_overlay(arr, idx):
    """Adds bespoke 3D Raytraced Deep-Skin Subsurface Scattering objects & glowing beams onto the studio plate."""
    h, w, _ = arr.shape
    mode = idx % 5
    if mode == 0:
        # 3D Deep-Skin multi-scale spheres + glowing laser beam
        draw_glow_beam(arr, 140, 350, w - 140, 350, 16, (56, 189, 248), 0.55)
        render_deepskin_sphere(arr, 340, 350, 74, (245, 158, 11), (255, 90, 50), 0.14, 0.05, 0.88, 0.16, idx + 1)
        render_deepskin_capsule(arr, 740, 330, 890, 370, 54, (16, 185, 129), (255, 110, 80), 0.12, 0.0, 0.88, 0.15, idx + 2)
        render_deepskin_sphere(arr, 1270, 350, 68, (168, 85, 247), (255, 100, 150), 0.15, 0.1, 0.88, 0.18, idx + 3)
    elif mode == 1:
        # Stepped 3D capsules & vector beams
        draw_glow_beam(arr, 240, 290, 1340, 410, 14, (52, 211, 153), 0.5)
        for k, (cx, cy, col) in enumerate([(330, 290, (56, 189, 248)), (660, 335, (52, 211, 153)),
                                           (990, 375, (251, 191, 36)), (1300, 415, (192, 132, 252))]):
            render_deepskin_sphere(arr, cx, cy, 56, col, (255, 105, 75), 0.12, 0.08, 0.86, 0.14, idx + k)
    elif mode == 2:
        # Dual 3D Deep-Skin rods + central interaction sphere
        draw_glow_beam(arr, 320, 350, 1280, 350, 18, (251, 191, 36), 0.5)
        render_deepskin_capsule(arr, 280, 340, 430, 360, 52, (56, 189, 248), (255, 95, 75), 0.12, 0.2, 0.86, 0.12, idx)
        render_deepskin_sphere(arr, 810, 345, 78, (239, 68, 68), (255, 140, 90), 0.14, 0.0, 0.86, 0.18, idx + 5)
        render_deepskin_capsule(arr, 1190, 335, 1340, 365, 52, (16, 185, 129), (255, 110, 80), 0.12, 0.1, 0.86, 0.14, idx + 9)
    elif mode == 3:
        # Three 3D vertical PBR columns/tubes with glowing pellets
        for cx, col in [(350, (56, 189, 248)), (810, (52, 211, 153)), (1270, (251, 191, 36))]:
            render_deepskin_capsule(arr, cx, 250, cx, 430, 46, col, (255, 115, 80), 0.10, 0.15, 0.84, 0.10, idx + cx)
            render_deepskin_sphere(arr, cx, 425, 34, (244, 63, 94), (255, 160, 100), 0.12, 0.0, 0.92, 0.18, idx)
    else:
        # Optical / electromagnetic wave rays + 3D spheres
        draw_glow_beam(arr, 180, 380, 810, 320, 15, (192, 132, 252), 0.6)
        draw_glow_beam(arr, 810, 320, 1420, 380, 15, (56, 189, 248), 0.6)
        render_deepskin_sphere(arr, 350, 350, 64, (192, 132, 252), (255, 100, 120), 0.14, 0.0, 0.86, 0.16, idx + 2)
        render_deepskin_sphere(arr, 810, 325, 72, (56, 189, 248), (255, 120, 90), 0.10, 0.15, 0.86, 0.14, idx + 4)
        render_deepskin_sphere(arr, 1270, 350, 64, (52, 211, 153), (255, 110, 80), 0.14, 0.0, 0.86, 0.16, idx + 6)


def build_all_section_plates():
    w, h = 1600, 660
    for idx, (fname, badge_code, ai_prefix, theme, title_th, sub_en, callouts, formulas) in enumerate(SECTION_SPECS):
        ai_path = find_artifact_image(ai_prefix)
        if ai_path and os.path.exists(ai_path):
            # Use the AI 3D 8K Deep-Skin render as the rich, unobstructed studio centerpiece
            ai_im = Image.open(ai_path).convert("RGB")
            aw, ah = ai_im.size
            sec_num = idx % 3
            crop_y0 = int(ah * (0.02 + 0.07 * sec_num))
            crop_y1 = int(ah * (0.82 + 0.07 * sec_num))
            crop_x0 = int(aw * (0.02 * (sec_num == 1)))
            crop_x1 = int(aw * (1.0 - 0.02 * (sec_num == 2)))
            cropped = ai_im.crop((crop_x0, max(0, crop_y0), crop_x1, min(ah, crop_y1))).resize((w, h), Image.Resampling.LANCZOS)
            arr = np.array(cropped, dtype=np.uint8)
            # Subtle 3D Deep-Skin SSS emblem spheres in lower studio corners (never covering center subject)
            render_deepskin_sphere(arr, 76, 548, 34, (56, 189, 248), (255, 110, 80), 0.12, 0.05, 0.92, 0.15, idx + 1)
            render_deepskin_sphere(arr, w - 76, 548, 34, (52, 211, 153), (255, 120, 80), 0.12, 0.05, 0.92, 0.15, idx + 3)
        else:
            arr = make_studio_canvas(w, h, theme)
            decorate_procedural_3d_overlay(arr, idx)

        pil_im = Image.fromarray(arr)
        final_im = add_hud_chrome_and_labels(pil_im, badge_code, title_th, sub_en, callouts, formulas)
        out_path = os.path.join(OUT_DIR, fname)
        final_im.save(out_path, quality=93)
        print(f"[{idx+1}/35] Saved section 3D 8K Deep-Skin plate: {out_path}")


if __name__ == "__main__":
    build_table1_prefix_images()
    build_all_section_plates()
    print("ALL 38 3D 8K DEEP-SKIN ILLUSTRATIONS GENERATED SUCCESSFULLY.")
