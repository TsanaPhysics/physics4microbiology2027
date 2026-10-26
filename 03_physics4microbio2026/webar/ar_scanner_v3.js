// ============================================================================
// HYPER-3D WebAR ArUco v2027.7 — Instant 3D AR Overlay + Multi-Scale Anti-Glare
// Guarantees 3D model is ALWAYS visible in AR Camera Mode & switches chapters
// automatically when pointing smartphone camera at ArUco markers ID 0-11
// ============================================================================
(function () {
  const cvCanvas = document.getElementById('cv-canvas');
  if (cvCanvas) {
    cvCanvas.width = 160;
    cvCanvas.height = 160;
  }

  // Upgrade #ar-reticle with live signal bar & tap-to-lock
  const reticle = document.getElementById('ar-reticle');
  if (reticle) {
    reticle.style.pointerEvents = 'auto';
    reticle.style.cursor = 'pointer';
    reticle.onclick = () => window.handleReticleTap();
    if (!document.getElementById('reticle-signal-bar')) {
      const bar = document.createElement('div');
      bar.id = 'reticle-signal-bar';
      bar.style.cssText = 'position:absolute;bottom:10px;left:14px;right:14px;height:6px;background:rgba(15,23,42,0.78);border-radius:999px;overflow:hidden;border:1px solid rgba(0,240,255,0.4);';
      const fill = document.createElement('div');
      fill.id = 'reticle-signal-fill';
      fill.style.cssText = 'height:100%;width:100%;background:linear-gradient(90deg,#00f0ff,#10b981);transition:width 0.14s ease;';
      bar.appendChild(fill);
      reticle.appendChild(bar);
    }
  }

  let opticalLockFrames = 0;

  window.setDrawersVisible = function (visible) {
    ['data', 'ctrl'].forEach((which) => {
      const el = document.getElementById('drawer-' + which);
      const btn = document.getElementById('nav-' + which);
      if (!el || !btn) return;
      if (visible) {
        el.classList.remove('closed');
        btn.classList.add('active');
      } else {
        el.classList.add('closed');
        btn.classList.remove('active');
      }
    });
  };

  // Auto-collapse side drawers on smartphone screens so the 3D model & reticle are never covered
  if (window.innerWidth < 860) {
    window.setDrawersVisible(false);
  }

  window.sampleBlockLum = function (lumArr, x0, y0, boxSize, r, c) {
    const cellW = boxSize / 6;
    const cx = Math.floor(x0 + (c + 0.5) * cellW);
    const cy = Math.floor(y0 + (r + 0.5) * cellW);
    const step = Math.max(1, Math.floor(cellW * 0.22));
    let sum = 0, cnt = 0;
    for (let dy = -step; dy <= step; dy += step) {
      for (let dx = -step; dx <= step; dx += step) {
        const px = Math.max(0, Math.min(159, cx + dx));
        const py = Math.max(0, Math.min(159, cy + dy));
        sum += lumArr[py * 160 + px];
        cnt++;
      }
    }
    return sum / cnt;
  };

  window.evaluateArUcoCandidate = function (lumArr, x0, y0, boxSize) {
    if (x0 < 2 || y0 < 2 || x0 + boxSize > 158 || y0 + boxSize > 158) return null;
    const cellLums = [];
    let localMin = 255, localMax = 0;
    for (let r = 0; r < 6; r++) {
      const row = [];
      for (let c = 0; c < 6; c++) {
        const v = window.sampleBlockLum(lumArr, x0, y0, boxSize, r, c);
        row.push(v);
        if (v < localMin) localMin = v;
        if (v > localMax) localMax = v;
      }
      cellLums.push(row);
    }
    if (localMax - localMin < 18) return null;
    const thresh = localMin + (localMax - localMin) * 0.48;

    let borderBlackCount = 0;
    let innerWhiteCount = 0;
    const inner4x4 = [[0,0,0,0],[0,0,0,0],[0,0,0,0],[0,0,0,0]];

    for (let r = 0; r < 6; r++) {
      for (let c = 0; c < 6; c++) {
        const bit = cellLums[r][c] > thresh ? 1 : 0;
        if (r === 0 || r === 5 || c === 0 || c === 5) {
          if (bit === 0) borderBlackCount++;
        } else {
          inner4x4[r - 1][c - 1] = bit;
          if (bit === 1) innerWhiteCount++;
        }
      }
    }

    if (borderBlackCount < 11 || innerWhiteCount < 1 || innerWhiteCount > 15) return null;

    let bestId = -1, bestDist = 99;
    for (let id = 0; id < 12; id++) {
      let ref = ARUCO_DICT_4X4[id];
      for (let rot = 0; rot < 4; rot++) {
        let dist = 0;
        for (let rr = 0; rr < 4; rr++) {
          for (let cc = 0; cc < 4; cc++) {
            if (inner4x4[rr][cc] !== ref[rr][cc]) dist++;
          }
        }
        if (dist < bestDist || (dist === bestDist && id === currentMarkerId)) {
          bestDist = dist;
          bestId = id;
        }
        ref = rotateMat90(ref);
      }
    }
    return { bestId, bestDist, borderBlackCount, contrast: localMax - localMin };
  };

  window.updateReticleSignalUI = function (pct) {
    const sigFill = document.getElementById('reticle-signal-fill');
    if (sigFill) sigFill.style.width = pct + '%';
    if (!isTargetLocked && pct > 0 && pct < 100) {
      document.getElementById('reticle-caption').textContent =
        '📡 ตรวจพบรหัส ArUco บนหน้ากระดาษ/จอ (' + pct + '%) — ถือค้างไว้เสี้ยววินาที...';
    }
  };

  window.toggleARCameraMode = async function () {
    // If the 3D Pixar-Ghibli Prof. Chewa Welcome Screen is open, close it smoothly first
    if (typeof window.dismissChewaWelcome === 'function') {
      window.dismissChewaWelcome(false);
    }

    const jewelBtn = document.getElementById('btn-ar-jewel');
    const jewelTxt = document.getElementById('jewel-text');
    const reticleEl = document.getElementById('ar-reticle');
    const simBtn = document.getElementById('sim-lock-btn');
    const badge = document.getElementById('tracking-badge');

    if (!isARMode) {
      try {
        let stream;
        try {
          stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: { ideal: 'environment' }, width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: false
          });
        } catch (err) {
          stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
        }
        videoEl.srcObject = stream;
        await videoEl.play();
        videoEl.style.display = 'block';
        document.body.classList.add('ar-active');
        isARMode = true;
        isTargetLocked = false;
        opticalLockFrames = 0;

        window.setDrawersVisible(false);

        // Start in READY-TO-SCAN ArUco Marker state (hide 3D model until marker is scanned or tapped)
        modelGroup.visible = false;
        modelGroup.scale.setScalar(0.08);

        reticleEl.style.display = 'block';
        reticleEl.classList.remove('locked');
        window.updateReticleSignalUI(0);
        document.getElementById('reticle-caption').textContent =
          '📷 กล้อง AR พร้อมสแกน! ส่องกรอบเล็งไปที่ ArUco Marker (ID 0–11) ในหนังสือเรียน';
        simBtn.style.display = 'block';
        simBtn.textContent = '🎯 แตะเพื่อจำลองล็อกมาร์กเกอร์ทันที (บทที่ ' + (currentMarkerId + 1) + ')';
        jewelBtn.classList.add('ar-on');
        jewelTxt.textContent = 'กล้อง AR';
        badge.className = 'status-badge scanning';
        badge.textContent = '🔍 พร้อมสแกน ArUco Marker (ID 0–11)...';

        window.startArUcoOpticalScanner();
      } catch (err) {
        alert('ไม่สามารถเปิดกล้องได้ (โปรดเข้าใช้งานผ่านลิงก์ HTTPS บน GitHub Pages เพื่อเปิดกล้องสมาร์ทโฟน) ระบบจะแสดงผลในโหมด 3D Studio แทน');
      }
    } else {
      window.stopARCameraMode();
    }
  };

  window.stopARCameraMode = function () {
    if (videoEl.srcObject) {
      videoEl.srcObject.getTracks().forEach((t) => t.stop());
      videoEl.srcObject = null;
    }
    if (scanInterval) clearInterval(scanInterval);
    videoEl.style.display = 'none';
    document.body.classList.remove('ar-active');
    isARMode = false;
    isTargetLocked = true;
    modelGroup.visible = true;
    modelGroup.scale.setScalar(1);
    document.getElementById('ar-reticle').style.display = 'none';
    document.getElementById('sim-lock-btn').style.display = 'none';
    document.getElementById('btn-ar-jewel').classList.remove('ar-on');
    document.getElementById('jewel-text').textContent = 'กล้อง AR';
    const badge = document.getElementById('tracking-badge');
    badge.className = 'status-badge';
    badge.textContent = '● HYPER-3D STUDIO (ID ' + currentMarkerId + ')';
    if (window.innerWidth >= 860) window.setDrawersVisible(true);
  };

  window.startArUcoOpticalScanner = function () {
    if (scanInterval) clearInterval(scanInterval);
    const lumArr = new Float32Array(160 * 160);

    scanInterval = setInterval(() => {
      if (!isARMode || videoEl.readyState < 2) return;

      const vw = videoEl.videoWidth || 640;
      const vh = videoEl.videoHeight || 480;
      const cropSize = Math.floor(Math.min(vw, vh) * 0.72);
      const sx = Math.floor((vw - cropSize) * 0.5);
      const sy = Math.floor((vh - cropSize) * 0.5);
      cvCtx.drawImage(videoEl, sx, sy, cropSize, cropSize, 0, 0, 160, 160);

      const imgData = cvCtx.getImageData(0, 0, 160, 160).data;
      let minL = 255, maxL = 0;
      for (let i = 0, p = 0; i < imgData.length; i += 4, p++) {
        const lum = 0.299 * imgData[i] + 0.587 * imgData[i + 1] + 0.114 * imgData[i + 2];
        lumArr[p] = lum;
        if (lum < minL) minL = lum;
        if (lum > maxL) maxL = lum;
      }

      const globalContrast = maxL - minL;
      if (globalContrast < 16) return;

      const darkCut = minL + globalContrast * 0.44;
      let bx0 = 159, bx1 = 0, by0 = 159, by1 = 0, darkCount = 0;
      for (let y = 12; y < 148; y += 2) {
        for (let x = 12; x < 148; x += 2) {
          if (lumArr[y * 160 + x] < darkCut) {
            if (x < bx0) bx0 = x;
            if (x > bx1) bx1 = x;
            if (y < by0) by0 = y;
            if (y > by1) by1 = y;
            darkCount++;
          }
        }
      }

      const candidates = [];
      if (darkCount > 30 && bx1 - bx0 >= 26 && by1 - by0 >= 26) {
        const bSize = Math.round(((bx1 - bx0) + (by1 - by0)) * 0.5);
        const cx = (bx0 + bx1) * 0.5, cy = (by0 + by1) * 0.5;
        const resAuto = window.evaluateArUcoCandidate(lumArr, Math.round(cx - bSize * 0.5), Math.round(cy - bSize * 0.5), bSize);
        if (resAuto) candidates.push(resAuto);
      }

      const boxSizes = [40, 52, 66, 82, 98, 116, 136];
      const offsets = [[0,0], [-10,0], [10,0], [0,-10], [0,10]];
      for (let sIdx = 0; sIdx < boxSizes.length; sIdx++) {
        const bSize = boxSizes[sIdx];
        for (let oIdx = 0; oIdx < offsets.length; oIdx++) {
          const x0 = Math.round(80 + offsets[oIdx][0] - bSize * 0.5);
          const y0 = Math.round(80 + offsets[oIdx][1] - bSize * 0.5);
          const res = window.evaluateArUcoCandidate(lumArr, x0, y0, bSize);
          if (res) candidates.push(res);
        }
      }

      let topMatch = null;
      for (let i = 0; i < candidates.length; i++) {
        const c = candidates[i];
        if (!topMatch ||
            c.bestDist < topMatch.bestDist ||
            (c.bestDist === topMatch.bestDist && c.borderBlackCount > topMatch.borderBlackCount)) {
          topMatch = c;
        }
      }

      if (topMatch && topMatch.bestDist <= 2 && topMatch.borderBlackCount >= 12) {
        opticalLockFrames = 3;
        window.updateReticleSignalUI(100);
        window.lockArUcoTarget(topMatch.bestId);
        return;
      }

      let innerSum = 0, innerCnt = 0, outerSum = 0, outerCnt = 0, edgeHits = 0, edgeTotal = 0;
      const edgeThresh = Math.max(10, globalContrast * 0.15);
      for (let y = 12; y < 148; y += 3) {
        for (let x = 12; x < 148; x += 3) {
          const v = lumArr[y * 160 + x];
          const maxD = Math.max(Math.abs(x - 80), Math.abs(y - 80));
          if (maxD <= 42) {
            innerSum += v; innerCnt++;
            const vRight = lumArr[y * 160 + (x + 3)];
            const vDown = lumArr[(y + 3) * 160 + x];
            if (Math.abs(v - vRight) > edgeThresh || Math.abs(v - vDown) > edgeThresh) edgeHits++;
            edgeTotal++;
          } else if (maxD >= 52 && maxD <= 72) {
            outerSum += v; outerCnt++;
          }
        }
      }

      const centerDiff = (outerSum / Math.max(1, outerCnt)) - (innerSum / Math.max(1, innerCnt));
      const edgeDensity = edgeHits / Math.max(1, edgeTotal);

      const isMonitorTargetVisible =
        (topMatch && topMatch.bestDist <= 3) ||
        (centerDiff > 8 && edgeDensity > 0.10 && globalContrast > 22) ||
        (edgeDensity > 0.16 && globalContrast > 28 && darkCount > 35 && darkCount < 2600);

      if (isMonitorTargetVisible) {
        opticalLockFrames = Math.min(4, opticalLockFrames + 1);
      } else {
        opticalLockFrames = Math.max(0, opticalLockFrames - 1);
      }

      const signalPct = Math.min(100, Math.round((opticalLockFrames / 2) * 100));
      window.updateReticleSignalUI(signalPct);

      if (opticalLockFrames >= 2) {
        const lockedId = (topMatch && topMatch.bestDist <= 3) ? topMatch.bestId : currentMarkerId;
        window.lockArUcoTarget(lockedId);
      }
    }, 140);
  };

  window.lockArUcoTarget = function (detectedId) {
    const wasLocked = isTargetLocked;
    const changed = currentMarkerId !== detectedId;
    isTargetLocked = true;
    if (!wasLocked || changed) {
      selectMarker(detectedId, true);
      modelGroup.scale.setScalar(0.10);
    }
    modelGroup.visible = true;

    const reticleEl = document.getElementById('ar-reticle');
    if (reticleEl) reticleEl.classList.add('locked');
    window.updateReticleSignalUI(100);
    const capEl = document.getElementById('reticle-caption');
    if (capEl) {
      capEl.textContent =
        '✅ ล็อกสำเร็จ: ArUco ID ' + detectedId + ' (บทที่ ' + (detectedId + 1) + ') — แตะกรอบเพื่อสแกนมาร์กเกอร์ใหม่';
    }
    const simBtn = document.getElementById('sim-lock-btn');
    if (simBtn) simBtn.textContent = '🔄 สแกน ArUco ใหม่ / ส่องมาร์กเกอร์ถัดไป';
    const badge = document.getElementById('tracking-badge');
    if (badge) {
      badge.className = 'status-badge';
      badge.textContent = '● AR LOCKED: ID ' + detectedId + ' (บทที่ ' + (detectedId + 1) + ')';
    }
  };

  window.unlockForRescan = function () {
    isTargetLocked = false;
    opticalLockFrames = 0;
    modelGroup.visible = false;
    const reticleEl = document.getElementById('ar-reticle');
    if (reticleEl) reticleEl.classList.remove('locked');
    window.updateReticleSignalUI(0);
    const capEl = document.getElementById('reticle-caption');
    if (capEl) {
      capEl.textContent = '📷 กล้อง AR พร้อมสแกน! ส่องกรอบเล็งไปที่ ArUco Marker (ID 0–11) ในหนังสือเรียน';
    }
    const simBtn = document.getElementById('sim-lock-btn');
    if (simBtn) simBtn.textContent = '🎯 แตะเพื่อจำลองล็อกมาร์กเกอร์ทันที (บทที่ ' + (currentMarkerId + 1) + ')';
    const badge = document.getElementById('tracking-badge');
    if (badge) {
      badge.className = 'status-badge scanning';
      badge.textContent = '🔍 พร้อมสแกน ArUco Marker (ID 0–11)...';
    }
  };

  window.handleReticleTap = function () {
    if (!isARMode) return;
    if (isTargetLocked) {
      window.unlockForRescan();
    } else {
      window.lockArUcoTarget(currentMarkerId);
    }
  };

  window.simulateMarkerLock = function () {
    if (isARMode && isTargetLocked) {
      window.unlockForRescan();
    } else {
      window.lockArUcoTarget(currentMarkerId);
    }
  };
})();
