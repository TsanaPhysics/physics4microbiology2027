<?php
$pageTitle = "บทที่ 8: ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 8</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 08 &bull; CURRENT, OHM & ELECTROPHORESIS
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 9)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 9
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=7&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 7 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab08_electrophoresis.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 08: กฎของโอห์มและแบบจำลอง Gel Electrophoresis (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 8&emsp; ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส (สัปดาห์ที่ 9)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>8.1 กระแสไฟฟ้า ความต่างศักย์ ความต้านทาน และกฎของโอห์ม ($V = IR$)</li><li>8.2 กำลังไฟฟ้า ($P = VI$) ความร้อนจูลในสารละลายบัฟเฟอร์ และความปลอดภัยทางไฟฟ้าในห้องปฏิบัติการเปียก</li><li>8.3 หลักการทางฟิสิกส์ของเจลอิเล็กโทรโฟรีซิส (Gel Electrophoresis) ในการแยกขนาดสายดีเอ็นเอและโปรตีนของจุลินทรีย์</li><li>8.4 ปฏิบัติการที่ 8 การวัดค่าตามกฎของโอห์มและการทดลองจำลองการเคลื่อนที่ของโมเลกุลมีประจุในสนามไฟฟ้า</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>ใช้สามเหลี่ยมสูตรกฎของโอห์ม ($V = IR$) และกำลังไฟฟ้า ($P = VI$) คำนวณหาปริมาณทางไฟฟ้าได้ถูกต้อง <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายกลไกทางฟิสิกส์ของเครื่อง Gel Electrophoresis ได้ว่าทำไมต้องหยดตัวอย่าง DNA ฝั่งขั้วลบ (Cathode) เพื่อวิ่งไปหาขั้วบวก (Anode) และทำไมการเพิ่มความเข้มข้นของบัฟเฟอร์มากเกินไปจึงทำให้เจลร้อนจัดจนหลอมละลาย <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการวัดค่าทางไฟฟ้าด้วยมัลติมิเตอร์อย่างปลอดภัยตามหลักจรรยาบรรณห้องปฏิบัติการ <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Inquiry-Based Lab</strong>&emsp; วิเคราะห์คำขวัญจำง่ายสำหรับการรันเจลดีเอ็นเอ “<strong>Run to Red</strong>” (ดีเอ็นเอมีประจุลบจึงวิ่งเข้าหาขั้วบวกสายสีแดงเสมอ)</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 8 แหล่งจ่ายไฟกระแสตรง มัลติมิเตอร์ดิจิทัล และชุดกล่อง Gel Electrophoresis</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>ใบงานคำนวณกฎของโอห์มและกำลังไฟฟ้า <strong>(CLO1, CLO2)</strong></li><li>การประเมินทักษะการใช้มัลติมิเตอร์และรายงานปฏิบัติการที่ 8 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: กระแสไฟฟ้า ความต้านทาน และกฎของโอห์ม -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กระแสไฟฟ้า ความต้านทาน และกฎของโอห์ม</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-8.1"><img src="../images/maintex/sec_3d/ch08_s1.jpg" alt="ภาพที่ 8.1" loading="lazy"><figcaption><strong>ภาพที่ 8.1</strong>&ensp;ความสัมพันธ์ระหว่างความต่างศักย์ ($V$) กระแสไฟฟ้า ($I$) ความต้านทาน ($R$) ตามกฎของโอห์ม และกำลังความร้อน ($P = I^2R$) ในแหล่งจ่ายไฟอิเล็กโทรโฟรีซิส</figcaption></figure>
<p>เมื่อมี<strong>ความต่างศักย์ไฟฟ้า</strong> (<strong>Voltage</strong>, $V$ มีหน่วยเป็น<strong>โวลต์</strong> $\text{V}$) ตกคร่อมตัวนำไฟฟ้าหรือสารละลายอิเล็กโทรไลต์ จะเกิดการไหลของประจุไฟฟ้าซึ่งเรียกว่า <strong>กระแสไฟฟ้า</strong> (<strong>Electric Current</strong>, $I$ มีหน่วยเป็น<strong>แอมแปร์</strong> $\text{A}$ หรือมิลลิแอมแปร์ $\text{mA}$ โดย $1\text{ A} = 1{,}000\text{ mA}$) ปริมาณกระแสไฟฟ้าที่ไหลได้จะถูกจำกัดด้วย<strong>ความต้านทานไฟฟ้า</strong> (<strong>Resistance</strong>, $R$ มีหน่วยเป็น<strong>โอห์ม</strong> $\Omega$) ตาม<strong>กฎของโอห์ม</strong> (<strong>Ohm's Law</strong>) ดังแสดงในภาพที่ 8.1 และสมการที่ (8.1)</p>
<div class="tex-display">\[V = I R \qquad \Longleftrightarrow \qquad I = \frac{V}{R} \qquad \Longleftrightarrow \qquad R = \frac{V}{I} \tag{8.1}\]</div>
<p>เมื่อกระแสไฟฟ้าไหลผ่านตัวต้านทานหรือสารละลายบัฟเฟอร์ จะเกิดอัตราการสูญเสียพลังงานไฟฟ้าไปเป็นพลังงานความร้อน ซึ่งคำนวณได้จาก<strong>กำลังไฟฟ้า</strong> (<strong>Electric Power</strong>, $P$ มีหน่วยเป็น<strong>วัตต์</strong> $\text{W}$) ตามสมการที่ (8.2)</p>
<div class="tex-display">\[P = V I = I^2 R \tag{8.2}\]</div>
            </div>
        </section>
        
        <!-- Section: ฟิสิกส์ของเจลอิเล็กโทรโฟรีซิสในการแยกดีเอ็นเอของจุลินทรีย์ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ฟิสิกส์ของเจลอิเล็กโทรโฟรีซิสในการแยกดีเอ็นเอของจุลินทรีย์</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-8.2"><img src="../images/maintex/sec_3d/ch08_s2.jpg" alt="ภาพที่ 8.2" loading="lazy"><figcaption><strong>ภาพที่ 8.2</strong>&ensp;กลไกการเคลื่อนที่ของสายดีเอ็นเอประจุลบผ่านรูพรุนแผ่นวุ้นอะกาโรสมุ่งสู่ขั้วบวกสีแดง (Run to Red) และการแยกแถบดีเอ็นเอตามขนาดคู่เบส</figcaption></figure>
<p>ในงานอณูจุลชีววิทยา (<strong>Molecular Microbiology</strong>) เมื่อเราเพิ่มปริมาณดีเอ็นเอของแบคทีเรียหรือไวรัสด้วยเทคนิค PCR แล้ว เราต้องตรวจสอบขนาดของสายดีเอ็นเอด้วยเครื่อง <strong>เจลอิเล็กโทรโฟรีซิส</strong> (<strong>Agarose Gel Electrophoresis</strong>) ซึ่งเป็นการบูรณาการฟิสิกส์ไฟฟ้าและแรงต้านความหนืดเข้าด้วยกันอย่างลงตัว ดังแสดงในภาพที่ 8.2 และภาพที่ 8.3</p>
<figure class="tex-figure tex-figure-diagram" id="fig-8.3"><img src="../images/maintex/tikz/ch08_tikz1.svg" alt="ภาพที่ 8.3" loading="lazy"><figcaption><strong>ภาพที่ 8.3</strong>&ensp;หลักการแยกขนาดสายดีเอ็นเอด้วยสนามไฟฟ้าในแผ่นวุ้นอะกาโรส</figcaption></figure>
<div class="tex-aruco" data-aruco="7"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 7"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="3" y="1" width="1" height="1" fill="#fff"/><rect x="1" y="2" width="1" height="1" fill="#fff"/><rect x="1" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="3" width="1" height="1" fill="#fff"/><rect x="3" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="4" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 7 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 7 — บทที่ 8: กฎของโอห์มและอ่างแยกสายดีเอ็นเอด้วยสนามไฟฟ้า Gel Electrophoresis</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองการวิ่งของชิ้นส่วนดีเอ็นเอประจุลบจากขั้วลบ (สีดำ) ไปยังขั้วบวก (สีแดง) แยกตามขนาดโมเลกุล (bp) และความร้อนจูล $P=IV$</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ความต่างศักย์ $V$ ($50\text{--}150\text{ V}$), ความเข้มข้นเจลอะกาโรส (%), เวลาการรันเจล ($\text{min}$)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=7&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 7</a></div></div>
<div class="tex-box tex-box-bioapp"><div class="tex-box-title"><i class="fa-solid fa-bacteria"></i> 3 กฎฟิสิกส์ที่ควบคุมการแยกดีเอ็นเอใน Gel Electrophoresis</div><div class="tex-box-body"><ol class="tex-ol"><li><strong>ทิศทางการเคลื่อนที่</strong>&emsp; โครงสร้างแกนหลักของสายดีเอ็นเอมีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) จึงมีประจุสุทธิเป็นลบเสมอ ดังนั้นต้องวางหลุมหยดดีเอ็นเอไว้ฝั่ง<strong>ขั้วลบ (สายสีดำ)</strong> เพื่อให้แรงไฟฟ้าดึงดีเอ็นเอวิ่งไปหา<strong>ขั้วบวก (สายสีแดง)</strong> ตามหลักจำง่ายว่า <strong>Run to Red</strong></li><li><strong>การแยกตามขนาดโมเลกุล</strong>&emsp; แผ่นวุ้นอะกาโรสทำหน้าที่เหมือนตาข่ายกรองระดับโมเลกุล สายดีเอ็นเอที่มีขนาดสั้น (คู่เบสน้อย) จะเกิดแรงเสียดทานน้อยจึงวิ่งไปได้ไกลกว่าสายดีเอ็นเอขนาดยาว</li><li><strong>ทำไมห้ามใช้น้ำเปล่าแทนบัฟเฟอร์ TAE/TBE</strong>&emsp; น้ำกลั่นบริสุทธิ์ไม่มีไอออนนำไฟฟ้า ($R$ สูงมาก กระแส $I \approx 0$) ดีเอ็นเอจึงไม่เคลื่อนที่ แต่ถ้าใช้บัฟเฟอร์ที่เข้มข้นเกินไป ความต้านทาน $R$ จะต่ำเกินไปทำให้กระแส $I$ พุ่งสูงและเกิดความร้อน $P = I^2R$ จนแผ่นวุ้นหลอมละลาย!</li></ol></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 8.1&ensp;การคำนวณความต้านทานและกำลังความร้อนของชุด Gel Electrophoresis</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; ในการรันเจลอะกาโรสเพื่อตรวจสอบยีนของแบคทีเรีย นักศึกษาตั้งค่าแหล่งจ่ายไฟไว้ที่ความต่างศักย์ $V = 100\text{ V}$ และอ่านค่ากระแสไฟฟ้าบนหน้าจอได้ $I = 0.05\text{ A}$ ($50\text{ mA}$) จงคำนวณหา (ก) ความต้านทานไฟฟ้า ($R$) ของระบบเจลและบัฟเฟอร์ และ (ข) กำลังไฟฟ้า ($P$) ที่เปลี่ยนเป็นความร้อนในอ่างเจล</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 หาความต้านทานจากสามเหลี่ยมกฎของโอห์ม ($R = V / I$)</strong>
<div class="tex-display">\[
        R = \frac{100\text{ V}}{0.05\text{ A}} = 2{,}000\text{ }\Omega
    \]</div></li><li><strong>ขั้นที่ 2 หากำลังไฟฟ้าจากสูตร $P = V \times I$</strong>
<div class="tex-display">\[
        P = 100\text{ V} \times 0.05\text{ A} = 5.0\text{ W}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; ระบบเจลมีความต้านทานเท่ากับ $2{,}000\text{ }\Omega$ และเกิดกำลังความร้อนในอ่างบัฟเฟอร์เท่ากับ $5.0\text{ W}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 9 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 9</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-8.4"><img src="../images/maintex/sec_3d/ch08_s3.jpg" alt="ภาพที่ 8.4" loading="lazy"><figcaption><strong>ภาพที่ 8.4</strong>&ensp;ชุดปฏิบัติการที่ 8 สำหรับตรวจสอบกฎของโอห์มและการแยกแถบสีมาตรฐานด้วยสนามไฟฟ้ากระแสตรง $100\text{ V}$ ในแผ่นวุ้นอะกาโรส</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 8&emsp; กฎของโอห์มและแบบจำลอง Gel Electrophoresis (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (กฎของโอห์มและกำลังไฟฟ้า), CLO2 (อธิบายกลไก Gel Electrophoresis), CLO3 (ความปลอดภัยทางไฟฟ้า), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 8.4)</strong></p>
<ul class="tex-ul"><li>แหล่งจ่ายไฟกระแสตรงปรับค่าได้, ตัวต้านทานมาตรฐาน, มัลติมิเตอร์ดิจิทัล และชุดกล่องจำลอง Gel Electrophoresis พร้อมแผ่นวุ้นอะกาโรสและสีมาตรฐานจำลองขนาดดีเอ็นเอ</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การตรวจสอบกฎของโอห์ม</strong>&emsp; ต่อวงจรแหล่งจ่ายไฟเข้ากับตัวต้านทาน ปรับแรงดันไฟฟ้าเป็น $2\text{ V}, 4\text{ V}, 6\text{ V}$ และ $8\text{ V}$ วัดค่ากระแสไฟฟ้า $I$ คำนวณความต้านทาน $R = V/I$</li><li><strong>ตอนที่ 2 การแยกสีย้อมมาตรฐานด้วยสนามไฟฟ้าในแผ่นวุ้น</strong>&emsp; ใช้ไมโครปิเปตหยดสารละลายสีผสมปริมาตร $15\text{ }\mu\text{L}$ ลงในหลุมวุ้นฝั่งขั้วลบ ปิดฝาครอบนิรภัย จ่ายแรงดันไฟฟ้า $100\text{ V}$ เป็นเวลา $20$ นาที บันทึกค่ากระแสไฟฟ้า ($\text{mA}$) และวัดระยะทางที่แถบสีแต่ละแถบเคลื่อนที่ไปหาขั้วบวก</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>แรงดัน $V$ ($\text{V}$)</strong></th><th><strong>กระแส $I$ ($\text{A}$)</strong></th><th><strong>ความต้านทาน $R$ ($\Omega$)</strong></th><th><strong>กำลัง $P$ ($\text{W}$)</strong></th><th><strong>ระยะแถบสี ($\text{mm}$)</strong></th></tr></thead><tbody><tr><td>$50\text{ V}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>$100\text{ V}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 8 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>หากนักศึกษาเผลอเสียบสายไฟขั้วบวกและขั้วลบของกล่อง Gel Electrophoresis สลับด้านกัน จะเกิดอะไรขึ้นกับตัวอย่างดีเอ็นเอที่หยดไว้ในหลุมวุ้น</li><li>ตู้อบเลี้ยงเชื้อจุลินทรีย์ใช้กับไฟบ้านความต่างศักย์ $220\text{ V}$ และมีกระแสไฟฟ้าไหลผ่าน $2.5\text{ A}$ จงคำนวณหากำลังไฟฟ้าของตู้อบเครื่องนี้ในหน่วยวัตต์ ($\text{W}$)</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch07_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 7: ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม
        </a>
    
                
        <a href="ch09_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 9: ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
