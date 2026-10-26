<?php
$pageTitle = "บทที่ 5: โมเมนตัมและการชนในระดับเซลล์";
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
                <span class="text-amber-400">บทที่ 5</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-purple-400 font-mono text-xs mb-4 border border-purple-500/30 bg-purple-500/10 tracking-widest uppercase shadow-lg shadow-purple-500/10">
                <i class="fas fa-bullseye text-xs"></i> MODULE 05 &bull; MOMENTUM &amp; CELL LYSIS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                โมเมนตัมและการชนในระดับเซลล์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การอนุรักษ์โมเมนตัม แรงดลจากการชนของเม็ดบีดส์ในเครื่อง Vortex และฟิสิกส์การทำลายผนังเซลล์ (Cell Lysis) เพื่อสกัดดีเอ็นเอ
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 4
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-500/10 via-slate-800/40 to-slate-900 border border-purple-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center text-purple-400 border border-purple-500/30">
                        <i class="fas fa-atom text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-purple-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายความสัมพันธ์ระหว่างโมเมนตัม ($p = mv$), การดล และแรงกระแทก ($F_{\text{impact}}$) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-purple-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายกลไกทางฟิสิกส์ของการใช้เม็ดบีดส์ (Bead Beating) ในการสลายผนังเซลล์แบคทีเรียและยีสต์</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ปฏิบัติการใช้เครื่องผสมสาร Vortex Mixer และ Shaker ได้อย่างปลอดภัยและถูกวิธี</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> วิเคราะห์การถ่ายเทพลังงานจลน์จากการชนและบันทึกผลการทดลองได้อย่างถูกต้อง</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch05_s1.jpg" alt="เครื่อง Vortex Mixer และการชนระดับเซลล์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY INSTRUMENT ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">เครื่องผสมสาร Vortex Mixer และเทคนิค Bead Beating</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในการสกัดดีเอ็นเอและโปรตีนจากจุลินทรีย์ที่มีผนังเซลล์หนา (เช่น แบคทีเรียแกรมบวก ยีสต์ หรือสปอร์ของเชื้อรา) การใช้สารเคมีเพียงอย่างเดียวมักไม่เพียงพอ นักจุลชีววิทยาจึงใช้เครื่อง Vortex Mixer ผสมกับเม็ดบีดส์แก้วหรือเซอร์โคเนีย (Zirconia Beads) ขนาดเล็ก ให้เกิดการชนด้วยความเร็วสูง ถ่ายโอนโมเมนตัมและสร้างแรงกระแทกเฉือนเพื่อทำลายโครงสร้างเพปทิโดไกลแคนของผนังเซลล์
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความถี่การสั่น</span>
                                <span>$0\text{--}3{,}000\text{ RPM}$ ($50\text{ Hz}$)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ขนาดเม็ดบีดส์</span>
                                <span>$0.1\text{ mm}$ (แบคทีเรีย) / $0.5\text{ mm}$ (ยีสต์)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Momentum & Impulse -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 font-mono font-bold flex items-center justify-center text-sm border border-purple-500/30">5.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">โมเมนตัม การดล และฟิสิกส์การทำลายผนังเซลล์ (Cell Lysis)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            <strong>โมเมนตัม ($\vec{p} = m\vec{v}$)</strong> คือสภาพการเคลื่อนที่ของวัตถุ มีหน่วยเป็น $\text{kg}\cdot\text{m/s}$ เมื่อเม็ดบีดส์มวล $m$ พุ่งชนผนังเซลล์ด้วยความเร็ว $v$ แล้วกระดอนกลับ โมเมนตัมจะเกิดการเปลี่ยนแปลง ($\Delta p = m\Delta v$)
                        </p>
                        <p>
                            ตามกฎข้อที่ 2 ของนิวตัน แรงกระแทกที่กระทำต่อผนังเซลล์สัมพันธ์กับเวลาการชนดังสมการ:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-amber-300 text-sm">
                            $$F_{\text{impact}} = \frac{\Delta p}{\Delta t}$$
                        </div>
                        <p class="text-xs text-slate-400">
                            <strong>หัวใจฟิสิกส์:</strong> การชนของเม็ดบีดส์แข็งเกิดขึ้นในเสี้ยววินาที ($\Delta t \approx 10^{-6}\text{ s}$) เมื่อตัวหาร $\Delta t$ น้อยมาก แรงกระแทก $F_{\text{impact}}$ จึงมีค่าสูงมหาศาลจนสามารถฉีกขาดพันธะโควาเลนต์ของผนังเซลล์ได้ทันที!
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch05_s2.jpg" alt="การชนของเม็ดบีดส์กับการสลายเซลล์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 5.1: การถ่ายทอดโมเมนตัมจากการชนของเม็ดบีดส์ทำให้เกิดแรงเฉือนทำลายผนังเซลล์
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
                    <span class="text-xs text-slate-400 font-mono">สามเหลี่ยมช่วยจำโมเมนตัมและแรงดล</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Triangle Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 text-center space-y-2">
                        <div class="text-sm font-bold text-slate-200">สามเหลี่ยมช่วยจำโมเมนตัม ($p = mv$)</div>
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-purple-500/30 inline-block font-mono text-center">
                            <div class="text-amber-400 font-black text-xl border-b border-slate-700 pb-1 px-8 mb-1">โมเมนตัม $p$ ($\text{kg}\cdot\text{m/s}$)</div>
                            <div class="text-cyan-400 font-bold text-base pt-1">มวล $m \times$ ความเร็ว $v$</div>
                        </div>
                        <p class="text-xs text-slate-400 mt-2">
                            ความเร็วเพิ่ม 2 เท่า &rarr; โมเมนตัมเพิ่ม 2 เท่า &rarr; พลังงานจลน์ ($E_k = \frac{1}{2}mv^2$) พุ่ง 4 เท่า!
                        </p>
                    </div>

                    <!-- Rule Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-emerald-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-shield-alt"></i> การเลือกขนาดเม็ดบีดส์ตามขนาดเซลล์
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-slate-700/40 text-slate-300">
                            <strong class="text-cyan-400 block mb-1">แบคทีเรีย ($1\text{--}2\ \mu\text{m}$):</strong>
                            <span>ใช้บีดส์แก้วขนาดเล็ก $0.1\text{ mm}$ เพื่อเพิ่มความถี่ในการชน ($Collision Frequency$)</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-slate-700/40 text-slate-300">
                            <strong class="text-purple-400 block mb-1">ยีสต์และสปอร์รา ($5\text{--}10\ \mu\text{m}$):</strong>
                            <span>ใช้บีดส์เซอร์โคเนียขนาด $0.5\text{ mm}$ ซึ่งมีมวลมากกว่า เพื่อสร้างแรงกระแทก ($F_{\text{impact}}$) ที่สูงขึ้น</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: แรงกระแทกของเม็ดบีดส์สลายเซลล์
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เม็ดบีดส์ขนาดเล็กมวล $m = 2.0\times 10^{-6}\text{ kg}$ เคลื่อนที่ด้วยความเร็ว $v = 5.0\text{ m/s}$ พุ่งชนผนังเซลล์และหยุดนิ่งภายในเวลา $\Delta t = 1.0\times 10^{-5}\text{ s}$ จงหาโมเมนตัมก่อนชน และแรงกระแทกเฉลี่ยที่กระทำต่อผนังเซลล์
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: หาโมเมนตัม ($p = mv$)</span>
                            $$p = (2.0\times 10^{-6}\text{ kg}) \times (5.0\text{ m/s})$$
                            $$p = 1.0\times 10^{-5}\text{ kg}\cdot\text{m/s}$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: หาแรงกระแทก ($F = \Delta p / \Delta t$)</span>
                            $$F = \frac{1.0\times 10^{-5}\text{ kg}\cdot\text{m/s}}{1.0\times 10^{-5}\text{ s}} = 1.0\text{ N}$$
                            <span class="text-slate-400">&bull; แรง 1.0 N บนพื้นที่ผิวระดับไมครอน ก่อให้เกิดความดันมหาศาลนับร้อยบรรยากาศ!</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Laboratory Mixing -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 font-mono font-bold flex items-center justify-center text-sm border border-purple-500/30">5.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การควบคุมพลังงานจลน์และการป้องกันความร้อนทำลายดีเอ็นเอ</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            การชนของเม็ดบีดส์อย่างต่อเนื่องทำให้เกิดการเปลี่ยนรูปของพลังงานกลไปเป็น<strong>พลังงานความร้อน</strong> หากอุณหภูมิในหลอดสูงเกิน $65^\circ\text{C}$ จะทำให้โครงสร้างเกลียวคู่ของ DNA คลายตัว (Denaturation) และเอนไซม์เสียสภาพ
                        </p>
                        <p class="text-xs text-slate-400">
                            <strong>เคล็ดลับในห้องแล็บ:</strong> ในการสกัดสารพันธุกรรม นักจุลชีววิทยาจะทำการ Vortex สลับกับแช่บนน้ำแข็ง (Ice Bath) ครั้งละ 30 วินาที เพื่อระบายความร้อนสะสมและรักษาคุณภาพของโมเลกุลชีวภาพ
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch05_s3.jpg" alt="การทดลองการชนและการสลายเซลล์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 5.2: การควบคุมการสั่นผสมสารในหลอดไมโครทิวบ์เพื่อการสลายเซลล์ที่มีประสิทธิภาพ
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-purple-950/60 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-purple-400 font-mono font-bold">ArUco Marker ID: 4</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim05_momentum_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Momentum &amp; Lysis Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                จำลองการชนแบบยืดหยุ่นและไม่ยืดหยุ่นของเม็ดบีดส์กับผนังเซลล์ และวัดแรงกระแทกเฉือนแบบ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=4" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-cyan-500/30 hover:border-cyan-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 4</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 4 เพื่อแสดงแบบจำลองเม็ดบีดส์สั่นชนผนังเซลล์ลอยบนโต๊ะแล็บ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-cyan-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab05_momentum.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 5</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการชน การวัดเวลา และการคำนวณประสิทธิภาพการสลายเซลล์ส่งเข้าฐานข้อมูลกลาง
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยในการใช้ Vortex กับเชื้อโรคก่อโรค (BSL-2)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันความดันสะสมและฝาหลอดเปิดออกเอง</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-exclamation-circle"></i> ปิดฝาหลอดไมโครทิวบ์ให้สนิทและใช้ Cap Lock
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            แรงสั่นสะเทือนและความดันอากาศภายในหลอดที่เพิ่มขึ้นระหว่าง Vortex อาจทำให้ฝาหลอดดีดเปิดออกเอง ทำให้สารละลายเชื้อโรคกระเด็นใส่ผู้ทดลอง ต้องใช้อุปกรณ์ล็อกฝา (Cap Lock) เสมอ
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-shield-virus"></i> Vortex ในตู้ชีวนิรภัย (BSC) เมื่อใช้เชื้อเสี่ยง
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            หากตัวอย่างเป็นเชื้อแบคทีเรียก่อโรคทางเดินหายใจ (เช่น <em>Mycobacterium tuberculosis</em>) ต้องนำเครื่อง Vortex เข้าไปใช้งานภายในตู้ Biosafety Cabinet คลาส II เท่านั้น
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; จีโนมิกส์และนิติวิทยาศาสตร์
                </span>
                <h3 class="text-xl font-bold text-white">การสกัดดีเอ็นเอจากสปอร์เชื้อแอนแทรกซ์ (Bacillus anthracis)</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    สปอร์ของแบคทีเรีย <em>Bacillus anthracis</em> มีเปลือกหุ้มสปอร์หลายชั้น (Exosporium และ Spore Coat) ที่ทนทานต่อสารเคมี ความร้อน และเอนไซม์ไลโซไซม์อย่างยิ่ง ในการตรวจพิสูจน์ทางชีวนิติวิทยาศาสตร์อย่างเร่งด่วน การใช้เทคนิค Bead Beating ด้วยเม็ดบีดส์ซิลิกาความเร็วสูงเป็นวิธีเดียวที่สามารถกระแทกทำลายเปลือกสปอร์ได้อย่างสมบูรณ์ภายในเวลาไม่ถึง 1 นาที เพื่อปลดปล่อยดีเอ็นเอออกมาตรวจยืนยันด้วย Real-Time PCR
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-purple-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 5
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การวัดโมเมนตัมและการอนุรักษ์พลังงาน</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">มวลลูกบีดส์ $m$ ($\text{g}$)</th>
                                <th class="p-3 text-center">ความเร็ว $v$ ($\text{m/s}$)</th>
                                <th class="p-3 text-center">โมเมนตัม $p = mv$ ($\text{kg}\cdot\text{m/s}$)</th>
                                <th class="p-3 text-center">พลังงานจลน์ $E_k$ ($\text{J}$)</th>
                                <th class="p-3 text-center">ประสิทธิผลการสลายเซลล์</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">บีดส์ขนาด $0.1\text{ mm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-purple-400">......</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                                <td class="p-3 text-center text-slate-400 font-sans">สลายแบคทีเรียดีเยี่ยม</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">บีดส์ขนาด $0.5\text{ mm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-purple-400">......</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">สลายยีสต์/สปอร์ราดีเยี่ยม</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 flex items-center justify-center text-purple-400 border border-purple-500/30">
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
                            <span>ข้อที่ 1: เหตุใดการใช้เม็ดบีดส์ขนาดเล็กในเครื่อง Vortex จึงสร้างแรงกระแทกทำลายผนังเซลล์ได้สูงมาก?</span>
                            <i class="fas fa-chevron-down text-purple-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพราะเวลาในการชน ($\Delta t$) สั้นมาก ทำให้แรงดล ($F = \Delta p / \Delta t$) มีค่าสูงมหาศาล</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เมื่อเวลาการกระทบสั้นในระดับไมโครวินาที แรงกระแทกเฉลี่ยจะพุ่งสูงมากจนเอาชนะความแข็งแรงของพันธะในผนังเซลล์ได้
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: หากเพิ่มความเร็วในการสั่นของเครื่อง Vortex เป็น 2 เท่า พลังงานจลน์ของเม็ดบีดส์จะเพิ่มขึ้นกี่เท่า?</span>
                            <i class="fas fa-chevron-down text-purple-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 4 เท่า</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> พลังงานจลน์แปรผันตรงกับกำลังสองของความเร็ว ($E_k = \frac{1}{2}mv^2$) ความเร็วเพิ่ม 2 เท่า พลังงานจึงเพิ่ม $(2)^2 = 4$ เท่า
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ทำไมจึงต้องแช่หลอดสกัดดีเอ็นเอบนน้ำแข็งสลับกับการ Vortex เม็ดบีดส์?</span>
                            <i class="fas fa-chevron-down text-purple-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพื่อระบายความร้อนที่เกิดจากการชน ป้องกันไม่ให้ดีเอ็นเอเสียสภาพ (Denaturation)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> การชนและการเสียดสีเปลี่ยนพลังงานกลเป็นความร้อนสะสม หากอุณหภูมิสูงเกินไปจะทำลายโครงสร้างของดีเอ็นเอและโปรตีน
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch04_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 4: งาน พลังงาน และเครื่องปั่นเหวี่ยง
                </a>
                <a href="ch06_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-400 hover:to-pink-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-purple-500/20">
                    บทที่ 6: สมดุลกล ความดันของไหล และออสโมซิส <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>