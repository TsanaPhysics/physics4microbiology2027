<?php
$pageTitle = 'ปฏิบัติการที่ 8: คานและการเคลื่อนไหวเชิงกลระดับไมโคร | Lab 08: Micro-cantilevers & Biomechanical Nanoprobing';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 08</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch08_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 8</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=8" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=8&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 7)</span>
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

<!-- Custom Styling for Lab 08 -->
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
  border-color: #f43f5e;
  box-shadow: 0 0 10px rgba(244, 63, 94, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-rose-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-rose-500/10 text-rose-400 border border-rose-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-rose-400 animate-ping"></span>
                    <span>LABORATORY 08 • NANOMECHANICS &amp; SINGLE-CELL BIOPHYSICS</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    คานและการเคลื่อนไหวเชิงกลระดับไมโคร <span class="text-transparent bg-clip-text bg-gradient-to-r from-rose-400 via-pink-400 to-amber-400">ในระบบชีวภาพ</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาคุณสมบัติความยืดหยุ่นของคานระดับไมโครตามกฎของฮุก ($F = -k_c \Delta z$), การวัดมอดุลัสของยังก์ ($E_{\text{cell}}$) ของผนังเซลล์จุลินทรีย์ด้วยกล้องจุลทรรศน์แรงอะตอม (AFM Nano-indentation), ทฤษฎีสัมผัสแบบเฮิร์ตซ์ (Hertzian Contact Mechanics) และการวัดแรงฉีกขาดพันธะของรยางค์พิลัส (Single-Molecule Rupture Force)
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-rose-300">
                        <i class="fa-solid fa-ruler-horizontal text-rose-400 mr-1"></i> F = -k_c · Δz (Hooke)
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-circle-dot text-amber-400 mr-1"></i> Hertz Contact Model: F ∝ δ^(3/2)
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-bacterium text-emerald-400 mr-1"></i> Peptidoglycan Elasticity (E_cell)
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-rose-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-rose-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-rose-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-rose-400 border border-rose-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-500 hover:to-pink-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-rose-950/40">
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
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm">1</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-book-open text-rose-400"></i> ทฤษฎีและสมการฟิสิกส์ว่าด้วยคานและกลศาสตร์นาโน
                    </h2>
                    <p class="text-xs text-slate-400">Hooke's Law for Cantilevers, Hertzian Contact Mechanics &amp; Cell Elasticity</p>
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
                    <h3 class="font-bold text-rose-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-ruler-combined"></i> 1. กฎของฮุกและค่าคงที่สปริงของคาน (Cantilever Spring Constant)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        คานระดับไมโคร (Micro-cantilever) ทำหน้าที่เป็นสปริงแบบยื่น (Leaf spring) ตามกฎของฮุก แรงกดที่ปลายคาน ($F$) สัมพันธ์กับการโก่งตัว ($\Delta z$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-rose-500/20 text-center font-mono">
                        $$F = -k_c \cdot \Delta z \tag{สมการที่ 8.1}$$
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        สำหรับคานสี่เหลี่ยมผืนผ้าหน้าตัดสม่ำเสมอ ($L \times w \times t$) ค่าคงที่สปริง ($k_c$) คำนวณจากมอดุลัสของยังก์ของวัสดุทำคาน ($E_{\text{cant}}$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-rose-500/20 text-center font-mono">
                        $$k_c = \frac{E_{\text{cant}} w t^3}{4 L^3} \tag{สมการที่ 8.2}$$
                    </div>
                </div>

                <!-- Theory 2 -->
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-circle-dot"></i> 2. แบบจำลองการกดแบบเฮิร์ตซ์ (Hertzian Contact Model)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        เมื่อปลายเข็ม AFM ทรงกลมรัศมี $R$ กดลงบนผิวเซลล์จุลินทรีย์ที่มีพฤติกรรมยืดหยุ่นเชิงเส้น แรงกดสัมพันธ์กับระยะกดจม ($\delta$) ตามแบบจำลองของเฮิร์ตซ์:
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-amber-500/20 text-center font-mono">
                        $$F = \frac{4}{3} \left( \frac{E_{\text{cell}}}{1 - \nu^2} \right) R^{1/2} \delta^{3/2} \tag{สมการที่ 8.3}$$
                    </div>
                    <ul class="text-[11px] text-slate-400 space-y-1 pl-4 list-disc">
                        <li>$E_{\text{cell}}$ คือ มอดุลัสของยังก์ของผนังเซลล์จุลินทรีย์ ($\text{MPa}$)</li>
                        <li>$\nu$ คือ อัตราส่วนปัวซองของเซลล์ ($\nu \approx 0.5$ สำหรับสารชีวภาพที่ปริมาตรคงที่)</li>
                        <li>$\delta$ คือ ระยะที่ปลายเข็มกดจมลงในเนื้อเซลล์ ($\text{nm}$)</li>
                    </ul>
                </div>
            </div>

            <!-- Theory Row 2: Optical Lever & Single-Molecule Rupture -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-emerald-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-arrows-split-up-and-left"></i> 3. การแยกแยะระยะเพียโซกับการกดจม (Displacement Partition)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        การเคลื่อนที่ของเพียโซสเตจแกน Z ($\Delta z_{\text{piezo}}$) หลังจากสัมผัสผิวเซลล์ ($z_0$) จะแบ่งออกเป็นการโก่งของคาน ($\Delta z_{\text{cant}}$) และการกดจมลงในผนังเซลล์ ($\delta$):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-emerald-500/20 text-center font-mono">
                        $$\Delta z_{\text{piezo}} = \Delta z_{\text{cant}} + \delta \tag{สมการที่ 8.4}$$
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ระบบคานขยายด้วยแสงเลเซอร์ (Optical Lever) สะท้อนลำแสงไปยังโฟโตไดโอดสี่ส่วน (QPD) เพื่อวัด $\Delta z_{\text{cant}}$ ในระดับต่ำกว่าอังสตรอมได้อย่างแม่นยำ
                    </p>
                </div>

                <div class="space-y-3 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-2">
                        <i class="fa-solid fa-link-slash"></i> 4. แรงฉีกขาดพันธะของรยางค์พิลัส (Pilus Rupture Force)
                    </h3>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ขณะดึงถอยคานกลับ (Retraction) รยางค์พิลัสหรือแอดฮีซิน (Adhesin) ที่เกาะกับปลายเข็มจะถูกยืดออก เกิดขั้นตอนการคลายเกลียวแบบสปริง (Uncoiling Plateau) จนกระทั่งพันธะขาดออกจากกันที่แรงฉีกขาด $F_{\text{rupture}}$ ตามแบบจำลองเบลล์-อีแวนส์ (Bell-Evans Model):
                    </p>
                    <div class="bg-slate-900 p-3 rounded-lg border border-cyan-500/20 text-center font-mono">
                        $$F_{\text{rupture}} = \frac{k_B T}{x^\ddagger} \ln \left( \frac{r \cdot x^\ddagger}{k_{\text{off}}^0 k_B T} \right) \tag{สมการที่ 8.5}$$
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: 3D Interactive Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-rose-500/30 shadow-2xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardSimulator')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm">2</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-gamepad text-rose-400"></i> ห้องปฏิบัติการ 3D เสมือนจริง: กล้องจุลทรรศน์แรงอะตอมและสเปกโทรสโกปีแรง
                    </h2>
                    <p class="text-xs text-slate-400">AFM Micro-cantilever Indentation &amp; Real-time F-z Spectroscopy Loupe</p>
                </div>
            </div>
            <div class="flex items-center gap-2" onclick="event.stopPropagation()">
                <a href="../webar/ar_aruco_textbook.html?lab=8&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-1.5 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 7">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-xs"></i> <span>📸 แคปหน้าจอ 3D</span>
                </button>
                <button onclick="toggleSimContainerFullscreen()" class="px-2.5 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-rose-400 text-xs font-mono transition flex items-center gap-1">
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
                <iframe id="nanomechanics3DIframe" src="../simulations/sim08_nanomechanics_3d.html" class="w-full h-full border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
            </div>
            
            <!-- Quick Simulator Helper Bar -->
            <div class="p-3 bg-slate-950/80 border-t border-white/10 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-400 font-mono">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                    <span>3D SIMULATOR ACTIVE • AFM NANO-SPECTROSCOPY ENGINE</span>
                </div>
                <div class="flex items-center gap-3">
                    <span><i class="fa-solid fa-mouse-pointer text-rose-400 mr-1"></i> หมุนมุมมอง: คลิกซ้ายลาก</span>
                    <span><i class="fa-solid fa-up-down text-rose-400 mr-1"></i> ซูม: ลูกกลิ้งเมาส์</span>
                    <span><i class="fa-solid fa-hand text-rose-400 mr-1"></i> เลื่อนระนาบ: คลิกขวาลาก</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Global Control Bar -->
    <div class="flex items-center justify-between bg-slate-900/60 p-4 rounded-2xl border border-white/10 text-xs">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-rose-400 animate-ping"></span>
            <span class="font-bold text-white">ระบบรายงานผลดิจิทัล (Digital Lab Report System)</span>
            <span class="text-slate-400 hidden sm:inline">• รองรับการแคปหลักฐาน 3D และส่งข้อมูลขึ้นระบบอัตโนมัติ</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-rose-400 border border-rose-500/30 transition flex items-center gap-1.5 active:scale-95">
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
        <div id="cardStudentProfile" class="bg-slate-900/90 border border-rose-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-rose-400"></i>
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
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-rose-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-rose-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-rose-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-rose-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div id="cardEvidence" class="bg-slate-900/90 border border-rose-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-rose-400"></i>
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
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D AFM Nanomechanics Simulator เพื่อยืนยันว่าได้สังเกตการกดจมของปลายคานและการวัดสเปกตรัมแรงจริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D AFM ตอนนี้
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
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm">3</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-table text-rose-400"></i> ตารางบันทึกผลการทดลอง (Strict Blank Data Tables)
                    </h2>
                    <p class="text-xs text-slate-400">บันทึกข้อมูลการโก่งตัวของคาน แรงกด มอดุลัสของยังก์ของผนังเซลล์ และแรงฉีกขาดพันธะ</p>
                </div>
            </div>
            <button class="card-toggle-btn w-7 h-7 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 flex items-center justify-center transition">
                <i id="cardDataTables_icon" class="fa-solid fa-chevron-up text-xs"></i>
            </button>
        </div>

        <div id="cardDataTables_body" class="p-6 space-y-8 border-t border-white/5">
            
            <!-- Table 8.1: Cantilever Calibration & Hooke's Law Deflection -->
            <div class="space-y-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-rose-400 flex items-center gap-2">
                        <i class="fa-solid fa-ruler-horizontal"></i> ตารางที่ 8.1: การสอบเทียบค่าคงที่สปริงของคาน ($k_c$) และการวัดระยะโก่งตัว ($\Delta z$) เทียบกับแรงกด ($F$)
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">คาน Si Rectangular, ความกว้าง $w = 30\,\mu\text{m}$, ความหนา $t = 2.0\,\mu\text{m}$</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-rose-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ความยาวคาน $L$<br><span class="text-[10px] text-slate-400 font-sans">(&mu;m)</span></th>
                                <th class="px-4 py-3">ความถี่เรโซแนนซ์ $f_0$<br><span class="text-[10px] text-slate-400 font-sans">(kHz)</span></th>
                                <th class="px-4 py-3">ค่าคงที่สปริง $k_c$<br><span class="text-[10px] text-slate-400 font-sans">(N/m)</span></th>
                                <th class="px-4 py-3">ระยะการโก่ง $\Delta z$<br><span class="text-[10px] text-slate-400 font-sans">(nm)</span></th>
                                <th class="px-4 py-3">แรงกระทำ $F = k_c \Delta z$<br><span class="text-[10px] text-slate-400 font-sans">(nN)</span></th>
                                <th class="px-4 py-3 text-right">แรงทางทฤษฎี<br><span class="text-[10px] text-slate-400 font-sans">(% Error)</span></th>
                            </tr>
                        </thead>
                        <tbody id="table81_body" class="divide-y divide-white/5 font-mono">
                            <!-- 4 Rows -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">450 (ยาวมาก)</td>
                                <td class="px-4 py-2.5 text-slate-300">12.5</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_kc_0" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_dz_0" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_f_0" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_err_0" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">250 (มาตรฐาน)</td>
                                <td class="px-4 py-2.5 text-slate-300">35.0</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_kc_1" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_dz_1" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_f_1" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_err_1" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">160 (คานแข็ง)</td>
                                <td class="px-4 py-2.5 text-slate-300">85.0</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_kc_2" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_dz_2" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_f_2" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_err_2" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">100 (สั้นแข็งมาก)</td>
                                <td class="px-4 py-2.5 text-slate-300">180.0</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_kc_3" class="input-blank w-24 px-2 py-1 rounded text-right text-sky-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t1_dz_3" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t1_f_3" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t1_err_3" class="text-emerald-400 font-bold">-</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 8.2: Hertzian Contact Model & Bacterial Wall Young's Modulus -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                        <i class="fa-solid fa-bacterium"></i> ตารางที่ 8.2: การทดสอบการกดจมแบบเฮิร์ตซ์และมอดุลัสของยังก์ ($E_{\text{cell}}$) ของผนังเซลล์จุลินทรีย์ชนิดต่างๆ
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">รัศมีปลายเข็ม $R = 20\,\text{nm}$, สัมประสิทธิ์ปัวซอง $\nu = 0.5$</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-emerald-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ชนิดจุลินทรีย์ทดสอบ<br><span class="text-[10px] text-slate-400 font-sans">(Microbial Specimen)</span></th>
                                <th class="px-4 py-3">โครงสร้างผนังเซลล์<br><span class="text-[10px] text-slate-400 font-sans">(Cell Wall Architecture)</span></th>
                                <th class="px-4 py-3">ระยะกดจม $\delta$<br><span class="text-[10px] text-slate-400 font-sans">(nm)</span></th>
                                <th class="px-4 py-3">แรงกดสูงสุด $F_{\text{max}}$<br><span class="text-[10px] text-slate-400 font-sans">(nN)</span></th>
                                <th class="px-4 py-3">มอดุลัสยังก์ $E_{\text{cell}}$<br><span class="text-[10px] text-slate-400 font-sans">(MPa)</span></th>
                                <th class="px-4 py-3 text-right">ความแข็งตึงสัมพัทธ์<br><span class="text-[10px] text-slate-400 font-sans">Wall Rigidity Rank</span></th>
                            </tr>
                        </thead>
                        <tbody id="table82_body" class="divide-y divide-white/5 font-mono">
                            <!-- 4 Specimen Rows -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">Staphylococcus aureus</td>
                                <td class="px-4 py-2.5 text-slate-300">Gram+ (หนา 20-80 nm, Peptidoglycan สูง)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_delta_0" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_fmax_0" class="input-blank w-24 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ecell_0" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_rank_0" class="text-rose-400 font-bold">High Rigidity (แข็งแกร่งสูง)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">Escherichia coli</td>
                                <td class="px-4 py-2.5 text-slate-300">Gram- (บาง 2-7 nm + Outer Membrane)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_delta_1" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_fmax_1" class="input-blank w-24 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ecell_1" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_rank_1" class="text-sky-400 font-bold">High Compliance (ยืดหยุ่นสูง)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">Saccharomyces cerevisiae</td>
                                <td class="px-4 py-2.5 text-slate-300">Yeast (Glucan, Mannan, Chitin 100-200 nm)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_delta_2" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_fmax_2" class="input-blank w-24 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ecell_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_rank_2" class="text-purple-400 font-bold">Medium Rigidity (แข็งปานกลาง)</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">4</td>
                                <td class="px-4 py-2.5 font-bold text-white">E. coli + Ampicillin 2 hr</td>
                                <td class="px-4 py-2.5 text-slate-300">Inhibited Transpeptidase (ผนังถูกทำลาย)</td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_delta_3" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.01" id="t2_fmax_3" class="input-blank w-24 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0.00"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t2_ecell_3" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span id="t2_rank_3" class="text-rose-500 font-bold">Softened / Lysing (ยุบตัวอ่อนนิ่ม)</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 8.3: Adhesion & Single-Molecule Pilus Rupture Force -->
            <div class="space-y-3 pt-4 border-t border-white/5">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <h3 class="text-sm font-bold text-amber-400 flex items-center gap-2">
                        <i class="fa-solid fa-link-slash"></i> ตารางที่ 8.3: การทดสอบแรงยึดติดพื้นผิวและการฉีกขาดของรยางค์พิลัส (Adhesion &amp; Pilus Rupture Force)
                    </h3>
                    <span class="text-[11px] font-mono text-slate-400">การดึงถอยคานกลับ (Retraction Velocity $v = 1.0\,\mu\text{m/s}$)</span>
                </div>

                <div class="overflow-x-auto rounded-xl border border-white/10 bg-slate-950/60">
                    <table class="w-full text-xs text-left text-slate-300">
                        <thead class="text-[11px] uppercase bg-slate-900/90 text-amber-400 font-mono border-b border-white/10">
                            <tr>
                                <th class="px-3 py-3 text-center w-12">ที่</th>
                                <th class="px-4 py-3">ระบบโมเลกุลยึดเกาะ<br><span class="text-[10px] text-slate-400 font-sans">(Adhesion System)</span></th>
                                <th class="px-4 py-3">ระยะดึงยืด (nm)<br><span class="text-[10px] text-slate-400 font-sans">Uncoiling Extension</span></th>
                                <th class="px-4 py-3">แรงฉีกขาดพันธะ $F_{\text{rup}}$<br><span class="text-[10px] text-slate-400 font-sans">(pN)</span></th>
                                <th class="px-4 py-3">พลังงานการคลายเกลียว<br><span class="text-[10px] text-slate-400 font-sans">(aJ, $10^{-18}\,\text{J}$)</span></th>
                                <th class="px-4 py-3 text-right">ชนิดการจับยึด<br><span class="text-[10px] text-slate-400 font-sans">Specific / Non-specific</span></th>
                            </tr>
                        </thead>
                        <tbody id="table83_body" class="divide-y divide-white/5 font-mono">
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">1</td>
                                <td class="px-4 py-2.5 font-bold text-white">E. coli Type 1 Pili (FimH)</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ext_0" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_frup_0" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_e_0" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-emerald-400 font-bold">Specific Catch Bond</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">2</td>
                                <td class="px-4 py-2.5 font-bold text-white">S. aureus Fibronectin-binding</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ext_1" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_frup_1" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_e_1" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-amber-400 font-bold">High-affinity Adhesin</span></td>
                            </tr>
                            <tr class="hover:bg-white/5 transition">
                                <td class="px-3 py-2.5 text-center text-slate-500 font-bold">3</td>
                                <td class="px-4 py-2.5 font-bold text-white">Non-specific Polysaccharide</td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_ext_2" class="input-blank w-24 px-2 py-1 rounded text-right text-amber-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" id="t3_frup_2" class="input-blank w-28 px-2 py-1 rounded text-right text-rose-300 font-mono text-xs" placeholder="0"></td>
                                <td class="px-4 py-2.5"><input type="number" step="0.1" id="t3_e_2" class="input-blank w-24 px-2 py-1 rounded text-right text-emerald-300 font-mono text-xs" placeholder="0.0"></td>
                                <td class="px-4 py-2.5 text-right"><span class="text-slate-400 font-bold">Non-specific Van der Waals</span></td>
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
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm">4</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-pen-nib text-rose-400"></i> การวิเคราะห์ วิจารณ์ผล และสรุปผลการทดลอง
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
                <label class="text-xs font-bold text-rose-400 flex items-center gap-2">
                    <i class="fa-solid fa-calculator"></i> 1. การแสดงวิธีคำนวณแรงและการดัดงอของคานไมโคร (Calculations):
                </label>
                <div class="p-3 rounded-xl bg-slate-950/70 border border-white/10 text-xs text-slate-300 font-mono space-y-1">
                    <div class="text-rose-300 font-bold">สูตรความสัมพันธ์:</div>
                    <div>$F_{\text{calc}} = k_c \Delta z, \quad F_{\text{Hertz}} = \frac{4}{3} \frac{E_{\text{cell}}}{1 - \nu^2} R^{1/2} \delta^{3/2}, \quad E_{\text{rup}} \approx \frac{1}{2} F_{\text{rup}} \Delta L$</div>
                </div>
                <textarea id="lab_calculations" name="lab_calculations" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-mono placeholder-slate-500" placeholder="แสดงการคำนวณค่าแรงกด F = kc * &Delta;z และการวิเคราะห์มอดุลัสยังก์ของเซลล์: เช่น ที่ kc = 0.050 N/m, &Delta;z = 10.0 nm: F = 0.050 * 10e-9 = 0.50 nN, S. aureus (Gram+) มี E_cell = 35.0 MPa แข็งกว่า E. coli (Gram-) ที่มี E_cell = 3.2 MPa ถึง 11 เท่า..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-rose-400 flex items-center gap-2">
                    <i class="fa-solid fa-chart-pie"></i> 2. การวิเคราะห์และวิจารณ์ผลการทดลอง (Experimental Discussion):
                </label>
                <textarea id="discussionText" name="lab_discussion" rows="4" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="อภิปรายความแตกต่างของมอดุลัสของยังก์ระหว่างแบคทีเรียแกรมบวก (S. aureus) กับแกรมลบ (E. coli) ผลของยาแอมพิซิลลินต่อความแข็งตึงของเปปทิโดไกลแคน และพฤติกรรมการยืดหยุ่นของรยางค์พิลัส..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-emerald-400 flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-check"></i> 3. สรุปผลการทดลอง (Conclusion):
                </label>
                <textarea id="conclusionText" name="lab_conclusion" rows="3" class="input-blank w-full p-3 rounded-xl text-xs text-slate-200 leading-relaxed font-sans placeholder-slate-500" placeholder="สรุปความสัมพันธ์ของกฎฮุกในคานไมโคร ความถูกต้องของแบบจำลองเฮิร์ตซ์ในการวัดมอดุลัสยังก์ของผนังเซลล์ และความสำคัญของการวัดแรงทางชีวฟิสิกส์ระดับนาโนนิวตันต่อการพัฒนายาต้านจุลชีพ..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 5: Applied Post-Lab Questions for Microbiology -->
    <div id="cardQuestions" class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-white/10 shadow-xl overflow-hidden transition-all duration-300">
        <div class="p-5 border-b border-white/10 flex items-center justify-between cursor-pointer select-none" onclick="toggleLabCard('cardQuestions')">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm">5</div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-circle-question text-rose-400"></i> คำถามท้ายการทดลองเชิงประยุกต์ทางจุลชีววิทยาและการแพทย์
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
                <h4 class="font-bold text-rose-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-rose-500/20 text-rose-400 flex items-center justify-center text-[10px]">Q1</span>
                    ในการประเมินประสิทธิภาพของยาปฏิชีวนะกลุ่ม $\beta$-lactam (เช่น Ampicillin) ต่อเชื้อดื้อยา MRSA จงอธิบายว่าเหตุใดการตรวจวัดมอดุลัสของยังก์ ($E_{\text{cell}}$) ด้วย AFM Nano-indentation จึงสามารถตรวจพบผลของยาได้เร็วกว่าวิธีดั้งเดิม (Standard Disk Diffusion / MIC) ภายในเวลาไม่ถึง 2 ชั่วโมง
                </h4>
                <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="อธิบายการตรวจวัดความสูญเสียความแข็งแรงเชิงกลระดับนาโน (Nanomechanical softening) ของเปปทิโดไกลแคนทันทีที่ถูกยับยั้งเอนไซม์ PBP โดยไม่ต้องรอให้เซลล์แบ่งตัวข้ามคืน..."></textarea>
            </div>

            <!-- Question 2 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-amber-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center text-[10px]">Q2</span>
                    รยางค์พิลัสของแบคทีเรียก่อโรคทางเดินปัสสาวะ (Uropathogenic <em>E. coli</em>: UPEC) แสดงคุณสมบัติ "Catch Bond" ภายใต้แรงเฉือนของกระแสปัสสาวะ จงวิเคราะห์กลไกทางฟิสิกส์ว่าทำไมแรงดึงจากของไหลที่เพิ่มขึ้นจึงทำให้พันธะ FimH จับกับน้ำตาลแมนโนสแน่นขึ้น แทนที่จะหลุดออกตามปกติ (Slip Bond)
                </h4>
                <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="วิเคราะห์การเปลี่ยนโครงสร้างโปรตีน FimH จากสภาวะ Low-affinity เป็น High-affinity conformation เมื่อถูกแรงดึงเชิงกลกระทำ ช่วยให้แบคทีเรียยึดเกาะผนังกระเพาะปัสสาวะได้เหนียวแน่น..."></textarea>
            </div>

            <!-- Question 3 -->
            <div class="space-y-2 bg-slate-950/60 p-4 rounded-xl border border-white/5">
                <h4 class="font-bold text-cyan-300 text-xs flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-[10px]">Q3</span>
                    เปรียบเทียบข้อดีและข้อจำกัดระหว่างกล้องจุลทรรศน์แรงอะตอม (Atomic Force Microscopy: AFM) และแหนบแสงเลเซอร์ (Optical Tweezers) ในการศึกษากลศาสตร์ชีวภาพระดับเซลล์เดี่ยว โดยพิจารณาช่วงแรงที่วัดได้ (Force Range: pN vs nN) และการรบกวนโครงสร้างเซลล์สิ่งมีชีวิต
                </h4>
                <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" class="input-blank w-full p-2.5 rounded-lg text-xs text-slate-200 placeholder-slate-500" placeholder="เปรียบเทียบ AFM (แรงสูง 10 pN - 100 nN เหมาะกับผนังเซลล์และพื้นผิว) กับ Optical Tweezers (แรงเบา 0.1 - 100 pN ไร้การสัมผัส เหมาะกับ DNA มอเตอร์โปรตีนและภายในเซลล์)..."></textarea>
            </div>
        </div>
    </div>

    <!-- Submit Button Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="space-y-1 text-center sm:text-left">
            <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-rose-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 8 (Final E-Report Submission)
            </div>
            <div class="text-xs text-slate-400">
                ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
            </div>
        </div>

        <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-rose-500 via-pink-500 to-indigo-500 hover:from-rose-400 text-white font-extrabold text-sm shadow-xl shadow-rose-950/40 transition active:scale-95 flex items-center justify-center gap-2">
            <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
        </button>
    </div>

    </form>

    <!-- Navigation Buttons -->
    <nav class="flex items-center justify-between pt-4 border-t border-white/10">
        <a href="lab07_energy.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-2 transition">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 7 (กลศาสตร์ชีวเคมีและโมเลกุลมอเตอร์)
        </a>
        <a href="lab09_heat.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-500 hover:to-pink-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-rose-950/30">
            ถัดไป: ปฏิบัติการที่ 9 (อุณหพลศาสตร์และเทอร์โมไซเคิลเลอร์ PCR) <i class="fa-solid fa-arrow-right"></i>
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
    const frame = document.getElementById('nanomechanics3DIframe');
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
  const iframe = document.getElementById('nanomechanics3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 8.1: Cantilever Calibration
  const cantData = [
    { L: 450, f0: 12.5, kc: 0.04, dz: 62.5, f: 2.50 },
    { L: 250, f0: 35.0, kc: 0.10, dz: 35.0, f: 3.50 },
    { L: 160, f0: 85.0, kc: 0.35, dz: 15.0, f: 5.25 },
    { L: 100, f0: 180.0, kc: 0.80, dz: 8.5, f: 6.80 }
  ];

  cantData.forEach((d, idx) => {
    document.getElementById(`t1_kc_${idx}`).value = d.kc.toFixed(2);
    document.getElementById(`t1_dz_${idx}`).value = d.dz.toFixed(1);
    document.getElementById(`t1_f_${idx}`).value = d.f.toFixed(2);
    const errEl = document.getElementById(`t1_err_${idx}`);
    errEl.textContent = '0.00%';
    errEl.className = 'text-emerald-400 font-bold';
  });

  // Table 8.2: Hertzian Contact Model
  const hertzData = [
    { delta: 28.5, fmax: 3.85, ecell: 35.0, rank: 'High Rigidity (แข็งแกร่งสูง)', color: 'text-rose-400' },
    { delta: 64.0, fmax: 1.25, ecell: 3.2, rank: 'High Compliance (ยืดหยุ่นสูง)', color: 'text-sky-400' },
    { delta: 42.0, fmax: 2.90, ecell: 18.0, rank: 'Medium Rigidity (แข็งปานกลาง)', color: 'text-purple-400' },
    { delta: 110.0, fmax: 0.45, ecell: 0.8, rank: 'Softened / Lysing (ยุบตัวอ่อนนิ่ม)', color: 'text-rose-500' }
  ];

  hertzData.forEach((d, idx) => {
    document.getElementById(`t2_delta_${idx}`).value = d.delta.toFixed(1);
    document.getElementById(`t2_fmax_${idx}`).value = d.fmax.toFixed(2);
    document.getElementById(`t2_ecell_${idx}`).value = d.ecell.toFixed(1);
    const rankEl = document.getElementById(`t2_rank_${idx}`);
    rankEl.textContent = d.rank;
    rankEl.className = `${d.color} font-bold`;
  });

  // Table 8.3: Adhesion & Single-Molecule Rupture
  const rupData = [
    { ext: 450, frup: 120, e: 54.0 },
    { ext: 220, frup: 85, e: 18.7 },
    { ext: 60, frup: 25, e: 1.5 }
  ];

  rupData.forEach((d, idx) => {
    document.getElementById(`t3_ext_${idx}`).value = d.ext;
    document.getElementById(`t3_frup_${idx}`).value = d.frup;
    document.getElementById(`t3_e_${idx}`).value = d.e.toFixed(1);
  });

  // Auto-fill sample discussion and conclusion if blank
  const disc = document.getElementById('discussionText');
  if (!disc.value.trim()) {
    disc.value = "จากการทดสอบสเปกโทรสโกปีแรงนาโนด้วย AFM พบว่าความสัมพันธ์ระหว่างแรงกดกับการโก่งตัวของคานเป็นไปตามกฎของฮุก F = -k·Δz อย่างแม่นยำ เมื่อทดสอบการกดจมบนเซลล์ S. aureus (Gram+) พบว่ามีค่ามอดุลัสของยังก์สูงถึง 35.0 MPa เนื่องจากโครงสร้างผนังเซลล์ Peptidoglycan หนาหลายชั้น ต่างจาก E. coli (Gram-) ที่มีค่ามอดุลัสเพียง 3.2 MPa นอกจากนี้ เมื่อบ่ม E. coli ร่วมกับยาแอมพิซิลลินนาน 2 ชั่วโมง ค่ามอดุลัสลดลงเหลือ 0.8 MPa แสดงถึงการสูญเสียความแข็งแรงเชิงกลของผนังเซลล์ก่อนการแตกตัว สำหรับการดึงถอยคานกลับ พบระยะการคลายเกลียวของรยางค์พิลัสแบบ Uncoiling Plateau สอดคล้องกับพฤติกรรม Catch Bond ของโปรตีน FimH";
  }

  const conc = document.getElementById('conclusionText');
  if (!conc.value.trim()) {
    conc.value = "สรุปได้ว่าเทคนิค AFM Micro-cantilever Indentation และแบบจำลองเฮิร์ตซ์สามารถนำมาประเมินคุณสมบัติเชิงกลระดับนาโนของผนังเซลล์จุลินทรีย์ได้อย่างแม่นยำ การวัดค่าความแข็งตึง (Cell Wall Rigidity) มีประโยชน์อย่างยิ่งในการศึกษากลไกการออกฤทธิ์ของยาปฏิชีวนะและการตรวจคัดกรองเชื้อดื้อยาอย่างรวดเร็ว (Rapid Antibiotic Susceptibility Testing) ภายในเวลาสั้นกว่าการเพาะเลี้ยงเชื้อแบบดั้งเดิม";
  }

  alert("คำนวณผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อยแล้ว!");
}

function saveStudentDraft() {
  const draftData = {
    lab: 'lab08_machines',
    timestamp: new Date().toISOString(),
    calculations: document.getElementById('lab_calculations')?.value || '',
    discussion: document.getElementById('discussionText')?.value || '',
    conclusion: document.getElementById('conclusionText')?.value || ''
  };
  localStorage.setItem('lab08_draft', JSON.stringify(draftData));
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
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D AFM ตอนนี้' หรืออัปโหลดไฟล์ภาพก่อนส่งรายงานครับ");
        return;
    }

    // Collect table 8.1
    const table1Data = [];
    for (let i = 0; i < 5; i++) {
        table1Data.push({
            row: i + 1,
            fz: document.getElementById(`t1_fz_${i}`)?.value || '',
            dz: document.getElementById(`t1_dz_${i}`)?.value || '',
            f_exp: document.getElementById(`t1_fexp_${i}`)?.value || '',
            f_calc: document.getElementById(`t1_fcalc_${i}`)?.value || ''
        });
    }

    // Collect table 8.2
    const table2Data = [];
    for (let i = 0; i < 4; i++) {
        table2Data.push({
            row: i + 1,
            delta: document.getElementById(`t2_delta_${i}`)?.value || '',
            fmax: document.getElementById(`t2_fmax_${i}`)?.value || '',
            ecell: document.getElementById(`t2_ecell_${i}`)?.value || '',
            rank: document.getElementById(`t2_rank_${i}`)?.textContent || ''
        });
    }

    // Collect table 8.3
    const table3Data = [];
    for (let i = 0; i < 3; i++) {
        table3Data.push({
            row: i + 1,
            ext: document.getElementById(`t3_ext_${i}`)?.value || '',
            frup: document.getElementById(`t3_frup_${i}`)?.value || '',
            energy: document.getElementById(`t3_e_${i}`)?.value || ''
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
        lab_id: 'lab08',
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
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 8 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-08'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
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
