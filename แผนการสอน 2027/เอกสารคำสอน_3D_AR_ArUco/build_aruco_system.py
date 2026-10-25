#!/usr/bin/env python3
"""
Builds the 3D WebAR (ArUco Marker Edition) of the Lecture Notes Textbook:
4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology — 3D AR & ArUco Edition)
Directory: /Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco
"""
import os
from PIL import Image, ImageDraw, ImageFont, ImageFilter

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco"
TARGETS_DIR = os.path.join(BASE_DIR, "targets")
FIG_DIR = os.path.join(BASE_DIR, "figures")
os.makedirs(TARGETS_DIR, exist_ok=True)
os.makedirs(FIG_DIR, exist_ok=True)

# ==============================================================================
# 1. STANDARD OPENCV DICT_4X4_50 MATRICES (IDs 0 to 11 for Chapters 1 to 12)
# Each entry is a 4x4 grid (row-major, 1 = white cell, 0 = black cell)
# Surrounded by a 1-cell black border (total 6x6 grid)
# ==============================================================================
ARUCO_DICT_4X4 = {
    0: [
        [1, 0, 1, 1],
        [0, 1, 0, 1],
        [0, 0, 1, 1],
        [0, 0, 1, 0],
    ],
    1: [
        [0, 0, 0, 0],
        [1, 1, 1, 1],
        [1, 0, 0, 1],
        [1, 0, 1, 0],
    ],
    2: [
        [0, 0, 1, 1],
        [0, 0, 1, 1],
        [0, 1, 0, 0],
        [1, 1, 0, 1],
    ],
    3: [
        [1, 0, 0, 1],
        [1, 0, 0, 1],
        [0, 1, 0, 0],
        [0, 1, 1, 0],
    ],
    4: [
        [0, 1, 0, 1],
        [0, 1, 1, 0],
        [1, 0, 0, 1],
        [1, 1, 0, 0],
    ],
    5: [
        [1, 1, 0, 1],
        [0, 0, 0, 0],
        [0, 1, 1, 1],
        [0, 1, 1, 0],
    ],
    6: [
        [0, 1, 1, 1],
        [1, 0, 1, 1],
        [0, 0, 0, 0],
        [0, 0, 1, 1],
    ],
    7: [
        [0, 0, 1, 0],
        [1, 0, 0, 0],
        [1, 1, 1, 0],
        [0, 1, 0, 1],
    ],
    8: [
        [1, 1, 1, 0],
        [1, 1, 0, 0],
        [0, 0, 1, 0],
        [1, 0, 0, 1],
    ],
    9: [
        [0, 1, 0, 0],
        [1, 1, 1, 0],
        [1, 0, 1, 1],
        [0, 0, 1, 0],
    ],
    10: [
        [1, 0, 1, 0],
        [0, 0, 1, 0],
        [1, 1, 0, 1],
        [0, 1, 1, 0],
    ],
    11: [
        [1, 1, 0, 0],
        [0, 1, 0, 1],
        [0, 0, 0, 1],
        [1, 1, 1, 0],
    ],
}

