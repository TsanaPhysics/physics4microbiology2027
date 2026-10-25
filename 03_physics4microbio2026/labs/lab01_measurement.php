<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดความแม่นยำสูง ไมโครมิเตอร์ และการสอบเทียบไมโครปิเปต | Lab 1: Precision Metrology, Micrometer & Micropipette Calibration';
$basePath = '../';
include '../includes/header.php';
?>

<!-- Three.js & Controls -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 space-y-6">

    <!-- Hero Header -->
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
                        🇹🇭 บันทึกผลจาก 3D Simulator • บันทึกลง SQLite • เชื่อมโยง Google Sheets
                    </span>
                    <span class="px-3 py-1 rounded-lg bg-slate-800/80 text-sky-300 border border-sky-500/30">
                        🇬🇧 Interactive Student E-Report with Photo Proof &amp; Automated Evaluation
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="../../virtual_lab/index.html?lab=1" target="_blank" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 text-slate-950 font-bold text-xs flex items-center gap-2 shadow-lg shadow-emerald-950/50 transition transform active:scale-95">
                    <i class="fa-solid fa-flask"></i> เข้าสู่ห้องแล็บ 3D เต็มรูปแบบ (13 Labs)
                </a>
                <a href="../simulations/sim_vernier_caliper_3d.html" target="_blank" class="px-4 py-2.5 rounded-xl bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 font-bold text-xs flex items-center gap-2 transition">
                    <i class="fa-solid fa-expand"></i> 3D Caliper Fullscreen (Loupe &amp; Quiz) ↗
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
                    หมุนสำรวจ 360° และทดลองวัดค่าจริงจากแบบจำลองเพื่อนำข้อมูลไปบันทึกลงในตารางผลการทดลองด้านล่าง
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
            
            <button onclick="capture3dSimulator()" class="px-4 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 shadow-lg shadow-emerald-950/40 transition flex items-center gap-2">
                <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
            </button>
        </div>

        <!-- 3D Scene Viewport -->
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
                    ความละเอียดสเกล: 0.05 mm • ช่วงวัด: 0 - 150 mm • หมุนสำรวจ 360°
                </div>
            </div>
        </div>

        <!-- Telemetry Control Panel 1: VERNIER CALIPER -->
        <div id="panelCaliper" class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/30 space-y-4">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-white/5 pb-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-emerald-400 font-mono">🎯 เลือกวัตถุทดสอบมาตรฐาน:</span>
                    <button onclick="setCaliperSpecimen(90.00, 'จานเพาะเชื้อ (Petri Dish)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">จานเพาะเชื้อ (90.00 mm)</button>
                    <button onclick="setCaliperSpecimen(2.45, 'โคโลนีแบคทีเรีย (Colony)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">โคโลนี (2.45 mm)</button>
                    <button onclick="setCaliperSpecimen(12.50, 'คิวเวตต์วัดความขุ่น (Cuvette)')" class="px-3 py-1.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs text-white border border-white/10 transition">คิวเวตต์ (12.50 mm)</button>
                </div>
                <div class="text-left sm:text-right">
                    <span class="text-[11px] text-slate-400">ค่าวัดเวอร์เนียร์สุทธิ:</span>
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

        <!-- Telemetry Control Panel 2: MICROMETER SCREW GAUGE -->
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

        <!-- Telemetry Control Panel 3: MICROPIPETTE P1000 & BALANCE -->
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

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
                <div class="lg:col-span-7 space-y-2">
                    <div class="flex justify-between text-xs font-mono text-slate-300">
                        <span>หมุนปรับปริมาตรไมโครปิเปต:</span>
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

    <!-- Interactive E-Report Submission Form -->
    <form id="labReportForm" onsubmit="validateAndSubmitReport(event)" class="space-y-6">

        <!-- 1. Student Profile Card (Mandatory) -->
        <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-emerald-400"></i>
                    ข้อมูลนักศึกษาผู้ส่งรายงานผลปฏิบัติการ (Student Identification)
                </h2>
                <span class="text-xs text-rose-400 font-semibold">* จำเป็นต้องกรอกทุกช่อง</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        ชื่อ - นามสกุล (Full Name) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-emerald-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-emerald-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-emerald-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-emerald-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-sky-400"></i>
                    ภาพถ่ายหรือแคปหน้าจอระหว่างทดลอง (Experiment Screenshot Proof)
                </h2>
                <div id="proofBadgeStatus" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/40">
                    <i class="fa-solid fa-circle-exclamation"></i> ยังไม่มีภาพหลักฐาน (จำเป็นก่อนส่ง)
                </div>
            </div>

            <p class="text-xs text-slate-300 leading-relaxed">
                ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Virtual Bench (เช่น ขณะวัดขนาดจานเพาะเชื้อ, หมุนไมโครมิเตอร์, หรือชั่งน้ำหนักไมโครปิเปต) เพื่อยืนยันว่าได้ทำการทดลองจริง
            </p>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <!-- Action Controls -->
                <div class="md:col-span-5 space-y-3">
                    <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 text-slate-950 font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                        <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Simulator ตอนนี้
                    </button>
                    
                    <div class="text-center text-[11px] text-slate-500 font-mono">— หรือ —</div>

                    <label class="w-full py-2.5 px-4 rounded-2xl bg-slate-950 hover:bg-slate-800 text-slate-300 border border-white/15 font-bold text-xs flex items-center justify-center gap-2 cursor-pointer transition">
                        <i class="fa-solid fa-upload"></i> อัปโหลดไฟล์ภาพ / ถ่ายภาพจากกล้อง
                        <input type="file" id="imageFileInput" accept="image/*" capture="environment" onchange="handleImageFileUpload(event)" class="hidden">
                    </label>

                    <div class="text-[11px] text-slate-400">
                        รองรับไฟล์ภาพ PNG, JPG, JPEG ขนาดไม่เกิน 5 MB
                    </div>
                </div>

                <!-- Preview Thumbnail Container -->
                <div class="md:col-span-7 flex flex-col items-center justify-center p-3 rounded-2xl bg-slate-950 border border-dashed border-white/20 min-h-[160px] relative overflow-hidden">
                    <img id="proofPreviewImg" src="" alt="Experiment Proof Preview" class="max-h-[180px] w-auto rounded-xl object-contain hidden border border-white/10 shadow-lg">
                    <div id="proofPlaceholder" class="text-center space-y-1 text-slate-500 py-6">
                        <i class="fa-regular fa-image text-4xl mb-1"></i>
                        <div class="text-xs font-semibold">ยังไม่มีภาพหลักฐานการทดลอง</div>
                        <div class="text-[10px]">กดปุ่มแคปหน้าจอ 3D หรือเลือกไฟล์ภาพด้านซ้าย</div>
                    </div>
                    <!-- Hidden field to hold base64 image -->
                    <input type="hidden" id="image_proof_base64" name="image_proof_base64" value="">
                </div>
            </div>
        </div>

        <!-- 3. Blank Data Tables Section (Student Input Tables) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-4">
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-sky-400 flex items-center gap-2">
                        📊 แบบบันทึกผลการทดลอง (Data Recording Tables)
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        ช่องตารางเป็นช่องว่างเปล่า ให้นักศึกษาอ่านค่าจาก 3D Simulator แล้วพิมพ์บันทึกค่าลงในช่องตามลำดับ
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="calculateAllTables()" class="px-3 py-1.5 rounded-xl bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator"></i> คำนวณค่าเฉลี่ยและสถิติอัตโนมัติ
                    </button>
                </div>
            </div>

            <!-- Table 1.1: Mechanical Dimensions -->
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-xs font-bold text-emerald-400 font-mono">
                        ตารางที่ 1.1: ผลการวัดมิติตัวอย่างละเอียดเปรียบเทียบเครื่องมือ 3 ชนิด (ไม้บรรทัด, เวอร์เนียร์, ไมโครมิเตอร์)
                    </h3>
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-300">Zero Error ไมโครมิเตอร์:</span>
                        <input type="number" step="0.01" id="tbl1_zero_error" value="0.00" class="w-20 bg-slate-950 border border-white/20 focus:border-emerald-400 rounded-lg px-2 py-1 text-center font-mono text-xs text-amber-300 outline-none" required>
                        <span class="text-slate-400 font-mono">mm</span>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left min-w-[200px]">ชิ้นงานตัวอย่าง</th>
                                <th class="p-3 min-w-[130px]">เครื่องมือวัด</th>
                                <th class="p-3">ความละเอียด</th>
                                <th class="p-3 min-w-[90px]">ครั้งที่ 1 (mm)</th>
                                <th class="p-3 min-w-[90px]">ครั้งที่ 2 (mm)</th>
                                <th class="p-3 min-w-[90px]">ครั้งที่ 3 (mm)</th>
                                <th class="p-3 min-w-[100px]">ค่าเฉลี่ย $\bar{x}$ (mm)</th>
                                <th class="p-3 min-w-[120px]">รายงานผล ($x \pm \Delta x$)</th>
                                <th class="p-3 min-w-[90px]">เลขนัยสำคัญ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <!-- Row 1 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">1. เส้นผ่านศูนย์กลางนอกจานเพาะเชื้อ</td>
                                <td class="p-3 font-sans">ไม้บรรทัดเหล็ก</td>
                                <td class="p-3 text-slate-400">1.0 mm</td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r1_c1" placeholder="90.0" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r1_c2" placeholder="89.5" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r1_c3" placeholder="90.5" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r1_avg" placeholder="90.0" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r1_rep" placeholder="90.0 ± 0.5" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-slate-200 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r1_sig" placeholder="3 ตัว" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none font-sans"></td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">2. เส้นผ่านศูนย์กลางนอกจานเพาะเชื้อ</td>
                                <td class="p-3 font-sans">เวอร์เนียร์คาลิเปอร์</td>
                                <td class="p-3 text-slate-400">0.05 mm</td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r2_c1" placeholder="90.15" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r2_c2" placeholder="90.10" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r2_c3" placeholder="90.20" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r2_avg" placeholder="90.15" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r2_rep" placeholder="90.15 ± 0.05" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-slate-200 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r2_sig" placeholder="4 ตัว" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none font-sans"></td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">3. เส้นผ่านศูนย์กลางในปากหลอดทดลอง</td>
                                <td class="p-3 font-sans">เวอร์เนียร์คาลิเปอร์</td>
                                <td class="p-3 text-slate-400">0.05 mm</td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r3_c1" placeholder="14.85" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r3_c2" placeholder="14.90" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r3_c3" placeholder="14.85" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r3_avg" placeholder="14.87" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r3_rep" placeholder="14.87 ± 0.05" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-slate-200 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r3_sig" placeholder="4 ตัว" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none font-sans"></td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">4. ความหนาของแผ่นสไลด์แก้ว</td>
                                <td class="p-3 font-sans text-sky-300 font-bold">ไมโครมิเตอร์</td>
                                <td class="p-3 text-sky-300">0.01 mm</td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r4_c1" placeholder="1.15" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r4_c2" placeholder="1.14" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r4_c3" placeholder="1.15" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r4_avg" placeholder="1.15" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r4_rep" placeholder="1.15 ± 0.01" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-slate-200 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r4_sig" placeholder="3 ตัว" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none font-sans"></td>
                            </tr>
                            <!-- Row 5 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">5. ความหนาของขอบจานเพาะเชื้อ</td>
                                <td class="p-3 font-sans text-sky-300 font-bold">ไมโครมิเตอร์</td>
                                <td class="p-3 text-sky-300">0.01 mm</td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r5_c1" placeholder="1.42" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r5_c2" placeholder="1.43" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r5_c3" placeholder="1.42" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t1_r5_avg" placeholder="1.42" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r5_rep" placeholder="1.42 ± 0.01" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-slate-200 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r5_sig" placeholder="3 ตัว" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none font-sans"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 1.2: Micropipette Gravimetric Calibration (ISO 8655) -->
            <div class="space-y-3 pt-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-xs font-bold text-purple-400 font-mono">
                        ตารางที่ 1.2: การสอบเทียบไมโครปิเปต P1000 ด้วยวิธีชั่งน้ำหนัก (ISO 8655 Gravimetric Calibration)
                    </h3>
                    <div class="text-[11px] text-slate-400 flex items-center gap-2">
                        <span>อุณหภูมิน้ำ:</span>
                        <input type="number" step="0.1" id="tbl2_water_temp" value="22.0" class="w-16 bg-slate-950 border border-white/20 focus:border-purple-400 rounded-lg px-1.5 py-0.5 text-center font-mono text-xs text-purple-300 outline-none"> °C
                        <span>($Z = 1.0033\ \mu\text{L}/\text{mg}$)</span>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-purple-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left min-w-[120px]">ปริมาตร $V_0$</th>
                                <th class="p-3 min-w-[80px]">$m_1$ (mg)</th>
                                <th class="p-3 min-w-[80px]">$m_2$ (mg)</th>
                                <th class="p-3 min-w-[80px]">$m_3$ (mg)</th>
                                <th class="p-3 min-w-[80px]">$m_4$ (mg)</th>
                                <th class="p-3 min-w-[80px]">$m_5$ (mg)</th>
                                <th class="p-3 min-w-[90px]">มวลเฉลี่ย $\bar{m}$</th>
                                <th class="p-3 min-w-[95px]">ปริมาตรจริง $\bar{V}$ (µL)</th>
                                <th class="p-3 min-w-[90px]">Inaccuracy $E\%$</th>
                                <th class="p-3 min-w-[90px]">Imprecision $\text{CV}\%$</th>
                                <th class="p-3 min-w-[140px]">ผลการประเมิน (ISO 8655)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <!-- Row 1: 100 uL -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white font-sans">100 µL (10%)</td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r1_m1" placeholder="99.2" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r1_m2" placeholder="99.5" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r1_m3" placeholder="98.9" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r1_m4" placeholder="99.4" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r1_m5" placeholder="99.1" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r1_mavg" placeholder="99.22" required class="w-full bg-slate-950 border border-purple-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r1_vact" placeholder="99.55" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r1_err" placeholder="-0.45%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r1_cv" placeholder="0.24%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2">
                                    <select id="t2_r1_eval" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-sans font-bold outline-none">
                                        <option value="pass">✓ ผ่านเกณฑ์ (E≤±3.0%)</option>
                                        <option value="fail">✗ เกินเกณฑ์มาตรฐาน</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- Row 2: 500 uL -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white font-sans">500 µL (50%)</td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r2_m1" placeholder="497.8" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r2_m2" placeholder="498.2" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r2_m3" placeholder="497.5" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r2_m4" placeholder="498.0" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r2_m5" placeholder="497.9" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r2_mavg" placeholder="497.88" required class="w-full bg-slate-950 border border-purple-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r2_vact" placeholder="499.52" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r2_err" placeholder="-0.10%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r2_cv" placeholder="0.05%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2">
                                    <select id="t2_r2_eval" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-sans font-bold outline-none">
                                        <option value="pass">✓ ผ่านเกณฑ์ (E≤±1.2%)</option>
                                        <option value="fail">✗ เกินเกณฑ์มาตรฐาน</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- Row 3: 1000 uL -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white font-sans">1000 µL (100%)</td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r3_m1" placeholder="996.5" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r3_m2" placeholder="997.2" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r3_m3" placeholder="996.0" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r3_m4" placeholder="996.8" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t2_r3_m5" placeholder="997.0" required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-lg px-1.5 py-1.5 text-center text-xs text-purple-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r3_mavg" placeholder="996.70" required class="w-full bg-slate-950 border border-purple-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t2_r3_vact" placeholder="999.99" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r3_err" placeholder="-0.001%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r3_cv" placeholder="0.05%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2">
                                    <select id="t2_r3_eval" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-sans font-bold outline-none">
                                        <option value="pass">✓ ผ่านเกณฑ์ (E≤±0.8%)</option>
                                        <option value="fail">✗ เกินเกณฑ์มาตรฐาน</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 1.3: Colony Sizing & Turbidity -->
            <div class="space-y-3 pt-3">
                <h3 class="text-xs font-bold text-sky-400 font-mono">
                    ตารางที่ 1.3: การวัดขนาดโคโลนีจุลินทรีย์และการประเมินความขุ่นของตัวอย่างน้ำ (Colony Sizing &amp; Turbidity)
                </h3>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <!-- Colony Sizing Table -->
                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left">โคโลนีตัวอย่าง</th>
                                    <th class="p-3 min-w-[120px]">เส้นผ่านศูนย์กลาง (mm)</th>
                                    <th class="p-3 min-w-[140px]">สัณฐานวิทยา (Morphology)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300">
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 1</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_c1_size" placeholder="2.45" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none font-mono"></td>
                                    <td class="p-2"><input type="text" id="t3_c1_desc" placeholder="เช่น กลม นูน ขอบเรียบ สีขาวขุ่น" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-xs text-slate-200 outline-none"></td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 2</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_c2_size" placeholder="3.10" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none font-mono"></td>
                                    <td class="p-2"><input type="text" id="t3_c2_desc" placeholder="เช่น กลม แบน ขอบหยัก สีครีม" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-xs text-slate-200 outline-none"></td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 3</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_c3_size" placeholder="1.85" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none font-mono"></td>
                                    <td class="p-2"><input type="text" id="t3_c3_desc" placeholder="เช่น จุดกลมเล็ก ผิวมันใส" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-xs text-slate-200 outline-none"></td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 4</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_c4_size" placeholder="2.70" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none font-mono"></td>
                                    <td class="p-2"><input type="text" id="t3_c4_desc" placeholder="เช่น รูปไข่ นูน ผิวด้าน" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-xs text-slate-200 outline-none"></td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left text-white font-bold">โคโลนีที่ 5</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_c5_size" placeholder="4.20" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none font-mono"></td>
                                    <td class="p-2"><input type="text" id="t3_c5_desc" placeholder="เช่น แผ่กว้าง ขอบเส้นใยรา" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-xs text-slate-200 outline-none"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Water Turbidity Table -->
                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-sky-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left">ตัวอย่างน้ำ</th>
                                    <th class="p-3 min-w-[120px]">ค่าเฉลี่ยความขุ่น (NTU)</th>
                                    <th class="p-3 min-w-[140px]">เกณฑ์ WHO (&lt;4 NTU)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300">
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำประปาแล็บ</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_w1_ntu" placeholder="0.88" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none font-mono"></td>
                                    <td class="p-2">
                                        <select id="t3_w1_eval" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none">
                                            <option value="pass">✓ ผ่านมาตรฐานน้ำดื่ม</option>
                                            <option value="fail">✗ เกินเกณฑ์มาตรฐาน</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำฝนธรรมชาติ</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_w2_ntu" placeholder="2.17" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none font-mono"></td>
                                    <td class="p-2">
                                        <select id="t3_w2_eval" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none">
                                            <option value="pass">✓ ผ่านมาตรฐานน้ำดื่ม</option>
                                            <option value="fail">✗ เกินเกณฑ์มาตรฐาน</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำคลองรอบ มรภ.</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_w3_ntu" placeholder="39.8" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 font-bold outline-none font-mono"></td>
                                    <td class="p-2">
                                        <select id="t3_w3_eval" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 font-bold outline-none">
                                            <option value="fail">✗ ต้องผ่านระบบบำบัด</option>
                                            <option value="pass">✓ ผ่านมาตรฐาน</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white">น้ำเสียจุลินทรีย์จำลอง</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_w4_ntu" placeholder="420.0" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-rose-400 font-bold outline-none font-mono"></td>
                                    <td class="p-2">
                                        <select id="t3_w4_eval" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-rose-400 font-bold outline-none">
                                            <option value="fail">✗ ปริมาณตะกอนสูงมาก</option>
                                            <option value="pass">✓ ผ่านเกณฑ์</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- 4. Calculations, Discussion & Conclusion Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-base sm:text-lg font-bold text-amber-400 flex items-center gap-2">
                ✍️ แสดงวิธีคำนวณ การสรุปและวิเคราะห์ผล (Calculations &amp; Discussion)
            </h2>

            <div class="space-y-4">
                <!-- Calculations Area -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        1. แสดงวิธีคำนวณโดยละเอียด (Detailed Calculations) <span class="text-rose-400">*</span>
                    </label>
                    <p class="text-[11px] text-slate-400">
                        แสดงวิธีคำนวณหาค่าเฉลี่ย ($\bar{x}$), ค่าความไม่แน่นอน ($\pm \Delta x$), การแปลงมวลเป็นปริมาตรด้วย $Z$-factor ($V = m \times Z$), และการคำนวณ Inaccuracy ($E\%$) หรือ Imprecision ($\text{CV}\%$)
                    </p>
                    <textarea id="lab_calculations" name="lab_calculations" rows="4" placeholder="ตัวอย่างการคำนวณ:
