#!/usr/bin/env python3
"""
Generator Part 3: Chapters 7 to 12 (Weeks 8-15, Labs 7-13)
Course: 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) Physics for Microbiology
"""
import os

BASE_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027/แผนการสอน 2027/เอกสารคำสอน_LaTeX"
CH_DIR = os.path.join(BASE_DIR, "chapters")
os.makedirs(CH_DIR, exist_ok=True)

# ====================================================================
# CHAPTER 7: ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม (Week 8 + Lab 7)
# ====================================================================
ch07 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 7\quad ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม (สัปดาห์ที่ 8)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)}
\begin{itemize}
    \item 7.1 ประจุไฟฟ้า กฎของคูลอมบ์ และแรงทางไฟฟ้าระหว่างประจุบวกและประจุลบ
    \item 7.2 สนามไฟฟ้า ศักย์ไฟฟ้า และความต่างศักย์เยื่อหุ้มเซลล์จุลินทรีย์
    \item 7.3 กลไกทางไฟฟ้าสถิตของการย้อมสีแบคทีเรียแบบธรรมดา (Simple Staining) การย้อมสีแกรม (Gram Staining) และการย้อมสีพื้นหลัง (Negative Staining)
    \item 7.4 ปฏิบัติการที่ 7 การศึกษาแรงทางไฟฟ้าสถิตและเปรียบเทียบการจับตัวของสีย้อมประจุบวกกับสีย้อมประจุลบ
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item อธิบายกฎของคูลอมบ์และคำนวณขนาดของแรงทางไฟฟ้าระหว่างประจุได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายเหตุผลทางฟิสิกส์ว่าทำไมผนังเซลล์แบคทีเรียที่ค่า pH เป็นกลางจึงมีประจุสุทธิเป็นลบ และทำไมสีย้อมพื้นฐาน เช่น Crystal Violet และ Methylene Blue จึงต้องมีประจุบวก \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการทดลองเรื่องไฟฟ้าสถิตและเปรียบเทียบการยึดเกาะของสีย้อมอย่างปลอดภัยและเป็นทีม \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{Visual Concept Mapping}\quad เชื่อมโยงโครงสร้างกรดไทโคอิก (Teichoic Acid) และลิโพพอลิแซ็กคาไรด์ (LPS) ที่มีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) บนผิวแบคทีเรีย เข้ากับแรงดึงดูดทางไฟฟ้าสถิตของสีย้อมประจุบวก
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 7 ชุดทดลองไฟฟ้าสถิต และชุดสีย้อม Methylene Blue (ประจุบวก) กับ Nigrosin/Eosin (ประจุลบ)
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item แบบทดสอบย่อยท้ายคาบเรื่องกฎของคูลอมบ์และประจุของสีย้อม \textbf{(CLO1, CLO2)}
    \item รายงานปฏิบัติการที่ 7 \textbf{(CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{ไฟฟ้าสถิต ประจุผิวเซลล์ และการย้อมสีแกรม}
\index{ไฟฟ้าสถิต}\index{กฎของคูลอมบ์}\index{ประจุผิวเซลล์แบคทีเรีย}\index{การย้อมสีแกรม}

\section{ประจุไฟฟ้าและกฎของคูลอมบ์}

ในธรรมชาติ ประจุไฟฟ้าแบ่งออกเป็น 2 ชนิด ได้แก่ \textbf{ประจุบวก} (\textbf{Positive Charge}, $+q$) และ\textbf{ประจุลบ} (\textbf{Negative Charge}, $-q$) มีหน่วยเอสไอคือ \textbf{คูลอมบ์} ($\text{C}$) กฎพื้นฐานทางไฟฟ้าสถิตระบุว่า \textbf{ประจุชนิดเดียวกันจะผลักกัน และประจุต่างชนิดกันจะดึงดูดกัน} โดยขนาดของแรงทางไฟฟ้า ($F_e$) ระหว่างประจุ $q_1$ และ $q_2$ ที่อยู่ห่างกันเป็นระยะทาง $r$ เป็นไปตาม\textbf{กฎของคูลอมบ์} (\textbf{Coulomb's Law}) ดังสมการที่ (7.1)

\begin{equation}
    F_e = \frac{k |q_1 q_2|}{r^2}
\end{equation}

โดยที่ $k \approx 9.0 \times 10^9\text{ N}\cdot\text{m}^2/\text{C}^2$ คือค่าคงตัวของคูลอมบ์ในสุญญากาศ สังเกตจากสมการได้ว่า แรงทางไฟฟ้าจะแปรผกผันกับกำลังสองของระยะห่าง ($F_e \propto 1/r^2$) กล่าวคือ ถ้าระยะห่างระหว่างโมเลกุลสีย้อมกับผนังเซลล์ลดลงครึ่งหนึ่ง แรงดึงดูดทางไฟฟ้าจะเพิ่มสูงขึ้นถึง $2^2 = 4$ เท่า

\section{ฟิสิกส์ของการย้อมสีแบคทีเรีย ทำไมผนังเซลล์จึงดึงดูดสีย้อมประจุบวก}

ที่สภาวะความเป็นกรด-ด่างเป็นกลาง ($\text{pH } 7.0$) ผนังเซลล์และเยื่อหุ้มเซลล์ของแบคทีเรียเกือบทุกชนิดจะมี\textbf{ประจุไฟฟ้าสุทธิเป็นลบ} (\textbf{Net Negative Surface Charge}) เนื่องจากมีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) และหมู่คาร์บอกซิล ($\text{COO}^-$) อยู่ในโครงสร้างของกรดไทโคอิก (\textbf{Teichoic Acid} ในแบคทีเรียแกรมบวก) และลิโพพอลิแซ็กคาไรด์ (\textbf{Lipopolysaccharide} ในแบคทีเรียแกรมลบ) รวมถึงสายดีเอ็นเอและอาร์เอ็นเอภายในเซลล์ก็มีหมู่ฟอสเฟตที่มีประจุลบเช่นเดียวกัน

ด้วยหลักการแรงดึงดูดระหว่างประจุต่างชนิดตามกฎของคูลอมบ์ นักจุลชีววิทยาจึงแบ่งเทคนิคการย้อมสีออกเป็น 2 กลไกทางฟิสิกส์ ดังแสดงใน\mbox{ภาพที่} 7.1

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Basic Dye (Positive Charge) -> Direct Staining
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxBlueBg, draw=physRoyalBlue, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.6);
        \node[font=\bfseries\color{physRoyalBlue}] at (3.4,4.15) {(ก) สีย้อมประจุบวก (Basic Dye)};
        \draw[fill=labPurple!25, draw=labPurple, line width=1.8pt, rounded corners=12pt] (1.6,1.6) rectangle (5.2,3.0);
        \node[font=\bfseries\color{labPurple}] at (3.4,2.3) {เซลล์แบคทีเรีย (ผิวประจุลบ $-$)};
        \foreach \x in {1.9, 2.6, 3.4, 4.2, 4.9} {
            \node[font=\small\bfseries, color=crimsonAlert] at (\x,3.2) {$-$};
            \node[font=\small\bfseries, color=crimsonAlert] at (\x,1.4) {$-$};
        }
        % Positive Dye Ions attracted
        \foreach \x in {2.1, 3.4, 4.7} {
            \fill[physCyan] (\x,3.7) circle (4.5pt);
            \node[white, font=\scriptsize\bfseries] at (\x,3.7) {$+$};
            \draw[->, line width=1.1pt, color=physRoyalBlue] (\x,3.55) -- (\x,3.3);
        }
        \node[font=\footnotesize, align=center, color=charcoal] at (3.4,0.6) {เช่น Crystal Violet, Methylene Blue, Safranin\\ประจุ $+$ ดูดติดกับผิวเซลล์ประจุ $-$ $\rightarrow$ \textbf{ตัวเซลล์ติดสีชัด}};
    \end{scope}

    % Right: Acidic Dye (Negative Charge) -> Negative Staining
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxAmberBg, draw=physAmber, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.6);
        \node[font=\bfseries\color{physAmber!90!black}] at (3.4,4.15) {(ข) สีย้อมประจุลบ (Acidic Dye)};
        \fill[charcoal!75, rounded corners=3pt] (0.9,1.2) rectangle (5.9,3.4);
        \draw[fill=white, draw=physAmber, line width=1.6pt, rounded corners=12pt] (1.6,1.6) rectangle (5.2,3.0);
        \node[font=\bfseries\color{charcoal}] at (3.4,2.3) {เซลล์ใส (ผลักสีประจุลบออกไป)};
        \foreach \x in {2.1, 3.4, 4.7} {
            \fill[crimsonAlert] (\x,3.6) circle (4.5pt);
            \node[white, font=\scriptsize\bfseries] at (\x,3.6) {$-$};
            \draw[->, line width=1.1pt, color=physAmber] (\x,3.2) -- (\x,3.5);
        }
        \node[font=\footnotesize, align=center, color=charcoal] at (3.4,0.6) {เช่น Nigrosin, India Ink, Eosin\\ประจุ $-$ ผลักกับผิวเซลล์ $-$ $\rightarrow$ \textbf{พื้นหลังมืด ตัวเซลล์ใส (ดูแคปซูล)}};
    \end{scope}
\end{tikzpicture}%
}
\caption{กลไกแรงทางไฟฟ้าสถิตระหว่างประจุบนผิวเซลล์แบคทีเรียกับสีย้อมประจุบวกและสีย้อมประจุลบ}
\end{figure}

\begin{worked}[การเปรียบเทียบขนาดแรงทางไฟฟ้าตามระยะห่างระหว่างสีย้อมกับผนังเซลล์]
\textbf{โจทย์ปัญหา}\quad โมเลกุลสีย้อมเมทิลีนบลูซึ่งมีประจุบวก ($+q_1$) เคลื่อนที่เข้าไปใกล้หมู่ฟอสเฟตที่มีประจุลบ ($-q_2$) บนผนังเซลล์แบคทีเรีย หากระยะห่างระหว่างประจุทั้งสองลดลงจาก $r_1 = 6\text{ nm}$ เหลือ $r_2 = 2\text{ nm}$ (เข้าใกล้ขึ้น $3$ เท่า) แรงดึงดูดทางไฟฟ้าจะเพิ่มขึ้นเป็นกี่เท่าของตอนแรก

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 ใช้หลักสัดส่วนผกผันกำลังสองจากกฎของคูลอมบ์ ($F_e \propto 1/r^2$)}
    \[
        \frac{F_2}{F_1} = \left(\frac{r_1}{r_2}\right)^2
    \]
    \item \textbf{ขั้นที่ 2 แทนค่าระยะห่างแล้วคำนวณกำลังสอง}
    \[
        \frac{F_2}{F_1} = \left(\frac{6\text{ nm}}{2\text{ nm}}\right)^2 = 3^2 = 9\text{ เท่า}
    \]
\end{enumerate}
\textbf{คำตอบ}\quad แรงดึงดูดทางไฟฟ้าระหว่างสีย้อมกับผนังเซลล์จะเพิ่มสูงขึ้นเป็น $9$ เท่า
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 8}

\begin{labbox}[ปฏิบัติการที่ 7\quad ไฟฟ้าสถิตและกลไกประจุของสีย้อมเซลล์จุลินทรีย์ (3 ชั่วโมง)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (กฎของคูลอมบ์และประจุไฟฟ้า), CLO3 (ความปลอดภัยและวินัยในห้องแล็บ), CLO4 (รายงานกลุ่ม)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item ชุดทดลองไฟฟ้าสถิต (แท่งพลาสติก แท่งแก้ว ผ้าขนสัตว์ และลูกพิธหรือแผ่นอิเล็กโทรสโคป)
    \item กระดาษกรองเซลลูโลส (ซึ่งมีประจุผิวเป็นลบจำลองผนังเซลล์แบคทีเรีย), สารละลายสีย้อมประจุบวก (Methylene Blue หรือ Crystal Violet) และสีย้อมประจุลบ (Eosin หรือสีผสมอาหารประจุลบ)
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การทดสอบแรงดึงดูดและแรงผลักระหว่างประจุไฟฟ้า}\quad ถูแท่งพลาสติกด้วยผ้าขนสัตว์แล้วนำเข้าใกล้ลูกพิธ สังเกตการดึงดูดและการผลักกันเมื่อมีประจุชนิดเดียวกัน
    \item \textbf{ตอนที่ 2 การยึดเกาะทางไฟฟ้าสถิตของสีย้อมประจุบวกและประจุลบ}\quad หยดสีย้อมประจุบวก (Methylene Blue) และสีย้อมประจุลบ (Eosin) ปริมาตร $10\text{ }\mu\text{L}$ ลงบนแถบกระดาษกรองเซลลูโลส ทิ้งไว้ 2 นาที จากนั้นจุ่มปลายกระดาษลงในน้ำกลั่นเพื่อให้เกิดการชะล้าง (\textbf{Washing/Chromatography}) สังเกตว่าสีใดยึดเกาะแน่นกับเส้นใยประจุลบอยู่กับที่ และสีใดถูกน้ำชะเคลื่อนที่หลุดออกไปได้ง่าย
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{>{\raggedright\arraybackslash}X c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ชนิดสีย้อมที่ทดสอบ} & \textbf{ประจุของไอออนสี} & \textbf{ระยะที่ถูกน้ำชะเคลื่อนที่ ($\text{cm}$)} & \textbf{สรุปแรงกระทำทางไฟฟ้ากับเส้นใยประจุลบ} \\
\midrule
Methylene Blue & ประจุบวก ($+$) & ............ & ................................................ \\
Eosin / Nigrosin & ประจุลบ ($-$) & ............ & ................................................ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\section*{คำถามท้ายบทที่ 7 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)}
\begin{enumerate}
    \item เพราะเหตุใดในการส่องดูแคปซูล (Capsule) ของแบคทีเรียด้วยเทคนิค Negative Staining จึงนิยมใช้สีย้อมประจุลบ เช่น Nigrosin แทนการใช้สีย้อมประจุบวกทั่วไป
    \item หากประจุสองตัววางห่างกันเพิ่มขึ้นเป็น $2$ เท่าของระยะเดิม ขนาดของแรงทางไฟฟ้าระหว่างประจุทั้งสองจะลดลงเหลือกี่เท่าของค่าเดิม
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch07_electrostatics_staining.tex"), "w", encoding="utf-8") as f:
    f.write(ch07)

