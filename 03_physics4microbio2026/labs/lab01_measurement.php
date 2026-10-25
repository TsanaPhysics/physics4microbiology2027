<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดความแม่นยำสูง ไมโครมิเตอร์ และการสอบเทียบไมโครปิเปต | Lab 1: Precision Metrology, Micrometer & Micropipette Calibration';
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
                    การวัดความแม่นยำสูง ไมโครมิเตอร์ และการสอบเทียบไมโครปิเปต
                </h1>
                <div class="text-sm font-medium text-emerald-300/90 mt-1">
                    Precision Metrology: Vernier Caliper, 0.01 mm Micrometer &amp; ISO 8655 Gravimetric Micropipette Calibration
                </div>
                <div class="flex flex-wrap gap-2 mt-3 text-xs">
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-emerald-300 border border-emerald-500/30">
                        🇹🇭 การวัดความยาว เครื่องมือละเอียด ไมโครมิเตอร์ และไมโครปิเปต
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-sky-300 border border-sky-500/30">
                        🇬🇧 Vernier Mechanics, Screw Micrometer &amp; ISO 8655 Pipette
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-amber-300 border border-amber-500/30">
                        🇨🇳 精密测量、游标卡尺、千分尺与微量移液器重量校准
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

    <!-- 3D Virtual Bench & Multi-Instrument Laboratory Suite Card -->
    <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-4">
        
        <!-- Header & Controls -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-white/10 pb-4">
            <div>
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-atom text-emerald-400 text-xl"></i>
                    โต๊ะปฏิบัติการเสมือนจริง 3 มิติ (3D Virtual Bench &amp; Telemetry)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    จำลองเครื่องมือวัดฟิสิกส์สำหรับจุลชีววิทยา 3 ชนิด: เวอร์เนียร์คาลิเปอร์, ไมโครมิเตอร์สกรูเกจ (0.01 mm), และไมโครปิเปต P1000 พร้อมเครื่องชั่งวิเคราะห์
                </p>
            </div>

            <!-- Active Instrument Selector Buttons -->
            <div class="flex flex-wrap items-center gap-1.5 bg-slate-950/90 p-1.5 rounded-2xl border border-white/10">
                <button id="tabInstCaliper" onclick="selectInstrument('caliper')" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-1.5">
                    <i class="fa-solid fa-ruler-horizontal"></i> 1. เวอร์เนียร์ (0.05 mm)
                </button>
                <button id="tabInstMicrometer" onclick="selectInstrument('micrometer')" class="px-3 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-notch"></i> 2. ไมโครมิเตอร์ (0.01 mm)
                </button>
                <button id="tabInstPipette" onclick="selectInstrument('pipette')" class="px-3 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5">
                    <i class="fa-solid fa-eye-dropper"></i> 3. ไมโครปิเปต P1000
                </button>
            </div>
        </div>

        <!-- Mode Switcher Toolbar -->
        <div class="flex flex-wrap items-center justify-between gap-2 pt-1">
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
            <a href="../simulations/sim_vernier_caliper_3d.html" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 ml-auto" title="เปิดหน้าต่างจำลอง 3 มิติเต็มรูปแบบ พร้อมแว่นขยายและโหมดทดสอบความรู้">
                <i class="fa-solid fa-expand"></i> 3D Caliper Fullscreen (Loupe &amp; Quiz) ↗
            </a>
        </div>

        <!-- 3D Scene Viewport (Unobstructed View) -->
        <div id="bench3dWrapper" class="relative w-full h-[380px] sm:h-[420px] bg-slate-950 rounded-2xl overflow-hidden border border-white/10 shadow-inner">
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
                    ส่องกล้องไปยังภาพเครื่องมือในตำราเรียนเพื่อจำลองโมเดล 3 มิติเสมือนจริง
                </p>
            </div>

            <!-- Viewport Info Pill -->
            <div id="viewportHudPill" class="absolute top-3 left-3 bg-slate-950/85 backdrop-blur-md px-3.5 py-2 rounded-xl border border-white/10 text-xs pointer-events-none space-y-0.5">
                <div id="hudInstrumentTitle" class="text-sky-300 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-compass text-emerald-400"></i> PBR Vernier Caliper (0.05 mm)
                </div>
                <div id="hudInstrumentMeta" class="text-slate-400 text-[10px] font-mono">
                    ความละเอียดสเกล: 0.05 mm • หมุนสำรวจอิสระ 360°
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------------- -->
        <!-- Telemetry Control Panel 1: VERNIER CALIPER (0.05 mm) -->
        <!-- ------------------------------------------------------------------- -->
        <div id="panelCaliper" class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/30 space-y-4">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-white/5 pb-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-emerald-400 font-mono">🎯 เลือกวัตถุทดสอบมาตรฐาน:</span>
                    <button onclick="setCaliperSpecimen(90.00, 'จานเพาะเชื้อ (Petri Dish)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">จานเพาะเชื้อ (90.00 mm)</button>
                    <button onclick="setCaliperSpecimen(2.45, 'โคโลนีแบคทีเรีย (Colony)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">โคโลนี (2.45 mm)</button>
                    <button onclick="setCaliperSpecimen(12.50, 'คิวเวตต์วัดความขุ่น (Cuvette)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">คิวเวตต์ (12.50 mm)</button>
                </div>
                <div class="text-left sm:text-right">
                    <span class="text-[11px] text-slate-400">ค่าวัดสุทธิ (Total Measurement):</span>
                    <div id="caliperReadingDisplay" class="text-2xl font-mono font-bold text-emerald-300">88.60 mm</div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex flex-col sm:flex-row justify-between text-xs font-mono text-slate-300 gap-1">
                    <span>เลื่อนปากวัดเวอร์เนียร์ (Slider):</span>
                    <span id="caliperFormula" class="text-emerald-400 font-bold">สเกลหลัก 88 mm + สเกลเวอร์เนียร์ (12 × 0.05 mm) = 88.60 mm</span>
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

        <!-- ------------------------------------------------------------------- -->
        <!-- Telemetry Control Panel 2: MICROMETER SCREW GAUGE (0.01 mm) -->
        <!-- ------------------------------------------------------------------- -->
        <div id="panelMicrometer" class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/30 space-y-4 hidden">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-white/5 pb-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-sky-400 font-mono">🎯 เลือกวัตถุทดสอบไมโครมิเตอร์:</span>
                    <button onclick="setMicrometerSpecimen(1.15, 'สไลด์แก้ว (Glass Slide)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">สไลด์แก้ว (1.15 mm)</button>
                    <button onclick="setMicrometerSpecimen(1.42, 'ขอบจานเพาะเชื้อ (Petri Wall)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">ขอบจานเพาะเชื้อ (1.42 mm)</button>
                    <button onclick="setMicrometerSpecimen(0.65, 'ลวดเขี่ยเชื้อ (Inoculation Wire)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">ลวดเขี่ยเชื้อ (0.65 mm)</button>
                    <button onclick="setMicrometerSpecimen(0.08, 'เส้นผมมนุษย์ (Human Hair)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">เส้นผม (0.08 mm)</button>
                </div>
                <div class="text-left sm:text-right">
                    <span class="text-[11px] text-slate-400">ค่าวัดไมโครมิเตอร์สุทธิ ($0.01\text{ mm}$):</span>
                    <div id="microReadingDisplay" class="text-2xl font-mono font-bold text-sky-300">6.82 mm</div>
                </div>
            </div>

            <!-- Zero Error Selector -->
            <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/80 p-3 rounded-xl border border-white/5">
                <div class="flex items-center gap-2 text-xs">
                    <span class="text-amber-400 font-bold font-mono">⚙️ การตรวจสอบค่าความคลาดเคลื่อนศูนย์ (Zero Error):</span>
                    <select id="microZeroErrorSelect" onchange="updateMicroZeroError(this.value)" class="bg-slate-950 text-sky-300 text-xs font-mono rounded-lg px-2.5 py-1 border border-white/10 focus:outline-none focus:border-sky-400">
                        <option value="0.00">ไม่มี Zero Error (0.00 mm) - สมบูรณ์</option>
                        <option value="0.02">Positive Zero Error (+0.02 mm) - ลบออก 0.02</option>
                        <option value="-0.01">Negative Zero Error (-0.01 mm) - บวกเพิ่ม 0.01</option>
                    </select>
                </div>
                <div id="microCorrectedDisplay" class="text-xs font-mono text-emerald-400 font-bold">
                    ค่าวัดจริงหลังปรับศูนย์ ($x_{\text{corrected}}$): 6.82 mm
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex flex-col sm:flex-row justify-between text-xs font-mono text-slate-300 gap-1">
                    <span>หมุนปลอก Thimble สกรูเกจ ($0.00 - 25.00\text{ mm}$):</span>
                    <span id="microFormula" class="text-sky-300 font-bold">สเกลหลักบน Sleeve 6.50 mm + สเกลหมุน Thimble (32 × 0.01 mm) = 6.82 mm</span>
                </div>
                <input type="range" id="micrometerSlider" min="0" max="25" step="0.01" value="6.82" oninput="updateMicrometerSlide(this.value)" class="w-full h-2.5 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-sky-400">
                <div class="flex justify-between text-[10px] font-mono text-slate-500">
                    <span>0.00 mm (ปิดสนิท)</span>
                    <span>5.00 mm</span>
                    <span>10.00 mm</span>
                    <span>15.00 mm</span>
                    <span>20.00 mm</span>
                    <span>25.00 mm (เปิดสุด)</span>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------------- -->
        <!-- Telemetry Control Panel 3: MICROPIPETTE P1000 & BALANCE (ISO 8655) -->
        <!-- ------------------------------------------------------------------- -->
        <div id="panelPipette" class="p-5 rounded-2xl bg-slate-950/80 border border-purple-500/30 space-y-4 hidden">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-white/5 pb-3">
                <div class="space-y-1">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs font-bold text-purple-400 font-mono">🧪 เลือกระดับปริมาตรสอบเทียบ ISO 8655:</span>
                        <button onclick="setPipetteVolume(100)" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">100 µL (10% Nominal)</button>
                        <button onclick="setPipetteVolume(500)" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">500 µL (50% Nominal)</button>
                        <button onclick="setPipetteVolume(1000)" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">1000 µL (100% Nominal)</button>
                    </div>
                    <div class="text-[11px] text-slate-400">
                        ช่วงการใช้งาน: P1000 (100 - 1000 µL) • ทิปสีฟ้า (Blue Tip) • อุณหภูมิทดสอบ $22^\circ\text{C}$ ($Z = 1.0033\ \mu\text{L}/\text{mg}$)
                    </div>
                </div>

                <!-- Digital Volumeter Display on Pipette -->
                <div class="flex items-center gap-3 bg-slate-900 p-3 rounded-2xl border border-purple-500/40">
                    <div class="text-[10px] text-slate-400 font-mono text-right">
                        <div>DIGITAL COUNTER</div>
                        <div class="text-purple-300 font-bold">VOLUMETER</div>
                    </div>
                    <div id="pipetteCounterBox" class="flex gap-1 bg-slate-950 px-3 py-1.5 rounded-xl border border-white/15 font-mono text-xl font-bold tracking-widest text-white shadow-inner">
                        <span id="pipDigit1" class="text-rose-400">1</span>
                        <span id="pipDigit2" class="text-white">0</span>
                        <span id="pipDigit3" class="text-white">0</span>
                    </div>
                    <div class="text-xs font-bold font-mono text-purple-300">µL</div>
                </div>
            </div>

            <!-- Volume Slider & Operation Controls -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                <div class="lg:col-span-7 space-y-2">
                    <div class="flex justify-between text-xs font-mono text-slate-300">
                        <span>หมุนปรับปริมาตรไมโครปิเปต (Micropipette Volume Dial):</span>
                        <span id="pipetteVolLabel" class="text-purple-400 font-bold">1000 µL</span>
                    </div>
                    <input type="range" id="pipetteSlider" min="100" max="1000" step="5" value="1000" oninput="updatePipetteSlide(this.value)" class="w-full h-2.5 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-purple-400">
                    <div class="flex justify-between text-[10px] font-mono text-slate-500">
                        <span>100 µL</span>
                        <span>250 µL</span>
                        <span>500 µL</span>
                        <span>750 µL</span>
                        <span>1000 µL</span>
                    </div>
                </div>

                <!-- 4-Digit Balance Simulation & Dispense Buttons -->
                <div class="lg:col-span-5 bg-slate-900/90 p-3.5 rounded-2xl border border-white/10 space-y-2.5">
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-slate-400 font-mono">⚖️ เครื่องชั่งดิจิทัล 4 ตำแหน่ง (Analytical Balance):</span>
                        <button onclick="tareBalance()" class="px-2 py-0.5 rounded-md bg-slate-800 hover:bg-slate-700 text-[10px] text-amber-300 font-mono border border-white/10">TARE (0.0000 g)</button>
                    </div>
                    <div class="flex items-center justify-between bg-slate-950 p-2.5 rounded-xl border border-emerald-500/30">
                        <span class="text-[10px] font-mono text-emerald-500 font-bold animate-pulse">● STABLE</span>
                        <div id="balanceMassDisplay" class="text-2xl font-mono font-bold text-emerald-400 tracking-wider">0.0000 g</div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 pt-1">
                        <button id="btnAspirate" onclick="aspiratePipette()" class="px-3 py-2 rounded-xl text-xs font-bold bg-sky-600 hover:bg-sky-500 text-white shadow-md transition flex items-center justify-center gap-1.5">
                            <i class="fa-solid fa-arrow-up"></i> 1. ดูดน้ำกลั่น DI
                        </button>
                        <button id="btnDispense" onclick="dispenseAndWeigh()" class="px-3 py-2 rounded-xl text-xs font-bold bg-purple-600 hover:bg-purple-500 text-white shadow-md transition flex items-center justify-center gap-1.5">
                            <i class="fa-solid fa-arrow-down"></i> 2. ปล่อยสาร &amp; ชั่ง
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gravimetric Real-Time Live Analytics -->
            <div id="pipetteResultBox" class="p-3.5 rounded-xl bg-slate-900/60 border border-purple-500/20 grid grid-cols-2 sm:grid-cols-4 gap-3 text-center text-xs font-mono">
                <div>
                    <div class="text-slate-400 text-[10px]">ปริมาตรเป้าหมาย ($V_0$)</div>
                    <div id="statNominalVol" class="text-white font-bold mt-0.5">1000 µL</div>
                </div>
                <div>
                    <div class="text-slate-400 text-[10px]">ปริมาตรจริง ($V_{\text{actual}} = m \cdot Z$)</div>
                    <div id="statActualVol" class="text-emerald-400 font-bold mt-0.5">--- µL</div>
                </div>
                <div>
                    <div class="text-slate-400 text-[10px]">ความคลาดเคลื่อนระบบ ($E\%$)</div>
                    <div id="statSysError" class="text-sky-300 font-bold mt-0.5">--- %</div>
                </div>
                <div>
                    <div class="text-slate-400 text-[10px]">เกณฑ์ ISO 8655 (&le;&plusmn;0.8%)</div>
                    <div id="statIsoStatus" class="text-slate-400 font-bold mt-0.5">รอการชั่ง</div>
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
                    <span>ฝึกทักษะการใช้และอ่านค่าเครื่องมือวัดความแม่นยำสูง ได้แก่ ไม้บรรทัดเหล็ก, เวอร์เนียร์คาลิเปอร์ ($0.05\text{ mm}$), และไมโครมิเตอร์สกรูเกจ ($0.01\text{ mm}$) ได้อย่างถูกต้องตามหลักวิศวกรรมฟิสิกส์</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>เรียนรู้วิธีตรวจสอบและชดเชยค่าความคลาดเคลื่อนศูนย์ (Zero Error: Positive / Negative Zero Bias) ของไมโครมิเตอร์ก่อนทำการวัดจริง</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>ฝึกปฏิบัติการใช้งานไมโครปิเปต P1000 และทำการสอบเทียบความแม่นยำ (Micropipette Calibration) ด้วยวิธีชั่งน้ำหนัก (Gravimetric Method) ตามมาตรฐานสากล ISO 8655-6</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>คำนวณและประเมินค่าความคลาดเคลื่อนเป็นระบบ (Systematic Error / Inaccuracy, $E\%$) และความคลาดเคลื่อนสุ่ม (Random Error / Imprecision, $\text{CV}\%$)</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>รายงานผลการวัดพร้อมเลขนัยสำคัญ (Significant Figures) และค่าความไม่แน่นอน ($\pm \Delta x$) ตามมาตรฐานสากล IUPAC/ISO</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-emerald-400 mt-0.5">•</span>
                    <span>วัดและวิเคราะห์ขนาดเส้นผ่านศูนย์กลางโคโลนีจุลินทรีย์บนจานเพาะเชื้อ และวัดค่าความขุ่น (Turbidity: NTU) ของตัวอย่างน้ำธรรมชาติและน้ำเสีย</span>
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
                การวัดทางฟิสิกส์สำหรับจุลชีววิทยาเป็นหัวใจสำคัญของการวิเคราะห์เชิงปริมาณ ในงานเพาะเลี้ยงเชื้อและการทดสอบทางชีวโมเลกุล เครื่องมือวัดแต่ละชนิดมีขีดจำกัดความละเอียด (Resolution) และความไม่แน่นอน (Uncertainty) ประจำตัว การเลือกใช้เครื่องมือที่เหมาะสม ตั้งแต่เวอร์เนียร์คาลิเปอร์สำหรับวัดขนาดภาชนะและโคโลนี ไมโครมิเตอร์สำหรับวัดความหนาของแผ่นสไลด์และฟิล์มเซลล์ จนถึงไมโครปิเปตสำหรับตวงปริมาตรระดับไมโครลิตร จะต้องได้รับการสอบเทียบ (Calibration) และรายงานผลตามหลักสถิติและเลขนัยสำคัญเสมอ
            </p>

            <!-- Three Metrology Pillar Cards (Vernier, Micrometer, Micropipette) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-5 rounded-2xl bg-slate-950/70 border border-emerald-500/30 space-y-2">
                    <div class="text-xs font-bold text-emerald-300 flex items-center gap-2">
                        📏 1. เวอร์เนียร์คาลิเปอร์ ($0.05\text{ mm}$)
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        อาศัยหลักผลต่างระหว่างช่องสเกลหลัก ($1\text{ mm}$) กับช่องสเกลเวอร์เนียร์ ($0.95\text{ mm}$) โดยสเกลเวอร์เนียร์ 20 ช่องมีระยะรวม $19\text{ mm}$ ความละเอียดจึงเท่ากับ $1.00 - 0.95 = 0.05\text{ mm}$
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-950/70 border border-sky-500/30 space-y-2">
                    <div class="text-xs font-bold text-sky-300 flex items-center gap-2">
                        ⚙️ 2. ไมโครมิเตอร์สกรูเกจ ($0.01\text{ mm}$)
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        อาศัยกลไกพิตช์เกลียวละเอียด (Screw Pitch $0.5\text{ mm}$) เมื่อหมุนปลอก Thimble 1 รอบ แกนวัด Spindle เคลื่อนที่ $0.5\text{ mm}$ ปลอกหมุนแบ่ง 50 ขีด ขีดละ $\frac{0.5}{50} = 0.01\text{ mm}$ พร้อมหมุน Ratchet 2-3 คลิกเพื่อควบคุมแรงกดคงที่
                    </p>
                </div>

                <div class="p-5 rounded-2xl bg-slate-950/70 border border-purple-500/30 space-y-2">
                    <div class="text-xs font-bold text-purple-300 flex items-center gap-2">
                        🧪 3. การสอบเทียบไมโครปิเปต (ISO 8655)
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ใช้วิธีชั่งน้ำหนักน้ำกลั่นบริสุทธิ์ (Gravimetric Method) ด้วยเครื่องชั่ง 4 ตำแหน่ง ($0.0001\text{ g}$) แปลงมวลเป็นปริมาตรด้วย $Z$-factor ที่อุณหภูมิทดสอบ ($V = m \times Z$) เพื่อหาความถูกต้อง $E\%$ และความเที่ยงตรง $\text{CV}\%$
                    </p>
                </div>
            </div>

            <!-- Zero Error & Correction Equation Box -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-amber-500/30 space-y-3">
                <div class="flex items-center gap-2">
                    <span class="text-amber-400 font-bold text-sm">⚠️ การปรับแก้ค่าความคลาดเคลื่อนศูนย์ของไมโครมิเตอร์ (Zero Error Correction)</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                    <div class="p-3 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                        <strong class="text-amber-300">ความคลาดเคลื่อนศูนย์แบบบวก (Positive Zero Error):</strong>
                        <p class="m-0 leading-relaxed">เมื่อปิดปากวัดสนิท ขีดศูนย์บน Thimble อยู่ต่ำกว่าเส้นแกน Sleeve ค่าที่อ่านได้จริงจะเกิน ต้องนำมา <strong class="text-white">"ลบออก"</strong></p>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                        <strong class="text-amber-300">ความคลาดเคลื่อนศูนย์แบบลบ (Negative Zero Error):</strong>
                        <p class="m-0 leading-relaxed">เมื่อปิดปากวัดสนิท ขีดศูนย์บน Thimble อยู่สูงกว่าเส้นแกน Sleeve ค่าที่อ่านได้จริงจะขาด ต้องนำมา <strong class="text-white">"บวกเพิ่ม"</strong></p>
                    </div>
                </div>
                <div class="text-center font-mono text-xs text-amber-300 bg-slate-950 py-2 rounded-xl border border-white/10">
                    $$x_{\text{corrected}} = x_{\text{measured}} - (\text{Zero Error})$$
                </div>
            </div>

            <!-- Gaussian Uncertainty Chart -->
            <div class="p-5 rounded-2xl bg-slate-950/90 border border-emerald-500/30 space-y-3">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-chart-area text-emerald-400 text-lg"></i>
                    <h3 class="text-sm font-bold text-white">ฟังก์ชันการแจกแจงความน่าจะเป็นของความคลาดเคลื่อน (Gaussian Uncertainty Distribution)</h3>
                </div>
                <div class="rounded-xl overflow-hidden border border-white/10 bg-slate-950 p-2">
                    <img src="../images/ch01/gaussian_uncertainty_chart.svg" alt="Gaussian Uncertainty Distribution Curve" class="w-full h-auto rounded-lg">
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    รูปแสดงฟังก์ชันความหนาแน่นความน่าจะเป็นแบบเกาส์เซียนของการวัดซ้ำ ($\mu = 9.00\text{ cm}, \sigma = 0.04\text{ cm}$) ครอบคลุมช่วงความเชื่อมั่น $\pm 1\sigma$ ($68.3\%$) และ $\pm 2\sigma$ ($95.4\%$)
                </p>
            </div>

            <!-- ISO 8655 Gravimetric Equations Grid (2-Column Responsive Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-emerald-500/30 text-center space-y-1">
                    <div class="text-xs text-slate-400 font-mono">ความคลาดเคลื่อนเป็นระบบ (Systematic Error / Inaccuracy, $E\%$)</div>
                    <div class="text-sm font-mono text-emerald-400 font-bold overflow-x-auto py-1">
                        $$E\% = \left(\frac{\bar{V} - V_0}{V_0}\right) \times 100\%$$
                    </div>
                    <div class="text-[10px] text-slate-400">เกณฑ์ ISO 8655 สำหรับ P1000 ที่ 1000 µL: $\le \pm 0.8\%$</div>
                </div>
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-purple-500/30 text-center space-y-1">
                    <div class="text-xs text-slate-400 font-mono">ความคลาดเคลื่อนสุ่ม (Random Error / Imprecision, $\text{CV}\%$)</div>
                    <div class="text-sm font-mono text-purple-400 font-bold overflow-x-auto py-1">
                        $$\text{CV}\% = \left(\frac{s}{\bar{V}}\right) \times 100\%$$
                    </div>
                    <div class="text-[10px] text-slate-400">เกณฑ์ ISO 8655 สำหรับ P1000 ที่ 1000 µL: $\le 0.3\%$</div>
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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">📏</span> ไม้บรรทัดเหล็ก 30 cm (1 mm)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🔧</span> เวอร์เนียร์คาลิเปอร์ (0.05 mm)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">⚙️</span> ไมโครมิเตอร์สกรูเกจ (0.01 mm)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🧪</span> ไมโครปิเปต P1000 (100-1000 µL)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🔵</span> ทิปสีฟ้าสำหรับ P1000 (Blue Tips)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">⚖️</span> เครื่องชั่งวิเคราะห์ 4 ตำแหน่ง (0.0001 g)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">💧</span> น้ำปราศจากไอออน (DI Water)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🌡️</span> เทอร์โมมิเตอร์วัดอุณหภูมิน้ำ (0.1 °C)
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🧫</span> จานเพาะเชื้อพร้อมโคโลนีจุลินทรีย์
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🔬</span> สไลด์แก้วและกล้องสเตอริโอ
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🧪</span> หลอดทดลองและคิวเวตต์แก้ว
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 flex items-center gap-2 text-xs text-slate-300">
                    <span class="text-lg">🌊</span> Turbidimeter วัดความขุ่น (NTU)
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

            <!-- Part 1 -->
            <h3 class="text-sm font-bold text-white border-b border-white/10 pb-2">
                ตอนที่ 1: การวัดมิติความแม่นยำสูงด้วยเวอร์เนียร์คาลิเปอร์และไมโครมิเตอร์
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
                        ตรวจสอบค่าศูนย์ (Zero Error) ของไมโครมิเตอร์โดยหมุนปลอก Ratchet Stop เบาๆ จนกระทั่งปากวัด Anvil และ Spindle สัมผัสกันสนิท สังเกตว่าขีดเลข 0 บน Thimble ตรงกับเส้นแกนหลักบน Sleeve หรือไม่ บันทึกค่า Zero Error
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-emerald-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 2
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        ใช้ไม้บรรทัดเหล็กและเวอร์เนียร์คาลิเปอร์วัดเส้นผ่านศูนย์กลางภายนอกของจานเพาะเชื้อ และเส้นผ่านศูนย์กลางภายในของปากหลอดทดลอง ทำซ้ำจุดละ 3 ครั้งเพื่อหาค่าเฉลี่ย
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-emerald-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 3
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        ใช้ไมโครมิเตอร์สกรูเกจวัดความหนาของแผ่นสไลด์แก้วกล้องจุลทรรศน์ และความหนาของขอบจานเพาะเชื้อพลาสติก โดยหมุน Ratchet จนได้ยินเสียงคลิก 2-3 ครั้ง บันทึกค่าวัดและคำนวณค่าจริงหลังชดเชย Zero Correction
                    </p>
                </div>
            </div>

            <!-- Part 2 -->
            <h3 class="text-sm font-bold text-white border-b border-white/10 pb-2 pt-4">
                ตอนที่ 2: การสอบเทียบความแม่นยำของไมโครปิเปต P1000 ตามมาตรฐาน ISO 8655 (Gravimetric Method)
            </h3>

            <!-- Part 2 Steps -->
            <div class="space-y-4 pt-2">
                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-purple-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-purple-500 to-indigo-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 1
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        วัดและบันทึกอุณหภูมิของน้ำกลั่นบริสุทธิ์ (DI Water) ในบีกเกอร์ เพื่อกำหนดค่าสัมประสิทธิ์การแปลงมวล $Z$-factor (ที่ $22^\circ\text{C}$ ได้ค่า $Z = 1.0033\ \mu\text{L}/\text{mg}$)
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-purple-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-purple-500 to-indigo-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 2
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        วางบีกเกอร์ขนาดเล็กหรือหลอดไมโครเซนตริฟิวจ์บนจานเครื่องชั่งวิเคราะห์ 4 ตำแหน่ง ปิดประตูกระจกกันลม แล้วกด Tare ให้หน้าปัดแสดง $0.0000\text{ g}$
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-purple-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-purple-500 to-indigo-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 3
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        ตั้งค่าปริมาตรไมโครปิเปต P1000 ที่ 3 ระดับตามเกณฑ์ ISO 8655: $100\ \mu\text{L}$ (10% Nominal), $500\ \mu\text{L}$ (50% Nominal), และ $1000\ \mu\text{L}$ (100% Nominal) สวมทิปสีฟ้าและทำการ Pre-wetting 1 ครั้ง
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-purple-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-purple-500 to-indigo-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 4
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        ดูดจ่ายน้ำกลั่นลงในภาชนะบนเครื่องชั่ง บันทึกค่าน้ำหนัก ($m_1$ ถึง $m_5$) จำนวน 5 ซ้ำต่อหนึ่งระดับปริมาตร แล้วคำนวณปริมาตรเฉลี่ย $\bar{V}$, ความคลาดเคลื่อน $E\%$ และ $\text{CV}\%$ เทียบเกณฑ์มาตรฐาน
                    </p>
                </div>
            </div>

            <!-- Part 3 -->
            <h3 class="text-sm font-bold text-white border-b border-white/10 pb-2 pt-4">
                ตอนที่ 3: การวัดขนาดโคโลนีจุลินทรีย์และความขุ่นของตัวอย่างน้ำ
            </h3>

            <!-- Part 3 Steps -->
            <div class="space-y-4 pt-2">
                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-sky-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-sky-500 to-blue-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 1
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        นำจานเพาะเชื้อที่มีโคโลนีเดี่ยวของแบคทีเรียมาวางใต้กล้องสเตอริโอ ใช้เวอร์เนียร์คาลิเปอร์วัดเส้นผ่านศูนย์กลางโคโลนีจำนวน 5 โคโลนี บันทึกค่าพร้อมเลขนัยสำคัญ
                    </p>
                </div>

                <div class="p-5 pt-6 rounded-2xl bg-slate-950/70 border-l-4 border-sky-400 border border-white/5 relative">
                    <span class="absolute -top-3 left-4 bg-gradient-to-r from-sky-500 to-blue-500 text-slate-950 font-bold font-mono text-[11px] px-3 py-0.5 rounded-full shadow-md">
                        ขั้นตอนที่ 2
                    </span>
                    <p class="text-sm text-slate-300 m-0 leading-relaxed">
                        เติมตัวอย่างน้ำ 4 แหล่ง (น้ำประปาแล็บ, น้ำฝน, น้ำคลอง, น้ำเสียจำลอง) ลงในหลอดคิวเวตต์ เช็ดผิวกระจกให้แห้งสนิท ใส่ในช่องวัดของ Turbidimeter แล้วบันทึกค่า NTU
                    </p>
                </div>
            </div>
        </div>

        <!-- Data Tables Section (Updated & Expanded for Micrometer & Micropipette) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-lg font-bold text-sky-400 flex items-center gap-2">
                📊 <span class="lang-block" lang="th">ตารางบันทึกผลการทดลอง</span>
                <span class="lang-block" lang="en">Data Tables</span>
                <span class="lang-block" lang="zh">实验数据记录表</span>
            </h2>

            <!-- Table 1.1: Mechanical Dimensions -->
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-xs font-bold text-emerald-400 font-mono">
                        ตารางที่ 1.1: การวัดมิติตัวอย่างละเอียดเปรียบเทียบเครื่องมือ 3 ชนิด (ไม้บรรทัด, เวอร์เนียร์, ไมโครมิเตอร์)
                    </h3>
                    <span class="text-[11px] text-slate-400">Zero Error ไมโครมิเตอร์ = <span class="text-amber-400 font-mono font-bold">+0.00 mm</span></span>
                </div>
                <div class="overflow-x-auto rounded-2xl border border-white/10">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left">ชิ้นงานตัวอย่าง</th>
                                <th class="p-3">เครื่องมือวัด</th>
                                <th class="p-3">ความละเอียด</th>
                                <th class="p-3">ครั้งที่ 1 (mm)</th>
                                <th class="p-3">ครั้งที่ 2 (mm)</th>
                                <th class="p-3">ครั้งที่ 3 (mm)</th>
                                <th class="p-3">ค่าเฉลี่ย $\bar{x}$ (mm)</th>
                                <th class="p-3">รายงานผล ($x \pm \Delta x$)</th>
                                <th class="p-3">เลขนัยสำคัญ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300">
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white">เส้นผ่านศูนย์กลางนอกจานเพาะเชื้อ</td>
                                <td class="p-3">ไม้บรรทัดเหล็ก</td>
                                <td class="p-3">1.0 mm</td>
                                <td class="p-3 font-mono text-emerald-400">90.0</td>
                                <td class="p-3 font-mono text-emerald-400">89.5</td>
                                <td class="p-3 font-mono text-emerald-400">90.5</td>
                                <td class="p-3 font-mono font-bold text-white">90.0</td>
                                <td class="p-3 font-mono text-slate-300">$90.0 \pm 0.5$</td>
                                <td class="p-3 font-mono font-bold text-sky-400">3 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white">เส้นผ่านศูนย์กลางนอกจานเพาะเชื้อ</td>
                                <td class="p-3">เวอร์เนียร์คาลิเปอร์</td>
                                <td class="p-3">0.05 mm</td>
                                <td class="p-3 font-mono text-emerald-400">90.15</td>
                                <td class="p-3 font-mono text-emerald-400">90.10</td>
                                <td class="p-3 font-mono text-emerald-400">90.20</td>
                                <td class="p-3 font-mono font-bold text-white">90.15</td>
                                <td class="p-3 font-mono text-slate-300">$90.15 \pm 0.05$</td>
                                <td class="p-3 font-mono font-bold text-sky-400">4 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white">เส้นผ่านศูนย์กลางในปากหลอดทดลอง</td>
                                <td class="p-3">เวอร์เนียร์คาลิเปอร์</td>
                                <td class="p-3">0.05 mm</td>
                                <td class="p-3 font-mono text-emerald-400">14.85</td>
                                <td class="p-3 font-mono text-emerald-400">14.90</td>
                                <td class="p-3 font-mono text-emerald-400">14.85</td>
                                <td class="p-3 font-mono font-bold text-white">14.87</td>
                                <td class="p-3 font-mono text-slate-300">$14.87 \pm 0.05$</td>
                                <td class="p-3 font-mono font-bold text-sky-400">4 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white">ความหนาของแผ่นสไลด์แก้ว</td>
                                <td class="p-3 text-sky-300 font-bold">ไมโครมิเตอร์</td>
                                <td class="p-3 text-sky-300">0.01 mm</td>
                                <td class="p-3 font-mono text-sky-400">1.15</td>
                                <td class="p-3 font-mono text-sky-400">1.14</td>
                                <td class="p-3 font-mono text-sky-400">1.15</td>
                                <td class="p-3 font-mono font-bold text-white">1.15</td>
                                <td class="p-3 font-mono text-slate-300">$1.15 \pm 0.01$</td>
                                <td class="p-3 font-mono font-bold text-sky-400">3 ตัว</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white">ความหนาของขอบจานเพาะเชื้อ</td>
                                <td class="p-3 text-sky-300 font-bold">ไมโครมิเตอร์</td>
                                <td class="p-3 text-sky-300">0.01 mm</td>
                                <td class="p-3 font-mono text-sky-400">1.42</td>
                                <td class="p-3 font-mono text-sky-400">1.43</td>
                                <td class="p-3 font-mono text-sky-400">1.42</td>
                                <td class="p-3 font-mono font-bold text-white">1.42</td>
                                <td class="p-3 font-mono text-slate-300">$1.42 \pm 0.01$</td>
                                <td class="p-3 font-mono font-bold text-sky-400">3 ตัว</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 1.2: Micropipette Gravimetric Calibration (ISO 8655) -->
            <div class="space-y-3 pt-2">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-xs font-bold text-purple-400 font-mono">
                        ตารางที่ 1.2: การสอบเทียบไมโครปิเปต P1000 ด้วยวิธีชั่งน้ำหนัก (ISO 8655 Gravimetric Calibration)
                    </h3>
                    <span class="text-[11px] text-slate-400">อุณหภูมิน้ำ $T = 22.0^\circ\text{C}$ • สัมประสิทธิ์ $Z = 1.0033\ \mu\text{L}/\text{mg}$</span>
                </div>
                <div class="overflow-x-auto rounded-2xl border border-white/10">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-purple-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left">ปริมาตรตั้งค่า $V_0$</th>
                                <th class="p-3">$m_1$ (mg)</th>
                                <th class="p-3">$m_2$ (mg)</th>
                                <th class="p-3">$m_3$ (mg)</th>
                                <th class="p-3">$m_4$ (mg)</th>
                                <th class="p-3">$m_5$ (mg)</th>
                                <th class="p-3">มวลเฉลี่ย $\bar{m}$ (mg)</th>
                                <th class="p-3">ปริมาตรจริง $\bar{V}$ (µL)</th>
                                <th class="p-3">Inaccuracy $E\%$</th>
                                <th class="p-3">Imprecision $\text{CV}\%$</th>
                                <th class="p-3">เกณฑ์ ISO 8655</th>
                                <th class="p-3">สรุปผล</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white">100 µL (10%)</td>
                                <td class="p-3 text-purple-300">99.2</td>
                                <td class="p-3 text-purple-300">99.5</td>
                                <td class="p-3 text-purple-300">98.9</td>
                                <td class="p-3 text-purple-300">99.4</td>
                                <td class="p-3 text-purple-300">99.1</td>
                                <td class="p-3 font-bold text-white">99.22</td>
                                <td class="p-3 font-bold text-emerald-300">99.55</td>
                                <td class="p-3 text-sky-400">-0.45%</td>
                                <td class="p-3 text-amber-300">0.24%</td>
                                <td class="p-3 text-slate-400 font-sans">$E \le \pm 3.0\%, \text{CV} \le 0.6\%$</td>
                                <td class="p-3 text-emerald-400 font-bold font-sans">✓ ผ่านเกณฑ์</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white">500 µL (50%)</td>
                                <td class="p-3 text-purple-300">497.8</td>
                                <td class="p-3 text-purple-300">498.2</td>
                                <td class="p-3 text-purple-300">497.5</td>
                                <td class="p-3 text-purple-300">498.0</td>
                                <td class="p-3 text-purple-300">497.9</td>
                                <td class="p-3 font-bold text-white">497.88</td>
                                <td class="p-3 font-bold text-emerald-300">499.52</td>
                                <td class="p-3 text-sky-400">-0.10%</td>
                                <td class="p-3 text-amber-300">0.05%</td>
                                <td class="p-3 text-slate-400 font-sans">$E \le \pm 1.2\%, \text{CV} \le 0.4\%$</td>
                                <td class="p-3 text-emerald-400 font-bold font-sans">✓ ผ่านเกณฑ์</td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white">1000 µL (100%)</td>
                                <td class="p-3 text-purple-300">996.5</td>
                                <td class="p-3 text-purple-300">997.2</td>
                                <td class="p-3 text-purple-300">996.0</td>
                                <td class="p-3 text-purple-300">996.8</td>
                                <td class="p-3 text-purple-300">997.0</td>
                                <td class="p-3 font-bold text-white">996.70</td>
                                <td class="p-3 font-bold text-emerald-300">999.99</td>
                                <td class="p-3 text-sky-400">-0.001%</td>
                                <td class="p-3 text-amber-300">0.05%</td>
                                <td class="p-3 text-slate-400 font-sans">$E \le \pm 0.8\%, \text{CV} \le 0.3\%$</td>
                                <td class="p-3 text-emerald-400 font-bold font-sans">✓ ผ่านเกณฑ์</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 1.3: Colony Sizing & Turbidity Assessment -->
            <div class="space-y-3 pt-2">
                <h3 class="text-xs font-bold text-sky-400 font-mono">
                    ตารางที่ 1.3: การวัดขนาดโคโลนีจุลินทรีย์และการประเมินความขุ่นของตัวอย่างน้ำ (Colony Sizing &amp; Turbidity)
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Colony Sizing Table -->
                    <div class="overflow-x-auto rounded-2xl border border-white/10">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left">โคโลนีตัวอย่าง</th>
                                    <th class="p-3">เส้นผ่านศูนย์กลาง (mm)</th>
                                    <th class="p-3">สัณฐานวิทยา (Morphology)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 1</td>
                                    <td class="p-3 text-emerald-400">2.45</td>
                                    <td class="p-3 text-slate-400 font-sans">กลม ขอบเรียบ นูน ขาวขุ่น</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 2</td>
                                    <td class="p-3 text-emerald-400">3.10</td>
                                    <td class="p-3 text-slate-400 font-sans">กลม ขอบหยัก แบน สีครีม</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 3</td>
                                    <td class="p-3 text-emerald-400">1.85</td>
                                    <td class="p-3 text-slate-400 font-sans">จุดกลมเล็ก ผิวมันใส</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 4</td>
                                    <td class="p-3 text-emerald-400">2.70</td>
                                    <td class="p-3 text-slate-400 font-sans">รูปไข่ ขอบไม่เรียบ นูน</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 5</td>
                                    <td class="p-3 text-emerald-400">4.20</td>
                                    <td class="p-3 text-slate-400 font-sans">แผ่กว้าง ขอบเส้นใย</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Water Turbidity Table -->
                    <div class="overflow-x-auto rounded-2xl border border-white/10">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-sky-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left">ตัวอย่างน้ำ</th>
                                    <th class="p-3">ค่าเฉลี่ย NTU</th>
                                    <th class="p-3">เกณฑ์ WHO (&lt;4 NTU)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300">
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำประปาห้องปฏิบัติการ</td>
                                    <td class="p-3 font-mono font-bold text-emerald-400">0.88</td>
                                    <td class="p-3 text-emerald-400 font-bold">✓ ผ่านมาตรฐานน้ำดื่ม</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำฝนธรรมชาติ</td>
                                    <td class="p-3 font-mono font-bold text-emerald-400">2.17</td>
                                    <td class="p-3 text-emerald-400 font-bold">✓ ผ่านมาตรฐานน้ำดื่ม</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำคลองรอบมหาวิทยาลัย</td>
                                    <td class="p-3 font-mono font-bold text-amber-400">39.8</td>
                                    <td class="p-3 text-amber-400 font-bold">✗ ต้องผ่านระบบบำบัด</td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำเสียจุลินทรีย์จำลอง</td>
                                    <td class="p-3 font-mono font-bold text-rose-400">420.0</td>
                                    <td class="p-3 text-rose-400 font-bold">✗ ปริมาณตะกอนแขวนลอยสูง</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
                    <span>ห้ามคว่ำหรือเอียงไมโครปิเปตที่มีของเหลวอยู่ในทิป เพราะอาจทำให้สารละลายไหลย้อนเข้าสู่ลูกสูบภายในและเกิดการกัดกร่อนหรือปนเปื้อนข้าม (Cross-contamination)</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>ห้ามหมุนปรับสเกลไมโครปิเปตเกินช่วงปริมาตรสูงสุด ($1000\ \mu\text{L}$) หรือต่ำกว่าช่วงต่ำสุด ($100\ \mu\text{L}$) เพราะจะทำให้ชุดเกลียวภายในชำรุด</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>เมื่อใช้ไมโครมิเตอร์วัดความหนาของแผ่นสไลด์แก้ว ต้องหมุนด้วย Ratchet Stop เท่านั้น ห้ามหมุนปลอก Thimble โดยตรงเพื่อป้องกันแผ่นสไลด์แตกหัก</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-rose-400 mt-0.5">•</span>
                    <span>การวัดขนาดโคโลนีต้องทำผ่านฝาจานเพาะเชื้อที่ปิดสนิทหรือทำในตู้ชีวนิรภัย (Biosafety Cabinet) และสวมถุงมือไนไตรล์ตลอดเวลา</span>
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
// Multi-Instrument 3D Metrology Engine (Three.js PBR Studio)
// Vernier Caliper (0.05 mm), Micrometer (0.01 mm), Pipette P1000
// ============================================================
let instRenderer, instScene, instCamera, instControls;
let benchArStream = null;
let activeInstrument = 'caliper'; // 'caliper' | 'micrometer' | 'pipette'

// 3D Model Groups
let caliperRoot, fixedBodyGroup, slidingAssemblyGroup;
let depthGaugeRod, petriSpecimen, cuvetteSpecimen, colonySpecimen;

let micrometerRoot, microFrameMesh, microSpindleMesh, microThimbleGroup, microSpecimenGroup;
let microCurrentSlide = 1.15;
let microZeroBias = 0.00;

let pipetteRoot, pipettePlungerMesh, pipetteLiquidMesh, balanceDraftShield, balancePan;
let pipetteCurrentVol = 1000;
let pipetteIsAspirated = false;
let balanceCurrentMass = 0.0000;

// --- Procedural Textures for Vernier Caliper ---
function generateRulerTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 2048; canvas.height = 256;
    const ctx = canvas.getContext('2d');
    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#e2e8f0'); grad.addColorStop(0.3, '#f8fafc');
    grad.addColorStop(0.7, '#cbd5e1'); grad.addColorStop(1, '#94a3b8');
    ctx.fillStyle = grad; ctx.fillRect(0, 0, 2048, 256);

    ctx.fillStyle = 'rgba(255, 255, 255, 0.15)';
    for (let i = 0; i < 40; i++) ctx.fillRect(0, Math.random() * 256, 2048, 1);

    ctx.strokeStyle = '#0f172a'; ctx.lineWidth = 3;
    ctx.beginPath(); ctx.moveTo(100, 180); ctx.lineTo(1980, 180); ctx.stroke();

    const startX = 140, pxPerMm = 12.0;
    ctx.fillStyle = '#0f172a'; ctx.font = 'bold 22px "JetBrains Mono", monospace'; ctx.textAlign = 'center';

    for (let mm = 0; mm <= 150; mm++) {
        const x = startX + mm * pxPerMm;
        let tickH = 22;
        if (mm % 10 === 0) {
            tickH = 65; ctx.lineWidth = 3.5; ctx.fillText(mm.toString(), x, 90);
        } else if (mm % 5 === 0) {
            tickH = 40; ctx.lineWidth = 2.5;
        } else {
            ctx.lineWidth = 1.8;
        }
        ctx.beginPath(); ctx.moveTo(x, 180); ctx.lineTo(x, 180 - tickH); ctx.stroke();
    }
    ctx.font = 'bold 18px "Prompt", sans-serif'; ctx.textAlign = 'left'; ctx.fillStyle = '#334155';
    ctx.fillText('STAINLESS HARDENED • 0.05 mm • RBRU SciExHub', startX + 240, 230);

    const tex = new THREE.CanvasTexture(canvas);
    tex.wrapS = tex.wrapT = THREE.ClampToEdgeWrapping;
    tex.anisotropy = 16;
    return tex;
}

function generateVernierTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 512; canvas.height = 256;
    const ctx = canvas.getContext('2d');
    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#38bdf8'); grad.addColorStop(0.2, '#e0f2fe');
    grad.addColorStop(0.8, '#bae6fd'); grad.addColorStop(1, '#0284c7');
    ctx.fillStyle = grad; ctx.fillRect(0, 0, 512, 256);

    ctx.strokeStyle = '#0284c7'; ctx.lineWidth = 4; ctx.strokeRect(4, 4, 504, 248);
    ctx.strokeStyle = '#0f172a'; ctx.lineWidth = 3;
    ctx.beginPath(); ctx.moveTo(30, 70); ctx.lineTo(482, 70); ctx.stroke();

    const vStartX = 40, vStep = 21.0;
    ctx.fillStyle = '#0f172a'; ctx.font = 'bold 22px "JetBrains Mono", monospace'; ctx.textAlign = 'center';

    for (let i = 0; i <= 20; i++) {
        const x = vStartX + i * vStep;
        let tickH = 24;
        if (i % 2 === 0) {
            tickH = 48; ctx.lineWidth = 3; ctx.fillText((i / 2).toString(), x, 150);
        } else {
            tickH = 32; ctx.lineWidth = 2;
        }
        ctx.beginPath(); ctx.moveTo(x, 70); ctx.lineTo(x, 70 + tickH); ctx.stroke();
    }
    ctx.font = 'bold 15px "JetBrains Mono", monospace'; ctx.fillStyle = '#0369a1';
    ctx.fillText('0.05 mm VERNIER', 256, 210);

    const tex = new THREE.CanvasTexture(canvas);
    tex.anisotropy = 16;
    return tex;
}

