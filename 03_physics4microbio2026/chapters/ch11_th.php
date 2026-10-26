<?php
$pageTitle = "บทที่ 11: ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรี";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 20%, #1e293b 0%, #020617 85%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-4 font-mono">
                <a href="../index.php" class="hover:text-amber-400 transition-colors"><i class="fas fa-home mr-1"></i>หน้าแรก</a>
                <span>/</span>
                <span class="text-slate-300">บทเรียนทฤษฎี</span>
                <span>/</span>
                <span class="text-amber-400">บทที่ 11</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-microscope text-xs"></i> MODULE 11 &bull; OPTICS &amp; SPECTROSCOPY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรี
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                ขีดจำกัดแอบบี (Abbe Limit) น้ำมันแช่เลนส์ $100\times$ Oil Immersion ($n = 1.518$) และกฎเบียร์-แลมเบิร์ตวัดความขุ่น $\text{OD}_{600}$
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 10
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-500/10 via-slate-800/40 to-slate-900 border border-indigo-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                        <i class="fas fa-eye text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-indigo-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายกำลังแยกแยะตามขีดจำกัดแอบบี ($d = \lambda / 2\text{NA}$) และบทบาทของน้ำมันแช่เลนส์ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-indigo-400 mt-1"></i>
                            <span><strong>CLO2:</strong> ใช้กฎเบียร์-แลมเบิร์ต ($A = \varepsilon b c$) ในการคำนวณความขุ่น $\text{OD}_{600}$ และความเข้มข้นเซลล์</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ส่องกล้อง $100\times$ Oil Immersion ปรับคอนเดนเซอร์ และทำความสะอาดเลนส์อย่างถูกต้อง</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> วัดค่าการดูดกลืนแสงด้วยสเปกโทรโฟโตมิเตอร์ และสร้างกราฟมาตรฐานการเจริญเติบโตของเชื้อ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch11_s1.jpg" alt="กล้องจุลทรรศน์ 100x Oil และสเปกโทรโฟโตมิเตอร์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> OPTICAL &amp; PHOTOMETRIC ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">กล้องจุลทรรศน์ $100\times$ Oil และเครื่องวัดค่า $\text{OD}_{600}$</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในการส่องดูเซลล์แบคทีเรียย้อมสีแกรมที่กำลังขยาย $1{,}000\times$ การใช้เลนส์แห้งธรรมดาจะทำให้ลำแสงหักเหหนีออกสู่อากาศเพราะดัชนีหักเหของแก้วสไลด์ ($n = 1.518$) ต่างจากอากาศ ($n = 1.000$) การหยด <strong>น้ำมันแช่เลนส์ (Immersion Oil, $n = 1.518$)</strong> เชื่อมระหว่างสไลด์กับหน้าเลนส์จะทำให้แสงเดินทางตรงเข้าสู่เลนส์ได้ครบถ้วน เพิ่มค่า Numerical Aperture ($\text{NA}$) เป็น $1.25$ ทำให้แยกแยะจุดสองจุดที่ห่างกันเพียง $0.2\ \mu\text{m}$ ได้อย่างคมชัด
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ขีดจำกัดแอบบี (แสงขาว)</span>
                                <span>$d_{\min} \approx 0.20\ \mu\text{m}$ ($200\text{ nm}$)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความยาวคลื่นวัดแบคทีเรีย</span>
                                <span>$\lambda = 600\text{ nm}$ ($\text{OD}_{600}$)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Abbe Resolution & Oil -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 font-mono font-bold flex items-center justify-center text-sm border border-indigo-500/30">11.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ขีดจำกัดกำลังแยกแยะของแอบบี (Abbe's Limit of Resolution)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            แอ็นสท์ แอบบี (Ernst Abbe) ได้พิสูจน์ว่า กล้องจุลทรรศน์แบบใช้แสงไม่สามารถแยกรายละเอียดของวัตถุที่มีขนาดเล็กกว่าความยาวคลื่นแสงครึ่งหนึ่งได้ โดยระยะห่างสั้นที่สุดระหว่างสองจุดที่กล้องยังมองเห็นแยกเป็นสองจุดได้ ($d$) คำนวณได้จาก:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-indigo-300 text-sm">
                            $$d = \frac{\lambda}{2 \cdot \text{NA}} = \frac{\lambda}{2 n \sin\alpha}$$
                        </div>
                        <p class="text-xs text-slate-400">
                            <strong>ผลของการหยดน้ำมันแช่เลนส์:</strong> เมื่อใส่ Immersion Oil ($n = 1.518$) แทนอากาศ ($n = 1.000$) ค่า $\text{NA}$ จะเพิ่มขึ้นจาก $0.95$ เป็น $1.25\text{--}1.40$ ส่งผลให้ค่า $d$ เล็กลง (กำลังแยกแยะดีขึ้น) ทำให้เรามองเห็นรูปร่างแบคทีเรีย เช่น แบคทีเรียรูปท่อน (Bacillus) หรือรูปกลม (Coccus) ได้อย่างแจ่มชัด
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch11_s2.jpg" alt="การทำงานของเลนส์น้ำมัน 100x Oil" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 11.1: ทางเดินแสงผ่านน้ำมันแช่เลนส์ $n=1.518$ ป้องกันการสะท้อนกลับหมดที่ผิวสัมผัส
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: Beer-Lambert Law -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">กฎเบียร์-แลมเบิร์ต (Beer-Lambert Law)</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการการดูดกลืนแสงและความขุ่นเซลล์ ($A = \varepsilon b c$)
                        </span>
                        <div class="p-4 bg-slate-900/90 rounded-xl border border-indigo-500/30 text-center font-mono text-lg text-indigo-300">
                            $$A = \log\left(\frac{I_0}{I}\right) = \varepsilon \cdot b \cdot c$$
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $A$ คือค่าการดูดกลืนแสง (Absorbance หรือ $\text{OD}$), $\varepsilon$ คือสภาพดูดกลืนโมลาร์, $b$ คือความหนาคิวเวตต์ ($1.0\text{ cm}$) และ $c$ คือความเข้มข้นเซลล์
                        </p>
                    </div>

                    <!-- Linearity Range -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-cyan-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-chart-line"></i> ช่วงความถูกต้องเชิงเส้น (Linear Range)
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-indigo-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">ช่วงที่เชื่อถือได้: $\text{OD}_{600} = 0.1\text{--}0.8$</strong>
                            <span>หากสารละลายขุ่นมากจน $\text{OD} > 1.0$ แสงจะเกิดการกระเจิงหลายรอบ (Multiple Scattering) ต้องเจือจาง $1:10$ ก่อนวัด</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">การเซต Blank:</strong>
                            <span>ต้องใช้อาหารเลี้ยงเชื้อเปล่าที่ยังไม่ได้เพาะเชื้อเซตค่าศูนย์ ($\text{OD} = 0.000$) เสมอ</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การคำนวณจำนวนเซลล์แบคทีเรียจากค่า OD600
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> สารแขวนลอยแบคทีเรีย <em>E. coli</em> เจือจาง 5 เท่า แล้วนำไปวัดค่าที่ $\lambda = 600\text{ nm}$ ได้ค่า $\text{OD}_{600} = 0.160$ กำหนดให้ $\text{OD}_{600} = 1.0$ เทียบเท่ากับความหนาแน่น $8.0\times 10^8\ \text{cells/mL}$ จงหาความหนาแน่นของเซลล์ในหลอดเดิม
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: คำนวณความเข้มข้นในหลอดเจือจาง</span>
                            $$c_{\text{diluted}} = 0.160 \times (8.0\times 10^8\ \text{cells/mL})$$
                            $$c_{\text{diluted}} = 1.28\times 10^8\ \text{cells/mL}$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: คูณตัวคูณการเจือจาง (5 เท่า)</span>
                            $$c_{\text{original}} = 1.28\times 10^8 \times 5 = 6.4\times 10^8\ \text{cells/mL}$$
                            <span class="text-slate-400">&bull; ความหนาแน่นเซลล์เดิมเท่ากับ $6.4\times 10^8\ \text{CFU/mL}$</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Spectrophotometer Optics -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 font-mono font-bold flex items-center justify-center text-sm border border-indigo-500/30">11.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">โครงสร้างเชิงแสงของเครื่องสเปกโทรโฟโตมิเตอร์ (Monochromator &amp; Photodiode)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            เครื่องสเปกโทรโฟโตมิเตอร์ประกอบด้วย:
                        </p>
                        <ul class="space-y-2 text-xs">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-lightbulb text-amber-400 mt-0.5"></i>
                                <span><strong>แหล่งกำเนิดแสง (Light Source):</strong> หลอดทังสเตนสำหรับแสงขาว (Vis) และหลอดดิวทีเรียมสำหรับแสงอัลตราไวโอเลต (UV)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-rainbow text-cyan-400 mt-0.5"></i>
                                <span><strong>เกรตติงแยกแสง (Diffraction Grating):</strong> ทำหน้าที่แยกแสงออกเป็นความยาวคลื่นเดี่ยว ($\pm 1\text{ nm}$)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-solar-panel text-emerald-400 mt-0.5"></i>
                                <span><strong>หัวตรวจวัดแสง (Photodetector):</strong> เปลี่ยนพลังงานโฟตอนของแสงที่ทะลุผ่านคิวเวตต์ให้เป็นสัญญาณไฟฟ้า</span>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch11_s3.jpg" alt="การทำงานของสเปกโทรโฟโตมิเตอร์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 11.2: ลำแสงผ่านเกรตติงแยกความยาวคลื่นและคิวเวตต์วัดสารละลายชีวภาพ
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-indigo-400 font-mono font-bold">ArUco Marker ID: 10</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim11_optics_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-indigo-500/30 hover:border-indigo-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Optics &amp; Microscope Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ทดลองหยดน้ำมันแช่เลนส์ 100x สังเกตทางเดินแสง และปรับความยาวคลื่นวัดค่าความขุ่นในสภาพแวดล้อม 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-indigo-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=10" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 10</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 10 เพื่อแสดงกล้องจุลทรรศน์และลำแสง 100x Oil ลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab11_optics.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 11</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการวัดค่า OD600 สร้างกราฟการเติบโตของแบคทีเรีย และส่งรายงานออนไลน์
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-emerald-400 group-hover:translate-x-1 transition-transform">
                            กรอกรายงานออนไลน์ <i class="fas fa-file-alt ml-1.5"></i>
                        </span>
                    </a>
                </div>
            </div>

            <!-- 4. Biosafety Warning Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-rose-950/40 via-slate-900 to-slate-900 border border-rose-500/30 shadow-2xl space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-400 border border-rose-500/30">
                        <i class="fas fa-biohazard text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังในการบำรุงรักษาเลนส์และเครื่องสเปกโทรโฟโตมิเตอร์</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันความเสียหายถาวรต่อชิ้นส่วนเชิงแสงราคาแพง</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-hand-sparkles"></i> เช็ดน้ำมันออกจากเลนส์ 100x ทันทีหลังเลิกใช้งาน
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ห้ามปล่อยให้น้ำมันแช่เลนส์แห้งกรังติดหน้าเลนส์เด็ดขาด เพราะสารทำละลายในน้ำมันจะกัดกาวประสานเลนส์จนหลุด และฝุ่นผงจะเกาะติดจนเลนส์เป็นรอย ให้ใช้กระดาษเช็ดเลนส์ (Lens Paper) ชุบแอลกอฮอล์เช็ดเบาๆ
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-tint-slash"></i> เช็ดด้านนอกคิวเวตต์ให้แห้งสนิทก่อนใส่เครื่อง
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            คิวเวตต์ต้องเช็ดหยดน้ำและรอยนิ้วมือด้วยกระดาษไร้ขุย Kimwipes เสมอ หากมีของเหลวหกเลอะภายในช่องใส่คิวเวตต์ จะกัดกร่อนวงจรและทำให้การอ่านค่าความเข้มแสงคลาดเคลื่อน
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; เทคโนโลยีชีวภาพอุตสาหกรรม
                </span>
                <h3 class="text-xl font-bold text-white">การควบคุมวงจรการเจริญเติบโตของแบคทีเรียในการผลิตวัคซีนด้วยค่า OD600</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    ในโรงงานผลิตวัคซีนและชีววัตถุ การเพาะเลี้ยงแบคทีเรียในถังหมักชีวภาพ (Bioreactor) ขนาด 1,000 ลิตร ต้องติดตามการเจริญเติบโตผ่าน 4 ระยะ: Lag phase, Exponential (Log) phase, Stationary phase และ Death phase โดยติดตั้งโพรบวัดค่า $\text{OD}_{600}$ แบบออนไลน์อัตโนมัติ เพื่อจับจังหวะให้สารกระตุ้นการผลิตโปรตีนวัคซีนในระยะ Mid-log phase พอดี ซึ่งเป็นช่วงที่เซลล์มีอัตราเมแทบอลิซึมสูงสุด ทำให้ได้ผลผลิตวัคซีนคุณภาพสูงและมีประสิทธิภาพสูงสุด
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-indigo-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 11
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การวัดค่าการดูดกลืนแสง OD600 ของแบคทีเรียเทียบกับเวลา</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">เวลาบ่มเชื้อ ($t$)</th>
                                <th class="p-3 text-center">ค่า $\text{OD}_{600}$ (ครั้งที่ 1)</th>
                                <th class="p-3 text-center">ค่า $\text{OD}_{600}$ (ครั้งที่ 2)</th>
                                <th class="p-3 text-center">ค่าเฉลี่ย $\text{OD}_{600}$</th>
                                <th class="p-3 text-center">ระยะการเจริญ (Growth Phase)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">0 ชั่วโมง (Inoculation)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">0.050</td>
                                <td class="p-3 text-center text-slate-400 font-sans">Lag Phase</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">2 ชั่วโมง</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">0.240</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">Log Phase (เจริญทวีคูณ)</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">4 ชั่วโมง</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">0.780</td>
                                <td class="p-3 text-center text-amber-400 font-sans">Late Log Phase</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                        <i class="fas fa-question-circle text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">แบบทดสอบประเมินตนเองประจำบท (OBE Self-Quiz)</h3>
                        <p class="text-xs text-slate-400 font-mono">วัดผลลัพธ์การเรียนรู้ CLO1 &bull; CLO2 &bull; CLO3</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Q1 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 1: เหตุใดการใช้น้ำมันแช่เลนส์ (Immersion Oil) จึงช่วยเพิ่มกำลังแยกแยะของกล้องจุลทรรศน์ได้?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพราะน้ำมันมีดัชนีหักเหเท่ากับแก้วสไลด์ ($n = 1.518$) ทำให้แสงไม่หักเหสูญเสียออกสู่อากาศ</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ค่า $\text{NA}$ จะเพิ่มขึ้นจาก $0.95$ เป็น $1.25$ ทำให้ขีดจำกัดแอบบี ($d = \lambda / 2\text{NA}$) เล็กลง จึงแยกแยะภาพแบคทีเรียได้คมชัดขึ้น
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: ตามกฎเบียร์-แลมเบิร์ต ค่าการดูดกลืนแสง (Absorbance, A) แปรผันตรงกับปริมาณใด?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ความเข้มข้นหรือความหนาแน่นของเซลล์จุลินทรีย์ในสารละลาย ($A \propto c$)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เมื่อเซลล์มีความเข้มข้นมากขึ้น จะขวางกั้นและกระเจิงแสงมากขึ้น ทำให้แสงทะลุผ่านน้อยลง ค่าการดูดกลืนแสงจึงสูงขึ้น
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: หากค่า $\text{OD}_{600}$ ของน้ำเลี้ยงเชื้อมีค่าสูงถึง 1.800 นักศึกษาควรดำเนินการอย่างไรเพื่อให้ได้ผลที่แม่นยำ?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เจือจางสารละลาย (เช่น 1:10) ให้ค่าอยู่ในช่วงเชิงเส้น ($0.1\text{--}0.8$) แล้วค่อยคำนวณย้อนกลับ</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ที่ค่า $\text{OD} > 1.0$ กฎของเบียร์-แลมเบิร์ตจะเบี่ยงเบนจากเส้นตรงเนื่องจากการกระเจิงแสงซ้ำซ้อน ทำให้ค่าที่อ่านได้ต่ำกว่าความเป็นจริง
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch10_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 10: ไฟฟ้าและเจลอิเล็กโทรโฟเรซิส
                </a>
                <a href="ch12_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-indigo-500 to-rose-600 hover:from-indigo-400 hover:to-rose-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-indigo-500/20">
                    บทที่ 12: ฟิสิกส์นิวเคลียร์และการทำลายเชื้อจุลินทรีย์ <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>