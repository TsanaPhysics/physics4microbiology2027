#!/usr/bin/env python3
"""
Lab Manual Generator Part 2: Labs 1 to 6 (Weeks 1-6)
Course: 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) Physics for Microbiology Laboratory Manual
"""
import os

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/คู่มือปฏิบัติการ_LaTeX"
LAB_DIR = os.path.join(BASE_DIR, "labs")
os.makedirs(LAB_DIR, exist_ok=True)

# ====================================================================
# LAB 1: การวัดละเอียดและการสอบเทียบไมโครปิเปตด้วยวิธีชั่งมวล (Week 1)
# ====================================================================
lab01 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 1\quad การวัดละเอียดและการสอบเทียบไมโครปิเปต (สัปดาห์ที่ 1)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item อ่านค่าและบันทึกผลการวัดมิติของจานเพาะเชื้อและหลอดทดลองด้วยเวอร์เนียร์คาลิปเปอร์และไมโครมิเตอร์พร้อมแปลงหน่วยเป็นไมโครเมตร ($\mu\text{m}$) ได้ถูกต้อง \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item ปฏิบัติการดูดปล่อยของเหลวด้วยไมโครปิเปต (Micropipette) โดยใช้จังหวะการกดปุ่มที่ถูกต้อง และตรวจสอบความแม่นยำด้วยวิธีชั่งมวลน้ำกลั่นบนเครื่องชั่งดิจิทัลได้ \textbf{(CLO2, CLO3 เชื่อมโยง PLO1, PLO3)}
    \item บันทึกข้อมูลการทดลองตามความเป็นจริง คำนวณค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อน และทำงานร่วมกับสมาชิกในกลุ่มได้อย่างมีประสิทธิภาพ \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1 (นาทีที่ 1--60)}\quad ชี้แจงกฎความปลอดภัย สาธิตการอ่านสเกลเวอร์เนียร์ ไมโครมิเตอร์ และการใช้ปุ่มกด 2 จังหวะของไมโครปิเปต
    \item \textbf{ชั่วโมงที่ 2 (นาทีที่ 61--120)}\quad นักศึกษาปฏิบัติการตอนที่ 1 (วัดมิติเครื่องแก้วจุลชีววิทยา) และตอนที่ 2 (สอบเทียบความแม่นยำไมโครปิเปต P200 และ P1000)
    \item \textbf{ชั่วโมงที่ 3 (นาทีที่ 121--180)}\quad คำนวณค่าเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อน อภิปรายผลร่วมกัน และตรวจเช็กความสะอาดของอุปกรณ์ก่อนส่งใบบันทึกผล
\end{itemize}
\end{planbox}
\clearpage

\chapter{การวัดละเอียดและการสอบเทียบไมโครปิเปต}
\index{เวอร์เนียร์คาลิปเปอร์}\index{ไมโครมิเตอร์}\index{การสอบเทียบไมโครปิเปต}\index{เครื่องชั่งดิจิทัล}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

ในงานปฏิบัติการจุลชีววิทยา ความแม่นยำของการวัดปริมาตรสารละลายระดับไมโครลิตร ($\mu\text{L}$) มีผลโดยตรงต่อความถูกต้องของการเจือจางเชื้อแบบลำดับส่วน (\textbf{Serial Dilution}) และการเตรียมปฏิกิริยาระดับโมเลกุล เครื่องมือหลักที่ใช้คือ \textbf{ไมโครปิเปต} (\textbf{Micropipette}) ซึ่งอาศัยหลักการแทนที่อากาศ (\textbf{Air Displacement}) ของลูกสูบภายในกระบอกสูบ

วิธีมาตรฐานสากลในการตรวจสอบว่าไมโครปิเปตยังจ่ายปริมาตรได้แม่นยำหรือไม่ คือ \textbf{วิธีชั่งมวลน้ำกลั่น} (\textbf{Gravimetric Calibration}) โดยอาศัยหลักความหนาแน่นของน้ำบริสุทธิ์ที่อุณหภูมิห้อง ($\rho = m / V \approx 1.000\text{ g/mL}$ หรือ $0.001\text{ g/}\mu\text{L}$) กล่าวคือ \textbf{น้ำกลั่นปริมาตร $1\text{ }\mu\text{L}$ จะมีมวลเท่ากับ $0.0010\text{ g}$ ($1\text{ mg}$) พอดี} ดังนั้น น้ำกลั่นปริมาตร $1{,}000\text{ }\mu\text{L}$ จึงมีมวลมาตรฐานเท่ากับ $1.0000\text{ g}$ และน้ำกลั่นปริมาตร $200\text{ }\mu\text{L}$ จึงมีมวลมาตรฐานเท่ากับ $0.2000\text{ g}$

\begin{conceptbox}[สูตรการแปลงหน่วยและการหาเปอร์เซ็นต์ความคลาดเคลื่อน]
\begin{enumerate}
    \item \textbf{การแปลงหน่วยความยาวและปริมาตร}\quad $1\text{ mm} = 1{,}000\text{ }\mu\text{m}$ และ $1\text{ mL} = 1{,}000\text{ }\mu\text{L}$
    \item \textbf{การอ่านค่าเวอร์เนียร์คาลิปเปอร์}\quad ค่าที่อ่านได้ $=$ สเกลหลัก ($\text{mm}$) $+$ (ขีดสเกลเลื่อนที่ตรงกัน $\times$ ความละเอียดเครื่องมือ)
    \item \textbf{เปอร์เซ็นต์ความคลาดเคลื่อนของไมโครปิเปต}
    \begin{equation}
        \text{ความคลาดเคลื่อน (\%)} = \frac{|\bar{m}_{\text{ชั่งได้จริง}} - m_{\text{มาตรฐาน}}|}{m_{\text{มาตรฐาน}}} \times 100\%
    \end{equation}
\end{enumerate}
\end{conceptbox}

\begin{worked}[การคำนวณความคลาดเคลื่อนของการดูดน้ำกลั่นด้วยไมโครปิเปต P200]
\textbf{โจทย์ตัวอย่าง}\quad นักศึกษาตั้งค่าไมโครปิเปต P200 ที่ปริมาตร $200\text{ }\mu\text{L}$ (มวลน้ำมาตรฐานเท่ากับ $0.2000\text{ g}$) เมื่อดูดน้ำกลั่นหยดลงบนเครื่องชั่งดิจิทัล 3 ครั้ง ได้ค่ามวลเท่ากับ $0.1960\text{ g}$, $0.1980\text{ g}$ และ $0.1970\text{ g}$ จงคำนวณมวลเฉลี่ยและเปอร์เซ็นต์ความคลาดเคลื่อน

\textbf{วิธีคำนวณทีละขั้นตอน}
\begin{enumerate}
    \item \textbf{หาค่ามวลเฉลี่ย}\quad $\bar{m} = \dfrac{0.1960 + 0.1980 + 0.1970}{3} = 0.1970\text{ g}$ (คิดเป็นปริมาตรจริง $197.0\text{ }\mu\text{L}$)
    \item \textbf{หาเปอร์เซ็นต์ความคลาดเคลื่อน}\quad $\dfrac{|0.1970 - 0.2000|}{0.2000} \times 100\% = \dfrac{0.0030}{0.2000} \times 100\% = 1.50\%$
\end{enumerate}
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและข้อควรระวังความปลอดภัย}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Micropipette 2-Stop Mechanism
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.4);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.4,3.95) {(ก) จังหวะการกดปุ่มไมโครปิเปต};
        % Plunger positions
        \fill[physCyan!30, draw=physRoyalBlue, line width=1.1pt] (1.0,1.2) rectangle (2.2,2.8);
        \fill[physAmber, draw=charcoal, line width=1.0pt] (1.3,2.8) rectangle (1.9,3.4);
        \node[below, font=\scriptsize\bfseries] at (1.6,1.15) {ปล่อยปกติ};

        \fill[physCyan!30, draw=physRoyalBlue, line width=1.1pt] (2.8,1.2) rectangle (4.0,2.8);
        \fill[bioEmerald, draw=charcoal, line width=1.0pt] (3.1,2.8) rectangle (3.7,3.1);
        \node[below, font=\scriptsize\bfseries, color=bioEmerald!90!black, align=center] at (3.4,1.15) {จังหวะที่ 1\\(ดูดสาร)};

        \fill[physCyan!30, draw=physRoyalBlue, line width=1.1pt] (4.6,1.2) rectangle (5.8,2.8);
        \fill[crimsonAlert, draw=charcoal, line width=1.0pt] (4.9,2.8) rectangle (5.5,2.92);
        \node[below, font=\scriptsize\bfseries, color=crimsonAlert, align=center] at (5.2,1.15) {จังหวะที่ 2\\(ไล่หยดสุดท้าย)};
    \end{scope}

    % Right: Digital Balance Gravimetric Setup
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.4);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.4,3.95) {(ข) การชั่งมวลน้ำกลั่นสอบเทียบปิเปต};
        % Balance Base
        \fill[charcoal!85, rounded corners=2pt] (1.2,0.6) rectangle (5.6,1.4);
        \node[fill=bioEmerald!30!white, text=charcoal, font=\small\bfseries, rounded corners=1pt, inner sep=2pt] at (3.4,1.0) {$0.5000\text{ g}$};
        \draw[physSlate, line width=1.4pt] (2.2,1.4) -- (4.6,1.4);
        % Weighing beaker with water
        \fill[physCyan!25] (2.6,1.45) rectangle (4.2,2.3);
        \draw[physRoyalBlue, line width=1.2pt] (2.6,2.7) -- (2.6,1.45) -- (4.2,1.45) -- (4.2,2.7);
        % Pipette tip dropping water
        \fill[physAmber!70, draw=physAmber!90!black, line width=1.0pt] (3.25,3.5) -- (3.55,3.5) -- (3.43,2.75) -- (3.37,2.75) -- cycle;
        \fill[physCyan] (3.4,2.55) circle (2.2pt);
    \end{scope}