// --- Procedural Texture for Micrometer Sleeve (0-25 mm) ---
function generateMicroSleeveTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 1024; canvas.height = 256;
    const ctx = canvas.getContext('2d');

    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#cbd5e1'); grad.addColorStop(0.5, '#f8fafc'); grad.addColorStop(1, '#94a3b8');
    ctx.fillStyle = grad; ctx.fillRect(0, 0, 1024, 256);

    // Datum center line
    ctx.strokeStyle = '#0f172a'; ctx.lineWidth = 4;
    ctx.beginPath(); ctx.moveTo(40, 128); ctx.lineTo(984, 128); ctx.stroke();

    const startX = 80, step = 34.0;
    ctx.font = 'bold 20px "JetBrains Mono", monospace'; ctx.textAlign = 'center'; ctx.fillStyle = '#0f172a';

    for (let mm = 0; mm <= 25; mm++) {
        const x = startX + mm * step;
        // Upper 1 mm tick marks
        ctx.lineWidth = 2.5;
        ctx.beginPath(); ctx.moveTo(x, 128); ctx.lineTo(x, 75); ctx.stroke();
        if (mm % 5 === 0) {
            ctx.fillText(mm.toString(), x, 55);
        }
        // Lower 0.5 mm tick marks (between mm ticks)
        if (mm < 25) {
            const halfX = x + step / 2;
            ctx.beginPath(); ctx.moveTo(halfX, 128); ctx.lineTo(halfX, 175); ctx.stroke();
        }
    }
    const tex = new THREE.CanvasTexture(canvas);
    tex.anisotropy = 16;
    return tex;
}

