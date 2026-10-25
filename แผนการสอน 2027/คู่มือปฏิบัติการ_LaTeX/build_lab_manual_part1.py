#!/usr/bin/env python3
"""
Lab Manual Generator Part 1: Style File, Main TeX, Frontmatter, and Backmatter
Course: 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) Physics for Microbiology Laboratory Manual
Standard: /rbru-latex-textbook-builder + /academic-book-cover-architect
"""
import os

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/คู่มือปฏิบัติการ_LaTeX"
for sub in ["styles", "frontmatter", "labs", "backmatter", "figures"]:
    os.makedirs(os.path.join(BASE_DIR, sub), exist_ok=True)

# 1. styles/physics_microbio_lab_style.sty
style_content = r"""\NeedsTeXFormat{LaTeX2e}
\ProvidesPackage{styles/physics_microbio_lab_style}[2026/10/24 RBRU Physics for Microbiology 4011111 Lab Manual Style]

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

% ====================================================================
% 4. COLOR PALETTE (Laboratory Emerald, Cyan, Royal Blue, Amber, Purple)
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
% 5. GRAPHICS, TIKZ, TABLES & CAPTIONS
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
    labelfont={bf, color=bioEmerald!85!black},
    labelsep=thaisep,
    skip=6pt
}
\captionsetup[table]{position=above}
\captionsetup[figure]{position=below}

\AtBeginDocument{%
    \renewcommand{\figurename}{\mbox{ภาพที่}}%
    \renewcommand{\tablename}{\mbox{ตารางที่}}%
    \renewcommand{\contentsname}{สารบัญ}%
    \renewcommand{\listfigurename}{สารบัญภาพชุดการทดลอง}%
    \renewcommand{\listtablename}{สารบัญตารางบันทึกผล}%
    \renewcommand{\chaptername}{ปฏิบัติการที่}%
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
% 6. TCOLORBOX ENVIRONMENTS (Lab Plan, Concept, Safety, Worksheet)
% ====================================================================
\RequirePackage[most]{tcolorbox}

% 6.1 Weekly Lab Lesson Plan Box
\newtcolorbox{planbox}[1][]{
    enhanced,
    breakable,
    colback=softSmoke,
    colframe=bioEmerald!85!black,
    colbacktitle=bioEmerald!85!black,
    coltitle=white,
    fonttitle=\large\bfseries,
    title={#1},
    arc=2mm,
    boxrule=1.0pt,
    left=10pt, right=10pt, top=8pt, bottom=8pt,
    toptitle=5pt, bottomtitle=5pt
}

% 6.2 Low-Math Formula & Concept Box
\newtcolorbox{conceptbox}[1][]{
    enhanced,
    breakable,
    colback=boxBlueBg,
    colframe=physRoyalBlue,
    colbacktitle=physRoyalBlue,
    coltitle=white,
    fonttitle=\bfseries,
    title={สรุปสูตรและหลักการคำนวณประจำปฏิบัติการ\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    borderline west={3.5pt}{0pt}{physCyan},
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.3 Equipment & Materials Box
\newtcolorbox{equipbox}[1][]{
    enhanced,
    breakable,
    colback=boxGreenBg,
    colframe=bioEmerald,
    colbacktitle=bioEmerald,
    coltitle=white,
    fonttitle=\bfseries,
    title={วัสดุ เครื่องมือวิทยาศาสตร์ และสารเคมีประจำฐานปฏิบัติการ\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    borderline west={3.5pt}{0pt}{bioTeal},
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.4 Pre-Lab Calculation Example Box
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
    title={ตัวอย่างการคำนวณข้อมูลการทดลองที่ \theworkedcounter\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% 6.5 Student Lab Data Recording Worksheet Box
\newtcolorbox{worksheetbox}[1][]{
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

% 6.6 Lab Safety & Ethical Integrity Warning Box (CLO3)
\newtcolorbox{warningbox}[1][]{
    enhanced,
    breakable,
    colback=boxRedBg,
    colframe=crimsonAlert,
    colbacktitle=crimsonAlert,
    coltitle=white,
    fonttitle=\bfseries,
    title={ข้อควรระวังความปลอดภัยและจรรยาบรรณห้องปฏิบัติการ (CLO3)\quad #1},
    arc=2mm,
    boxrule=0.9pt,
    left=10pt, right=10pt, top=7pt, bottom=7pt
}

% ====================================================================
% 7. HEADINGS & HIERARCHICAL INDENTATION (RBRU Standard)
% ====================================================================
\RequirePackage{titlesec}

\titleformat{\chapter}[display]
  {\normalfont\huge\bfseries\color{bioEmerald!85!black}}
  {\filright\Large\color{physRoyalBlue}\chaptername\ \thechapter}
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

\let\origsection\section
\renewcommand{\section}{\Needspace*{5\baselineskip}\origsection}

\let\origsubsection\subsection
\renewcommand{\subsection}{\Needspace*{4\baselineskip}\origsubsection}

% ====================================================================
% 8. HEADERS & FOOTERS (Fancyhdr — No Trailing Dot)
% ====================================================================
\RequirePackage{fancyhdr}
\pagestyle{fancy}
\fancyhf{}
\fancyhead[L]{\small\color{physSlate}\nouppercase{\leftmark}}
\fancyhead[R]{\small\color{bioEmerald!85!black}\textbf{คู่มือปฏิบัติการ 4011111}\quad|\quad\textbf{\thepage}}
\renewcommand{\headrulewidth}{0.5pt}
\renewcommand{\footrulewidth}{0pt}

\renewcommand{\chaptermark}[1]{\markboth{\chaptername\ \thechapter\quad #1}{}}
\renewcommand{\sectionmark}[1]{}

\fancypagestyle{plain}{
    \fancyhf{}
    \fancyfoot[C]{\small\color{bioEmerald!85!black}\textbf{\thepage}}
    \renewcommand{\headrulewidth}{0pt}
}

% ====================================================================
% 9. HYPERLINKS & INDEX
% ====================================================================
\RequirePackage{imakeidx}
\makeindex[intoc, title=ดัชนีค้นคำ, columns=2]

\RequirePackage{hyperref}
\hypersetup{
    colorlinks=true,
    linkcolor=physRoyalBlue,
    citecolor=bioEmerald,
    urlcolor=physCyan,
    pdftitle={คู่มือปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา รายวิชา 4011111 (Physics for Microbiology Laboratory Manual)},
    pdfauthor={ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา},
    pdfsubject={Physics for Microbiology 4011111 OBE Laboratory Manual (13 Labs)}
}
\endinput
"""