# ====================================================================
# CHAPTER 8: ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส (Week 9 + Lab 8)
# ====================================================================
ch08 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 8\quad ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส (สัปดาห์ที่ 9)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)}
\begin{itemize}
    \item 8.1 กระแสไฟฟ้า ความต่างศักย์ ความต้านทาน และกฎของโอห์ม ($V = IR$)
    \item 8.2 กำลังไฟฟ้า ($P = VI$) ความร้อนจูลในสารละลายบัฟเฟอร์ และความปลอดภัยทางไฟฟ้าในห้องปฏิบัติการเปียก
    \item 8.3 หลักการทางฟิสิกส์ของเจลอิเล็กโทรโฟรีซิส (Gel Electrophoresis) ในการแยกขนาดสายดีเอ็นเอและโปรตีนของจุลินทรีย์
    \item 8.4 ปฏิบัติการที่ 8 การวัดค่าตามกฎของโอห์มและการทดลองจำลองการเคลื่อนที่ของโมเลกุลมีประจุในสนามไฟฟ้า
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item ใช้สามเหลี่ยมสูตรกฎของโอห์ม ($V = IR$) และกำลังไฟฟ้า ($P = VI$) คำนวณหาปริมาณทางไฟฟ้าได้ถูกต้อง \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายกลไกทางฟิสิกส์ของเครื่อง Gel Electrophoresis ได้ว่าทำไมต้องหยดตัวอย่าง DNA ฝั่งขั้วลบ (Cathode) เพื่อวิ่งไปหาขั้วบวก (Anode) และทำไมการเพิ่มความเข้มข้นของบัฟเฟอร์มากเกินไปจึงทำให้เจลร้อนจัดจนหลอมละลาย \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการวัดค่าทางไฟฟ้าด้วยมัลติมิเตอร์อย่างปลอดภัยตามหลักจรรยาบรรณห้องปฏิบัติการ \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{Inquiry-Based Lab}\quad วิเคราะห์คำขวัญจำง่ายสำหรับการรันเจลดีเอ็นเอ ``\textbf{Run to Red}'' (ดีเอ็นเอมีประจุลบจึงวิ่งเข้าหาขั้วบวกสายสีแดงเสมอ)
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 8 แหล่งจ่ายไฟกระแสตรง มัลติมิเตอร์ดิจิทัล และชุดกล่อง Gel Electrophoresis
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item ใบงานคำนวณกฎของโอห์มและกำลังไฟฟ้า \textbf{(CLO1, CLO2)}
    \item การประเมินทักษะการใช้มัลติมิเตอร์และรายงานปฏิบัติการที่ 8 \textbf{(CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{ไฟฟ้ากระแส กฎของโอห์ม และอิเล็กโทรโฟรีซิส}
\index{ไฟฟ้ากระแส}\index{กฎของโอห์ม}\index{เจลอิเล็กโทรโฟรีซิส}\index{การแยกดีเอ็นเอ}

\section{กระแสไฟฟ้า ความต้านทาน และกฎของโอห์ม}

เมื่อมี\textbf{ความต่างศักย์ไฟฟ้า} (\textbf{Voltage}, $V$ มีหน่วยเป็น\textbf{โวลต์} $\text{V}$) ตกคร่อมตัวนำไฟฟ้าหรือสารละลายอิเล็กโทรไลต์ จะเกิดการไหลของประจุไฟฟ้าซึ่งเรียกว่า \textbf{กระแสไฟฟ้า} (\textbf{Electric Current}, $I$ มีหน่วยเป็น\textbf{แอมแปร์} $\text{A}$ หรือมิลลิแอมแปร์ $\text{mA}$ โดย $1\text{ A} = 1{,}000\text{ mA}$) ปริมาณกระแสไฟฟ้าที่ไหลได้จะถูกจำกัดด้วย\textbf{ความต้านทานไฟฟ้า} (\textbf{Resistance}, $R$ มีหน่วยเป็น\textbf{โอห์ม} $\Omega$) ตาม\textbf{กฎของโอห์ม} (\textbf{Ohm's Law}) ในสมการที่ (8.1)

\begin{equation}
    V = I R \qquad \Longleftrightarrow \qquad I = \frac{V}{R} \qquad \Longleftrightarrow \qquad R = \frac{V}{I}
\end{equation}

เมื่อกระแสไฟฟ้าไหลผ่านตัวต้านทานหรือสารละลายบัฟเฟอร์ จะเกิดอัตราการสูญเสียพลังงานไฟฟ้าไปเป็นพลังงานความร้อน ซึ่งคำนวณได้จาก\textbf{กำลังไฟฟ้า} (\textbf{Electric Power}, $P$ มีหน่วยเป็น\textbf{วัตต์} $\text{W}$) ตามสมการที่ (8.2)

\begin{equation}
    P = V I = I^2 R
\end{equation}

\section{ฟิสิกส์ของเจลอิเล็กโทรโฟรีซิสในการแยกดีเอ็นเอของจุลินทรีย์}

ในงานอณูจุลชีววิทยา (\textbf{Molecular Microbiology}) เมื่อเราเพิ่มปริมาณดีเอ็นเอของแบคทีเรียหรือไวรัสด้วยเทคนิค PCR แล้ว เราต้องตรวจสอบขนาดของสายดีเอ็นเอด้วยเครื่อง \textbf{เจลอิเล็กโทรโฟรีซิส} (\textbf{Agarose Gel Electrophoresis}) ซึ่งเป็นการบูรณาการฟิสิกส์ไฟฟ้าและแรงต้านความหนืดเข้าด้วยกันอย่างลงตัว ดังแสดงใน\mbox{ภาพที่} 8.1

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Gel Tank
    \fill[boxBlueBg] (0,0) rectangle (14.2,4.4);
    \draw[physRoyalBlue, line width=1.6pt, rounded corners=3pt] (0,0) rectangle (14.2,4.4);

    % Cathode (- Black) on Left
    \fill[charcoal] (0.5,0.4) rectangle (1.3,4.0);
    \node[white, font=\large\bfseries] at (0.9,2.2) {$-$};
    \node[above, font=\small\bfseries, color=charcoal] at (0.9,4.4) {ขั้วลบ (Cathode สีดำ)};

    % Anode (+ Red) on Right
    \fill[crimsonAlert] (12.9,0.4) rectangle (13.7,4.0);
    \node[white, font=\large\bfseries] at (13.3,2.2) {$+$};
    \node[above, font=\small\bfseries, color=crimsonAlert] at (13.3,4.4) {ขั้วบวก (Anode สีแดง)};

    % Agarose Gel Slab
    \fill[white, draw=physCyan, line width=1.4pt, rounded corners=2pt] (2.0,0.6) rectangle (12.2,3.8);
    \node[font=\footnotesize\bfseries, color=physCyan] at (7.1,3.5) {แผ่นวุ้นอะกาโรส (Agarose Gel Sieve Matrix)};

    % Sample Wells on Left (near Cathode -)
    \foreach \y in {1.1, 2.0, 2.9} {
        \fill[physRoyalBlue!30, draw=physRoyalBlue, line width=0.9pt] (2.5,\y) rectangle (2.9,\y+0.5);
    }
    \node[below, font=\scriptsize\bfseries, color=physRoyalBlue] at (2.7,0.6) {หลุมหยด DNA ($-$)};

    % DNA Bands migrating toward +
    % Large fragments (slow, stay near left)
    \fill[labPurple] (4.8,1.15) rectangle (5.1,1.55);
    \fill[labPurple] (4.8,2.05) rectangle (5.1,2.45);
    \node[below, font=\scriptsize\bfseries, color=labPurple] at (5.0,1.05) {DNA ชิ้นใหญ่ (ติดตาข่ายวุ้น เคลื่อนช้า)};

    % Medium fragments
    \fill[bioEmerald] (7.6,1.15) rectangle (7.9,1.55);
    \fill[bioEmerald] (7.6,2.95) rectangle (7.9,3.35);

    % Small fragments (fast, near right +)
    \fill[physAmber] (10.5,2.05) rectangle (10.8,2.45);
    \fill[physAmber] (10.5,2.95) rectangle (10.8,3.35);
    \node[below, font=\scriptsize\bfseries, color=physAmber!90!black] at (10.4,1.95) {DNA ชิ้นเล็ก (คล่องตัว วิ่งเร็วสุด)};

    % Electric Force Arrow
    \draw[->, line width=1.8pt, color=crimsonAlert] (3.3,2.7) -- node[above, font=\footnotesize\bfseries] {แรงทางไฟฟ้า $\vect{F}_e = q\vect{E}$ ดึง DNA ประจุลบมุ่งสู่ขั้วบวก (Run to Red)} (11.8,2.7);
\end{tikzpicture}%
}
\caption{หลักการแยกขนาดสายดีเอ็นเอด้วยสนามไฟฟ้าในแผ่นวุ้นอะกาโรส}
\end{figure}

\begin{bioappbox}[3 กฎฟิสิกส์ที่ควบคุมการแยกดีเอ็นเอใน Gel Electrophoresis]
\begin{enumerate}
    \item \textbf{ทิศทางการเคลื่อนที่}\quad โครงสร้างแกนหลักของสายดีเอ็นเอมีหมู่ฟอสเฟต ($\text{PO}_4^{3-}$) จึงมีประจุสุทธิเป็นลบเสมอ ดังนั้นต้องวางหลุมหยดดีเอ็นเอไว้ฝั่ง\textbf{ขั้วลบ (สายสีดำ)} เพื่อให้แรงไฟฟ้าดึงดีเอ็นเอวิ่งไปหา\textbf{ขั้วบวก (สายสีแดง)} ตามหลักจำง่ายว่า \textbf{Run to Red}
    \item \textbf{การแยกตามขนาดโมเลกุล}\quad แผ่นวุ้นอะกาโรสทำหน้าที่เหมือนตาข่ายกรองระดับโมเลกุล สายดีเอ็นเอที่มีขนาดสั้น (คู่เบสน้อย) จะเกิดแรงเสียดทานน้อยจึงวิ่งไปได้ไกลกว่าสายดีเอ็นเอขนาดยาว
    \item \textbf{ทำไมห้ามใช้น้ำเปล่าแทนบัฟเฟอร์ TAE/TBE}\quad น้ำกลั่นบริสุทธิ์ไม่มีไอออนนำไฟฟ้า ($R$ สูงมาก กระแส $I \approx 0$) ดีเอ็นเอจึงไม่เคลื่อนที่ แต่ถ้าใช้บัฟเฟอร์ที่เข้มข้นเกินไป ความต้านทาน $R$ จะต่ำเกินไปทำให้กระแส $I$ พุ่งสูงและเกิดความร้อน $P = I^2R$ จนแผ่นวุ้นหลอมละลาย!
\end{enumerate}
\end{bioappbox}

\begin{worked}[การคำนวณความต้านทานและกำลังความร้อนของชุด Gel Electrophoresis]
\textbf{โจทย์ปัญหา}\quad ในการรันเจลอะกาโรสเพื่อตรวจสอบยีนของแบคทีเรีย นักศึกษาตั้งค่าแหล่งจ่ายไฟไว้ที่ความต่างศักย์ $V = 100\text{ V}$ และอ่านค่ากระแสไฟฟ้าบนหน้าจอได้ $I = 0.05\text{ A}$ ($50\text{ mA}$) จงคำนวณหา (ก) ความต้านทานไฟฟ้า ($R$) ของระบบเจลและบัฟเฟอร์ และ (ข) กำลังไฟฟ้า ($P$) ที่เปลี่ยนเป็นความร้อนในอ่างเจล

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 หาความต้านทานจากสามเหลี่ยมกฎของโอห์ม ($R = V / I$)}
    \[
        R = \frac{100\text{ V}}{0.05\text{ A}} = 2{,}000\text{ }\Omega
    \]
    \item \textbf{ขั้นที่ 2 หากำลังไฟฟ้าจากสูตร $P = V \times I$}
    \[
        P = 100\text{ V} \times 0.05\text{ A} = 5.0\text{ W}
    \]
\end{enumerate}
\textbf{คำตอบ}\quad ระบบเจลมีความต้านทานเท่ากับ $2{,}000\text{ }\Omega$ และเกิดกำลังความร้อนในอ่างบัฟเฟอร์เท่ากับ $5.0\text{ W}$
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 9}

\begin{labbox}[ปฏิบัติการที่ 8\quad กฎของโอห์มและแบบจำลอง Gel Electrophoresis (3 ชั่วโมง)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (กฎของโอห์มและกำลังไฟฟ้า), CLO2 (อธิบายกลไก Gel Electrophoresis), CLO3 (ความปลอดภัยทางไฟฟ้า), CLO4 (รายงานกลุ่ม)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item แหล่งจ่ายไฟกระแสตรงปรับค่าได้, ตัวต้านทานมาตรฐาน, มัลติมิเตอร์ดิจิทัล และชุดกล่องจำลอง Gel Electrophoresis พร้อมแผ่นวุ้นอะกาโรสและสีมาตรฐานจำลองขนาดดีเอ็นเอ
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การตรวจสอบกฎของโอห์ม}\quad ต่อวงจรแหล่งจ่ายไฟเข้ากับตัวต้านทาน ปรับแรงดันไฟฟ้าเป็น $2\text{ V}, 4\text{ V}, 6\text{ V}$ และ $8\text{ V}$ วัดค่ากระแสไฟฟ้า $I$ คำนวณความต้านทาน $R = V/I$
    \item \textbf{ตอนที่ 2 การแยกสีย้อมมาตรฐานด้วยสนามไฟฟ้าในแผ่นวุ้น}\quad ใช้ไมโครปิเปตหยดสารละลายสีผสมปริมาตร $15\text{ }\mu\text{L}$ ลงในหลุมวุ้นฝั่งขั้วลบ ปิดฝาครอบนิรภัย จ่ายแรงดันไฟฟ้า $100\text{ V}$ เป็นเวลา $20$ นาที บันทึกค่ากระแสไฟฟ้า ($\text{mA}$) และวัดระยะทางที่แถบสีแต่ละแถบเคลื่อนที่ไปหาขั้วบวก
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{>{\raggedright\arraybackslash}X c c c c}
\toprule
\textbf{แรงดันไฟฟ้า $V$ ($\text{V}$)} & \textbf{กระแสไฟฟ้า $I$ ($\text{A}$)} & \textbf{ความต้านทาน $R = V/I$ ($\Omega$)} & \textbf{กำลังไฟฟ้า $P = VI$ ($\text{W}$)} & \textbf{ระยะเคลื่อนที่แถบสี ($\text{mm}$)} \\
\midrule
$50\text{ V}$ & ............ & ............ & ............ & ............ \\
$100\text{ V}$ & ............ & ............ & ............ & ............ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\section*{คำถามท้ายบทที่ 8 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)}
\begin{enumerate}
    \item หากนักศึกษาเผลอเสียบสายไฟขั้วบวกและขั้วลบของกล่อง Gel Electrophoresis สลับด้านกัน จะเกิดอะไรขึ้นกับตัวอย่างดีเอ็นเอที่หยดไว้ในหลุมวุ้น
    \item ตู้อบเลี้ยงเชื้อจุลินทรีย์ใช้กับไฟบ้านความต่างศักย์ $220\text{ V}$ และมีกระแสไฟฟ้าไหลผ่าน $2.5\text{ A}$ จงคำนวณหากำลังไฟฟ้าของตู้อบเครื่องนี้ในหน่วยวัตต์ ($\text{W}$)
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch08_current_electrophoresis.tex"), "w", encoding="utf-8") as f:
    f.write(ch08)

