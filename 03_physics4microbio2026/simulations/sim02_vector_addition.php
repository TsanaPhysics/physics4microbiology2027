<?php $pageTitle = 'จำลอง: การบวกเวกเตอร์'; $basePath = '../'; include '../includes/header.php'; ?>

<section class="sim-hero">
    <div class="sim-hero-content">
        <div class="sim-badge">🎮 Simulation 2</div>
        <h1>การบวก<span>เวกเตอร์</span></h1>
        <p>Vector Addition — Graphical Method</p>
    </div>
</section>

<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area">
            <canvas id="vecCanvas" width="700" height="500"></canvas>
        </div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่าเวกเตอร์</h3>
            <div class="control-group">
                <label>F₁ ขนาด: <span class="control-value" id="f1Val">5.0 N</span></label>
                <input type="range" id="f1Mag" min="0" max="10" step="0.5" value="5" oninput="drawVectors()">
            </div>
            <div class="control-group">
                <label>F₁ มุม: <span class="control-value" id="f1AngVal">0°</span></label>
                <input type="range" id="f1Ang" min="0" max="360" step="5" value="0" oninput="drawVectors()">
            </div>
            <div class="control-group">
                <label>F₂ ขนาด: <span class="control-value" id="f2Val">3.0 N</span></label>
                <input type="range" id="f2Mag" min="0" max="10" step="0.5" value="3" oninput="drawVectors()">
            </div>
            <div class="control-group">
                <label>F₂ มุม: <span class="control-value" id="f2AngVal">60°</span></label>
                <input type="range" id="f2Ang" min="0" max="360" step="5" value="60" oninput="drawVectors()">
            </div>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">|R|</span><span class="readout-value" id="rMag">—</span></div>
                <div class="readout-item"><span class="readout-label">θ_R</span><span class="readout-value" id="rAng">—</span></div>
                <div class="readout-item"><span class="readout-label">Rx</span><span class="readout-value" id="rX">—</span></div>
                <div class="readout-item"><span class="readout-label">Ry</span><span class="readout-value" id="rY">—</span></div>
            </div>
        </div>
    </div>
    <div class="sim-theory">
        <h2>📖 ทฤษฎี</h2>
        <p>แรงลัพธ์ <strong>R</strong> คำนวณจาก: Rx = F₁cosθ₁ + F₂cosθ₂ &nbsp;|&nbsp; Ry = F₁sinθ₁ + F₂sinθ₂</p>
        <p>|R| = √(Rx² + Ry²) &nbsp;|&nbsp; θ_R = tan⁻¹(Ry/Rx)</p>
    </div>
</div>

<script>
const canvas = document.getElementById('vecCanvas');
const ctx = canvas.getContext('2d');
const scale = 40;

function drawArrow(cx, cy, ex, ey, color, label) {
    ctx.beginPath();
    ctx.moveTo(cx, cy);
    ctx.lineTo(ex, ey);
    ctx.strokeStyle = color;
    ctx.lineWidth = 3;
    ctx.stroke();
    const angle = Math.atan2(ey-cy, ex-cx);
    const hs = 12;
    ctx.beginPath();
    ctx.moveTo(ex, ey);
    ctx.lineTo(ex - hs*Math.cos(angle-0.4), ey - hs*Math.sin(angle-0.4));
    ctx.lineTo(ex - hs*Math.cos(angle+0.4), ey - hs*Math.sin(angle+0.4));
    ctx.closePath();
    ctx.fillStyle = color;
    ctx.fill();
    if(label) {
        ctx.fillStyle = color;
        ctx.font = 'bold 14px Prompt';
        ctx.fillText(label, (cx+ex)/2+10, (cy+ey)/2-10);
    }
}

function drawVectors() {
    const f1m = parseFloat(document.getElementById('f1Mag').value);
    const f1a = parseFloat(document.getElementById('f1Ang').value) * Math.PI/180;
    const f2m = parseFloat(document.getElementById('f2Mag').value);
    const f2a = parseFloat(document.getElementById('f2Ang').value) * Math.PI/180;

    document.getElementById('f1Val').textContent = f1m.toFixed(1)+' N';
    document.getElementById('f1AngVal').textContent = (f1a*180/Math.PI).toFixed(0)+'°';
    document.getElementById('f2Val').textContent = f2m.toFixed(1)+' N';
    document.getElementById('f2AngVal').textContent = (f2a*180/Math.PI).toFixed(0)+'°';

    const ox = 200, oy = 300;
    const f1x = f1m*Math.cos(f1a)*scale, f1y = -f1m*Math.sin(f1a)*scale;
    const f2x = f2m*Math.cos(f2a)*scale, f2y = -f2m*Math.sin(f2a)*scale;
    const rx = f1x+f2x, ry = f1y+f2y;

    ctx.clearRect(0,0,canvas.width,canvas.height);
    // Grid
    ctx.strokeStyle = 'rgba(255,255,255,0.06)';
    ctx.lineWidth = 1;
    for(let i=0;i<canvas.width;i+=scale){ctx.beginPath();ctx.moveTo(i,0);ctx.lineTo(i,canvas.height);ctx.stroke();}
    for(let i=0;i<canvas.height;i+=scale){ctx.beginPath();ctx.moveTo(0,i);ctx.lineTo(canvas.width,i);ctx.stroke();}
    // Axes
    ctx.strokeStyle = 'rgba(255,255,255,0.2)';ctx.lineWidth = 1;
    ctx.beginPath();ctx.moveTo(0,oy);ctx.lineTo(canvas.width,oy);ctx.stroke();
    ctx.beginPath();ctx.moveTo(ox,0);ctx.lineTo(ox,canvas.height);ctx.stroke();

    // Dashed parallelogram
    ctx.setLineDash([5,5]);
    ctx.strokeStyle = 'rgba(255,255,255,0.15)';
    ctx.beginPath();
    ctx.moveTo(ox+f1x,oy+f1y);ctx.lineTo(ox+f1x+f2x,oy+f1y+f2y);
    ctx.moveTo(ox+f2x,oy+f2y);ctx.lineTo(ox+f1x+f2x,oy+f1y+f2y);
    ctx.stroke();
    ctx.setLineDash([]);

    drawArrow(ox, oy, ox+f1x, oy+f1y, '#FF9800', 'F₁');
    drawArrow(ox, oy, ox+f2x, oy+f2y, '#00BCD4', 'F₂');
    drawArrow(ox, oy, ox+rx, oy+ry, '#FF4081', 'R');

    const rMag = Math.sqrt(rx*rx+ry*ry)/scale;
    const rAngDeg = Math.atan2(-ry,rx)*180/Math.PI;
    const rxN = rx/scale, ryN = -ry/scale;
    document.getElementById('rMag').textContent = rMag.toFixed(2)+' N';
    document.getElementById('rAng').textContent = (rAngDeg<0?rAngDeg+360:rAngDeg).toFixed(1)+'°';
    document.getElementById('rX').textContent = rxN.toFixed(2)+' N';
    document.getElementById('rY').textContent = ryN.toFixed(2)+' N';
}

drawVectors();
</script>

<?php include '../includes/footer.php'; ?>
