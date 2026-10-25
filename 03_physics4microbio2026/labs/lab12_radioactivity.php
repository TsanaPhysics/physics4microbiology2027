<?php $pageTitle='ปฏิบัติการที่ 12: กัมมันตภาพรังสี | Lab 12: Radioactivity & Half-life | 实验12：放射性与半衰期'; $basePath='../'; include '../includes/header.php'; ?>
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">☢️ <span class="lang-block" lang="th">ปฏิบัติการที่ 12</span><span class="lang-block" lang="en">Lab 12</span><span class="lang-block" lang="zh">实验12</span></div>
    <h1><span class="lang-block" lang="th">กัมมันตภาพรังสีและ<span>ครึ่งชีวิต</span></span><span class="lang-block" lang="en">Radioactivity<span> &amp; Half-life</span></span><span class="lang-block" lang="zh">放射性<span>与半衰期</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ศึกษาการสลายตัวของกัมมันตรังสี (simulation) และหาค่าครึ่งชีวิต</span><span class="lang-block" lang="en">Study radioactive decay (simulation) and determine half-life</span><span class="lang-block" lang="zh">研究放射性衰变（模拟）并测定半衰期</span></li>
            <li><span class="lang-block" lang="th">คำนวณขนาดยาและเวลาที่ปลอดภัยสำหรับ radioactive tracers ทางการแพทย์</span><span class="lang-block" lang="en">Calculate safe dosage and time for medical radioactive tracers</span><span class="lang-block" lang="zh">计算医用放射性示踪剂的安全剂量和时间</span></li>
            <li><span class="lang-block" lang="th">[ENV] ประยุกต์ ¹⁴C dating กับตัวอย่างทางสิ่งแวดล้อม</span><span class="lang-block" lang="en">[ENV] Apply ¹⁴C dating to environmental samples</span><span class="lang-block" lang="zh">[ENV] 将¹⁴C定年应用于环境样品</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <div class="env-box">
            <div class="env-box-title">⚠️ <span class="lang-block" lang="th">ความปลอดภัย (Radiation Safety)</span><span class="lang-block" lang="en">Radiation Safety</span><span class="lang-block" lang="zh">辐射安全</span></div>
            <div class="lang-block" lang="th">
                <p>ปฏิบัติการนี้ใช้ <strong>simulation</strong> (ซอฟต์แวร์จำลอง) แทนแหล่งรังสีจริง<br>
                หากใช้แหล่งรังสีจริง: สวมถุงมือ labcoat ตรวจสอบ dosimeter อยู่ห่าง ≥ 30 cm<br>
                แสดง radiation warning symbol ☢️ บนอุปกรณ์ทุกชิ้น</p>
            </div>
            <div class="lang-block" lang="en">
                <p>This lab uses <strong>simulation software</strong> instead of real radiation sources.<br>
                If real sources: wear gloves, labcoat, check dosimeter, stay ≥ 30 cm from source.<br>
                Display ☢️ symbol on all radiation equipment.</p>
            </div>
            <div class="lang-block" lang="zh">
                <p>本实验使用<strong>模拟软件</strong>代替真实放射性源。<br>
                如使用真实放射源：佩戴手套、实验服，检查剂量计，距离≥30 cm。<br>
                所有放射性设备须贴☢️标志。</p>
            </div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Simulation — Dice Decay Model</span><span class="lang-block" lang="en">Part 1: Simulation — Dice Decay Model</span><span class="lang-block" lang="zh">第一部分：模拟——骰子衰变模型</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เริ่มต้นด้วย N₀ = 200 ลูกเต๋า (แทนอะตอมที่ไม่เสถียร) ทอยลูกเต๋าทุกรอบ นำลูกเต๋าที่แสดง 6 ออก (decay probability = 1/6 ต่อรอบ) บันทึก N ที่เหลือในแต่ละรอบ วาดกราฟ ln(N) vs รอบ หา half-life</span>
                <span class="lang-block" lang="en">Start with N₀ = 200 dice (unstable atoms). Roll each round; remove dice showing 6 (decay probability = 1/6 per round). Record N remaining. Plot ln(N) vs round to find half-life.</span>
                <span class="lang-block" lang="zh">从N₀ = 200个骰子（不稳定原子）开始，每轮掷骰子，移除显示6的骰子（衰变概率 = 1/6/轮）。记录剩余N，绘制ln(N)与轮数的图像，求半衰期。</span>
            </p></div></div>
        </div>
        <h3><span class="lang-block" lang="th">ตอนที่ 2: Computer Simulation — ¹³¹I Decay</span><span class="lang-block" lang="en">Part 2: Computer Simulation — ¹³¹I Decay</span><span class="lang-block" lang="zh">第二部分：计算机模拟——¹³¹I衰变</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ใช้โปรแกรมจำลอง หรือคำนวณ N(t) = N₀ × (½)^(t/8) สำหรับ ¹³¹I (t₁/₂ = 8 วัน) เริ่มจาก A₀ = 20 mCi คำนวณกัมมันตภาพทุก 8 วัน นาน 56 วัน บันทึกผลในตาราง</span>
                <span class="lang-block" lang="en">Simulate or calculate N(t) = N₀ × (½)^(t/8) for ¹³¹I (t₁/₂ = 8 d), starting A₀ = 20 mCi. Calculate activity every 8 days for 56 days.</span>
                <span class="lang-block" lang="zh">模拟或计算¹³¹I（t₁/₂ = 8天）的N(t) = N₀ × (½)^(t/8)，从A₀ = 20 mCi开始，每8天计算一次活度，共56天。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — ¹³¹I Decay</span><span class="lang-block" lang="en">Data — ¹³¹I Decay</span><span class="lang-block" lang="zh">数据——¹³¹I衰变</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">เวลา (วัน)</span><span class="lang-block" lang="en">Time (days)</span><span class="lang-block" lang="zh">时间（天）</span></th>
                <th><span class="lang-block" lang="th">จำนวน t₁/₂</span><span class="lang-block" lang="en">No. of t₁/₂</span><span class="lang-block" lang="zh">半衰期数</span></th>
                <th>A (mCi) [calc]</th><th>A (mCi) [sim]</th>
                <th><span class="lang-block" lang="th">ปลอดภัย? (≤1 mCi)</span><span class="lang-block" lang="en">Safe? (≤1 mCi)</span><span class="lang-block" lang="zh">安全？（≤1 mCi）</span></th>
            </tr></thead>
            <tbody>
                <?php foreach([0,8,16,24,32,40,48,56] as $d): ?>
                <tr><td><?= $d ?></td><td><?= $d/8 ?></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">จาก simulation ¹³¹I วันไหนที่กัมมันตภาพลดต่ำกว่า 1 mCi? จงระบุจำนวน half-lives ที่ต้องการ และอธิบายว่าโรงพยาบาลต้องจัดการของเสียจาก ¹³¹I อย่างไร</span><span class="lang-block" lang="en">From ¹³¹I simulation, when does activity drop below 1 mCi? How many half-lives needed? Explain hospital ¹³¹I waste management protocols.</span><span class="lang-block" lang="zh">从¹³¹I模拟中，何时活度低于1 mCi？需要多少半衰期？解释医院¹³¹I废物处理方案。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> ตะกอนในทะเลสาบมี ¹⁴C activity = 4.5 dpm/gC (ทุกวันนี้ปกติ = 13.56 dpm/gC, t₁/₂ = 5,730 ปี) จงคำนวณอายุของตะกอนนี้ และอธิบายว่า ¹⁴C dating ช่วยศึกษาประวัติมลพิษทางสิ่งแวดล้อมได้อย่างไร</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Lake sediment has ¹⁴C activity = 4.5 dpm/gC (modern = 13.56 dpm/gC, t₁/₂ = 5,730 yr). Calculate sediment age and explain how ¹⁴C dating helps study pollution history.</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 湖泥沉积物¹⁴C活度 = 4.5 dpm/gC（现代 = 13.56 dpm/gC，t₁/₂ = 5,730年），计算沉积物年龄，解释¹⁴C定年如何研究污染历史。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab11_optics.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 11</span><span class="lang-block" lang="en">Lab 11</span><span class="lang-block" lang="zh">实验11</span></a>
        <a href="../index.php" class="lab-nav-btn next">🏠 <span class="lang-block" lang="th">กลับหน้าหลัก</span><span class="lang-block" lang="en">Home</span><span class="lang-block" lang="zh">返回首页</span></a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
