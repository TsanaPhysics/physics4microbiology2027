---
name: physics-microbio-3d-xr-architect
description: >-
  สถาปัตยกรรมแล็บฟิสิกส์จุลชีววิทยาเสมือนจริง 3 มิติ (3D/WebAR/WebXR Simulator) บูรณาการ Three.js PBR, Synchronized 2D Loupe, Web Audio Synthesizer, ระบบดึงภาพหลักฐานหน้าจออัตโนมัติ, ตารางบันทึกผลการทดลองช่องว่างเปล่า (Strict Blank Data Tables), และฐานข้อมูล SQLite & Google Sheets Sync สำหรับทั้ง 12 ปฏิบัติการ
---

# Physics for Microbiology: 3D / WebAR / WebXR Virtual Laboratory Architect

กรอบมาตรฐานสถาปัตยกรรมวิศวกรรมซอฟต์แวร์และการออกแบบห้องปฏิบัติการวิทยาศาสตร์เสมือนจริง 3 มิติ (3D Interactive Virtual Laboratory & WebXR Engine) สำหรับรายวิชา **ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology)** มหาวิทยาลัยราชภัฏรำไพพรรณี ภายใต้การอำนวยการของ **ผศ.ดร.ชีวะ ทัศนา** ศูนย์ LEQs

กรอบสถาปัตยกรรมนี้ถูกออกแบบเพื่อยกระดับการจัดการเรียนรู้เชิงรุก (Active Learning) ให้นักศึกษาสามารถทดลอง ปรับแต่งค่า สังเกตปรากฏการณ์ฟิสิกส์ในระดับจุลภาค และบันทึกผลการทดลองจริงลงในแบบฟอร์มอิเล็กทรอนิกส์ที่มีระบบตรวจสอบข้อมูลอย่างเข้มงวด (Strict Validation) พร้อมการจัดเก็บข้อมูลแบบ Dual-Backend (SQLite Database & Google Sheets Sync)

---

## 1. เสาหลักแห่งสถาปัตยกรรม 5 ประการ (The 5 Core Architectural Pillars)

```
┌────────────────────────────────────────────────────────────────────────┐
│             3D / WebAR / WebXR VIRTUAL LAB ARCHITECTURE                │
├───────────────────┬────────────────────┬───────────────────────────────┤
│  1. 3D PBR Visual │  2. 2D Micro Loupe │ 3. Physics & Audio Synthesizer│
│  Three.js r128+   │  Real-time Canvas  │ Low-Re Mechanics & Web Audio  │
│  ACES Filmic Tone │  Scale Coincidence │ Realistic Acoustic Feedback   │
├───────────────────┴────────────────────┴───────────────────────────────┤
│  4. Strict Blank E-Report Protocol                                     │
│  Zero Pre-filled Data | 100% Student Entry | Instant Proof Capture     │
├────────────────────────────────────────────────────────────────────────┤
│  5. Dual-Backend Telemetry & Persistence                               │
│  SQLite3 Local DB + Base64 Image Decode + Google Sheets Webhook Sync   │
└────────────────────────────────────────────────────────────────────────┘
```

### เสาหลักที่ 1: Three.js PBR High-Fidelity Rendering, PMREM Studio Environment & Capture Buffer
- **Color Management & Tone Mapping**: ใช้ `THREE.ACESFilmicToneMapping` พร้อม exposure ระหว่าง $1.15 - 1.25$ เพื่อให้มิติแสงเงาสมจริงระดับภาพยนตร์
- **Procedural PMREM Studio Environment Map (ป้องกันปัญหาโลหะสะท้อนสีดำ)**:
  - วัตถุที่เป็นโลหะขัดเงา ทองเหลือง สเตนเลส หรือแก้วสะท้อนแสงสูง (High Metallic/Roughness ต่ำ) จะสะท้อนเป็นสีดำสนิทหากไม่มี `scene.environment`
  - สร้างแผนที่สภาพแวดล้อมสตูดิโอ 6 ทิศทางด้วย `THREE.PMREMGenerator(renderer)` จาก Canvas 2D เสมอ และผูกเข้ากับ `scene.environment` เพื่อให้โมเดลมีแสงสะท้อนและมิติที่สว่างชัดเจนในทุกสภาพแวดล้อม
