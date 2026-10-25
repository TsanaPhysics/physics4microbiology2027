/**
 * ============================================================================
 * ACTIVE EXPERIMENTAL LAB & DUAL-HAND AR MEDIAPIPE ENGINE (v2027.6)
 * Skills Applied:
 *   - nextgen-physics-virtual-lab-architect
 *   - ar-simulation-builder
 *   - interactive-3d-lab-builder
 *
 * Features:
 *   1. Real-Time 3D Digital Counter & OLED Screen Redrawing on 3D Models
 *   2. Independent 3D Equipment Grabbing & Dragging (Raycaster + PlaneIntersect)
 *   3. Real Experimental Physics Triggers (Pipetting into tubes, Cuvette insertion,
 *      UV distance inverse-square law, 100x Oil Immersion focus, Autoclave gauge)
 *   4. Dual-Hand AR MediaPipe Tracking (maxNumHands: 2, Left + Right Hands)
 *      - Right Hand Pinch: Grab & move 3D laboratory equipment
 *      - Left Hand Pinch + Elevation: Adjust digital numbers / plunger / parameters
 *      - Bimanual 2-Hand Gesture: Scale/Zoom & Peace Sign X-Ray Toggle
 *   5. Automated Dual-Hand AI Simulation Mode (works without webcam)
 *   6. Web Audio API Tactile Lab Synthesizer (ratchet clicks, aspiration, chimes)
 * ============================================================================
 */
