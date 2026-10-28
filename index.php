<?php
/**
 * Master Unified Course Portal
 * Course: 4011111 Physics for Microbiology (ฟิสิกส์สำหรับจุลชีววิทยา 2026/2027)
 * Faculty of Science and Technology, Rambhai Barni Rajabhat University
 * Instructor: Asst. Prof. Dr. Chewa Thassana (ผศ.ดร.ชีวะ ทัศนา)
 */

$courseCode = '4011111';
$courseNameTH = 'ฟิสิกส์สำหรับจุลชีววิทยา';
$courseNameEN = 'Physics for Microbiology';
$academicYear = '2569/2570 (2026/2027)';
$credits = '3(2-3-4)';

// 13 Labs Master Catalog (Aligned with main.tex 15-Week Syllabus)
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
];

// 12 Theory Chapters Master Catalog (Aligned with main.tex Single Source of Truth)
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
];
?>
<!DOCTYPE html>
<html lang="th" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology 2026/2027) | RBRU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fui_cyber_theme.css">
    <style>
        body { font-family: 'Prompt', sans-serif; }
        code, pre, .font-mono { font-family: 'JetBrains Mono', monospace; }
        .glass-nav {
            background: rgba(2, 6, 23, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 189, 248, 0.4);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 8px 10px -6px rgba(0, 0, 0, 0.5);
        }
        @keyframes heroFloat {
            0%, 100% { transform: translateY(0px) scale(1.0); }
            50% { transform: translateY(-8px) scale(1.015); }
        }
        .hero-float { animation: heroFloat 5.5s infinite ease-in-out; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen selection:bg-cyan-500 selection:text-slate-950 relative overflow-x-hidden">

    <!-- Ambient Glowing Orbs -->
    <div class="fixed top-0 left-1/4 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed top-1/2 right-10 w-[500px] h-[500px] bg-amber-600/10 rounded-full blur-[140px] pointer-events-none -z-10"></div>
    <div class="fixed bottom-0 left-1/3 w-[700px] h-[700px] bg-emerald-600/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>

    <!-- ─── TOP NAVIGATION BAR ────────────────────────────────────────────────── -->
    <nav class="sticky top-0 z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand -->
            <a href="index.php" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-cyan-500 via-teal-500 to-emerald-500 flex items-center justify-center text-slate-950 shadow-lg shadow-cyan-950/50 group-hover:scale-105 transition">
                    <i class="fa-solid fa-microscope text-lg"></i>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-cyan-400 font-mono font-bold">RBRU • Science & Tech</div>
                    <div class="text-sm sm:text-base font-bold text-white group-hover:text-cyan-300 transition">ฟิสิกส์สำหรับจุลชีววิทยา 2027</div>
                </div>
            </a>

            <!-- Nav Links (Unified Two-Way Navigation) -->
            <div class="hidden lg:flex items-center gap-4 text-xs font-semibold">
                <button onclick="switchMainTab('labs'); document.getElementById('course-modules').scrollIntoView({behavior:'smooth'});" class="text-slate-300 hover:text-cyan-400 transition flex items-center gap-1.5 cursor-pointer py-1.5 px-2.5 rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-flask text-cyan-400"></i> 13 ปฏิบัติการ 3D
                </button>
                <button onclick="switchMainTab('chapters'); document.getElementById('course-modules').scrollIntoView({behavior:'smooth'});" class="text-slate-300 hover:text-amber-400 transition flex items-center gap-1.5 cursor-pointer py-1.5 px-2.5 rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-book-open text-amber-400"></i> 12 บทเรียนหลัก (main.tex)
                </button>
                <a href="virtual_lab/index.html" class="text-slate-300 hover:text-cyan-400 transition flex items-center gap-1.5 py-1.5 px-2.5 rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-cubes text-cyan-400"></i> Virtual Lab Hub
                </a>
                <a href="แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/ar_aruco_textbook.html?ar=1" target="_blank" class="text-slate-300 hover:text-purple-400 transition flex items-center gap-1.5 py-1.5 px-2.5 rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-camera-rotate text-purple-400"></i> ส่องกล้อง 3D WebAR
                </a>
                <a href="#student-lookup" class="text-slate-300 hover:text-emerald-400 transition flex items-center gap-1.5 py-1.5 px-2.5 rounded-lg hover:bg-white/5">
                    <i class="fa-solid fa-magnifying-glass text-emerald-400"></i> ตรวจสอบคะแนน
                </a>
            </div>

            <!-- Action: Instructor Portal Link -->
            <div class="flex items-center gap-3">
                <a href="admin/index.php" class="px-4 py-2 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold text-xs shadow-lg shadow-cyan-950/50 hover:scale-105 transition flex items-center gap-2">
                    <i class="fa-solid fa-user-shield"></i>
                    <span>หลังบ้านอาจารย์</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- ─── HERO SECTION ──────────────────────────────────────────────────────── -->
    <header class="relative pt-12 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <!-- Left: Hero Text & Core Badges -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex flex-wrap items-center gap-2">
                    <span class="px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 text-xs font-mono font-bold">
                        <i class="fa-solid fa-graduation-cap mr-1"></i> หลักสูตรปรับปรุง พ.ศ. 2569/2570
                    </span>
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-mono font-bold">
                        <i class="fa-solid fa-cube mr-1"></i> Three.js r128 3D & PBR
                    </span>
                    <span class="px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/30 text-purple-300 text-xs font-mono font-bold">
                        <i class="fa-solid fa-database mr-1"></i> SQLite3 Dual-Backend
                    </span>
                </div>

                <div class="space-y-3">
                    <div class="text-amber-400 font-mono text-sm tracking-wider uppercase font-semibold">
                        4011111 Physics for Microbiology 3(2-3-4)
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight">
                        ฟิสิกส์สำหรับ<br>
                        <span class="bg-gradient-to-r from-cyan-400 via-teal-300 to-emerald-400 bg-clip-text text-transparent">
                            จุลชีววิทยาสมัยใหม่
                        </span>
                    </h1>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed max-w-2xl">
                        นวัตกรรมการเรียนรู้ชีวฟิสิกส์เชิงลึก (Low-Math, High-Intuition) ผสานห้องปฏิบัติการเสมือนจริง 3 มิติ 
                        <strong>12 ปฏิบัติการ</strong>, สื่ออินเทอร์แอคทีฟ <strong>3D WebAR ArUco</strong> ส่องกล้องบนสมาร์ทโฟน 
                        พร้อมระบบส่งรายงานและตรวจประเมินผลออนไลน์ผ่านฐานข้อมูล SQLite3
                    </p>
                </div>

                <!-- CTA Action Buttons -->
                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="#labs" class="px-6 py-3.5 rounded-2xl bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 text-slate-950 font-bold text-sm shadow-xl shadow-cyan-950/50 hover:scale-105 transition flex items-center gap-2">
                        <i class="fa-solid fa-flask"></i>
                        <span>เข้าสู่ 12 ปฏิบัติการชีวฟิสิกส์</span>
                    </a>

                    <a href="03_physics4microbio2026/index.php" class="px-6 py-3.5 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm border border-white/10 hover:border-cyan-400/50 transition flex items-center gap-2">
                        <i class="fa-solid fa-book-open text-amber-400"></i>
                        <span>เข้าสู่ 12 บทเรียนทฤษฎี</span>
                    </a>

                    <a href="admin/index.php" class="px-5 py-3.5 rounded-2xl bg-slate-900/80 hover:bg-slate-800 text-slate-300 hover:text-cyan-300 font-semibold text-sm border border-white/10 transition flex items-center gap-2">
                        <i class="fa-solid fa-lock text-cyan-400"></i>
                        <span>ระบบหลังบ้านอาจารย์</span>
                    </a>
                </div>

                <!-- Instructor Info & Speech Synth -->
                <div class="flex items-center gap-4 pt-4 border-t border-slate-800/80">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 text-slate-950 font-bold text-base flex items-center justify-center shadow-md">
                        CT
                    </div>
                    <div>
                        <div class="text-sm font-bold text-white">ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา (Asst. Prof. Dr. Chewa Thassana)</div>
                        <div class="text-xs text-slate-400">ผู้รับผิดชอบรายวิชา • สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี</div>
                    </div>
                    <button type="button" onclick="speakIntro()" id="btnVoice" class="ml-auto px-3.5 py-1.5 rounded-full bg-slate-900 hover:bg-slate-800 border border-emerald-500/40 text-emerald-300 text-xs font-semibold flex items-center gap-1.5 transition">
                        <i class="fa-solid fa-volume-high"></i>
                        <span class="hidden sm:inline">ฟังเสียงต้อนรับ</span>
                    </button>
                </div>
            </div>

            <!-- Right: 3D Pixar Visual Card with FUI Digital Twin Frame -->
            <div class="lg:col-span-5 relative">
                <div class="fui-viewport-cyan p-4 rounded-3xl border border-cyan-400/50 shadow-2xl relative overflow-hidden group">
                    <!-- Diagonal glass sheen & flare beams -->
                    <div class="fui-glass-sheen"></div>
                    <div class="fui-flare-beam top w-3/4"></div>
                    <div class="fui-flare-beam bottom w-1/2"></div>

                    <!-- Top HUD Header -->
                    <div class="flex justify-between items-center px-2 py-1 mb-2 relative z-10 font-mono text-[11px] text-cyan-300">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                            <span class="font-bold tracking-wider">HOLO-TWIN // RBRU-AGRI</span>
                        </span>
                        <span class="text-slate-400">[12.61&deg;N 102.10&deg;E]</span>
                    </div>

                    <div class="aspect-[4/3.6] rounded-2xl overflow-hidden relative bg-slate-900 border border-cyan-500/30">
                        <img src="cover_ar_physics4microbio2027.jpg" alt="4011111 ฟิสิกส์สำหรับจุลชีววิทยา 2027"
                             class="w-full h-full object-cover hero-float"
                             onerror="this.src='03_physics4microbio2026/images/cover/book_cover.png'">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent pointer-events-none"></div>

                        <!-- Badge Overlay -->
                        <div class="absolute top-3 right-3 px-3 py-1 rounded-full bg-slate-950/80 backdrop-blur-md border border-cyan-400/40 text-cyan-300 text-xs font-mono font-bold shadow-lg">
                            ✨ 3D Pixar-Ghibli Style
                        </div>

                        <!-- AR Camera Quick Launch Bar -->
                        <div class="absolute bottom-3 left-3 right-3 p-3 rounded-xl bg-slate-950/90 backdrop-blur-md border border-emerald-500/40 flex items-center justify-between">
                            <div>
                                <div class="text-xs font-bold text-emerald-300">WebAR ArUco Marker Scanner</div>
                                <div class="text-[10px] text-slate-400">ส่องภาพตำราจำลองเครื่องมือชีวฟิสิกส์ 3 มิติ</div>
                            </div>
                            <a href="แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/ar_aruco_textbook.html?ar=1" target="_blank"
                               class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold text-xs hover:scale-105 transition flex items-center gap-1 shadow-md shadow-emerald-950/50">
                                <i class="fa-solid fa-camera"></i>
                                <span>เปิดกล้อง AR</span>
                            </a>
                        </div>
                    </div>

                    <!-- Bottom Tech Strip & Radar Node -->
                    <div class="flex justify-between items-center px-2 pt-2 relative z-10 text-[10px] font-mono text-slate-400">
                        <div class="w-32 h-2.5 fui-vent-stripes-cyan rounded-sm"></div>
                        <span class="text-cyan-400 font-bold">DIGITAL LAB CORE &bull; V2.7</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ─── UNIFIED COURSE MODULES & LABS HUB ──────────────────────────────────────── -->
    <section id="course-modules" class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-8">
        
        <!-- Header & Dual Tab Navigation -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-slate-800 pb-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-mono font-bold uppercase mb-2">
                    <i class="fa-solid fa-layer-group"></i> Unified Course Architecture 2026/2027
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">ศูนย์รวมบทเรียนและปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-1 max-w-2xl">
                    เรียนรู้ฟิสิกส์ผ่านเครื่องมือห้องแล็บจริง เชื่อมโยง 13 บทเรียนทฤษฎีแบบ Low-Math สู่ 12 ปฏิบัติการเสมือนจริง 3 มิติ และโมเดล 3D WebAR
                </p>
            </div>
            
            <!-- Dual Mode Tab Switcher -->
            <div class="flex items-center p-1.5 rounded-2xl bg-slate-900 border border-white/10 shadow-2xl shrink-0">
                <button id="tabBtnLabs" onclick="switchMainTab('labs')" class="px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm bg-gradient-to-r from-cyan-600 to-teal-600 text-white shadow-lg shadow-cyan-950/60 border border-cyan-400/40 flex items-center gap-2 transition active:scale-95">
                    <i class="fa-solid fa-flask"></i>
                    <span>12 ปฏิบัติการ 3D (Labs)</span>
                </button>
                <button id="tabBtnChapters" onclick="switchMainTab('chapters')" class="px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-slate-400 hover:text-white flex items-center gap-2 transition active:scale-95">
                    <i class="fa-solid fa-book-open text-amber-400"></i>
                    <span>13 บทเรียนทฤษฎี (Chapters)</span>
                </button>
            </div>
        </div>

        <!-- 🧪 TAB 1: 12 LABS GRID -->
        <div id="tabContentLabs" class="space-y-6">
            <div class="flex items-center justify-between text-xs text-slate-400">
                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                    <span>คลิกเพื่อเปิดเครื่องมือจำลอง 3 มิติ หรือทำรายงานผลการทดลอง</span>
                </span>
                <a href="virtual_lab/index.html" class="text-cyan-400 hover:text-cyan-300 font-bold flex items-center gap-1 transition">
                    <i class="fa-solid fa-cubes"></i> เปิด Virtual Lab Hub รวม ↗
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($labs as $lab): ?>
                    <div class="fui-card-amber p-6 flex flex-col justify-between space-y-4 hover:border-cyan-400 group">
                        <div class="space-y-3 pt-2">
                            <!-- Card Header -->
                            <div class="flex items-start justify-between gap-3">
                                <span class="px-3 py-1 rounded-xl bg-gradient-to-r <?= $lab['color'] ?> text-white font-mono font-bold text-xs shadow-md">
                                    LAB <?= $lab['num'] ?>
                                </span>
                                <div class="flex items-center gap-2">
                                    <span class="px-2.5 py-0.5 rounded-full bg-slate-900 border border-white/10 text-slate-400 text-[11px] font-mono">
                                        <?= htmlspecialchars($lab['badge']) ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Titles -->
                            <div>
                                <h3 class="text-base font-bold text-white group-hover:text-cyan-300 transition leading-snug">
                                    <?= htmlspecialchars($lab['title_th']) ?>
                                </h3>
                                <div class="text-xs text-slate-400 font-mono mt-1">
                                    <?= htmlspecialchars($lab['title_en']) ?>
                                </div>
                            </div>

                            <!-- Summary -->
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <?= htmlspecialchars($lab['summary']) ?>
                            </p>

                            <!-- Two-Way Link to Theory Chapter -->
                            <div class="pt-1">
                                <a href="03_physics4microbio2026/chapters/ch<?= $lab['num'] ?>_th.php" class="inline-flex items-center gap-1.5 text-xs text-amber-400 hover:text-amber-300 font-semibold transition hover:underline">
                                    <i class="fa-solid fa-book-bookmark"></i>
                                    <span>อ่านทฤษฎีและสูตรคำนวณบทที่ <?= intval($lab['num']) ?> →</span>
                                </a>
                            </div>
                        </div>

                        <!-- Tech vent divider & Dual Action Buttons -->
                        <div class="space-y-3 pt-2 border-t border-slate-800">
                            <div class="flex items-center justify-between text-[10px] font-mono text-slate-500">
                                <div class="w-16 h-2 fui-vent-stripes rounded-sm opacity-60"></div>
                                <span class="text-cyan-400/80">3D SIMULATOR &bull; PBR</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="<?= $lab['sim_file'] ?>" target="_blank"
                                   class="py-2 px-3 rounded-xl bg-slate-900 hover:bg-cyan-500/20 text-cyan-300 hover:text-cyan-200 border border-cyan-500/30 hover:border-cyan-400 text-xs font-bold flex items-center justify-center gap-1.5 transition">
                                    <i class="fa-solid fa-cube text-xs"></i>
                                    <span>3D Simulator</span>
                                </a>

                                <a href="<?= $lab['lab_file'] ?>"
                                   class="py-2 px-3 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold text-xs shadow hover:scale-[1.02] flex items-center justify-center gap-1.5 transition">
                                    <i class="fa-solid fa-file-pen text-xs"></i>
                                    <span>คู่มือ & E-Report</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 📚 TAB 2: 13 THEORY CHAPTERS GRID -->
        <div id="tabContentChapters" class="space-y-6 hidden">
            <div class="flex items-center justify-between text-xs text-slate-400">
                <span class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    <span>บทเรียนแนวคิด Low-Math, High-Intuition เน้นเครื่องมือจริงและการแปรผัน</span>
                </span>
                <a href="03_physics4microbio2026/index.php" class="text-amber-400 hover:text-amber-300 font-bold flex items-center gap-1 transition">
                    <i class="fa-solid fa-book-open"></i> เปิดคลังบทเรียนเต็มรูปแบบ ↗
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($chapters as $ch): ?>
                    <div class="glass-card p-6 flex flex-col justify-between space-y-4 border border-amber-500/20 hover:border-amber-400 group rounded-3xl bg-slate-900/80 backdrop-blur-xl transition shadow-xl">
                        <div class="space-y-3 pt-2">
                            <!-- Card Header -->
                            <div class="flex items-start justify-between gap-3">
                                <span class="px-3 py-1 rounded-xl bg-gradient-to-r from-amber-600 to-orange-600 text-white font-mono font-bold text-xs shadow-md">
                                    CHAPTER <?= $ch['num'] ?>
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-[11px] font-semibold">
                                    <i class="fa-solid fa-microscope text-[10px] mr-1"></i> <?= htmlspecialchars($ch['anchor']) ?>
                                </span>
                            </div>

                            <!-- Titles -->
                            <div>
                                <h3 class="text-base font-bold text-white group-hover:text-amber-300 transition leading-snug">
                                    <?= htmlspecialchars($ch['title_th']) ?>
                                </h3>
                                <div class="text-xs text-slate-400 font-mono mt-1">
                                    <?= htmlspecialchars($ch['title_en']) ?>
                                </div>
                            </div>

                            <!-- Summary -->
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <?= htmlspecialchars($ch['summary']) ?>
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-2 pt-2 border-t border-slate-800">
                            <div class="grid grid-cols-2 gap-2">
                                <a href="<?= $ch['ch_file'] ?>"
                                   class="py-2.5 px-3 rounded-xl bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-500 hover:to-orange-500 text-white font-bold text-xs shadow flex items-center justify-center gap-1.5 transition hover:scale-[1.02]">
                                    <i class="fa-solid fa-book-bookmark text-xs"></i>
                                    <span>อ่านบทเรียน</span>
                                </a>

                                <?php if (!empty($ch['lab_file'])): ?>
                                    <a href="<?= $ch['lab_file'] ?>"
                                       class="py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-emerald-500/20 text-emerald-300 hover:text-emerald-200 border border-emerald-500/30 hover:border-emerald-400 text-xs font-bold flex items-center justify-center gap-1.5 transition">
                                        <i class="fa-solid fa-flask text-xs"></i>
                                        <span>ทำ Lab <?= $ch['num'] ?></span>
                                    </a>
                                <?php else: ?>
                                    <a href="แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/ar_aruco_textbook.html?marker=<?= $ch['aruco_id'] ?? 0 ?>" target="_blank"
                                       class="py-2.5 px-3 rounded-xl bg-slate-900 hover:bg-purple-500/20 text-purple-300 hover:text-purple-200 border border-purple-500/30 text-xs font-bold flex items-center justify-center gap-1.5 transition">
                                        <i class="fa-solid fa-camera text-xs"></i>
                                        <span>ส่อง AR</span>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1 font-mono">
                                <a href="<?= $ch['sim_file'] ?>" target="_blank" class="hover:text-cyan-300 transition flex items-center gap-1">
                                    <i class="fa-solid fa-cube text-cyan-400"></i> เปิด 3D Sim ↗
                                </a>
                                <a href="แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/ar_aruco_textbook.html?marker=<?= $ch['aruco_id'] ?? 0 ?>" target="_blank" class="hover:text-purple-300 transition flex items-center gap-1">
                                    <i class="fa-solid fa-vr-cardboard text-purple-400"></i> ArUco ID <?= $ch['aruco_id'] ?? 0 ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
    function switchMainTab(tab) {
        const labsContainer = document.getElementById('tabContentLabs');
        const chsContainer = document.getElementById('tabContentChapters');
        const btnLabs = document.getElementById('tabBtnLabs');
        const btnChs = document.getElementById('tabBtnChapters');

        if (tab === 'chapters') {
            labsContainer.classList.add('hidden');
            chsContainer.classList.remove('hidden');
            btnLabs.className = 'px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-slate-400 hover:text-white flex items-center gap-2 transition active:scale-95';
            btnChs.className = 'px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm bg-gradient-to-r from-amber-600 to-orange-600 text-white shadow-lg shadow-amber-950/60 border border-amber-400/40 flex items-center gap-2 transition active:scale-95';
        } else {
            labsContainer.classList.remove('hidden');
            chsContainer.classList.add('hidden');
            btnLabs.className = 'px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm bg-gradient-to-r from-cyan-600 to-teal-600 text-white shadow-lg shadow-cyan-950/60 border border-cyan-400/40 flex items-center gap-2 transition active:scale-95';
            btnChs.className = 'px-5 py-2.5 rounded-xl font-bold text-xs sm:text-sm text-slate-400 hover:text-white flex items-center gap-2 transition active:scale-95';
        }
    }
    </script>
<!-- ─── STUDENT SELF-CHECK SCORE LOOKUP WIDGET ────────────────────────────── -->
    <section id="student-lookup" class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="glass-panel p-8 rounded-3xl border border-white/10 bg-gradient-to-br from-slate-900 via-slate-900/90 to-purple-950/30 space-y-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-300 text-xs font-mono font-bold">
                        <i class="fa-solid fa-magnifying-glass"></i> Student Self-Service Portal
                    </div>
                    <h3 class="text-2xl font-bold text-white">ระบบตรวจสอบคะแนนและผลการตรวจรายงาน</h3>
                    <p class="text-xs sm:text-sm text-slate-400">
                        นักศึกษาสามารถค้นหาข้อมูลรายงานที่ส่ง ผลคะแนน และข้อเสนอแนะจากอาจารย์ผู้สอนได้ทันที
                    </p>
                </div>

                <!-- Search Input Form -->
                <div class="flex items-center gap-2 w-full md:w-96">
                    <input type="text" id="studentSearchInput" placeholder="กรอกรหัสนักศึกษา (เช่น 6604101001)"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-950 border border-slate-700 text-xs sm:text-sm font-mono text-white placeholder-slate-500 outline-none focus:border-purple-400">
                    <button type="button" onclick="searchStudentReports()"
                            class="px-5 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs sm:text-sm transition flex items-center gap-1.5 shrink-0 shadow-lg shadow-purple-950/50">
                        <i class="fa-solid fa-search"></i>
                        <span>ค้นหา</span>
                    </button>
                </div>
            </div>

            <!-- Search Result Container -->
            <div id="studentSearchResult" class="hidden space-y-4 pt-4 border-t border-slate-800"></div>
        </div>
    </section>

    <!-- ─── COURSE OBE FRAMEWORK & CLO ALIGNMENT ──────────────────────────────── -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto space-y-8">
        <div class="text-center max-w-3xl mx-auto space-y-2">
            <div class="text-xs uppercase font-mono tracking-widest text-cyan-400 font-bold">Outcome-Based Education</div>
            <h2 class="text-3xl font-bold text-white">ผลลัพธ์การเรียนรู้ที่คาดหวังของรายวิชา (Course Learning Outcomes)</h2>
            <p class="text-xs sm:text-sm text-slate-400">ตามเกณฑ์มาตรฐานคุณวุฒิระดับอุดมศึกษา พ.ศ. 2565 และเกณฑ์ประกันคุณภาพการศึกษา AUN-QA</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-xs">
            <div class="glass-card p-5 rounded-2xl border border-cyan-500/20 space-y-2">
                <div class="w-8 h-8 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold font-mono">
                    CLO1
                </div>
                <h4 class="font-bold text-white text-sm">หลักการฟิสิกส์พื้นฐาน</h4>
                <p class="text-slate-400 leading-relaxed">
                    อธิบายหลักการและกฎทางฟิสิกส์พื้นฐานที่เกี่ยวข้องกับการวัด เวกเตอร์ จลนศาสตร์ กลศาสตร์ และคลื่นได้ถูกต้อง
                </p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-teal-500/20 space-y-2">
                <div class="w-8 h-8 rounded-xl bg-teal-500/20 text-teal-400 flex items-center justify-center font-bold font-mono">
                    CLO2
                </div>
                <h4 class="font-bold text-white text-sm">การเชื่อมโยงระบบชีวภาพ</h4>
                <p class="text-slate-400 leading-relaxed">
                    วิเคราะห์และอธิบายปรากฏการณ์ทางชีวภาพของจุลินทรีย์โดยใช้หลักการและทฤษฎีทางฟิสิกส์ได้อย่างเป็นเหตุเป็นผล
                </p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-amber-500/20 space-y-2">
                <div class="w-8 h-8 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold font-mono">
                    CLO3
                </div>
                <h4 class="font-bold text-white text-sm">ทักษะเครื่องมือและเทคโนโลยี</h4>
                <p class="text-slate-400 leading-relaxed">
                    ประยุกต์ใช้เครื่องมือจำลองเสมือนจริง 3 มิติ และเครื่องมือทางฟิสิกส์ในงานจุลชีววิทยาได้อย่างถูกต้อง ปลอดภัย
                </p>
            </div>

            <div class="glass-card p-5 rounded-2xl border border-purple-500/20 space-y-2">
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold font-mono">
                    CLO4
                </div>
                <h4 class="font-bold text-white text-sm">การคิดวิเคราะห์และแก้ปัญหา</h4>
                <p class="text-slate-400 leading-relaxed">
                    คำนวณและวิเคราะห์ข้อมูลเชิงปริมาณจากผลการทดลองทางจุลชีววิทยา เพื่อสรุปผลตามกระบวนการทางวิทยาศาสตร์
                </p>
            </div>
        </div>
    </section>

    <!-- ─── FOOTER ────────────────────────────────────────────────────────────── -->
    <footer class="border-t border-slate-800 bg-slate-950/80 pt-12 pb-8 px-4 sm:px-6 lg:px-8 text-xs text-slate-400">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="space-y-3 md:col-span-2">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-xl bg-cyan-500 text-slate-950 font-bold flex items-center justify-center">
                        <i class="fa-solid fa-microscope text-sm"></i>
                    </div>
                    <span class="text-sm font-bold text-white">4011111 ฟิสิกส์สำหรับจุลชีววิทยา</span>
                </div>
                <p class="text-[11px] leading-relaxed max-w-md">
                    พัฒนาและออกแบบระบบการเรียนรู้โดย ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา 
                    สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี
                </p>
                <div class="text-[11px] font-mono text-cyan-400">
                    LEQs-GLOBE Digital Learning Ecosystem 2027
                </div>
            </div>

            <div class="space-y-2">
                <div class="text-xs font-bold text-white uppercase tracking-wider">ลิงก์ระบบสำคัญ</div>
                <ul class="space-y-1.5 text-[11px]">
                    <li><a href="#labs" class="hover:text-cyan-400 transition">12 ปฏิบัติการชีวฟิสิกส์ 3D</a></li>
                    <li><a href="03_physics4microbio2026/index.php" class="hover:text-cyan-400 transition">12 บทเรียนทฤษฎีและตำรา</a></li>
                    <li><a href="virtual_lab/index.html" class="hover:text-cyan-400 transition">Virtual Lab Simulator Hub</a></li>
                    <li><a href="admin/index.php" class="hover:text-cyan-400 transition text-cyan-400 font-semibold"><i class="fa-solid fa-lock text-[10px]"></i> เข้าสู่ระบบหลังบ้านอาจารย์ (Admin)</a></li>
                </ul>
            </div>

            <div class="space-y-2">
                <div class="text-xs font-bold text-white uppercase tracking-wider">ติดต่ออาจารย์ผู้สอน</div>
                <div class="text-[11px] space-y-1">
                    <div>ผศ.ดร.ชีวะ ทัศนา</div>
                    <div>อีเมล: <span class="font-mono text-slate-300">chewa.t@rbru.ac.th</span></div>
                    <div>ศูนย์ความเป็นเลิศ LEQs-GLOBE อาคาร 35</div>
                    <div>มรภ.รำไพพรรณี จ.จันทบุรี</div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-6 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-3 text-[11px]">
            <div>© 2026-2027 Rambhai Barni Rajabhat University. All rights reserved.</div>
            <div class="flex items-center gap-3">
                <a href="admin/index.php" class="text-slate-400 hover:text-cyan-400 transition flex items-center gap-1 font-mono">
                    <i class="fa-solid fa-user-shield"></i> Instructor Login
                </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Web Speech API Voice Greeting
        function speakIntro() {
            if (!('speechSynthesis' in window)) {
                alert('เบราว์เซอร์นี้ไม่รองรับระบบสังเคราะห์เสียงพูด');
                return;
            }
            window.speechSynthesis.cancel();
            const rawText = "สวัสดีครับนักศึกษาทุกคน ขอต้อนรับสู่รายวิชา สี่ ศูนย์ หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง ฟิสิกส์สำหรับจุลชีววิทยา มหาวิทยาลัยราชภัฏรำไพพรรณี มาเรียนรู้ฟิสิกส์ผ่านเครื่องมือจำลอง 3 มิติ ทั้ง 12 ปฏิบัติการด้วยกันนะครับ";
            const text = rawText.replace(/4011111/g, 'สี่ ศูนย์ หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง');
            const ut = new SpeechSynthesisUtterance(text);
            ut.lang = 'th-TH';
            ut.rate = 1.0;
            ut.pitch = 1.05;

            const btn = document.getElementById('btnVoice');
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>กำลังเล่นเสียง...</span>';
            ut.onend = () => {
                btn.innerHTML = '<i class="fa-solid fa-volume-high"></i> <span class="hidden sm:inline">ฟังเสียงต้อนรับ</span>';
            };
            window.speechSynthesis.speak(ut);
        }

        // Student Self-Service Score Search
        async function searchStudentReports() {
            const sid = document.getElementById('studentSearchInput').value.trim();
            const resBox = document.getElementById('studentSearchResult');

            if (!sid) {
                alert('กรุณากรอกรหัสนักศึกษา');
                return;
            }

            resBox.classList.remove('hidden');
            resBox.innerHTML = `
                <div class="py-6 text-center text-slate-400 text-xs">
                    <i class="fa-solid fa-circle-notch fa-spin text-xl text-purple-400 mb-2 block"></i>
                    <span>กำลังค้นหาข้อมูลในระบบฐานข้อมูล...</span>
                </div>
            `;

            try {
                const res = await fetch('virtual_lab/api/api.php?action=search_student_reports&student_id=' + encodeURIComponent(sid));
                const json = await res.json();

                if (!json.success || !json.student) {
                    resBox.innerHTML = `
                        <div class="p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-300 text-xs">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            ${json.error || 'ไม่พบข้อมูลนักศึกษารหัสนี้ในระบบ'}
                        </div>
                    `;
                    return;
                }

                const s = json.student;
                const reports = json.reports || [];

                let html = `
                    <div class="bg-slate-950 p-4 rounded-2xl border border-white/10 flex flex-col sm:flex-row sm:items-center justify-between gap-3 text-xs">
                        <div>
                            <div class="font-bold text-white text-sm">${s.prefix || ''} ${s.fullname}</div>
                            <div class="text-slate-400 font-mono mt-0.5">รหัสนักศึกษา: <span class="text-cyan-300 font-bold">${s.student_id}</span> • สาขา${s.program || 'จุลชีววิทยา'} (${s.section || 'Sec 01'})</div>
                        </div>
                        <div class="px-3 py-1.5 rounded-xl bg-purple-500/20 border border-purple-500/30 text-purple-300 font-mono font-bold self-start sm:self-auto">
                            ส่งแล้ว: ${reports.length} / 12 รายงาน
                        </div>
                    </div>
                `;

                if (reports.length === 0) {
                    html += `
                        <div class="p-4 rounded-xl bg-slate-900 text-center text-slate-400 text-xs">
                            ยังไม่มีประวัติการส่งรายงานผลการทดลองในระบบ
                        </div>
                    `;
                } else {
                    html += `
                        <div class="overflow-x-auto rounded-xl border border-slate-800">
                            <table class="w-full text-left text-xs border-collapse font-sans">
                                <thead class="bg-slate-900 text-slate-400 font-bold border-b border-slate-800 uppercase tracking-wider">
                                    <tr>
                                        <th class="px-3 py-2">ปฏิบัติการ</th>
                                        <th class="px-3 py-2 text-center">ความแม่นยำ</th>
                                        <th class="px-3 py-2 text-center">คะแนนอาจารย์</th>
                                        <th class="px-3 py-2">ข้อเสนอแนะอาจารย์</th>
                                        <th class="px-3 py-2">เวลาส่ง</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/60 bg-slate-950/80">
                    `;

                    reports.forEach(r => {
                        const scoreDisplay = r.instructor_score !== null && r.instructor_score !== '' 
                            ? `<span class="px-2 py-0.5 rounded bg-cyan-500/20 text-cyan-300 font-bold font-mono">${parseFloat(r.instructor_score).toFixed(1)} / 10</span>`
                            : `<span class="px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 text-[11px]">รอตรวจ</span>`;

                        html += `
                            <tr class="hover:bg-slate-900/40">
                                <td class="px-3 py-2 font-medium text-white">
                                    <span class="font-mono text-cyan-300 font-bold mr-1.5">Lab ${r.lab_number || '?'}:</span>
                                    <span>${r.lab_title_th || r.lab_id}</span>
                                </td>
                                <td class="px-3 py-2 text-center font-mono font-bold text-emerald-400">
                                    ${parseFloat(r.accuracy_score || 0).toFixed(1)}%
                                </td>
                                <td class="px-3 py-2 text-center">
                                    ${scoreDisplay}
                                </td>
                                <td class="px-3 py-2 text-slate-300 italic text-[11px]">
                                    ${r.instructor_feedback || '-'}
                                </td>
                                <td class="px-3 py-2 text-slate-500 font-mono text-[11px]">
                                    ${(r.submitted_at || '').substring(0, 16)}
                                </td>
                            </tr>
                        `;
                    });

                    html += `</tbody></table></div>`;
                }

                resBox.innerHTML = html;

            } catch (err) {
                resBox.innerHTML = `
                    <div class="p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-300 text-xs">
                        เกิดข้อผิดพลาดในการดึงข้อมูล: ${err.message}
                    </div>
                `;
            }
        }
    </script>
    <!-- 🔬 น้อง i-MicroB AI Bot Assistor (Microbiology Biophysics Assistant) -->
    <?php include '03_physics4microbio2026/includes/imicrob_chatbot.php'; ?>
</body>
</html>
