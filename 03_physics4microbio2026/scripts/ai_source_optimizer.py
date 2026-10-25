import os
import re
import json
import subprocess
import sys

def run_ollama(model, prompt):
    try:
        process = subprocess.Popen(
            ['ollama', 'run', model],
            stdin=subprocess.PIPE,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
            text=True,
            encoding='utf-8'
        )
        stdout, stderr = process.communicate(input=prompt, timeout=600)
        return stdout.strip()
    except Exception as e:
        return f"Error: {str(e)}"

def optimize_text_gemma(text):
    prompt = f"""
    คุณคือผู้เชี่ยวชาญด้านภาษาไทยและอาจารย์มหาวิทยาลัย 
    จงปรับปรุงเนื้อหาบรรยายทางฟิสิกส์ต่อไปนี้ให้มีความลึกซึ้งทางวิชาการ (Academic Depth) 
    แต่ยังคงความสละสลวยและอ่านง่าย โดยเน้นการเชื่อมโยงกับงานวิจัยด้านจุลชีววิทยาสมัยใหม่
    
    เนื้อหาเดิม:
    {text}
    
    จงเขียนใหม่ให้มีความยาวประมาณ 2-3 ย่อหน้า (ตอบกลับเฉพาะเนื้อหาภาษาไทยที่ปรับปรุงแล้วเท่านั้น)
    """
    return run_ollama('gemma4:e2b', prompt)

def generate_math_gemma(text):
    prompt = f"""
    คุณคือศาสตราจารย์ด้านฟิสิกส์และคณิตศาสตร์ที่มีความเชี่ยวชาญด้าน Digital Microbiology
    จากเนื้อหาด้านล่างนี้ จงสร้าง:
    1. ตัวอย่างการคำนวณแบบละเอียด (Solved Advanced Example) 1 ตัวอย่าง
    2. โจทย์ท้าทายแบบ PBL (Problem-Based Learning) 2 ข้อสำหรับนักศึกษา
    
    โจทย์ต้องเชื่อมโยงกับข้อมูลจริงในห้องปฏิบัติการจุลชีววิทยา (เช่น ขนาดเซลล์, อัตราการไหล, อุณหภูมิเพาะเลี้ยง, การประมวลผลข้อมูล AI)
    
    เนื้อหา:
    {text}
    
    ตอบเป็นภาษาไทยเท่านั้น และไม่ต้องแสดงกระบวนการคิด (Thinking process) ให้ตอบเฉพาะเนื้อหาที่จะนำไปใช้งานจริง
    """
    return run_ollama('gemma4:e2b', prompt)

def clean_ai_output(text):
    # Remove "Thinking..." and "...done thinking" blocks often seen in some models
    text = re.sub(r'<thinking>.*?</thinking>', '', text, flags=re.DOTALL | re.IGNORECASE)
    text = re.sub(r'thinking\.\.\..*?done thinking\.', '', text, flags=re.DOTALL | re.IGNORECASE)
    text = re.sub(r'here\'s a thinking process.*?\n\n', '', text, flags=re.DOTALL | re.IGNORECASE)
    return text.strip()

