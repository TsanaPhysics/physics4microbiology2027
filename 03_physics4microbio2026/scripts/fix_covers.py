import os
import re

base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
md_base = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/src/md')
tex_base = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/latex/chapters')

for ch in range(1, 13):
    ch_str = str(ch).zfill(2)
    
    # Fix MD
    md_path = os.path.join(md_base, f'chapter_{ch_str}.md')
    if os.path.exists(md_path):
        with open(md_path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        # Replace ./images/chXX.png with ./images/chXX/cover.png
        new_content = re.sub(fr'\./images/ch{ch_str}\.png', f'./images/ch{ch_str}/cover.png', content)
        
        if new_content != content:
            with open(md_path, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Fixed MD: {md_path}")
            
    # Fix TEX
    tex_path = os.path.join(tex_base, f'chapter{ch_str}.tex')
    if os.path.exists(tex_path):
        with open(tex_path, 'r', encoding='utf-8') as f:
            content = f.read()
            
        # Replace {chXX.png} with {chXX/cover.png}
        new_content = re.sub(fr'\{{ch{ch_str}\.png\}}', f'{{ch{ch_str}/cover.png}}', content)
        
        if new_content != content:
            with open(tex_path, 'w', encoding='utf-8') as f:
                f.write(new_content)
            print(f"Fixed TEX: {tex_path}")

print("Cover fix completed.")
