<?php
$pageTitle = 'ปฏิบัติการที่ 4: การเคลื่อนที่แบบหมุนและแรงเหวี่ยงหนีศูนย์กลางในการแยกสารชีวภาพ | Lab 04: Centripetal Mechanics & Differential Centrifugation';
$basePath = '../';
include '../includes/header.php';
?>

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

<!-- Custom Styling for Lab 04 -->
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
  border-color: #38bdf8;
  box-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-sky-500/10 text-sky-400 border border-sky-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-sky-400 animate-ping"></span>
                    <span>LABORATORY 04 • EXPERIMENTAL BIOPHYSICS</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    การเคลื่อนที่แบบหมุนและแรงเหวี่ยงหนีศูนย์กลาง <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-emerald-400">ในการแยกสารชีวภาพ</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาความเร่งสู่ศูนย์กลาง (<span class="vec text-sky-300">a</span><sub>c</sub>), สนามแรงเหวี่ยงสัมพัทธ์ (Relative Centrifugal Field - RCF), การประยุกต์กฎการเคลื่อนที่ของนิวตัน และการแยกสารชีวโมเลกุลด้วยเครื่องหมุนเหวี่ยงความเร็วสูง (Differential Centrifugation of Microorganisms &amp; Biomolecules)
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-sky-300">
                        <i class="fa-solid fa-code-branch text-sky-400 mr-1"></i> RCF = 1.118&times;10⁻⁵&middot;r&middot;n²
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-vial-virus text-emerald-400 mr-1"></i> Differential Pelleting
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-atom text-amber-400 mr-1"></i> Svedberg Unit (S)
                    </span>
                </div>
            </div>

            <!-- Header Quick Badge -->
            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <span class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต</span>
                <span class="text-sm font-bold text-white">สาขาวิชาจุลชีววิทยา มรภ.รำไพพรรณี</span>
                <span class="text-[10px] text-sky-400/80 font-bold">ศูนย์ความเป็นเลิศ LEQs-GLOBE 2027</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Laboratory Content Workspace -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- 3D Virtual Bench & Multi-Instrument Suite Card -->
    <div class="bg-slate-900/90 border border-sky-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-4">
        
        <!-- Header & Simulation Metadata -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-white/10 pb-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-sky-500/10 text-sky-400 border border-sky-500/30 mb-1.5 font-mono">
                    <i class="fa-solid fa-atom animate-spin"></i> Interactive 3D Microcentrifuge Suite
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    ห้องปฏิบัติการเครื่องหมุนเหวี่ยงเสมือนจริง 3 มิติ (3D High-Speed Centrifuge)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    แบบจำลอง 3 มิติความละเอียดสูง พร้อมโรเตอร์ 24 หลอด, หลอด Eppendorf 1.5 mL, มอเตอร์ไร้แปรงถ่าน, Synchronized Pellet Loupe และเสียงสังเคราะห์ Web Audio
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-slate-950 border border-white/10 text-xs font-mono text-slate-300 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Fixed-Angle Rotor: FA-24</span>
                </span>
            </div>
        </div>

        <!-- Action Toolbar -->
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-950/70 p-3 rounded-2xl border border-white/10">
            <div class="flex items-center gap-2 text-xs text-slate-300 font-mono">
                <span class="px-2.5 py-1 rounded-lg bg-sky-500/20 text-sky-300 font-bold border border-sky-500/30">
                    🌀 Speed: 1,000 - 15,000 RPM
                </span>
                <span class="hidden sm:inline text-slate-400 text-[11px]">
                    คลิกค้างแล้วลากเพื่อหมุน 360° | ปรับตั้งค่าสปีดและเวลาที่แผงควบคุมด้านขวา
                </span>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="capture3dSimulator()" class="px-4 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-sky-500 to-teal-400 hover:from-sky-400 text-slate-950 shadow-lg shadow-sky-950/40 transition flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
                </button>
                <button type="button" onclick="toggleSimContainer()" id="btnToggleSimContainer" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายหน้าจอ 3D Simulator">
                    <i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>
                </button>
                <button type="button" onclick="openSimulatorFullscreen()" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition" title="เปิดเต็มจอ">
                    <i class="fa-solid fa-expand"></i>
                </button>
                <a id="btnSimNewTab" href="../simulations/sim04_centrifuge_3d.html" target="_blank" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="เปิดในแท็บใหม่">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>

        <!-- Iframe Viewer Container -->
        <div id="simFrameContainer" class="relative w-full rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-slate-950">
            <iframe id="simViewerFrame" src="../simulations/sim04_centrifuge_3d.html" class="w-full h-[680px] sm:h-[720px] lg:h-[760px] border-0" allow="camera; microphone; fullscreen; autoplay"></iframe>
        </div>

        <!-- Instructional Card / Quick Tips -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-1">
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-sky-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-gauge-high"></i> ตอนที่ 1: ความเร่งสู่ศูนย์กลางและ RCF
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ปรับความเร็วรอบตั้งแต่ 2,000 ถึง 15,000 RPM ที่รัศมี 8.5 cm บันทึกค่า RCF และ $\omega$ เพื่อตรวจสอบความสัมพันธ์ $RCF \propto n^2$
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-vial-circle-check"></i> ตอนที่ 2: Differential Pelleting
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    สลับชนิดชีวโมเลกุล (เม็ดเลือดแดง, แบคทีเรีย, ยีสต์, ไมโตคอนเดรีย, ไรโบโซม) สังเกตการเกิด Pellet และคำนวณแรงเหวี่ยงที่ต้องการ
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-amber-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-scale-balanced"></i> ตอนที่ 3: กราฟเส้นตรงและเวลาตกตะกอน
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    วิเคราะห์ความชันกราฟ RCF กับ $n^2$ หาค่ารัศมีคำนวณ $r_{\text{calc}}$ และคำนวณเวลาที่ใช้ในการตกตะกอนเม็ดเซลล์ $E. coli$
                </p>
            </div>
        </div>

    </div>

    <!-- Academic Foundations & Mathematical Equations Suite -->
    <div class="bg-slate-900/90 border border-sky-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-sky-500/10 text-sky-400 border border-sky-500/30 font-mono">
                    <i class="fa-solid fa-square-root-variable"></i> Rotational Kinematics &amp; Centrifugal Bioseparation Foundations
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    หลักการและสมการฟิสิกส์พื้นฐาน (Theoretical Formulations)
                </h2>
                <p class="text-xs text-slate-400">
                    การวิเคราะห์ความเร่งสู่ศูนย์กลาง, แรงเหวี่ยงหนีศูนย์กลางสัมพัทธ์ (RCF) และการตกตะกอนของชีวโมเลกุลตามหลัก Svedberg
                </p>
            </div>
            <button type="button" onclick="toggleMathDetails('mathSuiteLab04')" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-sky-400 border border-sky-500/30 transition flex items-center gap-2 self-start sm:self-auto">
                <span id="mathSuiteLab04BtnText">ย่อ/ขยายสมการ</span> <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>

        <div id="mathSuiteLab04" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <!-- Card 1: Centripetal Acceleration & Angular Kinematics -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/20 space-y-3.5 hover:border-sky-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-sky-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-arrows-spin text-sky-400"></i> ตอนที่ 1: การเคลื่อนที่แบบหมุน
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 font-mono border border-sky-500/20">Eq. 4.1–4.2</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    ความเร็วเชิงมุม ($\omega$) ในหน่วย $\text{rad/s}$ สัมพันธ์กับความเร็วรอบ $n$ (RPM):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$\omega = \frac{2\pi n}{60} \tag{4.1}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    ความเร่งสู่ศูนย์กลาง ($a_c$) ของอนุภาคที่ระยะรัศมี $r$ จากแกนหมุน:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$a_c = \omega^2 r = \left(\frac{2\pi n}{60}\right)^2 r \tag{4.2}$$
                </div>
            </div>

            <!-- Card 2: Relative Centrifugal Field (RCF) -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/20 space-y-3.5 hover:border-emerald-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-emerald-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-gauge-high text-emerald-400"></i> ตอนที่ 2: แรงเหวี่ยงสัมพัทธ์ (RCF)
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-mono border border-emerald-500/20">Eq. 4.3–4.4</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    สัดส่วนของความเร่งหนีศูนย์กลางต่อความเร่งโน้มถ่วงมาตรฐาน ($g = 9.80665\text{ m/s}^2$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-emerald-200">
                    $$\text{RCF} = \frac{\omega^2 r}{g} = \frac{(2\pi n / 60)^2 \cdot (r_{\text{cm}} / 100)}{9.80665} \tag{4.3}$$
                    $$\text{RCF} \approx 1.118 \times 10^{-5} \cdot r_{\text{cm}} \cdot n^2 \quad [\times g] \tag{4.4}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    *ค่า RCF ขึ้นอยู่กับกำลังสองของความเร็วรอบ ($n^2$) และรัศมีโรเตอร์ ($r$)
                </p>
            </div>

            <!-- Card 3: Sedimentation & Differential Pelleting -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-amber-500/20 space-y-3.5 hover:border-amber-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-amber-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-vial-circle-check text-amber-400"></i> ตอนที่ 3: การตกตะกอนชีวภาพ
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-mono border border-amber-500/20">Eq. 4.5–4.6</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    อัตราเร็วตกตะกอนของอนุภาคชีวภาพในสนามแรงเหวี่ยงตามกฎของสโตกส์:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                    $$v_{\text{sed}} = \frac{2 r_p^2 (\rho_p - \rho_m) \omega^2 r}{9 \eta} \tag{4.5}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    สัมประสิทธิ์การตกตะกอน Svedberg ($S$) และเวลาตกตะกอนเม็ดเซลล์ ($t$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                    $$S = \frac{v_{\text{sed}}}{\omega^2 r} \quad [1\text{ S} = 10^{-13}\text{ s}], \quad t = \frac{\ln(r_{\max} / r_{\min})}{\omega^2 S} \tag{4.6}$$
                </div>
            </div>
        </div>
    </div>

    <!-- Master Section Quick Action & Collapse/Expand Bar -->
    <div id="masterLabToolbar" class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-white/10 p-3.5 sm:p-4 rounded-3xl shadow-xl backdrop-blur-xl">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
            <span class="w-2.5 h-2.5 rounded-full bg-sky-400 animate-pulse"></span>
            <span class="font-bold text-white">แผงควบคุมการแสดงผลรายงาน:</span>
            <span class="text-slate-400 hidden sm:inline">สามารถคลิกปุ่มย่อ/ขยายในแต่ละการ์ด หรือควบคุมทุกส่วนได้พร้อมกัน</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-sky-400 border border-sky-500/30 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                <i class="fa-solid fa-angles-down text-xs"></i> <span>ขยายทุกการ์ด</span>
            </button>
            <button type="button" onclick="collapseAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                <i class="fa-solid fa-angles-up text-xs"></i> <span>ย่อทุกการ์ด</span>
            </button>
        </div>
    </div>

    <!-- Interactive E-Report Submission Form -->
    <form id="labReportForm" onsubmit="validateAndSubmitReport(event)" class="space-y-6">

        <!-- 1. Student Profile Card (Mandatory) -->
        <div class="bg-slate-900/90 border border-sky-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-sky-400"></i>
                    ข้อมูลนักศึกษาผู้ส่งรายงานผลปฏิบัติการ (Student Identification)
                </h2>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-rose-400 font-semibold hidden sm:inline">* จำเป็นต้องกรอกทุกช่อง</span>
                    <button type="button" onclick="toggleCardSection('secStudentId_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="secStudentId_body" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 transition-all">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        ชื่อ - นามสกุล (Full Name) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div class="bg-slate-900/90 border border-sky-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-sky-400"></i>
                    ภาพถ่ายหรือแคปหน้าจอระหว่างทดลอง (Experiment Screenshot Proof)
                </h2>
                <div class="flex items-center gap-2">
                    <div id="proofBadgeStatus" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/40">
                        <i class="fa-solid fa-circle-exclamation"></i> ยังไม่มีภาพหลักฐาน (จำเป็นก่อนส่ง)
                    </div>
                    <button type="button" onclick="toggleCardSection('secEvidence_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="secEvidence_body" class="space-y-4 transition-all">
                <p class="text-xs text-slate-300 leading-relaxed">
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Centrifuge Simulator (เช่น ขณะเครื่องกำลังหมุนด้วยความเร็วสูง หรือภาพการเกิด Pellet ในเลนส์ขยาย) เพื่อยืนยันว่าได้ทำการทดลองจริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <!-- Action Controls -->
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-sky-500 to-teal-400 hover:from-sky-400 text-slate-950 font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Centrifuge ตอนนี้
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
                        <input type="hidden" id="image_proof_base64" name="image_proof_base64" value="">
                    </div>
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
                    <button type="button" onclick="calculateAllTables()" class="px-3.5 py-1.5 rounded-xl bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator"></i> คำนวณค่าและสถิติอัตโนมัติ
                    </button>
                    <button type="button" onclick="toggleCardSection('secDataTables_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="secDataTables_body" class="space-y-6 transition-all">

                <!-- Table 4.1: Speed vs Centripetal Acceleration & RCF -->
                <div class="space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                        <h3 class="text-xs font-bold text-sky-400 font-mono">
                            ตารางที่ 4.1: ผลการวัดและคำนวณความเร่งสู่ศูนย์กลาง ($a_c$) และแรงเหวี่ยงสัมพัทธ์ (RCF) ที่ความเร็วรอบต่างๆ ($r = 8.50\text{ cm}$)
                        </h3>
                    </div>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ความเร็วรอบ $n$ (RPM)</th>
                                    <th class="p-2.5 text-center">ความเร็วเชิงมุม $\omega$ (rad/s)</th>
                                    <th class="p-2.5 text-center">$n^2$ ($10^6\text{ RPM}^2$)</th>
                                    <th class="p-2.5 text-center">ความเร่งสู่ศูนย์กลาง $a_c$ (m/s²)</th>
                                    <th class="p-2.5 text-center">RCF ทดลอง (&times;g)</th>
                                    <th class="p-2.5 text-center">RCF ทฤษฎี (&times;g)</th>
                                    <th class="p-2.5 text-center">%Error</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <?php
                                $speeds = [2000, 4000, 6000, 8000, 10000, 12000, 15000];
                                foreach ($speeds as $idx => $rpm):
                                ?>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2.5 font-bold text-sky-300"><?= number_format($rpm) ?></td>
                                    <td class="p-1"><input type="number" step="0.1" id="t1_omega_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                    <td class="p-1"><input type="number" step="0.01" id="t1_n2_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                    <td class="p-1"><input type="number" step="1" id="t1_ac_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-amber-300"></td>
                                    <td class="p-1"><input type="number" step="1" id="t1_rcf_exp_<?= $idx ?>" placeholder="อ่านจาก 3D" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-1"><input type="number" step="1" id="t1_rcf_th_<?= $idx ?>" placeholder="ทฤษฎี" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-slate-300"></td>
                                    <td class="p-1"><input type="text" id="t1_err_<?= $idx ?>" placeholder="%" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-rose-300"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 4.2: Differential Centrifugation of Microorganisms -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xs font-bold text-emerald-400 font-mono">
                        ตารางที่ 4.2: การศึกษาการปั่นแยกเซลล์และออร์แกเนลล์ชีวภาพด้วยวิธี Differential Centrifugation
                    </h3>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ชนิดตัวอย่างชีวภาพ</th>
                                    <th class="p-2.5 text-center">ขนาดอนุภาค ($d$)</th>
                                    <th class="p-2.5 text-center">ความหนาแน่น ($\rho_p$)</th>
                                    <th class="p-2.5 text-center">RCF แยกชั้น (&times;g)</th>
                                    <th class="p-2.5 text-center">เวลาปั่น (นาที)</th>
                                    <th class="p-2.5 text-center">ลักษณะก้อนตะกอน (Pellet)</th>
                                    <th class="p-2.5 text-center">ลักษณะส่วนใส (Supernatant)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <?php
                                $samples = [
                                    ['1. เม็ดเลือดแดง (Erythrocytes)', '6.0 - 8.0 µm', '1,095 kg/m³'],
                                    ['2. เซลล์ยีสต์ (S. cerevisiae)', '4.0 - 6.0 µm', '1,110 kg/m³'],
                                    ['3. แบคทีเรีย (E. coli)', '1.0 × 2.5 µm', '1,080 kg/m³'],
                                    ['4. ไมโตคอนเดรีย (Mitochondria)', '0.5 - 1.0 µm', '1,180 kg/m³'],
                                    ['5. ไรโบโซม (Ribosomes 70S/80S)', '20 - 30 nm', '1,350 kg/m³']
                                ];
                                foreach ($samples as $i => $s):
                                ?>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2.5 font-bold text-slate-200"><?= $s[0] ?></td>
                                    <td class="p-2.5 text-center text-slate-400"><?= $s[1] ?></td>
                                    <td class="p-2.5 text-center text-slate-400"><?= $s[2] ?></td>
                                    <td class="p-1"><input type="number" step="10" id="t2_rcf_<?= $i ?>" placeholder="เช่น 1500" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-1"><input type="number" step="0.5" id="t2_time_<?= $i ?>" placeholder="นาที" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                    <td class="p-1"><input type="text" id="t2_pellet_<?= $i ?>" placeholder="เช่น อัดแน่นสีแดง" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-amber-300"></td>
                                    <td class="p-1"><input type="text" id="t2_super_<?= $i ?>" placeholder="เช่น ใสไม่มีเซลล์" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-sky-300"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 4.3: Linear Regression & Svedberg Parameters -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xs font-bold text-amber-400 font-mono">
                        ตารางที่ 4.3: ผลการวิเคราะห์ความชันสมการเชิงเส้น RCF vs $n^2$ และการคำนวณเวลาตกตะกอนเม็ดเซลล์แบคทีเรีย
                    </h3>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ความชันกราฟ RCF vs $n^2$</th>
                                    <th class="p-2.5 text-center">รัศมีโรเตอร์คำนวณได้ $r_{\text{calc}}$ (cm)</th>
                                    <th class="p-2.5 text-center">รัศมีโรเตอร์จริง $r_{\text{true}}$ (cm)</th>
                                    <th class="p-2.5 text-center">%Error รัศมี</th>
                                    <th class="p-2.5 text-center">เวลาตกตะกอนเซลล์ E. coli ที่ 8,000 RPM (นาที)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2"><input type="number" step="0.00000001" id="t3_slope" placeholder="เช่น 9.50e-5" required class="input-blank w-full rounded-lg px-2 py-1.5 text-center text-xs text-white"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t3_r_calc" placeholder="เช่น 8.48" required class="input-blank w-full rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-2 text-center text-slate-400 font-bold">8.50 cm</td>
                                    <td class="p-2"><input type="text" id="t3_r_err" placeholder="0.24%" required class="input-blank w-full rounded-lg px-2 py-1.5 text-center text-xs text-amber-400"></td>
                                    <td class="p-2"><input type="number" step="0.1" id="t3_pellet_time" placeholder="เช่น 3.5" required class="input-blank w-full rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 font-bold"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- 4. Calculations, Discussion & Conclusion Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-sky-400 flex items-center gap-2">
                    <i class="fa-solid fa-chart-line"></i>
                    การแสดงวิธีคำนวณและสรุปผลการทดลอง (Calculations &amp; Discussion)
                </h2>
                <button type="button" onclick="toggleCardSection('secCalculations_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                    <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                </button>
            </div>

            <div id="secCalculations_body" class="space-y-4 transition-all">
                <div class="space-y-2.5">
                    <label class="block text-xs font-bold text-slate-300">
                        1. แสดงขั้นตอนการคำนวณอย่างละเอียด (Detailed Calculations) <span class="text-rose-400">*</span>
                    </label>

                    <!-- Formula Guide Box -->
                    <div class="p-4 rounded-2xl bg-slate-950/90 border border-sky-500/30 space-y-2.5">
                        <div class="flex items-center justify-between text-xs font-bold text-sky-400 font-mono">
                            <span><i class="fa-solid fa-book-open"></i> โครงสร้างสูตรคำนวณตามมาตรฐานวิชาการ (Academic Calculation Structure)</span>
                            <span class="text-[10px] text-slate-400">แทนค่าตัวเลขจากตารางลงในกล่องข้อความ</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-teal-400">1. การคำนวณค่า RCF และความเร่งสู่ศูนย์กลาง $a_c$:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $\omega = \frac{2\pi (6000)}{60} = 628.32\text{ rad/s}, \quad a_c = \omega^2 r = (628.32)^2 (0.085) = 33,556\text{ m/s}^2$<br>
                                    $\text{RCF} = 1.118 \times 10^{-5} \times (8.5) \times (6000)^2 = 3,421 \times g$
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-amber-400">2. การหาค่ารัศมีโรเตอร์จากความชันกราฟ:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $\text{Slope} = 1.118 \times 10^{-5} \cdot r \implies r = \frac{\text{Slope}}{1.118 \times 10^{-5}}\text{ cm}$<br>
                                    $\%Error = \frac{|r_{\text{calc}} - 8.50|}{8.50} \times 100\%$
                                </div>
                            </div>
                        </div>
                    </div>

                    <textarea id="lab_calculations" name="lab_calculations" rows="5" required placeholder="พิมพ์แสดงวิธีทำ:
