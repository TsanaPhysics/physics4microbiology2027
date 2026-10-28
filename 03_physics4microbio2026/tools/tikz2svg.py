#!/usr/bin/env python3
"""
tikz2svg.py — ดึงแผนภาพ TikZ ทุกภาพ (ภายใน \\begin{figure}) จากเอกสารคำสอน main.tex
คอมไพล์ด้วย XeLaTeX + physics_microbio_style.sty (ฟอนต์ Sarabun ชุดเดียวกับเอกสาร)
แล้วแปลงเป็น SVG ด้วย pdftocairo → images/maintex/tikz/chNN_tikzK.svg

Usage:  python3 tools/tikz2svg.py
"""
import os
import re
import shutil
import subprocess
import tempfile

from tex2web import CHAPTER_FILES, TEX, OUT_IMG, strip_comments, find_env_end

XELATEX = shutil.which("xelatex") or "/Library/TeX/texbin/xelatex"
PDFTOCAIRO = shutil.which("pdftocairo") or "/opt/homebrew/bin/pdftocairo"


def collect():
    items = []
    for idx, f in enumerate(CHAPTER_FILES, start=1):
        s = strip_comments(open(os.path.join(TEX, "chapters", f + ".tex"), encoding="utf-8").read())
        k = 0
        for m in re.finditer(r"\\begin\{figure\}", s):
            e, _ = find_env_end(s, "figure", m.end())
            fig = s[m.end():e]
            t = re.search(r"\\begin\{tikzpicture\}", fig)
            if not t:
                continue
            te, tafter = find_env_end(fig, "tikzpicture", t.end())
            k += 1
            items.append((idx, k, fig[t.start():tafter]))
    return items


def main():
    items = collect()
    out_dir = os.path.join(OUT_IMG, "tikz")
    os.makedirs(out_dir, exist_ok=True)
    body = "\n\\clearpage\n".join(code for _, _, code in items)
    doc = ("\\documentclass[12pt, a4paper, oneside]{book}\n"
           "\\usepackage{styles/physics_microbio_style}\n"
           "\\usepackage[active,tightpage]{preview}\n"
           "\\PreviewEnvironment{tikzpicture}\n"
           "\\setlength\\PreviewBorder{6pt}\n"
           "\\pagestyle{empty}\n\\begin{document}\n" + body + "\n\\end{document}\n")
    work = tempfile.mkdtemp(prefix="tikz2svg_")
    with open(os.path.join(work, "figs.tex"), "w", encoding="utf-8") as fp:
        fp.write(doc)
    env = dict(os.environ, TEXINPUTS=TEX + "//:" + os.environ.get("TEXINPUTS", ""))
    r = subprocess.run([XELATEX, "-interaction=nonstopmode", "-halt-on-error", "figs.tex"],
                       cwd=work, env=env, capture_output=True, text=True)
    pdf = os.path.join(work, "figs.pdf")
    if not os.path.exists(pdf):
        print(r.stdout[-3000:])
        raise SystemExit("xelatex failed")
    for page, (ch, k, _) in enumerate(items, start=1):
        dst = os.path.join(out_dir, f"ch{ch:02d}_tikz{k}.svg")
        subprocess.run([PDFTOCAIRO, "-svg", "-f", str(page), "-l", str(page), pdf, dst], check=True)
        print("ok", os.path.relpath(dst, OUT_IMG), os.path.getsize(dst) // 1024, "KB")
    shutil.rmtree(work, ignore_errors=True)


if __name__ == "__main__":
    main()

