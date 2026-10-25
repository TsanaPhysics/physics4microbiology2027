const ARUCO_DICT_4X4 = {
0:  [[1,0,1,1], [0,1,0,1], [0,0,1,1], [0,0,1,0]],
1:  [[0,0,0,0], [1,1,1,1], [1,0,0,1], [1,0,1,0]],
2:  [[0,0,1,1], [0,0,1,1], [0,1,0,0], [1,1,0,1]],
3:  [[1,0,0,1], [1,0,0,1], [0,1,0,0], [0,1,1,0]],
4:  [[0,1,0,1], [0,1,1,0], [1,0,0,1], [1,1,0,0]],
5:  [[1,1,0,1], [0,0,0,0], [0,1,1,1], [0,1,1,0]],
6:  [[0,1,1,1], [1,0,1,1], [0,0,0,0], [0,0,1,1]],
7:  [[0,0,1,0], [1,0,0,0], [1,1,1,0], [0,1,0,1]],
8:  [[1,1,1,0], [1,1,0,0], [0,0,1,0], [1,0,0,1]],
9:  [[0,1,0,0], [1,1,1,0], [1,0,1,1], [0,0,1,0]],
10: [[1,0,1,0], [0,0,1,0], [1,1,0,1], [0,1,1,0]],
11: [[1,1,0,0], [0,1,0,1], [0,0,0,1], [1,1,1,0]]
};
const CHAPTER_MODELS = [
{
id: 0, ch: 1,
short: "ID 0 • บทที่ 1 ไมโครปิเปต",
title: "ไมโครปิเปต P1000 และการเจือจางเชื้อแบบลำดับส่วน 3 มิติ",
sub: "ArUco ID 0 (DICT_4X4_50) — บทที่ 1 ระบบหน่วยและการวัดในโลกจุลทรรศน์",
desc: "จำลองกลไกลูกสูบไมโครปิเปต P1000 พร้อมหน้าปัดดิจิทัล จังหวะดูด-ปล่อยสารละลาย และหลอดเจือจางเชื้อแบคทีเรีย 10⁻¹ ถึง 10⁻⁶",
formula: "CFU/mL = N_colonies / (10^(-n) × V_mL)",
voice: "บทที่ 1 ระบบหน่วยและการวัดในโลกจุลทรรศน์ โมเดลสามมิตินี้แสดงไมโครปิเปตขนาด พีหนึ่งพัน และหลอดเจือจางเชื้อแบคทีเรียสิบกำลังลบหนึ่งถึงสิบกำลังลบหก เมื่อปรับปริมาตรและขั้นการเจือจาง ระบบจะคำนวณความเข้มข้นโคโลนี ซีเอฟยูต่อมิลลิลิตร แบบเรียลไทม์ครับ",
sliders: [
{ key: "vol", label: "ปริมาตรไมโครปิเปต V (μL)", min: 100, max: 1000, step: 50, val: 100 },
{ key: "dil", label: "ขั้นการเจือจาง n (10^-n)", min: 1, max: 6, step: 1, val: 5 },
{ key: "col", label: "จำนวนโคโลนีที่นับได้ (CFU)", min: 30, max: 300, step: 5, val: 142 }
]
},
{
id: 1, ch: 2,
short: "ID 1 • บทที่ 2 แฟลกเจลลา",
title: "การว่ายเคลื่อนที่ของแบคทีเรียด้วยแฟลกเจลลา vs. Brownian Motion",
sub: "ArUco ID 1 (DICT_4X4_50) — บทที่ 2 เวกเตอร์และการเคลื่อนที่ในของเหลว",
desc: "เปรียบเทียบมอเตอร์หมุนแฟลกเจลลาของแบคทีเรีย (Chemotaxis Run-and-Tumble) กับการชนแบบสุ่มบราวน์เนียนในของเหลว",
formula: "<r²> = 6·D·t ,  D = k_B·T / (6·π·η·a)",
voice: "บทที่ 2 เวกเตอร์และการเคลื่อนที่ในของเหลว แสดงเซลล์แบคทีเรียที่มีมอเตอร์โปรตีนหมุนเกลียวแฟลกเจลลาเพื่อว่ายเข้าหาสารอาหาร เปรียบเทียบกับอนุภาคคอลลอยด์สีทองที่เคลื่อนที่แบบสุ่มบราวน์เนียนตามอุณหภูมิครับ",
sliders: [
{ key: "rpm", label: "ความถี่หมุนแฟลกเจลลา (Hz)", min: 20, max: 200, step: 10, val: 110 },
{ key: "temp", label: "อุณหภูมิของเหลว T (°C)", min: 10, max: 45, step: 1, val: 37 },
{ key: "grad", label: "ความเข้มสารดึงดูดเคมี (%)", min: 0, max: 100, step: 5, val: 75 }
]
},
{
id: 2, ch: 3,
short: "ID 2 • บทที่ 3 กฎสโตกส์",
title: "การตกตะกอนตามกฎของสโตกส์และตู้ปลอดเชื้อ Laminar Airflow",
sub: "ArUco ID 2 (DICT_4X4_50) — บทที่ 3 กฎการเคลื่อนที่ของนิวตันและแรงหนืด",
desc: "จำลองสมดุลแรง 3 แรงบนเซลล์จุลินทรีย์ (mg, แรงลอยตัว, แรงต้านสโตกส์) และม่านอากาศบริสุทธิ์ผ่านแผ่นกรอง HEPA",
formula: "v_t = 2·r²·(ρ_p - ρ_f)·g / (9·η)",
voice: "บทที่ 3 กฎการเคลื่อนที่ของนิวตันและแรงหนืด ด้านซ้ายแสดงสมดุลแรงสามแรงที่กระทำต่อเซลล์จุลินทรีย์ขณะตกตะกอนตามกฎของสโตกส์ ส่วนด้านขวาแสดงม่านอากาศไหลแบบราบเรียบผ่านแผ่นกรองเฮปาในตู้ปลอดเชื้อครับ",
sliders: [
{ key: "radius", label: "รัศมีเซลล์จุลินทรีย์ r (μm)", min: 0.5, max: 5.0, step: 0.5, val: 2.5 },
{ key: "visc", label: "ความหนืดตัวกลาง η (mPa·s)", min: 0.8, max: 5.0, step: 0.2, val: 1.0 },
{ key: "airflow", label: "ความเร็วลม HEPA (m/s)", min: 0.2, max: 0.8, step: 0.05, val: 0.45 }
]
},
{
id: 3, ch: 4,
short: "ID 3 • บทที่ 4 เครื่องปั่นเหวี่ยง",
title: "เครื่องปั่นเหวี่ยงความเร็วสูง การแปลงค่า RCF (×g) และสมดุลโรเตอร์",
sub: "ArUco ID 3 (DICT_4X4_50) — บทที่ 4 งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง",
desc: "จำลองโรเตอร์มุมคงที่ 30 องศา การวางหลอดถ่วงสมดุลตรงข้ามกัน และการอัดแน่นของเม็ดตะกอนเซลล์ (Pellet) ที่ก้นหลอด",
formula: "RCF (×g) = 1.118 × 10^(-5) · r_cm · RPM²",
voice: "บทที่ 4 เครื่องปั่นเหวี่ยงความเร็วสูง แสดงโรเตอร์อะลูมิเนียมชุบอโนไดซ์บรรจุหลอดตัวอย่างหกหลอด เมื่อปั่นด้วยความเร็วรอบสูง แรงหนีศูนย์กลางสัมพัทธ์ อาร์ซีเอฟ จะอัดเซลล์แบคทีเรียให้รวมตัวเป็นเม็ดตะกอนเพ็ลเล็ตที่ก้นหลอดครับ",
sliders: [
{ key: "rpm", label: "ความเร็วรอบหมุน (RPM)", min: 1000, max: 14000, step: 500, val: 10000 },
{ key: "rcm", label: "รัศมีโรเตอร์ r_cm (cm)", min: 5.0, max: 12.0, step: 0.5, val: 8.5 },
{ key: "bal", label: "สมดุลหลอดตรงข้าม (1=สมดุล, 0=ไม่สมดุล)", min: 0, max: 1, step: 1, val: 1 }
]
},
{
id: 4, ch: 5,
short: "ID 4 • บทที่ 5 ตู้อบ & PCR",
title: "การกระจายความร้อนตู้อบ Incubator 37°C และวัฏจักรเครื่อง PCR",
sub: "ArUco ID 4 (DICT_4X4_50) — บทที่ 5 ความร้อนและการควบคุมอุณหภูมิชีวภาพ",
desc: "จำลองบล็อกความร้อนเพลเทียร์และเกลียวคู่ DNA 3 มิติในวัฏจักร PCR 3 ขั้นตอน (95°C แยกสาย / 55°C เกาะไพรเมอร์ / 72°C ต่อสาย)",
formula: "N_DNA = N_0 × 2^n ,  Q = m·c·ΔT",
voice: "บทที่ 5 ความร้อนและวัฏจักรเครื่องพีซีอาร์ แสดงบล็อกความร้อนเพลเทียร์และเกลียวคู่ดีเอ็นเอสามมิติ เมื่อเปลี่ยนขั้นอุณหภูมิเป็นเก้าสิบห้าองศาเซลเซียส เกลียวคู่ดีเอ็นเอจะคลายตัวแยกสาย และเพิ่มจำนวนทวีคูณสองยกกำลังเอ็นครับ",
sliders: [
{ key: "stage", label: "ขั้นวัฏจักร PCR (1=95°C, 2=55°C, 3=72°C)", min: 1, max: 3, step: 1, val: 1 },
{ key: "cycles", label: "จำนวนรอบวัฏจักร PCR (n)", min: 1, max: 35, step: 1, val: 25 },
{ key: "fan", label: "พัดลมพาความร้อน Incubator (%)", min: 20, max: 100, step: 10, val: 80 }
]
},
{
id: 5, ch: 6,
short: "ID 5 • บทที่ 6 หม้อนึ่ง Autoclave",
title: "หม้อนึ่งความดันไอ Autoclave (121°C, 15 psi) และการไล่อากาศ",
sub: "ArUco ID 5 (DICT_4X4_50) — บทที่ 6 อุณหพลศาสตร์ ความดันไอ และหม้อนึ่งความดันไอ",
desc: "แสดงห้องความดันไอน้ำอิ่มตัว เกจวัดความดัน ขวดอาหารเลี้ยงเชื้อ และการถ่ายเทความร้อนแฝงของการควบแน่นเพื่อทำลายสปอร์",
formula: "P_abs = P_atm + P_gauge ,  Q_latent = m·L_v",
voice: "บทที่ 6 อุณหพลศาสตร์และหม้อนึ่งความดันไอออโตเคลฟ เมื่อไล่อากาศออกหมดและเพิ่มความดันเกจเป็นสิบห้าปอนด์ต่อตารางนิ้ว อุณหภูมิไอน้ำอิ่มตัวจะสูงถึงหนึ่งร้อยยี่สิบเอ็ดองศาเซลเซียส สามารถทำลายสปอร์ของแบคทีเรียทนความร้อนได้สมบูรณ์ครับ",
sliders: [
{ key: "psi", label: "ความดันเกจไอน้ำ (psi)", min: 0, max: 20, step: 1, val: 15 },
{ key: "purge", label: "ร้อยละการไล่อากาศออก (%)", min: 50, max: 100, step: 5, val: 100 },
{ key: "time", label: "เวลาฆ่าเชื้อ (นาที)", min: 5, max: 30, step: 5, val: 15 }
]
},
{
id: 6, ch: 7,
short: "ID 6 • บทที่ 7 การย้อมสีแกรม",
title: "สนามไฟฟ้าคูลอมบ์ ศักย์ซีตาผนังเซลล์ และการยึดเกาะของสีย้อมแกรม",
sub: "ArUco ID 6 (DICT_4X4_50) — บทที่ 7 ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม",
desc: "จำลองโครงข่ายเพปทิโดไกลแคนและหมู่ฟอสเฟตประจุลบที่ดึงดูดไอออนสีย้อมประจุบวก (Crystal Violet) ด้วยแรงคูลอมบ์",
formula: "F_E = k_e · |q_cell · q_dye| / (ε_r · r²)",
voice: "บทที่ 7 ไฟฟ้าสถิตและการย้อมสีแกรม ผนังเซลล์แบคทีเรียมีหมู่ฟอสเฟตและกรดไทโคอิกที่มีประจุลบสุทธิ จึงสร้างสนามไฟฟ้าดึงดูดไอออนสีย้อมคริสตัลไวโอเลตที่มีประจุบวกให้เข้ามายึดเกาะอย่างแข็งแรงตามกฎของคูลอมบ์ครับ",
sliders: [
{ key: "ph", label: "ค่า pH ของสารละลายตัวกลาง", min: 3.0, max: 9.0, step: 0.5, val: 7.0 },
{ key: "charge", label: "ประจุสีย้อม (+1=Basic Dye, -1=Acidic Dye)", min: -1, max: 1, step: 2, val: 1 },
{ key: "dist", label: "ระยะห่างโมเลกุลสีย้อม r (nm)", min: 1.0, max: 8.0, step: 0.5, val: 2.5 }
]
},
{
id: 7, ch: 8,
short: "ID 7 • บทที่ 8 อิเล็กโทรโฟรีซิส",
title: "กฎของโอห์มและอ่างแยกสายดีเอ็นเอด้วยสนามไฟฟ้า Gel Electrophoresis",
sub: "ArUco ID 7 (DICT_4X4_50) — บทที่ 8 ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส",
desc: "จำลองการวิ่งของแถบดีเอ็นเอประจุลบจากขั้วลบ (สีดำ) ไปยังขั้วบวก (สีแดง Run to Red) แยกตามขนาดคู่เบส พร้อมฟองก๊าซที่ขั้วอิเล็กโทรด",
formula: "v = μ_e · E = μ_e · (V / L) ,  P = V² / R",
voice: "บทที่ 8 อ่างแยกสายดีเอ็นเอด้วยสนามไฟฟ้า เจลอิเล็กโทรโฟรีซิส โมเลกุลดีเอ็นเอมีประจุลบจะเคลื่อนที่จากขั้วลบสีดำไปยังขั้วบวกสีแดง โดยสายดีเอ็นเอขนาดเล็กจะเคลื่อนที่ผ่านรูพรุนของเจลอะกาโรสได้เร็วกว่าสายขนาดใหญ่ครับ",
sliders: [
{ key: "volt", label: "ความต่างศักย์ไฟฟ้า V (Volt)", min: 50, max: 150, step: 10, val: 100 },
{ key: "gel", label: "ความเข้มข้นเจลอะกาโรส (%)", min: 0.7, max: 2.0, step: 0.1, val: 1.0 },
{ key: "runtime", label: "เวลาการรันเจล (นาที)", min: 5, max: 45, step: 5, val: 25 }
]
},
{
id: 8, ch: 9,
short: "ID 8 • บทที่ 9 การหักเห & บริกซ์",
title: "การหักเหของสเนลล์และเครื่องวัดค่าบริกซ์การหมักยีสต์ Refractometer",
sub: "ArUco ID 8 (DICT_4X4_50) — บทที่ 9 ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง",
desc: "แสดงลำแสงเลเซอร์หักเหผ่านปริซึมน้ำหมักยีสต์ที่มีความเข้มข้นน้ำตาลต่างกัน พร้อมฟองก๊าซคาร์บอนไดออกไซด์และสเกล °Brix",
formula: "n_1 · sin(θ_1) = n_2 · sin(θ_2)",
voice: "บทที่ 9 การหักเหของแสงตามกฎของสเนลล์และเครื่องวัดความหวานบริกซ์ เมื่อยีสต์ใช้น้ำตาลในการหมักแอลกอฮอล์ ดัชนีหักเหของน้ำหมักจะเปลี่ยนแปลง ทำให้มุมหักเหของลำแสงเลเซอร์เปลี่ยนไปอย่างแม่นยำครับ",
sliders: [
{ key: "angle", label: "มุมตกกระทบ θ_1 (องศา)", min: 15, max: 70, step: 5, val: 45 },
{ key: "brix", label: "ความหวานน้ำหมัก (°Brix)", min: 0, max: 30, step: 2, val: 18 },
{ key: "ferm", label: "ชั่วโมงการหมักยีสต์ (ชม.)", min: 0, max: 48, step: 4, val: 16 }
]
},
{
id: 9, ch: 10,
short: "ID 9 • บทที่ 10 กล้องจุลทรรศน์ 100x",
title: "กล้องจุลทรรศน์เลนส์ประกอบและบทบาทของ Immersion Oil ที่หัวเลนส์ 100x",
sub: "ArUco ID 9 (DICT_4X4_50) — บทที่ 10 กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง",
desc: "เปรียบเทียบกรวยแสงที่เข้าสู่หัวเลนส์ใกล้วัตถุ 100x (แถบวงแหวนสีขาว) เมื่อหยดน้ำมันช่วยส่อง (n=1.515) กับกรณีสูญเสียแสงในอากาศ",
formula: "d_min = 0.61 · λ / NA ,  NA = n · sin(α)",
voice: "บทที่ 10 กล้องจุลทรรศน์และน้ำมันช่วยส่องที่หัวเลนส์หนึ่งร้อยเท่า การหยดน้ำมันที่มีดัชนีหักเหหนึ่งจุดห้าหนึ่งห้าเท่ากับแผ่นสไลด์แก้ว ช่วยป้องกันการสะท้อนกลับหมดของแสง เพิ่มค่ารูรับแสงเชิงตัวเลข เอ็นเอ ทำให้แยกภาพเซลล์แบคทีเรียได้คมชัดสูงสุดครับ",
sliders: [
{ key: "oil", label: "หยดน้ำมันช่วยส่อง (1=มีน้ำมัน n=1.515, 0=อากาศ)", min: 0, max: 1, step: 1, val: 1 },
{ key: "wave", label: "ความยาวคลื่นแสง λ (nm)", min: 450, max: 650, step: 25, val: 550 },
{ key: "focus", label: "การปรับปุ่มโฟกัสละเอียด (μm)", min: -10, max: 10, step: 1, val: 0 }
]
},
{
id: 10, ch: 11,
short: "ID 10 • บทที่ 11 รังสี UV-C",
title: "กัมมันตภาพรังสี กฎกำลังสองผกผัน และการฆ่าเชื้อด้วยรังสี UV-C (254 nm)",
sub: "ArUco ID 10 (DICT_4X4_50) — บทที่ 11 กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์",
desc: "จำลองโคมรังสี UV-C 254 nm คลื่นโฟตอนพลังงานสูงที่สร้างพันธะ Thymine Dimer ในสาย DNA และการลดลงของความเข้มรังสีตามระยะห่าง",
formula: "I(r) = P_uv / (4·π·r²) ,  S(t) = exp(-k·I·t)",
voice: "บทที่ 11 กัมมันตภาพรังสีและการฆ่าเชื้อด้วยรังสียูวีซีที่ความยาวคลื่นสองร้อยห้าสิบสี่นาโนเมตร ความเข้มรังสีจะลดลงตามกฎกำลังสองผกผันกับระยะห่าง และโฟตอนยูวีซีจะทำลายดีเอ็นเอของแบคทีเรียด้วยการสร้างพันธะไทมีนไดเมอร์ครับ",
sliders: [
{ key: "dist", label: "ระยะห่างจากหลอด UV-C r (cm)", min: 15, max: 100, step: 5, val: 30 },
{ key: "time", label: "เวลาฉายรังสี t (วินาที)", min: 10, max: 180, step: 10, val: 60 },
{ key: "power", label: "กำลังหลอดรังสี UV-C (W)", min: 8, max: 36, step: 4, val: 16 }
]
},
{
id: 11, ch: 12,
short: "ID 11 • บทที่ 12 การวัดค่า OD600",
title: "สเปกโตรโฟโตมิเตอร์ กฎของเบียร์-แลมเบิร์ต และการวัดค่าความขุ่น OD600",
sub: "ArUco ID 11 (DICT_4X4_50) — บทที่ 12 สเปกโตรโฟโตมิเตอร์และโครงงานบูรณาการ",
desc: "จำลองเกรตติงแยกแสงโมโนโครเมเตอร์ 600 nm ส่องผ่านหลอด Cuvette บรรจุเซลล์แบคทีเรียแขวนลอย พร้อมหัววัดโฟโตไดโอดและกราฟการเจริญเติบโต",
formula: "OD600 = -log10(I / I_0) = -log10(%T / 100)",
voice: "บทที่ 12 เครื่องสเปกโตรโฟโตมิเตอร์และการวัดความขุ่นของเชื้อที่ความยาวคลื่นหกร้อยนาโนเมตร โอดีหกร้อย เมื่อความหนาแน่นเซลล์แบคทีเรียในหลอดคิวเวตต์เพิ่มขึ้น แสงจะกระเจิงมากขึ้นทำให้ความเข้มแสงที่ทะลุผ่านไปยังหัววัดลดลงตามกฎของเบียร์และแลมเบิร์ตครับ",
sliders: [
{ key: "od", label: "ค่าความขุ่นจริงของเชื้อ (True OD600)", min: 0.1, max: 2.5, step: 0.1, val: 0.6 },
{ key: "df", label: "ตัวคูณการเจือจางก่อนวัด (DF)", min: 1, max: 10, step: 1, val: 1 },
{ key: "hour", label: "ชั่วโมงการบ่มเพาะเชื้อ (ชม.)", min: 0, max: 16, step: 1, val: 5 }
]
}
];
let currentMarkerId = 0;
let params = {};
let isARMode = false;
let isTargetLocked = false;
let isExploded = false;
let showLabels = true;
let handSimActive = false;
let gyroEnabled = false;
let gyroOffset = { alpha: 0, beta: 0, gamma: 0 };
let audioCtx = null;
let deferredInstallPrompt = null;
if ('serviceWorker' in navigator) {
window.addEventListener('load', () => {
navigator.serviceWorker.register('sw.js').catch(() => {});
});
}
window.addEventListener('beforeinstallprompt', (e) => {
e.preventDefault();
deferredInstallPrompt = e;
});
function triggerPWAInstall() {
if (deferredInstallPrompt) {
deferredInstallPrompt.prompt();
} else {
alert('วิธีติดตั้งเป็นแอปสมาร์ทโฟน:\n• iPhone/iPad (Safari): แตะปุ่ม แชร์ (Share) ด้านล่าง แล้วเลือก "เพิ่มไปยังหน้าจอโฮม (Add to Home Screen)"\n• Android (Chrome): แตะเมนู ⋮ มุมขวาบน แล้วเลือก "ติดตั้งแอป (Install App)"');
}
}
function openPhoneGuide() {
document.getElementById('phone-modal').classList.add('open');
}
function closePhoneGuide() {
document.getElementById('phone-modal').classList.remove('open');
}
function copyArUrl() {
const txt = document.getElementById('gh-ar-url').textContent;
navigator.clipboard?.writeText(txt);
alert('คัดลอกลิงก์ WebAR สำเร็จ:\n' + txt);
}
function playLockChime() {
try {
if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
const now = audioCtx.currentTime;
[523.25, 659.25, 783.99, 1046.50].forEach((freq, idx) => {
const osc = audioCtx.createOscillator();
const gain = audioCtx.createGain();
osc.type = 'triangle';
osc.frequency.setValueAtTime(freq, now + idx * 0.065);
gain.gain.setValueAtTime(0.14, now + idx * 0.065);
gain.gain.exponentialRampToValueAtTime(0.001, now + idx * 0.065 + 0.24);
osc.connect(gain);
gain.connect(audioCtx.destination);
osc.start(now + idx * 0.065);
osc.stop(now + idx * 0.065 + 0.25);
});
} catch (e) {}
}
function speakCurrentChapter() {
if (!('speechSynthesis' in window)) return;
window.speechSynthesis.cancel();
const cfg = CHAPTER_MODELS[currentMarkerId];
const u = new SpeechSynthesisUtterance(cfg.voice);
u.lang = 'th-TH';
u.rate = 0.98;
u.pitch = 0.96;
const voices = window.speechSynthesis.getVoices();
const thVoice = voices.find(v => v.lang.startsWith('th') && v.name.includes('Google')) || voices.find(v => v.lang.startsWith('th'));
if (thVoice) u.voice = thVoice;
const wave = document.getElementById('ai-wave-ind');
u.onstart = () => wave.classList.add('speaking');
u.onend = () => wave.classList.remove('speaking');
u.onerror = () => wave.classList.remove('speaking');
window.speechSynthesis.speak(u);
}
function stopAISpeech() {
if ('speechSynthesis' in window) window.speechSynthesis.cancel();
document.getElementById('ai-wave-ind').classList.remove('speaking');
}
const container = document.getElementById('canvas-container');
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(42, window.innerWidth / window.innerHeight, 0.1, 100);
camera.position.set(0, 2.35, 6.1);
const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2.2));
renderer.toneMapping = THREE.ACESFilmicToneMapping;
renderer.toneMappingExposure = 1.28;
renderer.outputEncoding = THREE.sRGBEncoding;
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;
container.appendChild(renderer.domElement);
function buildStudioEnvironment() {
const pmrem = new THREE.PMREMGenerator(renderer);
pmrem.compileEquirectangularShader();
const envScene = new THREE.Scene();
envScene.background = new THREE.Color(0x050b1a);
const topPanel = new THREE.Mesh(
new THREE.PlaneGeometry(20, 20),
new THREE.MeshBasicMaterial({ color: 0xe0f2fe, side: THREE.DoubleSide })
);
topPanel.position.set(0, 9, 0);
topPanel.rotation.x = Math.PI / 2;
envScene.add(topPanel);
const cyanStrip = new THREE.Mesh(
new THREE.PlaneGeometry(16, 4),
new THREE.MeshBasicMaterial({ color: 0x00f0ff, side: THREE.DoubleSide })
);
cyanStrip.position.set(-8, 3, 6);
cyanStrip.lookAt(0, 0, 0);
envScene.add(cyanStrip);
const magentaStrip = new THREE.Mesh(
new THREE.PlaneGeometry(16, 4),
new THREE.MeshBasicMaterial({ color: 0xf43f5e, side: THREE.DoubleSide })
);
magentaStrip.position.set(8, 2, -6);
magentaStrip.lookAt(0, 0, 0);
envScene.add(magentaStrip);
const warmStrip = new THREE.Mesh(
new THREE.PlaneGeometry(14, 4),
new THREE.MeshBasicMaterial({ color: 0xfbbf24, side: THREE.DoubleSide })
);
warmStrip.position.set(0, -6, 7);
warmStrip.lookAt(0, 0, 0);
envScene.add(warmStrip);
const rt = pmrem.fromScene(envScene, 0.04);
scene.environment = rt.texture;
pmrem.dispose();
}
buildStudioEnvironment();
const controls = new THREE.OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.055;
controls.autoRotate = true;
controls.autoRotateSpeed = 1.05;
controls.maxDistance = 13;
controls.minDistance = 2.2;
controls.target.set(0, -0.15, 0);
const hemiLight = new THREE.HemisphereLight(0xe0f2fe, 0x091326, 0.9);
scene.add(hemiLight);
const keyLight = new THREE.DirectionalLight(0xffffff, 1.55);
keyLight.position.set(5.5, 8.5, 6.5);
keyLight.castShadow = true;
scene.add(keyLight);
const cyanRim = new THREE.DirectionalLight(0x00f0ff, 1.05);
cyanRim.position.set(-6.5, 4.5, -5.0);
scene.add(cyanRim);
const roseRim = new THREE.PointLight(0xec4899, 0.75, 16);
roseRim.position.set(4.5, -2.5, -4.5);
scene.add(roseRim);
const modelGroup = new THREE.Group();
scene.add(modelGroup);
const labelsGroup = new THREE.Group();
modelGroup.add(labelsGroup);
let dynamicObjects = {};
let explodingParts = [];
function add3DLabel(text, x, y, z, borderColor = '#00f0ff') {
const c = document.createElement('canvas');
c.width = 512; c.height = 112;
const ctx = c.getContext('2d');
ctx.fillStyle = 'rgba(4, 12, 30, 0.86)';
ctx.strokeStyle = borderColor;
ctx.lineWidth = 5;
const r = 24;
ctx.beginPath();
ctx.moveTo(12 + r, 12);
ctx.lineTo(500 - r, 12);
ctx.quadraticCurveTo(500, 12, 500, 12 + r);
ctx.lineTo(500, 100 - r);
ctx.quadraticCurveTo(500, 100, 500 - r, 100);
ctx.lineTo(12 + r, 100);
ctx.quadraticCurveTo(12, 100, 12, 100 - r);
ctx.lineTo(12, 12 + r);
ctx.quadraticCurveTo(12, 12, 12 + r, 12);
ctx.closePath();
ctx.fill();
ctx.stroke();
ctx.fillStyle = borderColor;
ctx.beginPath();
ctx.arc(42, 56, 10, 0, Math.PI * 2);
ctx.fill();
ctx.font = 'bold 30px Prompt, Sarabun, sans-serif';
ctx.fillStyle = '#f8fafc';
ctx.textBaseline = 'middle';
ctx.fillText(text, 66, 57);
const tex = new THREE.CanvasTexture(c);
const mat = new THREE.SpriteMaterial({ map: tex, transparent: true, depthTest: false });
const sprite = new THREE.Sprite(mat);
sprite.position.set(x, y, z);
sprite.scale.set(1.45, 0.32, 1);
labelsGroup.add(sprite);
}
function registerExplode(mesh, dx, dy, dz) {
mesh.userData.origPos = mesh.position.clone();
mesh.userData.expOffset = new THREE.Vector3(dx, dy, dz);
explodingParts.push(mesh);
}
function createArUcoPedestal(markerId) {
const pedGroup = new THREE.Group();
pedGroup.position.y = -1.55;
const cRing = document.createElement('canvas');
cRing.width = 512; cRing.height = 512;
const rCtx = cRing.getContext('2d');
rCtx.strokeStyle = '#00f0ff';
rCtx.lineWidth = 6;
rCtx.setLineDash([28, 16]);
rCtx.beginPath();
rCtx.arc(256, 256, 238, 0, Math.PI * 2);
rCtx.stroke();
rCtx.strokeStyle = '#10b981';
rCtx.lineWidth = 4;
rCtx.setLineDash([12, 20]);
rCtx.beginPath();
rCtx.arc(256, 256, 205, 0, Math.PI * 2);
rCtx.stroke();
const ringTex = new THREE.CanvasTexture(cRing);
const holoPlane = new THREE.Mesh(
new THREE.PlaneGeometry(4.3, 4.3),
new THREE.MeshBasicMaterial({ map: ringTex, transparent: true, opacity: 0.72, side: THREE.DoubleSide, depthWrite: false })
);
holoPlane.rotation.x = -Math.PI / 2;
holoPlane.position.y = 0.03;
pedGroup.add(holoPlane);
dynamicObjects.holoRing = holoPlane;
const c = document.createElement('canvas');
c.width = 512; c.height = 512;
const ctx = c.getContext('2d');
ctx.fillStyle = '#ffffff';
ctx.fillRect(0, 0, 512, 512);
const mat = ARUCO_DICT_4X4[markerId];
const pad = 44;
const cell = (512 - pad * 2) / 6;
for (let r = 0; r < 6; r++) {
for (let col = 0; col < 6; col++) {
let white = false;
if (r >= 1 && r <= 4 && col >= 1 && col <= 4) {
white = (mat[r - 1][col - 1] === 1);
}
ctx.fillStyle = white ? '#ffffff' : '#020617';
ctx.fillRect(pad + col * cell, pad + r * cell, cell + 1, cell + 1);
}
}
ctx.fillStyle = '#10b981';
ctx.beginPath();
ctx.moveTo(14, 14); ctx.lineTo(68, 14); ctx.lineTo(14, 68); ctx.closePath();
ctx.fill();
const tex = new THREE.CanvasTexture(c);
const plateGeo = new THREE.BoxGeometry(2.35, 0.1, 2.35);
const sideMat = new THREE.MeshStandardMaterial({ color: 0x0f172a, metalness: 0.8, roughness: 0.2, emissive: 0x0284c7, emissiveIntensity: 0.2 });
const plateMat = [
sideMat, sideMat,
new THREE.MeshStandardMaterial({ map: tex, roughness: 0.25, metalness: 0.05 }),
sideMat, sideMat, sideMat
];
const plate = new THREE.Mesh(plateGeo, plateMat);
pedGroup.add(plate);
return pedGroup;
}
function buildModelForChapter(id) {
while (modelGroup.children.length > 0) {
modelGroup.remove(modelGroup.children[0]);
}
while (labelsGroup.children.length > 0) {
labelsGroup.remove(labelsGroup.children[0]);
}
modelGroup.add(labelsGroup);
labelsGroup.visible = showLabels;
dynamicObjects = {};
explodingParts = [];
modelGroup.add(createArUcoPedestal(id));
const chromeMat = new THREE.MeshStandardMaterial({ color: 0xe2e8f0, metalness: 0.92, roughness: 0.12 });
const titaniumMat = new THREE.MeshStandardMaterial({ color: 0x64748b, metalness: 0.85, roughness: 0.22 });
const darkAnodized = new THREE.MeshStandardMaterial({ color: 0x1e293b, metalness: 0.65, roughness: 0.28 });
const blueAnodized = new THREE.MeshPhysicalMaterial({ color: 0x0284c7, metalness: 0.55, roughness: 0.2, clearcoat: 0.8 });
const goldBrass = new THREE.MeshStandardMaterial({ color: 0xfbbf24, metalness: 0.88, roughness: 0.18 });
const copperMat = new THREE.MeshStandardMaterial({ color: 0xea580c, metalness: 0.85, roughness: 0.2 });
const cyanNeon = new THREE.MeshStandardMaterial({ color: 0x00f0ff, emissive: 0x00b4d8, emissiveIntensity: 0.65, roughness: 0.15 });
const emeraldBio = new THREE.MeshPhysicalMaterial({ color: 0x10b981, emissive: 0x059669, emissiveIntensity: 0.4, roughness: 0.2, clearcoat: 0.9 });
const magentaNeon = new THREE.MeshStandardMaterial({ color: 0xf43f5e, emissive: 0xe11d48, emissiveIntensity: 0.6, roughness: 0.2 });
const violetGlow = new THREE.MeshStandardMaterial({ color: 0xa855f7, emissive: 0x7e22ce, emissiveIntensity: 0.65, roughness: 0.2 });
const opticalGlass = new THREE.MeshPhysicalMaterial({
color: 0xe0f2fe, transparent: true, opacity: 0.36, roughness: 0.05, metalness: 0.05, clearcoat: 1.0, clearcoatRoughness: 0.05
});
if (id === 0) {
const pipGroup = new THREE.Group();
pipGroup.position.set(-0.95, 0.38, 0);
const grip = new THREE.Mesh(new THREE.CylinderGeometry(0.17, 0.14, 1.35, 32), blueAnodized);
pipGroup.add(grip);
const hook = new THREE.Mesh(new THREE.BoxGeometry(0.32, 0.07, 0.14), darkAnodized);
hook.position.set(0.14, 0.58, 0);
pipGroup.add(hook);
const winBox = new THREE.Mesh(new THREE.BoxGeometry(0.12, 0.36, 0.22), darkAnodized);
winBox.position.set(0.12, 0.15, 0);
pipGroup.add(winBox);
const plunger = new THREE.Mesh(new THREE.CylinderGeometry(0.06, 0.06, 0.55, 24), chromeMat);
plunger.position.y = 0.85;
const capBtn = new THREE.Mesh(new THREE.CylinderGeometry(0.13, 0.13, 0.1, 24), goldBrass);
capBtn.position.y = 0.28;
plunger.add(capBtn);
pipGroup.add(plunger);
dynamicObjects.plunger = plunger;
registerExplode(plunger, 0, 0.55, 0);
const shaft = new THREE.Mesh(new THREE.CylinderGeometry(0.11, 0.06, 0.55, 24), darkAnodized);
shaft.position.y = -0.82;
pipGroup.add(shaft);
const tipCone = new THREE.Mesh(new THREE.ConeGeometry(0.095, 0.85, 28), opticalGlass);
tipCone.rotation.x = Math.PI;
tipCone.position.y = -1.35;
pipGroup.add(tipCone);
registerExplode(tipCone, 0, -0.55, 0);
const liqInTip = new THREE.Mesh(new THREE.ConeGeometry(0.078, 0.58, 24), cyanNeon);
liqInTip.rotation.x = Math.PI;
liqInTip.position.y = -1.46;
pipGroup.add(liqInTip);
dynamicObjects.liqInTip = liqInTip;
modelGroup.add(pipGroup);
const rackBase = new THREE.Mesh(new THREE.BoxGeometry(2.35, 0.12, 0.72), titaniumMat);
rackBase.position.set(0.55, -1.35, 0);
const rackTop = new THREE.Mesh(new THREE.BoxGeometry(2.35, 0.08, 0.72), blueAnodized);
rackTop.position.set(0.55, -0.55, 0);
modelGroup.add(rackBase, rackTop);
for (let i = 0; i < 6; i++) {
const tx = -0.38 + i * 0.37;
const tube = new THREE.Mesh(new THREE.CylinderGeometry(0.115, 0.105, 1.25, 24), opticalGlass);
tube.position.set(tx, -0.75, 0);
modelGroup.add(tube);
const cap = new THREE.Mesh(new THREE.CylinderGeometry(0.125, 0.125, 0.12, 20), i === 4 ? magentaNeon : blueAnodized);
cap.position.set(tx, -0.08, 0);
modelGroup.add(cap);
registerExplode(cap, 0, 0.45, 0);
const hue = 0.45 - i * 0.04;
const liqMat = new THREE.MeshPhysicalMaterial({
color: new THREE.Color().setHSL(hue, 0.9, 0.48),
emissive: new THREE.Color().setHSL(hue, 0.8, 0.22),
transparent: true, opacity: 0.9 - i * 0.11, roughness: 0.1, clearcoat: 1.0
});
const liq = new THREE.Mesh(new THREE.CylinderGeometry(0.095, 0.09, 0.78, 20), liqMat);
liq.position.set(tx, -0.92, 0);
modelGroup.add(liq);
}
add3DLabel("ไมโครปิเปต P1000 (2 จังหวะ)", -0.95, 1.65, 0, "#00f0ff");
add3DLabel("หลอดเจือจาง 10⁻¹ ถึง 10⁻⁶", 0.58, 0.35, 0, "#10b981");
} else if (id === 1) {
const bacGroup = new THREE.Group();
const outerRod = new THREE.Mesh(new THREE.CylinderGeometry(0.42, 0.42, 1.25, 32), opticalGlass);
outerRod.rotation.z = Math.PI / 2;
bacGroup.add(outerRod);
registerExplode(outerRod, 0, 0.65, 0);
const innerRod = new THREE.Mesh(new THREE.CylinderGeometry(0.36, 0.36, 1.18, 32), emeraldBio);
innerRod.rotation.z = Math.PI / 2;
bacGroup.add(innerRod);
const capL = new THREE.Mesh(new THREE.SphereGeometry(0.36, 28, 28), emeraldBio);
capL.position.x = -0.59;
const capR = new THREE.Mesh(new THREE.SphereGeometry(0.36, 28, 28), emeraldBio);
capR.position.x = 0.59;
bacGroup.add(capL, capR);
const motorRing1 = new THREE.Mesh(new THREE.TorusGeometry(0.18, 0.045, 16, 32), goldBrass);
motorRing1.rotation.y = Math.PI / 2;
motorRing1.position.x = -0.92;
const motorRing2 = new THREE.Mesh(new THREE.TorusGeometry(0.12, 0.035, 16, 32), copperMat);
motorRing2.rotation.y = Math.PI / 2;
motorRing2.position.x = -0.82;
bacGroup.add(motorRing1, motorRing2);
const flagGroup = new THREE.Group();
for (let f = 0; f < 3; f++) {
const phase = (f * Math.PI * 2) / 3;
const mat = f === 0 ? cyanNeon : (f === 1 ? emeraldBio : goldBrass);
for (let i = 0; i < 45; i++) {
const t = i / 45;
const seg = new THREE.Mesh(new THREE.SphereGeometry(0.042, 10, 10), mat);
seg.position.set(
-0.95 - t * 1.75,
Math.sin(t * Math.PI * 5.5 + phase) * 0.24,
Math.cos(t * Math.PI * 5.5 + phase) * 0.24
);
flagGroup.add(seg);
}
}
bacGroup.add(flagGroup);
dynamicObjects.flagGroup = flagGroup;
dynamicObjects.bacGroup = bacGroup;
modelGroup.add(bacGroup);
const vArrow = new THREE.ArrowHelper(new THREE.Vector3(1, 0, 0), new THREE.Vector3(0.95, 0, 0), 0.85, 0x00f0ff, 0.22, 0.14);
bacGroup.add(vArrow);
dynamicObjects.brownian = [];
for (let i = 0; i < 28; i++) {
const p = new THREE.Mesh(new THREE.SphereGeometry(0.075, 14, 14), i % 2 === 0 ? goldBrass : magentaNeon);
p.position.set((Math.random() - 0.5) * 3.0, (Math.random() - 0.5) * 1.9, (Math.random() - 0.5) * 2.2);
modelGroup.add(p);
dynamicObjects.brownian.push(p);
}
add3DLabel("มอเตอร์แฟลกเจลลาหมุน 110 Hz", -1.45, 0.85, 0, "#00f0ff");
add3DLabel("เวกเตอร์ว่าย Chemotaxis", 1.15, 0.75, 0, "#10b981");
} else if (id === 2) {
const col = new THREE.Mesh(new THREE.CylinderGeometry(0.62, 0.62, 2.35, 36), opticalGlass);
col.position.set(-0.75, -0.22, 0);
modelGroup.add(col);
const liqCol = new THREE.Mesh(new THREE.CylinderGeometry(0.56, 0.56, 2.0, 32), new THREE.MeshPhysicalMaterial({
color: 0x0284c7, transparent: true, opacity: 0.22, roughness: 0.1
}));
liqCol.position.set(-0.75, -0.32, 0);
modelGroup.add(liqCol);
const cellSphere = new THREE.Mesh(new THREE.SphereGeometry(0.24, 32, 32), emeraldBio);
cellSphere.position.set(-0.75, 0.1, 0);
modelGroup.add(cellSphere);
dynamicObjects.stokesCell = cellSphere;
const arrowDown = new THREE.ArrowHelper(new THREE.Vector3(0, -1, 0), new THREE.Vector3(-0.75, -0.15, 0), 0.75, 0xf43f5e, 0.2, 0.14);
const arrowUp = new THREE.ArrowHelper(new THREE.Vector3(0, 1, 0), new THREE.Vector3(-0.75, 0.35, 0), 0.75, 0x00f0ff, 0.2, 0.14);
modelGroup.add(arrowDown, arrowUp);
const hood = new THREE.Mesh(new THREE.BoxGeometry(1.45, 2.05, 1.15), darkAnodized);
hood.position.set(0.85, -0.35, 0);
modelGroup.add(hood);
const hepa = new THREE.Mesh(new THREE.BoxGeometry(1.28, 0.22, 0.98), cyanNeon);
hepa.position.set(0.85, 0.52, 0);
modelGroup.add(hepa);
registerExplode(hepa, 0, 0.55, 0);
dynamicObjects.streamlines = [];
for (let i = 0; i < 6; i++) {
const bar = new THREE.Mesh(new THREE.CylinderGeometry(0.024, 0.024, 1.25, 12), cyanNeon);
bar.position.set(0.38 + i * 0.19, -0.28, 0.32);
modelGroup.add(bar);
dynamicObjects.streamlines.push(bar);
}
add3DLabel("สมดุลแรงสโตกส์ (mg = F_B + F_d)", -0.85, 1.25, 0, "#f43f5e");
add3DLabel("แผ่นกรอง HEPA Laminar Flow", 0.85, 1.05, 0, "#00f0ff");
} else if (id === 3) {
const chamber = new THREE.Mesh(new THREE.CylinderGeometry(1.52, 1.62, 0.92, 40), darkAnodized);
chamber.position.y = -1.02;
modelGroup.add(chamber);
const rimRing = new THREE.Mesh(new THREE.TorusGeometry(1.52, 0.07, 16, 48), chromeMat);
rimRing.rotation.x = Math.PI / 2;
rimRing.position.y = -0.56;
modelGroup.add(rimRing);
const rotorGroup = new THREE.Group();
rotorGroup.position.y = -0.32;
const hub = new THREE.Mesh(new THREE.CylinderGeometry(0.45, 0.72, 0.78, 36), blueAnodized);
rotorGroup.add(hub);
const nut = new THREE.Mesh(new THREE.CylinderGeometry(0.22, 0.22, 0.18, 6), goldBrass);
nut.position.y = 0.45;
rotorGroup.add(nut);
registerExplode(nut, 0, 0.55, 0);
dynamicObjects.rotorTubes = [];
for (let i = 0; i < 6; i++) {
const ang = (i / 6) * Math.PI * 2;
const tHolder = new THREE.Group();
tHolder.rotation.y = ang;
const tubeGroup = new THREE.Group();
tubeGroup.position.set(0.84, 0.08, 0);
tubeGroup.rotation.z = -0.52; // 30-deg fixed angle
const tubeShell = new THREE.Mesh(new THREE.CylinderGeometry(0.12, 0.055, 0.82, 24), opticalGlass);
tubeGroup.add(tubeShell);
const supernatant = new THREE.Mesh(new THREE.CylinderGeometry(0.10, 0.05, 0.58, 20), i % 2 === 0 ? cyanNeon : emeraldBio);
supernatant.position.y = -0.05;
tubeGroup.add(supernatant);
const pellet = new THREE.Mesh(new THREE.SphereGeometry(0.062, 16, 16), goldBrass);
pellet.position.y = -0.38;
tubeGroup.add(pellet);
tHolder.add(tubeGroup);
rotorGroup.add(tHolder);
dynamicObjects.rotorTubes.push(tubeGroup);
}
modelGroup.add(rotorGroup);
dynamicObjects.rotorGroup = rotorGroup;
add3DLabel("โรเตอร์มุมคงที่ 30° (สมดุล 6 หลอด)", 0, 0.75, 0, "#00f0ff");
add3DLabel("ตะกอนเซลล์อัดแน่น (Cell Pellet)", 1.25, -0.35, 0, "#fbbf24");
} else if (id === 4) {
const block = new THREE.Mesh(new THREE.BoxGeometry(2.25, 0.62, 1.55), goldBrass);
block.position.y = -0.98;
modelGroup.add(block);
for (let f = -0.9; f <= 0.9; f += 0.3) {
const fin = new THREE.Mesh(new THREE.BoxGeometry(0.06, 0.35, 1.62), titaniumMat);
fin.position.set(f, -1.25, 0);
modelGroup.add(fin);
}
dynamicObjects.pcrTubes = [];
for (let r = 0; r < 3; r++) {
for (let c = 0; c < 4; c++) {
const pTube = new THREE.Mesh(new THREE.CylinderGeometry(0.11, 0.055, 0.78, 20), cyanNeon);
pTube.position.set(-0.62 + c * 0.42, -0.42, -0.36 + r * 0.36);
modelGroup.add(pTube);
dynamicObjects.pcrTubes.push(pTube);
}
}
const dnaGroup = new THREE.Group();
dnaGroup.position.y = 0.65;
for (let i = 0; i < 22; i++) {
const y = -0.68 + i * 0.065;
const a = i * 0.52;
const x1 = Math.cos(a) * 0.38, z1 = Math.sin(a) * 0.38;
const x2 = Math.cos(a + Math.PI) * 0.38, z2 = Math.sin(a + Math.PI) * 0.38;
const s1 = new THREE.Mesh(new THREE.SphereGeometry(0.058, 14, 14), cyanNeon);
s1.position.set(x1, y, z1);
const s2 = new THREE.Mesh(new THREE.SphereGeometry(0.058, 14, 14), magentaNeon);
s2.position.set(x2, y, z2);
const rung = new THREE.Mesh(new THREE.CylinderGeometry(0.02, 0.02, 0.74, 8), i % 2 === 0 ? emeraldBio : goldBrass);
rung.position.set(0, y, 0);
rung.rotation.z = Math.PI / 2;
rung.rotation.y = -a;
dnaGroup.add(s1, s2, rung);
}
modelGroup.add(dnaGroup);
dynamicObjects.dnaGroup = dnaGroup;
registerExplode(dnaGroup, 0, 0.45, 0);
add3DLabel("เกลียวคู่ DNA เพิ่มจำนวน 2ⁿ เท่า", 0, 1.55, 0, "#f43f5e");
add3DLabel("บล็อกความร้อน Peltier (95/55/72°C)", 0, -0.55, 0.9, "#fbbf24");
} else if (id === 5) {
const chamber = new THREE.Mesh(new THREE.CylinderGeometry(0.98, 0.98, 2.1, 40), opticalGlass);
chamber.position.y = -0.35;
modelGroup.add(chamber);
const jacket = new THREE.Mesh(new THREE.CylinderGeometry(1.04, 1.04, 0.45, 40), copperMat);
jacket.position.y = -1.15;
modelGroup.add(jacket);
const lidGroup = new THREE.Group();
lidGroup.position.y = 0.78;
const lid = new THREE.Mesh(new THREE.CylinderGeometry(1.05, 1.05, 0.22, 40), chromeMat);
lidGroup.add(lid);
const wheel = new THREE.Mesh(new THREE.TorusGeometry(0.44, 0.06, 16, 36), darkAnodized);
wheel.rotation.x = Math.PI / 2;
wheel.position.y = 0.24;
lidGroup.add(wheel);
const gauge = new THREE.Mesh(new THREE.CylinderGeometry(0.22, 0.22, 0.1, 24), goldBrass);
gauge.rotation.x = Math.PI / 2;
gauge.position.set(0.65, 0.28, 0.35);
lidGroup.add(gauge);
modelGroup.add(lidGroup);
registerExplode(lidGroup, 0, 0.65, 0);
const flask = new THREE.Mesh(new THREE.ConeGeometry(0.45, 0.82, 28), emeraldBio);
flask.position.y = -0.82;
modelGroup.add(flask);
dynamicObjects.steamParticles = [];
for (let i = 0; i < 32; i++) {
const sp = new THREE.Mesh(new THREE.SphereGeometry(0.065, 12, 12), cyanNeon);
sp.position.set((Math.random() - 0.5) * 1.3, -1.1 + Math.random() * 1.6, (Math.random() - 0.5) * 1.3);
modelGroup.add(sp);
dynamicObjects.steamParticles.push(sp);
}
add3DLabel("ฝาล็อกความดัน & เกจ 15 psi", 0, 1.42, 0, "#fbbf24");
add3DLabel("ไอน้ำอิ่มตัว 121°C ฆ่าสปอร์", 0, -0.15, 1.0, "#00f0ff");
} else if (id === 6) {
const wall = new THREE.Mesh(new THREE.BoxGeometry(2.7, 0.48, 1.6), violetGlow);
wall.position.y = -0.88;
modelGroup.add(wall);
for (let x = -1.05; x <= 1.05; x += 0.42) {
for (let z = -0.5; z <= 0.5; z += 0.5) {
const neg = new THREE.Mesh(new THREE.SphereGeometry(0.095, 18, 18), magentaNeon);
neg.position.set(x, -0.54, z);
modelGroup.add(neg);
}
}
dynamicObjects.dyeIons = [];
for (let i = 0; i < 18; i++) {
const ion = new THREE.Mesh(new THREE.SphereGeometry(0.125, 22, 22), cyanNeon);
ion.position.set(-1.05 + (i % 6) * 0.42, 0.2 + Math.floor(i / 6) * 0.32, -0.45 + (i % 3) * 0.45);
modelGroup.add(ion);
dynamicObjects.dyeIons.push(ion);
}
add3DLabel("ไอออนสีย้อม Crystal Violet (+)", 0, 0.95, 0, "#00f0ff");
add3DLabel("หมู่ฟอสเฟตประจุลบบนผนังเซลล์ (-)", 0, -0.45, 0.85, "#f43f5e");
} else if (id === 7) {
const tank = new THREE.Mesh(new THREE.BoxGeometry(2.9, 0.52, 1.75), opticalGlass);
tank.position.y = -1.0;
modelGroup.add(tank);
const gelSlab = new THREE.Mesh(new THREE.BoxGeometry(2.2, 0.18, 1.45), new THREE.MeshPhysicalMaterial({
color: 0x38bdf8, transparent: true, opacity: 0.32, roughness: 0.1
}));
gelSlab.position.y = -0.82;
modelGroup.add(gelSlab);
registerExplode(gelSlab, 0, 0.45, 0);
const cathode = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.55, 20), darkAnodized);
cathode.rotation.x = Math.PI / 2;
cathode.position.set(-1.25, -0.75, 0);
modelGroup.add(cathode);
const anode = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.55, 20), magentaNeon);
anode.rotation.x = Math.PI / 2;
anode.position.set(1.25, -0.75, 0);
modelGroup.add(anode);
dynamicObjects.dnaBands = [];
for (let lane = 0; lane < 3; lane++) {
for (let b = 0; b < 4; b++) {
const band = new THREE.Mesh(new THREE.BoxGeometry(0.095, 0.065, 0.36), b === 3 ? goldBrass : cyanNeon);
band.position.set(-0.92 + b * 0.36, -0.70, -0.48 + lane * 0.48);
modelGroup.add(band);
dynamicObjects.dnaBands.push({ mesh: band, sizeIdx: b });
}
}
add3DLabel("ขั้วลบ Cathode (-) จุดหยอด DNA", -1.15, -0.15, 0, "#38bdf8");
add3DLabel("ขั้วบวก Anode (+) Run to Red", 1.15, -0.15, 0, "#f43f5e");
} else if (id === 8) {
const prism = new THREE.Mesh(new THREE.BoxGeometry(2.45, 1.15, 1.25), new THREE.MeshPhysicalMaterial({
color: 0xfbbf24, transparent: true, opacity: 0.42, roughness: 0.08, clearcoat: 1.0
}));
prism.position.y = -0.85;
modelGroup.add(prism);
const normalLine = new THREE.Mesh(new THREE.CylinderGeometry(0.015, 0.015, 2.2, 12), chromeMat);
normalLine.position.y = -0.15;
modelGroup.add(normalLine);
const incidentRay = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 1.65, 20), magentaNeon);
incidentRay.position.set(-0.62, 0.38, 0);
incidentRay.rotation.z = 0.65;
modelGroup.add(incidentRay);
dynamicObjects.incidentRay = incidentRay;
const refractedRay = new THREE.Mesh(new THREE.CylinderGeometry(0.04, 0.04, 1.45, 20), emeraldBio);
refractedRay.position.set(0.45, -0.82, 0);
refractedRay.rotation.z = 0.42;
modelGroup.add(refractedRay);
dynamicObjects.refractedRay = refractedRay;
add3DLabel("ลำแสงเลเซอร์ตกกระทบ (θ₁)", -0.85, 1.05, 0, "#f43f5e");
add3DLabel("ลำแสงหักเหในน้ำหมักยีสต์ (θ₂)", 0.75, -0.35, 0, "#10b981");
} else if (id === 9) {
const slide = new THREE.Mesh(new THREE.BoxGeometry(2.35, 0.12, 1.05), opticalGlass);
slide.position.y = -0.92;
modelGroup.add(slide);
const oilDrop = new THREE.Mesh(new THREE.SphereGeometry(0.34, 32, 32), new THREE.MeshPhysicalMaterial({
color: 0xfbbf24, transparent: true, opacity: 0.82, roughness: 0.05, clearcoat: 1.0
}));
oilDrop.position.y = -0.62;
modelGroup.add(oilDrop);
dynamicObjects.oilDrop = oilDrop;
const objGroup = new THREE.Group();
objGroup.position.y = 0.22;
const barrel = new THREE.Mesh(new THREE.CylinderGeometry(0.44, 0.24, 1.32, 36), chromeMat);
objGroup.add(barrel);
const whiteBand = new THREE.Mesh(new THREE.TorusGeometry(0.31, 0.04, 16, 36), new THREE.MeshBasicMaterial({ color: 0xffffff }));
whiteBand.rotation.x = Math.PI / 2;
whiteBand.position.y = -0.28;
objGroup.add(whiteBand);
const goldBand = new THREE.Mesh(new THREE.TorusGeometry(0.36, 0.03, 16, 36), goldBrass);
goldBand.rotation.x = Math.PI / 2;
goldBand.position.y = 0.12;
objGroup.add(goldBand);
modelGroup.add(objGroup);
registerExplode(objGroup, 0, 0.55, 0);
const lightCone = new THREE.Mesh(new THREE.ConeGeometry(0.68, 1.15, 36, 1, true), new THREE.MeshBasicMaterial({
color: 0x00f0ff, transparent: true, opacity: 0.42, side: THREE.DoubleSide
}));
lightCone.position.y = -0.65;
modelGroup.add(lightCone);
dynamicObjects.lightCone = lightCone;
add3DLabel("หัวเลนส์ 100x Oil (แถบสีขาว NA 1.25)", 0, 1.15, 0, "#ffffff");
add3DLabel("หยดน้ำมัน Immersion Oil (n=1.515)", 0.95, -0.55, 0, "#fbbf24");
} else if (id === 10) {
const hood = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.42, 2.35, 24, 1, false, 0, Math.PI), chromeMat);
hood.rotation.z = Math.PI / 2;
hood.rotation.x = -Math.PI / 2;
hood.position.y = 0.95;
modelGroup.add(hood);
registerExplode(hood, 0, 0.45, 0);
const uvTube = new THREE.Mesh(new THREE.CylinderGeometry(0.12, 0.12, 2.2, 28), violetGlow);
uvTube.rotation.z = Math.PI / 2;
uvTube.position.y = 0.85;
modelGroup.add(uvTube);
const uvCone = new THREE.Mesh(new THREE.ConeGeometry(1.48, 2.0, 36, 1, true), new THREE.MeshBasicMaterial({
color: 0xa855f7, transparent: true, opacity: 0.25, side: THREE.DoubleSide
}));
uvCone.position.y = -0.15;
modelGroup.add(uvCone);
const petri = new THREE.Mesh(new THREE.CylinderGeometry(0.88, 0.88, 0.18, 36), opticalGlass);
petri.position.y = -1.1;
modelGroup.add(petri);
dynamicObjects.colonies = [];
for (let i = 0; i < 20; i++) {
const ang = (i / 20) * Math.PI * 2;
const r = 0.22 + (i % 3) * 0.22;
const col = new THREE.Mesh(new THREE.SphereGeometry(0.065, 14, 14), emeraldBio);
col.position.set(Math.cos(ang) * r, -1.0, Math.sin(ang) * r);
modelGroup.add(col);
dynamicObjects.colonies.push(col);
}
add3DLabel("หลอดรังสี UV-C 254 nm (Thymine Dimer)", 0, 1.38, 0, "#a855f7");
add3DLabel("โคโลนีแบคทีเรียบนจานเพาะเชื้อ (I ∝ 1/r²)", 0, -0.75, 0.95, "#10b981");
} else if (id === 11) {
const sourceBox = new THREE.Mesh(new THREE.BoxGeometry(0.62, 0.72, 0.72), darkAnodized);
sourceBox.position.set(-1.42, -0.45, 0);
modelGroup.add(sourceBox);
const prismMono = new THREE.Mesh(new THREE.CylinderGeometry(0.28, 0.28, 0.45, 3), cyanNeon);
prismMono.position.set(-0.78, -0.45, 0);
modelGroup.add(prismMono);
const cuvette = new THREE.Mesh(new THREE.BoxGeometry(0.58, 1.38, 0.58), opticalGlass);
cuvette.position.set(0, -0.42, 0);
modelGroup.add(cuvette);
registerExplode(cuvette, 0, 0.55, 0);
const cultureLiq = new THREE.Mesh(new THREE.BoxGeometry(0.48, 1.08, 0.48), new THREE.MeshPhysicalMaterial({
color: 0xfbbf24, emissive: 0xd97706, emissiveIntensity: 0.28, transparent: true, opacity: 0.7, roughness: 0.2
}));
cultureLiq.position.set(0, -0.52, 0);
modelGroup.add(cultureLiq);
dynamicObjects.cultureLiq = cultureLiq;
const beamIn = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.15, 20), goldBrass);
beamIn.rotation.z = Math.PI / 2;
beamIn.position.set(-0.62, -0.45, 0);
modelGroup.add(beamIn);
const beamOut = new THREE.Mesh(new THREE.CylinderGeometry(0.065, 0.065, 1.15, 20), new THREE.MeshBasicMaterial({
color: 0xf59e0b, transparent: true, opacity: 0.5
}));
beamOut.rotation.z = Math.PI / 2;
beamOut.position.set(0.65, -0.45, 0);
modelGroup.add(beamOut);
dynamicObjects.beamOut = beamOut;
const detector = new THREE.Mesh(new THREE.BoxGeometry(0.5, 0.72, 0.72), cyanNeon);
detector.position.set(1.42, -0.45, 0);
modelGroup.add(detector);
add3DLabel("ลำแสง 600 nm (I₀) & Cuvette 1 cm", -0.45, 0.55, 0, "#fbbf24");
add3DLabel("Photodiode Detector วัดค่า OD600", 1.25, 0.25, 0, "#00f0ff");
}
}