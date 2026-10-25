<?php
$pageTitle = 'แบบจำลองที่ 1: สเกลชีวฟิสิกส์ 3 มิติ และระบบแปลงหน่วยเลขนัยสำคัญ | Simulation 1: 3D Biophysical Scale & Unit Engine';
$basePath = '../';
include '../includes/header.php';
?>

<!-- Three.js Modern CDN & OrbitControls -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 space-y-6">

    <!-- Hero Header (High Contrast Dark Glassmorphism) -->
    <div class="bg-gradient-to-r from-slate-900 via-emerald-950/40 to-slate-900 border border-emerald-500/40 rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden backdrop-blur-xl">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono uppercase tracking-wider mb-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_#10b981] animate-ping"></span>
                    Simulation 01 • RBRU LEQs NextGen Physics 2026/2027
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight">
                    สเกลชีวฟิสิกส์ 3 มิติ และระบบแปลงหน่วยเลขนัยสำคัญ
                </h1>
                <p class="text-xs sm:text-sm text-slate-300 mt-2 max-w-3xl leading-relaxed">
                    สำรวจมิติทางกายภาพระดับไมโครและนาโน ตั้งแต่หยดน้ำไมโครปิเปต ($1\text{ mm}$), เซลล์ยีสต์ ($7\ \mu\text{m}$), แบคทีเรีย <i>E. coli</i> ($2\ \mu\text{m}$), ไวรัสแบคเทอริโอเฟจ ($100\text{ nm}$), จนถึงเกลียวคู่ดีเอ็นเอ ($2\text{ nm}$) พร้อมระบบแปลงหน่วยความแม่นยำสูงมาตรฐาน ISO/SI
                </p>
            </div>
            <div class="flex flex-wrap gap-2">
                <a href="../../virtual_lab/index.html" target="_blank" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-400 hover:from-emerald-400 hover:to-teal-300 text-slate-950 font-bold text-xs flex items-center gap-2 shadow-lg shadow-emerald-950/50 transition transform active:scale-95">
                    <i class="fa-solid fa-cube text-sm"></i> เข้าสู่ห้องแล็บ 3D ฉบับเต็ม (13 Labs)
                </a>
            </div>
        </div>
    </div>

    <!-- Mode Selector Bar (3 Unified Modes: 3D / WebAR / AI Hands) -->
    <div class="bg-slate-900/90 border border-white/10 rounded-2xl p-2 flex flex-wrap items-center justify-between gap-2 shadow-xl backdrop-blur-md">
        <div class="flex items-center gap-2">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider px-3 hidden sm:inline">โหมดการแสดงผล:</span>
            <div class="flex bg-slate-950/80 rounded-xl p-1 border border-white/5">
                <button id="modeBtn3d" onclick="switchSimMode('3d')" class="px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-2 bg-emerald-500 text-slate-950 shadow-md">
                    <i class="fa-solid fa-cube"></i> โหมด 1: 3D สำรวจเสมือนจริง
                </button>
                <button id="modeBtnAr" onclick="switchSimMode('ar')" class="px-4 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-camera"></i> โหมด 2: WebAR ส่องหน้าตำรา
                </button>
                <button id="modeBtnAi" onclick="switchSimMode('ai')" class="px-4 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-hand"></i> โหมด 3: AI Gesture Control
                </button>
            </div>
        </div>
        <div class="flex items-center gap-2 pr-2">
            <button onclick="resetSimCamera()" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs flex items-center gap-1.5 border border-white/10 transition">
                <i class="fa-solid fa-rotate-left"></i> รีเซ็ตมุมมอง
            </button>
        </div>
    </div>

    <!-- Main Workspace Grid: 3D Viewport + Unit Engine -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- Left: 3D Interactive Scale Viewport (Cols 7) -->
        <div class="lg:col-span-7 space-y-4">
            <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-5 shadow-2xl backdrop-blur-xl relative overflow-hidden">
                <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-microscope text-emerald-400 text-lg"></i>
                        <h2 class="text-sm font-bold text-white">แบบจำลองสเกล 3 มิติเชิงกายภาพ (Physical 3D PBR)</h2>
                    </div>
                    <span id="scaleLabel" class="px-3 py-1 rounded-full bg-emerald-950 text-emerald-300 border border-emerald-500/40 text-xs font-mono font-bold">
                        1.0 µm / grid
                    </span>
                </div>

                <!-- Specimen Filter Tabs -->
                <div class="flex flex-wrap gap-2 mb-3">
                    <button id="btnFocusDrop" onclick="focusScale('droplet')" class="px-3 py-1.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-medium border border-white/10 flex items-center gap-1.5 transition">
                        💧 หยดน้ำไมโคร (1 mm)
                    </button>
                    <button id="btnFocusBac" onclick="focusScale('bacteria')" class="px-3 py-1.5 rounded-xl bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 text-xs font-bold flex items-center gap-1.5 transition">
                        🦠 แบคทีเรีย E. coli (2 µm)
                    </button>
                    <button id="btnFocusPhage" onclick="focusScale('phage')" class="px-3 py-1.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-medium border border-white/10 flex items-center gap-1.5 transition">
                        🧬 ไวรัสเฟจ (100 nm)
                    </button>
                    <button id="btnFocusDna" onclick="focusScale('dna')" class="px-3 py-1.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-medium border border-white/10 flex items-center gap-1.5 transition">
                        🌀 ดีเอ็นเอ (2 nm)
                    </button>
                </div>

                <!-- 3D Viewport Box -->
                <div id="sim3dWrapper" class="relative w-full h-[420px] bg-slate-950 rounded-2xl overflow-hidden border border-white/10 shadow-inner">
                    <!-- WebGL Canvas Container -->
                    <div id="scale3dContainer" class="w-full h-full"></div>

                    <!-- AR Camera Video Element (Hidden until Mode 2) -->
                    <video id="arCameraVideo" autoplay playsinline webkit-playsinline muted class="absolute inset-0 w-full h-full object-cover hidden z-0"></video>

                    <!-- WebAR Scanning Reticle Overlay -->
                    <div id="arReticle" class="absolute inset-0 pointer-events-none hidden flex-col items-center justify-center z-10">
                        <div class="relative w-64 h-64 border-2 border-emerald-400/80 rounded-3xl shadow-[0_0_30px_rgba(16,185,129,0.4)]">
                            <div class="absolute inset-x-0 h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent animate-bounce"></div>
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-slate-950 px-3 py-0.5 rounded-full text-[11px] font-mono text-emerald-400 border border-emerald-400/50">
                                OPTICAL TARGET SCANNER
                            </div>
                        </div>
                        <p class="text-xs text-emerald-300 font-mono mt-4 bg-slate-950/80 px-4 py-1.5 rounded-full border border-emerald-500/30">
                            ส่องกล้องไปยังภาพปกหรือภาพประกอบในตำราเรียนเพื่อตรึงตำแหน่ง 3D
                        </p>
                    </div>

                    <!-- AI Hand Tracking Telemetry Pill (Mode 3) -->
                    <div id="aiHandPill" class="absolute top-4 right-4 hidden z-20 bg-slate-900/90 border border-sky-400/40 rounded-xl p-3 text-xs backdrop-blur-md shadow-xl text-sky-300 max-w-xs">
                        <div class="font-bold flex items-center gap-2 mb-1 text-white">
                            <i class="fa-solid fa-hand text-sky-400"></i> Touchless Gesture Tracking
                        </div>
                        <div class="text-[11px] text-slate-300">
                            ยกมือขึ้น-ลง: ปรับกำลังขยายซูม <br>
                            จีบนิ้วชี้+โป้ง (Pinch): เปลี่ยนวัตถุทางชีววิทยา
                        </div>
                        <button onclick="simulateGesturePulse()" class="mt-2 w-full py-1 bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 rounded border border-sky-500/40 font-mono text-[10px]">
                            ⚡ ทดสอบจำลอง Gesture อัตโนมัติ
                        </button>
                    </div>

                    <!-- Floating Compass & Controls -->
                    <div class="absolute bottom-3 left-3 px-3 py-1.5 rounded-xl bg-slate-950/80 border border-white/10 text-[11px] text-slate-300 backdrop-blur-md flex items-center gap-2 pointer-events-none">
                        <i class="fa-solid fa-arrows-up-down-left-right text-emerald-400"></i>
                        <span>คลิกซ้ายลากเพื่อหมุน 360° • สกรอลล์เมาส์เพื่อซูม</span>
                    </div>
                </div>

                <!-- Interactive Zoom & Dimension Controller -->
                <div class="mt-4 p-4 rounded-2xl bg-slate-950/60 border border-white/5 space-y-2">
                    <div class="flex items-center justify-between text-xs font-mono">
                        <span class="text-slate-400">ระดับกำลังขยายเสมือน (Virtual Magnification):</span>
                        <span id="zoomReadout" class="text-emerald-400 font-bold">1,000× (สเกลเซลล์แบคทีเรีย)</span>
                    </div>
                    <input type="range" id="zoomSlider" min="10" max="50000" step="10" value="1000" oninput="onZoomSlider(this.value)" class="w-full h-2 bg-slate-800 rounded-lg appearance-none cursor-pointer accent-emerald-500">
                    <div class="flex justify-between text-[10px] font-mono text-slate-500">
                        <span>10× (Macro: 1 mm)</span>
                        <span>1,000× (Cell: 1 µm)</span>
                        <span>10,000× (Virus: 100 nm)</span>
                        <span>50,000× (DNA: 2 nm)</span>
                    </div>
                </div>
            </div>

            <!-- ECharts Scale Spectrum SVG Chart (Generated via MCP visualization) -->
            <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-5 shadow-2xl backdrop-blur-xl">
                <div class="flex items-center gap-2 mb-3">
                    <i class="fa-solid fa-chart-bar text-sky-400 text-lg"></i>
                    <h3 class="text-sm font-bold text-white">ผังเปรียบเทียบสเปกตรัมขนาดทางจุลชีววิทยา (Microbial Scale Spectrum)</h3>
                </div>
                <div class="rounded-2xl overflow-hidden border border-white/10 bg-slate-950 p-2">
                    <img src="../images/ch01/scale_spectrum_chart.svg" alt="Microbial & Physical Scale Spectrum Chart" class="w-full h-auto rounded-xl">
                </div>
                <p class="text-[11px] text-slate-400 mt-2 leading-relaxed">
                    แผนภูมิแสดงความสัมพันธ์เชิงลอการิทึม (Log scale) จากระดับมิลลิเมตรสู่ระดับนาโนเมตร สอดรับกับมาตรฐานการวัดในเอกสารคำสอนฟิสิกส์สำหรับจุลชีววิทยา (ผศ.ดร.ชีวะ ทัศนา)
                </p>
            </div>
        </div>

        <!-- Right: SI Precision Unit Converter & Sig Figs Engine (Cols 5) -->
        <div class="lg:col-span-5 space-y-6">

            <!-- High Precision Converter Card -->
            <div class="bg-slate-900/90 border border-emerald-500/30 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-5">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-calculator text-emerald-400 text-lg"></i>
                        <h2 class="text-sm font-bold text-white">ตัวแปลงหน่วยฟิสิกส์จุลชีววิทยาแม่นยำสูง</h2>
                    </div>
                    <span class="text-[10px] font-mono text-slate-400 uppercase tracking-widest bg-slate-800 px-2 py-0.5 rounded">SI Standards</span>
                </div>

                <!-- Dimension Category -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">มิติทางกายภาพ (Physical Dimension):</label>
                    <select id="convType" onchange="updateUnits()" class="w-full bg-slate-950 border border-white/10 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-emerald-500">
                        <option value="length">📏 ความยาว (m, cm, mm, µm, nm, Å)</option>
                        <option value="volume">🧪 ปริมาตร (L, mL, µL, nL, pL, cm³)</option>
                        <option value="mass">⚖️ มวลสาร (kg, g, mg, µg, ng, pg)</option>
                        <option value="concentration">🧫 ความเข้มข้น (M, mM, µM, nM, CFU/mL)</option>
                        <option value="temperature">🌡️ อุณหภูมิ (°C, K, °F)</option>
                    </select>
                </div>

                <!-- Input Value Box -->
                <div class="space-y-2">
                    <label class="block text-xs font-semibold text-slate-300">ค่าเริ่มต้น (Input Magnitude):</label>
                    <div class="flex gap-2">
                        <input type="number" id="inputVal" value="1" step="any" oninput="convert()" class="w-3/4 bg-slate-950 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-emerald-400 font-mono font-bold focus:outline-none focus:border-emerald-500">
                        <select id="fromUnit" onchange="convert()" class="w-1/4 bg-slate-950 border border-white/10 rounded-xl px-2 py-2.5 text-xs text-white font-mono focus:outline-none focus:border-emerald-500"></select>
                    </div>
                </div>

                <!-- Direction Arrow -->
                <div class="flex justify-center text-emerald-400">
                    <i class="fa-solid fa-arrow-down-long text-base"></i>
                </div>

                <!-- Converted Result Box -->
                <div class="space-y-2">
                    <label class="block text-xs font-semibold text-slate-300">ผลลัพธ์แปลงหน่วย (Converted Value):</label>
                    <div class="flex gap-2">
                        <div id="resultVal" class="w-3/4 bg-slate-950/90 border border-emerald-500/50 rounded-xl px-4 py-2.5 text-base text-sky-300 font-mono font-bold flex items-center overflow-x-auto">
                            100.000
                        </div>
                        <select id="toUnit" onchange="convert()" class="w-1/4 bg-slate-950 border border-white/10 rounded-xl px-2 py-2.5 text-xs text-white font-mono focus:outline-none focus:border-emerald-500"></select>
                    </div>
                </div>

                <!-- Scientific & SI Notations -->
                <div class="grid grid-cols-2 gap-3 pt-2">
                    <div class="p-3 rounded-xl bg-slate-950 border border-white/5">
                        <div class="text-[10px] text-slate-400 font-mono">หน่วยฐาน SI</div>
                        <div id="siVal" class="text-xs font-mono font-bold text-emerald-400 mt-1 truncate">1.0000e+0</div>
                    </div>
                    <div class="p-3 rounded-xl bg-slate-950 border border-white/5">
                        <div class="text-[10px] text-slate-400 font-mono">สัญกรณ์วิทยาศาสตร์</div>
                        <div id="sciVal" class="text-xs font-mono font-bold text-amber-400 mt-1 truncate">1.0000e+2</div>
                    </div>
                </div>
            </div>

            <!-- Significant Figures Engine Card -->
            <div class="bg-slate-900/90 border border-white/10 rounded-3xl p-6 shadow-2xl backdrop-blur-xl space-y-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-hashtag text-amber-400 text-lg"></i>
                        <h2 class="text-sm font-bold text-white">วิเคราะห์เลขนัยสำคัญ (Significant Figures)</h2>
                    </div>
                    <span class="text-[10px] font-mono text-slate-400 uppercase tracking-widest bg-slate-800 px-2 py-0.5 rounded">IUPAC Rule</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">กรอกตัวเลขผลการทดลอง:</label>
                    <input type="text" id="sigInput" value="0.00320" oninput="countSigFigs()" class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-2.5 text-sm text-amber-400 font-mono font-bold focus:outline-none focus:border-amber-500">
                </div>

                <div id="sigResult" class="p-4 rounded-xl bg-slate-950 border border-amber-500/30 text-xs font-mono text-amber-300 font-bold leading-relaxed">
                    กำลังวิเคราะห์...
                </div>

                <div class="text-[11px] text-slate-400 leading-relaxed space-y-1.5 p-3 rounded-xl bg-slate-950/50 border border-white/5">
                    <div>• <b>ศูนย์หน้าตัวเลข:</b> ไม่เป็นนัยสำคัญ (เช่น <code class="text-emerald-400">0.0032</code> มี 2 ตัว)</div>
                    <div>• <b>ศูนย์กลางตัวเลข:</b> เป็นนัยสำคัญเสมอ (เช่น <code class="text-emerald-400">1.005</code> มี 4 ตัว)</div>
                    <div>• <b>ศูนย์หลังจุดทศนิยม:</b> เป็นนัยสำคัญ (เช่น <code class="text-emerald-400">0.00320</code> มี 3 ตัว)</div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