CHAPTER_AR_CATALOG = [
    {
        "id": 0,
        "ch": 1,
        "file": "ch01_units_measurement.tex",
        "title_th": "ไมโครปิเปต P1000 และการเจือจางเชื้อแบบลำดับส่วน 3 มิติ",
        "title_en": "3D Micropipette & Serial Dilution ($10^{-1}$ to $10^{-6}$)",
        "desc": "จำลองกลไกลูกสูบไมโครปิเปต 2 จังหวะ และการดูดถ่ายสารละลายแบคทีเรียลดความเข้มข้นทีละ 10 เท่าพร้อมคำนวณค่า CFU/mL สด",
        "params": "ปริมาตรดูด $V$ ($\\mu\\text{L}$), จำนวนขั้นการเจือจาง ($10^{-n}$), จำนวนโคโลนีบนจานเพาะเชื้อ",
    },
    {
        "id": 1,
        "ch": 2,
        "file": "ch02_vectors_motion.tex",
        "title_th": "การว่ายเคลื่อนที่ของแบคทีเรียด้วยแฟลกเจลลาเทียบกับ Brownian Motion",
        "title_en": "3D Bacterial Chemotaxis (Run-and-Tumble) vs. Brownian Motion",
        "desc": "เปรียบเทียบเวกเตอร์การกระจัดลัพธ์ของการว่ายเข้าหาสารอาหารด้วยแฟลกเจลลา กับการสั่นสะเทือนแบบสุ่มของอนุภาคแขวนลอย",
        "params": "อุณหภูมิตัวกลาง $T$ ($^\\circ\\text{C}$), ความเข้มข้นสารดึงดูดเคมี, ความเร็วการหมุนแฟลกเจลลา",
    },
    {
        "id": 2,
        "ch": 3,
        "file": "ch03_newton_viscosity.tex",
        "title_th": "การตกตะกอนตามกฎของสโตกส์และการไหลแบบราบเรียบในตู้ปลอดเชื้อ",
        "title_en": "3D Stokes Sedimentation & Laminar Airflow Biosafety Cabinet",
        "desc": "แสดงสมดุลแรง 3 แรงบนเซลล์จุลินทรีย์ ($m g$, $F_b$, $F_{\\text{drag}}$) และม่านอากาศบริสุทธิ์ผ่านแผ่นกรอง HEPA ในตู้ปลอดเชื้อ",
        "params": "รัศมีเซลล์ $r$ ($\\mu\\text{m}$), ความหนืดของเหลว $\\eta$, อัตราเร็วลมตู้ปลอดเชื้อ ($\\text{m/s}$)",
    },
    {
        "id": 3,
        "ch": 4,
        "file": "ch04_work_energy_centrifuge.tex",
        "title_th": "เครื่องปั่นเหวี่ยงความเร็วสูง การแปลงค่า RCF (xg) และการจัดสมดุลโรเตอร์",
        "title_en": "3D Microcentrifuge Rotor Dynamics & RCF ($\\times g$) Calculator",
        "desc": "จำลองการหมุนของโรเตอร์มุมคงที่ การวางหลอดตัวอย่างถ่วงสมดุลตรงข้ามกัน และการอัดแน่นของเม็ดตะกอนเซลล์ (Pellet) ที่ก้นหลอด",
        "params": "ความเร็วรอบ $\\text{RPM}$ ($1{,}000\\text{--}14{,}000$), รัศมีโรเตอร์ $r_{\\text{cm}}$ ($\\text{cm}$), สมดุลหลอด",
    },
    {
        "id": 4,
        "ch": 5,
        "file": "ch05_heat_incubator.tex",
        "title_th": "การกระจายความร้อนในตู้อบ Incubator 37°C และวัฏจักรอุณหภูมิเครื่อง PCR",
        "title_en": "3D Incubator Convection & PCR Thermal Cycler ($95/55/72\\,^\\circ\\text{C}$)",
        "desc": "จำลองการพาความร้อนภายในตู้อบเลี้ยงเชื้อ และวัฏจักรการเพิ่มปริมาณดีเอ็นเอ 3 ขั้นตอน ($2^n$ เท่า) ในเครื่อง Thermal Cycler",
        "params": "อุณหภูมิแต่ละขั้น ($95\\,^\\circ\\text{C}, 55\\,^\\circ\\text{C}, 72\\,^\\circ\\text{C}$), จำนวนรอบวัฏจักร $n$ ($1\\text{--}35$ รอบ)",
    },
    {
        "id": 5,
        "ch": 6,
        "file": "ch06_thermodynamics_autoclave.tex",
        "title_th": "หม้อนึ่งความดันไอ Autoclave (121°C, 15 psi) และการไล่อากาศ",
        "title_en": "3D Autoclave Saturated Steam Chamber ($121\\,^\\circ\\text{C}$, $15\\text{ psi}$)",
        "desc": "แสดงโครงสร้างภายในหม้อนึ่งความดันไอ การควบแน่นคายความร้อนแฝงของไอน้ำอิ่มตัว และผลเสียของการมีอากาศตกค้างต่อการฆ่าเชื้อสปอร์",
        "params": "ความดันเกจ $P_{\\text{gauge}}$ ($\\text{psi}$), ร้อยละการไล่อากาศออก (\\%), เวลาฆ่าเชื้อ ($\\text{min}$)",
    },
    {
        "id": 6,
        "ch": 7,
        "file": "ch07_electrostatics_staining.tex",
        "title_th": "สนามไฟฟ้าคูลอมบ์ ศักย์ซีตาผนังเซลล์ และการยึดเกาะของสีย้อมแกรม",
        "title_en": "3D Bacterial Cell Wall Zeta Potential & Gram Staining Attraction",
        "desc": "จำลองประจุลบของหมู่ฟอสเฟตบนผนังเซลล์แบคทีเรียที่ดึงดูดไอออนสีย้อมประจุบวก (Crystal Violet) และผลักสีย้อมประจุลบ (Nigrosin)",
        "params": "ชนิดสีย้อม (ประจุบวก / ประจุลบ), ค่า $\\text{pH}$ ของตัวกลาง, ระยะห่างระหว่างประจุ $r$ ($\\text{nm}$)",
    },
    {
        "id": 7,
        "ch": 8,
        "file": "ch08_current_electrophoresis.tex",
        "title_th": "กฎของโอห์มและอ่างแยกสายดีเอ็นเอด้วยสนามไฟฟ้า Gel Electrophoresis",
        "title_en": "3D Agarose Gel Electrophoresis & Ohm's Law (Run to Red)",
        "desc": "จำลองการวิ่งของชิ้นส่วนดีเอ็นเอประจุลบจากขั้วลบ (สีดำ) ไปยังขั้วบวก (สีแดง) แยกตามขนาดโมเลกุล (bp) และความร้อนจูล $P=IV$",
        "params": "ความต่างศักย์ $V$ ($50\\text{--}150\\text{ V}$), ความเข้มข้นเจลอะกาโรส (\\%), เวลาการรันเจล ($\\text{min}$)",
    },
    {
        "id": 8,
        "ch": 9,
        "file": "ch09_optics_refraction.tex",
        "title_th": "การหักเหของสเนลล์และเครื่องวัดค่าบริกซ์การหมักยีสต์ Refractometer",
        "title_en": "3D Snell's Law Laser Refraction & Brix Fermentation Refractometer",
        "desc": "แสดงการเบนของลำแสงเลเซอร์เมื่อผ่านน้ำหมักที่มีความเข้มข้นน้ำตาลต่างกัน และสเกลเส้นแบ่งเขตมืด--สว่างในหน่วยองศาบริกซ์ ($^\\circ\\text{Brix}$)",
        "params": "มุมตกกระทบ $\\theta_1$ ($^\\circ$), ค่าความหวานน้ำหมัก ($0\\text{--}30\\,^\\circ\\text{Brix}$), เวลาการหมักยีสต์",
    },
    {
        "id": 9,
        "ch": 10,
        "file": "ch10_microscope_immersion_oil.tex",
        "title_th": "กล้องจุลทรรศน์เลนส์ประกอบและบทบาทของ Immersion Oil ที่หัวเลนส์ 100x",
        "title_en": "3D Compound Microscope $100\\times$ Objective & Immersion Oil ($n=1.515$)",
        "desc": "เปรียบเทียบกรวยแสงที่พุ่งเข้าสู่หัวเลนส์ $100\\times$ ระหว่างกรณีหยดน้ำมันช่วยส่อง ($n=1.515$) กับช่องว่างอากาศ ($n=1.00$) และคำนวณ $d_{\\min}$",
        "params": "ตัวกลางระหว่างสไลด์กับเลนส์ (อากาศ vs. น้ำมัน $n=1.515$), ความยาวคลื่นแสง $\\lambda$ ($\\text{nm}$)",
    },
    {
        "id": 10,
        "ch": 11,
        "file": "ch11_radioactivity_uv_sterilization.tex",
        "title_th": "กัมมันตภาพรังสี กฎกำลังสองผกผัน และการฆ่าเชื้อด้วยรังสี UV-C (254 nm)",
        "title_en": "3D UV-C ($254\\text{ nm}$) Sterilization & Inverse-Square Radiation Dose",
        "desc": "จำลองการแผ่รังสี UV-C ทำลายพันธะไทมีนในสายดีเอ็นเอ (Thymine Dimer) การลดลงของความเข้มรังสีตามระยะทาง $I \\propto 1/r^2$ และครึ่งชีวิตกัมมันตภาพรังสี",
        "params": "ระยะห่างจากหลอดรังสี $r$ ($10\\text{--}100\\text{ cm}$), เวลาฉายรังสี $t$ ($\\text{s}$), อัตราการรอดชีวิตของจุลินทรีย์ (\\%)",
    },
    {
        "id": 11,
        "ch": 12,
        "file": "ch12_spectrophotometry_project.tex",
        "title_th": "สเปกโตรโฟโตมิเตอร์ กฎของเบียร์-แลมเบิร์ต และกราฟการเจริญเติบโตจากค่า OD600",
        "title_en": "3D Beer--Lambert $\\text{OD}_{600}$ Spectrophotometer & Growth Curve",
        "desc": "จำลองลำแสงโมโนโครเมเตอร์ $600\\text{ nm}$ ที่ส่องผ่านหลอด Cuvette บรรจุเซลล์แบคทีเรียความขุ่นต่างๆ พร้อมคำนวณค่า $\\%T$, $\\text{OD}_{600}$ และระยะการเจริญเติบโต 4 ระยะ",
        "params": "ความหนาแน่นเซลล์แบคทีเรีย, ตัวคูณการเจือจาง (DF), เวลาการบ่มเพาะเชื้อ $t$ ($\\text{hr}$)",
    },
]

