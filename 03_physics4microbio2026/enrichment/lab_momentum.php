<?php
$pageTitle = 'ปฏิบัติการที่ 5: การอนุรักษ์โมเมนตัม การชน และการดลในระบบชีวภาพ | Lab 05: Conservation of Momentum & Impulse Mechanics';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 05</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch05_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 5</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=5" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=5&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 4)</span>
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

<!-- Custom Styling for Lab 05 -->
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
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    <span>LABORATORY 05 • EXPERIMENTAL BIOPHYSICS</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    การอนุรักษ์โมเมนตัม การชน <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-400 to-sky-400">และการดลในระบบชีวภาพ</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การทดสอบกฎการอนุรักษ์โมเมนตัมเชิงเส้น ($\sum \vec{p}_i = \sum \vec{p}_f$), การชนแบบยืดหยุ่นและไม่ยืดหยุ่นบนรางลมไร้ความเสียดทาน (Air Track), สัมประสิทธิ์การคืนสภาพ ($e$), การดล ($\vec{J} = \Delta \vec{p}$) และการประยุกต์ในการดักจับละอองลอยชีวภาพ (Inertial Bioaerosol Impactor)
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-code-branch text-amber-400 mr-1"></i> Σp_before = Σp_after
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-sky-300">
                        <i class="fa-solid fa-shuffle text-sky-400 mr-1"></i> Elastic &amp; Inelastic Collisions
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-wind text-emerald-400 mr-1"></i> Bioaerosol Impaction
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <span class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต</span>
                <span class="text-sm font-bold text-white">สาขาวิชาจุลชีววิทยา มรภ.รำไพพรรณี</span>
                <span class="text-[10px] text-amber-400/80 font-bold">ศูนย์ความเป็นเลิศ LEQs-GLOBE 2027</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Laboratory Content Workspace -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- 3D Virtual Bench & Multi-Instrument Suite Card -->
    <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-4">
        
        <!-- Header & Simulation Metadata -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-white/10 pb-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 mb-1.5 font-mono">
                    <i class="fa-solid fa-atom animate-spin"></i> Interactive 3D Precision Air Track Suite
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    ห้องปฏิบัติการรางลมไร้ความเสียดทาน 3 มิติ (3D Precision Air Track)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    แบบจำลองรางลมอะลูมิเนียม 2.4 เมตร พร้อมเซนเซอร์โฟโตเกตคู่เลเซอร์, รถทดลอง Gliders มวลปรับได้, กันชนสปริง/เวลโคร และ Vector Loupe
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-slate-950 border border-white/10 text-xs font-mono text-slate-300 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>Air Cushion: Zero Friction</span>
                </span>
            </div>
        </div>

        <!-- Action Toolbar -->
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-950/70 p-3 rounded-2xl border border-white/10">
            <div class="flex items-center gap-2 text-xs text-slate-300 font-mono">
                <span class="px-2.5 py-1 rounded-lg bg-amber-500/20 text-amber-300 font-bold border border-amber-500/30">
                    💥 Flag = 10.0 cm | Dual Photogate
                </span>
                <span class="hidden sm:inline text-slate-400 text-[11px]">
                    คลิกค้างแล้วลากเพื่อหมุน 360° | ปรับมวลและความเร็วต้นก่อนกดปล่อยรถ
                </span>
            </div>

            <div class="flex items-center gap-2">
                <a href="../webar/ar_aruco_textbook.html?lab=5&ar=1" target="_blank" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-2 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 4">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-4 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
                </button>
                <button type="button" onclick="toggleSimContainer()" id="btnToggleSimContainer" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายหน้าจอ 3D Simulator">
                    <i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>
                </button>
                <button type="button" onclick="openSimulatorFullscreen()" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition" title="เปิดเต็มจอ">
                    <i class="fa-solid fa-expand"></i>
                </button>
                <a id="btnSimNewTab" href="../simulations/sim05_momentum_3d.html" target="_blank" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="เปิดในแท็บใหม่">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>

        <!-- Iframe Viewer Container -->
        <div id="simFrameContainer" class="relative w-full rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-slate-950">
            <iframe id="simViewerFrame" src="../simulations/sim05_momentum_3d.html" class="w-full h-[680px] sm:h-[720px] lg:h-[760px] border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
        </div>

        <!-- Instructional Card / Quick Tips -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-1">
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-amber-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-magnet"></i> ตอนที่ 1: การชนแบบยืดหยุ่น (Elastic $e=1$)
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ทดสอบการชนที่อนุรักษ์ทั้งโมเมนตัมและพลังงานจลน์ ($e \approx 1$) บันทึกเวลาผ่านโฟโตเกตเพื่อคำนวณ $v_1, v_1', v_2'$
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-sky-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-link"></i> ตอนที่ 2: ไม่ยืดหยุ่นสมบูรณ์ (Inelastic $e=0$)
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    สลับเป็นกันชนเวลโคร รถทั้งสองคันจะเคลื่อนที่ติดกันไปหลังชน ($v_1' = v_2'$) วิเคราะห์พลังงานจลน์ที่สูญเสียไป ($\Delta E_k$)
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-wind"></i> ตอนที่ 3: การดลและละอองลอยชีวภาพ
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    วิเคราะห์แรงดล $J = \Delta p$ เชื่อมโยงสู่การดักจับสปอร์เชื้อราและแบคทีเรียด้วยเครื่อง Andersen Cascade Impactor
                </p>
            </div>
        </div>

    </div>

    <!-- Academic Foundations & Mathematical Equations Suite -->
    <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 font-mono">
                    <i class="fa-solid fa-square-root-variable"></i> Linear Momentum &amp; Aerosol Impaction Biophysics
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    หลักการและสมการฟิสิกส์พื้นฐาน (Theoretical Formulations)
                </h2>
                <p class="text-xs text-slate-400">
                    กฎการอนุรักษ์โมเมนตัมเชิงเส้น, สัมประสิทธิ์การคืนสภาพ และการดลของละอองลอยในทางจุลชีววิทยา
                </p>
            </div>
            <button type="button" onclick="toggleMathDetails('mathSuiteLab05')" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/30 transition flex items-center gap-2 self-start sm:self-auto">
                <span id="mathSuiteLab05BtnText">ย่อ/ขยายสมการ</span> <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>

        <div id="mathSuiteLab05" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <!-- Card 1: Momentum Conservation -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-amber-500/20 space-y-3.5 hover:border-amber-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-amber-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-scale-balanced text-amber-400"></i> ตอนที่ 1: การอนุรักษ์โมเมนตัม
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-mono border border-amber-500/20">Eq. 5.1–5.2</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    โมเมนตัมเชิงเส้น ($\vec{p}$) และกฎการอนุรักษ์เมื่อไม่มีแรงภายนอกกระทำ ($\sum \vec{F}_{\text{ext}} = \mathbf{0}$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                    $$\vec{p} = m \vec{v} \tag{5.1}$$
                    $$m_1 \vec{v}_1 + m_2 \vec{v}_2 = m_1 \vec{v}_1' + m_2 \vec{v}_2' \tag{5.2}$$
                </div>
            </div>

            <!-- Card 2: Restitution & Kinetic Energy Loss -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/20 space-y-3.5 hover:border-sky-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-sky-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-shuffle text-sky-400"></i> ตอนที่ 2: สัมประสิทธิ์การคืนสภาพ
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 font-mono border border-sky-500/20">Eq. 5.3–5.4</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    สัมประสิทธิ์การคืนสภาพ ($e$) วัดความสามารถในการคืนรูปหลังการชน:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$e = \frac{v_2' - v_1'}{v_1 - v_2} \tag{5.3}$$
                    $$\Delta E_k = E_{k,\text{before}} - E_{k,\text{after}} = \frac{1}{2}m_1 v_1^2 - \left(\frac{1}{2}m_1 v_1'^2 + \frac{1}{2}m_2 v_2'^2\right) \tag{5.4}$$
                </div>
            </div>

            <!-- Card 3: Impulse & Bioaerosol Impaction -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-emerald-500/20 space-y-3.5 hover:border-emerald-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-emerald-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-wind text-emerald-400"></i> ตอนที่ 3: แรงดลในชีววิทยา
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 font-mono border border-emerald-500/20">Eq. 5.5–5.6</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    การดล ($\vec{J}$) และการดักจับอนุภาคละอองลอยด้วยความเฉื่อย (Stokes Number):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-emerald-200">
                    $$\vec{J} = \Delta \vec{p} = \vec{F}_{\text{avg}} \Delta t \tag{5.5}$$
                    $$Stk = \frac{\rho_p d_p^2 v}{18 \eta D_j} \tag{5.6}$$
                </div>
            </div>
        </div>
    </div>

    <!-- Master Section Quick Action & Collapse/Expand Bar -->
    <div id="masterLabToolbar" class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-white/10 p-3.5 sm:p-4 rounded-3xl shadow-xl backdrop-blur-xl">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
            <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
            <span class="font-bold text-white">แผงควบคุมการแสดงผลรายงาน:</span>
            <span class="text-slate-400 hidden sm:inline">สามารถคลิกปุ่มย่อ/ขยายในแต่ละการ์ด หรือควบคุมทุกส่วนได้พร้อมกัน</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/30 transition flex items-center gap-1.5 shadow-sm active:scale-95">
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
        <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-amber-400"></i>
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
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
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
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Air Track Simulator (เช่น ขณะรถ Glider เคลื่อนผ่านโฟโตเกต หรือขณะเกิดการชน) เพื่อยืนยันว่าได้ทำการทดลองจริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Air Track ตอนนี้
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

        <!-- 3. Blank Data Tables Section (Student Input Tables) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-4">
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-amber-400 flex items-center gap-2">
                        📊 แบบบันทึกผลการทดลอง (Data Recording Tables)
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        ช่องตารางเป็นช่องว่างเปล่า ให้นักศึกษาอ่านค่าจาก 3D Simulator แล้วพิมพ์บันทึกค่าลงในช่องตามลำดับ
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="calculateAllTables()" class="px-3.5 py-1.5 rounded-xl bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator"></i> คำนวณค่าและสถิติอัตโนมัติ
                    </button>
                    <button type="button" onclick="toggleCardSection('secDataTables_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="secDataTables_body" class="space-y-6 transition-all">

                <!-- Table 5.1: Elastic Collisions -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold text-amber-400 font-mono">
                        ตารางที่ 5.1: ผลการทดลองการชนแบบยืดหยุ่นสมบูรณ์ (Elastic Collision: e = 1.0) บนรางลมไร้ความเสียดทาน
                    </h3>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ครั้งที่</th>
                                    <th class="p-2.5 text-center">มวล $m_1$ (kg)</th>
                                    <th class="p-2.5 text-center">มวล $m_2$ (kg)</th>
                                    <th class="p-2.5 text-center">$v_1$ ก่อนชน (m/s)</th>
                                    <th class="p-2.5 text-center">$v_1'$ หลังชน (m/s)</th>
                                    <th class="p-2.5 text-center">$v_2'$ หลังชน (m/s)</th>
                                    <th class="p-2.5 text-center">$p_{\text{before}}$</th>
                                    <th class="p-2.5 text-center">$p_{\text{after}}$</th>
                                    <th class="p-2.5 text-center">%$\Delta p$</th>
                                    <th class="p-2.5 text-center">$e$</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <?php
                                $el_trials = [
                                    ['0.200', '0.200', '0.80'],
                                    ['0.300', '0.200', '0.80'],
                                    ['0.200', '0.300', '0.80'],
                                    ['0.400', '0.200', '1.00'],
                                    ['0.200', '0.400', '1.00']
                                ];
                                foreach ($el_trials as $idx => $t):
                                ?>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2.5 font-bold text-amber-400 text-center"><?= $idx + 1 ?></td>
                                    <td class="p-2.5 text-center text-slate-300"><?= $t[0] ?></td>
                                    <td class="p-2.5 text-center text-slate-300"><?= $t[1] ?></td>
                                    <td class="p-1"><input type="number" step="0.01" id="t1_v1_<?= $idx ?>" value="<?= $t[2] ?>" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t1_v1p_<?= $idx ?>" placeholder="อ่านจาก 3D" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-amber-300"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t1_v2p_<?= $idx ?>" placeholder="อ่านจาก 3D" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-sky-300 font-bold"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t1_pb_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-slate-300"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t1_pa_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-1"><input type="text" id="t1_dp_<?= $idx ?>" placeholder="%" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-rose-300"></td>
                                    <td class="p-1"><input type="number" step="0.01" id="t1_e_<?= $idx ?>" placeholder="1.00" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 5.2: Completely Inelastic Collisions -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xs font-bold text-sky-400 font-mono">
                        ตารางที่ 5.2: ผลการทดลองการชนแบบไม่ยืดหยุ่นสมบูรณ์ (Completely Inelastic Collision: e = 0.0)
                    </h3>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ครั้งที่</th>
                                    <th class="p-2.5 text-center">มวล $m_1$ (kg)</th>
                                    <th class="p-2.5 text-center">มวล $m_2$ (kg)</th>
                                    <th class="p-2.5 text-center">$v_1$ ก่อนชน (m/s)</th>
                                    <th class="p-2.5 text-center">ความเร็วร่วม $v'$ (m/s)</th>
                                    <th class="p-2.5 text-center">$p_{\text{before}}$</th>
                                    <th class="p-2.5 text-center">$p_{\text{after}}$</th>
                                    <th class="p-2.5 text-center">$E_{k,\text{before}}$ (J)</th>
                                    <th class="p-2.5 text-center">$E_{k,\text{after}}$ (J)</th>
                                    <th class="p-2.5 text-center">พลังงานสูญเสีย (%)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                <?php
                                $inel_trials = [
                                    ['0.200', '0.200', '0.80'],
                                    ['0.300', '0.200', '0.80'],
                                    ['0.200', '0.400', '1.00'],
                                    ['0.400', '0.200', '1.20']
                                ];
                                foreach ($inel_trials as $idx => $t):
                                ?>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2.5 font-bold text-sky-400 text-center"><?= $idx + 1 ?></td>
                                    <td class="p-2.5 text-center text-slate-300"><?= $t[0] ?></td>
                                    <td class="p-2.5 text-center text-slate-300"><?= $t[1] ?></td>
                                    <td class="p-1"><input type="number" step="0.01" id="t2_v1_<?= $idx ?>" value="<?= $t[2] ?>" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t2_vp_<?= $idx ?>" placeholder="อ่านจาก 3D" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-sky-300 font-bold"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t2_pb_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-slate-300"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t2_pa_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t2_keb_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-slate-300"></td>
                                    <td class="p-1"><input type="number" step="0.001" id="t2_kea_<?= $idx ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-amber-300"></td>
                                    <td class="p-1"><input type="text" id="t2_loss_<?= $idx ?>" placeholder="%" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-rose-300"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 5.3: Bioaerosol Impaction & Impulse -->
                <div class="space-y-3 pt-2">
                    <h3 class="text-xs font-bold text-emerald-400 font-mono">
                        ตารางที่ 5.3: การวิเคราะห์แรงดลและการดักจับละอองลอยชีวภาพ (Inertial Bioaerosol Impactor Analysis)
                    </h3>

                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-left font-mono border-collapse min-w-[700px]">
                            <thead>
                                <tr class="border-b border-white/15 bg-slate-900/80 text-slate-300 text-[11px]">
                                    <th class="p-2.5">ชนิดละอองลอยชีวภาพ</th>
                                    <th class="p-2.5 text-center">ขนาดเส้นผ่านศูนย์กลาง ($d_p$)</th>
                                    <th class="p-2.5 text-center">ความเร็วพ่น $v$ (m/s)</th>
                                    <th class="p-2.5 text-center">โมเมนตัมอนุภาค $p$ (kg&middot;m/s)</th>
                                    <th class="p-2.5 text-center">แรงดล $J$ (N&middot;s)</th>
                                    <th class="p-2.5 text-center">Stokes Number ($Stk$)</th>
                                    <th class="p-2.5 text-center">ผลการดักจับบนจานอาหารเชื้อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $aero_samples = [
                                    ['1. ละอองไอจาม (Respiratory Droplet)', '10.0 µm', '2.50'],
                                    ['2. สปอร์เชื้อรา (Aspergillus spore)', '4.5 µm', '2.50'],
                                    ['3. ละอองลอยแบคทีเรีย (Staphylococcus)', '1.2 µm', '2.50']
                                ];
                                foreach ($aero_samples as $i => $s):
                                ?>
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-2.5 font-bold text-slate-200"><?= $s[0] ?></td>
                                    <td class="p-2.5 text-center text-slate-400"><?= $s[1] ?></td>
                                    <td class="p-2.5 text-center text-slate-300"><?= $s[2] ?></td>
                                    <td class="p-1"><input type="number" step="0.000000000000001" id="t3_p_<?= $i ?>" placeholder="e.g. 1.3e-15" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-amber-300"></td>
                                    <td class="p-1"><input type="number" step="0.000000000000001" id="t3_j_<?= $i ?>" placeholder="e.g. 1.3e-15" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-sky-300 font-bold"></td>
                                    <td class="p-1"><input type="number" step="0.01" id="t3_stk_<?= $i ?>" placeholder="คำนวณ" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-emerald-400 font-bold"></td>
                                    <td class="p-1"><input type="text" id="t3_res_<?= $i ?>" placeholder="เช่น ชนติด 100%" required class="input-blank w-full rounded-lg px-2 py-1 text-center text-xs text-white"></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- 4. Calculations, Discussion & Conclusion Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-amber-400 flex items-center gap-2">
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

                    <div class="p-4 rounded-2xl bg-slate-950/90 border border-amber-500/30 space-y-2.5">
                        <div class="flex items-center justify-between text-xs font-bold text-amber-400 font-mono">
                            <span><i class="fa-solid fa-book-open"></i> โครงสร้างสูตรคำนวณตามมาตรฐานวิชาการ (Academic Calculation Structure)</span>
                            <span class="text-[10px] text-slate-400">แทนค่าตัวเลขจากตารางลงในกล่องข้อความ</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-emerald-400">1. การคำนวณโมเมนตัมและ %Difference:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $p_{\text{before}} = m_1 v_1, \quad p_{\text{after}} = m_1 v_1' + m_2 v_2'$<br>
                                    $\%\Delta p = \frac{|p_{\text{after}} - p_{\text{before}}|}{p_{\text{before}}} \times 100\%$
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-sky-400">2. สัมประสิทธิ์การคืนสภาพและพลังงานจลน์:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $e = \frac{v_2' - v_1'}{v_1 - v_2}$<br>
                                    $\%E_{k,\text{loss}} = \frac{E_{k,\text{before}} - E_{k,\text{after}}}{E_{k,\text{before}}} \times 100\%$
                                </div>
                            </div>
                        </div>
                    </div>

                    <textarea id="lab_calculations" name="lab_calculations" rows="5" required placeholder="พิมพ์แสดงวิธีทำ:
