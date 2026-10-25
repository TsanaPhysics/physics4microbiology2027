#!/usr/bin/env python3
"""
Convert all chapter PHP files (ch02-ch12) to SciExHub 2026 template format.
Extracts content from existing files and rewrites them in the new template.
"""
import re
import os
import glob

CHAPTERS_DIR = "/Applications/XAMPP/xamppfiles/htdocs/new_book2026/physics4microbio2026/chapters"

# Chapter metadata
CHAPTERS = {
    "ch02_vectors.php": {
        "num": "2", "icon": "fas fa-vector-square",
        "title_th": "เวกเตอร์และการนำทาง", "title_en": "Vectors & Navigation", "title_zh": "向量与导航",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "จำแนกสเกลาร์กับเวกเตอร์ คำนวณการรวมเวกเตอร์ และประยุกต์ใช้กับอัลกอริทึม AI",
        "desc_en": "Distinguish scalars from vectors, compute resultant vectors, and apply to AI algorithms.",
        "color": "emerald",
        "prev": "ch01_unit_systems.php", "prev_th": "บทที่ 1", "prev_en": "Chapter 1",
        "next": "ch03_motion.php", "next_th": "บทถัดไป: การเคลื่อนที่", "next_en": "Next: Motion",
    },
    "ch03_motion.php": {
        "num": "3", "icon": "fas fa-running",
        "title_th": "การเคลื่อนที่", "title_en": "Motion", "title_zh": "运动",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "การเคลื่อนที่ในแนวตรง ความเร็ว ความเร่ง และสมการการเคลื่อนที่",
        "desc_en": "Linear motion, velocity, acceleration, and equations of motion.",
        "color": "emerald",
        "prev": "ch02_vectors.php", "prev_th": "บทที่ 2", "prev_en": "Chapter 2",
        "next": "ch04_newton_laws.php", "next_th": "บทถัดไป: กฎนิวตัน", "next_en": "Next: Newton's Laws",
    },
    "ch04_newton_laws.php": {
        "num": "4", "icon": "fas fa-apple-alt",
        "title_th": "กฎของนิวตัน", "title_en": "Newton's Laws", "title_zh": "牛顿定律",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "กฎการเคลื่อนที่ 3 ข้อของนิวตัน แรง มวล และการประยุกต์ใช้",
        "desc_en": "Newton's three laws of motion, force, mass, and applications.",
        "color": "emerald",
        "prev": "ch03_motion.php", "prev_th": "บทที่ 3", "prev_en": "Chapter 3",
        "next": "ch05_momentum.php", "next_th": "บทถัดไป: โมเมนตัม", "next_en": "Next: Momentum",
    },
    "ch05_momentum.php": {
        "num": "5", "icon": "fas fa-meteor",
        "title_th": "โมเมนตัมและการชน", "title_en": "Momentum & Collisions", "title_zh": "动量与碰撞",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "โมเมนตัม กฎอนุรักษ์ แรงกระตุ้น และการชนแบบต่างๆ",
        "desc_en": "Momentum, conservation law, impulse, and types of collisions.",
        "color": "emerald",
        "prev": "ch04_newton_laws.php", "prev_th": "บทที่ 4", "prev_en": "Chapter 4",
        "next": "ch06_equilibrium.php", "next_th": "บทถัดไป: สมดุล", "next_en": "Next: Equilibrium",
    },
    "ch06_equilibrium.php": {
        "num": "6", "icon": "fas fa-balance-scale",
        "title_th": "สมดุลกล", "title_en": "Equilibrium", "title_zh": "力学平衡",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "สมดุลของแรง ทอร์ก จุดศูนย์กลางมวล และเสถียรภาพ",
        "desc_en": "Force equilibrium, torque, center of mass, and stability.",
        "color": "emerald",
        "prev": "ch05_momentum.php", "prev_th": "บทที่ 5", "prev_en": "Chapter 5",
        "next": "ch07_work_energy.php", "next_th": "บทถัดไป: งานและพลังงาน", "next_en": "Next: Work & Energy",
    },
    "ch07_work_energy.php": {
        "num": "7", "icon": "fas fa-bolt",
        "title_th": "งานและพลังงาน", "title_en": "Work & Energy", "title_zh": "功与能量",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "งาน พลังงานจลน์ พลังงานศักย์ กฎอนุรักษ์พลังงาน และกำลัง",
        "desc_en": "Work, kinetic energy, potential energy, conservation of energy, and power.",
        "color": "emerald",
        "prev": "ch06_equilibrium.php", "prev_th": "บทที่ 6", "prev_en": "Chapter 6",
        "next": "ch08_simple_machines.php", "next_th": "บทถัดไป: เครื่องกล", "next_en": "Next: Simple Machines",
    },
    "ch08_simple_machines.php": {
        "num": "8", "icon": "fas fa-cogs",
        "title_th": "เครื่องกลอย่างง่าย", "title_en": "Simple Machines", "title_zh": "简单机械",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "คาน รอก พื้นเอียง ล้อและเพลา และการได้เปรียบทางกล",
        "desc_en": "Levers, pulleys, inclined planes, wheel and axle, and mechanical advantage.",
        "color": "emerald",
        "prev": "ch07_work_energy.php", "prev_th": "บทที่ 7", "prev_en": "Chapter 7",
        "next": "ch09_thermodynamics.php", "next_th": "บทถัดไป: อุณหพลศาสตร์", "next_en": "Next: Thermodynamics",
    },
    "ch09_thermodynamics.php": {
        "num": "9", "icon": "fas fa-thermometer-half",
        "title_th": "อุณหพลศาสตร์", "title_en": "Thermodynamics", "title_zh": "热力学",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "อุณหภูมิ ความร้อน กฎข้อที่ 1 และ 2 ของอุณหพลศาสตร์",
        "desc_en": "Temperature, heat, 1st and 2nd laws of thermodynamics.",
        "color": "emerald",
        "prev": "ch08_simple_machines.php", "prev_th": "บทที่ 8", "prev_en": "Chapter 8",
        "next": "ch10_electricity.php", "next_th": "บทถัดไป: ไฟฟ้า", "next_en": "Next: Electricity",
    },
    "ch10_electricity.php": {
        "num": "10", "icon": "fas fa-plug",
        "title_th": "ไฟฟ้าและแม่เหล็ก", "title_en": "Electricity & Magnetism", "title_zh": "电与磁",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "ประจุไฟฟ้า กระแสไฟฟ้า วงจร กฎของโอห์ม และแม่เหล็กไฟฟ้า",
        "desc_en": "Electric charge, current, circuits, Ohm's law, and electromagnetism.",
        "color": "emerald",
        "prev": "ch09_thermodynamics.php", "prev_th": "บทที่ 9", "prev_en": "Chapter 9",
        "next": "ch11_optics.php", "next_th": "บทถัดไป: ทัศนศาสตร์", "next_en": "Next: Optics",
    },
    "ch11_optics.php": {
        "num": "11", "icon": "fas fa-eye",
        "title_th": "ทัศนศาสตร์", "title_en": "Optics", "title_zh": "光学",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "แสง การสะท้อน การหักเห เลนส์ กระจก และกล้องจุลทรรศน์",
        "desc_en": "Light, reflection, refraction, lenses, mirrors, and microscopes.",
        "color": "emerald",
        "prev": "ch10_electricity.php", "prev_th": "บทที่ 10", "prev_en": "Chapter 10",
        "next": "ch12_radioactivity.php", "next_th": "บทถัดไป: กัมมันตภาพรังสี", "next_en": "Next: Radioactivity",
    },
    "ch12_radioactivity.php": {
        "num": "12", "icon": "fas fa-radiation",
        "title_th": "กัมมันตภาพรังสี", "title_en": "Radioactivity", "title_zh": "放射性",
        "subtitle_th": "ฟิสิกส์สำหรับจุลชีววิทยา 2026", "subtitle_en": "Physics for Microbiology 2026",
        "desc_th": "การสลายตัวของนิวเคลียส รังสีแอลฟา เบตา แกมมา ครึ่งชีวิต และการประยุกต์ใช้",
        "desc_en": "Nuclear decay, alpha/beta/gamma radiation, half-life, and applications.",
        "color": "emerald",
        "prev": "ch11_optics.php", "prev_th": "บทที่ 11", "prev_en": "Chapter 11",
        "next": None, "next_th": "กลับสารบัญ", "next_en": "Back to Contents",
    },
}

