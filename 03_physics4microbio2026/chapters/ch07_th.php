<?php
$pageTitle = "บทที่ 7: งาน พลังงาน และมอเตอร์โมเลกุลชีวภาพ";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 7</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-rose-400 font-mono text-xs mb-4 border border-rose-500/30 bg-rose-500/10 tracking-widest uppercase shadow-lg shadow-rose-500/10">
                <i class="fas fa-bolt text-xs"></i> MODULE 07 &bull; WORK, ENERGY &amp; ATP SYNTHASE
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                งาน พลังงาน และมอเตอร์โมเลกุลชีวภาพ
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                พลังขับเคลื่อนโปรตอน (PMF) การทำงานของโรเตอร์หมุน $F_0F_1$ ATP Synthase และประสิทธิภาพการแปลงพลังงานไฟฟ้าระดับนาโน
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 6
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
                        <i class="fas fa-microchip text-lg"></i>
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
                            <span><strong>CLO1:</strong> อธิบายองค์ประกอบของพลังขับเคลื่อนโปรตอน (PMF, $\Delta p = \Delta \psi - 60\Delta\text{pH}$) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-rose-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายกลไกการเปลี่ยนรูปพลังงานไฟฟ้าเคมีสู่การหมุนเชิงกลของเอนไซม์ $F_0F_1$ ATP Synthase</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> วิเคราะห์ประสิทธิภาพการสร้างพลังงาน ATP และการใช้สารยับยั้งในงานวิจัยจุลชีววิทยา</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> เชื่อมโยงฟิสิกส์ของมอเตอร์โมเลกุลเข้ากับกลไกยาต้านวัณโรคชนิดใหม่ Bedaquiline</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch07_s1.jpg" alt="มอเตอร์โมเลกุล ATP Synthase" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MOLECULAR ENGINE ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">เอนไซม์ $F_0F_1$ ATP Synthase: มอเตอร์ระดับนาโนของเซลล์</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            สิ่งมีชีวิตทุกชนิดขับเคลื่อนด้วยโมเลกุล ATP โดยมีเครื่องกำเนิดไฟฟ้าขนาดจิ๋วระดับ 10 นาโนเมตร ฝังอยู่บนเยื่อหุ้มเซลล์แบคทีเรียและเยื่อหุ้มไมโทคอนเดรีย มอเตอร์นี้ประกอบด้วย 2 ส่วนหลัก: <strong>$F_0$ (ส่วนฐานหมุนในเยื่อหุ้ม)</strong> ทำหน้าที่เป็นกังหันน้ำให้โปรตอนไหลผ่าน และ <strong>$F_1$ (ส่วนหัวแคทาลิติกในไซโทพลาซึม)</strong> ทำหน้าที่สังเคราะห์โมเลกุล ATP จาก ADP และฟอสเฟต ($P_i$) ด้วยประสิทธิภาพเกือบ 100%
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">รอบหมุนต่อวินาที</span>
                                <span>$100\text{--}350\text{ RPS}$ (รอบ/วินาที!)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ผลผลิตต่อ 1 รอบหมุน</span>
                                <span>สร้าง $3\text{ ATP}$ ต่อการหมุน $360^\circ$</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Proton Motive Force (PMF) -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-mono font-bold flex items-center justify-center text-sm border border-rose-500/30">7.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">พลังขับเคลื่อนโปรตอน (Proton Motive Force: PMF)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            การขนส่งอิเล็กตรอนในการหายใจระดับเซลล์จะปั๊มโปรตอน ($\text{H}^+$) ออกไปสะสมนอกเยื่อหุ้มเซลล์ ทำให้เกิดความต่างศักย์ไฟฟ้าเคมี 2 ส่วน:
                        </p>
                        <ul class="space-y-2 text-xs">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-bolt text-amber-400 mt-0.5"></i>
                                <span><strong>ความต่างศักย์ไฟฟ้าข้ามเยื่อ ($\Delta \psi$):</strong> ภายนอกมีประจุบวก ภายในมีประจุลบ (ประมาณ $-120\text{ mV}$)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-flask text-cyan-400 mt-0.5"></i>
                                <span><strong>ความแตกต่างของ pH ($\Delta\text{pH}$):</strong> ภายนอกมีความเป็นกรดมากกว่าภายในเซลล์ ($\approx 1\text{ pH unit}$)</span>
                            </li>
                        </ul>
                        <p>
                            เมื่อรวมพลังงานทั้งสองเข้าด้วยกัน จะได้แรงขับเคลื่อนโปรตอน (PMF, $\Delta p$) เทียบเท่ากับความต่างศักย์ไฟฟ้าประมาณ <strong>$-180\text{ ถึง }-220\text{ mV}$</strong>
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch07_s2.jpg" alt="การไหลของโปรตอนผ่าน F0F1" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 7.1: เกรเดียนต์ของโปรตอนผลักดันการหมุนของโรเตอร์ $c$-ring ใน $F_0$
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
                    <span class="text-xs text-slate-400 font-mono">สูตรคำนวณพลังขับเคลื่อนโปรตอน PMF</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการพลังขับเคลื่อนโปรตอนแบบประมาณค่าที่ 25&deg;C
                        </span>
                        <div class="p-4 bg-slate-900/90 rounded-xl border border-rose-500/30 text-center font-mono text-lg text-rose-300">
                            $$\Delta p = \Delta \psi - 60 \times \Delta\text{pH}\quad (\text{mV})$$
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $\Delta \psi$ คือความต่างศักย์เยื่อหุ้มเซลล์ ($\text{mV}$) และ $\Delta\text{pH} = \text{pH}_{\text{in}} - \text{pH}_{\text{out}}$
                        </p>
                    </div>

                    <!-- Rotary Gear Ratio -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-cyan-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-gear"></i> อัตราทดเฟืองนาโน: โปรตอนสู่โมเลกุล ATP
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-rose-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">โปรตอน 3–4 ตัว &rarr; หมุน $120^\circ$ &rarr; สร้าง $1\text{ ATP}$</strong>
                            <span>โรเตอร์หมุนทีละสเต็ป $120^\circ$ โดยเอนไซม์ $F_1$ จะเปลี่ยนรูปร่าง (Conformation) จับ ADP+$P_i$ บีบอัดเป็น ATP</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-emerald-400 block mb-1">หมุนครบ 1 รอบ ($360^\circ$):</strong>
                            <span>ใช้โปรตอนประมาณ $10\text{--}12\ \text{H}^+$ สร้างได้ $3\text{ ATP}$ สมบูรณ์</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: การคำนวณค่า PMF ของแบคทีเรีย E. coli
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เซลล์แบคทีเรียมีศักย์ไฟฟ้าเยื่อหุ้มเซลล์ $\Delta \psi = -140\text{ mV}$ โดยมีค่า $\text{pH}$ ภายในเซลล์เท่ากับ $7.5$ และสิ่งแวดล้อมภายนอกเท่ากับ $6.5$ จงคำนวณหาพลังขับเคลื่อนโปรตอน ($\Delta p$) ในหน่วยมิลลิโวลต์ ($\text{mV}$)
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: หาผลต่าง $\Delta\text{pH}$</span>
                            $$\Delta\text{pH} = \text{pH}_{\text{in}} - \text{pH}_{\text{out}} = 7.5 - 6.5 = +1.0$$
                        </div>
                        <div>
                            <span class="text-rose-400 font-bold block mb-1">ขั้นที่ 2: แทนค่าลงในสมการ $\Delta p$</span>
                            $$\Delta p = -140\text{ mV} - (60 \times 1.0) = -200\text{ mV}$$
                            <span class="text-slate-400">&bull; แรงผลักโปรตอนรวมมีค่าสูงถึง $-200\text{ mV}$ ขับเคลื่อนการสร้าง ATP</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Reversible Motor -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-mono font-bold flex items-center justify-center text-sm border border-rose-500/30">7.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การหมุนกลับทิศของมอเตอร์โมเลกุล (Reversibility)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            ATP Synthase เป็นเครื่องจักรกลชีวภาพที่สามารถทำงานแบบสองทิศทาง (Reversible Engine):
                        </p>
                        <ul class="space-y-2 text-xs">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-check text-emerald-400 mt-0.5"></i>
                                <span><strong>สภาวะปกติ (สร้าง ATP):</strong> โปรตอนไหลเข้าตามความลาดชัน หมุนตามเข็มนาฬิกา สร้างโมเลกุล ATP</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-undo text-amber-400 mt-0.5"></i>
                                <span><strong>สภาวะย้อนกลับ (ปั๊มโปรตอน):</strong> เซลล์ย่อยสลาย ATP หมุนทวนเข็มนาฬิกา เพื่อปั๊มโปรตอนออกไปสร้าง PMF สำหรับใช้หมุนแส้แฟลกเจลลา</span>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch07_s3.jpg" alt="การสังเคราะห์ ATP" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 7.2: โครงสร้างสามมิติของหัวแคทาลิติก $F_1$ ขณะเปลี่ยนพลังงานกลเป็นการสร้างพันธะเคมี ATP
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
                    <span class="text-xs text-rose-400 font-mono font-bold">ArUco Marker ID: 6</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim07_molecular_motors_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-rose-500/30 hover:border-rose-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D ATP Synthase Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ทดลองปรับเกรเดียนต์โปรตอน สังเกตการหมุนของโรเตอร์ $c$-ring และอัตราการผลิตโมเลกุล ATP แบบ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-rose-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=6" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 6</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 6 เพื่อแสดงมอเตอร์โมเลกุล ATP Synthase หมุนสร้างพลังงานลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab07_energy.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 7</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกการคำนวณ PMF และอัตราการสร้างพลังงานชีวเคมีส่งเข้าสู่ระบบอาจารย์ผู้สอน
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวัง: สารพิษทำลายเกรเดียนต์โปรตอน (Uncoupling Agents)</h3>
                        <p class="text-xs text-rose-300 font-mono">สารเคมีอันตรายที่ทำลายระบบพลังงานของเซลล์อย่างเฉียบพลัน</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-skull-crossbones"></i> สาร 2,4-Dinitrophenol (DNP) และ FCCP
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            สารกลุ่มนี้เป็นตัวนำโปรตอนลัดวงจรข้ามเยื่อหุ้มเซลล์ (Proton Ionophores) ทำให้ค่า PMF ตกฮวบเหลือศูนย์ เซลล์จะไม่สามารถสร้าง ATP ได้เลย และพลังงานทั้งหมดจะเปลี่ยนเป็นความร้อนจนเซลล์ตายทันที
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-shield-alt"></i> การใช้วิธีทางชีววิทยาป้องกันการปนเปื้อน
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            สารยับยั้งการหายใจระดับเซลล์ (เช่น Sodium Azide) เป็นสารพิษรุนแรงต่อระบบประสาท ต้องชั่งและเตรียมในตู้ดูดควัน (Fume Hood) สวมถุงมือไนไตรล์ และจัดการขยะสารเคมีตามมาตรฐานความปลอดภัย
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; ยาต้านจุลชีพยุคใหม่
                </span>
                <h3 class="text-xl font-bold text-white">ยาต้านวัณโรค Bedaquiline: กุญแจล็อกโรเตอร์นาโนของเชื้อ Mycobacterium</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    เชื้อวัณโรคดื้อยาหลายขนาน (MDR-TB) สร้างความท้าทายอย่างยิ่งต่อระบบสาธารณสุข ยา <strong>Bedaquiline</strong> เป็นยาปฏิชีวนะกลุ่มแรกที่ได้รับการอนุมัติโดยมีเป้าหมายที่โครงสร้างมอเตอร์ ATP Synthase ของเชื้อวัณโรคโดยตรง โดยโมเลกุลยาจะเข้าไปจับขัดขวางการหมุนของโรเตอร์หน่วยย่อย $c$-ring ในส่วนฐาน $F_0$ ทำให้เชื้อไม่สามารถสังเคราะห์โมเลกุล ATP ได้และตายลงในที่สุด โดยตัวยามีความจำเพาะสูงมาก ไม่รบกวน ATP Synthase ของเซลล์มนุษย์
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-rose-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 7
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การจำลองพลังขับเคลื่อนโปรตอนและการหมุนของโรเตอร์</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">สภาวะทดสอบ</th>
                                <th class="p-3 text-center">ศักย์ไฟฟ้า $\Delta \psi$ ($\text{mV}$)</th>
                                <th class="p-3 text-center">ผลต่าง $\Delta\text{pH}$</th>
                                <th class="p-3 text-center">PMF รวม ($\text{mV}$)</th>
                                <th class="p-3 text-center">ความเร็วหมุน (RPS)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">สภาวะปกติ (Control)</td>
                                <td class="p-3 text-center">$-140\text{ mV}$</td>
                                <td class="p-3 text-center">$+1.0$</td>
                                <td class="p-3 text-center text-rose-400">$-200\text{ mV}$</td>
                                <td class="p-3 text-center text-emerald-400 font-sans">หมุนเร็วปกติ ($\approx 300$)</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">เติมสาร DNP (Uncoupler)</td>
                                <td class="p-3 text-center">$-10\text{ mV}$</td>
                                <td class="p-3 text-center">$0.0$</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-rose-400 font-sans">โรเตอร์หยุดหมุน ($0$)</td>
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
                            <span>ข้อที่ 1: พลังงานที่ใช้ขับเคลื่อนการหมุนของโรเตอร์ ATP Synthase มาจากแหล่งใด?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: การไหลของโปรตอน ($\text{H}^+$) ผ่านความลาดชันไฟฟ้าเคมี (Proton Motive Force)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> โปรตอนที่ถูกปั๊มออกไปจะไหลกลับเข้าสู่เซลล์ผ่านส่วนฐาน $F_0$ ทำหน้าที่เหมือนกระแสน้ำขับกังหันหมุน
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: เมื่อโรเตอร์ ATP Synthase หมุนครบ 1 รอบ ($360^\circ$) จะสร้างโมเลกุล ATP ได้กี่โมเลกุล?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 3 โมเลกุล ATP</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ส่วนหัว $F_1$ มีตำแหน่งสังเคราะห์ 3 หน่วย หมุนทุกๆ $120^\circ$ จะปล่อย 1 ATP ดังนั้นครบ 1 รอบจะปล่อย 3 ATP
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ยาต้านวัณโรค Bedaquiline มีกลไกการออกฤทธิ์ทางชีวฟิสิกส์อย่างไร?</span>
                            <i class="fas fa-chevron-down text-rose-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ล็อกการหมุนของโรเตอร์ $c$-ring ในส่วนฐาน $F_0$ ทำให้สร้าง ATP ไม่ได้</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เมื่อโรเตอร์ถูกล็อก โปรตอนจะไม่สามารถไหลผ่านได้ เซลล์เชื้อวัณโรคจึงหมดพลังงานและตายลง
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch06_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 6: สมดุลกลและความดันออสโมซิส
                </a>
                <a href="ch08_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-rose-500 to-cyan-600 hover:from-rose-400 hover:to-cyan-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-rose-500/20">
                    บทที่ 8: การหมุนและกลศาสตร์นาโนของแส้เซลล์ <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>