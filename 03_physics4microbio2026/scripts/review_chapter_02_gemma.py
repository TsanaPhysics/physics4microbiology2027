import requests
import json
import os

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
    lines = f.readlines()

n = 4
part_size = len(lines) // n
parts = [lines[i:i + part_size] for i in range(0, len(lines), part_size)]

for i, part_lines in enumerate(parts):
    content = "".join(part_lines)
    prompt = f"""
คุณคือบรรณาธิการหนังสือเรียนระดับมหาวิทยาลัยและศาสตราจารย์ด้านฟิสิกส์ 
กรุณาตรวจสอบและปรับปรุงเนื้อหาบทที่ 2 (Vectors) ส่วนที่ {i+1} ต่อไปนี้

เนื้อหา:
{content}

สิ่งที่ต้องทำ:
1. ตรวจสอบความถูกต้องของข้อมูลทางฟิสิกส์และคณิตศาสตร์ (ระวังเรื่องตัวเลขที่อาจจะดูไม่สมเหตุสมผล เช่น ความเร็วที่สูงเกินไป)
2. ปรับปรุงสำนวนภาษาไทยให้เป็นวิชาการและทันสมัย
3. ตรวจสอบ Math mode (LaTeX) ให้ถูกต้อง
4. หากพบข้อผิดพลาดร้ายแรงทางฟิสิกส์ โปรดระบุและเสนอคำตอบที่ถูกต้อง

กรุณาแสดงผลลัพธ์เป็นข้อเสนอแนะในการปรับปรุง
"""
    print(f"--- Reviewing Part {i+1} ---")
    review = call_ollama("gemma4:e2b", prompt)
    print(review)
    print("\n")
