<?php 
$pageTitle = 'Physics for Microbiology 2026/2027';
$basePath = './';
// Detect current language from preference
$currentLang = $_GET['lang'] ?? $_COOKIE['pref_lang'] ?? 'th';
include 'includes/header.php'; 

// 12 Chapters + 1 Capstone Master Catalog (Aligned with Master Plan 2026/2027)
$modules = [
    [
        'num' => '01',
        'icon' => 'fa-ruler-combined',
        'title_th' => 'ระบบหน่วยและการวัดระดับจุลภาค',
        'title_en' => 'Units & Microscale Measurements',
        'title_zh' => '单位系统与微观测量',
        'anchor' => 'P1000 Micropipette & Balance',
        'summary' => 'บันไดคำอุปสรรค x1000, การแปลงหน่วย Serial Dilution, ความหนาแน่นน้ำ 1.000 g/mL และการสอบเทียบปิเปต',
        'ch_file' => 'chapters/ch01_th.php',
        'sim_file' => 'simulations/sim_micropipette_3d.html',
        'lab_file' => 'labs/lab01_measurement.php',
        'aruco_id' => 0,
        'color' => '#f97316'
    ],
    [
        'num' => '02',
        'icon' => 'fa-arrows-split-up-and-left',
        'title_th' => 'เวกเตอร์และแรงในระบบชีวภาพ',
        'title_en' => 'Vectors & Biomechanical Forces',
        'title_zh' => '矢量与生物力学力',
        'anchor' => 'Chemotaxis vs Brownian Motion',
        'summary' => 'การรวมเวกเตอร์แรง, เปรียบเทียบการว่ายน้ำหาอาหาร Chemotaxis กับการชนแบบสุ่ม Brownian Motion',
        'ch_file' => 'chapters/ch02_th.php',
        'sim_file' => 'simulations/sim02_force_vectors_3d.html',
        'lab_file' => 'labs/lab02_vectors.php',
        'aruco_id' => 1,
        'color' => '#fbbf24'
    ],
    [
        'num' => '03',
        'icon' => 'fa-person-running',
        'title_th' => 'จลนศาสตร์และความหนืดของของไหล',
        'title_en' => 'Kinematics & Fluid Viscosity',
        'title_zh' => '流体运动学与粘度',
        'anchor' => 'Broth Viscosity & Stokes Sedimentation',
        'summary' => 'กฎของสโตกส์เชิงเปรียบเทียบ เซลล์ใหญ่ขึ้น 2 เท่า ตกเร็ว 4 เท่า และความหนืดของอาหารเลี้ยงเชื้อ',
        'ch_file' => 'chapters/ch03_th.php',
        'sim_file' => 'simulations/sim03_viscometer_3d.html',
        'lab_file' => 'labs/lab03_motion.php',
        'aruco_id' => 2,
        'color' => '#10b981'
    ],
    [
        'num' => '04',
        'icon' => 'fa-rotate',
        'title_th' => 'กฎของนิวตันและเครื่องปั่นเหวี่ยง',
        'title_en' => 'Newton Laws & Centrifugation',
        'title_zh' => '牛顿定律与离心技术',
        'anchor' => 'High-Speed Centrifuge RCF',
        'summary' => 'การแปลงรอบ RPM สู่แรงเหวี่ยง RCF (xg), กฎการอนุรักษ์โมเมนตัม และกฎเหล็ก Rotor Balancing',
        'ch_file' => 'chapters/ch04_th.php',
        'sim_file' => 'simulations/sim04_centrifuge_3d.html',
        'lab_file' => 'labs/lab04_newton.php',
        'aruco_id' => 3,
        'color' => '#3b82f6'
    ],
    [
        'num' => '05',
        'icon' => 'fa-bowling-ball',
        'title_th' => 'โมเมนตัม การดล และการชนในระดับเซลล์',
        'title_en' => 'Momentum & Cellular Collisions',
        'title_zh' => '动量与细胞微观碰撞',
        'anchor' => 'Vortex Mixer & Cell Lysis',
        'summary' => 'การอนุรักษ์โมเมนตัมระดับโมเลกุล การถ่ายทอดพลังงานจลน์สู่ผนังเซลล์ และการแตกสลายเซลล์',
        'ch_file' => 'chapters/ch05_th.php',
        'sim_file' => 'simulations/sim05_momentum_3d.html',
        'lab_file' => 'labs/lab05_momentum.php',
        'aruco_id' => 4,
        'color' => '#8b5cf6'
    ],
    [
        'num' => '06',
        'icon' => 'fa-scale-balanced',
        'title_th' => 'สมดุลกล ความดันของไหล และออสโมซิส',
        'title_en' => 'Equilibrium, Pressure & Osmosis',
        'title_zh' => '流体静力平衡与渗透压',
        'anchor' => 'Osmometer & Turgor Pressure',
        'summary' => 'สมดุลไฮโดรสแตติก ความดันออสโมติกแวนต์ฮอฟฟ์ สภาวะเซลล์เต่ง/เหี่ยว และแรงตึงผนังเซลล์',
        'ch_file' => 'chapters/ch06_th.php',
        'sim_file' => 'simulations/sim06_osmosis_3d.html',
        'lab_file' => 'labs/lab06_equilibrium.php',
        'aruco_id' => 5,
        'color' => '#ec4899'
    ],
    [
        'num' => '07',
        'icon' => 'fa-bolt',
        'title_th' => 'งาน พลังงาน และมอเตอร์โมเลกุลชีวภาพ',
        'title_en' => 'Work, Energy & ATP Synthase',
        'title_zh' => '功、能量与ATP合成酶分子马达',
        'anchor' => 'F0F1 ATP Synthase Rotary Engine',
        'summary' => 'พลังขับเคลื่อนโปรตอน (PMF), การเปลี่ยนรูปพลังงานไฟฟ้าเคมีสู่พลังงานกลหมุนสร้างโมเลกุล ATP',
        'ch_file' => 'chapters/ch07_th.php',
        'sim_file' => 'simulations/sim07_molecular_motors_3d.html',
        'lab_file' => 'labs/lab07_energy.php',
        'aruco_id' => 6,
        'color' => '#f43f5e'
    ],
    [
        'num' => '08',
        'icon' => 'fa-gears',
        'title_th' => 'การหมุนและกลศาสตร์นาโนของแส้เซลล์',
        'title_en' => 'Rotational Dynamics & Flagella',
        'title_zh' => '旋转力学与细菌鞭毛纳米机械',
        'anchor' => 'Bacterial Flagellar Motor (300 Hz)',
        'summary' => 'ทอร์ก โมเมนต์ความเฉื่อย กำลังกลศาสตร์นาโนของการหมุนแส้แฟลกเจลลาขับเคลื่อนเซลล์แบคทีเรีย',
        'ch_file' => 'chapters/ch08_th.php',
        'sim_file' => 'simulations/sim08_nanomechanics_3d.html',
        'lab_file' => 'labs/lab08_machines.php',
        'aruco_id' => 7,
        'color' => '#06b6d4'
    ],
    [
        'num' => '09',
        'icon' => 'fa-fire-flame-curved',
        'title_th' => 'อุณหพลศาสตร์และหม้อนึ่ง Autoclave / PCR',
        'title_en' => 'Thermodynamics & Autoclave / PCR',
        'title_zh' => '热力学、高压灭菌器与PCR仪',
        'anchor' => 'Autoclave 121°C & PCR Cycler',
        'summary' => 'ความร้อนแฝง 2260 J/g ไอน้ำอิ่มตัวฆ่าสปอร์ที่ 121°C 15 psi และ 3 ขั้นตอนวัฏจักรความร้อน PCR',
        'ch_file' => 'chapters/ch09_th.php',
        'sim_file' => 'simulations/sim09_pcr_thermal_3d.html',
        'lab_file' => 'labs/lab09_heat.php',
        'aruco_id' => 8,
        'color' => '#f97316'
    ],
    [
        'num' => '10',
        'icon' => 'fa-bolt-lightning',
        'title_th' => 'ไฟฟ้าและเจลอิเล็กโทรโฟเรซิส',
        'title_en' => 'Electricity & Gel Electrophoresis',
        'title_zh' => '电学与凝胶电泳技术',
        'anchor' => 'Agarose Gel Tank & UV Box',
        'summary' => 'สามเหลี่ยมกฎของโอห์ม V=IR, ประจุลบฟอสเฟตบน DNA วิ่งหาขั้วบวก และแบคทีเรียแม่เหล็ก',
        'ch_file' => 'chapters/ch10_th.php',
        'sim_file' => 'simulations/sim10_electrophoresis_3d.html',
        'lab_file' => 'labs/lab10_electricity.php',
        'aruco_id' => 9,
        'color' => '#eab308'
    ],
    [
        'num' => '11',
        'icon' => 'fa-microscope',
        'title_th' => 'ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรี',
        'title_en' => 'Optics, Microscopy & Spectroscopy',
        'title_zh' => '光学、显微技术与生物分光光度法',
        'anchor' => '100x Oil Immersion & OD600',
        'summary' => 'ขีดจำกัดแอบบี, น้ำมันแช่เลนส์ n=1.518, กฎเบียร์-แลมเบิร์ตวัดความขุ่น OD600 และโปรตีน',
        'ch_file' => 'chapters/ch11_th.php',
        'sim_file' => 'simulations/sim11_optics_3d.html',
        'lab_file' => 'labs/lab11_optics.php',
        'aruco_id' => 10,
        'color' => '#6366f1'
    ],
    [
        'num' => '12',
        'icon' => 'fa-radiation',
        'title_th' => 'ฟิสิกส์นิวเคลียร์และการทำลายเชื้อจุลินทรีย์',
        'title_en' => 'Nuclear Physics & Radiosterilization',
        'title_zh' => '核物理与微生物辐射灭菌',
        'anchor' => 'Co-60 Gamma Chamber & D10-value',
        'summary' => 'การนับรอบครึ่งชีวิต, กฎกำลังสองผกผัน, ค่ารังสีลดเชื้อ 90% (D10) และความหนาครึ่งค่าของตะกั่ว',
        'ch_file' => 'chapters/ch12_th.php',
        'sim_file' => 'simulations/sim12_radioactivity_3d.html',
        'lab_file' => 'labs/lab12_radioactivity.php',
        'aruco_id' => 11,
        'color' => '#ef4444'
    ],
    [
        'num' => '13',
        'icon' => 'fa-cubes-stacked',
        'title_th' => 'โครงงานบูรณาการชีวฟิสิกส์และการเกษตรอัจฉริยะ',
        'title_en' => 'Capstone Mini-Project: Smart Bio-AI',
        'title_zh' => '生物物理综合项目与智能农业',
        'anchor' => 'AIoT Sensors & Biosystems',
        'summary' => 'การบูรณาการหลักฟิสิกส์ 8 หมวด สู่นวัตกรรมเครื่องมือแพทย์ เซนเซอร์ชีวภาพ และการเกษตรแม่นยำ',
        'ch_file' => 'chapters/ch13_th.php',
        'sim_file' => '../virtual_lab/index.html',
        'lab_file' => '../virtual_lab/index.html',
        'aruco_id' => 'Hub',
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
