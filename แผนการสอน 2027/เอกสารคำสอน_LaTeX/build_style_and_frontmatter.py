#!/usr/bin/env python3
"""
Generator Part 1: Style File, Main TeX, Frontmatter, and Backmatter
Course: 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) Physics for Microbiology
Standard: /rbru-latex-textbook-builder + /academic-book-cover-architect
"""
import os

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX"
for sub in ["styles", "frontmatter", "chapters", "backmatter", "figures"]:
    os.makedirs(os.path.join(BASE_DIR, sub), exist_ok=True)

# 1. styles/physics_microbio_style.sty
style_content = r"""\NeedsTeXFormat{LaTeX2e}
\ProvidesPackage{styles/physics_microbio_style}[2026/10/24 RBRU Physics for Microbiology 4011111 Master Style]

% ====================================================================
% 1. PAGE GEOMETRY (A4 Standard Academic Monograph — RBRU 1.5in Margin)
% ====================================================================
\RequirePackage{geometry}
\geometry{
    a4paper,
    top=1.5in,
    bottom=1.0in,
    left=1.5in,
    right=1.0in,
    headheight=43pt,
    headsep=16pt,
    footskip=28pt
}

% ====================================================================
% 2. FONTS & THAI TYPOGRAPHY (XeLaTeX)
% ====================================================================
\RequirePackage{fontspec}
\defaultfontfeatures{Ligatures=TeX, Scale=MatchLowercase}

\XeTeXlinebreaklocale "th"
\XeTeXlinebreakskip = 0pt plus 2.5pt minus 1pt

\setmainfont{Sarabun}[
    Scale=1.08,
    UprightFont = *,
    BoldFont = * Bold,
    ItalicFont = * Italic,
    BoldItalicFont = * Bold Italic
]
\setsansfont{Sarabun}[
    Scale=1.06,
    UprightFont = *,
    BoldFont = * Bold
]
\setmonofont{Menlo}[Scale=0.88]

\RequirePackage{setspace}
\setstretch{1.32}
\setlength{\parindent}{1.25cm}
\setlength{\parskip}{0.32em}
\RequirePackage{indentfirst}

\tolerance=2000
\emergencystretch=3em
\hbadness=2000

% ====================================================================
% 3. MATHEMATICS & PHYSICS PACKAGES
% ====================================================================
\RequirePackage{amsmath, amssymb, amsfonts, mathtools}
\RequirePackage{bm}
\RequirePackage{siunitx}
\RequirePackage{cancel}

\newcommand{\vect}[1]{\bm{#1}}
\newcommand{\uvec}[1]{\hat{\bm{#1}}}
\newcommand{\dd}{\,\mathrm{d}}
\newcommand{\deriv}[2]{\frac{\mathrm{d}#1}{\mathrm{d}#2}}
\newcommand{\avg}[1]{\langle #1 \rangle}

% ====================================================================
% 4. COLOR PALETTE (Physics & Microbiology Theme)
% ====================================================================
\RequirePackage[table,xcdraw,dvipsnames,svgnames]{xcolor}

\definecolor{physRoyalBlue}{HTML}{0F3D68}
\definecolor{physCyan}{HTML}{0284C7}
\definecolor{physAmber}{HTML}{D97706}
\definecolor{bioEmerald}{HTML}{059669}
\definecolor{bioTeal}{HTML}{0D9488}
\definecolor{labPurple}{HTML}{6D28D9}
\definecolor{crimsonAlert}{HTML}{DC2626}
\definecolor{charcoal}{HTML}{1E293B}
\definecolor{physSlate}{HTML}{475569}
\definecolor{softSmoke}{HTML}{F8FAFC}
\definecolor{boxBlueBg}{HTML}{F0F9FF}
\definecolor{boxGreenBg}{HTML}{ECFDF5}
\definecolor{boxAmberBg}{HTML}{FFFBEB}
\definecolor{boxPurpleBg}{HTML}{F5F3FF}
\definecolor{boxRedBg}{HTML}{FEF2F2}

% ====================================================================
% 5. GRAPHICS, TIKZ, TABLES & LISTS
% ====================================================================
\RequirePackage{graphicx}
\RequirePackage{float}
\RequirePackage{booktabs}
\RequirePackage{tabularx}
\RequirePackage{longtable}
\RequirePackage{multirow}
\RequirePackage{array}
\RequirePackage{enumitem}
\RequirePackage{needspace}

\setlist[itemize]{leftmargin=2.0cm, itemsep=2pt, topsep=4pt}
\setlist[enumerate]{leftmargin=2.0cm, itemsep=2pt, topsep=4pt}

\RequirePackage{caption}
\DeclareCaptionLabelSeparator{thaisep}{\quad}
\captionsetup{
    font={small},
    labelfont={bf, color=physRoyalBlue},
    labelsep=thaisep,
    skip=6pt
}
\captionsetup[table]{position=above}
\captionsetup[figure]{position=below}

\AtBeginDocument{%
    \renewcommand{\figurename}{\mbox{ภาพที่}}%
    \renewcommand{\tablename}{\mbox{ตารางที่}}%
    \renewcommand{\contentsname}{สารบัญ}%
    \renewcommand{\listfigurename}{สารบัญภาพ}%
    \renewcommand{\listtablename}{สารบัญตาราง}%
    \renewcommand{\chaptername}{บทที่}%
    \renewcommand{\appendixname}{ภาคผนวก}%
    \renewcommand{\indexname}{ดัชนีค้นคำ}%
}

\RequirePackage{tikz}
\RequirePackage{pgfplots}
\pgfplotsset{compat=1.18}
\usetikzlibrary{
    arrows.meta,
    positioning,
    calc,
    shapes.geometric,
    shapes.misc,
    decorations.pathmorphing,
    decorations.markings,
    patterns,
    backgrounds,
    fit,
    shadows
}

% ====================================================================
% 6. TCOLORBOX ENVIRONMENTS (Concept, Bio-App, Worked Example, Lab)
% ====================================================================
\RequirePackage[most]{tcolorbox}

% 6.1 Lesson Plan Box (2-Page Chapter Plan)
\newtcolorbox{planbox}[1][]{
    enhanced,
    breakable,
    colback=softSmoke,
    colframe=physRoyalBlue,
    colbacktitle=physRoyalBlue,
    coltitle=white,
    fonttitle=\large\bfseries,
    title={#1},
    arc=2mm,
    boxrule=1.0pt,
    left=10pt, right=10pt, top=8pt, bottom=8pt,
    toptitle=5pt, bottomtitle=5pt
}

% 6.2 Physics Concept & Formula Box (Low-Math Friendly)
\newtcolorbox{conceptbox}[1][]{
    enhanced,
    breakable,
    colback=boxBlueBg,
    colframe=physRoyalBlue,
    colbacktitle=physRoyalBlue,
    coltitle=white,
    fonttitle=\bfseries,
    title={สรุปหลักการและสูตรคำนวณฉบับเข้าใจง่าย\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    borderline west={3.5pt}{0pt}{physCyan},
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.3 Microbiology Application Box (CLO1 & CLO2 Connection)
\newtcolorbox{bioappbox}[1][]{
    enhanced,
    breakable,
    colback=boxGreenBg,
    colframe=bioEmerald,
    colbacktitle=bioEmerald,
    coltitle=white,
    fonttitle=\bfseries,
    title={การเชื่อมโยงสู่งานจุลชีววิทยาและเครื่องมือห้องปฏิบัติการ\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    borderline west={3.5pt}{0pt}{bioTeal},
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.4 Step-by-Step Worked Example Box (Low-Math 3-Step Method)
\newcounter{workedcounter}[chapter]
\renewcommand{\theworkedcounter}{\thechapter.\arabic{workedcounter}}
\newtcolorbox{worked}[1][]{
    enhanced,
    breakable,
    code={\refstepcounter{workedcounter}},
    colback=boxAmberBg,
    colframe=physAmber,
    colbacktitle=physAmber!90!black,
    coltitle=white,
    fonttitle=\bfseries,
    title={ตัวอย่างการคำนวณที่ \theworkedcounter\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.5 Laboratory Protocol Box (3-Hour Weekly Lab Practice)
\newtcolorbox{labbox}[1][]{
    enhanced,
    breakable,
    colback=boxPurpleBg,
    colframe=labPurple,
    colbacktitle=labPurple,
    coltitle=white,
    fonttitle=\large\bfseries,
    title={#1},
    arc=2.5mm,
    boxrule=1.1pt,
    left=10pt, right=10pt, top=8pt, bottom=8pt
}

% 6.6 Lab Safety & Common Pitfalls Warning Box (CLO3 Ethics & Safety)
\newtcolorbox{warningbox}[1][]{
    enhanced,
    breakable,
    colback=boxRedBg,
    colframe=crimsonAlert,
    colbacktitle=crimsonAlert,
    coltitle=white,
    fonttitle=\bfseries,
    title={ข้อควรระวังความปลอดภัยและจุดที่มักคำนวณผิด\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% ====================================================================
% 7. HEADINGS & HIERARCHICAL INDENTATION (RBRU Standard)
% ====================================================================
\RequirePackage{titlesec}

\titleformat{\chapter}[display]
  {\normalfont\huge\bfseries\color{physRoyalBlue}}
  {\filright\Large\color{physCyan}\chaptername\ \thechapter}
  {4pt}
  {\titlerule[1.5pt]\vspace{6pt}\filright}
  [\vspace{4pt}{\color{physAmber}\titlerule[0.8pt]}]
\titlespacing*{\chapter}{0pt}{-15pt}{18pt}

\titleformat{\section}
  {\normalfont\Large\bfseries\color{physRoyalBlue}}
  {\thesection}
  {0.8em}
  {}
\titlespacing*{\section}{1.25cm}{14pt plus 3pt minus 2pt}{6pt plus 2pt}

\titleformat{\subsection}
  {\normalfont\large\bfseries\color{bioEmerald!85!black}}
  {\thesubsection}
  {0.8em}
  {}
\titlespacing*{\subsection}{2.50cm}{10pt plus 2pt minus 2pt}{4pt plus 1pt}

\titleformat{\subsubsection}
  {\normalfont\normalsize\bfseries\color{charcoal}}
  {\thesubsubsection}
  {0.8em}
  {}
\titlespacing*{\subsubsection}{2.50cm}{8pt plus 2pt minus 1pt}{3pt}

% Dynamic Needspace Protection to prevent orphan headings
\let\origsection\section
\renewcommand{\section}{\Needspace*{5\baselineskip}\origsection}

\let\origsubsection\subsection
\renewcommand{\subsection}{\Needspace*{4\baselineskip}\origsubsection}

% ====================================================================
% 8. HEADERS & FOOTERS (Fancyhdr — No Trailing Dot on Chapter Number)
% ====================================================================
\RequirePackage{fancyhdr}
\pagestyle{fancy}
\fancyhf{}
\fancyhead[L]{\small\color{physSlate}\nouppercase{\leftmark}}
\fancyhead[R]{\small\color{physRoyalBlue}\textbf{4011111 ฟิสิกส์สำหรับจุลชีววิทยา}\quad|\quad\textbf{\thepage}}
\renewcommand{\headrulewidth}{0.5pt}
\renewcommand{\footrulewidth}{0pt}

\renewcommand{\chaptermark}[1]{\markboth{\chaptername\ \thechapter\quad #1}{}}
\renewcommand{\sectionmark}[1]{}

\fancypagestyle{plain}{
    \fancyhf{}
    \fancyfoot[C]{\small\color{physRoyalBlue}\textbf{\thepage}}
    \renewcommand{\headrulewidth}{0pt}
}

% ====================================================================
% 9. HYPERLINKS & BOOKMARKS
% ====================================================================
\RequirePackage{imakeidx}
\makeindex[intoc, title=ดัชนีค้นคำ, columns=2]

\RequirePackage{hyperref}
\hypersetup{
    colorlinks=true,
    linkcolor=physRoyalBlue,
    citecolor=bioEmerald,
    urlcolor=physCyan,
    pdftitle={เอกสารคำสอน รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology)},
    pdfauthor={ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา},
    pdfsubject={Physics for Microbiology 4011111 OBE Course Textbook and Lab Manual}
}
\endinput
"""

