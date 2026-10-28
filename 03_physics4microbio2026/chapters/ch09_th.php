<?php
$pageTitle = "บทที่ 9: ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 9</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 09 &bull; OPTICS & REFRACTOMETRY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 10)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 10
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=8&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 8 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab09_refraction.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 09: การสะท้อนและการหักเหของแสงผ่านตัวกลางและสารละลาย (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 9&emsp; ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง (สัปดาห์ที่ 10)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>9.1 ธรรมชาติของแสง สเปกตรัมคลื่นแม่เหล็กไฟฟ้า และดัชนีหักเหของตัวกลาง ($n = c/v$)</li><li>9.2 กฎการสะท้อนของแสงและกฎการหักเหของสเนลล์ในบริบทการส่องสไลด์จุลชีววิทยา</li><li>9.3 การประยุกต์ใช้เครื่องวัดดัชนีหักเห (Refractometer) วัดความเข้มข้นน้ำตาลในการหมักด้วยจุลินทรีย์</li><li>9.4 ปฏิบัติการที่ 9 การศึกษาทางเดินรังสีแสงสะท้อน แสงหักเห และการวัดค่าบริกซ์ (Brix) ของอาหารหมัก</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>อธิบายความหมายของดัชนีหักเห ($n$) และทิศทางการเบนของลำแสงเมื่อเดินทางผ่านตัวกลางต่างชนิดกันได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายหลักการทำงานของเครื่อง Hand Refractometer ในการวัดปริมาณน้ำตาล ($^\circ\text{Brix}$) ของกระบวนการหมักไวน์หรืออาหารเลี้ยงเชื้อได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการทดลองลากแนวรังสีแสงตกกระทบและรังสีหักเหอย่างละเอียดรอบคอบ <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Hands-on Optical Ray Tracing</strong>&emsp; ใช้กล่องกำเนิดลำแสงเลเซอร์ฉายผ่านแท่งแก้วปริซึมและสารละลายน้ำตาลความเข้มข้นต่างกัน พร้อมจำกฎง่ายๆ โดยไม่ต้องกดเครื่องคิดเลขตรีโกณมิติว่า “<strong>น้อยไปมาก เบนเข้าหาเส้นแนวฉาก / มากไปน้อย เบนออกจากเส้นแนวฉาก</strong>”</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 9 ชุดกล่องแสงเลเซอร์ แท่งพลาสติกใส และเครื่องวัดความหวาน Hand Refractometer</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>คำถามท้ายคาบเรื่องดัชนีหักเหและทิศทางการเบนของแสง <strong>(CLO1, CLO2)</strong></li><li>รายงานปฏิบัติการที่ 9 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: ธรรมชาติของแสงและดัชนีหักเหของตัวกลางทางชีวภาพ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ธรรมชาติของแสงและดัชนีหักเหของตัวกลางทางชีวภาพ</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-9.1"><img src="../images/maintex/sec_3d/ch09_s1.jpg" alt="ภาพที่ 9.1" loading="lazy"><figcaption><strong>ภาพที่ 9.1</strong>&ensp;เปรียบเทียบค่าดัชนีหักเห ($n = c/v$) ของอากาศ น้ำ ไซโทพลาซึมของเซลล์สด กระจกสไลด์ และน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$)</figcaption></figure>
<p>แสงที่ตามนุษย์มองเห็น (<strong>Visible Light</strong>) เป็นคลื่นแม่เหล็กไฟฟ้าที่มีช่วงความยาวคลื่น ($\lambda$) อยู่ระหว่าง $400\text{ nm}$ (แสงสีม่วง) ถึง $700\text{ nm}$ (แสงสีแดง) ในสุญญากาศหรือในอากาศ แสงเดินทางด้วยอัตราเร็วสูงสุดคงที่คือ $c \approx 3.0 \times 10^8\text{ m/s}$ แต่เมื่อแสงเดินทางเข้าสู่ตัวกลางโปร่งใสอื่นๆ เช่น น้ำ กลีเซอรีน กระจกสไลด์ หรือน้ำมันช่วยส่อง (<strong>Immersion Oil</strong>) อัตราเร็วของแสง ($v$) จะลดลง อัตราส่วนระหว่างอัตราเร็วแสงในสุญญากาศต่ออัตราเร็วแสงในตัวกลางนั้น เรียกว่า <strong>ดัชนีหักเห</strong> (<strong>Refractive Index</strong>, $n$) ดังสมการที่ (9.1)</p>
<div class="tex-display">\[n = \frac{c}{v} \tag{9.1}\]</div>
<p>ตัวกลางที่มีความหนาแน่นเชิงแสงมากจะมีค่าดัชนีหักเห $n$ สูง และแสงจะเดินทางผ่านได้ช้าลง ค่าดัชนีหักเหของตัวกลางที่เกี่ยวข้องกับการส่องกล้องจุลทรรศน์แสดงไว้ในภาพที่ 9.1 และตารางที่ 9.1</p>
<div class="tex-tablefig" id="tab-9.1"><div class="tex-tablecap"><strong>ตารางที่ 9.1</strong>&ensp;ค่าดัชนีหักเห ($n$) ของตัวกลางสำคัญในงานกล้องจุลทรรศน์และจุลชีววิทยา</div><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th>ชนิดของตัวกลาง</th><th>ดัชนีหักเห ($n$)</th><th>ความสำคัญในงานจุลชีววิทยา</th></tr></thead><tbody><tr><td>อากาศ (Air)</td><td>$1.000$</td><td>ช่องว่างระหว่างแผ่นสไลด์กับเลนส์ใกล้วัตถุกำลังขยายต่ำ (4x, 10x, 40x)</td></tr><tr><td>น้ำบริสุทธิ์ (Water)</td><td>$1.333$</td><td>ตัวกลางหลักภายในไซโทพลาซึมของเซลล์สด (ทำให้เซลล์สดดูใสเมื่อไม่ย้อมสี)</td></tr><tr><td>กระจกสไลด์และแผ่นปิดสไลด์</td><td>$1.515$</td><td>วัสดุมาตรฐานของแผ่นสไลด์แก้วและเลนส์ใกล้วัตถุของกล้องจุลทรรศน์</td></tr><tr><td>น้ำมันช่วยส่อง (Immersion Oil)</td><td>$1.515$</td><td>มีค่า $n$ เท่ากับกระจกสไลด์ทุกประการ ใช้หยดเชื่อมเลนส์หัวน้ำมัน 100x เพื่อป้องกันแสงหักเหหนี</td></tr></tbody></table></div></div>
            </div>
        </section>
        
        <!-- Section: กฎการสะท้อนและกฎการหักเหของแสงฉบับไม่ต้องจำตรีโกณมิติ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กฎการสะท้อนและกฎการหักเหของแสงฉบับไม่ต้องจำตรีโกณมิติ</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-9.2"><img src="../images/maintex/sec_3d/ch09_s2.jpg" alt="ภาพที่ 9.2" loading="lazy"><figcaption><strong>ภาพที่ 9.2</strong>&ensp;การเบนของลำแสงเลเซอร์ตามกฎการหักเหของสเนลล์เมื่อเดินทางผ่านรอยต่อระหว่างตัวกลางที่มีค่าดัชนีหักเหต่างกัน</figcaption></figure>
<p>เมื่อลำแสงตกกระทบผิวรอยต่อระหว่างตัวกลางสองชนิดโดยทำมุมตกกระทบ $\theta_1$ กับ<strong>เส้นแนวฉาก</strong> (<strong>Normal Line</strong> คือเส้นประที่ลากตั้งฉากกับผิวรอยต่อ) แสงส่วนหนึ่งจะสะท้อนกลับโดยมี<strong>มุมตกกระทบเท่ากับมุมสะท้อนเสมอ</strong> ($\theta_{\text{incident}} = \theta_{\text{reflected}}$) และแสงอีกส่วนหนึ่งจะทะลุผ่านเข้าสู่ตัวกลางที่สองโดยเกิดการเบนทิศทางตาม<strong>กฎของสเนลล์</strong> (<strong>Snell's Law</strong>) ในสมการที่ (9.2)</p>
<div class="tex-display">\[n_1 \sin\theta_1 = n_2 \sin\theta_2 \tag{9.2}\]</div>
<p>สำหรับนักศึกษาจุลชีววิทยา เราสามารถสรุปทิศทางการหักเหของแสงเพื่อนำไปใช้วิเคราะห์กล้องจุลทรรศน์ได้ทันทีโดยไม่ต้องกดเครื่องคิดเลขหาค่าไซน์ ($\sin$) ดังแสดงในภาพที่ 9.2 และภาพที่ 9.3</p>
<figure class="tex-figure tex-figure-diagram" id="fig-9.3"><img src="../images/maintex/tikz/ch09_tikz1.svg" alt="ภาพที่ 9.3" loading="lazy"><figcaption><strong>ภาพที่ 9.3</strong>&ensp;ทิศทางการเบนของลำแสงเมื่อเดินทางผ่านรอยต่อระหว่างอากาศกับกระจกสไลด์</figcaption></figure>
<div class="tex-aruco" data-aruco="8"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 8"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="1" width="1" height="1" fill="#fff"/><rect x="3" y="1" width="1" height="1" fill="#fff"/><rect x="1" y="2" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="3" y="3" width="1" height="1" fill="#fff"/><rect x="1" y="4" width="1" height="1" fill="#fff"/><rect x="4" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 8 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 8 — บทที่ 9: การหักเหของสเนลล์และเครื่องวัดค่าบริกซ์การหมักยีสต์ Refractometer</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;แสดงการเบนของลำแสงเลเซอร์เมื่อผ่านน้ำหมักที่มีความเข้มข้นน้ำตาลต่างกัน และสเกลเส้นแบ่งเขตมืด–สว่างในหน่วยองศาบริกซ์ ($^\circ\text{Brix}$)</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;มุมตกกระทบ $\theta_1$ ($^\circ$), ค่าความหวานน้ำหมัก ($0\text{--}30\,^\circ\text{Brix}$), เวลาการหมักยีสต์</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=8&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 8</a></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 9.1&ensp;การคำนวณอัตราเร็วของแสงเมื่อเดินทางผ่านแผ่นสไลด์แก้วและน้ำ</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; แสงเดินทางในสุญญากาศด้วยอัตราเร็ว $c = 3.0 \times 10^8\text{ m/s}$ เมื่อลำแสงจากหลอดไฟใต้กล้องจุลทรรศน์เดินทางผ่านหยดน้ำบนสไลด์ซึ่งมีดัชนีหักเห $n = 1.33$ อัตราเร็วของแสงในหยดน้ำ ($v$) จะมีค่าเท่าใด</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 ใช้สามเหลี่ยมสูตรดัชนีหักเห $n = c / v$ ปิดตัวแปร $v$ จะได้ $v = c / n$</strong>
<div class="tex-display">\[
        v = \frac{c}{n}
    \]</div></li><li><strong>ขั้นที่ 2 แทนค่าตัวเลขแล้วหารกัน</strong>
<div class="tex-display">\[
        v = \frac{3.0 \times 10^8\text{ m/s}}{1.33} \approx 2.26 \times 10^8\text{ m/s}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; อัตราเร็วของแสงขณะเดินทางผ่านหยดน้ำบนสไลด์มีค่าเท่ากับ $2.26 \times 10^8\text{ m/s}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 10 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 10</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-9.4"><img src="../images/maintex/sec_3d/ch09_s3.jpg" alt="ภาพที่ 9.4" loading="lazy"><figcaption><strong>ภาพที่ 9.4</strong>&ensp;ชุดปฏิบัติการที่ 9 สำหรับวัดมุมตกกระทบ–มุมหักเหผ่านแท่งอะคริลิกใส และการวัดความหวานน้ำหมักยีสต์ ($^\circ\text{Brix}$) ด้วยเครื่อง Hand Refractometer</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 9&emsp; การสะท้อนและการหักเหของแสงผ่านตัวกลางและสารละลาย (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (การสะท้อนและการหักเหของแสง), CLO3 (ทักษะการทดลองทางแสง), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 9.4)</strong></p>
<ul class="tex-ul"><li>ชุดกล่องกำเนิดลำแสงเลเซอร์, กระจกเงาระนาบ, แท่งอะคริลิกใสครึ่งวงกลม, กระดาษกราฟวงกลมวัดมุม (Protractor)</li><li>เครื่องวัดดัชนีหักเหและความหวาน (Hand Refractometer) และสารละลายน้ำตาลกลูโคสความเข้มข้น $5\%, 10\%$ และ $20\%$</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การตรวจสอบกฎการหักเหของแสง</strong>&emsp; วางแท่งอะคริลิกใสบนกระดาษวัดมุม ฉายลำแสงเลเซอร์จากอากาศเข้าสู่อะคริลิกด้วยมุมตกกระทบ $\theta_1 = 30^\circ$ และ $45^\circ$ อ่านค่ามุมหักเห $\theta_2$ และสังเกตว่าลำแสงเบนเข้าหาเส้นแนวฉากจริงหรือไม่</li><li><strong>ตอนที่ 2 การใช้เครื่อง Refractometer ติดตามความเข้มข้นน้ำตาลสำหรับการหมักจุลินทรีย์</strong>&emsp; หยดน้ำกลั่นปรับตั้งศูนย์เครื่อง Hand Refractometer จากนั้นหยดสารละลายน้ำตาลกลูโคส $5\%, 10\%$ และ $20\%$ อ่านค่าองศาบริกซ์ ($^\circ\text{Brix}$) ซึ่งแปรผันตรงกับดัชนีหักเหของสารละลาย</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ตัวอย่างสารละลายและการทดลอง</strong></th><th><strong>มุมตกกระทบ $\theta_1$ หรือความเข้มข้น</strong></th><th><strong>มุมหักเห $\theta_2$ หรือค่า $^\circ\text{Brix}$</strong></th><th><strong>สรุปทิศทางการเบนของแสง</strong></th></tr></thead><tbody><tr><td>แสงผ่านอากาศสู่อะคริลิก ครั้งที่ 1</td><td>$\theta_1 = 30^\circ$</td><td>$\theta_2 = $ ............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>แสงผ่านอากาศสู่อะคริลิก ครั้งที่ 2</td><td>$\theta_1 = 45^\circ$</td><td>$\theta_2 = $ ............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>สารละลายน้ำตาลกลูโคสหมักยีสต์</td><td>$10\%$ และ $20\%$</td><td>............ / ............ $^\circ\text{Brix}$</td><td><span class="tex-dotfill"></span></td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 9 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เพราะเหตุใดการส่องดูเซลล์แบคทีเรียที่มีชีวิตในหยดน้ำ (Wet Mount) โดยไม่ย้อมสี จึงมองเห็นขอบเขตเซลล์ได้ยากมาก จงอธิบายโดยเปรียบเทียบดัชนีหักเหของไซโทพลาซึมกับน้ำรอบเซลล์</li><li>เมื่อแสงเดินทางออกจากแผ่นสไลด์แก้ว ($n = 1.515$) ออกสู่ชั้นอากาศ ($n = 1.000$) ลำแสงจะเบนเข้าหาหรือเบนหนีออกจากเส้นแนวฉาก</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch08_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 8: ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส
        </a>
    
                
        <a href="ch10_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 10: กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