def process_markdown(ch_num):
    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    md_path = os.path.join(base_dir, f'../fundamentalphysics2026/fphymicro/src/md/chapter_{ch_num}.md')
    
    if not os.path.exists(md_path):
        print(f"File not found: {md_path}")
        return

    print(f"Optimizing Markdown: {md_path}")
    with open(md_path, 'r', encoding='utf-8') as f:
        content = f.read()

    # Split by sections (## 1.1 ...)
    sections = re.split(r'\n(## \d+\.\d+.*?)\n', content)
    new_content = sections[0] # Header and Intro
    
    for i in range(1, len(sections), 2):
        sec_header = sections[i]
        sec_body = sections[i+1]
        
        # Split body into text and existing exercises (if any)
        parts = re.split(r'### ', sec_body)
        main_text = parts[0].strip()
        
        print(f"  Processing section: {sec_header}")
        
        # Optimize with Gemma
        print("    Refining text with Gemma 4...")
        refined_text = clean_ai_output(optimize_text_gemma(main_text))
        
        # Generate math with Gemma (Replacing unstable Qwen)
        print("    Generating math with Gemma...")
        math_content = clean_ai_output(generate_math_gemma(main_text))
        
        new_content += f"\n{sec_header}\n\n{refined_text}\n\n### ส่วนเสริมจากการวิเคราะห์ของ AI\n{math_content}\n"
        
        if len(parts) > 1:
            for p in parts[1:]:
                new_content += f"\n### {p}"

    with open(md_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("Markdown optimization completed.")

def convert_md_to_tex(text):
    # Split by $ to avoid touching math mode
    parts = re.split(r'(\$\$.*?\$\$|\$.*?\$)', text, flags=re.DOTALL)
    for i in range(len(parts)):
        if i % 2 == 0: # Not math mode
            # 1. Headers (Allow optional leading space)
            parts[i] = re.sub(r'^[ \t]*#### (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^[ \t]*### (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^[ \t]*## (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^[ \t]*# (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            
            # 2. Bold and Italic
            parts[i] = re.sub(r'\*\*\*(.*?)\*\*\*', r'\\textbf{\\textit{\1}}', parts[i])
            parts[i] = re.sub(r'\*\*(.*?)\*\*', r'\\textbf{\1}', parts[i])
            parts[i] = re.sub(r'\*(.*?)\*', r'\\textit{\1}', parts[i])
            
            # 3. Special characters (only in non-math parts)
            parts[i] = parts[i].replace('#', r'\#')
            parts[i] = parts[i].replace('&', r'\&')
            parts[i] = parts[i].replace('%', r'\%')
            parts[i] = parts[i].replace('_', r'\_')
            # For ^ we use \^{} which is safe in both text and math-like text
            parts[i] = parts[i].replace('^', r'\^{}')
            
            # 4. Blockquotes
            parts[i] = re.sub(r'^> (.*)', r'\\begin{quote}\1\\end{quote}', parts[i], flags=re.MULTILINE)
            
    text = "".join(parts)
    
    # 5. Protect specific LaTeX commands (labels, refs, etc.)
    protected_commands = []
    def protect(match):
        protected_commands.append(match.group(0))
        return f"LATEXPROTECT{len(protected_commands)-1}Z"
    
    text = re.sub(r'(\\label\{.*?\}|\\ref\{.*?\}|\\cite\{.*?\}|\\include\{.*?\}|\\input\{.*?\}|\\includegraphics\{.*?\}|\\xrlink\{.*?\}|\\begin\{.*?\}|\\end\{.*?\}|\$\$.*?\$\$|\$.*?\$)', protect, text, flags=re.DOTALL)
    
    # 6. Global replacements (safe after protection)
    text = text.replace('---', r'\hrulefill')
    text = text.replace(r'^\circ C', r'$^\circ\text{C}$')
    text = text.replace(r'^\circC', r'$^\circ\text{C}$')
    
    # 7. Restore protected commands
    for i, cmd in enumerate(protected_commands):
        text = text.replace(f"LATEXPROTECT{i}Z", cmd)
        
    fixed = text
    fixed = fixed.replace(r'\\$', r'\$')
    return fixed

def process_latex(ch_num):
    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    tex_path = os.path.join(base_dir, f'../fundamentalphysics2026/fphymicro/latex/chapters/chapter{ch_num}.tex')
    
    if not os.path.exists(tex_path):
        print(f"File not found: {tex_path}")
        return

    print(f"Optimizing LaTeX: {tex_path}")
    with open(tex_path, 'r', encoding='utf-8') as f:
        content = f.read()

    # Similar logic for LaTeX sections
    sections = re.split(r'(\\section\{.*?\})\n', content)
    new_content = sections[0]
    
    for i in range(1, len(sections), 2):
        sec_header = sections[i]
        sec_body = sections[i+1]
        
        # Skip if too short or meta-data
        if len(sec_body.strip()) < 50:
            new_content += f"\n{sec_header}\n{sec_body}"
            continue
            
        print(f"  Processing LaTeX section: {sec_header}")
        
        # Clean LaTeX tags for LLM consumption
        clean_text = re.sub(r'\\[a-z]+\{.*?\}', '', sec_body)
        
        refined_text = clean_ai_output(optimize_text_gemma(clean_text))
        math_content = clean_ai_output(generate_math_gemma(clean_text))
        
        # Convert MD artifacts from LLM to LaTeX
        refined_tex = convert_md_to_tex(refined_text)
        math_tex = convert_md_to_tex(math_content)
        
        new_content += f"\n{sec_header}\n\n{refined_tex}\n\n\\begin{{summarybox}}{{Advanced Insights (AI)}}\n{math_tex}\n\\end{{summarybox}}\n"

    with open(tex_path, 'w', encoding='utf-8') as f:
        f.write(new_content)
    print("LaTeX optimization completed.")

def process_all_chapters():
    for i in range(1, 13):
        ch = str(i).zfill(2)
        print(f"\n{'='*20} Processing Chapter {ch} {'='*20}")
        process_markdown(ch)
        process_latex(ch)

if __name__ == "__main__":
    if len(sys.argv) > 1:
        if sys.argv[1] == "all":
            process_all_chapters()
        else:
            ch = sys.argv[1].zfill(2)
            process_markdown(ch)
            process_latex(ch)
    else:
        # Default to all if no arg provided for convenience
        process_all_chapters()
