<?php
$pageTitle = "บทที่ 11: กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 11</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 11 &bull; RADIOACTIVITY & UV-C STERILIZATION
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 12)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 12
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=10&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 10 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab11_radioactivity_uv.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 11: การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 11&emsp; กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์ (สัปดาห์ที่ 12)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>11.1 โครงสร้างนิวเคลียส ไอโซโทปกัมมันตรังสี และชนิดของรังสี (แอลฟา บีตา แกมมา และรังสีอัลตราไวโอเลต)</li><li>11.2 แนวคิดครึ่งชีวิต ($T_{1/2}$) และการคำนวณจำนวนที่เหลืออยู่ด้วยการหารครึ่งทีละขั้นโดยไม่ใช้ลอการิทึม</li><li>11.3 การประยุกต์ใช้รังสีแกมมาและรังสี UV-C ($254\text{ nm}$) ในการทำลายดีเอ็นเอของจุลินทรีย์และกฎกำลังสองผกผันของความเข้มรังสี</li><li>11.4 ปฏิบัติการที่ 11 การจำลองการสลายตัวตามครึ่งชีวิตและการศึกษาผลของระยะห่างและเวลาฉายรังสี UV ต่อประสิทธิภาพการฆ่าเชื้อ</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>เปรียบเทียบอำนาจทะลุทะลวงของรังสีแอลฟา บีตา แกมมา และรังสี UV-C และคำนวณครึ่งชีวิตด้วยวิธีหารสองเป็นขั้นๆ ได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ว่าทำไมรังสี UV-C จึงใช้ฆ่าเชื้อได้เฉพาะบนพื้นผิวและในตู้ปลอดเชื้อ (Biosafety Cabinet) แต่ไม่สามารถทะลุผ่านฝาพลาสติกของจานเพาะเชื้อได้ ในขณะที่รังสีแกมมาสามารถทะลุฆ่าเชื้อเวชภัณฑ์ทั้งกล่องได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติตามหลักความปลอดภัยทางรังสี 3 ประการ (เวลา ระยะห่าง และฉากกั้น) อย่างเคร่งครัด <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Simulation &amp; Data Plotting</strong>&emsp; ใช้การทอดลูกเต๋าหรือเหรียญจำลองการสลายตัวกัมมันตรังสีและการตายของประชากรแบคทีเรียเมื่อได้รับรังสี (Decimal Reduction Time, ค่า $D$-value) เพื่อสร้างกราฟการลดลงแบบครึ่งชีวิตด้วยตนเอง</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 11 ชุดจำลองครึ่งชีวิต และเครื่องวัดความเข้มแสง/รังสี UV ตามระยะห่าง</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>แบบฝึกหัดการคำนวณครึ่งชีวิตและกฎกำลังสองผกผัน <strong>(CLO1, CLO2)</strong></li><li>กราฟครึ่งชีวิตและรายงานปฏิบัติการที่ 11 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: ชนิดของรังสีและอำนาจทะลุทะลวงในงานจุลชีววิทยา -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ชนิดของรังสีและอำนาจทะลุทะลวงในงานจุลชีววิทยา</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-11.1"><img src="../images/maintex/sec_3d/ch11_s1.jpg" alt="ภาพที่ 11.1" loading="lazy"><figcaption><strong>ภาพที่ 11.1</strong>&ensp;กลไกการเกิดพันธะ Thymine Dimer ในสายดีเอ็นเอจากรังสี UV-C ($254\text{ nm}$) และการเปรียบเทียบอำนาจทะลุทะลวงของรังสีแอลฟา บีตา และแกมมา ($^{60}\text{Co}$)</figcaption></figure>
<p>รังสีที่นำมาประยุกต์ใช้ในงานจุลชีววิทยาและการแพทย์แบ่งออกเป็น 2 กลุ่มใหญ่ตามพลังงาน ได้แก่ <strong>รังสีไม่ก่อไอออน</strong> (<strong>Non-Ionizing Radiation</strong>) เช่น <strong>รังสีอัลตราไวโอเลตชนิดซี</strong> (<strong>UV-C</strong> ความยาวคลื่นประมาณ $254\text{ nm}$) ซึ่งมีพลังงานพอเหมาะที่จะถูกดูดกลืนโดยสายดีเอ็นเอของแบคทีเรียและไวรัส ทำให้เกิดพันธะเชื่อมผิดปกติระหว่างเบสไทมีน (<strong>Thymine Dimer</strong>) จนจุลินทรีย์ไม่สามารถจำลองตัวเองและตายในที่สุด อย่างไรก็ตาม รังสี UV-C มีอำนาจทะลุทะลวงต่ำมาก แม้แต่แผ่นแก้วหรือฝาพลาสติกใสของจานเพาะเชื้อก็กั้นรังสี UV-C ได้เกือบหมด จึงใช้สำหรับการฆ่าเชื้อบนพื้นผิวโต๊ะปฏิบัติการและอากาศภายใน<strong>ตู้ปลอดเชื้อชีวภาพ</strong> (<strong>Biosafety Cabinet</strong>) เท่านั้น</p>
<p>ส่วนอีกกลุ่มหนึ่งคือ <strong>รังสีก่อไอออน</strong> (<strong>Ionizing Radiation</strong>) ที่เกิดจากการสลายตัวของนิวเคลียสกัมมันตรังสี ได้แก่ <strong>รังสีแอลฟา</strong> ($\alpha$ กั้นได้ด้วยแผ่นกระดาษ), <strong>รังสีบีตา</strong> ($\beta$ กั้นได้ด้วยแผ่นอะลูมิเนียมบาง) และ<strong>รังสีแกมมา</strong> ($\gamma$ เช่น จากโคบอลต์-60, $^{60}\text{Co}$) ซึ่งเป็นคลื่นแม่เหล็กไฟฟ้าพลังงานสูงมากที่มีอำนาจทะลุทะลวงผ่านกล่องพัสดุและพลาสติกได้อย่างสมบูรณ์ จึงนิยมใช้ฉายรังสีฆ่าเชื้อเข็มฉีดยา จานเพาะเชื้อพลาสติกสำเร็จรูป และอาหารส่งออก ดังแสดงในภาพที่ 11.1 และภาพที่ 11.2</p>
<figure class="tex-figure tex-figure-diagram" id="fig-11.2"><img src="../images/maintex/tikz/ch11_tikz1.svg" alt="ภาพที่ 11.2" loading="lazy"><figcaption><strong>ภาพที่ 11.2</strong>&ensp;การเปรียบเทียบอำนาจทะลุทะลวงของรังสี UV-C รังสีแอลฟา รังสีบีตา และรังสีแกมมาในการฆ่าเชื้อทางจุลชีววิทยา</figcaption></figure>
<div class="tex-aruco" data-aruco="10"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 10"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="3" y="1" width="1" height="1" fill="#fff"/><rect x="3" y="2" width="1" height="1" fill="#fff"/><rect x="1" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 10 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 10 — บทที่ 11: กัมมันตภาพรังสี กฎกำลังสองผกผัน และการฆ่าเชื้อด้วยรังสี UV-C (254 nm)</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองการแผ่รังสี UV-C ทำลายพันธะไทมีนในสายดีเอ็นเอ (Thymine Dimer) การลดลงของความเข้มรังสีตามระยะทาง $I \propto 1/r^2$ และครึ่งชีวิตกัมมันตภาพรังสี</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ระยะห่างจากหลอดรังสี $r$ ($10\text{--}100\text{ cm}$), เวลาฉายรังสี $t$ ($\text{s}$), อัตราการรอดชีวิตของจุลินทรีย์ (%)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=10&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 10</a></div></div>
            </div>
        </section>
        
        <!-- Section: การคำนวณครึ่งชีวิตแบบเข้าใจง่ายโดยไม่ต้องใช้ลอการิทึม -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">การคำนวณครึ่งชีวิตแบบเข้าใจง่ายโดยไม่ต้องใช้ลอการิทึม</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-11.3"><img src="../images/maintex/sec_3d/ch11_s2.jpg" alt="ภาพที่ 11.3" loading="lazy"><figcaption><strong>ภาพที่ 11.3</strong>&ensp;การลดลงของปริมาณไอโซโทปกัมมันตรังสีและอัตราการรอดชีวิตของจุลินทรีย์แบบหารครึ่งทีละรอบครึ่งชีวิต ($T_{1/2}$) และกฎกำลังสองผกผันของความเข้มรังสี ($I \propto 1/r^2$)</figcaption></figure>
