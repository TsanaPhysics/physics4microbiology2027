<?php $pageTitle='ปฏิบัติการที่ 7-12: พลังงาน-กัมมันตรังสี | Lab 7-12 | 实验7-12'; $basePath='../'; include '../includes/header.php'; ?>
<!-- Lab 7: Energy -->
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">⚡ <span class="lang-block" lang="th">ปฏิบัติการที่ 7</span><span class="lang-block" lang="en">Lab 7</span><span class="lang-block" lang="zh">实验7</span></div>
    <h1><span class="lang-block" lang="th">งานและ<span>พลังงาน</span></span><span class="lang-block" lang="en">Work &amp;<span> Energy</span></span><span class="lang-block" lang="zh">功与<span>能量</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ยืนยันกฎอนุรักษ์พลังงานกับรางลาดเอียง</span><span class="lang-block" lang="en">Verify conservation of energy using inclined track</span><span class="lang-block" lang="zh">用斜面验证能量守恒定律</span></li>
            <li><span class="lang-block" lang="th">วัดพลังงานที่ใช้ใน fermentation ของยีสต์</span><span class="lang-block" lang="en">Measure energy from yeast fermentation (CO₂ production)</span><span class="lang-block" lang="zh">测量酵母发酵的能量（CO₂产生量）</span></li>
            <li><span class="lang-block" lang="th">[ENV] คำนวณกำลังงานของกังหันน้ำขนาดเล็ก</span><span class="lang-block" lang="en">[ENV] Calculate power output of a small water turbine</span><span class="lang-block" lang="zh">[ENV] 计算小型水轮机的功率输出</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: กฎอนุรักษ์พลังงานบนราง</span><span class="lang-block" lang="en">Part 1: Conservation of Energy</span><span class="lang-block" lang="zh">第一部分：能量守恒</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ปล่อยลูกบอลบนรางลาดเอียงจากความสูง h ต่างๆ วัดความเร็วที่ฐาน ตรวจสอบ PE = KE</span>
                <span class="lang-block" lang="en">Release ball on inclined track from heights h. Measure speed at base. Verify PE = KE: mgh = ½mv²</span>
                <span class="lang-block" lang="zh">从不同高度h释放球，测量底部速度，验证PE = KE：mgh = ½mv²</span>
            </p></div></div>
        </div>
        <h3><span class="lang-block" lang="th">ตอนที่ 2: การหมักยีสต์</span><span class="lang-block" lang="en">Part 2: Yeast Fermentation Energy</span><span class="lang-block" lang="zh">第二部分：酵母发酵能量</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">ผสมยีสต์ 5 g + น้ำตาล 10 g + น้ำ 100 mL ในขวด วัดปริมาตร CO₂ ที่ผลิตทุก 5 นาที นาน 30 นาที คำนวณ mol CO₂ และพลังงานที่ได้จาก fermentation</span>
                <span class="lang-block" lang="en">Mix yeast 5 g + sugar 10 g + water 100 mL. Measure CO₂ volume every 5 min for 30 min. Calculate mol CO₂ and fermentation energy.</span>
                <span class="lang-block" lang="zh">混合酵母5 g + 蔗糖10 g + 水100 mL。每5分钟测量一次CO₂体积，共30分钟。计算CO₂摩尔数和发酵能量。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — Fermentation</span><span class="lang-block" lang="en">Data Table — Fermentation</span><span class="lang-block" lang="zh">数据表——发酵</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">เวลา (min)</span><span class="lang-block" lang="en">Time (min)</span><span class="lang-block" lang="zh">时间 (min)</span></th>
                <th>V_CO₂ (mL)</th><th>ΔV (mL)</th>
                <th>mol CO₂ (cumulative)</th>
                <th><span class="lang-block" lang="th">พลังงาน (J)</span><span class="lang-block" lang="en">Energy (J)</span><span class="lang-block" lang="zh">能量 (J)</span></th>
            </tr></thead>
            <tbody>
                <?php for($t=0; $t<=30; $t+=5): ?>
                <tr><td><?= $t ?></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">เปรียบเทียบ efficiency ของ fermentation (2 ATP/glucose) กับ aerobic respiration (38 ATP/glucose) คำนวณพลังงานทั้งหมดจาก glucose 10 g</span><span class="lang-block" lang="en">Compare efficiency of fermentation (2 ATP/glucose) vs aerobic respiration (38 ATP/glucose). Calculate total energy from 10 g glucose.</span><span class="lang-block" lang="zh">比较发酵（2 ATP/葡萄糖）与有氧呼吸（38 ATP/葡萄糖）的效率，计算10 g葡萄糖的总能量。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> กังหันน้ำขนาดเล็กยกน้ำ 10 L/s ที่ความสูง 5 m จงคำนวณกำลังงาน ถ้า efficiency = 85% ใช้ไฟฟ้าที่ผลิตได้กี่บ้าน (สมมติบ้านใช้ 200 W)</span><span class="lang-block" lang="en"><strong>[ENV]</strong> A small turbine flows 10 L/s at 5 m head. Calculate power output (85% efficient). How many 200 W homes can it power?</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 小型水轮机以10 L/s流量，5 m水头发电，效率85%，计算功率，可供多少个200 W的家庭用电？</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab06_equilibrium.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 6</span><span class="lang-block" lang="en">Lab 6</span><span class="lang-block" lang="zh">实验6</span></a>
        <a href="lab08_machines.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 8</span><span class="lang-block" lang="en">Lab 8</span><span class="lang-block" lang="zh">实验8</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
