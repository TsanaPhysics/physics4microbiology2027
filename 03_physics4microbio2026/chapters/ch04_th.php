<?php
$pageTitle = "บทที่ 4: งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 4</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 04 &bull; WORK, ENERGY & CENTRIFUGE
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 4)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 4
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=3&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 3 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab04_centrifuge.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 04: การอนุรักษ์พลังงานและการคำนวณ RCF เครื่อง Centrifuge (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 4&emsp; งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง (สัปดาห์ที่ 4)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>4.1 งาน พลังงานจลน์ พลังงานศักย์ และกฎการอนุรักษ์พลังงานกล</li><li>4.2 กำลังทางฟิสิกส์และการคำนวณการใช้พลังงานของเครื่องมือในห้องปฏิบัติการจุลชีววิทยา</li><li>4.3 ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge) ความแตกต่างระหว่างความเร็วรอบ (RPM) กับแรงเหวี่ยงสัมพัทธ์ (RCF หรือ $\times g$)</li><li>4.4 ปฏิบัติการที่ 4 การอนุรักษ์พลังงานกลและการคำนวณตั้งค่าเครื่องปั่นเหวี่ยงพร้อมกฎการจัดสมดุลโรเตอร์</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>คำนวณงาน พลังงาน และกำลังของอุปกรณ์ไฟฟ้าในห้องปฏิบัติการได้ถูกต้อง <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ว่าทำไมการรายงานวิธีปั่นเหวี่ยงแยกเซลล์ในงานวิจัยจุลชีววิทยาต้องระบุค่า RCF ($\times g$) แทนค่า RPM และคำนวณแปลงค่าระหว่าง RPM กับ RCF ได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการจัดวางหลอดตัวอย่างในหัวปั่นโรเตอร์ให้สมดุลตรงข้ามกันอย่างปลอดภัยตามหลักโมเมนต์ความเฉื่อย <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Case-Based Learning</strong>&emsp; ยกกรณีศึกษานักศึกษาคัดลอกวิธีทดลองจากบทความวิจัยที่ระบุ “ปั่นเหวี่ยงที่ $4{,}000\text{ rpm}$” มาใช้กับเครื่องปั่นขนาดเล็ก (Microcentrifuge) แล้วปรากฏว่าเซลล์แบคทีเรียไม่ยอมตกตะกอนลงก้นหลอด เพราะรัศมีโรเตอร์ต่างกัน</li><li><strong>Hands-on Rotor Balancing</strong>&emsp; ฝึกจัดเรียงหลอดไมโครทิวบ์จำนวน 2, 3, 4, 6 หลอด ในโรเตอร์ 12 ช่อง และ 24 ช่อง ให้แรงหนีศูนย์กลางหักล้างกันเป็นศูนย์</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 4 แผนภาพสมดุลโรเตอร์ และเครื่องปั่นเหวี่ยง Microcentrifuge ในห้องปฏิบัติการ</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>การตรวจใบงานแปลงค่า RPM เป็น RCF <strong>(CLO1, CLO2)</strong></li><li>การประเมินทักษะการจัดสมดุลหลอดปั่นเหวี่ยงและรายงานปฏิบัติการที่ 4 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: งาน พลังงานกล และกำลังของเครื่องมือห้องปฏิบัติการ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">งาน พลังงานกล และกำลังของเครื่องมือห้องปฏิบัติการ</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-4.1"><img src="../images/maintex/sec_3d/ch04_s1.jpg" alt="ภาพที่ 4.1" loading="lazy"><figcaption><strong>ภาพที่ 4.1</strong>&ensp;การเปลี่ยนพลังงานไฟฟ้าเป็นงานกลและพลังงานจลน์การหมุนของโรเตอร์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา</figcaption></figure>
<p>ในทางฟิสิกส์ <strong>งาน</strong> (<strong>Work</strong>, $W$) เกิดขึ้นเมื่อมีแรง $F$ กระทำต่อวัตถุแล้วทำให้วัตถุเคลื่อนที่ไปตามแนวแรงเป็นระยะทาง $s$ โดยมีหน่วยเป็น<strong>จูล</strong> ($\text{J}$ หรือ $\text{N}\cdot\text{m}$) ส่วน<strong>พลังงาน</strong> (<strong>Energy</strong>) คือความสามารถในการทำงาน ซึ่งในระบบกลศาสตร์ประกอบด้วย <strong>พลังงานจลน์</strong> ($E_k = \frac{1}{2}mv^2$ พลังงานของวัตถุที่กำลังเคลื่อนที่) และ<strong>พลังงานศักย์โน้มถ่วง</strong> ($E_p = mgh$ พลังงานที่สะสมตามระดับความสูง $h$) สำหรับเครื่องมือวิทยาศาสตร์ทุกชนิดในห้องแล็บจุลชีววิทยา เราใช้ปริมาณที่เรียกว่า <strong>กำลัง</strong> (<strong>Power</strong>, $P$) เพื่อบอกอัตราการใช้พลังงานต่อหนึ่งหน่วยเวลา มีหน่วยเป็น<strong>วัตต์</strong> ($\text{W}$ หรือ $\text{J/s}$) ดังแสดงในภาพที่ 4.1 และสมการที่ (4.1)</p>
<div class="tex-display">\[W = F s \qquad \text{และ} \qquad P = \frac{W}{t} = \frac{E}{t} \tag{4.1}\]</div>
            </div>
        </section>
        
        <!-- Section: ฟิสิกส์ของเครื่องปั่นเหวี่ยง การแปลงค่า RPM เป็น RCF -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ฟิสิกส์ของเครื่องปั่นเหวี่ยง การแปลงค่า RPM เป็น RCF</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-4.2"><img src="../images/maintex/sec_3d/ch04_s2.jpg" alt="ภาพที่ 4.2" loading="lazy"><figcaption><strong>ภาพที่ 4.2</strong>&ensp;โครงสร้างหัวปั่นโรเตอร์มุมคงที่ การจัดเรียงหลอดถ่วงสมดุลอย่างสมมาตร และการอัดแน่นของเม็ดตะกอนเซลล์ (Pellet) ภายใต้แรงเหวี่ยงสัมพัทธ์ RCF ($\times g$)</figcaption></figure>
