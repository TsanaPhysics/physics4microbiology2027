import os
import math
from PIL import Image, ImageDraw, ImageFont, ImageFilter, ImageEnhance

# 1. Output setup
OUT_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/pr_facebook_banner"
os.makedirs(OUT_DIR, exist_ok=True)
OUT_PATH = os.path.join(OUT_DIR, "facebook_banner_16x9.png")
OUT_PATH_1200 = os.path.join(OUT_DIR, "facebook_banner_1200x630.png")

# Canvas dimensions
W, H = 1920, 1080

# 2. Font configuration (macOS system fonts)
FONT_TH_PATH = "/System/Library/Fonts/Supplemental/SukhumvitSet.ttc"
FONT_ENG_PATH = "/System/Library/Fonts/Helvetica.ttc"

def get_font_th(size, weight="bold"):
    idx = 5 if weight == "bold" else (4 if weight == "semibold" else (3 if weight == "medium" else 2))
    return ImageFont.truetype(FONT_TH_PATH, size, index=idx)

def get_font_eng(size, bold=True):
    idx = 1 if bold else 0
    return ImageFont.truetype(FONT_ENG_PATH, size, index=idx)

font_badge = get_font_th(24, "semibold")
font_inst = get_font_th(26, "semibold")
font_h1_sub = get_font_th(32, "bold")
font_h1_main = get_font_th(64, "bold")
font_eng_title = get_font_eng(30, bold=True)
font_tagline = get_font_th(28, "medium")
font_item_title = get_font_th(26, "bold")
font_item_desc = get_font_th(22, "medium")
font_author_name = get_font_th(28, "bold")
font_author_sub = get_font_th(22, "medium")
font_pill = get_font_th(22, "bold")
font_book_badge = get_font_th(20, "bold")

# 3. Create high-tech deep background
img = Image.new("RGBA", (W, H), (6, 12, 24, 255))
draw = ImageDraw.Draw(img)

# Radial gradients / auroras
for y in range(H):
    # Base vertical gradient: deep midnight blue to rich teal-navy
    r = int(6 + (y / H) * 8)
    g = int(14 + (y / H) * 22)
    b = int(28 + (y / H) * 24)
    draw.line([(0, y), (W, y)], fill=(r, g, b, 255))

# Soft glowing spots using overlay
glow_overlay = Image.new("RGBA", (W, H), (0, 0, 0, 0))
glow_draw = ImageDraw.Draw(glow_overlay)

# Top-right cyan aura (above AR book)
glow_draw.ellipse([1200, -100, 2050, 650], fill=(0, 220, 255, 38))
# Mid-left emerald aura (behind text)
glow_draw.ellipse([-150, 200, 600, 900], fill=(16, 185, 129, 30))
# Center glowing pedestal aura
glow_draw.ellipse([850, 750, 1900, 1150], fill=(0, 245, 212, 45))

glow_overlay = glow_overlay.filter(ImageFilter.GaussianBlur(100))
img = Image.alpha_composite(img, glow_overlay)
draw = ImageDraw.Draw(img)

# Subtle scientific coordinate grid
grid_overlay = Image.new("RGBA", (W, H), (0, 0, 0, 0))
grid_draw = ImageDraw.Draw(grid_overlay)
for x in range(0, W, 80):
    grid_draw.line([(x, 0), (x, H)], fill=(255, 255, 255, 6))
for y in range(0, H, 80):
    grid_draw.line([(0, y), (W, y)], fill=(255, 255, 255, 6))
img = Image.alpha_composite(img, grid_overlay)
draw = ImageDraw.Draw(img)

# 4. Glass pedestal platform on the right for 3D Books
pedestal_w = 980
pedestal_h = 75
ped_x = 900
ped_y = 880

# Pedestal glow ellipse
draw.ellipse([ped_x - 40, ped_y + 10, ped_x + pedestal_w + 40, ped_y + 65], fill=(0, 255, 210, 40))
# Main glass top
draw.rounded_rectangle([ped_x, ped_y, ped_x + pedestal_w, ped_y + pedestal_h], radius=16, fill=(15, 35, 55, 220), outline=(0, 240, 255, 180), width=2)
# Pedestal neon core line
draw.line([(ped_x + 30, ped_y + 2), (ped_x + pedestal_w - 30, ped_y + 2)], fill=(0, 255, 240, 240), width=2)

