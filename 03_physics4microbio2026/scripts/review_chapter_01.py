import requests
import json

def call_ollama(model, prompt):
    url = "http://localhost:11434/api/generate"
    data = {
        "model": model,
        "prompt": prompt,
        "stream": False
    }
    response = requests.post(url, json=data)
    return response.json()['response']

with open('/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/src/md/chapter_01.md', 'r', encoding='utf-8') as f:
    chapter_content = f.read()

prompt = f"""
คุณคือบรรณาธิการหนังสือเรียนระดับมหาวิทยาลัยและศาสตราจารย์ด้านฟิสิกส์ 
กรุณาตรวจสอบและปรับปรุงเนื้อหาบทที่ 1 (Chapter 1: Measurement and Digital Microbiology) ต่อไปนี้

เนื้อหาปัจจุบัน:
{chapter_content}

สิ่งที่ต้องทำ:
1. ตรวจสอบความถูกต้องของข้อมูลทางฟิสิกส์ (เช่น หน่วย, ค่าคงที่, ตัวเลขในโจทย์ตัวอย่าง)
2. แก้ไขคำผิด (เช่น คำศัพท์ภาษาเวียดนาม 'Thiết kế' ที่หลุดมา)
3. ปรับปรุงสำนวนภาษาไทยให้เป็นวิชาการและทันสมัย (Digital Microbiology era)
4. ตรวจสอบ Math mode (LaTeX) ให้ถูกต้องและสวยงาม
5. เพิ่มเติมหรือขยายความในส่วนที่ยังดูสั้นไปเพื่อให้สมบูรณ์เป็นหนังสือระดับมหาวิทยาลัย

กรุณาแสดงผลลัพธ์ในรูปแบบ Markdown ที่พร้อมใช้งาน
"""

print(call_ollama("gemma4:e2b", prompt))
