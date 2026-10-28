<?php
$pageTitle = "บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 2</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 02 &bull; VECTORS & MOTION IN FLUID
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                เวกเตอร์และการเคลื่อนที่ในของเหลว
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 2)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 2
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=1&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 1 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab02_brownian_motion.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 02: การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 2&emsp; เวกเตอร์และการเคลื่อนที่ในของเหลว (สัปดาห์ที่ 2)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>2.1 ปริมาณสเกลาร์และปริมาณเวกเตอร์ในระบบชีวภาพ (ระยะทาง การกระจัด อัตราเร็ว และความเร็ว)</li><li>2.2 กลไกการเคลื่อนที่ของแบคทีเรียแบบสลับวิ่งและหมุนสุ่ม (Run and Tumble) และการเคลื่อนที่เข้าหาสารอาหาร</li><li>2.3 การเคลื่อนที่แบบบราวน์และการแพร่ของโมเลกุลในอาหารเลี้ยงเชื้อ</li><li>2.4 ปฏิบัติการที่ 2 การวิเคราะห์กราฟการเคลื่อนที่และการสังเกตการเคลื่อนที่แบบบราวน์เทียบกับการเคลื่อนที่จริงของจุลินทรีย์</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>จำแนกความแตกต่างระหว่างระยะทางกับการกระจัด และคำนวณอัตราเร็วเฉลี่ยของการเคลื่อนที่ของเซลล์ได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ว่าทำไมการสั่นแบบบราวน์ (Brownian Motion) จึงมีระยะกระจัดลัพธ์เป็นศูนย์ และแยกแยะออกจากการว่ายเคลื่อนที่จริงของแบคทีเรียที่มีแฟลกเจลลาได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการทดลองวัดอัตราเร็วการเคลื่อนที่และเขียนกราฟระยะทางกับเวลาได้อย่างถูกต้องและปลอดภัย <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Problem-Based Learning (PBL)</strong>&emsp; ตั้งคำถามกระตุ้นคิด “เมื่อส่องกล้องจุลทรรศน์แบบหยดแขวน (Hanging Drop) แล้วเห็นเซลล์สั่นดุ๊กดิ๊กอยู่กับที่ แปลว่าแบคทีเรียตัวนั้นว่ายน้ำได้จริงหรือไม่”</li><li><strong>ฝึกคำนวณด้วยสามเหลี่ยมสูตร $s = v \times t$</strong>&emsp; คำนวณเวลาที่แบคทีเรียใช้ว่ายข้ามขอบเขตการมองเห็นของกล้องจุลทรรศน์</li><li><strong>ปฏิบัติการทดลอง</strong>&emsp; ทดลองจับเวลาการเคลื่อนที่แนวตรง วาดกราฟความชัน และสังเกตการแพร่ของหยดสีในน้ำอุณหภูมิต่างกัน</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 2 แผนภาพเวกเตอร์การกระจัดของแบคทีเรีย และชุดทดลองการเคลื่อนที่และจานเพาะเชื้อผสมวุ้น</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>แบบทดสอบย่อยท้ายคาบเรื่องสเกลาร์ เวกเตอร์ และการคำนวณอัตราเร็ว <strong>(CLO1)</strong></li><li>การตรวจกราฟและรายงานปฏิบัติการที่ 2 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: ปริมาณสเกลาร์และปริมาณเวกเตอร์ในระบบชีวภาพ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปริมาณสเกลาร์และปริมาณเวกเตอร์ในระบบชีวภาพ</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-2.1"><img src="../images/maintex/sec_3d/ch02_s1.jpg" alt="ภาพที่ 2.1" loading="lazy"><figcaption><strong>ภาพที่ 2.1</strong>&ensp;การเปรียบเทียบระยะทางตามเส้นทางว่ายคดเคี้ยว ($s$, ปริมาณสเกลาร์) กับเวกเตอร์การกระจัดลัพธ์ ($\boldsymbol{d}$, ปริมาณเวกเตอร์) ของแบคทีเรียที่มีแฟลกเจลลา</figcaption></figure>
<p>ในการศึกษาการเคลื่อนที่ของจุลินทรีย์หรือการไหลของของเหลวในห้องปฏิบัติการ ปริมาณทางฟิสิกส์แบ่งออกเป็น 2 ประเภทหลัก ได้แก่ <strong>ปริมาณสเกลาร์</strong> (<strong>Scalar Quantity</strong>) คือปริมาณที่บอกเฉพาะขนาดเพียงอย่างเดียวก็เข้าใจสมบูรณ์ เช่น มวล เวลา อุณหภูมิ พื้นที่ผิวโคโลนี และ<strong>ระยะทาง</strong> (<strong>Distance</strong>, $s$) ส่วนอีกประเภทหนึ่งคือ <strong>ปริมาณเวกเตอร์</strong> (<strong>Vector Quantity</strong>) คือปริมาณที่ต้องระบุทั้งขนาดและทิศทางควบคู่กันเสมอ เช่น แรง สนามไฟฟ้า ความเร็ว และ<strong>การกระจัด</strong> (<strong>Displacement</strong>, $\boldsymbol{d}$)</p>
<p>ความแตกต่างระหว่างระยะทางกับการกระจัดมีความสำคัญอย่างยิ่งในการสังเกตพฤติกรรมของจุลินทรีย์ภายใต้กล้องจุลทรรศน์ (ดังแสดงในภาพที่ 2.1) หากแบคทีเรียตัวหนึ่งเคลื่อนที่วกไปวนมาเป็นเส้นทางคดเคี้ยวรวมระยะทางทั้งหมด $s = 120\text{ }\mu\text{m}$ แต่จุดสุดท้ายอยู่ห่างจากจุดเริ่มต้นในแนวเส้นตรงเพียง $d = 30\text{ }\mu\text{m}$ ในเวลา $t = 10\text{ s}$ เราจะคำนวณ<strong>อัตราเร็วเฉลี่ย</strong> (<strong>Average Speed</strong>, $v$) และ<strong>ขนาดความเร็วเฉลี่ย</strong> (<strong>Average Velocity</strong>, $|\boldsymbol{v}|$) ได้จากสมการที่ (2.1)</p>
<div class="tex-display">\[v = \frac{s}{t} \qquad \text{และ} \qquad |\boldsymbol{v}_{\text{avg}}| = \frac{d}{t} \tag{2.1}\]</div>
            </div>
        </section>
        
        <!-- Section: กลไกการเคลื่อนที่ของแบคทีเรียและการเคลื่อนที่แบบบราวน์ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กลไกการเคลื่อนที่ของแบคทีเรียและการเคลื่อนที่แบบบราวน์</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-2.2"><img src="../images/maintex/sec_3d/ch02_s2.jpg" alt="ภาพที่ 2.2" loading="lazy"><figcaption><strong>ภาพที่ 2.2</strong>&ensp;กลไกการหมุนแฟลกเจลลาแบบพุ่งตรงสลับหมุนสุ่ม (Run and Tumble) เข้าหาสารอาหาร เทียบกับการสั่นสะเทือนแบบบราวน์ (Brownian Motion)</figcaption></figure>
