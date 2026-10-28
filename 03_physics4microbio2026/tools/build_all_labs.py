#!/usr/bin/env python3
"""
build_all_labs.py — สร้างหน้าปฏิบัติการทั้ง 13 แล็บ (lab01 - lab13)
อ้างอิงเอกสารคำสอน main.tex และ curriculum_map.json
พร้อมสร้างระบบ Forwarding / Compatibility สำหรับชื่อไฟล์เก่า

Usage:  python3 tools/build_all_labs.py
"""
import json
import os
import re

HERE = os.path.dirname(os.path.abspath(__file__))
WEB = os.path.dirname(HERE)
DATA_DIR = os.path.join(WEB, "data", "maintex")
LABS_DIR = os.path.join(WEB, "labs")
MAP_FILE = os.path.join(WEB, "data", "curriculum_map.json")

LAB_CONFIG = {
    1: {
        "slug": "lab01_measurement",
        "ch": 1, "week": 1, "aruco": 0,
        "title": "การวัดละเอียดและทักษะการใช้ไมโครปิเปตและเครื่องชั่งดิจิทัล",
        "sim": "../simulations/sim_micropipette_3d.html",
        "badge": "Units & Metrology",
        "color": "from-sky-500 to-emerald-600",
        "border": "border-emerald-500/30",
        "old_file": "lab01_measurement.php"
    },
    2: {
        "slug": "lab02_brownian_motion",
        "ch": 2, "week": 2, "aruco": 1,
        "title": "การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion",
        "sim": "../simulations/sim02_brownian_motion_3d.html",
        "badge": "Brownian & Diffusion",
        "color": "from-amber-500 to-emerald-600",
        "border": "border-amber-500/30",
        "old_file": "lab02_vectors.php"
    },
    3: {
        "slug": "lab03_viscosity",
        "ch": 3, "week": 3, "aruco": 2,
        "title": "กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ",
        "sim": "../simulations/sim03_viscometer_3d.html",
        "badge": "Fluid Viscosity & Stokes",
        "color": "from-emerald-500 to-teal-600",
        "border": "border-emerald-500/30",
        "old_file": "lab03_motion.php"
    },
    4: {
        "slug": "lab04_centrifuge",
        "ch": 4, "week": 4, "aruco": 3,
        "title": "การอนุรักษ์พลังงานและการคำนวณ RCF เครื่อง Centrifuge",
        "sim": "../simulations/sim04_centrifuge_3d.html",
        "badge": "Centrifugation RCF",
        "color": "from-blue-500 to-indigo-600",
        "border": "border-blue-500/30",
        "old_file": "lab04_newton.php"
    },
    5: {
        "slug": "lab05_heat_incubator",
        "ch": 5, "week": 5, "aruco": 4,
        "title": "ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบ Incubator",
        "sim": "../simulations/sim05_incubator_3d.html",
        "badge": "Incubator & Specific Heat",
        "color": "from-amber-500 to-rose-600",
        "border": "border-amber-500/30",
        "old_file": "lab05_momentum.php"
    },
    6: {
        "slug": "lab06_autoclave",
        "ch": 6, "week": 6, "aruco": 5,
        "title": "ความดันไอ จุดเดือด และกรณีศึกษาการทำงานของ Autoclave",
        "sim": "../simulations/sim06_autoclave_3d.html",
        "badge": "Autoclave 121°C 15psi",
        "color": "from-rose-500 to-purple-600",
        "border": "border-rose-500/30",
        "old_file": "lab06_equilibrium.php"
    },
    7: {
        "slug": "lab07_gram_electrostatics",
        "ch": 7, "week": 8, "aruco": 6,
        "title": "ไฟฟ้าสถิตและกลไกประจุของสีย้อมเซลล์จุลินทรีย์",
        "sim": "../simulations/sim07_gram_stain_3d.html",
        "badge": "Gram Stain Electrostatics",
        "color": "from-purple-500 to-pink-600",
        "border": "border-purple-500/30",
        "old_file": "lab07_energy.php"
    },
    8: {
        "slug": "lab08_electrophoresis",
        "ch": 8, "week": 9, "aruco": 7,
        "title": "กฎของโอห์มและแบบจำลอง Gel Electrophoresis",
        "sim": "../simulations/sim10_electrophoresis_3d.html",
        "badge": "Gel Electrophoresis",
        "color": "from-cyan-500 to-blue-600",
        "border": "border-cyan-500/30",
        "old_file": "lab08_machines.php"
    },
    9: {
        "slug": "lab09_refraction",
        "ch": 9, "week": 10, "aruco": 8,
        "title": "การสะท้อนและการหักเหของแสงผ่านตัวกลางและสารละลาย",
        "sim": "../simulations/sim09_refraction_3d.html",
        "badge": "Snell's Law & Brix",
        "color": "from-amber-500 to-cyan-500",
        "border": "border-amber-500/30",
        "old_file": "lab09_heat.php"
    },
    10: {
        "slug": "lab10_microscope",
        "ch": 10, "week": 11, "aruco": 9,
        "title": "เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil",
        "sim": "../simulations/sim11_optics_3d.html",
        "badge": "Microscopy & Oil 100x",
        "color": "from-emerald-500 to-cyan-600",
        "border": "border-emerald-500/30",
        "old_file": "lab10_electricity.php"
    },
    11: {
        "slug": "lab11_radioactivity_uv",
        "ch": 11, "week": 12, "aruco": 10,
        "title": "การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV",
        "sim": "../simulations/sim12_radioactivity_3d.html",
        "badge": "Radioactivity & UV-C",
        "color": "from-purple-500 to-indigo-600",
        "border": "border-purple-500/30",
        "old_file": "lab11_optics.php"
    },
    12: {
        "slug": "lab12_od600",
        "ch": 12, "week": 13, "aruco": 11,
        "title": "การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญของจุลินทรีย์",
        "sim": "../simulations/sim12_od600_3d.html",
        "badge": "Spectrophotometry OD600",
        "color": "from-indigo-500 to-cyan-500",
        "border": "border-indigo-500/30",
        "old_file": "lab12_radioactivity.php"
    },
    13: {
        "slug": "lab13_mini_project",
        "ch": 12, "week": 14, "aruco": 11,
        "title": "โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา",
        "sim": None,
        "badge": "Capstone Mini-Project",
        "color": "from-emerald-500 to-teal-600",
        "border": "border-emerald-500/30",
        "old_file": None
    }
}