\end{tikzpicture}%
}
\caption{กลไกปุ่มกด 2 จังหวะของไมโครปิเปตและการจัดชุดสอบเทียบปริมาตรด้วยเครื่องชั่งดิจิทัล}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม (กลุ่มละ 3--4 คน)]
\begin{itemize}
    \item เวอร์เนียร์คาลิปเปอร์ (ความละเอียด $0.05\text{ mm}$) จำนวน 1 อัน และไมโครมิเตอร์ (ความละเอียด $0.01\text{ mm}$) จำนวน 1 อัน
    \item จานเพาะเชื้อแก้วปลอดเชื้อ 1 คู่, หลอดทดลอง 1 หลอด และแผ่นสไลด์พร้อมแผ่นกระจกปิดสไลด์ (Coverslip)
    \item ไมโครปิเปตขนาด P200 ($20\text{--}200\text{ }\mu\text{L}$) และ P1000 ($100\text{--}1{,}000\text{ }\mu\text{L}$) พร้อมกล่องทิปพลาสติก
    \item เครื่องชั่งดิจิทัลทศนิยม 4 ตำแหน่ง บีกเกอร์พลาสติกขนาดเล็ก และขวดน้ำกลั่นที่วัดอุณหภูมิห้องแล้ว
\end{itemize}
\end{equipbox}

\begin{warningbox}[ข้อห้ามเด็ดขาดในการใช้งานไมโครปิเปต]
\begin{enumerate}
    \item \textbf{ห้ามหมุนปรับตัวเลขปริมาตรเกินช่วงที่ระบุไว้บนตัวปิเปต} (เช่น ห้ามหมุน P200 เกิน $200\text{ }\mu\text{L}$ หรือต่ำกว่า $20\text{ }\mu\text{L}$) เพราะเฟืองสปริงภายในจะพังเสียหายทันที
    \item \textbf{ห้ามวางไมโครปิเปตที่มีของเหลวค้างในปลายทิปนอนราบลงบนโต๊ะ} เพราะของเหลวจะไหลย้อนเข้าไปกัดกร่อนลูกสูบโลหะด้านใน
\end{enumerate}
\end{warningbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}

\subsection{ตอนที่ 1 การวัดมิติของภาชนะเพาะเลี้ยงเชื้อจุลินทรีย์}
\begin{enumerate}
    \item ตรวจสอบค่าศูนย์ของเวอร์เนียร์คาลิปเปอร์และไมโครมิเตอร์ก่อนเริ่มวัด
    \item ใช้เขี้ยววัดด้านในของเวอร์เนียร์คาลิปเปอร์วัด\textbf{เส้นผ่านศูนย์กลางภายใน}ของจานเพาะเชื้อแก้ว และใช้ก้านวัดความลึกวัด\textbf{ความลึกภายใน}ของจานเพาะเชื้อ ทำซ้ำ 3 ตำแหน่ง บันทึกค่าในหน่วยมิลลิเมตร ($\text{mm}$) แล้วแปลงเป็นไมโครเมตร ($\mu\text{m}$)
    \item ใช้ไมโครมิเตอร์วัด\textbf{ความหนาของแผ่นสไลด์แก้ว} และ\textbf{ความหนาของแผ่นกระจกปิดสไลด์} (Coverslip) อย่างละ 3 ครั้ง โดยหมุนที่ปุ่มปรับแรงดันท้ายแกนจนได้ยินเสียงคลิกเบาๆ 3 ครั้ง แล้วอ่านค่า
\end{enumerate}

\subsection{ตอนที่ 2 การสอบเทียบความแม่นและความเที่ยงของไมโครปิเปต}
\begin{enumerate}
    \item วางบีกเกอร์พลาสติกใบเล็กบนจานเครื่องชั่งดิจิทัล ปิดกระจกกันลม แล้วกดปุ่มเซตศูนย์ (\textbf{Tare} ให้หน้าจอแสดง $0.0000\text{ g}$)
    \item ปรับตั้งค่าไมโครปิเปต P200 ไปที่ $100\text{ }\mu\text{L}$ สวมทิปให้แน่น กดปุ่มลงถึง\textbf{จังหวะที่ 1} จุ่มปลายทิปลงใต้ผิวน้ำกลั่นประมาณ $2\text{--}3\text{ mm}$ แล้วค่อยๆ ผ่อนนิ้วขึ้นช้าๆ เพื่อดูดน้ำกลั่นขึ้นมา
    \item นำปลายทิปแตะข้างผนังบีกเกอร์บนเครื่องชั่ง กดปุ่มลงถึงจังหวะที่ 1 แล้วกดต่อไปถึง\textbf{จังหวะที่ 2} เพื่อไล่หยดน้ำออกให้หมด ปิดกระจกเครื่องชั่ง อ่านค่ามวลเป็นกรัม ($\text{g}$) บันทึกผล กดปุ่ม Tare แล้วทำซ้ำให้ครบ 3 ครั้ง
    \item เปลี่ยนเป็นไมโครปิเปต P1000 ตั้งค่าที่ $500\text{ }\mu\text{L}$ และ $1{,}000\text{ }\mu\text{L}$ ทำการทดลองซ้ำเช่นเดียวกัน
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 1\quad การวัดละเอียดและการสอบเทียบไมโครปิเปต]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill \textbf{อุณหภูมิน้ำกลั่น} \dotfill $^\circ\text{C}$\\[4pt]
\noindent\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 1 การวัดมิติภาชนะและแผ่นสไลด์ด้วยเวอร์เนียร์และไมโครมิเตอร์}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{รายการที่วัด} & \textbf{ครั้งที่ 1} & \textbf{ครั้งที่ 2} & \textbf{ครั้งที่ 3} & \textbf{ค่าเฉลี่ย ($\text{mm}$)} & \textbf{แปลงเป็นหน่วย $\mu\text{m}$} \\
\midrule
เส้นผ่านศูนย์กลางในจานเพาะเชื้อ ($\text{mm}$) & ............ & ............ & ............ & ............ & \dotfill \\
ความลึกภายในจานเพาะเชื้อ ($\text{mm}$) & ............ & ............ & ............ & ............ & \dotfill \\
ความหนาแผ่นสไลด์แก้ว ($\text{mm}$) & ............ & ............ & ............ & ............ & \dotfill \\
ความหนากระจกปิดสไลด์ ($\text{mm}$) & ............ & ............ & ............ & ............ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 2 การสอบเทียบความแม่นยำของไมโครปิเปตด้วยวิธีชั่งมวลน้ำกลั่น}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ขนาดปิเปตและปริมาตรที่ตั้ง} & \textbf{ครั้งที่ 1 ($\text{g}$)} & \textbf{ครั้งที่ 2 ($\text{g}$)} & \textbf{ครั้งที่ 3 ($\text{g}$)} & \textbf{เฉลี่ย ($\text{g}$)} & \textbf{คลาดเคลื่อน (\%)} \\
\midrule
P200 ตั้งที่ $100\text{ }\mu\text{L}$ ($0.1000\text{ g}$) & ........ & ........ & ........ & ........ & \dotfill \\
P1000 ตั้งที่ $500\text{ }\mu\text{L}$ ($0.5000\text{ g}$) & ........ & ........ & ........ & ........ & \dotfill \\
P1000 ตั้งที่ $1{,}000\text{ }\mu\text{L}$ ($1.0000\text{ g}$) & ........ & ........ & ........ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{แสดงวิธีคำนวณตัวอย่าง (เลือกจากตารางตอนที่ 2 จำนวน 1 รายการ)}\\[4pt]
\dotfill\\[6pt]
\dotfill

\noindent\textbf{สรุปและอภิปรายผลการทดลอง (วิเคราะห์สาเหตุความคลาดเคลื่อนที่พบจริง)}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 1}
\begin{enumerate}
    \item หากนักศึกษากดปุ่มไมโครปิเปตลงไปจนสุดถึงจังหวะที่ 2 ก่อนจุ่มปลายทิปดูดสารละลายเชื้อแบคทีเรีย มวลของเหลวที่ชั่งได้ในตอนที่ 2 จะมากกว่าหรือน้อยกว่าค่ามาตรฐาน เพราะเหตุใด
    \item แผ่นกระจกปิดสไลด์ (Coverslip) ที่วัดความหนาได้ในตอนที่ 1 มีความหนากี่ไมโครเมตร ($\mu\text{m}$) และมีความสำคัญอย่างไรต่อการป้องกันหน้าเลนส์ใกล้วัตถุของกล้องจุลทรรศน์
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab01_micropipette_measurement.tex"), "w", encoding="utf-8") as f:
    f.write(lab01)

# ====================================================================
# LAB 2: การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion (Week 2)
# ====================================================================
lab02 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 2\quad การเคลื่อนที่ การแพร่ และ Brownian Motion (สัปดาห์ที่ 2)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item วัดระยะทางและเวลาของการเคลื่อนที่แนวตรง คำนวณอัตราเร็วเฉลี่ย และเขียนกราฟหาระยะทางกับเวลาได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item เปรียบเทียบอัตราเร็วของการแพร่ของโมเลกุลสีย้อมในตัวกลางที่มีอุณหภูมิต่างกัน และเชื่อมโยงกับการเคลื่อนที่แบบบราวน์ (Brownian Motion) ของจุลินทรีย์ได้ \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการทดลองและเขียนกราฟสรุปผลร่วมกับกลุ่มได้อย่างถูกต้องตามหลักวิชาการ \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1}\quad ทบทวนความแตกต่างระหว่างระยะทาง การกระจัด การเคลื่อนที่จริง (Chemotaxis) และการสั่นแบบบราวน์
    \item \textbf{ชั่วโมงที่ 2}\quad ทำการทดลองตอนที่ 1 (วัดอัตราเร็วฟองอากาศในหลอดของเหลว) และตอนที่ 2 (ผลของอุณหภูมิต่ออัตราเร็วการแพร่ของสีย้อม)
    \item \textbf{ชั่วโมงที่ 3}\quad พล็อตกราฟเส้นตรง หาความชันของกราฟ และอภิปรายผลการทดลอง
\end{itemize}
\end{planbox}
\clearpage

\chapter{การเคลื่อนที่ ความเร็ว และการสังเกตการแพร่และ Brownian Motion}
\index{อัตราเร็วและความเร็ว}\index{การแพร่ของสีย้อม}\index{การเคลื่อนที่แบบบราวน์}\index{ความชันกราฟ}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

