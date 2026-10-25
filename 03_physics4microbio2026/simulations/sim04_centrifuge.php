<?php $pageTitle = 'จำลอง: Centrifuge Separator'; $basePath = '../'; include '../includes/header.php'; ?>

<section class="sim-hero">
    <div class="sim-hero-content">
        <div class="sim-badge">🎮 Simulation 4</div>
        <h1>Centrifuge <span>Separator</span></h1>
        <p>จำลองการแยกสารด้วยแรงเหวี่ยง</p>
    </div>
</section>

<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area">
            <canvas id="cfgCanvas" width="700" height="500"></canvas>
        </div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่า Centrifuge</h3>
            <div class="control-group">
                <label>RPM: <span class="control-value" id="rpmVal">5000</span></label>
                <input type="range" id="rpm" min="1000" max="15000" step="500" value="5000" oninput="updateCfg()">
            </div>
            <div class="control-group">
                <label>รัศมี (cm): <span class="control-value" id="radVal">10</span></label>
                <input type="range" id="radius" min="5" max="20" step="1" value="10" oninput="updateCfg()">
            </div>
            <button class="sim-btn primary" onclick="startSpin()">▶️ เริ่มปั่น</button>
            <button class="sim-btn secondary" onclick="resetCfg()">🔄 รีเซ็ต</button>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">RCF</span><span class="readout-value" id="rcfVal">—</span></div>
                <div class="readout-item"><span class="readout-label">ω (rad/s)</span><span class="readout-value" id="omegaVal">—</span></div>
                <div class="readout-item"><span class="readout-label">เวลา</span><span class="readout-value" id="timeVal">0 s</span></div>
                <div class="readout-item"><span class="readout-label">สถานะ</span><span class="readout-value" id="statusVal">พร้อม</span></div>
            </div>
        </div>
    </div>
</div>

<script>
const cv = document.getElementById('cfgCanvas');
const ct = cv.getContext('2d');
let spinning = false, angle = 0, elapsed = 0;
let particles = [];

function initParticles() {
    particles = [];
    const types = [
        {name:'เซลล์', color:'#FF5722', r:5, density:1.05, count:15},
        {name:'Organelle', color:'#4CAF50', r:3, density:1.2, count:20},
        {name:'โปรตีน', color:'#2196F3', r:1.5, density:1.3, count:30}
    ];
    types.forEach(t => {
        for(let i=0;i<t.count;i++) {
            const a = Math.random()*Math.PI*2;
            const dist = 40 + Math.random()*100;
            particles.push({
                x: 350+Math.cos(a)*dist, y: 250+Math.sin(a)*dist,
                color: t.color, r: t.r, density: t.density, name: t.name,
                settled: false
            });
        }
    });
}

function updateCfg() {
    const rpm = parseInt(document.getElementById('rpm').value);
    const r = parseInt(document.getElementById('radius').value);
    document.getElementById('rpmVal').textContent = rpm;
    document.getElementById('radVal').textContent = r;
    const rcf = 1.118e-5 * r * rpm * rpm;
    const omega = rpm * 2 * Math.PI / 60;
    document.getElementById('rcfVal').textContent = rcf.toFixed(0) + ' ×g';
    document.getElementById('omegaVal').textContent = omega.toFixed(0);
}

function startSpin() {
    if(!spinning) { spinning = true; elapsed = 0; document.getElementById('statusVal').textContent = 'ปั่นอยู่...'; }
}

function resetCfg() {
    spinning = false; angle = 0; elapsed = 0;
    document.getElementById('statusVal').textContent = 'พร้อม';
    document.getElementById('timeVal').textContent = '0 s';
    initParticles();
}

function draw() {
    ct.clearRect(0,0,cv.width,cv.height);
    const cx=350, cy=250, tubeR=140;

    // Rotor
    ct.save();
    ct.translate(cx, cy);
    if(spinning) angle += 0.05;
    ct.rotate(angle);
    ct.strokeStyle = 'rgba(255,255,255,0.3)'; ct.lineWidth = 2;
    ct.beginPath(); ct.moveTo(-tubeR-20,0); ct.lineTo(tubeR+20,0); ct.stroke();
    ct.beginPath(); ct.moveTo(0,-tubeR-20); ct.lineTo(0,tubeR+20); ct.stroke();
    
    // Tubes
    for(let i=0;i<4;i++){
        ct.save();
        ct.rotate(i*Math.PI/2);
        ct.fillStyle = 'rgba(200,200,255,0.15)';
        ct.fillRect(tubeR-35, -12, 40, 24);
        ct.strokeStyle = 'rgba(200,200,255,0.4)';
        ct.strokeRect(tubeR-35, -12, 40, 24);
        ct.restore();
    }
    ct.restore();

    // Center
    ct.beginPath(); ct.arc(cx, cy, 15, 0, Math.PI*2);
    ct.fillStyle = '#333'; ct.fill();
    ct.strokeStyle = '#666'; ct.lineWidth = 2; ct.stroke();

    // Particles
    if(spinning) {
        elapsed += 1/60;
        const rpm = parseInt(document.getElementById('rpm').value);
        const force = rpm / 5000;
        particles.forEach(p => {
            if(!p.settled) {
                const dx = p.x - cx, dy = p.y - cy;
                const dist = Math.sqrt(dx*dx+dy*dy);
                if(dist < tubeR+10) {
                    p.x += (dx/dist) * force * p.density * 0.5;
                    p.y += (dy/dist) * force * p.density * 0.5;
                } else {
                    p.settled = true;
                }
            }
        });
        document.getElementById('timeVal').textContent = elapsed.toFixed(1) + ' s';
    }

    particles.forEach(p => {
        ct.beginPath(); ct.arc(p.x, p.y, p.r, 0, Math.PI*2);
        ct.fillStyle = p.color; ct.fill();
    });

    // Legend
    ct.font = '12px Sarabun';
    ct.fillStyle = '#FF5722'; ct.fillRect(10,10,12,12); ct.fillStyle = '#fff'; ct.fillText('เซลล์', 28, 21);
    ct.fillStyle = '#4CAF50'; ct.fillRect(10,28,12,12); ct.fillStyle = '#fff'; ct.fillText('Organelle', 28, 39);
    ct.fillStyle = '#2196F3'; ct.fillRect(10,46,12,12); ct.fillStyle = '#fff'; ct.fillText('โปรตีน', 28, 57);

    requestAnimationFrame(draw);
}

initParticles();
updateCfg();
draw();
</script>

<?php include '../includes/footer.php'; ?>
