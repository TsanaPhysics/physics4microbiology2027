import os
import re
import json
import shutil

SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
SOURCE_DIR = os.path.join(SCRIPT_DIR, '../../fundamentalphysics2026/fphymicro/src/md/')
ASSETS_IMG_DIR = os.path.join(SCRIPT_DIR, '../../fundamentalphysics2026/fphymicro/assets/images/')
OUTPUT_DIR = os.path.join(SCRIPT_DIR, '../chapters/')
TARGET_IMG_DIR = os.path.join(SCRIPT_DIR, '../images/')
TRANS_FILE = os.path.join(SCRIPT_DIR, '../data/translations.json')

# Load translations
with open(TRANS_FILE, 'r', encoding='utf-8') as f:
    TRANS_DATA = json.load(f)

def normalize_text(text):
    """Normalize text for better matching"""
    return re.sub(r'[^\w\s]', '', text).strip()

def get_trans(category, key, lang='th'):
    """Helper to get translation from JSON with fallbacks"""
    try:
        # Search in exact category
        item = TRANS_DATA.get(category, {}).get(key)
        if not item:
            # Fallback: search across all keys in 'sections' using normalized keys
            if category == 'sections':
                norm_key = normalize_text(key)
                for k, v in TRANS_DATA['sections'].items():
                    if normalize_text(k) in norm_key or norm_key in normalize_text(k):
                        return v.get(lang, v.get('th', key))
            return key
        return item.get(lang, item.get('th', key))
    except:
        return key

def clean_markdown(text):
    text = re.sub(r'\\\(', '$', text)
    text = re.sub(r'\\\)', '$', text)
    text = re.sub(r'\\\[', '$$', text)
    text = re.sub(r'\\\]', '$$', text)
    return text

def has_thai(text):
    return bool(re.search(r'[ก-ฮ]', str(text)))

def table_repl(match):
    rows = match.group(0).strip().split('\n')
    if len(rows) < 3: return match.group(0)
    
    header_row = rows[0].strip().strip('|').split('|')
    body_rows = rows[2:]
    
    html = '<div class="overflow-x-auto my-6 shadow-xl rounded-2xl border border-white/5"><table class="w-full text-left text-sm border-collapse">'
    
    # Header
    html += '<thead class="bg-slate-800/50"><tr>'
    for cell in header_row:
        html += f'<th class="p-4 border-b border-white/10 text-orange-400 font-bold uppercase tracking-wider">{cell.strip()}</th>'
    html += '</tr></thead><tbody>'
    
    # Body
    for row_str in body_rows:
        if not row_str.strip() or '---' in row_str: continue
        body_cells = row_str.strip().strip('|').split('|')
        html += '<tr class="border-b border-white/5 hover:bg-white/5 transition-colors">'
        for cell in body_cells:
            html += f'<td class="p-4 text-gray-300 border-r border-white/5 last:border-r-0">{cell.strip()}</td>'
        html += '</tr>'
    html += '</tbody></table></div>'
    return html