<p>ดังที่ได้ศึกษาในบทที่ 3 เซลล์แบคทีเรียมีขนาดเล็กมากจนการปล่อยให้ตกตะกอนด้วยแรงโน้มถ่วงโลกเพียงอย่างเดียว ($1\times g$) ต้องใช้เวลานานหลายวัน ดังนั้น ห้องปฏิบัติการจุลชีววิทยาจึงต้องใช้ <strong>เครื่องปั่นเหวี่ยง</strong> (<strong>Centrifuge</strong>) เพื่อสร้างความเร่งสู่ศูนย์กลางที่มีค่าสูงกว่าแรงโน้มถ่วงโลกหลายพันเท่า ปริมาณที่บอกให้ทราบว่าแรงเหวี่ยงที่กระทำต่อเซลล์มีค่าเป็นกี่เท่าของแรงโน้มถ่วงโลก เรียกว่า <strong>แรงเหวี่ยงสัมพัทธ์</strong> (<strong>Relative Centrifugal Force</strong> หรือ <strong>RCF</strong> นิยมเขียนหน่วยเป็น $\times g$) ซึ่งคำนวณได้จากรัศมีของหัวปั่นโรเตอร์ในหน่วยเซนติเมตร ($r_{\text{cm}}$) และความเร็วรอบต่อนาที (<strong>Revolutions Per Minute</strong>, $\text{RPM}$) ตามสมการมาตรฐานที่ (4.2)</p>
<div class="tex-display">\[\text{RCF} = 1.118 \times 10^{-5} \times r_{\text{cm}} \times (\text{RPM})^2 \tag{4.2}\]</div>
<div class="tex-box tex-box-concept"><div class="tex-box-title"><i class="fa-solid fa-lightbulb"></i> ทำไมห้ามบอกแค่ค่า RPM เวลาเขียนรายงานวิจัยจุลชีววิทยา</div><div class="tex-box-body"><p>จากสมการที่ (4.2) แม้เราจะตั้งความเร็วรอบ $\text{RPM}$ เท่ากัน แต่ถ้าเครื่องปั่นเหวี่ยง 2 เครื่องมี<strong>รัศมีโรเตอร์ $r_{\text{cm}}$ ไม่เท่ากัน</strong> ค่าแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$) ที่กระทำต่อเซลล์แบคทีเรียจะไม่เท่ากันเลย ดังนั้น มาตรฐานสากลจึงกำหนดให้ระบุเป็นค่า $\times g$ เสมอ เช่น <strong>ปั่นเหวี่ยงเก็บเซลล์แบคทีเรียที่ $5{,}000 \times g$ เป็นเวลา 10 นาที</strong></p></div></div>
<p>นอกจากนี้ ขณะที่โรเตอร์หมุนด้วยความเร็วสูงถึง $10{,}000\text{--}15{,}000\text{ rpm}$ หลอดตัวอย่างแต่ละหลอดจะมีแรงหนีศูนย์กลางขนาดมหาศาลดึงออกไปตามแนวรัศมี ดังนั้น นักศึกษา<strong>ต้องวางหลอดที่มีมวลเท่ากันให้อยู่ในช่องตรงข้ามกันอย่างสมมาตรเสมอ</strong> เพื่อให้ผลรวมเวกเตอร์ของแรงหนีศูนย์กลางที่จุดหมุนมีค่าเป็นศูนย์ ($\sum \boldsymbol{F}_c = 0$) ดังแสดงในภาพที่ 4.2 และภาพที่ 4.3 หากวางหลอดไม่สมดุล แกนโรเตอร์จะสั่นอย่างรุนแรงและอาจแตกหักก่อให้เกิดอันตรายร้ายแรงและทำให้ละอองเชื้อโรคฟุ้งกระจาย</p>
<figure class="tex-figure tex-figure-diagram" id="fig-4.3"><img src="../images/maintex/tikz/ch04_tikz1.svg" alt="ภาพที่ 4.3" loading="lazy"><figcaption><strong>ภาพที่ 4.3</strong>&ensp;ผังการจัดเรียงหลอดตัวอย่างในหัวปั่นโรเตอร์เพื่อรักษาสมดุลของแรงหนีศูนย์กลาง</figcaption></figure>
<div class="tex-aruco" data-aruco="3"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 3"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="4" y="1" width="1" height="1" fill="#fff"/><rect x="1" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="2" width="1" height="1" fill="#fff"/><rect x="2" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 3 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 3 — บทที่ 4: เครื่องปั่นเหวี่ยงความเร็วสูง การแปลงค่า RCF (xg) และการจัดสมดุลโรเตอร์</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองการหมุนของโรเตอร์มุมคงที่ การวางหลอดตัวอย่างถ่วงสมดุลตรงข้ามกัน และการอัดแน่นของเม็ดตะกอนเซลล์ (Pellet) ที่ก้นหลอด</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ความเร็วรอบ $\text{RPM}$ ($1{,}000\text{--}14{,}000$), รัศมีโรเตอร์ $r_{\text{cm}}$ ($\text{cm}$), สมดุลหลอด</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=3&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 3</a></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 4.1&ensp;การคำนวณค่าแรงเหวี่ยงสัมพัทธ์ RCF ของเครื่องปั่นเหวี่ยง</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; นักศึกษาใช้เครื่องปั่นเหวี่ยงที่มีรัศมีโรเตอร์ $r_{\text{cm}} = 10\text{ cm}$ เพื่อปั่นเก็บตะกอนเซลล์แบคทีเรีย <em>E. coli</em> โดยตั้งความเร็วรอบที่ $\text{RPM} = 5{,}000\text{ รอบต่อนาที}$ จงคำนวณหาค่าแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$) ในหน่วย $\times g$</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 ยกกำลังสองค่าความเร็วรอบ $(\text{RPM})^2$ ก่อน</strong>
<div class="tex-display">\[
        (\text{RPM})^2 = (5{,}000)^2 = 5{,}000 \times 5{,}000 = 25{,}000{,}000 = 2.5 \times 10^7
    \]</div></li><li><strong>ขั้นที่ 2 แทนค่าลงในสูตร $\text{RCF} = 1.118 \times 10^{-5} \times r_{\text{cm}} \times (\text{RPM})^2$</strong>
