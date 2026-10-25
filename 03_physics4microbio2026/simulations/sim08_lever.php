<?php $pageTitle = 'จำลอง: คานและ MA'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 8</div><h1>Lever & <span>MA Calculator</span></h1><p>จำลองคานและคำนวณ Mechanical Advantage</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="levCanvas" width="700" height="400"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่าคาน</h3>
            <div class="control-group"><label>ตำแหน่งจุดหมุน (%): <span class="control-value" id="pivotVal">50</span></label><input type="range" id="pivot" min="10" max="90" value="50" oninput="drawLever()"></div>
            <div class="control-group"><label>น้ำหนักต้านทาน (N): <span class="control-value" id="loadVal">50</span></label><input type="range" id="load" min="10" max="200" value="50" oninput="drawLever()"></div>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">d_E (cm)</span><span class="readout-value" id="deVal">—</span></div>
                <div class="readout-item"><span class="readout-label">d_R (cm)</span><span class="readout-value" id="drVal">—</span></div>
                <div class="readout-item"><span class="readout-label">IMA</span><span class="readout-value" id="imaVal">—</span></div>
                <div class="readout-item"><span class="readout-label">F_E ต้องใช้</span><span class="readout-value" id="feVal">—</span></div>
                <div class="readout-item"><span class="readout-label">ประเภทคาน</span><span class="readout-value" id="leverType">อันดับ 1</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const lc=document.getElementById('levCanvas').getContext('2d');
function drawLever(){
    lc.clearRect(0,0,700,400);
    const pv=parseInt(document.getElementById('pivot').value);
    const load=parseInt(document.getElementById('load').value);
    document.getElementById('pivotVal').textContent=pv;
    document.getElementById('loadVal').textContent=load;
    const barL=500, barY=200, startX=100;
    const pivotX=startX+barL*pv/100;
    const loadX=startX+barL-30, effortX=startX+30;
    const dE=Math.abs(effortX-pivotX), dR=Math.abs(loadX-pivotX);
    const ima=dE/dR, fe=load/ima;
    
    // Calculate tilt
    const tilt=Math.atan2((load-fe)*0.1, barL/2)*0.3;
    
    // Fulcrum triangle  
    lc.beginPath();lc.moveTo(pivotX,barY);lc.lineTo(pivotX-20,barY+40);lc.lineTo(pivotX+20,barY+40);lc.closePath();
    lc.fillStyle='#FFA000';lc.fill();
    
    // Bar
    lc.save();lc.translate(pivotX,barY);lc.rotate(tilt);
    lc.fillStyle='#555';lc.fillRect(-barL*pv/100,-6,barL,12);
    lc.restore();
    
    // Load weight
    lc.fillStyle='#F44336';lc.fillRect(loadX-15,barY+15,30,30);
    lc.fillStyle='#fff';lc.font='bold 11px Prompt';lc.textAlign='center';
    lc.fillText(load+'N',loadX,barY+35);
    lc.fillStyle='#F44336';lc.fillText('F_R',loadX,barY+60);
    
    // Effort arrow
    lc.beginPath();lc.moveTo(effortX,barY-10);lc.lineTo(effortX,barY-60);
    lc.strokeStyle='#4CAF50';lc.lineWidth=3;lc.stroke();
    lc.beginPath();lc.moveTo(effortX-8,barY-50);lc.lineTo(effortX,barY-60);lc.lineTo(effortX+8,barY-50);
    lc.fillStyle='#4CAF50';lc.fill();
    lc.fillText(fe.toFixed(1)+' N',effortX,barY-70);
    lc.fillText('F_E',effortX,barY-80);
    
    // Distances
    lc.strokeStyle='rgba(255,255,255,0.3)';lc.lineWidth=1;lc.setLineDash([4,4]);
    lc.beginPath();lc.moveTo(effortX,barY+80);lc.lineTo(pivotX,barY+80);lc.stroke();
    lc.beginPath();lc.moveTo(pivotX,barY+90);lc.lineTo(loadX,barY+90);lc.stroke();
    lc.setLineDash([]);
    lc.fillStyle='#4CAF50';lc.fillText('d_E = '+Math.round(dE/5)+' cm',(effortX+pivotX)/2,barY+75);
    lc.fillStyle='#F44336';lc.fillText('d_R = '+Math.round(dR/5)+' cm',(pivotX+loadX)/2,barY+105);

    document.getElementById('deVal').textContent=Math.round(dE/5);
    document.getElementById('drVal').textContent=Math.round(dR/5);
    document.getElementById('imaVal').textContent=ima.toFixed(2);
    document.getElementById('feVal').textContent=fe.toFixed(1)+' N';
    document.getElementById('leverType').textContent=pv<30?'อันดับ 2':pv>70?'อันดับ 3':'อันดับ 1';
}
drawLever();
</script>
<?php include '../includes/footer.php'; ?>