def process_markdown(text):
    """Converts common markdown elements to styled HTML"""
    if not text: return ""
    
    # 0. Initial Clean (LaTeX & Trailing artifacts)
    text = clean_markdown(text)
    text = re.sub(r'\s*[#\-]*\s*$', '', text) # Remove trailing # or -
    
    # 1. Tables
    text = re.sub(r'((?:\|.*\|(?:\n|$))+)', table_repl, text)
    
    # 2. Images (with path rewrite and styling)
    def image_repl(match):
        alt = match.group(1)
        path = match.group(2).replace('./images/', '../images/')
        return f'<div class="my-12 flex flex-col items-center animate-fade-in"><img src="{path}" alt="{alt}" class="max-w-full h-auto rounded-[2rem] shadow-2xl border border-white/10 hover:scale-[1.02] transition-transform duration-500"><p class="mt-4 text-xs text-gray-500 italic text-center max-w-2xl px-6">{alt}</p></div>'
    
    text = re.sub(r'!\[(.*?)\]\((.*?)\)', image_repl, text)
    
    # 3. Level 3 Headers (###)
    text = re.sub(r'### (.*)', r'<h4 class="text-lg font-bold text-orange-400 mt-8 mb-4 flex items-center"><i class="fas fa-caret-right mr-2 text-xs"></i>\1</h4>', text)
    
    # 3. List items (bullets * and numbers 1.)
    text = re.sub(r'^\* (.*)', r'<li class="flex items-start"><i class="fas fa-circle text-[6px] text-orange-500 mt-2 mr-3 opacity-60"></i><span class="opacity-90">\1</span></li>', text, flags=re.MULTILINE)
    text = re.sub(r'^\d+\.\s*(.*)', r'<li class="flex items-start"><i class="fas fa-circle text-[6px] text-orange-500 mt-2 mr-3 opacity-60"></i><span class="opacity-90">\1</span></li>', text, flags=re.MULTILINE)
    
    # 4. Bold/Strong
    text = re.sub(r'\*\*(.*?)\*\*', r'<strong class="text-orange-400">\1</strong>', text)
    
    # 5. Clean up lists (wrap in ul)
    text = re.sub(r'((?:<li.*?>.*?</li>\s*)+)', r'<ul class="space-y-3 my-6">\1</ul>', text, flags=re.DOTALL)
    
    return text

def parse_chapter(content):
    title_match = re.search(r'^# (.*)', content, re.MULTILINE)
    title_th = title_match.group(1).strip() if title_match else "Untitled"
    
    # Extract Intro (text before first ##)
    intro_match = re.search(r'^# .*?\n(.*?)(?=##|$)', content, re.DOTALL)
    intro = intro_match.group(1).strip() if intro_match else ""
    
    # Extract Plan (everything under ## แผนบริหาร... until next ##)
    plan_match = re.search(r'## แผนบริหารการสอนประจำบท(.*?)(?=##|$)', content, re.DOTALL)
    plan_full = plan_match.group(1).strip() if plan_match else ""
    
    # Extract CLOs from the plan section or overall content
    # Look for common header patterns for objectives
    clo_match = re.search(r'### (?:วัตถุประสงค์|ผลการเรียนรู้|เป้าหมาย)(.*?)(?=###|##|$)', plan_full if plan_full else content, re.DOTALL)
    clos = []
    if clo_match:
        # Clean lines and remove numbering like 1. 2. 3.
        clos = [re.sub(r'^\d+\.\s*', '', c.strip().lstrip('-').strip()) for c in clo_match.group(1).strip().split('\n') if c.strip()]
    
    sections = []
    parts = re.split(r'## (.*)', content)
    for i in range(1, len(parts), 2):
        s_title = parts[i].strip()
        s_body = parts[i+1].strip()
        if any(x in s_title for x in ["แผนบริหาร", "วัตถุประสงค์", "แบบฝึกหัด", "สรุป"]): continue
        sections.append((s_title, s_body))
        
    ex_section = re.search(r'## แบบฝึกหัดท้ายบท(.*)', content, re.DOTALL)
    exercises = ex_section.group(1).strip() if ex_section else ""
    
    return {'title_th': title_th, 'intro': intro, 'plan': plan_full, 'clos': clos, 'sections': sections, 'exercises': exercises}

def wrap_lang(content_map, target_lang):
    """Smart wrapper: Outputs one language or trilingual block"""
    if target_lang != 'all':
        c = content_map.get(target_lang, content_map.get('th', ""))
        return process_markdown(c)
    
    html = ""
    for lang, content in content_map.items():
        processed = process_markdown(content)
        html += f'<div class="lang-block" lang="{lang}">{processed}</div>'
    return html