with open(os.path.join(BASE_DIR, "styles", "physics_microbio_lab_style.sty"), "w", encoding="utf-8") as f:
    f.write(style_content)

# 2. main.tex
main_tex = r"""\documentclass[12pt, a4paper, oneside]{book}

\usepackage{styles/physics_microbio_lab_style}

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

% 4. Laboratory Safety, Ethics (CLO3), and Report Guide (CLO4)
\cleardoublepage
\input{frontmatter/safety_rules.tex}

% 5. 15-Week OBE Lab Schedule & CLO Alignment
\cleardoublepage
\input{frontmatter/schedule.tex}

% 6. Table of Contents, List of Figures, List of Tables
\cleardoublepage
\tableofcontents

\cleardoublepage
\listoffigures
\addcontentsline{toc}{chapter}{สารบัญภาพชุดการทดลอง}

\cleardoublepage
\listoftables
\addcontentsline{toc}{chapter}{สารบัญตารางบันทึกผล}

% ====================================================================
% MAIN MATTER (13 Complete 3-Hour Laboratory Modules)
% ====================================================================
\mainmatter
\pagestyle{fancy}

\input{labs/lab01_micropipette_measurement.tex}
\input{labs/lab02_motion_brownian_diffusion.tex}
\input{labs/lab03_newton_stokes_viscosity.tex}
\input{labs/lab04_energy_centrifuge_rcf.tex}
\input{labs/lab05_heat_incubator_stability.tex}
\input{labs/lab06_vapor_pressure_autoclave.tex}
\input{labs/lab07_electrostatics_cell_staining.tex}
\input{labs/lab08_ohm_gel_electrophoresis.tex}
\input{labs/lab09_refraction_brix_fermentation.tex}
\input{labs/lab10_microscope_immersion_oil.tex}
\input{labs/lab11_half_life_uv_sterilization.tex}
\input{labs/lab12_spectrophotometer_od600.tex}
\input{labs/lab13_integrated_mini_project.tex}

% ====================================================================
% BACK MATTER (Error Analysis, Plotting Guide, Rubrics, References)
% ====================================================================
\backmatter
\input{backmatter/appendix_rubrics.tex}
\input{backmatter/references.tex}
\input{backmatter/biography.tex}

\cleardoublepage
\printindex

\end{document}
"""

with open(os.path.join(BASE_DIR, "main.tex"), "w", encoding="utf-8") as f:
    f.write(main_tex)