with open(os.path.join(BASE_DIR, "styles", "physics_microbio_style.sty"), "w", encoding="utf-8") as f:
    f.write(style_content)

# 2. main.tex
main_tex = r"""\documentclass[12pt, a4paper, oneside]{book}

\usepackage{styles/physics_microbio_style}

\begin{document}

% ====================================================================
% FRONT MATTER
% ====================================================================
\frontmatter
\pagestyle{empty}

% 1. Full-Bleed 3D Pixar Cover + Inner Academic Vector Cover
\input{frontmatter/cover.tex}

% 2. Formal Title Page
\cleardoublepage
\input{frontmatter/title.tex}

\pagestyle{plain}
\pagenumbering{roman}
\setcounter{page}{1}

% 3. Preface (คำนำ)
\cleardoublepage
\input{frontmatter/preface.tex}

% 4. Acknowledgements (กิตติกรรมประกาศ)
\cleardoublepage
\input{frontmatter/acknowledgements.tex}

% 5. OBE Course Syllabus & 15-Week Constructive Alignment (มคอ.3)
\cleardoublepage
\input{frontmatter/syllabus.tex}

% 6. Table of Contents, List of Figures, List of Tables
\cleardoublepage
\tableofcontents

\cleardoublepage
\listoffigures
\addcontentsline{toc}{chapter}{สารบัญภาพ}

\cleardoublepage
\listoftables
\addcontentsline{toc}{chapter}{สารบัญตาราง}

% ====================================================================
% MAIN MATTER (12 Chapters + 13 Integrated Labs for 15 Weeks)
% ====================================================================
\mainmatter
\pagestyle{fancy}

\input{chapters/ch01_units_measurement.tex}
\input{chapters/ch02_vectors_motion.tex}
\input{chapters/ch03_newton_viscosity.tex}
\input{chapters/ch04_work_energy_centrifuge.tex}
\input{chapters/ch05_heat_incubator.tex}
\input{chapters/ch06_thermodynamics_autoclave.tex}
\input{chapters/ch07_electrostatics_staining.tex}
\input{chapters/ch08_current_electrophoresis.tex}
\input{chapters/ch09_optics_refraction.tex}
\input{chapters/ch10_microscope_immersion_oil.tex}
\input{chapters/ch11_radioactivity_uv_sterilization.tex}
\input{chapters/ch12_spectrophotometry_project.tex}

% ====================================================================
% BACK MATTER (Low-Math Formula Guide, Rubrics, References, Biography)
% ====================================================================
\backmatter
\input{backmatter/appendix_lowmath.tex}
\input{backmatter/references.tex}
\input{backmatter/biography.tex}

\cleardoublepage
\printindex

\end{document}
"""

with open(os.path.join(BASE_DIR, "main.tex"), "w", encoding="utf-8") as f:
    f.write(main_tex)

