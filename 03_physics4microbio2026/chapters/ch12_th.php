<?php
$pageTitle = "บทที่ 12: ฟิสิกส์นิวเคลียร์และการทำลายเชื้อจุลินทรีย์";
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
                <span class="text-amber-400">บทที่ 12</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-rose-400 font-mono text-xs mb-4 border border-rose-500/30 bg-rose-500/10 tracking-widest uppercase shadow-lg shadow-rose-500/10">
                <i class="fas fa-radiation text-xs"></i> MODULE 12 &bull; NUCLEAR &amp; STERILIZATION
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ฟิสิกส์นิวเคลียร์และการทำลายเชื้อจุลินทรีย์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การสลายตัวกัมมันตรังสี กฎกำลังสองผกผัน ค่ารังสีลดเชื้อ $D_{10}$-value และความปลอดภัยทางรังสีวิทยา (ALARA)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 11
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-rose-500/10 via-slate-800/40 to-slate-900 border border-rose-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-400 border border-rose-500/30">
                        <i class="fas fa-shield-halved text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-rose-400 mt-1"></i>
                            <span><strong>CLO1:</strong> คำนวณการสลายตัวตามครึ่งชีวิต ($T_{1/2}$) และกฎกำลังสองผกผัน ($I \propto 1/r^2$) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-rose-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายกลไกการแตกหักของสายดีเอ็นเอด้วยรังสีแกมมา และคำนวณปริมาณรังสีลดเชื้อ $D_{10}$-value</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> อธิบายหลักการป้องกันรังสี ALARA (เวลา ระยะทาง แผ่นกำบัง) และการใช้แผ่นตะกั่ว HVL</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> ปฏิบัติการจำลองการฉายรังสีแกมมาฆ่าเชื้อในเวชภัณฑ์และบันทึกผลการทดลองได้อย่างถูกต้อง</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch12_s1.jpg" alt="ตู้ฉายรังสีโคบอลต์-60 และหัววัด GM Counter" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> NUCLEAR RADIOSTERILIZATION ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">ตู้ฉายรังสี $^{60}\text{Co}$ (Gamma Chamber) และหัววัด GM Counter</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            เวชภัณฑ์ทางการแพทย์ที่ทำจากพลาสติก (เช่น กระบอกฉีดยา หน้ากากอนามัย และจานเพาะเชื้อพลาสติก) ไม่สามารถนึ่งฆ่าเชื้อด้วย Autoclave ได้เพราะพลาสติกจะหลอมละลาย อุตสาหกรรมจึงใช้ <strong>การฉายรังสีแกมมา (Gamma Radiosterilization)</strong> จากไอโซโทปโคบอลต์-60 ($^{60}\text{Co}$) ซึ่งแผ่รังสีโฟตอนพลังงานสูง ($1.17$ และ $1.33\text{ MeV}$) ทะลุผ่านบรรจุภัณฑ์ที่ปิดสนิทเข้าไปแตกตัวไอออนและทำลายสารพันธุกรรมของจุลินทรีย์จนตายสนิท โดยไม่ทำให้วัตถุเกิดความร้อนหรือมีสารกัมมันตรังสีตกค้าง
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ครึ่งชีวิต $^{60}\text{Co}$</span>
                                <span>$T_{1/2} = 5.27\text{ ปี}$</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ปริมาณรังสีปลอดเชื้อ</span>
                                <span>$25\text{ kGy}$ ($2.5\text{ Mrad}$ มาตรฐานสากล)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Half-Life & Inverse Square Law -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-mono font-bold flex items-center justify-center text-sm border border-rose-500/30">12.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การสลายตัวของสารกัมมันตรังสีและกฎกำลังสองผกผัน</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            <strong>ครึ่งชีวิต ($T_{1/2}$):</strong> คือระยะเวลาที่สารกัมมันตรังสีย่อยสลายจนเหลือปริมาณรังสีเพียงครึ่งหนึ่งของเดิม หากเวลาผ่านไป $n$ รอบครึ่งชีวิต ปริมาณรังสีที่เหลือจะเท่ากับ:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-rose-300 text-sm">
                            $$N(t) = N_0 \left(\frac{1}{2}\right)^n \qquad \text{โดย } n = \frac{t}{T_{1/2}}$$
                        </div>
                        <p>
                            <strong>กฎกำลังสองผกผัน (Inverse Square Law):</strong> เมื่อเราถอยห่างจากต้นกำเนิดรังสีเป็นระยะทาง $r$ ความเข้มของรังสี ($I$) จะลดลงตามกำลังสองของระยะทาง:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-yellow-300 text-sm">
                            $$I \propto \frac{1}{r^2} \qquad \text{หรือ} \qquad I_1 r_1^2 = I_2 r_2^2$$
                        </div>
                        <p class="text-xs text-slate-400">
                            <strong>เคล็ดลับความปลอดภัย:</strong> หากถอยห่างออกมาเป็น 2 เท่า ปริมาณรังสีที่ร่างกายได้รับจะลดลงเหลือเพียง $\frac{1}{4}$ และหากถอยห่าง 3 เท่า จะลดลงเหลือเพียง $\frac{1}{9}$ เท่านั้น!
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch12_s2.jpg" alt="การวัดรังสีและแผ่นกำบังตะกั่ว" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 12.1: การแผ่รังสีรอบทิศทางและการลดทอนความเข้มรังสีด้วยแผ่นตะกั่ว HVL
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: D10-Value -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">ค่ารังสีลดเชื้อ $D_{10}$-value</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            นิยามค่า $D_{10}$-value (Decimal Reduction Dose)
                        </span>
                        <div class="p-4 bg-slate-900/90 rounded-xl border border-rose-500/30 text-center font-mono text-base md:text-lg text-rose-300">
                            $$\text{จำนวนรอบลดเชื้อ } m = \frac{\text{ปริมาณรังสีที่ให้ } D}{D_{10}}$$
                            $$\text{เชื้อที่รอด } N = N_0 \times 10^{-m}$$
                        </div>
                        <p class="text-xs text-slate-300">
                            ค่า $D_{10}$ คือปริมาณรังสีที่ทำให้ประชากรจุลินทรีย์ลดลง 90% (ลดลง 1 log cycle เช่น จาก $10^6$ เหลือ $10^5$)
                        </p>
                    </div>

                    <!-- Shielding HVL -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-cyan-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-shield"></i> ความหนาครึ่งค่าของตะกั่ว (Half-Value Layer: HVL)
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-rose-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">แผ่นตะกั่วหนา 1 HVL ($\approx 1.2\text{ cm}$):</strong>
                            <span>ลดทอนความเข้มรังสีแกมมา $^{60}\text{Co}$ ลงเหลือ $50\%$ ของค่าเดิม</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">ใช้ตะกั่วหนา 3 HVL ($3.6\text{ cm}$):</strong>
                            <span>ลดรังสีลงเหลือ $\left(\frac{1}{2}\right)^3 = \frac{1}{8}$ (เหลือเพียง $12.5\%$)</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การคำนวณปริมาณรังสีทำลายเชื้อ Salmonella
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เนื้อไก่สดมีการปนเปื้อนเชื้อ <em>Salmonella</em> จำนวน $N_0 = 1.0\times 10^5\ \text{CFU/g}$ โดยเชื้อนี้มีค่า $D_{10} = 0.5\text{ kGy}$ หากต้องการลดจำนวนเชื้อลงเหลือเพียง $1.0\ \text{CFU/g}$ ต้องฉายรังสีแกมมาเป็นปริมาณกี่กิโลเกรย์ ($\text{kGy}$)?
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: หาจำนวนรอบการลดลงแบบ 10 เท่า ($m$)</span>
                            <span>จาก $10^5$ ลดเหลือ $10^0 = 1$ แสดงว่าต้องลดลง $5\text{ log cycles}$</span>
                            $$m = 5\text{ รอบ}$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: คำนวณปริมาณรังสีรวม ($D = m \times D_{10}$)</span>
                            $$D = 5 \times 0.5\text{ kGy} = 2.5\text{ kGy}$$
                            <span class="text-slate-400">&bull; ปริมาณรังสี 2.5 kGy เพียงพอต่อการกำจัดเชื้อและปลอดภัยต่อคุณภาพอาหาร</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: ALARA Radiation Protection -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-mono font-bold flex items-center justify-center text-sm border border-rose-500/30">12.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">หลักการความปลอดภัยทางรังสีวิทยา (ALARA Principle)</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-amber-400 font-bold text-xs font-mono block">1. TIME &bull; เวลา</span>
                        <h4 class="font-bold text-white text-sm">ใช้เวลาให้น้อยที่สุด</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ปริมาณรังสีที่ร่างกายได้รับสะสมแปรผันตรงกับเวลาการปฏิบัติงาน ($Dose = Rate \times Time$) ทำงานให้รวดเร็วและแม่นยำ
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-cyan-400 font-bold text-xs font-mono block">2. DISTANCE &bull; ระยะห่าง</span>
                        <h4 class="font-bold text-white text-sm">อยู่ให้ไกลที่สุด</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ตามกฎกำลังสองผกผัน การถอยห่างจากต้นกำเนิดรังสีเป็นวิธีป้องกันที่ได้ผลดีที่สุดโดยไม่ต้องลงทุนอุปกรณ์
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-emerald-400 font-bold text-xs font-mono block">3. SHIELDING &bull; แผ่นกำบัง</span>
                        <h4 class="font-bold text-white text-sm">ใช้วัสดุกำบังที่เหมาะสม</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            รังสีแอลฟาใช้กระดาษกั้น, รังสีบีตาใช้พลาสติกหรืออะลูมิเนียม, และรังสีแกมมาต้องใช้ตะกั่วหนาหรือคอนกรีตหนา
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-rose-950/60 via-slate-900 to-slate-900 border border-rose-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-rose-500/20 text-rose-300 border border-rose-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-rose-400 font-mono font-bold">ArUco Marker ID: 11</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim12_radioactivity_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-rose-500/30 hover:border-rose-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Radioactivity Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ทดลองปรับระยะห่าง เพิ่มแผ่นกำบังตะกั่ว และวัดอัตราการสลายตัวของจุลินทรีย์ด้วยหัววัด GM Counter เสมือนจริง
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-rose-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=11" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 11</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 11 เพื่อแสดงแบบจำลองตู้ฉายรังสีโคบอลต์-60 และอนุภาคโฟตอนลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab12_radioactivity.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 12</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการทดลองการลดทอนรังสีของแผ่นตะกั่ว คำนวณค่า HVL และส่งรายงานออนไลน์
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยทางรังสีวิทยา (Radiation Safety Warning)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันอันตรายจากรังสีแตกตัวประจุ (Ionizing Radiation)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-id-badge"></i> ติดแผ่นวัดรังสีประจำตัว (Dosimeter Badge) เสมอ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            เจ้าหน้าที่และนักศึกษาทุกคนที่ปฏิบัติงานในบริเวณที่มีรังสี ต้องติดแผ่นฟิล์มหรือ TLD Badge ที่หน้าอกเพื่อตรวจวัดปริมาณรังสีสะสม ไม่ให้เกินเกณฑ์มาตรฐานสากล ($20\text{ mSv/ปี}$)
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-bell"></i> สัญญาณเตือนภัยและระบบ Interlock
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ห้องฉายรังสีมีระบบ Interlock อัตโนมัติ หากประตูปิดไม่สนิทแท่งรังสีจะไม่ถูกยกขึ้นจากบ่อน้ำ และห้ามเข้าไปในห้องฉายรังสีเด็ดขาดเมื่อสัญญาณไฟสีแดงหมุนเตือน
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; อุตสาหกรรมเครื่องมือแพทย์
                </span>
                <h3 class="text-xl font-bold text-white">การทำให้ปลอดเชื้อในสายสวนหัวใจและลิ้นหัวใจเทียมด้วยรังสีแกมมา</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    อุปกรณ์การแพทย์ขั้นสูง เช่น สายสวนหลอดเลือดหัวใจ (Cardiac Catheter) และลิ้นหัวใจเทียม ทำจากโพลีเมอร์พิเศษและเนื้อเยื่อชีวภาพที่ไม่สามารถทนความร้อนของหม้อนึ่ง Autoclave หรือก๊าซเอทิลีนออกไซด์ (EtO) ที่อาจมีสารพิษตกค้างได้ การฉายรังสีแกมมาปริมาณ $25\text{ kGy}$ ในขั้นตอนสุดท้ายหลังจากบรรจุลงในซองพลาสติกปิดผนึกสองชั้น ช่วยรับประกันความปลอดเชื้อระดับ Sterility Assurance Level (SAL) ที่ $10^{-6}$ (โอกาสพบเชื้อรอดชีวิตน้อยกว่าหนึ่งในล้านชิ้น) พร้อมใช้งานได้ทันทีในห้องผ่าตัด
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-rose-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 12
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การวัดการลดทอนรังสีของแผ่นกำบังตะกั่ว (Lead Shielding)</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ความหนาตะกั่ว $x$ ($\text{cm}$)</th>
                                <th class="p-3 text-center">นับวัดรังสี (CPM ครั้งที่ 1)</th>
                                <th class="p-3 text-center">นับวัดรังสี (CPM ครั้งที่ 2)</th>
                                <th class="p-3 text-center">ค่าเฉลี่ย CPM</th>
                                <th class="p-3 text-center">เปอร์เซ็นต์การทะลุผ่าน (%)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">$0.0\text{ cm}$ (ไม่มีแผ่นกั้น)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-rose-400">4,800 CPM</td>
                                <td class="p-3 text-center text-slate-200">100.0%</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$1.2\text{ cm}$ (1 HVL)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-rose-400">2,410 CPM</td>
                                <td class="p-3 text-center text-amber-400">50.2%</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$2.4\text{ cm}$ (2 HVL)</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-rose-400">1,190 CPM</td>
                                <td class="p-3 text-center text-emerald-400">24.8%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-400 border border-rose-500/30">
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
                            <span>ข้อที่ 1: หากนักศึกษาเดินถอยห่างจากต้นกำเนิดรังสีจากระยะ $1\text{ เมตร}$ ไปเป็น $3\text{ เมตร}$ ความเข้มรังสีที่ได้รับจะลดลงเหลือเท่าใด?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ลดลงเหลือ 1/9 ของค่าเดิม (ลดลงไปเกือบ 90%)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ตามกฎกำลังสองผกผัน ($I \propto 1/r^2$) เมื่อระยะห่างเพิ่ม 3 เท่า ความเข้มรังสีจะลดลงเหลือ $1 / 3^2 = 1/9$
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: วัตถุหรืออาหารที่ผ่านการฉายรังสีแกมมาฆ่าเชื้อแล้ว จะมีสารกัมมันตรังสีตกค้างและแผ่รังสีออกมาหรือไม่?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ไม่มีสารกัมมันตรังสีตกค้าง และไม่แผ่รังสีออกมาเด็ดขาด</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> การฉายรังสีแกมมาเปรียบเสมือนการส่องไฟฉายผ่านวัตถุ รังสีโฟตอนเพียงแค่ถ่ายเทพลังงานเข้าไปทำลายเซลล์แล้วทะลุผ่านไป ไม่ได้เหนี่ยวนำให้เกิดปฏิกิริยานิวเคลียร์ในอาหาร
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: แผ่นกำบังตะกั่วหนา 2 HVL สามารถลดทอนความเข้มของรังสีแกมมาลงได้กี่เปอร์เซ็นต์?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ลดทอนลง 75% (เหลือรังสีทะลุผ่านเพียง 25%)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> 1 HVL ลดเหลือ 50%, 2 HVL จะลดเหลือครึ่งหนึ่งของ 50% คือ 25% แสดงว่าสามารถกักกั้นรังสีไว้ได้ถึง 75%
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch11_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 11: ทัศนศาสตร์และสเปกโทรโฟโตเมตรี
                </a>
                <a href="ch13_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-emerald-500 hover:from-rose-400 hover:to-emerald-400 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/20">
                    บทที่ 13: โครงงานบูรณาการชีวฟิสิกส์และการเกษตรอัจฉริยะ <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>