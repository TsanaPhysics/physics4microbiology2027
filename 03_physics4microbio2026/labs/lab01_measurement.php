<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดและเลขนัยสำคัญ | Lab 1: Measurement | 实验1：测量与有效数字';
$basePath = '../';
include '../includes/header.php';
?>

<!-- Three.js & Controls -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<!-- Lab Header Hero -->
<section class="lab-hero">
    <div class="lab-hero-content">
        <div class="lab-badge">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 shadow-[0_0_10px_#10b981] animate-ping mr-2"></span>
            🧪 <span class="lang-block" lang="th">ปฏิบัติการที่ 1 • RBRU SciExHub 2026/2027</span>
            <span class="lang-block" lang="en">Lab 1 • RBRU SciExHub 2026/2027</span>
            <span class="lang-block" lang="zh">实验1 • 数字化农业物理 2026/2027</span>
        </div>
        <h1>
            <span class="lang-block" lang="th">การวัดและ<span>เลขนัยสำคัญ</span></span>
            <span class="lang-block" lang="en">Measurement &amp; <span>Significant Figures</span></span>
            <span class="lang-block" lang="zh">测量与<span>有效数字</span></span>
        </h1>
        <div class="hero-trilingual">
            <span class="th">🇹🇭 การวัดความยาว เครื่องมือความแม่นยำสูง และขนาดโคโลนีจุลินทรีย์</span>
            <span class="en">🇬🇧 Precision Metrology, Vernier Mechanics &amp; Microbial Colony Sizing</span>
            <span class="zh">🇨🇳 精密测量、游标卡尺原理与微生物菌落大小测定</span>
        </div>
    </div>
</section>

<!-- 3D Virtual Bench & Multi-Mode Laboratory Suite -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 -mt-8 mb-10 relative z-10">
    <div class="bg-gradient-to-r from-slate-900 via-slate-900/95 to-slate-900 border border-emerald-500/40 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-2xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/40 text-xs font-mono font-bold uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-atom text-emerald-400 animate-spin-slow"></i>
                    Interactive 3D Virtual Bench • 3 Unified Modes
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white">
                    โต๊ะปฏิบัติการเสมือนจริง 3 มิติ (3D Virtual Bench &amp; Telemetry)
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-2xl leading-relaxed">
                    จำลองเครื่องมือวัดจริง (เวอร์เนียร์คาลิเปอร์สเตนเลสสตีล PBR, จานเพาะเชื้อแก้วโบโรซิลิเกต) พร้อมระบบทดลองวัดแบบสัมผัสและสแกนหน้าตำราเรียน
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="../../virtual_lab/index.html?lab=1" target="_blank" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 text-slate-950 font-bold text-xs flex items-center gap-2 shadow-lg shadow-emerald-950/50 transition transform active:scale-95">
                    <i class="fa-solid fa-flask"></i> เข้าสู่ห้องแล็บ 3D เต็มรูปแบบ (13 Labs)
                </a>
                <a href="../simulations/sim01_unit_converter.php" class="px-4 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-200 border border-white/10 font-bold text-xs flex items-center gap-2 transition">
                    <i class="fa-solid fa-ruler-combined text-sky-400"></i> สเกลจำลอง 3D
                </a>
            </div>
        </div>

        <!-- Mode Switcher Buttons -->
        <div class="flex flex-wrap items-center justify-between gap-2 bg-slate-950/80 p-2 rounded-2xl border border-white/5 mb-4">
            <div class="flex flex-wrap gap-1">
                <button id="benchMode3d" onclick="switchBenchMode('3d')" class="px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-cube"></i> โหมด 1: 3D สำรวจ 360°
                </button>
                <button id="benchModeAr" onclick="switchBenchMode('ar')" class="px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-camera"></i> โหมด 2: WebAR ส่องหน้าตำรา (รูป L1.1)
                </button>
                <button id="benchModeSim" onclick="switchBenchMode('sim')" class="px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-sliders"></i> โหมด 3: สไลเดอร์วัดค่าจำลองแบบ Real-time
                </button>
            </div>
            <button onclick="resetBenchCamera()" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs flex items-center gap-1.5 border border-white/10 transition">
                <i class="fa-solid fa-rotate-left"></i> รีเซ็ตมุมมอง
            </button>
        </div>

        <!-- 3D Scene / AR Viewport -->
        <div id="bench3dWrapper" class="relative w-full h-[380px] bg-slate-950 rounded-2xl overflow-hidden border border-white/10 shadow-inner">
            <div id="instrument-3d-canvas" class="w-full h-full"></div>

            <!-- AR Camera Stream Video -->
            <video id="benchArVideo" autoplay playsinline webkit-playsinline muted class="absolute inset-0 w-full h-full object-cover hidden z-0"></video>

            <!-- AR Reticle Overlay -->
            <div id="benchArReticle" class="absolute inset-0 pointer-events-none hidden flex-col items-center justify-center z-10">
                <div class="relative w-64 h-64 border-2 border-emerald-400 rounded-3xl shadow-[0_0_30px_rgba(16,185,129,0.5)]">
                    <div class="absolute inset-x-0 h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent animate-bounce"></div>
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-slate-950 px-3 py-0.5 rounded-full text-[10px] font-mono text-emerald-400 border border-emerald-400/50">
                        TEXTBOOK RETICLE SCANNER
                    </div>
                </div>
                <p class="text-xs text-emerald-300 font-mono mt-4 bg-slate-950/80 px-4 py-1.5 rounded-full border border-emerald-500/30">
                    ส่องกล้องไปยังรูปที่ L1.1 ในตำราเรียนเพื่อจำลองเวอร์เนียร์คาลิเปอร์ 3 มิติ
                </p>
            </div>

            <!-- Caliper Precision Interactive Overlay (Mode 3) -->
            <div id="caliperSimOverlay" class="absolute inset-x-4 bottom-4 p-4 rounded-2xl bg-slate-950/90 border border-emerald-500/40 backdrop-blur-xl z-20 hidden space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-2">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-emerald-400 font-mono">🎯 ตัวอย่างวัตถุทดสอบ:</span>
                        <button onclick="setSpecimen(90.00, 'จานเพาะเชื้อ (Petri Dish)')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-[11px] text-white border border-white/10">จานเพาะเชื้อ (90 mm)</button>
                        <button onclick="setSpecimen(2.45, 'โคโลนีแบคทีเรีย (Colony)')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-[11px] text-white border border-white/10">โคโลนี (2.45 mm)</button>
                        <button onclick="setSpecimen(12.50, 'คิวเวตต์วัดความขุ่น (Cuvette)')" class="px-2.5 py-1 rounded bg-slate-800 hover:bg-slate-700 text-[11px] text-white border border-white/10">คิวเวตต์ (12.5 mm)</button>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] text-slate-400">ค่าวัดรวม (Measurement):</span>
                        <div id="liveReadingDisplay" class="text-lg font-mono font-bold text-sky-300">88.60 mm</div>
                    </div>
                </div>
                <div class="space-y-1">
                    <div class="flex justify-between text-[11px] font-mono text-slate-400">
                        <span>เลื่อนปากวัดเวอร์เนียร์ (Slider):</span>
                        <span id="sliderFormula" class="text-emerald-400">สเกลหลัก 88 mm + สเกลเวอร์เนียร์ (12 × 0.05 mm) = 88.60 mm</span>
                    </div>
                    <input type="range" id="caliperSlider" min="0" max="150" step="0.05" value="88.60" oninput="updateCaliperSlide(this.value)" class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-emerald-500">
                </div>
            </div>

            <!-- Viewport Info Pill -->
            <div class="absolute top-4 left-4 bg-slate-950/85 backdrop-blur-md px-3 py-2 rounded-xl border border-white/10 text-xs pointer-events-none">
                <div class="text-sky-300 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-compass text-emerald-400"></i> PBR Vernier Caliper &amp; Petri Dish
                </div>
                <div class="text-slate-400 text-[10px]">ความละเอียดสเกลเวอร์เนียร์: 0.05 mm • หมุน 360°</div>
            </div>
        </div>
    </div>