// --- Procedural Texture for Micrometer Thimble (0-49 ticks) ---
function generateMicroThimbleTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 1024; canvas.height = 256;
    const ctx = canvas.getContext('2d');

    const grad = ctx.createLinearGradient(0, 0, 1024, 0);
    grad.addColorStop(0, '#94a3b8'); grad.addColorStop(0.5, '#f1f5f9'); grad.addColorStop(1, '#64748b');
    ctx.fillStyle = grad; ctx.fillRect(0, 0, 1024, 256);

    ctx.strokeStyle = '#0f172a';
    ctx.font = 'bold 18px "JetBrains Mono", monospace'; ctx.textAlign = 'center'; ctx.fillStyle = '#0f172a';

    for (let tick = 0; tick < 50; tick++) {
        const x = (tick / 50.0) * 1024;
        let tickH = 30;
        if (tick % 5 === 0) {
            tickH = 65; ctx.lineWidth = 3;
            ctx.fillText(tick.toString(), x, 105);
        } else {
            ctx.lineWidth = 1.8;
        }
        ctx.beginPath(); ctx.moveTo(x, 0); ctx.lineTo(x, tickH); ctx.stroke();
    }
    const tex = new THREE.CanvasTexture(canvas);
    tex.wrapS = THREE.RepeatWrapping;
    tex.anisotropy = 16;
    return tex;
}