เมื่อวัตถุหรือฟองอากาศเคลื่อนที่ในแนวตรงด้วยอัตราเร็วสม่ำเสมอ อัตราส่วนระหว่างระยะทางที่เคลื่อนที่ได้ ($s$) ต่อเวลาที่ใช้ ($t$) จะมีค่าคงที่ ซึ่งเรียกว่า \textbf{อัตราเร็วเฉลี่ย} ($v = s/t$) หากเรานำข้อมูลไปเขียนกราฟโดยให้แกนตั้งเป็นระยะทาง $s$ และแกนนอนเป็นเวลา $t$ เราจะได้กราฟเส้นตรงที่มี\textbf{ความชัน} (\textbf{Slope}) เท่ากับอัตราเร็ว $v$ พอดี

ในระดับจุลทรรศน์ โมเลกุลของน้ำและสารละลายมีการเคลื่อนที่ชนกันอย่างสุ่มตลอดเวลาด้วยพลังงานความร้อน ทำให้เกิดปรากฏการณ์ 2 ประการที่สำคัญในห้องแล็บจุลชีววิทยา คือ (1) \textbf{การเคลื่อนที่แบบบราวน์} (\textbf{Brownian Motion}) ซึ่งทำให้เซลล์แบคทีเรียที่ไม่มีแฟลกเจลลาสั่นดุ๊กดิ๊กอยู่กับที่โดยมีการกระจัดลัพธ์เป็นศูนย์ ($\vect{d} \approx 0$) และ (2) \textbf{การแพร่} (\textbf{Diffusion}) ของโมเลกุลสีย้อมหรือยาปฏิชีวนะจากบริเวณความเข้มข้นสูงไปสู่ความเข้มข้นต่ำ โดยเมื่ออุณหภูมิของของเหลวสูงขึ้น โมเลกุลจะมีพลังงานจลน์สูงขึ้นและแพร่กระจายออกไปได้เร็วขึ้น

\begin{conceptbox}[สูตรอัตราเร็ว ความชันกราฟ และระยะการแพร่]
\begin{enumerate}
    \item \textbf{อัตราเร็วเฉลี่ยและความชันกราฟ}\quad $v = \dfrac{s}{t} = \text{ความชันของกราฟ } s\text{--}t = \dfrac{s_2 - s_1}{t_2 - t_1}$
    \item \textbf{อัตราเร็วการแพร่เฉลี่ยของวงสีย้อม}\quad $v_{\text{diff}} = \dfrac{\text{รัศมีวงสีที่แผ่ออก } R}{\text{เวลา } t}\quad (\text{หน่วย mm/min})$
\end{enumerate}
\end{conceptbox}

\begin{worked}[การหาอัตราเร็วจากความชันของกราฟระยะทางกับเวลา]
\textbf{โจทย์ตัวอย่าง}\quad จากการจับเวลาฟองอากาศเคลื่อนที่ขึ้นในหลอดแก้ว พบว่าที่ระยะทาง $s_1 = 10.0\text{ cm}$ ใช้เวลา $t_1 = 4.0\text{ s}$ และที่ระยะทาง $s_2 = 30.0\text{ cm}$ ใช้เวลา $t_2 = 12.0\text{ s}$ จงหาอัตราเร็วของฟองอากาศจากความชันของกราฟ

\textbf{วิธีคำนวณทีละขั้นตอน}
\[
    v = \text{Slope} = \frac{s_2 - s_1}{t_2 - t_1} = \frac{30.0\text{ cm} - 10.0\text{ cm}}{12.0\text{ s} - 4.0\text{ s}} = \frac{20.0\text{ cm}}{8.0\text{ s}} = 2.50\text{ cm/s}
\]
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและรายการวัสดุ}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Bubble Velocity Tube
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.4,3.75) {(ก) หลอดวัดอัตราเร็วการเคลื่อนที่แนวตรง};
        \fill[physCyan!20, draw=physRoyalBlue, line width=1.2pt] (1.0,1.6) rectangle (5.8,2.3);
        \foreach \x/\lbl in {1.6/0 cm, 2.6/10 cm, 3.6/20 cm, 4.6/30 cm, 5.4/40 cm} {
            \draw[crimsonAlert, line width=1.0pt] (\x,1.5) -- (\x,2.4);
            \node[below, font=\scriptsize\bfseries] at (\x,1.45) {\lbl};
        }
        \fill[white, draw=physCyan, line width=1.1pt] (2.2,1.95) circle (0.22cm);
        \draw[->, physAmber, line width=1.5pt] (2.5,1.95) -- (4.2,1.95);
        \node[above, font=\scriptsize\bfseries, color=physAmber!90!black] at (3.35,2.35) {ฟองอากาศเคลื่อนที่ด้วยอัตราเร็วคงที่ $v$};
    \end{scope}

    % Right: Radial Dye Diffusion in Petri Dish
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.4,3.75) {(ข) การวัดรัศมีการแพร่ของสีย้อมในจานเพาะเชื้อ};
        \fill[white, draw=physSlate, line width=1.3pt] (3.4,1.85) circle (1.35cm);
        \fill[physCyan!30, draw=physCyan, dashed, line width=1.0pt] (3.4,1.85) circle (0.85cm);
        \fill[physRoyalBlue] (3.4,1.85) circle (0.22cm);
        \draw[<->, crimsonAlert, line width=1.2pt] (3.4,1.85) -- node[above, font=\scriptsize\bfseries] {$R$} (4.25,1.85);
        \node[font=\scriptsize, align=center] at (3.4,0.28) {วางจานเพาะเชื้อทับบนกระดาษกราฟมิลลิเมตร};
    \end{scope}
\end{tikzpicture}%
}
\caption{ชุดการทดลองวัดอัตราเร็วการเคลื่อนที่แนวตรงและการวัดรัศมีการแพร่ของโมเลกุลสีย้อมในจานเพาะเชื้อ}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม]
\begin{itemize}
    \item หลอดแก้วใสยาวบรรจุของเหลวพร้อมฟองอากาศ (มีขีดบอกระยะทุกๆ $10.0\text{ cm}$) และนาฬิกาจับเวลาดิจิทัล
    \item จานเพาะเชื้อ 2 ใบ วางทับบนกระดาษกราฟมิลลิเมตร บรรจุน้ำเย็น ($10\,^\circ\text{C}$) และน้ำอุ่น ($45\,^\circ\text{C}$)
    \item สารละลายสีย้อมเมทิลีนบลู (Methylene Blue $1\%$) และไมโครปิเปต P20 ตั้งค่าที่ $20\text{ }\mu\text{L}$
\end{itemize}
\end{equipbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}

\subsection{ตอนที่ 1 การวัดอัตราเร็วและเขียนกราฟระยะทางกับเวลา}
\begin{enumerate}
    \item ตั้งหลอดแก้ววัดการเคลื่อนที่ให้ทำมุมเอียงคงที่ พลิกหลอดให้ฟองอากาศเริ่มต้นเคลื่อนที่จากด้านล่าง เมื่อขอบหน้าของฟองอากาศผ่านขีดเริ่มต้น ($0\text{ cm}$) ให้กดเริ่มจับเวลา
    \item อ่านเวลา $t$ เมื่อฟองอากาศเคลื่อนที่ผ่านระยะทาง $s = 10.0\text{ cm}, 20.0\text{ cm}, 30.0\text{ cm}$ และ $40.0\text{ cm}$ ทำการทดลองซ้ำ 3 ครั้ง คำนวณเวลาเฉลี่ยและอัตราเร็วเฉลี่ย $v = s/t$
\end{enumerate}

\subsection{ตอนที่ 2 อิทธิพลของอุณหภูมิต่ออัตราเร็วการแพร่ของโมเลกุล}
\begin{enumerate}
    \item รอให้น้ำเย็น ($10\,^\circ\text{C}$) และน้ำอุ่น ($45\,^\circ\text{C}$) ในจานเพาะเชื้อทั้ง 2 ใบอยู่นิ่งสนิทไม่กระเพื่อม
    \item ใช้ไมโครปิเปตหยดสีย้อมเมทิลีนบลูปริมาตร $20\text{ }\mu\text{L}$ ลงตรงจุดกึ่งกลางของจานเพาะเชื้อแต่ละใบอย่างเบาๆ พร้อมกดจับเวลา
    \item อ่านค่ารัศมีของวงสีที่แพร่กระจายออก ($R$ ในหน่วย $\text{mm}$) จากกระดาษกราฟใต้จานเพาะเชื้อ เมื่อเวลาผ่านไป $1, 2$ และ $3$ นาที
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 2\quad การเคลื่อนที่ ความเร็ว และการแพร่ของโมเลกุล]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\noindent\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 1 การเคลื่อนที่แนวตรงของฟองอากาศในหลอดของเหลว}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ระยะทาง $s$ ($\text{cm}$)} & \textbf{ครั้งที่ 1 ($\text{s}$)} & \textbf{ครั้งที่ 2 ($\text{s}$)} & \textbf{ครั้งที่ 3 ($\text{s}$)} & \textbf{เฉลี่ย $t$ ($\text{s}$)} & \textbf{อัตราเร็ว $v$ ($\text{cm/s}$)} \\
\midrule
$10.0\text{ cm}$ & ........ & ........ & ........ & ........ & \dotfill \\
$20.0\text{ cm}$ & ........ & ........ & ........ & ........ & \dotfill \\
$30.0\text{ cm}$ & ........ & ........ & ........ & ........ & \dotfill \\
$40.0\text{ cm}$ & ........ & ........ & ........ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 2 รัศมีการแพร่ของสีย้อมเมทิลีนบลูที่อุณหภูมิต่างกัน}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c}
\toprule
\textbf{สภาวะอุณหภูมิน้ำในจานเพาะเชื้อ} & \textbf{$1\text{ min}$ ($\text{mm}$)} & \textbf{$2\text{ min}$ ($\text{mm}$)} & \textbf{$3\text{ min}$ ($\text{mm}$)} & \textbf{อัตราเร็วแพร่ ($\text{mm/min}$)} \\
\midrule
จานที่ 1 น้ำเย็น ($10\,^\circ\text{C}$) & ........ & ........ & ........ & \dotfill \\
จานที่ 2 น้ำอุ่น ($45\,^\circ\text{C}$) & ........ & ........ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{การคำนวณความชันกราฟตอนที่ 1 และสรุปผลการทดลอง}\\[4pt]
ความชันของกราฟระยะทาง--เวลา $\text{Slope} = \dfrac{s_4 - s_1}{t_4 - t_1} = $ \dotfill $\text{cm/s}$\\[6pt]
สรุปผลการทดลอง \dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 2}
\begin{enumerate}
    \item จากผลการทดลองตอนที่ 2 อุณหภูมิของน้ำมีผลต่ออัตราเร็วการแพร่ของโมเลกุลสีย้อมอย่างไร และหลักการนี้อธิบายการแพร่ของยาปฏิชีวนะในวุ้นเพาะเชื้อได้อย่างไร
    \item หากส่องกล้องจุลทรรศน์ดูแบคทีเรียในหยดน้ำแล้วพบว่าทุกเซลล์สั่นสะเทือนด้วยแอมพลิจูดมากขึ้นเมื่อไฟส่องสว่างใต้กล้องเกิดความร้อนสูงขึ้น ปรากฏการณ์นี้คือการเคลื่อนที่แบบใด
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab02_motion_brownian_diffusion.tex"), "w", encoding="utf-8") as f:
    f.write(lab02)

