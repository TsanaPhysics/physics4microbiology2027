<?php
$pageTitle = "บทที่ 8: การหมุนและกลศาสตร์นาโนของแส้เซลล์";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 8</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-cyan-400 font-mono text-xs mb-4 border border-cyan-500/30 bg-cyan-500/10 tracking-widest uppercase shadow-lg shadow-cyan-500/10">
                <i class="fas fa-gears text-xs"></i> MODULE 08 &bull; ROTATIONAL DYNAMICS &amp; FLAGELLA
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                การหมุนและกลศาสตร์นาโนของแส้เซลล์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                ทอร์ก กำลังเชิงมุม และกลศาสตร์นาโนของมอเตอร์ฐานแส้แบคทีเรีย (Bacterial Flagellar Motor) ในสภาวะเลขเรย์โนลด์ต่ำ
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 7
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
                        <i class="fas fa-sync-alt text-lg"></i>
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
                            <span><strong>CLO1:</strong> อธิบายทอร์ก ($\tau$), อัตราเร็วเชิงมุม ($\omega = 2\pi f$) และกำลังของมอเตอร์นาโน ($P = \tau\omega$) ได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-cyan-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายเหตุผลที่แบคทีเรียต้องว่ายน้ำด้วยการหมุนควงสว่านตามทฤษฎี Scallop Theorem ในสภาวะ $Re \ll 1$</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> สังเกตและวิเคราะห์ทอร์กการหมุนของแส้แบคทีเรียด้วยแบบจำลองเสมือนจริง 3 มิติ</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> เชื่อมโยงฟิสิกส์ของการหมุนแส้สู่การยับยั้งการสร้างไบโอฟิล์ม (Biofilm) ในงานวิจัยจุลชีววิทยา</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch08_s1.jpg" alt="มอเตอร์ฐานแส้แบคทีเรีย BFM" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> NANOMACHINE ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">มอเตอร์ฐานแส้แบคทีเรีย (Bacterial Flagellar Motor: BFM)</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            มอเตอร์ฐานแส้แบคทีเรียเป็นหนึ่งในสิ่งมหัศจรรย์ทางชีวฟิสิกส์ มีขนาดเส้นผ่านศูนย์กลางเพียง $45\text{ nm}$ แต่สามารถหมุนด้วยความเร็วสูงถึง <strong>$300\text{ รอบต่อวินาที (Hz)}$</strong> ใน <em>E. coli</em> และมากกว่า <strong>$1{,}000\text{ Hz}$</strong> ใน <em>Vibrio cholerae</em> โดยสร้างแรงบิด (Torque) มหาศาลระดับ $4{,}000\ \text{pN}\cdot\text{nm}$ ขับเคลื่อนแส้เกลียวให้ดันเซลล์พุ่งไปในของเหลวหนืดได้อย่างทรงพลัง
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความเร็วรอบสูงสุด</span>
                                <span>$300\text{--}1{,}000\text{ RPS}$ ($18{,}000\text{--}60{,}000\text{ RPM}$!)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">พลังขับเคลื่อน</span>
                                <span>พลังขับเคลื่อนโปรตอน ($\text{H}^+$) หรือโซเดียม ($\text{Na}^+$)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Rotational Dynamics -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 font-mono font-bold flex items-center justify-center text-sm border border-cyan-500/30">8.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">พลศาสตร์การหมุนและชีวิตที่เลขเรย์โนลด์ต่ำ (Life at Low Re)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            ในโลกจุลทรรศน์ ค่าเลขเรย์โนลด์ (Reynolds Number) มีค่าน้อยกว่า $10^{-4}$ ($Re \ll 1$) ซึ่งหมายความว่า <strong>"ความหนืดมีอิทธิพลเหนือความเฉื่อยอย่างสิ้นเชิง"</strong> น้ำสำหรับแบคทีเรียจึงมีความรู้สึกเหมือนน้ำเชื่อมข้นหนืดหรือยางมะตอย
                        </p>
                        <p>
                            ตาม <strong>ทฤษฎี Scallop Theorem</strong> ของนักฟิสิกส์รางวัลโนเบล Edward Purcell หากวัตถุขยับโบกไปและพับกลับในทิศทางเดิม (Reciprocal Motion เหมือนการกะพริบฝาหอย) วัตถุนั้นจะไม่เคลื่อนที่ไปข้างหน้าเลยแม้แต่นาโนเมตรเดียว แบคทีเรียจึงต้องวิวัฒนาการแส้ให้เป็นเกลียว (Helical Filament) แล้วหมุนควงสว่านทางเดียวเพื่อเจาะทะลวงผ่านของเหลวหนืด
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch08_s2.jpg" alt="การหมุนควงสว่านของแส้แบคทีเรีย" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 8.1: การหมุนควงสว่านของแฟลกเจลลาสร้างแรงขับเคลื่อนในสภาวะเลขเรย์โนลด์ต่ำ
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
                    <span class="text-xs text-slate-400 font-mono">สูตรทอร์กและกำลังการหมุน</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมการทอร์กและกำลังกลศาสตร์นาโน
                        </span>
                        <div class="p-3 bg-slate-900/90 rounded-xl border border-cyan-500/30 text-center font-mono text-sm text-cyan-300 space-y-2">
                            <div>$$\text{อัตราเร็วเชิงมุม: } \omega = 2\pi f\quad (\text{rad/s})$$</div>
                            <div>$$\text{กำลังกล: } P = \tau \times \omega\quad (\text{วัตต์ หรือ }\text{W})$$</div>
                        </div>
                        <p class="text-xs text-slate-300">
                            โดย $\tau$ คือทอร์ก ($\text{N}\cdot\text{m}$ หรือ $\text{pN}\cdot\text{nm}$), $f$ คือความถี่การหมุน ($\text{Hz}$ หรือรอบ/วินาที)
                        </p>
                    </div>

                    <!-- Comparison Box -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-emerald-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-bolt"></i> มอเตอร์ชีวภาพ vs มอเตอร์มนุษย์สร้าง
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-cyan-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">การเปลี่ยนทิศทางการหมุนใน 1 มิลลิวินาที:</strong>
                            <span>มอเตอร์ BFM สามารถสลับทิศจากการหมุนทวนเข็ม (Run) ไปตามเข็ม (Tumble) ได้อย่างฉับไวโดยไม่ทำให้มอเตอร์พัง</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-purple-500/30 text-slate-200">
                            <strong class="text-purple-400 block mb-1">ใช้พลังงานคุ้มค่า:</strong>
                            <span>โปรตอนเพียงประมาณ 1,200 ตัวต่อ 1 รอบการหมุนของมอเตอร์</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ 3 ขั้นตอน: กำลังของมอเตอร์แฟลกเจลลา E. coli
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> มอเตอร์แฟลกเจลลาสร้างทอร์ก $\tau = 4{,}000\ \text{pN}\cdot\text{nm}$ ($4.0\times 10^{-18}\text{ N}\cdot\text{m}$) และหมุนด้วยความถี่ $f = 200\text{ Hz}$ จงหาอัตราเร็วเชิงมุม ($\omega$) และกำลังกลศาสตร์นาโน ($P$) ของมอเตอร์ตัวนี้
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: หาอัตราเร็วเชิงมุม ($\omega = 2\pi f$)</span>
                            $$\omega = 2 \times 3.14 \times 200 \approx 1{,}256\text{ rad/s}$$
                        </div>
                        <div>
                            <span class="text-cyan-400 font-bold block mb-1">ขั้นที่ 2: หากำลัง ($P = \tau\omega$)</span>
                            $$P = (4.0\times 10^{-18}\text{ N}\cdot\text{m}) \times (1{,}256\text{ rad/s})$$
                            $$P \approx 5.0\times 10^{-15}\text{ W}\ (5.0\text{ fW})$$
                            <span class="text-slate-400">&bull; แม้กำลังจะอยู่ในระดับเฟมโตวัตต์ แต่เทียบกับขนาดเซลล์ถือว่าทรงพลังมหาศาล</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Nanomotor Components -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 font-mono font-bold flex items-center justify-center text-sm border border-cyan-500/30">8.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">ชิ้นส่วนสเตเตอร์และโรเตอร์ของมอเตอร์ BFM</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-sm text-slate-300">
                        <p>
                            โครงสร้างของ BFM มีความคล้ายคลึงกับมอเตอร์ไฟฟ้ากระแสตรงที่มนุษย์สร้างขึ้นอย่างน่าทึ่ง:
                        </p>
                        <ul class="space-y-2 text-xs">
                            <li class="flex items-start gap-2">
                                <i class="fas fa-circle-dot text-cyan-400 mt-0.5"></i>
                                <span><strong>สเตเตอร์ (Stator - MotA/MotB):</strong> ยึดแน่นอยู่กับผนังเพปทิโดไกลแคน ทำหน้าที่เป็นช่องทางให้โปรตอนไหลผ่านและสร้างแรงผลัก</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-arrows-spin text-amber-400 mt-0.5"></i>
                                <span><strong>โรเตอร์ (Rotor - MS Ring &amp; C Ring):</strong> วงแหวนโปรตีนที่หมุนได้ ทำหน้าที่รับแรงจากสเตเตอร์และส่งทอร์กไปยังก้านเพลา (Rod)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <i class="fas fa-link text-emerald-400 mt-0.5"></i>
                                <span><strong>ข้อต่อสากล (Universal Hook):</strong> ทำหน้าที่เหมือนเพลาข้อต่อเปลี่ยนมุม ถ่ายทอดการหมุนจากแกนตั้งตรงไปสู่แส้เกลียวเอียง</span>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch08_s3.jpg" alt="ส่วนประกอบของมอเตอร์แฟลกเจลลา" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 8.2: องค์ประกอบสเตเตอร์ MotA/B และโรเตอร์ C-ring ที่ฐานของแฟลกเจลลา
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
                    <span class="text-xs text-cyan-400 font-mono font-bold">ArUco Marker ID: 7</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim08_nanomechanics_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-cyan-500/30 hover:border-cyan-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Flagella Mechanics Sim</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ปรับความถี่การหมุน ทอร์ก และสังเกตการหมุนควงสว่านของแส้แบคทีเรียเพื่อสร้างแรงพุ่งตัวแบบ 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-cyan-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=7" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 7</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 7 เพื่อดูโมเดลมอเตอร์นาโน BFM หมุนรอบจัดลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab08_machines.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 8</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลการคำนวณทอร์กและความเร็วเชิงมุมของแส้แบคทีเรียส่งรายงานเข้าฐานข้อมูลกลาง
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
                        <h3 class="text-lg font-bold text-white">ข้อควรระวัง: เชื้อแบคทีเรียที่มีความสามารถในการเคลื่อนที่สูง (Motile Pathogens)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันการแพร่กระจายของเชื้อกลุ่ม Salmonella และ Vibrio</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-exclamation-triangle"></i> การเคลื่อนที่แบบ Swarming ข้ามขอบเขต
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            เชื้อแบคทีเรียที่มีแฟลกเจลลารอบตัวหนาแน่นสามารถว่ายเคลื่อนที่ข้ามผิวหน้าวุ้นได้อย่างรวดเร็ว ในการเพาะเลี้ยงต้องปิดผนึกจานเพาะเชื้อด้วยพาราฟิล์มเพื่อป้องกันการปนเปื้อนข้ามจาน
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-hands-wash"></i> การล้างมือและการอบฆ่าเชื้อ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            แฟลกเจลลาช่วยให้เชื้อสามารถแทรกซึมเข้าสู่รูขุมขนและเนื้อเยื่อเมือกได้ดีกว่าเชื้อที่ว่ายไม่ได้ ดังนั้นหลังสัมผัสเชื้อกลุ่มนี้ต้องล้างมือด้วยสบู่ฆ่าเชื้อและนำอุปกรณ์เข้า Autoclave ทันที
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; การแพทย์ชีวฟิสิกส์
                </span>
                <h3 class="text-xl font-bold text-white">การพัฒนายายับยั้งการหมุนของแส้เพื่อป้องกันการเกิดไบโอฟิล์ม (Anti-motility Therapy)</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    แบคทีเรีย <em>Pseudomonas aeruginosa</em> ใช้แฟลกเจลลาว่ายน้ำไปสำรวจและสัมผัสกับพื้นผิวของสายสวนหรือเนื้อเยื่อปอด เมื่อสัมผัสพื้นผิว มอเตอร์ BFM จะรับรู้แรงหนืดที่เพิ่มขึ้น (Mechanosensing) แล้วส่งสัญญาณกระตุ้นให้เซลล์หลั่งสารเมือกเหนียวสร้างเป็น <strong>ไบโอฟิล์ม (Biofilm)</strong> ซึ่งทนทานต่อยาปฏิชีวนะได้ถึง 1,000 เท่า นักวิจัยจึงพัฒนาโมเลกุลสังเคราะห์ขนาดเล็กที่สามารถจับกับโปรตีน MotB เพื่อดับสวิตช์การหมุนของมอเตอร์ ทำให้แบคทีเรียไม่สามารถว่ายน้ำและไม่สามารถก่อตัวเป็นไบโอฟิล์มได้
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-cyan-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 8
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การคำนวณทอร์ก กำลัง และประสิทธิภาพของมอเตอร์นาโน</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ชนิดแบคทีเรีย</th>
                                <th class="p-3 text-center">ความถี่หมุน $f$ ($\text{Hz}$)</th>
                                <th class="p-3 text-center">ความเร็วเชิงมุม $\omega$ ($\text{rad/s}$)</th>
                                <th class="p-3 text-center">ทอร์ก $\tau$ ($\text{pN}\cdot\text{nm}$)</th>
                                <th class="p-3 text-center">กำลังกล $P$ ($\text{fW}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans"><em>Escherichia coli</em></td>
                                <td class="p-3 text-center text-slate-500">$200\text{ Hz}$</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                                <td class="p-3 text-center text-amber-400">$4{,}000$</td>
                                <td class="p-3 text-center text-emerald-400">......</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans"><em>Vibrio cholerae</em></td>
                                <td class="p-3 text-center text-slate-500">$800\text{ Hz}$</td>
                                <td class="p-3 text-center text-cyan-400">......</td>
                                <td class="p-3 text-center text-amber-400">$3{,}500$</td>
                                <td class="p-3 text-center text-emerald-400">......</td>
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
                            <span>ข้อที่ 1: ตามทฤษฎี Scallop Theorem ทำไมแบคทีเรียจึงไม่สามารถว่ายน้ำด้วยการกะพริบโบกแส้ไปมาแบบหอย?</span>
                            <i class="fas fa-chevron-down text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพราะในสภาวะเลขเรย์โนลด์ต่ำ ($Re \ll 1$) การโบกไปและกลับจะหักล้างกันจนไม่มีการเคลื่อนที่สุทธิ</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เมื่อความเฉื่อยมีค่าน้อยมาก แรงหนืดจะทำให้ระยะทางที่ได้ตอนโบกไปถูกดึงกลับเท่าเดิมตอนพับกลับ แบคทีเรียจึงต้องหมุนควงสว่านทิศเดียว
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: ส่วนประกอบใดของมอเตอร์แฟลกเจลลาที่ทำหน้าที่เป็น "สเตเตอร์" ยึดกับผนังเซลล์และส่งผ่านโปรตอน?</span>
                            <i class="fas fa-chevron-down text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: คอมเพล็กซ์โปรตีน MotA/MotB</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> MotA/MotB ยึดแน่นกับเพปทิโดไกลแคนและทำหน้าที่เป็นช่องทางส่งโปรตอนเพื่อออกแรงผลักวงแหวนโรเตอร์
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: มอเตอร์แฟลกเจลลาหมุนด้วยความถี่ 100 รอบต่อวินาที (100 Hz) คิดเป็นกี่รอบต่อนาที (RPM)?</span>
                            <i class="fas fa-chevron-down text-cyan-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 6,000 RPM</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ใน 1 นาทีมี 60 วินาที ดังนั้น $100\text{ รอบ/วินาที} \times 60\text{ วินาที/นาที} = 6{,}000\text{ RPM}$
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch07_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 7: งาน พลังงาน และ ATP Synthase
                </a>
                <a href="ch09_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-cyan-500 to-amber-500 hover:from-cyan-400 hover:to-amber-400 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-cyan-500/20">
                    บทที่ 9: อุณหพลศาสตร์และหม้อนึ่ง Autoclave / PCR <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>