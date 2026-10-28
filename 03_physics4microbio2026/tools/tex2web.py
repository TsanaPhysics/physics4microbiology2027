#!/usr/bin/env python3
"""
tex2web.py — แปลงเอกสารคำสอน main.tex (ฉบับ 3D AR ArUco) เป็นข้อมูล JSON สำหรับเว็บ
รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Single Source of Truth = main.tex)

Output
  data/maintex/chNN.json        เนื้อหาบทที่ NN (แผนบริหารการสอน, หัวข้อ, ปฏิบัติการ, คำถามท้ายบท)
  data/curriculum_map.json      แผนที่หลักสูตร 15 สัปดาห์ (บท ↔ Lab ↔ ArUco ↔ ไฟล์เว็บ ↔ ตัวจำลอง)
  images/maintex/sec_3d/*.jpg   ภาพประกอบหัวข้อ (คัดลอกจากเอกสารคำสอน)
  images/maintex/tikz/*.svg     แผนภาพ TikZ (สร้างโดย tikz2svg.py)

Usage:  python3 tools/tex2web.py
"""
import html
import json
import os
import re
import shutil

HERE = os.path.dirname(os.path.abspath(__file__))
WEB = os.path.dirname(HERE)                                   # 03_physics4microbio2026
ROOT = os.path.dirname(WEB)                                   # physics4microbioloy2027
TEX = os.path.join(ROOT, "แผนการสอน 2027", "เอกสารคำสอน_3D_AR_ArUco")
OUT_DATA = os.path.join(WEB, "data", "maintex")
OUT_IMG = os.path.join(WEB, "images", "maintex")
IMG_URL = "images/maintex"                                    # relative to WEB root

# --------------------------------------------------------------------------
# Course map (week ↔ chapter ↔ lab) — ยึดตาม frontmatter/syllabus.tex
# --------------------------------------------------------------------------
CHAPTER_FILES = [
    "ch01_units_measurement", "ch02_vectors_motion", "ch03_newton_viscosity",
    "ch04_work_energy_centrifuge", "ch05_heat_incubator", "ch06_thermodynamics_autoclave",
    "ch07_electrostatics_staining", "ch08_current_electrophoresis", "ch09_optics_refraction",
    "ch10_microscope_immersion_oil", "ch11_radioactivity_uv_sterilization",
    "ch12_spectrophotometry_project",
]
# Lab number -> (chapter, week, web file slug, simulator file)
LAB_MAP = {
    1:  (1, 1,  "lab01_measurement",          "sim_micropipette_3d.html"),
    2:  (2, 2,  "lab02_brownian_motion",      "sim02_brownian_motion_3d.html"),
    3:  (3, 3,  "lab03_viscosity",            "sim03_viscometer_3d.html"),
    4:  (4, 4,  "lab04_centrifuge",           "sim04_centrifuge_3d.html"),
    5:  (5, 5,  "lab05_heat_incubator",       "sim05_incubator_3d.html"),
    6:  (6, 6,  "lab06_autoclave",            "sim06_autoclave_3d.html"),
    7:  (7, 8,  "lab07_gram_electrostatics",  "sim07_gram_stain_3d.html"),
    8:  (8, 9,  "lab08_electrophoresis",      "sim10_electrophoresis_3d.html"),
    9:  (9, 10, "lab09_refraction",           "sim09_refraction_3d.html"),
    10: (10, 11, "lab10_microscope",          "sim11_optics_3d.html"),
    11: (11, 12, "lab11_radioactivity_uv",    "sim12_radioactivity_3d.html"),
    12: (12, 13, "lab12_od600",               "sim12_od600_3d.html"),
    13: (12, 14, "lab13_mini_project",        None),
}
CHAPTER_WEEK = {1: 1, 2: 2, 3: 3, 4: 4, 5: 5, 6: 6, 7: 8, 8: 9, 9: 10, 10: 11, 11: 12, 12: 13}

