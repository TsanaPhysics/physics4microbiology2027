// ============================================================================
// BLENDER Principled BSDF + Photorealistic PBR 12-Chapter Upgrade Suite
// Course: 4011111 Physics for Microbiology (ArUco IDs 0 to 11)
// Upgrades all 12 textbook models with procedural bump maps, silk-screened
// graduations, analog/digital instrument dials, and glass meniscus refraction
// ============================================================================
(function () {
  function makeKnurlBump() {
    const c = document.createElement('canvas');
    c.width = 512; c.height = 128;
    const ctx = c.getContext('2d');
    for (let x = 0; x < 512; x += 8) {
      const g = ctx.createLinearGradient(x, 0, x + 8, 0);
      g.addColorStop(0, '#101010');
      g.addColorStop(0.5, '#f0f0f0');
      g.addColorStop(1, '#101010');
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
      const v = 100 + Math.floor(Math.random() * 55);
      ctx.fillStyle = `rgb(${v},${v},${v})`;
      ctx.fillRect(0, y, 256, 1);
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
    for (let y = 60; y <= 450; y += 26) {
      ctx.beginPath();
      ctx.moveTo(225, y);
      ctx.lineTo(y % 52 === 8 ? 270 : 248, y);
      ctx.stroke();
    }
    marks.forEach((m) => {
      ctx.beginPath();
      ctx.moveTo(210, m.y);
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

  function makeGaugeFaceTex() {
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
    ctx.arc(128, 128, 96, -Math.PI * 0.65, -Math.PI * 0.25);
    ctx.strokeStyle = '#10b981';
    ctx.lineWidth = 14;
    ctx.stroke();
    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 22px JetBrains Mono, monospace';
    ctx.textAlign = 'center';
    ctx.fillText('15 psi', 128, 86);
    ctx.fillStyle = '#059669';
    ctx.font = 'bold 20px JetBrains Mono, monospace';
    ctx.fillText('121°C', 128, 178);
    ctx.strokeStyle = '#e11d48';
    ctx.lineWidth = 6;
    ctx.beginPath();
    ctx.moveTo(128, 128);
    ctx.lineTo(165, 58);
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
    g.addColorStop(0.5, '#f8fafc');
    g.addColorStop(1, '#94a3b8');
    ctx.fillStyle = g;
    ctx.fillRect(0, 0, 512, 512);
    ctx.fillStyle = '#0f172a';
    ctx.fillRect(0, 70, 512, 75);
    ctx.fillStyle = '#ffffff';
    ctx.fillRect(0, 365, 512, 34);
    ctx.fillStyle = '#f59e0b';
    ctx.fillRect(0, 315, 512, 22);
    ctx.fillStyle = '#0f172a';
    ctx.font = 'bold 34px Chakra Petch, sans-serif';
    ctx.textAlign = 'center';
    ctx.fillText('Plan N 100x / 1.25 Oil', 256, 225);
    ctx.font = 'bold 26px JetBrains Mono, monospace';
    ctx.fillText('∞ / 0.17   FN22', 256, 272);
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
    ctx.font = 'bold 42px JetBrains Mono, monospace';
    ctx.textAlign = 'center';
    ctx.fillText(line1, 256, 110);
    ctx.fillStyle = '#34d399';
    ctx.font = 'bold 34px JetBrains Mono, monospace';
    ctx.fillText(line2, 256, 185);
    return new THREE.CanvasTexture(c);
  }

  const knurlBump = makeKnurlBump();
  const brushedBump = makeBrushedMetalBump();
  const tubeGradTex = makeGraduationTex([
    { y: 120, label: '15 mL' },
    { y: 240, label: '10 mL' },
    { y: 360, label: '5 mL' }
  ]);
  const tipGradTex = makeGraduationTex([
    { y: 130, label: '1000 μL' },
    { y: 260, label: '500 μL' },
    { y: 390, label: '100 μL' }
  ]);
  const gaugeFaceTex = makeGaugeFaceTex();
  const objBarrelTex = makeObjectiveBarrelTex();

  const pbrMats = {
    borosilicate: new THREE.MeshPhysicalMaterial({
      color: 0xf0f9ff, transparent: true, opacity: 0.36,
      roughness: 0.03, metalness: 0.02, clearcoat: 1.0, clearcoatRoughness: 0.02, reflectivity: 0.98
    }),
    stainless316L: new THREE.MeshPhysicalMaterial({
      color: 0xe2e8f0, metalness: 0.94, roughness: 0.13,
      bumpMap: brushedBump, bumpScale: 0.012, clearcoat: 0.65
    }),
    darkPVDF: new THREE.MeshStandardMaterial({
      color: 0x161f2e, roughness: 0.30, metalness: 0.22
    }),
    knurledDial: new THREE.MeshStandardMaterial({
      color: 0x1e293b, roughness: 0.34, metalness: 0.28,
      bumpMap: knurlBump, bumpScale: 0.045
    })
  };

  const origBuild = window.buildModelForChapter;
  window.buildModelForChapter = function (id) {
    if (origBuild) origBuild(id);

    modelGroup.traverse((child) => {
      if (child.isMesh && child.geometry && child.geometry.type !== 'PlaneGeometry') {
        child.castShadow = true;
        child.receiveShadow = true;
      }
    });

    if (id === 0) {
      const knurlRing = new THREE.Mesh(new THREE.CylinderGeometry(0.155, 0.155, 0.18, 36), pbrMats.knurledDial);
      knurlRing.position.set(-0.95, 1.12, 0);
      modelGroup.add(knurlRing);

      const ejectorArm = new THREE.Mesh(new THREE.BoxGeometry(0.05, 1.15, 0.09), pbrMats.stainless316L);
      ejectorArm.position.set(-1.14, 0.22, 0);
      modelGroup.add(ejectorArm);

      const tipScale = new THREE.Mesh(
        new THREE.ConeGeometry(0.097, 0.85, 28, 1, true),
        new THREE.MeshBasicMaterial({ map: tipGradTex, transparent: true, depthWrite: false })
      );
      tipScale.rotation.x = Math.PI;
      tipScale.position.set(-0.95, -0.97, 0);
      modelGroup.add(tipScale);

    } else if (id === 2) {
      const stokesGrad = new THREE.Mesh(
        new THREE.CylinderGeometry(0.625, 0.625, 2.1, 36, 1, true),
        new THREE.MeshBasicMaterial({ map: tubeGradTex, transparent: true, depthWrite: false })
      );
      stokesGrad.position.set(-0.75, -0.22, 0);
      modelGroup.add(stokesGrad);

      const bscPanel = new THREE.Mesh(
        new THREE.PlaneGeometry(0.95, 0.34),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('HEPA FLOW: 0.45 m/s', 'CLASS II LAMINAR SAFE') })
      );
      bscPanel.position.set(0.85, 0.82, 0.59);
      modelGroup.add(bscPanel);

      const sash = new THREE.Mesh(new THREE.BoxGeometry(1.38, 1.15, 0.04), pbrMats.borosilicate);
      sash.position.set(0.85, -0.15, 0.56);
      modelGroup.add(sash);

    } else if (id === 3) {
      const centPanel = new THREE.Mesh(
        new THREE.PlaneGeometry(1.15, 0.42),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('10,000 RPM | 9,490 ×g', 'ROTOR BALANCED [6/6]') })
      );
      centPanel.position.set(0, -1.05, 1.62);
      modelGroup.add(centPanel);

    } else if (id === 4) {
      const pcrPanel = new THREE.Mesh(
        new THREE.PlaneGeometry(1.25, 0.45),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('PCR CYCLE: 95°/55°/72°C', 'AMPLIFICATION: 2^n DNA', '#fbbf24') })
      );
      pcrPanel.position.set(0, -0.98, 0.79);
      modelGroup.add(pcrPanel);

    } else if (id === 5) {
      const gaugeDial = new THREE.Mesh(
        new THREE.CircleGeometry(0.21, 32),
        new THREE.MeshBasicMaterial({ map: gaugeFaceTex })
      );
      gaugeDial.position.set(0.65, 1.06, 0.41);
      modelGroup.add(gaugeDial);

    } else if (id === 7) {
      const psuBox = new THREE.Mesh(new THREE.BoxGeometry(1.15, 0.55, 0.65), pbrMats.darkPVDF);
      psuBox.position.set(0, -0.25, -0.85);
      const psuScreen = new THREE.Mesh(
        new THREE.PlaneGeometry(0.98, 0.42),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('100 V  |  65 mA', 'RUN TO RED (+ ANODE)', '#f43f5e') })
      );
      psuScreen.position.set(0, -0.25, -0.51);
      modelGroup.add(psuBox, psuScreen);

    } else if (id === 8) {
      const brixScreen = new THREE.Mesh(
        new THREE.PlaneGeometry(1.15, 0.46),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('REFRACTOMETER: 18.0 °Brix', 'n₂ = 1.3600 | EtOH ~6.2%', '#10b981') })
      );
      brixScreen.position.set(0, -0.85, 0.64);
      modelGroup.add(brixScreen);

    } else if (id === 9) {
      const engravedSleeve = new THREE.Mesh(
        new THREE.CylinderGeometry(0.445, 0.245, 1.30, 48, 1, true),
        new THREE.MeshPhysicalMaterial({ map: objBarrelTex, metalness: 0.78, roughness: 0.16, clearcoat: 0.85 })
      );
      engravedSleeve.position.set(0, 0.22, 0);
      modelGroup.add(engravedSleeve);

      const coverslip = new THREE.Mesh(new THREE.BoxGeometry(0.75, 0.025, 0.75), pbrMats.borosilicate);
      coverslip.position.set(0, -0.84, 0);
      modelGroup.add(coverslip);

    } else if (id === 10) {
      const capL = new THREE.Mesh(new THREE.CylinderGeometry(0.135, 0.135, 0.18, 24), pbrMats.stainless316L);
      capL.rotation.z = Math.PI / 2;
      capL.position.set(-1.12, 0.85, 0);
      const capR = capL.clone();
      capR.position.set(1.12, 0.85, 0);
      modelGroup.add(capL, capR);

    } else if (id === 11) {
      const odScreen = new THREE.Mesh(
        new THREE.PlaneGeometry(1.22, 0.45),
        new THREE.MeshBasicMaterial({ map: makeDigitalOLEDTex('λ = 600.0 nm | OD600 = 0.60', 'BEER-LAMBERT: %T = 25.1%', '#fbbf24') })
      );
      odScreen.position.set(0, -1.15, 0.65);
      modelGroup.add(odScreen);
    }
  };

  if (typeof selectMarker === 'function') {
    selectMarker(typeof currentMarkerId === 'number' ? currentMarkerId : 0, false);
  }
})();
