<?php
$pageTitle = 'ปฏิบัติการที่ 13: โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา | Lab 13';
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
            <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 13</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="../chapters/ch12_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-book-bookmark"></i>
                <span>📖 อ่านทฤษฎีบทที่ 12</span>
            </a>
            <a href="../../virtual_lab/index.html?lab=13" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-flask"></i>
                <span>🥽 Virtual Lab Hub</span>
            </a>
            <a href="../webar/ar_aruco_textbook.html?lab=13&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-camera-rotate"></i>
                <span>📱 3D WebAR (Marker 11)</span>
            </a>
        </div>
    </div>
</div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100 max-w-7xl mx-auto px-4 sm:px-6">

    <!-- Lab Header Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-indigo-950/40 border border-emerald-500/30 rounded-3xl p-6 sm:p-10 mb-8 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mb-3">
                    <i class="fa-solid fa-flask-vial"></i> LAB 13 &bull; สัปดาห์ที่ 14 (3 ชั่วโมง)
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                    โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา
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

    

    <!-- Section: รายละเอียดขั้นตอนการทดลองและตารางบันทึกผล (จากเอกสารคำสอน) -->
    <section class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-sky-500/30 p-6 sm:p-8 mb-8 shadow-xl">
        <h2 class="text-lg sm:text-xl font-bold text-sky-400 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list"></i> ขั้นตอนการทดลองและบันทึกผลการทดลอง
        </h2>
        <div class="tex-article text-sm text-slate-200">
            <p><strong>ผลลัพธ์การเรียนรู้ที่ประเมินรวบยอด</strong>&emsp; CLO2 (ประยุกต์ใช้หลักการฟิสิกส์อธิบายเครื่องมือและแก้ปัญหา), CLO3 (จรรยาบรรณและความปลอดภัย), CLO4 (การทำงานร่วมกันและการนำเสนอทางวิทยาศาสตร์)</p>
<p><strong>แนวทางการดำเนินโครงงานย่อย (Mini-Project 15 คะแนน)</strong></p>
<ol class="tex-ol"><li>นักศึกษาแบ่งกลุ่ม กลุ่มละ 3–4 คน เลือกเครื่องมือหรือเทคนิคในห้องปฏิบัติการจุลชีววิทยา 1 หัวข้อจากรายการต่อไปนี้
<ul class="tex-ul"></ul></li><li><strong>หัวข้อที่ 1</strong>&emsp; ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave) และการป้องกันความล้มเหลวในการฆ่าเอนโดสปอร์</li><li><strong>หัวข้อที่ 2</strong>&emsp; ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge) การแปลงค่า RPM เป็น RCF และการจัดสมดุลโรเตอร์</li><li><strong>หัวข้อที่ 3</strong>&emsp; ฟิสิกส์ของกล้องจุลทรรศน์กำลังขยายสูง 100x และบทบาทของดัชนีหักเหน้ำมันช่วยส่อง</li><li><strong>หัวข้อที่ 4</strong>&emsp; ฟิสิกส์ไฟฟ้าในเทคนิคการย้อมสีแกรมและเครื่องแยกดีเอ็นเอ (Gel Electrophoresis)</li><li><strong>หัวข้อที่ 5</strong>&emsp; ฟิสิกส์ของตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) การไหลแบบราบเรียบของอากาศผ่านแผ่นกรอง HEPA และรังสี UV-C itemize</li><li>จัดทำแผ่นภาพอินโฟกราฟิกหรือสไลด์นำเสนอความยาว 10 นาที ประกอบด้วย (ก) หลักการและสมการฟิสิกส์ฉบับเข้าใจง่าย, (ข) ตัวอย่างการคำนวณหน้างาน 1 ข้อ และ (ค) แนวทางแก้ปัญหาและความปลอดภัยในห้องปฏิบัติการจุลชีววิทยา</li></ol>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