// ============================================================
// 3D Physical Scale Engine (Three.js PBR Studio)
// ============================================================
let scaleScene, scaleCamera, scaleRenderer, scaleControls;
let scaleGroup = new THREE.Group();
let dropletMesh, bacteriaMesh, phageGroup, dnaGroup;
let isArMode = false;
let arStream = null;

function initScale3D() {
    const container = document.getElementById("scale3dContainer");
    if (!container) return;

    const w = container.clientWidth || 600;
    const h = container.clientHeight || 420;

    scaleScene = new THREE.Scene();
    scaleScene.background = new THREE.Color(0x060b18);

    scaleCamera = new THREE.PerspectiveCamera(45, w / h, 0.1, 100);
    scaleCamera.position.set(0, 3, 7);

    scaleRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    scaleRenderer.setSize(w, h);
    scaleRenderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    scaleRenderer.toneMapping = THREE.ACESFilmicToneMapping;
    scaleRenderer.toneMappingExposure = 1.25;
    container.innerHTML = '';
    container.appendChild(scaleRenderer.domElement);

    if (typeof THREE.OrbitControls !== 'undefined') {
        scaleControls = new THREE.OrbitControls(scaleCamera, scaleRenderer.domElement);
        scaleControls.enableDamping = true;
        scaleControls.dampingFactor = 0.05;
        scaleControls.maxDistance = 25;
        scaleControls.minDistance = 1;
    }

    // 3-Point Studio Lighting
    const ambLight = new THREE.AmbientLight(0xffffff, 0.9);
    scaleScene.add(ambLight);

    const keyLight = new THREE.DirectionalLight(0x38bdf8, 2.0);
    keyLight.position.set(8, 12, 10);
    scaleScene.add(keyLight);

    const rimLight = new THREE.DirectionalLight(0x10b981, 1.5);
    rimLight.position.set(-8, -4, -6);
    scaleScene.add(rimLight);

    // Grid Floor
    const grid = new THREE.GridHelper(16, 32, 0x10b981, 0x1e293b);
    grid.position.y = -1.2;
    scaleScene.add(grid);

    // 1. Water Droplet (1 mm = 1000 um Macro representation)
    const dropGeo = new THREE.SphereGeometry(2.4, 32, 32);
    const dropMat = new THREE.MeshPhysicalMaterial({
        color: 0x38bdf8,
        metalness: 0.1,
        roughness: 0.05,
        transmission: 0.92,
        transparent: true,
        opacity: 0.75,
        ior: 1.33
    });
    dropletMesh = new THREE.Mesh(dropGeo, dropMat);
    dropletMesh.position.set(-5.5, 1.5, 0);
    dropletMesh.scale.set(1, 1.2, 1);
    scaleGroup.add(dropletMesh);

    // 2. E. coli Bacterium (Capsule shape: cylinder + 2 hemispheres + flagella)
    const bacGroup = new THREE.Group();
    const cylGeo = new THREE.CylinderGeometry(0.5, 0.5, 1.4, 32);
    const sphereGeo = new THREE.SphereGeometry(0.5, 32, 16);
    const bacMat = new THREE.MeshStandardMaterial({
        color: 0x10b981,
        roughness: 0.35,
        metalness: 0.1,
        emissive: 0x059669,
        emissiveIntensity: 0.35
    });

    const bacBody = new THREE.Mesh(cylGeo, bacMat);
    const bacTop = new THREE.Mesh(sphereGeo, bacMat);
    bacTop.position.y = 0.7;
    const bacBot = new THREE.Mesh(sphereGeo, bacMat);
    bacBot.position.y = -0.7;
    bacGroup.add(bacBody, bacTop, bacBot);

    // Flagella tail filaments
    const flagellaMat = new THREE.LineBasicMaterial({ color: 0x34d399, linewidth: 2 });
    for (let f = 0; f < 4; f++) {
        const points = [];
        for (let i = 0; i <= 20; i++) {
            const t = i / 20;
            const x = Math.sin(t * Math.PI * 4 + f) * 0.25;
            const y = -0.9 - t * 2.2;
            const z = Math.cos(t * Math.PI * 4 + f) * 0.25;
            points.push(new THREE.Vector3(x, y, z));
        }
        const flagGeo = new THREE.BufferGeometry().setFromPoints(points);
        const flagLine = new THREE.Line(flagGeo, flagellaMat);
        bacGroup.add(flagLine);
    }
    bacGroup.position.set(0, 0.6, 0);
    bacteriaMesh = bacGroup;
    scaleGroup.add(bacteriaMesh);

    // 3. Bacteriophage T4 (100 nm = 0.1 um)
    phageGroup = new THREE.Group();
    const headGeo = new THREE.IcosahedronGeometry(0.35, 1);
    const phageMat = new THREE.MeshStandardMaterial({
        color: 0xf43f5e,
        roughness: 0.3,
        metalness: 0.2,
        emissive: 0xe11d48,
        emissiveIntensity: 0.4
    });
    const headMesh = new THREE.Mesh(headGeo, phageMat);
    headMesh.position.y = 0.6;
    phageGroup.add(headMesh);

    const sheathGeo = new THREE.CylinderGeometry(0.08, 0.08, 0.6, 16);
    const sheathMesh = new THREE.Mesh(sheathGeo, phageMat);
    sheathMesh.position.y = 0.2;
    phageGroup.add(sheathMesh);

    // Phage Legs
    const legMat = new THREE.LineBasicMaterial({ color: 0xfb7185 });
    for (let l = 0; l < 6; l++) {
        const angle = (l / 6) * Math.PI * 2;
        const pts = [
            new THREE.Vector3(0, -0.1, 0),
            new THREE.Vector3(Math.cos(angle) * 0.3, -0.3, Math.sin(angle) * 0.3),
            new THREE.Vector3(Math.cos(angle) * 0.5, -0.6, Math.sin(angle) * 0.5)
        ];
        const legGeo = new THREE.BufferGeometry().setFromPoints(pts);
        phageGroup.add(new THREE.Line(legGeo, legMat));
    }
    phageGroup.position.set(3.8, 0.3, 0);
    scaleGroup.add(phageGroup);

    // 4. DNA Double Helix (2 nm)
    dnaGroup = new THREE.Group();
    const strandMat = new THREE.MeshStandardMaterial({ color: 0x818cf8, emissive: 0x4f46e5, emissiveIntensity: 0.4 });
    const rungMat = new THREE.MeshStandardMaterial({ color: 0xf59e0b });
    for (let d = 0; d < 24; d++) {
        const y = (d - 12) * 0.12;
        const theta = d * 0.45;
        const x1 = Math.cos(theta) * 0.22;
        const z1 = Math.sin(theta) * 0.22;
        const x2 = -x1;
        const z2 = -z1;

        const sphere1 = new THREE.Mesh(new THREE.SphereGeometry(0.05, 12, 12), strandMat);
        sphere1.position.set(x1, y, z1);
        const sphere2 = new THREE.Mesh(new THREE.SphereGeometry(0.05, 12, 12), strandMat);
        sphere2.position.set(x2, y, z2);
        dnaGroup.add(sphere1, sphere2);

        // Basepair rung
        const rungGeo = new THREE.CylinderGeometry(0.02, 0.02, 0.44, 8);
        const rung = new THREE.Mesh(rungGeo, rungMat);
        rung.position.set(0, y, 0);
        rung.rotation.z = Math.PI / 2;
        rung.rotation.y = theta;
        dnaGroup.add(rung);
    }
    dnaGroup.position.set(6.5, 0.5, 0);
    scaleGroup.add(dnaGroup);

    scaleScene.add(scaleGroup);

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);
        if (scaleControls) scaleControls.update();
        if (bacteriaMesh) bacteriaMesh.rotation.y += 0.008;
        if (phageGroup) phageGroup.rotation.y += 0.012;
        if (dnaGroup) dnaGroup.rotation.y += 0.015;
        scaleRenderer.render(scaleScene, scaleCamera);
    }
    animate();

    window.addEventListener('resize', () => {
        if (!container) return;
        scaleCamera.aspect = container.clientWidth / container.clientHeight;
        scaleCamera.updateProjectionMatrix();
        scaleRenderer.setSize(container.clientWidth, container.clientHeight);
    });
}

