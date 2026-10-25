import os
import re

# Configuration
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
MD_SOURCE_DIR = os.path.join(BASE_DIR, '../fundamentalphysics2026/fphymicro/src/md/')

def clean_md(content):
    # Remove everything from "### ส่วนเสริมจากการวิเคราะห์ของ AI" to the next "## \d+\.\d+"
    # Or to the end of the file
    # We use a non-greedy match for everything in between
    # But we want to keep the next section header
    pattern = r'### ส่วนเสริมจากการวิเคราะห์ของ AI.*?(?=\n## \d+\.\d+|$)'
    cleaned = re.sub(pattern, '', content, flags=re.DOTALL)
    return cleaned

def clean_all_md():
    for i in range(1, 13):
        ch_num = str(i).zfill(2)
        path = os.path.join(MD_SOURCE_DIR, f'chapter_{ch_num}.md')
        if os.path.exists(path):
            print(f"Cleaning {path}...")
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()
            cleaned = clean_md(content)
            with open(path, 'w', encoding='utf-8') as f:
                f.write(cleaned)

if __name__ == "__main__":
    clean_all_md()
