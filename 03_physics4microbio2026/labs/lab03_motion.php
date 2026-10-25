<?php
$pageTitle = 'ปฏิบัติการที่ 3: การเคลื่อนที่ | Lab 3: Motion | 实验3：运动';
$basePath = '../';
include '../includes/header.php';
?>
<section class="lab-hero">
    <div class="lab-hero-content">
        <div class="lab-badge">🏃 <span class="lang-block" lang="th">ปฏิบัติการที่ 3</span><span class="lang-block" lang="en">Lab 3</span><span class="lang-block" lang="zh">实验3</span></div>
        <h1>
            <span class="lang-block" lang="th">การเคลื่อนที่<span>และการตกตะกอน</span></span>
            <span class="lang-block" lang="en">Motion<span> &amp; Sedimentation</span></span>
            <span class="lang-block" lang="zh">运动<span>与沉降</span></span>
        </h1>
    </div>
</section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">วัดความเร่งจากการทดลองบนรางอากาศ / timer</span><span class="lang-block" lang="en">Measure acceleration using air track or timer experiment</span><span class="lang-block" lang="zh">用气垫导轨或计时器测量加速度</span></li>
            <li><span class="lang-block" lang="th">คำนวณและวัด terminal velocity ของลูกบอลในของเหลว (Stokes)</span><span class="lang-block" lang="en">Calculate and measure terminal velocity of balls in liquid (Stokes)</span><span class="lang-block" lang="zh">计算并测量小球在液体中的终端速度（斯托克斯）</span></li>
            <li><span class="lang-block" lang="th">ออกแบบบ่อตกตะกอนอย่างง่ายสำหรับ TSS (ENV)</span><span class="lang-block" lang="en">Design a simple settling tank for TSS (ENV)</span><span class="lang-block" lang="zh">为TSS设计简单沉淀池（ENV）</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Terminal Velocity ด้วย Stokes' Law</span><span class="lang-block" lang="en">Part 1: Terminal Velocity (Stokes' Law)</span><span class="lang-block" lang="zh">第一部分：终端速度（斯托克斯定律）</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">วัดเส้นผ่านศูนย์กลางของลูกบอล 3 ขนาด (เล็ก, กลาง, ใหญ่) ด้วย vernier caliper</span>
                <span class="lang-block" lang="en">Measure diameter of 3 ball sizes (small, medium, large) with vernier caliper</span>
                <span class="lang-block" lang="zh">用游标卡尺测量3种大小球的直径（小、中、大）</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ปล่อยลูกบอลในกระบอกใส่กลีเซอรีน จับเวลาที่ตกผ่านระยะ 20 cm ในส่วนที่มีความเร็วคงที่</span>
                <span class="lang-block" lang="en">Drop balls in glycerine cylinder. Time passage through 20 cm section at terminal velocity.</span>
                <span class="lang-block" lang="zh">将球放入甘油圆筒，在匀速段计时通过20 cm所需时间。</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">คำนวณ v_terminal และ v_Stokes = 2r²(ρ_p − ρ_m)g/9η แล้วเปรียบเทียบ</span>
                <span class="lang-block" lang="en">Calculate v_terminal and v_Stokes = 2r²(ρ_p − ρ_m)g/9η and compare</span>
                <span class="lang-block" lang="zh">计算v_terminal和v_Stokes = 2r²(ρ_p − ρ_m)g/9η并比较</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล</span><span class="lang-block" lang="en">Data Table</span><span class="lang-block" lang="zh">数据记录表</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">ลูกบอล</span><span class="lang-block" lang="en">Ball</span><span class="lang-block" lang="zh">小球</span></th>
                <th>d (mm)</th><th>r (mm)</th>
                <th><span class="lang-block" lang="th">เวลา (s)</span><span class="lang-block" lang="en">Time (s)</span><span class="lang-block" lang="zh">时间 (s)</span></th>
                <th>v_exp (m/s)</th><th>v_Stokes (m/s)</th><th>%Error</th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">เล็ก</span><span class="lang-block" lang="en">Small</span><span class="lang-block" lang="zh">小</span></td>
                <td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">กลาง</span><span class="lang-block" lang="en">Medium</span><span class="lang-block" lang="zh">中</span></td>
                <td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">ใหญ่</span><span class="lang-block" lang="en">Large</span><span class="lang-block" lang="zh">大</span></td>
                <td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถามท้ายปฏิบัติการ</span><span class="lang-block" lang="en">Post-Lab Questions</span><span class="lang-block" lang="zh">实验后问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">จากกราฟ v_Stokes vs r² ควรได้ graph ลักษณะใด? Slope หมายความว่าอะไร?</span><span class="lang-block" lang="en">From v_Stokes vs r² graph, what shape is expected? What does the slope represent?</span><span class="lang-block" lang="zh">从v_Stokes与r²的图像应呈什么形状？斜率代表什么？</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> ออกแบบบ่อตกตะกอนสำหรับ Q = 500 m³/day กำหนด overflow rate 25 m³/m²·day จงคำนวณพื้นที่บ่อที่ต้องการ</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Design a settling tank for Q = 500 m³/day with overflow rate 25 m³/m²·day. Calculate required tank area.</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 为Q = 500 m³/天设计沉淀池，溢流率25 m³/m²·天，计算所需水池面积。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab02_vectors.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 2</span><span class="lang-block" lang="en">Lab 2</span><span class="lang-block" lang="zh">实验2</span></a>
        <a href="lab04_newton.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 4</span><span class="lang-block" lang="en">Lab 4</span><span class="lang-block" lang="zh">实验4</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