- **Resilient Viewport Dimensioning Protocol (ป้องกันปัญหา Viewport ว่างเปล่า / Aspect Ratio NaN)**:
  - บังคับสไตล์ `html, body { height: 100%; overflow: hidden; }`
  - กล่องแสดงผล `#viewportContainer` และ `#threeMount` ต้องใช้มิติ `w-full h-full`
  - ในฟังก์ชัน `initThree()` และ `handleResize()` ต้องใช้ `mount.getBoundingClientRect()` พร้อมค่าสำรองความปลอดภัย (Fallback Guard เช่น ขั้นต่ำ 800x550px) เพื่อป้องกัน `mount.clientHeight = 0` ซึ่งจะทำให้ Three.js เกิดข้อผิดพลาด `camera.aspect = width / 0 = NaN`
- **Preserve Drawing Buffer**: กำหนด `preserveDrawingBuffer: true` ใน `THREE.WebGLRenderer` ทุกตัว เพื่อให้สามารถดึงข้อมูลภาพจาก WebGL canvas ด้วย `toDataURL('image/png')` ได้ตลอดเวลาโดยไม่เกิดปัญหาภาพดำหรือว่างเปล่า
- **Standardized Screenshot API**: ทุกไฟล์ Simulator ต้องเปิดเผยฟังก์ชันสากล:
  ```javascript
  window.captureSimulatorScreenshot = function() {
    if (renderer && scene && camera) {
      renderer.render(scene, camera);
      return renderer.domElement.toDataURL('image/png');
    }
    return null;
  };
  ```
- **PBR Materials**: ใช้วัสดุ `MeshStandardMaterial` (โลหะ, พลาสติก) และ `MeshPhysicalMaterial` (แก้ว, น้ำ, น้ำมันหล่อลื่น, ฝาครอบจานเพาะเชื้อ) ปรับค่า `roughness`, `metalness`, และ `transmission` ตามหลักการสะท้อนแสงจริง

