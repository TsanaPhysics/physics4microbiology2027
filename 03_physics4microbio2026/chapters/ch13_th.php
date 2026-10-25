<?php
$pageTitle = "13";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-20" style="background:#020617;">
    <section class="relative text-white overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #020617 100%); padding: 120px 0 80px;">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full text-orange-400 font-mono text-xs mb-6 border border-orange-500/30 tracking-widest uppercase">MODULE 13</span>
            <h1 class="text-4xl md:text-6xl font-black mb-8 leading-tight tracking-tight">13</h1>
        </div>
    </section>
    <div class="container mx-auto px-6 -mt-12 relative z-20">
        <div class="rounded-[2.5rem] shadow-2xl overflow-hidden max-w-5xl mx-auto border p-8 md:p-16 bg-slate-900/90 backdrop-blur-3xl border-white/5">
            
            <div class="mb-16 p-8 rounded-3xl bg-orange-600/5 border border-orange-500/10">
                <h3 class="text-xl font-bold text-orange-400 mb-6 flex items-center"><i class="fas fa-bullseye mr-3"></i> <span>วัตถุประสงค์</span></h3>
                <ul class="grid md:grid-cols-1 gap-4 text-gray-300 text-sm"></ul>
            </div>
            <div class="mb-12"><h2 class="text-2xl font-bold text-white mb-6 flex items-center"><span class="section-number mr-2">99.1</span> <span>หัวข้อทดสอบ</span></h2><div class="text-gray-400 space-y-4">นี่คือการทดสอบระบบ
🔬 สำหรับจุลชีววิทยา: ทดสอบ
🌍 สำหรับสิ่งแวดล้อม: ทดสอบ
📝 ตัวอย่าง: ทดสอบ
<ul class="space-y-3 my-6"><li class="flex items-start"><i class="fas fa-circle text-[6px] text-orange-500 mt-2 mr-3 opacity-60"></i><span class="opacity-90">แบบฝึกหัดทดสอบ</span></li>
</ul>- สรุปทดสอบ

<div class="my-12 flex flex-col items-center animate-fade-in"><img src="../images/water_quality_env.png" alt="Water Quality Env" class="max-w-full h-auto rounded-[2rem] shadow-2xl border border-white/10 hover:scale-[1.02] transition-transform duration-500"><p class="mt-4 text-xs text-orange-400/80 italic text-center max-w-2xl px-6">ภาพประกอบเนื้อหา: Water Quality Env</p></div>



<div class="my-12 flex flex-col items-center animate-fade-in"><img src="../images/size_scale_trilingual.png" alt="Size Scale Trilingual" class="max-w-full h-auto rounded-[2rem] shadow-2xl border border-white/10 hover:scale-[1.02] transition-transform duration-500"><p class="mt-4 text-xs text-orange-400/80 italic text-center max-w-2xl px-6">ภาพประกอบเนื้อหา: Size Scale Trilingual</p></div></div></div>
            
            
            <div class="mb-12 mt-16 pt-12 border-t border-white/10">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-images text-orange-500 mr-3"></i>
                    <span>คลังภาพเทคโนโลยีและปฏิบัติการ XR</span>
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php 
                        $allImages = glob('../images/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                        if($allImages) {
                            foreach($allImages as $img) {
                                echo '<div class="group relative rounded-2xl overflow-hidden aspect-video border border-white/10 shadow-lg">';
                                echo '<img src="' . $img . '" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy" alt="Gallery Image">';
                                echo '<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4"><i class="fas fa-search-plus text-orange-400"></i></div>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
    
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
