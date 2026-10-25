<?php $pageTitle='ปฏิบัติการที่ 11: ทัศนศาสตร์ | Lab 11: Optics & Spectrophotometry | 实验11：光学与分光光度法'; $basePath='../'; include '../includes/header.php'; ?>
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">🔭 <span class="lang-block" lang="th">ปฏิบัติการที่ 11</span><span class="lang-block" lang="en">Lab 11</span><span class="lang-block" lang="zh">实验11</span></div>
    <h1><span class="lang-block" lang="th">ทัศนศาสตร์และ<span>Spectrophotometry</span></span><span class="lang-block" lang="en">Optics &amp;<span> Spectrophotometry</span></span><span class="lang-block" lang="zh">光学与<span>分光光度法</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ทดสอบกฎการหักเหของ Snell ด้วยแผ่น acrylic</span><span class="lang-block" lang="en">Verify Snell's law using acrylic glass</span><span class="lang-block" lang="zh">用亚克力板验证斯涅尔定律</span></li>
            <li><span class="lang-block" lang="th">สร้างเส้นกราฟมาตรฐาน (calibration curve) ด้วย Beer-Lambert law</span><span class="lang-block" lang="en">Build a standard calibration curve using Beer-Lambert law</span><span class="lang-block" lang="zh">用比尔-朗博定律构建标准曲线（校准曲线）</span></li>
            <li><span class="lang-block" lang="th">[ENV] วัด Turbidity (NTU) และ Color ของน้ำตัวอย่างด้วย spectrophotometer</span><span class="lang-block" lang="en">[ENV] Measure turbidity (NTU) and color of water samples with spectrophotometer</span><span class="lang-block" lang="zh">[ENV] 用分光光度计测量水样的浊度（NTU）和颜色</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Standard Curve (Protein Assay)</span><span class="lang-block" lang="en">Part 1: Standard Curve (Protein Assay)</span><span class="lang-block" lang="zh">第一部分：标准曲线（蛋白质测定）</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เตรียมสาร BSA ความเข้มข้น 0, 0.2, 0.4, 0.6, 0.8, 1.0 mg/mL วัด Absorbance ที่ λ = 595 nm ด้วย Bradford reagent วาดกราฟ A vs c (standard curve) แล้วหาความเข้มข้นของตัวอย่างไม่ทราบค่า</span>
                <span class="lang-block" lang="en">Prepare BSA solutions at 0, 0.2, 0.4, 0.6, 0.8, 1.0 mg/mL. Measure Absorbance at 595 nm with Bradford reagent. Plot A vs c, use curve to find unknown sample concentration.</span>
                <span class="lang-block" lang="zh">制备BSA溶液0、0.2、0.4、0.6、0.8、1.0 mg/mL，用Bradford试剂在595 nm测量吸光度，绘制A与c的标准曲线，求未知样品浓度。</span>
            </p></div></div>
        </div>
        <h3><span class="lang-block" lang="th">ตอนที่ 2: วัด OD₆₀₀ ของแบคทีเรีย</span><span class="lang-block" lang="en">Part 2: Bacterial Growth (OD₆₀₀)</span><span class="lang-block" lang="zh">第二部分：细菌生长测定（OD₆₀₀）</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เพาะเลี้ยง E. coli ใน broth วัด OD₆₀₀ ทุก 30 นาที สร้างกราฟ growth curve และระบุ lag phase, log phase, stationary phase</span>
                <span class="lang-block" lang="en">Culture E. coli in broth, measure OD₆₀₀ every 30 min. Plot growth curve, identify lag, log, and stationary phases.</span>
                <span class="lang-block" lang="zh">在培养液中培养E. coli，每30分钟测量OD₆₀₀，绘制生长曲线，识别延滞期、对数期和稳定期。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — Standard Curve BSA</span><span class="lang-block" lang="en">Data — BSA Standard Curve</span><span class="lang-block" lang="zh">数据——BSA标准曲线</span></h2>
        <table class="data-table">
            <thead><tr>
                <th>C_BSA (mg/mL)</th><th>A₅₉₅ (rep 1)</th><th>A₅₉₅ (rep 2)</th><th>A₅₉₅ (mean)</th>
            </tr></thead>
            <tbody>
                <?php foreach([0, 0.2, 0.4, 0.6, 0.8, 1.0] as $c): ?>
                <tr><td><?= $c ?></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <?php endforeach; ?>
                <tr><td><strong><span class="lang-block" lang="th">ตัวอย่างไม่ทราบ</span><span class="lang-block" lang="en">Unknown</span><span class="lang-block" lang="zh">未知样品</span></strong></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">จาก standard curve จงคำนวณ extinction coefficient (ε) ที่ 595 nm และความเข้มข้นของ unknown sample</span><span class="lang-block" lang="en">From the standard curve, calculate extinction coefficient (ε) at 595 nm and concentration of unknown sample.</span><span class="lang-block" lang="zh">从标准曲线计算595 nm的消光系数（ε）和未知样品的浓度。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> น้ำประปาวัด Turbidity = 8 NTU (WHO limit = 4 NTU) และ UV₂₅₄ = 0.15 cm⁻¹ อธิบายว่าค่าเหล่านี้บ่งบอกถึงอะไร และกระบวนการบำบัดใดที่เหมาะสมในการลดค่า turbidity ก่อนการฆ่าเชื้อด้วย UV</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Tap water has Turbidity = 8 NTU (WHO limit = 4 NTU) and UV₂₅₄ = 0.15 cm⁻¹. What do these indicate and what treatment reduces turbidity before UV disinfection?</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 自来水浊度8 NTU（WHO限值4 NTU），UV₂₅₄ = 0.15 cm⁻¹。这些数值说明什么？UV消毒前应采用何种处理降低浊度？</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab10_electricity.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 10</span><span class="lang-block" lang="en">Lab 10</span><span class="lang-block" lang="zh">实验10</span></a>
        <a href="lab12_radioactivity.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 12</span><span class="lang-block" lang="en">Lab 12</span><span class="lang-block" lang="zh">实验12</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
