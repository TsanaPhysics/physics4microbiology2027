<?php $pageTitle = 'จำลอง: ตัวแปลงหน่วย'; $basePath = '../'; include '../includes/header.php'; ?>

<section class="sim-hero">
    <div class="sim-hero-content">
        <div class="sim-badge">🎮 Simulation 1</div>
        <h1>ตัวแปลง<span>หน่วย</span></h1>
        <p>Unit Converter & Significant Figures Calculator</p>
    </div>
</section>

<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area" style="background:#fff; padding:2rem;">
            <div id="converterUI">
                <div style="margin-bottom:1.5rem;">
                    <label style="display:block;font-weight:700;margin-bottom:8px;color:#333;">📏 ประเภทการแปลง</label>
                    <select id="convType" style="width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;font-size:1rem;" onchange="updateUnits()">
                        <option value="length">ความยาว</option>
                        <option value="mass">มวล</option>
                        <option value="volume">ปริมาตร</option>
                        <option value="temperature">อุณหภูมิ</option>
                        <option value="concentration">ความเข้มข้น</option>
                    </select>
                </div>
                <div style="display:grid;grid-template-columns:1fr auto 1fr;gap:1rem;align-items:end;margin-bottom:1.5rem;">
                    <div>
                        <label style="display:block;font-weight:600;margin-bottom:4px;font-size:0.85rem;color:#555;">จาก:</label>
                        <input type="number" id="inputVal" value="1" step="any" oninput="convert()" style="width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;font-size:1.1rem;">
                        <select id="fromUnit" onchange="convert()" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;margin-top:6px;"></select>
                    </div>
                    <div style="font-size:2rem;color:#7C4DFF;padding-bottom:30px;">→</div>
                    <div>
                        <label style="display:block;font-weight:600;margin-bottom:4px;font-size:0.85rem;color:#555;">เป็น:</label>
                        <div id="resultVal" style="width:100%;padding:10px;border-radius:8px;background:#EDE7F6;font-size:1.1rem;font-weight:700;color:#4527A0;min-height:44px;display:flex;align-items:center;">—</div>
                        <select id="toUnit" onchange="convert()" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;margin-top:6px;"></select>
                    </div>
                </div>
                <div style="background:#f5f5f5;border-radius:12px;padding:1.5rem;margin-top:1rem;">
                    <h3 style="margin-bottom:0.5rem;font-size:1rem;">🔢 เลขนัยสำคัญ</h3>
                    <input type="text" id="sigInput" placeholder="ใส่ตัวเลข เช่น 0.00320" oninput="countSigFigs()" style="width:100%;padding:10px;border-radius:8px;border:1px solid #ddd;font-size:1rem;margin-bottom:8px;">
                    <div id="sigResult" style="font-weight:700;color:#4527A0;"></div>
                </div>
            </div>
        </div>
        <div class="sim-controls">
            <h3>⚙️ คู่มือ</h3>
            <p style="font-size:0.85rem;color:#666;">เลือกประเภทหน่วย ใส่ค่า แล้วระบบจะแปลงอัตโนมัติ</p>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">หน่วย SI</span><span class="readout-value" id="siVal">—</span></div>
                <div class="readout-item"><span class="readout-label">สัญกรณ์วิทย์</span><span class="readout-value" id="sciVal">—</span></div>
            </div>
            <div style="margin-top:1rem;">
                <h4 style="font-size:0.9rem;color:#333;margin-bottom:8px;">หน่วยทางจุลชีววิทยา</h4>
                <div style="font-size:0.8rem;color:#666;line-height:1.8;">
                    • 1 μm = 10⁻⁶ m<br>
                    • 1 nm = 10⁻⁹ m<br>
                    • 1 μL = 10⁻⁶ L<br>
                    • 1 CFU/mL = 10³ CFU/L<br>
                    • 1 M = 1 mol/L
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const units = {
    length: {m:1, cm:0.01, mm:0.001, 'μm':1e-6, nm:1e-9, km:1000, inch:0.0254, ft:0.3048},
    mass: {kg:1, g:0.001, mg:1e-6, 'μg':1e-9, ng:1e-12, lb:0.4536, oz:0.02835},
    volume: {L:1, mL:0.001, 'μL':1e-6, nL:1e-9, 'cm³':0.001, 'm³':1000, gal:3.785},
    temperature: {special:true},
    concentration: {M:1, mM:0.001, 'μM':1e-6, nM:1e-9, 'mg/L':null, '%w/v':null}
};

function updateUnits() {
    const type = document.getElementById('convType').value;
    const from = document.getElementById('fromUnit');
    const to = document.getElementById('toUnit');
    let opts = '';
    if(type === 'temperature') {
        opts = '<option value="C">°C</option><option value="F">°F</option><option value="K">K</option>';
    } else if(type === 'concentration') {
        opts = '<option value="M">M</option><option value="mM">mM</option><option value="μM">μM</option><option value="nM">nM</option>';
    } else {
        for(let u in units[type]) opts += `<option value="${u}">${u}</option>`;
    }
    from.innerHTML = opts;
    to.innerHTML = opts;
    if(to.options.length > 1) to.selectedIndex = 1;
    convert();
}

function convert() {
    const type = document.getElementById('convType').value;
    const val = parseFloat(document.getElementById('inputVal').value);
    const from = document.getElementById('fromUnit').value;
    const to = document.getElementById('toUnit').value;
    if(isNaN(val)) { document.getElementById('resultVal').textContent = '—'; return; }
    let result;
    if(type === 'temperature') {
        let inC = from==='C'?val:from==='F'?(val-32)*5/9:val-273.15;
        result = to==='C'?inC:to==='F'?inC*9/5+32:inC+273.15;
    } else {
        const u = units[type];
        result = val * u[from] / u[to];
    }
    document.getElementById('resultVal').textContent = result.toPrecision(6);
    document.getElementById('siVal').textContent = type==='temperature'? (result).toFixed(2)+'K' : (val*units[type][from]).toExponential(3);
    document.getElementById('sciVal').textContent = result.toExponential(3);
}

function countSigFigs() {
    const str = document.getElementById('sigInput').value.trim();
    if(!str) { document.getElementById('sigResult').textContent = ''; return; }
    const num = str.replace(/^-/, '').replace(/^0+\./, '0.');
    let count = 0;
    let started = false;
    for(let c of num) {
        if(c === '.') continue;
        if(c !== '0') started = true;
        if(started) count++;
    }
    if(num.includes('.') && !started) count = 0;
    if(count === 0 && num !== '0') count = 1;
    document.getElementById('sigResult').textContent = `"${str}" มี ${count} ตัวเลขนัยสำคัญ`;
}

updateUnits();
</script>

<?php include '../includes/footer.php'; ?>
