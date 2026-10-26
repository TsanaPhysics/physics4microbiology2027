<?php
/**
 * REST API for Virtual Physics for Microbiology Lab
 * Supports SQLite3 PDO Backend with JSON responses and CSV export
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

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$action = $_GET['action'] ?? ($_POST['action'] ?? '');

try {
    switch ($action) {

    // 1. Student Registration & Login
    case 'register_student':
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $studentId = trim($data['student_id'] ?? '');
        $prefix = trim($data['prefix'] ?? '');
        $fullname = trim($data['fullname'] ?? '');
        $program = trim($data['program'] ?? 'จุลชีววิทยา');
        $section = trim($data['section'] ?? 'Sec 01');
        $email = trim($data['email'] ?? '');
        $phone = trim($data['phone'] ?? '');

        if (!$studentId || !$fullname) {
            echo json_encode(['success' => false, 'error' => 'กรุณากรอกรหัสนักศึกษาและชื่อ-นามสกุล']);
            exit;
        }

        $stmt = $pdo->prepare("
            INSERT INTO students (student_id, prefix, fullname, program, section, email, phone, last_active)
            VALUES (:sid, :pfx, :fn, :prg, :sec, :em, :ph, CURRENT_TIMESTAMP)
            ON CONFLICT(student_id) DO UPDATE SET
                prefix = excluded.prefix,
                fullname = excluded.fullname,
                program = excluded.program,
                section = excluded.section,
                email = excluded.email,
                phone = excluded.phone,
                last_active = CURRENT_TIMESTAMP
        ");
        $stmt->execute([
            ':sid' => $studentId,
            ':pfx' => $prefix,
            ':fn' => $fullname,
            ':prg' => $program,
            ':sec' => $section,
            ':em' => $email,
            ':ph' => $phone
        ]);

        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$studentId]);
        $student = $stmt->fetch();

        echo json_encode(['success' => true, 'message' => 'ลงทะเบียน/เข้าสู่ระบบสำเร็จ', 'student' => $student]);
        break;

    // 2. Get Student Profile & Analytics
    case 'get_student_profile':
        $studentId = $_GET['student_id'] ?? '';
        if (!$studentId) {
            echo json_encode(['success' => false, 'error' => 'Missing student_id']);
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$studentId]);
        $student = $stmt->fetch();

        if (!$student) {
            echo json_encode(['success' => false, 'error' => 'ไม่พบข้อมูลนักศึกษา']);
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM lab_reports WHERE student_id = ? ORDER BY submitted_at DESC");
        $stmt->execute([$studentId]);
        $reports = $stmt->fetchAll();

        echo json_encode([
            'success' => true,
            'student' => $student,
            'reports' => $reports,
            'total_submitted' => count($reports)
        ]);
        break;

    // 3. Log Telemetry from 3D Lab
    case 'log_telemetry':
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $studentId = trim($data['student_id'] ?? '');
        $labId = trim($data['lab_id'] ?? '');
        $trialNumber = intval($data['trial_number'] ?? 1);
        $telemetry = is_array($data['telemetry'] ?? null) ? json_encode($data['telemetry']) : ($data['telemetry'] ?? '{}');

        if (!$studentId || !$labId) {
            echo json_encode(['success' => false, 'error' => 'Missing student_id or lab_id']);
            exit;
        }

        $stmt = $pdo->prepare("
            INSERT INTO lab_telemetry_logs (student_id, lab_id, trial_number, telemetry_json)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([$studentId, $labId, $trialNumber, $telemetry]);

        echo json_encode(['success' => true, 'log_id' => $pdo->lastInsertId()]);
        break;

    // 4. Submit Lab Report
    case 'submit_report':
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $studentId = trim($data['student_id'] ?? '');
        $fullname = trim($data['fullname'] ?? '');
        $program = trim($data['program'] ?? 'จุลชีววิทยา');
        $section = trim($data['section'] ?? 'Sec 01');
        $labId = trim($data['lab_id'] ?? 'lab01');

        $tableData = is_array($data['table_data'] ?? null) ? json_encode($data['table_data'], JSON_UNESCAPED_UNICODE) : ($data['table_data'] ?? '[]');
        $calculations = trim($data['calculations'] ?? '');
        $errorPercentage = floatval($data['error_percentage'] ?? 0.0);
        $rSquared = floatval($data['r_squared'] ?? 0.0);
        $quizScore = intval($data['post_quiz_score'] ?? 0);
        $quizTotal = intval($data['post_quiz_total'] ?? 3);
        $quizAnswers = is_array($data['quiz_answers'] ?? null) ? json_encode($data['quiz_answers'], JSON_UNESCAPED_UNICODE) : ($data['quiz_answers'] ?? '{}');
        $conclusion = trim($data['conclusion'] ?? '');
        $discussion = trim($data['discussion'] ?? '');
        $accuracyScore = floatval($data['accuracy_score'] ?? 100.0);

        if (!$studentId || !$fullname) {
            echo json_encode(['success' => false, 'error' => 'กรุณากรอกชื่อ-นามสกุล และรหัสนักศึกษาให้ครบถ้วน']);
            exit;
        }

        // Auto-register / update student info
        $stmtStudent = $pdo->prepare("
            INSERT INTO students (student_id, fullname, program, section, last_active)
            VALUES (:sid, :fn, :prg, :sec, CURRENT_TIMESTAMP)
            ON CONFLICT(student_id) DO UPDATE SET
                fullname = excluded.fullname,
                program = excluded.program,
                section = excluded.section,
                last_active = CURRENT_TIMESTAMP
        ");
        $stmtStudent->execute([
            ':sid' => $studentId,
            ':fn' => $fullname,
            ':prg' => $program,
            ':sec' => $section
        ]);

        // Process Base64 Proof Screenshot / Photo if uploaded
        $imageProofPath = '';
        if (!empty($data['image_proof_base64'])) {
            $base64 = $data['image_proof_base64'];
            if (preg_match('/^data:image\/(\w+);base64,/', $base64, $type)) {
                $base64 = substr($base64, strpos($base64, ',') + 1);
                $ext = strtolower($type[1]);
                if ($ext === 'jpeg') $ext = 'jpg';
                $decoded = base64_decode($base64);
                if ($decoded !== false) {
                    $uploadDir = __DIR__ . '/../uploads/reports/';
                    if (!is_dir($uploadDir)) {
                        @mkdir($uploadDir, 0777, true);
                    }
                    $fileName = 'snap_' . preg_replace('/[^a-zA-Z0-9_-]/', '', $studentId) . '_' . $labId . '_' . time() . '.' . $ext;
                    if (file_put_contents($uploadDir . $fileName, $decoded)) {
                        $imageProofPath = 'uploads/reports/' . $fileName;
                    }
                }
            }
        } else if (!empty($data['image_proof_path'])) {
            $imageProofPath = trim($data['image_proof_path']);
        }

        $reportCode = 'REP-' . $studentId . '-' . strtoupper($labId);

        // Google Sheets Webhook Sync Dispatch
        $googleSheetUrl = trim($data['google_sheet_webhook_url'] ?? '');
        $configFile = __DIR__ . '/../database/google_sheets_config.json';
        if (empty($googleSheetUrl) && file_exists($configFile)) {
            $cfg = json_decode(file_get_contents($configFile), true);
            $googleSheetUrl = trim($cfg['webhook_url'] ?? '');
        }

        $googleSheetSynced = 0;
        $googleSheetResponse = '';

        if (!empty($googleSheetUrl) && filter_var($googleSheetUrl, FILTER_VALIDATE_URL)) {
            $sheetPayload = [
                'timestamp' => date('Y-m-d H:i:s'),
                'report_code' => $reportCode,
                'student_id' => $studentId,
                'fullname' => $fullname,
                'program' => $program,
                'section' => $section,
                'lab_id' => $labId,
                'table_data' => json_decode($tableData, true),
                'calculations' => $calculations,
                'conclusion' => $conclusion,
                'discussion' => $discussion,
                'quiz_answers' => json_decode($quizAnswers, true),
                'image_proof_url' => $imageProofPath ? ('http://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/physics4microbioloy2027/virtual_lab/' . $imageProofPath) : ''
            ];

            if (function_exists('curl_init')) {
                $ch = curl_init($googleSheetUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sheetPayload, JSON_UNESCAPED_UNICODE));
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8']);
                curl_setopt($ch, CURLOPT_TIMEOUT, 3);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $res = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode >= 200 && $httpCode < 300) {
                    $googleSheetSynced = 1;
                    $googleSheetResponse = $res;
                } else {
                    $googleSheetResponse = "HTTP Code: $httpCode";
                }
            }
        }

        $stmt = $pdo->prepare("
            INSERT INTO lab_reports (
                report_code, student_id, lab_id, table_data_json, error_percentage,
                r_squared, post_quiz_score, post_quiz_total, quiz_answers_json,
                conclusion, discussion, accuracy_score, status, submitted_at,
                image_proof_path, calculations, google_sheets_synced, google_sheets_response
            ) VALUES (
                :code, :sid, :lid, :tbl, :err,
                :r2, :qs, :qt, :qa,
                :conc, :disc, :acc, 'submitted', CURRENT_TIMESTAMP,
                :img, :calc, :gss, :gsr
            )
            ON CONFLICT(report_code) DO UPDATE SET
                table_data_json = excluded.table_data_json,
                error_percentage = excluded.error_percentage,
                r_squared = excluded.r_squared,
                post_quiz_score = excluded.post_quiz_score,
                post_quiz_total = excluded.post_quiz_total,
                quiz_answers_json = excluded.quiz_answers_json,
                conclusion = excluded.conclusion,
                discussion = excluded.discussion,
                accuracy_score = excluded.accuracy_score,
                status = 'resubmitted',
                submitted_at = CURRENT_TIMESTAMP,
                image_proof_path = excluded.image_proof_path,
                calculations = excluded.calculations,
                google_sheets_synced = excluded.google_sheets_synced,
                google_sheets_response = excluded.google_sheets_response
        ");

        $stmt->execute([
            ':code' => $reportCode,
            ':sid' => $studentId,
            ':lid' => $labId,
            ':tbl' => $tableData,
            ':err' => $errorPercentage,
            ':r2' => $rSquared,
            ':qs' => $quizScore,
            ':qt' => $quizTotal,
            ':qa' => $quizAnswers,
            ':conc' => $conclusion,
            ':disc' => $discussion,
            ':acc' => $accuracyScore,
            ':img' => $imageProofPath,
            ':calc' => $calculations,
            ':gss' => $googleSheetSynced,
            ':gsr' => $googleSheetResponse
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'บันทึกรายงานผลปฏิบัติการลง SQLite สำเร็จเรียบร้อย',
            'report_code' => $reportCode,
            'student' => [
                'student_id' => $studentId,
                'fullname' => $fullname,
                'program' => $program,
                'section' => $section
            ],
            'image_proof_path' => $imageProofPath,
            'google_sheets_synced' => (bool)$googleSheetSynced,
            'google_sheets_status' => $googleSheetSynced ? 'เชื่อมต่อ Google Sheets สำเร็จ' : (empty($googleSheetUrl) ? 'บันทึกลง SQLite แล้ว (ยังไม่ได้ระบุ Webhook Google Sheets)' : 'กำลังรอเชื่อมต่อ Google Sheets'),
            'timestamp' => date('Y-m-d H:i:s')
        ]);
        break;

    // 5. Admin / Instructor Login
    case 'admin_login':
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $admin = $stmt->fetch();

        if ($admin) {
            echo json_encode(['success' => true, 'admin' => ['username' => $admin['username'], 'fullname' => $admin['fullname']]]);
        } else {
            echo json_encode(['success' => false, 'error' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง (ค่ามาตรฐาน: admin / LEQs)']);
        }
        break;

    // 6. Admin Analytics & All Submissions
    case 'admin_get_overview':
        $stmt = $pdo->query("SELECT * FROM students ORDER BY student_id ASC");
        $students = $stmt->fetchAll();

        $stmt = $pdo->query("
            SELECT r.*, s.fullname, s.section, s.program
            FROM lab_reports r
            JOIN students s ON r.student_id = s.student_id
            ORDER BY r.submitted_at DESC
        ");
        $reports = $stmt->fetchAll();

        $stmt = $pdo->query("SELECT * FROM labs_catalog ORDER BY lab_number ASC");
        $labs = $stmt->fetchAll();

        echo json_encode([
            'success' => true,
            'students' => $students,
            'reports' => $reports,
            'labs' => $labs,
            'total_students' => count($students),
            'total_reports' => count($reports)
        ]);
        break;

    // 7. Instructor Grade & Feedback Update
    case 'instructor_grade':
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $reportCode = trim($data['report_code'] ?? '');
        $score = floatval($data['score'] ?? 0.0);
        $feedback = trim($data['feedback'] ?? '');

        if (!$reportCode) {
            echo json_encode(['success' => false, 'error' => 'Missing report_code']);
            exit;
        }

        $stmt = $pdo->prepare("
            UPDATE lab_reports
            SET instructor_score = ?, instructor_feedback = ?, status = 'graded'
            WHERE report_code = ?
        ");
        $stmt->execute([$score, $feedback, $reportCode]);

        echo json_encode(['success' => true, 'message' => 'บันทึกคะแนนและข้อเสนอแนะเรียบร้อยแล้ว']);
        break;

    // 7.1 Get Full Report Detail for Review & Grading
    case 'get_report_detail':
        $reportCode = trim($_GET['report_code'] ?? ($_POST['report_code'] ?? ''));
        if (!$reportCode) {
            echo json_encode(['success' => false, 'error' => 'Missing report_code']);
            exit;
        }

        $stmt = $pdo->prepare("
            SELECT r.*, s.fullname, s.prefix, s.program, s.section, s.faculty, s.email, s.phone,
                   c.title_th AS lab_title_th, c.title_en AS lab_title_en, c.lab_number
            FROM lab_reports r
            JOIN students s ON r.student_id = s.student_id
            LEFT JOIN labs_catalog c ON r.lab_id = c.lab_id
            WHERE r.report_code = ? OR r.id = ?
        ");
        $stmt->execute([$reportCode, $reportCode]);
        $report = $stmt->fetch();

        if ($report) {
            $report['table_data'] = json_decode($report['table_data_json'] ?? '[]', true);
            $report['quiz_answers'] = json_decode($report['quiz_answers_json'] ?? '{}', true);
            echo json_encode(['success' => true, 'report' => $report]);
        } else {
            echo json_encode(['success' => false, 'error' => 'ไม่พบข้อมูลรายงาน']);
        }
        break;

    // 7.2 Search Student Profile & All Submitted Reports
    case 'search_student_reports':
        $studentId = trim($_GET['student_id'] ?? ($_POST['student_id'] ?? ''));
        if (!$studentId) {
            echo json_encode(['success' => false, 'error' => 'กรุณากรอกรหัสนักศึกษา']);
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$studentId]);
        $student = $stmt->fetch();

        if (!$student) {
            echo json_encode(['success' => false, 'error' => 'ไม่พบข้อมูลนักศึกษารหัส ' . htmlspecialchars($studentId) . ' ในฐานข้อมูล']);
            exit;
        }

        $stmt = $pdo->prepare("
            SELECT r.*, c.title_th AS lab_title_th, c.title_en AS lab_title_en, c.lab_number
            FROM lab_reports r
            LEFT JOIN labs_catalog c ON r.lab_id = c.lab_id
            WHERE r.student_id = ?
            ORDER BY c.lab_number ASC, r.submitted_at DESC
        ");
        $stmt->execute([$studentId]);
        $reports = $stmt->fetchAll();

        echo json_encode([
            'success' => true,
            'student' => $student,
            'reports' => $reports,
            'total_submitted' => count($reports)
        ]);
        break;

    // 8. Export CSV (UTF-8 BOM)
    case 'export_csv':
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="virtual_lab_reports_' . date('Ymd_His') . '.csv"');

        // UTF-8 BOM for Thai text in Excel
        echo "\xEF\xBB\xBF";

        $output = fopen('php://output', 'w');
        fputcsv($output, [
            'รหัสรายงาน',
            'รหัสนักศึกษา',
            'ชื่อ-นามสกุล',
            'หมู่เรียน',
            'รหัสปฏิบัติการ',
            'คะแนนความแม่นยำ (%)',
            'ความคลาดเคลื่อน (%)',
            'R-Squared',
            'คะแนนควิซ',
            'คะแนนอาจารย์',
            'ข้อเสนอแนะอาจารย์',
            'เวลาส่ง'
        ]);

        $stmt = $pdo->query("
            SELECT r.report_code, r.student_id, s.fullname, s.section, r.lab_id,
                   r.accuracy_score, r.error_percentage, r.r_squared,
                   r.post_quiz_score || '/' || r.post_quiz_total AS quiz,
                   r.instructor_score, r.instructor_feedback, r.submitted_at
            FROM lab_reports r
            JOIN students s ON r.student_id = s.student_id
            ORDER BY r.lab_id ASC, r.student_id ASC
        ");

        while ($row = $stmt->fetch()) {
            fputcsv($output, [
                $row['report_code'],
                $row['student_id'],
                $row['fullname'],
                $row['section'],
                $row['lab_id'],
                $row['accuracy_score'],
                $row['error_percentage'],
                $row['r_squared'],
                $row['quiz'],
                $row['instructor_score'] ?? 'ยังไม่ตรวจ',
                $row['instructor_feedback'],
                $row['submitted_at']
            ]);
        }

        fclose($output);
        exit;

    default:
        echo json_encode([
            'success' => true,
            'service' => 'Physics for Microbiology Virtual Lab REST API',
            'version' => '2027.10',
            'endpoints' => [
                'register_student',
                'get_student_profile',
                'log_telemetry',
                'submit_report',
                'admin_login',
                'admin_get_overview',
                'instructor_grade',
                'get_report_detail',
                'search_student_reports',
                'export_csv'
            ]
        ]);
        break;
    }
} catch (Throwable $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