# ArUco DICT_4X4_50 bit patterns (white cells) — คัดลอกจาก styles/physics_microbio_style.sty
ARUCO_WHITE = {
    0: "1/4 3/4 4/4 2/3 4/3 3/2 4/2 3/1", 1: "1/3 2/3 3/3 4/3 1/2 4/2 1/1 3/1",
    2: "3/4 4/4 3/3 4/3 2/2 1/1 2/1 4/1", 3: "1/4 4/4 1/3 4/3 2/2 2/1 3/1",
    4: "2/4 4/4 2/3 3/3 1/2 4/2 1/1 2/1", 5: "1/4 2/4 4/4 2/2 3/2 4/2 2/1 3/1",
    6: "2/4 3/4 4/4 1/3 3/3 4/3 3/1 4/1", 7: "3/4 1/3 1/2 2/2 3/2 2/1 4/1",
    8: "1/4 2/4 3/4 1/3 2/3 3/2 1/1 4/1", 9: "2/4 1/3 2/3 3/3 1/2 3/2 4/2 3/1",
    10: "1/4 3/4 3/3 1/2 2/2 4/2 2/1 3/1", 11: "1/4 2/4 2/3 4/3 4/2 1/1 2/1 3/1",
}


def aruco_svg(mid, size=120):
    """Render ArUco marker as inline SVG (TikZ y-axis points up → flip)."""
    cells = []
    for xy in ARUCO_WHITE.get(mid, "").split():
        x, y = (int(v) for v in xy.split("/"))
        cells.append(f'<rect x="{x}" y="{5 - y}" width="1" height="1" fill="#fff"/>')
    return (f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="-0.4 -0.4 6.8 6.8" width="{size}" height="{size}" '
            f'role="img" aria-label="ArUco ID {mid}"><rect x="-0.4" y="-0.4" width="6.8" height="6.8" fill="#fff"/>'
            f'<rect x="0" y="0" width="6" height="6" fill="#000"/>{"".join(cells)}'
            f'<path d="M-0.4 -0.4 L0.45 -0.4 L-0.4 0.45Z" fill="#10b981"/></svg>')


# --------------------------------------------------------------------------
# Low-level LaTeX scanning helpers
# --------------------------------------------------------------------------
def strip_comments(s):
    return re.sub(r"(?<!\\)%.*", "", s)


def read_group(s, i, open_ch="{", close_ch="}"):
    """s[i] must be open_ch (after skipping spaces). Returns (content, index_after)."""
    while i < len(s) and s[i] in " \t\r\n":
        i += 1
    if i >= len(s) or s[i] != open_ch:
        return None, i
    depth, j = 0, i
    while j < len(s):
        c = s[j]
        if c == "\\":
            j += 2
            continue
        if c == "{" and open_ch == "[":
            # skip nested braces inside optional args
            _, j = read_group(s, j)
            continue
        if c == open_ch:
            depth += 1
        elif c == close_ch:
            depth -= 1
            if depth == 0:
                return s[i + 1:j], j + 1
        j += 1
    return s[i + 1:], len(s)


def find_env_end(s, env, start):
    """start = index right after \\begin{env}...; returns (inner_end, after_end)."""
    pat = re.compile(r"\\(begin|end)\{" + re.escape(env) + r"\}")
    depth = 1
    for m in pat.finditer(s, start):
        depth += 1 if m.group(1) == "begin" else -1
        if depth == 0:
            return m.start(), m.end()
    return len(s), len(s)


def split_top(s, sep_regex):
    """Split at sep (regex) only at brace depth 0 and outside $...$."""
    parts, depth, last, i, in_math = [], 0, 0, 0, False
    rx = re.compile(sep_regex)
    while i < len(s):
        c = s[i]
        if c == "\\" and i + 1 < len(s) and s[i + 1] in "{}$&\\%":
            if depth == 0 and not in_math:
                m = rx.match(s, i)
                if m:
                    parts.append(s[last:i]); i = m.end(); last = i; continue
            i += 2
            continue
        if c == "{":
            depth += 1
        elif c == "}":
            depth -= 1
        elif c == "$":
            in_math = not in_math
        if depth == 0 and not in_math:
            m = rx.match(s, i)
            if m:
                parts.append(s[last:i]); i = m.end(); last = i; continue
        i += 1
    parts.append(s[last:])
    return parts


