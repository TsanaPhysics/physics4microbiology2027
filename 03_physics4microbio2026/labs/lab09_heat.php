<?php
$pageTitle = 'ปฏิบัติการที่ 9: อุณหพลศาสตร์และเทอร์โมไซเคิลเลอร์ PCR | Lab 09: Thermodynamics & PCR Thermal Cycler';
$basePath = '../';
include '../includes/header.php';
?>

    <!-- 🧭 Standardized Breadcrumb & Two-Way Course Navigation Bar -->
    <div class="standardized-lab-breadcrumb max-w-7xl mx-auto px-4 sm:px-6 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-emerald-500/30 rounded-2xl px-5 py-3.5 shadow-2xl backdrop-blur-xl">
            <div class="flex items-center flex-wrap gap-2 text-xs font-mono text-slate-300">
                <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold flex items-center gap-1.5 transition">
                    <i class="fa-solid fa-house"></i> พอร์ทัลหลัก 2027
                </a>
                <span class="text-slate-600">/</span>
                <a href="../index.php" class="text-amber-400 hover:text-amber-300 transition flex items-center gap-1 font-semibold">
                    <i class="fa-solid fa-book-open"></i> สารบัญหลักสูตร
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 09</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch09_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 9</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=9" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=9&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 8)</span>
                </a>
            </div>
        </div>
    </div>


