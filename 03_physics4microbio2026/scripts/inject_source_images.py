import os
import re
import sys

def get_img_score(filename, text):
    score = 0
    words = filename.split('.')[0].replace('-', '_').split('_')
    for w in words:
        if len(w) > 1 and w.lower() in text.lower():
            score += 10
    return score

def inject_markdown(ch_num, img_dir, md_path):
    if not os.path.exists(md_path):
        return
    
    with open(md_path, 'r', encoding='utf-8') as f:
        content = f.read()
        
    available_images = [f for f in os.listdir(img_dir) if f.lower().endswith(('.png', '.jpg', '.jpeg')) and f != 'cover.png']
    if not available_images:
        print(f"No images to inject for {md_path}")
        return
        
    # Find all sections that look like '## 1.1 Title'
    sections = []
    for match in re.finditer(r'(## \d+\.\d+.*?)\n(.*?)(?=\n## |\Z)', content, re.DOTALL):
        header = match.group(1)
        body = match.group(2)
        sections.append({'header': header, 'body': body, 'start': match.start(), 'end': match.end()})
        
    for img in available_images:
        # Check if already injected
        if img in content:
            continue
            
        best_section = None
        best_score = 0
        for sec in sections:
            score = get_img_score(img, sec['header'] + '\n' + sec['body'])
            if score > best_score:
                best_score = score
                best_section = sec
                
        if best_section and best_score > 0:
            clean_name = img.split('.')[0].replace('_', ' ').title()
            img_tag = f"\n\n![{clean_name}](./images/ch{ch_num}/{img})\n"
            
            # Inject right after the header
            header_str = best_section['header']
            content = content.replace(header_str, header_str + img_tag, 1)
            print(f"Injected {img} into MD {md_path} under {header_str}")
            
    with open(md_path, 'w', encoding='utf-8') as f:
        f.write(content)

def inject_latex(ch_num, img_dir, tex_path):
    if not os.path.exists(tex_path):
        return
        
    with open(tex_path, 'r', encoding='utf-8') as f:
        content = f.read()
        
    available_images = [f for f in os.listdir(img_dir) if f.lower().endswith(('.png', '.jpg', '.jpeg')) and f != 'cover.png']
    if not available_images:
        print(f"No images to inject for {tex_path}")
        return
        
    # Find all sections that look like '\section{...}'
    sections = []
    for match in re.finditer(r'(\\section\{.*?\})\n(.*?)(?=\n\\section|\Z)', content, re.DOTALL):
        header = match.group(1)
        body = match.group(2)
        sections.append({'header': header, 'body': body})
        
    for img in available_images:
        # Check if already injected
        if img in content:
            continue
            
        best_section = None
        best_score = 0
        for sec in sections:
            score = get_img_score(img, sec['header'] + '\n' + sec['body'])
            if score > best_score:
                best_score = score
                best_section = sec
                
        if best_section and best_score > 0:
            clean_name = img.split('.')[0].replace('_', ' ').title()
            label_name = img.split('.')[0].replace('-', '_')
            
            img_tag = f"\n\n\\begin{{figure}}[h]\n    \\centering\n    \\includegraphics[width=0.7\\textwidth]{{ch{ch_num}/{img}}}\n    \\caption{{{clean_name}}}\n    \\label{{fig:{label_name}}}\n\\end{{figure}}\n"
            
            # Inject right after the header
            header_str = best_section['header']
            content = content.replace(header_str, header_str + img_tag, 1)
            print(f"Injected {img} into TEX {tex_path} under {header_str}")
            
    with open(tex_path, 'w', encoding='utf-8') as f:
        f.write(content)

def main():
    base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
    img_base = os.path.join(base_dir, 'images')
    md_base = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/src/md')
    tex_base = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/latex/chapters')
    
    # Process chapters 01 to 12
    chapters = [str(i).zfill(2) for i in range(1, 13)]
    
    if len(sys.argv) > 1:
        chapters = [sys.argv[1].zfill(2)]
        
    for ch in chapters:
        img_dir = os.path.join(img_base, f'ch{ch}')
        if not os.path.exists(img_dir):
            continue
            
        md_path = os.path.join(md_base, f'chapter_{ch}.md')
        tex_path = os.path.join(tex_base, f'chapter{ch}.tex')
        
        print(f"\nProcessing Chapter {ch}...")
        inject_markdown(ch, img_dir, md_path)
        inject_latex(ch, img_dir, tex_path)
        
    print("\nInjection completed.")

if __name__ == "__main__":
    main()
