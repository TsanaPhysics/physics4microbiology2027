<?php
$pageTitle = "บทที่ 10: กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 10</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 10 &bull; MICROSCOPY & IMMERSION OIL
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 11)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 11
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=9&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 9 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab10_microscope.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 10: เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 10&emsp; กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง (สัปดาห์ที่ 11)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>10.1 หลักการเกิดภาพของเลนส์นูนและระบบเลนส์คู่ของกล้องจุลทรรศน์แบบใช้แสง (Compound Light Microscope)</li><li>10.2 กำลังขยายรวม ($M_{\text{total}}$) ค่าตัวเลขรูรับแสง (Numerical Aperture, $\text{NA}$) และขีดจำกัดการแยกชัด ($d_{\min}$)</li><li>10.3 ฟิสิกส์ของน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$) สำหรับเลนส์ใกล้วัตถุกำลังขยาย 100x</li><li>10.4 ปฏิบัติการที่ 10 การหาความยาวโฟกัสเลนส์นูนและพิสูจน์ความแตกต่างของภาพแบคทีเรียที่หัวเลนส์ 100x เมื่อใช้และไม่ใช้น้ำมันช่วยส่อง</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>คำนวณกำลังขยายรวมและขีดจำกัดการแยกชัด ($d_{\min} = 0.61\lambda / \text{NA}$) ของกล้องจุลทรรศน์ได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ของดัชนีหักเหได้ว่าทำไมเมื่อใช้หัวเลนส์ 100x จึงต้องหยด Immersion Oil เสมอ และทำไมการเพิ่มกำลังขยายแต่เพียงอย่างเดียวโดยไม่เพิ่มค่า $\text{NA}$ จึงได้เพียงภาพขยายที่เบลอ (Empty Magnification) <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการใช้และทำความสะอาดเลนส์หัวน้ำมันของกล้องจุลทรรศน์อย่างถูกวิธีตามจรรยาบรรณห้องแล็บ <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Problem-Based Lab</strong>&emsp; ให้นักศึกษาเปรียบเทียบการคำนวณค่า $d_{\min}$ ของแสงสีน้ำเงิน ($\lambda = 450\text{ nm}$) กับแสงสีแดง ($\lambda = 650\text{ nm}$) เพื่อตอบคำถามว่าทำไมกล้องจุลทรรศน์คุณภาพสูงจึงนิยมใส่แผ่นกรองแสงสีน้ำเงิน (Blue Filter) ไว้ใต้ฐานไฟ</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 10 กล้องจุลทรรศน์แบบใช้แสง สไลด์ถาวรแบคทีเรียย้อมสีแกรม และน้ำมันช่วยส่อง Immersion Oil</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>การตรวจใบงานคำนวณกำลังขยายและขีดจำกัดการแยกชัด <strong>(CLO1, CLO2)</strong></li><li>การสอบปฏิบัติทักษะการใช้หัวเลนส์ 100x และรายงานปฏิบัติการที่ 10 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: ระบบเลนส์และกำลังขยายรวมของกล้องจุลทรรศน์ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ระบบเลนส์และกำลังขยายรวมของกล้องจุลทรรศน์</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-10.1"><img src="../images/maintex/sec_3d/ch10_s1.jpg" alt="ภาพที่ 10.1" loading="lazy"><figcaption><strong>ภาพที่ 10.1</strong>&ensp;ระบบเลนส์นูนสองชั้น (เลนส์ใกล้วัตถุและเลนส์ใกล้ตา) และทางเดินแสงภายในกล้องจุลทรรศน์แบบใช้แสงกำลังขยายรวมสูงสุด $1{,}000\times$</figcaption></figure>
<p>กล้องจุลทรรศน์แบบใช้แสงประกอบด้วยเลนส์นูน 2 ชุดทำงานร่วมกัน ได้แก่ <strong>เลนส์ใกล้วัตถุ</strong> (<strong>Objective Lens</strong> ซึ่งมีกำลังขยาย $M_{\text{obj}}$ ให้เลือกตั้งแต่ $4\times, 10\times, 40\times$ และ $100\times$) ทำหน้าที่สร้างภาพจริงหัวกลับขนาดขยายขึ้นมาก่อนในขั้นแรก จากนั้น<strong>เลนส์ใกล้ตา</strong> (<strong>Ocular Lens</strong> หรือ Eyepiece ซึ่งปกติมีกำลังขยาย $M_{\text{oc}} = 10\times$) จะทำหน้าที่ขยายภาพนั้นซ้ำอีกครั้งจนเกิดเป็น<strong>ภาพเสมือนหัวกลับขนาดใหญ่</strong>ที่ตาของนักศึกษามองเห็น โดยคำนวณ<strong>กำลังขยายรวม</strong> (<strong>Total Magnification</strong>, $M_{\text{total}}$) ได้จากผลคูณอย่างง่ายดังแสดงในภาพที่ 10.1 และสมการที่ (10.1)</p>
<div class="tex-display">\[M_{\text{total}} = M_{\text{obj}} \times M_{\text{oc}} \tag{10.1}\]</div>
<p>ตัวอย่างเช่น เมื่อหมุนเลนส์ใกล้วัตถุหัวน้ำมัน $100\times$ ร่วมกับเลนส์ใกล้ตา $10\times$ จะได้กำลังขยายรวมเท่ากับ $100 \times 10 = 1{,}000$ เท่า</p>
            </div>
        </section>
        
        <!-- Section: ขีดจำกัดการแยกชัดและเหตุผลทางฟิสิกส์ที่ต้องหยดน้ำมันช่วยส่อง -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ขีดจำกัดการแยกชัดและเหตุผลทางฟิสิกส์ที่ต้องหยดน้ำมันช่วยส่อง</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-10.2"><img src="../images/maintex/sec_3d/ch10_s2.jpg" alt="ภาพที่ 10.2" loading="lazy"><figcaption><strong>ภาพที่ 10.2</strong>&ensp;บทบาทของน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$) ที่เชื่อมระหว่างสไลด์แก้วกับหัวเลนส์ $100\times$ เพื่อป้องกันการหักเหสูญเสียแสงและเพิ่มอำนาจแยกชัด ($d_{\min} \approx 0.22\text{ }\mu\text{m}$)</figcaption></figure>