# 5. Load and process 3 Book Covers
cover_base_path = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027"
p1 = os.path.join(cover_base_path, "cover_physics4microbio2027.jpg")
p2 = os.path.join(cover_base_path, "cover_lab_physics4microbio2027.jpg")
p3 = os.path.join(cover_base_path, "cover_ar_physics4microbio2027.jpg")

im1 = Image.open(p1).convert("RGBA")
im2 = Image.open(p2).convert("RGBA")
im3 = Image.open(p3).convert("RGBA")

# Dimensions for books:
# Book 1 (Left, Theory): 360 x 540
# Book 3 (Right, 3D WebAR): 370 x 555
# Book 2 (Center, Lab Manual - hero elevation): 390 x 585

def make_3d_book(im, target_w, target_h, border_color=(0, 220, 255, 220), spine_side="left"):
    resized = im.resize((target_w, target_h), Image.Resampling.LANCZOS)
    
    # Create canvas with book spine & shadow margin
    pad_x = 40
    pad_y = 50
    canvas_w = target_w + pad_x * 2
    canvas_h = target_h + pad_y * 2
    book_layer = Image.new("RGBA", (canvas_w, canvas_h), (0, 0, 0, 0))
    b_draw = ImageDraw.Draw(book_layer)
    
    bx = pad_x
    by = pad_y
    
    # White pages thickness (3D effect)
    if spine_side == "left":
        # Right page edge
        for t in range(12):
            shade = 220 - t * 10
            b_draw.line([(bx + target_w + t, by + 6), (bx + target_w + t, by + target_h - 4)], fill=(shade, shade, shade, 230))
        # Bottom page edge
        for t in range(8):
            shade = 200 - t * 12
            b_draw.line([(bx + 8, by + target_h + t), (bx + target_w + 10, by + target_h + t)], fill=(shade, shade, shade, 220))
    else:
        # Left page edge
        for t in range(12):
            shade = 220 - t * 10
            b_draw.line([(bx - t, by + 6), (bx - t, by + target_h - 4)], fill=(shade, shade, shade, 230))
        for t in range(8):
            shade = 200 - t * 12
            b_draw.line([(bx - 10, by + target_h + t), (bx + target_w - 8, by + target_h + t)], fill=(shade, shade, shade, 220))

    # Paste cover image
    book_layer.paste(resized, (bx, by), resized)
    
    # Subtle inner bevel / border highlight
    b_draw.rectangle([bx, by, bx + target_w, by + target_h], outline=border_color, width=2)
    # Left spine shadow
    spine_overlay = Image.new("RGBA", (14, target_h), (0, 0, 0, 0))
    s_draw = ImageDraw.Draw(spine_overlay)
    for i in range(14):
        alpha = int(140 * (1 - i / 14))
        s_draw.line([(i, 0), (i, target_h)], fill=(0, 0, 0, alpha))
    book_layer.paste(spine_overlay, (bx, by), spine_overlay)
    
    # Subtle gloss sheen
    sheen = Image.new("RGBA", (target_w, target_h), (0, 0, 0, 0))
    sh_draw = ImageDraw.Draw(sheen)
    sh_draw.polygon([(0, 0), (int(target_w * 0.45), 0), (int(target_w * 0.15), target_h), (0, target_h)], fill=(255, 255, 255, 22))
    book_layer.paste(sheen, (bx, by), sheen)
    
    # Drop shadow
    shadow = Image.new("RGBA", (canvas_w, canvas_h), (0, 0, 0, 0))
    sh_d = ImageDraw.Draw(shadow)
    sh_d.rounded_rectangle([bx + 4, by + 12, bx + target_w + 14, by + target_h + 18], radius=16, fill=(0, 0, 0, 180))
    shadow = shadow.filter(ImageFilter.GaussianBlur(16))
    
    final_book = Image.alpha_composite(shadow, book_layer)
    return final_book

# Generate the 3 3D books
book1_img = make_3d_book(im1, 355, 532, border_color=(20, 184, 166, 220), spine_side="left")
book3_img = make_3d_book(im3, 375, 562, border_color=(6, 182, 212, 240), spine_side="left")
book2_img = make_3d_book(im2, 395, 592, border_color=(16, 185, 129, 255), spine_side="left")

