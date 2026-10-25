<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดและเลขนัยสำคัญ | Lab 1: Measurement | 实验1：测量与有效数字';
$basePath = '../';
include '../includes/header.php';
?>

<!-- Three.js & Controls -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 space-y-6">

    <!-- Hero Header (Integrated Glassmorphism, No Overlap) -->
    <div class="bg-gradient-to-r from-slate-900 via-emerald-950/40 to-slate-900 border border-emerald-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden backdrop-blur-xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono uppercase tracking-wider mb-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_#10b981] animate-ping"></span>
                    🧪 ปฏิบัติการที่ 1 • Lab 01 • RBRU SciExHub 2026/2027
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-normal leading-tight">
                    การวัดและเลขนัยสำคัญ (Measurement &amp; Significant Figures)
                </h1>
                <div class="flex flex-wrap gap-2 mt-3 text-xs">
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-emerald-300 border border-emerald-500/30">
                        🇹🇭 การวัดความยาว เครื่องมือความแม่นยำสูง และขนาดโคโลนีจุลินทรีย์
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-sky-300 border border-sky-500/30">
                        🇬🇧 Precision Metrology, Vernier Mechanics &amp; Colony Sizing
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-amber-300 border border-amber-500/30">
                        🇨🇳 精密测量、游标卡尺原理与菌落大小测定
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="../../virtual_lab/index.html?lab=1" target="_blank" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 text-slate-950 font-bold text-xs flex items-center gap-2 shadow-lg shadow-emerald-950/50 transition transform active:scale-95">
                    <i class="fa-solid fa-flask"></i> เข้าสู่ห้องแล็บ 3D เต็มรูปแบบ (13 Labs)
                </a>
                <a href="../simulations/sim01_unit_converter.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 border border-white/10 font-bold text-xs flex items-center gap-2 transition">
                    <i class="fa-solid fa-ruler-combined text-sky-400"></i> สเกลจำลอง 3D
                </a>
            </div>
        </div>
    </div>

    <!-- 3D Virtual Bench & Multi-Mode Laboratory Suite Card -->
    <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
            <div>
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-atom text-emerald-400 text-xl"></i>
                    โต๊ะปฏิบัติการเสมือนจริง 3 มิติ (3D Virtual Bench &amp; Telemetry)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    จำลองเครื่องมือวัดจริง (เวอร์เนียร์คาลิเปอร์สเตนเลสสตีล PBR, จานเพาะเชื้อแก้วโบโรซิลิเกต) รองรับการส่องตำรา WebAR และสไลเดอร์ปรับค่าแบบเรียลไทม์
                </p>
            </div>
            <!-- Mode Switcher Buttons -->
            <div class="flex flex-wrap items-center gap-2 bg-slate-950/90 p-1.5 rounded-2xl border border-white/10">
                <button id="benchMode3d" onclick="switchBenchMode('3d')" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-1.5">
                    <i class="fa-solid fa-cube"></i> โหมด 1: 3D สำรวจ 360°
                </button>
                <button id="benchModeAr" onclick="switchBenchMode('ar')" class="px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5">
                    <i class="fa-solid fa-camera"></i> โหมด 2: WebAR ส่องหน้าตำรา
                </button>
                <button id="benchModeSim" onclick="switchBenchMode('sim')" class="px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5">
                    <i class="fa-solid fa-sliders"></i> โหมด 3: สไลเดอร์จำลองค่าวัด
                </button>
                <button onclick="resetBenchCamera()" class="px-2.5 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs border border-white/10 transition" title="รีเซ็ตมุมมอง">
                    <i class="fa-solid fa-rotate-left"></i>
                </button>
            </div>
        </div>

        <!-- 3D Scene Viewport (Unobstructed View) -->
        <div id="bench3dWrapper" class="relative w-full h-[360px] bg-slate-950 rounded-2xl overflow-hidden border border-white/10 shadow-inner">
            <div id="instrument-3d-canvas" class="w-full h-full"></div>

            <!-- AR Camera Stream Video -->
            <video id="benchArVideo" autoplay playsinline webkit-playsinline muted class="absolute inset-0 w-full h-full object-cover hidden z-0"></video>

            <!-- AR Reticle Overlay -->
            <div id="benchArReticle" class="absolute inset-0 pointer-events-none hidden flex-col items-center justify-center z-10">
                <div class="relative w-64 h-64 border-2 border-emerald-400 rounded-3xl shadow-[0_0_30px_rgba(16,185,129,0.5)]">
                    <div class="absolute inset-x-0 h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent animate-bounce"></div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-slate-950 px-3 py-0.5 rounded-full text-[10px] font-mono text-emerald-400 border border-emerald-400/50">
                        OPTICAL TARGET SCANNER
                    </div>
                </div>
                <p class="text-xs text-emerald-300 font-mono mt-4 bg-slate-950/90 px-4 py-1.5 rounded-full border border-emerald-500/30">
                    ส่องกล้องไปยังรูปที่ L1.1 ในตำราเรียนเพื่อจำลองเวอร์เนียร์คาลิเปอร์ 3 มิติ
                </p>
            </div>

            <!-- Viewport Info Pill -->
            <div class="absolute top-3 left-3 bg-slate-950/85 backdrop-blur-md px-3 py-1.5 rounded-xl border border-white/10 text-xs pointer-events-none">
                <div class="text-sky-300 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-compass text-emerald-400"></i> PBR Vernier Caliper &amp; Petri Dish
                </div>
                <div class="text-slate-400 text-[10px]">ความละเอียดสเกล: 0.05 mm • หมุน 360°</div>
            </div>
        </div>

        <!-- Dedicated Precision Control Card (Positioned Cleanly Below 3D Viewport) -->
        <div id="caliperSimOverlay" class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/30 space-y-4">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-white/5 pb-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-emerald-400 font-mono">🎯 เลือกวัตถุทดสอบมาตรฐาน:</span>
                    <button onclick="setSpecimen(90.00, 'จานเพาะเชื้อ (Petri Dish)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">จานเพาะเชื้อ (90.00 mm)</button>
                    <button onclick="setSpecimen(2.45, 'โคโลนีแบคทีเรีย (Colony)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">โคโลนี (2.45 mm)</button>
                    <button onclick="setSpecimen(12.50, 'คิวเวตต์วัดความขุ่น (Cuvette)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">คิวเวตต์ (12.50 mm)</button>
                </div>
                <div class="text-left sm:text-right">
                    <span class="text-[11px] text-slate-400">ค่าวัดสุทธิ (Total Measurement):</span>
                    <div id="liveReadingDisplay" class="text-xl font-mono font-bold text-sky-300">88.60 mm</div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex flex-col sm:flex-row justify-between text-xs font-mono text-slate-300 gap-1">
                    <span>เลื่อนปากวัดเวอร์เนียร์ (Slider):</span>
                    <span id="sliderFormula" class="text-emerald-400 font-bold">สเกลหลัก 88 mm + สเกลเวอร์เนียร์ (12 × 0.05 mm) = 88.60 mm</span>
                </div>
                <input type="range" id="caliperSlider" min="0" max="150" step="0.05" value="88.60" oninput="updateCaliperSlide(this.value)" class="w-full h-2.5 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-emerald-500">
                <div class="flex justify-between text-[10px] font-mono text-slate-500">
                    <span>0.00 mm (ปิดสนิท)</span>
                    <span>50.00 mm</span>
                    <span>100.00 mm</span>
                    <span>150.00 mm (เปิดสุด)</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Lab Content Body -->
    <div class="space-y-6">

        <!-- Objectives Card -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl">
            <h2 class="text-lg font-bold text-emerald-400 flex items-center gap-2 mb-4">
                🎯 <span class="lang-block" lang="th">วัตถุประสงค์การทดลอง</span>
                <span class="lang-block" lang="en">Laboratory Objectives</span>
                <span class="lang-block" lang="zh">实验目标</span>
            </h2>
            <ul class="space-y-2.5 text-sm text-slate-300">
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>ใช้เครื่องมือวัดความแม่นยำสูง (ไม้บรรทัด เวอร์เนียร์คาลิเปอร์ ไมโครมิเตอร์) ได้อย่างถูกต้องตามหลักวิศวกรรมฟิสิกส์</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>รายงานผลการวัดพร้อมเลขนัยสำคัญ (Significant Figures) ที่ถูกต้องตามมาตรฐานสากล IUPAC/ISO</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>คำนวณความคลาดเคลื่อนสัมบูรณ์ ความคลาดเคลื่อนสัมพัทธ์ และส่วนเบี่ยงเบนมาตรฐานของการวัดซ้ำได้</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>วัดและวิเคราะห์ขนาดโคโลนีจุลินทรีย์บนจานเพาะเชื้อด้วยสายตาและเครื่องมือวัดเสมือนจริง</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>วัดค่าความขุ่น (Turbidity: NTU) และประเมินคุณภาพน้ำทางชีวภาพและสิ่งแวดล้อม</span>
                </li>
            </ul>
        </div>

        <!-- Theory & Gaussian Uncertainty Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-lg font-bold text-sky-400 flex items-center gap-2">
                📖 <span class="lang-block" lang="th">ทฤษฎีที่เกี่ยวข้อง</span>
                <span class="lang-block" lang="en">Relevant Theory</span>
                <span class="lang-block" lang="zh">相关理论</span>
            </h2>

            <p class="text-sm text-slate-300 leading-relaxed text-justify">
                การวัดทางวิทยาศาสตร์เป็นรากฐานของการวิเคราะห์เชิงปริมาณ ในจุลชีววิทยา ความเที่ยงตรง (Precision) และความแม่นยำ (Accuracy) ของการวัดขนาดเซลล์ โคโลนี และปริมาตรสาร มีผลโดยตรงต่อการแปลผลชีวเคมี ในขณะที่งานด้านสิ่งแวดล้อม การวัดค่าความขุ่น (Turbidity) ด้วยหลักการกระเจิงแสง Nephelometry ต้องคำนึงถึงขีดจำกัดความคลาดเคลื่อนของเครื่องมือเสมอ
            </p>

            <!-- Gaussian Uncertainty Chart (Vector SVG with Verified XML Namespace) -->
            <div class="p-5 rounded-2xl bg-slate-950/90 border border-emerald-500/30 space-y-3">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-chart-area text-emerald-400 text-lg"></i>
                    <h3 class="text-sm font-bold text-white">ฟังก์ชันการแจกแจงความน่าจะเป็นของความคลาดเคลื่อน (Gaussian Uncertainty Distribution)</h3>
                </div>
                <div class="rounded-xl overflow-hidden border border-white/10 bg-slate-950 p-2">
                    <img src="../images/ch01/gaussian_uncertainty_chart.svg" alt="Gaussian Uncertainty Distribution Curve" class="w-full h-auto rounded-lg">
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    รูปแสดงฟังก์ชันความหนาแน่นความน่าจะเป็นแบบเกาส์เซียนของการวัดซ้ำจานเพาะเชื้อ ($\mu = 9.00\text{ cm}, \sigma = 0.04\text{ cm}$) ครอบคลุมช่วงความเชื่อมั่น $\pm 1\sigma$ ($68.3\%$) และ $\pm 2\sigma$ ($95.4\%$)
                </p>
            </div>

            <!-- Dual-Track Cards (Microbiology vs Environmental) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-5 rounded-2xl bg-slate-950/70 border border-purple-500/30 space-y-2">
                    <div class="text-xs font-bold text-purple-300 flex items-center gap-2">
                        🔬 เกณฑ์เลขนัยสำคัญ (Significant Figures)
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-300">
                        <li>• <code class="text-sky-300">0.0025 mm</code> → <strong>2</strong> ตัวเลขนัยสำคัญ (ศูนย์หน้าไม่นับ)</li>
                        <li>• <code class="text-sky-300">1.0050 cm</code> → <strong>5</strong> ตัวเลขนัยสำคัญ (ศูนย์กลางและหลังจุดนับทั้งหมด)</li>
                        <li>• การคูณ/หาร: ยึดจำนวนเลขนัยสำคัญของตัวเลขที่น้อยที่สุด</li>
                    </ul>
                </div>
                <div class="p-5 rounded-2xl bg-slate-950/70 border border-teal-500/30 space-y-2">
                    <div class="text-xs font-bold text-teal-300 flex items-center gap-2">
                        🌍 มาตรฐานความขุ่น (Turbidity - NTU)
                    </div>
                    <ul class="text-xs space-y-1.5 text-slate-300">
                        <li>• <strong>น้ำดื่มบริสุทธิ์:</strong> &lt; 4 NTU (มาตรฐานองค์การอนามัยโลก WHO)</li>
                        <li>• <strong>น้ำผิวดิน/แหล่งน้ำธรรมชาติ:</strong> &lt; 50 NTU</li>
                        <li>• <strong>น้ำเสียชุมชน/อุตสาหกรรม:</strong> อาจสูงเกิน 500 NTU ต้องบำบัดก่อนปล่อย</li>
                    </ul>
                </div>
            </div>

            <!-- Error Formulas (2-Column Responsive Cards, Zero Horizontal Overflow) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-emerald-500/30 text-center space-y-1">
                    <div class="text-xs text-slate-400 font-mono">ความคลาดเคลื่อนสัมบูรณ์ (Absolute Error)</div>
                    <div class="text-sm font-mono text-emerald-400 font-bold overflow-x-auto py-1">
                        $$\text{Absolute Error} = |x_{\text{measured}} - x_{\text{true}}|$$
                    </div>
                </div>
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-sky-500/30 text-center space-y-1">
                    <div class="text-xs text-slate-400 font-mono">ความคลาดเคลื่อนร้อยละ (% Relative Error)</div>
                    <div class="text-sm font-mono text-sky-400 font-bold overflow-x-auto py-1">
                        $$\text{\%Error} = \left(\frac{|x_{\text{measured}} - x_{\text{true}}|}{x_{\text{true}}}\right) \times 100\%$$
                    </div>
                </div>
            </div>
        </div>

        <!-- Materials Grid -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl">
            <h2 class="text-lg font-bold text-amber-400 flex items-center gap-2 mb-4">
                🔧 <span class="lang-block" lang="th">วัสดุและอุปกรณ์</span>
                <span class="lang-block" lang="en">Materials &amp; Equipment</span>
                <span class="lang-block" lang="zh">材料与仪器</span>
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">📏</span> ไม้บรรทัดเหล็ก 30 cm
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🔧</span> เวอร์เนียร์คาลิเปอร์ (0.05 mm)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">⚙️</span> ไมโครมิเตอร์ (0.01 mm)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🧫</span> จานเพาะเชื้อพร้อมโคโลนี
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🔬</span> กล้องจุลทรรศน์สเตอริโอ
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">⚖️</span> เครื่องชั่งดิจิทัลทศนิยม 4 ตำแหน่ง
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🧪</span> กระบอกตวงแก้ว 100 mL
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">💧</span> Turbidimeter วัดความขุ่น
                </div>
            </div>
        </div>

        <!-- Procedure Section (Independent Steps, Clean Spacing, Zero Badge Collisions) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-lg font-bold text-emerald-400 flex items-center gap-2">
                📋 <span class="lang-block" lang="th">วิธีทำการทดลอง</span>
                <span class="lang-block" lang="en">Procedure</span>
                <span class="lang-block" lang="zh">实验步骤</span>
            </h2>

            <h3 class="text-sm font-bold text-white border-b border-white/10 pb-2">
                ตอนที่ 1: การวัดความยาวด้วยเครื่องมือความแม่นยำสูง
            </h3>

            <!-- Caliper Reading Guide Diagram -->
            <div class="p-3 rounded-2xl bg-slate-950 border border-white/10">
                <img src="../images/ch01/vernier_caliper.png" alt="Vernier Caliper Reading Guide" class="w-full h-auto rounded-xl">
                <p class="text-xs text-slate-400 mt-2 text-center">
                    รูปที่ L1.1 แผนผังการอ่านค่าเวอร์เนียร์คาลิเปอร์: สเกลหลัก (88 mm) + สเกลเวอร์เนียร์ตรงกันขีดที่ 12 ($12 \times 0.05 = 0.60\text{ mm}$) ได้ค่าวัดสุทธิ 88.60 mm
                </p>
            </div>

            <!-- Part 1 Steps -->
            <div class="space-y-4 pt-2">
                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-emerald-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 1
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        เลือกวัตถุตัวอย่าง 3 ชนิด ได้แก่ หลอดทดลองแก้ว, จานเพาะเชื้อพลาสติก, และสไลด์แก้วสำหรับส่องกล้องจุลทรรศน์
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-emerald-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 2
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        วัดความยาวและเส้นผ่านศูนย์กลางด้วยไม้บรรทัดเหล็ก, เวอร์เนียร์คาลิเปอร์, และไมโครมิเตอร์ ทำซ้ำชนิดละ 3 ครั้งเพื่อหาค่าเฉลี่ย
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-emerald-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 3
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        คำนวณค่าเฉลี่ย ($\bar{x}$), ส่วนเบี่ยงเบนมาตรฐาน ($s$), และรายงานผลพร้อมเลขนัยสำคัญตามความละเอียดของเครื่องมือวัด
                    </p>
                </div>
            </div>

            <h3 class="text-sm font-bold text-white border-b border-white/10 pb-2 pt-4">
                ตอนที่ 2: การวัดขนาดโคโลนีจุลินทรีย์และความขุ่นของน้ำ
            </h3>

            <!-- Part 2 Steps -->
            <div class="space-y-4 pt-2">
                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-sky-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-sky-500 to-blue-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 1
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        นำจานเพาะเชื้อที่มีโคโลนีเดี่ยวของแบคทีเรียมาวางใต้กล้องสเตอริโอ ใช้เวอร์เนียร์คาลิเปอร์วัดเส้นผ่านศูนย์กลางโคโลนีจำนวน 5 โคโลนี
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-sky-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-sky-500 to-blue-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 2
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        เติมตัวอย่างน้ำ (น้ำประปา, น้ำฝน, น้ำคลอง, น้ำเสียจำลอง) ลงในหลอดคิวเวตต์ เช็ดผิวด้านนอกให้แห้งสนิท ใส่ในช่องวัดของ Turbidimeter แล้วบันทึกค่า NTU
                    </p>
                </div>
            </div>
        </div>

        <!-- Data Tables Section (High Contrast Dark Glass Table) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-lg font-bold text-sky-400 flex items-center gap-2">
                📊 <span class="lang-block" lang="th">ตารางบันทึกผลการทดลอง</span>
                <span class="lang-block" lang="en">Data Tables</span>
                <span class="lang-block" lang="zh">实验数据记录表</span>
            </h2>

            <div class="space-y-3">
                <h3 class="text-xs font-bold text-slate-300">ตารางที่ 1.1: ผลการวัดมิติจานเพาะเชื้อด้วยเครื่องมือ 3 ชนิด</h3>
                <div class="overflow-x-auto rounded-2xl border border-white/10">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-sky-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3">เครื่องมือวัด</th>
                                <th class="p-3">ความละเอียด</th>
                                <th class="p-3">ครั้งที่ 1 (mm)</th>
                                <th class="p-3">ครั้งที่ 2 (mm)</th>
                                <th class="p-3">ครั้งที่ 3 (mm)</th>
                                <th class="p-3">ค่าเฉลี่ย $\bar{x}$ (mm)</th>
                                <th class="p-3">เลขนัยสำคัญ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300">
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">ไม้บรรทัดพลาสติก</td>
                                <td class="p-3">1.0 mm</td>
                                <td class="p-3 font-mono text-emerald-400">90.0</td>
                                <td class="p-3 font-mono text-emerald-400">89.5</td>
                                <td class="p-3 font-mono text-emerald-400">90.5</td>
                                <td class="p-3 font-mono font-bold text-white">90.0</td>
                                <td class="p-3 font-mono font-bold text-sky-400">3 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">เวอร์เนียร์คาลิเปอร์</td>
                                <td class="p-3">0.05 mm</td>
                                <td class="p-3 font-mono text-emerald-400">90.15</td>
                                <td class="p-3 font-mono text-emerald-400">90.10</td>
                                <td class="p-3 font-mono text-emerald-400">90.20</td>
                                <td class="p-3 font-mono font-bold text-white">90.15</td>
                                <td class="p-3 font-mono font-bold text-sky-400">4 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">ไมโครมิเตอร์</td>
                                <td class="p-3">0.01 mm</td>
                                <td class="p-3 font-mono text-emerald-400">90.14</td>
                                <td class="p-3 font-mono text-emerald-400">90.16</td>
                                <td class="p-3 font-mono text-emerald-400">90.15</td>
                                <td class="p-3 font-mono font-bold text-white">90.15</td>
                                <td class="p-3 font-mono font-bold text-sky-400">4 ตัว</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <h3 class="text-xs font-bold text-slate-300">ตารางที่ 1.2: การวัดความขุ่นของตัวอย่างน้ำ (Turbidity Assessment)</h3>
                <div class="overflow-x-auto rounded-2xl border border-white/10">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3">ตัวอย่างน้ำ</th>
                                <th class="p-3">NTU (1)</th>
                                <th class="p-3">NTU (2)</th>
                                <th class="p-3">NTU (3)</th>
                                <th class="p-3">ค่าเฉลี่ย NTU</th>
                                <th class="p-3">เกณฑ์มาตรฐาน WHO (&lt;4 NTU)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300">
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">น้ำประปาห้องปฏิบัติการ</td>
                                <td class="p-3 font-mono text-emerald-400">0.85</td>
                                <td class="p-3 font-mono text-emerald-400">0.90</td>
                                <td class="p-3 font-mono text-emerald-400">0.88</td>
                                <td class="p-3 font-mono font-bold text-white">0.88</td>
                                <td class="p-3 text-emerald-400 font-bold">✓ ผ่านมาตรฐาน</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">น้ำฝนธรรมชาติ</td>
                                <td class="p-3 font-mono text-emerald-400">2.10</td>
                                <td class="p-3 font-mono text-emerald-400">2.25</td>
                                <td class="p-3 font-mono text-emerald-400">2.15</td>
                                <td class="p-3 font-mono font-bold text-white">2.17</td>
                                <td class="p-3 text-emerald-400 font-bold">✓ ผ่านมาตรฐาน</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">น้ำคลองรอบมหาวิทยาลัย</td>
                                <td class="p-3 font-mono text-amber-400">38.4</td>
                                <td class="p-3 font-mono text-amber-400">41.2</td>
                                <td class="p-3 font-mono text-amber-400">39.8</td>
                                <td class="p-3 font-mono font-bold text-white">39.8</td>
                                <td class="p-3 text-amber-400 font-bold">✗ ต้องผ่านการกรอง</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium">น้ำเสียจุลินทรีย์จำลอง</td>
                                <td class="p-3 font-mono text-rose-400">420.0</td>
                                <td class="p-3 font-mono text-rose-400">415.0</td>
                                <td class="p-3 font-mono text-rose-400">425.0</td>
                                <td class="p-3 font-mono font-bold text-white">420.0</td>
                                <td class="p-3 text-rose-400 font-bold">✗ สูงเกินมาตรฐาน</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Biosafety Precautions Card (Clean Red Glass, No Repeated Icons) -->
        <div class="p-6 rounded-3xl bg-rose-950/30 border border-rose-500/30 shadow-xl space-y-3">
            <h3 class="text-sm font-bold text-rose-400 flex items-center gap-2 m-0">
                ⚠️ ข้อควรระวังเพื่อความปลอดภัยทางชีวภาพ (Biosafety Precautions)
            </h3>
            <ul class="space-y-2 text-xs text-rose-200/90 pl-1">
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>ห้ามเปิดฝาจานเพาะเชื้อจุลินทรีย์ในอากาศเปิด ให้วัดค่าผ่านฝาพลาสติกใสหรือทำการทดลองในตู้ Biosafety Cabinet ระดับ 2</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>หลีกเลี่ยงการบีบปากวัดของเวอร์เนียร์คาลิเปอร์แรงเกินไป เพราะอาจทำให้ขอบจานเพาะเชื้อแตกหักหรือชิ้นงานเสียรูป</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>สวมถุงมือยางไนไตรล์ทุกครั้งเมื่อสัมผัสตัวอย่างน้ำธรรมชาติและน้ำเสียจำลอง เพื่อป้องกันการปนเปื้อนของเชื้อก่อโรค</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>ล้างมือด้วยสบู่ฆ่าเชื้อและเช็ดแอลกอฮอล์ 70% ทำความสะอาดโต๊ะปฏิบัติการทันทีหลังเสร็จสิ้นการทดลอง</span>
                </li>
            </ul>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between items-center pt-2">
            <a href="../index.php" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold border border-white/10 transition flex items-center gap-2">
                ← กลับหน้าหลัก
            </a>
            <a href="lab02_vectors.php" class="px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 text-xs font-bold shadow-lg shadow-emerald-950/40 transition flex items-center gap-2">
                ไปปฏิบัติการที่ 2 →
            </a>
        </div>

    </div>
