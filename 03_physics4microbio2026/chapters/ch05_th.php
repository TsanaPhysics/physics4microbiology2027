<?php
$pageTitle = "บทที่ 5: ความร้อนและการควบคุมอุณหภูมิชีวภาพ";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 5</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 05 &bull; HEAT & INCUBATOR STABILITY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                ความร้อนและการควบคุมอุณหภูมิชีวภาพ
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 5)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 5
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=4&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 4 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab05_heat_incubator.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 05: ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบ Incubator (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 5&emsp; ความร้อนและการควบคุมอุณหภูมิชีวภาพ (สัปดาห์ที่ 5)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>5.1 อุณหภูมิและการแปลงหน่วยอุณหภูมิระหว่างเซลเซียส เคลวิน และฟาเรนไฮต์</li><li>5.2 ความจุความร้อนจำเพาะของน้ำและความร้อนแฝงในการเปลี่ยนสถานะของสสาร</li><li>5.3 กลไกการถ่ายโอนความร้อน (การนำ การพา และการแผ่รังสี) ในตู้อบเลี้ยงเชื้อ (Incubator) และอ่างน้ำควบคุมอุณหภูมิ (Water Bath)</li><li>5.4 ปฏิบัติการที่ 5 การวัดความร้อนจำเพาะและการตรวจสอบเสถียรภาพการกระจายอุณหภูมิในตู้อบเลี้ยงเชื้อ</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>คำนวณปริมาณความร้อนที่ทำให้อุณหภูมิของอาหารเลี้ยงเชื้อเปลี่ยนแปลงโดยใช้สมการ $Q = mc\Delta T$ และความร้อนแฝง $Q = mL$ ได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ว่าทำไมการอุ่นละลายอาหารเลี้ยงเชื้อในอ่างน้ำควบคุมอุณหภูมิ (Water Bath) จึงถ่ายโอนความร้อนได้เร็วและสม่ำเสมอกว่าตู้อบลมร้อน (Air Incubator) <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติการวัดอุณหภูมิและตรวจสอบความสม่ำเสมอของความร้อนอย่างปลอดภัยและบันทึกผลตามจริง <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Active Group Discussion</strong>&emsp; เปรียบเทียบกราฟการให้ความร้อนแก่วุ้นอาหารเลี้ยงเชื้อ (Nutrient Agar) ที่หลอมเหลวที่ $95\text{--}100\,^\circ\text{C}$ แต่แข็งตัวที่ $42\,^\circ\text{C}$ (ปรากฏการณ์ Hysteresis ของวุ้น)</li><li><strong>ปฏิบัติการทดลอง</strong>&emsp; ทดลองผสมน้ำร้อนกับน้ำเย็นในแคลอริมิเตอร์และวัดการกระจายอุณหภูมิในตู้อบ Incubator ที่ตั้งค่าไว้ที่ $37\,^\circ\text{C}$</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 5 ชุดแคลอริมิเตอร์ เทอร์โมมิเตอร์ดิจิทัล และตู้อบเลี้ยงเชื้อจุลินทรีย์</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>แบบฝึกหัดการคำนวณความร้อน $Q = mc\Delta T$ <strong>(CLO1)</strong></li><li>รายงานปฏิบัติการที่ 5 และการสังเกตความปลอดภัยในการใช้อุปกรณ์ความร้อน <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: อุณหภูมิ ความจุความร้อนจำเพาะ และความร้อนแฝง -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">อุณหภูมิ ความจุความร้อนจำเพาะ และความร้อนแฝง</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-5.1"><img src="../images/maintex/sec_3d/ch05_s1.jpg" alt="ภาพที่ 5.1" loading="lazy"><figcaption><strong>ภาพที่ 5.1</strong>&ensp;ความจุความร้อนจำเพาะของน้ำ ($c = 4.184\text{ J/g}\cdot^\circ\text{C}$) และความร้อนแฝงในการต้มหลอมละลายอาหารเลี้ยงเชื้อวุ้นในห้องปฏิบัติการ</figcaption></figure>
<p>จุลินทรีย์แต่ละกลุ่มมีช่วงอุณหภูมิที่เหมาะสมต่อการเจริญเติบโตแตกต่างกัน เช่น แบคทีเรียก่อโรคในมนุษย์กลุ่ม <strong>Mesophiles</strong> เจริญได้ดีที่สุดที่อุณหภูมิประมาณ $37\,^\circ\text{C}$ ในขณะที่แบคทีเรียทนร้อนกลุ่ม <strong>Thermophiles</strong> เจริญได้ดีที่ $55\text{--}80\,^\circ\text{C}$ การแปลงหน่วยระหว่างองศาเซลเซียส ($T_{\text{C}}$) กับเคลวิน ($T_{\text{K}}$) ใช้ความสัมพันธ์อย่างง่ายคือ</p>
<div class="tex-display">\[T_{\text{K}} = T_{\text{C}} + 273.15 \tag{5.1}\]</div>
<p>เมื่อเราให้ความร้อนแก่อาหารเลี้ยงเชื้อเหลวมวล $m$ จนมีอุณหภูมิเปลี่ยนไป $\Delta T = T_{\text{final}} - T_{\text{initial}}$ ปริมาณความร้อน ($Q$) ที่ต้องใช้จะขึ้นอยู่กับ<strong>ความจุความร้อนจำเพาะ</strong> (<strong>Specific Heat Capacity</strong>, $c$) ของสารนั้น ดังแสดงในภาพที่ 5.1 และสมการที่ (5.2)</p>
<div class="tex-display">\[Q = m c \Delta T \qquad \text{(เปลี่ยนอุณหภูมิโดยไม่เปลี่ยนสถานะ)} \tag{5.2}\]</div>
<p>ส่วนในกรณีที่สารเกิดการเปลี่ยนสถานะ เช่น น้ำเดือดกลายเป็นไอน้ำที่อุณหภูมิคงที่ ปริมาณความร้อนที่ใช้จะเรียกว่า <strong>ความร้อนแฝง</strong> (<strong>Latent Heat</strong>, $L$) ตามสมการที่ (5.3)</p>
<div class="tex-display">\[Q = m L \qquad \text{(เปลี่ยนสถานะที่อุณหภูมิคงที่)} \tag{5.3}\]</div>
<p>น้ำเป็นตัวกลางหลักของเซลล์สิ่งมีชีวิตและอาหารเลี้ยงเชื้อ โดยน้ำมีความจุความร้อนจำเพาะสูงมาก คือ $c_{\text{water}} = 4.184\text{ J/(g}\cdot^\circ\text{C)}$ (หรือ $4{,}184\text{ J/(kg}\cdot\text{K)}$) และมีความร้อนแฝงของการกลายเป็นไอสูงถึง $L_v = 2{,}260\text{ J/g}$ สมบัติทางฟิสิกส์ข้อนี้ช่วยให้อุณหภูมิของอาหารเลี้ยงเชื้อและไซโทพลาซึมของเซลล์ไม่แกว่งตัวเปลี่ยนแปลงเร็วเกินไปเมื่อสภาพแวดล้อมภายนอกเปลี่ยนอุณหภูมิ</p>
            </div>
        </section>
        
        <!-- Section: กลไกการถ่ายโอนความร้อนในห้องปฏิบัติการจุลชีววิทยา -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กลไกการถ่ายโอนความร้อนในห้องปฏิบัติการจุลชีววิทยา</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-5.2"><img src="../images/maintex/sec_3d/ch05_s2.jpg" alt="ภาพที่ 5.2" loading="lazy"><figcaption><strong>ภาพที่ 5.2</strong>&ensp;กลไกการถ่ายโอนความร้อนทั้ง 3 รูปแบบในงานจุลชีววิทยา ได้แก่ การนำความร้อนในอ่าง Water Bath การพาความร้อนในตู้ Incubator และการแผ่รังสีจากตะเกียงบุนเสน</figcaption></figure>
<p>การถ่ายโอนความร้อนในอุปกรณ์ห้องปฏิบัติการจุลชีววิทยาเกิดขึ้นได้ 3 รูปแบบหลัก ดังแสดงในภาพที่ 5.2 และภาพที่ 5.3 ได้แก่</p>
<ol class="tex-ol"><li><strong>การนำความร้อน</strong> (<strong>Conduction</strong>)&emsp; เป็นการส่งผ่านความร้อนผ่านเนื้อวัสดุโดยตรง เช่น ความร้อนจากน้ำอุ่นในอ่าง <strong>Water Bath</strong> ไหลผ่านผนังขวดแก้วเข้าสู่อาหารวุ้นที่อยู่ด้านใน หรือการใช้ห่วงเขี่ยเชื้อ (<strong>Inoculating Loop</strong>) แตะลงบนผิววุ้นเพื่อให้เย็นตัวลงก่อนตักโคโลนีเชื้อ</li><li><strong>การพาความร้อน</strong> (<strong>Convection</strong>)&emsp; เป็นการเคลื่อนที่ของตัวกลางของไหล (อากาศหรือน้ำ) พาความร้อนไปทั่วบริเวณ เช่น พัดลมหมุนเวียนอากาศร้อนภายใน<strong>ตู้อบเลี้ยงเชื้อ</strong> (<strong>Incubator</strong>) และ<strong>ตู้อบลมร้อน</strong> (<strong>Hot Air Oven</strong>) เพื่อให้ทุกชั้นวางมีอุณหภูมิ $37.0\,^\circ\text{C}$ เท่ากันทั้งหมด</li><li><strong>การแผ่รังสีความร้อน</strong> (<strong>Radiation</strong>)&emsp; เป็นการส่งผ่านพลังงานในรูปคลื่นแม่เหล็กไฟฟ้าโดยไม่อาศัยตัวกลาง เช่น เปลวไฟจากตะเกียงบุนเสน (<strong>Bunsen Burner</strong>) ที่แผ่รังสีความร้อนรอบปากหลอดทดลองขณะเทคนิคปลอดเชื้อ (<strong>Aseptic Technique</strong>)</li></ol>
<figure class="tex-figure tex-figure-diagram" id="fig-5.3"><img src="../images/maintex/tikz/ch05_tikz1.svg" alt="ภาพที่ 5.3" loading="lazy"><figcaption><strong>ภาพที่ 5.3</strong>&ensp;รูปแบบการถ่ายโอนความร้อนทั้งสามชนิดที่พบในเครื่องมือและเทคนิคปลอดเชื้อทางจุลชีววิทยา</figcaption></figure>
<div class="tex-aruco" data-aruco="4"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 4"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="2" y="1" width="1" height="1" fill="#fff"/><rect x="4" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="3" y="2" width="1" height="1" fill="#fff"/><rect x="1" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="1" y="4" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 4 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 4 — บทที่ 5: การกระจายความร้อนในตู้อบ Incubator 37°C และวัฏจักรอุณหภูมิเครื่อง PCR</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองการพาความร้อนภายในตู้อบเลี้ยงเชื้อ และวัฏจักรการเพิ่มปริมาณดีเอ็นเอ 3 ขั้นตอน ($2^n$ เท่า) ในเครื่อง Thermal Cycler</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;อุณหภูมิแต่ละขั้น ($95\,^\circ\text{C}, 55\,^\circ\text{C}, 72\,^\circ\text{C}$), จำนวนรอบวัฏจักร $n$ ($1\text{--}35$ รอบ)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=4&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 4</a></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 5.1&ensp;การคำนวณความร้อนในการต้มเตรียมอาหารเลี้ยงเชื้อเหลว</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; นักศึกษาเตรียมอาหารเลี้ยงเชื้อ Nutrient Broth ปริมาตร $500\text{ mL}$ (คิดเป็นมวล $m = 500\text{ g}$) ซึ่งมีอุณหภูมิเริ่มต้น $25\,^\circ\text{C}$ หากต้องการให้ความร้อนจนมีอุณหภูมิสูงขึ้นเป็น $95\,^\circ\text{C}$ เพื่อละลายผงอาหารให้หมด จะต้องใช้พลังงานความร้อนกี่จูล ($\text{J}$) และกี่กิโลจูล ($\text{kJ}$) กำหนดให้ความจุความร้อนจำเพาะของอาหารเหลวใกล้เคียงกับน้ำ คือ $c = 4.2\text{ J/(g}\cdot^\circ\text{C)}$</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 หาผลต่างอุณหภูมิ $\Delta T = T_{\text{final}} - T_{\text{initial}}$</strong>
<div class="tex-display">\[
        \Delta T = 95\,^\circ\text{C} - 25\,^\circ\text{C} = 70\,^\circ\text{C}
    \]</div></li><li><strong>ขั้นที่ 2 แทนค่าลงในสูตร $Q = m c \Delta T$</strong>
<div class="tex-display">\[
        Q = 500\text{ g} \times 4.2\text{ J/(g}\cdot^\circ\text{C)} \times 70\,^\circ\text{C} = 147{,}000\text{ J}
    \]</div></li><li><strong>ขั้นที่ 3 แปลงหน่วยจูล ($\text{J}$) เป็นกิโลจูล ($\text{kJ}$) โดยหารด้วย $1{,}000$</strong>
<div class="tex-display">\[
        Q = \frac{147{,}000}{1{,}000} = 147\text{ kJ}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; ต้องใช้พลังงานความร้อนเท่ากับ $147{,}000\text{ J}$ หรือ $147\text{ kJ}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 5 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 5</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-5.4"><img src="../images/maintex/sec_3d/ch05_s3.jpg" alt="ภาพที่ 5.4" loading="lazy"><figcaption><strong>ภาพที่ 5.4</strong>&ensp;ชุดปฏิบัติการที่ 5 สำหรับทดสอบสมดุลความร้อนในแคลอริมิเตอร์และตรวจสอบการกระจายอุณหภูมิ 3 จุดภายในตู้อบเลี้ยงเชื้อ $37.0\,^\circ\text{C}$</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 5&emsp; ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบ Incubator (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (การคำนวณความร้อน), CLO2 (วิเคราะห์เสถียรภาพตู้ Incubator), CLO3 (ความปลอดภัยและวินัย), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 5.4)</strong></p>
<ul class="tex-ul"><li>กระป๋องแคลอริมิเตอร์พร้อมฉนวนหุ้ม, บีกเกอร์, เตาให้ความร้อนไฟฟ้า และเทอร์โมมิเตอร์ดิจิทัล 3 ชุด</li><li>ตู้อบเลี้ยงเชื้อ (Incubator) ที่ตั้งอุณหภูมิไว้ที่ $37.0\,^\circ\text{C}$ และอ่างน้ำควบคุมอุณหภูมิ (Water Bath) ที่ตั้งไว้ที่ $50.0\,^\circ\text{C}$</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 สมดุลความร้อนของการผสมน้ำ</strong>&emsp; ตวงน้ำอุณหภูมิห้องมวล $m_1 = 100\text{ g}$ ใส่ในแคลอริมิเตอร์ วัดอุณหภูมิ $T_1$ จากนั้นตวงน้ำอุ่นมวล $m_2 = 100\text{ g}$ อุณหภูมิประมาณ $T_2 = 60\,^\circ\text{C}$ เทผสมลงไป คนเบาๆ แล้วอ่านอุณหภูมิผสมสุดท้าย $T_{\text{mix}}$ เปรียบเทียบกับค่าทฤษฎี $(T_1 + T_2)/2$</li><li><strong>ตอนที่ 2 การตรวจสอบการกระจายอุณหภูมิในตู้อบ Incubator</strong>&emsp; วางหัววัดเทอร์โมมิเตอร์ดิจิทัลไว้ที่ 3 ตำแหน่งในตู้อบ ได้แก่ ชั้นบนสุด ชั้นกลาง และชั้นล่างใกล้ประตู อ่านค่าอุณหภูมิจริงและคำนวณส่วนเบี่ยงเบนไปจากค่าที่ตั้งไว้ ($37.0\,^\circ\text{C}$)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ตำแหน่งวัดในตู้ Incubator ($37.0\,^\circ\text{C}$)</strong></th><th><strong>ครั้งที่ 1 ($^\circ\text{C}$)</strong></th><th><strong>ครั้งที่ 2 ($^\circ\text{C}$)</strong></th><th><strong>ค่าเฉลี่ย ($^\circ\text{C}$)</strong></th><th><strong>ผลต่างจาก $37.0\,^\circ\text{C}$</strong></th></tr></thead><tbody><tr><td>ชั้นบนสุด (ด้านใน)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ชั้นกลาง (จุดอ้างอิง)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ชั้นล่าง (ใกล้ขอบประตู)</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 5 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เพราะเหตุใดเมื่อเราต้องการรักษาอาหารวุ้นหลอมเหลวไม่ให้แข็งตัวที่อุณหภูมิ $48\,^\circ\text{C}$ ก่อนเทลงจานเพาะเชื้อ การแช่ขวดวุ้นในอ่างน้ำอุ่น (Water Bath) จึงรักษาอุณหภูมิได้ดีกว่าการวางในตู้อบลมร้อน</li><li>จงคำนวณปริมาณความร้อน (ในหน่วยกิโลจูล) ที่ต้องใช้ในการอุ่นน้ำกลั่นมวล $200\text{ g}$ จากอุณหภูมิ $20\,^\circ\text{C}$ ให้เป็น $80\,^\circ\text{C}$ กำหนดให้ $c = 4.2\text{ J/(g}\cdot^\circ\text{C)}$</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch04_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 4: งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง
        </a>
    
                
        <a href="ch06_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 6: อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