# Coordinates on canvas
# Book 1: left
b1_x = 910
b1_y = 360
# Book 3: right
b3_x = 1435
b3_y = 330
# Book 2: center (foreground, lowest y so elevated, paste last)
b2_x = 1170
b2_y = 295

# Composite books
img.paste(book1_img, (b1_x, b1_y), book1_img)
img.paste(book3_img, (b3_x, b3_y), book3_img)
img.paste(book2_img, (b2_x, b2_y), book2_img)

# Re-acquire draw
draw = ImageDraw.Draw(img)

# Badges above each book
def draw_badge(x, y, text, color=(16, 185, 129), bg=(10, 30, 45, 220)):
    bbox = font_book_badge.getbbox(text)
    bw = bbox[2] - bbox[0] + 28
    bh = bbox[3] - bbox[1] + 16
    draw.rounded_rectangle([x - bw//2, y, x + bw//2, y + bh], radius=bh//2, fill=bg, outline=color, width=2)
    draw.text((x - (bbox[2] - bbox[0])//2, y + 8), text, fill=(255, 255, 255), font=font_book_badge)

draw_badge(b1_x + 355//2 + 40, b1_y + 20, "📘 เล่ม 1: คำสอน (107 หน้า)", color=(45, 212, 191))
draw_badge(b2_x + 395//2 + 40, b2_y - 25, "📗 เล่ม 2: คู่มือแล็บ (98 หน้า)", color=(52, 211, 153), bg=(6, 78, 59, 240))
draw_badge(b3_x + 375//2 + 40, b3_y + 10, "📷 เล่ม 3: 3D AR (115 หน้า)", color=(34, 211, 238), bg=(12, 74, 96, 240))

# -------------------------------------------------------------
# 6. LEFT INFORMATION & TYPOGRAPHY REGION
# -------------------------------------------------------------
left_margin = 85
cur_y = 70

# Top Pill Header (Series Badge)
badge_text = "✨ สื่อการสอนมาตรฐาน OBE 2570 • คณะวิทยาศาสตร์และเทคโนโลยี มรภ.รำไพพรรณี"
b_box = font_badge.getbbox(badge_text)
badge_w = b_box[2] - b_box[0] + 36
badge_h = b_box[3] - b_box[1] + 18
draw.rounded_rectangle([left_margin, cur_y, left_margin + badge_w, cur_y + badge_h], radius=badge_h//2, fill=(16, 185, 129, 45), outline=(52, 211, 153, 200), width=2)
draw.text((left_margin + 18, cur_y + 9), badge_text, fill=(110, 231, 183), font=font_badge)

cur_y += badge_h + 24

# Main Category / Lead
draw.text((left_margin, cur_y), "เปิดตัวชุดตำราและนวัตกรรมการเรียนรู้ 3 เล่มครบวงจร", fill=(251, 191, 36), font=font_h1_sub)
cur_y += 46

# Big Main Thai Title: ฟิสิกส์สำหรับจุลชีววิทยา
# Glow effect on title
glow_t = Image.new("RGBA", (W, H), (0, 0, 0, 0))
gt_draw = ImageDraw.Draw(glow_t)
gt_draw.text((left_margin, cur_y), "ฟิสิกส์สำหรับจุลชีววิทยา", fill=(0, 240, 255, 180), font=font_h1_main)
glow_t = glow_t.filter(ImageFilter.GaussianBlur(12))
img = Image.alpha_composite(img, glow_t)
draw = ImageDraw.Draw(img)

draw.text((left_margin, cur_y), "ฟิสิกส์สำหรับจุลชีววิทยา", fill=(255, 255, 255), font=font_h1_main)
cur_y += 82

# English Subtitle
draw.text((left_margin, cur_y), "PHYSICS FOR MICROBIOLOGY • 3-BOOK TRILOGY SET", fill=(56, 189, 248), font=font_eng_title)
cur_y += 48

# Tagline bar
tagline = "“เรียนรู้ฟิสิกส์ผ่านเครื่องมือแล็บจริง ไร้แคลคูลัส (Low-Math Guide) พร้อม 3D WebAR”"
draw.text((left_margin, cur_y), tagline, fill=(226, 232, 240), font=font_tagline)
cur_y += 48

# Divider line
draw.line([(left_margin, cur_y), (left_margin + 740, cur_y)], fill=(51, 65, 85, 200), width=2)
cur_y += 24

# 3 Feature Cards
features = [
    {
        "icon": "📘",
        "tag": "เล่มที่ 1 | เอกสารคำสอน 12 บทเรียน OBE (107 หน้า)",
        "desc": "ครอบคลุม PLO1–PLO6 เชื่อมโยงเครื่องมือแล็บจริงด้วยเทคนิคสามเหลี่ยมสูตร บันไดแปลงหน่วยไมโครลิตร",
        "color": (45, 212, 191)
    },
    {
        "icon": "📗",
        "tag": "เล่มที่ 2 | คู่มือปฏิบัติการ 13 การทดลอง (98 หน้า)",
        "desc": "คู่มือแล็บและใบบันทึกผลจริง: Micropipette, Centrifuge, Autoclave, Oil Immersion 100x, OD600",
        "color": (52, 211, 153)
    },
    {
        "icon": "📷",
        "tag": "เล่มที่ 3 | ฉบับความจริงเสริม 3D WebAR + ArUco (115 หน้า)",
        "desc": "นวัตกรรมสแกน ArUco Marker (ID 0–11) ด้วยกล้องสมาร์ทโฟน 100% ส่องดูโมเดล 3D PBR เสมือนจริง",
        "color": (34, 211, 238)
    }
]

for item in features:
    card_w = 750
    card_h = 80
    # Card background glass
    draw.rounded_rectangle([left_margin, cur_y, left_margin + card_w, cur_y + card_h], radius=14, fill=(15, 23, 42, 180), outline=(51, 65, 85, 180), width=1)
    # Accent indicator bar on left
    draw.rounded_rectangle([left_margin, cur_y, left_margin + 6, cur_y + card_h], radius=3, fill=item["color"])
    
    # Text
    draw.text((left_margin + 20, cur_y + 12), f"{item['icon']} {item['tag']}", fill=item["color"], font=font_item_title)
    draw.text((left_margin + 22, cur_y + 44), item["desc"], fill=(203, 213, 225), font=font_item_desc)
    
    cur_y += card_h + 14

cur_y += 10

# Author & CTA Bar
bottom_box_w = 750
bottom_box_h = 100
draw.rounded_rectangle([left_margin, cur_y, left_margin + bottom_box_w, cur_y + bottom_box_h], radius=16, fill=(13, 26, 44, 230), outline=(0, 240, 255, 120), width=2)

# Author Avatar / Profile circle or icon
draw.ellipse([left_margin + 18, cur_y + 16, left_margin + 84, cur_y + 82], fill=(6, 78, 59, 240), outline=(52, 211, 153), width=2)
draw.text((left_margin + 33, cur_y + 30), "👨‍🏫", font=get_font_th(32, "bold"))

# Author info
draw.text((left_margin + 102, cur_y + 20), "ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา", fill=(255, 255, 255), font=font_author_name)
draw.text((left_margin + 102, cur_y + 56), "สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี", fill=(148, 163, 184), font=font_author_sub)

# Right Action Buttons inside bottom bar
cta_w = 160
cta_h = 42
cta_x = left_margin + bottom_box_w - cta_w - 20
cta_y = cur_y + 28
draw.rounded_rectangle([cta_x, cta_y, cta_x + cta_w, cta_y + cta_h], radius=21, fill=(16, 185, 129, 255))
cta_text = "ดาวน์โหลดฟรี 📥"
bbox_c = font_pill.getbbox(cta_text)
draw.text((cta_x + (cta_w - (bbox_c[2]-bbox_c[0]))//2, cta_y + 9), cta_text, fill=(15, 23, 42), font=font_pill)

# Save Master High-Res 1920x1080 PNG
img_rgb = img.convert("RGB")
img_rgb.save(OUT_PATH, quality=95)
print(f"Saved: {OUT_PATH} (1920x1080)")

# Save Facebook Shared Image 1200x630
img_1200 = img_rgb.resize((1200, 675), Image.Resampling.LANCZOS)
# Crop 675 to 630 centered
top_crop = (675 - 630) // 2
img_1200_crop = img_1200.crop((0, top_crop, 1200, top_crop + 630))
img_1200_crop.save(OUT_PATH_1200, quality=95)
print(f"Saved: {OUT_PATH_1200} (1200x630)")
