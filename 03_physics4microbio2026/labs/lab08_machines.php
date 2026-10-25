<?php $pageTitle='ปฏิบัติการที่ 8: เครื่องกลอย่างง่าย | Lab 8: Simple Machines | 实验8：简单机械'; $basePath='../'; include '../includes/header.php'; ?>
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">🔧 <span class="lang-block" lang="th">ปฏิบัติการที่ 8</span><span class="lang-block" lang="en">Lab 8</span><span class="lang-block" lang="zh">实验8</span></div>
    <h1><span class="lang-block" lang="th">เครื่องกล<span>อย่างง่าย</span></span><span class="lang-block" lang="en">Simple<span> Machines</span></span><span class="lang-block" lang="zh">简单<span>机械</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">วัด MA และ efficiency ของคาน รอก และพื้นเอียงในห้องปฏิบัติการ</span><span class="lang-block" lang="en">Measure MA and efficiency of levers, pulleys, and inclined planes</span><span class="lang-block" lang="zh">测量杠杆、滑轮和斜面的MA和效率</span></li>
            <li><span class="lang-block" lang="th">วิเคราะห์อุปกรณ์ห้องปฏิบัติการ (ที่คีบ กรรไกร ไมโครปิเปต) เป็นเครื่องกล</span><span class="lang-block" lang="en">Analyze lab equipment (forceps, scissors, micropipette) as simple machines</span><span class="lang-block" lang="zh">将实验室设备（镊子、剪刀、移液器）分析为简单机械</span></li>
            <li><span class="lang-block" lang="th">[ENV] คำนวณ efficiency ของ Archimedes screw pump ในการยกน้ำ</span><span class="lang-block" lang="en">[ENV] Calculate efficiency of Archimedes screw pump for water lifting</span><span class="lang-block" lang="zh">[ENV] 计算阿基米德螺旋泵的提水效率</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ทดสอบคาน 3 ชนิด (Class I, II, III) วัด effort arm, load arm, effort force และ load force ทั้งก่อนและหลังแรงเสียดทาน คำนวณ MA_ideal, MA_actual และ efficiency</span>
                <span class="lang-block" lang="en">Test three lever classes (I, II, III). Measure effort arm, load arm, effort force, load force. Calculate MA_ideal, MA_actual, and efficiency.</span>
                <span class="lang-block" lang="zh">测试三类杠杆（Ⅰ、Ⅱ、Ⅲ类），测量力臂、阻力臂、力、阻力，计算MA_ideal、MA_actual和效率。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล</span><span class="lang-block" lang="en">Data Table</span><span class="lang-block" lang="zh">数据记录表</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">เครื่องกล</span><span class="lang-block" lang="en">Machine</span><span class="lang-block" lang="zh">机械</span></th>
                <th>F_effort (N)</th><th>F_load (N)</th><th>d_effort (m)</th><th>d_load (m)</th>
                <th>MA_ideal</th><th>MA_actual</th><th>η%</th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">คาน Class I</span><span class="lang-block" lang="en">Lever I</span><span class="lang-block" lang="zh">第Ⅰ类杠杆</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">คาน Class II</span><span class="lang-block" lang="en">Lever II</span><span class="lang-block" lang="zh">第Ⅱ类杠杆</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">รอก 2 ลูก</span><span class="lang-block" lang="en">Double Pulley</span><span class="lang-block" lang="zh">双滑轮</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">อธิบายว่าทำไม efficiency จริงถึงต่ำกว่า 100% และปัจจัยใดบ้างที่ทำให้เสีย efficiency</span><span class="lang-block" lang="en">Why is actual efficiency always less than 100%? What factors reduce it?</span><span class="lang-block" lang="zh">为什么实际效率总是低于100%？哪些因素会降低效率？</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> ไมโครปิเปต 1 mL ใช้หลักสกรู (pitch = 1 mm, r = 3 mm) คำนวณ MA ของ plunger และอธิบายว่าการออกแบบนี้ช่วยให้ดูดของเหลวได้แม่นยำอย่างไร</span><span class="lang-block" lang="en"><strong>Lab Application:</strong> Micropipette 1 mL uses screw principle (pitch = 1 mm, r = 3 mm). Calculate plunger MA and explain how this design enables precise liquid aspiration.</span><span class="lang-block" lang="zh"><strong>实验应用：</strong>1 mL移液器使用螺钉原理（导程 = 1 mm，r = 3 mm），计算活塞MA并解释该设计如何实现精确吸液。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab07_energy.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 7</span><span class="lang-block" lang="en">Lab 7</span><span class="lang-block" lang="zh">实验7</span></a>
        <a href="lab09_heat.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 9</span><span class="lang-block" lang="en">Lab 9</span><span class="lang-block" lang="zh">实验9</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
