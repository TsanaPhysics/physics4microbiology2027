<?php
/**
 * imicrob_ai_api.php
 * Intelligent Backend API & RAG Engine for น้อง i-MicroB AI Bot Assistor
 * Course 4011111 Physics for Microbiology (2026/2027)
 * Faculty of Science & Technology, Rambhai Barni Rajabhat University
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$dbPath = __DIR__ . '/../database/virtual_lab.db';
$pdo = null;
try {
    if (file_exists($dbPath)) {
        $pdo = new PDO('sqlite:' . $dbPath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    // Database connection failure fallback
}

$action = $_GET['action'] ?? ($_POST['action'] ?? 'ask');

// 1. Get Live Stats from SQLite
if ($action === 'stats') {
    $totalStudents = 0;
    $totalReports = 0;
    $avgScore = 0;
    $latestTelemetry = 0;

    if ($pdo) {
        try {
            $totalStudents = (int)$pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
            $totalReports = (int)$pdo->query("SELECT COUNT(*) FROM lab_reports")->fetchColumn();
            $avgScore = (float)$pdo->query("SELECT AVG(score_total) FROM lab_reports WHERE score_total > 0")->fetchColumn();
            $latestTelemetry = (int)$pdo->query("SELECT COUNT(*) FROM lab_telemetry_logs")->fetchColumn();
        } catch (Exception $e) {}
    }

    echo json_encode([
        'success' => true,
        'bot_name' => 'น้อง i-MicroB',
        'title' => 'Microbiology Biophysics AI Assistor',
        'stats' => [
            'total_students' => $totalStudents,
            'total_reports' => $totalReports,
            'avg_score' => round($avgScore, 1),
            'total_experiments' => $latestTelemetry
        ]
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// 2. Lookup Student Score / Status
if ($action === 'student_lookup') {
    $sid = trim($_GET['student_id'] ?? ($_POST['student_id'] ?? ''));
    if (!$sid || !$pdo) {
        echo json_encode(['success' => false, 'message' => 'ไม่พบรหัสนักศึกษา']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = :sid");
        $stmt->execute([':sid' => $sid]);
        $student = $stmt->fetch();

        if (!$student) {
            echo json_encode([
                'success' => false,
                'message' => "น้อง i-MicroB ค้นหาไม่พบรหัสนักศึกษา $sid ในฐานข้อมูลเนี่ยฮิ ลองตรวจสอบเลขรหัสอีกครั้งนะฮิ!"
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }

        $rStmt = $pdo->prepare("SELECT lab_id, report_code, accuracy_score, instructor_score, status, submitted_at FROM lab_reports WHERE student_id = :sid ORDER BY submitted_at ASC");
        $rStmt->execute([':sid' => $sid]);
        $reports = $rStmt->fetchAll();

        echo json_encode([
            'success' => true,
            'student' => $student,
            'reports' => $reports,
            'message' => "พบน้องนักศึกษา " . $student['fullname'] . " แล้วเนี่ยฮิ! ส่งรายงานแล้ว " . count($reports) . " ปฏิบัติการ"
        ], JSON_UNESCAPED_UNICODE);
        exit;
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        exit;
    }
}

// 3. Intelligent RAG Question-Answering
$input = json_decode(file_get_contents('php://input'), true);
$query = trim($_POST['q'] ?? ($input['q'] ?? ($input['message'] ?? ($_GET['q'] ?? ''))));
$lang = trim($_POST['lang'] ?? ($input['lang'] ?? ($_GET['lang'] ?? 'th')));

if (!$query) {
    echo json_encode([
        'success' => true,
        'reply' => "สวัสดีฮิ! น้อง **i-MicroB** พร้อมช่วยตอบทุกคำถาม ทั้งเนื้อหา 12 บทเรียน, 13 แล็บเสมือนจริง 3D, สูตรคำนวณ หรือตรวจคะแนน ถามมาได้เลยเนี่ยฮิ! 🔬✨"
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$qLower = mb_strtolower($query, 'UTF-8');

// Live SQLite Query Hook if question is asking for statistics
if (preg_match('/(กี่คน|นักศึกษา|สถิติ|รายงานกี่|ส่งกี่)/u', $qLower)) {
    if ($pdo) {
        try {
            $stCount = (int)$pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
            $rpCount = (int)$pdo->query("SELECT COUNT(*) FROM lab_reports")->fetchColumn();
            $reply = "📊 **สถิติสดจากฐานข้อมูลห้องปฏิบัติการเสมือนจริง (SQLite Live)**:\n"
                   . "• นักศึกษาลงทะเบียนในระบบ: **{$stCount} คน**\n"
                   . "• ส่งรายงานผลการทดลองแล้ว: **{$rpCount} ฉบับ**\n"
                   . "นักศึกษาสามารถพิมพ์รหัสนักศึกษา 8 หลัก (เช่น 67144001) ให้น้อง i-MicroB เช็กคะแนนรายบุคคลได้ทันทีเนี่ยฮิ!";
            echo json_encode(['success' => true, 'reply' => $reply, 'source' => 'sqlite_live'], JSON_UNESCAPED_UNICODE);
            exit;
        } catch (Exception $e) {}
    }
}

// Check if user is checking their own score by entering 8-11 digit student ID
if (preg_match('/^\d{8,11}$/', trim($query)) || preg_match('/(ตรวจคะแนน|คะแนน|ผลการเรียน|รหัส)\s*(\d{8,11})/u', $query, $matches)) {
    $sid = isset($matches[2]) ? $matches[2] : trim($query);
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = :sid");
            $stmt->execute([':sid' => $sid]);
            $student = $stmt->fetch();
            if ($student) {
                $rStmt = $pdo->prepare("SELECT lab_id, report_code, accuracy_score, instructor_score, status, submitted_at FROM lab_reports WHERE student_id = :sid ORDER BY submitted_at DESC");
                $rStmt->execute([':sid' => $sid]);
                $reps = $rStmt->fetchAll();
                $reply = "🎓 **ผลการเรียนของ:** " . ($student['prefix'] ?? '') . "{$student['fullname']} (รหัส {$student['student_id']})\n"
                       . "• สาขาวิชา: {$student['program']} ({$student['section']})\n"
                       . "• จำนวนแล็บที่ส่งแล้ว: **" . count($reps) . " แล็บ**\n";
                if (!empty($reps)) {
                    $reply .= "\n📝 **รายการรายงานที่ส่งในระบบ:**\n";
                    foreach ($reps as $r) {
                        $labName = strtoupper($r['lab_id']);
                        $scoreTxt = ($r['instructor_score'] !== null) ? "{$r['instructor_score']} คะแนน" : "ความแม่นยำ {$r['accuracy_score']}% (รออาจารย์ตรวจ)";
                        $reply .= "• {$labName}: {$scoreTxt} [สถานะ: {$r['status']}]\n";
                    }
                } else {
                    $reply .= "\n⚠️ ยังไม่มีประวัติการส่งรายงานแล็บในระบบ อย่าลืมส่งให้ครบนะฮิ!";
                }
                echo json_encode(['success' => true, 'reply' => $reply, 'source' => 'sqlite_student'], JSON_UNESCAPED_UNICODE);
                exit;
            } else {
                $reply = "น้อง i-MicroB ตรวจสอบแล้ว ไม่พบรหัสนักศึกษา **{$sid}** ในฐานข้อมูลเนี่ยฮิ ลองตรวจสอบเลขรหัสอีกครั้งนะฮิ!";
                echo json_encode(['success' => true, 'reply' => $reply, 'source' => 'sqlite_student_not_found'], JSON_UNESCAPED_UNICODE);
                exit;
            }
        } catch (Exception $e) {}
    }
}

// Knowledge Base Rules & Intent Matcher
$intents = [
    [
        'keywords' => ['ผู้สอน', 'อาจารย์', 'ชีวะ', 'ทัศนา', 'chewa', 'ดร.ชีวะ', 'ใครสอน', 'ติดต่อ'],
        'reply' => "👨‍🏫 **อาจารย์ผู้สอนประจำรายวิชา 4011111:**\n"
                 . "**ผศ.ดร.ชีวะ ทัศนา (Asst. Prof. Dr. Chewa Thassana)**\n"
                 . "• คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏรำไพพรรณี\n"
                 . "• อีเมล: `chewa.t@rbru.ac.th`\n"
                 . "• เชี่ยวชาญ: ฟิสิกส์เกษตรดิจิทัล, Edge xAIoT, Precision Agriculture & Virtual Lab\n"
                 . "น้อง i-MicroB เป็นลูกศิษย์คนโปรดของอาจารย์เองเนี่ยฮิ! 🔬"
    ],
    [
        'keywords' => ['ไมโครปิเปต', 'p1000', 'สอบเทียบ', 'calibrat', 'iso 8655', 'lab 1', 'lab 01', 'แล็บ 1', 'บทที่ 1'],
        'reply' => "🧪 **ปฏิบัติการที่ 1: การวัดละเอียดและสอบเทียบไมโครปิเปต P1000**\n"
                 . "• **หลักการ:** ชั่งน้ำหนักน้ำบริสุทธิ์ที่อุณหภูมิห้อง (\\(\\rho = 1.0000\\text{ g/mL}\\)) โดยน้ำ 1,000 µL = 1.000 g\n"
                 . "• **สมการความคลาดเคลื่อน:** \\(\\text{Error (\\%)} = \\left| \\frac{m_{\\text{measured}} - m_{\\text{theory}}}{m_{\\text{theory}}} \\right| \\times 100\\%\\)\n"
                 . "• **เทคนิคสำคัญ:** กดลูกสูบถึงจังหวะแรก (First Stop) เพื่อดูดสาร และกดสุดจังหวะสอง (Second Stop) เพื่อปล่อยสารไล่หยดสุดท้าย\n"
                 . "• **เครื่องมือ 3D:** มีให้ฝึกครบทั้ง *ไมโครปิเปต*, *เวอร์เนียร์แคลิปเปอร์*, และ *ไมโครมิเตอร์* ในหน้า Lab 01 เลยเนี่ยฮิ!"
    ],
    [
        'keywords' => ['บราวน์', 'brownian', 'การแพร่', 'diffus', 'เวกเตอร์', 'lab 2', 'lab 02', 'แล็บ 2', 'บทที่ 2'],
        'reply' => "🌊 **บทที่ 2 & Lab 02: การเคลื่อนที่แบบบราวน์และเวกเตอร์การแพร่**\n"
                 . "• **สมการไอน์สไตน์:** \\(D = \\frac{k_B T}{6\\pi\\eta r}\\) และ \\(\\langle r^2 \\rangle = 4Dt\\)\n"
                 . "• **หลักการ:** อนุภาคคอลลอยด์และแบคทีเรียถูกโมเลกุลน้ำชนแบบสุ่ม (Brownian Motion) แตกต่างจากการว่ายน้ำหาอาหาร (Chemotaxis: Run & Tumble)\n"
                 . "• **การทดลอง 3D:** สังเกตผ่านกล้องหยดแขวนลอย (Hanging Drop) จำลองอนุภาค *E. coli* เทียบกับบีดและยีสต์ฮิ!"
    ],
    [
        'keywords' => ['สโตกส์', 'ความหนืด', 'ตกตะกอน', 'แรงหนืด', 'stokes', 'viscos', 'lab 3', 'lab 03', 'แล็บ 3', 'บทที่ 3'],
        'reply' => "🧴 **บทที่ 3 & Lab 03: กฎของนิวตันและความหนืดสโตกส์**\n"
                 . "• **กฎของสโตกส์:** \\(F_d = 6\\pi\\eta r v\\)\n"
                 . "• **ความเร็วปลายการตกตะกอน:** \\(v_t = \\frac{2 r^2 g (\\rho_p - \\rho_f)}{9 \\eta}\\)\n"
                 . "• **ข้อสังเกต:** เซลล์แบคทีเรียที่มีรัศมีใหญ่ขึ้น 2 เท่า จะตกตะกอนเร็วกว่าเดิมถึง **4 เท่า** (\\(v_t \\propto r^2\\)) จึงต้องใช้เครื่องปั่นเหวี่ยงช่วยเนี่ยฮิ!"
    ],
    [
        'keywords' => ['ปั่นเหวี่ยง', 'centrifuge', 'rcf', 'rpm', 'สมดุลโรเตอร์', 'lab 4', 'lab 04', 'แล็บ 4', 'บทที่ 4'],
        'reply' => "🌀 **บทที่ 4 & Lab 04: การปั่นเหวี่ยงและการคำนวณ RCF**\n"
                 . "• **สูตรแปลง RPM สู่ RCF:** \\(\\text{RCF } (\\times g) = 1.118 \\times 10^{-5} \\times r_{\\text{cm}} \\times (\\text{RPM})^2\\)\n"
                 . "• **กฎเหล็กความปลอดภัย:** ต้องวางหลอดทดลองถ่วงน้ำหนักให้สมดุลตรงข้ามกัน 180° เสมอ ป้องกันแกนมอเตอร์คดงอหรือระเบิด\n"
                 . "• **ซิมูเลเตอร์ 3D:** มีระบบตรวจจับ Rotor Imbalance สั่นเตือนเสมือนจริงใน `sim04_centrifuge_3d.html` ฮิ!"
    ],
    [
        'keywords' => ['ตู้อบ', 'incubator', 'ความร้อน', '37', 'แคลอริมิเตอร์', 'lab 5', 'lab 05', 'แล็บ 5', 'บทที่ 5'],
        'reply' => "🌡️ **บทที่ 5 & Lab 05: การถ่ายโอนความร้อนและตู้อบ Incubator 37°C**\n"
                 . "• **สูตรความร้อน:** \\(Q = mc\\Delta T\\) (น้ำมีความจุความร้อนสูง \\(c = 4.184\\text{ J/g}\\cdot^\\circ\\text{C}\\))\n"
                 . "• **การตรวจสอบเสถียรภาพ:** ติดตั้งหัววัด Pt100 จำนวน 3 จุด (บน, กลาง, ล่าง) ผลต่างต้องไม่เกิน ±0.5°C\n"
                 . "• **กลไกการถ่ายโอน:** ใช้พัดลมพาความร้อน (Forced Convection) เพื่อป้องกันการแบ่งชั้นอากาศร้อน (Thermal Stratification) ฮิ!"
    ],
    [
        'keywords' => ['autoclave', 'หม้อนึ่ง', '121', 'ความดันไอ', 'สปอร์', 'lab 6', 'lab 06', 'แล็บ 6', 'บทที่ 6'],
        'reply' => "💨 **บทที่ 6 & Lab 06: อุณหพลศาสตร์และหม้อนึ่ง Autoclave 121°C**\n"
                 . "• **สภาวะมาตรฐาน:** ไอน้ำอิ่มตัวที่อุณหภูมิ 121°C ความดัน 15 psi นาน 15 นาที\n"
                 . "• **จลนพลศาสตร์การฆ่าสปอร์:** \\(D_{121} = 1.5\\text{ นาที}\\) สำหรับ *Geobacillus stearothermophilus*\n"
                 . "• **ข้อควรระวัง:** ต้องไล่อากาศเย็นออกให้หมด มิฉะนั้นอุณหภูมิจริงจะต่ำกว่าเกจวัด (Cold Air Pocket) ทำให้ฆ่าเชื้อไม่สมบูรณ์เนี่ยฮิ!"
    ],
    [
        'keywords' => ['ย้อมสีแกรม', 'gram', 'คูลอมบ์', 'ไฟฟ้าสถิต', 'crystal violet', 'lab 7', 'lab 07', 'แล็บ 7', 'บทที่ 7'],
        'reply' => "🟣 **บทที่ 7 & Lab 07: ไฟฟ้าสถิตและกลไกการย้อมสีแกรม**\n"
                 . "• **กฎของคูลอมบ์:** \\(F_e = k_e \\frac{|q_1 q_2|}{r^2}\\)\n"
                 . "• **กลไกสีติดเซลล์:** สีย้อม Crystal Violet มีประจุบวก (+) ดึงดูดทางไฟฟ้าสถิตกับกรดเทโคอิกประจุลบ (-) บนผนังเซลล์แบคทีเรีย\n"
                 . "• **Gram+ vs Gram-:** Gram+ มี Peptidoglycan หนา 40 nm กักผลึก CV-I ไว้ได้ ส่วน Gram- ถูกเอทานอล 95% ละลายไขมันจึงล้างสีหลุดและติดสีชมพูของ Safranin แทนฮิ!"
    ],
    [
        'keywords' => ['โอห์ม', 'อิเล็กโทรโฟเรซิส', 'gel', 'dna', 'กระแสไฟฟ้า', 'lab 8', 'lab 08', 'แล็บ 8', 'บทที่ 8'],
        'reply' => "⚡ **บทที่ 8 & Lab 08: กฎของโอห์มและเจลอิเล็กโทรโฟเรซิส**\n"
                 . "• **สมการไฟฟ้า:** \\(V = IR\\) และ \\(P = VI\\) (ความร้อนจูล)\n"
                 . "• **การเคลื่อนที่ของดีเอ็นเอ:** โมเลกุล DNA มีประจุลบสุทธิจากหมู่ฟอสเฟต จึงวิ่งเข้าหาขั้วบวก (Anode สีแดง)\n"
                 . "• **ขนาดชิ้นส่วน:** ชิ้นดีเอ็นเอขนาดเล็ก (เช่น 500 bp) จะวิ่งผ่านรูพรุนของอะกาโรสเจลได้เร็วกว่าชิ้นใหญ่ (3,000 bp) ฮิ!"
    ],
    [
        'keywords' => ['หักเห', 'สเนลล์', 'บริกซ์', 'brix', 'refractometer', 'แสง', 'lab 9', 'lab 09', 'แล็บ 9', 'บทที่ 9'],
        'reply' => "📐 **บทที่ 9 & Lab 09: การหักเหของแสงและ Brix Refractometer**\n"
                 . "• **กฎของสเนลล์:** \\(n_1 \\sin\\theta_1 = n_2 \\sin\\theta_2\\)\n"
                 . "• **มุมวิกฤติ:** \\(\\theta_c = \\arcsin(n_2 / n_1)\\)\n"
                 . "• **การวัดความหวาน:** น้ำบริสุทธิ์ \\(n = 1.3330\\) (0°Brix) เมื่อความเข้มข้นน้ำตาลสูงขึ้น ดัชนีหักเหจะเพิ่มขึ้นเชิงเส้น นำไปสู่เส้นตัดเงา (Shadow border) บนสเกลกล้องฮิ!"
    ],
    [
        'keywords' => ['กล้องจุลทรรศน์', 'แอบบี', 'abbe', '100x', 'immersion oil', 'น้ำมัน', 'lab 10', 'lab 10', 'แล็บ 10', 'บทที่ 10'],
        'reply' => "🔬 **บทที่ 10 & Lab 10: กล้องจุลทรรศน์และ Immersion Oil 100x**\n"
                 . "• **ขีดจำกัดแอบบี:** \\(d = \\frac{0.61\\lambda}{\\text{NA}}\\) (ยิ่ง \\(d\\) เล็ก ยิ่งคมชัด)\n"
                 . "• **Numerical Aperture:** \\(\\text{NA} = n \\sin\\alpha\\)\n"
                 . "• **ความสำคัญของ Immersion Oil:** น้ำมันมีดัชนีหักเห \\(n = 1.515\\) เท่ากับกระจกสไลด์ ป้องกันแสงหักเหสูญเสียออกนอกเลนส์ ทำให้ \\(\\text{NA}\\) เพิ่มจาก 0.85 เป็น 1.25 แยกเห็นแบคทีเรียคมชัดเนี่ยฮิ!"
    ],
    [
        'keywords' => ['รังสี', 'กัมมันตภาพรังสี', 'ครึ่งชีวิต', 'uv-c', 'uvc', 'd10', 'ฆ่าเชื้อ', 'lab 11', 'lab 11', 'แล็บ 11', 'บทที่ 11'],
        'reply' => "☢️ **บทที่ 11 & Lab 11: กัมมันตภาพรังสีและการฉายรังสี UV-C**\n"
                 . "• **กฎกำลังสองผกผัน:** \\(I = \\frac{P}{4\\pi r^2}\\) (ถอยห่าง 2 เท่า ความเข้มลดลงเหลือ 1/4)\n"
                 . "• **การสลายตัวครึ่งชีวิต:** \\(N(t) = N_0 \\left(\\frac{1}{2}\\right)^{t / T_{1/2}}\\)\n"
                 . "• **UV-C 254 nm:** ทำลายพันธะดีเอ็นเอเกิดไทมีนไดเมอร์ (Thymine dimer) ทำให้แบคทีเรียแบ่งตัวไม่ได้ มีค่า \\(D_{10}\\) ลดเชื้อลง 90% ในแต่ละโดสฮิ!"
    ],
    [
        'keywords' => ['od600', 'สเปกโทร', 'เบียร์-แลมเบิร์ต', 'beer', 'ดูดกลืนแสง', 'lab 12', 'lab 12', 'แล็บ 12', 'บทที่ 12'],
        'reply' => "📈 **บทที่ 12 & Lab 12: สเปกโตรโฟโตมิเตอร์และการวัด OD600**\n"
                 . "• **กฎของเบียร์-แลมเบิร์ต:** \\(A = \\varepsilon b c = -\\log_{10}(T)\\)\n"
                 . "• **ความยาวคลื่น 600 nm:** เหมาะสมที่สุดเพราะเซลล์แบคทีเรียกระเจิงแสงได้ดีและสารอาหารใน broth ดูดกลืนแสงน้อย\n"
                 . "• **ช่วงเชิงเส้นแม่นยำ:** \\(\\text{OD}_{600}\\) ควรอยู่ระหว่าง 0.1 - 0.8 AU หากขุ่นเกิน 1.0 ต้องเจือจางตัวอย่างก่อนวัดฮิ!"
    ],
    [
        'keywords' => ['แรงตึงผิว', 'แคปิลลารี', 'capillary', 'ความดันย่อย', 'ไมโครฟลูอิดิกส์', 'lab 13', 'แล็บ 13', 'บทที่ 13'],
        'reply' => "💧 **บทที่ 13 & Lab 13: แรงตึงผิว หลอดแคปิลลารี และการไหลแบบจุลภาค (Microfluidics)**\n"
                 . "• **สมการความสูงแคปิลลารี:** \\(h = \\frac{2\\gamma \\cos\\theta}{\\rho g r}\\)\n"
                 . "• **กฎของปัวเซย (Poiseuille's Law):** \\(Q = \\frac{\\pi r^4 \\Delta P}{8\\eta L}\\) อัตราการไหลในท่อระดับไมโคร\n"
                 . "• **การประยุกต์ใช้ในแล็บ:** การดูดซับสารอาหารของไบโอฟิล์ม และชุดตรวจวินิจฉัยจุลชีพแบบ Lab-on-a-Chip เนี่่ยฮิ!"
    ],
    [
        'keywords' => ['webar', 'aruco', 'ส่องกล้อง', 'มาร์กเกอร์', 'มือถือ'],
        'reply' => "📱 **ระบบ 3D WebAR ArUco Markers:**\n"
                 . "• ใช้งานได้ทันทีบนเบราว์เซอร์สมาร์ทโฟน ไม่ต้องโหลดแอปเสริม\n"
                 . "• มีมาร์กเกอร์ ArUco (ID 0 – 11) กำกับในหนังสือทั้ง 12 บทเรียน\n"
                 . "• ส่องกล้องที่ภาพมาร์กเกอร์ วัตถุ 3 มิติจะลอยขึ้นมาบนหน้าหนังสือ พร้อมเสียง Chime และแถบนำทาง Bangchak Curve ทันทีเนี่ยฮิ!"
    ],
    [
        'keywords' => ['บทเสริม', 'enrichment', 'โมเมนตัม', 'ออสโมซิส', 'atp synthase', 'flagella', 'แฟลกเจลลา'],
        'reply' => "✨ **4 บทเรียนเสริม (Preserved Enrichment Modules):**\n"
                 . "1. **โมเมนตัมและการชนในระดับเซลล์:** การสลายเซลล์ด้วยคลื่นเสียง Ultrasonic Sonication\n"
                 . "2. **สมดุลกลและออสโมซิส:** ความดันออสโมติกแวนต์ฮอฟฟ์ \\(\\Pi = iMRT\\) และ Plasmolysis\n"
                 . "3. **งาน พลังงาน และ ATP Synthase:** มอเตอร์โมเลกุลหมุนสร้าง ATP ประสิทธิภาพ 90%\n"
                 . "4. **การหมุนและแฟลกเจลลา:** ทอร์กนาโนและการหมุนควงสว่าน 300 Hz ขับเคลื่อนเซลล์\n"
                 . "คลิกศึกษาได้จากเมนู 'บทเรียนเสริม' ที่แถบนำทางด้านบนได้เลยฮิ!"
    ]
];

// Direct Lab & Chapter Number Extractor (e.g. ปฏิบัติการที่ 1, แลป 2, lab 3, บทที่ 4)
if (preg_match('/(?:ปฏิบัติการ(?:\s*ที่)?|แล[็ป](?:\s*ที่)?|lab|บท(?:\s*ที่)?)\s*([0-9]{1,2})/ui', $qLower, $numMatches)) {
    $targetNum = (int)$numMatches[1];
    // Map numbers 1..13 to their corresponding intent index
    // $intents[1] is Lab 1, $intents[2] is Lab 2 ... $intents[13] is Lab 13
    if ($targetNum >= 1 && $targetNum <= 13 && isset($intents[$targetNum])) {
        echo json_encode([
            'success' => true,
            'reply' => $intents[$targetNum]['reply'],
            'source' => 'rag_lab_number'
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

// Fallback search in curriculum map JSON
$foundReply = null;
foreach ($intents as $it) {
    foreach ($it['keywords'] as $kw) {
        if (mb_strpos($qLower, $kw) !== false) {
            $foundReply = $it['reply'];
            break 2;
        }
    }
}

if ($foundReply) {
    echo json_encode([
        'success' => true,
        'reply' => $foundReply,
        'source' => 'rag_knowledge'
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Default Helpful Assistant Answer if no exact match
$defaultReply = "น้อง **i-MicroB** ได้รับคำถามเรื่อง \"{$query}\" แล้วเนี่ยฮิ! 🔬\n\n"
              . "สำหรับเนื้อหาวิชาฟิสิกส์สำหรับจุลชีววิทยา 4011111 น้องแนะนำให้ลองเลือกดูจากหัวข้อดังนี้ได้เลยนะฮิ:\n"
              . "• พิมพ์ **\"ไมโครปิเปต\"** หรือ **\"lab 1\"** เพื่อดูการสอบเทียบและเครื่องมือวัด\n"
              . "• พิมพ์ **\"autoclave\"** หรือ **\"121\"** เพื่อดูอุณหพลศาสตร์การนึ่งฆ่าเชื้อ\n"
              . "• พิมพ์ **\"od600\"** หรือ **\"สเปกโตร\"** เพื่อดูการวัดความขุ่นและการเจริญของแบคทีเรีย\n"
              . "• หรือพิมพ์ **รหัสนักศึกษา 8 หลัก** (เช่น 67144001) เพื่อเช็กคะแนนแล็บสดได้ทันทีเนี่ยฮิ!";

echo json_encode([
    'success' => true,
    'reply' => $defaultReply,
    'source' => 'default_helper'
], JSON_UNESCAPED_UNICODE);
