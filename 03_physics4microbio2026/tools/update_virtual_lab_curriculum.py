#!/usr/bin/env python3
"""
update_virtual_lab_curriculum.py
Synchronizes virtual_lab configuration, SQLite3 database, app_controller, and sim3d_engine
with the canonical 13-lab curriculum from main.tex.
"""

import os
import json
import sqlite3
import re

BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
ROOT_DIR = os.path.dirname(BASE_DIR)
VL_DIR = os.path.join(ROOT_DIR, "virtual_lab")
DB_PATH = os.path.join(VL_DIR, "database", "virtual_lab.db")

LABS_META = [
    {
        "id": "lab01", "num": 1,
        "title_th": "หน่วย การวัด และการสอบเทียบไมโครปิเปต P1000",
        "title_en": "Units, Measurement & P1000 Micropipette Gravimetric Calibration",
        "category": "การวัดและเครื่องมือพื้นฐาน",
        "clo": "CLO1, CLO4",
        "instrument": "Micropipette P1000, Caliper & Analytical Balance 0.0001 g",
        "theory": "การสอบเทียบความแม่นยำของไมโครปิเปต P1000 โดยใช้หลักการชั่งน้ำหนักน้ำบริสุทธิ์ (rho = 1.0000 g/mL) เทียบมาตรฐาน ISO 8655",
        "sim_file": "sim_micropipette_3d.html"
    },
    {
        "id": "lab02", "num": 2,
        "title_th": "การเคลื่อนที่แบบบราวน์และเวกเตอร์การแพร่ของจุลินทรีย์",
        "title_en": "Brownian Motion & Microorganism Diffusion Vectors",
        "category": "เวกเตอร์และการแพร่ชีวภาพ",
        "clo": "CLO1, CLO2",
        "instrument": "3D Hanging Drop Chamber & Brownian Motion Analyzer",
        "theory": "การแพร่แบบสุ่มและการเคลื่อนที่แบบบราวน์ตามสมการไอน์สไตน์ D = k_B T / (6 pi eta r) และการรวมเวกเตอร์ความเร็ว",
        "sim_file": "sim02_brownian_motion_3d.html"
    },
    {
        "id": "lab03", "num": 3,
        "title_th": "กฎของนิวตัน ความหนืดสโตกส์ และการตกตะกอนของแบคทีเรีย",
        "title_en": "Newton's Laws, Stokes Viscosity & Bacterial Sedimentation",
        "category": "กลศาสตร์ของไหลและความหนืด",
        "clo": "CLO1, CLO2",
        "instrument": "Falling Ball Viscometer & Stoke's Column 3D",
        "theory": "แรงต้านหนืดตามกฎของสโตกส์ F_d = 6 pi eta r v และความเร็วปลายการตกตะกอนของเซลล์แบคทีเรีย",
        "sim_file": "sim03_viscometer_3d.html"
    },
    {
        "id": "lab04", "num": 4,
        "title_th": "งาน พลังงานจลน์ และแรงหนีศูนย์กลางในการปั่นแยกเซลล์",
        "title_en": "Work, Kinetic Energy & Centrifugal Cell Separation",
        "category": "กลศาสตร์การหมุนและการปั่นเหวี่ยง",
        "clo": "CLO2, CLO4",
        "instrument": "High-Speed Microcentrifuge 3D & Balanced Rotor",
        "theory": "แรงสู่ศูนย์กลางและสนามความเร่งเหวี่ยงสัมพัทธ์ RCF = 1.118 x 10^-5 x r x RPM^2 ในการแยกตกตะกอนจุลินทรีย์",
        "sim_file": "sim04_centrifuge_3d.html"
    },
    {
        "id": "lab05", "num": 5,
        "title_th": "การถ่ายโอนความร้อนและเสถียรภาพอุณหภูมิตู้อบ Incubator 37°C",
        "title_en": "Heat Transfer & 37°C Incubator Thermal Stability",
        "category": "ความร้อนและการควบคุมอุณหภูมิชีวภาพ",
        "clo": "CLO2, CLO3",
        "instrument": "Microbiological Incubator 37.0°C & Calorimeter 3D",
        "theory": "การอนุรักษ์พลังงานความร้อน Q = mc Delta T และการตรวจสอบเสถียรภาพอุณหภูมิ 3 จุดในตู้อบป้องกัน Thermal Stratification",
        "sim_file": "sim05_incubator_3d.html"
    },
    {
        "id": "lab06", "num": 6,
        "title_th": "อุณหพลศาสตร์ กฎข้อที่หนึ่ง และหม้อนึ่งความดันไอ Autoclave 121°C",
        "title_en": "Thermodynamics, First Law & 121°C Autoclave Steam Sterilization",
        "category": "อุณหพลศาสตร์และการทำลายเชื้อ",
        "clo": "CLO2, CLO4",
        "instrument": "Vertical Autoclave Steam Sterilizer 3D",
        "theory": "อุณหพลศาสตร์ของไอน้ำอิ่มตัวภายใต้ความดัน 15 psi (121°C) และจลนพลศาสตร์การทำลายสปอร์แบคทีเรีย D_121 = 1.5 min",
        "sim_file": "sim06_autoclave_3d.html"
    },
    {
        "id": "lab07", "num": 7,
        "title_th": "แรงไฟฟ้าสถิต กฎของคูลอมบ์ และกลไกการย้อมสีแกรม",
        "title_en": "Electrostatics, Coulomb's Law & Gram Staining Mechanism",
        "category": "ไฟฟ้าสถิตและเคมีพื้นผิวเซลล์",
        "clo": "CLO1, CLO3",
        "instrument": "Gram Staining Nanostructure Stage 3D",
        "theory": "แรงดึงดูดทางไฟฟ้าสถิตตามกฎของคูลอมบ์ระหว่างสีย้อมประจุบวกกับผนังเซลล์ประจุลบของแบคทีเรียแกรมบวกและลบ",
        "sim_file": "sim07_gram_stain_3d.html"
    },
    {
        "id": "lab08", "num": 8,
        "title_th": "กระแสไฟฟ้า กฎของโอห์ม และเจลอิเล็กโทรโฟเรซิส",
        "title_en": "Electric Current, Ohm's Law & Agarose Gel Electrophoresis",
        "category": "ไฟฟ้าแม่เหล็กและชีวโมเลกุล",
        "clo": "CLO2, CLO4",
        "instrument": "Horizontal Agarose Gel Tank & DC Power Supply 3D",
        "theory": "กฎของโอห์ม V = IR กำลังไฟฟ้า P = VI และสภาพการเคลื่อนที่ของดีเอ็นเอภายใต้สนามไฟฟ้าสถิตสม่ำเสมอ",
        "sim_file": "sim10_electrophoresis_3d.html"
    },
    {
        "id": "lab09", "num": 9,
        "title_th": "การหักเหของแสง กฎของสเนลล์ และการวัดความหวาน Brix Refractometer",
        "title_en": "Optics, Snell's Law & Brix Refractometer",
        "category": "ทัศนศาสตร์เชิงเรขาคณิต",
        "clo": "CLO2, CLO3",
        "instrument": "Abbe / Handheld Optical Refractometer 3D",
        "theory": "กฎการหักเหของสเนลล์ ดัชนีหักเหของแสง และมุมวิกฤติตามสมการ n_1 sin theta_1 = n_2 sin theta_2 สัมพันธ์กับค่า Brix",
        "sim_file": "sim09_refraction_3d.html"
    },
    {
        "id": "lab10", "num": 10,
        "title_th": "ทัศนศาสตร์ เลนส์กล้องจุลทรรศน์ และ Immersion Oil 100x",
        "title_en": "Wave Optics, Microscope Resolution & Immersion Oil 100x",
        "category": "ทัศนศาสตร์คลื่นและกล้องจุลทรรศน์",
        "clo": "CLO2, CLO4",
        "instrument": "Compound Optical Microscope & 100x Oil Objective 3D",
        "theory": "ขีดจำกัดการเลี้ยวเบนของแอบบี d = 0.61 lambda / NA และบทบาทของ Immersion Oil (n = 1.515) ในการเพิ่ม Numerical Aperture",
        "sim_file": "sim11_optics_3d.html"
    },
    {
        "id": "lab11", "num": 11,
        "title_th": "กัมมันตภาพรังสี การสลายตัว และการฉายรังสี UV-C ฆ่าเชื้อ",
        "title_en": "Nuclear Physics, Half-life & UV-C Disinfection Kinetics",
        "category": "ฟิสิกส์นิวเคลียร์และรังสีชีวภาพ",
        "clo": "CLO2, CLO3",
        "instrument": "UV-C Biosafety Chamber & Radiation Counter 3D",
        "theory": "กฎการสลายตัวของสารกัมมันตรังสี กฎกำลังสองผกผัน I = P / (4 pi r^2) และการคำนวณโดสรังสี UV-C 254 nm ทำลายดีเอ็นเอจุลินทรีย์",
        "sim_file": "sim12_radioactivity_3d.html"
    },
    {
        "id": "lab12", "num": 12,
        "title_th": "การดูดกลืนแสง สเปกโทรโฟโตเมตรี และกราฟการเจริญเติบโต OD600",
        "title_en": "Spectrophotometry, Beer-Lambert Law & Bacterial OD600 Growth Curve",
        "category": "สเปกโทรโฟโตเมตรีและจลนพลศาสตร์เซลล์",
        "clo": "CLO3, CLO4",
        "instrument": "UV-Vis Spectrophotometer 600 nm & Cuvette Stage 3D",
        "theory": "กฎของเบียร์-แลมเบิร์ต A = epsilon b c = -log10(T) และการติดตามพลศาสตร์การเติบโตแบบทวีคูณของแบคทีเรียผ่าน OD600",
        "sim_file": "sim12_od600_3d.html"
    },
    {
        "id": "lab13", "num": 13,
        "title_th": "โครงงานย่อยบูรณาการ (Capstone Mini-Project): เครื่องมือชีวฟิสิกส์อัจฉริยะ",
        "title_en": "Capstone Mini-Project: Smart Biophysical IoT Rig",
        "category": "โครงงานนวัตกรรมบูรณาการ",
        "clo": "CLO1, CLO2, CLO3, CLO4",
        "instrument": "Virtual Instrument Sandbox & IoT Optical Sensor Rig",
        "theory": "การบูรณาการองค์ความรู้ฟิสิกส์ 12 บทเรียน สู่การออกแบบระบบตรวจวัดหรือเซนเซอร์ตรวจสอบจุลินทรีย์อัจฉริยะ พร้อมการประเมินรูบริก 4 มิติ",
        "sim_file": "sim12_od600_3d.html"
    }
]

