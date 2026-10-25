#!/usr/bin/env python3
"""
Generator for Physics for Microbiology Laboratory Manual (4011111) — Part 3:
Generates Labs 7 to 13 in labs/
Strictly adheres to RBRU LaTeX Textbook Builder & OBE Low-Math Microbiology standards.
"""
import os

LABS_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/คู่มือปฏิบัติการ_LaTeX/labs"
os.makedirs(LABS_DIR, exist_ok=True)

# ==============================================================================
# LAB 7: ไฟฟ้าสถิตและกลไกแรงดึงดูดทางไฟฟ้าของสีย้อมเซลล์จุลินทรีย์
# ==============================================================================
lab07 = r"""\chapter{ไฟฟ้าสถิตและกลไกแรงดึงดูดทางไฟฟ้าของสีย้อมเซลล์จุลินทรีย์}

\begin{planbox}[สัปดาห์ที่ 8 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO3 และ CLO4)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item ทดสอบแรงกระทำทางไฟฟ้าสถิตตามกฎของคูลอมบ์ (ประจุชนิดเดียวกันผลักกัน ประจุต่างชนิดกันดึงดูดกัน) ด้วยชุดอิเล็กโทรสโคป
    \item เปรียบเทียบประสิทธิภาพการยึดเกาะของสีย้อมประจุบวก (Basic Dye เช่น คริสตัลไวโอเลตและเมทิลีนบลู) กับสีย้อมประจุลบ (Acidic Dye เช่น นิกโรซินและอีโอซิน) บนพื้นผิวแบบจำลองผนังเซลล์ที่มีประจุสุทธิเป็นลบ ($\zeta\text{-potential} < 0$)
    \item อธิบายเหตุผลทางฟิสิกส์ของเทคนิคการย้อมสีแบบธรรมดา (Simple Staining) และการย้อมสีพื้นหลังแบบลบ (Negative Staining) ในงานจุลชีววิทยาได้อย่างถูกต้อง
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายกฎของคูลอมบ์และธรรมชาติของประจุไฟฟ้าสุทธิบนผนังเซลล์แบคทีเรียได้
    \item \textbf{CLO3 (PLO1)}\quad ปฏิบัติงานกับสารละลายสีย้อมจุลชีววิทยาด้วยความระมัดระวัง สวมถุงมือยาง และกำจัดน้ำล้างสีย้อมลงในภาชนะเฉพาะตามหลักความปลอดภัยห้องปฏิบัติการ
    \item \textbf{CLO4 (PLO5, PLO6)}\quad สังเกต บันทึกภาพวาดจากกล้องจุลทรรศน์ และอภิปรายผลร่วมกันในกลุ่มได้อย่างเป็นระบบ
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

แรงดึงดูดและแรงผลักระหว่างประจุไฟฟ้า $q_1$ และ $q_2$ ที่อยู่ห่างกันเป็นระยะ $r$ อธิบายได้ด้วย\textbf{กฎของคูลอมบ์} (\textbf{Coulomb's Law})\index{กฎของคูลอมบ์ (Coulomb's Law)} โดยประจุไฟฟ้าชนิดเดียวกันจะออกแรงผลักกัน ส่วนประจุไฟฟ้าต่างชนิดกันจะออกแรงดึงดูดเข้าหากัน ในสารละลายน้ำที่มีค่าคงตัวไดอิเล็กทริกสัมพัทธ์สูง ($\varepsilon_r \approx 80$) ขนาดของแรงไฟฟ้าสถิตคำนวณได้จากสมการที่ \eqref{eq:lab07_coulomb}

\begin{equation}
    F_e = \frac{k\,|q_1 q_2|}{\varepsilon_r\,r^2}
    \label{eq:lab07_coulomb}
\end{equation}

ในสภาวะที่เป็นกลาง ($\text{pH} \approx 7.0$) ผนังเซลล์ของแบคทีเรียเกือบทุกชนิดมีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) และหมู่คาร์บอกซิล ($\text{COO}^-$) แตกตัวอยู่หนาแน่น ทำให้ผิวเซลล์แบคทีเรียมี\textbf{ประจุไฟฟ้าสุทธิเป็นลบ} ($\text{Zeta Potential} \approx -15\text{ ถึง }-45\text{ mV}$) เสมอ ดังนั้น
\begin{enumerate}
    \item \textbf{สีย้อมประจุบวก (Basic Dye / Cationic Dye)}\quad เช่น คริสตัลไวโอเลต ($\text{CV}^+$) เมทิลีนบลู ($\text{MB}^+$) และซาฟรานิน ($\text{Saf}^+$)\index{สีย้อมประจุบวก (Basic Dye)} จะถูกดึงดูดเข้ายึดเกาะกับผนังเซลล์แบคทีเรียที่มีประจุลบโดยตรง ทำให้เห็นตัวเซลล์ติดสีชัดเจนบนพื้นหลังใส
    \item \textbf{สีย้อมประจุลบ (Acidic Dye / Anionic Dye)}\quad เช่น นิกโรซิน (Nigrosin) และอีโอซิน ($\text{Eosin}^-$)\index{สีย้อมประจุลบ (Acidic Dye)} จะถูกผนังเซลล์แบคทีเรียผลักออกด้วยแรงคูลอมบ์ ทำให้สีไม่สามารถซึมเข้าสู่ตัวเซลล์ได้ แต่จะไปเคลือบอยู่รอบนอก เกิดเป็นภาพเซลล์ใสสว่างตัดกับพื้นหลังสีเข้ม เรียกว่า \textbf{การย้อมสีพื้นหลังแบบลบ} (\textbf{Negative Staining}) ซึ่งเหมาะสำหรับส่องดูแคปซูลของแบคทีเรีย
\end{enumerate}

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 7]
\begin{itemize}
    \item \textbf{ขนาดของแรงคูลอมบ์ในอากาศ}\quad $F_0 = \dfrac{k\,|q_1 q_2|}{r^2}$ เมื่อ $k = 9.0 \times 10^9\text{ N}\cdot\text{m}^2/\text{C}^2$
    \item \textbf{ขนาดของแรงคูลอมบ์ในน้ำบริสุทธิ์ ($\varepsilon_r = 80$)}\quad $F_{\text{water}} = \dfrac{F_0}{80}$
    \item \textbf{กฎการจับคู่ประจุในการย้อมสีเซลล์ (ประจุผิวเซลล์เป็นลบเสมอที่ pH 7)}
    \begin{itemize}
        \item ผิวเซลล์ ($-$) $+$ สีย้อมประจุบวก ($+$) $\longrightarrow$ \textbf{ดึงดูดกัน} (ตัวเซลล์ติดสีเข้ม พื้นหลังใส)
        \item ผิวเซลล์ ($-$) $+$ สีย้อมประจุลบ ($-$) $\longrightarrow$ \textbf{ผลักกัน} (ตัวเซลล์ใสสว่าง พื้นหลังมืด)
    \end{itemize}
\end{itemize}
\end{conceptbox}

\begin{worked}[การเปรียบเทียบขนาดแรงดึงดูดทางไฟฟ้าในอากาศและในน้ำ]
\textbf{โจทย์} สมมติให้ไอออนบวกของสีย้อมคริสตัลไวโอเลต ($q_1 = +1.6 \times 10^{-19}\text{ C}$) อยู่ห่างจากหมู่ฟอสเฟตประจุลบของผนังเซลล์ ($q_2 = -1.6 \times 10^{-19}\text{ C}$) เป็นระยะทาง $r = 1.0\text{ nm}$ ($1.0 \times 10^{-9}\text{ m}$) หากแรงดึงดูดในสุญญากาศมีค่า $F_0 = 2.30 \times 10^{-10}\text{ N}$ จงคำนวณขนาดของแรงดึงดูดเมื่ออยู่ในตัวกลางที่เป็นน้ำ ($\varepsilon_r = 80$)

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item นำค่าแรงในสุญญากาศ $F_0 = 2.30 \times 10^{-10}\text{ N}$ หารด้วยค่าคงตัวไดอิเล็กทริกสัมพัทธ์ของน้ำ $\varepsilon_r = 80$
    \begin{equation*}
        F_{\text{water}} = \frac{2.30 \times 10^{-10}}{80} = 2.88 \times 10^{-12}\text{ N (หรือ } 2.88\text{ pN)}
    \end{equation*}
\end{enumerate}
\textbf{คำตอบ} ในตัวกลางน้ำ แรงดึงดูดทางไฟฟ้ามีค่าเท่ากับ $2.88 \times 10^{-12}\text{ N}$ ซึ่งยังมากพอที่จะยึดโมเลกุลสีย้อมประจุบวกให้ติดแน่นกับผนังเซลล์แบคทีเรีย
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Left box: Basic Dye (+)
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.1pt, rounded corners=6pt] (0,0) rectangle (6.6,4.2);
    \node[font=\bfseries\color{physRoyalBlue}] at (3.3,3.8) {(ก) การย้อมด้วยสีย้อมประจุบวก (Basic Dye)};
    \draw[fill=purple!45, draw=purple!80!black, line width=1.4pt, rounded corners=12pt] (1.6,1.4) rectangle (5.0,2.7);
    \node[font=\bfseries\color{white}] at (3.3,2.05) {ตัวเซลล์ติดสีม่วงเข้ม};
    \foreach \x in {1.9, 2.6, 3.3, 4.0, 4.7} {
        \node[font=\scriptsize\bfseries\color{crimsonAlert}] at (\x,2.88) {$-$};
        \node[font=\scriptsize\bfseries\color{crimsonAlert}] at (\x,1.22) {$-$};
    }
    \node[circle, fill=physRoyalBlue, text=white, inner sep=1.2pt, font=\scriptsize\bfseries] (cv1) at (1.1,3.2) {$\text{CV}^+$};
    \node[circle, fill=physRoyalBlue, text=white, inner sep=1.2pt, font=\scriptsize\bfseries] (cv2) at (5.5,3.2) {$\text{CV}^+$};
    \draw[->, line width=1.1pt, bioEmerald!85!black] (cv1) -- (1.75,2.75);
    \draw[->, line width=1.1pt, bioEmerald!85!black] (cv2) -- (4.85,2.75);
    \node[font=\footnotesize\bfseries\color{bioEmerald!85!black}] at (3.3,0.45) {แรงคูลอมบ์ดึงดูด ($-$ ดึงดูด $+$)};

    % Right box: Acidic Dye (-)
    \draw[fill=charcoal!85, draw=charcoal, line width=1.1pt, rounded corners=6pt] (7.4,0) rectangle (14.0,4.2);
    \node[font=\bfseries\color{physAmber}] at (10.7,3.8) {(ข) การย้อมสีพื้นหลังแบบลบ (Negative Stain)};
    \draw[fill=white, draw=charcoal!60, line width=1.4pt, rounded corners=12pt] (9.0,1.4) rectangle (12.4,2.7);
    \node[font=\bfseries\color{charcoal}] at (10.7,2.05) {ตัวเซลล์ใสสว่าง};
    \foreach \x in {9.3, 10.0, 10.7, 11.4, 12.1} {
        \node[font=\scriptsize\bfseries\color{crimsonAlert}] at (\x,2.88) {$-$};
        \node[font=\scriptsize\bfseries\color{crimsonAlert}] at (\x,1.22) {$-$};
    }
    \node[circle, fill=crimsonAlert, text=white, inner sep=1.2pt, font=\scriptsize\bfseries] (ng1) at (8.3,2.8) {$\text{Nig}^-$};
    \node[circle, fill=crimsonAlert, text=white, inner sep=1.2pt, font=\scriptsize\bfseries] (ng2) at (13.1,2.8) {$\text{Nig}^-$};
    \draw[->, line width=1.1pt, physAmber] (8.85,2.6) -- (8.1,3.25);
    \draw[->, line width=1.1pt, physAmber] (12.55,2.6) -- (13.3,3.25);
    \node[font=\footnotesize\bfseries\color{physAmber}] at (10.7,0.45) {แรงคูลอมบ์ผลักออก ($-$ ผลัก $-$)};
\end{tikzpicture}%
}
\caption{เปรียบเทียบกลไกแรงไฟฟ้าสถิตระหว่างผิวเซลล์แบคทีเรียประจุลบกับ (ก) สีย้อมประจุบวก และ (ข) สีย้อมประจุลบ}
\label{fig:lab07_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item ชุดอิเล็กโทรสโคปแผ่นโลหะพร้อมแท่งพีวีซี แท่งอะคริลิกใส และผ้าสักหลาด จำนวน $1$ ชุด
    \item แผ่นกระดาษกรองเซลลูโลส (จำลองพื้นผิวประจุลบ) และสไลด์แก้วสะอาด จำนวน $4$ แผ่น
    \item สารละลายสีย้อมประจุบวก เมทิลีนบลู ($0.1\%$ Methylene Blue) และคริสตัลไวโอเลต จำนวนอย่างละ $1$ ขวดหยด
    \item สารละลายสีย้อมประจุลบ อีโอซิน ($1\%$ Eosin Y) และหมึกอินเดีย/นิกโรซิน จำนวนอย่างละ $1$ ขวดหยด
    \item สไลด์ตัวอย่างเซลล์ยีสต์ \textit{Saccharomyces cerevisiae} และกล้องจุลทรรศน์แบบใช้แสง จำนวน $1$ ชุด
\end{enumerate}
\end{equipbox}

\begin{warningbox}
สวมถุงมือยางตลอดเวลาที่หยดสารละลายสีย้อมเพื่อป้องกันสีย้อมประจุบวกย้อมติดผิวหนัง และเทน้ำล้างสไลด์ลงในขวดรวบรวมของเสียสีย้อมที่จัดเตรียมไว้ ห้ามเทลงท่อน้ำทิ้งโดยตรง
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การทดสอบแรงกระทำระหว่างประจุไฟฟ้าด้วยอิเล็กโทรสโคป}\quad นำแท่งพีวีซีถูกับผ้าสักหลาดแล้วจ่อใกล้จานโลหะของอิเล็กโทรสโคป สังเกตการกางออกของแผ่นโลหะบาง จากนั้นทดสอบแรงผลักและแรงดึงดูดระหว่างแท่งพีวีซีกับแท่งอะคริลิกที่ถูด้วยผ้าไหม บันทึกผลใน\mbox{ตารางที่} 7.1
    \item \textbf{ตอนที่ 2 การเปรียบเทียบการยึดเกาะของสีย้อมประจุบวกและประจุลบบนพื้นผิวประจุลบ}\quad หยดสีย้อมเมทิลีนบลู (ประจุบวก) และอีโอซิน (ประจุลบ) ลงบนแผ่นเซลลูโลสที่มีประจุลบในปริมาณเท่ากัน ($20\ \mu\text{L}$) ทิ้งไว้ $2$ นาที แล้วล้างด้วยน้ำกลั่นไหลผ่านเบาๆ นาน $30$ วินาที สังเกตความเข้มของสีที่หลงเหลืออยู่
    \item \textbf{ตอนที่ 3 การส่องเปรียบเทียบ Simple Staining และ Negative Staining ของเซลล์ยีสต์}\quad หยดสารแขวนลอยยีสต์ลงบนสไลด์ 2 แผ่น แผ่นที่ 1 ย้อมด้วยเมทิลีนบลู (ประจุบวก) และแผ่นที่ 2 ผสมกับนิกโรซิน (ประจุลบ) แล้วไถสไลด์ให้บาง นำไปส่องด้วยกล้องจุลทรรศน์กำลังขยาย $400\times$ บันทึกลักษณะสีของตัวเซลล์และพื้นหลังลงใน\mbox{ตารางที่} 7.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 7\quad ไฟฟ้าสถิตและกลไกของสีย้อมเซลล์จุลินทรีย์]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 7.1\quad ผลการทดสอบแรงกระทำทางไฟฟ้าสถิตและการชะล้างสีย้อมบนพื้นผิวประจุลบ}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{4.2cm} c >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}
\toprule
\textbf{ชุดการทดลอง} & \textbf{ชนิดประจุ} & \textbf{ผลที่สังเกตได้ (ดึงดูด/ผลัก/การติดสี)} & \textbf{คำอธิบายตามกฎของคูลอมบ์} \\
\midrule
1. แท่งพีวีซี 2 แท่งที่ถูผ้าสักหลาดแล้วนำมาเข้าใกล้กัน & $(-)$ กับ $(-)$ & \dotfill & \dotfill \\[6pt]
2. แท่งพีวีซีถูผ้าสักหลาด เข้าใกล้แท่งอะคริลิกถูผ้าไหม & $(-)$ กับ $(+)$ & \dotfill & \dotfill \\[6pt]
3. หยด Methylene Blue บนแผ่นประจุลบแล้วล้างน้ำ & ผิว $(-)$ สี $(+)$ & \dotfill & \dotfill \\[6pt]
4. หยด Eosin Y บนแผ่นประจุลบแล้วล้างน้ำกลั่น & ผิว $(-)$ สี $(-)$ & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 7.2\quad ผลการสังเกตเซลล์ยีสต์ภายใต้กล้องจุลทรรศน์ ($400\times$) ด้วยสีย้อมต่างชนิดประจุ}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{3.8cm} c >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X >{\raggedright\arraybackslash}X}
\toprule
\textbf{ชนิดของสีย้อมที่ใช้} & \textbf{ประจุของไอออนสี} & \textbf{สีของตัวเซลล์ยีสต์} & \textbf{สีของพื้นหลังสไลด์} & \textbf{ประเภทการย้อม (Simple / Negative)} \\
\midrule
เมทิลีนบลู (Methylene Blue) & ประจุบวก $(+)$ & \dotfill & \dotfill & \dotfill \\[8pt]
นิกโรซิน (Nigrosin) & ประจุลบ $(-)$ & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item เพราะเหตุใดผนังเซลล์ของแบคทีเรียและยีสต์ในสภาวะค่า $\text{pH}$ เป็นกลาง ($\text{pH} \approx 7.0$) จึงมีประจุไฟฟ้าสุทธิเป็นลบ และประจุลบนี้เกิดจากหมู่ฟังก์ชันทางเคมีใดเป็นหลัก
    \item หากนักศึกษาต้องการตรวจสอบว่าแบคทีเรียสายพันธุ์หนึ่งสร้างแคปซูล (Capsule) หุ้มเซลล์หรือไม่ เหตุใดจึงนิยมใช้เทคนิคการย้อมสีพื้นหลังแบบลบด้วยสีนิกโรซินควบคู่กับการย้อมสีตัวเซลล์ แทนการย้อมสีแบบธรรมดาเพียงอย่างเดียว
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab07_electrostatics_cell_staining.tex"), "w", encoding="utf-8") as f:
    f.write(lab07)

# ==============================================================================
# LAB 8: กฎของโอห์มและแบบจำลองการแยกโมเลกุลด้วย Gel Electrophoresis
# ==============================================================================
lab08 = r"""\chapter{กฎของโอห์มและแบบจำลองการแยกโมเลกุลด้วย Gel Electrophoresis}

