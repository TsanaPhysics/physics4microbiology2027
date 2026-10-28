/**
 * ============================================================================
 * 3D PIXAR × STUDIO GHIBLI COURSE INTRODUCTION ANIMATION & VOICE NARRATION
 * Instructor: Asst. Prof. Dr. Chewa Thassana (ผศ.ดร.ชีวะ ทัศนา)
 * Course: 4011111 Physics for Microbiology (ฟิสิกส์สำหรับจุลชีววิทยา)
 *
 * Features:
 *   1. Exact cover-matched 3D Pixar portrait of Asst. Prof. Dr. Chewa Thassana
 *      with compound microscope and 3D holographic flagellated bacteria cube
 *   2. Real HTML5 MP3 Voice Narration (audio/intro_slide_1..4.mp3,
 *      audio/chewa_welcome_full.mp3, and audio/ch01..ch12_voice.mp3) with
 *      Web Speech API fallback so voice playback works 100% on iOS/Android
 *   3. Live audio progress bar, talking bounce & equalizer wave animation
 *   4. One-tap "📷 กล้อง AR" button that closes the intro and immediately
 *      opens the smartphone rear camera ready to scan ArUco markers (ID 0–11)
 * ============================================================================
 */
(function () {
  const INTRO_SLIDES = [
    {
      tab: "👋 แนะนำรายวิชา",
      badge: "WELCOME • 4011111 PHYSICS FOR MICROBIOLOGY",
      title: "สวัสดีครับ! ยินดีต้อนรับสู่ฟิสิกส์สำหรับจุลชีววิทยา ✨",
      text: "สวัสดีครับนักศึกษาทุกคน อาจารย์ชีวะ (ผศ.ดร.ชีวะ ทัศนา) ขอต้อนรับเข้าสู่รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) รายวิชานี้ออกแบบด้วยแนวคิด Low-Math, High-Intuition เรียนฟิสิกส์ให้เข้าใจง่ายผ่านเครื่องมือห้องแล็บจุลชีววิทยาจริงครับ",
      audio: "audio/intro_slide_1.mp3",
      voice: "สวัสดีครับนักศึกษาทุกคน อาจารย์ชีวะ ทัศนา ขอต้อนรับเข้าสู่รายวิชา สี่ ศูนย์ หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง ฟิสิกส์สำหรับจุลชีววิทยา จำนวน 3 หน่วยกิต ครับ รายวิชานี้ออกแบบด้วยแนวคิด โลว์แมท ไฮอินทูอิชัน เรียนฟิสิกส์ให้เข้าใจง่ายผ่านเครื่องมือห้องแล็บจุลชีววิทยาจริงทั้งสิบสองบทครับ"
    },
    {
      tab: "🔬 12 บท & แล็บ",
      badge: "12 OBE CHAPTERS • 13 HANDS-ON LABS",
      title: "เชื่อมโยงฟิสิกส์เข้ากับเครื่องมือจุลชีววิทยาครบ 12 บท 🧬",
      text: "เราจะเรียนรู้ตั้งแต่ไมโครปิเปต P1000, การว่ายของแฟลกเจลลา, กฎสโตกส์ในตู้ปลอดเชื้อ, เครื่องปั่นเหวี่ยง RCF (×g), หม้อนึ่ง Autoclave 121°C, เจลอิเล็กโทรโฟรีซิส, กล้องจุลทรรศน์หัวเลนส์น้ำมัน 100x ไปจนถึงการวัดความขุ่นเชื้อ OD600 ครับ",
      audio: "audio/intro_slide_2.mp3",
      voice: "ตลอดทั้งสิบสองบทเรียน และสิบสามปฏิบัติการ เราจะเรียนรู้ฟิสิกส์ผ่านเครื่องมือจริง ตั้งแต่ไมโครปิเปต พีหนึ่งพัน การว่ายของแฟลกเจลลา กฎสโตกส์ในตู้ปลอดเชื้อ เครื่องปั่นเหวี่ยงอาร์ซีเอฟ หม้อนึ่งความดันไอออโตเคลฟ เจลอิเล็กโทรโฟรีซิส กล้องจุลทรรศน์หัวเลนส์น้ำมันร้อยเท่า ไปจนถึงการวัดความขุ่นโอดีหกร้อยครับ"
    },
    {
      tab: "📐 สูตรลัดเข้าใจง่าย",
      badge: "LOW-MATH GUIDE • NO CALCULUS REQUIRED",
      title: "เทคนิคบันได 1,000 เท่า & สามเหลี่ยมสูตรไร้แคลคูลัส 📐",
      text: "ไม่ต้องกังวลเรื่องคณิตศาสตร์ซับซ้อน! เราใช้เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละ 1,000 เท่าสำหรับแปลงหน่วยไมโครลิตร และการปิดตัวแปรในผังสามเหลี่ยมสูตรคำนวณ ช่วยให้คำนวณผลแล็บจุลชีววิทยาได้รวดเร็วและแม่นยำครับ",
      audio: "audio/intro_slide_3.mp3",
      voice: "ไม่ต้องกังวลเรื่องคณิตศาสตร์หรือแคลคูลัสซับซ้อนครับ เราใช้เทคนิคบันไดเลื่อนจุดทศนิยมขั้นละหนึ่งพันเท่า สำหรับแปลงหน่วยไมโครลิตร และผังสามเหลี่ยมสูตรคำนวณที่ช่วยให้คำนวณผลปฏิบัติการจุลชีววิทยาได้รวดเร็วและแม่นยำครับ"
    },
    {
      tab: "📷 วิธีส่องกล้อง AR",
      badge: "3D WebAR • ARUCO MARKER DICT_4X4_50 (ID 0–11)",
      title: "กดปุ่ม 'กล้อง AR' เพื่อสแกน ArUco Marker ได้เลย! 📷",
      text: "เมื่อกดปุ่ม '📷 กล้อง AR' ด้านล่าง ระบบจะเปิดกล้องสมาร์ทโฟนพร้อมกรอบเล็งเลเซอร์ทันที เพียงนำไปส่องที่มาร์กเกอร์ ArUco (ID 0–11) ในเอกสารคำสอน โมเดล 3 มิติจะลอยขึ้นมาให้หมุนสำรวจและปรับค่าตัวแปรได้แบบเรียลไทม์ครับ!",
      audio: "audio/intro_slide_4.mp3",
      voice: "เมื่อพร้อมแล้ว กดที่ปุ่ม กล้องเออาร์ ด้านล่างได้เลยครับ ระบบจะเปิดกล้องสมาร์ทโฟนทันที เพียงนำกรอบเล็งไปส่องที่มาร์กเกอร์อารูโค ไอดีศูนย์ถึงสิบเอ็ด ในเอกสารคำสอน โมเดลสามมิติจะลอยขึ้นมาให้หมุนสำรวจและทดลองปรับค่าได้จริงครับ"
    }
  ];

  let currentSlideIdx = 0;
  let typewriterTimer = null;
  let autoCycleTimer = null;
  let isWelcomeVisible = true;
  let isSpeakingIntro = false;
  let activeAudioEl = new Audio();
  activeAudioEl.preload = "auto";

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
          ? [523.25, 659.25, 783.99, 1046.5, 1318.5]
          : [440, 554.37, 659.25, 880];

      notes.forEach((freq, idx) => {
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();
        osc.type = "sine";
        const t0 = ctx.currentTime + idx * 0.065;
        osc.frequency.setValueAtTime(freq, t0);
        gain.gain.setValueAtTime(0.001, t0);
        gain.gain.linearRampToValueAtTime(0.075, t0 + 0.02);
        gain.gain.exponentialRampToValueAtTime(0.0008, t0 + 0.55);
        osc.connect(gain);
        gain.connect(ctx.destination);
        osc.start(t0);
        osc.stop(t0 + 0.58);
      });
    } catch (e) {}
  }

  // --------------------------------------------------------------------------
  // 2. INJECT CSS STYLES FOR COVER-MATCHED 3D PIXAR × GHIBLI WELCOME SCREEN
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
      padding: 10px 12px 92px;
      background:
        radial-gradient(circle at 50% 15%, rgba(16, 185, 129, 0.24) 0%, rgba(6, 78, 99, 0.35) 38%, rgba(3, 10, 24, 0.96) 75%, #020617 100%);
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
      max-width: 520px;
      margin: auto;
      background: linear-gradient(160deg, rgba(10, 25, 44, 0.92) 0%, rgba(4, 12, 26, 0.97) 100%);
      border: 1.5px solid rgba(0, 240, 255, 0.42);
      border-radius: 26px;
      padding: 13px 15px 16px;
      box-shadow:
        0 24px 60px rgba(0, 0, 0, 0.8),
        0 0 42px rgba(16, 185, 129, 0.22),
        inset 0 1px 1px rgba(255, 255, 255, 0.22);
      overflow: hidden;
    }

    .chewa-top-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      margin-bottom: 9px;
      flex-wrap: wrap;
    }
    .pixar-ghibli-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 11px;
      border-radius: 999px;
      font-family: 'Prompt', sans-serif;
      font-size: 0.68rem;
      font-weight: 700;
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.24), rgba(0, 240, 255, 0.22));
      color: #a7f3d0;
      border: 1px solid rgba(52, 211, 153, 0.55);
      box-shadow: 0 0 14px rgba(16, 185, 129, 0.25);
    }
    .pixar-ghibli-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #34d399;
      box-shadow: 0 0 8px #34d399;
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
      padding: 5px 13px;
      border-radius: 999px;
      font-family: 'Prompt', sans-serif;
      font-size: 0.73rem;
      font-weight: 700;
      background: linear-gradient(135deg, #fbbf24, #10b981);
      color: #022c22;
      border: 1.5px solid #fef08a;
      cursor: pointer;
      box-shadow: 0 4px 16px rgba(251, 191, 36, 0.45);
      transition: transform 0.18s ease, box-shadow 0.18s ease;
    }
    .btn-voice-pill:hover, .btn-voice-pill.speaking {
      transform: translateY(-1px) scale(1.03);
      background: linear-gradient(135deg, #00f0ff, #10b981);
      box-shadow: 0 0 22px rgba(0, 240, 255, 0.85);
    }

    .chewa-hero-viewport {
      position: relative;
      width: 100%;
      aspect-ratio: 4 / 3.35;
      border-radius: 20px;
      overflow: hidden;
      border: 2px solid rgba(0, 240, 255, 0.52);
      box-shadow:
        0 12px 32px rgba(0, 0, 0, 0.65),
        0 0 28px rgba(16, 185, 129, 0.28);
      background: #04131d;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .chewa-char-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center 12%;
      transform-origin: 65% 50%;
      animation: chewaBreatheFloat 5.2s infinite ease-in-out;
    }
    .chewa-hero-viewport.speaking .chewa-char-img {
      animation: chewaTalkingBounce 0.58s infinite ease-in-out;
    }
    @keyframes chewaBreatheFloat {
      0%, 100% { transform: scale(1.005) translateY(0px); }
      50% { transform: scale(1.035) translateY(-4px); }
    }
    @keyframes chewaTalkingBounce {
      0%, 100% { transform: scale(1.015) translateY(0px); }
      50% { transform: scale(1.045) translateY(-5px); }
    }

    #chewa-holo-fx-canvas {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 2;
    }

    .floating-aruco-holo {
      position: absolute;
      top: 10px;
      right: 10px;
      z-index: 4;
      display: flex;
      align-items: center;
      gap: 7px;
      padding: 4px 9px;
      border-radius: 11px;
      background: rgba(3, 12, 26, 0.84);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(0, 240, 255, 0.6);
      box-shadow: 0 0 18px rgba(0, 240, 255, 0.35);
      animation: holoFloatBadge 3.2s infinite ease-in-out;
      cursor: pointer;
    }
    @keyframes holoFloatBadge {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-4px); }
    }
    .holo-aruco-grid {
      width: 24px;
      height: 24px;
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
      font-size: 0.62rem;
      line-height: 1.18;
      color: #e0f2fe;
      font-weight: 600;
    }
    .holo-aruco-txt strong {
      color: #00f0ff;
      display: block;
      font-size: 0.66rem;
    }

    .chewa-nameplate {
      position: absolute;
      bottom: 8px;
      left: 10px;
      right: 10px;
      z-index: 4;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      padding: 6px 12px;
      border-radius: 14px;
      background: rgba(3, 12, 26, 0.88);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(52, 211, 153, 0.5);
    }
    .chewa-prof-name {
      font-family: 'Prompt', sans-serif;
      font-size: 0.82rem;
      font-weight: 700;
      color: #fef08a;
      line-height: 1.2;
    }
    .chewa-prof-affil {
      font-size: 0.65rem;
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
      animation: activeTalkWave 0.36s infinite ease-in-out;
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

    .intro-tabs-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 5px;
      margin-bottom: 8px;
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

    .chewa-speech-bubble {
      position: relative;
      background: rgba(7, 18, 34, 0.94);
      border: 1.5px solid rgba(52, 211, 153, 0.45);
      border-radius: 18px;
      padding: 10px 14px 12px;
      margin-bottom: 11px;
      min-height: 104px;
      box-shadow: inset 0 0 24px rgba(16, 185, 129, 0.08);
    }
    .speech-top-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 6px;
      margin-bottom: 3px;
    }
    .speech-badge {
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.62rem;
      font-weight: 700;
      color: #34d399;
      letter-spacing: 0.3px;
    }
    .speech-audio-status {
      font-family: 'Prompt', sans-serif;
      font-size: 0.64rem;
      font-weight: 600;
      color: #38bdf8;
      cursor: pointer;
    }
    .speech-title {
      font-family: 'Prompt', sans-serif;
      font-size: 0.86rem;
      font-weight: 700;
      color: #fef08a;
      margin-bottom: 4px;
      line-height: 1.3;
    }
    .speech-body {
      font-family: 'Sarabun', 'Prompt', sans-serif;
      font-size: 0.79rem;
      color: #e2e8f0;
      line-height: 1.48;
    }
    .speech-progress-wrap {
      margin-top: 8px;
      height: 4px;
      width: 100%;
      background: rgba(15, 23, 42, 0.9);
      border-radius: 999px;
      overflow: hidden;
    }
    .speech-progress-bar {
      height: 100%;
      width: 0%;
      background: linear-gradient(90deg, #10b981, #00f0ff, #fbbf24);
      transition: width 0.15s linear;
    }

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
      padding: 8px 10px;
      border-radius: 12px;
      background: rgba(15, 23, 42, 0.88);
      border: 1px solid rgba(56, 189, 248, 0.4);
      color: #bae6fd;
      font-family: 'Prompt', sans-serif;
      font-size: 0.73rem;
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

    #bottom-bar {
      z-index: 200 !important;
    }

    @media (max-width: 480px) {
      #chewa-welcome-overlay {
        padding: 8px 10px 86px;
      }
      .chewa-stage-card {
        padding: 11px 12px 14px;
        border-radius: 22px;
      }
      .chewa-hero-viewport {
        aspect-ratio: 4 / 3.45;
      }
      .btn-open-ar-camera {
        font-size: 0.85rem;
        padding: 11px 12px;
      }
      .intro-tab-btn {
        font-size: 0.62rem;
        padding: 5px 2px;
      }
    }
  `;
  document.head.appendChild(style);

  // --------------------------------------------------------------------------
  // 3. BUILD DOM ELEMENTS FOR THE COVER-MATCHED WELCOME OVERLAY
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
          <span>🔊 ฟังเสียงบรรยายแนะนำวิชา</span>
        </button>
      </div>

      <!-- Cover-Matched 3D Pixar Scene of Asst. Prof. Dr. Chewa Thassana + Microscope + Hologram Cube -->
      <div class="chewa-hero-viewport" id="chewa-viewport-box" title="แตะที่ภาพเพื่อฟังเสียงบรรยายแนะนำรายวิชา">
        <img
          src="chewa_pixar_ghibli_welcome.jpg?v=2027.10"
          alt="ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา แนะนำรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา"
          class="chewa-char-img"
        />
        <canvas id="chewa-holo-fx-canvas" width="640" height="540"></canvas>

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
            <div class="chewa-prof-name">ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา</div>
            <div class="chewa-prof-affil">สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มรภ.รำไพพรรณี</div>
          </div>
          <div class="chewa-talk-wave" id="chewa-wave-bars">
            <span></span><span></span><span></span><span></span><span></span>
          </div>
        </div>
      </div>

      <!-- 4 Interactive Course Intro Story Tabs -->
      <div class="intro-tabs-row" id="intro-tabs-container"></div>

      <!-- Animated Speech Bubble with Audio Progress Bar -->
      <div class="chewa-speech-bubble">
        <div class="speech-top-row">
          <div class="speech-badge" id="chewa-speech-badge"></div>
          <div class="speech-audio-status" id="chewa-audio-status">🔊 แตะเพื่อฟังเสียงบรรยาย</div>
        </div>
        <div class="speech-title" id="chewa-speech-title"></div>
        <div class="speech-body" id="chewa-speech-body"></div>
        <div class="speech-progress-wrap">
          <div class="speech-progress-bar" id="chewa-audio-progress"></div>
        </div>
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

  // Add "👨‍🏫 อ.ชีวะ แนะนำวิชา" button to the Top HUD
  const statusGroup = document.querySelector("#top-hud .status-group");
  if (statusGroup) {
    const reopenBtn = document.createElement("button");
    reopenBtn.className = "top-link-btn";
    reopenBtn.style.cssText =
      "background:linear-gradient(135deg,#10b981,#06b6d4);color:#022c22;border-color:#a7f3d0;font-weight:700;";
    reopenBtn.innerHTML = "👨‍🏫 อ.ชีวะ แนะนำวิชา";
    reopenBtn.onclick = () => window.showChewaWelcome();
    statusGroup.insertBefore(reopenBtn, statusGroup.firstChild);
  }

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
  // 4. REAL MP3 NARRATION ENGINE + WEB SPEECH API FALLBACK (WELCOME + 12 CHAPTERS)
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
      showIntroSlide(idx, true);
    };
    tabsContainer.appendChild(btn);
  });

  function setTalkingState(talking) {
    isSpeakingIntro = talking;
    const vp = document.getElementById("chewa-viewport-box");
    const wave = document.getElementById("chewa-wave-bars");
    const voiceBtn = document.getElementById("btn-chewa-voice");
    const statusTxt = document.getElementById("chewa-audio-status");
    const aiWave = document.getElementById("ai-wave-ind");

    if (vp) vp.classList.toggle("speaking", talking);
    if (wave) wave.classList.toggle("active", talking);
    if (aiWave) aiWave.classList.toggle("speaking", talking);
    if (voiceBtn) {
      voiceBtn.classList.toggle("speaking", talking);
      voiceBtn.innerHTML = talking
        ? "<span>⏹️ หยุดเสียงบรรยาย</span>"
        : "<span>🔊 ฟังเสียงบรรยายแนะนำวิชา</span>";
    }
    if (statusTxt) {
      statusTxt.textContent = talking ? "🔊 กำลังบรรยายเสียงภาษาไทย..." : "🔊 แตะเพื่อฟังเสียงบรรยาย";
    }
    if (!talking) {
      const progBar = document.getElementById("chewa-audio-progress");
      if (progBar) progBar.style.width = "0%";
    }
  }

  function stopAllNarration() {
    try {
      activeAudioEl.pause();
      activeAudioEl.currentTime = 0;
    } catch (e) {}
    if ("speechSynthesis" in window) {
      window.speechSynthesis.cancel();
    }
    setTalkingState(false);
  }

  activeAudioEl.addEventListener("timeupdate", () => {
    const progBar = document.getElementById("chewa-audio-progress");
    if (progBar && activeAudioEl.duration > 0) {
      const pct = Math.min(100, (activeAudioEl.currentTime / activeAudioEl.duration) * 100);
      progBar.style.width = pct + "%";
    }
  });

  function playMP3WithFallback(mp3Url, fallbackText, onFinished) {
    stopAllNarration();
    setTalkingState(true);

    activeAudioEl.src = mp3Url;
    activeAudioEl.onended = () => {
      setTalkingState(false);
      if (typeof onFinished === "function") onFinished();
    };
    activeAudioEl.onerror = () => {
      // Fallback to browser SpeechSynthesis if MP3 fails to load
      if ("speechSynthesis" in window && fallbackText) {
        const spokenText = fallbackText.replace(/4011111/g, "สี่ ศูนย์ หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง");
        const utter = new SpeechSynthesisUtterance(spokenText);
        utter.lang = "th-TH";
        utter.rate = 1.02;
        utter.onend = () => {
          setTalkingState(false);
          if (typeof onFinished === "function") onFinished();
        };
        utter.onerror = () => setTalkingState(false);
        window.speechSynthesis.speak(utter);
      } else {
        setTalkingState(false);
      }
    };

    const playPromise = activeAudioEl.play();
    if (playPromise !== undefined) {
      playPromise.catch(() => {
        // If autoplay blocked or fallback needed
        if ("speechSynthesis" in window && fallbackText) {
          const spokenText = fallbackText.replace(/4011111/g, "สี่ ศูนย์ หนึ่ง หนึ่ง หนึ่ง หนึ่ง หนึ่ง");
          const utter = new SpeechSynthesisUtterance(spokenText);
          utter.lang = "th-TH";
          utter.rate = 1.02;
          utter.onend = () => {
            setTalkingState(false);
            if (typeof onFinished === "function") onFinished();
          };
          utter.onerror = () => setTalkingState(false);
          window.speechSynthesis.speak(utter);
        } else {
          setTalkingState(false);
        }
      });
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
    const slide = INTRO_SLIDES[idx];
    playMP3WithFallback(slide.audio, slide.voice, () => {
      if (idx + 1 < INTRO_SLIDES.length && isWelcomeVisible) {
        setTimeout(() => {
          if (isWelcomeVisible) {
            showIntroSlide(idx + 1, true);
          }
        }, 420);
      }
    });
  }

  // Upgrade Chapter 1–12 Voice Narration (used by bottom bar 'AI เสียง' & CTRL drawer) to play real MP3!
  window.speakCurrentChapter = function () {
    const chNum = String((typeof currentMarkerId === "number" ? currentMarkerId : 0) + 1).padStart(2, "0");
    const mp3File = `audio/ch${chNum}_voice.mp3`;
    const fallbackVoice =
      typeof CHAPTER_MODELS !== "undefined" && CHAPTER_MODELS[currentMarkerId]
        ? CHAPTER_MODELS[currentMarkerId].voice
        : "";
    playMP3WithFallback(mp3File, fallbackVoice);
  };

  window.stopAISpeech = function () {
    stopAllNarration();
  };

  function toggleWelcomeVoice() {
    playGhibliWelcomeChime("sparkle");
    if (isSpeakingIntro) {
      stopAllNarration();
    } else {
      if (autoCycleTimer) clearInterval(autoCycleTimer);
      showIntroSlide(currentSlideIdx, true);
    }
  }

  document.getElementById("btn-chewa-voice").onclick = toggleWelcomeVoice;
  document.getElementById("chewa-audio-status").onclick = toggleWelcomeVoice;
  document.getElementById("chewa-viewport-box").onclick = (e) => {
    if (e.target.closest("#holo-aruco-badge")) return;
    toggleWelcomeVoice();
  };

  autoCycleTimer = setInterval(() => {
    if (!isWelcomeVisible || isSpeakingIntro) return;
    const nextIdx = (currentSlideIdx + 1) % INTRO_SLIDES.length;
    showIntroSlide(nextIdx, false);
  }, 7500);

  showIntroSlide(0, false);

  // Attempt gentle auto-start of Slide 1 narration (succeeds if user navigated via a click)
  setTimeout(() => {
    if (isWelcomeVisible && !isSpeakingIntro) {
      speakChewaSlide(0);
    }
  }, 450);

  // --------------------------------------------------------------------------
  // 5. OPEN / DISMISS FUNCTIONS & DIRECT AR CAMERA LAUNCHER
  // --------------------------------------------------------------------------
  window.dismissChewaWelcome = function (playChime = true) {
    if (!isWelcomeVisible) return;
    isWelcomeVisible = false;
    if (autoCycleTimer) clearInterval(autoCycleTimer);
    stopAllNarration();
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
    showIntroSlide(0, true);
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

  const qs = new URLSearchParams(window.location.search);
  if (qs.get("skipIntro") === "1") {
    window.dismissChewaWelcome(false);
  }

  // --------------------------------------------------------------------------
  // 6. 60FPS HOLOGRAM CUBE FX + GHIBLI BIOLUMINESCENT SPORES ANIMATION
  // --------------------------------------------------------------------------
  const pCanvas = document.getElementById("ghibli-particles-canvas");
  const pCtx = pCanvas.getContext("2d");
  const hCanvas = document.getElementById("chewa-holo-fx-canvas");
  const hCtx = hCanvas ? hCanvas.getContext("2d") : null;

  let cw = (pCanvas.width = window.innerWidth);
  let ch = (pCanvas.height = window.innerHeight);

  window.addEventListener("resize", () => {
    cw = pCanvas.width = window.innerWidth;
    ch = pCanvas.height = window.innerHeight;
  });

  const spores = Array.from({ length: 34 }, (_, i) => ({
    x: Math.random() * cw,
    y: Math.random() * ch,
    r: 2 + Math.random() * 5.2,
    vx: (Math.random() - 0.5) * 0.45,
    vy: -0.25 - Math.random() * 0.55,
    phase: Math.random() * Math.PI * 2,
    hue: i % 3 === 0 ? "52, 211, 153" : i % 3 === 1 ? "0, 240, 255" : "251, 191, 36"
  }));

  const cubeMicrobes = Array.from({ length: 18 }, (_, i) => ({
    x: 55 + Math.random() * 220,
    y: 75 + Math.random() * 155,
    r: 1.8 + Math.random() * 2.8,
    phase: i * 0.7
  }));

  function renderGhibliAndHoloFX(ts) {
    requestAnimationFrame(renderGhibliAndHoloFX);
    if (!isWelcomeVisible) return;

    pCtx.clearRect(0, 0, cw, ch);
    const t = ts * 0.0016;

    for (let i = 0; i < spores.length; i++) {
      const s = spores[i];
      s.x += s.vx + Math.sin(t + s.phase) * 0.25;
      s.y += s.vy;
      if (s.y < -15) s.y = ch + 15;
      if (s.x < -15) s.x = cw + 15;
      if (s.x > cw + 15) s.x = -15;

      const alpha = 0.25 + 0.45 * (0.5 + 0.5 * Math.sin(t * 1.8 + s.phase));
      const grad = pCtx.createRadialGradient(s.x, s.y, 0.5, s.x, s.y, s.r * 3.2);
      grad.addColorStop(0, `rgba(255, 255, 255, ${Math.min(1, alpha + 0.3)})`);
      grad.addColorStop(0.35, `rgba(${s.hue}, ${alpha})`);
      grad.addColorStop(1, `rgba(${s.hue}, 0)`);

      pCtx.fillStyle = grad;
      pCtx.beginPath();
      pCtx.arc(s.x, s.y, s.r * 3.2, 0, Math.PI * 2);
      pCtx.fill();
    }

    if (hCtx) {
      const w = hCanvas.width;
      const h = hCanvas.height;
      hCtx.clearRect(0, 0, w, h);

      const scanY = 68 + ((Math.sin(t * 1.35) * 0.5 + 0.5) * 180);
      const scanGrad = hCtx.createLinearGradient(28, scanY, 304, scanY);
      scanGrad.addColorStop(0, "rgba(0, 240, 255, 0)");
      scanGrad.addColorStop(0.2, "rgba(52, 211, 153, 0.45)");
      scanGrad.addColorStop(0.5, "rgba(255, 255, 255, 0.7)");
      scanGrad.addColorStop(0.8, "rgba(0, 240, 255, 0.45)");
      scanGrad.addColorStop(1, "rgba(0, 240, 255, 0)");
      hCtx.fillStyle = scanGrad;
      hCtx.fillRect(28, scanY - 1.5, 276, 3);

      for (let i = 0; i < cubeMicrobes.length; i++) {
        const m = cubeMicrobes[i];
        const mx = m.x + Math.sin(t * 1.9 + m.phase) * 10;
        const my = m.y + Math.cos(t * 1.5 + m.phase) * 8;
        const a = 0.35 + 0.55 * (0.5 + 0.5 * Math.sin(t * 3 + m.phase));
        const mg = hCtx.createRadialGradient(mx, my, 0.5, mx, my, m.r * 3.5);
        mg.addColorStop(0, `rgba(255, 255, 255, ${a})`);
        mg.addColorStop(0.4, `rgba(52, 211, 153, ${a * 0.85})`);
        mg.addColorStop(1, "rgba(16, 185, 129, 0)");
        hCtx.fillStyle = mg;
        hCtx.beginPath();
        hCtx.arc(mx, my, m.r * 3.5, 0, Math.PI * 2);
        hCtx.fill();
      }

      const stagePulse = 0.35 + 0.35 * Math.sin(t * 3.2);
      const stageGrad = hCtx.createRadialGradient(192, 422, 2, 192, 422, 34);
      stageGrad.addColorStop(0, `rgba(167, 243, 208, ${stagePulse + 0.25})`);
      stageGrad.addColorStop(0.45, `rgba(16, 185, 129, ${stagePulse})`);
      stageGrad.addColorStop(1, "rgba(16, 185, 129, 0)");
      hCtx.fillStyle = stageGrad;
      hCtx.beginPath();
      hCtx.arc(192, 422, 34, 0, Math.PI * 2);
      hCtx.fill();

      const glintCycle = (t * 0.55) % 4.0;
      if (glintCycle < 1.2) {
        const prog = glintCycle / 1.2;
        const gx = 345 + prog * 135;
        const gGrad = hCtx.createLinearGradient(gx - 18, 132, gx + 18, 168);
        gGrad.addColorStop(0, "rgba(255, 255, 255, 0)");
        gGrad.addColorStop(0.5, "rgba(255, 255, 255, 0.32)");
        gGrad.addColorStop(1, "rgba(255, 255, 255, 0)");
        hCtx.fillStyle = gGrad;
        hCtx.fillRect(345, 134, 130, 34);
      }
    }
  }
  requestAnimationFrame(renderGhibliAndHoloFX);
})();
