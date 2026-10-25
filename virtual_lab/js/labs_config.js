/**
 * Modular Data-Driven Configuration for 13 Physics for Microbiology Virtual Labs
 * Course 4011111 Physics for Microbiology (OBE Aligned)
 * Easily extensible: to add or modify a lab, simply edit this config file!
 */

const LABS_CONFIG = {
  lab01: {
    id: "lab01",
    num: 1,
    badge: "Lab 01",
    titleTh: "การวัดพื้นฐานและการตรวจสอบความแม่นยำของไมโครปิเปต P1000",
    titleEn: "Basic Measurement & P1000 Micropipette Gravimetric Calibration",
    category: "การวัดและเครื่องมือพื้นฐาน",
    icon: "fa-solid fa-pipette",
    instrument: "Micropipette P1000 & Analytical Balance 0.0001 g",
    description: "การสอบเทียบความแม่นยำของไมโครปิเปต P1000 โดยใช้หลักการชั่งน้ำหนักน้ำบริสุทธิ์ (ความหนาแน่น ρ = 1.0000 g/mL) เปรียบเทียบกับมาตรฐานสากล ISO 8655",
    formulaLatex: "\\text{Error (\\%)} = \\left| \\frac{m_{\\text{measured}} - m_{\\text{theory}}}{m_{\\text{theory}}} \\right| \\times 100\\%",
    formulaDesc: "มวลของน้ำบริสุทธิ์ที่อุณหภูมิ 25°C แปรผันตรงกับปริมาตรที่ตั้งไว้ โดย 1,000 µL = 1.000 mL = 1.0000 g",
    params: [
      { id: "volume_uL", label: "ปริมาตรที่ตั้งบนปิเปต (µL)", min: 100, max: 1000, step: 50, default: 1000, unit: "µL" },
      { id: "room_temp", label: "อุณหภูมิห้องแล็บ (°C)", min: 20, max: 35, step: 0.5, default: 25.0, unit: "°C" },
      { id: "plunger_technique", label: "เทคนิคการกดลูกสูบ", type: "select", options: [
        { val: "optimal", text: "กดนิ่งสม่ำเสมอ (Smooth 2-stop) — ถูกต้อง" },
        { val: "fast", text: "ปล่อยลูกสูบเร็วเกินไป (Rapid Release)" },
        { val: "angle", text: "เอียงปิเปตเกิน 30 องศาขณะดูด" }
      ]}
    ],
    calcPhysics: function(p) {
      let v_mL = p.volume_uL / 1000.0;
      let rho = 0.9997 - (p.room_temp - 20) * 0.00025;
      let theoretical_mass = v_mL * rho;
      let factor = 1.0;
      if (p.plunger_technique === "fast") factor = 0.985 + (Math.random()*0.004);
      else if (p.plunger_technique === "angle") factor = 0.978 + (Math.random()*0.005);
      else factor = 0.9992 + (Math.random()*0.0016);
      let measured_mass = theoretical_mass * factor;
      let errPct = Math.abs((measured_mass - theoretical_mass) / theoretical_mass) * 100;
      return {
        v_mL: v_mL.toFixed(4),
        theoretical_mass: theoretical_mass.toFixed(4),
        measured_mass: measured_mass.toFixed(4),
        errPct: errPct.toFixed(2),
        balance_display: measured_mass.toFixed(4) + " g"
      };
    },
    tableCols: ["ครั้งที่ (Trial)", "ปริมาตรที่ตั้ง (µL)", "ปริมาตรคิดเป็น (mL)", "มวลตามทฤษฎี (g)", "มวลที่ชั่งได้จริง (g)", "ความคลาดเคลื่อน (%)"],
    defaultTrials: [
      { trial: 1, p1: 100, p2: "0.1000", p3: "0.0998", p4: "0.0997", err: "0.10" },
      { trial: 2, p1: 500, p2: "0.5000", p3: "0.4990", p4: "0.4988", err: "0.04" },
      { trial: 3, p1: 1000, p2: "1.0000", p3: "0.9984", p4: "0.9982", err: "0.02" }
    ],
    quiz: [
      { q: "เมื่อต้องการดูดสารละลายเข้าสู่ทิปของไมโครปิเปต ต้องกดก้านลูกสูบอย่างไร?", opts: ["กดจนสุดจุดหยุดที่สอง (Second Stop)", "กดลงไปยังจุดหยุดแรก (First Stop) แล้วค่อยๆ ปล่อยขึ้น", "ไม่ต้องกด ดึงก้านลูกสูบขึ้นตรงๆ", "กดและปล่อยอย่างรวดเร็วเพื่อสร้างสุญญากาศ"], ans: 1 },
      { q: "หากตั้งปริมาตรไมโครปิเปตไว้ที่ 500 µL มวลของน้ำบริสุทธิ์ควรชั่งได้ประมาณเท่าใด?", opts: ["5.0000 g", "0.0500 g", "0.5000 g", "50.000 g"], ans: 2 },
      { q: "การจับไมโครปิเปตเอียงมากกว่า 30 องศาขณะดูดของเหลวจะส่งผลอย่างไรต่อผลการวัด?", opts: ["ทำให้ดูดของเหลวได้ปริมาตรน้อยกว่าที่ตั้งไว้เนื่องจากผลของแรงดันสถิตไฮโดรสแตติก", "ทำให้ปริมาตรเพิ่มขึ้นเป็นสองเท่าเสมอ", "ไม่มีผลกระทบใดๆ", "ทำให้ลูกสูบติดขัด"], ans: 0 }
    ]
  },

  lab02: {
    id: "lab02",
    num: 2,
    badge: "Lab 02",
    titleTh: "การเคลื่อนที่ของแบคทีเรียและการจำลอง Brownian Motion 3 มิติ",
    titleEn: "Microbial Motility & 3D Brownian Motion Simulation",
    category: "กลศาสตร์และการเคลื่อนที่ในระดับจุลภาค",
    icon: "fa-solid fa-virus",
    instrument: "Microbial Motility Stage & Molecular Collision Chamber",
    description: "การสังเกตการเคลื่อนที่ของแบคทีเรีย (Motility) เทียบกับการเคลื่อนที่แบบบราวน์ (Brownian Motion) จากการชนระดับโมเลกุลน้ำ ตามสมการ Einstein-Smoluchowski",
    formulaLatex: "\\langle r^2 \\rangle = 6 D t = \\frac{6 k_B T}{6 \\pi \\eta a} t",
    formulaDesc: "ระยะกระจัดเฉลี่ยยกกำลังสองแปรผันตรงกับเวลา (t) และอุณหภูมิสัมบูรณ์ (T) แต่แปรผกผันกับความหนืดของตัวกลาง (η) และรัศมีอนุภาค (a)",
    params: [
      { id: "temp_K", label: "อุณหภูมิสารละลาย (K)", min: 273, max: 373, step: 5, default: 298, unit: "K" },
      { id: "viscosity_mPa", label: "ความหนืดตัวกลาง η (mPa·s)", min: 0.5, max: 5.0, step: 0.1, default: 1.0, unit: "mPa·s" },
      { id: "bacteria_type", label: "ชนิดจุลินทรีย์ / อนุภาค", type: "select", options: [
        { val: "e_coli", text: "E. coli (Run & Tumble มีแฟลกเจลลา)" },
        { val: "staph", text: "Staphylococcus (ทรงกลม ไม่มีแฟลกเจลลา — Brownian แท้)" },
        { val: "latex", text: "Latex Bead (อนุภาคอ้างอิง 1.0 µm)" }
      ]}
    ],
    calcPhysics: function(p) {
      let D = (1.38e-23 * p.temp_K) / (6 * Math.PI * (p.viscosity_mPa * 1e-3) * 0.5e-6) * 1e12; // in um^2/s
      let r_mean_10s = Math.sqrt(6 * D * 10);
      let isMotile = p.bacteria_type === "e_coli";
      let velocity = isMotile ? (25 + Math.random()*5).toFixed(1) : (r_mean_10s / 10).toFixed(2);
      return {
        diff_coeff: D.toFixed(3) + " µm²/s",
        disp_10s: r_mean_10s.toFixed(2) + " µm",
        velocity: velocity + " µm/s",
        mode: isMotile ? "Active Swimming (Run-and-Tumble)" : "Passive Brownian Diffusion"
      };
    },
    tableCols: ["เวลาบันทึก (s)", "พิกัด X (µm)", "พิกัด Y (µm)", "พิกัด Z (µm)", "ระยะกระจัด r (µm)", "ประเภทการเคลื่อนที่"],
    defaultTrials: [
      { trial: 1, p1: "2.0", p2: "+1.2", p3: "-0.8", p4: "+0.4", err: "1.5" },
      { trial: 2, p1: "5.0", p2: "+3.1", p3: "+1.5", p4: "-1.1", err: "3.6" },
      { trial: 3, p1: "10.0", p2: "-4.8", p3: "+4.2", p4: "+2.0", err: "6.7" }
    ],
    quiz: [
      { q: "การเคลื่อนที่แบบบราวน์ (Brownian motion) ของแบคทีเรียเกิดจากสาเหตุใด?", opts: ["การพัดโบกของแฟลกเจลลา", "การไหลของไซโทพลาซึมภายในเซลล์", "การชนแบบสุ่มของโมเลกุลน้ำรอบตัวเซลล์", "แรงดึงดูดของแสงสว่าง"], ans: 2 },
      { q: "เมื่อเพิ่มอุณหภูมิของอาหารเหลว อัตราการแพร่ของอนุภาคแบบบราวน์จะเป็นอย่างไร?", opts: ["เพิ่มขึ้น เพราะพลังงานจลน์เฉลี่ยของโมเลกุลน้ำสูงขึ้น", "ลดลง เพราะความหนาแน่นน้ำเพิ่มขึ้น", "คงที่เสมอ", "หยุดการเคลื่อนที่ทันที"], ans: 0 },
      { q: "ลักษณะการเคลื่อนที่แบบ Run and Tumble พบในแบคทีเรียประเภทใด?", opts: ["แบคทีเรียที่ไม่มีแฟลกเจลลา", "แบคทีเรียที่มีแฟลกเจลลาเคลื่อนที่อย่างมีทิศทาง", "สปอร์ของแบคทีเรีย", "ไวรัสทุกชนิด"], ans: 1 }
    ]
  },

  lab03: {
    id: "lab03",
    num: 3,
    badge: "Lab 03",
    titleTh: "กฎของนิวตัน ความหนืด และอัตราการตกตะกอนตามกฎของสโตกส์",
    titleEn: "Newton's Laws, Fluid Viscosity & Stokes Sedimentation",
    category: "กลศาสตร์ของไหลและการตกตะกอน",
    icon: "fa-solid fa-flask-vial",
    instrument: "Stokes Fall Tube & Micro-Falling Ball Viscometer",
    description: "การวัดค่าความหนืดของอาหารเลี้ยงเชื้อ และการคำนวณความเร็วปลายสุด (Terminal Velocity) ของเซลล์จุลินทรีย์ภายใต้แรงโน้มถ่วงและแรงหนืด",
    formulaLatex: "v_t = \\frac{2 r^2 (\\rho_p - \\rho_f) g}{9 \\eta}",
    formulaDesc: "ความเร็วตกตะกอนปลายสุดแปรผันตรงกับรัศมีเซลล์ยกกำลังสอง (r²) และผลต่างความหนาแน่น แต่แปรผกผันกับความหนืดของของไหล (η)",
    params: [
      { id: "cell_radius_um", label: "รัศมีเซลล์ r (µm)", min: 0.5, max: 10.0, step: 0.5, default: 2.0, unit: "µm" },
      { id: "fluid_medium", label: "ตัวกลางของไหล", type: "select", options: [
        { val: "water", text: "น้ำบริสุทธิ์ (η = 1.00 mPa·s, ρ = 1.00 g/mL)" },
        { val: "lb_broth", text: "อาหารเหลว LB Broth (η = 1.15 mPa·s, ρ = 1.01 g/mL)" },
        { val: "glycerol_20", text: "สารละลายกลีเซอรอล 20% (η = 1.76 mPa·s, ρ = 1.05 g/mL)" }
      ]},
      { id: "gravity_factor", label: "อัตราเร่งแรงโน้มถ่วง (1g หรือ Centrifuge)", min: 1, max: 100, step: 5, default: 1, unit: "g" }
    ],
    calcPhysics: function(p) {
      let eta = (p.fluid_medium === "water") ? 1.00e-3 : ((p.fluid_medium === "lb_broth") ? 1.15e-3 : 1.76e-3);
      let rho_f = (p.fluid_medium === "water") ? 1000 : ((p.fluid_medium === "lb_broth") ? 1010 : 1050);
      let rho_p = 1080; // bacterial cell density kg/m^3
      let r = p.cell_radius_um * 1e-6;
      let g = 9.81 * p.gravity_factor;
      let vt = (2 * r * r * (rho_p - rho_f) * g) / (9 * eta); // m/s
      let vt_um_s = vt * 1e6;
      let time_1cm_min = (0.01 / vt) / 60.0;
      return {
        vt_um_s: vt_um_s.toFixed(3) + " µm/s",
        vt_cm_hr: (vt * 3600 * 100).toFixed(2) + " cm/hr",
        time_1cm: time_1cm_min > 9999 ? "> 10,000 นาที" : time_1cm_min.toFixed(1) + " นาที",
        sediment_rate: vt_um_s > 10 ? "ตกตะกอนรวดเร็ว" : "แขวนลอยได้นาน (Suspension)"
      };
    },
    tableCols: ["รัศมีเซลล์ (µm)", "ตัวกลาง", "ความหนืด (mPa·s)", "แรงโน้มถ่วง (g)", "ความเร็วปลายสุด (µm/s)", "เวลาตก 1 cm (นาที)"],
    defaultTrials: [
      { trial: 1, p1: "1.0", p2: "น้ำบริสุทธิ์", p3: "1.00", p4: "1 g", err: "0.174" },
      { trial: 2, p1: "2.0", p2: "LB Broth", p3: "1.15", p4: "1 g", err: "0.606" },
      { trial: 3, p1: "5.0", p2: "กลีเซอรอล 20%", p3: "1.76", p4: "10 g", err: "24.6" }
    ],
    quiz: [
      { q: "ตามกฎของสโตกส์ ถ้าเซลล์มีขนาดเส้นผ่านศูนย์กลางใหญ่ขึ้นเป็น 2 เท่า ความเร็วในการตกตะกอนจะเพิ่มขึ้นกี่เท่า?", opts: ["2 เท่า", "4 เท่า", "8 เท่า", "16 เท่า"], ans: 1 },
      { q: "เหตุใดเซลล์แบคทีเรียขนาด 1 µm จึงสามารถแขวนลอยอยู่ในน้ำได้นานโดยไม่ตกตะกอนทันที?", opts: ["เพราะเซลล์มีน้ำหนักเป็นศูนย์", "เพราะแรงหนืดและการชนแบบบราวน์เอาชนะแรงโน้มถ่วงที่กระทำต่อมวลเซลล์ขนาดจิ๋ว", "เพราะน้ำมีแรงผลักแม่เหล็ก", "เพราะเซลล์สร้างฟองอากาศ"], ans: 1 },
      { q: "ถ้าเพิ่มความหนืดของตัวกลางเป็น 2 เท่า ความเร็วปลายสุด vt จะเปลี่ยนแปลงอย่างไร?", opts: ["เพิ่มขึ้นเป็น 2 เท่า", "ลดลงเหลือครึ่งหนึ่ง", "เท่าเดิม", "ลดลงเหลือหนึ่งในสี่"], ans: 1 }
    ]
  },

  lab04: {
    id: "lab04",
    num: 4,
    badge: "Lab 04",
    titleTh: "การอนุรักษ์พลังงานและการคำนวณ RCF (×g) ของเครื่องปั่นเหวี่ยง",
    titleEn: "Energy Conservation & Centrifuge RCF Rotor Balancing",
    category: "กลศาสตร์การหมุนและแรงเหวี่ยงหนีศูนย์กลาง",
    icon: "fa-solid fa-compact-disc",
    instrument: "High-Speed Microcentrifuge & 3D Balanced Rotor",
    description: "การคำนวณแรงหนีศูนย์กลางสัมพัทธ์ (Relative Centrifugal Field: RCF) จากความเร็วรอบ (RPM) และรัศมีโรเตอร์ พร้อมการถ่วงสมดุลหลอดตัวอย่าง 180°",
    formulaLatex: "\\text{RCF } (\\times g) = 1.118 \\times 10^{-5} \\times r_{\\text{cm}} \\times (\\text{RPM})^2",
    formulaDesc: "แรงหนีศูนย์กลางสัมพัทธ์แปรผันตรงกับรัศมีของโรเตอร์ (r) และแปรผันตรงกับความเร็วรอบยกกำลังสอง (RPM²)",
    params: [
      { id: "rpm", label: "ความเร็วรอบ (RPM)", min: 1000, max: 15000, step: 500, default: 6000, unit: "RPM" },
      { id: "rotor_radius_cm", label: "รัศมีโรเตอร์ r (cm)", min: 5.0, max: 20.0, step: 0.5, default: 10.0, unit: "cm" },
      { id: "balancing_state", label: "การจัดวางหลอดถ่วงสมดุล", type: "select", options: [
        { val: "balanced", text: "ถ่วงสมดุลตรงข้าม 180° มวลเท่ากัน (ปลอดภัย 100%)" },
        { val: "unbalanced", text: "ไม่ใส่หลอดถ่วงน้ำหนัก (ไม่สมดุล — สั่นสะเทือนรุนแรง!)" },
        { val: "triangle", text: "สมมาตรสามเหลี่ยม 120° (สมดุล 3 หลอด)" }
      ]}
    ],
    calcPhysics: function(p) {
      let rcf = 1.118e-5 * p.rotor_radius_cm * Math.pow(p.rpm, 2);
      let angular_v = (2 * Math.PI * p.rpm) / 60.0; // rad/s
      let kinetic_energy = 0.5 * 0.45 * Math.pow(angular_v, 2); // J (approx rotor inertia 0.45 kg m^2)
      let vibration = p.balancing_state === "unbalanced" ? "สูงมาก (อันตราย! เครื่องตัดการทำงาน)" : "ปกติ นิ่งสนิท (< 0.05 mm/s)";
      return {
        rcf_xg: rcf.toFixed(1) + " × g",
        angular_vel: angular_v.toFixed(1) + " rad/s",
        kinetic_energy: kinetic_energy.toFixed(1) + " Joules",
        safety_status: vibration,
        sample_sediment: rcf >= 5000 ? "ตกตะกอนเซลล์แบคทีเรียได้สมบูรณ์" : (rcf >= 2000 ? "ตกตะกอนเฉพาะเซลล์ยีสต์ขนาดใหญ่" : "แรงเหวี่ยงไม่เพียงพอ")
      };
    },
    tableCols: ["ความเร็วรอบ (RPM)", "รัศมีโรเตอร์ (cm)", "ความเร็วเชิงมุม (rad/s)", "แรงหนีศูนย์กลาง RCF (×g)", "สถานะโรเตอร์", "ผลการตกตะกอน"],
    defaultTrials: [
      { trial: 1, p1: 3000, p2: 10.0, p3: "314.2", p4: "1006.2", err: "สมดุล 180°" },
      { trial: 2, p1: 6000, p2: 10.0, p3: "628.3", p4: "4024.8", err: "สมดุล 180°" },
      { trial: 3, p1: 8000, p2: 10.0, p3: "837.8", p4: "7155.2", err: "สมดุล 180°" }
    ],
    quiz: [
      { q: "ถ้าเพิ่มความเร็วรอบจาก 3,000 RPM เป็น 6,000 RPM ค่า RCF จะเพิ่มขึ้นเป็นกี่เท่า?", opts: ["2 เท่า", "4 เท่า", "8 เท่า", "16 เท่า"], ans: 1 },
      { q: "การวางหลอดตัวอย่าง 1 หลอดในเครื่องปั่นเหวี่ยงโดยไม่มีหลอดถ่วงน้ำหนักตรงข้ามจะส่งผลอย่างไร?", opts: ["เครื่องทำงานเร็วขึ้น", "เกิดแรงไม่สมดุล แกนหมุนคดและอาจเกิดอุบัติเหตุรุนแรง", "ตัวอย่างตกตะกอนดีขึ้น", "ไม่มีผลเสียใดๆ"], ans: 1 },
      { q: "เครื่อง Centrifuge ในสองห้องปฏิบัติการ: เครื่อง A รัศมี 5 cm, เครื่อง B รัศมี 10 cm หมุนที่ 4,000 RPM เท่ากัน เครื่องใดให้แรงเหวี่ยงมากกว่า?", opts: ["เครื่อง A", "เครื่อง B (เพราะรัศมีมากกว่า 2 เท่า)", "เท่ากัน", "ขึ้นอยู่กับอุณหภูมิห้อง"], ans: 1 }
    ]
  },

  lab05: {
    id: "lab05",
    num: 5,
    badge: "Lab 05",
    titleTh: "ความร้อนจำเพาะและเสถียรภาพทางความร้อนของระบบบ่มเชื้อ & PCR",
    titleEn: "Specific Heat & Thermal Stability of Incubator and PCR",
    category: "อุณหพลศาสตร์และการควบคุมอุณหภูมิ",
    icon: "fa-solid fa-temperature-three-quarters",
    instrument: "Microbial Incubator & 3-Step PCR Thermal Cycler",
    description: "การถ่ายโอนความร้อน กฎการเย็นตัวของนิวตัน และการควบคุมอุณหภูมิ 3 สเต็ปของเครื่อง PCR (Denaturation 95°C, Annealing 55°C, Extension 72°C)",
    formulaLatex: "Q = m c \\Delta T \\quad \\text{and} \\quad \\frac{dT}{dt} = -k (T - T_{\\text{env}})",
    formulaDesc: "ความร้อนที่ต้องใช้ขึ้นกับมวลและความจุความร้อนจำเพาะ (c) และอัตราการเปลี่ยนอุณหภูมิตามเวลาของบล็อกเพลเทียร์ (Peltier Element)",
    params: [
      { id: "pcr_step", label: "ขั้นตอนวัฏจักร PCR", type: "select", options: [
        { val: "denature", text: "1. Denaturation (95°C — แยกสายดีเอ็นเอ)" },
        { val: "anneal", text: "2. Annealing (55°C — ไพรเมอร์จับสายต้นแบบ)" },
        { val: "extend", text: "3. Extension (72°C — Taq Polymerase สังเคราะห์สาย)" }
      ]},
      { id: "reaction_vol_uL", label: "ปริมาตรสารละลาย PCR ต่อหลอด (µL)", min: 10, max: 100, step: 10, default: 50, unit: "µL" },
      { id: "heating_rate", label: "อัตราการให้ความร้อนเพลเทียร์ (°C/s)", min: 1.0, max: 6.0, step: 0.5, default: 3.5, unit: "°C/s" }
    ],
    calcPhysics: function(p) {
      let target_T = p.pcr_step === "denature" ? 95 : (p.pcr_step === "anneal" ? 55 : 72);
      let m_kg = (p.reaction_vol_uL * 1e-6) * 1.0;
      let c_water = 4184; // J/(kg K)
      let delta_T = Math.abs(target_T - 25);
      let Q = m_kg * c_water * delta_T;
      let ramp_time = (delta_T / p.heating_rate).toFixed(1);
      return {
        target_temp: target_T + " °C",
        heat_energy: Q.toFixed(2) + " Joules",
        ramp_time: ramp_time + " วินาที",
        efficiency: "เสถียรภาพอุณหภูมิ ±0.1°C (Peltier Closed-Loop PID)"
      };
    },
    tableCols: ["ขั้นตอน PCR", "อุณหภูมิเป้าหมาย (°C)", "ปริมาตรสาร (µL)", "ความร้อนสะสม Q (J)", "เวลารอเข้าสู่สมดุล (s)", "บทบาททางชีววิทยา"],
    defaultTrials: [
      { trial: 1, p1: "Denaturation", p2: "95.0", p3: 50, p4: "14.64", err: "20.0" },
      { trial: 2, p1: "Annealing", p2: "55.0", p3: 50, p4: "6.28", err: "8.6" },
      { trial: 3, p1: "Extension", p2: "72.0", p3: 50, p4: "9.83", err: "13.4" }
    ],
    quiz: [
      { q: "ในปฏิกิริยา PCR ขั้นตอน Denaturation ที่ 95°C มีเป้าหมายทางฟิสิกส์-เคมีอย่างไร?", opts: ["ทำลายเซลล์แบคทีเรีย", "ทำลายพันธะไฮโดรเจนเพื่อแยกสายคู่ดีเอ็นเอออกเป็นสายเดี่ยว", "กระตุ้นเอนไซม์ให้ทำงานเร็วที่สุด", "ระเหยน้ำส่วนเกินออก"], ans: 1 },
      { q: "เหตุใดเครื่อง PCR สมัยใหม่จึงใช้ Peltier Element แทนขดลวดความร้อนธรรมดา?", opts: ["เพราะราคาถูกกว่า", "เพราะสามารถสลับให้ความร้อนและทำความเย็นได้อย่างรวดเร็วในชิ้นเดียว", "เพราะไม่ต้องใช้กระแสไฟฟ้า", "เพราะไม่ทำให้เกิดแสงสะท้อน"], ans: 1 },
      { q: "น้ำมีความจุความร้อนจำเพาะสูง (c ≈ 4,184 J/kg·K) ส่งผลดีต่อระบบบ่มเชื้อ (Water Bath) อย่างไร?", opts: ["ช่วยรักษาอุณหภูมิให้คงที่ ไม่แกว่งตามสิ่งแวดล้อมภายนอกได้ง่าย", "ทำให้น้ำเดือดได้ที่อุณหภูมิต่ำ", "ลดการระเหยของของเหลว", "ทำให้เชื้อเจริญเร็วขึ้น 10 เท่า"], ans: 0 }
    ]
  },

  lab06: {
    id: "lab06",
    num: 6,
    badge: "Lab 06",
    titleTh: "ความดันไอ จุดเดือด และความปลอดภัยของหม้อนึ่งความดันไอ (Autoclave)",
    titleEn: "Vapor Pressure, Boiling Point & Autoclave Sterilization Safety",
    category: "อุณหพลศาสตร์และฟิสิกส์ความดัน",
    icon: "fa-solid fa-gauge-high",
    instrument: "Digital Steam Autoclave 121°C / 15 psi Chamber",
    description: "การเพิ่มจุดเดือดของน้ำภายใต้ความดันไออิ่มตัว (Clausius-Clapeyron) และการวิเคราะห์ 3 กรณีศึกษาความปลอดภัยในห้องแล็บจุลชีววิทยา",
    formulaLatex: "\\ln\\left(\\frac{P_2}{P_1}\\right) = -\\frac{\\Delta H_{\\text{vap}}}{R} \\left( \\frac{1}{T_2} - \\frac{1}{T_1} \\right)",
    formulaDesc: "เมื่อความดันเกจเพิ่มขึ้นเป็น 15 psi (ความดันสัมบูรณ์ ~2 atm) จุดเดือดของน้ำจะสูงขึ้นจาก 100°C เป็น 121°C ทำให้ทำลายสปอร์แบคทีเรียได้สมบูรณ์",
    params: [
      { id: "gauge_pressure_psi", label: "ความดันเกจ (psi)", min: 0, max: 30, step: 1, default: 15, unit: "psi" },
      { id: "case_study", label: "กรณีศึกษาความผิดพลาดในการนึ่ง", type: "select", options: [
        { val: "normal", text: "สภาวะถูกต้อง: ไอน้ำแทรกทั่วถึง ฝาหลวม ระบายความดันช้า (ปลอดภัย 100%)" },
        { val: "case1_tight_bag", text: "กรณี 1: มัดปากถุงพลาสติกแน่น (ไอน้ำแทรกไม่ได้ สปอร์ไม่ตาย)" },
        { val: "case2_closed_cap", text: "กรณี 2: ปิดฝาขวดแก้วแน่นสนิท (ขวดระเบิดแตกภายในหม้อ!)" },
        { val: "case3_rapid_exhaust", text: "กรณี 3: เปิดวาล์วระบายดันเร็วเกินไป (อาหารเดือดทะลักล้นขวด!)" }
      ]}
    ],
    calcPhysics: function(p) {
      let p_atm = 1.0 + (p.gauge_pressure_psi / 14.696);
      let t_boil_c = 100 + (p.gauge_pressure_psi * 1.4); // approx Clausius-Clapeyron around 1-2 atm
      let state = "ปกติ";
      if (p.case_study === "case1_tight_bag") state = "⚠️ ล้มเหลว: Spore Strip ยังมีชีวิต (ไอน้ำเข้าไปแทนที่อากาศไม่ได้)";
      else if (p.case_study === "case2_closed_cap") state = "💥 อันตราย: ขวดแก้วแตกจากผลต่างความดันภายใน-ภายนอก";
      else if (p.case_study === "case3_rapid_exhaust") state = "🌋 อันตราย: ของเหลวเดือดรุนแรง (Superheated Boil-over)";
      return {
        abs_pressure: p_atm.toFixed(2) + " atm",
        boiling_temp: t_boil_c.toFixed(1) + " °C",
        spore_kill: t_boil_c >= 121 && p.case_study === "normal" ? "ทำลายสปอร์ Geobacillus stearothermophilus 100%" : "สปอร์อาจรอดชีวิต",
        chamber_risk: state
      };
    },
    tableCols: ["ความดันเกจ (psi)", "ความดันสัมบูรณ์ (atm)", "อุณหภูมิไอน้ำ (°C)", "กรณีศึกษา", "ผลลัพธ์ความปลอดภัย", "การผ่านเกณฑ์สปอร์"],
    defaultTrials: [
      { trial: 1, p1: 0, p2: "1.00", p3: "100.0", p4: "ความดันบรรยากาศ", err: "ไม่ผ่าน (สปอร์ไม่ตาย)" },
      { trial: 2, p1: 15, p2: "2.02", p3: "121.0", p4: "มาตรฐาน (ฝาหลวม)", err: "ผ่านสมบูรณ์ 100%" },
      { trial: 3, p1: 15, p2: "2.02", p3: "121.0", p4: "ปิดฝาเกลียวแน่น", err: "อันตราย: ขวดแตก" }
    ],
    quiz: [
      { q: "เหตุใดการนึ่งฆ่าเชื้อใน Autoclave จึงต้องใช้ความดัน 15 psi ควบคู่กับอุณหภูมิ 121°C?", opts: ["เพื่อเพิ่มจุดเดือดของไอน้ำให้สูงพอที่จะทำลายเอนโดสปอร์ของแบคทีเรีย", "เพื่อบีบอัดให้จุลินทรีย์ตัวแบนลง", "เพื่อให้หม้อนึ่งทำงานเงียบขึ้น", "เพื่อประหยัดน้ำ"], ans: 0 },
      { q: "เพราะเหตุใดจึงห้ามปิดฝาเกลียวขวดแก้วใส่อาหารเลี้ยงเชื้อให้แน่นสนิทก่อนนำเข้าหม้อนึ่ง?", opts: ["เพราะอาหารจะระเหยหมด", "เพราะเมื่ออุณหภูมิและความดันเพิ่มขึ้น อากาศภายในขยายตัวจะทำให้ขวดระเบิดแตกได้", "เพราะไอน้ำจะทำปฏิกิริยากับแก้ว", "เพราะฝาจะละลาย"], ans: 1 },
      { q: "หลังนึ่งฆ่าเชื้ออาหารเลี้ยงเชื้อเหลวครบเวลา หากรีบเปิดวาล์วระบายความดันออกอย่างรวดเร็วจะเกิดผลอย่างไร?", opts: ["อาหารจะเย็นตัวอย่างปลอดภัย", "จุดเดือดของอาหารจะลดลงฮวบฮาบจนของเหลวเดือดพุ่งทะลักล้นปากขวด", "อาหารจะแข็งตัวทันที", "หม้อนึ่งจะดับเอง"], ans: 1 }
    ]
  },

  lab07: {
    id: "lab07",
    num: 7,
    badge: "Lab 07",
    titleTh: "ไฟฟ้าสถิต แรงคูลอมบ์ และศักย์ซีตาในการย้อมสีแกรม",
    titleEn: "Electrostatics, Coulomb Force & Zeta Potential in Gram Stain",
    category: "ไฟฟ้าสถิตและแรงกระทำระดับโมเลกุล",
    icon: "fa-solid fa-bolt",
    instrument: "Gram Stain Electrostatic Dipole & Zeta Potential Meter",
    description: "การวิเคราะห์แรงดึงดูดทางไฟฟ้าระหว่างสีย้อมประจุบวก (Crystal Violet+) กับผนังเซลล์ประจุลบ (Teichoic acid / LPS) และผลของศักย์ซีตา (Zeta Potential)",
    formulaLatex: "F_e = \\frac{1}{4 \\pi \\varepsilon_0} \\frac{|q_1 q_2|}{r^2} \\quad \\text{and} \\quad \\zeta = \\frac{\\eta \\mu_e}{\\varepsilon_r \\varepsilon_0}",
    formulaDesc: "แรงคูลอมบ์ดึงดูดไอออนบวกของสีเข้าจับกับโครงสร้างฟอสเฟตบนผนังเซลล์แบคทีเรียแกรมบวกและแกรมลบ",
    params: [
      { id: "bacteria_gram", label: "ชนิดแบคทีเรีย", type: "select", options: [
        { val: "gram_pos", text: "Gram-positive (Staphylococcus — Peptidoglycan หนา + Teichoic acid ลบสูง)" },
        { val: "gram_neg", text: "Gram-negative (E. coli — Peptidoglycan บาง + เยื่อหุ้มชั้นนอก LPS)" }
      ]},
      { id: "stain_agent", label: "ขั้นตอนสารเคมี", type: "select", options: [
        { val: "crystal_violet", text: "1. Crystal Violet (สีย้อมหลัก ประจุบวก CV+)" },
        { val: "iodine", text: "2. Gram's Iodine (มอร์แดนต์ เกิด CV-I Complex ขนาดใหญ่)" },
        { val: "alcohol", text: "3. 95% Ethyl Alcohol (ชะล้างไขมัน)" },
        { val: "safranin", text: "4. Safranin (สีย้อมรอง ประจุบวก สีชมพู/แดง)" }
      ]},
      { id: "ph_medium", label: "pH ของสารละลาย", min: 3.0, max: 10.0, step: 0.5, default: 7.0, unit: "pH" }
    ],
    calcPhysics: function(p) {
      let isPos = p.bacteria_gram === "gram_pos";
      let zeta = isPos ? -38.5 - (p.ph_medium - 7)*2.5 : -24.0 - (p.ph_medium - 7)*2.0;
      let finalColor = "สีม่วงเข้ม (Purple)";
      if (!isPos && (p.stain_agent === "alcohol" || p.stain_agent === "safranin")) {
        finalColor = p.stain_agent === "safranin" ? "สีชมพู/แดง (Pink/Red)" : "ใส ไม่มีสี (Decolorized)";
      }
      return {
        zeta_potential: zeta.toFixed(1) + " mV (ประจุลบ)",
        coulomb_binding: "แรงดึงดูดไฟฟ้าสถิตสูง (Electrostatic Adsorption)",
        microscopic_color: finalColor,
        wall_structure: isPos ? "Peptidoglycan หนา 20-80 nm ดักจับ CV-I ไว้ได้" : "Peptidoglycan บาง 2-7 nm แอลกอฮอล์ละลาย LPS"
      };
    },
    tableCols: ["ขั้นตอนสาร", "ชนิดแบคทีเรีย", "pH", "ศักย์ซีตา (mV)", "แรงไฟฟ้าสถิต", "สีที่สังเกตได้ใต้กล้อง"],
    defaultTrials: [
      { trial: 1, p1: "Crystal Violet", p2: "Gram-positive", p3: "7.0", p4: "-38.5 mV", err: "สีม่วง" },
      { trial: 2, p1: "Alcohol 95%", p2: "Gram-positive", p3: "7.0", p4: "-38.5 mV", err: "สีม่วง (คงเดิม)" },
      { trial: 3, p1: "Alcohol 95%", p2: "Gram-negative", p3: "7.0", p4: "-24.0 mV", err: "ใส (หลุดออก)" },
      { trial: 4, p1: "Safranin", p2: "Gram-negative", p3: "7.0", p4: "-24.0 mV", err: "สีชมพู/แดง" }
    ],
    quiz: [
      { q: "โมเลกุลสี Crystal Violet มีประจุสุทธิเป็นบวก จึงถูกดึงดูดเข้าหาผนังเซลล์ของแบคทีเรียด้วยแรงชนิดใด?", opts: ["แรงนิวเคลียร์อย่างเข้ม", "แรงไฟฟ้าสถิตตามกฎของคูลอมบ์ (Electrostatic attraction)", "แรงโน้มถ่วง", "แรงแม่เหล็กถาวร"], ans: 1 },
      { q: "การเติม Gram's Iodine มีบทบาททางฟิสิกส์ต่อโมเลกุลสี Crystal Violet อย่างไร?", opts: ["ทำให้สีจางลง", "สร้างสารเชิงซ้อน CV-I ที่มีขนาดโมเลกุลใหญ่ขึ้น ดักติดในโครงข่ายเพปทิโดไกลแคน", "ทำให้เซลล์เคลื่อนที่เร็วขึ้น", "สลายเยื่อหุ้มเซลล์"], ans: 1 },
      { q: "เหตุใดแอลกอฮอล์ 95% จึงล้างสีออกจากแบคทีเรียแกรมลบได้ง่ายกว่าแกรมบวก?", opts: ["เพราะแบคทีเรียแกรมลบมีผนังเพปทิโดไกลแคนบาง และแอลกอฮอล์ละลายเยื่อหุ้มชั้นนอก (LPS) ออกไป", "เพราะแบคทีเรียแกรมลบไม่มีประจุไฟฟ้า", "เพราะแกรมลบตัวใหญ่กว่า", "เพราะไอโอดีนไม่จับกับแกรมลบ"], ans: 0 }
    ]
  },

  lab08: {
    id: "lab08",
    num: 8,
    badge: "Lab 08",
    titleTh: "กฎของโอห์ม มัลติมิเตอร์ และการจำลอง Gel Electrophoresis 3 มิติ",
    titleEn: "Ohm's Law, Multimeter & 3D Agarose Gel Electrophoresis",
    category: "ไฟฟ้ากระแสตรงและอิเล็กโทรโฟรีซิส",
    icon: "fa-solid fa-dna",
    instrument: "Horizontal Gel Electrophoresis Rig & Regulated DC Power Supply",
    description: "การใช้มัลติมิเตอร์วัดความต่างศักย์ กระแสไฟฟ้า และความต้านทานของบัฟเฟอร์ TAE/TBE พร้อมการเคลื่อนที่ของดีเอ็นเอในสนามไฟฟ้าสถิต",
    formulaLatex: "V = I R, \\quad P = V I = I^2 R, \\quad v = \\mu_e E = \\mu_e \\left(\\frac{V}{L}\\right)",
    formulaDesc: "ความเร็วการเคลื่อนที่ของโมเลกุลดีเอ็นเอ (v) แปรผันตรงกับความเข้มสนามไฟฟ้า (E = V/L) แต่โมเลกุลขนาดใหญ่จะถูกหน่วงโดยรูพรุนของเจลอะกาโรส",
    params: [
      { id: "voltage_v", label: "แรงดันไฟฟ้ากระแสตรง V (Volts)", min: 50, max: 150, step: 10, default: 100, unit: "V" },
      { id: "agarose_conc", label: "ความเข้มข้นเจลอะกาโรส (%)", min: 0.7, max: 2.0, step: 0.1, default: 1.0, unit: "%" },
      { id: "buffer_type", label: "ชนิดบัฟเฟอร์นำไฟฟ้า", type: "select", options: [
        { val: "tae_1x", text: "1× TAE Buffer (ความนำไฟฟ้ามาตรฐาน R ≈ 2,500 Ω)" },
        { val: "tbe_1x", text: "1× TBE Buffer (ไอออนิกสูง ทนความร้อนดี R ≈ 2,000 Ω)" },
        { val: "water_err", text: "น้ำกลั่นบริสุทธิ์ (ข้อผิดพลาด: ความต้านทานสูงมาก ไม่มีไอออน)" }
      ]}
    ],
    calcPhysics: function(p) {
      let r = p.buffer_type === "tae_1x" ? 2500 : (p.buffer_type === "tbe_1x" ? 2000 : 500000);
      let current_mA = (p.voltage_v / r) * 1000;
      let power_w = (p.voltage_v * (current_mA / 1000.0));
      let e_field = p.voltage_v / 15.0; // approx 15 cm tank length
      let speed_cm_hr = (e_field * 0.8) / p.agarose_conc;
      return {
        current: current_mA < 1.0 ? "< 0.5 mA (กระแสไม่ไหล)" : current_mA.toFixed(1) + " mA",
        power: power_w.toFixed(2) + " Watts (Joule Heat)",
        field_e: e_field.toFixed(2) + " V/cm",
        dna_speed: speed_cm_hr.toFixed(1) + " cm/hr",
        safety: power_w > 8.0 ? "⚠️ เจลอาจร้อนละลาย (ลดแรงดันไฟฟ้า)" : "ปลอดภัย กระแสคงที่"
      };
    },
    tableCols: ["แรงดัน V (Volts)", "ชนิดบัฟเฟอร์", "ความต้านทาน (Ω)", "กระแสที่วัดได้ (mA)", "กำลังไฟฟ้า (Watts)", "สนามไฟฟ้า (V/cm)"],
    defaultTrials: [
      { trial: 1, p1: 60, p2: "1× TAE", p3: 2500, p4: "24.0 mA", err: "4.00 V/cm" },
      { trial: 2, p1: 100, p2: "1× TAE", p3: 2500, p4: "40.0 mA", err: "6.67 V/cm" },
      { trial: 3, p1: 120, p2: "1× TBE", p3: 2000, p4: "60.0 mA", err: "8.00 V/cm" }
    ],
    quiz: [
      { q: "โมเลกุลดีเอ็นเอมีประจุสุทธิเป็นลบจากหมู่ฟอสเฟต เมื่อต่อไฟ DC จะเคลื่อนที่ไปยังขั้วใด?", opts: ["ขั้วแคโทด (ขั้วลบ สีดำ)", "ขั้วแอโนด (ขั้วบวก สีแดง)", "ไม่เคลื่อนที่", "เคลื่อนที่สุ่มไปทุกทิศทาง"], ans: 1 },
      { q: "ถ้าลืมใส่เกลือบัฟเฟอร์แต่ใช้น้ำกลั่นบริสุทธิ์แทน จะเกิดผลอย่างไรตามกฎของโอห์ม?", opts: ["กระแสไฟฟ้าจะไม่ไหลเนื่องจากน้ำบริสุทธิ์มีความต้านทานสูงมาก ดีเอ็นเอจะไม่วิ่ง", "เจลจะละลายทันที", "ดีเอ็นเอวิ่งเร็วกว่าเดิม 10 เท่า", "ขั้วไฟฟ้าจะระเบิด"], ans: 0 },
      { q: "การตั้งค่าแรงดันไฟฟ้าสูงเกินไป (เช่น 200 V) ส่งผลเสียทางฟิสิกส์ต่อการรันเจลอย่างไร?", opts: ["เกิดความร้อนจูล (Joule heating: P = VI) สูงจนทำให้แผ่นเจลบิดเบี้ยวหรือละลาย แถบดีเอ็นเอเบลอ", "ทำให้ดีเอ็นเอสลายตัวกลายเป็นน้ำ", "ทำให้ประจุดีเอ็นเอเปลี่ยนเป็นบวก", "ไม่มีผลเสียใดๆ"], ans: 0 }
    ]
  },

  lab09: {
    id: "lab09",
    num: 9,
    badge: "Lab 09",
    titleTh: "การสะท้อน การหักเหของแสง และคุณสมบัติของเลนส์นูน",
    titleEn: "Light Reflection, Snell's Law Refraction & Thin Lens",
    category: "ทัศนศาสตร์เชิงเรขาคณิต",
    icon: "fa-solid fa-lightbulb",
    instrument: "Laser Optical Bench & Semicircular Refraction Tank",
    description: "การทดสอบกฎของสเนลล์ (Snell's Law) มุมวิกฤต การสะท้อนกลับหมด และการสร้างภาพของเลนส์นูนสำหรับระบบลำกล้องจุลทรรศน์",
    formulaLatex: "n_1 \\sin(\\theta_1) = n_2 \\sin(\\theta_2) \\quad \\text{and} \\quad \\frac{1}{f} = \\frac{1}{s} + \\frac{1}{s'}",
    formulaDesc: "ดัชนีหักเหของอากาศ n₁ = 1.000, น้ำ n = 1.333, แก้วสไลด์ n = 1.520 และน้ำมันหยดเลนส์ n = 1.515",
    params: [
      { id: "incident_angle_deg", label: "มุมตกกระทบ θ₁ (องศา)", min: 0, max: 80, step: 5, default: 30, unit: "°" },
      { id: "medium_2", label: "ตัวกลางที่สอง (Medium 2)", type: "select", options: [
        { val: "water", text: "น้ำบริสุทธิ์ (n = 1.333)" },
        { val: "glass", text: "สไลด์แก้วคราวน์ (n = 1.520)" },
        { val: "oil", text: "น้ำมัน Immersion Oil (n = 1.515)" }
      ]},
      { id: "lens_f_cm", label: "ความยาวโฟกัสเลนส์นูน f (cm)", min: 5, max: 20, step: 1, default: 10, unit: "cm" }
    ],
    calcPhysics: function(p) {
      let n2 = p.medium_2 === "water" ? 1.333 : (p.medium_2 === "glass" ? 1.520 : 1.515);
      let theta1_rad = (p.incident_angle_deg * Math.PI) / 180.0;
      let sin_theta2 = Math.sin(theta1_rad) / n2;
      let theta2_deg = (Math.asin(sin_theta2) * 180.0) / Math.PI;
      let critical_angle = (Math.asin(1.0 / n2) * 180.0) / Math.PI;
      return {
        refracted_angle: theta2_deg.toFixed(2) + " °",
        critical_angle: critical_angle.toFixed(2) + " ° (มุมวิกฤตเมื่อย้อนกลับ)",
        speed_in_medium: (3e8 / n2 / 1e8).toFixed(3) + " × 10⁸ m/s",
        snell_constant: (Math.sin(theta1_rad) / Math.sin(theta2_deg * Math.PI / 180.0)).toFixed(3)
      };
    },
    tableCols: ["มุมตกกระทบ θ₁ (°)", "ตัวกลางที่ 2", "sin(θ₁)", "มุมหักเห θ₂ (°)", "sin(θ₂)", "ดัชนีหักเหคำนวณ n₂"],
    defaultTrials: [
      { trial: 1, p1: 20, p2: "สไลด์แก้ว (1.520)", p3: "0.342", p4: "13.0°", err: "1.520" },
      { trial: 2, p1: 40, p2: "สไลด์แก้ว (1.520)", p3: "0.643", p4: "25.0°", err: "1.521" },
      { trial: 3, p1: 60, p2: "สไลด์แก้ว (1.520)", p3: "0.866", p4: "34.8°", err: "1.519" }
    ],
    quiz: [
      { q: "เมื่อลำแสงเดินทางจากอากาศเข้าสู่เนื้อแก้ว ลำแสงหักเหจะมีลักษณะอย่างไร?", opts: ["เบนออกจากเส้นแนวฉาก", "เบนเข้าหาเส้นแนวฉาก เพราะแก้วมีความหนาแน่นเชิงแสงสูงกว่า", "ไม่เบน เดินทางเป็นเส้นตรงเหมือนเดิม", "สะท้อนกลับหมด 100%"], ans: 1 },
      { q: "ดัชนีหักเหของแสง (Index of Refraction: n) มีนิยามทางฟิสิกส์อย่างไร?", opts: ["อัตราส่วนระหว่างความเร็วแสงในสุญญากาศ (c) ต่อความเร็วแสงในตัวกลางนั้น (v)", "มวลของแสงต่อปริมาตร", "ความยาวคลื่นแสงคูณด้วยความถี่", "พลังงานของโฟตอน"], ans: 0 },
      { q: "ถ้าต้องการให้เกิดปรากฏการณ์สะท้อนกลับหมด (Total Internal Reflection) แสงต้องเดินทางอย่างไร?", opts: ["จากตัวกลางดัชนีหักเหน้อยไปมาก", "จากตัวกลางดัชนีหักเหมากไปยังตัวกลางดัชนีหักเหน้อย และมุมตกกระทบโตกว่ามุมวิกฤต", "ที่มุมตกกระทบ 0 องศาเสมอ", "ในสุญญากาศเท่านั้น"], ans: 1 }
    ]
  },

  lab10: {
    id: "lab10",
    num: 10,
    badge: "Lab 10",
    titleTh: "ฟิสิกส์ของกล้องจุลทรรศน์ การใช้ Immersion Oil และการวัดขนาดเซลล์",
    titleEn: "Microscope Physics, Immersion Oil & Cell Micrometry",
    category: "ทัศนศาสตร์ขั้นสูงและกล้องจุลทรรศน์",
    icon: "fa-solid fa-microscope",
    instrument: "Compound Microscope 100× Oil Immersion & Stage Micrometer",
    description: "การเพิ่มค่า Numerical Aperture (NA) เพื่อลดขีดจำกัดการแยกชัด (Limit of Resolution d = 0.61λ/NA) และการเทียบสเกลไมโครมิเตอร์วัดขนาดเซลล์",
    formulaLatex: "d = \\frac{0.61 \\lambda}{\\text{NA}}, \\quad \\text{NA} = n \\sin(\\alpha), \\quad \\text{Cell Size (µm)} = \\text{Ocular Units} \\times \\text{CF}",
    formulaDesc: "น้ำมัน Immersion Oil มีดัชนีหักเห n = 1.515 เท่ากับสไลด์แก้ว ช่วยขจัดการหักเหและสูญเสียแสง ทำให้ลำแสงเข้าสู่หัวเลนส์ 100× ได้ครบถ้วน",
    params: [
      { id: "objective_mag", label: "หัวเลนส์ใกล้วัตถุ", type: "select", options: [
        { val: "10x", text: "10× (Low Power: NA = 0.25)" },
        { val: "40x", text: "40× (High Dry: NA = 0.65)" },
        { val: "100x_dry", text: "100× ไม่หยดน้ำมัน (Air gap: n=1.00, แสงหักเหทิ้ง ภาพมืดเบลอ)" },
        { val: "100x_oil", text: "100× หยดน้ำมัน Immersion Oil (n=1.515, NA = 1.25 คมชัดสูงสุด)" }
      ]},
      { id: "light_wavelength_nm", label: "ความยาวคลื่นแสง λ (nm)", min: 400, max: 700, step: 20, default: 550, unit: "nm" },
      { id: "ocular_divisions", label: "จำนวนขีด Ocular Micrometer ที่วัดได้", min: 1, max: 50, step: 1, default: 8, unit: "ขีด" }
    ],
    calcPhysics: function(p) {
      let na = p.objective_mag === "10x" ? 0.25 : (p.objective_mag === "40x" ? 0.65 : (p.objective_mag === "100x_oil" ? 1.25 : 0.80));
      let lambda_um = p.light_wavelength_nm / 1000.0;
      let d_res_um = (0.61 * lambda_um) / na;
      let cf = p.objective_mag === "10x" ? 10.0 : (p.objective_mag === "40x" ? 2.5 : 1.0); // Calibration factor um/div
      let cell_size_um = p.ocular_divisions * cf;
      return {
        numerical_aperture: na.toFixed(2),
        resolution_limit: (d_res_um * 1000).toFixed(0) + " nm (" + d_res_um.toFixed(3) + " µm)",
        calib_factor: cf.toFixed(1) + " µm/ขีด",
        measured_cell_size: cell_size_um.toFixed(2) + " µm",
        image_quality: p.objective_mag === "100x_oil" ? "คมชัดสูงสุด (ขจัด Refraction Loss 100%)" : (p.objective_mag === "100x_dry" ? "⚠️ แสงหักเหสูญหาย ภาพมัวและควันเกาะหน้าเลนส์" : "ภาพปกติ")
      };
    },
    tableCols: ["กำลังขยายเลนส์", "สภาพตัวกลาง", "ค่า NA", "กำลังแยกชัด d (nm)", "ขีดที่นับได้", "ขนาดเซลล์จริง (µm)"],
    defaultTrials: [
      { trial: 1, p1: "10×", p2: "อากาศ (n=1.00)", p3: "0.25", p4: "1,342 nm", err: "30.0 µm" },
      { trial: 2, p1: "40×", p2: "อากาศ (n=1.00)", p3: "0.65", p4: "516 nm", err: "7.5 µm" },
      { trial: 3, p1: "100×", p2: "Immersion Oil (n=1.515)", p3: "1.25", p4: "268 nm", err: "2.0 µm" }
    ],
    quiz: [
      { q: "เหตุใดจึงต้องหยดน้ำมัน Immersion Oil เมื่อใช้หัวเลนส์วัตถุกำลังขยาย 100×?", opts: ["เพื่อหล่อลื่นไม่ให้สไลด์เสียดสีกับเลนส์", "เพราะน้ำมันมีดัชนีหักเหใกล้เคียงแก้วสไลด์ ทำให้แสงไม่หักเหสูญหายออกไปข้างนอก เพิ่มค่า NA", "เพื่อฆ่าเชื้อแบคทีเรียบนสไลด์", "เพื่อล้างคราบสกปรก"], ans: 1 },
      { q: "ตามเกณฑ์ของเรย์ลี (Rayleigh Criterion) กล้องจุลทรรศน์จะมีกำลังแยกชัด (Resolution) ดีขึ้นเมื่อใด?", opts: ["ค่า d มีค่าน้อยลง (แยกวัตถุที่อยู่ชิดกันได้มากขึ้น)", "ค่า d มีค่ามากขึ้น", "ใช้แสงความยาวคลื่นยาวขึ้น", "ลดค่า Numerical Aperture ลง"], ans: 0 },
      { q: "หากเทียบสเกลที่กำลังขยาย 100× แล้วพบว่า 1 ขีดของ Ocular Micrometer เท่ากับ 1.0 µm ถ้านับเซลล์แบคทีเรียได้ 2.5 ขีด เซลล์มีความยาวเท่าใด?", opts: ["0.25 µm", "2.5 µm", "25 µm", "250 µm"], ans: 1 }
    ]
  },

  lab11: {
    id: "lab11",
    num: 11,
    badge: "Lab 11",
    titleTh: "การลดลงแบบเอกซ์โพเนนเชียลและกฎกำลังสองผกผันของหลอดฆ่าเชื้อ UV-C",
    titleEn: "Exponential Decay & Inverse-Square Law of UV-C Lamps",
    category: "ฟิสิกส์ยุคใหม่และรังสีชีวภาพ",
    icon: "fa-solid fa-sun",
    instrument: "Biosafety Cabinet UV-C Rig & Radiometer Sensor",
    description: "การลดทอนความเข้มแสง UV-C ตามกฎกำลังสองผกผัน (Inverse-Square Law) และอัตราการรอดชีวิตของแบคทีเรียแบบเอกซ์โพเนนเชียล (Thymine Dimer Inactivation)",
    formulaLatex: "I = \\frac{P}{4 \\pi r^2} \\quad \\text{and} \\quad \\frac{N(t)}{N_0} = e^{-k \\cdot I \\cdot t}",
    formulaDesc: "ความเข้มรังสี UV-C ลดลงตามระยะทางยกกำลังสอง และปริมาณรังสีสะสม (Dose = I × t) กำหนดประสิทธิภาพการฆ่าเชื้อ",
    params: [
      { id: "distance_cm", label: "ระยะห่างจากหลอด UV-C ถึงชิ้นงาน (cm)", min: 10, max: 100, step: 5, default: 30, unit: "cm" },
      { id: "exposure_time_min", label: "เวลาที่ฉายรังสี (นาที)", min: 1, max: 60, step: 1, default: 15, unit: "นาที" },
      { id: "lamp_power_w", label: "กำลังวัตต์ของหลอด UV-C (Watts)", min: 15, max: 60, step: 15, default: 30, unit: "W" }
    ],
    calcPhysics: function(p) {
      let r_m = p.distance_cm / 100.0;
      let intensity_uW_cm2 = (p.lamp_power_w * 0.30) / (4 * Math.PI * Math.pow(r_m, 2)) * 100; // approx 30% UV-C efficiency
      let time_s = p.exposure_time_min * 60;
      let dose_mJ_cm2 = (intensity_uW_cm2 * time_s) / 1000.0;
      let k_kill = 0.08; // bacterial sensitivity constant
      let survival_fraction = Math.exp(-k_kill * dose_mJ_cm2);
      let kill_pct = (1.0 - survival_fraction) * 100.0;
      if (kill_pct > 99.999) kill_pct = 99.999;
      return {
        intensity: intensity_uW_cm2.toFixed(1) + " µW/cm²",
        uv_dose: dose_mJ_cm2.toFixed(2) + " mJ/cm²",
        kill_efficiency: kill_pct.toFixed(3) + " % (Log " + (-Math.log10(Math.max(1e-5, survival_fraction))).toFixed(1) + " Reduction)",
        safety_alert: "ห้ามมองหลอดเปลือยโดยตรง (ต้องสวมแว่นกันรังสี UV และปิดกระจกตู้)"
      };
    },
    tableCols: ["ระยะห่าง (cm)", "เวลาฉาย (นาที)", "ความเข้มแสง (µW/cm²)", "พลังงานรังสีสะสม (mJ/cm²)", "อัตราการฆ่าเชื้อ (%)", "Log Reduction"],
    defaultTrials: [
      { trial: 1, p1: 15, p2: 5, p3: "318.3", p4: "95.5", err: "99.95 %" },
      { trial: 2, p1: 30, p2: 15, p3: "79.6", p4: "71.6", err: "99.70 %" },
      { trial: 3, p1: 60, p2: 15, p3: "19.9", p4: "17.9", err: "76.20 %" }
    ],
    quiz: [
      { q: "ถ้าเพิ่มระยะห่างระหว่างชิ้นงานกับหลอด UV-C จาก 20 cm เป็น 40 cm (2 เท่า) ความเข้มแสงจะเปลี่ยนแปลงอย่างไร?", opts: ["ลดลงเหลือครึ่งหนึ่ง", "ลดลงเหลือหนึ่งในสี่ (ตามกฎกำลังสองผกผัน)", "เท่าเดิม", "ลดลงเหลือหนึ่งในแปด"], ans: 1 },
      { q: "กลไกทางฟิสิกส์-ชีววิทยาหลักที่รังสี UV-C (254 nm) ใช้ทำลายแบคทีเรียคืออะไร?", opts: ["ทำให้เซลล์ร้อนจนไหม้", "โฟตอนกระตุ้นการสร้างพันธะโควาเลนต์คู่ผิดปกติระหว่างไทมีน (Thymine Dimer) บนสายดีเอ็นเอ ยับยั้งการจำลองตัว", "ทำลายผนังเซลล์ด้วยแรงดัน", "เปลี่ยนสีเซลล์"], ans: 1 },
      { q: "เหตุใดจึงห้ามเปิดหลอด UV-C ขณะที่ผู้ปฏิบัติงานกำลังทำงานอยู่ในตู้ชีวนิรภัย (Biosafety Cabinet)?", opts: ["เพราะรังสี UV-C ก่อให้เกิดต้อกระจกในดวงตาและมะเร็งผิวหนังอย่างรุนแรง", "เพราะทำให้เปลืองไฟ", "เพราะทำให้สารละลายเปลี่ยนสี", "เพราะทำให้ลมในตู้หยุดพัด"], ans: 0 }
    ]
  },

  lab12: {
    id: "lab12",
    num: 12,
    badge: "Lab 12",
    titleTh: "สเปกโตรโฟโตมิเตอร์ กฎเบียร์-แลมเบิร์ต และกราฟมาตรฐานความขุ่น OD600",
    titleEn: "Spectrophotometer, Beer-Lambert Law & OD600 Standard Curve",
    category: "สเปกโทรสโกปีและเครื่องมือวัดทางชีววิทยา",
    icon: "fa-solid fa-chart-line",
    instrument: "Digital UV-Vis Spectrophotometer & Cuvette Carousel",
    description: "การวัดค่าการดูดกลืนแสงที่ 600 nm (OD600) การสร้างกราฟมาตรฐาน (Standard Curve Linear Regression) และการคำนวณความเข้มข้นตัวอย่างปริศนา (Unknown Sample)",
    formulaLatex: "A = \\varepsilon b c = -\\log_{10}\\left(\\frac{I}{I_0}\\right), \\quad y = mx + c \\implies x_{\\text{unknown}} = \\frac{y - c}{m}",
    formulaDesc: "ค่าการดูดกลืนแสง (Absorbance: A) แปรผันตรงกับความเข้มข้นสาร (c) และความยาวเส้นทางเดินแสงในคิวเวตต์ (b = 1.0 cm) ในช่วงเส้นตรง 0.1 - 0.8 OD",
    params: [
      { id: "wavelength_nm", label: "ความยาวคลื่นแสง λ (nm)", min: 400, max: 700, step: 50, default: 600, unit: "nm" },
      { id: "sample_tube", label: "หลอดตัวอย่างที่ใส่ในคิวเวตต์", type: "select", options: [
        { val: "blank", text: "หลอด Blank (อาหารเลี้ยงเชื้อใส — เซ็ตค่าศูนย์ A = 0.000)" },
        { val: "std1", text: "หลอดมาตรฐาน 1 (ความเข้มข้น 20%)" },
        { val: "std2", text: "หลอดมาตรฐาน 2 (ความเข้มข้น 40%)" },
        { val: "std3", text: "หลอดมาตรฐาน 3 (ความเข้มข้น 60%)" },
        { val: "std4", text: "หลอดมาตรฐาน 4 (ความเข้มข้น 80%)" },
        { val: "unknown", text: "หลอดตัวอย่างปริศนา (Unknown Bacteria Sample)" }
      ]},
      { id: "cuvette_cleanliness", label: "ความสะอาดของผิวคิวเวตต์", type: "select", options: [
        { val: "clean", text: "เช็ดผิวคิวเวตต์สะอาด ไร้รอยนิ้วมือ (Optimal)" },
        { val: "fingerprint", text: "มีรอยนิ้วมือ / คราบของเหลวเกาะ (แสงกระเจิง OD สูงเกินจริง)" },
        { val: "bubble", text: "มีฟองอากาศภายในคิวเวตต์ (ค่าแกว่งไม่นิ่ง)" }
      ]}
    ],
    calcPhysics: function(p) {
      let slope = 0.00925;
      let conc = 0;
      if (p.sample_tube === "blank") conc = 0;
      else if (p.sample_tube === "std1") conc = 20;
      else if (p.sample_tube === "std2") conc = 40;
      else if (p.sample_tube === "std3") conc = 60;
      else if (p.sample_tube === "std4") conc = 80;
      else conc = 52.5; // Unknown true value

      let cleanFactor = p.cuvette_cleanliness === "fingerprint" ? 0.08 : (p.cuvette_cleanliness === "bubble" ? (Math.random()*0.12 - 0.06) : 0);
      let od = (conc * slope) + cleanFactor;
      if (p.sample_tube === "blank") od = 0.000;
      let transmittance = Math.pow(10, -od) * 100.0;

      return {
        measured_od: od.toFixed(3),
        transmittance: transmittance.toFixed(1) + " %T",
        linear_range: od <= 0.85 ? "อยู่ในช่วงเส้นตรง (Beer-Lambert Valid)" : "⚠️ เกินช่วงเส้นตรง (ต้องเจือจางตัวอย่าง)",
        unknown_calc: p.sample_tube === "unknown" ? "คำนวณได้ " + ((od - 0.002) / slope).toFixed(1) + " %" : "-"
      };
    },
    tableCols: ["หลอดตัวอย่าง", "ความเข้มข้น (%)", "ค่า OD600", "%การส่องผ่าน (%T)", "สถานะเส้นตรง", "หมายเหตุ"],
    defaultTrials: [
      { trial: 1, p1: "Blank", p2: "0 %", p3: "0.000", p4: "100.0 %", err: "เซ็ตค่าศูนย์เครื่อง" },
      { trial: 2, p1: "Std 1", p2: "20 %", p3: "0.185", p4: "65.3 %", err: "ช่วงเส้นตรง" },
      { trial: 3, p1: "Std 2", p2: "40 %", p3: "0.370", p4: "42.7 %", err: "ช่วงเส้นตรง" },
      { trial: 4, p1: "Std 3", p2: "60 %", p3: "0.552", p4: "28.1 %", err: "ช่วงเส้นตรง" },
      { trial: 5, p1: "Std 4", p2: "80 %", p3: "0.741", p4: "18.2 %", err: "ช่วงเส้นตรง" },
      { trial: 6, p1: "Unknown", p2: "51.5 % (คำนวณ)", p3: "0.476", p4: "33.4 %", err: "อ่านค่าจากกราฟมาตรฐาน" }
    ],
    quiz: [
      { q: "การทำ Blank (Zeroing) ของเครื่อง Spectrophotometer ก่อนวัดตัวอย่าง มีวัตถุประสงค์เพื่ออะไร?", opts: ["เพื่อล้างคิวเวตต์", "เพื่อหักลบการดูดกลืนแสงของตัวทำละลายและอาหารเลี้ยงเชื้อ ให้ค่าที่วัดได้เป็นของเซลล์เท่านั้น", "เพื่อเปิดหลอดไฟเครื่อง", "เพื่อปรับโฟกัสเลนส์"], ans: 1 },
      { q: "ถ้าตัวอย่างแบคทีเรียมีความเข้มข้นสูงมากจนวัดค่า OD600 ได้ 1.85 ควรแก้ไขอย่างไรเพื่อให้ผลวัดถูกต้องตามกฎเบียร์-แลมเบิร์ต?", opts: ["รายงานค่านั้นทันที", "เจือจางตัวอย่าง (เช่น 1:10) นำไปวัดซ้ำ แล้วคูณกลับด้วย Dilution factor เพราะค่าเกินช่วงเส้นตรง", "เพิ่มแรงดันไฟฟ้าของเครื่อง", "เปลี่ยนความยาวคลื่นเป็น 300 nm"], ans: 1 },
      { q: "รอยนิ้วมือหรือหยดน้ำที่เกาะอยู่บนผิวด้านใสของคิวเวตต์จะส่งผลต่อค่า OD อย่างไร?", opts: ["ทำให้ค่า OD สูงเกินจริง เนื่องจากการกระเจิงแสง (Light Scattering)", "ทำให้ค่า OD ต่ำลง", "ไม่มีผลใดๆ", "ทำให้เครื่องดับ"], ans: 0 }
    ]
  },

  lab13: {
    id: "lab13",
    num: 13,
    badge: "Lab 13",
    titleTh: "โครงงานย่อยบูรณาการ (Mini-Project): ฟิสิกส์ของเครื่องมือจุลชีววิทยาอัจฉริยะ",
    titleEn: "Integrated Mini-Project: Physics of Smart Microbiological Tools",
    category: "การบูรณาการและการออกแบบโครงงาน",
    icon: "fa-solid fa-microchip",
    instrument: "Virtual Instrument Sandbox & IoT Optical Sensor Rig",
    description: "การบูรณาการองค์ความรู้ฟิสิกส์ทั้ง 12 บทเรียน ออกแบบและวิเคราะห์หลักการฟิสิกส์เบื้องหลังเครื่องมือจุลชีววิทยาสมัยใหม่ (Smart Sensor / Edge AI / IoT Fermenter)",
    formulaLatex: "\\text{Rubric Score} = 0.30 \\cdot \\text{Physics Theory} + 0.30 \\cdot \\text{Data Precision} + 0.20 \\cdot \\text{Innovation} + 0.20 \\cdot \\text{Q\\&A}",
    formulaDesc: "เกณฑ์การประเมินรูบริกแบบรอบด้าน: ทฤษฎีฟิสิกส์ (30%), ความแม่นยำของข้อมูล (30%), การประยุกต์ใช้นวัตกรรม (20%), การตอบคำถามเชิงวิชาการ (20%)",
    params: [
      { id: "project_topic", label: "หัวข้อเครื่องมือที่เลือกศึกษา", type: "select", options: [
        { val: "turbidity_iot", text: "เครื่องวัดความขุ่นและอัตราการเติบโตของจุลินทรีย์แบบ IoT ไร้สาย" },
        { val: "ai_cell_counter", text: "ระบบตรวจนับเซลล์และจำแนกสัณฐานวิทยาด้วย Edge AI Vision" },
        { val: "microfluidic_sorter", text: "ชิปจุลของไหลคัดแยกเซลล์ด้วยคลื่นเสียงความถี่สูง (Acoustophoretic Sorter)" },
        { val: "smart_autoclave", text: "ระบบควบคุมความดันและอุณหภูมิ Autoclave อัตโนมัติพร้อมการตรวจจับสปอร์" }
      ]},
      { id: "data_points_count", label: "จำนวนชุดข้อมูลทดสอบ (Data Points)", min: 5, max: 50, step: 5, default: 20, unit: "จุด" },
      { id: "model_fit", label: "ระดับความสอดคล้องของแบบจำลองฟิสิกส์", type: "select", options: [
        { val: "high", text: "แบบจำลองตรงกับทฤษฎีสูง (R² > 0.99)" },
        { val: "moderate", text: "แบบจำลองปานกลาง (R² ≈ 0.95)" }
      ]}
    ],
    calcPhysics: function(p) {
      let r2 = p.model_fit === "high" ? (0.992 + Math.random()*0.006).toFixed(4) : (0.948 + Math.random()*0.015).toFixed(4);
      return {
        selected_project: p.project_topic,
        dataset_size: p.data_points_count + " จุดวัด",
        correlation_r2: r2,
        readiness: "พร้อมสำหรับการนำเสนอโครงงานและตีพิมพ์ผลงานนวัตกรรมระดับปริญญาตรี"
      };
    },
    tableCols: ["ชุดข้อมูล", "ตัวแปรต้น (X)", "ตัวแปรตาม (Y)", "ค่าตามทฤษฎี", "ค่าจำลองจริง", "ความสอดคล้อง (R²)"],
    defaultTrials: [
      { trial: 1, p1: "Trial 1", p2: "Time 0-24 hr", p3: "Biomass OD600", p4: "Logistic Growth", err: "R² = 0.995" },
      { trial: 2, p1: "Trial 2", p2: "Cell Diameter", p3: "Settling Velocity", p4: "Stokes Law", err: "R² = 0.998" },
      { trial: 3, p1: "Trial 3", p2: "Applied Voltage", p3: "Migration Distance", p4: "Electrophoresis", err: "R² = 0.991" }
    ],
    quiz: [
      { q: "ในการออกแบบเครื่องมือวัดทางจุลชีววิทยา สิ่งใดคือข้อกำหนดแรกสุดที่ต้องคำนึงถึงทางฟิสิกส์?", opts: ["ความสวยงามภายนอก", "ความถูกต้องและความแม่นยำ (Accuracy & Precision) พร้อมขอบเขตความคลาดเคลื่อนที่ยอมรับได้", "การมีแสงไฟหลากสี", "น้ำหนักเบาที่สุด"], ans: 1 },
      { q: "ค่าสัมประสิทธิ์การตัดสินใจ (Coefficient of Determination: R²) ที่มีค่าเข้าใกล้ 1.000 บ่งบอกถึงสิ่งใด?", opts: ["ข้อมูลไม่มีความสัมพันธ์กัน", "แบบจำลองสมการฟิสิกส์สามารถอธิบายการกระจายตัวของข้อมูลจริงได้อย่างแม่นยำเกือบ 100%", "ข้อมูลมีความคลาดเคลื่อนสูงมาก", "การทดลองล้มเหลว"], ans: 1 },
      { q: "การประเมินทักษะการปฏิบัติการทางฟิสิกส์ที่ดีที่สุดตามกรอบ OBE (Outcome-Based Education) ควรเน้นที่สิ่งใด?", opts: ["การจำสูตรฟิสิกส์ได้มากที่สุด", "ความสามารถในการลงมือใช้เครื่องมือจริง วิเคราะห์ข้อมูล และเชื่อมโยงอธิบายปรากฏการณ์ทางจุลชีววิทยาได้อย่างเป็นระบบ", "การทำข้อสอบช้อยส์เพียงอย่างเดียว", "ความเร็วในการส่งรายงาน"], ans: 1 }
    ]
  }
};

if (typeof module !== 'undefined' && module.exports) {
  module.exports = LABS_CONFIG;
}