### เสาหลักที่ 2: Synchronized 2D Magnifier Loupe & Dynamic Readouts
- เครื่องมือวัดละเอียด เช่น เวอร์เนียร์ ไมโครมิเตอร์ ไมโครปิเปต หรือชุดวัดความหนืดสโตกส์ จะมีมุมมอง 3D ที่กว้างเกินกว่าจะอ่านขีดสเกลหรือสังเกตเซลล์เดี่ยวได้ชัดเจน
- ต้องสร้าง **หน้าต่างขยายแบบ 2 มิติ (Synchronized 2D Canvas Loupe / Micro-Loupe 1000x)** คู่ขนานกับมุมมอง 3D เสมอ
- สำหรับเครื่องมือวัด: คำนวณตำแหน่งขีดสเกลหลักและสเกลเลื่อนสัมพันธ์กับค่าวัดปัจจุบัน ($x$) วาดเส้น Cursor อ้างอิงสีแดง/เขียว เพื่อให้นักศึกษาได้ฝึกทักษะการอ่านค่าจริง (Coincidence Reading)
- สำหรับของไหลและเซลล์จุลินทรีย์ (Stokes' Viscometer): เลนส์ขยาย 1000x ต้องแสดง **เวกเตอร์แรง 3 มิติ 3 แรง** ที่เกาะติดกับตัวเซลล์จริง ($\vec{F}_g, \vec{F}_b, \vec{F}_d$) พร้อมเส้นกระแสการไหลแบบลามินาร์ (Hydrodynamic Streamlines) อ้อมผ่านเซลล์อย่างนุ่มนวลภายใต้เงื่อนไข $Re \ll 1$
- รองรับโหมด **Learn Mode** (แสดงสูตรและขีดที่ตรงกัน) สลับกับ **Quiz / Exam Mode** (ซ่อนตัวเลขเฉลย ให้นักศึกษาอ่านค่าเอง)

### เสาหลักที่ 3: Interactive Physics Mechanics & Web Audio Synthesizer
- **กลไกการเคลื่อนไหวสมจริง**:
  - การเลื่อนของปากวัดเวอร์เนียร์ (Bounding clamp: $0 - 150\text{ mm}$)
  - การหมุนของ Thimble ไมโครมิเตอร์สัมพันธ์กับการเคลื่อนที่ของแกน Spindle ($0.5\text{ mm}$ ต่อการหมุน 1 รอบ)
  - กลไก **2-Stop Plunger** ของไมโครปิเปต: จังหวะที่ 1 ดูดสาร (Aspirate) จังหวะที่ 2 ปล่อยสารหมดจด (Blowout)
  - **ชุดวัดความหนืดสโตกส์ (Falling-Sphere Viscometer & Stokes' Drag)**:
    - กระบอกแก้วบอโรซิลิเกตทรงสูงพร้อมสเกลพิมพ์บอกระดับปริมาตรและความสูง ($0 - 100\text{ mL}$, $0 - 200\text{ mm}$) และผิวน้ำเว้า Meniscus
    - เซนเซอร์โฟโตเกตเลเซอร์คู่ (Dual Optical Photogates) ตัดขวางกระบอกแก้วที่ระยะห่าง $s = 20\text{ cm}$
    - นาฬิกาดิจิทัลตรวจจับมิลลิวินาที ($\Delta t$) ทำงานอัตโนมัติเมื่อวัตถุ/เซลล์เคลื่อนผ่านเกต
    - คำนวณปรับแก้ผลกระทบผนังภาชนะตามหลัก Faxén ($f_w = 1 - 2.104(r/R) + 2.09(r/R)^3$)
    - จำลองแรงเร่งปั่นเหวี่ยง ($1\times g$ ถึง $1000\times g$ RCF) เชื่อมโยงสู่การปั่นตกตะกอนในห้องปฏิบัติการจุลชีววิทยา
- **ระบบสังเคราะห์เสียงสมจริง (Web Audio API Synthesizer)**:
  - ไร้การพึ่งพาไฟล์เสียงภายนอก (.mp3) ใช้ Web Audio Oscillator & Noise Buffer สังเคราะห์เสียงขึ้นแบบ Real-time:
    - เสียงคลิก Ratchet Stop ของไมโครมิเตอร์ (`AudioContext`, decaying sine wave + noise burst)
    - เสียงดูดและปล่อยของเหลวของไมโครปิเปต (Resonant bandpass filter sweeps)
    - เสียงมอเตอร์หมุนเครื่องปั่นเหวี่ยง (Ramping frequency generator)
    - เสียง Beep และ Chime เมื่อวัตถุตัดผ่านลำแสงเลเซอร์ของโฟโตเกต (Dual photogate trigger cues)

### เสาหลักที่ 4: Strict Blank Interactive E-Report Protocol
- **ช่องตารางว่างเปล่า 100%**: ห้ามใส่ค่าตัวเลขเฉลยล่วงหน้าในช่องกรอกผล (ห้าม hardcode pre-filled values) นักศึกษาต้องอ่านค่าวัดจาก 3D Simulator แล้วพิมพ์บันทึกค่าลงในช่อง input
- **ข้อมูลยืนยันตัวตนครบถ้วน**: ชื่อ-นามสกุล, รหัสนักศึกษา, สาขาวิชา, กลุ่มเรียน (Section)
- **หลักฐานการทดลองบังคับ (Mandatory Proof Capture)**: นักศึกษาต้องกดปุ่ม "📸 แคปหน้าจอ 3D Simulator" หรืออัปโหลดภาพระหว่างทำการทดลอง หากไม่มีภาพหลักฐาน ระบบจะบล็อกการส่งรายงานทันที
- **ส่วนวิเคราะห์และอภิปรายเชิงลึก**:
  - วิธีคำนวณอย่างละเอียด (`lab_calculations`, textarea)
  - การอภิปรายผลการทดลอง (`lab_discussion`, textarea)
  - การสรุปผลการทดลอง (`lab_conclusion`, textarea)
  - คำถามท้ายการทดลอง 3 ข้อ (`quiz_ans_1`, `quiz_ans_2`, `quiz_ans_3`)
- **Strict Pre-submission Guard**: หากช่องใดว่าง หรือเว้นไม่ครบ ระบบจะแจ้งเตือนพร้อมเลื่อนหน้าจอ (auto-focus scroll) ไปยังช่องที่ยังไม่สมบูรณ์

### เสาหลักที่ 5: Dual-Backend Persistence & Telemetry Sync
- **SQLite Database**: จัดเก็บที่ `virtual_lab/database/virtual_lab.db`
  - ตาราง `students`: เก็บประวัตินักศึกษา อัปเดตชื่อ สาขา กลุ่มเรียน
  - ตาราง `lab_reports`: บันทึกข้อมูล JSON ของตารางผล, ภาพถ่าย Base64 ที่ถอดรหัสเป็นไฟล์ `.png`, ข้อความคำนวณ, อภิปราย, สรุปผล, และคำตอบควิซ
- **Google Sheets Webhook Sync**: ส่ง payload JSON ไปยัง Google Apps Script Web App แบบเรียลไทม์ เพื่อให้อาจารย์ผู้สอนตรวจงานและออกเกรดได้ผ่าน Google Sheets อัตโนมัติ

---

## 2. พิมพ์เขียวทั้ง 12 ปฏิบัติการ (Master Blueprint: Labs 01 – 12)

| รหัสแล็บ | ชื่อปฏิบัติการ (Lab Title) | เครื่องมือ & แบบจำลอง 3D หลัก | แบบจำลองทางฟิสิกส์ & สูตรคำนวณ | ตารางบันทึกผล (Blank Tables) |
|---|---|---|---|---|
| **Lab 01** | การวัดละเอียดและความไม่แน่นอน | เวอร์เนียร์ (0.05 mm), ไมโครมิเตอร์ (0.01 mm), ไมโครปิเปต P1000 + เครื่องชั่ง 4 ตำแหน่ง | การสอบเทียบ Gravimetric ISO 8655: $V = m \cdot Z$, $E\%$, $\text{CV}\%$ | ตาราง 1.1 มิติชิ้นงาน, ตาราง 1.2 มวลน้ำกลั่น 5 ซ้ำ, ตาราง 1.3 ขนาดโคโลนีและความขุ่น |
| **Lab 02** | เวกเตอร์ แรง และสมดุลของเซลล์ | แชมเบอร์จุลินทรีย์ 3 มิติ, หลอดตะกอนเซลล์, แหล่งจ่ายเวกเตอร์แรงลอยตัวและแรงหนืด | Stokes' Law Drag: $F_d = 6\pi \eta r v$, แรงลอยตัว $F_b = \rho_f V g$, Terminal Velocity | ตาราง 2.1 อัตราตกตะกอน $v_t$, ตาราง 2.2 เวกเตอร์แรงลัพธ์ $\sum \vec{F}$, ตาราง 2.3 ขนาดเซลล์แบคทีเรีย |
| **Lab 03** | การเคลื่อนที่แบบบราวน์เนียนและการแพร่ | สไลด์หยดน้ำแขวนลอย (Hanging Drop Slide), กล้องจุลทรรศน์ตรวจจับอนุภาค 3D Random Walk | Einstein-Smoluchowski: $\langle \Delta r^2 \rangle = 4Dt$, $D = \frac{k_B T}{6\pi \eta r}$, รัศมีไฮโดรไดนามิก | ตาราง 3.1 พิกัดอนุภาค $(x,y)$ ตามเวลา, ตาราง 3.2 MSD $\langle \Delta r^2 \rangle$, ตาราง 3.3 สัมประสิทธิ์การแพร่ $D$ |
| **Lab 04** | การหมุนและการปั่นเหวี่ยงชีวภาพ | เครื่องปั่นเหวี่ยงไมโครเซนตริฟิวจ์ (Microcentrifuge Rotor 24 หลอด), หลอด Eppendorf | Relative Centrifugal Force: $\text{RCF} = 1.118 \times 10^{-5} r N^2$, Svedberg Unit: $s = \frac{v}{\omega^2 r}$ | ตาราง 4.1 ความเร็วรอบ RPM vs RCF, ตาราง 4.2 เวลาตกตะกอนเม็ดเซลล์ (Pellet), ตาราง 4.3 ความบริสุทธิ์ชีวภาพ |
| **Lab 05** | แรงตึงผิวและการยึดเกาะของแบคทีเรีย | เครื่องวัดแรงตึงผิว Du Noüy Ring Tensiometer, หลอดรูเล็ก (Capillary Tubes), มุมสัมผัสหยดน้ำ | Du Noüy Ring: $\gamma = \frac{F}{4\pi R \beta}$, Young-Laplace: $h = \frac{2\gamma \cos\theta}{\rho g r}$, Biofilm Adhesion | ตาราง 5.1 แรงดึงห่วงแหวน $F$, ตาราง 5.2 ความสูงลำของเหลว $h$, ตาราง 5.3 มุมสัมผัสของเหลวบนผิวแบคทีเรีย |
| **Lab 06** | แรงดันออสโมซิสและการซึมผ่านเยื่อหุ้มเซลล์ | เซลล์จำลอง 3D Membrane, หลอด U-tube Osmometer, เซลล์ยีสต์/แบคทีเรียในสารละลาย Hypo/Iso/Hypertonic | van 't Hoff: $\Pi = i M R T$, Plasmolysis Volume Shrinkage, Cell Turgor Pressure, อัตราดูดกลืนแสง $\text{OD}_{600}$ | ตาราง 6.1 ความสูงลำของเหลว Osmometer, ตาราง 6.2 ร้อยละเซลล์เหี่ยว (Plasmolyzed Cells), ตาราง 6.3 $\text{OD}_{600}$ สารละลาย |
| **Lab 07** | กลศาสตร์ชีวเคมีและโมเลกุลมอเตอร์ | โมเลกุลมอเตอร์แฟลกเจลลา (Bacterial Flagellar Motor), โรเตอร์ $\text{F}_0\text{F}_1$-ATP Synthase 3D | Low Reynolds Number ($Re \ll 1$), Torque $\tau = \gamma \omega$, พลังขับเคลื่อนโปรตอน $\text{PMF} = \Delta \psi - \frac{2.3RT}{F}\Delta\text{pH}$ | ตาราง 7.1 ความเร็วรอบการหมุนของแฟลกเจลลา (Hz), ตาราง 7.2 ทอร์กของมอเตอร์ชีวภาพ, ตาราง 7.3 อัตราการสังเคราะห์ ATP |
| **Lab 08** | คานและการเคลื่อนไหวเชิงกลระดับไมโคร | แขนคานตรวจจับระดับนาโน (AFM Micro-cantilever Probe), แหนบแสงเลเซอร์ (Optical Tweezers) | Hooke's Law: $F = -k x$, Cantilever Spring Constant: $k = \frac{E w t^3}{4 L^3}$, Optical Trap Stiffness $k_{\text{trap}}$ | ตาราง 8.1 การโก่งงอของคาน $\Delta z$, ตาราง 8.2 แรงกระทำต่อผนังเซลล์ ($n\text{N}$), ตาราง 8.3 มอดุลัสของยังก์ของผนังเซลล์ ($E$) |
| **Lab 09** | อุณหพลศาสตร์และเทอร์โมไซเคิลเลอร์ PCR | แผ่นทำความร้อน Peltier, บล็อกอลูมิเนียม 96 หลอด, ฝาอบความร้อน (Heated Lid 105°C) | การถ่ายโอนความร้อนฟูเรียร์: $q = -k A \frac{dT}{dx}$, PCR Cycle Kinetics, DNA Denaturation $T_m = 64.9 + 41 \frac{yG+zC-16.4}{wA+xT+yG+zC}$ | ตาราง 9.1 อุณหภูมิรอบ PCR (95°C, 55°C, 72°C), ตาราง 9.2 อัตราการเพิ่ม-ลดอุณหภูมิ (Ramp Rate °C/s), ตาราง 9.3 ปริมาณดีเอ็นเอ |
| **Lab 10** | ไฟฟ้า สนามแม่เหล็ก และเจลอิเล็กโทรโฟเรซิส | ถังอิเล็กโทรโฟเรซิสแนวนอน (Horizontal Agarose Gel Tank), แหล่งจ่ายไฟ DC, ขดลวดแม่เหล็ก Helmholtz | Electrophoretic Mobility: $\mu = \frac{v}{E} = \frac{q}{6\pi \eta r}$, Ferguson Plot: $\log \mu = \log \mu_0 - K_R T$, สนามแม่เหล็ก $B$ | ตาราง 10.1 ระยะการเคลื่อนที่ของ DNA Band (mm), ตาราง 10.2 กราฟมาตรฐานขนาดคู่เบส (bp), ตาราง 10.3 การเบนของแบคทีเรียแม่เหล็ก |
| **Lab 11** | ทัศนศาสตร์และกล้องจุลทรรศน์ชีวภาพ | เลนส์ใกล้วัตถุ 4x/10x/40x/100x Oil, เลนส์รวมแสง Abbe Condenser, เลนส์ใกล้ตา 10x | Abbe Resolution: $d = \frac{\lambda}{2\text{NA}}$, Numerical Aperture: $\text{NA} = n \sin \alpha$, Snell's Law $n_1 \sin\theta_1 = n_2 \sin\theta_2$ | ตาราง 11.1 กำลังขยายรวม $M_{\text{total}}$, ตาราง 11.2 ขีดจำกัดการแยกชัด $d$ (nm), ตาราง 11.3 ความสว่างและระยะชัดลึก |
| **Lab 12** | รังสีชีววิทยาและการสลายตัว | หลอดรังสี UV-C 254 nm, หัววัดรังสี Geiger-Müller Counter, แผ่นกรองชีวภาพ | กฎการสลายตัว: $N(t) = N_0 e^{-\lambda t}$, ครึ่งชีวิต $T_{1/2} = \frac{\ln 2}{\lambda}$, Beer-Lambert UV Sterilization: $\ln(N/N_0) = -k I t$, $D_{10}$ Value | ตาราง 12.1 อัตราการนับรังสี CPM, ตาราง 12.2 กราฟการลดทอนครึ่งชีวิต, ตาราง 12.3 อัตราการรอดชีวิตของแบคทีเรีย vs ปริมาณรังสี UV-C |

---

## 3. รูปแบบโครงสร้างไฟล์มาตรฐาน (Standard File Structure)

ทุกปฏิบัติการจะปฏิบัติตามแบบแผนโครงสร้างไฟล์เดียวกันในระบบ:

```
physics4microbioloy2027/
├── 03_physics4microbio2026/
│   ├── labs/
│   │   ├── lab01_measurement.php         # รายงานปฏิบัติการ 1
│   │   ├── lab02_force_vectors.php       # รายงานปฏิบัติการ 2
│   │   ├── ...
│   │   └── lab12_radiation_decay.php     # รายงานปฏิบัติการ 12
│   └── simulations/
│       ├── sim_vernier_caliper_3d.html    # 3D Vernier Caliper
│       ├── sim_micrometer_3d.html         # 3D Micrometer
│       ├── sim_micropipette_3d.html       # 3D Micropipette
│       ├── sim02_cell_vectors_3d.html     # 3D Microbial Forces
│       ├── ...
│       └── sim12_uv_radiation_3d.html     # 3D UV-C Decay
└── virtual_lab/
    ├── api/
    │   └── api.php                        # SQLite & Webhook Submit API
    ├── database/
    │   ├── virtual_lab.db                 # SQLite3 Database
    │   ├── google_sheets_apps_script.js   # Apps Script Endpoint Code
    │   └── google_sheets_config.json      # Webhook URL Configuration
    └── uploads/
        └── reports/                       # จัดเก็บภาพหลักฐาน .png
```

---

## 4. โค้ดต้นแบบสำหรับ 3D Simulator (`sim_template_3d.html`)

```html
<!DOCTYPE html>
<html lang="th" class="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>3D Physics Simulator Template</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
  <style>
    body { font-family: 'Prompt', sans-serif; background-color: #060a12; color: #e2e8f0; }
  </style>
</head>
<body class="h-screen flex flex-col overflow-hidden">
  <div id="canvasMount" class="relative flex-1 w-full h-full">
    <!-- Overlay HUD -->
    <div class="absolute top-3 left-3 bg-slate-950/80 backdrop-blur-md p-3 rounded-2xl border border-white/10 text-xs font-mono">
      <div id="hudTitle" class="text-emerald-400 font-bold">3D PHYSICS BENCH</div>
      <div id="hudTelemetry" class="text-slate-400 mt-1">Readout: 0.00 units</div>
    </div>
  </div>

  <script>
    let scene, camera, renderer, controls;

    function init() {
      const mount = document.getElementById('canvasMount');
      scene = new THREE.Scene();
      camera = new THREE.PerspectiveCamera(40, mount.clientWidth / mount.clientHeight, 0.1, 1000);
      camera.position.set(5, 5, 10);

      // สำคัญมาก: ต้องมี preserveDrawingBuffer: true
      renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, preserveDrawingBuffer: true, powerPreference: 'high-performance' });
      renderer.setSize(mount.clientWidth, mount.clientHeight);
      renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
      renderer.toneMapping = THREE.ACESFilmicToneMapping;
      renderer.toneMappingExposure = 1.15;
      renderer.shadowMap.enabled = true;
      mount.appendChild(renderer.domElement);

      controls = new THREE.OrbitControls(camera, renderer.domElement);
      controls.enableDamping = true;

      // Lighting
      scene.add(new THREE.AmbientLight(0xffffff, 0.7));
      const dirLight = new THREE.DirectionalLight(0xffffff, 1.2);
      dirLight.position.set(10, 15, 10);
      dirLight.castShadow = true;
      scene.add(dirLight);

      // สร้างวัตถุ 3 มิติ PBR ประจำการทดลองที่นี่...

      // Hook สำหรับแคปภาพหลักฐานอัตโนมัติ
      window.captureSimulatorScreenshot = function() {
        if (renderer && scene && camera) {
          renderer.render(scene, camera);
          return renderer.domElement.toDataURL('image/png');
        }
        return null;
      };

      function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
      }
      animate();

      window.addEventListener('resize', () => {
        camera.aspect = mount.clientWidth / mount.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(mount.clientWidth, mount.clientHeight);
      });
    }
    window.addEventListener('DOMContentLoaded', init);
  </script>
</body>
</html>
```

---

## 5. กระบวนการตรวจสอบและส่งรายงาน (Validation & Submission Pipeline)

1. **Client-Side Verification**:
   - ฟังก์ชัน `validateAndSubmitReport(event)` จะสแกนทุก input element
   - ตรวจสอบว่าช่องตัวเลขในตารางไม่มีช่องใดว่าง (`input.value.trim() !== ''`)
   - ตรวจสอบว่า `image_proof_base64` มีข้อมูลภาพ ไม่ว่างเปล่า
   - ตรวจสอบว่าข้อความคำนวณ อภิปราย สรุป และควิซกรอกครบทุกข้อ
2. **Payload Dispatch**:
   - ส่ง HTTP POST ไปยัง `../../virtual_lab/api/api.php?action=submit_report`
   - ฝั่ง Server ทำการถอดรหัสภาพเป็นไฟล์ `.png` บันทึกลงไดเรกทอรี `virtual_lab/uploads/reports/`
   - บันทึกข้อมูลลงตาราง `students` และ `lab_reports` ใน SQLite3
   - ยิง cURL request ข้อมูล JSON ไปยัง Google Apps Script Web App
3. **Response Handling**:
   - แจ้งเตือนนักศึกษาด้วยหมายเลขบันทึกของระบบ (Submission ID)
   - แสดงสถานะการซิงก์ Google Sheets ว่าสำเร็จ (Synced: 1)
   - ล็อกฟอร์มเพื่อป้องกันการส่งซ้ำซ้อน
