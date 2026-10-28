<?php
$pageTitle = "บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์";
$basePath = '../';
include '../includes/header.php';
?>

<!-- Scroll Progress Bar -->
<div id="scrollProgressBar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-cyan-400 via-emerald-400 to-indigo-500 z-[100] transition-all duration-150" style="width: 0%;"></div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 15%, #0f172a 0%, #020617 80%); padding: 90px 0 50px;">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center flex-wrap gap-2 text-xs text-slate-400 mb-4 font-mono">
                <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors flex items-center gap-1.5">
                    <i class="fas fa-house"></i> พอร์ทัลหลัก 2027
                </a>
                <span class="text-slate-600">/</span>
                <a href="../index.php" class="hover:text-amber-400 transition-colors flex items-center gap-1">
                    <i class="fas fa-book-open"></i> สารบัญ 12 บทเรียน
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2.5 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 1</span>
            </nav>

            <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-300 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs text-cyan-400"></i> MODULE 01 &bull; UNITS, METROLOGY & MICRO-PHYSICS
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white drop-shadow-md">
                ระบบหน่วยและการวัดในโลกจุลทรรศน์
            </h1>

            <!-- 3D Pixar Hero Cinematic Artwork -->
            <div class="my-6 rounded-2xl overflow-hidden border border-cyan-500/30 shadow-2xl bg-slate-950/80 max-w-3xl mx-auto group">
                <img src="../images/sec_3d/ch01_hero_banner_3d.jpg" alt="แบนเนอร์ 3 มิติ สไตล์พิกซาร์ บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
            </div>

            <p class="text-sm md:text-base text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 1)
            </p>

            <!-- Quick Meta Badges -->
            <div class="mt-5 flex flex-wrap justify-center gap-2.5 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 1 (OBE มคอ.3)
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=0&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 0 ↗
                </a>
                <a href="../../virtual_lab/sim_micropipette_3d.html" target="_blank" class="px-3 py-1.5 rounded-lg bg-purple-500/20 hover:bg-purple-500/30 border border-purple-400/40 text-purple-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-vr-cardboard text-purple-400"></i> 3D Virtual Lab ↗
                </a>
            </div>

            <!-- Action CTA Buttons & Font Resizer -->
            <div class="mt-6 flex flex-wrap justify-center items-center gap-3">
                <a href="../labs/lab01_measurement.php" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white border border-emerald-400/30 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 01: การวัดละเอียดและทักษะไมโครปิเปต (3 ชม.)</span>
                </a>
                <!-- Font Resizer Pills -->
                <div class="flex items-center bg-slate-800/90 border border-slate-700/80 rounded-xl px-2 py-1 gap-1 text-xs font-mono text-slate-300">
                    <span class="text-[10px] text-slate-400 px-1">ขนาดฟอนต์:</span>
                    <button type="button" onclick="adjustFontSize(-1)" class="w-6 h-6 rounded hover:bg-slate-700 flex items-center justify-center text-slate-200" title="ลดขนาดตัวอักษร">A-</button>
                    <button type="button" onclick="adjustFontSize(0)" class="w-6 h-6 rounded hover:bg-slate-700 flex items-center justify-center text-slate-200" title="ขนาดเริ่มต้น">100%</button>
                    <button type="button" onclick="adjustFontSize(1)" class="w-6 h-6 rounded hover:bg-slate-700 flex items-center justify-center text-slate-200" title="เพิ่มขนาดตัวอักษร">A+</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Sticky Table of Contents Quick Nav Bar -->
    <div class="sticky top-0 z-40 bg-slate-900/90 backdrop-blur-md border-b border-slate-800/80 py-2.5 shadow-md">
        <div class="container mx-auto px-4 max-w-5xl flex items-center justify-between gap-3 overflow-x-auto text-xs font-mono whitespace-nowrap scrollbar-none">
            <span class="text-slate-400 font-bold flex items-center gap-1.5 text-[11px] uppercase tracking-wider">
                <i class="fa-solid fa-compass text-cyan-400"></i> ทางลัดหัวข้อ:
            </span>
            <div class="flex items-center gap-2">
                <a href="#curriculum-plan" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-indigo-600/30 text-slate-300 hover:text-indigo-300 border border-slate-700/60 transition">📋 แผนการสอน</a>
                <a href="#sec-1.1" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-cyan-600/30 text-slate-300 hover:text-cyan-300 border border-slate-700/60 transition">1.1 หน่วยเอสไอ & 7 ค่าคงตัว</a>
                <a href="#tab-1.1" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-cyan-600/30 text-slate-300 hover:text-cyan-300 border border-slate-700/60 transition">📊 ตาราง 7 หน่วยฐาน</a>
                <a href="#sec-1.2" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-emerald-600/30 text-slate-300 hover:text-emerald-300 border border-slate-700/60 transition">1.2 บันไดเลื่อนจุดทศนิยม</a>
                <a href="#sec-aruco" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-emerald-600/30 text-slate-300 hover:text-emerald-300 border border-slate-700/60 transition">🥽 ArUco ID:0</a>
                <a href="#sec-1.3" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-amber-600/30 text-slate-300 hover:text-amber-300 border border-slate-700/60 transition">1.3 ความเที่ยง แม่น & ปิเปต</a>
                <a href="#sec-1.4" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-teal-600/30 text-slate-300 hover:text-teal-300 border border-slate-700/60 transition">1.4 ปฏิบัติการที่ 1</a>
                <a href="#review-questions" class="px-2.5 py-1 rounded-lg bg-slate-800/80 hover:bg-indigo-600/30 text-slate-300 hover:text-indigo-300 border border-slate-700/60 transition">📝 คำถามท้ายบท</a>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 mt-6 relative z-20 max-w-5xl">
        <div id="chapterContent" class="rounded-3xl shadow-2xl overflow-hidden border p-5 sm:p-8 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12 transition-all">

            <!-- Curriculum Planbox (แผนบริหารการสอนประจำบทที่ 1) -->
            <div id="curriculum-plan" class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/40 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-xl">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-indigo-500/20">
                    <div class="w-11 h-11 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30 shadow-inner">
                        <i class="fa-solid fa-chalkboard-user text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg md:text-xl font-bold text-white flex items-center gap-2">
                            แผนบริหารการสอนประจำบทที่ 1
                            <span class="text-xs px-2.5 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 font-mono">สัปดาห์ที่ 1</span>
                        </h3>
                        <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ Outcome-Based Education (OBE มคอ.3) พ.ศ. 2569/2570</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-slate-300">
                    <!-- Column 1: Topics & CLOs -->
                    <div class="space-y-4">
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800">
                            <h4 class="text-xs font-bold font-mono uppercase text-indigo-300 tracking-wider mb-2 flex items-center gap-1.5">
                                <i class="fa-solid fa-list-check"></i> 1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชม. + ปฏิบัติการ 3 ชม.)
                            </h4>
                            <ul class="text-xs space-y-1.5 text-slate-300 list-disc list-inside">
                                <li><strong>1.1</strong> ระบบหน่วยเอสไอและ 7 ค่าคงตัวพื้นฐานในงานจุลชีววิทยา</li>
                                <li><strong>1.2</strong> การแปลงหน่วยเซลล์และปริมาตรด้วยเทคนิคบันไดเลื่อนจุดทศนิยม</li>
                                <li><strong>1.3</strong> เลขนัยสำคัญ ความเที่ยง ความแม่น และการใช้ไมโครปิเปต</li>
                                <li><strong>1.4</strong> ปฏิบัติการที่ 1 การวัดละเอียดและทักษะการใช้ไมโครปิเปต</li>
                            </ul>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-950/60 border border-indigo-500/20">
                            <h4 class="text-xs font-bold font-mono uppercase text-indigo-300 tracking-wider mb-2 flex items-center gap-1.5">
                                <i class="fa-solid fa-bullseye"></i> 2. ผลลัพธ์การเรียนรู้รายวิชา (CLOs & PLOs)
                            </h4>
                            <ul class="text-xs space-y-2 text-slate-300">
                                <li class="flex items-start gap-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-cyan-500/20 text-cyan-300 text-[10px] font-mono font-bold shrink-0 mt-0.5">CLO1</span>
                                    <span>อธิบายระบบหน่วยสากลเอสไอ 2019 และคำอุปสรรคสำหรับแบคทีเรีย ยีสต์ และไวรัสได้ถูกต้อง <em>(เชื่อมโยง PLO2)</em></span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-emerald-500/20 text-emerald-300 text-[10px] font-mono font-bold shrink-0 mt-0.5">CLO2</span>
                                    <span>คำนวณแปลงหน่วยระหว่าง $\text{mm} \leftrightarrow \mu\text{m} \leftrightarrow \text{nm}$ และ $\text{mL} \leftrightarrow \mu\text{L}$ ได้คล่องแคล่ว <em>(เชื่อมโยง PLO2, PLO3)</em></span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-amber-500/20 text-amber-300 text-[10px] font-mono font-bold shrink-0 mt-0.5">CLO3</span>
                                    <span>มีทักษะการใช้เวอร์เนียร์ ไมโครมิเตอร์ เครื่องชั่งดิจิทัล และไมโครปิเปตอย่างถูกวิธี <em>(เชื่อมโยง PLO1)</em></span>
                                </li>
                                <li class="flex items-start gap-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-purple-500/20 text-purple-300 text-[10px] font-mono font-bold shrink-0 mt-0.5">CLO4</span>
                                    <span>วิเคราะห์ความคลาดเคลื่อนของการวัดและเขียนรายงานผลการทดลองกลุ่มได้ถูกต้อง <em>(เชื่อมโยง PLO5, PLO6)</em></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Column 2: Active Learning & Evaluation -->
                    <div class="space-y-4">
                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800">
                            <h4 class="text-xs font-bold font-mono uppercase text-emerald-300 tracking-wider mb-2 flex items-center gap-1.5">
                                <i class="fa-solid fa-users-gear"></i> 3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning)
                            </h4>
                            <ul class="text-xs space-y-2 text-slate-300">
                                <li>
                                    <strong class="text-white">ขั้นนำเข้าสู่บทเรียน:</strong> ยกกรณีศึกษาแล็บจริง การดูดสารละลายผิดหน่วยระหว่าง $100\text{ }\mu\text{L}$ กับ $1\text{ mL}$ ที่ทำให้ความเข้มข้นเชื้อคลาดเคลื่อน 10 เท่า
                                </li>
                                <li>
                                    <strong class="text-white">ขั้นสอนและฝึกคิดคำนวณ:</strong> ใช้แผนภาพบันไดคำอุปสรรค ($\times 1{,}000$ และ $\div 1{,}000$) พร้อมทำใบงานคู่คิด (Think-Pair-Share)
                                </li>
                                <li>
                                    <strong class="text-white">ขั้นทดลองปฏิบัติการ:</strong> แบ่งกลุ่มฝึกใช้เครื่องมือวัดละเอียดและทดสอบความแม่นของการดูดน้ำกลั่นด้วยไมโครปิเปตบนเครื่องชั่ง 4 ตำแหน่ง
                                </li>
                            </ul>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800">
                            <h4 class="text-xs font-bold font-mono uppercase text-amber-300 tracking-wider mb-2 flex items-center gap-1.5">
                                <i class="fa-solid fa-chart-pie"></i> 4. การวัดและประเมินผล & สื่อการเรียนรู้
                            </h4>
                            <div class="text-xs space-y-1.5 text-slate-300">
                                <p><strong>การประเมิน:</strong> แบบทดสอบก่อน-หลังเรียน (CLO1), สังเกตทักษะการใช้ไมโครปิเปต (CLO3), รายงานผลปฏิบัติการที่ 1 (CLO4)</p>
                                <p><strong>สื่อนวัตกรรม:</strong> เอกสารคำสอน 3D AR ArUco ID: 0, 3D Virtual Lab Simulator, ชุดเครื่องมือวัดละเอียดจริง</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 1.1 -->
            <section id="sec-1.1" class="tex-section scroll-mt-20">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 font-black font-mono flex items-center justify-center text-lg border border-cyan-500/30">1.1</span>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                        ระบบหน่วยสากลเอสไอ (SI Units) วิวัฒนาการจากอดีตสู่ปัจจุบัน และบทบาทในงานจุลชีววิทยา
                    </h2>
                </div>

                <div class="tex-article leading-relaxed space-y-6 text-slate-200">
                    <!-- Figure 1.1: 3D Scale Comparison Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.1">
                        <div class="rounded-2xl overflow-hidden border border-cyan-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_scale_3d.jpg" alt="ภาพที่ 1.1 การเปรียบเทียบสเกลขนาดในโลกจุลชีววิทยา 3 มิติ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-cyan-400">ภาพที่ 1.1</strong>&ensp;แบบจำลอง 3 มิติแสดงการเปรียบเทียบสเกลขนาดในโลกจุลชีววิทยา: ตั้งแต่ระดับมองเห็นด้วยตาเปล่าบนจานเพาะเชื้อ ($\text{mm}$), เซลล์แบคทีเรียเดี่ยว ($\mu\text{m}$) ไปจนถึงอนุภาคแบคเทอริโอเฟจและเกลียวคู่ดีเอ็นเอ ($\text{nm}$) พร้อมหน่วยวัดมาตรฐานเอสไอ
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        ระบบหน่วยระหว่างชาติ หรือ <strong>ระบบหน่วยเอสไอ</strong> (<strong>International System of Units</strong> หรือ <strong>Le Système International d'Unités — SI</strong>) เป็นภาษาสากลทางวิทยาศาสตร์ที่ทำให้นักจุลชีววิทยาทั่วโลกสามารถสื่อสารข้อมูลเชิงปริมาณร่วมกันได้อย่างเที่ยงตรง ไม่ว่าจะเป็นขนาดของเซลล์ ความหนาของเยื่อหุ้มเซลล์ อุณหภูมิการบ่มเพาะเชื้อ เวลาการแบ่งเซลล์ ปริมาตรสารละลายบัฟเฟอร์ และความเข้มข้นของสารอาหาร
                    </p>

                    <!-- SI 2019 Redefinition Highlight Card -->
                    <div class="p-6 rounded-2xl bg-gradient-to-br from-cyan-950/50 via-slate-900 to-slate-900 border border-cyan-500/30 space-y-3 shadow-lg">
                        <div class="flex items-center gap-2.5 text-cyan-300 font-bold text-base">
                            <i class="fa-solid fa-atom text-cyan-400 text-lg"></i> การปฏิวัติประวัติศาสตร์ระบบหน่วยเอสไอ ค.ศ. 2019 (The 2019 SI Redefinition)
                        </div>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในอดีต ระบบหน่วยวัดผูกโยงอยู่กับ <strong>"วัตถุประดิษฐ์ทางกายภาพ (Physical Artifacts)"</strong> เช่น แท่งเมตรมาตรฐานแพลทินัม-อิริเดียม หรือก้อนกิโลกรัมต้นแบบนานาชาติ (<em>Le Grand K</em>) ซึ่งมีข้อจำกัดร้ายแรงคือ <em>มวลสามารถเปลี่ยนแปลงได้ตามกาลเวลาจากการสึกหรอหรือปนเปื้อนฝุ่นผงระดับไมโครกรัม</em> และหากวัตถุต้นแบบสูญหายหรือเสียหาย มาตรฐานการวัดของมนุษยชาติจะสั่นคลอนทันที
                        </p>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            จนกระทั่งเมื่อวันที่ <strong>20 พฤษภาคม ค.ศ. 2019</strong> ที่ประชุมใหญ่ว่าด้วยการชั่งตวงวัด (CGPM / BIPM) ได้ประกาศการเปลี่ยนแปลงครั้งประวัติศาสตร์ โดย <strong>"ยกเลิกการนิยามหน่วยผ่านวัตถุประดิษฐ์ทั้งหมด"</strong> แล้วเปลี่ยนมากำหนดค่าคงที่ที่แน่นอน (Exact Numerical Values โดยไม่มีความคลาดเคลื่อน $\Delta = 0$) ให้กับ <strong>7 ค่าคงตัวพื้นฐานแห่งเอกภพ (The 7 Defining Physical Constants)</strong> ทำให้ทุกห้องปฏิบัติการทั่วโลกสามารถสร้างมาตรฐานหน่วยวัดที่เที่ยงตรงได้ด้วยตนเอง
                        </p>
                    </div>

                    <!-- 3D Master Scene: Authentic Historical Physical Artifacts -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-historical-artifacts">
                        <div class="rounded-2xl overflow-hidden border border-cyan-500/40 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_artifacts_pixar_3d.jpg" alt="วัตถุประดิษฐ์ต้นแบบประวัติศาสตร์ 3 มิติ (BIPM Historical Artifacts in 3D Pixar)" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-cyan-400">ภาพที่ 1.2</strong>&ensp;แบบจำลอง 3 มิติวัตถุประดิษฐ์ต้นแบบทางกายภาพในอดีต (Historical Physical Artifacts in 3D Pixar): แท่งเมตรมาตรฐานหน้าตัด Tresca (1889), ก้อนมวลกิโลกรัม Le Grand K (1889) ในครอบแก้วสุญญากาศ 3 ชั้น, และหอนาฬิกาอะตอมซีเซียม ณ ห้องนิรภัยมาตรวิทยา BIPM ก่อนการปฏิวัติสู่ 7 ค่าคงตัวพื้นฐาน ค.ศ. 2019
                        </figcaption>
                    </figure>

                    <!-- SVG Diagram 1: SI Network -->
                    <figure class="tex-figure tex-figure-diagram my-8" id="fig-si-network">
                        <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl bg-slate-950 p-3 sm:p-4">
                            <img src="../images/maintex/tikz/ch01_si_network.svg" alt="แผนผัง 7 ค่าคงตัวพื้นฐานกับ 7 หน่วยฐานเอสไอ" class="w-full h-auto" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-cyan-400">ภาพที่ 1.3</strong>&ensp;แผนผังเครือข่ายความสัมพันธ์ระหว่าง 7 ค่าคงตัวพื้นฐานแห่งเอกภพ (Defining Constants) สู่ 7 หน่วยฐานเอสไอ (Revised SI 2019) ได้แก่ วินาที ($\text{s}$), เมตร ($\text{m}$), กิโลกรัม ($\text{kg}$), แอมแปร์ ($\text{A}$), เคลวิน ($\text{K}$), โมล ($\text{mol}$) และแคนเดลา ($\text{cd}$)
                        </figcaption>
                    </figure>

                    <!-- 7 SI Base Units Detailed Cards -->
                    <div class="pt-4 space-y-6">
                        <h3 class="text-xl font-bold text-white border-b border-slate-800 pb-3 flex items-center gap-2">
                            <i class="fa-solid fa-list-ol text-cyan-400"></i> เจาะลึก 7 หน่วยฐานเอสไอ (7 SI Base Units): นิยามจากอดีตสู่ปัจจุบัน
                        </h3>

                        <!-- Unit 1: Metre -->
                        <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-cyan-500/40 transition-all space-y-4 shadow-lg">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-cyan-500/20 text-cyan-400 font-bold flex items-center justify-center font-mono text-base border border-cyan-500/30">1</span>
                                    <div>
                                        <h4 class="text-base sm:text-lg font-bold text-white">ความยาว (Length, $l$) — เมตร (Metre, $\text{m}$)</h4>
                                        <span class="text-xs text-cyan-400 font-mono">ตรึงค่าคงตัว: อัตราเร็วของแสงในสุญญากาศ $c = 299{,}792{,}458\text{ m/s}$</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 text-xs font-mono font-bold border border-cyan-500/30">SI BASE: m</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                                    <strong class="text-amber-400 block mb-1.5"><i class="fa-solid fa-landmark"></i> นิยามในอดีต:</strong>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li><strong>ค.ศ. 1791:</strong> หนึ่งในสิบล้าน ($\frac{1}{10^7}$) ของระยะทางจากขั้วโลกเหนือถึงเส้นศูนย์สูตรผ่านปารีส</li>
                                        <li><strong>ค.ศ. 1889:</strong> ระยะห่างระหว่างรอยขีดบนแท่งโลหะผสมแพลทินัม-อิริเดียม 90:10 (Standard Metre Bar)</li>
                                        <li><strong>ค.ศ. 1960:</strong> $1{,}650{,}763.73$ เท่าของความยาวคลื่นแสงสีส้ม-แดงของอะตอม $^{86}\text{Kr}$</li>
                                    </ul>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                                    <strong class="text-emerald-400 block mb-1.5"><i class="fa-solid fa-microscope"></i> นิยามในปัจจุบัน (ตั้งแต่ ค.ศ. 1983):</strong>
                                    <p class="leading-relaxed">
                                        <em>"ระยะทางที่แสงเคลื่อนที่ได้ในสุญญากาศ ในช่วงเวลาเท่ากับ $\frac{1}{299{,}792{,}458}$ วินาที"</em> โดยกำหนดให้อัตราเร็วแสงในสุญญากาศ $c$ มีค่าคงที่แน่นอนเท่ากับ $299{,}792{,}458\text{ m/s}$
                                    </p>
                                    <div class="mt-2 text-slate-400 font-mono text-[11px] border-t border-slate-800 pt-1.5">
                                        <strong>บทบาทในจุลชีววิทยา:</strong> วัดเส้นผ่านศูนย์กลางโคโลนีบนจานวุ้น ($\text{mm}$), วัดขนาดเซลล์แบคทีเรีย ($\mu\text{m}$), ความหนาเยื่อหุ้มเซลล์ และขนาดอนุภาคไวรัส ($\text{nm}$)
                                    </div>
                                </div>
                            </div>
                            <!-- 3D Close-up: Standard Metre Bar (Tresca Section) -->
                            <div class="rounded-2xl overflow-hidden border border-cyan-500/30 shadow-xl bg-slate-950 mt-3">
                                <img src="../images/sec_3d/ch01_metre_tresca_3d.jpg" alt="แบบจำลอง 3 มิติ แท่งเมตรมาตรฐานแพลทินัม-อิริเดียม 1889 หน้าตัดขวางแบบเทรสกา (Tresca X-section)" class="w-full h-auto object-cover" loading="lazy">
                                <div class="p-3 bg-slate-950/90 text-xs text-slate-400 text-center border-t border-slate-800 font-mono">
                                    <strong>ภาพ 3 มิติ:</strong> แท่งเมตรมาตรฐาน $\text{Pt-Ir}$ 1889 หน้าตัดขวางรูปกากบาทแบบเทรสกา (Tresca section) วางบนลูกกลิ้งจุดแอรี่ในกล่องไม้มะฮอกกานี พร้อมลำแสงเลเซอร์แสดงนิยามใหม่ผ่านความเร็วแสง $c = 299{,}792{,}458\text{ m/s}$
                                </div>
                            </div>

                            <!-- Figure: Def Metre -->
                            <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                                <img src="../images/maintex/tikz/ch01_def_meter.svg" alt="วิวัฒนาการนิยาม 1 เมตร" class="w-full h-auto" loading="lazy">
                            </div>
                        </div>

                        <!-- Unit 2: Kilogram (With 3D Kibble Balance Render) -->
                        <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-amber-500/40 transition-all space-y-4 shadow-lg">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-amber-500/20 text-amber-400 font-bold flex items-center justify-center font-mono text-base border border-amber-500/30">2</span>
                                    <div>
                                        <h4 class="text-base sm:text-lg font-bold text-white">มวล (Mass, $m$) — กิโลกรัม (Kilogram, $\text{kg}$)</h4>
                                        <span class="text-xs text-amber-400 font-mono">ตรึงค่าคงตัว: ค่าคงตัวของพลังค์ $h = 6.626\,070\,15 \times 10^{-34}\text{ kg}\cdot\text{m}^2\cdot\text{s}^{-1}$</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-xs font-mono font-bold border border-amber-500/30">SI BASE: kg</span>
                            </div>

                            <!-- 3D Dual Comparison: Le Grand K vs Kibble Balance -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-xl bg-slate-950 flex flex-col justify-between">
                                    <img src="../images/sec_3d/ch01_ipk_grand_k_3d.jpg" alt="ก้อนกิโลกรัมต้นแบบนานาชาติ Le Grand K ในครอบแก้วสุญญากาศ 3 ชั้น" class="w-full h-auto object-cover" loading="lazy">
                                    <div class="p-3 bg-slate-950/90 text-xs text-slate-400 text-center border-t border-slate-800 font-mono">
                                        <strong>อดีต (1889–2019):</strong> ก้อนมวล 1 kg ต้นแบบนานาชาติ (Le Grand K / IPK) ทรงกระบอกโลหะผสม $\text{Pt-Ir}$ ในครอบแก้วสุญญากาศ 3 ชั้น ณ BIPM
                                    </div>
                                </div>
                                <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-xl bg-slate-950 flex flex-col justify-between">
                                    <img src="../images/sec_3d/ch01_kibble_balance_3d.jpg" alt="เครื่องชั่งคิบบิล Kibble Balance 3 มิติ นิยาม 1 kg ใหม่" class="w-full h-auto object-cover" loading="lazy">
                                    <div class="p-3 bg-slate-950/90 text-xs text-slate-400 text-center border-t border-slate-800 font-mono">
                                        <strong>ปัจจุบัน (ตั้งแต่ 2019):</strong> เครื่องชั่งคิบบิล (Kibble Balance) สร้างสมดุลมวลด้วยแรงแม่เหล็กไฟฟ้าควอนตัมผ่านค่าคงตัวพลังค์ $h$
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                                    <strong class="text-amber-400 block mb-1.5"><i class="fa-solid fa-landmark"></i> นิยามในอดีต:</strong>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li><strong>ค.ศ. 1795:</strong> มวลของน้ำบริสุทธิ์ปริมาตร $1\text{ dm}^3$ ($1\text{ L}$) ที่อุณหภูมิ $4^\circ\text{C}$</li>
                                        <li><strong>ค.ศ. 1889–2019:</strong> มวลของทรงกระบอกโลหะผสมแพลทินัม-อิริเดียมต้นแบบนานาชาติ (<em>International Prototype of the Kilogram — IPK / Le Grand K</em>) เก็บในครอบแก้วสุญญากาศ ณ BIPM ฝรั่งเศส (มวลเบี่ยงเบนไปราว $50\,\mu\text{g}$)</li>
                                    </ul>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                                    <strong class="text-emerald-400 block mb-1.5"><i class="fa-solid fa-scale-balanced"></i> นิยามในปัจจุบัน (ตั้งแต่ 20 พฤษภาคม 2019):</strong>
                                    <p class="leading-relaxed">
                                        <em>"นิยามผ่านค่าคงตัวของพลังค์ ($h$) ให้มีค่าคงที่เท่ากับ $6.626\,070\,15 \times 10^{-34}\text{ kg}\cdot\text{m}^2\cdot\text{s}^{-1}$"</em> โดยใช้ <strong>เครื่องชั่งคิบบิล (Kibble Balance)</strong>
                                    </p>
                                    <div class="mt-2 text-slate-400 font-mono text-[11px] border-t border-slate-800 pt-1.5">
                                        <strong>บทบาทในจุลชีววิทยา:</strong> ชั่งผงอาหารเลี้ยงเชื้อ ($\text{g, mg}$), การชั่งน้ำกลั่นสอบเทียบความแม่นยำของไมโครปิเปต ($1{,}000\,\mu\text{L} = 1.0000\text{ g}$) และแรงเหวี่ยงหนีศูนย์กลางในการปั่นตกตะกอนเชื้อ
                                    </div>
                                </div>
                            </div>
                            <!-- Figure: Def Kilogram -->
                            <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                                <img src="../images/maintex/tikz/ch01_def_kilogram.svg" alt="วิวัฒนาการนิยาม 1 กิโลกรัม" class="w-full h-auto" loading="lazy">
                            </div>
                        </div>

                        <!-- Unit 3: Second -->
                        <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-sky-500/40 transition-all space-y-4 shadow-lg">
                            <div class="flex items-center justify-between flex-wrap gap-2">
                                <div class="flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-500/20 text-sky-400 font-bold flex items-center justify-center font-mono text-base border border-sky-500/30">3</span>
                                    <div>
                                        <h4 class="text-base sm:text-lg font-bold text-white">เวลา (Time, $t$) — วินาที (Second, $\text{s}$)</h4>
                                        <span class="text-xs text-sky-400 font-mono">ตรึงค่าคงตัว: ความถี่ทรานซิชันไฮเปอร์ไฟน์ของอะตอม $^{133}\text{Cs}$, $\Delta\nu_{\text{Cs}} = 9{,}192{,}631{,}770\text{ Hz}$ ($\text{s}^{-1}$)</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-sky-500/10 text-sky-300 text-xs font-mono font-bold border border-sky-500/30">SI BASE: s</span>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                                    <strong class="text-amber-400 block mb-1.5"><i class="fa-solid fa-landmark"></i> นิยามในอดีต:</strong>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li><strong>ก่อน ค.ศ. 1956:</strong> $\frac{1}{86{,}400}$ ของวันสุริยคติเฉลี่ย ($1\text{ วัน} = 24 \times 60 \times 60\text{ วินาที}$)</li>
                                        <li><strong>ค.ศ. 1956–1967:</strong> เสี้ยวส่วนของปีทรอปิก ค.ศ. 1900 (Ephemeris Second)</li>
                                    </ul>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                                    <strong class="text-emerald-400 block mb-1.5"><i class="fa-solid fa-stopwatch"></i> นิยามในปัจจุบัน (ตั้งแต่ ค.ศ. 1967):</strong>
                                    <p class="leading-relaxed">
                                        <em>"ช่วงเวลาที่เท่ากับ $9{,}192{,}631{,}770$ คาบของการแผ่รังสีที่เกิดจากการเปลี่ยนระดับพลังงานไฮเปอร์ไฟน์ในสถานะพื้นของอะตอมซีเซียม-133 ($^{133}\text{Cs}$) ที่อุณหภูมิศูนย์สัมบูรณ์"</em> (นาฬิกาอะตอมคลาดเคลื่อนไม่เกิน 1 วินาทีใน 100 ล้านปี)
                                    </p>
                                    <div class="mt-2 text-slate-400 font-mono text-[11px] border-t border-slate-800 pt-1.5">
                                        <strong>บทบาทในจุลชีววิทยา:</strong> อัตราการแบ่งเซลล์ (Generation Time), เวลาในการนึ่งฆ่าเชื้อด้วยความดันไอ (Autoclave 15–20 นาที หรือ 900–1,200 วินาที) และระยะเวลาการหมุนปั่นเหวี่ยง (Centrifugation)
                                    </div>
                                </div>
                            </div>
                            <!-- 3D Close-up: Cesium Atomic Fountain Clock -->
                            <div class="rounded-2xl overflow-hidden border border-sky-500/30 shadow-xl bg-slate-950 mt-3">
                                <img src="../images/sec_3d/ch01_cesium_clock_3d.jpg" alt="หอนาฬิกาอะตอมน้ำพุซีเซียม NIST-F2" class="w-full h-auto object-cover" loading="lazy">
                                <div class="p-3 bg-slate-950/90 text-xs text-slate-400 text-center border-t border-slate-800 font-mono">
                                    <strong>ภาพ 3 มิติ:</strong> หอนาฬิกาอะตอมน้ำพุซีเซียม-133 (Cesium-133 Fountain Clock NIST-F2): ลำแสงเลเซอร์ทำให้อะตอมเย็นตัวยิ่งยวด (Laser cooling) ยิงผ่านโพรงคลื่นไมโครเวฟแรมซีย์ ตรึงความถี่ $\Delta\nu_{\text{Cs}} = 9{,}192{,}631{,}770\text{ Hz}$
                                </div>
                            </div>

                            <!-- Figure: Def Second -->
                            <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                                <img src="../images/maintex/tikz/ch01_def_second.svg" alt="วิวัฒนาการนิยาม 1 วินาที" class="w-full h-auto" loading="lazy">
                            </div>
                        </div>

                        <!-- Units 4-7: Grid Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Unit 4: Ampere -->
                            <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-rose-500/40 transition-all space-y-3 shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-bold flex items-center justify-center font-mono">4</span>
                                        <h4 class="text-sm font-bold text-white">กระแสไฟฟ้า — แอมแปร์ (Ampere, $\text{A}$)</h4>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full bg-rose-500/10 text-rose-300 text-[11px] font-mono border border-rose-500/30">A</span>
                                </div>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    <strong>นิยามปัจจุบัน (2019):</strong> ตรึงค่า <strong>ประจุไฟฟ้ามูลฐาน (Elementary Charge, $e$)</strong> ให้เท่ากับ $1.602\,176\,634 \times 10^{-19}\text{ C}$ ($\text{A}\cdot\text{s}$)<br>
                                    <em class="text-slate-400 text-[11px]">(ในอดีตนิยามจากแรงดึงดูดเชิงกล $2 \times 10^{-7}\text{ N/m}$ ระหว่างลวดตัวนำคู่ขนาน 2 เส้นยาวอนันต์ในสุญญากาศ)</em>
                                </p>
                                <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                                    <strong>จุลชีววิทยา:</strong> กระแสไฟฟ้าในเจลอิเล็กโทรโฟเรซิส (Agarose & SDS-PAGE) แยกสาย DNA/โปรตีน และการวัดสัญญาณ Patch-clamp ศักย์ไฟฟ้าเยื่อหุ้มเซลล์
                                </div>
                            </div>

                            <!-- Unit 5: Kelvin -->
                            <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-orange-500/40 transition-all space-y-3 shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 font-bold flex items-center justify-center font-mono">5</span>
                                        <h4 class="text-sm font-bold text-white">อุณหภูมิอุณหพลวัต — เคลวิน (Kelvin, $\text{K}$)</h4>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300 text-[11px] font-mono border border-orange-500/30">K</span>
                                </div>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    <strong>นิยามปัจจุบัน (2019):</strong> ตรึง <strong>ค่าคงตัวบ็อลทซ์มัน (Boltzmann Constant, $k$)</strong> ให้เท่ากับ $1.380\,649 \times 10^{-23}\text{ J/K}$ ผูกพลังงานจลน์เฉลี่ยของอนุภาคเข้ากับอุณหภูมิสัมบูรณ์<br>
                                    <em class="text-slate-400 text-[11px]">(ในอดีตนิยามจาก $\frac{1}{273.16}$ ของจุดร่วมสามของน้ำ Triple Point)</em> โดย $T_{\text{K}} = T_{^\circ\text{C}} + 273.15$
                                </p>
                                <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                                    <strong>จุลชีววิทยา:</strong> การบ่มเชื้อ ($37^\circ\text{C} = 310.15\text{ K}$), การฆ่าเชื้อ Autoclave ($121^\circ\text{C} = 394.15\text{ K}$), อุณหภูมิการคลายและต่อสายดีเอ็นเอใน PCR ($95^\circ\text{C}, 55^\circ\text{C}, 72^\circ\text{C}$)
                                </div>
                            </div>

                            <!-- Unit 6: Mole -->
                            <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-purple-500/40 transition-all space-y-3 shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 font-bold flex items-center justify-center font-mono">6</span>
                                        <h4 class="text-sm font-bold text-white">ปริมาณของสาร — โมล (Mole, $\text{mol}$)</h4>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full bg-purple-500/10 text-purple-300 text-[11px] font-mono border border-purple-500/30">mol</span>
                                </div>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    <strong>นิยามปัจจุบัน (2019):</strong> มีจำนวนอนุภาคมูลฐานแน่นอนเท่ากับ <strong>$6.022\,140\,76 \times 10^{23}$ อนุภาค</strong> ซึ่งคือ <strong>ค่าคงตัวอาโวกาโดร (Avogadro Constant, $N_{\text{A}}$)</strong><br>
                                    <em class="text-slate-400 text-[11px]">(ในอดีตนิยามจากจำนวนอะตอมในคาร์บอน-12 บริสุทธิ์มวล $0.012\text{ kg}$)</em>
                                </p>
                                <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                                    <strong>จุลชีววิทยา:</strong> การเตรียมสารละลายความเข้มข้น ($\text{M} = \text{mol/L}$, $\text{mM}$, $\mu\text{M}$), จำนวนโมเลกุลสารตั้งต้นในเอนไซม์จลนศาสตร์ และจำนวนก๊อปปี้พลาสมิดดีเอ็นเอ
                                </div>
                            </div>

                            <!-- Unit 7: Candela -->
                            <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800 hover:border-yellow-500/40 transition-all space-y-3 shadow-lg">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2.5">
                                        <span class="w-8 h-8 rounded-lg bg-yellow-500/20 text-yellow-400 font-bold flex items-center justify-center font-mono">7</span>
                                        <h4 class="text-sm font-bold text-white">ความเข้มการส่องสว่าง — แคนเดลา (Candela, $\text{cd}$)</h4>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full bg-yellow-500/10 text-yellow-300 text-[11px] font-mono border border-yellow-500/30">cd</span>
                                </div>
                                <p class="text-xs text-slate-300 leading-relaxed">
                                    <strong>นิยามปัจจุบัน:</strong> ตรึง <strong>ประสิทธิผลของการส่องสว่าง (Luminous Efficacy, $K_{\text{cd}}$)</strong> ของรังสีเอกรงค์ความถี่ $540 \times 10^{12}\text{ Hz}$ (แสงสีเขียว $\lambda \approx 555\text{ nm}$) ให้มีค่าเท่ากับ $683\text{ lm/W}$ ($\text{cd}\cdot\text{sr}\cdot\text{W}^{-1}$)<br>
                                    <em class="text-slate-400 text-[11px]">(ในอดีตนิยามจากความสว่างของเทียนไขมาตรฐานไขปลาวาฬ Sperm Whale Candle)</em>
                                </p>
                                <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                                    <strong>จุลชีววิทยา:</strong> แสงสว่างเพาะเลี้ยงสาหร่ายเซลล์เดียวและไซยาโนแบคทีเรียใน Photobioreactor, หลอดไฟกล้องจุลทรรศน์ฟลูออเรสเซนต์, และการวัดการเรืองแสงชีวภาพ (Bioluminescence)
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ═════ 3 COMPREHENSIVE TABLES ═════ -->

                    <!-- 3D Metrology Icons Showcase Card -->
                    <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl bg-slate-950 my-8">
                        <img src="../images/sec_3d/ch01_metrology_icons_3d.jpg" alt="ชุดไอคอน 3 มิติ มาตรวิทยาสากลและค่าคงตัวพื้นฐาน" class="w-full h-auto object-cover" loading="lazy">
                        <div class="p-3 bg-slate-900/90 text-xs text-slate-300 text-center border-t border-slate-800 font-mono">
                            <strong>ชุดไอคอน 3 มิติ มาตรวิทยา (3D Metrology Icons):</strong> ผสาน 4 สัญลักษณ์หลัก (Le Grand K & $h$, แท่งเมตร Tresca & $c$, นาฬิกาอะตอมซีเซียม & $\Delta\nu_{\text{Cs}}$, และเครื่องชั่งคิบบิล) เพื่อสรุปมโนทัศน์ก่อนเข้าสู่ตารางฐานข้อมูล 4 ตารางด้านล่าง
                        </div>
                    </div>

                    <!-- TABLE 1.1: 7 SI BASE UNITS -->
                    <div class="tex-tablefig mt-10 scroll-mt-20" id="tab-1.1">
                        <div class="p-3 bg-gradient-to-r from-cyan-950/60 to-slate-900 rounded-t-xl border border-b-0 border-slate-700/80 flex items-center justify-between flex-wrap gap-2">
                            <span class="text-xs sm:text-sm font-bold text-cyan-300 flex items-center gap-2">
                                <i class="fa-solid fa-table-cells text-cyan-400"></i> ตารางที่ 1.1 สรุปคุณสมบัติ 7 หน่วยฐานเอสไอ (7 SI Base Units) นิยามอดีต-ปัจจุบัน ค่าคงตัวตรึง และการใช้งานในจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-slate-400 bg-slate-800 px-2 py-0.5 rounded">SI 2019 Standard</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-slate-700/80 bg-slate-950/90 shadow-xl">
                            <table class="tex-table w-full text-xs">
                                <thead>
                                    <tr class="bg-slate-800/90 text-white border-b border-slate-700">
                                        <th class="p-3 text-left">ปริมาณฐาน (Quantity)</th>
                                        <th class="p-3 text-center">สัญลักษณ์ปริมาณ</th>
                                        <th class="p-3 text-left">ชื่อหน่วยฐาน (Unit)</th>
                                        <th class="p-3 text-center">สัญลักษณ์หน่วย</th>
                                        <th class="p-3 text-left">ค่าคงตัวฟิสิกส์ที่ใช้ตรึง (Defining Constant)</th>
                                        <th class="p-3 text-left">ตัวอย่างการใช้งานจริงในแล็บจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความยาว (Length)</td>
                                        <td class="p-3 text-center font-mono">$l, x, r$</td>
                                        <td class="p-3 text-cyan-300 font-semibold">เมตร (metre)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{m}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$c = 299\,792\,458\text{ m/s}$ (อัตราเร็วแสง)</td>
                                        <td class="p-3">วัดขนาดเซลล์แบคทีเรีย ($\mu\text{m}$), ไวรัส ($\text{nm}$), ขนาดโคโลนีบนจานวุ้น ($\text{mm}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">มวล (Mass)</td>
                                        <td class="p-3 text-center font-mono">$m$</td>
                                        <td class="p-3 text-amber-300 font-semibold">กิโลกรัม (kilogram)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{kg}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$h = 6.626\,070\,15 \times 10^{-34}\text{ J}\cdot\text{s}$ (พลังค์)</td>
                                        <td class="p-3">ชั่งสารเคมีอาหารเลี้ยงเชื้อ ($\text{g, mg}$), สอบเทียบไมโครปิเปตผ่านน้ำกลั่น ($1\,\text{mL} = 1\text{ g}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">เวลา (Time)</td>
                                        <td class="p-3 text-center font-mono">$t$</td>
                                        <td class="p-3 text-sky-300 font-semibold">วินาที (second)</td>
                                        <td class="p-3 text-center font-mono font-bold text-sky-400">$\text{s}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$\Delta\nu_{\text{Cs}} = 9\,192\,631\,770\text{ s}^{-1}$ (ไฮเปอร์ไฟน์ $^{133}\text{Cs}$)</td>
                                        <td class="p-3">ระยะเวลาการแบ่งเซลล์ (Doubling time), เวลานึ่งฆ่าเชื้อ Autoclave ($15\text{--}20\text{ min}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">กระแสไฟฟ้า (Electric current)</td>
                                        <td class="p-3 text-center font-mono">$I, i$</td>
                                        <td class="p-3 text-rose-300 font-semibold">แอมแปร์ (ampere)</td>
                                        <td class="p-3 text-center font-mono font-bold text-rose-400">$\text{A}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$e = 1.602\,176\,634 \times 10^{-19}\text{ C}$ (ประจุมูลฐาน)</td>
                                        <td class="p-3">กระแสแยก DNA ในเจลอิเล็กโทรโฟเรซิส ($50\text{--}100\text{ mA}$), การวัดศักย์ไฟฟ้าเยื่อหุ้มเซลล์</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">อุณหภูมิอุณหพลวัต (Temperature)</td>
                                        <td class="p-3 text-center font-mono">$T$</td>
                                        <td class="p-3 text-orange-300 font-semibold">เคลวิน (kelvin)</td>
                                        <td class="p-3 text-center font-mono font-bold text-orange-400">$\text{K}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$k = 1.380\,649 \times 10^{-23}\text{ J/K}$ (บ็อลทซ์มัน)</td>
                                        <td class="p-3">ตู้บ่มเชื้อ ($37^\circ\text{C} = 310.15\text{ K}$), หม้อนึ่งฆ่าเชื้อ ($121^\circ\text{C} = 394.15\text{ K}$), PCR ($95^\circ\text{C}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ปริมาณของสาร (Amount of substance)</td>
                                        <td class="p-3 text-center font-mono">$n$</td>
                                        <td class="p-3 text-purple-300 font-semibold">โมล (mole)</td>
                                        <td class="p-3 text-center font-mono font-bold text-purple-400">$\text{mol}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$N_{\text{A}} = 6.022\,140\,76 \times 10^{23}\text{ mol}^{-1}$ (อาโวกาโดร)</td>
                                        <td class="p-3">ความเข้มข้นสารละลายบัฟเฟอร์ ($\text{mol/L}$ หรือ $\text{M}$), จำนวนโมเลกุลไพรเมอร์ใน PCR</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความเข้มของการส่องสว่าง (Luminous intensity)</td>
                                        <td class="p-3 text-center font-mono">$I_v$</td>
                                        <td class="p-3 text-yellow-300 font-semibold">แคนเดลา (candela)</td>
                                        <td class="p-3 text-center font-mono font-bold text-yellow-400">$\text{cd}$</td>
                                        <td class="p-3 font-mono text-[11px] text-emerald-400">$K_{\text{cd}} = 683\text{ lm/W}$ ที่ความถี่ $540\text{ THz}$</td>
                                        <td class="p-3">การให้แสงสว่างเพาะเลี้ยงสาหร่ายเซลล์เดียว, หลอดไฟฟลูออเรสเซนต์, การเรืองแสงแบคทีเรีย</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLE 1.2: SI DERIVED UNITS -->
                    <div class="tex-tablefig mt-8 scroll-mt-20" id="tab-1.2">
                        <div class="p-3 bg-gradient-to-r from-emerald-950/60 to-slate-900 rounded-t-xl border border-b-0 border-slate-700/80 flex items-center justify-between flex-wrap gap-2">
                            <span class="text-xs sm:text-sm font-bold text-emerald-300 flex items-center gap-2">
                                <i class="fa-solid fa-calculator text-emerald-400"></i> ตารางที่ 1.2 หน่วยอนุพันธ์เอสไอ (SI Derived Units) ที่สำคัญทางฟิสิกส์และการประยุกต์ใช้ในห้องปฏิบัติการจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-slate-400 bg-slate-800 px-2 py-0.5 rounded">Derived Quantities</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-slate-700/80 bg-slate-950/90 shadow-xl">
                            <table class="tex-table w-full text-xs">
                                <thead>
                                    <tr class="bg-slate-800/90 text-white border-b border-slate-700">
                                        <th class="p-3 text-left">ปริมาณอนุพันธ์ (Derived Quantity)</th>
                                        <th class="p-3 text-left">ชื่อหน่วย</th>
                                        <th class="p-3 text-center">สัญลักษณ์</th>
                                        <th class="p-3 text-left">ความสัมพันธ์กับหน่วยอื่น</th>
                                        <th class="p-3 text-left">ความสัมพันธ์กับหน่วยฐาน SI</th>
                                        <th class="p-3 text-left">การประยุกต์ใช้ในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความถี่ (Frequency)</td>
                                        <td class="p-3">เฮิรตซ์ (hertz)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{Hz}$</td>
                                        <td class="p-3 font-mono">$1/\text{s}$</td>
                                        <td class="p-3 font-mono">$\text{s}^{-1}$</td>
                                        <td class="p-3">ความถี่การแกว่งอัลตราโซนิกทำลายผนังเซลล์, ความถี่แสงส่องเซลล์</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">แรง (Force)</td>
                                        <td class="p-3">นิวตัน (newton)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{N}$</td>
                                        <td class="p-3 font-mono">$\text{kg}\cdot\text{m/s}^2$</td>
                                        <td class="p-3 font-mono">$\text{m}\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3">แรงของแฟลกเจลลาขับเคลื่อนแบคทีเรีย ($\text{pN}$), แรงหนีศูนย์กลางในการปั่นตกตะกอน</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความดัน (Pressure / Stress)</td>
                                        <td class="p-3">พาสคาล (pascal)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{Pa}$</td>
                                        <td class="p-3 font-mono">$\text{N/m}^2$</td>
                                        <td class="p-3 font-mono">$\text{m}^{-1}\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3">ความดันไอน้ำในหม้อนึ่งฆ่าเชื้อ Autoclave ($103\text{ kPa} \approx 15\text{ psi}$), ความดันออสโมซิส</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความหนืดพลวัต (Dynamic Viscosity)</td>
                                        <td class="p-3">พาสคาล-วินาที</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{Pa}\cdot\text{s}$</td>
                                        <td class="p-3 font-mono">$\text{N}\cdot\text{s/m}^2$</td>
                                        <td class="p-3 font-mono">$\text{m}^{-1}\cdot\text{kg}\cdot\text{s}^{-1}$</td>
                                        <td class="p-3">ความหนืดของน้ำและอาหารเลี้ยงเชื้อจุลินทรีย์ ($\eta_{\text{water}} \approx 10^{-3}\text{ Pa}\cdot\text{s} = 1\text{ cP}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">พลังงาน งาน ความร้อน (Energy / Work)</td>
                                        <td class="p-3">จูล (joule)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{J}$</td>
                                        <td class="p-3 font-mono">$\text{N}\cdot\text{m}$</td>
                                        <td class="p-3 font-mono">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3">พลังงานสลายพันธะไฮโดรเจนในดีเอ็นเอ, การปลดปล่อยพลังงานของ ATP ($30.5\text{ kJ/mol}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">กำลัง (Power)</td>
                                        <td class="p-3">วัตต์ (watt)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{W}$</td>
                                        <td class="p-3 font-mono">$\text{J/s}$</td>
                                        <td class="p-3 font-mono">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}$</td>
                                        <td class="p-3">กำลังไฟฟ้าของหม้อนึ่งฆ่าเชื้อ เครื่องปั่นเหวี่ยง และหลอดไฟตู้บ่มเชื้อ</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ประจุไฟฟ้า (Electric charge)</td>
                                        <td class="p-3">คูลอมบ์ (coulomb)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{C}$</td>
                                        <td class="p-3 font-mono">$\text{A}\cdot\text{s}$</td>
                                        <td class="p-3 font-mono">$\text{s}\cdot\text{A}$</td>
                                        <td class="p-3">ประจุลบสุทธิบนสาย Phosphodiester ของ DNA และประจุโปรตีน</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความต่างศักย์ไฟฟ้า (Voltage / Potential)</td>
                                        <td class="p-3">โวลต์ (volt)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{V}$</td>
                                        <td class="p-3 font-mono">$\text{W/A}$</td>
                                        <td class="p-3 font-mono">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}\cdot\text{A}^{-1}$</td>
                                        <td class="p-3">แรงดันไฟฟ้าสำหรับแยกแถบ DNA ($100\text{ V}$), ศักย์ไฟฟ้าเยื่อหุ้มเซลล์ ($-70\text{ mV}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความต้านทานไฟฟ้า (Resistance)</td>
                                        <td class="p-3">โอห์ม (ohm)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\Omega$</td>
                                        <td class="p-3 font-mono">$\text{V/A}$</td>
                                        <td class="p-3 font-mono">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}\cdot\text{A}^{-2}$</td>
                                        <td class="p-3">ความต้านทานของเยื่อหุ้มเซลล์ (Trans-epithelial electrical resistance — TEER)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">สภาพนำไฟฟ้า (Conductance)</td>
                                        <td class="p-3">ซีเมนส์ (siemens)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{S}$</td>
                                        <td class="p-3 font-mono">$\Omega^{-1}$</td>
                                        <td class="p-3 font-mono">$\text{m}^{-2}\cdot\text{kg}^{-1}\cdot\text{s}^3\cdot\text{A}^2$</td>
                                        <td class="p-3">การตรวจสอบความบริสุทธิ์ของน้ำกลั่นและระดับไอออนในอาหารเลี้ยงเชื้อ (EC Meter)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">กิจกรรมการเร่งปฏิกิริยา (Catalytic activity)</td>
                                        <td class="p-3">คาทาล (katal)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{kat}$</td>
                                        <td class="p-3 font-mono">$\text{mol/s}$</td>
                                        <td class="p-3 font-mono">$\text{mol}\cdot\text{s}^{-1}$</td>
                                        <td class="p-3">วัดอัตราการเร่งปฏิกิริยาของเอนไซม์จากจุลินทรีย์ (เช่น $\beta$-galactosidase, Taq Polymerase)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ฟลักซ์ส่องสว่าง & ความสว่าง</td>
                                        <td class="p-3">ลูเมน (lm) / ลักซ์ (lx)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{lm / lx}$</td>
                                        <td class="p-3 font-mono">$\text{cd}\cdot\text{sr} \text{ / } \text{lm/m}^2$</td>
                                        <td class="p-3 font-mono">$\text{m}^{-2}\cdot\text{cd}$</td>
                                        <td class="p-3">ความเข้มแสงบนโต๊ะเขี่ยเชื้อปลอดเชื้อ (Laminar Airflow) และตู้บ่มเพาะสาหร่าย</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ปริมาณรังสีดูดกลืน (Absorbed dose)</td>
                                        <td class="p-3">เกรย์ (gray)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{Gy}$</td>
                                        <td class="p-3 font-mono">$\text{J/kg}$</td>
                                        <td class="p-3 font-mono">$\text{m}^2\cdot\text{s}^{-2}$</td>
                                        <td class="p-3">การฉายรังสีแกมมาเพื่อทำหมันอุปกรณ์พลาสติกและฆ่าเชื้อในอาหาร (Food Irradiation)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLE 1.3: SUPPLEMENTARY & NON-SI UNITS -->
                    <div class="tex-tablefig mt-8 scroll-mt-20" id="tab-1.3">
                        <div class="p-3 bg-gradient-to-r from-amber-950/60 to-slate-900 rounded-t-xl border border-b-0 border-slate-700/80 flex items-center justify-between flex-wrap gap-2">
                            <span class="text-xs sm:text-sm font-bold text-amber-300 flex items-center gap-2">
                                <i class="fa-solid fa-shapes text-amber-400"></i> ตารางที่ 1.3 หน่วยเสริมและหน่วยนอกระบบเอสไอที่ยอมรับให้ใช้ร่วมกับระบบเอสไอ (Supplementary & Accepted Non-SI Units) ในทางจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-slate-400 bg-slate-800 px-2 py-0.5 rounded">Accepted Units</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-slate-700/80 bg-slate-950/90 shadow-xl">
                            <table class="tex-table w-full text-xs">
                                <thead>
                                    <tr class="bg-slate-800/90 text-white border-b border-slate-700">
                                        <th class="p-3 text-left">ปริมาณ (Quantity)</th>
                                        <th class="p-3 text-left">ชื่อหน่วย</th>
                                        <th class="p-3 text-center">สัญลักษณ์</th>
                                        <th class="p-3 text-left">ค่าเทียบเท่าในหน่วยเอสไอ (SI Equivalent)</th>
                                        <th class="p-3 text-left">ความสำคัญและการใช้งานจริงในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white" rowspan="2">มุมระนาบและมุมตัน (Angles) <span class="text-amber-400 font-normal">(หน่วยเสริม)</span></td>
                                        <td class="p-3">เรเดียน (radian)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{rad}$</td>
                                        <td class="p-3 font-mono">$1\text{ rad} = \text{m/m} = 1$</td>
                                        <td class="p-3">ความเร็วเชิงมุมในการหมุน ($\omega = \text{rad/s}$) ของหัวปั่นเหวี่ยง Centrifuge</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3">สเตอเรเดียน (steradian)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{sr}$</td>
                                        <td class="p-3 font-mono">$1\text{ sr} = \text{m}^2/\text{m}^2 = 1$</td>
                                        <td class="p-3">มุมตันของการกระจายแสงของหลอด LED กล้องจุลทรรศน์และเซ็นเซอร์วัดการกระเจิงแสง</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ปริมาตร (Volume)</td>
                                        <td class="p-3">ลิตร (litre)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{L, l}$</td>
                                        <td class="p-3 font-mono">$1\text{ L} = 1\text{ dm}^3 = 10^{-3}\text{ m}^3 = 1{,}000\text{ mL}$</td>
                                        <td class="p-3">ปริมาตรถังหมักอาหารเลี้ยงเชื้อ (Bioreactor) และปริมาตรของเหลวในห้องทดลอง</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ปริมาตรไมโครปิเปต (Microvolume)</td>
                                        <td class="p-3">ไมโครลิตร (microlitre)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\mu\text{L}$</td>
                                        <td class="p-3 font-mono">$1\text{ }\mu\text{L} = 10^{-6}\text{ L} = 10^{-9}\text{ m}^3 = 1\text{ mm}^3$</td>
                                        <td class="p-3">ปริมาตรมาตรฐานของการดูดจ่ายสารด้วยไมโครปิเปต P20, P200, P1000 และปฏิกิริยา PCR</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white" rowspan="3">เวลาที่ไม่ใช่ SI (Non-SI Time)</td>
                                        <td class="p-3">นาที (minute)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{min}$</td>
                                        <td class="p-3 font-mono">$1\text{ min} = 60\text{ s}$</td>
                                        <td class="p-3">เวลาปั่นเหวี่ยง ($5\text{--}10\text{ min}$), เวลานึ่งฆ่าเชื้อ Autoclave ($15\text{ min}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3">ชั่วโมง (hour)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{h}$</td>
                                        <td class="p-3 font-mono">$1\text{ h} = 60\text{ min} = 3{,}600\text{ s}$</td>
                                        <td class="p-3">เวลาบ่มเชื้อแบคทีเรียข้ามคืน (Overnight incubation: $16\text{--}24\text{ h}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3">วัน (day)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{d}$</td>
                                        <td class="p-3 font-mono">$1\text{ d} = 24\text{ h} = 86{,}400\text{ s}$</td>
                                        <td class="p-3">การติดตามการเจริญของเชื้อราและแบคทีเรียที่โตช้า (เช่น <em>Mycobacterium</em> ใช้เวลาหลายวัน)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">อุณหภูมิ (Temperature)</td>
                                        <td class="p-3">องศาเซลเซียส (degree Celsius)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$^\circ\text{C}$</td>
                                        <td class="p-3 font-mono">$T_{^\circ\text{C}} = T_{\text{K}} - 273.15$</td>
                                        <td class="p-3">หน่วยวัดอุณหภูมิที่แสดงบนหน้าปัดตู้บ่มเชื้อ ตู้เย็นเก็บตัวอย่าง และหม้อนึ่งฆ่าเชื้อ</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">มวลชีวโมเลกุล (Molecular mass)</td>
                                        <td class="p-3">ดาลตัน (dalton)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{Da, kDa}$</td>
                                        <td class="p-3 font-mono">$1\text{ Da} \approx 1.660\,539 \times 10^{-27}\text{ kg}$</td>
                                        <td class="p-3">น้ำหนักโมเลกุลของโปรตีนและสายกรดนิวคลีอิก (เช่น เอนไซม์ไลโซไซม์ $14.3\text{ kDa}$, BSA $66.5\text{ kDa}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">พลังงานระดับโมเลกุล (Energy)</td>
                                        <td class="p-3">อิเล็กตรอนโวลต์</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{eV}$</td>
                                        <td class="p-3 font-mono">$1\text{ eV} \approx 1.602\,176 \times 10^{-19}\text{ J}$</td>
                                        <td class="p-3">พลังงานโฟตอนของแสง UV สำหรับฆ่าเชื้อในตู้ Biosafety ($h\nu \approx 4.9\text{ eV}$ ที่ $\lambda = 254\text{ nm}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ระยะพันธะ/โครงสร้างผลึก (Length)</td>
                                        <td class="p-3">อังสตรอม (ångström)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">\AA</td>
                                        <td class="p-3 font-mono">$1\text{ \AA} = 0.1\text{ nm} = 10^{-10}\text{ m}$</td>
                                        <td class="p-3">ความยาวพันธะเคมี ระยะห่างเกลียวคู่ดีเอ็นเอ ($34\text{ \AA}$ ต่อรอบ) และความละเอียดกล้อง Cryo-EM</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ความดันก๊าซและของเหลว (Pressure)</td>
                                        <td class="p-3">มิลลิเมตรปรอท (millimetre of mercury)</td>
                                        <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{mmHg}$</td>
                                        <td class="p-3 font-mono">$1\text{ mmHg} \approx 133.322\text{ Pa}$</td>
                                        <td class="p-3">ความดันโลหิต การดูดสุญญากาศกรองอาหารเลี้ยงเชื้อ (Vacuum filtration) และความดันไอ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLE 1.4: PREFIXES -->
                    <div class="tex-tablefig mt-8 scroll-mt-20" id="tab-1.4">
                        <div class="p-3 bg-gradient-to-r from-purple-950/60 to-slate-900 rounded-t-xl border border-b-0 border-slate-700/80 flex items-center justify-between flex-wrap gap-2">
                            <span class="text-xs sm:text-sm font-bold text-purple-300 flex items-center gap-2">
                                <i class="fa-solid fa-arrow-down-wide-short text-purple-400"></i> ตารางที่ 1.4 คำอุปสรรคเอสไอ (SI Prefixes) ที่พบบ่อยที่สุดในห้องปฏิบัติการจุลชีววิทยาและฟิสิกส์การวัด
                            </span>
                            <span class="text-[11px] font-mono text-slate-400 bg-slate-800 px-2 py-0.5 rounded">Prefixes</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-slate-700/80 bg-slate-950/90 shadow-xl">
                            <table class="tex-table w-full text-xs">
                                <thead>
                                    <tr class="bg-slate-800/90 text-white border-b border-slate-700">
                                        <th class="p-3 text-left">คำอุปสรรค</th>
                                        <th class="p-3 text-center">สัญลักษณ์</th>
                                        <th class="p-3 text-center">ตัวคูณฐานสิบ</th>
                                        <th class="p-3 text-left">ตัวอย่างการใช้งานจริงในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800">
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">กิโล (kilo)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{k}$</td>
                                        <td class="p-3 text-center font-mono">$10^3 = 1{,}000$</td>
                                        <td class="p-3">กิโลกรัม ($\text{kg}$), กิโลดาลตัน ($\text{kDa}$ ขนาดโมเลกุลโปรตีน), กิโลเบสคู่ ($\text{kb}$ ความยาวสาย DNA)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">เซนติ (centi)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{c}$</td>
                                        <td class="p-3 text-center font-mono">$10^{-2} = 0.01$</td>
                                        <td class="p-3">เซนติเมตร ($\text{cm}$ ขนาดจานเพาะเชื้อ $9\text{ cm}$), เซนติพอยส์ ($\text{cP}$ ความหนืดของน้ำกลั่น $1\text{ cP}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">มิลลิ (milli)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{m}$</td>
                                        <td class="p-3 text-center font-mono">$10^{-3} = 0.001$</td>
                                        <td class="p-3">มิลลิเมตร ($\text{mm}$ วัดขนาดโคโลนีแบคทีเรีย $1\text{--}5\text{ mm}$), มิลลิลิตร ($\text{mL}$), มิลลิกรัม ($\text{mg}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">ไมโคร (micro)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\mu$</td>
                                        <td class="p-3 text-center font-mono">$10^{-6} = 0.000\,001$</td>
                                        <td class="p-3">ไมโครเมตร ($\mu\text{m}$ เซลล์แบคทีเรีย <em>E. coli</em> $1\text{--}2\text{ }\mu\text{m}$), ไมโครลิตร ($\mu\text{L}$ ปริมาตรไมโครปิเปต)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">นาโน (nano)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{n}$</td>
                                        <td class="p-3 text-center font-mono">$10^{-9} = 10^{-9}$</td>
                                        <td class="p-3">นาโนเมตร ($\text{nm}$ ไวรัส $20\text{--}300\text{ nm}$, รูพรุนแผ่นกรอง $220\text{ nm}$, ความยาวคลื่นแสง $\lambda = 600\text{ nm}$)</td>
                                    </tr>
                                    <tr class="hover:bg-slate-900/60">
                                        <td class="p-3 font-bold text-white">พิโก (pico)</td>
                                        <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{p}$</td>
                                        <td class="p-3 text-center font-mono">$10^{-12} = 10^{-12}$</td>
                                        <td class="p-3">พิโกกรัม ($\text{pg}$ มวลของแบคทีเรีย 1 เซลล์ $\approx 1\text{ pg}$), พิโกนิวตัน ($\text{pN}$ แรงขับเคลื่อนของมอเตอร์โมเลกุล)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 1.2 -->
            <section id="sec-1.2" class="tex-section scroll-mt-20">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 font-black font-mono flex items-center justify-center text-lg border border-emerald-500/30">1.2</span>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                        การแปลงหน่วยโดยใช้เทคนิคบันไดเลื่อนจุดทศนิยม (Step-by-1,000 Ladder Method)
                    </h2>
                </div>

                <div class="tex-article leading-relaxed space-y-6 text-slate-200">
                    <!-- Figure 1.3: 3D Serial Dilution Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.3-render">
                        <div class="rounded-2xl overflow-hidden border border-emerald-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_serial_dilution_3d.jpg" alt="ภาพที่ 1.3 การเจือจางแบบลำดับส่วน 10 เท่า Serial Dilution 3 มิติ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-emerald-400">ภาพที่ 1.3</strong>&ensp;แบบจำลอง 3 มิติของการเจือจางเชื้อแบบลำดับส่วน 10 เท่า (10-Fold Serial Dilution): แสดงหลอดทดลอง 5 หลอดตั้งแต่ $10^{-1}$ ถึง $10^{-5}$ พร้อมลูกศรการดูดถ่ายสารด้วยไมโครปิเปต $100\text{ }\mu\text{L}$ และผลการเจริญของโคโลนีแบคทีเรียบนจานวุ้นเพาะเชื้อ (TNTC $\rightarrow$ 150 CFU $\rightarrow$ 15 CFU)
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        นักศึกษาจำนวนมากมักสับสนเมื่อต้องคำนวณเลขยกกำลังติดลบ เช่น $10^{-6}$ หารด้วย $10^{-3}$ เพื่อขจัดปัญหานี้ เราสามารถใช้ <strong>เทคนิคบันไดขั้นละ 1,000</strong> (<strong>Step-by-1,000 Ladder Method</strong>) ซึ่งจำง่ายเหมือนการแลกธนบัตร กล่าวคือ หน่วยที่เรียงติดกันจากใหญ่ไปเล็ก ได้แก่ <strong>หน่วยปกติ $\rightarrow$ มิลลิ ($\text{m}$) $\rightarrow$ ไมโคร ($\mu$) $\rightarrow$ นาโน ($\text{n}$)</strong> จะมีค่าห่างกันขั้นละ $1{,}000$ เท่าเสมอ ดังแสดงในภาพที่ 1.4
                    </p>

                    <!-- SVG Diagram: Ladder -->
                    <figure class="tex-figure tex-figure-diagram my-8" id="fig-1.4-diagram">
                        <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl bg-slate-950 p-3 sm:p-4">
                            <img src="../images/maintex/tikz/ch01_tikz1.svg" alt="แผนภาพบันไดคำอุปสรรคขั้นละ 1,000 เท่า" class="w-full h-auto" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-emerald-400">ภาพที่ 1.4</strong>&ensp;แผนภาพบันไดคำอุปสรรคขั้นละ 1,000 เท่า สำหรับการแปลงหน่วยขนาดเซลล์และปริมาตรสารละลายในห้องปฏิบัติการ
                        </figcaption>
                    </figure>

                    <!-- ArUco Marker Badge Section (Enhanced Glassmorphism) -->
                    <div id="sec-aruco" class="tex-aruco p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-emerald-950/40 border border-emerald-500/40 shadow-2xl my-8 scroll-mt-20">
                        <div class="flex flex-col sm:flex-row items-center gap-5">
                            <div class="tex-aruco-marker bg-white p-3 rounded-2xl shadow-xl flex flex-col items-center shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="130" height="130" role="img" aria-label="ArUco ID 0">
                                    <rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/>
                                    <rect x="0" y="0" width="6" height="6" fill="#000"/>
                                    <rect x="1" y="1" width="1" height="1" fill="#fff"/>
                                    <rect x="3" y="1" width="1" height="1" fill="#fff"/>
                                    <rect x="4" y="1" width="1" height="1" fill="#fff"/>
                                    <rect x="2" y="2" width="1" height="1" fill="#fff"/>
                                    <rect x="4" y="2" width="1" height="1" fill="#fff"/>
                                    <rect x="3" y="3" width="1" height="1" fill="#fff"/>
                                    <rect x="4" y="3" width="1" height="1" fill="#fff"/>
                                    <rect x="3" y="4" width="1" height="1" fill="#fff"/>
                                    <path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/>
                                </svg>
                                <span class="text-[11px] font-mono font-black text-slate-900 mt-1">ArUco ID: 0 (4×4)</span>
                            </div>
                            <div class="tex-aruco-body space-y-2 text-center sm:text-left">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-mono border border-emerald-500/30">
                                    <i class="fa-solid fa-cube text-emerald-400"></i> 3D WebAR Textbook Tracking
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">
                                    มาร์กเกอร์ ArUco ID 0 &bull; ไมโครปิเปต P1000 และการเจือจางเชื้อแบบลำดับส่วน 3 มิติ
                                </h3>
                                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                    ส่องกล้องสมาร์ทโฟนมาที่มาร์กเกอร์นี้เพื่อจำลองกลไกลูกสูบไมโครปิเปต 2 จังหวะเสมือนจริง และการดูดถ่ายสารละลายแบคทีเรียลดความเข้มข้นทีละ 10 เท่าพร้อมคำนวณค่า CFU/mL สด
                                </p>
                                <div class="pt-2 flex flex-wrap items-center justify-center sm:justify-start gap-2.5">
                                    <a class="tex-aruco-btn px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 text-white font-bold text-xs font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/50" href="../webar/ar_aruco_textbook.html?id=0&ar=1" target="_blank" rel="noopener">
                                        <i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 0 ↗
                                    </a>
                                    <a class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700 text-xs font-mono transition flex items-center gap-1.5" href="../../virtual_lab/sim_micropipette_3d.html" target="_blank">
                                        <i class="fa-solid fa-vr-cardboard text-purple-400"></i> เปิด Virtual Lab 3D
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Concept Box: Golden Rule -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-amber-950/30 via-slate-900 to-slate-900 border border-amber-500/40 shadow-lg space-y-3">
                        <div class="flex items-center gap-2 text-amber-300 font-bold text-base">
                            <i class="fa-solid fa-lightbulb text-amber-400 text-lg"></i> กฎทองของการแปลงหน่วยในห้องแล็บจุลชีววิทยา
                        </div>
                        <ul class="text-xs sm:text-sm space-y-2 text-slate-300 list-disc list-inside">
                            <li>
                                <strong>แปลงจากหน่วยใหญ่ไปหน่วยเล็ก</strong> (เดินลงบันได 1 ขั้น)&emsp; <strong class="text-emerald-400">ให้คูณด้วย $1{,}000$</strong> (หรือเลื่อนจุดทศนิยมไปทางขวา 3 ตำแหน่ง) เช่น $1\text{ mL} = 1{,}000\text{ }\mu\text{L}$ และ $1\text{ }\mu\text{m} = 1{,}000\text{ nm}$
                            </li>
                            <li>
                                <strong>แปลงจากหน่วยเล็กไปหน่วยใหญ่</strong> (เดินขึ้นบันได 1 ขั้น)&emsp; <strong class="text-cyan-400">ให้หารด้วย $1{,}000$</strong> (หรือเลื่อนจุดทศนิยมไปทางซ้าย 3 ตำแหน่ง) เช่น $250\text{ }\mu\text{L} = \frac{250}{1{,}000} = 0.250\text{ mL}$
                            </li>
                        </ul>
                    </div>

                    <!-- Worked Example 1.1 -->
                    <div class="p-6 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-xl space-y-4">
                        <div class="flex items-center justify-between flex-wrap gap-2 pb-3 border-b border-indigo-500/20">
                            <div class="flex items-center gap-2.5 text-indigo-300 font-bold text-base">
                                <i class="fa-solid fa-calculator text-indigo-400 text-lg"></i> ตัวอย่างที่ 1.1 การแปลงหน่วยขนาดเซลล์แบคทีเรียและปริมาตรไมโครปิเปต
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300 text-xs font-mono">Worked Example</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            <strong>โจทย์ปัญหา:</strong> นักศึกษาจุลชีววิทยาส่องกล้องจุลทรรศน์พบเซลล์แบคทีเรีย <em>Bacillus subtilis</em> มีความยาวเฉลี่ย $4.5\text{ }\mu\text{m}$ และในการเตรียมปฏิกิริยาพีซีอาร์ (PCR) ต้องใช้ไมโครปิเปตดูดสารละลายบัฟเฟอร์ปริมาตร $0.05\text{ mL}$ จงหาว่า (ก) แบคทีเรียชนิดนี้มีความยาวกี่มิลลิเมตร ($\text{mm}$) และกี่นาโนเมตร ($\text{nm}$) และ (ข) ต้องตั้งค่าไมโครปิเปตเป็นกี่ไมโครลิตร ($\mu\text{L}$)
                        </p>
                        <div class="p-4 rounded-xl bg-slate-950/80 border border-slate-800 space-y-3 text-xs sm:text-sm">
                            <strong class="text-emerald-400 block font-mono text-xs uppercase tracking-wider">💡 วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย:</strong>
                            <ol class="space-y-3 list-decimal list-inside text-slate-300">
                                <li>
                                    <strong>ขั้นที่ 1 แปลงความยาวแบคทีเรีย $4.5\text{ }\mu\text{m}$ เป็น $\text{mm}$ และ $\text{nm}$</strong>
                                    <div class="pl-5 pt-1 space-y-2">
                                        <p>• จาก $\mu\text{m}$ ไปเป็น $\text{mm}$ คือการเดินขึ้นบันได 1 ขั้น (หน่วยเล็กไปหน่วยใหญ่) จึงนำมา<strong>หารด้วย $1{,}000$</strong>:
                                            $$\text{ความยาวในหน่วยมิลลิเมตร} = \frac{4.5}{1{,}000} = 0.0045\text{ mm}$$
                                        </p>
                                        <p>• จาก $\mu\text{m}$ ไปเป็น $\text{nm}$ คือการเดินลงบันได 1 ขั้น (หน่วยใหญ่ไปหน่วยเล็ก) จึงนำมา<strong>คูณด้วย $1{,}000$</strong>:
                                            $$L_{\text{nm}} = 4.5 \times 1{,}000 = 4{,}500\text{ nm}$$
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <strong>ขั้นที่ 2 แปลงปริมาตรสารละลาย $0.05\text{ mL}$ เป็น $\mu\text{L}$</strong>
                                    <div class="pl-5 pt-1">
                                        <p>• จาก $\text{mL}$ ไปเป็น $\mu\text{L}$ คือการเดินลงบันได 1 ขั้น จึงนำมา<strong>คูณด้วย $1{,}000$</strong>:
                                            $$\text{ปริมาตรไมโครปิเปต} = 0.05 \times 1{,}000 = 50\text{ }\mu\text{L}$$
                                        </p>
                                    </div>
                                </li>
                            </ol>
                            <div class="p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 font-mono text-xs">
                                <strong>สรุปคำตอบ:</strong> แบคทีเรียมีความยาวเท่ากับ $0.0045\text{ mm}$ หรือ $4{,}500\text{ nm}$ และต้องตั้งค่าไมโครปิเปตที่ $50\text{ }\mu\text{L}$
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 1.3 -->
            <section id="sec-1.3" class="tex-section scroll-mt-20">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 font-black font-mono flex items-center justify-center text-lg border border-amber-500/30">1.3</span>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                        เลขนัยสำคัญ ความเที่ยง ความแม่น และความคลาดเคลื่อนของการวัดในห้องปฏิบัติการ
                    </h2>
                </div>

                <div class="tex-article leading-relaxed space-y-6 text-slate-200">
                    <!-- Figure 1.5: 3D Micropipette Mechanism Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.5-render">
                        <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_micropipette_3d.jpg" alt="ภาพที่ 1.5 ภาพตัดขวาง 3 มิติแสดงกลไกลูกสูบไมโครปิเปต 2 จังหวะ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-amber-400">ภาพที่ 1.6</strong>&ensp;แบบจำลอง 3 มิติเชิงเทคนิคแสดงภาพตัดขวางของไมโครปิเปต P1000: แสดงกลไกปุ่มกด 2 จังหวะ (First Stop สำหรับดูดสาร และ Second Stop สำหรับเป่าสารออกให้หมด), สปริงสอบเทียบ, แกนลูกสูบ, หน้าปัดดิจิทัล $1{,}000\text{ }\mu\text{L}$ และหยดของเหลวที่ปลายทิป
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        ในการบันทึกผลการทดลองทางวิทยาศาสตร์ ตัวเลขทุกตัวที่เขียนลงในตารางบันทึกผลต้องสะท้อนความละเอียดของเครื่องมือวัดจริง ซึ่งเรียกว่า <strong>เลขนัยสำคัญ</strong> (<strong>Significant Figures</strong>) โดยประกอบด้วยตัวเลขที่อ่านได้แน่นอนจากขีดสเกลรวมกับตัวเลขประมาณค่าอีก 1 ตำแหน่ง นอกจากนี้ นักจุลชีววิทยาต้องแยกแยะความแตกต่างระหว่าง <strong>ความแม่น</strong> (<strong>Accuracy</strong> คือความใกล้เคียงกับค่าจริงมาตรฐาน) และ <strong>ความเที่ยง</strong> (<strong>Precision</strong> คือความสม่ำเสมอหรือการซ้ำรอยเดิมเมื่อวัดซ้ำหลายครั้ง)
                    </p>

                    <!-- 3D Target: Accuracy vs Precision -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-accuracy-precision">
                        <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_accuracy_precision_3d.jpg" alt="เปรียบเทียบความแม่นยำและความเที่ยงตรง 3 มิติ (Accuracy vs Precision Targets)" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-amber-400">ภาพที่ 1.5</strong>&ensp;แบบจำลอง 3 มิติเปรียบเทียบความแตกต่างระหว่างความแม่น (Accuracy) และความเที่ยง (Precision) ผ่านเป้ายิง 4 รูปแบบ: (1) แม่นสูง-เที่ยงสูง เกาะกลุ่มตรงกลางเป้า (2) แม่นต่ำ-เที่ยงสูง เกาะกลุ่มแน่นแต่นอกเป้า (3) แม่นสูง-เที่ยงต่ำ กระจายรอบจุดกึ่งกลาง (4) แม่นต่ำ-เที่ยงต่ำ กระจายไร้ทิศทาง
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        หากเราต้องการตรวจสอบว่าไมโครปิเปตในห้องปฏิบัติการยังมีความแม่นยำหรือไม่ เราสามารถใช้วิธีชั่งมวลของน้ำกลั่นที่ดูดออกมา เนื่องจากน้ำบริสุทธิ์ที่อุณหภูมิห้องมีความหนาแน่นประมาณ $1\text{ g/mL}$ หรือกล่าวได้ว่า <strong>น้ำกลั่นปริมาตร $1{,}000\text{ }\mu\text{L}$ ($1\text{ mL}$) จะมีมวลเท่ากับ $1.0000\text{ g}$ และน้ำกลั่น $100\text{ }\mu\text{L}$ จะมีมวลเท่ากับ $0.1000\text{ g}$</strong> โดยคำนวณเปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์ได้จากสมการที่ (1.1)
                    </p>

                    <!-- Formula Highlight Card -->
                    <div class="p-5 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-950 to-slate-900 border border-slate-700/80 text-center shadow-lg">
                        <span class="text-xs font-mono text-cyan-400 uppercase tracking-widest block mb-1">สมการที่ (1.1) เปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์ (Relative Error)</span>
                        <div class="text-base sm:text-lg text-white font-mono py-2">
                            $$\text{เปอร์เซ็นต์ความคลาดเคลื่อน} = \frac{|\text{ค่าที่วัดได้จริง} - \text{ค่ามาตรฐาน}|}{\text{ค่ามาตรฐาน}} \times 100\% \tag{1.1}$$
                        </div>
                    </div>

                    <!-- Warning Alert Card: First Stop vs Second Stop -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-rose-950/40 via-slate-900 to-slate-900 border border-rose-500/40 shadow-xl space-y-3">
                        <div class="flex items-center gap-2.5 text-rose-300 font-bold text-base">
                            <i class="fa-solid fa-triangle-exclamation text-rose-400 text-lg"></i> ข้อควรระวังสูงสุด: ห้ามกดปุ่มไมโครปิเปตเลยจังหวะแรกขณะดูดสารละลาย
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            ไมโครปิเปตมีปุ่มกด 2 จังหวะ (<strong>First Stop</strong> และ <strong>Second Stop</strong>) ขณะจุ่มปลายทิปเพื่อดูดสารละลายหรือเชื้อจุลินทรีย์ <strong>ต้องกดลงไปเพียงจังหวะแรกเท่านั้น</strong> แล้วค่อยๆ ผ่อนนิ้วขึ้น หากเผลอกดลงไปถึงจังหวะที่สองขณะดูดสาร จะทำให้ได้ปริมาตรเกินกว่าที่ตั้งไว้ถึง 10–15% ส่วนจังหวะที่สองมีไว้ใช้ตอนปล่อยสารออกจากปลายทิปให้หมดจดเท่านั้น
                        </p>
                    </div>
                </div>
            </section>

            <!-- SECTION 1.4 -->
            <section id="sec-1.4" class="tex-section scroll-mt-20">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-10 h-10 rounded-xl bg-teal-500/20 text-teal-400 font-black font-mono flex items-center justify-center text-lg border border-teal-500/30">1.4</span>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                        ปฏิบัติการที่ 1 การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล (3 ชั่วโมง)
                    </h2>
                </div>

                <div class="tex-article leading-relaxed space-y-6 text-slate-200">
                    <!-- Figure 1.7: Lab Materials 3D Pixar Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.7">
                        <div class="rounded-2xl overflow-hidden border border-teal-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_lab_apparatus_3d.jpg" alt="ภาพที่ 1.7 ชุดอุปกรณ์ปฏิบัติการที่ 1 แบบจำลอง 3 มิติ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-teal-400">ภาพที่ 1.7</strong>&ensp;แบบจำลอง 3 มิติชุดอุปกรณ์ปฏิบัติการที่ 1 (3D Pixar Style): เวอร์เนียร์คาลิปเปอร์วัดมิติจานเพาะเชื้อแก้ว, ไมโครมิเตอร์วัดความหนาแผ่นสไลด์, ไมโครปิเปต P1000 พร้อมทิปสีฟ้า และเครื่องชั่งดิจิทัลวิเคราะห์ทศนิยม 4 ตำแหน่ง ($0.0001\text{ g}$)
                        </figcaption>
                    </figure>

                    <!-- Lab Protocol Box -->
                    <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-teal-950/40 via-slate-900 to-slate-900 border border-teal-500/30 shadow-xl space-y-6">
                        <div class="flex items-center justify-between flex-wrap gap-2 pb-4 border-b border-teal-500/20">
                            <div class="flex items-center gap-2.5">
                                <div class="w-9 h-9 rounded-xl bg-teal-500/20 flex items-center justify-center text-teal-300 font-bold">
                                    <i class="fa-solid fa-flask-vial"></i>
                                </div>
                                <h3 class="text-base sm:text-lg font-bold text-white">คู่มือขั้นตอนปฏิบัติการที่ 1 (Lab 01 Protocol)</h3>
                            </div>
                            <a href="../labs/lab01_measurement.php" class="px-3.5 py-1.5 rounded-xl bg-teal-500/20 hover:bg-teal-500/30 text-teal-300 border border-teal-500/40 text-xs font-mono font-bold transition flex items-center gap-1.5">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> เปิดหน้าแล็บเต็ม ↗
                            </a>
                        </div>

                        <!-- Materials Checklist -->
                        <div class="space-y-2">
                            <h4 class="text-xs font-bold font-mono uppercase text-teal-300 tracking-wider flex items-center gap-1.5">
                                <i class="fa-solid fa-box-open"></i> 1. วัสดุและอุปกรณ์ประจำโต๊ะปฏิบัติการ
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-slate-300">
                                <label class="flex items-center gap-2 p-2.5 rounded-lg bg-slate-950/60 border border-slate-800 cursor-pointer hover:bg-slate-800/40 transition">
                                    <input type="checkbox" checked class="rounded border-slate-700 text-teal-500 focus:ring-0">
                                    <span>เวอร์เนียร์คาลิปเปอร์ (ความละเอียด $0.05\text{ mm}$)</span>
                                </label>
                                <label class="flex items-center gap-2 p-2.5 rounded-lg bg-slate-950/60 border border-slate-800 cursor-pointer hover:bg-slate-800/40 transition">
                                    <input type="checkbox" checked class="rounded border-slate-700 text-teal-500 focus:ring-0">
                                    <span>ไมโครมิเตอร์ (ความละเอียด $0.01\text{ mm}$)</span>
                                </label>
                                <label class="flex items-center gap-2 p-2.5 rounded-lg bg-slate-950/60 border border-slate-800 cursor-pointer hover:bg-slate-800/40 transition">
                                    <input type="checkbox" checked class="rounded border-slate-700 text-teal-500 focus:ring-0">
                                    <span>ไมโครปิเปต P1000 ($100\text{--}1{,}000\text{ }\mu\text{L}$) & ทิปสีฟ้า</span>
                                </label>
                                <label class="flex items-center gap-2 p-2.5 rounded-lg bg-slate-950/60 border border-slate-800 cursor-pointer hover:bg-slate-800/40 transition">
                                    <input type="checkbox" checked class="rounded border-slate-700 text-teal-500 focus:ring-0">
                                    <span>เครื่องชั่งดิจิทัลละเอียดทศนิยม 4 ตำแหน่ง ($0.0001\text{ g}$)</span>
                                </label>
                            </div>
                        </div>

                        <!-- 2 Step Procedure -->
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold font-mono uppercase text-teal-300 tracking-wider flex items-center gap-1.5">
                                <i class="fa-solid fa-list-ol"></i> 2. ขั้นตอนการทดลอง
                            </h4>
                            <div class="space-y-3 text-xs sm:text-sm text-slate-300">
                                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                                    <strong class="text-white block">ตอนที่ 1: การวัดมิติภาชนะทางจุลชีววิทยา</strong>
                                    <p class="leading-relaxed">
                                        ใช้เวอร์เนียร์คาลิปเปอร์วัดเส้นผ่านศูนย์กลางภายในและความลึกของจานเพาะเชื้อ 3 ครั้ง และใช้ไมโครมิเตอร์วัดความหนาของแผ่นสไลด์แก้ว 3 ครั้ง บันทึกค่าเฉลี่ยและแปลงหน่วยเป็นไมโครเมตร ($\mu\text{m}$)
                                    </p>
                                </div>
                                <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800 space-y-1">
                                    <strong class="text-white block">ตอนที่ 2: การตรวจสอบความแม่นและความเที่ยงของไมโครปิเปต</strong>
                                    <p class="leading-relaxed">
                                        วางบีกเกอร์พลาสติกขนาดเล็กบนเครื่องชั่งดิจิทัลแล้วกดปุ่มเซตศูนย์ (<strong>Tare</strong>) จากนั้นตั้งค่าไมโครปิเปต P1000 ที่ปริมาตร $500\text{ }\mu\text{L}$ ดูดน้ำกลั่นหยดลงในบีกเกอร์ อ่านค่ามวลเป็นกรัม ($\text{g}$) ทำซ้ำ 3 ครั้ง แล้วคำนวณค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนเทียบกับค่ามาตรฐาน $0.5000\text{ g}$
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Table: Observation Table -->
                        <div class="space-y-2">
                            <h4 class="text-xs font-bold font-mono uppercase text-teal-300 tracking-wider flex items-center gap-1.5">
                                <i class="fa-solid fa-pen-to-square"></i> 3. ตารางบันทึกผลการทดลอง (สำหรับนักศึกษาบันทึกค่าจริง)
                            </h4>
                            <div class="tex-table-wrap overflow-x-auto rounded-xl border border-slate-700/80 bg-slate-950/90 shadow-lg">
                                <table class="tex-table w-full text-xs">
                                    <thead>
                                        <tr class="bg-slate-800/90 text-white border-b border-slate-700">
                                            <th class="p-3 text-left">รายการที่วัด</th>
                                            <th class="p-3 text-center">ครั้งที่ 1</th>
                                            <th class="p-3 text-center">ครั้งที่ 2</th>
                                            <th class="p-3 text-center">ครั้งที่ 3</th>
                                            <th class="p-3 text-center">ค่าเฉลี่ย ($\bar{x}$)</th>
                                            <th class="p-3 text-left">ผลแปลงหน่วย / ความคลาดเคลื่อน</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-800">
                                        <tr>
                                            <td class="p-3 font-semibold text-white">เส้นผ่านศูนย์กลางจานเพาะเชื้อ ($\text{mm}$)</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-cyan-400">............</td>
                                            <td class="p-3 text-slate-300 font-mono">............ $\mu\text{m}$</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 font-semibold text-white">ความหนาของแผ่นสไลด์แก้ว ($\text{mm}$)</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-cyan-400">............</td>
                                            <td class="p-3 text-slate-300 font-mono">............ $\mu\text{m}$</td>
                                        </tr>
                                        <tr>
                                            <td class="p-3 font-semibold text-white">มวลน้ำกลั่นจากปิเปต $500\text{ }\mu\text{L}$ ($\text{g}$)</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-slate-400">............</td>
                                            <td class="p-3 text-center font-mono text-cyan-400">............</td>
                                            <td class="p-3 text-slate-300 font-mono">คลาดเคลื่อน ............ %</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION: REVIEW QUESTIONS -->
            <section id="review-questions" class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl scroll-mt-20">
                <div class="flex items-center justify-between flex-wrap gap-2 mb-6 pb-4 border-b border-indigo-500/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30 shadow-inner">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 1 (ทบทวนแนวคิดและการคำนวณ)</h3>
                            <p class="text-xs text-slate-400 font-mono">แบบฝึกหัดทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                        </div>
                    </div>
                    <span class="text-xs font-mono text-indigo-300 bg-indigo-500/10 px-3 py-1 rounded-full border border-indigo-500/30">Self-Assessment</span>
                </div>

                <div class="space-y-4 text-xs sm:text-sm text-slate-200">
                    <!-- Q1 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-2">
                        <div class="flex items-start justify-between gap-3">
                            <p class="leading-relaxed font-medium">
                                <strong class="text-indigo-400">ข้อที่ 1:</strong> เซลล์ยีสต์ <em>Saccharomyces cerevisiae</em> มีเส้นผ่านศูนย์กลางประมาณ $6\text{ }\mu\text{m}$ จงแปลงค่าดังกล่าวให้เป็นหน่วยมิลลิเมตร ($\text{mm}$) และนาโนเมตร ($\text{nm}$) โดยใช้เทคนิคบันไดขั้นละ $1{,}000$
                            </p>
                            <button type="button" onclick="toggleHint('hint-1')" class="px-2.5 py-1 rounded-lg bg-indigo-500/20 hover:bg-indigo-500/30 text-indigo-300 text-xs font-mono shrink-0 transition">
                                <i class="fa-solid fa-key"></i> เฉลย
                            </button>
                        </div>
                        <div id="hint-1" class="hidden mt-2 p-3 rounded-lg bg-indigo-950/30 border border-indigo-500/30 text-xs text-slate-300 space-y-1">
                            <p><strong>แนวคิด:</strong></p>
                            <p>• จาก $\mu\text{m}$ ไป $\text{mm}$ เดินขึ้น 1 ขั้น (หาร $1{,}000$): $\frac{6}{1{,}000} = 0.006\text{ mm}$</p>
                            <p>• จาก $\mu\text{m}$ ไป $\text{nm}$ เดินลง 1 ขั้น (คูณ $1{,}000$): $6 \times 1{,}000 = 6{,}000\text{ nm}$</p>
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-2">
                        <div class="flex items-start justify-between gap-3">
                            <p class="leading-relaxed font-medium">
                                <strong class="text-indigo-400">ข้อที่ 2:</strong> หากต้องการเตรียมสารละลายยาปฏิชีวนะปริมาตร $0.25\text{ mL}$ นักศึกษาควรเลือกใช้ไมโครปิเปตขนาดใดระหว่าง P20, P200 หรือ P1000 และต้องตั้งตัวเลขเป็นกี่ไมโครลิตร ($\mu\text{L}$) เพราะเหตุใด
                            </p>
                            <button type="button" onclick="toggleHint('hint-2')" class="px-2.5 py-1 rounded-lg bg-indigo-500/20 hover:bg-indigo-500/30 text-indigo-300 text-xs font-mono shrink-0 transition">
                                <i class="fa-solid fa-key"></i> เฉลย
                            </button>
                        </div>
                        <div id="hint-2" class="hidden mt-2 p-3 rounded-lg bg-indigo-950/30 border border-indigo-500/30 text-xs text-slate-300 space-y-1">
                            <p><strong>แนวคิด:</strong></p>
                            <p>• แปลงปริมาตร: $0.25\text{ mL} \times 1{,}000 = 250\text{ }\mu\text{L}$</p>
                            <p>• ปริมาตร $250\text{ }\mu\text{L}$ เกินช่วงของ P20 ($2\text{--}20\text{ }\mu\text{L}$) และ P200 ($20\text{--}200\text{ }\mu\text{L}$)</p>
                            <p>• ดังนั้นต้องเลือกใช้ <strong>P1000</strong> ($100\text{--}1{,}000\text{ }\mu\text{L}$) และตั้งหน้าปัดไว้ที่ <strong>$250\text{ }\mu\text{L}$</strong></p>
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="p-4 rounded-xl bg-slate-950/60 border border-slate-800 space-y-2">
                        <div class="flex items-start justify-between gap-3">
                            <p class="leading-relaxed font-medium">
                                <strong class="text-indigo-400">ข้อที่ 3:</strong> ในการทดสอบไมโครปิเปตที่ตั้งค่าไว้ $200\text{ }\mu\text{L}$ นักศึกษาชั่งมวลน้ำกลั่น 3 ครั้ง ได้ค่า $0.198\text{ g}$, $0.199\text{ g}$ และ $0.197\text{ g}$ จงหาค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนเทียบกับค่ามาตรฐาน $0.200\text{ g}$
                            </p>
                            <button type="button" onclick="toggleHint('hint-3')" class="px-2.5 py-1 rounded-lg bg-indigo-500/20 hover:bg-indigo-500/30 text-indigo-300 text-xs font-mono shrink-0 transition">
                                <i class="fa-solid fa-key"></i> เฉลย
                            </button>
                        </div>
                        <div id="hint-3" class="hidden mt-2 p-3 rounded-lg bg-indigo-950/30 border border-indigo-500/30 text-xs text-slate-300 space-y-1">
                            <p><strong>แนวคิด:</strong></p>
                            <p>• ค่าเฉลี่ยมวลน้ำกลั่น = $\frac{0.198 + 0.199 + 0.197}{3} = 0.1980\text{ g}$</p>
                            <p>• เปอร์เซ็นต์ความคลาดเคลื่อน = $\frac{|0.1980 - 0.2000|}{0.2000} \times 100\% = \frac{0.0020}{0.2000} \times 100\% = 1.00\%$</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="../index.php" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs font-mono transition flex items-center gap-2 border border-slate-700">
                    <i class="fas fa-arrow-left"></i> สารบัญ 12 บทเรียน
                </a>
                
                <a href="ch02_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
                    บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>

<script>
// Scroll Progress Bar
window.addEventListener('scroll', () => {
    const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = (winScroll / height) * 100;
    const bar = document.getElementById('scrollProgressBar');
    if (bar) bar.style.width = scrolled + '%';
});

// Interactive Hint Toggle for Questions
function toggleHint(id) {
    const el = document.getElementById(id);
    if (el) {
        el.classList.toggle('hidden');
    }
}

// Font Size Adjuster
let currentFontSizeLevel = 0;
const baseSizes = ['text-[14px]', 'text-[15px]', 'text-[16px]', 'text-[18px]'];
function adjustFontSize(dir) {
    const content = document.getElementById('chapterContent');
    if (!content) return;
    if (dir === 0) {
        currentFontSizeLevel = 0;
        content.style.fontSize = '';
    } else {
        currentFontSizeLevel = Math.max(-1, Math.min(2, currentFontSizeLevel + dir));
        if (currentFontSizeLevel === -1) content.style.fontSize = '90%';
        else if (currentFontSizeLevel === 0) content.style.fontSize = '100%';
        else if (currentFontSizeLevel === 1) content.style.fontSize = '110%';
        else if (currentFontSizeLevel === 2) content.style.fontSize = '120%';
    }
}
</script>

<?php include '../includes/footer.php'; ?>