# 3. frontmatter/cover.tex (Page 1: Full-Bleed 3D Pixar Cover; Page 2: Inner Academic Vector Cover)
cover_tex = r"""\begin{titlepage}
\newgeometry{margin=0pt}
\thispagestyle{empty}
\noindent%
\begin{tikzpicture}[remember picture, overlay]
    \node[anchor=center, inner sep=0pt] at (current page.center) {
        \includegraphics[width=\paperwidth, height=\paperheight]{figures/cover_physics4microbio2027.jpg}
    };
\end{tikzpicture}
\clearpage
\thispagestyle{empty}
\noindent%
\begin{tikzpicture}[remember picture, overlay]
    % Background Gradient
    \shade[top color=physRoyalBlue!92!black, bottom color=charcoal!96!black]
        (current page.south west) rectangle (current page.north east);

    % Precision Coordinate Grid
    \draw[physCyan!18, line width=0.4pt, step=1.2cm]
        ($(current page.south west)+(-1,-1)$) grid ($(current page.north east)+(1,1)$);

    % Central Vector Motif (Microscopy Optics + Bacterial Fluid Vortex + Centrifuge Orbit)
    \begin{scope}[shift={($(current page.center)+(0,-0.5)$)}]
        \foreach \r in {1.8, 3.0, 4.2, 5.4} {
            \draw[physCyan!35, line width=0.6pt, dashed] (0,0) circle (\r cm);
        }
        \draw[physCyan!75, line width=1.3pt, rotate=25] (0,0) ellipse (4.7cm and 1.6cm);
        \draw[physAmber!85, line width=1.3pt, rotate=85] (0,0) ellipse (4.7cm and 1.6cm);
        \draw[bioEmerald!80, line width=1.3pt, rotate=145] (0,0) ellipse (4.7cm and 1.6cm);

        \fill[physCyan] (25:4.7cm) circle (3.5pt);
        \fill[physAmber] (85:4.7cm) circle (3.5pt);
        \fill[bioEmerald] (145:4.7cm) circle (3.5pt);

        \draw[physAmber, line width=2.2pt, fill=physRoyalBlue!90]
            (0:2.1cm) -- (60:2.1cm) -- (120:2.1cm) -- (180:2.1cm) -- (240:2.1cm) -- (300:2.1cm) -- cycle;
        \fill[bioEmerald!30] (0,0) circle (1.2cm);
        \fill[physCyan!55] (0,0) circle (0.65cm);
        \node[white, font=\small\sffamily\bfseries, fill=charcoal!95, rounded corners=3pt, inner sep=4pt] at (0,0) {4011111 Physics $\times$ Microbiology};
    \end{scope}

    % Top Institutional Header
    \node[anchor=north west, align=left] at ($(current page.north west)+(1.8cm, -1.5cm)$) {
        {\fontsize{12.5pt}{16pt}\bfseries\color{physAmber} เอกสารคำสอนและคู่มือปฏิบัติการมาตรฐาน OBE}\\[3pt]
        {\fontsize{11pt}{15pt}\bfseries\color{white} หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา}\\[4pt]
        {\fontsize{8.5pt}{12pt}\color{softSmoke!80} FACULTY OF SCIENCE AND TECHNOLOGY \quad \textbullet \quad RAMBHAI BARNI RAJABHAT UNIVERSITY}
    };

    % Course Code Ribbon
    \node[anchor=north east, align=center, draw=physAmber, fill=charcoal!95, rounded corners=2.5mm, line width=0.9pt, inner sep=6pt] at ($(current page.north east)+(-1.8cm, -1.5cm)$) {
        {\fontsize{9pt}{11pt}\bfseries\color{physAmber} รหัสวิชา 4011111}\\[2pt]
        {\fontsize{8pt}{10pt}\color{physCyan} 3(2-3-4) หน่วยกิต}
    };

    % Title Banner
    \node[anchor=north west] at ($(current page.north west)+(1.5cm,-4.2cm)$) {
        \begin{tcolorbox}[
            enhanced,
            colback=charcoal!90,
            colframe=physCyan,
            boxrule=1.5pt,
            arc=4mm,
            width=18.0cm
        ]
            \vspace{6pt}
            {\Huge\bfseries\color{white} ฟิสิกส์สำหรับจุลชีววิทยา}\\[8pt]
            {\LARGE\bfseries\color{physAmber} เอกสารคำสอนและปฏิบัติการฉบับเข้าใจง่ายสำหรับนักศึกษาจุลชีววิทยา}\\[8pt]
            {\normalsize\sffamily\bfseries\color{physCyan} PHYSICS FOR MICROBIOLOGY (COURSE CODE 4011111)}\\[4pt]
            {\small\color{softSmoke} ระบบหน่วย $\bullet$ กลศาสตร์ของไหล $\bullet$ เครื่องปั่นเหวี่ยง $\bullet$ หม้อนึ่งความดันไอ $\bullet$ ไฟฟ้าชีวภาพ $\bullet$ กล้องจุลทรรศน์และรังสี}
            \vspace{6pt}
        \end{tcolorbox}
    };

    % Bottom Author Card
    \node[anchor=south west] at ($(current page.south west)+(1.5cm,1.8cm)$) {
        \begin{tcolorbox}[
            enhanced,
            colback=charcoal!95,
            colframe=physAmber,
            boxrule=1.2pt,
            arc=4mm,
            width=12.4cm
        ]
            {\large\bfseries\color{white} ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[4pt]
            {\footnotesize\color{physCyan} วท.บ. (ฟิสิกส์), วท.ม. (ฟิสิกส์ประยุกต์), ปร.ด. (ฟิสิกส์ประยุกต์)}\\[2pt]
            {\footnotesize\color{softSmoke} สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี}
        \end{tcolorbox}
    };

    \node[anchor=south east] at ($(current page.south east)+(-1.5cm,1.8cm)$) {
        \begin{tcolorbox}[
            enhanced,
            colback=charcoal!95,
            colframe=bioEmerald,
            boxrule=1.2pt,
            arc=4mm,
            width=4.8cm,
            halign=center
        ]
            {\Large\bfseries\color{physAmber} ภาคเรียนที่ 2/2569}\\[2pt]
            {\footnotesize\bfseries\color{white} OBE Curriculum}\\[1pt]
            {\scriptsize\color{bioEmerald!80} Low-Math Edition}
        \end{tcolorbox}
    };
\end{tikzpicture}
\end{titlepage}
\restoregeometry
"""

with open(os.path.join(BASE_DIR, "frontmatter", "cover.tex"), "w", encoding="utf-8") as f:
    f.write(cover_tex)

# 4. frontmatter/title.tex
title_tex = r"""\begin{titlepage}
\thispagestyle{empty}
\begin{center}
    \vspace*{1.0cm}
    {\Large\bfseries\color{physCyan} เอกสารคำสอนและคู่มือปฏิบัติการรายวิชา 4011111}\\[0.5cm]
    {\Huge\bfseries\color{physRoyalBlue} ฟิสิกส์สำหรับจุลชีววิทยา}\\[0.4cm]
    {\LARGE\bfseries\color{physAmber} Physics for Microbiology}\\[0.4cm]
    {\large\bfseries\color{bioEmerald} หน่วยกิต 3(2-3-4)\quad หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา}\\[1.6cm]

    \begin{tcolorbox}[
        enhanced,
        colback=boxBlueBg,
        colframe=physRoyalBlue,
        width=14.2cm,
        arc=2.5mm,
        boxrule=1.0pt,
        halign=center
    ]
        {\normalsize\bfseries ออกแบบตามแนวทางการจัดการศึกษาที่มุ่งเน้นผลลัพธ์ (Outcome-Based Education)}\\[4pt]
        {\small เชื่อมโยงผลลัพธ์การเรียนรู้ของหลักสูตร (PLO1--PLO6) สู่ผลลัพธ์การเรียนรู้รายวิชา (CLO1--CLO4)}\\[2pt]
        {\small พร้อมเทคนิคการคำนวณฉบับเข้าใจง่ายไร้แคลคูลัส และปฏิบัติการทดลอง 13 การทดลอง}
    \end{tcolorbox}

    \vspace{1.6cm}
    {\Large\bfseries ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[0.3cm]
    {\normalsize วท.บ. (ฟิสิกส์), วท.ม. (ฟิสิกส์ประยุกต์), ปร.ด. (ฟิสิกส์ประยุกต์)}\\[0.2cm]
    {\normalsize สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี}\\[0.2cm]
    {\normalsize มหาวิทยาลัยราชภัฏรำไพพรรณี}\\[1.8cm]

    \begin{tcolorbox}[
        enhanced,
        colback=softSmoke,
        colframe=bioEmerald,
        width=14.2cm,
        arc=2mm,
        halign=center
    ]
        {\small\bfseries เอกสารคำสอนประจำภาคเรียนที่ 2 ปีการศึกษา 2569}\\[2pt]
        {\footnotesize คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี}\\[2pt]
        {\footnotesize พ.ศ. 2569}
    \end{tcolorbox}
\end{center}
\end{titlepage}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "title.tex"), "w", encoding="utf-8") as f:
    f.write(title_tex)

# 5. frontmatter/preface.tex
preface_tex = r"""\chapter*{คำนำ}
\addcontentsline{toc}{chapter}{คำนำ}