\begin{planbox}[สัปดาห์ที่ 9 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO2 และ CLO3)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item วัดค่าความต่างศักย์ไฟฟ้า ($V$) กระแสไฟฟ้า ($I$) และความต้านทานไฟฟ้า ($R$) ของสารละลายบัฟเฟอร์ที่ความเข้มข้นต่างกันเพื่อพิสูจน์กฎของโอห์ม ($V = IR$)
    \item คำนวณกำลังไฟฟ้าความร้อนจูล ($P = IV = V^2/R$) และอธิบายสาเหตุของการเกิดความร้อนสูงเกินไปในอ่างรันเจลเมื่อเตรียมบัฟเฟอร์เข้มข้นผิดพลาด
    \item ปฏิบัติการแยกโมเลกุลสีย้อมมาตรฐานที่มีประจุและขนาดโมเลกุลต่างกันในเจลอะกาโรสภายใต้สนามไฟฟ้ากระแสตรง (หลักการ Run to Red)
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายกฎของโอห์ม กำลังไฟฟ้า และแรงที่สนามไฟฟ้ากระทำต่อโมเลกุลที่มีประจุได้
    \item \textbf{CLO2 (PLO2, PLO3)}\quad ประยุกต์ใช้หลักการทางไฟฟ้าวิเคราะห์และแก้ไขปัญหาแถบดีเอ็นเอเบี้ยวหรือเจลละลายในเครื่อง Gel Electrophoresis ได้
    \item \textbf{CLO3 (PLO1)}\quad ปฏิบัติตามกฎความปลอดภัยด้านไฟฟ้ากระแสตรงแรงดันสูงอย่างเคร่งครัด
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

เมื่อป้อนความต่างศักย์ไฟฟ้ากระแสตรง $V$ (หน่วยโวลต์, $\text{V}$) คร่อมขั้วอิเล็กโทรดทั้งสองของอ่างรันเจลที่มีสารละลายบัฟเฟอร์ (เช่น $1\times\text{ TAE}$ หรือ $1\times\text{ TBE}$) กระแสไฟฟ้า $I$ (หน่วยแอมแปร์, $\text{A}$) ที่ไหลผ่านบัฟเฟอร์จะแปรผันตรงกับความต่างศักย์และแปรผกผันกับความต้านทานไฟฟ้า $R$ (หน่วยโอห์ม, $\Omega$) ตาม\textbf{กฎของโอห์ม} (\textbf{Ohm's Law})\index{กฎของโอห์ม (Ohm's Law)} ดังสมการที่ \eqref{eq:lab08_ohm} และเกิดความร้อนจูลในอ่างเจลตามสมการกำลังไฟฟ้า $P$

\begin{equation}
    V = I R \qquad \text{และ} \qquad P = I V = I^2 R = \frac{V^2}{R}
    \label{eq:lab08_ohm}
\end{equation}

ในเทคนิค \textbf{Gel Electrophoresis}\index{เจลอิเล็กโทรโฟรีซิส (Gel Electrophoresis)} โครงสร้างสายดีเอ็นเอ (DNA) มีหมู่ฟอสเฟตทำให้มีประจุสุทธิเป็น\textbf{ลบ ($-$)} อย่างสม่ำเสมอ ดังนั้นต้องหยอดตัวอย่างลงในหลุมเจลฝั่ง\textbf{ขั้วลบ (Cathode — สายสีดำ)} เพื่อให้สนามไฟฟ้า $E = V/d$ ขับเคลื่อนโมเลกุลประจุลบให้วิ่งมุ่งหน้าไปหา\textbf{ขั้วบวก (Anode — สายสีแดง)} ตามหลักจำสั้นๆ ว่า \textbf{Run to Red} โดยโมเลกุลที่มีขนาดเล็กจะแทรกตัวผ่านรูพรุนของเจลอะกาโรสได้เร็วกว่าและเคลื่อนที่ได้ระยะทางไกลกว่าโมเลกุลขนาดใหญ่

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 8]
\begin{itemize}
    \item \textbf{ความต้านทานไฟฟ้าของอ่างเจล}\quad $R = \dfrac{V}{I}$ (ใช้หน่วย $I$ เป็น $\text{A}$ โดย $1\text{ mA} = 0.001\text{ A}$)
    \item \textbf{กำลังไฟฟ้าความร้อนที่เกิดขึ้นในอ่างเจล}\quad $P = I \times V$ (หน่วยเป็นวัตต์, $\text{W}$)
    \item \textbf{อัตราเร็วการเคลื่อนที่เฉลี่ยของแถบสีในเจล}\quad $v = \dfrac{d\text{ (mm)}}{t\text{ (min)}}$
\end{itemize}
\end{conceptbox}

\begin{worked}[การคำนวณความต้านทานและกำลังความร้อนของอ่างรันเจลอะกาโรส]
\textbf{โจทย์} ในการรันเจลอะกาโรสด้วยบัฟเฟอร์ $1\times\text{ TAE}$ เมื่อตั้งแหล่งจ่ายไฟที่ความต่างศักย์คงที่ $V = 100\text{ V}$ อ่านค่ากระแสไฟฟ้าได้ $I = 50\text{ mA}$ ($0.050\text{ A}$) จงคำนวณหาความต้านทานไฟฟ้า $R$ และกำลังไฟฟ้าความร้อน $P$ ที่เกิดขึ้นในอ่างเจล (และเปรียบเทียบหากนักศึกษาเผลอใช้บัฟเฟอร์ $10\times\text{ TAE}$ ที่ทำให้กระแสพุ่งสูงเป็น $500\text{ mA}$)

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item คำนวณความต้านทานไฟฟ้า $R$ และกำลังไฟฟ้า $P$ ของบัฟเฟอร์ $1\times\text{ TAE}$ ปกติ
    \begin{equation*}
        R_{1\times} = \frac{100}{0.050} = 2{,}000\ \Omega, \qquad P_{1\times} = 0.050 \times 100 = 5.0\text{ W}
    \end{equation*}
    \item หากเผลอใช้บัฟเฟอร์เข้มข้น $10\times\text{ TAE}$ ($I = 0.50\text{ A}$) กำลังความร้อนจะเพิ่มขึ้นเป็น $P_{10\times} = 0.50 \times 100 = 50.0\text{ W}$ (ร้อนขึ้น $10$ เท่า ทำให้เจลอะกาโรสละลาย!)
\end{enumerate}
\textbf{คำตอบ} สภาวะปกติมีความต้านทาน $2{,}000\ \Omega$ และเกิดกำลังความร้อนเพียง $5.0\text{ W}$
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Gel tank
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=5pt] (0,0) rectangle (11.5,3.8);
    % Gel slab
    \draw[fill=white, draw=physRoyalBlue!70, line width=1pt, rounded corners=3pt] (1.6,0.5) rectangle (9.9,3.3);
    % Cathode (-) left
    \draw[line width=2.5pt, charcoal] (0.8,0.4) -- (0.8,3.4);
    \node[fill=charcoal, text=white, font=\bfseries\footnotesize, rounded corners=2pt, inner sep=3pt] at (0.8,4.15) {ขั้วลบ Cathode ($-$ สีดำ)};
    % Anode (+) right
    \draw[line width=2.5pt, crimsonAlert] (10.7,0.4) -- (10.7,3.4);
    \node[fill=crimsonAlert, text=white, font=\bfseries\footnotesize, rounded corners=2pt, inner sep=3pt] at (10.7,4.15) {ขั้วบวก Anode ($+$ สีแดง)};

    % Wells
    \foreach \y in {1.0, 1.9, 2.8} {
        \draw[fill=charcoal!25, draw=charcoal] (2.2,\y-0.2) rectangle (2.5,\y+0.2);
    }
    \node[font=\scriptsize\bfseries, above] at (2.35,3.3) {หลุมหยอดตัวอย่าง};

    % Bands migrating
    % Lane 1: Large molecule (slow) & small molecule (fast)
    \fill[purple!80, rounded corners=1pt] (4.3,2.62) rectangle (4.65,2.98);
    \node[font=\scriptsize, above] at (4.48,3.0) {โมเลกุลใหญ่ ($v$ ช้า)};
    \fill[cyan!80!blue, rounded corners=1pt] (7.8,2.62) rectangle (8.15,2.98);
    \node[font=\scriptsize, above] at (7.98,3.0) {โมเลกุลเล็ก ($v$ เร็ว)};

    % Lane 2
    \fill[physAmber!90!orange, rounded corners=1pt] (6.1,1.72) rectangle (6.45,2.08);

    % Lane 3: Positively charged dye moving backward!
    \fill[bioEmerald, rounded corners=1pt] (1.75,0.82) rectangle (2.05,1.18);
    \node[font=\scriptsize\color{bioEmerald!85!black}, right] at (2.7,1.0) {สีย้อมประจุบวกวิ่งย้อนไปขั้วลบ};

    % Direction arrow
    \draw[->, line width=1.6pt, crimsonAlert] (3.2,0.22) -- (8.5,0.22) node[midway, fill=boxBlueBg, inner sep=2pt, font=\footnotesize\bfseries] {ทิศทางการเคลื่อนที่ของ DNA / สีย้อมประจุลบ (Run to Red)};