# 3. frontmatter/cover.tex
cover_tex = r"""\begin{titlepage}
\newgeometry{margin=0pt}
\thispagestyle{empty}
\noindent%
\begin{tikzpicture}[remember picture, overlay]
    \node[anchor=center, inner sep=0pt] at (current page.center) {
        \includegraphics[width=\paperwidth, height=\paperheight]{figures/cover_lab_physics4microbio2027.jpg}
    };
\end{tikzpicture}
\clearpage
\thispagestyle{empty}
\noindent%
\begin{tikzpicture}[remember picture, overlay]
    % Background Gradient (Deep Bio-Emerald & Oceanic Navy)
    \shade[top color=bioEmerald!75!black, bottom color=charcoal!96!black]
        (current page.south west) rectangle (current page.north east);

    % Precision Coordinate Grid
    \draw[physCyan!18, line width=0.4pt, step=1.2cm]
        ($(current page.south west)+(-1,-1)$) grid ($(current page.north east)+(1,1)$);

    % Central Vector Motif (Laboratory Instrumentation & Biophysical Measurement)
    \begin{scope}[shift={($(current page.center)+(0,-0.5)$)}]
        \foreach \r in {1.8, 3.0, 4.2, 5.4} {
            \draw[bioTeal!40, line width=0.6pt, dashed] (0,0) circle (\r cm);
        }
        \draw[physCyan!80, line width=1.3pt, rotate=30] (0,0) ellipse (4.7cm and 1.6cm);
        \draw[physAmber!85, line width=1.3pt, rotate=90] (0,0) ellipse (4.7cm and 1.6cm);
        \draw[bioEmerald!85, line width=1.3pt, rotate=150] (0,0) ellipse (4.7cm and 1.6cm);

        \fill[physCyan] (30:4.7cm) circle (3.5pt);
        \fill[physAmber] (90:4.7cm) circle (3.5pt);
        \fill[bioEmerald] (150:4.7cm) circle (3.5pt);

        \draw[physAmber, line width=2.2pt, fill=bioEmerald!90!black]
            (0:2.1cm) -- (60:2.1cm) -- (120:2.1cm) -- (180:2.1cm) -- (240:2.1cm) -- (300:2.1cm) -- cycle;
        \fill[physCyan!35] (0,0) circle (1.2cm);
        \node[white, font=\small\sffamily\bfseries, fill=charcoal!95, rounded corners=3pt, inner sep=4pt] at (0,0) {13 Hands-on Microbiology Labs};
    \end{scope}

    % Top Institutional Header
    \node[anchor=north west, align=left] at ($(current page.north west)+(1.8cm, -1.5cm)$) {
        {\fontsize{12.5pt}{16pt}\bfseries\color{physAmber} คู่มือปฏิบัติการและใบบันทึกผลการทดลองมาตรฐาน OBE}\\[3pt]
        {\fontsize{11pt}{15pt}\bfseries\color{white} หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา}\\[4pt]
        {\fontsize{8.5pt}{12pt}\color{softSmoke!80} FACULTY OF SCIENCE AND TECHNOLOGY \quad \textbullet \quad RAMBHAI BARNI RAJABHAT UNIVERSITY}
    };

    % Course Code Ribbon
    \node[anchor=north east, align=center, draw=physAmber, fill=charcoal!95, rounded corners=2.5mm, line width=0.9pt, inner sep=6pt] at ($(current page.north east)+(-1.8cm, -1.5cm)$) {
        {\fontsize{9pt}{11pt}\bfseries\color{physAmber} รหัสวิชา 4011111}\\[2pt]
        {\fontsize{8pt}{10pt}\color{bioEmerald!60!white} ปฏิบัติการ 3 ชม./สัปดาห์}
    };

    % Title Banner
    \node[anchor=north west] at ($(current page.north west)+(1.5cm,-4.2cm)$) {
        \begin{tcolorbox}[
            enhanced,
            colback=charcoal!92,
            colframe=bioEmerald!70!white,
            boxrule=1.5pt,
            arc=4mm,
            width=18.0cm
        ]
            \vspace{6pt}
            {\Huge\bfseries\color{white} คู่มือปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา}\\[8pt]
            {\LARGE\bfseries\color{physAmber} 13 การทดลองเชื่อมโยงเครื่องมือวิทยาศาสตร์และเทคนิคจุลชีววิทยา}\\[8pt]
            {\normalsize\sffamily\bfseries\color{physCyan} PHYSICS FOR MICROBIOLOGY LABORATORY MANUAL (4011111)}\\[4pt]
            {\small\color{softSmoke} Micropipette $\bullet$ Viscosity $\bullet$ Centrifuge RCF $\bullet$ Autoclave $\bullet$ Electrophoresis $\bullet$ Oil Immersion $\bullet$ $\text{OD}_{600}$}
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
            {\footnotesize\bfseries\color{white} 13 Lab Modules}\\[1pt]
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
    {\Large\bfseries\color{bioEmerald} คู่มือปฏิบัติการและใบบันทึกผลการทดลอง รายวิชา 4011111}\\[0.5cm]
    {\Huge\bfseries\color{physRoyalBlue} ปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา}\\[0.4cm]
    {\LARGE\bfseries\color{physAmber} Physics for Microbiology Laboratory Manual}\\[0.4cm]
    {\large\bfseries\color{charcoal} หน่วยกิต 3(2-3-4)\quad ปฏิบัติการสัปดาห์ละ 3 ชั่วโมง (รวม 13 การทดลอง)}\\[1.4cm]

    \begin{tcolorbox}[
        enhanced,
        colback=boxGreenBg,
        colframe=bioEmerald,
        width=14.2cm,
        arc=2.5mm,
        boxrule=1.0pt,
        halign=center
    ]
        {\normalsize\bfseries ออกแบบตามแนวทางการจัดการศึกษาที่มุ่งเน้นผลลัพธ์ (Outcome-Based Education)}\\[4pt]
        {\small พัฒนาทักษะการใช้เครื่องมือจุลชีววิทยาด้วยหลักการฟิสิกส์ (CLO2) จรรยาบรรณและความปลอดภัย (CLO3)}\\[2pt]
        {\small และทักษะการทำงานเป็นทีมและการเขียนรายงานทางวิทยาศาสตร์ (CLO4)}
    \end{tcolorbox}

    \vspace{1.2cm}
    \begin{tcolorbox}[
        enhanced,
        colback=softSmoke,
        colframe=physRoyalBlue,
        width=14.2cm,
        arc=2mm,
        boxrule=0.8pt
    ]
        \textbf{ข้อมูลประจำตัวนักศึกษาเจ้าของคู่มือปฏิบัติการ}\\[6pt]
        ชื่อ--นามสกุล \dotfill รหัสนักศึกษา \dotfill\\[6pt]
        กลุ่มเรียน (Section) \dotfill กลุ่มปฏิบัติการที่ \dotfill อาจารย์ผู้สอน \dotfill
    \end{tcolorbox}

    \vspace{1.2cm}
    {\Large\bfseries ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[0.25cm]
    {\normalsize สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี}\\[0.2cm]
    {\small ภาคเรียนที่ 2 ปีการศึกษา 2569}
\end{center}
\end{titlepage}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "title.tex"), "w", encoding="utf-8") as f:
    f.write(title_tex)

# 5. frontmatter/preface.tex
preface_tex = r"""\chapter*{คำนำ}
\addcontentsline{toc}{chapter}{คำนำ}

