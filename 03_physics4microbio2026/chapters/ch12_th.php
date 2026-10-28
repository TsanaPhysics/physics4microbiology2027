<?php
$pageTitle = "บทที่ 12: สเปกโตรโฟโตมิเตอร์และการบูรณาการฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยา";
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
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ 12</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE 12 &bull; SPECTROPHOTOMETRY & MINI-PROJECT
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                สเปกโตรโฟโตมิเตอร์และการบูรณาการฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยา
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ 13)
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ 13
                </span>
                <a href="../webar/ar_aruco_textbook.html?id=11&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: 11 ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                
                <a href="../labs/lab12_od600.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 12: การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญของจุลินทรีย์ (สัปดาห์ที่ 13)</span>
                </a>
            
                <a href="../labs/lab13_mini_project.php" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab 13: โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา (สัปดาห์ที่ 14)</span>
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
                    <h3 class="text-lg font-bold text-white">แผนบริหารการสอนประจำบทที่ 12&emsp; สเปกโตรโฟโตมิเตอร์และโครงงานบูรณาการ (สัปดาห์ที่ 13–14)</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                <p><strong>1. หัวข้อเนื้อหาประจำบท (สัปดาห์ที่ 13 และสัปดาห์ที่ 14 รวม 10 ชั่วโมง)</strong></p>
<ul class="tex-ul"><li>12.1 หลักการดูดกลืนแสงและการกระเจิงแสงของสารแขวนลอยเซลล์จุลินทรีย์</li><li>12.2 กฎของเบียร์-แลมเบิร์ต ($A = \varepsilon b c$) และความสัมพันธ์เชิงเส้นระหว่างค่า $\text{OD}_{600}$ กับความหนาแน่นเซลล์</li><li>12.3 ปฏิบัติการที่ 12 การใช้เครื่อง Spectrophotometer วัดค่า $\text{OD}_{600}$ และสร้างกราฟมาตรฐานการเจริญของจุลินทรีย์ (สัปดาห์ที่ 13)</li><li>12.4 ปฏิบัติการที่ 13 โครงงานย่อย (Mini-Project) การสังเคราะห์และนำเสนอหลักการฟิสิกส์ในเครื่องมือจุลชีววิทยา (สัปดาห์ที่ 14)</li></ul>
<p><strong>2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)</strong></p>
<ol class="tex-ol"><li>อธิบายกฎของเบียร์-แลมเบิร์ตและคำนวณความเข้มข้นหรือความหนาแน่นของเซลล์จากค่าการดูดกลืนแสงได้ <strong>(CLO1 เชื่อมโยง PLO2)</strong></li><li>อธิบายเหตุผลทางฟิสิกส์ว่าทำไมก่อนวัดค่า $\text{OD}_{600}$ ของเชื้อแบคทีเรียจึงต้องเซตศูนย์ (Blank) ด้วยอาหารเลี้ยงเชื้อเหลวที่ยังไม่ใส่เชื้อ และทำไมเมื่อค่า $\text{OD}_{600}$ สูงเกิน $1.0$ จึงต้องเจือจางตัวอย่างก่อนวัด <strong>(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)</strong></li><li>บูรณาการความรู้ฟิสิกส์ทั้งหมดในรายวิชาเพื่อวิเคราะห์เครื่องมือในห้องแล็บจุลชีววิทยาและนำเสนอโครงงานกลุ่มได้อย่างถูกต้องชัดเจน <strong>(CLO2, CLO3, CLO4 เชื่อมโยง PLO1–PLO6)</strong></li></ol>
<p><strong>3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning &amp; OBE)</strong></p>
<ul class="tex-ul"><li><strong>สัปดาห์ที่ 13 (Integrated Instrument Lab)</strong>&emsp; นักศึกษาฝึกเตรียมชุดเจือจางสารแขวนลอยเซลล์ (Serial Dilution) วัดค่า $\text{OD}_{600}$ และเขียนกราฟการเจริญของแบคทีเรีย (Bacterial Growth Curve)</li><li><strong>สัปดาห์ที่ 14 (Project-Based Learning)</strong>&emsp; นักศึกษาแต่ละกลุ่มเลือกเครื่องมือจุลชีววิทยา 1 ชนิด จัดทำโปสเตอร์อินโฟกราฟิกอธิบาย “หลักการฟิสิกส์ + สมการเข้าใจง่าย + ข้อควรระวังหน้างาน” และนำเสนอแลกเปลี่ยนเรียนรู้</li></ul>
<p><strong>4. สื่อการเรียนรู้และแหล่งเรียนรู้</strong></p>
<ul class="tex-ul"><li>เอกสารคำสอนบทที่ 12 เครื่องสเปกโตรโฟโตมิเตอร์ หลอดคิวเวตต์ (Cuvette) และเกณฑ์ประเมินโครงงานย่อย</li></ul>
<p><strong>5. การวัดและประเมินผลประจำบท</strong></p>
<ul class="tex-ul"><li>รายงานปฏิบัติการที่ 12 เรื่องการวัดค่า $\text{OD}_{600}$ <strong>(CLO1, CLO2, CLO4)</strong></li><li>การประเมินโครงงานย่อยและการนำเสนอในปฏิบัติการที่ 13 (15 คะแนน) <strong>(CLO2, CLO3, CLO4)</strong></li></ul>
            </div>
        </div>
        

            
        <!-- Section: กฎของเบียร์-แลมเบิร์ตและการวัดความขุ่นของเซลล์ด้วยค่า OD600 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">กฎของเบียร์-แลมเบิร์ตและการวัดความขุ่นของเซลล์ด้วยค่า OD600</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-12.1"><img src="../images/maintex/sec_3d/ch12_s1.jpg" alt="ภาพที่ 12.1" loading="lazy"><figcaption><strong>ภาพที่ 12.1</strong>&ensp;องค์ประกอบภายในเครื่องสเปกโตรโฟโตมิเตอร์ การกระเจิงและดูดกลืนลำแสง $600\text{ nm}$ โดยเซลล์แบคทีเรียในหลอดคิวเวตต์ตามกฎของเบียร์-แลมเบิร์ต ($A = \varepsilon b c$)</figcaption></figure>
