<?php $pageTitle = 'จำลอง: การชนของอนุภาค'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 5</div><h1>Particle <span>Collision</span></h1><p>การชนแบบยืดหยุ่นและไม่ยืดหยุ่น</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="colCanvas" width="700" height="400"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่า</h3>
            <div class="control-group"><label>มวล 1: <span class="control-value" id="m1v">2 kg</span></label><input type="range" id="m1" min="1" max="10" value="2" oninput="document.getElementById('m1v').textContent=this.value+' kg'"></div>
            <div class="control-group"><label>ความเร็ว 1: <span class="control-value" id="v1v">3 m/s</span></label><input type="range" id="v1" min="1" max="8" value="3" oninput="document.getElementById('v1v').textContent=this.value+' m/s'"></div>
            <div class="control-group"><label>มวล 2: <span class="control-value" id="m2v">3 kg</span></label><input type="range" id="m2" min="1" max="10" value="3" oninput="document.getElementById('m2v').textContent=this.value+' kg'"></div>
            <div class="control-group"><label>ชนิด: </label><select id="colType" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;"><option value="elastic">ยืดหยุ่น</option><option value="inelastic">ไม่ยืดหยุ่น</option></select></div>
            <button class="sim-btn primary" onclick="startCol()">▶️ ชน!</button>
            <button class="sim-btn secondary" onclick="resetCol()">🔄 รีเซ็ต</button>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">p ก่อน</span><span class="readout-value" id="pBefore">—</span></div>
                <div class="readout-item"><span class="readout-label">p หลัง</span><span class="readout-value" id="pAfter">—</span></div>
                <div class="readout-item"><span class="readout-label">KE ก่อน</span><span class="readout-value" id="keBefore">—</span></div>
                <div class="readout-item"><span class="readout-label">KE หลัง</span><span class="readout-value" id="keAfter">—</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const cc = document.getElementById('colCanvas').getContext('2d');
let b1, b2, animating=false, collided=false;
function resetCol(){
    const m1=parseInt(document.getElementById('m1').value), m2=parseInt(document.getElementById('m2').value);
    b1={x:100,y:200,vx:0,r:15+m1*3,m:m1,color:'#FF9800'};
    b2={x:550,y:200,vx:0,r:15+m2*3,m:m2,color:'#00BCD4'};
    animating=false; collided=false;
    document.getElementById('pBefore').textContent='—';document.getElementById('pAfter').textContent='—';
    document.getElementById('keBefore').textContent='—';document.getElementById('keAfter').textContent='—';
    drawCol();
}
function startCol(){
    const v1=parseInt(document.getElementById('v1').value);
    b1.vx=v1*2; b2.vx=0; collided=false; animating=true;
    const pB=b1.m*v1; const keB=0.5*b1.m*v1*v1;
    document.getElementById('pBefore').textContent=pB.toFixed(1)+' kg·m/s';
    document.getElementById('keBefore').textContent=keB.toFixed(1)+' J';
}
function drawCol(){
    const cv=document.getElementById('colCanvas');
    cc.clearRect(0,0,cv.width,cv.height);
    cc.strokeStyle='rgba(255,255,255,0.1)';cc.lineWidth=1;
    cc.beginPath();cc.moveTo(0,cv.height-30);cc.lineTo(cv.width,cv.height-30);cc.stroke();
    [b1,b2].forEach(b=>{
        cc.beginPath();cc.arc(b.x,b.y,b.r,0,Math.PI*2);cc.fillStyle=b.color;cc.fill();
        cc.fillStyle='#fff';cc.font='bold 14px Prompt';cc.textAlign='center';
        cc.fillText(b.m+'kg',b.x,b.y+5);
    });
    if(animating){
        if(!collided && b1.x+b1.r >= b2.x-b2.r){
            collided=true;
            const type=document.getElementById('colType').value;
            const v1i=b1.vx/2, m1=b1.m, m2=b2.m;
            if(type==='elastic'){
                b1.vx = ((m1-m2)/(m1+m2))*v1i*2;
                b2.vx = (2*m1/(m1+m2))*v1i*2;
            } else {
                const vf = (m1*v1i)/(m1+m2);
                b1.vx=vf*2; b2.vx=vf*2;
            }
            const pA=m1*(b1.vx/2)+m2*(b2.vx/2);
            const keA=0.5*m1*(b1.vx/2)**2+0.5*m2*(b2.vx/2)**2;
            document.getElementById('pAfter').textContent=pA.toFixed(1)+' kg·m/s';
            document.getElementById('keAfter').textContent=keA.toFixed(1)+' J';
        }
        b1.x+=b1.vx; b2.x+=b2.vx;
    }
    requestAnimationFrame(drawCol);
}
resetCol(); drawCol();
</script>
<?php include '../includes/footer.php'; ?>
