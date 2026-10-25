import json
import os
import sys
import urllib.request

# Configuration
OLLAMA_URL = "http://localhost:11434/api/chat"
MODEL_NAME = "qwen3-vl:4b"
SOURCE_MD_DIR = "../../fundamentalphysics2026/fphymicro/src/md"
OUTPUT_DIR = "../chapters"

def get_md_content(chapter_num):
    filename = f"chapter_{chapter_num:02d}.md"
    filepath = os.path.join(SOURCE_MD_DIR, filename)
    if not os.path.exists(filepath):
        print(f"File not found: {filepath}")
        return None
    with open(filepath, "r", encoding="utf-8") as f:
        return f.read()

def call_ollama(prompt, chapter_num):
    user_content = f"""
SOURCE CONTENT:
{prompt}

TASK:
Convert the above Physics Markdown chapter into a structured JSON object for a trilingual educational platform.
The platform uses Tailwind CSS and a dark theme with orange accents.

JSON SCHEMA:
{{
  "chapter_num": {chapter_num},
  "title": {{ "th": "...", "en": "...", "zh": "..." }},
  "subtitle": {{ "th": "...", "en": "...", "zh": "..." }},
  "icon": "fas fa-...", 
  "clos": [
    {{ "id": 1, "th": "...", "en": "...", "zh": "..." }},
    ...
  ],
  "sections": [
    {{
      "heading": {{ "th": "...", "en": "...", "zh": "..." }},
      "content": {{ "th": "...", "en": "...", "zh": "..." }},
      "type": "standard"
    }},
    {{
      "type": "dual_track",
      "micro": {{ "th": "...", "en": "...", "zh": "..." }},
      "env": {{ "th": "...", "en": "...", "zh": "..." }}
    }},
    {{
      "type": "example",
      "title": {{ "th": "...", "en": "...", "zh": "..." }},
      "content": {{ "th": "...", "en": "...", "zh": "..." }}
    }}
  ],
  "exercises": [
    {{ "id": 1, "th": "...", "en": "...", "zh": "...", "tag": "OBE/PBL/STEAM" }},
    ...
  ],
  "summary": [
    {{ "th": "...", "en": "...", "zh": "..." }},
    ...
  ]
}}

FINAL RULES:
1. Respond ONLY with valid JSON.
2. Ensure every text field is accurately translated into Thai, English, and Chinese.
3. No introductory text or markdown code blocks. Start with {{ and end with }}.
"""

    messages = [
        {"role": "user", "content": user_content}
    ]
    
    payload = {
        "model": MODEL_NAME,
        "messages": messages,
        "stream": False,
        "format": "json",
        "options": {
            "num_ctx": 8192,
            "num_predict": 8192,
            "temperature": 0.0
        }
    }
    
    data = json.dumps(payload).encode("utf-8")
    req = urllib.request.Request(OLLAMA_URL, data=data)
    req.add_header("Content-Type", "application/json")
    
    try:
        with urllib.request.urlopen(req, timeout=900) as response:
            resp_data = response.read().decode("utf-8")
            try:
                resp_json = json.loads(resp_data)
                return json.loads(resp_json["message"]["content"])
            except Exception as je:
                print(f"JSON Error: {je}")
                print(f"Raw data: {resp_data[:500]}...")
                return None
    except Exception as e:
        print(f"HTTP Error: {e}")
        return None

