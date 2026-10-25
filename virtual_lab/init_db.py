#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Database Initialization Script for Virtual Physics for Microbiology Laboratory
Supports Dual-Backend Architecture (SQLite3 + PHP/Python + Client Offline Storage)
"""
import os
import sqlite3
import json
from datetime import datetime

DB_PATH = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'database', 'virtual_lab.db')

def init_database():
    os.makedirs(os.path.dirname(DB_PATH), exist_ok=True)
    conn = sqlite3.connect(DB_PATH)
    cur = conn.cursor()

    # 1. Students Table
    cur.execute("""
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_id TEXT UNIQUE NOT NULL,
        prefix TEXT DEFAULT '',
        fullname TEXT NOT NULL,
        program TEXT DEFAULT 'จุลชีววิทยา',
        faculty TEXT DEFAULT 'คณะวิทยาศาสตร์และเทคโนโลยี',
        university TEXT DEFAULT 'มหาวิทยาลัยราชภัฏรำไพพรรณี',
        section TEXT DEFAULT 'Sec 01',
        email TEXT,
        phone TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_active TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    """)

    # 2. Labs Catalog Table
    cur.execute("""
    CREATE TABLE IF NOT EXISTS labs_catalog (
        lab_id TEXT PRIMARY KEY,
        lab_number INTEGER NOT NULL,
        title_th TEXT NOT NULL,
        title_en TEXT NOT NULL,
        category TEXT NOT NULL,
        clo_alignment TEXT,
        target_tool TEXT,
        theory_summary TEXT,
        config_json TEXT
    );
    """)

    # 3. Lab Telemetry Logs (Raw trials from 3D instruments)
    cur.execute("""
    CREATE TABLE IF NOT EXISTS lab_telemetry_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_id TEXT NOT NULL,
        lab_id TEXT NOT NULL,
        trial_number INTEGER DEFAULT 1,
        telemetry_json TEXT NOT NULL,
        logged_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES students(student_id)
    );
    """)

    # 4. Lab Reports Table (Submitted lab reports & evaluations)
    cur.execute("""
    CREATE TABLE IF NOT EXISTS lab_reports (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        report_code TEXT UNIQUE NOT NULL,
        student_id TEXT NOT NULL,
        lab_id TEXT NOT NULL,
        table_data_json TEXT NOT NULL,
        error_percentage REAL DEFAULT 0.0,
        r_squared REAL DEFAULT 0.0,
        post_quiz_score INTEGER DEFAULT 0,
        post_quiz_total INTEGER DEFAULT 3,
        quiz_answers_json TEXT,
        conclusion TEXT,
        discussion TEXT,
        accuracy_score REAL DEFAULT 100.0,
        instructor_score REAL DEFAULT NULL,
        instructor_feedback TEXT DEFAULT '',
        status TEXT DEFAULT 'submitted',
        submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES students(student_id)
    );
    """)

    # 5. Admin Users Table
    cur.execute("""
    CREATE TABLE IF NOT EXISTS admin_users (
        username TEXT PRIMARY KEY,
        password TEXT NOT NULL,
        fullname TEXT NOT NULL,
        role TEXT DEFAULT 'instructor'
    );
    """)

    # Seed Admin User: admin / LEQs
    cur.execute("""
    INSERT OR REPLACE INTO admin_users (username, password, fullname, role)
    VALUES ('admin', 'LEQs', 'ผศ.ดร.ชีวะ ทัศนา (อาจารย์ผู้สอน)', 'instructor');
    """)

    # Seed 13 Labs Metadata
    labs_data = [
        ("lab01", 1, "การวัดพื้นฐานและการตรวจสอบความแม่นยำของไมโครปิเปต P1000", "Basic Measurement & P1000 Micropipette Gravimetric Calibration", "Measurement", "CLO1, CLO3, CLO4", "P1000 Micropipette + Analytical Balance", "การสอบเทียบความแม่นยำของไมโครปิเปตด้วยหลักการชั่งน้ำหนักน้ำบริสุทธิ์ (rho = 1.0000 g/mL)"),
        ("lab02", 2, "การเคลื่อนที่ของแบคทีเรียและการจำลอง Brownian Motion 3 มิติ", "Microbial Motility & 3D Brownian Motion Simulation", "Mechanics", "CLO2, CLO3", "3D Motility Stage + Particle Tracker", "การจำลองการชนระดับโมเลกุลและการแพร่ตามสมการไอน์สไตน์-สโมลูโฮฟสกี <r^2> = 6Dt"),
        ("lab03", 3, "กฎของนิวตัน ความหนืด และอัตราการตกตะกอนตามกฎของสโตกส์", "Newton's Laws, Fluid Viscosity & Stokes Sedimentation", "Fluids", "CLO2, CLO4", "Viscometer & Stokes Fall Tube", "การคำนวณแรงต้านและความหนืดต่ออนุภาคเซลล์จุลินทรีย์ v_t = 2r^2(rho_p - rho_f)g / (9eta)"),
        ("lab04", 4, "การอนุรักษ์พลังงานและการคำนวณ RCF (xg) ของเครื่องปั่นเหวี่ยง", "Energy Conservation & Centrifuge RCF Rotor Balancing", "Mechanics", "CLO2, CLO3", "3D High-Speed Centrifuge + Rotor Balancer", "ความสัมพันธ์ระหว่างความเร็วรอบ (RPM) และแรงหนีศูนย์กลางสัมพัทธ์ RCF = 1.118x10^-5 x r x RPM^2"),
        ("lab05", 5, "ความร้อนจำเพาะและเสถียรภาพทางความร้อนของระบบบ่มเชื้อ & PCR", "Specific Heat & Thermal Stability of Incubator and PCR", "Thermodynamics", "CLO2, CLO4", "3D Incubator & PCR Thermal Cycler", "วงจรวัฏจักรความร้อน 3 ขั้นตอน (Denaturation, Annealing, Extension) และสมการความร้อน Q = mcDeltaT"),
        ("lab06", 6, "ความดันไอ จุดเดือด และความปลอดภัยของหม้อนึ่งความดันไอ (Autoclave)", "Vapor Pressure, Boiling Point & Autoclave Sterilization Safety", "Thermodynamics", "CLO2, CLO3", "3D Digital Autoclave 121 C / 15 psi", "ฟิสิกส์ของไอน้ำอิ่มตัวที่ 15 psi (121 องศาเซลเซียส) และ 3 กรณีศึกษาความปลอดภัยในห้องแล็บ"),
        ("lab07", 7, "ไฟฟ้าสถิต แรงคูลอมบ์ และศักย์ซีตาในการย้อมสีแกรม", "Electrostatics, Coulomb Force & Zeta Potential in Gram Stain", "Electricity", "CLO1, CLO2", "Gram Staining Chamber & Electrostatic Dipole", "อันตรกิริยาทางไฟฟ้าระหว่างโมเลกุลสีย้อมประจุบวกกับผนังเซลล์เพปทิโดไกลแคน"),
        ("lab08", 8, "กฎของโอห์ม มัลติมิเตอร์ และการจำลอง Gel Electrophoresis 3 มิติ", "Ohm's Law, Multimeter & 3D Agarose Gel Electrophoresis", "Electricity", "CLO2, CLO3", "3D Gel Electrophoresis Tank & DC Power Supply", "กฎของโอห์ม V = IR, กำลังไฟฟ้า P = VI, และความเร็วการเคลื่อนที่ของดีเอ็นเอ v = mu x E"),
        ("lab09", 9, "การสะท้อน การหักเหของแสง และคุณสมบัติของเลนส์นูน", "Light Reflection, Snell's Law Refraction & Thin Lens", "Optics", "CLO1, CLO2", "3D Optical Bench & Refraction Prism", "กฎของสเนลล์ n1 sin(theta1) = n2 sin(theta2) และสมการช่างทำเลนส์ 1/f = 1/s + 1/s'"),
        ("lab10", 10, "ฟิสิกส์ของกล้องจุลทรรศน์ การใช้ Immersion Oil และการวัดขนาดเซลล์", "Microscope Physics, Immersion Oil & Cell Micrometry", "Optics", "CLO2, CLO3, CLO4", "3D Compound Microscope 100x & Micrometer", "การเพิ่มค่า Numerical Aperture (NA) ด้วยน้ำมันระเหยยาก n = 1.515 เพื่อเพิ่มกำลังแยกชัด Limit of Resolution d = 0.61lambda/NA"),
        ("lab11", 11, "การลดลงแบบเอกซ์โพเนนเชียลและกฎกำลังสองผกผันของหลอดฆ่าเชื้อ UV-C", "Exponential Decay & Inverse-Square Law of UV-C Lamps", "Modern Physics", "CLO2, CLO3", "3D Biosafety Cabinet UV-C Rig", "ความเข้มแสงตามระยะทาง I = P / (4pi r^2) และการทำลายพันธะดีเอ็นเอไทมีนไดเมอร์ตามเวลา"),
        ("lab12", 12, "สเปกโตรโฟโตมิเตอร์ กฎเบียร์-แลมเบิร์ต และกราฟมาตรฐานความขุ่น OD600", "Spectrophotometer, Beer-Lambert Law & OD600 Standard Curve", "Optics & Bio-Instrumentation", "CLO2, CLO3, CLO4", "3D UV-Vis Spectrophotometer & Cuvette Rack", "กฎของเบียร์-แลมเบิร์ต A = epsilon b c และการพล็อตกราฟมาตรฐานสร้างสมการเส้นตรง y = mx + c หาความเข้มข้นตัวอย่างปริศนา"),
        ("lab13", 13, "โครงงานย่อยบูรณาการ (Mini-Project): ฟิสิกส์ของเครื่องมือจุลชีววิทยาอัจฉริยะ", "Integrated Mini-Project: Physics of Smart Microbiological Tools", "Integration", "CLO1, CLO2, CLO3, CLO4", "Virtual Instrument Sandbox", "การวิเคราะห์และนำเสนอหลักฟิสิกส์เบื้องหลังเครื่องมือและเซนเซอร์ในงานจุลชีววิทยาสมัยใหม่")
    ]

    for item in labs_data:
        cur.execute("""
        INSERT OR REPLACE INTO labs_catalog (lab_id, lab_number, title_th, title_en, category, clo_alignment, target_tool, theory_summary)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?);
        """, item)

    # Seed demo students
    demo_students = [
        ("6604101001", "นาย", "กิตติพงษ์ สมบัติเจริญ", "จุลชีววิทยา", "คณะวิทยาศาสตร์และเทคโนโลยี", "มหาวิทยาลัยราชภัฏรำไพพรรณี", "Sec 01", "kittipong.s@rbru.ac.th", "081-234-5678"),
        ("6604101002", "นางสาว", "ชลธิชา สุขเกษม", "จุลชีววิทยา", "คณะวิทยาศาสตร์และเทคโนโลยี", "มหาวิทยาลัยราชภัฏรำไพพรรณี", "Sec 01", "chonthicha.s@rbru.ac.th", "082-345-6789"),
        ("6604101003", "นาย", "ธนกฤต วงศ์สว่าง", "จุลชีววิทยา", "คณะวิทยาศาสตร์และเทคโนโลยี", "มหาวิทยาลัยราชภัฏรำไพพรรณี", "Sec 01", "thanakrit.w@rbru.ac.th", "083-456-7890"),
        ("6604101004", "นางสาว", "พิมพ์ลภัส รุ่งเรือง", "จุลชีววิทยา", "คณะวิทยาศาสตร์และเทคโนโลยี", "มหาวิทยาลัยราชภัฏรำไพพรรณี", "Sec 02", "pimlapas.r@rbru.ac.th", "084-567-8901")
    ]

    for s in demo_students:
        cur.execute("""
        INSERT OR REPLACE INTO students (student_id, prefix, fullname, program, faculty, university, section, email, phone)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);
        """, s)

    # Seed demo submitted lab reports
    demo_reports = [
        ("REP-6604101001-LAB01", "6604101001", "lab01", json.dumps([
            {"trial": 1, "vol_uL": 100, "expected_g": 0.1000, "measured_g": 0.0998, "err_pct": 0.20},
            {"trial": 2, "vol_uL": 500, "expected_g": 0.5000, "measured_g": 0.5003, "err_pct": 0.06},
            {"trial": 3, "vol_uL": 1000, "expected_g": 1.0000, "measured_g": 1.0005, "err_pct": 0.05}
        ]), 0.10, 0.9998, 3, 3, json.dumps({"q1": "b", "q2": "c", "q3": "a"}),
        "จากการสอบเทียบไมโครปิเปต P1000 ที่ปริมาตร 100, 500 และ 1,000 ไมโครลิตร พบว่ามวลของน้ำบริสุทธิ์มีความสอดคล้องกับค่าทางทฤษฎี โดยมีความคลาดเคลื่อนเฉลี่ยเพียง 0.10% ซึ่งอยู่ในเกณฑ์มาตรฐาน ISO 8655 (< 1.0%)",
        "สาเหตุความคลาดเคลื่อนเล็กน้อยเกิดจากการเกาะของหยดน้ำที่ปลายทิป (tip wetting) และอุณหภูมิห้องแล็บ 25 องศาเซลเซียส ซึ่งความหนาแน่นน้ำอยู่ที่ประมาณ 0.997 g/mL เล็กน้อย",
        98.5, 9.8, "ผลการทดลองแม่นยำมาก เทคนิคการกดปิเปตและปล่อยลูกสูบสม่ำเสมอ"),

        ("REP-6604101001-LAB04", "6604101001", "lab04", json.dumps([
            {"rpm": 3000, "radius_cm": 10.0, "rcf_xg": 1006.2, "sample_state": "เริ่มตกตะกอน"},
            {"rpm": 6000, "radius_cm": 10.0, "rcf_xg": 4024.8, "sample_state": "ตกตะกอนสมบูรณ์"},
            {"rpm": 8000, "radius_cm": 10.0, "rcf_xg": 7155.2, "sample_state": "เพลเลตแน่นมาก"}
        ]), 0.00, 1.0000, 3, 3, json.dumps({"q1": "a", "q2": "d", "q3": "b"}),
        "เมื่อเพิ่มความเร็วรอบจาก 3,000 RPM เป็น 6,000 RPM ค่า RCF เพิ่มขึ้นเป็น 4 เท่าตามความสัมพันธ์กำลังสองของความเร็วเชิงมุม",
        "การถ่วงสมดุลโรเตอร์แบบตรงข้าม 180 องศาทำให้เครื่องทำงานนิ่ง ไร้การสั่นสะเทือน ลดการสึกหรอของแกนมอเตอร์",
        99.0, 10.0, "วิเคราะห์ผลและตอบคำถามท้ายแล็บถูกต้องครบถ้วน"),

        ("REP-6604101001-LAB12", "6604101001", "lab12", json.dumps([
            {"tube": "Blank", "conc_pct": 0, "od600": 0.000},
            {"tube": "Std 1", "conc_pct": 20, "od600": 0.185},
            {"tube": "Std 2", "conc_pct": 40, "od600": 0.370},
            {"tube": "Std 3", "conc_pct": 60, "od600": 0.552},
            {"tube": "Std 4", "conc_pct": 80, "od600": 0.741},
            {"tube": "Unknown", "conc_pct": 51.5, "od600": 0.476}
        ]), 0.45, 0.9995, 3, 3, json.dumps({"q1": "c", "q2": "b", "q3": "a"}),
        "กราฟมาตรฐานความขุ่น OD600 มีความเป็นเส้นตรงสูงมาก (R^2 = 0.9995) สอดคล้องตามกฎเบียร์-แลมเบิร์ต ตัวอย่าง Unknown อ่านค่า OD600 ได้ 0.476 คำนวณความเข้มข้นได้ 51.5%",
        "ข้อควรระวังสำคัญคือการเช็ดคิวเวตต์ด้วยกระดาษเช็ดเลนส์ไม่ให้มีรอยนิ้วมือหรือคราบของเหลว และตรวจสอบไม่ให้มีฟองอากาศขวางทางเดินแสง",
        97.5, 9.7, "กราฟมาตรฐานยอดเยี่ยม การคำนวณตัวอย่างปริศนาตรงเป๊ะ"),

        ("REP-6604101002-LAB01", "6604101002", "lab01", json.dumps([
            {"trial": 1, "vol_uL": 100, "expected_g": 0.1000, "measured_g": 0.0995, "err_pct": 0.50},
            {"trial": 2, "vol_uL": 500, "expected_g": 0.5000, "measured_g": 0.4990, "err_pct": 0.20},
            {"trial": 3, "vol_uL": 1000, "expected_g": 1.0000, "measured_g": 0.9985, "err_pct": 0.15}
        ]), 0.28, 0.9992, 3, 3, json.dumps({"q1": "b", "q2": "c", "q3": "a"}),
        "ไมโครปิเปตมีความแม่นยำสูง มวลน้ำที่ชั่งได้ใกล้เคียงค่าจริง ความคลาดเคลื่อนเฉลี่ย 0.28%",
        "การกดปิเปตลงไปยังจุดหยุดแรก (first stop) สำหรับการดูด และกดจนสุดจุดหยุดที่สอง (second stop) สำหรับการปล่อยน้ำ ช่วยให้ความแม่นยำคงที่",
        96.0, 9.5, "รายงานผลเรียบร้อย เข้าใจหลักการวัดเลขนัยสำคัญอย่างดี")
    ]

    for r in demo_reports:
        cur.execute("""
        INSERT OR REPLACE INTO lab_reports (
            report_code, student_id, lab_id, table_data_json, error_percentage, r_squared,
            post_quiz_score, post_quiz_total, quiz_answers_json, conclusion, discussion,
            accuracy_score, instructor_score, instructor_feedback
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
        """, r)

    conn.commit()
    conn.close()
    print(f"[OK] Database initialized successfully at: {DB_PATH}")

if __name__ == '__main__':
    init_database()
