<?php
$pageTitle = 'ปฏิบัติการที่ 2: เวกเตอร์ของแรงและสมดุลของเซลล์จุลินทรีย์ | Lab 2: Force Vectors & Microbial Stokes Drag';
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
                <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 02</span>
            </div>

            <div class="flex flex-wrap items-center gap-2">
                <a href="../chapters/ch02_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>📖 อ่านทฤษฎีบทที่ 2</span>
                </a>
                <a href="../../virtual_lab/index.html?lab=2" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-flask"></i>
                    <span>🥽 Virtual Lab Hub</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=2&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                    <i class="fa-solid fa-camera-rotate"></i>
                    <span>📱 3D WebAR (Marker 1)</span>
                </a>
            </div>
        </div>
    </div>


<!-- Tailwind CSS CDN & Fonts -->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    body { font-family: 'Prompt', sans-serif; background-color: #060a12; color: #f8fafc; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Hero Header -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 via-amber-950/40 to-slate-900 border border-amber-500/30 p-6 sm:p-10 shadow-2xl backdrop-blur-xl">
        <div class="absolute -right-16 -top-16 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/40">
                        🔬 LAB 02 • ฟิสิกส์สำหรับจุลชีววิทยา
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-slate-300 border border-white/10">
                        OBE: CLO2, CLO3
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 font-mono">
                        3D Force Table &amp; Stokes' Drag
                    </span>
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                    เวกเตอร์ของแรงและสมดุลของเซลล์จุลินทรีย์
                    <span class="block text-lg sm:text-xl font-medium text-amber-300/90 mt-1">
                        Force Vectors, Force Table Equilibrium &amp; Stokes' Microbial Drag
                    </span>
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 max-w-3xl leading-relaxed">
                    ศึกษาการบวกเวกเตอร์ของแรงด้วยวิธีองค์ประกอบ (Component Method) และการจัดสมดุลแรงบนโต๊ะทดลอง 3 มิติ (Force Table) บูรณาการสู่การวิเคราะห์แรงกระทำต่อเซลล์จุลินทรีย์ในของไหล: แรงโน้มถ่วง แรงลอยตัว และแรงหนืดตามกฎของสโตกส์ (Stokes' Law)
                </p>
            </div>
            
            <div class="flex flex-col sm:flex-row md:flex-col gap-2 shrink-0">
                <a href="#labReportForm" class="px-5 py-3 rounded-2xl font-bold text-xs bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 hover:to-orange-300 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-pen-to-square"></i> กรอกผลการทดลอง
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-5 py-3 rounded-2xl font-bold text-xs bg-slate-800 hover:bg-slate-700 text-slate-200 border border-white/10 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-camera"></i> 📸 แคปหน้าจอ 3D
                </button>
            </div>
        </div>
    </div>

    <!-- 3D Virtual Bench & Multi-Instrument Suite Card -->
    <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-4">
        
        <!-- Header & Instrument Tabs -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-white/10 pb-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 mb-1.5">
                    <i class="fa-solid fa-atom animate-spin"></i> Interactive 3D Vectors &amp; Stokes Lab Suite
                </div>
                <h2 class="text-xl font-bold text-white flex items-center gap-2">
                    ห้องปฏิบัติการเวกเตอร์และพลศาสตร์เซลล์ 3 มิติ (3D Force &amp; Cell Physics)
                </h2>
                <p class="text-xs text-slate-400 mt-0.5">
                    แบบจำลองโต๊ะแรงสมดุล 3 มิติ พร้อม 2D Polar Vector HUD และหลอดตกตะกอนเซลล์แบคทีเรียตามกฎของสโตกส์
                </p>
            </div>

            <!-- Active Instrument Selector Buttons -->
            <div class="flex flex-wrap items-center gap-2 bg-slate-950/90 p-1.5 rounded-2xl border border-white/10">
                <button id="tabSimForceTable" onclick="switchSimulatorMode('forcetable')" class="px-4 py-2 rounded-xl text-xs font-bold bg-amber-500 text-slate-950 shadow-md transition flex items-center gap-2">
                    <i class="fa-solid fa-scale-balanced"></i> 1. โต๊ะแรงสมดุล 3 มิติ (Force Table)
                </button>
                <button id="tabSimStokes" onclick="switchSimulatorMode('stokes')" class="px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-bacteria"></i> 2. การตกตะกอนเซลล์ (Stokes' Drag)
                </button>
            </div>
        </div>

        <!-- Toolbar & Quick Action Buttons -->
        <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-950/70 p-3 rounded-2xl border border-white/10">
            <div class="flex items-center gap-2 text-xs text-slate-300 font-mono">
                <span id="currentSimBadge" class="px-2.5 py-1 rounded-lg bg-amber-500/20 text-amber-300 font-bold border border-amber-500/30">
                    ⚖️ 3D Precision Force Table
                </span>
                <span id="currentSimHint" class="hidden sm:inline text-slate-400 text-[11px]">
                    คลิกค้างแล้วลากเพื่อหมุน 360° | ปรับขนาดและมุมของรอกแต่ละตัวเพื่อสังเกตการเคลื่อนที่ของห่วงวงแหวน
                </span>
            </div>

            <div class="flex items-center gap-2">
                <a href="../webar/ar_aruco_textbook.html?lab=2&ar=1" target="_blank" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white shadow-lg shadow-purple-950/40 transition flex items-center gap-2 active:scale-95" title="เปิดกล้องส่อง 3D WebAR ArUco Marker ID 1">
                    <i class="fa-solid fa-vr-cardboard text-sm"></i> <span>📱 ส่องกล้อง 3D WebAR</span>
                </a>
                <button type="button" onclick="capture3dSimulator()" class="px-4 py-2 rounded-xl text-xs font-bold bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 shadow-lg shadow-amber-950/40 transition flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-camera-retro text-sm"></i> 📸 แคปหน้าจอ 3D เพื่อแนบเป็นหลักฐานการทดลอง
                </button>
                <button type="button" onclick="toggleSimContainer()" id="btnToggleSimContainer" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายหน้าจอ 3D Simulator">
                    <i class="fa-solid fa-compress text-xs"></i> <span id="simToggleLabel" class="hidden sm:inline">ย่อ 3D</span>
                </button>
                <button type="button" onclick="openSimulatorFullscreen()" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition" title="เปิดเต็มจอ">
                    <i class="fa-solid fa-expand"></i>
                </button>
                <a id="btnSimNewTab" href="../simulations/sim02_force_vectors_3d.html" target="_blank" class="px-3 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs border border-white/10 transition flex items-center gap-1.5" title="เปิดในแท็บใหม่">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>
        </div>

        <!-- Iframe Viewer Container -->
        <div id="simFrameContainer" class="relative w-full rounded-2xl overflow-hidden border border-white/10 shadow-2xl bg-slate-950">
            <iframe id="simViewerFrame" src="../simulations/sim02_force_vectors_3d.html" class="w-full h-[680px] sm:h-[720px] lg:h-[760px] border-0" allow="camera; microphone; fullscreen; autoplay; xr-spatial-tracking; display-capture"></iframe>
        </div>

        <!-- Instructional Card / Quick Tips -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs pt-1">
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-amber-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-scale-balanced"></i> ตอนที่ 1: การบวกเวกเตอร์ 2 แรง
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ปรับรอก F₁ และ F₂ ตามค่าที่กำหนด คำนวณหาแรงลัพธ์ R และจัดรอก F₃ (Equilibrant) ให้ห่วงวงแหวนลอยอยู่ตรงกึ่งกลางเข็ม
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-emerald-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-nodes"></i> ตอนที่ 2: สมดุลของแรง 3 เวกเตอร์
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    ทดสอบสมดุลสมมาตร 3 แรงที่มุม 0°, 120°, 240° และสมดุลไม่สมมาตร เพื่อตรวจสอบเงื่อนไข $\sum F_x = 0$ และ $\sum F_y = 0$
                </p>
            </div>
            <div class="p-3 rounded-xl bg-slate-950/60 border border-white/5 space-y-1">
                <div class="text-sky-400 font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-bacteria"></i> ตอนที่ 3: แรงหนืดและการตกตะกอนของเซลล์
                </div>
                <p class="text-slate-400 text-[11px] leading-relaxed">
                    สลับไปยังโหมดที่ 2 เลือกชนิดเซลล์และสารแขวนลอย วัดความเร็วปลาย $v_t$ เพื่อคำนวณหารัศมีไฮโดรไดนามิกของเซลล์ตามกฎของสโตกส์
                </p>
            </div>
        </div>

    </div>

    <!-- Academic Foundations & Mathematical Equations Suite -->
    <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl backdrop-blur-xl space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-white/10 pb-4">
            <div class="space-y-1">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30 font-mono">
                    <i class="fa-solid fa-square-root-variable"></i> Vector Mechanics &amp; Stokes' Hydrodynamics Foundations
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                    หลักการและสมการฟิสิกส์พื้นฐาน (Theoretical Formulations)
                </h2>
                <p class="text-xs text-slate-400">
                    การวิเคราะห์สมดุลสถิตของเวกเตอร์แรงในระนาบ 2 มิติ และกลศาสตร์ของไหลทางชีวภาพตามกฎของสโตกส์
                </p>
            </div>
            <button type="button" onclick="toggleMathDetails('mathSuiteLab02')" class="px-4 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/30 transition flex items-center gap-2 self-start sm:self-auto">
                <span id="mathSuiteLab02BtnText">ย่อ/ขยายสมการ</span> <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>

        <div id="mathSuiteLab02" class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <!-- Card 1: Vector Component Method -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-amber-500/20 space-y-3.5 hover:border-amber-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-amber-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-arrows-to-dot text-amber-400"></i> ตอนที่ 1: การรวมเวกเตอร์แรง
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-amber-500/10 text-amber-400 font-mono border border-amber-500/20">Eq. 2.1–2.3</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    การแยกองค์ประกอบแรงตามแกน $x$ และ $y$ เพื่อหาเวกเตอร์แรงลัพธ์ $\vec{R} = \vec{F}_1 + \vec{F}_2$:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                    $$R_x = \sum_{i=1}^n F_i \cos\theta_i, \quad R_y = \sum_{i=1}^n F_i \sin\theta_i \tag{2.1}$$
                    $$R = \sqrt{R_x^2 + R_y^2}, \quad \theta_R = \operatorname{atan2}(R_y, R_x) \tag{2.2}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    แรงสมดุล $\vec{E}$ (Equilibrant) มีขนาดเท่ากับ $\vec{R}$ แต่มีทิศทางตรงกันข้าม ($180^\circ$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-amber-200">
                    $$E = R, \quad \theta_E = (\theta_R + 180^\circ) \bmod 360^\circ \tag{2.3}$$
                </div>
            </div>

            <!-- Card 2: Three-Force Static Equilibrium -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-orange-500/20 space-y-3.5 hover:border-orange-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-orange-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-scale-balanced text-orange-400"></i> ตอนที่ 2: เงื่อนไขสมดุลสถิต
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-orange-500/10 text-orange-400 font-mono border border-orange-500/20">Eq. 2.4–2.5</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    วัตถุจะอยู่ในสมดุลต่อการเลื่อนที่ (Translational Equilibrium) เมื่อผลรวมเวกเตอร์แรงลัพธ์เป็นศูนย์:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-orange-200">
                    $$\sum \vec{F} = \vec{F}_1 + \vec{F}_2 + \vec{F}_3 = \mathbf{0} \tag{2.4}$$
                    $$\sum F_x = 0 \quad \text{และ} \quad \sum F_y = 0 \tag{2.5}$$
                </div>
                <ul class="text-[11px] text-slate-400 space-y-1.5 list-disc list-inside">
                    <li><strong class="text-amber-400">สมดุลสมมาตร 3 แรง:</strong> ขนาดแรงเท่ากัน $F_1 = F_2 = F_3$ ทำมุมต่างกัน $120^\circ$ รอบจุดศูนย์กลาง</li>
                    <li><strong class="text-emerald-400">การตรวจสอบ:</strong> ห่วงวงแหวนกลางโต๊ะแรงจะลอยนิ่งไม่สัมผัสแกนกลาง</li>
                </ul>
            </div>

            <!-- Card 3: Stokes' Microbial Hydrodynamics -->
            <div class="p-5 rounded-2xl bg-slate-950/80 border border-sky-500/20 space-y-3.5 hover:border-sky-500/40 transition">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-sky-300 font-mono flex items-center gap-1.5">
                        <i class="fa-solid fa-bacteria text-sky-400"></i> ตอนที่ 3: กฎของสโตกส์ในเซลล์
                    </span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-sky-500/10 text-sky-400 font-mono border border-sky-500/20">Eq. 2.6–2.8</span>
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    แรงหนืดของของไหล ($F_d$) กระทำต่อเซลล์ทรงกลมรัศมี $r$ ที่เคลื่อนที่ด้วยความเร็ว $v$ ในของไหลความหนืด $\eta$:
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$F_d = 6\pi \eta r v \tag{2.6}$$
                </div>
                <p class="text-[11px] text-slate-400 leading-relaxed">
                    เมื่อเซลล์ตกตะกอนด้วยความเร็วปลายคงที่ ($v_t$) ภายใต้แรงโน้มถ่วง แรงลอยตัว และแรงหนืด ($F_g = F_b + F_d$):
                </p>
                <div class="bg-slate-900/90 rounded-xl p-3 border border-white/5 text-center shadow-inner overflow-x-auto text-sky-200">
                    $$v_t = \frac{2 r^2 (\rho_c - \rho_f) g}{9 \eta} \implies r = \sqrt{\frac{9 \eta v_t}{2(\rho_c - \rho_f)g}} \tag{2.7}$$
                    $$\text{RCF} = 1.118 \times 10^{-5} \cdot r_{\text{cm}} \cdot N^2 \quad [\times g] \tag{2.8}$$
                </div>
            </div>
        </div>
    </div>

    <!-- Master Section Quick Action & Collapse/Expand Bar -->
    <div id="masterLabToolbar" class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-white/10 p-3.5 sm:p-4 rounded-3xl shadow-xl backdrop-blur-xl">
        <div class="flex items-center gap-2 text-xs font-mono text-slate-300">
            <span class="w-2.5 h-2.5 rounded-full bg-amber-400 animate-pulse"></span>
            <span class="font-bold text-white">แผงควบคุมการแสดงผลรายงาน:</span>
            <span class="text-slate-400 hidden sm:inline">สามารถคลิกปุ่มย่อ/ขยายในแต่ละการ์ด หรือควบคุมทุกส่วนได้พร้อมกัน</span>
        </div>
        <div class="flex items-center gap-2">
            <button type="button" onclick="expandAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-amber-400 border border-amber-500/30 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                <i class="fa-solid fa-angles-down text-xs"></i> <span>ขยายทุกการ์ด</span>
            </button>
            <button type="button" onclick="collapseAllReportSections()" class="px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5 shadow-sm active:scale-95">
                <i class="fa-solid fa-angles-up text-xs"></i> <span>ย่อทุกการ์ด</span>
            </button>
        </div>
    </div>

    <!-- Interactive E-Report Submission Form -->
    <form id="labReportForm" onsubmit="validateAndSubmitReport(event)" class="space-y-6">

        <!-- 1. Student Profile Card (Mandatory) -->
        <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-id-card text-amber-400"></i>
                    ข้อมูลนักศึกษาผู้ส่งรายงานผลปฏิบัติการ (Student Identification)
                </h2>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-rose-400 font-semibold hidden sm:inline">* จำเป็นต้องกรอกทุกช่อง</span>
                    <button type="button" onclick="toggleCardSection('secStudentId_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="secStudentId_body" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 transition-all">
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        ชื่อ - นามสกุล (Full Name) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_fullname" name="student_fullname" placeholder="เช่น นายกิตติคุณ มั่นคง" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        รหัสนักศึกษา (Student ID) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_id" name="student_id" placeholder="เช่น 67144001" pattern="[0-9]{6,12}" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        สาขาวิชา (Program) <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_program" name="student_program" value="วิทยาศาสตร์และเทคโนโลยี จุลชีววิทยา" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        กลุ่มเรียน / Section <span class="text-rose-400">*</span>
                    </label>
                    <input type="text" id="student_section" name="student_section" value="Sec 01" required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-xl px-3.5 py-2.5 text-xs text-white placeholder-slate-500 outline-none transition font-mono">
                </div>
            </div>
        </div>

        <!-- 2. Snapshot & Experiment Evidence Card (Mandatory Proof) -->
        <div class="bg-slate-900/90 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-3">
                <h2 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-camera text-sky-400"></i>
                    ภาพถ่ายหรือแคปหน้าจอระหว่างทดลอง (Experiment Screenshot Proof)
                </h2>
                <div class="flex items-center gap-2">
                    <div id="proofBadgeStatus" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-500/20 text-rose-300 border border-rose-500/40">
                        <i class="fa-solid fa-circle-exclamation"></i> ยังไม่มีภาพหลักฐาน (จำเป็นก่อนส่ง)
                    </div>
                    <button type="button" onclick="toggleCardSection('secEvidence_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>
            <div id="secEvidence_body" class="space-y-4 transition-all">

            <p class="text-xs text-slate-300 leading-relaxed">
                ตามข้อกำหนดของรายวิชา นักศึกษาจะต้องแนบภาพถ่ายหน้าจอระหว่างการทดลองบน 3D Simulator (เช่น ขณะห่วงวงแหวนลอยอยู่กึ่งกลางสมดุล หรือขณะจับเวลาการตกตะกอนของเซลล์แบคทีเรีย) เพื่อยืนยันว่าได้ทำการทดลองจริง
            </p>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <!-- Action Controls -->
                <div class="md:col-span-5 space-y-3">
                    <button type="button" onclick="capture3dSimulator()" class="w-full py-3 px-4 rounded-2xl bg-gradient-to-r from-amber-500 to-orange-400 hover:from-amber-400 text-slate-950 font-bold text-xs flex items-center justify-center gap-2 shadow-lg transition active:scale-95">
                        <i class="fa-solid fa-camera-retro text-base"></i> 📸 แคปหน้าจอ 3D Simulator ตอนนี้
                    </button>
                    
                    <div class="text-center text-[11px] text-slate-500 font-mono">— หรือ —</div>

                    <label class="w-full py-2.5 px-4 rounded-2xl bg-slate-950 hover:bg-slate-800 text-slate-300 border border-white/15 font-bold text-xs flex items-center justify-center gap-2 cursor-pointer transition">
                        <i class="fa-solid fa-upload"></i> อัปโหลดไฟล์ภาพ / ถ่ายภาพจากกล้อง
                        <input type="file" id="imageFileInput" accept="image/*" capture="environment" onchange="handleImageFileUpload(event)" class="hidden">
                    </label>

                    <div class="text-[11px] text-slate-400">
                        รองรับไฟล์ภาพ PNG, JPG, JPEG ขนาดไม่เกิน 5 MB
                    </div>
                </div>

                <!-- Preview Thumbnail Container -->
                <div class="md:col-span-7 flex flex-col items-center justify-center p-3 rounded-2xl bg-slate-950 border border-dashed border-white/20 min-h-[160px] relative overflow-hidden">
                    <img id="proofPreviewImg" src="" alt="Experiment Proof Preview" class="max-h-[180px] w-auto rounded-xl object-contain hidden border border-white/10 shadow-lg">
                    <div id="proofPlaceholder" class="text-center space-y-1 text-slate-500 py-6">
                        <i class="fa-regular fa-image text-4xl mb-1"></i>
                        <div class="text-xs font-semibold">ยังไม่มีภาพหลักฐานการทดลอง</div>
                        <div class="text-[10px]">กดปุ่มแคปหน้าจอ 3D หรือเลือกไฟล์ภาพด้านซ้าย</div>
                    </div>
                    <!-- Hidden field to hold base64 image -->
                    <input type="hidden" id="image_proof_base64" name="image_proof_base64" value="">
                </div>
            </div>
            </div>
        </div>

        <!-- 3. Blank Data Tables Section (Student Input Tables) -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-white/10 pb-4">
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-amber-400 flex items-center gap-2">
                        📊 แบบบันทึกผลการทดลอง (Data Recording Tables)
                    </h2>
                    <p class="text-xs text-slate-400 mt-0.5">
                        ช่องตารางเป็นช่องว่างเปล่า ให้นักศึกษาอ่านค่าจาก 3D Simulator แล้วพิมพ์บันทึกค่าลงในช่องตามลำดับ
                    </p>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="calculateAllTables()" class="px-3.5 py-1.5 rounded-xl bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 text-xs font-bold transition flex items-center gap-1.5">
                        <i class="fa-solid fa-calculator"></i> คำนวณค่าและสถิติอัตโนมัติ
                    </button>
                    <button type="button" onclick="toggleCardSection('secDataTables_body', this)" class="card-toggle-btn px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-800/80 hover:bg-slate-700 text-slate-300 hover:text-white border border-white/10 transition flex items-center gap-1.5" title="ย่อ/ขยายการ์ด">
                        <span class="btn-label hidden sm:inline">ย่อ</span> <i class="fa-solid fa-chevron-up text-[10px]"></i>
                    </button>
                </div>
            </div>
            <div id="secDataTables_body" class="space-y-6 transition-all">

            <!-- Table 2.1: Two-Vector Addition on Force Table -->
            <div class="space-y-3">
                <h3 class="text-xs font-bold text-amber-400 font-mono">
                    ตารางที่ 2.1: ผลการบวกเวกเตอร์ 2 แรง และการหาแรงสมดุลบนโต๊ะแรง (Force Table 2-Vector Addition)
                </h3>

                <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-amber-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left">การทดลอง</th>
                                <th class="p-3 min-w-[85px]">$F_1$ (g)</th>
                                <th class="p-3 min-w-[75px]">$\theta_1$ (°)</th>
                                <th class="p-3 min-w-[85px]">$F_2$ (g)</th>
                                <th class="p-3 min-w-[75px]">$\theta_2$ (°)</th>
                                <th class="p-3 min-w-[95px]">$R_{\text{calc}}$ (g)</th>
                                <th class="p-3 min-w-[85px]">$\theta_{\text{calc}}$ (°)</th>
                                <th class="p-3 min-w-[95px]">$E_{\text{exp}}$ (g)</th>
                                <th class="p-3 min-w-[85px]">$\theta_{\text{exp}}$ (°)</th>
                                <th class="p-3 min-w-[85px]">%Error</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <!-- Trial 1: Orthogonal 90 deg -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">ครั้งที่ 1 (ตั้งฉาก 90°)</td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_f1m" placeholder="200" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_f1a" placeholder="0" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_f2m" placeholder="150" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_f2a" placeholder="90" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r1_rcalc" placeholder="250.0" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r1_thetacalc" placeholder="36.9" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_eexp" placeholder="250" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r1_thetaexp" placeholder="217" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r1_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                            <!-- Trial 2: 60 deg -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">ครั้งที่ 2 (ทำมุม 60°)</td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_f1m" placeholder="150" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_f1a" placeholder="0" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_f2m" placeholder="150" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_f2a" placeholder="60" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r2_rcalc" placeholder="259.8" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r2_thetacalc" placeholder="30.0" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_eexp" placeholder="260" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r2_thetaexp" placeholder="210" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r2_err" placeholder="0.08%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                            <!-- Trial 3: 120 deg -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">ครั้งที่ 3 (ทำมุม 120°)</td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_f1m" placeholder="200" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_f1a" placeholder="30" required class="w-full bg-slate-900 border border-white/15 focus:border-amber-400 rounded-lg px-2 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_f2m" placeholder="200" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_f2a" placeholder="150" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r3_rcalc" placeholder="200.0" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t1_r3_thetacalc" placeholder="90.0" required class="w-full bg-slate-950 border border-amber-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_eexp" placeholder="200" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="1" id="t1_r3_thetaexp" placeholder="270" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t1_r3_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 2.2: Three-Vector Equilibrium Verification -->
            <div class="space-y-3 pt-3">
                <h3 class="text-xs font-bold text-emerald-400 font-mono">
                    ตารางที่ 2.2: การตรวจสอบเงื่อนไขสมดุลของแรง 3 เวกเตอร์ ($\sum F_x = 0$ และ $\sum F_y = 0$)
                </h3>

                <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-emerald-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left min-w-[130px]">ระบบสมดุล</th>
                                <th class="p-3 min-w-[80px]">$F_1$ (g, °)</th>
                                <th class="p-3 min-w-[80px]">$F_2$ (g, °)</th>
                                <th class="p-3 min-w-[80px]">$F_3$ (g, °)</th>
                                <th class="p-3 min-w-[90px]">$\sum F_x$ (N)</th>
                                <th class="p-3 min-w-[90px]">$\sum F_y$ (N)</th>
                                <th class="p-3 min-w-[100px]">$|\vec{F}_{\text{net}}|$ (N)</th>
                                <th class="p-3 min-w-[120px]">ตำแหน่งวงแหวน</th>
                                <th class="p-3 min-w-[100px]">ผลการประเมิน</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <!-- Trial 1: Symmetric 120 -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white font-sans">สมมาตร 120°</td>
                                <td class="p-2"><input type="text" id="t2_r1_f1" placeholder="100g, 0°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r1_f2" placeholder="100g, 120°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r1_f3" placeholder="100g, 240°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r1_sfx" placeholder="0.000" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r1_sfy" placeholder="0.000" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r1_fnet" placeholder="0.000" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r1_ring" placeholder="กึ่งกลางเข็มสมบูรณ์" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-slate-200 outline-none font-sans"></td>
                                <td class="p-2">
                                    <select id="t2_r1_eval" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-sans font-bold outline-none">
                                        <option value="pass">✓ สมดุลสมบูรณ์</option>
                                        <option value="fail">✗ ไม่สมดุล</option>
                                    </select>
                                </td>
                            </tr>
                            <!-- Trial 2: Asymmetric -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-bold text-white font-sans">ไม่สมมาตร ชุดที่ 1</td>
                                <td class="p-2"><input type="text" id="t2_r2_f1" placeholder="150g, 30°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-amber-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r2_f2" placeholder="200g, 135°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r2_f3" placeholder="218g, 273°" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r2_sfx" placeholder="0.002" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r2_sfy" placeholder="0.003" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t2_r2_fnet" placeholder="0.004" required class="w-full bg-slate-950 border border-emerald-500/30 rounded-lg px-1.5 py-1.5 text-center text-xs text-emerald-300 font-bold outline-none"></td>
                                <td class="p-2"><input type="text" id="t2_r2_ring" placeholder="กึ่งกลางเข็ม" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-1.5 py-1.5 text-center text-xs text-slate-200 outline-none font-sans"></td>
                                <td class="p-2">
                                    <select id="t2_r2_eval" required class="w-full bg-slate-900 border border-white/15 focus:border-emerald-400 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-sans font-bold outline-none">
                                        <option value="pass">✓ สมดุลสมบูรณ์</option>
                                        <option value="fail">✗ ไม่สมดุล</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Table 2.3: Microbial Sedimentation & Stokes' Drag -->
            <div class="space-y-3 pt-3">
                <h3 class="text-xs font-bold text-sky-400 font-mono">
                    ตารางที่ 2.3: แรงหนืดและการตกตะกอนของเซลล์จุลินทรีย์ในของไหลตามกฎของสโตกส์ (Stokes' Law &amp; Sedimentation)
                </h3>
                
                <div class="overflow-x-auto rounded-2xl border border-white/10 bg-slate-950/70 p-1">
                    <table class="w-full text-xs text-center border-collapse">
                        <thead class="bg-slate-950 text-sky-400 font-bold border-b border-white/10">
                            <tr>
                                <th class="p-3 text-left min-w-[160px]">จุลินทรีย์ตัวอย่าง</th>
                                <th class="p-3 min-w-[120px]">สารแขวนลอย ($\eta$)</th>
                                <th class="p-3 min-w-[80px]">ระยะตก $\Delta y$ (µm)</th>
                                <th class="p-3 min-w-[80px]">เวลา $\Delta t$ (s)</th>
                                <th class="p-3 min-w-[100px]">ความเร็ว $v_t$ (µm/s)</th>
                                <th class="p-3 min-w-[105px]">รัศมีคำนวณ $r$ (µm)</th>
                                <th class="p-3 min-w-[105px]">ขนาดกล้อง $r_0$ (µm)</th>
                                <th class="p-3 min-w-[85px]">%Error</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-slate-300 font-mono">
                            <!-- Cell 1: S. aureus -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">1. S. aureus (Coccus)</td>
                                <td class="p-3 text-slate-400 font-sans">น้ำกลั่น (1.00 mPa·s)</td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r1_dist" placeholder="0.54" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t3_r1_time" placeholder="10.0" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t3_r1_vt" placeholder="0.054" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r1_rcalc" placeholder="0.50" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r1_rmicro" placeholder="0.50" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t3_r1_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                            <!-- Cell 2: E. coli -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">2. E. coli (Bacillus)</td>
                                <td class="p-3 text-slate-400 font-sans">น้ำกลั่น (1.00 mPa·s)</td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r2_dist" placeholder="1.12" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t3_r2_time" placeholder="10.0" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t3_r2_vt" placeholder="0.112" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r2_rcalc" placeholder="0.80" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r2_rmicro" placeholder="0.80" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t3_r2_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                            <!-- Cell 3: B. subtilis Spore -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">3. B. subtilis (Spore)</td>
                                <td class="p-3 text-slate-400 font-sans">น้ำเลี้ยงเชื้อ (1.15 mPa·s)</td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r3_dist" placeholder="1.70" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t3_r3_time" placeholder="10.0" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t3_r3_vt" placeholder="0.170" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r3_rcalc" placeholder="0.60" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r3_rmicro" placeholder="0.60" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t3_r3_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                            <!-- Cell 4: Yeast -->
                            <tr class="hover:bg-white/5 transition">
                                <td class="p-3 text-left font-medium text-white font-sans">4. S. cerevisiae (Yeast)</td>
                                <td class="p-3 text-slate-400 font-sans">กลีเซอรอล 20% (1.76 mPa·s)</td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r4_dist" placeholder="7.24" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.1" id="t3_r4_time" placeholder="10.0" required class="w-full bg-slate-900 border border-white/15 focus:border-sky-400 rounded-lg px-2 py-1.5 text-center text-xs text-sky-300 outline-none"></td>
                                <td class="p-2"><input type="number" step="0.001" id="t3_r4_vt" placeholder="0.724" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-white font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r4_rcalc" placeholder="3.00" required class="w-full bg-slate-950 border border-sky-500/30 rounded-lg px-2 py-1.5 text-center text-xs text-emerald-400 font-bold outline-none"></td>
                                <td class="p-2"><input type="number" step="0.01" id="t3_r4_rmicro" placeholder="3.00" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-slate-300 outline-none"></td>
                                <td class="p-2"><input type="text" id="t3_r4_err" placeholder="0.00%" required class="w-full bg-slate-900 border border-white/15 rounded-lg px-2 py-1.5 text-center text-xs text-sky-400 outline-none"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- 4. Calculations, Discussion & Conclusion Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-5">
            <h2 class="text-base sm:text-lg font-bold text-amber-400 flex items-center gap-2 border-b border-white/10 pb-3">
                <i class="fa-solid fa-square-root-variable text-amber-400"></i>
                การคำนวณ การอภิปรายผล และสรุปผลการทดลอง (Analysis &amp; Discussion)
            </h2>

            <div class="space-y-4">
                <div class="space-y-2.5">
                    <label class="block text-xs font-bold text-slate-300">
                        1. แสดงวิธีคำนวณอย่างละเอียด (Detailed Calculations) <span class="text-rose-400">*</span>
                    </label>

                    <!-- Formula Guide Box -->
                    <div class="p-4 rounded-2xl bg-slate-950/90 border border-amber-500/30 space-y-2.5">
                        <div class="flex items-center justify-between text-xs font-bold text-amber-400 font-mono">
                            <span><i class="fa-solid fa-book-open"></i> โครงสร้างสูตรคำนวณตามมาตรฐานวิชาการ (Academic Calculation Structure)</span>
                            <span class="text-[10px] text-slate-400">แทนค่าตัวเลขจากตารางลงในกล่องข้อความ</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs text-slate-300">
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-amber-400">1. การบวกเวกเตอร์และแรงสมดุล:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $R_x = F_1\cos\theta_1 + F_2\cos\theta_2, \quad R_y = F_1\sin\theta_1 + F_2\sin\theta_2$<br>
                                    $R = \sqrt{R_x^2 + R_y^2}, \quad \theta_R = \operatorname{atan2}(R_y, R_x)$<br>
                                    $E = R, \quad \theta_E = (\theta_R + 180^\circ) \bmod 360^\circ$
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-slate-900/80 border border-white/5 space-y-1">
                                <span class="font-bold text-sky-400">2. การคำนวณรัศมีเซลล์ตามกฎของสโตกส์:</span>
                                <div class="text-[11px] font-mono text-slate-300">
                                    $v_t = \frac{\Delta y}{\Delta t}\text{ m/s}$<br>
                                    $r = \sqrt{\frac{9 \eta v_t}{2(\rho_{\text{cell}} - \rho_f)g}}\text{ m} \quad (\times 10^6 \to \mu\text{m})$<br>
                                    $\text{RCF} = 1.118 \times 10^{-5} \cdot r_{\text{cm}} \cdot N^2$
                                </div>
                            </div>
                        </div>
                    </div>

                    <textarea id="lab_calculations" name="lab_calculations" rows="5" placeholder="ตัวอย่างการแสดงวิธีคำนวณ:
1. การบวกเวกเตอร์: Rx = F1 cos(theta1) + F2 cos(theta2) = ...
   Ry = F1 sin(theta1) + F2 sin(theta2) = ...
   |R| = sqrt(Rx^2 + Ry^2) = ...
   theta_R = arctan(Ry / Rx) = ...
2. กฎของสโตกส์: vt = 2 r^2 (rho_c - rho_f) g / (9 eta)
   คำนวณรัศมีเซลล์ r = sqrt( 9 eta vt / (2 (rho_c - rho_f) g) ) = ..." required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition font-mono leading-relaxed"></textarea>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        2. อภิปรายผลการทดลอง (Discussion) <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="lab_discussion" name="lab_discussion" rows="3" placeholder="พิมพ์การอภิปรายผลการทดลอง: วิเคราะห์ความสอดคล้องระหว่างผลการคำนวณกับแรงสมดุลที่วัดได้บนโต๊ะแรง, สาเหตุของความคลาดเคลื่อน (แรงเสียดทานของรอก, มวลของเส้นเชือก), และความสัมพันธ์ระหว่างขนาด/ความหนาแน่นของเซลล์จุลินทรีย์กับความเร็วในการตกตะกอนตามกฎของสโตกส์..." required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition leading-relaxed"></textarea>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-300">
                        3. สรุปผลการทดลอง (Conclusion) <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="lab_conclusion" name="lab_conclusion" rows="2" placeholder="สรุปผลการทดลองให้สอดคล้องกับวัตถุประสงค์ทั้ง 3 ตอน: กฎการบวกเวกเตอร์, เงื่อนไขสมดุลของแรง 3 เวกเตอร์, และการตกตะกอนของเซลล์จุลินทรีย์..." required class="w-full bg-slate-950 border border-white/15 focus:border-amber-400 rounded-2xl p-4 text-xs text-white placeholder-slate-600 outline-none transition leading-relaxed"></textarea>
                </div>
            </div>
        </div>

        <!-- 5. Post-Lab Questions Section -->
        <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl space-y-5">
            <h2 class="text-base sm:text-lg font-bold text-purple-400 flex items-center gap-2 border-b border-white/10 pb-3">
                <i class="fa-solid fa-circle-question text-purple-400"></i>
                คำถามท้ายการทดลอง (Post-Lab Questions)
            </h2>

            <div class="space-y-4">
                <div class="space-y-1.5 bg-slate-950/60 p-4 rounded-2xl border border-white/5">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 1: ถ้าแรง $F_1 = 5.0\text{ N}$ ทิศ $30.0^\circ$ และ $F_2 = 8.0\text{ N}$ ทิศ $120.0^\circ$ จงแสดงวิธีหาขนาดและทิศทางของแรงสมดุล (Equilibrant $\vec{E}$) ด้วยวิธีองค์ประกอบ <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_1" rows="2" placeholder="พิมพ์คำตอบและแสดงวิธีคิดข้อ 1..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition font-mono"></textarea>
                </div>

                <div class="space-y-1.5 bg-slate-950/60 p-4 rounded-2xl border border-white/5">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 2: ในระบบบำบัดน้ำเสียทางจุลชีววิทยาสิ่งแวดล้อม กระแสน้ำไหลไปทางทิศเหนือด้วยความเร็ว $2.0\text{ m/s}$ และมีกระแสลมพัดผิวน้ำไปทางทิศตะวันออก $1.5\text{ m/s}$ เวกเตอร์ความเร็วลัพธ์ของอนุภาคชีวภาพลอยน้ำมีขนาดและทิศทางใด <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_2" rows="2" placeholder="พิมพ์คำตอบและแสดงวิธีคิดข้อ 2..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition font-mono"></textarea>
                </div>

                <div class="space-y-1.5 bg-slate-950/60 p-4 rounded-2xl border border-white/5">
                    <label class="block text-xs font-bold text-purple-300">
                        คำถามข้อที่ 3: ตามกฎของสโตกส์ ทำไมสปอร์ของแบคทีเรีย (*B. subtilis*) ถึงมีอัตราการตกตะกอนในสารแขวนลอยเร็วกว่าเซลล์ปกติที่มีขนาดใกล้เคียงกัน อธิบายความสัมพันธ์ของความหนาแน่นและแรงหนืด <span class="text-rose-400">*</span>
                    </label>
                    <textarea id="quiz_ans_3" rows="2" placeholder="พิมพ์คำตอบข้อ 3..." required class="w-full bg-slate-900 border border-white/15 focus:border-purple-400 rounded-xl p-3 text-xs text-white placeholder-slate-600 outline-none transition"></textarea>
                </div>
            </div>
        </div>

        <!-- Submit Button Card -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-900 to-amber-950/40 border border-amber-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="space-y-1 text-center sm:text-left">
                <h3 class="text-base font-bold text-white flex items-center gap-2 justify-center sm:justify-start">
                    <i class="fa-solid fa-cloud-arrow-up text-amber-400"></i> ส่งรายงานผลการทดลองปฏิบัติการที่ 2
                </h3>
                <p class="text-xs text-slate-400">
                    ข้อมูลจะถูกบันทึกลงฐานข้อมูล SQLite และส่งซิงก์เข้าสู่ Google Sheets ของอาจารย์ผู้สอนทันที
                </p>
            </div>

            <button type="submit" id="btnSubmitReport" class="w-full sm:w-auto px-8 py-3.5 rounded-2xl font-extrabold text-xs sm:text-sm bg-gradient-to-r from-amber-500 via-orange-400 to-amber-500 hover:from-amber-400 hover:to-orange-300 text-slate-950 shadow-xl shadow-amber-950/50 transition active:scale-95 flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> ยืนยันการส่งรายงานปฏิบัติการที่ 2
            </button>
        </div>

    </form>

    <!-- Lab Navigation Footer -->
    <nav class="flex items-center justify-between pt-4 border-t border-white/10 text-xs">
        <a href="lab01_measurement.php" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 border border-white/10 transition flex items-center gap-2">
            <i class="fa-solid fa-arrow-left"></i> ปฏิบัติการที่ 1: การวัดละเอียด
        </a>
        <a href="lab03_motion.php" class="px-4 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-slate-300 border border-white/10 transition flex items-center gap-2">
            ปฏิบัติการที่ 3: การเคลื่อนที่และบราวน์เนียน <i class="fa-solid fa-arrow-right"></i>
        </a>
    </nav>

    <!-- Submit Success / Response Modal -->
    <div id="submitModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
        <div class="bg-slate-900 border border-amber-500/40 rounded-3xl max-w-md w-full p-6 shadow-2xl space-y-4 text-center">
            <div class="w-16 h-16 rounded-2xl bg-amber-500/20 text-amber-400 flex items-center justify-center mx-auto text-3xl border border-amber-500/30">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <div class="space-y-1">
                <h3 class="text-lg font-bold text-white">บันทึกรายงานผลปฏิบัติการสำเร็จ!</h3>
                <p id="modalSubmitDetails" class="text-xs text-slate-300 leading-relaxed font-mono">
                    บันทึกข้อมูลเข้าสู่ฐานข้อมูล SQLite และส่งซิงก์ Google Sheets เรียบร้อยแล้ว
                </p>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeSubmitModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs border border-white/10 transition">
                    ปิดหน้าต่าง
                </button>
            </div>
        </div>
    </div>

</div>

<script>
// ============================================================
// Interactive 3D Simulator Controller for Lab 02
// ============================================================
let currentSimMode = 'forcetable';

function switchSimulatorMode(mode) {
    currentSimMode = mode;
    const frame = document.getElementById('simViewerFrame');
    const tabFt = document.getElementById('tabSimForceTable');
    const tabStk = document.getElementById('tabSimStokes');
    const badge = document.getElementById('currentSimBadge');
    const hint = document.getElementById('currentSimHint');

    if (mode === 'forcetable') {
        tabFt.className = 'px-4 py-2 rounded-xl text-xs font-bold bg-amber-500 text-slate-950 shadow-md transition flex items-center gap-2';
        tabStk.className = 'px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2';
        badge.innerHTML = '⚖️ 3D Precision Force Table';
        hint.textContent = 'คลิกค้างแล้วลากเพื่อหมุน 360° | ปรับขนาดและมุมของรอกแต่ละตัวเพื่อสังเกตการเคลื่อนที่ของห่วงวงแหวน';
        if (frame && frame.contentWindow && typeof frame.contentWindow.switchMode === 'function') {
            frame.contentWindow.switchMode('forcetable');
        }
    } else {
        tabStk.className = 'px-4 py-2 rounded-xl text-xs font-bold bg-sky-500 text-slate-950 shadow-md transition flex items-center gap-2';
        tabFt.className = 'px-4 py-2 rounded-xl text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2';
        badge.innerHTML = '🦠 3D Microbial Stokes\' Drag Chamber';
        hint.textContent = 'เลือกชนิดเซลล์แบคทีเรียและของไหล สังเกตการตกตะกอนตามกฎของสโตกส์และวัดความเร็วปลาย vt';
        if (frame && frame.contentWindow && typeof frame.contentWindow.switchMode === 'function') {
            frame.contentWindow.switchMode('stokes');
        }
    }
}

function openSimulatorFullscreen() {
    const container = document.getElementById('simFrameContainer');
    if (!container) return;
    if (!document.fullscreenElement) {
        if (container.requestFullscreen) {
            container.requestFullscreen();
        } else if (container.webkitRequestFullscreen) {
            container.webkitRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
}

// ============================================================
// Snapshot & Proof Capture Logic
// ============================================================
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

    badge.className = "inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40";
    badge.innerHTML = '<i class="fa-solid fa-check"></i> บันทึกภาพหลักฐานเรียบร้อยแล้ว';
}

// Receive message from iframe if dispatched
window.addEventListener('message', (e) => {
    if (e.data && e.data.type === 'CAPTURED_PROOF' && e.data.dataUrl) {
        setProofImage(e.data.dataUrl);
    }
});

// ============================================================
// Automated Calculations for All Tables
// ============================================================
function calculateAllTables() {
    // 1. Table 2.1: Two-Vector Addition
    for (let r = 1; r <= 3; r++) {
        const f1m = parseFloat(document.getElementById(`t1_r${r}_f1m`).value) || 0;
        const f1a = parseFloat(document.getElementById(`t1_r${r}_f1a`).value) || 0;
        const f2m = parseFloat(document.getElementById(`t1_r${r}_f2m`).value) || 0;
        const f2a = parseFloat(document.getElementById(`t1_r${r}_f2a`).value) || 0;
        const eexp = parseFloat(document.getElementById(`t1_r${r}_eexp`).value) || 0;

        if (f1m > 0 && f2m > 0) {
            const rad1 = (f1a * Math.PI) / 180;
            const rad2 = (f2a * Math.PI) / 180;
            const rx = f1m * Math.cos(rad1) + f2m * Math.cos(rad2);
            const ry = f1m * Math.sin(rad1) + f2m * Math.sin(rad2);
            const rcalc = Math.sqrt(rx * rx + ry * ry);
            let thetacalc = (Math.atan2(ry, rx) * 180) / Math.PI;
            if (thetacalc < 0) thetacalc += 360;

            document.getElementById(`t1_r${r}_rcalc`).value = rcalc.toFixed(1);
            document.getElementById(`t1_r${r}_thetacalc`).value = thetacalc.toFixed(1);

            if (eexp > 0) {
                const err = (Math.abs(eexp - rcalc) / rcalc) * 100.0;
                document.getElementById(`t1_r${r}_err`).value = `${err.toFixed(2)}%`;
            }
        }
    }

    // 2. Table 2.2: Three-Vector Equilibrium
    for (let r = 1; r <= 2; r++) {
        const sfx = parseFloat(document.getElementById(`t2_r${r}_sfx`).value) || 0;
        const sfy = parseFloat(document.getElementById(`t2_r${r}_sfy`).value) || 0;
        const fnet = Math.sqrt(sfx * sfx + sfy * sfy);
        document.getElementById(`t2_r${r}_fnet`).value = fnet.toFixed(3);
    }

    // 3. Table 2.3: Stokes' Microbial Drag & Sedimentation
    const g = 9.80665;
    const mediaVisc = [1.00e-3, 1.00e-3, 1.15e-3, 1.76e-3]; // Pa·s
    const mediaRho = [1.00e3, 1.00e3, 1.015e3, 1.045e3]; // kg/m^3
    const cellRho = [1.10e3, 1.08e3, 1.25e3, 1.11e3]; // kg/m^3

    for (let r = 1; r <= 4; r++) {
        const dist = parseFloat(document.getElementById(`t3_r${r}_dist`).value) || 0; // um
        const time = parseFloat(document.getElementById(`t3_r${r}_time`).value) || 0; // s
        const rmicro = parseFloat(document.getElementById(`t3_r${r}_rmicro`).value) || 0; // um

        if (dist > 0 && time > 0) {
            const vtUm = dist / time; // um/s
            document.getElementById(`t3_r${r}_vt`).value = vtUm.toFixed(3);

            // Stokes' radius: r = sqrt( 9 * eta * vt / (2 * (rho_c - rho_f) * g) )
            const vtM = vtUm * 1e-6; // m/s
            const eta = mediaVisc[r - 1];
            const deltaRho = cellRho[r - 1] - mediaRho[r - 1];
            const rCalcM = Math.sqrt((9.0 * eta * vtM) / (2.0 * deltaRho * g));
            const rCalcUm = rCalcM * 1e6; // um

            document.getElementById(`t3_r${r}_rcalc`).value = rCalcUm.toFixed(2);

            if (rmicro > 0) {
                const err = (Math.abs(rCalcUm - rmicro) / rmicro) * 100.0;
                document.getElementById(`t3_r${r}_err`).value = `${err.toFixed(2)}%`;
            }
        }
    }
}

// ============================================================
// Strict Pre-Submission Validation & Backend Sync
// ============================================================
async function validateAndSubmitReport(e) {
    e.preventDefault();

    const fullname = document.getElementById('student_fullname').value.trim();
    const studentId = document.getElementById('student_id').value.trim();
    const program = document.getElementById('student_program').value.trim();
    const section = document.getElementById('student_section').value.trim();
    const proofBase64 = document.getElementById('image_proof_base64').value.trim();

    const calculations = document.getElementById('lab_calculations').value.trim();
    const discussion = document.getElementById('lab_discussion').value.trim();
    const conclusion = document.getElementById('lab_conclusion').value.trim();

    const q1 = document.getElementById('quiz_ans_1').value.trim();
    const q2 = document.getElementById('quiz_ans_2').value.trim();
    const q3 = document.getElementById('quiz_ans_3').value.trim();

    // 1. Check Identity
    if (!fullname || !studentId) {
        alert("⚠️ กรุณากรอกชื่อ-นามสกุล และรหัสนักศึกษาให้ครบถ้วนก่อนส่งรายงานครับ");
        document.getElementById('student_fullname').focus();
        return;
    }

    // 2. Check Screenshot Proof (Mandatory)
    if (!proofBase64) {
        alert("⚠️ ต้องมีภาพถ่ายหรือแคปหน้าจอระหว่างทดลองด้วยเสมอ!\n\nกรุณากดปุ่ม '📸 แคปหน้าจอ 3D Simulator' หรือ 'อัปโหลดไฟล์ภาพ' ในส่วนหลักฐานการทดลองด้านบนครับ");
        document.getElementById('proofBadgeStatus').scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }

    // 3. Check Table 2.1 Inputs
    for (let r = 1; r <= 3; r++) {
        const fields = ['f1m', 'f1a', 'f2m', 'f2a', 'rcalc', 'thetacalc', 'eexp', 'thetaexp', 'err'];
        for (let f of fields) {
            const input = document.getElementById(`t1_r${r}_${f}`);
            if (!input || !input.value.trim()) {
                alert(`⚠️ ตารางที่ 2.1: การทดลองครั้งที่ ${r} ช่อง (${f}) ยังไม่ได้กรอกข้อมูล กรุณากรอกให้ครบถ้วนก่อนส่งครับ`);
                input.focus();
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        }
    }

    // 4. Check Table 2.2 Inputs
    for (let r = 1; r <= 2; r++) {
        const fields = ['f1', 'f2', 'f3', 'sfx', 'sfy', 'fnet', 'ring'];
        for (let f of fields) {
            const input = document.getElementById(`t2_r${r}_${f}`);
            if (!input || !input.value.trim()) {
                alert(`⚠️ ตารางที่ 2.2: แถวที่ ${r} ช่อง (${f}) ยังไม่ได้กรอกข้อมูล กรุณากรอกให้ครบถ้วนก่อนส่งครับ`);
                input.focus();
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        }
    }

    // 5. Check Table 2.3 Inputs
    for (let r = 1; r <= 4; r++) {
        const fields = ['dist', 'time', 'vt', 'rcalc', 'rmicro', 'err'];
        for (let f of fields) {
            const input = document.getElementById(`t3_r${r}_${f}`);
            if (!input || !input.value.trim()) {
                alert(`⚠️ ตารางที่ 2.3: ตัวอย่างที่ ${r} ช่อง (${f}) ยังไม่ได้กรอกข้อมูล กรุณากรอกให้ครบถ้วนก่อนส่งครับ`);
                input.focus();
                input.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }
        }
    }

    // 6. Check Analysis & Narrative
    if (!calculations || !discussion || !conclusion) {
        alert("⚠️ กรุณากรอก 'แสดงวิธีคำนวณอย่างละเอียด', 'อภิปรายผล', และ 'สรุปผลการทดลอง' ให้ครบถ้วนก่อนส่งครับ");
        document.getElementById('lab_calculations').focus();
        return;
    }

    // 7. Check Post-Lab Quiz Answers
    if (!q1 || !q2 || !q3) {
        alert("⚠️ กรุณาตอบคำถามท้ายการทดลองให้ครบทั้ง 3 ข้อก่อนส่งรายงานครับ");
        document.getElementById('quiz_ans_1').focus();
        return;
    }

    // Construct Payload for Virtual Lab Backend
    const submitBtn = document.getElementById('btnSubmitReport');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner animate-spin"></i> กำลังบันทึกลงฐานข้อมูล SQLite & ซิงก์ Google Sheets...';

    // Collect table 2.1 data
    const table1Data = [];
    for (let r = 1; r <= 3; r++) {
        table1Data.push({
            trial: r,
            f1_mass: document.getElementById(`t1_r${r}_f1m`).value,
            f1_angle: document.getElementById(`t1_r${r}_f1a`).value,
            f2_mass: document.getElementById(`t1_r${r}_f2m`).value,
            f2_angle: document.getElementById(`t1_r${r}_f2a`).value,
            r_calc: document.getElementById(`t1_r${r}_rcalc`).value,
            theta_calc: document.getElementById(`t1_r${r}_thetacalc`).value,
            e_exp: document.getElementById(`t1_r${r}_eexp`).value,
            theta_exp: document.getElementById(`t1_r${r}_thetaexp`).value,
            percent_error: document.getElementById(`t1_r${r}_err`).value
        });
    }

    // Collect table 2.2 data
    const table2Data = [];
    for (let r = 1; r <= 2; r++) {
        table2Data.push({
            trial: r,
            f1: document.getElementById(`t2_r${r}_f1`).value,
            f2: document.getElementById(`t2_r${r}_f2`).value,
            f3: document.getElementById(`t2_r${r}_f3`).value,
            sum_fx: document.getElementById(`t2_r${r}_sfx`).value,
            sum_fy: document.getElementById(`t2_r${r}_sfy`).value,
            f_net: document.getElementById(`t2_r${r}_fnet`).value,
            ring_pos: document.getElementById(`t2_r${r}_ring`).value,
            eval: document.getElementById(`t2_r${r}_eval`).value
        });
    }

    // Collect table 2.3 data
    const table3Data = [];
    for (let r = 1; r <= 4; r++) {
        table3Data.push({
            sample: r,
            dist_um: document.getElementById(`t3_r${r}_dist`).value,
            time_s: document.getElementById(`t3_r${r}_time`).value,
            vt_um_s: document.getElementById(`t3_r${r}_vt`).value,
            r_calc_um: document.getElementById(`t3_r${r}_rcalc`).value,
            r_micro_um: document.getElementById(`t3_r${r}_rmicro`).value,
            percent_error: document.getElementById(`t3_r${r}_err`).value
        });
    }

    const payload = {
        action: 'submit_report',
        lab_id: 'lab02',
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
            table_2_1: table1Data,
            table_2_2: table2Data,
            table_2_3: table3Data
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
                ปฏิบัติการ: <strong>Lab 02 (Force Vectors &amp; Stokes' Drag)</strong><br>
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
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> ยืนยันการส่งรายงานปฏิบัติการที่ 2';
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
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab02'];
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
    const bodies = ['secStudentId_body', 'secEvidence_body', 'secDataTables_body', 'secCalculations_body', 'secQuestions_body', 'mathSuiteLab02'];
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
