<?php
/**
 * ============================================================================
 * น้อง i-MicroB AI Bot Assistor : Autonomous Agentic AI Mascot & Voice Assistant
 * Course: 4011111 Physics for Microbiology (2026/2027)
 * Modeled after LEQs AI Bot Architecture (RBRU LEQs-GLOBE 2570)
 * Faculty of Science & Technology, Rambhai Barni Rajabhat University
 * ============================================================================
 */
$botBasePath = $basePath ?? '';
// Calculate API path relative to current page location
if (!isset($apiBotUrl)) {
    if (isset($basePath) && $basePath === '../') {
        // Chapters or Labs inside 03_physics4microbio2026/chapters/ or 03_physics4microbio2026/labs/
        $apiBotUrl = '../../virtual_lab/api/imicrob_ai_api.php';
    } elseif (isset($basePath) && $basePath === './') {
        // 03_physics4microbio2026/index.php
        $apiBotUrl = '../virtual_lab/api/imicrob_ai_api.php';
    } else {
        // Root index.php
        $apiBotUrl = 'virtual_lab/api/imicrob_ai_api.php';
    }
}
?>

<!-- =========================================================================
     1. Floating 3D Mascot Trigger (Bottom Right - Ergonomic & Responsive)
========================================================================= -->
<div id="imicrobBotFloatingTrigger" class="fixed bottom-[84px] md:bottom-6 right-3 sm:right-6 z-50 flex flex-col items-end gap-2 group select-none">
    
    <!-- Speech Bubble Prompt (Floats directly above avatar) -->
    <div id="imicrobBotSpeechBubble" class="hidden sm:flex items-center gap-2 bg-slate-900/95 backdrop-blur-xl px-3.5 py-2 rounded-2xl shadow-2xl border border-cyan-500/40 text-xs font-semibold text-white animate-bounce cursor-pointer hover:border-cyan-300 transition-all max-w-[280px]" onclick="toggleMicrobChatbot()">
        <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-ping shrink-0"></span>
        <span id="imicrobBubbleText" class="truncate text-[11px]">มีอะไรให้ <strong>น้อง i-MicroB</strong> ช่วยเนี่ยฮิ? 🔬🧫</span>
        <button type="button" class="text-slate-400 hover:text-white ml-1 text-sm leading-none shrink-0" onclick="event.stopPropagation(); document.getElementById('imicrobBotSpeechBubble').classList.add('hidden');">&times;</button>
    </div>

    <!-- 3D Mascot Avatar Circle Button -->
    <button type="button" id="imicrobBotAvatarBtn" onclick="toggleMicrobChatbot()" aria-label="เปิดน้อง i-MicroB AI Bot"
        class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-cyan-600 via-teal-500 to-emerald-400 p-1 shadow-[0_10px_25px_rgba(6,182,212,0.45)] hover:scale-105 active:scale-95 transition-all duration-300 ring-4 ring-white/90 focus:outline-none cursor-pointer">
        
        <!-- Rotating Aura Ring -->
        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 via-teal-300 to-emerald-400 opacity-70 blur-[3px] animate-spin" style="animation-duration: 9s;"></div>
        
        <!-- Mascot 3D Bio-Physics Robot Inside -->
        <div class="relative w-full h-full rounded-full bg-slate-950 overflow-hidden flex items-center justify-center border-2 border-white/70">
            <svg class="w-14 h-14 sm:w-16 sm:h-16 transform group-hover:rotate-6 transition-transform" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="microbHeadGrad" cx="35%" cy="30%" r="70%">
                        <stop offset="0%" stop-color="#06B6D4"/>
                        <stop offset="55%" stop-color="#0284C7"/>
                        <stop offset="100%" stop-color="#0F172A"/>
                    </radialGradient>
                    <radialGradient id="microbVisorGrad" cx="50%" cy="40%" r="60%">
                        <stop offset="0%" stop-color="#38BDF8"/>
                        <stop offset="50%" stop-color="#0369A1"/>
                        <stop offset="100%" stop-color="#082F49"/>
                    </radialGradient>
                    <filter id="microbGlow">
                        <feGaussianBlur stdDeviation="1.5" result="coloredBlur"/>
                        <feMerge>
                            <feMergeNode in="coloredBlur"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                </defs>

                <!-- Robot Head Sphere -->
                <circle cx="50" cy="52" r="40" fill="url(#microbHeadGrad)" stroke="#38BDF8" stroke-width="1.5" />
                
                <!-- Smart Biophysics Glass Visor -->
                <rect x="22" y="36" width="56" height="30" rx="14" fill="url(#microbVisorGrad)" stroke="#67E8F9" stroke-width="1.5" />
                <path d="M26 40 Q50 34 74 40" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" fill="none" />

                <!-- Cute Expressive Glowing Cyan Eyes -->
                <g id="imicrobEyesGroup">
                    <ellipse cx="38" cy="50" rx="6" ry="7.5" fill="#22D3EE" filter="url(#microbGlow)" />
                    <circle cx="39" cy="48" r="2.5" fill="#FFFFFF" />
                    <ellipse cx="62" cy="50" rx="6" ry="7.5" fill="#22D3EE" filter="url(#microbGlow)" />
                    <circle cx="63" cy="48" r="2.5" fill="#FFFFFF" />
                </g>

                <!-- Cheerful Rosy Cheeks -->
                <circle cx="28" cy="58" r="3.5" fill="#FB7185" opacity="0.8" />
                <circle cx="72" cy="58" r="3.5" fill="#FB7185" opacity="0.8" />

                <!-- Animated Lip-sync Mouth -->
                <path id="imicrobMouth" d="M44 60 Q50 65 56 60" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" fill="none" />

                <!-- Dual Antenna / Microscope Objective Sprout on Head -->
                <path d="M50 14 L50 8" stroke="#38BDF8" stroke-width="3" stroke-linecap="round" />
                <!-- Glowing DNA Spangle / Microscope Lens -->
                <circle cx="50" cy="7" r="4.5" fill="#FBBF24" filter="url(#microbGlow)" />
                <path d="M42 16 Q50 11 58 16" stroke="#22D3EE" stroke-width="2" fill="none" />
            </svg>
        </div>

        <!-- Online Pulse Badge -->
        <span class="absolute top-0 right-0 w-5 h-5 bg-cyan-400 border-2 border-white rounded-full flex items-center justify-center text-[9px] text-slate-950 font-black shadow-md">
            <i class="fa-solid fa-sparkles text-[8px]"></i>
        </span>
    </button>
