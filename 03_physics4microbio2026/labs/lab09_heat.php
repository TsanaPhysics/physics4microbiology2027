<?php $pageTitle='ปฏิบัติการที่ 9: ความร้อน | Lab 9: Heat & Thermodynamics | 实验9：热力学'; $basePath='../'; include '../includes/header.php'; ?>
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">🌡️ <span class="lang-block" lang="th">ปฏิบัติการที่ 9</span><span class="lang-block" lang="en">Lab 9</span><span class="lang-block" lang="zh">实验9</span></div>
    <h1><span class="lang-block" lang="th">ความร้อนและ<span>การฆ่าเชื้อ</span></span><span class="lang-block" lang="en">Heat &amp;<span> Sterilization Kinetics</span></span><span class="lang-block" lang="zh">热量<span>与灭菌动力学</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ศึกษาการถ่ายเทความร้อนและวัดค่า specific heat ของน้ำ</span><span class="lang-block" lang="en">Study heat transfer and measure specific heat of water</span><span class="lang-block" lang="zh">研究热传递并测量水的比热容</span></li>
            <li><span class="lang-block" lang="th">ทดสอบ D-value ของการฆ่าเชื้อด้วยความร้อน (thermal inactivation curve)</span><span class="lang-block" lang="en">Test D-value of thermal sterilization (thermal inactivation curve)</span><span class="lang-block" lang="zh">测试热灭菌的D值（热灭活曲线）</span></li>
            <li><span class="lang-block" lang="th">[ENV] ศึกษาประสิทธิภาพการฆ่าเชื้อน้ำด้วย chlorine ที่อุณหภูมิต่างๆ</span><span class="lang-block" lang="en">[ENV] Study chlorine water disinfection efficiency at different temperatures</span><span class="lang-block" lang="zh">[ENV] 研究不同温度下氯消毒效率</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Newton's Cooling Law</span><span class="lang-block" lang="en">Part 1: Newton's Law of Cooling</span><span class="lang-block" lang="zh">第一部分：牛顿冷却定律</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ต้มน้ำ 200 mL ถึง 80°C แล้ววัดอุณหภูมิทุก 1 นาที นาน 20 นาที วาดกราฟ T vs t ตรวจสอบ T(t) = T_env + (T₀-T_env)e^(-kt)</span>
                <span class="lang-block" lang="en">Heat 200 mL water to 80°C, measure T every minute for 20 min. Plot T vs t, verify T(t) = T_env + (T₀-T_env)e^(-kt)</span>
                <span class="lang-block" lang="zh">将200 mL水加热至80°C，每分钟记录温度，共20分钟。绘制T与t的图像，验证T(t) = T_env + (T₀-T_env)e^(-kt)</span>
            </p></div></div>
        </div>
        <h3><span class="lang-block" lang="th">ตอนที่ 2: Thermal Inactivation ของแบคทีเรีย</span><span class="lang-block" lang="en">Part 2: Bacterial Thermal Inactivation</span><span class="lang-block" lang="zh">第二部分：细菌热灭活</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เตรียม suspension ของ E. coli นำไปอุ่นที่ 65°C และเก็บตัวอย่าง t = 0, 2, 4, 6, 8 min นำไปทำ serial dilution และ plate count วาดกราฟ log₁₀ N vs t หา D-value</span>
                <span class="lang-block" lang="en">Prepare E. coli suspension. Heat at 65°C. Sample at t = 0, 2, 4, 6, 8 min. Serial dilute & plate count. Plot log₁₀ N vs t. Calculate D-value.</span>
                <span class="lang-block" lang="zh">制备E. coli悬液，在65°C加热，在t = 0、2、4、6、8 min取样，梯度稀释后平板计数，绘制log₁₀ N与t的图像，计算D值。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — Thermal Inactivation</span><span class="lang-block" lang="en">Data — Thermal Inactivation</span><span class="lang-block" lang="zh">数据——热灭活</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">เวลา t (min)</span><span class="lang-block" lang="en">Time t (min)</span><span class="lang-block" lang="zh">时间 t (min)</span></th>
                <th><span class="lang-block" lang="th">จำนวน N (CFU/mL)</span><span class="lang-block" lang="en">N (CFU/mL)</span><span class="lang-block" lang="zh">N (CFU/mL)</span></th>
                <th>log₁₀ N</th>
            </tr></thead>
            <tbody>
                <?php foreach([0,2,4,6,8] as $min): ?>
                <tr><td><?= $min ?></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <?php endforeach; ?>
                <tr><td colspan="2"><strong>D-value =</strong></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">จาก D-value ที่ได้ที่ 65°C และ Z-value = 7°C จงคำนวณ D-value ที่ 72°C และ 80°C แล้วระบุว่าต้องใช้เวลานานแค่ไหนที่แต่ละอุณหภูมิเพื่อ 12D sterilization</span><span class="lang-block" lang="en">Using D-value at 65°C and Z = 7°C, calculate D at 72°C and 80°C. Determine 12D sterilization time at each temperature.</span><span class="lang-block" lang="zh">已知65°C的D值和Z = 7°C，计算72°C和80°C的D值，确定各温度12D灭菌所需时间。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> อธิบาย Chick-Watson Law: log(N/N₀) = -k·C·t (k = constant, C = chlorine conc, t = time) และคำนวณ contact time ที่ต้องการเพื่อ 4-log reduction ด้วย 1 mg/L chlorine (k = 0.5 L/mg·min)</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Explain Chick-Watson Law: log(N/N₀) = -k·C·t, and calculate required contact time for 4-log reduction with 1 mg/L chlorine (k = 0.5 L/mg·min).</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 解释Chick-Watson定律：log(N/N₀) = -k·C·t，计算1 mg/L氯（k = 0.5 L/mg·min）实现4-log灭活所需的接触时间。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab08_machines.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 8</span><span class="lang-block" lang="en">Lab 8</span><span class="lang-block" lang="zh">实验8</span></a>
        <a href="lab10_electricity.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 10</span><span class="lang-block" lang="en">Lab 10</span><span class="lang-block" lang="zh">实验10</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