<p><strong>ครึ่งชีวิต</strong> (<strong>Half-Life</strong>, $T_{1/2}$) คือระยะเวลาที่สารกัมมันตรังสีสลายตัวจนเหลือปริมาณเพียง<strong>ครึ่งหนึ่ง</strong> ($50\%$ หรือ $\frac{1}{2}$) ของปริมาณเริ่มต้น นักศึกษาไม่จำเป็นต้องใช้ฟังก์ชันเอกซ์โพเนนเชียลหรือลอการิทึมในการคำนวณ แต่สามารถใช้<strong>วิธีนับจำนวนรอบของการหารครึ่ง</strong> ($n = \text{เวลาทั้งหมด } t \div T_{1/2}$) ได้ทันทีดังแสดงในภาพที่ 11.3 และสมการที่ (11.1)</p>
<div class="tex-display">\[N = N_0 \times \left(\frac{1}{2}\right)^n \qquad \text{โดยที่} \qquad n = \frac{t}{T_{1/2}} \tag{11.1}\]</div>
<p>กล่าวคือ เมื่อผ่านไป $1$ ครึ่งชีวิตจะเหลือ $\frac{1}{2}$ ($50\%$), ผ่านไป $2$ ครึ่งชีวิตจะเหลือ $\frac{1}{4}$ ($25\%$), ผ่านไป $3$ ครึ่งชีวิตจะเหลือ $\frac{1}{8}$ ($12.5\%$) และผ่านไป $4$ ครึ่งชีวิตจะเหลือ $\frac{1}{16}$ ($6.25\%$) ตามลำดับ</p>
<p>นอกจากนี้ ในการใช้งานหลอดรังสี UV-C เพื่อฆ่าเชื้อ ความเข้มของรังสี ($I$) ที่ตกกระทบบนพื้นผิวจะลดลงตาม<strong>กฎกำลังสองผกผันของระยะห่าง</strong> (<strong>Inverse Square Law</strong>) คือ $I \propto 1/r^2$ ดังนั้น หากวางจานเพาะเชื้อห่างจากหลอด UV เพิ่มขึ้นเป็น $2$ เท่า ความเข้มรังสี UV ที่ตกกระทบจะลดลงเหลือเพียง $1/2^2 = 1/4$ เท่าของเดิม</p>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 11.1&ensp;การคำนวณครึ่งชีวิตของไอโซโทปติดตามทางชีววิทยาด้วยวิธีหารสองทีละขั้น</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; นักวิจัยจุลชีววิทยาใช้ไอโซโทปฟอสฟอรัส-32 ($^{32}\text{P}$) ซึ่งมีครึ่งชีวิต $T_{1/2} = 14\text{ วัน}$ ในการติดฉลากสายดีเอ็นเอของแบคทีเรีย หากเริ่มต้นมีสารกัมมันตรังสี $^{32}\text{P}$ มวล $N_0 = 80\text{ }\mu\text{g}$ เมื่อเก็บไว้เป็นเวลา $t = 42\text{ วัน}$ จะเหลือ $^{32}\text{P}$ อยู่กี่ไมโครกรัม ($\mu\text{g}$)</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 หาจำนวนรอบของครึ่งชีวิต ($n = t / T_{1/2}$)</strong>
<div class="tex-display">\[
        n = \frac{42\text{ วัน}}{14\text{ วันต่อรอบ}} = 3\text{ รอบครึ่งชีวิต}
    \]</div></li><li><strong>ขั้นที่ 2 นำค่าเริ่มต้น $80\text{ }\mu\text{g}$ มาหารด้วย $2$ จำนวน $3$ ครั้งต่อเนื่องกัน</strong>