# --------------------------------------------------------------------------
# Inline conversion (text + math protected for MathJax)
# --------------------------------------------------------------------------
MATH_MACROS = [
    (r"\\vect\{", r"\\boldsymbol{"), (r"\\uvec\{([^{}]*)\}", r"\\hat{\\boldsymbol{\1}}"),
    (r"\\dd(?![a-zA-Z])", r"\\,\\mathrm{d}"),
    (r"\\deriv\{([^{}]*)\}\{([^{}]*)\}", r"\\frac{\\mathrm{d}\1}{\\mathrm{d}\2}"),
    (r"\\avg\{([^{}]*)\}", r"\\langle \1 \\rangle"),
]


def fix_math(m):
    for a, b in MATH_MACROS:
        m = re.sub(a, b, m)
    return m


def protect_math(s):
    store = []

    def keep(m):
        store.append(fix_math(m.group(0)))
        return f"\x00M{len(store) - 1}\x00"
    s = re.sub(r"\$\$.+?\$\$|\\\[.+?\\\]|\$(?:\\\$|[^$])+?\$|\\\(.+?\\\)", keep, s, flags=re.S)
    return s, store


def restore_math(s, store):
    return re.sub(r"\x00M(\d+)\x00", lambda m: html.escape(store[int(m.group(1))], quote=False), s)


CMD_WRAP = {
    "textbf": ("<strong>", "</strong>"), "textit": ("<em>", "</em>"), "emph": ("<em>", "</em>"),
    "underline": ("<u>", "</u>"), "texttt": ("<code>", "</code>"), "mbox": ("", ""),
    "textsf": ("", ""), "textrm": ("", ""), "text": ("", ""), "textnormal": ("", ""),
}
CMD_DROP_ARG = {"index", "label", "vspace", "hspace", "phantomsection", "setlength", "addlinespace",
                "color", "Needspace", "needspace", "rowcolor"}
CMD_DROP = {"noindent", "centering", "raggedright", "raggedleft", "small", "footnotesize", "scriptsize",
            "normalsize", "large", "Large", "bfseries", "itshape", "sffamily", "clearpage", "cleardoublepage",
            "phantomsection", "hfill", "par", "toprule", "midrule", "bottomrule", "arraybackslash",
            "protect", "relax", "smallskip", "medskip", "bigskip", "newpage", "selectfont"}


def inline(s, _nested=False):
    if not _nested:
        s, store = protect_math(s)
        s = html.escape(s, quote=False)
    out, i = [], 0
    while i < len(s):
        c = s[i]
        if c == "\\":
            m = re.match(r"\\([a-zA-Z]+)\*?", s[i:])
            if not m:
                nxt = s[i + 1] if i + 1 < len(s) else ""
                if s.startswith("\\\\", i):
                    j = i + 2
                    if j < len(s) and s[j] == "[":
                        _, j = read_group(s, j, "[", "]")
                    out.append("<br>"); i = j; continue
                if s.startswith("\\&amp;", i):
                    out.append("&amp;"); i += 6; continue
                mapping = {"%": "%", "#": "#", "_": "_", "$": "$", ",": "\u2009", ";": " ", " ": " ",
                           "{": "{", "}": "}", "-": ""}
                out.append(mapping.get(nxt, nxt)); i += 2; continue
            name = m.group(1)
            j = i + m.end()
            if name in CMD_WRAP:
                arg, j2 = read_group(s, j)
                if arg is not None:
                    a, b = CMD_WRAP[name]
                    out.append(a + inline_raw(arg) + b); i = j2; continue
            if name == "href":
                _, j2 = read_group(s, j); txt, j3 = read_group(s, j2)
                out.append(inline_raw(txt or "")); i = j3; continue
            if name in ("resizebox",):
                _, j2 = read_group(s, j); _, j3 = read_group(s, j2); i = j3; continue
            if name in CMD_DROP_ARG:
                arg, j2 = read_group(s, j)
                if name in ("setlength",):
                    _, j2 = read_group(s, j2)
                if name == "addlinespace" and j < len(s) and s[j] == "[":
                    _, j2 = read_group(s, j, "[", "]")
                i = j2 if arg is not None or name == "addlinespace" else j; continue
            if name in CMD_DROP:
                i = j; continue
            if name == "quad":
                out.append("&emsp;"); i = j; continue
            if name == "qquad":
                out.append("&emsp;&emsp;"); i = j; continue
            if name in ("newline", "linebreak"):
                out.append("<br>"); i = j; continue
            if name == "dotfill":
                out.append('<span class="tex-dotfill"></span>'); i = j; continue
            if name in ("ldots", "dots"):
                out.append("…"); i = j; continue
            if name == "LaTeX":
                out.append("LaTeX"); i = j; continue
            # unknown command: keep argument text if present
            arg, j2 = read_group(s, j)
            if arg is not None:
                out.append(inline_raw(arg)); i = j2
            else:
                i = j
            continue
        if c in "{}":
            i += 1; continue
        if c == "~":
            out.append("&nbsp;"); i += 1; continue
        if s.startswith("---", i):
            out.append("—"); i += 3; continue
        if s.startswith("--", i):
            out.append("–"); i += 2; continue
        if s.startswith("``", i):
            out.append("“"); i += 2; continue
        if s.startswith("''", i):
            out.append("”"); i += 2; continue
        out.append(c); i += 1
    res = "".join(out)
    res = re.sub(r"[ \t]*\n[ \t]*", " ", res)
    res = re.sub(r" {2,}", " ", res).strip()
    if _nested:
        return res
    return restore_math(res, store)