</div>

<div class="lab-content">

    <!-- Objectives — Trilingual -->
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li>
                <span class="lang-block" lang="th">ใช้เครื่องมือวัดความแม่นยำสูง (ไม้บรรทัด เวอร์เนียร์คาลิเปอร์ ไมโครมิเตอร์) ได้อย่างถูกต้องตามหลักวิศวกรรมฟิสิกส์</span>
                <span class="lang-block" lang="en">Correctly operate precision metrology instruments (ruler, vernier caliper, micrometer)</span>
                <span class="lang-block" lang="zh">正确使用高精度测量仪器（直尺、游标卡尺、千分尺）</span>
            </li>
            <li>
                <span class="lang-block" lang="th">รายงานผลการวัดพร้อมเลขนัยสำคัญ (Significant Figures) ที่ถูกต้องตามมาตรฐานสากล</span>
                <span class="lang-block" lang="en">Report measurements with correct significant figures adhering to international standards</span>
                <span class="lang-block" lang="zh">按照国际标准用正确的有效数字报告测量结果</span>
            </li>
            <li>
                <span class="lang-block" lang="th">คำนวณความคลาดเคลื่อนสัมบูรณ์ ความคลาดเคลื่อนสัมพัทธ์ และส่วนเบี่ยงเบนมาตรฐานของการวัดซ้ำได้</span>
                <span class="lang-block" lang="en">Calculate absolute error, relative percentage error, and standard deviation of repeated measurements</span>
                <span class="lang-block" lang="zh">计算重复测量的绝对误差、相对百分比误差及标准差</span>
            </li>
            <li>
                <span class="lang-block" lang="th">วัดและวิเคราะห์ขนาดโคโลนีจุลินทรีย์บนจานเพาะเชื้อด้วยสายตาและเครื่องมือวัดเสมือนจริง</span>
                <span class="lang-block" lang="en">Measure and analyze microbial colony diameters on Petri dishes using digital instruments</span>
                <span class="lang-block" lang="zh">用数字化仪器测量并分析培养皿上微生物菌落的大小</span>
            </li>
            <li>
                <span class="lang-block" lang="th">วัดค่าความขุ่น (Turbidity: NTU) และประเมินคุณภาพน้ำทางชีวภาพและสิ่งแวดล้อม</span>
                <span class="lang-block" lang="en">Determine water turbidity (NTU) and assess microbial water quality against standards</span>
                <span class="lang-block" lang="zh">测定水样浊度（NTU）并比对微生物环境水质标准</span>
            </li>
        </ul>
    </div>

    <!-- Theory & Error Distribution Section -->
    <div class="lab-section">
        <h2>📖 <span class="lang-block" lang="th">ทฤษฎีที่เกี่ยวข้อง</span><span class="lang-block" lang="en">Relevant Theory</span><span class="lang-block" lang="zh">相关理论</span></h2>

        <div class="lang-block" lang="th">
            <p>การวัดทางวิทยาศาสตร์เป็นรากฐานของการวิเคราะห์เชิงปริมาณ ในจุลชีววิทยา ความเที่ยงตรง (Precision) และความแม่นยำ (Accuracy) ของการวัดขนาดเซลล์ โคโลนี และปริมาตรสาร มีผลโดยตรงต่อการแปลผลชีวเคมี ในขณะที่งานด้านสิ่งแวดล้อม การวัดค่าความขุ่น (Turbidity) ด้วยหลักการกระเจิงแสง Nephelometry ต้องคำนึงถึงขีดจำกัดความคลาดเคลื่อนของเครื่องมือเสมอ</p>
        </div>
        <div class="lang-block" lang="en">
            <p>Scientific metrology forms the foundation of quantitative analysis. In microbiology, the precision and accuracy of measuring cell sizes, colony diameters, and media volumes directly dictate biochemical interpretation. In environmental monitoring, turbidity assessment via light scattering relies on instrument uncertainty constraints.</p>
        </div>
        <div class="lang-block" lang="zh">
            <p>科学测量是定量分析的基石。在微生物学中，细胞尺寸、菌落直径和试剂体积测量的精密度与准确度直接决定了生物化学分析的准确性。</p>
        </div>

        <!-- Gaussian Uncertainty Chart (Rendered via MCP visualization) -->
        <div class="my-6 p-4 rounded-2xl bg-slate-950/90 border border-emerald-500/30">
            <div class="flex items-center gap-2 mb-3">
                <i class="fa-solid fa-chart-area text-emerald-400"></i>
                <h3 class="text-sm font-bold text-white m-0">ฟังก์ชันการแจกแจงความน่าจะเป็นของความคลาดเคลื่อน (Gaussian Uncertainty Distribution)</h3>
            </div>
            <img src="../images/ch01/gaussian_uncertainty_chart.svg" alt="Gaussian Uncertainty Distribution Curve" class="w-full h-auto rounded-xl">
            <p class="text-[11px] text-slate-400 mt-2">
                รูปแสดงฟังก์ชันความหนาแน่นความน่าจะเป็นแบบเกาส์เซียนของการวัดซ้ำจานเพาะเชื้อ ($\mu = 9.00\text{ cm}, \sigma = 0.04\text{ cm}$) ครอบคลุมช่วงความเชื่อมั่น $\pm 1\sigma$ ($68.3\%$) และ $\pm 2\sigma$ ($95.4\%$)
            </p>
        </div>

        <!-- Dual-Track Cards -->
        <div class="dual-track">
            <div class="track-card micro-track">
                <div class="track-card-title">🔬 <span class="lang-block" lang="th">เกณฑ์เลขนัยสำคัญ (Significant Figures)</span><span class="lang-block" lang="en">Significant Figures Criteria</span><span class="lang-block" lang="zh">有效数字准则</span></div>
                <div class="lang-block" lang="th">
                    <ul class="text-xs space-y-1.5 text-slate-300">
                        <li>• <code class="text-sky-300">0.0025 mm</code> → <strong>2</strong> ตัวเลขนัยสำคัญ (ศูนย์หน้าไม่นับ)</li>
                        <li>• <code class="text-sky-300">1.0050 cm</code> → <strong>5</strong> ตัวเลขนัยสำคัญ (ศูนย์กลางและหลังจุดนับทั้งหมด)</li>
                        <li>• การคูณ/หาร: ยึดจำนวนเลขนัยสำคัญของตัวเลขที่น้อยที่สุด</li>
                    </ul>
                </div>
            </div>
            <div class="track-card env-track">
                <div class="track-card-title">🌍 <span class="lang-block" lang="th">มาตรฐานความขุ่น (Turbidity - NTU)</span><span class="lang-block" lang="en">Turbidity Standards</span><span class="lang-block" lang="zh">浊度标准</span></div>
                <div class="lang-block" lang="th">
                    <ul class="text-xs space-y-1.5 text-slate-300">
                        <li>• <strong>น้ำดื่มบริสุทธิ์:</strong> &lt; 4 NTU (มาตรฐานองค์การอนามัยโลก WHO)</li>
                        <li>• <strong>น้ำผิวดิน/แหล่งน้ำธรรมชาติ:</strong> &lt; 50 NTU</li>
                        <li>• <strong>น้ำเสียชุมชน/อุตสาหกรรม:</strong> อาจสูงเกิน 500 NTU ต้องบำบัดก่อนปล่อย</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="formula-display mt-4">
            <div class="formula-label"><span class="lang-block" lang="th">สูตรการคำนวณความคลาดเคลื่อน</span><span class="lang-block" lang="en">Error Formulas</span><span class="lang-block" lang="zh">误差计算公式</span></div>
            $$\text{Absolute Error} = |x_{\text{measured}} - x_{\text{true}}| \quad\quad \text{\%Error} = \left(\frac{|x_{\text{measured}} - x_{\text{true}}|}{x_{\text{true}}}\right) \times 100\%$$
        </div>
    </div>

    <!-- Materials — Trilingual -->
    <div class="lab-section">
        <h2>🔧 <span class="lang-block" lang="th">วัสดุและอุปกรณ์</span><span class="lang-block" lang="en">Materials &amp; Equipment</span><span class="lang-block" lang="zh">材料与仪器</span></h2>
        <div class="materials-grid">
            <div class="material-item"><span class="mat-icon">📏</span> <span class="lang-block" lang="th">ไม้บรรทัดเหล็ก 30 cm</span><span class="lang-block" lang="en">Steel Ruler 30 cm</span><span class="lang-block" lang="zh">30cm钢直尺</span></div>
            <div class="material-item"><span class="mat-icon">🔧</span> <span class="lang-block" lang="th">เวอร์เนียร์คาลิเปอร์ (0.05 mm)</span><span class="lang-block" lang="en">Vernier Caliper (0.05 mm)</span><span class="lang-block" lang="zh">游标卡尺 (0.05 mm)</span></div>
            <div class="material-item"><span class="mat-icon">⚙️</span> <span class="lang-block" lang="th">ไมโครมิเตอร์ (0.01 mm)</span><span class="lang-block" lang="en">Micrometer (0.01 mm)</span><span class="lang-block" lang="zh">螺旋测微计 (0.01 mm)</span></div>
            <div class="material-item"><span class="mat-icon">🧫</span> <span class="lang-block" lang="th">จานเพาะเชื้อพร้อมโคโลนีแบคทีเรีย</span><span class="lang-block" lang="en">Petri Dish with Colonies</span><span class="lang-block" lang="zh">含菌落培养皿</span></div>
            <div class="material-item"><span class="mat-icon">🔬</span> <span class="lang-block" lang="th">กล้องจุลทรรศน์สเตอริโอ</span><span class="lang-block" lang="en">Stereo Microscope</span><span class="lang-block" lang="zh">立体体视显微镜</span></div>
            <div class="material-item"><span class="mat-icon">⚖️</span> <span class="lang-block" lang="th">เครื่องชั่งดิจิทัลทศนิยม 4 ตำแหน่ง</span><span class="lang-block" lang="en">Analytical Balance (0.1 mg)</span><span class="lang-block" lang="zh">电子精密天平</span></div>
            <div class="material-item"><span class="mat-icon">🧪</span> <span class="lang-block" lang="th">กระบอกตวงแก้ว 100 mL</span><span class="lang-block" lang="en">Graduated Cylinder 100 mL</span><span class="lang-block" lang="zh">100 mL量筒</span></div>
            <div class="material-item"><span class="mat-icon">💧</span> <span class="lang-block" lang="th">Turbidimeter วัดความขุ่น</span><span class="lang-block" lang="en">Turbidity Meter</span><span class="lang-block" lang="zh">散射式浊度计</span></div>
        </div>
    </div>

    <!-- Procedure — Trilingual -->
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำการทดลอง</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>

        <h3>
            <span class="lang-block" lang="th">ตอนที่ 1: การวัดความยาวด้วยเครื่องมือความแม่นยำสูง</span>
            <span class="lang-block" lang="en">Part 1: Dimension Measurement with Precision Instruments</span>
            <span class="lang-block" lang="zh">第一部分：高精度仪器长度测量</span>
        </h3>

        <!-- Concept Illustration with AR Badge -->
        <figure class="concept-illustration" style="margin:1.5rem 0;">
            <img src="../images/ch01/vernier_caliper.png" alt="Vernier Caliper Reading Guide" style="width:100%; border-radius:16px; border:1px solid rgba(255,255,255,0.1);">
            <figcaption class="text-xs text-slate-400 mt-2 text-center">
                <span class="lang-block" lang="th">รูปที่ L1.1 แผนผังการอ่านค่าเวอร์เนียร์คาลิเปอร์: สเกลหลัก (88 mm) + สเกลเวอร์เนียร์ตรงกันขีดที่ 12 ($12 \times 0.05 = 0.60\text{ mm}$) ได้ค่าวัดสุทธิ 88.60 mm</span>
                <span class="lang-block" lang="en">Fig. L1.1 Vernier caliper reading mechanics: main scale + vernier coincidence = total reading (88.60 mm)</span>
            </figcaption>
        </figure>

        <div class="procedure-steps">
            <div class="procedure-step">
                <div class="step-content">
                    <p>
                        <span class="lang-block" lang="th">เลือกวัตถุตัวอย่าง 3 ชนิด: หลอดทดลองแก้ว, จานเพาะเชื้อพลาสติก, และสไลด์แก้ว</span>
                        <span class="lang-block" lang="en">Select 3 specimens: test tube, Petri dish, and glass microscope slide</span>
                    </p>
                </div>
            </div>
            <div class="procedure-step">
                <div class="step-content">
                    <p>
                        <span class="lang-block" lang="th">วัดความยาวและเส้นผ่านศูนย์กลางด้วยไม้บรรทัด, เวอร์เนียร์คาลิเปอร์, และไมโครมิเตอร์ ทำซ้ำชนิดละ 3 ครั้งเพื่อหาค่าเฉลี่ย</span>
                        <span class="lang-block" lang="en">Measure length and outer diameter with ruler, vernier caliper, and micrometer (3 replications each)</span>
                    </p>
                </div>
            </div>
            <div class="procedure-step">
                <div class="step-content">
                    <p>
                        <span class="lang-block" lang="th">คำนวณค่าเฉลี่ย ($\bar{x}$), ส่วนเบี่ยงเบนมาตรฐาน ($s$), และรายงานผลพร้อมเลขนัยสำคัญตามความละเอียดของเครื่องมือ</span>
                        <span class="lang-block" lang="en">Calculate mean, standard deviation, and express final results with proper significant figures</span>
                    </p>
                </div>
            </div>
        </div>

        <h3 class="mt-8">
            <span class="lang-block" lang="th">ตอนที่ 2: การวัดขนาดโคโลนีจุลินทรีย์และความขุ่นของน้ำ</span>
            <span class="lang-block" lang="en">Part 2: Microbial Colony Sizing and Water Turbidity</span>
            <span class="lang-block" lang="zh">第二部分：菌落大小测定与水样浊度测量</span>
        </h3>

        <div class="procedure-steps">
            <div class="procedure-step">
                <div class="step-content">
                    <p>
                        <span class="lang-block" lang="th">นำจานเพาะเชื้อที่มีโคโลนีเดี่ยวของแบคทีเรียมาวางใต้กล้องสเตอริโอ ใช้เวอร์เนียร์คาลิเปอร์วัดเส้นผ่านศูนย์กลางโคโลนีจำนวน 5 โคโลนี</span>
                    </p>
                </div>
            </div>
            <div class="procedure-step">
                <div class="step-content">
                    <p>
                        <span class="lang-block" lang="th">เติมตัวอย่างน้ำ (น้ำประปา, น้ำคลอง, น้ำเสียสังเคราะห์) ลงในหลอดคิวเวตต์ เช็ดผิวด้านนอกให้แห้งสนิท ใส่ในช่องวัดของ Turbidimeter แล้วบันทึกค่า NTU</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Section (Modern Dark Neon Style) -->
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผลการทดลอง</span><span class="lang-block" lang="en">Data Tables</span><span class="lang-block" lang="zh">实验数据记录表</span></h2>

        <h3><span class="lang-block" lang="th">ตารางที่ 1.1: ผลการวัดมิติจานเพาะเชื้อด้วยเครื่องมือ 3 ชนิด</span></h3>
        <table class="data-table">
            <thead>
                <tr>
                    <th>เครื่องมือวัด</th>
                    <th>ความละเอียด</th>
                    <th>ครั้งที่ 1 (mm)</th>
                    <th>ครั้งที่ 2 (mm)</th>
                    <th>ครั้งที่ 3 (mm)</th>
                    <th>ค่าเฉลี่ย $\bar{x}$ (mm)</th>
                    <th>เลขนัยสำคัญ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ไม้บรรทัดพลาสติก</td>
                    <td>1.0 mm</td>
                    <td class="input-cell">90.0</td>
                    <td class="input-cell">89.5</td>
                    <td class="input-cell">90.5</td>
                    <td class="font-mono text-emerald-400 font-bold">90.0</td>
                    <td class="font-mono text-sky-400 font-bold">3 ตัว</td>
                </tr>
                <tr>
                    <td>เวอร์เนียร์คาลิเปอร์</td>
                    <td>0.05 mm</td>
                    <td class="input-cell">90.15</td>
                    <td class="input-cell">90.10</td>
                    <td class="input-cell">90.20</td>
                    <td class="font-mono text-emerald-400 font-bold">90.15</td>
                    <td class="font-mono text-sky-400 font-bold">4 ตัว</td>
                </tr>
                <tr>
                    <td>ไมโครมิเตอร์</td>
                    <td>0.01 mm</td>
                    <td class="input-cell">90.14</td>
                    <td class="input-cell">90.16</td>
                    <td class="input-cell">90.15</td>
                    <td class="font-mono text-emerald-400 font-bold">90.15</td>
                    <td class="font-mono text-sky-400 font-bold">4 ตัว</td>
                </tr>
            </tbody>
        </table>

        <h3 class="mt-6"><span class="lang-block" lang="th">ตารางที่ 1.2: การวัดความขุ่นของตัวอย่างน้ำ (Turbidity Assessment)</span></h3>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ตัวอย่างน้ำ</th>
                    <th>NTU (1)</th>
                    <th>NTU (2)</th>
                    <th>NTU (3)</th>
                    <th>ค่าเฉลี่ย NTU</th>
                    <th>มาตรฐาน WHO (&lt;4 NTU)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>น้ำประปาห้องปฏิบัติการ</td>
                    <td class="input-cell">0.85</td>
                    <td class="input-cell">0.90</td>
                    <td class="input-cell">0.88</td>
                    <td class="font-mono text-emerald-400 font-bold">0.88</td>
                    <td class="text-emerald-400 font-bold">✓ ผ่านมาตรฐาน</td>
                </tr>
                <tr>
                    <td>น้ำฝนธรรมชาติ</td>
                    <td class="input-cell">2.10</td>
                    <td class="input-cell">2.25</td>
                    <td class="input-cell">2.15</td>
                    <td class="font-mono text-emerald-400 font-bold">2.17</td>
                    <td class="text-emerald-400 font-bold">✓ ผ่านมาตรฐาน</td>
                </tr>
                <tr>
                    <td>น้ำคลองรอบมหาวิทยาลัย</td>
                    <td class="input-cell">38.4</td>
                    <td class="input-cell">41.2</td>
                    <td class="input-cell">39.8</td>
                    <td class="font-mono text-amber-400 font-bold">39.8</td>
                    <td class="text-amber-400 font-bold">✗ ต้องผ่านการกรอง</td>
                </tr>
                <tr>
                    <td>น้ำเสียจุลินทรีย์จำลอง</td>
                    <td class="input-cell">420.0</td>
                    <td class="input-cell">415.0</td>
                    <td class="input-cell">425.0</td>
                    <td class="font-mono text-rose-400 font-bold">420.0</td>
                    <td class="text-rose-400 font-bold">✗ สูงเกินมาตรฐาน</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Safety Precautions Box -->
    <div class="safety-box">
        <h3>⚠️ <span class="lang-block" lang="th">ข้อควรระวังเพื่อความปลอดภัยทางชีวภาพ (Biosafety Precautions)</span></h3>
        <ul class="safety-list">
            <li>ห้ามเปิดฝาจานเพาะเชื้อจุลินทรีย์ในอากาศเปิด ให้วัดค่าผ่านฝาพลาสติกใสหรือทำการทดลองในตู้ Biosafety Cabinet ระดับ 2</li>
            <li>หลีกเลี่ยงการบีบปากวัดของเวอร์เนียร์คาลิเปอร์แรงเกินไป เพราะอาจทำให้ขอบจานเพาะเชื้อแตกหักหรือชิ้นงานเสียรูป</li>
            <li>สวมถุงมือยางไนไตรล์ทุกครั้งเมื่อสัมผัสตัวอย่างน้ำธรรมชาติและน้ำเสียจำลอง เพื่อป้องกันการปนเปื้อนของเชื้อก่อโรค</li>
            <li>ล้างมือด้วยสบู่ฆ่าเชื้อและเช็ดแอลกอฮอล์ $70\%$ ทำความสะอาดโต๊ะปฏิบัติการทันทีหลังเสร็จสิ้นการทดลอง</li>
        </ul>
    </div>

    <!-- Bottom Navigation -->
    <nav class="lab-nav">
        <a href="../index.php" class="lab-nav-btn">← <span class="lang-block" lang="th">กลับหน้าหลัก</span><span class="lang-block" lang="en">Home</span><span class="lang-block" lang="zh">返回首页</span></a>
        <a href="lab02_vectors.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ไปปฏิบัติการที่ 2</span><span class="lang-block" lang="en">Lab 2</span><span class="lang-block" lang="zh">实验2</span> →</a>
    </nav>