def load_ai_content(ch_num):
    """Loads AI-generated content for the chapter if it exists"""
    path = f'data/ai_content/ch{str(ch_num).zfill(2)}.json'
    if os.path.exists(path):
        with open(path, 'r', encoding='utf-8') as f:
            return json.load(f)
    return {}

def format_ai_section(ai_data):
    """Formats AI JSON data into styled HTML components"""
    if not ai_data or 'error' in ai_data: return ""
    
    html = '<div class="ai-enhancement mt-12 p-8 rounded-[2rem] bg-orange-500/5 border border-orange-500/20">'
    html += '<h5 class="text-orange-400 font-bold mb-6 flex items-center"><i class="fas fa-robot mr-3"></i> AI-Enhanced Learning Insights</h5>'
    
    if 'description' in ai_data:
        html += f'<div class="mb-8"><h6 class="text-white font-semibold mb-2">คำอธิบายเชิงลึก</h6><p class="text-gray-400 text-sm leading-relaxed">{ai_data["description"]}</p></div>'
        
    if 'summary_table' in ai_data:
        table_html = process_markdown(ai_data['summary_table'])
        html += f'<div class="mb-8 ai-table"><h6 class="text-white font-semibold mb-4">ตารางสรุปประเด็น</h6>{table_html}</div>'
        
    if 'examples' in ai_data:
        ex_text = ai_data['examples'] if isinstance(ai_data['examples'], str) else "\n".join(ai_data['examples'])
        html += f'<div class="mb-8 p-4 rounded-xl bg-white/5 border border-white/10"><h6 class="text-orange-300 font-semibold mb-2">ตัวอย่างและการประยุกต์</h6><div class="text-gray-400 text-sm">{process_markdown(ex_text)}</div></div>'
        
    if 'exercises' in ai_data:
        ex_text = ai_data['exercises'] if isinstance(ai_data['exercises'], str) else "\n".join(ai_data['exercises'])
        html += f'<div class="p-4 rounded-xl bg-orange-500/10 border border-orange-500/20"><h6 class="text-orange-400 font-semibold mb-2">โจทย์ท้าทาย (AI Generated)</h6><div class="text-gray-300 text-sm">{process_markdown(ex_text)}</div></div>'
        
    html += '</div>'
    return html

