<!-- 🦶 Modern High-Tech Footer -->
<footer class="bg-[#020617] pt-16 pb-24 md:pb-8 mt-20 border-t border-orange-500/20 relative overflow-hidden">
    <!-- Background Glow -->
    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full max-w-3xl h-[1px] bg-gradient-to-r from-transparent via-orange-500 to-transparent"></div>
    <div class="absolute -top-40 left-1/2 transform -translate-x-1/2 w-[800px] h-[300px] bg-orange-500/10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="container max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-10 px-6 relative z-10">
        <!-- Col 1: Brand & Contact -->
        <div class="md:col-span-5 flex flex-col">
            <h3 class="font-bold text-2xl mb-2 drop-shadow-[0_0_8px_rgba(249,115,22,0.8)]">
                <span class="text-orange-500">PHYSICS</span><span class="text-white">4MICROBIO</span>
            </h3>
            <p class="text-orange-400 text-sm font-bold uppercase tracking-widest mb-4">Bio-Digital AI Lab 2026</p>
            <p class="text-slate-400 text-sm leading-relaxed font-light mb-6 opacity-90">
                ศูนย์กลางการเรียนรู้ฟิสิกส์สำหรับจุลชีววิทยายุคใหม่ 
                บูรณาการความรู้ทางวิทยาศาสตร์กายภาพเข้ากับเทคโนโลยีดิจิทัลและปัญญาประดิษฐ์ 
                เพื่อสร้างสรรค์งานวิจัยและนวัตกรรมระดับสากล
            </p>

            <!-- Contact Box -->
            <div class="bg-white/5 p-5 rounded-2xl border border-white/5 shadow-inner mb-6 backdrop-blur-sm">
                <p class="text-white font-bold text-sm mb-1">ศูนย์พัฒนานวัตกรรมเกษตรดิจิทัลรำไพพรรณี</p>
                <p class="text-gray-400 text-sm mb-4">คณะวิทยาศาสตร์และเทคโนโลยี <br>มหาวิทยาลัยราชภัฏรำไพพรรณี</p>
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-orange-500/20 border border-orange-500/50 flex items-center justify-center text-orange-500 mr-3">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <p class="font-bold text-white text-sm">ผศ.ดร.ชีวะ ทัศนา</p>
                        <a href="mailto:chewa.t@rbru.ac.th" class="text-orange-400 text-xs hover:text-white transition-colors">
                            <i class="fas fa-envelope mr-1"></i> chewa.t@rbru.ac.th
                        </a>
                    </div>
                </div>
            </div>

            <div class="social-icons flex space-x-3">
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-[#1877F2] hover:shadow-[0_0_15px_#1877F2] transition-colors border border-white/10"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-orange-500 hover:shadow-[0_0_15px_#f97316] transition-colors border border-white/10"><i class="fas fa-globe"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-[#333] hover:shadow-[0_0_15px_#333] transition-colors border border-white/10"><i class="fab fa-github"></i></a>
            </div>
        </div>

        <!-- Col 2: Navigation Links -->
        <div class="md:col-span-3 flex flex-col">
            <h3 class="text-white font-bold text-xl mb-6 border-b border-white/10 pb-2">เมนูการใช้งาน</h3>
            <ul class="space-y-3">
                <li><a href="<?php echo $basePath ?? ''; ?>index.php" class="text-gray-400 hover:text-orange-500 flex items-center transition-colors font-light">
                    <i class="fas fa-chevron-right text-xs text-orange-500/60 mr-2"></i> หน้าแรก (Home)</a></li>
                <li><a href="#" class="text-gray-400 hover:text-orange-500 flex items-center transition-colors font-light">
                    <i class="fas fa-chevron-right text-xs text-orange-500/60 mr-2"></i> เอกสารคำสอน</a></li>
                <li><a href="#" class="text-gray-400 hover:text-orange-500 flex items-center transition-colors font-light">
                    <i class="fas fa-chevron-right text-xs text-orange-500/60 mr-2"></i> คลังความรู้ AI</a></li>
                <li><a href="xrlab/index.php" class="text-gray-400 hover:text-orange-500 flex items-center transition-colors font-light">
                    <i class="fas fa-flask text-xs text-orange-500/60 mr-2"></i> XR Lab Simulator</a></li>
            </ul>
        </div>

        <!-- Col 3: Map Location -->
        <div class="md:col-span-4">
            <h3 class="text-white font-bold text-xl mb-6 border-b border-white/10 pb-2">📍 ที่ตั้งห้องปฏิบัติการ</h3>
            <div class="relative rounded-2xl overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.5)] border border-white/10 group bg-black/50 p-2">
                <div class="rounded-xl overflow-hidden relative">
                    <iframe
                        src="https://maps.google.com/maps?q=%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A8%E0%B8%B2%E0%B8%AA%E0%B8%95%E0%B8%A3%E0%B9%8C%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%20%E0%B8%A1%E0%B8%AB%E0%B8%B2%E0%B8%A7%E0%B8%B4%E0%B8%97%E0%B8%A2%E0%B8%B2%E0%B8%A5%E0%B8%B1%E0%B8%A2%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%A0%E0%B8%B1%E0%B8%8F%E0%B8%A3%E0%B8%B3%E0%B9%84%E0%B8%9E%E0%B8%9E%E0%B8%A3%E0%B8%A3%E0%B8%93%E0%B8%B5&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="200" frameborder="0" style="border:0; filter: contrast(0.9) saturate(1.2) grayscale(0.5) invert(0.9) hue-rotate(180deg);"
                        allowfullscreen loading="lazy"></iframe>
                    <div class="absolute inset-0 bg-orange-500/5 pointer-events-none group-hover:bg-transparent transition-colors duration-500"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom flex flex-col md:flex-row items-center justify-between mt-12 pt-6 border-t border-white/10 text-gray-500 text-xs px-6 max-w-7xl mx-auto">
        <p>&copy; 2026 Bio-Digital AI Lab — Physics for Microbiology. All Rights Reserved. ✨</p>
        <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-orange-400 transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-orange-400 transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>

<!-- 📱 Mobile Bottom Nav -->
<div class="fixed bottom-0 left-0 w-full z-50 md:hidden bg-[#020617]/95 backdrop-blur-xl border-t border-orange-500/30 shadow-[0_-5px_20px_rgba(0,0,0,0.5)]">
    <nav class="flex justify-around items-center py-3 px-2">
        <a href="<?php echo $basePath ?? ''; ?>index.php" class="flex flex-col items-center text-orange-500 relative">
            <i class="fas fa-home text-2xl mb-1"></i>
            <span class="text-[10px] font-bold">Home</span>
            <div class="absolute -bottom-3 w-1/2 h-1 bg-orange-500 rounded-t-full shadow-[0_0_10px_#f97316]"></div>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-500 transition-colors">
            <i class="fas fa-book-open text-xl mb-1"></i>
            <span class="text-[10px] font-medium">Lessons</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-500 transition-colors">
            <i class="fas fa-flask text-xl mb-1"></i>
            <span class="text-[10px] font-medium">Lab AI</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-orange-500 transition-colors">
            <i class="fas fa-user-graduate text-xl mb-1"></i>
            <span class="text-[10px] font-medium">Student</span>
        </a>
    </nav>
</div>

<!-- Scripts -->
<script>
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
</body>
</html>
