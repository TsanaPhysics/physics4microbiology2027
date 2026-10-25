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
    return response.json()['response']

file_path = '/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/src/md/chapter_01.md'
with open(file_path, 'r', encoding='utf-8') as f:
    lines = f.readlines()

# Split into 2 parts
half = len(lines) // 2
parts = [lines[:half], lines[half:]]

for i, part_lines in enumerate(parts):
    content = "".join(part_lines)
    prompt = f"""
คุณคือบรรณาธิการหนังสือเรียนระดับมหาวิทยาลัยและศาสตราจารย์ด้านฟิสิกส์ 
กรุณาตรวจสอบและปรับปรุงเนื้อหาบทที่ 1 ส่วนที่ {i+1} ต่อไปนี้

เนื้อหา:
{content}

สิ่งที่ต้องทำ:
1. ตรวจสอบความถูกต้องของข้อมูลทางฟิสิกส์และคณิตศาสตร์
2. ปรับปรุงสำนวนภาษาไทยให้เป็นวิชาการและทันสมัย (Digital Microbiology era)
3. ตรวจสอบ Math mode (LaTeX) ให้ถูกต้อง
4. หากมีส่วนใดที่สามารถเพิ่มตัวอย่างหรือคำอธิบายเพื่อให้สมบูรณ์ขึ้น โปรดระบุ

กรุณาแสดงผลลัพธ์เป็นข้อเสนอแนะในการปรับปรุง หรือเนื้อหาที่แก้ไขแล้ว (ถ้าแก้ไขไม่มาก)
"""
    print(f"--- Reviewing Part {i+1} ---")
    review = call_ollama("gemma4:e2b", prompt)
    print(review)
    print("\n")