\end{tikzpicture}%
}
\caption{แผนผังการจัดวางอ่างเจลอะกาโรส ขั้วไฟฟ้า และการแยกตัวของโมเลกุลตามประจุและขนาดภายใต้สนามไฟฟ้า}
\label{fig:lab08_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item ชุดอ่างรันเจลอิเล็กโทรโฟรีซิส (Horizontal Gel Box) พร้อมแหล่งจ่ายไฟกระแสตรง (DC Power Supply) จำนวน $1$ ชุด
    \item แผ่นเจลอะกาโรสความเข้มข้น $1.0\%$ ที่มีหลุมหยอดตัวอย่างตรงกลาง และสารละลายบัฟเฟอร์ $0.5\times\text{ TBE}$ และ $1\times\text{ TBE}$
    \item สารละลายสีย้อมมาตรฐานผสมกลีเซอรอล 3 ชนิด ได้แก่ โบรโมฟีนอลบลู (ประจุลบ โมเลกุลเล็ก), ไซลีนไซทานอล (ประจุลบ โมเลกุลใหญ่) และเมทิลีนบลู (ประจุบวก)
    \item ไมโครปิเปตขนาด P20 พร้อมทิป และไม้บรรทัดมิลลิเมตร จำนวน $1$ ชุด
\end{enumerate}
\end{equipbox}

\begin{warningbox}
ห้ามเปิดฝาครอบอ่างเจลหรือจุ่มนิ้วลงในบัฟเฟอร์ขณะที่แหล่งจ่ายไฟกำลังทำงานอยู่โดยเด็ดขาด ต้องกดปุ่มปิดสวิตช์ (OFF) และถอดปลั๊กขั้วสายไฟก่อนเปิดฝาครอบอ่างเจลทุกครั้ง
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การทดสอบกฎของโอห์มและกำลังความร้อนของสารละลายบัฟเฟอร์}\quad เทสารละลายบัฟเฟอร์ $1\times\text{ TBE}$ ลงในอ่างทดสอบ ปิดฝาครอบแล้วปรับแรงดันไฟฟ้าที่ $50\text{ V}$, $80\text{ V}$ และ $100\text{ V}$ อ่านค่ากระแสไฟฟ้า $I$ ($\text{mA}$) ที่หน้าจอแหล่งจ่ายไฟ คำนวณค่าความต้านทาน $R$ และกำลังความร้อน $P$ บันทึกใน\mbox{ตารางที่} 8.1
    \item \textbf{ตอนที่ 2 การแยกโมเลกุลสีย้อมด้วย Gel Electrophoresis}\quad ใช้ไมโครปิเปต P20 ดูดตัวอย่างสีย้อมทั้ง 3 ชนิด ปริมาตร $10\ \mu\text{L}$ หยอดลงในหลุมเจลอะกาโรส ปิดฝาครอบโดยต่อสายสีดำเข้าขั้วลบและสายสีแดงเข้าขั้วบวก รันเจลที่ความต่างศักย์ $100\text{ V}$ เป็นเวลา $20$ นาที แล้ววัดระยะทางและทิศทางที่แถบสีแต่ละชนิดเคลื่อนที่ได้ใน\mbox{ตารางที่} 8.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 8\quad กฎของโอห์มและแบบจำลอง Gel Electrophoresis]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 8.1\quad ผลการวัดกระแสไฟฟ้า ความต้านทาน และกำลังความร้อนในอ่างรันเจลตามกฎของโอห์ม}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{4.0cm} c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{สภาวะในอ่างบัฟเฟอร์} & \textbf{แรงดัน $V$} & \textbf{กระแส (mA)} & \textbf{กระแส (A)} & \textbf{ความต้านทาน $R$ ($\Omega$) และกำลัง $P$ (W)} \\
\midrule
1. บัฟเฟอร์ $1\times\text{ TBE}$ แรงดันต่ำ & $50\text{ V}$ & ........ & ........ & $R =$ \dotfill / $P =$ \dotfill \\[6pt]
2. บัฟเฟอร์ $1\times\text{ TBE}$ แรงดันกลาง & $80\text{ V}$ & ........ & ........ & $R =$ \dotfill / $P =$ \dotfill \\[6pt]
3. บัฟเฟอร์ $1\times\text{ TBE}$ มาตรฐาน & $100\text{ V}$ & ........ & ........ & $R =$ \dotfill / $P =$ \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 8.2\quad ผลการเคลื่อนที่ของโมเลกุลสีย้อมในเจลอะกาโรสเมื่อรันที่ $100\text{ V}$ นาน $20\text{ min}$}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{4.0cm} c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ชนิดของตัวอย่างสีย้อม} & \textbf{มวลโมเลกุล} & \textbf{ขั้วที่วิ่งไปหา} & \textbf{ระยะ $d$ (mm)} & \textbf{อัตราเร็ว $v$ (mm/min)} \\
\midrule
1. โบรโมฟีนอลบลู (Bromophenol Blue) & $670\text{ Da}$ & ........ & ........ & \dotfill \\[6pt]
2. ไซลีนไซทานอล (Xylene Cyanol) & $538\text{ Da}$ & ........ & ........ & \dotfill \\[6pt]
3. เมทิลีนบลู (Methylene Blue) & $320\text{ Da}$ & ........ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item หากนักศึกษาเผลอใช้น้ำกลั่นบริสุทธิ์ (Deionized Water) เติมลงในอ่างรันเจลแทนสารละลายบัฟเฟอร์ TAE/TBE จะเกิดอะไรขึ้นกับค่าความต้านทานไฟฟ้า $R$ กระแสไฟฟ้า $I$ และการเคลื่อนที่ของแถบดีเอ็นเอ เพราะเหตุใด
    \item เพราะเหตุใดในการเตรียมตัวอย่างดีเอ็นเอก่อนหยอดลงหลุมเจล จึงต้องผสมสารละลาย Loading Dye ที่มีกลีเซอรอล (Glycerol) หรือซูโครสความหนาแน่นสูงเข้าไปด้วยเสมอ (เชื่อมโยงกับความรู้เรื่องความหนาแน่นในปฏิบัติการที่ 3)
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab08_ohm_gel_electrophoresis.tex"), "w", encoding="utf-8") as f:
    f.write(lab08)

