<?php
$pageTitle = "บทที่ 10: ไฟฟ้าและเจลอิเล็กโทรโฟเรซิส";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 20%, #1e293b 0%, #020617 85%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center flex-wrap gap-2 text-xs text-slate-400 mb-4 font-mono">
                <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors flex items-center gap-1.5">
                    <i class="fas fa-house"></i> พอร์ทัลหลัก 2027
                </a>
                <span class="text-slate-600">/</span>
                <a href="../index.php" class="hover:text-amber-400 transition-colors flex items-center gap-1">
                    <i class="fas fa-book-open"></i> สารบัญ 13 บทเรียน
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 10</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-yellow-400 font-mono text-xs mb-4 border border-yellow-500/30 bg-yellow-500/10 tracking-widest uppercase shadow-lg shadow-yellow-500/10">
                <i class="fas fa-bolt-lightning text-xs"></i> MODULE 10 &bull; ELECTRICITY &amp; ELECTROPHORESIS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ไฟฟ้าและเจลอิเล็กโทรโฟเรซิส
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                สามเหลี่ยมกฎของโอห์ม ($V = IR$) สนามไฟฟ้าแยกขนาดดีเอ็นเอ ความร้อนจูล และความปลอดภัยในห้องแล็บชีวโมเลกุล
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 9
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-yellow-500/10 via-slate-800/40 to-slate-900 border border-yellow-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-yellow-500/20 flex items-center justify-center text-yellow-400 border border-yellow-500/30">
                        <i class="fas fa-plug text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-yellow-400 mt-1"></i>
                            <span><strong>CLO1:</strong> ใช้สามเหลี่ยมกฎของโอห์ม ($V = IR$) และคำนวณความร้อนจูล ($P = I^2 R$) ในถังอิเล็กโทรโฟเรซิสได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-yellow-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายฟิสิกส์การแยกโมเลกุล DNA ด้วยประจุลบของหมู่ฟอสเฟต ($F_e = qE$) และรูพรุนของเจลอกาโรส</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ปฏิบัติการตั้งค่าแหล่งจ่ายไฟ (Power Supply) และจัดการสารย้อม EtBr และแสง UV อย่างปลอดภัย</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> วิเคราะห์ขนาดแถบ DNA (DNA Ladder) และบันทึกผลการทดลองทางพันธุศาสตร์ได้อย่างถูกต้อง</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch10_s1.jpg" alt="ถังเจลอิเล็กโทรโฟเรซิสและ Power Supply" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MOLECULAR BIOPHYSICS ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">ถังเจลอกาโรส (Agarose Gel Tank) และ Power Supply</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในการตรวจวินิจฉัยสายพันธุ์จุลินทรีย์และการตัดต่อยีน เทคนิค <strong>Agarose Gel Electrophoresis</strong> อาศัยสนามไฟฟ้าดึงดูดชิ้นส่วนดีเอ็นเอที่มีประจุลบสุทธิบนโครงร่างฟอสเฟต ให้เคลื่อนที่ผ่านรูพรุนระดับนาโนเมตรของเจลอกาโรส ชิ้นส่วน DNA ขนาดเล็กจะแทรกผ่านรูพรุนได้รวดเร็วกว่าชิ้นส่วนขนาดใหญ่ ทำให้แยกแบนด์ตามจำนวนคู่เบส (Base Pairs) ได้อย่างแม่นยำ
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">แรงดันไฟฟ้าทำงาน</span>
                                <span>$100\text{--}120\text{ V}$ ($4\text{--}5\text{ V/cm}$)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ทิศทางการวิ่ง</span>
                                <span>จากขั้วลบ (ดำ) &rarr; ขั้วบวก (แดง) "Run to Red"</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Ohm's Law & Buffer Conductivity -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-yellow-500/20 text-yellow-400 font-mono font-bold flex items-center justify-center text-sm border border-yellow-500/30">10.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">กฎของโอห์มและการนำไฟฟ้าของสารละลายบัฟเฟอร์ (TAE/TBE)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            ในถังอิเล็กโทรโฟเรซิส ไอออนในสารละลายบัฟเฟอร์ (เช่น $\text{Tris-Acetate-EDTA}$ หรือ $\text{TAE}$) ทำหน้าที่เป็นตัวนำกระแสไฟฟ้า เมื่อจ่ายแรงดัน $V$ จะมีกระแสไฟฟ้า $I$ ไหลผ่านความต้านทาน $R$ ของเจลและบัฟเฟอร์ตามกฎของโอห์ม:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-yellow-300 text-sm">
                            $$V = I \times R \qquad \text{และ} \qquad I = \frac{V}{R}$$
                        </div>
                        <p class="text-xs text-slate-400">
                            <strong>ความร้อนจูล (Joule Heating):</strong> กำลังไฟฟ้าที่สูญเสียเป็นความร้อนคำนวณได้จาก $P = I^2 R$ หากผสมบัฟเฟอร์เข้มข้นเกินไป ความต้านทาน $R$ จะลดลง กระแส $I$ จะพุ่งสูงขึ้นมากจนเจลร้อนจัดและละลาย แถบดีเอ็นเอจะย้วยไม่คมชัด
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch10_s2.jpg" alt="การเคลื่อนที่ของ DNA ในสนามไฟฟ้า" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 10.1: แรงทางไฟฟ้า $F_e = qE$ ผลักดันชิ้นส่วนดีเอ็นเอประจุลบผ่านรูพรุนเจลอกาโรส
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">สามเหลี่ยมกฎของโอห์ม ($V / I \cdot R$)</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Triangle Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 text-center space-y-2">
                        <div class="text-sm font-bold text-slate-200">สามเหลี่ยมช่วยจำกฎของโอห์ม ($V = IR$)</div>
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-yellow-500/30 inline-block font-mono text-center">
                            <div class="text-yellow-400 font-black text-2xl border-b border-slate-700 pb-1 px-10 mb-1">ความต่างศักย์ $V$ (โวลต์)</div>
                            <div class="text-cyan-400 font-bold text-lg pt-1">กระแส $I$ (แอมแปร์) $\times$ ต้านทาน $R$ (โอห์ม)</div>
                        </div>
                        <p class="text-xs text-slate-400 mt-2">
                            ปิด $V$ จะได้ $I \times R$ &bull; ปิด $I$ จะได้ $V / R$ &bull; ปิด $R$ จะได้ $V / I$
                        </p>
                    </div>

                    <!-- DNA Migration Rules -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-emerald-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-dna"></i> กฎการเคลื่อนที่ของดีเอ็นเอในเจล
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-cyan-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">1. อัตราเร็วผกผันกับขนาดชิ้นส่วน ($v \propto 1 / \log(\text{bp})$):</strong>
                            <span>ชิ้นสั้น (เช่น $200\text{ bp}$) ลอดรูพรุนง่าย วิ่งไปข้างหน้าได้ไกลที่สุด</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-purple-500/30 text-slate-200">
                            <strong class="text-purple-400 block mb-1">2. ความเข้มข้นของเจลอกาโรส (% Agarose):</strong>
                            <span>เจล $1.0\%$ เหมาะกับ DNA $500\text{--}5{,}000\text{ bp}$, เจล $2.0\%$ เหมาะกับชิ้นเล็ก $100\text{--}1{,}000\text{ bp}$</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: กระแสและความร้อนในถังเจล
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> ถังเจลมีสารละลายบัฟเฟอร์ความต้านทาน $R = 2{,}000\ \Omega$ ถ้าตั้งแรงดันไฟฟ้าที่ $V = 100\text{ V}$ จงหาปริมาณกระแสไฟฟ้าที่ไหลผ่านในหน่วยมิลลิแอมแปร์ ($\text{mA}$) และกำลังความร้อนที่เกิดขึ้นในหน่วยวัตต์ ($\text{W}$)
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-yellow-400 font-bold block mb-1">ขั้นที่ 1: หากระแสไฟฟ้า ($I = V / R$)</span>
                            $$I = \frac{100\text{ V}}{2{,}000\ \Omega} = 0.050\text{ A} = 50\text{ mA}$$
                            <span class="text-slate-400">&bull; กระแสไฟฟ้าอ่านได้ $50\text{ mA}$ อยู่ในช่วงปลอดภัย</span>
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: หากำลังความร้อน ($P = VI$)</span>
                            $$P = (100\text{ V}) \times (0.050\text{ A}) = 5.0\text{ W}$$
                            <span class="text-slate-400">&bull; เกิดความร้อน 5.0 วัตต์ บัฟเฟอร์จะแค่อุ่นขึ้นเล็กน้อย</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Visualization with UV -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-yellow-500/20 text-yellow-400 font-mono font-bold flex items-center justify-center text-sm border border-yellow-500/30">10.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การเรืองแสงและการส่องตรวจแบนด์ DNA ด้วยรังสี UV</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            โมเลกุลดีเอ็นเอใสไม่มีสี จึงต้องอาศัยสีย้อมเรืองแสง (Fluorescent Dye) เช่น <strong>Ethidium Bromide (EtBr)</strong> หรือสีรุ่นใหม่ที่ปลอดภัยกว่าอย่าง <strong>GelRed</strong> เข้าไปแทรกตัวระหว่างคู่เบส (Intercalation)
                        </p>
                        <p>
                            เมื่อนำเจลไปวางบนตู้ <strong>UV Transilluminator ($\lambda = 302\text{--}365\text{ nm}$)</strong> โมเลกุลของสีย้อมจะดูดกลืนพลังงานโฟตอนของแสง UV แล้วคายแสงเรืองสีส้มสว่างสดใส ($\lambda \approx 590\text{ nm}$) ออกมา ทำให้มองเห็นตำแหน่งแบนด์ดีเอ็นเอได้อย่างคมชัด
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch10_s3.jpg" alt="แถบ DNA เรืองแสงใต้แสง UV" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 10.2: แถบดีเอ็นเอ DNA Ladder เรืองแสงสีส้มใต้รังสี UV บนถาดเจลอกาโรส
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-yellow-950/60 via-slate-900 to-slate-900 border border-yellow-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-yellow-500/20 text-yellow-300 border border-yellow-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-yellow-400 font-mono font-bold">ArUco Marker ID: 9</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim10_electrophoresis_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-yellow-500/30 hover:border-yellow-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-yellow-500/20 text-yellow-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Electrophoresis Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ปรับแรงดันโวลต์ สังเกตการแยกแบนด์ DNA Ladder และเปิดแสง UV ส่องตรวจในสภาพแวดล้อม 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-yellow-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=9" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 9</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 9 เพื่อแสดงถังเจลและแบนด์ดีเอ็นเอเรืองแสงสีส้มลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab10_electricity.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 10</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการวัดระยะทางแบนด์ DNA เปรียบเทียบกับ DNA Ladder และส่งรายงานให้อาจารย์ตรวจ
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวัง: ไฟฟ้าแรงดันสูงและสารก่อมะเร็ง Ethidium Bromide</h3>
                        <p class="text-xs text-rose-300 font-mono">มาตรฐานความปลอดภัยขั้นสูงในห้องปฏิบัติการอณูชีววิทยา</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-bolt"></i> อันตรายจากไฟฟ้าดูด 100V+ ในน้ำ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ห้ามจุ่มมือลงในถังเจลหรือเปิดฝาครอบขณะที่เปิดสวิตช์ Power Supply อยู่เด็ดขาด ต้องปิดสวิตช์และดึงปลั๊กขั้วต่อออกก่อนหยิบจับถาดเจลทุกครั้ง
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-radiation"></i> ป้องกันสารก่อมะเร็ง EtBr และรังสี UV
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            สีย้อม EtBr เป็นสารก่อกลายพันธุ์ ต้องสวมถุงมือไนไตรล์เสมอ และขณะส่องไฟ UV ต้องสวมหน้ากากป้องกันรังสี UV เพื่อไม่ให้เป็นอันตรายต่อกระจกตาและผิวหนัง
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; ระบาดวิทยาโมเลกุล
                </span>
                <h3 class="text-xl font-bold text-white">การตรวจสอบสายพันธุ์อหิวาตกโรคระบาดด้วยลายพิมพ์ดีเอ็นเอ (DNA Fingerprinting)</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    เมื่อเกิดการระบาดของโรคอหิวาตกโรคในพื้นที่ชุมชน นักระบาดวิทยาจะแยกเชื้อ <em>Vibrio cholerae</em> จากผู้ป่วยและแหล่งน้ำ แล้วนำมาตัดชิ้นส่วนดีเอ็นเอด้วยเอนไซม์ตัดจำเพาะ จากนั้นนำไปแยกด้วยเทคนิค Pulsed-Field Gel Electrophoresis (PFGE) ลวดลายแถบดีเอ็นเอที่ปรากฏเปรียบเสมือนบาร์โค้ดพันธุกรรมประจำตัวเชื้อ หากแบนด์ของเชื้อจากผู้ป่วยตรงกับแบนด์ของเชื้อในแหล่งน้ำ จะสามารถยืนยันต้นตอการแพร่ระบาดได้อย่างถูกต้องแม่นยำ
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-yellow-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 10
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การวัดระยะทางเคลื่อนที่ของชิ้นส่วน DNA ($V = 100\text{ V}$)</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ขนาดชิ้นส่วน DNA (bp)</th>
                                <th class="p-3 text-center">ระยะทางที่วิ่งได้ $d$ ($\text{cm}$)</th>
                                <th class="p-3 text-center">เวลาในการรัน ($t$)</th>
                                <th class="p-3 text-center">อัตราเร็วเฉลี่ย ($\text{cm/min}$)</th>
                                <th class="p-3 text-center">ความคมชัดของแถบ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">$2{,}000\text{ bp}$ (ชิ้นใหญ่)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">$45\text{ นาที}$</td>
                                <td class="p-3 text-center text-yellow-400">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">คมชัด</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$500\text{ bp}$ (ชิ้นกลาง)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">$45\text{ นาที}$</td>
                                <td class="p-3 text-center text-yellow-400">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">คมชัด</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$100\text{ bp}$ (ชิ้นเล็ก)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">$45\text{ นาที}$</td>
                                <td class="p-3 text-center text-yellow-400">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">วิ่งไกลสุด</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-yellow-500/20 flex items-center justify-center text-yellow-400 border border-yellow-500/30">
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
                            <span>ข้อที่ 1: เหตุใดโมเลกุลดีเอ็นเอจึงเคลื่อนที่เข้าหาขั้วบวก (Anode) เสมอในสนามไฟฟ้า?</span>
                            <i class="fas fa-chevron-down text-yellow-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพราะโครงสร้างสายดีเอ็นเอมีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) ซึ่งมีประจุไฟฟ้าลบสุทธิ</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ตามกฎของแรงไฟฟ้า ประจุลบจะถูกแรงไฟฟ้าผลักออกจากขั้วลบ (Cathode) และถูกดึงดูดเข้าหาขั้วบวก (Anode)
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: หากเพิ่มความต่างศักย์ไฟฟ้าขึ้นเป็น 2 เท่า ความร้อนจูลที่เกิดขึ้นในถังเจลจะเพิ่มขึ้นกี่เท่า?</span>
                            <i class="fas fa-chevron-down text-yellow-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 4 เท่า</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> กำลังความร้อนจูลแปรผันตามกำลังสองของแรงดัน ($P = V^2 / R$) เมื่อ $V$ เพิ่ม 2 เท่า ความร้อนจะเพิ่มขึ้น $(2)^2 = 4$ เท่า
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ระหว่าง DNA ชิ้นส่วน 200 bp กับ 2,000 bp ชิ้นส่วนใดจะเคลื่อนที่ไปได้ไกลกว่ากันในเวลาเท่ากัน?</span>
                            <i class="fas fa-chevron-down text-yellow-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ชิ้นส่วนขนาด 200 bp</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ชิ้นส่วนขนาดเล็กมีแรงต้านการเสียดทานจากรูพรุนของเจลน้อยกว่า จึงเคลื่อนที่ผ่านตาข่ายเจลอกาโรสได้เร็วกว่า
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch09_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 9: อุณหพลศาสตร์และหม้อนึ่ง Autoclave
                </a>
                <a href="ch11_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-yellow-500 to-indigo-600 hover:from-yellow-400 hover:to-indigo-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-yellow-500/20">
                    บทที่ 11: ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรี <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>