รายวิชา \textbf{4011111 ฟิสิกส์สำหรับจุลชีววิทยา} (\textbf{Physics for Microbiology}) จำนวน 3(2-3-4) หน่วยกิต เป็นรายวิชาบังคับในกลุ่มวิชาแกนวิทยาศาสตร์ของหลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี โดยมีเป้าหมายสำคัญเพื่อสร้างรากฐานความเข้าใจด้านปรากฏการณ์ทางกายภาพและกลไกการทำงานของเครื่องมือวิทยาศาสตร์ที่นักจุลชีววิทยาต้องใช้งานจริงในห้องปฏิบัติการ ตั้งแต่การปิเปตสารละลายระดับไมโครลิตร การเคลื่อนที่ของแบคทีเรียในอาหารเลี้ยงเชื้อเหลว การแยกเซลล์ด้วยเครื่องปั่นเหวี่ยง (\textbf{Centrifuge}) การฆ่าเชื้อด้วยหม้อนึ่งความดันไอ (\textbf{Autoclave}) การย้อมสีแกรมและการแยกดีเอ็นเอด้วยสนามไฟฟ้า (\textbf{Gel Electrophoresis}) การเพิ่มอำนาจแยกชัดของกล้องจุลทรรศน์ด้วยน้ำมันช่วยส่อง (\textbf{Immersion Oil}) ไปจนถึงการควบคุมจุลินทรีย์ด้วยรังสีอัลตราไวโอเลตและการวัดความหนาแน่นเซลล์ด้วยเครื่องสเปกโตรโฟโตมิเตอร์ (\textbf{Spectrophotometer})

ปัญหาสำคัญที่พบในการจัดการเรียนการสอนวิชาฟิสิกส์ให้แก่นักศึกษาสาขาจุลชีววิทยา คือ นักศึกษาจำนวนมากมีความกังวลต่อสมการคณิตศาสตร์ที่ซับซ้อนและแคลคูลัส ดังนั้น ผู้เขียนจึงได้ออกแบบและเรียบเรียงเอกสารคำสอนและคู่มือปฏิบัติการเล่มนี้ขึ้นใหม่ทั้งหมดตามแนวคิด \textbf{ฟิสิกส์ฉบับเข้าใจง่ายไร้แคลคูลัส} (\textbf{Low-Math \& High-Concept Physics}) โดยตัดการใช้แคลคูลัสและตรีโกณมิติที่ซับซ้อนออกทั้งหมด แล้วแทนที่ด้วย \textbf{เทคนิคสามเหลี่ยมสูตรคำนวณ} การเปรียบเทียบสัดส่วนตรงและสัดส่วนผกผัน และการอ่านกราฟเชิงกายภาพควบคู่ไปกับตัวอย่างโจทย์ในบริบทห้องปฏิบัติการจุลชีววิทยาที่มีการแสดงวิธีทำทีละขั้นตอนอย่างชัดเจน

นอกจากนี้ เอกสารคำสอนเล่มนี้ยังได้รับการออกแบบตามกรอบมาตรฐานการจัดการศึกษาที่มุ่งเน้นผลลัพธ์การเรียนรู้ (\textbf{Outcome-Based Education}) โดยเชื่อมโยงผลลัพธ์การเรียนรู้ของหลักสูตรสาขาวิชาจุลชีววิทยา (\textbf{PLO1 ถึง PLO6}) เข้ากับผลลัพธ์การเรียนรู้ของรายวิชา (\textbf{CLO1 ถึง CLO4}) อย่างเคร่งครัด ครอบคลุมแผนการสอนรายสัปดาห์ตลอด 15 สัปดาห์ (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง รวม 5 ชั่วโมงต่อสัปดาห์) พร้อมใบงานปฏิบัติการทดลองทั้ง 13 การทดลองอยู่ในเล่มเดียวกัน เพื่อให้นักศึกษาสามารถใช้เรียนรู้ทั้งภาคทฤษฎีและภาคปฏิบัติได้อย่างสมบูรณ์

ผู้เขียนหวังเป็นอย่างยิ่งว่า เอกสารคำสอนและคู่มือปฏิบัติการรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา เล่มนี้ จะช่วยให้นักศึกษาสาขาวิชาจุลชีววิทยาเกิดความมั่นใจ มีเจตคติที่ดีต่อวิชาฟิสิกส์ และสามารถนำหลักการทางฟิสิกส์ไปประยุกต์ใช้ในการทำงานวิจัยและการปฏิบัติงานในห้องปฏิบัติการจุลชีววิทยาได้อย่างมืออาชีพ

\vspace{1.2cm}
\begin{flushright}
    \textbf{ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[0.2cm]
    สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี\\
    มหาวิทยาลัยราชภัฏรำไพพรรณี\\
    ภาคเรียนที่ 2 ปีการศึกษา 2569
\end{flushright}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "preface.tex"), "w", encoding="utf-8") as f:
    f.write(preface_tex)

# 6. frontmatter/acknowledgements.tex
ack_tex = r"""\chapter*{กิตติกรรมประกาศ}
\addcontentsline{toc}{chapter}{กิตติกรรมประกาศ}

เอกสารคำสอนและคู่มือปฏิบัติการรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา เล่มนี้ สำเร็จลุล่วงได้อย่างสมบูรณ์ด้วยความอนุเคราะห์และการสนับสนุนทางวิชาการจากคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี ที่ได้ส่งเสริมการพัฒนาสื่อการสอนและเอกสารคำสอนที่สอดคล้องกับเกณฑ์มาตรฐานหลักสูตรและการจัดการศึกษาที่มุ่งเน้นผลลัพธ์การเรียนรู้

ผู้เขียนขอกราบขอบพระคุณคณาจารย์ประจำหลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา และคณาจารย์สาขาวิชาฟิสิกส์ทุกท่าน ที่ได้ร่วมแลกเปลี่ยนองค์ความรู้และให้ข้อเสนอแนะในการคัดเลือกหัวข้อเนื้อหาและออกแบบชุดปฏิบัติการทดลองให้เชื่อมโยงโดยตรงกับเครื่องมือวิทยาศาสตร์ในห้องปฏิบัติการจุลชีววิทยา อาทิ เครื่องหมุนเหวี่ยงตกตะกอน หม้อนึ่งความดันไอ ตู้อบเลี้ยงเชื้อ ชุดอิเล็กโทรโฟรีซิส กล้องจุลทรรศน์กำลังขยายสูง และเครื่องสเปกโตรโฟโตมิเตอร์

ขอขอบคุณนักศึกษาสาขาวิชาจุลชีววิทยาทุกชั้นปี ที่ได้สะท้อนความคิดเห็นเกี่ยวกับการเรียนรู้วิชาฟิสิกส์พื้นฐาน ซึ่งเป็นแรงบันดาลใจสำคัญให้ผู้เขียนพัฒนาวิธีอธิบายด้วยภาพจำสามเหลี่ยมสูตรคำนวณและขั้นตอนการแทนค่าที่เข้าใจง่าย ช่วยลดอุปสรรคด้านคณิตศาสตร์และเพิ่มความสนุกในการทดลองจริง

คุณค่าและประโยชน์ทางวิชาการอันพึงมีจากเอกสารคำสอนเล่มนี้ ผู้เขียนขอน้อมบูชาพระคุณบิดา มารดา และบูรพาจารย์ทุกท่านที่ได้ประสิทธิ์ประสาทวิชาความรู้และเป็นแบบอย่างของความเป็นครูผู้มุ่งมั่นพัฒนาผู้เรียนเสมอมา

\vspace{1.2cm}
\begin{flushright}
    \textbf{ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[0.2cm]
    สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี\\
    มหาวิทยาลัยราชภัฏรำไพพรรณี
\end{flushright}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "acknowledgements.tex"), "w", encoding="utf-8") as f:
    f.write(ack_tex)

# 7. frontmatter/syllabus.tex
syllabus_tex = r"""\chapter*{แผนการจัดการเรียนรู้แบบมุ่งเน้นผลลัพธ์ OBE รายวิชา 4011111}
\addcontentsline{toc}{chapter}{แผนการจัดการเรียนรู้แบบมุ่งเน้นผลลัพธ์ OBE รายวิชา 4011111}