<p>ในงานจุลชีววิทยา ภาพที่ขยายใหญ่ขึ้นไม่ได้แปลว่าจะคมชัดเสมอไป หัวใจสำคัญที่สุดของกล้องจุลทรรศน์คือ <strong>อำนาจการแยกชัด</strong> (<strong>Resolution</strong>) ซึ่งวัดจากระยะห่างที่แคบที่สุดระหว่างจุดสองจุดที่กล้องยังสามารถแยกออกเป็นสองจุดได้ เรียกว่า <strong>ขีดจำกัดการแยกชัด</strong> (<strong>Limit of Resolution</strong>, $d_{\min}$) ตามสมการของอับเบอ (Abbe's Equation) ในสมการที่ (10.2)</p>
<div class="tex-display">\[d_{\min} = \frac{0.61 \lambda}{\text{NA}} = \frac{0.61 \lambda}{n \sin\theta} \tag{10.2}\]</div>
<p>โดยที่ $\lambda$ คือความยาวคลื่นของแสงที่ใช้ส่อง, $n$ คือดัชนีหักเหของตัวกลางที่อยู่ระหว่างแผ่นสไลด์กับหน้าเลนส์ใกล้วัตถุ, $\theta$ คือครึ่งมุมกรวยของแสงที่เข้าสู่เลนส์ และ $\text{NA} = n\sin\theta$ คือ<strong>ค่าตัวเลขรูรับแสง</strong> (<strong>Numerical Aperture</strong>) ซึ่งพิมพ์กำกับไว้ข้างกระบอกเลนส์ใกล้วัตถุทุกหัว (เช่น $100\times / 1.25\text{ Oil}$)</p>
<div class="tex-box tex-box-concept"><div class="tex-box-title"><i class="fa-solid fa-lightbulb"></i> ทำไมค่า $d_{\min}$ ยิ่งน้อย ภาพแบคทีเรียยิ่งคมชัด</div><div class="tex-box-body"><ul class="tex-ul"><li>ค่า $d_{\min}$ คือระยะห่างน้อยที่สุดที่แยกออกได้ ดังนั้น <strong>ยิ่งค่า $d_{\min}$ มีค่าน้อย กล้องจุลทรรศน์ยิ่งมีความละเอียดคมชัดสูง</strong></li><li>การทำให้ $d_{\min}$ มีค่าน้อยลงทำได้ 2 วิธี คือ <strong>(1) ลดความยาวคลื่นแสง $\lambda$</strong> (เช่น ใช้แผ่นกรองแสงสีน้ำเงิน $\lambda \approx 450\text{ nm}$ หรือใช้ลำอิเล็กตรอนในกล้องจุลทรรศน์อิเล็กตรอน) และ <strong>(2) เพิ่มค่าดัชนีหักเห $n$</strong> โดยการหยด<strong>น้ำมันช่วยส่อง</strong> (<strong>Immersion Oil</strong>, $n = 1.515$) แทนที่อากาศ ($n = 1.000$)</li></ul></div></div>
<p>ดังแสดงในภาพที่ 10.2 และภาพที่ 10.3 เมื่อใช้หัวเลนส์ $100\times$ ซึ่งอยู่ชิดแผ่นสไลด์มาก หากปล่อยให้มีช่องว่างเป็นอากาศ ($n = 1.000$) ลำแสงที่พุ่งออกจากแผ่นสไลด์แก้ว ($n = 1.515$) จะหักเหเบนหนีออกจากเส้นแนวฉากและเกิดการสะท้อนกลับหมดจนไม่เข้าสู่หน้าเลนส์ ภาพจึงมืดและพร่ามัว แต่เมื่อหยด <strong>Immersion Oil</strong> ซึ่งมีค่า $n = 1.515$ เท่ากับเนื้อกระจกสไลด์ทุกประการ แสงจะเดินทางเป็นเส้นตรงจากสไลด์ผ่านหยดน้ำมันเข้าสู่เลนส์ใกล้วัตถุได้เต็มที่โดยไม่เกิดการหักเหสูญเสียลำแสง ทำให้ค่า $\text{NA}$ เพิ่มขึ้นถึง $1.25\text{--}1.40$ และแยกชัดได้ถึงระดับ $d_{\min} \approx 0.2\text{ }\mu\text{m}$ ($200\text{ nm}$)</p>
<figure class="tex-figure tex-figure-diagram" id="fig-10.3"><img src="../images/maintex/tikz/ch10_tikz1.svg" alt="ภาพที่ 10.3" loading="lazy"><figcaption><strong>ภาพที่ 10.3</strong>&ensp;การเปรียบเทียบทางเดินแสงเข้าสู่เลนส์ใกล้วัตถุ 100x ระหว่างกรณีไม่หยดน้ำมันและกรณีหยดน้ำมันช่วยส่อง</figcaption></figure>
<div class="tex-aruco" data-aruco="9"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 9"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="2" y="1" width="1" height="1" fill="#fff"/><rect x="1" y="2" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="3" y="2" width="1" height="1" fill="#fff"/><rect x="1" y="3" width="1" height="1" fill="#fff"/><rect x="3" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 9 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 9 — บทที่ 10: กล้องจุลทรรศน์เลนส์ประกอบและบทบาทของ Immersion Oil ที่หัวเลนส์ 100x</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;เปรียบเทียบกรวยแสงที่พุ่งเข้าสู่หัวเลนส์ $100\times$ ระหว่างกรณีหยดน้ำมันช่วยส่อง ($n=1.515$) กับช่องว่างอากาศ ($n=1.00$) และคำนวณ $d_{\min}$</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ตัวกลางระหว่างสไลด์กับเลนส์ (อากาศ vs. น้ำมัน $n=1.515$), ความยาวคลื่นแสง $\lambda$ ($\text{nm}$)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=9&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 9</a></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 10.1&ensp;การคำนวณขีดจำกัดการแยกชัดของกล้องจุลทรรศน์เมื่อใช้หัวเลนส์น้ำมัน 100x</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; นักศึกษาส่องดูแบคทีเรียย้อมสีแกรมด้วยเลนส์ใกล้วัตถุหัวน้ำมัน $100\times$ ซึ่งมีค่า $\text{NA} = 1.25$ โดยใช้แสงสีเขียว-น้ำเงินที่มีความยาวคลื่นเฉลี่ย $\lambda = 500\text{ nm}$ ($0.50\text{ }\mu\text{m}$) จงคำนวณหาขีดจำกัดการแยกชัด ($d_{\min}$) ของกล้องจุลทรรศน์นี้ และพิจารณาว่ากล้องตัวนี้สามารถมองเห็นเซลล์แบคทีเรียขนาด $1.0\text{ }\mu\text{m}$ และไวรัสขนาด $0.08\text{ }\mu\text{m}$ ($80\text{ nm}$) แยกเป็นอนุภาคชัดเจนได้หรือไม่</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 แทนค่า $\lambda = 0.50\text{ }\mu\text{m}$ และ $\text{NA} = 1.25$ ลงในสูตร $d_{\min} = \dfrac{0.61\lambda}{\text{NA}}$</strong>
<div class="tex-display">\[
        d_{\min} = \frac{0.61 \times 0.50\text{ }\mu\text{m}}{1.25} = \frac{0.305}{1.25} = 0.244\text{ }\mu\text{m} \quad (\text{หรือ } 244\text{ nm})
    \]</div></li><li><strong>ขั้นที่ 2 เปรียบเทียบขนาดสิ่งมีชีวิตกับค่า $d_{\min} = 0.244\text{ }\mu\text{m}$</strong>
<ul class="tex-ul"></ul></li><li>เซลล์แบคทีเรียมีขนาด $1.0\text{ }\mu\text{m}$ ซึ่ง<strong>ใหญ่กว่า</strong>ขีดจำกัด $0.244\text{ }\mu\text{m}$ จึง<strong>มองเห็นรูปร่างได้อย่างคมชัด</strong></li><li>ไวรัสมีขนาด $0.08\text{ }\mu\text{m}$ ซึ่ง<strong>เล็กกว่า</strong>ขีดจำกัด $0.244\text{ }\mu\text{m}$ จึง<strong>ไม่สามารถมองเห็นได้ด้วยกล้องจุลทรรศน์แบบใช้แสง</strong> (ต้องใช้กล้องจุลทรรศน์อิเล็กตรอน) itemize</li></ol>
<p><strong>คำตอบ</strong>&emsp; ขีดจำกัดการแยกชัดมีค่าเท่ากับ $0.244\text{ }\mu\text{m}$ ($244\text{ nm}$) สามารถมองเห็นแบคทีเรียได้ชัดเจน แต่ไม่สามารถมองเห็นไวรัสได้</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 11 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 11</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-10.4"><img src="../images/maintex/sec_3d/ch10_s3.jpg" alt="ภาพที่ 10.4" loading="lazy"><figcaption><strong>ภาพที่ 10.4</strong>&ensp;ชุดปฏิบัติการที่ 10 สำหรับคำนวณค่าขีดจำกัดการแยกชัด ($d_{\min}$) และฝึกทักษะการส่องแบคทีเรียย้อมสีแกรมด้วยหัวเลนส์น้ำมัน $100\times$</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 10&emsp; เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (ทัศนศาสตร์ของเลนส์และกล้องจุลทรรศน์), CLO2 (การใช้ Immersion Oil แก้ปัญหาภาพมัว), CLO3 (วินัยการดูแลรักษาหัวเลนส์), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 10.4)</strong></p>
<ul class="tex-ul"><li>เลนส์นูนพร้อมรางวัดความยาวโฟกัส ($f$), กล้องจุลทรรศน์แบบใช้แสง, สไลด์ถาวรแบคทีเรียย้อมสีแกรม (<em>S. aureus</em> และ <em>E. coli</em>), น้ำมันช่วยส่อง (Immersion Oil) และกระดาษเช็ดเลนส์ (Lens Paper)</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li>บันทึกค่ากำลังขยาย ($M_{\text{obj}}$) และค่าตัวเลขรูรับแสง ($\text{NA}$) ที่พิมพ์อยู่บนกระบอกเลนส์ใกล้วัตถุทั้ง 4 หัว ($4\times, 10\times, 40\times$ และ $100\times$) พร้อมคำนวณค่า $d_{\min}$ ที่ความยาวคลื่นแสง $\lambda = 550\text{ nm}$ ($0.55\text{ }\mu\text{m}$)</li><li>ปรับโฟกัสสไลด์แบคทีเรียที่หัวเลนส์ $10\times$ และ $40\times$ จากนั้นหมุนกึ่งกลางก่อนเข้าหัว $100\times$ ลองสังเกตความสว่างและความคมชัดก่อนหยดน้ำมัน เทียบกับหลังหยด Immersion Oil 1 หยดลงบนสไลด์แล้วหมุนหัว $100\times$ แตะหยดน้ำมันพร้อมปรับปุ่มละเอียด (Fine Adjustment)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>หัวเลนส์</strong></th><th><strong>กำลังขยายรวม</strong></th><th><strong>ค่า $\text{NA}$</strong></th><th><strong>$d_{\min}$ ($\mu\text{m}$)</strong></th><th><strong>ความคมชัดของเซลล์แบคทีเรีย</strong></th></tr></thead><tbody><tr><td>$10\times$</td><td>$100\times$</td><td>$0.25$</td><td>............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>$40\times$</td><td>$400\times$</td><td>$0.65$</td><td>............</td><td><span class="tex-dotfill"></span></td></tr><tr><td>$100\times$ (Oil)</td><td>$1{,}000\times$</td><td>$1.25$</td><td>............</td><td><span class="tex-dotfill"></span></td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 10 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เลนส์ใกล้วัตถุขนาด $40\times$ มีค่า $\text{NA} = 0.65$ หากใช้แสงสีเขียวที่มีความยาวคลื่น $\lambda = 0.55\text{ }\mu\text{m}$ จงคำนวณหาค่าขีดจำกัดการแยกชัด ($d_{\min}$) ในหน่วยไมโครเมตร</li><li>เพราะเหตุใดหลังเสร็จสิ้นการส่องกล้องจุลทรรศน์ด้วยหัวเลนส์น้ำมัน $100\times$ นักศึกษาจึงต้องใช้กระดาษเช็ดเลนส์เช็ดคราบน้ำมันออกจากหน้าเลนส์ทันที และห้ามให้หัวเลนส์ $40\times$ สัมผัสโดนหยดน้ำมันโดยเด็ดขาด</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch09_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 9: ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง
        </a>
    
                
        <a href="ch11_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 11: กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์ <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
