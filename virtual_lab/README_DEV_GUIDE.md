# 🧪 คู่มือการใช้งานและพัฒนาระบบปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา 3 มิติเสมือนจริง
## 4011111 Physics for Microbiology 3D Virtual Laboratory Suite (OBE Aligned)
### คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี (ศูนย์ LEQs)
**ผู้อำนวยการโครงการ / อาจารย์ผู้สอน:** ผศ.ดร.ชีวะ ทัศนา

---

## 🏛️ 1. สถาปัตยกรรมระบบโดยรวม (System Architecture)

ระบบถูกออกแบบตามสถาปัตยกรรม **Dual-Backend & Modular Data-Driven Registry** ที่รองรับทั้งการทำงานบน Apache/XAMPP, Python HTTP Server, และการทำงานแบบออฟไลน์/สถิตบน **GitHub Pages**:

```
                       ┌───────────────────────────────────────────────┐
                       │   Client UI: Responsive 3D Virtual Lab        │
                       │   - Three.js PBR 3D Simulation (13 Labs)      │
                       │   - 3 Unified Modes: 3D Lab / AR / AI Hand    │
                       │   - Student Registration & Auth Gate          │
                       │   - Live Telemetry Waveform Oscilloscope      │
                       │   - Individual Competency Analytics Radar     │
                       └───────────────────────┬───────────────────────┘
                                               │
                                 [REST API / JSON / LocalStorage]
                                               ▼
          ┌────────────────────────────────────┴────────────────────────────────────┐
          ▼                                    ▼                                    ▼
┌──────────────────┐                 ┌──────────────────┐                 ┌──────────────────┐
│  PHP / XAMPP     │                 │  Python 3 Native │                 │ Client Offline   │
│  api/api.php     │                 │  server.py       │                 │ LocalStorage     │
│  (Apache Engine) │                 │  (Port 8089)     │                 │ (GitHub Pages)   │
└─────────┬────────┘                 └────────┬─────────┘                 └──────────────────┘
          │                                   │
          └─────────────────┬─────────────────┘
                            ▼
               ┌─────────────────────────┐
               │ SQLite3 Database        │
               │ database/virtual_lab.db │
               │ • students              │
               │ • labs_catalog          │
               │ • lab_telemetry_logs    │
               │ • lab_reports           │
               │ • admin_users           │
               └─────────────────────────┘
```

---

## 🔬 2. สรุปรายชื่อ 13 ปฏิบัติการเสมือนจริง (The 13 Virtual Labs)

| ปฏิบัติการ | หมวดหมู่วิชาการ | เครื่องมือ 3 มิติในระบบ | สมการและหลักการฟิสิกส์หลัก |
| :---: | :--- | :--- | :--- |
| **Lab 01** | การวัดและเครื่องมือพื้นฐาน | P1000 Micropipette & Analytical Balance | การสอบเทียบ Gravimetric ($\rho = 1.0000\text{ g/mL}$) และ ISO 8655 |
| **Lab 02** | กลศาสตร์จุลภาค | Microbial Motility Stage & Molecular Chamber | การแพร่แบบบราวน์ $\langle r^2 \rangle = 6Dt = \frac{6k_BT}{6\pi\eta a}t$ |
| **Lab 03** | กลศาสตร์ของไหล | Stokes Sedimentation Fall Tube & Viscometer | กฎของสโตกส์ $v_t = \frac{2r^2(\rho_p - \rho_f)g}{9\eta}$ |
| **Lab 04** | กลศาสตร์การหมุน | High-Speed Microcentrifuge & Balanced Rotor | แรงหนีศูนย์กลางสัมพัทธ์ $\text{RCF} = 1.118 \times 10^{-5} r (\text{RPM})^2$ |
| **Lab 05** | อุณหพลศาสตร์ | Microbial Incubator & 3-Step PCR Cycler | วัฏจักร 3 สเต็ป (95°C, 55°C, 72°C) และสมการความร้อน $Q = mc\Delta T$ |
| **Lab 06** | ฟิสิกส์ความดัน | Digital Steam Autoclave $121^\circ\text{C}$ / $15\text{ psi}$ | จุดเดือดไอน้ำอิ่มตัว Clausius-Clapeyron และ 3 กรณีศึกษาความปลอดภัย |
| **Lab 07** | ไฟฟ้าสถิต | Gram Stain Dipole & Zeta Potential Meter | แรงคูลอมบ์ $F_e = \frac{k|q_1 q_2|}{r^2}$ และอันตรกิริยาสีย้อมกับผนังเซลล์ |
| **Lab 08** | ไฟฟ้ากระแสตรง | Agarose Gel Electrophoresis Tank & DC Supply | กฎของโอห์ม $V = IR$, กำลังไฟฟ้า $P = VI$, และความเร็วดีเอ็นเอ $v = \mu_e E$ |
| **Lab 09** | ทัศนศาสตร์เรขาคณิต | Laser Optical Bench & Refraction Tank | กฎของสเนลล์ $n_1\sin\theta_1 = n_2\sin\theta_2$ และสมการเลนส์นูน |
| **Lab 10** | ทัศนศาสตร์ขั้นสูง | Compound Microscope $100\times$ Oil Immersion | การเพิ่ม NA ด้วยน้ำมัน $n = 1.515$ และความละเอียด $d = \frac{0.61\lambda}{\text{NA}}$ |
| **Lab 11** | ฟิสิกส์รังสีชีวภาพ | Biosafety Cabinet UV-C Lamp Rig (254 nm) | กฎกำลังสองผกผัน $I = \frac{P}{4\pi r^2}$ และการลดลงแบบเอกซ์โพเนนเชียล |
| **Lab 12** | สเปกโทรสโกปี | UV-Vis Spectrophotometer & Cuvette Rack | กฎเบียร์-แลมเบิร์ต $A = \varepsilon b c$ และกราฟมาตรฐานความขุ่น $\text{OD}_{600}$ |
| **Lab 13** | โครงงานบูรณาการ | Smart Microbiological IoT Sensor Rig Sandbox | รูบริกการประเมินทักษะบูรณาการ 4 มิติ และสัมประสิทธิ์การตัดสินใจ $R^2$ |

