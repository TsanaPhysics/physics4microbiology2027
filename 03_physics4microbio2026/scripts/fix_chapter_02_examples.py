import requests
import json
import re

def call_ollama(model, prompt):
    url = "http://localhost:11434/api/generate"
    data = {
        "model": model,
        "prompt": prompt,
        "stream": False
    }
    response = requests.post(url, json=data)
    try:
        return response.json()['response']
    except:
        return f"Error: {response.text}"

file_path = '/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/src/md/chapter_02.md'
with open(file_path, 'r', encoding='utf-8') as f:
    full_content = f.read()

# Find all "Solved Advanced Example" blocks
# Looking for blocks starting with "## 1. ตัวอย่างการคำนวณ" until the next section
examples = re.findall(r'(## 1\. ตัวอย่างการคำนวณแบบละเอียด.*?\n---)', full_content, re.DOTALL)

for i, example in enumerate(examples):
    prompt = f"""
คุณคือศาสตราจารย์ด้านฟิสิกส์และ Digital Microbiology
กรุณาตรวจสอบและปรับปรุงโจทย์ตัวอย่าง (Solved Example) ต่อไปนี้
ระวังเรื่องความสมเหตุสมผลของตัวเลข (เช่น ความเร็วใน Microfluidics ไม่ควรเป็น 500 m/s) และความถูกต้องของสูตรฟิสิกส์

โจทย์เดิม:
{example}

สิ่งที่ต้องทำ:
1. แก้ไขตัวเลขให้สมจริง (เช่น อัตราการไหลควรอยู่ในหน่วย uL/min หรือ nL/s)
2. แก้ไขขั้นตอนการคำนวณให้ถูกต้องตามหลักฟิสิกส์ (เช่น Stokes' Law, Vector addition)
3. เพิ่ม Python Code ตัวอย่างประกอบโจทย์
4. ใช้ภาษาไทยในการอธิบาย (ยกเว้นคำศัพท์เทคนิค)

กรุณาให้คำตอบในรูปแบบ Markdown ที่สวยงาม
"""
    print(f"--- DeepSeek Reasoning for Example {i+1} ---")
    # Using deepseek-r1 for reasoning
    refined = call_ollama("deepseek-r1:latest", prompt)
    print(refined)
    print("\n")