def extract_content_sections(filepath):
    """Extract text content sections from existing PHP file."""
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Extract all section content blocks with h2 headers
    sections = []
    # Pattern: find h2 tags and their content
    h2_pattern = re.compile(r'<h2[^>]*>(.*?)</h2>', re.DOTALL)
    h2_matches = list(h2_pattern.finditer(content))
    
    for match in h2_matches:
        raw = match.group(1)
        # Clean the text
        clean = re.sub(r'<[^>]+>', ' ', raw).strip()
        clean = re.sub(r'\s+', ' ', clean)
        if clean and len(clean) > 3:
            sections.append(clean)
    
    # Extract formula blocks
    formulas = []
    formula_pattern = re.compile(r'<strong>(.*?)</strong>', re.DOTALL)
    for m in formula_pattern.finditer(content):
        txt = m.group(1).strip()
        if '=' in txt and len(txt) < 80:
            formulas.append(txt)
    
    # Extract table rows
    tables = []
    tr_pattern = re.compile(r'<tr[^>]*>(.*?)</tr>', re.DOTALL)
    for m in tr_pattern.finditer(content):
        tds = re.findall(r'<td[^>]*>(.*?)</td>', m.group(1), re.DOTALL)
        if tds:
            row = [re.sub(r'<[^>]+>', '', td).strip() for td in tds]
            tables.append(row)
    
    # Extract exercise items
    exercises = []
    ex_pattern = re.compile(r'exercise-item.*?<p>(.*?)</p>', re.DOTALL)
    for m in ex_pattern.finditer(content):
        ex_text = re.sub(r'<[^>]+>', '', m.group(1)).strip()
        ex_text = re.sub(r'\s+', ' ', ex_text)
        if ex_text:
            exercises.append(ex_text)
    
    # Extract lang-block content pairs  
    lang_blocks = []
    lb_pattern = re.compile(
        r'<(?:span|div) class="lang-block" lang="th">(.*?)</(?:span|div)>.*?'
        r'<(?:span|div) class="lang-block" lang="en">(.*?)</(?:span|div)>',
        re.DOTALL
    )
    for m in lb_pattern.finditer(content):
        th = re.sub(r'<[^>]+>', '', m.group(1)).strip()
        en = re.sub(r'<[^>]+>', '', m.group(2)).strip()
        if th and en and len(th) > 10:
            lang_blocks.append((th, en))
    
    # Extract dual-track content
    tracks = []
    track_pattern = re.compile(r'track-card.*?track-card-title[^>]*>(.*?)</div>(.*?)</div>\s*</div>', re.DOTALL)
    for m in track_pattern.finditer(content):
        title = re.sub(r'<[^>]+>', '', m.group(1)).strip()
        body = re.sub(r'<[^>]+>', ' ', m.group(2)).strip()
        body = re.sub(r'\s+', ' ', body)
        if title:
            tracks.append((title, body[:200]))
    
    return {
        'sections': sections,
        'formulas': formulas[:5],  # max 5
        'tables': tables[:10],
        'exercises': exercises[:5],
        'lang_blocks': lang_blocks,
        'tracks': tracks,
    }


