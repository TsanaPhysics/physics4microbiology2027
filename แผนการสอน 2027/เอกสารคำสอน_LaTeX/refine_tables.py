#!/usr/bin/env python3
"""
Eliminates the remaining table column header width warnings in syllabus, ch01, ch03, ch04, ch08, ch10, ch12.
"""
import os

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX"

def replace_in_file(rel_path, old, new):
    p = os.path.join(BASE_DIR, rel_path)
    with open(p, "r", encoding="utf-8") as f:
        t = f.read()
    assert old in t, f"Pattern not found in {rel_path}"
    t = t.replace(old, new)
    with open(p, "w", encoding="utf-8") as f:
        f.write(t)

# 1. syllabus.tex: make 4th column wider by tightening p{3.9cm} -> p{3.5cm} and p{4.0cm} -> p{3.6cm}
replace_in_file(
    "frontmatter/syllabus.tex",
    r"\begin{tabularx}{\textwidth}{c >{\raggedright\arraybackslash}p{3.9cm} >{\raggedright\arraybackslash}p{4.0cm} >{\raggedright\arraybackslash}X c}",
    r"\begin{tabularx}{\textwidth}{c >{\raggedright\arraybackslash}p{3.5cm} >{\raggedright\arraybackslash}p{3.6cm} >{\raggedright\arraybackslash}X c}"
)

# 2. ch01: shorten last column header in Lab 1 table
replace_in_file(
    "chapters/ch01_units_measurement.tex",
    r"\textbf{รายการที่วัด} & \textbf{ครั้งที่ 1} & \textbf{ครั้งที่ 2} & \textbf{ครั้งที่ 3} & \textbf{ค่าเฉลี่ย} & \textbf{แปลงเป็นหน่วย $\mu\text{m}$ หรือ $\mu\text{L}$} \\",
    r"\textbf{รายการที่วัด} & \textbf{ครั้งที่ 1} & \textbf{ครั้งที่ 2} & \textbf{ครั้งที่ 3} & \textbf{ค่าเฉลี่ย} & \textbf{หน่วย $\mu\text{m}$ / $\mu\text{L}$} \\"
)

# 3. ch03: shorten column headers in Lab 3 table
replace_in_file(
    "chapters/ch03_newton_viscosity.tex",
    r"\textbf{ชนิดของเหลว} & \textbf{เวลาครั้งที่ 1 ($\text{s}$)} & \textbf{เวลาครั้งที่ 2 ($\text{s}$)} & \textbf{เวลาเฉลี่ย $t$ ($\text{s}$)} & \textbf{อัตราเร็ว $v_t$ ($\text{m/s}$)} & \textbf{ความหนืด $\eta$ ($\text{Pa}\cdot\text{s}$)} \\",
    r"\textbf{ชนิดของเหลว} & \textbf{ครั้งที่ 1 ($\text{s}$)} & \textbf{ครั้งที่ 2 ($\text{s}$)} & \textbf{เฉลี่ย $t$ ($\text{s}$)} & \textbf{$v_t$ ($\text{m/s}$)} & \textbf{ความหนืด $\eta$} \\"
)

# 4. ch04: make first column c and shorten headers in Lab 4 table
replace_in_file(
    "chapters/ch04_work_energy_centrifuge.tex",
    r"\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c}" + "\n" +
    r"\toprule" + "\n" +
    r"\textbf{ความเร็วรอบ (RPM)} & \textbf{รัศมีโรเตอร์ $r_{\text{cm}}$ ($\text{cm}$)} & \textbf{ค่า RCF ที่คำนวณได้ ($\times g$)} & \textbf{ค่า RCF จากหน้าจอเครื่อง} & \textbf{ลักษณะตะกอนเซลล์ที่พบ} \\",
    r"\begin{tabularx}{\linewidth}{c c c c >{\raggedright\arraybackslash}X}" + "\n" +
    r"\toprule" + "\n" +
    r"\textbf{รอบ (RPM)} & \textbf{รัศมี $r_{\text{cm}}$} & \textbf{RCF คำนวณ ($\times g$)} & \textbf{RCF หน้าจอ} & \textbf{ลักษณะตะกอนเซลล์} \\"
)

# 5. ch08: make first column c and last column X in Lab 8 table
replace_in_file(
    "chapters/ch08_current_electrophoresis.tex",
    r"\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c}" + "\n" +
    r"\toprule" + "\n" +
    r"\textbf{แรงดันไฟฟ้า $V$ ($\text{V}$)} & \textbf{กระแสไฟฟ้า $I$ ($\text{A}$)} & \textbf{ความต้านทาน $R = V/I$ ($\Omega$)} & \textbf{กำลังไฟฟ้า $P = VI$ ($\text{W}$)} & \textbf{ระยะเคลื่อนที่แถบสี ($\text{mm}$)} \\",
    r"\begin{tabularx}{\linewidth}{c c c c >{\raggedright\arraybackslash}X}" + "\n" +
    r"\toprule" + "\n" +
    r"\textbf{แรงดัน $V$ ($\text{V}$)} & \textbf{กระแส $I$ ($\text{A}$)} & \textbf{ความต้านทาน $R$ ($\Omega$)} & \textbf{กำลัง $P$ ($\text{W}$)} & \textbf{ระยะแถบสี ($\text{mm}$)} \\"
)

# 6. ch10: shorten headers in Lab 10 table
replace_in_file(
    "chapters/ch10_microscope_immersion_oil.tex",
    r"\textbf{หัวเลนส์ใกล้วัตถุ} & \textbf{กำลังขยายรวม $M_{\text{total}}$} & \textbf{ค่า $\text{NA}$ บนเลนส์} & \textbf{ค่า $d_{\min}$ ที่คำนวณได้ ($\mu\text{m}$)} & \textbf{ลักษณะความคมชัดของเซลล์แบคทีเรีย} \\",
    r"\textbf{หัวเลนส์} & \textbf{กำลังขยายรวม} & \textbf{ค่า $\text{NA}$} & \textbf{$d_{\min}$ ($\mu\text{m}$)} & \textbf{ความคมชัดของเซลล์แบคทีเรีย} \\"
)

# 7. ch12: shorten displayed equation slightly on line 108
replace_in_file(
    "chapters/ch12_spectrophotometry_project.tex",
    r"c_{\text{diluted}} = 4.0 \times 10^8 \times \left(\frac{0.35}{0.50}\right) = 4.0 \times 10^8 \times 0.70 = 2.8 \times 10^8\text{ cells/mL}",
    r"c_{\text{diluted}} = 4.0 \times 10^8 \times \left(\frac{0.35}{0.50}\right) = 2.8 \times 10^8\text{ cells/mL}"
)

print("[OK] Refined all remaining table headers.")