<p>แบคทีเรียที่มีแฟลกเจลลา (<strong>Flagella</strong>) เช่น <em>Escherichia coli</em> หรือ <em>Pseudomonas aeruginosa</em> เคลื่อนที่ในของเหลวด้วยกลไกสลับระหว่าง<strong>ช่วงพุ่งตรง</strong> (<strong>Run</strong> เมื่อแฟลกเจลลาหมุนทวนเข็มนาฬิกาเป็นมัดเดียวกัน) กับ<strong>ช่วงหมุนสุ่มเปลี่ยนทิศ</strong> (<strong>Tumble</strong> เมื่อแฟลกเจลลาหมุนตามเข็มนาฬิกาแล้วกระจายออก) เมื่อมีสารอาหารดึงดูด (<strong>Chemotaxis</strong>) แบคทีเรียจะยืดเวลาช่วงพุ่งตรงเข้าหาสารอาหารให้นานขึ้น ทำให้เกิดเวกเตอร์การกระจัดลัพธ์มุ่งไปสู่แหล่งอาหารอย่างชัดเจน ดังแสดงในภาพที่ 2.2 และภาพที่ 2.3</p>
<figure class="tex-figure tex-figure-diagram" id="fig-2.3"><img src="../images/maintex/tikz/ch02_tikz1.svg" alt="ภาพที่ 2.3" loading="lazy"><figcaption><strong>ภาพที่ 2.3</strong>&ensp;การเปรียบเทียบระหว่าง (ก) การเคลื่อนที่แบบบราวน์ที่มีการกระจัดลัพธ์ใกล้ศูนย์ กับ (ข) การว่ายเคลื่อนที่จริงของแบคทีเรียเข้าหาสารอาหาร</figcaption></figure>
<div class="tex-aruco" data-aruco="1"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 1"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="2" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="3" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="2" width="1" height="1" fill="#fff"/><rect x="1" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="1" y="4" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 1 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 1 — บทที่ 2: การว่ายเคลื่อนที่ของแบคทีเรียด้วยแฟลกเจลลาเทียบกับ Brownian Motion</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;เปรียบเทียบเวกเตอร์การกระจัดลัพธ์ของการว่ายเข้าหาสารอาหารด้วยแฟลกเจลลา กับการสั่นสะเทือนแบบสุ่มของอนุภาคแขวนลอย</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;อุณหภูมิตัวกลาง $T$ ($^\circ\text{C}$), ความเข้มข้นสารดึงดูดเคมี, ความเร็วการหมุนแฟลกเจลลา</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=1&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 1</a></div></div>
<p>ในทางตรงกันข้าม เซลล์ที่ไม่มีแฟลกเจลลา (เช่น แบคทีเรียกลุ่มทรงกลม <em>Staphylococcus aureus</em> หรือเซลล์ที่ตายแล้ว) เมื่ออยู่ในหยดน้ำภายใต้กล้องจุลทรรศน์จะยังคงสั่นสะเทือนอยู่ตลอดเวลา ปรากฏการณ์นี้เรียกว่า <strong>การเคลื่อนที่แบบบราวน์</strong> (<strong>Brownian Motion</strong>) ซึ่งเกิดจากโมเลกุลของน้ำที่เคลื่อนที่ด้วยพลังงานความร้อนวิ่งเข้าชนเซลล์จากทุกทิศทุกทางอย่างสุ่ม ทำให้ผลรวมของเวกเตอร์การกระจัดเมื่อเวลาผ่านไปมีค่าใกล้ศูนย์ ($\boldsymbol{d} \approx 0$) เซลล์จึงเพียงแต่สั่นอยู่กับที่โดยไม่เคลื่อนย้ายตำแหน่งไปข้างหน้า</p>
<p>สำหรับการแพร่ของโมเลกุลสารอาหารหรือยาปฏิชีวนะในวุ้นเพาะเชื้อ (เช่น การทดสอบความไวต่อยาปฏิชีวนะด้วยวิธี Disc Diffusion) ระยะทางเฉลี่ยที่โมเลกุลแพร่ไปได้ ($x_{\text{rms}}$) สัมพันธ์กับสัมประสิทธิ์การแพร่ ($D$) และเวลา ($t$) ตามสมการที่ (2.2)</p>
<div class="tex-display">\[x_{\text{rms}} = \sqrt{2 D t} \tag{2.2}\]</div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 2.1&ensp;การคำนวณอัตราเร็วและความเร็วของแบคทีเรียและการแพร่ของยาปฏิชีวนะ</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; แบคทีเรีย <em>Pseudomonas</em> ตัวหนึ่งว่ายน้ำแบบสลับพุ่งและหมุนสุ่มเป็นระยะทางตามเส้นทางรวม $s = 150\text{ }\mu\text{m}$ ในเวลา $t = 5\text{ s}$ โดยเมื่อวัดระยะห่างแนวตรงจากจุดเริ่มต้นถึงจุดสุดท้ายได้ค่าการกระจัด $d = 90\text{ }\mu\text{m}$ จงหาอัตราเร็วเฉลี่ยและขนาดความเร็วเฉลี่ยของแบคทีเรียตัวนี้</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 หาอัตราเร็วเฉลี่ยจากระยะทางรวม ($v = s / t$)</strong>
<div class="tex-display">\[
        v = \frac{150\text{ }\mu\text{m}}{5\text{ s}} = 30\text{ }\mu\text{m/s}
    \]</div></li><li><strong>ขั้นที่ 2 หาขนาดความเร็วเฉลี่ยจากขนาดการกระจัด ($|\boldsymbol{v}_{\text{avg}}| = d / t$)</strong>
