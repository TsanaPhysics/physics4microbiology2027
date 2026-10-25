<?php $pageTitle = 'จำลอง: กล้องจุลทรรศน์'; $basePath = '../'; include '../includes/header.php'; ?>
<section class="sim-hero"><div class="sim-hero-content"><div class="sim-badge">🎮 Simulation 11</div><h1>Virtual <span>Microscope</span></h1><p>จำลองกล้องจุลทรรศน์แบบ Compound</p></div></section>
<div class="sim-container">
    <div class="sim-wrapper">
        <div class="sim-canvas-area"><canvas id="micCanvas" width="700" height="500"></canvas></div>
        <div class="sim-controls">
            <h3>⚙️ ตั้งค่ากล้อง</h3>
            <div class="control-group"><label>Objective: </label>
                <select id="objective" onchange="drawMic()" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;">
                    <option value="4">4x (Scanning)</option>
                    <option value="10" selected>10x (Low Power)</option>
                    <option value="40">40x (High Power)</option>
                    <option value="100">100x (Oil Immersion)</option>
                </select>
            </div>
            <div class="control-group"><label>ตัวอย่าง: </label>
                <select id="specimen" onchange="drawMic()" style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd;">
                    <option value="bacteria">แบคทีเรีย (rod)</option>
                    <option value="yeast">ยีสต์</option>
                    <option value="blood">เซลล์เม็ดเลือด</option>
                    <option value="cheek">เซลล์เยื่อบุแก้ม</option>
                </select>
            </div>
            <div class="control-group"><label>โฟกัส: <span class="control-value" id="focusVal">50</span></label><input type="range" id="focus" min="0" max="100" value="50" oninput="drawMic()"></div>
            <div class="control-group"><label>ความสว่าง: <span class="control-value" id="brightVal">70</span></label><input type="range" id="bright" min="10" max="100" value="70" oninput="drawMic()"></div>
            <div class="sim-readout">
                <div class="readout-item"><span class="readout-label">กำลังขยายรวม</span><span class="readout-value" id="totalMag">—</span></div>
                <div class="readout-item"><span class="readout-label">FOV (μm)</span><span class="readout-value" id="fov">—</span></div>
                <div class="readout-item"><span class="readout-label">Resolution</span><span class="readout-value" id="res">—</span></div>
            </div>
        </div>
    </div>
</div>
<script>
const mc=document.getElementById('micCanvas').getContext('2d');
let cellSeed=[];for(let i=0;i<80;i++) cellSeed.push({x:Math.random(),y:Math.random(),r:Math.random()*0.5+0.5,rot:Math.random()*Math.PI*2});

function drawMic(){
    mc.clearRect(0,0,700,500);
    const obj=parseInt(document.getElementById('objective').value);
    const spec=document.getElementById('specimen').value;
    const focus=parseInt(document.getElementById('focus').value);
    const bright=parseInt(document.getElementById('bright').value);
    document.getElementById('focusVal').textContent=focus;
    document.getElementById('brightVal').textContent=bright;
    const totalMag=obj*10;
    const fov=Math.round(20000/obj);
    document.getElementById('totalMag').textContent=totalMag+'x';
    document.getElementById('fov').textContent=fov;
    document.getElementById('res').textContent=obj>=100?'0.2 μm':obj>=40?'0.5 μm':'1-2 μm';

    // Circular field of view
    mc.save();
    mc.beginPath();mc.arc(350,250,230,0,Math.PI*2);mc.clip();
    
    // Background
    const b=bright/100;
    mc.fillStyle=`rgba(${Math.round(240*b)},${Math.round(245*b)},${Math.round(255*b)},1)`;mc.fillRect(0,0,700,500);
    
    // Blur based on focus
    const blur=Math.abs(focus-50)/8;
    mc.filter=`blur(${blur}px)`;
    
    // Draw specimens
    const scale=obj/10;
    cellSeed.forEach(c=>{
        const cx=c.x*460+120, cy=c.y*300+100;
        mc.save(); mc.translate(cx,cy); mc.rotate(c.rot);
        if(spec==='bacteria'){
            mc.fillStyle='rgba(100,0,150,0.7)';
            mc.beginPath();
            const w=3*scale*c.r, h=8*scale*c.r;
            mc.ellipse(0,0,w,h,0,0,Math.PI*2);mc.fill();
        } else if(spec==='yeast'){
            const r=5*scale*c.r;
            mc.fillStyle='rgba(0,100,200,0.3)';mc.beginPath();mc.arc(0,0,r,0,Math.PI*2);mc.fill();
            mc.strokeStyle='rgba(0,100,200,0.5)';mc.lineWidth=1;mc.stroke();
            mc.fillStyle='rgba(0,50,150,0.4)';mc.beginPath();mc.arc(r*0.2,-r*0.1,r*0.4,0,Math.PI*2);mc.fill();
            if(Math.random()>0.7){mc.fillStyle='rgba(0,100,200,0.2)';mc.beginPath();mc.arc(r*0.8,0,r*0.5,0,Math.PI*2);mc.fill();}
        } else if(spec==='blood'){
            const r=4*scale*c.r;
            mc.fillStyle='rgba(220,50,50,0.5)';mc.beginPath();mc.arc(0,0,r,0,Math.PI*2);mc.fill();
            mc.fillStyle=`rgba(${Math.round(240*b)},${Math.round(245*b)},${Math.round(255*b)},0.5)`;mc.beginPath();mc.arc(0,0,r*0.3,0,Math.PI*2);mc.fill();
        } else {
            const r=12*scale*c.r;
            mc.fillStyle='rgba(150,200,255,0.15)';mc.beginPath();
            mc.ellipse(0,0,r,r*0.7,0,0,Math.PI*2);mc.fill();
            mc.strokeStyle='rgba(100,150,200,0.3)';mc.lineWidth=1;mc.stroke();
            mc.fillStyle='rgba(50,50,150,0.3)';mc.beginPath();mc.arc(0,0,r*0.3,0,Math.PI*2);mc.fill();
        }
        mc.restore();
    });
    
    mc.filter='none';
    mc.restore();
    
    // Circular border
    mc.beginPath();mc.arc(350,250,230,0,Math.PI*2);
    mc.strokeStyle='#333';mc.lineWidth=8;mc.stroke();
    
    // Scale bar
    const barMicrons=obj>=40?10:obj>=10?50:200;
    const barPx=barMicrons*(obj/10)*0.5;
    mc.fillStyle='#333';mc.fillRect(450,440,barPx,3);
    mc.font='11px monospace';mc.fillText(barMicrons+' μm',450,458);
}
drawMic();
</script>
<?php include '../includes/footer.php'; ?>
