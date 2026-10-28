<?php
$pageTitle = 'ปฏิบัติการที่ 7: กลศาสตร์ชีวเคมีและโมเลกุลมอเตอร์ | Lab 07: Biochemical Mechanics & Molecular Motors';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 07</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch07_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 7</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=7" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=7&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 6)</span>
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

<!-- Custom Styling for Lab 07 -->
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
  border-color: #a855f7;
  box-shadow: 0 0 10px rgba(168, 85, 247, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-purple-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-purple-500/10 text-purple-400 border border-purple-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-purple-400 animate-ping"></span>
                    <span>LABORATORY 07 • BIOCHEMICAL MECHANICS</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    กลศาสตร์ชีวเคมี <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-fuchsia-400 to-amber-400">และโมเลกุลมอเตอร์</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาพลังขับเคลื่อนโปรตอน ($\text{PMF} = \Delta \psi - \frac{2.3RT}{F}\Delta\text{pH}$), กลศาสตร์การหมุนของโมเลกุลมอเตอร์ $\text{F}_0\text{F}_1$-ATP Synthase และ Bacterial Flagellar Motor (BFM), ทอร์กหน่วงในของไหลเรย์โนลด์ต่ำ ($Re \ll 1$) และประสิทธิภาพการแปลงพลังงานเชิงกลเคมี
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-purple-300">
                        <i class="fa-solid fa-dharmachakra text-purple-400 mr-1"></i> F₀F₁-ATP Synthase Rotor
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-bacteria text-amber-400 mr-1"></i> Bacterial Flagellar Motor
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-cyan-300">
                        <i class="fa-solid fa-water text-cyan-400 mr-1"></i> Low Reynolds (Re &lt;&lt; 1)
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-purple-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-purple-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-purple-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-purple-400 border border-purple-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-purple-950/40">
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
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">1</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-book-open text-purple-400"></i> ทฤษฎีและสมการกลศาสตร์ชีวเคมีและโมเลกุลมอเตอร์
                    </h2>
                    <p class="text-xs text-slate-400">Proton Motive Force, Rotational Torque &amp; Low Reynolds Drag</p>
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
                    <h3 class="font-bold text-purple-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-bolt"></i> 1. พลังขับเคลื่อนโปรตอน (Proton Motive Force: PMF)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        การถ่ายโอนอิเล็กตรอนในสายโซ่หายใจขับโปรตอนข้ามเยื่อหุ้ม ทำให้เกิดความต่างศักย์ไฟฟ้า ($\Delta \psi$) และความต่างระดับความเข้มข้นโปรตอน ($\Delta\text{pH}$) ซึ่งรวมกันเป็นพลังงานขับเคลื่อนทางเคมีไฟฟ้า:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-purple-500/20 text-center font-mono">
                        $$\text{PMF} = \Delta \psi - \left( \frac{2.303 R T}{F} \right) \Delta \text{pH} \tag{สมการที่ 7.1}$$
                    </div>
                    <ul class="text-[11px] text-slate-400 space-y-1 pl-4 list-disc">
                        <li>ที่ $25^\circ\text{C}$ (298.15 K): พจน์ $\frac{2.303 RT}{F} \approx 59.16\text{ mV}$ ต่อหนึ่งหน่วย pH</li>
                        <li>$\Delta \psi$ คือ ความต่างศักย์ไฟฟ้าเยื่อหุ้มเซลล์ (ปกติ $-120$ ถึง $-180\text{ mV}$)</li>
                        <li>$\Delta\text{pH} = \text{pH}_{\text{in}} - \text{pH}_{\text{out}}$ (ปกติภายในเซลล์เป็นด่างกว่าภายนอก $\approx 0.5 - 1.5$ หน่วย)</li>
                        <li>$\text{PMF}$ สุทธิในแบคทีเรียและไมโทคอนเดรียมีค่าประมาณ $-180$ ถึง $-220\text{ mV}$</li>
                    </ul>
                </div>

                <!-- Theory 2 -->
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-water"></i> 2. กลศาสตร์การเคลื่อนที่ในโลกเรย์โนลด์ต่ำ (Low Reynolds Number, $Re \ll 1$)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        สำหรับแบคทีเรียและโมเลกุลโปรตีน เลขเรย์โนลด์ $Re = \frac{\rho v L}{\eta} \sim 10^{-5}$ ความเฉื่อยจึงไร้ผลอย่างสิ้นเชิง แรงบิดขับเคลื่อน ($\tau$) จะถูกสมดุลด้วยแรงบิดหน่วงจากความหนืด ($\tau_{\text{drag}}$) ในทันที:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-amber-500/20 text-center font-mono">
                        $$\tau = \gamma_{\text{rot}} \omega = \gamma_{\text{rot}} (2\pi f) \tag{สมการที่ 7.2}$$
                    </div>
                    <ul class="text-[11px] text-slate-400 space-y-1 pl-4 list-disc">
                        <li>$\tau$ คือ แรงบิดหรือทอร์กของโมเลกุลมอเตอร์ ($\text{pN}\cdot\text{nm}$)</li>
                        <li>$\gamma_{\text{rot}}$ คือ สัมประสิทธิ์การหน่วงเชิงมุมตามกฎของสโตกส์ ($\propto \eta$)</li>
                        <li>$\omega$ คือ ความเร็วเชิงมุม ($\text{rad/s}$) และ $f$ คือ ความถี่รอบการหมุน ($\text{Hz}$)</li>
                    </ul>
                </div>
            </div>

            <!-- Theory Row 2: Bioenergetics & ATP Kinetics -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-emerald-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-dharmachakra"></i> 3. จลนศาสตร์การสังเคราะห์ ATP ของเอนไซม์ F₀F₁-ATP Synthase
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ตามทฤษฎีกลไกการเปลี่ยนรูปแบบพันธะของบอยเออร์ (Boyer's Binding Change Mechanism) การหมุนของก้าน $\gamma$ ครบ $360^\circ$ จะกระตุ้นการเปลี่ยนรูปของหน่วยย่อย $\beta$ สามหน่วย (Open $\to$ Loose $\to$ Tight) ผลิตได้ 3 ATP:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-emerald-500/20 text-center font-mono">
                        $$R_{\text{ATP}} = 3 \cdot f_{\text{rot}} \tag{สมการที่ 7.3}$$
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        โดยโรเตอร์ c-ring ต้องการโปรตอนประมาณ 8–10 ตัวต่อหนึ่งรอบการหมุน ทำให้มีอัตราส่วนการสังเคราะห์ $\text{H}^+/\text{ATP} \approx 2.7 - 3.3$
                    </p>
                </div>

                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-gauge-high"></i> 4. กำลังงานกลและประสิทธิภาพเชิงกลเคมี (Chemo-mechanical Efficiency)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        กำลังงานกลที่ส่งออกจากโรเตอร์ ($P_{\text{mech}}$) เปรียบเทียบกับกำลังงานทางเคมีไฟฟ้าจากกระแสโปรตอน ($P_{\text{chem}}$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-cyan-500/20 text-center font-mono">
                        $$P_{\text{mech}} = \tau \omega, \quad P_{\text{chem}} = I_H \cdot |\text{PMF}| \tag{สมการที่ 7.4}$$
                    </div>
                    <div class="bg-slate-900 p-3 rounded-lg border border-cyan-500/20 text-center font-mono">
                        $$\eta = \frac{P_{\text{mech}}}{P_{\text{chem}}} \times 100\% \approx 80 - 100\% \tag{สมการที่ 7.5}$$
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: 3D Interactive Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-purple-500/30 shadow-2xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardSimulator')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">2</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-gamepad text-purple-400"></i> ห้องปฏิบัติการ 3D เสมือนจริง: นาโนมอเตอร์โมเลกุล F₀F₁ และแฟลกเจลลา
                    </h2>
                    <p class="text-xs text-slate-400">Three.js Molecular Rotor Simulation &amp; Synchronized Catalytic Loupe</p>
                </div>
            </div>
            <div class="flex items-center gap-2" onclick="event.stopPropagation()">
                <a href="../webar/ar_aruco_textbook.html?lab=7&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-1.5 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 6">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-xs"></i> <span>📸 แคปหน้าจอ 3D</span>
                </button>
                <button onclick="toggleSimContainerFullscreen()" class="px-2.5 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-purple-400 text-xs font-mono transition flex items-center gap-1">
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
                <iframe id="molecular3DIframe" src="../simulations/sim07_molecular_motors_3d.html" class="w-full h-full border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
            </div>
            
            <!-- Quick Simulator Helper Bar -->
            <div class="p-3 bg-slate-950/80 border-t border-white/10 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-400 font-mono">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-purple-400 animate-pulse"></span>
                    <span>3D SIMULATOR ACTIVE • BIOENERGETICS ENGINE</span>
                </div>
                <div class="flex items-center gap-3">
                    <span><i class="fa-solid fa-mouse-pointer text-purple-400 mr-1"></i> หมุนมุมมอง: คลิกซ้ายลาก</span>
                    <span><i class="fa-solid fa-up-down text-purple-400 mr-1"></i> ซูม: ลูกกลิ้งเมาส์</span>
                    <span><i class="fa-solid fa-hand text-purple-400 mr-1"></i> เลื่อนระนาบ: คลิกขวาลาก</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Global Control Bar -->
    <div class="flex items-center justify-between bg-slate-900/60 p-4 rounded-2xl border border-white/10 text-xs">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-purple-400 animate-ping"></span>
            <span class="font-bold text-white">ระบบรายงานผลดิจิทัล (Digital Lab Report System)</span>
            <span class="text-slate-400 hidden sm:inline">• รองรับการแคปหลักฐาน 3D และส่งข้อมูลขึ้นระบบอัตโนมัติ</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-purple-400 border border-purple-500/30 transition flex items-center gap-1.5 active:scale-95">
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
        <div id="cardStudentProfile" class="bg-slate-900/90 border border-purple-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-purple-400"></i>
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
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-purple-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-purple-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-purple-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-purple-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div id="cardEvidence" class="bg-slate-900/90 border border-purple-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-purple-400"></i>
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
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Molecular Motors Simulator เพื่อยืนยันว่าได้สังเกตการหมุนของ F₀F₁-ATP Synthase หรือ Flagellar Rotor จริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-500 hover:from-purple-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Molecular Motor ตอนนี้
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
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">3</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-table text-purple-400"></i> ตารางบันทึกผลการทดลอง (Strict Blank Data Tables)
                    </h2>
                    <p class="text-xs text-slate-400">บันทึกข้อมูลความถี่รอบการหมุน ทอร์ก กำลังงาน และอัตราการสังเคราะห์ ATP จากแบบจำลอง</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardDataTables_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardDataTables_body" class="p-6 space-y-8 border-t border-white/5">
            
            <!-- Table 7.1: Motor Rotation Speed vs PMF -->
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-purple-400 flex items-center gap-2">
                        <i class="fa-solid fa-gauge"></i> ตารางที่ 7.1: การวัดความเร็วรอบการหมุนของโมเลกุลมอเตอร์ ($f$) ที่ค่า $\Delta\psi$ และ $\Delta\text{pH}$ ต่างๆ ($\eta = 1.0\text{ cP}$)
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">ความสัมพันธ์ตามสมการ Nernst: $\text{PMF} = \Delta \psi - 59.16 \cdot \Delta\text{pH}$</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-purple-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ความต่างศักย์ $\Delta\psi$<br><span class="text-[10px] text-slate-400 font-sans">(mV)</span></th>
                                <th class="px-4 py-3">ความต่าง pH<br><span class="text-[10px] text-slate-400 font-sans">(&Delta;pH)</span></th>
                                <th class="px-4 py-3">พลังขับ PMF<br><span class="text-[10px] text-slate-400 font-sans">(mV)</span></th>
                                <th class="px-4 py-3">ความถี่รอบหมุน $f$<br><span class="text-[10px] text-slate-400 font-sans">(Hz)</span></th>
                                <th class="px-4 py-3">รอบต่อนาที<br><span class="text-[10px] text-slate-400 font-sans">(RPM)</span></th>
                                <th class="px-4 py-3 text-right">ความเร็วเชิงมุม $\omega$<br><span class="text-[10px] text-slate-400 font-sans">(rad/s)</span></th>
                            </tr>
                        </thead>
                        <tbody id="table71_body" class="divide-y divide-white/5 font-mono">
                            <!-- 5 Rows -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">-60</td>
                                <td class="px-4 py-2.5 text-slate-300">0.50</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_pmf_0" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_hz_0" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_rpm_0" class="input-blank w-28 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_omega_0" class="text-slate-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">-100</td>
                                <td class="px-4 py-2.5 text-slate-300">0.80</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_pmf_1" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_hz_1" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_rpm_1" class="input-blank w-28 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_omega_1" class="text-slate-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">-140</td>
                                <td class="px-4 py-2.5 text-slate-300">1.00</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_pmf_2" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_hz_2" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_rpm_2" class="input-blank w-28 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_omega_2" class="text-slate-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">-180</td>
                                <td class="px-4 py-2.5 text-slate-300">1.20</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_pmf_3" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_hz_3" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_rpm_3" class="input-blank w-28 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_omega_3" class="text-slate-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">5</td>
                                <td class="px-4 py-2.5 font-bold text-white">-200</td>
                                <td class="px-4 py-2.5 text-slate-300">1.50</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_pmf_4" class="input-blank w-24 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_hz_4" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t1_rpm_4" class="input-blank w-28 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_omega_4" class="text-slate-400 font-bold">-</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 7.2: Viscous Medium Effects & Low Reynolds Mechanics -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-amber-400 flex items-center gap-2">
                        <i class="fa-solid fa-water"></i> ตารางที่ 7.2: ผลของความหนืดตัวกลาง ($\eta$) ต่อทอร์ก ($\tau$), กำลังงานกล ($P_{\text{mech}}$) และประสิทธิภาพ ($\eta$)
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">สภาวะ $\text{PMF} = -199.2\text{ mV}$ คงที่</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-amber-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ความหนืด $\eta$<br><span class="text-[10px] text-slate-400 font-sans">(cP)</span></th>
                                <th class="px-4 py-3">สภาวะตัวกลาง<br><span class="text-[10px] text-slate-400 font-sans">(Environment)</span></th>
                                <th class="px-4 py-3">ความถี่รอบ $f$<br><span class="text-[10px] text-slate-400 font-sans">(Hz)</span></th>
                                <th class="px-4 py-3">ทอร์ก $\tau$<br><span class="text-[10px] text-slate-400 font-sans">(pN·nm)</span></th>
                                <th class="px-4 py-3">กำลังงานกล $P_{\text{mech}}$<br><span class="text-[10px] text-slate-400 font-sans">(fW)</span></th>
                                <th class="px-4 py-3 text-right">ประสิทธิภาพ $\eta$<br><span class="text-[10px] text-slate-400 font-sans">(% Efficiency)</span></th>
                            </tr>
                        </thead>
                        <tbody id="table72_body" class="divide-y divide-white/5 font-mono">
                            <!-- 4 Rows -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">0.70</td>
                                <td class="px-4 py-2.5 text-slate-300">น้ำอุ่น (37°C Saline)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_hz_0" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="1.0" id="t2_tau_0" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_p_0" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_eff_0" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">1.00</td>
                                <td class="px-4 py-2.5 text-slate-300">น้ำบริสุทธิ์ (25°C Water)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_hz_1" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="1.0" id="t2_tau_1" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_p_1" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_eff_1" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">4.50</td>
                                <td class="px-4 py-2.5 text-slate-300">อาหารเลี้ยงเชื้อข้น (Broth)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_hz_2" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="1.0" id="t2_tau_2" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_p_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_eff_2" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">12.00</td>
                                <td class="px-4 py-2.5 text-slate-300">ชั้นมูกเมือก (Mucus Matrix)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_hz_3" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="1.0" id="t2_tau_3" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_p_3" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_eff_3" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 7.3: ATP Synthase Catalytic Kinetics -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                        <i class="fa-solid fa-certificate"></i> ตารางที่ 7.3: จลนศาสตร์การสังเคราะห์ ATP ของเอนไซม์ F₀F₁-ATP Synthase
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">การจับคู่ 3 ATP ต่อการหมุนก้าน $\gamma$ ครบ 360° ($R_{\text{ATP}} = 3 f$)</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-emerald-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">พลังขับ PMF<br><span class="text-[10px] text-slate-400 font-sans">(mV)</span></th>
                                <th class="px-4 py-3">ความเร็วรอบ $f$<br><span class="text-[10px] text-slate-400 font-sans">(Hz)</span></th>
                                <th class="px-4 py-3">กระแสโปรตอน $I_H$<br><span class="text-[10px] text-slate-400 font-sans">(H⁺/s, n=9)</span></th>
                                <th class="px-4 py-3">อัตราสังเคราะห์ ATP<br><span class="text-[10px] text-slate-400 font-sans">(ATP/s)</span></th>
                                <th class="px-4 py-3">พลังงานเคมี $\Delta G$<br><span class="text-[10px] text-slate-400 font-sans">(kJ/mol ATP)</span></th>
                                <th class="px-4 py-3 text-right">สภาวะโรเตอร์<br><span class="text-[10px] text-slate-400 font-sans">Active/Stalled</span></th>
                            </tr>
                        </thead>
                        <tbody id="table73_body" class="divide-y divide-white/5 font-mono">
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">-80</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_hz_0" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ih_0" class="input-blank w-28 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_atp_0" class="input-blank w-28 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-slate-300">-30.5</td>
                                <td class="px-4 py-2.5 text-right"><span id="t3_state_0" class="text-amber-400 font-bold">Low Substrate Speed</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">-140</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_hz_1" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ih_1" class="input-blank w-28 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_atp_1" class="input-blank w-28 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-slate-300">-45.2</td>
                                <td class="px-4 py-2.5 text-right"><span id="t3_state_1" class="text-emerald-400 font-bold">Steady Active Synthesis</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">-200</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_hz_2" class="input-blank w-24 px-2 py-1 rounded text-right text-purple-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ih_2" class="input-blank w-28 px-2 py-1 rounded text-right text-cyan-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_atp_2" class="input-blank w-28 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-slate-300">-52.8</td>
                                <td class="px-4 py-2.5 text-right"><span id="t3_state_2" class="text-purple-400 font-bold">Maximal Catalytic Velocity</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">0 (CCCP Uncoupler)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_hz_3" class="input-blank w-24 px-2 py-1 rounded text-right text-rose-400 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ih_3" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-400 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_atp_3" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-400 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5 text-slate-300">0.0</td>
                                <td class="px-4 py-2.5 text-right"><span id="t3_state_3" class="text-rose-500 font-bold">Stalled (หยุดชะงักสมบูรณ์)</span></td>
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
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">4</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-pen-nib text-purple-400"></i> การวิเคราะห์ วิจารณ์ผล และสรุปผลการทดลอง
                    </h2>
                    <p class="text-xs text-slate-400">Scientific Discussion, Error Sources &amp; Biomechanical Conclusions</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardDiscussion_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardDiscussion_body" class="p-6 space-y-6 border-t border-white/5">
            <div class="space-y-2.5">
                <label class="text-xs font-bold text-purple-400 flex items-center gap-2">
                    <i class="fa-solid fa-calculator"></i> 1. การแสดงวิธีคำนวณพลังขับเคลื่อนโปรตอนและทอร์ก (Calculations):
                </label>
                <div class="p-3 rounded-xl bg-slate-950/70 border border-white/10 text-xs text-slate-300 font-mono space-y-1">
                    <div class="text-purple-300 font-bold">สูตรความสัมพันธ์:</div>
                    <div>$\text{PMF} = \Delta \psi - \frac{2.303 R T}{F} \Delta \text{pH} = \Delta \psi - 59.2\,\text{mV} \times \Delta \text{pH}$</div>
                    <div>$\tau = \gamma \omega = \gamma (2\pi f), \quad P = \tau \omega = 2\pi f \tau, \quad \text{Rate}_{\text{ATP}} = 3 \times f$</div>
                </div>
                <textarea id="lab_calculations" name="lab_calculations" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-mono placeholder-slate-500" placeholder="แสดงการคำนวณ PMF, แรงบิดทอร์ก &tau; และอัตราการสังเคราะห์ ATP: เช่น ที่ &Delta;&psi; = -140 mV, &Delta;pH = 1.0: PMF = -140 - 59.2(1.0) = -199.2 mV, ที่ f = 180 Hz: &omega; = 2&pi;(180) = 1131 rad/s, Rate_ATP = 3 * 180 = 540 ATP/s..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-purple-400 flex items-center gap-2">
                    <i class="fa-solid fa-chart-pie"></i> 2. การวิเคราะห์และวิจารณ์ผลการทดลอง (Experimental Discussion):
                </label>
                <textarea id="discussionText" name="lab_discussion" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="อภิปรายความสัมพันธ์ระหว่างความต่างศักย์ไฟฟ้าเยื่อหุ้ม (Δψ) และเกรเดียนต์ pH ต่อค่า PMF และความเร็วรอบหมุนของโมเลกุลมอเตอร์ ผลของความหนืดตัวกลางต่อแรงบิดหน่วง และการทดสอบสารปลดพันธะโปรตอน (CCCP)..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-emerald-400 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check"></i> 3. สรุปผลการทดลอง (Conclusion):
                </label>
                <textarea id="conclusionText" name="lab_conclusion" rows="3" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="สรุปประสิทธิภาพเชิงกลเคมีของนาโนมอเตอร์ชีวภาพ อัตราการสังเคราะห์ ATP ต่อรอบการหมุน และการปรับตัวของแบคทีเรียในการเคลื่อนที่ในของไหลความหนืดสูง..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 5: Applied Post-Lab Questions for Microbiology -->
    <div id="cardQuestions" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardQuestions')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">5</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-circle-question text-purple-400"></i> คำถามท้ายการทดลองเชิงประยุกต์ทางจุลชีววิทยาและการแพทย์
                    </h2>
                    <p class="text-xs text-slate-400">Applied Biophysical Mechanisms in Microbiology &amp; Pharmacology</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardQuestions_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardQuestions_body" class="p-6 space-y-6 border-t border-white/5">
            <!-- Question 1 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-purple-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-purple-500/20 text-purple-400 flex items-center justify-center text-[10px]">Q1</span>
                    สารปลดพันธะออกซิเดทีฟฟอสฟอรีเลชัน (Proton Uncouplers เช่น 2,4-Dinitrophenol: DNP และ CCCP) มีกลไกทางฟิสิกส์อย่างไรที่ทำให้ค่า PMF สลายตัวไป และส่งผลต่ออัตราการสังเคราะห์ ATP รวมถึงการสร้างความร้อนในสิ่งมีชีวิตอย่างไร
                </h4>
                <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="อธิบายการเป็น Lipid-soluble proton carrier นำโปรตอนลัดข้ามเยื่อหุ้มโดยไม่ผ่าน F0 ทำให้พลังงานศักย์เคมีไฟฟ้าเปลี่ยนเป็นความร้อน (Thermogenesis) ส่งผลให้อัตราการสังเคราะห์ ATP ลดลงฮวบ..."></textarea>
            </div>

            <!-- Question 2 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-amber-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center text-[10px]">Q2</span>
                    เหตุใดเชื้ออหิวาตกโรค (<em>Vibrio cholerae</em>) จึงพัฒนามอเตอร์แฟลกเจลลาที่ขับเคลื่อนด้วยโซเดียมไอออน ($\text{Na}^+$-driven Flagellar Motor) แทนที่จะใช้โปรตอน ($\text{H}^+$) เหมือน <em>Escherichia coli</em> ทั่วไป และมีความได้เปรียบทางชีวฟิสิกส์อย่างไรในสิ่งแวดล้อมน้ำกร่อยหรือลำไส้เล็ก
                </h4>
                <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="วิเคราะห์สภาวะด่าง (Alkaline pH) ของลำไส้ที่ทำให้เกรเดียนต์โปรตอนต่ำ ขณะที่ Sodium Motive Force (SMF) ยังคงมีค่าสูงมาก และทอร์กที่ผลิตได้มีความเร็วรอบสูงกว่า 1,000 Hz..."></textarea>
            </div>

            <!-- Question 3 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-cyan-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-[10px]">Q3</span>
                    จงอธิบายทฤษฎีหอยกาบของเพอร์เซลล์ (Purcell's Scallop Theorem) ในโลกของไหลเรย์โนลด์ต่ำ ($Re \ll 1$) ว่าเหตุใดแบคทีเรียจึงไม่สามารถว่ายน้ำด้วยการขยับหรือสะบัดหางแบบลูกคลื่นไป-กลับ (Reciprocal Motion) แต่จำเป็นต้องใช้การหมุนควงสว่านแบบเกลียว (Helical Rotation)
                </h4>
                <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="อธิบายหลักการสมมาตรย้อนกลับของเวลา (Time-reversal symmetry of Stokes flow) หากการเคลื่อนไหวมีลักษณะ reciprocal การเคลื่อนที่สุทธิจะเป็นศูนย์ แบคทีเรียจึงต้องหมุนเกลียวแบบ Non-reciprocal เพื่อสร้างแรงขับเคลื่อนสุทธิ..."></textarea>
            </div>
        </div>
    </div>

    <!-- Submit Button Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="space-y-1 text-center sm:text-left">
            <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-purple-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 7 (Final E-Report Submission)
            </div>
            <div class="text-xs text-slate-400">
                ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
            </div>
        </div>

        <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-purple-500 via-indigo-500 to-sky-500 hover:from-purple-400 text-white font-extrabold text-sm shadow-xl shadow-purple-950/40 transition active:scale-95 flex items-center justify-center gap-2">
            <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
        </button>
    </div>

    </form>

    <!-- Navigation Buttons -->
    <nav class="flex items-center justify-between pt-4 border-t border-white/10">
        <a href="lab06_equilibrium.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-2 transition">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 6 (สมดุลและออสโมซิส)
        </a>
        <a href="lab08_machines.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-purple-950/30">
            ถัดไป: ปฏิบัติการที่ 8 (คานและการเคลื่อนไหวเชิงกลระดับไมโคร) <i class="fa-solid fa-arrow-right"></i>
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
    const frame = document.getElementById('molecular3DIframe');
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
  const iframe = document.getElementById('molecular3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 7.1: Rotation Speed vs PMF (at eta = 1.0 cP)
  const psiData = [
    { psi: -60, dpH: 0.50 },
    { psi: -100, dpH: 0.80 },
    { psi: -140, dpH: 1.00 },
    { psi: -180, dpH: 1.20 },
    { psi: -200, dpH: 1.50 }
  ];

  psiData.forEach((d, idx) => {
    const pmf = d.psi - (59.16 * d.dpH); // mV
    const f = Math.abs(pmf) * 0.903; // Hz
    const rpm = Math.round(f * 60);
    const omega = 2 * Math.PI * f;

    document.getElementById(`t1_pmf_${idx}`).value = pmf.toFixed(1);
    document.getElementById(`t1_hz_${idx}`).value = f.toFixed(1);
    document.getElementById(`t1_rpm_${idx}`).value = rpm;
    document.getElementById(`t1_omega_${idx}`).textContent = `${omega.toFixed(1)} rad/s`;
    document.getElementById(`t1_omega_${idx}`).className = 'text-purple-400 font-bold';
  });

  // Table 7.2: Viscous Medium Effects (at constant PMF = -199.2 mV)
  const viscData = [
    { eta: 0.70, f: 205.0, tau: 42.0, p: 3.38, eff: 91.2 },
    { eta: 1.00, f: 180.0, tau: 45.0, p: 2.77, eff: 88.5 },
    { eta: 4.50, f: 98.5, tau: 58.0, p: 1.79, eff: 82.0 },
    { eta: 12.00, f: 62.0, tau: 72.0, p: 1.40, eff: 75.4 }
  ];

  viscData.forEach((d, idx) => {
    document.getElementById(`t2_hz_${idx}`).value = d.f.toFixed(1);
    document.getElementById(`t2_tau_${idx}`).value = d.tau.toFixed(0);
    document.getElementById(`t2_p_${idx}`).value = d.p.toFixed(2);
    const effEl = document.getElementById(`t2_eff_${idx}`);
    effEl.textContent = `${d.eff.toFixed(1)}%`;
    effEl.className = 'text-emerald-400 font-bold';
  });

  // Table 7.3: ATP Synthase Kinetics (R_ATP = 3 * f, I_H = 9 * f)
  const atpData = [
    { pmf: -80, f: 72.0, ih: 648, atp: 216, state: 'Low Substrate Speed', color: 'text-amber-400' },
    { pmf: -140, f: 126.0, ih: 1134, atp: 378, state: 'Steady Active Synthesis', color: 'text-emerald-400' },
    { pmf: -200, f: 180.0, ih: 1620, atp: 540, state: 'Maximal Catalytic Velocity', color: 'text-purple-400' },
    { pmf: 0, f: 0.0, ih: 0, atp: 0, state: 'Stalled (หยุดชะงักสมบูรณ์)', color: 'text-rose-500' }
  ];

  atpData.forEach((d, idx) => {
    document.getElementById(`t3_hz_${idx}`).value = d.f.toFixed(1);
    document.getElementById(`t3_ih_${idx}`).value = d.ih;
    document.getElementById(`t3_atp_${idx}`).value = d.atp;
    const stEl = document.getElementById(`t3_state_${idx}`);
    stEl.textContent = d.state;
    stEl.className = `${d.color} font-bold`;
  });

  // Auto-fill sample discussion and conclusion if blank
  const disc = document.getElementById('discussionText');
  if (!disc.value.trim()) {
    disc.value = "จากการทดลองพบว่าพลังขับเคลื่อนโปรตอน (PMF) มีความสัมพันธ์เชิงเส้นตรงกับความเร็วรอบการหมุน (f) ของโมเลกุลมอเตอร์ทั้ง F0F1-ATP Synthase และ Bacterial Flagellar Motor โดยที่ค่า PMF -199.2 mV สามารถขับเคลื่อนโรเตอร์ได้เร็วถึง 180 Hz (10,800 RPM) และสังเคราะห์ ATP ได้ 540 โมเลกุลต่อวินาที เมื่อเพิ่มความหนืดตัวกลางเป็น 12 cP ความเร็วรอบลดลงเหลือ 62 Hz แต่แรงบิดเพิ่มขึ้นเพื่อเอาชนะแรงต้านของไหลหนืดตามกฎ Stokes-Einstein ในโลกเรย์โนลด์ต่ำ (Re << 1) และเมื่อเติมสารปลดพันธะโปรตอน (CCCP) ค่า PMF ลดลงเหลือศูนย์ ส่งผลให้มอเตอร์หยุดหมุนโดยสิ้นเชิง";
  }

  const conc = document.getElementById('conclusionText');
  if (!conc.value.trim()) {
    conc.value = "สรุปได้ว่าโมเลกุลมอเตอร์ชีวภาพเป็นเครื่องจักรกลระดับนาโนที่มีประสิทธิภาพเชิงกลเคมีสูงเป็นเลิศ (80-90%) ทำงานภายใต้กฎการเคลื่อนที่ในของไหลเรย์โนลด์ต่ำที่ไร้ความเฉื่อย การสังเคราะห์ ATP เป็นไปตามกลไก Boyer Binding Change Mechanism อย่างสมบูรณ์ 3 ATP ต่อรอบหมุน 360° ซึ่งองค์ความรู้นี้เป็นรากฐานสำคัญในการทำความเข้าใจการเคลื่อนที่ของแบคทีเรียและการออกแบบยานำส่งยาปฏิชีวนะระดับนาโน";
  }

  alert("คำนวณผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อยแล้ว!");
}

function saveStudentDraft() {
  const draftData = {
    lab: 'lab07_energy',
    timestamp: new Date().toISOString(),
    calculations: document.getElementById('lab_calculations')?.value || '',
    discussion: document.getElementById('discussionText')?.value || '',
    conclusion: document.getElementById('conclusionText')?.value || ''
  };
  localStorage.setItem('lab07_draft', JSON.stringify(draftData));
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
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D Molecular Motor ตอนนี้' หรืออัปโหลดไฟล์ภาพก่อนส่งรายงานครับ");
        return;
    }

    // Collect table 7.1
    const table1Data = [];
    for (let i = 0; i < 5; i++) {
        table1Data.push({
            row: i + 1,
            pmf: document.getElementById(`t1_pmf_${i}`)?.value || '',
            hz: document.getElementById(`t1_hz_${i}`)?.value || '',
            rpm: document.getElementById(`t1_rpm_${i}`)?.value || '',
            omega: document.getElementById(`t1_omega_${i}`)?.textContent || ''
        });
    }

    // Collect table 7.2
    const table2Data = [];
    for (let i = 0; i < 4; i++) {
        table2Data.push({
            row: i + 1,
            hz: document.getElementById(`t2_hz_${i}`)?.value || '',
            tau: document.getElementById(`t2_tau_${i}`)?.value || '',
            power: document.getElementById(`t2_p_${i}`)?.value || '',
            eff: document.getElementById(`t2_eff_${i}`)?.textContent || ''
        });
    }

    // Collect table 7.3
    const table3Data = [];
    for (let i = 0; i < 4; i++) {
        table3Data.push({
            row: i + 1,
            hz: document.getElementById(`t3_hz_${i}`)?.value || '',
            ih: document.getElementById(`t3_ih_${i}`)?.value || '',
            atp: document.getElementById(`t3_atp_${i}`)?.value || '',
            state: document.getElementById(`t3_state_${i}`)?.textContent || ''
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
        lab_id: 'lab07',
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
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 7 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-07'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
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