# ==============================================================================
# 2. GENERATE 3D PIXAR AR EDITION COVER IMAGE
# ==============================================================================
src_cover = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX/figures/cover_physics4microbio2027.png"
img_cover = Image.open(src_cover).convert("RGBA")
draw_c = ImageDraw.Draw(img_cover)

def get_font(size, index=4):
    try:
        return ImageFont.truetype("/System/Library/Fonts/Supplemental/SukhumvitSet.ttc", size, index=index)
    except Exception:
        return ImageFont.truetype("/System/Library/Fonts/Supplemental/Thonburi.ttc", size, index=0)

f_badge_en = get_font(30, index=4)
f_badge_th = get_font(28, index=4)

# Draw a sleek glowing 3D WebAR + ArUco pill banner at y = 472 (right below English subtitle)
pill_box = [220, 468, 1380, 536]
draw_c.rounded_rectangle(pill_box, radius=34, fill=(6, 78, 59, 235), outline=(0, 240, 255, 255), width=4)

# Draw mini ArUco icon on left of pill
mx0, my0, cell = 248, 478, 8
for r in range(6):
    for c in range(6):
        is_white = False
        if 1 <= r <= 4 and 1 <= c <= 4:
            is_white = (ARUCO_DICT_4X4[0][r - 1][c - 1] == 1)
        color = (255, 255, 255, 255) if is_white else (10, 15, 30, 255)
        draw_c.rectangle([mx0 + c * cell, my0 + r * cell, mx0 + (c + 1) * cell, my0 + (r + 1) * cell], fill=color)