def generate_chapter_page(ch_num, data, target_lang='all'):
    num_str = str(ch_num).zfill(2)
    full_title_map = {l: get_trans('chapters', num_str, l) for l in ['th', 'en', 'zh']}
    
    # CLOs
    clo_html = ""
    for i, clo in enumerate(data['clos']):
        c_map = {'th': clo, 'en': f"Outcome {i+1} for Chapter {ch_num}", 'zh': f"第 {ch_num} 章的学习成果 {i+1}"}
        inner = wrap_lang(c_map, target_lang)
        clo_html += f'<li class="flex items-start"><i class="fas fa-check-circle text-orange-500 mt-1 mr-2 text-sm"></i><span class="text-gray-300">{inner}</span></li>\n'

    # Intro Section (Images/Intro text)
    intro_html = ""
    if data['intro']:
        intro_map = {'th': data['intro'], 'en': "", 'zh': ""}
        intro_html = f'<div class="mb-12">{wrap_lang(intro_map, target_lang)}</div>'

    # Content Sections
    sections_html = ""
    if data['plan']:
        plan_titles = {l: get_trans('ui', 'teaching_plan', l) for l in ['th', 'en', 'zh']}
        inner_title = wrap_lang(plan_titles, target_lang)
        plan_bodies = {
            'th': data['plan'],
            'en': '### Academic Teaching Plan\nThis section details the pedagogical approach and teaching strategy for this module.',
            'zh': '### 教学计划\n本节详细介绍了本模块的教学方法和教学策略。'
        }
        inner_body = wrap_lang(plan_bodies, target_lang)
        sections_html += f'<div class="mb-12"><h2 class="text-2xl font-bold text-white mb-6">{inner_title}</h2><div class="text-gray-400 space-y-4">{inner_body}</div></div>'

    # Simulation Mapping
    sim_map = {
        1: ("Unit Converter", "sim01_unit_converter.php", "fa-balance-scale"),
        2: ("Vector Motion", "sim02_vector_addition.php", "fa-arrows-alt"),
        3: ("Brownian Dynamics", "sim03_brownian_motion.php", "fa-microscope"),
        4: ("Centrifuge Lab", "sim04_centrifuge.php", "fa-sync"),
        5: ("Bio-Collisions", "sim05_collision.php", "fa-atom"),
        6: ("Osmosis Sim", "sim06_osmosis.php", "fa-water"),
        7: ("Molecular Motor", "sim07_atp_synthase.php", "fa-cogs"),
        8: ("Biomechanics", "sim08_lever.php", "fa-bone"),
        9: ("Thermal PCR", "sim09_pcr_thermal.php", "fa-thermometer-half"),
        10: ("Electrophoresis", "sim10_electrophoresis.php", "fa-bolt"),
        11: ("Smart Microscopy", "sim11_microscope.php", "fa-eye"),
        12: ("Isotope Decay", "sim12_decay.php", "fa-radiation")
    }
    
    sim_info = sim_map.get(ch_num)
    sim_html = ""
    if sim_info:
        name, url, icon = sim_info
        sim_html = f'''
        <a href="../simulations/{url}" target="_blank" class="fixed bottom-8 right-8 z-50 group">
            <div class="relative flex items-center justify-center">
                <div class="absolute inset-0 bg-orange-500 rounded-full blur-xl opacity-40 group-hover:opacity-80 transition-opacity duration-500 animate-pulse"></div>
                <div class="relative px-6 py-4 bg-black/40 backdrop-blur-2xl border border-white/20 rounded-full flex items-center space-x-4 hover:border-orange-500/50 transition-all duration-500 group-hover:scale-110">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center shadow-lg">
                        <i class="fas {icon} text-white text-xl"></i>
                    </div>
                    <div class="pr-2">
                        <p class="text-[10px] text-orange-400 font-bold uppercase tracking-widest leading-none mb-1">Interactive 3D Lab</p>
                        <p class="text-white font-bold text-sm">{name}</p>
                    </div>
                </div>
            </div>
        </a>
        '''

    # Dictionary for auto-injecting images based on highly relevant keywords
    # This prevents irrelevant images from appearing in wrong sections.
    image_keyword_map = {
        # Tech Images
        'tech/tech_ai_microscopy.png': ['ปัญญาประดิษฐ์', 'AI', 'กล้องจุลทรรศน์', 'microscopy', 'machine learning'],
        'tech/tech_biosensor.png': ['เซ็นเซอร์', 'sensor', 'biosensor', 'ตรวจวัด'],
        'tech/tech_cryo_em.png': ['Cryo-EM', 'อิเล็กตรอน', 'electron', 'cryogenic'],
        'tech/tech_digital_twin.png': ['Digital Twin', 'ฝาแฝดดิจิทัล', 'จำลอง', 'simulation'],
        'tech/tech_flow_cytometry.png': ['Flow Cytometry', 'เซลล์', 'cell', 'ไซโตเมทรี'],
        'tech/tech_food_safety_iot.png': ['อาหาร', 'food safety', 'ความปลอดภัยทางอาหาร'],
        'tech/tech_iot_lab.png': ['IoT', 'Smart Lab', 'อินเทอร์เน็ตของสรรพสิ่ง', 'เครือข่าย'],
        'tech/tech_lab_robot.png': ['หุ่นยนต์', 'robot', 'อัตโนมัติ', 'automation'],
        'tech/tech_microfluidics.png': ['Microfluidics', 'ไมโครฟลูอิดิกส์', 'ของไหล'],
        'tech/tech_optical_tweezers.png': ['Optical Tweezers', 'เลเซอร์', 'คีมจับแสง'],
        'tech/tech_radiation_ai.png': ['รังสี', 'radiation', 'x-ray', 'รังสีเอกซ์'],
        'tech/tech_smart_incubator.png': ['ตู้เพาะเชื้อ', 'incubator', 'เพาะเลี้ยง'],
        'water_quality_env.png': ['น้ำ', 'water', 'สิ่งแวดล้อม', 'environment'],
        'size_scale_trilingual.png': ['ขนาด', 'scale', 'ไมโครเมตร', 'นาโนเมตร', 'มิติ'],
        
        # Chapter 1 Images
        'ch01/lab_instruments.png': ['เครื่องมือ', 'instrument', 'ปฏิบัติการ', 'อุปกรณ์'],
        'ch01/size_scale.png': ['ขนาด', 'scale', 'ไมโครเมตร', 'สเกล'],
        'ch01/si_prefixes.png': ['คำอุปสรรค', 'prefix', 'ตัวพหุคูณ'],
        'ch01/si_wheel.png': ['SI', 'ระบบหน่วย', 'ฐาน', 'อนุพัทธ์'],
        'ch01/unit_conversion.png': ['แปลงหน่วย', 'conversion', 'แฟคเตอร์'],
        'ch01/vernier_caliper.png': ['เวอร์เนียร์', 'คาร์ลิปเปอร์', 'vernier', 'caliper', 'เลขนัยสำคัญ', 'ความละเอียด'],
        'ch01/turbidity.png': ['ความขุ่น', 'turbidity', 'แสง', 'สเปกโทรโฟโตมิเตอร์'],
        'ch01/colony_measurement.png': ['โคโลนี', 'colony', 'แบคทีเรีย'],
        'ch01/water_quality.png': ['คุณภาพน้ำ', 'water quality', 'pH'],
        'ch01/ai_measurement.png': ['AI', 'ปัญญาประดิษฐ์', 'การวัด', 'ประมวลผล'],
        'ch01/hero_sciex.png': ['วิทยาศาสตร์', 'จุลชีววิทยา']
    }
    
    used_mapped_images = set()
    ai_content = load_ai_content(ch_num)

    for title, body in data['sections']:
        num_match = re.match(r'^(\d+\.\d+)\s*(.*)', title)
        base_title = num_match.group(2).strip() if num_match else title
        num_str_sec = num_match.group(1) if num_match else ""
        
        t_map = {l: get_trans('sections', base_title, l) for l in ['th', 'en', 'zh']}
        for l in ['en', 'zh']:
            if has_thai(t_map[l]): t_map[l] = f"Section {num_str_sec}" if num_str_sec else "Academic Content"

        # Inject strictly mapped images (only for numbered content sections to avoid Table of Contents consuming them)
        if num_match:
            for img_path, keywords in image_keyword_map.items():
                if img_path in used_mapped_images: continue
                
                # Only use chXX images in their respective chapter
                ch_str = str(ch_num).zfill(2)
                if img_path.startswith('ch') and not img_path.startswith(f'ch{ch_str}'):
                    continue
                    
                for kw in keywords:
                    if kw.lower() in base_title.lower() or kw.lower() in body.lower():
                        clean_name = img_path.split('/')[-1].split('.')[0].replace('_', ' ').title()
                        body += f'\n\n<div class="my-12 flex flex-col items-center animate-fade-in"><img src="../images/{img_path}" alt="{clean_name}" class="max-w-full h-auto rounded-[2rem] shadow-2xl border border-white/10 hover:scale-[1.02] transition-transform duration-500"><p class="mt-4 text-xs text-orange-400/80 italic text-center max-w-2xl px-6">ภาพประกอบเนื้อหา: {clean_name}</p></div>\n\n'
                        used_mapped_images.add(img_path)
                        break # Move to next image

        # Inject AI Content if available for this section
        if title in ai_content:
            body += format_ai_section(ai_content[title])
        elif base_title in ai_content:
            body += format_ai_section(ai_content[base_title])

        # We completely removed the sequential fallback and dynamic ch_img_dir scoring 
        # to ensure ZERO irrelevant images are injected.


        b_map = {
            'th': body,
            'en': f'### Academic Insights\nExploring **{t_map["en"]}** in biological systems.',
            'zh': f'### 学术见解\n在生物系统中探索 **{t_map["zh"]}**。'
        }
        
        inner_title = wrap_lang(t_map, target_lang)
        inner_body = wrap_lang(b_map, target_lang)
        num_tag = f'<span class="section-number mr-2">{num_str_sec}</span>' if num_str_sec else ""
        
        if "ตัวอย่าง" in base_title:
            sections_html += f'<div class="mb-12 bg-white border-2 border-[#1A237E] p-6 lg:p-8"><h2 class="text-2xl lg:text-3xl font-bold text-white bg-[#1A237E] -mx-6 lg:-mx-8 -mt-6 lg:-mt-8 mb-6 p-4 flex items-center">{num_tag} <span>{inner_title}</span></h2><div class="text-gray-800 space-y-4">{inner_body}</div></div>'
        elif "โจทย์ท้าทาย" in base_title:
            sections_html += f'<div class="mb-12 bg-[#E1F5FE] border border-[#81D4FA] rounded-lg p-6 lg:p-8"><h2 class="text-2xl font-bold text-[#1A237E] mb-4 border-b border-[#1A237E]/20 pb-4 flex items-center">{num_tag} <span>{inner_title}</span></h2><div class="text-gray-800 space-y-4">{inner_body}</div></div>'
        else:
            sections_html += f'<div class="mb-12"><h2 class="text-2xl font-bold text-white mb-6 flex items-center">{num_tag} <span>{inner_title}</span></h2><div class="text-gray-400 space-y-4">{inner_body}</div></div>'

    exercises_html = ""
    if data['exercises']:
        ex_map = {'th': data['exercises'], 'en': "Practice exercises are available in the Thai version.", 'zh': "练习题可在泰语版本中找到。"}
        exercises_html = f'<div class="mb-12"><h2 class="text-2xl font-bold text-white mb-6 flex items-center"><i class="fas fa-dumbbell text-orange-500 mr-3"></i> <span>{wrap_lang({"th":"แบบฝึกหัด","en":"Exercises","zh":"练习"}, target_lang)}</span></h2><div class="text-gray-400">{wrap_lang(ex_map, target_lang)}</div></div>'

    # Dynamic Gallery Section
    gallery_html = f'''
            <div class="mb-12 mt-16 pt-12 border-t border-white/10">
                <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-images text-orange-500 mr-3"></i>
                    <span>{wrap_lang({'th':'คลังภาพเทคโนโลยีและปฏิบัติการ XR','en':'XR Technology & Lab Gallery','zh':'XR 技术与实验室画廊'}, target_lang)}</span>
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php 
                        $allImages = glob('../images/*.{{jpg,jpeg,png,gif}}', GLOB_BRACE);
                        if($allImages) {{
                            foreach($allImages as $img) {{
                                echo '<div class="group relative rounded-2xl overflow-hidden aspect-video border border-white/10 shadow-lg">';
                                echo '<img src="' . $img . '" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy" alt="Gallery Image">';
                                echo '<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4"><i class="fas fa-search-plus text-orange-400"></i></div>';
                                echo '</div>';
                            }}
                        }}
                    ?>
                </div>
            </div>
    '''

    page_title = wrap_lang(full_title_map, target_lang)
    
    return f"""<?php
$pageTitle = "{full_title_map.get(target_lang if target_lang != 'all' else 'th')}";
$basePath = '../';
include '../includes/header.php';
?>
<main class="font-sans antialiased min-h-screen pb-20" style="background:#020617;">
    <section class="relative text-white overflow-hidden" style="background: linear-gradient(135deg, #1e293b 0%, #020617 100%); padding: 120px 0 80px;">
        <div class="container mx-auto px-6 relative z-10 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full text-orange-400 font-mono text-xs mb-6 border border-orange-500/30 tracking-widest uppercase">MODULE {ch_num}</span>
            <h1 class="text-4xl md:text-6xl font-black mb-8 leading-tight tracking-tight">{page_title}</h1>
        </div>
    </section>
    <div class="container mx-auto px-6 -mt-12 relative z-20">
        <div class="rounded-[2.5rem] shadow-2xl overflow-hidden max-w-5xl mx-auto border p-8 md:p-16 bg-slate-900/90 backdrop-blur-3xl border-white/5">
            {intro_html}
            <div class="mb-16 p-8 rounded-3xl bg-orange-600/5 border border-orange-500/10">
                <h3 class="text-xl font-bold text-orange-400 mb-6 flex items-center"><i class="fas fa-bullseye mr-3"></i> <span>{wrap_lang({'th':'วัตถุประสงค์','en':'Outcomes','zh':'目标'}, target_lang)}</span></h3>
                <ul class="grid md:grid-cols-1 gap-4 text-gray-300 text-sm">{clo_html}</ul>
            </div>
            {sections_html}
            {exercises_html}
            {gallery_html}
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>
"""

