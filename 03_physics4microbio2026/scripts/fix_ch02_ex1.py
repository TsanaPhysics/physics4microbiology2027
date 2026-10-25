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
    try:
        return response.json()['response']
    except:
        return f"Error: {response.text}"

example1 = """**หัวข้อ:** การคำนวณความเร็วสัมพัทธ์และการประมวลผลข้อมูลการเคลื่อนที่ของแบคทีเรียในระบบ Microfluidics

**สถานการณ์:**
นักศึกษาทำการทดลองวัดการเคลื่อนที่ของกลุ่มแบคทีเรีย *E. coli* ผ่านช่องทาง Microfluidic โดยใช้ระบบการไหลแบบปั๊ม (Flow System) เพื่อสร้าง Gradient ของสารอาหาร (Nutrient Gradient)

**ข้อมูลที่วัดได้ (Scalar Data):**
1. อัตราการไหลของสารละลาย (Flow Rate, $Q$): $5.0 \times 10^{-6} \text{ m}^3/\text{s}$
2. ความหนืดของสารละลาย (Viscosity, $\mu$): $1.5 \times 10^{-3} \text{ Pa}\cdot\text{s}$
3. ขนาดเฉลี่ยของเซลล์แบคทีเรีย (Average Cell Diameter, $d$): $2.5 \times 10^{-6} \text{ m}$
4. เวลาที่ใช้ในการเคลื่อนที่ผ่านช่องทาง ($t$): $10 \text{ s}$

**โจทย์:**
จงคำนวณความเร็วเฉลี่ยของเซลล์แบคทีเรีย ($\vec{v}$) ที่เคลื่อนที่ผ่านช่องทาง โดยพิจารณาผลกระทบของแรงต้านการไหล (Drag Force) และประมวลผลในรูปแบบของปริมาณเวกเตอร์"""

prompt = f"""
คุณคือศาสตราจารย์ด้านฟิสิกส์
กรุณาแก้ไขโจทย์ตัวอย่างต่อไปนี้ให้ถูกต้องตามหลักฟิสิกส์ (ระวัง: ความเร็วใน Microfluidics ไม่ควรเป็น 500 m/s)
ปรับปรุงค่าตัวเลขให้สมเหตุสมผล (เช่น ใช้หน่วย uL/min) และแสดงขั้นตอนการคำนวณที่ถูกต้อง

โจทย์เดิม:
{example1}

คำตอบที่ต้องการ:
1. ปรับตัวเลขให้สมจริง (เช่น Q = 5 uL/min)
2. ใช้สมการที่ถูกต้อง (เช่น Stokes' Law)
3. แสดงผลในรูปแบบ Markdown ที่สวยงาม
"""

print(call_ollama("gemma4:e2b", prompt))