# ====================================================================
# CHAPTER 9: ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง (Week 10 + Lab 9)
# ====================================================================
ch09 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 9\quad ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง (สัปดาห์ที่ 10)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)}
\begin{itemize}
    \item 9.1 ธรรมชาติของแสง สเปกตรัมคลื่นแม่เหล็กไฟฟ้า และดัชนีหักเหของตัวกลาง ($n = c/v$)
    \item 9.2 กฎการสะท้อนของแสงและกฎการหักเหของสเนลล์ในบริบทการส่องสไลด์จุลชีววิทยา
    \item 9.3 การประยุกต์ใช้เครื่องวัดดัชนีหักเห (Refractometer) วัดความเข้มข้นน้ำตาลในการหมักด้วยจุลินทรีย์
    \item 9.4 ปฏิบัติการที่ 9 การศึกษาทางเดินรังสีแสงสะท้อน แสงหักเห และการวัดค่าบริกซ์ (Brix) ของอาหารหมัก
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item อธิบายความหมายของดัชนีหักเห ($n$) และทิศทางการเบนของลำแสงเมื่อเดินทางผ่านตัวกลางต่างชนิดกันได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายหลักการทำงานของเครื่อง Hand Refractometer ในการวัดปริมาณน้ำตาล ($^\circ\text{Brix}$) ของกระบวนการหมักไวน์หรืออาหารเลี้ยงเชื้อได้ \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการทดลองลากแนวรังสีแสงตกกระทบและรังสีหักเหอย่างละเอียดรอบคอบ \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{Hands-on Optical Ray Tracing}\quad ใช้กล่องกำเนิดลำแสงเลเซอร์ฉายผ่านแท่งแก้วปริซึมและสารละลายน้ำตาลความเข้มข้นต่างกัน พร้อมจำกฎง่ายๆ โดยไม่ต้องกดเครื่องคิดเลขตรีโกณมิติว่า ``\textbf{น้อยไปมาก เบนเข้าหาเส้นแนวฉาก / มากไปน้อย เบนออกจากเส้นแนวฉาก}''
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 9 ชุดกล่องแสงเลเซอร์ แท่งพลาสติกใส และเครื่องวัดความหวาน Hand Refractometer
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item คำถามท้ายคาบเรื่องดัชนีหักเหและทิศทางการเบนของแสง \textbf{(CLO1, CLO2)}
    \item รายงานปฏิบัติการที่ 9 \textbf{(CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{ทัศนศาสตร์พื้นฐาน การสะท้อน และการหักเหของแสง}
\index{ทัศนศาสตร์}\index{ดัชนีหักเห}\index{กฎของสเนลล์}\index{เครื่องวัดความหวาน Refractometer}

\section{ธรรมชาติของแสงและดัชนีหักเหของตัวกลางทางชีวภาพ}

แสงที่ตามนุษย์มองเห็น (\textbf{Visible Light}) เป็นคลื่นแม่เหล็กไฟฟ้าที่มีช่วงความยาวคลื่น ($\lambda$) อยู่ระหว่าง $400\text{ nm}$ (แสงสีม่วง) ถึง $700\text{ nm}$ (แสงสีแดง) ในสุญญากาศหรือในอากาศ แสงเดินทางด้วยอัตราเร็วสูงสุดคงที่คือ $c \approx 3.0 \times 10^8\text{ m/s}$ แต่เมื่อแสงเดินทางเข้าสู่ตัวกลางโปร่งใสอื่นๆ เช่น น้ำ กลีเซอรีน กระจกสไลด์ หรือน้ำมันช่วยส่อง (\textbf{Immersion Oil}) อัตราเร็วของแสง ($v$) จะลดลง อัตราส่วนระหว่างอัตราเร็วแสงในสุญญากาศต่ออัตราเร็วแสงในตัวกลางนั้น เรียกว่า \textbf{ดัชนีหักเห} (\textbf{Refractive Index}, $n$) ดังสมการที่ (9.1)

\begin{equation}
    n = \frac{c}{v}
\end{equation}

ตัวกลางที่มีความหนาแน่นเชิงแสงมากจะมีค่าดัชนีหักเห $n$ สูง และแสงจะเดินทางผ่านได้ช้าลง ค่าดัชนีหักเหของตัวกลางที่เกี่ยวข้องกับการส่องกล้องจุลทรรศน์แสดงไว้ใน\mbox{ตารางที่} 9.1

\begin{table}[H]
\centering
\caption{ค่าดัชนีหักเห ($n$) ของตัวกลางสำคัญในงานกล้องจุลทรรศน์และจุลชีววิทยา}
\small
\begin{tabularx}{\textwidth}{>{\bfseries}p{4.5cm} c >{\raggedright\arraybackslash}X}
\toprule
ชนิดของตัวกลาง & ดัชนีหักเห ($n$) & ความสำคัญในงานจุลชีววิทยา \\
\midrule
อากาศ (Air) & $1.000$ & ช่องว่างระหว่างแผ่นสไลด์กับเลนส์ใกล้วัตถุกำลังขยายต่ำ (4x, 10x, 40x) \\
น้ำบริสุทธิ์ (Water) & $1.333$ & ตัวกลางหลักภายในไซโทพลาซึมของเซลล์สด (ทำให้เซลล์สดดูใสเมื่อไม่ย้อมสี) \\
กระจกสไลด์และแผ่นปิดสไลด์ & $1.515$ & วัสดุมาตรฐานของแผ่นสไลด์แก้วและเลนส์ใกล้วัตถุของกล้องจุลทรรศน์ \\
น้ำมันช่วยส่อง (Immersion Oil) & $1.515$ & มีค่า $n$ เท่ากับกระจกสไลด์ทุกประการ ใช้หยดเชื่อมเลนส์หัวน้ำมัน 100x เพื่อป้องกันแสงหักเหหนี \\
\bottomrule
\end{tabularx}
\end{table}

\section{กฎการสะท้อนและกฎการหักเหของแสงฉบับไม่ต้องจำตรีโกณมิติ}

เมื่อลำแสงตกกระทบผิวรอยต่อระหว่างตัวกลางสองชนิดโดยทำมุมตกกระทบ $\theta_1$ กับ\textbf{เส้นแนวฉาก} (\textbf{Normal Line} คือเส้นประที่ลากตั้งฉากกับผิวรอยต่อ) แสงส่วนหนึ่งจะสะท้อนกลับโดยมี\textbf{มุมตกกระทบเท่ากับมุมสะท้อนเสมอ} ($\theta_{\text{incident}} = \theta_{\text{reflected}}$) และแสงอีกส่วนหนึ่งจะทะลุผ่านเข้าสู่ตัวกลางที่สองโดยเกิดการเบนทิศทางตาม\textbf{กฎของสเนลล์} (\textbf{Snell's Law}) ในสมการที่ (9.2)

\begin{equation}
    n_1 \sin\theta_1 = n_2 \sin\theta_2
\end{equation}

สำหรับนักศึกษาจุลชีววิทยา เราสามารถสรุปทิศทางการหักเหของแสงเพื่อนำไปใช้วิเคราะห์กล้องจุลทรรศน์ได้ทันทีโดยไม่ต้องกดเครื่องคิดเลขหาค่าไซน์ ($\sin$) ดังแสดงใน\mbox{ภาพที่} 9.1

\begin{figure}[H]
\centering
\resizebox{0.86\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Air (n=1.0) to Glass (n=1.515) -> Bend TOWARD Normal
    \begin{scope}[shift={(0,0)}]
        \fill[boxBlueBg] (0,0) rectangle (6.4,2.2);
        \fill[white] (0,2.2) rectangle (6.4,4.4);
        \draw[physRoyalBlue, line width=1.4pt] (0,2.2) rectangle (6.4,4.4);
        \draw[physRoyalBlue, line width=1.4pt] (0,0) rectangle (6.4,2.2);
        \draw[dashed, physSlate, line width=1.1pt] (3.2,0.2) -- (3.2,4.2);

        \draw[->, crimsonAlert, line width=1.8pt] (1.2,4.0) -- (3.2,2.2);
        \draw[->, crimsonAlert, line width=1.8pt] (3.2,2.2) -- (4.1,0.3);

        \node[font=\footnotesize\bfseries, color=physSlate] at (1.3,2.5) {อากาศ ($n_1 = 1.0$)};
        \node[font=\footnotesize\bfseries, color=physRoyalBlue] at (1.5,1.8) {กระจกสไลด์ ($n_2 = 1.515$)};
        \node[font=\small\bfseries, color=physRoyalBlue] at (3.2,-0.45) {(ก) $n$ น้อย $\rightarrow$ $n$ มาก (เบนเข้าหาเส้นฉาก)};
    \end{scope}

    % Right: Glass (n=1.515) to Air (n=1.0) -> Bend AWAY from Normal
    \begin{scope}[shift={(7.6,0)}]
        \fill[white] (0,2.2) rectangle (6.4,4.4);
        \fill[boxBlueBg] (0,0) rectangle (6.4,2.2);
        \draw[crimsonAlert, line width=1.4pt] (0,0) rectangle (6.4,4.4);
        \draw[crimsonAlert, line width=1.2pt] (0,2.2) -- (6.4,2.2);
        \draw[dashed, physSlate, line width=1.1pt] (3.2,0.2) -- (3.2,4.2);

        \draw[->, bioEmerald, line width=1.8pt] (2.2,0.3) -- (3.2,2.2);
        \draw[->, crimsonAlert, line width=1.8pt] (3.2,2.2) -- (5.8,3.6);

        \node[font=\footnotesize\bfseries, color=physSlate] at (1.4,2.5) {อากาศ ($n_2 = 1.0$)};
        \node[font=\footnotesize\bfseries, color=physRoyalBlue] at (1.6,1.8) {กระจกสไลด์ ($n_1 = 1.515$)};
        \node[font=\small\bfseries, color=crimsonAlert] at (3.2,-0.45) {(ข) $n$ มาก $\rightarrow$ $n$ น้อย (เบนหนีออกจากเส้นฉาก)};
    \end{scope}
\end{tikzpicture}%
}
\caption{ทิศทางการเบนของลำแสงเมื่อเดินทางผ่านรอยต่อระหว่างอากาศกับกระจกสไลด์}
\end{figure}

\begin{worked}[การคำนวณอัตราเร็วของแสงเมื่อเดินทางผ่านแผ่นสไลด์แก้วและน้ำ]
\textbf{โจทย์ปัญหา}\quad แสงเดินทางในสุญญากาศด้วยอัตราเร็ว $c = 3.0 \times 10^8\text{ m/s}$ เมื่อลำแสงจากหลอดไฟใต้กล้องจุลทรรศน์เดินทางผ่านหยดน้ำบนสไลด์ซึ่งมีดัชนีหักเห $n = 1.33$ อัตราเร็วของแสงในหยดน้ำ ($v$) จะมีค่าเท่าใด

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 ใช้สามเหลี่ยมสูตรดัชนีหักเห $n = c / v$ ปิดตัวแปร $v$ จะได้ $v = c / n$}
    \[
        v = \frac{c}{n}
    \]
    \item \textbf{ขั้นที่ 2 แทนค่าตัวเลขแล้วหารกัน}
    \[
        v = \frac{3.0 \times 10^8\text{ m/s}}{1.33} \approx 2.26 \times 10^8\text{ m/s}
    \]
\end{enumerate}
\textbf{คำตอบ}\quad อัตราเร็วของแสงขณะเดินทางผ่านหยดน้ำบนสไลด์มีค่าเท่ากับ $2.26 \times 10^8\text{ m/s}$
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 10}

\begin{labbox}[ปฏิบัติการที่ 9\quad การสะท้อนและการหักเหของแสงผ่านตัวกลางและสารละลาย (3 ชั่วโมง)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (การสะท้อนและการหักเหของแสง), CLO3 (ทักษะการทดลองทางแสง), CLO4 (รายงานกลุ่ม)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item ชุดกล่องกำเนิดลำแสงเลเซอร์, กระจกเงาระนาบ, แท่งอะคริลิกใสครึ่งวงกลม, กระดาษกราฟวงกลมวัดมุม (Protractor)
    \item เครื่องวัดดัชนีหักเหและความหวาน (Hand Refractometer) และสารละลายน้ำตาลกลูโคสความเข้มข้น $5\%, 10\%$ และ $20\%$
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การตรวจสอบกฎการหักเหของแสง}\quad วางแท่งอะคริลิกใสบนกระดาษวัดมุม ฉายลำแสงเลเซอร์จากอากาศเข้าสู่อะคริลิกด้วยมุมตกกระทบ $\theta_1 = 30^\circ$ และ $45^\circ$ อ่านค่ามุมหักเห $\theta_2$ และสังเกตว่าลำแสงเบนเข้าหาเส้นแนวฉากจริงหรือไม่
    \item \textbf{ตอนที่ 2 การใช้เครื่อง Refractometer ติดตามความเข้มข้นน้ำตาลสำหรับการหมักจุลินทรีย์}\quad หยดน้ำกลั่นปรับตั้งศูนย์เครื่อง Hand Refractometer จากนั้นหยดสารละลายน้ำตาลกลูโคส $5\%, 10\%$ และ $20\%$ อ่านค่าองศาบริกซ์ ($^\circ\text{Brix}$) ซึ่งแปรผันตรงกับดัชนีหักเหของสารละลาย
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{>{\raggedright\arraybackslash}X c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{ตัวอย่างสารละลายและการทดลอง} & \textbf{มุมตกกระทบ $\theta_1$ หรือความเข้มข้น} & \textbf{มุมหักเห $\theta_2$ หรือค่า $^\circ\text{Brix}$} & \textbf{สรุปทิศทางการเบนของแสง} \\
\midrule
แสงผ่านอากาศสู่อะคริลิก ครั้งที่ 1 & $\theta_1 = 30^\circ$ & $\theta_2 = $ ............ & ........................................ \\
แสงผ่านอากาศสู่อะคริลิก ครั้งที่ 2 & $\theta_1 = 45^\circ$ & $\theta_2 = $ ............ & ........................................ \\
สารละลายน้ำตาลกลูโคสหมักยีสต์ & $10\%$ และ $20\%$ & ............ / ............ $^\circ\text{Brix}$ & ........................................ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\section*{คำถามท้ายบทที่ 9 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)}
\begin{enumerate}
    \item เพราะเหตุใดการส่องดูเซลล์แบคทีเรียที่มีชีวิตในหยดน้ำ (Wet Mount) โดยไม่ย้อมสี จึงมองเห็นขอบเขตเซลล์ได้ยากมาก จงอธิบายโดยเปรียบเทียบดัชนีหักเหของไซโทพลาซึมกับน้ำรอบเซลล์
    \item เมื่อแสงเดินทางออกจากแผ่นสไลด์แก้ว ($n = 1.515$) ออกสู่ชั้นอากาศ ($n = 1.000$) ลำแสงจะเบนเข้าหาหรือเบนหนีออกจากเส้นแนวฉาก
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch09_optics_refraction.tex"), "w", encoding="utf-8") as f:
    f.write(ch09)

# ====================================================================
# CHAPTER 10: กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง (Week 11 + Lab 10)
# ====================================================================
ch10 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 10\quad กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง (สัปดาห์ที่ 11)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)}
\begin{itemize}
    \item 10.1 หลักการเกิดภาพของเลนส์นูนและระบบเลนส์คู่ของกล้องจุลทรรศน์แบบใช้แสง (Compound Light Microscope)
    \item 10.2 กำลังขยายรวม ($M_{\text{total}}$) ค่าตัวเลขรูรับแสง (Numerical Aperture, $\text{NA}$) และขีดจำกัดการแยกชัด ($d_{\min}$)
    \item 10.3 ฟิสิกส์ของน้ำมันช่วยส่อง (Immersion Oil, $n = 1.515$) สำหรับเลนส์ใกล้วัตถุกำลังขยาย 100x
    \item 10.4 ปฏิบัติการที่ 10 การหาความยาวโฟกัสเลนส์นูนและพิสูจน์ความแตกต่างของภาพแบคทีเรียที่หัวเลนส์ 100x เมื่อใช้และไม่ใช้น้ำมันช่วยส่อง
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item คำนวณกำลังขยายรวมและขีดจำกัดการแยกชัด ($d_{\min} = 0.61\lambda / \text{NA}$) ของกล้องจุลทรรศน์ได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายเหตุผลทางฟิสิกส์ของดัชนีหักเหได้ว่าทำไมเมื่อใช้หัวเลนส์ 100x จึงต้องหยด Immersion Oil เสมอ และทำไมการเพิ่มกำลังขยายแต่เพียงอย่างเดียวโดยไม่เพิ่มค่า $\text{NA}$ จึงได้เพียงภาพขยายที่เบลอ (Empty Magnification) \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติการใช้และทำความสะอาดเลนส์หัวน้ำมันของกล้องจุลทรรศน์อย่างถูกวิธีตามจรรยาบรรณห้องแล็บ \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{Problem-Based Lab}\quad ให้นักศึกษาเปรียบเทียบการคำนวณค่า $d_{\min}$ ของแสงสีน้ำเงิน ($\lambda = 450\text{ nm}$) กับแสงสีแดง ($\lambda = 650\text{ nm}$) เพื่อตอบคำถามว่าทำไมกล้องจุลทรรศน์คุณภาพสูงจึงนิยมใส่แผ่นกรองแสงสีน้ำเงิน (Blue Filter) ไว้ใต้ฐานไฟ
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 10 กล้องจุลทรรศน์แบบใช้แสง สไลด์ถาวรแบคทีเรียย้อมสีแกรม และน้ำมันช่วยส่อง Immersion Oil
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item การตรวจใบงานคำนวณกำลังขยายและขีดจำกัดการแยกชัด \textbf{(CLO1, CLO2)}
    \item การสอบปฏิบัติทักษะการใช้หัวเลนส์ 100x และรายงานปฏิบัติการที่ 10 \textbf{(CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{กล้องจุลทรรศน์ ขีดจำกัดการแยกชัด และน้ำมันช่วยส่อง}
\index{กล้องจุลทรรศน์}\index{ขีดจำกัดการแยกชัด}\index{น้ำมันช่วยส่อง Immersion Oil}\index{Numerical Aperture}

\section{ระบบเลนส์และกำลังขยายรวมของกล้องจุลทรรศน์}

กล้องจุลทรรศน์แบบใช้แสงประกอบด้วยเลนส์นูน 2 ชุดทำงานร่วมกัน ได้แก่ \textbf{เลนส์ใกล้วัตถุ} (\textbf{Objective Lens} ซึ่งมีกำลังขยาย $M_{\text{obj}}$ ให้เลือกตั้งแต่ $4\times, 10\times, 40\times$ และ $100\times$) ทำหน้าที่สร้างภาพจริงหัวกลับขนาดขยายขึ้นมาก่อนในขั้นแรก จากนั้น\textbf{เลนส์ใกล้ตา} (\textbf{Ocular Lens} หรือ Eyepiece ซึ่งปกติมีกำลังขยาย $M_{\text{oc}} = 10\times$) จะทำหน้าที่ขยายภาพนั้นซ้ำอีกครั้งจนเกิดเป็น\textbf{ภาพเสมือนหัวกลับขนาดใหญ่}ที่ตาของนักศึกษามองเห็น โดยคำนวณ\textbf{กำลังขยายรวม} (\textbf{Total Magnification}, $M_{\text{total}}$) ได้จากผลคูณอย่างง่ายในสมการที่ (10.1)

\begin{equation}
    M_{\text{total}} = M_{\text{obj}} \times M_{\text{oc}}
\end{equation}

ตัวอย่างเช่น เมื่อหมุนเลนส์ใกล้วัตถุหัวน้ำมัน $100\times$ ร่วมกับเลนส์ใกล้ตา $10\times$ จะได้กำลังขยายรวมเท่ากับ $100 \times 10 = 1{,}000$ เท่า

\section{ขีดจำกัดการแยกชัดและเหตุผลทางฟิสิกส์ที่ต้องหยดน้ำมันช่วยส่อง}

ในงานจุลชีววิทยา ภาพที่ขยายใหญ่ขึ้นไม่ได้แปลว่าจะคมชัดเสมอไป หัวใจสำคัญที่สุดของกล้องจุลทรรศน์คือ \textbf{อำนาจการแยกชัด} (\textbf{Resolution}) ซึ่งวัดจากระยะห่างที่แคบที่สุดระหว่างจุดสองจุดที่กล้องยังสามารถแยกออกเป็นสองจุดได้ เรียกว่า \textbf{ขีดจำกัดการแยกชัด} (\textbf{Limit of Resolution}, $d_{\min}$) ตามสมการของอับเบอ (Abbe's Equation) ในสมการที่ (10.2)

\begin{equation}
    d_{\min} = \frac{0.61 \lambda}{\text{NA}} = \frac{0.61 \lambda}{n \sin\theta}
\end{equation}

โดยที่ $\lambda$ คือความยาวคลื่นของแสงที่ใช้ส่อง, $n$ คือดัชนีหักเหของตัวกลางที่อยู่ระหว่างแผ่นสไลด์กับหน้าเลนส์ใกล้วัตถุ, $\theta$ คือครึ่งมุมกรวยของแสงที่เข้าสู่เลนส์ และ $\text{NA} = n\sin\theta$ คือ\textbf{ค่าตัวเลขรูรับแสง} (\textbf{Numerical Aperture}) ซึ่งพิมพ์กำกับไว้ข้างกระบอกเลนส์ใกล้วัตถุทุกหัว (เช่น $100\times / 1.25\text{ Oil}$)

\begin{conceptbox}[ทำไมค่า $d_{\min}$ ยิ่งน้อย ภาพแบคทีเรียยิ่งคมชัด]
\begin{itemize}
    \item ค่า $d_{\min}$ คือระยะห่างน้อยที่สุดที่แยกออกได้ ดังนั้น \textbf{ยิ่งค่า $d_{\min}$ มีค่าน้อย กล้องจุลทรรศน์ยิ่งมีความละเอียดคมชัดสูง}
    \item การทำให้ $d_{\min}$ มีค่าน้อยลงทำได้ 2 วิธี คือ \textbf{(1) ลดความยาวคลื่นแสง $\lambda$} (เช่น ใช้แผ่นกรองแสงสีน้ำเงิน $\lambda \approx 450\text{ nm}$ หรือใช้ลำอิเล็กตรอนในกล้องจุลทรรศน์อิเล็กตรอน) และ \textbf{(2) เพิ่มค่าดัชนีหักเห $n$} โดยการหยด\textbf{น้ำมันช่วยส่อง} (\textbf{Immersion Oil}, $n = 1.515$) แทนที่อากาศ ($n = 1.000$)
\end{itemize}
\end{conceptbox}

ดังแสดงใน\mbox{ภาพที่} 10.1 เมื่อใช้หัวเลนส์ $100\times$ ซึ่งอยู่ชิดแผ่นสไลด์มาก หากปล่อยให้มีช่องว่างเป็นอากาศ ($n = 1.000$) ลำแสงที่พุ่งออกจากแผ่นสไลด์แก้ว ($n = 1.515$) จะหักเหเบนหนีออกจากเส้นแนวฉากและเกิดการสะท้อนกลับหมดจนไม่เข้าสู่หน้าเลนส์ ภาพจึงมืดและพร่ามัว แต่เมื่อหยด \textbf{Immersion Oil} ซึ่งมีค่า $n = 1.515$ เท่ากับเนื้อกระจกสไลด์ทุกประการ แสงจะเดินทางเป็นเส้นตรงจากสไลด์ผ่านหยดน้ำมันเข้าสู่เลนส์ใกล้วัตถุได้เต็มที่โดยไม่เกิดการหักเหสูญเสียลำแสง ทำให้ค่า $\text{NA}$ เพิ่มขึ้นถึง $1.25\text{--}1.40$ และแยกชัดได้ถึงระดับ $d_{\min} \approx 0.2\text{ }\mu\text{m}$ ($200\text{ nm}$)

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Left: Dry (Air gap n=1.0) -> Rays Refracted Away
    \begin{scope}[shift={(0,0)}]
        \draw[fill=boxRedBg, draw=crimsonAlert, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.8);
        \node[font=\bfseries\color{crimsonAlert}] at (3.4,4.35) {(ก) ไม่หยดน้ำมัน (ผ่านอากาศ $n = 1.000$)};

        % Slide
        \fill[physCyan!25, draw=physRoyalBlue, line width=1.1pt] (1.0,1.2) rectangle (5.8,1.9);
        \node[font=\scriptsize\bfseries, color=physRoyalBlue] at (3.4,1.55) {กระจกสไลด์ ($n = 1.515$)};
        \fill[crimsonAlert] (3.4,1.9) circle (2.8pt);

        % Objective Lens 100x
        \fill[charcoal!85, draw=charcoal, line width=1.2pt] (2.2,2.7) -- (4.6,2.7) -- (5.0,3.8) -- (1.8,3.8) -- cycle;
        \fill[physCyan!40] (2.4,2.7) rectangle (4.4,2.95);
        \node[white, font=\footnotesize\bfseries] at (3.4,3.35) {เลนส์ใกล้วัตถุ 100x};

        % Light Rays refracting out
        \draw[->, crimsonAlert, line width=1.5pt] (3.4,1.9) -- (2.6,2.2) -- (1.1,2.5);
        \draw[->, crimsonAlert, line width=1.5pt] (3.4,1.9) -- (4.2,2.2) -- (5.7,2.5);
        \draw[->, physAmber, line width=1.2pt] (3.4,1.9) -- (3.1,2.7);
        \draw[->, physAmber, line width=1.2pt] (3.4,1.9) -- (3.7,2.7);

        \node[font=\footnotesize, align=center, color=charcoal] at (3.4,0.55) {แสงหักเหหนีออกด้านข้าง (สูญเสียแสง)\\ค่า $\text{NA}$ ต่ำ $\rightarrow$ \textbf{ภาพแบคทีเรียมืดและเบลอ}};
    \end{scope}

    % Right: With Immersion Oil (n=1.515) -> Straight Rays into Lens
    \begin{scope}[shift={(7.6,0)}]
        \draw[fill=boxGreenBg, draw=bioEmerald, line width=1.2pt, rounded corners=4pt] (0,0) rectangle (6.8,4.8);
        \node[font=\bfseries\color{bioEmerald!90!black}] at (3.4,4.35) {(ข) หยดน้ำมันช่วยส่อง ($n = 1.515$)};

        % Slide
        \fill[physCyan!25, draw=physRoyalBlue, line width=1.1pt] (1.0,1.2) rectangle (5.8,1.9);
        \node[font=\scriptsize\bfseries, color=physRoyalBlue] at (3.4,1.55) {กระจกสไลด์ ($n = 1.515$)};

        % Oil Drop bridging slide and lens
        \fill[physAmber!45, draw=physAmber, line width=1.0pt] (2.1,1.9) rectangle (4.7,2.7);
        \node[font=\scriptsize\bfseries, color=physAmber!90!black] at (5.5,2.3) {Immersion Oil};

        \fill[bioEmerald] (3.4,1.9) circle (2.8pt);

        % Objective Lens 100x
        \fill[charcoal!85, draw=charcoal, line width=1.2pt] (2.2,2.7) -- (4.6,2.7) -- (5.0,3.8) -- (1.8,3.8) -- cycle;
        \fill[physCyan!40] (2.4,2.7) rectangle (4.4,2.95);
        \node[white, font=\footnotesize\bfseries] at (3.4,3.35) {เลนส์ใกล้วัตถุ 100x};

        % Light Rays going straight into lens
        \draw[->, bioEmerald!90!black, line width=1.6pt] (3.4,1.9) -- (2.5,2.85);
        \draw[->, bioEmerald!90!black, line width=1.6pt] (3.4,1.9) -- (4.3,2.85);
        \draw[->, bioEmerald!90!black, line width=1.6pt] (3.4,1.9) -- (2.9,2.85);
        \draw[->, bioEmerald!90!black, line width=1.6pt] (3.4,1.9) -- (3.9,2.85);

        \node[font=\footnotesize, align=center, color=charcoal] at (3.4,0.55) {$n_{\text{glass}} = n_{\text{oil}} = 1.515$ แสงพุ่งตรงเข้าเลนส์เต็มที่\\ค่า $\text{NA} = 1.25$ $\rightarrow$ \textbf{แยกชัดถึง $0.22\text{ }\mu\text{m}$ คมกริบ}};
    \end{scope}
\end{tikzpicture}%
}
\caption{การเปรียบเทียบทางเดินแสงเข้าสู่เลนส์ใกล้วัตถุ 100x ระหว่างกรณีไม่หยดน้ำมันและกรณีหยดน้ำมันช่วยส่อง}
\end{figure}

\begin{worked}[การคำนวณขีดจำกัดการแยกชัดของกล้องจุลทรรศน์เมื่อใช้หัวเลนส์น้ำมัน 100x]
\textbf{โจทย์ปัญหา}\quad นักศึกษาส่องดูแบคทีเรียย้อมสีแกรมด้วยเลนส์ใกล้วัตถุหัวน้ำมัน $100\times$ ซึ่งมีค่า $\text{NA} = 1.25$ โดยใช้แสงสีเขียว-น้ำเงินที่มีความยาวคลื่นเฉลี่ย $\lambda = 500\text{ nm}$ ($0.50\text{ }\mu\text{m}$) จงคำนวณหาขีดจำกัดการแยกชัด ($d_{\min}$) ของกล้องจุลทรรศน์นี้ และพิจารณาว่ากล้องตัวนี้สามารถมองเห็นเซลล์แบคทีเรียขนาด $1.0\text{ }\mu\text{m}$ และไวรัสขนาด $0.08\text{ }\mu\text{m}$ ($80\text{ nm}$) แยกเป็นอนุภาคชัดเจนได้หรือไม่

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 แทนค่า $\lambda = 0.50\text{ }\mu\text{m}$ และ $\text{NA} = 1.25$ ลงในสูตร $d_{\min} = \dfrac{0.61\lambda}{\text{NA}}$}
    \[
        d_{\min} = \frac{0.61 \times 0.50\text{ }\mu\text{m}}{1.25} = \frac{0.305}{1.25} = 0.244\text{ }\mu\text{m} \quad (\text{หรือ } 244\text{ nm})
    \]
    \item \textbf{ขั้นที่ 2 เปรียบเทียบขนาดสิ่งมีชีวิตกับค่า $d_{\min} = 0.244\text{ }\mu\text{m}$}
    \begin{itemize}
        \item เซลล์แบคทีเรียมีขนาด $1.0\text{ }\mu\text{m}$ ซึ่ง\textbf{ใหญ่กว่า}ขีดจำกัด $0.244\text{ }\mu\text{m}$ จึง\textbf{มองเห็นรูปร่างได้อย่างคมชัด}
        \item ไวรัสมีขนาด $0.08\text{ }\mu\text{m}$ ซึ่ง\textbf{เล็กกว่า}ขีดจำกัด $0.244\text{ }\mu\text{m}$ จึง\textbf{ไม่สามารถมองเห็นได้ด้วยกล้องจุลทรรศน์แบบใช้แสง} (ต้องใช้กล้องจุลทรรศน์อิเล็กตรอน)
    \end{itemize}
\end{enumerate}
\textbf{คำตอบ}\quad ขีดจำกัดการแยกชัดมีค่าเท่ากับ $0.244\text{ }\mu\text{m}$ ($244\text{ nm}$) สามารถมองเห็นแบคทีเรียได้ชัดเจน แต่ไม่สามารถมองเห็นไวรัสได้
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 11}