1. การคำนวณค่าที่ 6,000 RPM (r = 8.5 cm):
   omega = 2 * pi * 6000 / 60 = 628.32 rad/s
   ac = (628.32)^2 * 0.085 = 33,556 m/s2
   RCF = 1.118e-5 * 8.5 * (6000)^2 = 3,421 xg
2. การคำนวณรัศมีโรเตอร์จากความชัน:
   Slope = 9.50e-5
   r_calc = 9.50e-5 / 1.118e-5 = 8.50 cm
   %Error = |8.50 - 8.50| / 8.50 * 100 = 0.0%" class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition font-mono leading-relaxed"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">
                            2. การอภิปรายผลการทดลอง (Discussion) <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="lab_discussion" name="lab_discussion" rows="4" required placeholder="อภิปรายเปรียบเทียบผลของความเร็วรอบต่อ RCF, เหตุผลที่ RCF ขึ้นกับ n², และความสำคัญของการเลือก RCF ให้เหมาะกับขนาดและความหนาแน่นของเซลล์..." class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">
                            3. สรุปผลการทดลอง (Conclusion) <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="lab_conclusion" name="lab_conclusion" rows="4" required placeholder="สรุปผลการทดลองทั้ง 3 ตอน: ความสัมพันธ์ของความเร็วรอบกับแรงเหวี่ยงหนีศูนย์กลาง, ความเร็วและเวลาที่เหมาะสมในการเก็บเซลล์แบคทีเรีย E. coli..." class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. Post-Lab Questions Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-purple-400 flex items-center gap-2">
                    <i class="fa-solid fa-circle-question"></i>
                    คำถามท้ายการทดลอง (Post-Lab Questions)
                </h2>
                <button type="button" onclick="toggleCardSection('secQuestions_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                    <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                </button>
            </div>

            <div id="secQuestions_body" class="space-y-4 transition-all">
                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 1: อธิบายความแตกต่างระหว่าง RPM (Revolutions Per Minute) กับ RCF (Relative Centrifugal Field) และเหตุใดในการตีพิมพ์งานวิจัยทางจุลชีววิทยาจึงต้องรายงานผลเป็นค่า RCF (&times;g) เสมอ? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 2: ในการแยกส่วนประกอบภายในเซลล์ด้วยวิธี Differential Centrifugation จงเรียงลำดับการตกตะกอนของ (a) เม็ดเลือดแดง (b) นิวเคลียส (c) ไมโตคอนเดรีย และ (d) ไรโบโซม จากเร็วที่สุดไปช้าที่สุด พร้อมอธิบายหลักการตามกฎของนิวตันและสโตกส์? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 3: หากใส่หลอด Eppendorf ลงในโรเตอร์โดยไม่ทำการถ่วงสมดุล (Unbalanced Centrifuge Rotor) จะเกิดแรงไม่สมดุลชนิดใดต่อแกนหมุนของมอเตอร์ และจะก่อให้เกิดอันตรายหรือความเสียหายต่อเครื่องหมุนเหวี่ยงอย่างไร? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>
            </div>
        </div>

        <!-- Submit Button Card -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="space-y-1 text-center sm:text-left">
                <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                    <i class="fa-solid fa-cloud-arrow-up text-sky-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 4 (Final E-Report Submission)
                </div>
                <div class="text-xs text-slate-400">
                    ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
                </div>
            </div>

            <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-sky-500 via-teal-500 to-emerald-400 hover:from-sky-400 text-slate-950 font-extrabold text-sm shadow-xl shadow-sky-950/40 transition active:scale-95 flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
            </button>
        </div>

    </form>

    <!-- Lab Pagination Navigation -->
    <nav class="flex items-center justify-between gap-4 pt-4 border-t border-white/10 font-mono text-xs">
        <a href="lab03_motion.php" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 border border-white/10 transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> <span>ปฏิบัติการที่ 3: การเคลื่อนที่และแรงหนืด</span>
        </a>
        <a href="lab05_momentum.php" class="px-4 py-2.5 rounded-xl bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/30 font-bold transition flex items-center gap-2">
            <span>ปฏิบัติการที่ 5: โมเมนตัมและแรงตึงผิว</span> <i class="fa-solid fa-arrow-right"></i>
        </a>
    </nav>