\noindent\textbf{ข้อมูลทั่วไปของรายวิชา}
\begin{itemize}
    \item \textbf{รหัสและชื่อรายวิชา}\quad 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (\textbf{Physics for Microbiology})
    \item \textbf{จำนวนหน่วยกิต}\quad 3(2-3-4) หน่วยกิต (บรรยาย 2 ชั่วโมงต่อสัปดาห์ ปฏิบัติการ 3 ชั่วโมงต่อสัปดาห์ และศึกษาด้วยตนเอง 4 ชั่วโมงต่อสัปดาห์ รวมเวลาเรียนในชั้นเรียน 5 ชั่วโมงต่อสัปดาห์ ตลอด 15 สัปดาห์)
    \item \textbf{หลักสูตรและประเภทวิชา}\quad วิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (วิชาบังคับในกลุ่มวิชาแกนวิทยาศาสตร์)
    \item \textbf{ภาคการศึกษาที่เปิดสอน}\quad ภาคเรียนที่ 2 ปีการศึกษา 2569
\end{itemize}

\noindent\textbf{คำอธิบายรายวิชาภาษาไทย}

ระบบหน่วย เวกเตอร์และการเคลื่อนที่ กฎการเคลื่อนที่ของนิวตัน งานและพลังงาน ความร้อนและอุณหพลศาสตร์ ไฟฟ้าสถิตและไฟฟ้ากระแสเบื้องต้น ทัศนศาสตร์ กัมมันตภาพรังสี และปฏิบัติการที่เกี่ยวข้องกับการประยุกต์ใช้ในบริบททางจุลชีววิทยา

\noindent\textbf{คำอธิบายรายวิชาภาษาอังกฤษ}

Units system, vectors and motion, Newton's laws of motion, work and energy, heat and thermodynamics, basic electrostatics and electric current, optics, radioactivity, and laboratory practices designed to support applications in microbiological contexts.

\vspace{0.3cm}
\noindent\textbf{1. การเชื่อมโยงผลลัพธ์การเรียนรู้ของหลักสูตร (PLOs) สู่ผลลัพธ์การเรียนรู้รายวิชา (CLOs)}

เพื่อให้การจัดการเรียนการสอนสอดคล้องกับเล่มหลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (หน้า 7) อย่างเคร่งครัด รายวิชา 4011111 จึงกำหนดความเชื่อมโยงระหว่าง \textbf{PLOs} และ \textbf{CLOs} ตามหลักการ \textbf{Constructive Alignment} ดังแสดงใน\mbox{ตารางที่} 1

\begin{table}[H]
\centering
\caption{การเชื่อมโยงผลลัพธ์การเรียนรู้ของหลักสูตร (PLO1--PLO6) สู่ผลลัพธ์การเรียนรู้รายวิชา 4011111 (CLO1--CLO4)}
\small
\begin{tabularx}{\textwidth}{>{\bfseries}p{2.2cm} >{\raggedright\arraybackslash}X >{\bfseries}p{2.8cm} >{\raggedright\arraybackslash}X}
\toprule
รหัส CLO & คำอธิบายผลลัพธ์การเรียนรู้รายวิชา (CLOs) & เชื่อมโยงกับ PLO & แนวทางการวัดและประเมินผล \\
\midrule
CLO1 & อธิบายความรู้พื้นฐานทางฟิสิกส์ (ระบบหน่วย เวกเตอร์ กลศาสตร์ ความร้อน ไฟฟ้า ทัศนศาสตร์ และกัมมันตภาพรังสี) ที่เป็นวิทยาศาสตร์พื้นฐานเพื่อเชื่อมโยงกับงานด้านจุลชีววิทยาได้ & PLO2 (อธิบายความรู้พื้นฐานและประยุกต์เพื่อแก้ปัญหา) & แบบทดสอบย่อย (Quiz) ใบงานทฤษฎีแบบเน้นแนวคิด และการสอบกลางภาค--ปลายภาค \\
\addlinespace[4pt]
CLO2 & ประยุกต์ใช้หลักการทางฟิสิกส์และกระบวนการทางวิทยาศาสตร์ เพื่ออธิบายกลไกการทำงานของเครื่องมือวิทยาศาสตร์ (เช่น กล้องจุลทรรศน์, Autoclave, Centrifuge) และแก้ไขปัญหาในห้องปฏิบัติการจุลชีววิทยาได้ & PLO2 และ PLO3 (ใช้กระบวนการทางวิทยาศาสตร์แก้ปัญหาจุลชีววิทยา) & กรณีศึกษา (Case Study) การวิเคราะห์ข้อมูลการทดลอง และโครงงานย่อยสัปดาห์ที่ 14 \\
\addlinespace[4pt]
CLO3 & ปฏิบัติการทดลองทางฟิสิกส์โดยตระหนักถึงความปลอดภัย มีวินัย และปฏิบัติตามจรรยาบรรณในการทำงานในห้องปฏิบัติการ & PLO1 (มีจรรยาบรรณแห่งวิชาชีพวิทยาศาสตร์) & แบบสังเกตพฤติกรรมความปลอดภัย วินัยการใช้อุปกรณ์ และการบันทึกข้อมูลตามจริงไม่เมคเลข \\
\addlinespace[4pt]
CLO4 & ทำงานร่วมกับผู้อื่นได้อย่างมีประสิทธิภาพ และสามารถสื่อสารข้อมูลทางวิทยาศาสตร์ (การเขียนรายงานและการนำเสนอ) ได้อย่างถูกต้อง & PLO4, PLO5 และ PLO6 (พัฒนาตนเอง ทำงานเป็นทีม และสื่อสารถูกต้อง) & รายงานปฏิบัติการรายกลุ่ม การอภิปรายผล และการนำเสนอโครงงานย่อย \\
\bottomrule
\end{tabularx}
\end{table}

\vspace{0.2cm}
\noindent\textbf{2. แผนการสอนรายสัปดาห์ตลอด 15 สัปดาห์ (ทฤษฎี 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง รวม 5 ชั่วโมงต่อสัปดาห์)}