// -------------------------------------------------------------
// Initialize 3D Metrology Scene
// -------------------------------------------------------------
function initInstrument3D() {
    const container = document.getElementById('instrument-3d-canvas');
    if (!container) return;

    const w = container.clientWidth || 800;
    const h = container.clientHeight || 400;

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

    // 3-Point Lighting
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

    // Bench Grid
    const grid = new THREE.GridHelper(20, 32, 0x10b981, 0x1e293b);
    grid.position.y = -2.2;
    instScene.add(grid);

    // Shared Materials
    const steelPBR = new THREE.MeshStandardMaterial({ color: 0xe2e8f0, metalness: 0.90, roughness: 0.20 });
    const brassMat = new THREE.MeshStandardMaterial({ color: 0xd97706, metalness: 0.85, roughness: 0.25 });
    const glassPBR = new THREE.MeshPhysicalMaterial({ color: 0xffffff, metalness: 0.05, roughness: 0.03, transmission: 0.95, transparent: true, opacity: 0.88, ior: 1.52 });

    // =========================================================
    // 1. VERNIER CALIPER 3D MODEL
    // =========================================================
    caliperRoot = new THREE.Group();
    fixedBodyGroup = new THREE.Group();

    const rulerMat = new THREE.MeshStandardMaterial({ color: 0xffffff, metalness: 0.85, roughness: 0.22, map: generateRulerTexture() });
    const mainBeam = new THREE.Mesh(new THREE.BoxGeometry(11.5, 0.82, 0.18), rulerMat);
    mainBeam.position.set(1.5, 0, 0);
    fixedBodyGroup.add(mainBeam);

    const lowerJawShape = new THREE.Shape();
    lowerJawShape.moveTo(-4.2, 0.41);
    lowerJawShape.lineTo(-4.2, -3.2);
    lowerJawShape.lineTo(-4.9, -3.2);
    lowerJawShape.quadraticCurveTo(-5.4, -2.0, -5.2, -0.6);
    lowerJawShape.lineTo(-5.2, 0.41);
    lowerJawShape.closePath();

    const extrudeSettings = { depth: 0.18, bevelEnabled: true, bevelSegments: 3, steps: 1, bevelSize: 0.02, bevelThickness: 0.02 };
    const fixedLowerJaw = new THREE.Mesh(new THREE.ExtrudeGeometry(lowerJawShape, extrudeSettings), steelPBR);
    fixedLowerJaw.position.z = -0.09;
    fixedBodyGroup.add(fixedLowerJaw);

    const upperHornShape = new THREE.Shape();
    upperHornShape.moveTo(-4.2, 0.41);
    upperHornShape.lineTo(-4.2, 1.8);
    upperHornShape.lineTo(-4.7, 0.41);
    upperHornShape.closePath();
    const fixedUpperHorn = new THREE.Mesh(new THREE.ExtrudeGeometry(upperHornShape, extrudeSettings), steelPBR);
    fixedUpperHorn.position.z = -0.09;
    fixedBodyGroup.add(fixedUpperHorn);
    caliperRoot.add(fixedBodyGroup);

    // Sliding Vernier Assembly
    slidingAssemblyGroup = new THREE.Group();
    const vernierPlateMat = new THREE.MeshStandardMaterial({ color: 0xffffff, metalness: 0.85, roughness: 0.25, map: generateVernierTexture() });
    const sliderCollar = new THREE.Mesh(new THREE.BoxGeometry(2.2, 1.15, 0.28), steelPBR);
    slidingAssemblyGroup.add(sliderCollar);

    const vernierPlate = new THREE.Mesh(new THREE.PlaneGeometry(1.9, 0.75), vernierPlateMat);
    vernierPlate.position.set(0, 0, 0.145);
    slidingAssemblyGroup.add(vernierPlate);

    const slideLowerShape = new THREE.Shape();
    slideLowerShape.moveTo(0, 0.41);
    slideLowerShape.lineTo(0, -3.2);
    slideLowerShape.lineTo(0.7, -3.2);
    slideLowerShape.quadraticCurveTo(1.2, -2.0, 1.0, -0.6);
    slideLowerShape.lineTo(1.0, 0.41);
    slideLowerShape.closePath();
    const slideLowerJaw = new THREE.Mesh(new THREE.ExtrudeGeometry(slideLowerShape, extrudeSettings), steelPBR);
    slideLowerJaw.position.z = -0.09;
    slidingAssemblyGroup.add(slideLowerJaw);

    const lockScrew = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.18, 0.45, 16), brassMat);
    lockScrew.position.set(0.4, 0.75, 0);
    slidingAssemblyGroup.add(lockScrew);

    const rodGeom = new THREE.BoxGeometry(11.5, 0.1, 0.06);
    depthGaugeRod = new THREE.Mesh(rodGeom, steelPBR);
    depthGaugeRod.position.set(5.75, -0.05, -0.12);
    slidingAssemblyGroup.add(depthGaugeRod);
    caliperRoot.add(slidingAssemblyGroup);

    // Specimens
    petriSpecimen = new THREE.Group();
    const dishMesh = new THREE.Mesh(new THREE.CylinderGeometry(1.35, 1.35, 0.4, 36), glassPBR);
    dishMesh.rotation.x = Math.PI / 2;
    petriSpecimen.add(dishMesh);
    const agarMesh = new THREE.Mesh(new THREE.CylinderGeometry(1.28, 1.28, 0.15, 32), new THREE.MeshStandardMaterial({ color: 0xf59e0b, roughness: 0.4, transparent: true, opacity: 0.65 }));
    agarMesh.rotation.x = Math.PI / 2;
    petriSpecimen.add(agarMesh);
    const colMat = new THREE.MeshStandardMaterial({ color: 0x10b981, emissive: 0x34d399, emissiveIntensity: 0.5 });
    [[0.3, 0.4], [-0.5, 0.2], [0.2, -0.5], [-0.3, -0.4], [0.6, -0.2]].forEach(([cx, cy]) => {
        const dot = new THREE.Mesh(new THREE.SphereGeometry(0.08, 12, 12), colMat);
        dot.position.set(cx, cy, 0.1);
        petriSpecimen.add(dot);
    });
    caliperRoot.add(petriSpecimen);

    cuvetteSpecimen = new THREE.Group();
    const cuvetteGlass = new THREE.Mesh(new THREE.BoxGeometry(0.5, 1.8, 0.5), glassPBR);
    const cuvetteLiquid = new THREE.Mesh(new THREE.BoxGeometry(0.42, 1.4, 0.42), new THREE.MeshPhysicalMaterial({ color: 0x06b6d4, roughness: 0.05, transmission: 0.9, transparent: true, opacity: 0.8 }));
    cuvetteLiquid.position.y = -0.15;
    cuvetteSpecimen.add(cuvetteGlass, cuvetteLiquid);
    cuvetteSpecimen.visible = false;
    caliperRoot.add(cuvetteSpecimen);

    colonySpecimen = new THREE.Group();
    const plaqueMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.18, 0.25, 24), glassPBR);
    plaqueMesh.rotation.x = Math.PI / 2;
    const singleColony = new THREE.Mesh(new THREE.SphereGeometry(0.12, 16, 16), colMat);
    colonySpecimen.add(plaqueMesh, singleColony);
    colonySpecimen.visible = false;
    caliperRoot.add(colonySpecimen);

    instScene.add(caliperRoot);

    // =========================================================
    // 2. MICROMETER SCREW GAUGE 3D MODEL (0.01 mm)
    // =========================================================
    micrometerRoot = new THREE.Group();
    micrometerRoot.position.set(0, 0, 0);

    // Blue Powder-Coated Cast Iron C-Frame
    const cFrameShape = new THREE.Shape();
    cFrameShape.moveTo(-3.5, 0.5);
    cFrameShape.lineTo(-3.5, -2.4);
    cFrameShape.quadraticCurveTo(-2.8, -3.8, 0.0, -3.8);
    cFrameShape.quadraticCurveTo(2.8, -3.8, 3.5, -2.4);
    cFrameShape.lineTo(3.5, 0.5);
    cFrameShape.lineTo(2.4, 0.5);
    cFrameShape.lineTo(2.4, -2.0);
    cFrameShape.quadraticCurveTo(1.8, -2.9, 0.0, -2.9);
    cFrameShape.quadraticCurveTo(-1.8, -2.9, -2.4, -2.0);
    cFrameShape.lineTo(-2.4, 0.5);
    cFrameShape.closePath();

    const cFrameMat = new THREE.MeshStandardMaterial({
        color: 0x1d4ed8, // Lab Metallic Navy Blue
        metalness: 0.45,
        roughness: 0.35
    });
    microFrameMesh = new THREE.Mesh(new THREE.ExtrudeGeometry(cFrameShape, { depth: 0.45, bevelEnabled: true, bevelSegments: 3, steps: 1, bevelSize: 0.03, bevelThickness: 0.03 }), cFrameMat);
    microFrameMesh.position.z = -0.225;
    micrometerRoot.add(microFrameMesh);

    // Carbide Anvil (Fixed, left tip)
    const anvilMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.28, 0.9, 24), steelPBR);
    anvilMesh.rotation.z = Math.PI / 2;
    anvilMesh.position.set(-2.0, 0.5, 0);
    micrometerRoot.add(anvilMesh);

    // Fixed Barrel / Sleeve with 0-25 mm scale texture
    const sleeveMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        metalness: 0.85,
        roughness: 0.20,
        map: generateMicroSleeveTexture()
    });
    const sleeveMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.48, 0.48, 3.2, 32), sleeveMat);
    sleeveMesh.rotation.z = -Math.PI / 2;
    sleeveMesh.position.set(4.0, 0.5, 0);
    micrometerRoot.add(sleeveMesh);

    // Moving Spindle (Stainless cylinder)
    microSpindleMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.28, 3.8, 24), steelPBR);
    microSpindleMesh.rotation.z = Math.PI / 2;
    microSpindleMesh.position.set(0.5, 0.5, 0);
    micrometerRoot.add(microSpindleMesh);

    // Rotating & Sliding Thimble Group
    microThimbleGroup = new THREE.Group();
    const thimbleMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        metalness: 0.80,
        roughness: 0.25,
        map: generateMicroThimbleTexture()
    });
    const thimbleMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.62, 0.58, 2.4, 32), thimbleMat);
    thimbleMesh.rotation.z = -Math.PI / 2;
    microThimbleGroup.add(thimbleMesh);

    // Ratchet Stop Cap (End)
    const ratchetMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.35, 1.2, 24), brassMat);
    ratchetMesh.rotation.z = -Math.PI / 2;
    ratchetMesh.position.x = 1.8;
    microThimbleGroup.add(ratchetMesh);

    micrometerRoot.add(microThimbleGroup);

    // Micrometer Clamped Specimens
    microSpecimenGroup = new THREE.Group();
    const glassSlideSpecimen = new THREE.Mesh(new THREE.BoxGeometry(0.12, 1.8, 1.2), glassPBR);
    microSpecimenGroup.add(glassSlideSpecimen);
    micrometerRoot.add(microSpecimenGroup);

    micrometerRoot.visible = false;
    instScene.add(micrometerRoot);

    // =========================================================
    // 3. MICROPIPETTE P1000 & BALANCE 3D MODEL
    // =========================================================
    pipetteRoot = new THREE.Group();
    pipetteRoot.position.set(0, 0.5, 0);

    // Pipette Handle (Ergonomic Polymer)
    const handleMat = new THREE.MeshStandardMaterial({ color: 0xf1f5f9, roughness: 0.35, metalness: 0.1 });
    const p1000Blue = new THREE.MeshStandardMaterial({ color: 0x0284c7, roughness: 0.3, metalness: 0.2 });
    const darkShaftMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.5, metalness: 0.1 });

    const handleBody = new THREE.Mesh(new THREE.CylinderGeometry(0.38, 0.44, 4.2, 32), handleMat);
    handleBody.position.y = 1.2;
    pipetteRoot.add(handleBody);

    // Finger Hook (Ergonomic curve on top back)
    const hookMesh = new THREE.Mesh(new THREE.BoxGeometry(0.4, 0.8, 0.5), handleMat);
    hookMesh.position.set(-0.35, 3.0, 0);
    pipetteRoot.add(hookMesh);

    // Volume Adjustment Ring / Dial
    const dialRing = new THREE.Mesh(new THREE.CylinderGeometry(0.44, 0.44, 0.4, 24), darkShaftMat);
    dialRing.position.y = 3.3;
    pipetteRoot.add(dialRing);

    // Plunger Stroke Button (Top)
    pipettePlungerMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.3, 0.3, 0.7, 24), p1000Blue);
    pipettePlungerMesh.position.y = 3.8;
    pipetteRoot.add(pipettePlungerMesh);

    // Tip Ejector Button
    const ejectorBtn = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.35, 0.2), new THREE.MeshStandardMaterial({ color: 0xe2e8f0 }));
    ejectorBtn.position.set(0.32, 3.3, 0);
    pipetteRoot.add(ejectorBtn);

    // Digital Volumeter Recessed Window
    const counterWindow = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.8, 0.48), new THREE.MeshStandardMaterial({ color: 0x020617, roughness: 0.8 }));
    counterWindow.position.set(0.3, 1.8, 0);
    pipetteRoot.add(counterWindow);

    // Lower Nose Cone / Shaft
    const lowerShaft = new THREE.Mesh(new THREE.CylinderGeometry(0.32, 0.14, 3.2, 24), darkShaftMat);
    lowerShaft.position.y = -2.2;
    pipetteRoot.add(lowerShaft);

    // Disposable Blue Tip (P1000 standard polypropylene)
    const tipMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, roughness: 0.2, transmission: 0.75, transparent: true, opacity: 0.85 });
    const blueTip = new THREE.Mesh(new THREE.CylinderGeometry(0.16, 0.04, 2.2, 24), tipMat);
    blueTip.position.y = -4.5;
    pipetteRoot.add(blueTip);

    // Liquid meniscus inside tip
    pipetteLiquidMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.14, 0.05, 1.4, 20), new THREE.MeshPhysicalMaterial({ color: 0x06b6d4, roughness: 0.05, transmission: 0.9, transparent: true, opacity: 0.9 }));
    pipetteLiquidMesh.position.y = -4.7;
    pipetteLiquidMesh.visible = false;
    pipetteRoot.add(pipetteLiquidMesh);

    // Analytical Balance Stage (Beside Pipette)
    const balanceGroup = new THREE.Group();
    balanceGroup.position.set(3.8, -1.8, 0);
    const balanceBase = new THREE.Mesh(new THREE.BoxGeometry(3.2, 0.7, 3.2), handleMat);
    balanceGroup.add(balanceBase);

    // Draft shield (glass cube)
    balanceDraftShield = new THREE.Mesh(new THREE.BoxGeometry(2.6, 2.4, 2.6), new THREE.MeshPhysicalMaterial({ color: 0xffffff, roughness: 0.05, transmission: 0.95, transparent: true, opacity: 0.5 }));
    balanceDraftShield.position.y = 1.35;
    balanceGroup.add(balanceDraftShield);

    // Stainless steel weighing pan
    balancePan = new THREE.Mesh(new THREE.CylinderGeometry(0.8, 0.8, 0.08, 32), steelPBR);
    balancePan.position.y = 0.45;
    balanceGroup.add(balancePan);

    // Glass weighing beaker on pan
    const miniBeaker = new THREE.Mesh(new THREE.CylinderGeometry(0.5, 0.45, 1.0, 24), glassPBR);
    miniBeaker.position.y = 0.95;
    balanceGroup.add(miniBeaker);

    pipetteRoot.add(balanceGroup);
    pipetteRoot.visible = false;
    instScene.add(pipetteRoot);

    // Initial state setup
    updateCaliperSlide(88.60);
    updateMicrometerSlide(6.82);
    updatePipetteSlide(1000);

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        if (activeInstrument === 'caliper' && caliperRoot) caliperRoot.rotation.y += 0.0015;
        if (activeInstrument === 'micrometer' && micrometerRoot) micrometerRoot.rotation.y += 0.0015;
        if (activeInstrument === 'pipette' && pipetteRoot) pipetteRoot.rotation.y += 0.0015;

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

