/**
 * imicrob_bot.js
 * Standalone Client-Side Injector for น้อง i-MicroB AI Bot Assistor
 * Injects Mascot Floating Trigger & Glassmorphism Chat Modal into virtual_lab/index.html
 */

(function() {
    if (document.getElementById('imicrobBotFloatingTrigger')) return;

    const API_ENDPOINT = 'api/imicrob_ai_api.php';
    let currentLang = 'th';
    let isOpen = false;
    let isVoiceEnabled = localStorage.getItem('imicrob_bot_voice_enabled') !== 'false';
    let isListening = false;
    let recognition = null;

    const QUICK_CHIPS = {
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
            { label: '📈 Beer-Lambert OD600', q: 'Spectrophotometry OD600 Beer-Lambert' }
        ],
        zh: [
            { label: '🧪 微量移液枪校准', q: '如何校准P1000移液枪' },
            { label: '🌀 离心机RCF计算', q: '离心机RCF离心力公式' },
            { label: '💨 高压蒸汽灭菌121°C', q: '高压蒸汽灭菌原理' },
            { label: '🟣 革兰氏染色静电机制', q: '革兰氏染色物理机制' }
        ]
    };

    // Inject HTML Markup
    const botHtml = `
    <!-- Floating Mascot Trigger -->
    <div id="imicrobBotFloatingTrigger" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-2 select-none">
        <div id="imicrobBotSpeechBubble" class="hidden sm:flex items-center gap-2 bg-slate-900/95 backdrop-blur-xl px-3.5 py-2 rounded-2xl shadow-2xl border border-cyan-500/40 text-xs font-semibold text-white animate-bounce cursor-pointer hover:border-cyan-300 transition-all max-w-[280px]">
            <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-ping shrink-0"></span>
            <span class="truncate text-[11px]">มีอะไรให้ <strong>น้อง i-MicroB</strong> ช่วยในห้องแล็บไหมเนี่ยฮิ? 🔬🧫</span>
            <button type="button" class="text-slate-400 hover:text-white ml-1 text-sm leading-none shrink-0" id="closeBubbleBtn">&times;</button>
        </div>

        <button type="button" id="imicrobAvatarBtn" aria-label="เปิดน้อง i-MicroB AI Bot"
            class="relative w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-cyan-600 via-teal-500 to-emerald-400 p-1 shadow-[0_10px_25px_rgba(6,182,212,0.45)] hover:scale-105 active:scale-95 transition-all duration-300 ring-4 ring-white/90 focus:outline-none cursor-pointer">
            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 via-teal-300 to-emerald-400 opacity-70 blur-[3px] animate-spin" style="animation-duration: 9s;"></div>
            <div class="relative w-full h-full rounded-full bg-slate-950 overflow-hidden flex items-center justify-center border-2 border-white/70">
                <svg class="w-14 h-14 sm:w-16 sm:h-16" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="52" r="40" fill="#0284C7" stroke="#38BDF8" stroke-width="1.5" />
                    <rect x="22" y="36" width="56" height="30" rx="14" fill="#0369A1" stroke="#67E8F9" stroke-width="1.5" />
                    <ellipse cx="38" cy="50" rx="6" ry="7.5" fill="#22D3EE" />
                    <circle cx="39" cy="48" r="2.5" fill="#FFFFFF" />
                    <ellipse cx="62" cy="50" rx="6" ry="7.5" fill="#22D3EE" />
                    <circle cx="63" cy="48" r="2.5" fill="#FFFFFF" />
                    <circle cx="28" cy="58" r="3.5" fill="#FB7185" opacity="0.8" />
                    <circle cx="72" cy="58" r="3.5" fill="#FB7185" opacity="0.8" />
                    <path id="imicrobMouthSvg" d="M44 60 Q50 65 56 60" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" fill="none" />
                    <path d="M50 14 L50 8" stroke="#38BDF8" stroke-width="3" stroke-linecap="round" />
                    <circle cx="50" cy="7" r="4.5" fill="#FBBF24" />
                </svg>
            </div>
            <span class="absolute top-0 right-0 w-5 h-5 bg-cyan-400 border-2 border-white rounded-full flex items-center justify-center text-[9px] text-slate-950 font-black shadow-md">
                <i class="fa-solid fa-sparkles text-[8px]"></i>
            </span>
        </button>
    </div>

    <!-- Chat Modal Window -->
    <div id="imicrobChatModal" class="fixed bottom-0 md:bottom-6 right-0 sm:right-6 w-full sm:w-[460px] max-w-full h-[90vh] sm:h-[660px] max-h-[96vh] bg-slate-900/95 backdrop-blur-2xl sm:rounded-3xl shadow-2xl border border-cyan-500/30 z-[70] flex flex-col overflow-hidden transform translate-y-full opacity-0 pointer-events-none transition-all duration-300">
        <!-- Header -->
        <div class="px-4 py-3 bg-gradient-to-r from-cyan-950 via-slate-900 to-indigo-950 text-white flex items-center justify-between shrink-0 border-b border-cyan-500/20">
            <div class="flex items-center gap-2.5">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-cyan-400 to-teal-400 p-0.5 shadow-md flex items-center justify-center text-xl shrink-0">
                    🔬
                </div>
                <div>
                    <div class="flex items-center gap-1.5">
                        <h3 class="font-extrabold text-sm text-white">น้อง i-MicroB</h3>
                        <span class="text-[9px] bg-amber-400 text-slate-950 font-black px-1.5 py-0.2 rounded-full uppercase">สำเนียงจันท์ฮิ</span>
                    </div>
                    <div class="text-[10px] text-cyan-200">Virtual Lab AI Assistor • RBRU 2027</div>
                </div>
            </div>
            <div class="flex items-center gap-1.5">
                <button type="button" id="voiceToggleBtn" class="w-8 h-8 rounded-xl bg-white/10 hover:bg-white/20 text-cyan-200 flex items-center justify-center text-xs transition">
                    <i id="voiceIcon" class="fa-solid fa-volume-high"></i>
                </button>
                <button type="button" id="clearBtn" class="w-8 h-8 rounded-xl bg-white/10 hover:bg-white/20 text-slate-400 flex items-center justify-center text-xs transition">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
                <button type="button" id="closeModalBtn" class="w-8 h-8 rounded-xl bg-white/10 hover:bg-rose-500 text-slate-300 flex items-center justify-center text-sm transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- Indicator bar -->
        <div id="speakingBar" class="hidden bg-gradient-to-r from-cyan-500 via-teal-500 to-cyan-600 text-slate-950 px-4 py-1.5 text-[11px] font-bold flex items-center justify-between shrink-0">
            <span>🎙️ น้อง i-MicroB กำลังพูดตอบคำถาม...</span>
            <button type="button" id="stopSpeakBtn" class="text-xs bg-white/40 px-2 py-0.5 rounded font-extrabold">หยุด</button>
        </div>

        <div class="bg-cyan-950/80 border-b border-cyan-500/30 px-3.5 py-1.5 text-[10px] text-cyan-300 flex items-center justify-between shrink-0">
            <span>⚡ เชื่อมฐานข้อมูลสด SQLite & คลังความรู้ 13 แล็บ 3D</span>
            <span class="text-[9px] bg-cyan-500/20 text-cyan-300 border border-cyan-500/40 px-1.5 py-0.2 rounded font-bold uppercase">Online</span>
        </div>

        <!-- Messages Area -->
        <div id="messagesArea" class="flex-1 p-4 overflow-y-auto space-y-3.5 text-xs sm:text-sm bg-slate-950/80"></div>

        <!-- Quick Chips -->
        <div id="quickChipsArea" class="px-3 py-2 bg-slate-900 border-t border-white/5 flex items-center gap-1.5 overflow-x-auto text-[11px] shrink-0 no-scrollbar"></div>

        <!-- Input Form -->
        <div class="p-3 bg-slate-900 border-t border-white/10 shrink-0">
            <form id="chatForm" class="flex items-center gap-2">
                <input type="text" id="chatInput" placeholder="ถามน้อง i-MicroB สำเนียงจันท์ได้เลยเนี่ยฮิ..."
                    class="flex-1 bg-slate-800/90 text-white text-xs sm:text-sm px-3.5 py-2.5 rounded-2xl border border-transparent focus:border-cyan-400 focus:outline-none transition">
                <button type="submit" class="w-10 h-10 rounded-2xl bg-gradient-to-r from-cyan-500 to-teal-500 text-slate-950 font-bold flex items-center justify-center shrink-0 shadow-lg cursor-pointer">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                </button>
            </form>
        </div>
    </div>
    `;

    document.body.insertAdjacentHTML('beforeend', botHtml);

    // Elements
    const trigger = document.getElementById('imicrobAvatarBtn');
    const modal = document.getElementById('imicrobChatModal');
    const bubble = document.getElementById('imicrobBotSpeechBubble');
    const closeBubble = document.getElementById('closeBubbleBtn');
    const closeModal = document.getElementById('closeModalBtn');
    const clearBtn = document.getElementById('clearBtn');
    const voiceBtn = document.getElementById('voiceToggleBtn');
    const voiceIcon = document.getElementById('voiceIcon');
    const stopSpeakBtn = document.getElementById('stopSpeakBtn');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const messagesArea = document.getElementById('messagesArea');
    const chipsArea = document.getElementById('quickChipsArea');
    const speakingBar = document.getElementById('speakingBar');

    function toggleChat() {
        isOpen = !isOpen;
        if (isOpen) {
            modal.classList.remove('translate-y-full', 'opacity-0', 'pointer-events-none');
            modal.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
            if (bubble) bubble.classList.add('hidden');
            chatInput?.focus();
            if (messagesArea.children.length === 0) renderWelcome();
        } else {
            modal.classList.add('translate-y-full', 'opacity-0', 'pointer-events-none');
            modal.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
            stopSpeech();
        }
    }

    function renderWelcome() {
        messagesArea.innerHTML = `
            <div class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm">🔬</div>
                <div class="flex-1 bg-slate-900 border border-cyan-500/30 rounded-2xl p-3.5 shadow-lg text-slate-200 text-xs">
                    <p class="font-bold text-cyan-300 mb-1">น้อง i-MicroB พร้อมช่วยในห้องแล็บเสมือนจริงเนี่ยฮิ! 🧫✨</p>
                    <p class="mb-2">สวัสดีฮิ! น้องเป็น AI ผู้ช่วยประจำวิชา <strong>4011111 ฟิสิกส์สำหรับจุลชีววิทยา</strong> ถามเรื่องการใช้เครื่องมือ 3D, สูตรฟิสิกส์ หรือผลการทดลองได้เลยฮิ!</p>
                </div>
            </div>
        `;
        renderChips();
    }

    function renderChips() {
        const chips = QUICK_CHIPS[currentLang] || QUICK_CHIPS.th;
        chipsArea.innerHTML = chips.map(c => `
            <button type="button" class="px-2.5 py-1 rounded-xl bg-slate-800 hover:bg-cyan-500/20 text-cyan-200 border border-cyan-500/30 whitespace-nowrap text-[11px] shrink-0" data-q="${c.q}">
                ${c.label}
            </button>
        `).join('');

        chipsArea.querySelectorAll('button').forEach(btn => {
            btn.onclick = () => {
                chatInput.value = btn.getAttribute('data-q');
                submitChat();
            };
        });
    }

    function stopSpeech() {
        if ('speechSynthesis' in window) window.speechSynthesis.cancel();
        if (speakingBar) speakingBar.classList.add('hidden');
    }

    function speak(text) {
        if (!isVoiceEnabled || !('speechSynthesis' in window)) return;
        stopSpeech();
        const clean = text.replace(/[*_#`\$\\]/g, ' ').replace(/\n+/g, ' ');
        const utter = new SpeechSynthesisUtterance(clean);
        utter.lang = 'th-TH';
        utter.rate = 1.05;
        utter.pitch = 1.15;
        speakingBar.classList.remove('hidden');
        utter.onend = () => speakingBar.classList.add('hidden');
        utter.onerror = () => speakingBar.classList.add('hidden');
        window.speechSynthesis.speak(utter);
    }

    async function submitChat() {
        const q = chatInput.value.trim();
        if (!q) return;
        chatInput.value = '';
        stopSpeech();

        // Append user msg
        messagesArea.insertAdjacentHTML('beforeend', `
            <div class="flex items-start justify-end gap-2.5">
                <div class="max-w-[85%] bg-gradient-to-r from-cyan-600 to-teal-600 text-white rounded-2xl p-3 text-xs">
                    ${q.replace(/</g, '&lt;')}
                </div>
                <div class="w-8 h-8 rounded-xl bg-slate-800 border border-white/10 flex items-center justify-center shrink-0 text-sm">🧑‍🎓</div>
            </div>
        `);
        messagesArea.scrollTop = messagesArea.scrollHeight;

        // Typing indicator
        const tid = 't_' + Date.now();
        messagesArea.insertAdjacentHTML('beforeend', `
            <div id="${tid}" class="flex items-start gap-2.5">
                <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm">🔬</div>
                <div class="bg-slate-900 border border-cyan-500/30 rounded-2xl px-4 py-2.5 text-cyan-300 text-xs">น้อง i-MicroB กำลังคิดคำตอบเนี่ยฮิ...</div>
            </div>
        `);
        messagesArea.scrollTop = messagesArea.scrollHeight;

        try {
            const resp = await fetch(API_ENDPOINT, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ q: q, lang: currentLang })
            });
            const data = await resp.json();
            document.getElementById(tid)?.remove();

            const reply = data.reply || 'ขออภัยฮิ ไม่พบข้อมูล';
            let formatted = reply.replace(/\*\*(.*?)\*\*/g, '<strong class="text-cyan-300 font-bold">$1</strong>')
                                 .replace(/\n/g, '<br>');

            messagesArea.insertAdjacentHTML('beforeend', `
                <div class="flex items-start gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-400/40 flex items-center justify-center shrink-0 text-sm">🔬</div>
                    <div class="flex-1 bg-slate-900 border border-cyan-500/30 rounded-2xl p-3.5 shadow-lg text-slate-200 text-xs leading-relaxed">
                        <div>${formatted}</div>
                    </div>
                </div>
            `);
            messagesArea.scrollTop = messagesArea.scrollHeight;
            speak(reply);
        } catch (e) {
            document.getElementById(tid)?.remove();
            messagesArea.insertAdjacentHTML('beforeend', `
                <div class="bg-rose-950/60 border border-rose-500/30 rounded-2xl p-3 text-rose-200 text-xs">
                    เกิดข้อผิดพลาดในการเชื่อมต่อเนี่ยฮิ!
                </div>
            `);
            messagesArea.scrollTop = messagesArea.scrollHeight;
        }
    }

    // Bindings
    trigger.onclick = toggleChat;
    bubble.onclick = toggleChat;
    closeBubble.onclick = (e) => { e.stopPropagation(); bubble.classList.add('hidden'); };
    closeModal.onclick = toggleChat;
    clearBtn.onclick = () => { messagesArea.innerHTML = ''; renderWelcome(); stopSpeech(); };
    stopSpeakBtn.onclick = stopSpeech;
    voiceBtn.onclick = () => {
        isVoiceEnabled = !isVoiceEnabled;
        localStorage.setItem('imicrob_bot_voice_enabled', isVoiceEnabled ? 'true' : 'false');
        voiceIcon.className = isVoiceEnabled ? 'fa-solid fa-volume-high' : 'fa-solid fa-volume-xmark text-rose-400';
        if (!isVoiceEnabled) stopSpeech();
    };
    chatForm.onsubmit = (e) => { e.preventDefault(); submitChat(); };

    // Auto welcome popup
    setTimeout(() => {
        if (!isOpen && bubble) bubble.classList.remove('hidden');
    }, 3000);
})();