---

## ⚡ 3. วิธีการเพิ่มหรือแก้ไขปฏิบัติการใหม่ใน 5 นาที (Modular Extensibility)

ระบบถูกออกแบบให้ **Data-Driven 100%** ผ่านไฟล์ [`js/labs_config.js`](file:///Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/virtual_lab/js/labs_config.js) 
หากอาจารย์ต้องการปรับแก้สูตร ตัวแปร คำถามท้ายแล็บ หรือเพิ่ม `Lab 14` สามารถทำได้ทันทีโดยเพิ่มอ็อบเจกต์ในไฟล์ดังกล่าว:

```javascript
lab14: {
  id: "lab14",
  num: 14,
  badge: "Lab 14",
  titleTh: "ชื่อปฏิบัติการภาษาไทย",
  titleEn: "English Lab Title",
  category: "หมวดหมู่วิชาการ",
  icon: "fa-solid fa-flask",
  instrument: "ชื่อเครื่องมือจำลอง 3 มิติ",
  description: "คำอธิบายวัตถุประสงค์และขั้นตอนการทดลอง",
  formulaLatex: "E = mc^2",
  formulaDesc: "คำอธิบายสมการ",
  params: [
    { id: "param1", label: "ชื่อตัวแปร", min: 1, max: 100, step: 1, default: 10, unit: "หน่วย" }
  ],
  calcPhysics: function(p) {
    // ฟังก์ชันคำนวณฟิสิกส์แบบเรียลไทม์
    return {
      output1: (p.param1 * 2).toFixed(2),
      status: "ปกติ"
    };
  },
  tableCols: ["Trial", "ตัวแปรต้น", "ตัวแปรตาม", "ความคลาดเคลื่อน (%)"],
  quiz: [
    { q: "คำถามท้ายแล็บข้อที่ 1?", opts: ["ตัวเลือก A", "ตัวเลือก B", "ตัวเลือก C", "ตัวเลือก D"], ans: 1 }
  ]
}
```

เมื่อบันทึกไฟล์ ระบบจะสร้างปุ่มในแถบข้าง, ปรับแต่งพารามิเตอร์, ปรับปรุงตารางบันทึกผล, คำถามควิซ, และเอนจินประเมินคะแนนให้อัตโนมัติทันทีโดยไม่ต้องแก้ไขไฟล์ HTML!

---

## 📊 4. สิทธิ์และการเข้าถึงสำหรับอาจารย์ผู้สอน (Instructor Portal)
- เข้าสู่ระบบผ่านปุ่ม **`อาจารย์/Admin`** ที่มุมขวาบน
- บัญชีมาตรฐาน: **Username: `admin`** / **Password: `LEQs`**
- ความสามารถ:
  - ดูรายชื่อนักศึกษาและรายงานผลการทดลองทั้งหมด
  - ตรวจและให้คะแนนรายงาน พร้อมระบุข้อเสนอแนะรายบุคคล (Individual Feedback)
  - ส่งออกข้อมูลเป็นไฟล์ **CSV (UTF-8 BOM)** เพื่อนำเข้าสู่ Microsoft Excel ภาษาไทยได้ทันที 100%