\begin{labbox}[ปฏิบัติการที่ 10\quad เลนส์นูน กล้องจุลทรรศน์ และบทบาทของ Immersion Oil (3 ชั่วโมง)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (ทัศนศาสตร์ของเลนส์และกล้องจุลทรรศน์), CLO2 (การใช้ Immersion Oil แก้ปัญหาภาพมัว), CLO3 (วินัยการดูแลรักษาหัวเลนส์), CLO4 (รายงานกลุ่ม)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item เลนส์นูนพร้อมรางวัดความยาวโฟกัส ($f$), กล้องจุลทรรศน์แบบใช้แสง, สไลด์ถาวรแบคทีเรียย้อมสีแกรม (\textit{S. aureus} และ \textit{E. coli}), น้ำมันช่วยส่อง (Immersion Oil) และกระดาษเช็ดเลนส์ (Lens Paper)
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item บันทึกค่ากำลังขยาย ($M_{\text{obj}}$) และค่าตัวเลขรูรับแสง ($\text{NA}$) ที่พิมพ์อยู่บนกระบอกเลนส์ใกล้วัตถุทั้ง 4 หัว ($4\times, 10\times, 40\times$ และ $100\times$) พร้อมคำนวณค่า $d_{\min}$ ที่ความยาวคลื่นแสง $\lambda = 550\text{ nm}$ ($0.55\text{ }\mu\text{m}$)
    \item ปรับโฟกัสสไลด์แบคทีเรียที่หัวเลนส์ $10\times$ และ $40\times$ จากนั้นหมุนกึ่งกลางก่อนเข้าหัว $100\times$ ลองสังเกตความสว่างและความคมชัดก่อนหยดน้ำมัน เทียบกับหลังหยด Immersion Oil 1 หยดลงบนสไลด์แล้วหมุนหัว $100\times$ แตะหยดน้ำมันพร้อมปรับปุ่มละเอียด (Fine Adjustment)
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{c c c c >{\raggedright\arraybackslash}X}
\toprule
\textbf{หัวเลนส์ใกล้วัตถุ} & \textbf{กำลังขยายรวม $M_{\text{total}}$} & \textbf{ค่า $\text{NA}$ บนเลนส์} & \textbf{ค่า $d_{\min}$ ที่คำนวณได้ ($\mu\text{m}$)} & \textbf{ลักษณะความคมชัดของเซลล์แบคทีเรีย} \\
\midrule
$10\times$ & $100\times$ & $0.25$ & ............ & ................................................ \\
$40\times$ & $400\times$ & $0.65$ & ............ & ................................................ \\
$100\times$ (Oil) & $1{,}000\times$ & $1.25$ & ............ & ................................................ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\section*{คำถามท้ายบทที่ 10 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)}
\begin{enumerate}
    \item เลนส์ใกล้วัตถุขนาด $40\times$ มีค่า $\text{NA} = 0.65$ หากใช้แสงสีเขียวที่มีความยาวคลื่น $\lambda = 0.55\text{ }\mu\text{m}$ จงคำนวณหาค่าขีดจำกัดการแยกชัด ($d_{\min}$) ในหน่วยไมโครเมตร
    \item เพราะเหตุใดหลังเสร็จสิ้นการส่องกล้องจุลทรรศน์ด้วยหัวเลนส์น้ำมัน $100\times$ นักศึกษาจึงต้องใช้กระดาษเช็ดเลนส์เช็ดคราบน้ำมันออกจากหน้าเลนส์ทันที และห้ามให้หัวเลนส์ $40\times$ สัมผัสโดนหยดน้ำมันโดยเด็ดขาด
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch10_microscope_immersion_oil.tex"), "w", encoding="utf-8") as f:
    f.write(ch10)

