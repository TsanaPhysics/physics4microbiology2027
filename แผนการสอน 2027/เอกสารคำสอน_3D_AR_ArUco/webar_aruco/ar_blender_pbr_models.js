// ============================================================================
// BLENDER Principled BSDF + Photorealistic PBR 12-Chapter Master Engine (v2027.5)
// Course: 4011111 Physics for Microbiology (ArUco IDs 0 to 11)
// Every single chapter (ID 0–11) is built to the exact same photorealistic
// standard as the P1000 Micropipette showcase: hollow borosilicate glass with
// rolled lips & concave meniscus, procedural knurling & brushed metal bump maps,
// silk-screened graduations, live dynamic digital/analog instrument dials,
// and internal X-Ray cutaway mechanisms.
// ============================================================================
(function () {
  function makeKnurlBump() {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 128;
    const ctx = c.getContext('2d');
    for (let x = 0; x < 512; x += 8) {
      const g = ctx.createLinearGradient(x, 0, x + 8, 0);
      g.addColorStop(0, '#0a0a0a');
      g.addColorStop(0.5, '#f5f5f5');
      g.addColorStop(1, '#0a0a0a');
      ctx.fillStyle = g;
      ctx.fillRect(x, 0, 8, 128);
    }
    const t = new THREE.CanvasTexture(c);
    t.wrapS = t.wrapT = THREE.RepeatWrapping;
    return t;
  }

  function makeBrushedMetalBump() {
    const c = document.createElement('canvas');
    c.width = 256; c.height = 256;
    const ctx = c.getContext('2d');
    ctx.fillStyle = '#808080';
    ctx.fillRect(0, 0, 256, 256);
    for (let y = 0; y < 256; y += 2) {
      const v = 95 + Math.floor(Math.random() * 65);
      ctx.fillStyle = `rgb(${v},${v},${v})`;
      ctx.fillRect(0, y, 256, 1);
    }
    const t = new THREE.CanvasTexture(c);
    t.wrapS = t.wrapT = THREE.RepeatWrapping;
    return t;
  }

  function makeBioBump() {
    const c = document.createElement('canvas');
    c.width = 256; c.height = 256;
    const ctx = c.getContext('2d');
    ctx.fillStyle = '#707070';
    ctx.fillRect(0, 0, 256, 256);
    for (let i = 0; i < 450; i++) {
      const x = Math.random() * 256, y = Math.random() * 256, r = 3 + Math.random() * 8;
      const g = ctx.createRadialGradient(x, y, 0, x, y, r);
      g.addColorStop(0, '#d0d0d0');
      g.addColorStop(1, '#707070');
      ctx.fillStyle = g;
      ctx.beginPath();
      ctx.arc(x, y, r, 0, Math.PI * 2);
      ctx.fill();
    }
    const t = new THREE.CanvasTexture(c);
    t.wrapS = t.wrapT = THREE.RepeatWrapping;
    return t;
  }

  function makeGraduationTex(marks, color = 'rgba(240,249,255,0.92)') {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 512;
    const ctx = c.getContext('2d');
    ctx.strokeStyle = color;
    ctx.fillStyle = color;
    ctx.lineWidth = 3.5;
    ctx.font = 'bold 22px JetBrains Mono, monospace';
    for (let y = 55; y <= 455; y += 24) {
      ctx.beginPath();
      ctx.moveTo(220, y);
      ctx.lineTo(y % 48 === 7 ? 268 : 246, y);
      ctx.stroke();
    }
    marks.forEach((m) => {
      ctx.beginPath();
      ctx.moveTo(205, m.y);
      ctx.lineTo(275, m.y);
      ctx.stroke();
      ctx.fillText(m.label, 284, m.y + 7);
    });
    return new THREE.CanvasTexture(c);
  }

  function makeP1000HandleTex(volVal) {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 1024;
    const ctx = c.getContext('2d');
    ctx.fillStyle = '#034991';
    ctx.fillRect(0, 0, 512, 1024);
    ctx.fillStyle = 'rgba(255,255,255,0.03)';
    for (let i = 0; i < 1500; i++) {
      ctx.fillRect(Math.random() * 512, Math.random() * 1024, 2, 2);
    }
    ctx.fillStyle = '#e0f2fe';
    ctx.font = 'bold 30px Chakra Petch, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('PIPETMAN P1000', 256, 210);
    ctx.font = 'bold 22px JetBrains Mono, monospace';
    ctx.fillStyle = '#38bdf8';
    ctx.fillText('100 – 1000 μL', 256, 248);

    ctx.fillStyle = '#090d16';
    ctx.strokeStyle = '#38bdf8';
    ctx.lineWidth = 5;
    ctx.fillRect(182, 290, 148, 350);
    ctx.strokeRect(182, 290, 148, 350);

    const str = String(Math.round(volVal || 1000)).padStart(4, '0');
    for (let d = 0; d < 4; d++) {
      ctx.fillStyle = d === 0 ? '#1e293b' : '#111827';
      ctx.fillRect(196, 306 + d * 80, 120, 70);
      ctx.font = 'bold 56px JetBrains Mono, monospace';
      ctx.fillStyle = d === 0 ? '#f43f5e' : '#f8fafc';
      ctx.fillText(str[d], 256, 360 + d * 80);
    }
    return new THREE.CanvasTexture(c);
  }

  function makeGaugeFaceTex(psiVal) {
    const c = document.createElement('canvas');
    c.width = 256; c.height = 256;
    const ctx = c.getContext('2d');
    ctx.fillStyle = '#f8fafc';
    ctx.beginPath();
    ctx.arc(128, 128, 118, 0, Math.PI * 2);
    ctx.fill();
    ctx.lineWidth = 8;
    ctx.strokeStyle = '#0f172a';
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(128, 128, 96, -Math.PI * 0.68, -Math.PI * 0.22);
    ctx.strokeStyle = '#10b981';
    ctx.lineWidth = 15;
    ctx.stroke();
    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 22px JetBrains Mono, monospace';
    ctx.textAlign = 'center';
    ctx.fillText((psiVal || 15) + ' psi', 128, 84);
    ctx.fillStyle = '#059669';
    ctx.font = 'bold 20px JetBrains Mono, monospace';
    ctx.fillText('121.0°C', 128, 182);
    const ang = -Math.PI * 1.15 + ((psiVal || 15) / 25) * Math.PI * 1.3;
    ctx.strokeStyle = '#e11d48';
    ctx.lineWidth = 6;
    ctx.beginPath();
    ctx.moveTo(128, 128);
    ctx.lineTo(128 + Math.cos(ang) * 82, 128 + Math.sin(ang) * 82);
    ctx.stroke();
    ctx.fillStyle = '#0f172a';
    ctx.beginPath();
    ctx.arc(128, 128, 12, 0, Math.PI * 2);
    ctx.fill();
    return new THREE.CanvasTexture(c);
  }

  function makeObjectiveBarrelTex() {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 512;
    const ctx = c.getContext('2d');
    const g = ctx.createLinearGradient(0, 0, 512, 0);
    g.addColorStop(0, '#cbd5e1');
    g.addColorStop(0.5, '#ffffff');
    g.addColorStop(1, '#94a3b8');
    ctx.fillStyle = g;
    ctx.fillRect(0, 0, 512, 512);
    ctx.fillStyle = '#0f172a';
    ctx.fillRect(0, 65, 512, 78);
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 368, 512, 36);
    ctx.fillStyle = '#f59e0b';
    ctx.fillRect(0, 316, 512, 24);
    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 34px Chakra Petch, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('Plan N 100x / 1.25 Oil', 256, 222);
    ctx.font = 'bold 26px JetBrains Mono, monospace';
    ctx.fillText('∞ / 0.17   FN22', 256, 268);
    return new THREE.CanvasTexture(c);
  }

  function makeDigitalOLEDTex(line1, line2, accent = '#00f0ff') {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 256;
    const ctx = c.getContext('2d');
    ctx.fillStyle = '#020617';
    ctx.fillRect(0, 0, 512, 256);
    ctx.strokeStyle = accent;
    ctx.lineWidth = 8;
    ctx.strokeRect(8, 8, 496, 240);
    ctx.fillStyle = accent;
    ctx.font = 'bold 40px JetBrains Mono, monospace';
    ctx.textAlign = 'center';
    ctx.fillText(line1, 256, 108);
    ctx.fillStyle = '#34d399';
    ctx.font = 'bold 32px JetBrains Mono, monospace';
    ctx.fillText(line2, 256, 184);
    return new THREE.CanvasTexture(c);
  }

  const knurlBump = makeKnurlBump();
  const brushedBump = makeBrushedMetalBump();
  const bioBump = makeBioBump();
  const tubeGradTex = makeGraduationTex([
    { y: 115, label: '15 mL' },
    { y: 235, label: '10 mL' },
    { y: 355, label: '5 mL' }
  ]);
  const cylGradTex = makeGraduationTex([
    { y: 95, label: '100 mL' },
    { y: 195, label: '75 mL' },
    { y: 295, label: '50 mL' },
    { y: 395, label: '25 mL' }
  ]);
  const flaskGradTex = makeGraduationTex([
    { y: 140, label: '500 mL' },
    { y: 260, label: '250 mL' },
    { y: 380, label: '100 mL' }
  ]);
  const tipGradTex = makeGraduationTex([
    { y: 130, label: '1000 μL' },
    { y: 260, label: '500 μL' },
    { y: 390, label: '100 μL' }
  ]);
  const eppGradTex = makeGraduationTex([
    { y: 140, label: '1.5 mL' },
    { y: 260, label: '1.0 mL' },
    { y: 380, label: '0.5 mL' }
  ]);
  const objBarrelTex = makeObjectiveBarrelTex();

  const M = {
    borosilicate: new THREE.MeshPhysicalMaterial({
      color: 0xf0f9ff, transparent: true, opacity: 0.34,
      roughness: 0.03, metalness: 0.02, clearcoat: 1.0, clearcoatRoughness: 0.02, reflectivity: 0.98
    }),
    flintGlass: new THREE.MeshPhysicalMaterial({
      color: 0xe0f2fe, transparent: true, opacity: 0.46,
      roughness: 0.02, metalness: 0.05, clearcoat: 1.0, clearcoatRoughness: 0.01, reflectivity: 1.0
    }),
    quartzGlass: new THREE.MeshPhysicalMaterial({
      color: 0xf8fafc, transparent: true, opacity: 0.32,
      roughness: 0.02, metalness: 0.0, clearcoat: 1.0, reflectivity: 0.98
    }),
    frostedQuartz: new THREE.MeshPhysicalMaterial({
      color: 0xcbd5e1, transparent: true, opacity: 0.68,
      roughness: 0.55, metalness: 0.05, clearcoat: 0.2
    }),
    polypropylene: new THREE.MeshPhysicalMaterial({
      color: 0xdbeafe, transparent: true, opacity: 0.42,
      roughness: 0.07, metalness: 0.0, clearcoat: 1.0, clearcoatRoughness: 0.05, reflectivity: 0.92
    }),
    stainless316L: new THREE.MeshPhysicalMaterial({
      color: 0xe2e8f0, metalness: 0.94, roughness: 0.13,
      bumpMap: brushedBump, bumpScale: 0.014, clearcoat: 0.65
    }),
    titaniumBrushed: new THREE.MeshPhysicalMaterial({
      color: 0x64748b, metalness: 0.88, roughness: 0.22,
      bumpMap: brushedBump, bumpScale: 0.016
    }),
    darkPVDF: new THREE.MeshStandardMaterial({
      color: 0x161f2e, roughness: 0.30, metalness: 0.22
    }),
    knurledDial: new THREE.MeshStandardMaterial({
      color: 0x1e293b, roughness: 0.34, metalness: 0.28,
      bumpMap: knurlBump, bumpScale: 0.048
    }),
    blueAnodized: new THREE.MeshPhysicalMaterial({
      color: 0x0284c7, metalness: 0.68, roughness: 0.18,
      bumpMap: brushedBump, bumpScale: 0.009, clearcoat: 0.85
    }),
    goldPeltier: new THREE.MeshPhysicalMaterial({
      color: 0xfbbf24, metalness: 0.92, roughness: 0.14,
      bumpMap: brushedBump, bumpScale: 0.01, clearcoat: 0.75
    }),
    copperPolished: new THREE.MeshPhysicalMaterial({
      color: 0xea580c, metalness: 0.90, roughness: 0.16,
      bumpMap: brushedBump, bumpScale: 0.012, clearcoat: 0.7
    }),
    bioCapsuleOuter: new THREE.MeshPhysicalMaterial({
      color: 0x34d399, transparent: true, opacity: 0.38,
      roughness: 0.12, bumpMap: bioBump, bumpScale: 0.025, clearcoat: 1.0
    }),
    bioCytoplasm: new THREE.MeshPhysicalMaterial({
      color: 0x059669, emissive: 0x047857, emissiveIntensity: 0.35,
      roughness: 0.22, bumpMap: bioBump, bumpScale: 0.018, clearcoat: 0.85
    }),
    bioVioletWall: new THREE.MeshPhysicalMaterial({
      color: 0x7e22ce, emissive: 0x581c87, emissiveIntensity: 0.3,
      roughness: 0.24, bumpMap: bioBump, bumpScale: 0.022, clearcoat: 0.8
    }),
    agarAmber: new THREE.MeshPhysicalMaterial({
      color: 0xf59e0b, emissive: 0xb45309, emissiveIntensity: 0.15,
      transparent: true, opacity: 0.78, roughness: 0.12, clearcoat: 0.95
    }),
    agaroseGel: new THREE.MeshPhysicalMaterial({
      color: 0x38bdf8, emissive: 0x0284c7, emissiveIntensity: 0.16,
      transparent: true, opacity: 0.52, roughness: 0.08, clearcoat: 1.0
    }),
    immersionOil: new THREE.MeshPhysicalMaterial({
      color: 0xfbbf24, emissive: 0xd97706, emissiveIntensity: 0.2,
      transparent: true, opacity: 0.85, roughness: 0.02, clearcoat: 1.0
    }),
    reagentBlue: new THREE.MeshPhysicalMaterial({
      color: 0x00b4d8, emissive: 0x0284c7, emissiveIntensity: 0.25,
      transparent: true, opacity: 0.86, roughness: 0.05, clearcoat: 1.0
    }),
    cyanGlow: new THREE.MeshStandardMaterial({
      color: 0x00f0ff, emissive: 0x00b4d8, emissiveIntensity: 0.75, roughness: 0.12
    }),
    magentaGlow: new THREE.MeshStandardMaterial({
      color: 0xf43f5e, emissive: 0xe11d48, emissiveIntensity: 0.7, roughness: 0.15
    }),
    violetUV: new THREE.MeshStandardMaterial({
      color: 0xa855f7, emissive: 0x7e22ce, emissiveIntensity: 0.85, roughness: 0.12
    })
  };

  function buildBorosilicateTestTube(radius, height, liqHeight, liqMat, gradTex) {
    const g = new THREE.Group();
    const wall = new THREE.Mesh(new THREE.CylinderGeometry(radius, radius, height, 40, 1, true), M.borosilicate);
    const bot = new THREE.Mesh(new THREE.SphereGeometry(radius, 36, 18, 0, Math.PI * 2, Math.PI / 2, Math.PI / 2), M.borosilicate);
    bot.position.y = -height * 0.5;
    const lip = new THREE.Mesh(new THREE.TorusGeometry(radius, radius * 0.09, 14, 36), M.borosilicate);
    lip.rotation.x = Math.PI / 2;
    lip.position.y = height * 0.5;
    g.add(wall, bot, lip);

    if (gradTex) {
      const grad = new THREE.Mesh(
        new THREE.CylinderGeometry(radius * 1.008, radius * 1.008, height * 0.88, 32, 1, true),
        new THREE.MeshBasicMaterial({ map: gradTex, transparent: true, depthWrite: false })
      );
      g.add(grad);
    }

    if (liqHeight > 0 && liqMat) {
      const rIn = radius * 0.89;
      const lCyl = new THREE.Mesh(new THREE.CylinderGeometry(rIn, rIn, liqHeight, 32), liqMat);
      lCyl.position.y = -height * 0.5 + liqHeight * 0.5;
      const lBot = new THREE.Mesh(new THREE.SphereGeometry(rIn, 28, 14, 0, Math.PI * 2, Math.PI / 2, Math.PI / 2), liqMat);
      lBot.position.y = -height * 0.5;
      const meniscus = new THREE.Mesh(new THREE.TorusGeometry(rIn * 0.93, rIn * 0.08, 12, 32), liqMat);
      meniscus.rotation.x = Math.PI / 2;
      meniscus.position.y = -height * 0.5 + liqHeight;
      g.add(lCyl, lBot, meniscus);
      g.userData.liqMesh = lCyl;
    }
    return g;
  }

  window.buildModelForChapter = function (id) {
    while (modelGroup.children.length > 0) {
      modelGroup.remove(modelGroup.children[0]);
    }
    while (labelsGroup.children.length > 0) {
      labelsGroup.remove(labelsGroup.children[0]);
    }
    modelGroup.add(labelsGroup);
    labelsGroup.visible = showLabels;
    dynamicObjects = {};
    explodingParts = [];
    modelGroup.add(createArUcoPedestal(id));

    if (id === 0) {
      const pipGroup = new THREE.Group();
      pipGroup.position.set(-0.98, 0.25, 0);

      const handleTex = makeP1000HandleTex(params.vol || 1000);
      const matHandle = new THREE.MeshPhysicalMaterial({
        map: handleTex, roughness: 0.26, metalness: 0.04, clearcoat: 0.48
      });
      const grip = new THREE.Mesh(new THREE.CylinderGeometry(0.185, 0.16, 1.32, 48), matHandle);
      grip.position.y = 0.15;
      pipGroup.add(grip);

      const winLens = new THREE.Mesh(new THREE.BoxGeometry(0.03, 0.42, 0.16), M.borosilicate);
      winLens.position.set(0.175, 0.12, 0);
      pipGroup.add(winLens);

      const hook = new THREE.Mesh(new THREE.BoxGeometry(0.34, 0.075, 0.16), M.darkPVDF);
      hook.position.set(0.22, 0.68, 0);
      hook.rotation.z = -0.2;
      pipGroup.add(hook);

      const innerSpring = new THREE.Group();
      for (let s = 0; s < 14; s++) {
        const coil = new THREE.Mesh(new THREE.TorusGeometry(0.095, 0.014, 10, 24), M.goldPeltier);
        coil.rotation.x = Math.PI / 2 + 0.1;
        coil.position.y = -0.25 + s * 0.055;
        innerSpring.add(coil);
      }
      pipGroup.add(innerSpring);
      registerExplode(innerSpring, -0.55, 0, 0);

      const dial = new THREE.Mesh(new THREE.CylinderGeometry(0.165, 0.165, 0.22, 48), M.knurledDial);
      dial.position.y = 0.92;
      pipGroup.add(dial);

      const plunger = new THREE.Group();
      plunger.position.y = 1.25;
      const pRod = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 0.58, 32), M.stainless316L);
      const pCap = new THREE.Mesh(new THREE.CylinderGeometry(0.165, 0.145, 0.09, 40), M.immersionOil);
      pCap.position.y = 0.28;
      plunger.add(pRod, pCap);
      pipGroup.add(plunger);
      dynamicObjects.plunger = plunger;
      registerExplode(plunger, 0, 0.55, 0);

      const shaft = new THREE.Mesh(new THREE.CylinderGeometry(0.145, 0.075, 0.62, 40), M.darkPVDF);
      shaft.position.y = -0.78;
      pipGroup.add(shaft);

      const ejArm = new THREE.Mesh(new THREE.BoxGeometry(0.055, 1.28, 0.10), M.stainless316L);
      ejArm.position.set(-0.21, -0.05, 0);
      const ejCollar = new THREE.Mesh(new THREE.CylinderGeometry(0.11, 0.10, 0.16, 32), M.stainless316L);
      ejCollar.position.set(0, -0.72, 0);
      pipGroup.add(ejArm, ejCollar);
      registerExplode(ejArm, -0.35, 0, 0);

      const tipGroup = new THREE.Group();
      tipGroup.position.y = -1.42;
      const tipCone = new THREE.Mesh(new THREE.CylinderGeometry(0.098, 0.022, 0.92, 40, 1, true), M.polypropylene);
      const tipScale = new THREE.Mesh(
        new THREE.CylinderGeometry(0.10, 0.024, 0.92, 32, 1, true),
        new THREE.MeshBasicMaterial({ map: tipGradTex, transparent: true, depthWrite: false })
      );
      const liqInTip = new THREE.Mesh(new THREE.CylinderGeometry(0.078, 0.020, 0.62, 32), M.reagentBlue);
      liqInTip.position.y = -0.08;
      const tipMeniscus = new THREE.Mesh(new THREE.TorusGeometry(0.072, 0.008, 10, 28), M.reagentBlue);
      tipMeniscus.rotation.x = Math.PI / 2;
      tipMeniscus.position.y = 0.23;
      tipGroup.add(tipCone, tipScale, liqInTip, tipMeniscus);
      pipGroup.add(tipGroup);
      dynamicObjects.liqInTip = liqInTip;
      registerExplode(tipGroup, 0, -0.55, 0);
      modelGroup.add(pipGroup);

      const rackBase = new THREE.Mesh(new THREE.BoxGeometry(2.42, 0.10, 0.76), M.titaniumBrushed);
      rackBase.position.set(0.55, -1.38, 0);
      const rackTop = new THREE.Mesh(new THREE.BoxGeometry(2.42, 0.07, 0.76), M.blueAnodized);
      rackTop.position.set(0.55, -0.48, 0);
      const postL = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 0.92, 20), M.stainless316L);
      postL.position.set(-0.58, -0.92, -0.28);
      const postR = postL.clone();
      postR.position.set(1.68, -0.92, -0.28);
      modelGroup.add(rackBase, rackTop, postL, postR);

      for (let i = 0; i < 6; i++) {
        const tx = -0.38 + i * 0.37;
        const hue = 0.46 - i * 0.045;
        const liqMat = new THREE.MeshPhysicalMaterial({
          color: new THREE.Color().setHSL(hue, 0.9, 0.46),
          emissive: new THREE.Color().setHSL(hue, 0.85, 0.22),
          transparent: true, opacity: 0.92 - i * 0.11, roughness: 0.05, clearcoat: 1.0
        });
        const bTube = buildBorosilicateTestTube(0.115, 1.22, 0.76, liqMat, tubeGradTex);
        bTube.position.set(tx, -0.72, 0);
        modelGroup.add(bTube);

        const cap = new THREE.Mesh(new THREE.CylinderGeometry(0.128, 0.128, 0.14, 32), i === 4 ? M.magentaGlow : M.knurledDial);
        cap.position.set(tx, -0.04, 0);
        modelGroup.add(cap);
        registerExplode(cap, 0, 0.48, 0);
      }
      add3DLabel("ไมโครปิเปต P1000 (หน้าปัดดิจิทัล 4 หลัก)", -0.98, 1.72, 0, "#00f0ff");
      add3DLabel("หลอดแก้วบอโรซิลิเกต 10⁻¹ ถึง 10⁻⁶", 0.58, 0.42, 0, "#10b981");

    } else if (id === 1) {
      const bacGroup = new THREE.Group();

      const outerRod = new THREE.Mesh(new THREE.CylinderGeometry(0.45, 0.45, 1.32, 48), M.bioCapsuleOuter);
      outerRod.rotation.z = Math.PI / 2;
      const outerCapL = new THREE.Mesh(new THREE.SphereGeometry(0.45, 36, 24), M.bioCapsuleOuter);
      outerCapL.position.x = -0.66;
      const outerCapR = outerCapL.clone();
      outerCapR.position.x = 0.66;
      bacGroup.add(outerRod, outerCapL, outerCapR);
      registerExplode(outerRod, 0, 0.68, 0);

      const innerRod = new THREE.Mesh(new THREE.CylinderGeometry(0.37, 0.37, 1.22, 48), M.bioCytoplasm);
      innerRod.rotation.z = Math.PI / 2;
      const capL = new THREE.Mesh(new THREE.SphereGeometry(0.37, 32, 24), M.bioCytoplasm);
      capL.position.x = -0.61;
      const capR = capL.clone();
      capR.position.x = 0.61;
      bacGroup.add(innerRod, capL, capR);

      const nucleoid = new THREE.Mesh(new THREE.TorusKnotGeometry(0.20, 0.042, 80, 16, 2, 3), M.cyanGlow);
      nucleoid.scale.set(2.1, 0.85, 0.85);
      bacGroup.add(nucleoid);
      registerExplode(nucleoid, 0, -0.55, 0);

      const motorPositions = [-0.98, -0.90, -0.82, -0.74];
      motorPositions.forEach((mx, mIdx) => {
        const ring = new THREE.Mesh(
          new THREE.TorusGeometry(0.19 - mIdx * 0.02, 0.038, 18, 36),
          mIdx % 2 === 0 ? M.goldPeltier : M.copperPolished
        );
        ring.rotation.y = Math.PI / 2;
        ring.position.x = mx;
        bacGroup.add(ring);
      });
      const driveShaft = new THREE.Mesh(new THREE.CylinderGeometry(0.055, 0.055, 0.45, 24), M.stainless316L);
      driveShaft.rotation.z = Math.PI / 2;
      driveShaft.position.x = -0.88;
      bacGroup.add(driveShaft);

      const flagGroup = new THREE.Group();
      for (let f = 0; f < 3; f++) {
        const phase = (f * Math.PI * 2) / 3;
        const mat = f === 0 ? M.cyanGlow : (f === 1 ? M.bioCytoplasm : M.goldPeltier);
        for (let i = 0; i < 48; i++) {
          const t = i / 48;
          const seg = new THREE.Mesh(new THREE.SphereGeometry(0.044, 14, 14), mat);
          seg.position.set(
            -1.02 - t * 1.82,
            Math.sin(t * Math.PI * 5.5 + phase) * 0.25,
            Math.cos(t * Math.PI * 5.5 + phase) * 0.25
          );
          flagGroup.add(seg);
        }
      }
      bacGroup.add(flagGroup);
      dynamicObjects.flagGroup = flagGroup;
      dynamicObjects.bacGroup = bacGroup;
      modelGroup.add(bacGroup);

      const vArrow = new THREE.ArrowHelper(new THREE.Vector3(1, 0, 0), new THREE.Vector3(1.02, 0, 0), 0.85, 0x00f0ff, 0.22, 0.14);
      bacGroup.add(vArrow);

      dynamicObjects.brownian = [];
      for (let i = 0; i < 28; i++) {
        const p = new THREE.Mesh(new THREE.SphereGeometry(0.075, 18, 18), i % 2 === 0 ? M.goldPeltier : M.magentaGlow);
        p.position.set((Math.random() - 0.5) * 3.0, (Math.random() - 0.5) * 1.9, (Math.random() - 0.5) * 2.2);
        modelGroup.add(p);
        dynamicObjects.brownian.push(p);
      }
      add3DLabel("มอเตอร์โปรตีน 4 วงแหวน (MS/C-Ring 110 Hz)", -1.45, 0.92, 0, "#fbbf24");
      add3DLabel("แคปซูลชีวภาพ & Nucleoid DNA ภายใน", 0.55, 0.85, 0, "#00f0ff");

    } else if (id === 2) {
      const cylGroup = buildBorosilicateTestTube(0.58, 2.32, 1.95, M.reagentBlue, cylGradTex);
      cylGroup.position.set(-0.78, -0.22, 0);
      const hexBase = new THREE.Mesh(new THREE.CylinderGeometry(0.76, 0.82, 0.14, 6), M.borosilicate);
      hexBase.position.y = -1.22;
      cylGroup.add(hexBase);
      modelGroup.add(cylGroup);

      const cellSphere = new THREE.Mesh(new THREE.SphereGeometry(0.24, 36, 36), M.bioCytoplasm);
      cellSphere.position.set(-0.78, 0.12, 0);
      modelGroup.add(cellSphere);
      dynamicObjects.stokesCell = cellSphere;

      const arrowDown = new THREE.ArrowHelper(new THREE.Vector3(0, -1, 0), new THREE.Vector3(-0.78, -0.14, 0), 0.75, 0xf43f5e, 0.2, 0.14);
      const arrowUp = new THREE.ArrowHelper(new THREE.Vector3(0, 1, 0), new THREE.Vector3(-0.78, 0.36, 0), 0.75, 0x00f0ff, 0.2, 0.14);
      modelGroup.add(arrowDown, arrowUp);

      const bscGroup = new THREE.Group();
      bscGroup.position.set(0.88, -0.35, 0);
      const rearWall = new THREE.Mesh(new THREE.BoxGeometry(1.48, 2.12, 0.14), M.stainless316L);
      rearWall.position.z = -0.52;
      const roof = new THREE.Mesh(new THREE.BoxGeometry(1.48, 0.34, 1.18), M.stainless316L);
      roof.position.y = 0.92;
      const workTray = new THREE.Mesh(new THREE.BoxGeometry(1.44, 0.16, 1.14), M.stainless316L);
      workTray.position.y = -0.98;
      const sideL = new THREE.Mesh(new THREE.BoxGeometry(0.08, 2.12, 1.14), M.stainless316L);
      sideL.position.x = -0.70;
      const sideR = sideL.clone();
      sideR.position.x = 0.70;
      const glassSash = new THREE.Mesh(new THREE.BoxGeometry(1.36, 1.18, 0.04), M.borosilicate);
      glassSash.position.set(0, 0.12, 0.56);
      registerExplode(glassSash, 0, 0, 0.65);

      const hepaFilter = new THREE.Mesh(new THREE.BoxGeometry(1.28, 0.20, 0.96), M.knurledDial);
      hepaFilter.position.y = 0.66;
      registerExplode(hepaFilter, 0, 0.55, 0);

      const bscOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.05, 0.28),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('HEPA FLOW: 0.45 m/s', 'BIOSAFETY CLASS II A2') })
      );
      bscOLED.position.set(0, 0.92, 0.60);
      bscGroup.add(rearWall, roof, workTray, sideL, sideR, glassSash, hepaFilter, bscOLED);
      modelGroup.add(bscGroup);

      dynamicObjects.streamlines = [];
      for (let i = 0; i < 6; i++) {
        const bar = new THREE.Mesh(new THREE.CylinderGeometry(0.022, 0.022, 1.25, 14), M.cyanGlow);
        bar.position.set(0.40 + i * 0.19, -0.28, 0.25);
        modelGroup.add(bar);
        dynamicObjects.streamlines.push(bar);
      }
      add3DLabel("กระบอกตวงแก้วบอโรซิลิเกต 100 mL (กฎสโตกส์)", -0.85, 1.28, 0, "#f43f5e");
      add3DLabel("ตู้ปลอดเชื้อสแตนเลส 316L & แผ่นกรอง HEPA", 0.88, 1.15, 0, "#00f0ff");

    } else if (id === 3) {
      const bowlOuter = new THREE.Mesh(new THREE.CylinderGeometry(1.58, 1.66, 0.96, 48), M.darkPVDF);
      bowlOuter.position.y = -1.02;
      const bowlInner = new THREE.Mesh(new THREE.CylinderGeometry(1.44, 1.44, 0.98, 48, 1, true), M.stainless316L);
      bowlInner.position.y = -1.00;
      const rimRing = new THREE.Mesh(new THREE.TorusGeometry(1.52, 0.08, 20, 56), M.stainless316L);
      rimRing.rotation.x = Math.PI / 2;
      rimRing.position.y = -0.54;
      const centOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.22, 0.44),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('10,000 RPM | 9,490 ×g', 'ROTOR BALANCED [6/6]') })
      );
      centOLED.position.set(0, -1.02, 1.65);
      modelGroup.add(bowlOuter, bowlInner, rimRing, centOLED);

      const rotorGroup = new THREE.Group();
      rotorGroup.position.y = -0.32;
      const hub = new THREE.Mesh(new THREE.CylinderGeometry(0.48, 0.78, 0.82, 48), M.blueAnodized);
      const knurlNut = new THREE.Mesh(new THREE.CylinderGeometry(0.24, 0.24, 0.20, 36), M.goldPeltier);
      knurlNut.position.y = 0.46;
      const centerShaft = new THREE.Mesh(new THREE.CylinderGeometry(0.10, 0.10, 0.65, 24), M.stainless316L);
      centerShaft.position.y = 0.35;
      rotorGroup.add(hub, knurlNut, centerShaft);
      registerExplode(knurlNut, 0, 0.62, 0);

      dynamicObjects.rotorTubes = [];
      for (let i = 0; i < 6; i++) {
        const ang = (i / 6) * Math.PI * 2;
        const tHolder = new THREE.Group();
        tHolder.rotation.y = ang;

        const tubeGroup = new THREE.Group();
        tubeGroup.position.set(0.84, 0.10, 0);
        tubeGroup.rotation.z = -0.52;

        const eppWall = new THREE.Mesh(new THREE.CylinderGeometry(0.13, 0.052, 0.86, 36, 1, true), M.polypropylene);
        const eppScale = new THREE.Mesh(
          new THREE.CylinderGeometry(0.132, 0.054, 0.86, 28, 1, true),
          new THREE.MeshBasicMaterial({ map: eppGradTex, transparent: true, depthWrite: false })
        );
        const snapCap = new THREE.Mesh(new THREE.CylinderGeometry(0.155, 0.155, 0.08, 32), M.blueAnodized);
        snapCap.position.y = 0.45;
        const supernatant = new THREE.Mesh(new THREE.CylinderGeometry(0.108, 0.048, 0.58, 28), i % 2 === 0 ? M.reagentBlue : M.bioCytoplasm);
        supernatant.position.y = -0.05;
        const pellet = new THREE.Mesh(new THREE.SphereGeometry(0.068, 24, 24), M.goldPeltier);
        pellet.position.y = -0.38;

        tubeGroup.add(eppWall, eppScale, snapCap, supernatant, pellet);
        tHolder.add(tubeGroup);
        rotorGroup.add(tHolder);
        dynamicObjects.rotorTubes.push(tubeGroup);
      }
      modelGroup.add(rotorGroup);
      dynamicObjects.rotorGroup = rotorGroup;
      add3DLabel("โรเตอร์อะลูมิเนียมอโนไดซ์ 30° (สมดุล 6 หลอด)", 0, 0.78, 0, "#00f0ff");
      add3DLabel("หลอด Eppendorf 1.5 mL & เม็ดตะกอน Pellet", 1.25, -0.32, 0, "#fbbf24");

    } else if (id === 4) {
      const peltierBlock = new THREE.Mesh(new THREE.BoxGeometry(2.32, 0.56, 1.58), M.goldPeltier);
      peltierBlock.position.y = -0.92;
      modelGroup.add(peltierBlock);

      for (let f = -0.95; f <= 0.95; f += 0.24) {
        const fin = new THREE.Mesh(new THREE.BoxGeometry(0.045, 0.42, 1.66), M.titaniumBrushed);
        fin.position.set(f, -1.26, 0);
        modelGroup.add(fin);
      }
      const heatPipe = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 2.45, 24), M.copperPolished);
      heatPipe.rotation.z = Math.PI / 2;
      heatPipe.position.set(0, -1.25, 0.65);
      modelGroup.add(heatPipe);

      const pcrOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.32, 0.44),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('PCR: 95°C / 55°C / 72°C', 'PELTIER RAMP: 4.5°C/s', '#fbbf24') })
      );
      pcrOLED.position.set(0, -0.92, 0.81);
      modelGroup.add(pcrOLED);

      dynamicObjects.pcrTubes = [];
      for (let r = 0; r < 3; r++) {
        for (let c = 0; c < 4; c++) {
          const pTube = new THREE.Mesh(new THREE.CylinderGeometry(0.115, 0.052, 0.82, 28), M.polypropylene);
          pTube.position.set(-0.63 + c * 0.42, -0.40, -0.36 + r * 0.36);
          const pDome = new THREE.Mesh(new THREE.SphereGeometry(0.115, 24, 16, 0, Math.PI * 2, 0, Math.PI / 2), M.reagentBlue);
          pDome.position.y = 0.41;
          pTube.add(pDome);
          modelGroup.add(pTube);
          dynamicObjects.pcrTubes.push(pTube);
        }
      }

      const dnaGroup = new THREE.Group();
      dnaGroup.position.y = 0.68;
      for (let i = 0; i < 24; i++) {
        const y = -0.72 + i * 0.062;
        const a = i * 0.50;
        const x1 = Math.cos(a) * 0.40, z1 = Math.sin(a) * 0.40;
        const x2 = Math.cos(a + Math.PI) * 0.40, z2 = Math.sin(a + Math.PI) * 0.40;

        const s1 = new THREE.Mesh(new THREE.SphereGeometry(0.064, 18, 18), M.cyanGlow);
        s1.position.set(x1, y, z1);
        const s2 = new THREE.Mesh(new THREE.SphereGeometry(0.064, 18, 18), M.magentaGlow);
        s2.position.set(x2, y, z2);

        const rung = new THREE.Mesh(new THREE.CylinderGeometry(0.022, 0.022, 0.78, 12), i % 2 === 0 ? M.bioCytoplasm : M.goldPeltier);
        rung.position.set(0, y, 0);
        rung.rotation.z = Math.PI / 2;
        rung.rotation.y = -a;
        dnaGroup.add(s1, s2, rung);
      }
      modelGroup.add(dnaGroup);
      dynamicObjects.dnaGroup = dnaGroup;
      registerExplode(dnaGroup, 0, 0.48, 0);
      add3DLabel("เกลียวคู่ DNA เพิ่มจำนวน 2ⁿ เท่า", 0, 1.58, 0, "#f43f5e");
      add3DLabel("บล็อกทองคำ Peltier & ท่อความร้อนทองแดง", 0, -0.52, 0.92, "#fbbf24");

    } else if (id === 5) {
      const chamber = new THREE.Mesh(new THREE.CylinderGeometry(1.02, 1.02, 2.12, 48, 1, true), M.borosilicate);
      chamber.position.y = -0.35;
      const flangeRing = new THREE.Mesh(new THREE.TorusGeometry(1.04, 0.075, 18, 48), M.stainless316L);
      flangeRing.rotation.x = Math.PI / 2;
      flangeRing.position.y = 0.68;
      const copperJacket = new THREE.Mesh(new THREE.CylinderGeometry(1.08, 1.08, 0.52, 48), M.copperPolished);
      copperJacket.position.y = -1.16;
      modelGroup.add(chamber, flangeRing, copperJacket);

      const lidGroup = new THREE.Group();
      lidGroup.position.y = 0.78;
      const lidDome = new THREE.Mesh(new THREE.CylinderGeometry(0.96, 1.06, 0.24, 48), M.stainless316L);
      const wheelRim = new THREE.Mesh(new THREE.TorusGeometry(0.48, 0.055, 18, 40), M.knurledDial);
      wheelRim.rotation.x = Math.PI / 2;
      wheelRim.position.y = 0.28;
      lidGroup.add(lidDome, wheelRim);
      for (let sp = 0; sp < 6; sp++) {
        const spoke = new THREE.Mesh(new THREE.CylinderGeometry(0.028, 0.028, 0.94, 14), M.stainless316L);
        spoke.rotation.z = Math.PI / 2;
        spoke.rotation.y = (sp / 6) * Math.PI;
        spoke.position.y = 0.28;
        lidGroup.add(spoke);
      }

      const gaugeBezel = new THREE.Mesh(new THREE.CylinderGeometry(0.25, 0.25, 0.12, 36), M.goldPeltier);
      gaugeBezel.rotation.x = Math.PI / 2;
      gaugeBezel.position.set(0.65, 0.30, 0.35);
      const gaugeFace = new THREE.Mesh(
        new THREE.CircleGeometry(0.22, 36),
        new THREE.MeshBasicMaterial({ map: makeGaugeFaceTex(params.psi || 15) })
      );
      gaugeFace.position.set(0.65, 0.30, 0.42);
      lidGroup.add(gaugeBezel, gaugeFace);
      modelGroup.add(lidGroup);
      registerExplode(lidGroup, 0, 0.68, 0);

      const flaskGroup = new THREE.Group();
      flaskGroup.position.y = -0.82;
      const flaskCone = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.54, 0.86, 44, 1, true), M.borosilicate);
      const flaskScale = new THREE.Mesh(
        new THREE.CylinderGeometry(0.185, 0.545, 0.86, 36, 1, true),
        new THREE.MeshBasicMaterial({ map: flaskGradTex, transparent: true, depthWrite: false })
      );
      const flaskNeck = new THREE.Mesh(new THREE.CylinderGeometry(0.18, 0.18, 0.34, 36, 1, true), M.borosilicate);
      flaskNeck.position.y = 0.58;
      const foilPlug = new THREE.Mesh(new THREE.CylinderGeometry(0.20, 0.19, 0.22, 28), M.stainless316L);
      foilPlug.position.y = 0.78;
      const agarBroth = new THREE.Mesh(new THREE.CylinderGeometry(0.32, 0.50, 0.48, 36), M.agarAmber);
      agarBroth.position.y = -0.18;
      flaskGroup.add(flaskCone, flaskScale, flaskNeck, foilPlug, agarBroth);
      modelGroup.add(flaskGroup);

      dynamicObjects.steamParticles = [];
      for (let i = 0; i < 32; i++) {
        const sp = new THREE.Mesh(new THREE.SphereGeometry(0.062, 14, 14), M.cyanGlow);
        sp.position.set((Math.random() - 0.5) * 1.3, -1.1 + Math.random() * 1.6, (Math.random() - 0.5) * 1.3);
        modelGroup.add(sp);
        dynamicObjects.steamParticles.push(sp);
      }
      add3DLabel("ฝาล็อกพวงมาลัย 6 ก้าน & เกจ 15 psi / 121°C", 0, 1.48, 0, "#fbbf24");
      add3DLabel("ขวดแก้วชมพู่ 500 mL ในไอน้ำอิ่มตัว", 0, -0.15, 1.05, "#00f0ff");

    } else if (id === 6) {
      const wallBase = new THREE.Mesh(new THREE.BoxGeometry(2.75, 0.42, 1.65), M.bioVioletWall);
      wallBase.position.y = -0.92;
      modelGroup.add(wallBase);

      for (let z = -0.55; z <= 0.55; z += 0.55) {
        const strand = new THREE.Mesh(new THREE.CylinderGeometry(0.055, 0.055, 2.55, 24), M.goldPeltier);
        strand.rotation.z = Math.PI / 2;
        strand.position.set(0, -0.62, z);
        modelGroup.add(strand);
      }
      for (let x = -1.05; x <= 1.05; x += 0.42) {
        for (let z = -0.55; z <= 0.55; z += 0.55) {
          const neg = new THREE.Mesh(new THREE.SphereGeometry(0.105, 24, 24), M.magentaGlow);
          neg.position.set(x, -0.52, z);
          modelGroup.add(neg);
        }
      }

      dynamicObjects.dyeIons = [];
      for (let i = 0; i < 18; i++) {
        const ion = new THREE.Mesh(new THREE.SphereGeometry(0.13, 28, 28), M.cyanGlow);
        ion.position.set(-1.05 + (i % 6) * 0.42, 0.22 + Math.floor(i / 6) * 0.34, -0.45 + (i % 3) * 0.45);
        modelGroup.add(ion);
        dynamicObjects.dyeIons.push(ion);
      }
      add3DLabel("ไอออนสีย้อม Crystal Violet ประจุบวก (CV⁺)", 0, 0.98, 0, "#00f0ff");
      add3DLabel("โครงข่าย Peptidoglycan & หมู่ฟอสเฟต (-PO₄³⁻)", 0, -0.42, 0.88, "#f43f5e");

    } else if (id === 7) {
      const tank = new THREE.Mesh(new THREE.BoxGeometry(2.95, 0.54, 1.78), M.borosilicate);
      tank.position.y = -1.0;
      modelGroup.add(tank);

      const gelSlab = new THREE.Mesh(new THREE.BoxGeometry(2.24, 0.20, 1.48), M.agaroseGel);
      gelSlab.position.y = -0.82;
      modelGroup.add(gelSlab);
      registerExplode(gelSlab, 0, 0.48, 0);

      const cathode = new THREE.Mesh(new THREE.CylinderGeometry(0.068, 0.068, 1.58, 24), M.knurledDial);
      cathode.rotation.x = Math.PI / 2;
      cathode.position.set(-1.28, -0.74, 0);
      const anode = new THREE.Mesh(new THREE.CylinderGeometry(0.068, 0.068, 1.58, 24), M.magentaGlow);
      anode.rotation.x = Math.PI / 2;
      anode.position.set(1.28, -0.74, 0);
      modelGroup.add(cathode, anode);

      const psuBox = new THREE.Mesh(new THREE.BoxGeometry(1.28, 0.62, 0.68), M.darkPVDF);
      psuBox.position.set(0, -0.22, -0.88);
      const psuOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.12, 0.46),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('100 V  |  65 mA', 'RUN TO RED (+ ANODE)', '#f43f5e') })
      );
      psuOLED.position.set(0, -0.22, -0.53);
      modelGroup.add(psuBox, psuOLED);

      dynamicObjects.dnaBands = [];
      for (let lane = 0; lane < 3; lane++) {
        for (let b = 0; b < 4; b++) {
          const band = new THREE.Mesh(new THREE.BoxGeometry(0.098, 0.068, 0.36), b === 3 ? M.goldPeltier : M.cyanGlow);
          band.position.set(-0.92 + b * 0.36, -0.69, -0.48 + lane * 0.48);
          modelGroup.add(band);
          dynamicObjects.dnaBands.push({ mesh: band, sizeIdx: b });
        }
      }
      add3DLabel("ขั้วลบ Cathode (-) จุดหยอด DNA", -1.18, -0.12, 0, "#38bdf8");
      add3DLabel("ขั้วบวก Anode (+) Run to Red & แหล่งจ่ายไฟ", 1.18, -0.12, 0, "#f43f5e");

    } else if (id === 8) {
      const stageBase = new THREE.Mesh(new THREE.BoxGeometry(2.65, 0.18, 1.42), M.stainless316L);
      stageBase.position.y = -1.42;
      const prism = new THREE.Mesh(new THREE.BoxGeometry(2.45, 1.12, 1.25), M.flintGlass);
      prism.position.y = -0.82;
      const wortLayer = new THREE.Mesh(new THREE.BoxGeometry(2.42, 0.14, 1.22), M.agarAmber);
      wortLayer.position.y = -0.20;
      const brixOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.25, 0.46),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('REFRACTOMETER: 18.0 °Brix', 'n₂ = 1.3600 | EtOH ~6.2%', '#10b981') })
      );
      brixOLED.position.set(0, -0.82, 0.64);
      modelGroup.add(stageBase, prism, wortLayer, brixOLED);

      const normalLine = new THREE.Mesh(new THREE.CylinderGeometry(0.016, 0.016, 2.25, 14), M.stainless316L);
      normalLine.position.y = -0.15;
      modelGroup.add(normalLine);

      const incidentRay = new THREE.Mesh(new THREE.CylinderGeometry(0.042, 0.042, 1.65, 24), M.magentaGlow);
      incidentRay.position.set(-0.62, 0.38, 0);
      incidentRay.rotation.z = 0.65;
      const refractedRay = new THREE.Mesh(new THREE.CylinderGeometry(0.042, 0.042, 1.45, 24), M.bioCytoplasm);
      refractedRay.position.set(0.45, -0.82, 0);
      refractedRay.rotation.z = 0.42;
      modelGroup.add(incidentRay, refractedRay);
      dynamicObjects.incidentRay = incidentRay;
      dynamicObjects.refractedRay = refractedRay;

      add3DLabel("ลำแสงเลเซอร์ตกกระทบ (θ₁)", -0.85, 1.08, 0, "#f43f5e");
      add3DLabel("ปริซึมแก้วฟลินต์ & น้ำหมักยีสต์ (°Brix)", 0.75, -0.32, 0, "#10b981");

    } else if (id === 9) {
      const slide = new THREE.Mesh(new THREE.BoxGeometry(2.45, 0.11, 1.08), M.borosilicate);
      slide.position.y = -0.94;
      const frostedLabel = new THREE.Mesh(new THREE.BoxGeometry(0.48, 0.115, 1.06), M.frostedQuartz);
      frostedLabel.position.set(-0.95, -0.94, 0);
      const coverslip = new THREE.Mesh(new THREE.BoxGeometry(0.78, 0.025, 0.78), M.borosilicate);
      coverslip.position.y = -0.86;
      modelGroup.add(slide, frostedLabel, coverslip);

      const oilDrop = new THREE.Mesh(new THREE.SphereGeometry(0.35, 36, 36), M.immersionOil);
      oilDrop.scale.set(1.15, 0.82, 1.15);
      oilDrop.position.y = -0.64;
      modelGroup.add(oilDrop);
      dynamicObjects.oilDrop = oilDrop;

      const objGroup = new THREE.Group();
      objGroup.position.y = 0.25;
      const engravedBarrel = new THREE.Mesh(
        new THREE.CylinderGeometry(0.45, 0.25, 1.34, 48),
        new THREE.MeshPhysicalMaterial({ map: objBarrelTex, metalness: 0.82, roughness: 0.15, clearcoat: 0.9 })
      );
      const knurlGrip = new THREE.Mesh(new THREE.CylinderGeometry(0.465, 0.465, 0.26, 48), M.knurledDial);
      knurlGrip.position.y = 0.42;
      const frontLens = new THREE.Mesh(new THREE.SphereGeometry(0.18, 32, 24), M.flintGlass);
      frontLens.position.y = -0.66;
      objGroup.add(engravedBarrel, knurlGrip, frontLens);
      modelGroup.add(objGroup);
      registerExplode(objGroup, 0, 0.58, 0);

      const lightCone = new THREE.Mesh(new THREE.ConeGeometry(0.70, 1.18, 40, 1, true), new THREE.MeshBasicMaterial({
        color: 0x00f0ff, transparent: true, opacity: 0.44, side: THREE.DoubleSide
      }));
      lightCone.position.y = -0.65;
      modelGroup.add(lightCone);
      dynamicObjects.lightCone = lightCone;

      add3DLabel("หัวเลนส์ Plan N 100x / 1.25 Oil (แถบขาว)", 0, 1.18, 0, "#ffffff");
      add3DLabel("หยดน้ำมันซีดาร์วูด (n=1.515) & Coverslip", 0.95, -0.55, 0, "#fbbf24");

    } else if (id === 10) {
      const hood = new THREE.Mesh(new THREE.CylinderGeometry(0.30, 0.44, 2.42, 36, 1, false, 0, Math.PI), M.stainless316L);
      hood.rotation.z = Math.PI / 2;
      hood.rotation.x = -Math.PI / 2;
      hood.position.y = 0.96;
      modelGroup.add(hood);
      registerExplode(hood, 0, 0.48, 0);

      const uvTube = new THREE.Mesh(new THREE.CylinderGeometry(0.125, 0.125, 2.22, 36), M.violetUV);
      uvTube.rotation.z = Math.PI / 2;
      uvTube.position.y = 0.85;
      const capL = new THREE.Mesh(new THREE.CylinderGeometry(0.14, 0.14, 0.20, 28), M.stainless316L);
      capL.rotation.z = Math.PI / 2;
      capL.position.set(-1.14, 0.85, 0);
      const capR = capL.clone();
      capR.position.set(1.14, 0.85, 0);
      modelGroup.add(uvTube, capL, capR);

      const uvCone = new THREE.Mesh(new THREE.ConeGeometry(1.50, 2.02, 40, 1, true), new THREE.MeshBasicMaterial({
        color: 0xa855f7, transparent: true, opacity: 0.26, side: THREE.DoubleSide
      }));
      uvCone.position.y = -0.15;
      modelGroup.add(uvCone);

      const petriBase = new THREE.Mesh(new THREE.CylinderGeometry(0.90, 0.90, 0.18, 48, 1, true), M.borosilicate);
      petriBase.position.y = -1.10;
      const agarDisk = new THREE.Mesh(new THREE.CylinderGeometry(0.87, 0.87, 0.09, 48), M.agarAmber);
      agarDisk.position.y = -1.13;
      const petriLid = new THREE.Mesh(new THREE.CylinderGeometry(0.93, 0.93, 0.14, 48, 1, true), M.borosilicate);
      petriLid.position.y = -0.96;
      modelGroup.add(petriBase, agarDisk, petriLid);
      registerExplode(petriLid, 0, 0.42, 0);

      dynamicObjects.colonies = [];
      for (let i = 0; i < 20; i++) {
        const ang = (i / 20) * Math.PI * 2;
        const r = 0.22 + (i % 3) * 0.22;
        const col = new THREE.Mesh(new THREE.SphereGeometry(0.068, 18, 18), M.bioCytoplasm);
        col.scale.set(1.2, 0.65, 1.2);
        col.position.set(Math.cos(ang) * r, -1.06, Math.sin(ang) * r);
        modelGroup.add(col);
        dynamicObjects.colonies.push(col);
      }
      add3DLabel("หลอดควอตซ์รังสี UV-C 254 nm (Thymine Dimer)", 0, 1.40, 0, "#a855f7");
      add3DLabel("จานเพาะเชื้อแก้วบอโรซิลิเกต & วุ้น Nutrient Agar", 0, -0.72, 0.98, "#10b981");

    } else if (id === 11) {
      const sourceBox = new THREE.Mesh(new THREE.BoxGeometry(0.64, 0.76, 0.76), M.darkPVDF);
      sourceBox.position.set(-1.42, -0.45, 0);
      const lampLens = new THREE.Mesh(new THREE.SphereGeometry(0.20, 28, 28), M.flintGlass);
      lampLens.position.set(-1.08, -0.45, 0);
      const prismMono = new THREE.Mesh(new THREE.CylinderGeometry(0.30, 0.30, 0.52, 3), M.flintGlass);
      prismMono.position.set(-0.78, -0.45, 0);
      modelGroup.add(sourceBox, lampLens, prismMono);

      const cuvetteGroup = new THREE.Group();
      cuvetteGroup.position.set(0, -0.42, 0);
      const cuvWall = new THREE.Mesh(new THREE.BoxGeometry(0.58, 1.42, 0.58), M.quartzGlass);
      const cuvGrad = new THREE.Mesh(
        new THREE.PlaneGeometry(0.54, 1.28),
        new THREE.MeshBasicMaterial({ map: tubeGradTex, transparent: true, depthWrite: false })
      );
      cuvGrad.position.z = 0.295;
      cuvetteGroup.add(cuvWall, cuvGrad);
      modelGroup.add(cuvetteGroup);
      registerExplode(cuvetteGroup, 0, 0.58, 0);

      const cultureLiq = new THREE.Mesh(new THREE.BoxGeometry(0.49, 1.08, 0.49), M.agarAmber.clone());
      cultureLiq.position.set(0, -0.52, 0);
      modelGroup.add(cultureLiq);
      dynamicObjects.cultureLiq = cultureLiq;

      const beamIn = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.15, 24), M.goldPeltier);
      beamIn.rotation.z = Math.PI / 2;
      beamIn.position.set(-0.62, -0.45, 0);
      const beamOut = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.15, 24), new THREE.MeshBasicMaterial({
        color: 0xf59e0b, transparent: true, opacity: 0.5
      }));
      beamOut.rotation.z = Math.PI / 2;
      beamOut.position.set(0.65, -0.45, 0);
      modelGroup.add(beamIn, beamOut);
      dynamicObjects.beamOut = beamOut;

      const detector = new THREE.Mesh(new THREE.BoxGeometry(0.54, 0.76, 0.76), M.stainless316L);
      detector.position.set(1.42, -0.45, 0);
      const odOLED = new THREE.Mesh(
        new THREE.PlaneGeometry(1.28, 0.46),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('λ = 600.0 nm | OD600 = 0.60', 'BEER-LAMBERT: %T = 25.1%', '#fbbf24') })
      );
      odOLED.position.set(0, -1.18, 0.65);
      modelGroup.add(detector, odOLED);

      add3DLabel("หลอด Quartz Cuvette 10 mm & ลำแสง 600 nm", -0.35, 0.58, 0, "#fbbf24");
      add3DLabel("หัววัดซิลิคอน Photodiode & จอ OD600", 1.25, 0.28, 0, "#00f0ff");
    }
  };

  if (typeof selectMarker === 'function') {
    selectMarker(typeof currentMarkerId === 'number' ? currentMarkerId : 0, false);
  }
})();