\textbf{คู่มือปฏิบัติการฟิสิกส์สำหรับจุลชีววิทยา} (\textbf{Physics for Microbiology Laboratory Manual}) เล่มนี้ จัดทำขึ้นเพื่อใช้ประกอบการเรียนการสอนภาคปฏิบัติการของรายวิชา \textbf{4011111 ฟิสิกส์สำหรับจุลชีววิทยา} จำนวน 3(2-3-4) หน่วยกิต (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมงต่อสัปดาห์) สำหรับนักศึกษาปริญญาตรี หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี โดยใช้ควบคู่กับเอกสารคำสอนเล่มหลักในชุดเดียวกัน

แนวคิดหลักในการออกแบบคู่มือปฏิบัติการเล่มนี้ คือ การเปลี่ยนภาพจำของปฏิบัติการฟิสิกส์แบบดั้งเดิมที่เน้นสมการคณิตศาสตร์ซับซ้อน ให้กลายเป็น \textbf{ปฏิบัติการฟิสิกส์ที่รับใช้ห้องปฏิบัติการจุลชีววิทยาโดยตรง} ทั้ง 13 การทดลองในเล่มนี้ได้รับการออกแบบให้เชื่อมโยงกับเครื่องมือวิทยาศาสตร์และปรากฏการณ์ทางชีวภาพที่นักจุลชีววิทยาต้องพบเจอในวิชาชีพจริง อาทิ การสอบเทียบความแม่นยำของไมโครปิเปตด้วยเครื่องชั่งดิจิทัล การสังเกตการเคลื่อนที่แบบบราวน์เทียบกับการว่ายเคลื่อนที่ของแบคทีเรีย การวัดความหนืดและอัตราเร็วตกตะกอนตามกฎของสโตกส์ การคำนวณค่าแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$ หรือ $\times g$) และการจัดสมดุลโรเตอร์ของเครื่องปั่นเหวี่ยง (\textbf{Centrifuge}) การตรวจสอบเสถียรภาพอุณหภูมิของตู้อบเลี้ยงเชื้อ (\textbf{Incubator}) การวิเคราะห์ความดันไอและจุดเดือดในหม้อนึ่งความดันไอ (\textbf{Autoclave}) ที่สภาวะ $121\,^\circ\text{C}$ ($15\text{ psi}$) กลไกประจุไฟฟ้าในการย้อมสีแกรม การแยกโมเลกุลด้วยสนามไฟฟ้าในเจลอะกาโรส (\textbf{Gel Electrophoresis}) การใช้เครื่องวัดดัชนีหักเห (\textbf{Refractometer}) ติดตามการหมักน้ำตาลของยีสต์ บทบาทของน้ำมันช่วยส่อง (\textbf{Immersion Oil}) ในกล้องจุลทรรศน์กำลังขยาย $1{,}000\times$ ประสิทธิภาพการฆ่าเชื้อของรังสีอัลตราไวโอเลต (\textbf{UV-C}) ไปจนถึงการวัดความหนาแน่นเซลล์ที่ความยาวคลื่น $600\text{ nm}$ ($\text{OD}_{600}$) ด้วยเครื่องสเปกโตรโฟโตมิเตอร์ (\textbf{Spectrophotometer})

เพื่อให้สอดคล้องกับพื้นฐานคณิตศาสตร์ของนักศึกษา คู่มือปฏิบัติการแต่ละบทจึงประกอบด้วยสรุปสูตรสำเร็จรูป ตัวอย่างการคำนวณข้อมูลล่วงหน้าทีละขั้นตอน ขั้นตอนการทดลองที่ชัดเจน และ\textbf{ใบบันทึกผลการทดลองประจำกลุ่ม}ที่นักศึกษาสามารถกรอกข้อมูลจริง วาดกราฟ และตอบคำถามท้ายการทดลองได้ทันที ผู้เขียนหวังเป็นอย่างยิ่งว่าคู่มือปฏิบัติการเล่มนี้จะช่วยสร้างทักษะปฏิบัติการที่แม่นยำ ปลอดภัย และมีจรรยาบรรณทางวิทยาศาสตร์ให้แก่นักศึกษาสาขาจุลชีววิทยาทุกคน

\vspace{1.0cm}
\begin{flushright}
    \textbf{ผู้ช่วยศาสตราจารย์ ดร.ชีวะ ทัศนา}\\[0.2cm]
    สาขาวิชาฟิสิกส์ คณะวิทยาศาสตร์และเทคโนโลยี\\
    มหาวิทยาลัยราชภัฏรำไพพรรณี\\
    ภาคเรียนที่ 2 ปีการศึกษา 2569
\end{flushright}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "preface.tex"), "w", encoding="utf-8") as f:
    f.write(preface_tex)