def build_lab(num):
    cfg = LAB_CONFIG[num]
    ch_num = cfg["ch"]
    ch_file = os.path.join(DATA_DIR, f"ch{ch_num:02d}.json")
    with open(ch_file, "r", encoding="utf-8") as f:
        ch_data = json.load(f)

    # find corresponding lab in ch_data
    lab_data = next((l for l in ch_data["labs"] if l["num"] == num), None)
    if not lab_data:
        lab_data = {"title": cfg["title"], "html": "<p>โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา</p>"}

    sim_viewport_html = ""
    if cfg["sim"]:
        sim_viewport_html = f"""
    <!-- Section 2: ห้องปฏิบัติการ 3D เสมือนจริง (Interactive Simulator Viewport) -->
    <section class="bg-slate-900/90 backdrop-blur-md rounded-2xl border border-sky-500/40 p-4 sm:p-6 mb-8 shadow-2xl">
        <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-gamepad text-sky-400"></i> 2. ห้องปฏิบัติการ 3D เสมือนจริง (Interactive 3D PBR)
                </h2>
                <p class="text-xs text-slate-400 font-mono">Three.js PBR Simulation &bull; ควบคุมตัวแปรแบบอินเทอร์แอคทีฟ</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{cfg['sim']}" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-sky-500/20 hover:bg-sky-500/30 text-sky-300 border border-sky-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-up-right-from-square"></i> <span>เปิดเต็มจอ ↗</span>
                </a>
                <a href="../webar/ar_aruco_textbook.html?lab={num}&ar=1" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-purple-600/30 hover:bg-purple-600/40 text-purple-200 border border-purple-500/40 transition flex items-center gap-1.5 shadow">
                    <i class="fa-solid fa-vr-cardboard"></i> <span>3D WebAR</span>
                </a>
            </div>
        </div>

        <!-- Simulator Iframe Container -->
        <div class="w-full h-[540px] sm:h-[620px] rounded-2xl overflow-hidden border border-slate-700/80 bg-slate-950 relative shadow-inner">
            <iframe id="simFrame" src="{cfg['sim']}" class="w-full h-full border-0" allow="camera; fullscreen; xr-spatial-tracking"></iframe>
        </div>
    </section>
        """

    # Lab inner content from LaTeX labbox
    lab_body_html = lab_data["html"].replace("{BASE}", "../")

    content = f"""<?php
$pageTitle = 'ปฏิบัติการที่ {num}: {cfg["title"]} | Lab {num:02d}';
$basePath = '../';
include '../includes/header.php';
?>

<!-- 🧭 Standardized Breadcrumb & Two-Way Course Navigation Bar -->
<div class="standardized-lab-breadcrumb max-w-7xl mx-auto px-4 sm:px-6 mb-6">
    <div class="flex flex-wrap items-center justify-between gap-3 bg-slate-900/90 border border-emerald-500/30 rounded-2xl px-5 py-3.5 shadow-2xl backdrop-blur-xl">
        <div class="flex items-center flex-wrap gap-2 text-xs font-mono text-slate-300">
            <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold flex items-center gap-1.5 transition">
                <i class="fa-solid fa-house"></i> พอร์ทัลหลัก 2027
            </a>
            <span class="text-slate-600">/</span>
            <a href="../index.php" class="text-amber-400 hover:text-amber-300 transition flex items-center gap-1 font-semibold">
                <i class="fa-solid fa-book-open"></i> สารบัญหลักสูตร
            </a>
            <span class="text-slate-600">/</span>
            <span class="px-2 py-0.5 rounded-md bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/40">LAB {num:02d}</span>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <a href="../chapters/ch{ch_num:02d}_th.php" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 border border-amber-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-book-bookmark"></i>
                <span>📖 อ่านทฤษฎีบทที่ {ch_num}</span>
            </a>
            <a href="../../virtual_lab/index.html?lab={num}" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-flask"></i>
                <span>🥽 Virtual Lab Hub</span>
            </a>
            <a href="../webar/ar_aruco_textbook.html?lab={num}&ar=1" target="_blank" class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-purple-500/20 hover:bg-purple-500/30 text-purple-300 border border-purple-500/40 transition flex items-center gap-1.5 shadow-md hover:scale-105">
                <i class="fa-solid fa-camera-rotate"></i>
                <span>📱 3D WebAR (Marker {cfg['aruco']})</span>
            </a>
        </div>
    </div>
</div>

<main class="font-sans antialiased min-h-screen pb-24 text-slate-100 max-w-7xl mx-auto px-4 sm:px-6">

    <!-- Lab Header Card -->
    <div class="bg-gradient-to-r from-slate-900 via-slate-950 to-indigo-950/40 border {cfg['border']} rounded-3xl p-6 sm:p-10 mb-8 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 mb-3">
                    <i class="fa-solid fa-flask-vial"></i> LAB {num:02d} &bull; สัปดาห์ที่ {cfg['week']} (3 ชั่วโมง)
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight mb-2">
                    {cfg['title']}
                </h1>
                <p class="text-slate-300 text-sm sm:text-base max-w-3xl leading-relaxed">
                    คู่มือปฏิบัติการมาตรฐาน &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (OBE มคอ.3 มรภ.รำไพพรรณี)
                </p>
            </div>
            <div class="flex flex-col sm:flex-row md:flex-col gap-2 shrink-0">
                <span class="px-4 py-2 rounded-xl bg-slate-800/80 border border-slate-700 text-xs font-mono text-slate-300 flex items-center gap-2">
                    <i class="fa-solid fa-clock text-amber-400"></i> ปฏิบัติการ 3 ชม.
                </span>
                <span class="px-4 py-2 rounded-xl bg-slate-800/80 border border-slate-700 text-xs font-mono text-emerald-400 flex items-center gap-2">
                    <i class="fa-solid fa-award"></i> CLO1 &bull; CLO2 &bull; CLO3 &bull; CLO4
                </span>
            </div>
        </div>
    </div>

    {sim_viewport_html}

    <!-- Section: รายละเอียดขั้นตอนการทดลองและตารางบันทึกผล (จากเอกสารคำสอน) -->
    <section class="bg-slate-900/80 backdrop-blur-md rounded-2xl border border-sky-500/30 p-6 sm:p-8 mb-8 shadow-xl">
        <h2 class="text-lg sm:text-xl font-bold text-sky-400 mb-4 flex items-center gap-2">
            <i class="fa-solid fa-clipboard-list"></i> ขั้นตอนการทดลองและบันทึกผลการทดลอง
        </h2>
        <div class="tex-article text-sm text-slate-200">
            {lab_body_html}
        </div>
    </section>

</main>

<?php include '../includes/footer.php'; ?>
"""

    out_file = os.path.join(LABS_DIR, f"{cfg['slug']}.php")
    with open(out_file, "w", encoding="utf-8") as fp:
        fp.write(content)
    print(f"Generated Lab: {out_file} ({len(content)} bytes)")

    # Create backwards compatibility forwarder if old filename differs
    old_file_name = cfg.get("old_file")
    if old_file_name and old_file_name != f"{cfg['slug']}.php":
        old_path = os.path.join(LABS_DIR, old_file_name)
        fwd_content = f"""<?php
// Backwards compatibility redirect for Lab {num:02d}
// Redirects to canonical: {cfg['slug']}.php
header("Location: {cfg['slug']}.php");
exit();
"""
        with open(old_path, "w", encoding="utf-8") as fp:
            fp.write(fwd_content)
        print(f"  -> Forwarder: {old_file_name} -> {cfg['slug']}.php")


def main():
    for num in sorted(LAB_CONFIG.keys()):
        build_lab(num)

if __name__ == "__main__":
    main()