- การคำนวณปริมาตรจริง P1000 ที่ 1000 µL: มวลเฉลี่ย m = 996.70 mg, Z = 1.0033 µL/mg -> V = 996.70 * 1.0033 = 999.99 µL
- คำนวณ Systematic Error (E%): E% = [(999.99 - 1000) / 1000] * 100% = -0.001%
- ส่วนเบี่ยงเบนมาตรฐาน s = 0.47 mg -> CV% = (0.47 / 996.70) * 100% = 0.05%" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition font-mono leading-relaxed"></textarea>
                </div>

                <!-- Discussion Area -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        2. การอภิปรายผลการทดลอง (Discussion) <span class="text-rose-400">*</span>
                    </label>
                    <p class="text-[11px] text-slate-400">
                        อภิปรายเปรียบเทียบความละเอียดของเครื่องมือวัด (ไม้บรรทัด vs เวอร์เนียร์ vs ไมโครมิเตอร์), ผลกระทบของ Zero Error, และความแม่นยำของไมโครปิเปตเทียบเกณฑ์มาตรฐาน ISO 8655
                    </p>
                    <textarea id="lab_discussion" name="lab_discussion" rows="3" placeholder="พิมพ์การอภิปรายผลการทดลองที่ได้จากการสังเกตและข้อมูลตัวเลข..." required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition leading-relaxed"></textarea>
                </div>

                <!-- Conclusion Area -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        3. สรุปผลการทดลอง (Conclusion) <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="lab_conclusion" name="lab_conclusion" rows="2" placeholder="สรุปผลการทดลองให้สอดคล้องกับวัตถุประสงค์ทั้ง 3 ตอน..." required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition leading-relaxed"></textarea>
                </div>
            </div>
        </div>

        <!-- 5. Post-Lab Questions Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <h2 class="text-base sm:text-lg font-bold text-purple-400 flex items-center gap-2">
                ❓ คำถามท้ายการทดลอง (Post-Lab Questions)
            </h2>

            <div class="space-y-4">
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 1: ค่าความคลาดเคลื่อนศูนย์ (Zero Error) ของไมโครมิเตอร์เกิดขึ้นได้อย่างไร และหากเครื่องมือมี Positive Zero Error $+0.02\text{ mm}$ โดยไม่ได้ปรับแก้ ค่าที่วัดได้จะมีความผิดพลาดอย่างไร? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_1" rows="2" placeholder="พิมพ์คำตอบของคุณ..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 2: เหตุใดในการสอบเทียบไมโครปิเปตด้วยวิธีชั่งน้ำหนัก (Gravimetric Method) จึงต้องวัดอุณหภูมิของน้ำและนำค่า $Z$-factor มาคำนวณปริมาตรจริง? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_2" rows="2" placeholder="พิมพ์คำตอบของคุณ..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 3: การวัดเส้นผ่านศูนย์กลางของโคโลนีจุลินทรีย์บนจานเพาะเชื้อด้วยเวอร์เนียร์คาลิเปอร์ มีโอกาสเกิดความคลาดเคลื่อนจากปัจจัยใด และควรมีมาตรการความปลอดภัยทางชีวภาพ (Biosafety) อย่างไร? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_3" rows="2" placeholder="พิมพ์คำตอบของคุณ..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition"></textarea>
                </div>
            </div>
        </div>

        <!-- Optional Google Sheets Webhook URL Override -->
        <div class="bg-slate-900/60 border border-white/10 rounded-2xl p-4 text-xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-slate-400 font-mono flex items-center gap-1.5">
                    <i class="fa-solid fa-table-cells text-emerald-400"></i> Google Sheets Webhook URL (ค่าทางเลือก):
                </span>
                <span class="text-[10px] text-slate-500">หากเว้นว่างจะใช้การตั้งค่าส่วนกลางของระบบ</span>
            </div>
            <input type="url" id="google_sheet_webhook_url" name="google_sheet_webhook_url" placeholder="https://script.google.com/macros/s/AKfycbx.../exec (ถ้ามี)" class="w-full bg-slate-950 border border-white/15 rounded-xl px-3 py-2 text-xs text-sky-300 placeholder-slate-600 outline-none font-mono">
        </div>

        <!-- Submission Action Banner & Validation Notice -->
        <div class="p-6 rounded-3xl bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border-2 border-emerald-500/40 shadow-2xl space-y-4">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="space-y-1 text-center sm:text-left">
                    <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                        <i class="fa-solid fa-shield-halved text-emerald-400"></i>
                        การตรวจสอบความถูกต้องก่อนบันทึก (Pre-Submission Validation)
                    </div>
                    <div class="text-xs text-slate-400">
                        ระบบจะตรวจสอบความครบถ้วนของข้อมูลระบุตัวตน, ภาพถ่ายหลักฐาน, ตารางบันทึกผล, การคำนวณ, และคำถามท้ายแล็บก่อนอนุญาตให้ส่ง
                    </div>
                </div>

                <button type="submit" id="btnSubmitReport" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-teal-300 text-slate-950 font-bold text-sm shadow-xl shadow-emerald-950/60 transition transform active:scale-95 flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผลปฏิบัติการ
                </button>
            </div>
        </div>

    </form>

    <!-- Submission Feedback Modal -->
    <div id="submitModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md hidden items-center justify-center p-4">
        <div class="bg-slate-900 border border-emerald-500/40 rounded-3xl max-w-lg w-full p-6 sm:p-8 space-y-5 shadow-2xl relative">
            <div class="text-center space-y-2">
                <div class="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mx-auto text-3xl border border-emerald-500/40 animate-bounce">
                    <i class="fa-solid fa-check"></i>
                </div>
                <h3 class="text-xl font-bold text-white">ส่งรายงานผลปฏิบัติการสำเร็จ!</h3>
                <p id="modalMsg" class="text-xs text-slate-300">
                    ข้อมูลของท่านได้รับการบันทึกลงฐานข้อมูล SQLite และส่งต่อไปยัง Google Sheets เรียบร้อยแล้ว
                </p>
            </div>

            <div class="bg-slate-950 p-4 rounded-2xl border border-white/10 space-y-2 text-xs font-mono">
                <div class="flex justify-between text-slate-400">
                    <span>รหัสรายงาน (Report Code):</span>
                    <span id="modalReportCode" class="text-emerald-400 font-bold">REP-...</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>ผู้ส่งรายงาน:</span>
                    <span id="modalStudentName" class="text-white">...</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>สถานะฐานข้อมูล SQLite:</span>
                    <span class="text-emerald-400 font-bold">✓ บันทึกสำเร็จ (virtual_lab.db)</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>สถานะ Google Sheets:</span>
                    <span id="modalSheetStatus" class="text-sky-300 font-bold">กำลังซิงค์...</span>
                </div>
                <div class="flex justify-between text-slate-400">
                    <span>เวลาที่บันทึก:</span>
                    <span id="modalTimestamp" class="text-slate-300">...</span>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeSubmitModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs border border-white/10 transition">
                    ปิดหน้าต่าง
                </button>
            </div>
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

