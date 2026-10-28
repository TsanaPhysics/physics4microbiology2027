<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล | Lab 01';
$basePath = '../';
include '../includes/header.php';
?>

<!-- 🧭 Standardized Breadcrumb & Two-Way Course Navigation Bar -->
<div class="standardized-lab-breadcrumb max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6 mb-6 mt-6">
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
            <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB 01</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="../chapters/ch01_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-book-bookmark"></i>
                <span>📖 อ่านทฤษฎีบทที่ 1</span>
            </a>
            <a href="../../virtual_lab/index.html?lab=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-flask"></i>
                <span>🥽 Virtual Lab Hub</span>
            </a>
            <a href="../webar/ar_aruco_textbook.html?lab=1&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-camera-rotate"></i>
                <span>📱 3D WebAR (Marker 0)</span>
            </a>
        </div>
    </div>
</div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100 max-w-7xl 2xl:max-w-[1600px] mx-auto px-4 sm:px-6">

    <!-- Lab Header Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-indigo-950/40 border border-emerald-500/30 rounded-3xl p-6 sm:p-10 mb-8 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mb-3">
                    <i class="fa-solid fa-flask-vial"></i> LAB 01 &bull; สัปดาห์ที่ 1 (3 ชั่วโมง)
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                    การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล
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

    
    <!-- Section 1: แกลเลอรีภาพจำลอง 3 มิติเชิงเทคนิค (3D Metrology Visuals) -->
    <section class="bg-slate-900/90 backdrop-blur-md rounded-2xl border border-emerald-500/30 p-5 sm:p-6 mb-8 shadow-xl">
        <div class="flex items-center justify-between flex-wrap gap-2 mb-4 pb-3 border-b border-slate-800">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-cube text-emerald-400"></i> 1. ภาพจำลอง 3 มิติเชิงเทคนิคประจำปฏิบัติการที่ 1
                </h2>
                <p class="text-xs text-slate-400 font-mono">โครงสร้างเครื่องมือวัดละเอียด กลไกลูกสูบไมโครปิเปต และเทคนิคการเจือจางเชื้อ 10 เท่า</p>
            </div>
            <span class="text-xs font-mono text-emerald-300 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/30">3D Photorealistic Models</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- 3D Card 1: Micropipette Mechanism -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-amber-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_micropipette_3d.jpg" alt="กลไกภาพตัดขวาง 3 มิติ ไมโครปิเปต P1000" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-amber-300 block font-bold">🔬 กลไกลูกสูบ 2 จังหวะของไมโครปิเปต P1000</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        แสดงภาพตัดขวาง First Stop (จังหวะดูดสาร) และ Second Stop (จังหวะเป่าสารออกหมดจด) พร้อมแกนสปริงสอบเทียบความเที่ยงตรง
                    </p>
                </div>
            </div>

            <!-- 3D Card 2: Serial Dilution -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-emerald-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_serial_dilution_3d.jpg" alt="การเจือจางเชื้อแบบลำดับส่วน 10 เท่า 3 มิติ" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-emerald-300 block font-bold">🧪 การเจือจางแบบลำดับส่วน 10 เท่า (10-Fold Serial Dilution)</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ทักษะการใช้ไมโครปิเปตดูดสาร $100\text{ }\mu\text{L}$ ถ่ายทอดสารละลายเชื้อ 5 หลอด ($10^{-1}$ ถึง $10^{-5}$) และการนับโคโลนี CFU
                    </p>
                </div>
            </div>

            <!-- 3D Card 3: Scale Comparison -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-cyan-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_scale_3d.jpg" alt="สเกลขนาดในโลกจุลชีววิทยา 3 มิติ" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-cyan-300 block font-bold">📏 สเกลขนาดในโลกจุลชีววิทยาและการวัดละเอียด</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        เปรียบเทียบสเกลโคโลนี ($\text{mm}$), เซลล์แบคทีเรีย ($\mu\text{m}$), และอนุภาคไวรัส/DNA ($\text{nm}$) สำหรับการเลือกเครื่องมือวัด
                    </p>
                </div>
            </div>

            <!-- 3D Card 4: Kibble Balance -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-purple-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_kibble_balance_3d.jpg" alt="เครื่องชั่งคิบบิล Kibble Balance 3 มิติ" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-purple-300 block font-bold">⚖️ มาตรฐานมวลควอนตัม เครื่องชั่งคิบบิล (Kibble Balance)</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        ต้นแบบการนิยาม 1 กิโลกรัมผ่านค่าคงตัวของพลังค์ ($h$) เชื่อมโยงสู่การสอบเทียบเครื่องชั่งดิจิทัล 4 ตำแหน่งในห้องแล็บ
                    </p>
                </div>
            </div>

            <!-- 3D Card 5: Accuracy vs Precision -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-rose-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_accuracy_precision_3d.jpg" alt="เปรียบเทียบความแม่นและความเที่ยง 3 มิติ" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-rose-300 block font-bold">🎯 ความแม่น (Accuracy) เทียบกับ ความเที่ยง (Precision)</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        เปรียบเทียบ 4 รูปแบบการกระจายตัวของค่าการวัดสำหรับการประเมินทักษะการดูดจ่ายสารด้วยไมโครปิเปต
                    </p>
                </div>
            </div>

            <!-- 3D Card 6: Lab 01 Complete Apparatus Set -->
            <div class="rounded-xl overflow-hidden bg-slate-950/80 border border-slate-800 hover:border-teal-500/40 transition-all flex flex-col shadow-lg">
                <div class="aspect-video overflow-hidden">
                    <img src="../images/sec_3d/ch01_lab_apparatus_3d.jpg" alt="ชุดอุปกรณ์ปฏิบัติการที่ 1 ฉบับ 3 มิติ" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                <div class="p-3.5 space-y-1">
                    <strong class="text-xs sm:text-sm text-teal-300 block font-bold">🧰 ชุดเครื่องมือและอุปกรณ์ประจำโต๊ะปฏิบัติการที่ 1</strong>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        จำลอง 3 มิติของเวอร์เนียร์คาลิปเปอร์ ไมโครมิเตอร์ จานเพาะเชื้อ สไลด์แก้ว ไมโครปิเปต และเครื่องชั่งดิจิทัล
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: ห้องปฏิบัติการ 3D เสมือนจริง (Interactive Simulator Viewport with Multi-Instrument Switcher) -->
    <section class="bg-slate-900/90 backdrop-blur-md rounded-2xl border border-sky-500/40 p-4 sm:p-6 mb-8 shadow-2xl">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-gamepad text-sky-400"></i> 2. ห้องปฏิบัติการ 3D เสมือนจริง (Interactive 3D PBR)
                </h2>
                <p class="text-xs text-slate-400 font-mono">Three.js PBR Simulation &bull; เลือกเครื่องมือวัด 3 มิติประจำแล็บ 01</p>
            </div>
            <div class="flex items-center gap-2">
                <a id="btnCurrentFullscreen" href="../simulations/sim_micropipette_3d.html" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-up-right-from-square"></i> <span>เปิดเต็มจอ ↗</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab=1&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-purple-600/30 hover:bg-purple-600/40 text-purple-200 border border-purple-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-vr-cardboard"></i> <span>3D WebAR</span>
                </a>
            </div>
        </div>

        <!-- 🎛️ Multi-Instrument Selection Tabs (เครื่องมือวัด 3 ชนิดของ Lab 01) -->
        <div class="flex flex-wrap items-center gap-2 p-1.5 bg-slate-950/80 rounded-xl border border-slate-800 mb-3">
            <button onclick="switchSim('micropipette')" id="tab-micropipette" class="sim-tab-btn flex-1 min-w-[200px] py-2 px-3.5 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2 bg-sky-500 text-slate-950 shadow-lg">
                <i class="fa-solid fa-pipette"></i>
                <span>ไมโครปิเปต P1000 & เครื่องชั่ง</span>
            </button>
            <button onclick="switchSim('vernier')" id="tab-vernier" class="sim-tab-btn flex-1 min-w-[200px] py-2 px-3.5 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-700/80">
                <i class="fa-solid fa-ruler-combined"></i>
                <span>เวอร์เนียร์แคลิปเปอร์ (0.05 mm)</span>
            </button>
            <button onclick="switchSim('micrometer')" id="tab-micrometer" class="sim-tab-btn flex-1 min-w-[200px] py-2 px-3.5 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-700/80">
                <i class="fa-solid fa-microscope"></i>
                <span>ไมโครมิเตอร์วัดนอก (0.01 mm)</span>
            </button>
        </div>

        <!-- Simulator Iframe Container -->
        <div class="w-full h-[560px] sm:h-[640px] rounded-2xl overflow-hidden border border-slate-700/80 bg-slate-950 relative shadow-inner">
            <iframe id="simFrame" src="../simulations/sim_micropipette_3d.html" class="w-full h-full border-0" allow="camera; fullscreen; xr-spatial-tracking"></iframe>
        </div>
    </section>

    <script>
    const simFiles = {
        micropipette: '../simulations/sim_micropipette_3d.html',
        vernier: '../simulations/sim_vernier_caliper_3d.html',
        micrometer: '../simulations/sim_micrometer_3d.html'
    };

    function switchSim(tool) {
        const frame = document.getElementById('simFrame');
        const fsBtn = document.getElementById('btnCurrentFullscreen');
        const targetUrl = simFiles[tool];
        if (targetUrl && frame) {
            frame.src = targetUrl;
            if (fsBtn) fsBtn.href = targetUrl;
        }

        // Update active tab styles
        document.querySelectorAll('.sim-tab-btn').forEach(btn => {
            btn.className = 'sim-tab-btn flex-1 min-w-[200px] py-2 px-3.5 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2 bg-slate-800/80 text-slate-300 hover:text-white hover:bg-slate-700/80';
        });
        const activeBtn = document.getElementById('tab-' + tool);
        if (activeBtn) {
            activeBtn.className = 'sim-tab-btn flex-1 min-w-[200px] py-2 px-3.5 rounded-lg text-xs font-bold transition flex items-center justify-center gap-2 bg-sky-500 text-slate-950 shadow-lg';
        }
    }
    </script>
        

    <!-- Section: รายละเอียดขั้นตอนการทดลองและตารางบันทึกผล (จากเอกสารคำสอน) -->
    <section class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-sky-500/30 p-6 sm:p-8 mb-8 shadow-xl">
        <h2 class="text-lg sm:text-xl font-bold text-sky-400 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list"></i> ขั้นตอนการทดลองและบันทึกผลการทดลอง
        </h2>
        <div class="tex-article text-sm text-slate-200">
            <p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (ความรู้การวัดและแปลงหน่วย), CLO3 (วินัย ความปลอดภัย และความซื่อสัตย์ในการบันทึกข้อมูลจริง), CLO4 (การทำงานร่วมกันและเขียนรายงาน)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 1.5)</strong></p>
