#!/usr/bin/env python3
"""
update_sub_index_php.py
Updates 03_physics4microbio2026/index.php with canonical 12 modules from main.tex.
"""

import os
import re

SUB_INDEX = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/03_physics4microbio2026/index.php"

new_modules_code = """// 12 Theory Chapters Master Catalog (Aligned with main.tex Single Source of Truth)
$modules = [
    [
        'num' => '01',
        'icon' => 'fa-ruler-combined',
        'title_th' => 'ระบบหน่วยและการวัดในโลกจุลทรรศน์',
        'title_en' => 'Units & Microscale Measurements',
        'title_zh' => '单位系统与微观测量',
        'anchor' => 'P1000 Micropipette & Calibration',
        'summary' => 'ความสำคัญของหน่วยเอสไอ คำอุปสรรค บันไดคำอุปสรรค x1000 และการสอบเทียบไมโครปิเปตตาม ISO 8655',
        'ch_file' => 'chapters/ch01_th.php',
        'sim_file' => 'simulations/sim_micropipette_3d.html',
        'lab_file' => 'labs/lab01_measurement.php',
        'aruco_id' => 0,
        'color' => '#f97316'
    ],
    [
        'num' => '02',
        'icon' => 'fa-arrows-split-up-and-left',
        'title_th' => 'เวกเตอร์และการเคลื่อนที่ในของเหลว',
        'title_en' => 'Vectors & Microorganism Motion in Fluids',
        'title_zh' => '矢量与流体中的微生物运动',
        'anchor' => 'Run & Tumble vs Brownian Motion',
        'summary' => 'ปริมาณเวกเตอร์ การเคลื่อนที่ของแบคทีเรียแบบ Run and Tumble และการแพร่บราวน์ตามสมการไอน์สไตน์',
        'ch_file' => 'chapters/ch02_th.php',
        'sim_file' => 'simulations/sim02_brownian_motion_3d.html',
        'lab_file' => 'labs/lab02_brownian_motion.php',
        'aruco_id' => 1,
        'color' => '#fbbf24'
    ],
    [
        'num' => '03',
        'icon' => 'fa-water',
        'title_th' => 'กฎการเคลื่อนที่ของนิวตันและแรงหนืด',
        'title_en' => 'Newton Laws & Stokes Viscous Drag',
        'title_zh' => '牛顿运动定律与粘滞力',
        'anchor' => 'Stokes Law & Terminal Velocity',
        'summary' => 'กฎการเคลื่อนที่ 3 ข้อของนิวตันระดับเซลล์ แรงต้านหนืดตามกฎของสโตกส์ และความเร็วปลายการตกตะกอน',
        'ch_file' => 'chapters/ch03_th.php',
        'sim_file' => 'simulations/sim03_viscometer_3d.html',
        'lab_file' => 'labs/lab03_viscosity.php',
        'aruco_id' => 2,
        'color' => '#10b981'
    ],
    [
        'num' => '04',
        'icon' => 'fa-rotate',
        'title_th' => 'งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง',
        'title_en' => 'Work, Energy & Centrifugation Physics',
        'title_zh' => '功、能量与离心机原理',
        'anchor' => 'Centrifuge RCF & Rotor Balance',
        'summary' => 'งาน พลังงานจลน์ การอนุรักษ์พลังงานกล การแปลง RPM สู่แรงเหวี่ยงสัมพัทธ์ RCF และการถ่วงสมดุลโรเตอร์',
        'ch_file' => 'chapters/ch04_th.php',
        'sim_file' => 'simulations/sim04_centrifuge_3d.html',
        'lab_file' => 'labs/lab04_centrifuge.php',
        'aruco_id' => 3,
        'color' => '#3b82f6'
    ],
    [
        'num' => '05',
        'icon' => 'fa-temperature-arrow-up',
        'title_th' => 'ความร้อนและการควบคุมอุณหภูมิชีวภาพ',
        'title_en' => 'Heat & Biological Thermal Control',
        'title_zh' => '热量与生物温度控制',
        'anchor' => 'Incubator 37°C & Thermal Stability',
        'summary' => 'ความจุความร้อนจำเพาะน้ำ 4.184 J/g·°C กลไกถ่ายโอนความร้อนในตู้อบ Incubator และการกระจายอุณหภูมิ 3 จุด',
        'ch_file' => 'chapters/ch05_th.php',
        'sim_file' => 'simulations/sim05_incubator_3d.html',
        'lab_file' => 'labs/lab05_heat_incubator.php',
        'aruco_id' => 4,
        'color' => '#f59e0b'
    ],
    [
        'num' => '06',
        'icon' => 'fa-gauge-high',
        'title_th' => 'อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ',
        'title_en' => 'Thermodynamics, Vapor Pressure & Autoclave',
        'title_zh' => '热力学、蒸汽压与高压灭菌锅',
        'anchor' => 'Autoclave 121°C & Steam Kinetics',
        'summary' => 'กฎแก๊สอุดมคติ ความดันไออิ่มตัวและจุดเดือด อุณหพลศาสตร์ Autoclave 121°C 15 psi และการฆ่าสปอร์แบคทีเรีย',
        'ch_file' => 'chapters/ch06_th.php',
        'sim_file' => 'simulations/sim06_autoclave_3d.html',
        'lab_file' => 'labs/lab06_autoclave.php',
        'aruco_id' => 5,
        'color' => '#ef4444'
    ],
    [
        'num' => '07',
        'icon' => 'fa-atom',
        'title_th' => 'ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม',
        'title_en' => 'Electrostatics, Cell Surface Charge & Gram Staining',
        'title_zh' => '静电学、细胞表面电荷与革兰氏染色',
        'anchor' => 'Coulomb Force & Crystal Violet',
        'summary' => 'กฎของคูลอมบ์ สนามไฟฟ้า ศักย์ไฟฟ้าเยื่อหุ้มเซลล์ และกลไกไฟฟ้าสถิตของการจับสีย้อม Crystal Violet กับผนังเซลล์',
        'ch_file' => 'chapters/ch07_th.php',
        'sim_file' => 'simulations/sim07_gram_stain_3d.html',
        'lab_file' => 'labs/lab07_gram_electrostatics.php',
        'aruco_id' => 6,
        'color' => '#8b5cf6'
    ],
    [
        'num' => '08',
        'icon' => 'fa-bolt-lightning',
        'title_th' => 'ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส',
        'title_en' => 'Electric Current, Ohm Law & Gel Electrophoresis',
        'title_zh' => '电流、欧姆定律与凝胶电泳',
        'anchor' => 'Ohm Law V=IR & DNA Mobility',
        'summary' => 'กระแสไฟฟ้า กฎของโอห์ม V = IR กำลังไฟฟ้า ความร้อนจูล และฟิสิกส์เจลอิเล็กโทรโฟรีซิสในการแยก DNA',
        'ch_file' => 'chapters/ch08_th.php',
        'sim_file' => 'simulations/sim10_electrophoresis_3d.html',
        'lab_file' => 'labs/lab08_electrophoresis.php',
        'aruco_id' => 7,
        'color' => '#06b6d4'
    ],
    [
        'num' => '09',
        'icon' => 'fa-glasses',
        'title_th' => 'ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง',
        'title_en' => 'Optics, Reflection, Refraction & Brix',
        'title_zh' => '光学基础、反射、折射与白利糖度计',
        'anchor' => 'Snell Law & Brix Refractometer',
        'summary' => 'สเปกตรัมแม่เหล็กไฟฟ้า ดัชนีหักเห กฎสเนลล์ การสะท้อนกลับหมด และการประยุกต์วัดความหวาน Brix ในการหมัก',
        'ch_file' => 'chapters/ch09_th.php',
        'sim_file' => 'simulations/sim09_refraction_3d.html',
        'lab_file' => 'labs/lab09_refraction.php',
        'aruco_id' => 8,
        'color' => '#eab308'
    ],
    [
        'num' => '10',
        'icon' => 'fa-microscope',
        'title_th' => 'กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง',
        'title_en' => 'Microscope Optics, Resolution & Immersion Oil',
        'title_zh' => '显微镜光学、分辨率极限与香柏油',
        'anchor' => 'Abbe Limit & 100x Immersion Oil',
        'summary' => 'การเกิดภาพของเลนส์คู่ กำลังขยายรวม ค่า NA ขีดจำกัดการแยกชัดของแอบบี และบทบาท Immersion Oil (n=1.515)',
        'ch_file' => 'chapters/ch10_th.php',
        'sim_file' => 'simulations/sim11_optics_3d.html',
        'lab_file' => 'labs/lab10_microscope.php',
        'aruco_id' => 9,
        'color' => '#6366f1'
    ],
    [
        'num' => '11',
        'icon' => 'fa-radiation',
        'title_th' => 'กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์',
        'title_en' => 'Radioactivity, Half-life & UV-C Disinfection',
        'title_zh' => '放射性、半衰期与紫外线灭菌',
        'anchor' => 'Half-Life & UV-C 254nm Disinfection',
        'summary' => 'โครงสร้างนิวเคลียส ครึ่งชีวิต กฎกำลังสองผกผัน และการประยุกต์ใช้รังสีแกมมา Co-60 และ UV-C 254 nm ทำลายจุลินทรีย์',
        'ch_file' => 'chapters/ch11_th.php',
        'sim_file' => 'simulations/sim12_radioactivity_3d.html',
        'lab_file' => 'labs/lab11_radioactivity_uv.php',
        'aruco_id' => 10,
        'color' => '#ec4899'
    ],
    [
        'num' => '12',
        'icon' => 'fa-chart-line',
        'title_th' => 'สเปกโตรโฟโตมิเตอร์และการบูรณาการฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยา',
        'title_en' => 'Spectrophotometry, Beer-Lambert & Capstone',
        'title_zh' => '分光光度计与微生物物理学综合应用',
        'anchor' => 'OD600 Growth Curve & Mini-Project',
        'summary' => 'การดูดกลืนแสง กฎเบียร์-แลมเบิร์ต A = εbc ความสัมพันธ์ OD600 กับความหนาแน่นเซลล์ และโครงงานย่อยบูรณาการ (Capstone)',
        'ch_file' => 'chapters/ch12_th.php',
        'sim_file' => 'simulations/sim12_od600_3d.html',
        'lab_file' => 'labs/lab12_od600.php',
        'aruco_id' => 11,
        'color' => '#10b981'
    ]
];"""

with open(SUB_INDEX, "r", encoding="utf-8") as f:
    content = f.read()

pattern = r"// 12 Chapters \+ 1 Capstone Master Catalog[\s\S]*?\$modules = \[\s*[\s\S]*?\n\];"
new_content = re.sub(pattern, new_modules_code, content)

with open(SUB_INDEX, "w", encoding="utf-8") as f:
    f.write(new_content)

print("03_physics4microbio2026/index.php successfully updated!")