# ====================================================================
# LAB 3: กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพตามกฎของสโตกส์ (Week 3)
# ====================================================================
lab03 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 3\quad กฎของนิวตันและการวัดความหนืดตามกฎของสโตกส์ (สัปดาห์ที่ 3)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO2, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item อธิบายสมดุลของแรงทั้งสาม (แรงโน้มถ่วง แรงลอยตัว และแรงหนืดของสโตกส์) ที่กระทำต่ออนุภาคทรงกลมขณะจมลงด้วยอัตราเร็วสุดท้ายคงที่ ($v_t$) ได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item ปฏิบัติการวัดอัตราเร็วสุดท้ายของลูกกลมโลหะในของเหลวและคำนวณหาสัมประสิทธิ์ความหนืด ($\eta$) พร้อมเชื่อมโยงสู่การตกตะกอนของเซลล์ยีสต์และแบคทีเรียได้ \textbf{(CLO2, CLO3 เชื่อมโยง PLO1, PLO3)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1}\quad อธิบายสมดุลแรงตามกฎข้อที่ 1 ของนิวตัน ($\sum F = 0$) และสมการกฎของสโตกส์
    \item \textbf{ชั่วโมงที่ 2}\quad วัดรัศมีลูกกลมด้วยไมโครมิเตอร์ และจับเวลาการตกผ่านของเหลวความหนืดต่างกัน (น้ำกลั่น น้ำเชื่อม และกลีเซอรีน)
    \item \textbf{ชั่วโมงที่ 3}\quad คำนวณค่าความหนืด $\eta$ และเปรียบเทียบผลของขนาดรัศมีต่ออัตราเร็วตกตะกอน
\end{itemize}
\end{planbox}
\clearpage

\chapter{กฎของนิวตันและการวัดความหนืดของของเหลวชีวภาพ}
\index{กฎของสโตกส์}\index{สัมประสิทธิ์ความหนืด}\index{อัตราเร็วสุดท้าย}\index{การตกตะกอนของเซลล์}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

เมื่อปล่อยวัตถุทรงกลมหรือเซลล์จุลินทรีย์รัศมี $r$ ที่มีความหนาแน่น $\rho_p$ ลงในของเหลวที่มีความหนาแน่น $\rho_f$ และมีสัมประสิทธิ์ความหนืด $\eta$ ในช่วงแรกวัตถุจะมีความเร่งลงด้านล่าง แต่เมื่ออัตราเร็วเพิ่มขึ้น แรงต้านความหนืดของของเหลว ($F_{\text{drag}} = 6\pi\eta r v$) จะเพิ่มขึ้นตามจนกระทั่ง\textbf{แรงดึงขึ้นรวม (แรงหนืด $+$ แรงลอยตัว) มีขนาดเท่ากับแรงโน้มถ่วงที่ดึงลงพอดี} ($\sum F = 0$ ตามกฎข้อที่ 1 ของนิวตัน) นับจากจุดนั้นวัตถุจะจมลงด้วย\textbf{อัตราเร็วสุดท้ายคงที่} (\textbf{Terminal Velocity}, $v_t$)

\begin{conceptbox}[สมการคำนวณอัตราเร็วสุดท้ายและสัมประสิทธิ์ความหนืดของสโตกส์]
\begin{enumerate}
    \item \textbf{คำนวณอัตราเร็วสุดท้ายจากการจับเวลา}\quad $v_t = \dfrac{s}{t}\quad (\text{หน่วย m/s})$
    \item \textbf{คำนวณสัมประสิทธิ์ความหนืดของของเหลว} ($\eta$ มีหน่วยเป็น $\text{Pa}\cdot\text{s}$)
    \begin{equation}
        \eta = \frac{2 r^2 (\rho_p - \rho_f) g}{9 v_t}
    \end{equation}
    โดยที่ $g = 9.8\text{ m/s}^2$, $r$ คือรัศมีทรงกลมในหน่วยเมตร ($\text{m}$), $\rho_p$ คือความหนาแน่นทรงกลม ($\text{kg/m}^3$) และ $\rho_f$ คือความหนาแน่นของเหลว ($\text{kg/m}^3$)
\end{enumerate}
\end{conceptbox}

\begin{worked}[การคำนวณความหนืดของกลีเซอรีนจากการจับเวลาลูกเหล็กตก]
\textbf{โจทย์ตัวอย่าง}\quad ลูกเหล็กทรงกลมมีรัศมี $r = 1.5\text{ mm} = 1.5 \times 10^{-3}\text{ m}$ และมีความหนาแน่น $\rho_p = 7{,}800\text{ kg/m}^3$ ถูกปล่อยให้จมลงในกระบอกตวงบรรจุกลีเซอรีน ($\rho_f = 1{,}260\text{ kg/m}^3$) โดยเคลื่อนที่ผ่านระยะห่างระหว่างขีดยาง $s = 0.20\text{ m}$ ในเวลาเฉลี่ย $t = 2.0\text{ s}$ จงหาอัตราเร็วสุดท้าย $v_t$ และความหนืด $\eta$ ของกลีเซอรีน

\textbf{วิธีคำนวณทีละขั้นตอน}
\begin{enumerate}
    \item \textbf{หาอัตราเร็วสุดท้าย}\quad $v_t = \dfrac{0.20\text{ m}}{2.0\text{ s}} = 0.10\text{ m/s}$
    \item \textbf{แทนค่าหาความหนืด $\eta$}
    \[
        \eta = \frac{2 \times (1.5 \times 10^{-3})^2 \times (7{,}800 - 1{,}260) \times 9.8}{9 \times 0.10} \approx 0.32\text{ Pa}\cdot\text{s}
    \]
\end{enumerate}
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและรายการวัสดุ}

\begin{figure}[H]
\centering
\resizebox{0.82\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Graduated cylinder
    \fill[boxAmberBg] (2.0,0.4) rectangle (5.2,5.0);
    \draw[physRoyalBlue, line width=1.6pt] (1.6,0.4) -- (5.6,0.4);
    \draw[physRoyalBlue, line width=1.5pt] (2.0,5.2) -- (2.0,0.4) -- (5.2,0.4) -- (5.2,5.2);

    % Rubber bands (Start and Stop markers)
    \draw[crimsonAlert, line width=2.2pt] (1.85,4.0) -- (5.35,4.0) node[right, font=\small\bfseries] {ขีดยางบน (เริ่มกดจับเวลา $t=0$)};
    \draw[crimsonAlert, line width=2.2pt] (1.85,1.4) -- (5.35,1.4) node[right, font=\small\bfseries] {ขีดยางล่าง (หยุดจับเวลาที่ระยะ $s = 0.20\text{ m}$)};
    \draw[<->, physRoyalBlue, line width=1.2pt] (1.3,1.4) -- node[left, font=\small\bfseries] {$s = 20\text{ cm}$} (1.3,4.0);

    % Falling sphere
    \shade[ball color=charcoal!80] (3.6,2.8) circle (0.28cm);
    \draw[->, crimsonAlert, line width=1.4pt] (3.6,2.45) -- (3.6,1.75) node[right, font=\footnotesize\bfseries] {$v_t$ คงที่};
    \draw[->, bioEmerald, line width=1.4pt] (3.6,3.15) -- (3.6,3.85) node[right, font=\footnotesize\bfseries] {$F_{\text{drag}} + F_b$};
\end{tikzpicture}%
}
\caption{การจัดชุดกระบอกตวงวัดความหนืดด้วยวิธีปล่อยลูกกลมโลหะตกผ่านระยะทางมาตรฐาน}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม]
\begin{itemize}
    \item กระบอกตวงทรงสูงขนาด $500\text{ mL}$ จำนวน 2 ใบ บรรจุสารละลายน้ำเชื่อมเข้มข้น ($\rho_f = 1{,}200\text{ kg/m}^3$) และกลีเซอรีน ($\rho_f = 1{,}260\text{ kg/m}^3$)
    \item ลูกเหล็กทรงกลมขนาดเล็กและขนาดกลาง ($\rho_p = 7{,}800\text{ kg/m}^3$), ไมโครมิเตอร์, แม่เหล็กสำหรับดึงลูกเหล็กขึ้นจากก้นกระบอก และนาฬิกาจับเวลาดิจิทัล
