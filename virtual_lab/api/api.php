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
        $labId = trim($data['lab_id'] ?? '');
        $tableData = is_array($data['table_data'] ?? null) ? json_encode($data['table_data'], JSON_UNESCAPED_UNICODE) : ($data['table_data'] ?? '[]');
        $errorPercentage = floatval($data['error_percentage'] ?? 0.0);
        $rSquared = floatval($data['r_squared'] ?? 0.0);
        $quizScore = intval($data['post_quiz_score'] ?? 0);
        $quizTotal = intval($data['post_quiz_total'] ?? 3);
        $quizAnswers = is_array($data['quiz_answers'] ?? null) ? json_encode($data['quiz_answers']) : ($data['quiz_answers'] ?? '{}');
        $conclusion = trim($data['conclusion'] ?? '');
        $discussion = trim($data['discussion'] ?? '');
        $accuracyScore = floatval($data['accuracy_score'] ?? 100.0);

        if (!$studentId || !$labId) {
            echo json_encode(['success' => false, 'error' => 'ข้อมูลไม่ครบถ้วน']);
            exit;
        }

        $reportCode = 'REP-' . $studentId . '-' . strtoupper($labId);

        $stmt = $pdo->prepare("
            INSERT INTO lab_reports (
                report_code, student_id, lab_id, table_data_json, error_percentage,
                r_squared, post_quiz_score, post_quiz_total, quiz_answers_json,
                conclusion, discussion, accuracy_score, status, submitted_at
            ) VALUES (
                :code, :sid, :lid, :tbl, :err,
                :r2, :qs, :qt, :qa,
                :conc, :disc, :acc, 'submitted', CURRENT_TIMESTAMP
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
                submitted_at = CURRENT_TIMESTAMP
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
            ':acc' => $accuracyScore
        ]);

        echo json_encode([
            'success' => true,
            'message' => 'ส่งรายงานผลปฏิบัติการสำเร็จเรียบร้อย',
            'report_code' => $reportCode,
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
                'export_csv'
            ]
        ]);
        break;
}