</div>

<!-- =========================================================================
     2. Chatbot Window Modal (High-End Glassmorphism, Tailored to Biophysics)
========================================================================= -->
<div id="imicrobChatbotModal" class="fixed bottom-0 md:bottom-6 right-0 sm:right-4 md:right-6 w-full sm:w-[460px] max-w-full h-[90vh] sm:h-[660px] max-h-[96vh] bg-slate-900/95 backdrop-blur-2xl sm:rounded-3xl shadow-2xl border border-cyan-500/30 z-[70] flex flex-col overflow-hidden transform translate-y-full opacity-0 pointer-events-none transition-all duration-300">
    
    <!-- Header -->
    <div class="px-4 sm:px-5 py-3.5 bg-gradient-to-r from-cyan-950 via-slate-900 to-indigo-950 text-white flex items-center justify-between shrink-0 shadow-lg relative overflow-hidden border-b border-cyan-500/20">
        <div class="absolute -right-8 -top-8 w-32 h-32 bg-cyan-500/20 rounded-full blur-xl pointer-events-none"></div>

        <div class="flex items-center gap-2.5 sm:gap-3 relative z-10">
            <!-- Mini Animated Avatar -->
            <div class="relative w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-gradient-to-tr from-cyan-400 to-teal-400 p-0.5 shadow-md shrink-0">
                <div class="w-full h-full rounded-[14px] bg-slate-950 flex items-center justify-center overflow-hidden">
                    <span class="text-lg sm:text-xl">🔬</span>
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-cyan-400 border-2 border-slate-950 rounded-full animate-ping"></span>
            </div>

            <div>
                <div class="flex items-center gap-2">
                    <h3 id="imicrobBotTitle" class="font-extrabold text-sm sm:text-base leading-tight text-white">น้อง i-MicroB</h3>
                    <span class="text-[9px] sm:text-[10px] bg-amber-400 text-slate-950 font-black px-1.5 py-0.2 rounded-full uppercase shadow-xs">สำเนียงจันท์ฮิ</span>
                </div>
                <div class="text-[10px] sm:text-[11px] text-cyan-200 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-cyan-400"></span>
                    <span>Physics 4 Microbiology AI Assistor • RBRU</span>
                </div>
            </div>
        </div>

        <!-- Top Right Control Buttons -->
        <div class="flex items-center gap-1.5 relative z-10">
            <!-- Language Switcher Pill -->
            <div class="flex items-center bg-black/40 backdrop-blur-md rounded-xl p-0.5 border border-white/10 text-[10px] font-bold">
                <button type="button" onclick="setMicrobLang('th')" id="microbLangBtnTh" title="ภาษาไทยสำเนียงจันท์"
                    class="px-2 py-0.5 rounded-lg bg-cyan-500 text-slate-950 font-bold shadow-xs transition">ไทย</button>
                <button type="button" onclick="setMicrobLang('en')" id="microbLangBtnEn" title="English AI Mode"
                    class="px-2 py-0.5 rounded-lg text-slate-400 hover:text-white transition">EN</button>
                <button type="button" onclick="setMicrobLang('zh')" id="microbLangBtnZh" title="中文助手"
                    class="px-2 py-0.5 rounded-lg text-slate-400 hover:text-white transition">中文</button>
            </div>

            <!-- Sound Toggle -->
            <button type="button" id="microbVoiceToggleBtn" onclick="toggleMicrobVoice()" title="เปิด/ปิดเสียงพูดน้อง i-MicroB"
                class="w-8 h-8 rounded-xl bg-white/10 hover:bg-white/20 text-cyan-200 hover:text-white flex items-center justify-center text-xs transition">
                <i id="microbVoiceIcon" class="fa-solid fa-volume-high"></i>
            </button>
            
            <!-- Clear History -->
            <button type="button" onclick="clearMicrobChat()" title="ล้างบทสนทนา"
                class="w-8 h-8 rounded-xl bg-white/10 hover:bg-white/20 text-slate-400 hover:text-white flex items-center justify-center text-xs transition">
                <i class="fa-solid fa-rotate-right"></i>
            </button>

            <!-- Close Modal -->
            <button type="button" onclick="toggleMicrobChatbot()" aria-label="ปิดหน้าต่างแชท"
                class="w-8 h-8 rounded-xl bg-white/10 hover:bg-rose-500 text-slate-300 hover:text-white flex items-center justify-center text-sm transition">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <!-- Active Voice Indicator Bar (When Speaking) -->
    <div id="microbSpeakingIndicator" class="hidden bg-gradient-to-r from-cyan-500 via-teal-500 to-cyan-600 text-slate-950 px-4 py-1.5 text-[11px] font-bold flex items-center justify-between shrink-0 shadow-sm">
        <div class="flex items-center gap-2">
            <div class="flex items-end gap-0.5 h-3">
                <span class="w-1 bg-slate-950 rounded-full animate-bounce" style="height: 60%; animation-delay: 0.1s;"></span>
                <span class="w-1 bg-slate-950 rounded-full animate-bounce" style="height: 100%; animation-delay: 0.2s;"></span>
                <span class="w-1 bg-slate-950 rounded-full animate-bounce" style="height: 40%; animation-delay: 0.3s;"></span>
                <span class="w-1 bg-slate-950 rounded-full animate-bounce" style="height: 80%; animation-delay: 0.15s;"></span>
            </div>
            <span id="microbSpeakingText">🎙️ น้อง i-MicroB กำลังพูดตอบคำถาม...</span>
        </div>
        <button type="button" onclick="stopMicrobSpeech()" class="text-xs hover:underline text-slate-900 font-extrabold flex items-center gap-1 bg-white/40 px-2 py-0.5 rounded-lg">
            <i class="fa-solid fa-stop text-[10px]"></i>
            <span>หยุดเสียง</span>
        </button>
    </div>

    <!-- Active Voice Input Indicator Bar (When Mic Listening) -->
    <div id="microbListeningIndicator" class="hidden bg-gradient-to-r from-rose-600 via-pink-600 to-rose-700 text-white px-4 py-2 text-[11px] font-bold flex items-center justify-between shrink-0 shadow-md">
        <div class="flex items-center gap-2">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-200 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
            </span>
            <span id="microbListeningText">🎙️ กำลังฟังเสียงพูด... ถามน้อง i-MicroB ได้เลยเนี่ยฮิ!</span>
        </div>
        <button type="button" onclick="stopMicrobVoiceInput()" class="text-xs hover:underline text-white font-extrabold flex items-center gap-1 bg-black/30 hover:bg-black/50 px-2 py-0.5 rounded-lg transition">
            <i class="fa-solid fa-xmark text-[10px]"></i>
            <span>ยกเลิก</span>
        </button>
    </div>

    <!-- Live RAG Data Source Sync Status Pill -->
    <div id="microbRagStatusPill" class="bg-cyan-950/80 border-b border-cyan-500/30 px-3.5 py-1.5 text-[10px] text-cyan-300 flex items-center justify-between shrink-0">
        <div class="flex items-center gap-1.5 truncate">
            <i class="fa-solid fa-bolt text-cyan-400"></i>
            <span id="microbRagSyncText">RAG Live: เชื่อมฐานข้อมูลสด SQLite & คลังความรู้ 12 บทเรียน ⚡</span>
        </div>
        <span class="text-[9px] bg-cyan-500/20 text-cyan-300 border border-cyan-500/40 px-1.5 py-0.2 rounded font-bold uppercase">Online</span>
    </div>

    <!-- Chat Messages Scroll Container -->
    <div id="microbChatMessages" class="flex-1 p-4 overflow-y-auto space-y-3.5 text-xs sm:text-sm bg-slate-950/80">
        <!-- Messages dynamically injected -->
    </div>

    <!-- Quick Prompt Suggestions Chips -->
    <div id="microbQuickChips" class="px-3 py-2 bg-slate-900 border-t border-white/5 flex items-center gap-1.5 overflow-x-auto text-[11px] shrink-0 no-scrollbar">
        <!-- Chips dynamically injected based on language -->
    </div>

    <!-- Chat Input Area -->
    <div class="p-3 bg-slate-900 border-t border-white/10 shrink-0">
        <form id="microbChatForm" onsubmit="handleMicrobChatSubmit(event)" class="flex items-center gap-2">
            <!-- Voice Input Mic Button -->
            <button type="button" id="microbMicBtn" onclick="toggleMicrobVoiceInput()" title="กดเพื่อพูดด้วยเสียง"
                class="w-10 h-10 rounded-2xl bg-slate-800 hover:bg-cyan-500/20 text-slate-300 hover:text-cyan-400 flex items-center justify-center shrink-0 transition border border-white/10 cursor-pointer">
                <i id="microbMicIcon" class="fa-solid fa-microphone text-sm"></i>
            </button>

            <!-- Text Input Field -->
            <input type="text" id="microbChatInput" placeholder="ถามน้อง i-MicroB สำเนียงจันท์ได้เลยเนี่ยฮิ... หรือใส่รหัส นศ."
                class="flex-1 bg-slate-800/90 hover:bg-slate-800 focus:bg-slate-950 text-white text-xs sm:text-sm px-3.5 py-2.5 rounded-2xl border border-transparent focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 focus:outline-none transition placeholder-slate-500">

            <!-- Send Button -->
            <button type="submit" id="microbSendBtn" aria-label="ส่งข้อความ"
                class="w-10 h-10 rounded-2xl bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 text-slate-950 font-bold flex items-center justify-center shrink-0 shadow-lg shadow-cyan-500/30 transition active:scale-95 cursor-pointer">
                <i class="fa-solid fa-paper-plane text-xs"></i>
            </button>
        </form>
    </div>