function focusScale(target) {
    if (target === 'droplet') {
        scaleCamera.position.set(-5.5, 3.5, 6.5);
        if (scaleControls) scaleControls.target.set(-5.5, 1.5, 0);
        document.getElementById("scaleLabel").textContent = "1.0 mm (Macro Droplet)";
        document.getElementById("zoomReadout").textContent = "10× (หยดน้ำไมโครปิเปต 1 µL)";
        document.getElementById("zoomSlider").value = 10;
    } else if (target === 'bacteria') {
        scaleCamera.position.set(0, 1.8, 3.8);
        if (scaleControls) scaleControls.target.set(0, 0.6, 0);
        document.getElementById("scaleLabel").textContent = "1.0 µm / grid (Cellular Scale)";
        document.getElementById("zoomReadout").textContent = "1,000× (เซลล์แบคทีเรีย E. coli)";
        document.getElementById("zoomSlider").value = 1000;
    } else if (target === 'phage') {
        scaleCamera.position.set(3.8, 1.0, 1.6);
        if (scaleControls) scaleControls.target.set(3.8, 0.3, 0);
        document.getElementById("scaleLabel").textContent = "100 nm (Bacteriophage T4)";
        document.getElementById("zoomReadout").textContent = "10,000× (ไวรัสแบคเทอริโอเฟจ)";
        document.getElementById("zoomSlider").value = 10000;
    } else if (target === 'dna') {
        scaleCamera.position.set(6.5, 0.8, 1.2);
        if (scaleControls) scaleControls.target.set(6.5, 0.5, 0);
        document.getElementById("scaleLabel").textContent = "2.0 nm (DNA Double Helix)";
        document.getElementById("zoomReadout").textContent = "50,000× (เกลียวคู่ดีเอ็นเอ)";
        document.getElementById("zoomSlider").value = 50000;
    }
}

