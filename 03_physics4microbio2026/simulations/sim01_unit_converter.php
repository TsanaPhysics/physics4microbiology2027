<?php
$pageTitle = 'จำลอง 3 มิติ: สเกลจุลภาคและตัวแปลงหน่วยทางฟิสิกส์จุลชีววิทยา';
$basePath = '../';
include '../includes/header.php';
?>

<!-- Three.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-slate-900 via-emerald-950/40 to-slate-900 border border-emerald-500/30 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono uppercase tracking-wider mb-2">
                    🎮 3D PBR Simulation 01 • Micro & Nano Scale Engine
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-wide">
                    สเกลชีวฟิสิกส์ 3 มิติ และระบบแปลงหน่วยเลขนัยสำคัญ
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 mt-1 max-w-2xl leading-relaxed">
                    สำรวจมิติขนาดทางกายภาพตั้งแต่หยดน้ำไมโครปิเปต ($1\text{ mm}$), เซลล์ยีสต์ ($7\ \mu\text{m}$), แบคทีเรีย *E. coli* ($2\ \mu\text{m}$), จนถึงไวรัส ($100\text{ nm}$) พร้อมระบบแปลงหน่วยแม่นยำสูง
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="../../virtual_lab/index.html" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-teal-300 text-slate-950 font-bold text-xs flex items-center gap-2 shadow-lg shadow-emerald-950/50 transition transform active:scale-95">
                    <i class="fa-solid fa-cube"></i> เข้าสู่ห้องแล็บ 3D ฉบับเต็ม (13 Labs)
                </a>
            </div>
        </div>
    </div>

    <!-- Main Grid: 3D Scale Visualizer + Unit Converter Tool -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Left: 3D Interactive Three.js Scale Navigator (Cols 7) -->
        <div class="lg:col-span-7 space-y-4">
            <div class="bg-slate-900/80 border border-emerald-500/30 rounded-3xl p-5 shadow-2xl backdrop-blur-xl relative overflow-hidden">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-atom text-emerald-400 text-lg"></i>
                        <h2 class="text-sm font-bold text-white">แบบจำลองสเกล 3 มิติเชิงกายภาพ (3D Scale PBR)</h2>
                    </div>
                    <span id="scaleLabel" class="px-2.5 py-0.5 rounded-full bg-emerald-950 text-emerald-300 border border-emerald-500/40 text-xs font-mono font-bold">
                        1.0 µm / grid
                    </span>
                </div>

                <!-- 3D Canvas -->
                <div id="scale3dContainer" class="w-full h-[360px] sm:h-[420px] rounded-2xl bg-[#060b18] border border-slate-800 overflow-hidden relative cursor-grab active:cursor-grabbing shadow-inner">
                    <div class="absolute top-3 left-3 z-10 flex gap-1.5 bg-slate-950/80 backdrop-blur-md p-1 rounded-xl border border-slate-800 text-xs">
                        <button onclick="focusScale('droplet')" class="px-2.5 py-1 rounded-lg font-bold bg-slate-800 text-slate-300 hover:bg-emerald-600 hover:text-white transition">💧 หยดน้ำ (1 mm)</button>
                        <button onclick="focusScale('bacteria')" class="px-2.5 py-1 rounded-lg font-bold bg-emerald-600 text-white transition">🦠 แบคทีเรีย (2 µm)</button>
                        <button onclick="focusScale('virus')" class="px-2.5 py-1 rounded-lg font-bold bg-slate-800 text-slate-300 hover:bg-emerald-600 hover:text-white transition">🧬 ไวรัส (100 nm)</button>
                    </div>
                    <div class="absolute bottom-3 left-3 z-10 text-[10px] text-slate-400 bg-slate-950/80 px-2 py-1 rounded border border-slate-800 pointer-events-none">
                        คลิกซ้ายลากเพื่อหมุน 360° • สกรอลล์เมาส์เพื่อซูม
                    </div>
                </div>

                <!-- Scale Slider -->
                <div class="mt-4 space-y-2">
                    <div class="flex justify-between text-xs">
                        <span class="text-slate-300 font-semibold">ระดับการซูมกำลังขยายกล้องเสมือน (Zoom Factor):</span>
                        <span id="zoomReadout" class="font-mono font-bold text-sky-400">1,000× (สเกลเซลล์แบคทีเรีย)</span>
                    </div>
                    <input type="range" id="zoomSlider" min="1" max="10000" value="1000" step="50" oninput="onZoomSlider(this.value)"
                           class="w-full accent-emerald-500 h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer">
                </div>
            </div>
        </div>

        <!-- Right: Glassmorphic Converter & Sig Figs Tool (Cols 5) -->
        <div class="lg:col-span-5 space-y-5">

            <!-- Converter Card -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-5 shadow-2xl backdrop-blur-xl space-y-4">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <h3 class="text-sm font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-calculator text-emerald-400"></i> ตัวแปลงหน่วยฟิสิกส์จุลชีววิทยา
                    </h3>
                    <span class="text-[10px] text-slate-400 font-mono">SI Standard</span>
                </div>

                <!-- Category Select -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">ประเภทการแปลงมิติ:</label>
                    <select id="convType" onchange="updateUnits()" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2.5 text-xs text-slate-200 focus:outline-none focus:border-emerald-500 font-semibold">
                        <option value="length">📏 ความยาว (m, cm, mm, µm, nm, Å)</option>
                        <option value="volume">🧪 ปริมาตร (L, mL, µL, nL, cm³)</option>
                        <option value="mass">⚖️ มวล (kg, g, mg, µg, ng)</option>
                        <option value="concentration">🧫 ความเข้มข้น (M, mM, µM, nM, CFU/mL)</option>
                        <option value="temperature">🌡️ อุณหภูมิ (°C, K, °F)</option>
                    </select>
                </div>

                <!-- Input / Output Grid -->
                <div class="grid grid-cols-1 gap-3">
                    <div class="bg-slate-950/70 border border-slate-800/80 rounded-2xl p-3 space-y-1.5">
                        <label class="text-[11px] font-semibold text-slate-400 block">ค่าตั้งต้น (Input Value):</label>
                        <div class="flex gap-2">
                            <input type="number" id="inputVal" value="1" step="any" oninput="convert()"
                                   class="w-full bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-sm text-emerald-400 font-mono font-bold focus:outline-none focus:border-emerald-500">
                            <select id="fromUnit" onchange="convert()" class="bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-xs text-slate-200 font-mono focus:outline-none focus:border-emerald-500"></select>
                        </div>
                    </div>

                    <div class="flex justify-center text-emerald-400 text-lg">
                        <i class="fa-solid fa-arrow-down"></i>
                    </div>

                    <div class="bg-slate-950/70 border border-emerald-500/30 rounded-2xl p-3 space-y-1.5">
                        <label class="text-[11px] font-semibold text-emerald-400 block">ผลลัพธ์แปลงหน่วย (Converted Value):</label>
                        <div class="flex gap-2">
                            <div id="resultVal" class="w-full bg-slate-900 border border-emerald-500/40 rounded-xl px-3 py-2 text-sm text-sky-300 font-mono font-bold flex items-center overflow-x-auto">
                                —
                            </div>
                            <select id="toUnit" onchange="convert()" class="bg-slate-900 border border-slate-700 rounded-xl px-3 py-2 text-xs text-slate-200 font-mono focus:outline-none focus:border-emerald-500"></select>
                        </div>
                    </div>
                </div>

                <!-- Readouts SI & Scientific -->
                <div class="grid grid-cols-2 gap-2 pt-1 font-mono text-xs">
                    <div class="bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <div class="text-[10px] text-slate-500 uppercase">หน่วยฐาน SI</div>
                        <div id="siVal" class="font-bold text-slate-300 mt-0.5 truncate">—</div>
                    </div>
                    <div class="bg-slate-950 border border-slate-800 rounded-xl p-2.5">
                        <div class="text-[10px] text-slate-500 uppercase">สัญกรณ์วิทยาศาสตร์</div>
                        <div id="sciVal" class="font-bold text-amber-400 mt-0.5 truncate">—</div>
                    </div>
                </div>
            </div>

            <!-- Significant Figures Calculator Card -->
            <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-5 shadow-2xl backdrop-blur-xl space-y-3">
                <div class="flex items-center justify-between">
                    <h3 class="text-xs font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-hashtag text-amber-400"></i> วิเคราะห์เลขนัยสำคัญ (Significant Figures)
                    </h3>
                    <span class="text-[10px] text-slate-400">ISO/IUPAC Rule</span>
                </div>

                <div>
                    <input type="text" id="sigInput" value="0.00320" placeholder="ใส่ตัวเลข เช่น 0.00320" oninput="countSigFigs()"
                           class="w-full bg-slate-950 border border-slate-800 rounded-xl px-3 py-2 text-xs text-white font-mono focus:outline-none focus:border-amber-400">
                </div>

                <div id="sigResult" class="p-3 rounded-xl bg-slate-950/80 border border-amber-500/30 text-xs font-mono text-amber-300 font-bold">
                    กำลังวิเคราะห์...
                </div>

                <div class="text-[11px] text-slate-400 leading-relaxed space-y-1">
                    <div>• ศูนย์หน้าตัวเลขไม่ใช่นัยสำคัญ (เช่น <code class="text-emerald-400">0.0032</code> มี 2 ตัว)</div>
                    <div>• ศูนย์หลังจุดทศนิยมเป็นนัยสำคัญ (เช่น <code class="text-emerald-400">0.00320</code> มี 3 ตัว)</div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
