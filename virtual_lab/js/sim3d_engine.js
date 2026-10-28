/**
 * 3D WebGL PBR Virtual Laboratory Simulation Engine for Physics for Microbiology
 * Built with Three.js (PBR Materials, OrbitControls, 60 FPS Render Loop)
 * Features 3 Unified Modes:
 *   Mode 1: 3D Interactive Virtual Lab
 *   Mode 2: AR Textbook Marker Overlay
 *   Mode 3: Touchless AI Hand Tracking (MediaPipe / Simulated Gesture Fallback)
 */

class Sim3DEngine {
  constructor(canvasContainerId, oscCanvasId) {
    this.container = document.getElementById(canvasContainerId);
    this.oscCanvas = document.getElementById(oscCanvasId);
    this.oscCtx = this.oscCanvas ? this.oscCanvas.getContext('2d') : null;

    this.scene = null;
    this.camera = null;
    this.renderer = null;
    this.controls = null;
    this.apparatusGroup = new THREE.Group();
    this.currentLabId = "lab01";
    this.activeMode = "3d"; // "3d" | "ar" | "hand"
    this.animFrameId = null;
    this.clock = new THREE.Clock();

    // Apparatus specific animation state
    this.dynamicObjects = [];
    this.time = 0;
    this.rpmRotation = 0;
    this.liveTelemetry = {};

    this.init();
  }

  init() {
    if (!this.container) return;
    const width = this.container.clientWidth || 800;
    const height = this.container.clientHeight || 500;

    // 1. Scene
    this.scene = new THREE.Scene();
    this.scene.background = new THREE.Color(0x060b18);
    this.scene.fog = new THREE.FogExp2(0x060b18, 0.025);

    // 2. Camera
    this.camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 100);
    this.camera.position.set(0, 5.5, 9.5);

