<?php $pageTitle='ปฏิบัติการที่ 5: โมเมนตัม | Lab 5: Momentum | 实验5：动量'; $basePath='../'; include '../includes/header.php'; ?>
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">💥 <span class="lang-block" lang="th">ปฏิบัติการที่ 5</span><span class="lang-block" lang="en">Lab 5</span><span class="lang-block" lang="zh">实验5</span></div>
    <h1><span class="lang-block" lang="th">โมเมนตัมและ<span>การชน</span></span><span class="lang-block" lang="en">Momentum<span> &amp; Collisions</span></span><span class="lang-block" lang="zh">动量<span>与碰撞</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ยืนยันกฎอนุรักษ์โมเมนตัมด้วย air track</span><span class="lang-block" lang="en">Verify conservation of momentum using air track</span><span class="lang-block" lang="zh">用气垫导轨验证动量守恒定律</span></li>
            <li><span class="lang-block" lang="th">วัด Coefficient of Restitution (e) สำหรับการชนประเภทต่างๆ</span><span class="lang-block" lang="en">Measure Coefficient of Restitution (e) for different collision types</span><span class="lang-block" lang="zh">测量不同碰撞类型的恢复系数（e）</span></li>
            <li><span class="lang-block" lang="th">[ENV] วิเคราะห์แรงกระแทกของน้ำใน Water Hammer</span><span class="lang-block" lang="en">[ENV] Analyze water hammer impulse forces</span><span class="lang-block" lang="zh">[ENV] 分析水锤冲击力</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ตั้ง glider m₁ = 200 g, m₂ = 200 g บน air track วัดความเร็วก่อน-หลังชนด้วย photogate timer ทำทั้งการชนแบบ completely inelastic (ติดกัน) และ elastic (สปริง)</span>
                <span class="lang-block" lang="en">Set gliders m₁ = 200 g, m₂ = 200 g on air track. Measure pre/post-collision velocity with photogate. Test both completely inelastic (velcro) and elastic (spring) collisions.</span>
                <span class="lang-block" lang="zh">气垫导轨设m₁ = 200 g，m₂ = 200 g，用光电门计时器测碰撞前后速度。测试完全非弹性（粘合）和弹性（弹簧）碰撞。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล</span><span class="lang-block" lang="en">Data Table</span><span class="lang-block" lang="zh">数据记录表</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">ประเภทการชน</span><span class="lang-block" lang="en">Collision Type</span><span class="lang-block" lang="zh">碰撞类型</span></th>
                <th>v₁ (m/s)</th><th>v₁' (m/s)</th><th>v₂' (m/s)</th>
                <th>p_before</th><th>p_after</th><th>%Δp</th><th>e</th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">ไม่ยืดหยุ่นสมบูรณ์</span><span class="lang-block" lang="en">Completely Inelastic</span><span class="lang-block" lang="zh">完全非弹性</span></td>
                <td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">ยืดหยุ่น</span><span class="lang-block" lang="en">Elastic</span><span class="lang-block" lang="zh">弹性</span></td>
                <td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">เปรียบเทียบ p_before กับ p_after ทั้งสองกรณี และอธิบายว่าพลังงานจลน์เปลี่ยนแปลงอย่างไร</span><span class="lang-block" lang="en">Compare p_before and p_after for both cases. Explain how kinetic energy changes.</span><span class="lang-block" lang="zh">比较两种情况的碰前和碰后动量，解释动能如何变化。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> ท่อน้ำ d = 5 cm ไหล v = 2 m/s ปิดวาล์วกะทันหัน ประมาณแรงดันเพิ่มขึ้น ΔP = ρcv (c = ความเร็วเสียงในน้ำ 1480 m/s) และอธิบายผลกระทบต่อระบบท่อ</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Water pipe d = 5 cm, v = 2 m/s, suddenly closed. Estimate pressure surge ΔP = ρcv (c = 1480 m/s). Explain effects on pipe system.</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 水管d = 5 cm，v = 2 m/s，突然关闭，估算压强增量ΔP = ρcv（c = 1480 m/s），解释对管道系统的影响。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab04_newton.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 4</span><span class="lang-block" lang="en">Lab 4</span><span class="lang-block" lang="zh">实验4</span></a>
        <a href="lab06_equilibrium.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 6</span><span class="lang-block" lang="en">Lab 6</span><span class="lang-block" lang="zh">实验6</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
