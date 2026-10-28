<?php
$pageTitle = "บทที่ 6: อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 6</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 06 &bull; THERMODYNAMICS & AUTOCLAVE
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 6)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 6
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=5&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 5 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab06_autoclave.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 06: ความดันไอ จุดเดือด และกรณีศึกษาการทำงานของ Autoclave (3 ชั่วโมง)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 6&emsp; อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ (สัปดาห์ที่ 6)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>6.1 กฎของแก๊สอุดมคติและความสัมพันธ์ระหว่างความดันกับอุณหภูมิในภาชนะปิด</li><li>6.2 ความดันไออิ่มตัวและการเพิ่มขึ้นของจุดเดือดของน้ำเมื่อความดันสูงขึ้น</li><li>6.3 หลักการทางอุณหพลศาสตร์ของหม้อนึ่งความดันไอ (Autoclave) ที่สภาวะมาตรฐาน $121\,^\circ\text{C}$, $15\text{ psi}$</li><li>6.4 ปฏิบัติการที่ 6 การศึกษาความสัมพันธ์ระหว่างความดันกับจุดเดือด และกรณีศึกษาการตรวจสอบรอบการทำงานของเครื่อง Autoclave</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>อธิบายความสัมพันธ์ระหว่างความดันสัมบูรณ์กับอุณหภูมิเคลวินตามกฎของเกย์-ลูสแซก ($P_1 / T_1 = P_2 / T_2$) ได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>วิเคราะห์กลไกทางฟิสิกส์ของเครื่อง Autoclave ได้ว่าทำไมต้องไล่อากาศออกจากหม้อนึ่งให้หมด และทำไมต้องใช้ไอน้ำอิ่มตัวความดันเกจ $15\text{ psi}$ เพื่อให้ได้อุณหภูมิ $121\,^\circ\text{C}$ สำหรับทำลายเอนโดสปอร์ของแบคทีเรีย <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>ปฏิบัติตามขั้นตอนความปลอดภัยของภาชนะรับความดันสูง (ไม่คลายเกลียวฝาขวดสนิทและไม่เปิดฝาหม้อนึ่งขณะยังมีแรงดัน) <strong>(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>Case Study (Problem Solving)</strong>&emsp; วิเคราะห์เหตุการณ์จริงในห้องแล็บจุลชีววิทยา “เมื่อเข็มวัดความดันของเครื่อง Autoclave ชี้ที่ $15\text{ psi}$ ครบ 15 นาที แต่เมื่อนำอาหารเลี้ยงเชื้อออกมาบ่มกลับพบเชื้อปนเปื้อนเต็มขวด และเทปวัดผล (Autoclave Tape) ไม่เปลี่ยนเป็นสีดำ สาเหตุทางฟิสิกส์คืออะไร”</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 6 กราฟความดันไออิ่มตัวของน้ำ และหม้อนึ่งความดันไอ Autoclave ประจำห้องปฏิบัติการ</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>การวิเคราะห์กรณีศึกษาเรื่อง Autoclave และการคำนวณกฎของแก๊ส <strong>(CLO1, CLO2)</strong></li><li>รายงานปฏิบัติการที่ 6 และการเตรียมความพร้อมก่อนสอบกลางภาคในสัปดาห์ที่ 7 <strong>(CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: ความดัน กฎของแก๊ส และความสัมพันธ์ระหว่างความดันกับอุณหภูมิ -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ความดัน กฎของแก๊ส และความสัมพันธ์ระหว่างความดันกับอุณหภูมิ</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-6.1"><img src="../images/maintex/sec_3d/ch06_s1.jpg" alt="ภาพที่ 6.1" loading="lazy"><figcaption><strong>ภาพที่ 6.1</strong>&ensp;ความสัมพันธ์ระหว่างความดันเกจ ($P_{\text{gauge}}$) ความดันบรรยากาศ ($P_{\text{atm}}$) และความดันสัมบูรณ์ ($P_{\text{abs}}$) ตามกฎของแก๊สในภาชนะปิด</figcaption></figure>
<p><strong>ความดัน</strong> (<strong>Pressure</strong>, $P$) คือขนาดของแรงที่กระทำตั้งฉากต่อหนึ่งหน่วยพื้นที่ ($P = F/A$) มีหน่วยเอสไอคือ <strong>พาสคัล</strong> ($\text{Pa}$ หรือ $\text{N/m}^2$) ในการใช้งานเครื่องมือทางจุลชีววิทยา เช่น หม้อนึ่งความดันไอ (<strong>Autoclave</strong>) หน้าปัดเครื่องมักแสดงหน่วยความดันเป็น<strong>ปอนด์ต่อตารางนิ้ว</strong> ($\text{psi}$) หรือ<strong>บรรยากาศ</strong> ($\text{atm}$) โดยที่ความดันบรรยากาศปกติที่ระดับน้ำทะเลมีค่าเท่ากับ</p>
<div class="tex-display">\[1\text{ atm} = 101.3\text{ kPa} \approx 14.7\text{ psi} \approx 15\text{ psi} \tag{6.1}\]</div>
<p>สิ่งสำคัญที่นักศึกษาต้องระวังคือ ตัวเลขที่อ่านได้จากหน้าปัดเครื่องมือวัดความดันทั่วไปคือ <strong>ความดันเกจ</strong> (<strong>Gauge Pressure</strong>, $P_{\text{gauge}}$) ซึ่งเป็นความดันส่วนที่เกินไปจากความดันบรรยากาศ ดังนั้น หากต้องการหา<strong>ความดันสัมบูรณ์จริง</strong> (<strong>Absolute Pressure</strong>, $P_{\text{abs}}$) ภายในหม้อนึ่ง จะต้องนำความดันบรรยากาศมารวมด้วยเสมอ ดังแสดงในภาพที่ 6.1 และสมการที่ (6.2)</p>
<div class="tex-display">\[P_{\text{abs}} = P_{\text{atm}} + P_{\text{gauge}} \tag{6.2}\]</div>
<p>สำหรับภาชนะปิดที่มีปริมาตรคงที่ ความดันสัมบูรณ์ ($P$) จะแปรผันตรงกับอุณหภูมิในหน่วยเคลวิน ($T_{\text{K}}$) ตามกฎของเกย์-ลูสแซก ดังสมการที่ (6.3)</p>
<div class="tex-display">\[\frac{P_1}{T_1} = \frac{P_2}{T_2} \qquad \text{(ต้องแทนค่า } T \text{ ในหน่วยเคลวิน } \text{K เสมอ)} \tag{6.3}\]</div>
            </div>
        </section>
        
        <!-- Section: ฟิสิกส์ของหม้อนึ่งความดันไอ ทำไมต้อง 121 องศาเซลเซียส ที่ 15 psi -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ฟิสิกส์ของหม้อนึ่งความดันไอ ทำไมต้อง 121 องศาเซลเซียส ที่ 15 psi</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-6.2"><img src="../images/maintex/sec_3d/ch06_s2.jpg" alt="ภาพที่ 6.2" loading="lazy"><figcaption><strong>ภาพที่ 6.2</strong>&ensp;ภาพตัดขวางหม้อนึ่งความดันไอ (Autoclave) ที่สภาวะมาตรฐาน $121\,^\circ\text{C}$ ความดันเกจ $15\text{ psi}$ และการควบแน่นคายความร้อนแฝงทำลายเอนโดสปอร์ของแบคทีเรีย</figcaption></figure>
<p>การต้มน้ำในหม้อเปิดที่ความดันบรรยากาศปกติ ($1\text{ atm}$ หรือความดันเกจ $0\text{ psi}$) น้ำจะเดือดที่อุณหภูมิสูงสุดเพียง $100\,^\circ\text{C}$ เท่านั้น ไม่ว่าจะเปิดไฟแรงเพียงใดอุณหภูมิของน้ำเดือดก็จะไม่สูงเกิน $100\,^\circ\text{C}$ ซึ่งอุณหภูมิดังกล่าวสามารถฆ่าเซลล์แบคทีเรียทั่วไป (<strong>Vegetative Cells</strong>) ได้ แต่<strong>ไม่สามารถทำลายเอนโดสปอร์</strong> (<strong>Endospores</strong>) ที่ทนความร้อนสูงของแบคทีเรียกลุ่ม <em>Bacillus</em> และ <em>Clostridium</em> ได้</p>
<p>เพื่อยกจุดเดือดของน้ำให้สูงขึ้นถึง $121\,^\circ\text{C}$ เราจึงต้องต้มน้ำในภาชนะปิดสนิทที่เรียกว่า <strong>หม้อนึ่งความดันไอ</strong> (<strong>Autoclave</strong>) เมื่อไอน้ำถูกกักไว้จนเกิดความดันเกจเพิ่มขึ้นเป็น $15\text{ psi}$ (ซึ่งคิดเป็นความดันสัมบูรณ์ $P_{\text{abs}} = 14.7 + 15 \approx 29.7\text{ psi}$ หรือประมาณ $2\text{ atm}$) จุดเดือดของน้ำจะขยับสูงขึ้นจาก $100\,^\circ\text{C}$ ไปอยู่ที่ $121\,^\circ\text{C}$ พอดี ดังแสดงในภาพที่ 6.2 และภาพที่ 6.3 และเมื่อไอน้ำอิ่มตัวที่ $121\,^\circ\text{C}$ สัมผัสกับขวดอาหารเลี้ยงเชื้อหรือเครื่องมือแพทย์ที่เย็นกว่า ไอน้ำจะควบแน่นกลายเป็นหยดน้ำพร้อมกับคาย<strong>ความร้อนแฝงของการกลายเป็นไอ</strong> ($L_v = 2{,}260\text{ J/g}$) ออกมาเข้าทำลายโครงสร้างโปรตีนและเอนโดสปอร์ให้ตายอย่างสมบูรณ์ภายในเวลา 15–20 นาที</p>
<figure class="tex-figure tex-figure-diagram" id="fig-6.3"><img src="../images/maintex/tikz/ch06_tikz1.svg" alt="ภาพที่ 6.3" loading="lazy"><figcaption><strong>ภาพที่ 6.3</strong>&ensp;กราฟความสัมพันธ์ระหว่างความดันเกจกับจุดเดือดของน้ำ และผลกระทบของอากาศตกค้างภายในหม้อนึ่งความดันไอ</figcaption></figure>
<div class="tex-aruco" data-aruco="5"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 5"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="1" width="1" height="1" fill="#fff"/><rect x="4" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="3" width="1" height="1" fill="#fff"/><rect x="3" y="3" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 5 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 5 — บทที่ 6: หม้อนึ่งความดันไอ Autoclave (121°C, 15 psi) และการไล่อากาศ</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;แสดงโครงสร้างภายในหม้อนึ่งความดันไอ การควบแน่นคายความร้อนแฝงของไอน้ำอิ่มตัว และผลเสียของการมีอากาศตกค้างต่อการฆ่าเชื้อสปอร์</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ความดันเกจ $P_{\text{gauge}}$ ($\text{psi}$), ร้อยละการไล่อากาศออก (%), เวลาฆ่าเชื้อ ($\text{min}$)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=5&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 5</a></div></div>
<div class="tex-box tex-box-warning"><div class="tex-box-title"><i class="fa-solid fa-triangle-exclamation"></i> กฎความปลอดภัยเหล็ก 3 ข้อในการใช้หม้อนึ่งความดันไอ Autoclave</div><div class="tex-box-body"><ol class="tex-ol"><li><strong>ต้องไล่อากาศออกจากหม้อนึ่งให้หมดก่อนปิดวาล์ว</strong>&emsp; ตามกฎความดันย่อยของดอลตัน ($P_{\text{total}} = P_{\text{steam}} + P_{\text{air}}$) หากมีอากาศปนอยู่ ความดัน $15\text{ psi}$ ที่อ่านได้จะเกิดจากอากาศผสมไอน้ำ ทำให้อุณหภูมิจริงไม่ถึง $121\,^\circ\text{C}$</li><li><strong>ต้องคลายเกลียวฝาขวดอาหารเลี้ยงเชื้อออกประมาณครึ่งรอบเสมอ</strong>&emsp; ห้ามบิดฝาขวดแก้วแน่นสนิทเข้าเครื่อง Autoclave เพราะแรงดันไอน้ำจะทำให้ขวดระเบิด</li><li><strong>ห้ามเปิดฝาหม้อนึ่งจนกว่าเข็มความดันเกจจะลดลงมาอยู่ที่ $0\text{ psi}$</strong>&emsp; และอุณหภูมิลดลงต่ำกว่า $80\,^\circ\text{C}$ มิฉะนั้นอาหารเหลวที่ร้อนจัดจะเกิดการเดือดพุ่งทะลัก (<strong>Superheated Boiling</strong>) ลวกผู้ปฏิบัติงาน</li></ol></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 6.1&ensp;การคำนวณความดันสัมบูรณ์และการเปลี่ยนแปลงความดันตามอุณหภูมิ</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; ขวดแก้วใบหนึ่งถูกปิดฝาสนิทโดยเผลอไม่ได้คลายเกลียวที่อุณหภูมิห้อง $27\,^\circ\text{C}$ (ความดันภายในขวดเริ่มต้น $P_1 = 1.0\text{ atm}$) เมื่อนำเข้าไปนึ่งในเครื่อง Autoclave จนอุณหภูมิสูงขึ้นเป็น $121\,^\circ\text{C}$ ความดันแก๊สภายในขวดจะเพิ่มขึ้นเป็นกี่บรรยากาศ ($\text{atm}$)</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 แปลงอุณหภูมิเซลเซียสให้เป็นเคลวิน ($T_{\text{K}} = T_{\text{C}} + 273$)</strong>
<div class="tex-display">\[
        T_1 = 27 + 273 = 300\text{ K} \qquad \text{และ} \qquad T_2 = 121 + 273 = 394\text{ K}
    \]</div></li><li><strong>ขั้นที่ 2 ใช้สมการสัดส่วนตรง $\dfrac{P_1}{T_1} = \dfrac{P_2}{T_2}$ เพื่อหาค่า $P_2$</strong>
<div class="tex-display">\[
        P_2 = P_1 \times \frac{T_2}{T_1} = 1.0\text{ atm} \times \frac{394\text{ K}}{300\text{ K}} = 1.31\text{ atm}
    \]</div>
<p>หากรวมกับความดันไอน้ำของของเหลวที่เดือดภายในขวด ความดันรวมภายในขวดที่ปิดสนิทจะพุ่งสูงเกิน $3\text{ atm}$ จึงเสี่ยงต่อการระเบิดอย่างยิ่ง</p></li></ol>
<p><strong>คำตอบ</strong>&emsp; เฉพาะความดันของอากาศแห้งภายในขวดจะเพิ่มขึ้นเป็น $1.31\text{ atm}$ (และเมื่อรวมความดันไอน้ำจะสูงกว่า $3\text{ atm}$)</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 6 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 6</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-6.4"><img src="../images/maintex/sec_3d/ch06_s3.jpg" alt="ภาพที่ 6.4" loading="lazy"><figcaption><strong>ภาพที่ 6.4</strong>&ensp;ชุดปฏิบัติการที่ 6 สำหรับศึกษาการเดือดของน้ำที่ความดันต่ำและการตรวจสอบประสิทธิภาพการฆ่าเชื้อด้วยเทปวัดผลความร้อน (Autoclave Indicator Tape)</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 6&emsp; ความดันไอ จุดเดือด และกรณีศึกษาการทำงานของ Autoclave (3 ชั่วโมง)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (ความดันและอุณหพลศาสตร์), CLO2 (วิเคราะห์การทำงานของ Autoclave), CLO3 (ความปลอดภัยภาชนะความดันสูง), CLO4 (รายงานกลุ่ม)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 6.4)</strong></p>
<ul class="tex-ul"><li>ชุดสาธิตการเดือดของน้ำภายใต้ความดันต่ำ (กระบอกฉีดยาขนาดใหญ่หรือขวดก้นกลมต่อปั๊มสุญญากาศ) และเทอร์โมมิเตอร์</li><li>หม้อนึ่งความดันไอ (Autoclave) ประจำห้องปฏิบัติการ, เทปวัดผลความร้อน (Autoclave Indicator Tape) และขวดใส่สารละลายตัวอย่าง</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li><strong>ตอนที่ 1 การเดือดของน้ำที่ความดันต่ำ</strong>&emsp; ดูดน้ำอุ่นอุณหภูมิประมาณ $70\,^\circ\text{C}$ เข้ากระบอกฉีดยาใส อุดปลายกระบอกแล้วดึงก้านสูบออกเพื่อลดความดันภายใน สังเกตฟองการเดือดของน้ำที่อุณหภูมิต่ำกว่า $100\,^\circ\text{C}$</li><li><strong>ตอนที่ 2 การบันทึกกราฟรอบการทำงานจริงของเครื่อง Autoclave</strong>&emsp; เตรียมขวดน้ำกลั่นที่คลายเกลียวฝาครึ่งรอบและติดเทป Autoclave Tape นำเข้าเครื่อง Autoclave บันทึกค่าความดันเกจ ($\text{psi}$) และอุณหภูมิ ($^\circ\text{C}$) ทุกๆ 5 นาที ตั้งแต่ช่วงไล่อากาศ ช่วงเพิ่มความดัน ช่วงคงที่ที่ $121\,^\circ\text{C}$ ($15\text{ psi}$) นาน 15 นาที จนถึงช่วงลดความดัน</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ขั้นตอนการทำงานของ Autoclave</strong></th><th><strong>เวลาที่ผ่านไป ($\text{min}$)</strong></th><th><strong>ความดันเกจ ($\text{psi}$)</strong></th><th><strong>อุณหภูมิที่อ่านได้ ($^\circ\text{C}$)</strong></th></tr></thead><tbody><tr><td>1. เริ่มต้นเปิดเครื่องและไล่อากาศ</td><td>$0\text{ min}$</td><td>............</td><td>............</td></tr><tr><td>2. ปิดวาล์วไล่อากาศและเพิ่มความดัน</td><td>$10\text{ min}$</td><td>............</td><td>............</td></tr><tr><td>3. เข้าสู่สภาวะฆ่าเชื้อมาตรฐาน</td><td>$15\text{ min}$</td><td>............</td><td>............</td></tr><tr><td>4. ครบเวลาฆ่าเชื้อ 15 นาที</td><td>$30\text{ min}$</td><td>............</td><td>............</td></tr><tr><td>5. ความดันลดลงปลอดภัยพร้อมเปิดฝา</td><td>$45\text{ min}$</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 6 และแนวข้อสอบกลางภาค (สัปดาห์ที่ 7)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เมื่ออ่านหน้าปัดความดันของเครื่อง Autoclave ได้ค่าความดันเกจเท่ากับ $15\text{ psi}$ จงหาว่าความดันสัมบูรณ์ภายในหม้อนึ่งมีค่ากี่ $\text{psi}$ และคิดเป็นกี่บรรยากาศ ($\text{atm}$)</li><li>เพราะเหตุใดไอน้ำอิ่มตัวที่อุณหภูมิ $121\,^\circ\text{C}$ ในเครื่อง Autoclave จึงสามารถฆ่าเอนโดสปอร์ได้ภายในเวลา 15 นาที ในขณะที่ตู้อบลมร้อนแห้ง (Hot Air Oven) ต้องใช้อุณหภูมิสูงถึง $160\text{--}180\,^\circ\text{C}$ และใช้เวลานานถึง $1\text{--}2$ ชั่วโมง จงอธิบายด้วยหลักการความร้อนแฝงของการควบแน่น</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch05_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 5: ความร้อนและการควบคุมอุณหภูมิชีวภาพ
        </a>
    
                
        <a href="ch07_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ 7: ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม <i class="fas fa-arrow-right"></i>
        </a>
    
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