</div>

<!-- =========================================================================
     3. JAVASCRIPT AGENTIC RAG & MULTILINGUAL AUDIO ENGINE
========================================================================= -->
<script>
// State Management
let currentMicrobLang = 'th'; // 'th' | 'en' | 'zh'
let isMicrobChatOpen = false;
let isMicrobVoiceEnabled = localStorage.getItem('imicrob_bot_voice_enabled') !== 'false';
let isMicrobListening = false;
let microbSpeechSynth = window.speechSynthesis;
let microbSpeechRecognition = null;
const MICROB_API_ENDPOINT = '<?php echo $apiBotUrl; ?>';

// Quick Chips Definition
const MICROB_QUICK_CHIPS = {
    th: [
        { label: '🧪 สอบเทียบไมโครปิเปต', q: 'ไมโครปิเปตสอบเทียบยังไง' },
        { label: '🌀 คำนวณ RCF เหวี่ยง', q: 'สูตรคำนวณ RCF เครื่องปั่นเหวี่ยง' },
        { label: '💨 หม้อนึ่ง Autoclave 121°C', q: 'หม้อนึ่ง Autoclave ทำงานยังไง' },
        { label: '🟣 กลไกย้อมสีแกรม', q: 'กลไกย้อมสีแกรมไฟฟ้าสถิต' },
        { label: '📈 OD600 เบียร์-แลมเบิร์ต', q: 'OD600 สเปกโตรโฟโตมิเตอร์' },
        { label: '📊 สถิตินักศึกษา & รายงาน', q: 'มีนักศึกษาส่งรายงานกี่คน' },
        { label: '👨‍🏫 อาจารย์ผู้สอน', q: 'ใครเป็นอาจารย์ผู้สอน' }
    ],
    en: [
        { label: '🧪 Micropipette Calibration', q: 'How to calibrate P1000 micropipette' },
        { label: '🌀 Centrifuge RCF Formula', q: 'How to calculate centrifuge RCF' },
        { label: '💨 Autoclave 121°C Steam', q: 'Autoclave sterilization kinetics' },
        { label: '🟣 Gram Staining Physics', q: 'Gram staining electrostatic mechanism' },
        { label: '📈 Beer-Lambert OD600', q: 'Spectrophotometry OD600 Beer-Lambert' },
        { label: '👨‍🏫 Course Instructor', q: 'Who is the instructor' }
    ],
    zh: [
        { label: '🧪 微量移液枪校准', q: '如何校准P1000移液枪' },
        { label: '🌀 离心机RCF计算', q: '离心机RCF离心力公式' },
        { label: '💨 高压蒸汽灭菌121°C', q: '高压蒸汽灭菌原理' },
        { label: '🟣 革兰氏染色静电机制', q: '革兰氏染色物理机制' },
        { label: '📈 比尔-朗伯定律OD600', q: '分光光度法OD600' }
    ]
};

