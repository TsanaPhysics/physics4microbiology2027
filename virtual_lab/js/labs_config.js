/**
 * Modular Data-Driven Configuration for 13 Physics for Microbiology Virtual Labs
 * Course 4011111 Physics for Microbiology (OBE Aligned 2026/2027)
 * Perfectly synchronized with SQLite3 virtual_lab.db & 03_physics4microbio2026 Master Plan
 */

const LABS_CONFIG = {
  lab01: {
    id: "lab01",
    num: 1,
    badge: "Lab 01",
    titleTh: "หน่วย การวัด และการสอบเทียบไมโครปิเปต P1000",
    titleEn: "Units, Measurement & P1000 Micropipette Gravimetric Calibration",
    category: "การวัดและเครื่องมือพื้นฐาน",
    icon: "fa-solid fa-pipette",
    instrument: "Micropipette P1000, Caliper & Analytical Balance 0.0001 g",
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
    titleTh: "เวกเตอร์และแรงในระบบชีวภาพ",
    titleEn: "Vectors & Biomechanical Forces in Microbiology",
    category: "กลศาสตร์และเวกเตอร์ชีวภาพ",
    icon: "fa-solid fa-arrows-split-up-and-left",
    instrument: "3D Biomechanical Force Vector Stage & Force Table",
    description: "การรวมเวกเตอร์แรงดึงดูด แรงผลัก และแรงตึงผิวที่กระทำต่อเซลล์จุลินทรีย์ การเคลื่อนที่แบบบราวน์ (Brownian Motion) และ Chemotaxis ตามสมการ Einstein-Smoluchowski",
    formulaLatex: "\\vec{R} = \\sum \\vec{F}, \\quad \\langle r^2 \\rangle = 6 D t = \\frac{6 k_B T}{6 \\pi \\eta a} t",
    formulaDesc: "เวกเตอร์แรงลัพธ์หาจากผลบวกเวกเตอร์องค์ประกอบ และระยะกระจัดเฉลี่ยของการชนแบบบราวน์แปรผันตรงกับอุณหภูมิสัมบูรณ์",
    params: [
      { id: "force1", label: "แรง F1 (pN)", min: 1, max: 100, step: 5, default: 40, unit: "pN" },
      { id: "angle1", label: "มุม F1 (องศา)", min: 0, max: 360, step: 5, default: 30, unit: "°" },
      { id: "force2", label: "แรง F2 (pN)", min: 1, max: 100, step: 5, default: 50, unit: "pN" },
      { id: "angle2", label: "มุม F2 (องศา)", min: 0, max: 360, step: 5, default: 120, unit: "°" }
    ],
    calcPhysics: function(p) {
      let r1 = p.angle1 * Math.PI / 180;
      let r2 = p.angle2 * Math.PI / 180;
      let fx = p.force1 * Math.cos(r1) + p.force2 * Math.cos(r2);
      let fy = p.force1 * Math.sin(r1) + p.force2 * Math.sin(r2);
      let r = Math.sqrt(fx*fx + fy*fy);
      let angle = (Math.atan2(fy, fx) * 180 / Math.PI + 360) % 360;
      return {
        r_pN: r.toFixed(2) + " pN",
        angle_deg: angle.toFixed(1) + "°",
        fx: fx.toFixed(2) + " pN",
        fy: fy.toFixed(2) + " pN"
      };
    },
    tableCols: ["Trial", "F1 (pN)", "θ1 (°)", "F2 (pN)", "θ2 (°)", "แรงลัพธ์ R (pN)", "ทิศทาง θR (°)"],
    defaultTrials: [
      { trial: 1, p1: 40, p2: 30, p3: 50, p4: 120, err: "78.1" },
      { trial: 2, p1: 30, p2: 0, p3: 40, p4: 90, err: "50.0" },
      { trial: 3, p1: 60, p2: 45, p3: 60, p4: 225, err: "0.0" }
    ],
    quiz: [
      { q: "หากแรงสองแรงขนาด 30 pN และ 40 pN กระทำต่อเซลล์แบคทีเรียในทิศตั้งฉากกัน แรงลัพธ์จะมีขนาดเท่าใด?", opts: ["10 pN", "50 pN", "70 pN", "120 pN"], ans: 1 },
      { q: "การว่ายน้ำแบบ Chemotaxis ของแบคทีเรียแตกต่างจากการเคลื่อนที่แบบ Brownian อย่างไร?", opts: ["Chemotaxis มีทิศทางที่แน่นอนมุ่งหาอาหาร ส่วน Brownian เกิดจากการชนแบบสุ่ม", "Chemotaxis ไม่ต้องใช้พลังงาน", "Brownian ใช้แฟลกเจลลาขับเคลื่อน", "ทั้งสองแบบเหมือนกันทุกประการ"], ans: 0 },
      { q: "หน่วยของแรงในระดับโมเลกุลและเซลล์ชีวภาพที่นิยมใช้คือหน่วยใด?", opts: ["กิโลนิวตัน (kN)", "นิวตัน (N)", "พิโคนิวตัน (pN = 10^-12 N)", "จูล (J)"], ans: 2 }
    ]
  },

  lab03: {
    id: "lab03",
    num: 3,
    badge: "Lab 03",
    titleTh: "การเคลื่อนที่ จลนศาสตร์ และความหนืด",
    titleEn: "Kinematics, Fluid Viscosity & Stokes Sedimentation",
    category: "ของไหลและความหนืด",
    icon: "fa-solid fa-person-running",
    instrument: "Falling-Sphere Viscometer & Stokes Fall Tube 3D",
    description: "จลนศาสตร์การว่ายน้ำของแบคทีเรีย ความหนืดของอาหารเลี้ยงเชื้อ และการตกตะกอนตามกฎของสโตกส์ (Stokes' Law)",
    formulaLatex: "v_t = \\frac{2 r^2 (\\rho_p - \\rho_f) g}{9 \\eta}",
    formulaDesc: "ความเร็วปลายของการตกตะกอนแปรผันตรงกับรัศมีอนุภาคยกกำลังสอง (r²) และแปรผกผันกับความหนืดของของเหลว (η)",
    params: [
      { id: "radius_mm", label: "รัศมีอนุภาค r (mm)", min: 0.5, max: 5.0, step: 0.5, default: 2.0, unit: "mm" },
      { id: "viscosity_mPas", label: "ความหนืดของเหลว η (mPa·s)", min: 1, max: 50, step: 1, default: 10, unit: "mPa·s" },
      { id: "fall_distance_cm", label: "ระยะทางตก h (cm)", min: 10, max: 100, step: 10, default: 50, unit: "cm" }
    ],
    calcPhysics: function(p) {
      let r_m = p.radius_mm * 1e-3;
      let eta = p.viscosity_mPas * 1e-3;
      let rho_p = 2500; // glass bead
      let rho_f = 1050; // broth
      let g = 9.81;
      let vt = (2 * r_m * r_m * (rho_p - rho_f) * g) / (9 * eta);
      let t_fall = (p.fall_distance_cm * 1e-2) / vt;
      return {
        vt: vt.toFixed(3) + " m/s",
        time_s: t_fall.toFixed(2) + " s",
        reynolds: ((rho_f * vt * 2 * r_m) / eta).toFixed(4)
      };
    },
    tableCols: ["Trial", "รัศมี r (mm)", "ความหนืด η (mPa·s)", "ระยะ h (cm)", "เวลาตก t (s)", "ความเร็ว vt (m/s)"],
    defaultTrials: [
      { trial: 1, p1: 1.0, p2: 10, p3: 50, p4: "1.58", err: "0.316" },
      { trial: 2, p1: 2.0, p2: 10, p3: 50, p4: "0.39", err: "1.265" },
      { trial: 3, p1: 3.0, p2: 10, p3: 50, p4: "0.18", err: "2.846" }
    ],
    quiz: [
      { q: "ตามกฎของสโตกส์ หากอนุภาคแบคทีเรียจับกลุ่มกันจนรัศมีเพิ่มขึ้น 2 เท่า ความเร็วในการตกตะกอนจะเพิ่มขึ้นกี่เท่า?", opts: ["2 เท่า", "4 เท่า", "8 เท่า", "เท่าเดิม"], ans: 1 },
      { q: "อาหารเลี้ยงเชื้อที่มีความหนืดสูงขึ้น จะส่งผลอย่างไรต่อการตกตะกอนของเซลล์?", opts: ["เซลล์ตกตะกอนช้าลง", "เซลล์ตกตะกอนเร็วขึ้น", "ไม่มีผลกระทบ", "เซลล์จะลอยขึ้นสู่ผิวน้ำ"], ans: 0 },
      { q: "เลขเรย์โนลด์ส (Reynolds number) ของแบคทีเรียที่ว่ายในน้ำมีค่าอยู่ในช่วงใด?", opts: ["ต่ำมาก (Re << 1) สภาวะความหนืดครอบงำ", "สูงมาก (Re >> 10,000) มีความปั่นป่วนสูง", "ประมาณ 100", "ติดลบ"], ans: 0 }
    ]
  },

  lab04: {
    id: "lab04",
    num: 4,
    badge: "Lab 04",
    titleTh: "กฎการเคลื่อนที่ของนิวตันและการปั่นเหวี่ยง",
    titleEn: "Newton Laws, Centrifugation & RCF Rotor Balancing",
    category: "กลศาสตร์การหมุนและการปั่นเหวี่ยง",
    icon: "fa-solid fa-rotate",
    instrument: "High-Speed Microcentrifuge 3D & Balanced Rotor",
    description: "แรงสู่ศูนย์กลาง อัตราเร่งสู่ศูนย์กลาง และแรงหนีศูนย์กลางสัมพัทธ์ (Relative Centrifugal Field - RCF) ในการแยกตะกอนเซลล์",
    formulaLatex: "\\text{RCF } (\\times g) = 1.118 \\times 10^{-5} \\times r_{\\text{cm}} \\times (\\text{RPM})^2",
    formulaDesc: "แรงเหวี่ยงหนีศูนย์กลางสัมพันธ์แปรผันตรงกับรัศมีหัวปั่น (r) และแปรผันตรงกับความเร็วรอบยกกำลังสอง (RPM²)",
    params: [
      { id: "rpm", label: "ความเร็วรอบ (RPM)", min: 1000, max: 15000, step: 500, default: 8000, unit: "RPM" },
      { id: "rotor_radius_cm", label: "รัศมีโรเตอร์ r (cm)", min: 5, max: 15, step: 0.5, default: 8.5, unit: "cm" },
      { id: "rotor_balance", label: "ความสมดุลของหลอดทดลอง", type: "select", options: [
        { val: "balanced", text: "ถ่วงน้ำหนักสมดุลตรงข้ามกัน 180° (Balanced)" },
        { val: "unbalanced", text: "ไม่ถ่วงน้ำหนัก (Unbalanced — สั่นสะเทือนรุนแรง)" }
      ]}
    ],
    calcPhysics: function(p) {
      let rcf = 1.118e-5 * p.rotor_radius_cm * Math.pow(p.rpm, 2);
      let isUnbalanced = p.rotor_balance === "unbalanced";
      let vibration = isUnbalanced ? "Critical Warning: Severe Wobble!" : "Normal Stable (PBR)";
      return {
        rcf: rcf.toFixed(0) + " × g",
        ac: (rcf * 9.81).toFixed(0) + " m/s²",
        vibration: vibration
      };
    },
    tableCols: ["Trial", "RPM", "รัศมี r (cm)", "RCF (×g)", "สถานะโรเตอร์", "เวลาแยกตะกอน (นาที)"],
    defaultTrials: [
      { trial: 1, p1: 3000, p2: "8.5", p3: "855", p4: "Balanced", err: "15" },
      { trial: 2, p1: 8000, p2: "8.5", p3: "6082", p4: "Balanced", err: "5" },
      { trial: 3, p1: 14000, p2: "8.5", p3: "18626", p4: "Balanced", err: "2" }
    ],
    quiz: [
      { q: "หากเพิ่มความเร็วรอบของเครื่องปั่นเหวี่ยงจาก 4,000 RPM เป็น 8,000 RPM ค่าแรงเหวี่ยงสัมพัทธ์ (RCF) จะเพิ่มขึ้นกี่เท่า?", opts: ["2 เท่า", "4 เท่า", "8 เท่า", "16 เท่า"], ans: 1 },
      { q: "เหตุใดจึงต้องวางหลอดทดลองในโรเตอร์เครื่องปั่นเหวี่ยงให้สมดุลตรงข้ามกันเสมอ?", opts: ["เพื่อให้โรเตอร์หมุนเร็วขึ้น", "เพื่อป้องกันโมเมนต์ความไม่สมดุลที่ทำให้แกนมอเตอร์หักเสียหาย", "เพื่อให้สารตกตะกอนสวยงาม", "เพื่อให้ประหยัดไฟฟ้า"], ans: 1 },
      { q: "หน่วย RCF (×g) หมายถึงอะไร?", opts: ["จำนวนรอบต่อวินาที", "จำนวนเท่าของความเร่งเนื่องจากแรงโน้มถ่วงของโลก (g)", "น้ำหนักของหลอดทดลอง", "แรงเสียดทานของอากาศ"], ans: 1 }
    ]
  },

  lab05: {
    id: "lab05",
    num: 5,
    badge: "Lab 05",
    titleTh: "โมเมนตัม การดล และการชนในระดับจุลภาค",
    titleEn: "Momentum, Impulse & Cellular Collisions",
    category: "กลศาสตร์และการชนระดับเซลล์",
    icon: "fa-solid fa-burst",
    instrument: "Microscopic Collision Air Track & Bioaerosol Impactor 3D",
    description: "การอนุรักษ์โมเมนตัมเชิงเส้น การชนแบบยืดหยุ่นและไม่ยืดหยุ่น การถ่ายทอดพลังงานจลน์สู่การแตกสลายเซลล์ (Cell Lysis) และการดักจับละอองลอยชีวภาพ",
    formulaLatex: "\\sum \\vec{p}_i = \\sum \\vec{p}_f, \\quad \\vec{J} = \\Delta \\vec{p} = \\vec{F} \\Delta t",
    formulaDesc: "ผลรวมโมเมนตัมก่อนชนเท่ากับผลรวมโมเมนตัมหลังชน และแรงกระทำเฉลี่ยแปรผกผันกับระยะเวลาการชน",
    params: [
      { id: "m1", label: "มวลลูกปัดแก้ว m1 (mg)", min: 10, max: 200, step: 10, default: 50, unit: "mg" },
      { id: "v1", label: "ความเร็วลูกปัดก่อนชน v1 (m/s)", min: 1, max: 20, step: 1, default: 10, unit: "m/s" },
      { id: "collision_type", label: "ประเภทการชน", type: "select", options: [
        { val: "elastic", text: "ชนแบบยืดหยุ่น (Elastic e=1.0)" },
        { val: "inelastic", text: "ชนแบบไม่ยืดหยุ่น (Inelastic e=0.5)" },
        { val: "lysis", text: "ชนแตกสลายเซลล์ (Complete Lysis e=0.0)" }
      ]}
    ],
    calcPhysics: function(p) {
      let p_initial = (p.m1 * 1e-6) * p.v1;
      let e = p.collision_type === "elastic" ? 1.0 : (p.collision_type === "inelastic" ? 0.5 : 0.0);
      let v_final = p.v1 * (1 - e) / 2;
      let delta_p = p_initial * (1 + e);
      let delta_t = 0.001; // 1 ms
      let force = delta_p / delta_t;
      return {
        p_in: (p_initial * 1e6).toFixed(2) + " mg·m/s",
        force: force.toFixed(3) + " N",
        lysis_efficiency: ((1 - e) * 100).toFixed(0) + " %"
      };
    },
    tableCols: ["Trial", "มวล m1 (mg)", "ความเร็ว v1 (m/s)", "ประเภทการชน", "การดล J (N·s)", "แรงกระแทก F (N)"],
    defaultTrials: [
      { trial: 1, p1: 50, p2: 5, p3: "Elastic", p4: "0.0005", err: "0.50" },
      { trial: 2, p1: 50, p2: 10, p3: "Inelastic", p4: "0.00075", err: "0.75" },
      { trial: 3, p1: 100, p2: 15, p3: "Lysis", p4: "0.0015", err: "1.50" }
    ],
    quiz: [
      { q: "การอนุรักษ์โมเมนตัมเชิงเส้นเกิดขึ้นภายใต้เงื่อนไขใด?", opts: ["ไม่มีแรงภายนอกมากระทำต่อระบบ (แรงสุทธิเป็นศูนย์)", "ระบบต้องไม่มีแรงเสียดทานเท่านั้น", "มวลของวัตถุต้องเท่ากัน", "ความเร็วต้องคงที่เสมอ"], ans: 0 },
      { q: "ในการสลายเซลล์จุลินทรีย์ด้วยเครื่อง Bead Beater การใช้เวลาชนสั้นลงจะส่งผลต่อแรงกระแทกอย่างไร?", opts: ["แรงกระแทกลดลง", "แรงกระแทกเพิ่มขึ้นอย่างมาก (F = Δp/Δt)", "แรงกระแทกเท่าเดิม", "เซลล์ไม่แตก"], ans: 1 },
      { q: "การชนแบบยืดหยุ่นสมบูรณ์ (Perfectly elastic collision) ปริมาณใดต่อไปนี้ได้รับการอนุรักษ์?", opts: ["โมเมนตัมเท่านั้น", "พลังงานจลน์เท่านั้น", "ทั้งโมเมนตัมและพลังงานจลน์", "ไม่มีข้อใดถูก"], ans: 2 }
    ]
  },

  lab06: {
    id: "lab06",
    num: 6,
    badge: "Lab 06",
    titleTh: "สมดุลกล ความดันของไหล และปรากฏการณ์ออสโมซิส",
    titleEn: "Mechanical Equilibrium, Fluid Pressure & Osmosis",
    category: "ของไหลและแรงดันออสโมติก",
    icon: "fa-solid fa-water",
    instrument: "Osmometer & U-Tube Hydrostatic Stage 3D",
    description: "สมดุลไฮโดรสแตติก ความดันออสโมติกตามสมการ van 't Hoff และการรักษาแรงดึงของผนังเซลล์จุลินทรีย์ในสภาวะไฮโปโทนิกและไฮเพอร์โทนิก",
    formulaLatex: "\\Pi = i M R T, \\quad \\Delta P = \\rho g \\Delta h",
    formulaDesc: "ความดันออสโมติกแปรผันตรงกับความเข้มข้นโมลาร์ (M) ของสารละลายและอุณหภูมิสัมบูรณ์ (T)",
    params: [
      { id: "molarity", label: "ความเข้มข้นสารละลาย M (mol/L)", min: 0.05, max: 1.0, step: 0.05, default: 0.2, unit: "mol/L" },
      { id: "temp_c", label: "อุณหภูมิ (°C)", min: 10, max: 50, step: 5, default: 25, unit: "°C" },
      { id: "solute_type", label: "ชนิดตัวถูกละลาย", type: "select", options: [
        { val: "nacl", text: "NaCl (i = 2) — สารละลายอิเล็กโทรไลต์" },
        { val: "glucose", text: "Glucose (i = 1) — สารละลายนอนอิเล็กโทรไลต์" },
        { val: "sucrose", text: "Sucrose (i = 1)" }
      ]}
    ],
    calcPhysics: function(p) {
      let i = p.solute_type === "nacl" ? 2.0 : 1.0;
      let T_K = p.temp_c + 273.15;
      let R = 0.0821; // L·atm/(mol·K)
      let pi_atm = i * p.molarity * R * T_K;
      let pi_kPa = pi_atm * 101.325;
      let delta_h_cm = (pi_kPa * 1000) / (1000 * 9.81) * 100;
      return {
        pi_atm: pi_atm.toFixed(2) + " atm",
        pi_kPa: pi_kPa.toFixed(1) + " kPa",
        delta_h: delta_h_cm.toFixed(1) + " cm"
      };
    },
    tableCols: ["Trial", "ความเข้มข้น M", "ตัวละลาย (i)", "อุณหภูมิ (°C)", "ความดันออสโมติก Π (atm)", "ระดับของเหลว Δh (cm)"],
    defaultTrials: [
      { trial: 1, p1: "0.1", p2: "Glucose (1)", p3: 25, p4: "2.45", err: "25.3" },
      { trial: 2, p1: "0.2", p2: "NaCl (2)", p3: 25, p4: "9.79", err: "101.2" },
      { trial: 3, p1: "0.5", p2: "NaCl (2)", p3: 37, p4: "25.46", err: "263.1" }
    ],
    quiz: [
      { q: "สารละลาย NaCl 0.1 M และ Glucose 0.1 M ที่อุณหภูมิเดียวกัน สารใดมีความดันออสโมติกสูงกว่ากัน?", opts: ["NaCl สูงกว่าประมาณ 2 เท่า เพราะแตกตัวให้ไอออน (i = 2)", "Glucose สูงกว่าเพราะโมเลกุลใหญ่กว่า", "เท่ากันเพราะความเข้มข้นเท่ากัน", "ไม่สามารถเปรียบเทียบได้"], ans: 0 },
      { q: "เมื่อนำเซลล์แบคทีเรียไปแช่ในสารละลายไฮเพอร์โทนิก (Hypertonic solution) จะเกิดผลอย่างไร?", opts: ["น้ำจะออสโมซิสออกจากเซลล์ ทำให้ไซโทพลาซึมหดตัว (Plasmolysis)", "น้ำไหลเข้าจนเซลล์แตก (Lysis)", "ไม่มีการเปลี่ยนแปลงใดๆ", "เซลล์จะแบ่งตัวเร็วขึ้น"], ans: 0 },
      { q: "โครงสร้างใดของแบคทีเรียที่ช่วยป้องกันไม่ให้เซลล์แตกเมื่ออยู่ในสารละลายไฮโปโทนิก?", opts: ["ผนังเซลล์ (Peptidoglycan Cell Wall)", "เยื่อหุ้มเซลล์", "ไรโบโซม", "แคปซูล"], ans: 0 }
    ]
  },

  lab07: {
    id: "lab07",
    num: 7,
    badge: "Lab 07",
    titleTh: "งาน พลังงาน และมอเตอร์โมเลกุลชีวภาพ",
    titleEn: "Work, Energy & ATP Synthase Molecular Motors",
    category: "อุณหพลศาสตร์และมอเตอร์ชีวภาพ",
    icon: "fa-solid fa-bolt",
    instrument: "F0F1 ATP Synthase Rotary Motor 3D",
    description: "การอนุรักษ์พลังงาน งานของแรงบิดเชิงมุม พลังขับเคลื่อนโปรตอน (Proton Motive Force - PMF) และประสิทธิภาพการสังเคราะห์ ATP",
    formulaLatex: "W = \\tau \\theta, \\quad \\Delta G = -nF\\Delta\\Psi + 2.3RT\\Delta\\text{pH}",
    formulaDesc: "งานที่ได้จากการหมุนของมอเตอร์ชีวโมเลกุลเท่ากับทอร์กคูณด้วยมุมกวาด และพลังขับเคลื่อนโปรตอนเปลี่ยนเป็นพลังงานพันธะ ATP",
    params: [
      { id: "pmf_mV", label: "พลังขับเคลื่อนโปรตอน PMF (mV)", min: 50, max: 250, step: 10, default: 180, unit: "mV" },
      { id: "protons_per_rev", label: "จำนวนโปรตอนต่อรอบหมุน", min: 8, max: 14, step: 1, default: 10, unit: "H+" },
      { id: "atp_yield", label: "จำนวน ATP ต่อการหมุน 360°", min: 1, max: 6, step: 1, default: 3, unit: "ATP" }
    ],
    calcPhysics: function(p) {
      let energy_per_rev_zJ = p.protons_per_rev * (p.pmf_mV * 1e-3) * 1.6e-19 * 1e21; // in zJ
      let torque_pN_nm = energy_per_rev_zJ / (2 * Math.PI);
      let efficiency = ((p.atp_yield * 50) / energy_per_rev_zJ * 100);
      return {
        energy_zJ: energy_per_rev_zJ.toFixed(1) + " zJ",
        torque: torque_pN_nm.toFixed(1) + " pN·nm",
        efficiency: Math.min(efficiency, 95).toFixed(1) + " %"
      };
    },
    tableCols: ["Trial", "PMF (mV)", "H+/รอบ", "พลังงาน (zJ)", "ทอร์ก (pN·nm)", "ประสิทธิภาพ (%)"],
    defaultTrials: [
      { trial: 1, p1: 120, p2: 10, p3: "192.0", p4: "30.6", err: "78.1" },
      { trial: 2, p1: 180, p2: 10, p3: "288.0", p4: "45.8", err: "85.4" },
      { trial: 3, p1: 220, p2: 10, p3: "352.0", p4: "56.0", err: "89.2" }
    ],
    quiz: [
      { q: "มอเตอร์โมเลกุล F0F1 ATP Synthase ใช้พลังงานจากแหล่งใดในการขับเคลื่อนการหมุน?", opts: ["ความต่างศักย์ไฟฟ้าเคมีของโปรตอน (Proton Gradient)", "แสงอาทิตย์โดยตรง", "ความร้อนของเซลล์", "แรงโน้มถ่วง"], ans: 0 },
      { q: "ประสิทธิภาพการแปลงพลังงานกล-เคมีของ ATP Synthase มีค่าประมาณเท่าใด?", opts: ["สูงเกือบ 80-90% (เหนือกว่าเครื่องยนต์มนุษย์สร้างมาก)", "ประมาณ 10-20%", "ไม่เกิน 5%", "100% เสมอ"], ans: 0 },
      { q: "หน่วยของทอร์กในระดับมอเตอร์โมเลกุลนาโนชีวภาพคือหน่วยใด?", opts: ["pN·nm (พิโคนิวตัน·นาโนเมตร)", "N·m (นิวตัน·เมตร)", "kJ/mol", "วัตต์"], ans: 0 }
    ]
  },

  lab08: {
    id: "lab08",
    num: 8,
    badge: "Lab 08",
    titleTh: "การหมุน สมดุลการหมุน และกลศาสตร์นาโนของแฟลกเจลลา",
    titleEn: "Rotational Dynamics & Flagellar Nanomechanics",
    category: "กลศาสตร์การหมุนและนาโน",
    icon: "fa-solid fa-spinner",
    instrument: "Bacterial Flagellar Rotary Motor 3D",
    description: "ทอร์ก โมเมนต์ความเฉื่อย และกำลังกลศาสตร์นาโนของการหมุนควงสว่านของแฟลกเจลลัมในการขับเคลื่อนเซลล์แบคทีเรีย",
    formulaLatex: "\\tau = I \\alpha, \\quad P_{\\text{rot}} = \\tau \\omega",
    formulaDesc: "ทอร์กการหมุนเท่ากับโมเมนต์ความเฉื่อยคูณความเร่งเชิงมุม และกำลังกลศาสตร์เท่ากับทอร์กคูณความเร็วเชิงมุม",
    params: [
      { id: "motor_speed_hz", label: "ความถี่การหมุนของมอเตอร์ (Hz)", min: 50, max: 350, step: 25, default: 150, unit: "Hz" },
      { id: "viscosity_medium", label: "ความหนืดตัวกลาง η (mPa·s)", min: 1, max: 20, step: 1, default: 2, unit: "mPa·s" },
      { id: "flagella_count", label: "จำนวนเส้นแฟลกเจลลา", min: 1, max: 8, step: 1, default: 4, unit: "เส้น" }
    ],
    calcPhysics: function(p) {
      let omega = 2 * Math.PI * p.motor_speed_hz;
      let torque_per_motor = 2000 - (p.motor_speed_hz * 3.5); // pN·nm stall curve
      let total_torque = torque_per_motor * p.flagella_count;
      let power_fW = (total_torque * 1e-21) * omega * 1e15; // in fW (10^-15 W)
      let swim_speed = (p.motor_speed_hz * 0.18 / Math.sqrt(p.viscosity_medium)).toFixed(1);
      return {
        omega: omega.toFixed(0) + " rad/s",
        total_torque: total_torque.toFixed(0) + " pN·nm",
        power: power_fW.toFixed(2) + " fW",
        swim_speed: swim_speed + " µm/s"
      };
    },
    tableCols: ["Trial", "ความถี่หมุน (Hz)", "ความหนืด (mPa·s)", "ทอร์กรวม (pN·nm)", "กำลังงาน (fW)", "ความเร็วว่าย (µm/s)"],
    defaultTrials: [
      { trial: 1, p1: 100, p2: 1, p3: "6600", p4: "4.15", err: "18.0" },
      { trial: 2, p1: 150, p2: 2, p3: "5900", p4: "5.56", err: "19.1" },
      { trial: 3, p1: 250, p2: 5, p3: "4500", p4: "7.07", err: "20.1" }
    ],
    quiz: [
      { q: "มอเตอร์แฟลกเจลลาร์ของแบคทีเรียหมุนด้วยความเร็วสูงสุดประมาณเท่าใด?", opts: ["100 - 300 รอบต่อวินาที (Hz)", "1 - 2 รอบต่อนาที", "10,000 รอบต่อวินาที", "หมุนกลับไปกลับมาเท่านั้น"], ans: 0 },
      { q: "เมื่อแบคทีเรียหมุนแฟลกเจลลาทวนเข็มนาฬิกา (CCW) จะส่งผลต่อการเคลื่อนที่อย่างไร?", opts: ["รวมกลุ่มเป็นมัดและว่ายไปข้างหน้าอย่างราบรื่น (Run)", "กระจายตัวออกและพลิกตัวแบบสุ่ม (Tumble)", "หยุดนิ่งอยู่กับที่", "เซลล์จะแตกสลาย"], ans: 0 },
      { q: "ความสัมพันธ์ระหว่างกำลังงานกลศาสตร์ (P) กับทอร์ก (τ) และความเร็วเชิงมุม (ω) คือข้อใด?", opts: ["P = τ · ω", "P = τ / ω", "P = τ + ω", "P = ½ τ ω²"], ans: 0 }
    ]
  },

  lab09: {
    id: "lab09",
    num: 9,
    badge: "Lab 09",
    titleTh: "อุณหพลศาสตร์และการควบคุมอุณหภูมิ PCR",
    titleEn: "Thermodynamics & PCR Thermal Cycler",
    category: "อุณหพลศาสตร์ชีวภาพ",
    icon: "fa-solid fa-dna",
    instrument: "3-Step Digital PCR Thermal Cycler 3D",
    description: "การถ่ายโอนความร้อนในของเหลว การนำความร้อน (Fourier's Law) และอุณหพลศาสตร์ของวัฏจักรเพิ่มปริมาณดีเอ็นเอ 3 ขั้นตอน (Denaturation, Annealing, Extension)",
    formulaLatex: "Q = mc\\Delta T, \\quad N = N_0 \\cdot 2^n, \\quad \\frac{dQ}{dt} = -kA\\frac{dT}{dx}",
    formulaDesc: "ความร้อนที่ต้องใช้แปรผันตรงกับมวลและความจุความร้อน และจำนวนดีเอ็นเอเพิ่มขึ้นแบบทวีคูณ (2^n) ในแต่ละรอบ PCR",
    params: [
      { id: "cycles_n", label: "จำนวนรอบ PCR (Cycles)", min: 10, max: 40, step: 5, default: 30, unit: "รอบ" },
      { id: "ramp_rate", label: "อัตราเร่งความร้อน (°C/s)", min: 1.0, max: 6.0, step: 0.5, default: 4.0, unit: "°C/s" },
      { id: "reaction_vol_uL", label: "ปริมาตรปฏิกิริยาต่อหลอด (µL)", min: 10, max: 50, step: 5, default: 25, unit: "µL" }
    ],
    calcPhysics: function(p) {
      let copies = Math.pow(2, p.cycles_n);
      let ramp_time_s = ((95 - 55) / p.ramp_rate) * 2 * p.cycles_n;
      let total_time_min = (ramp_time_s + (30 + 30 + 60) * p.cycles_n) / 60;
      let heat_per_cycle_J = (p.reaction_vol_uL * 1e-6) * 4184 * (95 - 55);
      return {
        copies: copies > 1e9 ? copies.toExponential(2) : copies.toLocaleString(),
        heat_J: heat_per_cycle_J.toFixed(2) + " J",
        total_time: total_time_min.toFixed(1) + " นาที"
      };
    },
    tableCols: ["Trial", "รอบ (Cycles)", "อัตราเร่ง (°C/s)", "จำนวนเท่าดีเอ็นเอ (2^n)", "เวลารวม (นาที)", "ความร้อน/รอบ (J)"],
    defaultTrials: [
      { trial: 1, p1: 20, p2: "4.0", p3: "1.05 × 10⁶", p4: "46.7", err: "4.18" },
      { trial: 2, p1: 30, p2: "4.0", p3: "1.07 × 10⁹", p4: "70.0", err: "4.18" },
      { trial: 3, p1: 35, p2: "5.0", p3: "3.44 × 10¹⁰", p4: "79.3", err: "4.18" }
    ],
    quiz: [
      { q: "ขั้นตอนใดในกระบวนการ PCR ที่ต้องการอุณหภูมิสูงสุด (ประมาณ 95°C) และเพื่อวัตถุประสงค์ใด?", opts: ["Denaturation เพื่อทำลายพันธะไฮโดรเจนแยกสายดีเอ็นเอออกจากกัน", "Annealing เพื่อให้ไพรเมอร์จับกับสายดีเอ็นเอ", "Extension เพื่อให้เอนไซม์สังเคราะห์สายดีเอ็นเอ", "Cooling เพื่อเก็บรักษาดีเอ็นเอ"], ans: 0 },
      { q: "หากเริ่มต้นด้วยแม่พิมพ์ดีเอ็นเอ 1 โมเลกุล เมื่อผ่านไป 30 รอบ PCR จะได้ดีเอ็นเอกี่โมเลกุลตามทฤษฎี?", opts: ["2³⁰ ≈ 1.07 × 10⁹ โมเลกุล (หนึ่งพันล้านเท่า)", "30 โมเลกุล", "60 โมเลกุล", "1 ล้านโมเลกุล"], ans: 0 },
      { q: "ความร้อนจำเพาะ (Specific Heat Capacity) ของน้ำส่งผลต่อการออกแบบเครื่อง PCR อย่างไร?", opts: ["น้ำมีความจุความร้อนสูง จึงต้องใช้แผ่นทำความร้อนเพลเทียร์ (Peltier) ที่มีกำลังวัตต์สูงเพื่อให้เปลี่ยนอุณหภูมิได้เร็ว", "น้ำเปลี่ยนอุณหภูมิได้ง่ายมาก", "น้ำไม่สามารถนำความร้อนได้", "ไม่มีผลใดๆ"], ans: 0 }
    ]
  },

  lab10: {
    id: "lab10",
    num: 10,
    badge: "Lab 10",
    titleTh: "ไฟฟ้า สนามแม่เหล็ก และเจลอิเล็กโทรโฟเรซิส",
    titleEn: "Electricity, Magnetism & Agarose Gel Electrophoresis",
    category: "ไฟฟ้าแม่เหล็กชีวภาพ",
    icon: "fa-solid fa-bolt-lightning",
    instrument: "Horizontal Agarose Gel Tank & Regulated DC Power Supply 3D",
    description: "สนามไฟฟ้า สภาพเคลื่อนตัวของดีเอ็นเอ (Electrophoretic Mobility) กฎของโอห์ม กำลังไฟฟ้า และการจัดเรียงตัวของแบคทีเรียแม่เหล็ก",
    formulaLatex: "V = IR, \\quad v = \\mu_e E = \\mu_e \\left(\\frac{V}{L}\\right), \\quad P = VI",
    formulaDesc: "ความเร็วการเคลื่อนที่ของดีเอ็นเอแปรผันตรงกับความต่างศักย์ไฟฟ้า (V) และแปรผกผันกับระยะห่างระหว่างขั้วไฟฟ้า (L)",
    params: [
      { id: "voltage_v", label: "แรงดันไฟฟ้ากระแสตรง (V)", min: 50, max: 200, step: 10, default: 100, unit: "V" },
      { id: "gel_percent", label: "ความเข้มข้นอะกาโรสเจล (%)", min: 0.5, max: 2.5, step: 0.25, default: 1.0, unit: "%" },
      { id: "dna_size_bp", label: "ขนาดชิ้นส่วนดีเอ็นเอ (bp)", min: 100, max: 5000, step: 100, default: 1000, unit: "bp" }
    ],
    calcPhysics: function(p) {
      let E_field = p.voltage_v / 15.0; // 15 cm tank
      let mobility = (1.5e-4 / (p.gel_percent * Math.log10(p.dna_size_bp))) * 1e4;
      let velocity_cm_hr = mobility * (p.voltage_v / 15.0) * 3600 / 100;
      let power_w = (p.voltage_v * 0.05); // ~50mA
      return {
        e_field: E_field.toFixed(1) + " V/cm",
        speed: velocity_cm_hr.toFixed(2) + " cm/ชม.",
        power: power_w.toFixed(1) + " วัตต์"
      };
    },
    tableCols: ["Trial", "แรงดัน V (V)", "ความเข้มข้นเจล (%)", "สนามไฟฟ้า (V/cm)", "ความเร็ว (cm/ชม.)", "กำลังไฟฟ้า P (W)"],
    defaultTrials: [
      { trial: 1, p1: 80, p2: "1.0", p3: "5.3", p4: "2.40", err: "4.0" },
      { trial: 2, p1: 100, p2: "1.0", p3: "6.7", p4: "3.00", err: "5.0" },
      { trial: 3, p1: 150, p2: "1.5", p3: "10.0", p4: "3.60", err: "7.5" }
    ],
    quiz: [
      { q: "ดีเอ็นเอ (DNA) มีประจุสุทธิเป็นบวกหรือลบ และจะวิ่งเข้าหาขั้วไฟฟ้าใดในเจลอิเล็กโทรโฟเรซิส?", opts: ["ประจุลบ (จากหมู่ฟอสเฟต) วิ่งเข้าหาขั้วบวก (Anode สีแดง)", "ประจุบวก วิ่งเข้าหาขั้วลบ (Cathode สีดำ)", "เป็นกลาง ไม่วิ่งเข้าหาขั้วใด", "วิ่งสลับไปมาตามความถี่"], ans: 0 },
      { q: "ชิ้นส่วนดีเอ็นเอขนาด 500 bp และ 3,000 bp ชิ้นใดจะวิ่งได้ระยะทางไกลกว่ากันในเวลาเท่ากัน?", opts: ["ชิ้น 500 bp วิ่งได้ไกลกว่า เพราะมีขนาดโมเลกุลเล็กกว่า จึงผ่านรูพรุนของเจลได้ง่ายกว่า", "ชิ้น 3,000 bp วิ่งได้ไกลกว่าเพราะประจุมากกว่า", "วิ่งได้เท่ากัน", "ขึ้นกับสีของสารย้อม"], ans: 0 },
      { q: "การตั้งค่าแรงดันไฟฟ้าสูงเกินไป (เช่น > 150 V) จะส่งผลเสียอย่างไรต่อการแยกแถบดีเอ็นเอ?", opts: ["เกิดความร้อนสะสมสูง (P = VI) ทำให้เจลละลายและแถบดีเอ็นเอยิ้ม/บิดเบี้ยว (Smiling effect)", "ทำให้ดีเอ็นเอวิ่งช้าลง", "ทำให้บัฟเฟอร์เย็นลง", "ไม่มีผลเสียใดๆ"], ans: 0 }
    ]
  },

  lab11: {
    id: "lab11",
    num: 11,
    badge: "Lab 11",
    titleTh: "ทัศนศาสตร์ กล้องจุลทรรศน์ และสเปกโทรโฟโตเมตรีชีวภาพ",
    titleEn: "Optics, Research Microscopy & Bio-Spectrophotometry",
    category: "ทัศนศาสตร์ชีวภาพและสเปกโทรสโกปี",
    icon: "fa-solid fa-microscope",
    instrument: "Research Microscope 100× Oil Immersion & UV-Vis Spectrophotometer 3D",
    description: "ขีดจำกัดการเลี้ยวเบนของแอบบี (Abbe's Limit) กำลังแยกภาพของเลนส์น้ำมัน 100x Oil Immersion กฎของเบียร์-แลมเบิร์ต และการวัดความขุ่น OD600",
    formulaLatex: "d = \\frac{0.61 \\lambda}{\\text{NA}}, \\quad A = \\varepsilon b c = -\\log_{10}(T)",
    formulaDesc: "ระยะแยกชัดต่ำสุด (d) แปรผกผันกับค่า Numerical Aperture (NA) และค่าการดูดกลืนแสง (A) แปรผันตรงกับความเข้มข้นเซลล์",
    params: [
      { id: "lens_type", label: "ชนิดหัวเลนส์วัตถุ", type: "select", options: [
        { val: "dry_40x", text: "40× Dry Objective (NA = 0.65, n = 1.00)" },
        { val: "oil_100x", text: "100× Oil Immersion (NA = 1.25, n = 1.515)" },
        { val: "high_oil", text: "100× Research High NA (NA = 1.40, n = 1.518)" }
      ]},
      { id: "wavelength_nm", label: "ความยาวคลื่นแสง λ (nm)", min: 400, max: 700, step: 50, default: 550, unit: "nm" },
      { id: "od600_val", label: "ความขุ่นเซลล์ OD600", min: 0.1, max: 2.0, step: 0.1, default: 0.8, unit: "AU" }
    ],
    calcPhysics: function(p) {
      let na = p.lens_type === "dry_40x" ? 0.65 : (p.lens_type === "oil_100x" ? 1.25 : 1.40);
      let d_nm = (0.61 * p.wavelength_nm) / na;
      let cell_conc = p.od600_val * 8e8; // approx cells/mL for E. coli
      let transmittance = Math.pow(10, -p.od600_val) * 100;
      return {
        d_limit: d_nm.toFixed(1) + " nm",
        na_val: na.toFixed(2),
        cell_conc: cell_conc.toExponential(2) + " เซลล์/mL",
        t_pct: transmittance.toFixed(1) + " %"
      };
    },
    tableCols: ["Trial", "หัวเลนส์ (NA)", "ความยาวคลื่น (nm)", "ระยะแยกชัด d (nm)", "OD600", "ความหนาแน่นเซลล์ (เซลล์/mL)"],
    defaultTrials: [
      { trial: 1, p1: "40x Dry (0.65)", p2: 550, p3: "516.2", p4: "0.20", err: "1.6 × 10⁸" },
      { trial: 2, p1: "100x Oil (1.25)", p2: 550, p3: "268.4", p4: "0.80", err: "6.4 × 10⁸" },
      { trial: 3, p1: "100x High (1.40)", p2: 450, p3: "196.1", p4: "1.50", err: "1.2 × 10⁹" }
    ],
    quiz: [
      { q: "การหยดน้ำมัน Immersion Oil (n = 1.515) ช่วยเพิ่มความคมชัดของภาพจากเลนส์ 100x ได้อย่างไร?", opts: ["ป้องกันการหักเหของแสงสูญเสียออกนอกเลนส์ ทำให้ค่า NA สูงขึ้น", "ทำให้เลนส์เย็นลง", "ขยายภาพเพิ่มเป็น 200 เท่า", "ย้อมสีแบคทีเรียโดยตรง"], ans: 0 },
      { q: "ตามเกณฑ์ของแอบบี (Abbe criterion) เพื่อให้มองเห็นโครงสร้างขนาดเล็กที่สุดได้ชัดเจน ควรใช้แสงสีใด?", opts: ["แสงสีน้ำเงิน (ความยาวคลื่นสั้น d จะมีค่าน้อย)", "แสงสีแดง (ความยาวคลื่นยาว)", "แสงอินฟราเรด", "แสงสีเหลือง"], ans: 0 },
      { q: "กฎของเบียร์-แลมเบิร์ต (Beer-Lambert Law) ระบุความสัมพันธ์ระหว่างค่าการดูดกลืนแสง (Absorbance) กับความเข้มข้นของเซลล์อย่างไร?", opts: ["แปรผันตรงเชิงเส้น (A ∝ c)", "แปรผกผัน", "แปรผันตามรากที่สอง", "ไม่มีความสัมพันธ์กัน"], ans: 0 }
    ]
  },

  lab12: {
    id: "lab12",
    num: 12,
    badge: "Lab 12",
    titleTh: "ฟิสิกส์นิวเคลียร์ กัมมันตภาพรังสี และการทำลายเชื้อจุลินทรีย์",
    titleEn: "Nuclear Physics, Radioactivity & Microbial Radiosterilization",
    category: "ฟิสิกส์นิวเคลียร์และรังสีชีวภาพ",
    icon: "fa-solid fa-radiation",
    instrument: "Lead-Shielded Radiation Vault & GM Counter 3D",
    description: "การสลายตัวของกัมมันตรังสี กฎกำลังสองผกผัน การลดทอนของแผ่นกำบังตะกั่ว และค่าปริมาณรังสีทำลายเชื้อจุลินทรีย์ (D10 Value) ด้วยรังสีแกมมา Co-60 และ UV-C",
    formulaLatex: "I = \\frac{P}{4 \\pi r^2}, \\quad N(t) = N_0 e^{-\\lambda t}, \\quad I = I_0 e^{-\\mu x}",
    formulaDesc: "ความเข้มรังสีแปรผกผันกับระยะทางยกกำลังสอง (1/r²) และลดลงแบบเอกซ์โพเนนเชียลตามความหนาของแผ่นกำบังตะกั่ว",
    params: [
      { id: "distance_cm", label: "ระยะห่างจากต้นกำเนิด r (cm)", min: 10, max: 100, step: 10, default: 30, unit: "cm" },
      { id: "shield_thickness_mm", label: "ความหนาแผ่นตะกั่วกำบัง (mm)", min: 0, max: 20, step: 2, default: 6, unit: "mm" },
      { id: "radiation_source", label: "ชนิดรังสีทำลายเชื้อ", type: "select", options: [
        { val: "uvc", text: "หลอด UV-C 254 nm (พื้นผิวและตู้ Biosafety)" },
        { val: "co60", text: "รังสีแกมมา Cobalt-60 (การฉายรังสีอาหารและเวชภัณฑ์)" }
      ]}
    ],
    calcPhysics: function(p) {
      let isCo60 = p.radiation_source === "co60";
      let I_0 = isCo60 ? 5000 : 800; // uW/cm2 or mR/hr
      let r_factor = Math.pow(30 / p.distance_cm, 2);
      let mu = isCo60 ? 0.08 : 0.45; // attenuation coeff per mm
      let I_after_shield = I_0 * r_factor * Math.exp(-mu * p.shield_thickness_mm);
      let d10_time_s = isCo60 ? (120 / (I_after_shield * 0.01)) : (60 / (I_after_shield * 0.01));
      return {
        intensity: I_after_shield.toFixed(1) + (isCo60 ? " mR/ชม." : " µW/cm²"),
        attenuation_pct: ((1 - (I_after_shield / (I_0 * r_factor))) * 100).toFixed(1) + " %",
        d10_time: Math.max(d10_time_s, 1).toFixed(1) + " วินาที"
      };
    },
    tableCols: ["Trial", "ระยะ r (cm)", "แผ่นกำบัง (mm)", "ชนิดรังสี", "ความเข้มที่วัดได้", "เวลาฆ่าเชื้อ D10 (s)"],
    defaultTrials: [
      { trial: 1, p1: 15, p2: 0, p3: "UV-C 254nm", p4: "3200.0 µW/cm²", err: "1.9" },
      { trial: 2, p1: 30, p2: 0, p3: "UV-C 254nm", p4: "800.0 µW/cm²", err: "7.5" },
      { trial: 3, p1: 30, p2: 6, p3: "Co-60 Gamma", p4: "3095.7 mR/ชม.", err: "3.9" }
    ],
    quiz: [
      { q: "หากเพิ่มระยะห่างจากหลอดรังสี UV-C จาก 20 cm เป็น 40 cm ความเข้มของรังสีที่ตกลงบนจานเพาะเชื้อจะเปลี่ยนไปอย่างไร?", opts: ["ลดลงเหลือ 1/4 ของเดิม (ตามกฎกำลังสองผกผัน 1/r²)", "ลดลงครึ่งหนึ่ง", "เท่าเดิม", "เพิ่มขึ้น 2 เท่า"], ans: 0 },
      { q: "ค่า D10 (Decimal Reduction Dose) ทางจุลชีววิทยารังสีหมายถึงอะไร?", opts: ["ปริมาณรังสีหรือเวลาที่ใช้ในการทำลายประชากรจุลินทรีย์ลง 90% (เหลือ 10%)", "ปริมาณรังสีที่ทำให้แบคทีเรียตาย 10 ตัว", "เวลาฉายรังสี 10 นาที", "ความหนาตะกั่ว 10 มิลลิเมตร"], ans: 0 },
      { q: "วัสดุใดมีประสิทธิภาพในการกำบังรังสีแกมมา (Gamma rays) จาก Cobalt-60 ได้ดีที่สุด?", opts: ["ตะกั่ว (Lead) หนาแน่นสูง", "กระดาษ A4", "แผ่นพลาสติกใส", "ไม้กระดาน"], ans: 0 }
    ]
  },

  lab13: {
    id: "lab13",
    num: 13,
    badge: "Lab 13",
    titleTh: "โครงงานย่อยบูรณาการ (Capstone Mini-Project): เครื่องมือชีวฟิสิกส์อัจฉริยะ",
    titleEn: "Capstone Mini-Project: Smart Microbiological IoT Rig",
    category: "โครงงานนวัตกรรมบูรณาการ",
    icon: "fa-solid fa-microchip",
    instrument: "Virtual Instrument Sandbox & IoT Optical Sensor Rig",
    description: "การบูรณาการองค์ความรู้ฟิสิกส์ 12 บทเรียน สู่การออกแบบระบบวัดหรือเซนเซอร์ตรวจสอบจุลินทรีย์อัจฉริยะ พร้อมการประเมินรูบริก 4 มิติ",
    formulaLatex: "\\text{Score} = 0.30 \\cdot \\text{Theory} + 0.30 \\cdot \\text{Precision} + 0.20 \\cdot \\text{Innovation} + 0.20 \\cdot \\text{Q&A}",
    formulaDesc: "เกณฑ์การให้คะแนนโครงงานบูรณาการเน้นความถูกต้องทางฟิสิกส์ ความแม่นยำของข้อมูล และความคิดสร้างสรรค์",
    params: [
      { id: "theory_score", label: "คะแนนหลักการฟิสิกส์ (เต็ม 30)", min: 10, max: 30, step: 1, default: 28, unit: "คะแนน" },
      { id: "precision_score", label: "คะแนนความแม่นยำของข้อมูล (เต็ม 30)", min: 10, max: 30, step: 1, default: 27, unit: "คะแนน" },
      { id: "innovation_score", label: "คะแนนความคิดสร้างสรรค์ (เต็ม 20)", min: 5, max: 20, step: 1, default: 18, unit: "คะแนน" },
      { id: "qa_score", label: "คะแนนการนำเสนอและตอบคำถาม (เต็ม 20)", min: 5, max: 20, step: 1, default: 19, unit: "คะแนน" }
    ],
    calcPhysics: function(p) {
      let total = p.theory_score + p.precision_score + p.innovation_score + p.qa_score;
      let grade = total >= 80 ? "A (ดีเยี่ยม)" : (total >= 70 ? "B" : "C");
      return {
        total_score: total + " / 100",
        grade: grade,
        status: "ผ่านเกณฑ์สมรรถนะ OBE"
      };
    },
    tableCols: ["มิติการประเมิน", "เกณฑ์คะแนน", "คะแนนที่ได้", "ระดับคุณภาพ"],
    defaultTrials: [
      { trial: 1, p1: "ความถูกต้องของหลักการฟิสิกส์", p2: "30", p3: "28", p4: "ดีเยี่ยม" },
      { trial: 2, p1: "ความแม่นยำของข้อมูลและการวิเคราะห์", p2: "30", p3: "27", p4: "ดีมาก" },
      { trial: 3, p1: "ความคิดสร้างสรรค์และการประยุกต์", p2: "20", p3: "18", p4: "ดีเยี่ยม" },
      { trial: 4, p1: "การตอบคำถามและนำเสนอ", p2: "20", p3: "19", p4: "ดีเยี่ยม" }
    ],
    quiz: [
      { q: "การประเมินผลลัพธ์การเรียนรู้ (Outcome-Based Education: OBE) ในรายวิชาฟิสิกส์สำหรับจุลชีววิทยา มุ่งเน้นสิ่งใดมากที่สุด?", opts: ["ความสามารถในการประยุกต์หลักการฟิสิกส์เพื่อใช้งานและแก้ปัญหาในห้องปฏิบัติการจุลชีววิทยาจริง", "การท่องจำสมการแคลคูลัสยาวๆ", "การคำนวณโจทย์ฟิสิกส์ดาราศาสตร์", "การสอบข้อเขียนปรนัยเพียงอย่างเดียว"], ans: 0 },
      { q: "เครื่องมือใดต่อไปนี้เป็นการผสานความรู้ฟิสิกส์ทัศนศาสตร์และคอมพิวเตอร์เพื่อตรวจนับจุลินทรีย์อัตโนมัติ?", opts: ["Automated Colony Counter พร้อมกล้องความละเอียดสูงและ AI", "ตะเกียงแอลกอฮอล์", "ห่วงเขี่ยเชื้อ (Inoculating Loop)", "กระดาษกรอง"], ans: 0 },
      { q: "ค่าสัมประสิทธิ์การตัดสินใจ (R²) จากการพลอตกราฟมาตรฐานการทดลอง มีความหมายว่าอย่างไร?", opts: ["บอกระดับความสัมพันธ์เชิงเส้นระหว่างตัวแปร ยิ่งใกล้ 1.00 ยิ่งมีความแม่นยำสูง", "บอกความเร็วของการทดลอง", "บอกอุณหภูมิห้องแล็บ", "บอกจำนวนนักศึกษาในกลุ่ม"], ans: 0 }
    ]
  }
};

// Export for Node.js / testing environments if applicable
if (typeof module !== "undefined" && module.exports) {
  module.exports = LABS_CONFIG;
}