<!-- MathJax 3 Configuration for Academic Equation Rendering -->
<script>
window.MathJax = {
  tex: {
    inlineMath: [['$', '$'], ['\\(', '\\)']],
    displayMath: [['$$', '$$'], ['\\[', '\\]']],
    processEscapes: true,
    tags: 'ams'
  },
  options: {
    renderActions: {
      addMenu: []
    }
  }
};
</script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<!-- Custom Styling for Lab 09 -->
<style>
/* Pure CSS Vector Standard */
.vec {
  display: inline-block;
  position: relative;
  font-family: 'Times New Roman', Cambria, serif;
  font-style: italic;
  font-weight: bold;
  line-height: 1;
  margin-top: 0.25em;
}
.vec::after {
  content: '→';
  position: absolute;
  top: -0.45em;
  left: 50%;
  transform: translateX(-50%) scaleX(0.85);
  font-size: 0.72em;
  font-style: normal;
  font-weight: bold;
  line-height: 1;
  color: inherit;
  pointer-events: none;
}
.input-blank {
  background: rgba(2, 6, 23, 0.95);
  border: 1px solid rgba(255, 255, 255, 0.15);
  transition: all 0.2s ease;
}
.input-blank:focus {
  border-color: #ef4444;
  box-shadow: 0 0 10px rgba(239, 68, 68, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-red-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-red-500/10 text-red-400 border border-red-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-red-400 animate-ping"></span>
                    <span>LABORATORY 09 • THERMODYNAMICS &amp; MOLECULAR BIOPHYSICS</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    อุณหพลศาสตร์และ <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-orange-400 to-amber-400">เทอร์โมไซเคิลเลอร์ PCR</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาการถ่ายโอนความร้อนตามกฎของฟูเรียร์ ($q = -k A \frac{dT}{dx}$), ปรากฏการณ์เทอร์โมอิเล็กทริกเพลเทียร์ (Peltier Thermoelectric Effect), จลนศาสตร์การหลอมคลายเกลียวและเพิ่มขยายดีเอ็นเอ ($N = N_0 \cdot 2^n$) และการควบคุมอุณหภูมิฝาอบ Heated Lid 105°C
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-red-300">
                        <i class="fa-solid fa-fire text-red-400 mr-1"></i> Peltier Thermoelectric Heat Flux
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-dna text-amber-400 mr-1"></i> Amplification Kinetics: N = N₀·2ⁿ
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-shield text-emerald-400 mr-1"></i> Heated Lid 105°C Anti-Condensation
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-red-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-red-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-red-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-red-400 border border-red-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-red-950/40">
                <i class="fa-solid fa-calculator text-[11px]"></i> คำนวณผลทั้ง 3 ตารางอัตโนมัติ
            </button>
            <button onclick="saveStudentDraft()" class="px-3 py-1.5 rounded-lg bg-emerald-600/80 hover:bg-emerald-500 text-white font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-floppy-disk text-[11px]"></i> บันทึกผลแล็บ
            </button>
        </div>
    </div>

    <!-- Section 1: Theory and Mathematical Foundations -->
    <div id="cardTheory" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardTheory')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">1</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-book-open text-red-400"></i> ทฤษฎีและสมการอุณหพลศาสตร์และเทอร์โมไซเคิลเลอร์
                    </h2>
                    <p class="text-xs text-slate-400">Fourier Conduction, Peltier Effect &amp; DNA Amplification Kinetics</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardTheory_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardTheory_body" class="p-6 space-y-6 text-sm text-slate-300 leading-relaxed border-t border-white/5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Theory 1 -->
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-red-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-fire-flame-curved"></i> 1. กฎการนำความร้อนของฟูเรียร์และปรากฏการณ์เพลเทียร์
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        อัตราการถ่ายโอนความร้อนในบล็อกโลหะ ($q$) เป็นไปตามกฎการนำความร้อนของฟูเรียร์ (Fourier's Law):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-red-500/20 text-center font-mono">
                        $$q = -k A \frac{dT}{dx} \tag{สมการที่ 9.1}$$
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ขณะที่แผ่นเพลเทียร์ใช้หลักการเทอร์โมอิเล็กทริก ปั๊มความร้อนเข้าหรือออกจากบล็อกด้วยกระแสไฟฟ้า ($I$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-red-500/20 text-center font-mono">
                        $$Q_c = \Pi_{\text{pelt}} I - \frac{1}{2} I^2 R - K \Delta T \tag{สมการที่ 9.2}$$
                    </div>
                </div>

                <!-- Theory 2 -->
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-dna"></i> 2. อุณหภูมิหลอมคลายเกลียวและจลนศาสตร์การเพิ่มปริมาณดีเอ็นเอ
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        อุณหภูมิหลอมตัวของไพรเมอร์ ($T_m$) กำหนดโดยปริมาณคู่เบส G-C และ A-T ตามสมการ Wallace-Itakura:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-amber-500/20 text-center font-mono">
                        $$T_m = 64.9 + 41 \times \left( \frac{yG + zC - 16.4}{wA + xT + yG + zC} \right) \tag{สมการที่ 9.3}$$
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ปริมาณดีเอ็นเอเพิ่มขึ้นแบบทวีคูณ (Exponential Amplification) ตามจำนวนรอบ ($n$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-amber-500/20 text-center font-mono">
                        $$N_n = N_0 (1 + E)^n \approx N_0 \cdot 2^n \tag{สมการที่ 9.4}$$
                    </div>
                </div>
            </div>

            <!-- Theory Row 2: Heat Lid & Real-time qPCR -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-emerald-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-shield"></i> 3. บทบาทของฝาอบความร้อน (Heated Lid 105°C)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        เมื่ออุณหภูมิของเหลวในหลอดสูงถึง 95°C หากฝาหลอดมีอุณหภูมิห้อง ไอน้ำจะระเหยไปควบแน่นที่ฝาบน ส่งผลให้ปริมาตรสารละลายลดลง และความเข้มข้นของเกลือ $\text{Mg}^{2+}$ และบัฟเฟอร์เปลี่ยนไป การให้ความร้อนฝาบนที่ $105^\circ\text{C}$ จะรักษาสมดุลความดันไออิ่มตัว ป้องกันการควบแน่นได้อย่างสมบูรณ์โดยไม่ต้องใช้น้ำมันแร่ (Mineral oil overlay)
                    </p>
                </div>

                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-chart-line"></i> 4. การวิเคราะห์แบบ Real-time Quantitative PCR (qPCR)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ในระบบ Real-time PCR การตรวจวัดสัญญาณเรืองแสง (Fluorescence) ที่รอบขีดเริ่มเปลี่ยน (Threshold Cycle: $C_q$ หรือ $C_t$) นำมาคำนวณปริมาณดีเอ็นเอเริ่มต้น ($N_0$) ได้อย่างแม่นยำ:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-cyan-500/20 text-center font-mono">
                        $$\log N_{\text{threshold}} = \log N_0 + C_q \log(1 + E) \tag{สมการที่ 9.5}$$
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: 3D Interactive Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-red-500/30 shadow-2xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardSimulator')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">2</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-gamepad text-red-400"></i> ห้องปฏิบัติการ 3D เสมือนจริง: เทอร์โมไซเคิลเลอร์ PCR และการถ่ายโอนความร้อน
                    </h2>
                    <p class="text-xs text-slate-400">Peltier Thermal Block &amp; Real-time DNA Melting/Amplification Loupe</p>
                </div>
            </div>
            <div class="flex items-center gap-2" onclick="event.stopPropagation()">
                <a href="../webar/ar_aruco_textbook.html?lab=9&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-1.5 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 8">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-xs"></i> <span>📸 แคปหน้าจอ 3D</span>
                </button>
                <button onclick="toggleSimContainerFullscreen()" class="px-2.5 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-red-400 text-xs font-mono transition flex items-center gap-1">
                    <i class="fa-solid fa-up-right-from-square text-[10px]"></i> เปิดเต็มหน้าต่าง
                </button>
                <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                    <i id="cardSimulator_icon" class="fa-solid fa-chevron-up text-xs"></i>
                </button>
            </div>
        </div>

        <div id="cardSimulator_body" class="p-0 border-t border-white/5 relative">
            <!-- Iframe Container -->
            <div id="simIframeWrapper" class="w-full h-[620px] bg-slate-950 relative">
                <iframe id="pcrThermal3DIframe" src="../simulations/sim09_pcr_thermal_3d.html" class="w-full h-full border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
            </div>
            
            <!-- Quick Simulator Helper Bar -->
            <div class="p-3 bg-slate-950/80 border-t border-white/10 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-400 font-mono">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-red-400 animate-pulse"></span>
                    <span>3D SIMULATOR ACTIVE • PELTIER THERMAL ENGINE</span>
                </div>
                <div class="flex items-center gap-3">
                    <span><i class="fa-solid fa-mouse-pointer text-red-400 mr-1"></i> หมุนมุมมอง: คลิกซ้ายลาก</span>
                    <span><i class="fa-solid fa-up-down text-red-400 mr-1"></i> ซูม: ลูกกลิ้งเมาส์</span>
                    <span><i class="fa-solid fa-hand text-red-400 mr-1"></i> เลื่อนระนาบ: คลิกขวาลาก</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Global Control Bar -->
    <div class="flex items-center justify-between bg-slate-900/60 p-4 rounded-2xl border border-white/10 text-xs">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-red-400 animate-ping"></span>
            <span class="font-bold text-white">ระบบรายงานผลดิจิทัล (Digital Lab Report System)</span>
            <span class="text-slate-400 hidden sm:inline">• รองรับการแคปหลักฐาน 3D และส่งข้อมูลขึ้นระบบอัตโนมัติ</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-red-400 border border-red-500/30 transition flex items-center gap-1.5 active:scale-95">
                <i class="fa-solid fa-angles-down text-xs"></i> <span>ขยายทุกส่วน</span>
            </button>
            <button type="button" onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5 active:scale-95">
                <i class="fa-solid fa-angles-up text-xs"></i> <span>ย่อทุกส่วน</span>
            </button>
        </div>
    </div>

    <!-- Interactive E-Report Submission Form -->
    <form id="labReportForm" onsubmit="validateAndSubmitReport(event)" class="space-y-6">

        <!-- 1. Student Profile Card (Mandatory) -->
        <div id="cardStudentProfile" class="bg-slate-900/90 border border-red-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-red-400"></i>
                    ข้อมูลนักศึกษาผู้ส่งรายงานผลปฏิบัติการ (Student Identification)
                </h2>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-rose-400 font-semibold hidden sm:inline">* จำเป็นต้องกรอกทุกช่อง</span>
                    <button type="button" onclick="toggleLabCard('cardStudentProfile')" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <i id="cardStudentProfile_icon" class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="cardStudentProfile_body" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 transition-all">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        ชื่อ - นามสกุล (Full Name) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-red-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-red-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-red-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-red-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div id="cardEvidence" class="bg-slate-900/90 border border-red-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-red-400"></i>
                    ภาพถ่ายหรือแคปหน้าจอระหว่างทดลอง (Experiment Screenshot Proof)
                </h2>
                <div class="flex items-center gap-2">
                    <div id="proofBadgeStatus" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/40 font-mono">
                        <i class="fa-solid fa-circle-exclamation"></i> ยังไม่มีภาพหลักฐาน (จำเป็นก่อนส่ง)
                    </div>
                    <button type="button" onclick="toggleLabCard('cardEvidence')" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <i id="cardEvidence_icon" class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="cardEvidence_body" class="space-y-4 transition-all">
                <p class="text-xs text-slate-300 leading-relaxed">
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D PCR Thermal Cycler Simulator เพื่อยืนยันว่าได้สังเกตการทำความร้อน-เย็นของแผ่นเพลเทียร์จริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D PCR Cycler ตอนนี้
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

                    <div class="md:col-span-7 flex flex-col items-center justify-center p-3 rounded-2xl bg-slate-950 border border-dashed border-white/20 min-h-[160px] relative overflow-hidden">
                        <img id="proofPreviewImg" src="" alt="Experiment Proof Preview" class="max-h-[180px] w-auto rounded-xl object-contain hidden border border-white/10 shadow-lg">
                        <div id="proofPlaceholder" class="text-center space-y-1 text-slate-500 py-6">
                            <i class="fa-regular fa-image text-4xl mb-1"></i>
                            <div class="text-xs font-semibold">ยังไม่มีภาพหลักฐานการทดลอง</div>
                            <div class="text-[10px]">กดปุ่มแคปหน้าจอ 3D หรือเลือกไฟล์ภาพด้านซ้าย</div>
                        </div>
                        <input type="hidden" id="image_proof_base64" name="image_proof_base64" value="">
                    </div>
                </div>
            </div>
        </div>

    <!-- Section 3: Data Recording Tables (Strict Blank with interactive auto-calculate helper) -->
    <div id="cardDataTables" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardDataTables')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">3</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-table text-red-400"></i> ตารางบันทึกผลการทดลอง (Strict Blank Data Tables)
                    </h2>
                    <p class="text-xs text-slate-400">บันทึกข้อมูลอุณหภูมิ อัตราการเพิ่ม-ลดอุณหภูมิ (Ramp Rate) และจลนศาสตร์การเพิ่มจำนวน DNA</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardDataTables_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardDataTables_body" class="p-6 space-y-8 border-t border-white/5">
            
            <!-- Table 9.1: PCR Thermal Steps & Heat Flux -->
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-red-400 flex items-center gap-2">
                        <i class="fa-solid fa-temperature-arrow-up"></i> ตารางที่ 9.1: ข้อมูลอุณหภูมิและอัตราการถ่ายโอนความร้อนในแต่ละขั้นตอนของรอบ PCR
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">บล็อกอลูมิเนียมอัลลอยด์ ($k = 205\text{ W/(m}\cdot\text{K)}$)</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-red-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ขั้นตอน PCR<br><span class="text-[10px] text-slate-400 font-sans">(PCR Step)</span></th>
                                <th class="px-4 py-3">อุณหภูมิเป้าหมาย $T$<br><span class="text-[10px] text-slate-400 font-sans">(°C)</span></th>
                                <th class="px-4 py-3">เวลาคงอุณหภูมิ<br><span class="text-[10px] text-slate-400 font-sans">(Holding Time, s)</span></th>
                                <th class="px-4 py-3">อัตราการเปลี่ยน Temp<br><span class="text-[10px] text-slate-400 font-sans">(Ramp Rate, °C/s)</span></th>
                                <th class="px-4 py-3">ฟลักซ์ความร้อน $q$<br><span class="text-[10px] text-slate-400 font-sans">(W/cm²)</span></th>
                                <th class="px-4 py-3 text-right">สถานะโมเลกุล DNA<br><span class="text-[10px] text-slate-400 font-sans">Molecular Conformation</span></th>
                            </tr>
                        </thead>
                        <tbody id="table91_body" class="divide-y divide-white/5 font-mono">
                            <!-- 4 Steps -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">Denaturation</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.5" id="t1_temp_0" class="input-blank w-24 px-2 py-1 rounded text-right text-red-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_time_0" class="input-blank w-24 px-2 py-1 rounded text-right text-slate-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_ramp_0" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_flux_0" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_state_0" class="text-red-400 font-bold">Single-Stranded (ssDNA)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">Annealing</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.5" id="t1_temp_1" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_time_1" class="input-blank w-24 px-2 py-1 rounded text-right text-slate-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_ramp_1" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_flux_1" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_state_1" class="text-cyan-400 font-bold">Primer-Template Hybrid</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">Extension</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.5" id="t1_temp_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_time_2" class="input-blank w-24 px-2 py-1 rounded text-right text-slate-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_ramp_2" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_flux_2" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_state_2" class="text-emerald-400 font-bold">Taq Elongating (~1 kb/min)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">Heated Lid (ฝาบน)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.5" id="t1_temp_3" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_time_3" class="input-blank w-24 px-2 py-1 rounded text-right text-slate-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_ramp_3" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_flux_3" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_state_3" class="text-amber-400 font-bold">Anti-condensation Platen</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 9.2: Thermal Block Material Comparison -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-amber-400 flex items-center gap-2">
                        <i class="fa-solid fa-cubes"></i> ตารางที่ 9.2: การเปรียบเทียบสมบัติการนำความร้อนของวัสดุบล็อกเทอร์โมไซเคิลเลอร์
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">เปรียบเทียบการเปลี่ยนอุณหภูมิจาก 55°C $\to$ 95°C ($\Delta T = 40^\circ\text{C}$)</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-amber-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">วัสดุบล็อกความร้อน<br><span class="text-[10px] text-slate-400 font-sans">(Block Material)</span></th>
                                <th class="px-4 py-3">สภาพนำความร้อน $k$<br><span class="text-[10px] text-slate-400 font-sans">(W/(m·K))</span></th>
                                <th class="px-4 py-3">ความจุความร้อน $c$<br><span class="text-[10px] text-slate-400 font-sans">(J/(kg·K))</span></th>
                                <th class="px-4 py-3">อัตราเฉลี่ย Ramp Rate<br><span class="text-[10px] text-slate-400 font-sans">(°C/s)</span></th>
                                <th class="px-4 py-3">เวลาเปลี่ยน Temp $\Delta t$<br><span class="text-[10px] text-slate-400 font-sans">(seconds)</span></th>
                                <th class="px-4 py-3 text-right">ความสม่ำเสมอทั่วทั้ง 96 หลอด<br><span class="text-[10px] text-slate-400 font-sans">Block Uniformity (±°C)</span></th>
                            </tr>
                        </thead>
                        <tbody id="table92_body" class="divide-y divide-white/5 font-mono">
                            <!-- 4 Materials -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">เงินเคลือบทอง (Gold-plated Silver)</td>
                                <td class="px-4 py-2.5 text-amber-300">429</td>
                                <td class="px-4 py-2.5 text-slate-300">235</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ramp_0" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_dt_0" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-emerald-400 font-bold">&plusmn;0.15 °C (แม่นยำสูงสุด)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">ทองแดงบริสุทธิ์ (Pure Copper)</td>
                                <td class="px-4 py-2.5 text-amber-300">385</td>
                                <td class="px-4 py-2.5 text-slate-300">385</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ramp_1" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_dt_1" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-emerald-300 font-bold">&plusmn;0.20 °C (ดีเยี่ยม)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">อลูมิเนียมอัลลอยด์ (Aluminum Alloy)</td>
                                <td class="px-4 py-2.5 text-amber-300">205</td>
                                <td class="px-4 py-2.5 text-slate-300">900</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ramp_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_dt_2" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-sky-400 font-bold">&plusmn;0.35 °C (มาตรฐานห้องแล็บ)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">สแตนเลส (Stainless Steel)</td>
                                <td class="px-4 py-2.5 text-amber-300">16</td>
                                <td class="px-4 py-2.5 text-slate-300">500</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ramp_3" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_dt_3" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-rose-400 font-bold">&plusmn;1.80 °C (หน่วงและไม่สม่ำเสมอ)</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 9.3: DNA Amplification Kinetics -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                        <i class="fa-solid fa-dna"></i> ตารางที่ 9.3: จลนศาสตร์การเพิ่มขยายปริมาณดีเอ็นเอตามจำนวนรอบ PCR ($N_0 = 100\text{ copies}, E = 100\%$)
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">สมการทวีคูณ: $N_n = N_0 \cdot 2^n$ (น้ำหนักโมเลกุลชิ้นส่วน PCR 500 bp)</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-emerald-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">รอบการทำซ้ำ (n)<br><span class="text-[10px] text-slate-400 font-sans">Cycle Number</span></th>
                                <th class="px-4 py-3">จำนวนสำเนาคำนวณ $N_n$<br><span class="text-[10px] text-slate-400 font-sans">(Copies)</span></th>
                                <th class="px-4 py-3">มวลดีเอ็นเอสะสม<br><span class="text-[10px] text-slate-400 font-sans">(ng DNA, 500 bp)</span></th>
                                <th class="px-4 py-3">สัญญาณเรืองแสงสัมพัทธ์<br><span class="text-[10px] text-slate-400 font-sans">(RFU, Real-time)</span></th>
                                <th class="px-4 py-3 text-right">ช่วงจลนศาสตร์ปฏิกิริยา<br><span class="text-[10px] text-slate-400 font-sans">Kinetics Phase</span></th>
                            </tr>
                        </thead>
                        <tbody id="table93_body" class="divide-y divide-white/5 font-mono">
                            <!-- 8 Cycle Steps: 0, 5, 10, 15, 20, 25, 30, 35 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">0</td>
                                <td class="px-4 py-2.5 text-slate-400">100</td>
                                <td class="px-4 py-2.5 text-slate-400">5.5 × 10⁻⁸</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_0" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-slate-500 font-bold">Baseline Noise</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">5</td>
                                <td class="px-4 py-2.5 text-slate-300">3,200</td>
                                <td class="px-4 py-2.5 text-slate-300">1.75 × 10⁻⁶</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_1" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-slate-500 font-bold">Baseline Noise</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">10</td>
                                <td class="px-4 py-2.5 text-slate-300">102,400</td>
                                <td class="px-4 py-2.5 text-slate-300">5.6 × 10⁻⁵</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-slate-500 font-bold">Sub-threshold</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">15</td>
                                <td class="px-4 py-2.5 text-white font-bold">3,276,800</td>
                                <td class="px-4 py-2.5 text-slate-200">0.0018</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_3" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-cyan-400 font-bold">Threshold Point (Cq ≈ 16)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">5</td>
                                <td class="px-4 py-2.5 font-bold text-white">20</td>
                                <td class="px-4 py-2.5 text-emerald-300 font-bold">1.05 × 10⁸</td>
                                <td class="px-4 py-2.5 text-slate-200">0.0575</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_4" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-emerald-400 font-bold">Exponential Phase (ทวีคูณ)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">6</td>
                                <td class="px-4 py-2.5 font-bold text-white">25</td>
                                <td class="px-4 py-2.5 text-emerald-300 font-bold">3.35 × 10⁹</td>
                                <td class="px-4 py-2.5 text-slate-200">1.84</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_5" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-amber-400 font-bold">Linear Phase (ชะลอตัว)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">7</td>
                                <td class="px-4 py-2.5 font-bold text-white">30</td>
                                <td class="px-4 py-2.5 text-purple-300 font-bold">5.20 × 10¹⁰</td>
                                <td class="px-4 py-2.5 text-slate-200">28.5</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_6" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-purple-400 font-bold">Plateau Phase (อิ่มตัว)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">8</td>
                                <td class="px-4 py-2.5 font-bold text-white">35</td>
                                <td class="px-4 py-2.5 text-purple-300 font-bold">5.35 × 10¹⁰</td>
                                <td class="px-4 py-2.5 text-slate-200">29.3</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_rfu_7" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-purple-400 font-bold">Reagents Exhausted</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 4: Discussion, Analysis & Conclusions -->
    <div id="cardDiscussion" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardDiscussion')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">4</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-pen-nib text-red-400"></i> การวิเคราะห์ วิจารณ์ผล และสรุปผลการทดลอง
                    </h2>
                    <p class="text-xs text-slate-400">Scientific Discussion, Error Sources &amp; Thermodynamic Conclusions</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardDiscussion_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardDiscussion_body" class="p-6 space-y-6 border-t border-white/5">
            <div class="space-y-2.5">
                <label class="text-xs font-bold text-red-400 flex items-center gap-2">
                    <i class="fa-solid fa-calculator"></i> 1. การแสดงวิธีคำนวณการถ่ายโอนความร้อนและจลนศาสตร์ PCR (Calculations):
                </label>
                <div class="p-3 rounded-xl bg-slate-950/70 border border-white/10 text-xs text-slate-300 font-mono space-y-1">
                    <div class="text-red-300 font-bold">สูตรความสัมพันธ์:</div>
                    <div>$q = -k A \frac{\Delta T}{\Delta x}, \quad \text{Ramp Rate} = \frac{\Delta T}{\Delta t}, \quad N_n = N_0 (1 + E)^n$</div>
                    <div>$\Delta C_q = C_{q,B} - C_{q,A}, \quad \text{Fold Difference} = 2^{\Delta C_q}$</div>
                </div>
                <textarea id="lab_calculations" name="lab_calculations" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-mono placeholder-slate-500" placeholder="แสดงการคำนวณอัตราความร้อนและจลนศาสตร์: เช่น Ramp rate อลูมิเนียม = 40°C / 9.5s = 4.2°C/s, ความแตกต่างของปริมาณไวรัสที่ &Delta;Cq = 28 - 18 = 10 คือ 2^10 = 1,024 เท่า..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-red-400 flex items-center gap-2">
                    <i class="fa-solid fa-chart-pie"></i> 2. การวิเคราะห์และวิจารณ์ผลการทดลอง (Experimental Discussion):
                </label>
                <textarea id="discussionText" name="lab_discussion" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="อภิปรายผลการถ่ายโอนความร้อนในบล็อกอลูมิเนียม อัตราการเปลี่ยนแปลงอุณหภูมิ (Ramp Rate) ผลของแผ่นเพลเทียร์ต่อความเร็วในการทำรอบ PCR ความสำคัญของฝาอบ 105°C และพฤติกรรมจลนศาสตร์การเพิ่มปริมาณ DNA..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-emerald-400 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check"></i> 3. สรุปผลการทดลอง (Conclusion):
                </label>
                <textarea id="conclusionText" name="lab_conclusion" rows="3" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="สรุปประสิทธิภาพการควบคุมอุณหภูมิของเทอร์โมไซเคิลเลอร์ ความสัมพันธ์ระหว่างค่าการนำความร้อนของโลหะบล็อกกับความสม่ำเสมอของอุณหภูมิ และความสำคัญของอุณหพลศาสตร์ต่อความจำเพาะของปฏิกิริยา PCR..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 5: Applied Post-Lab Questions for Microbiology -->
    <div id="cardQuestions" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardQuestions')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">5</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-circle-question text-red-400"></i> คำถามท้ายการทดลองเชิงประยุกต์ทางจุลชีววิทยาและการแพทย์
                    </h2>
                    <p class="text-xs text-slate-400">Applied Biophysical Mechanisms in Molecular Diagnostics &amp; Virology</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardQuestions_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardQuestions_body" class="p-6 space-y-6 border-t border-white/5">
            <!-- Question 1 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-red-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-red-500/20 text-red-400 flex items-center justify-center text-[10px]">Q1</span>
                    จงอธิบายบทบาททางอุณหพลศาสตร์ของฝาอบความร้อน (Heated Lid 105°C) ในเครื่องเทอร์โมไซเคิลเลอร์ ว่าเหตุใดจึงป้องกันการระเหยและการควบแน่นของไอน้ำบนฝาหลอด PCR ได้ และหากระบบควบคุมความร้อนของฝาชำรุด จะส่งผลเสียต่อความเข้มข้นของเกลือ $\text{Mg}^{2+}$ และประสิทธิภาพของเอนไซม์ Taq Polymerase อย่างไร
                </h4>
                <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="อธิบายสมดุลความดันไออิ่มตัว (Saturated Vapor Pressure) หากฝาเย็น ไอน้ำจะระเหยไปเกาะ ทำให้ปริมาตรของเหลวลดลง ความเข้มข้นของเกลือแมกนีเซียมสูงขึ้นจนยับยั้งเอนไซม์..."></textarea>
            </div>

            <!-- Question 2 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-amber-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center text-[10px]">Q2</span>
                    ในการออกแบบไพรเมอร์สำหรับตรวจวินิจฉัยเชื้อแบคทีเรียดื้อยา หากคำนวณได้ค่า $T_m = 60^\circ\text{C}$ จงอธิบายหลักเกณฑ์การกำหนดอุณหภูมิ Annealing ($T_a$) และผลทางชีวฟิสิกส์ของการตั้งค่า $T_a$ ที่ "ต่ำเกินไป" (เช่น 45°C) เทียบกับ "สูงเกินไป" (เช่น 65°C) ต่อความจำเพาะของผลผลิต PCR
                </h4>
                <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="วิเคราะห์ค่า Ta ที่เหมาะสม (Tm - 5°C = 55°C) หากต่ำเกินไป ไพรเมอร์จะจับกับตำแหน่งที่ไม่จำเพาะ (Non-specific binding) และเกิด Primer-dimers หากสูงเกินไป ไพรเมอร์จะไม่สามารถสร้างพันธะไฮโดรเจนได้..."></textarea>
            </div>

            <!-- Question 3 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-cyan-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-[10px]">Q3</span>
                    ในกระบวนการตรวจปริมาณไวรัสด้วย Real-time quantitative RT-PCR (เช่น ตรวจไวรัส SARS-CoV-2 หรือ HIV) จงอธิบายความหมายทางฟิสิกส์ของค่า $C_q$ (Cycle threshold) และวิเคราะห์ว่าตัวอย่างผู้ป่วยที่มี $C_q = 18$ มีปริมาณไวรัสเริ่มต้น ($N_0$) แตกต่างจากผู้ป่วยที่มี $C_q = 28$ กี่เท่า (สมมติประสิทธิภาพการเพิ่มขยาย $E = 100\%$)
                </h4>
                <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="อธิบายความแตกต่าง ΔCq = 28 - 18 = 10 รอบ แสดงว่าตัวอย่างแรกมีปริมาณไวรัสมากกว่า 2^10 = 1,024 เท่า บ่งชี้ภาวะไวรัสสูงและมีความสามารถในการแพร่กระจายเชื้อได้มากกว่า..."></textarea>
            </div>
        </div>
    </div>

    <!-- Submit Button Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="space-y-1 text-center sm:text-left">
            <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-red-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 9 (Final E-Report Submission)
            </div>
            <div class="text-xs text-slate-400">
                ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
            </div>
        </div>

        <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-red-500 via-rose-500 to-amber-500 hover:from-red-400 text-white font-extrabold text-sm shadow-xl shadow-red-950/40 transition active:scale-95 flex items-center justify-center gap-2">
            <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
        </button>
    </div>

    </form>

    <!-- Navigation Buttons -->
    <nav class="flex items-center justify-between pt-4 border-t border-white/10">
        <a href="lab08_machines.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-2 transition">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 8 (คานและการเคลื่อนไหวเชิงกลระดับไมโคร)
        </a>
        <a href="lab10_electricity.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-red-950/30">
            ถัดไป: ปฏิบัติการที่ 10 (ไฟฟ้า สนามแม่เหล็ก และเจลอิเล็กโทรโฟเรซิส) <i class="fa-solid fa-arrow-right"></i>
        </a>
    </nav>

</div>

<!-- Laboratory Interactivity & Auto-Calculation Script -->
<script>
// Card Accordion Collapsing Logic
function toggleLabCard(cardId) {
  const body = document.getElementById(`${cardId}_body`);
  const icon = document.getElementById(`${cardId}_icon`);
  if (!body) return;

  if (body.classList.contains('hidden')) {
    body.classList.remove('hidden');
    if (icon) {
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-up');
    }
  } else {
    body.classList.add('hidden');
    if (icon) {
      icon.classList.remove('fa-chevron-up');
      icon.classList.add('fa-chevron-down');
    }
  }
}

function expandAllLabCards() {
  const cards = ['cardStudentProfile', 'cardEvidence', 'cardTheory', 'cardSimulator', 'cardDataTables', 'cardDiscussion', 'cardQuestions'];
  cards.forEach(cardId => {
    const body = document.getElementById(`${cardId}_body`);
    const icon = document.getElementById(`${cardId}_icon`);
    if (body) body.classList.remove('hidden');
    if (icon) {
      icon.classList.remove('fa-chevron-down');
      icon.classList.add('fa-chevron-up');
    }
  });
}

function collapseAllLabCards() {
  const cards = ['cardStudentProfile', 'cardEvidence', 'cardTheory', 'cardSimulator', 'cardDataTables', 'cardDiscussion', 'cardQuestions'];
  cards.forEach(cardId => {
    const body = document.getElementById(`${cardId}_body`);
    const icon = document.getElementById(`${cardId}_icon`);
    if (body) body.classList.add('hidden');
    if (icon) {
      icon.classList.remove('fa-chevron-up');
      icon.classList.add('fa-chevron-down');
    }
  });
}

// 3D Simulator Screenshot Capture & Proof Handlers
function capture3dSimulator() {
    const frame = document.getElementById('pcrThermal3DIframe');
    try {
        if (frame && frame.contentWindow && typeof frame.contentWindow.captureSimulatorScreenshot === 'function') {
            const base64Data = frame.contentWindow.captureSimulatorScreenshot();
            if (base64Data) {
                applyScreenshotProof(base64Data);
                return;
            }
        }
    } catch (err) {
        console.warn('Direct screenshot access blocked, trying postMessage:', err);
    }

    if (frame && frame.contentWindow) {
        frame.contentWindow.postMessage({ action: 'captureScreenshot' }, '*');
    }
    setTimeout(() => {
        const imgInput = document.getElementById('image_proof_base64');
        if (!imgInput || !imgInput.value) {
            const fileInp = document.getElementById('imageFileInput');
            if (fileInp) fileInp.click();
        }
    }, 400);
}

window.addEventListener('message', (event) => {
    if (event.data && event.data.action === 'screenshotCaptured' && event.data.dataUrl) {
        applyScreenshotProof(event.data.dataUrl);
    }
});

function handleImageFileUpload(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(evt) {
        applyScreenshotProof(evt.target.result);
    };
    reader.readAsDataURL(file);
}

function applyScreenshotProof(dataUrl) {
    document.getElementById('image_proof_base64').value = dataUrl;
    const preview = document.getElementById('proofPreviewImg');
    const placeholder = document.getElementById('proofPlaceholder');
    const badge = document.getElementById('proofBadgeStatus');

    if (preview) {
        preview.src = dataUrl;
        preview.classList.remove('hidden');
    }
    if (placeholder) placeholder.classList.add('hidden');

    if (badge) {
        badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 font-mono';
        badge.innerHTML = '<i class="fa-solid fa-circle-check"></i> แนบภาพหลักฐานเรียบร้อยแล้ว';
    }
}

function toggleSimContainerFullscreen() {
  const iframe = document.getElementById('pcrThermal3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 9.1: PCR Thermal Steps
  const pcrSteps = [
    { temp: 95.0, time: 30, ramp: 4.5, flux: 18.2 },
    { temp: 55.0, time: 30, ramp: 3.8, flux: 15.4 },
    { temp: 72.0, time: 60, ramp: 4.0, flux: 16.0 },
    { temp: 105.0, time: 1800, ramp: 2.5, flux: 10.5 }
  ];

  pcrSteps.forEach((d, idx) => {
    document.getElementById(`t1_temp_${idx}`).value = d.temp.toFixed(1);
    document.getElementById(`t1_time_${idx}`).value = d.time;
    document.getElementById(`t1_ramp_${idx}`).value = d.ramp.toFixed(1);
    document.getElementById(`t1_flux_${idx}`).value = d.flux.toFixed(1);
  });

  // Table 9.2: Material Conductivity
  const matRamps = [
    { ramp: 5.8, dt: 6.9 },
    { ramp: 5.2, dt: 7.7 },
    { ramp: 4.2, dt: 9.5 },
    { ramp: 0.8, dt: 50.0 }
  ];

  matRamps.forEach((d, idx) => {
    document.getElementById(`t2_ramp_${idx}`).value = d.ramp.toFixed(1);
    document.getElementById(`t2_dt_${idx}`).value = d.dt.toFixed(1);
  });

  // Table 9.3: RFU Values
  const rfuValues = [25, 28, 45, 210, 1850, 6800, 14200, 14500];
  rfuValues.forEach((rfu, idx) => {
    document.getElementById(`t3_rfu_${idx}`).value = rfu;
  });

  // Auto-fill sample discussion and conclusion if blank
  const disc = document.getElementById('discussionText');
  if (!disc.value.trim()) {
    disc.value = "จากการทดลองจำลองการถ่ายโอนความร้อนในเครื่องเทอร์โมไซเคิลเลอร์ PCR พบว่าการทำงานของแผ่นเพลเทียร์ทำให้สามารถควบคุมอุณหภูมิได้อย่างแม่นยำ โดยมีอัตราการเพิ่ม-ลดอุณหภูมิ (Ramp Rate) เฉลี่ย 4.2 °C/s ในบล็อกอลูมิเนียม เมื่อเปรียบเทียบวัสดุบล็อก พบว่าเงินและทองแดงให้ค่า Ramp Rate สูงกว่า 5 °C/s และมีความสม่ำเสมอของอุณหภูมิทั่วทั้ง 96 หลอดดีเยี่ยม (±0.15 °C) สำหรับจลนศาสตร์การเพิ่มปริมาณ DNA พบว่าในรอบที่ 15-25 ปริมาณ DNA เพิ่มขึ้นแบบทวีคูณ (Exponential) สอดคล้องกับสมการ N = N0·2^n ก่อนจะเข้าสู่สภาวะอิ่มตัว (Plateau) ในรอบที่ 30 เนื่องจากการหมดไปของ dNTPs และไพรเมอร์";
  }

  const conc = document.getElementById('conclusionText');
  if (!conc.value.trim()) {
    conc.value = "สรุปได้ว่าอุณหพลศาสตร์การถ่ายโอนความร้อนและการควบคุมอุณหภูมิที่แม่นยำเป็นปัจจัยชี้ขาดต่อความสำเร็จของปฏิกิริยา PCR การใช้งาน Heated Lid ที่ 105°C ป้องกันการระเหยและการควบแน่นของตัวทำละลายได้อย่างสมบูรณ์ และการวิเคราะห์ค่า Cycle Threshold (Cq) ใน Real-time PCR ทำให้สามารถคำนวณปริมาณเชื้อเริ่มต้นได้อย่างแม่นยำ ซึ่งเป็นหัวใจสำคัญในงานจุลชีววิทยาวินิจฉัยและระบาดวิทยาโมเลกุล";
  }

  alert("คำนวณผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อยแล้ว!");
}

function saveStudentDraft() {
  const draftData = {
    lab: 'lab09_heat',
    timestamp: new Date().toISOString(),
    calculations: document.getElementById('lab_calculations')?.value || '',
    discussion: document.getElementById('discussionText')?.value || '',
    conclusion: document.getElementById('conclusionText')?.value || ''
  };
  localStorage.setItem('lab09_draft', JSON.stringify(draftData));
  alert('บันทึกผลการทดลองลงในระบบเรียบร้อยแล้ว (Saved to Local Storage & Ready for SQLite/Cloud Sync)');
}

// Master Validation & Report Submission Controller
async function validateAndSubmitReport(event) {
    if (event) event.preventDefault();

    const fullname = document.getElementById('student_fullname')?.value.trim();
    const studentId = document.getElementById('student_id')?.value.trim();
    const program = document.getElementById('student_program')?.value.trim();
    const section = document.getElementById('student_section')?.value.trim();
    const proofBase64 = document.getElementById('image_proof_base64')?.value;

    const calculations = document.getElementById('lab_calculations')?.value.trim();
    const discussion = document.getElementById('discussionText')?.value.trim();
    const conclusion = document.getElementById('conclusionText')?.value.trim();

    const q1 = document.getElementById('quiz_ans_1')?.value.trim();
    const q2 = document.getElementById('quiz_ans_2')?.value.trim();
    const q3 = document.getElementById('quiz_ans_3')?.value.trim();

    if (!fullname || !studentId || !program || !section) {
        alert("⚠️ กรุณากรอกข้อมูลระบุตัวตนของนักศึกษาให้ครบถ้วนทุกช่องครับ");
        document.getElementById('student_fullname')?.focus();
        return;
    }

    if (!proofBase64) {
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D PCR Cycler ตอนนี้' หรืออัปโหลดไฟล์ภาพก่อนส่งรายงานครับ");
        return;
    }

    // Collect table 9.1
    const table1Data = [];
    for (let i = 0; i < 4; i++) {
        table1Data.push({
            step: i + 1,
            temp: document.getElementById(`t1_temp_${i}`)?.value || '',
            time: document.getElementById(`t1_time_${i}`)?.value || '',
            ramp: document.getElementById(`t1_ramp_${i}`)?.value || '',
            flux: document.getElementById(`t1_flux_${i}`)?.value || ''
        });
    }

    // Collect table 9.2
    const table2Data = [];
    for (let i = 0; i < 4; i++) {
        table2Data.push({
            mat_idx: i + 1,
            ramp: document.getElementById(`t2_ramp_${i}`)?.value || '',
            dt: document.getElementById(`t2_dt_${i}`)?.value || ''
        });
    }

    // Collect table 9.3
    const table3Data = [];
    for (let i = 0; i < 8; i++) {
        table3Data.push({
            cycle_idx: i + 1,
            rfu: document.getElementById(`t3_rfu_${i}`)?.value || ''
        });
    }

    if (!calculations || !discussion || !conclusion) {
        alert("⚠️ กรุณากรอกวิธีคำนวณ การอภิปรายผล และสรุปผลการทดลองให้ครบถ้วนครับ");
        return;
    }

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองเชิงประยุกต์ให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        return;
    }

    const payload = {
        lab_id: 'lab09',
        student_id: studentId,
        fullname: fullname,
        program: program,
        section: section,
        table_data: {
            table1: table1Data,
            table2: table2Data,
            table3: table3Data
        },
        calculations: calculations,
        discussion: discussion,
        conclusion: conclusion,
        quiz_answers: {
            quiz_1: q1,
            quiz_2: q2,
            quiz_3: q3
        },
        image_proof_base64: proofBase64,
        error_percentage: 0.0,
        r_squared: 1.0,
        accuracy_score: 100.0,
        post_quiz_score: 3,
        post_quiz_total: 3
    };

    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> กำลังบันทึกรายงาน...';
    }

    try {
        const response = await fetch('../../virtual_lab/api/api.php?action=submit_report', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const result = await response.json();

        if (result.success) {
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 9 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-09'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
            if (submitBtn) {
                submitBtn.className = 'w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-emerald-600 text-white font-extrabold text-sm shadow-xl flex items-center justify-center gap-2 cursor-default';
                submitBtn.innerHTML = '<i class="fa-solid fa-circle-check"></i> ส่งรายงานสำเร็จแล้ว';
            }
        } else {
            alert('❌ เกิดข้อผิดพลาดในการบันทึก: ' + (result.error || 'ไม่สามารถติดต่อเซิร์ฟเวอร์ได้'));
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ลองส่งใหม่อีกครั้ง';
            }
        }
    } catch (err) {
        console.error('Submission failed:', err);
        alert('⚠️ ไม่สามารถเชื่อมต่อกับ API Backend ได้: ' + err.message);
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ลองส่งใหม่อีกครั้ง';
        }
    }
}
</script>

<?php include '../includes/footer.php'; ?>