draw_c.rectangle([mx0 - 2, my0 - 2, mx0 + 6 * cell + 2, my0 + 6 * cell + 2], outline=(0, 240, 255, 255), width=2)

badge_text = "3D WebAR + ArUco Marker Edition (ส่องมาร์กเกอร์ดูโมเดล 3 มิติครบ 12 บท)"
bbox = draw_c.textbbox((0, 0), badge_text, font=f_badge_th)
tx = 315 + (1045 - (bbox[2] - bbox[0])) // 2
draw_c.text((tx + 2, 486 + 2), badge_text, font=f_badge_th, fill=(0, 0, 0, 220))
draw_c.text((tx, 486), badge_text, font=f_badge_th, fill=(167, 243, 208, 255))

out_cover_jpg = os.path.join(FIG_DIR, "cover_ar_physics4microbio2027.jpg")
out_cover_png = os.path.join(FIG_DIR, "cover_ar_physics4microbio2027.png")
img_cover.convert("RGB").save(out_cover_jpg, quality=96)
img_cover.save(out_cover_png)
print("[OK] Generated 3D AR Edition cover image:", out_cover_jpg)

# ==============================================================================
# 3. GENERATE INDIVIDUAL PNG ARUCO MARKERS & A4 PRINTABLE SHEET IN targets/
# ==============================================================================
f_card_title = get_font(24, index=4)
f_card_sub = get_font(19, index=1)
f_card_small = get_font(17, index=1)

card_images = []
for item in CHAPTER_AR_CATALOG:
    mid = item["id"]
    ch = item["ch"]
    mat = ARUCO_DICT_4X4[mid]
    # Create 600x720 card
    card = Image.new("RGB", (600, 720), (255, 255, 255))
    dc = ImageDraw.Draw(card)
    # Outer card border
    dc.rounded_rectangle([12, 12, 588, 708], radius=24, outline=(15, 23, 42), width=4)
    # Header bar
    dc.rounded_rectangle([24, 24, 576, 96], radius=14, fill=(15, 23, 42))
    dc.text((42, 34), f"ArUco ID {mid}  •  บทที่ {ch}", font=f_card_title, fill=(56, 189, 248))
    dc.text((42, 64), f"DICT_4X4_50  |  4011111 Physics for Microbiology", font=f_card_small, fill=(226, 232, 240))

    # Draw 6x6 ArUco grid (outer 1-cell black border + inner 4x4 bits)
    # Grid size: 420x420 (70 px per cell), centered at x=90..510, y=125..545
    gx0, gy0, gcell = 90, 125, 70
    for r in range(6):
        for c in range(6):
            is_white = False
            if 1 <= r <= 4 and 1 <= c <= 4:
                is_white = (mat[r - 1][c - 1] == 1)
            fill_col = (255, 255, 255) if is_white else (0, 0, 0)
            dc.rectangle([gx0 + c * gcell, gy0 + r * gcell, gx0 + (c + 1) * gcell, gy0 + (r + 1) * gcell], fill=fill_col)
    # Quiet zone frame
    dc.rectangle([gx0 - 16, gy0 - 16, gx0 + 420 + 16, gy0 + 420 + 16], outline=(148, 163, 184), width=2)
    # Orientation corner mark (top-left)
    dc.polygon([(gx0 - 16, gy0 - 16), (gx0 + 18, gy0 - 16), (gx0 - 16, gy0 + 18)], fill=(16, 185, 129))

    # Footer caption
    title_short = item["title_th"][:38]
    dc.text((36, 585), f"บทที่ {ch}  {title_short}", font=f_card_title, fill=(15, 23, 42))
    clean_en = item["title_en"].replace("$\\text{OD}_{600}$", "OD600").replace("--", "-")
    dc.text((36, 625), clean_en[:48], font=f_card_sub, fill=(3, 105, 161))
    dc.text((36, 660), "ส่องด้วยกล้อง WebAR เพื่อเปิดโมเดลจำลอง 3 มิติพร้อมปรับค่าตัวแปร", font=f_card_small, fill=(71, 85, 105))

    fname = f"aruco_id{mid:02d}_ch{ch:02d}.png"
    card.save(os.path.join(TARGETS_DIR, fname))
    card_images.append(card)