# ====================================================================
# CHAPTER 11: กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์ (Week 12 + Lab 11)
# ====================================================================
ch11 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 11\quad กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์ (สัปดาห์ที่ 12)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (บรรยาย 2 ชั่วโมง และปฏิบัติการ 3 ชั่วโมง)}
\begin{itemize}
    \item 11.1 โครงสร้างนิวเคลียส ไอโซโทปกัมมันตรังสี และชนิดของรังสี (แอลฟา บีตา แกมมา และรังสีอัลตราไวโอเลต)
    \item 11.2 แนวคิดครึ่งชีวิต ($T_{1/2}$) และการคำนวณจำนวนที่เหลืออยู่ด้วยการหารครึ่งทีละขั้นโดยไม่ใช้ลอการิทึม
    \item 11.3 การประยุกต์ใช้รังสีแกมมาและรังสี UV-C ($254\text{ nm}$) ในการทำลายดีเอ็นเอของจุลินทรีย์และกฎกำลังสองผกผันของความเข้มรังสี
    \item 11.4 ปฏิบัติการที่ 11 การจำลองการสลายตัวตามครึ่งชีวิตและการศึกษาผลของระยะห่างและเวลาฉายรังสี UV ต่อประสิทธิภาพการฆ่าเชื้อ
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item เปรียบเทียบอำนาจทะลุทะลวงของรังสีแอลฟา บีตา แกมมา และรังสี UV-C และคำนวณครึ่งชีวิตด้วยวิธีหารสองเป็นขั้นๆ ได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายเหตุผลทางฟิสิกส์ว่าทำไมรังสี UV-C จึงใช้ฆ่าเชื้อได้เฉพาะบนพื้นผิวและในตู้ปลอดเชื้อ (Biosafety Cabinet) แต่ไม่สามารถทะลุผ่านฝาพลาสติกของจานเพาะเชื้อได้ ในขณะที่รังสีแกมมาสามารถทะลุฆ่าเชื้อเวชภัณฑ์ทั้งกล่องได้ \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item ปฏิบัติตามหลักความปลอดภัยทางรังสี 3 ประการ (เวลา ระยะห่าง และฉากกั้น) อย่างเคร่งครัด \textbf{(CLO3, CLO4 เชื่อมโยง PLO1, PLO5, PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{Simulation \& Data Plotting}\quad ใช้การทอดลูกเต๋าหรือเหรียญจำลองการสลายตัวกัมมันตรังสีและการตายของประชากรแบคทีเรียเมื่อได้รับรังสี (Decimal Reduction Time, ค่า $D$-value) เพื่อสร้างกราฟการลดลงแบบครึ่งชีวิตด้วยตนเอง
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 11 ชุดจำลองครึ่งชีวิต และเครื่องวัดความเข้มแสง/รังสี UV ตามระยะห่าง
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item แบบฝึกหัดการคำนวณครึ่งชีวิตและกฎกำลังสองผกผัน \textbf{(CLO1, CLO2)}
    \item กราฟครึ่งชีวิตและรายงานปฏิบัติการที่ 11 \textbf{(CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{กัมมันตภาพรังสีและการฉายรังสีควบคุมจุลินทรีย์}
\index{กัมมันตภาพรังสี}\index{ครึ่งชีวิต}\index{รังสีแกมมา}\index{รังสีอัลตราไวโอเลต UV-C}

\section{ชนิดของรังสีและอำนาจทะลุทะลวงในงานจุลชีววิทยา}

รังสีที่นำมาประยุกต์ใช้ในงานจุลชีววิทยาและการแพทย์แบ่งออกเป็น 2 กลุ่มใหญ่ตามพลังงาน ได้แก่ \textbf{รังสีไม่ก่อไอออน} (\textbf{Non-Ionizing Radiation}) เช่น \textbf{รังสีอัลตราไวโอเลตชนิดซี} (\textbf{UV-C} ความยาวคลื่นประมาณ $254\text{ nm}$) ซึ่งมีพลังงานพอเหมาะที่จะถูกดูดกลืนโดยสายดีเอ็นเอของแบคทีเรียและไวรัส ทำให้เกิดพันธะเชื่อมผิดปกติระหว่างเบสไทมีน (\textbf{Thymine Dimer}) จนจุลินทรีย์ไม่สามารถจำลองตัวเองและตายในที่สุด อย่างไรก็ตาม รังสี UV-C มีอำนาจทะลุทะลวงต่ำมาก แม้แต่แผ่นแก้วหรือฝาพลาสติกใสของจานเพาะเชื้อก็กั้นรังสี UV-C ได้เกือบหมด จึงใช้สำหรับการฆ่าเชื้อบนพื้นผิวโต๊ะปฏิบัติการและอากาศภายใน\textbf{ตู้ปลอดเชื้อชีวภาพ} (\textbf{Biosafety Cabinet}) เท่านั้น

ส่วนอีกกลุ่มหนึ่งคือ \textbf{รังสีก่อไอออน} (\textbf{Ionizing Radiation}) ที่เกิดจากการสลายตัวของนิวเคลียสกัมมันตรังสี ได้แก่ \textbf{รังสีแอลฟา} ($\alpha$ กั้นได้ด้วยแผ่นกระดาษ), \textbf{รังสีบีตา} ($\beta$ กั้นได้ด้วยแผ่นอะลูมิเนียมบาง) และ\textbf{รังสีแกมมา} ($\gamma$ เช่น จากโคบอลต์-60, $^{60}\text{Co}$) ซึ่งเป็นคลื่นแม่เหล็กไฟฟ้าพลังงานสูงมากที่มีอำนาจทะลุทะลวงผ่านกล่องพัสดุและพลาสติกได้อย่างสมบูรณ์ จึงนิยมใช้ฉายรังสีฆ่าเชื้อเข็มฉีดยา จานเพาะเชื้อพลาสติกสำเร็จรูป และอาหารส่งออก ดังแสดงใน\mbox{ภาพที่} 11.1

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Sources on Left
    \foreach \y/\lbl/\col in {3.6/{รังสี UV-C (254 nm)}/labPurple, 2.5/{รังสีแอลฟา ($\alpha$)}/crimsonAlert, 1.4/{รังสีบีตา ($\beta$)}/physAmber, 0.3/{รังสีแกมมา ($\gamma$, $^{60}\text{Co}$)}/bioEmerald} {
        \fill[\col!20, draw=\col, line width=1.1pt, rounded corners=2pt] (0,\y-0.3) rectangle (3.5,\y+0.35);
        \node[font=\footnotesize\bfseries, color=\col!90!black] at (1.75,\y) {\lbl};
    }

    % Barrier 1: Plastic Petri Dish Lid / Paper
    \fill[physCyan!25, draw=physRoyalBlue, line width=1.2pt] (5.2,-0.2) rectangle (5.8,4.2);
    \node[above, font=\scriptsize\bfseries, align=center, color=physRoyalBlue] at (5.5,4.2) {ฝาพลาสติกจานเพาะเชื้อ\\หรือแผ่นกระดาษ};

    % Barrier 2: Aluminum / Thick Plastic Box
    \fill[physSlate!35, draw=physSlate, line width=1.2pt] (8.5,-0.2) rectangle (9.2,4.2);
    \node[above, font=\scriptsize\bfseries, align=center, color=charcoal] at (8.85,4.2) {แผ่นอะลูมิเนียม\\หรือกล่องเวชภัณฑ์};

    % Barrier 3: Thick Lead / Concrete
    \fill[charcoal!75, draw=charcoal, line width=1.4pt] (12.0,-0.2) rectangle (13.0,4.2);
    \node[above, font=\scriptsize\bfseries, align=center, color=charcoal] at (12.5,4.2) {กำแพงตะกั่วหนา\\หรือคอนกรีต};

    % Rays
    \draw[->, labPurple, line width=1.8pt, decorate, decoration={snake, amplitude=0.7mm, segment length=3mm}] (3.5,3.6) -- (5.2,3.6);
    \node[right, font=\scriptsize\bfseries, color=labPurple] at (5.9,3.6) {ถูกฝาพลาสติกกั้น (ฆ่าเชื้อเฉพาะผิวเปิดโล่ง)};

    \draw[->, crimsonAlert, line width=1.8pt] (3.5,2.5) -- (5.2,2.5);
    \draw[->, physAmber, line width=1.8pt] (3.5,1.4) -- (8.5,1.4);
    \draw[->, bioEmerald, line width=2.0pt, decorate, decoration={snake, amplitude=0.7mm, segment length=3mm}] (3.5,0.3) -- (12.0,0.3);
    \node[above, font=\scriptsize\bfseries, color=bioEmerald!90!black] at (10.5,0.4) {ทะลุฆ่าเชื้อจานเพาะเชื้อทั้งลัง};
\end{tikzpicture}%
}
\caption{การเปรียบเทียบอำนาจทะลุทะลวงของรังสี UV-C รังสีแอลฟา รังสีบีตา และรังสีแกมมาในการฆ่าเชื้อทางจุลชีววิทยา}
\end{figure}

\section{การคำนวณครึ่งชีวิตแบบเข้าใจง่ายโดยไม่ต้องใช้ลอการิทึม}

\textbf{ครึ่งชีวิต} (\textbf{Half-Life}, $T_{1/2}$) คือระยะเวลาที่สารกัมมันตรังสีสลายตัวจนเหลือปริมาณเพียง\textbf{ครึ่งหนึ่ง} ($50\%$ หรือ $\frac{1}{2}$) ของปริมาณเริ่มต้น นักศึกษาไม่จำเป็นต้องใช้ฟังก์ชันเอกซ์โพเนนเชียลหรือลอการิทึมในการคำนวณ แต่สามารถใช้\textbf{วิธีนับจำนวนรอบของการหารครึ่ง} ($n = \text{เวลาทั้งหมด } t \div T_{1/2}$) ได้ทันทีตามสมการที่ (11.1)

\begin{equation}
    N = N_0 \times \left(\frac{1}{2}\right)^n \qquad \text{โดยที่} \qquad n = \frac{t}{T_{1/2}}
\end{equation}

กล่าวคือ เมื่อผ่านไป $1$ ครึ่งชีวิตจะเหลือ $\frac{1}{2}$ ($50\%$), ผ่านไป $2$ ครึ่งชีวิตจะเหลือ $\frac{1}{4}$ ($25\%$), ผ่านไป $3$ ครึ่งชีวิตจะเหลือ $\frac{1}{8}$ ($12.5\%$) และผ่านไป $4$ ครึ่งชีวิตจะเหลือ $\frac{1}{16}$ ($6.25\%$) ตามลำดับ

นอกจากนี้ ในการใช้งานหลอดรังสี UV-C เพื่อฆ่าเชื้อ ความเข้มของรังสี ($I$) ที่ตกกระทบบนพื้นผิวจะลดลงตาม\textbf{กฎกำลังสองผกผันของระยะห่าง} (\textbf{Inverse Square Law}) คือ $I \propto 1/r^2$ ดังนั้น หากวางจานเพาะเชื้อห่างจากหลอด UV เพิ่มขึ้นเป็น $2$ เท่า ความเข้มรังสี UV ที่ตกกระทบจะลดลงเหลือเพียง $1/2^2 = 1/4$ เท่าของเดิม

\begin{worked}[การคำนวณครึ่งชีวิตของไอโซโทปติดตามทางชีววิทยาด้วยวิธีหารสองทีละขั้น]
\textbf{โจทย์ปัญหา}\quad นักวิจัยจุลชีววิทยาใช้ไอโซโทปฟอสฟอรัส-32 ($^{32}\text{P}$) ซึ่งมีครึ่งชีวิต $T_{1/2} = 14\text{ วัน}$ ในการติดฉลากสายดีเอ็นเอของแบคทีเรีย หากเริ่มต้นมีสารกัมมันตรังสี $^{32}\text{P}$ มวล $N_0 = 80\text{ }\mu\text{g}$ เมื่อเก็บไว้เป็นเวลา $t = 42\text{ วัน}$ จะเหลือ $^{32}\text{P}$ อยู่กี่ไมโครกรัม ($\mu\text{g}$)

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 หาจำนวนรอบของครึ่งชีวิต ($n = t / T_{1/2}$)}
    \[
        n = \frac{42\text{ วัน}}{14\text{ วันต่อรอบ}} = 3\text{ รอบครึ่งชีวิต}
    \]
    \item \textbf{ขั้นที่ 2 นำค่าเริ่มต้น $80\text{ }\mu\text{g}$ มาหารด้วย $2$ จำนวน $3$ ครั้งต่อเนื่องกัน}
    \[
        80\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 1 (14 วัน)}} 40\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 2 (28 วัน)}} 20\text{ }\mu\text{g} \xrightarrow{\text{รอบที่ 3 (42 วัน)}} 10\text{ }\mu\text{g}
    \]
