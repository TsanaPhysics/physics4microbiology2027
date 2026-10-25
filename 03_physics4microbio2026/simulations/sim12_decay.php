<?php $pageTitle = 'จำลอง: การสลายตัวกัมมันตรังสี'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 12</div><h1>Radioactive <span>Decay</span></h1><p>จำลองการสลายตัวของนิวเคลียสกัมมันตรังสี</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="decCanvas" width="700" height="500"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่า</h3>
            <div class="control-group"><label>จำนวนนิวเคลียสเริ่มต้น: <span class="control-value" id="n0Val">200</span></label><input type="range" id="n0" min="50" max="500" step="10" value="200" oninput="document.getElementById('n0Val').textContent=this.value"></div>
            <div class="control-group"><label>ครึ่งชีวิต (วินาที): <span class="control-value" id="halfVal">3</span></label><input type="range" id="halfLife" min="1" max="10" value="3" oninput="document.getElementById('halfVal').textContent=this.value"></div>
            <div class="control-group"><label>ไอโซโทป: </label>
                <select id="isotope" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;" onchange="updateIsotope()">
                    <option value="custom">กำหนดเอง</option>
                    <option value="I131">I-131 (8.02 d)</option>
                    <option value="P32">P-32 (14.3 d)</option>
                    <option value="C14">C-14 (5730 y)</option>
                    <option value="Tc99m">Tc-99m (6.01 h)</option>
                </select>
            </div>
            <button class="sim-btn primary" onclick="startDecay()">▶️ เริ่มสลายตัว</button>
            <button class="sim-btn secondary" onclick="resetDecay()">🔄 รีเซ็ต</button>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">N เหลือ</span><span class="readout-value" id="nRemain">—</span></div>
                <div class="readout-item"><span class="readout-label">N สลาย</span><span class="readout-value" id="nDecayed">—</span></div>
                <div class="readout-item"><span class="readout-label">เวลา</span><span class="readout-value" id="decTime">0 s</span></div>
                <div class="readout-item"><span class="readout-label">Activity</span><span class="readout-value" id="activity">—</span></div>
                <div class="readout-item"><span class="readout-label">ครึ่งชีวิตที่ผ่าน</span><span class="readout-value" id="halfPassed">0</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const dc=document.getElementById('decCanvas').getContext('2d');
let atoms=[], decRunning=false, decT=0, decayHistory=[];

function updateIsotope(){
    const iso=document.getElementById('isotope').value;
    const info={I131:'ใช้ในรักษามะเร็งต่อมไทรอยด์',P32:'ใช้ trace DNA synthesis',C14:'ใช้หาอายุทางโบราณคดี','Tc99m':'ใช้ในงาน imaging (SPECT)',custom:''};
    // Just update the display name
}

function initAtoms(){
    const n=parseInt(document.getElementById('n0').value);
    atoms=[];
    for(let i=0;i<n;i++){
        atoms.push({x:50+Math.random()*600,y:50+Math.random()*280,active:true,decayTime:null});
    }
    decayHistory=[{t:0,n:n}];
}

function startDecay(){
    if(!decRunning){decRunning=true;decT=0;initAtoms();}
}

function resetDecay(){
    decRunning=false;decT=0;atoms=[];decayHistory=[];
    document.getElementById('nRemain').textContent='—';document.getElementById('nDecayed').textContent='—';
    document.getElementById('decTime').textContent='0 s';document.getElementById('activity').textContent='—';
    document.getElementById('halfPassed').textContent='0';
}