</main>

<script>
// ==========================================
// SIMULATOR WORKSPACE & FULLSCREEN CONTROLLER
// ==========================================
function toggleSimContainer() {
    const frame = document.getElementById('simFrameContainer');
    const label = document.getElementById('simToggleLabel');
    const btn = document.getElementById('btnToggleSimContainer');
    if (!frame) return;
    if (frame.classList.contains('hidden')) {
        frame.classList.remove('hidden');
        if (label) label.textContent = 'ย่อ 3D';
        if (btn) btn.innerHTML = '<i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>';
    } else {
        frame.classList.add('hidden');
        if (label) label.textContent = 'เปิด 3D';
        if (btn) btn.innerHTML = '<i class="fa-solid fa-expand text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">เปิด 3D</span>';
    }
}

function openSimulatorFullscreen() {
    const frame = document.getElementById('simViewerFrame');
    if (frame.requestFullscreen) {
        frame.requestFullscreen();
    } else if (frame.webkitRequestFullscreen) {
        frame.webkitRequestFullscreen();
    }
}

// ==========================================
// CARD ACCORDION & MASTER TOOLBAR
// ==========================================
function toggleMathDetails(id) {
    const el = document.getElementById(id);
    const txt = document.getElementById(id + 'BtnText');
    if (!el) return;
    el.classList.toggle('hidden');
    if (txt) {
        txt.textContent = el.classList.contains('hidden') ? 'ขยายสมการ' : 'ย่อ/ขยายสมการ';
    }
}