<div class="tex-display">\[
        \text{RCF} = 1.118 \times 10^{-5} \times 10 \times (2.5 \times 10^7)
    \]</div></li><li><strong>ขั้นที่ 3 คูณตัวเลขเข้าด้วยกัน ($10^{-5} \times 10 \times 10^7 = 10^3 = 1{,}000$)</strong>
<div class="tex-display">\[
        \text{RCF} = 1.118 \times 2.5 \times 1{,}000 = 2{,}795 \times g
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; แรงเหวี่ยงสัมพัทธ์ที่กระทำต่อเซลล์แบคทีเรียมีค่าเท่ากับ $2{,}795 \times g$ (ประมาณ $2{,}800$ เท่าของแรงโน้มถ่วงโลก)</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 4 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 4</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-4.4"><img src="../images/maintex/sec_3d/ch04_s3.jpg" alt="ภาพที่ 4.4" loading="lazy"><figcaption><strong>ภาพที่ 4.4</strong>&ensp;ชุดปฏิบัติการที่ 4 สำหรับการวัดรัศมีโรเตอร์ ($r_{\text{cm}}$) คำนวณค่า RCF และสังเกตการแยกชั้นระหว่างตะกอนเซลล์ยีสต์ (Pellet) กับส่วนใส (Supernatant)</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 4&emsp; การอนุรักษ์พลังงานและการคำนวณ RCF เครื่อง Centrifuge (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (พลังงานและแรงเหวี่ยง), CLO2 (การตั้งค่าเครื่อง Centrifuge), CLO3 (ความปลอดภัยในการจัดสมดุลโรเตอร์), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 4.4)</strong></p>
<ul class="tex-ul"><li>เครื่องปั่นเหวี่ยงขนาดตั้งโต๊ะ (Tabletop Centrifuge) และเครื่องปั่นเหวี่ยงหลอดขนาดเล็ก (Microcentrifuge)</li><li>ไม้บรรทัดสำหรับวัดรัศมีโรเตอร์ ($r_{\text{cm}}$), หลอดไมโครทิวบ์ขนาด $1.5\text{ mL}$, ไมโครปิเปต และสารแขวนลอยยีสต์อบแห้งในน้ำ</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li>ใช้ไม้บรรทัดวัดรัศมีโรเตอร์ ($r_{\text{cm}}$) จากจุดกึ่งกลางแกนหมุนไปถึงก้นช่องใส่หลอดของเครื่องปั่นเหวี่ยงทั้ง 2 เครื่อง</li><li>คำนวณค่า $\text{RCF}$ ที่ความเร็วรอบ $2{,}000\text{ rpm}$, $4{,}000\text{ rpm}$ และ $6{,}000\text{ rpm}$ เปรียบเทียบกับค่าที่แสดงบนหน้าจอดิจิทัลของเครื่อง</li><li>ดูดสารแขวนลอยยีสต์ปริมาตร $1{,}000\text{ }\mu\text{L}$ ใส่หลอดไมโครทิวบ์ เตรียมหลอดถ่วงดุลน้ำกลั่นให้มีมวลเท่ากัน วางในตำแหน่งตรงข้ามกัน แล้วปั่นที่ $3{,}000\text{ rpm}$ เป็นเวลา $2$ นาที สังเกตเม็ดตะกอนเซลล์ (<strong>Pellet</strong>) และส่วนใส (<strong>Supernatant</strong>)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>รอบ (RPM)</strong></th><th><strong>รัศมี $r_{\text{cm}}$</strong></th><th><strong>RCF คำนวณ ($\times g$)</strong></th><th><strong>RCF หน้าจอ</strong></th><th><strong>ลักษณะตะกอนเซลล์</strong></th></tr></thead><tbody><tr><td>$2{,}000\text{ rpm}$</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>$4{,}000\text{ rpm}$</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>$6{,}000\text{ rpm}$</td><td>............</td><td>............</td><td>............</td><td><span class="tex-dotfill"></span></td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 4 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เครื่องปั่นเหวี่ยงขนาดเล็กมีรัศมีโรเตอร์ $r_{\text{cm}} = 8\text{ cm}$ หากตั้งความเร็วรอบไว้ที่ $10{,}000\text{ rpm}$ จะเกิดแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$) กี่เท่าของแรงโน้มถ่วงโลก ($\times g$)</li><li>หากนักศึกษามีหลอดตัวอย่างเชื้อแบคทีเรียเพียง 1 หลอดที่ต้องการปั่นเหวี่ยง นักศึกษาจะต้องปฏิบัติอย่างไรก่อนกดปุ่มเดินเครื่อง เพื่อป้องกันอันตรายต่อแกนโรเตอร์</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch03_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 3: กฎการเคลื่อนที่ของนิวตันและแรงหนืด
        </a>
    
                
        <a href="ch05_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 5: ความร้อนและการควบคุมอุณหภูมิชีวภาพ <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
