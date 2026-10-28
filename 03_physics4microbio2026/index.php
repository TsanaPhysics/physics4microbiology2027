<?php 
$pageTitle = 'Physics for Microbiology 2026/2027';
$basePath = './';
// Detect current language from preference
$currentLang = $_GET['lang'] ?? $_COOKIE['pref_lang'] ?? 'th';
include 'includes/header.php'; 

// 12 Theory Chapters Master Catalog (Aligned with main.tex Single Source of Truth)
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
];
?>

<!-- ─── HERO SECTION ──────────────────────────────────────────────────────── -->
<section class="relative min-h-[85vh] flex items-center pt-24 pb-16 overflow-hidden">
    <!-- Ambient Accents -->
    <div class="absolute top-0 left-0 w-full h-full -z-10 bg-slate-950">
        <div class="absolute top-[-10%] right-[-10%] w-[550px] h-[550px] bg-orange-600/15 rounded-full blur-[130px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[550px] h-[550px] bg-cyan-600/10 rounded-full blur-[130px]"></div>
    </div>

    <!-- Animated Particle Canvas Container -->
    <div id="particle-canvas" class="absolute inset-0 -z-5 opacity-30"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-12 items-center">
        <!-- Left: Course Description -->
        <div class="lg:col-span-7 animate-fade-in" style="animation-delay: 0.2s">
            <div class="inline-flex flex-wrap items-center gap-2 mb-6">
                <span class="px-3.5 py-1 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-400 text-xs font-bold tracking-widest uppercase font-mono">
                    <i class="fas fa-sparkles mr-1"></i> OBE Curriculum 2026/2027
                </span>
                <span class="px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-300 text-xs font-mono font-bold">
                    <i class="fas fa-cube mr-1"></i> Three.js r128 3D
                </span>
                <span class="px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-300 text-xs font-mono font-bold">
                    <i class="fas fa-camera mr-1"></i> 3D WebAR ArUco
                </span>
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 text-white tracking-tight">
                <span class="lang-block" lang="th">ฟิสิกส์สำหรับ<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-300 to-cyan-400">จุลชีววิทยา 2026/2027</span></span>
                <span class="lang-block" lang="en">Physics for<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-300 to-cyan-400">Microbiology 2027</span></span>
                <span class="lang-block" lang="zh">物理学<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-300 to-cyan-400">微生物学 2027</span></span>
            </h1>

            <p class="text-base text-slate-300 mb-8 max-w-xl leading-relaxed">
                <span class="lang-block" lang="th">
                    สารบัญบทเรียนทฤษฎีชีวฟิสิกส์ <strong>12 บทเรียน + 1 โครงงานบูรณาการ</strong> ตามแนวคิด <strong class="text-amber-300">Low-Math / High-Intuition</strong> ยึดโยง 1 บทเรียนต่อ 1 เครื่องมือแล็บจริง เชื่อมโยงสู่โปรแกรมจำลอง 3D เสมือนจริง และระบบส่องกล้อง 3D WebAR บนสมาร์ทโฟน
                </span>
                <span class="lang-block" lang="en">
                    Core 12 Chapters + 1 Capstone Project under the Low-Math, High-Intuition Pedagogy. Anchored with genuine microbiology instruments, 3D simulations, and smartphone WebAR.
                </span>
            </p>
            
            <div class="flex flex-wrap gap-3">
                <a href="#modules" class="px-6 py-3.5 bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-slate-950 rounded-2xl font-bold shadow-lg shadow-orange-950/40 hover:scale-105 transition-all flex items-center space-x-2 text-sm">
                    <i class="fas fa-book-open"></i>
                    <span class="lang-block" lang="th">สำรวจสารบัญ 13 บทเรียน</span>
                    <span class="lang-block" lang="en">Explore 13 Chapters</span>
                </a>
                <a href="../virtual_lab/index.html" target="_blank" class="px-6 py-3.5 bg-slate-900 border border-white/10 hover:border-cyan-400 text-white rounded-2xl font-bold hover:bg-slate-800 transition-all flex items-center space-x-2 text-sm">
                    <i class="fas fa-flask text-cyan-400"></i>
                    <span>Virtual Lab Hub</span>
                </a>
                <a href="../index.php" class="px-5 py-3.5 bg-slate-900/80 border border-white/10 hover:border-white/20 text-slate-300 hover:text-white rounded-2xl font-semibold transition-all flex items-center space-x-2 text-sm">
                    <i class="fas fa-arrow-left"></i>
                    <span>หน้าพอร์ทัลหลัก</span>
                </a>
            </div>
        </div>

        <!-- Right: Animated Slideshow & Stats Card -->
        <div class="lg:col-span-5 relative flex items-center justify-center animate-fade-in" style="animation-delay: 0.4s">
            <div class="w-full max-w-md relative">
                <div class="glass-card rounded-3xl p-3 border border-white/10 shadow-2xl relative overflow-hidden group">
                    <div class="aspect-[4/3.4] rounded-2xl overflow-hidden relative bg-slate-900">
                        <img id="hero-slideshow" src="images/ch01.png" alt="Physics Visual"
                             class="w-full h-full object-cover animate-float transition-opacity duration-500"
                             onerror="this.src='../cover_ar_physics4microbio2027.jpg'">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent pointer-events-none"></div>

                        <div class="absolute top-3 left-3 px-3 py-1 rounded-full bg-slate-950/80 backdrop-blur-md border border-orange-500/30 text-orange-400 text-xs font-mono font-bold">
                            ✨ Bio-Physics 3D Courseware
                        </div>

                        <div class="absolute bottom-3 left-3 right-3 p-3 rounded-xl bg-slate-950/90 backdrop-blur-md border border-white/10 flex items-center justify-between">
                            <div>
                                <div class="text-xs font-bold text-white">ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา</div>
                                <div class="text-[10px] text-slate-400">สาขาวิชาฟิสิกส์ คณะวิทย์ มรภ.รำไพพรรณี</div>
                            </div>
                            <span class="px-2.5 py-1 rounded-lg bg-orange-500/20 text-orange-300 font-mono font-bold text-xs">
                                12 Labs
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── MODULE GRID SECTION ────────────────────────────────────────────────── -->
<section id="modules" class="py-20 bg-slate-950/60 border-t border-slate-900">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-slate-800 pb-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-400 text-xs font-bold font-mono uppercase mb-2">
                    <i class="fas fa-list-check"></i> Standard Curriculum 2026/2027
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white">
                    <span class="lang-block" lang="th">สารบัญเนื้อหาบทเรียน 12 บท + โครงงานบูรณาการ</span>
                    <span class="lang-block" lang="en">Course Modules (Chapters 01 – 13)</span>
                </h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-1">
                    ทุกบทผสานทฤษฎี Low-Math, เครื่องมือจุลชีววิทยาจริง, 3D Simulator, และ WebAR ส่องกล้องสมาร์ทโฟน
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-2 text-xs font-mono font-bold">
                <span class="px-3 py-1.5 rounded-xl bg-orange-500/10 border border-orange-500/20 text-orange-400">12 CHAPTERS</span>
                <span class="px-3 py-1.5 rounded-xl bg-cyan-500/10 border border-cyan-500/20 text-cyan-400">12 3D SIMS</span>
                <span class="px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400">12 AR MARKERS</span>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($modules as $mod): ?>
            <div class="group relative bg-slate-900/80 rounded-3xl border border-white/5 overflow-hidden hover:border-orange-500/40 transition-all hover:shadow-2xl hover:shadow-orange-950/20 flex flex-col justify-between">
                <div>
                    <!-- Cover Visual -->
                    <div class="aspect-video overflow-hidden relative bg-slate-950">
                        <img src="images/ch<?php echo $mod['num']; ?>/cover.png" alt="Chapter <?php echo $mod['num']; ?>"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             onerror="this.src='../images/ch<?php echo $mod['num']; ?>.png'">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                        
                        <!-- Badges -->
                        <div class="absolute top-3 left-3 px-3 py-1 rounded-xl bg-slate-950/90 backdrop-blur-md border border-white/10 font-mono font-bold text-xs text-orange-400">
                            CHAPTER <?php echo $mod['num']; ?>
                        </div>
                        <?php if ($mod['aruco_id'] !== 'Hub'): ?>
                        <div class="absolute top-3 right-3 px-2.5 py-0.5 rounded-lg bg-emerald-500/20 backdrop-blur-md border border-emerald-500/30 font-mono font-bold text-[10px] text-emerald-300 flex items-center gap-1">
                            <i class="fas fa-camera text-[9px]"></i> ArUco ID <?php echo $mod['aruco_id']; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content Details -->
                    <div class="p-6 space-y-3">
                        <!-- Microbiology Anchor Tag -->
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-orange-500/10 border border-orange-500/20 text-orange-300 text-[11px] font-mono font-semibold">
                            <i class="fas fa-crosshairs text-[10px]"></i>
                            <span><?php echo htmlspecialchars($mod['anchor']); ?></span>
                        </div>

                        <!-- Titles -->
                        <h3 class="text-lg font-bold text-white group-hover:text-orange-400 transition-colors leading-snug">
                            <span class="lang-block" lang="th"><?php echo $mod['title_th']; ?></span>
                            <span class="lang-block" lang="en"><?php echo $mod['title_en']; ?></span>
                            <span class="lang-block" lang="zh"><?php echo $mod['title_zh']; ?></span>
                        </h3>

                        <!-- Summary -->
                        <p class="text-xs text-slate-400 leading-relaxed">
                            <?php echo htmlspecialchars($mod['summary']); ?>
                        </p>
                    </div>
                </div>

                <!-- 3 Action Buttons -->
                <div class="p-6 pt-0 space-y-2 border-t border-white/5 mt-4">
                    <a href="<?php echo $mod['ch_file']; ?>"
                       class="w-full py-2.5 bg-gradient-to-r from-orange-600 to-amber-600 hover:from-orange-500 hover:to-amber-500 text-white rounded-xl text-center text-xs font-bold transition-all flex items-center justify-center gap-2 shadow-md">
                        <i class="fas fa-book-open text-xs"></i>
                        <span class="lang-block" lang="th">อ่านเนื้อหาบทเรียน</span>
                        <span class="lang-block" lang="en">Read Lesson</span>
                    </a>

                    <div class="grid grid-cols-2 gap-2 text-[11px] font-mono font-bold">
                        <a href="<?php echo $mod['sim_file']; ?>" target="_blank"
                           class="py-2 px-2.5 rounded-lg bg-slate-800 hover:bg-cyan-500/20 text-cyan-300 hover:text-cyan-200 border border-cyan-500/20 hover:border-cyan-400 flex items-center justify-center gap-1.5 transition">
                            <i class="fas fa-cube text-[10px]"></i>
                            <span>3D Simulator</span>
                        </a>

                        <a href="<?php echo $mod['lab_file']; ?>"
                           class="py-2 px-2.5 rounded-lg bg-slate-800 hover:bg-emerald-500/20 text-emerald-300 hover:text-emerald-200 border border-emerald-500/20 hover:border-emerald-400 flex items-center justify-center gap-1.5 transition">
                            <i class="fas fa-file-pen text-[10px]"></i>
                            <span>E-Report</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Particle Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('particle-canvas');
    if (container) {
        const canvas = document.createElement('canvas');
        container.appendChild(canvas);
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        function resize() {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        }
        window.addEventListener('resize', resize);
        resize();
        
        class Particle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - 0.5) * 0.3;
                this.vy = (Math.random() - 0.5) * 0.3;
                this.radius = Math.random() * 1.5;
                this.color = Math.random() > 0.5 ? '#f97316' : '#06b6d4';
            }
            update() {
                this.x += this.vx; this.y += this.vy;
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
            }
            draw() {
                ctx.beginPath(); ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color; ctx.fill();
            }
        }
        for (let i = 0; i < 40; i++) particles.push(new Particle());
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animate);
        }
        animate();
    }
});
</script>

<?php include 'includes/footer.php'; ?>
