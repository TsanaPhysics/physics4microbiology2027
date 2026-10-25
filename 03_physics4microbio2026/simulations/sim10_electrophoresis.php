<?php $pageTitle = '3D Electrophoresis Analysis | Bio-Digital Lab'; $basePath = '../'; include '../includes/header.php'; ?>

<!-- Three.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.154.0/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.154.0/examples/js/controls/OrbitControls.js"></script>

<section class="sim-hero">
    <div class="sim-hero-content">
        <div class="sim-badge reveal"><i class="fas fa-cube"></i> High-Fidelity 3D Simulation</div>
        <h1>3D <span>Electrophoresis</span></h1>
        <p>การวิเคราะห์การแยกสารพันธุกรรมด้วยสนามไฟฟ้าในมิติที่สาม พร้อมระบบ AI Vision</p>
    </div>
</section>

<div class="sim-container">
    <div class="sim-wrapper">
        <!-- 3D Canvas Area -->
        <div class="sim-canvas-area reveal" id="canvas-container">
            <div id="three-canvas-target"></div>
            <div style="position:absolute; top:20px; left:20px; pointer-events:none;">
                <div class="ai-insight-card" style="background:rgba(0,0,0,0.6); border:1px solid var(--primary);">
                    <i class="fas fa-video"></i> Live Feed: <span id="camera-status">Active</span>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="sim-controls reveal">
            <h3><i class="fas fa-bolt"></i> Power Supply</h3>
            
            <div class="control-group">
                <label>Constant Voltage (V) <span class="control-value" id="voltVal">120</span></label>
                <input type="range" id="voltage" min="50" max="250" value="120" oninput="updateVoltage()">
            </div>
            
            <div class="control-group">
                <label>Agarose Concentration <span class="control-value" id="agarVal">1.2%</span></label>
                <input type="range" id="agarose" min="0.5" max="3.0" step="0.1" value="1.2" oninput="updateAgarose()">
            </div>

            <div style="margin-top: 2rem;">
                <button class="sim-btn primary" onclick="runSimulation()" id="runBtn">
                    <i class="fas fa-play"></i> Start Migration
                </button>
                <button class="sim-btn secondary" onclick="resetSim()">
                    <i class="fas fa-undo"></i> Reset Gel
                </button>
            </div>

            <div class="sim-readout">
                <div class="readout-item">
                    <span class="readout-label">E-Field (V/cm)</span>
                    <span class="readout-value" id="efVal">6.0</span>
                </div>
                <div class="readout-item">
                    <span class="readout-label">Run Time (min)</span>
                    <span class="readout-value" id="timeVal">0</span>
                </div>
            </div>
        </div>

        <!-- AI Assistant Sidebar -->
        <div class="sim-sidebar reveal">
            <h3><i class="fas fa-brain"></i> AI Vision Lab</h3>
            <div id="ai-vision-insights">
                <div class="ai-insight-card">
                    <i class="fas fa-search"></i> <strong>Gel Analysis:</strong> ระบบ AI พร้อมทำการ Segmentation ทันทีที่พบสัญญาณ DNA
                </div>
            </div>
            
            <div style="margin-top: 1.5rem; font-size: 0.85rem; line-height: 1.6;">
                <p><i class="fas fa-dna" style="color:var(--primary);"></i> <strong>Molecular Physics:</strong> ความเร็ว <var>v = μE</var> โดยที่ <var>μ</var> สัมพันธ์ผกผันกับ Log ของขนาด DNA</p>
                <p style="margin-top: 1rem;"><i class="fas fa-robot" style="color:var(--secondary);"></i> <strong>AI Insight:</strong> เราใช้ CNNs (Convolutional Neural Networks) เพื่อตรวจหา 'Bands' และคำนวณขนาด (bp) โดยเปรียบเทียบกับ Ladder อัตโนมัติ</p>
            </div>

            <div id="band-detector" style="margin-top: 1.5rem; padding: 10px; background: rgba(0,0,0,0.3); border-radius: 8px; border: 1px dashed var(--border-glass); display:none;">
                <div style="font-size: 0.75rem; color: var(--primary); margin-bottom: 5px;">Detected Bands (AI Inference):</div>
                <div id="detected-list" style="font-size: 0.8rem; font-family: var(--font-mono);"></div>
            </div>
        </div>
    </div>
</div>

<script>
// --- Three.js Implementation ---
let scene, camera, renderer, controls, gel, tank;
let bands = [], running = false, time = 0;
let voltage = 120, agarose = 1.2;

