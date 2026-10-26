<?php
/**
 * FUI Cybernetic & Deep Learning Design System Master Showcase
 * Course: 4011111 Physics for Microbiology (ฟิสิกส์สำหรับจุลชีววิทยา 2026/2027)
 * Faculty of Science and Technology, Rambhai Barni Rajabhat University
 * Instructor: Asst. Prof. Dr. Chewa Thassana (ผศ.ดร.ชีวะ ทัศนา)
 */

$pageTitle = "FUI Cybernetic & Deep Learning UI/UX Design System Showcase";
?>
<!DOCTYPE html>
<html lang="th" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> | RBRU 2026/2027</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700;800&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fui_cyber_theme.css">
    <style>
        body { font-family: 'Prompt', sans-serif; background: #020617; }
        code, pre, .font-mono { font-family: 'JetBrains Mono', monospace; }
        .font-tech { font-family: 'Orbitron', sans-serif; }
        
        /* Grid Canvas Ambient */
        .bg-cyber-grid {
            background-image: 
                radial-gradient(rgba(56, 189, 248, 0.15) 1px, transparent 1px),
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 32px 32px, 32px 32px, 32px 32px;
        }

        /* Scanline Overlay */
        .scanline-effect::after {
            content: " ";
            display: block;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.03), rgba(0, 255, 0, 0.01), rgba(0, 0, 255, 0.03));
            z-index: 20;
            background-size: 100% 3px, 6px 100%;
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>
<body class="text-slate-100 min-h-screen selection:bg-cyan-500 selection:text-slate-950 relative overflow-x-hidden bg-cyber-grid scanline-effect">

    <!-- Ambient Glowing Orbs -->
    <div class="fixed top-0 left-1/4 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
    <div class="fixed top-1/3 right-10 w-[550px] h-[550px] bg-amber-600/10 rounded-full blur-[160px] pointer-events-none -z-10"></div>
    <div class="fixed bottom-10 left-1/3 w-[700px] h-[700px] bg-emerald-600/10 rounded-full blur-[180px] pointer-events-none -z-10"></div>

    <!-- ─── TOP NAVIGATION BAR ────────────────────────────────────────────────── -->
    <nav class="sticky top-0 z-50 bg-slate-950/85 backdrop-blur-xl border-b border-cyan-500/20 shadow-lg shadow-cyan-950/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-500 to-amber-500 p-0.5 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                    <div class="w-full h-full bg-slate-950 rounded-[10px] flex items-center justify-center">
                        <i class="fas fa-microchip text-cyan-400 text-lg"></i>
                    </div>
                </div>
                <div>
                    <span class="font-tech text-xs tracking-widest text-cyan-400 block font-bold">FUI DESIGN SYSTEM 2026/2027</span>
                    <h1 class="font-bold text-sm text-white">ระบบเลย์เอาต์ Sci-Fi HUD &amp; AI Deep Learning</h1>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="flex items-center gap-2 text-xs font-mono">
                <a href="index.php" class="px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-700 hover:border-cyan-400 text-slate-300 transition-colors">
                    <i class="fas fa-home mr-1 text-cyan-400"></i> พอร์ทัลหลัก
                </a>
                <a href="admin/index.php" class="px-3 py-1.5 rounded-lg bg-slate-900 border border-slate-700 hover:border-amber-400 text-slate-300 transition-colors">
                    <i class="fas fa-shield-alt mr-1 text-amber-400"></i> แผงแอดมิน
                </a>
                <a href="03_physics4microbio2026/index.php" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 border border-cyan-400/40 text-cyan-300 transition-colors font-bold">
                    <i class="fas fa-book-open mr-1"></i> 12 บทเรียน
                </a>
            </div>
        </div>
    </nav>

    <!-- ─── HERO HEADER ──────────────────────────────────────────────────────── -->
    <header class="py-12 border-b border-slate-800 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono bg-cyan-500/10 text-cyan-300 border border-cyan-500/30">
                <i class="fas fa-terminal"></i> CYBERNETIC BIOPHYSICS &bull; USER INTERFACE SPECIFICATION
            </span>
            <h2 class="text-3xl md:text-5xl font-black tracking-tight text-white font-tech">
                FUTURISTIC HUD &amp; AI DEEP LEARNING LAYOUTS
            </h2>
            <p class="max-w-3xl mx-auto text-sm md:text-base text-slate-300 font-light leading-relaxed">
                การจำลองเลย์เอาต์ตามภาพแม่แบบทั้ง 5 สไตล์ เพื่อยกระดับเว็บพอร์ทัล, ระบบหลังบ้านอาจารย์, เอกสารคำสอน 13 บทเรียน และห้องปฏิบัติการ 3D WebAR สู่มาตรฐานล้ำสมัยระดับสากล
            </p>

            <!-- Quick Jump Badges -->
            <div class="flex flex-wrap justify-center gap-2 pt-2 text-xs font-mono">
                <a href="#style1" class="px-3 py-1.5 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-300 hover:bg-amber-500/20 transition-all">
                    #1 Cybernetic Cards (Amber HUD)
                </a>
                <a href="#style2" class="px-3 py-1.5 rounded-lg bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 hover:bg-cyan-500/20 transition-all">
                    #2 Glassmorphism Viewport (Cyan HUD)
                </a>
                <a href="#style3" class="px-3 py-1.5 rounded-lg bg-blue-500/10 border border-blue-500/30 text-blue-300 hover:bg-blue-500/20 transition-all">
                    #3 Telemetry &amp; Student Dashboard
                </a>
                <a href="#style4" class="px-3 py-1.5 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 hover:bg-emerald-500/20 transition-all">
                    #4 Central Command &amp; Digital Twin
                </a>
                <a href="#style5" class="px-3 py-1.5 rounded-lg bg-violet-500/10 border border-violet-500/30 text-violet-300 hover:bg-violet-500/20 transition-all">
                    #5 AI Neural Core &amp; Deep Learning
                </a>
            </div>
        </div>
    </header>

    <!-- ─── MAIN CONTENT SHOWCASE ────────────────────────────────────────────── -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 1: MODULAR CYBERNETIC CARD (AMBER / GOLD HUD) [IMAGE 1]
             ══════════════════════════════════════════════════════════════════════════ -->
        <section id="style1" class="space-y-6">
            <div class="flex items-center justify-between border-b border-amber-500/30 pb-3">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-amber-500/20 border border-amber-500/40 text-amber-400 font-mono font-bold flex items-center justify-center text-sm">01</span>
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white font-tech">MODULAR CYBERNETIC CARDS (AMBER HUD)</h3>
                        <p class="text-xs text-amber-400/80 font-mono">แม่แบบภาพที่ 1: ขอบตัด 45°, แถบระบายความร้อน (Tech Vents), โคมไฟเรืองแสงด้านบน, ไฟจุดสถานะ</p>
                    </div>
                </div>
                <span class="hidden md:inline-block px-3 py-1 rounded bg-amber-500/10 text-amber-300 font-mono text-xs border border-amber-500/30">
                    นำไปใช้กับ: Anchor Boxes &bull; Biosafety Warning &bull; Admin Stats
                </span>
            </div>

            <!-- Grid of 3 variations matching Image 1 -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- 1A: Instrument Anchor Card -->
                <div class="fui-card-amber p-6 space-y-4">
                    <div class="flex justify-between items-start pt-2">
                        <span class="px-2.5 py-1 rounded bg-amber-500/20 border border-amber-500/40 text-amber-300 font-mono text-[11px] font-bold">
                            SYS-01 &bull; MICROPETTE P1000
                        </span>
                        <div class="fui-dot-matrix">
                            <span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">เครื่องดูดจ่ายสารอัตโนมัติ (P1000)</h4>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                            การสอบเทียบปริมาตร $100\text{--}1,000\ \mu\text{L}$ ด้วยสมการความหนาแน่น $\rho = m/V$ และค่าแรงตึงผิวในของเหลวหนืด
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-black/60 border border-amber-500/30 font-mono text-xs space-y-1">
                        <div class="flex justify-between text-slate-400">
                            <span>ช่วงการวัด:</span>
                            <span class="text-amber-400 font-bold">100 - 1000 &mu;L</span>
                        </div>
                        <div class="flex justify-between text-slate-400">
                            <span>ความคลาดเคลื่อน (&plusmn;):</span>
                            <span class="text-emerald-400 font-bold">&lt; 0.8%</span>
                        </div>
                    </div>
                    <!-- Bottom vent bar & triangle corner -->
                    <div class="flex justify-between items-center pt-2">
                        <div class="w-24 h-3 fui-vent-stripes rounded-sm"></div>
                        <i class="fas fa-play text-amber-400 text-xs"></i>
                    </div>
                </div>

                <!-- 1B: Biosafety Hazard Warning Card -->
                <div class="fui-card-amber p-6 space-y-4">
                    <div class="flex justify-between items-start pt-2">
                        <span class="px-2.5 py-1 rounded bg-red-500/20 border border-red-500/40 text-red-300 font-mono text-[11px] font-bold">
                            <i class="fas fa-biohazard mr-1 text-amber-400"></i> BIOSAFETY ALERT: BSL-2
                        </span>
                        <div class="fui-dot-matrix">
                            <span style="background:#ef4444;"></span>
                            <span style="background:#ef4444;"></span>
                            <span style="background:#ef4444;"></span>
                            <span></span><span></span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">ข้อควรระวังการปั่นเหวี่ยง</h4>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                            ต้องจัดสมดุลหลอดทดลองตรงข้าม ($\sum \vec{F}_c = \vec{0}$) เสมอ หากน้ำหนักต่างกันเกิน $0.1\text{ g}$ โรเตอร์จะเกิดการเหวี่ยงรุนแรงและแตกกระจาย
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-black/60 border border-amber-500/30 font-mono text-xs space-y-1">
                        <div class="flex justify-between text-slate-400">
                            <span>แรงจีสูงสุด (RCF):</span>
                            <span class="text-red-400 font-bold">15,000 &times; g</span>
                        </div>
                        <div class="flex justify-between text-slate-400">
                            <span>ความเร็วรอบ (RPM):</span>
                            <span class="text-amber-400 font-bold">14,000 RPM</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <div class="w-32 h-3 fui-vent-stripes rounded-sm"></div>
                        <span class="text-[10px] font-mono text-amber-400/80">BSL-SECURE</span>
                    </div>
                </div>

                <!-- 1C: Admin System Metric Card -->
                <div class="fui-card-amber p-6 space-y-4">
                    <div class="flex justify-between items-start pt-2">
                        <span class="px-2.5 py-1 rounded bg-amber-500/20 border border-amber-500/40 text-amber-300 font-mono text-[11px] font-bold">
                            TELEMETRY &bull; COURSE COMPLETION
                        </span>
                        <div class="fui-dot-matrix">
                            <span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-white">สถิติการส่งรายงาน 12 แล็บ</h4>
                        <p class="text-xs text-slate-300 mt-1 leading-relaxed">
                            นักศึกษาบันทึกผลการทดลองผ่านระบบ SQLite Backend และผ่านการตรวจประเมินแบบ OBE
                        </p>
                    </div>
                    <div class="space-y-2 pt-1 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-400">อัตราการส่งงานรวม:</span>
                            <span class="text-amber-400 font-bold">92.4%</span>
                        </div>
                        <div class="w-full h-2 rounded bg-slate-800 overflow-hidden border border-amber-500/30">
                            <div class="h-full bg-gradient-to-r from-amber-500 to-yellow-300 w-[92.4%]"></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <div class="w-20 h-3 fui-vent-stripes rounded-sm"></div>
                        <span class="text-[10px] font-mono text-emerald-400 font-bold">ONLINE &bull; SYNCED</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 2: HOLOGRAPHIC GLASS VIEWPORT (CYAN / TEAL HUD) [IMAGE 2]
             ══════════════════════════════════════════════════════════════════════════ -->
        <section id="style2" class="space-y-6">
            <div class="flex items-center justify-between border-b border-cyan-500/30 pb-3">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-cyan-500/20 border border-cyan-500/40 text-cyan-400 font-mono font-bold flex items-center justify-center text-sm">02</span>
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white font-tech">HOLOGRAPHIC GLASS VIEWPORT (CYAN HUD)</h3>
                        <p class="text-xs text-cyan-400/80 font-mono">แม่แบบภาพที่ 2: หน้าต่างกระจกสะท้อนเงา, Dot Matrix Grid, ลำแสงเรืองแสงบน-ล่าง, เรดาร์ขวาบน</p>
                    </div>
                </div>
                <span class="hidden md:inline-block px-3 py-1 rounded bg-cyan-500/10 text-cyan-300 font-mono text-xs border border-cyan-500/30">
                    นำไปใช้กับ: 3D Virtual Lab Viewport &bull; WebAR Scanner Frame &bull; E-Report Modal
                </span>
            </div>

            <!-- Viewport Showcase Component -->
            <div class="fui-viewport-cyan fui-grid-matrix p-6 md:p-8 min-h-[420px] flex flex-col justify-between relative">
                <!-- Diagonal glass sheen -->
                <div class="fui-glass-sheen"></div>
                <!-- Glowing flare beams -->
                <div class="fui-flare-beam top w-3/4"></div>
                <div class="fui-flare-beam bottom w-1/2"></div>

                <!-- Viewport Top Bar -->
                <div class="flex justify-between items-start relative z-10">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 bg-cyan-400 rounded-sm inline-block shadow-lg shadow-cyan-400"></span>
                            <span class="font-tech text-xs tracking-widest text-cyan-300 font-bold">3D VIRTUAL SIMULATOR VIEWPORT</span>
                        </div>
                        <p class="text-xs font-mono text-slate-400">CAM_01 // RESOLUTION: 1920&times;1080 // FPS: 60.0 // FOV: 45&deg;</p>
                    </div>

                    <!-- Radar crosshair in top right (as in Image 2) -->
                    <div class="relative w-14 h-14 flex items-center justify-center">
                        <div class="absolute inset-0 border-2 border-dashed border-cyan-400 rounded-full animate-spin" style="animation-duration: 10s;"></div>
                        <div class="w-8 h-8 border border-cyan-300 rounded-full"></div>
                        <div class="w-2 h-2 bg-cyan-400 rounded-full"></div>
                    </div>
                </div>

                <!-- Viewport Center: Interactive 3D Canvas Mockup -->
                <div class="my-8 text-center relative z-10 space-y-4">
                    <div class="inline-flex items-center justify-center p-6 rounded-full bg-cyan-950/60 border border-cyan-400/40 shadow-2xl shadow-cyan-500/20 backdrop-blur-md">
                        <i class="fas fa-cube text-5xl text-cyan-300 animate-pulse"></i>
                    </div>
                    <div>
                        <h4 class="text-2xl font-bold text-white font-tech">LAB 11: OPTICS &amp; 100X OIL IMMERSION</h4>
                        <p class="text-xs font-mono text-cyan-200/90 mt-1">
                            Abbe Diffraction Limit: $d = \frac{\lambda}{2\text{NA}} = \frac{550\text{ nm}}{2(1.25)} = 220\text{ nm}$
                        </p>
                    </div>

                    <div class="flex justify-center gap-3 pt-2">
                        <button class="px-5 py-2 rounded-lg bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-xs font-mono transition-all shadow-lg shadow-cyan-500/30 flex items-center gap-2">
                            <i class="fas fa-rotate mr-1"></i> หมุนวัตถุ 360&deg;
                        </button>
                        <button class="px-5 py-2 rounded-lg bg-slate-900/80 hover:bg-slate-800 border border-cyan-500/50 text-cyan-300 font-bold text-xs font-mono transition-all flex items-center gap-2">
                            <i class="fas fa-camera mr-1"></i> ส่องผ่าน WebAR
                        </button>
                    </div>
                </div>

                <!-- Viewport Bottom Controls -->
                <div class="flex justify-between items-end relative z-10 pt-4 border-t border-cyan-500/20 text-xs font-mono text-slate-300">
                    <div class="flex items-center gap-4">
                        <span><strong class="text-cyan-400">POS:</strong> X: 142.8 Y: 98.4 Z: 0.0</span>
                        <span><strong class="text-cyan-400">INDEX $n$:</strong> 1.518 (Type-A Cedarwood Oil)</span>
                    </div>
                    <span class="text-emerald-400 font-bold flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        LIVE WEBAR TELEMETRY
                    </span>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 3: TELEMETRY & STUDENT DASHBOARD [IMAGE 3]
             ══════════════════════════════════════════════════════════════════════════ -->
        <section id="style3" class="space-y-6">
            <div class="flex items-center justify-between border-b border-blue-500/30 pb-3">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-blue-500/20 border border-blue-500/40 text-blue-400 font-mono font-bold flex items-center justify-center text-sm">03</span>
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white font-tech">STUDENT &amp; EXPERIMENT TELEMETRY DASHBOARD</h3>
                        <p class="text-xs text-blue-400/80 font-mono">แม่แบบภาพที่ 3: เรดาร์ประจำตัวบุคคล, กราฟแท่งตัดเฉียง, สไลเดอร์แคปซูลวัดค่า, มาตรวัดเซกเมนต์</p>
                    </div>
                </div>
                <span class="hidden md:inline-block px-3 py-1 rounded bg-blue-500/10 text-blue-300 font-mono text-xs border border-blue-500/30">
                    นำไปใช้กับ: Student E-Portfolio &bull; Lab Live Charts &bull; Admin Evaluation
                </span>
            </div>

            <!-- Dashboard Component (matching Image 3 layout) -->
            <div class="p-6 md:p-8 rounded-3xl bg-slate-900/90 border border-blue-500/40 shadow-2xl relative overflow-hidden space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    
                    <!-- Left: Avatar Radar (Student Profile) -->
                    <div class="md:col-span-3 flex flex-col items-center justify-center p-4 rounded-2xl bg-slate-950/80 border border-blue-500/30 space-y-3">
                        <div class="fui-radar-avatar">
                            <div class="outer-ring"></div>
                            <div class="middle-ring"></div>
                            <div class="core">
                                <i class="fas fa-user-astronaut text-3xl text-cyan-200"></i>
                            </div>
                        </div>
                        <div class="text-center font-mono">
                            <span class="text-xs text-cyan-400 font-bold block">STUDENT ID: 67123456</span>
                            <span class="text-sm font-bold text-white">นศ.สาขาจุลชีววิทยา</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">สถานะ: ผ่าน 10/12 แล็บ</span>
                        </div>
                    </div>

                    <!-- Center: Angled Bar Chart (Spectrophotometry OD600 Growth Curve) -->
                    <div class="md:col-span-6 p-5 rounded-2xl bg-slate-950/80 border border-blue-500/30 space-y-4">
                        <div class="flex justify-between items-center text-xs font-mono">
                            <span class="text-cyan-400 font-bold"><i class="fas fa-chart-simple mr-1.5"></i> กราฟการเจริญเติบโต ($\text{OD}_{600}$ vs Time)</span>
                            <span class="text-slate-400">ช่วงความยาวคลื่น: 600 nm</span>
                        </div>

                        <!-- Bar Graph with beveled container -->
                        <div class="h-32 flex items-end justify-between gap-2 px-2 pt-4 border-b border-slate-700">
                            <!-- Bar 1 -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-cyan-400 rounded-t-sm h-[20%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">0h</span>
                            </div>
                            <!-- Bar 2 -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-cyan-400 rounded-t-sm h-[32%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">2h</span>
                            </div>
                            <!-- Bar 3 -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-rose-400 rounded-t-sm h-[55%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">4h</span>
                            </div>
                            <!-- Bar 4 (Log Phase) -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-amber-400 rounded-t-sm h-[88%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">6h</span>
                            </div>
                            <!-- Bar 5 (Stationary) -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-emerald-400 rounded-t-sm h-[95%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">8h</span>
                            </div>
                            <!-- Bar 6 (Decline) -->
                            <div class="w-full flex flex-col items-center gap-1">
                                <div class="w-full bg-cyan-400 rounded-t-sm h-[70%]"></div>
                                <span class="text-[9px] font-mono text-slate-400">10h</span>
                            </div>
                        </div>

                        <!-- Hazard Stripe Line -->
                        <div class="h-2.5 w-full fui-vent-stripes-cyan rounded-sm opacity-80"></div>
                    </div>

                    <!-- Right: Segmented Progress Levels -->
                    <div class="md:col-span-3 p-4 rounded-2xl bg-slate-950/80 border border-blue-500/30 space-y-3 font-mono text-xs">
                        <span class="text-cyan-400 font-bold block mb-1">SKILL TELEMETRY</span>
                        
                        <div class="space-y-1">
                            <div class="flex justify-between text-[11px]">
                                <span>ความแม่นยำปิเปต</span>
                                <span class="text-emerald-400">98%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-800 rounded">
                                <div class="h-full bg-emerald-400 rounded w-[98%]"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex justify-between text-[11px]">
                                <span>การจัดสมดุล RCF</span>
                                <span class="text-amber-400">85%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-800 rounded">
                                <div class="h-full bg-amber-400 rounded w-[85%]"></div>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <div class="flex justify-between text-[11px]">
                                <span>ความปลอดภัยรังสี</span>
                                <span class="text-cyan-400">92%</span>
                            </div>
                            <div class="w-full h-2 bg-slate-800 rounded">
                                <div class="h-full bg-cyan-400 rounded w-[92%]"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bottom Segmented Sliders (matching Image 3 bottom) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-4 border-t border-slate-800">
                    <div class="space-y-1.5 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-400">อุณหภูมิบ่มเพาะ ($T$):</span>
                            <span class="text-rose-400 font-bold">37.0 &deg;C</span>
                        </div>
                        <div class="fui-capsule-bar">
                            <div class="fui-capsule-fill bg-gradient-to-r from-rose-500 to-amber-500 w-[74%] text-rose-300"></div>
                        </div>
                    </div>

                    <div class="space-y-1.5 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-400">แรงดันไอหม้อนึ่ง ($P$):</span>
                            <span class="text-cyan-400 font-bold">15.0 psi</span>
                        </div>
                        <div class="fui-capsule-bar">
                            <div class="fui-capsule-fill bg-gradient-to-r from-cyan-500 to-blue-500 w-[60%] text-cyan-300"></div>
                        </div>
                    </div>

                    <div class="space-y-1.5 font-mono text-xs">
                        <div class="flex justify-between">
                            <span class="text-slate-400">ความเข้มแสง UV-C:</span>
                            <span class="text-amber-400 font-bold">100 &mu;W/cm&sup2;</span>
                        </div>
                        <div class="fui-capsule-bar">
                            <div class="fui-capsule-fill bg-gradient-to-r from-amber-500 to-yellow-400 w-[88%] text-amber-300"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 4: CENTRAL DIGITAL TWIN & COMMAND HUB [IMAGE 4]
             ══════════════════════════════════════════════════════════════════════════ -->
        <section id="style4" class="space-y-6">
            <div class="flex items-center justify-between border-b border-emerald-500/30 pb-3">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-400 font-mono font-bold flex items-center justify-center text-sm">04</span>
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white font-tech">CENTRAL DIGITAL TWIN &amp; COMMAND HUB</h3>
                        <p class="text-xs text-emerald-400/80 font-mono">แม่แบบภาพที่ 4: ศูนย์กลางลูกโลกโฮโลแกรม 3D, ปีกข้อมูลสองฝั่ง, วงแหวนองศา, โหนดพิกัด</p>
                    </div>
                </div>
                <span class="hidden md:inline-block px-3 py-1 rounded bg-emerald-500/10 text-emerald-300 font-mono text-xs border border-emerald-500/30">
                    นำไปใช้กับ: Portal Hero Section &bull; Admin Overview &bull; Capstone Agri-IoT
                </span>
            </div>

            <!-- Central Hub Component -->
            <div class="p-8 md:p-12 rounded-3xl bg-slate-900/95 border border-emerald-500/40 shadow-2xl relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left Data Wing -->
                    <div class="lg:col-span-4 space-y-4">
                        <div class="p-4 rounded-xl bg-slate-950/80 border border-emerald-500/30 space-y-2">
                            <span class="font-mono text-xs text-emerald-400 font-bold block">PRECISION AGRI-IOT &bull; CHANTABURI</span>
                            <h4 class="text-base font-bold text-white">การติดตามจุลินทรีย์ดิน PGPR</h4>
                            <p class="text-xs text-slate-300">
                                เซนเซอร์วัดค่าความชื้นในดินและสารกระตุ้นชีวภาพในสวนทุเรียนแปลงทดลอง มรภ.รำไพพรรณี
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-3 text-xs font-mono">
                            <div class="p-3 rounded-lg bg-slate-950/80 border border-slate-800">
                                <span class="text-slate-400 block">pH ในดิน:</span>
                                <span class="text-emerald-400 text-lg font-bold">6.42</span>
                            </div>
                            <div class="p-3 rounded-lg bg-slate-950/80 border border-slate-800">
                                <span class="text-slate-400 block">ความชื้นสัมพัทธ์:</span>
                                <span class="text-cyan-400 text-lg font-bold">78.5%</span>
                            </div>
                        </div>

                        <div class="w-full h-3 fui-vent-stripes rounded"></div>
                    </div>

                    <!-- Center Holographic Wireframe Globe (matching Image 4 center) -->
                    <div class="lg:col-span-4 flex flex-col items-center justify-center my-4">
                        <div class="fui-hologram-hub w-[240px] h-[240px]">
                            <!-- Rotating dashed and dotted rings -->
                            <div class="fui-globe-ring fui-globe-ring-1"></div>
                            <div class="fui-globe-ring fui-globe-ring-2"></div>
                            <div class="fui-globe-ring fui-globe-ring-3"></div>
                            
                            <!-- Globe Center SVG -->
                            <svg viewBox="0 0 120 120" class="w-28 h-28 relative z-10">
                                <!-- Outer circle -->
                                <circle cx="60" cy="60" r="50" fill="none" stroke="#00f2fe" stroke-width="2"/>
                                <!-- Meridians -->
                                <ellipse cx="60" cy="60" rx="30" ry="50" fill="none" stroke="#00f2fe" stroke-width="1.5" stroke-dasharray="3,3"/>
                                <ellipse cx="60" cy="60" rx="15" ry="50" fill="none" stroke="#00f2fe" stroke-width="1.5"/>
                                <!-- Parallels -->
                                <line x1="10" y1="60" x2="110" y2="60" stroke="#00f2fe" stroke-width="1.5"/>
                                <line x1="20" y1="40" x2="100" y2="40" stroke="#00f2fe" stroke-width="1" stroke-dasharray="2,2"/>
                                <line x1="20" y1="80" x2="100" y2="80" stroke="#00f2fe" stroke-width="1" stroke-dasharray="2,2"/>
                            </svg>
                        </div>
                        <span class="mt-4 font-tech text-xs tracking-widest text-emerald-300 font-bold">
                            GLOBAL BIOPHYSICS DIGITAL TWIN
                        </span>
                    </div>

                    <!-- Right Data Wing -->
                    <div class="lg:col-span-4 space-y-4">
                        <div class="p-4 rounded-xl bg-slate-950/80 border border-emerald-500/30 space-y-2">
                            <span class="font-mono text-xs text-cyan-400 font-bold block">BIOMANUFACTURING &bull; SMART FERMENTER</span>
                            <h4 class="text-base font-bold text-white">ถังปฏิกรณ์ชีวภาพอัจฉริยะ</h4>
                            <p class="text-xs text-slate-300">
                                การกวนถ่ายโอนออกซิเจน ($k_L a$) และการควบคุมอัตราการให้ความร้อน $Q = mc\Delta T$
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-3 text-xs font-mono">
                            <div class="p-3 rounded-lg bg-slate-950/80 border border-slate-800">
                                <span class="text-slate-400 block">ออกซิเจนละลาย DO:</span>
                                <span class="text-cyan-400 text-lg font-bold">8.2 mg/L</span>
                            </div>
                            <div class="p-3 rounded-lg bg-slate-950/80 border border-slate-800">
                                <span class="text-slate-400 block">ความเร็วรอบกวน:</span>
                                <span class="text-amber-400 text-lg font-bold">250 RPM</span>
                            </div>
                        </div>

                        <div class="w-full h-3 fui-vent-stripes-cyan rounded"></div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 5: AI NEURAL CORE & DEEP LEARNING MONITOR [IMAGE 5]
             ══════════════════════════════════════════════════════════════════════════ -->
        <section id="style5" class="space-y-6">
            <div class="flex items-center justify-between border-b border-violet-500/30 pb-3">
                <div class="flex items-center gap-3">
                    <span class="w-9 h-9 rounded-xl bg-violet-500/20 border border-violet-500/40 text-violet-400 font-mono font-bold flex items-center justify-center text-sm">05</span>
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white font-tech">AI NEURAL CORE &amp; DEEP LEARNING ENGINE</h3>
                        <p class="text-xs text-violet-400/80 font-mono">แม่แบบภาพที่ 5: ปฏิกรณ์พลังงานแกนกลาง, สายข้อมูลสมมาตร, จอเทอร์มินัลโค้ดสองฝั่ง</p>
                    </div>
                </div>
                <span class="hidden md:inline-block px-3 py-1 rounded bg-violet-500/10 text-violet-300 font-mono text-xs border border-violet-500/30">
                    นำไปใช้กับ: AI Teaching Assistant &bull; Computer Vision &bull; Automated Grading
                </span>
            </div>

            <!-- AI Engine Showcase -->
            <div class="p-8 md:p-10 rounded-3xl bg-slate-900/95 border border-violet-500/40 shadow-2xl relative overflow-hidden space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                    
                    <!-- Left Code Terminal -->
                    <div class="lg:col-span-4 fui-terminal-box space-y-1">
                        <div class="text-cyan-400 font-bold mb-2 flex items-center justify-between">
                            <span><i class="fas fa-brain mr-1.5"></i> NEURAL WEIGHTS TENSOR</span>
                            <span class="text-[10px] text-emerald-400">TRAINED</span>
                        </div>
                        <p class="text-slate-400">> Loading ResNet-50 Microbio Weights...</p>
                        <p class="text-slate-300">> Layer Conv2D_64 [Kernel 3x3, Strides 1]</p>
                        <p class="text-amber-400">> Loss function: Categorical Crossentropy</p>
                        <p class="text-emerald-400">> Optimization: Adam [lr=0.0001, beta=0.9]</p>
                        <p class="text-cyan-300">> Validation Accuracy: 99.82%</p>
                    </div>

                    <!-- Center Iris / AI Reactor Core (matching Image 5 center) -->
                    <div class="lg:col-span-4 flex flex-col items-center justify-center py-4">
                        <div class="fui-ai-core">
                            <div class="iris-outer"></div>
                            <div class="iris-middle"></div>
                            <div class="iris-nucleus flex items-center justify-center">
                                <i class="fas fa-atom text-white text-lg"></i>
                            </div>
                        </div>
                        <span class="mt-4 font-tech text-xs tracking-widest text-amber-300 font-bold">
                            QUANTUM BIO-AI PROCESSOR
                        </span>
                        <span class="text-[10px] font-mono text-slate-400 mt-0.5">INFERENCE LATENCY: 12.4 ms</span>
                    </div>

                    <!-- Right Code Terminal -->
                    <div class="lg:col-span-4 fui-terminal-box space-y-1" style="border-left-color: #8b5cf6;">
                        <div class="text-violet-400 font-bold mb-2 flex items-center justify-between">
                            <span><i class="fas fa-chart-line mr-1.5"></i> COMPUTER VISION CLASSIFIER</span>
                            <span class="text-[10px] text-cyan-400">ACTIVE</span>
                        </div>
                        <p class="text-slate-400">> Input: Microscope 100x Oil Sample</p>
                        <p class="text-slate-300">> Detected: Gram-negative Bacilli (E. coli)</p>
                        <p class="text-amber-400">> Confidence Score: 0.9984</p>
                        <p class="text-emerald-400">> Segmentation Mask: Cell Count = 1,420</p>
                        <p class="text-violet-300">> Telemetry Exported to SQLite3 DB</p>
                    </div>

                </div>
            </div>
        </section>

        <!-- ══════════════════════════════════════════════════════════════════════════
             SECTION 6: INTEGRATION ROADMAP (HOW TO APPLY ACROSS THE SITE)
             ══════════════════════════════════════════════════════════════════════════ -->
        <section class="p-8 rounded-3xl bg-gradient-to-br from-slate-900 to-slate-950 border border-slate-800 space-y-6">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center border border-cyan-500/30">
                    <i class="fas fa-map-marked-alt text-lg"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white font-tech">SYSTEM INTEGRATION ROADMAP (แผนการนำไปประยุกต์ใช้)</h3>
                    <p class="text-xs text-slate-400 font-mono">แนวทางการผสานสไตล์ FUI Sci-Fi HUD ทั้ง 5 แบบเข้ากับส่วนต่างๆ ของเว็บไซต์</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                <!-- Site Area 1 -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 space-y-2">
                    <span class="text-amber-400 font-bold font-mono block">1. หน้ารวมคอร์สหลัก (index.php)</span>
                    <p class="text-slate-300 leading-relaxed">
                        - นำ <strong>Style 4 (Digital Twin Hub)</strong> มาปรับใช้ที่ Hero Section แทนภาพนิ่งเดิม<br>
                        - นำ <strong>Style 1 (Cybernetic Cards)</strong> มาปรับใช้กับการ์ดแล็บทั้ง 12 ปฏิบัติการ
                    </p>
                </div>

                <!-- Site Area 2 -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 space-y-2">
                    <span class="text-cyan-400 font-bold font-mono block">2. แดชบอร์ดอาจารย์ (admin/)</span>
                    <p class="text-slate-300 leading-relaxed">
                        - นำ <strong>Style 3 (Telemetry Dashboard)</strong> มาใช้แสดงคะแนนและความก้าวหน้าของ นศ.<br>
                        - นำ <strong>Style 5 (AI Neural Core)</strong> มาใช้ประเมินผลคะแนน OBE อัตโนมัติ
                    </p>
                </div>

                <!-- Site Area 3 -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 space-y-2">
                    <span class="text-emerald-400 font-bold font-mono block">3. เนื้อหารายบท (ch01 - ch13)</span>
                    <p class="text-slate-300 leading-relaxed">
                        - ปรับกล่อง <strong>Microbiology Anchor</strong> และ <strong>Biosafety Warning</strong> เป็นกรอบขอบตัดแบบ <strong>Style 1</strong><br>
                        - ปรับกล่อง <strong>Formula Box</strong> ให้มีตารางกริดและเส้นเรืองแสงแบบ <strong>Style 2</strong>
                    </p>
                </div>

                <!-- Site Area 4 -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 space-y-2">
                    <span class="text-violet-400 font-bold font-mono block">4. แล็บ 3D & WebAR (virtual_lab/)</span>
                    <p class="text-slate-300 leading-relaxed">
                        - ปรับกรอบจอเรนเดอร์ 3D Canvas ให้เป็นหน้าต่างกระจก <strong>Style 2 (Viewport)</strong><br>
                        - ติดตั้งเรดาร์และพิกัดเล็งเป้า (Target HUD) ในกล้องสแกน WebAR ArUco
                    </p>
                </div>
            </div>
        </section>

    </main>

    <!-- ─── FOOTER ───────────────────────────────────────────────────────────── -->
    <footer class="border-t border-slate-800/80 py-8 text-center text-xs text-slate-500 font-mono">
        <p>4011111 Physics for Microbiology &bull; Faculty of Science &amp; Technology &bull; Rambhai Barni Rajabhat University</p>
        <p class="text-slate-600 mt-1">FUI Cybernetic Design System Spec &bull; Asst. Prof. Dr. Chewa Thassana</p>
    </footer>

</body>
</html>
