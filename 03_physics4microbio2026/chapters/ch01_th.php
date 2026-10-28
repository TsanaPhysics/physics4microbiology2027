<?php
$pageTitle = "บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์";
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
                    <i class="fas fa-book-open"></i> สารบัญ 12 บทเรียน
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 1</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 01 &bull; UNITS & METROLOGY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ระบบหน่วยและการวัดในโลกจุลทรรศน์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 1)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 1
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=0&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 0 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab01_measurement.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 01: การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล (3 ชั่วโมง)</span>
                </a>
            
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-10">

            
        <!-- Curriculum Planbox (แผนบริหารการสอน) -->
        <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-500/10 via-slate-800/40 to-slate-900 border border-indigo-500/30 shadow-xl mb-12">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                    <i class="fa-solid fa-chalkboard-user text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 1&emsp; ระบบหน่วยและการวัดในโลกจุลทรรศน์ (สัปดาห์ที่ 1)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>1.1 ความสำคัญของระบบหน่วยเอสไอและคำอุปสรรคในงานจุลชีววิทยา</li><li>1.2 การแปลงหน่วยขนาดเซลล์จุลินทรีย์และปริมาตรสารละลายโดยใช้เทคนิคบันไดเลื่อนจุดทศนิยม</li><li>1.3 เลขนัยสำคัญ ความเที่ยง ความแม่น และความคลาดเคลื่อนของการวัดในห้องปฏิบัติการ</li><li>1.4 ปฏิบัติการที่ 1 การวัดละเอียดด้วยเวอร์เนียร์ ไมโครมิเตอร์ และทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>อธิบายระบบหน่วยมาตรฐานสากลและคำอุปสรรคที่ใช้ระบุขนาดของแบคทีเรีย ยีสต์ ไวรัส และปริมาตรสารละลายได้ถูกต้อง <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>คำนวณแปลงหน่วยระหว่างมิลลิเมตร ไมโครเมตร นาโนเมตร และระหว่างมิลลิลิตร ไมโครลิตร โดยไม่ต้องใช้คณิตศาสตร์ซับซ้อนได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการใช้เวอร์เนียร์คาลิปเปอร์ ไมโครมิเตอร์ เครื่องชั่งละเอียด และไมโครปิเปตอย่างถูกวิธี มีวินัย และบันทึกผลตามความเป็นจริง <strong>(CLO3 เชื่อมโยง PLO1)</strong></li><li>ร่วมกันวิเคราะห์ความคลาดเคลื่อนของการวัดและเขียนรายงานปฏิบัติการกลุ่มได้อย่างถูกต้อง <strong>(CLO4 เชื่อมโยง PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>ขั้นนำเข้าสู่บทเรียน</strong>&emsp; ผู้สอนยกตัวอย่างปัญหาจริงในห้องแล็บจุลชีววิทยา เช่น การดูดสารละลายผิดหน่วยระหว่าง $100\text{ }\mu\text{L}$ กับ $1\text{ mL}$ ซึ่งส่งผลต่อความเข้มข้นของเชื้อแบคทีเรียถึง 10 เท่า</li><li><strong>ขั้นสอนและฝึกทักษะคำนวณแบบเข้าใจง่าย</strong>&emsp; ใช้แผนภาพบันไดคำอุปสรรค ($\times 1{,}000$ และ $\div 1{,}000$) แทนการคิดเลขยกกำลังที่ซับซ้อน พร้อมทำใบงานคู่คิด (Think-Pair-Share)</li><li><strong>ขั้นปฏิบัติการทดลอง</strong>&emsp; นักศึกษาแบ่งกลุ่มฝึกวัดขนาดจานเพาะเชื้อ หลอดทดลอง และทดสอบความแม่นของการดูดน้ำกลั่นด้วยไมโครปิเปตบนเครื่องชั่งทศนิยม 4 ตำแหน่ง</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 1 และตารางบันไดคำอุปสรรคสำหรับนักจุลชีววิทยา</li><li>ชุดเครื่องมือวัดละเอียด (Vernier Caliper, Micrometer), ไมโครปิเปตขนาด P20, P200, P1000 และเครื่องชั่งดิจิทัล</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>แบบทดสอบก่อนเรียนและหลังเรียนเรื่องการแปลงหน่วยระดับไมโครและนาโน <strong>(CLO1)</strong></li><li>การสังเกตทักษะการจับไมโครปิเปต การอ่านสเกล และความซื่อสัตย์ในการบันทึกข้อมูล <strong>(CLO3)</strong></li><li>รายงานปฏิบัติการที่ 1 เรื่องการวัดและเครื่องมือพื้นฐานในงานจุลชีววิทยา <strong>(CLO4)</strong></li></ul>
            </div>
        </div>
        

            
                <!-- Section: ความสำคัญของระบบหน่วยเอสไอและคำอุปสรรคในงานจุลชีววิทยา -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">1.1 ระบบหน่วยสากลเอสไอ (SI Units) วิวัฒนาการจากอดีตสู่ปัจจุบัน และบทบาทในงานจุลชีววิทยา</h2>
            <div class="tex-article leading-relaxed space-y-6">
                
                <figure class="tex-figure tex-figure-photo" id="fig-1.1">
                    <img src="../images/maintex/sec_3d/ch01_s1.jpg" alt="ภาพที่ 1.1 สเกลขนาดในโลกจุลชีววิทยา" loading="lazy">
                    <figcaption><strong>ภาพที่ 1.1</strong>&ensp;การเปรียบเทียบสเกลขนาดในโลกจุลชีววิทยาตั้งแต่ระดับโคโลนีบนจานเพาะเชื้อ ($\text{mm}$), เซลล์แบคทีเรีย ($\mu\text{m}$) ไปจนถึงอนุภาคไวรัสและชีวโมเลกุล ($\text{nm}$) พร้อมเครื่องมือวัดละเอียดมาตรฐานสากล</figcaption>
                </figure>

                <p>ระบบหน่วยระหว่างชาติ หรือ <strong>ระบบหน่วยเอสไอ</strong> (<strong>International System of Units</strong> หรือ <strong>Le Système International d'Unités — SI</strong>) เป็นภาษาสากลทางวิทยาศาสตร์ที่ทำให้นักจุลชีววิทยาทั่วโลกสามารถสื่อสารข้อมูลเชิงปริมาณร่วมกันได้อย่างเที่ยงตรง ไม่ว่าจะเป็นขนาดของเซลล์ ความหนาของเยื่อหุ้มเซลล์ อุณหภูมิการบ่มเพาะเชื้อ เวลาการแบ่งเซลล์ ปริมาตรสารละลายบัฟเฟอร์ และความเข้มข้นของสารอาหาร</p>

                <div class="p-6 rounded-2xl bg-gradient-to-br from-cyan-950/40 via-slate-900 to-slate-900 border border-cyan-500/30 space-y-3">
                    <div class="flex items-center gap-2 text-cyan-400 font-bold text-base">
                        <i class="fa-solid fa-atom"></i> การปฏิวัติประวัติศาสตร์ระบบหน่วยเอสไอ ค.ศ. 2019 (The 2019 SI Redefinition)
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        ในอดีต ระบบหน่วยวัดผูกโยงอยู่กับ <strong>"วัตถุประดิษฐ์ทางกายภาพ (Physical Artifacts)"</strong> เช่น แท่งเมตรมาตรฐานแพลทินัม-อิริเดียม หรือก้อนกิโลกรัมต้นแบบนานาชาติ (<em>Le Grand K</em>) ซึ่งมีข้อจำกัดร้ายแรงคือ <em>มวลสามารถเปลี่ยนแปลงได้ตามกาลเวลาจากการสึกหรอหรือปนเปื้อนฝุ่นผงระดับไมโครกรัม</em> และหากวัตถุต้นแบบถูกทำลาย มาตรฐานการวัดของมนุษยชาติจะสูญสิ้นไปทันที
                    </p>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        จนกระทั่งเมื่อวันที่ <strong>20 พฤษภาคม ค.ศ. 2019</strong> ที่ประชุมใหญ่ว่าด้วยการชั่งตวงวัด (CGPM / BIPM) ได้ประกาศการเปลี่ยนแปลงครั้งประวัติศาสตร์ โดย <strong>"ยกเลิกการนิยามหน่วยผ่านวัตถุประดิษฐ์ทั้งหมด"</strong> แล้วเปลี่ยนมากำหนดค่าคงที่ที่แน่นอน (Exact Numerical Values โดยไม่มีความคลาดเคลื่อน $\Delta = 0$) ให้กับ <strong>7 ค่าคงตัวพื้นฐานแห่งเอกภพ (The 7 Defining Physical Constants)</strong> ทำให้ทุกห้องปฏิบัติการทั่วโลกสามารถสร้างมาตรฐานหน่วยวัดที่เที่ยงตรงได้ด้วยตนเอง
                    </p>
                </div>

                <!-- SVG Diagram 1: SI Network -->
                <figure class="tex-figure tex-figure-diagram my-8" id="fig-si-network">
                    <div class="rounded-2xl overflow-hidden border border-slate-700/80 shadow-2xl bg-slate-950 p-2">
                        <img src="../images/maintex/tikz/ch01_si_network.svg" alt="แผนผัง 7 ค่าคงตัวพื้นฐานกับ 7 หน่วยฐานเอสไอ" class="w-full h-auto" loading="lazy">
                    </div>
                    <figcaption><strong>ภาพที่ 1.2</strong>&ensp;แผนผังเครือข่ายความสัมพันธ์ระหว่าง 7 ค่าคงตัวพื้นฐานแห่งเอกภพ (Defining Constants) สู่ 7 หน่วยฐานเอสไอ (Revised SI 2019) ได้แก่ วินาที ($\text{s}$), เมตร ($\text{m}$), กิโลกรัม ($\text{kg}$), แอมแปร์ ($\text{A}$), เคลวิน ($\text{K}$), โมล ($\text{mol}$) และแคนเดลา ($\text{cd}$)</figcaption>
                </figure>

                <h3 class="text-xl font-bold text-white pt-4 pb-2 border-b border-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-list-ol text-cyan-400"></i> เจาะลึก 7 หน่วยฐานเอสไอ (7 SI Base Units): นิยามจากอดีตสู่ปัจจุบัน
                </h3>

                <!-- Unit 1: Metre -->
                <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-cyan-500/20 text-cyan-400 font-bold flex items-center justify-center font-mono">1</span>
                            <div>
                                <h4 class="text-base font-bold text-white">ความยาว (Length, $l$) — เมตร (Metre, $\text{m}$)</h4>
                                <span class="text-xs text-cyan-400 font-mono">ตรึงค่าคงตัว: อัตราเร็วของแสงในสุญญากาศ $c = 299{,}792{,}458\text{ m/s}$</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 text-xs font-mono font-bold border border-cyan-500/30">SI BASE: m</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                            <strong class="text-amber-400 block mb-1">📜 นิยามในอดีต:</strong>
                            <ul class="list-disc list-inside space-y-1">
                                <li><strong>ค.ศ. 1791:</strong> หนึ่งในสิบล้าน ($	frac{1}{10^7}$) ของระยะทางจากขั้วโลกเหนือถึงเส้นศูนย์สูตรผ่านปารีส</li>
                                <li><strong>ค.ศ. 1889:</strong> ระยะห่างระหว่างรอยขีดบนแท่งโลหะผสมแพลทินัม-อิริเดียม 90:10 (Standard Metre Bar)</li>
                                <li><strong>ค.ศ. 1960:</strong> $1{,}650{,}763.73$ เท่าของความยาวคลื่นแสงสีส้ม-แดงของอะตอมคริปทอน-86 ($^{86}\text{Kr}$)</li>
                            </ul>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                            <strong class="text-emerald-400 block mb-1">🔬 นิยามในปัจจุบัน (ตั้งแต่ ค.ศ. 1983):</strong>
                            <p class="leading-relaxed">
                                <em>"ระยะทางที่แสงเคลื่อนที่ได้ในสุญญากาศ ในช่วงเวลาเท่ากับ $rac{1}{299{,}792{,}458}$ วินาที"</em> โดยกำหนดให้อัตราเร็วแสงในสุญญากาศ $c$ มีค่าคงที่แน่นอนเท่ากับ $299{,}792{,}458\text{ m/s}$ ไม่มีความคลาดเคลื่อน
                            </p>
                            <div class="mt-2 text-slate-400 font-mono text-[11px]">
                                <strong>บทบาทในจุลชีววิทยา:</strong> วัดเส้นผ่านศูนย์กลางโคโลนีบนจานวุ้น ($\text{mm}$), วัดขนาดเซลล์แบคทีเรีย ($\mu\text{m}$), ความหนาเยื่อหุ้มเซลล์ และขนาดอนุภาคไวรัส ($\text{nm}$)
                            </div>
                        </div>
                    </div>
                    <!-- Figure: Def Metre -->
                    <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                        <img src="../images/maintex/tikz/ch01_def_meter.svg" alt="วิวัฒนาการนิยาม 1 เมตร" class="w-full h-auto" loading="lazy">
                    </div>
                </div>

                <!-- Unit 2: Kilogram -->
                <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-amber-500/20 text-amber-400 font-bold flex items-center justify-center font-mono">2</span>
                            <div>
                                <h4 class="text-base font-bold text-white">มวล (Mass, $m$) — กิโลกรัม (Kilogram, $\text{kg}$)</h4>
                                <span class="text-xs text-amber-400 font-mono">ตรึงค่าคงตัว: ค่าคงตัวของพลังค์ $h = 6.626\,070\,15 \times 10^{-34}\text{ J}\cdot\text{s}$ ($\text{kg}\cdot\text{m}^2\cdot\text{s}^{-1}$)</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-300 text-xs font-mono font-bold border border-amber-500/30">SI BASE: kg</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                            <strong class="text-amber-400 block mb-1">📜 นิยามในอดีต:</strong>
                            <ul class="list-disc list-inside space-y-1">
                                <li><strong>ค.ศ. 1795:</strong> มวลของน้ำบริสุทธิ์ปริมาตร $1\text{ dm}^3$ ($1\text{ L}$) ที่จุดเยือกแข็ง (ต่อมาเปลี่ยนเป็นอุณหภูมิความหนาแน่นสูงสุด $4^\circ\text{C}$)</li>
                                <li><strong>ค.ศ. 1889–2019:</strong> มวลของทรงกระบอกโลหะผสมแพลทินัม-อิริเดียมต้นแบบนานาชาติ (<em>International Prototype of the Kilogram — IPK / Le Grand K</em>) ซึ่งเก็บรักษาในครอบแก้วสุญญากาศ 3 ชั้น ณ BIPM เมืองเซฟวร์ ประเทศฝรั่งเศส (มวลลอยตัวเปลี่ยนไปราว $50\,\mu\text{g}$ ในรอบ 100 ปี)</li>
                            </ul>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                            <strong class="text-emerald-400 block mb-1">🔬 นิยามในปัจจุบัน (ตั้งแต่ 20 พฤษภาคม 2019):</strong>
                            <p class="leading-relaxed">
                                <em>"นิยามผ่านค่าคงตัวของพลังค์ ($h$) ให้มีค่าคงที่เท่ากับ $6.626\,070\,15 \times 10^{-34}\text{ kg}\cdot\text{m}^2\cdot\text{s}^{-1}$"</em> โดยใช้ <strong>เครื่องชั่งคิบบิล (Kibble Balance)</strong> สร้างสมดุลระหว่างแรงโน้มถ่วงทางกลกับแรงแม่เหล็กไฟฟ้าในระดับควอนตัม
                            </p>
                            <div class="mt-2 text-slate-400 font-mono text-[11px]">
                                <strong>บทบาทในจุลชีววิทยา:</strong> ชั่งผงอาหารเลี้ยงเชื้อ ($g, \text{mg}$), การชั่งน้ำกลั่นสอบเทียบความแม่นยำของไมโครปิเปต ($1{,}000\,\mu\text{L} = 1.0000\text{ g}$) และแรงเหวี่ยงหนีศูนย์กลางในการปั่นตกตะกอนเชื้อ
                            </div>
                        </div>
                    </div>
                    <!-- Figure: Def Kilogram -->
                    <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                        <img src="../images/maintex/tikz/ch01_def_kilogram.svg" alt="วิวัฒนาการนิยาม 1 กิโลกรัม" class="w-full h-auto" loading="lazy">
                    </div>
                </div>

                <!-- Unit 3: Second -->
                <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-sky-500/20 text-sky-400 font-bold flex items-center justify-center font-mono">3</span>
                            <div>
                                <h4 class="text-base font-bold text-white">เวลา (Time, $t$) — วินาที (Second, $\text{s}$)</h4>
                                <span class="text-xs text-sky-400 font-mono">ตรึงค่าคงตัว: ความถี่ทรานซิชันไฮเปอร์ไฟน์ของอะตอม $^{133}\text{Cs}$, $\Delta
u_{\text{Cs}} = 9{,}192{,}631{,}770\text{ Hz}$ ($\text{s}^{-1}$)</span>
                            </div>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-sky-500/10 text-sky-300 text-xs font-mono font-bold border border-sky-500/30">SI BASE: s</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-slate-300">
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-slate-800/80">
                            <strong class="text-amber-400 block mb-1">📜 นิยามในอดีต:</strong>
                            <ul class="list-disc list-inside space-y-1">
                                <li><strong>ก่อน ค.ศ. 1956:</strong> $rac{1}{86{,}400}$ ของวันสุริยคติเฉลี่ย (Mean Solar Day) โดยที่ $1\text{ วัน} = 24 \times 60 \times 60\text{ วินาที}$ (แต่โลกหมุนช้าลงอย่างช้า ๆ จากแรงเสียดทานของน้ำขึ้นน้ำลง)</li>
                                <li><strong>ค.ศ. 1956–1967:</strong> เสี้ยวส่วนของปีทรอปิก ค.ศ. 1900 (Ephemeris Second)</li>
                            </ul>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-950/70 border border-emerald-500/30">
                            <strong class="text-emerald-400 block mb-1">🔬 นิยามในปัจจุบัน (ตั้งแต่ ค.ศ. 1967):</strong>
                            <p class="leading-relaxed">
                                <em>"ช่วงเวลาที่เท่ากับ $9{,}192{,}631{,}770$ คาบของการแผ่รังสีที่เกิดจากการเปลี่ยนระดับพลังงานไฮเปอร์ไฟน์ในสถานะพื้นของอะตอมซีเซียม-133 ($^{133}\text{Cs}$) ที่อุณหภูมิศูนย์สัมบูรณ์"</em> (นาฬิกาอะตอมมีความคลาดเคลื่อนไม่เกิน 1 วินาทีใน 100 ล้านปี)
                            </p>
                            <div class="mt-2 text-slate-400 font-mono text-[11px]">
                                <strong>บทบาทในจุลชีววิทยา:</strong> อัตราการแบ่งเซลล์ (Generation Time), เวลาในการนึ่งฆ่าเชื้อด้วยความดันไอ (Autoclave 15–20 นาที หรือ 900–1,200 วินาที) และระยะเวลาการหมุนปั่นเหวี่ยง (Centrifugation)
                            </div>
                        </div>
                    </div>
                    <!-- Figure: Def Second -->
                    <div class="rounded-xl overflow-hidden border border-slate-800 bg-slate-950 p-2">
                        <img src="../images/maintex/tikz/ch01_def_second.svg" alt="วิวัฒนาการนิยาม 1 วินาที" class="w-full h-auto" loading="lazy">
                    </div>
                </div>

                <!-- Units 4-7: Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Unit 4: Ampere -->
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-400 font-bold flex items-center justify-center font-mono">4</span>
                                <h4 class="text-sm font-bold text-white">กระแสไฟฟ้า — แอมแปร์ (Ampere, $\text{A}$)</h4>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-rose-500/10 text-rose-300 text-[11px] font-mono border border-rose-500/30">A</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <strong>นิยามปัจจุบัน (2019):</strong> ตรึงค่า <strong>ประจุไฟฟ้ามูลฐาน (Elementary Charge, $e$)</strong> ให้เท่ากับ $1.602\,176\,634 \times 10^{-19}\text{ C}$ ($\text{A}\cdot\text{s}$)<br>
                            <em>(ในอดีตนิยามจากแรงดึงดูดเชิงกล $2 \times 10^{-7}\text{ N/m}$ ระหว่างลวดตัวนำคู่ขนาน 2 เส้นยาวอนันต์ในสุญญากาศ)</em>
                        </p>
                        <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                            <strong>จุลชีววิทยา:</strong> กระแสไฟฟ้าในเจลอิเล็กโทรโฟเรซิส (Agarose & SDS-PAGE) แยกสาย DNA/โปรตีน และการวัดสัญญาณ Patch-clamp ศักย์ไฟฟ้าเยื่อหุ้มเซลล์
                        </div>
                    </div>

                    <!-- Unit 5: Kelvin -->
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 font-bold flex items-center justify-center font-mono">5</span>
                                <h4 class="text-sm font-bold text-white">อุณหภูมิอุณหพลวัต — เคลวิน (Kelvin, $\text{K}$)</h4>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300 text-[11px] font-mono border border-orange-500/30">K</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <strong>นิยามปัจจุบัน (2019):</strong> ตรึง <strong>ค่าคงตัวบ็อลทซ์มัน (Boltzmann Constant, $k$)</strong> ให้เท่ากับ $1.380\,649 \times 10^{-23}\text{ J/K}$ ผูกพลังงานจลน์เฉลี่ยของอนุภาคเข้ากับอุณหภูมิสัมบูรณ์<br>
                            <em>(ในอดีตนิยามจาก $rac{1}{273.16}$ ของจุดร่วมสามของน้ำ Triple Point)</em> โดย $T_{\text{K}} = T_{^\circ\text{C}} + 273.15$
                        </p>
                        <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                            <strong>จุลชีววิทยา:</strong> การบ่มเชื้อ ($37^\circ\text{C} = 310.15\text{ K}$), การฆ่าเชื้อ Autoclave ($121^\circ\text{C} = 394.15\text{ K}$), อุณหภูมิการคลายและต่อสายดีเอ็นเอใน PCR ($95^\circ\text{C}, 55^\circ\text{C}, 72^\circ\text{C}$)
                        </div>
                    </div>

                    <!-- Unit 6: Mole -->
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 font-bold flex items-center justify-center font-mono">6</span>
                                <h4 class="text-sm font-bold text-white">ปริมาณของสาร — โมล (Mole, $\text{mol}$)</h4>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-purple-500/10 text-purple-300 text-[11px] font-mono border border-purple-500/30">mol</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <strong>นิยามปัจจุบัน (2019):</strong> มีจำนวนอนุภาคมูลฐาน (อะตอม โมเลกุล หรือไอออน) แน่นอนเท่ากับ <strong>$6.022\,140\,76 \times 10^{23}$ อนุภาค</strong> ซึ่งคือ <strong>ค่าคงตัวอาโวกาโดร (Avogadro Constant, $N_{\text{A}}$)</strong><br>
                            <em>(ในอดีตนิยามจากจำนวนอะตอมในคาร์บอน-12 บริสุทธิ์มวล $0.012\text{ kg}$)</em>
                        </p>
                        <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                            <strong>จุลชีววิทยา:</strong> การเตรียมสารละลายความเข้มข้น ($\text{M} = \text{mol/L}$, $\text{mM}$, $\mu\text{M}$), จำนวนโมเลกุลสารตั้งต้นในเอนไซม์จลนศาสตร์ และจำนวนก๊อปปี้พลาสมิดดีเอ็นเอ
                        </div>
                    </div>

                    <!-- Unit 7: Candela -->
                    <div class="p-5 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-8 h-8 rounded-lg bg-yellow-500/20 text-yellow-400 font-bold flex items-center justify-center font-mono">7</span>
                                <h4 class="text-sm font-bold text-white">ความเข้มการส่องสว่าง — แคนเดลา (Candela, $\text{cd}$)</h4>
                            </div>
                            <span class="px-2.5 py-0.5 rounded-full bg-yellow-500/10 text-yellow-300 text-[11px] font-mono border border-yellow-500/30">cd</span>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <strong>นิยามปัจจุบัน:</strong> ตรึง <strong>ประสิทธิผลของการส่องสว่าง (Luminous Efficacy, $K_{\text{cd}}$)</strong> ของรังสีเอกรงค์ความถี่ $540 \times 10^{12}\text{ Hz}$ (แสงสีเขียว $\lambda pprox 555\text{ nm}$) ให้มีค่าเท่ากับ $683\text{ lm/W}$ ($\text{cd}\cdot\text{sr}\cdot\text{W}^{-1}$)<br>
                            <em>(ในอดีตนิยามจากความสว่างของเทียนไขมาตรฐานไขปลาวาฬ Sperm Whale Candle)</em>
                        </p>
                        <div class="text-[11px] text-slate-400 font-mono border-t border-slate-800 pt-2">
                            <strong>จุลชีววิทยา:</strong> แสงสว่างสำหรับการเพาะเลี้ยงสาหร่ายเซลล์เดียวและไซยาโนแบคทีเรียใน Photobioreactor, หลอดไฟกล้องจุลทรรศน์ฟลูออเรสเซนต์, และการวัดการเรืองแสงชีวภาพ (Bioluminescence)
                        </div>
                    </div>
                </div>

                <!-- ═════ 3 COMPREHENSIVE TABLES ═════ -->

                <!-- TABLE 1.1: 7 SI BASE UNITS -->
                <div class="tex-tablefig mt-10" id="tab-1.1">
                    <div class="tex-tablecap">
                        <strong>ตารางที่ 1.1</strong>&ensp;สรุปคุณสมบัติ 7 หน่วยฐานเอสไอ (7 SI Base Units) นิยามอดีต-ปัจจุบัน ค่าคงตัวตรึง และการประยุกต์ใช้ในจุลชีววิทยา
                    </div>
                    <div class="tex-table-wrap overflow-x-auto">
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
                                    <td class="p-3 font-mono text-[11px] text-emerald-400">$\Delta
u_{\text{Cs}} = 9\,192\,631\,770\text{ s}^{-1}$ (ไฮเปอร์ไฟน์ $^{133}\text{Cs}$)</td>
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
                <div class="tex-tablefig mt-8" id="tab-1.2">
                    <div class="tex-tablecap">
                        <strong>ตารางที่ 1.2</strong>&ensp;หน่วยอนุพันธ์เอสไอ (SI Derived Units) ที่สำคัญทางฟิสิกส์และการประยุกต์ใช้ในห้องปฏิบัติการจุลชีววิทยา
                    </div>
                    <div class="tex-table-wrap overflow-x-auto">
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
                                    <td class="p-3">ความดันไอน้ำในหม้อนึ่งฆ่าเชื้อ Autoclave ($103\text{ kPa} pprox 15\text{ psi}$), ความดันออสโมซิส</td>
                                </tr>
                                <tr class="hover:bg-slate-900/60">
                                    <td class="p-3 font-bold text-white">ความหนืดพลวัต (Dynamic Viscosity)</td>
                                    <td class="p-3">พาสคาล-วินาที</td>
                                    <td class="p-3 text-center font-mono font-bold text-cyan-400">$\text{Pa}\cdot\text{s}$</td>
                                    <td class="p-3 font-mono">$\text{N}\cdot\text{s/m}^2$</td>
                                    <td class="p-3 font-mono">$\text{m}^{-1}\cdot\text{kg}\cdot\text{s}^{-1}$</td>
                                    <td class="p-3">ความหนืดของน้ำและอาหารเลี้ยงเชื้อจุลินทรีย์ ($\eta_{\text{water}} pprox 10^{-3}\text{ Pa}\cdot\text{s} = 1\text{ cP}$)</td>
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
                                    <td class="p-3">วัดอัตราการเร่งปฏิกิริยาของเอนไซม์จากจุลินทรีย์ (เช่น $eta$-galactosidase, Taq Polymerase)</td>
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
                <div class="tex-tablefig mt-8" id="tab-1.3">
                    <div class="tex-tablecap">
                        <strong>ตารางที่ 1.3</strong>&ensp;หน่วยเสริมและหน่วยนอกระบบเอสไอที่ยอมรับให้ใช้ร่วมกับระบบเอสไอ (Supplementary & Accepted Non-SI Units) ในทางชีวการแพทย์และจุลชีววิทยา
                    </div>
                    <div class="tex-table-wrap overflow-x-auto">
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
                                    <td class="p-3 font-mono">$1\text{ Da} pprox 1.660\,539 \times 10^{-27}\text{ kg}$</td>
                                    <td class="p-3">น้ำหนักโมเลกุลของโปรตีนและสายกรดนิวคลีอิก (เช่น เอนไซม์ไลโซไซม์ $14.3\text{ kDa}$, BSA $66.5\text{ kDa}$)</td>
                                </tr>
                                <tr class="hover:bg-slate-900/60">
                                    <td class="p-3 font-bold text-white">พลังงานระดับโมเลกุล (Energy)</td>
                                    <td class="p-3">อิเล็กตรอนโวลต์</td>
                                    <td class="p-3 text-center font-mono font-bold text-amber-400">$\text{eV}$</td>
                                    <td class="p-3 font-mono">$1\text{ eV} pprox 1.602\,176 \times 10^{-19}\text{ J}$</td>
                                    <td class="p-3">พลังงานโฟตอนของแสง UV สำหรับฆ่าเชื้อในตู้ Biosafety ($h
u pprox 4.9\text{ eV}$ ที่ $\lambda = 254\text{ nm}$)</td>
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
                                    <td class="p-3 font-mono">$1\text{ mmHg} pprox 133.322\text{ Pa}$</td>
                                    <td class="p-3">ความดันโลหิต การดูดสุญญากาศกรองอาหารเลี้ยงเชื้อ (Vacuum filtration) และความดันไอ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- TABLE 1.4: PREFIXES (PRESERVED & EXPANDED) -->
                <div class="tex-tablefig mt-8" id="tab-1.4">
                    <div class="tex-tablecap">
                        <strong>ตารางที่ 1.4</strong>&ensp;คำอุปสรรคเอสไอ (SI Prefixes) ที่พบบ่อยที่สุดในห้องปฏิบัติการจุลชีววิทยาและฟิสิกส์การวัด
                    </div>
                    <div class="tex-table-wrap overflow-x-auto">
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
                                    <td class="p-3">พิโกกรัม ($\text{pg}$ มวลของแบคทีเรีย 1 เซลล์ $pprox 1\text{ pg}$), พิโกนิวตัน ($\text{pN}$ แรงขับเคลื่อนของมอเตอร์โมเลกุล)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
        
        <!-- Section: การแปลงหน่วยโดยใช้เทคนิคบันไดเลื่อนจุดทศนิยม -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">การแปลงหน่วยโดยใช้เทคนิคบันไดเลื่อนจุดทศนิยม</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-1.2"><img src="../images/maintex/sec_3d/ch01_s2.jpg" alt="ภาพที่ 1.2" loading="lazy"><figcaption><strong>ภาพที่ 1.2</strong>&ensp;บันไดคำอุปสรรคขั้นละ $1{,}000$ เท่า ($\text{m/L} \leftrightarrow \text{mm/mL} \leftrightarrow \mu\text{m/}\mu\text{L} \leftrightarrow \text{nm}$) สำหรับแปลงหน่วยขนาดเซลล์จุลินทรีย์และปริมาตรไมโครปิเปต</figcaption></figure>
<p>นักศึกษาจำนวนมากมักสับสนเมื่อต้องคำนวณเลขยกกำลังติดลบ เช่น $10^{-6}$ หารด้วย $10^{-3}$ เพื่อขจัดปัญหานี้ เราสามารถใช้ <strong>เทคนิคบันไดขั้นละ 1,000</strong> (<strong>Step-by-1,000 Ladder Method</strong>) ซึ่งจำง่ายเหมือนการแลกธนบัตร กล่าวคือ หน่วยที่เรียงติดกันจากใหญ่ไปเล็ก ได้แก่ <strong>หน่วยปกติ $\rightarrow$ มิลลิ ($\text{m}$) $\rightarrow$ ไมโคร ($\mu$) $\rightarrow$ นาโน ($\text{n}$)</strong> จะมีค่าห่างกันขั้นละ $1{,}000$ เท่าเสมอ ดังแสดงในภาพที่ 1.2 และภาพที่ 1.3</p>
<figure class="tex-figure tex-figure-diagram" id="fig-1.3"><img src="../images/maintex/tikz/ch01_tikz1.svg" alt="ภาพที่ 1.3" loading="lazy"><figcaption><strong>ภาพที่ 1.3</strong>&ensp;แผนภาพบันไดคำอุปสรรคขั้นละ 1,000 เท่า สำหรับการแปลงหน่วยขนาดเซลล์และปริมาตรสารละลาย</figcaption></figure>
<div class="tex-aruco" data-aruco="0"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 0"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="3" y="1" width="1" height="1" fill="#fff"/><rect x="4" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="2" width="1" height="1" fill="#fff"/><rect x="3" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 0 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 0 — บทที่ 1: ไมโครปิเปต P1000 และการเจือจางเชื้อแบบลำดับส่วน 3 มิติ</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองกลไกลูกสูบไมโครปิเปต 2 จังหวะ และการดูดถ่ายสารละลายแบคทีเรียลดความเข้มข้นทีละ 10 เท่าพร้อมคำนวณค่า CFU/mL สด</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ปริมาตรดูด $V$ ($\mu\text{L}$), จำนวนขั้นการเจือจาง ($10^{-n}$), จำนวนโคโลนีบนจานเพาะเชื้อ</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=0&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 0</a></div></div>
<div class="tex-box tex-box-concept"><div class="tex-box-title"><i class="fa-solid fa-lightbulb"></i> กฎทองของการแปลงหน่วยในห้องแล็บจุลชีววิทยา</div><div class="tex-box-body"><ul class="tex-ul"><li><strong>แปลงจากหน่วยใหญ่ไปหน่วยเล็ก</strong> (เดินลงบันได 1 ขั้น)&emsp; <strong>ให้คูณด้วย $1{,}000$</strong> (หรือเลื่อนจุดทศนิยมไปทางขวา 3 ตำแหน่ง) เช่น $1\text{ mL} = 1{,}000\text{ }\mu\text{L}$ และ $1\text{ }\mu\text{m} = 1{,}000\text{ nm}$</li><li><strong>แปลงจากหน่วยเล็กไปหน่วยใหญ่</strong> (เดินขึ้นบันได 1 ขั้น)&emsp; <strong>ให้หารด้วย $1{,}000$</strong> (หรือเลื่อนจุดทศนิยมไปทางซ้าย 3 ตำแหน่ง) เช่น $250\text{ }\mu\text{L} = 0.250\text{ mL}$</li></ul></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 1.1&ensp;การแปลงหน่วยขนาดเซลล์แบคทีเรียและปริมาตรไมโครปิเปต</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; นักศึกษาจุลชีววิทยาส่องกล้องจุลทรรศน์พบเซลล์แบคทีเรีย <em>Bacillus subtilis</em> มีความยาวเฉลี่ย $4.5\text{ }\mu\text{m}$ และในการเตรียมปฏิกิริยาพีซีอาร์ (PCR) ต้องใช้ไมโครปิเปตดูดสารละลายบัฟเฟอร์ปริมาตร $0.05\text{ mL}$ จงหาว่า (ก) แบคทีเรียชนิดนี้มีความยาวกี่มิลลิเมตร ($\text{mm}$) และกี่นาโนเมตร ($\text{nm}$) และ (ข) ต้องตั้งค่าไมโครปิเปตเป็นกี่ไมโครลิตร ($\mu\text{L}$)</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 แปลงความยาวแบคทีเรีย $4.5\text{ }\mu\text{m}$ เป็น $\text{mm}$ และ $\text{nm}$</strong>
<ul class="tex-ul"></ul></li><li>จาก $\mu\text{m}$ ไปเป็น $\text{mm}$ คือการเดินขึ้นบันได 1 ขั้น (หน่วยเล็กไปหน่วยใหญ่) จึงนำมา<strong>หารด้วย $1{,}000$</strong>
<div class="tex-display">\[
            \text{ความยาวในหน่วยมิลลิเมตร} = \frac{4.5}{1{,}000} = 0.0045\text{ mm}
        \]</div></li><li>จาก $\mu\text{m}$ ไปเป็น $\text{nm}$ คือการเดินลงบันได 1 ขั้น (หน่วยใหญ่ไปหน่วยเล็ก) จึงนำมา<strong>คูณด้วย $1{,}000$</strong>
<div class="tex-display">\[
            L_{\text{nm}} = 4.5 \times 1{,}000 = 4{,}500\text{ nm}
        \]</div>
<p>itemize</p></li><li><strong>ขั้นที่ 2 แปลงปริมาตรสารละลาย $0.05\text{ mL}$ เป็น $\mu\text{L}$</strong>
<ul class="tex-ul"></ul></li><li>จาก $\text{mL}$ ไปเป็น $\mu\text{L}$ คือการเดินลงบันได 1 ขั้น จึงนำมา<strong>คูณด้วย $1{,}000$</strong>
<div class="tex-display">\[
            \text{ปริมาตรไมโครปิเปต} = 0.05 \times 1{,}000 = 50\text{ }\mu\text{L}
        \]</div>
<p>itemize</p></li></ol>
<p><strong>คำตอบ</strong>&emsp; แบคทีเรียมีความยาวเท่ากับ $0.0045\text{ mm}$ หรือ $4{,}500\text{ nm}$ และต้องตั้งค่าไมโครปิเปตที่ $50\text{ }\mu\text{L}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: เลขนัยสำคัญ ความเที่ยง ความแม่น และความคลาดเคลื่อนของการวัด -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">เลขนัยสำคัญ ความเที่ยง ความแม่น และความคลาดเคลื่อนของการวัด</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-1.4"><img src="../images/maintex/sec_3d/ch01_s3.jpg" alt="ภาพที่ 1.4" loading="lazy"><figcaption><strong>ภาพที่ 1.4</strong>&ensp;กลไกปุ่มกด 2 จังหวะของไมโครปิเปต P1000 และการตรวจสอบความแม่น (Accuracy) ด้วยการชั่งมวลน้ำกลั่นบนเครื่องชั่งดิจิทัลละเอียดทศนิยม 4 ตำแหน่ง</figcaption></figure>
<p>ในการบันทึกผลการทดลองทางวิทยาศาสตร์ ตัวเลขทุกตัวที่เขียนลงในตารางบันทึกผลต้องสะท้อนความละเอียดของเครื่องมือวัดจริง ซึ่งเรียกว่า <strong>เลขนัยสำคัญ</strong> (<strong>Significant Figures</strong>) โดยประกอบด้วยตัวเลขที่อ่านได้แน่นอนจากขีดสเกลรวมกับตัวเลขประมาณค่าอีก 1 ตำแหน่ง นอกจากนี้ นักจุลชีววิทยาต้องแยกแยะความแตกต่างระหว่าง <strong>ความแม่น</strong> (<strong>Accuracy</strong> คือความใกล้เคียงกับค่าจริงมาตรฐาน) และ <strong>ความเที่ยง</strong> (<strong>Precision</strong> คือความสม่ำเสมอหรือการซ้ำรอยเดิมเมื่อวัดซ้ำหลายครั้ง)</p>
<p>หากเราต้องการตรวจสอบว่าไมโครปิเปตในห้องปฏิบัติการยังมีความแม่นยำหรือไม่ เราสามารถใช้วิธีชั่งมวลของน้ำกลั่นที่ดูดออกมา (ดังแสดงในภาพที่ 1.4) เนื่องจากน้ำบริสุทธิ์ที่อุณหภูมิห้องมีความหนาแน่นประมาณ $1\text{ g/mL}$ หรือกล่าวได้ว่า <strong>น้ำกลั่นปริมาตร $1{,}000\text{ }\mu\text{L}$ ($1\text{ mL}$) จะมีมวลเท่ากับ $1.0000\text{ g}$ และน้ำกลั่น $100\text{ }\mu\text{L}$ จะมีมวลเท่ากับ $0.1000\text{ g}$</strong> โดยคำนวณเปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์ได้จากสมการที่ (1.1)</p>
<div class="tex-display">\[\text{เปอร์เซ็นต์ความคลาดเคลื่อน} = \frac{|\text{ค่าที่วัดได้จริง} - \text{ค่ามาตรฐาน}|}{\text{ค่ามาตรฐาน}} \times 100\% \tag{1.1}\]</div>
<div class="tex-box tex-box-warning"><div class="tex-box-title"><i class="fa-solid fa-triangle-exclamation"></i> ห้ามกดปุ่มไมโครปิเปตเลยจังหวะแรกขณะดูดสารละลาย</div><div class="tex-box-body"><p>ไมโครปิเปตมีปุ่มกด 2 จังหวะ (<strong>First Stop</strong> และ <strong>Second Stop</strong>) ขณะจุ่มปลายทิปเพื่อดูดสารละลายหรือเชื้อจุลินทรีย์ <strong>ต้องกดลงไปเพียงจังหวะแรกเท่านั้น</strong> แล้วค่อยๆ ผ่อนนิ้วขึ้น หากเผลอกดลงไปถึงจังหวะที่สองขณะดูดสาร จะทำให้ได้ปริมาตรเกินกว่าที่ตั้งไว้ถึง 10–15% ส่วนจังหวะที่สองมีไว้ใช้ตอนปล่อยสารออกจากปลายทิปให้หมดจดเท่านั้น</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 1 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 1</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-1.5"><img src="../images/maintex/sec_3d/ch01_s4.jpg" alt="ภาพที่ 1.5" loading="lazy"><figcaption><strong>ภาพที่ 1.5</strong>&ensp;ชุดอุปกรณ์ปฏิบัติการที่ 1 ประกอบด้วยเวอร์เนียร์คาลิปเปอร์วัดขนาดจานเพาะเชื้อ ไมโครมิเตอร์วัดความหนาสไลด์แก้ว และไมโครปิเปต P1000 พร้อมเครื่องชั่งดิจิทัล</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 1&emsp; การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (ความรู้การวัดและแปลงหน่วย), CLO3 (วินัย ความปลอดภัย และความซื่อสัตย์ในการบันทึกข้อมูลจริง), CLO4 (การทำงานร่วมกันและเขียนรายงาน)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 1.5)</strong></p>
<ul class="tex-ul"><li>เวอร์เนียร์คาลิปเปอร์ (ความละเอียด $0.05\text{ mm}$) และไมโครมิเตอร์ (ความละเอียด $0.01\text{ mm}$)</li><li>จานเพาะเชื้อแก้ว (Petri Dish), หลอดทดลอง (Test Tube) และแผ่นสไลด์กล้องจุลทรรศน์</li><li>ไมโครปิเปตขนาด P1000 ($100\text{--}1{,}000\text{ }\mu\text{L}$) และ P200 ($20\text{--}200\text{ }\mu\text{L}$) พร้อมทิปปลอดเชื้อ</li><li>เครื่องชั่งดิจิทัลละเอียดทศนิยม 4 ตำแหน่ง บีกเกอร์ใส่น้ำกลั่น และผงวุ้นอาหารเลี้ยงเชื้อจำลอง (โซเดียมคลอไรด์)</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การวัดมิติภาชนะทางจุลชีววิทยา</strong>&emsp; ใช้เวอร์เนียร์คาลิปเปอร์วัดเส้นผ่านศูนย์กลางภายในและความลึกของจานเพาะเชื้อจำนวน 3 ครั้ง และใช้ไมโครมิเตอร์วัดความหนาของแผ่นสไลด์แก้วจำนวน 3 ครั้ง บันทึกค่าเฉลี่ยและแปลงหน่วยเป็นไมโครเมตร ($\mu\text{m}$)</li><li><strong>ตอนที่ 2 การตรวจสอบความแม่นและความเที่ยงของไมโครปิเปต</strong>&emsp; วางบีกเกอร์พลาสติกขนาดเล็กบนเครื่องชั่งดิจิทัลแล้วกดปุ่มเซตศูนย์ (<strong>Tare</strong>) จากนั้นตั้งค่าไมโครปิเปต P1000 ที่ปริมาตร $500\text{ }\mu\text{L}$ ดูดน้ำกลั่นหยดลงในบีกเกอร์ อ่านค่ามวลเป็นกรัม ($\text{g}$) ทำซ้ำ 3 ครั้ง แล้วคำนวณค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนเทียบกับค่ามาตรฐาน $0.5000\text{ g}$</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง (สำหรับนักศึกษาบันทึกค่าจริงในห้องปฏิบัติการ)</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>รายการที่วัด</strong></th><th><strong>ครั้งที่ 1</strong></th><th><strong>ครั้งที่ 2</strong></th><th><strong>ครั้งที่ 3</strong></th><th><strong>ค่าเฉลี่ย</strong></th><th><strong>หน่วย $\mu\text{m}$ / $\mu\text{L}$</strong></th></tr></thead><tbody><tr><td>เส้นผ่านศูนย์กลางจานเพาะเชื้อ ($\text{mm}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span> $\mu\text{m}$</td></tr><tr><td>ความหนาของแผ่นสไลด์แก้ว ($\text{mm}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span> $\mu\text{m}$</td></tr><tr><td>มวลน้ำกลั่นจากปิเปต $500\text{ }\mu\text{L}$ ($\text{g}$)</td><td>............</td><td>............</td><td>............</td><td>............</td><td>คลาดเคลื่อน ............ %</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 1 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เซลล์ยีสต์ <em>Saccharomyces cerevisiae</em> มีเส้นผ่านศูนย์กลางประมาณ $6\text{ }\mu\text{m}$ จงแปลงค่าดังกล่าวให้เป็นหน่วยมิลลิเมตร ($\text{mm}$) และนาโนเมตร ($\text{nm}$) โดยใช้เทคนิคบันไดขั้นละ $1{,}000$</li><li>หากต้องการเตรียมสารละลายยาปฏิชีวนะปริมาตร $0.25\text{ mL}$ นักศึกษาควรเลือกใช้ไมโครปิเปตขนาดใดระหว่าง P20, P200 หรือ P1000 และต้องตั้งตัวเลขเป็นกี่ไมโครลิตร ($\mu\text{L}$) เพราะเหตุใด</li><li>ในการทดสอบไมโครปิเปตที่ตั้งค่าไว้ $200\text{ }\mu\text{L}$ นักศึกษาชั่งมวลน้ำกลั่น 3 ครั้ง ได้ค่า $0.198\text{ g}$, $0.199\text{ g}$ และ $0.197\text{ g}$ จงหาค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนเทียบกับค่ามาตรฐาน $0.200\text{ g}$</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <div></div>
                
        <a href="ch02_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