\begin{table}[H]
\centering
\caption{แผนการจัดการเรียนรู้รายสัปดาห์ รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (15 สัปดาห์)}
\footnotesize
\begin{tabularx}{\textwidth}{c >{\raggedright\arraybackslash}p{4.3cm} >{\raggedright\arraybackslash}p{4.4cm} >{\raggedright\arraybackslash}X c}
\toprule
\textbf{สัปดาห์} & \textbf{หัวข้อบรรยาย (2 ชม.)} & \textbf{หัวข้อปฏิบัติการ (3 ชม.)} & \textbf{กลยุทธ์การสอน OBE} & \textbf{CLOs} \\
\midrule
1 & บทที่ 1 ระบบหน่วยและการวัดในโลกจุลทรรศน์ ($\mu\text{m}$, $\text{nm}$, $\mu\text{L}$) & Lab 1 การวัดละเอียดและทักษะการใช้ไมโครปิเปตและการชั่งสาร & Interactive Lecture \& Hands-on Practice & CLO1, CLO3, CLO4 \\
\addlinespace[3pt]
2 & บทที่ 2 เวกเตอร์และการเคลื่อนที่ในของเหลวและการแพร่ & Lab 2 การเคลื่อนที่แนวตรงและสังเกต Brownian Motion จุลินทรีย์ & Problem-Based Learning (PBL) & CLO1, CLO3, CLO4 \\
\addlinespace[3pt]
3 & บทที่ 3 กฎการเคลื่อนที่ของนิวตัน แรงต้าน และความหนืดอาหารเหลว & Lab 3 กฎของนิวตันและการวัดความหนืดของสารละลายชีวภาพ & Demonstration \& Guided Inquiry & CLO1, CLO2, CLO3 \\
\addlinespace[3pt]
4 & บทที่ 4 งาน พลังงาน และหลักการเครื่องปั่นเหวี่ยง (RPM สู่ RCF) & Lab 4 พลังงานกลและการคำนวณแรงเหวี่ยงสัมพัทธ์เครื่อง Centrifuge & Case-Based Learning & CLO1, CLO2, CLO4 \\
\addlinespace[3pt]
5 & บทที่ 5 ความร้อน ความจุความร้อนจำเพาะ และการควบคุมอุณหภูมิ & Lab 5 การถ่ายโอนความร้อนและตรวจสอบเสถียรภาพตู้ Incubator & Active Learning \& Group Discussion & CLO1, CLO2, CLO3 \\
\addlinespace[3pt]
6 & บทที่ 6 อุณหพลศาสตร์ ความดันไอ และหลักการหม้อนึ่งความดันไอ & Lab 6 ความดันไอ จุดเดือด และวิเคราะห์รอบการทำงาน Autoclave & Case Study (ทำไมต้อง $121\,^\circ\text{C}$ 15 psi) & CLO1, CLO2, CLO4 \\
\addlinespace[3pt]
7 & \multicolumn{3}{l}{\textbf{สัปดาห์ทบทวนสรุปสูตรฉบับเข้าใจง่าย (1 ชม.) และสอบวัดผลกลางภาค เนื้อหาสัปดาห์ที่ 1--6 (2 ชม.)}} & CLO1, CLO2 \\
\addlinespace[3pt]
8 & บทที่ 7 ไฟฟ้าสถิต ประจุผิวเซลล์แบคทีเรีย และการย้อมสีแกรม & Lab 7 ไฟฟ้าสถิตและกลไกการยึดเกาะของสีย้อมประจุบวกกับผนังเซลล์ & Visual Simulation \& Concept Mapping & CLO1, CLO3, CLO4 \\
\addlinespace[3pt]
9 & บทที่ 8 ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส & Lab 8 การต่อวงจรไฟฟ้าพื้นฐานและการจำลอง Gel Electrophoresis & Inquiry-Based Lab & CLO1, CLO2, CLO3 \\
\addlinespace[3pt]
10 & บทที่ 9 ทัศนศาสตร์พื้นฐาน การสะท้อน การหักเห และดัชนีหักเห & Lab 9 การสะท้อนและการหักเหของแสงผ่านตัวกลางและสารละลายน้ำตาล & Hands-on Optical Ray Tracing & CLO1, CLO3, CLO4 \\
\addlinespace[3pt]
11 & บทที่ 10 กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง & Lab 10 เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil (100x) & Problem-Based Lab (แก้ปัญหาภาพมัว) & CLO1, CLO2, CLO3 \\
\addlinespace[3pt]
12 & บทที่ 11 กัมมันตภาพรังสี ครึ่งชีวิต และรังสี UV ฆ่าเชื้อจุลินทรีย์ & Lab 11 การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV-C & Simulation \& Data Plotting & CLO1, CLO2, CLO4 \\
\addlinespace[3pt]
13 & บทที่ 12 การบูรณาการฟิสิกส์กับเครื่องสเปกโตรโฟโตมิเตอร์ & Lab 12 การวัดค่าการดูดกลืนแสง ($\text{OD}_{600}$) ประเมินการเจริญแบคทีเรีย & Integrated Instrument Lab & CLO1, CLO2, CLO4 \\
\addlinespace[3pt]
14 & การสังเคราะห์ฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยาสมัยใหม่ & Lab 13 โครงงานย่อย (Mini-Project) นำเสนอฟิสิกส์ในเครื่องมือจุลชีววิทยา & Project-Based Learning (PjBL) & CLO2, CLO3, CLO4 \\
\addlinespace[3pt]
15 & \multicolumn{3}{l}{\textbf{สัปดาห์สรุปองค์ความรู้รวบยอดและสอบวัดผลปลายภาค เนื้อหาสัปดาห์ที่ 8--14 (3 ชม.)}} & CLO1, CLO2 \\
\bottomrule
\end{tabularx}
\end{table}

\noindent\textbf{3. สัดส่วนการวัดและประเมินผลตามแนวทาง OBE (รวม 100 คะแนน)}
\begin{itemize}
    \item \textbf{ภาคทฤษฎีและการประยุกต์แนวคิด (50 คะแนน)}\quad แบ่งเป็น สอบกลางภาค 20 คะแนน (CLO1, CLO2), สอบปลายภาค 20 คะแนน (CLO1, CLO2) และแบบทดสอบย่อยท้ายคาบควบคู่ใบงานแก้โจทย์ฉบับเข้าใจง่าย 10 คะแนน (CLO1) โดยมีตารางสูตรฟิสิกส์ให้ในห้องสอบเพื่อเน้นวัดความเข้าใจและการนำไปใช้จริง
    \item \textbf{ภาคปฏิบัติการและทักษะกระบวนการทางวิทยาศาสตร์ (50 คะแนน)}\quad แบ่งเป็น รายงานปฏิบัติการรายสัปดาห์ 20 คะแนน (CLO4), ทักษะการใช้อุปกรณ์ วินัย ความปลอดภัย และการบันทึกข้อมูลตามจริง 15 คะแนน (CLO3) และโครงงานย่อยนำเสนอหลักการฟิสิกส์ในเครื่องมือจุลชีววิทยา 15 คะแนน (CLO2, CLO4)
\end{itemize}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "syllabus.tex"), "w", encoding="utf-8") as f:
    f.write(syllabus_tex)

