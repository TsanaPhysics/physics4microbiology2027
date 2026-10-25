import os
import re

dir_path = '/Applications/XAMPP/xamppfiles/htdocs/new_book2026/fundamentalphysics2026/fphymicro/latex/chapters/'

def fix_content(content):
    # Fix \text{ ^\circ C}
    content = content.replace(r'\text{ ^\circ C}', r'^\circ \text{C}')
    content = content.replace(r'\text{^\circ C}', r'^\circ \text{C}')
    
    # Fix escaped underscores in technical commands
    # This regex looks for \label{...\_...} and replaces with \label{..._...}
    # It handles multiple underscores in one tag
    def unescape_tech(match):
        return match.group(0).replace(r'\_', '_')
    
    content = re.sub(r'\\(label|ref|cite|xrlink|includegraphics|begin|end)\{.*?\}', unescape_tech, content)
    
    return content

for filename in os.listdir(dir_path):
    if filename.endswith('.tex'):
        path = os.path.join(dir_path, filename)
        with open(path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        new_content = fix_content(content)
        
        with open(path, 'w', encoding='utf-8') as f:
            f.write(new_content)
print("Fixed LaTeX files (Degree and Underscores in tags).")
