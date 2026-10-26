<?php
$pageTitle = "บทที่ 3: กฎการเคลื่อนที่ของนิวตันและแรงหนืด";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 20%, #1e293b 0%, #020617 85%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center gap-2 text-xs text-slate-400 mb-4 font-mono">
                <a href="../index.php" class="hover:text-amber-400 transition-colors"><i class="fas fa-home mr-1"></i>หน้าแรก</a>
                <span>/</span>
                <span class="text-slate-300">บทเรียนทฤษฎี</span>
                <span>/</span>
                <span class="text-amber-400">บทที่ 3</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-blue-400 font-mono text-xs mb-4 border border-blue-500/30 bg-blue-500/10 tracking-widest uppercase shadow-lg shadow-blue-500/10">
                <i class="fas fa-tint text-xs"></i> MODULE 03 &bull; NEWTON &amp; FLUID VISCOSITY
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                กฎการเคลื่อนที่ของนิวตันและแรงหนืด
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                กลศาสตร์นิวตันในโลกจุลทรรศน์ ความหนืดของอาหารเลี้ยงเชื้อ กฎของสโตกส์ และฟิสิกส์การตกตะกอนของเซลล์ยีสต์และแบคทีเรีย
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-bullseye text-emerald-400"></i> CLO1 &bull; CLO2 &bull; CLO3
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-cube text-cyan-400"></i> WebAR Marker ID: 2
                </span>
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-12">

            <!-- Curriculum & Learning Outcomes Planbox -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-blue-500/10 via-slate-800/40 to-slate-900 border border-blue-500/20 shadow-xl">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 border border-blue-500/30">
                        <i class="fas fa-water text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ผลลัพธ์การเรียนรู้ประจำบท (Learning Outcomes &bull; OBE)</h3>
                        <p class="text-xs text-slate-400 font-mono">หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (มคอ.3 พ.ศ. 2569/2570)</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-sm text-slate-300">
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-blue-400 mt-1"></i>
                            <span><strong>CLO1:</strong> อธิบายกฎ 3 ข้อของนิวตันในมุมมองชีวฟิสิกส์ระดับเซลล์จุลินทรีย์ได้อย่างถูกต้อง</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-blue-400 mt-1"></i>
                            <span><strong>CLO2:</strong> อธิบายอิทธิพลของความหนืด ($\eta$) และรัศมีเซลล์ ($r$) ต่ออัตราเร็วตกตะกอนตามกฎของสโตกส์ ($v_t \propto r^2$)</span>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-amber-400 mt-1"></i>
                            <span><strong>CLO3:</strong> ปฏิบัติการทดลองวัดความหนืดของของเหลวชีวภาพด้วยวิธีปล่อยทรงกลมตกได้อย่างปลอดภัย</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-emerald-400 mt-1"></i>
                            <span><strong>CLO4:</strong> คำนวณสัมประสิทธิ์ความหนืดและเปรียบเทียบอัตราการตกตะกอนของเชื้อชนิดต่างๆ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 1. Anchor Instrument Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-emerald-950/40 via-slate-900 to-slate-900 border border-emerald-500/30 shadow-2xl">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-5/12 overflow-hidden rounded-2xl border border-emerald-500/30 shadow-lg">
                        <img src="../images/sec_3d/ch03_s1.jpg" alt="กฎนิวตันและความหนืดของของเหลว" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-7/12 space-y-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-emerald-500/20 text-emerald-300 border border-emerald-500/40">
                            <i class="fas fa-anchor"></i> MICROBIOLOGY FLUID ANCHOR
                        </span>
                        <h2 class="text-2xl font-bold text-white">หลอดวัดความหนืด (Viscometer) และอาหารเลี้ยงเชื้อเหลว</h2>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            ในงานจุลชีววิทยาอุตสาหกรรม (เช่น การหมักเบียร์ ไวน์ หรือการเพาะเลี้ยงแบคทีเรียผลิตเอนไซม์) เมื่อจุลินทรีย์สร้างสารเมือกหรือโพลีแซ็กคาไรด์ออกมา ความหนืดของน้ำหมักจะเพิ่มสูงขึ้น ส่งผลให้การถ่ายเทออกซิเจนและการตกตะกอนแยกเซลล์ทำได้ยากขึ้น กฎของสโตกส์จึงเป็นหัวใจสำคัญในการคำนวณอัตราเร็วการแยกเซลล์
                        </p>
                        <div class="grid grid-cols-2 gap-3 text-xs font-mono text-slate-300 pt-2 border-t border-emerald-500/20">
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความหนืดน้ำบริสุทธิ์</span>
                                <span>$\eta \approx 1.0\times 10^{-3}\ \text{Pa}\cdot\text{s}$ ($1\text{ cP}$ ที่ $20^\circ\text{C}$)</span>
                            </div>
                            <div class="bg-slate-800/60 p-2.5 rounded-lg border border-slate-700/50">
                                <span class="text-emerald-400 font-bold block mb-0.5">ความหนืดกลีเซอรีน 50%</span>
                                <span>$\approx 6.0\times 10^{-3}\ \text{Pa}\cdot\text{s}$ (หนืดกว่าน้ำ 6 เท่า)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 1: Newton's Laws at Microscale -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-400 font-mono font-bold flex items-center justify-center text-sm border border-blue-500/30">3.1</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">กฎการเคลื่อนที่ 3 ข้อของนิวตันในมุมมองจุลชีววิทยา</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-blue-400 font-bold text-xs font-mono block">LAW 1 &bull; ความเฉื่อย</span>
                        <h4 class="font-bold text-white text-sm">กฎข้อที่ 1: $\sum \vec{F} = 0$</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            เซลล์แบคทีเรียมีมวลน้อยมาก ($m \approx 10^{-15}\text{ kg}$) แรงหนืดจึงมีอิทธิพลเหนือความเฉื่อยอย่างสิ้นเชิง ทันทีที่แบคทีเรียหยุดหมุนแฟลกเจลลา เซลล์จะหยุดนิ่งแทบจะในทันทีภายในระยะทางระดับอะตอม
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-amber-400 font-bold text-xs font-mono block">LAW 2 &bull; ความเร่ง</span>
                        <h4 class="font-bold text-white text-sm">กฎข้อที่ 2: $\vec{F}_{\text{net}} = m\vec{a}$</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            เมื่อมีแรงลัพธ์ภายนอกมากระทำ เช่น แรงเหวี่ยงในเครื่องปั่นเหวี่ยง ($F_c = m a_c$) จะสร้างความเร่งให้เซลล์ตกตะกอนแยกตัวออกจากของเหลวได้รวดเร็วขึ้น
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 space-y-2">
                        <span class="text-emerald-400 font-bold text-xs font-mono block">LAW 3 &bull; กิริยา-ปฏิกิริยา</span>
                        <h4 class="font-bold text-white text-sm">กฎข้อที่ 3: $\vec{F}_{\text{action}} = -\vec{F}_{\text{reaction}}$</h4>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            เมื่อแฟลกเจลลาหมุนผลักโมเลกุลน้ำไปข้างหลัง (แรงกิริยา) น้ำจะออกแรงปฏิกิริยาดันตัวเซลล์แบคทีเรียให้พุ่งไปข้างหน้าด้วยขนาดแรงที่เท่ากัน
                        </p>
                    </div>
                </div>
            </section>

            <!-- 2. Low-Math Formula Triangle Box: Stokes' Law -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-950/60 via-slate-900 to-slate-900 border border-indigo-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-indigo-500/20 text-indigo-300 border border-indigo-500/40">
                        <i class="fas fa-shapes"></i> LOW-MATH &bull; ZERO-CALCULUS FORMULA SCAFFOLDING
                    </span>
                    <span class="text-xs text-slate-400 font-mono">กฎของสโตกส์และอัตราเร็วตกตะกอน</span>
                </div>

                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <!-- Diagram Card -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3">
                        <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                            สมดุลแรง 3 แรงขณะเซลล์ตกตะกอน ($\sum F = 0$)
                        </span>
                        <div class="p-3 bg-slate-900/90 rounded-lg border border-slate-700/40 text-center font-mono text-sm text-cyan-300">
                            $$\text{แรงขึ้นรวม} = \text{แรงลง}$$
                            $$F_{\text{drag}} + F_b = F_g$$
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            เมื่อแรงหนืดต้านการจม ($F_{\text{drag}} = 6\pi\eta r v_t$) รวมกับแรงลอยตัว ($F_b$) เท่ากับแรงโน้มถ่วง ($F_g$) เซลล์จะจมลงด้วยอัตราเร็วคงที่ เรียกว่า <strong>อัตราเร็วสุดท้าย ($v_t$)</strong>
                        </p>
                    </div>

                    <!-- Proportional Scaling Rule -->
                    <div class="bg-slate-800/80 p-5 rounded-xl border border-slate-700/60 space-y-3 font-mono text-xs">
                        <div class="text-emerald-400 font-bold text-sm mb-1 flex items-center gap-2">
                            <i class="fas fa-balance-scale"></i> กฎการเทียบสัดส่วน: $v_t \propto r^2 / \eta$
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-emerald-500/30 text-slate-200">
                            <strong class="text-amber-400 block mb-1">1. อิทธิพลของรัศมีเซลล์ ($r^2$):</strong>
                            <span>หากเซลล์มีรัศมีโตขึ้น 2 เท่า อัตราเร็วตกตะกอนจะพุ่งขึ้น $2^2 = 4$ เท่า!</span>
                        </div>
                        <div class="p-3 rounded-lg bg-slate-900/80 border border-cyan-500/30 text-slate-200">
                            <strong class="text-cyan-400 block mb-1">2. อิทธิพลของความหนืด ($\eta$):</strong>
                            <span>หากของเหลวหนืดขึ้น 2 เท่า อัตราเร็วตกตะกอนจะช้าลงครึ่งหนึ่ง</span>
                        </div>
                    </div>
                </div>

                <!-- Solved Worked Example -->
                <div class="p-5 rounded-xl bg-slate-800/50 border border-slate-700/70 space-y-3">
                    <span class="text-xs font-mono font-bold text-amber-400 uppercase tracking-wider block">
                        <i class="fas fa-calculator mr-1"></i> ตัวอย่างคำนวณ: ทำไมเซลล์ยีสต์จึงตกตะกอนเร็วกว่าแบคทีเรียถึง 25 เท่า
                    </span>
                    <p class="text-sm text-slate-200">
                        <strong>โจทย์:</strong> เซลล์ยีสต์ <em>Saccharomyces cerevisiae</em> มีรัศมีเฉลี่ย $r_1 = 2.5\ \mu\text{m}$ ขณะที่เซลล์แบคทีเรียทรงกลมมีรัศมี $r_2 = 0.5\ \mu\text{m}$ หากแขวนลอยในอาหารเหลวชนิดเดียวกัน เซลล์ยีสต์จะตกตะกอนเร็วกว่าแบคทีเรียกี่เท่า
                    </p>
                    <div class="grid md:grid-cols-2 gap-4 text-xs font-mono bg-slate-900/80 p-4 rounded-lg text-slate-300">
                        <div>
                            <span class="text-amber-400 font-bold block mb-1">ขั้นที่ 1: ตั้งอัตราส่วนจากสัดส่วนตรง $v_t \propto r^2$</span>
                            $$\frac{v_{\text{yeast}}}{v_{\text{bacteria}}} = \left(\frac{r_{\text{yeast}}}{r_{\text{bacteria}}}\right)^2$$
                        </div>
                        <div>
                            <span class="text-emerald-400 font-bold block mb-1">ขั้นที่ 2: แทนค่ารัศมีแล้วยกกำลังสอง</span>
                            $$\frac{v_{\text{yeast}}}{v_{\text{bacteria}}} = \left(\frac{2.5\ \mu\text{m}}{0.5\ \mu\text{m}}\right)^2 = 5^2 = 25\text{ เท่า}$$
                            <span class="text-slate-400">&bull; เซลล์ยีสต์ตกตะกอนเร็วกว่าแบคทีเรีย 25 เท่า</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section 2: Laboratory Viscometer -->
            <section class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-800 pb-3">
                    <span class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-400 font-mono font-bold flex items-center justify-center text-sm border border-blue-500/30">3.2</span>
                    <h2 class="text-xl md:text-2xl font-bold text-white">การวัดความหนืดของเหลวด้วยวิธีปล่อยทรงกลมตก (Falling Sphere)</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-6 items-center">
                    <div class="space-y-4 text-sm text-slate-300">
                        <p>
                            ในปฏิบัติการที่ 3 เราหาค่าความหนืด $\eta$ ของของเหลวชีวภาพได้โดยปล่อยลูกเหล็กทรงกลมรัศมี $r$ ตกผ่านกระบอกตวง เมื่อลูกเหล็กเคลื่อนที่ด้วยอัตราเร็วคงที่ $v_t = s/t$ เราสามารถคำนวณสัมประสิทธิ์ความหนืดได้จากสมการ:
                        </p>
                        <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700/60 font-mono text-center text-amber-300 text-xs md:text-sm">
                            $$\eta = \frac{2 r^2 (\rho_{\text{ลูกเหล็ก}} - \rho_{\text{ของเหลว}}) g}{9 v_t}$$
                        </div>
                        <p class="text-xs text-slate-400">
                            เมื่ออุณหภูมิสูงขึ้น ความหนืดของของเหลวจะลดลง ทำให้เซลล์ตกตะกอนได้เร็วขึ้น
                        </p>
                    </div>
                    <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                        <img src="../images/sec_3d/ch03_s3.jpg" alt="ชุดทดลองวัดความหนืด" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500">
                        <p class="p-3 bg-slate-900/90 text-xs text-slate-400 text-center italic border-t border-slate-800">
                            ภาพที่ 3.2: การจับเวลาปล่อยลูกเหล็กตกในหลอดวัดความหนืดน้ำกลั่นและกลีเซอรีน
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. Interactive 3D Simulator & WebAR Action Card -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-r from-blue-950/60 via-slate-900 to-slate-900 border border-blue-500/30 shadow-2xl space-y-6">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-blue-500/20 text-blue-300 border border-blue-500/40">
                        <i class="fas fa-cube"></i> INTERACTIVE 3D LAB &amp; WEBAR ARUCO
                    </span>
                    <span class="text-xs text-blue-400 font-mono font-bold">ArUco Marker ID: 2</span>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="../simulations/sim03_viscometer_3d.html" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-blue-500/30 hover:border-blue-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-vr-cardboard"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D Viscometer Simulator</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ทดลองปล่อยลูกเหล็กในของเหลวความหนืดต่างๆ ปรับอุณหภูมิ และคำนวณค่าสัมประสิทธิ์ความหนืดแบบเรียลไทม์
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-blue-400 group-hover:translate-x-1 transition-transform">
                            เปิดห้องทดลอง 3D <i class="fas fa-arrow-right ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../webar/ar_aruco_textbook.html?marker=2" target="_blank"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-purple-500/30 hover:border-purple-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-camera"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">3D WebAR ArUco Marker 2</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                ส่องสมาร์ทโฟนไปที่มาร์กเกอร์ ArUco ID 2 เพื่อแสดงกระบอกตวงวัดความหนืดและลูกเหล็กลอย 3 มิติ
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-purple-400 group-hover:translate-x-1 transition-transform">
                            เปิดกล้องส่อง WebAR <i class="fas fa-qrcode ml-1.5"></i>
                        </span>
                    </a>

                    <a href="../labs/lab03_motion.php"
                       class="group p-5 rounded-xl bg-slate-800/80 hover:bg-slate-800 border border-emerald-500/30 hover:border-emerald-400 transition-all flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg mb-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <h4 class="font-bold text-white text-base mb-1">E-Report &amp; Lab 3</h4>
                            <p class="text-xs text-slate-400 leading-relaxed">
                                บันทึกผลเวลาปล่อยลูกเหล็กในน้ำกลั่นเทียบกับกลีเซอรีน และคำนวณค่าความหนืดส่งอาจารย์
                            </p>
                        </div>
                        <span class="mt-4 inline-flex items-center text-xs font-mono text-emerald-400 group-hover:translate-x-1 transition-transform">
                            กรอกรายงานออนไลน์ <i class="fas fa-file-alt ml-1.5"></i>
                        </span>
                    </a>
                </div>
            </div>

            <!-- 4. Biosafety Warning Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-rose-950/40 via-slate-900 to-slate-900 border border-rose-500/30 shadow-2xl space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center text-rose-400 border border-rose-500/30">
                        <i class="fas fa-biohazard text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">ข้อควรระวังความปลอดภัยในการใช้กลีเซอรีนเก็บเชื้อที่ -80&deg;C (Cryopreservation)</h3>
                        <p class="text-xs text-rose-300 font-mono">การป้องกันความหนืดสูงทำลายปลายไมโครปิเปตและการเกิดละอองฝอย</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 gap-4 text-xs md:text-sm text-slate-300">
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-exclamation-triangle"></i> กลีเซอรีนมีความหนืดสูงมาก: ปิเปตช้าๆ
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            กลีเซอรีนเข้มข้น 100% มีความหนืดสูงกว่าน้ำถึง 1,000 เท่า เวลาดูดด้วยไมโครปิเปตต้องผ่อนนิ้วขึ้นช้าๆ และรอ 3–5 วินาทีเพื่อให้ของเหลวไหลเข้าทิปจนเต็ม หากปล่อยนิ้วเร็ว ปริมาตรจะขาดหายไปมากกว่า 50%
                        </p>
                    </div>
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-rose-500/20 space-y-2">
                        <strong class="text-rose-400 flex items-center gap-1.5">
                            <i class="fas fa-shield-alt"></i> ระวังหลอด Cryovial ระเบิดจากไนโตรเจนเหลว
                        </strong>
                        <p class="text-slate-300 leading-relaxed">
                            เมื่อนำหลอดเก็บเชื้อแช่แข็งออกจากตู้ $-80^\circ\text{C}$ หรือถังไนโตรเจนเหลว ต้องสวมแว่นตานิรภัยและถุงมือกันความเย็นเสมอ เพราะการขยายตัวของก๊าซในหลอดอาจทำให้หลอดแตกกระจายได้
                        </p>
                    </div>
                </div>
            </div>

            <!-- 5. Clinical Case Study Box -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-purple-950/40 via-slate-900 to-slate-900 border border-purple-500/30 shadow-2xl space-y-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-mono bg-purple-500/20 text-purple-300 border border-purple-500/40">
                    <i class="fas fa-lightbulb"></i> CLINICAL CASE STUDY &bull; การตรวจทางห้องปฏิบัติการ
                </span>
                <h3 class="text-xl font-bold text-white">การตรวจอัตราการตกตะกอนของเม็ดเลือดแดง (ESR) กับกฎของสโตกส์</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    การทดสอบ <strong>Erythrocyte Sedimentation Rate (ESR)</strong> ในโรงพยาบาล ใช้ตรวจภาวะการอักเสบและการติดเชื้อแบคทีเรียรุนแรงในร่างกาย โดยเจาะเลือดใส่หลอดทดลองตั้งตรงทิ้งไว้ 1 ชั่วโมง เมื่อผู้ป่วยมีการติดเชื้อ ตับจะสร้างโปรตีนไฟบริโนเจน (Fibrinogen) เพิ่มขึ้น ทำให้เม็ดเลือดแดงมาเกาะกลุ่มกันเป็นก้อนคล้ายเหรียญเรียงซ้อน (Rouleaux Formation) ส่งผลให้รัศมีประสิทธิผล ($r$) เพิ่มขึ้นอย่างมาก ตามกฎของสโตกส์ ($v_t \propto r^2$) เม็ดเลือดแดงจึงตกตะกอนเร็วกว่าคนปกติอย่างเห็นได้ชัด
                </p>
            </div>

            <!-- Practical Experiment Blank Data Table -->
            <div class="p-6 md:p-8 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-4">
                <div class="flex items-center justify-between flex-wrap gap-2">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-table text-blue-400"></i> ตารางบันทึกผลการทดลอง ปฏิบัติการที่ 3
                    </h3>
                    <span class="text-xs text-slate-400 font-mono">การวัดความหนืดด้วยวิธีปล่อยทรงกลมตก ($s = 20\text{ cm}$)</span>
                </div>
                <div class="overflow-x-auto rounded-xl border border-slate-700/70">
                    <table class="w-full text-left text-xs md:text-sm text-slate-300">
                        <thead class="bg-slate-800 text-slate-200 font-mono text-xs uppercase">
                            <tr>
                                <th class="p-3">ชนิดของเหลว</th>
                                <th class="p-3 text-center">ครั้งที่ 1 ($\text{s}$)</th>
                                <th class="p-3 text-center">ครั้งที่ 2 ($\text{s}$)</th>
                                <th class="p-3 text-center">เวลาเฉลี่ย $t$ ($\text{s}$)</th>
                                <th class="p-3 text-center">อัตราเร็ว $v_t$ ($\text{m/s}$)</th>
                                <th class="p-3 text-center">ความหนืด $\eta$ ($\text{Pa}\cdot\text{s}$)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800 bg-slate-900/40 font-mono">
                            <tr>
                                <td class="p-3 font-sans">น้ำกลั่นบริสุทธิ์</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-blue-400">......</td>
                                <td class="p-3 text-center text-emerald-400">......</td>
                            </tr>
                            <tr>
                                <td class="p-3 font-sans">กลีเซอรีนเข้มข้น</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-slate-500">......</td>
                                <td class="p-3 text-center text-blue-400">......</td>
                                <td class="p-3 text-center text-emerald-400">......</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 6. OBE Formative Quiz (3 Questions) -->
            <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900 border border-slate-700/80 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-400 border border-blue-500/30">
                        <i class="fas fa-question-circle text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">แบบทดสอบประเมินตนเองประจำบท (OBE Self-Quiz)</h3>
                        <p class="text-xs text-slate-400 font-mono">วัดผลลัพธ์การเรียนรู้ CLO1 &bull; CLO2 &bull; CLO3</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Q1 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 1: หากสปอร์เชื้อรามีรัศมี $3\ \mu\text{m}$ และสปอร์แบคทีเรียมีรัศมี $1\ \mu\text{m}$ สปอร์เชื้อราจะตกตะกอนเร็วกว่ากี่เท่า?</span>
                            <i class="fas fa-chevron-down text-xs text-blue-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: 9 เท่า</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> ตามกฎของสโตกส์ อัตราเร็วตกตะกอนแปรผันตรงกับกำลังสองของรัศมี ($v_t \propto r^2$) รัศมีต่างกัน 3 เท่า จะตกตะกอนเร็วกว่า $3^2 = 9$ เท่า
                            </p>
                        </div>
                    </details>

                    <!-- Q2 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 2: เมื่อเราเพิ่มอุณหภูมิของอาหารเลี้ยงเชื้อเหลวขึ้น อัตราเร็วการตกตะกอนของเซลล์จะเปลี่ยนแปลงอย่างไร เพราะเหตุใด?</span>
                            <i class="fas fa-chevron-down text-xs text-blue-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: ตกตะกอนได้เร็วขึ้น เพราะความหนืดของของเหลวลดลง</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> เมื่ออุณหภูมิสูงขึ้น แรงยึดเหนี่ยวระหว่างโมเลกุลของเหลวลดลง ส่งผลให้ความหนืด ($\eta$) ลดลง ทำให้แรงต้านการจมลดลง เซลล์จึงตกตะกอนเร็วขึ้น
                            </p>
                        </div>
                    </details>

                    <!-- Q3 -->
                    <details class="group p-4 rounded-xl bg-slate-900/80 border border-slate-800 hover:border-slate-700 transition-all">
                        <summary class="font-bold text-sm text-slate-200 cursor-pointer list-none flex justify-between items-center">
                            <span>ข้อที่ 3: แรงกิริยา-ปฏิกิริยาตามกฎข้อที่ 3 ของนิวตัน ในการว่ายน้ำของแบคทีเรียคืออะไร?</span>
                            <i class="fas fa-chevron-down text-xs text-blue-400 group-open:rotate-180 transition-transform"></i>
                        </summary>
                        <div class="mt-3 pt-3 border-t border-slate-800 text-xs text-slate-300 space-y-1">
                            <p class="text-emerald-400 font-bold">เฉลย: แฟลกเจลลาหมุนผลักน้ำไปด้านหลัง น้ำจึงออกแรงผลักตัวเซลล์ไปข้างหน้า</p>
                            <p class="text-slate-400">
                                <strong>เหตุผล:</strong> แรงทั้งสองมีขนาดเท่ากันแต่มีทิศทางตรงกันข้าม และกระทำต่อวัตถุคนละชิ้น (แฟลกเจลลากระทำต่อน้ำ และน้ำกระทำต่อเซลล์)
                            </p>
                        </div>
                    </details>
                </div>
            </div>

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                <a href="ch02_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> บทที่ 2: เวกเตอร์และการเคลื่อนที่
                </a>
                <a href="ch04_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-400 hover:to-indigo-500 text-slate-950 font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-blue-500/20">
                    บทที่ 4: งาน พลังงาน และเครื่องปั่นเหวี่ยง <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>