def main():
    if not os.path.exists(OUTPUT_DIR): os.makedirs(OUTPUT_DIR)
    if not os.path.exists(TARGET_IMG_DIR): os.makedirs(TARGET_IMG_DIR)
    
    # --- Image Sync Logic ---
    print("Syncing images...")
    # 1. Sync from src/md/images/
    md_img_dir = os.path.join(SOURCE_DIR, 'images')
    if os.path.exists(md_img_dir):
        for img in os.listdir(md_img_dir):
            if img.lower().endswith(('.png', '.jpg', '.jpeg', '.gif', '.svg')):
                shutil.copy2(os.path.join(md_img_dir, img), os.path.join(TARGET_IMG_DIR, img))
    
    # 2. Sync from assets/images/
    if os.path.exists(ASSETS_IMG_DIR):
        for img in os.listdir(ASSETS_IMG_DIR):
            if img.lower().endswith(('.png', '.jpg', '.jpeg', '.gif', '.svg')):
                shutil.copy2(os.path.join(ASSETS_IMG_DIR, img), os.path.join(TARGET_IMG_DIR, img))
    print("Image sync completed.")
    
    files = [f for f in os.listdir(SOURCE_DIR) if f.startswith('chapter_') and f.endswith('.md')]
    for f in sorted(files):
        ch_num = int(re.search(r'chapter_(\d+)', f).group(1))
        with open(os.path.join(SOURCE_DIR, f), 'r', encoding='utf-8') as src:
            content = src.read()
        
        data = parse_chapter(content)
        
        # 1. Standalone Files
        for lang in ['th', 'en', 'zh']:
            standalone_html = generate_chapter_page(ch_num, data, lang)
            out_name = f"ch{str(ch_num).zfill(2)}_{lang}.php"
            with open(os.path.join(OUTPUT_DIR, out_name), 'w', encoding='utf-8') as out:
                out.write(standalone_html)
            print(f"Generated Standalone {lang.upper()} -> {out_name}")
            
        # 2. Master Trilingual File
        master_html = generate_chapter_page(ch_num, data, 'all')
        master_name = f"ch{str(ch_num).zfill(2)}_{str(ch_num).zfill(2)}.php"
        with open(os.path.join(OUTPUT_DIR, master_name), 'w', encoding='utf-8') as out:
            out.write(master_html)
        print(f"Generated Master Trilingual -> {master_name}")

if __name__ == "__main__":
    main()