function onZoomSlider(val) {
    const v = parseFloat(val);
    document.getElementById("zoomReadout").textContent = `${v.toLocaleString()}×`;
    if (v < 50) focusScale('droplet');
    else if (v < 5000) focusScale('bacteria');
    else if (v < 25000) focusScale('phage');
    else focusScale('dna');
}

function resetSimCamera() {
    focusScale('bacteria');
}

// ============================================================
// 3 Unified Modes Switcher (3D / WebAR / AI Hands)
// ============================================================
function switchSimMode(mode) {
    const btn3d = document.getElementById('modeBtn3d');
    const btnAr = document.getElementById('modeBtnAr');
    const btnAi = document.getElementById('modeBtnAi');
    const reticle = document.getElementById('arReticle');
    const video = document.getElementById('arCameraVideo');
    const handPill = document.getElementById('aiHandPill');

    // Reset styles
    [btn3d, btnAr, btnAi].forEach(btn => {
        btn.className = "px-4 py-2 rounded-lg text-xs font-medium text-slate-300 hover:text-white transition flex items-center gap-2";
    });

    if (mode === '3d') {
        btn3d.className = "px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-2 bg-emerald-500 text-slate-950 shadow-md";
        stopArCamera();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        handPill.classList.add('hidden');
        scaleScene.background = new THREE.Color(0x060b18);
    } else if (mode === 'ar') {
        btnAr.className = "px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-2 bg-sky-500 text-slate-950 shadow-md";
        startArCamera();
        reticle.classList.remove('hidden');
        reticle.classList.add('flex');
        handPill.classList.add('hidden');
        scaleScene.background = null; // Transparent for camera view
    } else if (mode === 'ai') {
        btnAi.className = "px-4 py-2 rounded-lg text-xs font-bold transition flex items-center gap-2 bg-purple-500 text-white shadow-md";
        stopArCamera();
        reticle.classList.add('hidden');
        reticle.classList.remove('flex');
        handPill.classList.remove('hidden');
        scaleScene.background = new THREE.Color(0x060b18);
    }
}