# ==============================================================================
# LAB 9: การสะท้อน การหักเหของแสง และการวัดค่าบริกซ์ของกระบวนการหมักด้วยเครื่อง Refractometer
# ==============================================================================
lab09 = r"""\chapter{การสะท้อน การหักเหของแสง และการวัดค่าบริกซ์ของกระบวนการหมักด้วยเครื่อง Refractometer}

\begin{planbox}[สัปดาห์ที่ 10 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO3 และ CLO4)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item ทดสอบกฎการสะท้อนของแสงและกฎการหักเหของสเนลล์ ($n_1\sin\theta_1 = n_2\sin\theta_2$) เพื่อหาค่าดัชนีหักเหของแท่งอะคริลิกใสและสารละลายน้ำตาล
    \item ใช้เครื่องวัดดัชนีหักเหแบบพกพา (Hand Refractometer) วัดค่าองศาบริกซ์ ($^\circ\text{Brix}$) ของสารละลายน้ำตาลมาตรฐานและน้ำหมักยีสต์ที่เวลาการหมักต่างๆ
    \item สร้างกราฟความสัมพันธ์ระหว่างความเข้มข้นของน้ำตาล ($^\circ\text{Brix}$) กับค่าดัชนีหักเห ($n$) เพื่อประเมินอัตราการใช้น้ำตาลของเชื้อยีสต์ \textit{Saccharomyces cerevisiae}
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายกฎของสเนลล์ ดัชนีหักเหของแสง และหลักการมุมวิกฤตในเครื่อง Refractometer ได้
    \item \textbf{CLO3 (PLO1)}\quad ปฏิบัติการด้วยเลเซอร์อย่างปลอดภัยและดูแลรักษาผิวปริซึมของเครื่อง Refractometer อย่างถูกวิธี
    \item \textbf{CLO4 (PLO5, PLO6)}\quad บันทึกข้อมูล วาดกราฟแนวโน้มการหมัก และสื่อสารผลในรายงานกลุ่มได้ชัดเจน
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

เมื่อลำแสงเดินทางจากตัวกลางที่ 1 ที่มีดัชนีหักเห $n_1$ เข้าสู่ตัวกลางที่ 2 ที่มีดัชนีหักเห $n_2$ ด้วยมุมตกกระทบ $\theta_1$ ลำแสงจะเบนทิศทางเกิดเป็นมุมหักเห $\theta_2$ ตาม\textbf{กฎของสเนลล์} (\textbf{Snell's Law})\index{กฎของสเนลล์ (Snell's Law)} ดังสมการที่ \eqref{eq:lab09_snell}

\begin{equation}
    n_1 \sin\theta_1 = n_2 \sin\theta_2 \qquad \text{โดยที่} \qquad n = \frac{c}{v}
    \label{eq:lab09_snell}
\end{equation}

ในงานจุลชีววิทยาอุตสาหกรรมและเทคโนโลยีการหมัก (เช่น การหมักไวน์ เบียร์ หรือเอทานอลด้วยเชื้อยีสต์) ความเข้มข้นของน้ำตาลที่ละลายอยู่ในน้ำหมักจะแปรผันตรงกับค่าดัชนีหักเหของแสง $n$ เครื่อง \textbf{Hand Refractometer}\index{รีแฟรกโตมิเตอร์ (Refractometer)} ใช้หลักการหามุมวิกฤตของการสะท้อนกลับหมดที่ผิวรอยต่อระหว่างปริซึมแก้วกับหยดสารละลายตัวอย่าง แล้วแสดงผลออกมาเป็นเส้นแบ่งเขตมืด--สว่างบนสเกลหน่วย\textbf{องศาบริกซ์} ($^\circ\text{Brix}$ ซึ่งหมายถึงกรัมของน้ำตาลซูโครสในสารละลาย $100\text{ g}$) เมื่อยีสต์ย่อยสลายน้ำตาลไปเป็นแอลกอฮอล์และแก๊สคาร์บอนไดออกไซด์ ค่า $^\circ\text{Brix}$ และดัชนีหักเห $n$ ของน้ำหมักจะลดลงตามเวลาอย่างต่อเนื่อง

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 9]
\begin{itemize}
    \item \textbf{การหาค่าดัชนีหักเหของตัวกลางจากมุมตกกระทบในอากาศ ($n_1 = 1.000$)}
    \begin{equation*}
        n_2 = \frac{\sin\theta_1}{\sin\theta_2}
    \end{equation*}
    \item \textbf{ความสัมพันธ์เชิงเส้นโดยประมาณระหว่างดัชนีหักเห $n$ กับค่าบริกซ์ $B$ ($^\circ\text{Brix}$) ที่ $20\,^\circ\text{C}$}
    \begin{equation*}
        n \approx 1.3330 + (0.00143 \times B)
    \end{equation*}
\end{itemize}
\end{conceptbox}

\begin{worked}[การคำนวณดัชนีหักเหของอาหารเลี้ยงเชื้อเหลวด้วยกฎของสเนลล์]
\textbf{โจทย์} เมื่อฉายลำแสงเลเซอร์จากอากาศ ($n_1 = 1.000$) ตกกระทบผิวสารละลายน้ำตาลเข้มข้น $20\,^\circ\text{Brix}$ ด้วยมุมตกกระทบ $\theta_1 = 45^\circ$ ($\sin 45^\circ = 0.7071$) วัดมุมหักเหในสารละลายได้ $\theta_2 = 31.3^\circ$ ($\sin 31.3^\circ = 0.5195$) จงคำนวณค่าดัชนีหักเห $n_2$ ของสารละลายน้ำตาลนี้

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item แทนค่า $\sin\theta_1 = 0.7071$ และ $\sin\theta_2 = 0.5195$ ลงในสูตรกฎของสเนลล์
    \begin{equation*}
        n_2 = \frac{\sin\theta_1}{\sin\theta_2} = \frac{0.7071}{0.5195} = 1.361
    \end{equation*}
\end{enumerate}
\textbf{คำตอบ} สารละลายน้ำตาลมีค่าดัชนีหักเหเท่ากับ $1.361$ (สอดคล้องกับค่าจากตารางมาตรฐานที่ $20\,^\circ\text{Brix}$ ซึ่งมีค่า $n \approx 1.3616$)
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Left: Snell's law
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1pt] (0,0) rectangle (6.2,2.1);
    \draw[fill=white, draw=physRoyalBlue, line width=1pt] (0,2.1) rectangle (6.2,4.2);
    \draw[dashed, line width=1pt, charcoal] (3.1,0.2) -- (3.1,4.0) node[above, font=\scriptsize\bfseries] {เส้นแนวฉาก};
    \draw[->, line width=1.6pt, crimsonAlert] (1.1,3.9) -- (3.1,2.1);
    \draw[->, line width=1.6pt, crimsonAlert] (3.1,2.1) -- (4.3,0.3);
    \node[font=\footnotesize\bfseries] at (1.3,2.5) {อากาศ $n_1=1.00$};
    \node[font=\footnotesize\bfseries\color{physRoyalBlue}] at (1.6,0.5) {น้ำหมักน้ำตาล $n_2$};
    \node[font=\footnotesize\bfseries] at (2.65,3.1) {$\theta_1$};
    \node[font=\footnotesize\bfseries] at (3.45,1.1) {$\theta_2$};

    % Right: Hand Refractometer & Brix scale
    \draw[fill=softSmoke, draw=charcoal, line width=1.1pt, rounded corners=4pt] (7.2,1.5) rectangle (10.6,2.5);
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.1pt] (10.6,1.6) -- (11.7,2.4) -- (11.7,1.5) -- cycle;
    \node[font=\footnotesize\bfseries] at (8.9,2.0) {Hand Refractometer};
    \node[font=\scriptsize\bfseries\color{physRoyalBlue}, above] at (11.2,2.45) {หยดน้ำหมัก $2$ หยด};

    % Circular Brix field of view
    \begin{scope}[shift={(13.4,2.1)}]
        \clip (0,0) circle (1.45cm);
        \fill[white] (-1.5,-1.5) rectangle (1.5,0.2);
        \fill[physRoyalBlue!75] (-1.5,0.2) rectangle (1.5,1.5);
        \draw[line width=1.2pt, crimsonAlert] (-1.5,0.2) -- (1.5,0.2);
    \end{scope}
    \draw[line width=1.3pt, charcoal] (13.4,2.1) circle (1.45cm);
    \draw[line width=0.8pt] (13.4,0.85) -- (13.4,3.35);
    \foreach \y/\val in {1.1/0, 1.6/10, 2.1/16, 2.6/20, 3.1/30} {
        \draw (13.25,\y) -- (13.55,\y);
        \node[right, font=\scriptsize\bfseries] at (13.55,\y) {\val};
    }
    \node[font=\scriptsize\bfseries\color{crimsonAlert}, below] at (13.4,0.55) {อ่านค่าได้ $16.0\,^\circ\text{Brix}$};
\end{tikzpicture}%
}
\caption{การหักเหของลำแสงเลเซอร์ตามกฎของสเนลล์ (ซ้าย) และการอ่านเส้นแบ่งเขตมืด--สว่างในเครื่อง Hand Refractometer (ขวา)}
\label{fig:lab09_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item ชุดกล่องแสงเลเซอร์พร้อมจานวัดมุม $360^\circ$ และถ้วยครึ่งวงกลมใส จำนวน $1$ ชุด
    \item เครื่องวัดความหวานแบบส่องกล้อง (Hand Refractometer ช่วง $0\text{--}32\,^\circ\text{Brix}$) จำนวน $1$ เครื่อง
    \item สารละลายน้ำตาลซูโครสมาตรฐานความเข้มข้น $0\%$, $10\%$ และ $20\%$ (w/w)
    \item ตัวอย่างน้ำหมักยีสต์ (\textit{Saccharomyces cerevisiae}) ที่ระยะเวลาการหมัก $0$, $24$, $48$ และ $72$ ชั่วโมง
\end{enumerate}
\end{equipbox}

\begin{warningbox}
ห้ามฉายลำแสงเลเซอร์เข้าสู่ดวงตาของตนเองหรือผู้อื่นโดยเด็ดขาด และในการทำความสะอาดหน้าปริซึมของเครื่อง Refractometer ให้ใช้น้ำกลั่นหยดและซับด้วยกระดาษเช็ดเลนส์เบาๆ เท่านั้น ห้ามใช้เล็บหรือวัสดุแข็งขูดผิวปริซึม
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การหาดัชนีหักเหด้วยกฎของสเนลล์}\quad เทน้ำกลั่นและสารละลายน้ำตาล $20\%$ ลงในถ้วยครึ่งวงกลม ฉายแสงเลเซอร์ด้วยมุมตกกระทบ $\theta_1 = 30^\circ$ และ $45^\circ$ อ่านค่ามุมหักเห $\theta_2$ และคำนวณค่าดัชนีหักเห $n_2$ บันทึกใน\mbox{ตารางที่} 9.1
    \item \textbf{ตอนที่ 2 การติดตามกระบวนการหมักของยีสต์ด้วยเครื่อง Hand Refractometer}\quad ปรับเทียบศูนย์ (Zero Calibration) ของเครื่อง Refractometer ด้วยน้ำกลั่น ($0.0\,^\circ\text{Brix}$) จากนั้นวัดค่าองศาบริกซ์ของตัวอย่างน้ำหมักยีสต์ที่เวลา $0, 24, 48$ และ $72$ ชั่วโมง คำนวณค่าดัชนีหักเห $n$ และอัตราการลดลงของน้ำตาล บันทึกใน\mbox{ตารางที่} 9.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 9\quad การหักเหของแสงและการวัดค่าบริกซ์ของน้ำหมักจุลินทรีย์]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 9.1\quad ผลการวัดมุมหักเหและคำนวณค่าดัชนีหักเหตามกฎของสเนลล์}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ชนิดของตัวกลางที่ 2} & \textbf{มุม $\theta_1$} & \textbf{ค่า $\sin\theta_1$} & \textbf{มุมหักเห $\theta_2$} & \textbf{ค่า $\sin\theta_2$} & \textbf{ดัชนีหักเห $n_2 = \sin\theta_1/\sin\theta_2$} \\
\midrule
1. น้ำกลั่นบริสุทธิ์ & $30^\circ$ & $0.5000$ & \dotfill & \dotfill & \dotfill \\[6pt]
2. น้ำกลั่นบริสุทธิ์ & $45^\circ$ & $0.7071$ & \dotfill & \dotfill & \dotfill \\[6pt]
3. สารละลายน้ำตาล $20\%$ & $45^\circ$ & $0.7071$ & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 9.2\quad ผลการวัดค่าองศาบริกซ์ ($^\circ\text{Brix}$) ของน้ำหมักยีสต์ด้วยเครื่อง Hand Refractometer}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c c}
\toprule
\textbf{ระยะเวลาการหมักยีสต์ (ชั่วโมง)} & \textbf{ครั้งที่ 1 ($^\circ\text{Brix}$)} & \textbf{ครั้งที่ 2 ($^\circ\text{Brix}$)} & \textbf{ค่าเฉลี่ย $B$ ($^\circ\text{Brix}$)} & \textbf{ค่าดัชนีหักเหคำนวณ $n$} \\
\midrule
ชั่วโมงที่ $0$ (เริ่มต้นหมัก) & \dotfill & \dotfill & \dotfill & \dotfill \\[6pt]
ชั่วโมงที่ $24$ (หมักวันที่ 1) & \dotfill & \dotfill & \dotfill & \dotfill \\[6pt]
ชั่วโมงที่ $48$ (หมักวันที่ 2) & \dotfill & \dotfill & \dotfill & \dotfill \\[6pt]
ชั่วโมงที่ $72$ (หมักวันที่ 3) & \dotfill & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item เพราะเหตุใดเมื่อระยะเวลาการหมักของยีสต์เพิ่มขึ้นจาก $0$ ชั่วโมงไปเป็น $72$ ชั่วโมง ค่าองศาบริกซ์และดัชนีหักเหของน้ำหมักจึงลดลงอย่างต่อเนื่อง
    \item เหตุใดจึงต้องทำการหยดน้ำกลั่นเพื่อปรับตั้งค่าศูนย์ ($0.0\,^\circ\text{Brix}$) ของเครื่อง Hand Refractometer ทุกครั้งก่อนเริ่มวัดตัวอย่างจริง
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab09_refraction_brix_fermentation.tex"), "w", encoding="utf-8") as f:
    f.write(lab09)

# ==============================================================================
# LAB 10: เลนส์นูน กล้องจุลทรรศน์ และบทบาทของน้ำมันช่วยส่องที่หัวเลนส์ 100x
# ==============================================================================
lab10 = r"""\chapter{เลนส์นูน กล้องจุลทรรศน์ และบทบาทของน้ำมันช่วยส่องที่หัวเลนส์ 100x}

\begin{planbox}[สัปดาห์ที่ 11 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO2 และ CLO3)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item วัดความยาวโฟกัส ($f$) ของเลนส์นูนและพิสูจน์สมการเลนส์บาง ($1/f = 1/s + 1/s'$) พร้อมเข้าใจหลักการสร้างภาพของกล้องจุลทรรศน์เลนส์ประกอบ
    \item คำนวณกำลังขยายรวม ($M_{\text{total}}$) และขีดจำกัดการแยกชัดเชิงทฤษฎีของเอบเบอ ($d_{\min} = 0.61\lambda/\text{NA}$) สำหรับหัวเลนส์ใกล้วัตถุขนาด $4\times, 10\times, 40\times$ และ $100\times$
    \item ปฏิบัติการส่องสไลด์แบคทีเรียที่หัวเลนส์ $100\times$ (Oil Immersion) โดยเปรียบเทียบความคมชัดและปริมาณแสงระหว่างกรณีไม่หยดน้ำมันและกรณีหยดน้ำมันช่วยส่อง ($n = 1.515$)
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายสมการเลนส์บาง กำลังขยาย และสมการการแยกชัดของเอบเบอได้
    \item \textbf{CLO2 (PLO2, PLO3)}\quad อธิบายกลไกทางทัศนศาสตร์ของ Immersion Oil ที่ช่วยป้องกันการหักเหหนีออกของแสงและเพิ่มค่า NA ของหัวเลนส์ $100\times$ ได้อย่างถูกต้อง
    \item \textbf{CLO3 (PLO1)}\quad ปฏิบัติตามขั้นตอนการเช็ดทำความสะอาดน้ำมันออกจากหัวเลนส์ $100\times$ ด้วยกระดาษเช็ดเลนส์อย่างมีวินัย
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

กล้องจุลทรรศน์แบบใช้แสงเลนส์ประกอบ (\textbf{Compound Light Microscope})\index{กล้องจุลทรรศน์เลนส์ประกอบ} ประกอบด้วยเลนส์นูน 2 ชุดทำงานร่วมกัน ได้แก่ \textbf{เลนส์ใกล้วัตถุ} (Objective Lens กำลังขยาย $M_{\text{obj}}$) และ\textbf{เลนส์ใกล้ตา} (Ocular Lens กำลังขยาย $M_{\text{ocu}}$) แต่ปัจจัยที่สำคัญที่สุดในการส่องเห็นเซลล์แบคทีเรียขนาดเล็ก ($\sim 1\ \mu\text{m}$) ไม่ใช่เพียงกำลังขยาย แต่คือ \textbf{ขีดจำกัดการแยกชัด} (\textbf{Limit of Resolution}, $d_{\min}$)\index{ขีดจำกัดการแยกชัด (Limit of Resolution)} ตามสมการของเอบเบอดังสมการที่ \eqref{eq:lab10_abbe}

\begin{equation}
    M_{\text{total}} = M_{\text{obj}} \times M_{\text{ocu}} \qquad \text{และ} \qquad d_{\min} = \frac{0.61\,\lambda}{\text{NA}} = \frac{0.61\,\lambda}{n \sin\alpha}
    \label{eq:lab10_abbe}
\end{equation}

เมื่อ $\lambda$ คือความยาวคลื่นแสง (แสงสีเขียว $\lambda \approx 550\text{ nm} = 0.55\ \mu\text{m}$), $n$ คือดัชนีหักเหของตัวกลางระหว่างแผ่นสไลด์แก้วกับหน้าเลนส์ใกล้วัตถุ และ $\text{NA} = n\sin\alpha$ คือ \textbf{ค่ารูรับแสงเชิงตัวเลข} (\textbf{Numerical Aperture})\index{ค่ารูรับแสงเชิงตัวเลข (Numerical Aperture)} ค่ายิ่งมีค่า $d_{\min}$ น้อย ภาพยิ่งคมชัด ที่หัวเลนส์ $100\times$ หากปล่อยให้ช่องว่างเป็นอากาศ ($n = 1.00$) แสงที่ทะลุผ่านสไลด์แก้ว ($n = 1.52$) ออกมาจะเกิดการหักเหเบนหนีออกจากหน้าเลนส์และเกิดการสะท้อนกลับหมด แต่เมื่อหยด\textbf{น้ำมันช่วยส่อง} (\textbf{Immersion Oil}, $n = 1.515$)\index{น้ำมันช่วยส่อง (Immersion Oil)} ที่มีดัชนีหักเหเท่ากับแก้วลงไป แสงจะเดินทางเป็นเส้นตรงเข้าสู่หัวเลนส์ $100\times$ ได้อย่างสมบูรณ์ ทำให้ค่า $\text{NA}$ เพิ่มขึ้นถึง $1.25$ และแยกจุดที่อยู่ใกล้กันถึง $0.27\ \mu\text{m}$ ได้อย่างชัดเจน

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 10]
\begin{itemize}
    \item \textbf{สมการเลนส์บาง}\quad $\dfrac{1}{f} = \dfrac{1}{s} + \dfrac{1}{s'}$ หรือคำนวณทางลัด $f = \dfrac{s \times s'}{s + s'}$
    \item \textbf{กำลังขยายรวมของกล้องจุลทรรศน์}\quad $M_{\text{total}} = M_{\text{obj}} \times M_{\text{ocu}}$
    \item \textbf{ขีดจำกัดการแยกชัด (สำหรับแสงสีเขียว $\lambda = 550\text{ nm}$)}
    \begin{equation*}
        d_{\min}\text{ (หน่วย nm)} = \frac{0.61 \times 550}{\text{NA}} = \frac{335.5}{\text{NA}}
    \end{equation*}
\end{itemize}
\end{conceptbox}

\begin{worked}[การคำนวณเปรียบเทียบขีดจำกัดการแยกชัดของหัวเลนส์ 40x และ 100x]
\textbf{โจทย์} กล้องจุลทรรศน์ใช้แสงสีเขียว ($\lambda = 550\text{ nm}$) มีหัวเลนส์ใกล้วัตถุขนาด $40\times$ ที่ระบุค่า $\text{NA} = 0.65$ (ใช้อากาศ) และหัวเลนส์ขนาด $100\times$ ที่ระบุค่า $\text{NA} = 1.25$ (ใช้น้ำมันช่วยส่อง) จงคำนวณค่าขีดจำกัดการแยกชัด $d_{\min}$ ของหัวเลนส์ทั้งสอง

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item คำนวณค่า $d_{\min}$ ของหัวเลนส์ $40\times$ ($\text{NA} = 0.65$)
    \begin{equation*}
        d_{\min(40\times)} = \frac{335.5}{0.65} = 516\text{ nm} \quad (0.52\ \mu\text{m})
    \end{equation*}
    \item คำนวณค่า $d_{\min}$ ของหัวเลนส์ $100\times$ เมื่อหยดน้ำมันช่วยส่อง ($\text{NA} = 1.25$)
    \begin{equation*}
        d_{\min(100\times)} = \frac{335.5}{1.25} = 268\text{ nm} \quad (0.27\ \mu\text{m})
    \end{equation*}
\end{enumerate}
\textbf{คำตอบ} หัวเลนส์ $100\times$ ร่วมกับน้ำมันช่วยส่องมีค่า $d_{\min} = 268\text{ nm}$ ซึ่งให้ความละเอียดคมชัดสูงกว่าหัวเลนส์ $40\times$ เกือบ $2$ เท่า
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Glass slide bottom
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1pt] (1.0,0.6) rectangle (12.0,1.4);
    \node[font=\footnotesize\bfseries\color{physRoyalBlue}] at (6.5,1.0) {แผ่นสไลด์แก้วและกระจกปิดสไลด์ ($n_{\text{glass}} = 1.52$)};

    % Objective lens top
    \draw[fill=charcoal!85, draw=charcoal, line width=1.2pt] (4.0,3.2) -- (9.0,3.2) -- (8.0,2.2) -- (5.0,2.2) -- cycle;
    \draw[fill=cyan!30, draw=physRoyalBlue, line width=1pt] (5.2,2.2) rectangle (7.8,2.5);
    \node[font=\bfseries\color{white}] at (6.5,2.85) {หัวเลนส์ใกล้วัตถุ $100\times$ (Oil Immersion)};

    % Dashed divider
    \draw[dashed, line width=1.1pt, charcoal] (6.5,0.2) -- (6.5,3.6);

    % Left side: Immersion Oil (n=1.515)
    \fill[physAmber!45] (4.8,1.4) rectangle (6.5,2.2);
    \node[font=\footnotesize\bfseries\color{physAmber!85!black}, align=center] at (2.6,2.1) {ฝั่งซ้าย หยดน้ำมัน\\Immersion Oil ($n=1.515$)};
    \draw[->, line width=1.5pt, bioEmerald!85!black] (6.3,0.2) -- (5.9,1.4) -- (5.5,2.2);
    \draw[->, line width=1.5pt, bioEmerald!85!black] (6.4,0.2) -- (6.1,1.4) -- (5.8,2.2);
    \node[font=\scriptsize\bfseries\color{bioEmerald!85!black}, align=center] at (2.8,1.0) {แสงพุ่งตรงเข้าเลนส์ $100\%$\\ภาพสว่างและคมชัดสูง};

    % Right side: Dry Air (n=1.00)
    \node[font=\footnotesize\bfseries\color{crimsonAlert}, align=center] at (10.3,2.1) {ฝั่งขวา ไม่หยดน้ำมัน\\ช่องว่างอากาศ ($n=1.00$)};
    \draw[->, line width=1.5pt, crimsonAlert] (6.7,0.2) -- (7.2,1.4) -- (9.2,1.85);
    \draw[->, line width=1.5pt, crimsonAlert] (6.6,0.2) -- (7.5,1.4) -- (8.4,0.7);
    \node[font=\scriptsize\bfseries\color{crimsonAlert}, align=center] at (10.3,1.0) {แสงหักเหหนีออกและสะท้อนกลับ\\ภาพมืดและพร่ามัว};
