<?php
$pageTitle = "ปฏิบัติการที่ 3: กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ | Lab 3: Newton's Laws & Falling-Sphere Viscometer";
$basePath = '../';
include '../includes/header.php';
?>

    <!-- 🧭 Standardized Breadcrumb & Two-Way Course Navigation Bar -->
    <div class="standardized-lab-breadcrumb max-w-7xl mx-auto px-4 sm:px-6 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-emerald-500/30 rounded-2xl px-5 py-3.5 shadow-2xl backdrop-blur-xl">
            <div class="flex items-center flex-wrap gap-2 text-xs font-mono text-slate-300">
                <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold flex items-center gap-1.5 transition">
                    <i class="fa-solid fa-house"></i> พอร์ทัลหลัก 2027
                </a>
                <span class="text-slate-600">/</span>
                <a href="../index.php" class="text-amber-400 hover:text-amber-300 transition flex items-center gap-1 font-semibold">
                    <i class="fa-solid fa-book-open"></i> สารบัญหลักสูตร
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 03</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch03_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 3</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=3" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=3&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 2)</span>
                </a>
            </div>
        </div>
    </div>


<!-- Tailwind CSS CDN & Fonts -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="min-h-screen bg-slate-950 text-slate-100 font-sans pb-16">

    <!-- Hero Header -->
    <section class="relative border-b border-white/10 bg-gradient-to-b from-slate-900 via-slate-950 to-slate-950 pt-8 pb-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/2 -left-24 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto space-y-4 relative z-10">
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-3 py-1 rounded-full text-xs font-bold font-mono bg-sky-500/20 text-sky-300 border border-sky-500/30 flex items-center gap-1.5">
                    <i class="fa-solid fa-droplet"></i> LAB 03
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-medium bg-slate-800 text-slate-300 border border-white/10">
                    ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology)
                </span>
                <span class="px-3 py-1 rounded-full text-xs font-mono bg-amber-500/10 text-amber-300 border border-amber-500/20">
                    Stokes' Viscosity &amp; Terminal Velocity
                </span>
            </div>

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight">
                ปฏิบัติการที่ 3: <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-indigo-300">กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ</span>
            </h1>

            <p class="text-sm sm:text-base text-slate-300 max-w-4xl leading-relaxed">
                ศึกษาการเคลื่อนที่ภายใต้แรงโน้มถ่วง แรงพยุง และแรงหนืดตามกฎของสโตกส์ (Stokes' Law) เมื่อวัตถุเคลื่อนที่ด้วยอัตราเร็วสุดท้ายคงที่ (Terminal Velocity, $v_t$) ด้วยเครื่องวัดความหนืดลูกกลมตก (Falling-Sphere Viscometer) ควบคู่กับระบบเซนเซอร์โฟโตเกตเลเซอร์คู่ พร้อมเชื่อมโยงสู่การตกตะกอนของเซลล์จุลินทรีย์และการออกแบบบ่อตกตะกอนในงานสิ่งแวดล้อม
            </p>

            <!-- Learning Objectives Pill Matrix -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2 text-xs font-mono">
                <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 flex items-start gap-2.5">
                    <i class="fa-solid fa-crosshairs text-sky-400 mt-0.5"></i>
                    <div>
                        <div class="font-bold text-white">CLO1: สมดุลแรง 3 แรง</div>
                        <div class="text-slate-400 text-[11px]">วิเคราะห์ $\sum F = F_g - (F_b + F_d) = 0$ เมื่อเข้าสู่อัตราเร็วคงที่</div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 flex items-start gap-2.5">
                    <i class="fa-solid fa-stopwatch text-teal-400 mt-0.5"></i>
                    <div>
                        <div class="font-bold text-white">CLO2: โฟโตเกตเลเซอร์คู่</div>
                        <div class="text-slate-400 text-[11px]">จับเวลาการตกผ่านระยะ $20.0\text{ cm}$ และหาค่าความหนืด $\eta$</div>
                    </div>
                </div>
                <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 flex items-start gap-2.5">
                    <i class="fa-solid fa-bacteria text-amber-400 mt-0.5"></i>
                    <div>
                        <div class="font-bold text-white">CLO3: ประยุกต์จุลชีววิทยา</div>
                        <div class="text-slate-400 text-[11px]">ทำนายการตกตะกอนของสปอร์ แบคทีเรีย ยีสต์ และบ่อตกตะกอน TSS</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 space-y-8">

        <!-- 3D Simulator Interactive Workspace Section -->
        <section class="space-y-3">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                    <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                        <i class="fa-solid fa-cube text-sky-400"></i> ห้องปฏิบัติการ 3D เสมือนจริง (Falling-Sphere Viscometer Simulator)
                    </h2>
                </div>

                <div class="flex items-center gap-2">
                    <a href="../webar/ar_aruco_textbook.html?lab=3&ar=1" target="_blank" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-2 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 2">
                        <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                    </a>
                    <button type="button" onclick="capture3dSimulator()" class="px-3.5 py-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:brightness-110 text-slate-950 text-xs font-bold shadow-lg shadow-emerald-500/20 transition flex items-center gap-1.5">
                        <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
                    </button>
                    <button type="button" onclick="toggleSimContainer()" id="btnToggleSimContainer" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายหน้าจอ 3D Simulator">
                        <i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>
                    </button>
                    <button type="button" onclick="openSimulatorFullscreen()" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition" title="เปิดเต็มจอ">
                        <i class="fa-solid fa-expand"></i>
                    </button>
                    <a id="btnSimNewTab" href="../simulations/sim03_viscometer_3d.html" target="_blank" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="เปิดในแท็บใหม่">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
            </div>

            <!-- Iframe Viewer Container -->
            <div id="simFrameContainer" class="relative w-full rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-slate-950">
                <iframe id="simViewerFrame" src="../simulations/sim03_viscometer_3d.html" class="w-full h-[680px] sm:h-[720px] lg:h-[760px] border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
            </div>

            <!-- Quick Tips Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-1">
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                    <div class="font-bold text-sky-400 flex items-center gap-1.5">
                        <i class="fa-solid fa-arrows-spin"></i> การควบคุมมุมมอง 3D
                    </div>
                    <p class="text-slate-400 text-[11px]">คลิกซ้ายค้างแล้วลากเพื่อหมุน 360°, คลิกขวาค้างเพื่อเลื่อนตำแหน่งมุมมอง, เลื่อนล้อเมาส์เพื่อซูมเข้า-ออก</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                    <div class="font-bold text-teal-400 flex items-center gap-1.5">
                        <i class="fa-solid fa-stopwatch"></i> โฟโตเกตเลเซอร์คู่ &amp; Meniscus
                    </div>
                    <p class="text-slate-400 text-[11px]">เซนเซอร์โฟโตเกตเลเซอร์แดงจะเริ่มนับเวลา $\Delta t$ อัตโนมัติเมื่อลูกกลมผ่านเกตบน และหยุดเวลาเมื่อผ่านเกตล่าง ระยะห่างคงที่ $20.0\text{ cm}$</p>
                </div>
                <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                    <div class="font-bold text-amber-400 flex items-center gap-1.5">
                        <i class="fa-solid fa-microscope"></i> เลนส์ขยาย Micro-Loupe 1000x
                    </div>
                    <p class="text-slate-400 text-[11px]">สังเกตเวกเตอร์แรงลัพธ์ $\vec{F}_g, \vec{F}_b, \vec{F}_d$ เกาะติดกับลูกกลมและเส้นกระแสการไหลแบบลามินาร์ $Re \ll 1$ แบบเรียลไทม์</p>
                </div>
            </div>
        </section>

        <!-- Academic Foundations & Mathematical Equations Suite -->
        <div class="bg-slate-900/90 border border-sky-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-sky-500/10 text-sky-400 border border-sky-500/30 font-mono">
                        <i class="fa-solid fa-square-root-variable"></i> Newton's Laws &amp; Stokes' Viscometry Foundations
                    </div>
                    <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                        หลักการและสมการฟิสิกส์พื้นฐาน (Theoretical Formulations)
                    </h2>
                    <p class="text-xs text-slate-400">
                        กฎการเคลื่อนที่ของนิวตัน พลศาสตร์ของไหลตามกฎของสโตกส์ และการวิเคราะห์การตกตะกอนในงานจุลชีววิทยาสิ่งแวดล้อม
                    </p>
                </div>
                <button type="button" onclick="toggleMathDetails('mathSuiteLab03')" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-sky-400 border border-sky-500/30 transition flex items-center gap-2 self-start sm:self-auto">
                    <span id="mathSuiteLab03BtnText">ย่อ/ขยายสมการ</span> <i class="fa-solid fa-chevron-down text-xs"></i>
                </button>
            </div>

            <div id="mathSuiteLab03" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <!-- Card 1: Newton's 2nd Law & Terminal Velocity -->
                <div class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/20 space-y-3.5 hover:border-sky-500/40 transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-sky-300 font-mono flex items-center gap-1.5">
                            <i class="fa-solid fa-apple-whole text-sky-400"></i> ตอนที่ 1: กฎการเคลื่อนที่ของนิวตัน
                        </span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 font-mono border border-sky-500/20">Eq. 3.1–3.2</span>
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        ขณะลูกกลมตกในของเหลว มี 3 แรงกระทำ: แรงโน้มถ่วง ($F_g$), แรงลอยตัว ($F_b$), และแรงหนืด ($F_d$):
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                        $$m \frac{dv}{dt} = F_g - F_b - F_d(v) \tag{3.1}$$
                        $$m g - \rho_f V g - 6\pi \eta r v = m a$$
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        เมื่อความเร่งเป็นศูนย์ ($a = 0$) วัตถุจะเคลื่อนที่ด้วยอัตราเร็วคงที่ (Terminal Velocity, $v_t$):
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                        $$\sum F_y = 0 \iff F_g = F_b + F_d(v_t) \tag{3.2}$$
                    </div>
                </div>

                <!-- Card 2: Stokes' Viscosity & Ladenburg Correction -->
                <div class="p-5 rounded-2xl bg-slate-950/80 border border-teal-500/20 space-y-3.5 hover:border-teal-500/40 transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-teal-300 font-mono flex items-center gap-1.5">
                            <i class="fa-solid fa-droplet text-teal-400"></i> ตอนที่ 2: ความหนืดและการปรับแก้ผนัง
                        </span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-teal-500/10 text-teal-400 font-mono border border-teal-500/20">Eq. 3.3–3.5</span>
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        อัตราเร็วสุดท้ายที่วัดได้จากโฟโตเกต ($v_t = h/t_{\text{avg}}$) นำไปคำนวณสัมประสิทธิ์ความหนืด ($\eta$):
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-teal-200">
                        $$\eta = \frac{2 r^2 (\rho_s - \rho_f) g}{9 v_t} \tag{3.3}$$
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        การปรับแก้ผลกระทบจากผนังทรงกระบอก (Ladenburg / Faxén Wall Effect Correction):
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-teal-200">
                        $$\eta_{\text{corrected}} = \frac{\eta_{\text{measured}}}{1 + 2.4 (d / D)} \tag{3.4}$$
                    </div>
                </div>

                <!-- Card 3: Linear Regression & Microbial Sedimentation -->
                <div class="p-5 rounded-2xl bg-slate-950/80 border border-amber-500/20 space-y-3.5 hover:border-amber-500/40 transition">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-amber-300 font-mono flex items-center gap-1.5">
                            <i class="fa-solid fa-chart-line text-amber-400"></i> ตอนที่ 3: กราฟถดถอยและบ่อตกตะกอน
                        </span>
                        <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-mono border border-amber-500/20">Eq. 3.6–3.8</span>
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        ความสัมพันธ์ระหว่าง $v_t$ กับกำลังสองของรัศมี $r^2$ เป็นเส้นตรงที่มีความชัน $m$:
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                        $$v_t = \left[ \frac{2(\rho_s - \rho_f)g}{9\eta} \right] r^2 \implies \eta = \frac{2(\rho_s - \rho_f)g}{9 \times \text{Slope}} \tag{3.5}$$
                    </div>
                    <p class="text-[11px] text-slate-400 leading-relaxed">
                        การออกแบบบ่อตกตะกอนชีวภาพ (Surface Overflow Rate, SOR) สำหรับอนุภาคแขวนลอย (TSS):
                    </p>
                    <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                        $$\text{SOR} = \frac{Q}{A_{\text{basin}}} \le v_t, \quad t_{\text{settling}} = \frac{H}{v_t} \tag{3.6}$$
                    </div>
                </div>
            </div>
        </div>

        <!-- Master Section Quick Action & Collapse/Expand Bar -->
        <div id="masterLabToolbar" class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-white/10 p-3.5 sm:p-4 rounded-3xl shadow-xl backdrop-blur-xl">
            <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
                <span class="w-2.5 h-2.5 rounded-full bg-sky-400 animate-pulse"></span>
                <span class="font-bold text-white">แผงควบคุมการแสดงผลรายงาน:</span>
                <span class="text-slate-400 hidden sm:inline">สามารถคลิกปุ่มย่อ/ขยายในแต่ละการ์ด หรือควบคุมทุกส่วนได้พร้อมกัน</span>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" onclick="expandAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-sky-400 border border-sky-500/30 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                    <i class="fa-solid fa-angles-down text-xs"></i> <span>ขยายทุกการ์ด</span>
                </button>
                <button type="button" onclick="collapseAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                    <i class="fa-solid fa-angles-up text-xs"></i> <span>ย่อทุกการ์ด</span>
                </button>
            </div>
        </div>

        <!-- Form: Student E-Report Submission -->
        <form id="labReportForm" onsubmit="handleReportSubmit(event)" class="space-y-8">

            <!-- Section 1: Student Identification (Strict Requirement) -->
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                        <i class="fa-solid fa-id-card text-sky-400"></i> 1. ข้อมูลระบุตัวตนของนักศึกษา (Student Identification)
                    </h2>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-rose-400 font-mono hidden sm:inline">* บังคับกรอกทุกช่อง</span>
                        <button type="button" onclick="toggleCardSection('secStudentId_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                            <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                        </button>
                    </div>
                </div>

                <div id="secStudentId_body" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs font-mono transition-all">
                    <div class="space-y-1.5">
                        <label for="student_fullname" class="text-slate-300 font-sans font-medium">ชื่อ - นามสกุล นักศึกษา <span class="text-rose-400">*</span></label>
                        <input type="text" id="student_fullname" name="student_fullname" required placeholder="เช่น นายสมชาย ใจมั่นคง" class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 focus:ring-1 focus:ring-sky-400 rounded-xl px-3 py-2.5 text-white outline-none transition">
                    </div>

                    <div class="space-y-1.5">
                        <label for="student_id" class="text-slate-300 font-sans font-medium">รหัสประจำตัวนักศึกษา <span class="text-rose-400">*</span></label>
                        <input type="text" id="student_id" name="student_id" required maxlength="15" placeholder="เช่น 67144001" class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 focus:ring-1 focus:ring-sky-400 rounded-xl px-3 py-2.5 text-white outline-none transition">
                    </div>

                    <div class="space-y-1.5">
                        <label for="student_program" class="text-slate-300 font-sans font-medium">สาขาวิชา / หลักสูตร <span class="text-rose-400">*</span></label>
                        <input type="text" id="student_program" name="student_program" value="สาขาวิชาจุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 focus:ring-1 focus:ring-sky-400 rounded-xl px-3 py-2.5 text-white outline-none transition">
                    </div>

                    <div class="space-y-1.5">
                        <label for="student_section" class="text-slate-300 font-sans font-medium">กลุ่มเรียน / ตอนเรียน (Section) <span class="text-rose-400">*</span></label>
                        <input type="text" id="student_section" name="student_section" required placeholder="เช่น Sec 01 (กลุ่มที่ 2)" class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 focus:ring-1 focus:ring-sky-400 rounded-xl px-3 py-2.5 text-white outline-none transition">
                    </div>
                </div>
            </div>

            <!-- Section 2: Experimental Snapshot Evidence (Mandatory Proof) -->
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-4">
                <div class="flex flex-wrap items-center justify-between gap-2 border-b border-white/10 pb-3">
                    <div>
                        <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                            <i class="fa-solid fa-camera text-emerald-400"></i> 2. หลักฐานภาพถ่ายหน้าจอ 3D ระหว่างการทดลอง (Mandatory Proof)
                        </h2>
                        <p class="text-xs text-slate-400 font-sans mt-0.5">
                            ต้องมีภาพแคปหน้าจอ 3D Simulator ขณะทำการทดลองวัดเวลาตกและอัตราเร็วสุดท้ายแนบมาด้วยเสมอ
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span id="proofBadgeStatus" class="px-2.5 py-1 rounded-full text-xs font-mono bg-rose-500/20 text-rose-300 border border-rose-500/30 font-bold">
                            ⚠️ ยังไม่ได้แนบภาพหลักฐาน
                        </span>
                        <button type="button" onclick="toggleCardSection('secEvidence_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                            <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                        </button>
                    </div>
                </div>
                <div id="secEvidence_body" class="space-y-4 transition-all">

                <!-- Hidden Input holding Base64 image payload -->
                <input type="hidden" id="image_proof_base64" name="image_proof_base64" required>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <!-- Image Preview Area -->
                    <div id="proofPreviewContainer" class="w-full h-56 rounded-2xl bg-slate-950 border-2 border-dashed border-white/15 flex flex-col items-center justify-center p-3 overflow-hidden relative group">
                        <img id="proofPreviewImg" src="" alt="3D Simulation Proof" class="w-full h-full object-contain hidden rounded-xl">
                        <div id="proofPlaceholder" class="text-center space-y-2 text-slate-500">
                            <i class="fa-solid fa-image text-3xl opacity-50"></i>
                            <div class="text-xs">ยังไม่มีภาพหลักฐานการทดลอง</div>
                            <div class="text-[10px] text-slate-600">กดปุ่มแคปภาพด้านขวา หรืออัปโหลดไฟล์ภาพหน้าจอ</div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="space-y-3 text-xs">
                        <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:brightness-110 text-slate-950 font-bold shadow-lg shadow-emerald-500/20 transition flex items-center justify-center gap-2 text-sm">
                            <i class="fa-solid fa-camera"></i> แคปภาพหน้าจอจาก 3D Simulator อัตโนมัติ
                        </button>
                        
                        <div class="relative">
                            <input type="file" id="manualImageFileInput" accept="image/*" onchange="handleImageFileUpload(event)" class="hidden">
                            <button type="button" onclick="document.getElementById('manualImageFileInput').click()" class="w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-medium border border-white/10 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-upload"></i> อัปโหลดไฟล์ภาพถ่าย / แคปหน้าจอด้วยตนเอง
                            </button>
                        </div>
                        <p class="text-[11px] text-slate-500 italic">
                            *ระบบจะทำการแปลงภาพเป็น Base64 และส่งบันทึกลงฐานข้อมูล SQLite พร้อมเชื่อมโยงกับ Google Sheets
                        </p>
                    </div>
                </div>
                </div>
            </div>

            <!-- Section 3: Interactive Blank Data Tables -->
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-6">
                <div class="border-b border-white/10 pb-3 flex flex-wrap items-center justify-between gap-2">
                    <div>
                        <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                            <i class="fa-solid fa-table text-amber-400"></i> 3. ตารางบันทึกผลการทดลอง (Strict Blank Data Tables)
                        </h2>
                        <p class="text-xs text-slate-400 font-sans mt-0.5">
                            ให้นักศึกษาบันทึกค่าวัดและคำนวณที่อ่านได้จาก 3D Viscometer Simulator ห้ามเว้นช่องว่าง
                        </p>
                    </div>
                    <span class="text-xs text-amber-300 font-mono bg-amber-500/10 px-2.5 py-1 rounded-full border border-amber-500/20">
                        100% Student Blank Entries
                    </span>
                </div>

                <!-- Table 3.1: Dimensions & Physical Properties -->
                <div class="space-y-3">
                    <h3 class="text-xs font-bold text-sky-400 font-mono">
                        ตารางที่ 3.1: การวัดขนาด เส้นผ่านศูนย์กลาง และปริมาตรของลูกกลมโลหะ (Sphere Dimensions &amp; Properties)
                    </h3>
                    
                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-sky-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left min-w-[130px]">ขนาดลูกกลม</th>
                                    <th class="p-3 min-w-[100px]">เส้นผ่านศูนย์กลาง $d$ (mm)</th>
                                    <th class="p-3 min-w-[100px]">รัศมี $r = d/2$ (mm)</th>
                                    <th class="p-3 min-w-[100px]">รัศมี $r^2$ (mm²)</th>
                                    <th class="p-3 min-w-[110px]">ปริมาตร $V$ (m³)</th>
                                    <th class="p-3 min-w-[95px]">มวล $m$ (g)</th>
                                    <th class="p-3 min-w-[115px]">ความหนาแน่น $\rho_p$ (kg/m³)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                                <!-- Small Ball -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">1. ลูกกลมขนาดเล็ก</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r1_d" placeholder="2.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r1_r" placeholder="1.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r1_rsq" placeholder="1.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t1_r1_vol" placeholder="4.19e-9" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t1_r1_mass" placeholder="0.0326" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="1" id="t1_r1_density" placeholder="7800" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                </tr>
                                <!-- Medium Ball -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">2. ลูกกลมขนาดกลาง</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r2_d" placeholder="3.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r2_r" placeholder="1.50" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r2_rsq" placeholder="2.25" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t1_r2_vol" placeholder="1.41e-8" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t1_r2_mass" placeholder="0.1102" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="1" id="t1_r2_density" placeholder="7800" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                </tr>
                                <!-- Large Ball -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">3. ลูกกลมขนาดใหญ่</td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r3_d" placeholder="4.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r3_r" placeholder="2.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.01" id="t1_r3_rsq" placeholder="4.00" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t1_r3_vol" placeholder="3.35e-8" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t1_r3_mass" placeholder="0.2612" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="1" id="t1_r3_density" placeholder="7800" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 3.2: Falling Time & Terminal Velocity -->
                <div class="space-y-3 pt-3">
                    <h3 class="text-xs font-bold text-teal-400 font-mono">
                        ตารางที่ 3.2: การจับเวลาการตกผ่านระยะ $s = 20.0\text{ cm}$ และอัตราเร็วสุดท้าย ($v_t$) ในกลีเซอรีน 100%
                    </h3>
                    
                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-teal-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left min-w-[130px]">ขนาดลูกกลม</th>
                                    <th class="p-3 min-w-[90px]">ระยะตก $s$ (m)</th>
                                    <th class="p-3 min-w-[85px]">เวลา $t_1$ (s)</th>
                                    <th class="p-3 min-w-[85px]">เวลา $t_2$ (s)</th>
                                    <th class="p-3 min-w-[85px]">เวลา $t_3$ (s)</th>
                                    <th class="p-3 min-w-[95px]">เวลาเฉลี่ย $\bar{t}$ (s)</th>
                                    <th class="p-3 min-w-[110px]">อัตราเร็วทดลอง $v_{\text{exp}}$ (m/s)</th>
                                    <th class="p-3 min-w-[110px]">อัตราเร็วทฤษฎี $v_{\text{th}}$ (m/s)</th>
                                    <th class="p-3 min-w-[85px]">%Error</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                                <!-- Small -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">ลูกกลมเล็ก ($r = 1.0\text{ mm}$)</td>
                                    <td class="p-3 text-slate-400">0.200</td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r1_t1" placeholder="2.46" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r1_t2" placeholder="2.45" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r1_t3" placeholder="2.47" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r1_tavg" placeholder="2.460" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r1_vexp" placeholder="0.0813" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r1_vth" placeholder="0.0815" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t2_r1_err" placeholder="0.25%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-teal-400 outline-none"></td>
                                </tr>
                                <!-- Medium -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">ลูกกลมกลาง ($r = 1.5\text{ mm}$)</td>
                                    <td class="p-3 text-slate-400">0.200</td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r2_t1" placeholder="1.09" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r2_t2" placeholder="1.10" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r2_t3" placeholder="1.09" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r2_tavg" placeholder="1.093" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r2_vexp" placeholder="0.1830" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r2_vth" placeholder="0.1834" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t2_r2_err" placeholder="0.22%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-teal-400 outline-none"></td>
                                </tr>
                                <!-- Large -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">ลูกกลมใหญ่ ($r = 2.0\text{ mm}$)</td>
                                    <td class="p-3 text-slate-400">0.200</td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r3_t1" placeholder="0.62" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r3_t2" placeholder="0.61" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r3_t3" placeholder="0.62" required class="w-full bg-slate-900 border border-white/15 focus:border-teal-400 rounded-lg px-2 py-1.5 text-center text-xs text-teal-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t2_r3_tavg" placeholder="0.617" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r3_vexp" placeholder="0.3241" required class="w-full bg-slate-950 border border-teal-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t2_r3_vth" placeholder="0.3260" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                    <td class="p-2"><input type="text" id="t2_r3_err" placeholder="0.58%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-teal-400 outline-none"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table 3.3: Biological Fluids & Microbial Viscosity Determination -->
                <div class="space-y-3 pt-3">
                    <h3 class="text-xs font-bold text-amber-400 font-mono">
                        ตารางที่ 3.3: การคำนวณสัมประสิทธิ์ความหนืด $\eta$ ของของเหลวชีวภาพและจุลินทรีย์
                    </h3>
                    
                    <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead class="bg-slate-950 text-amber-400 font-bold border-b border-white/10">
                                <tr>
                                    <th class="p-3 text-left min-w-[160px]">สารของเหลว / ตัวอย่าง</th>
                                    <th class="p-3 min-w-[120px]">ความหนาแน่น $\rho_f$ (kg/m³)</th>
                                    <th class="p-3 min-w-[110px]">อัตราเร็วเฉลี่ย $\bar{v}$ (m/s)</th>
                                    <th class="p-3 min-w-[120px]">ความหนืดทดลอง $\eta_{\text{exp}}$ (Pa·s)</th>
                                    <th class="p-3 min-w-[120px]">ความหนืดอ้างอิง $\eta_{\text{ref}}$ (Pa·s)</th>
                                    <th class="p-3 min-w-[90px]">%Error</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                                <!-- Glycerin 100% -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">1. กลีเซอรีนบริสุทธิ์ 100%</td>
                                    <td class="p-3 text-slate-400">1260</td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t3_r1_v" placeholder="0.0813" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t3_r1_etaexp" placeholder="1.415" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-3 text-slate-400 font-bold">1.412</td>
                                    <td class="p-2"><input type="text" id="t3_r1_err" placeholder="0.21%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 outline-none"></td>
                                </tr>
                                <!-- Castor Oil -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">2. น้ำมันละหุ่ง (Castor Oil)</td>
                                    <td class="p-3 text-slate-400">961</td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t3_r2_v" placeholder="0.1235" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t3_r2_etaexp" placeholder="0.988" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-3 text-slate-400 font-bold">0.985</td>
                                    <td class="p-2"><input type="text" id="t3_r2_err" placeholder="0.30%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 outline-none"></td>
                                </tr>
                                <!-- Glycerin 80% -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">3. สารละลายกลีเซอรีน 80%</td>
                                    <td class="p-3 text-slate-400">1208</td>
                                    <td class="p-2"><input type="number" step="0.0001" id="t3_r3_v" placeholder="1.912" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t3_r3_etaexp" placeholder="0.0604" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-3 text-slate-400 font-bold">0.0601</td>
                                    <td class="p-2"><input type="text" id="t3_r3_err" placeholder="0.50%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 outline-none"></td>
                                </tr>
                                <!-- Spore in Broth -->
                                <tr class="hover:bg-white/5 transition">
                                    <td class="p-3 text-left font-medium text-white font-sans">4. สปอร์ *B. subtilis* ในน้ำเลี้ยงเชื้อ</td>
                                    <td class="p-3 text-slate-400">1150</td>
                                    <td class="p-2"><input type="number" step="0.00001" id="t3_r4_v" placeholder="0.00017" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                    <td class="p-2"><input type="number" step="0.001" id="t3_r4_etaexp" placeholder="0.252" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                    <td class="p-3 text-slate-400 font-bold">0.250</td>
                                    <td class="p-2"><input type="text" id="t3_r4_err" placeholder="0.80%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-amber-400 outline-none"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Section 4: Detailed Calculations (Strict Requirement) -->
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-3">
                <div class="flex items-center justify-between border-b border-white/10 pb-2">
                    <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                        <i class="fa-solid fa-calculator text-sky-400"></i> 4. การแสดงวิธีคำนวณอย่างละเอียด (Calculations)
                    </h2>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-rose-400 font-mono hidden sm:inline">* บังคับพิมพ์แสดงวิธีทำ</span>
                        <button type="button" onclick="toggleCardSection('secCalculations_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                            <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                        </button>
                    </div>
                </div>
                <div id="secCalculations_body" class="space-y-3 transition-all">
                <p class="text-xs text-slate-400">
                    ให้นักศึกษาแสดงขั้นตอนการคำนวณ: 1) อัตราเร็วสุดท้าย $v_t = h/\bar{t}$ 2) สัมประสิทธิ์ความหนืด $\eta$ และ 3) การปรับแก้ผนังทรงกระบอก $\eta_{\text{corrected}}$ ของลูกกลมขนาดกลางและสารทดสอบ
                </p>

                <!-- Formula Guide Box -->
                <div class="p-4 rounded-2xl bg-slate-950/90 border border-sky-500/30 space-y-2.5">
                    <div class="flex items-center justify-between text-xs font-bold text-sky-400 font-mono">
                        <span><i class="fa-solid fa-book-open"></i> โครงสร้างสูตรคำนวณตามมาตรฐานวิชาการ (Academic Calculation Structure)</span>
                        <span class="text-[10px] text-slate-400">แทนค่าตัวเลขจากตารางลงในกล่องข้อความ</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                        <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                            <span class="font-bold text-teal-400">1. การคำนวณอัตราเร็วสุดท้าย $v_t$:</span>
                            <div class="text-[11px] font-mono text-slate-300">
                                $\bar{t} = \frac{t_1 + t_2 + t_3}{3}\text{ s}, \quad v_t = \frac{h}{\bar{t}} = \frac{0.200\text{ m}}{\bar{t}}\text{ m/s}$<br>
                                $\%Error = \frac{|v_{\text{exp}} - v_{\text{theo}}|}{v_{\text{theo}}} \times 100\%$
                            </div>
                        </div>
                        <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                            <span class="font-bold text-amber-400">2. การคำนวณสัมประสิทธิ์ความหนืด $\eta$:</span>
                            <div class="text-[11px] font-mono text-slate-300">
                                $\eta = \frac{2 r^2 (\rho_s - \rho_f) g}{9 v_t}\text{ Pa}\cdot\text{s}$<br>
                                $\eta_{\text{corrected}} = \frac{\eta}{1 + 2.4 (d/D)} \quad (D = 40.0\text{ mm})$<br>
                                $\eta = \frac{2(\rho_s - \rho_f)g}{9 \times \text{Slope}}$ (จากกราฟ $v_t$ vs $r^2$)
                            </div>
                        </div>
                    </div>
                </div>

                <textarea id="lab_calculations" name="lab_calculations" rows="5" required placeholder="ตัวอย่างการคำนวณ:
1. ลูกกลมขนาดกลาง (r = 1.50 mm = 1.5e-3 m, m = 0.1102 g, s = 0.20 m):
   t_avg = (1.09 + 1.10 + 1.09) / 3 = 1.093 s
   v_exp = 0.20 / 1.093 = 0.1830 m/s
2. คำนวณความหนืดกลีเซอรีน 100%:
   rho_diff = 7800 - 1260 = 6540 kg/m3
   eta = [2 * (1.5e-3)^2 * 6540 * 9.80665] / (9 * 0.1830) * 0.864 = 1.415 Pa·s
   %Error = |1.415 - 1.412| / 1.412 * 100 = 0.21%" class="w-full bg-slate-950 border border-white/15 focus:border-sky-400 focus:ring-1 focus:ring-sky-400 rounded-xl p-3 text-xs font-mono text-white outline-none transition leading-relaxed"></textarea>
                </div>
            </div>

            <!-- Section 5: Discussion & Conclusion -->
            <div id="secDiscussionCard" class="space-y-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-2">
                    <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                        <i class="fa-solid fa-comments text-teal-400"></i> 5. การวิเคราะห์ อภิปรายผล และสรุปผลการทดลอง (Discussion &amp; Conclusion)
                    </h2>
                    <button type="button" onclick="toggleCardSection('secDiscussion_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
                <div id="secDiscussion_body" class="grid grid-cols-1 md:grid-cols-2 gap-6 transition-all">
                <!-- Discussion -->
                <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-3">
                    <div class="flex items-center justify-between border-b border-white/10 pb-2">
                        <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                            <i class="fa-solid fa-comments text-teal-400"></i> 5.1 การวิเคราะห์และอภิปรายผล (Discussion)
                        </h2>
                        <span class="text-xs text-rose-400 font-mono">* บังคับกรอก</span>
                    </div>
                    <textarea id="lab_discussion" name="lab_discussion" rows="6" required placeholder="พิมพ์การอภิปรายผลการทดลอง:
- เปรียบเทียบผลของขนาดรัศมีลูกกลม (r) ต่ออัตราเร็วสุดท้าย (v_t) สอดคล้องกับความสัมพันธ์ v_t แปรผันตรงกับ r² อย่างไร
- ปัจจัยความคลาดเคลื่อนที่อาจเกิดจากการจับเวลาด้วยสายตามนุษย์เทียบกับระบบเซนเซอร์โฟโตเกตเลเซอร์
- ผลกระทบของผนังภาชนะ (Wall effect) และความสำคัญของการใช้ตัวคูณปรับแก้ Faxén" class="w-full bg-slate-950 border border-white/15 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 rounded-xl p-3 text-xs font-mono text-white outline-none transition leading-relaxed"></textarea>
                </div>

                <!-- Conclusion -->
                <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-3">
                    <div class="flex items-center justify-between border-b border-white/10 pb-2">
                        <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                            <i class="fa-solid fa-flag-checkered text-emerald-400"></i> 5.2 การสรุปผลการทดลอง (Conclusion)
                        </h2>
                        <span class="text-xs text-rose-400 font-mono">* บังคับกรอก</span>
                    </div>
                    <textarea id="lab_conclusion" name="lab_conclusion" rows="6" required placeholder="พิมพ์สรุปผลการทดลอง:
- สรุปค่าสัมประสิทธิ์ความหนืดเฉลี่ยของกลีเซอรีน 100% และน้ำมันละหุ่งที่ได้จากการทดลอง
- ยืนยันกฎข้อที่ 1 ของนิวตันเมื่อวัตถุเคลื่อนที่ด้วยอัตราเร็วสุดท้ายคงที่ (แรงดึงลงเท่ากับแรงต้านขึ้น)
- ความสัมพันธ์ระหว่างความหนืดของของเหลวชีวภาพต่อการเคลื่อนที่ของอนุภาคจุลินทรีย์" class="w-full bg-slate-950 border border-white/15 focus:border-emerald-400 focus:ring-1 focus:ring-emerald-400 rounded-xl p-3 text-xs font-mono text-white outline-none transition leading-relaxed"></textarea>
                </div>
            </div>
            </div>
            </div>

            <!-- Section 6: Post-Lab Conceptual & Microbiology Questions -->
            <div class="p-5 sm:p-6 rounded-2xl bg-slate-900/90 border border-white/10 shadow-xl space-y-4">
                <div class="border-b border-white/10 pb-3 flex items-center justify-between">
                    <div>
                        <h2 class="text-sm sm:text-base font-bold text-white flex items-center gap-2 font-mono">
                            <i class="fa-solid fa-circle-question text-amber-400"></i> 6. คำถามท้ายการทดลอง (Post-Lab Questions)
                        </h2>
                        <p class="text-xs text-slate-400 font-sans mt-0.5">
                            ตอบคำถามเชิงทฤษฎีและการประยุกต์ใช้ในทางจุลชีววิทยาและสิ่งแวดล้อมให้ครบถ้วนทั้ง 3 ข้อ
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-rose-400 font-mono hidden sm:inline">* 3 ข้อ บังคับตอบ</span>
                        <button type="button" onclick="toggleCardSection('secQuestions_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                            <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                        </button>
                    </div>
                </div>
                <div id="secQuestions_body" class="space-y-4 text-xs transition-all">

                <div class="space-y-4 text-xs">
                    <!-- Q1 -->
                    <div class="space-y-1.5 p-4 rounded-xl bg-slate-950/70 border border-white/5">
                        <label for="quiz_ans_1" class="font-sans font-medium text-slate-200 block">
                            คำถามข้อที่ 1: จากกราฟความสัมพันธ์ระหว่างอัตราเร็วสุดท้าย ($v_t$) กับกำลังสองของรัศมี ($r^2$) จงอธิบายว่าทำไมความสัมพันธ์จึงเป็นเส้นตรงผ่านจุดกำเนิด และความชัน (Slope) สามารถนำไปคำนวณหาสัมประสิทธิ์ความหนืด $\eta$ ได้อย่างไร? <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="quiz_ans_1" name="quiz_ans_1" rows="3" required placeholder="พิมพ์คำตอบข้อที่ 1..." class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-white font-mono outline-none"></textarea>
                    </div>

                    <!-- Q2 -->
                    <div class="space-y-1.5 p-4 rounded-xl bg-slate-950/70 border border-white/5">
                        <label for="quiz_ans_2" class="font-sans font-medium text-slate-200 block">
                            คำถามข้อที่ 2: ในการบำบัดน้ำเสียทางสิ่งแวดล้อม (ENV) ด้วยบ่อตกตะกอน (Sedimentation Tank) ของอนุภาคแขวนลอย (TSS) หากอนุภาคจุลินทรีย์จับตัวกันเป็นก้อนฟล็อก (Flocculation) จนมีรัศมีเพิ่มขึ้น 3 เท่า ($3r$) อัตราเร็วในการตกตะกอนจะเพิ่มขึ้นกี่เท่าตามกฎของสโตกส์ และมีประโยชน์ต่อการออกแบบบ่อตกตะกอนอย่างไร? <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="quiz_ans_2" name="quiz_ans_2" rows="3" required placeholder="พิมพ์คำตอบข้อที่ 2..." class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-white font-mono outline-none"></textarea>
                    </div>

                    <!-- Q3 -->
                    <div class="space-y-1.5 p-4 rounded-xl bg-slate-950/70 border border-white/5">
                        <label for="quiz_ans_3" class="font-sans font-medium text-slate-200 block">
                            คำถามข้อที่ 3: ในกระบวนการเก็บเกี่ยวชีวมวลของเซลล์แบคทีเรีย (*E. coli*) และสปอร์ (*B. subtilis*) ทำไมการเพิ่มอุณหภูมิของอาหารเลี้ยงเชื้อจาก 20°C เป็น 37°C หรือการเจือจางความหนืด จึงช่วยเพิ่มอัตราเร็วในการตกตะกอนของเซลล์ตามกฎของสโตกส์ อธิบายโดยเชื่อมโยงกับสัมประสิทธิ์ความหนืด $\eta$? <span class="text-rose-400">*</span>
                        </label>
                        <textarea id="quiz_ans_3" name="quiz_ans_3" rows="3" required placeholder="พิมพ์คำตอบข้อที่ 3..." class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-xl p-3 text-white font-mono outline-none"></textarea>
                    </div>
                </div>
            </div>

            <!-- Submission Area -->
            <div class="p-6 rounded-2xl bg-gradient-to-r from-sky-950/60 via-slate-900 to-indigo-950/60 border border-sky-500/30 text-center space-y-4 shadow-2xl">
                <div class="max-w-xl mx-auto space-y-1">
                    <h3 class="text-base font-bold text-white font-mono">
                        <i class="fa-solid fa-cloud-arrow-up text-sky-400"></i> ยืนยันการส่งรายงานผลปฏิบัติการที่ 3
                    </h3>
                    <p class="text-xs text-slate-400 font-sans">
                        เมื่อกดส่งข้อมูล ระบบจะทำการตรวจสอบความครบถ้วน บันทึกข้อมูลลงฐานข้อมูล SQLite ในระบบ Virtual Lab และเชื่อมโยงส่งไปยัง Google Sheets สำหรับออกผลการเรียนอัตโนมัติ
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-3">
                    <button type="submit" id="btnSubmitReport" class="py-3.5 px-8 rounded-xl bg-gradient-to-r from-sky-500 via-teal-400 to-indigo-500 hover:brightness-110 text-slate-950 font-bold text-sm shadow-xl shadow-sky-500/20 transition flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> ยืนยันการส่งรายงานปฏิบัติการที่ 3
                    </button>
                    <button type="reset" onclick="handleFormReset()" class="py-3 px-5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-medium text-xs border border-white/10 transition">
                        <i class="fa-solid fa-arrow-rotate-left"></i> ล้างข้อมูลฟอร์ม
                    </button>
                </div>
            </div>

        </form>

    </main>

    <!-- Success Modal -->
    <div id="submitModal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden">
        <div class="max-w-md w-full bg-slate-900 border border-emerald-500/40 rounded-3xl p-6 text-center space-y-4 shadow-2xl animate-in fade-in zoom-in duration-200">
            <div class="w-16 h-16 rounded-full bg-emerald-500/20 text-emerald-400 mx-auto flex items-center justify-center text-3xl border border-emerald-500/40">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="space-y-1">
                <h3 class="text-lg font-bold text-white">บันทึกรายงานผลปฏิบัติการสำเร็จ!</h3>
                <p class="text-xs text-slate-400">ข้อมูลและหลักฐานภาพถ่าย 3D ได้รับการจัดเก็บเรียบร้อยแล้ว</p>
            </div>
            <div id="modalSubmitDetails" class="text-xs text-slate-300 bg-slate-950 p-3 rounded-xl border border-white/5 text-left font-mono space-y-1"></div>
            <button type="button" onclick="closeSubmitModal()" class="w-full py-2.5 px-4 rounded-xl bg-emerald-500 text-slate-950 font-bold text-xs hover:bg-emerald-400 transition">
                รับทราบและปิดหน้าต่าง
            </button>
        </div>
    </div>

