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

    <!-- 3D Virtual Bench & Multi-Instrument Laboratory Suite Card (Attached 3D Simulator Engine) -->
    <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-4">
        
        <!-- Header & Instrument Tabs -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-white/10 pb-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 mb-1.5">
                    <i class="fa-solid fa-atom animate-spin"></i> Interactive 3D Metrology Suite
                </div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    ห้องปฏิบัติการเครื่องมือวัดเสมือนจริง 3 มิติ (3D Precision Instruments)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    แบบจำลอง 3 มิติความละเอียดสูง พร้อม Synchronized 2D Loupe, Sound Synthesizer และวัตถุทดสอบทางจุลชีววิทยา
                </p>
            </div>

            <!-- Active Instrument Selector Buttons -->
            <div class="flex flex-wrap items-center gap-2 bg-slate-950/90 p-1.5 rounded-2xl border border-white/10">
                <button id="tabSimCaliper" onclick="switchSimulator('caliper')" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-ruler-horizontal"></i> 1. เวอร์เนียร์ (0-150 mm)
                </button>
                <button id="tabSimMicrometer" onclick="switchSimulator('micrometer')" class="px-3.5 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-circle-notch"></i> 2. ไมโครมิเตอร์ (0-25 mm)
                </button>
                <button id="tabSimPipette" onclick="switchSimulator('pipette')" class="px-3.5 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-eye-dropper"></i> 3. ไมโครปิเปต (P2-P1000)
                </button>
            </div>
        </div>

        <!-- Toolbar & Quick Action Buttons -->
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-950/70 p-3 rounded-2xl border border-white/10">
            <div class="flex items-center gap-2 text-xs text-slate-300 font-mono">
                <span id="currentSimBadge" class="px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/30">
                    📏 Vernier Caliper (0.05 mm)
                </span>
                <span id="currentSimHint" class="hidden sm:inline text-slate-400 text-[11px]">
                    คลิกค้างแล้วลากเพื่อหมุน 360° | เลื่อนปากวัดหรือหมุน Thimble เพื่ออ่านค่า
                </span>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="capture3dSimulator()" class="px-4 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 text-slate-950 shadow-lg shadow-emerald-950/40 transition flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
                </button>
                <button type="button" onclick="openSimulatorFullscreen()" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition" title="เปิดเต็มจอ">
                    <i class="fa-solid fa-expand"></i>
                </button>
                <a id="btnSimNewTab" href="../simulations/sim_vernier_caliper_3d.html" target="_blank" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="เปิดในแท็บใหม่">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>

        <!-- Iframe Viewer Container -->
        <div id="simFrameContainer" class="relative w-full rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-slate-950">
            <iframe id="simViewerFrame" src="../simulations/sim_vernier_caliper_3d.html" class="w-full h-[680px] sm:h-[720px] lg:h-[760px] border-0" allow="camera; microphone; fullscreen; autoplay"></iframe>
        </div>

        <!-- Instructional Card / Quick Tips -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-1">
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-ruler-horizontal"></i> ตารางที่ 1.1: เวอร์เนียร์แคลิปเปอร์
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ใช้เวอร์เนียร์วัดขนาดเส้นผ่านศูนย์กลางภายนอกจานเพาะเชื้อ และเส้นผ่านศูนย์กลางภายในปากหลอดทดลอง บันทึกค่า 3 ครั้ง
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-sky-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-notch"></i> ตารางที่ 1.1: ไมโครมิเตอร์วัดนอก
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ตรวจสอบ Zero Error ก่อน จากนั้นวัดความหนาของแผ่นสไลด์แก้วและขอบจานเพาะเชื้อ ปรับแก้ค่าด้วย Zero Error
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-purple-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-eye-dropper"></i> ตารางที่ 1.2: ไมโครปิเปต ISO 8655
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    สลับไปที่ไมโครปิเปต P1000 ทดลองดูดและปล่อยน้ำกลั่นลงบนเครื่องชั่งที่ 100, 500, และ 1000 µL บันทึกมวลลงในตาราง
                </p>
            </div>
        </div>

    </div>

    <!-- Academic Foundations & Mathematical Equations Suite -->
    <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-mono">
                    <i class="fa-solid fa-square-root-variable"></i> Mathematical Foundations &amp; Metrology Standards
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    หลักการและสมการฟิสิกส์พื้นฐาน (Theoretical Formulations)
                </h2>
                <p class="text-xs text-slate-400">
                    มาตรฐานการคำนวณสถิติความไม่แน่นอนทางมาตรวิทยา (GUM / ISO 8655) สำหรับการวัดความแม่นยำสูง
                </p>
            </div>
            <button type="button" onclick="toggleMathDetails('mathSuiteLab01')" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-emerald-400 border border-emerald-500/30 transition flex items-center gap-2 self-start sm:self-auto">
                <span id="mathSuiteLab01BtnText">ย่อ/ขยายสมการ</span> <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>

        <div id="mathSuiteLab01" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <!-- Card 1: Statistical Metrology & Uncertainty -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/20 space-y-3.5 hover:border-emerald-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-emerald-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-chart-line text-emerald-400"></i> ตอนที่ 1: สถิติและความไม่แน่นอน
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-mono border border-emerald-500/20">Eq. 1.1–1.3</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    เมื่อวัดปริมาณซ้ำ $N$ ครั้ง ค่าเฉลี่ยเลขคณิต ($\bar{x}$) และส่วนเบี่ยงเบนมาตรฐานของตัวอย่าง ($s$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-emerald-200">
                    $$\bar{x} = \frac{1}{N}\sum_{i=1}^N x_i \tag{1.1}$$
                    $$s = \sqrt{\frac{1}{N-1}\sum_{i=1}^N (x_i - \bar{x})^2} \tag{1.2}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    ความไม่แน่นอนมาตรฐานของค่าเฉลี่ย $u(\bar{x})$ และการรายงานผลตามมาตรฐาน ISO/IEC Guide 98-3 (GUM):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-emerald-200">
                    $$u(\bar{x}) = \frac{s}{\sqrt{N}}, \quad x = \bar{x} \pm u(\bar{x}) \tag{1.3}$$
                </div>
            </div>

            <!-- Card 2: Micrometer Zero Error Correction -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/20 space-y-3.5 hover:border-sky-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-sky-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-circle-notch text-sky-400"></i> ตอนที่ 2: การปรับแก้ Zero Error
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 font-mono border border-sky-500/20">Eq. 1.4</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    ไมโครมิเตอร์วัดนอก (0-25 mm) ต้องตรวจสอบจุดศูนย์เมื่อหน้าสัมผัส Anvil และ Spindle ชนกัน:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$x_{\text{true}} = x_{\text{measured}} - e_{\text{zero}} \tag{1.4}$$
                </div>
                <ul class="text-[11px] text-slate-400 space-y-1.5 list-disc list-inside">
                    <li><strong class="text-emerald-400">Positive Zero Error (+):</strong> เส้นศูนย์ของ Thimble อยู่เลยแนว Datum Line (วัดได้เกิน ต้องหักออก)</li>
                    <li><strong class="text-rose-400">Negative Zero Error (-):</strong> เส้นศูนย์ของ Thimble ยังไม่ถึงแนว Datum Line (วัดได้ขาด ต้องบวกชดเชย)</li>
                </ul>
            </div>

            <!-- Card 3: ISO 8655 Gravimetric Micropipette Calibration -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-purple-500/20 space-y-3.5 hover:border-purple-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-purple-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-eye-dropper text-purple-400"></i> ตอนที่ 3: ISO 8655 Gravimetric Method
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-purple-500/10 text-purple-400 font-mono border border-purple-500/20">Eq. 1.5–1.7</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    แปลงค่าน้ำหนักน้ำกลั่นที่ชั่งได้ ($m_i$) ไปเป็นปริมาตรจริง ($V_i$) ที่อุณหภูมิอ้างอิง $20^\circ\text{C}$ ด้วย $Z$-factor:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-purple-200">
                    $$V_i = m_i \times Z \tag{1.5}$$
                    $$\bar{V} = \frac{1}{n}\sum_{i=1}^n V_i = \bar{m} \times Z$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    การประเมิน Systematic Error ($E\%$) และ Random Error ($\text{CV}\%$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-purple-200">
                    $$E\% = \left(\frac{\bar{V} - V_0}{V_0}\right) \times 100\% \tag{1.6}$$
                    $$\text{CV}\% = \left(\frac{s_V}{\bar{V}}\right) \times 100\% \tag{1.7}$$
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
                <div class="space-y-2.5">
                    <label class="block text-xs font-bold text-slate-300">
                        1. แสดงวิธีคำนวณโดยละเอียด (Detailed Calculations) <span class="text-rose-400">*</span>
                    </label>
                    <p class="text-[11px] text-slate-400">
                        แสดงวิธีคำนวณหาค่าเฉลี่ย ($\bar{x}$), ค่าความไม่แน่นอน ($\pm \Delta x$), การแปลงมวลเป็นปริมาตรด้วย $Z$-factor ($V = m \times Z$), และการคำนวณ Inaccuracy ($E\%$) หรือ Imprecision ($\text{CV}\%$)
                    </p>

                    <!-- Formula Guide Box -->
                    <div class="p-4 rounded-2xl bg-slate-950/90 border border-amber-500/30 space-y-2.5">
                        <div class="flex items-center justify-between text-xs font-bold text-amber-400 font-mono">
                            <span><i class="fa-solid fa-book-open"></i> โครงสร้างสูตรคำนวณตามมาตรฐานวิชาการ (Academic Calculation Structure)</span>
                            <span class="text-[10px] text-slate-400">แทนค่าตัวเลขจากตารางลงในกล่องข้อความ</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-emerald-400">1. การคำนวณค่าเฉลี่ยและความไม่แน่นอน:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $\bar{x} = \frac{x_1 + x_2 + x_3}{3}, \quad u(\bar{x}) = \frac{s}{\sqrt{3}}$<br>
                                    รายงานผลในรูป $\bar{x} \pm u(\bar{x})\text{ mm}$ พร้อมระบุเลขนัยสำคัญ
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-purple-400">2. การคำนวณไมโครปิเปตตาม ISO 8655:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $\bar{V} = \bar{m} \times Z \quad (Z = 1.0033\ \mu\text{L/mg})$<br>
                                    $E\% = \frac{\bar{V} - V_0}{V_0} \times 100\%, \quad \text{CV}\% = \frac{s}{\bar{V}} \times 100\%$
                                </div>
                            </div>
                        </div>
                    </div>

                    <textarea id="lab_calculations" name="lab_calculations" rows="5" placeholder="ตัวอย่างการคำนวณ:
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
// Interactive 3D Metrology Suite Controller
// Manages switching between:
// 1. Vernier Caliper (sim_vernier_caliper_3d.html)
// 2. Micrometer Screw Gauge (sim_micrometer_3d.html)
// 3. Micropipette Suite (sim_micropipette_3d.html)
// ============================================================
let currentSim = 'caliper';

const simConfigs = {
    caliper: {
        url: '../simulations/sim_vernier_caliper_3d.html',
        badge: '📏 Vernier Caliper (0.05 mm)',
        hint: 'คลิกค้างแล้วลากเพื่อหมุน 360° | เลื่อนปากวัดหรือคลิกวัตถุตัวอย่างเพื่ออ่านค่าเวอร์เนียร์',
        theme: 'emerald'
    },
    micrometer: {
        url: '../simulations/sim_micrometer_3d.html',
        badge: '⚙️ Micrometer Screw Gauge (0.01 mm)',
        hint: 'หมุนปลอก Thimble หรือ Ratchet Stop เพื่อวัดความหนา พร้อมตรวจสอบ Zero Error',
        theme: 'sky'
    },
    pipette: {
        url: '../simulations/sim_micropipette_3d.html',
        badge: '🧪 Micropipette (P2 / P20 / P200 / P1000)',
        hint: 'เลือกรุ่นปิเปต เสียบทิป ดูดน้ำกลั่น และชั่งน้ำหนักบนเครื่องชั่งตามมาตรฐาน ISO 8655',
        theme: 'purple'
    }
};

function switchSimulator(type) {
    if (!simConfigs[type]) return;
    currentSim = type;
    const config = simConfigs[type];

    const frame = document.getElementById('simViewerFrame');
    if (frame && frame.src !== config.url) {
        frame.src = config.url;
    }

    const badge = document.getElementById('currentSimBadge');
    if (badge) badge.textContent = config.badge;

    const hint = document.getElementById('currentSimHint');
    if (hint) hint.textContent = config.hint;

    const newTabBtn = document.getElementById('btnSimNewTab');
    if (newTabBtn) newTabBtn.href = config.url;

    // Update active tab buttons
    const tabCaliper = document.getElementById('tabSimCaliper');
    const tabMicro = document.getElementById('tabSimMicrometer');
    const tabPip = document.getElementById('tabSimPipette');

    [tabCaliper, tabMicro, tabPip].forEach(btn => {
        if (btn) btn.className = 'px-3.5 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2';
    });

    if (type === 'caliper' && tabCaliper) {
        tabCaliper.className = 'px-3.5 py-2 rounded-xl text-xs font-bold bg-emerald-500 text-slate-950 shadow-md transition flex items-center gap-2';
    } else if (type === 'micrometer' && tabMicro) {
        tabMicro.className = 'px-3.5 py-2 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-md transition flex items-center gap-2';
    } else if (type === 'pipette' && tabPip) {
        tabPip.className = 'px-3.5 py-2 rounded-xl text-xs font-bold bg-purple-500 text-white shadow-md transition flex items-center gap-2';
    }
}

function openSimulatorFullscreen() {
    const container = document.getElementById('simFrameContainer');
    if (!container) return;
    if (!document.fullscreenElement) {
        if (container.requestFullscreen) {
            container.requestFullscreen();
        } else if (container.webkitRequestFullscreen) {
            container.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
}

// ============================================================
// Snapshot & Proof Capture Logic
// ============================================================
function capture3dSimulator() {
    try {
        const frame = document.getElementById('simViewerFrame');
        let dataUrl = null;

        if (frame && frame.contentWindow) {
            // Priority 1: Check if the simulator exposed a direct screenshot capture function
            if (typeof frame.contentWindow.captureSimulatorScreenshot === 'function') {
                dataUrl = frame.contentWindow.captureSimulatorScreenshot();
            }
            
            // Priority 2: Grab the primary WebGL canvas from simulator iframe
            if (!dataUrl) {
                const canvas = frame.contentWindow.document.querySelector('canvas');
                if (canvas) {
                    dataUrl = canvas.toDataURL('image/png');
                }
            }
        }

        if (dataUrl && dataUrl.length > 500) {
            setProofImage(dataUrl);
            alert('📸 แคปภาพหน้าจอ 3D Simulator สำเร็จ!\nภาพได้ถูกบันทึกและแนบลงในช่องหลักฐานการทดลองเรียบร้อยแล้ว');
            const proofSection = document.getElementById('proofBadgeStatus');
            if (proofSection) {
                proofSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } else {
            alert("⚠️ ไม่สามารถดึงภาพจาก 3D Simulator ได้โดยตรง กรุณาใช้ปุ่ม 'อัปโหลดไฟล์ภาพ / แคปหน้าจอ' ในส่วนหลักฐานการทดลองด้านล่างครับ");
        }
    } catch (err) {
        console.error('3D capture failed:', err);
        alert('⚠️ เกิดข้อผิดพลาดในการดึงภาพหน้าจอ: ' + (err.message || err) + '\nกรุณาใช้ปุ่มอัปโหลดภาพแทนครับ');
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

function toggleMathDetails(id) {
    const el = document.getElementById(id);
    const btn = document.getElementById(id + 'BtnText');
    if (!el) return;
    if (el.classList.contains('hidden')) {
        el.classList.remove('hidden');
        if (btn) btn.textContent = 'ย่อสูตรสมการ';
        if (window.MathJax && window.MathJax.typesetPromise) window.MathJax.typesetPromise();
    } else {
        el.classList.add('hidden');
        if (btn) btn.textContent = 'ขยายสูตรสมการ';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initInstrument3D();
    if (window.MathJax && window.MathJax.typesetPromise) {
        window.MathJax.typesetPromise();
    }
});
</script>

<?php include '../includes/footer.php'; ?>
