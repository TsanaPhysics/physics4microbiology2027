<?php
$pageTitle = 'ปฏิบัติการที่ 7: ไฟฟ้าสถิตและกลไกประจุของสีย้อมเซลล์จุลินทรีย์ | Lab 07';
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
            <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 07</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="../chapters/ch07_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-book-bookmark"></i>
                <span>📖 อ่านทฤษฎีบทที่ 7</span>
            </a>
            <a href="../../virtual_lab/index.html?lab=7" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-flask"></i>
                <span>🥽 Virtual Lab Hub</span>
            </a>
            <a href="../webar/ar_aruco_textbook.html?lab=7&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-camera-rotate"></i>
                <span>📱 3D WebAR (Marker 6)</span>
            </a>
        </div>
    </div>
</div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100 max-w-7xl mx-auto px-4 sm:px-6">

    <!-- Lab Header Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-indigo-950/40 border border-purple-500/30 rounded-3xl p-6 sm:p-10 mb-8 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mb-3">
                    <i class="fa-solid fa-flask-vial"></i> LAB 07 &bull; สัปดาห์ที่ 8 (3 ชั่วโมง)
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                    ไฟฟ้าสถิตและกลไกประจุของสีย้อมเซลล์จุลินทรีย์
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
                <a href="../simulations/sim07_gram_stain_3d.html" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-up-right-from-square"></i> <span>เปิดเต็มจอ ↗</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=7&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-purple-600/30 hover:bg-purple-600/40 text-purple-200 border border-purple-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-vr-cardboard"></i> <span>3D WebAR</span>
                </a>
            </div>
        </div>

        <!-- Simulator Iframe Container -->
        <div class="w-full h-[540px] sm:h-[620px] rounded-2xl overflow-hidden border border-slate-700/80 bg-slate-950 relative shadow-inner">
            <iframe id="simFrame" src="../simulations/sim07_gram_stain_3d.html" class="w-full h-full border-0" allow="camera; fullscreen; xr-spatial-tracking"></iframe>
        </div>
    </section>
        

    <!-- Section: รายละเอียดขั้นตอนการทดลองและตารางบันทึกผล (จากเอกสารคำสอน) -->
    <section class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-sky-500/30 p-6 sm:p-8 mb-8 shadow-xl">
        <h2 class="text-lg sm:text-xl font-bold text-sky-400 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list"></i> ขั้นตอนการทดลองและบันทึกผลการทดลอง
        </h2>
        <div class="tex-article text-sm text-slate-200">
            <p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (กฎของคูลอมบ์และประจุไฟฟ้า), CLO3 (ความปลอดภัยและวินัยในห้องแล็บ), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 7.4)</strong></p>
<ul class="tex-ul"><li>ชุดทดลองไฟฟ้าสถิต (แท่งพลาสติก แท่งแก้ว ผ้าขนสัตว์ และลูกพิธหรือแผ่นอิเล็กโทรสโคป)</li><li>กระดาษกรองเซลลูโลส (ซึ่งมีประจุผิวเป็นลบจำลองผนังเซลล์แบคทีเรีย), สารละลายสีย้อมประจุบวก (Methylene Blue หรือ Crystal Violet) และสีย้อมประจุลบ (Eosin หรือสีผสมอาหารประจุลบ)</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การทดสอบแรงดึงดูดและแรงผลักระหว่างประจุไฟฟ้า</strong>&emsp; ถูแท่งพลาสติกด้วยผ้าขนสัตว์แล้วนำเข้าใกล้ลูกพิธ สังเกตการดึงดูดและการผลักกันเมื่อมีประจุชนิดเดียวกัน</li><li><strong>ตอนที่ 2 การยึดเกาะทางไฟฟ้าสถิตของสีย้อมประจุบวกและประจุลบ</strong>&emsp; หยดสีย้อมประจุบวก (Methylene Blue) และสีย้อมประจุลบ (Eosin) ปริมาตร $10\text{ }\mu\text{L}$ ลงบนแถบกระดาษกรองเซลลูโลส ทิ้งไว้ 2 นาที จากนั้นจุ่มปลายกระดาษลงในน้ำกลั่นเพื่อให้เกิดการชะล้าง (<strong>Washing/Chromatography</strong>) สังเกตว่าสีใดยึดเกาะแน่นกับเส้นใยประจุลบอยู่กับที่ และสีใดถูกน้ำชะเคลื่อนที่หลุดออกไปได้ง่าย</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ชนิดสีย้อมที่ทดสอบ</strong></th><th><strong>ประจุของไอออนสี</strong></th><th><strong>ระยะที่ถูกน้ำชะเคลื่อนที่ ($\text{cm}$)</strong></th><th><strong>สรุปแรงกระทำทางไฟฟ้ากับเส้นใยประจุลบ</strong></th></tr></thead><tbody><tr><td>Methylene Blue</td><td>ประจุบวก ($+$)</td><td>............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>Eosin / Nigrosin</td><td>ประจุลบ ($-$)</td><td>............</td><td><span class="tex-dotfill"></span></td></tr></tbody></table></div></div>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