// -------------------------------------------------------------
// Instrument Selection Switcher (Caliper, Micrometer, Pipette)
// -------------------------------------------------------------
function selectInstrument(type) {
    activeInstrument = type;
    const tabCaliper = document.getElementById('tabInstCaliper');
    const tabMicrometer = document.getElementById('tabInstMicrometer');
    const tabPipette = document.getElementById('tabInstPipette');

    const panelCaliper = document.getElementById('panelCaliper');
    const panelMicrometer = document.getElementById('panelMicrometer');
    const panelPipette = document.getElementById('panelPipette');

    const hudTitle = document.getElementById('hudInstrumentTitle');
    const hudMeta = document.getElementById('hudInstrumentMeta');

    [tabCaliper, tabMicrometer, tabPipette].forEach(tab => {
        tab.className = "px-3 py-1.5 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-1.5";
    });

    panelCaliper.classList.add('hidden');
    panelMicrometer.classList.add('hidden');
    panelPipette.classList.add('hidden');

    if (caliperRoot) caliperRoot.visible = false;
    if (micrometerRoot) micrometerRoot.visible = false;
    if (pipetteRoot) pipetteRoot.visible = false;

    if (type === 'caliper') {
        tabCaliper.className = "px-3 py-1.5 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-1.5";
        panelCaliper.classList.remove('hidden');
        if (caliperRoot) { caliperRoot.visible = true; caliperRoot.rotation.set(0, 0, 0); }
        hudTitle.innerHTML = '<i class="fa-solid fa-ruler-horizontal text-emerald-400"></i> PBR Vernier Caliper (0.05 mm)';
        hudMeta.textContent = 'ความละเอียดสเกล: 0.05 mm • ช่วงวัด: 0 - 150 mm • หมุนสำรวจ 360°';
    } else if (type === 'micrometer') {
        tabMicrometer.className = "px-3 py-1.5 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-md transition flex items-center gap-1.5";
        panelMicrometer.classList.remove('hidden');
        if (micrometerRoot) { micrometerRoot.visible = true; micrometerRoot.rotation.set(0, 0, 0); }
        hudTitle.innerHTML = '<i class="fa-solid fa-circle-notch text-sky-400"></i> PBR Micrometer Screw Gauge (0.01 mm)';
        hudMeta.textContent = 'ความละเอียดสเกล: 0.01 mm • พิตช์เกลียว: 0.5 mm • ช่วงวัด: 0 - 25 mm';
    } else if (type === 'pipette') {
        tabPipette.className = "px-3 py-1.5 rounded-xl text-xs font-bold bg-purple-500 text-white shadow-md transition flex items-center gap-1.5";
        panelPipette.classList.remove('hidden');
        if (pipetteRoot) { pipetteRoot.visible = true; pipetteRoot.rotation.set(0, 0, 0); }
        hudTitle.innerHTML = '<i class="fa-solid fa-eye-dropper text-purple-400"></i> P1000 Micropipette &amp; Analytical Balance';
        hudMeta.textContent = 'การสอบเทียบ Gravimetric ISO 8655 • 100 - 1000 µL • เครื่องชั่ง 0.0001 g';
    }
    resetBenchCamera();
}