<div class="tex-display">\[
        |\boldsymbol{v}_{\text{avg}}| = \frac{90\text{ }\mu\text{m}}{5\text{ s}} = 18\text{ }\mu\text{m/s}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; แบคทีเรียมีอัตราเร็วเฉลี่ยตามเส้นทางเท่ากับ $30\text{ }\mu\text{m/s}$ และมีขนาดความเร็วเฉลี่ยในแนวตรงเท่ากับ $18\text{ }\mu\text{m/s}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 2 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 2</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-2.4"><img src="../images/maintex/sec_3d/ch02_s3.jpg" alt="ภาพที่ 2.4" loading="lazy"><figcaption><strong>ภาพที่ 2.4</strong>&ensp;ชุดปฏิบัติการที่ 2 สำหรับวัดอัตราเร็วการเคลื่อนที่ในของเหลวและศึกษาอิทธิพลของอุณหภูมิต่ออัตราเร็วการแพร่ของสีย้อมในจานเพาะเชื้อ</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 2&emsp; การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (อธิบายเวกเตอร์และอัตราเร็ว), CLO3 (ทักษะการทดลองและบันทึกผลตามจริง), CLO4 (การเขียนกราฟและรายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 2.4)</strong></p>
<ul class="tex-ul"><li>รางทดลองการเคลื่อนที่แนวตรง (หรือหลอดแก้วใสบรรจุของเหลวพร้อมฟองอากาศ/เม็ดบีดส์จำลองเซลล์) และนาฬิกาจับเวลาดิจิทัล</li><li>จานเพาะเชื้อใส่น้ำเย็น ($10\,^\circ\text{C}$) และน้ำอุ่น ($45\,^\circ\text{C}$) พร้อมสารละลายสีย้อมเมทิลีนบลู (Methylene Blue) และไม้บรรทัดละเอียด</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การวิเคราะห์กราฟระยะทางกับเวลา</strong>&emsp; ปล่อยฟองอากาศหรือเม็ดบีดส์ให้เคลื่อนที่ในหลอดของเหลว จับเวลาทุกๆ ระยะทาง $10\text{ cm}, 20\text{ cm}, 30\text{ cm}$ และ $40\text{ cm}$ คำนวณอัตราเร็วเฉลี่ย $v = s/t$ และเขียนกราฟความสัมพันธ์ระหว่างระยะทาง (แกนตั้ง) กับเวลา (แกนนอน)</li><li><strong>ตอนที่ 2 อิทธิพลของอุณหภูมิต่ออัตราเร็วการแพร่</strong>&emsp; หยดสีย้อมเมทิลีนบลูปริมาตร $20\text{ }\mu\text{L}$ ลงตรงกลางจานเพาะเชื้อที่บรรจุน้ำเย็นและน้ำอุ่น วัดรัศมีวงสีที่แพร่กระจายออกเมื่อเวลาผ่านไป $1, 2$ และ $3$ นาที เปรียบเทียบอัตราเร็วการแพร่</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ระยะทาง $s$ ($\text{cm}$)</strong></th><th><strong>เวลาครั้งที่ 1 ($\text{s}$)</strong></th><th><strong>เวลาครั้งที่ 2 ($\text{s}$)</strong></th><th><strong>เวลาเฉลี่ย $t$ ($\text{s}$)</strong></th><th><strong>อัตราเร็ว $v = s/t$ ($\text{cm/s}$)</strong></th></tr></thead><tbody><tr><td>$10.0\text{ cm}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>$20.0\text{ cm}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>$30.0\text{ cm}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>$40.0\text{ cm}$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 2 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เพราะเหตุใดการสังเกตเห็นเซลล์แบคทีเรียสั่นสะเทือนอยู่กับที่ภายใต้กล้องจุลทรรศน์จึงยังไม่สามารถสรุปได้ว่าแบคทีเรียชนิดนั้นมีแฟลกเจลลาและเคลื่อนที่ได้จริง จงอธิบายด้วยแนวคิดเวกเตอร์การกระจัด</li><li>หากแบคทีเรีย <em>Vibrio cholerae</em> สามารถว่ายน้ำในแนวตรงด้วยอัตราเร็วคงที่ $60\text{ }\mu\text{m/s}$ จะต้องใช้เวลากี่วินาทีในการว่ายผ่านเส้นผ่านศูนย์กลางของขอบเขตภาพกล้องจุลทรรศน์ที่กว้าง $300\text{ }\mu\text{m}$</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch01_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 1: ระบบหน่วยและการวัดในโลกจุลทรรศน์
        </a>
    
                
        <a href="ch03_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 3: กฎการเคลื่อนที่ของนิวตันและแรงหนืด <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
