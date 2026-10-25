<?php
$pageTitle = 'ปฏิบัติการที่ 1: การวัดและเลขนัยสำคัญ | Lab 1: Measurement | 实验1：测量与有效数字';
$basePath = '../';
include '../includes/header.php';
?>

<section class="lab-hero">
    <div class="lab-hero-content">
        <div class="lab-badge">🧪 <span class="lang-block" lang="th">ปฏิบัติการที่ 1</span><span class="lang-block" lang="en">Lab 1</span><span class="lang-block" lang="zh">实验1</span></div>
        <h1>
            <span class="lang-block" lang="th">การวัดและ<span>เลขนัยสำคัญ</span></span>
            <span class="lang-block" lang="en">Measurement &amp; <span>Significant Figures</span></span>
            <span class="lang-block" lang="zh">测量与<span>有效数字</span></span>
        </h1>
        <div class="hero-trilingual">
            <span class="th">🇹🇭 การวัด เลขนัยสำคัญ และขนาดโคโลนี</span>
            <span class="en">🇬🇧 Measurement, Significant Figures &amp; Colony Sizing</span>
            <span class="zh">🇨🇳 测量、有效数字与菌落大小</span>
        </div>
    </div>
</section>

<div class="lab-content">

    <!-- Objectives — Trilingual -->
    <div class="lab-section">
        <h2>🎯 <span class="lang-block" lang="th">วัตถุประสงค์</span><span class="lang-block" lang="en">Objectives</span><span class="lang-block" lang="zh">实验目标</span></h2>
        <ul class="lab-objectives">
            <li>
                <span class="lang-block" lang="th">ใช้เครื่องมือวัด (ไม้บรรทัด เวอร์เนียร์คาลิเปอร์ ไมโครมิเตอร์) ได้อย่างถูกต้อง</span>
                <span class="lang-block" lang="en">Correctly use measuring instruments (ruler, vernier caliper, micrometer)</span>
                <span class="lang-block" lang="zh">正确使用测量仪器（直尺、游标卡尺、千分尺）</span>
            </li>
            <li>
                <span class="lang-block" lang="th">รายงานผลการวัดพร้อมเลขนัยสำคัญที่ถูกต้อง</span>
                <span class="lang-block" lang="en">Report measurements with correct number of significant figures</span>
                <span class="lang-block" lang="zh">用正确的有效数字报告测量结果</span>
            </li>
            <li>
                <span class="lang-block" lang="th">คำนวณความคลาดเคลื่อนสัมบูรณ์และสัมพัทธ์ได้</span>
                <span class="lang-block" lang="en">Calculate absolute and relative error</span>
                <span class="lang-block" lang="zh">计算绝对误差和相对误差</span>
            </li>
            <li>
                <span class="lang-block" lang="th">วัดขนาดโคโลนีจุลินทรีย์บนจานเพาะเชื้อได้</span>
                <span class="lang-block" lang="en">Measure microbial colony sizes on Petri dishes</span>
                <span class="lang-block" lang="zh">测量培养皿上微生物菌落的大小</span>
            </li>
            <li>
                <span class="lang-block" lang="th">วัดค่าความขุ่น (NTU) และเปรียบเทียบกับมาตรฐานน้ำ (สำหรับสิ่งแวดล้อม)</span>
                <span class="lang-block" lang="en">Measure turbidity (NTU) and compare with water quality standards (environmental track)</span>
                <span class="lang-block" lang="zh">测量浊度（NTU）并与水质标准比较（环境科学方向）</span>
            </li>
        </ul>
    </div>

    <!-- Theory — Trilingual -->
    <div class="lab-section">
        <h2>📖 <span class="lang-block" lang="th">ทฤษฎีที่เกี่ยวข้อง</span><span class="lang-block" lang="en">Relevant Theory</span><span class="lang-block" lang="zh">相关理论</span></h2>

        <div class="lang-block" lang="th">
            <p>การวัดเป็นพื้นฐานของวิทยาศาสตร์ทุกสาขา ในจุลชีววิทยา การวัดที่แม่นยำมีความสำคัญอย่างยิ่ง เช่น การวัดปริมาตรอาหารเลี้ยงเชื้อ การวัดขนาดโคโลนี และการนับจำนวนเซลล์ ในวิทยาศาสตร์สิ่งแวดล้อม การวัดค่า BOD, COD, ความขุ่น และ pH ต้องมีความแม่นยำเพื่อประเมินคุณภาพน้ำ</p>
        </div>
        <div class="lang-block" lang="en">
            <p>Measurement is the foundation of all sciences. In microbiology, precise measurement is critical for culture media volumes, colony sizing, and cell counting. In environmental science, accurate BOD, COD, turbidity, and pH measurements are essential for water quality assessment.</p>
        </div>
        <div class="lang-block" lang="zh">
            <p>测量是所有科学的基础。在微生物学中，精确测量对于培养基体积、菌落大小和细胞计数至关重要。在环境科学中，精确的BOD、COD、浊度和pH测量对水质评估必不可少。</p>
        </div>

        <!-- Dual-track theory -->
        <div class="dual-track">
            <div class="track-card micro-track">
                <div class="track-card-title">🔬 <span class="lang-block" lang="th">เลขนัยสำคัญ</span><span class="lang-block" lang="en">Significant Figures</span><span class="lang-block" lang="zh">有效数字</span></div>
                <div class="lang-block" lang="th">
                    <ul>
                        <li>0.0025 → <strong>2</strong> ตัวนัยสำคัญ</li>
                        <li>1.005 → <strong>4</strong> ตัวนัยสำคัญ</li>
                        <li>2.50  → <strong>3</strong> ตัวนัยสำคัญ</li>
                    </ul>
                </div>
                <div class="lang-block" lang="en">
                    <ul>
                        <li>0.0025 → <strong>2</strong> significant figures</li>
                        <li>1.005 → <strong>4</strong> significant figures</li>
                        <li>2.50  → <strong>3</strong> significant figures</li>
                    </ul>
                </div>
                <div class="lang-block" lang="zh">
                    <ul>
                        <li>0.0025 → <strong>2</strong>位有效数字</li>
                        <li>1.005 → <strong>4</strong>位有效数字</li>
                        <li>2.50  → <strong>3</strong>位有效数字</li>
                    </ul>
                </div>
            </div>
            <div class="track-card env-track">
                <div class="track-card-title">🌍 <span class="lang-block" lang="th">ความขุ่น (Turbidity)</span><span class="lang-block" lang="en">Turbidity</span><span class="lang-block" lang="zh">浊度</span></div>
                <div class="lang-block" lang="th">
                    <p>ความขุ่นวัดด้วย <strong>Nephelometer</strong> รายงานในหน่วย <strong>NTU</strong></p>
                    <ul>
                        <li>น้ำดื่ม: &lt;4 NTU (WHO)</li>
                        <li>น้ำผิวดิน: &lt;50 NTU</li>
                        <li>น้ำเสีย: อาจสูงถึง &gt;500 NTU</li>
                    </ul>
                </div>
                <div class="lang-block" lang="en">
                    <p>Turbidity measured with <strong>Nephelometer</strong>, reported in <strong>NTU</strong></p>
                    <ul>
                        <li>Drinking water: &lt;4 NTU (WHO)</li>
                        <li>Surface water: &lt;50 NTU</li>
                        <li>Wastewater: may exceed 500 NTU</li>
                    </ul>
                </div>
                <div class="lang-block" lang="zh">
                    <p>浊度用<strong>浊度仪</strong>测量，单位为<strong>NTU</strong></p>
                    <ul>
                        <li>饮用水：&lt;4 NTU（WHO）</li>
                        <li>地表水：&lt;50 NTU</li>
                        <li>废水：可能超过500 NTU</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="formula-display">
            <div class="formula-label"><span class="lang-block" lang="th">สูตรความคลาดเคลื่อน</span><span class="lang-block" lang="en">Error Formulas</span><span class="lang-block" lang="zh">误差公式</span></div>
            <span class="lang-block" lang="th">ความคลาดเคลื่อนสัมบูรณ์ = |ค่าวัด − ค่าจริง| &nbsp;|&nbsp; %Error = (|ค่าวัด − ค่าจริง| / ค่าจริง) × 100%</span>
            <span class="lang-block" lang="en">Absolute Error = |measured − true| &nbsp;|&nbsp; %Error = (|measured − true| / true) × 100%</span>
            <span class="lang-block" lang="zh">绝对误差 = |测量值 − 真实值| &nbsp;|&nbsp; %误差 = (|测量值 − 真实值| / 真实值) × 100%</span>
        </div>
    </div>

    <!-- Materials — Trilingual -->
    <div class="lab-section">
        <h2>🔧 <span class="lang-block" lang="th">วัสดุและอุปกรณ์</span><span class="lang-block" lang="en">Materials &amp; Equipment</span><span class="lang-block" lang="zh">材料与仪器</span></h2>
        <div class="materials-grid">
            <div class="material-item"><span class="mat-icon">📏</span> <span class="lang-block" lang="th">ไม้บรรทัด 30 cm</span><span class="lang-block" lang="en">Ruler 30 cm</span><span class="lang-block" lang="zh">30cm直尺</span></div>
            <div class="material-item"><span class="mat-icon">🔧</span> <span class="lang-block" lang="th">เวอร์เนียร์คาลิเปอร์</span><span class="lang-block" lang="en">Vernier Caliper</span><span class="lang-block" lang="zh">游标卡尺</span></div>
            <div class="material-item"><span class="mat-icon">⚙️</span> <span class="lang-block" lang="th">ไมโครมิเตอร์</span><span class="lang-block" lang="en">Micrometer</span><span class="lang-block" lang="zh">千分尺/螺旋测微器</span></div>
            <div class="material-item"><span class="mat-icon">🧫</span> <span class="lang-block" lang="th">จานเพาะเชื้อที่มีโคโลนี</span><span class="lang-block" lang="en">Petri dish with colonies</span><span class="lang-block" lang="zh">含菌落的培养皿</span></div>
            <div class="material-item"><span class="mat-icon">🔬</span> <span class="lang-block" lang="th">กล้องจุลทรรศน์สเตอริโอ</span><span class="lang-block" lang="en">Stereo microscope</span><span class="lang-block" lang="zh">体视显微镜</span></div>
            <div class="material-item"><span class="mat-icon">⚖️</span> <span class="lang-block" lang="th">เครื่องชั่งดิจิทัล</span><span class="lang-block" lang="en">Digital balance</span><span class="lang-block" lang="zh">电子天平</span></div>
            <div class="material-item"><span class="mat-icon">🧪</span> <span class="lang-block" lang="th">กระบอกตวง 100 mL</span><span class="lang-block" lang="en">100 mL graduated cylinder</span><span class="lang-block" lang="zh">100 mL量筒</span></div>
            <div class="material-item"><span class="mat-icon">💧</span> <span class="lang-block" lang="th">Turbidimeter / Nephelometer</span><span class="lang-block" lang="en">Turbidimeter / Nephelometer</span><span class="lang-block" lang="zh">浊度仪/散射浊度计</span></div>
        </div>
    </div>

    <!-- Procedure — Trilingual -->
    <div class="lab-section">
        <h2>📋 <span class="lang-block" lang="th">วิธีทำการทดลอง</span><span class="lang-block" lang="en">Procedure</span><span class="lang-block" lang="zh">实验步骤</span></h2>

        <h3>
            <span class="lang-block" lang="th">ตอนที่ 1: การวัดความยาวด้วยเครื่องมือ</span>
            <span class="lang-block" lang="en">Part 1: Length Measurement with Instruments</span>
            <span class="lang-block" lang="zh">第一部分：用仪器测量长度</span>
        </h3>

        <!-- Vernier Caliper Illustration -->
        <figure class="concept-illustration" style="margin:1rem 0 1.5rem;">
            <img src="../images/ch01/vernier_caliper.png" alt="Vernier Caliper Reading Guide" style="width:100%;border-radius:12px;">
            <figcaption>
                <span class="lang-block" lang="th">รูปที่ L1.1 การอ่านค่าเวอร์เนียร์คาลิเปอร์: อ่านเส้นสกัลหลัก + เส้นสกัลเวอร์เนียร์ = ค่าแท้ (88 + 0.6 = 88.6 mm)</span>
                <span class="lang-block" lang="en">Fig. L1.1 Vernier caliper reading guide: main scale + vernier scale = measurement (88 + 0.6 = 88.6 mm)</span>
                <span class="lang-block" lang="zh">图L1.1 游标卡尺读数指南：主尺读数 + 游标尺读数 = 测量值（88 + 0.6 = 88.6 mm）</span>
            </figcaption>
        </figure>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เลือกวัตถุ 3 ชิ้น (หลอดทดลอง, จานเพาะเชื้อ, สไลด์แก้ว)</span>
                <span class="lang-block" lang="en">Select 3 objects (test tube, Petri dish, glass slide)</span>
                <span class="lang-block" lang="zh">选取3个物体（试管、培养皿、玻璃片）</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">วัดด้วยไม้บรรทัด, เวอร์เนียร์คาลิเปอร์, และไมโครมิเตอร์ (ถ้าได้) ทำซ้ำ 3 ครั้งต่อเครื่องมือ</span>
                <span class="lang-block" lang="en">Measure with ruler, vernier caliper, and micrometer — 3 replications per instrument</span>
                <span class="lang-block" lang="zh">用直尺、游标卡尺和千分尺测量——每种仪器重复3次</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">คำนวณค่าเฉลี่ย ส่วนเบี่ยงเบนมาตรฐาน และรายงานพร้อมเลขนัยสำคัญ</span>
                <span class="lang-block" lang="en">Calculate mean, standard deviation, and report with appropriate significant figures</span>
                <span class="lang-block" lang="zh">计算平均值、标准差，并用适当有效数字报告结果</span>
            </p></div></div>
        </div>

        <h3>
            <span class="lang-block" lang="th">ตอนที่ 2: วัดขนาดโคโลนีจุลินทรีย์ 🔬</span>
            <span class="lang-block" lang="en">Part 2: Microbial Colony Sizing 🔬</span>
            <span class="lang-block" lang="zh">第二部分：微生物菌落大小测量 🔬</span>
        </h3>

        <!-- Colony Measurement Illustration -->
        <figure class="concept-illustration" style="margin:1rem 0 1.5rem;">
            <img src="../images/ch01/colony_measurement.png" alt="Microbial Colony Measurement" style="width:100%;border-radius:12px;">
            <figcaption>
                <span class="lang-block" lang="th">รูปที่ L1.2 การวัดขนาดโคโลนีแบคทีเรียด้วยไม้บรรทัด แสดงแกน d₁ (length) และ d₂ (width) พร้อมการคำนวณพื้นที่โคโลนี</span>
                <span class="lang-block" lang="en">Fig. L1.2 Measuring bacterial colony diameter with ruler, showing d₁ (length) and d₂ (width) axes and area calculation</span>
                <span class="lang-block" lang="zh">图L1.2 用直尺测量细菌菌落直径，显示d₁（长轴）和d₂（宽轴）及面积计算</span>
            </figcaption>
        </figure>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">รับจานเพาะเชื้อที่มีโคโลนี เลือกโคโลนี 10 โคโลนีที่กระจายตัวดี ทำเครื่องหมายบริเวณฝาด้านนอก</span>
                <span class="lang-block" lang="en">Receive a Petri dish with colonies. Select 10 well-separated colonies. Mark on the outside lid.</span>
                <span class="lang-block" lang="zh">取含菌落的培养皿，选取10个分布均匀的菌落，在外盖上标记。</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">วัดเส้นผ่านศูนย์กลาง d₁ (แนวยาว) และ d₂ (แนวกว้าง) ด้วยไม้บรรทัดในหน่วย mm</span>
                <span class="lang-block" lang="en">Measure diameter d₁ (length axis) and d₂ (width axis) with a ruler in mm</span>
                <span class="lang-block" lang="zh">用直尺以mm为单位测量直径d₁（长轴）和d₂（宽轴）</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">คำนวณ: d_avg = (d₁ + d₂)/2, Area = π(d_avg/2)² (mm²)</span>
                <span class="lang-block" lang="en">Calculate: d_avg = (d₁ + d₂)/2, Area = π(d_avg/2)² (mm²)</span>
                <span class="lang-block" lang="zh">计算：d_avg = (d₁ + d₂)/2，面积 = π(d_avg/2)²（mm²）</span>
            </p></div></div>
        </div>

        <h3>
            <span class="lang-block" lang="th">ตอนที่ 3: วัดความขุ่น (NTU) — สำหรับวิทยาศาสตร์สิ่งแวดล้อม 🌍</span>
            <span class="lang-block" lang="en">Part 3: Turbidity Measurement (NTU) — Environmental Science Track 🌍</span>
            <span class="lang-block" lang="zh">第三部分：浊度测量（NTU）——环境科学方向 🌍</span>
        </h3>

        <!-- Turbidity Illustration -->
        <figure class="concept-illustration" style="margin:1rem 0 1.5rem;">
            <img src="../images/ch01/turbidity.png" alt="Water Turbidity Measurement" style="width:100%;border-radius:12px;">
            <figcaption>
                <span class="lang-block" lang="th">รูปที่ L1.3 การวัดความขุ่นด้วย Turbidimeter แสดงตัวอย่างน้ำ 4 ชนิด และหลักการกระจายแสง (Nephelometry)</span>
                <span class="lang-block" lang="en">Fig. L1.3 Turbidity measurement with turbidimeter showing 4 water sample types and the light scattering (Nephelometry) principle</span>
                <span class="lang-block" lang="zh">图L1.3 用浊度仪测量浊度，显示4种水样类型和散射浊度法（NTU）原理</span>
            </figcaption>
        </figure>
        <div class="procedure-steps">
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เตรียมตัวอย่างน้ำ 5 ตัวอย่าง (น้ำประปา, น้ำฝน, น้ำคลอง, น้ำทิ้งจากอ่างล้างมือ, น้ำเสียจำลอง)</span>
                <span class="lang-block" lang="en">Prepare 5 water samples (tap water, rainwater, canal water, sink drain, simulated wastewater)</span>
                <span class="lang-block" lang="zh">准备5个水样（自来水、雨水、运河水、洗手盆排水、模拟废水）</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">วัดความขุ่นด้วย Turbidimeter บันทึกเป็น NTU วัดซ้ำ 3 ครั้งต่อตัวอย่าง</span>
                <span class="lang-block" lang="en">Measure turbidity with turbidimeter in NTU — 3 replicates per sample</span>
                <span class="lang-block" lang="zh">用浊度仪测量NTU——每个样品重复3次</span>
            </p></div></div>
            <div class="procedure-step"><div class="step-content"><p>
                <span class="lang-block" lang="th">เปรียบเทียบกับมาตรฐาน WHO (น้ำดื่ม &lt;4 NTU) และมาตรฐานน้ำทิ้ง (&lt;50 NTU)</span>
                <span class="lang-block" lang="en">Compare with WHO standards (drinking &lt;4 NTU) and effluent standards (&lt;50 NTU)</span>
                <span class="lang-block" lang="zh">与WHO标准比较（饮用水&lt;4 NTU）和出水标准（&lt;50 NTU）</span>
            </p></div></div>
        </div>
    </div>

    <!-- Data Tables — Trilingual -->
    <div class="lab-section">
        <h2>📊 <span class="lang-block" lang="th">ตารางบันทึกผล</span><span class="lang-block" lang="en">Data Recording Tables</span><span class="lang-block" lang="zh">数据记录表</span></h2>

        <h3><span class="lang-block" lang="th">ตอนที่ 1: การวัดวัตถุ</span><span class="lang-block" lang="en">Part 1: Object Measurements</span><span class="lang-block" lang="zh">第一部分：物体测量</span></h3>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">วัตถุ</span><span class="lang-block" lang="en">Object</span><span class="lang-block" lang="zh">物体</span></th>
                <th><span class="lang-block" lang="th">ครั้งที่</span><span class="lang-block" lang="en">Trial</span><span class="lang-block" lang="zh">次数</span></th>
                <th><span class="lang-block" lang="th">ไม้บรรทัด (cm)</span><span class="lang-block" lang="en">Ruler (cm)</span><span class="lang-block" lang="zh">直尺 (cm)</span></th>
                <th><span class="lang-block" lang="th">เวอร์เนียร์ (cm)</span><span class="lang-block" lang="en">Vernier (cm)</span><span class="lang-block" lang="zh">游标卡尺 (cm)</span></th>
                <th><span class="lang-block" lang="th">ไมโครมิเตอร์ (mm)</span><span class="lang-block" lang="en">Micrometer (mm)</span><span class="lang-block" lang="zh">千分尺 (mm)</span></th>
            </tr></thead>
            <tbody>
                <tr><td rowspan="3"><span class="lang-block" lang="th">หลอดทดลอง</span><span class="lang-block" lang="en">Test tube</span><span class="lang-block" lang="zh">试管</span></td><td>1</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>2</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>3</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td rowspan="3"><span class="lang-block" lang="th">จานเพาะเชื้อ</span><span class="lang-block" lang="en">Petri dish</span><span class="lang-block" lang="zh">培养皿</span></td><td>1</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>2</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>3</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td rowspan="3"><span class="lang-block" lang="th">สไลด์แก้ว</span><span class="lang-block" lang="en">Glass slide</span><span class="lang-block" lang="zh">玻璃片</span></td><td>1</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>2</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>3</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>

        <h3><span class="lang-block" lang="th">ตอนที่ 2: ขนาดโคโลนี</span><span class="lang-block" lang="en">Part 2: Colony Sizes</span><span class="lang-block" lang="zh">第二部分：菌落大小</span></h3>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">โคโลนีที่</span><span class="lang-block" lang="en">Colony #</span><span class="lang-block" lang="zh">菌落编号</span></th>
                <th>d₁ (mm)</th><th>d₂ (mm)</th>
                <th>d_avg (mm)</th>
                <th><span class="lang-block" lang="th">พื้นที่ (mm²)</span><span class="lang-block" lang="en">Area (mm²)</span><span class="lang-block" lang="zh">面积 (mm²)</span></th>
            </tr></thead>
            <tbody>
                <tr><td>1</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>2</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>3</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td>4–10</td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><strong><span class="lang-block" lang="th">ค่าเฉลี่ย</span><span class="lang-block" lang="en">Mean</span><span class="lang-block" lang="zh">平均值</span></strong></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>

        <h3 class="env-section-title" style="color:#00BFA5;">🌍 <span class="lang-block" lang="th">ตอนที่ 3: ความขุ่นของน้ำ</span><span class="lang-block" lang="en">Part 3: Water Turbidity</span><span class="lang-block" lang="zh">第三部分：水浊度</span></h3>
        <table class="data-table">
            <thead><tr>
                <th><span class="lang-block" lang="th">ตัวอย่างน้ำ</span><span class="lang-block" lang="en">Water Sample</span><span class="lang-block" lang="zh">水样类型</span></th>
                <th>NTU (1)</th><th>NTU (2)</th><th>NTU (3)</th>
                <th><span class="lang-block" lang="th">ค่าเฉลี่ย NTU</span><span class="lang-block" lang="en">Mean NTU</span><span class="lang-block" lang="zh">平均NTU</span></th>
                <th><span class="lang-block" lang="th">ผ่านมาตรฐาน?</span><span class="lang-block" lang="en">Meets Standard?</span><span class="lang-block" lang="zh">达标？</span></th>
            </tr></thead>
            <tbody>
                <tr><td><span class="lang-block" lang="th">น้ำประปา</span><span class="lang-block" lang="en">Tap water</span><span class="lang-block" lang="zh">自来水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">น้ำฝน</span><span class="lang-block" lang="en">Rainwater</span><span class="lang-block" lang="zh">雨水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">น้ำคลอง</span><span class="lang-block" lang="en">Canal water</span><span class="lang-block" lang="zh">运河水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
                <tr><td><span class="lang-block" lang="th">น้ำเสียจำลอง</span><span class="lang-block" lang="en">Simulated wastewater</span><span class="lang-block" lang="zh">模拟废水</span></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td><td class="input-cell"></td></tr>
            </tbody>
        </table>
    </div>

    <!-- Post-Lab Questions -->
    <div class="lab-section">
        <h2>❓ <span class="lang-block" lang="th">คำถามท้ายปฏิบัติการ</span><span class="lang-block" lang="en">Post-Lab Questions</span><span class="lang-block" lang="zh">实验后问题</span></h2>
        <div class="lab-questions">
            <ol>
                <li>
                    <span class="lang-block" lang="th">เครื่องมือวัดชนิดใดให้ค่าแม่นยำที่สุด? อธิบายโดยใช้จำนวนเลขนัยสำคัญ</span>
                    <span class="lang-block" lang="en">Which instrument gave the most precise measurements? Explain using significant figures.</span>
                    <span class="lang-block" lang="zh">哪种仪器测量最精确？用有效数字说明。</span>
                </li>
                <li>
                    <span class="lang-block" lang="th">หากเส้นผ่านศูนย์กลางจานเพาะเชื้อจริง = 9.00 cm คำนวณ %Error ของเครื่องมือแต่ละชนิด</span>
                    <span class="lang-block" lang="en">If the true Petri dish diameter = 9.00 cm, calculate %Error for each instrument.</span>
                    <span class="lang-block" lang="zh">若培养皿直径真实值为9.00 cm，计算各仪器的%误差。</span>
                </li>
                <li>
                    <span class="lang-block" lang="th">ความขุ่นของน้ำตัวอย่างใดผ่านมาตรฐานน้ำดื่ม WHO? ใดจำเป็นต้องผ่านกระบวนการกรอง?</span>
                    <span class="lang-block" lang="en">Which water sample turbidity meets WHO drinking standards? Which require filtration treatment?</span>
                    <span class="lang-block" lang="zh">哪种水样的浊度符合WHO饮用水标准？哪些需要过滤处理？</span>
                </li>
                <li>
                    <span class="lang-block" lang="th">อธิบายความแตกต่างระหว่าง accuracy กับ precision พร้อมยกตัวอย่างจากการทดลองนี้</span>
                    <span class="lang-block" lang="en">Explain the difference between accuracy and precision with examples from this experiment.</span>
                    <span class="lang-block" lang="zh">结合本实验，解释精确度（accuracy）与精密度（precision）的区别。</span>
                </li>
                <li>
                    <span class="lang-block" lang="th">คิดวิธีที่จะนำ AI หรือ image analysis มาช่วยวัดขนาดโคโลนีอัตโนมัติ</span>
                    <span class="lang-block" lang="en">Propose how AI or image analysis could automate colony size measurement.</span>
                    <span class="lang-block" lang="zh">提出如何利用AI或图像分析自动测量菌落大小。</span>
                </li>
            </ol>
        </div>
    </div>

    <!-- Safety -->
    <div class="safety-box">
        <h3>⚠️ <span class="lang-block" lang="th">ข้อควรระวัง / Safety / 安全注意事项</span><span class="lang-block" lang="en">Safety Precautions</span><span class="lang-block" lang="zh">安全注意事项</span></h3>
        <ul class="safety-list">
            <li>
                <span class="lang-block" lang="th">ระวังการใช้เวอร์เนียร์คาลิเปอร์ อย่าบีบแน่นเกินไปจนทำให้วัตถุเสียรูป</span>
                <span class="lang-block" lang="en">Handle vernier calipers carefully — do not overtighten and deform the object</span>
                <span class="lang-block" lang="zh">小心使用游标卡尺——勿过度夹紧使物体变形</span>
            </li>
            <li>
                <span class="lang-block" lang="th">จานเพาะเชื้อมีจุลินทรีย์ ห้ามเปิดฝาโดยไม่จำเป็น ทำงานใกล้ตะเกียงบุนเซน / ในตู้ Biosafety cabinet</span>
                <span class="lang-block" lang="en">Petri dishes contain microorganisms — keep lid closed; work near Bunsen burner or Biosafety cabinet</span>
                <span class="lang-block" lang="zh">培养皿含有微生物——保持盖子关闭；在酒精灯旁或生物安全柜内操作</span>
            </li>
            <li>
                <span class="lang-block" lang="th">ตัวอย่างน้ำจากแหล่งธรรมชาติอาจมีเชื้อโรค ใช้ถุงมือและระมัดระวังเสมอ</span>
                <span class="lang-block" lang="en">Natural water samples may contain pathogens — always use gloves and handle with care</span>
                <span class="lang-block" lang="zh">天然水样可能含有病原体——始终佩戴手套，谨慎操作</span>
            </li>
            <li>
                <span class="lang-block" lang="th">ล้างมือด้วยสบู่ฆ่าเชื้อหลังทำปฏิบัติการทุกครั้ง</span>
                <span class="lang-block" lang="en">Wash hands with antibacterial soap after every lab session</span>
                <span class="lang-block" lang="zh">每次实验结束后用抗菌皂洗手</span>
            </li>
        </ul>
    </div>

    <nav class="lab-nav">
        <a href="../index.php" class="lab-nav-btn">← <span class="lang-block" lang="th">กลับหน้าหลัก</span><span class="lang-block" lang="en">Home</span><span class="lang-block" lang="zh">返回首页</span></a>
        <a href="lab02_vectors.php" class="lab-nav-btn next"><span class="lang-block" lang="th">ปฏิบัติการที่ 2</span><span class="lang-block" lang="en">Lab 2</span><span class="lang-block" lang="zh">实验2</span> →</a>
    </nav>
</div>

<?php include '../includes/footer.php'; ?>