def inline_raw(s):
    """inline() for text that is already math-protected and html-escaped (nested call)."""
    return inline(s, _nested=True)


# --------------------------------------------------------------------------
# Block conversion
# --------------------------------------------------------------------------
BOX_STYLE = {
    "planbox":    ("plan",    "fa-chalkboard-user"),
    "conceptbox": ("concept", "fa-lightbulb"),
    "bioappbox":  ("bioapp",  "fa-bacteria"),
    "worked":     ("worked",  "fa-calculator"),
    "labbox":     ("lab",     "fa-flask-vial"),
    "warningbox": ("warning", "fa-triangle-exclamation"),
}


class Ctx:
    def __init__(self, ch):
        self.ch = ch
        self.fig = 0
        self.tab = 0
        self.eq = 0
        self.worked = 0
        self.tikz = 0
        self.images = []


def para_html(text):
    out = []
    for p in re.split(r"\n\s*\n", text):
        h = inline(p)
        if h and not re.fullmatch(r"(<br>|\s|&emsp;)*", h):
            out.append(f"<p>{h}</p>")
    return "\n".join(out)


def list_html(inner, tag, ctx):
    items = split_top(inner, r"\\item(?![a-zA-Z])")
    lis = []
    for it in items[1:]:
        label = ""
        st = it.lstrip()
        if st.startswith("["):
            lab, k = read_group(st, 0, "[", "]")
            label = f'<span class="tex-item-label">{inline(lab)}</span> '
            it = st[k:]
        body = blocks(it, ctx)
        body = re.sub(r"^<p>(.*?)</p>", r"\1", body, count=1, flags=re.S)
        lis.append(f"<li>{label}{body}</li>")
    return f'<{tag} class="tex-{tag}">' + "".join(lis) + f"</{tag}>"