# 8. backmatter/appendix_lowmath.tex
appendix_tex = r"""\chapter*{ภาคผนวก ก\quad คัมภีร์สรุปสูตรฟิสิกส์ฉบับเข้าใจง่ายและเกณฑ์ประเมินผล OBE}
\addcontentsline{toc}{chapter}{ภาคผนวก ก\quad คัมภีร์สรุปสูตรฟิสิกส์ฉบับเข้าใจง่ายและเกณฑ์ประเมินผล OBE}
\markboth{ภาคผนวก ก\quad คัมภีร์สรุปสูตรฟิสิกส์ฉบับเข้าใจง่าย}{ภาคผนวก ก\quad คัมภีร์สรุปสูตรฟิสิกส์ฉบับเข้าใจง่าย}

\section*{ส่วนที่ 1\quad เทคนิคสามเหลี่ยมสูตรคำนวณสำหรับนักศึกษาจุลชีววิทยา}

เพื่อช่วยให้นักศึกษาสาขาวิชาจุลชีววิทยาสามารถแก้โจทย์ฟิสิกส์ได้โดยไม่ต้องย้ายข้างสมการที่ซับซ้อน เราสามารถจัดรูปสมการ 3 ตัวแปรให้อยู่ในรูป \textbf{สามเหลี่ยมสูตรคำนวณ} (\textbf{Formula Triangle}) โดยมีหลักการใช้งานง่ายเพียงข้อเดียวคือ \textbf{ต้องการหาตัวแปรใด ให้เอานิ้วปิดตัวแปรนั้น} หากตัวแปรที่เหลืออยู่บรรทัดเดียวกันให้นำมาคูณกัน หากอยู่คนละบรรทัด (บนกับล่าง) ให้นำตัวบนตั้งแล้วหารด้วยตัวล่าง ดังแสดงใน\mbox{ภาพที่} ก.1

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily]
    % Triangle 1: v = s / t
    \begin{scope}[shift={(0,0)}]
        \fill[boxBlueBg] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[physRoyalBlue, line width=1.6pt] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[physRoyalBlue, line width=1.2pt] (1.05,1.7) -- (3.15,1.7);
        \draw[physRoyalBlue, line width=1.2pt] (2.1,0) -- (2.1,1.7);
        \node[font=\Large\bfseries, color=physRoyalBlue] at (2.1,2.35) {$s$};
        \node[font=\Large\bfseries, color=bioEmerald] at (1.35,0.75) {$v$};
        \node[font=\Large\bfseries, color=physAmber] at (2.85,0.75) {$t$};
        \node[font=\small\bfseries, color=charcoal] at (2.1,-0.55) {อัตราเร็ว $v = \dfrac{s}{t}$};
    \end{scope}

    % Triangle 2: F = m * a
    \begin{scope}[shift={(5.4,0)}]
        \fill[boxGreenBg] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[bioEmerald, line width=1.6pt] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[bioEmerald, line width=1.2pt] (1.05,1.7) -- (3.15,1.7);
        \draw[bioEmerald, line width=1.2pt] (2.1,0) -- (2.1,1.7);
        \node[font=\Large\bfseries, color=physRoyalBlue] at (2.1,2.35) {$F$};
        \node[font=\Large\bfseries, color=bioEmerald] at (1.35,0.75) {$m$};
        \node[font=\Large\bfseries, color=physAmber] at (2.85,0.75) {$a$};
        \node[font=\small\bfseries, color=charcoal] at (2.1,-0.55) {กฎนิวตัน $F = m \times a$};
    \end{scope}

    % Triangle 3: V = I * R
    \begin{scope}[shift={(10.8,0)}]
        \fill[boxAmberBg] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[physAmber, line width=1.6pt] (0,0) -- (4.2,0) -- (2.1,3.4) -- cycle;
        \draw[physAmber, line width=1.2pt] (1.05,1.7) -- (3.15,1.7);
        \draw[physAmber, line width=1.2pt] (2.1,0) -- (2.1,1.7);
        \node[font=\Large\bfseries, color=physRoyalBlue] at (2.1,2.35) {$V$};
        \node[font=\Large\bfseries, color=bioEmerald] at (1.35,0.75) {$I$};
        \node[font=\Large\bfseries, color=physAmber] at (2.85,0.75) {$R$};
        \node[font=\small\bfseries, color=charcoal] at (2.1,-0.55) {กฎของโอห์ม $V = I \times R$};
    \end{scope}
\end{tikzpicture}%
}
\caption{ผังสามเหลี่ยมสูตรคำนวณหลักสำหรับการแก้โจทย์ฟิสิกส์โดยไม่ต้องย้ายข้างสมการ}
\end{figure}

\begin{table}[H]
\centering
\caption{ตารางสรุปสูตรฟิสิกส์ประจำรายวิชา 4011111 (แจกให้นักศึกษาใช้ประกอบการทำข้อสอบกลางภาคและปลายภาค)}
\small
\begin{tabularx}{\textwidth}{>{\bfseries}p{3.4cm} p{4.6cm} >{\raggedright\arraybackslash}X}
\toprule
หมวดหมู่และบทเรียน & สมการพร้อมใช้ & ความหมายและการประยุกต์ในห้องแล็บจุลชีววิทยา \\
\midrule
บทที่ 1 การแปลงหน่วย & $1\text{ mm} = 1{,}000\text{ }\mu\text{m}$\newline $1\text{ mL} = 1{,}000\text{ }\mu\text{L}$ & ใช้แปลงขนาดเซลล์แบคทีเรีย ($\mu\text{m}$) ไวรัส ($\text{nm}$) และการตั้งค่าไมโครปิเปต ($\mu\text{L}$) \\
\addlinespace[4pt]
บทที่ 2 การเคลื่อนที่ & $v = \dfrac{s}{t}$ และ $x_{\text{rms}} = \sqrt{2Dt}$ & คำนวณอัตราเร็วการว่ายของแบคทีเรียมีแฟลกเจลลา และระยะการแพร่ของสารอาหารในวุ้น \\
\addlinespace[4pt]
บทที่ 3 แรงและความหนืด & $F_{\text{drag}} = 6\pi \eta r v$\newline $v_t = \dfrac{2 r^2 (\rho_p - \rho_f) g}{9\eta}$ & กฎของสโตกส์อธิบายอัตราเร็วตกตะกอนของเซลล์ในอาหารเลี้ยงเชื้อเหลวที่มีความหนืด $\eta$ \\
\addlinespace[4pt]
บทที่ 4 เครื่องปั่นเหวี่ยง & $\text{RCF} = 1.118 \times 10^{-5} \times r_{\text{cm}} \times (\text{RPM})^2$ & แปลงความเร็วรอบเครื่องปั่นเหวี่ยง (RPM) เป็นค่าแรงเหวี่ยงสัมพัทธ์ ($\times g$) ตามรัศมีโรเตอร์ $r_{\text{cm}}$ \\
\addlinespace[4pt]
บทที่ 5--6 ความร้อนและไอน้ำ & $Q = mc\Delta T$ และ $Q = mL_v$\newline $P_1 / T_1 = P_2 / T_2$ & คำนวณพลังงานความร้อนของตู้อบ Incubator และความร้อนแฝงของไอน้ำในหม้อนึ่ง Autoclave ($121\,^\circ\text{C}$) \\
\addlinespace[4pt]
บทที่ 7--8 ไฟฟ้าชีวภาพ & $F_e = \dfrac{k q_1 q_2}{r^2}$,\quad $V = IR$,\quad $P = VI$ & แรงดึงดูดระหว่างสีย้อมแกรมกับผนังเซลล์ประจุลบ และการเคลื่อนที่ของ DNA ใน Gel Electrophoresis \\
\addlinespace[4pt]
บทที่ 9--10 กล้องจุลทรรศน์ & $n_1 \sin\theta_1 = n_2 \sin\theta_2$\newline $M_{\text{total}} = M_{\text{obj}} \times M_{\text{oc}}$\newline $d_{\min} = \dfrac{0.61\lambda}{\text{NA}}$ & คำนวณกำลังขยายรวมและขีดจำกัดการแยกชัด $d_{\min}$ เมื่อหยดน้ำมันช่วยส่อง Immersion Oil ($n=1.515$) \\
\addlinespace[4pt]
บทที่ 11--12 รังสีและ $\text{OD}_{600}$ & $N = N_0 \left(\dfrac{1}{2}\right)^n$,\quad $A = \varepsilon b c$ & คำนวณจำนวนสารกัมมันตรังสีหรือจำนวนเชื้อที่ลดลงตามครึ่งชีวิต และการวัดความขุ่นเซลล์ $\text{OD}_{600}$ \\
\bottomrule
\end{tabularx}
\end{table}

\section*{ส่วนที่ 2\quad เกณฑ์การประเมินผลแบบรูบริกส์ตามผลลัพธ์การเรียนรู้ (CLO Rubrics)}

\begin{table}[H]
\centering
\caption{เกณฑ์รูบริกส์สำหรับการประเมินผลลัพธ์การเรียนรู้รายวิชา (CLO1 ถึง CLO4)}
\footnotesize
\begin{tabularx}{\textwidth}{>{\bfseries}p{1.8cm} >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}
\toprule
ผลลัพธ์ (CLO) & ระดับดีเยี่ยม (4 คะแนน) & ระดับดี (3 คะแนน) & ระดับต้องปรับปรุง (1--2 คะแนน) \\
\midrule
CLO1 ความรู้ฟิสิกส์พื้นฐาน & อธิบายหลักการฟิสิกส์และเลือกใช้สูตรคำนวณพร้อมระบุหน่วย SI ได้ถูกต้องครบถ้วนทุกขั้นตอน & อธิบายหลักการและแทนค่าในสูตรได้ถูกต้อง แต่มีความคลาดเคลื่อนของการแปลงหน่วยเล็กน้อย & ยังสับสนในการเลือกใช้สูตรคำนวณหรือละเลยการระบุหน่วยวัดทางวิทยาศาสตร์ \\
\addlinespace[4pt]
CLO2 ประยุกต์ใช้กับเครื่องมือจุลชีววิทยา & วิเคราะห์กลไกฟิสิกส์ของเครื่องมือ (เช่น Autoclave, Centrifuge, กล้องจุลทรรศน์) และเสนอแนวทางแก้ปัญหาหน้างานได้ถูกต้องชัดเจน & อธิบายหลักการทำงานของเครื่องมือได้ถูกต้อง แต่การเชื่อมโยงสู่การแก้ปัญหาในห้องแล็บยังไม่ครบทุกประเด็น & อธิบายได้เฉพาะขั้นตอนการกดปุ่มใช้งานเครื่องมือ แต่ยังไม่สามารถอธิบายเหตุผลทางฟิสิกส์เบื้องหลังได้ \\
\addlinespace[4pt]
CLO3 ความปลอดภัยและจรรยาบรรณ & ปฏิบัติการทดลองด้วยความระมัดระวัง สวมใส่อุปกรณ์ป้องกันครบถ้วน และบันทึกข้อมูลจริงจากเครื่องมือวัดอย่างซื่อสัตย์ 100\% & ปฏิบัติตามกฎความปลอดภัยได้ดีและบันทึกข้อมูลตามจริง แต่ยังต้องได้รับคำแนะนำในการตั้งค่าเครื่องมือบางขั้นตอน & ประมาทในการใช้อุปกรณ์ไฟฟ้าหรือความร้อน หรือมีการดัดแปลงตัวเลขผลการทดลองให้ตรงกับทฤษฎี \\
\addlinespace[4pt]
CLO4 การทำงานเป็นทีมและสื่อสาร & แบ่งหน้าที่ในกลุ่มอย่างสมดุล เขียนรายงานปฏิบัติการและวาดกราฟได้ถูกต้องตามหลักวิชาการ และนำเสนอได้ชัดเจน & ทำงานร่วมกับกลุ่มได้ดี รายงานมีความครบถ้วนแต่กราฟหรือการสรุปผลยังขาดรายละเอียดบางส่วน & ขาดการมีส่วนร่วมในการทำแล็บกลุ่ม หรือส่งรายงานไม่ครบตามหัวข้อมาตรฐาน \\
\bottomrule
\end{tabularx}
\end{table}
"""

