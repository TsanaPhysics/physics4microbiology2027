#!/usr/bin/env python3
"""
update_index_php.py
Updates root index.php with canonical 12 chapters, 13 labs, and 4 enrichment modules.
"""

import os
import re

INDEX_PATH = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/index.php"

new_labs_code = """// 13 Labs Master Catalog (Aligned with main.tex 15-Week Syllabus)
$labs = [
    [
        'id' => 'lab01',
        'num' => '01',
        'title_th' => 'หน่วย การวัด และการสอบเทียบไมโครปิเปต P1000',
        'title_en' => 'Units, Measurement & P1000 Micropipette Gravimetric Calibration',
        'sim_file' => '03_physics4microbio2026/simulations/sim_micropipette_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab01_measurement.php',
        'badge' => 'Measurement & Pipetting',
        'color' => 'from-amber-500 to-orange-600',
        'border' => 'border-amber-500/30',
        'icon' => 'fa-ruler-combined',
        'summary' => 'การสอบเทียบความแม่นยำของไมโครปิเปต P1000 ด้วยการชั่งน้ำหนักน้ำบริสุทธิ์เทียบมาตรฐาน ISO 8655'
    ],
    [
        'id' => 'lab02',
        'num' => '02',
        'title_th' => 'การเคลื่อนที่แบบบราวน์และเวกเตอร์การแพร่ของจุลินทรีย์',
        'title_en' => 'Brownian Motion & Microorganism Diffusion Vectors',
        'sim_file' => '03_physics4microbio2026/simulations/sim02_brownian_motion_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab02_brownian_motion.php',
        'badge' => 'Brownian & Diffusion',
        'color' => 'from-orange-500 to-red-600',
        'border' => 'border-orange-500/30',
        'icon' => 'fa-arrows-split-up-and-left',
        'summary' => 'การแพร่แบบสุ่มและการเคลื่อนที่แบบบราวน์ตามสมการไอน์สไตน์ D = kBT/(6πηr) ในหยดแขวนลอย Hanging Drop'
    ],
    [
        'id' => 'lab03',
        'num' => '03',
        'title_th' => 'กฎของนิวตัน ความหนืดสโตกส์ และการตกตะกอนของแบคทีเรีย',
        'title_en' => 'Newton Laws, Stokes Viscosity & Bacterial Sedimentation',
        'sim_file' => '03_physics4microbio2026/simulations/sim03_viscometer_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab03_viscosity.php',
        'badge' => 'Viscosity & Stokes',
        'color' => 'from-emerald-500 to-teal-600',
        'border' => 'border-emerald-500/30',
        'icon' => 'fa-water',
        'summary' => 'แรงต้านหนืดตามกฎของสโตกส์ ความเร็วปลายของการตกตะกอน และการวัดความหนืดอาหารเลี้ยงเชื้อ'
    ],
    [
        'id' => 'lab04',
        'num' => '04',
        'title_th' => 'งาน พลังงานจลน์ และแรงหนีศูนย์กลางในการปั่นแยกเซลล์',
        'title_en' => 'Work, Kinetic Energy & Centrifugal Cell Separation',
        'sim_file' => '03_physics4microbio2026/simulations/sim04_centrifuge_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab04_centrifuge.php',
        'badge' => 'High-Speed Centrifuge',
        'color' => 'from-blue-500 to-indigo-600',
        'border' => 'border-blue-500/30',
        'icon' => 'fa-rotate',
        'summary' => 'แรงหนีศูนย์กลางสัมพัทธ์ (RCF/xg) การแปลงรอบ RPM และกฎเหล็ก Rotor Balancing ในการแยกเม็ดเซลล์'
    ],
    [
        'id' => 'lab05',
        'num' => '05',
        'title_th' => 'การถ่ายโอนความร้อนและเสถียรภาพอุณหภูมิตู้อบ Incubator 37°C',
        'title_en' => 'Heat Transfer & 37°C Incubator Thermal Stability',
        'sim_file' => '03_physics4microbio2026/simulations/sim05_incubator_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab05_heat_incubator.php',
        'badge' => 'Incubator 37°C & Calorimetry',
        'color' => 'from-amber-500 to-rose-600',
        'border' => 'border-amber-500/30',
        'icon' => 'fa-temperature-arrow-up',
        'summary' => 'การอนุรักษ์พลังงานความร้อน Q = mcΔT และการตรวจสอบเสถียรภาพอุณหภูมิ 3 จุดป้องกัน Thermal Stratification'
    ],
    [
        'id' => 'lab06',
        'num' => '06',
        'title_th' => 'อุณหพลศาสตร์ กฎข้อที่หนึ่ง และหม้อนึ่งความดันไอ Autoclave 121°C',
        'title_en' => 'Thermodynamics, First Law & 121°C Autoclave Sterilization',
        'sim_file' => '03_physics4microbio2026/simulations/sim06_autoclave_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab06_autoclave.php',
        'badge' => 'Autoclave 121°C & Steam',
        'color' => 'from-red-500 to-rose-600',
        'border' => 'border-red-500/30',
        'icon' => 'fa-gauge-high',
        'summary' => 'อุณหพลศาสตร์ของไอน้ำอิ่มตัวภายใต้ความดัน 15 psi (121°C) และจลนพลศาสตร์ทำลายสปอร์ D121 = 1.5 นาที'
    ],
    [
        'id' => 'lab07',
        'num' => '07',
        'title_th' => 'แรงไฟฟ้าสถิต กฎของคูลอมบ์ และกลไกการย้อมสีแกรม',
        'title_en' => 'Electrostatics, Coulomb Law & Gram Staining Mechanism',
        'sim_file' => '03_physics4microbio2026/simulations/sim07_gram_stain_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab07_gram_electrostatics.php',
        'badge' => 'Coulomb & Gram Staining',
        'color' => 'from-purple-500 to-indigo-600',
        'border' => 'border-purple-500/30',
        'icon' => 'fa-atom',
        'summary' => 'แรงดึงดูดทางไฟฟ้าสถิตระหว่างสีย้อมประจุบวก Crystal Violet กับผนังเซลล์ประจุลบของแบคทีเรีย'
    ],
    [
        'id' => 'lab08',
        'num' => '08',
        'title_th' => 'กระแสไฟฟ้า กฎของโอห์ม และเจลอิเล็กโทรโฟเรซิส',
        'title_en' => 'Electric Current, Ohm Law & Gel Electrophoresis',
        'sim_file' => '03_physics4microbio2026/simulations/sim10_electrophoresis_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab08_electrophoresis.php',
        'badge' => 'Gel Electrophoresis',
        'color' => 'from-violet-500 to-purple-600',
        'border' => 'border-violet-500/30',
        'icon' => 'fa-bolt-lightning',
        'summary' => 'กฎของโอห์ม V = IR กำลังไฟฟ้า P = VI และสภาพการเคลื่อนที่ของดีเอ็นเอภายใต้สนามไฟฟ้าสถิต'
    ],
    [
        'id' => 'lab09',
        'num' => '09',
        'title_th' => 'การหักเหของแสง กฎของสเนลล์ และการวัดความหวาน Brix Refractometer',
        'title_en' => 'Optics, Snell Law & Brix Refractometer',
        'sim_file' => '03_physics4microbio2026/simulations/sim09_refraction_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab09_refraction.php',
        'badge' => 'Snell Law & Brix',
        'color' => 'from-yellow-500 to-amber-600',
        'border' => 'border-yellow-500/30',
        'icon' => 'fa-glasses',
        'summary' => 'การหักเหของแสง กฎของสเนลล์ ปรากฏการณ์สะท้อนกลับหมด และมุมวิกฤติในการวัดค่าบริกซ์ของน้ำหมัก'
    ],
    [
        'id' => 'lab10',
        'num' => '10',
        'title_th' => 'ทัศนศาสตร์ เลนส์กล้องจุลทรรศน์ และ Immersion Oil 100x',
        'title_en' => 'Wave Optics, Microscope Resolution & Immersion Oil 100x',
        'sim_file' => '03_physics4microbio2026/simulations/sim11_optics_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab10_microscope.php',
        'badge' => '100x Oil & Abbe Limit',
        'color' => 'from-teal-500 to-cyan-600',
        'border' => 'border-teal-500/30',
        'icon' => 'fa-microscope',
        'summary' => 'ขีดจำกัดการเลี้ยวเบนของแอบบี กำลังแยกภาพ และการจับคู่ดัชนีหักเหด้วยน้ำมันแช่เลนส์ n = 1.515'
    ],
    [
        'id' => 'lab11',
        'num' => '11',
        'title_th' => 'กัมมันตภาพรังสี การสลายตัว และการฉายรังสี UV-C ฆ่าเชื้อ',
        'title_en' => 'Nuclear Physics, Half-life & UV-C Disinfection',
        'sim_file' => '03_physics4microbio2026/simulations/sim12_radioactivity_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab11_radioactivity_uv.php',
        'badge' => 'Radiosterilization & D10',
        'color' => 'from-cyan-500 to-teal-600',
        'border' => 'border-cyan-500/30',
        'icon' => 'fa-radiation',
        'summary' => 'การสลายตัวตามครึ่งชีวิต กฎกำลังสองผกผัน และการคำนวณโดสรังสี UV-C 254 nm ทำลายดีเอ็นเอจุลินทรีย์'
    ],
    [
        'id' => 'lab12',
        'num' => '12',
        'title_th' => 'การดูดกลืนแสง สเปกโทรโฟโตเมตรี และกราฟการเจริญเติบโต OD600',
        'title_en' => 'Spectrophotometry, Beer-Lambert Law & Bacterial OD600',
        'sim_file' => '03_physics4microbio2026/simulations/sim12_od600_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab12_od600.php',
        'badge' => 'OD600 & Growth Curve',
        'color' => 'from-emerald-500 to-green-600',
        'border' => 'border-emerald-500/30',
        'icon' => 'fa-chart-line',
        'summary' => 'กฎของเบียร์-แลมเบิร์ต A = εbc การวัดความขุ่น OD600 และการสร้างกราฟการเจริญเติบโตของแบคทีเรีย'
    ],
    [
        'id' => 'lab13',
        'num' => '13',
        'title_th' => 'โครงงานย่อยบูรณาการ (Capstone Mini-Project): เครื่องมือชีวฟิสิกส์อัจฉริยะ',
        'title_en' => 'Capstone Mini-Project: Smart Biophysical IoT Rig',
        'sim_file' => '03_physics4microbio2026/simulations/sim12_od600_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab13_mini_project.php',
        'badge' => 'Capstone Mini-Project',
        'color' => 'from-pink-500 to-purple-600',
        'border' => 'border-pink-500/30',
        'icon' => 'fa-microchip',
        'summary' => 'การบูรณาการองค์ความรู้ฟิสิกส์ 12 บทเรียน สู่การออกแบบระบบวัดหรือเซนเซอร์ตรวจสอบจุลินทรีย์อัจฉริยะ'
    ]
];"""

