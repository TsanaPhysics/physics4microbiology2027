#!/usr/bin/env python3
"""
build_chapter_page.py — สร้างหน้าเว็บ chapters/chNN_th.php จาก data/maintex/chNN.json
รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (OBE Aligned 2027)

Usage:
  python3 tools/build_chapter_page.py 5    # สร้างเฉพาะบทที่ 5 (Pilot)
  python3 tools/build_chapter_page.py all  # สร้างทุกบท
"""
import json
import os
import sys

HERE = os.path.dirname(os.path.abspath(__file__))
WEB = os.path.dirname(HERE)
DATA_DIR = os.path.join(WEB, "data", "maintex")
CH_DIR = os.path.join(WEB, "chapters")
MAP_FILE = os.path.join(WEB, "data", "curriculum_map.json")

MODULE_ENGLISH = {
    1: "UNITS & METROLOGY",
    2: "VECTORS & MOTION IN FLUID",
    3: "NEWTON LAWS & VISCOSITY",
    4: "WORK, ENERGY & CENTRIFUGE",
    5: "HEAT & INCUBATOR STABILITY",
    6: "THERMODYNAMICS & AUTOCLAVE",
    7: "ELECTROSTATICS & GRAM STAIN",
    8: "CURRENT, OHM & ELECTROPHORESIS",
    9: "OPTICS & REFRACTOMETRY",
    10: "MICROSCOPY & IMMERSION OIL",
    11: "RADIOACTIVITY & UV-C STERILIZATION",
    12: "SPECTROPHOTOMETRY & MINI-PROJECT"
}

