<?php $pageTitle = 'จำลอง: ATP Synthase Motor'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 7</div><h1>ATP Synthase <span>Motor</span></h1><p>จำลองมอเตอร์โมเลกุล — การสังเคราะห์ ATP</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="atpCanvas" width="700" height="500"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่า</h3>
            <div class="control-group"><label>Proton Flow: <span class="control-value" id="flowVal">5</span></label><input type="range" id="pFlow" min="0" max="10" value="5" oninput="document.getElementById('flowVal').textContent=this.value"></div>
            <div class="control-group"><label>ΔpH: <span class="control-value" id="phVal">1.4</span></label><input type="range" id="dpH" min="0" max="3" step="0.1" value="1.4" oninput="document.getElementById('phVal').textContent=parseFloat(this.value).toFixed(1)"></div>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">RPM</span><span class="readout-value" id="atpRpm">—</span></div>
                <div class="readout-item"><span class="readout-label">ATP/s</span><span class="readout-value" id="atpRate">—</span></div>
                <div class="readout-item"><span class="readout-label">ATP รวม</span><span class="readout-value" id="atpTotal">0</span></div>
                <div class="readout-item"><span class="readout-label">Efficiency</span><span class="readout-value" id="atpEff">~40%</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const ac=document.getElementById('atpCanvas').getContext('2d');
let rot=0, atpCount=0;
function drawATP(){
    ac.clearRect(0,0,700,500);
    const cx=350,cy=280,flow=parseInt(document.getElementById('pFlow').value);
    const speed=flow*0.02;
    rot+=speed;
    // Membrane
    ac.fillStyle='rgba(139,69,19,0.3)';ac.fillRect(0,190,700,20);ac.fillRect(0,370,700,20);
    ac.fillStyle='rgba(255,255,255,0.05)';ac.font='12px Sarabun';
    ac.fillStyle='#aaa';ac.fillText('IMS (pH ต่ำ, H⁺ มาก)',10,185);ac.fillText('Matrix (pH สูง)',10,410);
    // F₀ rotor
    ac.save();ac.translate(cx,cy-70);ac.rotate(rot);
    for(let i=0;i<10;i++){ac.save();ac.rotate(i*Math.PI/5);ac.fillStyle=i%2?'#7C4DFF':'#B388FF';ac.fillRect(-8,-40,16,35);ac.restore();}
    ac.restore();
    // Stalk
    ac.save();ac.translate(cx,cy+30);ac.rotate(rot);
    ac.fillStyle='#FFA000';ac.fillRect(-6,-60,12,100);
    ac.beginPath();ac.moveTo(-15,40);ac.lineTo(15,40);ac.lineTo(10,-10);ac.lineTo(-10,-10);ac.closePath();ac.fillStyle='#FF6F00';ac.fill();
    ac.restore();
    // F₁ head
    ac.save();ac.translate(cx,cy+80);
    for(let i=0;i<3;i++){ac.save();ac.rotate(i*Math.PI*2/3+rot*0.33);ac.translate(0,-25);
    ac.fillStyle=['#4CAF50','#2196F3','#F44336'][i];ac.beginPath();ac.arc(0,0,22,0,Math.PI*2);ac.fill();
    ac.fillStyle='#fff';ac.font='bold 10px Prompt';ac.textAlign='center';ac.fillText(['α','β','γ'][i],0,4);
    ac.restore();}ac.restore();
    // Protons
    if(flow>0){for(let i=0;i<flow;i++){const px=cx-50+Math.random()*100,py=170+Math.random()*20;
    ac.fillStyle='#FF4081';ac.font='bold 12px monospace';ac.fillText('H⁺',px,py);}}
    // ATP generation
    if(flow>0){
        const rate=flow*3;
        if(Math.random()<speed*2){atpCount++;const x=cx+60+Math.random()*80,y=cy+60+Math.random()*40;
        ac.fillStyle='#FFD700';ac.font='bold 14px Prompt';ac.fillText('ATP✨',x,y);}
        document.getElementById('atpRpm').textContent=Math.round(flow*100);
        document.getElementById('atpRate').textContent=rate;
        document.getElementById('atpTotal').textContent=atpCount;
    }
    requestAnimationFrame(drawATP);
}
drawATP();
</script>
<?php include '../includes/footer.php'; ?>