async function startArCamera() {
    const video = document.getElementById('arCameraVideo');
    if (!video) return;
    try {
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            arStream = await navigator.mediaDevices.getUserMedia({
                video: { facingMode: { ideal: 'environment' } }
            });
            video.srcObject = arStream;
            video.classList.remove('hidden');
        }
    } catch (err) {
        console.warn("Camera access fallback:", err);
        video.classList.add('hidden');
    }
}

function stopArCamera() {
    const video = document.getElementById('arCameraVideo');
    if (arStream) {
        arStream.getTracks().forEach(t => t.stop());
        arStream = null;
    }
    if (video) video.classList.add('hidden');
}

function simulateGesturePulse() {
    const modes = ['droplet', 'bacteria', 'phage', 'dna'];
    const current = Math.floor(Math.random() * modes.length);
    focusScale(modes[current]);
}

// ============================================================
// High-Precision Unit Converter Logic
// ============================================================
const units = {
    length: { m: 1, cm: 0.01, mm: 0.001, 'μm': 1e-6, nm: 1e-9, 'Å': 1e-10, km: 1000 },
    volume: { L: 1, mL: 0.001, 'μL': 1e-6, nL: 1e-9, pL: 1e-12, 'cm³': 0.001, 'm³': 1000 },
    mass: { kg: 1, g: 0.001, mg: 1e-6, 'μg': 1e-9, ng: 1e-12, pg: 1e-15 },
    concentration: { M: 1, mM: 0.001, 'μM': 1e-6, nM: 1e-9, 'CFU/mL': 1e3 },
    temperature: { special: true }
};