// --- 3D Scale Visualizer using Three.js ---
let scaleScene, scaleCamera, scaleRenderer, scaleControls;
let scaleGroup = new THREE.Group();
let dropletMesh, bacteriaMesh, virusMesh;

function initScale3D() {
    const container = document.getElementById("scale3dContainer");
    if(!container) return;
    const w = container.clientWidth;
    const h = container.clientHeight;

    scaleScene = new THREE.Scene();
    scaleScene.background = new THREE.Color(0x060b18);

    scaleCamera = new THREE.PerspectiveCamera(45, w / h, 0.1, 100);
    scaleCamera.position.set(0, 3, 7);

    scaleRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    scaleRenderer.setSize(w, h);
    scaleRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    scaleRenderer.toneMapping = THREE.ACESFilmicToneMapping;
    container.appendChild(scaleRenderer.domElement);

    if (typeof THREE.OrbitControls !== 'undefined') {
        scaleControls = new THREE.OrbitControls(scaleCamera, scaleRenderer.domElement);
        scaleControls.enableDamping = true;
    }

    // Lights
    const amb = new THREE.AmbientLight(0xffffff, 0.8);
    scaleScene.add(amb);
    const dir = new THREE.DirectionalLight(0x38bdf8, 1.5);
    dir.position.set(5, 10, 7);
    scaleScene.add(dir);

    // Floor Grid (1 unit = 1 um)
    const grid = new THREE.GridHelper(10, 20, 0x10b981, 0x1e293b);
    scaleScene.add(grid);

    // 1. Water Droplet (~1 mm = 1000 um, scaled down representation)
    const dropGeo = new THREE.SphereGeometry(2.5, 32, 32);
    const dropMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, transmission: 0.9, transparent: true, opacity: 0.6, roughness: 0.05 });
    dropletMesh = new THREE.Mesh(dropGeo, dropMat);
    dropletMesh.position.set(-6, 2.5, 0);
    scaleGroup.add(dropletMesh);

    // 2. Bacteria (E. coli capsule ~2 um length)
    const bacGeo = new THREE.CapsuleGeometry(0.5, 1.4, 16, 24);
    const bacMat = new THREE.MeshStandardMaterial({ color: 0x10b981, roughness: 0.3, emissive: 0x059669, emissiveIntensity: 0.3 });
    bacteriaMesh = new THREE.Mesh(bacGeo, bacMat);
    bacteriaMesh.rotation.z = Math.PI / 4;
    bacteriaMesh.position.set(0, 1.0, 0);
    scaleGroup.add(bacteriaMesh);

    // 3. Virus Capsid (~100 nm = 0.1 um representation)
    const virusGeo = new THREE.IcosahedronGeometry(0.18, 2);
    const virusMat = new THREE.MeshStandardMaterial({ color: 0xf43f5e, roughness: 0.4, emissive: 0xe11d48, emissiveIntensity: 0.5 });
    virusMesh = new THREE.Mesh(virusGeo, virusMat);
    virusMesh.position.set(3, 0.6, 0);
    scaleGroup.add(virusMesh);

    scaleScene.add(scaleGroup);

    function animate() {
        requestAnimationFrame(animate);
        if(scaleControls) scaleControls.update();
        if(bacteriaMesh) bacteriaMesh.rotation.y += 0.01;
        if(virusMesh) virusMesh.rotation.y += 0.015;
        scaleRenderer.render(scaleScene, scaleCamera);
    }
    animate();
}

