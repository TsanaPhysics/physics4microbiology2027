<?php
$pageTitle = "บทที่ 13: โครงงานบูรณาการชีวฟิสิกส์และการเกษตรอัจฉริยะ";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 20%, #064e3b 0%, #020617 85%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:24px_24px]"></div>
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 13</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-emerald-400 font-mono text-xs mb-4 border border-emerald-500/30 bg-emerald-500/10 tracking-widest uppercase shadow-lg shadow-emerald-500/10">
                <i class="fas fa-brain text-xs"></i> MODULE 13 &bull; CAPSTONE MINI-PROJECT &amp; SMART BIO-AI
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                โครงงานบูรณาการชีวฟิสิกส์และการเกษตรอัจฉริยะ
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                การบูรณาการหลักฟิสิกส์ 8 หมวด สู่นวัตกรรมเซนเซอร์ชีวภาพ (Biosensors) ระบบควบคุมชีวปฏิกรณ์อัจฉริยะ และการเกษตรแม่นยำ (Precision Agriculture)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> สัมมนา 2 ชม. + โครงงาน 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3 &bull; CLO4
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cubes text-cyan-400"></i> WebAR Marker: All Markers (0–11)
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-500/10 via-slate-800/40 to-slate-900 border border-emerald-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 border border-emerald-500/30">
                        <i class="fas fa-award text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Capstone Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO1:</strong> สังเคราะห์และเชื่อมโยงหลักการฟิสิกส์ทั้ง 8 หมวด อธิบายการทำงานของเครื่องมือและเซนเซอร์ในงานจุลชีววิทยาได้</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO2:</strong> ออกแบบและนำเสนอโครงงานย่อย (Mini-Project) หรือระบบจำลองทางชีวฟิสิกส์ได้อย่างเป็นรูปธรรมและเข้าใจง่าย</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ตระหนักถึงความปลอดภัยทางชีวภาพ (Biosafety BSL-1/2) จรรยาบรรณวิจัย และความปลอดภัยทางไฟฟ้าของระบบ IoT</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-cyan-400 mt-1"></i>
                            <span><strong>CLO4:</strong> สื่อสารทางวิทยาศาสตร์ จัดทำอินโฟกราฟิกสรุปหลักการฟิสิกส์ และนำเสนอต่อที่ประชุมกลุ่มได้อย่างมีประสิทธิภาพ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Microbiology Instrument Anchor Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-teal-950/40 via-slate-900 to-slate-900 border border-teal-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-teal-500/30 shadow-lg">
                        <img src="../images/tech_iot_lab.png" alt="ระบบแล็บจุลชีววิทยาอัจฉริยะและเซนเซอร์ IoT" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-teal-500/20 text-teal-300 border border-teal-500/40">
                            <i class="fas fa-anchor"></i> INTEGRATED CAPSTONE ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">ห้องปฏิบัติการจุลชีววิทยาอัจฉริยะ (AIoT Smart Bio-Lab)</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            วิทยาศาสตร์จุลชีววิทยายุคใหม่ไม่ได้จำกัดอยู่เพียงการเพาะเชื้อในหลอดแก้ว แต่ก้าวสู่ <strong>ชีววิทยาดิจิทัล (Digital Microbiology)</strong> ที่ผสานเซนเซอร์ทางฟิสิกส์ (แสง อุณหภูมิ การนำไฟฟ้า ความดัน และคลื่นเสียง) เข้ากับระบบอินเทอร์เน็ตของสรรพสิ่ง (IoT) และปัญญาประดิษฐ์ (Edge AI) เพื่อติดตามพฤติกรรมการเติบโตของจุลินทรีย์ การหมักทางอุตสาหกรรมชีวภาพ และการใช้จุลินทรีย์ปฏิปักษ์/PGPR ในแปลงเกษตรแม่นยำแบบ Real-time 24 ชั่วโมง
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-teal-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-teal-400 font-bold block mb-0.5">การบูรณาการแกนหลัก</span>
                                <span>8 สาขาฟิสิกส์ &times; จุลชีววิทยา</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-teal-400 font-bold block mb-0.5">ผลสัมฤทธิ์โครงงาน</span>
                                <span>อินโฟกราฟิก + แบบจำลอง 3D / IoT</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: The 8 Biophysics Pillars -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 font-mono font-bold flex items-center justify-center text-sm border border-emerald-500/30">13.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">แผนภูมิบูรณาการฟิสิกส์ 8 แกนในวิทยาศาสตร์จุลชีววิทยา</h2>
                </div>
                <p class="text-sm text-slate-300 leading-relaxed">
                    เครื่องมือทุกชิ้นในห้องปฏิบัติการจุลชีววิทยา ล้วนทำงานโดยอาศัยปรากฏการณ์ทางฟิสิกส์ที่ประสานกันอย่างเป็นระบบ การเข้าใจหลักการฟิสิกส์พื้นฐานช่วยให้นักจุลชีววิทยาสามารถวิเคราะห์ปัญหาหน้างาน ควบคุมตัวแปรทดลอง และสร้างสรรค์นวัตกรรมใหม่ได้อย่างแม่นยำ:
                </p>

                <!-- 8-Pillars Responsive Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Pillar 1 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-emerald-400 font-bold text-sm">
                            <i class="fas fa-ruler-combined"></i>
                            <span>1. หน่วยและการวัด</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            บันไดคำอุปสรรค ($10^{-3}$ ถึง $10^{-9}$), ปริมาตรไมโครลิตร ($\mu\text{L}$) ในไมโครปิเปต P1000 และความหนาแน่น $\rho = m/V$
                        </p>
                    </div>

                    <!-- Pillar 2 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-sky-400 font-bold text-sm">
                            <i class="fas fa-arrows-alt"></i>
                            <span>2. เวกเตอร์และการเคลื่อนที่</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            การเคลื่อนที่แบบมีทิศทาง (Chemotaxis) ปะทะการเคลื่อนที่ไร้ทิศทางบราวน์เนียน (Brownian Motion) ภายใต้กล้องจุลทรรศน์
                        </p>
                    </div>

                    <!-- Pillar 3 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-amber-400 font-bold text-sm">
                            <i class="fas fa-water"></i>
                            <span>3. แรงนิวตันและความหนืด</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            กฎของสโตกส์ ($F_d = 6\pi\eta r v$), ความเร็วตกตะกอนปลายทาง ($v_t$) ในอาหารเลี้ยงเชื้อและชั้นดินตกตะกอน
                        </p>
                    </div>

                    <!-- Pillar 4 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-rose-400 font-bold text-sm">
                            <i class="fas fa-sync-alt"></i>
                            <span>4. แรงสู่ศูนย์กลาง &amp; RCF</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            การปั่นแยกเซลล์และออร์แกเนลล์ ($F_c = m r \omega^2$), แรงจีสัมพัทธ์ (RCF) และการจัดสมดุลโรเตอร์อย่างเคร่งครัด
                        </p>
                    </div>

                    <!-- Pillar 5 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-violet-400 font-bold text-sm">
                            <i class="fas fa-compress-arrows-alt"></i>
                            <span>5. โมเมนตัม &amp; การสลายเซลล์</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            การถ่ายโอนโมเมนตัมจากการชนของลูกปัดแก้ว (Bead Beating) และคลื่นเสียงความถี่สูง (Ultrasonication) เพื่อสกัดเอนไซม์
                        </p>
                    </div>

                    <!-- Pillar 6 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-teal-400 font-bold text-sm">
                            <i class="fas fa-balance-scale"></i>
                            <span>6. สมดุลและแรงดันออสโมซิส</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            กฎของแวนต์ฮอฟฟ์ ($\Pi = cRT$), แรงดันเต่ง (Turgor Pressure) และการเหี่ยวของเซลล์ (Plasmolysis) ในอาหารเข้มข้น
                        </p>
                    </div>

                    <!-- Pillar 7 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-orange-400 font-bold text-sm">
                            <i class="fas fa-fire"></i>
                            <span>7. อุณหพลศาสตร์ &amp; ความร้อน</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            ความร้อนแฝงการกลายเป็นไอของน้ำ ($L_v = 2,260\text{ J/g}$) ในหม้อนึ่ง Autoclave และการควบคุมอุณหภูมิ 3 ระดับใน PCR
                        </p>
                    </div>

                    <!-- Pillar 8 -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/50 hover:border-emerald-500/40 transition-all space-y-2">
                        <div class="flex items-center gap-2 text-pink-400 font-bold text-sm">
                            <i class="fas fa-bolt"></i>
                            <span>8. ไฟฟ้า ทัศนศาสตร์ &amp; รังสี</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            การวิ่งของ DNA สู่ขั้วบวก, การหักเหน้ำมันหยดเลนส์ 100x ($n=1.518$), กฎเบียร์-แลมเบิร์ต ($\text{OD}_{600}$) และรังสีฆ่าเชื้อ
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/90 to-slate-900 border border-emerald-500/30 shadow-xl space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 border border-emerald-500/30">
                        <i class="fas fa-shapes text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xs font-mono text-emerald-400 uppercase tracking-wider block">Low-Math Biophysics Formula Suite</span>
                        <h3 class="text-lg font-bold text-white">สมการพื้นฐานสำหรับเซนเซอร์ชีวภาพและการสอบเทียบ (Linear Calibration)</h3>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Formula Triangle SVG -->
                    <div class="flex flex-col items-center justify-center p-4 bg-slate-900/80 rounded-xl border border-slate-700/60">
                        <svg viewBox="0 0 280 200" class="w-64 h-auto">
                            <!-- Outer Triangle -->
                            <polygon points="140,20 20,180 260,180" fill="none" stroke="#10b981" stroke-width="4" stroke-linejoin="round"/>
                            <!-- Horizontal dividing line -->
                            <line x1="60" y1="120" x2="220" y2="120" stroke="#10b981" stroke-width="3"/>
                            <!-- Vertical dividing line -->
                            <line x1="140" y1="120" x2="140" y2="180" stroke="#10b981" stroke-width="3"/>
                            <!-- Top Symbol: Output Signal Delta V -->
                            <text x="140" y="80" font-family="sans-serif" font-size="20" font-weight="bold" fill="#34d399" text-anchor="middle">&Delta;V (สัญญาณเซนเซอร์)</text>
                            <text x="140" y="105" font-family="sans-serif" font-size="12" fill="#94a3b8" text-anchor="middle">Output Response (mV)</text>
                            <!-- Bottom Left: Sensitivity S -->
                            <text x="85" y="150" font-family="sans-serif" font-size="18" font-weight="bold" fill="#38bdf8" text-anchor="middle">S</text>
                            <text x="85" y="170" font-family="sans-serif" font-size="10" fill="#94a3b8" text-anchor="middle">ความไว (mV/&mu;M)</text>
                            <!-- Operator x -->
                            <text x="140" y="160" font-family="sans-serif" font-size="20" font-weight="bold" fill="#cbd5e1" text-anchor="middle">&times;</text>
                            <!-- Bottom Right: Concentration Delta C -->
                            <text x="195" y="150" font-family="sans-serif" font-size="18" font-weight="bold" fill="#f59e0b" text-anchor="middle">&Delta;C</text>
                            <text x="195" y="170" font-family="sans-serif" font-size="10" fill="#94a3b8" text-anchor="middle">ความเข้มข้นสาร</text>
                        </svg>
                        <span class="text-xs text-slate-400 font-mono mt-2 text-center">สามเหลี่ยมสูตร: การตอบสนองของเซนเซอร์ $\Delta V = S \cdot \Delta C$</span>
                    </div>

                    <!-- Formula Explanation -->
                    <div class="space-y-3 text-xs md:text-sm text-slate-300">
                        <div class="p-3 rounded-lg bg-slate-900/90 border border-slate-700/80 font-mono">
                            <span class="text-emerald-400 font-bold block mb-1">1. สัญญาณตอบสนองของเซนเซอร์ (Linear Calibration):</span>
                            $$V_{\text{out}} = S \cdot C + V_{\text{blank}}$$
                            <span class="text-slate-400 text-xs">เมื่อ $S$ คือความไว (Slope), $C$ คือความเข้มข้นของเซลล์หรือสารตัวอย่าง, $V_{\text{blank}}$ คือสัญญาณฐาน</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/90 border border-slate-700/80 font-mono">
                            <span class="text-sky-400 font-bold block mb-1">2. การอนุรักษ์พลังงานในตู้บ่มเชื้ออัจฉริยะ (Heat Balance):</span>
                            $$Q_{\text{heater}} = mc\Delta T + Q_{\text{loss}}$$
                            <span class="text-slate-400 text-xs">ความร้อนที่ลวดให้ความร้อนสร้างขึ้น เท่ากับความร้อนที่อากาศ/อาหารเพาะเลี้ยงดูดกลืน บวกความร้อนที่สูญเสียออกสู่สิ่งแวดล้อม</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: 5 Capstone Mini-Project Themes -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 font-mono font-bold flex items-center justify-center text-sm border border-emerald-500/30">13.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">5 กรอบแนวคิดโครงงานย่อยบูรณาการ (Mini-Project Themes)</h2>
                </div>
                <p class="text-sm text-slate-300 leading-relaxed">
                    นักศึกษาแต่ละกลุ่ม (3–4 คน) สามารถเลือก 1 หัวข้อโครงงานเพื่อจัดทำอินโฟกราฟิกทางวิทยาศาสตร์ สไลด์นำเสนอ หรือแบบจำลอง 3D/IoT (คะแนนเต็ม 15 คะแนน):
                </p>

                <div class="space-y-4">
                    <!-- Project 1 -->
                    <div class="p-5 rounded-2xl bg-slate-800/50 border border-slate-700/60 hover:border-emerald-500/30 transition-all flex flex-col md:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 border border-amber-500/30 font-black text-lg">01</div>
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-white">ระบบควบคุมอุณหภูมิและความชื้นตู้บ่มเพาะเชื้อจุลินทรีย์อัจฉริยะ (IoT Smart Incubator)</h3>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <strong>หลักการฟิสิกส์:</strong> อุณหพลศาสตร์ การถ่ายเทความร้อน (การนำ การพา และการแผ่รังสี), กฎของโอห์มในลวดความร้อนฮีตเตอร์, และการทำงานของเซนเซอร์ความต้านทานเทอร์มิสเตอร์ NTC/PT100
                            </p>
                            <span class="inline-block px-2.5 py-1 rounded bg-amber-500/10 text-amber-300 text-[11px] font-mono border border-amber-500/20">
                                เชื่อมโยง: บทที่ 7, บทที่ 9 และบทที่ 10
                            </span>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="p-5 rounded-2xl bg-slate-800/50 border border-slate-700/60 hover:border-emerald-500/30 transition-all flex flex-col md:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-500/30 font-black text-lg">02</div>
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-white">เซนเซอร์ชีวภาพตรวจวัดความหนาแน่นจุลินทรีย์ในดินและปุ๋ยชีวภาพ PGPR (Optical Turbidity Biosensor)</h3>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <strong>หลักการฟิสิกส์:</strong> กฎของเบียร์-แลมเบิร์ต ($A = \varepsilon b c$), การกระเจิงของแสงโดยอนุภาคแขวนลอย (Rayleigh &amp; Mie Scattering) และการแปลงโฟตอนแสงเป็นกระแสไฟฟ้าด้วย Photodiode
                            </p>
                            <span class="inline-block px-2.5 py-1 rounded bg-emerald-500/10 text-emerald-300 text-[11px] font-mono border border-emerald-500/20">
                                เชื่อมโยง: บทที่ 1, บทที่ 10 และบทที่ 11
                            </span>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="p-5 rounded-2xl bg-slate-800/50 border border-slate-700/60 hover:border-emerald-500/30 transition-all flex flex-col md:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center shrink-0 border border-rose-500/30 font-black text-lg">03</div>
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-white">การวิเคราะห์พลศาสตร์และการจัดสมดุลเวกเตอร์ในเครื่องปั่นเหวี่ยงตกตะกอนดีเอ็นเอ (Centrifuge Dynamics)</h3>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <strong>หลักการฟิสิกส์:</strong> แรงสู่ศูนย์กลาง, การแปลงค่า RPM เป็น RCF, โมเมนต์ความเฉื่อย และการหักล้างของเวกเตอร์แรงเหวี่ยง ($\sum \vec{F}_c = \vec{0}$) เพื่อป้องกันโรเตอร์แตกระเบิด
                            </p>
                            <span class="inline-block px-2.5 py-1 rounded bg-rose-500/10 text-rose-300 text-[11px] font-mono border border-rose-500/20">
                                เชื่อมโยง: บทที่ 2, บทที่ 4 และบทที่ 8
                            </span>
                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div class="p-5 rounded-2xl bg-slate-800/50 border border-slate-700/60 hover:border-emerald-500/30 transition-all flex flex-col md:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0 border border-cyan-500/30 font-black text-lg">04</div>
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-white">การประเมินรังสี UV-C และแสงแดดในการทำลายเชื้อจุลินทรีย์ในระบบบำบัดน้ำเสียการเกษตร (Photosterilization)</h3>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <strong>หลักการฟิสิกส์:</strong> กฎกำลังสองผกผัน ($I \propto 1/r^2$), พลังงานของโฟตอน ($E = hf$), และกลไกการดูดกลืนแสง UV ความยาวคลื่น $254\text{ nm}$ เพื่อทำลายพันธะไทมีนไดเมอร์ในดีเอ็นเอ
                            </p>
                            <span class="inline-block px-2.5 py-1 rounded bg-cyan-500/10 text-cyan-300 text-[11px] font-mono border border-cyan-500/20">
                                เชื่อมโยง: บทที่ 11 และบทที่ 12
                            </span>
                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div class="p-5 rounded-2xl bg-slate-800/50 border border-slate-700/60 hover:border-emerald-500/30 transition-all flex flex-col md:flex-row gap-5 items-start">
                        <div class="w-12 h-12 rounded-xl bg-violet-500/20 text-violet-400 flex items-center justify-center shrink-0 border border-violet-500/30 font-black text-lg">05</div>
                        <div class="space-y-2">
                            <h3 class="text-base font-bold text-white">ฟิสิกส์ของตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) และการไหลแบบราบเรียบ (Laminar Airflow)</h3>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                <strong>หลักการฟิสิกส์:</strong> กลศาสตร์ของไหล, สมการความต่อเนื่อง ($A_1 v_1 = A_2 v_2$), ความดันตกคร่อมแผ่นกรอง HEPA (ดักจับอนุภาค $0.3\ \mu\text{m}$ ที่ 99.97%) และม่านอากาศคุ้มกันผู้ปฏิบัติงาน
                            </p>
                            <span class="inline-block px-2.5 py-1 rounded bg-violet-500/10 text-violet-300 text-[11px] font-mono border border-violet-500/20">
                                เชื่อมโยง: บทที่ 3, บทที่ 6 และบทที่ 12
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-emerald-950/60 via-slate-900 to-teal-950/60 border border-emerald-500/40 shadow-2xl space-y-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b border-slate-800 pb-4">
                    <div>
                        <span class="text-xs font-mono text-emerald-400 uppercase tracking-wider block">Interactive 3D Virtual Lab &amp; WebAR Suite</span>
                        <h3 class="text-xl font-bold text-white">ศูนย์รวมแล็บฟิสิกส์ 3 มิติ และสแกนเนอร์ WebAR เสมือนจริง</h3>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                        12 Virtual Labs + ArUco 0–11
                    </span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-3 text-xs md:text-sm text-slate-300">
                        <p>
                            เพื่อสนับสนุนการทำโครงงานบูรณาการ นักศึกษาสามารถเข้าถึงชุดการทดลองเสมือนจริง 3 มิติทั้ง 12 ปฏิบัติการ ผ่านเว็บเบราว์เซอร์ได้โดยตรงโดยไม่ต้องติดตั้งโปรแกรมเพิ่มเติม:
                        </p>
                        <ul class="space-y-1.5 text-xs text-slate-300">
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-emerald-400"></i>
                                <span><strong>3D Virtual Lab Hub:</strong> ทดลองหมุน ปรับค่าตัวแปร และบันทึกผลการทดลอง</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-emerald-400"></i>
                                <span><strong>WebAR ArUco Scanner:</strong> ส่องสัญลักษณ์ในเอกสารคำสอนเพื่อดูโมเดล 3D แบบ AR ทะลุจอ</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="fas fa-check text-emerald-400"></i>
                                <span><strong>E-Report System:</strong> ส่งผลการทดลองและประเมินผลผ่านระบบฐานข้อมูลอัตโนมัติ</span>
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col gap-3">
                        <a href="../../virtual_lab/index.html" target="_blank" class="p-4 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold text-sm flex items-center justify-between shadow-lg shadow-emerald-500/20 transition-all">
                            <span class="flex items-center gap-2.5">
                                <i class="fas fa-vr-cardboard text-xl"></i>
                                <span>เข้าสู่ 3D Virtual Lab Hub รวม 12 ปฏิบัติการ</span>
                            </span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <a href="../webar/index.html" target="_blank" class="p-4 rounded-xl bg-slate-800/90 hover:bg-slate-700/90 text-slate-200 font-bold text-sm flex items-center justify-between border border-slate-700 transition-all">
                            <span class="flex items-center gap-2.5">
                                <i class="fas fa-camera text-cyan-400 text-xl"></i>
                                <span>เปิดกล้องสแกน 3D WebAR ArUco Markers</span>
                            </span>
                            <i class="fas fa-external-link-alt text-xs text-slate-400"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. Biosafety & Laboratory Warning Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-amber-500/10 via-slate-900 to-slate-900 border border-amber-500/30 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center text-amber-400 border border-amber-500/30">
                        <i class="fas fa-biohazard text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xs font-mono text-amber-400 uppercase tracking-wider block">Laboratory Safety Protocol</span>
                        <h3 class="text-lg font-bold text-white">4 มาตรการความปลอดภัยและจรรยาบรรณวิจัยในการทำโครงงานชีวฟิสิกส์</h3>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-3.5 rounded-xl bg-slate-900/80 border border-slate-800 space-y-1">
                        <span class="text-amber-400 font-bold block"><i class="fas fa-shield-virus mr-1"></i> 1. การกักกันทางชีวภาพ (Biological Containment)</span>
                        <p class="text-slate-400 text-xs">
                            โครงงานในระดับปริญญาตรีอนุญาตให้ใช้เฉพาะเชื้อจุลินทรีย์ระดับความปลอดภัย BSL-1 (เช่น <em>E. coli</em> สายพันธุ์ห้องปฏิบัติการ, ยีสต์) ห้ามนำเชื้อก่อโรค BSL-2 หรือตัวอย่างจากสิ่งแวดล้อมที่ไม่ทราบชนิดออกนอกห้องแล็บเด็ดขาด
                        </p>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/80 border border-slate-800 space-y-1">
                        <span class="text-amber-400 font-bold block"><i class="fas fa-plug-circle-exclamation mr-1"></i> 2. ความปลอดภัยทางไฟฟ้าในสภาพแวดล้อมเปียกชื้น</span>
                        <p class="text-slate-400 text-xs">
                            การต่อวงจรเซนเซอร์ IoT หรือปั๊มน้ำในถังเพาะเลี้ยง ต้องใช้แหล่งจ่ายไฟแรงดันต่ำกระแสตรง (&le; 12V DC) และใช้อุปกรณ์แยกสัญญาณเชิงแสง (Optocoupler Isolation) เพื่อป้องกันไฟฟ้าดูดหรือไฟฟ้าลัดวงจร
                        </p>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/80 border border-slate-800 space-y-1">
                        <span class="text-amber-400 font-bold block"><i class="fas fa-sliders-h mr-1"></i> 3. การสอบเทียบเซนเซอร์ตามมาตรฐาน (Sensor Calibration)</span>
                        <p class="text-slate-400 text-xs">
                            เซนเซอร์วัดค่าทุกตัว (pH, DO, ความขุ่น, อุณหภูมิ) ต้องได้รับการสอบเทียบด้วยสารละลายมาตรฐาน (Buffer Standard) และทดสอบความสามารถในการทำซ้ำ (Repeatability) ก่อนนำไปใช้เก็บข้อมูลจริงในงานวิจัย
                        </p>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/80 border border-slate-800 space-y-1">
                        <span class="text-amber-400 font-bold block"><i class="fas fa-recycle mr-1"></i> 4. การจัดการของเสียชีวภาพและการนึ่งฆ่าเชื้อ</span>
                        <p class="text-slate-400 text-xs">
                            สารแขวนลอยเซลล์และอาหารเลี้ยงเชื้อที่ใช้แล้วทั้งหมด ต้องผ่านการอบฆ่าเชื้อด้วยหม้อนึ่งความดันไอ Autoclave ($121^\circ\text{C}, 15\text{ psi}, 15\text{ นาที}$) ก่อนนำไปทิ้งตามระบบกำจัดของเสียอันตรายของมหาวิทยาลัย
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical & Agricultural Case Study / Research Highlight Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/40 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-xl space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                        <i class="fas fa-microchip text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xs font-mono text-indigo-400 uppercase tracking-wider block">Research Highlight &bull; Precision Agriculture</span>
                        <h3 class="text-lg font-bold text-white">กรณีศึกษา: การผสานฟิสิกส์เกษตรดิจิทัลและจุลชีววิทยาสิ่งแวดล้อม (มรภ.รำไพพรรณี)</h3>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-6 items-center">
                    <div class="md:col-span-1 rounded-xl overflow-hidden border border-indigo-500/30 shadow-md">
                        <img src="../images/tech_digital_twin.png" alt="Digital Twin &amp; Smart Bio-Agriculture" class="w-full h-auto object-cover">
                    </div>
                    <div class="md:col-span-2 space-y-3 text-xs md:text-sm text-slate-300">
                        <p class="leading-relaxed">
                            คณะทำงานวิจัยฟิสิกส์เกษตรดิจิทัลและจุลชีววิทยาประยุกต์ มหาวิทยาลัยราชภัฏรำไพพรรณี ได้พัฒนาระบบ <strong>Smart Bio-Fertilizer Fermentation Telemetry</strong> สำหรับติดตามการเจริญเติบโตของแบคทีเรียส่งเสริมการเจริญของพืช (PGPR) เช่น <em>Bacillus subtilis</em> และ <em>Pseudomonas fluorescens</em> ที่ใช้ในสวนทุเรียนเมืองจันทบุรี
                        </p>
                        <p class="leading-relaxed text-slate-400">
                            ระบบใช้เซนเซอร์วัดค่าทางกายภาพ 4 ประการ: (1) อุณหภูมิอาหารเลี้ยงเชื้อด้วย RTD, (2) ค่า pH และการนำไฟฟ้า (EC), (3) ค่าการดูดกลืนแสง $\text{OD}_{600}$ ด้วย LED แสงสีส้มและโฟโตไดโอด, และ (4) อัตราการกวนและถ่ายโอนออกซิเจน ($k_L a$) ซึ่งควบคุมด้วยไมโครคอนโทรลเลอร์ส่งข้อมูลผ่านสัญญาณไร้สาย ทำให้เกษตรกรและนักวิจัยทราบจุดสิ้นสุดระยะ Log phase ที่มีจำนวนเซลล์แบคทีเรียแข็งแรงสูงสุด พร้อมนำไปฉีดพ่นลงแปลงปลูกได้อย่างมีประสิทธิภาพสูงสุด
                        </p>
                        <div class="flex flex-wrap gap-2 pt-1 font-mono text-[11px] text-indigo-300">
                            <span class="px-2 py-0.5 rounded bg-indigo-500/10 border border-indigo-500/20">Edge AI Telemetry</span>
                            <span class="px-2 py-0.5 rounded bg-indigo-500/10 border border-indigo-500/20">PGPR Bio-Inoculants</span>
                            <span class="px-2 py-0.5 rounded bg-indigo-500/10 border border-indigo-500/20">Durian Precision Agri</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 border border-emerald-500/30">
                        <i class="fas fa-question-circle text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">แบบทดสอบประเมินตนเองบูรณาการ (OBE Capstone Self-Quiz)</h3>
                        <p class="text-xs text-slate-400 font-mono">วัดผลลัพธ์การเรียนรู้ CLO1 &bull; CLO2 &bull; CLO3 &bull; CLO4</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Q1 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 1: ในการสร้างเซนเซอร์วัดความขุ่นของเซลล์จุลินทรีย์ (Turbidity Sensor) เหตุใดจึงควรเลือกใช้แสงที่มีความยาวคลื่นประมาณ $600\text{ nm}$ มากกว่าแสงสีขาวหรือแสง UV?</span>
                            <i class="fas fa-chevron-down text-emerald-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพื่อหลีกเลี่ยงการดูดกลืนแสงของสารอาหารเลี้ยงเชื้อและสารชีวโมเลกุลในเซลล์</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ที่ความยาวคลื่น $600\text{ nm}$ สารประกอบสีเหลืองในอาหารเลี้ยงเชื้อ (Nutrient Broth) และสารชีวโมเลกุลในเซลล์ (เช่น โปรตีนดูดกลืนที่ $280\text{ nm}$, กรดนิวคลีอิกดูดกลืนที่ $260\text{ nm}$) จะดูดกลืนแสงน้อยมาก การลดลงของความเข้มแสงจึงเกิดจากการกระเจิง (Scattering) โดยตัวเซลล์แบคทีเรียโดยตรง ทำให้ค่า $\text{OD}_{600}$ แปรผันตรงกับความหนาแน่นของเซลล์อย่างแท้จริง
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: หากกราฟการตอบสนองของเซนเซอร์ระหว่างสัญญาณเอาต์พุตกับความเข้มข้นสาร เริ่มเกิดความไม่เป็นเส้นตรง (Non-linear Saturation) ที่ความเข้มข้นสูง จะแก้ไขในทางฟิสิกส์อย่างไร?</span>
                            <i class="fas fa-chevron-down text-emerald-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เจือจางตัวอย่าง (Dilution) หรือลดความยาวช่วงแสงของทางเดินแสง (Path Length $b$)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ตามกฎของเบียร์-แลมเบิร์ต ($A = \varepsilon b c$) และทฤษฎีเซนเซอร์ เมื่อความเข้มข้นสูงเกินไป เซลล์จะเกิดการบดบังแสงซ้อนทับกัน (Multiple Scattering) การเจือจางตัวอย่างลงให้อยู่ในช่วงเชิงเส้น (Linear Range) แล้วค่อยนำตัวคูณการเจือจางไปคูณกลับ จะได้ค่าที่ถูกต้องแม่นยำ
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: ในการออกแบบตู้บ่มเพาะเชื้อจุลินทรีย์ (Smart Incubator) ทำไมจึงจำเป็นต้องติดตั้งพัดลมหมุนเวียนอากาศภายในตู้ แทนที่จะอาศัยเพียงลวดความร้อนฮีตเตอร์ด้านล่าง?</span>
                            <i class="fas fa-chevron-down text-emerald-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: เพื่อสร้างการพาความร้อนแบบบังคับ (Forced Convection) ลดความชันของอุณหภูมิ (Thermal Gradient)</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> หากไม่มีพัดลม อากาศร้อนจะลอยขึ้นสู่ด้านบนและอากาศเย็นจมลงสู่ด้านล่าง (การพาความร้อนตามธรรมชาติ) ทำให้อุณหภูมิในตู้ไม่สม่ำเสมอ แบคทีเรียที่วางต่างชั้นจะโตไม่เท่ากัน พัดลมจะช่วยให้อุณหภูมิกระจายสม่ำเสมอทั่วทุกจุดในตู้ ($\pm 0.5^\circ\text{C}$)
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch12_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 12: ฟิสิกส์นิวเคลียร์และการทำลายเชื้อจุลินทรีย์
                </a>
                <a href="../index.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-emerald-500/20">
                    <i class="fas fa-th-large mr-1"></i> กลับสู่หน้าหลักบทเรียนทฤษฎี (12 บท + Capstone)
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
