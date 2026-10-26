<?php
$pageTitle = "บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์";
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
                <span class="text-amber-400">บทที่ 1</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-amber-400 font-mono text-xs mb-4 border border-amber-500/30 bg-amber-500/10 tracking-widest uppercase shadow-lg shadow-amber-500/10">
                <i class="fas fa-microscope text-xs"></i> MODULE 01 &bull; UNITS &amp; MEASUREMENTS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ระบบหน่วยและการวัดในโลกจุลทรรศน์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การแปลงหน่วยคำอุปสรรคระดับไมโครและนาโน ความแม่นยำของเครื่องชั่งดิจิทัล และฟิสิกส์การควบคุมไมโครปิเปต P1000 ในงานจุลชีววิทยา
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 0
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-amber-500/10 via-slate-800/40 to-slate-900 border border-amber-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center text-amber-400 border border-amber-500/30">
                        <i class="fas fa-graduation-cap text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายระบบหน่วยเอสไอและคำอุปสรรคระบุขนาดแบคทีเรีย ยีสต์ ไวรัส และสารละลายได้ถูกต้อง</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO2:</strong> แปลงหน่วย $\text{mm} \leftrightarrow \mu\text{m} \leftrightarrow \text{nm}$ และ $\text{mL} \leftrightarrow \mu\text{L}$ ด้วยเทคนิคบันไดขั้นละ 1,000</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-cyan-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ใช้งานเวอร์เนียร์ ไมโครมิเตอร์ เครื่องชั่ง 4 ตำแหน่ง และไมโครปิเปตตามหลักความปลอดภัยและจริยธรรม</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> คำนวณเปอร์เซ็นต์ความคลาดเคลื่อนและบันทึกผลการทดลองทางวิทยาศาสตร์อย่างเที่ยงตรง</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch01_s1.jpg" alt="เครื่องมือวัดในห้องปฏิบัติการจุลชีววิทยา" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY INSTRUMENT ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">ไมโครปิเปต P1000 และเครื่องชั่งดิจิทัล 4 ตำแหน่ง</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในงานจุลชีววิทยา สิ่งมีชีวิตที่เราศึกษา เช่น แบคทีเรีย <em>Escherichia coli</em> มีขนาดเฉลี่ยเพียง $2\ \mu\text{m}$ และไวรัสมีขนาดเพียง $20\text{--}300\text{ nm}$ การเตรียมสารละลายอาหารเลี้ยงเชื้อและเอนไซม์ดีเอ็นเอต้องการความแม่นยำระดับไมโครลิตร ($\mu\text{L}$) หากใช้ปิเปตผิดสเกล ปริมาณเชื้อจะคลาดเคลื่อนทันทีนับ 10 ถึง 1,000 เท่า
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ช่วงปริมาตร P1000</span>
                                <span>$100\text{--}1{,}000\ \mu\text{L}$ ($0.1\text{--}1.0\text{ mL}$)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความละเอียดเครื่องชั่ง</span>
                                <span>$0.0001\text{ g}$ ($0.1\text{ mg}$)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: SI Units & Scale -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 font-mono font-bold flex items-center justify-center text-sm border border-amber-500/30">1.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ความสำคัญของระบบหน่วยเอสไอและคำอุปสรรคในงานจุลชีววิทยา</h2>
                </div>
                <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                    ระบบหน่วยระหว่างชาติ หรือ <strong>ระบบหน่วยเอสไอ (SI Units)</strong> เป็นมาตรฐานสากลที่ทำให้นักจุลชีววิทยาทั่วโลกสามารถเปรียบเทียบผลการวิจัยได้อย่างถูกต้องตรงกัน โดยปริมาณฐานที่ใช้งานบ่อยที่สุดในห้องปฏิบัติการ ได้แก่ ความยาวในหน่วย<strong>เมตร ($\text{m}$)</strong>, มวลในหน่วย<strong>กิโลกรัม ($\text{kg}$)</strong>, เวลาในหน่วย<strong>วินาที ($\text{s}$)</strong> และอุณหภูมิในหน่วย<strong>เคลวิน ($\text{K}$)</strong> ซึ่งสัมพันธ์กับองศาเซลเซียสด้วยสูตร $T_{\text{K}} = T_{\text{C}} + 273.15$
                </p>

                <!-- Table 1.1: SI Prefixes -->
                <div class="overflow-x-auto rounded-2xl border border-slate-800 shadow-xl">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800/80 text-slate-200 font-mono text-xs uppercase border-b border-slate-700">
                            <tr>
                                <th class="p-3.5">คำอุปสรรค</th>
                                <th class="p-3.5 text-center">สัญลักษณ์</th>
                                <th class="p-3.5 text-center">ตัวคูณหน่วยฐาน</th>
                                <th class="p-3.5">ตัวอย่างการใช้งานจริงในห้องแล็บจุลชีววิทยา</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/60 font-sans">
                            <tr class="hover:bg-slate-800/40">
                                <td class="p-3.5 font-bold text-amber-400">มิลลิ- (milli-)</td>
                                <td class="p-3.5 text-center font-mono">$\text{m}$</td>
                                <td class="p-3.5 text-center font-mono">$10^{-3}\ (1/1{,}000)$</td>
                                <td class="p-3.5">วัดขนาดโคโลนีแบคทีเรียบนจานวุ้น ($1\text{--}5\text{ mm}$), ตวงอาหารเหลว ($5\text{--}10\text{ mL}$)</td>
                            </tr>
                            <tr class="hover:bg-slate-800/40">
                                <td class="p-3.5 font-bold text-cyan-400">ไมโคร- (micro-)</td>
                                <td class="p-3.5 text-center font-mono">$\mu$</td>
                                <td class="p-3.5 text-center font-mono">$10^{-6}\ (1/1{,}000{,}000)$</td>
                                <td class="p-3.5">วัดขนาดเซลล์ <em>E. coli</em> ($1\text{--}2\ \mu\text{m}$), ปริมาตรดูดไมโครปิเปต P1000 ($100\text{--}1{,}000\ \mu\text{L}$)</td>
                            </tr>
                            <tr class="hover:bg-slate-800/40">
                                <td class="p-3.5 font-bold text-purple-400">นาโน- (nano-)</td>
                                <td class="p-3.5 text-center font-mono">$\text{n}$</td>
                                <td class="p-3.5 text-center font-mono">$10^{-9}\ (1/10^9)$</td>
                                <td class="p-3.5">ขนาดแบคทีริโอฟาจ T4 และไวรัส ($20\text{--}300\text{ nm}$), ความยาวคลื่นแสงสเปกโตร ($\lambda = 600\text{ nm}$)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">เทคนิคบันไดขั้นละ 1,000 เท่า</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Step diagram -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-amber-400 font-bold text-sm mb-2 flex items-center gap-2">
                            <i class="fas fa-layer-group"></i> กฎทองของการแปลงหน่วยบันไดขั้นละ 1,000
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-slate-700/40 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">เดินลงบันได (หน่วยใหญ่ &rarr; หน่วยเล็ก): คูณ $1{,}000$</strong>
                            <span>เลื่อนจุดทศนิยมไปทางขวา 3 ตำแหน่ง เช่น $1\text{ mL} = 1{,}000\ \mu\text{L}$</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-slate-700/40 text-slate-200">
                            <strong class="text-cyan-400 block mb-1">เดินขึ้นบันได (หน่วยเล็ก &rarr; หน่วยใหญ่): หาร $1{,}000$</strong>
                            <span>เลื่อนจุดทศนิยมไปทางซ้าย 3 ตำแหน่ง เช่น $250\ \mu\text{L} = 0.250\text{ mL}$</span>
                        </div>
                    </div>

                    <!-- Density Formula Triangle -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 text-center">
                        <div class="text-sm font-bold text-slate-200 mb-1">สามเหลี่ยมช่วยจำความหนาแน่นน้ำบริสุทธิ์ ($\rho = m/V$)</div>
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-indigo-500/20 inline-block text-center font-mono">
                            <div class="text-amber-400 font-black text-xl border-b-2 border-slate-700 pb-1 px-8 mb-1">มวล $m$ ($\text{mg}$ หรือ $\text{g}$)</div>
                            <div class="text-cyan-400 font-bold text-lg pt-1">ความหนาแน่น $\rho \times$ ปริมาตร $V$</div>
                        </div>
                        <p class="text-xs text-slate-400">
                            สำหรับน้ำกลั่นบริสุทธิ์: $1\ \mu\text{L} \approx 1\text{ mg}$ และ $1\text{ mL} = 1{,}000\ \mu\text{L} \approx 1.0000\text{ g}$
                        </p>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การเตรียมปฏิกิริยา PCR
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> นักศึกษาต้องการดูดสารละลายบัฟเฟอร์ปริมาตร $0.05\text{ mL}$ เพื่อทำ PCR และสังเกตเห็นแบคทีเรียยาว $4.5\ \mu\text{m}$ จงหาว่าต้องตั้งค่าไมโครปิเปตเป็นกี่ $\mu\text{L}$ และแบคทีเรียตัวนี้ยาวกี่ $\text{nm}$
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 1: แปลงปริมาตร $\text{mL} \rightarrow \mu\text{L}$</span>
                            <span>เดินลงบันได 1 ขั้น (คูณ 1,000):</span><br>
                            $$V = 0.05\text{ mL} \times 1{,}000 = 50\ \mu\text{L}$$
                            <span class="text-slate-400">&bull; ตั้งค่าหน้าปัดไมโครปิเปตที่ $050$</span>
                        </div>
                        <div>
                            <span class="text-cyan-400 font-bold block mb-1">ขั้นที่ 2: แปลงความยาว $\mu\text{m} \rightarrow \text{nm}$</span>
                            <span>เดินลงบันได 1 ขั้น (คูณ 1,000):</span><br>
                            $$L = 4.5\ \mu\text{m} \times 1{,}000 = 4{,}500\text{ nm}$$
                            <span class="text-slate-400">&bull; แบคทีเรียยาว 4,500 นาโนเมตร</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Significant Figures & Calibration -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 font-mono font-bold flex items-center justify-center text-sm border border-amber-500/30">1.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ความแม่น ความเที่ยง และการสอบเทียบไมโครปิเปต</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            ในการทำงานวิจัยทางจุลชีววิทยา <strong>ความแม่น (Accuracy)</strong> หมายถึงความใกล้เคียงของค่าที่วัดได้กับค่าจริงมาตรฐาน ส่วน <strong>ความเที่ยง (Precision)</strong> หมายถึงความสามารถในการวัดซ้ำแล้วได้ค่าเดิมสม่ำเสมอ
                        </p>
                        <p>
                            เราสามารถสอบเทียบ (Calibration) ไมโครปิเปตได้โดยการชั่งมวลน้ำกลั่นบริสุทธิ์บนเครื่องชั่ง 4 ตำแหน่งที่อุณหภูมิ $20^\circ\text{C}$ ($\rho = 0.9982\text{ g/cm}^3 \approx 1.000\text{ g/mL}$) และคำนวณร้อยละความคลาดเคลื่อน:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-amber-300">
                            $$\text{Percent Error} = \frac{|\text{ค่ามวลที่วัดได้} - \text{ค่ามาตรฐาน}|}{\text{ค่ามาตรฐาน}} \times 100\%$$
                        </div>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch01_s3.jpg" alt="การสอบเทียบไมโครปิเปต" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 1.2: การกดไมโครปิเปต 2 จังหวะและการตรวจสอบน้ำหนักหยดน้ำกลั่นบนเครื่องชั่งละเอียด 4 ตำแหน่ง
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-cyan-950/60 via-slate-900 to-slate-900 border border-cyan-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-cyan-500/20 text-cyan-300 border border-cyan-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-cyan-400 font-mono font-bold">ArUco Marker ID: 0</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim_micropipette_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-cyan-500/30 hover:border-cyan-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Micropipette Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                จำลองการหมุนสเกล P1000 กลไกลูกสูบ 2 จังหวะ และการดูดถ่ายสารละลายเสมือนจริงบนเบราว์เซอร์
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-cyan-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=0" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 0</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องกล้องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 0 เพื่อแสดงโมเดลไมโครปิเปตลอย 3 มิติพร้อมเสียงบรรยาย
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab01_measurement.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 1</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการทดลองชั่งน้ำหนักไมโครปิเปต คำนวณความคลาดเคลื่อน และส่งรายงานให้อาจารย์ตรวจ
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังเพื่อความปลอดภัยและป้องกันอุปกรณ์เสียหาย (Biosafety Warning)</h3>
                        <p class="text-xs text-rose-300 font-mono">มาตรฐานความปลอดภัยระดับ BSL-1 และการถนอมลูกสูบไมโครปิเปต</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-exclamation-triangle"></i> ห้ามกดปุ่มเลยจังหวะที่ 1 ขณะดูดของเหลว
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ปุ่มไมโครปิเปตมี 2 จังหวะ จังหวะที่ 1 (First Stop) ใช้ดูดสารละลาย หากเผลอกดถึงจังหวะที่ 2 (Second Stop) จะดูดของเหลวเกินจริงถึง 10–15% และอาจทำให้ของเหลวทะลักเข้าสู่ลูกสูบด้านในเครื่อง
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-ban"></i> ห้ามวางไมโครปิเปตแนวนอนเมื่อมีของเหลวในทิป
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            การวางไมโครปิเปตนอนราบหรือคว่ำลงจะทำให้ของเหลวชีวภาพที่มีเชื้อโรคไหลย้อนเข้าสู่กระบอกลูกสูบ เกิดการปนเปื้อนข้าม (Cross-contamination) และกัดกร่อนชิ้นส่วนโลหะภายใน
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; จุลชีววิทยาการแพทย์
                </span>
                <h3 class="text-xl font-bold text-white">ผลกระทบของความคลาดเคลื่อนในการเจือจางยาปฏิชีวนะต่อค่า MIC</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    ในห้องปฏิบัติการจุลชีววิทยาคลินิกของโรงพยาบาล การทดสอบหาความเข้มข้นต่ำสุดของยาปฏิชีวนะที่สามารถยับยั้งเชื้อได้ (Minimum Inhibitory Concentration หรือ MIC) ต้องอาศัยการเจือจางแบบลำดับส่วน 2 เท่า (Two-fold Serial Dilution) ด้วยไมโครปิเปต P200 หากนักศึกษาใช้เทคนิคดูดสารผิดพลาดเพียง $5\ \mu\text{L}$ ในทุกขั้นตอน ความเข้มข้นของยาในหลอดสุดท้ายจะคลาดเคลื่อนไปมากกว่า 40% ส่งผลให้แพทย์วินิจฉัยความไวของเชื้อดื้อยาผิดพลาด นำไปสู่การสั่งจ่ายยาที่ไม่ได้ผลในการรักษาผู้ป่วย
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-amber-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 1
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">สำหรับนักศึกษาบันทึกค่าจริงในห้องแล็บ</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">รายการวัด</th>
                                <th class="p-3 text-center">ครั้งที่ 1</th>
                                <th class="p-3 text-center">ครั้งที่ 2</th>
                                <th class="p-3 text-center">ครั้งที่ 3</th>
                                <th class="p-3 text-center">ค่าเฉลี่ย</th>
                                <th class="p-3 text-center">หน่วยที่แปลง</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">เส้นผ่านศูนย์กลางจานเพาะเชื้อ ($\text{mm}$)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-amber-400">&mu;m</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">ความหนาแผ่นสไลด์แก้ว ($\text{mm}$)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-amber-400">&mu;m</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">มวลน้ำกลั่นจาก P1000 ($500\ \mu\text{L}$) ($\text{g}$)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-cyan-400">% คลาดเคลื่อน</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center text-amber-400 border border-amber-500/30">
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
                            <span>ข้อที่ 1: แบคทีเรีย <em>Staphylococcus aureus</em> มีขนาดเส้นผ่านศูนย์กลาง $0.8\ \mu\text{m}$ มีค่าเท่ากับกี่นาโนเมตร ($\text{nm}$)?</span>
                            <i class="fas fa-chevron-down text-xs text-amber-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: $800\text{ nm}$</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> จากไมโครเมตร ($\mu\text{m}$) ไปเป็นนาโนเมตร ($\text{nm}$) คือการเดินลงบันได 1 ขั้น นำมาคูณด้วย 1,000 จะได้ $0.8 \times 1{,}000 = 800\text{ nm}$
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: หากต้องการดูดสารละลายปริมาตร $0.45\text{ mL}$ ควรเลือกใช้ไมโครปิเปตขนาดใด และตั้งค่าตัวเลขเท่าใด?</span>
                            <i class="fas fa-chevron-down text-xs text-amber-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ไมโครปิเปต P1000 และตั้งค่าที่ $450\ \mu\text{L}$</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> แปลงมิลลิลิตรเป็นไมโครลิตร $0.45\text{ mL} \times 1{,}000 = 450\ \mu\text{L}$ ซึ่งเกินช่วงความจุของ P200 ($20\text{--}200\ \mu\text{L}$) จึงต้องใช้ P1000 ($100\text{--}1{,}000\ \mu\text{L}$)
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ในการสอบเทียบไมโครปิเปตที่ตั้งไว้ $1{,}000\ \mu\text{L}$ ชั่งมวลน้ำกลั่นได้ $0.9850\text{ g}$ ร้อยละความคลาดเคลื่อนมีค่าเท่าใด?</span>
                            <i class="fas fa-chevron-down text-xs text-amber-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: $1.50\%$</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ค่ามาตรฐานของน้ำบริสุทธิ์ $1{,}000\ \mu\text{L}$ คือ $1.0000\text{ g}$ ความคลาดเคลื่อน $= |0.9850 - 1.0000| / 1.0000 \times 100\% = 0.0150 \times 100\% = 1.50\%$
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="../index.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-th-large"></i> สารบัญหลักสูตร
                </a>
                <a href="ch02_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-400 hover:to-orange-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-orange-500/20">
                    บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>