# 6. frontmatter/safety_rules.tex
safety_tex = r"""\chapter*{ระเบียบความปลอดภัย จรรยาบรรณห้องปฏิบัติการ และการเขียนรายงาน}
\addcontentsline{toc}{chapter}{ระเบียบความปลอดภัย จรรยาบรรณห้องปฏิบัติการ และการเขียนรายงาน}

การปฏิบัติการทดลองในรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา มีเป้าหมายสำคัญในการปลูกฝัง \textbf{ผลลัพธ์การเรียนรู้รายวิชาด้านจรรยาบรรณและความปลอดภัย (CLO3 เชื่อมโยงกับ PLO1)} และ \textbf{ทักษะการทำงานร่วมกับผู้อื่นและการสื่อสารทางวิทยาศาสตร์ (CLO4 เชื่อมโยงกับ PLO5 และ PLO6)} นักศึกษาทุกคนต้องปฏิบัติตามระเบียบต่อไปนี้อย่างเคร่งครัด

\section*{1. กฎความปลอดภัยในห้องปฏิบัติการฟิสิกส์และจุลชีววิทยา (Laboratory Safety)}
\begin{enumerate}
    \item \textbf{การแต่งกายและอุปกรณ์ป้องกันส่วนบุคคล}\quad นักศึกษาต้องสวมเสื้อกาวน์ปฏิบัติการ (Lab Coat) ติดกระดุมเรียบร้อย สวมรองเท้าหุ้มส้นมิดชิด รวบผมยาวให้เรียบร้อย และห้ามนำอาหารหรือเครื่องดื่มเข้ามารับประทานในห้องปฏิบัติการโดยเด็ดขาด
    \item \textbf{ความปลอดภัยด้านเครื่องปั่นเหวี่ยง (Centrifuge)}\quad ต้องตรวจสอบว่าหลอดตัวอย่างที่วางตรงข้ามกันมีปริมาตรและมวลเท่ากันเสมอ ปิดฝาครอบโรเตอร์ให้สนิท และห้ามเปิดฝาเครื่องจนกว่าโรเตอร์จะหยุดหมุนสนิท ($0\text{ rpm}$)
    \item \textbf{ความปลอดภัยด้านความร้อนและหม้อนึ่งความดันไอ (Autoclave)}\quad ห้ามบิดฝาขวดแก้วจนแน่นสนิทก่อนนำเข้าหม้อนึ่ง (ต้องคลายเกลียวฝาออกครึ่งรอบเสมอ) และห้ามเปิดฝาหม้อนึ่งขณะที่ความดันเกจยังมากกว่า $0\text{ psi}$ หรืออุณหภูมิสูงกว่า $80\,^\circ\text{C}$
    \item \textbf{ความปลอดภัยด้านไฟฟ้าและรังสี UV-C}\quad เช็ดมือให้แห้งสนิทก่อนสัมผัสแหล่งจ่ายไฟของชุด Gel Electrophoresis ปิดฝาครอบนิรภัยก่อนเปิดสวิตช์ไฟทุกครั้ง และห้ามจ้องมองหลอดรังสี UV-C ด้วยตาเปล่าโดยไม่มีแผ่นกรองป้องกัน
\end{enumerate}

\section*{2. จรรยาบรรณแห่งวิชาชีพวิทยาศาสตร์ในการบันทึกข้อมูล (Data Integrity — CLO3)}
\begin{itemize}
    \item \textbf{ห้ามดัดแปลงหรือเมคตัวเลขผลการทดลอง (Zero Tolerance for Data Fabrication)}\quad นักศึกษาต้องบันทึกค่าที่อ่านได้จริงจากเครื่องมือวัดลงในตารางบันทึกผลด้วยปากกา แม้ว่าค่าที่วัดได้จะมีความคลาดเคลื่อนไปจากค่าทางทฤษฎีก็ตาม
    \item \textbf{การวิเคราะห์สาเหตุความคลาดเคลื่อนมีคุณค่ามากกว่าตัวเลขที่ตรงทฤษฎีแบบปลอมๆ}\quad ผู้สอนให้คะแนนเต็มสำหรับกลุ่มที่รายงานค่าจริงและสามารถอธิบายสาเหตุทางฟิสิกส์ของความคลาดเคลื่อนได้ เช่น การสูญเสียความร้อนสู่สิ่งแวดล้อม หรือฟองอากาศติดที่ปลายทิปไมโครปิเปต
\end{itemize}

\section*{3. โครงสร้างมาตรฐานของการเขียนรายงานปฏิบัติการรายกลุ่ม (Lab Report — CLO4)}
รายงานปฏิบัติการแต่ละสัปดาห์มีคะแนนเต็ม 10 คะแนน (รวมตลอดภาคการศึกษาคิดเป็น 20\% ของคะแนนรวมรายวิชา) โดยประกอบด้วย 5 ส่วนสั้นกระชับ ได้แก่
\begin{enumerate}
    \item \textbf{ชื่อปฏิบัติการ วัตถุประสงค์ และรายชื่อสมาชิกกลุ่มพร้อมระบุหน้าที่รับผิดชอบ} (1 คะแนน)
    \item \textbf{ตารางบันทึกผลการทดลองจริงที่ระบุหน่วยวัด SI และเลขนัยสำคัญถูกต้อง} (3 คะแนน)
    \item \textbf{การแสดงวิธีคำนวณตัวอย่างและการเขียนกราฟที่มีชื่อแกนและหน่วยครบถ้วน} (3 คะแนน)
    \item \textbf{การสรุปและอภิปรายผลการทดลองเชื่อมโยงสู่งานจุลชีววิทยาและวิเคราะห์ความคลาดเคลื่อน} (2 คะแนน)
    \item \textbf{การตอบคำถามท้ายปฏิบัติการครบทุกข้อ} (1 คะแนน)
\end{enumerate}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "safety_rules.tex"), "w", encoding="utf-8") as f:
    f.write(safety_tex)

# 7. frontmatter/schedule.tex
schedule_tex = r"""\chapter*{ตารางแผนปฏิบัติการ 13 การทดลอง และการเชื่อมโยง CLOs สู่ PLOs}
\addcontentsline{toc}{chapter}{ตารางแผนปฏิบัติการ 13 การทดลอง และการเชื่อมโยง CLOs สู่ PLOs}

ปฏิบัติการในรายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา จัดการเรียนการสอนสัปดาห์ละ 3 ชั่วโมง ควบคู่กับชั่วโมงบรรยาย 2 ชั่วโมง โดยมีสัดส่วนคะแนนภาคปฏิบัติการรวม \textbf{50 คะแนน} (แบ่งเป็น รายงานปฏิบัติการกลุ่ม 20 คะแนน, ทักษะการใช้อุปกรณ์ ความปลอดภัย และความซื่อสัตย์ในการบันทึกข้อมูล 15 คะแนน และโครงงานย่อยสัปดาห์ที่ 14 อีก 15 คะแนน) ดังรายละเอียดใน\mbox{ตารางที่} 1

\begin{table}[H]
\centering
\caption{แผนการจัดปฏิบัติการ 13 การทดลอง (ตลอด 15 สัปดาห์) และการเชื่อมโยงกับผลลัพธ์การเรียนรู้รายวิชา (CLOs)}
\scriptsize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\textwidth}{c c >{\raggedright\arraybackslash}p{4.4cm} >{\raggedright\arraybackslash}X c}
\toprule
\textbf{สัปดาห์} & \textbf{รหัสแล็บ} & \textbf{ชื่อปฏิบัติการทดลอง (3 ชม./สัปดาห์)} & \textbf{เครื่องมือจุลชีววิทยาและทักษะหลักที่ฝึก} & \textbf{CLOs ที่วัด} \\
\midrule
1 & ปฏิบัติการที่ 1 & การวัดละเอียดและทักษะการสอบเทียบไมโครปิเปตและเครื่องชั่งดิจิทัล & เวอร์เนียร์ ไมโครมิเตอร์ เครื่องชั่ง 4 ตำแหน่ง และ Micropipette (P200, P1000) & CLO1, CLO3, CLO4 \\
\addlinespace[1.5pt]
2 & ปฏิบัติการที่ 2 & การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion & การเขียนกราฟความเร็ว และการแยกแยะ Brownian Motion จากการว่ายจริงของเซลล์ & CLO1, CLO3, CLO4 \\
\addlinespace[1.5pt]
3 & ปฏิบัติการที่ 3 & กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพตามกฎของสโตกส์ & การวัดอัตราเร็วสุดท้ายของการตกตะกอน ($v_t$) และความหนืดสารละลายกลีเซอรีน & CLO1, CLO2, CLO3 \\
\addlinespace[1.5pt]
4 & ปฏิบัติการที่ 4 & การอนุรักษ์พลังงานกลและการคำนวณค่า RCF ของเครื่องปั่นเหวี่ยง & เครื่อง Centrifuge การแปลงค่า RPM เป็น $\times g$ และการจัดสมดุลโรเตอร์ & CLO1, CLO2, CLO4 \\
\addlinespace[1.5pt]
5 & ปฏิบัติการที่ 5 & ความจุความร้อนจำเพาะและการตรวจสอบเสถียรภาพตู้อบเลี้ยงเชื้อ & แคลอริมิเตอร์ อ่างน้ำควบคุมอุณหภูมิ (Water Bath) และตู้อบ Incubator $37\,^\circ\text{C}$ & CLO1, CLO2, CLO3 \\
\addlinespace[1.5pt]
6 & ปฏิบัติการที่ 6 & ความดันไอ จุดเดือด และวิเคราะห์รอบการทำงานหม้อนึ่งความดันไอ & หม้อนึ่งความดันไอ Autoclave ($121\,^\circ\text{C}$, $15\text{ psi}$) และ Autoclave Tape & CLO1, CLO2, CLO4 \\
\addlinespace[1.5pt]
7 & \multicolumn{3}{>{\raggedright\arraybackslash}p{9.0cm}}{\textbf{สัปดาห์ทบทวนสรุปสูตรคำนวณฉบับเข้าใจง่ายและสอบวัดผลกลางภาค (เนื้อหาสัปดาห์ที่ 1--6)}} & CLO1, CLO2 \\
\addlinespace[1.5pt]
8 & ปฏิบัติการที่ 7 & ไฟฟ้าสถิตและกลไกแรงดึงดูดทางไฟฟ้าของสีย้อมเซลล์จุลินทรีย์ & อิเล็กโทรสโคป และการเปรียบเทียบการยึดเกาะของสีย้อมประจุบวกกับประจุลบ & CLO1, CLO3, CLO4 \\
\addlinespace[1.5pt]
9 & ปฏิบัติการที่ 8 & กฎของโอห์มและแบบจำลองการแยกโมเลกุลด้วย Gel Electrophoresis & มัลติมิเตอร์ดิจิทัล แหล่งจ่ายไฟกระแสตรง และชุดรันเจลอะกาโรส (Run to Red) & CLO1, CLO2, CLO3 \\
\addlinespace[1.5pt]
10 & ปฏิบัติการที่ 9 & การสะท้อน การหักเหของแสง และการวัดค่าบริกซ์ของกระบวนการหมัก & ชุดเลเซอร์วัดมุมหักเหของสเนลล์ และเครื่อง Hand Refractometer วัดน้ำตาลหมักยีสต์ & CLO1, CLO3, CLO4 \\
\addlinespace[1.5pt]
11 & ปฏิบัติการที่ 10 & เลนส์นูน กล้องจุลทรรศน์ และบทบาทของน้ำมันช่วยส่องที่หัวเลนส์ 100x & กล้องจุลทรรศน์แบบใช้แสง การคำนวณค่า $d_{\min}$ และการใช้ Immersion Oil ($n=1.515$) & CLO1, CLO2, CLO3 \\
\addlinespace[1.5pt]
12 & ปฏิบัติการที่ 11 & การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV-C ฆ่าเชื้อ & แบบจำลองการลดลงครึ่งชีวิต ($T_{1/2}$) และกฎกำลังสองผกผันของความเข้มรังสี UV & CLO1, CLO2, CLO4 \\
\addlinespace[1.5pt]
13 & ปฏิบัติการที่ 12 & การวัดค่าการดูดกลืนแสง $\text{OD}_{600}$ ประเมินการเจริญเติบโตของจุลินทรีย์ & เครื่อง Spectrophotometer หลอด Cuvette และการสร้างกราฟมาตรฐานความขุ่นเซลล์ & CLO1, CLO2, CLO4 \\
\addlinespace[1.5pt]
14 & ปฏิบัติการที่ 13 & โครงงานย่อย (Mini-Project) ฟิสิกส์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา & การสังเคราะห์องค์ความรู้และนำเสนอโปสเตอร์/สาธิตการใช้เครื่องมืออย่างปลอดภัย & CLO2, CLO3, CLO4 \\
\addlinespace[1.5pt]
15 & \multicolumn{3}{>{\raggedright\arraybackslash}p{9.0cm}}{\textbf{สัปดาห์สรุปองค์ความรู้รวบยอดและสอบวัดผลปลายภาค (เนื้อหาสัปดาห์ที่ 8--14)}} & CLO1, CLO2 \\
\bottomrule
\end{tabularx}
\end{table}
"""

with open(os.path.join(BASE_DIR, "frontmatter", "schedule.tex"), "w", encoding="utf-8") as f:
    f.write(schedule_tex)

# 8. backmatter/appendix_rubrics.tex
app_tex = r"""\chapter*{ภาคผนวก ก\quad คู่มือการคำนวณความคลาดเคลื่อน การเขียนกราฟ และเกณฑ์รูบริกส์}
\addcontentsline{toc}{chapter}{ภาคผนวก ก\quad คู่มือการคำนวณความคลาดเคลื่อน การเขียนกราฟ และเกณฑ์รูบริกส์}
\markboth{ภาคผนวก ก\quad คู่มือการคำนวณความคลาดเคลื่อนและการเขียนกราฟ}{ภาคผนวก ก\quad คู่มือการคำนวณความคลาดเคลื่อนและการเขียนกราฟ}

