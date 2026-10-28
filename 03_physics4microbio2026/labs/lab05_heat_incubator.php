<?php
$pageTitle = 'ปฏิบัติการที่ 5: ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบ Incubator | Lab 05';
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
            <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 05</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="../chapters/ch05_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-book-bookmark"></i>
                <span>📖 อ่านทฤษฎีบทที่ 5</span>
            </a>
            <a href="../../virtual_lab/index.html?lab=5" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-flask"></i>
                <span>🥽 Virtual Lab Hub</span>
            </a>
            <a href="../webar/ar_aruco_textbook.html?lab=5&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-camera-rotate"></i>
                <span>📱 3D WebAR (Marker 4)</span>
            </a>
        </div>
    </div>
</div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100 max-w-7xl mx-auto px-4 sm:px-6">

    <!-- Lab Header Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-indigo-950/40 border border-amber-500/30 rounded-3xl p-6 sm:p-10 mb-8 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mb-3">
                    <i class="fa-solid fa-flask-vial"></i> LAB 05 &bull; สัปดาห์ที่ 5 (3 ชั่วโมง)
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                    ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบ Incubator
                </h1>
                <p class="text-slate-300 text-sm sm:text-base max-w-3xl leading-relaxed">
                    คู่มือปฏิบัติการมาตรฐาน &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (OBE มคอ.3 มรภ.รำไพพรรณี)
                </p>
            </div>
            <div class="flex flex-col sm:flex-row md:flex-col gap-2 shrink-0">
                <span class="px-4 py-2 rounded-xl bg-slate-800/80 border border-slate-700 text-xs font-mono text-slate-300 flex items-center gap-2">
                    <i class="fa-solid fa-clock text-amber-400"></i> ปฏิบัติการ 3 ชม.
                </span>
                <span class="px-4 py-2 rounded-xl bg-slate-800/80 border border-slate-700 text-xs font-mono text-emerald-400 flex items-center gap-2">
                    <i class="fa-solid fa-award"></i> CLO1 &bull; CLO2 &bull; CLO3 &bull; CLO4
                </span>
            </div>
        </div>
    </div>

    
    <!-- Section 2: ห้องปฏิบัติการ 3D เสมือนจริง (Interactive Simulator Viewport) -->
    <section class="bg-slate-900/90 backdrop-blur-md rounded-2xl border border-sky-500/40 p-4 sm:p-6 mb-8 shadow-2xl">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-gamepad text-sky-400"></i> 2. ห้องปฏิบัติการ 3D เสมือนจริง (Interactive 3D PBR)
                </h2>
                <p class="text-xs text-slate-400 font-mono">Three.js PBR Simulation &bull; ควบคุมตัวแปรแบบอินเทอร์แอคทีฟ</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="../simulations/sim05_incubator_3d.html" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-up-right-from-square"></i> <span>เปิดเต็มจอ ↗</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=5&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-purple-600/30 hover:bg-purple-600/40 text-purple-200 border border-purple-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-vr-cardboard"></i> <span>3D WebAR</span>
                </a>
            </div>
        </div>

        <!-- Simulator Iframe Container -->
        <div class="w-full h-[540px] sm:h-[620px] rounded-2xl overflow-hidden border border-slate-700/80 bg-slate-950 relative shadow-inner">
            <iframe id="simFrame" src="../simulations/sim05_incubator_3d.html" class="w-full h-full border-0" allow="camera; fullscreen; xr-spatial-tracking"></iframe>
        </div>
    </section>
        

    <!-- Section: รายละเอียดขั้นตอนการทดลองและตารางบันทึกผล (จากเอกสารคำสอน) -->
    <section class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-sky-500/30 p-6 sm:p-8 mb-8 shadow-xl">
        <h2 class="text-lg sm:text-xl font-bold text-sky-400 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list"></i> ขั้นตอนการทดลองและบันทึกผลการทดลอง
        </h2>
        <div class="tex-article text-sm text-slate-200">
            <p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (การคำนวณความร้อน), CLO2 (วิเคราะห์เสถียรภาพตู้ Incubator), CLO3 (ความปลอดภัยและวินัย), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 5.4)</strong></p>
<ul class="tex-ul"><li>กระป๋องแคลอริมิเตอร์พร้อมฉนวนหุ้ม, บีกเกอร์, เตาให้ความร้อนไฟฟ้า และเทอร์โมมิเตอร์ดิจิทัล 3 ชุด</li><li>ตู้อบเลี้ยงเชื้อ (Incubator) ที่ตั้งอุณหภูมิไว้ที่ $37.0\,^\circ\text{C}$ และอ่างน้ำควบคุมอุณหภูมิ (Water Bath) ที่ตั้งไว้ที่ $50.0\,^\circ\text{C}$</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 สมดุลความร้อนของการผสมน้ำ</strong>&emsp; ตวงน้ำอุณหภูมิห้องมวล $m_1 = 100\text{ g}$ ใส่ในแคลอริมิเตอร์ วัดอุณหภูมิ $T_1$ จากนั้นตวงน้ำอุ่นมวล $m_2 = 100\text{ g}$ อุณหภูมิประมาณ $T_2 = 60\,^\circ\text{C}$ เทผสมลงไป คนเบาๆ แล้วอ่านอุณหภูมิผสมสุดท้าย $T_{\text{mix}}$ เปรียบเทียบกับค่าทฤษฎี $(T_1 + T_2)/2$</li><li><strong>ตอนที่ 2 การตรวจสอบการกระจายอุณหภูมิในตู้อบ Incubator</strong>&emsp; วางหัววัดเทอร์โมมิเตอร์ดิจิทัลไว้ที่ 3 ตำแหน่งในตู้อบ ได้แก่ ชั้นบนสุด ชั้นกลาง และชั้นล่างใกล้ประตู อ่านค่าอุณหภูมิจริงและคำนวณส่วนเบี่ยงเบนไปจากค่าที่ตั้งไว้ ($37.0\,^\circ\text{C}$)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ตำแหน่งวัดในตู้ Incubator ($37.0\,^\circ\text{C}$)</strong></th><th><strong>ครั้งที่ 1 ($^\circ\text{C}$)</strong></th><th><strong>ครั้งที่ 2 ($^\circ\text{C}$)</strong></th><th><strong>ค่าเฉลี่ย ($^\circ\text{C}$)</strong></th><th><strong>ผลต่างจาก $37.0\,^\circ\text{C}$</strong></th></tr></thead><tbody><tr><td>ชั้นบนสุด (ด้านใน)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ชั้นกลาง (จุดอ้างอิง)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ชั้นล่าง (ใกล้ขอบประตู)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
