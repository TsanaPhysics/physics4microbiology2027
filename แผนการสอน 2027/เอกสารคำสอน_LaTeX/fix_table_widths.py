#!/usr/bin/env python3
"""
Polishes table column widths and replaces unbroken dot strings with \dotfill
to eliminate Overfull \hbox warnings across all chapters and frontmatter/backmatter.
"""
import os
import re
import glob

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX"

# 1. Update chapters/*.tex: replace 20+ dots with \dotfill and add \setlength{\tabcolsep}{4pt} in lab tables
for path in glob.glob(os.path.join(BASE_DIR, "chapters", "*.tex")):
    with open(path, "r", encoding="utf-8") as f:
        txt = f.read()

    # Replace long unbroken dot strings (15 or more dots) with \dotfill
    txt = re.sub(r"\.{15,}", r"\\dotfill", txt)

    # Add \setlength{\tabcolsep}{4pt} right after \footnotesize in lab tables
    txt = txt.replace("\\begin{center}\n\\footnotesize\n\\begin{tabularx}{0.96\\textwidth}",
                      "\\begin{center}\n\\footnotesize\\setlength{\\tabcolsep}{3.5pt}\n\\begin{tabularx}{\\linewidth}")

    with open(path, "w", encoding="utf-8") as f:
        f.write(txt)

# 2. Fix syllabus.tex 15-week table column widths so "กลยุทธ์การสอน OBE" has plenty of room
syl_path = os.path.join(BASE_DIR, "frontmatter", "syllabus.tex")
with open(syl_path, "r", encoding="utf-8") as f:
    syl = f.read()

syl = syl.replace(
    r"\footnotesize" + "\n" + r"\begin{tabularx}{\textwidth}{c >{\raggedright\arraybackslash}p{4.3cm} >{\raggedright\arraybackslash}p{4.4cm} >{\raggedright\arraybackslash}X c}",
    r"\footnotesize\setlength{\tabcolsep}{4pt}" + "\n" + r"\begin{tabularx}{\textwidth}{c >{\raggedright\arraybackslash}p{3.9cm} >{\raggedright\arraybackslash}p{4.0cm} >{\raggedright\arraybackslash}X c}"
)
syl = syl.replace(
    r"\begin{tabularx}{\textwidth}{>{\bfseries}p{2.2cm} >{\raggedright\arraybackslash}X >{\bfseries}p{2.8cm} >{\raggedright\arraybackslash}X}",
    r"\begin{tabularx}{\textwidth}{>{\raggedright\arraybackslash\bfseries}p{2.0cm} >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash\bfseries}p{2.8cm} >{\raggedright\arraybackslash}X}"
)
with open(syl_path, "w", encoding="utf-8") as f:
    f.write(syl)

# 3. Fix appendix_lowmath.tex first column raggedright
app_path = os.path.join(BASE_DIR, "backmatter", "appendix_lowmath.tex")
with open(app_path, "r", encoding="utf-8") as f:
    app = f.read()

app = app.replace(
    r"\begin{tabularx}{\textwidth}{>{\bfseries}p{3.4cm} p{4.6cm} >{\raggedright\arraybackslash}X}",
    r"\begin{tabularx}{\textwidth}{>{\raggedright\arraybackslash\bfseries}p{3.3cm} p{4.5cm} >{\raggedright\arraybackslash}X}"
)
app = app.replace(
    r"\begin{tabularx}{\textwidth}{>{\bfseries}p{1.8cm} >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}",
    r"\begin{tabularx}{\textwidth}{>{\raggedright\arraybackslash\bfseries}p{2.2cm} >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}"
)
with open(app_path, "w", encoding="utf-8") as f:
    f.write(app)

print("[OK] Updated table column widths and dotfills.")