// -------------------------------------------------------------
// Caliper Telemetry Functions
// -------------------------------------------------------------
function updateCaliperSlide(val) {
    const mm = parseFloat(val);
    const mainScale = Math.floor(mm);
    const fraction = mm - mainScale;
    const vernierLine = Math.round(fraction / 0.05);

    document.getElementById('caliperReadingDisplay').textContent = `${mm.toFixed(2)} mm`;
    document.getElementById('caliperFormula').innerHTML = `สเกลหลัก <span class="text-white font-bold">${mainScale} mm</span> + สเกลเวอร์เนียร์ ขีดที่ ${vernierLine} (<span class="text-sky-300 font-bold">${fraction.toFixed(2)} mm</span>) = <span class="text-emerald-400 font-bold">${mm.toFixed(2)} mm</span>`;

    if (slidingAssemblyGroup) {
        const slideX = -4.2 + (mm / 150.0) * 7.0;
        slidingAssemblyGroup.position.x = slideX;

        const midX = (-4.2 + slideX) / 2.0;
        if (petriSpecimen && petriSpecimen.visible) {
            petriSpecimen.position.set(midX, -1.6, 0);
            const dishScale = Math.max(0.2, (mm / 90.0));
            petriSpecimen.scale.set(dishScale, dishScale, 1);
        } else if (cuvetteSpecimen && cuvetteSpecimen.visible) {
            cuvetteSpecimen.position.set(midX, -1.6, 0);
        } else if (colonySpecimen && colonySpecimen.visible) {
            colonySpecimen.position.set(midX, -1.6, 0);
        }
    }
}