// Procedural Textures for Vernier Caliper
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

function generateMicroSleeveTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = 1024; canvas.height = 256;
    const ctx = canvas.getContext('2d');

    const grad = ctx.createLinearGradient(0, 0, 0, 256);
    grad.addColorStop(0, '#cbd5e1'); grad.addColorStop(0.5, '#f8fafc'); grad.addColorStop(1, '#94a3b8');
    ctx.fillStyle = grad; ctx.fillRect(0, 0, 1024, 256);

    ctx.strokeStyle = '#0f172a'; ctx.lineWidth = 4;
    ctx.beginPath(); ctx.moveTo(40, 128); ctx.lineTo(984, 128); ctx.stroke();

    const startX = 80, step = 34.0;
    ctx.font = 'bold 20px "JetBrains Mono", monospace'; ctx.textAlign = 'center'; ctx.fillStyle = '#0f172a';

    for (let mm = 0; mm <= 25; mm++) {
        const x = startX + mm * step;
        ctx.lineWidth = 2.5;
        ctx.beginPath(); ctx.moveTo(x, 128); ctx.lineTo(x, 75); ctx.stroke();
        if (mm % 5 === 0) {
            ctx.fillText(mm.toString(), x, 55);
        }
        if (mm < 25) {
            const halfX = x + step / 2;
            ctx.beginPath(); ctx.moveTo(halfX, 128); ctx.lineTo(halfX, 175); ctx.stroke();
        }
    }
    const tex = new THREE.CanvasTexture(canvas);
    tex.anisotropy = 16;
    return tex;
}

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

