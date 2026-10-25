import os
import re

# Configuration
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
LATEX_DIR = os.path.join(BASE_DIR, '../fundamentalphysics2026/fphymicro/latex/chapters/')

def convert_md_to_tex(text):
    # Split by $ to avoid touching math mode
    parts = re.split(r'(\$.*?\$|\$\$.*?\$\$)', text, flags=re.DOTALL)
    for i in range(len(parts)):
        if i % 2 == 0: # Not math mode
            # 1. Headers (inside summarybox we should probably use bold)
            parts[i] = re.sub(r'^#### (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^### (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^## (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            parts[i] = re.sub(r'^# (.*)', r'\\textbf{\1}', parts[i], flags=re.MULTILINE)
            
            # 2. Bold and Italic (MD to LaTeX)
            parts[i] = re.sub(r'\*\*\*(.*?)\*\*\*', r'\\textbf{\\textit{\1}}', parts[i])
            parts[i] = re.sub(r'\*\*(.*?)\*\*', r'\\textbf{\1}', parts[i])
            parts[i] = re.sub(r'\*(.*?)\*', r'\\textit{\1}', parts[i])
            
            # 3. Special characters
            parts[i] = parts[i].replace('#', r'\#')
            parts[i] = parts[i].replace('&', r'\&')
            parts[i] = parts[i].replace('_', r'\_')
            parts[i] = parts[i].replace('%', r'\%')
            # Remove MD separators
            parts[i] = parts[i].replace('---', r'\hrulefill')
            
    fixed = "".join(parts)
    # Post-fix: sometimes LLM returns \$ which is already escaped, avoid doubling
    fixed = fixed.replace(r'\\$', r'\$')
    return fixed

def fix_all_tex():
    for filename in os.listdir(LATEX_DIR):
        if filename.endswith('.tex'):
            path = os.path.join(LATEX_DIR, filename)
            print(f"Fixing {filename}...")
            with open(path, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # We only want to fix the parts inside summarybox or the refined text
            # But actually, the whole file might have artifacts now
            fixed_content = convert_md_to_tex(content)
            
            # Post-fix: sometimes LLM returns \$ which is already escaped, avoid doubling
            fixed_content = fixed_content.replace(r'\\$', r'\$')
            
            with open(path, 'w', encoding='utf-8') as f:
                f.write(fixed_content)

if __name__ == "__main__":
    fix_all_tex()