def table_html(spec_inner, ctx):
    body = spec_inner
    has_header = "\\midrule" in body
    head_part, rest = (body.split("\\midrule", 1) if has_header else ("", body))
    rows_html = []

    def row_cells(row, cell_tag):
        cells = split_top(row, r"(?<!\\)&")
        out = []
        for cell in cells:
            cell = cell.strip()
            m = re.match(r"\\multicolumn\{(\d+)\}", cell)
            if m:
                _, k = read_group(cell, m.end())     # spec
                content, _ = read_group(cell, k)
                out.append(f'<{cell_tag} colspan="{m.group(1)}">{blocks(content or "", ctx, inline_only=True)}</{cell_tag}>')
            else:
                out.append(f"<{cell_tag}>{blocks(cell, ctx, inline_only=True)}</{cell_tag}>")
        return "".join(out)

    def rows(part, cell_tag):
        part = re.sub(r"\\(toprule|bottomrule|midrule|hline)", "", part)
        part = re.sub(r"\\addlinespace(\[[^\]]*\])?", "", part)
        part = re.sub(r"\\cmidrule(\([^)]*\))?\{[^}]*\}", "", part)
        res = []
        for r in split_top(part, r"\\\\(\[[^\]]*\])?"):
            if r.strip():
                res.append(f"<tr>{row_cells(r, cell_tag)}</tr>")
        return res
    thead = rows(head_part, "th") if has_header else []
    tbody = rows(rest, "td")
    rows_html.append(f"<thead>{''.join(thead)}</thead>" if thead else "")
    rows_html.append(f"<tbody>{''.join(tbody)}</tbody>")
    return '<div class="tex-table-wrap"><table class="tex-table">' + "".join(rows_html) + "</table></div>"


def copy_image(rel, ctx):
    src = os.path.join(TEX, rel)
    name = os.path.basename(rel)
    dst_dir = os.path.join(OUT_IMG, "sec_3d")
    os.makedirs(dst_dir, exist_ok=True)
    if os.path.exists(src):
        shutil.copy2(src, os.path.join(dst_dir, name))
    ctx.images.append(name)
    return f"{IMG_URL}/sec_3d/{name}"


def figure_html(src, caption, ctx, kind="photo"):
    ctx.fig += 1
    num = f"{ctx.ch}.{ctx.fig}"
    return (f'<figure class="tex-figure tex-figure-{kind}" id="fig-{num}">'
            f'<img src="{{BASE}}{src}" alt="ภาพที่ {num}" loading="lazy">'
            f'<figcaption><strong>ภาพที่ {num}</strong>&ensp;{inline(caption)}</figcaption></figure>')


def blocks(tex, ctx, inline_only=False):
    """Convert a chunk of LaTeX body into HTML."""
    out = []
    pat = re.compile(r"\\begin\{([a-zA-Z*]+)\}|\\deepskinfig|\\arucomarkerbadge|\\\[|\$\$|\\section\*?\{|\\subsection\*?\{")
    i = 0
    while True:
        m = pat.search(tex, i)
        if not m:
            break
        pre = tex[i:m.start()]
        if pre.strip():
            out.append(inline(pre) if inline_only else para_html(pre))
        tok = m.group(0)
        if tok.startswith("\\begin"):
            env = m.group(1)
            j = m.end()
            opt = None
            if j < len(tex) and tex[j] == "[":
                opt, j = read_group(tex, j, "[", "]")
            inner_end, after = find_env_end(tex, env, j)
            inner = tex[j:inner_end]
            out.append(env_html(env, opt, inner, ctx))
            i = after
        elif tok == "\\deepskinfig":
            a1, j = read_group(tex, m.end()); a2, j = read_group(tex, j)
            out.append(figure_html(copy_image(a1, ctx), a2, ctx))
            i = j
        elif tok == "\\arucomarkerbadge":
            args, j = [], m.end()
            for _ in range(5):
                a, j = read_group(tex, j); args.append(a)
            mid = int(args[0])
            out.append(
                f'<div class="tex-aruco" data-aruco="{mid}"><div class="tex-aruco-marker">{aruco_svg(mid)}'
                f'<span>ArUco ID {mid} (4×4)</span></div><div class="tex-aruco-body">'
                f'<div class="tex-aruco-title">[3D WebAR + ArUco Marker] มาร์กเกอร์ ArUco ID {mid} — บทที่ {args[1]}: {inline(args[2])}</div>'
                f'<p><strong>แบบจำลอง 3 มิติ</strong>&ensp;{inline(args[3])}</p>'
                f'<p><strong>ตัวแปรที่ปรับค่าได้</strong>&ensp;{inline(args[4])}</p>'
                f'<a class="tex-aruco-btn" href="{{BASE}}webar/ar_aruco_textbook.html?id={mid}&amp;ar=1" target="_blank" rel="noopener">'
                f'<i class="fa-solid fa-camera-rotate"></i> เปิดกล้อง 3D WebAR ส่องมาร์กเกอร์ ID {mid}</a></div></div>')
            i = j
        elif tok in ("\\[", "$$"):
            close = "\\]" if tok == "\\[" else "$$"
            k = tex.find(close, m.end())
            k = len(tex) if k < 0 else k
            out.append('<div class="tex-display">' + html.escape("\\[" + fix_math(tex[m.end():k]) + "\\]", quote=False) + "</div>")
            i = k + len(close)
        else:   # section / subsection
            title, j = read_group(tex, m.end() - 1)
            tag = "h3" if "subsection" in tok else "h2"
            out.append(f'<{tag} class="tex-{tag}">{inline(title)}</{tag}>')
            i = j
    rest = tex[i:]
    if rest.strip():
        out.append(inline(rest) if inline_only else para_html(rest))
    return "\n".join(o for o in out if o)


