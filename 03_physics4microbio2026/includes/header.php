<!DOCTYPE html>
<html lang="th" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Physics for Microbiology 2026'; ?> | Bio-Digital AI Lab</title>
    
    <!-- Frameworks -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#f97316',
                        secondary: '#3b82f6',
                        accent: '#10b981',
                        dark: '#1e293b',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts: Prompt & Sarabun for pristine Thai typography, Outfit & Inter for numerals & Latin -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&family=Sarabun:wght@300;400;500;600;700&family=Outfit:wght@400;600;700;800&family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="<?php echo $basePath ?? ''; ?>css/style.css">
    
    <!-- MathJax for Equations -->
    <script>
        window.MathJax = {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']],
                processEscapes: true,
                processEnvironments: true
            },
            options: {
                skipHtmlTags: ['script', 'noscript', 'style', 'textarea', 'pre']
            }
        };
    </script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    
    <style>
        :root {
            --primary: #f97316;
            --secondary: #3b82f6;
            --dark-bg: #0b1120;
        }

        body {
            font-family: 'Prompt', 'Sarabun', 'Inter', sans-serif;
            background-color: var(--dark-bg);
            color: #f1f5f9;
            letter-spacing: normal !important;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Prompt', 'Outfit', sans-serif;
            letter-spacing: normal !important;
        }

        .glass-nav {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .lang-block { display: none; }
        .lang-th .lang-block[lang="th"] { display: inline; }
        .lang-en .lang-block[lang="en"] { display: inline; }
        .lang-zh .lang-block[lang="zh"] { display: inline; }
        div.lang-block { display: none; }
        .lang-th div.lang-block[lang="th"] { display: block; }
        .lang-en div.lang-block[lang="en"] { display: block; }
        .lang-zh div.lang-block[lang="zh"] { display: block; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #10b981; }
    </style>
</head>
<?php
// Detect current language from preference or filename
$currentLang = $_GET['lang'] ?? 'th'; // Default
$currentFilename = basename($_SERVER['PHP_SELF']);
if (strpos($currentFilename, '_en.php') !== false) $currentLang = 'en';
elseif (strpos($currentFilename, '_zh.php') !== false) $currentLang = 'zh';
?>
<body class="lang-<?php echo $currentLang; ?> pt-32 pb-16 min-h-screen">

<nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[96%] max-w-7xl glass-nav rounded-2xl px-5 py-3 shadow-2xl">
    <div class="flex items-center justify-between gap-2">
        <!-- Logo (Links back to Master Unified Course Portal) -->
        <a href="<?php echo $basePath ?? ''; ?>../index.php" class="flex items-center space-x-3 group" title="กลับหน้าพอร์ทัลหลัก 4011111 ฟิสิกส์สำหรับจุลชีววิทยา">
            <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 via-teal-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform text-slate-950 font-bold">
                <i class="fas fa-microscope text-lg"></i>
            </div>
            <div>
                <span class="block text-sm font-bold tracking-wider text-white group-hover:text-cyan-300 transition-colors">PHYSICS 2027</span>
                <span class="block text-[10px] text-emerald-400 uppercase tracking-widest leading-none">RBRU Microbiology</span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-1">
            <a href="<?php echo $basePath ?? ''; ?>../index.php" class="px-3.5 py-2 text-xs font-semibold text-gray-300 hover:text-cyan-400 transition-colors rounded-xl hover:bg-white/5 flex items-center gap-1.5" title="พอร์ทัลรวมหลักสูตร">
                <i class="fa-solid fa-house text-cyan-400"></i>
                <span>พอร์ทัลหลัก</span>
            </a>
            
            <!-- Chapters Dropdown -->
            <div class="relative group py-2">
                <a href="<?php echo $basePath ?? ''; ?>index.php" class="px-3.5 py-2 text-xs font-semibold text-gray-300 group-hover:text-amber-400 flex items-center space-x-1 transition-colors rounded-xl hover:bg-white/5">
                    <i class="fa-solid fa-book-open text-amber-400"></i>
                    <span>13 บทเรียน</span>
                    <i class="fas fa-chevron-down text-[10px] ml-1 opacity-50"></i>
                </a>
                <div class="absolute top-full left-0 w-72 bg-slate-900/95 backdrop-blur-xl border border-white/10 rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all shadow-2xl -translate-y-2 group-hover:translate-y-1 z-50">
                    <div class="grid grid-cols-1 gap-1 max-h-[420px] overflow-y-auto pr-1">
                        <?php 
                        $navModules = [
                            ['01', 'ระบบหน่วยและการวัดระดับจุลภาค', 'ch01_th.php'],
                            ['02', 'เวกเตอร์และแรงในระบบชีวภาพ', 'ch02_th.php'],
                            ['03', 'จลนศาสตร์และความหนืดของของไหล', 'ch03_th.php'],
                            ['04', 'กฎของนิวตันและเครื่องปั่นเหวี่ยง', 'ch04_th.php'],
                            ['05', 'โมเมนตัม การดล และการชนในระดับเซลล์', 'ch05_th.php'],
                            ['06', 'สมดุลกล ความดันของไหล และออสโมซิส', 'ch06_th.php'],
                            ['07', 'งาน พลังงาน และมอเตอร์โมเลกุล', 'ch07_th.php'],
                            ['08', 'การหมุนและกลศาสตร์นาโนของแฟลกเจลลา', 'ch08_th.php'],
                            ['09', 'อุณหพลศาสตร์และ PCR Thermocycler', 'ch09_th.php'],
                            ['10', 'ไฟฟ้าและเจลอิเล็กโทรโฟรีซิส', 'ch10_th.php'],
                            ['11', 'ทัศนศาสตร์ กล้อง 100x และสเปกโทรฯ', 'ch11_th.php'],
                            ['12', 'ฟิสิกส์นิวเคลียร์และรังสีทำลายเชื้อ', 'ch12_th.php'],
                            ['13', 'โครงงานจุลชีววิทยาอัจฉริยะ (Capstone)', 'ch13_th.php'],
                        ];
                        foreach($navModules as $nm):
                        ?>
                        <a href="<?php echo $basePath ?? ''; ?>chapters/<?php echo $nm[2]; ?>" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-amber-500/10 transition-colors group/item">
                            <span class="w-7 h-7 rounded-lg bg-slate-800 flex items-center justify-center text-xs font-bold text-amber-400 group-hover/item:bg-amber-500 group-hover/item:text-slate-950"><?php echo $nm[0]; ?></span>
                            <span class="block text-xs font-medium text-slate-200 group-hover/item:text-white truncate"><?php echo $nm[1]; ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Labs Dropdown -->
            <div class="relative group py-2">
                <a href="<?php echo $basePath ?? ''; ?>../virtual_lab/index.html" class="px-3.5 py-2 text-xs font-semibold text-gray-300 group-hover:text-emerald-400 flex items-center space-x-1 transition-colors rounded-xl hover:bg-white/5">
                    <i class="fa-solid fa-flask text-emerald-400"></i>
                    <span>12 ปฏิบัติการ</span>
                    <i class="fas fa-chevron-down text-[10px] ml-1 opacity-50"></i>
                </a>
                <div class="absolute top-full left-0 w-80 bg-slate-900/95 backdrop-blur-xl border border-white/10 rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all shadow-2xl -translate-y-2 group-hover:translate-y-1 z-50">
                    <div class="grid grid-cols-1 gap-1 max-h-[420px] overflow-y-auto pr-1">
                        <?php 
                        $navLabs = [
                            ['01', 'การวัดละเอียด & สอบเทียบไมโครปิเปต', 'lab01_measurement.php'],
                            ['02', 'เวกเตอร์และแรงในระบบชีวภาพ', 'lab02_vectors.php'],
                            ['03', 'จลนศาสตร์ ความหนืด & กฎสโตกส์', 'lab03_motion.php'],
                            ['04', 'กฎนิวตันและการปั่นเหวี่ยง Centrifuge', 'lab04_newton.php'],
                            ['05', 'โมเมนตัมและการชนระดับเซลล์ Lysis', 'lab05_momentum.php'],
                            ['06', 'สมดุลกล ความดัน & ปรากฏการณ์ออสโมซิส', 'lab06_equilibrium.php'],
                            ['07', 'งาน พลังงาน & ATP Synthase', 'lab07_energy.php'],
                            ['08', 'การหมุนและกลศาสตร์นาโนแฟลกเจลลา', 'lab08_machines.php'],
                            ['09', 'อุณหพลศาสตร์และ PCR Thermal Cycler', 'lab09_heat.php'],
                            ['10', 'ไฟฟ้า & เจลอิเล็กโทรโฟเรซิส', 'lab10_electricity.php'],
                            ['11', 'ทัศนศาสตร์ กล้อง 100x Oil & OD600', 'lab11_optics.php'],
                            ['12', 'ฟิสิกส์นิวเคลียร์ & รังสีทำลายเชื้อ', 'lab12_radioactivity.php'],
                        ];
                        foreach($navLabs as $nl):
                        ?>
                        <a href="<?php echo $basePath ?? ''; ?>labs/<?php echo $nl[2]; ?>" class="flex items-center space-x-3 p-2.5 rounded-xl hover:bg-emerald-500/10 transition-colors group/item">
                            <span class="w-7 h-7 rounded-lg bg-slate-800 flex items-center justify-center text-xs font-bold text-emerald-400 group-hover/item:bg-emerald-500 group-hover/item:text-slate-950">L<?php echo $nl[0]; ?></span>
                            <span class="block text-xs font-medium text-slate-200 group-hover/item:text-white truncate"><?php echo $nl[1]; ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Virtual Lab Hub -->
            <a href="<?php echo $basePath ?? ''; ?>../virtual_lab/index.html" class="px-3.5 py-2 text-xs font-semibold text-gray-300 hover:text-cyan-400 transition-colors rounded-xl hover:bg-white/5 flex items-center gap-1.5" title="ห้องแล็บ 3D เสมือนจริง">
                <i class="fa-solid fa-cubes text-cyan-400"></i>
                <span>Virtual Lab Hub</span>
            </a>

            <!-- 3D WebAR Scanner -->
            <a href="<?php echo $basePath ?? ''; ?>webar/ar_aruco_textbook.html?ar=1" target="_blank" class="px-3.5 py-2 text-xs font-semibold text-gray-300 hover:text-purple-400 transition-colors rounded-xl hover:bg-white/5 flex items-center gap-1.5" title="ส่องมาร์กเกอร์ ArUco ในหนังสือ">
                <i class="fa-solid fa-camera-rotate text-purple-400"></i>
                <span>3D WebAR</span>
            </a>
        </div>

        <!-- Language & Admin Action -->
        <div class="flex items-center space-x-3">
            <a href="<?php echo $basePath ?? ''; ?>../admin/index.php" class="px-3 py-1.5 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold text-xs shadow-md transition flex items-center gap-1.5" title="เข้าสู่ระบบอาจารย์ผู้สอน">
                <i class="fa-solid fa-user-shield"></i>
                <span class="hidden sm:inline">อาจารย์</span>
            </a>
            <div class="flex items-center bg-white/5 rounded-xl p-1 border border-white/10">
                <button onclick="handleLangChange('th')" class="lang-btn w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-th">TH</button>
                <button onclick="handleLangChange('en')" class="lang-btn w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-en">EN</button>
                <button onclick="handleLangChange('zh')" class="lang-btn w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-zh">ZH</button>
            </div>
            <button class="lg:hidden w-8 h-8 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-white">
                <i class="fas fa-bars text-xs"></i>
            </button>
        </div>
    </div>
</nav>
                <button onclick="handleLangChange('en')" class="lang-btn w-8 h-8 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-en">EN</button>
                <button onclick="handleLangChange('zh')" class="lang-btn w-8 h-8 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-zh">ZH</button>
            </div>
            
            <button class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<?php
// Load translations for JS use
$transData = file_get_contents(($basePath ?? '') . 'data/translations.json');
?>

<script>
const translations = <?php echo $transData; ?>;

function setLang(lang) {
    // 1. Update Body Class
    document.body.className = 'lang-' + lang;
    
    // 2. Update Language Buttons
    document.querySelectorAll('.lang-btn').forEach(btn => {
        btn.classList.remove('bg-orange-600', 'text-white');
        if(btn.id === 'btn-' + lang) btn.classList.add('bg-orange-600', 'text-white');
    });

    // Save Preference
    localStorage.setItem('pref_lang', lang);
}

function handleLangChange(lang) {
    const path = window.location.pathname;
    const filename = path.split('/').pop();
    
    // If it's a standalone file (chXX_en.php etc), redirect to the same language version
    // But if it's a master file (chXX_XX.php), just toggle the view
    const standaloneMatch = filename.match(/ch(\d+)_(th|en|zh)\.php/);
    if (standaloneMatch) {
        const chNum = standaloneMatch[1];
        window.location.href = `ch${chNum}_${lang}.php`;
    } else {
        setLang(lang);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // Detect language from body class first (if set by server)
    let currentLang = 'th';
    if (document.body.classList.contains('lang-en')) currentLang = 'en';
    else if (document.body.classList.contains('lang-zh')) currentLang = 'zh';
    else currentLang = localStorage.getItem('pref_lang') || 'th';
    
    setLang(currentLang);
});
</script>
