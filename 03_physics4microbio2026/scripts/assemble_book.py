import os
import re

# Configuration
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
MD_SOURCE_DIR = os.path.join(BASE_DIR, '../fundamentalphysics2026/fphymicro/src/md/')
MASTER_FILE = os.path.join(MD_SOURCE_DIR, 'full_book_final_2569.md')
OUTPUT_FILE = os.path.join(MD_SOURCE_DIR, 'full_book_final_2569.md') # Overwrite or new? User said "Rebuilding the master"

def assemble_book():
    print(f"Rebuilding master book: {MASTER_FILE}")
    
    # 1. Read the original master to get frontmatter and backmatter
    with open(MASTER_FILE, 'r', encoding='utf-8') as f:
        master_lines = f.readlines()
    
    # Find frontmatter (up to Chapter 1)
    # The grep earlier showed Chapter 1 starts at 372
    frontmatter = master_lines[:371]
    
    # Find backmatter (from Appendix onwards)
    # The grep earlier showed Appendix starts at 2597
    # Note: line 2597 is index 2596
    backmatter = master_lines[2596:]
    
    # 2. Assemble new content
    new_content = "".join(frontmatter)
    
    for i in range(1, 13):
        ch_num = str(i).zfill(2)
        ch_path = os.path.join(MD_SOURCE_DIR, f'chapter_{ch_num}.md')
        
        if os.path.exists(ch_path):
            print(f"  Adding Chapter {ch_num} from {ch_path}")
            with open(ch_path, 'r', encoding='utf-8') as f:
                ch_content = f.read()
                # Ensure it starts with a newline if it doesn't
                if not new_content.endswith('\n'):
                    new_content += '\n'
                new_content += ch_content
                new_content += '\n\n---\n\n'
        else:
            print(f"  Warning: Chapter {ch_num} not found at {ch_path}")
            
    # Add backmatter
    new_content += "".join(backmatter)
    
    # 3. Write to output
    with open(OUTPUT_FILE, 'w', encoding='utf-8') as f:
        f.write(new_content)
        
    print(f"Assembly completed: {OUTPUT_FILE}")

if __name__ == "__main__":
    assemble_book()