def env_html(env, opt, inner, ctx):
    if env in ("itemize", "enumerate"):
        return list_html(inner, "ul" if env == "itemize" else "ol", ctx)
    if env in ("equation", "equation*", "align", "align*", "gather", "gather*"):
        body = re.sub(r"\\label\{[^}]*\}", "", inner).strip()
        if env.startswith("equation") and not env.endswith("*"):
            ctx.eq += 1
            tag = f"\\tag{{{ctx.ch}.{ctx.eq}}}"
            if "\\tag" not in body:
                body = body + " " + tag
            math = "\\[" + fix_math(body) + "\\]"
        else:
            inner_env = env if env.endswith("*") else env + "*"
            math = "\\[\\begin{" + ("aligned" if "align" in env else "gathered") + "}" + fix_math(body) + "\\end{" + ("aligned" if "align" in env else "gathered") + "}\\]"
        return '<div class="tex-display">' + html.escape(math, quote=False) + "</div>"
    if env in BOX_STYLE:
        kind, icon = BOX_STYLE[env]
        title = inline(opt or "")
        if env == "worked":
            ctx.worked += 1
            title = f"ตัวอย่างที่ {ctx.ch}.{ctx.worked}&ensp;{title}"
        return (f'<div class="tex-box tex-box-{kind}"><div class="tex-box-title"><i class="fa-solid {icon}"></i> {title}</div>'
                f'<div class="tex-box-body">{blocks(inner, ctx)}</div></div>')
    if env == "center":
        return f'<div class="tex-center">{blocks(inner, ctx)}</div>'
    if env in ("tabularx", "tabular", "longtable", "tabulary"):
        j = 0
        if env in ("tabularx", "tabulary"):
            _, j = read_group(inner, j)
        _, j = read_group(inner, j)
        return table_html(inner[j:], ctx)
    if env == "table":
        cap = re.search(r"\\caption\{", inner)
        caption = ""
        if cap:
            caption, k = read_group(inner, cap.end() - 1)
            inner = inner[:cap.start()] + inner[k:]
        ctx.tab += 1
        num = f"{ctx.ch}.{ctx.tab}"
        return (f'<div class="tex-tablefig" id="tab-{num}"><div class="tex-tablecap"><strong>ตารางที่ {num}</strong>&ensp;{inline(caption)}</div>'
                f'{blocks(inner, ctx)}</div>')
    if env == "figure":
        cap = re.search(r"\\caption\{", inner)
        caption = ""
        if cap:
            caption, _ = read_group(inner, cap.end() - 1)
        if "tikzpicture" in inner:
            ctx.tikz += 1
            src = f"{IMG_URL}/tikz/ch{ctx.ch:02d}_tikz{ctx.tikz}.svg"
            return figure_html(src, caption, ctx, kind="diagram")
        g = re.search(r"\\includegraphics(\[[^\]]*\])?\{([^}]*)\}", inner)
        if g:
            return figure_html(copy_image(g.group(2), ctx), caption, ctx)
        return ""
    if env in ("tikzpicture",):
        ctx.tikz += 1
        ctx.fig += 0
        return f'<img class="tex-tikz" src="{{BASE}}{IMG_URL}/tikz/ch{ctx.ch:02d}_tikz{ctx.tikz}.svg" alt="">'
    if env in ("minipage", "scope", "flushleft", "flushright", "quote", "quotation", "small", "footnotesize"):
        if env == "minipage":
            _, j = read_group(inner, 0)
            inner = inner[j:]
        return blocks(inner, ctx)
    return blocks(inner, ctx)