def render_php(data):
    ch = data["chapter_num"]
    ch_str = f"{ch:02d}"
    icon = data.get("icon", "fas fa-atom")
    
    php = f"<?php\n"
    php += f"$pageTitle = 'บทที่ {ch}: {data['title']['th']} | Chapter {ch}: {data['title']['en']}';\n"
    php += f"$basePath = '../';\n"
    php += f"include '../includes/header.php';\n"
    php += f"?>\n\n"

    # Hero Section (Tailwind + AOS)
    php += f'<section class="relative min-h-[70vh] flex items-center pt-32 pb-20 overflow-hidden">\n'
    php += f'    <div class="absolute inset-0 -z-10 bg-slate-950">\n'
    php += f'        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-600/10 rounded-full blur-[120px] animate-pulse"></div>\n'
    php += f'        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-amber-600/5 rounded-full blur-[100px]"></div>\n'
    php += f'    </div>\n'
    php += f'    <div class="max-w-7xl mx-auto px-6 w-full grid lg:grid-cols-2 gap-12 items-center">\n'
    php += f'        <div data-aos="fade-right" data-aos-duration="1000">\n'
    php += f'            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/20 text-orange-400 text-[10px] font-bold tracking-widest uppercase mb-6">\n'
    php += f'                <i class="{icon}"></i>\n'
    php += f'                <span class="lang-block" lang="th">บทเรียนที่ {ch}</span>\n'
    php += f'                <span class="lang-block" lang="en">Module {ch}</span>\n'
    php += f'            </div>\n'
    php += f'            <h1 class="text-6xl lg:text-7xl font-bold mb-8 leading-tight text-white">\n'
    php += f'                <span class="lang-block" lang="th">{data["title"]["th"]}</span>\n'
    php += f'                <span class="lang-block" lang="en">{data["title"]["en"]}</span>\n'
    php += f'            </h1>\n'
    php += f'            <div class="flex flex-col space-y-3 mb-10 text-slate-400 border-l-4 border-orange-500 pl-8">\n'
    php += f'                <span class="text-lg font-medium">🇹🇭 {data["subtitle"]["th"]}</span>\n'
    php += f'                <span class="text-lg font-medium">🇬🇧 {data["subtitle"]["en"]}</span>\n'
    php += f'                <span class="text-base text-slate-500 italic">🇨🇳 {data["subtitle"]["zh"]}</span>\n'
    php += f'            </div>\n'
    php += f'        </div>\n'
    php += f'        <div class="hidden lg:block relative" data-aos="fade-left" data-aos-duration="1000">\n'
    php += f'            <div class="bg-slate-900/40 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden group">\n'
    php += f'                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-orange-500 to-amber-400"></div>\n'
    php += f'                <h4 class="text-orange-500 font-bold text-xs tracking-widest uppercase mb-8 flex items-center">\n'
    php += f'                    <i class="fas fa-bullseye mr-3"></i>\n'
    php += f'                    Learning Outcomes\n'
    php += f'                </h4>\n'
    php += f'                <ul class="space-y-6">\n'
    for clo in data["clos"]:
        php += f'                    <li class="flex items-start space-x-4">\n'
        php += f'                        <span class="w-8 h-8 rounded-xl bg-orange-500/20 flex items-center justify-center text-xs font-bold text-orange-400 mt-1">{clo["id"]}</span>\n'
        php += f'                        <div class="text-sm text-slate-300 leading-relaxed">\n'
        php += f'                            <span class="lang-block" lang="th">{clo["th"]}</span>\n'
        php += f'                            <span class="lang-block" lang="en">{clo["en"]}</span>\n'
        php += f'                        </div>\n'
        php += f'                    </li>\n'
    php += f'                </ul>\n'
    php += f'            </div>\n'
    php += f'        </div>\n'
    php += f'    </div>\n'
    php += f'</section>\n\n'

    # Main Content Area
    php += f'<main class="max-w-7xl mx-auto px-6 py-24 grid lg:grid-cols-12 gap-16">\n'
    
    # Sidebar Navigation
    php += f'    <aside class="hidden lg:block lg:col-span-3">\n'
    php += f'        <div class="sticky top-32 space-y-8">\n'
    php += f'            <div>\n'
    php += f'                <h5 class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mb-4">On This Page</h5>\n'
    php += f'                <nav class="flex flex-col space-y-1">\n'
    for i, sec in enumerate(data["sections"]):
        if sec["type"] == "standard":
            php += f'                    <a href="#sec-{i}" class="px-4 py-2 text-sm text-slate-400 hover:text-orange-500 hover:bg-orange-500/5 rounded-xl transition-all border-l-2 border-transparent hover:border-orange-500">{sec["heading"]["en"]}</a>\n'
    php += f'                </nav>\n'
    php += f'            </div>\n'
    php += f'        </div>\n'
    php += f'    </aside>\n\n'

    # Content Column
    php += f'    <div class="lg:col-span-9 space-y-24">\n'
    
    for i, sec in enumerate(data["sections"]):
        if sec["type"] == "standard":
            php += f'        <section id="sec-{i}" class="scroll-mt-32" data-aos="fade-up">\n'
            php += f'            <h2 class="text-4xl font-bold mb-10 text-white flex items-center group">\n'
            php += f'                <span class="w-12 h-1 bg-orange-500 rounded-full mr-6 group-hover:w-20 transition-all duration-500"></span>\n'
            php += f'                <span>\n'
            php += f'                    <span class="lang-block" lang="th">{sec["heading"]["th"]}</span>\n'
            php += f'                    <span class="lang-block" lang="en">{sec["heading"]["en"]}</span>\n'
            php += f'                </span>\n'
            php += f'            </h2>\n'
            php += f'            <div class="prose prose-invert max-w-none text-slate-300 text-lg leading-relaxed space-y-8">\n'
            php += f'                <div class="lang-block" lang="th">{sec["content"]["th"]}</div>\n'
            php += f'                <div class="lang-block" lang="en">{sec["content"]["en"]}</div>\n'
            php += f'                <div class="lang-block text-slate-500 italic font-light border-l-2 border-slate-800 pl-6" lang="zh">{sec["content"]["zh"]}</div>\n'
            php += f'            </div>\n'
            php += f'        </section>\n\n'
        elif sec["type"] == "dual_track":
            php += f'        <div class="grid md:grid-cols-2 gap-8" data-aos="zoom-in">\n'
            php += f'            <div class="bg-gradient-to-br from-blue-600/10 to-transparent border border-blue-500/20 rounded-[2rem] p-10 hover:border-blue-500/40 transition-all group">\n'
            php += f'                <div class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400 mb-6 group-hover:scale-110 transition-transform">\n'
            php += f'                    <i class="fas fa-microscope text-xl"></i>\n'
            php += f'                </div>\n'
            php += f'                <h3 class="text-blue-400 font-bold uppercase tracking-widest text-xs mb-6">Digital Microbiology</h3>\n'
            php += f'                <div class="text-slate-300 space-y-4 leading-relaxed">\n'
            php += f'                    <div class="lang-block" lang="th">{sec["micro"]["th"]}</div>\n'
            php += f'                    <div class="lang-block" lang="en">{sec["micro"]["en"]}</div>\n'
            php += f'                </div>\n'
            php += f'            </div>\n'
            php += f'            <div class="bg-gradient-to-br from-emerald-600/10 to-transparent border border-emerald-500/20 rounded-[2rem] p-10 hover:border-emerald-500/40 transition-all group">\n'
            php += f'                <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 mb-6 group-hover:scale-110 transition-transform">\n'
            php += f'                    <i class="fas fa-leaf text-xl"></i>\n'
            php += f'                </div>\n'
            php += f'                <h3 class="text-emerald-400 font-bold uppercase tracking-widest text-xs mb-6">Environmental AI</h3>\n'
            php += f'                <div class="text-slate-300 space-y-4 leading-relaxed">\n'
            php += f'                    <div class="lang-block" lang="th">{sec["env"]["th"]}</div>\n'
            php += f'                    <div class="lang-block" lang="en">{sec["env"]["en"]}</div>\n'
            php += f'                </div>\n'
            php += f'            </div>\n'
            php += f'        </div>\n\n'
        elif sec["type"] == "example":
            php += f'        <div class="bg-slate-900 border border-amber-500/20 rounded-[2.5rem] p-12 relative overflow-hidden group" data-aos="fade-up">\n'
            php += f'            <div class="absolute top-0 right-0 p-8 text-amber-500/10 text-6xl group-hover:scale-125 transition-transform"><i class="fas fa-lightbulb"></i></div>\n'
            php += f'            <h4 class="text-amber-500 font-bold uppercase tracking-widest text-xs mb-8 flex items-center">\n'
            php += f'                <span class="w-2 h-2 bg-amber-500 rounded-full mr-3 animate-pulse"></span>\n'
            php += f'                <span class="lang-block" lang="th">{sec["title"]["th"]}</span>\n'
            php += f'                <span class="lang-block" lang="en">{sec["title"]["en"]}</span>\n'
            php += f'            </h4>\n'
            php += f'            <div class="text-slate-300 text-lg leading-relaxed">\n'
            php += f'                <div class="lang-block" lang="th">{sec["content"]["th"]}</div>\n'
            php += f'                <div class="lang-block" lang="en">{sec["content"]["en"]}</div>\n'
            php += f'            </div>\n'
            php += f'        </div>\n\n'

    # Exercises
    php += f'        <section class="bg-slate-900/50 border border-white/5 rounded-[3rem] p-12 shadow-inner" data-aos="fade-up">\n'
    php += f'            <div class="flex items-center justify-between mb-12">\n'
    php += f'                <h2 class="text-3xl font-bold text-white flex items-center">\n'
    php += f'                    <i class="fas fa-edit text-orange-500 mr-4"></i>\n'
    php += f'                    <span>Practice Challenges</span>\n'
    php += f'                </h2>\n'
    php += f'                <span class="px-4 py-1 rounded-full bg-orange-500/10 text-orange-500 text-[10px] font-bold uppercase tracking-widest">OBE x STEAM</span>\n'
    php += f'            </div>\n'
    php += f'            <div class="grid gap-6">\n'
    for ex in data["exercises"]:
        tag = ex.get("tag", "OBE")
        php += f'                <div class="flex items-start space-x-6 p-6 rounded-3xl hover:bg-white/5 transition-all border border-transparent hover:border-white/10 group">\n'
        php += f'                    <span class="w-12 h-12 rounded-2xl bg-slate-800 flex items-center justify-center text-sm font-bold text-slate-500 group-hover:bg-orange-500 group-hover:text-white transition-all">{ex["id"]}</span>\n'
        php += f'                    <div class="flex-1 pt-1">\n'
        php += f'                        <p class="text-slate-300 text-lg mb-3">\n'
        php += f'                            <span class="lang-block" lang="th">{ex["th"]}</span>\n'
        php += f'                            <span class="lang-block" lang="en">{ex["en"]}</span>\n'
        php += f'                        </p>\n'
        php += f'                        <div class="flex space-x-2">\n'
        php += f'                            <span class="px-2 py-0.5 rounded-md bg-slate-800 text-slate-500 text-[9px] font-bold uppercase tracking-widest">{tag}</span>\n'
        php += f'                        </div>\n'
        php += f'                    </div>\n'
        php += f'                </div>\n'
    php += f'            </div>\n'
    php += f'        </section>\n\n'

    # Summary
    php += f'        <div class="bg-gradient-to-br from-orange-600/20 to-transparent border border-orange-500/30 rounded-[3rem] p-12 relative overflow-hidden" data-aos="zoom-in">\n'
    php += f'            <div class="absolute -right-10 -bottom-10 text-orange-500/5 text-9xl"><i class="fas fa-check-double"></i></div>\n'
    php += f'            <h2 class="text-3xl font-bold mb-10 flex items-center text-white">\n'
    php += f'                <i class="fas fa-award text-orange-500 mr-4"></i>\n'
    php += f'                <span>Chapter Insights</span>\n'
    php += f'            </h2>\n'
    php += f'            <ul class="grid md:grid-cols-2 gap-8">\n'
    for item in data["summary"]:
        php += f'                <li class="flex items-start space-x-4">\n'
        php += f'                    <div class="w-2 h-2 rounded-full bg-orange-500 mt-2"></div>\n'
        php += f'                    <div class="text-slate-300 text-sm leading-relaxed">\n'
        php += f'                        <span class="lang-block" lang="th">{item["th"]}</span>\n'
        php += f'                        <span class="lang-block" lang="en">{item["en"]}</span>\n'
        php += f'                    </div>\n'
        php += f'                </li>\n'
    php += f'            </ul>\n'
    php += f'        </div>\n\n'

    # Navigation Footer
    prev_ch = ch - 1
    next_ch = ch + 1
    php += f'        <div class="flex flex-col md:flex-row justify-between items-center gap-8 pt-20 border-t border-white/5">\n'
    if prev_ch >= 1:
        php += f'            <a href="ch{prev_ch:02d}_vectors.php" class="group flex items-center space-x-4 px-8 py-4 rounded-2xl bg-white/5 border border-white/10 text-slate-400 hover:text-white hover:bg-white/10 transition-all">\n'
        php += f'                <i class="fas fa-arrow-left group-hover:-translate-x-2 transition-transform"></i>\n'
        php += f'                <div class="text-left">\n'
        php += f'                    <span class="block text-[10px] uppercase tracking-widest text-slate-500">Previous</span>\n'
        php += f'                    <span class="font-bold">Chapter {prev_ch}</span>\n'
        php += f'                </div>\n'
        php += f'            </a>\n'
    else:
        php += f'            <a href="../index.php" class="px-8 py-4 rounded-2xl bg-white/5 border border-white/10 text-slate-400 hover:text-white transition-all text-sm font-bold">← Dashboard</a>\n'
    
    if next_ch <= 12:
        php += f'            <a href="ch{next_ch:02d}_motion.php" class="group flex items-center space-x-4 px-10 py-5 rounded-2xl bg-orange-500 text-white hover:bg-orange-600 transition-all shadow-2xl shadow-orange-900/40">\n'
        php += f'                <div class="text-right">\n'
        php += f'                    <span class="block text-[10px] uppercase tracking-widest text-orange-200 opacity-70">Next Module</span>\n'
        php += f'                    <span class="font-bold text-lg">Chapter {next_ch}</span>\n'
        php += f'                </div>\n'
        php += f'                <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>\n'
        php += f'            </a>\n'
    
    php += f'        </div>\n'
    php += f'    </div>\n'
    php += f'</main>\n\n'

    # AOS Initialization
    php += f'<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">\n'
    php += f'<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>\n'
    php += f'<script>AOS.init({{ duration: 800, once: true }});</script>\n\n'

    php += f"<?php include '../includes/footer.php'; ?>\n"
    
    return php

