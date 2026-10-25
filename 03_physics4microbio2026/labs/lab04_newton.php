<?php
$pageTitle = 'ปฏิบัติการที่ 4: กฎนิวตัน | Lab 4: Newton\'s Laws | 实验4：牛顿定律';
$basePath = '../';
include '../includes/header.php';
?>
<section class="lab-hero">
    <div class="lab-hero-content">
        <div class="lab-badge">⚖️ <span class="lang-block" lang="th">ปฏิบัติการที่ 4</span><span class="lang-block" lang="en">Lab 4</span><span class="lang-block" lang="zh">实验4</span></div>
        <h1>
            <span class="lang-block" lang="th">กฎการเคลื่อนที่<span>ของนิวตันและ RCF</span></span>
            <span class="lang-block" lang="en">Newton's Laws<span> &amp; Centrifuge RCF</span></span>
            <span class="lang-block" lang="zh">牛顿定律<span>与离心机RCF</span></span>
        </h1>
    </div>
</section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ยืนยัน F = ma โดยใช้ Atwood Machine</span><span class="lang-block" lang="en">Verify F = ma using Atwood Machine</span><span class="lang-block" lang="zh">用阿特伍德机验证F = ma</span></li>
            <li><span class="lang-block" lang="th">คำนวณ RCF ของ centrifuge และตรวจสอบหลักการแยกชีวโมเลกุล</span><span class="lang-block" lang="en">Calculate centrifuge RCF and verify biomolecule separation principles</span><span class="lang-block" lang="zh">计算离心机RCF并验证生物分子分离原理</span></li>
            <li><span class="lang-block" lang="th">คำนวณแรงดันในระบบปั๊มน้ำ (ENV)</span><span class="lang-block" lang="en">Calculate pressure forces in water pump systems (ENV)</span><span class="lang-block" lang="zh">计算水泵系统中的压力（ENV）</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Atwood Machine</span><span class="lang-block" lang="en">Part 1: Atwood Machine</span><span class="lang-block" lang="zh">第一部分：阿特伍德机</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ตั้งค่า m₁ = 100 g, m₂ = 120 g บนรอก จับเวลาที่ m₂ ตกระยะ 50 cm คำนวณ a_exp แล้วเปรียบเทียบกับ a_theory = (m₂-m₁)g/(m₁+m₂)</span>
                <span class="lang-block" lang="en">Set m₁ = 100 g, m₂ = 120 g on pulley. Time m₂ falling 50 cm. Compare a_exp with a_theory = (m₂-m₁)g/(m₁+m₂)</span>
                <span class="lang-block" lang="zh">设m₁ = 100 g，m₂ = 120 g在滑轮上。计时m₂下落50 cm，比较a_exp与a_theory = (m₂-m₁)g/(m₁+m₂)</span>
            </p></div></div>
        </div>
        <h3><span class="lang-block" lang="th">ตอนที่ 2: คำนวณ RCF Centrifuge</span><span class="lang-block" lang="en">Part 2: Centrifuge RCF Calculation</span><span class="lang-block" lang="zh">第二部分：离心机RCF计算</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">จดบันทึก rpm และ radius จาก centrifuge ในห้องปฏิบัติการ 3 รุ่น คำนวณ RCF = 1.118×10⁻⁵×n²×r และระบุชนิดของส่วนประกอบที่สามารถแยกได้</span>
                <span class="lang-block" lang="en">Record rpm and radius of 3 lab centrifuge models. Calculate RCF = 1.118×10⁻⁵×n²×r and identify separable cell components.</span>
                <span class="lang-block" lang="zh">记录3台实验室离心机的rpm和半径，计算RCF = 1.118×10⁻⁵×n²×r，并确定可分离的细胞成分。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — RCF</span><span class="lang-block" lang="en">Data Table — RCF</span><span class="lang-block" lang="zh">数据表——RCF</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">Centrifuge</span><span class="lang-block" lang="en">Centrifuge</span><span class="lang-block" lang="zh">离心机</span></th>
                <th>rpm (n)</th><th>r (cm)</th><th>RCF (×g)</th>
                <th><span class="lang-block" lang="th">แยกได้</span><span class="lang-block" lang="en">Separates</span><span class="lang-block" lang="zh">可分离</span></th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">รุ่น A (Low-speed)</span><span class="lang-block" lang="en">Model A (Low)</span><span class="lang-block" lang="zh">型号A（低速）</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">รุ่น B (High-speed)</span><span class="lang-block" lang="en">Model B (High)</span><span class="lang-block" lang="zh">型号B（高速）</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">รุ่น C (Micro)</span><span class="lang-block" lang="en">Model C (Micro)</span><span class="lang-block" lang="zh">型号C（微量）</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถามท้ายปฏิบัติการ</span><span class="lang-block" lang="en">Post-Lab Questions</span><span class="lang-block" lang="zh">实验后问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">ระบุชนิด centrifuge ที่เหมาะสมในการแยก (a) เม็ดเลือดแดง (b) ไมโตคอนเดรีย (c) ไรโบโซม พร้อมอ้างอิง RCF ที่ต้องการ</span><span class="lang-block" lang="en">Identify appropriate centrifuge for separating (a) red blood cells (b) mitochondria (c) ribosomes, with required RCF values.</span><span class="lang-block" lang="zh">确定分离(a)红细胞 (b)线粒体 (c)核糖体适用的离心机，并给出所需RCF值。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> ปั๊มน้ำยกน้ำสูง h = 15 m ใช้ท่อ A = 0.01 m² ที่ Q = 0.05 m³/s จงคำนวณแรงดันที่ต้องการ (P = ρgh + ½ρv²) และกำลังมอเตอร์ที่ต้องใช้ (η = 80%)</span><span class="lang-block" lang="en"><strong>[ENV]</strong> A pump lifts water h = 15 m through pipe A = 0.01 m² at Q = 0.05 m³/s. Calculate required pressure (P = ρgh + ½ρv²) and motor power needed (η = 80%).</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 水泵将水提升h = 15 m，管道A = 0.01 m²，Q = 0.05 m³/s，计算所需压力（P = ρgh + ½ρv²）和电机功率（η = 80%）。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab03_motion.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 3</span><span class="lang-block" lang="en">Lab 3</span><span class="lang-block" lang="zh">实验3</span></a>
        <a href="lab05_momentum.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 5</span><span class="lang-block" lang="en">Lab 5</span><span class="lang-block" lang="zh">实验5</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