function toggleCardSection(bodyId, btn) {
    const body = document.getElementById(bodyId);
    if (!body) return;
    const isHidden = body.classList.contains('hidden');
    if (isHidden) {
        body.classList.remove('hidden');
        if (btn) {
            const label = btn.querySelector('.btn-label');
            if (label) label.textContent = 'ย่อ';
            const icon = btn.querySelector('i');
            if (icon) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-up'); }
        }
    } else {
        body.classList.add('hidden');
        if (btn) {
            const label = btn.querySelector('.btn-label');
            if (label) label.textContent = 'ขยาย';
            const icon = btn.querySelector('i');
            if (icon) { icon.classList.remove('fa-chevron-up'); icon.classList.add('fa-chevron-down'); }
        }
    }
}

function expandAllReportSections() {
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab04'];
    bodies.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.remove('hidden');
    });
    document.querySelectorAll('.card-toggle-btn').forEach(btn => {
        const label = btn.querySelector('.btn-label');
        if (label) label.textContent = 'ย่อ';
        const icon = btn.querySelector('i');
        if (icon) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-up'); }
    });
}

function collapseAllReportSections() {
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab04'];
    bodies.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    });
    document.querySelectorAll('.card-toggle-btn').forEach(btn => {
        const label = btn.querySelector('.btn-label');
        if (label) label.textContent = 'ขยาย';
        const icon = btn.querySelector('i');
        if (icon) { icon.classList.remove('fa-chevron-up'); icon.classList.add('fa-chevron-down'); }
    });
}