</div>

<script>
// ============================================================
// Blender-Grade 3D CAD Vernier Caliper Engine (Three.js PBR Studio)
// Engineered according to MCP blender-3d parametric blueprint
// ============================================================
let instRenderer, instScene, instCamera, instControls;
let caliperRoot, fixedBodyGroup, slidingAssemblyGroup;
let depthGaugeRod, petriSpecimen, cuvetteSpecimen, colonySpecimen;
let benchArStream = null;
let currentSpecimenType = 'petri';

// --- Procedural Laser-Etched Ruler Texture (2048 x 256) ---
function generateRulerTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 2048;
    canvas.height = 256;
    const ctx = canvas.getContext('2d');

    // Brushed Stainless Steel Metallic Base
    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#e2e8f0');
    grad.addColorStop(0.3, '#f8fafc');
    grad.addColorStop(0.7, '#cbd5e1');
    grad.addColorStop(1, '#94a3b8');
    ctx.fillStyle = grad;
    ctx.fillRect(0, 0, 2048, 256);

    // Fine brushed horizontal streaks
    ctx.fillStyle = 'rgba(255, 255, 255, 0.15)';
    for (let i = 0; i < 40; i++) {
        const y = Math.random() * 256;
        ctx.fillRect(0, y, 2048, 1);
    }
    ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
    for (let i = 0; i < 40; i++) {
        const y = Math.random() * 256;
        ctx.fillRect(0, y, 2048, 1);
    }

    // Baseline for metric ticks
    ctx.strokeStyle = '#0f172a';
    ctx.lineWidth = 3;
    ctx.beginPath();
    ctx.moveTo(100, 180);
    ctx.lineTo(1980, 180);
    ctx.stroke();

    // Laser-etched millimeter graduations (0 - 150 mm)
    const startX = 140;
    const pxPerMm = 12.0; // 12 px per mm

    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 22px "JetBrains Mono", monospace';
    ctx.textAlign = 'center';

    for (let mm = 0; mm <= 150; mm++) {
        const x = startX + mm * pxPerMm;
        let tickH = 22; // 1 mm

        if (mm % 10 === 0) {
            tickH = 65; // 10 mm
            ctx.lineWidth = 3.5;
            ctx.fillText(mm.toString(), x, 90);
        } else if (mm % 5 === 0) {
            tickH = 40; // 5 mm
            ctx.lineWidth = 2.5;
        } else {
            ctx.lineWidth = 1.8;
        }

        ctx.beginPath();
        ctx.moveTo(x, 180);
        ctx.lineTo(x, 180 - tickH);
        ctx.stroke();
    }

    // Engineering Laser Branding
    ctx.font = 'bold 18px "Prompt", sans-serif';
    ctx.textAlign = 'left';
    ctx.fillStyle = '#334155';
    ctx.fillText('STAINLESS HARDENED • 0.05 mm • RBRU SciExHub 2026/2027', startX + 240, 230);

    const tex = new THREE.CanvasTexture(canvas);
    tex.wrapS = THREE.ClampToEdgeWrapping;
    tex.wrapT = THREE.ClampToEdgeWrapping;
    tex.anisotropy = 16;
    return tex;
}

