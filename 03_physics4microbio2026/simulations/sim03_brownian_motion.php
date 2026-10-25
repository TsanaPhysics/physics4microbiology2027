<?php $pageTitle = 'Brownian Motion Analysis | Bio-Digital Lab'; $basePath = '../'; include '../includes/header.php'; ?>

<section class="sim-hero">
    <div class="sim-hero-content">
        <div class="sim-badge reveal"><i class="fas fa-microchip"></i> AI-Enhanced Simulation</div>
        <h1>Brownian <span>Motion</span></h1>
        <p>การวิเคราะห์การเคลื่อนที่แบบสุ่มระดับอนุภาคและโมเลกุลในระบบจุลชีววิทยา</p>
    </div>
</section>

<div class="sim-container">
    <div class="sim-wrapper">
        <!-- Main Canvas -->
        <div class="sim-canvas-area reveal">
            <canvas id="bmCanvas"></canvas>
            <div style="position:absolute; bottom:20px; left:20px; background:rgba(0,0,0,0.6); padding:10px; border-radius:8px; border:1px solid var(--border-glass);">
                <canvas id="liveGraph" width="200" height="80"></canvas>
                <div style="font-size:0.7rem; color:var(--primary); text-align:center; margin-top:5px;">KE Distribution</div>
            </div>
        </div>

        <!-- Controls -->
        <div class="sim-controls reveal">
            <h3><i class="fas fa-sliders"></i> Parameters</h3>
            
            <div class="control-group">
                <label>Particle Count <span class="control-value" id="numP">60</span></label>
                <input type="range" id="numParticles" min="10" max="200" value="60" oninput="restart()">
            </div>
            
            <div class="control-group">
                <label>System Temp (K) <span class="control-value" id="tempVal">310</span></label>
                <input type="range" id="temperature" min="273" max="400" value="310" oninput="updateTemp()">
            </div>
            
            <div class="control-group">
                <label>Viscosity (η) <span class="control-value" id="viscVal">1.0</span></label>
                <input type="range" id="viscosity" min="0.5" max="5.0" step="0.1" value="1.0" oninput="updateVisc()">
            </div>

            <div style="margin-top: 2rem;">
                <button class="sim-btn primary" onclick="restart()"><i class="fas fa-sync"></i> Reset System</button>
                <button class="sim-btn secondary" onclick="togglePause()" id="pauseBtn"><i class="fas fa-pause"></i> Pause Analysis</button>
            </div>

            <div class="sim-readout">
                <div class="readout-item">
                    <span class="readout-label">Entropy</span>
                    <span class="readout-value" id="entropyVal">1.42</span>
                </div>
                <div class="readout-item">
                    <span class="readout-label">Avg V (μm/s)</span>
                    <span class="readout-value" id="avgSpeed">0.0</span>
                </div>
            </div>
        </div>

        <!-- AI Assistant Sidebar -->
        <div class="sim-sidebar reveal">
            <h3><i class="fas fa-robot"></i> AI Partner</h3>
            <div id="ai-insights">
                <div class="ai-insight-card">
                    <strong>Current State:</strong> ระบบกำลังจำลองการเคลื่อนที่ของอนุภาคขนาด 2μm ในน้ำเลี้ยงเชื้อที่อุณหภูมิ 37°C
                </div>
            </div>
            
            <div style="margin-top: 2rem; font-size: 0.85rem; line-height: 1.6; color: var(--text-muted);">
                <p><i class="fas fa-info-circle" style="color: var(--primary);"></i> <strong>Physics Link:</strong> การเคลื่อนที่โคร่งสร้างนี้เกิดจากพลังงานจลน์ที่ถ่ายโอนจากการชนของโมเลกุลน้ำ</p>
                <p style="margin-top: 1rem;"><i class="fas fa-dna" style="color: var(--secondary);"></i> <strong>Bio-Digital:</strong> ในแบคทีเรียที่ไม่มี flagella (เช่น <i>Cocci</i>) การเคลื่อนที่แบบนี้เป็นกลไกหลักในการเข้าหาสารอาหาร</p>
            </div>
        </div>
    </div>

    <div class="chapter-card reveal" style="margin-top: 3rem; padding: 2rem;">
        <h2><i class="fas fa-book-open"></i> Theory & AI Analysis</h2>
        <p>ในทางปัญญาประดิษฐ์ (AI), พฤติกรรมการเคลื่อนที่แบบสุ่มนี้สามารถจำลองได้ด้วย <strong>Probabilistic Models</strong> และการใช้ <strong>RNNs (Recurrent Neural Networks)</strong> เพื่อทำนายตำแหน่งในอนาคตของอนุภาค หรือการใช้ <strong>Computer Vision</strong> เพื่อติดตาม (Track) การเคลื่อนที่ของแบคทีเรียจากวิดีโอกล้องจุลทรรศน์จริง</p>
    </div>
</div>

<script>
const c = document.getElementById('bmCanvas');
const cx = c.getContext('2d');
const gc = document.getElementById('liveGraph');
const gcx = gc.getContext('2d');