function focusScale(target) {
    if(target === 'droplet') {
        scaleCamera.position.set(-6, 4, 8);
        if(scaleControls) scaleControls.target.set(-6, 2.5, 0);
        document.getElementById("scaleLabel").textContent = "1.0 mm (Macro Scale)";
        document.getElementById("zoomReadout").textContent = "10× (หยดน้ำปริมาตร 1 µL)";
    } else if(target === 'bacteria') {
        scaleCamera.position.set(0, 2, 4);
        if(scaleControls) scaleControls.target.set(0, 1.0, 0);
        document.getElementById("scaleLabel").textContent = "1.0 µm / grid (Cellular Scale)";
        document.getElementById("zoomReadout").textContent = "1,000× (เซลล์แบคทีเรีย E. coli)";
    } else {
        scaleCamera.position.set(3, 1.2, 1.5);
        if(scaleControls) scaleControls.target.set(3, 0.6, 0);
        document.getElementById("scaleLabel").textContent = "100 nm (Nanoscale Virus)";
        document.getElementById("zoomReadout").textContent = "10,000× (ไวรัสแบคเทอริโอเฟจ)";
    }
}

function onZoomSlider(val) {
    const v = parseFloat(val);
    document.getElementById("zoomReadout").textContent = `${v.toLocaleString()}×`;
    const dist = 8.0 * (1000.0 / Math.max(100, v));
    scaleCamera.position.set(0, dist * 0.4, dist);
}

