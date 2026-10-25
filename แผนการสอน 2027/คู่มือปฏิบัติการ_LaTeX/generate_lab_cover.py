#!/usr/bin/env python3
"""
Clean 3D Pixar Cover Generator for คู่มือปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา
(PHYSICS FOR MICROBIOLOGY LABORATORY MANUAL - Course Code 4011111)
Follows /academic-book-cover-architect:
- Uses the 3D Pixar Lab Professor + DNA & Membrane Biophysics artwork (1600x2400)
- Reconstructs clean smooth gradient in upper sky zone (0% ghost text) while preserving the pristine 3D desk & author metadata at the bottom
- Applies Dual-Layer Drop-Shadow Multicolor Thai Clusters + Prominent English Title
"""
import os
import numpy as np
from PIL import Image, ImageDraw, ImageFont

src_path = "/Applications/XAMPP/xamppfiles/htdocs/ALL_21_COVERS_FINAL/cover_physics_lifesciences_final.jpg"
out_dir = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/คู่มือปฏิบัติการ_LaTeX/figures"
os.makedirs(out_dir, exist_ok=True)

im = Image.open(src_path).convert("RGB")
arr = np.array(im, dtype=np.float32)
h, w, _ = arr.shape  # 2400 x 1600

# Clean upper sky zone (y = 80 to 480) using smooth vertical interpolation from clean rows y=75 and y=485
y_top = 75
y_bot = 485
row_top = arr[y_top:y_top+5, :, :].mean(axis=0)
row_bot = arr[y_bot:y_bot+5, :, :].mean(axis=0)
for y in range(y_top, y_bot):
    t = (y - y_top) / float(y_bot - y_top)
    arr[y, :, :] = (1.0 - t) * row_top + t * row_bot

clean_art = Image.fromarray(np.clip(arr, 0, 255).astype(np.uint8))

target_w, target_h = w, h
base_img = clean_art.convert("RGBA")
overlay = Image.new("RGBA", (target_w, target_h), (255, 255, 255, 0))
draw = ImageDraw.Draw(overlay)

font_path = "/System/Library/Fonts/Supplemental/SukhumvitSet.ttc"
if not os.path.exists(font_path):
    font_path = "/System/Library/Fonts/Supplemental/Thonburi.ttc"

def get_font(size, index=4):
    try:
        return ImageFont.truetype(font_path, size=size, index=index)
    except Exception:
        return ImageFont.truetype(font_path, size=size)

font_badge = get_font(36, index=4)
font_title = get_font(76, index=4)
font_eng_title = get_font(44, index=4)
font_subtitle = get_font(28, index=1)

def draw_text_with_shadow(draw_obj, xy, text, font, fill_color, shadow_color, offset=(2, 2), shadow_blur=4):
    x, y = xy
    for dx in range(-shadow_blur, shadow_blur + 1):
        for dy in range(-shadow_blur, shadow_blur + 1):
            if dx*dx + dy*dy <= shadow_blur*shadow_blur:
                draw_obj.text((x + offset[0] + dx*0.7, y + offset[1] + dy*0.7), text, font=font, fill=shadow_color)
    draw_obj.text((x, y), text, font=font, fill=fill_color)

# Badge
badge_text = "คู่มือปฏิบัติการรายวิชา 4011111  •  13 การทดลองมาตรฐาน OBE (3 ชั่วโมง/สัปดาห์)"
bbox_b = draw.textbbox((0, 0), badge_text, font=font_badge)
bx = (target_w - (bbox_b[2] - bbox_b[0])) // 2
draw_text_with_shadow(draw, (bx, 115), badge_text, font_badge,
                      fill_color=(103, 232, 249, 255), shadow_color=(0, 0, 0, 235),
                      offset=(0, 2), shadow_blur=4)

# Multicolor Thai Clusters: คู่มือปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา
clusters = [
    ("คู่มือ", (250, 204, 21)),
    ("ปฏิบัติการ", (52, 211, 153)),
    ("ฟิสิกส์", (56, 189, 248)),
    ("สำหรับ", (244, 114, 182)),
    ("จุลชีววิทยา", (251, 146, 60)),
]
cluster_widths = []
total_title_w = 0
for c_text, _ in clusters:
    bbox = draw.textbbox((0, 0), c_text, font=font_title)
    cw = bbox[2] - bbox[0]
    cluster_widths.append(cw)
    total_title_w += cw

title_x = (target_w - total_title_w) // 2
title_y = 190
cur_x = title_x
for (c_text, _), cw in zip(clusters, cluster_widths):
    for dx in range(-4, 5):
        for dy in range(-4, 5):
            if dx*dx + dy*dy <= 16:
                draw.text((cur_x + dx*0.9, title_y + dy*0.9 + 2), c_text, font=font_title, fill=(0, 0, 0, 240))
    cur_x += cw

cur_x = title_x
for (c_text, color), cw in zip(clusters, cluster_widths):
    draw.text((cur_x, title_y), c_text, font=font_title, fill=(*color, 255))
    cur_x += cw

# Prominent English Title
eng_title = "PHYSICS FOR MICROBIOLOGY LABORATORY MANUAL"
bbox_e = draw.textbbox((0, 0), eng_title, font=font_eng_title)
ex = (target_w - (bbox_e[2] - bbox_e[0])) // 2
draw_text_with_shadow(draw, (ex, 325), eng_title, font_eng_title,
                      fill_color=(255, 255, 255, 255), shadow_color=(0, 0, 0, 240),
                      offset=(0, 2), shadow_blur=4)

# Subtitle
subtitle = "ไมโครปิเปต • ความหนืด • Centrifuge • Autoclave • อิเล็กโทรโฟรีซิส • กล้องจุลทรรศน์ 100x • สเปกโตรโฟโตมิเตอร์ OD600"
bbox_s = draw.textbbox((0, 0), subtitle, font=font_subtitle)
sx = (target_w - (bbox_s[2] - bbox_s[0])) // 2
draw_text_with_shadow(draw, (sx, 405), subtitle, font_subtitle,
                      fill_color=(226, 232, 240, 255), shadow_color=(0, 0, 0, 230),
                      offset=(0, 2), shadow_blur=3)

final_img = Image.alpha_composite(base_img, overlay).convert("RGB")
out_cover_jpg = os.path.join(out_dir, "cover_lab_physics4microbio2027.jpg")
out_cover_png = os.path.join(out_dir, "cover_lab_physics4microbio2027.png")
final_img.save(out_cover_jpg, quality=98)
final_img.save(out_cover_png, format="PNG")
print("[OK] Saved clean lab manual cover:", out_cover_jpg)
