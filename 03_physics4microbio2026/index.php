<?php 
$pageTitle = 'Physics for Microbiology 2026';
$basePath = './';
// Detect current language from preference
$currentLang = $_GET['lang'] ?? $_COOKIE['pref_lang'] ?? 'th';
include 'includes/header.php'; 
?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center pt-24 overflow-hidden">
    <!-- Background Accents -->
    <div class="absolute top-0 left-0 w-full h-full -z-10 bg-slate-900">
        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-orange-600/20 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[500px] h-[500px] bg-amber-600/10 rounded-full blur-[120px]"></div>
    </div>

    <!-- Animated Particle Canvas Container -->
    <div id="particle-canvas" class="absolute inset-0 -z-5 opacity-40"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">
        <div class="animate-fade-in" style="animation-delay: 0.2s">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-400 text-xs font-bold tracking-widest uppercase mb-6">
                <i class="fas fa-sparkles"></i>
                <span>Next-Gen Physics Learning</span>
            </div>
            <h1 class="text-6xl lg:text-7xl font-bold leading-tight mb-8">
                <span class="lang-block" lang="th">ฟิสิกส์สำหรับ<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400">จุลชีววิทยา 2026</span></span>
                <span class="lang-block" lang="en">Physics for<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400">Microbiology 2026</span></span>
                <span class="lang-block" lang="zh">物理学<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-amber-400">微生物学 2026</span></span>
            </h1>
            <p class="text-lg text-slate-400 mb-10 max-w-lg leading-relaxed">
                <span class="lang-block" lang="th">สัมผัสประสบการณ์การเรียนรู้ฟิสิกส์รูปแบบใหม่ที่ผสมผสานระหว่างวิทยาศาสตร์พื้นฐาน จุลชีววิทยา และเทคโนโลยี AI เพื่อโลกอนาคต</span>
                <span class="lang-block" lang="en">Experience a new era of physics education blending fundamental science, microbiology, and AI technology for the future.</span>
            </p>
            
            <div class="flex flex-wrap gap-4">
                <a href="#modules" class="px-8 py-4 bg-gradient-to-r from-orange-600 to-amber-500 rounded-2xl font-bold shadow-lg shadow-orange-900/20 hover:scale-105 transition-all flex items-center space-x-2">
                    <i class="fas fa-play-circle"></i>
                    <span class="lang-block" lang="th">เริ่มเรียนรู้ตอนนี้</span>
                    <span class="lang-block" lang="en">Start Learning</span>
                </a>
                <a href="xrlab/index.php" class="px-8 py-4 bg-white/5 border border-white/10 rounded-2xl font-bold hover:bg-white/10 transition-all flex items-center space-x-2">
                    <i class="fas fa-flask"></i>
                    <span>XR Lab Simulator</span>
                </a>
            </div>
        </div>

        <div class="relative lg:h-[600px] flex items-center justify-center animate-fade-in" style="animation-delay: 0.4s">
            <!-- Hero Visual (Random Slideshow) -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 to-transparent z-10"></div>
            <img id="hero-slideshow" src="images/ch01.png" alt="Physics Visual" class="relative z-0 max-w-full h-auto drop-shadow-2xl animate-float transition-opacity duration-500 rounded-3xl" style="opacity: 1;" onerror="this.src='https://placehold.co/600x600/1e293b/f97316?text=Bio-Physics+AI'">

            <!-- Stats Cards -->
            <div class="absolute top-1/4 right-0 bg-slate-900/80 backdrop-blur-xl p-4 rounded-2xl border border-white/10 shadow-2xl z-20 hover:-translate-y-2 transition-transform">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-orange-500/20 flex items-center justify-center text-orange-400">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div>
                        <span class="block text-xl font-bold">12</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest">Chapters</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Module Grid Section -->