\end{itemize}
\end{equipbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}
\begin{enumerate}
    \item ใช้ไมโครมิเตอร์วัดเส้นผ่านศูนย์กลาง $D$ ของลูกเหล็กทรงกลม คำนวณรัศมี $r = D/2$ แล้วแปลงหน่วยเป็นเมตร ($\text{m}$ โดยคูณด้วย $10^{-3}$)
    \item ตรวจสอบแถบยางรัดรอบกระบอกตวงให้ขีดบนอยู่ต่ำกว่าผิวของเหลวอย่างน้อย $5\text{ cm}$ และขีดล่างอยู่ห่างจากขีดบนเป็นระยะทาง $s = 20.0\text{ cm}$ ($0.20\text{ m}$)
    \item ใช้ปากคีบปล่อยลูกเหล็กให้จมลงตรงกึ่งกลางกระบอกตวง (ระวังอย่าให้ลูกเหล็กชนผนังแก้ว) กดเริ่มจับเวลาเมื่อลูกเหล็กผ่านขีดยางบน และกดหยุดเมื่อผ่านขีดยางล่าง ทำซ้ำ 3 ครั้งสำหรับของเหลวแต่ละชนิด
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 3\quad การวัดความหนืดและอัตราเร็วตกตะกอนตามกฎของสโตกส์]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\noindent\textbf{รัศมีลูกเหล็กที่วัดได้} $r = $ \dotfill $\text{mm} = $ \dotfill $\text{m}$\quad \textbf{ระยะห่างขีดยาง} $s = 0.20\text{ m}$

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลการจับเวลาการตกและคำนวณสัมประสิทธิ์ความหนืด ($\eta$)}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ชนิดของเหลวชีวภาพ} & \textbf{ครั้งที่ 1 ($\text{s}$)} & \textbf{ครั้งที่ 2 ($\text{s}$)} & \textbf{เฉลี่ย $t$ ($\text{s}$)} & \textbf{$v_t = s/t$ ($\text{m/s}$)} & \textbf{ความหนืด $\eta$ ($\text{Pa}\cdot\text{s}$)} \\
\midrule
สารละลายน้ำเชื่อมเข้มข้น & ............ & ............ & ............ & ............ & \dotfill \\
กลีเซอรีนบริสุทธิ์ & ............ & ............ & ............ & ............ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{แสดงวิธีคำนวณหาค่าความหนืด $\eta$ ของกลีเซอรีนจากข้อมูลที่วัดได้จริง}\\[4pt]
\dotfill\\[6pt]
\dotfill

\noindent\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 3}
\begin{enumerate}
    \item เพราะเหตุใดเราจึงต้องติดขีดยางเส้นบนให้ต่ำลงมาจากผิวหน้าของเหลวประมาณ $5\text{ cm}$ แทนที่จะเริ่มจับเวลาทันทีที่ปล่อยลูกเหล็กที่ผิวของเหลว
    \item ในการเก็บรักษาสายพันธุ์แบคทีเรียในตู้แช่แข็ง $-80\,^\circ\text{C}$ นิยมเติมกลีเซอรีนความเข้มข้น $15\text{--}20\%$ ลงในอาหารเลี้ยงเชื้อ นอกจากป้องกันผลึกน้ำแข็งแล้ว กลีเซอรีนมีผลต่อความหนืดและอัตราการจมตัวของเซลล์อย่างไร
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab03_newton_stokes_viscosity.tex"), "w", encoding="utf-8") as f:
    f.write(lab03)

# ====================================================================
# LAB 4: การอนุรักษ์พลังงานกลและการคำนวณค่า RCF เครื่องปั่นเหวี่ยง (Week 4)
# ====================================================================
lab04 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 4\quad พลังงานกลและเครื่องปั่นเหวี่ยง Centrifuge (สัปดาห์ที่ 4)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO2, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item วัดรัศมีโรเตอร์ ($r_{\text{cm}}$) ของเครื่องปั่นเหวี่ยงและคำนวณแปลงค่าระหว่างความเร็วรอบต่อนาที ($\text{RPM}$) กับแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$ หรือ $\times g$) ได้ถูกต้อง \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการจัดสมดุลหลอดไมโครทิวบ์ในหัวปั่นโรเตอร์และปั่นแยกตะกอนเซลล์ยีสต์ออกจากส่วนใสได้อย่างปลอดภัย \textbf{(CLO2, CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1}\quad สาธิตโครงสร้างภายในของเครื่อง Centrifuge การวัดรัศมีโรเตอร์ และกฎเหล็กของการถ่วงสมดุลหลอดตรงข้ามกัน
    \item \textbf{ชั่วโมงที่ 2}\quad ปฏิบัติการวัดรัศมีโรเตอร์ คำนวณตารางแปลงค่า RPM $\leftrightarrow$ RCF และปั่นแยกตะกอนเซลล์ยีสต์ที่ความเร็วรอบต่างๆ
    \item \textbf{ชั่วโมงที่ 3}\quad เปรียบเทียบความแน่นของเม็ดตะกอนเซลล์ (Pellet) และความใสของส่วนใสด้านบน (Supernatant) พร้อมสรุปผล
\end{itemize}
\end{planbox}
\clearpage

\chapter{พลังงานกลและการคำนวณแรงเหวี่ยงสัมพัทธ์ของเครื่องปั่นเหวี่ยง}
\index{เครื่องปั่นเหวี่ยง Centrifuge}\index{แรงเหวี่ยงสัมพัทธ์ RCF}\index{เม็ดตะกอนเซลล์ Pellet}\index{การจัดสมดุลโรเตอร์}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

ในการเก็บเกี่ยวเซลล์แบคทีเรีย ยีสต์ หรือการตกตะกอนดีเอ็นเอในห้องปฏิบัติการจุลชีววิทยา เราใช้\textbf{เครื่องปั่นเหวี่ยง} (\textbf{Centrifuge}) เปลี่ยนพลังงานไฟฟ้าเป็นพลังงานจลน์ของการหมุนด้วยอัตราเร็วเชิงมุมสูง เพื่อให้เกิดความเร่งสู่ศูนย์กลางที่มีค่าสูงกว่าความเร่งโน้มถ่วงของโลก ($g$) หลายพันเท่า ค่าที่ระบุว่าแรงเหวี่ยงที่กระทำต่อเซลล์มีค่าเป็นกี่เท่าของแรงโน้มถ่วงโลก เรียกว่า \textbf{แรงเหวี่ยงสัมพัทธ์} (\textbf{Relative Centrifugal Force}, $\text{RCF}$ หรือ $\times g$)

\begin{conceptbox}[สมการแปลงความเร็วรอบ (RPM) เป็นแรงเหวี่ยงสัมพัทธ์ (RCF)]
\begin{equation}
    \text{RCF} = 1.118 \times 10^{-5} \times r_{\text{cm}} \times (\text{RPM})^2
\end{equation}
โดยที่ $r_{\text{cm}}$ คือรัศมีของโรเตอร์วัดจากจุดกึ่งกลางแกนหมุนไปถึงก้นหลอดตัวอย่างในหน่วยเซนติเมตร ($\text{cm}$) และ $\text{RPM}$ คือจำนวนรอบการหมุนต่อนาที
\end{conceptbox}

\begin{worked}[การคำนวณหาค่า RCF ของเครื่องปั่นเหวี่ยงไมโครทิวบ์]
\textbf{โจทย์ตัวอย่าง}\quad เครื่อง Microcentrifuge ในห้องแล็บจุลชีววิทยามีรัศมีโรเตอร์วัดถึงก้นหลอดได้ $r_{\text{cm}} = 8.5\text{ cm}$ หากตั้งความเร็วรอบที่ $6{,}000\text{ rpm}$ จะเกิดแรงเหวี่ยงสัมพัทธ์กี่ $\times g$

\textbf{วิธีคำนวณทีละขั้นตอน}
\[
    \text{RCF} = 1.118 \times 10^{-5} \times 8.5 \times (6{,}000)^2 = 1.118 \times 10^{-5} \times 8.5 \times (3.6 \times 10^7) = 3{,}421 \times g
\]
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและข้อควรระวังความปลอดภัย}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Measuring Rotor Radius r_cm
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.4,3.75) {(ก) การวัดรัศมีโรเตอร์ $r_{\text{cm}}$};
        \fill[physSlate!30, draw=charcoal, line width=1.3pt] (1.4,1.2) -- (5.4,1.2) -- (4.8,2.8) -- (2.0,2.8) -- cycle;
        \fill[charcoal] (3.25,0.8) rectangle (3.55,3.1);
        \draw[<->, crimsonAlert, line width=1.5pt] (3.4,1.5) -- node[above, font=\footnotesize\bfseries] {$r_{\text{cm}}$ ($\text{cm}$)} (5.1,1.5);
        \node[font=\scriptsize, align=center] at (3.4,0.4) {วัดจากกึ่งกลางแกนหมุนถึงก้นช่องใส่หลอด};
    \end{scope}

    % Right: Pellet vs Supernatant after Centrifugation
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.4,3.75) {(ข) หลอดไมโครทิวบ์ก่อนและหลังปั่นเหวี่ยง};
        % Before
        \fill[physAmber!45, draw=physRoyalBlue, line width=1.2pt] (1.3,1.2) -- (1.3,3.0) -- (2.3,3.0) -- (2.3,1.2) -- (1.8,0.6) -- cycle;
        \node[below, font=\scriptsize\bfseries] at (1.8,0.55) {ก่อนปั่น (ขุ่นทั่วหลอด)};
        \draw[->, physRoyalBlue, line width=1.5pt] (2.6,2.0) -- node[above, font=\scriptsize\bfseries] {$\text{RCF}$} (3.6,2.0);
        % After
        \fill[physCyan!15, draw=physRoyalBlue, line width=1.2pt] (4.1,1.2) -- (4.1,3.0) -- (5.1,3.0) -- (5.1,1.2) -- (4.6,0.6) -- cycle;
        \fill[physAmber!90!black] (4.35,0.9) -- (4.85,0.9) -- (4.6,0.6) -- cycle;
        \node[right, font=\scriptsize\bfseries, color=physRoyalBlue] at (5.15,2.3) {ส่วนใส (Supernatant)};
        \node[right, font=\scriptsize\bfseries, color=physAmber!90!black] at (4.95,0.8) {ตะกอนเซลล์ (Pellet)};
    \end{scope}
\end{tikzpicture}%
}
\caption{การวัดรัศมีโรเตอร์และการแยกชั้นระหว่างส่วนใสกับเม็ดตะกอนเซลล์หลังการปั่นเหวี่ยง}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม]
\begin{itemize}
    \item เครื่องปั่นเหวี่ยงหลอดไมโครทิวบ์ (Microcentrifuge), ไม้บรรทัดมิลลิเมตรสำหรับวัดรัศมีโรเตอร์ $r_{\text{cm}}$
    \item หลอดไมโครทิวบ์ขนาด $1.5\text{ mL}$ จำนวน 6 หลอด, ไมโครปิเปต P1000 และสารแขวนลอยเซลล์ยีสต์ \textit{Saccharomyces cerevisiae}