</div>

<!-- JavaScript Logic -->
<script>
function openSimulatorFullscreen() {
    const frame = document.getElementById('simViewerFrame');
    if (frame.requestFullscreen) {
        frame.requestFullscreen();
    } else if (frame.webkitRequestFullscreen) {
        frame.webkitRequestFullscreen();
    }
}

function capture3dSimulator() {
    try {
        const frame = document.getElementById('simViewerFrame');
        let dataUrl = null;

        if (frame && frame.contentWindow) {
            if (typeof frame.contentWindow.captureSimulatorScreenshot === 'function') {
                dataUrl = frame.contentWindow.captureSimulatorScreenshot();
            }
            if (!dataUrl) {
                const canvas = frame.contentWindow.document.querySelector('canvas');
                if (canvas) dataUrl = canvas.toDataURL('image/png');
            }
        }

        if (dataUrl && dataUrl.length > 500) {
            setProofImage(dataUrl);
            alert("📸 แคปภาพหน้าจอ 3D Simulator สำเร็จ!\nภาพได้ถูกบันทึกและแนบลงในช่องหลักฐานการทดลองเรียบร้อยแล้ว");
            const proofSection = document.getElementById('proofBadgeStatus');
            if (proofSection) {
                proofSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        } else {
            alert("⚠️ ไม่สามารถดึงภาพจาก 3D Simulator ได้โดยตรง กรุณาใช้ปุ่ม 'อัปโหลดไฟล์ภาพ / แคปหน้าจอ' ในส่วนหลักฐานการทดลองด้านล่างครับ");
        }
    } catch (err) {
        console.error("3D capture failed:", err);
        alert("⚠️ เกิดข้อผิดพลาดในการดึงภาพหน้าจอ: " + (err.message || err) + "\nกรุณาใช้ปุ่มอัปโหลดภาพแทนครับ");
    }
}

function handleImageFileUpload(e) {
    const file = e.target.files && e.target.files[0];
    if (!file) return;

    if (file.size > 5 * 1024 * 1024) {
        alert("ไฟล์ภาพมีขนาดใหญ่เกิน 5 MB กรุณาเลือกไฟล์ที่มีขนาดเล็กลง");
        return;
    }

    const reader = new FileReader();
    reader.onload = function(evt) {
        setProofImage(evt.target.result);
    };
    reader.readAsDataURL(file);
}

function setProofImage(dataUrl) {
    document.getElementById('image_proof_base64').value = dataUrl;
    const preview = document.getElementById('proofPreviewImg');
    const placeholder = document.getElementById('proofPlaceholder');
    const badge = document.getElementById('proofBadgeStatus');

    preview.src = dataUrl;
    preview.classList.remove('hidden');
    placeholder.classList.add('hidden');

    badge.className = 'px-2.5 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 font-bold';
    badge.innerHTML = '<i class="fa-solid fa-check"></i> แนบภาพหลักฐานเรียบร้อยแล้ว';
}

function handleFormReset() {
    if (confirm("ต้องการล้างข้อมูลในแบบบันทึกผลการทดลองทั้งหมดใช่หรือไม่?")) {
        document.getElementById('image_proof_base64').value = '';
        document.getElementById('proofPreviewImg').classList.add('hidden');
        document.getElementById('proofPlaceholder').classList.remove('hidden');
        const badge = document.getElementById('proofBadgeStatus');
        badge.className = 'px-2.5 py-1 rounded-full text-xs font-mono bg-rose-500/20 text-rose-300 border border-rose-500/30 font-bold';
        badge.innerHTML = '⚠️ ยังไม่ได้แนบภาพหลักฐาน';
    }
}

// Client-Side Validation and Submission Pipeline
async function handleReportSubmit(e) {
    e.preventDefault();

    // 1. Check Student Identification
    const fullname = document.getElementById('student_fullname').value.trim();
    const studentId = document.getElementById('student_id').value.trim();
    const program = document.getElementById('student_program').value.trim();
    const section = document.getElementById('student_section').value.trim();

    if (!fullname || !studentId || !program || !section) {
        alert("⚠️ กรุณากรอกข้อมูลระบุตัวตนของนักศึกษาให้ครบถ้วนทุกช่องครับ");
        document.getElementById('student_fullname').focus();
        return;
    }

    // 2. Check Mandatory Image Proof
    const proofBase64 = document.getElementById('image_proof_base64').value;
    if (!proofBase64 || proofBase64.length < 500) {
        alert("⚠️ ระบบไม่อนุญาตให้ส่งรายงาน!\nกรุณาแคปภาพหน้าจอขณะทำการทดลอง 3D Simulator หรืออัปโหลดภาพหลักฐานก่อนกดส่งครับ");
        const proofSection = document.getElementById('proofBadgeStatus');
        if (proofSection) proofSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }

    // 3. Check All Table 3.1 Inputs
    const t1Inputs = document.querySelectorAll('#labReportForm [id^="t1_"]');
    for (let inp of t1Inputs) {
        if (!inp.value || inp.value.trim() === '') {
            alert("⚠️ กรุณากรอกข้อมูลใน 'ตารางที่ 3.1: มิติและสมบัติทางกายภาพของลูกกลมโลหะ' ให้ครบถ้วนทุกช่องครับ");
            inp.focus();
            inp.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
    }

    // 4. Check All Table 3.2 Inputs
    const t2Inputs = document.querySelectorAll('#labReportForm [id^="t2_"]');
    for (let inp of t2Inputs) {
        if (!inp.value || inp.value.trim() === '') {
            alert("⚠️ กรุณากรอกข้อมูลใน 'ตารางที่ 3.2: การจับเวลาการตกและอัตราเร็วสุดท้าย' ให้ครบถ้วนทุกช่องครับ");
            inp.focus();
            inp.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
    }

    // 5. Check All Table 3.3 Inputs
    const t3Inputs = document.querySelectorAll('#labReportForm [id^="t3_"]');
    for (let inp of t3Inputs) {
        if (!inp.value || inp.value.trim() === '') {
            alert("⚠️ กรุณากรอกข้อมูลใน 'ตารางที่ 3.3: การคำนวณสัมประสิทธิ์ความหนืดของของเหลวชีวภาพ' ให้ครบถ้วนทุกช่องครับ");
            inp.focus();
            inp.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return;
        }
    }

    // 6. Check Textareas (Calculations, Discussion, Conclusion)
    const calculations = document.getElementById('lab_calculations').value.trim();
    const discussion = document.getElementById('lab_discussion').value.trim();
    const conclusion = document.getElementById('lab_conclusion').value.trim();

    if (!calculations || calculations.length < 25) {
        alert("⚠️ กรุณากรอก 'การแสดงวิธีคำนวณอย่างละเอียด' ให้สมบูรณ์ก่อนส่งครับ");
        document.getElementById('lab_calculations').focus();
        return;
    }

    if (!discussion || discussion.length < 30) {
        alert("⚠️ กรุณากรอก 'การวิเคราะห์และอภิปรายผล' ให้สมบูรณ์ก่อนส่งครับ");
        document.getElementById('lab_discussion').focus();
        return;
    }

    if (!conclusion || conclusion.length < 25) {
        alert("⚠️ กรุณากรอก 'การสรุปผลการทดลอง' ให้สมบูรณ์ก่อนส่งครับ");
        document.getElementById('lab_conclusion').focus();
        return;
    }

    // 7. Check Post-Lab Quiz Answers
    const q1 = document.getElementById('quiz_ans_1').value.trim();
    const q2 = document.getElementById('quiz_ans_2').value.trim();
    const q3 = document.getElementById('quiz_ans_3').value.trim();

    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        document.getElementById('quiz_ans_1').focus();
        return;
    }

    // Construct Payload for Virtual Lab Backend
    const submitBtn = document.getElementById('btnSubmitReport');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner animate-spin"></i> กำลังบันทึกลงฐานข้อมูล SQLite & ซิงก์ Google Sheets...';

    // Collect table 3.1 data
    const table1Data = [];
    for (let r = 1; r <= 3; r++) {
        table1Data.push({
            sphere_size: r === 1 ? 'small' : (r === 2 ? 'medium' : 'large'),
            d_mm: document.getElementById(`t1_r${r}_d`).value,
            r_mm: document.getElementById(`t1_r${r}_r`).value,
            rsq_mm2: document.getElementById(`t1_r${r}_rsq`).value,
            vol_m3: document.getElementById(`t1_r${r}_vol`).value,
            mass_g: document.getElementById(`t1_r${r}_mass`).value,
            density_kg_m3: document.getElementById(`t1_r${r}_density`).value
        });
    }

    // Collect table 3.2 data
    const table2Data = [];
    for (let r = 1; r <= 3; r++) {
        table2Data.push({
            sphere_size: r === 1 ? 'small' : (r === 2 ? 'medium' : 'large'),
            dist_m: 0.20,
            t1_s: document.getElementById(`t2_r${r}_t1`).value,
            t2_s: document.getElementById(`t2_r${r}_t2`).value,
            t3_s: document.getElementById(`t2_r${r}_t3`).value,
            tavg_s: document.getElementById(`t2_r${r}_tavg`).value,
            vexp_m_s: document.getElementById(`t2_r${r}_vexp`).value,
            vth_m_s: document.getElementById(`t2_r${r}_vth`).value,
            percent_error: document.getElementById(`t2_r${r}_err`).value
        });
    }

    // Collect table 3.3 data
    const table3Data = [];
    for (let r = 1; r <= 4; r++) {
        table3Data.push({
            sample_index: r,
            v_m_s: document.getElementById(`t3_r${r}_v`).value,
            eta_exp_pa_s: document.getElementById(`t3_r${r}_etaexp`).value,
            percent_error: document.getElementById(`t3_r${r}_err`).value
        });
    }

    const payload = {
        action: 'submit_report',
        lab_id: 'lab03',
        student_id: studentId,
        fullname: fullname,
        program: program,
        section: section,
        image_proof_base64: proofBase64,
        calculations: calculations,
        discussion: discussion,
        conclusion: conclusion,
        quiz_answers: { q1: q1, q2: q2, q3: q3 },
        tables: {
            table_3_1: table1Data,
            table_3_2: table2Data,
            table_3_3: table3Data
        }
    };

    try {
        const res = await fetch('../../virtual_lab/api/api.php?action=submit_report', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(payload)
        });

        const data = await res.json();

        if (data.status === 'success' || data.success) {
            document.getElementById('modalSubmitDetails').innerHTML = `
                รหัสนักศึกษา: <strong>${studentId}</strong> (${fullname})<br>
                ปฏิบัติการ: <strong>Lab 03 (Newton's Laws &amp; Falling-Sphere Viscometer)</strong><br>
                หมายเลขบันทึกรายงาน ID: <strong>#${data.report_id || data.id || 'SAVED'}</strong><br>
                สถานะจัดเก็บภาพถ่าย: <span class="text-emerald-400">✓ บันทึกไฟล์ PNG สำเร็จ</span><br>
                สถานะซิงก์ Google Sheets: <span class="${data.google_sheets_synced ? 'text-emerald-400 font-bold' : 'text-amber-400'}">${data.google_sheets_synced ? '✓ ซิงก์เรียบร้อยแล้ว' : 'คิวซิงก์พร้อมส่ง'}</span>
            `;
            document.getElementById('submitModal').classList.remove('hidden');
        } else {
            alert('⚠️ เกิดข้อผิดพลาดในการบันทึกข้อมูล: ' + (data.message || 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้'));
        }
    } catch (err) {
        console.error('Submit error:', err);
        alert('⚠️ ไม่สามารถส่งข้อมูลไปยัง Server ได้ กรุณาตรวจสอบการเชื่อมต่อ XAMPP Apache/PHP');
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ยืนยันการส่งรายงานปฏิบัติการที่ 3';
    }
}

function closeSubmitModal() {
    document.getElementById('submitModal').classList.add('hidden');
}


// ==========================================
// LAB CARD EXPAND / COLLAPSE CONTROLLERS
// ==========================================
function toggleSimContainer() {
    const frame = document.getElementById('simFrameContainer');
    const label = document.getElementById('simToggleLabel');
    const btn = document.getElementById('btnToggleSimContainer');
    if (!frame) return;
    if (frame.classList.contains('hidden')) {
        frame.classList.remove('hidden');
        if (label) label.textContent = 'ย่อ 3D';
        if (btn) btn.innerHTML = '<i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>';
    } else {
        frame.classList.add('hidden');
        if (label) label.textContent = 'เปิด 3D';
        if (btn) btn.innerHTML = '<i class="fa-solid fa-expand text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">เปิด 3D</span>';
    }
}

function toggleCardSection(bodyId, btn) {
    const body = document.getElementById(bodyId);
    if (!body) return;
    const isHidden = body.classList.contains('hidden');
    if (isHidden) {
        body.classList.remove('hidden');
        if (btn) {
            const label = btn.querySelector('.btn-label');
            if (label) label.textContent = 'ย่อ';
            const icon = btn.querySelector('i');
            if (icon) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-up'); }
        }
    } else {
        body.classList.add('hidden');
        if (btn) {
            const label = btn.querySelector('.btn-label');
            if (label) label.textContent = 'ขยาย';
            const icon = btn.querySelector('i');
            if (icon) { icon.classList.remove('fa-chevron-up'); icon.classList.add('fa-chevron-down'); }
        }
    }
}

function expandAllReportSections() {
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secDiscussion_body', 'secQuestions_body', 'mathSuiteLab03'];
    bodies.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.remove('hidden');
    });
    document.querySelectorAll('.card-toggle-btn').forEach(btn => {
        const label = btn.querySelector('.btn-label');
        if (label) label.textContent = 'ย่อ';
        const icon = btn.querySelector('i');
        if (icon) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-up'); }
    });
}

function collapseAllReportSections() {
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secDiscussion_body', 'secQuestions_body', 'mathSuiteLab03'];
    bodies.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.add('hidden');
    });
    document.querySelectorAll('.card-toggle-btn').forEach(btn => {
        const label = btn.querySelector('.btn-label');
        if (label) label.textContent = 'ขยาย';
        const icon = btn.querySelector('i');
        if (icon) { icon.classList.remove('fa-chevron-up'); icon.classList.add('fa-chevron-down'); }
    });
}

function toggleMathDetails(id) {
    const el = document.getElementById(id);
    const btn = document.getElementById(id + 'BtnText');
    if (!el) return;
    if (el.classList.contains('hidden')) {
        el.classList.remove('hidden');
        if (btn) btn.textContent = 'ย่อสูตรสมการ';
        if (window.MathJax && window.MathJax.typesetPromise) window.MathJax.typesetPromise();
    } else {
        el.classList.add('hidden');
        if (btn) btn.textContent = 'ขยายสูตรสมการ';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.MathJax && window.MathJax.typesetPromise) {
        window.MathJax.typesetPromise();
    }
});
</script>

<?php include '../includes/footer.php'; ?>