(function () {
  console.log("[Interactive-Hand-Lab v2027.6] Initializing Real Experiment & Dual-Hand MediaPipe Engine...");

  // --------------------------------------------------------------------------
  // 1. WEB AUDIO API TACTILE LAB SYNTHESIZER
  // --------------------------------------------------------------------------
  let labAudioCtx = null;
  function ensureAudio() {
    if (!labAudioCtx) {
      const AC = window.AudioContext || window.webkitAudioContext;
      if (AC) labAudioCtx = new AC();
    }
    if (labAudioCtx && labAudioCtx.state === "suspended") {
      labAudioCtx.resume().catch(() => {});
    }
    return labAudioCtx;
  }

  function playDialClick(freq = 920) {
    const ctx = ensureAudio();
    if (!ctx) return;
    try {
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();
      osc.type = "triangle";
      osc.frequency.setValueAtTime(freq, ctx.currentTime);
      osc.frequency.exponentialRampToValueAtTime(240, ctx.currentTime + 0.028);
      gain.gain.setValueAtTime(0.08, ctx.currentTime);
      gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.028);
      osc.connect(gain);
      gain.connect(ctx.destination);
      osc.start();
      osc.stop(ctx.currentTime + 0.03);
    } catch (e) {}
  }

  function playPipetteAspirateSound(isDispense = false) {
    const ctx = ensureAudio();
    if (!ctx) return;
    try {
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();
      osc.type = "sine";
      const fStart = isDispense ? 620 : 320;
      const fEnd = isDispense ? 280 : 680;
      osc.frequency.setValueAtTime(fStart, ctx.currentTime);
      osc.frequency.exponentialRampToValueAtTime(fEnd, ctx.currentTime + 0.16);
      gain.gain.setValueAtTime(0.11, ctx.currentTime);
      gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.17);
      osc.connect(gain);
      gain.connect(ctx.destination);
      osc.start();
      osc.stop(ctx.currentTime + 0.18);
    } catch (e) {}
  }

  // --------------------------------------------------------------------------
  // 2. INJECT UI STYLES & DUAL-HAND AR MEDIAPIPE HUD OVERLAY
  // --------------------------------------------------------------------------
  const styleEl = document.createElement("style");
  styleEl.textContent = `
    #equip-action-toast {
      position: fixed;
      top: 66px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 120;
      background: rgba(4, 12, 28, 0.92);
      backdrop-filter: blur(16px);
      border: 1.5px solid #00f0ff;
      color: #f8fafc;
      padding: 7px 16px;
      border-radius: 999px;
      font-size: 0.78rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 8px 28px rgba(0, 240, 255, 0.28);
      pointer-events: auto;
      white-space: nowrap;
      max-width: 94vw;
      overflow-x: auto;
    }
    #equip-action-toast .toast-pill {
      background: rgba(16, 185, 129, 0.22);
      border: 1px solid #10b981;
      color: #34d399;
      padding: 2px 9px;
      border-radius: 999px;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.72rem;
    }
    #equip-action-toast button {
      background: rgba(56, 189, 248, 0.18);
      border: 1px solid rgba(56, 189, 248, 0.55);
      color: #e0f2fe;
      border-radius: 999px;
      padding: 3px 10px;
      font-size: 0.72rem;
      font-weight: 600;
      cursor: pointer;
      font-family: inherit;
      transition: all 0.18s;
    }
    #equip-action-toast button:hover,
    #equip-action-toast button.active {
      background: #00f0ff;
      color: #020617;
      border-color: #00f0ff;
      box-shadow: 0 0 12px rgba(0, 240, 255, 0.6);
    }

    #mp-dual-hand-box {
      position: fixed;
      bottom: 86px;
      right: 16px;
      width: 250px;
      background: rgba(4, 10, 24, 0.92);
      backdrop-filter: blur(18px);
      border: 2px solid #00f0ff;
      border-radius: 16px;
      overflow: hidden;
      z-index: 125;
      box-shadow: 0 14px 38px rgba(0, 0, 0, 0.85);
      display: none;
      flex-direction: column;
    }
    #mp-dual-hand-box.visible {
      display: flex;
    }
    .mp-header {
      padding: 6px 10px;
      background: rgba(2, 6, 23, 0.95);
      border-bottom: 1px solid rgba(0, 240, 255, 0.25);
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.72rem;
      font-weight: 700;
      color: #00f0ff;
    }
    .mp-Screen-wrap {
      position: relative;
      width: 100%;
      height: 156px;
      background: #020617;
    }
    #mp-webcam-video {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scaleX(-1);
    }
    #mp-skeleton-canvas {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }
    .mp-footer {
      padding: 6px 10px;
      font-size: 0.68rem;
      line-height: 1.45;
      color: #cbd5e1;
      background: rgba(2, 6, 23, 0.92);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .mp-hand-tag {
      display: flex;
      justify-content: space-between;
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.66rem;
      margin-top: 2px;
    }
    @media (max-width: 768px) {
      #equip-action-toast {
        top: 56px;
        padding: 5px 10px;
        font-size: 0.68rem;
        gap: 6px;
      }
      #mp-dual-hand-box {
        width: 185px;
        bottom: 82px;
        right: 10px;
      }
      .mp-Screen-wrap {
        height: 118px;
      }
    }
  `;
  document.head.appendChild(styleEl);

  // Floating Interactive Experiment Toolbar & Status Toast
  const toastEl = document.createElement("div");
  toastEl.id = "equip-action-toast";
  toastEl.innerHTML = `
    <span id="equip-status-text">🧪 <b>โหมดทดลองจริง:</b> ลากอุปกรณ์ 3D เพื่อทำการทดลอง</span>
    <span class="toast-pill" id="equip-live-readout">P1000: 1000 μL</span>
    <button id="btn-mp-camera" type="button" title="เปิดกล้องควบคุมด้วยมือทั้ง 2 ข้าง (MediaPipe Hands)">🖐️ AR มือคู่ (2 Hands)</button>
    <button id="btn-mp-autodemo" type="button" title="จำลองมือซ้าย-ขวาทำการทดลองอัตโนมัติ">🤖 สาธิต 2 มือ</button>
    <button id="btn-equip-reset" type="button" title="นำอุปกรณ์กลับตำแหน่งตั้งต้น">🔄 คืนตำแหน่ง</button>
  `;
  document.body.appendChild(toastEl);

  // Dual-Hand MediaPipe PIP Box
  const mpBox = document.createElement("div");
  mpBox.id = "mp-dual-hand-box";
  mpBox.innerHTML = `
    <div class="mp-header">
      <span>🖐️ AR MEDIAPIPE (2 HANDS)</span>
      <span id="mp-fps-badge" style="color:#34d399;">READY</span>
    </div>
    <div class="mp-Screen-wrap">
      <video id="mp-webcam-video" playsinline muted></video>
      <canvas id="mp-skeleton-canvas" width="320" height="200"></canvas>
    </div>
    <div class="mp-footer">
      <div class="mp-hand-tag">
        <span style="color:#34d399;">🤚 มือขวา (หยิบย้าย):</span>
        <span id="mp-right-state">รอตรวจจับ...</span>
      </div>
      <div class="mp-hand-tag">
        <span style="color:#00f0ff;">🖐️ มือซ้าย (ปรับค่า):</span>
        <span id="mp-left-state">รอตรวจจับ...</span>
      </div>
      <div style="margin-top:3px;color:#fef08a;font-size:0.63rem;">
        💡 จีบนิ้วขวา = หยิบอุปกรณ์ | จีบนิ้วซ้ายขึ้น-ลง = ปรับตัวเลข | ✌️ = ผ่า X-Ray
      </div>
    </div>
  `;
  document.body.appendChild(mpBox);

  // --------------------------------------------------------------------------
  // 3. LIVE 3D COUNTER, GAUGE & OLED TEXTURE SYNCHRONIZATION
  // --------------------------------------------------------------------------
  let lastDialSoundVal = null;
  let cuvetteRemoved = false;

  function sync3DModelDisplays() {
    if (!window.PBR_TEX || typeof currentMarkerId !== "number" || !window.dynamicObjects) return;
    const id = currentMarkerId;
    const T = window.PBR_TEX;

    const firstSlider = CHAPTER_MODELS[id] && CHAPTER_MODELS[id].sliders[0];
    if (firstSlider) {
      const curVal = params[firstSlider.key];
      if (lastDialSoundVal !== null && Math.abs(curVal - lastDialSoundVal) >= firstSlider.step) {
        playDialClick(700 + ((curVal - firstSlider.min) / Math.max(1, firstSlider.max - firstSlider.min)) * 500);
      }
      lastDialSoundVal = curVal;
    }

    const readoutPill = document.getElementById("equip-live-readout");

    if (id === 0) {
      const vol = Math.round(params.vol || 1000);
      if (dynamicObjects.p1000Grip && dynamicObjects.p1000Grip.material) {
        if (dynamicObjects.p1000Grip.material.map) dynamicObjects.p1000Grip.material.map.dispose();
        dynamicObjects.p1000Grip.material.map = T.makeP1000HandleTex(vol);
        dynamicObjects.p1000Grip.material.needsUpdate = true;
      }
      if (dynamicObjects.plunger) {
        dynamicObjects.plunger.position.y = 0.98 + (vol / 1000) * 0.34;
      }
      if (dynamicObjects.liqInTip) {
        const sY = Math.max(0.12, vol / 1000);
        dynamicObjects.liqInTip.scale.y = sY;
        dynamicObjects.liqInTip.position.y = -0.34 + sY * 0.26;
        if (dynamicObjects.tipMeniscus) {
          dynamicObjects.tipMeniscus.position.y = -0.34 + sY * 0.56;
        }
      }
      if (dynamicObjects.dilutionTubes && dynamicObjects.dilutionTubes.length === 6) {
        const selIdx = Math.max(0, Math.min(5, Math.round((params.dil || 1) - 1)));
        dynamicObjects.dilutionTubes.forEach((tube, idx) => {
          const liq = tube.userData.liqMesh;
          const men = tube.userData.meniscusMesh;
          if (liq && men) {
            const extra = idx === selIdx ? (vol / 1000) * 0.22 : 0;
            const newH = 0.68 + extra;
            liq.scale.y = newH / 0.76;
            liq.position.y = -0.61 + newH * 0.5;
            men.position.y = -0.61 + newH;
          }
        });
      }
      if (readoutPill) readoutPill.textContent = `P1000: ${vol} μL | 10⁻${params.dil}`;

    } else if (id === 1) {
      if (readoutPill) readoutPill.textContent = `Flagella: ${params.rpm} Hz | ${params.temp}°C`;

    } else if (id === 2) {
      const r_m = (params.radius || 2.5) * 1e-6;
      const eta = (params.visc || 1.0) * 1e-3;
      const vt = ((2 * r_m * r_m * 80 * 9.81) / (9 * eta)) * 1e6;
      if (dynamicObjects.bscOLED && dynamicObjects.bscOLED.material) {
        if (dynamicObjects.bscOLED.material.map) dynamicObjects.bscOLED.material.map.dispose();
        dynamicObjects.bscOLED.material.map = T.makeDigitalOLEDTex(
          `HEPA FLOW: ${(params.airflow || 0.45).toFixed(2)} m/s`,
          `STOKES v_t: ${vt.toFixed(1)} μm/s`,
          params.airflow <= 0.55 ? "#00f0ff" : "#f43f5e"
        );
        dynamicObjects.bscOLED.material.needsUpdate = true;
      }
      if (readoutPill) readoutPill.textContent = `HEPA: ${params.airflow} m/s | v_t: ${vt.toFixed(1)} μm/s`;

    } else if (id === 3) {
      const rcf = Math.round(1.118e-5 * (params.rcm || 8.5) * params.rpm * params.rpm);
      if (dynamicObjects.centOLED && dynamicObjects.centOLED.material) {
        if (dynamicObjects.centOLED.material.map) dynamicObjects.centOLED.material.map.dispose();
        dynamicObjects.centOLED.material.map = T.makeDigitalOLEDTex(
          `${params.rpm.toLocaleString()} RPM | ${rcf.toLocaleString()} ×g`,
          params.bal === 1 ? "ROTOR BALANCED [6/6]" : "IMBALANCE WARNING!",
          params.bal === 1 ? "#00f0ff" : "#f43f5e"
        );
        dynamicObjects.centOLED.material.needsUpdate = true;
      }
      if (dynamicObjects.rotorTubes) {
        const pScale = 0.65 + (params.rpm / 15000) * 0.75;
        dynamicObjects.rotorTubes.forEach((tg) => {
          if (tg.userData.pelletMesh) tg.userData.pelletMesh.scale.setScalar(pScale);
        });
      }
      if (readoutPill) readoutPill.textContent = `${params.rpm} RPM (${rcf.toLocaleString()} ×g)`;

    } else if (id === 4) {
      const stageTxt = params.stage === 1 ? "95°C DENATURE" : (params.stage === 2 ? "55°C ANNEAL" : "72°C EXTEND");
      const copies = Math.pow(2, params.cycles || 25);
      if (dynamicObjects.pcrOLED && dynamicObjects.pcrOLED.material) {
        if (dynamicObjects.pcrOLED.material.map) dynamicObjects.pcrOLED.material.map.dispose();
        dynamicObjects.pcrOLED.material.map = T.makeDigitalOLEDTex(
          `CYCLE ${params.cycles}: ${stageTxt}`,
          `DNA COPIES: ${copies.toExponential(2)}`,
          "#fbbf24"
        );
        dynamicObjects.pcrOLED.material.needsUpdate = true;
      }
      if (readoutPill) readoutPill.textContent = `${stageTxt} | 2^${params.cycles}`;

    } else if (id === 5) {
      const psi = params.psi || 15;
      if (dynamicObjects.gaugeFace && dynamicObjects.gaugeFace.material) {
        if (dynamicObjects.gaugeFace.material.map) dynamicObjects.gaugeFace.material.map.dispose();
        dynamicObjects.gaugeFace.material.map = T.makeGaugeFaceTex(psi);
        dynamicObjects.gaugeFace.material.needsUpdate = true;
      }
      const T_sat = 100 + psi * 1.4 * ((params.purge || 100) / 100);
      if (readoutPill) readoutPill.textContent = `${psi} psi | ${T_sat.toFixed(1)} °C`;

    } else if (id === 6) {
      const zeta = -15 - ((params.ph || 7) - 3) * 6.5;
      if (readoutPill) readoutPill.textContent = `pH ${params.ph} | Zeta: ${zeta.toFixed(1)} mV`;

    } else if (id === 7) {
      const volt = params.volt || 100;
      const mA = (volt * 0.65).toFixed(0);
      if (dynamicObjects.psuOLED && dynamicObjects.psuOLED.material) {
        if (dynamicObjects.psuOLED.material.map) dynamicObjects.psuOLED.material.map.dispose();
        dynamicObjects.psuOLED.material.map = T.makeDigitalOLEDTex(
          `${volt} V  |  ${mA} mA`,
          `TIME: ${params.runtime} min | GEL ${params.gel}%`,
          "#f43f5e"
        );
        dynamicObjects.psuOLED.material.needsUpdate = true;
      }
      if (readoutPill) readoutPill.textContent = `PSU: ${volt} V | ${params.runtime} min`;

    } else if (id === 8) {
      const n2 = 1.333 + (params.brix || 18) * 0.0015;
      const etoh = Math.max(0, (30 - (params.brix || 18)) * 0.52);
      if (dynamicObjects.brixOLED && dynamicObjects.brixOLED.material) {
        if (dynamicObjects.brixOLED.material.map) dynamicObjects.brixOLED.material.map.dispose();
        dynamicObjects.brixOLED.material.map = T.makeDigitalOLEDTex(
          `REFRACT: ${(params.brix || 18).toFixed(1)} °Brix`,
          `n₂ = ${n2.toFixed(4)} | EtOH ${etoh.toFixed(1)}%`,
          "#10b981"
        );
        dynamicObjects.brixOLED.material.needsUpdate = true;
      }
      if (readoutPill) readoutPill.textContent = `${params.brix} °Brix | n₂=${n2.toFixed(4)}`;

    } else if (id === 9) {
      if (dynamicObjects.objGroup && !isDragging3DEquip) {
        dynamicObjects.objGroup.position.y = 0.25 + (params.focus || 0) * 0.025;
      }
      const NA = (params.oil === 1 ? 1.515 : 1.0) * 0.825;
      if (readoutPill) readoutPill.textContent = `100x NA=${NA.toFixed(2)} | Focus ${params.focus}`;

    } else if (id === 10) {
      if (dynamicObjects.uvHoodGroup && !isDragging3DEquip) {
        dynamicObjects.uvHoodGroup.position.y = ((params.dist || 30) - 30) * 0.018;
      }
      if (readoutPill) readoutPill.textContent = `UV-C: ${params.power}W | r=${params.dist} cm`;

    } else if (id === 11) {
      const rawOD = cuvetteRemoved ? 0.0 : (params.od || 0.6) / (params.df || 1);
      const trans = Math.pow(10, -rawOD) * 100;
      if (dynamicObjects.odOLED && dynamicObjects.odOLED.material) {
        if (dynamicObjects.odOLED.material.map) dynamicObjects.odOLED.material.map.dispose();
        dynamicObjects.odOLED.material.map = T.makeDigitalOLEDTex(
          `λ=600nm | OD600 = ${rawOD.toFixed(2)}`,
          cuvetteRemoved ? "CUVETTE OUT: %T = 100.0%" : `BEER-LAMBERT: %T = ${trans.toFixed(1)}%`,
          cuvetteRemoved ? "#38bdf8" : "#fbbf24"
        );
        dynamicObjects.odOLED.material.needsUpdate = true;
      }
      if (readoutPill) readoutPill.textContent = `OD600: ${rawOD.toFixed(2)} (%T=${trans.toFixed(1)}%)`;
    }
  }

  const origUpdateTelemetry = window.updateTelemetryAndScene;
  if (typeof origUpdateTelemetry === "function") {
    window.updateTelemetryAndScene = function () {
      origUpdateTelemetry.apply(this, arguments);
      sync3DModelDisplays();
    };
  }

  const origSelectMarker = window.selectMarker;
  if (typeof origSelectMarker === "function") {
    window.selectMarker = function (id, fromScanner) {
      cuvetteRemoved = false;
      origSelectMarker.apply(this, arguments);
      sync3DModelDisplays();
      const statusTxt = document.getElementById("equip-status-text");
      if (statusTxt && dynamicObjects.draggableItems && dynamicObjects.draggableItems.length > 0) {
        statusTxt.innerHTML = `🧪 <b>ทดลองจริง (บทที่ ${id + 1}):</b> หยิบย้าย <span style="color:#00f0ff">${dynamicObjects.draggableItems[0].userData.equipTitle}</span> ได้เลย`;
      }
    };
  }

  // --------------------------------------------------------------------------
  // 4. INDEPENDENT 3D EQUIPMENT RAYCASTER & DRAG PLANE ENGINE
  // --------------------------------------------------------------------------
  const raycaster = new THREE.Raycaster();
  const pointerNDC = new THREE.Vector2();
  const dragPlane = new THREE.Plane(new THREE.Vector3(0, 0, 1), 0);
  const intersectPt = new THREE.Vector3();
  const dragOffset = new THREE.Vector3();
  let draggedEquip = null;
  let isDragging3DEquip = false;

  const highlightRing = new THREE.Mesh(
    new THREE.TorusGeometry(0.42, 0.022, 16, 48),
    new THREE.MeshBasicMaterial({ color: 0x00f0ff, transparent: true, opacity: 0.85 })
  );
  highlightRing.rotation.x = Math.PI / 2;
  highlightRing.visible = false;
  scene.add(highlightRing);

  const rightHandCursor = new THREE.Group();
  const rhSphere = new THREE.Mesh(
    new THREE.SphereGeometry(0.11, 24, 24),
    new THREE.MeshBasicMaterial({ color: 0x34d399, transparent: true, opacity: 0.9 })
  );
  const rhHalo = new THREE.Mesh(
    new THREE.TorusGeometry(0.19, 0.018, 12, 32),
    new THREE.MeshBasicMaterial({ color: 0x34d399 })
  );
  rightHandCursor.add(rhSphere, rhHalo);
  rightHandCursor.visible = false;
  scene.add(rightHandCursor);

  const leftHandCursor = new THREE.Group();
  const lhSphere = new THREE.Mesh(
    new THREE.SphereGeometry(0.11, 24, 24),
    new THREE.MeshBasicMaterial({ color: 0x00f0ff, transparent: true, opacity: 0.9 })
  );
  const lhHalo = new THREE.Mesh(
    new THREE.TorusGeometry(0.19, 0.018, 12, 32),
    new THREE.MeshBasicMaterial({ color: 0x00f0ff })
  );
  leftHandCursor.add(lhSphere, lhHalo);
  leftHandCursor.visible = false;
  scene.add(leftHandCursor);

  function findDraggableRoot(obj) {
    let curr = obj;
    while (curr && curr !== modelGroup && curr !== scene) {
      if (curr.userData && curr.userData.draggableGroup) return curr;
      curr = curr.parent;
    }
    return null;
  }

  function applyEquipmentPhysicsFromPosition(equip) {
    if (!equip || !equip.userData) return;
    const role = equip.userData.equipRole;
    const pos = equip.position;
    const statusTxt = document.getElementById("equip-status-text");

    if (role === "pipette" && currentMarkerId === 0) {
      let nearestIdx = -1;
      let minDist = 999;
      for (let i = 0; i < 6; i++) {
        const tx = -0.38 + i * 0.37;
        const d = Math.abs(pos.x - tx);
        if (d < minDist) {
          minDist = d;
          nearestIdx = i;
        }
      }
      if (minDist < 0.22 && nearestIdx >= 0) {
        const newDil = nearestIdx + 1;
        if (params.dil !== newDil) {
          const sEl = document.getElementById("slider-dil");
          if (sEl) sEl.value = newDil;
          updateParam("dil", newDil);
          playPipetteAspirateSound(pos.y < 0.15);
        }
        if (statusTxt) {
          statusTxt.innerHTML = `💧 <b>จ่อหลอด 10⁻${newDil}:</b> ดูด/ปล่อยสารละลาย ${params.vol} μL สำเร็จ!`;
        }
      } else if (statusTxt) {
        statusTxt.innerHTML = `🧪 <b>กำลังถือไมโครปิเปต P1000:</b> เลื่อนไปเหนือหลอดทดลอง 10⁻¹ ถึง 10⁻⁶ เพื่อดูด-ปล่อยสาร`;
      }
    } else if (role === "sash" && currentMarkerId === 2) {
      equip.position.x = 0;
      equip.position.z = 0.56;
      equip.position.y = Math.max(-0.25, Math.min(0.65, pos.y));
      const newFlow = Number((0.30 + ((equip.position.y + 0.25) / 0.9) * 0.45).toFixed(2));
      const sEl = document.getElementById("slider-airflow");
      if (sEl) sEl.value = newFlow;
      updateParam("airflow", newFlow);
      if (statusTxt) statusTxt.innerHTML = `🛡️ <b>ปรับระดับกระจกนิรภัย BSC:</b> ความเร็วลม HEPA = ${newFlow} m/s`;

    } else if (role === "stokes_cell" && currentMarkerId === 2) {
      equip.position.x = -0.78;
      equip.position.y = Math.max(-0.95, Math.min(0.75, pos.y));
      const newRad = Number((1.0 + ((equip.position.y + 0.95) / 1.7) * 4.0).toFixed(1));
      const sEl = document.getElementById("slider-radius");
      if (sEl) sEl.value = newRad;
      updateParam("radius", newRad);

    } else if (role === "autoclave_lid" && currentMarkerId === 5) {
      equip.position.x = 0;
      equip.position.y = Math.max(0.78, Math.min(1.65, pos.y));
      const isOpen = equip.position.y > 0.95;
      const newPsi = isOpen ? 5 : 15;
      const sEl = document.getElementById("slider-psi");
      if (sEl) sEl.value = newPsi;
      updateParam("psi", newPsi);
      if (statusTxt) {
        statusTxt.innerHTML = isOpen
          ? `⚠️ <b>เปิดฝาหม้อนึ่ง Autoclave:</b> คายความดันไอน้ำเหลือ ${newPsi} psi`
          : `✅ <b>ปิดล็อกฝาหม้อนึ่งสนิท:</b> ความดันไอน้ำอิ่มตัว 15 psi (121.0°C)`;
      }

    } else if (role === "dropper" && currentMarkerId === 6) {
      equip.position.y = Math.max(0.15, Math.min(1.35, pos.y));
      const newDist = Number((1.0 + ((equip.position.y - 0.15) / 1.2) * 4.0).toFixed(1));
      const sEl = document.getElementById("slider-dist");
      if (sEl) sEl.value = newDist;
      updateParam("dist", newDist);
      if (statusTxt) statusTxt.innerHTML = `🎨 <b>หยดสีย้อมแกรม:</b> ระยะห่างไฟฟ้าสถิต r = ${newDist} nm`;

    } else if (role === "laser_ray" && currentMarkerId === 8) {
      const newAng = Math.round(Math.max(15, Math.min(75, 45 - pos.x * 25)));
      const sEl = document.getElementById("slider-angle");
      if (sEl) sEl.value = newAng;
      updateParam("angle", newAng);

    } else if (role === "objective_lens" && currentMarkerId === 9) {
      equip.position.x = 0;
      equip.position.y = Math.max(-0.05, Math.min(0.65, pos.y));
      const newFocus = Math.round(((equip.position.y - 0.25) / 0.025));
      const clampedF = Math.max(-10, Math.min(10, newFocus));
      const sEl = document.getElementById("slider-focus");
      if (sEl) sEl.value = clampedF;
      updateParam("focus", clampedF);
      if (statusTxt) statusTxt.innerHTML = `🔬 <b>ปรับระยะโฟกัสหัวเลนส์ 100x:</b> Δz = ${clampedF} μm`;

    } else if (role === "oil_drop" && currentMarkerId === 9) {
      const inCenter = Math.abs(pos.x) < 0.35;
      const oilVal = inCenter ? 1 : 0;
      const sEl = document.getElementById("slider-oil");
      if (sEl) sEl.value = oilVal;
      updateParam("oil", oilVal);
      if (statusTxt) {
        statusTxt.innerHTML = inCenter
          ? `✅ <b>หยดน้ำมัน Cedarwood เชื่อมเลนส์สำเร็จ:</b> n = 1.515 (NA = 1.25 คมชัดสูงสุด)`
          : `⚠️ <b>เลื่อนหยดน้ำมันออก:</b> เกิดช่องว่างอากาศ (Air Loss, NA ลดลง)`;
      }

    } else if (role === "uv_lamp" && currentMarkerId === 10) {
      equip.position.x = 0;
      equip.position.y = Math.max(-0.25, Math.min(0.65, pos.y));
      const newDist = Math.round(Math.max(15, Math.min(60, 30 + equip.position.y * 45)));
      const sEl = document.getElementById("slider-dist");
      if (sEl) sEl.value = newDist;
      updateParam("dist", newDist);
      if (statusTxt) statusTxt.innerHTML = `🟣 <b>ปรับความสูงโคม UV-C 254 nm:</b> ระยะห่าง r = ${newDist} cm`;

    } else if (role === "cuvette" && currentMarkerId === 11) {
      equip.position.y = Math.max(-0.45, Math.min(0.85, pos.y));
      const wasRemoved = cuvetteRemoved;
      cuvetteRemoved = equip.position.y > 0.05 || Math.abs(equip.position.x) > 0.45;
      if (wasRemoved !== cuvetteRemoved) {
        playPipetteAspirateSound(!cuvetteRemoved);
      }
      sync3DModelDisplays();
      if (statusTxt) {
        statusTxt.innerHTML = cuvetteRemoved
          ? `🧪 <b>ยก Quartz Cuvette ออกจากลำแสง:</b> เครื่องอ่านค่า Blank (%T = 100.0%, OD600 = 0.00)`
          : `✅ <b>ใส่ Quartz Cuvette ในช่องวัดแสง 600 nm:</b> อ่านค่าการดูดกลืนแสง Beer-Lambert จริง`;
      }
    } else if (statusTxt) {
      statusTxt.innerHTML = `🖐️ <b>กำลังเคลื่อนย้าย:</b> <span style="color:#00f0ff">${equip.userData.equipTitle}</span> (x=${pos.x.toFixed(2)}, y=${pos.y.toFixed(2)})`;
    }
  }

  const domCanvas = renderer.domElement;

  domCanvas.addEventListener("pointerdown", (e) => {
    if (!dynamicObjects.draggableItems || dynamicObjects.draggableItems.length === 0) return;
    const rect = domCanvas.getBoundingClientRect();
    pointerNDC.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
    pointerNDC.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
    raycaster.setFromCamera(pointerNDC, camera);

    const hits = raycaster.intersectObjects(dynamicObjects.draggableItems, true);
    if (hits.length > 0) {
      const root = findDraggableRoot(hits[0].object);
      if (root) {
        draggedEquip = root;
        isDragging3DEquip = true;
        controls.enabled = false;

        const worldPos = new THREE.Vector3();
        root.getWorldPosition(worldPos);
        const camDir = new THREE.Vector3();
        camera.getWorldDirection(camDir);
        dragPlane.setFromNormalAndCoplanarPoint(camDir.negate(), worldPos);

        if (raycaster.ray.intersectPlane(dragPlane, intersectPt)) {
          modelGroup.worldToLocal(intersectPt);
          dragOffset.copy(intersectPt).sub(root.position);
        }
        highlightRing.visible = true;
        playDialClick(1080);
      }
    }
  });

  window.addEventListener("pointermove", (e) => {
    if (!isDragging3DEquip || !draggedEquip) return;
    const rect = domCanvas.getBoundingClientRect();
    pointerNDC.x = ((e.clientX - rect.left) / rect.width) * 2 - 1;
    pointerNDC.y = -((e.clientY - rect.top) / rect.height) * 2 + 1;
    raycaster.setFromCamera(pointerNDC, camera);

    if (raycaster.ray.intersectPlane(dragPlane, intersectPt)) {
      modelGroup.worldToLocal(intersectPt);
      const targetPos = intersectPt.sub(dragOffset);
      draggedEquip.position.x = Math.max(-1.65, Math.min(1.65, targetPos.x));
      draggedEquip.position.y = Math.max(-1.35, Math.min(1.65, targetPos.y));

      const worldPos = new THREE.Vector3();
      draggedEquip.getWorldPosition(worldPos);
      highlightRing.position.copy(worldPos);

      applyEquipmentPhysicsFromPosition(draggedEquip);
    }
  });

  window.addEventListener("pointerup", () => {
    if (isDragging3DEquip) {
      isDragging3DEquip = false;
      draggedEquip = null;
      highlightRing.visible = false;
      controls.enabled = true;
    }
  });

  function resetAllEquipmentPositions() {
    if (dynamicObjects.draggableItems) {
      dynamicObjects.draggableItems.forEach((item) => {
        if (item.userData.homePos) {
          item.position.copy(item.userData.homePos);
        }
      });
    }
    cuvetteRemoved = false;
    sync3DModelDisplays();
    playDialClick(880);
    const statusTxt = document.getElementById("equip-status-text");
    if (statusTxt) statusTxt.innerHTML = `✅ <b>คืนตำแหน่งอุปกรณ์ 3D ทั้งหมดกลับจุดตั้งต้นเรียบร้อย</b>`;
  }

  document.getElementById("btn-equip-reset").addEventListener("click", resetAllEquipmentPositions);

  // --------------------------------------------------------------------------
  // 5. DUAL-HAND AR MEDIAPIPE ENGINE (maxNumHands: 2) & AI BIMANUAL SIMULATOR
  // --------------------------------------------------------------------------
  let mpHands = null;
  let mpCameraActive = false;
  let mpAutoDemoActive = false;
  let mpStream = null;
  let mpFrameReq = null;
  let lastPeaceToggleTime = 0;
  let bimanualStartDist = null;
  let bimanualStartScale = 1.0;

  const mpVideoEl = document.getElementById("mp-webcam-video");
  const mpCanvasEl = document.getElementById("mp-skeleton-canvas");
  const mpCtx = mpCanvasEl.getContext("2d");

  const HAND_CONNECTIONS = [
    [0,1],[1,2],[2,3],[3,4],
    [0,5],[5,6],[6,7],[7,8],
    [5,9],[9,10],[10,11],[11,12],
    [9,13],[13,14],[14,15],[15,16],
    [13,17],[17,18],[18,19],[19,20],[0,17]
  ];

  function loadScriptOnce(src) {
    return new Promise((resolve, reject) => {
      if (document.querySelector(`script[src="${src}"]`)) return resolve();
      const s = document.createElement("script");
      s.src = src;
      s.crossOrigin = "anonymous";
      s.onload = resolve;
      s.onerror = reject;
      document.head.appendChild(s);
    });
  }

  function drawCyberHandSkeleton(landmarks, color, isPinching) {
    const w = mpCanvasEl.width;
    const h = mpCanvasEl.height;
    mpCtx.strokeStyle = color;
    mpCtx.lineWidth = 2.2;
    HAND_CONNECTIONS.forEach(([a, b]) => {
      const p1 = landmarks[a];
      const p2 = landmarks[b];
      mpCtx.beginPath();
      mpCtx.moveTo((1 - p1.x) * w, p1.y * h);
      mpCtx.lineTo((1 - p2.x) * w, p2.y * h);
      mpCtx.stroke();
    });
    landmarks.forEach((lm, idx) => {
      const x = (1 - lm.x) * w;
      const y = lm.y * h;
      mpCtx.fillStyle = (idx === 4 || idx === 8) && isPinching ? "#facc15" : color;
      mpCtx.beginPath();
      mpCtx.arc(x, y, idx === 4 || idx === 8 ? 4.5 : 2.6, 0, Math.PI * 2);
      mpCtx.fill();
    });
  }

  function isPeaceGesture(lm) {
    const indexUp = lm[8].y < lm[6].y - 0.04;
    const middleUp = lm[12].y < lm[10].y - 0.04;
    const ringFolded = lm[16].y > lm[14].y;
    const pinkyFolded = lm[20].y > lm[18].y;
    return indexUp && middleUp && ringFolded && pinkyFolded;
  }

  function processDualHands(multiLandmarks, multiHandedness) {
    mpCtx.clearRect(0, 0, mpCanvasEl.width, mpCanvasEl.height);

    let leftLM = null;
    let rightLM = null;

    for (let i = 0; i < multiLandmarks.length; i++) {
      const lm = multiLandmarks[i];
      const rawLabel = multiHandedness && multiHandedness[i] ? multiHandedness[i].label : (i === 0 ? "Right" : "Left");
      const screenX = 1 - lm[0].x;
      if (multiLandmarks.length === 2) {
        const otherScreenX = 1 - multiLandmarks[1 - i][0].x;
        if (screenX >= otherScreenX) rightLM = lm;
        else leftLM = lm;
      } else {
        if (screenX >= 0.48 || rawLabel === "Left") rightLM = lm;
        else leftLM = lm;
      }
    }

    const rStateEl = document.getElementById("mp-right-state");
    const lStateEl = document.getElementById("mp-left-state");

    let rightPinching = false;
    let leftPinching = false;

    if (rightLM) {
      const thumb = rightLM[4];
      const index = rightLM[8];
      const pinchDist = Math.hypot(thumb.x - index.x, thumb.y - index.y);
      rightPinching = pinchDist < 0.062;
      drawCyberHandSkeleton(rightLM, "#34d399", rightPinching);

      const worldX = ((1 - index.x) - 0.5) * 3.2;
      const worldY = (0.5 - index.y) * 2.5;
      rightHandCursor.visible = true;
      rightHandCursor.position.set(worldX, worldY, 0.35);
      rhSphere.material.color.setHex(rightPinching ? 0xfacc15 : 0x34d399);

      if (rightPinching) {
        if (!draggedEquip && dynamicObjects.draggableItems && dynamicObjects.draggableItems.length > 0) {
          let bestEq = dynamicObjects.draggableItems[0];
          let bestD = 999;
          dynamicObjects.draggableItems.forEach((eq) => {
            const d = Math.hypot(eq.position.x - worldX, eq.position.y - worldY);
            if (d < bestD) {
              bestD = d;
              bestEq = eq;
            }
          });
          draggedEquip = bestEq;
          isDragging3DEquip = true;
          playDialClick(1120);
        }
        if (draggedEquip) {
          draggedEquip.position.x = THREE.MathUtils.lerp(draggedEquip.position.x, Math.max(-1.5, Math.min(1.5, worldX)), 0.35);
          draggedEquip.position.y = THREE.MathUtils.lerp(draggedEquip.position.y, Math.max(-1.2, Math.min(1.4, worldY)), 0.35);
          highlightRing.visible = true;
          highlightRing.position.set(draggedEquip.position.x, draggedEquip.position.y, 0);
          applyEquipmentPhysicsFromPosition(draggedEquip);
          if (rStateEl) rStateEl.textContent = `🤏 หยิบย้ายอุปกรณ์ (${worldX.toFixed(1)}, ${worldY.toFixed(1)})`;
        }
      } else {
        if (isDragging3DEquip) {
          isDragging3DEquip = false;
          draggedEquip = null;
          highlightRing.visible = false;
        }
        if (isPeaceGesture(rightLM) && Date.now() - lastPeaceToggleTime > 1400) {
          lastPeaceToggleTime = Date.now();
          if (typeof toggleExplodedView === "function") toggleExplodedView();
          if (rStateEl) rStateEl.textContent = "✌️ สลับโหมดผ่า X-Ray!";
        } else if (rStateEl) {
          rStateEl.textContent = "🖐️ พร้อมหยิบ (จีบนิ้วเพื่อจับ)";
        }
      }
    } else {
      rightHandCursor.visible = false;
      if (rStateEl) rStateEl.textContent = "ไม่พบมือขวา";
    }

    if (leftLM) {
      const thumb = leftLM[4];
      const index = leftLM[8];
      const pinchDist = Math.hypot(thumb.x - index.x, thumb.y - index.y);
      leftPinching = pinchDist < 0.065;
      drawCyberHandSkeleton(leftLM, "#00f0ff", leftPinching);

      const worldX = ((1 - index.x) - 0.5) * 3.2;
      const worldY = (0.5 - index.y) * 2.5;
      leftHandCursor.visible = true;
      leftHandCursor.position.set(worldX, worldY, 0.35);
      lhSphere.material.color.setHex(leftPinching ? 0xfacc15 : 0x00f0ff);

      const firstSlider = CHAPTER_MODELS[currentMarkerId] && CHAPTER_MODELS[currentMarkerId].sliders[0];
      if (leftPinching && firstSlider) {
        const normY = Math.max(0, Math.min(1, 1 - index.y));
        const rawVal = firstSlider.min + normY * (firstSlider.max - firstSlider.min);
        const stepped = Number((Math.round(rawVal / firstSlider.step) * firstSlider.step).toFixed(2));
        const sEl = document.getElementById(`slider-${firstSlider.key}`);
        if (sEl) sEl.value = stepped;
        updateParam(firstSlider.key, stepped);
        if (lStateEl) lStateEl.textContent = `🤏 ตั้งค่า ${firstSlider.key.toUpperCase()} = ${stepped}`;
      } else if (lStateEl) {
        lStateEl.textContent = "🖐️ จีบนิ้วซ้ายขึ้น-ลง = ปรับค่า";
      }
    } else {
      leftHandCursor.visible = false;
      if (lStateEl) lStateEl.textContent = "ไม่พบมือซ้าย";
    }

    if (leftLM && rightLM && leftPinching && rightPinching) {
      const dist2H = Math.hypot(leftLM[8].x - rightLM[8].x, leftLM[8].y - rightLM[8].y);
      if (bimanualStartDist === null) {
        bimanualStartDist = Math.max(0.08, dist2H);
        bimanualStartScale = modelGroup.scale.x || 1.0;
      } else {
        const ratio = dist2H / bimanualStartDist;
        const newScale = Math.max(0.55, Math.min(1.75, bimanualStartScale * ratio));
        modelGroup.scale.setScalar(newScale);
      }
    } else {
      bimanualStartDist = null;
    }
  }

  async function toggleMediaPipeDualHands() {
    const btn = document.getElementById("btn-mp-camera");
    const badge = document.getElementById("mp-fps-badge");

    if (mpAutoDemoActive) {
      stopAutoDemo();
    }

    if (mpCameraActive) {
      mpCameraActive = false;
      if (mpFrameReq) cancelAnimationFrame(mpFrameReq);
      if (mpStream) {
        mpStream.getTracks().forEach((t) => t.stop());
        mpStream = null;
      }
      mpBox.classList.remove("visible");
      btn.classList.remove("active");
      rightHandCursor.visible = false;
      leftHandCursor.visible = false;
      highlightRing.visible = false;
      return;
    }

    mpBox.classList.add("visible");
    btn.classList.add("active");
    if (badge) badge.textContent = "LOADING AI...";

    try {
      await loadScriptOnce("https://cdn.jsdelivr.net/npm/@mediapipe/hands/hands.js");
      if (!mpHands) {
        mpHands = new window.Hands({
          locateFile: (file) => `https://cdn.jsdelivr.net/npm/@mediapipe/hands/${file}`
        });
        mpHands.setOptions({
          maxNumHands: 2,
          modelComplexity: 1,
          minDetectionConfidence: 0.6,
          minTrackingConfidence: 0.6
        });
        mpHands.onResults((results) => {
          if (!mpCameraActive) return;
          if (badge) badge.textContent = `LIVE (${(results.multiHandLandmarks || []).length} HANDS)`;
          processDualHands(results.multiHandLandmarks || [], results.multiHandedness || []);
        });
      }

      mpStream = await navigator.mediaDevices.getUserMedia({
        video: { facingMode: "user", width: { ideal: 640 }, height: { ideal: 480 } },
        audio: false
      });
      mpVideoEl.srcObject = mpStream;
      await mpVideoEl.play();
      mpCameraActive = true;

      async function pumpFrame() {
        if (!mpCameraActive) return;
        if (mpVideoEl.readyState >= 2) {
          await mpHands.send({ image: mpVideoEl });
        }
        mpFrameReq = requestAnimationFrame(pumpFrame);
      }
      pumpFrame();
    } catch (err) {
      console.warn("[MediaPipe Hands] Camera unavailable, switching to AI Dual-Hand Auto-Simulator:", err);
      mpCameraActive = false;
      btn.classList.remove("active");
      startAutoDemo();
    }
  }

  let demoAnimId = null;

  function makeSyntheticHandLandmarks(centerX, centerY, pinchAmount) {
    const lm = [];
    for (let i = 0; i < 21; i++) {
      lm.push({ x: centerX, y: centerY, z: 0 });
    }
    lm[0] = { x: centerX, y: centerY + 0.18, z: 0 };
    lm[1] = { x: centerX - 0.05, y: centerY + 0.12, z: 0 };
    lm[2] = { x: centerX - 0.08, y: centerY + 0.06, z: 0 };
    lm[3] = { x: centerX - 0.06, y: centerY + 0.02, z: 0 };
    lm[4] = { x: centerX - 0.03 * (1 - pinchAmount), y: centerY + 0.01 * (1 - pinchAmount), z: 0 };
    lm[5] = { x: centerX - 0.03, y: centerY + 0.05, z: 0 };
    lm[6] = { x: centerX - 0.03, y: centerY - 0.02, z: 0 };
    lm[7] = { x: centerX - 0.02, y: centerY - 0.06, z: 0 };
    lm[8] = { x: centerX + 0.01 * (1 - pinchAmount), y: centerY - 0.01 * (1 - pinchAmount), z: 0 };
    [9, 13, 17].forEach((base, idx) => {
      const ox = (idx - 0.5) * 0.045;
      lm[base]     = { x: centerX + ox, y: centerY + 0.06, z: 0 };
      lm[base + 1] = { x: centerX + ox, y: centerY - 0.01, z: 0 };
      lm[base + 2] = { x: centerX + ox, y: centerY - 0.06, z: 0 };
      lm[base + 3] = { x: centerX + ox, y: centerY - 0.10, z: 0 };
    });
    return lm;
  }

  function startAutoDemo() {
    const demoBtn = document.getElementById("btn-mp-autodemo");
    const badge = document.getElementById("mp-fps-badge");
    mpAutoDemoActive = true;
    mpBox.classList.add("visible");
    demoBtn.classList.add("active");
    if (badge) badge.textContent = "AI 2-HAND SIM";

    const t0 = performance.now();
    function stepDemo(now) {
      if (!mpAutoDemoActive) return;
      const elapsed = (now - t0) * 0.001;
      const leftCenterX = 0.74 + Math.sin(elapsed * 0.8) * 0.05;
      const leftCenterY = 0.50 + Math.sin(elapsed * 1.3) * 0.28;
      const leftHandLM = makeSyntheticHandLandmarks(leftCenterX, leftCenterY, 0.92);

      const rightCenterX = 0.32 + Math.cos(elapsed * 1.1) * 0.18;
      const rightCenterY = 0.48 + Math.sin(elapsed * 1.6) * 0.16;
      const rightHandLM = makeSyntheticHandLandmarks(rightCenterX, rightCenterY, 0.92);

      processDualHands(
        [leftHandLM, rightHandLM],
        [{ label: "Right" }, { label: "Left" }]
      );

      demoAnimId = requestAnimationFrame(stepDemo);
    }
    demoAnimId = requestAnimationFrame(stepDemo);
  }

  function stopAutoDemo() {
    mpAutoDemoActive = false;
    if (demoAnimId) cancelAnimationFrame(demoAnimId);
    const demoBtn = document.getElementById("btn-mp-autodemo");
    if (demoBtn) demoBtn.classList.remove("active");
    mpBox.classList.remove("visible");
    rightHandCursor.visible = false;
    leftHandCursor.visible = false;
    highlightRing.visible = false;
    isDragging3DEquip = false;
    draggedEquip = null;
  }

  document.getElementById("btn-mp-camera").addEventListener("click", toggleMediaPipeDualHands);
  document.getElementById("btn-mp-autodemo").addEventListener("click", () => {
    if (mpAutoDemoActive) stopAutoDemo();
    else {
      if (mpCameraActive) toggleMediaPipeDualHands();
      startAutoDemo();
    }
  });

  setTimeout(sync3DModelDisplays, 250);
})();