\end{itemize}
\end{equipbox}

\begin{warningbox}[กฎความปลอดภัยในการใช้เครื่อง Centrifuge]
ต้องวางหลอดที่มีปริมาตรเท่ากันเป๊ะในช่องตรงข้ามกัน ($180^\circ$) เสมอ ปิดฝาครอบในของโรเตอร์ให้แน่น และห้ามเปิดฝาเครื่องจนกว่าตัวเลขความเร็วรอบจะลดลงเป็น $0\text{ rpm}$
\end{warningbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}
\begin{enumerate}
    \item ขณะเครื่องปั่นเหวี่ยงปิดสวิตช์อยู่ ให้ใช้ไม้บรรทัดวัดรัศมีโรเตอร์ ($r_{\text{cm}}$) จากกึ่งกลางแกนหมุนไปถึงขอบนอกของช่องใส่หลอด บันทึกค่าในหน่วยเซนติเมตร ($\text{cm}$)
    \item ใช้ไมโครปิเปต P1000 ดูดสารแขวนลอยยีสต์ที่เขย่าเข้ากันดีแล้ว ปริมาตร $1{,}000\text{ }\mu\text{L}$ ใส่ลงในหลอดไมโครทิวบ์ 3 หลอด และเตรียมหลอดน้ำกลั่นปริมาตร $1{,}000\text{ }\mu\text{L}$ อีก 3 หลอดสำหรับใช้เป็นหลอดถ่วงสมดุล (\textbf{Balance Tube})
    \item นำหลอดที่ 1 (พร้อมหลอดถ่วงสมดุลวางตรงข้ามกัน) ปั่นที่ความเร็วรอบ $1{,}500\text{ rpm}$ นาน $2\text{ นาที}$, หลอดที่ 2 ปั่นที่ $3{,}000\text{ rpm}$ นาน $2\text{ นาที}$ และหลอดที่ 3 ปั่นที่ $6{,}000\text{ rpm}$ นาน $2\text{ นาที}$ คำนวณค่า $\text{RCF}$ และสังเกตความใสของส่วนบนและขนาดของเม็ดตะกอนเซลล์ที่ก้นหลอด
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 4\quad การคำนวณค่า RCF และการปั่นเหวี่ยงแยกเซลล์จุลินทรีย์]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill \textbf{รัศมีโรเตอร์ที่วัดได้} $r_{\text{cm}} = $ \dotfill $\text{cm}$\\[4pt]
\noindent\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลการคำนวณค่าแรงเหวี่ยงสัมพัทธ์ (RCF) และผลการตกตะกอนของเซลล์ยีสต์}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{c c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{หลอดที่} & \textbf{รอบ (RPM)} & \textbf{RCF คำนวณ ($\times g$)} & \textbf{RCF หน้าจอเครื่อง} & \textbf{ลักษณะส่วนใสและความแน่นของเม็ดตะกอน} \\
\midrule
หลอดที่ 1 & $1{,}500\text{ rpm}$ & ............ & ............ & \dotfill \\
หลอดที่ 2 & $3{,}000\text{ rpm}$ & ............ & ............ & \dotfill \\
หลอดที่ 3 & $6{,}000\text{ rpm}$ & ............ & ............ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{แสดงวิธีคำนวณค่า RCF ที่ความเร็วรอบ $3{,}000\text{ rpm}$ และ $6{,}000\text{ rpm}$}\\[4pt]
\dotfill\\[6pt]
\dotfill

\noindent\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 4}
\begin{enumerate}
    \item เมื่อเพิ่มความเร็วรอบ ($\text{RPM}$) จาก $3{,}000\text{ rpm}$ เป็น $6{,}000\text{ rpm}$ (เพิ่มขึ้น $2$ เท่า) ค่าแรงเหวี่ยงสัมพัทธ์ ($\text{RCF}$) เพิ่มขึ้นเป็นกี่เท่าของค่าเดิม เพราะเหตุใด
    \item เพราะเหตุใดหลังปั่นเหวี่ยงเสร็จแล้ว นักจุลชีววิทยาจึงต้องรีบดูดส่วนใส (Supernatant) ออกอย่างเบามือโดยไม่ให้ปลายทิปปิเปตไปชนก้นหลอดด้านที่หันออกนอกแกนหมุน
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab04_energy_centrifuge_rcf.tex"), "w", encoding="utf-8") as f:
    f.write(lab04)

# ====================================================================
# LAB 5: ความจุความร้อนจำเพาะและการตรวจสอบเสถียรภาพตู้อบ Incubator (Week 5)
# ====================================================================
lab05 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 5\quad ความร้อนจำเพาะและเสถียรภาพตู้อบ Incubator (สัปดาห์ที่ 5)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO2, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item คำนวณปริมาณความร้อนที่ถ่ายโอนระหว่างของเหลวโดยใช้สมการ $Q = mc\Delta T$ และตรวจสอบสมดุลความร้อนในแคลอริมิเตอร์ได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item ปฏิบัติการตรวจสอบความสม่ำเสมอของการกระจายอุณหภูมิภายในตู้อบเลี้ยงเชื้อ (Incubator $37.0\,^\circ\text{C}$) และเปรียบเทียบอัตราการถ่ายโอนความร้อนระหว่างอากาศกับอ่างน้ำอุ่น (Water Bath) ได้ \textbf{(CLO2, CLO3, CLO4 เชื่อมโยง PLO1, PLO3, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1}\quad ทบทวนสมการความร้อนจำเพาะ $Q = mc\Delta T$ และหลักการนำและการพาความร้อน
    \item \textbf{ชั่วโมงที่ 2}\quad ทดลองสมดุลความร้อนในแคลอริมิเตอร์ และวัดอุณหภูมิ 5 จุดภายในตู้อบ Incubator
    \item \textbf{ชั่วโมงที่ 3}\quad คำนวณปริมาณความร้อนและอภิปรายแนวทางการจัดวางจานเพาะเชื้อในตู้อบให้ได้รับความร้อนสม่ำเสมอ
\end{itemize}
\end{planbox}
\clearpage

\chapter{ความจุความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบเลี้ยงเชื้อ}
\index{แคลอริมิเตอร์}\index{สมดุลความร้อน}\index{ตู้อบเลี้ยงเชื้อ Incubator}\index{อ่างน้ำควบคุมอุณหภูมิ Water Bath}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

เมื่อนำของเหลวที่มีอุณหภูมิสูง ($T_{\text{hot}}$) มาผสมกับของเหลวที่มีอุณหภูมิต่ำ ($T_{\text{cold}}$) ภายในภาชนะหุ้มฉนวนที่เรียกว่า \textbf{แคลอริมิเตอร์} (\textbf{Calorimeter}) ความร้อนจะถ่ายโอนจากของเหลวร้อนไปยังของเหลวเย็นจนกระทั่งทั้งสองมีอุณหภูมิผสมสุดท้ายเท่ากัน ($T_{\text{mix}}$) ตามกฎการอนุรักษ์พลังงานความร้อน คือ $\text{ความร้อนที่น้ำร้อนคายออก } (Q_{\text{lost}}) = \text{ความร้อนที่น้ำเย็นรับเข้า } (Q_{\text{gained}})$

ในห้องปฏิบัติการจุลชีววิทยา การควบคุมอุณหภูมิของ\textbf{ตู้อบเลี้ยงเชื้อ} (\textbf{Incubator}) ให้คงที่ที่ $37.0 \pm 0.5\,^\circ\text{C}$ มีความสำคัญอย่างยิ่งต่ออัตราการเจริญของแบคทีเรีย หากวางจานเพาะเชื้ออัดแน่นเกินไปจนขวางการพาความร้อนของลมหมุนเวียน หรือวางชิดขอบประตูที่มีการสูญเสียความร้อน จะทำให้อุณหภูมิจริงของจานเพาะเชื้อเบี่ยงเบนไปจากค่าที่ตั้งไว้

\begin{conceptbox}[สมการปริมาณความร้อนและอุณหภูมิผสมตามทฤษฎี]
\begin{enumerate}
    \item \textbf{ปริมาณความร้อนที่ทำให้สารมวล $m$ เปลี่ยนอุณหภูมิไป $\Delta T$}\quad $Q = m c \Delta T\quad (\text{โดย } c_{\text{น้ำ}} = 4.184\text{ J/g}\cdot^\circ\text{C})$
    \item \textbf{อุณหภูมิผสมทางทฤษฎีเมื่อผสมน้ำมวลเท่ากัน ($m_1 = m_2$)}\quad $T_{\text{theory}} = \dfrac{T_1 + T_2}{2}$
\end{enumerate}
\end{conceptbox}

\begin{worked}[การคำนวณความร้อนและอุณหภูมิสมดุลของการผสมน้ำ]
\textbf{โจทย์ตัวอย่าง}\quad ผสมน้ำเย็นมวล $100\text{ g}$ อุณหภูมิ $T_1 = 24.0\,^\circ\text{C}$ เข้ากับน้ำอุ่นมวล $100\text{ g}$ อุณหภูมิ $T_2 = 56.0\,^\circ\text{C}$ จงหาอุณหภูมิผสมตามทฤษฎี และปริมาณความร้อนที่น้ำเย็นได้รับเมื่ออุณหภูมิผสมจริงวัดได้ $39.0\,^\circ\text{C}$

\textbf{วิธีคำนวณทีละขั้นตอน}
\begin{enumerate}
    \item \textbf{อุณหภูมิผสมทางทฤษฎี}\quad $T_{\text{theory}} = \dfrac{24.0 + 56.0}{2} = 40.0\,^\circ\text{C}$
    \item \textbf{ความร้อนที่น้ำเย็นได้รับจริง}\quad $Q = m c (T_{\text{mix}} - T_1) = 100\text{ g} \times 4.184\text{ J/(g}\cdot^\circ\text{C)} \times (39.0 - 24.0)\,^\circ\text{C} = 6{,}276\text{ J}$
\end{enumerate}
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและรายการวัสดุ}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Calorimeter
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.4,3.75) {(ก) ชุดแคลอริมิเตอร์ทดสอบสมดุลความร้อน};
        \fill[physSlate!30, draw=charcoal, line width=1.2pt] (2.0,0.6) rectangle (4.8,3.0);
        \fill[physCyan!30, draw=physRoyalBlue, line width=1.1pt] (2.3,0.8) rectangle (4.5,2.6);
        \draw[crimsonAlert, line width=1.8pt] (3.4,1.2) -- (3.4,3.4);
        \fill[crimsonAlert] (3.4,1.2) circle (3pt);
        \node[right, font=\scriptsize\bfseries, color=crimsonAlert] at (3.5,3.2) {เทอร์โมมิเตอร์วัด $T_{\text{mix}}$};
    \end{scope}

    % Right: Incubator 3-Point Thermal Mapping
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.2);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.4,3.75) {(ข) จุดตรวจสอบอุณหภูมิตู้อบ Incubator};
        \fill[white, draw=charcoal, line width=1.4pt] (1.4,0.6) rectangle (5.4,3.3);
        \draw[physSlate, dashed, line width=1.0pt] (1.4,1.5) -- (5.4,1.5);
        \draw[physSlate, dashed, line width=1.0pt] (1.4,2.4) -- (5.4,2.4);
        \fill[crimsonAlert] (2.2,2.85) circle (3.2pt) node[right, font=\scriptsize\bfseries] {จุดที่ 1 ชั้นบนด้านใน};
        \fill[bioEmerald] (3.4,1.95) circle (3.2pt) node[right, font=\scriptsize\bfseries] {จุดที่ 2 ชั้นกลาง};
        \fill[physAmber] (4.4,1.05) circle (3.2pt) node[left, font=\scriptsize\bfseries] {จุดที่ 3 ชั้นล่างใกล้ประตู};
    \end{scope}