let particles = [], paused = false, frame = 0;
let tempK = 310, viscosity = 1.0;
let speedHistory = [];

function init() {
    const container = c.parentElement;
    c.width = container.offsetWidth;
    c.height = container.offsetHeight;
    
    const n = parseInt(document.getElementById('numParticles').value);
    particles = [];
    for(let i=0; i<n; i++){
        particles.push({
            x: Math.random()*c.width, 
            y: Math.random()*c.height,
            r: 3 + Math.random()*4,
            trail: [],
            color: i === 0 ? 'var(--primary)' : 'rgba(45, 212, 191, 0.4)',
            glow: i === 0 ? 'var(--primary)' : 'rgba(168, 85, 247, 0.5)'
        });
    }
    speedHistory = [];
}

function restart() {
    document.getElementById('numP').textContent = document.getElementById('numParticles').value;
    init();
}

function updateTemp() {
    tempK = parseInt(document.getElementById('temperature').value);
    document.getElementById('tempVal').textContent = tempK;
}

function updateVisc() {
    viscosity = parseFloat(document.getElementById('viscosity').value);
    document.getElementById('viscVal').textContent = viscosity.toFixed(1);
}

function togglePause() {
    paused = !paused;
    document.getElementById('pauseBtn').innerHTML = paused ? '<i class="fas fa-play"></i> Resume Analysis' : '<i class="fas fa-pause"></i> Pause Analysis';
}

function drawGraph() {
    gcx.clearRect(0, 0, gc.width, gc.height);
    gcx.strokeStyle = 'var(--primary)';
    gcx.lineWidth = 2;
    gcx.beginPath();
    const step = gc.width / 20;
    for(let i=0; i<speedHistory.length; i++) {
        const x = i * step;
        const y = gc.height - (speedHistory[i] * 5);
        if(i===0) gcx.moveTo(x, y);
        else gcx.lineTo(x, y);
    }
    gcx.stroke();
}

const aiPhrases = [
    "AI กำลังวิเคราะห์การกระจายตัวของพลังงาน...",
    "ตรวจพบพฤติกรรม Anomalous Diffusion ในระบบ",
    "Deep Learning แนะนำว่า Entropy ของระบบกำลังเพิ่มขึ้น",
    "สถานะปัจจุบันสอดคล้องกับพฤติกรรมของแบคทีเรียในอาหารเลี้ยงเชื้อ",
    "Neural Network ทำนายวิถีการเคลื่อนที่ถัดไปสำเร็จ"
];

function updateAI() {
    if(frame % 300 === 0) {
        const sidebar = document.getElementById('ai-insights');
        const phrase = aiPhrases[Math.floor(Math.random() * aiPhrases.length)];
        sidebar.innerHTML = `<div class="ai-insight-card"><strong>AI Inference:</strong> ${phrase}</div>`;
    }
}

function animate() {
    if(!paused) {
        frame++;
        updateAI();
        cx.fillStyle = 'rgba(2, 6, 23, 0.2)'; // Fading trail
        cx.fillRect(0, 0, c.width, c.height);

        let totalV = 0;
        const factor = (tempK / 310) / viscosity;

        particles.forEach((p, i) => {
            const step = (Math.random() * 4 + 1) * factor;
            const angle = Math.random() * Math.PI * 2;
            
            p.x += Math.cos(angle) * step;
            p.y += Math.sin(angle) * step;

            // Bounds
            if(p.x < 0) p.x = c.width; if(p.x > c.width) p.x = 0;
            if(p.y < 0) p.y = c.height; if(p.y > c.height) p.y = 0;

            totalV += step;

            // Render
            cx.save();
            cx.shadowBlur = i===0 ? 15 : 5;
            cx.shadowColor = p.glow;
            cx.fillStyle = p.color;
            cx.beginPath();
            cx.arc(p.x, p.y, p.r, 0, Math.PI*2);
            cx.fill();
            cx.restore();

            if(i === 0) {
                p.trail.push({x: p.x, y: p.y});
                if(p.trail.length > 50) p.trail.shift();
                cx.beginPath();
                cx.strokeStyle = 'var(--primary)';
                cx.lineWidth = 2;
                p.trail.forEach((t, index) => {
                    if(index === 0) cx.moveTo(t.x, t.y);
                    else cx.lineTo(t.x, t.y);
                });
                cx.stroke();
            }
        });

        const avgV = totalV / particles.length;
        document.getElementById('avgSpeed').textContent = (avgV * 2.5).toFixed(1);
        document.getElementById('entropyVal').textContent = (1.4 + (tempK - 310)/100).toFixed(2);
        
        if(frame % 10 === 0) {
            speedHistory.push(avgV);
            if(speedHistory.length > 20) speedHistory.shift();
            drawGraph();
        }
    }
    requestAnimationFrame(animate);
}

window.addEventListener('resize', init);
init();
animate();
</script>

<?php include '../includes/footer.php'; ?>