function updateUnits() {
    const type = document.getElementById('convType').value;
    const from = document.getElementById('fromUnit');
    const to = document.getElementById('toUnit');
    let opts = '';
    if (type === 'temperature') {
        opts = '<option value="C">°C</option><option value="K">K</option><option value="F">°F</option>';
    } else {
        for (let u in units[type]) opts += `<option value="${u}">${u}</option>`;
    }
    from.innerHTML = opts;
    to.innerHTML = opts;
    if (to.options.length > 1) to.selectedIndex = 1;
    convert();
}

function convert() {
    const type = document.getElementById('convType').value;
    const val = parseFloat(document.getElementById('inputVal').value);
    const from = document.getElementById('fromUnit').value;
    const to = document.getElementById('toUnit').value;
    if (isNaN(val)) { document.getElementById('resultVal').textContent = '—'; return; }

    let result;
    if (type === 'temperature') {
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
    if (!str) { document.getElementById('sigResult').textContent = 'กรุณาระบุตัวเลข'; return; }
    const num = str.replace(/^-/, '').replace(/^0+\./, '0.');
    let count = 0;
    let started = false;
    for (let c of num) {
        if (c === '.') continue;
        if (c !== '0') started = true;
        if (started) count++;
    }
    if (num.includes('.') && !started) count = 0;
    if (count === 0 && num !== '0') count = 1;
    document.getElementById('sigResult').innerHTML = `ตัวเลข <span class="text-white">"${str}"</span> มี <span class="text-emerald-400 font-bold">${count}</span> ตัวเลขนัยสำคัญ`;
}

window.addEventListener('DOMContentLoaded', () => {
    updateUnits();
    countSigFigs();
    initScale3D();
});
</script>

<?php include '../includes/footer.php'; ?>