\end{tikzpicture}%
}
\caption{ชุดแคลอริมิเตอร์และตำแหน่งการวางหัววัดตรวจสอบเสถียรภาพอุณหภูมิภายในตู้อบเลี้ยงเชื้อ}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม]
\begin{itemize}
    \item กระป๋องแคลอริมิเตอร์พร้อมฝาปิดและแท่งคน, กระบอกตวง $100\text{ mL}$, กาต้มน้ำอุ่น และเทอร์โมมิเตอร์ดิจิทัล 3 ชุด
    \item ตู้อบเลี้ยงเชื้อจุลินทรีย์ (Incubator) ที่ตั้งอุณหภูมิไว้ที่ $37.0\,^\circ\text{C}$
\end{itemize}
\end{equipbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 สมดุลความร้อนในแคลอริมิเตอร์}\quad ตวงน้ำอุณหภูมิห้องปริมาตร $100\text{ mL}$ ($m_1 = 100\text{ g}$) ใส่แคลอริมิเตอร์ วัดอุณหภูมิเริ่มต้น $T_1$ จากนั้นตวงน้ำอุ่นปริมาตร $100\text{ mL}$ ($m_2 = 100\text{ g}$) อุณหภูมิประมาณ $55\text{--}60\,^\circ\text{C}$ วัดค่า $T_2$ ที่แน่นอนแล้วเทผสมลงในแคลอริมิเตอร์ทันที ปิดฝาคนเบาๆ อ่านค่าอุณหภูมิผสมสูงสุดที่นิ่งแล้ว ($T_{\text{mix}}$)
    \item \textbf{ตอนที่ 2 การตรวจสอบเสถียรภาพอุณหภูมิตู้อบ Incubator}\quad นำสายหัววัดเทอร์โมมิเตอร์ดิจิทัล 3 ชุดวางไว้ที่ชั้นบนด้านใน ชั้นกลาง และชั้นล่างใกล้ขอบประตูของตู้อบ ปิดประตูตู้อบไว้ 10 นาที อ่านค่าอุณหภูมิทุกๆ 3 นาที จำนวน 3 ครั้ง
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 5\quad ความร้อนจำเพาะและเสถียรภาพอุณหภูมิตู้อบเลี้ยงเชื้อ]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\noindent\textbf{ผลการทดลองตอนที่ 1}\quad $T_1 (\text{น้ำเย็น}) = $ \dotfill $^\circ\text{C}$,\quad $T_2 (\text{น้ำอุ่น}) = $ \dotfill $^\circ\text{C}$,\quad $T_{\text{mix}} (\text{วัดจริง}) = $ \dotfill $^\circ\text{C}$\\[4pt]
อุณหภูมิผสมตามทฤษฎี $T_{\text{theory}} = (T_1 + T_2)/2 = $ \dotfill $^\circ\text{C}$,\quad ความร้อนที่น้ำเย็นรับเข้า $Q = mc(T_{\text{mix}}-T_1) = $ \dotfill $\text{J}$

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 2 การกระจายอุณหภูมิภายในตู้อบ Incubator (ตั้งค่าหน้าจอที่ $37.0\,^\circ\text{C}$)}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ตำแหน่งวางหัววัดในตู้อบ} & \textbf{นาทีที่ 3} & \textbf{นาทีที่ 6} & \textbf{นาทีที่ 9} & \textbf{เฉลี่ย ($^\circ\text{C}$)} & \textbf{ผลต่างจาก $37\,^\circ\text{C}$} \\
\midrule
จุดที่ 1 ชั้นบนสุดด้านใน & ............ & ............ & ............ & ............ & \dotfill \\
จุดที่ 2 ชั้นกลาง (จุดอ้างอิง) & ............ & ............ & ............ & ............ & \dotfill \\
จุดที่ 3 ชั้นล่างใกล้ขอบประตู & ............ & ............ & ............ & ............ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 5}
\begin{enumerate}
    \item เพราะเหตุใดอุณหภูมิผสมที่วัดได้จริง ($T_{\text{mix}}$) ในตอนที่ 1 จึงมักมีค่าต่ำกว่าอุณหภูมิผสมตามทฤษฎีเล็กน้อยเสมอ
    \item จากผลการวัดในตอนที่ 2 บริเวณใดของตู้อบเลี้ยงเชื้อที่มีอุณหภูมิต่ำกว่าค่าที่ตั้งไว้มากที่สุด และนักศึกษาควรจัดวางจานเพาะเชื้ออย่างไรในการบ่มเชื้อจริง
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab05_heat_incubator_stability.tex"), "w", encoding="utf-8") as f:
    f.write(lab05)