def render_chapter(num):
    json_path = os.path.join(DATA_DIR, f"ch{num:02d}.json")
    if not os.path.exists(json_path):
        print(f"Error: {json_path} not found")
        return

    with open(json_path, "r", encoding="utf-8") as f:
        data = json.load(f)

    with open(MAP_FILE, "r", encoding="utf-8") as f:
        cmap = json.load(f)

    ch_list = cmap["chapters"]
    prev_ch = next((c for c in ch_list if c["num"] == num - 1), None)
    next_ch = next((c for c in ch_list if c["num"] == num + 1), None)

    # Replace {BASE} with relative path '../'
    def fix_base(html_str):
        return html_str.replace("{BASE}", "../")

    title = data["title"]
    eng_sub = MODULE_ENGLISH.get(num, f"MODULE {num:02d}")
    aruco_id = data.get("aruco_id", num - 1)
    week = data.get("week", num)

    # Render sections
    sections_html = []
    for s in data["sections"]:
        s_title = s["title"]
        s_body = fix_base(s["html"])
        sections_html.append(f"""
        <!-- Section: {s_title} -->
        <section class="tex-section my-10">
            <h2 class="tex-h2">{s_title}</h2>
            <div class="tex-article leading-relaxed">
                {s_body}
            </div>
        </section>
        """)

    # Render questions if present
    questions_html = ""
    if data.get("questions"):
        q_title = data["questions"]["title"]
        q_body = fix_base(data["questions"]["html"])
        questions_html = f"""
        <!-- End of Chapter Review Questions -->
        <section class="mt-14 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-slate-900 via-slate-950 to-indigo-950/40 border border-indigo-500/30 shadow-2xl">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center font-bold text-lg border border-indigo-500/30">
                    <i class="fa-solid fa-circle-question"></i>
                </div>
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-white">{q_title}</h3>
                    <p class="text-xs text-slate-400 font-mono">ทบทวนแนวคิดหลักและการคำนวณเบื้องต้นก่อนทำปฏิบัติการ</p>
                </div>
            </div>
            <div class="tex-article text-slate-200">
                {q_body}
            </div>
        </section>
        """

    # Render Planbox
    plan_html = ""
    if data.get("plan"):
        p_title = data["plan"]["title"]
        p_body = fix_base(data["plan"]["html"])
        plan_html = f"""
        <!-- Curriculum Planbox (แผนบริหารการสอน) -->
        <div class="p-6 md:p-8 rounded-2xl bg-gradient-to-br from-indigo-500/10 via-slate-800/40 to-slate-900 border border-indigo-500/30 shadow-xl mb-12">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                    <i class="fa-solid fa-chalkboard-user text-lg"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-white">{p_title}</h3>
                    <p class="text-xs text-slate-400 font-mono">แผนการจัดการเรียนรู้บูรณาการ OBE มคอ.3 พ.ศ. 2569/2570</p>
                </div>
            </div>
            <div class="tex-article text-sm text-slate-300">
                {p_body}
            </div>
        </div>
        """

    # Navigation Footer (Previous / Next)
    prev_link = f"""
        <a href="ch{prev_ch['num']:02d}_th.php" class="px-5 py-2.5 rounded-xl bg-slate-800/80 hover:bg-slate-700 text-slate-300 text-xs font-mono transition-colors flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> บทที่ {prev_ch['num']}: {prev_ch['title']}
        </a>
    """ if prev_ch else "<div></div>"

    next_link = f"""
        <a href="ch{next_ch['num']:02d}_th.php" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-indigo-600 hover:from-sky-400 hover:to-indigo-500 text-white font-bold text-xs font-mono transition-all flex items-center gap-2 shadow-lg shadow-sky-500/20">
            บทที่ {next_ch['num']}: {next_ch['title']} <i class="fas fa-arrow-right"></i>
        </a>
    """ if next_ch else "<div></div>"

    # Associated lab link
    lab_links = []
    for l in cmap["labs"]:
        if l["chapter"] == num:
            lab_links.append(f"""
                <a href="../{l['file']}" class="px-4 py-2 rounded-xl bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/40 text-xs font-bold font-mono transition flex items-center gap-2 shadow-lg shadow-emerald-950/40">
                    <i class="fa-solid fa-flask-vial"></i> <span>เข้าสู่ Lab {l['num']:02d}: {l['title']}</span>
                </a>
            """)
    labs_html = "".join(lab_links)

    content = f"""<?php
$pageTitle = "บทที่ {num}: {title}";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-24 text-slate-100" style="background:#020617;">
    <!-- Hero Banner Section -->
    <section class="relative text-white overflow-hidden border-b border-slate-800/80" style="background: radial-gradient(circle at 50% 20%, #1e293b 0%, #020617 85%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#38bdf8_1px,transparent_1px)] [background-size:24px_24px]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center max-w-4xl">
            <!-- Breadcrumbs -->
            <nav class="flex justify-center items-center flex-wrap gap-2 text-xs text-slate-400 mb-4 font-mono">
                <a href="../../index.php" class="text-cyan-400 hover:text-cyan-300 font-bold transition-colors flex items-center gap-1.5">
                    <i class="fas fa-house"></i> พอร์ทัลหลัก 2027
                </a>
                <span class="text-slate-600">/</span>
                <a href="../index.php" class="hover:text-amber-400 transition-colors flex items-center gap-1">
                    <i class="fas fa-book-open"></i> สารบัญ 12 บทเรียน
                </a>
                <span class="text-slate-600">/</span>
                <span class="px-2 py-0.5 rounded-md bg-amber-500/20 text-amber-300 font-bold border border-amber-500/40">บทที่ {num}</span>
            </nav>
            <span class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-indigo-400 font-mono text-xs mb-4 border border-indigo-500/30 bg-indigo-500/10 tracking-widest uppercase shadow-lg shadow-indigo-500/10">
                <i class="fas fa-atom text-xs"></i> MODULE {num:02d} &bull; {eng_sub}
            </span>
            <h1 class="text-3xl md:text-5xl font-black mb-4 leading-tight tracking-tight text-white">
                {title}
            </h1>
            <p class="text-base md:text-lg text-slate-300 max-w-2xl mx-auto font-light leading-relaxed">
                เอกสารคำสอนมาตรฐานฉบับ 3D AR ArUco &bull; รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (สัปดาห์ที่ {week})
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-3 text-xs text-slate-300 font-mono">
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-clock text-amber-400"></i> บรรยาย 2 ชม. + แล็บ 3 ชม.
                </span>
                <span class="px-3 py-1.5 rounded-lg bg-slate-800/80 border border-slate-700/60 flex items-center gap-1.5">
                    <i class="fas fa-calendar-week text-emerald-400"></i> สัปดาห์ที่ {week}
                </span>
                <a href="../webar/ar_aruco_textbook.html?id={aruco_id}&ar=1" target="_blank" class="px-3 py-1.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-400/40 text-cyan-300 flex items-center gap-1.5 transition">
                    <i class="fas fa-cube text-cyan-400"></i> 3D WebAR ArUco ID: {aruco_id} ↗
                </a>
            </div>
            <div class="mt-4 flex flex-wrap justify-center gap-3">
                {labs_html}
            </div>
        </div>
    </section>

    <!-- Main Container -->
    <div class="container mx-auto px-4 md:px-6 -mt-8 relative z-20 max-w-5xl">
        <div class="rounded-3xl shadow-2xl overflow-hidden border p-6 md:p-12 bg-slate-900/95 backdrop-blur-3xl border-slate-800 space-y-10">

            {plan_html}

            {"".join(sections_html)}

            {questions_html}

            <!-- Chapter Navigation Footer -->
            <div class="pt-8 border-t border-slate-800 flex justify-between items-center flex-wrap gap-4">
                {prev_link}
                {next_link}
            </div>

        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
"""

    out_file = os.path.join(CH_DIR, f"ch{num:02d}_th.php")
    with open(out_file, "w", encoding="utf-8") as fp:
        fp.write(content)
    print(f"Generated: {out_file} ({len(content)} bytes)")


if __name__ == "__main__":
    if len(sys.argv) > 1 and sys.argv[1] == "all":
        for i in range(1, 13):
            render_chapter(i)
    elif len(sys.argv) > 1:
        render_chapter(int(sys.argv[1]))
    else:
        render_chapter(5)