    // 3. Renderer with PBR tone mapping & soft shadows
    this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: "high-performance" });
    this.renderer.setSize(width, height);
    this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    this.renderer.shadowMap.enabled = true;
    this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
    this.renderer.toneMappingExposure = 1.15;
    this.container.innerHTML = "";
    this.container.appendChild(this.renderer.domElement);

    // 4. OrbitControls
    if (typeof THREE.OrbitControls !== 'undefined') {
      this.controls = new THREE.OrbitControls(this.camera, this.renderer.domElement);
      this.controls.enableDamping = true;
      this.controls.dampingFactor = 0.06;
      this.controls.maxPolarAngle = Math.PI / 2 + 0.05;
      this.controls.minDistance = 2.0;
      this.controls.maxDistance = 25.0;
    }

    // 5. Lighting
    this.setupLighting();

    // 6. Laboratory Bench Floor
    this.createLabBench();

    // 7. Add Apparatus Root Group
    this.scene.add(this.apparatusGroup);

    // 8. Event Listeners
    window.addEventListener('resize', () => this.onWindowResize());

    // 9. Start Render Loop
    this.animate();
  }

  setupLighting() {
    // Ambient Light
    const ambientLight = new THREE.AmbientLight(0xdbeafe, 0.65);
    this.scene.add(ambientLight);

    // Key Light (Warm Lab Ceiling Spotlight)
    const keyLight = new THREE.DirectionalLight(0xffffff, 1.4);
    keyLight.position.set(6, 12, 8);
    keyLight.castShadow = true;
    keyLight.shadow.mapSize.width = 1024;
    keyLight.shadow.mapSize.height = 1024;
    keyLight.shadow.camera.near = 0.5;
    keyLight.shadow.camera.far = 30;
    keyLight.shadow.bias = -0.0005;
    this.scene.add(keyLight);

    // Blue Fill Light
    const fillLight = new THREE.DirectionalLight(0x38bdf8, 0.7);
    fillLight.position.set(-8, 6, -4);
    this.scene.add(fillLight);

    // Emerald Rim Light for Futuristic Atmosphere
    const rimLight = new THREE.PointLight(0x10b981, 1.2, 15);
    rimLight.position.set(0, 1.5, -4);
    this.scene.add(rimLight);
  }

  createLabBench() {
    // Dark Reflective Lab Countertop
    const benchGeo = new THREE.BoxGeometry(22, 0.4, 14);
    const benchMat = new THREE.MeshStandardMaterial({
      color: 0x0a1120,
      metalness: 0.35,
      roughness: 0.25
    });
    const bench = new THREE.Mesh(benchGeo, benchMat);
    bench.position.y = -0.2;
    bench.receiveShadow = true;
    this.scene.add(bench);

    // Grid Overlay on Table
    const grid = new THREE.GridHelper(18, 36, 0x10b981, 0x1e293b);
    grid.position.y = 0.01;
    this.scene.add(grid);
  }

  onWindowResize() {
    if (!this.container || !this.renderer || !this.camera) return;
    const width = this.container.clientWidth;
    const height = this.container.clientHeight;
    this.camera.aspect = width / height;
    this.camera.updateProjectionMatrix();
    this.renderer.setSize(width, height);
  }

  setMode(mode) {
    this.activeMode = mode; // "3d", "ar", "hand"
    const badge = document.getElementById("activeModeBadge");
    if (badge) {
      if (mode === "3d") badge.innerHTML = `<i class="fa-solid fa-cube text-emerald-400"></i> โหมด 1: 3D Virtual Lab (360°)`;
      else if (mode === "ar") badge.innerHTML = `<i class="fa-solid fa-camera text-sky-400"></i> โหมด 2: AR Textbook Marker`;
      else badge.innerHTML = `<i class="fa-solid fa-hand text-amber-400"></i> โหมด 3: AI ควบคุมด้วยมือไร้สัมผัส`;
    }

    if (mode === "ar") {
      this.camera.position.set(0, 7.5, 6.0);
    } else if (mode === "hand") {
      this.camera.position.set(0, 4.5, 8.0);
    } else {
      this.camera.position.set(0, 5.5, 9.5);
    }
  }

  loadLabApparatus(labId, params) {
    this.currentLabId = labId;
    this.dynamicObjects = [];

    // Clear previous apparatus
    while (this.apparatusGroup.children.length > 0) {
      const obj = this.apparatusGroup.children[0];
      this.apparatusGroup.remove(obj);
    }

    // Build specific 3D model according to Master Plan 2026/2027
    switch (labId) {
      case "lab01":
        this.buildLab01Micropipette(params);
        break;
      case "lab02":
        this.buildLab02BrownianMotion(params);
        break;
      case "lab03":
        this.buildLab03StokesSedimentation(params);
        break;
      case "lab04":
        this.buildLab04Centrifuge(params);
        break;
      case "lab05":
        this.buildLab05Momentum(params);
        break;
      case "lab06":
        this.buildLab06Osmosis(params);
        break;
      case "lab07":
        this.buildLab07ATPSynthase(params);
        break;
      case "lab08":
        this.buildLab08Flagella(params);
        break;
      case "lab09":
        this.buildLab05IncubatorPCR(params);
        break;
      case "lab10":
        this.buildLab08GelElectrophoresis(params);
        break;
      case "lab11":
        this.buildLab10Microscope(params);
        break;
      case "lab12":
        this.buildLab11UVSterilization(params);
        break;
      case "lab13":
      default:
        this.buildLab13SmartSensorSandbox(params);
        break;
    }
  }

  /* -------------------------------------------------------------
   * Lab 01: P1000 Micropipette + Analytical Digital Balance
   * ------------------------------------------------------------- */
  buildLab01Micropipette(p) {
    const group = new THREE.Group();

    // 1. Digital Analytical Balance Body
    const balGeo = new THREE.BoxGeometry(3.5, 1.0, 3.5);
    const balMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.6, roughness: 0.3 });
    const balance = new THREE.Mesh(balGeo, balMat);
    balance.position.set(1.5, 0.5, 0);
    balance.castShadow = true;
    balance.receiveShadow = true;
    group.add(balance);

    // Balance Weighing Pan (Stainless Steel)
    const panGeo = new THREE.CylinderGeometry(1.0, 1.0, 0.08, 32);
    const panMat = new THREE.MeshStandardMaterial({ color: 0xe2e8f0, metalness: 0.95, roughness: 0.1 });
    const pan = new THREE.Mesh(panGeo, panMat);
    pan.position.set(1.5, 1.05, 0);
    pan.castShadow = true;
    group.add(pan);

    // Beaker on pan
    const beakerGeo = new THREE.CylinderGeometry(0.5, 0.45, 0.9, 24, 1, true);
    const glassMat = new THREE.MeshPhysicalMaterial({
      color: 0xffffff,
      transmission: 0.9,
      opacity: 1,
      transparent: true,
      roughness: 0.05,
      ior: 1.5
    });
    const beaker = new THREE.Mesh(beakerGeo, glassMat);
    beaker.position.set(1.5, 1.52, 0);
    group.add(beaker);

    // Liquid in beaker
    const liqGeo = new THREE.CylinderGeometry(0.44, 0.42, 0.5, 24);
    const liqMat = new THREE.MeshStandardMaterial({ color: 0x38bdf8, transparent: true, opacity: 0.75, roughness: 0.1 });
    const liquid = new THREE.Mesh(liqGeo, liqMat);
    liquid.position.set(1.5, 1.35, 0);
    group.add(liquid);

    // Digital LED Display on Balance Front
    const ledGeo = new THREE.PlaneGeometry(1.6, 0.4);
    const ledMat = new THREE.MeshBasicMaterial({ color: 0x059669 });
    const ledScreen = new THREE.Mesh(ledGeo, ledMat);
    ledScreen.position.set(1.5, 0.55, 1.76);
    group.add(ledScreen);

    // 2. P1000 Micropipette (Vertical Handheld)
    const pipGroup = new THREE.Group();
    pipGroup.position.set(-1.8, 2.5, 0);

    // Body
    const bodyGeo = new THREE.CylinderGeometry(0.2, 0.18, 3.2, 24);
    const bodyMat = new THREE.MeshStandardMaterial({ color: 0x3b82f6, metalness: 0.4, roughness: 0.3 });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    body.castShadow = true;
    pipGroup.add(body);

    // Plunger Button on top (Amber color for P1000 standard)
    const btnGeo = new THREE.CylinderGeometry(0.24, 0.24, 0.35, 24);
    const btnMat = new THREE.MeshStandardMaterial({ color: 0x3b82f6 }); // P1000 is blue, P200 is yellow
    const button = new THREE.Mesh(btnGeo, btnMat);
    button.position.y = 1.8;
    pipGroup.add(button);
    this.dynamicObjects.push({ obj: button, type: "plunger" });

    // Volumetric Counter Window
    const volBoxGeo = new THREE.BoxGeometry(0.35, 0.6, 0.25);
    const volBoxMat = new THREE.MeshStandardMaterial({ color: 0x0f172a });
    const volBox = new THREE.Mesh(volBoxGeo, volBoxMat);
    volBox.position.set(0, 0.5, 0.12);
    pipGroup.add(volBox);

    // Disposable Plastic Tip (Polypropylene Blue 1000 µL)
    const tipGeo = new THREE.ConeGeometry(0.12, 1.4, 24, 1, true);
    const tipMat = new THREE.MeshPhysicalMaterial({
      color: 0x60a5fa,
      transmission: 0.85,
      transparent: true,
      roughness: 0.2
    });
    const tip = new THREE.Mesh(tipGeo, tipMat);
    tip.rotation.x = Math.PI;
    tip.position.y = -2.3;
    pipGroup.add(tip);

    // Water droplet hanging from tip
    const dropGeo = new THREE.SphereGeometry(0.06, 16, 16);
    const dropMat = new THREE.MeshStandardMaterial({ color: 0x38bdf8, roughness: 0.1, transparent: true, opacity: 0.85 });
    const droplet = new THREE.Mesh(dropGeo, dropMat);
    droplet.position.set(0, -3.05, 0);
    droplet.scale.set(1, 1.5, 1);
    pipGroup.add(droplet);
    this.dynamicObjects.push({ obj: droplet, type: "droplet" });

    group.add(pipGroup);
    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 02: Brownian Motion & Microbial Motility Chamber
   * ------------------------------------------------------------- */
  buildLab02BrownianMotion(p) {
    const group = new THREE.Group();

    // Transparent Chamber Cube
    const cubeGeo = new THREE.BoxGeometry(5.0, 3.5, 4.0);
    const cubeMat = new THREE.MeshPhysicalMaterial({
      color: 0x38bdf8,
      transmission: 0.94,
      transparent: true,
      opacity: 0.35,
      roughness: 0.1
    });
    const chamber = new THREE.Mesh(cubeGeo, cubeMat);
    chamber.position.set(0, 2.0, 0);
    group.add(chamber);

    // 120 Water Molecules (small vibrating spheres)
    const molGeo = new THREE.SphereGeometry(0.045, 8, 8);
    const molMat = new THREE.MeshStandardMaterial({ color: 0x94a3b8, metalness: 0.2, roughness: 0.5 });
    const waterMols = [];
    for (let i = 0; i < 90; i++) {
      const mol = new THREE.Mesh(molGeo, molMat);
      mol.position.set((Math.random() - 0.5) * 4.6, 0.4 + Math.random() * 3.0, (Math.random() - 0.5) * 3.6);
      mol.userData = {
        vx: (Math.random() - 0.5) * 0.08,
        vy: (Math.random() - 0.5) * 0.08,
        vz: (Math.random() - 0.5) * 0.08
      };
      group.add(mol);
      waterMols.push(mol);
    }
    this.dynamicObjects.push({ type: "water_mols", list: waterMols });

    // 4 Bacteria (Bigger capsules / spheres)
    const bacGeo = new THREE.CapsuleGeometry(0.2, 0.5, 12, 16);
    const bacMat = new THREE.MeshStandardMaterial({
      color: 0x10b981,
      emissive: 0x059669,
      emissiveIntensity: 0.35,
      roughness: 0.3
    });

    const bacteriaList = [];
    for (let j = 0; j < 5; j++) {
      const bac = new THREE.Mesh(bacGeo, bacMat);
      bac.position.set((Math.random() - 0.5) * 3.5, 1.0 + Math.random() * 2.0, (Math.random() - 0.5) * 2.8);
      bac.userData = {
        vx: (Math.random() - 0.5) * 0.03,
        vy: (Math.random() - 0.5) * 0.03,
        vz: (Math.random() - 0.5) * 0.03,
        timer: 0
      };
      group.add(bac);
      bacteriaList.push(bac);
    }
    this.dynamicObjects.push({ type: "bacteria_brownian", list: bacteriaList });

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 03: Stokes Sedimentation & Fluid Viscosity Fall Tube
   * ------------------------------------------------------------- */
  buildLab03StokesSedimentation(p) {
    const group = new THREE.Group();

    // Tall Cylindrical Glass Tube
    const tubeGeo = new THREE.CylinderGeometry(0.7, 0.7, 5.0, 32, 1, true);
    const glassMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.92, transparent: true, roughness: 0.05 });
    const tube = new THREE.Mesh(tubeGeo, glassMat);
    tube.position.set(0, 2.7, 0);
    group.add(tube);

    // Viscous fluid inside
    const liqGeo = new THREE.CylinderGeometry(0.66, 0.66, 4.8, 32);
    const liqColor = p.fluid_medium === "glycerol_20" ? 0xfef08a : (p.fluid_medium === "lb_broth" ? 0xfbbf24 : 0x38bdf8);
    const liqMat = new THREE.MeshStandardMaterial({ color: liqColor, transparent: true, opacity: 0.65, roughness: 0.2 });
    const fluid = new THREE.Mesh(liqGeo, liqMat);
    fluid.position.set(0, 2.7, 0);
    group.add(fluid);

    // Retort Stand (Base & Rod)
    const baseGeo = new THREE.BoxGeometry(2.5, 0.25, 2.0);
    const baseMat = new THREE.MeshStandardMaterial({ color: 0x334155, metalness: 0.8, roughness: 0.2 });
    const base = new THREE.Mesh(baseGeo, baseMat);
    base.position.set(0, 0.12, -0.6);
    group.add(base);

    const rodGeo = new THREE.CylinderGeometry(0.08, 0.08, 5.8, 16);
    const rod = new THREE.Mesh(rodGeo, baseMat);
    rod.position.set(0, 3.0, -1.2);
    group.add(rod);

    // Sedimenting Microbial Spheres
    const sphereGeo = new THREE.SphereGeometry(0.12, 16, 16);
    const sphereMat = new THREE.MeshStandardMaterial({ color: 0xef4444, roughness: 0.2 });
    const fallingSpheres = [];
    for (let k = 0; k < 6; k++) {
      const sp = new THREE.Mesh(sphereGeo, sphereMat);
      sp.position.set((Math.random() - 0.5) * 0.4, 4.8 - k * 0.7, (Math.random() - 0.5) * 0.4);
      group.add(sp);
      fallingSpheres.push(sp);
    }
    this.dynamicObjects.push({ type: "stokes_particles", list: fallingSpheres, speed: 0.015 });

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 04: High-Speed Microcentrifuge & Balanced Rotor
   * ------------------------------------------------------------- */
  buildLab04Centrifuge(p) {
    const group = new THREE.Group();

    // Centrifuge Outer Housing (Sturdy Rounded Body)
    const bodyGeo = new THREE.CylinderGeometry(2.4, 2.6, 1.8, 36);
    const bodyMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.5, roughness: 0.3 });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    body.position.set(0, 0.9, 0);
    body.castShadow = true;
    group.add(body);

    // Rotor Cavity
    const rotorCavityGeo = new THREE.CylinderGeometry(1.6, 1.5, 0.8, 32);
    const cavityMat = new THREE.MeshStandardMaterial({ color: 0x0f172a, roughness: 0.6 });
    const cavity = new THREE.Mesh(rotorCavityGeo, cavityMat);
    cavity.position.set(0, 1.5, 0);
    group.add(cavity);

    // Rotor Disk (Spinning part)
    const rotorGroup = new THREE.Group();
    rotorGroup.position.set(0, 1.5, 0);

    const diskGeo = new THREE.CylinderGeometry(1.4, 1.4, 0.25, 32);
    const diskMat = new THREE.MeshStandardMaterial({ color: 0x94a3b8, metalness: 0.9, roughness: 0.15 });
    const disk = new THREE.Mesh(diskGeo, diskMat);
    rotorGroup.add(disk);

    // 12 Microcentrifuge Tube Holes & Tubes
    const tubeGeo = new THREE.CylinderGeometry(0.12, 0.08, 0.6, 16);
    const tubeMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, transparent: true, opacity: 0.85 });
    for (let i = 0; i < 12; i++) {
      const angle = (i * Math.PI * 2) / 12;
      const r = 1.0;
      // Add tubes according to balancing state
      let shouldAddTube = false;
      if (p.balancing_state === "balanced") {
        shouldAddTube = (i === 0 || i === 6); // 180 opposite
      } else if (p.balancing_state === "unbalanced") {
        shouldAddTube = (i === 0); // only 1 tube
      } else {
        shouldAddTube = (i === 0 || i === 4 || i === 8); // 120 triangle
      }

      if (shouldAddTube) {
        const tube = new THREE.Mesh(tubeGeo, tubeMat);
        tube.position.set(Math.cos(angle) * r, 0.2, Math.sin(angle) * r);
        tube.rotation.z = 0.35 * Math.sin(angle);
        tube.rotation.x = -0.35 * Math.cos(angle);
        rotorGroup.add(tube);
      }
    }

    group.add(rotorGroup);
    this.dynamicObjects.push({ type: "centrifuge_rotor", obj: rotorGroup, rpm: p.rpm, state: p.balancing_state });

    // Front Digital Speed Display
    const displayGeo = new THREE.PlaneGeometry(1.2, 0.4);
    const displayMat = new THREE.MeshBasicMaterial({ color: 0x0284c7 });
    const display = new THREE.Mesh(displayGeo, displayMat);
    display.position.set(0, 0.9, 2.5);
    display.rotation.x = -0.2;
    group.add(display);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 05: Microbial Incubator & 3-Step PCR Thermal Cycler
   * ------------------------------------------------------------- */
  buildLab05IncubatorPCR(p) {
    const group = new THREE.Group();

    // PCR Machine Body
    const pcrGeo = new THREE.BoxGeometry(3.6, 2.2, 3.2);
    const pcrMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.4, roughness: 0.3 });
    const pcr = new THREE.Mesh(pcrGeo, pcrMat);
    pcr.position.set(0, 1.1, 0);
    pcr.castShadow = true;
    group.add(pcr);

    // Heated Lid / Sample Well Block (Silver Peltier block)
    const blockGeo = new THREE.BoxGeometry(2.0, 0.4, 1.6);
    let blockColor = p.pcr_step === "denature" ? 0xef4444 : (p.pcr_step === "anneal" ? 0x38bdf8 : 0x10b981);
    const blockMat = new THREE.MeshStandardMaterial({ color: blockColor, emissive: blockColor, emissiveIntensity: 0.45, metalness: 0.8 });
    const block = new THREE.Mesh(blockGeo, blockMat);
    block.position.set(0, 2.3, 0.2);
    group.add(block);
    this.dynamicObjects.push({ type: "pcr_block", obj: block });

    // Array of 0.2 mL PCR Tubes in 96-well block
    const pcrTubeGeo = new THREE.ConeGeometry(0.06, 0.35, 12);
    const pcrTubeMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transparent: true, opacity: 0.85 });
    for (let r = -2; r <= 2; r++) {
      for (let c = -3; c <= 3; c++) {
        const t = new THREE.Mesh(pcrTubeGeo, pcrTubeMat);
        t.rotation.x = Math.PI;
        t.position.set(c * 0.24, 2.55, 0.2 + r * 0.24);
        group.add(t);
      }
    }

    // Front Touchscreen Interface
    const screenGeo = new THREE.PlaneGeometry(2.2, 1.1);
    const screenMat = new THREE.MeshBasicMaterial({ color: 0x0f766e });
    const screen = new THREE.Mesh(screenGeo, screenMat);
    screen.position.set(0, 1.3, 1.61);
    group.add(screen);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 06: Digital Steam Autoclave 121°C / 15 psi Chamber
   * ------------------------------------------------------------- */
  buildLab06Autoclave(p) {
    const group = new THREE.Group();

    // Heavy Cylindrical Pressure Vessel (Stainless Steel 316)
    const vesselGeo = new THREE.CylinderGeometry(1.8, 1.8, 3.8, 36);
    const vesselMat = new THREE.MeshStandardMaterial({ color: 0x94a3b8, metalness: 0.9, roughness: 0.2 });
    const vessel = new THREE.Mesh(vesselGeo, vesselMat);
    vessel.position.set(0, 2.0, 0);
    vessel.castShadow = true;
    group.add(vessel);

    // Locking Radial Arm Door Clamps
    const doorRimGeo = new THREE.TorusGeometry(1.85, 0.12, 16, 36);
    const doorMat = new THREE.MeshStandardMaterial({ color: 0x475569, metalness: 0.95 });
    const rim = new THREE.Mesh(doorRimGeo, doorMat);
    rim.rotation.x = Math.PI / 2;
    rim.position.set(0, 3.8, 0);
    group.add(rim);

    // Analog Bourdon Tube Pressure Gauge with moving needle
    const gaugeBodyGeo = new THREE.CylinderGeometry(0.45, 0.45, 0.2, 24);
    const gaugeMat = new THREE.MeshStandardMaterial({ color: 0xffffff });
    const gauge = new THREE.Mesh(gaugeBodyGeo, gaugeMat);
    gauge.rotation.x = Math.PI / 2;
    gauge.position.set(1.2, 3.4, 1.6);
    group.add(gauge);

    // Needle on Gauge
    const needleGeo = new THREE.BoxGeometry(0.04, 0.35, 0.02);
    const needleMat = new THREE.MeshBasicMaterial({ color: 0xdc2626 });
    const needle = new THREE.Mesh(needleGeo, needleMat);
    needle.position.set(1.2, 3.4, 1.72);
    needle.rotation.z = -((p.gauge_pressure_psi / 30.0) * Math.PI * 1.5 - 0.7);
    group.add(needle);
    this.dynamicObjects.push({ type: "autoclave_needle", obj: needle, psi: p.gauge_pressure_psi });

    // Safety Valve Vent on top
    const valveGeo = new THREE.CylinderGeometry(0.12, 0.15, 0.6, 16);
    const valveMat = new THREE.MeshStandardMaterial({ color: 0xd97706, metalness: 0.8 });
    const valve = new THREE.Mesh(valveGeo, valveMat);
    valve.position.set(0, 4.2, 0);
    group.add(valve);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 07: Gram Stain Electrostatic Dipole Chamber
   * ------------------------------------------------------------- */
  buildLab07GramStain(p) {
    const group = new THREE.Group();

    // Staining Basin
    const basinGeo = new THREE.BoxGeometry(4.5, 0.6, 3.0);
    const basinMat = new THREE.MeshStandardMaterial({ color: 0x334155, metalness: 0.5, roughness: 0.3 });
    const basin = new THREE.Mesh(basinGeo, basinMat);
    basin.position.set(0, 0.3, 0);
    group.add(basin);

    // Glass Slide resting across support rods
    const slideGeo = new THREE.BoxGeometry(3.0, 0.08, 1.0);
    const slideMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.95, roughness: 0.05 });
    const slide = new THREE.Mesh(slideGeo, slideMat);
    slide.position.set(0, 0.8, 0);
    group.add(slide);

    // Bacterial Smear Spot on Slide
    let smearColor = 0xa855f7; // default crystal violet
    if (p.stain_agent === "alcohol" && p.bacteria_gram === "gram_neg") smearColor = 0xffffff;
    else if (p.stain_agent === "safranin" && p.bacteria_gram === "gram_neg") smearColor = 0xf43f5e;
    const smearGeo = new THREE.CylinderGeometry(0.35, 0.35, 0.02, 24);
    const smearMat = new THREE.MeshStandardMaterial({ color: smearColor, roughness: 0.4 });
    const smear = new THREE.Mesh(smearGeo, smearMat);
    smear.position.set(0, 0.85, 0);
    group.add(smear);

    // Dropper Pipette dispensing reagent
    const dropperGeo = new THREE.CylinderGeometry(0.08, 0.04, 1.5, 16);
    const dropperMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.9 });
    const dropper = new THREE.Mesh(dropperGeo, dropperMat);
    dropper.position.set(0, 2.0, 0);
    group.add(dropper);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 08: Agarose Gel Electrophoresis Tank & DC Power Supply
   * ------------------------------------------------------------- */
  buildLab08GelElectrophoresis(p) {
    const group = new THREE.Group();

    // 1. Transparent Gel Tank with Buffer
    const tankGeo = new THREE.BoxGeometry(4.2, 1.2, 2.8);
    const tankMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, transmission: 0.9, transparent: true, opacity: 0.45 });
    const tank = new THREE.Mesh(tankGeo, tankMat);
    tank.position.set(-1.0, 0.6, 0);
    group.add(tank);

    // Agarose Gel Slab (Translucent Blue)
    const gelGeo = new THREE.BoxGeometry(2.6, 0.25, 2.0);
    const gelMat = new THREE.MeshStandardMaterial({ color: 0x60a5fa, transparent: true, opacity: 0.75, roughness: 0.1 });
    const gel = new THREE.Mesh(gelGeo, gelMat);
    gel.position.set(-1.0, 0.4, 0);
    group.add(gel);

    // Fluorescent DNA Bands in gel lanes
    const bandGeo = new THREE.BoxGeometry(0.08, 0.04, 0.28);
    const bandMat = new THREE.MeshStandardMaterial({ color: 0x22d3ee, emissive: 0x06b6d4, emissiveIntensity: 0.8 });
    const dnaBands = [];
    for (let lane = -2; lane <= 2; lane++) {
      for (let b = 1; b <= 4; b++) {
        const band = new THREE.Mesh(bandGeo, bandMat);
        const startX = -2.0 + (b * 0.45);
        band.position.set(startX, 0.45, lane * 0.35);
        gel.add(band);
        dnaBands.push(band);
      }
    }
    this.dynamicObjects.push({ type: "dna_bands", list: dnaBands, voltage: p.voltage_v });

    // Platinum Electrodes (Cathode - / Anode +)
    const wireMatNeg = new THREE.MeshBasicMaterial({ color: 0x000000 });
    const wireMatPos = new THREE.MeshBasicMaterial({ color: 0xdc2626 });
    const negWire = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.03, 2.4, 8), wireMatNeg);
    negWire.rotation.x = Math.PI / 2;
    negWire.position.set(-2.9, 0.7, 0);
    group.add(negWire);

    const posWire = new THREE.Mesh(new THREE.CylinderGeometry(0.03, 0.03, 2.4, 8), wireMatPos);
    posWire.rotation.x = Math.PI / 2;
    posWire.position.set(0.9, 0.7, 0);
    group.add(posWire);

    // 2. DC Regulated Power Supply Unit
    const psuGeo = new THREE.BoxGeometry(2.2, 1.8, 2.4);
    const psuMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.5 });
    const psu = new THREE.Mesh(psuGeo, psuMat);
    psu.position.set(2.6, 0.9, 0);
    group.add(psu);

    // Power Supply Digital LED Display
    const psuLedGeo = new THREE.PlaneGeometry(1.2, 0.5);
    const psuLedMat = new THREE.MeshBasicMaterial({ color: 0x22c55e });
    const psuScreen = new THREE.Mesh(psuLedGeo, psuLedMat);
    psuScreen.position.set(2.6, 1.2, 1.21);
    group.add(psuScreen);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 09: Laser Optical Bench & Snell's Law Refraction
   * ------------------------------------------------------------- */
  buildLab09OpticsRefraction(p) {
    const group = new THREE.Group();

    // Optical Bench Rail (Aluminium Profile)
    const railGeo = new THREE.BoxGeometry(8.0, 0.2, 0.8);
    const railMat = new THREE.MeshStandardMaterial({ color: 0x475569, metalness: 0.9, roughness: 0.2 });
    const rail = new THREE.Mesh(railGeo, railMat);
    rail.position.set(0, 0.1, 0);
    group.add(rail);

    // Semicircular Refraction Tank (Glass)
    const tankGeo = new THREE.CylinderGeometry(1.5, 1.5, 0.8, 32, 1, false, 0, Math.PI);
    const tankMat = new THREE.MeshPhysicalMaterial({ color: 0x38bdf8, transmission: 0.9, transparent: true, opacity: 0.6 });
    const tank = new THREE.Mesh(tankGeo, tankMat);
    tank.rotation.x = Math.PI / 2;
    tank.rotation.z = Math.PI / 2;
    tank.position.set(0, 1.0, 0);
    group.add(tank);

    // Diode Laser Housing (Red/Green 532 nm)
    const laserGeo = new THREE.BoxGeometry(1.0, 0.6, 0.6);
    const laserMat = new THREE.MeshStandardMaterial({ color: 0x0f172a });
    const laser = new THREE.Mesh(laserGeo, laserMat);
    const angleRad = (p.incident_angle_deg * Math.PI) / 180.0;
    laser.position.set(-Math.cos(angleRad) * 3.2, 1.0 + Math.sin(angleRad) * 3.2, 0);
    laser.rotation.z = -angleRad;
    group.add(laser);

    // Visible Laser Beam (Red Beam Tube)
    const beamGeo = new THREE.CylinderGeometry(0.02, 0.02, 3.2, 8);
    const beamMat = new THREE.MeshBasicMaterial({ color: 0xef4444 });
    const beam = new THREE.Mesh(beamGeo, beamMat);
    beam.position.set(-Math.cos(angleRad) * 1.6, 1.0 + Math.sin(angleRad) * 1.6, 0);
    beam.rotation.z = Math.PI / 2 - angleRad;
    group.add(beam);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 10: Compound Microscope 100x Oil Immersion
   * ------------------------------------------------------------- */
  buildLab10Microscope(p) {
    const group = new THREE.Group();

    // Microscope Heavy Curved Base
    const baseGeo = new THREE.BoxGeometry(2.4, 0.4, 3.2);
    const baseMat = new THREE.MeshStandardMaterial({ color: 0x0f172a, metalness: 0.8, roughness: 0.3 });
    const base = new THREE.Mesh(baseGeo, baseMat);
    base.position.set(0, 0.2, 0);
    group.add(base);

    // Microscope Arm & Optical Head
    const armGeo = new THREE.BoxGeometry(0.6, 3.5, 0.8);
    const arm = new THREE.Mesh(armGeo, baseMat);
    arm.position.set(0, 2.0, -1.0);
    group.add(arm);

    // Mechanical Stage with Slide Clips
    const stageGeo = new THREE.BoxGeometry(2.0, 0.12, 1.8);
    const stageMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.7 });
    const stage = new THREE.Mesh(stageGeo, stageMat);
    stage.position.set(0, 1.6, 0.2);
    group.add(stage);

    // Glass Slide with Specimen Spot
    const slideGeo = new THREE.BoxGeometry(1.6, 0.04, 0.6);
    const slideMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.95 });
    const slide = new THREE.Mesh(slideGeo, slideMat);
    slide.position.set(0, 1.68, 0.2);
    group.add(slide);

    // Revolving Nosepiece with 4 Objective Lenses
    const noseGeo = new THREE.CylinderGeometry(0.6, 0.7, 0.3, 24);
    const nose = new THREE.Mesh(noseGeo, baseMat);
    nose.position.set(0, 2.6, 0.2);
    group.add(nose);

    // 100x Oil Immersion Lens (White Ring Standard)
    const objGeo = new THREE.CylinderGeometry(0.12, 0.08, 0.7, 16);
    const objMat = new THREE.MeshStandardMaterial({ color: 0xe2e8f0, metalness: 0.9 });
    const obj100 = new THREE.Mesh(objGeo, objMat);
    obj100.position.set(0, 2.15, 0.2);
    group.add(obj100);

    // Immersion Oil Meniscus between lens and slide
    if (p.objective_mag === "100x_oil") {
      const oilGeo = new THREE.CylinderGeometry(0.08, 0.12, 0.12, 16);
      const oilMat = new THREE.MeshStandardMaterial({ color: 0xfef08a, transparent: true, opacity: 0.85, roughness: 0.05 });
      const oilDrop = new THREE.Mesh(oilGeo, oilMat);
      oilDrop.position.set(0, 1.74, 0.2);
      group.add(oilDrop);
    }

    // Binocular Eyepiece Tubes (45 deg angle)
    const eyeGeo = new THREE.CylinderGeometry(0.14, 0.14, 1.2, 16);
    const eye1 = new THREE.Mesh(eyeGeo, baseMat);
    eye1.position.set(-0.25, 4.0, -0.3);
    eye1.rotation.x = -0.5;
    group.add(eye1);

    const eye2 = new THREE.Mesh(eyeGeo, baseMat);
    eye2.position.set(0.25, 4.0, -0.3);
    eye2.rotation.x = -0.5;
    group.add(eye2);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 11: Biosafety Cabinet UV-C Lamp & Irradiance Rig
   * ------------------------------------------------------------- */
  buildLab11UVSterilization(p) {
    const group = new THREE.Group();

    // Biosafety Cabinet Stainless Steel Enclosure
    const cabGeo = new THREE.BoxGeometry(6.0, 4.2, 3.6);
    const cabMat = new THREE.MeshStandardMaterial({ color: 0x334155, metalness: 0.85, roughness: 0.25, side: THREE.BackSide });
    const cabinet = new THREE.Mesh(cabGeo, cabMat);
    cabinet.position.set(0, 2.1, 0);
    group.add(cabinet);

    // UV-C Germicidal Quartz Lamp Tube (254 nm)
    const lampGeo = new THREE.CylinderGeometry(0.08, 0.08, 4.6, 24);
    const lampMat = new THREE.MeshBasicMaterial({ color: 0xc084fc });
    const lamp = new THREE.Mesh(lampGeo, lampMat);
    lamp.rotation.z = Math.PI / 2;
    lamp.position.set(0, 3.8, 0);
    group.add(lamp);

    // Violet UV Glow Light
    const uvLight = new THREE.PointLight(0xa855f7, 2.5, 6.0);
    uvLight.position.set(0, 3.6, 0);
    group.add(uvLight);

    // Target Petri Dish on work surface
    const dishGeo = new THREE.CylinderGeometry(0.8, 0.8, 0.15, 32);
    const dishMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.9, roughness: 0.1 });
    const dish = new THREE.Mesh(dishGeo, dishMat);
    dish.position.set(0, 0.1, 0);
    group.add(dish);

    // Agar inside dish
    const agarGeo = new THREE.CylinderGeometry(0.76, 0.76, 0.08, 32);
    const agarMat = new THREE.MeshStandardMaterial({ color: 0xfef08a, roughness: 0.3 });
    const agar = new THREE.Mesh(agarGeo, agarMat);
    agar.position.set(0, 0.08, 0);
    group.add(agar);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 12: UV-Vis Spectrophotometer & Cuvette Carousel
   * ------------------------------------------------------------- */
  buildLab12Spectrophotometer(p) {
    const group = new THREE.Group();

    // Spectrophotometer Main Chassis
    const chassisGeo = new THREE.BoxGeometry(4.6, 2.0, 3.6);
    const chassisMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.5, roughness: 0.35 });
    const chassis = new THREE.Mesh(chassisGeo, chassisMat);
    chassis.position.set(0, 1.0, 0);
    chassis.castShadow = true;
    group.add(chassis);

    // Sample Compartment Lid (Hinged Black Lid)
    const lidGeo = new THREE.BoxGeometry(1.6, 0.25, 1.8);
    const lidMat = new THREE.MeshStandardMaterial({ color: 0x0f172a, roughness: 0.8 });
    const lid = new THREE.Mesh(lidGeo, lidMat);
    lid.position.set(-1.0, 2.05, 0.2);
    group.add(lid);

    // Optical Cuvette (Standard 1.0 cm Quartz Cuvette)
    const cuvGeo = new THREE.BoxGeometry(0.4, 1.4, 0.4);
    const cuvMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.92, transparent: true, roughness: 0.05 });
    const cuvette = new THREE.Mesh(cuvGeo, cuvMat);
    cuvette.position.set(-1.0, 2.4, 0.2);
    group.add(cuvette);

    // Bacterial Culture in Cuvette
    const sampleLiqGeo = new THREE.BoxGeometry(0.36, 1.1, 0.36);
    let sampleOpacity = 0.3;
    if (p.sample_tube === "std1") sampleOpacity = 0.45;
    else if (p.sample_tube === "std2") sampleOpacity = 0.6;
    else if (p.sample_tube === "std3") sampleOpacity = 0.75;
    else if (p.sample_tube === "std4") sampleOpacity = 0.9;
    else if (p.sample_tube === "unknown") sampleOpacity = 0.68;
    const sampleLiqMat = new THREE.MeshStandardMaterial({ color: 0xfef08a, transparent: true, opacity: sampleOpacity });
    const sampleLiq = new THREE.Mesh(sampleLiqGeo, sampleLiqMat);
    sampleLiq.position.set(-1.0, 2.3, 0.2);
    group.add(sampleLiq);

    // Monochromator Spectral Beam Line
    const lightLineGeo = new THREE.CylinderGeometry(0.02, 0.02, 2.0, 8);
    const lightLineMat = new THREE.MeshBasicMaterial({ color: 0x38bdf8 });
    const lightLine = new THREE.Mesh(lightLineGeo, lightLineMat);
    lightLine.rotation.z = Math.PI / 2;
    lightLine.position.set(-1.0, 2.3, 0.2);
    group.add(lightLine);

    // Digital Photodiode LCD Display
    const lcdGeo = new THREE.PlaneGeometry(1.5, 0.7);
    const lcdMat = new THREE.MeshBasicMaterial({ color: 0x0284c7 });
    const lcd = new THREE.Mesh(lcdGeo, lcdMat);
    lcd.position.set(1.1, 1.4, 1.81);
    group.add(lcd);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 13: Integrated Smart Microbiology Sensor Rig Sandbox
   * ------------------------------------------------------------- */

  /* -------------------------------------------------------------
   * Lab 05: Microscopic Collision Air Track & Momentum Stage 3D
   * ------------------------------------------------------------- */
  buildLab05Momentum(p) {
    const group = new THREE.Group();
    // Air track rail
    const railGeo = new THREE.BoxGeometry(7.0, 0.25, 0.8);
    const railMat = new THREE.MeshStandardMaterial({ color: 0x334155, metalness: 0.85, roughness: 0.2 });
    const rail = new THREE.Mesh(railGeo, railMat);
    rail.position.set(0, 1.2, 0);
    rail.castShadow = true;
    group.add(rail);

    // Glider Cart 1 (Amber)
    const cart1Geo = new THREE.BoxGeometry(0.8, 0.45, 0.6);
    const cart1Mat = new THREE.MeshStandardMaterial({ color: 0xf59e0b, metalness: 0.5, roughness: 0.3 });
    const cart1 = new THREE.Mesh(cart1Geo, cart1Mat);
    cart1.position.set(-1.2, 1.55, 0);
    cart1.castShadow = true;
    group.add(cart1);

    // Glider Cart 2 (Cyan)
    const cart2Geo = new THREE.BoxGeometry(0.8, 0.45, 0.6);
    const cart2Mat = new THREE.MeshStandardMaterial({ color: 0x06b6d4, metalness: 0.5, roughness: 0.3 });
    const cart2 = new THREE.Mesh(cart2Geo, cart2Mat);
    cart2.position.set(1.2, 1.55, 0);
    cart2.castShadow = true;
    group.add(cart2);

    this.dynamicObjects.push({ type: "collision_cart1", obj: cart1 });
    this.dynamicObjects.push({ type: "collision_cart2", obj: cart2 });

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 06: Osmometer & U-Tube Hydrostatic Stage 3D
   * ------------------------------------------------------------- */
  buildLab06Osmosis(p) {
    const group = new THREE.Group();
    // U-Tube glass geometry
    const tubeMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transparent: true, opacity: 0.6, roughness: 0.1, transmission: 0.9 });
    
    // Left column
    const leftCol = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.35, 4.0, 24), tubeMat);
    leftCol.position.set(-1.2, 2.2, 0);
    group.add(leftCol);

    // Right column
    const rightCol = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.35, 4.0, 24), tubeMat);
    rightCol.position.set(1.2, 2.2, 0);
    group.add(rightCol);

    // Bottom connecting tube
    const botTube = new THREE.Mesh(new THREE.CylinderGeometry(0.35, 0.35, 2.4, 24), tubeMat);
    botTube.rotation.z = Math.PI / 2;
    botTube.position.set(0, 0.35, 0);
    group.add(botTube);

    // Semipermeable membrane disc in the middle
    const memMat = new THREE.MeshStandardMaterial({ color: 0x10b981, emissive: 0x10b981, emissiveIntensity: 0.5 });
    const mem = new THREE.Mesh(new THREE.CylinderGeometry(0.36, 0.36, 0.08, 24), memMat);
    mem.rotation.z = Math.PI / 2;
    mem.position.set(0, 0.35, 0);
    group.add(mem);

    // Solution Liquid in Right Tube (Hypertonic level rises)
    const liqMat = new THREE.MeshStandardMaterial({ color: 0x38bdf8, transparent: true, opacity: 0.75 });
    const liqRight = new THREE.Mesh(new THREE.CylinderGeometry(0.32, 0.32, 2.8, 24), liqMat);
    liqRight.position.set(1.2, 1.6, 0);
    group.add(liqRight);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 07: F0F1 ATP Synthase Rotary Motor 3D
   * ------------------------------------------------------------- */
  buildLab07ATPSynthase(p) {
    const group = new THREE.Group();
    // Membrane lipid bilayer slab
    const memGeo = new THREE.BoxGeometry(5.0, 0.5, 4.0);
    const memMat = new THREE.MeshStandardMaterial({ color: 0xd97706, roughness: 0.6 });
    const membrane = new THREE.Mesh(memGeo, memMat);
    membrane.position.set(0, 1.2, 0);
    group.add(membrane);

    // F0 c-ring rotor in membrane
    const f0Geo = new THREE.CylinderGeometry(0.8, 0.8, 0.9, 16);
    const f0Mat = new THREE.MeshStandardMaterial({ color: 0x10b981, metalness: 0.4, roughness: 0.3 });
    const f0 = new THREE.Mesh(f0Geo, f0Mat);
    f0.position.set(0, 1.2, 0);
    group.add(f0);

    // Central stalk shaft (gamma subunit)
    const stalkGeo = new THREE.CylinderGeometry(0.18, 0.18, 1.8, 16);
    const stalkMat = new THREE.MeshStandardMaterial({ color: 0xec4899, metalness: 0.7 });
    const stalk = new THREE.Mesh(stalkGeo, stalkMat);
    stalk.position.set(0, 2.2, 0);
    group.add(stalk);

    // F1 hexamer head (alpha3 beta3)
    const f1Geo = new THREE.SphereGeometry(1.0, 24, 24);
    const f1Mat = new THREE.MeshStandardMaterial({ color: 0x6366f1, roughness: 0.3 });
    const f1 = new THREE.Mesh(f1Geo, f1Mat);
    f1.position.set(0, 2.9, 0);
    group.add(f1);

    this.dynamicObjects.push({ type: "atp_rotor", obj: f0 });
    this.dynamicObjects.push({ type: "atp_stalk", obj: stalk });

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * Lab 08: Bacterial Flagellar Rotary Motor 3D
   * ------------------------------------------------------------- */
  buildLab08Flagella(p) {
    const group = new THREE.Group();
    // Bacterial cell body (Rod-shaped bacillus)
    const bodyGeo = new THREE.CapsuleGeometry ? new THREE.CapsuleGeometry(1.0, 2.5, 16, 24) : new THREE.CylinderGeometry(1.0, 1.0, 2.5, 24);
    const bodyMat = new THREE.MeshStandardMaterial({ color: 0x14b8a6, roughness: 0.4 });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    body.rotation.z = Math.PI / 2;
    body.position.set(0, 2.0, 0);
    group.add(body);

    // Flagellar Hook & Filament (Helical coil)
    const curvePoints = [];
    for (let t = 0; t <= 4 * Math.PI; t += 0.2) {
      curvePoints.push(new THREE.Vector3(
        -1.4 - (t * 0.25),
        2.0 + Math.sin(t) * 0.35,
        Math.cos(t) * 0.35
      ));
    }
    const curve = new THREE.CatmullRomCurve3(curvePoints);
    const tubeGeo = new THREE.TubeGeometry(curve, 64, 0.08, 12, false);
    const tubeMat = new THREE.MeshStandardMaterial({ color: 0xf59e0b, metalness: 0.3 });
    const filament = new THREE.Mesh(tubeGeo, tubeMat);
    group.add(filament);

    this.dynamicObjects.push({ type: "flagella_filament", obj: filament });
    this.apparatusGroup.add(group);
  }

  buildLab13SmartSensorSandbox(p) {
    const group = new THREE.Group();

    // Smart Bioreactor Mini-Vessel (Glass Fermenter)
    const vesselGeo = new THREE.CylinderGeometry(1.2, 1.2, 3.2, 32);
    const vesselMat = new THREE.MeshPhysicalMaterial({ color: 0xffffff, transmission: 0.9, transparent: true, opacity: 0.5 });
    const vessel = new THREE.Mesh(vesselGeo, vesselMat);
    vessel.position.set(0, 1.8, 0);
    group.add(vessel);

    // Liquid Culture with Stirrer Shaft
    const cultureGeo = new THREE.CylinderGeometry(1.15, 1.15, 2.4, 32);
    const cultureMat = new THREE.MeshStandardMaterial({ color: 0x10b981, transparent: true, opacity: 0.75 });
    const culture = new THREE.Mesh(cultureGeo, cultureMat);
    culture.position.set(0, 1.4, 0);
    group.add(culture);

    // Rotating Impeller Blade
    const bladeGeo = new THREE.BoxGeometry(0.8, 0.15, 0.1);
    const bladeMat = new THREE.MeshStandardMaterial({ color: 0x94a3b8, metalness: 0.9 });
    const blade = new THREE.Mesh(bladeGeo, bladeMat);
    blade.position.set(0, 0.8, 0);
    group.add(blade);
    this.dynamicObjects.push({ type: "bioreactor_blade", obj: blade });

    // IoT Sensor Probe Header (pH, DO, Optical Density)
    const probeHeadGeo = new THREE.CylinderGeometry(1.3, 1.3, 0.3, 32);
    const probeHeadMat = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.7 });
    const probeHead = new THREE.Mesh(probeHeadGeo, probeHeadMat);
    probeHead.position.set(0, 3.4, 0);
    group.add(probeHead);

    this.apparatusGroup.add(group);
  }

  /* -------------------------------------------------------------
   * 60 FPS Render Loop & Physics Dynamics
   * ------------------------------------------------------------- */
  animate() {
    this.animFrameId = requestAnimationFrame(() => this.animate());
    const delta = this.clock.getDelta();
    this.time += delta;

    // Update OrbitControls
    if (this.controls) this.controls.update();

    // Update dynamic apparatus elements
    for (const item of this.dynamicObjects) {
      if (item.type === "water_mols") {
        for (const mol of item.list) {
          mol.position.x += mol.userData.vx;
          mol.position.y += mol.userData.vy;
          mol.position.z += mol.userData.vz;
          if (Math.abs(mol.position.x) > 2.3) mol.userData.vx *= -1;
          if (mol.position.y < 0.3 || mol.position.y > 3.4) mol.userData.vy *= -1;
          if (Math.abs(mol.position.z) > 1.8) mol.userData.vz *= -1;
        }
      } else if (item.type === "bacteria_brownian") {
        for (const bac of item.list) {
          bac.position.x += bac.userData.vx;
          bac.position.y += bac.userData.vy;
          bac.position.z += bac.userData.vz;
          bac.userData.timer += delta;
          if (bac.userData.timer > 1.2) {
            bac.userData.vx = (Math.random() - 0.5) * 0.04;
            bac.userData.vy = (Math.random() - 0.5) * 0.04;
            bac.userData.vz = (Math.random() - 0.5) * 0.04;
            bac.userData.timer = 0;
          }
          if (Math.abs(bac.position.x) > 2.0) bac.userData.vx *= -1;
          if (bac.position.y < 0.5 || bac.position.y > 3.0) bac.userData.vy *= -1;
          if (Math.abs(bac.position.z) > 1.5) bac.userData.vz *= -1;
        }
      } else if (item.type === "centrifuge_rotor") {
        const speed = (item.rpm / 60.0) * Math.PI * 2 * delta * 0.15;
        item.obj.rotation.y += speed;
        if (item.state === "unbalanced") {
          item.obj.position.x = Math.sin(this.time * 25) * 0.04;
          item.obj.position.z = Math.cos(this.time * 25) * 0.04;
        }
      } else if (item.type === "stokes_particles") {
        for (const sp of item.list) {
          sp.position.y -= item.speed;
          if (sp.position.y < 0.6) sp.position.y = 4.8;
        }
      } else if (item.type === "bioreactor_blade") {
        item.obj.rotation.y += 0.08;
      }
    }

    // Render Scene
    if (this.renderer && this.scene && this.camera) {
      this.renderer.render(this.scene, this.camera);
    }

    // Render Live Mini-Oscilloscope Graph
    this.renderOscilloscope();
  }

  renderOscilloscope() {
    if (!this.oscCtx || !this.oscCanvas) return;
    const ctx = this.oscCtx;
    const w = this.oscCanvas.width;
    const h = this.oscCanvas.height;

    // Background dark clear
    ctx.fillStyle = "#090d16";
    ctx.fillRect(0, 0, w, h);

    // Grid lines
    ctx.strokeStyle = "rgba(16, 185, 129, 0.12)";
    ctx.lineWidth = 1;
    for (let x = 0; x < w; x += 25) {
      ctx.beginPath();
      ctx.moveTo(x, 0);
      ctx.lineTo(x, h);
      ctx.stroke();
    }
    for (let y = 0; y < h; y += 20) {
      ctx.beginPath();
      ctx.moveTo(0, y);
      ctx.lineTo(w, y);
      ctx.stroke();
    }

    // Signal waveform
    ctx.strokeStyle = "#38bdf8";
    ctx.lineWidth = 2;
    ctx.beginPath();
    for (let x = 0; x < w; x++) {
      const freq = this.currentLabId === "lab04" ? 0.08 : (this.currentLabId === "lab08" ? 0.04 : 0.05);
      const amp = this.currentLabId === "lab04" ? 22 : 16;
      const noise = (Math.random() - 0.5) * 2;
      const y = h / 2 + Math.sin(x * freq + this.time * 5) * amp + noise;
      if (x === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.stroke();
  }

  destroy() {
    if (this.animFrameId) cancelAnimationFrame(this.animFrameId);
    if (this.renderer && this.renderer.domElement && this.renderer.domElement.parentNode) {
      this.renderer.domElement.parentNode.removeChild(this.renderer.domElement);
    }
  }
}

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Sim3DEngine;
}