# ====================================================================
# LAB 6: ความดันไอ จุดเดือด และหม้อนึ่งความดันไอ Autoclave (Week 6)
# ====================================================================
lab06 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนปฏิบัติการที่ 6\quad ความดันไอ จุดเดือด และหม้อนึ่ง Autoclave (สัปดาห์ที่ 6)]
\noindent\textbf{1. เวลาเรียนปฏิบัติการ}\quad 3 ชั่วโมง (180 นาที)\quad \textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1, CLO2, CLO3, CLO4

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมประจำปฏิบัติการ}
\begin{enumerate}
    \item ทดลองแสดงให้เห็นว่าจุดเดือดของน้ำเปลี่ยนแปลงตามความดันเหนือผิวน้ำ และคำนวณแปลงความดันเกจเป็นความดันสัมบูรณ์ได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item บันทึกและเขียนกราฟความดันและอุณหภูมิตามเวลาจริงของรอบการทำงานหม้อนึ่งความดันไอ (Autoclave ที่ $121\,^\circ\text{C}$, $15\text{ psi}$) พร้อมปฏิบัติตามกฎความปลอดภัยของภาชนะความดันสูงได้อย่างเคร่งครัด \textbf{(CLO2, CLO3, CLO4 เชื่อมโยง PLO1, PLO3, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. แผนการจัดเวลาในคาบปฏิบัติการ 3 ชั่วโมง}
\begin{itemize}
    \item \textbf{ชั่วโมงที่ 1}\quad ทดลองตอนที่ 1 การเดือดของน้ำอุ่นที่ความดันต่ำในกระบอกฉีดยาสุญญากาศ และเตรียมขวดอาหารจำลองติดเทป Autoclave Tape
    \item \textbf{ชั่วโมงที่ 2}\quad เดินเครื่อง Autoclave และบันทึกค่าความดันเกจ ($\text{psi}$) และอุณหภูมิ ($^\circ\text{C}$) ทุกๆ 5 นาทีตลอดรอบการทำงาน
    \item \textbf{ชั่วโมงที่ 3}\quad เขียนกราฟรอบการฆ่าเชื้อ ตรวจสอบการเปลี่ยนสีของ Autoclave Tape และอภิปรายกรณีศึกษาความล้มเหลวจากการไม่ไล่อากาศ
\end{itemize}
\end{planbox}
\clearpage

\chapter{ความดันไอ จุดเดือด และการวิเคราะห์รอบการทำงานหม้อนึ่งความดันไอ}
\index{จุดเดือดและความดัน}\index{หม้อนึ่งความดันไอ Autoclave}\index{ความดันเกจและความดันสัมบูรณ์}\index{Autoclave Tape}

\section{หลักการทางฟิสิกส์และทฤษฎีเบื้องหลังการทดลอง}

ของเหลวจะเดือดกลายเป็นไอเมื่อ\textbf{ความดันไออิ่มตัวของของเหลวมีค่าเท่ากับความดันภายนอกที่กดทับผิวของเหลวนั้น} ที่ระดับน้ำทะเลซึ่งมีความดันบรรยากาศ $P_{\text{atm}} = 1\text{ atm} \approx 14.7\text{ psi}$ (ความดันเกจเท่ากับ $0\text{ psi}$) น้ำจะเดือดที่อุณหภูมิ $100\,^\circ\text{C}$ หากเราลดความดันเหนือผิวน้ำลง (เช่น ดึงก้านกระบอกฉีดยาที่อุดปลายไว้) น้ำจะสามารถเดือดเป็นฟองได้ที่อุณหภูมิเพียง $60\text{--}70\,^\circ\text{C}$ ในทางกลับกัน ใน\textbf{หม้อนึ่งความดันไอ} (\textbf{Autoclave}) เราปิดฝาหม้อนึ่งและไล่อากาศออกจนเหลือแต่ไอน้ำบริสุทธิ์อัดแน่นที่ความดันเกจ $15\text{ psi}$ (ความดันสัมบูรณ์ประมาณ $2\text{ atm}$) ทำให้จุดเดือดของน้ำเพิ่มขึ้นไปอยู่ที่ $121\,^\circ\text{C}$ ซึ่งเพียงพอที่จะทำลายเอนโดสปอร์ของแบคทีเรียได้ภายใน 15--20 นาที

\begin{conceptbox}[สมการความดันสัมบูรณ์และกฎความดันย่อยในหม้อนึ่ง Autoclave]
\begin{enumerate}
    \item \textbf{ความดันสัมบูรณ์ภายในหม้อนึ่ง}\quad $P_{\text{abs}} = P_{\text{atm}} + P_{\text{gauge}} \approx 14.7\text{ psi} + P_{\text{gauge}}$
    \item \textbf{สภาวะมาตรฐานการฆ่าเชื้อด้วย Autoclave}\quad $P_{\text{gauge}} = 15\text{ psi}$ ($\approx 103\text{ kPa}$), อุณหภูมิไอน้ำอิ่มตัว $T = 121\,^\circ\text{C}$ ($394\text{ K}$) เป็นเวลาอย่างน้อย $15\text{ นาที}$
\end{enumerate}
\end{conceptbox}

\begin{worked}[การคำนวณความดันสัมบูรณ์และวิเคราะห์อุณหภูมิไอน้ำ]
\textbf{โจทย์ตัวอย่าง}\quad ขณะที่หม้อนึ่ง Autoclave กำลังอยู่ในขั้นตอนฆ่าเชื้อ หน้าปัดความดันเกจอ่านค่าได้ $P_{\text{gauge}} = 15.0\text{ psi}$ จงคำนวณหาความดันสัมบูรณ์ในหน่วย $\text{psi}$ และหน่วยบรรยากาศ ($\text{atm}$) กำหนดให้ $1\text{ atm} = 14.7\text{ psi}$

\textbf{วิธีคำนวณทีละขั้นตอน}
\begin{enumerate}
    \item \textbf{หาความดันสัมบูรณ์ในหน่วย psi}\quad $P_{\text{abs}} = 14.7\text{ psi} + 15.0\text{ psi} = 29.7\text{ psi}$
    \item \textbf{แปลงเป็นหน่วยบรรยากาศ (atm)}\quad $P_{\text{abs}} = \dfrac{29.7\text{ psi}}{14.7\text{ psi/atm}} = 2.02\text{ atm}$
\end{enumerate}
\end{worked}

\section{แผนภาพชุดอุปกรณ์การทดลองและรายการวัสดุ}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Syringe Boiling under Reduced Pressure
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.6,4.2);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.3,3.75) {(ก) การเดือดของน้ำที่ความดันต่ำ};
        \fill[physCyan!25, draw=physRoyalBlue, line width=1.3pt] (1.2,1.5) rectangle (3.6,2.5);
        \fill[charcoal] (0.9,1.85) rectangle (1.2,2.15);
        \fill[physSlate!60, draw=charcoal, line width=1.2pt] (3.4,1.55) rectangle (3.7,2.45);
        \draw[charcoal, line width=2.0pt] (3.7,2.0) -- (5.0,2.0);
        \draw[charcoal, line width=2.0pt] (5.0,1.5) -- (5.0,2.5);
        \draw[->, crimsonAlert, line width=1.6pt] (5.2,2.0) -- (6.1,2.0) node[above left, font=\scriptsize\bfseries] {ดึงก้านสูบลด $P$};
        \foreach \x/\y in {1.8/1.8, 2.3/2.1, 2.8/1.75, 2.1/2.25} {
            \draw[white, fill=white, draw=physRoyalBlue] (\x,\y) circle (2.2pt);
        }
        \node[font=\scriptsize, align=center] at (3.3,0.65) {น้ำอุ่น $70\,^\circ\text{C}$ เดือดเป็นฟองทันทีเมื่อความดันลดลง};
    \end{scope}

    % Right: Autoclave Cycle Profile
    \begin{scope}[shift={(7.4,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (7.0,4.2);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.5,3.75) {(ข) กราฟรอบการทำงานของ Autoclave};
        \draw[->, line width=1.2pt] (0.8,0.8) -- (6.4,0.8) node[below left, font=\scriptsize\bfseries] {เวลา ($\text{min}$)};
        \draw[->, line width=1.2pt] (0.8,0.8) -- (0.8,3.3) node[above right, font=\scriptsize\bfseries] {$T$ ($^\circ\text{C}$)};
        \draw[crimsonAlert, line width=1.8pt] (0.8,1.1) -- (2.2,1.9) -- (2.8,2.8) -- (4.8,2.8) -- (6.0,1.4);
        \draw[dashed, physRoyalBlue] (0.8,2.8) -- (4.8,2.8);
        \node[left, font=\scriptsize\bfseries, color=crimsonAlert] at (0.8,2.8) {$121\,^\circ\text{C}$};
        \node[above, font=\scriptsize\bfseries, color=bioEmerald!90!black] at (3.8,2.8) {ฆ่าเชื้อ 15 นาที ($15\text{ psi}$)};
    \end{scope}
\end{tikzpicture}%
}
\caption{การทดลองการเดือดของน้ำที่ความดันต่ำและกราฟรอบการฆ่าเชื้อมาตรฐานของเครื่องหม้อนึ่งความดันไอ}
\end{figure}

\begin{equipbox}[รายการอุปกรณ์สำหรับแต่ละกลุ่ม]
\begin{itemize}
    \item กระบอกฉีดยาพลาสติกใสขนาด $50\text{ mL}$ พร้อมจุกยางอุดปลาย, บีกเกอร์น้ำอุ่น ($70\,^\circ\text{C}$) และเทอร์โมมิเตอร์
    \item หม้อนึ่งความดันไอ (Autoclave), ขวดแก้วใส่น้ำกลั่นพร้อมฝาเกลียว และเทปวัดผลความร้อน (Autoclave Indicator Tape)
\end{itemize}
\end{equipbox}

\section{ขั้นตอนการปฏิบัติการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การเดือดของน้ำที่ความดันต่ำกว่าบรรยากาศ}\quad ดูดน้ำอุ่นอุณหภูมิประมาณ $70\,^\circ\text{C}$ เข้ากระบอกฉีดยาประมาณ $20\text{ mL}$ ไล่ฟองอากาศออกแล้วอุดปลายกระบอกฉีดยาด้วยจุกยางให้สนิท ออกแรงดึงก้านสูบถอยหลังเพื่อลดความดันภายในกระบอก สังเกตการเกิดฟองเดือดของน้ำทั้งที่อุณหภูมิเพียง $70\,^\circ\text{C}$
    \item \textbf{ตอนที่ 2 การตรวจสอบรอบการทำงานของเครื่อง Autoclave}\quad ติดเทป Autoclave Tape ลงบนขวดน้ำกลั่น \textbf{คลายเกลียวฝาขวดออกครึ่งรอบ} นำเข้าหม้อนึ่งความดันไอ บันทึกค่าความดันเกจ ($\text{psi}$) และอุณหภูมิ ($^\circ\text{C}$) ทุกๆ 5 นาที และตรวจสอบแถบสีบนเทปหลังสิ้นสุดการนึ่ง
\end{enumerate}

\section{ใบบันทึกผลการทดลองประจำกลุ่ม}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 6\quad ความดันไอ จุดเดือด และรอบการทำงานของ Autoclave]
\noindent\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\noindent\textbf{ผลการสังเกตตอนที่ 1 (เมื่อดึงก้านสูบลดความดันกับน้ำอุ่น $70\,^\circ\text{C}$)} \dotfill

\vspace{6pt}
\noindent\textbf{ตารางบันทึกผลตอนที่ 2 ข้อมูลความดันและอุณหภูมิตามเวลาจริงของเครื่อง Autoclave}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c}
\toprule
\textbf{ขั้นตอนการทำงานของหม้อนึ่ง} & \textbf{เวลา ($\text{min}$)} & \textbf{$P_{\text{gauge}}$ ($\text{psi}$)} & \textbf{$P_{\text{abs}}$ ($\text{psi}$)} & \textbf{อุณหภูมิ ($^\circ\text{C}$)} \\
\midrule
1. เริ่มต้นเปิดเครื่องและไล่อากาศ & $0\text{ min}$ & ............ & ............ & \dotfill \\
2. ปิดวาล์วไล่อากาศและเพิ่มความดัน & $10\text{ min}$ & ............ & ............ & \dotfill \\
3. เข้าสู่สภาวะฆ่าเชื้อมาตรฐาน & $15\text{ min}$ & ............ & ............ & \dotfill \\
4. ครบเวลาฆ่าเชื้อ 15 นาที & $30\text{ min}$ & ............ & ............ & \dotfill \\
5. ความดันลดลงพร้อมเปิดฝาอย่างปลอดภัย & $45\text{ min}$ & ............ & ............ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\noindent\textbf{ผลการเปลี่ยนสีของแถบ Autoclave Tape หลังนึ่งเสร็จ} \dotfill\\[6pt]
\noindent\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\section*{คำถามท้ายปฏิบัติการที่ 6}
\begin{enumerate}
    \item หากผู้ปฏิบัติงานรีบปิดวาล์วไล่อากาศเร็วเกินไปจนยังมีอากาศค้างอยู่ในหม้อนึ่ง เมื่อเข็มความดันเกจชี้ที่ $15\text{ psi}$ อุณหภูมิภายในหม้อนึ่งจะถึง $121\,^\circ\text{C}$ หรือไม่ เพราะเหตุใด
    \item จะเกิดอะไรขึ้นหากเราเปิดวาล์วระบายไอน้ำออกอย่างรวดเร็วทันทีที่ครบเวลาฆ่าเชื้อ ในขณะที่ภายในหม้อนึ่งมีขวดอาหารเลี้ยงเชื้อเหลวบรรจุอยู่
\end{enumerate}
"""

with open(os.path.join(LAB_DIR, "lab06_vapor_pressure_autoclave.tex"), "w", encoding="utf-8") as f:
    f.write(lab06)

print("[OK] Generated Labs 1 to 6.")