1. การชนแบบยืดหยุ่นครั้งที่ 1 (m1 = 0.200 kg, m2 = 0.200 kg, v1 = 0.80 m/s):
   p_before = 0.200 * 0.80 = 0.160 kg·m/s
   v1' = 0.000 m/s, v2' = 0.800 m/s
   p_after = (0.200 * 0) + (0.200 * 0.80) = 0.160 kg·m/s
   %Diff p = |0.160 - 0.160| / 0.160 * 100 = 0.0%
   e = (0.800 - 0.000) / (0.80 - 0) = 1.00
2. การชนแบบไม่ยืดหยุ่นครั้งที่ 1 (ติดกันไป):
   v' = (0.200 * 0.80) / (0.200 + 0.200) = 0.400 m/s
   Ek_before = 0.5 * 0.200 * (0.80)^2 = 0.064 J
   Ek_after = 0.5 * (0.400) * (0.400)^2 = 0.032 J
   %Ek_loss = (0.064 - 0.032) / 0.064 * 100 = 50.0%" class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition font-mono leading-relaxed"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">
                            2. การอภิปรายผลการทดลอง (Discussion) <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="lab_discussion" name="lab_discussion" rows="4" required placeholder="อภิปรายเปรียบเทียบการอนุรักษ์โมเมนตัมระหว่างการชนแบบยืดหยุ่นและไม่ยืดหยุ่น, การถ่ายโอนพลังงานจลน์, ปัจจัยความคลาดเคลื่อนจากแรงเสียดทานของรางลม..." class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-300">
                            3. สรุปผลการทดลอง (Conclusion) <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="lab_conclusion" name="lab_conclusion" rows="4" required placeholder="สรุปผลการทดลอง: ยืนยันกฎการอนุรักษ์โมเมนตัมในระบบปิด, สัมประสิทธิ์การคืนสภาพของกันชนสปริง vs เวลโคร, และการประยุกต์สู่การดักจับเชื้อโรคทางอากาศ..." class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
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
                        คำถามข้อที่ 1: เปรียบเทียบผลรวมโมเมนตัมและพลังงานจลน์ระหว่างการชนแบบยืดหยุ่นสมบูรณ์ ($e = 1$) กับการชนแบบไม่ยืดหยุ่นสมบูรณ์ ($e = 0$) เหตุใดโมเมนตัมจึงอนุรักษ์ในทั้งสองกรณี แต่พลังงานจลน์จึงไม่เท่ากัน พลังงานที่สูญเสียไปเปลี่ยนรูปเป็นสิ่งใด? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 2: อธิบายหลักการทำงานของเครื่องเก็บตัวอย่างอากาศชีวภาพ Andersen Cascade Impactor ว่าอาศัยโมเมนตัมและความเฉื่อย (Inertia) ของละอองลอยอย่างไรในการคัดแยกขนาดของสปอร์เชื้อรา แบคทีเรีย และไวรัสลงบนแต่ละชั้นของจานอาหารเลี้ยงเชื้อ? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>

                <div class="p-4 rounded-2xl bg-slate-950/80 border border-white/5 space-y-2">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 3: [ENV / Biosafety] ในระบบท่อไอน้ำแรงดันสูงของหม้อนึ่ง Autoclave หรือท่อส่งน้ำเพาะเลี้ยงเชื้อ หากเจ้าหน้าที่ปิดวาล์วน้ำฉับพลัน จะเกิดปรากฏการณ์ Water Hammer อย่างไร จงอธิบายด้วยความสัมพันธ์ของโมเมนตัมและการดล และมีมาตรการป้องกันความเสียหายอย่างไร? <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" required placeholder="พิมพ์คำตอบของคุณ..." class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-500 outline-none transition leading-relaxed"></textarea>
                </div>
            </div>
        </div>

        <!-- Submit Button Card -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="space-y-1 text-center sm:text-left">
                <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                    <i class="fa-solid fa-cloud-arrow-up text-amber-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 5 (Final E-Report Submission)
                </div>
                <div class="text-xs text-slate-400">
                    ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
                </div>
            </div>

            <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-amber-500 via-orange-500 to-sky-400 hover:from-amber-400 text-slate-950 font-extrabold text-sm shadow-xl shadow-amber-950/40 transition active:scale-95 flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
            </button>
        </div>

    </form>

    <!-- Lab Pagination Navigation -->
    <nav class="flex items-center justify-between gap-4 pt-4 border-t border-white/10 font-mono text-xs">
        <a href="lab04_newton.php" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 border border-white/10 transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> <span>ปฏิบัติการที่ 4: กฎนิวตันและการปั่นเหวี่ยง</span>
        </a>
        <a href="lab06_equilibrium.php" class="px-4 py-2.5 rounded-xl bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/30 font-bold transition flex items-center gap-2">
            <span>ปฏิบัติการที่ 6: สมดุลและการแพร่ออสโมซิส</span> <i class="fa-solid fa-arrow-right"></i>
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
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab05'];
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
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab05'];
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
    // Table 5.1 Elastic Collisions
    const el_trials = [
        [0.200, 0.200, 0.80],
        [0.300, 0.200, 0.80],
        [0.200, 0.300, 0.80],
        [0.400, 0.200, 1.00],
        [0.200, 0.400, 1.00]
    ];

    el_trials.forEach((t, i) => {
        const m1 = t[0];
        const m2 = t[1];
        const v1 = parseFloat(document.getElementById(`t1_v1_${i}`)?.value || t[2]);
        const v1p = ((m1 - m2) / (m1 + m2)) * v1;
        const v2p = ((2 * m1) / (m1 + m2)) * v1;

        const v1pEl = document.getElementById(`t1_v1p_${i}`);
        const v2pEl = document.getElementById(`t1_v2p_${i}`);
        const pbEl = document.getElementById(`t1_pb_${i}`);
        const paEl = document.getElementById(`t1_pa_${i}`);
        const dpEl = document.getElementById(`t1_dp_${i}`);
        const eEl = document.getElementById(`t1_e_${i}`);

        if (v1pEl && !v1pEl.value) v1pEl.value = v1p.toFixed(3);
        if (v2pEl && !v2pEl.value) v2pEl.value = v2p.toFixed(3);

        const curV1p = parseFloat(v1pEl?.value || v1p);
        const curV2p = parseFloat(v2pEl?.value || v2p);

        const pb = m1 * v1;
        const pa = m1 * curV1p + m2 * curV2p;
        const err = Math.abs((pa - pb) / pb) * 100;
        const coeffE = (curV2p - curV1p) / v1;

        if (pbEl) pbEl.value = pb.toFixed(3);
        if (paEl) paEl.value = pa.toFixed(3);
        if (dpEl) dpEl.value = err.toFixed(2) + '%';
        if (eEl) eEl.value = coeffE.toFixed(2);
    });

    // Table 5.2 Inelastic Collisions
    const inel_trials = [
        [0.200, 0.200, 0.80],
        [0.300, 0.200, 0.80],
        [0.200, 0.400, 1.00],
        [0.400, 0.200, 1.20]
    ];

    inel_trials.forEach((t, i) => {
        const m1 = t[0];
        const m2 = t[1];
        const v1 = parseFloat(document.getElementById(`t2_v1_${i}`)?.value || t[2]);
        const vf = (m1 * v1) / (m1 + m2);

        const vpEl = document.getElementById(`t2_vp_${i}`);
        const pbEl = document.getElementById(`t2_pb_${i}`);
        const paEl = document.getElementById(`t2_pa_${i}`);
        const kebEl = document.getElementById(`t2_keb_${i}`);
        const keaEl = document.getElementById(`t2_kea_${i}`);
        const lossEl = document.getElementById(`t2_loss_${i}`);

        if (vpEl && !vpEl.value) vpEl.value = vf.toFixed(3);
        const curVf = parseFloat(vpEl?.value || vf);

        const pb = m1 * v1;
        const pa = (m1 + m2) * curVf;
        const keb = 0.5 * m1 * v1 * v1;
        const kea = 0.5 * (m1 + m2) * curVf * curVf;
        const loss = ((keb - kea) / keb) * 100;

        if (pbEl) pbEl.value = pb.toFixed(3);
        if (paEl) paEl.value = pa.toFixed(3);
        if (kebEl) kebEl.value = keb.toFixed(3);
        if (keaEl) keaEl.value = kea.toFixed(3);
        if (lossEl) lossEl.value = loss.toFixed(1) + '%';
    });

    // Table 5.3 Bioaerosol Impactor Standards
    const aero_stds = [
        { p: 1.31e-12, j: 1.31e-12, stk: 2.15, res: 'ดักจับติดแผ่นอาหารเลี้ยงเชื้อ 100%' },
        { p: 1.19e-13, j: 1.19e-13, stk: 0.44, res: 'ดักจับติดแผ่นอาหารเลี้ยงเชื้อ 85%' },
        { p: 2.26e-15, j: 2.26e-15, stk: 0.03, res: 'ลอยเลี้ยวตามกระแสอากาศ (ไม่ดักจับ)' }
    ];

    aero_stds.forEach((s, i) => {
        const pEl = document.getElementById(`t3_p_${i}`);
        const jEl = document.getElementById(`t3_j_${i}`);
        const stkEl = document.getElementById(`t3_stk_${i}`);
        const resEl = document.getElementById(`t3_res_${i}`);

        if (pEl && !pEl.value) pEl.value = s.p.toExponential(2);
        if (jEl && !jEl.value) jEl.value = s.j.toExponential(2);
        if (stkEl && !stkEl.value) stkEl.value = s.stk.toFixed(2);
        if (resEl && !resEl.value) resEl.value = s.res;
    });

    alert("✅ คำนวณค่าโมเมนตัมและพลังงานจลน์ลงในตารางเรียบร้อยแล้วครับ");
}