# Combine into an A4 3x4 Master Sheet (2480 x 3508 px at 300 DPI)
sheet = Image.new("RGB", (2480, 3508), (255, 255, 255))
ds = ImageDraw.Draw(sheet)
f_sheet_h1 = get_font(52, index=4)
f_sheet_h2 = get_font(32, index=4)
ds.rectangle([60, 60, 2420, 230], fill=(15, 23, 42))
ds.text((100, 82), "แผ่นรวมมาร์กเกอร์ 3D WebAR (ArUco DICT_4X4_50 : ID 0 – ID 11)", font=f_sheet_h1, fill=(56, 189, 248))
ds.text((100, 158), "รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology) — ส่องด้วยสมาร์ทโฟนเพื่อแสดงโมเดล 3 มิติ", font=f_sheet_h2, fill=(255, 255, 255))

for idx, cimg in enumerate(card_images):
    row = idx // 3
    col = idx % 3
    resized = cimg.resize((740, 780), Image.Resampling.LANCZOS)
    x = 90 + col * 780
    y = 265 + row * 800
    sheet.paste(resized, (x, y))

sheet_path = os.path.join(TARGETS_DIR, "aruco_markers_sheet_12chapters.png")
sheet.save(sheet_path)
print("[OK] Generated 12 individual ArUco PNG markers and A4 master sheet:", sheet_path)

# ==============================================================================
# 4. APPEND VECTOR ARUCO MACRO & BOX TO styles/physics_microbio_style.sty
# ==============================================================================
sty_path = os.path.join(BASE_DIR, "styles", "physics_microbio_style.sty")
with open(sty_path, "r", encoding="utf-8") as f:
    sty_content = f.read()

# Build TikZ macro \drawaruco{<id>} that draws the exact 6x6 ArUco marker for ID 0..11
tikz_cases = []
for mid, mat in ARUCO_DICT_4X4.items():
    white_coords = []
    for r in range(4):
        for c in range(4):
            if mat[r][c] == 1:
                # In TikZ y goes up, so row r (0=top..3=bottom) maps to y = 4 - r (1..4)
                # and col c (0=left..3=right) maps to x = c + 1 (1..4)
                white_coords.append(f"{c+1}/{4-r}")
    coords_str = ", ".join(white_coords)
    tikz_cases.append(f"    \\ifnum#1={mid}\\relax\n      \\foreach \\x/\\y in {{{coords_str}}} {{ \\fill[white] (\\x,\\y) rectangle ++(1,1); }}\n    \\fi")

aruco_sty_addition = (
    "\n% ====================================================================\n"
    "% 10. 3D WEBAR ARUCO MARKER VECTOR ENGINE (DICT_4X4_50 IDs 0-11)\n"
    "% ====================================================================\n"
    "\\definecolor{arCyan}{HTML}{00B4D8}\n"
    "\\definecolor{arDark}{HTML}{0F172A}\n"
    "\n"
    "\\newcommand{\\drawaruco}[2][2.4cm]{%\n"
    "  \\begin{tikzpicture}[x=#1/6, y=#1/6]\n"
    "    % Quiet zone white border\n"
    "    \\fill[white, draw=physRoyalBlue!60, line width=0.6pt] (-0.35,-0.35) rectangle (6.35,6.35);\n"
    "    % 6x6 Black base (includes 1-bit outer black border)\n"
    "    \\fill[black] (0,0) rectangle (6,6);\n"
    "    % Top-left orientation corner triangle\n"
    "    \\fill[bioEmerald] (-0.35,6.35) -- (0.45,6.35) -- (-0.35,5.55) -- cycle;\n"
    + "\n".join(tikz_cases)
    + "\n"
    "  \\end{tikzpicture}%\n"
    "}\n\n"
    "\\newtcolorbox{arucobox}[1][]{\n"
    "    enhanced,\n"
    "    breakable,\n"
    "    colback=boxBlueBg!60!white,\n"
    "    colframe=physRoyalBlue,\n"
    "    colbacktitle=arDark,\n"
    "    coltitle=white,\n"
    "    fonttitle=\\bfseries,\n"
    "    title={\\color{physCyan}[3D WebAR + ArUco Marker]}\\quad #1,\n"
    "    arc=2.5mm,\n"
    "    boxrule=1.1pt,\n"
    "    left=8pt, right=8pt, top=7pt, bottom=7pt\n"
    "}\n\n"
    "\\newcommand{\\arucomarkerbadge}[5]{%\n"
    "  \\begin{arucobox}[มาร์กเกอร์ ArUco ID #1 สำหรับส่องดูโมเดล 3 มิติประจำบทที่ #2 — #3]\n"
    "    \\noindent\n"
    "    \\begin{minipage}[c]{0.23\\linewidth}\n"
    "      \\centering\n"
    "      \\drawaruco[2.5cm]{#1}\\\\[3pt]\n"
    "      {\\scriptsize\\bfseries\\color{arDark} ArUco ID #1 (4x4)}\n"
    "    \\end{minipage}%\n"
    "    \\hfill\n"
    "    \\begin{minipage}[c]{0.74\\linewidth}\n"
    "      \\footnotesize\n"
    "      \\textbf{\\color{physRoyalBlue}แบบจำลอง 3 มิติที่ปรากฏบนหน้าจอมือถือ}\\quad #4\\\\[3pt]\n"
    "      \\textbf{\\color{bioEmerald!85!black}ตัวแปรที่ปรับค่าโต้ตอบได้ (Interactive 3D Controls)}\\quad #5\\\\[3pt]\n"
    "      \\textbf{\\color{crimsonAlert}วิธีใช้งาน}\\quad เปิดเว็บแอป \\href{webar_aruco/ar_aruco_textbook.html?id=#1}{\\texttt{webar\\_aruco/ar\\_aruco\\_textbook.html}} บนสมาร์ทโฟนหรือแท็บเล็ต กดปุ่มเปิดกล้อง AR แล้วส่องกรอบเล็งไปที่มาร์กเกอร์ \\textbf{ArUco ID #1} ด้านซ้ายมือ เพื่อเรียกดูโมเดล 3 มิติลอยตัวบนหน้าหนังสือทันที\n"
    "    \\end{minipage}\n"
    "  \\end{arucobox}\n"
    "}\n"
)