</div>

<script>
// ============================================================
// 3D Virtual Bench Engine (Three.js PBR Studio)
// ============================================================
let instRenderer, instScene, instCamera, instControls;
let caliperGroup, slideJawMesh, petriGroup;
let benchArStream = null;

function initInstrument3D() {
    const container = document.getElementById('instrument-3d-canvas');
    if (!container) return;

    const w = container.clientWidth || 800;
    const h = container.clientHeight || 380;

    instScene = new THREE.Scene();
    instCamera = new THREE.PerspectiveCamera(45, w / h, 0.1, 100);
    instCamera.position.set(0, 4, 11);

    instRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    instRenderer.setSize(w, h);
    instRenderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    instRenderer.toneMapping = THREE.ACESFilmicToneMapping;
    instRenderer.toneMappingExposure = 1.25;
    container.innerHTML = '';
    container.appendChild(instRenderer.domElement);

    if (typeof THREE.OrbitControls !== 'undefined') {
        instControls = new THREE.OrbitControls(instCamera, instRenderer.domElement);
        instControls.enableDamping = true;
        instControls.dampingFactor = 0.05;
        instControls.maxDistance = 25;
        instControls.minDistance = 2;
    }

    // 3-Point Studio Lights
    const ambLight = new THREE.AmbientLight(0xffffff, 0.85);
    instScene.add(ambLight);

    const keyLight = new THREE.DirectionalLight(0x38bdf8, 2.0);
    keyLight.position.set(10, 15, 10);
    instScene.add(keyLight);

    const rimLight = new THREE.DirectionalLight(0x10b981, 1.4);
    rimLight.position.set(-10, -5, -8);
    instScene.add(rimLight);

    // Bench Grid
    const grid = new THREE.GridHelper(16, 24, 0x10b981, 0x1e293b);
    grid.position.y = -1.2;
    instScene.add(grid);

    // Assembly Group
    caliperGroup = new THREE.Group();

    // High Polish Stainless Steel Material
    const steelMat = new THREE.MeshStandardMaterial({
        color: 0xe2e8f0,
        metalness: 0.88,
        roughness: 0.22
    });

    // Main Beam with Millimeter Marks
    const beamGeom = new THREE.BoxGeometry(9, 0.65, 0.14);
    const mainBeam = new THREE.Mesh(beamGeom, steelMat);
    caliperGroup.add(mainBeam);

    // Fixed Outer & Inner Jaws
    const fixedJawGeom = new THREE.BoxGeometry(0.85, 2.4, 0.16);
    const fixedJaw = new THREE.Mesh(fixedJawGeom, steelMat);
    fixedJaw.position.set(-4.0, -0.85, 0);
    caliperGroup.add(fixedJaw);

    const fixedTopJawGeom = new THREE.BoxGeometry(0.6, 1.0, 0.16);
    const fixedTopJaw = new THREE.Mesh(fixedTopJawGeom, steelMat);
    fixedTopJaw.position.set(-4.0, 0.75, 0);
    caliperGroup.add(fixedTopJaw);

    // Sliding Vernier Frame
    const slideFrameMat = new THREE.MeshStandardMaterial({
        color: 0x38bdf8,
        metalness: 0.75,
        roughness: 0.28
    });
    const slideJawGeom = new THREE.BoxGeometry(0.9, 2.4, 0.18);
    slideJawMesh = new THREE.Mesh(slideJawGeom, slideFrameMat);
    slideJawMesh.position.set(-1.4, -0.85, 0.02);
    caliperGroup.add(slideJawMesh);

    // Borosilicate Glass Petri Dish with Agar & Colonies
    petriGroup = new THREE.Group();
    const glassMat = new THREE.MeshPhysicalMaterial({
        color: 0xffffff,
        metalness: 0.05,
        roughness: 0.04,
        transmission: 0.94,
        transparent: true,
        opacity: 0.88,
        ior: 1.52
    });
    const dishGeom = new THREE.CylinderGeometry(1.3, 1.3, 0.35, 36);
    const petriDish = new THREE.Mesh(dishGeom, glassMat);
    petriDish.rotation.x = Math.PI / 2;
    petriGroup.add(petriDish);

    // Nutrient Agar
    const agarMat = new THREE.MeshStandardMaterial({
        color: 0xf59e0b,
        roughness: 0.45,
        transparent: true,
        opacity: 0.65
    });
    const agarGeom = new THREE.CylinderGeometry(1.24, 1.24, 0.12, 32);
    const agar = new THREE.Mesh(agarGeom, agarMat);
    agar.rotation.x = Math.PI / 2;
    petriGroup.add(agar);

    // Glowing Bacterial Colony Dots
    const colonyMat = new THREE.MeshStandardMaterial({
        color: 0x10b981,
        emissive: 0x34d399,
        emissiveIntensity: 0.6
    });
    const colCoords = [[0.3, 0.4], [-0.5, 0.2], [0.2, -0.5], [-0.3, -0.4], [0.6, -0.2]];
    colCoords.forEach(([cx, cy]) => {
        const dot = new THREE.Mesh(new THREE.SphereGeometry(0.08, 12, 12), colonyMat);
        dot.position.set(cx, cy, 0.08);
        petriGroup.add(dot);
    });

    petriGroup.position.set(-2.7, -0.85, 0);
    caliperGroup.add(petriGroup);

    instScene.add(caliperGroup);

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        caliperGroup.rotation.y += 0.002;
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
        instCamera.position.set(0, 4, 11);
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
        btn.className = "px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2";
    });

    if (mode === '3d') {
        btn3d.className = "px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-2";
        stopBenchAr();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        simOverlay.classList.add('hidden');
        instScene.background = null;
    } else if (mode === 'ar') {
        btnAr.className = "px-4 py-2 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-md transition flex items-center gap-2";
        startBenchAr();
        reticle.classList.remove('hidden');
        reticle.classList.add('flex');
        simOverlay.classList.add('hidden');
    } else if (mode === 'sim') {
        btnSim.className = "px-4 py-2 rounded-xl text-xs font-bold bg-purple-500 text-white shadow-md transition flex items-center gap-2";
        stopBenchAr();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        simOverlay.classList.remove('hidden');
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

// Precision Caliper Mechanics
function updateCaliperSlide(val) {
    const mm = parseFloat(val);
    const mainScale = Math.floor(mm);
    const fraction = mm - mainScale;
    const vernierLine = Math.round(fraction / 0.05);

    document.getElementById('liveReadingDisplay').textContent = `${mm.toFixed(2)} mm`;
    document.getElementById('sliderFormula').innerHTML = `สเกลหลัก <span class="text-white font-bold">${mainScale} mm</span> + สเกลเวอร์เนียร์ ขีดที่ ${vernierLine} (<span class="text-sky-300 font-bold">${fraction.toFixed(2)} mm</span>) = <span class="text-emerald-400 font-bold">${mm.toFixed(2)} mm</span>`;

    if (slideJawMesh) {
        const xOffset = -4.0 + (mm / 150) * 4.5;
        slideJawMesh.position.x = xOffset;
    }
}

function setSpecimen(sizeMm, name) {
    document.getElementById('caliperSlider').value = sizeMm;
    updateCaliperSlide(sizeMm);
}

document.addEventListener('DOMContentLoaded', () => {
    initInstrument3D();
});
</script>

<?php include '../includes/footer.php'; ?>