# --------------------------------------------------------------------------
# Chapter parsing
# --------------------------------------------------------------------------
def parse_chapter(num, fname):
    raw = open(os.path.join(TEX, "chapters", fname + ".tex"), encoding="utf-8").read()
    s = strip_comments(raw)
    ctx = Ctx(num)

    # 1) planbox (แผนบริหารการสอนประจำบท)
    plan = None
    pm = re.search(r"\\begin\{planbox\}", s)
    if pm:
        j = pm.end()
        opt, j = read_group(s, j, "[", "]")
        e, after = find_env_end(s, "planbox", j)
        plan_inner = s[j:e]
        plan = {"title": inline(opt or ""), "html": blocks(plan_inner, ctx)}
        topics = re.findall(r"\\item\s+(\d+\.\d+\s[^\n]+)", plan_inner)
        plan["topics"] = [inline(t) for t in topics]
        s = s[after:]

    # 2) chapter title
    cm = re.search(r"\\chapter\{", s)
    title, j = read_group(s, cm.end() - 1)
    body = s[j:]

    # 3) split sections
    parts = re.split(r"(\\section\*?\{)", body)
    sections, labs, questions = [], [], None
    # parts: [pre, '\section{', rest, '\section*{', rest, ...]
    for k in range(1, len(parts), 2):
        star = "*" in parts[k]
        chunk = "{" + parts[k + 1]
        sec_title, jj = read_group(chunk, 0)
        sec_body = chunk[jj:]
        if star:
            questions = {"title": inline(sec_title), "html": blocks(sec_body, ctx)}
            continue
        is_lab = "ปฏิบัติการประจำสัปดาห์" in sec_title
        sec = {"id": f"s{len(sections) + 1}", "title": inline(sec_title), "kind": "lab" if is_lab else "theory"}
        if is_lab:
            # separate each labbox for the lab pages
            lab_htmls = []
            for lm in re.finditer(r"\\begin\{labbox\}", sec_body):
                lj = lm.end()
                lopt, lj = read_group(sec_body, lj, "[", "]")
                le, _ = find_env_end(sec_body, "labbox", lj)
                lab_title_tex = lopt or ""
                n = re.search(r"ปฏิบัติการที่\s*(\d+)", lab_title_tex)
                labs.append({"num": int(n.group(1)) if n else None,
                             "title_full": inline(lab_title_tex),
                             "title": inline(re.sub(r"^ปฏิบัติการที่\s*\d+\s*(\\quad)?\s*", "", lab_title_tex)),
                             "tex_inner": sec_body[lj:le]})
            sec["html"] = blocks(sec_body, ctx)
        else:
            sec["html"] = blocks(sec_body, ctx)
        sections.append(sec)

    # render each lab independently (own figure numbering continues from chapter)
    lab_out = []
    for lb in labs:
        lctx = Ctx(num)
        lab_out.append({"num": lb["num"], "title": lb["title"], "title_full": lb["title_full"],
                        "html": blocks(lb["tex_inner"], lctx)})

    aruco = re.search(r"\\arucomarkerbadge\{(\d+)\}\{(\d+)\}\{([^}]*)\}", s)
    return {
        "num": num,
        "file": fname,
        "title": inline(title),
        "week": CHAPTER_WEEK[num],
        "aruco_id": int(aruco.group(1)) if aruco else num - 1,
        "aruco_title": inline(aruco.group(3)) if aruco else "",
        "plan": plan,
        "sections": sections,
        "labs": lab_out,
        "questions": questions,
        "counts": {"figures": ctx.fig, "equations": ctx.eq, "tables": ctx.tab, "worked": ctx.worked, "tikz": ctx.tikz},
        "source": f"แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/chapters/{fname}.tex",
    }