<p>ในการศึกษาการเจริญเติบโตของแบคทีเรียหรือยีสต์ในอาหารเลี้ยงเชื้อเหลว การนับจำนวนโคโลนีบนจานวุ้น (Plate Count) ต้องใช้เวลาบ่มเชื้อนานถึง 24 ชั่วโมง นักจุลชีววิทยาจึงนิยมใช้วิธีทางฟิสิกส์เชิงแสงที่รวดเร็วภายในเวลาไม่กี่วินาที คือการใช้<strong>เครื่องสเปกโตรโฟโตมิเตอร์</strong> (<strong>Spectrophotometer</strong>) วัดค่าความหนาแน่นเชิงแสงที่ความยาวคลื่น $600\text{ nm}$ ซึ่งเรียกว่า <strong>ค่า $\text{OD}_{600}$</strong> (<strong>Optical Density at 600 nm</strong>)</p>
<p>ดังแสดงในภาพที่ 12.1 และภาพที่ 12.2 เมื่อลำแสงความยาวคลื่น $600\text{ nm}$ ที่มีความเข้มเริ่มต้น $I_0$ พุ่งผ่านหลอดวัดตัวอย่าง (<strong>Cuvette</strong>) ที่มีความกว้างช่วงแสง $b = 1\text{ cm}$ เซลล์จุลินทรีย์ที่แขวนลอยอยู่จะช่วยกันดูดกลืนและกระเจิงลำแสงออกไปด้านข้าง ทำให้แสงที่ทะลุผ่านไปถึงหัววัดด้านหลังเหลือความเข้มเพียง $I$ ปริมาณ<strong>ค่าการดูดกลืนแสง</strong> (<strong>Absorbance</strong>, $A$ หรือค่า $\text{OD}$) จะแปรผันตรงกับความเข้มข้นของสารหรือความหนาแน่นของเซลล์ ($c$) ตาม<strong>กฎของเบียร์-แลมเบิร์ต</strong> (<strong>Beer-Lambert Law</strong>) ในสมการที่ (12.1)</p>
<div class="tex-display">\[A = \varepsilon b c \tag{12.1}\]</div>
<p>โดยที่ $\varepsilon$ คือสัมประสิทธิ์การดูดกลืนแสงจำเพาะ, $b$ คือความกว้างของหลอดคิวเวตต์ (ปกติเท่ากับ $1.0\text{ cm}$) และ $c$ คือความเข้มข้นหรือความหนาแน่นของเซลล์จุลินทรีย์ เนื่องจาก $A$ แปรผันตรงกับ $c$ โดยตรง เราจึงสามารถใช้สมการสัดส่วนตรงเทียบหาจำนวนเซลล์ได้ทันทีโดยไม่ต้องใช้ลอการิทึม คือ</p>
<div class="tex-display">\[\frac{\text{OD}_1}{\text{OD}_2} = \frac{c_1}{c_2} \tag{12.2}\]</div>
<figure class="tex-figure tex-figure-diagram" id="fig-12.2"><img src="../images/maintex/tikz/ch12_tikz1.svg" alt="ภาพที่ 12.2" loading="lazy"><figcaption><strong>ภาพที่ 12.2</strong>&ensp;หลักการวัดความหนาแน่นของเซลล์จุลินทรีย์ด้วยการดูดกลืนและกระเจิงแสงที่ความยาวคลื่น 600 นาโนเมตร</figcaption></figure>
<div class="tex-aruco" data-aruco="11"><div class="tex-aruco-marker"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="120" height="120" role="img" aria-label="ArUco ID 11"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/><rect x="0" y="0" width="6" height="6" fill="#000"/><rect x="1" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="1" width="1" height="1" fill="#fff"/><rect x="2" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="2" width="1" height="1" fill="#fff"/><rect x="4" y="3" width="1" height="1" fill="#fff"/><rect x="1" y="4" width="1" height="1" fill="#fff"/><rect x="2" y="4" width="1" height="1" fill="#fff"/><rect x="3" y="4" width="1" height="1" fill="#fff"/><path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg><span>ArUco ID 11 (4×4)</span></div><div class="tex-aruco-body"><div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID 11 — บทที่ 12: สเปกโตรโฟโตมิเตอร์ กฎของเบียร์-แลมเบิร์ต และกราฟการเจริญเติบโตจากค่า OD600</div><p><strong>แบบจำลอง 3 มิติ</strong>&ensp;จำลองลำแสงโมโนโครเมเตอร์ $600\text{ nm}$ ที่ส่องผ่านหลอด Cuvette บรรจุเซลล์แบคทีเรียความขุ่นต่างๆ พร้อมคำนวณค่า $\%T$, $\text{OD}_{600}$ และระยะการเจริญเติบโต 4 ระยะ</p><p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;ความหนาแน่นเซลล์แบคทีเรีย, ตัวคูณการเจือจาง (DF), เวลาการบ่มเพาะเชื้อ $t$ ($\text{hr}$)</p><a class="tex-aruco-btn" href="../webar/ar_aruco_textbook.html?id=11&amp;ar=1" target="_blank" rel="noopener"><i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID 11</a></div></div>
<div class="tex-box tex-box-warning"><div class="tex-box-title"><i class="fa-solid fa-triangle-exclamation"></i> ข้อควรระวังสำคัญ 3 ประการในการวัดค่า OD600 ด้วยเครื่อง Spectrophotometer</div><div class="tex-box-body"><ol class="tex-ol"><li><strong>ต้องเซตศูนย์ (Blank) ด้วยอาหารเลี้ยงเชื้อเหลวปลอดเชื้อชนิดเดียวกันเสมอ</strong>&emsp; ห้ามใช้น้ำกลั่นเป็น Blank หากเชื้อเพาะเลี้ยงอยู่ใน Nutrient Broth ที่มีสีเหลืองใส เพราะสีของอาหารเลี้ยงเชื้อจะดูดกลืนแสงส่วนหนึ่งไปแล้ว</li><li><strong>ช่วงความเป็นเส้นตรงอยู่ที่ $\text{OD}_{600}$ ระหว่าง $0.1$ ถึง $0.8$ (ไม่เกิน $1.0$)</strong>&emsp; หากวัดตัวอย่างแล้วได้ค่า $\text{OD}_{600} &gt; 1.0$ เซลล์จะหนาแน่นเกินไปจนบังแสงซ้อนกัน ต้องนำตัวอย่างมาเจือจาง (เช่น เจือจาง $10$ เท่า) ก่อนวัด แล้วจึงนำค่าที่อ่านได้ไปคูณตัวคูณการเจือจางกลับคืน</li><li><strong>ห้ามจับด้านใสของหลอด Cuvette ด้วยมือเปล่า</strong>&emsp; ให้จับเฉพาะด้านขุ่นหรือด้านบน และใช้กระดาษเช็ดเลนส์เช็ดหยดน้ำหรือรอยนิ้วมือออกก่อนใส่ลงในช่องวัดแสง</li></ol></div></div>
<div class="tex-box tex-box-worked"><div class="tex-box-title"><i class="fa-solid fa-calculator"></i> ตัวอย่างที่ 12.1&ensp;การคำนวณความเข้มข้นของเซลล์แบคทีเรียจากค่า OD600 และการเจือจาง</div><div class="tex-box-body"><p><strong>โจทย์ปัญหา</strong>&emsp; จากกราฟมาตรฐานของแบคทีเรีย <em>Escherichia coli</em> ทราบว่าที่ค่า $\text{OD}_{600} = 0.50$ จะมีความหนาแน่นเซลล์เท่ากับ $4.0 \times 10^8\text{ cells/mL}$ หากนักศึกษานำตัวอย่างเชื้อที่บ่มไว้มาเจือจางลง $5$ เท่า แล้วนำไปวัดในเครื่อง Spectrophotometer ได้ค่า $\text{OD}_{600} = 0.35$ จงหาว่าในขวดเลี้ยงเชื้อต้นฉบับ (ก่อนเจือจาง) มีความหนาแน่นเซลล์แบคทีเรียเท่าใด</p>
<p><strong>วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย</strong></p>
<ol class="tex-ol"><li><strong>ขั้นที่ 1 หาความหนาแน่นเซลล์ของหลอดที่เจือจางแล้วโดยเทียบสัดส่วนตรง</strong>
<div class="tex-display">\[
        c_{\text{diluted}} = 4.0 \times 10^8 \times \left(\frac{0.35}{0.50}\right) = 2.8 \times 10^8\text{ cells/mL}
    \]</div></li><li><strong>ขั้นที่ 2 คูณด้วยตัวคูณการเจือจาง ($5$ เท่า) เพื่อหาความหนาแน่นในขวดต้นฉบับ</strong>
