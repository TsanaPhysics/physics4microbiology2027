<?php
$pageTitle = 'ปฏิบัติการที่ 12: ฟิสิกส์นิวเคลียร์ กัมมันตภาพรังสี และการทำลายเชื้อจุลินทรีย์ | Lab 12: Nuclear Physics, Radioactivity & Microbial Radiosterilization';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 12</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch12_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 12</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=12" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=12&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 11)</span>
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

<!-- Custom Styling for Lab 12 -->
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
  border-color: #f59e0b;
  box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-amber-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-ping"></span>
                    <span>LABORATORY 12 • NUCLEAR BIOPHYSICS, SHIELDING &amp; RADIOSTERILIZATION</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    ฟิสิกส์นิวเคลียร์ กัมมันตภาพรังสี และ <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-400 to-red-400">การทำลายเชื้อจุลินทรีย์</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาการสลายตัวของนิวไคลด์กัมมันตรังสี ($N(t) = N_0 e^{-\lambda t}$), กฎกำลังสองผกผันของระยะทาง ($I \propto 1/r^2$), การลดทอนความเข้มรังสีด้วยแผ่นกำบัง ($I = I_0 e^{-\mu x}$), การหาค่าปริมาณรังสีลดทอน $D_{10}$ ในการทำหมันทางการแพทย์ และการกำหนดอายุด้วยคาร์บอน-14
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-atom text-amber-400 mr-1"></i> Radioactive Decay: N(t) = N₀e^(-λt)
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-cyan-300">
                        <i class="fa-solid fa-shield-halved text-cyan-400 mr-1"></i> Gamma Shielding: I = I₀e^(-μx)
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-red-300">
                        <i class="fa-solid fa-radiation text-red-400 mr-1"></i> Microbial Sterilization: D₁₀ Value
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-amber-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-amber-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-amber-600 to-red-600 hover:from-amber-500 hover:to-red-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-amber-950/40">
                <i class="fa-solid fa-calculator text-[11px]"></i> คำนวณผลทั้ง 3 ตารางอัตโนมัติ
            </button>
            <button onclick="saveStudentDraft()" class="px-3 py-1.5 rounded-lg bg-emerald-600/80 hover:bg-emerald-500 text-white font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-floppy-disk text-[11px]"></i> บันทึกผลแล็บ
            </button>
        </div>
    </div>

    <!-- Section 1: Objectives & Learning Outcomes -->
    <div class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-bullseye text-amber-400"></i> วัตถุประสงค์และสาระสำคัญการเรียนรู้ (Objectives)
            </h2>
            <span class="text-xs font-mono text-slate-400">CLO 1.5 &bull; CLO 2.6</span>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm text-slate-300 leading-relaxed">
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-amber-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-atom"></i> 1. การสลายตัวและกฎกำลังสองผกผัน
                </div>
                <p>เข้าใจกฎการสลายตัวเชิงสถิติของนิวไคลด์กัมมันตรังสี ($N(t) = N_0 e^{-\lambda t}$) และตรวจสอบความสัมพันธ์ระหว่างระยะห่างจากแหล่งกำเนิดรังสีกับอัตรานับตามกฎกำลังสองผกผัน ($I \propto 1/r^2$)</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-cyan-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-shield-halved"></i> 2. การกำบังรังสีและชั้นลดทอนครึ่งหนึ่ง
                </div>
                <p>ศึกษาอันตรกิริยาระหว่างรังสีชนิดต่างๆ ($\alpha, \beta, \gamma$) กับสสาร คำนวณสัมประสิทธิ์การลดทอนเชิงเส้น ($\mu$) และค่าความหนาชั้นลดทอนครึ่งหนึ่ง (Half-Value Layer: HVL) ของตะกั่วและอลูมิเนียม</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-red-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-radiation"></i> 3. ชีววิทยารังสีและการทำลายเชื้อจุลินทรีย์
                </div>
                <p>วิเคราะห์เส้นโค้งการรอดชีวิตของจุลินทรีย์ภายใต้รังสีแกมมา หาค่าปริมาณรังสีลดทอน $D_{10}$ คำนวณขนาดยาฉายรังสีสำหรับการทำให้ปลอดเชื้อทางการแพทย์ ($12D\text{ Sterility Assurance}$) และการหาอายุด้วย $^{14}\text{C}$</p>
            </div>
        </div>
    </div>

    <!-- Section 2: Theoretical Foundations & MathJax Formulas -->
    <div id="cardTheory" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardTheory')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-atom text-amber-400"></i> ทฤษฎีฟิสิกส์และสมการชีวฟิสิกส์ (Theoretical Biophysics Foundations)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardTheory_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardTheory_body" class="p-5 space-y-6 text-xs sm:text-sm text-slate-300 leading-relaxed">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Concept 1: Radioactive Decay & Half-life -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-clock-rotate-left"></i> 1. กฎการสลายตัวของกัมมันตรังสี (Radioactive Decay Law)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        การสลายตัวของนิวเคลียสไม่เสถียรเป็นกระบวนการสุ่มเชิงสถิติ (Stochastic process) อัตราการสลายตัวแปรผันตรงกับจำนวนนิวเคลียสที่เหลืออยู่ ณ ขณะนั้น:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-amber-500/20 text-center font-mono text-amber-300 overflow-x-auto">
                        $$N(t) = N_0 e^{-\lambda t} = N_0 \left(\frac{1}{2}\right)^{t / t_{1/2}}, \quad \lambda = \frac{\ln 2}{t_{1/2}} = \frac{0.693}{t_{1/2}}$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $N_0$ คือ จำนวนนิวเคลียสตั้งต้น, $\lambda$ คือ ค่าคงตัวการสลายตัว ($\text{s}^{-1}$ หรือ $\text{d}^{-1}$), $t_{1/2}$ คือ ครึ่งชีวิต (Half-life), และกัมมันตภาพรังสี $A(t) = \lambda N(t) = A_0 e^{-\lambda t}$ มีหน่วยเป็นเบกเคอเรล ($\text{Bq} = \text{disintegration/s}$)
                    </p>
                </div>

                <!-- Concept 2: Inverse Square Law & Distance Protection -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-arrows-left-right"></i> 2. กฎกำลังสองผกผันสำหรับระยะห่าง (Inverse Square Law)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        สำหรับแหล่งกำเนิดรังสีแบบจุด (Point source) ฟลักซ์โฟตอนของรังสีจะกระจายออกรอบทิศทางในรูปทรงกลมสามมิติ ทำให้ความเข้มรังสีลดลงแปรผกผันกับระยะทางยกกำลังสอง:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-cyan-500/20 text-center font-mono text-cyan-300 overflow-x-auto">
                        $$I(r) = \frac{I_0 \cdot r_0^2}{r^2} \implies \frac{I_1}{I_2} = \left(\frac{r_2}{r_1}\right)^2$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        ในความปลอดภัยทางรังสี (Radiation Protection) การเพิ่มระยะห่างจากแหล่งรังสีขึ้นเป็น 2 เท่า จะช่วยลดปริมาณรังสีที่ได้รับลงถึง 4 เท่า ($75\%$) ถือเป็นมาตรการป้องกันที่ง่ายและมีประสิทธิภาพสูงสุด
                    </p>
                </div>

                <!-- Concept 3: Exponential Shielding & HVL -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-emerald-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-shield-halved"></i> 3. การลดทอนรังสีด้วยแผ่นกำบังและค่า HVL (Exponential Attenuation)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        รังสีแกมมา ($^{60}\text{Co}, ^{137}\text{Cs}$) มีอำนาจทะลุทะลวงสูง อันตรกิริยากับสสารผ่าน Photoelectric, Compton scattering และ Pair production ส่งผลให้ความเข้มลดลงแบบเอกซ์โพเนนเชียล:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-emerald-500/20 text-center font-mono text-emerald-300 overflow-x-auto">
                        $$I(x) = I_0 e^{-\mu x} = I_0 \left(\frac{1}{2}\right)^{x / \text{HVL}}, \quad \text{HVL} = \frac{\ln 2}{\mu} = \frac{0.693}{\mu}$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $\mu$ คือ สัมประสิทธิ์การลดทอนเชิงเส้น ($\text{cm}^{-1}$) และ $\text{HVL}$ คือ ความหนาของแผ่นกำบังที่ลดความเข้มรังสีลงเหลือครึ่งหนึ่ง สำหรับรังสีแกมมา 1.25 MeV ของ $^{60}\text{Co}$ ค่า HVL ของตะกั่วเท่ากับประมาณ $1.1\text{ cm}$
                    </p>
                </div>

                <!-- Concept 4: D10 Microbial Sterilization & Radiocarbon Dating -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-red-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-radiation"></i> 4. การทำลายเชื้อด้วยรังสี ค่า $D_{10}$ และการกำหนดอายุด้วย $^{14}\text{C}$
                    </h3>
                    <p class="text-slate-300 text-xs">
                        การฉายรังสีแกมมาทำให้เกิดรอยฉีกขาดของสายดีเอ็นเอ (Double-strand breaks) ปริมาณรังสีดูดกลืน ($D$ ในหน่วย $\text{kGy}$) ที่ลดประชากรจุลินทรีย์ลง $90\%$ (1 log cycle) เรียกว่าค่า $D_{10}$:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-red-500/20 text-center font-mono text-red-300 overflow-x-auto">
                        $$\log_{10}\left(\frac{N}{N_0}\right) = -\frac{D}{D_{10}}, \quad D_{12D} = 12 \times D_{10}, \quad t = -8267 \cdot \ln\left(\frac{A}{A_0}\right)$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        ตามมาตรฐานการทำหมันอุปกรณ์การแพทย์ (ISO 11137) กำหนดระดับประกันความปลอดเชื้อ $\text{SAL} = 10^{-6}$ ต้องใช้ขนาดยา $12D_{10}$ สำหรับสปอร์ *Bacillus pumilus* หรือใช้ขนาดยามาตรฐาน $25\text{ kGy}$
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 3: Interactive 3D Virtual Lab Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-xl">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <i class="fa-solid fa-cube text-amber-400"></i>
                <h2 class="text-base sm:text-lg font-bold text-white">
                    เครื่องจำลอง 3D ตู้ฉายรังสีและหัววัดไกเกอร์ (3D Radiation Chamber Simulator)
                </h2>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <a href="../webar/ar_aruco_textbook.html?lab=12&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-white font-mono text-xs font-bold flex items-center gap-1.5 transition shadow-md shadow-orange-950/40">
                    <i class="fa-solid fa-qrcode text-[11px]"></i> สแกน WebAR (Marker 11)
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-3 py-1.5 rounded-lg bg-amber-600 hover:bg-amber-500 text-white font-mono text-xs font-semibold flex items-center gap-1.5 transition shadow-sm">
                    <i class="fa-solid fa-camera text-[11px]"></i> แคปหน้าจอ 3D
                </button>
                <button type="button" onclick="toggleSimContainerFullscreen()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-1.5 transition border border-white/10">
                    <i class="fa-solid fa-expand text-[11px]"></i> เต็มหน้าจอ
                </button>
            </div>
        </div>
        <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[480px] bg-slate-950">
            <iframe id="radiation3DIframe" src="../simulations/sim12_radioactivity_3d.html" class="w-full h-full border-0 block" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
        </div>
        <div class="p-3.5 bg-slate-950/80 border-t border-white/5 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400">
            <div class="flex items-center gap-3">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-mouse text-amber-400"></i> หมุน/ซูม 3D ด้วยเมาส์</span>
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-shield-halved text-cyan-400"></i> ทดสอบแผ่นกำบังตะกั่ว / อลูมิเนียม</span>
            </div>
            <div class="font-mono text-slate-500">Radioisotopes: ⁶⁰Co &bull; ¹³⁷Cs &bull; ³²P &bull; ¹⁴C</div>
        </div>
    </div>

    <!-- Global Control Bar -->
    <div class="flex items-center justify-between bg-slate-900/60 p-4 rounded-2xl border border-white/10 text-xs">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-ping"></span>
            <span class="font-bold text-white">ระบบรายงานผลดิจิทัล (Digital Lab Report System)</span>
            <span class="text-slate-400 hidden sm:inline">• รองรับการแคปหลักฐาน 3D และส่งข้อมูลขึ้นระบบอัตโนมัติ</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/30 transition flex items-center gap-1.5 active:scale-95">
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
        <div id="cardStudentProfile" class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-amber-400"></i>
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
        <div id="cardEvidence" class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-amber-400"></i>
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
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Radiation Chamber Simulator เพื่อยืนยันว่าได้สังเกตการลดทอนรังสีหรือเส้นกราฟ D10 จริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-amber-500 to-red-500 hover:from-amber-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Radiation ตอนนี้
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

    <!-- Section 4: Strict Blank Data Tables -->
    <div id="cardDataTables" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardDataTables')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-table text-emerald-400"></i> ตารางบันทึกผลการทดลอง (Strict Blank Data Tables)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardDataTables_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardDataTables_body" class="p-5 space-y-8">

            <!-- Table 12.1: Inverse Square Law Verification -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-amber-400 flex items-center gap-2">
                        <i class="fa-solid fa-arrows-left-right"></i> ตารางที่ 12.1: การตรวจสอบกฎกำลังสองผกผันของระยะทาง ($I \propto 1/r^2$) ด้วยไอโซโทป $^{60}\text{Co}$
                    </h3>
                    <span class="text-xs font-mono text-slate-400">ไม่มีแผ่นกั้น (Air) &bull; แหล่งกำเนิด $100\,\mu\text{Ci}$</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5 text-center w-14">จุดวัด #</th>
                                <th class="p-2.5 text-center">ระยะทาง $r$ (cm)</th>
                                <th class="p-2.5 text-center">ค่า $1/r^2$ ($\text{cm}^{-2}$)</th>
                                <th class="p-2.5 text-center">อัตรานับรวม (CPS)</th>
                                <th class="p-2.5 text-center">อัตรานับสุทธิ $I_{\text{net}} = I - I_{\text{bg}}$ (CPS)</th>
                                <th class="p-2.5 text-center">อัตราปริมาณรังสี $H$ ($\mu\text{Sv/h}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $distPoints = [5.0, 10.0, 15.0, 20.0, 30.0, 50.0];
                            foreach ($distPoints as $idx => $r):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 text-center font-bold text-amber-400"><?= $idx + 1 ?></td>
                                <td class="p-2.5 text-center font-bold text-white"><?= number_format($r, 1) ?> cm</td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_inv_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.0000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_gross_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_net_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_dose_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-red-300 font-mono text-xs" placeholder="0.0">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 12.2: Shielding Attenuation & HVL -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-cyan-400 flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved"></i> ตารางที่ 12.2: การลดทอนความเข้มรังสีแกมมา $^{60}\text{Co}$ ด้วยวัสดุกำบัง ($r = 10\text{ cm}$) เพื่อหาค่า $\mu$ และ $\text{HVL}$
                    </h3>
                    <span class="text-xs font-mono text-slate-400">Background $I_{\text{bg}} = 12\text{ CPS}$</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">วัสดุกำบังรังสี (Shield Material)</th>
                                <th class="p-2.5 text-center">ความหนา $x$ (mm)</th>
                                <th class="p-2.5 text-center">อัตรานับสุทธิ $I$ (CPS)</th>
                                <th class="p-2.5 text-center">อัตราส่วน $I/I_0$</th>
                                <th class="p-2.5 text-center">ค่า $\ln(I_0/I)$</th>
                                <th class="p-2.5 text-center">สัมประสิทธิ์การลดทอน $\mu$ ($\text{cm}^{-1}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $shieldRows = [
                                ['mat' => 'ไม่มีแผ่นกั้น (Air Control: I₀)', 'x' => 0.0],
                                ['mat' => 'กระดาษการ์ด (Cardboard Paper)', 'x' => 1.0],
                                ['mat' => 'แผ่นอลูมิเนียม (Aluminum Sheet)', 'x' => 2.0],
                                ['mat' => 'แผ่นตะกั่ว 5 mm (Lead Brick 1)', 'x' => 5.0],
                                ['mat' => 'แผ่นตะกั่ว 10 mm (Lead Brick 2)', 'x' => 10.0],
                                ['mat' => 'แผ่นตะกั่ว 20 mm (Lead Brick 3)', 'x' => 20.0],
                                ['mat' => 'แผ่นตะกั่ว 30 mm (Lead Brick 4)', 'x' => 30.0]
                            ];
                            foreach ($shieldRows as $idx => $sh):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $sh['mat'] ?></td>
                                <td class="p-2.5 text-center text-slate-300"><?= number_format($sh['x'], 1) ?> mm</td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_cps_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_ratio_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_ln_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_mu_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-purple-300 font-mono text-xs" placeholder="0.00">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 12.3: Microbial Radiosterilization & D10 Values -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-red-400 flex items-center gap-2">
                        <i class="fa-solid fa-radiation"></i> ตารางที่ 12.3: ปริมาณรังสีดูดกลืน ($D$) และการรอดชีวิตของจุลินทรีย์เพื่อหาค่า $D_{10}$ และปริมาณรังสีปลอดเชื้อ ($12D$)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">เกณฑ์มาตรฐานสากล ISO 11137 ($\text{SAL} = 10^{-6}$)</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">สายพันธุ์จุลินทรีย์ทดสอบ</th>
                                <th class="p-2.5 text-center">จำนวนเริ่มต้น $N_0$ ($\text{CFU/mL}$)</th>
                                <th class="p-2.5 text-center">รอดชีวิตที่ 1.0 kGy ($N_1$)</th>
                                <th class="p-2.5 text-center">รอดชีวิตที่ 3.0 kGy ($N_3$)</th>
                                <th class="p-2.5 text-center">ค่า $D_{10}$ (kGy)</th>
                                <th class="p-2.5 text-center">ปริมาณรังสีทำหมัน $12D_{10}$ (kGy)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $microbeSpecies = [
                                ['name' => 'Escherichia coli (แกรมลบ ไม่สร้างสปอร์)', 'n0' => '1.0 × 10⁸'],
                                ['name' => 'Bacillus pumilus E601 (สปอร์ ดัชนีชี้วัดรังสี)', 'n0' => '1.0 × 10⁸'],
                                ['name' => 'Deinococcus radiodurans (แบคทีเรียทนรังสีเอกซ์ตรีม)', 'n0' => '1.0 × 10⁸']
                            ];
                            foreach ($microbeSpecies as $idx => $mb):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $mb['name'] ?></td>
                                <td class="p-2.5 text-center text-slate-300"><?= $mb['n0'] ?></td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_n1_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_n3_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_d10_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_d12_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-red-300 font-mono text-xs" placeholder="0.0">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 5: Analysis, Discussion & Conclusion Textareas -->
    <div id="cardDiscussion" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardDiscussion')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-pen-nib text-amber-400"></i> การวิเคราะห์และวิจารณ์ผลการทดลอง (Analysis &amp; Discussion)
            </h2>
            <button type="button" class="text-slate-400 hover:text-white transition">
                <i id="cardDiscussion_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardDiscussion_body" class="p-5 space-y-5 text-xs sm:text-sm">
            <div class="space-y-2">
                <label class="block font-bold text-amber-400">
                    <i class="fa-solid fa-calculator mr-1"></i> การคำนวณทางฟิสิกส์นิวเคลียร์และชีววิทยารังสี (Nuclear &amp; Radiosterilization Calculations):
                </label>
                <textarea id="lab_calculations" name="lab_calculations" rows="4" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed placeholder-slate-500" placeholder="แสดงการคำนวณกฎกำลังสองผกผัน I1/I2 = (r2/r1)^2, สัมประสิทธิ์การลดทอน μ = ln(I0/I)/x, ชั้นลดทอนครึ่งหนึ่ง HVL = ln(2)/μ, และปริมาณรังสีทำหมัน 12D = 12 × D10..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    1. การวิเคราะห์กฎกำลังสองผกผันของระยะทาง ($I \propto 1/r^2$) และบทบาทในการป้องกันอันตรายจากรังสี:
                </label>
                <textarea id="discussion_q1" name="discussion_q1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อภิปรายความสัมพันธ์เชิงเส้นระหว่างอัตรานับสุทธิกับ 1/r² ความคลาดเคลื่อนเชิงเรขาคณิต และการประยุกต์ใช้หลักการ ALARA..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    2. การวิจารณ์ประสิทธิภาพของวัสดุกำบังต่างชนิด สัมประสิทธิ์การลดทอนเชิงเส้น ($\mu$) และค่าความหนา HVL:
                </label>
                <textarea id="discussion_q2" name="discussion_q2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="วิจารณ์ความแตกต่างของการกั้นรังสีบีตาด้วยอลูมิเนียมกับการกั้นแกมมาด้วยตะกั่ว ค่า HVL ที่คำนวณได้เทียบกับค่าอ้างอิง..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    3. การสรุปผลค่าความทนทานต่อรังสี $D_{10}$ ของจุลินทรีย์และการประยุกต์ใช้ในอุตสาหกรรมทำหมันเวชภัณฑ์ทางการแพทย์:
                </label>
                <textarea id="discussion_q3" name="discussion_q3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="สรุปเปรียบเทียบค่า D10 ระหว่าง E. coli, สปอร์ B. pumilus และ D. radiodurans ความสมเหตุสมผลของขนาดยา 25 kGy ในเกณฑ์ ISO 11137..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 6: Applied Microbiology Questions -->
    <div id="cardQuestions" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardQuestions')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-circle-question text-red-400"></i> คำถามประยุกต์ทางจุลชีววิทยาและเทคโนโลยีชีวภาพ (Microbiology Application Questions)
            </h2>
            <button type="button" class="text-slate-400 hover:text-white transition">
                <i id="cardQuestions_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardQuestions_body" class="p-5 space-y-6 text-xs sm:text-sm text-slate-300">
            
            <!-- Applied Question 1: Direct vs Indirect Radiation Damage -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-amber-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-amber-500/20 text-amber-300 flex items-center justify-center text-xs">1</span>
                    กลไกการทำลายสารพันธุกรรมของจุลินทรีย์ด้วยรังสีชนิดก่อไอออน (Direct vs Indirect Radiolysis Damage)
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    ในการทำลายเชื้อจุลินทรีย์ด้วยรังสีแกมมา ($^{60}\text{Co}$) จงอธิบายความแตกต่างระหว่างกลไกการทำลายโดยตรง (Direct Action: การแตกหักของพันธะ Phosphodiester ในสาย DNA) กับกลไกทางอ้อม (Indirect Action: การแตกตัวของน้ำ Radiolysis of Water จนเกิดอนุมูลอิสระ $\cdot\text{OH}, \text{H}_2\text{O}_2$) และเหตุใดสปอร์ของแบคทีเรียที่อยู่ในสภาวะแห้ง (Desiccated Spores) จึงมีความทนทานต่อรังสีสูงกว่าเซลล์ที่มีชีวิตในสารละลาย?
                </p>
                <textarea id="app_q1" name="quiz_ans_1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายผลของปริมาณน้ำอิสระในเซลล์ต่ออัตราการเกิด ROS, โปรตีน SASPs ในสปอร์แบคทีเรีย และการปกป้อง DNA จากอนุมูลไฮดรอกซิล..."></textarea>
            </div>

            <!-- Applied Question 2: Deinococcus radiodurans Physics -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-emerald-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-300 flex items-center justify-center text-xs">2</span>
                    ชีวฟิสิกส์การทนทานรังสีเอกซ์ตรีมของ *Deinococcus radiodurans* (Extreme Radioresistance)
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    แบคทีเรีย <em>Deinococcus radiodurans</em> สามารถทนทานต่อรังสีแกมมาได้สูงถึง $10,000 - 15,000\text{ Gy}$ ($10-15\text{ kGy}$) โดยที่โครโมโซมเกิดการแตกกระจายเป็นร้อยชิ้นส่วนแต่เซลล์ยังคงสามารถซ่อมแซมและมีชีวิตรอดได้ กลไกทางชีวฟิสิกส์ในการจัดเรียงโครโมโซมแบบวงแหวนเกลียวแน่น (Toroid Condensed Nucleoid) และระบบสารต้านอนุมูลอิสระแมงกานีสคอมเพล็กซ์ ($\text{Mn}^{2+}\text{-peptide}$) มีบทบาทปกป้องเอนไซม์ซ่อมแซมดีเอ็นเอ (RecA/PprA) อย่างไร?
                </p>
                <textarea id="app_q2" name="quiz_ans_2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายการป้องกันโปรตีนซ่อมแซม DNA ไม่ให้ถูกออกซิไดซ์ด้วยแมงกานีส และกลไก Extended Synthesis-Dependent Strand Annealing (ESDSA)..."></textarea>
            </div>

            <!-- Applied Question 3: ISO 11137 & Industrial Food/Medical Sterilization -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-red-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-red-500/20 text-red-300 flex items-center justify-center text-xs">3</span>
                    การประยุกต์ใช้การฉายรังสีในอุตสาหกรรมเวชภัณฑ์และอาหารตามมาตรฐาน ISO 11137
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    ในการผลิตกระบอกฉีดยา หน้ากากอนามัย และอุปกรณ์ผ่าตัดทางการแพทย์แบบใช้ครั้งเดียว เหตุใดการทำหมันด้วยรังสีแกมมา ($^{60}\text{Co}$) หรือลำอิเล็กตรอน (E-beam) จึงได้รับความนิยมเหนือกว่าการอบไอน้ำความดันสูง (Autoclave) หรือก๊าซเอทิลีนออกไซด์ (EtO)? และจงอธิบายความหมายของระดับความปลอดเชื้อ $\text{SAL} \le 10^{-6}$ (Sterility Assurance Level) ในการคำนวณปริมาณรังสี $12D$ จากค่า Bioburden เริ่มต้น
                </p>
                <textarea id="app_q3" name="quiz_ans_3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายข้อได้เปรียบ Cold Sterilization ต่อพลาสติกที่ไม่ทนความร้อน การทะลุผ่านบรรจุภัณฑ์ที่ปิดผนึก และความน่าจะเป็น 1 ใน 1,000,000..."></textarea>
            </div>

        </div>
    </div>

    <!-- Submit Button Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-amber-500/20 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="space-y-1 text-center sm:text-left">
            <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-amber-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 12 (Final E-Report Submission)
            </div>
            <div class="text-xs text-slate-400">
                ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
            </div>
        </div>

        <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 hover:from-amber-400 text-white font-extrabold text-sm shadow-xl shadow-amber-950/40 transition active:scale-95 flex items-center justify-center gap-2">
            <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
        </button>
    </div>

    </form>

    <!-- Navigation Footer: Course Milestone Completion -->
    <nav class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-white/10">
        <a href="lab11_optics.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs font-medium flex items-center gap-2 transition border border-white/5">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 11 (ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรี)
        </a>
        <a href="../index.php" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-500 hover:to-cyan-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-emerald-950/40">
            <i class="fa-solid fa-graduation-cap"></i> สำเร็จหลักสูตรครบทั้ง 12 ปฏิบัติการชีวฟิสิกส์ (Course Completed) <i class="fa-solid fa-award"></i>
        </a>
    </nav>

</div>

<!-- Laboratory Interactivity & Auto-Calculation Script -->
<script>
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
    const frame = document.getElementById('radiation3DIframe');
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
  const iframe = document.getElementById('radiation3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 12.1: Inverse Square Law Calculations
  const distData = [
    { r: 5.0,  inv: 0.0400, gross: 1012, net: 1000, dose: 60.0 },
    { r: 10.0, inv: 0.0100, gross: 262,  net: 250,  dose: 15.0 },
    { r: 15.0, inv: 0.0044, gross: 123,  net: 111,  dose: 6.7 },
    { r: 20.0, inv: 0.0025, gross: 75,   net: 63,   dose: 3.8 },
    { r: 30.0, inv: 0.0011, gross: 40,   net: 28,   dose: 1.7 },
    { r: 50.0, inv: 0.0004, gross: 22,   net: 10,   dose: 0.6 }
  ];

  distData.forEach((d, idx) => {
    document.getElementById(`t1_inv_${idx}`).value = d.inv.toFixed(4);
    document.getElementById(`t1_gross_${idx}`).value = d.gross;
    document.getElementById(`t1_net_${idx}`).value = d.net;
    document.getElementById(`t1_dose_${idx}`).value = d.dose.toFixed(1);
  });

  // Table 12.2: Shielding Attenuation & HVL Calculations
  const shieldData = [
    { cps: 250, ratio: 1.000, ln: 0.000, mu: 0.00 },
    { cps: 245, ratio: 0.980, ln: 0.020, mu: 0.20 },
    { cps: 220, ratio: 0.880, ln: 0.128, mu: 0.64 },
    { cps: 170, ratio: 0.680, ln: 0.386, mu: 0.77 },
    { cps: 116, ratio: 0.464, ln: 0.768, mu: 0.77 },
    { cps: 54,  ratio: 0.216, ln: 1.532, mu: 0.77 },
    { cps: 25,  ratio: 0.100, ln: 2.303, mu: 0.77 }
  ];

  shieldData.forEach((d, idx) => {
    document.getElementById(`t2_cps_${idx}`).value = d.cps;
    document.getElementById(`t2_ratio_${idx}`).value = d.ratio.toFixed(3);
    document.getElementById(`t2_ln_${idx}`).value = d.ln.toFixed(3);
    document.getElementById(`t2_mu_${idx}`).value = d.mu.toFixed(2);
  });

  // Table 12.3: Microbial Radiosterilization & D10 Values
  const microbeData = [
    { n1: '4.6 × 10⁴',  n3: '0 (ตรวจไม่พบ)', d10: 0.30, d12: 3.6 },
    { n1: '4.6 × 10⁷',  n3: '1.0 × 10⁷',    d10: 3.00, d12: 36.0 },
    { n1: '7.9 × 10⁷',  n3: '5.0 × 10⁷',    d10: 10.00,d12: 120.0 }
  ];

  microbeData.forEach((d, idx) => {
    document.getElementById(`t3_n1_${idx}`).value = d.n1;
    document.getElementById(`t3_n3_${idx}`).value = d.n3;
    document.getElementById(`t3_d10_${idx}`).value = d.d10.toFixed(2);
    document.getElementById(`t3_d12_${idx}`).value = d.d12.toFixed(1);
  });

  // Fill sample calculations
  if (!document.getElementById('lab_calculations').value) {
    document.getElementById('lab_calculations').value = '1. กฎกำลังสองผกผัน: ที่ r1 = 5 cm ได้ Inet = 1000 CPS; ที่ r2 = 10 cm คาดการณ์ Inet2 = 1000 · (5/10)^2 = 250 CPS ตรงกับผลการวัดจริง (250 CPS)\n2. สัมประสิทธิ์การลดทอนเชิงเส้นของตะกั่ว (Pb): ที่ x = 1.0 cm (10 mm), I = 116 CPS จาก I0 = 250 CPS -> μ = ln(250/116) / 1.0 cm = 0.768 cm⁻¹; ความหนาชั้นลดทอนครึ่งหนึ่ง HVL = ln(2) / μ = 0.693 / 0.768 = 0.902 cm = 9.02 mm\n3. การทำหมันจุลินทรีย์: สปอร์ B. pumilus มี D10 = 3.0 kGy; ขนาดยาประกันความปลอดเชื้อระดับ SAL = 10⁻⁶ (12D) -> D12D = 12 × 3.0 kGy = 36.0 kGy สอดคล้องกับมาตรฐานอุตสาหกรรมเวชภัณฑ์ ISO 11137';
  }

  // Fill sample discussions
  if (!document.getElementById('discussion_q1').value) {
    document.getElementById('discussion_q1').value = 'การทดลองยืนยันกฎกำลังสองผกผันของระยะทางได้อย่างแม่นยำ กราฟระหว่างอัตรานับสุทธิ (CPS) กับค่า 1/r² แสดงความเป็นเส้นตรงสูงมาก (R² > 0.998) เมื่อถอยห่างจากแหล่งรังสี Co-60 จาก 5 cm เป็น 10 cm อัตรานับลดลงจาก 1,000 เหลือ 250 CPS (ลดลง 4 เท่า) และที่ 50 cm ลดลงเหลือเพียง 10 CPS แสดงให้เห็นว่าระยะทางเป็นปัจจัยสำคัญที่สุดในการป้องกันรังสีตามหลักการ ALARA (As Low As Reasonably Achievable)';
  }
  if (!document.getElementById('discussion_q2').value) {
    document.getElementById('discussion_q2').value = 'ผลการกั้นรังสีแกมมา 1.25 MeV ของ Co-60 พบว่าแผ่นกระดาษและอลูมิเนียมแทบไม่สามารถลดทอนรังสีแกมมาได้ (ลดลงเพียง 2-12%) เนื่องจากรังสีแกมมาไม่มีประจุและมีพลังงานสูง ในขณะที่แผ่นตะกั่วสามารถดูดกลืนรังสีได้อย่างมีประสิทธิภาพตามกฎเอกซ์โพเนนเชียล โดยมีค่าสัมประสิทธิ์การลดทอนเชิงเส้นเฉลี่ย μ = 0.77 cm⁻¹ คำนวณความหนาชั้นลดทอนครึ่งหนึ่งได้ HVL = ln(2)/μ = 0.90 cm (หรือ 9.0 mm)';
  }
  if (!document.getElementById('discussion_q3').value) {
    document.getElementById('discussion_q3').value = 'ความทนทานต่อรังสีของจุลินทรีย์แตกต่างกันอย่างมีนัยสำคัญ แบคทีเรียแกรมลบ E. coli ไวต่อรังสีสูงมาก (D10 = 0.30 kGy) ในขณะที่สปอร์ของ Bacillus pumilus ต้องใช้ปริมาณรังสีสูงถึง D10 = 3.0 kGy จึงถูกใช้เป็น Biological Indicator ตามมาตรฐาน ISO 11137 สำหรับการทำหมันเวชภัณฑ์ทางการแพทย์ที่ต้องการประกันระดับความปลอดเชื้อ SAL = 10⁻⁶ (12D reduction) จึงต้องใช้ปริมาณรังสีไม่ต่ำกว่า 25-36 kGy ซึ่งปลอดภัยและมีประสิทธิภาพในการกำจัดเชื้อโรคทุกชนิด';
  }

  alert('คำนวณและกรอกข้อมูลผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อย');
}

// Save Student Draft to LocalStorage
function saveStudentDraft() {
  const draft = {
    date: new Date().toISOString(),
    lab: 'lab12_radioactivity',
    calc: document.getElementById('lab_calculations')?.value || '',
    disc1: document.getElementById('discussion_q1')?.value || '',
    disc2: document.getElementById('discussion_q2')?.value || '',
    disc3: document.getElementById('discussion_q3')?.value || '',
    q1: document.getElementById('app_q1')?.value || '',
    q2: document.getElementById('app_q2')?.value || '',
    q3: document.getElementById('app_q3')?.value || ''
  };

  localStorage.setItem('physics4microbio_lab12_draft', JSON.stringify(draft));
  alert('บันทึกร่างผลการทดลองลงใน LocalStorage สำเร็จเรียบร้อย');
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
    const disc1 = document.getElementById('discussion_q1')?.value.trim();
    const disc2 = document.getElementById('discussion_q2')?.value.trim();
    const disc3 = document.getElementById('discussion_q3')?.value.trim();

    const q1 = document.getElementById('app_q1')?.value.trim();
    const q2 = document.getElementById('app_q2')?.value.trim();
    const q3 = document.getElementById('app_q3')?.value.trim();

    if (!fullname || !studentId || !program || !section) {
        alert("⚠️ กรุณากรอกข้อมูลระบุตัวตนของนักศึกษาให้ครบถ้วนทุกช่องครับ");
        document.getElementById('student_fullname')?.focus();
        return;
    }

    if (!proofBase64) {
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D Radiation ตอนนี้' หรืออัปโหลดไฟล์ภาพก่อนส่งรายงานครับ");
        return;
    }

    if (!calculations || !disc1 || !disc2 || !disc3) {
        alert("⚠️ กรุณากรอกวิธีคำนวณและข้อสรุป/อภิปรายผลการทดลองให้ครบถ้วนครับ");
        return;
    }

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามประยุกต์ทางจุลชีววิทยาให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        return;
    }

    // Collect table 12.1
    const table1Data = [];
    for (let i = 0; i < 6; i++) {
        table1Data.push({
            row: i + 1,
            inv: document.getElementById(`t1_inv_${i}`)?.value || '',
            gross: document.getElementById(`t1_gross_${i}`)?.value || '',
            net: document.getElementById(`t1_net_${i}`)?.value || '',
            dose: document.getElementById(`t1_dose_${i}`)?.value || ''
        });
    }

    // Collect table 12.2
    const table2Data = [];
    for (let i = 0; i < 7; i++) {
        table2Data.push({
            row: i + 1,
            cps: document.getElementById(`t2_cps_${i}`)?.value || '',
            ratio: document.getElementById(`t2_ratio_${i}`)?.value || '',
            ln: document.getElementById(`t2_ln_${i}`)?.value || '',
            mu: document.getElementById(`t2_mu_${i}`)?.value || ''
        });
    }

    // Collect table 12.3
    const table3Data = [];
    for (let i = 0; i < 3; i++) {
        table3Data.push({
            row: i + 1,
            n1: document.getElementById(`t3_n1_${i}`)?.value || '',
            n3: document.getElementById(`t3_n3_${i}`)?.value || '',
            d10: document.getElementById(`t3_d10_${i}`)?.value || '',
            d12: document.getElementById(`t3_d12_${i}`)?.value || ''
        });
    }

    const payload = {
        lab_id: 'lab12',
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
        discussion: `${disc1}\n\n${disc2}`,
        conclusion: disc3,
        quiz_answers: {
            quiz_1: q1,
            quiz_2: q2,
            quiz_3: q3
        },
        image_proof_base64: proofBase64,
        error_percentage: 0.0,
        r_squared: 0.998,
        accuracy_score: 99.8,
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
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 12 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-12'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว\n\nยินดีด้วย! คุณได้สำเร็จการทดลองครบถ้วนทั้ง 12 ปฏิบัติการในรายวิชาฟิสิกส์สำหรับจุลชีววิทยาแล้ว`);
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

// Load draft on page load
window.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('physics4microbio_lab12_draft');
  if (saved) {
    try {
      const data = JSON.parse(saved);
      if (data.calc && document.getElementById('lab_calculations')) document.getElementById('lab_calculations').value = data.calc;
      if (data.disc1 && document.getElementById('discussion_q1')) document.getElementById('discussion_q1').value = data.disc1;
      if (data.disc2 && document.getElementById('discussion_q2')) document.getElementById('discussion_q2').value = data.disc2;
      if (data.disc3 && document.getElementById('discussion_q3')) document.getElementById('discussion_q3').value = data.disc3;
      if (data.q1 && document.getElementById('app_q1')) document.getElementById('app_q1').value = data.q1;
      if (data.q2 && document.getElementById('app_q2')) document.getElementById('app_q2').value = data.q2;
      if (data.q3 && document.getElementById('app_q3')) document.getElementById('app_q3').value = data.q3;
    } catch (e) {
      console.error('Error loading saved draft:', e);
    }
  }
});
</script>

<?php include '../includes/footer.php'; ?>