// ==========================================
// VALIDATION & SUBMISSION HANDLER
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
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D Air Track ตอนนี้' หรืออัปโหลดภาพก่อนส่งรายงานครับ");
        return;
    }

    // Collect table 5.1
    const table1Data = [];
    for (let i = 0; i < 5; i++) {
        table1Data.push({
            trial: i + 1,
            v1: document.getElementById(`t1_v1_${i}`)?.value || '',
            v1_prime: document.getElementById(`t1_v1p_${i}`)?.value || '',
            v2_prime: document.getElementById(`t1_v2p_${i}`)?.value || '',
            p_before: document.getElementById(`t1_pb_${i}`)?.value || '',
            p_after: document.getElementById(`t1_pa_${i}`)?.value || '',
            diff_p: document.getElementById(`t1_dp_${i}`)?.value || '',
            e: document.getElementById(`t1_e_${i}`)?.value || ''
        });
    }

    // Collect table 5.2
    const table2Data = [];
    for (let i = 0; i < 4; i++) {
        table2Data.push({
            trial: i + 1,
            v1: document.getElementById(`t2_v1_${i}`)?.value || '',
            v_common: document.getElementById(`t2_vp_${i}`)?.value || '',
            p_before: document.getElementById(`t2_pb_${i}`)?.value || '',
            p_after: document.getElementById(`t2_pa_${i}`)?.value || '',
            ke_before: document.getElementById(`t2_keb_${i}`)?.value || '',
            ke_after: document.getElementById(`t2_kea_${i}`)?.value || '',
            ke_loss: document.getElementById(`t2_loss_${i}`)?.value || ''
        });
    }

    // Collect table 5.3
    const table3Data = [];
    for (let i = 0; i < 3; i++) {
        table3Data.push({
            sample_index: i + 1,
            momentum: document.getElementById(`t3_p_${i}`)?.value || '',
            impulse: document.getElementById(`t3_j_${i}`)?.value || '',
            stokes_num: document.getElementById(`t3_stk_${i}`)?.value || '',
            result: document.getElementById(`t3_res_${i}`)?.value || ''
        });
    }

    if (!calculations || !discussion || !conclusion) {
        alert("⚠️ กรุณากรอกวิธีคำนวณ การอภิปรายผล และสรุปผลการทดลองให้ครบถ้วนครับ");
        return;
    }

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        return;
    }

    const payload = {
        lab_id: 'lab05',
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
        error_percentage: parseFloat(document.getElementById('t1_dp_0')?.value) || 0.0,
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
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 5 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-05'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
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