// =========================================================================
// Web Audio Chime Synthesizer
// =========================================================================
let microbAudioCtx = null;
function getMicrobAudioContext() {
    try {
        const AudioContextClass = window.AudioContext || window.webkitAudioContext;
        if (!AudioContextClass) return null;
        if (!microbAudioCtx || microbAudioCtx.state === 'closed') {
            microbAudioCtx = new AudioContextClass();
        }
        if (microbAudioCtx.state === 'suspended') {
            microbAudioCtx.resume().catch(() => {});
        }
        return microbAudioCtx;
    } catch (e) {
        return null;
    }
}

function playMicrobSound(type) {
    if (!isMicrobVoiceEnabled) return;
    const ctx = getMicrobAudioContext();
    if (!ctx) return;

    const now = ctx.currentTime;
    const osc = ctx.createOscillator();
    const gain = ctx.createGain();
    osc.connect(gain);
    gain.connect(ctx.destination);

    if (type === 'chime' || type === 'open') {
        // Bright friendly double sine chime
        osc.type = 'sine';
        osc.frequency.setValueAtTime(587.33, now); // D5
        osc.frequency.exponentialRampToValueAtTime(880.00, now + 0.15); // A5
        gain.gain.setValueAtTime(0.12, now);
        gain.gain.exponentialRampToValueAtTime(0.001, now + 0.4);
        osc.start(now);
        osc.stop(now + 0.4);
    } else if (type === 'send') {
        // Soft click
        osc.type = 'sine';
        osc.frequency.setValueAtTime(440, now);
        osc.frequency.exponentialRampToValueAtTime(660, now + 0.08);
        gain.gain.setValueAtTime(0.08, now);
        gain.gain.exponentialRampToValueAtTime(0.001, now + 0.15);
        osc.start(now);
        osc.stop(now + 0.15);
    } else if (type === 'pop') {
        // Bubble pop
        osc.type = 'triangle';
        osc.frequency.setValueAtTime(784, now);
        osc.frequency.exponentialRampToValueAtTime(1046.5, now + 0.12);
        gain.gain.setValueAtTime(0.15, now);
        gain.gain.exponentialRampToValueAtTime(0.001, now + 0.25);
        osc.start(now);
        osc.stop(now + 0.25);
    }
}

