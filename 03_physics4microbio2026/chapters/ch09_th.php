<?php
$pageTitle = "บทที่ 9: อุณหพลศาสตร์และหม้อนึ่ง Autoclave / PCR";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 9</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-orange-400 font-mono text-xs mb-4 border border-orange-500/30 bg-orange-500/10 tracking-widest uppercase shadow-lg shadow-orange-500/10">
                <i class="fas fa-fire-flame-curved text-xs"></i> MODULE 09 &bull; THERMODYNAMICS &amp; STERILIZATION
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                อุณหพลศาสตร์และหม้อนึ่ง Autoclave / PCR
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                ความร้อนแฝงของไอน้ำอิ่มตัว ความดันไอ $15\text{ psi}$ จุดเดือด $121^\circ\text{C}$ และฟิสิกส์การถ่ายเทความร้อนในเครื่อง PCR
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 8
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-orange-500/10 via-slate-800/40 to-slate-900 border border-orange-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center text-orange-400 border border-orange-500/30">
                        <i class="fas fa-temperature-high text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-orange-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายความร้อนแฝงการกลายเป็นไอ ($Q = mL_v$) และความสัมพันธ์ระหว่างความดันกับจุดเดือดได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-orange-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายเหตุผลที่ไอน้ำอิ่มตัว $121^\circ\text{C}$ ฆ่าสปอร์ได้ดีกว่าลมร้อน $160^\circ\text{C}$ (Hot Air Oven)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ปฏิบัติการใช้งานหม้อนึ่งความดันไอและเครื่อง PCR อย่างปลอดภัยตามเกณฑ์มาตรฐาน</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> คำนวณปริมาณความร้อนใน 3 สเต็ปของวงรอบ PCR ($95^\circ\text{C}, 55^\circ\text{C}, 72^\circ\text{C}$)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch09_s1.jpg" alt="หม้อนึ่งความดันไอ Autoclave และ PCR" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> STERILIZATION &amp; THERMAL ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">หม้อนึ่งความดันไอ (Autoclave) และเครื่อง PCR Thermal Cycler</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            สปอร์ของแบคทีเรีย (Bacterial Endospores เช่น <em>Bacillus</em> และ <em>Clostridium</em>) ทนต่อน้ำเดือดธรรมดา $100^\circ\text{C}$ ได้นานหลายชั่วโมง การกำจัดสปอร์ให้ตายสนิทต้องอาศัย <strong>หม้อนึ่งความดันไอ (Autoclave)</strong> ที่เพิ่มความดันขึ้นเป็น $15\text{ psi}$ ($1\text{ atm}$ เกจ) เพื่อดันจุดเดือดของน้ำขึ้นไปถึง $121^\circ\text{C}$ ปล่อยความร้อนแฝงการควบแน่นมหาศาล $2{,}260\text{ J/g}$ แทรกซึมทำลายโปรตีนและเอนไซม์ของสปอร์จนหมดสิ้นภายใน 15 นาที
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">มาตรฐาน Autoclave</span>
                                <span>$121^\circ\text{C}$ ($250^\circ\text{F}$) ที่ $15\text{ psi}$ นาน $15\text{ นาที}$</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความร้อนแฝงควบแน่น</span>
                                <span>$L_v = 2{,}260\text{ J/g}$ (สูงกว่าน้ำร้อน 5 เท่า)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Pressure & Boiling Point -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 font-mono font-bold flex items-center justify-center text-sm border border-orange-500/30">9.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ความดันไอ จุดเดือด และอุณหพลศาสตร์การฆ่าเชื้อ (Sterilization)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            น้ำเดือดเมื่อ <strong>"ความดันไอของน้ำเท่ากับความดันบรรยากาศภายนอก"</strong> ที่ความดันบรรยากาศปกติ $1\text{ atm}$ ($14.7\text{ psi}$) น้ำจะเดือดที่ $100^\circ\text{C}$
                        </p>
                        <p>
                            เมื่อปิดวาล์วในหม้อ Autoclave ไอน้ำที่ระเหยขึ้นมาจะไม่สามารถหนีออกไปได้ ทำให้ความดันภายในเพิ่มสูงขึ้นเป็น $2\text{ atm}$ (ความดันเกจ $15\text{ psi}$) ส่งผลให้โมเลกุลน้ำต้องใช้พลังงานความร้อนสูงขึ้นจนถึง <strong>$121^\circ\text{C}$</strong> จึงจะเดือดได้
                        </p>
                        <p class="text-xs text-slate-400">
                            <strong>ทำไมไอน้ำจึงมีประสิทธิภาพเหนือกว่าลมร้อน?</strong> เมื่อไอน้ำ $121^\circ\text{C}$ สัมผัสกับภาชนะที่เย็นกว่า มันจะควบแน่นกลับเป็นหยดน้ำทันที พร้อมคาย <strong>"ความร้อนแฝง (Latent Heat)"</strong> ปริมาณมหาศาล $2{,}260\text{ J}$ ต่อไอน้ำทุกๆ 1 กรัม ถ่ายเทพลังงานเข้าสู่ผนังเซลล์ของจุลินทรีย์อย่างรวดเร็ว
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch09_s2.jpg" alt="การทำงานของ Autoclave และการถ่ายเทความร้อน" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 9.1: การควบคุมความดัน $15\text{ psi}$ และการถ่ายเทความร้อนแฝงของไอน้ำอิ่มตัวใน Autoclave
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: Heat Transfer -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">สูตรความร้อนสัมผัสและความร้อนแฝง</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการความร้อน 2 รูปแบบ
                        </span>
                        <div class="p-3 bg-slate-900/90 rounded-xl border border-orange-500/30 text-center font-mono text-sm text-orange-300 space-y-2">
                            <div>$$\text{1. อุณหภูมิเปลี่ยน (ไม่มีเปลี่ยนสถานะ): } Q = mc\Delta T$$</div>
                            <div>$$\text{2. เปลี่ยนสถานะ (อุณหภูมิคงที่): } Q = mL_v$$</div>
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $c_{\text{น้ำ}} = 4.184\text{ J/g}\cdot^\circ\text{C}$ และ $L_v = 2{,}260\text{ J/g}$
                        </p>
                    </div>

                    <!-- PCR Cycle Thermals -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-2 font-mono text-xs">
                        <div class="text-cyan-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-dna"></i> 3 อุณหภูมิหลักของวงรอบ PCR
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-rose-500/30 text-slate-200">
                            <strong class="text-rose-400">1. $95^\circ\text{C}$ (Denaturation):</strong> คลายเกลียวคู่ DNA ตัดพันธะไฮโดรเจน
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-cyan-500/30 text-slate-200">
                            <strong class="text-cyan-400">2. $55^\circ\text{C}$ (Annealing):</strong> ลดอุณหภูมิเพื่อให้ไพรเมอร์เข้าจับจำเพาะ
                        </div>
                        <div class="p-2 rounded bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400">3. $72^\circ\text{C}$ (Extension):</strong> อุณหภูมิทำงานสูงสุดของเอนไซม์ <em>Taq</em> Polymerase
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การถ่ายเทพลังงานความร้อนแฝงของไอน้ำ
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> ในหม้อ Autoclave ไอน้ำมวล $m = 100\text{ g}$ ควบแน่นบนผิวขวดอาหารเลี้ยงเชื้อ จงหาปริมาณความร้อนแฝงที่ปลดปล่อยออกมาเพื่อทำลายจุลินทรีย์ (ใช้ $L_v = 2{,}260\text{ J/g}$)
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: เลือกใช้สูตรความร้อนแฝง ($Q = mL_v$)</span>
                            $$Q = (100\text{ g}) \times (2{,}260\text{ J/g})$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: รวมผลลัพธ์ในหน่วยกิโลจูล ($\text{kJ}$)</span>
                            $$Q = 226{,}000\text{ J} = 226\text{ kJ}$$
                            <span class="text-slate-400">&bull; ปลดปล่อยพลังงานความร้อนสูงถึง 226 kJ จึงฆ่าสปอร์ที่ทนทานได้อย่างรวดเร็ว</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: PCR Thermal Cycler Physics -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 font-mono font-bold flex items-center justify-center text-sm border border-orange-500/30">9.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ฟิสิกส์ของเครื่อง PCR Thermal Cycler และแผ่นเพลเทียร์ (Peltier Element)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            เครื่อง PCR Thermal Cycler ต้องเปลี่ยนอุณหภูมิอย่างรวดเร็ว (Ramp Rate $3\text{--}5^\circ\text{C/s}$) สลับไปมาระหว่าง $95^\circ\text{C}, 55^\circ\text{C}$ และ $72^\circ\text{C}$ จำนวน 30–40 รอบ
                        </p>
                        <p>
                            เทคโนโลยีเบื้องหลังการเปลี่ยนอุณหภูมินี้คือ <strong>แผ่นเพลเทียร์ (Thermoelectric Peltier Element)</strong> ซึ่งใช้ปรากฏการณ์เทอร์โมอิเล็กทริก: เมื่อป้อนกระแสไฟฟ้า ด้านหนึ่งจะร้อนและอีกด้านจะเย็น และเมื่อสลับขั้วไฟฟ้า ทิศทางการถ่ายเทความร้อนจะกลับด้านทันที ทำให้สามารถทำความร้อนและลดอุณหภูมิได้อย่างแม่นยำระดับ $\pm 0.1^\circ\text{C}$
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch09_s3.jpg" alt="เครื่อง PCR และแผ่นเพลเทียร์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 9.2: กราฟวงรอบอุณหภูมิ PCR และบล็อกความร้อนโลหะที่ควบคุมด้วยแผ่นเพลเทียร์
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-orange-950/60 via-slate-900 to-slate-900 border border-orange-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-orange-500/20 text-orange-300 border border-orange-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-orange-400 font-mono font-bold">ArUco Marker ID: 8</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim09_pcr_thermal_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-orange-500/30 hover:border-orange-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D PCR &amp; Autoclave Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                จำลองการเพิ่มความดันไอใน Autoclave และดูกราฟอุณหภูมิ 3 สเต็ปของเครื่อง PCR แบบเรียลไทม์ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-orange-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=8" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 8</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 8 เพื่อดูแบบจำลองหม้อนึ่ง Autoclave พ่นไอน้ำลอย 3 มิติบนโต๊ะแล็บ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab09_heat.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 9</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการวัดความร้อนจำเพาะ การควบแน่น และการตรวจสอบสปอร์ตัวบ่งชี้ส่งอาจารย์
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยขั้นสูงสุด: การใช้งานหม้อนึ่ง Autoclave (Steam Explosion)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันไอน้ำร้อนลวกและการระเบิดของของเหลวล้นเดือด</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-hand-paper"></i> ห้ามเปิดฝาหม้อขณะยังมีแรงดันเกจตกค้าง
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ต้องรอจนกว่าเกจวัดความดันลดลงถึง $0\text{ psi}$ และอุณหภูมิลดลงต่ำกว่า $80^\circ\text{C}$ ก่อนเสมอ หากเปิดฝาขณะมีความดัน ไอน้ำร้อนยวดยิ่งจะพุ่งใส่ใบหน้าและร่างกายก่อให้เกิดแผลไหม้รุนแรง
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-vial"></i> ห้ามปิดฝาขวดแก้วแน่นสนิทก่อนเข้า Autoclave
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ขวดอาหารเลี้ยงเชื้อที่เข้าหม้อนึ่ง ต้องคลายฝาเกลียวออกครึ่งรอบเสมอ เพื่อให้อากาศและไอน้ำถ่ายเทได้ หากปิดฝาแน่น ความดันภายในขวดจะสูงขึ้นจนระเบิดแตกกระจายภายในหม้อ
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; การควบคุมคุณภาพการฆ่าเชื้อในโรงพยาบาล
                </span>
                <h3 class="text-xl font-bold text-white">การตรวจสอบความสมบูรณ์ของการฆ่าเชื้อด้วยแอมพูลสปอร์ Geobacillus stearothermophilus</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    ในศูนย์จ่ายกลางโรงพยาบาล (CSSD) การดูเพียงเกจวัดอุณหภูมิและเทปดัชนีเคมี (Autoclave Tape) ยังไม่เพียงพอต่อการรับรองว่าอุปกรณ์ผ่าตัดปลอดเชื้อจริง ทุกสัปดาห์ต้องใส่หลอดทดสอบชีวภาพ (Biological Indicator) ซึ่งบรรจุสปอร์ที่มีชีวิตของ <em>Geobacillus stearothermophilus</em> จำนวน $10^6$ สปอร์ เข้าไปนึ่งพร้อมอุปกรณ์ สปอร์ชนิดนี้ทนความร้อนสูงเป็นพิเศษ หากนำมาบ่มที่ $55^\circ\text{C}$ นาน 24 ชั่วโมงแล้วน้ำยาไม่เปลี่ยนสี แสดงว่ากระบวนการถ่ายเทความร้อนแฝงของไอน้ำสมบูรณ์แบบและอุปกรณ์ปลอดเชื้อ 100%
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-orange-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 9
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การตรวจวัดอุณหภูมิและความดันของไอน้ำอิ่มตัว</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ระยะเวลา (นาที)</th>
                                <th class="p-3 text-center">ความดันเกจ ($\text{psi}$)</th>
                                <th class="p-3 text-center">อุณหภูมิ ($^\circ\text{C}$)</th>
                                <th class="p-3 text-center">สถานะของไอน้ำ</th>
                                <th class="p-3 text-center">ผลเทปดัชนีความร้อน</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">0 นาที (เริ่มต้น)</td>
                                <td class="p-3 text-center text-slate-500">$0\text{ psi}$</td>
                                <td class="p-3 text-center text-slate-500">$25^\circ\text{C}$</td>
                                <td class="p-3 text-center text-slate-400 font-sans">น้ำเย็น</td>
                                <td class="p-3 text-center text-slate-400 font-sans">แถบสีขาว</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">10 นาที (ไล่อากาศหมด)</td>
                                <td class="p-3 text-center text-slate-500">$5\text{ psi}$</td>
                                <td class="p-3 text-center text-slate-500">$108^\circ\text{C}$</td>
                                <td class="p-3 text-center text-cyan-400 font-sans">ไอน้ำเริ่มอิ่มตัว</td>
                                <td class="p-3 text-center text-slate-400 font-sans">แถบเริ่มเทา</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">20 นาที (สภาวะฆ่าเชื้อ)</td>
                                <td class="p-3 text-center text-orange-400">$15\text{ psi}$</td>
                                <td class="p-3 text-center text-orange-400">$121^\circ\text{C}$</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">ไอน้ำอิ่มตัวสมบูรณ์</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">เปลี่ยนเป็นสีดำสนิท</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center text-orange-400 border border-orange-500/30">
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
                            <span>ข้อที่ 1: เหตุใดไอน้ำอิ่มตัวใน Autoclave ที่ $121^\circ\text{C}$ จึงฆ่าสปอร์ได้ดีกว่าตู้อบลมร้อน (Oven) ที่ $160^\circ\text{C}$?</span>
                            <i class="fas fa-chevron-down text-orange-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ไอน้ำจะควบแน่นและปล่อยความร้อนแฝงมหาศาล ($2,260\text{ J/g}$) แทรกซึมทำลายโปรตีนของสปอร์ทันที</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> อากาศแห้งมีค่าการนำความร้อนต่ำมาก ขณะที่ไอน้ำถ่ายเทความร้อนแฝงได้อย่างรวดเร็วและมีความชื้นช่วยให้โปรตีนเสียสภาพได้ที่อุณหภูมิต่ำกว่า
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: ในกระบวนการ PCR อุณหภูมิ $95^\circ\text{C}$ ในขั้นตอน Denaturation ทำหน้าที่ทางฟิสิกส์เคมีอะไร?</span>
                            <i class="fas fa-chevron-down text-orange-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ทำลายพันธะไฮโดรเจนระหว่างคู่เบสเพื่อแยกสายคู่ DNA ออกเป็นสายเดี่ยว</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> พลังงานความร้อนที่ $95^\circ\text{C}$ สูงพอที่จะตัดพันธะไฮโดรเจนที่ยึดสายดีเอ็นเอออกจากกัน เพื่อให้ไพรเมอร์สามารถเข้าจับได้ในขั้นตอนถัดไป
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: หากเปิดฝาหม้อ Autoclave ทันทีขณะความดันยังอยู่ที่ $5\text{ psi}$ จะเกิดปรากฏการณ์ใดขึ้น?</span>
                            <i class="fas fa-chevron-down text-orange-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ของเหลวในขวดจะเดือดพล่านพุ่งล้นทะลักออกอย่างรุนแรง (Boiling Over / Superheating)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> การลดความดันกะทันหันทำให้จุดเดือดของของเหลวลดลงต่ำกว่าอุณหภูมิปัจจุบันทันที น้ำจึงเดือดระเบิดกลายเป็นไอพุ่งล้นขวด
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch08_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 8: การหมุนและแส้แบคทีเรีย
                </a>
                <a href="ch10_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-yellow-500 hover:from-orange-400 hover:to-yellow-400 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-orange-500/20">
                    บทที่ 10: ไฟฟ้าและเจลอิเล็กโทรโฟเรซิส <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>