// --- Procedural Vernier Scale Plate Texture (512 x 256) ---
function generateVernierTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 512;
    canvas.height = 256;
    const ctx = canvas.getContext('2d');

    // Beveled Satin Chrome Base
    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#38bdf8');
    grad.addColorStop(0.2, '#e0f2fe');
    grad.addColorStop(0.8, '#bae6fd');
    grad.addColorStop(1, '#0284c7');
    ctx.fillStyle = grad;
    ctx.fillRect(0, 0, 512, 256);

    ctx.strokeStyle = '#0284c7';
    ctx.lineWidth = 4;
    ctx.strokeRect(4, 4, 504, 248);

    // Baseline
    ctx.strokeStyle = '#0f172a';
    ctx.lineWidth = 3;
    ctx.beginPath();
    ctx.moveTo(30, 70);
    ctx.lineTo(482, 70);
    ctx.stroke();

    // 0.05 mm Vernier Division marks (20 divisions = 39 mm / 2)
    const vStartX = 40;
    const vStep = 21.0;
    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 22px "JetBrains Mono", monospace';
    ctx.textAlign = 'center';

    for (let i = 0; i <= 20; i++) {
        const x = vStartX + i * vStep;
        let tickH = 24;
        if (i % 2 === 0) {
            tickH = 48;
            ctx.lineWidth = 3;
            ctx.fillText((i / 2).toString(), x, 150);
        } else {
            tickH = 32;
            ctx.lineWidth = 2;
        }

        ctx.beginPath();
        ctx.moveTo(x, 70);
        ctx.lineTo(x, 70 + tickH);
        ctx.stroke();
    }

    ctx.font = 'bold 15px "JetBrains Mono", monospace';
    ctx.fillStyle = '#0369a1';
    ctx.fillText('0.05 mm VERNIER', 256, 210);

    const tex = new THREE.CanvasTexture(canvas);
    tex.anisotropy = 16;
    return tex;
}

