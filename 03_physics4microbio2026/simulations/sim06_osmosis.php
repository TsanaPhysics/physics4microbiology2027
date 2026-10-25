<?php $pageTitle = 'จำลอง: Osmosis'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 6</div><h1>Cell <span>Osmosis</span></h1><p>จำลองการออสโมซิสในเซลล์</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="osmCanvas" width="700" height="500"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ความเข้มข้นสารละลาย</h3>
            <div class="control-group">
                <label>NaCl (%): <span class="control-value" id="naclVal">0.9</span></label>
                <input type="range" id="nacl" min="0" max="10" step="0.1" value="0.9" oninput="updateOsm()">
            </div>
            <button class="sim-btn primary" onclick="resetOsm()">🔄 รีเซ็ต</button>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">สภาวะ</span><span class="readout-value" id="osmState">Isotonic</span></div>
                <div class="readout-item"><span class="readout-label">ขนาดเซลล์</span><span class="readout-value" id="cellSize">100%</span></div>
                <div class="readout-item"><span class="readout-label">ทิศทางน้ำ</span><span class="readout-value" id="waterDir">สมดุล</span></div>
            </div>
            <div style="margin-top:1rem;font-size:0.8rem;color:#666;line-height:1.8;">
                <strong>คำแนะนำ:</strong><br>
                • 0% → Hypotonic (เซลล์บวม)<br>
                • 0.9% → Isotonic (ปกติ)<br>
                • >2% → Hypertonic (เซลล์เหี่ยว)
            </div>
        </div>
    </div>
</div>
<script>
const oc = document.getElementById('osmCanvas').getContext('2d');
let cellR = 100, targetR = 100, waterParticles = [];

function initWater() {
    waterParticles = [];
    for(let i=0;i<60;i++){
        waterParticles.push({x:Math.random()*700, y:Math.random()*500, vx:(Math.random()-0.5)*2, vy:(Math.random()-0.5)*2});
    }
}

function updateOsm() {
    const nacl = parseFloat(document.getElementById('nacl').value);
    document.getElementById('naclVal').textContent = nacl.toFixed(1);
    if(nacl < 0.5) { targetR = 140; document.getElementById('osmState').textContent='Hypotonic';document.getElementById('waterDir').textContent='→ เข้าเซลล์'; }
    else if(nacl <= 1.5) { targetR = 100; document.getElementById('osmState').textContent='Isotonic';document.getElementById('waterDir').textContent='สมดุล'; }
    else { targetR = 60 + (10-nacl)*3; document.getElementById('osmState').textContent='Hypertonic';document.getElementById('waterDir').textContent='← ออกจากเซลล์'; }
    if(targetR < 40) targetR = 40;
}

function resetOsm() { cellR = 100; document.getElementById('nacl').value=0.9; updateOsm(); }

function drawOsm() {
    oc.clearRect(0,0,700,500);
    const cx=350, cy=250;
    
    // Solution background color based on concentration
    const nacl = parseFloat(document.getElementById('nacl').value);
    oc.fillStyle = `rgba(0,150,200,${0.05 + nacl*0.02})`;
    oc.fillRect(0,0,700,500);

    // Animate cell size
    cellR += (targetR - cellR) * 0.03;
    document.getElementById('cellSize').textContent = Math.round(cellR) + '%';

    // Water particles
    waterParticles.forEach(w => {
        w.x += w.vx; w.y += w.vy;
        if(w.x<0||w.x>700) w.vx*=-1; if(w.y<0||w.y>500) w.vy*=-1;
        
        const dx=w.x-cx, dy=w.y-cy, dist=Math.sqrt(dx*dx+dy*dy);
        if(nacl<0.5 && dist>cellR+10) { w.x-=dx*0.005; w.y-=dy*0.005; }
        if(nacl>2 && dist<cellR+30) { w.x+=dx*0.005; w.y+=dy*0.005; }

        oc.beginPath(); oc.arc(w.x,w.y,3,0,Math.PI*2);
        oc.fillStyle = dist<cellR? 'rgba(0,150,255,0.6)':'rgba(0,200,255,0.4)';
        oc.fill();
    });

    // Cell membrane
    oc.beginPath(); oc.arc(cx,cy,cellR,0,Math.PI*2);
    oc.strokeStyle = cellR>130? '#F44336':'#4CAF50'; oc.lineWidth = 4;
    oc.setLineDash([8,4]); oc.stroke(); oc.setLineDash([]);
    oc.fillStyle = 'rgba(255,200,150,0.15)'; oc.fill();

    // Nucleus
    oc.beginPath(); oc.arc(cx,cy,cellR*0.3,0,Math.PI*2);
    oc.fillStyle = 'rgba(100,50,150,0.3)'; oc.fill();
    oc.strokeStyle = 'rgba(100,50,150,0.5)'; oc.lineWidth=2; oc.stroke();

    // Water arrows
    if(nacl<0.5) {
        for(let i=0;i<6;i++){
            const a=i*Math.PI/3;
            drawWaterArrow(cx+Math.cos(a)*(cellR+40),cy+Math.sin(a)*(cellR+40),cx+Math.cos(a)*(cellR+10),cy+Math.sin(a)*(cellR+10));
        }
    } else if(nacl>2) {
        for(let i=0;i<6;i++){
            const a=i*Math.PI/3;
            drawWaterArrow(cx+Math.cos(a)*(cellR+10),cy+Math.sin(a)*(cellR+10),cx+Math.cos(a)*(cellR+40),cy+Math.sin(a)*(cellR+40));
        }
    }

    // Labels
    oc.font = 'bold 16px Prompt'; oc.fillStyle = '#fff'; oc.textAlign='center';
    oc.fillText(nacl<0.5?'💧 น้ำไหลเข้า → เซลล์บวม': nacl>2?'💧 น้ำไหลออก → เซลล์เหี่ยว':'⚖️ สมดุล', cx, 40);
    if(cellR>135) { oc.fillStyle='#F44336'; oc.fillText('⚠️ เสี่ยงแตก! (Hemolysis)', cx, 480); }

    requestAnimationFrame(drawOsm);
}

function drawWaterArrow(x1,y1,x2,y2) {
    oc.beginPath(); oc.moveTo(x1,y1); oc.lineTo(x2,y2);
    oc.strokeStyle='rgba(0,200,255,0.6)'; oc.lineWidth=2; oc.stroke();
    const a=Math.atan2(y2-y1,x2-x1);
    oc.beginPath(); oc.moveTo(x2,y2);
    oc.lineTo(x2-8*Math.cos(a-0.4),y2-8*Math.sin(a-0.4));
    oc.lineTo(x2-8*Math.cos(a+0.4),y2-8*Math.sin(a+0.4));
    oc.fillStyle='rgba(0,200,255,0.6)'; oc.fill();
}

initWater(); updateOsm(); drawOsm();
</script>
<?php include '../includes/footer.php'; ?>