if "10. 3D WEBAR ARUCO MARKER VECTOR ENGINE" not in sty_content:
    sty_content += aruco_sty_addition
    with open(sty_path, "w", encoding="utf-8") as f:
        f.write(sty_content)
print("[OK] Updated styles/physics_microbio_style.sty with vector \\drawaruco and \\arucomarkerbadge.")

# ==============================================================================
# 5. CREATE frontmatter/ar_guide.tex (คู่มือการใช้งานระบบ 3D WebAR + แผ่นรวม ArUco 12 บท)
# ==============================================================================
ar_guide_tex = r"""\chapter*{คู่มือการใช้งานระบบ 3D WebAR และแผ่นรวมมาร์กเกอร์ ArUco (ID 0--11)}
\addcontentsline{toc}{chapter}{คู่มือการใช้งานระบบ 3D WebAR และแผ่นรวมมาร์กเกอร์ ArUco (ID 0--11)}
\markboth{คู่มือการใช้งานระบบ 3D WebAR และแผ่นรวมมาร์กเกอร์ ArUco}{คู่มือการใช้งานระบบ 3D WebAR และแผ่นรวมมาร์กเกอร์ ArUco}

เอกสารคำสอน \textbf{รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (ฉบับบูรณาการเทคโนโลยีความจริงเสริม 3 มิติ — 3D WebAR \& ArUco Marker Edition)} เล่มนี้ ได้ผสานมาร์กเกอร์มาตรฐานสากล \textbf{ArUco Fiducial Marker (พจนานุกรม \texttt{DICT\_4X4\_50} รหัส ID 0 ถึง ID 11)} ลงในเนื้อหาทั้ง 12 บทเรียน เพื่อให้นักศึกษาสาขาจุลชีววิทยาสามารถใช้กล้องสมาร์ทโฟนหรือแท็บเล็ตส่องไปที่หน้าหนังสือเรียน แล้วสำรวจโครงสร้างและกลไกทางฟิสิกส์ของเครื่องมือวิทยาศาสตร์ในรูปแบบ \textbf{วัตถุ 3 มิติแบบโต้ตอบได้ (Interactive 3D PBR Simulation)} โดยไม่ต้องติดตั้งแอปพลิเคชันเพิ่มเติม

\section*{1. โครงสร้างทางเรขาคณิตของมาร์กเกอร์ ArUco (4x4 Binary Matrix)}
มาร์กเกอร์ ArUco แต่ละรหัสประกอบด้วยตารางขนาด $6 \times 6$ ช่อง โดยขอบนอกสุดความหนา $1$ ช่องเป็น\textbf{กรอบสีดำทึบต่อเนื่อง} เพื่อให้อัลกอริทึมคอมพิวเตอร์วิทัศน์ตรวจจับรูปสี่เหลี่ยมจัตุรัสและคำนวณมุมเอียงของหน้ากระดาษได้แม้อยู่ในสภาพแสงน้อย ส่วนพื้นที่ด้านในขนาด $4 \times 4$ ช่อง ($16\text{ บิต}$) แทนรหัสเลขฐานสองเฉพาะตัวของแต่ละบทเรียน (ตั้งแต่ \textbf{ArUco ID 0} สำหรับบทที่ 1 ไปจนถึง \textbf{ArUco ID 11} สำหรับบทที่ 12) พร้อมจุดสามเหลี่ยมสีเขียวมรกตที่มุมบนซ้ายเพื่อบอกทิศทางการวางตั้งขึ้นของมาร์กเกอร์

\section*{2. ขั้นตอนการส่องมาร์กเกอร์ ArUco เพื่อเรียกดูแบบจำลอง 3 มิติ}
\begin{enumerate}
    \item \textbf{เปิดระบบสแกนเนอร์ WebAR}\quad เปิดไฟล์เว็บแอป \href{webar_aruco/ar_aruco_textbook.html}{\texttt{webar\_aruco/ar\_aruco\_textbook.html}} ผ่านเบราว์เซอร์บนสมาร์ทโฟน แท็บเล็ต หรือคอมพิวเตอร์พกพา
    \item \textbf{เปิดกล้อง AR และส่องไปที่มาร์กเกอร์}\quad กดปุ่มอัญมณีตรงกลางแถบด้านล่างเพื่อเปิดกล้องหลัง แล้วนำกรอบเล็งเลเซอร์ส่องไปที่มาร์กเกอร์ \textbf{ArUco ID 0--11} ในแต่ละบท (หรือส่องจากตารางรวมด้านล่างนี้)
    \item \textbf{หมุนสำรวจและปรับค่าตัวแปรทางฟิสิกส์}\quad เมื่อระบบล็อกรหัส ArUco สำเร็จ กรอบเล็งจะเปลี่ยนเป็นสีเขียวมรกตพร้อมเสียงสัญญาณ และแบบจำลองเครื่องมือจุลชีววิทยา 3 มิติจะลอยขึ้นมาบนหน้าหนังสือ นักศึกษาสามารถใช้นิ้วหมุนดูรอบทิศทาง $360^\circ$ และเลื่อนแถบสไลเดอร์ด้านขวา (\textbf{CTRL}) เพื่อปรับค่าความเร็วรอบ $\text{RPM}$, ความดันไอน้ำ, แรงดันไฟฟ้า หรือหยดน้ำมันช่วยส่องที่หัวเลนส์ $100\times$ ได้แบบเรียลไทม์
\end{enumerate}

\begin{table}[H]
\centering
\caption{แผ่นรวมมาร์กเกอร์ ArUco (DICT\_4X4\_50 รหัส ID 0 ถึง ID 11) สำหรับส่องดูโมเดล 3 มิติครบทั้ง 12 บทเรียน}
\footnotesize\setlength{\tabcolsep}{4pt}
\begin{tabularx}{\textwidth}{>{\centering\arraybackslash}X >{\centering\arraybackslash}X >{\centering\arraybackslash}X >{\centering\arraybackslash}X}
\toprule
\drawaruco[2.2cm]{0}\\[2pt]\textbf{ID 0 (บทที่ 1)}\\\scriptsize ไมโครปิเปตและการเจือจาง &
\drawaruco[2.2cm]{1}\\[2pt]\textbf{ID 1 (บทที่ 2)}\\\scriptsize แฟลกเจลลาและบราวน์เนียน &
\drawaruco[2.2cm]{2}\\[2pt]\textbf{ID 2 (บทที่ 3)}\\\scriptsize กฎสโตกส์และตู้ปลอดเชื้อ &
\drawaruco[2.2cm]{3}\\[2pt]\textbf{ID 3 (บทที่ 4)}\\\scriptsize เครื่องปั่นเหวี่ยง RCF ($\times g$) \\
\midrule
\drawaruco[2.2cm]{4}\\[2pt]\textbf{ID 4 (บทที่ 5)}\\\scriptsize ตู้อบ $37\,^\circ\text{C}$ และเครื่อง PCR &
\drawaruco[2.2cm]{5}\\[2pt]\textbf{ID 5 (บทที่ 6)}\\\scriptsize หม้อนึ่ง Autoclave $121\,^\circ\text{C}$ &
\drawaruco[2.2cm]{6}\\[2pt]\textbf{ID 6 (บทที่ 7)}\\\scriptsize ประจุผิวเซลล์และการย้อมแกรม &
\drawaruco[2.2cm]{7}\\[2pt]\textbf{ID 7 (บทที่ 8)}\\\scriptsize Gel Electrophoresis \\
\midrule
\drawaruco[2.2cm]{8}\\[2pt]\textbf{ID 8 (บทที่ 9)}\\\scriptsize Refractometer วัดน้ำหมัก &
\drawaruco[2.2cm]{9}\\[2pt]\textbf{ID 9 (บทที่ 10)}\\\scriptsize กล้องจุลทรรศน์และน้ำมัน $100\times$ &
\drawaruco[2.2cm]{10}\\[2pt]\textbf{ID 10 (บทที่ 11)}\\\scriptsize รังสี UV-C กฎกำลังสองผกผัน &
\drawaruco[2.2cm]{11}\\[2pt]\textbf{ID 11 (บทที่ 12)}\\\scriptsize การวัดค่า $\text{OD}_{600}$ และกราฟเติบโต \\
\bottomrule
\end{tabularx}
\end{table}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "ar_guide.tex"), "w", encoding="utf-8") as f:
    f.write(ar_guide_tex)

# ==============================================================================
# 6. UPDATE frontmatter/cover.tex AND main.tex
# ==============================================================================
with open("/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX/frontmatter/cover.tex", "r", encoding="utf-8") as f:
    orig_cover_tex = f.read()

cover_tex = orig_cover_tex.replace(
    "figures/cover_physics4microbio2027.jpg",
    "figures/cover_ar_physics4microbio2027.jpg"
).replace(
    "เอกสารคำสอนและคู่มือปฏิบัติการมาตรฐาน OBE",
    "เอกสารคำสอนฉบับเทคโนโลยีความจริงเสริม 3D WebAR + ArUco Marker"
)
with open(os.path.join(BASE_DIR, "frontmatter", "cover.tex"), "w", encoding="utf-8") as f:
    f.write(cover_tex)

main_tex = r"""\documentclass[12pt, a4paper, oneside]{book}

