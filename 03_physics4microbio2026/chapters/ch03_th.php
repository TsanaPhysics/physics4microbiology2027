<?php
$pageTitle = "บทที่ 3: กฎการเคลื่อนที่ของนิวตันและแรงหนืด";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 3</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 03 &bull; NEWTON LAWS & VISCOSITY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                กฎการเคลื่อนที่ของนิวตันและแรงหนืด
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 3)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 3
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=2&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 2 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab03_viscosity.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 03: กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 3&emsp; กฎการเคลื่อนที่ของนิวตันและแรงหนืด (สัปดาห์ที่ 3)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>3.1 กฎการเคลื่อนที่ 3 ข้อของนิวตันในมุมมองชีวฟิสิกส์ระดับเซลล์</li><li>3.2 แรงต้านการเคลื่อนที่ในของเหลว ความหนืด และกฎของสโตกส์</li><li>3.3 อัตราเร็วสุดท้ายของการตกตะกอนของเซลล์จุลินทรีย์ในอาหารเลี้ยงเชื้อเหลว</li><li>3.4 ปฏิบัติการที่ 3 กฎของนิวตันและการวัดความหนืดของสารละลายชีวภาพด้วยวิธีปล่อยทรงกลมตกในของเหลว</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>อธิบายกฎการเคลื่อนที่ 3 ข้อของนิวตันและใช้สมการ $F = ma$ คำนวณความสัมพันธ์ระหว่างแรง มวล และความเร่งได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายอิทธิพลของความหนืด ($\eta$) และขนาดรัศมีเซลล์ ($r$) ต่ออัตราเร็วการตกตะกอนตามกฎของสโตกส์ได้ <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการทดลองวัดความหนืดของของเหลวอย่างระมัดระวังและสื่อสารผลการทดลองเป็นกราฟและรายงานได้อย่างถูกต้อง <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Demonstration &amp; Inquiry</strong>&emsp; เปรียบเทียบการตกของเม็ดบีดส์ในน้ำเปล่ากับในกลีเซอรีน (ซึ่งใช้ผสมเก็บรักษาเชื้อจุลินทรีย์ที่ $-80\,^\circ\text{C}$) เพื่อให้นักศึกษาเห็นภาพแรงหนืดอย่างชัดเจน</li><li><strong>ฝึกวิเคราะห์ความสัมพันธ์เชิงสัดส่วน</strong>&emsp; ชี้ให้เห็นว่าอัตราเร็วตกตะกอนแปรผันตรงกับกำลังสองของรัศมีเซลล์ ($v_t \propto r^2$) จึงอธิบายได้ว่าทำไมยีสต์จึงตกตะกอนเร็วกว่าแบคทีเรียมาก</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 3 แผนภาพสมดุลแรง 3 แรงบนเซลล์จุลินทรีย์ และชุดกระบอกตวงวัดความหนืดของเหลว</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>คำถามท้ายคาบเรื่องสมดุลแรงและกฎของสโตกส์ <strong>(CLO1, CLO2)</strong></li><li>การประเมินทักษะการทดลองและรายงานปฏิบัติการที่ 3 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: กฎการเคลื่อนที่สามข้อของนิวตันในมุมมองชีวฟิสิกส์ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กฎการเคลื่อนที่สามข้อของนิวตันในมุมมองชีวฟิสิกส์</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-3.1"><img src="../images/maintex/sec_3d/ch03_s1.jpg" alt="ภาพที่ 3.1" loading="lazy"><figcaption><strong>ภาพที่ 3.1</strong>&ensp;กฎการเคลื่อนที่สามข้อของนิวตันในสภาวะความหนืดสูงระดับเซลล์จุลินทรีย์ และแรงกิริยา–ปฏิกิริยาจากการหมุนของแฟลกเจลลา</figcaption></figure>
<p>เซอร์ไอแซก นิวตัน ได้สรุปกฎพื้นฐานที่ควบคุมการเคลื่อนที่ของวัตถุทุกขนาดตั้งแต่ระดับดวงดาวไปจนถึงระดับเซลล์จุลินทรีย์ไว้ 3 ข้อ (ดังแสดงในภาพที่ 3.1) ซึ่งสามารถทำความเข้าใจโดยไม่ต้องใช้คณิตศาสตร์ซับซ้อน ดังนี้</p>
<ol class="tex-ol"><li><strong>กฎข้อที่ 1 กฎของความเฉื่อย</strong> (<strong>Law of Inertia</strong>)&emsp; เมื่อผลรวมของแรงลัพธ์ที่กระทำต่อวัตถุมีค่าเป็นศูนย์ ($\sum F = 0$) วัตถุที่อยู่นิ่งก็จะอยู่นิ่งต่อไป ส่วนวัตถุที่กำลังเคลื่อนที่ก็จะเคลื่อนที่ด้วยความเร็วคงที่ ในระดับจุลินทรีย์ เนื่องจากเซลล์แบคทีเรียมีมวลน้อยมาก (ประมาณ $10^{-15}\text{ kg}$) แรงต้านจากความหนืดของน้ำจึงมีอิทธิพลเหนือความเฉื่อยอย่างสิ้นเชิง ทันทีที่แบคทีเรียหยุดหมุนแฟลกเจลลา มันจะหยุดเคลื่อนที่แทบจะในทันทีภายในระยะทางไม่ถึงขนาดอะตอม</li><li><strong>กฎข้อที่ 2 กฎของความเร่ง</strong> (<strong>Law of Acceleration</strong>)&emsp; เมื่อมีแรงลัพธ์ที่ไม่เป็นศูนย์กระทำต่อวัตถุมวล $m$ วัตถุจะเกิดความเร่ง $a$ ในทิศทางเดียวกับแรงลัพธ์ ตามสมการที่ (3.1)
<div class="tex-display">\[F_{\text{net}} = m a \tag{3.1}\]</div>
<p>โดยแรงมีหน่วยเป็น<strong>นิวตัน</strong> ($\text{N}$), มวลมีหน่วยเป็นกิโลกรัม ($\text{kg}$) และความเร่งมีหน่วยเป็นเมตรต่อวินาทียกกำลังสอง ($\text{m/s}^2$)</p></li><li><strong>กฎข้อที่ 3 กฎของแรงกิริยาและแรงปฏิกิริยา</strong> (<strong>Action equals Reaction</strong>)&emsp; ทุกแรงกิริยาจะมีแรงปฏิกิริยาที่มีขนาดเท่ากันแต่มีทิศทางตรงกันข้ามเสมอ ($F_{\text{action}} = -F_{\text{reaction}}$) ตัวอย่างเช่น เมื่อแฟลกเจลลาของแบคทีเรียหมุนผลักน้ำไปด้านหลัง (แรงกิริยา) น้ำจะออกแรงปฏิกิริยาผลักตัวเซลล์แบคทีเรียให้พุ่งไปข้างหน้า</li></ol>
            </div>
        </section>
        
        <!-- Section: แรงหนืด กฎของสโตกส์ และการตกตะกอนของเซลล์ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">แรงหนืด กฎของสโตกส์ และการตกตะกอนของเซลล์</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-3.2"><img src="../images/maintex/sec_3d/ch03_s2.jpg" alt="ภาพที่ 3.2" loading="lazy"><figcaption><strong>ภาพที่ 3.2</strong>&ensp;สมดุลของแรงโน้มถ่วง ($F_g$) แรงลอยตัว ($F_b$) และแรงหนืดของสโตกส์ ($F_{\text{drag}} = 6\pi\eta r v_t$) ขณะเซลล์ยีสต์และแบคทีเรียตกตะกอนในอาหารเหลว</figcaption></figure>
