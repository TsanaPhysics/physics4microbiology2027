/**
 * ============================================================================
 * 3D PIXAR × STUDIO GHIBLI COURSE INTRODUCTION ANIMATION
 * Instructor: Asst. Prof. Dr. Chewa Thassana (ผศ.ดร.ชีวะ ทัศนา)
 * Course: 4011111 Physics for Microbiology (ฟิสิกส์สำหรับจุลชีววิทยา)
 *
 * Features:
 *   1. Smartphone-first 3D Pixar × Studio Ghibli animated welcome screen
 *   2. 60FPS Canvas animation of Ghibli sunlit bokeh spores, floating DNA
 *      sparkles, and miniature rotating ArUco fiducial markers
 *   3. Animated 3D Pixar-Ghibli portrait of Asst. Prof. Dr. Chewa Thassana
 *      with breathing/floating motion, interactive holographic ArUco HUD,
 *      talking soundwave aura, and multi-slide course introduction dialogue
 *   4. Web Audio Ghibli-style warm harp chime + Thai SpeechSynthesis voice
 *   5. One-tap "📷 กล้อง AR" button that closes the intro and immediately
 *      opens the smartphone rear camera ready to scan ArUco markers (ID 0–11)
 * ============================================================================
 */
(function () {
  const INTRO_SLIDES = [
    {
      tab: "👋 แนะนำรายวิชา",
      badge: "WELCOME • 4011111 PHYSICS FOR MICROBIOLOGY",
      title: "สวัสดีครับ! ยินดีต้อนรับสู่ฟิสิกส์สำหรับจุลชีววิทยา ✨",
      text: "พี่ๆ และน้องๆ นักศึกษาทุกคนครับ อาจารย์ชีวะ (ผศ.ดร.ชีวะ ทัศนา) ขอต้อนรับเข้าสู่รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) รายวิชานี้ออกแบบด้วยแนวคิด Low-Math, High-Intuition เรียนฟิสิกส์ให้เข้าใจง่ายผ่านเครื่องมือห้องแล็บจุลชีววิทยาจริงครับ",
      voice: "สวัสดีครับนักศึกษาทุกคน อาจารย์ชีวะ ทัศนา ขอต้อนรับเข้าสู่รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา ครับ รายวิชานี้ออกแบบด้วยแนวคิด โลว์แมท ไฮอินทูอิชัน เรียนฟิสิกส์ให้เข้าใจง่ายผ่านเครื่องมือห้องแล็บจุลชีววิทยาจริงทั้งสิบสองบทครับ"
    },
    {
      tab: "🔬 12 บท & แล็บ",
      badge: "12 OBE CHAPTERS • 13 HANDS-ON LABS",
      title: "เชื่อมโยงฟิสิกส์เข้ากับเครื่องมือจุลชีววิทยาครบ 12 บท 🧬",
      text: "เราจะเรียนรู้ตั้งแต่ไมโครปิเปต P1000, การว่ายของแฟลกเจลลา, กฎสโตกส์ในตู้ปลอดเชื้อ, เครื่องปั่นเหวี่ยง RCF (×g), หม้อนึ่ง Autoclave 121°C, เจลอิเล็กโทรโฟรีซิส, กล้องจุลทรรศน์หัวเลนส์น้ำมัน 100x ไปจนถึงการวัดความขุ่นเชื้อ OD600 ครับ",
      voice: "เราจะเรียนรู้ฟิสิกส์ผ่านเครื่องมือจริงครบสิบสองบท ตั้งแต่ไมโครปิเปต พีหนึ่งพัน การว่ายของแฟลกเจลลา เครื่องปั่นเหวี่ยงอาร์ซีเอฟ หม้อนึ่งความดันไอออโตเคลฟ เจลอิเล็กโทรโฟรีซิส กล้องจุลทรรศน์หัวเลนส์น้ำมันร้อยเท่า ไปจนถึงการวัดความขุ่นโอดีหกร้อยครับ"
    },
    {
      tab: "📐 สูตรลัดเข้าใจง่าย",
      badge: "LOW-MATH GUIDE • NO CALCULUS REQUIRED",
      title: "เทคนิคบันได 1,000 เท่า & สามเหลี่ยมสูตรไร้แคลคูลัส 📐",
      text: "ไม่ต้องกังวลเรื่องคณิตศาสตร์ซับซ้อน! เราใช้เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละ 1,000 เท่าสำหรับแปลงหน่วยไมโครลิตร และการปิดตัวแปรในผังสามเหลี่ยมสูตรคำนวณ ช่วยให้คำนวณผลแล็บจุลชีววิทยาได้รวดเร็วและแม่นยำครับ",
      voice: "ไม่ต้องกังวลเรื่องคณิตศาสตร์ซับซ้อนครับ เราใช้เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละหนึ่งพันเท่า และผังสามเหลี่ยมสูตรคำนวณไร้แคลคูลัส ช่วยให้คำนวณผลปฏิบัติการจุลชีววิทยาได้รวดเร็วและแม่นยำครับ"
    },
    {
      tab: "📷 วิธีส่องกล้อง AR",
      badge: "3D WebAR • ARUCO MARKER DICT_4X4_50 (ID 0–11)",
      title: "กดปุ่ม 'กล้อง AR' เพื่อสแกน ArUco Marker ได้เลย! 📷",
      text: "เมื่อกดปุ่ม '📷 กล้อง AR' ด้านล่าง ระบบจะเปิดกล้องสมาร์ทโฟนพร้อมกรอบเล็งเลเซอร์ทันที เพียงนำไปส่องที่มาร์กเกอร์ ArUco (ID 0–11) ในเอกสารคำสอน โมเดล 3 มิติจะลอยขึ้นมาให้หมุนสำรวจและปรับค่าตัวแปรได้แบบเรียลไทม์ครับ!",
      voice: "พร้อมแล้วกดที่ปุ่ม กล้องเออาร์ ด้านล่างได้เลยครับ ระบบจะเปิดกล้องสมาร์ทโฟนทันที เพียงนำไปส่องที่มาร์กเกอร์อารูโค ไอดีศูนย์ถึงสิบเอ็ด ในเอกสารคำสอน โมเดลสามมิติจะลอยขึ้นมาให้หมุนสำรวจและทดลองปรับค่าได้จริงครับ"
    }
  ];

  let currentSlideIdx = 0;
  let typewriterTimer = null;
  let autoCycleTimer = null;
  let isWelcomeVisible = true;
  let isSpeakingIntro = false;

  // --------------------------------------------------------------------------
  // 1. GHIBLI × SCI-FI CHIME SYNTHESIZER (Web Audio API)
  // --------------------------------------------------------------------------
  function playGhibliWelcomeChime(type = "sparkle") {
    try {
      const AC = window.AudioContext || window.webkitAudioContext;
      if (!AC) return;
      const ctx = window._chewaAudioCtx || (window._chewaAudioCtx = new AC());
      if (ctx.state === "suspended") ctx.resume().catch(() => {});

      const notes =
        type === "ar_launch"
          ? [523.25, 659.25, 783.99, 1046.5, 1318.5] // C5 E5 G5 C6 E6 uplifting launch
          : [440, 554.37, 659.25, 880]; // Warm A-major Ghibli chord arpeggio

      notes.forEach((freq, idx) => {
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.type = "sine";
        const t0 = ctx.currentTime + idx * 0.065;
        osc.frequency.setValueAtTime(freq, t0);
        gain.gain.setValueAtTime(0.001, t0);
        gain.gain.linearRampToValueAtTime(0.085, t0 + 0.02);
        gain.gain.exponentialRampToValueAtTime(0.0008, t0 + 0.55);
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.start(t0);
        osc.stop(t0 + 0.58);
      });
    } catch (e) {}
  }

  // --------------------------------------------------------------------------
  // 2. INJECT CSS STYLES FOR 3D PIXAR × GHIBLI WELCOME SCREEN
  // --------------------------------------------------------------------------
  const style = document.createElement("style");
  style.textContent = `
    #chewa-welcome-overlay {
      position: fixed;
      inset: 0;
      z-index: 180;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      overflow-y: auto;
      overflow-x: hidden;
      padding: 14px 14px 96px;
      background:
        radial-gradient(circle at 50% 18%, rgba(251, 191, 36, 0.22) 0%, rgba(16, 185, 129, 0.18) 34%, rgba(6, 24, 44, 0.96) 72%, #020617 100%);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      transition: opacity 0.42s cubic-bezier(0.22, 1, 0.36, 1), transform 0.42s cubic-bezier(0.22, 1, 0.36, 1);
    }
    #chewa-welcome-overlay.hidden-intro {
      opacity: 0;
      transform: scale(1.04) translateY(12px);
      pointer-events: none;
    }

    #ghibli-particles-canvas {
      position: fixed;
      inset: 0;
      width: 100vw;
      height: 100vh;
      pointer-events: none;
      z-index: 1;
    }

    .chewa-stage-card {
      position: relative;
      z-index: 5;
      width: 100%;
      max-width: 540px;
      margin: auto;
      background: linear-gradient(160deg, rgba(15, 29, 48, 0.88) 0%, rgba(7, 16, 32, 0.95) 100%);
      border: 1.5px solid rgba(56, 189, 248, 0.42);
      border-radius: 26px;
      padding: 14px 16px 18px;
      box-shadow:
        0 24px 60px rgba(0, 0, 0, 0.75),
        0 0 40px rgba(16, 185, 129, 0.2),
        inset 0 1px 1px rgba(255, 255, 255, 0.25);
      overflow: hidden;
    }

    /* Warm Studio Ghibli Sunbeam Header Pill */
    .chewa-top-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      margin-bottom: 10px;
      flex-wrap: wrap;
    }
    .pixar-ghibli-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 11px;
      border-radius: 999px;
      font-family: 'Prompt', sans-serif;
      font-size: 0.7rem;
      font-weight: 700;
      background: linear-gradient(135deg, rgba(251, 191, 36, 0.22), rgba(16, 185, 129, 0.25));
      color: #fde68a;
      border: 1px solid rgba(251, 191, 36, 0.55);
      box-shadow: 0 0 16px rgba(251, 191, 36, 0.25);
    }
    .pixar-ghibli-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #fbbf24;
      box-shadow: 0 0 8px #fbbf24;
      animation: pulseGhibliDot 1.6s infinite ease-in-out;
    }
    @keyframes pulseGhibliDot {
      0%, 100% { transform: scale(1); opacity: 0.85; }
      50% { transform: scale(1.35); opacity: 1; }
    }

    .btn-voice-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 5px 12px;
      border-radius: 999px;
      font-family: 'Prompt', sans-serif;
      font-size: 0.72rem;
      font-weight: 700;
      background: linear-gradient(135deg, #f59e0b, #10b981);
      color: #022c22;
      border: 1px solid #fef08a;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);
      transition: transform 0.18s ease, box-shadow 0.18s ease;
    }
    .btn-voice-pill:hover, .btn-voice-pill.speaking {
      transform: translateY(-1px) scale(1.03);
      box-shadow: 0 0 20px rgba(52, 211, 153, 0.75);
    }

    /* 3D Character Viewport Frame */
    .chewa-hero-viewport {
      position: relative;
      width: 100%;
      aspect-ratio: 16 / 10;
      border-radius: 20px;
      overflow: hidden;
      border: 2px solid rgba(251, 191, 36, 0.48);
      box-shadow:
        0 12px 32px rgba(0, 0, 0, 0.6),
        0 0 28px rgba(56, 189, 248, 0.25);
      background: #0f172a;
      margin-bottom: 12px;
    }

    /* Animated 3D Pixar-Ghibli Character Image */
    .chewa-char-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center 22%;
      transform-origin: center bottom;
      animation: chewaBreatheFloat 5.2s infinite ease-in-out;
      filter: contrast(1.03) saturate(1.08);
    }
    .chewa-hero-viewport.speaking .chewa-char-img {
      animation: chewaTalkingBounce 0.65s infinite ease-in-out;
    }
    @keyframes chewaBreatheFloat {
      0%, 100% { transform: scale(1.01) translateY(0px) rotate(0deg); }
      50% { transform: scale(1.045) translateY(-5px) rotate(0.35deg); }
    }
    @keyframes chewaTalkingBounce {
      0%, 100% { transform: scale(1.03) translateY(0px); }
      50% { transform: scale(1.055) translateY(-4px); }
    }

    /* Sunbeam & Magical Bokeh Overlay inside Character Viewport */
    .ghibli-sunbeam-layer {
      position: absolute;
      inset: 0;
      pointer-events: none;
      background:
        radial-gradient(circle at 22% 18%, rgba(254, 240, 138, 0.28) 0%, transparent 45%),
        radial-gradient(circle at 75% 48%, rgba(56, 189, 248, 0.22) 0%, transparent 40%),
        linear-gradient(to top, rgba(2, 6, 23, 0.82) 0%, rgba(2, 6, 23, 0.15) 36%, transparent 65%);
    }

    /* Floating Holographic ArUco Marker over Prof. Chewa's Hand */
    .floating-aruco-holo {
      position: absolute;
      top: 12px;
      left: 12px;
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 5px 10px;
      border-radius: 12px;
      background: rgba(3, 10, 26, 0.82);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(0, 240, 255, 0.55);
      box-shadow: 0 0 18px rgba(0, 240, 255, 0.35);
      animation: holoFloatBadge 3.2s infinite ease-in-out;
      cursor: pointer;
    }
    @keyframes holoFloatBadge {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-5px); }
    }
    .holo-aruco-grid {
      width: 26px;
      height: 26px;
      background: #fff;
      padding: 2px;
      border-radius: 4px;
      display: grid;
      grid-template-columns: repeat(6, 1fr);
      grid-template-rows: repeat(6, 1fr);
      border: 1px solid #00f0ff;
    }
    .holo-aruco-txt {
      font-family: 'Prompt', sans-serif;
      font-size: 0.65rem;
      line-height: 1.2;
      color: #e0f2fe;
      font-weight: 600;
    }
    .holo-aruco-txt strong {
      color: #00f0ff;
      display: block;
      font-size: 0.68rem;
    }

    /* Instructor Nameplate & Live Voice Wave Bar at Bottom of Portrait */
    .chewa-nameplate {
      position: absolute;
      bottom: 8px;
      left: 10px;
      right: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 14px;
      background: rgba(4, 12, 28, 0.86);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(251, 191, 36, 0.45);
    }
    .chewa-prof-name {
      font-family: 'Prompt', sans-serif;
      font-size: 0.82rem;
      font-weight: 700;
      color: #fef08a;
      line-height: 1.2;
    }
    .chewa-prof-affil {
      font-size: 0.66rem;
      color: #cbd5e1;
    }
    .chewa-talk-wave {
      display: inline-flex;
      align-items: center;
      gap: 3px;
      height: 18px;
      padding: 0 6px;
    }
    .chewa-talk-wave span {
      width: 3px;
      height: 5px;
      border-radius: 99px;
      background: #34d399;
      animation: idleWave 1.4s infinite ease-in-out;
    }
    .chewa-talk-wave.active span {
      background: #00f0ff;
      box-shadow: 0 0 6px #00f0ff;
      animation: activeTalkWave 0.38s infinite ease-in-out;
    }
    .chewa-talk-wave span:nth-child(2) { animation-delay: 0.1s; }
    .chewa-talk-wave span:nth-child(3) { animation-delay: 0.2s; }
    .chewa-talk-wave span:nth-child(4) { animation-delay: 0.15s; }
    .chewa-talk-wave span:nth-child(5) { animation-delay: 0.05s; }
    @keyframes idleWave {
      0%, 100% { height: 4px; opacity: 0.6; }
      50% { height: 10px; opacity: 1; }
    }
    @keyframes activeTalkWave {
      0%, 100% { height: 4px; }
      50% { height: 18px; }
    }

    /* Interactive Slide Tabs */
    .intro-tabs-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 5px;
      margin-bottom: 9px;
    }
    .intro-tab-btn {
      padding: 6px 4px;
      border-radius: 10px;
      font-family: 'Prompt', sans-serif;
      font-size: 0.66rem;
      font-weight: 600;
      background: rgba(15, 23, 42, 0.85);
      color: #94a3b8;
      border: 1px solid rgba(148, 163, 184, 0.25);
      cursor: pointer;
      transition: all 0.2s ease;
      text-align: center;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .intro-tab-btn.active {
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.28), rgba(0, 240, 255, 0.28));
      color: #ffffff;
      border-color: #00f0ff;
      box-shadow: 0 0 12px rgba(0, 240, 255, 0.35);
    }

    /* Animated Speech Bubble Card */
    .chewa-speech-bubble {
      position: relative;
      background: rgba(9, 20, 38, 0.92);
      border: 1.5px solid rgba(52, 211, 153, 0.45);
      border-radius: 18px;
      padding: 11px 14px;
      margin-bottom: 13px;
      min-height: 102px;
      box-shadow: inset 0 0 24px rgba(16, 185, 129, 0.08);
    }
    .speech-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.62rem;
      font-weight: 700;
      color: #34d399;
      letter-spacing: 0.3px;
      margin-bottom: 3px;
    }
    .speech-title {
      font-family: 'Prompt', sans-serif;
      font-size: 0.88rem;
      font-weight: 700;
      color: #fef08a;
      margin-bottom: 4px;
      line-height: 1.3;
    }
    .speech-body {
      font-family: 'Sarabun', 'Prompt', sans-serif;
      font-size: 0.8rem;
      color: #e2e8f0;
      line-height: 1.5;
    }

    /* Primary CTA: Open AR Camera Ready to Scan ArUco Marker */
    .chewa-cta-stack {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .btn-open-ar-camera {
      width: 100%;
      padding: 13px 16px;
      border-radius: 16px;
      border: 2px solid #a7f3d0;
      background: linear-gradient(135deg, #10b981 0%, #059669 45%, #0284c7 100%);
      color: #ffffff;
      font-family: 'Prompt', sans-serif;
      font-size: 0.94rem;
      font-weight: 700;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      box-shadow:
        0 10px 28px rgba(16, 185, 129, 0.55),
        0 0 24px rgba(0, 240, 255, 0.45),
        inset 0 2px 4px rgba(255, 255, 255, 0.4);
      animation: ctaPulseGlow 2.2s infinite ease-in-out;
      transition: transform 0.18s ease;
    }
    .btn-open-ar-camera:active, .btn-open-ar-camera:hover {
      transform: scale(1.02);
    }
    @keyframes ctaPulseGlow {
      0%, 100% {
        box-shadow: 0 8px 24px rgba(16, 185, 129, 0.5), 0 0 18px rgba(0, 240, 255, 0.35), inset 0 2px 4px rgba(255, 255, 255, 0.4);
      }
      50% {
        box-shadow: 0 12px 34px rgba(16, 185, 129, 0.85), 0 0 32px rgba(0, 240, 255, 0.75), inset 0 2px 6px rgba(255, 255, 255, 0.6);
      }
    }
    .btn-ar-icon-circle {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: rgba(2, 44, 34, 0.55);
      border: 1.5px solid #fef08a;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.15rem;
      flex-shrink: 0;
    }

    .secondary-cta-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 8px;
    }
    .btn-secondary-studio {
      padding: 9px 10px;
      border-radius: 12px;
      background: rgba(15, 23, 42, 0.88);
      border: 1px solid rgba(56, 189, 248, 0.4);
      color: #bae6fd;
      font-family: 'Prompt', sans-serif;
      font-size: 0.74rem;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .btn-secondary-studio:hover {
      background: rgba(56, 189, 248, 0.2);
      color: #fff;
      border-color: #00f0ff;
    }

    /* Keep Bottom Bar above Welcome Screen so tapping bottom 'กล้อง AR' jewel also works immediately */
    #bottom-bar {
      z-index: 200 !important;
    }

    @media (max-width: 480px) {
      #chewa-welcome-overlay {
        padding: 8px 10px 88px;
      }
      .chewa-stage-card {
        padding: 11px 12px 14px;
        border-radius: 22px;
      }
      .chewa-hero-viewport {
        aspect-ratio: 16 / 10.5;
      }
      .btn-open-ar-camera {
        font-size: 0.86rem;
        padding: 12px 12px;
      }
      .intro-tab-btn {
        font-size: 0.62rem;
        padding: 5px 2px;
      }
    }
  `;
  document.head.appendChild(style);

  // --------------------------------------------------------------------------
  // 3. BUILD DOM ELEMENTS FOR THE WELCOME OVERLAY
  // --------------------------------------------------------------------------
  const overlay = document.createElement("div");
  overlay.id = "chewa-welcome-overlay";
  overlay.innerHTML = `
    <canvas id="ghibli-particles-canvas"></canvas>

    <div class="chewa-stage-card">
      <div class="chewa-top-bar">
        <div class="pixar-ghibli-badge">
          <span class="pixar-ghibli-dot"></span>
          <span>3D PIXAR × GHIBLI COURSE INTRO</span>
        </div>
        <button type="button" class="btn-voice-pill" id="btn-chewa-voice">
          <span>🔊 ฟังเสียง อ.ชีวะ แนะนำวิชา</span>
        </button>
      </div>

      <!-- 3D Pixar × Studio Ghibli Animated Scene of Asst. Prof. Dr. Chewa Thassana -->
      <div class="chewa-hero-viewport" id="chewa-viewport-box">
        <img
          src="chewa_pixar_ghibli_welcome.jpg"
          alt="ผศ.ดร.ชีวะ ทัศนา แนะนำรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา"
          class="chewa-char-img"
        />
        <div class="ghibli-sunbeam-layer"></div>

        <!-- Floating Interactive Holographic ArUco Marker Badge -->
        <div class="floating-aruco-holo" id="holo-aruco-badge" title="แตะเพื่อเปิดกล้องสแกน ArUco Marker">
          <div class="holo-aruco-grid" id="welcome-mini-aruco"></div>
          <div class="holo-aruco-txt">
            <strong>ArUco ID 0–11</strong>
            <span>พร้อมสแกน 12 บท</span>
          </div>
        </div>

        <!-- Instructor Nameplate + Live Talking Equalizer -->
        <div class="chewa-nameplate">
          <div>
            <div class="chewa-prof-name">ผศ.ดร.ชีวะ ทัศนา (Asst. Prof. Dr. Chewa Thassana)</div>
            <div class="chewa-prof-affil">4011111 ฟิสิกส์สำหรับจุลชีววิทยา • คณะวิทยาศาสตร์และเทคโนโลยี มรภ.รำไพพรรณี</div>
          </div>
          <div class="chewa-talk-wave" id="chewa-wave-bars">
            <span></span><span></span><span></span><span></span><span></span>
          </div>
        </div>
      </div>

      <!-- 4 Interactive Course Intro Story Tabs -->
      <div class="intro-tabs-row" id="intro-tabs-container"></div>

      <!-- Animated Speech Bubble -->
      <div class="chewa-speech-bubble">
        <div class="speech-badge" id="chewa-speech-badge"></div>
        <div class="speech-title" id="chewa-speech-title"></div>
        <div class="speech-body" id="chewa-speech-body"></div>
      </div>

      <!-- Primary Action Buttons -->
      <div class="chewa-cta-stack">
        <button type="button" class="btn-open-ar-camera" id="btn-welcome-ar-cam">
          <span class="btn-ar-icon-circle">📷</span>
          <span>กดที่ กล้อง AR — เปิดกล้องสแกน ArUco Marker</span>
        </button>

        <div class="secondary-cta-row">
          <button type="button" class="btn-secondary-studio" id="btn-welcome-3d-studio">
            <span>🧪</span>
            <span>สำรวจ 3D Studio (ไม่เปิดกล้อง)</span>
          </button>
          <a href="aruco_marker_sheet.html" target="_blank" class="btn-secondary-studio">
            <span>🖨️</span>
            <span>เปิดแผ่นมาร์กเกอร์ ID 0–11</span>
          </a>
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(overlay);

  // Add "👨‍🏫 แนะนำวิชา" button to the Top HUD so the user can reopen the animation anytime
  const statusGroup = document.querySelector("#top-hud .status-group");
  if (statusGroup) {
    const reopenBtn = document.createElement("button");
    reopenBtn.className = "top-link-btn";
    reopenBtn.style.cssText =
      "background:linear-gradient(135deg,#f59e0b,#10b981);color:#022c22;border-color:#fde68a;font-weight:700;";
    reopenBtn.innerHTML = "👨‍🏫 อ.ชีวะ แนะนำวิชา";
    reopenBtn.onclick = () => window.showChewaWelcome();
    statusGroup.insertBefore(reopenBtn, statusGroup.firstChild);
  }

  // Update bottom center jewel label to say "กล้อง AR" clearly
  const jewelTxtEl = document.getElementById("jewel-text");
  if (jewelTxtEl) jewelTxtEl.textContent = "กล้อง AR";

  // Render 6x6 ArUco ID 0 preview inside the floating holographic badge
  const miniGrid = document.getElementById("welcome-mini-aruco");
  if (miniGrid && typeof ARUCO_DICT_4X4 !== "undefined") {
    const mat = ARUCO_DICT_4X4[0];
    for (let r = 0; r < 6; r++) {
      for (let c = 0; c < 6; c++) {
        const cell = document.createElement("div");
        const isBorder = r === 0 || r === 5 || c === 0 || c === 5;
        const bit = isBorder ? 0 : mat[r - 1][c - 1];
        cell.style.background = bit ? "#ffffff" : "#020617";
        miniGrid.appendChild(cell);
      }
    }
  }

  // --------------------------------------------------------------------------
  // 4. SLIDE TAB SWITCHING, TYPEWRITER ANIMATION & THAI VOICE NARRATION
  // --------------------------------------------------------------------------
  const tabsContainer = document.getElementById("intro-tabs-container");
  INTRO_SLIDES.forEach((s, idx) => {
    const btn = document.createElement("button");
    btn.type = "button";
    btn.className = "intro-tab-btn" + (idx === 0 ? " active" : "");
    btn.textContent = s.tab;
    btn.onclick = () => {
      if (autoCycleTimer) clearInterval(autoCycleTimer);
      playGhibliWelcomeChime("sparkle");
      showIntroSlide(idx, false);
    };
    tabsContainer.appendChild(btn);
  });

  function setTalkingState(talking) {
    isSpeakingIntro = talking;
    const vp = document.getElementById("chewa-viewport-box");
    const wave = document.getElementById("chewa-wave-bars");
    const voiceBtn = document.getElementById("btn-chewa-voice");
    if (vp) vp.classList.toggle("speaking", talking);
    if (wave) wave.classList.toggle("active", talking);
    if (voiceBtn) {
      voiceBtn.classList.toggle("speaking", talking);
      voiceBtn.innerHTML = talking
        ? "<span>⏹️ หยุดเสียงบรรยาย</span>"
        : "<span>🔊 ฟังเสียง อ.ชีวะ แนะนำวิชา</span>";
    }
  }

  function showIntroSlide(idx, speakAloud = false) {
    currentSlideIdx = idx;
    const slide = INTRO_SLIDES[idx];
    const buttons = tabsContainer.querySelectorAll(".intro-tab-btn");
    buttons.forEach((b, i) => b.classList.toggle("active", i === idx));

    const badgeEl = document.getElementById("chewa-speech-badge");
    const titleEl = document.getElementById("chewa-speech-title");
    const bodyEl = document.getElementById("chewa-speech-body");

    if (badgeEl) badgeEl.textContent = slide.badge;
    if (titleEl) titleEl.textContent = slide.title;

    if (typewriterTimer) clearInterval(typewriterTimer);
    if (bodyEl) {
      bodyEl.textContent = "";
      let charIdx = 0;
      const fullText = slide.text;
      typewriterTimer = setInterval(() => {
        charIdx += 2;
        if (charIdx >= fullText.length) {
          bodyEl.textContent = fullText;
          clearInterval(typewriterTimer);
          typewriterTimer = null;
        } else {
          bodyEl.textContent = fullText.slice(0, charIdx) + "▍";
        }
      }, 18);
    }

    if (speakAloud) {
      speakChewaSlide(idx);
    }
  }

  function speakChewaSlide(idx) {
    if (!("speechSynthesis" in window)) return;
    window.speechSynthesis.cancel();
    const slide = INTRO_SLIDES[idx];
    const utter = new SpeechSynthesisUtterance(slide.voice);
    utter.lang = "th-TH";
    utter.rate = 1.02;
    utter.pitch = 1.04;
    setTalkingState(true);
    utter.onend = () => {
      if (idx + 1 < INTRO_SLIDES.length && isWelcomeVisible && isSpeakingIntro) {
        setTimeout(() => {
          if (isWelcomeVisible && isSpeakingIntro) {
            showIntroSlide(idx + 1, true);
          }
        }, 450);
      } else {
        setTalkingState(false);
      }
    };
    utter.onerror = () => setTalkingState(false);
    window.speechSynthesis.speak(utter);
  }

  document.getElementById("btn-chewa-voice").onclick = () => {
    playGhibliWelcomeChime("sparkle");
    if (isSpeakingIntro) {
      if ("speechSynthesis" in window) window.speechSynthesis.cancel();
      setTalkingState(false);
    } else {
      showIntroSlide(currentSlideIdx, true);
    }
  };

  // Auto-advance slides gently every 7.5 seconds while user reads (unless speaking)
  autoCycleTimer = setInterval(() => {
    if (!isWelcomeVisible || isSpeakingIntro) return;
    const nextIdx = (currentSlideIdx + 1) % INTRO_SLIDES.length;
    showIntroSlide(nextIdx, false);
  }, 7500);

  showIntroSlide(0, false);

  // --------------------------------------------------------------------------
  // 5. OPEN / DISMISS FUNCTIONS & DIRECT AR CAMERA LAUNCHER
  // --------------------------------------------------------------------------
  window.dismissChewaWelcome = function (playChime = true) {
    if (!isWelcomeVisible) return;
    isWelcomeVisible = false;
    if (autoCycleTimer) clearInterval(autoCycleTimer);
    if ("speechSynthesis" in window) window.speechSynthesis.cancel();
    setTalkingState(false);
    if (playChime) playGhibliWelcomeChime("ar_launch");
    overlay.classList.add("hidden-intro");
  };

  window.showChewaWelcome = function () {
    if (typeof isARMode !== "undefined" && isARMode && typeof window.stopARCameraMode === "function") {
      window.stopARCameraMode();
    }
    isWelcomeVisible = true;
    overlay.classList.remove("hidden-intro");
    playGhibliWelcomeChime("sparkle");
    showIntroSlide(0, false);
  };

  async function launchARCameraFromWelcome() {
    playGhibliWelcomeChime("ar_launch");
    window.dismissChewaWelcome(false);
    if (typeof window.toggleARCameraMode === "function") {
      if (typeof isARMode !== "undefined" && isARMode) {
        if (typeof window.unlockForRescan === "function") window.unlockForRescan();
      } else {
        await window.toggleARCameraMode();
      }
    }
  }

  document.getElementById("btn-welcome-ar-cam").onclick = launchARCameraFromWelcome;
  document.getElementById("holo-aruco-badge").onclick = launchARCameraFromWelcome;
  document.getElementById("btn-welcome-3d-studio").onclick = () => {
    window.dismissChewaWelcome(true);
  };

  // Check URL query: if ?skipIntro=1 is explicitly set, dismiss immediately
  const qs = new URLSearchParams(window.location.search);
  if (qs.get("skipIntro") === "1") {
    window.dismissChewaWelcome(false);
  }

  // --------------------------------------------------------------------------
  // 6. 60FPS GHIBLI SUNLIT SPORES & BIOLUMINESCENT MICROBE CANVAS ANIMATION
  // --------------------------------------------------------------------------
  const pCanvas = document.getElementById("ghibli-particles-canvas");
  const pCtx = pCanvas.getContext("2d");
  let cw = (pCanvas.width = window.innerWidth);
  let ch = (pCanvas.height = window.innerHeight);

  window.addEventListener("resize", () => {
    cw = pCanvas.width = window.innerWidth;
    ch = pCanvas.height = window.innerHeight;
  });

  const spores = Array.from({ length: 34 }, (_, i) => ({
    x: Math.random() * cw,
    y: Math.random() * ch,
    r: 2 + Math.random() * 5.5,
    vx: (Math.random() - 0.5) * 0.45,
    vy: -0.25 - Math.random() * 0.55,
    phase: Math.random() * Math.PI * 2,
    hue: i % 3 === 0 ? "251, 191, 36" : i % 3 === 1 ? "52, 211, 153" : "56, 189, 248"
  }));

  function renderGhibliSpores(ts) {
    requestAnimationFrame(renderGhibliSpores);
    if (!isWelcomeVisible) return;

    pCtx.clearRect(0, 0, cw, ch);
    const t = ts * 0.0015;

    for (let i = 0; i < spores.length; i++) {
      const s = spores[i];
      s.x += s.vx + Math.sin(t + s.phase) * 0.25;
      s.y += s.vy;
      if (s.y < -15) s.y = ch + 15;
      if (s.x < -15) s.x = cw + 15;
      if (s.x > cw + 15) s.x = -15;

      const alpha = 0.28 + 0.45 * (0.5 + 0.5 * Math.sin(t * 1.8 + s.phase));
      const grad = pCtx.createRadialGradient(s.x, s.y, 0.5, s.x, s.y, s.r * 3.2);
      grad.addColorStop(0, `rgba(255, 255, 255, ${Math.min(1, alpha + 0.3)})`);
      grad.addColorStop(0.35, `rgba(${s.hue}, ${alpha})`);
      grad.addColorStop(1, `rgba(${s.hue}, 0)`);

      pCtx.fillStyle = grad;
      pCtx.beginPath();
      pCtx.arc(s.x, s.y, s.r * 3.2, 0, Math.PI * 2);
      pCtx.fill();
    }
  }
  requestAnimationFrame(renderGhibliSpores);
})();
