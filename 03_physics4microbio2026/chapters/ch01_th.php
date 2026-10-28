<?php
$pageTitle = "บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์";
$basePath = '../';
include '../includes/header.php';
?>

<!-- Scroll Progress Bar -->
<div id="scrollProgressBar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-cyan-400 via-emerald-400 to-indigo-500 z-[100] transition-all duration-150" style="width: 0%;"></div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section: Widescreen 2-Column Showcase -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80 bg-gradient-to-b from-slate-950 via-slate-900 to-slate-950 py-10 lg:py-14">
        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                
                <!-- Left Info & Meta Column (7 cols) -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- Breadcrumbs -->
                    <nav class="flex items-center flex-wrap gap-2 text-xs text-slate-400 font-mono">
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

                    <div class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-300 font-mono text-xs border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                        <i class="fas fa-atom text-xs text-cyan-400"></i> MODULE 01 &bull; UNITS, METROLOGY & MICRO-PHYSICS
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black leading-tight tracking-tight text-white drop-shadow-md">
                        ระบบหน่วยและการวัดในโลกจุลทรรศน์
                    </h1>

                    <p class="text-sm md:text-base text-slate-300 font-light leading-relaxed max-w-2xl">
                        เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 1)
                    </p>

                    <!-- Quick Meta Badges -->
                    <div class="flex flex-wrap gap-2.5 text-xs text-slate-300 font-mono pt-1">
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
                    <div class="flex flex-wrap items-center gap-3 pt-2">
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

                <!-- Right Column: 3D Pixar Hero Cinematic Artwork (5 cols) -->
                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden border border-cyan-500/40 shadow-2xl bg-slate-950/90 group relative">
                        <div class="absolute top-3 left-3 z-10 px-2.5 py-1 rounded-full bg-slate-950/80 border border-cyan-400/40 text-[10px] font-mono text-cyan-300 backdrop-blur-md flex items-center gap-1.5 shadow-lg">
                            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                            <span>3D CINEMATIC ARTWORK</span>
                        </div>
                        <img src="../images/sec_3d/ch01_hero_banner_3d.jpg" alt="แบนเนอร์ 3 มิติ สไตล์พิกซาร์ บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์" class="w-full h-auto object-cover group-hover:scale-[1.02] transition-transform duration-500" loading="lazy">
                        <div class="px-4 py-2.5 bg-slate-950/95 border-t border-slate-800 flex items-center justify-between text-[11px] font-mono text-slate-400">
                            <span class="flex items-center gap-1.5 text-cyan-300">
                                <i class="fa-solid fa-atom"></i> Units, Metrology & Precision Skills
                            </span>
                            <span class="text-amber-400 font-semibold">ISO 8655 & SI 2019</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sticky Table of Contents Quick Nav Bar -->
    <div class="sticky top-16 z-40 bg-slate-900/95 backdrop-blur-md border-b border-slate-800 py-2.5 shadow-md">
        <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-3 overflow-x-auto text-xs font-mono whitespace-nowrap scrollbar-none">
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

    <!-- Main Container: Modern 2-Column Documentation / Textbook Layout -->
    <div class="max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Sticky Sidebar (3 cols) -->
            <aside class="hidden lg:block lg:col-span-3 sticky top-28 space-y-6">
                <!-- Card 1: สารบัญนำทางประจำบท (Interactive Navigator) -->
                <div class="p-5 rounded-2xl bg-slate-900/90 border border-slate-800 shadow-xl backdrop-blur-xl space-y-3">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-cyan-400 flex items-center justify-between pb-2.5 border-b border-slate-800">
                        <span class="flex items-center gap-2"><i class="fa-solid fa-list-ul"></i> สารบัญประจำบท</span>
                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-cyan-950 text-cyan-300 border border-cyan-500/30">4 หัวข้อ</span>
                    </div>
                    <nav class="space-y-1 text-xs font-mono">
                        <a href="#curriculum-plan" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-[10px] group-hover:bg-indigo-500 group-hover:text-slate-950 font-bold transition">📋</span>
                            <span class="truncate">แผนการสอนประจำบท</span>
                        </a>
                        <a href="#sec-1.1" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-[10px] group-hover:bg-cyan-500 group-hover:text-slate-950 font-bold transition">1.1</span>
                            <span class="truncate">หน่วยเอสไอ & 7 ค่าคงตัว</span>
                        </a>
                        <a href="#tab-1.1" class="group flex items-center gap-2.5 px-3 py-1.5 rounded-xl text-slate-400 hover:text-cyan-300 hover:bg-slate-800/50 transition text-[11px] pl-6">
                            <span>↳ ตาราง 1.1: 7 หน่วยฐาน</span>
                        </a>
                        <a href="#sec-1.2" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-[10px] group-hover:bg-emerald-500 group-hover:text-slate-950 font-bold transition">1.2</span>
                            <span class="truncate">การแปลงหน่วย & บันไดเลื่อน</span>
                        </a>
                        <a href="#sec-aruco" class="group flex items-center gap-2.5 px-3 py-1.5 rounded-xl text-slate-400 hover:text-emerald-300 hover:bg-slate-800/50 transition text-[11px] pl-6">
                            <span>↳ 🥽 3D WebAR ArUco ID:0</span>
                        </a>
                        <a href="#sec-1.3" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center text-[10px] group-hover:bg-amber-500 group-hover:text-slate-950 font-bold transition">1.3</span>
                            <span class="truncate">ความเที่ยง แม่น & ไมโครปิเปต</span>
                        </a>
                        <a href="#sec-1.4" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-teal-500/20 text-teal-400 flex items-center justify-center text-[10px] group-hover:bg-teal-500 group-hover:text-slate-950 font-bold transition">1.4</span>
                            <span class="truncate">ปฏิบัติการที่ 1 & การวัดละเอียด</span>
                        </a>
                        <a href="#review-questions" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl text-slate-300 hover:text-white hover:bg-slate-800/80 transition border border-transparent hover:border-slate-700">
                            <span class="w-6 h-6 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-[10px] group-hover:bg-purple-500 group-hover:text-slate-950 font-bold transition">📝</span>
                            <span class="truncate">คำถามทบทวนท้ายบท</span>
                        </a>
                    </nav>
                </div>

                <!-- Card 2: 3D Virtual Lab & WebAR Launchpad -->
                <div class="p-5 rounded-2xl bg-gradient-to-br from-slate-900/90 via-slate-900 to-indigo-950/40 border border-indigo-500/30 shadow-xl space-y-3">
                    <div class="text-xs font-mono font-bold uppercase tracking-wider text-indigo-300 flex items-center gap-2 pb-2.5 border-b border-slate-800">
                        <i class="fa-solid fa-cube text-cyan-400"></i> เครื่องมือ 3D & XR ประจำบท
                    </div>
                    <div class="space-y-2">
                        <a href="../webar/ar_aruco_textbook.html?id=0&ar=1" target="_blank" class="w-full py-2.5 px-3.5 rounded-xl bg-cyan-500/10 hover:bg-cyan-500/20 border border-cyan-500/30 text-cyan-300 font-mono text-xs font-bold transition flex items-center justify-between group">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-camera-rotate group-hover:rotate-180 transition-transform"></i> ส่อง 3D WebAR ArUco
                            </span>
                            <span class="text-[10px] bg-cyan-950 px-1.5 py-0.5 rounded border border-cyan-400/40">ID: 0</span>
                        </a>
                        <a href="../../virtual_lab/sim_micropipette_3d.html" target="_blank" class="w-full py-2.5 px-3.5 rounded-xl bg-purple-500/10 hover:bg-purple-500/20 border border-purple-500/30 text-purple-300 font-mono text-xs font-bold transition flex items-center justify-between group">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-vr-cardboard"></i> 3D P1000 Simulator
                            </span>
                            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
                        </a>
                        <a href="../labs/lab01_measurement.php" class="w-full py-2.5 px-3.5 rounded-xl bg-emerald-500/10 hover:bg-emerald-500/20 border border-emerald-500/30 text-emerald-300 font-mono text-xs font-bold transition flex items-center justify-between group">
                            <span class="flex items-center gap-2">
                                <i class="fa-solid fa-flask-vial"></i> ปฏิบัติการ Lab 01
                            </span>
                            <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3: ค่าคงตัวฟิสิกส์สากล (Metrology Constants) -->
                <div class="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 text-xs font-mono space-y-2">
                    <div class="text-[11px] font-bold text-amber-400 uppercase tracking-wider flex items-center gap-1.5 pb-1 border-b border-slate-800">
                        <i class="fa-solid fa-scale-balanced"></i> ค่าคงตัวสากล SI 2019
                    </div>
                    <div class="space-y-1.5 text-[11px] text-slate-300">
                        <div class="flex justify-between items-center py-0.5">
                            <span class="text-slate-400">Planck ($h$)</span>
                            <span class="text-cyan-300 font-bold">$6.626\times 10^{-34}\text{ J}\cdot\text{s}$</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span class="text-slate-400">Speed of light ($c$)</span>
                            <span class="text-cyan-300 font-bold">$299,792,458\text{ m/s}$</span>
                        </div>
                        <div class="flex justify-between items-center py-0.5">
                            <span class="text-slate-400">Cesium-133 ($\Delta\nu_{\text{Cs}}$)</span>
                            <span class="text-cyan-300 font-bold">$9.192\times 10^9\text{ Hz}$</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Right Main Content Area (9 cols) -->
            <div class="lg:col-span-9 w-full min-w-0">
                <div id="chapterContent" class="rounded-3xl shadow-2xl overflow-hidden border p-5 sm:p-8 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12 transition-all">

            <!-- Curriculum Planbox (แผนบริหารการสอนประจำบทที่ 1 — 4 Card Grid) -->
            <div id="curriculum-plan" class="p-6 md:p-8 rounded-3xl bg-gradient-to-br from-indigo-950/50 via-slate-900 to-slate-950 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-4 pb-4 border-b border-indigo-500/20">
                    <div class="flex items-center gap-3.5">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500/30 to-purple-600/40 flex items-center justify-center text-indigo-300 border border-indigo-400/40 shadow-lg shadow-indigo-500/20 text-xl">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                        <div>
                            <h3 class="text-lg md:text-xl font-extrabold text-white flex items-center gap-2.5">
                                แผนบริหารการสอนประจำบทที่ 1
                                <span class="text-xs px-3 py-0.5 rounded-full bg-indigo-500/20 text-indigo-300 border border-indigo-500/40 font-mono font-bold shadow-sm">สัปดาห์ที่ 1</span>
                            </h3>
                            <p class="text-xs text-slate-400 font-mono mt-0.5">แผนการจัดการเรียนรู้บูรณาการ Outcome-Based Education (OBE มคอ.3) พ.ศ. 2569/2570</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-mono text-cyan-400 bg-cyan-950/60 border border-cyan-500/30 px-3 py-1 rounded-full">Course Blueprint: 4 Modules</span>
                </div>

                <!-- 4 Distinct Cards: 2x2 Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
                    <!-- CARD 1 (Top-Left): Course Content Topics -->
                    <div class="p-5 rounded-2xl bg-slate-900/90 border border-indigo-500/30 shadow-lg hover:border-indigo-400/50 transition-all flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-800">
                                <h4 class="text-xs sm:text-[13px] font-bold font-mono uppercase text-indigo-300 tracking-wider flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center text-xs border border-indigo-500/30">1</span>
                                    หัวข้อเนื้อหาประจำบท
                                </h4>
                                <span class="text-[11px] font-mono text-indigo-300 bg-indigo-950/80 px-2 py-0.5 rounded border border-indigo-500/30">บรรยาย 2 ชม. + ปฏิบัติการ 3 ชม.</span>
                            </div>
                            <ul class="text-xs sm:text-[13px] space-y-2.5 text-slate-300">
                                <li class="flex items-start gap-2">
                                    <span class="text-cyan-400 font-mono font-bold mt-0.5">1.1</span>
                                    <span>ระบบหน่วยเอสไอและ 7 ค่าคงตัวพื้นฐานในงานจุลชีววิทยา (SI 2019)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-emerald-400 font-mono font-bold mt-0.5">1.2</span>
                                    <span>การแปลงหน่วยเซลล์และปริมาตรด้วยเทคนิคบันไดเลื่อนจุดทศนิยม ($\text{mm} \leftrightarrow \mu\text{m} \leftrightarrow \text{nm}$)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-amber-400 font-mono font-bold mt-0.5">1.3</span>
                                    <span>เลขนนัยสำคัญ ความเที่ยง ความแม่น และฟิสิกส์การใช้ไมโครปิเปต</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-teal-400 font-mono font-bold mt-0.5">1.4</span>
                                    <span>ปฏิบัติการที่ 1 การวัดละเอียดและทักษะการใช้ไมโครปิเปตสำหรับงานจุลชีววิทยา</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] font-mono text-slate-400 flex items-center gap-1.5">
                            <i class="fa-solid fa-clock text-indigo-400"></i> รวมเวลาจัดการเรียนรู้ 5 คาบ/สัปดาห์
                        </div>
                    </div>

                    <!-- CARD 3 (Top-Right): Active Learning Activities -->
                    <div class="p-5 rounded-2xl bg-slate-900/90 border border-emerald-500/30 shadow-lg hover:border-emerald-400/50 transition-all flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-800">
                                <h4 class="text-xs sm:text-[13px] font-bold font-mono uppercase text-emerald-300 tracking-wider flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xs border border-emerald-500/30">3</span>
                                    กิจกรรมการเรียนรู้เชิงรุก (Active Learning)
                                </h4>
                                <span class="text-[11px] font-mono text-emerald-300 bg-emerald-950/80 px-2 py-0.5 rounded border border-emerald-500/30">Pedagogy</span>
                            </div>
                            <div class="space-y-2.5 text-xs sm:text-[13px] text-slate-300">
                                <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800/80">
                                    <strong class="text-white flex items-center gap-1.5 mb-1">
                                        <i class="fa-solid fa-flag text-rose-400 text-xs"></i> ขั้นนำเข้าสู่บทเรียน (Engagement):
                                    </strong>
                                    <p class="text-slate-300 leading-relaxed">ยกกรณีศึกษาแล็บจริง การดูดสารละลายผิดหน่วยระหว่าง $100\text{ }\mu\text{L}$ กับ $1\text{ mL}$ ที่ทำให้ความเข้มข้นเชื้อคลาดเคลื่อน 10 เท่า</p>
                                </div>
                                <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800/80">
                                    <strong class="text-white flex items-center gap-1.5 mb-1">
                                        <i class="fa-solid fa-brain text-sky-400 text-xs"></i> ขั้นสอนและฝึกคิด (Practice):
                                    </strong>
                                    <p class="text-slate-300 leading-relaxed">ใช้แผนภาพบันไดคำอุปสรรค ($\times 1{,}000$ และ $\div 1{,}000$) พร้อมกิจกรรมใบงานคู่คิด (Think-Pair-Share)</p>
                                </div>
                                <div class="p-2.5 rounded-xl bg-slate-950/60 border border-slate-800/80">
                                    <strong class="text-white flex items-center gap-1.5 mb-1">
                                        <i class="fa-solid fa-flask-vial text-emerald-400 text-xs"></i> ขั้นทดลองปฏิบัติการ (Hands-on Lab):
                                    </strong>
                                    <p class="text-slate-300 leading-relaxed">แบ่งกลุ่มฝึกใช้เวอร์เนียร์ ไมโครมิเตอร์ และทดสอบความแม่นของไมโครปิเปตผ่านการชั่งน้ำกลั่นบนเครื่องชั่ง 4 ตำแหน่ง</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CARD 2 (Bottom-Left): CLOs & PLOs Mapping -->
                    <div class="p-5 rounded-2xl bg-slate-900/90 border border-cyan-500/30 shadow-lg hover:border-cyan-400/50 transition-all flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-800">
                                <h4 class="text-xs sm:text-[13px] font-bold font-mono uppercase text-cyan-300 tracking-wider flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs border border-cyan-500/30">2</span>
                                    ผลลัพธ์การเรียนรู้รายวิชา (CLOs & PLOs)
                                </h4>
                                <span class="text-[11px] font-mono text-cyan-300 bg-cyan-950/80 px-2 py-0.5 rounded border border-cyan-500/30">OBE Mapping</span>
                            </div>
                            <ul class="text-xs sm:text-[13px] space-y-2.5 text-slate-300">
                                <li class="flex items-start gap-2.5">
                                    <span class="px-2 py-0.5 rounded-md bg-cyan-500/20 text-cyan-300 text-[11px] font-mono font-bold shrink-0 mt-0.5 border border-cyan-500/40">CLO1</span>
                                    <span>อธิบายระบบหน่วยสากลเอสไอ 2019 และคำอุปสรรคสำหรับแบคทีเรีย ยีสต์ และไวรัสได้ถูกต้อง <em class="text-slate-400 font-mono">(PLO2)</em></span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 text-[11px] font-mono font-bold shrink-0 mt-0.5 border border-emerald-500/40">CLO2</span>
                                    <span>คำนวณแปลงหน่วยระหว่าง $\text{mm} \leftrightarrow \mu\text{m} \leftrightarrow \text{nm}$ และ $\text{mL} \leftrightarrow \mu\text{L}$ ได้คล่องแคล่ว <em class="text-slate-400 font-mono">(PLO2, PLO3)</em></span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 text-[11px] font-mono font-bold shrink-0 mt-0.5 border border-amber-500/40">CLO3</span>
                                    <span>มีทักษะการใช้เวอร์เนียร์ ไมโครมิเตอร์ เครื่องชั่งดิจิทัล และไมโครปิเปตอย่างถูกวิธี <em class="text-slate-400 font-mono">(PLO1)</em></span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="px-2 py-0.5 rounded-md bg-purple-500/20 text-purple-300 text-[11px] font-mono font-bold shrink-0 mt-0.5 border border-purple-500/40">CLO4</span>
                                    <span>วิเคราะห์ความคลาดเคลื่อนของการวัดและเขียนรายงานผลการทดลองกลุ่มได้ถูกต้อง <em class="text-slate-400 font-mono">(PLO5, PLO6)</em></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- CARD 4 (Bottom-Right): Assessment & Learning Media -->
                    <div class="p-5 rounded-2xl bg-slate-900/90 border border-amber-500/30 shadow-lg hover:border-amber-400/50 transition-all flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3.5 pb-2.5 border-b border-slate-800">
                                <h4 class="text-xs sm:text-[13px] font-bold font-mono uppercase text-amber-300 tracking-wider flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center text-xs border border-amber-500/30">4</span>
                                    การวัดและประเมินผล & สื่อการเรียนรู้
                                </h4>
                                <span class="text-[11px] font-mono text-amber-300 bg-amber-950/80 px-2 py-0.5 rounded border border-amber-500/30">Evaluation & Media</span>
                            </div>
                            <div class="space-y-3 text-xs sm:text-[13px] text-slate-300">
                                <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800/80">
                                    <strong class="text-amber-300 flex items-center gap-1.5 mb-1.5">
                                        <i class="fa-solid fa-clipboard-check"></i> วิธีการและเครื่องมือวัดผล:
                                    </strong>
                                    <ul class="space-y-1 text-slate-300 list-disc list-inside">
                                        <li>แบบทดสอบก่อน-หลังเรียนประจำบท (CLO1, CLO2)</li>
                                        <li>แบบประเมินรูบริกการใช้ไมโครปิเปตและเวอร์เนียร์ (CLO3)</li>
                                        <li>รายงานผลปฏิบัติการที่ 1 พร้อมการวิเคราะห์ความคลาดเคลื่อน (CLO4)</li>
                                    </ul>
                                </div>
                                <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800/80">
                                    <strong class="text-cyan-300 flex items-center gap-1.5 mb-1.5">
                                        <i class="fa-solid fa-cube"></i> สื่อนวัตกรรมการเรียนรู้:
                                    </strong>
                                    <ul class="space-y-1 text-slate-300 list-disc list-inside">
                                        <li>เอกสารคำสอน 3D AR ArUco Marker ID: 0 (Interactive 3D Model)</li>
                                        <li>เว็บแอปพลิเคชัน 3D Virtual Lab Simulator (Vernier, Micropipette)</li>
                                        <li>ชุดอุปกรณ์วัดละเอียดและไมโครปิเปตจริงในห้องปฏิบัติการ</li>
                                    </ul>
                                </div>
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

                    <!-- 3D Pixar Scene 2: SI Base Units 3D Wheel -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-si-wheel">
                        <div class="rounded-2xl overflow-hidden border border-cyan-500/40 shadow-2xl bg-slate-950/90 group flex justify-center items-center p-4 sm:p-6 lg:p-8 backdrop-blur-xl">
                            <img src="../images/sec_3d/ch01_si_wheel_3d.jpg" alt="แบบจำลอง 3 มิติ สไตล์พิกซาร์ วงล้อ 7 หน่วยฐานสากลเอสไอ (The 7 SI Base Units 3D Pixar Wheel)" class="w-full max-w-2xl h-auto object-contain rounded-2xl group-hover:scale-[1.02] transition-transform duration-500 shadow-2xl" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-cyan-400">ภาพที่ 1.3</strong>&ensp;แบบจำลอง 3 มิติสไตล์พิกซาร์สมจริง วงล้อ 7 หน่วยฐานสากลเอสไอ (The 7 SI Base Units 3D Pixar Wheel): โครงข่าย 7 หน่วยฐานหลัก ได้แก่ เมตร ($\text{m}$), กิโลกรัม ($\text{kg}$), วินาที ($\text{s}$), แอมแปร์ ($\text{A}$), เคลวิน ($\text{K}$), โมล ($\text{mol}$) และแคนเดลา ($\text{cd}$) ถ่ายทอดผ่านมิติแสงเงา 3 มิติสมจริง พร้อมไอคอนเครื่องมือวัดวิทยาศาสตร์และคำอธิบาย 3 ภาษา (ไทย, อังกฤษ, จีน)
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

                            <!-- 3D Evolution Timeline: 1 Metre (Replacing flat 2D diagram) -->
                            <div class="rounded-2xl border border-cyan-500/40 bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950/40 p-4 sm:p-5 shadow-2xl mt-4">
                                <div class="flex items-center justify-between mb-4 pb-2.5 border-b border-cyan-500/20">
                                    <span class="text-xs sm:text-sm font-bold text-cyan-300 flex items-center gap-2">
                                        <i class="fa-solid fa-timeline text-cyan-400"></i> วิวัฒนาการ 3 มิตินิยาม 1 เมตร (3D Metre Evolution Timeline)
                                    </span>
                                    <span class="text-[11px] font-mono text-cyan-400 bg-cyan-950/80 px-2.5 py-0.5 rounded-full border border-cyan-500/30">1791 → ปัจจุบัน</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-xs">
                                    <!-- Step 1: 1791 -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-cyan-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-cyan-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-cyan-500/20 text-cyan-300 font-mono font-bold text-[11px]">ค.ศ. 1791</span>
                                                <i class="fa-solid fa-earth-americas text-cyan-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">เส้นเมอริเดียนโลก</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                หนึ่งในสิบล้าน ($\frac{1}{10^7}$) ของระยะทางจากขั้วโลกเหนือถึงเส้นศูนย์สูตรผ่านปารีส
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            ความไม่แน่นอน: $\approx 10^{-4}$
                                        </div>
                                    </div>

                                    <!-- Step 2: 1889 -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-cyan-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-amber-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 font-mono font-bold text-[11px]">ค.ศ. 1889</span>
                                                <i class="fa-solid fa-ruler-horizontal text-amber-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">แท่งเมตร Tresca</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                ระยะระหว่าง 2 รอยขีดบนแท่งโลหะผสม $\text{Pt-Ir}$ 90:10 หน้าตัดกากบาท Tresca ณ BIPM
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            ความไม่แน่นอน: $\approx 10^{-7}$
                                        </div>
                                    </div>

                                    <!-- Step 3: 1960 -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-cyan-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-sky-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-sky-500/20 text-sky-300 font-mono font-bold text-[11px]">ค.ศ. 1960</span>
                                                <i class="fa-solid fa-atom text-sky-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">คลื่นแสง $^{86}\text{Kr}$</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                $1{,}650{,}763.73$ เท่าของความยาวคลื่นแสงส้ม-แดงที่แผ่จากอะตอมคริปทอน-86
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            ความไม่แน่นอน: $\approx 10^{-9}$
                                        </div>
                                    </div>

                                    <!-- Step 4: 1983-Present -->
                                    <div class="p-3.5 rounded-xl bg-gradient-to-br from-emerald-950/60 to-slate-900 border border-emerald-500/40 shadow-lg relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-emerald-500/10 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 font-mono font-bold text-[11px]">1983–ปัจจุบัน</span>
                                                <i class="fa-solid fa-bolt-lightning text-emerald-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">ความเร็วแสง $c$</div>
                                            <p class="text-slate-200 text-[11px] leading-relaxed">
                                                ระยะทางที่แสงเคลื่อนที่ในสุญญากาศ ในเวลา $\frac{1}{299{,}792{,}458}\text{ s}$
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-emerald-500/20 text-[10px] font-mono text-emerald-300 font-bold">
                                            ความไม่แน่นอน: $\Delta c = 0$ (แม่นตรงสัมบูรณ์)
                                        </div>
                                    </div>
                                </div>
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
                            <!-- 3D Evolution Timeline: 1 Kilogram (Replacing flat 2D diagram) -->
                            <div class="rounded-2xl border border-amber-500/40 bg-gradient-to-br from-slate-950 via-slate-900 to-amber-950/40 p-4 sm:p-5 shadow-2xl mt-4">
                                <div class="flex items-center justify-between mb-4 pb-2.5 border-b border-amber-500/20">
                                    <span class="text-xs sm:text-sm font-bold text-amber-300 flex items-center gap-2">
                                        <i class="fa-solid fa-timeline text-amber-400"></i> วิวัฒนาการ 3 มิตินิยาม 1 กิโลกรัม (3D Kilogram Evolution Timeline)
                                    </span>
                                    <span class="text-[11px] font-mono text-amber-400 bg-amber-950/80 px-2.5 py-0.5 rounded-full border border-amber-500/30">1795 → 2019</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                                    <!-- Epoch 1: 1795 -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-amber-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-amber-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 font-mono font-bold text-[11px]">ค.ศ. 1795</span>
                                                <i class="fa-solid fa-droplet text-blue-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">น้ำบริสุทธิ์ 1 ลิตร</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                มวลของน้ำกลั่นบริสุทธิ์ปริมาตร $1\text{ dm}^3$ ที่อุณหภูมิน้ำหนาแน่นสูงสุด ($4^\circ\text{C}$)
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            ขึ้นกับความดันและไอโซโทปน้ำ
                                        </div>
                                    </div>

                                    <!-- Epoch 2: 1889-2019 -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-amber-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-amber-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-amber-500/20 text-amber-300 font-mono font-bold text-[11px]">ค.ศ. 1889–2019</span>
                                                <i class="fa-solid fa-weight-hanging text-amber-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">ก้อนมวล Le Grand K</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                ทรงกระบอกโลหะผสม $\text{Pt-Ir}$ ต้นแบบนานาชาติ เก็บในครอบแก้วสุญญากาศ 3 ชั้น ณ BIPM
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-amber-400/80">
                                            มวลคลาดเคลื่อน $\approx 50\,\mu\text{g}$ ใน 100 ปี
                                        </div>
                                    </div>

                                    <!-- Epoch 3: 2019-Present -->
                                    <div class="p-3.5 rounded-xl bg-gradient-to-br from-emerald-950/60 to-slate-900 border border-emerald-500/40 shadow-lg relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-emerald-500/10 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 font-mono font-bold text-[11px]">2019–ปัจจุบัน</span>
                                                <i class="fa-solid fa-scale-balanced text-emerald-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">เครื่องชั่งคิบบิล ($h$)</div>
                                            <p class="text-slate-200 text-[11px] leading-relaxed">
                                                ตรึงค่าคงตัวพลังค์ $h = 6.626\,070\,15 \times 10^{-34}\text{ J}\cdot\text{s}$ ผ่านสมดุลแรงแม่เหล็กไฟฟ้าควอนตัม
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-emerald-500/20 text-[10px] font-mono text-emerald-300 font-bold">
                                            ความไม่แน่นอน: $\Delta h = 0$ (แม่นตรงสัมบูรณ์)
                                        </div>
                                    </div>
                                </div>
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
                            <!-- 3D Timeline & Cesium Fountain Clock Dual Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                                <div class="rounded-2xl overflow-hidden border border-sky-500/30 shadow-xl bg-slate-950 flex flex-col justify-between">
                                    <img src="../images/sec_3d/ch01_def_second_3d.jpg" alt="ไทม์ไลน์ 3 มิติ วิวัฒนาการนิยาม 1 วินาที" class="w-full h-auto object-cover" loading="lazy">
                                    <div class="p-2.5 bg-slate-950/90 text-[11px] text-slate-400 text-center border-t border-slate-800 font-mono">
                                        <strong>ไทม์ไลน์ 3 มิติ:</strong> วิวัฒนาการนิยาม 1 วินาที จากการหมุนของโลก (วันสุริยคติเฉลี่ย) สู่วงโคจรโลก (ปีทรอปิก) สู่นาฬิกาอะตอมซีเซียม
                                    </div>
                                </div>
                                <div class="rounded-2xl overflow-hidden border border-sky-500/30 shadow-xl bg-slate-950 flex flex-col justify-between">
                                    <img src="../images/sec_3d/ch01_cesium_clock_3d.jpg" alt="หอนาฬิกาอะตอมน้ำพุซีเซียม NIST-F2" class="w-full h-auto object-cover" loading="lazy">
                                    <div class="p-2.5 bg-slate-950/90 text-[11px] text-slate-400 text-center border-t border-slate-800 font-mono">
                                        <strong>นาฬิกาอะตอมน้ำพุซีเซียม (NIST-F2):</strong> ลำแสงเลเซอร์ทำให้อะตอมเย็นจัด ยิงผ่านโพรงไมโครเวฟแรมซีย์ ตรึง $\Delta\nu_{\text{Cs}} = 9{,}192{,}631{,}770\text{ Hz}$
                                    </div>
                                </div>
                            </div>

                            <!-- 3D Evolution Timeline: 1 Second (Replacing flat 2D diagram) -->
                            <div class="rounded-2xl border border-sky-500/40 bg-gradient-to-br from-slate-950 via-slate-900 to-sky-950/40 p-4 sm:p-5 shadow-2xl mt-4">
                                <div class="flex items-center justify-between mb-4 pb-2.5 border-b border-sky-500/20">
                                    <span class="text-xs sm:text-sm font-bold text-sky-300 flex items-center gap-2">
                                        <i class="fa-solid fa-timeline text-sky-400"></i> วิวัฒนาการ 3 มิตินิยาม 1 วินาที (3D Second Evolution Timeline)
                                    </span>
                                    <span class="text-[11px] font-mono text-sky-400 bg-sky-950/80 px-2.5 py-0.5 rounded-full border border-sky-500/30">ดาราศาสตร์ → อะตอมควอนตัม</span>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                                    <!-- Epoch 1: Solar Day -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-sky-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-sky-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-sky-500/20 text-sky-300 font-mono font-bold text-[11px]">ก่อน ค.ศ. 1956</span>
                                                <i class="fa-solid fa-sun text-yellow-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">วันสุริยคติเฉลี่ย</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                $\frac{1}{86{,}400}$ ของวันสุริยคติเฉลี่ยจากการหมุนรอบตัวเองของโลก ($24 \times 3{,}600\text{ s}$)
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            การหมุนของโลกช้าลง $\approx 2\text{ ms/ศตวรรษ}$
                                        </div>
                                    </div>

                                    <!-- Epoch 2: Tropical Year -->
                                    <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-sky-500/40 transition-all shadow-md relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-sky-500/5 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-sky-500/20 text-sky-300 font-mono font-bold text-[11px]">ค.ศ. 1956–1967</span>
                                                <i class="fa-solid fa-globe text-sky-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">ปีทรอปิก (Ephemeris)</div>
                                            <p class="text-slate-300 text-[11px] leading-relaxed">
                                                เสี้ยวส่วน $\frac{1}{31{,}556{,}925.9747}$ ของปีทรอปิก ค.ศ. 1900 โดยอิงวงโคจรโลกรอบดวงอาทิตย์
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-slate-800 text-[10px] font-mono text-slate-400">
                                            ความไม่แน่นอน: $\approx 10^{-9}$
                                        </div>
                                    </div>

                                    <!-- Epoch 3: Cesium-133 -->
                                    <div class="p-3.5 rounded-xl bg-gradient-to-br from-emerald-950/60 to-slate-900 border border-emerald-500/40 shadow-lg relative overflow-hidden flex flex-col justify-between">
                                        <div class="absolute top-0 right-0 w-12 h-12 bg-emerald-500/10 rounded-bl-full pointer-events-none"></div>
                                        <div>
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="px-2 py-0.5 rounded bg-emerald-500/20 text-emerald-300 font-mono font-bold text-[11px]">1967–ปัจจุบัน</span>
                                                <i class="fa-solid fa-atom text-emerald-400 text-sm"></i>
                                            </div>
                                            <div class="font-bold text-white text-xs mb-1">นาฬิกาอะตอม $^{133}\text{Cs}$</div>
                                            <p class="text-slate-200 text-[11px] leading-relaxed">
                                                $9{,}192{,}631{,}770$ คาบของการแผ่รังสีทรานซิชันไฮเปอร์ไฟน์สถานะพื้นของ $^{133}\text{Cs}$
                                            </p>
                                        </div>
                                        <div class="mt-2.5 pt-2 border-t border-emerald-500/20 text-[10px] font-mono text-emerald-300 font-bold">
                                            ความไม่แน่นอน: $1\text{ s}$ ใน 100 ล้านปี ($\Delta\nu_{\text{Cs}}$ ตรึงแน่นอน)
                                        </div>
                                    </div>
                                </div>
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
                        <div class="p-3.5 bg-gradient-to-r from-cyan-950/80 via-slate-900 to-slate-900 rounded-t-xl border border-b-0 border-cyan-500/30 flex items-center justify-between flex-wrap gap-2 shadow-lg">
                            <span class="text-xs sm:text-sm font-bold text-cyan-300 flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center text-cyan-400 shadow-sm">
                                    <i class="fa-solid fa-table-cells"></i>
                                </span>
                                ตารางที่ 1.1 สรุปคุณสมบัติ 7 หน่วยฐานเอสไอ (7 SI Base Units) นิยามอดีต-ปัจจุบัน ค่าคงตัวตรึง และการประยุกต์ใช้ในจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-cyan-300 bg-cyan-950/90 border border-cyan-500/40 px-2.5 py-0.5 rounded-full shadow-inner">BIPM SI 2019 Standard</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-cyan-500/30 bg-slate-950/95 shadow-2xl">
                            <table class="tex-table w-full text-xs sm:text-[13px] leading-relaxed">
                                <thead>
                                    <tr class="bg-slate-900/90 text-slate-100 border-b border-slate-700/80">
                                        <th class="p-3.5 text-left font-semibold min-w-[190px]">ปริมาณฐาน (Quantity)</th>
                                        <th class="p-3.5 text-center font-semibold min-w-[70px]">สัญลักษณ์</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[130px]">ชื่อหน่วยฐาน (Unit)</th>
                                        <th class="p-3.5 text-center font-semibold min-w-[80px]">สัญลักษณ์หน่วย</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[220px]">ค่าคงตัวฟิสิกส์ที่ใช้ตรึงนิยาม</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[280px]">ตัวอย่างการใช้งานจริงในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/80 text-slate-300">
                                    <!-- 1. Length (Cyan theme) -->
                                    <tr class="border-l-4 border-cyan-400 bg-cyan-950/20 hover:bg-cyan-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-cyan-400/30 to-blue-600/40 border border-cyan-400/50 text-cyan-300 shadow-md shadow-cyan-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-ruler-combined"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">ความยาว</div>
                                                    <div class="text-[11px] text-cyan-300/80 font-mono">Length ($l, x, r$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-cyan-200">$l, x, r$</td>
                                        <td class="p-3.5 text-cyan-300 font-semibold">เมตร (metre)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-300 bg-cyan-950/60 border border-cyan-500/30 rounded-lg py-1 px-2.5">$\text{m}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$c = 299\,792\,458\text{ m/s}$<br><span class="text-slate-400 font-sans text-[11px]">(อัตราเร็วแสงในสุญญากาศ)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-cyan-500/20 text-cyan-300 border border-cyan-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-virus text-cyan-400"></i> ไวรัส T4 ($100\text{ nm}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-teal-500/20 text-teal-300 border border-teal-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-bacterium text-teal-400"></i> แบคทีเรีย <em>E. coli</em> ($2\text{ }\mu\text{m}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-circle-dot text-emerald-400"></i> โคโลนีวุ้น ($2\text{ mm}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                วัดขนาดเส้นผ่านศูนย์กลาง<span class="whitespace-nowrap font-medium text-white">เซลล์แบคทีเรีย</span>, อนุภาคไวรัส, และความหนาเยื่อหุ้มเซลล์
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 2. Mass (Amber theme) -->
                                    <tr class="border-l-4 border-amber-400 bg-amber-950/20 hover:bg-amber-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-400/30 to-yellow-600/40 border border-amber-400/50 text-amber-300 shadow-md shadow-amber-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-weight-hanging"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">มวล</div>
                                                    <div class="text-[11px] text-amber-300/80 font-mono">Mass ($m$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-amber-200">$m$</td>
                                        <td class="p-3.5 text-amber-300 font-semibold">กิโลกรัม (kilogram)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-300 bg-amber-950/60 border border-amber-500/30 rounded-lg py-1 px-2.5">$\text{kg}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$h = 6.626\,070\,15 \times 10^{-34}\text{ J}\cdot\text{s}$<br><span class="text-slate-400 font-sans text-[11px]">(ค่าคงตัวพลังค์ via Kibble)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-500/20 text-amber-300 border border-amber-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-scale-balanced text-amber-400"></i> ผงอาหารวุ้น ($10\text{--}50\text{ g}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-yellow-500/20 text-yellow-300 border border-yellow-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-eye-dropper text-yellow-400"></i> สอบเทียบปิเปต ($1\,\text{mL} = 1\text{ g}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-orange-500/20 text-orange-300 border border-orange-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-bacterium text-orange-400"></i> เซลล์แบคทีเรีย ($\approx 1\text{ pg}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                ชั่งสารเคมี<span class="whitespace-nowrap font-medium text-white">ผงอาหารเลี้ยงเชื้อ</span> และสอบเทียบความเที่ยงของไมโครปิเปตผ่านน้ำกลั่นบริสุทธิ์
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 3. Time (Sky Blue theme) -->
                                    <tr class="border-l-4 border-sky-400 bg-sky-950/20 hover:bg-sky-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-400/30 to-indigo-600/40 border border-sky-400/50 text-sky-300 shadow-md shadow-sky-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-stopwatch"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">เวลา</div>
                                                    <div class="text-[11px] text-sky-300/80 font-mono">Time ($t$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-sky-200">$t$</td>
                                        <td class="p-3.5 text-sky-300 font-semibold">วินาที (second)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-sky-300 bg-sky-950/60 border border-sky-500/30 rounded-lg py-1 px-2.5">$\text{s}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$\Delta\nu_{\text{Cs}} = 9\,192\,631\,770\text{ s}^{-1}$<br><span class="text-slate-400 font-sans text-[11px]">(ไฮเปอร์ไฟน์อะตอม $^{133}\text{Cs}$)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-sky-500/20 text-sky-300 border border-sky-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-hourglass-half text-sky-400"></i> Doubling ($20\text{ min}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-500/20 text-blue-300 border border-blue-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-temperature-arrow-up text-red-400"></i> Autoclave ($15\text{--}20\text{ min}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-indigo-500/20 text-indigo-300 border border-indigo-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-rotate text-indigo-400"></i> Centrifuge ($5\text{--}10\text{ min}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                ระยะเวลาการแบ่งเซลล์ (<span class="whitespace-nowrap font-medium text-white">Doubling time</span>), รอบเวลานึ่งฆ่าเชื้อ Autoclave, และเวลาปั่นตกตะกอน
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 4. Electric current (Rose theme) -->
                                    <tr class="border-l-4 border-rose-400 bg-rose-950/20 hover:bg-rose-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-rose-400/30 to-pink-600/40 border border-rose-400/50 text-rose-300 shadow-md shadow-rose-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-bolt-lightning"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">กระแสไฟฟ้า</div>
                                                    <div class="text-[11px] text-rose-300/80 font-mono">Electric current ($I$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-rose-200">$I, i$</td>
                                        <td class="p-3.5 text-rose-300 font-semibold">แอมแปร์ (ampere)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-rose-300 bg-rose-950/60 border border-rose-500/30 rounded-lg py-1 px-2.5">$\text{A}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$e = 1.602\,176\,634 \times 10^{-19}\text{ C}$<br><span class="text-slate-400 font-sans text-[11px]">(ประจุอิเล็กตรอนมูลฐาน)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-rose-500/20 text-rose-300 border border-rose-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-dna text-purple-400"></i> Agarose gel ($80\text{--}100\text{ mA}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-pink-500/20 text-pink-300 border border-pink-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-wave-square text-rose-400"></i> Patch-clamp ($10\text{--}100\text{ pA}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                กระแสขับเคลื่อนแยก DNA ใน<span class="whitespace-nowrap font-medium text-white">เจลอิเล็กโทรโฟเรซิส</span> และตรวจวัดศักย์ไอออนเยื่อหุ้มเซลล์
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 5. Thermodynamic temperature (Orange theme) -->
                                    <tr class="border-l-4 border-orange-400 bg-orange-950/20 hover:bg-orange-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-orange-400/30 to-red-600/40 border border-orange-400/50 text-orange-300 shadow-md shadow-orange-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-temperature-high"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">อุณหพลวัต</div>
                                                    <div class="text-[11px] text-orange-300/80 font-mono">Temperature ($T$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-orange-200">$T$</td>
                                        <td class="p-3.5 text-orange-300 font-semibold">เคลวิน (kelvin)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-orange-300 bg-orange-950/60 border border-orange-500/30 rounded-lg py-1 px-2.5">$\text{K}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$k = 1.380\,649 \times 10^{-23}\text{ J/K}$<br><span class="text-slate-400 font-sans text-[11px]">(ค่าคงตัวบ็อลทซ์มัน)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-orange-500/20 text-orange-300 border border-orange-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-temperature-arrow-up text-orange-400"></i> ตู้บ่มเชื้อ ($37^\circ\text{C} = 310.15\text{ K}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-red-500/20 text-red-300 border border-red-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-fire text-red-400"></i> Autoclave ($121^\circ\text{C}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-amber-500/20 text-amber-300 border border-amber-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-circle-nodes text-yellow-400"></i> PCR ($95^\circ\text{C}, 55^\circ\text{C}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                ควบคุม<span class="whitespace-nowrap font-medium text-white">ตู้บ่มเพาะเชื้อ</span> ($37^\circ\text{C}$), หม้อนึ่งฆ่าเชื้อ ($121^\circ\text{C}$), และรอบอุณหภูมิ PCR thermal cycler
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 6. Amount of substance (Purple theme) -->
                                    <tr class="border-l-4 border-purple-400 bg-purple-950/20 hover:bg-purple-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-400/30 to-fuchsia-600/40 border border-purple-400/50 text-purple-300 shadow-md shadow-purple-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-cubes-stacked"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">ปริมาณของสาร</div>
                                                    <div class="text-[11px] text-purple-300/80 font-mono">Substance ($n$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-purple-200">$n$</td>
                                        <td class="p-3.5 text-purple-300 font-semibold">โมล (mole)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-purple-300 bg-purple-950/60 border border-purple-500/30 rounded-lg py-1 px-2.5">$\text{mol}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$N_{\text{A}} = 6.022\,140\,76 \times 10^{23}\text{ mol}^{-1}$<br><span class="text-slate-400 font-sans text-[11px]">(ค่าคงตัวอาโวกาโดร)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-purple-500/20 text-purple-300 border border-purple-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-flask-vial text-purple-400"></i> บัฟเฟอร์ Tris-EDTA ($10\text{ mM}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-fuchsia-500/20 text-fuchsia-300 border border-fuchsia-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-calculator text-blue-400"></i> พลาสมิด ($10^9\text{ copies}$)</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                ความเข้มข้น<span class="whitespace-nowrap font-medium text-white">สารละลายบัฟเฟอร์</span> ($\text{mol/L}$ หรือ $\text{M}$) และคำนวณจำนวนโมเลกุลในปฏิกิริยา PCR
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- 7. Luminous intensity (Yellow theme) -->
                                    <tr class="border-l-4 border-yellow-400 bg-yellow-950/20 hover:bg-yellow-950/35 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-yellow-400/30 to-amber-600/40 border border-yellow-400/50 text-yellow-300 shadow-md shadow-yellow-500/20 flex items-center justify-center flex-shrink-0 text-sm">
                                                    <i class="fa-solid fa-lightbulb"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white text-sm">ความเข้มส่องสว่าง</div>
                                                    <div class="text-[11px] text-yellow-300/80 font-mono">Luminous ($I_v$)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-center font-mono text-yellow-200">$I_v$</td>
                                        <td class="p-3.5 text-yellow-300 font-semibold">แคนเดลา (candela)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-yellow-300 bg-yellow-950/60 border border-yellow-500/30 rounded-lg py-1 px-2.5">$\text{cd}$</td>
                                        <td class="p-3.5 font-mono text-[11px] text-emerald-400">$K_{\text{cd}} = 683\text{ lm/W}$ ที่ความถี่ $540\text{ THz}$<br><span class="text-slate-400 font-sans text-[11px]">($\lambda \approx 555\text{ nm}$ แสงเขียว)</span></td>
                                        <td class="p-3.5 text-slate-200">
                                            <div class="flex flex-wrap gap-1.5 mb-2">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-yellow-500/20 text-yellow-300 border border-yellow-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-sun text-yellow-400"></i> Photobioreactor ($3{,}000\text{ lx}$)</span>
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 font-mono text-[11px] shadow-sm"><i class="fa-solid fa-wand-magic-sparkles text-emerald-400"></i> Bioluminescence</span>
                                            </div>
                                            <div class="text-xs text-slate-300 leading-relaxed">
                                                เพาะเลี้ยง<span class="whitespace-nowrap font-medium text-white">สาหร่ายเซลล์เดียว</span>ใน Bioreactor และตรวจวัดการเรืองแสงชีวภาพ (Bioluminescence)
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                                        <!-- Figure 1.4: SI Base to Derived Units Flowchart & Interactive Metrology Explorer -->
                    <figure class="tex-figure tex-figure-diagram my-10" id="fig-si-derived-microbio">
                        <!-- Card Header & Navigation Bar -->
                        <div class="rounded-t-2xl border border-b-0 border-emerald-500/40 bg-gradient-to-r from-slate-900 via-emerald-950/40 to-slate-900 p-4 sm:p-5 shadow-2xl backdrop-blur-xl">
                            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap mb-1">
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 uppercase tracking-wider">
                                            <i class="fa-solid fa-network-wired mr-1"></i> Coherent SI Metrology
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/40">
                                            NIST SP 1247 Aligned
                                        </span>
                                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-mono font-bold bg-purple-500/20 text-purple-300 border border-purple-500/40">
                                            🧬 22 หน่วยประยุกต์จุลทรรศน์
                                        </span>
                                    </div>
                                    <h3 class="text-lg sm:text-xl font-black text-white tracking-wide flex items-center gap-2">
                                        <strong class="text-emerald-400">ภาพที่ 1.4</strong> แผนผังเครือข่ายหน่วยฐานสู่ 22 หน่วยอนุพัทธ์ในงานจุลชีววิทยาเชิงโต้ตอบ
                                    </h3>
                                    <p class="text-xs text-slate-400 mt-0.5">
                                        Interactive Coherent SI Derived Units Explorer: คลิกเลือกหน่วยเพื่อสืบค้นสายสัมพันธ์การคูณ-หาร ตัวอย่างแล็บจุลชีววิทยา และทดลองคำนวณสด
                                    </p>
                                </div>

                                <!-- Dual View Mode Switcher -->
                                <div class="flex items-center gap-2 bg-slate-950/80 p-1.5 rounded-xl border border-slate-800 self-start lg:self-auto">
                                    <button type="button" id="btn-mode-interactive" onclick="switchSiViewMode('interactive')" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 bg-emerald-500 text-slate-950 shadow-md shadow-emerald-500/30">
                                        <i class="fa-solid fa-gamepad"></i>
                                        <span>โหมดโต้ตอบ & ตัวคำนวณสด</span>
                                    </button>
                                    <button type="button" id="btn-mode-vector" onclick="switchSiViewMode('vector')" class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800/80">
                                        <i class="fa-solid fa-diagram-project"></i>
                                        <span>แผนผังเวกเตอร์แม่บท (HD)</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Interactive Filter Toolbar (Shown in Interactive Mode) -->
                            <div id="si-interactive-toolbar" class="mt-4 pt-3 border-t border-slate-800/80 flex flex-col md:flex-row md:items-center justify-between gap-3">
                                <!-- Domain Filter Pills -->
                                <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-xs no-scrollbar">
                                    <span class="text-slate-400 font-bold whitespace-nowrap mr-1 flex items-center gap-1">
                                        <i class="fa-solid fa-filter text-emerald-400"></i> กรองตามงาน:
                                    </span>
                                    <button type="button" onclick="filterSiDomain('all', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-emerald-500/20 text-emerald-300 border border-emerald-500/50">
                                        ทั้งหมด (29)
                                    </button>
                                    <button type="button" onclick="filterSiDomain('autoclave', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200">
                                        🧫 นึ่งฆ่าเชื้อ & ปลอดเชื้อ
                                    </button>
                                    <button type="button" onclick="filterSiDomain('enzyme', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200">
                                        🧪 เอนไซม์ & ชีวเคมี
                                    </button>
                                    <button type="button" onclick="filterSiDomain('electro', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200">
                                        ⚡ เจลไฟฟ้า & เยื่อเซลล์
                                    </button>
                                    <button type="button" onclick="filterSiDomain('optics', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200">
                                        🔍 กล้อง & แสง
                                    </button>
                                    <button type="button" onclick="filterSiDomain('physics', this)" class="si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200">
                                        🌀 ปั่นเหวี่ยง & กลศาสตร์
                                    </button>
                                </div>

                                <!-- Live Search Input -->
                                <div class="relative min-w-[220px]">
                                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-xs text-slate-400"></i>
                                    <input type="text" id="si-search-input" onkeyup="searchSiUnits(this.value)" placeholder="ค้นหาหน่วย / เอนไซม์ / autoclave..." class="w-full pl-8 pr-3 py-1.5 bg-slate-950 border border-slate-700/80 rounded-xl text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-emerald-500 transition">
                                </div>
                            </div>
                        </div>

                        <!-- Card Body: VIEW 1 - INTERACTIVE METROLOGY DASHBOARD -->
                        <div id="si-view-interactive" class="border border-emerald-500/40 bg-slate-950 p-4 sm:p-6 shadow-2xl space-y-6">
                            <!-- Tier A: 7 Base Units Bar -->
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-bold text-slate-300 uppercase tracking-wider flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                                        7 หน่วยฐานสากล (7 SI Base Units) — แหล่งกำเนิดมิติทางกายภาพ
                                    </span>
                                    <span class="text-[11px] font-mono text-slate-500">คลิกที่การ์ดเพื่อสืบค้นการแตกแขนง</span>
                                </div>
                                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-2.5" id="base-units-grid">
                                    <!-- Rendered dynamically -->
                                </div>
                            </div>

                            <!-- Tier B: 22 Derived Units Grid -->
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-xs font-bold text-slate-300 uppercase tracking-wider flex items-center gap-1.5">
                                        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                        22 หน่วยอนุพัทธ์ที่มีชื่อเฉพาะ (22 Coherent SI Derived Units in Microbiology)
                                    </span>
                                    <span class="text-[11px] font-mono text-slate-500" id="si-derived-count">แสดง 22 จาก 22 หน่วย</span>
                                </div>
                                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2.5" id="derived-units-grid">
                                    <!-- Rendered dynamically -->
                                </div>
                            </div>

                            <!-- Tier C: Interactive Microbiology Inspector & Live Calculator Drawer -->
                            <div id="si-inspector-card" class="rounded-2xl border border-emerald-500/40 bg-gradient-to-b from-slate-900 to-slate-950 p-4 sm:p-6 shadow-2xl transition-all">
                                <!-- Inspector Content injected via JS -->
                            </div>
                        </div>

                        <!-- Card Body: VIEW 2 - HIGH-RES VECTOR NIST SP 1247 DIAGRAM -->
                        <div id="si-view-vector" class="hidden border border-emerald-500/40 bg-slate-950 p-3 sm:p-5 shadow-2xl">
                            <div class="flex items-center justify-between mb-3 px-2 text-xs text-slate-400">
                                <span><i class="fa-solid fa-file-image text-emerald-400 mr-1"></i> เวกเตอร์ต้นฉบับความคมชัดสูง ปราศจากข้อความตัดทอน (NIST SP 1247 High-Res Vector)</span>
                                <a href="../images/maintex/tikz/ch01_si_derived_microbio.svg" target="_blank" class="px-2.5 py-1 rounded-lg bg-slate-800 hover:bg-slate-700 text-cyan-300 transition flex items-center gap-1">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i> เปิดดูรูปภาพเต็มจอ
                                </a>
                            </div>
                            <div class="rounded-xl overflow-hidden border border-slate-800 bg-[#060a12] p-2">
                                <img src="../images/maintex/tikz/ch01_si_derived_microbio.svg" alt="แผนผังเครือข่าย 7 หน่วยฐานสากล สู่หน่วยอนุพันธ์ในงานจุลชีววิทยา (NIST SP 1247 Adaptation)" class="w-full h-auto" loading="lazy">
                            </div>
                        </div>

                        <!-- Card Footer Caption -->
                        <div class="rounded-b-2xl border border-t-0 border-emerald-500/40 bg-slate-900/95 p-3.5 sm:p-4 text-xs text-slate-400 text-center shadow-xl">
                            <figcaption>
                                <strong class="text-emerald-400">ภาพที่ 1.4</strong>&ensp;แผนผังเครือข่ายความเชื่อมโยงจาก 7 หน่วยฐานสากลเอสไอ สู่ 22 หน่วยอนุพัทธ์สำคัญในงานจุลชีววิทยาเชิงโต้ตอบ (Interactive SI Base to Derived Units Hierarchy in Microbiology): พัฒนาตามแนวทางมาตรฐาน NIST SP 1247 โดยถอดรหัสสายสัมพันธ์การคูณ (เส้นทึบ) และการหาร (เส้นประ) พร้อมเชื่อมโยงตัวอย่างจริงในห้องปฏิบัติการจุลชีววิทยา เช่น อัตราเร่งเอนไซม์ ($	ext{kat}$), ความดันหม้อนึ่งไอและออสโมซิส ($	ext{Pa}$), พลังงาน ATP ($	ext{J}$), เจลอิเล็กโทรโฟรีซิส ($	ext{V, }\Omega$), และการฉายรังสีแกมมาฆ่าเชื้อ ($	ext{Gy, Sv}$)
                            </figcaption>
                        </div>
                    </figure>

                    <!-- TABLE 1.2: SI DERIVED UNITS -->
                    <div class="tex-tablefig mt-10 scroll-mt-20" id="tab-1.2">
                        <div class="p-3.5 bg-gradient-to-r from-emerald-950/80 via-slate-900 to-slate-900 rounded-t-xl border border-b-0 border-emerald-500/30 flex items-center justify-between flex-wrap gap-2 shadow-lg">
                            <span class="text-xs sm:text-sm font-bold text-emerald-300 flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-400 shadow-sm">
                                    <i class="fa-solid fa-calculator"></i>
                                </span>
                                ตารางที่ 1.2 หน่วยอนุพันธ์เอสไอ (SI Derived Units) ที่สำคัญทางฟิสิกส์และการประยุกต์ใช้ในห้องปฏิบัติการจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-emerald-300 bg-emerald-950/90 border border-emerald-500/40 px-2.5 py-0.5 rounded-full shadow-inner">Derived Quantities</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-emerald-500/30 bg-slate-950/95 shadow-2xl">
                            <table class="tex-table w-full text-xs sm:text-[13px] leading-relaxed">
                                <thead>
                                    <tr class="bg-slate-900/90 text-slate-100 border-b border-slate-700/80">
                                        <th class="p-3.5 text-left font-semibold min-w-[190px]">ปริมาณอนุพันธ์ (Derived Quantity)</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[130px]">ชื่อหน่วย</th>
                                        <th class="p-3.5 text-center font-semibold min-w-[80px]">สัญลักษณ์</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[140px]">ความสัมพันธ์หน่วยอื่น</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[140px]">หน่วยฐาน SI</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[280px]">การประยุกต์ใช้ในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/80 text-slate-300">
                                    <tr class="hover:bg-cyan-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-cyan-500/20 border border-cyan-400/40 text-cyan-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-wave-square"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความถี่</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Frequency</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-cyan-300 font-semibold">เฮิรตซ์ (hertz)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{Hz}$</td>
                                        <td class="p-3.5 font-mono">$1/\text{s}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{s}^{-1}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-bullhorn text-cyan-400 mr-1.5"></i>คลื่นสั่นอัลตราโซนิก (<span class="whitespace-nowrap font-medium text-white">Ultrasonic sonication</span>) สลายผนังเซลล์, ความถี่แสงส่องเซลล์
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-blue-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-blue-500/20 border border-blue-400/40 text-blue-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-arrows-up-down-left-right"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">แรง</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Force</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-blue-300 font-semibold">นิวตัน (newton)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{N}$</td>
                                        <td class="p-3.5 font-mono">$\text{kg}\cdot\text{m/s}^2$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-bacterium text-blue-400 mr-1.5"></i>แรงกลของแฟลกเจลลาขับเคลื่อนแบคทีเรีย ($\text{pN}$), <span class="whitespace-nowrap font-medium text-white">แรงหนีศูนย์กลาง</span>ในการปั่นตกตะกอน
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-teal-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-teal-500/20 border border-teal-400/40 text-teal-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-gauge-high"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความดันและความเค้น</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Pressure / Stress</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-teal-300 font-semibold">พาสคาล (pascal)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{Pa}$</td>
                                        <td class="p-3.5 font-mono">$\text{N/m}^2$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^{-1}\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-temperature-arrow-up text-teal-400 mr-1.5"></i>ความดันไอน้ำใน<span class="whitespace-nowrap font-medium text-white">หม้อนึ่งฆ่าเชื้อ Autoclave</span> ($103\text{ kPa} \approx 15\text{ psi}$), <span class="whitespace-nowrap font-medium text-white">ความดันออสโมซิส</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-sky-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-sky-500/20 border border-sky-400/40 text-sky-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-droplet"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความหนืดพลวัต</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Dynamic Viscosity</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-sky-300 font-semibold">พาสคาล-วินาที</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{Pa}\cdot\text{s}$</td>
                                        <td class="p-3.5 font-mono">$\text{N}\cdot\text{s/m}^2$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^{-1}\cdot\text{kg}\cdot\text{s}^{-1}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-water text-sky-400 mr-1.5"></i>ความหนืดของน้ำและ<span class="whitespace-nowrap font-medium text-white">อาหารเลี้ยงเชื้อจุลินทรีย์</span> ($\eta_{\text{water}} \approx 10^{-3}\text{ Pa}\cdot\text{s} = 1\text{ cP}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-amber-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-amber-500/20 border border-amber-400/40 text-amber-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-fire-flame-curved"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">พลังงาน งาน ความร้อน</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Energy / Work</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-amber-300 font-semibold">จูล (joule)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{J}$</td>
                                        <td class="p-3.5 font-mono">$\text{N}\cdot\text{m}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-2}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-atom text-amber-400 mr-1.5"></i>พลังงานสลาย<span class="whitespace-nowrap font-medium text-white">พันธะไฮโดรเจนใน DNA</span>, การปลดปล่อยพลังงานของ ATP ($30.5\text{ kJ/mol}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-yellow-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-yellow-500/20 border border-yellow-400/40 text-yellow-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-bolt"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">กำลังไฟฟ้า</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Power</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-yellow-300 font-semibold">วัตต์ (watt)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{W}$</td>
                                        <td class="p-3.5 font-mono">$\text{J/s}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-plug text-yellow-400 mr-1.5"></i>กำลังไฟฟ้าของ<span class="whitespace-nowrap font-medium text-white">หม้อนึ่งฆ่าเชื้อ</span>, <span class="whitespace-nowrap font-medium text-white">เครื่องปั่นเหวี่ยง</span>, และหลอดไฟตู้บ่มเชื้อ
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-rose-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-rose-500/20 border border-rose-400/40 text-rose-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-atom"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ประจุไฟฟ้า</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Electric charge</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-rose-300 font-semibold">คูลอมบ์ (coulomb)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{C}$</td>
                                        <td class="p-3.5 font-mono">$\text{A}\cdot\text{s}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{s}\cdot\text{A}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-dna text-rose-400 mr-1.5"></i>ประจุลบสุทธิบนสาย <span class="whitespace-nowrap font-medium text-white">Phosphodiester</span> ของ DNA และประจุโปรตีน
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-red-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-red-500/20 border border-red-400/40 text-red-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-car-battery"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความต่างศักย์ไฟฟ้า</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Voltage / Potential</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-red-300 font-semibold">โวลต์ (volt)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{V}$</td>
                                        <td class="p-3.5 font-mono">$\text{W/A}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}\cdot\text{A}^{-1}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-bolt-lightning text-red-400 mr-1.5"></i>แรงดันไฟฟ้าสำหรับแยกแถบ DNA ($100\text{ V}$), <span class="whitespace-nowrap font-medium text-white">ศักย์ไฟฟ้าเยื่อหุ้มเซลล์</span> ($-70\text{ mV}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-indigo-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-indigo-500/20 border border-indigo-400/40 text-indigo-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-microchip"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความต้านทานไฟฟ้า</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Resistance</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-indigo-300 font-semibold">โอห์ม (ohm)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\Omega$</td>
                                        <td class="p-3.5 font-mono">$\text{V/A}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^2\cdot\text{kg}\cdot\text{s}^{-3}\cdot\text{A}^{-2}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-shield text-indigo-400 mr-1.5"></i>ความต้านทานของเยื่อหุ้มเซลล์ (<span class="whitespace-nowrap font-medium text-white">TEER assay</span>), ความต้านทานสารละลาย
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-violet-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-violet-500/20 border border-violet-400/40 text-violet-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-water"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">สภาพนำไฟฟ้า</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Conductance</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-violet-300 font-semibold">ซีเมนส์ (siemens)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{S}$</td>
                                        <td class="p-3.5 font-mono">$\Omega^{-1}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^{-2}\cdot\text{kg}^{-1}\cdot\text{s}^3\cdot\text{A}^2$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-filter text-violet-400 mr-1.5"></i>ตรวจสอบความบริสุทธิ์ของ<span class="whitespace-nowrap font-medium text-white">น้ำกลั่น DI</span> และระดับไอออนในอาหารเลี้ยงเชื้อ (EC Meter)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-purple-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-purple-500/20 border border-purple-400/40 text-purple-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-dna"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">การเร่งปฏิกิริยา</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Catalytic activity</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-purple-300 font-semibold">คาทาล (katal)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{kat}$</td>
                                        <td class="p-3.5 font-mono">$\text{mol/s}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{mol}\cdot\text{s}^{-1}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-vial-circle-check text-purple-400 mr-1.5"></i>วัดอัตราการเร่งปฏิกิริยาของเอนไซม์จากจุลินทรีย์ (เช่น $\beta$-galactosidase, Taq Polymerase)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-orange-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-orange-500/20 border border-orange-400/40 text-orange-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-sun"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ฟลักซ์ส่องสว่าง & สว่าง</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Luminous Flux / Illum.</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-orange-300 font-semibold">ลูเมน / ลักซ์</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{lm / lx}$</td>
                                        <td class="p-3.5 font-mono">$\text{cd}\cdot\text{sr} \text{ / } \text{lm/m}^2$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^{-2}\cdot\text{cd}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-lightbulb text-orange-400 mr-1.5"></i>ความเข้มแสงบนโต๊ะเขี่ยเชื้อปลอดเชื้อ (<span class="whitespace-nowrap font-medium text-white">Laminar Clean Bench</span>) และตู้บ่มเพาะสาหร่าย
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-pink-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-pink-500/20 border border-pink-400/40 text-pink-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-radiation"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ปริมาณรังสีดูดกลืน</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Absorbed dose</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-pink-300 font-semibold">เกรย์ (gray)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-cyan-400 bg-cyan-950/40 rounded-lg py-1 px-2">$\text{Gy}$</td>
                                        <td class="p-3.5 font-mono">$\text{J/kg}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$\text{m}^2\cdot\text{s}^{-2}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-shield-virus text-pink-400 mr-1.5"></i>การฉายรังสีแกมมาเพื่อทำหมัน<span class="whitespace-nowrap font-medium text-white">จานเพาะเชื้อพลาสติก</span>และฆ่าเชื้อในอาหาร (<span class="whitespace-nowrap">Food Irradiation</span>)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TABLE 1.3: SUPPLEMENTARY & NON-SI UNITS -->
                    <div class="tex-tablefig mt-10 scroll-mt-20" id="tab-1.3">
                        <div class="p-3.5 bg-gradient-to-r from-amber-950/80 via-slate-900 to-slate-900 rounded-t-xl border border-b-0 border-amber-500/30 flex items-center justify-between flex-wrap gap-2 shadow-lg">
                            <span class="text-xs sm:text-sm font-bold text-amber-300 flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-amber-500/20 border border-amber-400/40 flex items-center justify-center text-amber-400 shadow-sm">
                                    <i class="fa-solid fa-shapes"></i>
                                </span>
                                ตารางที่ 1.3 หน่วยเสริมและหน่วยนอกระบบเอสไอที่ยอมรับให้ใช้ร่วมกับระบบเอสไอ (Supplementary & Accepted Non-SI Units) ในทางจุลชีววิทยา
                            </span>
                            <span class="text-[11px] font-mono text-amber-300 bg-amber-950/90 border border-amber-500/40 px-2.5 py-0.5 rounded-full shadow-inner">Accepted Units</span>
                        </div>
                        <div class="tex-table-wrap overflow-x-auto rounded-b-xl border border-amber-500/30 bg-slate-950/95 shadow-2xl">
                            <table class="tex-table w-full text-xs sm:text-[13px] leading-relaxed">
                                <thead>
                                    <tr class="bg-slate-900/90 text-slate-100 border-b border-slate-700/80">
                                        <th class="p-3.5 text-left font-semibold min-w-[190px]">ปริมาณ (Quantity)</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[140px]">ชื่อหน่วย</th>
                                        <th class="p-3.5 text-center font-semibold min-w-[80px]">สัญลักษณ์</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[200px]">ค่าเทียบเท่าในหน่วยเอสไอ</th>
                                        <th class="p-3.5 text-left font-semibold min-w-[280px]">ความสำคัญและการใช้งานจริงในงานจุลชีววิทยา</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800/80 text-slate-300">
                                    <tr class="hover:bg-amber-950/20 transition-colors">
                                        <td class="p-3.5" rowspan="2">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-amber-500/20 border border-amber-400/40 text-amber-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-compass-drafting"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">มุมระนาบและมุมตัน</div>
                                                    <div class="text-[11px] text-amber-400/80 font-mono">(หน่วยเสริม Supplementary)</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-amber-300 font-semibold">เรเดียน (radian)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{rad}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ rad} = \text{m/m} = 1$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-rotate text-amber-400 mr-1.5"></i>ความเร็วเชิงมุมในการหมุน ($\omega = \text{rad/s}$) คำนวณความเร่งหนีศูนย์กลาง ($g$-force, RCF) ของ<span class="whitespace-nowrap font-medium text-white">หัวปั่นเหวี่ยง Centrifuge</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-amber-950/20 transition-colors">
                                        <td class="p-3.5 text-amber-300 font-semibold">สเตอเรเดียน (steradian)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{sr}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ sr} = \text{m}^2/\text{m}^2 = 1$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-bullseye text-amber-400 mr-1.5"></i>มุมตันของการกระจายแสงหลอด LED กล้องจุลทรรศน์และเซ็นเซอร์วัดการกระเจิงแสงแบคทีเรีย
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-blue-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-blue-500/20 border border-blue-400/40 text-blue-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-flask"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ปริมาตร</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Volume</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-blue-300 font-semibold">ลิตร (litre)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{L, l}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ L} = 1\text{ dm}^3 = 10^{-3}\text{ m}^3 = 1{,}000\text{ mL}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-flask-vial text-blue-400 mr-1.5"></i>ปริมาตรถังหมักอาหารเลี้ยงเชื้อ (<span class="whitespace-nowrap font-medium text-white">Bioreactor</span>) และปริมาตรของเหลวในห้องปฏิบัติการ
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-cyan-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-cyan-500/20 border border-cyan-400/40 text-cyan-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-eye-dropper"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ปริมาตรไมโครปิเปต</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Microvolume</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-cyan-300 font-semibold">ไมโครลิตร (microlitre)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\mu\text{L}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ }\mu\text{L} = 10^{-6}\text{ L} = 10^{-9}\text{ m}^3 = 1\text{ mm}^3$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-vial text-cyan-400 mr-1.5"></i>ปริมาตรมาตรฐานของการดูดจ่ายสารด้วย<span class="whitespace-nowrap font-medium text-white">ไมโครปิเปต P20, P200, P1000</span> และปฏิกิริยา <span class="whitespace-nowrap font-medium text-white">PCR ($20\text{--}50\text{ }\mu\text{L}$)</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-sky-950/20 transition-colors">
                                        <td class="p-3.5" rowspan="3">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-sky-500/20 border border-sky-400/40 text-sky-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-clock"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">เวลาที่ไม่ใช่ SI</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Non-SI Time Units</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-sky-300 font-semibold">นาที (minute)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{min}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ min} = 60\text{ s}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-stopwatch text-sky-400 mr-1.5"></i>เวลาปั่นเหวี่ยงตกตะกอน ($5\text{--}10\text{ min}$), เวลานึ่งฆ่าเชื้อ <span class="whitespace-nowrap font-medium text-white">Autoclave ($15\text{--}20\text{ min}$)</span>
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-sky-950/20 transition-colors">
                                        <td class="p-3.5 text-sky-300 font-semibold">ชั่วโมง (hour)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{h}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ h} = 60\text{ min} = 3{,}600\text{ s}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-bed text-indigo-400 mr-1.5"></i>เวลาบ่มเพาะเชื้อแบคทีเรียข้ามคืน (<span class="whitespace-nowrap font-medium text-white">Overnight incubation:</span> $16\text{--}24\text{ h}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-sky-950/20 transition-colors">
                                        <td class="p-3.5 text-sky-300 font-semibold">วัน (day)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{d}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ d} = 24\text{ h} = 86{,}400\text{ s}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-calendar-check text-slate-400 mr-1.5"></i>การติดตามการเจริญของเชื้อราและแบคทีเรียที่โตช้า (เช่น <em>Mycobacterium tuberculosis</em> ต้องใช้เวลาหลายสัปดาห์)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-orange-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-orange-500/20 border border-orange-400/40 text-orange-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-temperature-three-quarters"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">อุณหภูมิเซลเซียส</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Celsius Temperature</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-orange-300 font-semibold">องศาเซลเซียส</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$^\circ\text{C}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$T_{^\circ\text{C}} = T_{\text{K}} - 273.15$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-temperature-high text-orange-400 mr-1.5"></i>หน้าปัดแสดงผลของ<span class="whitespace-nowrap font-medium text-white">ตู้บ่มเชื้อ ($37^\circ\text{C}$)</span>, ตู้เย็นเก็บตัวอย่าง ($4^\circ\text{C}$), และตู้แช่แข็ง ($-80^\circ\text{C}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-purple-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-purple-500/20 border border-purple-400/40 text-purple-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-dna"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">มวลชีวโมเลกุล</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Molecular mass</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-purple-300 font-semibold">ดาลตัน (dalton)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{Da, kDa}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ Da} \approx 1.660\,539 \times 10^{-27}\text{ kg}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-atom text-purple-400 mr-1.5"></i>น้ำหนักโมเลกุลของโปรตีนและกรดนิวคลีอิก (เช่น ไลโซไซม์ $14.3\text{ kDa}$, BSA $66.5\text{ kDa}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-yellow-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-yellow-500/20 border border-yellow-400/40 text-yellow-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-bolt"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">พลังงานโมเลกุล</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Molecular Energy</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-yellow-300 font-semibold">อิเล็กตรอนโวลต์</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{eV}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ eV} \approx 1.602\,176 \times 10^{-19}\text{ J}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-sun text-yellow-400 mr-1.5"></i>พลังงานโฟตอนของแสง UV สำหรับฆ่าเชื้อในตู้ Biosafety ($h\nu \approx 4.9\text{ eV}$ ที่ $\lambda = 254\text{ nm}$)
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-emerald-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-ruler"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ระยะพันธะ/ผลึก</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Bond / Lattice Length</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-emerald-300 font-semibold">อังสตรอม (ångström)</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{\AA}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ \AA} = 0.1\text{ nm} = 10^{-10}\text{ m}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-microscope text-emerald-400 mr-1.5"></i>ความยาวพันธะเคมี ระยะห่างเกลียวคู่ดีเอ็นเอ ($34\text{ \AA}$ ต่อรอบ) และความละเอียดกล้อง Cryo-EM
                                        </td>
                                    </tr>
                                    <tr class="hover:bg-red-950/20 transition-colors">
                                        <td class="p-3.5">
                                            <div class="flex items-center gap-2.5">
                                                <span class="w-7 h-7 rounded-lg bg-red-500/20 border border-red-400/40 text-red-300 shadow-sm flex items-center justify-center flex-shrink-0 text-xs">
                                                    <i class="fa-solid fa-compress"></i>
                                                </span>
                                                <div>
                                                    <div class="font-bold text-white">ความดันก๊าซ/ของไหล</div>
                                                    <div class="text-[11px] text-slate-400 font-mono">Fluid / Gas Pressure</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3.5 text-red-300 font-semibold">มิลลิเมตรปรอท</td>
                                        <td class="p-3.5 text-center font-mono font-bold text-amber-400 bg-amber-950/40 rounded-lg py-1 px-2">$\text{mmHg}$</td>
                                        <td class="p-3.5 font-mono text-emerald-400">$1\text{ mmHg} \approx 133.322\text{ Pa}$</td>
                                        <td class="p-3.5 text-slate-200">
                                            <i class="fa-solid fa-filter text-red-400 mr-1.5"></i>ระบบดูดกรองสุญญากาศ (<span class="whitespace-nowrap font-medium text-white">Vacuum filtration</span>) อาหารเลี้ยงเชื้อ และความดันก๊าซในถังหมัก
                                        </td>
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
                    <!-- Figure 1.5: 3D Serial Dilution Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.5-render">
                        <div class="rounded-2xl overflow-hidden border border-emerald-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_serial_dilution_3d.jpg" alt="ภาพที่ 1.5 การเจือจางแบบลำดับส่วน 10 เท่า Serial Dilution 3 มิติ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-emerald-400">ภาพที่ 1.5</strong>&ensp;แบบจำลอง 3 มิติของการเจือจางเชื้อแบบลำดับส่วน 10 เท่า (10-Fold Serial Dilution): แสดงหลอดทดลอง 5 หลอดตั้งแต่ $10^{-1}$ ถึง $10^{-5}$ พร้อมลูกศรการดูดถ่ายสารด้วยไมโครปิเปต $100\text{ }\mu\text{L}$ และผลการเจริญของโคโลนีแบคทีเรียบนจานวุ้นเพาะเชื้อ (TNTC $\rightarrow$ 150 CFU $\rightarrow$ 15 CFU)
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        นักศึกษาจำนวนมากมักสับสนเมื่อต้องคำนวณเลขยกกำลังติดลบ เช่น $10^{-6}$ หารด้วย $10^{-3}$ เพื่อขจัดปัญหานี้ เราสามารถใช้ <strong>เทคนิคบันไดขั้นละ 1,000</strong> (<strong>Step-by-1,000 Ladder Method</strong>) ซึ่งจำง่ายเหมือนการแลกธนบัตร กล่าวคือ หน่วยที่เรียงติดกันจากใหญ่ไปเล็ก ได้แก่ <strong>หน่วยปกติ $\rightarrow$ มิลลิ ($\text{m}$) $\rightarrow$ ไมโคร ($\mu$) $\rightarrow$ นาโน ($\text{n}$)</strong> จะมีค่าห่างกันขั้นละ $1{,}000$ เท่าเสมอ ดังแสดงในภาพที่ 1.6
                    </p>

                    <!-- SVG Diagram: Ladder -->
                    <figure class="tex-figure tex-figure-diagram my-8" id="fig-1.6-diagram">
                        <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl bg-slate-950 p-3 sm:p-4">
                            <img src="../images/maintex/tikz/ch01_tikz1.svg" alt="แผนภาพบันไดคำอุปสรรคขั้นละ 1,000 เท่า" class="w-full h-auto" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-emerald-400">ภาพที่ 1.6</strong>&ensp;แผนภาพบันไดคำอุปสรรคขั้นละ 1,000 เท่า สำหรับการแปลงหน่วยขนาดเซลล์และปริมาตรสารละลายในห้องปฏิบัติการ
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
                    <!-- Figure 1.7: 3D Target: Accuracy vs Precision -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-accuracy-precision">
                        <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_accuracy_precision_3d.jpg" alt="เปรียบเทียบความแม่นยำและความเที่ยงตรง 3 มิติ (Accuracy vs Precision Targets)" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-amber-400">ภาพที่ 1.7</strong>&ensp;แบบจำลอง 3 มิติเปรียบเทียบความแตกต่างระหว่างความแม่น (Accuracy) และความเที่ยง (Precision) ผ่านเป้ายิง 4 รูปแบบ: (1) แม่นสูง-เที่ยงสูง เกาะกลุ่มตรงกลางเป้า (2) แม่นต่ำ-เที่ยงสูง เกาะกลุ่มแน่นแต่นอกเป้า (3) แม่นสูง-เที่ยงต่ำ กระจายรอบจุดกึ่งกลาง (4) แม่นต่ำ-เที่ยงต่ำ กระจายไร้ทิศทาง
                        </figcaption>
                    </figure>

                    <!-- Figure 1.8: 3D Micropipette Mechanism Render -->
                    <figure class="tex-figure tex-figure-photo my-8" id="fig-1.8-render">
                        <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl bg-slate-950 group">
                            <img src="../images/sec_3d/ch01_micropipette_3d.jpg" alt="ภาพตัดขวาง 3 มิติแสดงกลไกลูกสูบไมโครปิเปต 2 จังหวะ" class="w-full h-auto object-cover group-hover:scale-[1.01] transition-transform duration-500" loading="lazy">
                        </div>
                        <figcaption class="mt-3 text-xs sm:text-sm text-slate-400 text-center">
                            <strong class="text-amber-400">ภาพที่ 1.8</strong>&ensp;แบบจำลอง 3 มิติเชิงเทคนิคแสดงภาพตัดขวางของไมโครปิเปต P1000: แสดงกลไกปุ่มกด 2 จังหวะ (First Stop สำหรับดูดสาร และ Second Stop สำหรับเป่าสารออกให้หมด), สปริงสอบเทียบ, แกนลูกสูบ, หน้าปัดดิจิทัล $1{,}000\text{ }\mu\text{L}$ และหยดของเหลวที่ปลายทิป
                        </figcaption>
                    </figure>

                    <p class="text-[15px] sm:text-base leading-relaxed">
                        หากเราต้องการตรวจสอบว่าไมโครปิเปตในห้องปฏิบัติการยังมีความแม่นยำหรือไม่ เราสามารถใช้วิธีชั่งมวลของน้ำกลั่นที่ดูดออกมา เนื่องจากน้ำบริสุทธิ์ที่อุณหภูมิห้องมีความหนาแน่นประมาณ $1\text{ g/mL}$ หรือกล่าวได้ว่า <strong>น้ำกลั่นปริมาตร $1{,}000\text{ }\mu\text{L}$ ($1\text{ mL}$) จะมีมวลเท่ากับ $1.0000\text{ g}$ และน้ำกลั่น $100\text{ }\mu\text{L}$ จะมีมวลเท่ากับ $0.1000\text{ g}$</strong> โดยคำนวณเปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์ได้ดังนี้
                    </p>

                    <!-- Formula Highlight Card: Responsive & Overflow-Safe -->
                    <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 border border-cyan-500/30 text-center shadow-xl space-y-3">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-950/80 border border-cyan-500/30 text-xs font-mono text-cyan-300 font-bold uppercase tracking-wider">
                            <i class="fa-solid fa-square-root-variable text-cyan-400"></i> เปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์ (Relative Error)
                        </div>
                        
                        <!-- Responsive Equation Box with overflow-x-auto -->
                        <div class="overflow-x-auto py-3 px-2 scrollbar-thin text-base sm:text-lg md:text-xl text-amber-300 font-mono">
                            $$\% \text{Relative Error} = \frac{\left| x_{\text{measured}} - x_{\text{true}} \right|}{x_{\text{true}}} \times 100\%$$
                        </div>

                        <!-- Thai Formula & Variable Definitions Sub-Card -->
                        <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 text-xs text-slate-300 font-sans space-y-2 text-left">
                            <div class="overflow-x-auto text-center py-1 font-mono text-slate-200">
                                $$\% \text{ความคลาดเคลื่อน} = \frac{\left|\text{ค่าที่วัดได้จริง} - \text{ค่ามาตรฐาน}\right|}{\text{ค่ามาตรฐาน}} \times 100\%$$
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2 border-t border-slate-800 text-[11px] font-mono text-slate-400">
                                <div class="flex items-center gap-1.5">
                                    <span class="text-amber-400 font-bold">$x_{\text{measured}}$</span>
                                    <span>= มวลหรือปริมาตรที่อ่านได้จากการทดลองจริง</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-emerald-400 font-bold">$x_{\text{true}}$</span>
                                    <span>= ค่ามาตรฐานหรือค่าอ้างอิงที่ระบุ (เช่น $1.0000\text{ g}$)</span>
                                </div>
                            </div>
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

                </div><!-- /#chapterContent -->
            </div><!-- /.lg:col-span-9 -->
        </div><!-- /.grid -->
    </div><!-- /.max-w-7xl -->
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


// ==========================================
// INTERACTIVE MICROBIOLOGY METROLOGY SYSTEM (FIG 1.4)
// ==========================================
const SI_BASE_DATA = [
    { id: 's', sym: 's', name_en: 'second', name_th: 'วินาที', qty_th: 'เวลา (Time)', color: '#eab308', tag: 'Centrifuge & การแบ่งเซลล์' },
    { id: 'm', sym: 'm', name_en: 'meter', name_th: 'เมตร', qty_th: 'ความยาว (Length)', color: '#f97316', tag: 'ขนาดแบคทีเรีย 1-5 µm' },
    { id: 'kg', sym: 'kg', name_en: 'kilogram', name_th: 'กิโลกรัม', qty_th: 'มวล (Mass)', color: '#ef4444', tag: 'ชั่งสารเคมี & ไมโครปิเปตต์' },
    { id: 'A', sym: 'A', name_en: 'ampere', name_th: 'แอมแปร์', qty_th: 'กระแสไฟฟ้า (Current)', color: '#22c55e', tag: 'อิเล็กโทรโฟรีซิส' },
    { id: 'K', sym: 'K', name_en: 'kelvin', name_th: 'เคลวิน', qty_th: 'อุณหพลวัต (Temp)', color: '#0284c7', tag: 'Incubator 37°C & Autoclave' },
    { id: 'mol', sym: 'mol', name_en: 'mole', name_th: 'โมล', qty_th: 'ปริมาณสาร (Substance)', color: '#d946ef', tag: 'ความเข้มข้น Molar & บัฟเฟอร์' },
    { id: 'cd', sym: 'cd', name_en: 'candela', name_th: 'แคนเดลา', qty_th: 'ความเข้มแสง (Light)', color: '#a855f7', tag: 'หลอด UV-C & กล้องจุลทรรศน์' }
];

const SI_DERIVED_DATA = [
    {
        id: 'kat', sym: 'kat', name_en: 'katal', name_th: 'คาตัล', qty_th: 'อัตราเร่งปฏิกิริยาของเอนไซม์ (Catalytic Activity)',
        formula_si: '\\text{mol}\\cdot\\text{s}^{-1}', formula_coherent: '\\text{mol/s}', parents: ['mol', 's'], domain: 'enzyme', domain_name: 'เอนไซม์ & ชีวเคมี', color: '#d946ef',
        micro_app: 'การตรวจวัดอัตราเร่งปฏิกิริยาของเอนไซม์สำคัญ เช่น Catalase Test ในเชื้อ Staphylococcus aureus, Taq DNA Polymerase ในปฏิกิริยา PCR, และเอนไซม์ Beta-lactamase ในเชื้อดื้อยาปฏิชีวนะ',
        physics_eq: 'v = \\frac{V_{\\max}[S]}{K_m + [S]}, \\quad 1\\text{ U} = 16.67\\text{ nkat} = 1.667\\times 10^{-8}\\text{ kat}',
        lab_note: 'ตามมาตรฐานสากล IUBMB / IUPAC หน่วยอย่างเป็นทางการของเอนไซม์คือ katal (kat) โดย 1 kat คือเอนไซม์ที่เร่งเปลี่ยนสับสเตรตได้ 1 โมลต่อวินาที',
        calc_type: 'kat'
    },
    {
        id: 'Pa', sym: 'Pa', name_en: 'pascal', name_th: 'ปาสคาล', qty_th: 'ความดันและความเค้น (Pressure & Stress)',
        formula_si: '\\text{kg}\\cdot\\text{m}^{-1}\\cdot\\text{s}^{-2}', formula_coherent: '\\text{N/m}^2', parents: ['kg', 'm', 's'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#f43f5e',
        micro_app: 'ความดันไอน้ำอิ่มตัวในหม้อนึ่งฆ่าเชื้อ Autoclave (103 kPa หรือ 15 psi ที่ 121°C), แรงดันออสโมซิส (Osmotic Pressure) ของผนังเซลล์แบคทีเรียแกรมบวก (1.5-2.5 MPa) และความดันอากาศบวก/ลบในตู้ Biosafety Cabinet',
        physics_eq: 'P_{\\text{gauge}} = P_{\\text{abs}} - P_{\\text{atm}}, \\quad \\Pi = iCRT \\text{ (Van \'t Hoff Equation)}',
        lab_note: 'ที่อุณหภูมิ 121°C ไอน้ำอิ่มตัวต้องรักษาความดัน 15 psi (103 kPa) นานอย่างน้อย 15 นาที เพื่อทำลายสปอร์ของ Geobacillus stearothermophilus ให้หมดสิ้น',
        calc_type: 'pa'
    },
    {
        id: 'V', sym: 'V', name_en: 'volt', name_th: 'โวลต์', qty_th: 'ความต่างศักย์และแรงเคลื่อนไฟฟ้า (Electric Potential & EMF)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-3}\\cdot\\text{A}^{-1}', formula_coherent: '\\text{W/A}', parents: ['kg', 'm', 's', 'A'], domain: 'electro', domain_name: 'เจลไฟฟ้า & เยื่อเซลล์', color: '#10b981',
        micro_app: 'การแยกขนาดชิ้นส่วนดีเอ็นเอด้วย Agarose Gel Electrophoresis (ใช้ 80-120 V), ศักย์ไฟฟ้าเยื่อหุ้มเซลล์ของแบคทีเรีย (Membrane Potential ประมาณ -70 ถึง -120 mV) ซึ่งขับเคลื่อนการสังเคราะห์ ATP ผ่าน Proton Motive Force (PMF)',
        physics_eq: 'E = \\frac{V}{d}, \\quad v_{\\text{migration}} = \\mu_e E = \\mu_e \\frac{V}{d}, \\quad PMF = \\Delta \\psi - \\frac{2.3 RT}{F}\\Delta pH',
        lab_note: 'การตั้งค่าโวลต์ในถังรันเจลควรอยู่ที่ประมาณ 5 V/cm ของระยะห่างระหว่างขั้วไฟฟ้า เพื่อป้องกันไม่ให้เจลร้อนจนเสียสภาพหรือแถบดีเอ็นเอคดงอ',
        calc_type: 'volt'
    },
    {
        id: 'Gy', sym: 'Gy', name_en: 'gray', name_th: 'เกรย์', qty_th: 'ปริมาณรังสีดูดกลืน (Absorbed Dose)',
        formula_si: '\\text{m}^2\\cdot\\text{s}^{-2}', formula_coherent: '\\text{J/kg}', parents: ['m', 's'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#ef4444',
        micro_app: 'การปลอดเชื้อวัสดุอุปกรณ์การแพทย์และจานเพาะเชื้อพลาสติกด้วยรังสีแกมมา Cobalt-60 หรือ Electron Beam ที่ระดับ 25 kGy (25,000 Gy) เพื่อทำลาย DNA และเอนไซม์ของจุลินทรีย์โดยไม่ทำให้พลาสติกละลาย',
        physics_eq: 'D = \\frac{\\Delta E_{\\text{absorbed}}}{\\Delta m}, \\quad N_t = N_0 \\times 10^{-D / D_{10}} \\quad (SAL = 10^{-6})',
        lab_note: 'ค่า D10 คือปริมาณรังสีที่ลดจำนวนเชื้อลง 90% การฉายรังสี 25 kGy รับประกันระดับความปลอดเชื้อ Sterility Assurance Level ตามมาตรฐานสากล',
        calc_type: 'gray'
    },
    {
        id: 'Hz', sym: 'Hz', name_en: 'hertz', name_th: 'เฮิรตซ์', qty_th: 'ความถี่ (Frequency)',
        formula_si: '\\text{s}^{-1}', formula_coherent: '1/s', parents: ['s'], domain: 'physics', domain_name: 'ปั่นเหวี่ยง & กลศาสตร์', color: '#eab308',
        micro_app: 'ความถี่รอบการหมุนของเครื่องปั่นเหวี่ยงตกตะกอน Centrifuge (12,000 RPM = 200 Hz), ความถี่อัลตราโซนิกของเครื่องสลายเซลล์ Sonicator (20-40 kHz), และความถี่การหมุนของแฟลกเจลลาแบคทีเรีย (200-300 Hz)',
        physics_eq: 'f = \\frac{\\text{RPM}}{60}, \\quad \\text{RCF} (g) = 1.118 \\times 10^{-5} \\times r_{\\text{cm}} \\times (\\text{RPM})^2',
        lab_note: 'ในงานวิจัยจุลชีววิทยาต้องระบุแรงเหวี่ยงเป็นค่า RCF (×g) เสมอ แทนที่จะบอกเพียง RPM เพื่อให้ห้องแล็บอื่นที่ใช้รัศมีโรเตอร์ต่างกันสามารถทำซ้ำได้ผลตรงกัน',
        calc_type: 'hz'
    },
    {
        id: 'S', sym: 'S', name_en: 'siemens', name_th: 'ซีเมนส์', qty_th: 'สภาพนำไฟฟ้า (Electrical Conductance)',
        formula_si: '\\text{kg}^{-1}\\cdot\\text{m}^{-2}\\cdot\\text{s}^3\\cdot\\text{A}^2', formula_coherent: '1/\\Omega', parents: ['kg', 'm', 's', 'A'], domain: 'electro', domain_name: 'เจลไฟฟ้า & เยื่อเซลล์', color: '#10b981',
        micro_app: 'การตรวจวัดความบริสุทธิ์ของน้ำเกรดเตรียมบัฟเฟอร์และงานวิจัยอณูชีววิทยา (Milli-Q Water ต้องมีสภาพนำไฟฟ้า < 0.055 µS/cm หรือ 18.2 MΩ·cm) และการวัดสภาพนำไฟฟ้าของน้ำทิ้งบำบัด',
        physics_eq: 'G = \\frac{1}{R} = \\sigma \\frac{A}{L}, \\quad \\sigma = \\sum c_i z_i \\lambda_i',
        lab_note: 'หากน้ำกลั่นมีสภาพนำไฟฟ้าสูง แสดงว่ามีไอออนโลหะปนเปื้อน ซึ่งอาจยับยั้งการทำงานของเอนไซม์ Taq DNA Polymerase หรือทำให้เจลอิเล็กโทรโฟรีซิสร้อนจัด',
        calc_type: 'siemens'
    },
    {
        id: 'J', sym: 'J', name_en: 'joule', name_th: 'จูล', qty_th: 'พลังงานและงาน (Energy & Work)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-2}', formula_coherent: '\\text{N}\\cdot\\text{m}', parents: ['kg', 'm', 's'], domain: 'enzyme', domain_name: 'เอนไซม์ & ชีวเคมี', color: '#f97316',
        micro_app: 'พลังงานพันธะเคมีฟอสเฟตพลังงานสูงใน ATP (-30.5 kJ/mol), พลังงานจลน์ของโรเตอร์เครื่องปั่นเหวี่ยง, และความร้อนแฝงในการกลายเป็นไอของน้ำในหม้อนึ่ง Autoclave',
        physics_eq: '\\Delta G = \\Delta G^\\circ + RT \\ln Q, \\quad E_k = \\frac{1}{2} I \\omega^2',
        lab_note: 'พลังงาน 30.5 kJ ต่อโมลของ ATP คือหน่วยเงินตราพลังงานสากลที่จุลินทรีย์ใช้ขับเคลื่อนทุกกระบวนการในเซลล์',
        calc_type: 'general'
    },
    {
        id: 'N', sym: 'N', name_en: 'newton', name_th: 'นิวตัน', qty_th: 'แรงกลศาสตร์ (Force)',
        formula_si: '\\text{kg}\\cdot\\text{m}\\cdot\\text{s}^{-2}', formula_coherent: '\\text{kg}\\cdot\\text{m/s}^2', parents: ['kg', 'm', 's'], domain: 'physics', domain_name: 'ปั่นเหวี่ยง & กลศาสตร์', color: '#ef4444',
        micro_app: 'แรงหนืดต้านทานการเคลื่อนที่ของแบคทีเรียในของเหลว (Stokes Drag Force), แรงเหวี่ยงหนีศูนย์กลางในการตกตะกอนเซลล์, และทอร์กของโรเตอร์แฟลกเจลลา (~4,000 pN·nm)',
        physics_eq: 'F_{\\text{drag}} = 6\\pi \\eta r v \\text{ (Stokes\' Law)}, \\quad F_{\\text{cf}} = m \\omega^2 r',
        lab_note: 'ในระดับเซลล์จุลทรรศน์ แรงหนืดมีอิทธิพลเหนือกว่าแรงเฉื่อยอย่างมหาศาล (Low Reynolds Number, Re << 1)',
        calc_type: 'general'
    },
    {
        id: 'C', sym: 'C', name_en: 'coulomb', name_th: 'คูลอมบ์', qty_th: 'ประจุไฟฟ้า (Electric Charge)',
        formula_si: '\\text{A}\\cdot\\text{s}', formula_coherent: '\\text{A}\\cdot\\text{s}', parents: ['A', 's'], domain: 'electro', domain_name: 'เจลไฟฟ้า & เยื่อเซลล์', color: '#22c55e',
        micro_app: 'ประจุไฟฟ้าลบสุทธิบนพื้นผิวผนังเซลล์แบคทีเรียและโครงสร้างฟอสเฟตของสาย DNA ซึ่งกำหนดค่าศักย์ซีตา (Zeta Potential) และอัตราการเคลื่อนที่ในอิเล็กโทรโฟรีซิส',
        physics_eq: 'q = I \\times t, \\quad \\zeta = \\frac{4\\pi \\eta v}{\\varepsilon E} \\text{ (Smoluchowski Eq)}',
        lab_note: 'ประจุลบของกรดฟอสฟอริกบนสายดีเอ็นเอทำให้ดีเอ็นเอทุกขนาดเคลื่อนที่เข้าหาขั้วบวก (Anode) ในสนามไฟฟ้า',
        calc_type: 'general'
    },
    {
        id: 'degC', sym: '°C', name_en: 'degree Celsius', name_th: 'องศาเซลเซียส', qty_th: 'อุณหภูมิเซลเซียส (Celsius Temperature)',
        formula_si: 'T/\\text{K} - 273.15', formula_coherent: 'K - 273.15', parents: ['K'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#0284c7',
        micro_app: 'อุณหภูมิเพาะเลี้ยงเชื้อมาตรฐานในตู้อบ Incubator (37°C สำหรับแบคทีเรียก่อโรคในมนุษย์, 28-30°C สำหรับราและแบคทีเรียพืช), นึ่งฆ่าเชื้อ 121°C, และเก็บรักษาหัวเชื้อที่ -80°C',
        physics_eq: 'T_{\\text{°C}} = T_{\\text{K}} - 273.15, \\quad Q = mc\\Delta T',
        lab_note: 'การเบี่ยงเบนของอุณหภูมิตู้อบเพาะเชื้อเพียง ±1°C สามารถเปลี่ยนอัตราการเติบโตและการแสดงออกของยีนพิษในแบคทีเรียได้อย่างมีนัยสำคัญ',
        calc_type: 'general'
    },
    {
        id: 'lx', sym: 'lx', name_en: 'lux', name_th: 'ลักซ์', qty_th: 'ความส่องสว่าง (Illuminance)',
        formula_si: '\\text{cd}\\cdot\\text{sr}\\cdot\\text{m}^{-2}', formula_coherent: '\\text{lm/m}^2', parents: ['cd', 'm'], domain: 'optics', domain_name: 'กล้อง & แสง', color: '#38bdf8',
        micro_app: 'ความส่องสว่างใน Photobioreactor เพาะเลี้ยงสาหร่ายเซลล์เดียวและไซยาโนแบคทีเรีย (2,000-5,000 lx) และระดับความสว่างหน้าโต๊ะทำงานในห้องแล็บ (500 lx)',
        physics_eq: 'E_v = \\frac{\\Phi_v}{A} = \\frac{I_v \\cos\\theta}{r^2}',
        lab_note: 'การเพาะเลี้ยงจุลินทรีย์สังเคราะห์แสงต้องควบคุมความเข้มแสงให้เหมาะสม แสงที่จ้าเกินไปจะเกิด Photoinhibition ยับยั้งการเจริญเติบโต',
        calc_type: 'general'
    },
    {
        id: 'W', sym: 'W', name_en: 'watt', name_th: 'วัตต์', qty_th: 'กำลังงานและความร้อน (Power & Heat Flow)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-3}', formula_coherent: '\\text{J/s}', parents: ['kg', 'm', 's'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#eab308',
        micro_app: 'กำลังไฟฟ้าของฮีตเตอร์ในหม้อนึ่งฆ่าเชื้อ Autoclave (1,500-3,000 W), มอเตอร์เครื่องเขย่าสาร Shaking Incubator, และหลอดไฟฮาโลเจนในกล้องจุลทรรศน์',
        physics_eq: 'P = \\frac{W}{t} = V \\times I = I^2 R',
        lab_note: 'กำลังงานความร้อนต้องสัมพันธ์กับปริมาตรสารละลายที่ต้องการนึ่งฆ่าเชื้อ เพื่อให้มั่นใจว่าอุณหภูมิถึง 121°C ตลอดทั่วทั้งภาชนะ',
        calc_type: 'general'
    },
    {
        id: 'Wb', sym: 'Wb', name_en: 'weber', name_th: 'เวเบอร์', qty_th: 'ฟลักซ์แม่เหล็ก (Magnetic Flux)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-2}\\cdot\\text{A}^{-1}', formula_coherent: '\\text{V}\\cdot\\text{s}', parents: ['kg', 'm', 's', 'A'], domain: 'physics', domain_name: 'ปั่นเหวี่ยง & กลศาสตร์', color: '#06b6d4',
        micro_app: 'ฟลักซ์แม่เหล็กในแท่งกวนสารเคมี Magnetic Stirrer อัตโนมัติสำหรับละลายอาหารเลี้ยงเชื้อผง เช่น Nutrient Agar หรือ LB Broth',
        physics_eq: '\\Phi_B = B \\cdot A \\cos\\theta, \\quad \\mathcal{E} = -\\frac{d\\Phi_B}{dt}',
        lab_note: 'การกวนสารละลายด้วยแม่เหล็กช่วยให้อาหารเลี้ยงเชื้อละลายเป็นเนื้อเดียวกันก่อนนำไปผ่านกระบวนการนึ่งฆ่าเชื้อ',
        calc_type: 'general'
    },
    {
        id: 'T', sym: 'T', name_en: 'tesla', name_th: 'เทสลา', qty_th: 'ความเข้มสนามแม่เหล็ก (Magnetic Field)',
        formula_si: '\\text{kg}\\cdot\\text{s}^{-2}\\cdot\\text{A}^{-1}', formula_coherent: '\\text{Wb/m}^2', parents: ['kg', 's', 'A'], domain: 'physics', domain_name: 'ปั่นเหวี่ยง & กลศาสตร์', color: '#f59e0b',
        micro_app: 'ความเข้มสนามแม่เหล็กของแท่นแยกสาร Magnetic Separation Rack (0.2-0.5 T) สำหรับการดูดจับอนุภาคแม่เหล็กในการสกัด DNA/RNA อัตโนมัติ',
        physics_eq: 'F = q(v \\times B), \\quad B = \\frac{\\mu_0 I}{2\\pi r}',
        lab_note: 'เทคโนโลยี Magnetic Bead Extraction ให้ความบริสุทธิ์ของกรดนิวคลีอิกสูงมาก เหมาะสำหรับการทำ Real-time PCR และ Next-Generation Sequencing',
        calc_type: 'general'
    },
    {
        id: 'lm', sym: 'lm', name_en: 'lumen', name_th: 'ลูเมน', qty_th: 'ฟลักซ์ส่องสว่าง (Luminous Flux)',
        formula_si: '\\text{cd}\\cdot\\text{sr}', formula_coherent: '\\text{cd}\\cdot\\text{sr}', parents: ['cd'], domain: 'optics', domain_name: 'กล้อง & แสง', color: '#c084fc',
        micro_app: 'ฟลักซ์การแผ่รังสีของหลอดไฟ UV-C 254 nm ที่ใช้ทำลายเชื้อในตู้ปลอดเชื้อ และฟลักซ์แสงส่องผ่านตัวอย่างในกล้องจุลทรรศน์ฟลูออเรสเซนต์',
        physics_eq: '\\Phi_v = \\int I_v d\\Omega, \\quad \\text{Fluorescence Emission Intensity}',
        lab_note: 'หลอด UV-C ต้องมีฟลักซ์การแผ่รังสีเพียงพอและควรเปลี่ยนหลอดตามชั่วโมงการใช้งานที่กำหนดเพื่อรักษาประสิทธิภาพการฆ่าเชื้อ',
        calc_type: 'general'
    },
    {
        id: 'Bq', sym: 'Bq', name_en: 'becquerel', name_th: 'เบกเคอเรล', qty_th: 'กัมมันตภาพรังสี (Radioactivity)',
        formula_si: '\\text{s}^{-1}', formula_coherent: '1/s', parents: ['s'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#f59e0b',
        micro_app: 'อัตราการสลายตัวของสารไอโซโทปกัมมันตรังสีที่ใช้ติดฉลากติดตามในงานอณูพันธุศาสตร์ เช่น ฟอสฟอรัส-32 (P-32) สำหรับติดฉลาก DNA probe และกำมะถัน-35 (S-35) สำหรับโปรตีน',
        physics_eq: 'A = \\lambda N = \\frac{\\ln 2}{T_{1/2}} N',
        lab_note: '1 Bq หมายถึงมีการสลายตัวของนิวเคลียสกัมมันตรังสี 1 ครั้งต่อวินาที (1 Ci = 3.7 × 10^10 Bq)',
        calc_type: 'general'
    },
    {
        id: 'ohm', sym: 'Ω', name_en: 'ohm', name_th: 'โอห์ม', qty_th: 'ความต้านทานไฟฟ้า (Electrical Resistance)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-3}\\cdot\\text{A}^{-2}', formula_coherent: '\\text{V/A}', parents: ['kg', 'm', 's', 'A'], domain: 'electro', domain_name: 'เจลไฟฟ้า & เยื่อเซลล์', color: '#14b8a6',
        micro_app: 'ความต้านทานไฟฟ้าของสารละลายบัฟเฟอร์ Tris-Acetate-EDTA (TAE) และถังเจลไฟฟ้า, ความต้านทานเยื่อหุ้มเซลล์ (Membrane Resistance)',
        physics_eq: 'R = \\frac{V}{I} = \\rho \\frac{L}{A}',
        lab_note: 'หากความต้านทานของระบบต่ำเกินไป (เช่น ใส่เกลือเข้มข้นเกินไปในบัฟเฟอร์) กระแสจะไหลสูงมากจนเกิดความร้อนสะสมทำให้เจลละลาย',
        calc_type: 'general'
    },
    {
        id: 'H', sym: 'H', name_en: 'henry', name_th: 'เฮนรี', qty_th: 'ความเหนี่ยวนำไฟฟ้า (Inductance)',
        formula_si: '\\text{kg}\\cdot\\text{m}^2\\cdot\\text{s}^{-2}\\cdot\\text{A}^{-2}', formula_coherent: '\\text{Wb/A}', parents: ['kg', 'm', 's', 'A'], domain: 'physics', domain_name: 'ปั่นเหวี่ยง & กลศาสตร์', color: '#06b6d4',
        micro_app: 'ความเหนี่ยวนำในขดลวดสเตเตอร์ของมอเตอร์ไร้แปรงถ่าน (Brushless Motor) ในเครื่อง Ultracentrifuge ซึ่งหมุนด้วยความเร็วสูงกว่า 100,000 RPM',
        physics_eq: 'V_L = -L \\frac{dI}{dt}, \\quad U = \\frac{1}{2} L I^2',
        lab_note: 'การควบคุมความเหนี่ยวนำและกระแสขับเคลื่อนช่วยให้การหมุนนุ่มนวล ลดแรงสั่นสะเทือนที่อาจรบกวนชั้นตะกอนสารแขวนลอยของเซลล์',
        calc_type: 'general'
    },
    {
        id: 'F', sym: 'F', name_en: 'farad', name_th: 'ฟารัด', qty_th: 'ความจุไฟฟ้า (Capacitance)',
        formula_si: '\\text{kg}^{-1}\\cdot\\text{m}^{-2}\\cdot\\text{s}^4\\cdot\\text{A}^2', formula_coherent: '\\text{C/V}', parents: ['kg', 'm', 's', 'A'], domain: 'electro', domain_name: 'เจลไฟฟ้า & เยื่อเซลล์', color: '#ec4899',
        micro_app: 'ตัวเก็บประจุในเครื่องถ่ายยีนเข้าเซลล์แบคทีเรียด้วยคลื่นไฟฟ้า (Electroporator เช่น 25 µF) และความจุไฟฟ้าของเยื่อหุ้มเซลล์ชีวภาพ (~1 µF/cm²)',
        physics_eq: 'C = \\frac{q}{V} = \\varepsilon \\frac{A}{d}, \\quad \\tau = RC \\text{ (Time Constant)}',
        lab_note: 'ค่าคงตัวเวลา (Time Constant, tau = RC) ในการทำ Electroporation มีความสำคัญยิ่ง หากเกิด Arcing (ประกายไฟลัดวงจร) เซลล์จะตายทั้งหมด',
        calc_type: 'general'
    },
    {
        id: 'sr', sym: 'sr', name_en: 'steradian', name_th: 'สเตอเรเดียน', qty_th: 'มุมตัน (Solid Angle)',
        formula_si: '\\text{m}^2/\\text{m}^2 = 1', formula_coherent: '1', parents: ['m'], domain: 'optics', domain_name: 'กล้อง & แสง', color: '#a855f7',
        micro_app: 'มุมตันของการรับแสงของเลนส์ใกล้วัตถุกล้องจุลทรรศน์ ซึ่งสัมพันธ์กับ Numerical Aperture (NA) และขีดจำกัดการแจกแจงรายละเอียดของภาพ (Resolution Limit)',
        physics_eq: '\\Omega = 2\\pi(1 - \\cos\\alpha), \\quad d_{\\min} = \\frac{\\lambda}{2 \\text{NA}} = \\frac{\\lambda}{2 n \\sin\\alpha}',
        lab_note: 'เลนส์ใกล้วัตถุที่มีค่า NA สูงจะรับแสงได้เป็นมุมตันกว้างขึ้น ให้ภาพจุลินทรีย์ที่คมชัดและแยกรายละเอียดชิ้นส่วนเซลล์ได้ดีขึ้น',
        calc_type: 'general'
    },
    {
        id: 'Sv', sym: 'Sv', name_en: 'sievert', name_th: 'ซีเวิร์ต', qty_th: 'ปริมาณรังสีสมมูลและประสิทธิผล (Dose Equivalent)',
        formula_si: '\\text{m}^2\\cdot\\text{s}^{-2}', formula_coherent: '\\text{J/kg}', parents: ['m', 's'], domain: 'autoclave', domain_name: 'นึ่งฆ่าเชื้อ & ปลอดเชื้อ', color: '#ef4444',
        micro_app: 'เกณฑ์การประเมินความปลอดภัยทางรังสีของบุคลากรและนักวิจัยที่ปฏิบัติงานกับสารไอโซโทปหรือห้องฉายรังสีฆ่าเชื้อชีวภาพ (ขีดจำกัดไม่เกิน 20 mSv/ปี)',
        physics_eq: 'H = D \\times W_R, \\quad E = \\sum H_T \\times W_T',
        lab_note: 'Sievert เป็นหน่วยที่คำนึงถึงผลกระทบทางชีววิทยาต่อเนื้อเยื่อของมนุษย์ แตกต่างจาก Gray ซึ่งเป็นปริมาณพลังงานทางกายภาพที่ดูดกลืนล้วนๆ',
        calc_type: 'general'
    },
    {
        id: 'rad', sym: 'rad', name_en: 'radian', name_th: 'เรเดียน', qty_th: 'มุมระนาบ (Plane Angle)',
        formula_si: '\\text{m/m} = 1', formula_coherent: '1', parents: ['m'], domain: 'optics', domain_name: 'กล้อง & แสง', color: '#8b5cf6',
        micro_app: 'มุมการเลี้ยวเบนของแสงในกล้องจุลทรรศน์คอนฟอคอล (Confocal Microscopy), การคำนวณมุมกระเจิงของแสงในเครื่องตรวจนับเซลล์ Flow Cytometry, และมุมการกระจายตัวของสปอร์เชื้อรา',
        physics_eq: '\\theta = \\frac{s}{r}, \\quad \\sin\\theta = 1.22 \\frac{\\lambda}{D} \\text{ (Airy Disk Angle)}',
        lab_note: 'การวัดมุมกระเจิงแสงมุมตรง (Forward Scatter, FSC) ในเครื่อง Flow Cytometer ใช้ประเมินขนาดสัมพัทธ์ของเซลล์แบคทีเรียและเม็ดเลือด',
        calc_type: 'general'
    }
];

let selectedUnitId = 'kat';

function initSiInteractiveMetrology() {
    renderBaseUnitsGrid();
    renderDerivedUnitsGrid(SI_DERIVED_DATA);
    selectSiUnit('kat');
}

function switchSiViewMode(mode) {
    const btnInteractive = document.getElementById('btn-mode-interactive');
    const btnVector = document.getElementById('btn-mode-vector');
    const viewInteractive = document.getElementById('si-view-interactive');
    const viewVector = document.getElementById('si-view-vector');
    const toolbar = document.getElementById('si-interactive-toolbar');

    if (mode === 'interactive') {
        viewInteractive.classList.remove('hidden');
        viewVector.classList.add('hidden');
        if (toolbar) toolbar.classList.remove('hidden');

        btnInteractive.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 bg-emerald-500 text-slate-950 shadow-md shadow-emerald-500/30';
        btnVector.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800/80';
    } else {
        viewInteractive.classList.add('hidden');
        viewVector.classList.remove('hidden');
        if (toolbar) toolbar.classList.add('hidden');

        btnVector.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 bg-cyan-500 text-slate-950 shadow-md shadow-cyan-500/30';
        btnInteractive.className = 'px-3.5 py-1.5 rounded-lg text-xs font-bold transition flex items-center gap-1.5 text-slate-300 hover:text-white hover:bg-slate-800/80';
    }
}

function renderBaseUnitsGrid() {
    const container = document.getElementById('base-units-grid');
    if (!container) return;

    container.innerHTML = SI_BASE_DATA.map(b => `
        <div onclick="selectSiBase('${b.id}')" id="card-base-${b.id}" class="si-base-card cursor-pointer p-3 rounded-xl bg-slate-900/90 border border-slate-800 hover:border-slate-600 transition-all text-center group hover:scale-[1.03]">
            <div class="text-[10px] font-mono font-bold text-slate-400 group-hover:text-white transition uppercase">${b.name_en}</div>
            <div class="text-2xl font-black my-0.5 tracking-tight" style="color: ${b.color};">${b.sym}</div>
            <div class="text-[10.5px] font-bold text-slate-300">${b.name_th}</div>
            <div class="text-[9px] text-slate-500 mt-1 line-clamp-1">${b.tag}</div>
        </div>
    `).join('');
}

function renderDerivedUnitsGrid(data) {
    const container = document.getElementById('derived-units-grid');
    const countEl = document.getElementById('si-derived-count');
    if (!container) return;

    if (countEl) countEl.innerText = `แสดง ${data.length} จาก 22 หน่วย`;

    container.innerHTML = data.map(d => `
        <div onclick="selectSiUnit('${d.id}')" id="card-unit-${d.id}" class="si-unit-card cursor-pointer p-3 rounded-xl bg-slate-900/80 border border-slate-800/90 hover:border-slate-600 transition-all text-center group hover:scale-[1.03] shadow-md relative overflow-hidden">
            <div class="flex items-center justify-between gap-1 mb-1">
                <span class="text-[9px] font-mono px-1.5 py-0.2 rounded bg-slate-950 text-slate-400">${d.formula_coherent}</span>
                <span class="w-2 h-2 rounded-full" style="background-color: ${d.color};"></span>
            </div>
            <div class="text-2xl font-black tracking-tight" style="color: ${d.color};">${d.sym}</div>
            <div class="text-[11px] font-bold text-white mt-0.5">${d.name_th}</div>
            <div class="text-[9px] text-slate-400 mt-1 line-clamp-1">${d.domain_name}</div>
        </div>
    `).join('');

    // Highlight selected
    highlightUnitCard(selectedUnitId);
}

function selectSiBase(baseId) {
    // Filter or highlight derived units that depend on this base
    const derivedMatches = SI_DERIVED_DATA.filter(d => d.parents.includes(baseId));
    
    // Highlight base card
    document.querySelectorAll('.si-base-card').forEach(c => c.classList.remove('ring-2', 'ring-cyan-400', 'bg-cyan-950/40'));
    const baseCard = document.getElementById(`card-base-${baseId}`);
    if (baseCard) baseCard.classList.add('ring-2', 'ring-cyan-400', 'bg-cyan-950/40');

    // Pick first derived or show derived
    if (derivedMatches.length > 0) {
        selectSiUnit(derivedMatches[0].id);
    }
}

let mathJaxQueue = Promise.resolve();
function retypesetMathJax(container) {
    if (!container) return;
    if (window.MathJax && typeof MathJax.typesetPromise === 'function') {
        mathJaxQueue = mathJaxQueue.then(() => {
            if (typeof MathJax.typesetClear === 'function') {
                MathJax.typesetClear([container]);
            }
            return MathJax.typesetPromise([container]);
        }).catch(err => {
            console.warn('MathJax typesetting queue caught:', err);
        });
    } else if (window.MathJax && MathJax.startup && MathJax.startup.promise) {
        MathJax.startup.promise.then(() => {
            retypesetMathJax(container);
        });
    } else {
        setTimeout(() => retypesetMathJax(container), 250);
    }
}

function selectSiUnit(unitId) {
    selectedUnitId = unitId;
    const unit = SI_DERIVED_DATA.find(u => u.id === unitId) || SI_DERIVED_DATA[0];

    highlightUnitCard(unitId);
    renderInspectorCard(unit);
    retypesetMathJax(document.getElementById('si-inspector-card'));
}

function highlightUnitCard(unitId) {
    document.querySelectorAll('.si-unit-card').forEach(c => {
        c.classList.remove('ring-2', 'ring-emerald-400', 'bg-emerald-950/30', 'scale-[1.04]');
    });
    const card = document.getElementById(`card-unit-${unitId}`);
    if (card) {
        card.classList.add('ring-2', 'ring-emerald-400', 'bg-emerald-950/30', 'scale-[1.04]');
    }
}

function renderInspectorCard(u) {
    const container = document.getElementById('si-inspector-card');
    if (!container) return;

    // Parent base badges
    const parentBadges = u.parents.map(p => {
        const b = SI_BASE_DATA.find(x => x.id === p);
        return `<span class="px-2 py-0.5 rounded-md text-[10px] font-mono font-bold bg-slate-800 text-slate-300 border border-slate-700">หน่วยฐาน: ${b ? b.sym + ' (' + b.name_th + ')' : p}</span>`;
    }).join(' ');

    // Mini Calculator HTML
    let calcHtml = '';
    if (u.calc_type === 'kat') {
        calcHtml = `
            <div class="mt-4 p-4 rounded-xl bg-slate-950/90 border border-purple-500/30 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-purple-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator"></i> ตัวแปลงหน่วยอัตราเร่งเอนไซม์ (Enzyme Units ↔ Katal)
                    </span>
                    <span class="text-[10px] font-mono text-slate-500">1 U = 16.67 nkat</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">Enzyme Unit (U หรือ µmol/min):</label>
                        <input type="number" id="calc-u-val" value="100" oninput="calcEnzymeKat('u')" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-purple-500 font-mono">
                    </div>
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">Nanokatal (nkat หรือ nmol/s):</label>
                        <input type="number" id="calc-nkat-val" value="1666.7" oninput="calcEnzymeKat('nkat')" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-purple-500 font-mono">
                    </div>
                </div>
                <div class="text-[11px] text-purple-200/80 font-mono bg-purple-950/30 p-2 rounded-lg border border-purple-900/40" id="calc-kat-result">
                    100.00 U = 1,666.67 nkat (หรือ 1.667 µkat = 1.667×10⁻⁶ mol/s)
                </div>
            </div>
        `;
    } else if (u.calc_type === 'pa') {
        calcHtml = `
            <div class="mt-4 p-4 rounded-xl bg-slate-950/90 border border-rose-500/30 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-rose-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-temperature-arrow-up"></i> คำนวณความดันไอน้ำอิ่มตัว Autoclave (Temperature → Saturated Pressure)
                    </span>
                    <span class="text-[10px] font-mono text-slate-500">Antoine Eq. Approximation</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">อุณหภูมิในหม้อนึ่ง (°C):</label>
                        <input type="range" id="calc-temp-slider" min="100" max="135" value="121" oninput="calcAutoclavePressure(this.value)" class="w-full accent-rose-500">
                        <div class="flex justify-between text-[10px] text-slate-500 font-mono"><span>100°C</span><span id="calc-temp-disp" class="text-rose-400 font-bold">121°C</span><span>135°C</span></div>
                    </div>
                    <div class="p-2.5 rounded-lg bg-slate-900 border border-slate-800 text-xs space-y-1">
                        <div class="flex justify-between text-slate-300"><span>ความดันเกจ (Gauge):</span> <strong id="calc-pa-gauge" class="text-rose-400 font-mono">103.0 kPa (14.9 psi)</strong></div>
                        <div class="flex justify-between text-slate-400 text-[11px]"><span>ความดันสัมบูรณ์ (Absolute):</span> <span id="calc-pa-abs" class="font-mono">204.3 kPa (29.6 psi)</span></div>
                    </div>
                </div>
            </div>
        `;
    } else if (u.calc_type === 'hz') {
        calcHtml = `
            <div class="mt-4 p-4 rounded-xl bg-slate-950/90 border border-amber-500/30 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-amber-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-rotate"></i> แปลงความเร็วรอบเครื่องปั่นเหวี่ยง (RPM ↔ RCF / g-force)
                    </span>
                    <span class="text-[10px] font-mono text-slate-500">RCF = 1.118×10⁻⁵ × r × RPM²</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">ความเร็วรอบ (RPM):</label>
                        <input type="number" id="calc-rpm-val" value="10000" oninput="calcCentrifugeRcf()" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-amber-500 font-mono">
                    </div>
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">รัศมีโรเตอร์ r (cm):</label>
                        <input type="number" id="calc-radius-val" value="8.5" step="0.5" oninput="calcCentrifugeRcf()" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-amber-500 font-mono">
                    </div>
                    <div class="p-2.5 rounded-lg bg-slate-900 border border-slate-800 text-xs flex flex-col justify-center">
                        <span class="text-slate-400 text-[11px]">แรงเหวี่ยงสัมพัทธ์ (RCF):</span>
                        <strong id="calc-rcf-res" class="text-amber-400 font-mono text-base">9,503 ×g</strong>
                        <span class="text-[10px] text-slate-500">ความถี่: 166.7 Hz</span>
                    </div>
                </div>
            </div>
        `;
    } else if (u.calc_type === 'volt') {
        calcHtml = `
            <div class="mt-4 p-4 rounded-xl bg-slate-950/90 border border-emerald-500/30 space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-emerald-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-bolt"></i> คำนวณสนามไฟฟ้าในถังเจลอิเล็กโทรโฟรีซิส (Electrophoresis Voltage & Field)
                    </span>
                    <span class="text-[10px] font-mono text-slate-500">E = V / d</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">แรงดันไฟฟ้า (V):</label>
                        <input type="number" id="calc-volt-val" value="100" oninput="calcGelField()" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 font-mono">
                    </div>
                    <div>
                        <label class="text-[11px] text-slate-400 block mb-1">ระยะห่างขั้ว d (cm):</label>
                        <input type="number" id="calc-dist-val" value="20" oninput="calcGelField()" class="w-full px-3 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-sm text-white focus:outline-none focus:border-emerald-500 font-mono">
                    </div>
                    <div class="p-2.5 rounded-lg bg-slate-900 border border-slate-800 text-xs flex flex-col justify-center">
                        <span class="text-slate-400 text-[11px]">ความเข้มสนามไฟฟ้า (E):</span>
                        <strong id="calc-efield-res" class="text-emerald-400 font-mono text-base">5.00 V/cm</strong>
                        <span class="text-[10px] text-emerald-300">เกณฑ์มาตรฐานที่ปลอดภัยต่อเจล</span>
                    </div>
                </div>
            </div>
        `;
    }

    container.innerHTML = `
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 border-b border-slate-800 pb-5">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center font-black text-3xl shadow-xl border shrink-0 backdrop-blur-sm transition-transform duration-300 hover:scale-105" style="background-color: ${u.color}20; color: ${u.color}; border-color: ${u.color}60;">
                    ${u.sym}
                </div>
                <div>
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <h4 class="text-xl sm:text-2xl font-black text-white tracking-tight">${u.name_th} (${u.name_en})</h4>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono font-bold bg-cyan-950/80 text-cyan-300 border border-cyan-500/40 shadow-inner">
                            <i class="fa-solid fa-atom text-[10px] text-cyan-400"></i>
                            <span>$\\mathrm{${u.sym}} = ${u.formula_si}$</span>
                        </div>
                    </div>
                    <div class="text-xs font-bold text-slate-300 mt-1.5 flex items-center gap-2.5 flex-wrap">
                        <span><i class="fa-solid fa-tag text-emerald-400 mr-1"></i> ${u.qty_th}</span>
                        <span class="text-slate-600">•</span>
                        <span>หมวดหมู่: <strong style="color: ${u.color};">${u.domain_name}</strong></span>
                    </div>
                    <div class="mt-2.5 flex items-center gap-1.5 flex-wrap">
                        <span class="text-[10px] font-mono text-slate-400 uppercase tracking-wider mr-1">ประกอบจาก:</span>
                        ${parentBadges}
                    </div>
                </div>
            </div>
            <div class="px-4 py-2.5 rounded-xl bg-slate-900/90 border border-slate-800 text-right self-start shadow-lg backdrop-blur-sm min-w-[200px]">
                <span class="text-[10px] text-slate-400 font-mono font-semibold block uppercase tracking-wider mb-1">
                    <i class="fa-solid fa-link text-indigo-400 mr-1"></i> นิยามอนุพัทธ์สากล (Coherent)
                </span>
                <div class="text-sm sm:text-base font-black font-mono text-emerald-300 overflow-x-auto">
                    $1\\text{ ${u.sym}} = ${u.formula_coherent}$
                </div>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-5">
            <!-- Left: Microbiology Application Case Study -->
            <div class="p-4 sm:p-5 rounded-xl bg-slate-950/70 border border-slate-800 space-y-2.5">
                <h5 class="text-xs font-bold text-emerald-300 flex items-center gap-1.5">
                    <i class="fa-solid fa-microscope text-emerald-400"></i> บทบาทและการประยุกต์ใช้ในห้องปฏิบัติการจุลชีววิทยา:
                </h5>
                <p class="text-xs sm:text-[13px] text-slate-300 leading-relaxed">
                    ${u.micro_app}
                </p>
                <div class="p-3 rounded-lg bg-emerald-950/25 border border-emerald-900/50 text-[11px] sm:text-xs text-emerald-200/90 flex items-start gap-2.5 mt-2">
                    <i class="fa-solid fa-lightbulb text-amber-400 mt-0.5 text-xs shrink-0"></i>
                    <span><strong>ข้อควรจำทางมาตรวิทยา:</strong> ${u.lab_note}</span>
                </div>
            </div>

            <!-- Right: Mathematical Formulation -->
            <div class="p-4 sm:p-5 rounded-xl bg-slate-950/70 border border-slate-800 space-y-2.5">
                <div class="flex items-center justify-between">
                    <h5 class="text-xs font-bold text-cyan-300 flex items-center gap-1.5">
                        <i class="fa-solid fa-square-root-variable text-cyan-400"></i> สมการฟิสิกส์จุลทรรศน์ที่เกี่ยวข้อง:
                    </h5>
                    <span class="text-[10px] font-mono text-slate-500">Biophysical Formula</span>
                </div>
                <div class="p-3.5 sm:p-4 rounded-xl bg-gradient-to-r from-slate-900 via-slate-900/90 to-slate-900 border border-cyan-500/30 text-center font-mono text-sm sm:text-base text-cyan-200 overflow-x-auto min-h-[62px] flex items-center justify-center shadow-inner">
                    $$${u.physics_eq}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    ความเที่ยงตรงของการทดลองขึ้นอยู่กับการสอบเทียบเครื่องมือวัดตามหน่วยฐาน SI เพื่อลดความไม่แน่นอน ($U_{95}$) ให้ต่ำกว่าเกณฑ์ควบคุมคุณภาพ
                </p>
            </div>
        </div>

        ${calcHtml}
    `;
}

// Live Mini Calculator Functions
function calcEnzymeKat(source) {
    const uInput = document.getElementById('calc-u-val');
    const nkatInput = document.getElementById('calc-nkat-val');
    const resBox = document.getElementById('calc-kat-result');
    if (!uInput || !nkatInput) return;

    if (source === 'u') {
        const u = parseFloat(uInput.value) || 0;
        const nkat = u * 16.6667;
        nkatInput.value = nkat.toFixed(2);
        if (resBox) resBox.innerText = `${u.toFixed(2)} U = ${nkat.toLocaleString('en-US', {maximumFractionDigits: 2})} nkat (หรือ ${(nkat/1000).toFixed(4)} µkat = ${(nkat*1e-9).toExponential(3)} mol/s)`;
    } else {
        const nkat = parseFloat(nkatInput.value) || 0;
        const u = nkat / 16.6667;
        uInput.value = u.toFixed(2);
        if (resBox) resBox.innerText = `${u.toFixed(2)} U = ${nkat.toLocaleString('en-US', {maximumFractionDigits: 2})} nkat (หรือ ${(nkat/1000).toFixed(4)} µkat = ${(nkat*1e-9).toExponential(3)} mol/s)`;
    }
}

function calcAutoclavePressure(tempVal) {
    const tempDisp = document.getElementById('calc-temp-disp');
    const gaugeEl = document.getElementById('calc-pa-gauge');
    const absEl = document.getElementById('calc-pa-abs');
    if (tempDisp) tempDisp.innerText = tempVal + '°C';

    const T = parseFloat(tempVal);
    // Saturated water vapor pressure approximation in kPa
    const pAbs = 0.61078 * Math.exp((17.27 * T) / (T + 237.3)) * 10; // rough kPa formula
    // More accurate steam table empirical formula around 100-135°C:
    // P_sat(121°C) approx 204.9 kPa abs -> 103.6 kPa gauge
    const P_abs_kpa = Math.pow(T / 100, 4) * 101.325;
    const P_gauge_kpa = Math.max(0, P_abs_kpa - 101.325);
    const P_gauge_psi = P_gauge_kpa * 0.145038;
    const P_abs_psi = P_abs_kpa * 0.145038;

    if (gaugeEl) gaugeEl.innerText = `${P_gauge_kpa.toFixed(1)} kPa (${P_gauge_psi.toFixed(1)} psi)`;
    if (absEl) absEl.innerText = `${P_abs_kpa.toFixed(1)} kPa (${P_abs_psi.toFixed(1)} psi)`;
}

function calcCentrifugeRcf() {
    const rpmVal = parseFloat(document.getElementById('calc-rpm-val')?.value) || 0;
    const rVal = parseFloat(document.getElementById('calc-radius-val')?.value) || 0;
    const resEl = document.getElementById('calc-rcf-res');
    if (!resEl) return;

    const rcf = 1.118e-5 * rVal * Math.pow(rpmVal, 2);
    resEl.innerText = `${Math.round(rcf).toLocaleString('en-US')} ×g`;
}

function calcGelField() {
    const vVal = parseFloat(document.getElementById('calc-volt-val')?.value) || 0;
    const dVal = parseFloat(document.getElementById('calc-dist-val')?.value) || 1;
    const resEl = document.getElementById('calc-efield-res');
    if (!resEl) return;

    const eField = vVal / dVal;
    resEl.innerText = `${eField.toFixed(2)} V/cm`;
}

function filterSiDomain(domain, btn) {
    document.querySelectorAll('.si-domain-btn').forEach(b => {
        b.className = 'si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-slate-800 text-slate-400 border border-slate-700 hover:text-slate-200';
    });
    if (btn) {
        btn.className = 'si-domain-btn px-2.5 py-1 rounded-lg text-[11px] font-bold transition bg-emerald-500/20 text-emerald-300 border border-emerald-500/50';
    }

    if (domain === 'all') {
        renderDerivedUnitsGrid(SI_DERIVED_DATA);
    } else {
        const filtered = SI_DERIVED_DATA.filter(u => u.domain === domain);
        renderDerivedUnitsGrid(filtered);
    }
}

function searchSiUnits(q) {
    const query = q.trim().toLowerCase();
    if (!query) {
        renderDerivedUnitsGrid(SI_DERIVED_DATA);
        return;
    }

    const filtered = SI_DERIVED_DATA.filter(u => 
        u.sym.toLowerCase().includes(query) ||
        u.name_en.toLowerCase().includes(query) ||
        u.name_th.toLowerCase().includes(query) ||
        u.qty_th.toLowerCase().includes(query) ||
        u.micro_app.toLowerCase().includes(query) ||
        u.domain_name.toLowerCase().includes(query)
    );
    renderDerivedUnitsGrid(filtered);
    if (filtered.length > 0) {
        selectSiUnit(filtered[0].id);
    }
}

// Auto init on page load
document.addEventListener('DOMContentLoaded', () => {
    initSiInteractiveMetrology();
});
if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(initSiInteractiveMetrology, 50);
}
if (window.MathJax && MathJax.startup && MathJax.startup.promise) {
    MathJax.startup.promise.then(() => {
        const card = document.getElementById('si-inspector-card');
        if (card) retypesetMathJax(card);
    });
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