<p>เมื่อเซลล์จุลินทรีย์ทรงกลมรัศมี $r$ เคลื่อนที่ด้วยอัตราเร็ว $v$ ผ่านอาหารเลี้ยงเชื้อเหลวที่มี<strong>สัมประสิทธิ์ความหนืด</strong> (<strong>Viscosity</strong>, $\eta$ อ่านว่า อีตา มีหน่วยเป็น $\text{Pa}\cdot\text{s}$) ของเหลวจะออกแรงต้านการเคลื่อนที่ซึ่งเรียกว่า <strong>แรงหนืดตามกฎของสโตกส์</strong> (<strong>Stokes' Drag Force</strong>) ดังสมการที่ (3.2)</p>
<div class="tex-display">\[F_{\text{drag}} = 6 \pi \eta r v \tag{3.2}\]</div>
<p>เมื่อเราตั้งหลอดอาหารเลี้ยงเชื้อเหลวทิ้งไว้นิ่งๆ เซลล์จุลินทรีย์จะค่อยๆ จมลงสู่ก้นหลอดภายใต้แรงกระทำ 3 แรง ได้แก่ <strong>แรงโน้มถ่วง</strong> ($F_g$) ดึงลงด้านล่าง, <strong>แรงลอยตัว</strong> ($F_b$) ดันขึ้นด้านบน และ<strong>แรงหนืด</strong> ($F_{\text{drag}}$) ต้านการจมดันขึ้นด้านบน ดังแสดงในภาพที่ 3.2 และภาพที่ 3.3 เมื่อแรงขึ้นรวมเท่ากับแรงลงพอดี ($\sum F = 0$) เซลล์จะจมลงด้วย<strong>อัตราเร็วสุดท้ายคงที่</strong> (<strong>Terminal Velocity</strong> หรืออัตราเร็วตกตะกอน $v_t$) ตามสมการที่ (3.3)</p>
<div class="tex-display">\[v_t = \frac{2 r^2 (\rho_p - \rho_f) g}{9 \eta} \tag{3.3}\]</div>
<p>โดยที่ $\rho_p$ คือความหนาแน่นของเซลล์ ($\text{kg/m}^3$), $\rho_f$ คือความหนาแน่นของของเหลว ($\text{kg/m}^3$) และ $g \approx 9.8\text{ m/s}^2$ คือความเร่งโน้มถ่วงของโลก</p>
<figure class="tex-figure tex-figure-diagram" id="fig-3.3"><img src="../images/maintex/tikz/ch03_tikz1.svg" alt="ภาพที่ 3.3" loading="lazy"><figcaption><strong>ภาพที่ 3.3</strong>&ensp;แผนภาพวัตถุอิสระแสดงสมดุลของแรงทั้งสามที่กระทำต่อเซลล์จุลินทรีย์ขณะจมลงด้วยอัตราเร็วสุดท้ายในของเหลว</figcaption></figure>
<div class="tex-aruco" data-aruco="2"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 2"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="3" y="1" width="1" height="1" fill="#fff"/><rect x="4" y="1" width="1" height="1" fill="#fff"/><rect x="3" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="2" width="1" height="1" fill="#fff"/><rect x="2" y="3" width="1" height="1" fill="#fff"/><rect x="1" y="4" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="4" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 2 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 2 — บทที่ 3: การตกตะกอนตามกฎของสโตกส์และการไหลแบบราบเรียบในตู้ปลอดเชื้อ</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;แสดงสมดุลแรง 3 แรงบนเซลล์จุลินทรีย์ ($m g$, $F_b$, $F_{\text{drag}}$) และม่านอากาศบริสุทธิ์ผ่านแผ่นกรอง HEPA ในตู้ปลอดเชื้อ</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;รัศมีเซลล์ $r$ ($\mu\text{m}$), ความหนืดของเหลว $\eta$, อัตราเร็วลมตู้ปลอดเชื้อ ($\text{m/s}$)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=2&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 2</a></div></div>
<div class="tex-box tex-box-bioapp"><div class="tex-box-title"><i class="fa-solid fa-bacteria"></i> ทำไมเซลล์ยีสต์จึงตกตะกอนนอนก้นหลอดเร็วกว่าเซลล์แบคทีเรียถึง 25 เท่า</div><div class="tex-box-body"><p>จากสมการที่ (3.3) อัตราเร็วตกตะกอนแปรผันตรงกับกำลังสองของรัศมีเซลล์ ($v_t \propto r^2$) เซลล์ยีสต์มีรัศมีเฉลี่ยประมาณ $r_{\text{yeast}} \approx 2.5\text{ }\mu\text{m}$ ในขณะที่เซลล์แบคทีเรียทรงกลมมีรัศมีประมาณ $r_{\text{bacteria}} \approx 0.5\text{ }\mu\text{m}$ (ต่างกัน $5$ เท่า) เมื่อยกกำลังสองจะได้ $(5)^2 = 25$ เท่า ทำให้เซลล์ยีสต์ตกตะกอนลงก้นหลอดทดลองได้เองภายในไม่กี่ชั่วโมง ในขณะที่แบคทีเรียต้องอาศัยเครื่องปั่นเหวี่ยงความเร็วสูงเพื่อช่วยเร่งการตกตะกอน</p></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 3.1&ensp;การเปรียบเทียบอัตราเร็วตกตะกอนและการคำนวณแรงลัพธ์</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; สปอร์ของเชื้อราชนิดหนึ่งมีรัศมี $r_A = 3\text{ }\mu\text{m}$ และสปอร์ของแบคทีเรียมีรัศมี $r_B = 1\text{ }\mu\text{m}$ หากสปอร์ทั้งสองชนิดมีความหนาแน่นเท่ากันและแขวนลอยอยู่ในอาหารเหลวชนิดเดียวกัน สปอร์ของเชื้อราจะจมลงก้นหลอดเร็วกว่าสปอร์ของแบคทีเรียกี่เท่า</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 ใช้หลักสัดส่วนตรงจากสมการกฎของสโตกส์ ($v_t \propto r^2$)</strong>
<div class="tex-display">\[
        \frac{v_A}{v_B} = \left(\frac{r_A}{r_B}\right)^2
    \]</div></li><li><strong>ขั้นที่ 2 แทนค่ารัศมีแล้วคำนวณกำลังสอง</strong>
<div class="tex-display">\[
        \frac{v_A}{v_B} = \left(\frac{3\text{ }\mu\text{m}}{1\text{ }\mu\text{m}}\right)^2 = 3^2 = 9\text{ เท่า}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; สปอร์ของเชื้อราจะตกตะกอนเร็วกว่าสปอร์ของแบคทีเรียเท่ากับ $9$ เท่า</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 3 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 3</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-3.4"><img src="../images/maintex/sec_3d/ch03_s3.jpg" alt="ภาพที่ 3.4" loading="lazy"><figcaption><strong>ภาพที่ 3.4</strong>&ensp;ชุดปฏิบัติการที่ 3 สำหรับวัดอัตราเร็วสุดท้าย ($v_t$) และหาสัมประสิทธิ์ความหนืด ($\eta$) ของของเหลวชีวภาพด้วยวิธีปล่อยลูกเหล็กทรงกลม</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 3&emsp; กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (กฎของนิวตันและแรงหนืด), CLO2 (เชื่อมโยงความหนืดกับการตกตะกอนในงานจุลชีววิทยา), CLO3 (ความปลอดภัยและวินัยในห้องแล็บ)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 3.4)</strong></p>
<ul class="tex-ul"><li>กระบอกตวงทรงสูงขนาด $500\text{ mL}$ จำนวน 2 ใบ บรรจุน้ำกลั่นและสารละลายกลีเซอรีน (หรือน้ำเชื่อมเข้มข้นจำลองอาหารเลี้ยงเชื้อความหนืดสูง)</li><li>ลูกเหล็กทรงกลมขนาดเล็ก (ทราบรัศมี $r$ และความหนาแน่น $\rho_p$), ไมโครมิเตอร์, แม่เหล็กสำหรับดึงลูกเหล็ก และนาฬิกาจับเวลา</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li>ติดแถบยางรัดรอบกระบอกตวงที่ขีดบอกระดับบน (ต่ำกว่าผิวของเหลว $5\text{ cm}$ เพื่อให้ลูกเหล็กเข้าสู่ความเร็วคงที่ก่อน) และขีดบอกระดับล่าง ห่างกันเป็นระยะทาง $s = 20\text{ cm}$ ($0.20\text{ m}$)</li><li>ปล่อยลูกเหล็กทรงกลมลงตรงกลางกระบอกตวง จับเวลา $t$ ที่ลูกเหล็กเคลื่อนที่ผ่านระหว่างแถบยางทั้งสองเส้น ทำซ้ำ 3 ครั้ง คำนวณอัตราเร็วสุดท้าย $v_t = s/t$ และคำนวณสัมประสิทธิ์ความหนืด $\eta$ จากสมการที่ (3.3)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ชนิดของเหลว</strong></th><th><strong>ครั้งที่ 1 ($\text{s}$)</strong></th><th><strong>ครั้งที่ 2 ($\text{s}$)</strong></th><th><strong>เฉลี่ย $t$ ($\text{s}$)</strong></th><th><strong>$v_t$ ($\text{m/s}$)</strong></th><th><strong>ความหนืด $\eta$</strong></th></tr></thead><tbody><tr><td>น้ำกลั่น (ควบคุม)</td><td>............</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>กลีเซอรีนเข้มข้น</td><td>............</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 3 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>หากเราเพิ่มอุณหภูมิของอาหารเลี้ยงเชื้อเหลวให้สูงขึ้น ความหนืด ($\eta$) ของของเหลวจะลดลง จงอธิบายว่าอัตราเร็วการตกตะกอน ($v_t$) ของเซลล์จุลินทรีย์จะเพิ่มขึ้นหรือลดลง เพราะเหตุใด</li><li>เซลล์สาหร่ายเซลล์เดียวชนิดหนึ่งมีรัศมี $6\text{ }\mu\text{m}$ ในขณะที่เซลล์แบคทีเรียมีรัศมี $1.5\text{ }\mu\text{m}$ จงหาว่าเซลล์สาหร่ายจะตกตะกอนเร็วกว่าเซลล์แบคทีเรียกี่เท่า</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch02_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 2: เวกเตอร์และการเคลื่อนที่ในของเหลว
        </a>
    
                
        <a href="ch04_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 4: งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