\end{enumerate}
\textbf{คำตอบ}\quad เมื่อเวลาผ่านไป $42\text{ วัน}$ จะเหลือไอโซโทป $^{32}\text{P}$ อยู่เท่ากับ $10\text{ }\mu\text{g}$
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 12}

\begin{labbox}[ปฏิบัติการที่ 11\quad การจำลองครึ่งชีวิตกัมมันตภาพรังสีและประสิทธิภาพรังสี UV (3 ชั่วโมง)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (ครึ่งชีวิตและกฎกำลังสองผกผัน), CLO2 (การควบคุมจุลินทรีย์ด้วยรังสี UV), CLO3 (ความปลอดภัยทางรังสี), CLO4 (การเขียนกราฟครึ่งชีวิต)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item เหรียญหรือลูกเต๋าจำลองอะตอมกัมมันตรังสีและเซลล์แบคทีเรียจำนวน 100 ชิ้น พร้อมกล่องเขย่า
    \item แหล่งกำเนิดแสงจำลองหลอด UV และเครื่องวัดความเข้มแสงดิจิทัล (Lux / UV Radiometer) พร้อมไม้บรรทัดวัดระยะห่าง
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item \textbf{ตอนที่ 1 การจำลองกราฟการสลายตัวแบบครึ่งชีวิต}\quad เริ่มต้นด้วยเหรียญจำนวน $N_0 = 100$ เหรียญ เขย่าในกล่องแล้วเทออก คัดเหรียญที่หงายหน้าก้อยออก (ถือว่าสลายตัวหรือเซลล์ตายจากรังสี) นับจำนวนเหรียญที่เหลือรอด ($N$) บันทึกผลแล้วนำเหรียญที่เหลือมาเขย่าซ้ำอีก 5 รอบ เขียนกราฟระหว่างจำนวนที่เหลือ $N$ กับจำนวนรอบการเขย่า
    \item \textbf{ตอนที่ 2 การตรวจสอบกฎกำลังสองผกผันของความเข้มรังสีตามระยะห่าง}\quad วัดค่าความเข้มแสงเมื่อวางหัววัดห่างจากหลอดกำเนิดแสงเป็นระยะ $r = 10\text{ cm}, 20\text{ cm}$ และ $40\text{ cm}$ เปรียบเทียบอัตราส่วนความเข้มที่ลดลง
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{c c c c c c c}
\toprule
\textbf{รอบที่ ($n$)} & \textbf{เริ่มต้น ($n=0$)} & \textbf{รอบที่ 1} & \textbf{รอบที่ 2} & \textbf{รอบที่ 3} & \textbf{รอบที่ 4} & \textbf{รอบที่ 5} \\
\midrule
จำนวนตามทฤษฎี & $100$ & $50$ & $25$ & $12.5$ & $6.25$ & $3.125$ \\
จำนวนที่วัดได้จริง & $100$ & ........ & ........ & ........ & ........ & ........ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\section*{คำถามท้ายบทที่ 11 (ทบทวนแนวคิดและการคำนวณเบื้องต้น)}
\begin{enumerate}
    \item เพราะเหตุใดขณะเปิดหลอดรังสี UV-C ในตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) นักศึกษาจึงต้องปิดกระจกหน้าตู้ลงและห้ามสอดมือหรือจ้องมองแสงสีม่วงของหลอด UV โดยตรง
    \item หากการฉายรังสี UV-C ทุกๆ $2\text{ นาที}$ สามารถลดจำนวนแบคทีเรียบนพื้นผิวลงได้ครึ่งหนึ่ง ($50\%$) หากเริ่มต้นมีแบคทีเรีย $1{,}600\text{ เซลล์}$ เมื่อเปิดไฟฉายรังสีนาน $8\text{ นาที}$ จะเหลือแบคทีเรียรอดชีวิตกี่เซลล์
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch11_radioactivity_uv_sterilization.tex"), "w", encoding="utf-8") as f:
    f.write(ch11)

