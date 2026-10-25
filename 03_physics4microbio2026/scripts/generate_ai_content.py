import os
import json
import subprocess
import re

def run_ollama(prompt):
    try:
        process = subprocess.Popen(
            ['ollama', 'run', 'gemma4:e2b'],
            stdin=subprocess.PIPE,
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE,
            text=True,
            encoding='utf-8'
        )
        stdout, stderr = process.communicate(input=prompt, timeout=300)
        return stdout.strip()
    except Exception as e:
        return f"Error: {str(e)}"

def generate_section_content(ch_title, section_title, section_text):
    prompt = f"""
    คุณคือผู้ช่วยศาสตราจารย์ด้านฟิสิกส์และจุลชีววิทยา 
    จงสร้างเนื้อหาเสริมสำหรับหนังสือ "ฟิสิกส์สำหรับจุลชีววิทยา 2026" 
    ในหัวข้อ: {ch_title} -> {section_title}
    
    เนื้อหาต้นฉบับ:
    {section_text}
    
    กรุณาสร้างเนื้อหาในรูปแบบ JSON โดยมีคีย์ดังนี้:
    1. "description": คำอธิบายเนื้อหาเชิงลึกที่เข้าใจง่าย (ประมาณ 3-5 ประโยค)
    2. "summary_table": ตารางสรุปประเด็นสำคัญ (เป็น Markdown table)
    3. "examples": ตัวอย่างการประยุกต์ใช้หรือการคำนวณ 1-2 ตัวอย่าง
    4. "diagram_text": คำอธิบายภาพหรือแผนผังประกอบ (สรุปเป็นลำดับขั้นตอน)
    5. "exercises": โจทย์แบบฝึกหัดท้ายหัวข้อ 2 ข้อ พร้อมคำใบ้
    
    ตอบกลับเฉพาะ JSON เท่านั้น
    """
    
    response = run_ollama(prompt)
    # Extract JSON if there's surrounding text
    json_match = re.search(r'\{.*\}', response, re.DOTALL)
    if json_match:
        try:
            return json.loads(json_match.group(0))
        except:
            return {"raw_response": response}
    return {"error": "Failed to generate JSON", "raw": response}

def main():
    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    md_dir = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/src/md')
    out_dir = os.path.join(base_dir, 'data/ai_content')
    
    if not os.path.exists(out_dir):
        os.makedirs(out_dir)
        
    for i in range(1, 13):
        ch_str = str(i).zfill(2)
        md_path = os.path.join(md_dir, f'chapter_{ch_str}.md')
        if not os.path.exists(md_path): continue
        
        print(f"Processing Chapter {ch_str}...")
        with open(md_path, 'r', encoding='utf-8') as f:
            content = f.read()
            
        # Basic split by sections
        sections = re.split(r'\n## ', content)
        ch_title = sections[0].split('\n')[0].replace('# ', '')
        
        ai_data = {}
        for sec in sections[1:5]: # Just first 4 sections for speed/test
            lines = sec.split('\n')
            sec_title = lines[0]
            sec_text = '\n'.join(lines[1:])
            
            print(f"  Generating AI content for: {sec_title}")
            ai_data[sec_title] = generate_section_content(ch_title, sec_title, sec_text)
            
        with open(os.path.join(out_dir, f'ch{ch_str}.json'), 'w', encoding='utf-8') as f:
            json.dump(ai_data, f, ensure_ascii=False, indent=2)

if __name__ == "__main__":
    main()