\end{tikzpicture}%
}
\caption{เปรียบเทียบทางเดินแสงที่หัวเลนส์ $100\times$ ระหว่างฝั่งที่หยดน้ำมันช่วยส่อง ($n=1.515$) กับฝั่งที่เป็นช่องว่างอากาศ ($n=1.00$)}
\label{fig:lab10_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item ชุดรางแสงพร้อมเลนส์นูนมาตรฐาน ฉากรับภาพ และแหล่งกำเนิดแสง จำนวน $1$ ชุด
    \item กล้องจุลทรรศน์แบบใช้แสงเลนส์ประกอบ (หัวเลนส์ $4\times, 10\times, 40\times$ และ $100\times$) จำนวน $1$ เครื่อง
    \item สไลด์ถาวรแบคทีเรียย้อมสีแกรม (\textit{Escherichia coli} และ \textit{Staphylococcus aureus}) จำนวน $2$ แผ่น
    \item น้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$) และกระดาษเช็ดเลนส์ (Lens Paper) จำนวน $1$ ชุด
\end{enumerate}
\end{equipbox}

\begin{warningbox}
ห้ามใช้หัวเลนส์ $40\times$ (High Dry Lens) สัมผัสโดนหยดน้ำมันช่วยส่องโดยเด็ดขาด และเมื่อใช้งานหัวเลนส์ $100\times$ เสร็จสิ้น ต้องใช้กระดาษเช็ดเลนส์ซับน้ำมันออกจากหน้าเลนส์และแผ่นสไลด์จนสะอาดทุกครั้งก่อนเก็บกล้อง
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การหาความยาวโฟกัสของเลนส์นูน}\quad จัดวางวัตถุเรืองแสงให้ห่างจากเลนส์นูนเป็นระยะ $s = 20.0\text{ cm}$ และ $30.0\text{ cm}$ เลื่อนฉากรับภาพจนได้ภาพจริงหัวกลับที่คมชัดที่สุด วัดระยะภาพ $s'$ และคำนวณความยาวโฟกัส $f$ บันทึกใน\mbox{ตารางที่} 10.1
    \item \textbf{ตอนที่ 2 การคำนวณพารามิเตอร์ทางทัศนศาสตร์และทดสอบ Immersion Oil ที่หัวเลนส์ 100x}\quad อ่านค่ากำลังขยายและค่า $\text{NA}$ ที่สลักอยู่บนตัวกระบอกหัวเลนส์ทั้ง 4 ขนาดของกล้องจุลทรรศน์ คำนวณค่า $M_{\text{total}}$ และ $d_{\min}$ จากนั้นส่องสไลด์แบคทีเรียที่หัวเลนส์ $100\times$ โดยสังเกตเปรียบเทียบก่อนหยดน้ำมันและหลังหยดน้ำมันช่วยส่อง บันทึกใน\mbox{ตารางที่} 10.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 10\quad เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 10.1\quad ผลการหาความยาวโฟกัส $f$ และกำลังขยายของเลนส์นูนบนรางแสง}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{c c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ครั้งที่} & \textbf{ระยะวัตถุ $s$ (cm)} & \textbf{ระยะภาพ $s'$ (cm)} & \textbf{ความยาวโฟกัส $f = \frac{s\cdot s'}{s+s'}$ (cm)} & \textbf{ลักษณะภาพบนฉาก (หัวตั้ง/หัวกลับ, ขนาด)} \\
\midrule
1 & $20.0$ & \dotfill & \dotfill & \dotfill \\[6pt]
2 & $25.0$ & \dotfill & \dotfill & \dotfill \\[6pt]
3 & $30.0$ & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 10.2\quad ข้อมูลจำเพาะของหัวเลนส์กล้องจุลทรรศน์ (เมื่อใช้แสง $\lambda = 550\text{ nm}$ และเลนส์ตา $10\times$)}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{3.4cm} c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ชนิดหัวเลนส์ใกล้วัตถุ} & \textbf{กำลังขยาย $M$} & \textbf{ค่า NA} & \textbf{ค่า $d_{\min}$ (nm)} & \textbf{ความคมชัดของเซลล์แบคทีเรียที่สังเกตได้} \\
\midrule
1. เลนส์ Scanning ($4\times$) & $40\times$ & \dotfill & \dotfill & \dotfill \\[6pt]
2. เลนส์กำลังต่ำ ($10\times$) & $100\times$ & \dotfill & \dotfill & \dotfill \\[6pt]
3. เลนส์กำลังสูง ($40\times$) & $400\times$ & \dotfill & \dotfill & \dotfill \\[6pt]
4. เลนส์ $100\times$ (ไม่หยดน้ำมัน) & $1{,}000\times$ & (ขาดน้ำมัน) & --- & \dotfill \\[6pt]
5. เลนส์ $100\times$ (หยดน้ำมัน) & $1{,}000\times$ & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item เพราะเหตุใดที่กำลังขยาย $1{,}000\times$ หากไม่หยดน้ำมันช่วยส่อง (Immersion Oil) ภาพของเซลล์แบคทีเรียจึงมืดและพร่ามัว แม้ว่าจะหมุนปุ่มปรับภาพละเอียดอย่างเต็มที่แล้วก็ตาม
    \item เพราะเหตุใดกล้องจุลทรรศน์แบบใช้แสงที่มองเห็นได้ ($\lambda \approx 400\text{--}700\text{ nm}$) จึงไม่สามารถส่องเห็นอนุภาคไวรัสที่มีขนาดประมาณ $50\text{ nm}$ ได้ ต้องเปลี่ยนไปใช้กล้องจุลทรรศน์อิเล็กตรอนแทน
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab10_microscope_immersion_oil.tex"), "w", encoding="utf-8") as f:
    f.write(lab10)