function init3D() {
    const container = document.getElementById('three-canvas-target');
    const w = container.parentElement.offsetWidth;
    const h = container.parentElement.offsetHeight;

    scene = new THREE.Scene();
    scene.background = new THREE.Color(0x020617);

    camera = new THREE.PerspectiveCamera(45, w/h, 0.1, 1000);
    camera.position.set(15, 12, 15);

    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(w, h);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;

    // Lights
    const ambientLight = new THREE.AmbientLight(0x404040, 2);
    scene.add(ambientLight);
    const pointLight = new THREE.PointLight(0x2dd4bf, 5, 100);
    pointLight.position.set(10, 10, 10);
    scene.add(pointLight);

    // Tank (Glass Box)
    const tankGeo = new THREE.BoxGeometry(10, 2, 6);
    const tankMat = new THREE.MeshPhysicalMaterial({
        color: 0x2dd4bf,
        transparent: true,
        opacity: 0.1,
        transmission: 0.9,
        thickness: 0.5,
        roughness: 0,
        metalness: 0
    });
    tank = new THREE.Mesh(tankGeo, tankMat);
    scene.add(tank);

    // Gel Block
    const gelGeo = new THREE.BoxGeometry(8, 0.4, 5);
    const gelMat = new THREE.MeshStandardMaterial({
        color: 0x0ea5e9,
        transparent: true,
        opacity: 0.4,
        emissive: 0x0ea5e9,
        emissiveIntensity: 0.2
    });
    gel = new THREE.Mesh(gelGeo, gelMat);
    gel.position.y = -0.4;
    scene.add(gel);

    // Wells (Cuts in Gel)
    for(let i=0; i<6; i++) {
        const wellGeo = new THREE.BoxGeometry(0.3, 0.2, 0.4);
        const wellMat = new THREE.MeshBasicMaterial({ color: 0x000000 });
        const well = new THREE.Mesh(wellGeo, wellMat);
        well.position.set(-3.5, -0.2, -2 + i*0.8);
        scene.add(well);
    }

    // Add Electrodes
    createElectrode(-4.5, 0xff3333); // Cathode
    createElectrode(4.5, 0x33ff33);  // Anode

    createDNAData();
}

function createElectrode(x, color) {
    const geo = new THREE.CapsuleGeometry(0.05, 5, 4, 8);
    const mat = new THREE.MeshStandardMaterial({ color: color, emissive: color, emissiveIntensity: 1 });
    const el = new THREE.Mesh(geo, mat);
    el.position.x = x;
    el.rotation.z = Math.PI / 2;
    scene.add(el);
}

function createDNAData() {
    // Reset bands
    bands.forEach(b => scene.remove(b.mesh));
    bands = [];

    const sampleBands = [
        { size: 10000, lane: 0, color: 0x2dd4bf }, // Ladder
        { size: 5000, lane: 0, color: 0x2dd4bf },
        { size: 2000, lane: 0, color: 0x2dd4bf },
        { size: 4500, lane: 2, color: 0xa855f7 }, // Sample 1
        { size: 1500, lane: 2, color: 0xa855f7 },
        { size: 4500, lane: 4, color: 0x06b6d4 }, // Sample 2
    ];

    sampleBands.forEach(b => {
        const geo = new THREE.PlaneGeometry(0.1, 0.5);
        const mat = new THREE.MeshBasicMaterial({ 
            color: b.color, 
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.8
        });
        const mesh = new THREE.Mesh(geo, mat);
        mesh.rotation.x = Math.PI / 2;
        mesh.position.set(-3.5, -0.21, -2 + b.lane*0.8);
        
        bands.push({
            mesh: mesh,
            size: b.size,
            lane: b.lane,
            speed: (1 / Math.log10(b.size)) * 2,
            progress: 0
        });
        scene.add(mesh);
    });
}

function updateVoltage() {
    voltage = parseInt(document.getElementById('voltage').value);
    document.getElementById('voltVal').textContent = voltage;
    document.getElementById('efVal').textContent = (voltage / 20).toFixed(1);
}

function updateAgarose() {
    agarose = parseFloat(document.getElementById('agarose').value);
    document.getElementById('agarVal').textContent = agarose.toFixed(1) + '%';
}

function runSimulation() {
    running = !running;
    document.getElementById('runBtn').innerHTML = running ? 
        '<i class="fas fa-pause"></i> Pause Run' : 
        '<i class="fas fa-play"></i> Resume Run';
    
    if(running) document.getElementById('band-detector').style.display = 'block';
}

function resetSim() {
    running = false;
    time = 0;
    document.getElementById('runBtn').innerHTML = '<i class="fas fa-play"></i> Start Migration';
    document.getElementById('timeVal').textContent = '0';
    document.getElementById('band-detector').style.display = 'none';
    createDNAData();
}

function animate() {
    requestAnimationFrame(animate);
    controls.update();

    if(running) {
        time += 0.1;
        document.getElementById('timeVal').textContent = Math.floor(time);
        
        let detectionLog = "";
        bands.forEach(b => {
            const moveFactor = (voltage / 120) * (1 / agarose);
            b.progress += b.speed * 0.005 * moveFactor;
            b.mesh.position.x = -3.5 + b.progress * 7;
            
            if(b.mesh.position.x > 4) b.mesh.visible = false;

            // AI Vision Simulation
            if(b.progress > 0.1 && b.lane === 0) {
                detectionLog += `[FOUND] Ladder: ${b.size}bp<br>`;
            }
        });
        document.getElementById('detected-list').innerHTML = detectionLog;

        // Visual AI updates
        if(Math.floor(time) % 10 === 0) {
            document.getElementById('ai-vision-insights').innerHTML = `
                <div class="ai-insight-card">
                    <i class="fas fa-check-circle"></i> <strong>AI Analysis:</strong> ตรวจพบความเข้มของสัญญาณ DNA ในเลนที่ 1 และ 3 
                </div>
            `;
        }
    }

    renderer.render(scene, camera);
}

// Responsive
window.addEventListener('resize', () => {
    const container = document.getElementById('three-canvas-target');
    const w = container.parentElement.offsetWidth;
    const h = container.parentElement.offsetHeight;
    camera.aspect = w/h;
    camera.updateProjectionMatrix();
    renderer.setSize(w, h);
});

init3D();
animate();
</script>

<?php include '../includes/footer.php'; ?>