function initInstrument3D() {
    const container = document.getElementById('instrument-3d-canvas');
    if (!container) return;

    const w = container.clientWidth || 800;
    const h = container.clientHeight || 400;

    instScene = new THREE.Scene();
    instCamera = new THREE.PerspectiveCamera(40, w / h, 0.1, 100);
    instCamera.position.set(0, 3.5, 11);

    // Set preserveDrawingBuffer to true to enable clean screenshot capture
    instRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, preserveDrawingBuffer: true });
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

    const grid = new THREE.GridHelper(20, 32, 0x10b981, 0x1e293b);
    grid.position.y = -2.2;
    instScene.add(grid);

    const steelPBR = new THREE.MeshStandardMaterial({ color: 0xe2e8f0, metalness: 0.90, roughness: 0.20 });
    const brassMat = new THREE.MeshStandardMaterial({ color: 0xd97706, metalness: 0.85, roughness: 0.25 });
    const glassPBR = new THREE.MeshPhysicalMaterial({ color: 0xffffff, metalness: 0.05, roughness: 0.03, transmission: 0.95, transparent: true, opacity: 0.88, ior: 1.52 });

    // 1. Caliper
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

    // 2. Micrometer
    micrometerRoot = new THREE.Group();
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

    const cFrameMat = new THREE.MeshStandardMaterial({ color: 0x1d4ed8, metalness: 0.45, roughness: 0.35 });
    microFrameMesh = new THREE.Mesh(new THREE.ExtrudeGeometry(cFrameShape, { depth: 0.45, bevelEnabled: true, bevelSegments: 3, steps: 1, bevelSize: 0.03, bevelThickness: 0.03 }), cFrameMat);
    microFrameMesh.position.z = -0.225;
    micrometerRoot.add(microFrameMesh);

    const anvilMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.28, 0.9, 24), steelPBR);
    anvilMesh.rotation.z = Math.PI / 2;
    anvilMesh.position.set(-2.0, 0.5, 0);
    micrometerRoot.add(anvilMesh);

    const sleeveMat = new THREE.MeshStandardMaterial({ color: 0xffffff, metalness: 0.85, roughness: 0.20, map: generateMicroSleeveTexture() });
    const sleeveMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.48, 0.48, 3.2, 32), sleeveMat);
    sleeveMesh.rotation.z = -Math.PI / 2;
    sleeveMesh.position.set(4.0, 0.5, 0);
    micrometerRoot.add(sleeveMesh);

    microSpindleMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.28, 3.8, 24), steelPBR);
    microSpindleMesh.rotation.z = Math.PI / 2;
    microSpindleMesh.position.set(0.5, 0.5, 0);
    micrometerRoot.add(microSpindleMesh);

    microThimbleGroup = new THREE.Group();
    const thimbleMat = new THREE.MeshStandardMaterial({ color: 0xffffff, metalness: 0.80, roughness: 0.25, map: generateMicroThimbleTexture() });
    const thimbleMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.62, 0.58, 2.4, 32), thimbleMat);
    thimbleMesh.rotation.z = -Math.PI / 2;
    microThimbleGroup.add(thimbleMesh);

    const ratchetMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.35, 1.2, 24), brassMat);
    ratchetMesh.rotation.z = -Math.PI / 2;
    ratchetMesh.position.x = 1.8;
    microThimbleGroup.add(ratchetMesh);
    micrometerRoot.add(microThimbleGroup);

    microSpecimenGroup = new THREE.Group();
    const glassSlideSpecimen = new THREE.Mesh(new THREE.BoxGeometry(0.12, 1.8, 1.2), glassPBR);
    microSpecimenGroup.add(glassSlideSpecimen);
    micrometerRoot.add(microSpecimenGroup);
    micrometerRoot.visible = false;
    instScene.add(micrometerRoot);

    // 3. Pipette
    pipetteRoot = new THREE.Group();
    pipetteRoot.position.set(0, 0.5, 0);

    const handleMat = new THREE.MeshStandardMaterial({ color: 0xf1f5f9, roughness: 0.35, metalness: 0.1 });
    const p1000Blue = new THREE.MeshStandardMaterial({ color: 0x0284c7, roughness: 0.3, metalness: 0.2 });
    const darkShaftMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, roughness: 0.5, metalness: 0.1 });

    const handleBody = new THREE.Mesh(new THREE.CylinderGeometry(0.38, 0.44, 4.2, 32), handleMat);
    handleBody.position.y = 1.2;
    pipetteRoot.add(handleBody);

    const hookMesh = new THREE.Mesh(new THREE.BoxGeometry(0.4, 0.8, 0.5), handleMat);
    hookMesh.position.set(-0.35, 3.0, 0);
    pipetteRoot.add(hookMesh);

    const dialRing = new THREE.Mesh(new THREE.CylinderGeometry(0.44, 0.44, 0.4, 24), darkShaftMat);
    dialRing.position.y = 3.3;
    pipetteRoot.add(dialRing);

    pipettePlungerMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.3, 0.3, 0.7, 24), p1000Blue);
    pipettePlungerMesh.position.y = 3.8;
    pipetteRoot.add(pipettePlungerMesh);

    const ejectorBtn = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.35, 0.2), new THREE.MeshStandardMaterial({ color: 0xe2e8f0 }));
    ejectorBtn.position.set(0.32, 3.3, 0);
    pipetteRoot.add(ejectorBtn);

    const counterWindow = new THREE.Mesh(new THREE.BoxGeometry(0.2, 0.8, 0.48), new THREE.MeshStandardMaterial({ color: 0x020617, roughness: 0.8 }));
    counterWindow.position.set(0.3, 1.8, 0);
    pipetteRoot.add(counterWindow);

    const lowerShaft = new THREE.Mesh(new THREE.CylinderGeometry(0.32, 0.14, 3.2, 24), darkShaftMat);
    lowerShaft.position.y = -2.2;
    pipetteRoot.add(lowerShaft);

    const tipMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, roughness: 0.2, transmission: 0.75, transparent: true, opacity: 0.85 });
    const blueTip = new THREE.Mesh(new THREE.CylinderGeometry(0.16, 0.04, 2.2, 24), tipMat);
    blueTip.position.y = -4.5;
    pipetteRoot.add(blueTip);

    pipetteLiquidMesh = new THREE.Mesh(new THREE.CylinderGeometry(0.14, 0.05, 1.4, 20), new THREE.MeshPhysicalMaterial({ color: 0x06b6d4, roughness: 0.05, transmission: 0.9, transparent: true, opacity: 0.9 }));
    pipetteLiquidMesh.position.y = -4.7;
    pipetteLiquidMesh.visible = false;
    pipetteRoot.add(pipetteLiquidMesh);

    const balanceGroup = new THREE.Group();
    balanceGroup.position.set(3.8, -1.8, 0);
    const balanceBase = new THREE.Mesh(new THREE.BoxGeometry(3.2, 0.7, 3.2), handleMat);
    balanceGroup.add(balanceBase);

    balanceDraftShield = new THREE.Mesh(new THREE.BoxGeometry(2.6, 2.4, 2.6), new THREE.MeshPhysicalMaterial({ color: 0xffffff, roughness: 0.05, transmission: 0.95, transparent: true, opacity: 0.5 }));
    balanceDraftShield.position.y = 1.35;
    balanceGroup.add(balanceDraftShield);

    balancePan = new THREE.Mesh(new THREE.CylinderGeometry(0.8, 0.8, 0.08, 32), steelPBR);
    balancePan.position.y = 0.45;
    balanceGroup.add(balancePan);

    const miniBeaker = new THREE.Mesh(new THREE.CylinderGeometry(0.5, 0.45, 1.0, 24), glassPBR);
    miniBeaker.position.y = 0.95;
    balanceGroup.add(miniBeaker);

    pipetteRoot.add(balanceGroup);
    pipetteRoot.visible = false;
    instScene.add(pipetteRoot);

    updateCaliperSlide(88.60);
    updateMicrometerSlide(6.82);
    updatePipetteSlide(1000);

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