function initInstrument3D() {
    const container = document.getElementById('instrument-3d-canvas');
    if (!container) return;

    const w = container.clientWidth || 800;
    const h = container.clientHeight || 360;

    instScene = new THREE.Scene();
    instCamera = new THREE.PerspectiveCamera(40, w / h, 0.1, 100);
    instCamera.position.set(0, 3.5, 11);

    instRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    instRenderer.setSize(w, h);
    instRenderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    instRenderer.toneMapping = THREE.ACESFilmicToneMapping;
    instRenderer.toneMappingExposure = 1.3;
    container.innerHTML = '';
    container.appendChild(instRenderer.domElement);

    if (typeof THREE.OrbitControls !== 'undefined') {
        instControls = new THREE.OrbitControls(instCamera, instRenderer.domElement);
        instControls.enableDamping = true;
        instControls.dampingFactor = 0.05;
        instControls.maxDistance = 22;
        instControls.minDistance = 3;
    }

    // 3-Point Studio Lighting (Blender Cycles Emulation)
    const ambLight = new THREE.AmbientLight(0xffffff, 0.95);
    instScene.add(ambLight);

    const keyLight = new THREE.DirectionalLight(0xf8fafc, 2.2);
    keyLight.position.set(12, 16, 12);
    instScene.add(keyLight);

    const cyanRim = new THREE.DirectionalLight(0x38bdf8, 1.8);
    cyanRim.position.set(-14, -6, -10);
    instScene.add(cyanRim);

    const amberFill = new THREE.DirectionalLight(0xf59e0b, 0.8);
    amberFill.position.set(10, -8, 8);
    instScene.add(amberFill);

    // Bench Grid Surface
    const grid = new THREE.GridHelper(20, 32, 0x10b981, 0x1e293b);
    grid.position.y = -2.2;
    instScene.add(grid);

    // Root Group for complete assembly
    caliperRoot = new THREE.Group();

    // -------------------------------------------------------------
    // 1. FIXED CALIPER BODY (Main Ruler Beam + Fixed Jaws)
    // -------------------------------------------------------------
    fixedBodyGroup = new THREE.Group();

    const steelPBR = new THREE.MeshStandardMaterial({
        color: 0xe2e8f0,
        metalness: 0.90,
        roughness: 0.20
    });

    const rulerMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        metalness: 0.85,
        roughness: 0.22,
        map: generateRulerTexture()
    });

    // Main Beam Bar (length ~11.5 units)
    const beamGeom = new THREE.BoxGeometry(11.5, 0.82, 0.18);
    const mainBeam = new THREE.Mesh(beamGeom, rulerMat);
    mainBeam.position.set(1.5, 0, 0);
    fixedBodyGroup.add(mainBeam);

    // Ergonomic Fixed Lower Jaw (Curved profile via ExtrudeGeometry)
    const lowerJawShape = new THREE.Shape();
    lowerJawShape.moveTo(-4.2, 0.41);
    lowerJawShape.lineTo(-4.2, -3.2); // Precision ground flat measuring face
    lowerJawShape.lineTo(-4.9, -3.2); // Jaw tip width
    lowerJawShape.quadraticCurveTo(-5.4, -2.0, -5.2, -0.6); // Ergonomic outer arc
    lowerJawShape.lineTo(-5.2, 0.41);
    lowerJawShape.closePath();

    const extrudeSettings = { depth: 0.18, bevelEnabled: true, bevelSegments: 3, steps: 1, bevelSize: 0.02, bevelThickness: 0.02 };
    const fixedLowerJaw = new THREE.Mesh(new THREE.ExtrudeGeometry(lowerJawShape, extrudeSettings), steelPBR);
    fixedLowerJaw.position.z = -0.09;
    fixedBodyGroup.add(fixedLowerJaw);

    // Pointed Fixed Upper Horn (Internal measurement horn)
    const upperHornShape = new THREE.Shape();
    upperHornShape.moveTo(-4.2, 0.41);
    upperHornShape.lineTo(-4.2, 1.8);
    upperHornShape.lineTo(-4.7, 0.41);
    upperHornShape.closePath();
    const fixedUpperHorn = new THREE.Mesh(new THREE.ExtrudeGeometry(upperHornShape, extrudeSettings), steelPBR);
    fixedUpperHorn.position.z = -0.09;
    fixedBodyGroup.add(fixedUpperHorn);

    caliperRoot.add(fixedBodyGroup);

    // -------------------------------------------------------------
    // 2. SLIDING VERNIER ASSEMBLY (Sliding Jaws, Collar, Thumb Wheel)
    // -------------------------------------------------------------
    slidingAssemblyGroup = new THREE.Group();

    const vernierPlateMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        metalness: 0.85,
        roughness: 0.25,
        map: generateVernierTexture()
    });

    // Sliding Collar Frame
    const collarGeom = new THREE.BoxGeometry(2.2, 1.15, 0.28);
    const sliderCollar = new THREE.Mesh(collarGeom, steelPBR);
    slidingAssemblyGroup.add(sliderCollar);

    // Vernier scale faceplate
    const plateGeom = new THREE.PlaneGeometry(1.9, 0.75);
    const vernierPlate = new THREE.Mesh(plateGeom, vernierPlateMat);
    vernierPlate.position.set(0, 0, 0.145);
    slidingAssemblyGroup.add(vernierPlate);

    // Sliding Lower Jaw (Opposing curved profile)
    const slideLowerShape = new THREE.Shape();
    slideLowerShape.moveTo(0, 0.41);
    slideLowerShape.lineTo(0, -3.2); // Opposite clamping face
    slideLowerShape.lineTo(0.7, -3.2);
    slideLowerShape.quadraticCurveTo(1.2, -2.0, 1.0, -0.6);
    slideLowerShape.lineTo(1.0, 0.41);
    slideLowerShape.closePath();
    const slideLowerJaw = new THREE.Mesh(new THREE.ExtrudeGeometry(slideLowerShape, extrudeSettings), steelPBR);
    slideLowerJaw.position.z = -0.09;
    slidingAssemblyGroup.add(slideLowerJaw);

    // Sliding Upper Horn
    const slideUpperShape = new THREE.Shape();
    slideUpperShape.moveTo(0, 0.41);
    slideUpperShape.lineTo(0, 1.8);
    slideUpperShape.lineTo(0.5, 0.41);
    slideUpperShape.closePath();
    const slideUpperHorn = new THREE.Mesh(new THREE.ExtrudeGeometry(slideUpperShape, extrudeSettings), steelPBR);
    slideUpperHorn.position.z = -0.09;
    slidingAssemblyGroup.add(slideUpperHorn);

    // Knurled Thumbscrew Lock Knob (Top)
    const lockScrewGeom = new THREE.CylinderGeometry(0.18, 0.18, 0.45, 16);
    const brassMat = new THREE.MeshStandardMaterial({ color: 0xd97706, metalness: 0.85, roughness: 0.25 });
    const lockScrew = new THREE.Mesh(lockScrewGeom, brassMat);
    lockScrew.position.set(0.4, 0.75, 0);
    slidingAssemblyGroup.add(lockScrew);

    // Thumb Grip Shelf
    const thumbGripGeom = new THREE.BoxGeometry(0.6, 0.12, 0.32);
    const thumbGrip = new THREE.Mesh(thumbGripGeom, steelPBR);
    thumbGrip.position.set(0.6, -0.65, 0);
    slidingAssemblyGroup.add(thumbGrip);

    // Depth Gauge Rod (extends through beam rear slot)
    const rodGeom = new THREE.BoxGeometry(11.5, 0.1, 0.06);
    depthGaugeRod = new THREE.Mesh(rodGeom, steelPBR);
    depthGaugeRod.position.set(5.75, -0.05, -0.12);
    slidingAssemblyGroup.add(depthGaugeRod);

    caliperRoot.add(slidingAssemblyGroup);

    // -------------------------------------------------------------
    // 3. SPECIMENS (Petri Dish, Spectrophotometer Cuvette, Colony)
    // -------------------------------------------------------------
    // Specimen 1: Borosilicate Glass Petri Dish
    petriSpecimen = new THREE.Group();
    const glassPBR = new THREE.MeshPhysicalMaterial({
        color: 0xffffff,
        metalness: 0.05,
        roughness: 0.03,
        transmission: 0.95,
        transparent: true,
        opacity: 0.88,
        ior: 1.52
    });
    const dishMesh = new THREE.Mesh(new THREE.CylinderGeometry(1.35, 1.35, 0.4, 36), glassPBR);
    dishMesh.rotation.x = Math.PI / 2;
    petriSpecimen.add(dishMesh);

    const agarMesh = new THREE.Mesh(new THREE.CylinderGeometry(1.28, 1.28, 0.15, 32), new THREE.MeshStandardMaterial({ color: 0xf59e0b, roughness: 0.4, transparent: true, opacity: 0.65 }));
    agarMesh.rotation.x = Math.PI / 2;
    petriSpecimen.add(agarMesh);

    // Bacterial Colonies
    const colMat = new THREE.MeshStandardMaterial({ color: 0x10b981, emissive: 0x34d399, emissiveIntensity: 0.5 });
    [[0.3, 0.4], [-0.5, 0.2], [0.2, -0.5], [-0.3, -0.4], [0.6, -0.2]].forEach(([cx, cy]) => {
        const dot = new THREE.Mesh(new THREE.SphereGeometry(0.08, 12, 12), colMat);
        dot.position.set(cx, cy, 0.1);
        petriSpecimen.add(dot);
    });
    caliperRoot.add(petriSpecimen);

    // Specimen 2: Spectrophotometer Optical Cuvette (12.5 mm standard pathlength)
    cuvetteSpecimen = new THREE.Group();
    const cuvetteGlass = new THREE.Mesh(new THREE.BoxGeometry(0.5, 1.8, 0.5), glassPBR);
    const cuvetteLiquid = new THREE.Mesh(new THREE.BoxGeometry(0.42, 1.4, 0.42), new THREE.MeshPhysicalMaterial({ color: 0x06b6d4, roughness: 0.05, transmission: 0.9, transparent: true, opacity: 0.8 }));
    cuvetteLiquid.position.y = -0.15;
    cuvetteSpecimen.add(cuvetteGlass, cuvetteLiquid);
    cuvetteSpecimen.visible = false;
    caliperRoot.add(cuvetteSpecimen);

    // Specimen 3: Single Bacterial Colony Agar Plaque (2.45 mm)
    colonySpecimen = new THREE.Group();
    const plaqueMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.18, 0.25, 24), glassPBR);
    plaqueMesh.rotation.x = Math.PI / 2;
    const singleColony = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), colMat);
    colonySpecimen.add(plaqueMesh, singleColony);
    colonySpecimen.visible = false;
    caliperRoot.add(colonySpecimen);

    instScene.add(caliperRoot);

    // Initial position: 88.60 mm
    updateCaliperSlide(88.60);

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        caliperRoot.rotation.y += 0.0015;
        if (instControls) instControls.update();
        instRenderer.render(instScene, instCamera);
    }
    animate();

    window.addEventListener('resize', () => {
        if (!container) return;
        instCamera.aspect = container.clientWidth / container.clientHeight;
        instCamera.updateProjectionMatrix();
        instRenderer.setSize(container.clientWidth, container.clientHeight);
    });
}