# ==============================================================================
# LAB 11: การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV-C ฆ่าเชื้อ
# ==============================================================================
lab11 = r"""\chapter{การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV-C ฆ่าเชื้อ}

\begin{planbox}[สัปดาห์ที่ 12 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO2 และ CLO4)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item ทำการทดลองจำลองการสลายตัวของนิวเคลียสกัมมันตรังสีด้วยชุดลูกเต๋าหรือเหรียญสองหน้า เพื่อพิสูจน์สมการครึ่งชีวิต $N = N_0(1/2)^n$ โดยไม่ต้องใช้แคลคูลัส
    \item วัดความเข้มรังสีตามระยะห่างจากแหล่งกำเนิดแสงเพื่อพิสูจน์กฎกำลังสองผกผัน ($I \propto 1/r^2$)
    \item วิเคราะห์ข้อมูลการลดลงของจำนวนโคโลนีแบคทีเรียเมื่อได้รับรังสี UV-C ($254\text{ nm}$) ที่ระยะเวลาและระยะห่างต่างกัน เพื่อหาค่าเวลาลดทอนครึ่งชีวิตของประชากรเชื้อ ($D_{1/2}$)
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายแนวคิดครึ่งชีวิต (Half-life) และกฎกำลังสองผกผันของความเข้มรังสีได้
    \item \textbf{CLO2 (PLO2, PLO3)}\quad ประยุกต์ใช้สมการครึ่งชีวิตและกฎกำลังสองผกผันในการวางแผนระยะห่างและเวลาเปิดหลอดรังสี UV-C ฆ่าเชื้อในตู้ปลอดเชื้อ (Biosafety Cabinet) ได้
    \item \textbf{CLO4 (PLO5, PLO6)}\quad รวบรวมข้อมูลสถิติของกลุ่ม เขียนกราฟการสลายตัว และสื่อสารผลการทดลองได้อย่างถูกต้อง
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

การสลายตัวของสารกัมมันตรังสีและการลดลงของจำนวนจุลินทรีย์ที่มีชีวิตรอดเมื่อได้รับรังสีฆ่าเชื้อ มีรูปแบบทางคณิตศาสตร์เดียวกัน คือ \textbf{การลดลงแบบครึ่งชีวิต} (\textbf{Half-Life Decay})\index{ครึ่งชีวิต (Half-Life)} โดยในทุกๆ ช่วงเวลา 1 ครึ่งชีวิต ($T_{1/2}$) ปริมาณสารตั้งต้นหรือจำนวนจุลินทรีย์จะลดลงเหลือ\textbf{ครึ่งหนึ่ง}ของปริมาณที่มีอยู่เดิมเสมอ หากผ่านไป $n$ รอบครึ่งชีวิต ($n = t / T_{1/2}$) ปริมาณที่เหลืออยู่ $N$ คำนวณได้จากสมการที่ \eqref{eq:lab11_halflife}

\begin{equation}
    N = N_0 \left(\frac{1}{2}\right)^n \qquad \text{เมื่อ} \qquad n = \frac{t}{T_{1/2}}
    \label{eq:lab11_halflife}
\end{equation}

สำหรับการฆ่าเชื้อบนพื้นผิวด้วยหลอดรังสีอัลตราไวโอเลตชนิด \textbf{UV-C} ($\lambda = 254\text{ nm}$)\index{รังสีอัลตราไวโอเลต (UV-C Sterilization)} ซึ่งทำลายพันธุกรรมของแบคทีเรียด้วยการสร้างพันธะไทมีนไดเมอร์ (Thymine Dimer) บนสายดีเอ็นเอ ความเข้มรังสี $I$ (หน่วย $\text{W/m}^2$ หรือ $\mu\text{W/cm}^2$) ที่ตกกระทบบนจานเพาะเชื้อจะลดลงอย่างรวดเร็วเมื่อระยะห่าง $r$ จากหลอดไฟเพิ่มขึ้น ตาม\textbf{กฎกำลังสองผกผัน} (\textbf{Inverse-Square Law})\index{กฎกำลังสองผกผัน (Inverse-Square Law)}

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 11]
\begin{itemize}
    \item \textbf{สมการครึ่งชีวิตแบบคิดเลขในใจ}\quad $N = \dfrac{N_0}{2^n}$ (เช่น ผ่านไป $3$ ครึ่งชีวิต เหลือ $N_0 / 2^3 = N_0 / 8$)
    \item \textbf{กฎกำลังสองผกผันของความเข้มรังสีเมื่อเทียบระยะห่าง $r_1$ กับ $r_2$}
    \begin{equation*}
        \frac{I_2}{I_1} = \left(\frac{r_1}{r_2}\right)^2 \implies I_2 = I_1 \left(\frac{r_1}{r_2}\right)^2
    \end{equation*}
    \item \textbf{ปริมาณรังสีสะสม (UV Dose)}\quad $\text{Dose} = \text{ความเข้มรังสี } I \times \text{เวลาฉายรังสี } t$
\end{itemize}
\end{conceptbox}

\begin{worked}[การคำนวณความเข้มรังสี UV-C และจำนวนแบคทีเรียที่รอดชีวิต]
\textbf{โจทย์} หลอดรังสี UV-C ในตู้ปลอดเชื้อให้ความเข้มรังสี $I_1 = 400\ \mu\text{W/cm}^2$ ที่ระยะห่าง $r_1 = 20\text{ cm}$ หากวางจานเพาะเชื้อห่างออกไปเป็น $r_2 = 40\text{ cm}$ ความเข้มรังสี $I_2$ จะเหลือเท่าใด และหากที่ระยะนี้แบคทีเรียมีเวลาครึ่งชีวิตการตาย $T_{1/2} = 2\text{ นาที}$ เมื่อเปิดไฟนาน $t = 8\text{ นาที}$ จากเชื้อเริ่มต้น $N_0 = 1{,}600\text{ CFU}$ จะเหลือรอดกี่ $\text{CFU}$

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item คำนวณความเข้มรังสี $I_2$ ที่ระยะ $r_2 = 40\text{ cm}$ (ห่างขึ้น $2$ เท่า ความเข้มลดลง $2^2 = 4$ เท่า)
    \begin{equation*}
        I_2 = 400 \times \left(\frac{20}{40}\right)^2 = 400 \times \frac{1}{4} = 100\ \mu\text{W/cm}^2
    \end{equation*}
    \item คำนวณจำนวนรอบครึ่งชีวิต $n = t / T_{1/2} = 8 / 2 = 4\text{ รอบ}$ แล้วหาจำนวนเชื้อที่เหลือรอด $N$
    \begin{equation*}
        N = \frac{1{,}600}{2^4} = \frac{1{,}600}{16} = 100\text{ CFU}
    \end{equation*}
\end{enumerate}
\textbf{คำตอบ} ความเข้มรังสีเหลือ $100\ \mu\text{W/cm}^2$ และมีแบคทีเรียเหลือรอดชีวิต $100\text{ CFU}$
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Left: Half-life decay curve
    \draw[->, line width=1.1pt] (0,0) -- (6.2,0) node[right, font=\footnotesize\bfseries] {จำนวนรอบครึ่งชีวิต $n$};
    \draw[->, line width=1.1pt] (0,0) -- (0,3.8) node[above, font=\footnotesize\bfseries] {จำนวนที่เหลือ $N/N_0$ (\%)};
    \draw[line width=1.8pt, physRoyalBlue, domain=0:5, samples=60] plot (\x, {3.2*(0.5^\x)});
    \foreach \n/\pct/\y in {0/100\%/3.2, 1/50\%/1.6, 2/25\%/0.8, 3/12.5\%/0.4, 4/6.25\%/0.2} {
        \fill[crimsonAlert] (\n,\y) circle (2.5pt);
        \draw[dashed, gray] (\n,0) -- (\n,\y) -- (0,\y);
        \node[below, font=\scriptsize] at (\n,0) {$\n$};
        \node[left, font=\scriptsize] at (0,\y) {\pct};
    }

    % Right: UV-C Inverse-square law in Biosafety Cabinet
    \draw[fill=purple!25, draw=purple!80!black, line width=1.2pt, rounded corners=3pt] (8.5,3.5) rectangle (12.5,3.85);
    \node[font=\footnotesize\bfseries\color{purple!80!black}, above] at (10.5,3.85) {หลอดรังสีฆ่าเชื้อ UV-C ($254\text{ nm}$)};
    % Rays
    \draw[->, line width=1.1pt, purple!75] (10.0,3.5) -- (8.2,0.5);
    \draw[->, line width=1.1pt, purple!75] (10.5,3.5) -- (10.5,0.5);
    \draw[->, line width=1.1pt, purple!75] (11.0,3.5) -- (12.8,0.5);

    % Distance r1
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1pt] (9.4,2.1) rectangle (11.6,2.35);
    \node[right, font=\scriptsize\bfseries\color{physRoyalBlue}] at (11.7,2.22) {ระยะ $r_1 = 20\text{ cm}$ ($I_1 = 100\%$)};

    % Distance r2 = 2 r1
    \draw[fill=boxAmberBg, draw=physAmber, line width=1pt] (8.3,0.7) rectangle (12.7,0.95);
    \node[right, font=\scriptsize\bfseries\color{physAmber!85!black}] at (12.8,0.82) {ระยะ $r_2 = 40\text{ cm}$ ($I_2 = 25\%$)};
\end{tikzpicture}%
}
\caption{กราฟการลดลงแบบครึ่งชีวิต (ซ้าย) และการลดลงของความเข้มรังสี UV-C ตามกฎกำลังสองผกผันของระยะห่าง (ขวา)}
\label{fig:lab11_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item ชุดเบี้ยสองสีหรือเหรียญจำลองนิวเคลียสกัมมันตรังสี จำนวน $100$ ชิ้น พร้อมกล่องเขย่า จำนวน $1$ ชุด
    \item แหล่งกำเนิดแสงจำลองหลอด UV และเครื่องวัดความเข้มแสง (Lux Meter / UV Radiometer) พร้อมรางวัดระยะทาง
    \item ชุดภาพถ่ายจานเพาะเชื้อแบคทีเรีย \textit{Escherichia coli} ที่ผ่านการฉายรังสี UV-C ($254\text{ nm}$) เป็นเวลา $0, 1, 2, 3$ และ $4$ นาที สำหรับฝึกนับจำนวนโคโลนี (CFU)
\end{enumerate}
\end{equipbox}

\begin{warningbox}
ในการปฏิบัติงานจริงกับตู้ปลอดเชื้อที่มีหลอดรังสี UV-C ต้องปิดกระจกหน้าตู้ลงให้สนิทและห้ามสอดมือหรือจ้องมองแสงสีม่วงฟ้าของหลอด UV-C โดยตรง เพราะจะทำให้เกิดกระจกตาอักเสบและผิวหนังไหม้ได้
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การจำลองการสลายตัวครึ่งชีวิตด้วยเบี้ยสองสี}\quad เริ่มต้นด้วยเบี้ยจำนวน $N_0 = 100$ ชิ้น เขย่ากล่องแล้วเทลงบนถาด คัดเบี้ยที่หงายด้านสีแดง (แทนนิวเคลียสที่สลายตัวแล้วหรือเซลล์ที่ตายแล้ว) ออก นับจำนวนเบี้ยที่เหลือรอด $N$ บันทึกเป็นรอบการเขย่าที่ $n = 1, 2, 3, 4$ และ $5$ เปรียบเทียบกับค่าทางทฤษฎีใน\mbox{ตารางที่} 11.1
    \item \textbf{ตอนที่ 2 การทดสอบกฎกำลังสองผกผันและการนับโคโลนีรอดชีวิตจากรังสี UV-C}\quad วัดความเข้มแสงที่ระยะห่าง $r = 15, 30$ และ $45\text{ cm}$ จากหลอดกำเนิดแสง และนับจำนวนโคโลนีแบคทีเรียที่รอดชีวิตบนจานเพาะเชื้อตามเวลาฉายรังสี UV-C บันทึกใน\mbox{ตารางที่} 11.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 11\quad ครึ่งชีวิตและประสิทธิภาพรังสี UV-C ฆ่าเชื้อ]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 11.1\quad ผลการจำลองการลดลงแบบครึ่งชีวิตจากจำนวนเริ่มต้น $N_0 = 100$ ชิ้น}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{c c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{รอบที่ ($n$)} & \textbf{ทฤษฎี ($100/2^n$)} & \textbf{เหลือจริง (1)} & \textbf{เหลือจริง (2)} & \textbf{ค่าเฉลี่ยจากการทดลอง $\bar{N}$} \\
\midrule
$n = 0$ (เริ่มต้น) & $100.0$ & $100$ & $100$ & $100.0$ \\[4pt]
$n = 1$ & $50.0$ & \dotfill & \dotfill & \dotfill \\[4pt]
$n = 2$ & $25.0$ & \dotfill & \dotfill & \dotfill \\[4pt]
$n = 3$ & $12.5$ & \dotfill & \dotfill & \dotfill \\[4pt]
$n = 4$ & $6.25$ & \dotfill & \dotfill & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 11.2\quad ผลการวัดความเข้มรังสีตามระยะห่างและจำนวนโคโลนีที่รอดชีวิตจากรังสี UV-C}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{c c c | c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ระยะ $r$} & \textbf{ความเข้ม $I$} & \textbf{$I/I_{15}$} & \textbf{เวลา UV} & \textbf{โคโลนี (CFU)} & \textbf{ร้อยละการรอดชีวิต (\%)} \\
\midrule
$15\text{ cm}$ ($1\times$) & ........ & $1.00$ & $0\text{ min}$ & $400\text{ CFU}$ & $100\%$ \\[6pt]
$30\text{ cm}$ ($2\times$) & ........ & ........ & $1\text{ min}$ & ........ & \dotfill \\[6pt]
$45\text{ cm}$ ($3\times$) & ........ & ........ & $2\text{ min}$ & ........ & \dotfill \\[6pt]
$60\text{ cm}$ ($4\times$) & ........ & ........ & $4\text{ min}$ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item หากเลื่อนถาดอุปกรณ์ผ่าตัดให้ห่างจากหลอดรังสี UV-C เพิ่มขึ้นเป็น $3$ เท่าของระยะเดิม ความเข้มรังสี UV-C ที่ตกกระทบบนถาดจะลดลงเหลือกี่เท่า และต้องเปิดไฟนานขึ้นกี่เท่าจึงจะได้ปริมาณรังสีสะสม (UV Dose) เท่าเดิม
    \item เพราะเหตุใดรังสี UV-C จึงเหมาะสำหรับการฆ่าเชื้อเฉพาะบนพื้นผิวโต๊ะและอากาศ แต่ไม่สามารถใช้ฆ่าเชื้อในอาหารเลี้ยงเชื้อที่บรรจุอยู่ในขวดแก้วหนาหรือกล่องพลาสติกทึบได้
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab11_half_life_uv_sterilization.tex"), "w", encoding="utf-8") as f:
    f.write(lab11)

# ==============================================================================
# LAB 12: การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญเติบโตของจุลินทรีย์ด้วยเครื่อง Spectrophotometer
# ==============================================================================
lab12 = r"""\chapter{การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญเติบโตของจุลินทรีย์ด้วยเครื่อง Spectrophotometer}

\begin{planbox}[สัปดาห์ที่ 13 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO1, CLO2 และ CLO4)]
\textbf{1. วัตถุประสงค์การทดลอง}
\begin{itemize}
    \item ปรับตั้งค่าความยาวคลื่นและทำการเซตศูนย์ (Blank Calibration) ของเครื่อง Spectrophotometer ด้วยอาหารเลี้ยงเชื้อเหลวปลอดเชื้อได้อย่างถูกต้อง
    \item วัดค่าร้อยละการส่องผ่านของแสง ($\%T$) และค่าการดูดกลืนแสงหรือความหนาแน่นเชิงแสงที่ความยาวคลื่น $600\text{ nm}$ ($\text{OD}_{600}$) ของสารแขวนลอยมาตรฐานแมคฟาร์แลนด์ (McFarland Standards) และชุดเจือจางเซลล์ยีสต์
    \item เขียนกราฟมาตรฐาน (Standard Curve) ตามกฎของเบียร์--แลมเบิร์ต ($A = \varepsilon b c$) และคำนวณความเข้มข้นที่แท้จริงของตัวอย่างเมื่อต้องเจือจางให้อยู่ในช่วงเชิงเส้น ($\text{OD}_{600}$ ระหว่าง $0.1\text{--}0.8$)
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO1 (PLO2)}\quad อธิบายความสัมพันธ์ระหว่างความเข้มแสงส่องผ่าน ($\%T$) กับค่าการดูดกลืนแสง ($A$ หรือ $\text{OD}_{600}$) ได้
    \item \textbf{CLO2 (PLO2, PLO3)}\quad ใช้งานเครื่อง Spectrophotometer วัดการเจริญเติบโตของเชื้อจุลินทรีย์และแก้ไขปัญหาค่า $\text{OD}_{600} > 1.0$ ด้วยการเจือจางตัวอย่างได้อย่างถูกต้อง
    \item \textbf{CLO4 (PLO5, PLO6)}\quad สร้างกราฟมาตรฐานและหาความชันจากข้อมูลการทดลองของกลุ่มได้อย่างแม่นยำ
\end{itemize}
\end{planbox}

\section{หลักการทฤษฎีและการเชื่อมโยงสู่งานจุลชีววิทยา}