function updateMicrometerSlide(val) {
    microCurrentSlide = parseFloat(val);
    const mm = microCurrentSlide;
    const sleeveMm = Math.floor(mm * 2) / 2;
    const thimbleFraction = mm - sleeveMm;
    const thimbleTicks = Math.round(thimbleFraction / 0.01);
    const corrected = mm - microZeroBias;

    document.getElementById('microReadingDisplay').textContent = `${mm.toFixed(2)} mm`;
    document.getElementById('microFormula').innerHTML = `สเกลหลักบน Sleeve <span class="text-white font-bold">${sleeveMm.toFixed(1)} mm</span> + สเกลหมุน Thimble ขีดที่ ${thimbleTicks} (<span class="text-sky-300 font-bold">${(thimbleTicks * 0.01).toFixed(2)} mm</span>) = <span class="text-emerald-400 font-bold">${mm.toFixed(2)} mm</span>`;
    document.getElementById('microCorrectedDisplay').innerHTML = `ค่าวัดจริงหลังปรับศูนย์ ($x_{\\text{corrected}} = ${mm.toFixed(2)} - (${microZeroBias >= 0 ? '+' : ''}${microZeroBias.toFixed(2)})$): <span class="text-white font-bold">${corrected.toFixed(2)} mm</span>`;

    if (microSpindleMesh && microThimbleGroup) {
        const gapUnits = (mm / 25.0) * 2.4;
        const spindleFrontX = -2.0 + gapUnits;
        microSpindleMesh.position.x = spindleFrontX + 1.9;
        microThimbleGroup.position.x = 4.2 + (mm / 25.0) * 1.8;
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

function updatePipetteSlide(val) {
    pipetteCurrentVol = parseInt(val, 10);
    document.getElementById('pipetteVolLabel').textContent = `${pipetteCurrentVol} µL`;
    document.getElementById('statNominalVol').textContent = `${pipetteCurrentVol} µL`;

    const str = pipetteCurrentVol.toString().padStart(4, '0');
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

    if (pipettePlungerMesh) pipettePlungerMesh.position.y = 3.4;
    setTimeout(() => { if (pipettePlungerMesh) pipettePlungerMesh.position.y = 3.8; }, 600);

    const zFactor = 1.0033;
    const theoreticalMg = pipetteCurrentVol / zFactor;
    const randomVariation = (Math.random() - 0.48) * (pipetteCurrentVol * 0.003);
    const measuredMg = theoreticalMg + randomVariation;
    const measuredGrams = measuredMg / 1000.0;

    balanceCurrentMass = measuredGrams;
    document.getElementById('balanceMassDisplay').textContent = `${measuredGrams.toFixed(4)} g`;

    const actualVol = measuredMg * zFactor;
    const sysErrorPercent = ((actualVol - pipetteCurrentVol) / pipetteCurrentVol) * 100.0;

    document.getElementById('statActualVol').textContent = `${actualVol.toFixed(2)} µL`;
    document.getElementById('statSysError').textContent = `${sysErrorPercent >= 0 ? '+' : ''}${sysErrorPercent.toFixed(2)} %`;

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

// ============================================================
// Snapshot & Proof Capture Logic
// ============================================================
function capture3dSimulator() {
    if (!instRenderer) return;
    try {
        // Re-render once to ensure buffer is hot
        instRenderer.render(instScene, instCamera);
        const dataUrl = instRenderer.domElement.toDataURL('image/png');
        setProofImage(dataUrl);
    } catch (e) {
        console.error("Capture failed:", e);
        alert("ไม่สามารถแคปหน้าจออัตโนมัติได้ กรุณาใช้ปุ่มอัปโหลดไฟล์ภาพแทนครับ");
    }
}

function handleImageFileUpload(e) {
    const file = e.target.files && e.target.files[0];
    if (!file) return;

    if (file.size > 5 * 1024 * 1024) {
        alert("ไฟล์ภาพมีขนาดใหญ่เกิน 5 MB กรุณาเลือกไฟล์ที่มีขนาดเล็กลง");
        return;
    }

    const reader = new FileReader();
    reader.onload = function(evt) {
        setProofImage(evt.target.result);
    };
    reader.readAsDataURL(file);
}

function setProofImage(dataUrl) {
    document.getElementById('image_proof_base64').value = dataUrl;
    const preview = document.getElementById('proofPreviewImg');
    const placeholder = document.getElementById('proofPlaceholder');
    const badge = document.getElementById('proofBadgeStatus');

    preview.src = dataUrl;
    preview.classList.remove('hidden');
    placeholder.classList.add('hidden');

    badge.className = "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40";
    badge.innerHTML = '<i class="fa-solid fa-check"></i> บันทึกภาพหลักฐานเรียบร้อยแล้ว';
}

// ============================================================
// Automated Calculations for All Tables
// ============================================================
function calculateAllTables() {
    // Table 1.1 Calculation
    for (let r = 1; r <= 5; r++) {
        const c1 = parseFloat(document.getElementById(`t1_r${r}_c1`).value) || 0;
        const c2 = parseFloat(document.getElementById(`t1_r${r}_c2`).value) || 0;
        const c3 = parseFloat(document.getElementById(`t1_r${r}_c3`).value) || 0;
        if (c1 > 0 || c2 > 0 || c3 > 0) {
            const avg = (c1 + c2 + c3) / 3.0;
            const decimals = (r === 1) ? 1 : 2;
            document.getElementById(`t1_r${r}_avg`).value = avg.toFixed(decimals);
            const unc = (r === 1) ? "0.5" : (r <= 3 ? "0.05" : "0.01");
            document.getElementById(`t1_r${r}_rep`).value = `${avg.toFixed(decimals)} ± ${unc}`;
            document.getElementById(`t1_r${r}_sig`).value = (r === 1 || r >= 4) ? "3 ตัว" : "4 ตัว";
        }
    }

    // Table 1.2 Calculation (ISO 8655 Gravimetric)
    const zFactor = 1.0033;
    const nominals = [100, 500, 1000];
    const limits = [3.0, 1.2, 0.8];

    for (let r = 1; r <= 3; r++) {
        const m1 = parseFloat(document.getElementById(`t2_r${r}_m1`).value) || 0;
        const m2 = parseFloat(document.getElementById(`t2_r${r}_m2`).value) || 0;
        const m3 = parseFloat(document.getElementById(`t2_r${r}_m3`).value) || 0;
        const m4 = parseFloat(document.getElementById(`t2_r${r}_m4`).value) || 0;
        const m5 = parseFloat(document.getElementById(`t2_r${r}_m5`).value) || 0;

        const masses = [m1, m2, m3, m4, m5].filter(m => m > 0);
        if (masses.length >= 3) {
            const mAvg = masses.reduce((a, b) => a + b, 0) / masses.length;
            const vAct = mAvg * zFactor;
            const vNom = nominals[r - 1];
            const sysErr = ((vAct - vNom) / vNom) * 100.0;

            // standard deviation
            const variance = masses.reduce((acc, m) => acc + Math.pow(m - mAvg, 2), 0) / (masses.length - 1);
            const s = Math.sqrt(variance);
            const cv = (s / mAvg) * 100.0;

            document.getElementById(`t2_r${r}_mavg`).value = mAvg.toFixed(2);
            document.getElementById(`t2_r${r}_vact`).value = vAct.toFixed(2);
            document.getElementById(`t2_r${r}_err`).value = `${sysErr >= 0 ? '+' : ''}${sysErr.toFixed(2)}%`;
            document.getElementById(`t2_r${r}_cv`).value = `${cv.toFixed(2)}%`;

            const evalSelect = document.getElementById(`t2_r${r}_eval`);
            if (Math.abs(sysErr) <= limits[r - 1]) {
                evalSelect.value = "pass";
            } else {
                evalSelect.value = "fail";
            }
        }
    }
}

// ============================================================
// Strict Pre-Submission Validation & Backend Sync
// ============================================================
async function validateAndSubmitReport(e) {
    e.preventDefault();

    const fullname = document.getElementById('student_fullname').value.trim();
    const studentId = document.getElementById('student_id').value.trim();
    const program = document.getElementById('student_program').value.trim();
    const section = document.getElementById('student_section').value.trim();
    const proofBase64 = document.getElementById('image_proof_base64').value.trim();

    const calculations = document.getElementById('lab_calculations').value.trim();
    const discussion = document.getElementById('lab_discussion').value.trim();
    const conclusion = document.getElementById('lab_conclusion').value.trim();

    const q1 = document.getElementById('quiz_ans_1').value.trim();
    const q2 = document.getElementById('quiz_ans_2').value.trim();
    const q3 = document.getElementById('quiz_ans_3').value.trim();

    // 1. Check Identity
    if (!fullname || !studentId) {
        alert("⚠️ กรุณากรอกชื่อ-นามสกุล และรหัสนักศึกษาให้ครบถ้วนก่อนส่งรายงานครับ");
        document.getElementById('student_fullname').focus();
        return;
    }

    // 2. Check Screenshot Proof (Mandatory)
    if (!proofBase64) {
        alert("⚠️ ต้องมีภาพถ่ายหรือแคปหน้าจอระหว่างทดลองด้วยเสมอ!\n\nกรุณากดปุ่ม '📸 แคปหน้าจอ 3D Simulator' หรือ 'อัปโหลดไฟล์ภาพ' ในส่วนหลักฐานการทดลองด้านบนครับ");
        document.getElementById('proofBadgeStatus').scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }

    // 3. Check Table 1.1 Inputs
    for (let r = 1; r <= 5; r++) {
        for (let c = 1; c <= 3; c++) {
            const input = document.getElementById(`t1_r${r}_c${c}`);
            if (!input.value.trim()) {
                alert(`⚠️ ตารางที่ 1.1: แถวที่ ${r} ครั้งที่ ${c} ยังไม่ได้กรอกข้อมูล กรุณากรอกให้ครบถ้วนก่อนส่งครับ`);
                input.focus();
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        }
    }

    // 4. Check Table 1.2 Inputs
    for (let r = 1; r <= 3; r++) {
        for (let m = 1; m <= 5; m++) {
            const input = document.getElementById(`t2_r${r}_m${m}`);
            if (!input.value.trim()) {
                alert(`⚠️ ตารางที่ 1.2: ระดับที่ ${r} ค่าน้ำหนัก m${m} ยังไม่ได้กรอกข้อมูล กรุณากรอกให้ครบถ้วนก่อนส่งครับ`);
                input.focus();
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        }
    }

    // 5. Check Table 1.3 Inputs
    for (let c = 1; c <= 5; c++) {
        const input = document.getElementById(`t3_c${c}_size`);
        if (!input.value.trim()) {
            alert(`⚠️ ตารางที่ 1.3: โคโลนีที่ ${c} ยังไม่ได้กรอกเส้นผ่านศูนย์กลาง`);
            input.focus();
            return;
        }
    }
    for (let w = 1; w <= 4; w++) {
        const input = document.getElementById(`t3_w${w}_ntu`);
        if (!input.value.trim()) {
            alert(`⚠️ ตารางที่ 1.3: แหล่งน้ำที่ ${w} ยังไม่ได้กรอกค่า NTU`);
            input.focus();
            return;
        }
    }

    // 6. Check Calculations & Written Questions
    if (!calculations || !discussion || !conclusion) {
        alert("⚠️ กรุณาพิมพ์วิธีคำนวณ การอภิปรายผล และการสรุปผลให้ครบถ้วนก่อนส่งครับ");
        document.getElementById('lab_calculations').focus();
        return;
    }

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองให้ครบทั้ง 3 ข้อก่อนส่งครับ");
        document.getElementById('quiz_ans_1').focus();
        return;
    }

    // Run auto-calculation before packing JSON
    calculateAllTables();

    // Pack complete report payload
    const tableDataPayload = {
        table_1_1_dimensions: {
            zero_error: document.getElementById('tbl1_zero_error').value,
            rows: [1,2,3,4,5].map(r => ({
                row: r,
                m1: document.getElementById(`t1_r${r}_c1`).value,
                m2: document.getElementById(`t1_r${r}_c2`).value,
                m3: document.getElementById(`t1_r${r}_c3`).value,
                avg: document.getElementById(`t1_r${r}_avg`).value,
                report: document.getElementById(`t1_r${r}_rep`).value,
                sig_figs: document.getElementById(`t1_r${r}_sig`).value
            }))
        },
        table_1_2_pipette: {
            water_temp: document.getElementById('tbl2_water_temp').value,
            z_factor: 1.0033,
            rows: [1,2,3].map(r => ({
                nominal: r === 1 ? 100 : (r === 2 ? 500 : 1000),
                m1: document.getElementById(`t2_r${r}_m1`).value,
                m2: document.getElementById(`t2_r${r}_m2`).value,
                m3: document.getElementById(`t2_r${r}_m3`).value,
                m4: document.getElementById(`t2_r${r}_m4`).value,
                m5: document.getElementById(`t2_r${r}_m5`).value,
                m_avg: document.getElementById(`t2_r${r}_mavg`).value,
                v_actual: document.getElementById(`t2_r${r}_vact`).value,
                err_pct: document.getElementById(`t2_r${r}_err`).value,
                cv_pct: document.getElementById(`t2_r${r}_cv`).value,
                evaluation: document.getElementById(`t2_r${r}_eval`).value
            }))
        },
        table_1_3_colonies_and_water: {
            colonies: [1,2,3,4,5].map(c => ({
                colony: c,
                size_mm: document.getElementById(`t3_c${c}_size`).value,
                morphology: document.getElementById(`t3_c${c}_desc`).value
            })),
            water: [1,2,3,4].map(w => ({
                source_index: w,
                ntu: document.getElementById(`t3_w${w}_ntu`).value,
                evaluation: document.getElementById(`t3_w${w}_eval`).value
            }))
        }
    };

    const payload = {
        action: 'submit_report',
        student_id: studentId,
        fullname: fullname,
        program: program,
        section: section,
        lab_id: 'lab01',
        table_data: tableDataPayload,
        calculations: calculations,
        discussion: discussion,
        conclusion: conclusion,
        quiz_answers: { q1: q1, q2: q2, q3: q3 },
        image_proof_base64: proofBase64,
        google_sheet_webhook_url: document.getElementById('google_sheet_webhook_url').value.trim()
    };

    const submitBtn = document.getElementById('btnSubmitReport');
    const originalBtnText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> กำลังบันทึกลง SQLite และ Google Sheets...';

    try {
        const res = await fetch('../../virtual_lab/api/api.php?action=submit_report', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const result = await res.json();
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;

        if (result.success) {
            document.getElementById('modalReportCode').textContent = result.report_code || 'REP-OK';
            document.getElementById('modalStudentName').textContent = `${fullname} (${studentId})`;
            document.getElementById('modalTimestamp').textContent = result.timestamp || new Date().toLocaleString('th-TH');
            document.getElementById('modalSheetStatus').textContent = result.google_sheets_status || '✓ บันทึกสำเร็จ';

            const modal = document.getElementById('submitModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล: " + (result.error || "โปรดลองใหม่อีกครั้ง"));
        }
    } catch (err) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
        console.error("Submit error:", err);
        alert("ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ กรุณาตรวจสอบว่า XAMPP Apache ทำงานอยู่ครับ");
    }
}

function closeSubmitModal() {
    const modal = document.getElementById('submitModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

document.addEventListener('DOMContentLoaded', () => {
    initInstrument3D();
});
</script>

<?php include '../includes/footer.php'; ?>
