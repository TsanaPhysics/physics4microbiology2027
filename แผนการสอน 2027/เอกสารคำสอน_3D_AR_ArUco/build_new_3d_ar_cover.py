#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
New 3D WebAR & ArUco Marker Edition Textbook Cover Generator
Adhering to academic-book-cover-architect Masterclass Standards:
  - 3-Zone Compositional Blueprint (Upper 35%, Midground 45%, Bottom 20%)
  - Prominent English Title (Bigger & Bolder)
  - Thai Cluster-Safe Coloring with Dual-Layer Drop-Shadow Typography
  - Dynamic Luminance Adaptation (Dark Space Neon Background: mean luminance ~31)
  - 3D WebAR & ArUco Interactive Pill with Mini-Matrix Glyph & Scan Reticle
"""

import os
import sys
import math
from PIL import Image, ImageDraw, ImageFont, ImageFilter

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco"
FIG_DIR = os.path.join(BASE_DIR, "figures")
SRC_ART = os.path.join(FIG_DIR, "base_3d_microbiology_clean.jpg")
OUT_JPG = os.path.join(FIG_DIR, "cover_ar_physics4microbio2027.jpg")
OUT_PNG = os.path.join(FIG_DIR, "cover_ar_physics4microbio2027.png")

FONT_PATH = "/System/Library/Fonts/Supplemental/SukhumvitSet.ttc"
HELV_PATH = "/System/Library/Fonts/Helvetica.ttc"

def get_font(size, index=5):
    try:
        return ImageFont.truetype(FONT_PATH, size, index=index)
    except Exception:
        return ImageFont.truetype("/System/Library/Fonts/Supplemental/Thonburi.ttc", size, index=0)

def get_helv_font(size, index=1):
    try:
        return ImageFont.truetype(HELV_PATH, size, index=index)
    except Exception:
        return get_font(size, index=5)

# Standard ArUco 4x4 Dictionary bit patterns
ARUCO_ID0 = [
    [1, 0, 1, 1],
    [0, 1, 0, 0],
    [0, 0, 1, 0],
    [1, 0, 1, 0]
]

def draw_text_with_shadow(draw, pos, text, font, fill, shadow_fill=(0, 0, 0, 220), offset=(2, 3), glow=False):
    x, y = pos
    ox, oy = offset
    # Shadow layer
    draw.text((x + ox, y + oy), text, font=font, fill=shadow_fill)
    if glow:
        draw.text((x - 1, y - 1), text, font=font, fill=(0, 0, 0, 150))
        draw.text((x + 1, y - 1), text, font=font, fill=(0, 0, 0, 150))
        draw.text((x - 1, y + 1), text, font=font, fill=(0, 0, 0, 150))
        draw.text((x + 1, y + 1), text, font=font, fill=(0, 0, 0, 150))
    # Main text layer
    draw.text((x, y), text, font=font, fill=fill)

def main():
    print(f"[1/4] Loading base artwork: {SRC_ART}")
    base_img = Image.open(SRC_ART).convert("RGBA")
    w, h = base_img.size
    assert (w, h) == (1600, 2400), f"Expected 1600x2400, got {w}x{h}"

    # Create overlay canvas
    overlay = Image.new("RGBA", (w, h), (0, 0, 0, 0))
    draw = ImageDraw.Draw(overlay)

    # =========================================================================
    # ZONE 1: UPPER 35% (Y: 0 - 840) — TITLES & BADGES
    # =========================================================================

    # 1.1 Top Series Badge
    f_badge = get_helv_font(28, index=1)
    badge_text = "DIGITAL AGRI-PHYSICS & MICROBIOLOGY SERIES 2027 • VOL. 02"
    bbox_b = draw.textbbox((0, 0), badge_text, font=f_badge)
    bw = bbox_b[2] - bbox_b[0]
    bx = (w - bw) // 2
    by = 75

    # Badge Pill Backdrop
    draw.rounded_rectangle([bx - 24, by - 8, bx + bw + 24, by + 36], radius=18,
                           fill=(15, 23, 42, 210), outline=(56, 189, 248, 180), width=2)
    draw_text_with_shadow(draw, (bx, by), badge_text, f_badge, fill=(56, 189, 248, 255), offset=(1, 2))

    # 1.2 Course Code & Credits Ribbon
    f_course = get_font(26, index=4)
    course_text = "รหัสวิชา 4011111  •  ฟิสิกส์สำหรับจุลชีววิทยา  3(2-3-4)  •  OBE Constructive Alignment"
    bbox_c = draw.textbbox((0, 0), course_text, font=f_course)
    cw = bbox_c[2] - bbox_c[0]
    cx = (w - cw) // 2
    cy = 138
    draw.rounded_rectangle([cx - 20, cy - 6, cx + cw + 20, cy + 34], radius=16,
                           fill=(6, 78, 59, 190), outline=(52, 211, 153, 160), width=1)
    draw_text_with_shadow(draw, (cx, cy), course_text, f_course, fill=(167, 243, 208, 255), offset=(1, 2))

    # 1.3 Main Thai Title (Cluster-Safe Multi-Coloring with Dual-Layer Glow)
    # Clusters: "ฟิ" (Cyan), "สิกส์" (Emerald), "สำหรับ" (Amber), "จุล" (Violet), "ชีววิทยา" (Rose)
    f_thai_title = get_font(108, index=5)
    thai_clusters = [
        ("ฟิ", (56, 189, 248, 255)),        # Cyan #38BDF8
        ("สิกส์", (52, 211, 153, 255)),     # Emerald #34D399
        ("สำหรับ", (251, 191, 36, 255)),    # Amber #FBBF24
        ("จุล", (192, 132, 252, 255)),      # Violet #C084FC
        ("ชีววิทยา", (251, 113, 133, 255))   # Rose #FB7185
    ]
    full_thai = "".join([c[0] for c in thai_clusters])
    bbox_thai = draw.textbbox((0, 0), full_thai, font=f_thai_title)
    thai_w = bbox_thai[2] - bbox_thai[0]
    start_tx = (w - thai_w) // 2
    ty = 195

    # First pass: Drop shadow for whole Thai title
    curr_x = start_tx
    for cluster_text, _ in thai_clusters:
        draw.text((curr_x + 3, ty + 5), cluster_text, font=f_thai_title, fill=(0, 0, 0, 230))
        draw.text((curr_x - 1, ty - 1), cluster_text, font=f_thai_title, fill=(0, 0, 0, 160))
        draw.text((curr_x + 1, ty - 1), cluster_text, font=f_thai_title, fill=(0, 0, 0, 160))
        draw.text((curr_x - 1, ty + 1), cluster_text, font=f_thai_title, fill=(0, 0, 0, 160))
        draw.text((curr_x + 1, ty + 1), cluster_text, font=f_thai_title, fill=(0, 0, 0, 160))
        b = draw.textbbox((0, 0), cluster_text, font=f_thai_title)
        curr_x += (b[2] - b[0])

    # Second pass: Colored clusters
    curr_x = start_tx
    for cluster_text, color in thai_clusters:
        draw.text((curr_x, ty), cluster_text, font=f_thai_title, fill=color)
        b = draw.textbbox((0, 0), cluster_text, font=f_thai_title)
        curr_x += (b[2] - b[0])

    # 1.4 Prominent English Title (Bigger & Bolder per Standard)
    f_eng_title = get_helv_font(62, index=1) # Bold Helvetica
    eng_text = "PHYSICS FOR MICROBIOLOGY"
    bbox_eng = draw.textbbox((0, 0), eng_text, font=f_eng_title)
    eng_w = bbox_eng[2] - bbox_eng[0]
    eng_x = (w - eng_w) // 2
    eng_y = 330
    draw_text_with_shadow(draw, (eng_x, eng_y), eng_text, f_eng_title, fill=(255, 255, 255, 255),
                          shadow_fill=(0, 0, 0, 240), offset=(3, 4), glow=True)

    # 1.5 Academic Subtitle
    f_sub = get_font(33, index=4)
    sub_text = "เอกสารคำสอนและคู่มือปฏิบัติการฟิสิกส์ประยุกต์สำหรับนักศึกษาจุลชีววิทยา"
    bbox_sub = draw.textbbox((0, 0), sub_text, font=f_sub)
    sub_w = bbox_sub[2] - bbox_sub[0]
    sub_x = (w - sub_w) // 2
    sub_y = 412
    draw_text_with_shadow(draw, (sub_x, sub_y), sub_text, f_sub, fill=(226, 232, 240, 255), offset=(2, 2))

    # 1.6 High-Impact 3D WebAR & ArUco Interactive Cyber-Pill
    pill_x0 = 120
    pill_y0 = 472
    pill_x1 = 1480
    pill_y1 = 576

    # Glowing Backdrop Card
    draw.rounded_rectangle([pill_x0, pill_y0, pill_x1, pill_y1], radius=38,
                           fill=(10, 18, 38, 235), outline=(0, 240, 255, 255), width=3)
    # Secondary Inner Border Line
    draw.rounded_rectangle([pill_x0 + 4, pill_y0 + 4, pill_x1 - 4, pill_y1 - 4], radius=34,
                           fill=None, outline=(16, 185, 129, 140), width=1)

    # Draw ArUco Marker ID 0 Glyph (6x6 cells: 1-cell black border + 4x4 inner data)
    mx0 = pill_x0 + 28
    my0 = pill_y0 + 16
    mcell = 12
    # Outer white border ring
    draw.rectangle([mx0 - 4, my0 - 4, mx0 + 6 * mcell + 4, my0 + 6 * mcell + 4], fill=(255, 255, 255, 255))
    # Outer black ring
    draw.rectangle([mx0 - 2, my0 - 2, mx0 + 6 * mcell + 2, my0 + 6 * mcell + 2], fill=(0, 0, 0, 255))
    for r in range(6):
        for c in range(6):
            is_white = False
            if 1 <= r <= 4 and 1 <= c <= 4:
                is_white = (ARUCO_ID0[r - 1][c - 1] == 1)
            f_col = (255, 255, 255, 255) if is_white else (10, 15, 30, 255)
            draw.rectangle([mx0 + c * mcell, my0 + r * mcell, mx0 + (c + 1) * mcell, my0 + (r + 1) * mcell], fill=f_col)

    # ArUco Marker Label below glyph
    f_glyph = get_helv_font(14, index=1)
    draw.text((mx0 + 8, my0 + 6 * mcell + 6), "ARUCO ID 0", font=f_glyph, fill=(56, 189, 248, 255))

    # Text inside Cyber-Pill
    f_pill_title = get_font(31, index=5)
    f_pill_sub = get_font(23, index=4)

    ptx = mx0 + 6 * mcell + 30
    pty1 = pill_y0 + 22
    pty2 = pill_y0 + 62

    draw_text_with_shadow(draw, (ptx, pty1), "3D WebAR & ArUco Marker Interactive Edition", f_pill_title, fill=(52, 211, 153, 255), offset=(2, 2))
    draw_text_with_shadow(draw, (ptx, pty2), "📷 สแกน ArUco Marker 12 บท • 🌐 3D WebGL PBR • 📱 ใช้งานบนสมาร์ทโฟน 100% ไร้แอป", f_pill_sub, fill=(203, 213, 225, 255), offset=(1, 2))

    # =========================================================================
    # ZONE 2: MIDGROUND 45% (Y: 840 - 1920) — HOLOGRAPHIC AR OVERLAYS
    # =========================================================================

    # Add Floating Holographic AR Scanning Reticle around the 3D Bacteria Model
    hx0, hy0, hx1, hy1 = 1040, 1140, 1420, 1520
    # Corner Reticle Brackets
    c_len = 30
    draw.line([(hx0, hy0), (hx0 + c_len, hy0)], fill=(0, 240, 255, 240), width=4)
    draw.line([(hx0, hy0), (hx0, hy0 + c_len)], fill=(0, 240, 255, 240), width=4)

    draw.line([(hx1, hy0), (hx1 - c_len, hy0)], fill=(0, 240, 255, 240), width=4)
    draw.line([(hx1, hy0), (hx1, hy0 + c_len)], fill=(0, 240, 255, 240), width=4)

    draw.line([(hx0, hy1), (hx0 + c_len, hy1)], fill=(0, 240, 255, 240), width=4)
    draw.line([(hx0, hy1), (hx0, hy1 - c_len)], fill=(0, 240, 255, 240), width=4)

    draw.line([(hx1, hy1), (hx1 - c_len, hy1)], fill=(0, 240, 255, 240), width=4)
    draw.line([(hx1, hy1), (hx1, hy1 - c_len)], fill=(0, 240, 255, 240), width=4)

    # Floating AR Target Badge
    f_ar_tag = get_helv_font(18, index=1)
    draw.rounded_rectangle([hx0 + 10, hy0 - 32, hx0 + 260, hy0 - 6], radius=8,
                           fill=(15, 23, 42, 220), outline=(0, 240, 255, 200), width=1)
    draw.text((hx0 + 22, hy0 - 28), "🎯 AR TARGET LOCKED: ID 00-11", font=f_ar_tag, fill=(0, 240, 255, 255))

    # =========================================================================
    # ZONE 3: BOTTOM 20% (Y: 1920 - 2400) — AUTHOR METADATA CANVAS
    # =========================================================================

    # Bottom Gradient Ground Shade for maximum contrast
    ground_shade = Image.new("RGBA", (w, 480), (0, 0, 0, 0))
    g_draw = ImageDraw.Draw(ground_shade)
    for gy in range(480):
        alpha = int((gy / 480.0) ** 1.5 * 210)
        g_draw.line([(0, gy), (w, gy)], fill=(4, 8, 18, alpha))
    overlay.paste(ground_shade, (0, 1920), ground_shade)

    # 3.1 Author Name (Bold White Typography)
    f_author = get_font(64, index=5)
    author_text = "ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา"
    bbox_a = draw.textbbox((0, 0), author_text, font=f_author)
    aw = bbox_a[2] - bbox_a[0]
    ax = (w - aw) // 2
    ay = 1995
    draw_text_with_shadow(draw, (ax, ay), author_text, f_author, fill=(255, 255, 255, 255),
                          shadow_fill=(0, 0, 0, 255), offset=(3, 4), glow=True)

    # 3.2 Academic Affiliation
    f_affil = get_font(38, index=4)
    affil_text = "สาขาวิชาฟิสิกส์  คณะวิทยาศาสตร์และเทคโนโลยี"
    bbox_af = draw.textbbox((0, 0), affil_text, font=f_affil)
    af_w = bbox_af[2] - bbox_af[0]
    af_x = (w - af_w) // 2
    af_y = 2085
    draw_text_with_shadow(draw, (af_x, af_y), affil_text, f_affil, fill=(226, 232, 240, 255),
                          shadow_fill=(0, 0, 0, 230), offset=(2, 3))

    # 3.3 Institution & Buddhist Era Year
    f_inst = get_font(35, index=4)
    inst_text = "มหาวิทยาลัยราชภัฏรำไพพรรณี  •  พ.ศ. ๒๕๗๐"
    bbox_in = draw.textbbox((0, 0), inst_text, font=f_inst)
    in_w = bbox_in[2] - bbox_in[0]
    in_x = (w - in_w) // 2
    in_y = 2145
    draw_text_with_shadow(draw, (in_x, in_y), inst_text, f_inst, fill=(253, 224, 71, 255), # Warm Gold #FDE047
                          shadow_fill=(0, 0, 0, 230), offset=(2, 3))

    # 3.4 WebAR URL Ribbon at bottom
    f_url = get_helv_font(21, index=1)
    url_text = "🌐 WebAR Simulator: tsanaphysics.github.io/physics4microbiology2027/ar.html"
    bbox_u = draw.textbbox((0, 0), url_text, font=f_url)
    uw = bbox_u[2] - bbox_u[0]
    ux = (w - uw) // 2
    uy = 2225
    draw.rounded_rectangle([ux - 20, uy - 6, ux + uw + 20, uy + 30], radius=15,
                           fill=(15, 23, 42, 210), outline=(56, 189, 248, 140), width=1)
    draw_text_with_shadow(draw, (ux, uy), url_text, f_url, fill=(147, 197, 253, 255), offset=(1, 1))

    # Composite final image
    final_img = Image.alpha_composite(base_img, overlay)

    print(f"[2/4] Saving final cover PNG: {OUT_PNG}")
    final_img.save(OUT_PNG, format="PNG")

    print(f"[3/4] Saving final cover JPEG (Quality 96): {OUT_JPG}")
    final_img.convert("RGB").save(OUT_JPG, format="JPEG", quality=96)

    # Sync to root and แผนการสอน 2027/
    dest_paths = [
        "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/cover_ar_physics4microbio2027.jpg",
        "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/cover_ar_physics4microbio2027.jpg",
        "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/cover_ar_physics4microbio2027.jpg"
    ]
    for dp in dest_paths:
        os.makedirs(os.path.dirname(dp), exist_ok=True)
        final_img.convert("RGB").save(dp, format="JPEG", quality=96)
        print(f"  -> Synced to: {dp}")

    print("[4/4] Cover Generation Complete Successfully!")

if __name__ == "__main__":
    main()
