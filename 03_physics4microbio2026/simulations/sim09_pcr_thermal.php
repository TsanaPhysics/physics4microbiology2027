<?php $pageTitle = 'จำลอง: PCR Thermal Cycler'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 9</div><h1>PCR <span>Thermal Cycler</span></h1><p>จำลองการทำ Polymerase Chain Reaction</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="pcrCanvas" width="700" height="450"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่า PCR</h3>
            <div class="control-group"><label>Denaturation (°C): <span class="control-value" id="denVal">95</span></label><input type="range" id="denT" min="90" max="98" value="95" oninput="document.getElementById('denVal').textContent=this.value"></div>
            <div class="control-group"><label>Annealing (°C): <span class="control-value" id="annVal">55</span></label><input type="range" id="annT" min="45" max="65" value="55" oninput="document.getElementById('annVal').textContent=this.value"></div>
            <div class="control-group"><label>Extension (°C): <span class="control-value" id="extVal">72</span></label><input type="range" id="extT" min="68" max="75" value="72" oninput="document.getElementById('extVal').textContent=this.value"></div>
            <div class="control-group"><label>จำนวนรอบ: <span class="control-value" id="cycVal">30</span></label><input type="range" id="cycles" min="5" max="40" value="30" oninput="document.getElementById('cycVal').textContent=this.value"></div>
            <button class="sim-btn primary" onclick="startPCR()">▶️ เริ่ม PCR</button>
            <button class="sim-btn secondary" onclick="resetPCR()">🔄 รีเซ็ต</button>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">รอบที่</span><span class="readout-value" id="curCycle">0</span></div>
                <div class="readout-item"><span class="readout-label">อุณหภูมิ</span><span class="readout-value" id="curTemp">25°C</span></div>
                <div class="readout-item"><span class="readout-label">ขั้นตอน</span><span class="readout-value" id="curStep">พร้อม</span></div>
                <div class="readout-item"><span class="readout-label">DNA copies</span><span class="readout-value" id="dnaCount">1</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const pc=document.getElementById('pcrCanvas').getContext('2d');
let pcrRunning=false, pcrTime=0, pcrCycle=0, pcrTemp=25, tempHistory=[];
const phaseColors={den:'#F44336',ann:'#2196F3',ext:'#4CAF50'};

function startPCR(){ pcrRunning=true; pcrTime=0; pcrCycle=0; tempHistory=[]; }
function resetPCR(){ pcrRunning=false; pcrTime=0; pcrCycle=0; pcrTemp=25; tempHistory=[];
    document.getElementById('curCycle').textContent='0';document.getElementById('curTemp').textContent='25°C';
    document.getElementById('curStep').textContent='พร้อม';document.getElementById('dnaCount').textContent='1'; }

function drawPCR(){
    pc.clearRect(0,0,700,450);
    const maxCycles=parseInt(document.getElementById('cycles').value);
    const denT=parseInt(document.getElementById('denT').value);
    const annT=parseInt(document.getElementById('annT').value);
    const extT=parseInt(document.getElementById('extT').value);
    
    if(pcrRunning && pcrCycle<maxCycles){
        pcrTime+=0.5;
        const phase=pcrTime%90; // 30s each phase
        let targetT, stepName, stepColor;
        if(phase<30){targetT=denT;stepName='Denaturation';stepColor=phaseColors.den;}
        else if(phase<60){targetT=annT;stepName='Annealing';stepColor=phaseColors.ann;}
        else{targetT=extT;stepName='Extension';stepColor=phaseColors.ext;}
        pcrTemp+=(targetT-pcrTemp)*0.1;
        if(phase<1 && pcrTime>1){pcrCycle++;document.getElementById('curCycle').textContent=pcrCycle;}
        document.getElementById('curTemp').textContent=Math.round(pcrTemp)+'°C';
        document.getElementById('curStep').textContent=stepName;
        document.getElementById('dnaCount').textContent=Math.pow(2,pcrCycle).toLocaleString();
        tempHistory.push({t:pcrTemp,c:stepColor});
        if(tempHistory.length>400) tempHistory.shift();
    }
    
    // Draw temperature chart
    pc.fillStyle='rgba(255,255,255,0.05)';pc.fillRect(50,20,620,360);
    // Y axis
    pc.strokeStyle='rgba(255,255,255,0.2)';pc.lineWidth=1;
    pc.beginPath();pc.moveTo(50,20);pc.lineTo(50,380);pc.lineTo(670,380);pc.stroke();
    [25,45,55,72,95].forEach(t=>{
        const y=380-(t-20)*4;
        pc.fillStyle='rgba(255,255,255,0.3)';pc.font='10px monospace';pc.textAlign='right';
        pc.fillText(t+'°C',45,y+3);
        pc.strokeStyle='rgba(255,255,255,0.05)';pc.beginPath();pc.moveTo(50,y);pc.lineTo(670,y);pc.stroke();
    });
    
    // Draw temp curve
    if(tempHistory.length>1){
        const step=620/400;
        for(let i=1;i<tempHistory.length;i++){
            pc.beginPath();
            pc.moveTo(50+(i-1)*step, 380-(tempHistory[i-1].t-20)*4);
            pc.lineTo(50+i*step, 380-(tempHistory[i].t-20)*4);
            pc.strokeStyle=tempHistory[i].c;pc.lineWidth=2;pc.stroke();
        }
    }
    
    // Legend
    pc.font='12px Sarabun';
    pc.fillStyle=phaseColors.den;pc.fillRect(500,10,12,12);pc.fillStyle='#fff';pc.fillText('Denaturation',516,21);
    pc.fillStyle=phaseColors.ann;pc.fillRect(500,28,12,12);pc.fillStyle='#fff';pc.fillText('Annealing',516,39);
    pc.fillStyle=phaseColors.ext;pc.fillRect(500,46,12,12);pc.fillStyle='#fff';pc.fillText('Extension',516,57);
    
    // DNA amplification bar
    if(pcrCycle>0){
        const barW=Math.min(Math.log2(Math.pow(2,pcrCycle))/maxCycles*600,600);
        pc.fillStyle='rgba(255,215,0,0.3)';pc.fillRect(50,410,barW,25);
        pc.fillStyle='#FFD700';pc.font='bold 12px Prompt';pc.textAlign='left';
        pc.fillText('2^'+pcrCycle+' = '+Math.pow(2,pcrCycle).toLocaleString()+' copies',60,427);
    }
    
    requestAnimationFrame(drawPCR);
}
drawPCR();
</script>
<?php include '../includes/footer.php'; ?>