def update_sqlite():
    print("Updating SQLite virtual_lab.db...")
    conn = sqlite3.connect(DB_PATH)
    c = conn.cursor()
    # Delete existing rows
    c.execute("DELETE FROM labs_catalog")
    for m in LABS_META:
        cfg_dummy = json.dumps({"instrument": m["instrument"], "sim_file": m["sim_file"]})
        c.execute("""
            INSERT INTO labs_catalog (lab_id, lab_number, title_th, title_en, category, clo_alignment, target_tool, theory_summary, config_json)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        """, (m["id"], m["num"], m["title_th"], m["title_en"], m["category"], m["clo"], m["instrument"], m["theory"], cfg_dummy))
    conn.commit()
    conn.close()
    print("  -> Updated 13 rows in labs_catalog.")

def update_app_controller():
    print("Updating virtual_lab/js/app_controller.js...")
    app_ctrl_path = os.path.join(VL_DIR, "js", "app_controller.js")
    with open(app_ctrl_path, "r", encoding="utf-8") as f:
        content = f.read()

    sim_files = [m["sim_file"] for m in LABS_META]
    files_str = ",\n        ".join(f"'{s}'" for s in sim_files)
    replacement = f"""      const simFiles = [
        {files_str}
      ];"""

    new_content = re.sub(
        r"const simFiles = \[\s*[\s\S]*?\s*\];",
        replacement,
        content
    )
    with open(app_ctrl_path, "w", encoding="utf-8") as f:
        f.write(new_content)
    print("  -> app_controller.js simFiles updated.")

def update_sim3d_engine():
    print("Updating virtual_lab/js/sim3d_engine.js switch statement...")
    sim_engine_path = os.path.join(VL_DIR, "js", "sim3d_engine.js")
    with open(sim_engine_path, "r", encoding="utf-8") as f:
        content = f.read()

    new_switch = """    switch (labId) {
      case "lab01":
        this.buildLab01Micropipette(params);
        break;
      case "lab02":
        this.buildLab02BrownianMotion(params);
        break;
      case "lab03":
        this.buildLab03StokesSedimentation(params);
        break;
      case "lab04":
        this.buildLab04Centrifuge(params);
        break;
      case "lab05":
        this.buildLab05IncubatorPCR(params);
        break;
      case "lab06":
        this.buildLab06Autoclave(params);
        break;
      case "lab07":
        this.buildLab07GramStain(params);
        break;
      case "lab08":
        this.buildLab08GelElectrophoresis(params);
        break;
      case "lab09":
        this.buildLab09OpticsRefraction(params);
        break;
      case "lab10":
        this.buildLab10Microscope(params);
        break;
      case "lab11":
        this.buildLab11UVSterilization(params);
        break;
      case "lab12":
        this.buildLab12Spectrophotometer(params);
        break;
      case "lab13":
      default:
        this.buildLab13SmartSensorSandbox(params);
        break;
    }"""

    new_content = re.sub(
        r"switch\s*\(labId\)\s*\{[\s\S]*?default:\s*this\.buildLab13SmartSensorSandbox\(params\);\s*break;\s*\}",
        new_switch,
        content
    )
    with open(sim_engine_path, "w", encoding="utf-8") as f:
        f.write(new_content)
    print("  -> sim3d_engine.js switch cases updated.")

