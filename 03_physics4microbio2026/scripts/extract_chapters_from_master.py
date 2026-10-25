import os
import re

# Configuration
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
MD_SOURCE_DIR = os.path.join(BASE_DIR, '../fundamentalphysics2026/fphymicro/src/md/')
MASTER_FILE = os.path.join(MD_SOURCE_DIR, 'full_book_final_2569.md')

def extract_chapters():
    if not os.path.exists(MASTER_FILE):
        print(f"Master file not found: {MASTER_FILE}")
        return

    with open(MASTER_FILE, 'r', encoding='utf-8') as f:
        content = f.read()

    # Split by "# บทที่ X:" headers
    # We use a regex that matches the start of the line
    chapters = re.split(r'(^# บทที่ \d+:.*)', content, flags=re.MULTILINE)
    
    # chapters[0] is frontmatter
    # chapters[1] is header of ch 1
    # chapters[2] is body of ch 1
    
    for i in range(1, len(chapters), 2):
        header = chapters[i]
        body = chapters[i+1]
        
        # Extract number
        match = re.search(r'# บทที่ (\d+):', header)
        if match:
            ch_num = match.group(1).zfill(2)
            filename = f'chapter_{ch_num}.md'
            path = os.path.join(MD_SOURCE_DIR, filename)
            
            print(f"Extracting {filename}...")
            with open(path, 'w', encoding='utf-8') as f:
                f.write(header + body)

if __name__ == "__main__":
    extract_chapters()