\usepackage{styles/physics_microbio_style}

\begin{document}

% ====================================================================
% FRONT MATTER
% ====================================================================
\frontmatter
\pagestyle{empty}

% 1. Full-Bleed 3D Pixar Cover (3D WebAR + ArUco Edition) + Inner Academic Vector Cover
\input{frontmatter/cover.tex}

% 2. Formal Title Page
\cleardoublepage
\input{frontmatter/title.tex}

\pagestyle{plain}
\pagenumbering{roman}
\setcounter{page}{1}

% 3. Preface (คำนำ)
\cleardoublepage
\input{frontmatter/preface.tex}

% 4. Acknowledgements (กิตติกรรมประกาศ)
\cleardoublepage
\input{frontmatter/acknowledgements.tex}

% 5. OBE Course Syllabus & 15-Week Constructive Alignment (มคอ.3)
\cleardoublepage
\input{frontmatter/syllabus.tex}

% 6. 3D WebAR & ArUco Marker Guide + 12-Marker Master Sheet
\cleardoublepage
\input{frontmatter/ar_guide.tex}

% 7. Table of Contents, List of Figures, List of Tables
\cleardoublepage
\tableofcontents

\cleardoublepage
\listoffigures
\addcontentsline{toc}{chapter}{สารบัญภาพ}

