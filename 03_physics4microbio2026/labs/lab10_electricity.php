<?php $pageTitle='ปฏิบัติการที่ 10-12: ไฟฟ้า ทัศนศาสตร์ กัมมันตรังสี'; $basePath='../'; include '../includes/header.php'; ?>

<!-- Lab 10: Electricity -->
<section class="lab-hero"><div class="lab-hero-content">
    <div class="lab-badge">⚡ <span class="lang-block" lang="th">ปฏิบัติการที่ 10</span><span class="lang-block" lang="en">Lab 10</span><span class="lang-block" lang="zh">实验10</span></div>
    <h1><span class="lang-block" lang="th">ไฟฟ้าและ<span>Electrophoresis</span></span><span class="lang-block" lang="en">Electricity &amp;<span> Electrophoresis</span></span><span class="lang-block" lang="zh">电学与<span>电泳</span></span></h1>
</div></section>
<div class="lab-content">
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li><span class="lang-block" lang="th">ทดสอบกฎของโอห์มด้วย digital multimeter และวัดความต้านทาน</span><span class="lang-block" lang="en">Verify Ohm's Law using digital multimeter and measure resistance</span><span class="lang-block" lang="zh">用数字万用表验证欧姆定律并测量电阻</span></li>
            <li><span class="lang-block" lang="th">ทดสอบ Agarose gel electrophoresis ด้วย DNA ladder</span><span class="lang-block" lang="en">Perform agarose gel electrophoresis with DNA ladder</span><span class="lang-block" lang="zh">用DNA梯带进行琼脂糖凝胶电泳</span></li>
            <li><span class="lang-block" lang="th">[ENV] วัด conductivity ของน้ำตัวอย่างและเปรียบเทียบมาตรฐาน</span><span class="lang-block" lang="en">[ENV] Measure water conductivity and compare with standards</span><span class="lang-block" lang="zh">[ENV] 测量水样电导率并与标准比较</span></li>
        </ul>
    </div>
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำ</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>
        <h3><span class="lang-block" lang="th">ตอนที่ 1: Gel Electrophoresis DNA Separation</span><span class="lang-block" lang="en">Part 1: DNA Gel Electrophoresis</span><span class="lang-block" lang="zh">第一部分：DNA凝胶电泳</span></h3>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เตรียม 1% agarose gel ใน TAE buffer โหลด DNA ladder + ตัวอย่าง 3 ชนิด วิ่ง electrophoresis 80 V 45 นาที ย้อมด้วย ethidium bromide หรือ SYBR Safe และถ่ายภาพ UV<br>วัดระยะการเคลื่อนที่ของแต่ละ band สร้างกราฟ log(bp) vs distance เพื่อหาขนาด DNA</span>
                <span class="lang-block" lang="en">Prepare 1% agarose gel in TAE buffer. Load DNA ladder + 3 samples. Run at 80 V for 45 min. Stain (SYBR Safe) and UV photograph.<br>Measure band distances, plot log(bp) vs distance to determine DNA sizes.</span>
                <span class="lang-block" lang="zh">在TAE缓冲液中制备1%琼脂糖凝胶，加载DNA梯带+3个样品，80 V电泳45分钟，用SYBR Safe染色并UV拍照。<br>测量各条带迁移距离，绘制log(bp)与距离的图像以确定DNA大小。</span>
            </p></div></div>
        </div>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล</span><span class="lang-block" lang="en">Data Table</span><span class="lang-block" lang="zh">数据记录表</span></h2>
        <table class="data-table">
            <thead><tr>
                <th>Band</th><th>Size (bp)</th>
                <th><span class="lang-block" lang="th">ระยะ Migration (cm)</span><span class="lang-block" lang="en">Migration (cm)</span><span class="lang-block" lang="zh">迁移距离 (cm)</span></th>
                <th>log(bp)</th>
            </tr></thead>
            <tbody>
                <tr><td>Ladder 1</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>Ladder 2</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>Sample A</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>Sample B</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล — Water Conductivity [ENV]</span><span class="lang-block" lang="en">Data Table — Water Conductivity [ENV]</span><span class="lang-block" lang="zh">数据——水导电率 [ENV]</span></h2>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">ตัวอย่างน้ำ</span><span class="lang-block" lang="en">Water Sample</span><span class="lang-block" lang="zh">水样</span></th>
                <th>pH</th><th>Conductivity (μS/cm)</th><th>TDS (mg/L)</th>
                <th><span class="lang-block" lang="th">ประเมิน</span><span class="lang-block" lang="en">Assessment</span><span class="lang-block" lang="zh">评估</span></th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">น้ำประปา</span><span class="lang-block" lang="en">Tap water</span><span class="lang-block" lang="zh">自来水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">น้ำกลั่น</span><span class="lang-block" lang="en">Distilled water</span><span class="lang-block" lang="zh">蒸馏水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">น้ำเสียจำลอง</span><span class="lang-block" lang="en">Simulated wastewater</span><span class="lang-block" lang="zh">模拟废水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถาม</span><span class="lang-block" lang="en">Questions</span><span class="lang-block" lang="zh">问题</span></h2>
        <div class="lab-questions"><ol>
            <li><span class="lang-block" lang="th">จาก gel ถ่าย UV จงวิเคราะห์ขนาดของ DNA ในตัวอย่าง A และ B</span><span class="lang-block" lang="en">From the UV gel image, determine the DNA size in samples A and B.</span><span class="lang-block" lang="zh">从UV凝胶图像中确定样品A和B中的DNA大小。</span></li>
            <li><span class="lang-block" lang="th"><strong>[ENV]</strong> น้ำ conductivity &gt;500 μS/cm ถือว่ามีของละลายสูง เปรียบเทียบผลการวัดกับ WHO drinking water standard (TDS ≤ 500 mg/L) และอธิบายผลกระทบต่อระบบนิเวศ</span><span class="lang-block" lang="en"><strong>[ENV]</strong> Compare measured conductivity with WHO standard (TDS ≤ 500 mg/L). Discuss ecological impacts of high TDS.</span><span class="lang-block" lang="zh"><strong>[ENV]</strong> 将测量电导率与WHO标准（TDS ≤ 500 mg/L）比较，讨论高TDS对生态系统的影响。</span></li>
        </ol></div>
    </div>
    <nav class="lab-nav">
        <a href="lab09_heat.php" class="lab-nav-btn">← <span class="lang-block" lang="th">ปฏิบัติการที่ 9</span><span class="lang-block" lang="en">Lab 9</span><span class="lang-block" lang="zh">实验9</span></a>
        <a href="lab11_optics.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 11</span><span class="lang-block" lang="en">Lab 11</span><span class="lang-block" lang="zh">实验11</span> →</a>
    </nav>
</div>
<?php include '../includes/footer.php'; ?>