def build_labs_config_js():
    print("Regenerating virtual_lab/js/labs_config.js...")
    labs_cfg_path = os.path.join(VL_DIR, "js", "labs_config.js")

    config_js = """/**
 * Modular Data-Driven Configuration for 13 Physics for Microbiology Virtual Labs
 * Course 4011111 Physics for Microbiology (OBE Aligned 2026/2027)
 * Perfectly synchronized with main.tex, SQLite3 virtual_lab.db & 03_physics4microbio2026 Master Plan
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
    formulaLatex: "\\\\text{Error (\\\\%)} = \\\\left| \\\\frac{m_{\\\\text{measured}} - m_{\\\\text{theory}}}{m_{\\\\text{theory}}} \\\\right| \\\\times 100\\\\%",
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
      { q: "เมื่อต้องการดูดสารละลายเข้าสู่ทิปของไมโครปิเปต ต้องกดก้านลูกสูบอย่างไร?", opts: ["กดลงไปยังจุดหยุดแรก (First Stop) แล้วค่อยๆ ปล่อยขึ้น", "กดจนสุดจุดหยุดที่สอง (Second Stop)", "ไม่ต้องกด ดึงก้านลูกสูบขึ้นตรงๆ", "กดและปล่อยอย่างรวดเร็วเพื่อสร้างสุญญากาศ"], ans: 0 },
      { q: "หากตั้งปริมาตรไมโครปิเปตไว้ที่ 500 µL มวลของน้ำบริสุทธิ์ควรชั่งได้ประมาณเท่าใด?", opts: ["0.5000 g", "5.0000 g", "0.0500 g", "50.000 g"], ans: 0 },
      { q: "การจับไมโครปิเปตเอียงมากกว่า 30 องศาขณะดูดของเหลวจะส่งผลอย่างไรต่อผลการวัด?", opts: ["ทำให้ดูดของเหลวได้ปริมาตรน้อยกว่าที่ตั้งไว้เนื่องจากผลของแรงดันสถิตไฮโดรสแตติก", "ทำให้ปริมาตรเพิ่มขึ้นเป็นสองเท่าเสมอ", "ไม่มีผลกระทบใดๆ", "ทำให้ลูกสูบติดขัด"], ans: 0 }
    ]
  },

  lab02: {
    id: "lab02",
    num: 2,
    badge: "Lab 02",
    titleTh: "การเคลื่อนที่แบบบราวน์และเวกเตอร์การแพร่ของจุลินทรีย์",
    titleEn: "Brownian Motion & Microorganism Diffusion Vectors",
    category: "เวกเตอร์และการแพร่ชีวภาพ",
    icon: "fa-solid fa-arrows-split-up-and-left",
    instrument: "3D Hanging Drop Chamber & Brownian Motion Analyzer",
    description: "การสังเกตการเคลื่อนที่แบบบราวน์ของเซลล์จุลินทรีย์และอนุภาคคอลลอยด์ การจำลองตามสมการไอน์สไตน์ D = k_B T / (6 pi eta r) และการรวมเวกเตอร์การเคลื่อนที่แบบสุ่ม",
    formulaLatex: "D = \\\\frac{k_B T}{6 \\\\pi \\\\eta r}, \\\\quad \\\\langle r^2 \\\\rangle = 4Dt",
    formulaDesc: "สัมประสิทธิ์การแพร่ D แปรผันตรงกับอุณหภูมิสัมบูรณ์ T และแปรผกผันกับความหนืดของตัวกลาง eta และรัศมีอนุภาค r",
    params: [
      { id: "temp_c", label: "อุณหภูมิสารละลาย (°C)", min: 10, max: 60, step: 5, default: 25, unit: "°C" },
      { id: "viscosity_cp", label: "ความหนืดสัมพัทธ์ (cP)", min: 0.5, max: 5.0, step: 0.5, default: 1.0, unit: "cP" },
      { id: "particle_type", label: "ชนิดอนุภาค", type: "select", options: [
        { val: "microbe", text: "เซลล์แบคทีเรีย E. coli (r = 0.5 µm)" },
        { val: "latex", text: "อนุภาค Latex Bead (r = 0.2 µm)" },
        { val: "yeast", text: "เซลล์ยีสต์ (r = 2.5 µm)" }
      ]}
    ],
    calcPhysics: function(p) {
      let r_um = p.particle_type === "microbe" ? 0.5 : (p.particle_type === "latex" ? 0.2 : 2.5);
      let T_K = p.temp_c + 273.15;
      let eta = p.viscosity_cp * 1e-3; // Pa.s
      let kB = 1.38e-23;
      let r_m = r_um * 1e-6;
      let D = (kB * T_K) / (6 * Math.PI * eta * r_m); // m2/s
      let D_um2_s = D * 1e12;
      let msd_1s = 4 * D_um2_s * 1.0;
      let rms_disp = Math.sqrt(msd_1s);
      return {
        diff_coeff: D_um2_s.toFixed(3) + " µm²/s",
        msd_val: msd_1s.toFixed(2) + " µm²",
        rms_disp: rms_disp.toFixed(2) + " µm",
        motion_state: p.temp_c > 45 ? "การสั่นเร็วมาก (High Agitation)" : "สั่นตามอุณหภูมิปกติ"
      };
    },
    tableCols: ["Trial", "อุณหภูมิ (°C)", "ความหนืด (cP)", "ชนิดอนุภาค", "สัมประสิทธิ์การแพร่ D (µm²/s)", "ระยะกระจัดเฉลี่ย RMS (µm)"],
    defaultTrials: [
      { trial: 1, p1: 25, p2: 1.0, p3: "E. coli", p4: "0.437", err: "1.32" },
      { trial: 2, p1: 37, p2: 1.0, p3: "E. coli", p4: "0.455", err: "1.35" },
      { trial: 3, p1: 25, p2: 2.0, p3: "E. coli", p4: "0.219", err: "0.94" }
    ],
    quiz: [
      { q: "การเคลื่อนที่แบบบราวน์ (Brownian Motion) มีสาเหตุหลักมาจากอะไร?", opts: ["การชนกันแบบสุ่มอย่างต่อเนื่องของโมเลกุลน้ำกับเซลล์แบคทีเรีย", "แบคทีเรียว่ายน้ำด้วยพลังงาน ATP", "แรงดึงดูดของโลก", "การไหลเวียนของสนามแม่เหล็กโลก"], ans: 0 },
      { q: "เมื่ออุณหภูมิของสารละลายเพิ่มขึ้น สัมประสิทธิ์การแพร่ (D) และความเร็วการเคลื่อนที่แบบบราวน์จะเปลี่ยนแปลงอย่างไร?", opts: ["เพิ่มขึ้น เพราะพลังงานจลน์เฉลี่ยของโมเลกุลของเหลวเพิ่มขึ้น", "ลดลง เพราะความหนาแน่นลดลง", "เท่าเดิมเสมอ", "หยุดการเคลื่อนที่"], ans: 0 },
      { q: "เซลล์ยีสต์ขนาดใหญ่ (r = 2.5 µm) จะมีการเคลื่อนที่แบบบราวน์แตกต่างจากอนุภาคนาโนอย่างไร?", opts: ["เคลื่อนที่ช้าและระยะกระจัดสั้นกว่ามากเพราะมวลและแรงต้านหนืดสูงกว่า", "เคลื่อนที่เร็วกว่า", "เคลื่อนที่เท่ากัน", "ไม่เกิดการเคลื่อนที่"], ans: 0 }
    ]
  },

  lab03: {
    id: "lab03",
    num: 3,
    badge: "Lab 03",
    titleTh: "กฎของนิวตัน ความหนืดสโตกส์ และการตกตะกอนของแบคทีเรีย",
    titleEn: "Newton's Laws, Stokes Viscosity & Bacterial Sedimentation",
    category: "กลศาสตร์ของไหลและความหนืด",
    icon: "fa-solid fa-water",
    instrument: "Falling Ball Viscometer & Stoke's Column 3D",
    description: "แรงต้านหนืดตามกฎของสโตกส์ F_d = 6 pi eta r v สมดุลแรงตกตะกอน และความเร็วปลาย (Terminal Velocity) ของอนุภาคและจุลินทรีย์ในของไหล",
    formulaLatex: "v_t = \\\\frac{2 r^2 g (\\\\rho_p - \\\\rho_f)}{9 \\\\eta}, \\\\quad F_d = 6 \\\\pi \\\\eta r v",
    formulaDesc: "ความเร็วปลายของการตกตะกอนแปรผันตรงกับผลต่างความหนาแน่นและกำลังสองของรัศมีอนุภาค และแปรผกผันกับความหนืด",
    params: [
      { id: "fluid_type", label: "ชนิดของไหลตัวกลาง", type: "select", options: [
        { val: "water", text: "น้ำบริสุทธิ์ (η = 1.00 mPa·s, ρ = 1.00 g/cm³)" },
        { val: "glycerol_20", text: "กลีเซอรอล 20% (η = 1.76 mPa·s, ρ = 1.05 g/cm³)" },
        { val: "glycerol_50", text: "กลีเซอรอล 50% (η = 6.00 mPa·s, ρ = 1.13 g/cm³)" }
      ]},
      { id: "ball_radius_mm", label: "รัศมีลูกทรงกลม r (mm)", min: 1.0, max: 5.0, step: 0.5, default: 2.0, unit: "mm" },
      { id: "ball_material", label: "วัสดุทรงกลม", type: "select", options: [
        { val: "steel", text: "เหล็กกล้า (ρ = 7.85 g/cm³)" },
        { val: "glass", text: "แก้วโบโรซิลิเกต (ρ = 2.23 g/cm³)" }
      ]}
    ],
    calcPhysics: function(p) {
      let eta = p.fluid_type === "water" ? 1.0e-3 : (p.fluid_type === "glycerol_20" ? 1.76e-3 : 6.0e-3);
      let rho_f = p.fluid_type === "water" ? 1000 : (p.fluid_type === "glycerol_20" ? 1050 : 1130);
      let rho_p = p.ball_material === "steel" ? 7850 : 2230;
      let r = p.ball_radius_mm * 1e-3;
      let g = 9.81;
      let vt = (2 * r * r * g * (rho_p - rho_f)) / (9 * eta);
      let fall_time_20cm = 0.20 / vt;
      return {
        vt_display: vt.toFixed(3) + " m/s",
        vt_cm: (vt * 100).toFixed(1) + " cm/s",
        fall_time: fall_time_20cm < 0.05 ? "< 0.05 s" : fall_time_20cm.toFixed(2) + " s",
        reynolds: ((rho_f * vt * 2 * r) / eta).toFixed(1)
      };
    },
    tableCols: ["Trial", "ของไหล (η)", "ลูกกลม (ρ)", "รัศมี r (mm)", "ความเร็วปลาย vt (cm/s)", "เวลาตก 20 cm (s)"],
    defaultTrials: [
      { trial: 1, p1: "น้ำ (1.00 mPa·s)", p2: "แก้ว (2.23)", p3: 2.0, p4: "5.36", err: "3.73" },
      { trial: 2, p1: "น้ำ (1.00 mPa·s)", p2: "เหล็ก (7.85)", p3: 2.0, p4: "29.8", err: "0.67" },
      { trial: 3, p1: "กลีเซอรอล 50%", p2: "เหล็ก (7.85)", p3: 2.0, p4: "4.88", err: "4.10" }
    ],
    quiz: [
      { q: "ตามกฎของสโตกส์ (Stokes' Law) หากรัศมีของอนุภาคแบคทีเรียเพิ่มขึ้น 2 เท่า ความเร็วปลายในการตกตะกอนจะเพิ่มขึ้นกี่เท่า?", opts: ["4 เท่า (เนื่องจากแปรผันตาม r²)", "2 เท่า", "8 เท่า", "เท่าเดิม"], ans: 0 },
      { q: "เหตุใดเซลล์แบคทีเรียในน้ำนิ่งจึงตกตะกอนช้ามากจนแทบมองไม่เห็น?", opts: ["เพราะรัศมีขนาดเล็กมากระดับไมโครเมตร และแรงลอยตัวใกล้เคียงน้ำ", "เพราะแบคทีเรียไม่มีมวล", "เพราะน้ำไม่มีแรงเสียดทาน", "เพราะแสงอาทิตย์พยุงเซลล์ไว้"], ans: 0 },
      { q: "อุปกรณ์ใดใช้วัดความหนืดของของเหลวโดยอาศัยกฎของสโตกส์?", opts: ["Falling Ball Viscometer", "Spectrophotometer", "Autoclave", "Refractometer"], ans: 0 }
    ]
  },

  lab04: {
    id: "lab04",
    num: 4,
    badge: "Lab 04",
    titleTh: "งาน พลังงานจลน์ และแรงหนีศูนย์กลางในการปั่นแยกเซลล์",
    titleEn: "Work, Kinetic Energy & Centrifugal Cell Separation",
    category: "กลศาสตร์การหมุนและการปั่นเหวี่ยง",
    icon: "fa-solid fa-rotate",
    instrument: "High-Speed Microcentrifuge 3D & Balanced Rotor",
    description: "แรงสู่ศูนย์กลาง อัตราเร่งสู่ศูนย์กลาง และแรงหนีศูนย์กลางสัมพัทธ์ (Relative Centrifugal Field - RCF) ในการแยกตะกอนเซลล์",
    formulaLatex: "\\\\text{RCF } (\\\\times g) = 1.118 \\\\times 10^{-5} \\\\times r_{\\\\text{cm}} \\\\times (\\\\text{RPM})^2",
    formulaDesc: "แรงเหวี่ยงหนีศูนย์กลางสัมพันธ์แปรผันตรงกับรัศมีโรเตอร์ (r) และแปรผันตรงกับความเร็วรอบยกกำลังสอง (RPM²)",
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
      { q: "หากเพิ่มความเร็วรอบของเครื่องปั่นเหวี่ยงจาก 4,000 RPM เป็น 8,000 RPM ค่าแรงเหวี่ยงสัมพัทธ์ (RCF) จะเพิ่มขึ้นกี่เท่า?", opts: ["4 เท่า (เนื่องจากแปรผันตาม RPM²)", "2 เท่า", "8 เท่า", "16 เท่า"], ans: 0 },
      { q: "เหตุใดจึงต้องวางหลอดทดลองในโรเตอร์เครื่องปั่นเหวี่ยงให้สมดุลตรงข้ามกันเสมอ?", opts: ["เพื่อป้องกันโมเมนต์ความไม่สมดุลที่ทำให้แกนมอเตอร์หักเสียหาย", "เพื่อให้โรเตอร์หมุนเร็วขึ้น", "เพื่อให้สารตกตะกอนสวยงาม", "เพื่อให้ประหยัดไฟฟ้า"], ans: 0 },
      { q: "หน่วย RCF (×g) หมายถึงอะไร?", opts: ["จำนวนเท่าของความเร่งเนื่องจากแรงโน้มถ่วงของโลก (g)", "จำนวนรอบต่อวินาที", "น้ำหนักของหลอดทดลอง", "แรงเสียดทานของอากาศ"], ans: 0 }
    ]
  },

  lab05: {
    id: "lab05",
    num: 5,
    badge: "Lab 05",
    titleTh: "การถ่ายโอนความร้อนและเสถียรภาพอุณหภูมิตู้อบ Incubator 37°C",
    titleEn: "Heat Transfer & 37°C Incubator Thermal Stability",
    category: "ความร้อนและการควบคุมอุณหภูมิชีวภาพ",
    icon: "fa-solid fa-temperature-arrow-up",
    instrument: "Microbiological Incubator 37.0°C & Calorimeter 3D",
    description: "การอนุรักษ์พลังงานความร้อนในแคลอริมิเตอร์ Q = mcΔT และการตรวจสอบเสถียรภาพการกระจายอุณหภูมิ 3 จุดในตู้อบเลี้ยงเชื้อจุลินทรีย์เพื่อป้องกัน Thermal Stratification",
    formulaLatex: "Q = mc \\\\Delta T, \\\\quad Q_{\\\\text{gain}} = Q_{\\\\text{lost}}",
    formulaDesc: "ปริมาณความร้อนแปรผันตรงกับมวล ความจุความร้อนจำเพาะ (c = 4.184 J/g·°C) และผลต่างอุณหภูมิ",
    params: [
      { id: "setpoint_C", label: "อุณหภูมิเป้าหมาย SV (°C)", min: 30.0, max: 60.0, step: 0.5, default: 37.0, unit: "°C" },
      { id: "ambient_C", label: "อุณหภูมิห้องแล็บ Ambient (°C)", min: 20.0, max: 35.0, step: 0.5, default: 25.0, unit: "°C" },
      { id: "fan_mode", label: "พัดลมพาความร้อน (Convection)", type: "select", options: [
        { val: "high", text: "พัดลมรอบสูง (Forced Convection สม่ำเสมอ)" },
        { val: "low", text: "พัดลมรอบต่ำ (กระจายความร้อนปานกลาง)" },
        { val: "off", text: "ปิดพัดลม (Natural Convection อากาศแบ่งชั้น)" }
      ]},
      { id: "door_status", label: "สถานะประตูตู้", type: "select", options: [
        { val: "closed", text: "ปิดสนิท (Insulated Sealed)" },
        { val: "open", text: "เปิดประตู (Ambient Heat Loss)" }
      ]}
    ],
    calcPhysics: function(p) {
      let sv = p.setpoint_C;
      let amb = p.ambient_C;
      let strat = p.fan_mode === "high" ? 0.25 : (p.fan_mode === "low" ? 0.65 : 1.35);
      let doorLoss = p.door_status === "open" ? (sv - amb) * 0.55 : 0;
      let mid = sv - (doorLoss * 0.4);
      let top = mid + strat - (doorLoss * 0.2);
      let bot = mid - strat - (doorLoss * 0.85);
      let isStable = Math.abs(top - sv) <= 0.5 && Math.abs(bot - sv) <= 0.5;
      return {
        top_temp: top.toFixed(1) + " °C",
        mid_temp: mid.toFixed(1) + " °C",
        bot_temp: bot.toFixed(1) + " °C",
        stability: isStable ? "เสถียรภาพดี (อยู่ในเกณฑ์ ±0.5°C)" : "ความร้อนไม่สม่ำเสมอ (เกินเกณฑ์ ±0.5°C)",
        convection_type: p.fan_mode === "high" ? "Forced Convection (Optimal)" : "Natural Stratification"
      };
    },
    tableCols: ["Trial", "ตำแหน่งหัววัด", "อุณหภูมิ SV (°C)", "อุณหภูมิวัดจริง (°C)", "ผลต่าง ΔT (°C)", "การประเมิน"],
    defaultTrials: [
      { trial: 1, p1: "ชั้นบนสุด (ด้านใน)", p2: "37.0", p3: "37.4", p4: "+0.40", err: "ผ่านเกณฑ์" },
      { trial: 2, p1: "ชั้นกลาง (อ้างอิง)", p2: "37.0", p3: "37.0", p4: "0.00", err: "จุดอ้างอิง" },
      { trial: 3, p1: "ชั้นล่าง (ใกล้ประตู)", p2: "37.0", p3: "36.6", p4: "-0.40", err: "ผ่านเกณฑ์" }
    ],
    quiz: [
      { q: "เพราะเหตุใดน้ำจึงมีความสำคัญในการรักษาเสถียรภาพอุณหภูมิของเซลล์สิ่งมีชีวิตและอาหารเลี้ยงเชื้อ?", opts: ["น้ำมีความจุความร้อนจำเพาะสูงมาก (4.184 J/g·°C) ทำให้อุณหภูมิไม่แกว่งตัวเร็วง่าย", "น้ำมีความหนาแน่นต่ำมาก", "น้ำไม่สามารถนำความร้อนได้", "น้ำมีจุดเดือดต่ำ"], ans: 0 },
      { q: "กลไกการถ่ายโอนความร้อนหลักภายในตู้อบเลี้ยงเชื้อ (Incubator) ที่ใช้พัดลมหมุนเวียนอากาศคือข้อใด?", opts: ["การพาความร้อน (Convection)", "การนำความร้อน (Conduction)", "การแผ่รังสี (Radiation)", "การระเหิด (Sublimation)"], ans: 0 },
      { q: "หากต้องการรักษาอาหารวุ้นหลอมเหลวไม่ให้แข็งตัวที่อุณหภูมิ 48°C ก่อนเทจานเพาะเชื้อ อุปกรณ์ใดรักษาอุณหภูมิได้สม่ำเสมอกว่ากันเพราะเหตุใด?", opts: ["อ่างน้ำอุ่น Water Bath เพราะน้ำนำความร้อนผ่านแก้วได้เร็วกว่าอากาศ", "ตู้อบลมร้อน Hot Air Oven", "วางบนโต๊ะปฏิบัติการ", "แช่ตู้เย็น"], ans: 0 }
    ]
  },

  lab06: {
    id: "lab06",
    num: 6,
    badge: "Lab 06",
    titleTh: "อุณหพลศาสตร์ กฎข้อที่หนึ่ง และหม้อนึ่งความดันไอ Autoclave 121°C",
    titleEn: "Thermodynamics, First Law & 121°C Autoclave Steam Sterilization",
    category: "อุณหพลศาสตร์และการทำลายเชื้อ",
    icon: "fa-solid fa-gauge-high",
    instrument: "Vertical Autoclave Steam Sterilizer 3D",
    description: "อุณหพลศาสตร์ของไอน้ำอิ่มตัวภายใต้ความดัน 15 psi (121°C) สมการ Antoine และจลนพลศาสตร์การทำลายสปอร์ Geobacillus stearothermophilus ตามค่า D_121 = 1.5 min",
    formulaLatex: "\\\\Delta U = Q - W, \\\\quad \\\\log_{10} P = A - \\\\frac{B}{T+C}, \\\\quad t = D \\\\left( \\\\log N_0 - \\\\log N \\\\right)",
    formulaDesc: "จุดเดือดของน้ำแปรผันตามความดันไอในภาชนะปิด และประชากรสปอร์ลดลง 90% ในทุกๆ ช่วงเวลา D-value",
    params: [
      { id: "steam_temp_C", label: "อุณหภูมิไอน้ำ (°C)", min: 100, max: 134, step: 1, default: 121, unit: "°C" },
      { id: "hold_time_min", label: "เวลาการนึ่งฆ่าเชื้อ (นาที)", min: 5, max: 30, step: 1, default: 15, unit: "นาที" },
      { id: "air_purged", label: "การไล่อากาศเย็นออกจากหม้อนึ่ง", type: "select", options: [
        { val: "purged", text: "ไล่อากาศสมบูรณ์ (100% Saturated Steam) — ถูกต้อง" },
        { val: "air_pocket", text: "มีถุงอากาศตกค้าง (Cold Air Pocket — อุณหภูมิจริงต่ำกว่าเกจ)" }
      ]}
    ],
    calcPhysics: function(p) {
      let isPurged = p.air_purged === "purged";
      let actualT = isPurged ? p.steam_temp_C : p.steam_temp_C - 8.5;
      let D121 = 1.5; // min
      let z = 10.0; // deg C
      let D_actual = D121 * Math.pow(10, (121.0 - actualT) / z);
      let logReduction = p.hold_time_min / D_actual;
      let N0 = 1e6;
      let surviving = N0 / Math.pow(10, logReduction);
      let pressurePsi = Math.exp(16.7 - 3816 / (actualT + 227)) * 0.145;
      let isSterile = surviving < 1.0;
      return {
        actual_temp: actualT.toFixed(1) + " °C",
        pressure_gauge: pressurePsi.toFixed(1) + " psi",
        log_reduction: logReduction.toFixed(1) + " log",
        surviving_spores: surviving < 0.001 ? "< 10⁻³ (Sterile SAL 10⁻⁶)" : surviving.toFixed(0) + " CFU",
        safety_status: isSterile ? "ผ่านเกณฑ์การทำให้ไร้เชื้อ (Sterile)" : "ไม่ผ่านเกณฑ์ (Non-sterile)"
      };
    },
    tableCols: ["Trial", "อุณหภูมิตั้ง (°C)", "เวลา (นาที)", "สถานะไอน้ำ", "อุณหภูมิจริง (°C)", "ผลการทำลายสปอร์"],
    defaultTrials: [
      { trial: 1, p1: 121, p2: 15, p3: "ไอน้ำอิ่มตัวสมบูรณ์", p4: "121.0", err: "ไร้เชื้อสมบูรณ์ (SAL < 10⁻⁶)" },
      { trial: 2, p1: 121, p2: 5, p3: "ไอน้ำอิ่มตัวสมบูรณ์", p4: "121.0", err: "ไม่ผ่าน (เหลือ 4.6 × 10² CFU)" },
      { trial: 3, p1: 121, p2: 15, p3: "มีถุงอากาศค้าง", p4: "112.5", err: "ไม่ผ่าน (เหลือ 1.8 × 10³ CFU)" }
    ],
    quiz: [
      { q: "เหตุใดการนึ่งฆ่าเชื้อด้วยหม้อนึ่งความดันไอ (Autoclave) จึงต้องใช้ความดัน 15 psi ควบคู่กับอุณหภูมิ 121°C?", opts: ["ความดันสูงช่วยเพิ่มจุดเดือดของน้ำขึ้นเป็น 121°C ซึ่งเพียงพอต่อการทำลายเอนโดสปอร์ที่ทนความร้อนสูง", "ความดันช่วยบดขยี้แบคทีเรียทางกลศาสตร์", "เพื่อให้ประหยัดไฟฟ้า", "เพื่อให้น้ำเดือดช้าลง"], ans: 0 },
      { q: "หากไล่อากาศเย็นออกจากหม้อนึ่งไม่หมด (Cold Air Pocket) จะส่งผลเสียอย่างไร?", opts: ["อุณหภูมิที่สัมผัสกับอาหารเลี้ยงเชื้อจะต่ำกว่าที่เกจวัดระบุ ทำให้ฆ่าเชื้อไม่สมบูรณ์", "หม้อนึ่งจะระเบิดทันที", "น้ำจะเดือดเร็วเกินไป", "ไม่มีผลเสียใดๆ"], ans: 0 },
      { q: "สปอร์ของแบคทีเรียชนิดใดที่นิยมนำมาใช้เป็น Biological Indicator เพื่อตรวจสอบประสิทธิภาพของ Autoclave?", opts: ["Geobacillus stearothermophilus", "Escherichia coli", "Staphylococcus aureus", "Saccharomyces cerevisiae"], ans: 0 }
    ]
  },

  lab07: {
    id: "lab07",
    num: 7,
    badge: "Lab 07",
    titleTh: "แรงไฟฟ้าสถิต กฎของคูลอมบ์ และกลไกการย้อมสีแกรม",
    titleEn: "Electrostatics, Coulomb's Law & Gram Staining Mechanism",
    category: "ไฟฟ้าสถิตและเคมีพื้นผิวเซลล์",
    icon: "fa-solid fa-atom",
    instrument: "Gram Staining Nanostructure Stage 3D",
    description: "แรงดึงดูดทางไฟฟ้าสถิตตามกฎของคูลอมบ์ F = k |q1 q2| / r² ระหว่างสีย้อมประจุบวก Crystal Violet กับกรดเทโคอิกประจุลบของผนังเซลล์ และบทบาทตัวทำละลายล้างสี 95% Ethanol",
    formulaLatex: "F_e = k_e \\\\frac{|q_1 q_2|}{r^2}, \\\\quad \\\\vec{E} = \\\\frac{\\\\vec{F}}{q}",
    formulaDesc: "แรงไฟฟ้าสถิตแปรผันตรงกับผลคูณของประจุและแปรผกผันกับกำลังสองของระยะห่างระหว่างโมเลกุลสีย้อมและผนังเซลล์",
    params: [
      { id: "bacteria_type", label: "ชนิดแบคทีเรีย", type: "select", options: [
        { val: "gram_pos", text: "Gram-positive (S. aureus — Peptidoglycan หนา 40 nm + Teichoic Acid)" },
        { val: "gram_neg", text: "Gram-negative (E. coli — Outer Membrane + PG บาง 2 nm)" }
      ]},
      { id: "decolor_time_s", label: "เวลาล้างสีด้วย 95% เอทานอล (วินาที)", min: 5, max: 60, step: 5, default: 15, unit: "วินาที" },
      { id: "mordant_step", label: "การใช้สารช่วยติดสี (Iodine Mordant)", type: "select", options: [
        { val: "yes", text: "ใช้สารละลายไอโอดีน (เกิดผลึก CV-I Complex ขนาดใหญ่)" },
        { val: "no", text: "ไม่ใช้ไอโอดีน (สีย้อมหลุดง่าย)" }
      ]}
    ],
    calcPhysics: function(p) {
      let isPos = p.bacteria_type === "gram_pos";
      let hasIodine = p.mordant_step === "yes";
      let t = p.decolor_time_s;
      let finalColor = "";
      let retention = 0;
      if (isPos) {
        if (!hasIodine && t > 20) { finalColor = "ชมพู/แดง (Over-decolorized)"; retention = 15; }
        else if (t > 45) { finalColor = "ม่วงจาง/ชมพู (Over-decolorized)"; retention = 35; }
        else { finalColor = "ม่วงเข้ม (Crystal Violet ติดแน่น)"; retention = 95; }
      } else {
        if (t < 10) { finalColor = "ม่วงปนชมพู (Under-decolorized)"; retention = 60; }
        else { finalColor = "ชมพู/แดง (Safranin O ติดประจุบวกแทน)"; retention = 5; }
      }
      return {
        final_color: finalColor,
        cv_retention: retention + " %",
        wall_structure: isPos ? "Peptidoglycan หนาแห้งกรังดัก CV-I" : "LPS ถูกละลาย CV-I หลุดออกหมด",
        eval_result: (isPos && retention > 80) || (!isPos && retention < 20) ? "การย้อมสีถูกต้องตามทฤษฎี" : "เทคนิคการล้างสีคลาดเคลื่อน"
      };
    },
    tableCols: ["Trial", "ชนิดแบคทีเรีย", "การใส่ไอโอดีน", "เวลาล้างแอลกอฮอล์ (s)", "สีสุดท้ายใต้กล้อง", "การประเมิน"],
    defaultTrials: [
      { trial: 1, p1: "Gram-positive", p2: "ใช้ไอโอดีน", p3: 15, p4: "ม่วงเข้ม", err: "ถูกต้องสมบูรณ์" },
      { trial: 2, p1: "Gram-negative", p2: "ใช้ไอโอดีน", p3: 15, p4: "ชมพู/แดง", err: "ถูกต้องสมบูรณ์" },
      { trial: 3, p1: "Gram-positive", p2: "ใช้ไอโอดีน", p3: 60, p4: "ชมพูอ่อน", err: "ล้างแอลกอฮอล์นานเกินไป" }
    ],
    quiz: [
      { q: "สีย้อมคริสตัลไวโอเลต (Crystal Violet) ยึดเกาะกับผนังเซลล์ของแบคทีเรียด้วยแรงทางฟิสิกส์ชนิดใดเป็นหลัก?", opts: ["แรงดึงดูดทางไฟฟ้าสถิต (Electrostatic Attraction) ระหว่างประจุบวกของสีกับประจุลบของกรดเทโคอิก", "แรงโน้มถ่วง", "แรงแม่เหล็ก", "แรงดันออสโมซิส"], ans: 0 },
      { q: "บทบาททางฟิสิกส์-เคมีของเอทานอล 95% ต่อผนังเซลล์ของแบคทีเรียแกรมลบคือข้อใด?", opts: ["ละลายชั้นไขมัน Outer Membrane และชะล้างผลึก CV-I ออกจากชั้นเปปทิโดไกลแคนบาง", "ทำให้ผนังเซลล์แข็งตัวขึ้น", "ทำให้ประจุไฟฟ้าของสีกลับขั้ว", "เป็นแหล่งอาหารให้เซลล์"], ans: 0 },
      { q: "หากล้างเอทานอล 95% นานเกินไป 1 นาทีกับแบคทีเรียแกรมบวก จะเกิดผลอย่างไร?", opts: ["แบคทีเรียแกรมบวกจะสูญเสียสีม่วงและติดสีชมพูของ Safranin แทน (Over-decolorization)", "ยังคงติดสีม่วงเข้มเสมอ", "เซลล์จะระเบิดออก", "ไม่สามารถมองเห็นเซลล์ได้"], ans: 0 }
    ]
  },

  lab08: {
    id: "lab08",
    num: 8,
    badge: "Lab 08",
    titleTh: "กระแสไฟฟ้า กฎของโอห์ม และเจลอิเล็กโทรโฟเรซิส",
    titleEn: "Electric Current, Ohm's Law & Agarose Gel Electrophoresis",
    category: "ไฟฟ้าแม่เหล็กและชีวโมเลกุล",
    icon: "fa-solid fa-bolt-lightning",
    instrument: "Horizontal Agarose Gel Tank & Regulated DC Power Supply 3D",
    description: "สนามไฟฟ้า สภาพเคลื่อนตัวของดีเอ็นเอ (Electrophoretic Mobility) กฎของโอห์ม กำลังไฟฟ้า และการแยกชิ้นส่วนดีเอ็นเอตามขนาดโมเลกุล",
    formulaLatex: "V = IR, \\\\quad v = \\\\mu_e E = \\\\mu_e \\\\left(\\\\frac{V}{L}\\\\right), \\\\quad P = VI",
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

  lab09: {
    id: "lab09",
    num: 9,
    badge: "Lab 09",
    titleTh: "การหักเหของแสง กฎของสเนลล์ และการวัดความหวาน Brix Refractometer",
    titleEn: "Optics, Snell's Law & Brix Refractometer",
    category: "ทัศนศาสตร์เชิงเรขาคณิต",
    icon: "fa-solid fa-glasses",
    instrument: "Abbe / Handheld Optical Refractometer 3D",
    description: "การหักเหของแสงตามกฎของสเนลล์ ดัชนีหักเหของแสง ปรากฏการณ์สะท้อนกลับหมด และมุมวิกฤติ (Critical Angle) ในการวัดความเข้มข้นสารละลายน้ำตาล Brix 0–60°",
    formulaLatex: "n_1 \\\\sin \\\\theta_1 = n_2 \\\\sin \\\\theta_2, \\\\quad \\\\theta_c = \\\\arcsin\\\\left(\\\\frac{n_2}{n_1}\\\\right), \\\\quad n = 1.3330 + 0.00143 \\\\cdot \\\\text{Brix}",
    formulaDesc: "มุมวิกฤติสะท้อนกลับหมดแปรผันตามดัชนีหักเหของของเหลวบนปริซึมแก้วฟลินต์ (n_glass = 1.70)",
    params: [
      { id: "brix_val", label: "ความหวานของตัวอย่าง (°Brix)", min: 0.0, max: 60.0, step: 2.5, default: 15.0, unit: "°Brix" },
      { id: "sample_temp_c", label: "อุณหภูมิตัวอย่าง (°C)", min: 15, max: 35, step: 1, default: 20, unit: "°C" },
      { id: "prism_type", label: "ชนิดปริซึมตรวจวัด", type: "select", options: [
        { val: "flint", text: "แก้วฟลินต์ความหนาแน่นสูง (n = 1.7000)" },
        { val: "sapphire", text: "แซฟไฟร์สังเคราะห์ (n = 1.7700)" }
      ]}
    ],
    calcPhysics: function(p) {
      let n_sample = 1.3330 + (0.00143 * p.brix_val) - ((p.sample_temp_c - 20) * 0.0001);
      let n_prism = p.prism_type === "flint" ? 1.7000 : 1.7700;
      let sin_crit = n_sample / n_prism;
      let crit_angle_deg = Math.asin(sin_crit) * (180 / Math.PI);
      let shadow_pos_pct = (p.brix_val / 60.0) * 100;
      return {
        sample_index: n_sample.toFixed(4),
        crit_angle: crit_angle_deg.toFixed(2) + " °",
        reticle_brix: p.brix_val.toFixed(1) + " °Brix",
        shadow_border: shadow_pos_pct.toFixed(1) + " % ของสเกล"
      };
    },
    tableCols: ["Trial", "Brix จริง (°Bx)", "อุณหภูมิ (°C)", "ดัชนีหักเห n", "มุมวิกฤติ θc (°)", "ค่าอ่านบนสเกล (°Bx)"],
    defaultTrials: [
      { trial: 1, p1: "0.0 (น้ำกลั่น)", p2: 20, p3: "1.3330", p4: "51.64", err: "0.0" },
      { trial: 2, p1: "15.0 (น้ำผลไม้)", p2: 20, p3: "1.3545", p4: "52.82", err: "15.0" },
      { trial: 3, p1: "40.0 (น้ำเชื่อมเข้มข้น)", p2: 20, p3: "1.3902", p4: "54.85", err: "40.0" }
    ],
    quiz: [
      { q: "หลักการฟิสิกส์พื้นฐานที่รีแฟรกโตมิเตอร์ (Refractometer) นำมาใช้วัดความหวานคือปรากฏการณ์ใด?", opts: ["การสะท้อนกลับหมดของแสง (Total Internal Reflection) ที่มุมวิกฤติ", "การเลี้ยวเบนของแสงผ่านเกรตติง", "การโพลาไรซ์ของแสง", "การดูดกลืนแสงแบบเอกซ์โพเนนเชียล"], ans: 0 },
      { q: "เมื่อความเข้มข้นของน้ำตาลซูโครสในสารละลายเพิ่มขึ้น ดัชนีหักเหของแสง (n) จะเปลี่ยนแปลงอย่างไร?", opts: ["เพิ่มขึ้นเชิงเส้นตามความเข้มข้นของของแข็งที่ละลายอยู่", "ลดลงอย่างรวดเร็ว", "คงที่เท่ากับน้ำบริสุทธิ์เสมอ", "แกว่งไปมาตามมุมแสง"], ans: 0 },
      { q: "น้ำบริสุทธิ์ที่อุณหภูมิมาตรฐาน 20°C มีค่าดัชนีหักเหของแสงและค่าอ่านบนสเกล Brix เท่าใด?", opts: ["n = 1.3330 และ 0.0 °Brix", "n = 1.0000 และ 10 °Brix", "n = 1.5150 และ 100 °Brix", "n = 2.4170 และ 0 °Brix"], ans: 0 }
    ]
  },

  lab10: {
    id: "lab10",
    num: 10,
    badge: "Lab 10",
    titleTh: "ทัศนศาสตร์ เลนส์กล้องจุลทรรศน์ และ Immersion Oil 100x",
    titleEn: "Wave Optics, Microscope Resolution & Immersion Oil 100x",
    category: "ทัศนศาสตร์คลื่นและกล้องจุลทรรศน์",
    icon: "fa-solid fa-microscope",
    instrument: "Research Microscope 100× Oil Immersion Stage 3D",
    description: "ขีดจำกัดการเลี้ยวเบนของแอบบี (Abbe's Limit) กำลังแยกภาพ (Resolution) ของเลนส์น้ำมัน 100x Oil Immersion และการจับคู่ดัชนีหักเห (Index Matching)",
    formulaLatex: "d = \\\\frac{0.61 \\\\lambda}{\\\\text{NA}}, \\\\quad \\\\text{NA} = n \\\\sin \\\\alpha, \\\\quad M_{\\\\text{total}} = M_{\\\\text{obj}} \\\\times M_{\\\\text{oc}}",
    formulaDesc: "ระยะแยกชัดต่ำสุด (d) แปรผกผันกับค่า Numerical Aperture (NA) และแปรผันตรงกับความยาวคลื่นแสง",
    params: [
      { id: "lens_type", label: "ชนิดหัวเลนส์วัตถุ", type: "select", options: [
        { val: "dry_40x", text: "40× Dry Objective (NA = 0.65, n = 1.00)" },
        { val: "oil_100x", text: "100× Oil Immersion (NA = 1.25, n = 1.515)" },
        { val: "high_oil", text: "100× Research High NA (NA = 1.40, n = 1.518)" }
      ]},
      { id: "wavelength_nm", label: "ความยาวคลื่นแสง λ (nm)", min: 400, max: 700, step: 50, default: 550, unit: "nm" },
      { id: "oil_applied", label: "การหยดน้ำมัน Immersion Oil", type: "select", options: [
        { val: "yes", text: "หยดน้ำมันดัชนีหักเห n = 1.515 ถูกต้อง" },
        { val: "no", text: "ไม่หยดน้ำมัน (มีชั้นอากาศ n = 1.00 กั้น)" }
      ]}
    ],
    calcPhysics: function(p) {
      let baseNA = p.lens_type === "dry_40x" ? 0.65 : (p.lens_type === "oil_100x" ? 1.25 : 1.40);
      let actualNA = (p.lens_type !== "dry_40x" && p.oil_applied === "no") ? 0.85 : baseNA;
      let d_nm = (0.61 * p.wavelength_nm) / actualNA;
      let canResolveBacteria = d_nm < 300;
      return {
        d_limit: d_nm.toFixed(1) + " nm",
        na_val: actualNA.toFixed(2),
        resolution_status: canResolveBacteria ? "คมชัดสูง แยกโครงสร้างแบคทีเรียได้" : "ภาพเบลอมัวจากการสูญเสียแสงหักเห",
        light_collection: (Math.pow(actualNA, 2) * 50).toFixed(0) + " %"
      };
    },
    tableCols: ["Trial", "หัวเลนส์", "การหยดน้ำมัน", "ความยาวคลื่น (nm)", "NA ประสิทธิผล", "ระยะแยกชัด d (nm)"],
    defaultTrials: [
      { trial: 1, p1: "40x Dry", p2: "ไม่ต้องใช้", p3: 550, p4: "0.65", err: "516.2" },
      { trial: 2, p1: "100x Oil", p2: "หยดน้ำมัน n=1.515", p3: 550, p4: "1.25", err: "268.4" },
      { trial: 3, p1: "100x Oil", p2: "ลืมหยดน้ำมัน", p3: 550, p4: "0.85", err: "394.7" }
    ],
    quiz: [
      { q: "การหยดน้ำมัน Immersion Oil (n = 1.515) ช่วยเพิ่มความคมชัดและกำลังแยกภาพของเลนส์ 100x ได้อย่างไร?", opts: ["ดัชนีหักเหน้ำมันเท่ากับกระจกสไลด์ ป้องกันแสงหักเหสูญเสียออกนอกเลนส์ ทำให้ค่า NA สูงขึ้น", "ขยายภาพเพิ่มเป็น 200 เท่า", "ทำให้เลนส์เย็นลง", "ย้อมสีแบคทีเรียโดยตรง"], ans: 0 },
      { q: "ตามเกณฑ์ของแอบบี (Abbe criterion) เพื่อให้มองเห็นโครงสร้างขนาดเล็กที่สุดได้ชัดเจน ควรใช้แสงสีใด?", opts: ["แสงสีน้ำเงิน (ความยาวคลื่นสั้น d จะมีค่าน้อย)", "แสงสีแดง (ความยาวคลื่นยาว)", "แสงอินฟราเรด", "แสงสีเหลือง"], ans: 0 },
      { q: "หากใช้เลนส์ 100x Oil แต่ลืมหยดน้ำมัน ภาพที่ได้จะมีลักษณะอย่างไร?", opts: ["มัว เบลอ ขาดความคมชัด และความสว่างลดลงอย่างมาก", "ภาพจะคมชัดขึ้น", "ไม่มีแสงเข้าสู่ตาเลย", "ภาพกลับหัว"], ans: 0 }
    ]
  },

  lab11: {
    id: "lab11",
    num: 11,
    badge: "Lab 11",
    titleTh: "กัมมันตภาพรังสี การสลายตัว และการฉายรังสี UV-C ฆ่าเชื้อ",
    titleEn: "Nuclear Physics, Half-life & UV-C Disinfection Kinetics",
    category: "ฟิสิกส์นิวเคลียร์และรังสีชีวภาพ",
    icon: "fa-solid fa-radiation",
    instrument: "UV-C Biosafety Chamber & Radiation Counter 3D",
    description: "การสลายตัวของกัมมันตรังสี กฎกำลังสองผกผัน การลดทอนของแผ่นกำบังตะกั่ว และค่าปริมาณรังสีทำลายเชื้อจุลินทรีย์ (D10 Value) ด้วยรังสีแกมมา Co-60 และหลอด UV-C 254 nm",
    formulaLatex: "I = \\\\frac{P}{4 \\\\pi r^2}, \\\\quad N(t) = N_0 e^{-\\\\lambda t}, \\\\quad I = I_0 e^{-\\\\mu x}",
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
      let I_0 = isCo60 ? 5000 : 800;
      let r_factor = Math.pow(30 / p.distance_cm, 2);
      let mu = isCo60 ? 0.08 : 0.45;
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

  lab12: {
    id: "lab12",
    num: 12,
    badge: "Lab 12",
    titleTh: "การดูดกลืนแสง สเปกโทรโฟโตเมตรี และกราฟการเจริญเติบโต OD600",
    titleEn: "Spectrophotometry, Beer-Lambert Law & Bacterial OD600 Growth Curve",
    category: "สเปกโทรโฟโตเมตรีและจลนพลศาสตร์เซลล์",
    icon: "fa-solid fa-chart-line",
    instrument: "UV-Vis Spectrophotometer 600 nm & Cuvette Stage 3D",
    description: "กฎของเบียร์-แลมเบิร์ต A = ε b c = -log10(T) การวัดความขุ่นของสารแขวนลอยแบคทีเรียที่ความยาวคลื่น 600 nm และการสร้างกราฟการเจริญเติบโตเพื่อหาอัตราการแบ่งเซลล์",
    formulaLatex: "A = \\\\varepsilon b c = -\\\\log_{10}(T), \\\\quad N(t) = N_0 \\\\cdot 2^{t/g}, \\\\quad \\\\mu = \\\\frac{\\\\ln(OD_2) - \\\\ln(OD_1)}{t_2 - t_1}",
    formulaDesc: "ค่าการดูดกลืนแสงแปรผันตรงกับความเข้มข้นเซลล์แบคทีเรียในช่วงลิเนียร์ (OD 0.1–0.8) และจำนวนเซลล์เพิ่มขึ้นแบบเอกซ์โพเนนเชียลในช่วง Log phase",
    params: [
      { id: "growth_time_hr", label: "เวลาเพาะเลี้ยงเซลล์ (ชั่วโมง)", min: 0.0, max: 12.0, step: 0.5, default: 4.0, unit: "ชม." },
      { id: "pathlength_cm", label: "ความกว้างคิวเวตต์ b (cm)", min: 0.5, max: 2.0, step: 0.5, default: 1.0, unit: "cm" },
      { id: "dilution_factor", label: "อัตราส่วนการเจือจาง", type: "select", options: [
        { val: "undiluted", text: "ไม่เจือจาง (1:1)" },
        { val: "dil_1_5", text: "เจือจาง 1:5 (เหมาะเมื่อ OD > 1.0)" },
        { val: "dil_1_10", text: "เจือจาง 1:10" }
      ]}
    ],
    calcPhysics: function(p) {
      let t = p.growth_time_hr;
      let lag = 1.5;
      let mu = 0.693 / 0.5; // doubling time 30 min
      let baseOD = 0.05;
      let rawOD = t < lag ? baseOD : baseOD * Math.exp(mu * (t - lag) * 0.35);
      rawOD = Math.min(rawOD, 3.2); // plateau
      let dil = p.dilution_factor === "undiluted" ? 1.0 : (p.dilution_factor === "dil_1_5" ? 5.0 : 10.0);
      let measuredOD = rawOD / dil;
      let isLinear = measuredOD >= 0.05 && measuredOD <= 0.85;
      let cellDensity = rawOD * 8e8; // cells/mL
      return {
        measured_od: measuredOD.toFixed(3) + " AU",
        actual_od: rawOD.toFixed(3) + " AU",
        cell_density: cellDensity.toExponential(2) + " เซลล์/mL",
        accuracy_eval: isLinear ? "อยู่ในช่วงลิเนียร์แม่นยำ (0.1–0.8)" : "อยู่นอกช่วงลิเนียร์ ควรเจือจางตัวอย่าง"
      };
    },
    tableCols: ["Trial", "เวลาเพาะเลี้ยง (ชม.)", "การเจือจาง", "OD600 วัดได้", "OD600 จริง", "ความหนาแน่นเซลล์ (เซลล์/mL)"],
    defaultTrials: [
      { trial: 1, p1: 1.0, p2: "ไม่เจือจาง", p3: "0.050", p4: "0.050", err: "4.0 × 10⁷" },
      { trial: 2, p1: 4.0, p2: "ไม่เจือจาง", p3: "0.412", p4: "0.412", err: "3.3 × 10⁸" },
      { trial: 3, p1: 8.0, p2: "เจือจาง 1:5", p3: "0.480", p4: "2.400", err: "1.9 × 10⁹" }
    ],
    quiz: [
      { q: "เหตุใดในการวัดการเจริญเติบโตของแบคทีเรียด้วยสเปกโทรโฟโตมิเตอร์ จึงนิยมใช้ความยาวคลื่น 600 nm (OD600)?", opts: ["เป็นความยาวคลื่นที่เซลล์แบคทีเรียกระเจิงแสงได้ดีและอาหารเลี้ยงเชื้อดูดกลืนแสงน้อย", "เป็นสีที่แบคทีเรียชอบ", "เพราะให้พลังงานความร้อนสูง", "เพราะเป็นแสงอัลตราไวโอเลต"], ans: 0 },
      { q: "หากตัวอย่างน้ำเลี้ยงเชื้อมีความขุ่นสูงมากจนวัดค่า OD600 ได้ 1.85 AU ควรดำเนินการอย่างไรเพื่อให้ได้ค่าที่แม่นยำตามกฎของเบียร์-แลมเบิร์ต?", opts: ["เจือจางตัวอย่าง (เช่น 1:5 หรือ 1:10) ให้ค่าอ่านอยู่ในช่วง 0.1–0.8 แล้วนำมาคูณค่าเจือจางกลับ", "ใช้ค่า 1.85 โดยตรงได้เลย", "เปลี่ยนความยาวคลื่นเป็น 200 nm", "ทิ้งตัวอย่าง"], ans: 0 },
      { q: "ความสัมพันธ์ระหว่างค่าการดูดกลืนแสง (A) และค่าการส่องผ่านของแสง (T) คือข้อใด?", opts: ["A = -log₁₀(T)", "A = T × 100", "A = 1 / T²", "A = log₁₀(1 - T)"], ans: 0 }
    ]
  },

  lab13: {
    id: "lab13",
    num: 13,
    badge: "Lab 13",
    titleTh: "โครงงานย่อยบูรณาการ (Capstone Mini-Project): เครื่องมือชีวฟิสิกส์อัจฉริยะ",
    titleEn: "Capstone Mini-Project: Smart Biophysical IoT Rig",
    category: "โครงงานนวัตกรรมบูรณาการ",
    icon: "fa-solid fa-microchip",
    instrument: "Virtual Instrument Sandbox & IoT Optical Sensor Rig",
    description: "การบูรณาการองค์ความรู้ฟิสิกส์ 12 บทเรียน สู่การออกแบบระบบวัดหรือเซนเซอร์ตรวจสอบจุลินทรีย์อัจฉริยะ พร้อมการประเมินรูบริก 4 มิติ",
    formulaLatex: "\\\\text{Score} = 0.30 \\\\cdot \\\\text{Theory} + 0.30 \\\\cdot \\\\text{Precision} + 0.20 \\\\cdot \\\\text{Innovation} + 0.20 \\\\cdot \\\\text{Q&A}",
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
"""
    with open(labs_cfg_path, "w", encoding="utf-8") as f:
        f.write(config_js)
    print("  -> labs_config.js successfully generated.")

if __name__ == "__main__":
    update_sqlite()
    update_app_controller()
    update_sim3d_engine()
    build_labs_config_js()
    print("ALL VIRTUAL LAB COMPONENTS SYNCHRONIZED SUCCESSFULLY!")

