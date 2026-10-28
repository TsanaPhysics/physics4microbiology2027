<?php
$pageTitle = "บทที่ 4: งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 4</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-sync-alt text-xs"></i> MODULE 04 &bull; WORK, ENERGY &amp; CENTRIFUGE
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การอนุรักษ์พลังงานกล การแปลงค่า RPM สู่แรงเหวี่ยงสัมพัทธ์ RCF ($\times g$) และกฎความปลอดภัยในการจัดสมดุลโรเตอร์
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 3
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
                        <i class="fas fa-cogs text-lg"></i>
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
                            <span><strong>CLO1:</strong> อธิบายงาน กำลังไฟฟ้า และการเปลี่ยนรูปพลังงานในอุปกรณ์ห้องแล็บจุลชีววิทยาได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-indigo-400 mt-1"></i>
                            <span><strong>CLO2:</strong> คำนวณแปลงความเร็วรอบ (RPM) เป็นแรงเหวี่ยงสัมพัทธ์ (RCF หรือ $\times g$) ได้อย่างแม่นยำ</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> จัดวางหลอดตัวอย่างในหัวปั่นโรเตอร์ให้เกิดสมดุลสมมาตร ($\sum \vec{F}_c = 0$) เพื่อความปลอดภัย</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> แยกแยะชั้นตะกอนเซลล์ (Pellet) กับส่วนใส (Supernatant) และเขียนรายงานปฏิบัติการได้ถูกต้อง</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch04_s1.jpg" alt="เครื่องปั่นเหวี่ยงความเร็วสูงและโรเตอร์" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY INSTRUMENT ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">เครื่องปั่นเหวี่ยงความเร็วสูง (High-Speed Centrifuge)</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            เซลล์แบคทีเรียมีขนาดเล็กมากจนไม่สามารถตกตะกอนได้ทันเวลาด้วยแรงโน้มถ่วงโลกปกติ ($1\times g$) เครื่องปั่นเหวี่ยงจึงทำหน้าที่สร้างความเร่งสู่ศูนย์กลางมหาศาลนับพันถึงหมื่นเท่า เพื่อบีบอัดเซลล์แบคทีเรียหรือดีเอ็นเอให้กลายเป็นก้อนตะกอนแน่น (Pellet) อยู่ก้นหลอดไมโครทิวบ์ภายในเวลาไม่กี่นาที
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ช่วงแรงเหวี่ยงทั่วไป</span>
                                <span>$2{,}000\text{--}14{,}000 \times g$</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">การจัดสมดุลหลอด</span>
                                <span>ต้องวางตรงข้ามกันเป็นคู่ ($\sum \vec{F}_c = 0$)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Work, Energy & Power -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 font-mono font-bold flex items-center justify-center text-sm border border-indigo-500/30">4.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">งาน พลังงานกล และกำลังไฟฟ้าของเครื่องมือห้องแล็บ</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            ในทางฟิสิกส์ <strong>งาน ($W = Fs$)</strong> เกิดขึ้นเมื่อมีแรงทำให้วัตถุเคลื่อนที่ มีหน่วยเป็น<strong>จูล ($\text{J}$)</strong> และ <strong>กำลัง ($P = W/t$)</strong> คืออัตราการทำงานต่อหน่วยเวลามีหน่วยเป็น<strong>วัตต์ ($\text{W}$ หรือ $\text{J/s}$)</strong>
                        </p>
                        <p>
                            เครื่องปั่นเหวี่ยงเปลี่ยนพลังงานไฟฟ้าที่รับเข้ามา ($E_{\text{elec}} = P \times t$) ไปเป็นพลังงานจลน์การหมุนของโรเตอร์ ($E_k = \frac{1}{2}I\omega^2$) และสูญเสียพลังงานบางส่วนไปในรูปของความร้อนจากแรงเสียดทานของอากาศ
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch04_s2.jpg" alt="การหมุนของโรเตอร์และการตกตะกอน" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 4.1: โครงสร้างหัวปั่นโรเตอร์มุมคงที่และการแยกชั้นของสารชีวภาพ
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: RCF Calculation -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">สูตรมาตรฐานการแปลง RPM เป็น RCF</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการคำนวณแรงเหวี่ยงสัมพัทธ์ (Relative Centrifugal Force)
                        </span>
                        <div class="p-4 bg-slate-900/90 rounded-xl border border-indigo-500/30 text-center font-mono text-base md:text-lg text-amber-300">
                            $$\text{RCF} = 1.118 \times 10^{-5} \times r_{\text{cm}} \times (\text{RPM})^2$$
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $r_{\text{cm}}$ คือรัศมีจากกึ่งกลางแกนหมุนถึงก้นหลอด ($\text{cm}$) และ $\text{RPM}$ คือความเร็วรอบต่อนาที
                        </p>
                    </div>

                    <!-- Proportional Scaling Rule -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-cyan-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-exclamation-circle"></i> กฎการแปรผันกำลังสอง: $\text{RCF} \propto (\text{RPM})^2$
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-indigo-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">เพิ่มความเร็วรอบ 2 เท่า &rarr; แรงเหวี่ยงพุ่ง 4 เท่า!</strong>
                            <span>เช่น หากเพิ่มรอบจาก $3{,}000$ เป็น $6{,}000\text{ rpm}$ แรงบีบอัดเซลล์จะพุ่งขึ้นถึง $(2)^2 = 4$ เท่าตัว</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">ทำไมห้ามรายงานแค่ค่า RPM ในรายงานวิจัย?</strong>
                            <span>เพราะถ้าเครื่องปั่นคนละรุ่นมีรัศมี $r$ ไม่เท่ากัน ค่าแรงเหวี่ยงที่เซลล์ได้รับจะต่างกันโดยสิ้นเชิง</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การคำนวณค่า RCF สำหรับเก็บเซลล์ E. coli
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เครื่องปั่นเหวี่ยงมีรัศมีโรเตอร์ $r_{\text{cm}} = 10\text{ cm}$ ตั้งความเร็วรอบที่ $\text{RPM} = 5{,}000\text{ rpm}$ จงคำนวณหาค่าแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$) ในหน่วย $\times g$
                    </p>
                    <div class="grid md:grid-cols-3 gap-3 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: ยกกำลังสองรอบ</span>
                            $$(\text{RPM})^2 = (5{,}000)^2$$
                            $$= 2.5 \times 10^7$$
                        </div>
                        <div>
                            <span class="text-cyan-400 font-bold block mb-1">ขั้นที่ 2: แทนค่าลงสมการ</span>
                            $$\text{RCF} = 1.118 \times 10^{-5}$$
                            $$\times 10 \times 2.5 \times 10^7$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 3: รวมผลลัพธ์</span>
                            $$\text{RCF} = 1.118 \times 2{,}500$$
                            $$= 2{,}795 \times g$$
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Rotor Balancing Rules -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-indigo-500/20 text-indigo-400 font-mono font-bold flex items-center justify-center text-sm border border-indigo-500/30">4.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">กฎการจัดสมดุลหลอดในหัวปั่นโรเตอร์ ($\sum \vec{F}_c = 0$)</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-emerald-500/30 space-y-2">
                        <span class="text-emerald-400 font-bold text-xs font-mono block">BALANCED &bull; สมดุล 2 หลอด</span>
                        <h4 class="font-bold text-white text-sm">วางตรงข้ามกัน $180^\circ$</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            หลอดทั้งสองต้องมีปริมาตรและมวลเท่ากัน วางในช่องตรงข้ามกันตามแนวเส้นผ่านศูนย์กลาง เพื่อให้แรงหนีศูนย์กลางหักล้างกันพอดี
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-emerald-500/30 space-y-2">
                        <span class="text-emerald-400 font-bold text-xs font-mono block">BALANCED &bull; สมดุล 3 หลอด</span>
                        <h4 class="font-bold text-white text-sm">จัดแบบสามเหลี่ยมด้านเท่า</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            วางห่างกันช่องละ $120^\circ$ (เช่น ช่อง 1, 5, 9 ในโรเตอร์ 12 ช่อง) ผลรวมของเวกเตอร์แรงทั้งสามจะรวมกันเป็นศูนย์
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/30 space-y-2">
                        <span class="text-rose-400 font-bold text-xs font-mono block">DANGER &bull; ไม่สมดุล</span>
                        <h4 class="font-bold text-white text-sm">วางข้างเดียวกัน (ห้ามเด็ดขาด)</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ทำให้จุดศูนย์กลางมวลไม่อยู่ที่แกนหมุน เกิดแรงสะบัดมหาศาล แกนโรเตอร์จะงอหรือหลุดพัง เครื่องอาจระเบิดได้
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
                    <span class="text-xs text-indigo-400 font-mono font-bold">ArUco Marker ID: 3</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim04_centrifuge_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-indigo-500/30 hover:border-indigo-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Centrifuge Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ปรับความเร็วรอบ RPM หมุนโรเตอร์ 3D จัดวางหลอดทดลองถ่วงสมดุล และดูการเกิดก้อนตะกอนเซลล์ (Pellet)
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-indigo-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=3" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 3</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 3 เพื่อดูโมเดลเครื่องปั่นเหวี่ยงหมุนความเร็วสูงเสมือนจริงบนโต๊ะแล็บ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab04_newton.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 4</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการวัดรัศมีโรเตอร์ คำนวณ RCF เปรียบเทียบกับหน้าจอเครื่อง และตรวจลักษณะตะกอนยีสต์
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยขั้นวิกฤต: เครื่องปั่นเหวี่ยง (Aerosol Hazard)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันหลอดแตกและการฟุ้งกระจายของละอองเชื้อก่อโรค</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-radiation"></i> ละอองฝอยติดเชื้อ (Aerosol Formation)
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            หากหลอดไมโครทิวบ์แตกขณะปั่นด้วยความเร็ว 10,000 RPM เชื้อโรคจะแตกกระจายเป็นละอองฝอยขนาดเล็กกว่า $5\ \mu\text{m}$ ที่ลอยในอากาศได้นานหลายชั่วโมง หากได้ยินเสียงผิดปกติให้กดปุ่มหยุดทันทีและห้ามเปิดฝาเครื่องก่อน 30 นาที
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-lock"></i> ปิดฝาครอบโรเตอร์ (Safety Lid) ให้แน่นเสมอ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            ก่อนปิดฝาเครื่องใหญ่ ต้องหมุนเกลียวปิดฝาครอบโรเตอร์ด้านในให้สนิททุกครั้ง เพื่อป้องกันไม่ให้หลอดหลุดกระเด็นออกมาระหว่างการหมุน
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; โลหิตวิทยาและพันธุศาสตร์คลินิก
                </span>
                <h3 class="text-xl font-bold text-white">การแยกชั้น Buffy Coat และการตกตะกอนดีเอ็นเอด้วยเครื่อง Centrifuge</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    ในการสกัดดีเอ็นเอของเชื้อก่อโรคจากเลือดผู้ป่วย ต้องปั่นเหวี่ยงเลือดที่ความเร็ว $2{,}000 \times g$ เป็นเวลา 10 นาที เพื่อแยกส่วนประกอบของเลือดออกเป็น 3 ชั้นตามความหนาแน่น: พลาสมาด้านบน, เม็ดเลือดแดงด้านล่าง และชั้นบางๆ ตรงกลางที่เรียกว่า <strong>Buffy Coat</strong> ซึ่งอัดแน่นไปด้วยเม็ดเลือดขาวและเซลล์แบคทีเรีย จากนั้นจึงดูดชั้นนี้ไปสกัดดีเอ็นเอแล้วปั่นตกตะกอนด้วยเอทานอลที่ความเร็วสูงถึง $14{,}000 \times g$ เพื่อให้ได้ก้อนดีเอ็นเอบริสุทธิ์สำหรับตรวจวิเคราะห์ด้วย Real-time PCR
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-indigo-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 4
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การคำนวณและวัดค่า RCF ($r_{\text{cm}} = \text{...... cm}$)</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ความเร็วรอบ (RPM)</th>
                                <th class="p-3 text-center">รัศมี $r_{\text{cm}}$ ($\text{cm}$)</th>
                                <th class="p-3 text-center">RCF คำนวณ ($\times g$)</th>
                                <th class="p-3 text-center">RCF หน้าจอเครื่อง</th>
                                <th class="p-3 text-center">ลักษณะก้อนตะกอน (Pellet)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">$2{,}000\text{ rpm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-400 font-sans">ตะกอนหลวม มีความขุ่น</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$4{,}000\text{ rpm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-400 font-sans">ตะกอนเริ่มแน่น ส่วนใสขึ้น</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">$6{,}000\text{ rpm}$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-indigo-400">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">ก้อนตะกอนแน่นชัดเจน</td>
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
                            <span>ข้อที่ 1: หากเพิ่มความเร็วรอบของเครื่องปั่นเหวี่ยงขึ้น 3 เท่า ค่าแรงเหวี่ยงสัมพัทธ์ (RCF) จะเพิ่มขึ้นกี่เท่า?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 9 เท่า</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ตามสูตร $\text{RCF} \propto (\text{RPM})^2$ ค่าแรงเหวี่ยงแปรผันตรงกับกำลังสองของความเร็วรอบ ดังนั้น $(3)^2 = 9$ เท่า
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: เหตุใดการเขียนรายงานผลการทดลองทางจุลชีววิทยาจึงต้องระบุค่า RCF ($\times g$) แทนการระบุค่า RPM?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพื่อให้สามารถทำซ้ำได้ เพราะเครื่องปั่นเหวี่ยงต่างรุ่นกันมีรัศมีโรเตอร์ ($r$) ไม่เท่ากัน</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> แม้จะตั้งความเร็วรอบเท่ากัน แต่หากรัศมีต่างกัน แรงเหวี่ยงที่กระทำต่อเซลล์จะไม่เท่ากัน การระบุค่า $\times g$ จึงเป็นค่ามาตรฐานสากลที่แท้จริง
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: หากมีหลอดตัวอย่าง 3 หลอดในโรเตอร์ 12 ช่อง ควรจัดวางหลอดอย่างไรเพื่อความปลอดภัยสูงสุด?</span>
                            <i class="fas fa-chevron-down text-indigo-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: วางที่ช่อง 1, 5 และ 9 (ห่างกันทุกๆ 4 ช่อง หรือ $120^\circ$ เป็นสามเหลี่ยมด้านเท่า)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> การจัดเรียงเป็นสามเหลี่ยมด้านเท่าทำให้ผลรวมเวกเตอร์ของแรงหนีศูนย์กลางทั้งสามหักล้างกันเป็นศูนย์พอดี ($\sum \vec{F}_c = 0$)
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch03_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 3: กฎของนิวตันและแรงหนืด
                </a>
                <a href="ch05_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-400 hover:to-purple-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-indigo-500/20">
                    บทที่ 5: โมเมนตัมและการชนในระดับเซลล์ <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>