function resetBenchCamera() {
    if (instCamera && instControls) {
        instCamera.position.set(0, 3.5, 11);
        instControls.target.set(0, 0, 0);
        instControls.update();
    }
}

// Multi-Mode Switcher
function switchBenchMode(mode) {
    const btn3d = document.getElementById('benchMode3d');
    const btnAr = document.getElementById('benchModeAr');
    const btnSim = document.getElementById('benchModeSim');
    const reticle = document.getElementById('benchArReticle');
    const video = document.getElementById('benchArVideo');
    const simOverlay = document.getElementById('caliperSimOverlay');

    [btn3d, btnAr, btnSim].forEach(btn => {
        btn.className = "px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5";
    });

    if (mode === '3d') {
        btn3d.className = "px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-1.5";
        stopBenchAr();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        instScene.background = null;
    } else if (mode === 'ar') {
        btnAr.className = "px-3.5 py-1.5 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-md transition flex items-center gap-1.5";
        startBenchAr();
        reticle.classList.remove('hidden');
        reticle.classList.add('flex');
    } else if (mode === 'sim') {
        btnSim.className = "px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500 text-white shadow-md transition flex items-center gap-1.5";
        stopBenchAr();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        simOverlay.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

async function startBenchAr() {
    const video = document.getElementById('benchArVideo');
    if (!video) return;
    try {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            benchArStream = await navigator.mediaDevices.getUserMedia({
                video: { facingMode: { ideal: 'environment' } }
            });
            video.srcObject = benchArStream;
            video.classList.remove('hidden');
        }
    } catch (err) {
        console.warn("Bench AR fallback:", err);
    }
}

function stopBenchAr() {
    const video = document.getElementById('benchArVideo');
    if (benchArStream) {
        benchArStream.getTracks().forEach(t => t.stop());
        benchArStream = null;
    }
    if (video) video.classList.add('hidden');
}

// Precision Caliper Mechanics & Real-Time Rigging
function updateCaliperSlide(val) {
    const mm = parseFloat(val);
    const mainScale = Math.floor(mm);
    const fraction = mm - mainScale;
    const vernierLine = Math.round(fraction / 0.05);

    document.getElementById('liveReadingDisplay').textContent = `${mm.toFixed(2)} mm`;
    document.getElementById('sliderFormula').innerHTML = `สเกลหลัก <span class="text-white font-bold">${mainScale} mm</span> + สเกลเวอร์เนียร์ ขีดที่ ${vernierLine} (<span class="text-sky-300 font-bold">${fraction.toFixed(2)} mm</span>) = <span class="text-emerald-400 font-bold">${mm.toFixed(2)} mm</span>`;

    // Rigging: map millimeter position (0 - 150 mm) to Three.js world units
    // Zero jaw offset: x = -4.2. Max jaw offset: x = 2.8
    if (slidingAssemblyGroup) {
        const slideX = -4.2 + (mm / 150.0) * 7.0;
        slidingAssemblyGroup.position.x = slideX;

        // Position active specimen between jaws
        const midX = (-4.2 + slideX) / 2.0;
        if (petriSpecimen && currentSpecimenType === 'petri') {
            petriSpecimen.position.set(midX, -1.6, 0);
            const dishScale = Math.max(0.2, (mm / 90.0));
            petriSpecimen.scale.set(dishScale, dishScale, 1);
        } else if (cuvetteSpecimen && currentSpecimenType === 'cuvette') {
            cuvetteSpecimen.position.set(midX, -1.6, 0);
        } else if (colonySpecimen && currentSpecimenType === 'colony') {
            colonySpecimen.position.set(midX, -1.6, 0);
        }
    }
}

function setSpecimen(sizeMm, name) {
    document.getElementById('caliperSlider').value = sizeMm;
    if (name.includes('Petri')) {
        currentSpecimenType = 'petri';
        if (petriSpecimen) petriSpecimen.visible = true;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = false;
        if (colonySpecimen) colonySpecimen.visible = false;
    } else if (name.includes('คิวเวตต์')) {
        currentSpecimenType = 'cuvette';
        if (petriSpecimen) petriSpecimen.visible = false;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = true;
        if (colonySpecimen) colonySpecimen.visible = false;
    } else {
        currentSpecimenType = 'colony';
        if (petriSpecimen) petriSpecimen.visible = false;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = false;
        if (colonySpecimen) colonySpecimen.visible = true;
    }
    updateCaliperSlide(sizeMm);
}

document.addEventListener('DOMContentLoaded', () => {
    initInstrument3D();
});
</script>

<?php include '../includes/footer.php'; ?>