<div class="tex-display">\[
        80\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 1 (14 วัน)}} 40\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 2 (28 วัน)}} 20\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 3 (42 วัน)}} 10\text{ }\mu\text{g}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; เมื่อเวลาผ่านไป $42\text{ วัน}$ จะเหลือไอโซโทป $^{32}\text{P}$ อยู่เท่ากับ $10\text{ }\mu\text{g}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 12 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 12</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-11.4"><img src="../images/maintex/sec_3d/ch11_s3.jpg" alt="ภาพที่ 11.4" loading="lazy"><figcaption><strong>ภาพที่ 11.4</strong>&ensp;ชุดปฏิบัติการที่ 11 สำหรับจำลองกราฟการสลายตัวครึ่งชีวิตและวัดความเข้มแสงตามระยะห่างเพื่อตรวจสอบกฎกำลังสองผกผัน</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 11&emsp; การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (ครึ่งชีวิตและกฎกำลังสองผกผัน), CLO2 (การควบคุมจุลินทรีย์ด้วยรังสี UV), CLO3 (ความปลอดภัยทางรังสี), CLO4 (การเขียนกราฟครึ่งชีวิต)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 11.4)</strong></p>
<ul class="tex-ul"><li>เหรียญหรือลูกเต๋าจำลองอะตอมกัมมันตรังสีและเซลล์แบคทีเรียจำนวน 100 ชิ้น พร้อมกล่องเขย่า</li><li>แหล่งกำเนิดแสงจำลองหลอด UV และเครื่องวัดความเข้มแสงดิจิทัล (Lux / UV Radiometer) พร้อมไม้บรรทัดวัดระยะห่าง</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การจำลองกราฟการสลายตัวแบบครึ่งชีวิต</strong>&emsp; เริ่มต้นด้วยเหรียญจำนวน $N_0 = 100$ เหรียญ เขย่าในกล่องแล้วเทออก คัดเหรียญที่หงายหน้าก้อยออก (ถือว่าสลายตัวหรือเซลล์ตายจากรังสี) นับจำนวนเหรียญที่เหลือรอด ($N$) บันทึกผลแล้วนำเหรียญที่เหลือมาเขย่าซ้ำอีก 5 รอบ เขียนกราฟระหว่างจำนวนที่เหลือ $N$ กับจำนวนรอบการเขย่า</li><li><strong>ตอนที่ 2 การตรวจสอบกฎกำลังสองผกผันของความเข้มรังสีตามระยะห่าง</strong>&emsp; วัดค่าความเข้มแสงเมื่อวางหัววัดห่างจากหลอดกำเนิดแสงเป็นระยะ $r = 10\text{ cm}, 20\text{ cm}$ และ $40\text{ cm}$ เปรียบเทียบอัตราส่วนความเข้มที่ลดลง</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>รอบที่ ($n$)</strong></th><th><strong>เริ่มต้น ($n=0$)</strong></th><th><strong>รอบที่ 1</strong></th><th><strong>รอบที่ 2</strong></th><th><strong>รอบที่ 3</strong></th><th><strong>รอบที่ 4</strong></th><th><strong>รอบที่ 5</strong></th></tr></thead><tbody><tr><td>จำนวนตามทฤษฎี</td><td>$100$</td><td>$50$</td><td>$25$</td><td>$12.5$</td><td>$6.25$</td><td>$3.125$</td></tr><tr><td>จำนวนที่วัดได้จริง</td><td>$100$</td><td>........</td><td>........</td><td>........</td><td>........</td><td>........</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 11 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เพราะเหตุใดขณะเปิดหลอดรังสี UV-C ในตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) นักศึกษาจึงต้องปิดกระจกหน้าตู้ลงและห้ามสอดมือหรือจ้องมองแสงสีม่วงของหลอด UV โดยตรง</li><li>หากการฉายรังสี UV-C ทุกๆ $2\text{ นาที}$ สามารถลดจำนวนแบคทีเรียบนพื้นผิวลงได้ครึ่งหนึ่ง ($50\%$) หากเริ่มต้นมีแบคทีเรีย $1{,}600\text{ เซลล์}$ เมื่อเปิดไฟฉายรังสีนาน $8\text{ นาที}$ จะเหลือแบคทีเรียรอดชีวิตกี่เซลล์</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch10_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 10: กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง
        </a>
    
                
        <a href="ch12_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 12: สเปกโตรโฟโตมิเตอร์และการบูรณาการฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยา <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
