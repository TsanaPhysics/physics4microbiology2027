<?php
$pageTitle = "บทที่ 6: สมดุลกล ความดันของไหล และออสโมซิส";
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
                <span class="text-amber-400">บทที่ 6</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-pink-400 font-mono text-xs mb-4 border border-pink-500/30 bg-pink-500/10 tracking-widest uppercase shadow-lg shadow-pink-500/10">
                <i class="fas fa-scale-balanced text-xs"></i> MODULE 06 &bull; PRESSURE &amp; OSMOSIS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                สมดุลกล ความดันของไหล และออสโมซิส
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                สมดุลไฮโดรสแตติก ความดันออสโมติกแวนต์ฮอฟฟ์ สภาวะเซลล์เต่งและเหี่ยว (Plasmolysis) และความทนทานของผนังเซลล์เพปทิโดไกลแคน
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 5
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-pink-500/10 via-slate-800/40 to-slate-900 border border-pink-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-pink-500/20 flex items-center justify-center text-pink-400 border border-pink-500/30">
                        <i class="fas fa-tint-slash text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-pink-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายความดันไฮโดรสแตติก ($P = \rho gh$) และความดันออสโมติกตามกฎของแวนต์ฮอฟฟ์ ($\Pi = cRT$) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-pink-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายสภาวะสมดุลออสโมซิสในสารละลาย Isotonic, Hypotonic (Turgor) และ Hypertonic (Plasmolysis)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ส่องกล้องสังเกตการเหี่ยวร่นของเยื่อหุ้มเซลล์ (Plasmolysis) ในสารละลายเกลือเข้มข้นได้อย่างถูกต้อง</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> เชื่อมโยงหลักการออสโมซิสเข้ากับการถนอมอาหารและกลไกการออกฤทธิ์ของยาปฏิชีวนะกลุ่มเพนิซิลลิน</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch06_s1.jpg" alt="ออสโมมิเตอร์และสมดุลแรงดันในเซลล์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY CELLULAR ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">หลอดออสโมมิเตอร์และความดันเต่ง (Turgor Pressure)</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ไซโทพลาซึมภายในเซลล์แบคทีเรียมีความเข้มข้นของสารละลายสูงกว่าสิ่งแวดล้อมภายนอกเสมอ ส่งผลให้น้ำมีแนวโน้มออสโมซิสไหลเข้าสู่เซลล์อย่างต่อเนื่อง ทำให้เกิดความดันเต่งภายในเซลล์ (Turgor Pressure) สูงถึง <strong>2–5 บรรยากาศ (Atmospheres)</strong> ในแบคทีเรียแกรมลบ และสูงถึง <strong>20 บรรยากาศ</strong> ในแบคทีเรียแกรมบวก โครงสร้างผนังเซลล์เพปทิโดไกลแคนจึงทำหน้าที่เหมือนโครงเหล็กค้ำจุนไม่ให้เซลล์แตกสลาย
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความดันเต่ง E. coli</span>
                                <span>$2\text{--}4\ \text{atm}$ (ประมาณยางรถยนต์!)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">สารละลายไอโซโทนิก</span>
                                <span>$0.85\%\text{ NaCl}$ (Normal Saline)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Osmotic States -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-pink-500/20 text-pink-400 font-mono font-bold flex items-center justify-center text-sm border border-pink-500/30">6.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">สภาวะออสโมซิส 3 รูปแบบในโลกจุลินทรีย์</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-cyan-400 font-bold text-xs font-mono block">ISOTONIC &bull; สารละลายเท่ากัน</span>
                        <h4 class="font-bold text-white text-sm">สมดุลน้ำเข้า-ออก</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ความเข้มข้นสารละลายภายนอกเท่ากับภายในเซลล์ อัตราการแพร่ของน้ำเข้าและออกจากเซลล์มีค่าเท่ากัน เซลล์คงรูปร่างปกติ (เช่น ใน $0.85\%\text{ NaCl}$)
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-emerald-400 font-bold text-xs font-mono block">HYPOTONIC &bull; ภายนอกเจือจาง</span>
                        <h4 class="font-bold text-white text-sm">น้ำไหลเข้า เซลล์เต่ง (Turgid)</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            น้ำออสโมซิสพุ่งเข้าเซลล์ ทำให้เกิดแรงดันเต่ง (Turgor Pressure) ดันผนังเซลล์ให้ตึง แบคทีเรียชอบสภาวะนี้เพราะผนังเซลล์ป้องกันการแตกสลายได้
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/30 space-y-2">
                        <span class="text-rose-400 font-bold text-xs font-mono block">HYPERTONIC &bull; ภายนอกเข้มข้น</span>
                        <h4 class="font-bold text-white text-sm">น้ำไหลออก พลาสโมไลซิส (Plasmolysis)</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            น้ำออสโมซิสออกจากเซลล์ เยื่อหุ้มเซลล์เหี่ยวร่นหลุดจากผนังเซลล์ เมแทบอลิซึมหยุดชะงัก (หัวใจของการถนอมอาหารด้วยเกลือและน้ำตาลเข้มข้น)
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: Van 't Hoff's Law -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">กฎของแวนต์ฮอฟฟ์ (Van 't Hoff Law)</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการความดันออสโมติก (Osmotic Pressure)
                        </span>
                        <div class="p-4 bg-slate-900/90 rounded-xl border border-pink-500/30 text-center font-mono text-lg text-pink-300">
                            $$\Pi = c R T$$
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $\Pi$ คือความดันออสโมติก ($\text{Pa}$ หรือ $\text{atm}$), $c$ คือความเข้มข้นสารละลาย ($\text{mol/m}^3$), $R$ คือค่าคงที่ของก๊าซ ($8.314\text{ J/mol}\cdot\text{K}$) และ $T$ คืออุณหภูมิสัมบูรณ์ ($\text{K}$)
                        </p>
                    </div>

                    <!-- Proportional Rule -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-pink-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-arrow-up-right-dots"></i> กฎการเทียบสัดส่วนตรง: $\Pi \propto c$
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-pink-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">ความเข้มข้นสารละลายสูง &rarr; แรงดูดน้ำออสโมติกสูง!</strong>
                            <span>เมื่อใส่เกลือหรือน้ำตาลเข้มข้นในอาหาร น้ำในเซลล์จุลินทรีย์จะถูกดูดออกไปหาความเข้มข้นสูงอย่างรวดเร็ว</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">ความดันไฮโดรสแตติกของเหลว:</strong>
                            <span>$P = \rho g h$ (ความสูงลำน้ำในหลอดออสโมมิเตอร์จะดันต้านจนกระทั่งสมดุล $P = \Pi$)</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: ความดันออสโมติกในไซโทพลาซึมแบคทีเรีย
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เซลล์แบคทีเรียมีสารละลายภายในเข้มข้นรวมเทียบเท่า $c = 300\text{ mol/m}^3$ ($0.30\text{ M}$) ที่อุณหภูมิร่างกาย $37^\circ\text{C}$ ($T = 310\text{ K}$) จงคำนวณความดันออสโมติกภายในเซลล์ (ใช้ $R = 8.314\text{ J/mol}\cdot\text{K}$)
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: แทนค่าลงในสูตร $\Pi = cRT$</span>
                            $$\Pi = (300\text{ mol/m}^3) \times (8.314\text{ J/mol}\cdot\text{K}) \times (310\text{ K})$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: รวมผลลัพธ์และแปลงเป็นบรรยากาศ</span>
                            $$\Pi \approx 773{,}200\text{ Pa} \approx 7.63\text{ atm}$$
                            <span class="text-slate-400">&bull; ความดันสูงถึง 7.63 บรรยากาศ จึงต้องอาศัยผนังเซลล์ค้ำจุนไว้</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Plasmolysis & Microscopy -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-pink-500/20 text-pink-400 font-mono font-bold flex items-center justify-center text-sm border border-pink-500/30">6.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การสังเกตปรากฏการณ์พลาสโมไลซิสภายใต้กล้องจุลทรรศน์</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            เมื่อหยดสารละลายโซเดียมคลอไรด์เข้มข้น $10\%\text{ NaCl}$ ลงบนสไลด์แบคทีเรียหรือเซลล์พืช น้ำจะไหลออกจากไซโทพลาซึมอย่างรวดเร็ว ทำให้เยื่อหุ้มเซลล์เหี่ยวร่นแยกตัวออกจากผนังเซลล์อย่างเห็นได้ชัด
                        </p>
                        <p class="text-xs text-slate-400">
                            <strong>การฟื้นตัว (Deplasmolysis):</strong> หากรีบหยดน้ำกลั่นหรือสารละลาย Isotonic เข้าไปทดแทน น้ำจะออสโมซิสกลับเข้าสู่เซลล์และทำให้เซลล์กลับมาเต่งสมบูรณ์ได้อีกครั้งหากเซลล์ยังไม่ตาย
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch06_s2.jpg" alt="พลาสโมไลซิสใต้กล้องจุลทรรศน์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 6.1: เยื่อหุ้มเซลล์เหี่ยวร่น (Plasmolysis) เมื่ออยู่ในสภาวะความดันออสโมติกภายนอกสูง
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-pink-950/60 via-slate-900 to-slate-900 border border-pink-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-pink-500/20 text-pink-300 border border-pink-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-pink-400 font-mono font-bold">ArUco Marker ID: 5</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim06_osmosis_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-pink-500/30 hover:border-pink-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-pink-500/20 text-pink-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Osmosis &amp; Pressure Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ปรับความเข้มข้นสารละลายภายนอก สังเกตการไหลของน้ำผ่านเยื่อเลือกผ่าน และการเต่ง/เหี่ยวของเซลล์ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-pink-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=5" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 5</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 5 เพื่อแสดงหลอดออสโมมิเตอร์และโมเลกุลน้ำออสโมซิสลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab06_equilibrium.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 6</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการทดลองวัดความดันไฮโดรสแตติกและปรากฏการณ์ออสโมซิสส่งอาจารย์ผ่านระบบดิจิทัล
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวัง: ปรากฏการณ์ช็อกออสโมติก (Osmotic Shock Lysis)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันเซลล์แตกสลายก่อนทำการทดลอง</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-ban"></i> ห้ามล้างเซลล์แบคทีเรียไร้ผนังด้วยน้ำกลั่น
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            แบคทีเรียกลุ่มที่ไม่มีผนังเซลล์ (เช่น <em>Mycoplasma</em>) หรือสเฟียโรพลาสต์ (Spheroplasts) หากนำมาล้างด้วยน้ำกลั่นบริสุทธิ์ จะเกิดน้ำทะลักเข้าเซลล์จนระเบิดแตกสลาย (Osmotic Lysis) ทันที ต้องใช้ $0.85\%\text{ NaCl}$ หรือ PBS บัฟเฟอร์เสมอ
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-vial"></i> การเตรียมสเมียร์เซลล์เม็ดเลือด
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ในการตรวจตัวอย่างเลือด ต้องระวังไม่ให้ถูกเจือจางด้วยน้ำเปล่า เพราะเม็ดเลือดแดงจะแตกสลาย (Hemolysis) จนมองไม่เห็นโครงสร้างเซลล์ภายใต้กล้องจุลทรรศน์
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; เภสัชวิทยาและจุลชีววิทยาการแพทย์
                </span>
                <h3 class="text-xl font-bold text-white">กลไกยาปฏิชีวนะกลุ่มเพนิซิลลินกับการใช้แรงดันเต่งระเบิดเซลล์แบคทีเรีย</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    ยาปฏิชีวนะกลุ่มเบตา-แลกแทม (Beta-lactams) เช่น เพนิซิลลิน (Penicillin) และอะม็อกซีซิลลิน (Amoxicillin) ออกฤทธิ์โดยไปยับยั้งเอนไซม์ Transpeptidase ที่ทำหน้าที่เชื่อมร่างแหเพปทิโดไกลแคนของผนังเซลล์แบคทีเรีย เมื่อแบคทีเรียแบ่งตัว ผนังเซลล์จะเกิดรูโหว่และสูญเสียความแข็งแรง ทำให้ความดันเต่งภายในเซลล์ที่สูงถึง 3–5 บรรยากาศ ดันน้ำทะลักเข้าสู่เซลล์จนกระทั่งเซลล์แบคทีเรียแตกกระจายตายในที่สุด (Lysis) ซึ่งเป็นตัวอย่างคลาสสิกของการใช้หลักการฟิสิกส์ออสโมซิสในการรักษาโรคติดเชื้อ
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-pink-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 6
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การสังเกตพลาสโมไลซิสในสารละลายเกลือความเข้มข้นต่างๆ</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">สารละลายทดสอบ</th>
                                <th class="p-3 text-center">สภาวะทางออสโมซิส</th>
                                <th class="p-3 text-center">ลักษณะเซลล์ที่สังเกตได้</th>
                                <th class="p-3 text-center">ทิศทางการไหลของน้ำ</th>
                                <th class="p-3 text-center">สถานะเซลล์</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">น้ำกลั่นบริสุทธิ์ ($0\%\text{ NaCl}$)</td>
                                <td class="p-3 text-center text-cyan-400 font-sans">Hypotonic</td>
                                <td class="p-3 text-center text-slate-500 font-sans">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">น้ำไหลเข้าเซลล์</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">เซลล์เต่งตึง</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">น้ำเกลือนอร์มัล ($0.85\%\text{ NaCl}$)</td>
                                <td class="p-3 text-center text-amber-400 font-sans">Isotonic</td>
                                <td class="p-3 text-center text-slate-500 font-sans">......</td>
                                <td class="p-3 text-center text-amber-400 font-sans">เข้า-ออกสมดุล</td>
                                <td class="p-3 text-center text-amber-400 font-sans">เซลล์ปกติ</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">น้ำเกลือเข้มข้น ($10.0\%\text{ NaCl}$)</td>
                                <td class="p-3 text-center text-rose-400 font-sans">Hypertonic</td>
                                <td class="p-3 text-center text-slate-500 font-sans">......</td>
                                <td class="p-3 text-center text-rose-400 font-sans">น้ำไหลออกนอกเซลล์</td>
                                <td class="p-3 text-center text-rose-400 font-sans">พลาสโมไลซิส (เหี่ยว)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-pink-500/20 flex items-center justify-center text-pink-400 border border-pink-500/30">
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
                            <span>ข้อที่ 1: เหตุใดอาหารหมักดองเค็มจัดหรือแยมผลไม้หวานจัด จึงสามารถเก็บรักษาไว้ได้นานโดยไม่บูดเสีย?</span>
                            <i class="fas fa-chevron-down text-pink-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เป็นสภาวะ Hypertonic ทำให้น้ำในเซลล์จุลินทรีย์ถูกดูดออกจนเกิด Plasmolysis และหยุดเจริญ</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ความเข้มข้นเกลือหรือน้ำตาลที่สูงมากดึงน้ำออกจากเซลล์จุลินทรีย์ ทำให้เอนไซม์ไม่สามารถทำงานได้และเซลล์หยุดการเจริญเติบโต
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: โครงสร้างใดของแบคทีเรียที่ทำหน้าที่ต้านแรงดันเต่ง (Turgor Pressure) ไม่ให้เซลล์แตกสลายในน้ำเจือจาง?</span>
                            <i class="fas fa-chevron-down text-pink-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ผนังเซลล์เพปทิโดไกลแคน (Peptidoglycan Cell Wall)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เพปทิโดไกลแคนเป็นโครงข่ายโพลีเมอร์ที่เหนียวแน่นและแข็งแกร่ง สามารถรองรับแรงดันเต่งได้สูงหลายบรรยากาศ
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ความเข้มข้นของสารละลายโซเดียมคลอไรด์ที่เป็น Isotonic กับเซลล์สัตว์และแบคทีเรียส่วนใหญ่คือเท่าใด?</span>
                            <i class="fas fa-chevron-down text-pink-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: $0.85\% - 0.90\%\text{ w/v}$ (Normal Saline)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> สารละลายน้ำเกลือความเข้มข้นนี้มีความดันออสโมติกเท่ากับของเหลวในเซลล์ ทำให้น้ำเข้าและออกจากเซลล์ด้วยอัตราเท่ากัน เซลล์จึงไม่เต่งหรือเหี่ยว
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch05_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 5: โมเมนตัมและการชน
                </a>
                <a href="ch07_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-400 hover:to-rose-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-pink-500/20">
                    บทที่ 7: งาน พลังงาน และ ATP Synthase <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>