เครื่องสเปกโตรโฟโตมิเตอร์ (\textbf{Spectrophotometer})\index{สเปกโตรโฟโตมิเตอร์ (Spectrophotometer)} เป็นเครื่องมือหลักที่ใช้ติดตามกราฟการเจริญเติบโตของแบคทีเรียและยีสต์ในอาหารเหลวอย่างรวดเร็ว เมื่อฉายลำแสงความยาวคลื่น $\lambda = 600\text{ nm}$ ด้วยความเข้มเริ่มต้น $I_0$ ผ่านหลอดตัวอย่าง (\textbf{Cuvette}) ที่มีความกว้างช่วงแสง $b = 1.0\text{ cm}$ เซลล์จุลินทรีย์ที่แขวนลอยอยู่จะดูดกลืนและกระเจิงแสงออกไป ทำให้ความเข้มแสงที่ทะลุผ่านไปถึงหัววัดลดลงเหลือ $I$ ความสัมพันธ์ระหว่าง\textbf{การส่องผ่านของแสง} ($T = I/I_0$) และ\textbf{ค่าการดูดกลืนแสง} ($A$ หรือ $\text{OD}_{600}$)\index{ความหนาแน่นเชิงแสง (OD600)} เป็นไปตาม\textbf{กฎของเบียร์--แลมเบิร์ต} (\textbf{Beer--Lambert Law})\index{กฎของเบียร์--แลมเบิร์ต (Beer--Lambert Law)} ดังสมการที่ \eqref{eq:lab12_beer}

\begin{equation}
    A = \text{OD}_{600} = -\log_{10}\left(\frac{I}{I_0}\right) = 2 - \log_{10}(\%T) = \varepsilon\,b\,c
    \label{eq:lab12_beer}
\end{equation}

เนื่องจากค่า $\text{OD}_{600}$ จะแปรผันตรงเป็นเส้นตรงกับความเข้มข้นของเซลล์ $c$ เฉพาะในช่วง $\text{OD}_{600} \approx 0.10\text{--}0.80$ เท่านั้น หากตัวอย่างเชื้อในระยะคงที่ (Stationary Phase) มีความขุ่นสูงจนอ่านค่า $\text{OD}_{600}$ ได้เกิน $1.0$ นักจุลชีววิทยาต้องทำการเจือจางตัวอย่างด้วยอาหารเหลวปลอดเชื้อ (เช่น เจือจาง $5$ เท่า หรือ $10$ เท่า) จนอ่านค่าได้อยู่ในช่วงเชิงเส้น แล้วจึงนำค่าที่อ่านได้คูณด้วย\textbf{ตัวคูณการเจือจาง} (\textbf{Dilution Factor}, $\text{DF}$)

\begin{conceptbox}[สรุปสูตรคำนวณฉบับเข้าใจง่ายสำหรับปฏิบัติการที่ 12]
\begin{itemize}
    \item \textbf{ค่าจำขึ้นใจระหว่าง $\%T$ กับค่า $A$ ($\text{OD}_{600}$)}
    \begin{itemize}
        \item แสงผ่านได้ $100\%$ (Blank ใสสนิท) $\implies \text{OD}_{600} = 0.000$
        \item แสงผ่านได้ $10\%$ $\implies \text{OD}_{600} = 1.000$ \quad และแสงผ่านได้ $1\%$ $\implies \text{OD}_{600} = 2.000$
    \end{itemize}
    \item \textbf{ตัวคูณการเจือจาง (Dilution Factor)}\quad $\text{DF} = \dfrac{V_{\text{เชื้อ}} + V_{\text{ตัวทำละลาย}}}{V_{\text{เชื้อ}}}$
    \item \textbf{ค่า $\text{OD}_{600}$ ที่แท้จริงของเชื้อต้นฉบับ}\quad $\text{OD}_{\text{จริง}} = \text{OD}_{\text{ที่อ่านได้หลังเจือจาง}} \times \text{DF}$
\end{itemize}
\end{conceptbox}

\begin{worked}[การคำนวณค่า OD600 ที่แท้จริงเมื่อทำการเจือจางตัวอย่างเชื้อ]
\textbf{โจทย์} ตัวอย่างเชื้อแบคทีเรีย \textit{Escherichia coli} ที่บ่มนาน $16$ ชั่วโมง มีความขุ่นสูงเกินช่วงเชิงเส้น นักศึกษาจึงดูดตัวอย่างเชื้อมา $0.2\text{ mL}$ ผสมกับอาหารเหลวปลอดเชื้อ (Blank) ปริมาตร $1.8\text{ mL}$ เมื่อนำไปวัดในเครื่อง Spectrophotometer อ่านค่าได้ $\text{OD}_{600} = 0.480$ จงคำนวณค่า $\text{OD}_{600}$ ที่แท้จริงของเชื้อต้นฉบับ

\textbf{วิธีทำทีละขั้นตอน}
\begin{enumerate}
    \item คำนวณตัวคูณการเจือจาง ($\text{DF}$) จากปริมาตรรวมหารด้วยปริมาตรเชื้อ
    \begin{equation*}
        \text{DF} = \frac{0.2 + 1.8}{0.2} = \frac{2.0}{0.2} = 10\text{ เท่า}
    \end{equation*}
    \item คำนวณค่า $\text{OD}_{600}$ ที่แท้จริงของเชื้อต้นฉบับ
    \begin{equation*}
        \text{OD}_{\text{จริง}} = 0.480 \times 10 = 4.80
    \end{equation*}
\end{enumerate}
\textbf{คำตอบ} ตัวอย่างเชื้อต้นฉบับมีค่าความหนาแน่นเชิงแสงที่แท้จริงเท่ากับ $\text{OD}_{600} = 4.80$
\end{worked}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    % Left: Spectrophotometer optical path
    \draw[fill=physAmber!30, draw=physAmber!90!black, line width=1pt] (0.5,1.8) circle (0.45cm);
    \node[font=\scriptsize\bfseries, below] at (0.5,1.25) {หลอดไฟ};
    \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1pt] (1.6,1.2) -- (2.3,2.4) -- (0.9,2.4) -- cycle;
    \node[font=\scriptsize\bfseries, above] at (1.6,2.45) {เกรตติงเลือก $600\text{ nm}$};
    \draw[->, line width=2pt, physAmber!90!orange] (2.2,1.8) -- (3.3,1.8) node[midway, above, font=\footnotesize\bfseries] {$I_0$};

    % Cuvette
    \draw[fill=bioEmerald!25, draw=bioEmerald!85!black, line width=1.2pt] (3.3,0.8) rectangle (4.5,2.9);
    \foreach \x/\y in {3.6/1.2, 4.1/1.5, 3.8/2.0, 4.2/2.4, 3.6/2.5} {
        \fill[bioEmerald!80!black] (\x,\y) circle (2.2pt);
    }
    \node[font=\scriptsize\bfseries, below] at (3.9,0.75) {Cuvette ($b=1\text{ cm}$)};

    \draw[->, line width=1.2pt, physAmber!90!orange] (4.5,1.8) -- (5.6,1.8) node[midway, above, font=\footnotesize\bfseries] {$I$};
    \draw[fill=charcoal!85, draw=charcoal, rounded corners=3pt] (5.6,1.2) rectangle (6.8,2.4);
    \node[font=\scriptsize\bfseries\color{white}, align=center] at (6.2,1.8) {หัววัดแสง\\$\text{OD}_{600}$};

    % Right: Beer-Lambert linear range
    \draw[->, line width=1.1pt] (8.0,0.6) -- (13.6,0.6) node[right, font=\footnotesize\bfseries] {ความเข้มข้นเซลล์ $c$};
    \draw[->, line width=1.1pt] (8.0,0.6) -- (8.0,3.6) node[above, font=\footnotesize\bfseries] {ค่า $\text{OD}_{600}$};
    \fill[boxGreenBg] (8.0,0.9) rectangle (11.2,2.6);
    \node[font=\scriptsize\bfseries\color{bioEmerald!85!black}] at (9.6,3.1) {ช่วงเชิงเส้นแม่นยำ ($\text{OD}_{600} = 0.1\text{--}0.8$)};
    \draw[line width=1.8pt, bioEmerald!85!black] (8.0,0.6) -- (11.2,2.6);
    \draw[dashed, line width=1.5pt, crimsonAlert] (11.2,2.6) .. controls (12.0,2.95) and (12.8,3.05) .. (13.4,3.1);
    \node[font=\scriptsize\bfseries\color{crimsonAlert}, align=center] at (12.5,2.1) {เกิน $1.0$ กราฟโค้งอิ่มตัว\\ต้องเจือจางตัวอย่าง!};
\end{tikzpicture}%
}
\caption{ทางเดินแสงภายในเครื่อง Spectrophotometer (ซ้าย) และช่วงความเป็นเส้นตรงของกราฟมาตรฐานตามกฎของเบียร์--แลมเบิร์ต (ขวา)}
\label{fig:lab12_setup}
\end{figure}

\section{วัสดุอุปกรณ์และขั้นตอนการปฏิบัติการ}

\begin{equipbox}
\begin{enumerate}
    \item เครื่องสเปกโตรโฟโตมิเตอร์ (Visible Spectrophotometer) ตั้งความยาวคลื่นที่ $600\text{ nm}$ จำนวน $1$ เครื่อง
    \item หลอดวัดแสงพลาสติกใส (Disposable Cuvettes ช่วงแสง $b = 1.0\text{ cm}$) จำนวน $6$ หลอด
    \item อาหารเลี้ยงเชื้อเหลวปลอดเชื้อสำหรับทำ Blank และสารแขวนลอยยีสต์ความเข้มข้นสัมพัทธ์ $20\%, 40\%, 60\%, 80\%$ และตัวอย่างความขุ่นสูงไม่ทราบค่า (Unknown)
\end{enumerate}
\end{equipbox}

\begin{warningbox}
ห้ามจับด้านใสของหลอด Cuvette ที่แสงเดินทางผ่านด้วยนิ้วมือเปล่า ให้จับเฉพาะด้านขุ่นหรือขอบบนของหลอดเท่านั้น และต้องเช็ดหยดน้ำหรือรอยนิ้วมือด้วยกระดาษเช็ดเลนส์รวมทั้งเคาะฟองอากาศออกให้หมดก่อนนำเข้าช่องวัดแสงทุกครั้ง
\end{warningbox}

\subsection{ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การทำ Blank และการสร้างกราฟมาตรฐานความขุ่นเซลล์}\quad ปรับความยาวคลื่นของเครื่อง Spectrophotometer ไปที่ $600\text{ nm}$ บรรจุอาหารเหลวปลอดเชื้อลงในหลอด Cuvette หลอดที่ 1 แล้วกดปุ่ม Zero / Blank (หน้าจอแสดง $\text{OD}_{600} = 0.000$ หรือ $\%T = 100.0\%$) จากนั้นวัดค่า $\%T$ และ $\text{OD}_{600}$ ของสารแขวนลอยมาตรฐาน $20\%, 40\%, 60\%$ และ $80\%$ บันทึกใน\mbox{ตารางที่} 12.1
    \item \textbf{ตอนที่ 2 การวัดตัวอย่างเชื้อความขุ่นสูงด้วยการเจือจาง (Dilution)}\quad วัดค่า $\text{OD}_{600}$ ของตัวอย่างเชื้อ Unknown โดยตรง (ซึ่งจะมีค่าเกิน $1.0$) จากนั้นใช้ไมโครปิเปตดูดตัวอย่างเชื้อ $0.20\text{ mL}$ ผสมกับตัวทำละลาย Blank $1.80\text{ mL}$ ($\text{DF} = 10$) ผสมให้เข้ากันแล้ววัดค่า $\text{OD}_{600}$ หลังเจือจางเพื่อคำนวณค่าที่แท้จริงใน\mbox{ตารางที่} 12.2
\end{enumerate}

\section{ใบบันทึกผลการทดลองและคำถามท้ายปฏิบัติการ}

\begin{worksheetbox}[ใบบันทึกผลการทดลองที่ 12\quad การวัดค่า OD600 ด้วยเครื่อง Spectrophotometer]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่ทำการทดลอง} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกกลุ่ม} 1. \dotfill 2. \dotfill 3. \dotfill

\vspace{4pt}
\textbf{ตารางที่ 12.1\quad ผลการวัดค่าร้อยละการส่องผ่าน ($\%T$) และค่าการดูดกลืนแสง ($\text{OD}_{600}$) ของชุดมาตรฐาน}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{4.2cm} c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{หลอดตัวอย่างมาตรฐาน} & \textbf{ความเข้มข้น} & \textbf{ค่า $\%T$ (\%)} & \textbf{$\text{OD}_{600}$ (ครั้งที่ 1)} & \textbf{ค่า $\text{OD}_{600}$ เฉลี่ย} \\
\midrule
หลอดที่ 1 (Blank อาหารเหลว) & $0\%$ & $100.0\%$ & $0.000$ & $0.000$ \\[5pt]
หลอดที่ 2 (สารแขวนลอยเจือจาง) & $20\%$ & ........ & ........ & \dotfill \\[5pt]
หลอดที่ 3 (สารแขวนลอยปานกลาง) & $40\%$ & ........ & ........ & \dotfill \\[5pt]
หลอดที่ 4 (สารแขวนลอยค่อนข้างขุ่น) & $60\%$ & ........ & ........ & \dotfill \\[5pt]
หลอดที่ 5 (สารแขวนลอยขุ่น) & $80\%$ & ........ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ตารางที่ 12.2\quad ผลการวัดตัวอย่างเชื้อ Unknown ก่อนและหลังการเจือจาง 10 เท่า ($\text{DF} = 10$)}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}p{5.2cm} c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{สภาวะของตัวอย่างเชื้อ Unknown} & \textbf{DF} & \textbf{$\text{OD}_{600}$ ที่อ่านได้} & \textbf{ค่า $\text{OD}_{600}$ ที่แท้จริง ($\text{OD}\times\text{DF}$)} \\
\midrule
1. วัดโดยตรงไม่เจือจาง (เกินช่วงเชิงเส้น) & $1$ & ........ & \dotfill \\[6pt]
2. เจือจาง $10$ เท่า ($0.2\text{ mL} + 1.8\text{ mL}$) & $10$ & ........ & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{สรุปและอภิปรายผลการทดลอง}\\[4pt]
\dotfill\\[6pt]
\dotfill
\end{worksheetbox}