\section*{1. สูตรการหาค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อนสำหรับรายงานปฏิบัติการ}

ในการทดลองทางฟิสิกส์และจุลชีววิทยา เราจะทำการวัดซ้ำอย่างน้อย $3$ ครั้ง ($x_1, x_2, x_3$) เพื่อลดความคลาดเคลื่อนแบบสุ่ม โดยมีขั้นตอนการคำนวณ 2 ขั้นตอนง่ายๆ ดังนี้
\begin{enumerate}
    \item \textbf{การหาค่าเฉลี่ยเลขคณิต} ($\bar{x}$)
    \begin{equation*}
        \bar{x} = \frac{x_1 + x_2 + x_3}{3}
    \end{equation*}
    \item \textbf{การหาเปอร์เซ็นต์ความคลาดเคลื่อนสัมพัทธ์} (เทียบกับค่ามาตรฐาน $x_{\text{std}}$)
    \begin{equation*}
        \text{เปอร์เซ็นต์ความคลาดเคลื่อน} = \frac{|\bar{x} - x_{\text{std}}|}{x_{\text{std}}} \times 100\%
    \end{equation*}
\end{enumerate}

\section*{2. หลักการเขียนกราฟทางวิทยาศาสตร์และการหาความชัน (Slope)}

เมื่อต้องเขียนกราฟความสัมพันธ์ระหว่างตัวแปร 2 ตัว (เช่น กราฟระหว่างระยะทาง $s$ กับเวลา $t$ ในปฏิบัติการที่ 2 หรือกราฟมาตรฐานระหว่างค่า $\text{OD}_{600}$ กับความเข้มข้นเซลล์ $c$ ในปฏิบัติการที่ 12) ให้ปฏิบัติตามหลักการ 4 ข้อต่อไปนี้
\begin{enumerate}
    \item \textbf{การเลือกแกน}\quad ให้วาง\textbf{ตัวแปรต้น} (ตัวแปรที่เราเป็นผู้กำหนดค่า เช่น เวลา $t$ หรือความเข้มข้น $c$) ไว้บน\textbf{แกนนอน (แกน X)} และวาง\textbf{ตัวแปรตาม} (ค่าที่อ่านได้จากเครื่องมือวัด เช่น ระยะทาง $s$ หรือค่า $\text{OD}_{600}$) ไว้บน\textbf{แกนตั้ง (แกน Y)}
    \item \textbf{การระบุชื่อแกนและหน่วย}\quad ต้องเขียนชื่อปริมาณและระบุหน่วยในวงเล็บกำกับที่ปลายแกนทั้งสองเสมอ เช่น $\text{เวลา } t\text{ (s)}$ และ $\text{ระยะทาง } s\text{ (cm)}$
    \item \textbf{การลากเส้นแนวโน้ม (Best-Fit Line)}\quad ห้ามลากเส้นต่อจุดแบบฟันปลาไปมา แต่ให้ใช้ไม้บรรทัดทาบแล้วลาก\textbf{เส้นตรงเพียงเส้นเดียว}ให้ผ่านใกล้จุดข้อมูลทั้งหมดอย่างสมดุลที่สุด
    \item \textbf{การคำนวณความชันของกราฟเส้นตรง (Slope)}\quad เลือกจุด 2 จุดบนเส้นแนวโน้ม คือ $(x_1, y_1)$ และ $(x_2, y_2)$ แล้วคำนวณจากอัตราส่วน
    \begin{equation*}
        \text{ความชัน (Slope)} = \frac{\Delta y}{\Delta x} = \frac{y_2 - y_1}{x_2 - x_1}
    \end{equation*}