<section id="modules" class="py-24 bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h4 class="text-orange-500 font-bold tracking-widest text-sm mb-2 uppercase">Core Modules</h4>
                <h2 class="text-4xl font-bold">
                    <span class="lang-block" lang="th">เนื้อหาการเรียนรู้</span>
                    <span class="lang-block" lang="en">Learning Modules</span>
                    <span class="lang-block" lang="zh">学习模块</span>
                </h2>
            </div>
            <div class="flex space-x-2">
                <div class="px-4 py-2 rounded-xl bg-orange-500/10 border border-orange-500/20 text-orange-400 text-xs font-bold uppercase">PHYSICS</div>
                <div class="px-4 py-2 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-bold uppercase">MICROBIO</div>
                <div class="px-4 py-2 rounded-xl bg-slate-500/10 border border-slate-500/20 text-slate-400 text-xs font-bold uppercase">AI x 2026</div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $modules = [
                ['01', 'fas fa-ruler-combined', 'ระบบหน่วยและการวัด', 'Unit Systems', '单位系统与测量', '01', '#f97316'],
                ['02', 'fas fa-vector-square', 'เวกเตอร์', 'Vectors', '矢量', '02', '#fbbf24'],
                ['03', 'fas fa-running', 'การเคลื่อนที่', 'Motion', '运动', '03', '#10b981'],
                ['04', 'fas fa-apple-whole', 'กฎนิวตัน', "Newton's Laws", '牛顿定律', '04', '#3b82f6'],
                ['05', 'fas fa-bowling-ball', 'โมเมนตัม', 'Momentum', '动量', '05', '#8b5cf6'],
                ['06', 'fas fa-balance-scale', 'สมดุล', 'Equilibrium', '平衡', '06', '#ec4899'],
                ['07', 'fas fa-bolt', 'งานและพลังงาน', 'Work & Energy', '功与能量', '07', '#f43f5e'],
                ['08', 'fas fa-gears', 'เครื่องกลอย่างง่าย', 'Simple Machines', '简单机械', '08', '#06b6d4'],
                ['09', 'fas fa-fire', 'อุณหพลศาสตร์', 'Thermodynamics', '热力学', '09', '#f97316'],
                ['10', 'fas fa-bolt-lightning', 'ไฟฟ้า', 'Electricity', '电学', '10', '#eab308'],
                ['11', 'fas fa-eye', 'ทัศนศาสตร์', 'Optics', '光学', '11', '#6366f1'],
                ['12', 'fas fa-radioactive', 'กัมมันตภาพรังสี', 'Radioactivity', '放射性', '12', '#ef4444'],
                ['13', 'fas fa-microscope', 'จุลชีววิทยาสมัยใหม่', 'Modern Microbiology', '现代微生物学', '13', '#10b981'],
            ];

            foreach($modules as $mod):
                // Point to the Master Trilingual file (chXX_XX.php) for full interactivity
                $targetFile = "chapters/ch" . $mod[5] . "_" . $mod[5] . ".php";
            ?>
            <div class="group relative bg-slate-900 rounded-3xl border border-white/5 overflow-hidden hover:border-orange-500/50 transition-all hover:shadow-2xl hover:shadow-orange-500/10">
                <div class="aspect-video overflow-hidden">
                    <img src="images/ch<?php echo $mod[0]; ?>/cover.png" alt="Mod <?php echo $mod[0]; ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" onerror="this.src='https://placehold.co/600x400/1e293b/<?php echo str_replace('#', '', $mod[6]); ?>?text=Module+<?php echo $mod[0]; ?>'">
                </div>
                <div class="p-8">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-bold text-slate-500 tracking-widest uppercase">Chapter <?php echo $mod[0]; ?></span>
                        <div class="w-10 h-10 rounded-xl flex items-center justify-center bg-white/5 group-hover:bg-orange-500/20 transition-colors">
                            <i class="<?php echo $mod[1]; ?> text-slate-400 group-hover:text-orange-500 transition-colors"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-6 group-hover:text-orange-400 transition-colors">
                        <span class="lang-block" lang="th"><?php echo $mod[2]; ?></span>
                        <span class="lang-block" lang="en"><?php echo $mod[3]; ?></span>
                        <span class="lang-block" lang="zh"><?php echo $mod[4]; ?></span>
                    </h3>
                    <a href="<?php echo $targetFile; ?>" class="w-full py-3 bg-white/5 hover:bg-orange-500 text-white rounded-xl text-center text-sm font-bold transition-all block border border-white/10 group-hover:border-orange-500 shadow-lg">
                        <span class="lang-block" lang="th">เริ่มบทเรียน →</span>
                        <span class="lang-block" lang="en">Start Lesson →</span>
                        <span class="lang-block" lang="zh">开始学习 →</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Particle Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('particle-canvas');
    if (container) {
        const canvas = document.createElement('canvas');
        container.appendChild(canvas);
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        function resize() {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        }
        window.addEventListener('resize', resize);
        resize();
        
        class Particle {
            constructor() { this.reset(); }
            reset() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = (Math.random() - 0.5) * 0.4;
                this.vy = (Math.random() - 0.5) * 0.4;
                this.radius = Math.random() * 1.5;
                this.color = Math.random() > 0.5 ? '#f97316' : '#fbbf24';
            }
            update() {
                this.x += this.vx; this.y += this.vy;
                if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) this.reset();
            }
            draw() {
                ctx.beginPath(); ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = this.color; ctx.fill();
            }
        }
        for (let i = 0; i < 50; i++) particles.push(new Particle());
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => { p.update(); p.draw(); });
            requestAnimationFrame(animate);
        }
        animate();
    }
});
</script>

<script>
    // --- Random Image Slideshow (Local Model) ---
    const heroImage = document.getElementById('hero-slideshow');
    
    if (heroImage) {
        // ดึงภาพทั้งหมดจากโฟลเดอร์ images อัตโนมัติด้วย PHP (Local Images Model)
        const images = <?php 
            $imgFiles = glob('images/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            echo json_encode($imgFiles ? $imgFiles : ['images/ch01.png']);
        ?>;

        // Fisher-Yates Shuffle
        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
        
        shuffleArray(images);
        let currentIndex = 0;

        function changeImage() {
            heroImage.style.opacity = '0';
            setTimeout(() => {
                heroImage.src = images[currentIndex];
                heroImage.style.opacity = '1';
                currentIndex = (currentIndex + 1) % images.length;
                if(currentIndex === 0) {
                    shuffleArray(images); // Reshuffle for next round
                }
            }, 500); 
        }

        heroImage.src = images[currentIndex];
        currentIndex++;
        setInterval(changeImage, 4000); 
    }
</script>

<?php include 'includes/footer.php'; ?>
