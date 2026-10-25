#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Injects \deepskinfig{figures/sec_3d/chXX_sY.jpg}{<caption>} right after each \section{...}
in Chapters 2 through 12.
"""

import os
import re

CHAPTER_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/chapters"

CAPTIONS = {
    ("ch02_vectors_motion.tex", 1): (
        "figures/sec_3d/ch02_s1.jpg",
        "การเปรียบเทียบระยะทางตามเส้นทางว่ายคดเคี้ยว ($s$, ปริมาณสเกลาร์) กับเวกเตอร์การกระจัดลัพธ์ ($\\vect{d}$, ปริมาณเวกเตอร์) ของแบคทีเรียที่มีแฟลกเจลลา",
    ),
    ("ch02_vectors_motion.tex", 2): (
        "figures/sec_3d/ch02_s2.jpg",
        "กลไกการหมุนแฟลกเจลลาแบบพุ่งตรงสลับหมุนสุ่ม (Run and Tumble) เข้าหาสารอาหาร เทียบกับการสั่นสะเทือนแบบบราวน์ (Brownian Motion)",
    ),
    ("ch02_vectors_motion.tex", 3): (
        "figures/sec_3d/ch02_s3.jpg",
        "ชุดปฏิบัติการที่ 2 สำหรับวัดอัตราเร็วการเคลื่อนที่ในของเหลวและศึกษาอิทธิพลของอุณหภูมิต่ออัตราเร็วการแพร่ของสีย้อมในจานเพาะเชื้อ",
    ),
    ("ch03_newton_viscosity.tex", 1): (
        "figures/sec_3d/ch03_s1.jpg",
        "กฎการเคลื่อนที่สามข้อของนิวตันในสภาวะความหนืดสูงระดับเซลล์จุลินทรีย์ และแรงกิริยา--ปฏิกิริยาจากการหมุนของแฟลกเจลลา",
    ),
    ("ch03_newton_viscosity.tex", 2): (
        "figures/sec_3d/ch03_s2.jpg",
        "สมดุลของแรงโน้มถ่วง ($F_g$) แรงลอยตัว ($F_b$) และแรงหนืดของสโตกส์ ($F_{\\text{drag}} = 6\\pi\\eta r v_t$) ขณะเซลล์ยีสต์และแบคทีเรียตกตะกอนในอาหารเหลว",
    ),
    ("ch03_newton_viscosity.tex", 3): (
        "figures/sec_3d/ch03_s3.jpg",
        "ชุดปฏิบัติการที่ 3 สำหรับวัดอัตราเร็วสุดท้าย ($v_t$) และหาสัมประสิทธิ์ความหนืด ($\\eta$) ของของเหลวชีวภาพด้วยวิธีปล่อยลูกเหล็กทรงกลม",
    ),
    ("ch04_work_energy_centrifuge.tex", 1): (
        "figures/sec_3d/ch04_s1.jpg",
        "การเปลี่ยนพลังงานไฟฟ้าเป็นงานกลและพลังงานจลน์การหมุนของโรเตอร์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา",
    ),
    ("ch04_work_energy_centrifuge.tex", 2): (
        "figures/sec_3d/ch04_s2.jpg",
        "โครงสร้างหัวปั่นโรเตอร์มุมคงที่ การจัดเรียงหลอดถ่วงสมดุลอย่างสมมาตร และการอัดแน่นของเม็ดตะกอนเซลล์ (Pellet) ภายใต้แรงเหวี่ยงสัมพัทธ์ RCF ($\\times g$)",
    ),
    ("ch04_work_energy_centrifuge.tex", 3): (
        "figures/sec_3d/ch04_s3.jpg",
        "ชุดปฏิบัติการที่ 4 สำหรับการวัดรัศมีโรเตอร์ ($r_{\\text{cm}}$) คำนวณค่า RCF และสังเกตการแยกชั้นระหว่างตะกอนเซลล์ยีสต์ (Pellet) กับส่วนใส (Supernatant)",
    ),
    ("ch05_heat_incubator.tex", 1): (
        "figures/sec_3d/ch05_s1.jpg",
        "ความจุความร้อนจำเพาะของน้ำ ($c = 4.184\\text{ J/g}\\cdot^\\circ\\text{C}$) และความร้อนแฝงในการต้มหลอมละลายอาหารเลี้ยงเชื้อวุ้นในห้องปฏิบัติการ",
    ),
    ("ch05_heat_incubator.tex", 2): (
        "figures/sec_3d/ch05_s2.jpg",
        "กลไกการถ่ายโอนความร้อนทั้ง 3 รูปแบบในงานจุลชีววิทยา ได้แก่ การนำความร้อนในอ่าง Water Bath การพาความร้อนในตู้ Incubator และการแผ่รังสีจากตะเกียงบุนเสน",
    ),
    ("ch05_heat_incubator.tex", 3): (
        "figures/sec_3d/ch05_s3.jpg",
        "ชุดปฏิบัติการที่ 5 สำหรับทดสอบสมดุลความร้อนในแคลอริมิเตอร์และตรวจสอบการกระจายอุณหภูมิ 3 จุดภายในตู้อบเลี้ยงเชื้อ $37.0\\,^\\circ\\text{C}$",
    ),
    ("ch06_thermodynamics_autoclave.tex", 1): (
        "figures/sec_3d/ch06_s1.jpg",
        "ความสัมพันธ์ระหว่างความดันเกจ ($P_{\\text{gauge}}$) ความดันบรรยากาศ ($P_{\\text{atm}}$) และความดันสัมบูรณ์ ($P_{\\text{abs}}$) ตามกฎของแก๊สในภาชนะปิด",
    ),
    ("ch06_thermodynamics_autoclave.tex", 2): (
        "figures/sec_3d/ch06_s2.jpg",
        "ภาพตัดขวางหม้อนึ่งความดันไอ (Autoclave) ที่สภาวะมาตรฐาน $121\\,^\\circ\\text{C}$ ความดันเกจ $15\\text{ psi}$ และการควบแน่นคายความร้อนแฝงทำลายเอนโดสปอร์ของแบคทีเรีย",
    ),
    ("ch06_thermodynamics_autoclave.tex", 3): (
        "figures/sec_3d/ch06_s3.jpg",
        "ชุดปฏิบัติการที่ 6 สำหรับศึกษาการเดือดของน้ำที่ความดันต่ำและการตรวจสอบประสิทธิภาพการฆ่าเชื้อด้วยเทปวัดผลความร้อน (Autoclave Indicator Tape)",
    ),
    ("ch07_electrostatics_staining.tex", 1): (
        "figures/sec_3d/ch07_s1.jpg",
        "แรงดึงดูดทางไฟฟ้าสถิตตามกฎของคูลอมบ์ ($F_e = k|q_1 q_2|/r^2$) ระหว่างไอออนสีย้อมประจุบวกกับหมู่ฟอสเฟตประจุลบบนผนังเซลล์แบคทีเรีย",
    ),
    ("ch07_electrostatics_staining.tex", 2): (
        "figures/sec_3d/ch07_s2.jpg",
        "เปรียบเทียบกลไกการย้อมสีแบคทีเรียด้วยสีย้อมประจุบวก (Basic Dye ดูดติดผนังเซลล์ประจุลบ) และสีย้อมประจุลบ (Acidic Dye ถูกผลักออกเพื่อดูแคปซูลใส)",
    ),
    ("ch07_electrostatics_staining.tex", 3): (
        "figures/sec_3d/ch07_s3.jpg",
        "ชุดปฏิบัติการที่ 7 สำหรับทดสอบแรงกระทำระหว่างประจุไฟฟ้าและการยึดเกาะของสีย้อมประจุบวกและประจุลบบนเส้นใยเซลลูโลส",
    ),
    ("ch08_current_electrophoresis.tex", 1): (
        "figures/sec_3d/ch08_s1.jpg",
        "ความสัมพันธ์ระหว่างความต่างศักย์ ($V$) กระแสไฟฟ้า ($I$) ความต้านทาน ($R$) ตามกฎของโอห์ม และกำลังความร้อน ($P = I^2R$) ในแหล่งจ่ายไฟอิเล็กโทรโฟรีซิส",
    ),
    ("ch08_current_electrophoresis.tex", 2): (
        "figures/sec_3d/ch08_s2.jpg",
        "กลไกการเคลื่อนที่ของสายดีเอ็นเอประจุลบผ่านรูพรุนแผ่นวุ้นอะกาโรสมุ่งสู่ขั้วบวกสีแดง (Run to Red) และการแยกแถบดีเอ็นเอตามขนาดคู่เบส",
    ),
    ("ch08_current_electrophoresis.tex", 3): (
        "figures/sec_3d/ch08_s3.jpg",
        "ชุดปฏิบัติการที่ 8 สำหรับตรวจสอบกฎของโอห์มและการแยกแถบสีมาตรฐานด้วยสนามไฟฟ้ากระแสตรง $100\\text{ V}$ ในแผ่นวุ้นอะกาโรส",
    ),
    ("ch09_optics_refraction.tex", 1): (
        "figures/sec_3d/ch09_s1.jpg",
        "เปรียบเทียบค่าดัชนีหักเห ($n = c/v$) ของอากาศ น้ำ ไซโทพลาซึมของเซลล์สด กระจกสไลด์ และน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$)",
    ),
    ("ch09_optics_refraction.tex", 2): (
        "figures/sec_3d/ch09_s2.jpg",
        "การเบนของลำแสงเลเซอร์ตามกฎการหักเหของสเนลล์เมื่อเดินทางผ่านรอยต่อระหว่างตัวกลางที่มีค่าดัชนีหักเหต่างกัน",
    ),
    ("ch09_optics_refraction.tex", 3): (
        "figures/sec_3d/ch09_s3.jpg",
        "ชุดปฏิบัติการที่ 9 สำหรับวัดมุมตกกระทบ--มุมหักเหผ่านแท่งอะคริลิกใส และการวัดความหวานน้ำหมักยีสต์ ($^\\circ\\text{Brix}$) ด้วยเครื่อง Hand Refractometer",
    ),
    ("ch10_microscope_immersion_oil.tex", 1): (
        "figures/sec_3d/ch10_s1.jpg",
        "ระบบเลนส์นูนสองชั้น (เลนส์ใกล้วัตถุและเลนส์ใกล้ตา) และทางเดินแสงภายในกล้องจุลทรรศน์แบบใช้แสงกำลังขยายรวมสูงสุด $1{,}000\\times$",
    ),
    ("ch10_microscope_immersion_oil.tex", 2): (
        "figures/sec_3d/ch10_s2.jpg",
        "บทบาทของน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$) ที่เชื่อมระหว่างสไลด์แก้วกับหัวเลนส์ $100\\times$ เพื่อป้องกันการหักเหสูญเสียแสงและเพิ่มอำนาจแยกชัด ($d_{\\min} \\approx 0.22\\text{ }\\mu\\text{m}$)",
    ),
    ("ch10_microscope_immersion_oil.tex", 3): (
        "figures/sec_3d/ch10_s3.jpg",
        "ชุดปฏิบัติการที่ 10 สำหรับคำนวณค่าขีดจำกัดการแยกชัด ($d_{\\min}$) และฝึกทักษะการส่องแบคทีเรียย้อมสีแกรมด้วยหัวเลนส์น้ำมัน $100\\times$",
    ),
    ("ch11_radioactivity_uv_sterilization.tex", 1): (
        "figures/sec_3d/ch11_s1.jpg",
        "กลไกการเกิดพันธะ Thymine Dimer ในสายดีเอ็นเอจากรังสี UV-C ($254\\text{ nm}$) และการเปรียบเทียบอำนาจทะลุทะลวงของรังสีแอลฟา บีตา และแกมมา ($^{60}\\text{Co}$)",
    ),
    ("ch11_radioactivity_uv_sterilization.tex", 2): (
        "figures/sec_3d/ch11_s2.jpg",
        "การลดลงของปริมาณไอโซโทปกัมมันตรังสีและอัตราการรอดชีวิตของจุลินทรีย์แบบหารครึ่งทีละรอบครึ่งชีวิต ($T_{1/2}$) และกฎกำลังสองผกผันของความเข้มรังสี ($I \\propto 1/r^2$)",
    ),
    ("ch11_radioactivity_uv_sterilization.tex", 3): (
        "figures/sec_3d/ch11_s3.jpg",
        "ชุดปฏิบัติการที่ 11 สำหรับจำลองกราฟการสลายตัวครึ่งชีวิตและวัดความเข้มแสงตามระยะห่างเพื่อตรวจสอบกฎกำลังสองผกผัน",
    ),
    ("ch12_spectrophotometry_project.tex", 1): (
        "figures/sec_3d/ch12_s1.jpg",
        "องค์ประกอบภายในเครื่องสเปกโตรโฟโตมิเตอร์ การกระเจิงและดูดกลืนลำแสง $600\\text{ nm}$ โดยเซลล์แบคทีเรียในหลอดคิวเวตต์ตามกฎของเบียร์-แลมเบิร์ต ($A = \\varepsilon b c$)",
    ),
    ("ch12_spectrophotometry_project.tex", 2): (
        "figures/sec_3d/ch12_s2.jpg",
        "ชุดหลอดคิวเวตต์สารแขวนลอยเซลล์ที่ระดับการเจือจางต่างๆ สำหรับสร้างกราฟมาตรฐาน $\\text{OD}_{600}$ และโครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา",
    ),
}

for fname in sorted(os.listdir(CHAPTER_DIR)):
    if not fname.endswith(".tex") or fname == "ch01_units_measurement.tex":
        continue
    fpath = os.path.join(CHAPTER_DIR, fname)
    with open(fpath, "r", encoding="utf-8") as f:
        content = f.read()

    if "\\deepskinfig{" in content:
        print(f"Skipping {fname} (already contains \\deepskinfig)")
        continue

    lines = content.splitlines()
    new_lines = []
    sec_idx = 0
    for line in lines:
        new_lines.append(line)
        if line.strip().startswith("\\section{"):
            sec_idx += 1
            key = (fname, sec_idx)
            if key in CAPTIONS:
                img_path, cap_text = CAPTIONS[key]
                new_lines.append("")
                new_lines.append(f"\\deepskinfig{{{img_path}}}{{{cap_text}}}")

    with open(fpath, "w", encoding="utf-8") as f:
        f.write("\n".join(new_lines) + "\n")
    print(f"Updated {fname}: injected {sec_idx} 3D 8K Deep-Skin section figures.")