\end{enumerate}

\section*{3. เกณฑ์รูบริกส์การประเมินทักษะปฏิบัติการและรายงาน (CLO2, CLO3, CLO4)}

\begin{table}[H]
\centering
\caption{เกณฑ์การให้คะแนนปฏิบัติการรายสัปดาห์ตามผลลัพธ์การเรียนรู้ (CLO2, CLO3 และ CLO4)}
\footnotesize\setlength{\tabcolsep}{4pt}
\begin{tabularx}{\textwidth}{>{\raggedright\arraybackslash\bfseries}p{2.6cm} >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}
\toprule
ด้านที่ประเมิน & ระดับดีเยี่ยม (เต็มเกณฑ์) & ระดับดี (ผ่านเกณฑ์มาตรฐาน) & ระดับต้องปรับปรุง \\
\midrule
ทักษะการใช้เครื่องมือและการแก้ปัญหา (CLO2) & ตั้งค่าและใช้งานเครื่องมือ (เช่น Micropipette, Centrifuge, กล้องจุลทรรศน์ 100x, Spectrophotometer) ได้ถูกต้องตามหลักฟิสิกส์ทุกขั้นตอน & ใช้งานเครื่องมือได้ถูกต้อง แต่ยังต้องได้รับคำแนะนำในการปรับตั้งค่าหรือการแปลงหน่วยบางจุด & ใช้งานเครื่องมือผิดขั้นตอน เช่น ไม่ถ่วงสมดุลโรเตอร์ หรือไม่ทำ Blank ก่อนวัดค่า $\text{OD}_{600}$ \\
\addlinespace[4pt]
ความปลอดภัยและจรรยาบรรณข้อมูล (CLO3) & สวมอุปกรณ์ป้องกันครบถ้วน ปฏิบัติตามกฎความปลอดภัย 100\% บันทึกตัวเลขจากการวัดจริงด้วยความซื่อสัตย์และดูแลทำความสะอาดเครื่องมือหลังใช้ & ปฏิบัติตามกฎความปลอดภัยและบันทึกข้อมูลตามจริง แต่ทำความสะอาดหรือเก็บอุปกรณ์ยังไม่ครบทุกชิ้น & ประมาทในการใช้อุปกรณ์ความร้อน/ไฟฟ้า หรือมีการดัดแปลงตัวเลขผลการทดลองให้ตรงทฤษฎี \\
\addlinespace[4pt]
การทำงานเป็นทีมและรายงานปฏิบัติการ (CLO4) & สมาชิกทุกคนมีส่วนร่วมในการทดลอง ตารางบันทึกผลระบุหน่วยครบ กราฟถูกต้อง และอภิปรายผลเชื่อมโยงสู่งานจุลชีววิทยาได้ชัดเจน & สมาชิกช่วยกันทำงานดี รายงานครบทุกหัวข้อ แต่การอภิปรายผลความคลาดเคลื่อนยังสั้นเกินไป & สมาชิกบางคนไม่ร่วมทำการทดลอง หรือส่งรายงานล่าช้า/ขาดกราฟและการสรุปผล \\
\bottomrule
\end{tabularx}
\end{table}
"""

with open(os.path.join(BASE_DIR, "backmatter", "appendix_rubrics.tex"), "w", encoding="utf-8") as f:
    f.write(app_tex)

# 9. backmatter/references.tex & biography.tex (copy from เอกสารคำสอน_LaTeX)
src_back = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX/backmatter"
for fname in ["references.tex", "biography.tex"]:
    with open(os.path.join(src_back, fname), "r", encoding="utf-8") as f:
        content = f.read()
    with open(os.path.join(BASE_DIR, "backmatter", fname), "w", encoding="utf-8") as f:
        f.write(content)

print("[OK] Generated Lab Manual style, main.tex, frontmatter, and backmatter.")