<div class="tex-display">\[
        c_{\text{original}} = 2.8 \times 10^8 \times 5 = 14.0 \times 10^8 = 1.4 \times 10^9\text{ cells/mL}
    \]</div></li></ol>
<p><strong>คำตอบ</strong>&emsp; ในขวดเลี้ยงเชื้อต้นฉบับมีความหนาแน่นเซลล์เท่ากับ $1.4 \times 10^9\text{ cells/mL}$</p></div></div>
            </div>
        </section>
        
        <!-- Section: ปฏิบัติการประจำสัปดาห์ที่ 13 และสัปดาห์ที่ 14 -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">ปฏิบัติการประจำสัปดาห์ที่ 13 และสัปดาห์ที่ 14</h2>
            <div class="tex-article leading-relaxed">
                <figure class="tex-figure tex-figure-photo" id="fig-12.3"><img src="../images/maintex/sec_3d/ch12_s2.jpg" alt="ภาพที่ 12.3" loading="lazy"><figcaption><strong>ภาพที่ 12.3</strong>&ensp;ชุดหลอดคิวเวตต์สารแขวนลอยเซลล์ที่ระดับการเจือจางต่างๆ สำหรับสร้างกราฟมาตรฐาน $\text{OD}_{600}$ และโครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา</figcaption></figure>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 12&emsp; การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญของจุลินทรีย์ (สัปดาห์ที่ 13)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมิน</strong>&emsp; CLO1 (กฎของเบียร์-แลมเบิร์ต), CLO2 (การใช้เครื่อง Spectrophotometer), CLO3 (ความละเอียดรอบคอบ), CLO4 (การเขียนกราฟมาตรฐาน)</p>
