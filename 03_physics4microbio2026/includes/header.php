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
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500;600&family=Sarabun:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            --dark-bg: #1e293b;
        }

        body {
            font-family: 'Inter', 'Sarabun', sans-serif;
            background-color: var(--dark-bg);
            color: #f1f5f9;
        }

        h1, h2, h3, .font-heading {
            font-family: 'Outfit', sans-serif;
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
<body class="lang-<?php echo $currentLang; ?> pt-28">

<nav class="fixed top-6 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-6xl glass-nav rounded-2xl px-6 py-3 shadow-2xl">
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <a href="<?php echo $basePath ?? ''; ?>index.php" class="flex items-center space-x-3 group">
            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                <i class="fas fa-atom text-white text-xl animate-spin-slow"></i>
            </div>
            <div class="hidden md:block">
                <span class="block text-sm font-bold tracking-wider text-white">PHYSICS 2026</span>
                <span class="block text-[10px] text-emerald-400 uppercase tracking-widest leading-none">Microbiology</span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-1">
            <a href="<?php echo $basePath ?? ''; ?>index.php" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-emerald-400 transition-colors rounded-xl hover:bg-white/5">
                <span class="lang-block" lang="th">หน้าแรก</span>
                <span class="lang-block" lang="en">Home</span>
                <span class="lang-block" lang="zh">首页</span>
            </a>
            
            <div class="relative group py-2">
                <button class="px-4 py-2 text-sm font-medium text-gray-300 group-hover:text-emerald-400 flex items-center space-x-1 transition-colors">
                    <span class="lang-block" lang="th">บทเรียน</span>
                    <span class="lang-block" lang="en">Chapters</span>
                    <span class="lang-block" lang="zh">章节</span>
                    <i class="fas fa-chevron-down text-[10px] ml-1 opacity-50"></i>
                </button>
                <div class="absolute top-full left-0 w-64 bg-slate-900/95 backdrop-blur-xl border border-white/10 rounded-2xl p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all shadow-2xl -translate-y-2 group-hover:translate-y-1">
                    <div class="grid grid-cols-1 gap-1 max-h-[400px] overflow-y-auto pr-1">
                        <?php 
                        $navModules = [
                            ['01', 'Unit Systems', 'ระบบหน่วย', '01'],
                            ['02', 'Vectors', 'เวกเตอร์', '02'],
                            ['03', 'Motion', 'การเคลื่อนที่', '03'],
                            ['04', 'Newton\'s Laws', 'กฎนิวตัน', '04'],
                            ['05', 'Momentum', 'โมเมนตัม', '05'],
                            ['06', 'Equilibrium', 'สมดุล', '06'],
                            ['07', 'Work & Energy', 'งานและพลังงาน', '07'],
                            ['08', 'Simple Machines', 'เครื่องกล', '08'],
                            ['09', 'Thermodynamics', 'อุณหพลศาสตร์', '09'],
                            ['10', 'Electricity', 'ไฟฟ้า', '10'],
                            ['11', 'Optics', 'ทัศนศาสตร์', '11'],
                            ['12', 'Radioactivity', 'กัมมันตภาพรังสี', '12'],
                            ['13', 'Modern Microbio', 'จุลชีววิทยาฯ', '13'],
                        ];
                        foreach($navModules as $nm):
                            // Point to Master file for dropdown as well
                            $targetFile = "ch" . $nm[3] . "_" . $nm[3] . ".php";
                        ?>
                        <a href="<?php echo $basePath ?? ''; ?>chapters/<?php echo $targetFile; ?>" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-emerald-500/10 transition-colors group/item">
                            <span class="w-8 h-8 rounded-lg bg-slate-800 flex items-center justify-center text-xs font-bold text-emerald-400 group-hover/item:bg-emerald-500 group-hover/item:text-white"><?php echo $nm[0]; ?></span>
                            <div>
                                <span class="block text-xs font-semibold text-white"><?php echo $nm[1]; ?></span>
                                <span class="block text-[10px] text-gray-400"><?php echo $nm[2]; ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <a href="#" class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-emerald-400 transition-colors rounded-xl hover:bg-white/5">
                <span class="lang-block" lang="th">ติดต่อ</span>
                <span class="lang-block" lang="en">Contact</span>
                <span class="lang-block" lang="zh">联系</span>
            </a>
        </div>

        <!-- Language & Action -->
        <div class="flex items-center space-x-4">
            <div class="flex items-center bg-white/5 rounded-xl p-1 border border-white/10">
                <button onclick="handleLangChange('th')" class="lang-btn w-8 h-8 rounded-lg flex items-center justify-center text-[10px] font-bold transition-all hover:bg-white/10" id="btn-th">TH</button>
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