# ====================================================================
# CHAPTER 12: การบูรณาการฟิสิกส์กับเครื่องสเปกโตรโฟโตมิเตอร์และโครงงานย่อย (Weeks 13-14 + Labs 12-13)
# ====================================================================
ch12 = r"""\cleardoublepage
\phantomsection
\begin{planbox}[แผนบริหารการสอนประจำบทที่ 12\quad สเปกโตรโฟโตมิเตอร์และโครงงานบูรณาการ (สัปดาห์ที่ 13--14)]
\noindent\textbf{1. หัวข้อเนื้อหาประจำบท (สัปดาห์ที่ 13 และสัปดาห์ที่ 14 รวม 10 ชั่วโมง)}
\begin{itemize}
    \item 12.1 หลักการดูดกลืนแสงและการกระเจิงแสงของสารแขวนลอยเซลล์จุลินทรีย์
    \item 12.2 กฎของเบียร์-แลมเบิร์ต ($A = \varepsilon b c$) และความสัมพันธ์เชิงเส้นระหว่างค่า $\text{OD}_{600}$ กับความหนาแน่นเซลล์
    \item 12.3 ปฏิบัติการที่ 12 การใช้เครื่อง Spectrophotometer วัดค่า $\text{OD}_{600}$ และสร้างกราฟมาตรฐานการเจริญของจุลินทรีย์ (สัปดาห์ที่ 13)
    \item 12.4 ปฏิบัติการที่ 13 โครงงานย่อย (Mini-Project) การสังเคราะห์และนำเสนอหลักการฟิสิกส์ในเครื่องมือจุลชีววิทยา (สัปดาห์ที่ 14)
\end{itemize}

\noindent\textbf{2. วัตถุประสงค์เชิงพฤติกรรมและผลลัพธ์การเรียนรู้รายวิชา (CLOs ที่เชื่อมโยง PLOs)}
\begin{enumerate}
    \item อธิบายกฎของเบียร์-แลมเบิร์ตและคำนวณความเข้มข้นหรือความหนาแน่นของเซลล์จากค่าการดูดกลืนแสงได้ \textbf{(CLO1 เชื่อมโยง PLO2)}
    \item อธิบายเหตุผลทางฟิสิกส์ว่าทำไมก่อนวัดค่า $\text{OD}_{600}$ ของเชื้อแบคทีเรียจึงต้องเซตศูนย์ (Blank) ด้วยอาหารเลี้ยงเชื้อเหลวที่ยังไม่ใส่เชื้อ และทำไมเมื่อค่า $\text{OD}_{600}$ สูงเกิน $1.0$ จึงต้องเจือจางตัวอย่างก่อนวัด \textbf{(CLO1, CLO2 เชื่อมโยง PLO2, PLO3)}
    \item บูรณาการความรู้ฟิสิกส์ทั้งหมดในรายวิชาเพื่อวิเคราะห์เครื่องมือในห้องแล็บจุลชีววิทยาและนำเสนอโครงงานกลุ่มได้อย่างถูกต้องชัดเจน \textbf{(CLO2, CLO3, CLO4 เชื่อมโยง PLO1--PLO6)}
\end{enumerate}

\noindent\textbf{3. กิจกรรมการจัดการเรียนรู้เชิงรุก (Active Learning \& OBE)}
\begin{itemize}
    \item \textbf{สัปดาห์ที่ 13 (Integrated Instrument Lab)}\quad นักศึกษาฝึกเตรียมชุดเจือจางสารแขวนลอยเซลล์ (Serial Dilution) วัดค่า $\text{OD}_{600}$ และเขียนกราฟการเจริญของแบคทีเรีย (Bacterial Growth Curve)
    \item \textbf{สัปดาห์ที่ 14 (Project-Based Learning)}\quad นักศึกษาแต่ละกลุ่มเลือกเครื่องมือจุลชีววิทยา 1 ชนิด จัดทำโปสเตอร์อินโฟกราฟิกอธิบาย ``หลักการฟิสิกส์ + สมการเข้าใจง่าย + ข้อควรระวังหน้างาน'' และนำเสนอแลกเปลี่ยนเรียนรู้
\end{itemize}

\noindent\textbf{4. สื่อการเรียนรู้และแหล่งเรียนรู้}
\begin{itemize}
    \item เอกสารคำสอนบทที่ 12 เครื่องสเปกโตรโฟโตมิเตอร์ หลอดคิวเวตต์ (Cuvette) และเกณฑ์ประเมินโครงงานย่อย
\end{itemize}

\noindent\textbf{5. การวัดและประเมินผลประจำบท}
\begin{itemize}
    \item รายงานปฏิบัติการที่ 12 เรื่องการวัดค่า $\text{OD}_{600}$ \textbf{(CLO1, CLO2, CLO4)}
    \item การประเมินโครงงานย่อยและการนำเสนอในปฏิบัติการที่ 13 (15 คะแนน) \textbf{(CLO2, CLO3, CLO4)}
\end{itemize}
\end{planbox}
\clearpage

\chapter{สเปกโตรโฟโตมิเตอร์และการบูรณาการฟิสิกส์ในห้องปฏิบัติการจุลชีววิทยา}
\index{สเปกโตรโฟโตมิเตอร์}\index{กฎของเบียร์-แลมเบิร์ต}\index{ความหนาแน่นเชิงแสง OD600}\index{กราฟการเจริญของแบคทีเรีย}

\section{กฎของเบียร์-แลมเบิร์ตและการวัดความขุ่นของเซลล์ด้วยค่า OD600}

ในการศึกษาการเจริญเติบโตของแบคทีเรียหรือยีสต์ในอาหารเลี้ยงเชื้อเหลว การนับจำนวนโคโลนีบนจานวุ้น (Plate Count) ต้องใช้เวลาบ่มเชื้อนานถึง 24 ชั่วโมง นักจุลชีววิทยาจึงนิยมใช้วิธีทางฟิสิกส์เชิงแสงที่รวดเร็วภายในเวลาไม่กี่วินาที คือการใช้\textbf{เครื่องสเปกโตรโฟโตมิเตอร์} (\textbf{Spectrophotometer}) วัดค่าความหนาแน่นเชิงแสงที่ความยาวคลื่น $600\text{ nm}$ ซึ่งเรียกว่า \textbf{ค่า $\text{OD}_{600}$} (\textbf{Optical Density at 600 nm})

ดังแสดงใน\mbox{ภาพที่} 12.1 เมื่อลำแสงความยาวคลื่น $600\text{ nm}$ ที่มีความเข้มเริ่มต้น $I_0$ พุ่งผ่านหลอดวัดตัวอย่าง (\textbf{Cuvette}) ที่มีความกว้างช่วงแสง $b = 1\text{ cm}$ เซลล์จุลินทรีย์ที่แขวนลอยอยู่จะช่วยกันดูดกลืนและกระเจิงลำแสงออกไปด้านข้าง ทำให้แสงที่ทะลุผ่านไปถึงหัววัดด้านหลังเหลือความเข้มเพียง $I$ ปริมาณ\textbf{ค่าการดูดกลืนแสง} (\textbf{Absorbance}, $A$ หรือค่า $\text{OD}$) จะแปรผันตรงกับความเข้มข้นของสารหรือความหนาแน่นของเซลล์ ($c$) ตาม\textbf{กฎของเบียร์-แลมเบิร์ต} (\textbf{Beer-Lambert Law}) ในสมการที่ (12.1)

\begin{equation}
    A = \varepsilon b c
\end{equation}

โดยที่ $\varepsilon$ คือสัมประสิทธิ์การดูดกลืนแสงจำเพาะ, $b$ คือความกว้างของหลอดคิวเวตต์ (ปกติเท่ากับ $1.0\text{ cm}$) และ $c$ คือความเข้มข้นหรือความหนาแน่นของเซลล์จุลินทรีย์ เนื่องจาก $A$ แปรผันตรงกับ $c$ โดยตรง เราจึงสามารถใช้สมการสัดส่วนตรงเทียบหาจำนวนเซลล์ได้ทันทีโดยไม่ต้องใช้ลอการิทึม คือ

\begin{equation}
    \frac{\text{OD}_1}{\text{OD}_2} = \frac{c_1}{c_2}
\end{equation}

\begin{figure}[H]
\centering
\resizebox{0.88\textwidth}{!}{%
\begin{tikzpicture}[font=\sffamily, >=Stealth]
    % Light Source
    \fill[physAmber!30, draw=physAmber, line width=1.3pt, rounded corners=3pt] (0,1.2) rectangle (2.6,3.0);
    \node[font=\footnotesize\bfseries, align=center, color=physAmber!90!black] at (1.3,2.1) {แหล่งกำเนิดแสง\\และปริซึมคัดคลื่น\\$\lambda = 600\text{ nm}$};

    % Incident Beam I0
    \draw[->, physAmber, line width=3.2pt] (2.6,2.1) -- node[above, font=\small\bfseries, color=physAmber!90!black] {ความเข้มเริ่มต้น $I_0$} (5.4,2.1);

    % Cuvette (b = 1 cm)
    \fill[boxGreenBg] (5.4,0.6) rectangle (7.8,3.6);
    \draw[physRoyalBlue, line width=1.6pt] (5.4,3.8) -- (5.4,0.6) -- (7.8,0.6) -- (7.8,3.8);
    \draw[<->, physRoyalBlue, line width=1.0pt] (5.4,0.25) -- node[below, font=\scriptsize\bfseries] {ความกว้างหลอด $b = 1\text{ cm}$} (7.8,0.25);

    % Bacterial Cells scattering light inside Cuvette
    \foreach \x/\y in {6.0/1.4, 6.6/2.1, 7.2/2.7, 6.2/3.0, 7.1/1.3, 6.5/2.5} {
        \fill[bioEmerald] (\x,\y) ellipse (0.18cm and 0.09cm);
    }
    \draw[->, physAmber!80, dashed, line width=1.1pt] (6.6,2.1) -- (6.1,3.5);
    \draw[->, physAmber!80, dashed, line width=1.1pt] (6.6,2.1) -- (7.3,0.9);

    % Transmitted Beam I
    \draw[->, physAmber, line width=1.4pt] (7.8,2.1) -- node[above, font=\small\bfseries, color=physAmber!90!black] {แสงทะลุผ่าน $I$} (10.4,2.1);

    % Photodetector & Display
    \fill[boxBlueBg, draw=physRoyalBlue, line width=1.3pt, rounded corners=3pt] (10.4,1.0) rectangle (14.2,3.2);
    \node[font=\small\bfseries, color=physRoyalBlue] at (12.3,2.6) {หัววัดแสงและหน้าจอ};
    \node[font=\normalsize\bfseries, fill=charcoal, text=bioEmerald!40!white, rounded corners=2pt, inner sep=4pt] at (12.3,1.8) {$\text{OD}_{600} = 0.600$};
\end{tikzpicture}%
}
\caption{หลักการวัดความหนาแน่นของเซลล์จุลินทรีย์ด้วยการดูดกลืนและกระเจิงแสงที่ความยาวคลื่น 600 นาโนเมตร}
\end{figure}

\begin{warningbox}[ข้อควรระวังสำคัญ 3 ประการในการวัดค่า OD600 ด้วยเครื่อง Spectrophotometer]
\begin{enumerate}
    \item \textbf{ต้องเซตศูนย์ (Blank) ด้วยอาหารเลี้ยงเชื้อเหลวปลอดเชื้อชนิดเดียวกันเสมอ}\quad ห้ามใช้น้ำกลั่นเป็น Blank หากเชื้อเพาะเลี้ยงอยู่ใน Nutrient Broth ที่มีสีเหลืองใส เพราะสีของอาหารเลี้ยงเชื้อจะดูดกลืนแสงส่วนหนึ่งไปแล้ว
    \item \textbf{ช่วงความเป็นเส้นตรงอยู่ที่ $\text{OD}_{600}$ ระหว่าง $0.1$ ถึง $0.8$ (ไม่เกิน $1.0$)}\quad หากวัดตัวอย่างแล้วได้ค่า $\text{OD}_{600} > 1.0$ เซลล์จะหนาแน่นเกินไปจนบังแสงซ้อนกัน ต้องนำตัวอย่างมาเจือจาง (เช่น เจือจาง $10$ เท่า) ก่อนวัด แล้วจึงนำค่าที่อ่านได้ไปคูณตัวคูณการเจือจางกลับคืน
    \item \textbf{ห้ามจับด้านใสของหลอด Cuvette ด้วยมือเปล่า}\quad ให้จับเฉพาะด้านขุ่นหรือด้านบน และใช้กระดาษเช็ดเลนส์เช็ดหยดน้ำหรือรอยนิ้วมือออกก่อนใส่ลงในช่องวัดแสง
\end{enumerate}
\end{warningbox}

\begin{worked}[การคำนวณความเข้มข้นของเซลล์แบคทีเรียจากค่า OD600 และการเจือจาง]
\textbf{โจทย์ปัญหา}\quad จากกราฟมาตรฐานของแบคทีเรีย \textit{Escherichia coli} ทราบว่าที่ค่า $\text{OD}_{600} = 0.50$ จะมีความหนาแน่นเซลล์เท่ากับ $4.0 \times 10^8\text{ cells/mL}$ หากนักศึกษานำตัวอย่างเชื้อที่บ่มไว้มาเจือจางลง $5$ เท่า แล้วนำไปวัดในเครื่อง Spectrophotometer ได้ค่า $\text{OD}_{600} = 0.35$ จงหาว่าในขวดเลี้ยงเชื้อต้นฉบับ (ก่อนเจือจาง) มีความหนาแน่นเซลล์แบคทีเรียเท่าใด

\textbf{วิธีทำทีละขั้นตอนฉบับเข้าใจง่าย}
\begin{enumerate}
    \item \textbf{ขั้นที่ 1 หาความหนาแน่นเซลล์ของหลอดที่เจือจางแล้วโดยเทียบสัดส่วนตรง}
    \[
        c_{\text{diluted}} = 4.0 \times 10^8 \times \left(\frac{0.35}{0.50}\right) = 4.0 \times 10^8 \times 0.70 = 2.8 \times 10^8\text{ cells/mL}
    \]
    \item \textbf{ขั้นที่ 2 คูณด้วยตัวคูณการเจือจาง ($5$ เท่า) เพื่อหาความหนาแน่นในขวดต้นฉบับ}
    \[
        c_{\text{original}} = 2.8 \times 10^8 \times 5 = 14.0 \times 10^8 = 1.4 \times 10^9\text{ cells/mL}
    \]
\end{enumerate}
\textbf{คำตอบ}\quad ในขวดเลี้ยงเชื้อต้นฉบับมีความหนาแน่นเซลล์เท่ากับ $1.4 \times 10^9\text{ cells/mL}$
\end{worked}

\section{ปฏิบัติการประจำสัปดาห์ที่ 13 และสัปดาห์ที่ 14}

\begin{labbox}[ปฏิบัติการที่ 12\quad การวัดค่าการดูดกลืนแสง OD600 ประเมินการเจริญของจุลินทรีย์ (สัปดาห์ที่ 13)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมิน}\quad CLO1 (กฎของเบียร์-แลมเบิร์ต), CLO2 (การใช้เครื่อง Spectrophotometer), CLO3 (ความละเอียดรอบคอบ), CLO4 (การเขียนกราฟมาตรฐาน)

\vspace{4pt}
\noindent\textbf{1. วัสดุและอุปกรณ์}
\begin{itemize}
    \item เครื่องสเปกโตรโฟโตมิเตอร์ (ตั้งความยาวคลื่นที่ $\lambda = 600\text{ nm}$), หลอดคิวเวตต์ (Cuvette) ขนาด $1\text{ cm}$
    \item สารแขวนลอยยีสต์หรือแบคทีเรียความเข้มข้นเริ่มต้น ($100\%$) และชุดเจือจางที่ระดับ $80\%, 60\%, 40\%$ และ $20\%$ พร้อมหลอดอาหารเหลวปลอดเชื้อสำหรับทำ Blank
\end{itemize}

\noindent\textbf{2. ขั้นตอนการทดลอง}
\begin{enumerate}
    \item ปรับความยาวคลื่นเครื่อง Spectrophotometer ไปที่ $600\text{ nm}$ ใส่หลอด Blank (อาหารเหลวปลอดเชื้อ) แล้วกดปุ่มเซตศูนย์ ($\text{OD}_{600} = 0.000$)
    \item วัดค่า $\text{OD}_{600}$ ของสารแขวนลอยเซลล์ที่ความเข้มข้นสัมพัทธ์ $20\%, 40\%, 60\%, 80\%$ และ $100\%$ บันทึกผลและเขียนกราฟมาตรฐานระหว่างค่า $\text{OD}_{600}$ (แกนตั้ง) กับความเข้มข้นสัมพัทธ์ (แกนนอน)
\end{enumerate}

\noindent\textbf{3. ตารางบันทึกผลการทดลอง}
\begin{center}
\footnotesize
\begin{tabularx}{0.96\textwidth}{>{\raggedright\arraybackslash}X c c c c c}
\toprule
\textbf{ความเข้มข้นสัมพัทธ์ของเซลล์} & \textbf{Blank ($0\%$)} & \textbf{$20\%$} & \textbf{$40\%$} & \textbf{$60\%$} & \textbf{$80\%$} \\
\midrule
ค่า $\text{OD}_{600}$ ครั้งที่ 1 & $0.000$ & ............ & ............ & ............ & ............ \\
ค่า $\text{OD}_{600}$ ครั้งที่ 2 & $0.000$ & ............ & ............ & ............ & ............ \\
ค่าเฉลี่ย $\text{OD}_{600}$ & $0.000$ & ............ & ............ & ............ & ............ \\
\bottomrule
\end{tabularx}
\end{center}
\end{labbox}

\vspace{0.3cm}

\begin{labbox}[ปฏิบัติการที่ 13\quad โครงงานย่อยบูรณาการฟิสิกส์ในเครื่องมือจุลชีววิทยา (สัปดาห์ที่ 14)]
\noindent\textbf{ผลลัพธ์การเรียนรู้ที่ประเมินรวบยอด}\quad CLO2 (ประยุกต์ใช้หลักการฟิสิกส์อธิบายเครื่องมือและแก้ปัญหา), CLO3 (จรรยาบรรณและความปลอดภัย), CLO4 (การทำงานร่วมกันและการนำเสนอทางวิทยาศาสตร์)

\vspace{4pt}
\noindent\textbf{แนวทางการดำเนินโครงงานย่อย (Mini-Project 15 คะแนน)}
\begin{enumerate}
    \item นักศึกษาแบ่งกลุ่ม กลุ่มละ 3--4 คน เลือกเครื่องมือหรือเทคนิคในห้องปฏิบัติการจุลชีววิทยา 1 หัวข้อจากรายการต่อไปนี้
    \begin{itemize}
        \item \textbf{หัวข้อที่ 1}\quad ฟิสิกส์ของหม้อนึ่งความดันไอ (Autoclave) และการป้องกันความล้มเหลวในการฆ่าเอนโดสปอร์
        \item \textbf{หัวข้อที่ 2}\quad ฟิสิกส์ของเครื่องปั่นเหวี่ยง (Centrifuge) การแปลงค่า RPM เป็น RCF และการจัดสมดุลโรเตอร์
        \item \textbf{หัวข้อที่ 3}\quad ฟิสิกส์ของกล้องจุลทรรศน์กำลังขยายสูง 100x และบทบาทของดัชนีหักเหน้ำมันช่วยส่อง
        \item \textbf{หัวข้อที่ 4}\quad ฟิสิกส์ไฟฟ้าในเทคนิคการย้อมสีแกรมและเครื่องแยกดีเอ็นเอ (Gel Electrophoresis)
        \item \textbf{หัวข้อที่ 5}\quad ฟิสิกส์ของตู้ปลอดเชื้อชีวภาพ (Biosafety Cabinet) การไหลแบบราบเรียบของอากาศผ่านแผ่นกรอง HEPA และรังสี UV-C
    \end{itemize}
    \item จัดทำแผ่นภาพอินโฟกราฟิกหรือสไลด์นำเสนอความยาว 10 นาที ประกอบด้วย (ก) หลักการและสมการฟิสิกส์ฉบับเข้าใจง่าย, (ข) ตัวอย่างการคำนวณหน้างาน 1 ข้อ และ (ค) แนวทางแก้ปัญหาและความปลอดภัยในห้องปฏิบัติการจุลชีววิทยา
\end{enumerate}
\end{labbox}

\section*{คำถามท้ายบทที่ 12 และแนวข้อสอบปลายภาค (สัปดาห์ที่ 15)}
\begin{enumerate}
    \item เพราะเหตุใดในการวัดความหนาแน่นของเซลล์แบคทีเรียด้วยเครื่อง Spectrophotometer จึงต้องตั้งค่าความยาวคลื่นที่ $600\text{ nm}$ (แสงสีส้ม-เหลือง) แทนที่จะใช้รังสี UV ที่ความยาวคลื่น $260\text{ nm}$ หรือ $280\text{ nm}$
    \item นักศึกษาวัดค่า $\text{OD}_{600}$ ของเชื้อที่เจือจางลง $10$ เท่า ได้ค่าเท่ากับ $0.42$ จงหาว่าหากไม่เจือจาง ค่า $\text{OD}_{600}$ เทียบเท่าของเชื้อต้นฉบับจะมีค่าเท่าใด และเหตุใดจึงไม่ควรวัดเชื้อต้นฉบับโดยตรงโดยไม่เจือจาง
\end{enumerate}
"""

with open(os.path.join(CH_DIR, "ch12_spectrophotometry_project.tex"), "w", encoding="utf-8") as f:
    f.write(ch12)

print("[OK] Generated Chapters 7 to 12.")