def parse_syllabus():
    s = strip_comments(open(os.path.join(TEX, "frontmatter", "syllabus.tex"), encoding="utf-8").read())
    weeks = []
    for line in s.splitlines():
        m = re.match(r"\s*(\d{1,2})\s*&(.*)\\\\\s*$", line)
        if not m:
            continue
        w = int(m.group(1))
        cells = split_top(m.group(2), r"(?<!\\)&")
        if "multicolumn" in m.group(2):
            mc = re.search(r"\\multicolumn\{\d+\}\{", m.group(2))
            _, k = read_group(m.group(2), mc.end() - 1)
            txt, _ = read_group(m.group(2), k)
            weeks.append({"week": w, "exam": True, "lecture": inline(txt), "lab": "", "strategy": "",
                          "clos": inline(cells[-1])})
        else:
            cells = [inline(c) for c in cells]
            while len(cells) < 4:
                cells.append("")
            weeks.append({"week": w, "exam": False, "lecture": cells[0], "lab": cells[1],
                          "strategy": cells[2], "clos": cells[3]})
    return weeks


def main():
    os.makedirs(OUT_DATA, exist_ok=True)
    chapters = []
    for idx, f in enumerate(CHAPTER_FILES, start=1):
        ch = parse_chapter(idx, f)
        with open(os.path.join(OUT_DATA, f"ch{idx:02d}.json"), "w", encoding="utf-8") as fp:
            json.dump(ch, fp, ensure_ascii=False, indent=1)
        chapters.append(ch)
        print(f"ch{idx:02d}  {ch['title'][:48]:<48} sec={len(ch['sections'])} labs={[l['num'] for l in ch['labs']]} {ch['counts']}")

    labs = []
    for n, (chn, week, slug, sim) in LAB_MAP.items():
        ch = chapters[chn - 1]
        lab = next((l for l in ch["labs"] if l["num"] == n), None)
        labs.append({"num": n, "chapter": chn, "week": week, "file": f"labs/{slug}.php", "slug": slug,
                     "sim": f"simulations/{sim}" if sim else None,
                     "title": lab["title"] if lab else "", "aruco_id": ch["aruco_id"]})
    cmap = {
        "course": {"code": "4011111", "name_th": "ฟิสิกส์สำหรับจุลชีววิทยา", "credits": "3(2-3-4)",
                   "source": "แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/main.tex"},
        "chapters": [{"num": c["num"], "title": c["title"], "week": c["week"], "aruco_id": c["aruco_id"],
                      "file": f"chapters/ch{c['num']:02d}_th.php",
                      "labs": [l["num"] for l in c["labs"]],
                      "topics": (c["plan"] or {}).get("topics", [])} for c in chapters],
        "labs": labs,
        "weeks": parse_syllabus(),
        "enrichment": [
            {"key": "momentum", "title": "โมเมนตัม การดล และการทำลายผนังเซลล์ (Vortex / Bead Beating)",
             "chapter_file": "enrichment/momentum_th.php", "lab_file": "enrichment/lab_momentum.php"},
            {"key": "osmosis", "title": "สมดุลกล ความดันของไหล และปรากฏการณ์ออสโมซิส",
             "chapter_file": "enrichment/osmosis_th.php", "lab_file": "enrichment/lab_osmosis.php"},
            {"key": "atp", "title": "งาน พลังงาน และมอเตอร์โมเลกุล ATP Synthase",
             "chapter_file": "enrichment/atp_synthase_th.php", "lab_file": "enrichment/lab_atp_synthase.php"},
            {"key": "flagella", "title": "การหมุนและกลศาสตร์นาโนของมอเตอร์แฟลกเจลลา",
             "chapter_file": "enrichment/flagella_th.php", "lab_file": "enrichment/lab_flagella.php"},
        ],
    }
    with open(os.path.join(WEB, "data", "curriculum_map.json"), "w", encoding="utf-8") as fp:
        json.dump(cmap, fp, ensure_ascii=False, indent=1)
    print("weeks:", len(cmap["weeks"]), " labs:", len(labs))


if __name__ == "__main__":
    main()
