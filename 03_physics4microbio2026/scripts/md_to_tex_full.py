import os
import re
from ai_source_optimizer import convert_md_to_tex

md_dir = '/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/src/md/'
tex_dir = '/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/latex/chapters/'

def md_to_tex_file(md_filename, tex_filename):
    md_path = os.path.join(md_dir, md_filename)
    tex_path = os.path.join(tex_dir, tex_filename)
    
    if not os.path.exists(md_path):
        print(f"Skipping {md_filename} (not found)")
        return

    with open(md_path, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Pre-process MD: keep section headers as is, convert body
    # Actually convert_md_to_tex handles headers now.
    
    tex_content = convert_md_to_tex(content)
    
    # Fix the chapter title - usually first line # Chapter Title
    # convert_md_to_tex converts # Title to \textbf{Title}
    # We want \chapter{Title}
    tex_content = re.sub(r'\\textbf\{(.*?)\}', r'\\chapter{\1}', tex_content, count=1)
    
    # Convert remaining \textbf headers to \section
    # The convert_md_to_tex already does this if it starts with ##
    # But wait, it converts all to \textbf.
    # Let's fix that.
    
    with open(tex_path, 'w', encoding='utf-8') as f:
        f.write(tex_content)
    print(f"Converted {md_filename} -> {tex_filename}")

# Process chapters 01 to 12
for i in range(1, 13):
    md_to_tex_file(f"chapter_{i:02d}.md", f"chapter{i:02d}.tex")

# Process Introduction
md_to_tex_file("introduction.md", "chapter00.tex")

print("All chapters re-converted from Markdown.")