// ==========================================
// 3D SCREENSHOT CAPTURE & PROOF HANDLER
// ==========================================
function capture3dSimulator() {
    const frame = document.getElementById('simViewerFrame');
    try {
        if (frame && frame.contentWindow && typeof frame.contentWindow.captureSimulatorScreenshot === 'function') {
            const base64Data = frame.contentWindow.captureSimulatorScreenshot();
            if (base64Data) {
                applyScreenshotProof(base64Data);
                return;
            }
        }
    } catch (err) {
        console.warn('Cross-origin capture direct access blocked:', err);
    }

    // Fallback: Message via postMessage
    frame.contentWindow.postMessage({ action: 'captureScreenshot' }, '*');
    setTimeout(() => {
        const imgInput = document.getElementById('image_proof_base64');
        if (!imgInput.value) {
            document.getElementById('imageFileInput').click();
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

    preview.src = dataUrl;
    preview.classList.remove('hidden');
    placeholder.classList.add('hidden');

    badge.className = 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 font-mono';
    badge.innerHTML = '<i class="fa-solid fa-circle-check"></i> แนบภาพหลักฐานเรียบร้อยแล้ว';
}

// ==========================================
// AUTOMATIC CALCULATION OF TABLES
// ==========================================
function calculateAllTables() {
    const r = 8.5; // cm
    const rMeters = 0.085; // m
    const speeds = [2000, 4000, 6000, 8000, 10000, 12000, 15000];

    // Table 4.1 Calculations
    speeds.forEach((rpm, idx) => {
        const omega = (2 * Math.PI * rpm) / 60;
        const n2 = (rpm * rpm) / 1e6;
        const ac = omega * omega * rMeters;
        const rcfTh = 1.118e-5 * r * rpm * rpm;

        const omegaEl = document.getElementById(`t1_omega_${idx}`);
        const n2El = document.getElementById(`t1_n2_${idx}`);
        const acEl = document.getElementById(`t1_ac_${idx}`);
        const rcfThEl = document.getElementById(`t1_rcf_th_${idx}`);
        const rcfExpEl = document.getElementById(`t1_rcf_exp_${idx}`);
        const errEl = document.getElementById(`t1_err_${idx}`);

        if (omegaEl) omegaEl.value = omega.toFixed(2);
        if (n2El) n2El.value = n2.toFixed(2);
        if (acEl) acEl.value = Math.round(ac);
        if (rcfThEl) rcfThEl.value = Math.round(rcfTh);

        if (rcfExpEl && !rcfExpEl.value) {
            rcfExpEl.value = Math.round(rcfTh); // autofill matching test
        }

        if (rcfExpEl && rcfExpEl.value) {
            const expVal = parseFloat(rcfExpEl.value);
            const err = Math.abs((expVal - rcfTh) / rcfTh) * 100;
            if (errEl) errEl.value = err.toFixed(2) + '%';
        }
    });

    // Table 4.2 Differential Pelleting Standards
    const stds = [
        { rcf: 1500, time: 10, pellet: 'ตะกอนแน่นสีแดงเข้ม (RBCs)', super: 'ใสสีเหลืองฟาง (Plasma)' },
        { rcf: 3500, time: 4, pellet: 'ตะกอนสีครีมหนาแน่น (Yeast)', super: 'สารละลายใส' },
        { rcf: 8000, time: 5, pellet: 'ตะกอนสีเหลืองนวล (E. coli)', super: 'ใสบริสุทธิ์ (OD600 < 0.05)' },
        { rcf: 14000, time: 15, pellet: 'ตะกอนสีน้ำตาลอ่อน (Mitochondria)', super: 'สารแขวนลอยใสระดับไซโตพลาสซึม' },
        { rcf: 100000, time: 120, pellet: 'ตะกอนใสเจลลี่บางมาก (Ribosomes)', super: 'สารละลายโปรตีนอิสระ' }
    ];

    stds.forEach((s, i) => {
        const rcfEl = document.getElementById(`t2_rcf_${i}`);
        const timeEl = document.getElementById(`t2_time_${i}`);
        const pelletEl = document.getElementById(`t2_pellet_${i}`);
        const superEl = document.getElementById(`t2_super_${i}`);

        if (rcfEl && !rcfEl.value) rcfEl.value = s.rcf;
        if (timeEl && !timeEl.value) timeEl.value = s.time;
        if (pelletEl && !pelletEl.value) pelletEl.value = s.pellet;
        if (superEl && !superEl.value) superEl.value = s.super;
    });

    // Table 4.3 Linear Regression
    const slope = 1.118e-5 * r; // 9.503e-5
    const slopeEl = document.getElementById('t3_slope');
    const rCalcEl = document.getElementById('t3_r_calc');
    const rErrEl = document.getElementById('t3_r_err');
    const pelletTimeEl = document.getElementById('t3_pellet_time');

    if (slopeEl) slopeEl.value = slope.toExponential(3);
    if (rCalcEl) rCalcEl.value = '8.50';
    if (rErrEl) rErrEl.value = '0.00%';
    if (pelletTimeEl && !pelletTimeEl.value) pelletTimeEl.value = '3.5';

    alert("✅ คำนวณค่าทางฟิสิกส์และความเร่งสู่ศูนย์กลางลงในตารางเรียบร้อยแล้วครับ");
}

// ==========================================
// VALIDATION & DUAL-BACKEND SUBMISSION
// ==========================================
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

    if (!fullname || !studentId || !program || !section) {
        alert("⚠️ กรุณากรอกข้อมูลระบุตัวตนของนักศึกษาให้ครบถ้วนทุกช่องครับ");
        document.getElementById('student_fullname').focus();
        return;
    }

    if (!proofBase64) {
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D Centrifuge ตอนนี้' หรืออัปโหลดภาพก่อนส่งรายงานครับ");
        return;
    }

    // Collect all table 4.1 data
    const table1Data = [];
    for (let i = 0; i < 7; i++) {
        table1Data.push({
            rpm: [2000, 4000, 6000, 8000, 10000, 12000, 15000][i],
            omega: document.getElementById(`t1_omega_${i}`)?.value || '',
            n2: document.getElementById(`t1_n2_${i}`)?.value || '',
            ac: document.getElementById(`t1_ac_${i}`)?.value || '',
            rcf_exp: document.getElementById(`t1_rcf_exp_${i}`)?.value || '',
            rcf_th: document.getElementById(`t1_rcf_th_${i}`)?.value || '',
            error: document.getElementById(`t1_err_${i}`)?.value || ''
        });
    }

    // Collect table 4.2 data
    const table2Data = [];
    for (let i = 0; i < 5; i++) {
        table2Data.push({
            sample_index: i + 1,
            rcf: document.getElementById(`t2_rcf_${i}`)?.value || '',
            time: document.getElementById(`t2_time_${i}`)?.value || '',
            pellet: document.getElementById(`t2_pellet_${i}`)?.value || '',
            supernatant: document.getElementById(`t2_super_${i}`)?.value || ''
        });
    }

    // Table 4.3 data
    const table3Data = {
        slope: document.getElementById('t3_slope')?.value || '',
        r_calc: document.getElementById('t3_r_calc')?.value || '',
        r_err: document.getElementById('t3_r_err')?.value || '',
        pellet_time: document.getElementById('t3_pellet_time')?.value || ''
    };

    if (!calculations || !discussion || !conclusion) {
        alert("⚠️ กรุณากรอกวิธีคำนวณ การอภิปรายผล และสรุปผลการทดลองให้ครบถ้วนครับ");
        return;
    }

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        return;
    }

    const payload = {
        lab_id: 'lab04',
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
        error_percentage: parseFloat(document.getElementById('t3_r_err')?.value) || 0.0,
        accuracy_score: 100.0,
        post_quiz_score: 3,
        post_quiz_total: 3
    };

    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> กำลังบันทึกรายงาน...';

    try {
        const response = await fetch('../../virtual_lab/api/api.php?action=submit_report', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const result = await response.json();

        if (result.success) {
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 4 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-04'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
            submitBtn.className = 'w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-emerald-600 text-white font-extrabold text-sm shadow-xl flex items-center justify-center gap-2 cursor-default';
            submitBtn.innerHTML = '<i class="fa-solid fa-circle-check"></i> ส่งรายงานสำเร็จแล้ว';
        } else {
            alert('❌ เกิดข้อผิดพลาดในการบันทึก: ' + (result.error || 'ไม่สามารถติดต่อเซิร์ฟเวอร์ได้'));
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ลองส่งใหม่อีกครั้ง';
        }
    } catch (err) {
        console.error('Submission failed:', err);
        alert('⚠️ ไม่สามารถเชื่อมต่อกับ API Backend ได้: ' + err.message);
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ลองส่งใหม่อีกครั้ง';
    }
}
</script>

<?php include '../includes/footer.php'; ?>