<p><strong>1. วัสดุและอุปกรณ์ (ดังแสดงในภาพที่ 12.3)</strong></p>
<ul class="tex-ul"><li>เครื่องสเปกโตรโฟโตมิเตอร์ (ตั้งความยาวคลื่นที่ $\lambda = 600\text{ nm}$), หลอดคิวเวตต์ (Cuvette) ขนาด $1\text{ cm}$</li><li>สารแขวนลอยยีสต์หรือแบคทีเรียความเข้มข้นเริ่มต้น ($100\%$) และชุดเจือจางที่ระดับ $80\%, 60\%, 40\%$ และ $20\%$ พร้อมหลอดอาหารเหลวปลอดเชื้อสำหรับทำ Blank</li></ul>
<p><strong>2. ขั้นตอนการทดลอง</strong></p>
<ol class="tex-ol"><li>ปรับความยาวคลื่นเครื่อง Spectrophotometer ไปที่ $600\text{ nm}$ ใส่หลอด Blank (อาหารเหลวปลอดเชื้อ) แล้วกดปุ่มเซตศูนย์ ($\text{OD}_{600} = 0.000$)</li><li>วัดค่า $\text{OD}_{600}$ ของสารแขวนลอยเซลล์ที่ความเข้มข้นสัมพัทธ์ $20\%, 40\%, 60\%, 80\%$ และ $100\%$ บันทึกผลและเขียนกราฟมาตรฐานระหว่างค่า $\text{OD}_{600}$ (แกนตั้ง) กับความเข้มข้นสัมพัทธ์ (แกนนอน)</li></ol>
<p><strong>3. ตารางบันทึกผลการทดลอง</strong></p>
<div class="tex-center"><div class="tex-table-wrap"><table class="tex-table"><thead><tr><th><strong>ความเข้มข้นสัมพัทธ์ของเซลล์</strong></th><th><strong>Blank ($0\%$)</strong></th><th><strong>$20\%$</strong></th><th><strong>$40\%$</strong></th><th><strong>$60\%$</strong></th><th><strong>$80\%$</strong></th></tr></thead><tbody><tr><td>ค่า $\text{OD}_{600}$ ครั้งที่ 1</td><td>$0.000$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ค่า $\text{OD}_{600}$ ครั้งที่ 2</td><td>$0.000$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr><tr><td>ค่าเฉลี่ย $\text{OD}_{600}$</td><td>$0.000$</td><td>............</td><td>............</td><td>............</td><td>............</td></tr></tbody></table></div></div></div></div>
<div class="tex-box tex-box-lab"><div class="tex-box-title"><i class="fa-solid fa-flask-vial"></i> ปฏิบัติการที่ 13&emsp; โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา (สัปดาห์ที่ 14)</div><div class="tex-box-body"><p><strong>ผลลัพธ์การเรียนรู้ที่ประเมินรวบยอด</strong>&emsp; CLO2 (ประยุกต์ใช้หลักการฟิสิกส์อธิบายเครื่องมือและแก้ปัญหา), CLO3 (จรรยาบรรณและความปลอดภัย), CLO4 (การทำงานร่วมกันและการนำเสนอทางวิทยาศาสตร์)</p>
<p><strong>แนวทางการดำเนินโครงงานย่อย (Mini-Project 15 คะแนน)</strong></p>
<ol class="tex-ol"><li>นักศึกษาแบ่งกลุ่ม กลุ่มละ 3–4 คน เลือกเครื่องมือหรือเทคนิคในห้องปฏิบัติการจุลชีววิทยา 1 หัวข้อจากรายการต่อไปนี้
<ul class="tex-ul"></ul></li><li><strong>หัวข้อที่ 1</strong>&emsp; ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave) และการป้องกันความล้มเหลวในการฆ่าเอนโดสปอร์</li><li><strong>หัวข้อที่ 2</strong>&emsp; ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge) การแปลงค่า RPM เป็น RCF และการจัดสมดุลโรเตอร์</li><li><strong>หัวข้อที่ 3</strong>&emsp; ฟิสิกส์ของกล้องจุลทรรศน์กำลังขยายสูง 100x และบทบาทของดัชนีหักเหน้ำมันช่วยส่อง</li><li><strong>หัวข้อที่ 4</strong>&emsp; ฟิสิกส์ไฟฟ้าในเทคนิคการย้อมสีแกรมและเครื่องแยกดีเอ็นเอ (Gel Electrophoresis)</li><li><strong>หัวข้อที่ 5</strong>&emsp; ฟิสิกส์ของตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) การไหลแบบราบเรียบของอากาศผ่านแผ่นกรอง HEPA และรังสี UV-C itemize</li><li>จัดทำแผ่นภาพอินโฟกราฟิกหรือสไลด์นำเสนอความยาว 10 นาที ประกอบด้วย (ก) หลักการและสมการฟิสิกส์ฉบับเข้าใจง่าย, (ข) ตัวอย่างการคำนวณหน้างาน 1 ข้อ และ (ค) แนวทางแก้ปัญหาและความปลอดภัยในห้องปฏิบัติการจุลชีววิทยา</li></ol></div></div>
            </div>
        </section>
        

            
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">คำถามท้ายบทที่ 12 และแนวข้อสอบปลายภาค (สัปดาห์ที่ 15)</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                <ol class="tex-ol"><li>เพราะเหตุใดในการวัดความหนาแน่นของเซลล์แบคทีเรียด้วยเครื่อง Spectrophotometer จึงต้องตั้งค่าความยาวคลื่นที่ $600\text{ nm}$ (แสงสีส้ม-เหลือง) แทนที่จะใช้รังสี UV ที่ความยาวคลื่น $260\text{ nm}$ หรือ $280\text{ nm}$</li><li>นักศึกษาวัดค่า $\text{OD}_{600}$ ของเชื้อที่เจือจางลง $10$ เท่า ได้ค่าเท่ากับ $0.42$ จงหาว่าหากไม่เจือจาง ค่า $\text{OD}_{600}$ เทียบเท่าของเชื้อต้นฉบับจะมีค่าเท่าใด และเหตุใดจึงไม่ควรวัดเชื้อต้นฉบับโดยตรงโดยไม่เจือจาง</li></ol>
            </div>
        </section>
        

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                
        <a href="ch11_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ 11: กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์
        </a>
    
                <div></div>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