function setCaliperSpecimen(sizeMm, name) {
    document.getElementById('caliperSlider').value = sizeMm;
    if (name.includes('Petri')) {
        if (petriSpecimen) petriSpecimen.visible = true;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = false;
        if (colonySpecimen) colonySpecimen.visible = false;
    } else if (name.includes('คิวเวตต์')) {
        if (petriSpecimen) petriSpecimen.visible = false;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = true;
        if (colonySpecimen) colonySpecimen.visible = false;
    } else {
        if (petriSpecimen) petriSpecimen.visible = false;
        if (cuvetteSpecimen) cuvetteSpecimen.visible = false;
        if (colonySpecimen) colonySpecimen.visible = true;
    }
    updateCaliperSlide(sizeMm);
}

// -------------------------------------------------------------
// Micrometer Telemetry Functions (0.01 mm)
// -------------------------------------------------------------
function updateMicrometerSlide(val) {
    microCurrentSlide = parseFloat(val);
    const mm = microCurrentSlide;
    const sleeveMm = Math.floor(mm * 2) / 2; // increments of 0.5 mm
    const thimbleFraction = mm - sleeveMm;
    const thimbleTicks = Math.round(thimbleFraction / 0.01);

    const corrected = mm - microZeroBias;

    document.getElementById('microReadingDisplay').textContent = `${mm.toFixed(2)} mm`;
    document.getElementById('microFormula').innerHTML = `สเกลหลักบน Sleeve <span class="text-white font-bold">${sleeveMm.toFixed(1)} mm</span> + สเกลหมุน Thimble ขีดที่ ${thimbleTicks} (<span class="text-sky-300 font-bold">${(thimbleTicks * 0.01).toFixed(2)} mm</span>) = <span class="text-emerald-400 font-bold">${mm.toFixed(2)} mm</span>`;
    document.getElementById('microCorrectedDisplay').innerHTML = `ค่าวัดจริงหลังปรับศูนย์ ($x_{\\text{corrected}} = ${mm.toFixed(2)} - (${microZeroBias >= 0 ? '+' : ''}${microZeroBias.toFixed(2)})$): <span class="text-white font-bold">${corrected.toFixed(2)} mm</span>`;

    // 3D Rigging for Micrometer Spindle and Thimble
    if (microSpindleMesh && microThimbleGroup) {
        // Closed position: anvil at x = -2.0. Max gap 25 mm -> mapped to 2.4 units
        const gapUnits = (mm / 25.0) * 2.4;
        const spindleFrontX = -2.0 + gapUnits;
        microSpindleMesh.position.x = spindleFrontX + 1.9; // spindle length 3.8

        // Thimble position slides back with spindle
        microThimbleGroup.position.x = 4.2 + (mm / 25.0) * 1.8;
        // Thimble rotates as it slides (50 ticks per 0.5 mm -> continuous rotation)
        microThimbleGroup.rotation.x = -(mm / 0.5) * Math.PI * 2;

        if (microSpecimenGroup) {
            microSpecimenGroup.position.set((-2.0 + spindleFrontX) / 2.0, 0.5, 0);
            const specimenScale = Math.max(0.1, (gapUnits / 0.3));
            microSpecimenGroup.scale.set(specimenScale, 1, 1);
        }
    }
}

function updateMicroZeroError(biasVal) {
    microZeroBias = parseFloat(biasVal);
    updateMicrometerSlide(microCurrentSlide);
}

function setMicrometerSpecimen(sizeMm, name) {
    document.getElementById('micrometerSlider').value = sizeMm;
    updateMicrometerSlide(sizeMm);
}

// -------------------------------------------------------------
// Micropipette Telemetry Functions (ISO 8655 Gravimetric)
// -------------------------------------------------------------
function updatePipetteSlide(val) {
    pipetteCurrentVol = parseInt(val, 10);
    document.getElementById('pipetteVolLabel').textContent = `${pipetteCurrentVol} µL`;
    document.getElementById('statNominalVol').textContent = `${pipetteCurrentVol} µL`;

    // Update 3-digit counter display
    const str = pipetteCurrentVol.toString().padStart(4, '0');
    // For P1000: 1000 µL shows [1][0][0], 500 µL shows [0][5][0], 100 µL shows [0][1][0]
    document.getElementById('pipDigit1').textContent = str[0] === '1' ? '1' : '0';
    document.getElementById('pipDigit2').textContent = str[1];
    document.getElementById('pipDigit3').textContent = str[2];
}

function setPipetteVolume(vol) {
    document.getElementById('pipetteSlider').value = vol;
    updatePipetteSlide(vol);
}

function aspiratePipette() {
    pipetteIsAspirated = true;
    if (pipetteLiquidMesh) pipetteLiquidMesh.visible = true;
    if (pipettePlungerMesh) pipettePlungerMesh.position.y = 3.8;

    const btnAspirate = document.getElementById('btnAspirate');
    btnAspirate.className = "px-3 py-2 rounded-xl text-xs font-bold bg-emerald-600 text-white shadow-md transition flex items-center justify-center gap-1.5";
    btnAspirate.innerHTML = '<i class="fa-solid fa-check"></i> ดูดสารเรียบร้อยแล้ว';
}

function dispenseAndWeigh() {
    if (!pipetteIsAspirated) {
        alert("กรุณากดดูดน้ำกลั่น DI Water ก่อนทำการจ่ายสารและชั่งน้ำหนักครับ");
        return;
    }
    pipetteIsAspirated = false;
    if (pipetteLiquidMesh) pipetteLiquidMesh.visible = false;

    // Plunger depression animation
    if (pipettePlungerMesh) pipettePlungerMesh.position.y = 3.4;
    setTimeout(() => { if (pipettePlungerMesh) pipettePlungerMesh.position.y = 3.8; }, 600);

    // Realistic gravimetric simulation with random noise (s ~ 0.15%)
    const zFactor = 1.0033; // mg to µL conversion at 22°C
    const theoreticalMg = pipetteCurrentVol / zFactor;
    const randomVariation = (Math.random() - 0.48) * (pipetteCurrentVol * 0.003); // +/- 0.15%
    const measuredMg = theoreticalMg + randomVariation;
    const measuredGrams = measuredMg / 1000.0;

    balanceCurrentMass = measuredGrams;
    document.getElementById('balanceMassDisplay').textContent = `${measuredGrams.toFixed(4)} g`;

    // ISO 8655 Calculations
    const actualVol = measuredMg * zFactor;
    const sysErrorPercent = ((actualVol - pipetteCurrentVol) / pipetteCurrentVol) * 100.0;

    document.getElementById('statActualVol').textContent = `${actualVol.toFixed(2)} µL`;
    document.getElementById('statSysError').textContent = `${sysErrorPercent >= 0 ? '+' : ''}${sysErrorPercent.toFixed(2)} %`;

    // Limit criteria check
    let passLimit = 0.8;
    if (pipetteCurrentVol <= 100) passLimit = 3.0;
    else if (pipetteCurrentVol <= 500) passLimit = 1.2;

    const isPass = Math.abs(sysErrorPercent) <= passLimit;
    const statIso = document.getElementById('statIsoStatus');
    if (isPass) {
        statIso.className = "text-emerald-400 font-bold font-sans mt-0.5";
        statIso.innerHTML = "✓ ผ่านเกณฑ์ ISO 8655";
    } else {
        statIso.className = "text-rose-400 font-bold font-sans mt-0.5";
        statIso.innerHTML = "✗ เกินเกณฑ์มาตรฐาน";
    }

    const btnAspirate = document.getElementById('btnAspirate');
    btnAspirate.className = "px-3 py-2 rounded-xl text-xs font-bold bg-sky-600 hover:bg-sky-500 text-white shadow-md transition flex items-center justify-center gap-1.5";
    btnAspirate.innerHTML = '<i class="fa-solid fa-arrow-up"></i> 1. ดูดน้ำกลั่น DI';
}

function tareBalance() {
    balanceCurrentMass = 0.0000;
    document.getElementById('balanceMassDisplay').textContent = '0.0000 g';
}

// -------------------------------------------------------------
// Multi-Mode Switcher (3D 360°, WebAR, Slider)
// -------------------------------------------------------------
function switchBenchMode(mode) {
    const btn3d = document.getElementById('benchMode3d');
    const btnAr = document.getElementById('benchModeAr');
    const btnSim = document.getElementById('benchModeSim');
    const reticle = document.getElementById('benchArReticle');
    const video = document.getElementById('benchArVideo');

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
        const activePanel = document.getElementById(`panel${activeInstrument.charAt(0).toUpperCase() + activeInstrument.slice(1)}`);
        if (activePanel) activePanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

async function startBenchAr() {
    const video = document.getElementById('benchArVideo');
    if (!video) return;
    try {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            benchArStream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: { ideal: 'environment' } } });
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

document.addEventListener('DOMContentLoaded', () => {
    initInstrument3D();
});
</script>

<?php include '../includes/footer.php'; ?>
