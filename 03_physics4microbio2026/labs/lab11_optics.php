<?php
$pageTitle = 'ปฏิบัติการที่ 11: ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรีชีวภาพ | Lab 11: Optics, Advanced Microscopy & Bio-Spectrophotometry';
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

<!-- Custom Styling for Lab 11 -->
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
  border-color: #06b6d4;
  box-shadow: 0 0 10px rgba(6, 182, 212, 0.3);
  outline: none;
}
</style>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950/80 border-b border-white/10 py-10 sm:py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 font-mono shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                    <span>LABORATORY 11 • WAVE OPTICS, RESOLUTION &amp; SPECTROSCOPY</span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    ทัศนศาสตร์ กล้องจุลทรรศน์ และ <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-teal-400 to-emerald-400">สเปกโทรโฟโตเมตรีชีวภาพ</span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    การศึกษาขีดจำกัดการเลี้ยวเบนของแอบบี ($d = \frac{\lambda}{2\text{NA}}$), การเพิ่มกำลังแยกแยะด้วยน้ำมันแช่เลนส์ ($n = 1.518$), กฎของเบียร์-แลมเบิร์ต ($A = \varepsilon c l$), การวิเคราะห์โปรตีน BSA และจลนศาสตร์การเติบโตของแบคทีเรียจากค่าความขุ่น $\text{OD}_{600}$
                </p>
                <div class="flex flex-wrap gap-2 text-[11px] font-mono text-slate-400 pt-1">
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-cyan-300">
                        <i class="fa-solid fa-microscope text-cyan-400 mr-1"></i> Abbe Resolution Limit: d = λ / (2NA)
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-emerald-300">
                        <i class="fa-solid fa-vial text-emerald-400 mr-1"></i> Beer-Lambert Law: A = ε·c·l
                    </span>
                    <span class="px-2.5 py-1 rounded-lg bg-slate-900/80 border border-white/10 text-amber-300">
                        <i class="fa-solid fa-chart-line text-amber-400 mr-1"></i> Bacterial Growth Kinetics: OD₆₀₀
                    </span>
                </div>
            </div>

            <div class="hidden lg:flex flex-col items-end text-right font-mono space-y-1">
                <div class="text-xs text-slate-400">หลักสูตรวิทยาศาสตรบัณฑิต (จุลชีววิทยา)</div>
                <div class="text-sm font-bold text-cyan-400">PHYSICS FOR MICROBIOLOGY</div>
                <div class="text-[11px] text-slate-500">คณะวิทยาศาสตร์และเทคโนโลยี • มรภ.รำไพพรรณี</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Container -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Master Quick Action Toolbar -->
    <div id="masterLabToolbar" class="bg-slate-900/90 backdrop-blur-md p-3.5 rounded-2xl border border-cyan-500/20 shadow-xl flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-cyan-500"></span>
            <span class="text-xs font-bold text-slate-200 font-mono">LABORATORY MASTER CONTROL</span>
        </div>
        <div class="flex flex-wrap items-center gap-2 text-xs">
            <button onclick="expandAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-cyan-400 border border-cyan-500/20 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-up-right-and-down-left-from-center text-[11px]"></i> ขยายทุกการ์ด
            </button>
            <button onclick="collapseAllLabCards()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-white/10 font-medium transition flex items-center gap-1.5">
                <i class="fa-solid fa-down-left-and-up-right-to-center text-[11px]"></i> ย่อทุกการ์ด
            </button>
            <div class="h-4 w-px bg-white/10 hidden sm:block"></div>
            <button onclick="calculateAllTables()" class="px-3 py-1.5 rounded-lg bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold transition flex items-center gap-1.5 shadow-md shadow-cyan-950/40">
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
                <i class="fa-solid fa-bullseye text-cyan-400"></i> วัตถุประสงค์และสาระสำคัญการเรียนรู้ (Objectives)
            </h2>
            <span class="text-xs font-mono text-slate-400">CLO 1.4 &bull; CLO 2.5</span>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm text-slate-300 leading-relaxed">
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-cyan-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-eye"></i> 1. ทัศนศาสตร์การเลี้ยวเบนและกำลังแยกแยะ
                </div>
                <p>เข้าใจกฎการหักเหของสเนลล์ ขีดจำกัดการเลี้ยวเบนของแอบบี ($d = \frac{\lambda}{2\text{NA}}$) และบทบาทของน้ำมันแช่เลนส์ ($n = 1.518$) ในการเพิ่มช่องเปิดเชิงตัวเลขเพื่อส่องเห็นเซลล์และสปอร์แบคทีเรีย</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-teal-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-vial"></i> 2. สเปกโทรโฟโตเมตรีและกฎเบียร์-แลมเบิร์ต
                </div>
                <p>สร้างเส้นกราฟมาตรฐานความเข้มข้นโปรตีน BSA จากการวัดค่าการดูดกลืนแสงที่ $\lambda = 595\text{ nm}$ (Bradford Assay) คำนวณสัมประสิทธิ์การดูดกลืนแสง ($\varepsilon$) และวิเคราะห์หาตัวอย่างไม่ทราบค่า</p>
            </div>
            <div class="bg-slate-950/50 p-4 rounded-xl border border-white/5 space-y-1.5">
                <div class="font-bold text-amber-400 flex items-center gap-1.5">
                    <i class="fa-solid fa-chart-line"></i> 3. จลนศาสตร์การเจริญของประชากรแบคทีเรีย
                </div>
                <p>ติดตามการเพิ่มจำนวนของ <em>E. coli</em> ด้วยค่าความขุ่น $\text{OD}_{600}$ สร้างกราฟ Growth Curve คำนวณอัตราการเจริญจำเพาะ ($\mu_{\max}$) และระยะเวลาแบ่งเซลล์ (Doubling time: $g$)</p>
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Concept 1: Snell's Law & Refraction -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-cyan-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-arrow-trend-up"></i> 1. กฎการหักเหของสเนลล์ (Snell's Law of Refraction)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        เมื่อคลื่นแสงเดินทางผ่านรอยต่อระหว่างตัวกลางที่มีดัชนีหักเหต่างกัน ($n_1 \to n_2$) รังสีแสงจะเกิดการหักเหตามกฎของสเนลล์:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-cyan-500/20 text-center font-mono text-cyan-300 overflow-x-auto">
                        $$n_1 \sin\theta_1 = n_2 \sin\theta_2$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        ในกล้องจุลทรรศน์ แสงที่ผ่านจากแผ่นสไลด์แก้ว ($n_{\text{glass}} = 1.515$) สู่ชั้นอากาศ ($n_{\text{air}} = 1.000$) จะหักเหเบนออกจากเส้นตั้งฉาก หากมุมตกกระทบเกินมุมวิกฤต ($\theta_c = \arcsin(1/1.515) \approx 41.2^\circ$) จะเกิดการสะท้อนกลับหมด (Total Internal Reflection) แสงจึงไม่เข้าสู่เลนส์
                    </p>
                </div>

                <!-- Concept 2: Abbe Diffraction Resolution Limit & NA -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-teal-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-circle-dot"></i> 2. ขีดจำกัดการเลี้ยวเบนของแอบบี (Abbe's Diffraction Limit)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        คลื่นแสงที่ผ่านรูเปิดเลนส์ใกล้วัตถุจะเกิดการเลี้ยวเบนและแทรกสอดเป็นวงแหวนแอร์รี (Airy Disk) ระยะห่างน้อยที่สุดระหว่างสองจุดที่กล้องยังคงแยกแยะได้ ($d$) กำหนดโดยสมการแอบบี:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-teal-500/20 text-center font-mono text-teal-300 overflow-x-auto">
                        $$d = \frac{\lambda}{2 \cdot \text{NA}} = \frac{\lambda}{2 n \sin\alpha}, \quad \text{NA} = n \sin\alpha$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $\lambda$ คือ ความยาวคลื่นแสง ($\approx 550\text{ nm}$), $\text{NA}$ คือ ช่องเปิดเชิงตัวเลข (Numerical Aperture), $n$ คือ ดัชนีหักเหของตัวกลางระหว่างสไลด์กับเลนส์ และ $\alpha$ คือ ครึ่งมุมยอดของกรวยแสงที่เลนส์รับได้ การหยดน้ำมันแช่เลนส์ ($n = 1.518$) ทำให้ $\text{NA}$ พุ่งสูงถึง $1.25-1.40$ และลดขีดจำกัด $d$ ลงเหลือเพียง $\approx 0.20\,\mu\text{m}$
                    </p>
                </div>

                <!-- Concept 3: Beer-Lambert Law -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-rose-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-chart-column"></i> 3. กฎของเบียร์-แลมเบิร์ต (Beer-Lambert Absorption Law)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        เมื่อลำแสงความเข้มเริ่มต้น $I_0$ เดินทางผ่านสารละลายดูดกลืนแสงที่มีความเข้มข้น $c$ ในหลอดคิวเวตต์ความหนาทางเดินแสง $l$ ความเข้มแสงที่ส่งผ่าน $I$ จะลดทอนลงแบบเอกซ์โพเนนเชียล:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-rose-500/20 text-center font-mono text-rose-300 overflow-x-auto">
                        $$A = -\log_{10}\left(\frac{I}{I_0}\right) = \varepsilon \cdot c \cdot l = -\log_{10}(T)$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $A$ คือ ค่าการดูดกลืนแสง (Absorbance, ไม่มีหน่วย), $T = I/I_0$ คือ การส่องผ่าน (Transmittance), $\varepsilon$ คือ สัมประสิทธิ์การดูดกลืนแสงโมลาร์ ($\text{L}\cdot\text{mol}^{-1}\cdot\text{cm}^{-1}$) และ $l$ คือ ความยาวทางเดินแสง ($1.0\text{ cm}$)
                    </p>
                </div>

                <!-- Concept 4: Bacterial Growth Kinetics & OD600 -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-white/5 space-y-2">
                    <h3 class="font-bold text-amber-400 text-sm flex items-center gap-1.5">
                        <i class="fa-solid fa-chart-line"></i> 4. จลนศาสตร์การเติบโตของจุลินทรีย์ (Bacterial Growth Kinetics)
                    </h3>
                    <p class="text-slate-300 text-xs">
                        ในระยะล็อกเฟส (Exponential Phase) เซลล์แบคทีเรียจะแบ่งตัวทวีคูณ ค่าความขุ่น $\text{OD}_{600}$ ซึ่งเกิดจากการกระเจิงแสงแบบเรย์ลีห์และมีเอสัมพันธ์โดยตรงกับความหนาแน่นเซลล์:
                    </p>
                    <div class="p-3 bg-slate-900/90 rounded-lg border border-amber-500/20 text-center font-mono text-amber-300 overflow-x-auto">
                        $$\text{OD}_{600}(t) = \text{OD}_0 \cdot e^{\mu_{\max} t}, \quad g = \frac{\ln 2}{\mu_{\max}} = \frac{0.693}{\mu_{\max}}$$
                    </div>
                    <p class="text-[11px] text-slate-400">
                        เมื่อ $\mu_{\max}$ คือ อัตราการเจริญเติบโตจำเพาะสูงสุด ($\text{min}^{-1}$ หรือ $\text{h}^{-1}$) และ $g$ คือ ระยะเวลาชั่วรุ่น (Generation Time / Doubling Time)
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- Section 3: Interactive 3D Virtual Lab Simulator Viewport -->
    <div id="cardSimulator" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-xl">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <i class="fa-solid fa-cube text-cyan-400"></i>
                <h2 class="text-base sm:text-lg font-bold text-white">
                    เครื่องจำลอง 3D กล้องจุลทรรศน์และสเปกโทรโฟโตมิเตอร์ (3D Interactive Simulator)
                </h2>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="toggleSimContainerFullscreen()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs flex items-center gap-1.5 transition border border-white/10">
                    <i class="fa-solid fa-expand text-[11px]"></i> เต็มหน้าจอ
                </button>
            </div>
        </div>
        <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[480px] bg-slate-950">
            <iframe id="optics3DIframe" src="../simulations/sim11_optics_3d.html" class="w-full h-full border-0 block" allow="fullscreen; autoplay"></iframe>
        </div>
        <div class="p-3.5 bg-slate-950/80 border-t border-white/5 flex flex-wrap items-center justify-between gap-3 text-xs text-slate-400">
            <div class="flex items-center gap-3">
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-mouse text-cyan-400"></i> หมุน/ซูม 3D ด้วยเมาส์</span>
                <span class="flex items-center gap-1.5"><i class="fa-solid fa-droplet text-amber-400"></i> ทดสอบเลนส์ 100x Oil Immersion</span>
            </div>
            <div class="font-mono text-slate-500">Dual Mode: Research Microscope &bull; UV-Vis Bio-Spectrophotometer</div>
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

            <!-- Table 11.1: Objective Lens Optics & Resolution -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-cyan-400 flex items-center gap-2">
                        <i class="fa-solid fa-microscope"></i> ตารางที่ 11.1: การวิเคราะห์สมบัติเชิงแสง กำลังขยาย และขีดจำกัดการแยกแยะของเลนส์ใกล้วัตถุ ($\lambda = 550\text{ nm}$)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">เลนส์ใกล้ตา $10\times$ &bull; ความยาวโฟกัสรวม</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">เลนส์ใกล้วัตถุ (Objective)</th>
                                <th class="p-2.5 text-center">กำลังขยายรวม ($M$)</th>
                                <th class="p-2.5 text-center">ตัวกลางหักเห ($n$)</th>
                                <th class="p-2.5 text-center">ช่องเปิดเชิงตัวเลข ($\text{NA}$)</th>
                                <th class="p-2.5 text-center">ขีดจำกัดการแยกแยะแอบบี $d$ ($\mu\text{m}$)</th>
                                <th class="p-2.5 text-center">เส้นผ่านศูนย์กลางลานสายตา $\text{FOV}$ ($\mu\text{m}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $objectives = [
                                ['name' => '4x (Scanning)', 'med' => 'อากาศ (n=1.000)'],
                                ['name' => '10x (Low Power)', 'med' => 'อากาศ (n=1.000)'],
                                ['name' => '40x (High Power Dry)', 'med' => 'อากาศ (n=1.000)'],
                                ['name' => '100x (Oil Immersion)', 'med' => 'น้ำมันแช่เลนส์ (n=1.518)']
                            ];
                            foreach ($objectives as $idx => $obj):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $obj['name'] ?></td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_mag_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0x">
                                </td>
                                <td class="p-2.5 text-center text-slate-400"><?= $obj['med'] ?></td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_na_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_res_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0.00">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t1_fov_<?= $idx ?>" class="input-blank w-20 px-2 py-1 rounded text-center text-purple-300 font-mono text-xs" placeholder="0">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 11.2: Bradford Protein Assay Standard Curve -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-teal-400 flex items-center gap-2">
                        <i class="fa-solid fa-vial"></i> ตารางที่ 11.2: การสร้างกราฟมาตรฐานโปรตีน BSA ด้วย Bradford Protein Assay ($\lambda = 595\text{ nm}, l = 1.0\text{ cm}$)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">Blank: Bradford Reagent in Deionized Water</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">หลอดทดลอง / ตัวอย่าง</th>
                                <th class="p-2.5 text-center">ความเข้มข้น BSA $c$ (mg/mL)</th>
                                <th class="p-2.5 text-center">การส่องผ่าน $T$ (%)</th>
                                <th class="p-2.5 text-center">ค่าการดูดกลืนแสง $A_{595}$ (AU)</th>
                                <th class="p-2.5 text-center">ค่าคำนวณ $A/c$ ($\text{mL/mg}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $bsaTubes = [
                                ['label' => 'หลอดที่ 1 (Blank)', 'c' => '0.00'],
                                ['label' => 'หลอดที่ 2 (Std 1)', 'c' => '0.20'],
                                ['label' => 'หลอดที่ 3 (Std 2)', 'c' => '0.40'],
                                ['label' => 'หลอดที่ 4 (Std 3)', 'c' => '0.60'],
                                ['label' => 'หลอดที่ 5 (Std 4)', 'c' => '0.80'],
                                ['label' => 'หลอดที่ 6 (Std 5)', 'c' => '1.00'],
                                ['label' => 'หลอดที่ 7 (Unknown Sample)', 'c' => 'ไม่ทราบค่า']
                            ];
                            foreach ($bsaTubes as $idx => $tb):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $tb['label'] ?></td>
                                <td class="p-2.5 text-center text-slate-300"><?= $tb['c'] ?></td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_trans_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0.0 %">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_abs_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-rose-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t2_ext_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.000">
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 11.3: Bacterial Growth Kinetics (OD600) -->
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-sm font-bold text-amber-400 flex items-center gap-2">
                        <i class="fa-solid fa-chart-line"></i> ตารางที่ 11.3: จลนศาสตร์การเจริญเติบโตของแบคทีเรีย *Escherichia coli* จากค่าความขุ่น ($\text{OD}_{600}$)
                    </h3>
                    <span class="text-xs font-mono text-slate-400">อาหารเลี้ยงเชื้อ LB Broth, 37°C, 200 rpm Shaking</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-white/10">
                    <table class="w-full text-left text-xs font-mono">
                        <thead class="bg-slate-950/80 text-slate-300 border-b border-white/10">
                            <tr>
                                <th class="p-2.5">เวลาเพาะเลี้ยง $t$ (min)</th>
                                <th class="p-2.5 text-center">ค่าความขุ่น $\text{OD}_{600}$</th>
                                <th class="p-2.5 text-center">ค่าลอการิทึมธรรมชาติ $\ln(\text{OD}_{600})$</th>
                                <th class="p-2.5 text-center">ความหนาแน่นเซลล์ ($10^7\,\text{CFU/mL}$)</th>
                                <th class="p-2.5 text-center">ระยะการเจริญ (Growth Phase)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 bg-slate-900/40">
                            <?php
                            $growthTimes = [0, 30, 60, 90, 120, 150, 180, 210, 240, 270, 300];
                            foreach ($growthTimes as $idx => $min):
                            ?>
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-2.5 font-bold text-white"><?= $min ?> นาที</td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_od_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-amber-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_lnod_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-cyan-300 font-mono text-xs" placeholder="0.000">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_cfu_<?= $idx ?>" class="input-blank w-24 px-2 py-1 rounded text-center text-emerald-300 font-mono text-xs" placeholder="0.0">
                                </td>
                                <td class="p-2.5 text-center">
                                    <input type="text" id="t3_phase_<?= $idx ?>" class="input-blank w-32 px-2 py-1 rounded text-center text-slate-300 font-mono text-xs" placeholder="Phase">
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
                <i class="fa-solid fa-pen-nib text-cyan-400"></i> การวิเคราะห์และวิจารณ์ผลการทดลอง (Analysis &amp; Discussion)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardDiscussion_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardDiscussion_body" class="p-5 space-y-5 text-xs sm:text-sm">
            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    1. การวิเคราะห์ขีดจำกัดการแยกแยะของแอบบี ($d$) และผลของการใช้น้ำมันแช่เลนส์ (Immersion Oil):
                </label>
                <textarea id="discussion_q1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อภิปรายความสัมพันธ์ระหว่างดัชนีหักเหของน้ำมัน ค่า NA และการลดลงของระยะแยกแยะ d จาก 0.35 เหลือ 0.22 ไมครอน..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    2. การวิจารณ์กราฟมาตรฐานโปรตีน BSA และความถูกต้องของกฎเบียร์-แลมเบิร์ต:
                </label>
                <textarea id="discussion_q2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="วิจารณ์ความเป็นเส้นตรง ค่า R² สัมประสิทธิ์การดูดกลืนแสง ε และการคำนวณความเข้มข้นของ Unknown Sample..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="block font-bold text-slate-200">
                    3. การสรุปผลจลนศาสตร์การเจริญเติบโตของประชากรแบคทีเรียจากเส้นโค้ง Growth Curve:
                </label>
                <textarea id="discussion_q3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="สรุปช่วงเวลาของ Lag, Log, Stationary phases ค่าอัตราการเจริญจำเพาะ μmax และระยะเวลา doubling time (g)..."></textarea>
            </div>
        </div>
    </div>

    <!-- Section 6: Applied Microbiology Questions -->
    <div id="cardQuestions" class="bg-slate-900/60 backdrop-blur-md rounded-2xl border border-white/10 overflow-hidden shadow-lg">
        <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between cursor-pointer" onclick="toggleLabCard('cardQuestions')">
            <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2.5">
                <i class="fa-solid fa-circle-question text-teal-400"></i> คำถามประยุกต์ทางจุลชีววิทยาและเทคโนโลยีชีวภาพ (Microbiology Application Questions)
            </h2>
            <button class="text-slate-400 hover:text-white transition">
                <i id="cardQuestions_icon" class="fa-solid fa-chevron-up"></i>
            </button>
        </div>
        <div id="cardQuestions_body" class="p-5 space-y-6 text-xs sm:text-sm text-slate-300">
            
            <!-- Applied Question 1: Immersion Oil Physics -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-cyan-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-cyan-500/20 text-cyan-300 flex items-center justify-center text-xs">1</span>
                    กลไกเชิงฟิสิกส์ของน้ำมันแช่เลนส์ (Immersion Oil) และการกำจัดการสะท้อนกลับหมด (TIR)
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    เหตุใดการใช้เลนส์ใกล้วัตถุกำลังขยายสูง ($100\times$) แบบแห้ง (Dry lens, มีอากาศคั่นระหว่างสไลด์กับเลนส์) จึงให้ภาพที่มืด มัว และแยกแยะโครงสร้างภายในของแบคทีเรียไม่ได้? จงอธิบายการจับคู่ดัชนีหักเห (Index Matching) ของน้ำมันซีดาร์วูดหรือน้ำมันสังเคราะห์ ($n = 1.518$) กับกระจกสไลด์ ($n = 1.515$) และผลต่อมุมกรวยแสงที่เลนส์รับได้ ($\alpha$)
                </p>
                <textarea id="app_q1" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายการหักเหแสงตามกฎสเนลล์ การสะท้อนกลับหมดที่รอยต่อแก้ว-อากาศ และการเพิ่มค่า NA = n sinα เมื่อเติม immersion oil..."></textarea>
            </div>

            <!-- Applied Question 2: A260/A280 Purity Ratio -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-emerald-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-emerald-500/20 text-emerald-300 flex items-center justify-center text-xs">2</span>
                    การประเมินความบริสุทธิ์ของกรดนิวคลีอิกจากอัตราส่วนสเปกตรัม ($A_{260}/A_{280}$ และ $A_{260}/A_{230}$)
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    ในการสกัดดีเอ็นเอของจุลินทรีย์สำหรับงาน Next-Generation Sequencing (NGS) ทำไมสารละลายดีเอ็นเอที่บริสุทธิ์ต้องมีอัตราส่วน $A_{260}/A_{280} \approx 1.8 - 2.0$ และหากอัตราส่วนนี้ต่ำกว่า $1.6$ หรือ $A_{260}/A_{230} < 2.0$ จะบ่งชี้ถึงการปนเปื้อนของสารเคมีและสารชีวโมเลกุลชนิดใดในขั้นตอนการสกัด (Lysis & Purification)?
                </p>
                <textarea id="app_q2" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายคุณสมบัติการดูดกลืนแสงสูงสุดของวงแหวนเบสไนโตรเจนที่ 260 nm, กรดอะมิโนอะโรมาติก (Trp, Tyr) ที่ 280 nm, และเกลือฟีนอล/กวานิดีนที่ 230 nm..."></textarea>
            </div>

            <!-- Applied Question 3: Confocal & Super-Resolution Microscopy -->
            <div class="p-4 bg-slate-950/60 rounded-xl border border-white/5 space-y-2.5">
                <div class="font-bold text-amber-400 flex items-center gap-2">
                    <span class="w-5 h-5 rounded-full bg-amber-500/20 text-amber-300 flex items-center justify-center text-xs">3</span>
                    การก้าวข้ามขีดจำกัดการเลี้ยวเบนของแอบบีด้วยกล้องคอนโฟคอล (CLSM) และซูเปอร์เรโซลูชัน (STED/STORM)
                </div>
                <p class="text-slate-300 text-xs leading-relaxed">
                    กล้องจุลทรรศน์คอนโฟคอลเลเซอร์ (Confocal Laser Scanning Microscope) ใช้รูพินโฮล (Spatial Pinhole) ในการกำจัดแสงนอกระนาบโฟกัส (Out-of-focus light) ได้อย่างไร? และเทคโนโลยี Super-Resolution Microscopy (เช่น STED หรือ Single-Molecule Localization: STORM) มีกลไกทางฟิสิกส์อย่างไรในการเอาชนะขีดจำกัดแอบบี ($d \approx 200\text{ nm}$) จนสามารถส่องเห็นโปรตีน Z-ring ของแบคทีเรียได้ที่ระดับความละเอียด $20\text{ nm}$?
                </p>
                <textarea id="app_q3" rows="3" class="input-blank w-full p-3 rounded-xl text-slate-200 text-xs font-mono leading-relaxed" placeholder="อธิบายระนาบคอนจูเกตและพินโฮลใน CLSM และกลไกกระตุ้น-ดับแสงฟลูออเรสเซนต์ (Stimulated Emission Depletion) หรือการสุ่มเปล่งแสงทีละโมเลกุล..."></textarea>
            </div>

        </div>
    </div>

    <!-- Navigation Footer -->
    <nav class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-white/10">
        <a href="lab10_electricity.php" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-mono text-xs font-medium flex items-center gap-2 transition border border-white/5">
            <i class="fa-solid fa-arrow-left"></i> ย้อนกลับ: ปฏิบัติการที่ 10 (ไฟฟ้า สนามแม่เหล็ก และเจลอิเล็กโทรโฟเรซิส)
        </a>
        <a href="lab12_radioactivity.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-mono text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-cyan-950/30">
            ถัดไป: ปฏิบัติการที่ 12 (ฟิสิกส์นิวเคลียร์ กัมมันตรังสี และการทำลายเชื้อ) <i class="fa-solid fa-arrow-right"></i>
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
  const cards = ['cardTheory', 'cardSimulator', 'cardDataTables', 'cardDiscussion', 'cardQuestions'];
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
  const cards = ['cardTheory', 'cardSimulator', 'cardDataTables', 'cardDiscussion', 'cardQuestions'];
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

function toggleSimContainerFullscreen() {
  const iframe = document.getElementById('optics3DIframe');
  if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
  } else if (iframe.webkitRequestFullscreen) {
    iframe.webkitRequestFullscreen();
  }
}

// Auto-calculation helper for all 3 tables
function calculateAllTables() {
  // Table 11.1: Objective Lens Optics
  const objData = [
    { mag: 40,  na: 0.10, res: 2.75, fov: 4500 },
    { mag: 100, na: 0.25, res: 1.10, fov: 1800 },
    { mag: 400, na: 0.65, res: 0.42, fov: 450 },
    { mag: 1000,na: 1.25, res: 0.22, fov: 180 }
  ];

  objData.forEach((d, idx) => {
    document.getElementById(`t1_mag_${idx}`).value = `${d.mag}x`;
    document.getElementById(`t1_na_${idx}`).value = d.na.toFixed(2);
    document.getElementById(`t1_res_${idx}`).value = d.res.toFixed(2);
    document.getElementById(`t1_fov_${idx}`).value = d.fov;
  });

  // Table 11.2: Bradford Protein Assay Standard Curve
  const bsaData = [
    { trans: 100.0, abs: 0.000, ext: 0.000 },
    { trans: 72.1,  abs: 0.142, ext: 0.710 },
    { trans: 51.9,  abs: 0.285, ext: 0.713 },
    { trans: 37.3,  abs: 0.428, ext: 0.713 },
    { trans: 26.9,  abs: 0.570, ext: 0.713 },
    { trans: 19.3,  abs: 0.714, ext: 0.714 },
    { trans: 44.5,  abs: 0.352, ext: 0.713 } // Unknown ~ 0.493 mg/mL
  ];

  bsaData.forEach((d, idx) => {
    document.getElementById(`t2_trans_${idx}`).value = `${d.trans.toFixed(1)} %`;
    document.getElementById(`t2_abs_${idx}`).value = d.abs.toFixed(3);
    document.getElementById(`t2_ext_${idx}`).value = d.ext.toFixed(3);
  });

  // Table 11.3: Bacterial Growth Kinetics
  const growthData = [
    { od: 0.050, lnod: -2.996, cfu: 4.0,   phase: 'Lag Phase' },
    { od: 0.058, lnod: -2.847, cfu: 4.6,   phase: 'Lag Phase' },
    { od: 0.092, lnod: -2.386, cfu: 7.4,   phase: 'Late Lag Phase' },
    { od: 0.165, lnod: -1.802, cfu: 13.2,  phase: 'Early Log Phase' },
    { od: 0.310, lnod: -1.171, cfu: 24.8,  phase: 'Exponential Log' },
    { od: 0.585, lnod: -0.536, cfu: 46.8,  phase: 'Exponential Log' },
    { od: 1.080, lnod: 0.077,  cfu: 86.4,  phase: 'Mid-Log Phase' },
    { od: 1.720, lnod: 0.542,  cfu: 137.6, phase: 'Late Log Phase' },
    { od: 2.150, lnod: 0.765,  cfu: 172.0, phase: 'Deceleration' },
    { od: 2.380, lnod: 0.867,  cfu: 190.4, phase: 'Stationary Phase' },
    { od: 2.400, lnod: 0.875,  cfu: 192.0, phase: 'Stationary Phase' }
  ];

  growthData.forEach((d, idx) => {
    document.getElementById(`t3_od_${idx}`).value = d.od.toFixed(3);
    document.getElementById(`t3_lnod_${idx}`).value = d.lnod.toFixed(3);
    document.getElementById(`t3_cfu_${idx}`).value = d.cfu.toFixed(1);
    document.getElementById(`t3_phase_${idx}`).value = d.phase;
  });

  // Fill sample discussions
  if (!document.getElementById('discussion_q1').value) {
    document.getElementById('discussion_q1').value = 'การใช้น้ำมันแช่เลนส์ (Immersion Oil, n = 1.518) มีดัชนีหักเหเท่ากับแผ่นแก้วสไลด์ ทำให้แสงไม่เกิดการหักเหเบนออกจากเลนส์และป้องกันการสะท้อนกลับหมดอย่างสิ้นเชิง ส่งผลให้ค่า NA เพิ่มขึ้นจาก 0.90 ในเลนส์แห้งเป็น 1.25 ในเลนส์แช่น้ำมัน ทำให้ขีดจำกัดการแยกแยะของแอบบี (d) ลดลงเหลือเพียง 0.22 ไมครอน สามารถมองเห็นโครงสร้างสปอร์ภายในเซลล์ Bacillus subtilis ได้อย่างคมชัด';
  }
  if (!document.getElementById('discussion_q2').value) {
    document.getElementById('discussion_q2').value = 'กราฟมาตรฐานโปรตีน BSA แสดงความเป็นเส้นตรงสูงมากตามกฎเบียร์-แลมเบิร์ต (R² = 0.9998) มีค่าความชัน (ε·l) เท่ากับ 0.713 mL/mg สำหรับสารตัวอย่าง Unknown Sample วัดค่าการดูดกลืนแสง A₅₉₅ ได้ 0.352 AU คำนวณความเข้มข้นโปรตีนได้เท่ากับ 0.494 mg/mL';
  }
  if (!document.getElementById('discussion_q3').value) {
    document.getElementById('discussion_q3').value = 'การเจริญเติบโตของ E. coli มีระยะ Lag phase ประมาณ 60 นาทีแรก ก่อนเข้าสู่ Exponential Log phase ในช่วงนาทีที่ 90-210 ความชันของกราฟ ln(OD₆₀₀) เทียบกับเวลาในช่วงล็อกเฟสให้ค่าอัตราการเจริญจำเพาะสูงสุด μmax = 0.0215 min⁻¹ (หรือ 1.29 h⁻¹) คำนวณระยะเวลา doubling time ได้ g = ln(2)/μmax = 32.2 นาที ซึ่งสอดคล้องกับคุณลักษณะทางสรีรวิทยาของ E. coli ในสภาวะอาหารสมบูรณ์';
  }

  alert('คำนวณและกรอกข้อมูลผลการทดลองทั้ง 3 ตารางสำเร็จเรียบร้อย');
}

// Save Student Draft to LocalStorage
function saveStudentDraft() {
  const draft = {
    date: new Date().toISOString(),
    lab: 'Lab11_Optics',
    t1: [],
    t2: [],
    t3: [],
    disc1: document.getElementById('discussion_q1').value,
    disc2: document.getElementById('discussion_q2').value,
    disc3: document.getElementById('discussion_q3').value,
    q1: document.getElementById('app_q1').value,
    q2: document.getElementById('app_q2').value,
    q3: document.getElementById('app_q3').value
  };

  for (let i = 0; i < 4; i++) {
    draft.t1.push({
      mag: document.getElementById(`t1_mag_${i}`)?.value || '',
      na: document.getElementById(`t1_na_${i}`)?.value || '',
      res: document.getElementById(`t1_res_${i}`)?.value || '',
      fov: document.getElementById(`t1_fov_${i}`)?.value || ''
    });
  }

  for (let i = 0; i < 7; i++) {
    draft.t2.push({
      trans: document.getElementById(`t2_trans_${i}`)?.value || '',
      abs: document.getElementById(`t2_abs_${i}`)?.value || '',
      ext: document.getElementById(`t2_ext_${i}`)?.value || ''
    });
  }

  for (let i = 0; i < 11; i++) {
    draft.t3.push({
      od: document.getElementById(`t3_od_${i}`)?.value || '',
      lnod: document.getElementById(`t3_lnod_${i}`)?.value || '',
      cfu: document.getElementById(`t3_cfu_${i}`)?.value || '',
      phase: document.getElementById(`t3_phase_${i}`)?.value || ''
    });
  }

  localStorage.setItem('physics4microbio_lab11_draft', JSON.stringify(draft));
  alert('บันทึกร่างผลการทดลองลงใน LocalStorage สำเร็จเรียบร้อย');
}

// Load draft on page load
window.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('physics4microbio_lab11_draft');
  if (saved) {
    try {
      const data = JSON.parse(saved);
      if (data.t1) {
        data.t1.forEach((row, i) => {
          if (document.getElementById(`t1_mag_${i}`)) document.getElementById(`t1_mag_${i}`).value = row.mag;
          if (document.getElementById(`t1_na_${i}`)) document.getElementById(`t1_na_${i}`).value = row.na;
          if (document.getElementById(`t1_res_${i}`)) document.getElementById(`t1_res_${i}`).value = row.res;
          if (document.getElementById(`t1_fov_${i}`)) document.getElementById(`t1_fov_${i}`).value = row.fov;
        });
      }
      if (data.t2) {
        data.t2.forEach((row, i) => {
          if (document.getElementById(`t2_trans_${i}`)) document.getElementById(`t2_trans_${i}`).value = row.trans;
          if (document.getElementById(`t2_abs_${i}`)) document.getElementById(`t2_abs_${i}`).value = row.abs;
          if (document.getElementById(`t2_ext_${i}`)) document.getElementById(`t2_ext_${i}`).value = row.ext;
        });
      }
      if (data.t3) {
        data.t3.forEach((row, i) => {
          if (document.getElementById(`t3_od_${i}`)) document.getElementById(`t3_od_${i}`).value = row.od;
          if (document.getElementById(`t3_lnod_${i}`)) document.getElementById(`t3_lnod_${i}`).value = row.lnod;
          if (document.getElementById(`t3_cfu_${i}`)) document.getElementById(`t3_cfu_${i}`).value = row.cfu;
          if (document.getElementById(`t3_phase_${i}`)) document.getElementById(`t3_phase_${i}`).value = row.phase;
        });
      }
      if (data.disc1) document.getElementById('discussion_q1').value = data.disc1;
      if (data.disc2) document.getElementById('discussion_q2').value = data.disc2;
      if (data.disc3) document.getElementById('discussion_q3').value = data.disc3;
      if (data.q1) document.getElementById('app_q1').value = data.q1;
      if (data.q2) document.getElementById('app_q2').value = data.q2;
      if (data.q3) document.getElementById('app_q3').value = data.q3;
    } catch (e) {
      console.error('Error loading saved draft:', e);
    }
  }
});
</script>

<?php include '../includes/footer.php'; ?>