\subsection{คำถามท้ายปฏิบัติการ}
\begin{enumerate}
    \item เพราะเหตุใดในการวัดความหนาแน่นของเซลล์แบคทีเรียในอาหารเลี้ยงเชื้อเหลว Nutrient Broth ที่มีสีเหลืองใส จึงต้องใช้อาหารเหลว Nutrient Broth ที่ไม่ได้ใส่เชื้อเป็นหลอด Blank แทนการใช้น้ำกลั่นบริสุทธิ์
    \item การวัดค่า $\text{OD}_{600}$ ด้วยเครื่อง Spectrophotometer สามารถแยกแยะระหว่างเซลล์แบคทีเรียที่ยังมีชีวิตอยู่กับเซลล์ที่ตายแล้วแต่ยังไม่แตกสลายได้หรือไม่ เพราะเหตุใด
\end{enumerate}
"""

with open(os.path.join(LABS_DIR, "lab12_spectrophotometer_od600.tex"), "w", encoding="utf-8") as f:
    f.write(lab12)

# ==============================================================================
# LAB 13: โครงงานย่อย (Mini-Project) การสังเคราะห์และสาธิตหลักการฟิสิกส์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา
# ==============================================================================
lab13 = r"""\chapter{โครงงานย่อย การสังเคราะห์และสาธิตหลักการฟิสิกส์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยา}

\begin{planbox}[สัปดาห์ที่ 14 — เวลาปฏิบัติการ 3 ชั่วโมง (สอดคล้องกับ CLO2, CLO3 และ CLO4 — คะแนนเต็ม 15 คะแนน)]
\textbf{1. วัตถุประสงค์ของโครงงานย่อย (Mini-Project)}
\begin{itemize}
    \item สังเคราะห์องค์ความรู้ทางฟิสิกส์ตลอดทั้งภาคการศึกษา (กลศาสตร์ ความร้อน อุณหพลศาสตร์ ไฟฟ้า และทัศนศาสตร์) เพื่ออธิบายกลไกการทำงานของเครื่องมือวิทยาศาสตร์ในห้องปฏิบัติการจุลชีววิทยาอย่างน้อย 1 เครื่องอย่างลึกซึ้ง
    \item สาธิตขั้นตอนการใช้งานเครื่องมือ การคำนวณพารามิเตอร์ตั้งค่าที่ถูกต้อง และการป้องกันอุบัติเหตุตามหลักความปลอดภัยห้องปฏิบัติการ
    \item นำเสนอผลงานในรูปแบบโปสเตอร์อินโฟกราฟิกหรือการสาธิตหน้าชั้นเรียน (10 นาทีต่อกลุ่ม) และตอบข้อซักถามเชิงแก้ปัญหา (Troubleshooting) ได้อย่างถูกต้อง
\end{itemize}
\textbf{2. ความเชื่อมโยงกับผลลัพธ์การเรียนรู้ของรายวิชา (CLOs) และหลักสูตร (PLOs)}
\begin{itemize}
    \item \textbf{CLO2 (PLO2, PLO3)}\quad ประยุกต์ใช้หลักการทางฟิสิกส์อธิบายกลไกและแก้ไขปัญหาการใช้เครื่องมือวิทยาศาสตร์ในงานจุลชีววิทยาได้ (5 คะแนน)
    \item \textbf{CLO3 (PLO1)}\quad สาธิตมาตรการความปลอดภัยและจรรยาบรรณในการดูแลรักษาเครื่องมือได้อย่างครบถ้วน (5 คะแนน)
    \item \textbf{CLO4 (PLO5, PLO6)}\quad ทำงานร่วมกันเป็นทีมและสื่อสารข้อมูลวิทยาศาสตร์ผ่านโปสเตอร์และการนำเสนอได้อย่างชัดเจน (5 คะแนน)
\end{itemize}
\end{planbox}

\section{แนวทางการเลือกหัวข้อโครงงานย่อยและกรอบการวิเคราะห์เชิงฟิสิกส์}

นักศึกษาแต่ละกลุ่ม (กลุ่มละ 3--4 คน) เลือกเครื่องมือหรือเทคนิคปฏิบัติการทางจุลชีววิทยา 1 หัวข้อจากรายการที่กำหนดให้ หรือเสนอหัวข้อเพิ่มเติมต่อผู้สอน โดยต้องวิเคราะห์เชื่อมโยงให้ครบ 4 มิติ ได้แก่ \textbf{(1) หลักการฟิสิกส์พื้นฐานและสมการหลัก} \textbf{(2) ตัวอย่างการคำนวณตั้งค่าใช้งานจริง} \textbf{(3) สาเหตุความผิดพลาดที่พบบ่อยและวิธีแก้ไข} และ \textbf{(4) กฎความปลอดภัยและจรรยาบรรณการบำรุงรักษา}

\begin{conceptbox}[หัวข้อตัวอย่างสำหรับการเลือกทำโครงงานย่อย (เลือกกลุ่มละ 1 หัวข้อ)]
\begin{enumerate}
    \item \textbf{หัวข้อที่ 1 ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave)}\quad ความดันไออิ่มตัว กฎของแก๊ส ความร้อนแฝงของการควบแน่นไอน้ำ และการตรวจสอบความสำเร็จของการฆ่าเชื้อสปอร์แบคทีเรียที่ $121\,^\circ\text{C}$ ($15\text{ psi}$)
    \item \textbf{หัวข้อที่ 2 ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge)}\quad แรงสู่ศูนย์กลาง กฎของสโตกส์ การแปลงค่าระหว่าง $\text{RPM}$ กับ $\text{RCF}$ ($\times g$) และฟิสิกส์ของการถ่วงสมดุลโรเตอร์
    \item \textbf{หัวข้อที่ 3 ฟิสิกส์ของกล้องจุลทรรศน์และน้ำมันช่วยส่อง (Microscopy \& Immersion Oil)}\quad ทางเดินแสงในเลนส์ประกอบ สมการการแยกชัดของเอบเบอ ($d_{\min}$) และการจับคู่ดัชนีหักเหที่หัวเลนส์ $100\times$
    \item \textbf{หัวข้อที่ 4 ฟิสิกส์ของเครื่องสเปกโตรโฟโตมิเตอร์และการวัด $\text{OD}_{600}$}\quad กฎของเบียร์--แลมเบิร์ต การกระเจิงแสงของเซลล์ และการแก้ไขข้อจำกัดเมื่อความขุ่นเกินช่วงเชิงเส้น
    \item \textbf{หัวข้อที่ 5 ฟิสิกส์ของตู้ปลอดเชื้อ (Biosafety Cabinet)}\quad พลศาสตร์การไหลแบบราบเรียบ (Laminar Airflow) แผ่นกรอง HEPA และการลดลงของความเข้มรังสี UV-C ตามกฎกำลังสองผกผัน
    \item \textbf{หัวข้อที่ 6 ฟิสิกส์ของชุดแยกสารพันธุกรรมด้วยไฟฟ้า (Gel Electrophoresis)}\quad กฎของโอห์ม สนามไฟฟ้า กำลังความร้อนจูลในบัฟเฟอร์ และแรงหนืดต้านการเคลื่อนที่ของดีเอ็นเอในเจล
\end{enumerate}
\end{conceptbox}

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[>=Stealth, font=\small]
    \node[draw=physRoyalBlue, fill=boxBlueBg, line width=1.2pt, rounded corners=6pt, minimum width=3.2cm, minimum height=1.8cm, align=center, font=\bfseries] (s1) at (0,0) {ขั้นที่ 1\\เลือกเครื่องมือจุลชีววิทยา\\และระบุหลักฟิสิกส์};
    \node[draw=bioEmerald, fill=boxGreenBg, line width=1.2pt, rounded corners=6pt, minimum width=3.2cm, minimum height=1.8cm, align=center, font=\bfseries] (s2) at (4.2,0) {ขั้นที่ 2\\แสดงตัวอย่างคำนวณจริง\\(แบบ Low-Math)};
    \node[draw=crimsonAlert, fill=boxRedBg, line width=1.2pt, rounded corners=6pt, minimum width=3.2cm, minimum height=1.8cm, align=center, font=\bfseries] (s3) at (8.4,0) {ขั้นที่ 3\\วิเคราะห์ข้อผิดพลาด\\และกฎความปลอดภัย};
    \node[draw=physAmber!90!black, fill=boxAmberBg, line width=1.2pt, rounded corners=6pt, minimum width=3.2cm, minimum height=1.8cm, align=center, font=\bfseries] (s4) at (12.6,0) {ขั้นที่ 4\\จัดทำโปสเตอร์และสาธิต\\หน้าชั้นเรียน (15 คะแนน)};
    \draw[->, line width=1.5pt, physRoyalBlue] (s1) -- (s2);
    \draw[->, line width=1.5pt, bioEmerald] (s2) -- (s3);
    \draw[->, line width=1.5pt, crimsonAlert] (s3) -- (s4);
\end{tikzpicture}%
}
\caption{ขั้นตอนการดำเนินโครงงานย่อย (Mini-Project) ฟิสิกส์ในเครื่องมือห้องปฏิบัติการจุลชีววิทยาในสัปดาห์ที่ 14}
\label{fig:lab13_workflow}
\end{figure}

\section{แบบฟอร์มสรุปโครงงานย่อยและใบประเมินคะแนน (15 คะแนน)}

\begin{worksheetbox}[แบบฟอร์มสรุปโครงงานย่อยและบันทึกคะแนนการนำเสนอ (สัปดาห์ที่ 14)]
\textbf{กลุ่มปฏิบัติการที่} \dotfill \textbf{วันที่นำเสนอ} \dotfill\\[4pt]
\textbf{ชื่อหัวข้อโครงงานย่อยและเครื่องมือที่ศึกษา} \dotfill\\[4pt]
\textbf{รายชื่อสมาชิกและหน้าที่รับผิดชอบ}\\[2pt]
1. \dotfill หน้าที่ \dotfill\\[2pt]
2. \dotfill หน้าที่ \dotfill\\[2pt]
3. \dotfill หน้าที่ \dotfill\\[2pt]
4. \dotfill หน้าที่ \dotfill

\vspace{6pt}
\textbf{1. สรุปหลักการทางฟิสิกส์และสมการหลักที่ควบคุมการทำงานของเครื่องมือนี้ (CLO2)}\\[4pt]
\dotfill\\[6pt]
\dotfill\\[6pt]
\dotfill

\vspace{6pt}
\textbf{2. ตัวอย่างการคำนวณพารามิเตอร์ในการใช้งานจริง 1 ตัวอย่างพร้อมหน่วยวัด SI}\\[4pt]
\dotfill\\[6pt]
\dotfill\\[6pt]
\dotfill

\vspace{6pt}
\textbf{3. แนวทางการแก้ปัญหาเมื่อเกิดข้อผิดพลาด (Troubleshooting) และกฎความปลอดภัย (CLO3)}\\[4pt]
\dotfill\\[6pt]
\dotfill

\vspace{6pt}
\textbf{ตารางที่ 13.1\quad ตารางบันทึกคะแนนประเมินโครงงานย่อยสำหรับอาจารย์ผู้สอน (เต็ม 15 คะแนน)}
\begin{center}
\footnotesize\setlength{\tabcolsep}{3.5pt}
\begin{tabularx}{\linewidth}{>{\raggedright\arraybackslash}X c c c}
\toprule
\textbf{รายการประเมินตามผลลัพธ์การเรียนรู้ (OBE Rubrics)} & \textbf{CLOs ที่วัด} & \textbf{คะแนนเต็ม} & \textbf{คะแนนที่ได้} \\
\midrule
1. ความถูกต้องของการอธิบายกลไกทางฟิสิกส์ การคำนวณ และการแก้ปัญหาหน้างาน & CLO2 & $5\text{ คะแนน}$ & \dotfill \\[6pt]
2. การสาธิตขั้นตอนความปลอดภัยในการใช้เครื่องมือและจรรยาบรรณห้องปฏิบัติการ & CLO3 & $5\text{ คะแนน}$ & \dotfill \\[6pt]
3. การทำงานร่วมกันของสมาชิกในทีม ความชัดเจนของโปสเตอร์ และการสื่อสารตอบคำถาม & CLO4 & $5\text{ คะแนน}$ & \dotfill \\
\midrule
\textbf{รวมคะแนนโครงงานย่อยประจำกลุ่ม (คิดเป็น 15\% ของคะแนนรวมรายวิชา)} & \textbf{CLO2--4} & \textbf{15 คะแนน} & \dotfill \\
\bottomrule
\end{tabularx}
\end{center}

\vspace{4pt}
\textbf{ข้อเสนอแนะจากอาจารย์ผู้สอน} \dotfill \textbf{ลงชื่อผู้ประเมิน} \dotfill
\end{worksheetbox}
"""

with open(os.path.join(LABS_DIR, "lab13_integrated_mini_project.tex"), "w", encoding="utf-8") as f:
    f.write(lab13)

print("[OK] Generated Labs 7 to 13 successfully.")