new_chapters_code = """// 12 Theory Chapters Master Catalog (Aligned with main.tex Single Source of Truth)
$chapters = [
    [
        'num' => '01',
        'icon' => 'fa-ruler-combined',
        'title_th' => 'ระบบหน่วยและการวัดในโลกจุลทรรศน์',
        'title_en' => 'Units & Microscale Measurements',
        'title_zh' => '单位系统与微观测量',
        'anchor' => 'P1000 Micropipette & Calibration',
        'summary' => 'ความสำคัญของหน่วยเอสไอ คำอุปสรรค บันไดคำอุปสรรค x1000 และการสอบเทียบไมโครปิเปตตาม ISO 8655',
        'ch_file' => '03_physics4microbio2026/chapters/ch01_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim_micropipette_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab01_measurement.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch02_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim02_brownian_motion_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab02_brownian_motion.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch03_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim03_viscometer_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab03_viscosity.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch04_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim04_centrifuge_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab04_centrifuge.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch05_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim05_incubator_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab05_heat_incubator.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch06_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim06_autoclave_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab06_autoclave.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch07_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim07_gram_stain_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab07_gram_electrostatics.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch08_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim10_electrophoresis_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab08_electrophoresis.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch09_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim09_refraction_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab09_refraction.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch10_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim11_optics_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab10_microscope.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch11_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim12_radioactivity_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab11_radioactivity_uv.php',
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
        'ch_file' => '03_physics4microbio2026/chapters/ch12_th.php',
        'sim_file' => '03_physics4microbio2026/simulations/sim12_od600_3d.html',
        'lab_file' => '03_physics4microbio2026/labs/lab12_od600.php',
        'aruco_id' => 11,
        'color' => '#10b981'
    ]
];

// 4 Preserved Enrichment Modules
$enrichmentModules = [
    [
        'title' => 'โมเมนตัมและการชนในระบบชีวภาพ',
        'desc' => 'การถ่ายโอนโมเมนตัม แรงดล และการสลายเซลล์ด้วยคลื่นเสียงอัลตราโซนิก (Sonication)',
        'ch_file' => '03_physics4microbio2026/enrichment/momentum_th.php',
        'lab_file' => '03_physics4microbio2026/enrichment/lab_momentum.php',
        'icon' => 'fa-burst'
    ],
    [
        'title' => 'สมดุลกล ความดันของไหล และปรากฏการณ์ออสโมซิส',
        'desc' => 'สมดุลไฮโดรสแตติก ความดันออสโมติกแวนต์ฮอฟฟ์ สภาวะเซลล์เต่ง/เหี่ยว (Plasmolysis)',
        'ch_file' => '03_physics4microbio2026/enrichment/osmosis_th.php',
        'lab_file' => '03_physics4microbio2026/enrichment/lab_osmosis.php',
        'icon' => 'fa-scale-balanced'
    ],
    [
        'title' => 'งาน พลังงาน และมอเตอร์โมเลกุลชีวภาพ ATP Synthase',
        'desc' => 'พลังขับเคลื่อนโปรตอน (PMF) และประสิทธิภาพการแปลงรูปพลังงานกลหมุนสร้างโมเลกุล ATP',
        'ch_file' => '03_physics4microbio2026/enrichment/atp_synthase_th.php',
        'lab_file' => '03_physics4microbio2026/enrichment/lab_atp_synthase.php',
        'icon' => 'fa-bolt'
    ],
    [
        'title' => 'การหมุน สมดุลการหมุน และกลศาสตร์นาโนของแฟลกเจลลา',
        'desc' => 'ทอร์ก โมเมนต์ความเฉื่อย กำลังกลศาสตร์นาโนของการหมุนแส้แฟลกเจลลัม 300 Hz',
        'ch_file' => '03_physics4microbio2026/enrichment/flagella_th.php',
        'lab_file' => '03_physics4microbio2026/enrichment/lab_flagella.php',
        'icon' => 'fa-gears'
    ]
];"""

with open(INDEX_PATH, "r", encoding="utf-8") as f:
    content = f.read()

# Replace $labs and $chapters block
pattern = r"// 12 Labs Master Catalog[\s\S]*?\$chapters = \[\s*[\s\S]*?\n\];"
replacement = f"{new_labs_code}\n\n{new_chapters_code}"

new_content = re.sub(pattern, replacement, content)

# Also update navigation buttons text:
new_content = new_content.replace(
    '<i class="fa-solid fa-flask text-cyan-400"></i> 12 ปฏิบัติการ 3D',
    '<i class="fa-solid fa-flask text-cyan-400"></i> 13 ปฏิบัติการ 3D'
)
new_content = new_content.replace(
    '<i class="fa-solid fa-book-open text-amber-400"></i> 13 บทเรียนทฤษฎี',
    '<i class="fa-solid fa-book-open text-amber-400"></i> 12 บทเรียนหลัก (main.tex)'
)

with open(INDEX_PATH, "w", encoding="utf-8") as f:
    f.write(new_content)

print("Root index.php successfully updated with main.tex alignment!")