def generate_chapter(filename, meta, extracted):
    """Generate SciExHub-style chapter PHP file."""
    ch = meta
    num = ch['num']
    
    # Determine images directory
    img_dir = f"../images/ch{num.zfill(2)}"
    
    # Build sections HTML from extracted content
    sections_html = ""
    
    # Group lang_blocks into logical sections
    section_pairs = extracted['lang_blocks']
    
    # Build main content sections
    for i, (th, en) in enumerate(section_pairs[:6]):  # max 6 sections
        sec_num = f"{num}.{i+1}"
        sections_html += f"""
            <!-- Section {sec_num} -->
            <div class="mb-10">
                <h2 class="text-xl font-bold text-white mb-3" style="border-left:4px solid #10b981; padding-left:12px;">
                    <span class="lang-block" lang="th">{th[:80]}</span>
                    <span class="lang-block" lang="en">{en[:80]}</span>
                </h2>
                <p class="text-gray-400 leading-relaxed text-sm">
                    <span class="lang-block" lang="th">{th}</span>
                    <span class="lang-block" lang="en">{en}</span>
                </p>
            </div>
"""
    
    # Add formulas if any
    if extracted['formulas']:
        formulas_content = "<br>".join(extracted['formulas'][:3])
        sections_html += f"""
            <!-- Formulas -->
            <div class="mb-10">
                <h2 class="text-xl font-bold text-white mb-3" style="border-left:4px solid #10b981; padding-left:12px;">
                    <span class="lang-block" lang="th">สูตรสำคัญ</span>
                    <span class="lang-block" lang="en">Key Formulas</span>
                </h2>
                <div class="rounded-lg overflow-hidden shadow-lg" style="background:#0f172a;">
                    <div class="flex items-center justify-between px-4 py-2 border-b" style="background:rgba(255,255,255,0.05); border-color:rgba(255,255,255,0.1);">
                        <span class="text-gray-400 text-xs font-mono">formulas.py</span>
                        <div class="flex space-x-1.5">
                            <div class="w-2.5 h-2.5 rounded-full bg-red-500"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-yellow-500"></div>
                            <div class="w-2.5 h-2.5 rounded-full bg-green-500"></div>
                        </div>
                    </div>
                    <div class="p-5 text-center font-mono">
                        <div class="text-lg font-bold text-white mb-2">{formulas_content}</div>
                    </div>
                </div>
            </div>
"""

    # Add table if any
    if extracted['tables']:
        table_rows = ""
        for row in extracted['tables'][:8]:
            cells = "".join([f'<td class="py-2.5 text-gray-300">{c}</td>' for c in row])
            table_rows += f'<tr style="border-top:1px solid rgba(255,255,255,0.05);">{cells}</tr>\n'
        
        sections_html += f"""
            <!-- Data Table -->
            <div class="mb-10">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <tbody>{table_rows}</tbody>
                    </table>
                </div>
            </div>
"""
    
    # Add tracks (micro/env applications)
    if extracted['tracks']:
        tracks_html = ""
        for title, body in extracted['tracks'][:2]:
            tracks_html += f"""
                    <div class="p-4 rounded-xl" style="background:rgba(16,185,129,0.05); border:1px solid rgba(16,185,129,0.1);">
                        <h4 class="font-bold text-white mb-1 text-sm">{title}</h4>
                        <p class="text-xs text-gray-400">{body[:150]}</p>
                    </div>"""
        
        sections_html += f"""
            <!-- Applications -->
            <div class="mb-10">
                <h2 class="text-xl font-bold text-white mb-3" style="border-left:4px solid #3b82f6; padding-left:12px;">
                    <span class="lang-block" lang="th">การประยุกต์ใช้งาน</span>
                    <span class="lang-block" lang="en">Applications</span>
                </h2>
                <div class="grid md:grid-cols-2 gap-4">{tracks_html}
                </div>
            </div>
"""

    # Build exercises HTML
    exercises_html = ""
    if extracted['exercises']:
        ex_items = ""
        for j, ex in enumerate(extracted['exercises'][:3]):
            colors = ["emerald", "blue", "amber"]
            c = colors[j % 3]
            ex_items += f"""
                    <div class="flex gap-3 items-start p-4 rounded-xl" style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.05);">
                        <span class="w-7 h-7 rounded-lg bg-{c}-500 flex items-center justify-center font-bold text-white text-xs shrink-0">{j+1}</span>
                        <p class="text-sm text-gray-300">{ex[:200]}</p>
                    </div>"""
        exercises_html = f"""
            <!-- Exercises -->
            <div class="mb-8">
                <h2 class="text-xl font-bold text-white mb-4" style="border-left:4px solid #f59e0b; padding-left:12px;">
                    📝 <span class="lang-block" lang="th">แบบฝึกหัดบทที่ {num}</span>
                    <span class="lang-block" lang="en">Chapter {num} Exercises</span>
                </h2>
                <div class="space-y-3">{ex_items}
                </div>
            </div>
"""

    # Navigation
    next_href = f'{ch["next"]}' if ch["next"] else '../index.php'
    
    # Cover image
    cover_img = f"""
            <div class="mb-10 text-center">
                <img src="{img_dir}/cover.png" alt="Chapter {num}" class="mx-auto rounded-2xl shadow-lg" style="max-height:400px; width:auto;" onerror="this.style.display='none'">
            </div>"""

    # Assemble full PHP
    php = f"""<?php
$pageTitle = '{ch['title_th']} | {ch['title_en']}';
$basePath = '../';
include '../includes/header.php';
?>

<link rel="stylesheet" href="../css/style.css">

<main class="font-sans antialiased min-h-screen pb-20" style="background:#0f172a;">

    <!-- Hero Section -->
    <section class="relative text-white overflow-hidden" style="background: linear-gradient(135deg, #064e3b 0%, #0f172a 100%); padding: 100px 0 60px;">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-1 px-4 rounded-full text-emerald-300 font-mono text-xs mb-4 border border-emerald-500/30" style="background:rgba(16,185,129,0.15);">
                <span class="lang-block" lang="th">บทที่ {num}</span>
                <span class="lang-block" lang="en">CHAPTER {num}</span>
                <span class="lang-block" lang="zh">第{num}章</span>
            </span>
            <p class="text-emerald-400 font-bold uppercase tracking-widest text-sm mb-2">
                <span class="lang-block" lang="th">{ch['subtitle_th']}</span>
                <span class="lang-block" lang="en">{ch['subtitle_en']}</span>
            </p>
            <h1 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">
                <span class="lang-block" lang="th">{ch['title_th']}</span>
                <span class="lang-block" lang="en">{ch['title_en']}</span>
                <span class="lang-block" lang="zh">{ch['title_zh']}</span>
            </h1>
            <p class="text-base text-gray-300 max-w-2xl mx-auto">
                <span class="lang-block" lang="th">{ch['desc_th']}</span>
                <span class="lang-block" lang="en">{ch['desc_en']}</span>
            </p>
        </div>
    </section>

    <!-- Content Container -->
    <div class="container mx-auto px-6 -mt-8 relative z-20">
        <div class="rounded-3xl shadow-xl overflow-hidden max-w-4xl mx-auto border p-6 md:p-10" style="background:rgba(30,41,59,0.8); border-color:rgba(255,255,255,0.1); backdrop-filter:blur(20px);">
{cover_img}
{sections_html}
{exercises_html}
            <!-- Navigation -->
            <div class="flex justify-between items-center pt-6 border-t" style="border-color:rgba(255,255,255,0.1);">
                <a href="{ch['prev']}" class="text-gray-500 hover:text-emerald-400 flex items-center transition text-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span class="lang-block" lang="th">{ch['prev_th']}</span>
                    <span class="lang-block" lang="en">{ch['prev_en']}</span>
                </a>
                <a href="{next_href}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-5 py-2.5 rounded-full font-bold shadow-lg shadow-emerald-500/30 transition flex items-center text-sm">
                    <span class="lang-block" lang="th">{ch['next_th']}</span>
                    <span class="lang-block" lang="en">{ch['next_en']}</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

        </div>
    </div>

</main>

<?php include '../includes/footer.php'; ?>
"""
    return php


def main():
    for filename, meta in CHAPTERS.items():
        filepath = os.path.join(CHAPTERS_DIR, filename)
        if not os.path.exists(filepath):
            print(f"SKIP: {filename} not found")
            continue
        
        print(f"Processing {filename}...")
        extracted = extract_content_sections(filepath)
        print(f"  Found: {len(extracted['sections'])} headings, {len(extracted['formulas'])} formulas, "
              f"{len(extracted['tables'])} table rows, {len(extracted['exercises'])} exercises, "
              f"{len(extracted['lang_blocks'])} lang blocks, {len(extracted['tracks'])} tracks")
        
        new_content = generate_chapter(filename, meta, extracted)
        
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        
        print(f"  ✅ Written {filename} ({len(new_content)} bytes)")
    
    print("\n🎉 All chapters converted!")


if __name__ == "__main__":
    main()