def process_chapter(chapter_num):
    print(f"Processing Chapter {chapter_num}...")
    md_content = get_md_content(chapter_num)
    if not md_content:
        return

    json_data = call_ollama(md_content, chapter_num)
    if json_data:
        php_content = render_php(json_data)
        
        mapping = {
            2: "ch02_vectors.php", 3: "ch03_motion.php", 4: "ch04_newton_laws.php",
            5: "ch05_momentum.php", 6: "ch06_equilibrium.php", 7: "ch07_work_energy.php",
            8: "ch08_simple_machines.php", 9: "ch09_thermodynamics.php", 10: "ch10_electricity.php",
            11: "ch11_optics.php", 12: "ch12_radioactivity.php"
        }
        
        filename = mapping.get(chapter_num, f"ch{chapter_num:02d}_generated.php")
        # Ensure we use consistent filenames if already mapped
        if chapter_num in mapping:
            filename = mapping[chapter_num]
            
        output_path = os.path.join(OUTPUT_DIR, filename)
        
        with open(output_path, "w", encoding="utf-8") as f:
            f.write(php_content)
        print(f"Saved to {output_path}")

if __name__ == "__main__":
    if len(sys.argv) > 1:
        for arg in sys.argv[1:]:
            try:
                process_chapter(int(arg))
            except Exception as e:
                print(f"Error processing {arg}: {e}")
    else:
        print("Usage: python chapter_generator.py <chapter_number>")