// --- High-Precision Unit Converter Logic ---
const units = {
    length: {m: 1, cm: 0.01, mm: 0.001, 'μm': 1e-6, nm: 1e-9, 'Å': 1e-10, km: 1000},
    volume: {L: 1, mL: 0.001, 'μL': 1e-6, nL: 1e-9, pL: 1e-12, 'cm³': 0.001, 'm³': 1000},
    mass: {kg: 1, g: 0.001, mg: 1e-6, 'μg': 1e-9, ng: 1e-12, pg: 1e-15},
    concentration: {M: 1, mM: 0.001, 'μM': 1e-6, nM: 1e-9, 'CFU/mL': 1e3},
    temperature: {special: true}
};

function updateUnits() {
    const type = document.getElementById('convType').value;
    const from = document.getElementById('fromUnit');
    const to = document.getElementById('toUnit');
    let opts = '';
    if(type === 'temperature') {
        opts = '<option value="C">°C</option><option value="K">K</option><option value="F">°F</option>';
    } else {
        for(let u in units[type]) opts += `<option value="${u}">${u}</option>`;
    }
    from.innerHTML = opts;
    to.innerHTML = opts;
    if(to.options.length > 1) to.selectedIndex = 1;
    convert();
}

function convert() {
    const type = document.getElementById('convType').value;
    const val = parseFloat(document.getElementById('inputVal').value);
    const from = document.getElementById('fromUnit').value;
    const to = document.getElementById('toUnit').value;
    if(isNaN(val)) { document.getElementById('resultVal').textContent = '—'; return; }

    let result;
    if(type === 'temperature') {
        let inC = from === 'C' ? val : from === 'F' ? (val - 32) * 5/9 : val - 273.15;
        result = to === 'C' ? inC : to === 'F' ? inC * 9/5 + 32 : inC + 273.15;
    } else {
        result = (val * units[type][from]) / units[type][to];
    }

    document.getElementById('resultVal').textContent = result > 1e4 || (result < 1e-3 && result !== 0) ? result.toExponential(4) : result.toPrecision(6);
    document.getElementById('siVal').textContent = type === 'temperature' ? (result).toFixed(2) + ' K' : (val * units[type][from]).toExponential(4);
    document.getElementById('sciVal').textContent = result.toExponential(4);
}

function countSigFigs() {
    const str = document.getElementById('sigInput').value.trim();
    if(!str) { document.getElementById('sigResult').textContent = 'กรุณาระบุตัวเลข'; return; }
    const num = str.replace(/^-/, '').replace(/^0+\./, '0.');
    let count = 0;
    let started = false;
    for(let c of num) {
        if(c === '.') continue;
        if(c !== '0') started = true;
        if(started) count++;
    }
    if(num.includes('.') && !started) count = 0;
    if(count === 0 && num !== '0') count = 1;
    document.getElementById('sigResult').innerHTML = `ตัวเลข <span class="text-white">"${str}"</span> มี <span class="text-emerald-400 font-bold">${count}</span> ตัวเลขนัยสำคัญ`;
}

window.addEventListener('DOMContentLoaded', () => {
    updateUnits();
    countSigFigs();
    initScale3D();
});
</script>

<?php include '../includes/footer.php'; ?>