// =========================================================================
// Speech Synthesis (TTS) & Recognition (STT)
// =========================================================================
function speakMicrobReply(text) {
    if (!isMicrobVoiceEnabled || !('speechSynthesis' in window)) return;
    stopMicrobSpeech();

    // Clean markdown symbols for cleaner TTS speech
    let cleanText = text.replace(/[*_#`\$\\]/g, ' ')
                        .replace(/\b([A-Za-z]+)\b/g, '$1')
                        .replace(/\n+/g, ' ');

    const utter = new SpeechSynthesisUtterance(cleanText);
    utter.rate = 1.05;
    utter.pitch = 1.15; // Slightly cute energetic pitch for mascot

    if (currentMicrobLang === 'th') utter.lang = 'th-TH';
    else if (currentMicrobLang === 'zh') utter.lang = 'zh-CN';
    else utter.lang = 'en-US';

    const indicator = document.getElementById('microbSpeakingIndicator');
    if (indicator) indicator.classList.remove('hidden');

    // Animate mascot mouth
    const mouth = document.getElementById('imicrobMouth');
    let mouthInterval = null;
    if (mouth) {
        mouthInterval = setInterval(() => {
            const h = Math.floor(Math.random() * 8) + 60;
            mouth.setAttribute('d', `M44 60 Q50 ${h} 56 60`);
        }, 120);
    }

    utter.onend = () => {
        if (indicator) indicator.classList.add('hidden');
        if (mouthInterval) clearInterval(mouthInterval);
        if (mouth) mouth.setAttribute('d', 'M44 60 Q50 65 56 60');
    };
    utter.onerror = () => {
        if (indicator) indicator.classList.add('hidden');
        if (mouthInterval) clearInterval(mouthInterval);
        if (mouth) mouth.setAttribute('d', 'M44 60 Q50 65 56 60');
    };

    window.speechSynthesis.speak(utter);
}

function stopMicrobSpeech() {
    if ('speechSynthesis' in window) {
        window.speechSynthesis.cancel();
    }
    const indicator = document.getElementById('microbSpeakingIndicator');
    if (indicator) indicator.classList.add('hidden');
    const mouth = document.getElementById('imicrobMouth');
    if (mouth) mouth.setAttribute('d', 'M44 60 Q50 65 56 60');
}

function toggleMicrobVoice() {
    isMicrobVoiceEnabled = !isMicrobVoiceEnabled;
    localStorage.setItem('imicrob_bot_voice_enabled', isMicrobVoiceEnabled ? 'true' : 'false');
    const icon = document.getElementById('microbVoiceIcon');
    if (icon) {
        icon.className = isMicrobVoiceEnabled ? 'fa-solid fa-volume-high' : 'fa-solid fa-volume-xmark text-rose-400';
    }
    if (!isMicrobVoiceEnabled) {
        stopMicrobSpeech();
    } else {
        playMicrobSound('pop');
    }
}

function initMicrobSpeechRecognition() {
    const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) return null;
    const rec = new SpeechRecognition();
    rec.continuous = false;
    rec.interimResults = false;
    rec.lang = currentMicrobLang === 'th' ? 'th-TH' : (currentMicrobLang === 'zh' ? 'zh-CN' : 'en-US');

    rec.onstart = () => {
        isMicrobListening = true;
        document.getElementById('microbListeningIndicator')?.classList.remove('hidden');
        document.getElementById('microbMicIcon')?.classList.add('text-rose-500', 'animate-pulse');
    };

    rec.onresult = (evt) => {
        const transcript = evt.results[0][0].transcript;
        const input = document.getElementById('microbChatInput');
        if (input) {
            input.value = transcript;
            handleMicrobChatSubmit();
        }
    };

    rec.onerror = () => {
        stopMicrobVoiceInput();
    };

    rec.onend = () => {
        stopMicrobVoiceInput();
    };

    return rec;
}

function toggleMicrobVoiceInput() {
    if (!microbSpeechRecognition) {
        microbSpeechRecognition = initMicrobSpeechRecognition();
    }
    if (!microbSpeechRecognition) {
        alert('เบราว์เซอร์ของคุณยังไม่รองรับ Web Speech Recognition กรุณาใช้ Chrome หรือ Edge นะฮิ!');
        return;
    }
    if (isMicrobListening) {
        microbSpeechRecognition.stop();
    } else {
        microbSpeechRecognition.lang = currentMicrobLang === 'th' ? 'th-TH' : (currentMicrobLang === 'zh' ? 'zh-CN' : 'en-US');
        microbSpeechRecognition.start();
    }
}

function stopMicrobVoiceInput() {
    isMicrobListening = false;
    document.getElementById('microbListeningIndicator')?.classList.add('hidden');
    document.getElementById('microbMicIcon')?.classList.remove('text-rose-500', 'animate-pulse');
}

// =========================================================================
// UI Logic & Message Flow
// =========================================================================
function toggleMicrobChatbot() {
    isMicrobChatOpen = !isMicrobChatOpen;
    const modal = document.getElementById('imicrobChatbotModal');
    const bubble = document.getElementById('imicrobBotSpeechBubble');

    if (isMicrobChatOpen) {
        modal.classList.remove('translate-y-full', 'opacity-0', 'pointer-events-none');
        modal.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
        if (bubble) bubble.classList.add('hidden');
        playMicrobSound('open');
        document.getElementById('microbChatInput')?.focus();

        // Render initial welcome if empty
        const box = document.getElementById('microbChatMessages');
        if (box && box.children.length === 0) {
            renderWelcomeMessage();
        }
    } else {
        modal.classList.add('translate-y-full', 'opacity-0', 'pointer-events-none');
        modal.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
        stopMicrobSpeech();
        stopMicrobVoiceInput();
    }
}

function setMicrobLang(lang) {
    currentMicrobLang = lang;
    ['Th', 'En', 'Zh'].forEach(l => {
        const btn = document.getElementById('microbLangBtn' + l);
        if (btn) {
            btn.className = (l.toLowerCase() === lang)
                ? 'px-2 py-0.5 rounded-lg bg-cyan-500 text-slate-950 font-bold shadow-xs transition'
                : 'px-2 py-0.5 rounded-lg text-slate-400 hover:text-white transition';
        }
    });
    renderMicrobQuickChips();
    playMicrobSound('pop');
}

function renderMicrobQuickChips() {
    const container = document.getElementById('microbQuickChips');
    if (!container) return;
    const chips = MICROB_QUICK_CHIPS[currentMicrobLang] || MICROB_QUICK_CHIPS.th;
    container.innerHTML = chips.map(c => `
        <button type="button" onclick="sendQuickPrompt('${c.q}')"
            class="px-2.5 py-1 rounded-xl bg-slate-800 hover:bg-cyan-500/20 text-cyan-200 hover:text-cyan-300 border border-cyan-500/30 whitespace-nowrap transition text-[11px] shrink-0 font-medium">
            ${c.label}
        </button>
    `).join('');
}

function sendQuickPrompt(query) {
    const input = document.getElementById('microbChatInput');
    if (input) {
        input.value = query;
        handleMicrobChatSubmit();
    }
}

function renderWelcomeMessage() {
    const box = document.getElementById('microbChatMessages');
    if (!box) return;

    let welcomeHtml = `
        <div class="flex items-start gap-2.5">
            <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm shadow-sm">
                🔬
            </div>
            <div class="flex-1 bg-slate-900 border border-cyan-500/30 rounded-2xl p-3.5 shadow-lg text-slate-200 leading-relaxed">
                <p class="font-bold text-cyan-300 mb-1 flex items-center gap-1.5">
                    <span>น้อง i-MicroB พร้อมช่วยเนี่ยฮิ!</span>
                    <span class="text-[10px] bg-cyan-500/20 text-cyan-300 px-1.5 py-0.2 rounded font-mono">Biophysics AI</span>
                </p>
                <p class="text-xs mb-2">
                    สวัสดีฮิ! น้องเป็นผู้ช่วยอัจฉริยะประจำวิชา <strong>4011111 ฟิสิกส์สำหรับจุลชีววิทยา</strong> มรภ.รำไพพรรณี มีอะไรสงสัยเกี่ยวกับทฤษฎี 12 บท, แล็บเสมือนจริง 13 แล็บ, สูตรคำนวณ หรือจะเช็กคะแนนตนเอง ถามมาได้เลยเนี่ยฮิ! 🧫✨
                </p>
                <div class="pt-2 border-t border-white/5 flex flex-wrap gap-1 text-[10px] text-slate-400">
                    <span class="text-cyan-400">คำถามแนะนำ:</span>
                    <span>• "สอบเทียบไมโครปิเปต"</span>
                    <span>• "สูตร RCF"</span>
                    <span>• "ใส่รหัสนักศึกษา 8 หลักเพื่อดูคะแนน"</span>
                </div>
            </div>
        </div>
    `;
    box.innerHTML = welcomeHtml;
    renderMicrobQuickChips();
}

function clearMicrobChat() {
    const box = document.getElementById('microbChatMessages');
    if (box) box.innerHTML = '';
    renderWelcomeMessage();
    stopMicrobSpeech();
    playMicrobSound('pop');
}

async function handleMicrobChatSubmit(evt) {
    if (evt) evt.preventDefault();
    const input = document.getElementById('microbChatInput');
    if (!input) return;
    const q = input.value.trim();
    if (!q) return;

    input.value = '';
    stopMicrobSpeech();
    playMicrobSound('send');

    const box = document.getElementById('microbChatMessages');

    // 1. Append User Message Bubble
    const userMsgHtml = `
        <div class="flex items-start justify-end gap-2.5">
            <div class="max-w-[85%] bg-gradient-to-r from-cyan-600 to-teal-600 text-white rounded-2xl rounded-tr-sm p-3 shadow-md text-xs sm:text-sm">
                ${escapeHtml(q)}
            </div>
            <div class="w-8 h-8 rounded-xl bg-slate-800 border border-white/10 flex items-center justify-center shrink-0 text-sm">
                🧑‍🎓
            </div>
        </div>
    `;
    box.insertAdjacentHTML('beforeend', userMsgHtml);
    box.scrollTop = box.scrollHeight;

    // 2. Append Typing Placeholder Bubble
    const typingId = 'typing_' + Date.now();
    const typingHtml = `
        <div id="${typingId}" class="flex items-start gap-2.5">
            <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm">
                🔬
            </div>
            <div class="bg-slate-900 border border-cyan-500/30 rounded-2xl px-4 py-3 text-cyan-300 text-xs flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span>
                <span>น้อง i-MicroB กำลังสืบค้นข้อมูลในบทเรียนและฐานข้อมูลเนี่ยฮิ...</span>
            </div>
        </div>
    `;
    box.insertAdjacentHTML('beforeend', typingHtml);
    box.scrollTop = box.scrollHeight;

    // 3. Query Backend API
    try {
        const resp = await fetch(MICROB_API_ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ q: q, lang: currentMicrobLang })
        });
        const data = await resp.json();
        
        // Remove typing indicator
        document.getElementById(typingId)?.remove();

        const replyText = data.reply || "น้อง i-MicroB กำลังทบทวนข้อมูลอยู่ ลองถามอีกทีนะฮิ!";

        // 4. Append Bot Message Bubble
        const botMsgHtml = `
            <div class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm shadow-sm">
                    🔬
                </div>
                <div class="flex-1 bg-slate-900 border border-cyan-500/30 rounded-2xl p-3.5 shadow-lg text-slate-200 leading-relaxed text-xs sm:text-sm">
                    <div class="prose prose-invert max-w-none text-xs sm:text-sm">
                        ${formatMarkdown(replyText)}
                    </div>
                    <div class="mt-2.5 pt-2 border-t border-white/5 flex items-center justify-between text-[10px] text-slate-400">
                        <span class="flex items-center gap-1 text-cyan-400 font-mono">
                            <i class="fa-solid fa-microchip"></i> i-MicroB RAG Engine
                        </span>
                        <button type="button" onclick="speakMicrobReply(${JSON.stringify(replyText)})" class="hover:text-cyan-300 flex items-center gap-1 transition">
                            <i class="fa-solid fa-volume-high text-[10px]"></i> ฟังเสียงอ่าน
                        </button>
                    </div>
                </div>
            </div>
        `;
        box.insertAdjacentHTML('beforeend', botMsgHtml);
        box.scrollTop = box.scrollHeight;
        playMicrobSound('pop');

        // Automatically read aloud if voice enabled
        speakMicrobReply(replyText);

        // If MathJax is loaded on page, render math equations in response
        if (window.MathJax && window.MathJax.typesetPromise) {
            window.MathJax.typesetPromise([box]).catch(() => {});
        }

    } catch (err) {
        document.getElementById(typingId)?.remove();
        const errMsgHtml = `
            <div class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-rose-500/20 border border-rose-400/40 flex items-center justify-center shrink-0 text-sm">
                    ⚠️
                </div>
                <div class="bg-rose-950/60 border border-rose-500/30 rounded-2xl p-3 text-rose-200 text-xs">
                    ขออภัยฮิ ไม่สามารถเชื่อมต่อ API น้อง i-MicroB ได้ชั่วคราว ลองตรวจสอบการเชื่อมต่อเซิร์ฟเวอร์นะฮิ!
                </div>
            </div>
        `;
        box.insertAdjacentHTML('beforeend', errMsgHtml);
        box.scrollTop = box.scrollHeight;
    }
}

// Simple Helpers
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function formatMarkdown(text) {
    if (!text) return '';
    let html = escapeHtml(text);
    // Bold **text**
    html = html.replace(/\*\*(.*?)\*\*/g, '<strong class="text-cyan-300 font-bold">$1</strong>');
    // Bullet points •
    html = html.replace(/^[•\-\*]\s+(.*)$/gm, '<li class="ml-4 list-disc">$1</li>');
    // Newlines
    html = html.replace(/\n/g, '<br>');
    return html;
}

// Auto Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    renderMicrobQuickChips();
    // Show speech bubble briefly after 3 seconds to welcome user
    setTimeout(() => {
        const bubble = document.getElementById('imicrobBotSpeechBubble');
        if (bubble && !isMicrobChatOpen) {
            bubble.classList.remove('hidden');
        }
    }, 2800);
});
</script>
