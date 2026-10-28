<?php
$pageTitle = "บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 2</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-cyan-400 font-mono text-xs mb-4 border border-cyan-500/30 bg-cyan-500/10 tracking-widest uppercase shadow-lg shadow-cyan-500/10">
                <i class="fas fa-location-arrow text-xs"></i> MODULE 02 &bull; VECTORS &amp; BIOMECHANICS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                เวกเตอร์และการเคลื่อนที่ในของเหลว
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การวิเคราะห์เวกเตอร์การกระจัด การว่ายน้ำเข้าหาสารอาหาร (Chemotaxis) ด้วยแฟลกเจลลา และการเคลื่อนที่แบบบราวน์ในอาหารเลี้ยงเชื้อ
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 1
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-cyan-500/10 via-slate-800/40 to-slate-900 border border-cyan-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-400 border border-cyan-500/30">
                        <i class="fas fa-compass text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-cyan-400 mt-1"></i>
                            <span><strong>CLO1:</strong> จำแนกความแตกต่างระหว่างปริมาณสเกลาร์ (ระยะทาง, อัตราเร็ว) กับปริมาณเวกเตอร์ (การกระจัด, ความเร็ว) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-cyan-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายเหตุผลทางฟิสิกส์ว่าทำไมการสั่นแบบบราวน์ (Brownian Motion) จึงมีการกระจัดลัพธ์เป็นศูนย์</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ส่องกล้องแยกแยะการว่ายเคลื่อนที่จริง (True Motility) ออกจากการสั่นแบบบราวน์ได้อย่างถูกต้อง</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> คำนวณอัตราเร็วเฉลี่ย วาดกราฟระยะทางกับเวลา และวิเคราะห์อิทธิพลของอุณหภูมิต่อการแพร่</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch02_s1.jpg" alt="การเคลื่อนที่ของแบคทีเรียและเวกเตอร์การกระจัด" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY BIOMECHANICS ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">สไลด์หยดแขวน (Hanging Drop Slide) และการว่ายน้ำของแบคทีเรีย</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในการตรวจวินิจฉัยจุลชีววิทยา การทดสอบการเคลื่อนที่ (Motility Test) ทำได้โดยส่องดูเซลล์สดในสไลด์หลุมหยดแขวน หากพบเซลล์เคลื่อนที่เป็นแนวตรงชัดเจน แปลว่าแบคทีเรียมีแฟลกเจลลาและว่ายเคลื่อนที่จริง (True Motility) แต่หากพบเซลล์สั่นกระตุกอยู่กับที่ นั่นคือการสั่นแบบบราวน์ (Brownian Motion) ซึ่งไม่มีการนำทางเชิงเวกเตอร์
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความเร็วแบคทีเรีย</span>
                                <span>$20\text{--}40\ \mu\text{m/s}$ (ประมาณ 10–20 เท่าของความยาวตัวต่อวินาที!)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">การกระจัด Brownian</span>
                                <span>$\sum \vec{d} \approx 0$ (ตำแหน่งเฉลี่ยไม่เปลี่ยน)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Scalar vs Vector in Biology -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 font-mono font-bold flex items-center justify-center text-sm border border-cyan-500/30">2.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ปริมาณสเกลาร์และปริมาณเวกเตอร์ในระบบชีวภาพ</h2>
                </div>
                <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                    ปริมาณทางฟิสิกส์ในงานจุลชีววิทยาแบ่งออกเป็น 2 ประเภทหลัก:
                </p>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="p-5 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-amber-400 font-bold text-sm flex items-center gap-2">
                            <i class="fas fa-tag"></i> 1. ปริมาณสเกลาร์ (Scalar Quantity)
                        </span>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ปริมาณที่มีเฉพาะ <strong>"ขนาด"</strong> เพียงอย่างเดียวก็เข้าใจสมบูรณ์ เช่น มวลสารเคมี ($m$), อุณหภูมิการบ่มเชื้อ ($T$), เวลา ($t$), ความหนาแน่นของเซลล์ ($OD_{600}$) และ <strong>ระยะทางตามเส้นทางเดิน ($s$)</strong>
                        </p>
                    </div>
                    <div class="p-5 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-cyan-400 font-bold text-sm flex items-center gap-2">
                            <i class="fas fa-arrows-alt"></i> 2. ปริมาณเวกเตอร์ (Vector Quantity)
                        </span>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ปริมาณที่ต้องระบุทั้ง <strong>"ขนาดและทิศทาง"</strong> ควบคู่กันเสมอ เช่น แรงกระทำ ($\vec{F}$), ความเร็วการว่ายของแบคทีเรีย ($\vec{v}$), ความเร่งหนีศูนย์กลาง ($\vec{a}_c$) และ <strong>การกระจัดจากจุดเริ่มถึงจุดสิ้นสุด ($\vec{d}$)</strong>
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
                    <span class="text-xs text-slate-400 font-mono">สูตรสามเหลี่ยมอัตราเร็วและความเร็ว</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Triangle Diagrams -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 text-center space-y-2">
                        <div class="text-sm font-bold text-slate-200">สามเหลี่ยมช่วยจำ: อัตราเร็ว และ ความเร็ว</div>
                        <div class="flex justify-center gap-6 pt-2">
                            <div class="p-3 rounded-xl bg-slate-900/90 border border-amber-500/30 font-mono text-center">
                                <div class="text-amber-400 font-black text-lg border-b border-slate-700 pb-1 px-4">ระยะทาง $s$</div>
                                <div class="text-slate-300 font-bold text-sm pt-1">อัตราเร็ว $v \times t$</div>
                                <span class="text-[10px] text-amber-400/80 block mt-1">สเกลาร์ (Scalar)</span>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/90 border border-cyan-500/30 font-mono text-center">
                                <div class="text-cyan-400 font-black text-lg border-b border-slate-700 pb-1 px-4">การกระจัด $\vec{d}$</div>
                                <div class="text-slate-300 font-bold text-sm pt-1">ความเร็ว $\vec{v} \times t$</div>
                                <span class="text-[10px] text-cyan-400/80 block mt-1">เวกเตอร์ (Vector)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Equations Explanation -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-2 text-xs font-mono text-slate-300">
                        <div class="text-cyan-400 font-bold text-sm mb-2 flex items-center gap-2">
                            <i class="fas fa-calculator"></i> สมการความสัมพันธ์ 2 รูปแบบ
                        </div>
                        <p class="p-2 rounded bg-slate-900/80 border border-slate-700/40">
                            1. อัตราเร็วเฉลี่ย: $$v = \frac{s}{t} \quad (\text{ระยะทางตามเส้นทางจริง / เวลา})$$
                        </p>
                        <p class="p-2 rounded bg-slate-900/80 border border-slate-700/40">
                            2. ขนาดความเร็วเฉลี่ย: $$|\vec{v}_{\text{avg}}| = \frac{d}{t} \quad (\text{การกระจัดแนวตรง / เวลา})$$
                        </p>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การว่ายน้ำของแบคทีเรีย Pseudomonas
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> แบคทีเรีย <em>Pseudomonas</em> ว่ายน้ำคดเคี้ยวไปมาเป็นระยะทางรวม $s = 150\ \mu\text{m}$ ภายในเวลา $5\text{ วินาที}$ โดยตำแหน่งสุดท้ายอยู่ห่างจากจุดเริ่มต้นในแนวเส้นตรงเป็นระยะกระจัด $d = 90\ \mu\text{m}$ จงหาอัตราเร็วเฉลี่ยและขนาดความเร็วเฉลี่ย
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: หาอัตราเร็วเฉลี่ย ($v = s / t$)</span>
                            $$v = \frac{150\ \mu\text{m}}{5\text{ s}} = 30\ \mu\text{m/s}$$
                            <span class="text-slate-400">&bull; อัตราเร็วตามเส้นทางจริงเท่ากับ $30\ \mu\text{m/s}$</span>
                        </div>
                        <div>
                            <span class="text-cyan-400 font-bold block mb-1">ขั้นที่ 2: หาขนาดความเร็วเฉลี่ย ($|\vec{v}| = d / t$)</span>
                            $$|\vec{v}| = \frac{90\ \mu\text{m}}{5\text{ s}} = 18\ \mu\text{m/s}$$
                            <span class="text-slate-400">&bull; ความเร็วเฉลี่ยในแนวเส้นตรงเท่ากับ $18\ \mu\text{m/s}$</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Run & Tumble vs Brownian Motion -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 font-mono font-bold flex items-center justify-center text-sm border border-cyan-500/30">2.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">กลไกการเคลื่อนที่ของแบคทีเรีย และ Brownian Motion</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            แบคทีเรียที่มีแฟลกเจลลา (เช่น <em>E. coli</em>) เคลื่อนที่ด้วยกลไก <strong>Run and Tumble</strong>:
                        </p>
                        <ul class="space-y-2 text-xs">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-arrow-right text-emerald-400 mt-0.5"></i>
                                <span><strong>ช่วงพุ่งตรง (Run):</strong> มัดแฟลกเจลลาหมุนทวนเข็มนาฬิกา ดันเซลล์พุ่งไปข้างหน้า</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-sync text-amber-400 mt-0.5"></i>
                                <span><strong>ช่วงหมุนสุ่ม (Tumble):</strong> แฟลกเจลลาหมุนตามเข็มนาฬิกา มัดแตกออก ทำให้เซลล์หมุนเปลี่ยนทิศทาง</span>
                            </li>
                        </ul>
                        <p>
                            เมื่อมีสารอาหารดึงดูด (<strong>Chemotaxis</strong>) แบคทีเรียจะยืดเวลาช่วง Run ให้นานขึ้นในทิศทางที่ความเข้มข้นสารอาหารสูงขึ้น ทำให้เกิดการกระจัดลัพธ์มุ่งหน้าสู่แหล่งอาหาร
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch02_s2.jpg" alt="กลไก Run and Tumble และ Brownian Motion" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 2.2: เปรียบเทียบการว่ายน้ำจริงเข้าหาสารอาหาร (Chemotaxis) กับการสั่นสะเทือนแบบบราวน์
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
                    <span class="text-xs text-cyan-400 font-mono font-bold">ArUco Marker ID: 1</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim02_force_vectors_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-cyan-500/30 hover:border-cyan-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Vector &amp; Chemotaxis Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ปรับสนามความเข้มข้นสารอาหาร สังเกตเวกเตอร์แรงและการเคลื่อนที่แบบ Run &amp; Tumble แบบ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-cyan-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=1" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 1</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 1 เพื่อแสดงแบบจำลองแบคทีเรียว่ายน้ำด้วยแฟลกเจลลาลอยบนโต๊ะ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab02_vectors.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 2</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกการทดลองอัตราเร็วการแพร่ของสีย้อมในน้ำเย็น vs น้ำอุ่น และส่งผลการทดลองเข้าสู่ฐานข้อมูล
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยในการส่องสไลด์สด (Wet Mount &amp; Hanging Drop)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันเชื้อมีชีวิตฟุ้งกระจายและปนเปื้อนหน้าเลนส์</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-exclamation-triangle"></i> ระวังหยดเชื้อสัมผัสหน้าเลนส์กล้องจุลทรรศน์
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ในการตรวจเชื้อมีชีวิต ห้ามใช้เลนส์ใกล้วัตถุ 100x Oil ส่องสไลด์หยดแขวนโดยตรง เพราะปลายเลนส์อาจจุ่มโดนหยดเชื้อและทำให้น้ำยาเชื้อโรคเปรอะเปื้อนเลนส์ ให้ใช้กำลังขยาย 40x High Dry เท่านั้น
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-trash-alt"></i> การทิ้งสไลด์สดลงถังขยะติดเชื้อ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            สไลด์และกระจกปิดสไลด์ที่ผ่านการตรวจเชื้อมีชีวิต ต้องแช่ลงในอ่างน้ำยาฆ่าเชื้อ 0.5% Sodium Hypochlorite หรือทิ้งในถังขยะติดเชื้อของมีคม ห้ามล้างน้ำเปล่าทิ้งลงอ่างล้างมือโดยเด็ดขาด
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; จุลชีววิทยาการแพทย์
                </span>
                <h3 class="text-xl font-bold text-white">การเคลื่อนที่แบบฝูง (Swarming Motility) ของ Proteus mirabilis ในทางเดินปัสสาวะ</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    แบคทีเรีย <em>Proteus mirabilis</em> เป็นสาเหตุสำคัญของการติดเชื้อในระบบทางเดินปัสสาวะและสายสวนปัสสาวะ แบคทีเรียชนิดนี้มีความสามารถพิเศษในการเปลี่ยนรูปร่างจากเซลล์เดี่ยวขนาดสั้น กลายเป็นเซลล์ขนาดยาวที่มีแฟลกเจลลาหนาแน่นนับพันเส้น เพื่อรวมกลุ่มกันเคลื่อนที่แบบฝูง (Swarming) ไต่ขึ้นไปตามท่อปัสสาวะต้านกระแสน้ำปัสสาวะ การเข้าใจเวกเตอร์แรงขับเคลื่อนของแฟลกเจลลาช่วยให้นักวิจัยออกแบบพื้นผิวสายสวนที่ลดการยึดเกาะและการเคลื่อนที่ของเชื้อได้
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-cyan-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 2
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การเคลื่อนที่แนวตรงและอัตราเร็วการแพร่</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ระยะทาง $s$ ($\text{cm}$)</th>
                                <th class="p-3 text-center">เวลา ครั้งที่ 1 ($\text{s}$)</th>
                                <th class="p-3 text-center">เวลา ครั้งที่ 2 ($\text{s}$)</th>
                                <th class="p-3 text-center">เวลาเฉลี่ย $t$ ($\text{s}$)</th>
                                <th class="p-3 text-center">อัตราเร็ว $v = s/t$ ($\text{cm/s}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">$10\text{ cm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$20\text{ cm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$30\text{ cm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-400 border border-cyan-500/30">
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
                            <span>ข้อที่ 1: ปริมาณใดต่อไปนี้จัดเป็น "ปริมาณเวกเตอร์" ในงานวิจัยจุลชีววิทยา?</span>
                            <i class="fas fa-chevron-down text-xs text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ความเร็วในการว่ายเข้าหาสารอาหาร ($\vec{v}$) และการกระจัด ($\vec{d}$)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> อุณหภูมิ เวลา และระยะทางตามเส้นทางคดเคี้ยวเป็นปริมาณสเกลาร์ (บอกเฉพาะขนาด) ส่วนความเร็วและการกระจัดต้องบอกทั้งขนาดและทิศทางจึงเป็นเวกเตอร์
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: เหตุใดเซลล์ที่ตายแล้วจึงยังคงสั่นสะเทือนอยู่ภายใต้กล้องจุลทรรศน์ (Brownian Motion)?</span>
                            <i class="fas fa-chevron-down text-xs text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เกิดจากการพุ่งชนอย่างสุ่มของโมเลกุลน้ำที่เคลื่อนที่ด้วยพลังงานความร้อน</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> โมเลกุลน้ำมีพลังงานความร้อนและชนเซลล์ทุกทิศทาง ทำให้เซลล์สั่นอยู่กับที่โดยที่เวกเตอร์การกระจัดลัพธ์เป็นศูนย์ ($\vec{d} \approx 0$)
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: แบคทีเรียว่ายน้ำเป็นระยะทาง $80\ \mu\text{m}$ ในเวลา $2\text{ วินาที}$ มีอัตราเร็วเฉลี่ยเท่าใด?</span>
                            <i class="fas fa-chevron-down text-xs text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: $40\ \mu\text{m/s}$</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ใช้สูตรสามเหลี่ยม $v = s / t = 80\ \mu\text{m} / 2\text{ s} = 40\ \mu\text{m/s}$
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch01_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 1: ระบบหน่วยและการวัด
                </a>
                <a href="ch03_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-cyan-500/20">
                    บทที่ 3: กฎของนิวตันและแรงหนืด <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>