with open(os.path.join(BASE_DIR, "backmatter", "appendix_lowmath.tex"), "w", encoding="utf-8") as f:
    f.write(appendix_tex)

# 9. backmatter/references.tex
ref_tex = r"""\chapter*{บรรณานุกรม}
\addcontentsline{toc}{chapter}{บรรณานุกรม}
\markboth{บรรณานุกรม}{บรรณานุกรม}

\noindent\textbf{เอกสารและตำราภาษาไทย}

\begin{itemize}[leftmargin=1.5cm, itemsep=6pt]
    \item คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี. (2565). \textit{หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา (หลักสูตรปรับปรุง พ.ศ. 2565)}. จันทบุรี\quad มหาวิทยาลัยราชภัฏรำไพพรรณี.
    \item ชีวะ ทัศนา. (2569). \textit{ฟิสิกส์พื้นฐานและคู่มือปฏิบัติการสำหรับวิทยาศาสตร์ชีวภาพและสิ่งแวดล้อม}. จันทบุรี\quad สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี.
    \item นงลักษณ์ สุวรรณพินิจ และปรีชา สุวรรณพินิจ. (2564). \textit{จุลชีววิทยาทั่วไป} (พิมพ์ครั้งที่ 12). กรุงเทพฯ\quad สำนักพิมพ์แห่งจุฬาลงกรณ์มหาวิทยาลัย.
    \item ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย. (2563). \textit{ฟิสิกส์ทั่วไปสำหรับนักศึกษาวิทยาศาสตร์ชีวภาพ}. กรุงเทพฯ\quad สำนักพิมพ์แห่งจุฬาลงกรณ์มหาวิทยาลัย.
    \item สมพงศ์ ใจดี. (2562). \textit{ชีวฟิสิกส์เบื้องต้นและการประยุกต์ทางการแพทย์และชีววิทยา}. กรุงเทพฯ\quad สำนักพิมพ์มหาวิทยาลัยเกษตรศาสตร์.
\end{itemize}

\vspace{0.4cm}
\noindent\textbf{เอกสารและตำราภาษาอังกฤษ}

\begin{itemize}[leftmargin=1.5cm, itemsep=6pt]
    \item Berg, H. C. (2018). \textit{Random Walks in Biology} (Expanded ed.). Princeton, NJ\quad Princeton University Press.
    \item Cappuccino, J. G., \& Welsh, C. (2020). \textit{Microbiology\quad A Laboratory Manual} (12th ed.). Boston, MA\quad Pearson Education.
    \item Davidovits, P. (2019). \textit{Physics in Biology and Medicine} (5th ed.). London\quad Academic Press.
    \item Giambattista, A. (2020). \textit{College Physics\quad With an Integrated Approach to Forces and Kinematics} (5th ed.). New York, NY\quad McGraw-Hill Education.
    \item Madigan, M. T., Bender, K. S., Buckley, D. H., Sattley, W. M., \& Stahl, D. A. (2021). \textit{Brock Biology of Microorganisms} (16th ed.). Boston, MA\quad Pearson.
    \item Nelson, P. (2020). \textit{Biological Physics\quad Energy, Information, Life} (Updated ed.). New York, NY\quad W. H. Freeman and Company.
    \item Urone, P. P., \& Hinrichs, R. (2022). \textit{College Physics 2e}. Houston, TX\quad OpenStax, Rice University.
\end{itemize}
"""

with open(os.path.join(BASE_DIR, "backmatter", "references.tex"), "w", encoding="utf-8") as f:
    f.write(ref_tex)

# 10. backmatter/biography.tex
bio_tex = r"""\chapter*{ประวัติผู้เขียน}
\addcontentsline{toc}{chapter}{ประวัติผู้เขียน}
\markboth{ประวัติผู้เขียน}{ประวัติผู้เขียน}

\begin{center}
    \begin{tcolorbox}[
        enhanced,
        colback=softSmoke,
        colframe=physRoyalBlue,
        arc=4mm,
        boxrule=1.2pt,
        width=\textwidth
    ]
        \vspace{6pt}
        \textbf{\Large ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[6pt]
        {\large สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี}\\[8pt]

        \textbf{คุณวุฒิการศึกษา}
        \begin{itemize}
            \item ปร.ด. (ฟิสิกส์ประยุกต์) มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าธนบุรี
            \item วท.ม. (ฟิสิกส์ประยุกต์) สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง
            \item วท.บ. (ฟิสิกส์) มหาวิทยาลัยศรีนครินทรวิโรฒ
        \end{itemize}

        \textbf{ความเชี่ยวชาญทางวิชาการและการสอน}
        \begin{itemize}
            \item การจัดการเรียนการสอนวิชาฟิสิกส์พื้นฐานและชีวฟิสิกส์สำหรับนักศึกษาสาขาจุลชีววิทยา ชีววิทยา และเกษตรศาสตร์ ตามแนวทาง Outcome-Based Education (OBE)
            \item การออกแบบเครื่องมือวัดทางวิทยาศาสตร์ สเปกโตรโฟโตมิเตอร์ และระบบห้องปฏิบัติการอัจฉริยะ (Smart Physics \& Microbiology Laboratory)
            \item ฟิสิกส์การเกษตรดิจิทัล การตรวจวัดอนุภาคละอองลอย และการประยุกต์ใช้ปัญญาประดิษฐ์ (Edge AI) ในงานวิทยาศาสตร์ชีวภาพและสิ่งแวดล้อม
        \end{itemize}
        \vspace{6pt}
    \end{tcolorbox}
\end{center}
"""

with open(os.path.join(BASE_DIR, "backmatter", "biography.tex"), "w", encoding="utf-8") as f:
    f.write(bio_tex)

print("[OK] Generated style, main.tex, frontmatter, and backmatter.")