<ul class="tex-ul"><li>เวอร์เนียร์คาลิปเปอร์ (ความละเอียด $0.05\text{ mm}$) และไมโครมิเตอร์ (ความละเอียด $0.01\text{ mm}$)</li><li>จานเพาะเชื้อแก้ว (Petri Dish), หลอดทดลอง (Test Tube) และแผ่นสไลด์กล้องจุลทรรศน์</li><li>ไมโครปิเปตขนาด P1000 ($100\text{--}1{,}000\text{ }\mu\text{L}$) และ P200 ($20\text{--}200\text{ }\mu\text{L}$) พร้อมทิปปลอดเชื้อ</li><li>เครื่องชั่งดิจิทัลละเอียดทศนิยม 4 ตำแหน่ง บีกเกอร์ใส่น้ำกลั่น และผงวุ้นอาหารเลี้ยงเชื้อจำลอง (โซเดียมคลอไรด์)</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การวัดมิติภาชนะทางจุลชีววิทยา</strong>&emsp; ใช้เวอร์เนียร์คาลิปเปอร์วัดเส้นผ่านศูนย์กลางภายในและความลึกของจานเพาะเชื้อจำนวน 3 ครั้ง และใช้ไมโครมิเตอร์วัดความหนาของแผ่นสไลด์แก้วจำนวน 3 ครั้ง บันทึกค่าเฉลี่ยและแปลงหน่วยเป็นไมโครเมตร ($\mu\text{m}$)</li><li><strong>ตอนที่ 2 การตรวจสอบความแม่นและความเที่ยงของไมโครปิเปต</strong>&emsp; วางบีกเกอร์พลาสติกขนาดเล็กบนเครื่องชั่งดิจิทัลแล้วกดปุ่มเซตศูนย์ (<strong>Tare</strong>) จากนั้นตั้งค่าไมโครปิเปต P1000 ที่ปริมาตร $500\text{ }\mu\text{L}$ ดูดน้ำกลั่นหยดลงในบีกเกอร์ อ่านค่ามวลเป็นกรัม ($\text{g}$) ทำซ้ำ 3 ครั้ง แล้วคำนวณค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนเทียบกับค่ามาตรฐาน $0.5000\text{ g}$</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง (สำหรับนักศึกษาบันทึกค่าจริงในห้องปฏิบัติการ)</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>รายการที่วัด</strong></th><th><strong>ครั้งที่ 1</strong></th><th><strong>ครั้งที่ 2</strong></th><th><strong>ครั้งที่ 3</strong></th><th><strong>ค่าเฉลี่ย</strong></th><th><strong>หน่วย $\mu\text{m}$ / $\mu\text{L}$</strong></th></tr></thead><tbody><tr><td>เส้นผ่านศูนย์กลางจานเพาะเชื้อ ($\text{mm}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span> $\mu\text{m}$</td></tr><tr><td>ความหนาของแผ่นสไลด์แก้ว ($\text{mm}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span> $\mu\text{m}$</td></tr><tr><td>มวลน้ำกลั่นจากปิเปต $500\text{ }\mu\text{L}$ ($\text{g}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td>คลาดเคลื่อน ............ %</td></tr></tbody></table></div></div>
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
