<?php
$pageTitle = 'ปฏิบัติการที่ 10: ไฟฟ้า สนามแม่เหล็ก และเจลอิเล็กโทรโฟเรซิส | Lab 10: Electricity, Magnetism & Agarose Gel Electrophoresis';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 10</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch10_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 10</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=10" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=10&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 9)</span>
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

<!-- Custom Styling for Lab 10 -->
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
  border-color: #3b82f6;
  box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-blue-500/10 text-blue-400 border border-blue-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-400 animate-ping"></span>
                    <span>LABORATORY 10 • ELECTRODYNAMICS, SEPARATION &amp; MAGNETOBIOLOGY</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    ไฟฟ้า สนามแม่เหล็ก และ <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-cyan-400 to-emerald-400">เจลอิเล็กโทรโฟเรซิส</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาการเคลื่อนที่ของสารชีวโมเลกุลมีประจุในสนามไฟฟ้า ($\mu = \frac{v}{E}$), การสอบเทียบขนาดชิ้นส่วนดีเอ็นเอ ($\log_{10}\text{bp} = a - b R_f$), การเกิดความร้อนจูลในบัฟเฟอร์ ($P = I^2 R$) และทอร์กสนามแม่เหล็กต่อแบคทีเรียแมกนีโตแทกติก ($\vec{\tau} = \vec{m} \times \vec{B}$)
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-blue-300">
                        <i class="fa-solid fa-bolt text-blue-400 mr-1"></i> Electrophoretic Mobility: μ = v/E
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-cyan-300">
                        <i class="fa-solid fa-dna text-cyan-400 mr-1"></i> DNA Migration: log₁₀(bp) vs Rf
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-magnet text-emerald-400 mr-1"></i> Magnetotaxis Torque: τ = m × B
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-blue-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-blue-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-blue-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-blue-400 border border-blue-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-blue-950/40">
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
                <i class="fa-solid fa-bullseye text-blue-400"></i> วัตถุประสงค์และสาระสำคัญการเรียนรู้ (Objectives)
            </h2>
            <span class="text-xs font-mono text-slate-400">CLO 1.3 &bull; CLO 2.4</span>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm text-slate-300 leading-relaxed">
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-blue-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-bolt"></i> 1. พลศาสตร์ประจุและสภาพเคลื่อนตัว
                </div>
                <p>เข้าใจกฎของโอห์ม ($V = IR$) และกลไกการแยกอนุภาคชีวโมเลกุลมีประจุภายใต้ความต่างศักย์ไฟฟ้ากระแสตรง โดยศึกษาความสัมพันธ์ระหว่างแรงขับเคลื่อนทางไฟฟ้ากับแรงหนืดของสโตกส์ ($\mu = \frac{v}{E}$)</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-cyan-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-dna"></i> 2. การวิเคราะห์ขนาดดีเอ็นเอด้วยเมทริกซ์เจล
                </div>
                <p>สร้างเส้นโค้งมาตรฐาน ($R_f$ standard curve) จาก DNA ladder คำนวณขนาดโมเลกุลในพลาสมิดและยีน 16S rRNA พร้อมวิเคราะห์ผลของความเข้มข้นเจลอกาโรส (%T) ตามสมการเฟอร์กูสัน (Ferguson equation)</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-emerald-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-magnet"></i> 3. แมกนีโตชีววิทยาในแบคทีเรีย
                </div>
                <p>สังเกตการตอบสนองเชิงแม่เหล็ก (Magnetotaxis) ของ <em>Magnetospirillum gryphiswaldense</em> วิเคราะห์ทอร์กเหนี่ยวนำ ($\vec{\tau} = \vec{m} \times \vec{B}$) ต่อผลึกแมกนีโตโซม $\text{Fe}_3\text{O}_4$ ในงานเทคโนโลยีชีวภาพ</p>
            </div>
        </div>
    </div>

    <!-- Section 2: Theoretical Foundations & MathJax Formulas -->
    <div id="cardTheory" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardTheory')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-atom text-cyan-400"></i> ทฤษฎีฟิสิกส์และสมการชีวฟิสิกส์ (Theoretical Biophysics Foundations)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardTheory_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardTheory_body" class="p-5 space-y-6 text-xs sm:text-sm text-slate-300 leading-relaxed">
            
            <!-- Biophysical Concepts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Concept 1: Electrophoretic Mobility -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-blue-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-wave-square"></i> 1. สภาพเคลื่อนตัวของสารชีวโมเลกุลมีประจุ (Electrophoretic Mobility)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        ในสนามไฟฟ้ากระแสตรงสม่ำเสมอ $E$ อนุภาคชีวโมเลกุลที่มีประจุสุทธิ $q$ (เช่น ดีเอ็นเอที่มีประจุลบสม่ำเสมอจากหมู่ฟอสเฟต $-1$ ต่อหนึ่งนิวคลีโอไทด์) จะได้รับแรงไฟฟ้า $F_e = qE$ ขับเคลื่อนเข้าสู่ขั้วบวก (Anode) ขณะเดียวกันจะถูกต้านด้วยแรงหนืดของไหลของสโตกส์ $F_d = 6\pi \eta r_{\text{eff}} v$ ที่สภาวะสมดุลความเร็วคงที่ ($F_e = F_d$):
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-blue-500/20 text-center font-mono text-blue-300 overflow-x-auto">
                        $$\mu = \frac{v}{E} = \frac{q}{6\pi \eta r_{\text{eff}}}$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $\mu$ คือ สภาพเคลื่อนตัวทางไฟฟ้า ($\text{cm}^2/\text{V}\cdot\text{s}$), $v$ คือ ความเร็วในการเคลื่อนที่ ($\text{cm/s}$), $E = V/L$ คือ ความเข้มสนามไฟฟ้า ($\text{V/cm}$), $\eta$ คือ ความหนืดไดนามิกของบัฟเฟอร์ ($\text{Pa}\cdot\text{s}$) และ $r_{\text{eff}}$ คือ รัศมีไฮโดรไดนามิกยังผล
                    </p>
                </div>

                <!-- Concept 2: Ohm's Law & Buffer Joule Heating -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-temperature-arrow-up"></i> 2. กฎของโอห์มและการเกิดความร้อนจูล (Joule Heating)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        สารละลายบัฟเฟอร์ (TAE/TBE) มีไอออนอิสระทำหน้าที่นำไฟฟ้า เมื่อจ่ายแรงดัน $V$ กระแสไฟฟ้า $I$ จะไหลผ่านบัฟเฟอร์ตามกฎของโอห์ม $I = V/R_{\text{buffer}}$ การเคลื่อนที่ของไอออนทำให้เกิดพลังงานความร้อนสูญเสีย (Joule heating rate) ตามสมการ:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-amber-500/20 text-center font-mono text-amber-300 overflow-x-auto">
                        $$P_{\text{joule}} = I^2 R = \frac{V^2}{R_{\text{buffer}}} = V \cdot I$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        หากจ่ายแรงดันสูงเกินเกณฑ์ ($>150\text{ V}$) อุณหภูมิบัฟเฟอร์จะสูงขึ้น ส่งผลให้ความหนืด $\eta$ ลดลง เกิดปรากฏการณ์ขอบแบนด์โค้งย้อย (Gel Smiling Effect) และอาจทำให้เจลอกาโรสละลายพังทลาย
                    </p>
                </div>

                <!-- Concept 3: DNA Size vs Migration Distance & Ferguson Equation -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-dna"></i> 3. การคัดกรองโมเลกุลตามขนาดและสมการเฟอร์กูสัน (Sieving & Ferguson Plot)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        เนื่องจากอัตราส่วนประจุต่อมวลของดีเอ็นเอมีค่าคงที่ ($q/M \approx \text{const}$) การแยกขนาดจึงอาศัยร่างแหรูพรุน (Pore sieving) ของเจลอกาโรส ความสัมพันธ์ระหว่างขนาดดีเอ็นเอกับระยะทางการเคลื่อนที่สัมพัทธ์ ($R_f = d_{\text{band}} / d_{\text{dye}}$) เป็นไปตามฟังก์ชันกึ่งลอการิทึม:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-cyan-500/20 text-center font-mono text-cyan-300 overflow-x-auto">
                        $$\log_{10}(\text{bp}) = a - b \cdot R_f, \quad \log_{10} \mu = \log_{10} \mu_0 - K_R \cdot \%T$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $K_R$ คือ ค่าสัมประสิทธิ์การหน่วงเหนี่ยว (Retardation coefficient) ซึ่งแปรผันตรงกับขนาดโมเลกุล และ $\%T$ คือ ความเข้มข้นร้อยละของอกาโรส
                    </p>
                </div>

                <!-- Concept 4: Magnetic Torque on Magnetotactic Bacteria -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-emerald-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-compass"></i> 4. ทอร์กแม่เหล็กต่อแบคทีเรียแมกนีโตแทกติก (Magnetotaxis Torque)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        แบคทีเรีย <em>Magnetospirillum gryphiswaldense</em> สังเคราะห์ผลึกแม่เหล็กนาโน $\text{Fe}_3\text{O}_4$ เรียงตัวเป็นสายแมกนีโตโซม ทำให้เซลล์มีโมเมนต์ขั้วคู่แม่เหล็กถาวร $\vec{m}$ เมื่ออยู่ในสนามแม่เหล็กภายนอก $\vec{B}$ (สร้างจากขดลวดเฮล์มโฮลทซ์) จะเกิดทอร์กแม่เหล็กหมุนเซลล์:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-emerald-500/20 text-center font-mono text-emerald-300 overflow-x-auto">
                        $$\vec{\tau} = \vec{m} \times \vec{B}, \quad \tau = m B \sin\theta$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $\theta$ คือ มุมระหว่างแกนขั้วคู่แม่เหล็กของเซลล์กับแนวสนาม $\vec{B}$ ทอร์กนี้จะบังคับให้แบคทีเรียว่ายน้ำเป็นเส้นตรงมุ่งสู่ขั้วแม่เหล็กโลกอย่างแม่นยำ
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 3: Interactive 3D Virtual Lab Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-xl">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <i class="fa-solid fa-cube text-blue-400"></i>
                <h2 class="text-base sm:text-lg font-bold text-white">
                    เครื่องจำลอง 3D ตู้เจลอิเล็กโทรโฟเรซิสและขดลวดแม่เหล็ก (3D Interactive Simulator)
                </h2>
            </div>
            <div class="flex items-center gap-2">
                <a href="../webar/ar_aruco_textbook.html?lab=10&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-1.5 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 9">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-3 py-1.5 rounded-lg text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-1.5 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-xs"></i> <span>📸 แคปหน้าจอ 3D</span>
                </button>
                <button onclick="toggleSimContainerFullscreen()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-1.5 transition border border-white/10">
                    <i class="fa-solid fa-expand text-[11px]"></i> เต็มหน้าจอ
                </button>
            </div>
        </div>
        <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[480px] bg-slate-950">
            <iframe id="gelElectro3DIframe" src="../simulations/sim10_electrophoresis_3d.html" class="w-full h-full border-0 block" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
        </div>
        <div class="p-3.5 bg-slate-950/80 border-t border-white/5 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400">
            <div class="flex items-center gap-3">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-mouse text-blue-400"></i> หมุน/ซูม 3D ด้วยเมาส์</span>
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-sun text-purple-400"></i> เปิดรังสี UV 312nm เพื่อตรวจแบนด์ฟลูออเรสเซนต์</span>
            </div>
            <div class="font-mono text-slate-500">Dual Mode: Gel Electrophoresis Tank &bull; Helmholtz Magnetotaxis</div>
        </div>
    </div>

    <!-- Global Control Bar -->
    <div class="flex items-center justify-between bg-slate-900/60 p-4 rounded-2xl border border-white/10 text-xs">
        <div class="flex items-center gap-2">
            <span class="w-2.5 h-2.5 rounded-full bg-blue-400 animate-ping"></span>
            <span class="font-bold text-white">ระบบรายงานผลดิจิทัล (Digital Lab Report System)</span>
            <span class="text-slate-400 hidden sm:inline">• รองรับการแคปหลักฐาน 3D และส่งข้อมูลขึ้นระบบอัตโนมัติ</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-blue-400 border border-blue-500/30 transition flex items-center gap-1.5 active:scale-95">
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
        <div id="cardStudentProfile" class="bg-slate-900/90 border border-blue-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-blue-400"></i>
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
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-blue-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-blue-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-blue-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-blue-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div id="cardEvidence" class="bg-slate-900/90 border border-blue-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-blue-400"></i>
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
                    ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Electrophoresis & Magnetotaxis Simulator เพื่อยืนยันว่าได้สังเกตการเคลื่อนที่ของแบนด์ดีเอ็นเอจริง
                </p>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-5 space-y-3">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                            <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Electrophoresis ตอนนี้
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

            <!-- Table 10.1: DNA Ladder Standard Curve -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-blue-400 flex items-center gap-2">
                        <i class="fa-solid fa-dna"></i> ตารางที่ 10.1: การสอบเทียบมาตรฐานขนาดดีเอ็นเอด้วย 1 kb DNA Ladder (Gel 1.0%, 100 V, 45 min)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">Tracking Dye BPB Distance $d_{\text{dye}} = 92.0\text{ mm}$</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5 text-center w-12">Band #</th>
                                <th class="p-2.5">ขนาดมาตรฐาน (bp)</th>
                                <th class="p-2.5 text-center">ปริมาณมวล (ng)</th>
                                <th class="p-2.5 text-center">ระยะทางที่เคลื่อนที่ $d$ (mm)</th>
                                <th class="p-2.5 text-center">สภาพเคลื่อนตัวสัมพัทธ์ $R_f = d/d_{\text{dye}}$</th>
                                <th class="p-2.5 text-center">ค่า $\log_{10}(\text{bp})$</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $ladderItems = [
                                ['b' => 1, 'bp' => 10000, 'mass' => 40],
                                ['b' => 2, 'bp' => 8000,  'mass' => 40],
                                ['b' => 3, 'bp' => 6000,  'mass' => 40],
                                ['b' => 4, 'bp' => 5000,  'mass' => 85], // Reference
                                ['b' => 5, 'bp' => 4000,  'mass' => 40],
                                ['b' => 6, 'bp' => 3000,  'mass' => 40],
                                ['b' => 7, 'bp' => 2000,  'mass' => 40],
                                ['b' => 8, 'bp' => 1500,  'mass' => 80], // Reference
                                ['b' => 9, 'bp' => 1000,  'mass' => 45],
                                ['b' => 10,'bp' => 500,   'mass' => 40]
                            ];
                            foreach ($ladderItems as $idx => $item):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 text-center font-bold text-blue-400"><?= $item['b'] ?></td>
                                <td class="p-2.5 font-bold text-white"><?= number_format($item['bp']) ?> bp <?= ($item['mass'] >= 80) ? '<span class="text-[10px] text-amber-400 font-normal">(แถบอ้างอิงสว่าง)</span>' : '' ?></td>
                                <td class="p-2.5 text-center text-slate-300"><?= $item['mass'] ?></td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_dist_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-blue-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_rf_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_log_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.000">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 10.2: Effect of Agarose % and Electric Field on Mobility -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-cyan-400 flex items-center gap-2">
                        <i class="fa-solid fa-layer-group"></i> ตารางที่ 10.2: อิทธิพลของความเข้มข้นเจลอกาโรส (%T) และแรงดันไฟฟ้าต่อสภาพเคลื่อนตัว ($\mu$)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">บัฟเฟอร์ 1X TAE &bull; ชิ้นดีเอ็นเอขนาด 1,000 bp</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">ความเข้มข้นเจลอกาโรส (%T)</th>
                                <th class="p-2.5 text-center">แรงดันไฟฟ้า $V$ (V)</th>
                                <th class="p-2.5 text-center">สนามไฟฟ้า $E = V/L$ (V/cm)</th>
                                <th class="p-2.5 text-center">กระแส $I$ (mA)</th>
                                <th class="p-2.5 text-center">อุณหภูมิบัฟเฟอร์ $T$ (°C)</th>
                                <th class="p-2.5 text-center">ความเร็ว $v$ (mm/min)</th>
                                <th class="p-2.5 text-center">สภาพเคลื่อนตัว $\mu$ ($10^{-5}\,\text{cm}^2/\text{V}\cdot\text{s}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $agaroseConditions = [
                                ['conc' => '0.8%', 'volt' => 100],
                                ['conc' => '1.0%', 'volt' => 50],
                                ['conc' => '1.0%', 'volt' => 100],
                                ['conc' => '1.0%', 'volt' => 150],
                                ['conc' => '1.5%', 'volt' => 100],
                                ['conc' => '2.0%', 'volt' => 100]
                            ];
                            foreach ($agaroseConditions as $idx => $c):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $c['conc'] ?> Agarose</td>
                                <td class="p-2.5 text-center text-slate-300"><?= $c['volt'] ?> V</td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_efield_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-blue-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_curr_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_temp_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-red-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_vel_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_mu_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.00">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 10.3: Magnetotactic Bacteria Dynamics in Helmholtz Field -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                        <i class="fa-solid fa-magnet"></i> ตารางที่ 10.3: พลศาสตร์การวางตัวและการว่ายน้ำของแบคทีเรียแมกนีโตแทกติก (*Magnetospirillum gryphiswaldense*)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">โมเมนต์แม่เหล็กเซลล์ $m = 5.2 \times 10^{-16}\,\text{A}\cdot\text{m}^2$</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">ความเข้มสนามแม่เหล็ก $B$ (mT)</th>
                                <th class="p-2.5 text-center">กระแสขดลวด $I_{\text{coil}}$ (A)</th>
                                <th class="p-2.5 text-center">ทอร์กแม่เหล็กสูงสุด $\tau_{\max} = mB$ ($10^{-18}\,\text{N}\cdot\text{m}$)</th>
                                <th class="p-2.5 text-center">มุมเบี่ยงเบนเฉลี่ย $\langle\theta\rangle$ (deg)</th>
                                <th class="p-2.5 text-center">ความเร็วว่ายน้ำ $v_B$ ($\mu\text{m/s}$)</th>
                                <th class="p-2.5 text-center">อัตราการว่ายเป็นเส้นตรง ($R_{\text{dir}} = v_{\parallel}/v_0$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $bFieldRows = [
                                ['b' => 0,  'icoil' => 0.0],
                                ['b' => 10, 'icoil' => 0.8],
                                ['b' => 20, 'icoil' => 1.6],
                                ['b' => 35, 'icoil' => 2.8],
                                ['b' => 50, 'icoil' => 4.0]
                            ];
                            foreach ($bFieldRows as $idx => $row):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $row['b'] ?> mT <?= ($row['b'] == 0) ? '<span class="text-[10px] text-slate-500 font-normal">(การเคลื่อนที่แบบบราวเนียน)</span>' : '' ?></td>
                                <td class="p-2.5 text-center text-slate-300"><?= number_format($row['icoil'], 1) ?> A</td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_tau_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_theta_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-rose-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_vel_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_rdir_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.00">
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
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardDiscussion_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardDiscussion_body" class="p-5 space-y-5 text-xs sm:text-sm">
            <div class="space-y-2.5">
                <label class="block font-bold text-blue-400">
                    <i class="fa-solid fa-calculator"></i> การแสดงวิธีคำนวณและสมการเชิงเส้นอิเล็กโทรโฟเรซิส (Calculations):
                </label>
                <div class="p-3 rounded-xl bg-slate-950/70 border border-white/10 text-xs text-slate-300 font-mono space-y-1">
                    <div class="text-blue-300 font-bold">สูตรความสัมพันธ์:</div>
                    <div>$\mu = \frac{v}{E} = \frac{d / t}{V / L}, \quad \log_{10}(\text{bp}) = -m R_f + c, \quad P_{\text{Joule}} = V I = I^2 R$</div>
                    <div>$B = \left(\frac{4}{5}\right)^{3/2} \frac{\mu_0 N I}{R_{\text{coil}}}$</div>
                </div>
                <textarea id="lab_calculations" name="lab_calculations" rows="4" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed placeholder-slate-500" placeholder="แสดงการคำนวณความเร็วอิเล็กโทรโฟเรซิส v = d/t, ค่า Rf, และการแปลง log10(bp): เช่น ที่ 100V, L=10cm: E = 10 V/cm, แบนด์ 1,000 bp วิ่งได้ 18 mm: Rf = 18/65 = 0.277, log10(1000) = 3.00..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    1. การวิเคราะห์สมการเส้นโค้งมาตรฐาน $\log_{10}(\text{bp})$ vs $R_f$ และการหาน้ำหนักโมเลกุลชิ้นส่วนดีเอ็นเอที่ไม่ทราบขนาด:
                </label>
                <textarea id="discussion_q1" name="discussion_q1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อภิปรายความสัมพันธ์เชิงเส้น ค่าสัมประสิทธิ์การตัดสินใจ (R²) ช่วงความเป็นเส้นตรงของเจล และการประมาณขนาดแถบดีเอ็นเอในพลาสมิดและยีน 16S..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    2. การวิจารณ์ผลกระทบของความเข้มข้นเจลอกาโรส (%T) และความร้อนจูล (Joule Heating) ต่อสภาพเคลื่อนตัวทางไฟฟ้า:
                </label>
                <textarea id="discussion_q2" name="discussion_q2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="วิจารณ์ปรากฏการณ์การคัดกรองตามสมการเฟอร์กูสัน ผลของการเพิ่มแรงดันไฟฟ้าเกิน 150 V ต่ออุณหภูมิบัฟเฟอร์ และลักษณะ Gel Smiling..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    3. การสรุปผลพฤติกรรม Magnetotaxis ของแบคทีเรียภายใต้สนามแม่เหล็ก Helmholtz:
                </label>
                <textarea id="discussion_q3" name="discussion_q3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="สรุปกลไกทอร์กแม่เหล็กต่อสายแมกนีโตโซม Fe3O4 การเอาชนะพลังงานความร้อนแบบบราวเนียน (kT) และประสิทธิภาพการว่ายน้ำแบบทิศทางเดี่ยว..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 6: Applied Microbiology Questions -->
    <div id="cardQuestions" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardQuestions')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-circle-question text-purple-400"></i> คำถามประยุกต์ทางจุลชีววิทยาและเทคโนโลยีชีวภาพ (Microbiology Application Questions)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardQuestions_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardQuestions_body" class="p-5 space-y-6 text-xs sm:text-sm text-slate-300">
            
            <!-- Applied Question 1: PFGE -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-purple-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-purple-500/20 text-purple-300 flex items-center justify-center text-xs">1</span>
                    การประยุกต์ใช้ Pulsed-Field Gel Electrophoresis (PFGE) ในการจำแนกสายพันธุ์ระบาดวิทยาของแบคทีเรียก่อโรค
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    ในงานระบาดวิทยาโมเลกุล (เช่น เครือข่าย CDC PulseNet) เหตุใดการแยกชิ้นส่วนโครโมโซมแบคทีเรียขนาดใหญ่ ($>20-50\text{ kb}$) ที่ตัดด้วยเอนไซม์ Rare-cutting Restriction Enzymes จึงไม่สามารถใช้อิเล็กโทรโฟเรซิสกระแสตรงแบบทั่วไปได้ และหลักการของสนามไฟฟ้าสลับทิศทาง (Pulsed-field) สามารถแก้ปัญหาการเลื้อยลอดรูพรุน (DNA Reptation) ได้อย่างไร?
                </p>
                <textarea id="app_q1" name="quiz_ans_1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายข้อจำกัดของสนามไฟฟ้าสถิตต่อสายดีเอ็นเอขนาดยักษ์ การเหยียดตัวเป็นเส้นตรง (reptation) และกลไกเวลาการจัดทิศทางใหม่ (reorientation time) ใน PFGE..."></textarea>
            </div>

            <!-- Applied Question 2: Plasmid Topoisomers -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-cyan-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-cyan-500/20 text-cyan-300 flex items-center justify-center text-xs">2</span>
                    โทโพโลยีของพลาสมิดดีเอ็นเอ (Supercoiled vs Linear vs Relaxed Forms) ในการวิเคราะห์คุณภาพทางพันธุวิศวกรรม
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    เมื่อนำพลาสมิด pUC19 (ความยาว $2,686\text{ bp}$) ที่สกัดจาก <em>Escherichia coli</em> มาวิ่งใน 1.0% Agarose gel ทำไมจึงปรากฏแบนด์ 3 แถบที่มีอัตราเร็วในการเคลื่อนที่ต่างกันอย่างมีนัยสำคัญ ($v_{\text{supercoiled}} > v_{\text{linear}} > v_{\text{nicked}}$) ทั้งที่มีมวลโมเลกุลและจำนวนคู่เบสเท่ากันทุกประการ? จงอธิบายโดยใช้หลักการรัศมีไฮโดรไดนามิก ($r_{\text{eff}}$) และแรงต้านความหนืด
                </p>
                <textarea id="app_q2" name="quiz_ans_2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายผลของระดับการขดเกลียวแน่น (supercoiling) รูปร่าง 3 มิติเชิงพื้นที่ (compactness) ต่อรัศมีไฮโดรไดนามิก และความยากง่ายในการลอดผ่านรูพรุนเจล..."></textarea>
            </div>

            <!-- Applied Question 3: Magnetosomes & Nanobiotechnology -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-emerald-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-300 flex items-center justify-center text-xs">3</span>
                    การประยุกต์ใช้ผลึกชีวภาพแมกนีโตโซม ($\text{Fe}_3\text{O}_4$) ในการแพทย์แม่นยำและการนำส่งยารักษามะเร็ง
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    ผลึกแมกนีไทต์ที่สร้างขึ้นจาก <em>Magnetospirillum</em> มีข้อได้เปรียบทางฟิสิกส์และชีววิทยาอย่างไรเมื่อเทียบกับอนุภาคแม่เหล็กสังเคราะห์ทางเคมี (Synthetic Magnetic Nanoparticles)? และจงอธิบายหลักการประยุกต์ใช้สนามแม่เหล็กสลับภายนอกเพื่อสร้างความร้อนทำลายเซลล์มะเร็งเฉพาะจุด (Magnetic Hyperthermia) หรือการเป็นสารเพิ่มความเปรียบต่างภาพ MRI
                </p>
                <textarea id="app_q3" name="quiz_ans_3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายคุณสมบัติความเป็นผลึกเดี่ยว (single-domain), ขนาดสม่ำเสมอ, เยื่อหุ้มฟอสโฟลิพิดชีวภาพเข้ากันได้ดีกับเนื้อเยื่อ, และการสูญเสียพลังงานฮิสเทอรีซิส (hysteresis loss)..."></textarea>
            </div>

        </div>
    </div>

    <!-- Submit Button Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-white/15 rounded-3xl p-6 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="space-y-1 text-center sm:text-left">
            <div class="text-sm font-bold text-white flex items-center justify-center sm:justify-start gap-2">
                <i class="fa-solid fa-cloud-arrow-up text-blue-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 10 (Final E-Report Submission)
            </div>
            <div class="text-xs text-slate-400">
                ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite ประจำรายวิชา และซิงก์ผลคะแนนไปยัง Google Sheets อัตโนมัติ
            </div>
        </div>

        <button type="submit" id="submitBtn" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 hover:from-blue-400 text-white font-extrabold text-sm shadow-xl shadow-blue-950/40 transition active:scale-95 flex items-center justify-center gap-2">
            <i class="fa-solid fa-paper-plane"></i> บันทึกและส่งรายงานผล
        </button>
    </div>

    </form>

    <!-- Navigation Footer -->
    <nav class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-white/10">
        <a href="lab09_heat.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs font-medium flex items-center gap-2 transition border border-white/5">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 9 (อุณหพลศาสตร์และเทอร์โมไซเคิลเลอร์ PCR)
        </a>
        <a href="lab11_optics.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-blue-950/30">
            ถัดไป: ปฏิบัติการที่ 11 (ทัศนศาสตร์ คลื่นแสง และกล้องจุลทรรศน์คอนโฟคอล) <i class="fa-solid fa-arrow-right"></i>
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
    const frame = document.getElementById('gelElectro3DIframe');
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
  const iframe = document.getElementById('gelElectro3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 10.1: DNA Ladder Standard Curve Calculations
  const dyeDist = 92.0; // mm
  const ladderData = [
    { bp: 10000, dist: 16.5 },
    { bp: 8000,  dist: 20.2 },
    { bp: 6000,  dist: 25.8 },
    { bp: 5000,  dist: 30.4 },
    { bp: 4000,  dist: 35.9 },
    { bp: 3000,  dist: 43.2 },
    { bp: 2000,  dist: 53.4 },
    { bp: 1500,  dist: 61.6 },
    { bp: 1000,  dist: 71.8 },
    { bp: 500,   dist: 87.4 }
  ];

  ladderData.forEach((d, idx) => {
    const rf = d.dist / dyeDist;
    const logBp = Math.log10(d.bp);
    document.getElementById(`t1_dist_${idx}`).value = d.dist.toFixed(1);
    document.getElementById(`t1_rf_${idx}`).value = rf.toFixed(3);
    document.getElementById(`t1_log_${idx}`).value = logBp.toFixed(3);
  });

  // Table 10.2: Agarose % & Voltage Conditions
  const agaroseRows = [
    { efield: 5.0, curr: 48.2, temp: 25.8, vel: 1.85, mu: 6.17 },
    { efield: 2.5, curr: 24.1, temp: 25.2, vel: 0.78, mu: 5.20 },
    { efield: 5.0, curr: 48.2, temp: 26.0, vel: 1.60, mu: 5.33 },
    { efield: 7.5, curr: 72.3, temp: 29.4, vel: 2.55, mu: 5.67 },
    { efield: 5.0, curr: 48.2, temp: 26.1, vel: 1.25, mu: 4.17 },
    { efield: 5.0, curr: 48.2, temp: 26.2, vel: 0.82, mu: 2.73 }
  ];

  agaroseRows.forEach((r, idx) => {
    document.getElementById(`t2_efield_${idx}`).value = r.efield.toFixed(2);
    document.getElementById(`t2_curr_${idx}`).value = r.curr.toFixed(1);
    document.getElementById(`t2_temp_${idx}`).value = r.temp.toFixed(1);
    document.getElementById(`t2_vel_${idx}`).value = r.vel.toFixed(2);
    document.getElementById(`t2_mu_${idx}`).value = r.mu.toFixed(2);
  });

  // Table 10.3: Magnetotactic Bacteria Helmholtz Dynamics
  const bFieldRows = [
    { tau: 0.00, theta: 89.5, vel: 28.5, rdir: 0.12 },
    { tau: 5.20, theta: 26.4, vel: 38.2, rdir: 0.68 },
    { tau: 10.40, theta: 12.8, vel: 43.6, rdir: 0.92 },
    { tau: 18.20, theta: 6.5,  vel: 45.1, rdir: 0.98 },
    { tau: 26.00, theta: 3.2,  vel: 45.8, rdir: 0.99 }
  ];

  bFieldRows.forEach((r, idx) => {
    document.getElementById(`t3_tau_${idx}`).value = r.tau.toFixed(2);
    document.getElementById(`t3_theta_${idx}`).value = r.theta.toFixed(1);
    document.getElementById(`t3_vel_${idx}`).value = r.vel.toFixed(1);
    document.getElementById(`t3_rdir_${idx}`).value = r.rdir.toFixed(2);
  });

  // Fill sample calculations if empty
  if (!document.getElementById('lab_calculations').value) {
    document.getElementById('lab_calculations').value = '1. ความต่างศักย์และสนามไฟฟ้า: L = 10 cm, V = 100 V -> E = V/L = 10 V/cm\n2. ค่าสภาพเคลื่อนตัวสัมพัทธ์ (Rf): แบนด์ DNA 1,000 bp วิ่งได้ d = 71.8 mm, สีย้อม Bromophenol Blue วิ่งได้ d_dye = 92.0 mm -> Rf = 71.8 / 92.0 = 0.780\n3. ค่า log10(bp): log10(1000) = 3.000\n4. ความเร็วอิเล็กโทรโฟเรซิส: v = 71.8 mm / (40 min * 60 s) = 0.0299 mm/s = 2.99 * 10^-3 cm/s -> โมบิลิตี mu = v / E = 2.99 * 10^-4 cm^2/(V*s)\n5. ทอร์กแม่เหล็กของแมกนีโตโซม: tau = m * B * sin(theta) = (5.2 * 10^-16 A*m^2) * (20 * 10^-3 T) * sin(12.8 deg) = 2.3 * 10^-18 N*m ซึ่งสูงกว่า kT (4.1 * 10^-21 J) อย่างมีนัยสำคัญ';
  }

  // Fill sample discussions if empty
  if (!document.getElementById('discussion_q1').value) {
    document.getElementById('discussion_q1').value = 'กราฟมาตรฐานระหว่าง log₁₀(bp) กับค่าสภาพเคลื่อนตัวสัมพัทธ์ (Rf) แสดงความเป็นเส้นตรงสูงมากในช่วง 500 ถึง 6,000 bp (R² > 0.992) ตามสมการ log₁₀(bp) = 4.15 - 1.82(Rf) สำหรับชิ้นส่วนที่มีขนาดใหญ่กว่า 8,000 bp เริ่มเกิดการเบี่ยงเบนเนื่องจากรูพรุนของ 1% Agarose ไม่สามารถกรองได้อย่างอิสระ แบนด์ดีเอ็นเอในตัวอย่างพลาสมิดที่ตัดด้วย EcoRI เคลื่อนที่ได้ Rf = 0.36 คำนวณขนาดได้ 4,360 bp สอดคล้องกับขนาดจริงของเวกเตอร์ pBR322/pUC';
  }
  if (!document.getElementById('discussion_q2').value) {
    document.getElementById('discussion_q2').value = 'การเพิ่มความเข้มข้นเจลอกาโรสจาก 0.8% เป็น 2.0% ส่งผลให้ค่าสภาพเคลื่อนตัว (μ) ของ DNA 1 kb ลดลงอย่างต่อเนื่องจาก 6.17 เป็น 2.73 × 10⁻⁵ cm²/V·s สอดคล้องกับสมการเฟอร์กูสันอย่างแม่นยำ ในด้านผลของความต่างศักย์ การใช้แรงดัน 150 V ทำให้อัตราเร็วการวิ่งสูงขึ้น แต่กระแสไฟฟ้าที่เพิ่มเป็น 72.3 mA ส่งผลให้เกิดความร้อนจูลสูงถึง 10.8 W อุณหภูมิบัฟเฟอร์ไต่ระดับเป็น 29.4°C ทำให้แบนด์ดีเอ็นเอเริ่มสูญเสียความคมชัดและเกิดอาการยิ้ม (Smiling)';
  }
  if (!document.getElementById('discussion_q3').value) {
    document.getElementById('discussion_q3').value = 'เมื่อไม่มีสนามแม่เหล็กภายนอก (B = 0 mT) แบคทีเรีย M. gryphiswaldense ว่ายน้ำแบบไร้ทิศทางและถูกรบกวนด้วยพลังงานความร้อนแบบบราวเนียน (Rdir = 0.12) แต่เมื่อเปิดสนามแม่เหล็กเฮล์มโฮลทซ์เพียง 10-20 mT ทอร์กแม่เหล็ก τ = mBsinθ มีค่าสูงกว่าพลังงานความร้อนเฉลี่ย kT ส่งผลให้มุมเบี่ยงเบนลดลงเหลือเพียง 12.8° และอัตราการว่ายเป็นเส้นตรงพุ่งสูงถึง 0.92 ยืนยันว่าสายแมกนีโตโซมทำหน้าที่เป็นเข็มทิศชีวภาพนำทางเซลล์ได้อย่างสมบูรณ์';
  }

  alert('คำนวณและกรอกข้อมูลผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อย');
}

// Save Student Draft to LocalStorage
function saveStudentDraft() {
  const draft = {
    date: new Date().toISOString(),
    lab: 'lab10_electricity',
    calc: document.getElementById('lab_calculations')?.value || '',
    disc1: document.getElementById('discussion_q1')?.value || '',
    disc2: document.getElementById('discussion_q2')?.value || '',
    disc3: document.getElementById('discussion_q3')?.value || '',
    q1: document.getElementById('app_q1')?.value || '',
    q2: document.getElementById('app_q2')?.value || '',
    q3: document.getElementById('app_q3')?.value || ''
  };

  localStorage.setItem('physics4microbio_lab10_draft', JSON.stringify(draft));
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
        alert("⚠️ จำเป็นต้องมีภาพหลักฐาน: กรุณากดปุ่ม '📸 แคปหน้าจอ 3D Electrophoresis ตอนนี้' หรืออัปโหลดไฟล์ภาพก่อนส่งรายงานครับ");
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

    // Collect table 10.1
    const table1Data = [];
    for (let i = 0; i < 10; i++) {
        table1Data.push({
            row: i + 1,
            dist: document.getElementById(`t1_dist_${i}`)?.value || '',
            rf: document.getElementById(`t1_rf_${i}`)?.value || '',
            log: document.getElementById(`t1_log_${i}`)?.value || ''
        });
    }

    // Collect table 10.2
    const table2Data = [];
    for (let i = 0; i < 6; i++) {
        table2Data.push({
            row: i + 1,
            efield: document.getElementById(`t2_efield_${i}`)?.value || '',
            curr: document.getElementById(`t2_curr_${i}`)?.value || '',
            temp: document.getElementById(`t2_temp_${i}`)?.value || '',
            vel: document.getElementById(`t2_vel_${i}`)?.value || '',
            mu: document.getElementById(`t2_mu_${i}`)?.value || ''
        });
    }

    // Collect table 10.3
    const table3Data = [];
    for (let i = 0; i < 5; i++) {
        table3Data.push({
            row: i + 1,
            tau: document.getElementById(`t3_tau_${i}`)?.value || '',
            theta: document.getElementById(`t3_theta_${i}`)?.value || '',
            vel: document.getElementById(`t3_vel_${i}`)?.value || '',
            rdir: document.getElementById(`t3_rdir_${i}`)?.value || ''
        });
    }

    const payload = {
        lab_id: 'lab10',
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
        r_squared: 0.995,
        accuracy_score: 99.5,
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
            alert(`🎉 บันทึกรายงานผลปฏิบัติการที่ 10 สำเร็จ!\n\nรหัสนักศึกษา: ${studentId}\nหมายเลขส่งรายงาน (Report ID): #${result.report_id || result.id || 'SUB-10'}\nสถานะ: บันทึกข้อมูลและภาพหลักฐานลงฐานข้อมูลเรียบร้อยแล้ว`);
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

// Load draft on page load if available
window.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('physics4microbio_lab10_draft');
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