function drawDecay(){
    dc.clearRect(0,0,700,500);
    const hl=parseFloat(document.getElementById('halfLife').value);
    const lambda=Math.log(2)/hl;
    
    if(decRunning){
        decT+=1/60;
        atoms.forEach(a=>{
            if(a.active && Math.random()<lambda/60){
                a.active=false;a.decayTime=decT;
            }
        });
        const nActive=atoms.filter(a=>a.active).length;
        const nDec=atoms.length-nActive;
        if(Math.round(decT*10)%5===0) decayHistory.push({t:decT,n:nActive});
        
        document.getElementById('nRemain').textContent=nActive;
        document.getElementById('nDecayed').textContent=nDec;
        document.getElementById('decTime').textContent=decT.toFixed(1)+' s';
        document.getElementById('activity').textContent=Math.round(nActive*lambda)+' dps';
        document.getElementById('halfPassed').textContent=(decT/hl).toFixed(1);
    }
    
    // Draw atoms
    atoms.forEach(a=>{
        dc.beginPath();dc.arc(a.x,a.y,4,0,Math.PI*2);
        if(a.active){dc.fillStyle='#FF4081';}
        else{dc.fillStyle='rgba(100,100,100,0.3)';}
        dc.fill();
    });
    
    // Legend
    dc.fillStyle='#FF4081';dc.beginPath();dc.arc(20,350,5,0,Math.PI*2);dc.fill();
    dc.fillStyle='#fff';dc.font='11px Sarabun';dc.fillText('ยังไม่สลาย',32,354);
    dc.fillStyle='rgba(100,100,100,0.5)';dc.beginPath();dc.arc(20,370,5,0,Math.PI*2);dc.fill();
    dc.fillStyle='#aaa';dc.fillText('สลายแล้ว',32,374);
    
    // Decay curve graph (bottom)
    if(decayHistory.length>1){
        const gx=50,gy=340,gw=600,gh=140;
        dc.fillStyle='rgba(255,255,255,0.03)';dc.fillRect(gx,gy,gw,gh);
        dc.strokeStyle='rgba(255,255,255,0.2)';dc.lineWidth=1;
        dc.beginPath();dc.moveTo(gx,gy);dc.lineTo(gx,gy+gh);dc.lineTo(gx+gw,gy+gh);dc.stroke();
        
        // Half-life lines
        for(let i=1;i<=5;i++){
            const tx=gx+(i*hl/Math.max(decT,hl*5))*gw;
            if(tx<gx+gw){
                dc.strokeStyle='rgba(255,255,255,0.1)';dc.setLineDash([3,3]);
                dc.beginPath();dc.moveTo(tx,gy);dc.lineTo(tx,gy+gh);dc.stroke();
                dc.setLineDash([]);
                dc.fillStyle='rgba(255,255,255,0.3)';dc.font='9px monospace';
                dc.fillText('t½×'+i,tx-10,gy+gh+12);
            }
        }
        
        // Curve
        dc.beginPath();
        dc.moveTo(gx,gy+gh-(decayHistory[0].n/atoms.length)*gh);
        decayHistory.forEach(d=>{
            const px=gx+(d.t/Math.max(decT,hl*5))*gw;
            const py=gy+gh-(d.n/atoms.length)*gh;
            dc.lineTo(px,py);
        });
        dc.strokeStyle='#FF4081';dc.lineWidth=2;dc.stroke();
        
        // Theoretical curve
        dc.beginPath();dc.strokeStyle='rgba(255,255,0,0.3)';dc.lineWidth=1;dc.setLineDash([4,4]);
        for(let t=0;t<=Math.max(decT,hl*5);t+=0.1){
            const px=gx+(t/Math.max(decT,hl*5))*gw;
            const py=gy+gh-(Math.exp(-lambda*t))*gh;
            t===0?dc.moveTo(px,py):dc.lineTo(px,py);
        }
        dc.stroke();dc.setLineDash([]);
        
        // Labels
        dc.fillStyle='#FF4081';dc.font='10px Sarabun';dc.fillText('● จำลอง',gx+gw-120,gy+15);
        dc.fillStyle='rgba(255,255,0,0.5)';dc.fillText('— ทฤษฎี N=N₀e^(-λt)',gx+gw-120,gy+30);
    }
    
    requestAnimationFrame(drawDecay);
}
drawDecay();
</script>
<?php include '../includes/footer.php'; ?>