\cleardoublepage
\listoftables
\addcontentsline{toc}{chapter}{สารบัญตาราง}

% ====================================================================
% MAIN MATTER (12 Chapters + Embedded ArUco Markers ID 0-11)
% ====================================================================
\mainmatter
\pagestyle{fancy}

\input{chapters/ch01_units_measurement.tex}
\input{chapters/ch02_vectors_motion.tex}
\input{chapters/ch03_newton_viscosity.tex}
\input{chapters/ch04_work_energy_centrifuge.tex}
\input{chapters/ch05_heat_incubator.tex}
\input{chapters/ch06_thermodynamics_autoclave.tex}
\input{chapters/ch07_electrostatics_staining.tex}
\input{chapters/ch08_current_electrophoresis.tex}
\input{chapters/ch09_optics_refraction.tex}
\input{chapters/ch10_microscope_immersion_oil.tex}
\input{chapters/ch11_radioactivity_uv_sterilization.tex}
\input{chapters/ch12_spectrophotometry_project.tex}

% ====================================================================
% BACK MATTER (Low-Math Formula Guide, Rubrics, References, Biography)
% ====================================================================
\backmatter
\input{backmatter/appendix_lowmath.tex}
\input{backmatter/references.tex}
\input{backmatter/biography.tex}

\cleardoublepage
\printindex

\end{document}
"""
with open(os.path.join(BASE_DIR, "main.tex"), "w", encoding="utf-8") as f:
    f.write(main_tex)

# ==============================================================================
# 7. INJECT \arucomarkerbadge INTO EACH OF THE 12 CHAPTERS
# ==============================================================================
for item in CHAPTER_AR_CATALOG:
    ch_path = os.path.join(BASE_DIR, "chapters", item["file"])
    with open(ch_path, "r", encoding="utf-8") as f:
        tex = f.read()

    badge_call = (
        f"\n\\vspace{{4pt}}\n"
        f"\\arucomarkerbadge{{{item['id']}}}{{{item['ch']}}}{{{item['title_th']}}}"
        f"{{{item['desc']}}}{{{item['params']}}}\n"
    )

    if "\\arucomarkerbadge" not in tex:
        # Insert right after the first \end{figure} in each chapter
        target_token = "\\end{figure}"
        if target_token in tex:
            tex = tex.replace(target_token, target_token + "\n" + badge_call, 1)
        else:
            tex += "\n" + badge_call
        with open(ch_path, "w", encoding="utf-8") as f:
            f.write(tex)

print("[OK] Injected \\arucomarkerbadge into all 12 chapter .tex files.")
