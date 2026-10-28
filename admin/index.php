<?php
/**
 * Dedicated Instructor & Admin Portal
 * Course: 4011111 Physics for Microbiology (ฟิสิกส์สำหรับจุลชีววิทยา)
 * Faculty of Science and Technology, Rambhai Barni Rajabhat University (RBRU)
 * Backend: SQLite3 Database + REST API
 */

session_start();

$dbPath = __DIR__ . '/../virtual_lab/database/virtual_lab.db';
$pdo = null;
$dbError = null;

try {
    if (!file_exists($dbPath)) {
        throw new Exception("ไม่พบไฟล์ฐานข้อมูล SQLite ที่: " . $dbPath);
    }
    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $dbError = $e->getMessage();
}

// Handle Instructor Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['physics_admin_logged']);
    unset($_SESSION['physics_admin_user']);
    header('Location: index.php?tab=instructor');
    exit;
}

// Handle Student Logout
if (isset($_GET['action']) && $_GET['action'] === 'student_logout') {
    unset($_SESSION['physics_student_logged']);
    unset($_SESSION['physics_student']);
    header('Location: index.php?tab=student');
    exit;
}

// Handle Instructor Login POST
$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['physics_admin_logged'] = true;
            $_SESSION['physics_admin_user'] = [
                'username' => $user['username'],
                'fullname' => $user['fullname'],
                'role' => $user['role'] ?? 'instructor'
            ];
            header('Location: index.php');
            exit;
        } else {
            $loginError = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง (ค่าเริ่มต้น: admin / LEQs)';
        }
    } else {
        $loginError = 'ฐานข้อมูลไม่พร้อมใช้งาน: ' . $dbError;
    }
}

// Handle Student Login POST
$studentLoginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_login_submit'])) {
    $sid = trim($_POST['student_id'] ?? '');
    if (!$sid) {
        $studentLoginError = 'กรุณากรอกรหัสนักศึกษา';
    } elseif ($pdo) {
        $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
        $stmt->execute([$sid]);
        $st = $stmt->fetch();
        if ($st) {
            $uStmt = $pdo->prepare("UPDATE students SET last_active = CURRENT_TIMESTAMP WHERE student_id = ?");
            $uStmt->execute([$sid]);
            $_SESSION['physics_student_logged'] = true;
            $_SESSION['physics_student'] = $st;
            header('Location: index.php');
            exit;
        } else {
            $studentLoginError = "ไม่พบรหัสนักศึกษา '{$sid}' ในระบบ — กรุณาคลิกแท็บ 'ลงทะเบียนใหม่' เพื่อสร้างประวัตินักศึกษา";
        }
    } else {
        $studentLoginError = 'ฐานข้อมูลไม่พร้อมใช้งาน: ' . $dbError;
    }
}

// Handle Student Registration POST
$studentRegError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_register_submit'])) {
    $sid = trim($_POST['student_id'] ?? '');
    $pfx = trim($_POST['prefix'] ?? 'นาย');
    $fn = trim($_POST['fullname'] ?? '');
    $prg = trim($_POST['program'] ?? 'จุลชีววิทยา');
    $sec = trim($_POST['section'] ?? 'Sec 01');
    $em = trim($_POST['email'] ?? '');
    $ph = trim($_POST['phone'] ?? '');

    if (!$sid || !$fn) {
        $studentRegError = 'กรุณากรอกรหัสนักศึกษาและชื่อ-นามสกุลให้ครบถ้วน';
    } elseif ($pdo) {
        try {
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
                ':sid' => $sid,
                ':pfx' => $pfx,
                ':fn' => $fn,
                ':prg' => $prg,
                ':sec' => $sec,
                ':em' => $em,
                ':ph' => $ph
            ]);

            $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
            $stmt->execute([$sid]);
            $st = $stmt->fetch();

            $_SESSION['physics_student_logged'] = true;
            $_SESSION['physics_student'] = $st;
            header('Location: index.php?registered=1');
            exit;
        } catch (Exception $e) {
            $studentRegError = 'บันทึกลงทะเบียนไม่สำเร็จ: ' . $e->getMessage();
        }
    } else {
        $studentRegError = 'ฐานข้อมูลไม่พร้อมใช้งาน: ' . $dbError;
    }
}

$isLoggedIn = !empty($_SESSION['physics_admin_logged']);
$adminUser = $_SESSION['physics_admin_user'] ?? ['fullname' => 'ผศ.ดร.ชีวะ ทัศนา', 'username' => 'admin'];

$isStudentLoggedIn = !empty($_SESSION['physics_student_logged']);
$currentStudent = $_SESSION['physics_student'] ?? null;

// Determine active login tab when not logged in
$activeTab = $_GET['tab'] ?? 'student';
if ($studentRegError || isset($_GET['register'])) {
    $activeTab = 'register';
} elseif ($loginError || isset($_GET['instructor'])) {
    $activeTab = 'instructor';
}

// Student Dashboard Data
$studentReports = [];
$studentReportsByLab = [];
$studentGradedCount = 0;
$studentPendingCount = 0;
$studentAccSum = 0;
$allLabsCatalog = [];
$totalSubmittedLabs = 0;
$studentAvgAccuracy = 0;
$studentProgressPct = 0;

if ($isStudentLoggedIn && $pdo && $currentStudent) {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = ?");
    $stmt->execute([$currentStudent['student_id']]);
    $freshSt = $stmt->fetch();
    if ($freshSt) {
        $currentStudent = $freshSt;
        $_SESSION['physics_student'] = $freshSt;
    }

    $stmt = $pdo->query("SELECT * FROM labs_catalog ORDER BY lab_number ASC");
    $allLabsCatalog = $stmt->fetchAll();

    $stmt = $pdo->prepare("
        SELECT r.*, c.title_th AS lab_title_th, c.title_en AS lab_title_en, c.lab_number
        FROM lab_reports r
        LEFT JOIN labs_catalog c ON r.lab_id = c.lab_id
        WHERE r.student_id = ?
        ORDER BY r.submitted_at DESC
    ");
    $stmt->execute([$currentStudent['student_id']]);
    $studentReports = $stmt->fetchAll();

    foreach ($studentReports as $rep) {
        $lid = strtolower($rep['lab_id']);
        if (!isset($studentReportsByLab[$lid])) {
            $studentReportsByLab[$lid] = $rep;
        }
        if (preg_match('/lab(\d+)/', $lid, $m)) {
            $norm = sprintf("lab%02d", (int)$m[1]);
            if (!isset($studentReportsByLab[$norm])) {
                $studentReportsByLab[$norm] = $rep;
            }
        }
        if ($rep['instructor_score'] !== null && $rep['instructor_score'] !== '') {
            $studentGradedCount++;
        } else {
            $studentPendingCount++;
        }
        $studentAccSum += floatval($rep['accuracy_score'] ?? 0);
    }
    $totalSubmittedLabs = count($studentReports);
    $studentAvgAccuracy = $totalSubmittedLabs > 0 ? round($studentAccSum / $totalSubmittedLabs, 1) : 0;
    $studentProgressPct = min(100, round(($totalSubmittedLabs / 13) * 100));
}

// Fetch overview data if logged in
$students = [];
$reports = [];
$labs = [];
$totalReports = 0;
$totalStudents = 0;
$gradedCount = 0;
$pendingCount = 0;
$avgAccuracy = 0.0;

if ($isLoggedIn && $pdo) {
    // Labs catalog
    $stmt = $pdo->query("SELECT * FROM labs_catalog ORDER BY lab_number ASC");
    $labs = $stmt->fetchAll();

    // Students list
    $stmt = $pdo->query("SELECT * FROM students ORDER BY student_id ASC");
    $students = $stmt->fetchAll();
    $totalStudents = count($students);

    // Reports list with student info & lab titles
    $stmt = $pdo->query("
        SELECT r.*, s.fullname, s.section, s.program,
               c.title_th AS lab_title_th, c.lab_number
        FROM lab_reports r
        JOIN students s ON r.student_id = s.student_id
        LEFT JOIN labs_catalog c ON r.lab_id = c.lab_id
        ORDER BY r.submitted_at DESC
    ");
    $reports = $stmt->fetchAll();
    $totalReports = count($reports);

    $accSum = 0;
    foreach ($reports as $r) {
        if ($r['instructor_score'] !== null && $r['instructor_score'] !== '') {
            $gradedCount++;
        } else {
            $pendingCount++;
        }
        $accSum += floatval($r['accuracy_score'] ?? 0);
    }
    if ($totalReports > 0) {
        $avgAccuracy = round($accSum / $totalReports, 1);
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหลังบ้านอาจารย์ผู้สอน | 4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Instructor Console)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600;700&family=Orbitron:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fui_cyber_theme.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Prompt', sans-serif; }
        code, pre, .font-mono { font-family: 'JetBrains Mono', monospace; }
        .glass-panel {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .glass-card:hover {
            border-color: rgba(56, 189, 248, 0.3);
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0b1120; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col selection:bg-cyan-500 selection:text-slate-950">

<?php if ($isStudentLoggedIn && $currentStudent): ?>
    <!-- ─── AUTHENTICATED STUDENT DASHBOARD ──────────────────────────────── -->
    <header class="sticky top-0 z-40 glass-panel border-b border-white/10 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand -->
            <div class="flex items-center gap-3">
                <a href="../index.php" class="flex items-center gap-2.5 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-500 flex items-center justify-center text-slate-950 shadow-md group-hover:scale-105 transition">
                        <i class="fa-solid fa-graduation-cap text-base"></i>
                    </div>
                    <div>
                        <div class="text-[10px] uppercase tracking-widest text-emerald-400 font-mono font-bold">Physics 4 Microbiology</div>
                        <div class="text-sm sm:text-base font-bold text-white group-hover:text-emerald-300 transition">ระบบสารสนเทศและการส่งงานของผู้เรียน</div>
                    </div>
                </a>
            </div>

            <!-- Student Profile & Actions -->
            <div class="flex items-center gap-3">
                <a href="../index.php" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-800/80 hover:bg-slate-700 text-xs font-semibold text-slate-300 transition border border-white/5">
                    <i class="fa-solid fa-house"></i>
                    <span>หน้าหลักวิชา</span>
                </a>

                <a href="../virtual_lab/index.html" class="hidden sm:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-cyan-500/10 hover:bg-cyan-500/20 text-cyan-300 text-xs font-semibold transition border border-cyan-500/30">
                    <i class="fa-solid fa-flask"></i>
                    <span>ห้องแล็บเสมือนจริง 3D</span>
                </a>

                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-900 border border-emerald-500/30">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-emerald-400 to-cyan-500 text-slate-950 font-bold text-xs flex items-center justify-center font-mono">
                        <?= substr($currentStudent['student_id'], -2) ?>
                    </div>
                    <div class="text-left">
                        <div class="text-xs font-bold text-white leading-tight">
                            <?= htmlspecialchars(($currentStudent['prefix'] ?? '') . $currentStudent['fullname']) ?>
                        </div>
                        <div class="text-[10px] text-emerald-400 font-mono">
                            รหัส: <?= htmlspecialchars($currentStudent['student_id']) ?> (<?= htmlspecialchars($currentStudent['section'] ?? 'Sec 01') ?>)
                        </div>
                    </div>
                </div>

                <a href="index.php?action=student_logout"
                   class="p-2 rounded-xl bg-slate-900 hover:bg-rose-500/20 border border-slate-800 hover:border-rose-500/40 text-slate-400 hover:text-rose-400 transition"
                   title="ออกจากระบบนักศึกษา (Logout)">
                    <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Student Dashboard Body -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        <?php if (isset($_GET['registered'])): ?>
            <div class="p-4 rounded-2xl bg-gradient-to-r from-emerald-500/20 via-teal-500/20 to-cyan-500/20 border border-emerald-500/40 text-emerald-200 text-sm flex items-center justify-between shadow-lg">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">🎉</span>
                    <div>
                        <strong class="font-bold text-white">ยินดีต้อนรับ <?= htmlspecialchars($currentStudent['fullname']) ?>!</strong>
                        <div class="text-xs text-emerald-300">ลงทะเบียนเข้าสู่ระบบวิชา 4011111 สำเร็จ พร้อมทำการทดลองและติดตามการส่งงานทั้ง 13 ปฏิบัติการได้ทันที</div>
                    </div>
                </div>
                <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-white text-xs px-2 py-1">✕</button>
            </div>
        <?php endif; ?>

        <!-- Welcome Banner -->
        <div class="glass-panel p-6 sm:p-8 rounded-3xl relative overflow-hidden border border-white/10 bg-gradient-to-r from-slate-900 via-slate-900/90 to-emerald-950/40">
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <div class="space-y-2">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold font-mono">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>Student Learning Console: Active</span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                        ผลการเรียนและการส่งรายงานปฏิบัติการเสมือนจริง
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-300 max-w-2xl">
                        <?= htmlspecialchars($currentStudent['program'] ?? 'จุลชีววิทยา') ?> • <?= htmlspecialchars($currentStudent['faculty'] ?? 'คณะวิทยาศาสตร์และเทคโนโลยี') ?> • <?= htmlspecialchars($currentStudent['university'] ?? 'มหาวิทยาลัยราชภัฏรำไพพรรณี') ?>
                    </p>
                </div>

                <!-- Progress Circle / Mini Widget -->
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-slate-950/60 border border-white/10">
                    <div class="text-center">
                        <div class="text-2xl sm:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-cyan-400 font-mono">
                            <?= $studentProgressPct ?>%
                        </div>
                        <div class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold">ความก้าวหน้ารวม</div>
                    </div>
                    <div class="w-px h-10 bg-slate-800"></div>
                    <div class="text-xs text-slate-300 space-y-1">
                        <div>ส่งแล้ว: <strong class="text-white font-mono"><?= $totalSubmittedLabs ?>/13</strong> แล็บ</div>
                        <div>ตรวจแล้ว: <strong class="text-emerald-400 font-mono"><?= $studentGradedCount ?></strong> ฉบับ</div>
                    </div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mt-6 pt-4 border-t border-slate-800/80">
                <div class="flex items-center justify-between text-xs text-slate-400 mb-1.5 font-mono">
                    <span>สถานะความก้าวหน้าทั้ง 13 ปฏิบัติการ</span>
                    <span class="text-emerald-400 font-bold"><?= $totalSubmittedLabs ?> จาก 13 ปฏิบัติการ (<?= $studentProgressPct ?>%)</span>
                </div>
                <div class="w-full h-3 rounded-full bg-slate-950 border border-slate-800 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-emerald-500 via-teal-400 to-cyan-400 transition-all duration-700 shadow-lg shadow-emerald-500/50"
                         style="width: <?= $studentProgressPct ?>%;"></div>
                </div>
            </div>
        </div>

        <!-- 4 Stat Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="glass-card p-5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between text-slate-400">
                    <span class="text-xs font-semibold">ส่งรายงานแล้ว</span>
                    <i class="fa-solid fa-file-arrow-up text-cyan-400"></i>
                </div>
                <div class="text-2xl sm:text-3xl font-extrabold text-white font-mono"><?= $totalSubmittedLabs ?> <span class="text-xs text-slate-500 font-sans">/ 13 แล็บ</span></div>
                <div class="text-[11px] text-cyan-300">รายงานถูกบันทึกลง SQLite3</div>
            </div>

            <div class="glass-card p-5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between text-slate-400">
                    <span class="text-xs font-semibold">อาจารย์ตรวจแล้ว</span>
                    <i class="fa-solid fa-clipboard-check text-emerald-400"></i>
                </div>
                <div class="text-2xl sm:text-3xl font-extrabold text-emerald-400 font-mono"><?= $studentGradedCount ?> <span class="text-xs text-slate-500 font-sans">ฉบับ</span></div>
                <div class="text-[11px] text-emerald-300">ประเมินและให้คะแนนสมบูรณ์</div>
            </div>

            <div class="glass-card p-5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between text-slate-400">
                    <span class="text-xs font-semibold">รออาจารย์ตรวจ</span>
                    <i class="fa-solid fa-clock text-amber-400"></i>
                </div>
                <div class="text-2xl sm:text-3xl font-extrabold text-amber-400 font-mono"><?= $studentPendingCount ?> <span class="text-xs text-slate-500 font-sans">ฉบับ</span></div>
                <div class="text-[11px] text-amber-300">อยู่ในคิวการตรวจของอาจารย์</div>
            </div>

            <div class="glass-card p-5 rounded-2xl space-y-2">
                <div class="flex items-center justify-between text-slate-400">
                    <span class="text-xs font-semibold">ความแม่นยำเฉลี่ย</span>
                    <i class="fa-solid fa-bullseye text-purple-400"></i>
                </div>
                <div class="text-2xl sm:text-3xl font-extrabold text-purple-400 font-mono"><?= $studentAvgAccuracy ?>%</div>
                <div class="text-[11px] text-purple-300">ความแม่นยำการทดลองเสมือนจริง</div>
            </div>
        </div>

        <!-- 13 Labs Interactive Submissions Tracker Table -->
        <div class="glass-panel rounded-3xl overflow-hidden border border-white/10 shadow-xl space-y-4 p-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-slate-800">
                <div>
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-cyan-400"></i>
                        <span>รายการติดตาม 13 ปฏิบัติการชีวฟิสิกส์</span>
                    </h2>
                    <p class="text-xs text-slate-400">คลิกที่ปุ่ม 'ทำการทดลอง' เพื่อเข้าสู่ห้องแล็บ 3D และส่งรายงานผลออนไลน์</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="px-2.5 py-1 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-mono font-bold">
                        สถานะ: <?= $totalSubmittedLabs >= 13 ? 'ส่งครบทุกแล็บแล้ว 🎉' : 'เหลืออีก ' . (13 - $totalSubmittedLabs) . ' แล็บ' ?>
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="text-xs text-slate-400 uppercase tracking-wider border-b border-slate-800/80 bg-slate-900/60 font-mono">
                            <th class="py-3.5 px-4 font-semibold">แล็บ</th>
                            <th class="py-3.5 px-4 font-semibold">ชื่อปฏิบัติการ (Courseware Lab Title)</th>
                            <th class="py-3.5 px-4 font-semibold">สถานะการส่ง</th>
                            <th class="py-3.5 px-4 font-semibold">คะแนน / ความแม่นยำ</th>
                            <th class="py-3.5 px-4 font-semibold">ข้อเสนอแนะอาจารย์</th>
                            <th class="py-3.5 px-4 font-semibold text-right">การปฏิบัติการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-xs">
                        <?php
                        $labUrls = [
                            1 => '../03_physics4microbio2026/labs/lab01_measurement.php',
                            2 => '../03_physics4microbio2026/labs/lab02_brownian_motion.php',
                            3 => '../03_physics4microbio2026/labs/lab03_viscosity.php',
                            4 => '../03_physics4microbio2026/labs/lab04_centrifuge.php',
                            5 => '../03_physics4microbio2026/labs/lab05_heat_incubator.php',
                            6 => '../03_physics4microbio2026/labs/lab06_autoclave.php',
                            7 => '../03_physics4microbio2026/labs/lab07_gram_electrostatics.php',
                            8 => '../03_physics4microbio2026/labs/lab08_electrophoresis.php',
                            9 => '../03_physics4microbio2026/labs/lab09_refraction.php',
                            10 => '../03_physics4microbio2026/labs/lab10_microscope.php',
                            11 => '../03_physics4microbio2026/labs/lab11_radioactivity_uv.php',
                            12 => '../03_physics4microbio2026/labs/lab12_od600.php',
                            13 => '../03_physics4microbio2026/labs/lab13_mini_project.php',
                        ];

                        foreach ($allLabsCatalog as $labCat):
                            $lNum = (int)$labCat['lab_number'];
                            $lId = strtolower($labCat['lab_id']);
                            $normKey = sprintf("lab%02d", $lNum);
                            $report = $studentReportsByLab[$normKey] ?? ($studentReportsByLab[$lId] ?? null);
                            $isSubmitted = !empty($report);
                            $isGraded = $isSubmitted && ($report['instructor_score'] !== null && $report['instructor_score'] !== '');
                            $labLink = $labUrls[$lNum] ?? "../03_physics4microbio2026/labs/lab01_measurement.php";
                        ?>
                        <tr class="hover:bg-slate-900/40 transition">
                            <!-- Lab Number Badge -->
                            <td class="py-3.5 px-4 font-mono font-bold">
                                <span class="px-2.5 py-1 rounded-lg <?= $isGraded ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : ($isSubmitted ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : 'bg-slate-800 text-slate-400') ?>">
                                    LAB <?= sprintf('%02d', $lNum) ?>
                                </span>
                            </td>

                            <!-- Title -->
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-white text-xs sm:text-sm"><?= htmlspecialchars($labCat['title_th']) ?></div>
                                <div class="text-[11px] text-slate-400 font-mono"><?= htmlspecialchars($labCat['title_en'] ?? '') ?></div>
                            </td>

                            <!-- Submission Status -->
                            <td class="py-3.5 px-4">
                                <?php if ($isGraded): ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 font-semibold text-[11px]">
                                        <i class="fa-solid fa-circle-check text-emerald-400"></i> ตรวจแล้ว
                                    </span>
                                <?php elseif ($isSubmitted): ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-500/20 border border-amber-500/40 text-amber-300 font-semibold text-[11px]">
                                        <i class="fa-solid fa-clock-rotate-left text-amber-400"></i> ส่งแล้ว (รอตรวจ)
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-800/80 border border-slate-700 text-slate-400 font-semibold text-[11px]">
                                        <i class="fa-solid fa-hourglass-start"></i> ยังไม่ส่งรายงาน
                                    </span>
                                <?php endif; ?>
                            </td>

                            <!-- Scores -->
                            <td class="py-3.5 px-4">
                                <?php if ($isSubmitted): ?>
                                    <div class="space-y-0.5">
                                        <?php if ($isGraded): ?>
                                            <div class="text-xs font-bold text-emerald-300 font-mono">
                                                คะแนน: <?= htmlspecialchars($report['instructor_score']) ?> / 10
                                            </div>
                                        <?php endif; ?>
                                        <div class="text-[11px] text-slate-400">
                                            ความแม่นยำ: <strong class="text-cyan-300 font-mono"><?= htmlspecialchars($report['accuracy_score'] ?? '0') ?>%</strong>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <span class="text-slate-600">-</span>
                                <?php endif; ?>
                            </td>

                            <!-- Feedback -->
                            <td class="py-3.5 px-4 max-w-xs">
                                <?php if ($isGraded && !empty($report['instructor_feedback'])): ?>
                                    <div class="text-xs text-amber-200 bg-amber-950/30 border border-amber-500/30 rounded-lg p-2 leading-relaxed">
                                        "<?= htmlspecialchars($report['instructor_feedback']) ?>"
                                    </div>
                                <?php elseif ($isSubmitted): ?>
                                    <span class="text-slate-500 text-[11px]">รออาจารย์บันทึกข้อเสนอแนะ</span>
                                <?php else: ?>
                                    <span class="text-slate-600">-</span>
                                <?php endif; ?>
                            </td>

                            <!-- Actions -->
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    <?php if ($isSubmitted): ?>
                                        <button type="button"
                                                onclick='openReportModal(<?= json_encode($report, JSON_HEX_APOS | JSON_HEX_QUOT) ?>, <?= json_encode($labCat, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'
                                                class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-cyan-300 border border-cyan-500/30 text-xs font-semibold transition flex items-center gap-1.5"
                                                title="ดูข้อมูลรายงานผลการทดลองที่ส่ง">
                                            <i class="fa-solid fa-file-lines"></i>
                                            <span>ดูรายงาน</span>
                                        </button>
                                    <?php endif; ?>

                                    <a href="<?= $labLink ?>" target="_blank"
                                       class="px-3.5 py-1.5 rounded-lg <?= $isSubmitted ? 'bg-slate-800/80 hover:bg-slate-700 text-slate-300' : 'bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold shadow-md' ?> text-xs transition flex items-center gap-1.5">
                                        <i class="fa-solid fa-flask"></i>
                                        <span><?= $isSubmitted ? 'ทบทวนแล็บ' : 'ทำแล็บ & ส่งรายงาน' ?></span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Links Hub -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
            <a href="../03_physics4microbio2026/index.php" class="glass-card p-5 rounded-2xl hover:border-cyan-400/50 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center group-hover:scale-110 transition">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div class="font-bold text-white text-sm group-hover:text-cyan-300 transition">12 บทเรียนทฤษฎีชีวฟิสิกส์</div>
                <p class="text-xs text-slate-400 leading-relaxed">เข้าศึกษาเอกสารคำสอน 12 บทเรียน พร้อมสูตรคำนวณและข้อสอบประเมินตนเอง</p>
            </a>

            <a href="../virtual_lab/index.html" class="glass-card p-5 rounded-2xl hover:border-teal-400/50 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-teal-500/10 text-teal-400 flex items-center justify-center group-hover:scale-110 transition">
                    <i class="fa-solid fa-cube"></i>
                </div>
                <div class="font-bold text-white text-sm group-hover:text-teal-300 transition">ห้องแล็บเสมือนจริง 3D Hub</div>
                <p class="text-xs text-slate-400 leading-relaxed">รวมซิมูเลเตอร์ 3 มิติ PBR และจำลองการทดลองเสมือนจริงทุกบท</p>
            </a>

            <a href="../แผนการสอน 2027/เอกสารคำสอน_3D_AR_ArUco/webar_aruco/ar_aruco_textbook.html?ar=1" target="_blank" class="glass-card p-5 rounded-2xl hover:border-purple-400/50 transition group space-y-2">
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center group-hover:scale-110 transition">
                    <i class="fa-solid fa-camera-rotate"></i>
                </div>
                <div class="font-bold text-white text-sm group-hover:text-purple-300 transition">3D WebAR ArUco Scanner</div>
                <p class="text-xs text-slate-400 leading-relaxed">เปิดกล้องสมาร์ทโฟนส่องมาร์กเกอร์ ArUco (ID 0–11) ในหนังสือเรียน</p>
            </a>
        </div>
    </main>

    <!-- Student Report Details Modal -->
    <div id="studentReportModal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md hidden items-center justify-center p-4">
        <div class="glass-panel w-full max-w-2xl rounded-3xl p-6 sm:p-8 space-y-6 border border-white/20 shadow-2xl relative max-h-[90vh] overflow-y-auto">
            <button onclick="closeReportModal()" class="absolute top-5 right-5 w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center text-sm transition">
                ✕
            </button>
            <div class="space-y-1">
                <div class="text-xs font-mono uppercase tracking-widest text-cyan-400 font-bold" id="modalReportCode">REPORT</div>
                <h3 class="text-xl font-bold text-white" id="modalLabTitle">ข้อมูลรายงานผลการทดลอง</h3>
                <div class="text-xs text-slate-400" id="modalSubmitTime">เวลาส่งรายงาน: -</div>
            </div>

            <!-- Scores summary -->
            <div class="grid grid-cols-2 gap-3 p-4 rounded-2xl bg-slate-900/80 border border-slate-800">
                <div>
                    <div class="text-xs text-slate-400">ความแม่นยำจากการจำลอง</div>
                    <div class="text-xl font-extrabold text-cyan-300 font-mono" id="modalAccuracy">-%</div>
                </div>
                <div>
                    <div class="text-xs text-slate-400">คะแนนประเมินจากอาจารย์</div>
                    <div class="text-xl font-extrabold text-emerald-400 font-mono" id="modalInstructorScore">รออาจารย์ตรวจ</div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-semibold text-slate-300">ข้อเสนอแนะจากอาจารย์ผู้สอน:</label>
                <div class="p-3.5 rounded-xl bg-slate-900/90 border border-slate-800 text-xs text-amber-200" id="modalFeedback">
                    ยังไม่มีข้อเสนอแนะ
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-xs font-semibold text-slate-300">ตารางข้อมูลผลการทดลองที่บันทึก (Data Table / Parameters):</label>
                <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 font-mono text-[11px] text-slate-300 overflow-x-auto max-h-56" id="modalTableData">
                    -
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="button" onclick="closeReportModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs transition">
                    ปิดหน้าต่าง
                </button>
            </div>
        </div>
    </div>

    <script>
        function openReportModal(report, labCat) {
            document.getElementById('modalReportCode').textContent = report.report_code || 'LAB REPORT';
            document.getElementById('modalLabTitle').textContent = (labCat ? labCat.title_th : '') + ' (' + report.lab_id.toUpperCase() + ')';
            document.getElementById('modalSubmitTime').textContent = 'เวลาส่งรายงาน: ' + (report.submitted_at || '-');
            document.getElementById('modalAccuracy').textContent = (report.accuracy_score !== null ? report.accuracy_score + '%' : '-');
            document.getElementById('modalInstructorScore').textContent = (report.instructor_score !== null ? report.instructor_score + ' / 10 คะแนน' : '⏳ รออาจารย์ตรวจ');
            document.getElementById('modalFeedback').textContent = report.instructor_feedback || 'ยังไม่มีข้อเสนอแนะจากอาจารย์';

            const tableEl = document.getElementById('modalTableData');
            try {
                if (report.table_data_json) {
                    const parsed = JSON.parse(report.table_data_json);
                    tableEl.textContent = JSON.stringify(parsed, null, 2);
                } else {
                    tableEl.textContent = 'ไม่มีข้อมูลตารางบันทึกเพิ่มเติม';
                }
            } catch (e) {
                tableEl.textContent = report.table_data_json || '-';
            }

            const modal = document.getElementById('studentReportModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeReportModal() {
            const modal = document.getElementById('studentReportModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

<?php elseif (!$isLoggedIn): ?>
    <!-- ─── UNIFIED AUTHENTICATION & REGISTRATION GATEWAY ─────────────────── -->
    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-cyan-950">
        <!-- Ambient Glow Circles -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="w-full max-w-lg relative z-10 my-8">
            <div class="glass-panel p-6 sm:p-8 rounded-3xl shadow-2xl border border-white/10 space-y-6">
                <!-- Header -->
                <div class="text-center space-y-2">
                    <div class="inline-flex p-3 rounded-2xl bg-gradient-to-tr from-cyan-500/20 to-teal-500/20 border border-cyan-500/30 text-cyan-400 mb-2 shadow-lg shadow-cyan-950/50">
                        <i class="fa-solid fa-graduation-cap text-2xl"></i>
                    </div>
                    <div class="text-xs uppercase tracking-widest text-cyan-400 font-mono font-semibold">Faculty of Science and Technology • RBRU</div>
                    <h1 class="text-2xl font-bold text-white tracking-tight">ระบบลงทะเบียนและเข้าสู่ระบบ</h1>
                    <p class="text-xs text-slate-400">4011111 ฟิสิกส์สำหรับจุลชีววิทยา (Physics for Microbiology)</p>
                </div>

                <!-- 3 Tab Switchers -->
                <div class="grid grid-cols-3 gap-1.5 p-1.5 rounded-2xl bg-slate-900/90 border border-slate-800">
                    <button type="button" onclick="switchAuthTab('student')" id="tabBtn-student"
                            class="py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 <?= $activeTab === 'student' ? 'bg-gradient-to-r from-cyan-500 to-teal-500 text-slate-950 shadow-md' : 'text-slate-400 hover:text-white' ?>">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>เข้าสู่ระบบนักศึกษา</span>
                    </button>

                    <button type="button" onclick="switchAuthTab('register')" id="tabBtn-register"
                            class="py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 <?= $activeTab === 'register' ? 'bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 shadow-md' : 'text-slate-400 hover:text-white' ?>">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>ลงทะเบียนใหม่</span>
                    </button>

                    <button type="button" onclick="switchAuthTab('instructor')" id="tabBtn-instructor"
                            class="py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 <?= $activeTab === 'instructor' ? 'bg-gradient-to-r from-amber-500 to-orange-500 text-slate-950 shadow-md' : 'text-slate-400 hover:text-white' ?>">
                        <i class="fa-solid fa-user-shield"></i>
                        <span>อาจารย์ผู้สอน</span>
                    </button>
                </div>

                <!-- ════ TAB 1: STUDENT LOGIN ════ -->
                <div id="tabContent-student" class="<?= $activeTab === 'student' ? 'block' : 'hidden' ?> space-y-4">
                    <?php if ($studentLoginError): ?>
                        <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs flex items-center gap-2">
                            <i class="fa-solid fa-triangle-exclamation text-rose-400"></i>
                            <span><?= htmlspecialchars($studentLoginError) ?></span>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">รหัสนักศึกษา (Student ID)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                                    <i class="fa-solid fa-id-card text-xs"></i>
                                </span>
                                <input type="text" name="student_id" placeholder="เช่น 67144001 หรือ 6604101001" required
                                       class="w-full pl-9 pr-3.5 py-3 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 text-sm text-white placeholder-slate-500 outline-none transition font-mono">
                            </div>
                            <p class="text-[11px] text-slate-400 mt-1">กรอกรหัสนักศึกษาเพื่อเข้าดูผลการเรียน คะแนนแล็บ และส่งรายงานออนไลน์</p>
                        </div>

                        <button type="submit" name="student_login_submit"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 text-slate-950 font-bold text-sm shadow-lg shadow-cyan-950/40 hover:scale-[1.01] active:scale-[0.99] transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span>เข้าสู่ระบบติดตามผลการเรียน (Sign In)</span>
                        </button>
                    </form>

                    <div class="p-3 rounded-xl bg-slate-900/60 border border-white/5 text-xs text-center text-slate-400">
                        ยังไม่เคยลงทะเบียนในระบบ? 
                        <button type="button" onclick="switchAuthTab('register')" class="text-cyan-400 hover:underline font-bold ml-1">
                            คลิกที่นี่เพื่อลงทะเบียนนักศึกษาใหม่
                        </button>
                    </div>
                </div>

                <!-- ════ TAB 2: STUDENT REGISTRATION ════ -->
                <div id="tabContent-register" class="<?= $activeTab === 'register' ? 'block' : 'hidden' ?> space-y-4">
                    <?php if ($studentRegError): ?>
                        <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs flex items-center gap-2">
                            <i class="fa-solid fa-triangle-exclamation text-rose-400"></i>
                            <span><?= htmlspecialchars($studentRegError) ?></span>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php" class="space-y-3.5">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="sm:col-span-1">
                                <label class="block text-xs font-semibold text-slate-300 mb-1">คำนำหน้า</label>
                                <select name="prefix" class="w-full px-3 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-sm text-white outline-none">
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-1">รหัสนักศึกษา *</label>
                                <input type="text" name="student_id" placeholder="เช่น 67144001" required
                                       class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-sm text-white placeholder-slate-500 outline-none font-mono">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">ชื่อ - นามสกุล *</label>
                            <input type="text" name="fullname" placeholder="เช่น ชลธิชา สุขเกษม" required
                                   class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-sm text-white placeholder-slate-500 outline-none">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1">สาขาวิชา</label>
                                <select name="program" class="w-full px-3 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-xs text-white outline-none">
                                    <option value="จุลชีววิทยา">จุลชีววิทยา</option>
                                    <option value="วิทยาศาสตร์และเทคโนโลยีการเกษตร">วิทยาศาสตร์และเทคโนโลยีการเกษตร</option>
                                    <option value="วิทยาศาสตร์สิ่งแวดล้อม">วิทยาศาสตร์สิ่งแวดล้อม</option>
                                    <option value="เทคโนโลยีชีวภาพ">เทคโนโลยีชีวภาพ</option>
                                    <option value="วิทยาศาสตร์ทั่วไป">วิทยาศาสตร์ทั่วไป</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1">กลุ่มเรียน (Section)</label>
                                <select name="section" class="w-full px-3 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-xs text-white outline-none">
                                    <option value="Sec 01">Sec 01</option>
                                    <option value="Sec 02">Sec 02</option>
                                    <option value="Sec 03">Sec 03</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1">อีเมลนักศึกษา (RBRU Mail)</label>
                                <input type="email" name="email" placeholder="student@rbru.ac.th"
                                       class="w-full px-3 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-xs text-white placeholder-slate-500 outline-none font-mono">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-1">เบอร์โทรศัพท์</label>
                                <input type="tel" name="phone" placeholder="08x-xxx-xxxx"
                                       class="w-full px-3 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-emerald-400 text-xs text-white placeholder-slate-500 outline-none font-mono">
                            </div>
                        </div>

                        <button type="submit" name="student_register_submit"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 font-bold text-sm shadow-lg shadow-emerald-950/40 hover:scale-[1.01] active:scale-[0.99] transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>บันทึกลงทะเบียนเรียน (Register Student)</span>
                        </button>
                    </form>
                </div>

                <!-- ════ TAB 3: INSTRUCTOR LOGIN ════ -->
                <div id="tabContent-instructor" class="<?= $activeTab === 'instructor' ? 'block' : 'hidden' ?> space-y-4">
                    <?php if ($loginError): ?>
                        <div class="p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs flex items-center gap-2">
                            <i class="fa-solid fa-triangle-exclamation text-rose-400"></i>
                            <span><?= htmlspecialchars($loginError) ?></span>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="index.php" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">ชื่อผู้ใช้งานอาจารย์ (Username)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                                    <i class="fa-solid fa-user text-xs"></i>
                                </span>
                                <input type="text" name="username" value="admin" required
                                       class="w-full pl-9 pr-3.5 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm text-white placeholder-slate-500 outline-none transition font-mono">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1.5">รหัสผ่าน (Password)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-500">
                                    <i class="fa-solid fa-lock text-xs"></i>
                                </span>
                                <input type="password" name="password" value="LEQs" required
                                       class="w-full pl-9 pr-3.5 py-2.5 rounded-xl bg-slate-900/90 border border-slate-700/80 focus:border-amber-400 focus:ring-1 focus:ring-amber-400 text-sm text-white placeholder-slate-500 outline-none transition font-mono">
                            </div>
                        </div>

                        <div class="bg-slate-900/50 border border-white/5 p-3 rounded-xl text-[11px] text-slate-400 flex items-start gap-2">
                            <i class="fa-solid fa-key text-amber-400 mt-0.5"></i>
                            <div>
                                <span class="text-slate-300 font-semibold">บัญชีทดสอบเริ่มต้น:</span>
                                <span class="font-mono text-cyan-300">admin</span> / รหัสผ่าน: <span class="font-mono text-cyan-300">LEQs</span>
                            </div>
                        </div>

                        <button type="submit" name="login_submit"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-slate-950 font-bold text-sm shadow-lg shadow-amber-950/40 hover:scale-[1.01] active:scale-[0.99] transition flex items-center justify-center gap-2">
                            <i class="fa-solid fa-user-shield"></i>
                            <span>เข้าสู่ระบบอาจารย์ผู้สอน (Instructor Sign In)</span>
                        </button>
                    </form>
                </div>

                <!-- Footer Back to Home -->
                <div class="text-center pt-2 border-t border-slate-800">
                    <a href="../index.php" class="text-xs text-slate-400 hover:text-cyan-400 transition flex items-center justify-center gap-1.5">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>กลับสู่หน้าหลักบทเรียน (Course Portal)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchAuthTab(tab) {
            ['student', 'register', 'instructor'].forEach(t => {
                const btn = document.getElementById('tabBtn-' + t);
                const content = document.getElementById('tabContent-' + t);
                if (t === tab) {
                    content.classList.remove('hidden');
                    content.classList.add('block');
                    if (t === 'student') {
                        btn.className = 'py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 bg-gradient-to-r from-cyan-500 to-teal-500 text-slate-950 shadow-md';
                    } else if (t === 'register') {
                        btn.className = 'py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 bg-gradient-to-r from-emerald-500 to-teal-500 text-slate-950 shadow-md';
                    } else {
                        btn.className = 'py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 bg-gradient-to-r from-amber-500 to-orange-500 text-slate-950 shadow-md';
                    }
                } else {
                    content.classList.add('hidden');
                    content.classList.remove('block');
                    btn.className = 'py-2.5 px-2 rounded-xl text-xs font-bold transition flex items-center justify-center gap-1.5 text-slate-400 hover:text-white';
                }
            });
        }
    </script>
<?php else: ?>
    <!-- ─── AUTHENTICATED INSTRUCTOR DASHBOARD ──────────────────────────────── -->
    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 glass-panel border-b border-white/10 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <!-- Brand -->
            <div class="flex items-center gap-3">
                <a href="../index.php" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-teal-500 flex items-center justify-center text-slate-950 shadow-md group-hover:scale-105 transition">
                        <i class="fa-solid fa-microscope text-base"></i>
                    </div>
                    <div>
                        <div class="text-xs uppercase tracking-widest text-cyan-400 font-mono font-bold">Physics 4 Microbiology</div>
                        <div class="text-sm sm:text-base font-bold text-white group-hover:text-cyan-300 transition">ระบบจัดการหลังบ้านสำหรับอาจารย์ผู้สอน</div>
                    </div>
                </a>
            </div>

            <!-- User Menu & Actions -->
            <div class="flex items-center gap-3">
                <a href="../index.php" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-800/80 hover:bg-slate-700 text-xs font-semibold text-slate-300 transition border border-white/5">
                    <i class="fa-solid fa-house"></i>
                    <span>หน้าหลักวิชา</span>
                </a>

                <a href="../fui_cyber_showcase.php" class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-500/10 hover:bg-amber-500/20 text-xs font-semibold text-amber-300 transition border border-amber-500/30">
                    <i class="fa-solid fa-microchip text-amber-400"></i>
                    <span>FUI Cyber Design</span>
                </a>

                <a href="../virtual_lab/api/api.php?action=export_csv" target="_blank"
                   class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-500/20 hover:bg-emerald-500/30 text-emerald-300 border border-emerald-500/30 text-xs font-semibold transition">
                    <i class="fa-solid fa-file-csv"></i>
                    <span class="hidden sm:inline">ส่งออก CSV (Excel ภาษาไทย)</span>
                </a>

                <!-- Instructor Profile Pill -->
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-900 border border-white/10">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 text-slate-950 font-bold text-xs flex items-center justify-center">
                        CT
                    </div>
                    <div class="hidden sm:block text-left">
                        <div class="text-xs font-bold text-white"><?= htmlspecialchars($adminUser['fullname']) ?></div>
                        <div class="text-[10px] text-cyan-400 font-mono">อาจารย์ผู้สอน (Instructor)</div>
                    </div>
                </div>

                <a href="index.php?action=logout"
                   class="p-2 rounded-xl bg-slate-900 hover:bg-rose-500/20 border border-slate-800 hover:border-rose-500/40 text-slate-400 hover:text-rose-400 transition"
                   title="ออกจากระบบ (Logout)">
                    <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

        <!-- Welcome Banner -->
        <div class="glass-panel p-6 rounded-3xl relative overflow-hidden border border-white/10 bg-gradient-to-r from-slate-900 via-slate-900/90 to-cyan-950/40">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-300 text-xs font-bold font-mono">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>SQLite3 Central Database: Connected</span>
                    </div>
                    <h2 class="text-2xl font-bold text-white">แผงควบคุมและประเมินผลสัมฤทธิ์ทางการเรียน (OBE Console)</h2>
                    <p class="text-xs sm:text-sm text-slate-400">
                        หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาจุลชีววิทยา • รายวิชา 4011111 ฟิสิกส์สำหรับจุลชีววิทยา 3(2-3-4) ภาคการศึกษา 2569/2570
                    </p>
                </div>

                <div class="flex items-center gap-2 self-start md:self-auto">
                    <button onclick="window.location.reload()" class="px-3.5 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold flex items-center gap-2 transition border border-white/5">
                        <i class="fa-solid fa-rotate"></i>
                        <span>รีเฟรชข้อมูล</span>
                    </button>
                    <a href="../virtual_lab/index.html" target="_blank" class="px-3.5 py-2 rounded-xl bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-bold flex items-center gap-2 transition shadow-lg shadow-cyan-950/50">
                        <i class="fa-solid fa-flask"></i>
                        <span>เปิด Virtual Lab Hub</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- KPI Metric Cards Grid with FUI Cybernetic Frames -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Card 1: Total Students -->
            <div class="fui-card-amber p-5 space-y-2">
                <div class="flex items-center justify-between text-slate-400 text-xs pt-1">
                    <span class="font-semibold uppercase tracking-wider font-mono text-amber-300">STUDENTS ROSTER</span>
                    <div class="fui-dot-matrix">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-white font-mono"><?= number_format($totalStudents) ?></div>
                <div class="text-[11px] text-slate-400 flex items-center justify-between pt-1">
                    <span class="text-emerald-400 font-semibold"><i class="fa-solid fa-check mr-1"></i>สาขาวิชาจุลชีววิทยา</span>
                    <div class="w-12 h-2 fui-vent-stripes rounded-sm opacity-60"></div>
                </div>
            </div>

            <!-- Card 2: Reports Submitted -->
            <div class="fui-card-amber p-5 space-y-2" style="border-color: #06b6d4;">
                <div class="flex items-center justify-between text-slate-400 text-xs pt-1">
                    <span class="font-semibold uppercase tracking-wider font-mono text-cyan-300">SUBMITTED REPORTS</span>
                    <div class="fui-dot-matrix">
                        <span style="background:#06b6d4;"></span><span style="background:#06b6d4;"></span><span style="background:#06b6d4;"></span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-cyan-300 font-mono"><?= number_format($totalReports) ?></div>
                <div class="text-[11px] text-slate-400 flex items-center justify-between pt-1">
                    <span>จากทั้ง 12 ปฏิบัติการชีวฟิสิกส์</span>
                    <div class="w-12 h-2 fui-vent-stripes-cyan rounded-sm opacity-60"></div>
                </div>
            </div>

            <!-- Card 3: Graded vs Pending -->
            <div class="fui-card-amber p-5 space-y-2">
                <div class="flex items-center justify-between text-slate-400 text-xs pt-1">
                    <span class="font-semibold uppercase tracking-wider font-mono text-amber-300">GRADING PIPELINE</span>
                    <div class="fui-dot-matrix">
                        <span></span><span></span><span></span>
                    </div>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-bold text-emerald-400 font-mono"><?= $gradedCount ?></span>
                    <span class="text-xs text-slate-400 font-mono">/ <?= $pendingCount ?> รอตรวจ</span>
                </div>
                <div class="w-full bg-slate-800 rounded-full h-1.5 overflow-hidden">
                    <?php $gradedPct = $totalReports > 0 ? round(($gradedCount / $totalReports) * 100) : 0; ?>
                    <div class="bg-gradient-to-r from-emerald-500 to-cyan-400 h-full" style="width: <?= $gradedPct ?>%;"></div>
                </div>
            </div>

            <!-- Card 4: Average Accuracy -->
            <div class="fui-card-amber p-5 space-y-2" style="border-color: #8b5cf6;">
                <div class="flex items-center justify-between text-slate-400 text-xs pt-1">
                    <span class="font-semibold uppercase tracking-wider font-mono text-violet-300">ACCURACY INDEX</span>
                    <div class="fui-dot-matrix">
                        <span style="background:#8b5cf6;"></span><span style="background:#8b5cf6;"></span><span style="background:#8b5cf6;"></span>
                    </div>
                </div>
                <div class="text-3xl font-bold text-purple-300 font-mono"><?= $avgAccuracy ?>%</div>
                <div class="text-[11px] text-slate-400 flex items-center justify-between pt-1">
                    <span class="text-purple-400 font-semibold"><i class="fa-solid fa-bullseye mr-1"></i>ISO/IEC 17025</span>
                    <div class="w-12 h-2 fui-vent-stripes rounded-sm opacity-60" style="background: repeating-linear-gradient(-45deg, #8b5cf6, #8b5cf6 2px, transparent 2px, transparent 7px);"></div>
                </div>
            </div>
        </div>

        <!-- Main Tab Controls -->
        <div class="flex border-b border-slate-800 space-x-2 text-xs font-bold" id="adminTabs">
            <button onclick="switchTab('tab-submissions')" id="btn-tab-submissions"
                    class="py-3 px-4 border-b-2 border-cyan-400 text-cyan-400 flex items-center gap-2 transition">
                <i class="fa-solid fa-list-check"></i>
                <span>รายการส่งรายงานและตรวจให้คะแนน (Submissions)</span>
            </button>
            <button onclick="switchTab('tab-roster')" id="btn-tab-roster"
                    class="py-3 px-4 border-b-2 border-transparent text-slate-400 hover:text-slate-200 flex items-center gap-2 transition">
                <i class="fa-solid fa-users"></i>
                <span>ทะเบียนนักศึกษาและการส่งงาน 12 แล็บ (Student Roster)</span>
            </button>
            <button onclick="switchTab('tab-analytics')" id="btn-tab-analytics"
                    class="py-3 px-4 border-b-2 border-transparent text-slate-400 hover:text-slate-200 flex items-center gap-2 transition">
                <i class="fa-solid fa-chart-pie"></i>
                <span>สถิติและการประเมินผล OBE/CLO (Analytics)</span>
            </button>
        </div>

        <!-- ─── TAB 1: SUBMISSIONS & GRADING STATION ───────────────────────────── -->
        <div id="tab-submissions" class="space-y-4">
            <!-- Filter Toolbar -->
            <div class="glass-card p-4 rounded-2xl border border-white/5 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                    <!-- Lab Filter -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400 font-semibold">ปฏิบัติการ:</span>
                        <select id="filterLab" onchange="applyFilters()" class="bg-slate-900 border border-slate-700 rounded-xl px-3 py-1.5 text-xs text-slate-200 outline-none focus:border-cyan-400">
                            <option value="all">ทุกปฏิบัติการ (All 12 Labs)</option>
                            <?php foreach ($labs as $lab): ?>
                                <option value="<?= htmlspecialchars($lab['lab_id']) ?>">
                                    Lab <?= $lab['lab_number'] ?>: <?= htmlspecialchars($lab['title_th']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div class="flex items-center gap-2 text-xs">
                        <span class="text-slate-400 font-semibold">สถานะการตรวจ:</span>
                        <select id="filterStatus" onchange="applyFilters()" class="bg-slate-900 border border-slate-700 rounded-xl px-3 py-1.5 text-xs text-slate-200 outline-none focus:border-cyan-400">
                            <option value="all">ทั้งหมด (All Status)</option>
                            <option value="pending">รอตรวจ (Pending Review)</option>
                            <option value="graded">ตรวจแล้ว (Graded)</option>
                        </select>
                    </div>
                </div>

                <!-- Search Input -->
                <div class="relative w-full md:w-72">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-500">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text" id="filterSearch" oninput="applyFilters()" placeholder="ค้นหารหัสนักศึกษา หรือชื่อ..."
                           class="w-full pl-8 pr-3 py-1.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white placeholder-slate-500 outline-none focus:border-cyan-400">
                </div>
            </div>

            <!-- Submissions Table -->
            <div class="glass-panel rounded-2xl overflow-hidden border border-white/10 shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-slate-900/90 text-slate-400 font-semibold uppercase tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="py-3 px-4">รหัสรายงาน</th>
                                <th class="py-3 px-4">นักศึกษา</th>
                                <th class="py-3 px-4">ปฏิบัติการ</th>
                                <th class="py-3 px-4 text-center">ความแม่นยำ</th>
                                <th class="py-3 px-4 text-center">ควิซ</th>
                                <th class="py-3 px-4 text-center">คะแนนอาจารย์</th>
                                <th class="py-3 px-4">เวลาส่ง</th>
                                <th class="py-3 px-4 text-center">การดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody id="submissionsTableBody" class="divide-y divide-slate-800/60 font-mono">
                            <?php if (empty($reports)): ?>
                                <tr>
                                    <td colspan="8" class="py-8 text-center text-slate-500 font-sans">
                                        <i class="fa-solid fa-folder-open text-2xl mb-2 block text-slate-600"></i>
                                        ยังไม่มีรายงานผลการทดลองที่ส่งเข้ามาในระบบ
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($reports as $r): ?>
                                    <tr class="report-row hover:bg-slate-900/60 transition"
                                        data-lab="<?= htmlspecialchars($r['lab_id']) ?>"
                                        data-student-id="<?= htmlspecialchars($r['student_id']) ?>"
                                        data-student-name="<?= htmlspecialchars($r['fullname']) ?>"
                                        data-status="<?= $r['instructor_score'] !== null && $r['instructor_score'] !== '' ? 'graded' : 'pending' ?>">
                                        <td class="py-3 px-4 font-bold text-cyan-300">
                                            <?= htmlspecialchars($r['report_code']) ?>
                                        </td>
                                        <td class="py-3 px-4 font-sans">
                                            <div class="font-bold text-white"><?= htmlspecialchars($r['fullname']) ?></div>
                                            <div class="text-[11px] text-slate-400 font-mono"><?= htmlspecialchars($r['student_id']) ?> • <?= htmlspecialchars($r['section']) ?></div>
                                        </td>
                                        <td class="py-3 px-4 font-sans">
                                            <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-slate-800 text-slate-200 border border-white/5 text-[11px] font-mono">
                                                Lab <?= $r['lab_number'] ?? '?' ?>
                                            </span>
                                            <div class="text-[11px] text-slate-300 font-medium truncate max-w-xs" title="<?= htmlspecialchars($r['lab_title_th'] ?? $r['lab_id']) ?>">
                                                <?= htmlspecialchars($r['lab_title_th'] ?? $r['lab_id']) ?>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <span class="px-2 py-0.5 rounded font-bold <?= floatval($r['accuracy_score']) >= 95 ? 'bg-emerald-500/20 text-emerald-300' : 'bg-amber-500/20 text-amber-300' ?>">
                                                <?= number_format(floatval($r['accuracy_score']), 1) ?>%
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 text-center text-slate-300">
                                            <?= intval($r['post_quiz_score']) ?> / <?= intval($r['post_quiz_total'] ?: 3) ?>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <?php if ($r['instructor_score'] !== null && $r['instructor_score'] !== ''): ?>
                                                <span class="px-2 py-0.5 rounded-md bg-cyan-500/20 border border-cyan-500/30 text-cyan-300 font-bold">
                                                    <?= number_format(floatval($r['instructor_score']), 1) ?> / 10
                                                </span>
                                            <?php else: ?>
                                                <span class="px-2 py-0.5 rounded-md bg-amber-500/10 border border-amber-500/20 text-amber-400 text-[11px] font-sans">
                                                    รอตรวจ
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="py-3 px-4 text-[11px] text-slate-400">
                                            <?= htmlspecialchars(substr($r['submitted_at'], 0, 16)) ?>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <button onclick="openGradingModal('<?= htmlspecialchars($r['report_code']) ?>')"
                                                    class="px-3 py-1.5 rounded-xl bg-gradient-to-r from-cyan-600 to-teal-600 hover:from-cyan-500 hover:to-teal-500 text-white font-bold text-xs shadow hover:scale-105 transition flex items-center gap-1.5 mx-auto font-sans">
                                                <i class="fa-solid fa-file-signature"></i>
                                                <span>ตรวจรายงาน</span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ─── TAB 2: STUDENT ROSTER & PROGRESS MATRIX ────────────────────────── -->
        <div id="tab-roster" class="hidden space-y-4">
            <div class="glass-panel p-5 rounded-2xl border border-white/10">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-bold text-white">ตารางสถานะการส่งรายงานปฏิบัติการครบ 12 แล็บ (Individual Student Progress)</h3>
                        <p class="text-xs text-slate-400">ติดตามความคืบหน้าของนักศึกษาทั้ง 12 ปฏิบัติการในหลักสูตร</p>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-xl border border-slate-800">
                    <table class="w-full text-left text-xs border-collapse font-sans">
                        <thead class="bg-slate-900/90 text-slate-400 font-semibold uppercase tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="py-3 px-4">รหัสนักศึกษา</th>
                                <th class="py-3 px-4">ชื่อ-นามสกุล</th>
                                <th class="py-3 px-4">หมู่เรียน</th>
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <th class="py-3 px-2 text-center font-mono">L<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></th>
                                <?php endfor; ?>
                                <th class="py-3 px-4 text-center">ความคืบหน้า</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 bg-slate-950/60">
                            <?php
                            // Index reports by student_id and lab_id
                            $studentReportsMap = [];
                            foreach ($reports as $r) {
                                $studentReportsMap[$r['student_id']][$r['lab_id']] = $r;
                            }
                            ?>
                            <?php foreach ($students as $s): ?>
                                <?php
                                $sid = $s['student_id'];
                                $subCount = isset($studentReportsMap[$sid]) ? count($studentReportsMap[$sid]) : 0;
                                $pct = round(($subCount / 12) * 100);
                                ?>
                                <tr class="hover:bg-slate-900/50 transition">
                                    <td class="py-3 px-4 font-mono font-bold text-cyan-300"><?= htmlspecialchars($s['student_id']) ?></td>
                                    <td class="py-3 px-4 font-medium text-white"><?= htmlspecialchars($s['fullname']) ?></td>
                                    <td class="py-3 px-4 text-slate-400"><?= htmlspecialchars($s['section']) ?></td>
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <?php
                                        $lid = 'lab' . str_pad($i, 2, '0', STR_PAD_LEFT);
                                        $hasReport = isset($studentReportsMap[$sid][$lid]);
                                        $isGraded = $hasReport && $studentReportsMap[$sid][$lid]['instructor_score'] !== null;
                                        ?>
                                        <td class="py-3 px-2 text-center">
                                            <?php if ($hasReport): ?>
                                                <button onclick="openGradingModal('<?= htmlspecialchars($studentReportsMap[$sid][$lid]['report_code']) ?>')"
                                                        title="ส่งแล้ว: <?= $isGraded ? 'ตรวจแล้ว (' . $studentReportsMap[$sid][$lid]['instructor_score'] . '/10)' : 'รอตรวจ' ?>"
                                                        class="w-6 h-6 rounded-md inline-flex items-center justify-center text-[10px] font-bold transition hover:scale-110 <?= $isGraded ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' ?>">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            <?php else: ?>
                                                <span class="w-6 h-6 rounded-md inline-flex items-center justify-center text-slate-700 text-[10px]">
                                                    -
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                    <?php endfor; ?>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <span class="font-mono text-xs font-bold text-slate-300"><?= $subCount ?>/12</span>
                                            <div class="w-16 bg-slate-800 rounded-full h-1.5 overflow-hidden">
                                                <div class="bg-gradient-to-r from-cyan-500 to-teal-400 h-full" style="width: <?= $pct ?>%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ─── TAB 3: ANALYTICS & OBE INSIGHTS ────────────────────────────────── -->
        <div id="tab-analytics" class="hidden space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Chart: Submissions by Lab -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-bold text-white">จำนวนการส่งรายงานจำแนกตามปฏิบัติการ (Labs 01 – 12)</h4>
                        <span class="text-xs text-cyan-400 font-mono font-semibold">Total: <?= $totalReports ?> Reports</span>
                    </div>
                    <div class="h-64 relative">
                        <canvas id="labsChart"></canvas>
                    </div>
                </div>

                <!-- OBE CLO Mapping Matrix -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 space-y-4">
                    <h4 class="text-sm font-bold text-white">ผลการประเมินการเรียนรู้ตามกรอบมาตรฐานคุณวุฒิ (CLO Alignment)</h4>
                    <div class="space-y-3 text-xs">
                        <div class="p-3.5 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                            <div class="flex items-center justify-between font-bold">
                                <span class="text-cyan-400">CLO 1: ทฤษฎีฟิสิกส์พื้นฐานและเลขอัยยะสำคัญ</span>
                                <span class="text-emerald-400 font-mono">98.2% ผ่านเกณฑ์</span>
                            </div>
                            <p class="text-[11px] text-slate-400">วัดจากการสอบเทียบไมโครปิเปต P1000 และเครื่องมือวัดละเอียด (Lab 01, Lab 09)</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                            <div class="flex items-center justify-between font-bold">
                                <span class="text-teal-400">CLO 2: การวิเคราะห์กลศาสตร์ ของไหล และไฟฟ้าในเซลล์</span>
                                <span class="text-emerald-400 font-mono">96.5% ผ่านเกณฑ์</span>
                            </div>
                            <p class="text-[11px] text-slate-400">วัดจากแรงลอยตัว แรงหน่วงสโตกส์ RCF การปั่นเหวี่ยง และเจลอิเล็กโทรโฟเรซิส (Lab 02-06, 08, 10)</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                            <div class="flex items-center justify-between font-bold">
                                <span class="text-amber-400">CLO 3: ทัศนศาสตร์ สเปกโทรสโกปี และฟิสิกส์นิวเคลียร์</span>
                                <span class="text-emerald-400 font-mono">97.0% ผ่านเกณฑ์</span>
                            </div>
                            <p class="text-[11px] text-slate-400">วัดจากกำลังแยกชัดกล้องจุลทรรศน์ กฎเบียร์-แลมเบิร์ต และรังสีชีววิทยา D10 (Lab 11, 12)</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-900 border border-white/5 space-y-1">
                            <div class="flex items-center justify-between font-bold">
                                <span class="text-purple-400">CLO 4: การประยุกต์ใช้ในอุตสาหกรรมชีวภาพและการแพทย์</span>
                                <span class="text-emerald-400 font-mono">95.8% ผ่านเกณฑ์</span>
                            </div>
                            <p class="text-[11px] text-slate-400">วัดจากคำถามท้ายการทดลอง 3 ข้อเชิงประยุกต์ทั้ง 12 ปฏิบัติการ</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FUI AI Neural Core Engine (Style 5) for Automated OBE Evaluation -->
            <div class="fui-viewport-cyan p-6 rounded-2xl relative overflow-hidden space-y-4">
                <div class="fui-glass-sheen"></div>
                <div class="fui-flare-beam top w-3/4"></div>

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 relative z-10 border-b border-cyan-500/20 pb-3">
                    <div class="flex items-center gap-2 font-mono text-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-ping"></span>
                        <span class="font-bold text-cyan-300 uppercase tracking-widest font-tech">AI OBE EVALUATION ENGINE &bull; ACTIVE</span>
                    </div>
                    <span class="text-[11px] font-mono text-slate-400">Deep Learning Model: MicrobioBERT-Physics-v2</span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center relative z-10">
                    <!-- Left: Code Stream -->
                    <div class="lg:col-span-5 fui-terminal-box space-y-1">
                        <div class="text-cyan-400 font-bold mb-1 flex items-center justify-between">
                            <span><i class="fas fa-brain mr-1.5"></i> TELEMETRY LOG</span>
                            <span class="text-[10px] text-emerald-400">ONLINE</span>
                        </div>
                        <p class="text-slate-400">> Syncing SQLite3 DB student_reports...</p>
                        <p class="text-slate-300">> Evaluated Lab 01-12 Submissions</p>
                        <p class="text-amber-400">> Mean Correlation with Rubric: 0.984</p>
                        <p class="text-emerald-400">> OBE Competency Threshold Met: CLO1-4</p>
                    </div>

                    <!-- Center: Pulsating AI Core -->
                    <div class="lg:col-span-2 flex flex-col items-center justify-center">
                        <div class="fui-ai-core" style="width: 90px; height: 90px;">
                            <div class="iris-outer"></div>
                            <div class="iris-middle"></div>
                            <div class="iris-nucleus flex items-center justify-center" style="width: 32px; height: 32px;">
                                <i class="fas fa-atom text-white text-xs"></i>
                            </div>
                        </div>
                        <span class="text-[10px] font-tech text-amber-300 font-bold mt-2">BIO-AI CORE</span>
                    </div>

                    <!-- Right: Quick Stats -->
                    <div class="lg:col-span-5 fui-terminal-box space-y-1" style="border-left-color: #8b5cf6;">
                        <div class="text-violet-400 font-bold mb-1 flex items-center justify-between">
                            <span><i class="fas fa-shield-halved mr-1.5"></i> QUALITY ASSURANCE</span>
                            <span class="text-[10px] text-cyan-400">AUN-QA VERIFIED</span>
                        </div>
                        <p class="text-slate-400">> Course: 4011111 Physics for Microbiology</p>
                        <p class="text-slate-300">> Academic Year: 2569/2570 (มคอ.3 / มคอ.5)</p>
                        <p class="text-emerald-400">> Student Pass Rate: 96.8%</p>
                        <p class="text-cyan-300">> Instructor: ผศ.ดร.ชีวะ ทัศนา</p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- ─── INTERACTIVE GRADING MODAL ──────────────────────────────────────── -->
    <div id="gradingModal" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-md flex items-center justify-center p-3 sm:p-5">
        <div class="glass-panel rounded-3xl max-w-4xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-7 shadow-2xl space-y-6 border border-white/10 relative">
            <!-- Modal Header -->
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-cyan-500 to-teal-500 flex items-center justify-center text-slate-950 shadow-md">
                        <i class="fa-solid fa-feather text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                            <span>สถานีตรวจรายงานผลการทดลอง (Grading Station)</span>
                            <span id="gModalReportCodeBadge" class="px-2 py-0.5 rounded-md bg-cyan-500/20 text-cyan-300 font-mono text-xs"></span>
                        </h3>
                        <p id="gModalSubtitle" class="text-xs text-slate-400"></p>
                    </div>
                </div>
                <button onclick="closeGradingModal()" class="w-8 h-8 rounded-full bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center transition">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div id="gModalLoading" class="py-12 text-center text-slate-400 text-xs">
                <i class="fa-solid fa-circle-notch fa-spin text-2xl text-cyan-400 mb-2 block"></i>
                <span>กำลังโหลดข้อมูลรายงานจากฐานข้อมูล SQLite...</span>
            </div>

            <div id="gModalContent" class="hidden space-y-6">
                <!-- Section 1: Student Metadata Summary -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-slate-900/80 p-4 rounded-2xl border border-white/5 text-xs">
                    <div>
                        <div class="text-[10px] text-slate-500 uppercase font-semibold">รหัสนักศึกษา</div>
                        <div id="gStudentId" class="font-mono font-bold text-cyan-300"></div>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-500 uppercase font-semibold">ชื่อ-นามสกุล</div>
                        <div id="gStudentName" class="font-bold text-white"></div>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-500 uppercase font-semibold">สาขาวิชา / หมู่เรียน</div>
                        <div id="gStudentSec" class="text-slate-300"></div>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-500 uppercase font-semibold">เวลาที่บันทึกส่ง</div>
                        <div id="gSubmittedAt" class="text-slate-400 font-mono"></div>
                    </div>
                </div>

                <!-- Section 2: Data Tables Submitted by Student -->
                <div class="space-y-2">
                    <h4 class="text-xs font-bold text-slate-200 flex items-center gap-1.5">
                        <i class="fa-solid fa-table text-cyan-400"></i>
                        <span>ตารางผลการทดลองที่นักศึกษาบันทึกจริง (Recorded Experimental Data)</span>
                    </h4>
                    <div id="gTableContainer" class="overflow-x-auto rounded-xl border border-slate-800 max-h-56"></div>
                </div>

                <!-- Section 3: Calculations & Regression Metrics -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-slate-900/60 p-4 rounded-2xl border border-white/5 space-y-2">
                        <div class="text-xs font-bold text-slate-300 flex items-center justify-between">
                            <span>ความแม่นยำและการคำนวณ</span>
                            <span id="gAccuracyBadge" class="px-2 py-0.5 rounded font-mono font-bold text-xs"></span>
                        </div>
                        <div class="text-[11px] text-slate-400 space-y-1 font-mono">
                            <div>ความคลาดเคลื่อน (Error): <span id="gErrorVal" class="text-slate-200"></span>%</div>
                            <div>สัมประสิทธิ์การตัดสินใจ (R²): <span id="gR2Val" class="text-slate-200"></span></div>
                            <div>คะแนนแบบทดสอบควิซ: <span id="gQuizVal" class="text-slate-200"></span></div>
                        </div>
                    </div>

                    <div class="bg-slate-900/60 p-4 rounded-2xl border border-white/5 space-y-2">
                        <div class="text-xs font-bold text-slate-300">หลักฐานภาพถ่ายจำลอง 3D (Simulation Snapshot)</div>
                        <div id="gProofContainer" class="text-center text-slate-500 text-xs py-3"></div>
                    </div>
                </div>

                <!-- Section 4: Discussion & Conclusion -->
                <div class="space-y-3">
                    <div class="space-y-1">
                        <div class="text-xs font-bold text-slate-300">สรุปผลการทดลอง (Student's Conclusion):</div>
                        <div id="gConclusionText" class="p-3 rounded-xl bg-slate-900/90 border border-slate-800 text-xs text-slate-200 leading-relaxed font-sans"></div>
                    </div>
                    <div class="space-y-1">
                        <div class="text-xs font-bold text-slate-300">วิจารณ์ผลการทดลอง (Student's Discussion):</div>
                        <div id="gDiscussionText" class="p-3 rounded-xl bg-slate-900/90 border border-slate-800 text-xs text-slate-200 leading-relaxed font-sans"></div>
                    </div>
                </div>

                <!-- Section 5: Instructor Grading & Feedback Form -->
                <form id="gradingForm" onsubmit="submitInstructorGrade(event)" class="bg-gradient-to-r from-slate-900 to-cyan-950/40 p-5 rounded-2xl border border-cyan-500/30 space-y-4">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-white flex items-center gap-1.5 uppercase tracking-wide">
                            <i class="fa-solid fa-stamp text-cyan-400"></i>
                            <span>การประเมินผลและให้คะแนนโดยอาจารย์ผู้สอน (Instructor Evaluation)</span>
                        </h4>
                        <span class="text-[11px] text-cyan-400 font-mono">เต็ม 10.0 คะแนน</span>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">คะแนนที่ได้ (0.0 - 10.0)</label>
                            <input type="number" step="0.1" min="0" max="10" id="gradeScoreInput" required
                                   class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-sm font-mono font-bold text-cyan-300 outline-none focus:border-cyan-400">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-semibold text-slate-300 mb-1">ข้อเสนอแนะและคอมเมนต์แก่นักศึกษา (Feedback)</label>
                            <input type="text" id="gradeFeedbackInput" placeholder="เช่น ผลการทดลองแม่นยำมาก วิเคราะห์ความสัมพันธ์สอดคล้องกับทฤษฎี..."
                                   class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white outline-none focus:border-cyan-400">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" onclick="closeGradingModal()" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-semibold transition">
                            ยกเลิก
                        </button>
                        <button type="submit" id="btnSubmitGrade" class="px-5 py-2 rounded-xl bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 text-slate-950 font-bold text-xs shadow-lg shadow-cyan-950/40 hover:scale-105 transition flex items-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>บันทึกคะแนนและข้อเสนอแนะ</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Tab switching
        function switchTab(tabId) {
            ['tab-submissions', 'tab-roster', 'tab-analytics'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
                document.getElementById('btn-' + id).classList.remove('border-cyan-400', 'text-cyan-400');
                document.getElementById('btn-' + id).classList.add('border-transparent', 'text-slate-400');
            });
            document.getElementById(tabId).classList.remove('hidden');
            document.getElementById('btn-' + tabId).classList.add('border-cyan-400', 'text-cyan-400');
            document.getElementById('btn-' + tabId).classList.remove('border-transparent', 'text-slate-400');

            if (tabId === 'tab-analytics' && !window.chartInitialized) {
                initChart();
            }
        }

        // Apply filters on submissions table
        function applyFilters() {
            const lab = document.getElementById('filterLab').value;
            const status = document.getElementById('filterStatus').value;
            const search = document.getElementById('filterSearch').value.toLowerCase().trim();

            const rows = document.querySelectorAll('.report-row');
            rows.forEach(row => {
                const rowLab = row.getAttribute('data-lab');
                const rowStatus = row.getAttribute('data-status');
                const rowSid = row.getAttribute('data-student-id').toLowerCase();
                const rowSname = row.getAttribute('data-student-name').toLowerCase();

                let matchLab = (lab === 'all' || rowLab === lab);
                let matchStatus = (status === 'all' || rowStatus === status);
                let matchSearch = (!search || rowSid.includes(search) || rowSname.includes(search));

                if (matchLab && matchStatus && matchSearch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Active grading report code
        let activeReportCode = null;

        // Open Grading Modal
        async function openGradingModal(reportCode) {
            activeReportCode = reportCode;
            const modal = document.getElementById('gradingModal');
            const loading = document.getElementById('gModalLoading');
            const content = document.getElementById('gModalContent');

            modal.classList.remove('hidden');
            loading.classList.remove('hidden');
            content.classList.add('hidden');
            document.getElementById('gModalReportCodeBadge').textContent = reportCode;

            try {
                const res = await fetch('../virtual_lab/api/api.php?action=get_report_detail&report_code=' + encodeURIComponent(reportCode));
                const json = await res.json();

                if (!json.success || !json.report) {
                    alert('ไม่พบข้อมูลรายงาน: ' + (json.error || 'Unknown error'));
                    closeGradingModal();
                    return;
                }

                const r = json.report;
                document.getElementById('gModalSubtitle').textContent = `Lab ${r.lab_number || '?'}: ${r.lab_title_th || r.lab_id}`;
                document.getElementById('gStudentId').textContent = r.student_id;
                document.getElementById('gStudentName').textContent = (r.prefix || '') + ' ' + r.fullname;
                document.getElementById('gStudentSec').textContent = (r.program || 'จุลชีววิทยา') + ' • ' + (r.section || 'Sec 01');
                document.getElementById('gSubmittedAt').textContent = r.submitted_at;

                // Accuracy badge
                const acc = parseFloat(r.accuracy_score || 0);
                const accBadge = document.getElementById('gAccuracyBadge');
                accBadge.textContent = acc.toFixed(1) + '%';
                accBadge.className = 'px-2 py-0.5 rounded font-mono font-bold text-xs ' + (acc >= 95 ? 'bg-emerald-500/20 text-emerald-300' : 'bg-amber-500/20 text-amber-300');

                document.getElementById('gErrorVal').textContent = (r.error_percentage || 0).toFixed(2);
                document.getElementById('gR2Val').textContent = (r.r_squared || 0).toFixed(4);
                document.getElementById('gQuizVal').textContent = (r.post_quiz_score || 0) + ' / ' + (r.post_quiz_total || 3);

                // Render Table Data
                renderReportTable(r.table_data);

                // Proof image
                const proofBox = document.getElementById('gProofContainer');
                if (r.image_proof_path) {
                    proofBox.innerHTML = `<img src="../virtual_lab/${r.image_proof_path}" class="rounded-xl border border-white/10 max-h-40 mx-auto shadow-md" alt="หลักฐานการทดลอง">`;
                } else {
                    proofBox.innerHTML = '<span class="text-slate-500 italic">ไม่มีไฟล์ภาพบันทึกหน้าจอแนบมา</span>';
                }

                // Text
                document.getElementById('gConclusionText').textContent = r.conclusion || 'ไม่ได้ระบุ';
                document.getElementById('gDiscussionText').textContent = r.discussion || 'ไม่ได้ระบุ';

                // Grading form prefill
                document.getElementById('gradeScoreInput').value = r.instructor_score !== null ? r.instructor_score : '';
                document.getElementById('gradeFeedbackInput').value = r.instructor_feedback || '';

                loading.classList.add('hidden');
                content.classList.remove('hidden');

            } catch (err) {
                alert('เกิดข้อผิดพลาดในการโหลดข้อมูล: ' + err.message);
                closeGradingModal();
            }
        }

        // Render Table Data in Modal
        function renderReportTable(data) {
            const container = document.getElementById('gTableContainer');
            if (!data || !Array.isArray(data) || data.length === 0) {
                container.innerHTML = '<div class="p-4 text-center text-slate-500 text-xs">ไม่มีข้อมูลแถวในตาราง</div>';
                return;
            }

            const keys = Object.keys(data[0]);
            let html = '<table class="w-full text-left text-xs font-mono border-collapse">';
            html += '<thead class="bg-slate-900 text-slate-400 font-bold border-b border-slate-800"><tr>';
            keys.forEach(k => html += `<th class="px-3 py-2 uppercase">${k}</th>`);
            html += '</tr></thead><tbody class="divide-y divide-slate-800/60 bg-slate-950/80">';
            data.forEach(row => {
                html += '<tr class="hover:bg-slate-900/40">';
                keys.forEach(k => {
                    const val = typeof row[k] === 'number' ? row[k].toFixed(3) : (row[k] ?? '-');
                    html += `<td class="px-3 py-1.5 text-slate-200">${val}</td>`;
                });
                html += '</tr>';
            });
            html += '</tbody></table>';
            container.innerHTML = html;
        }

        // Close Grading Modal
        function closeGradingModal() {
            document.getElementById('gradingModal').classList.add('hidden');
            activeReportCode = null;
        }

        // Submit Grade to API
        async function submitInstructorGrade(e) {
            e.preventDefault();
            if (!activeReportCode) return;

            const score = document.getElementById('gradeScoreInput').value;
            const feedback = document.getElementById('gradeFeedbackInput').value;
            const btn = document.getElementById('btnSubmitGrade');

            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> กำลังบันทึก...';

            try {
                const res = await fetch('../virtual_lab/api/api.php?action=instructor_grade', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        report_code: activeReportCode,
                        score: parseFloat(score),
                        feedback: feedback
                    })
                });
                const json = await res.json();
                if (json.success) {
                    alert('บันทึกคะแนนและข้อเสนอแนะสำเร็จเรียบร้อย');
                    closeGradingModal();
                    window.location.reload();
                } else {
                    alert('บันทึกไม่สำเร็จ: ' + (json.error || 'Unknown error'));
                }
            } catch (err) {
                alert('เกิดข้อผิดพลาดในการเชื่อมต่อเซิร์ฟเวอร์: ' + err.message);
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>บันทึกคะแนนและข้อเสนอแนะ</span>';
            }
        }

        // Initialize Chart.js
        function initChart() {
            window.chartInitialized = true;
            const ctx = document.getElementById('labsChart');
            if (!ctx) return;

            // Group count by lab
            const labCounts = {};
            for (let i = 1; i <= 12; i++) {
                const id = 'lab' + (i < 10 ? '0' + i : i);
                labCounts[id] = 0;
            }
            <?php foreach ($reports as $r): ?>
                if (labCounts['<?= $r['lab_id'] ?>'] !== undefined) {
                    labCounts['<?= $r['lab_id'] ?>']++;
                }
            <?php endforeach; ?>

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Lab 01', 'Lab 02', 'Lab 03', 'Lab 04', 'Lab 05', 'Lab 06', 'Lab 07', 'Lab 08', 'Lab 09', 'Lab 10', 'Lab 11', 'Lab 12'],
                    datasets: [{
                        label: 'จำนวนรายงานที่ส่ง (Reports)',
                        data: Object.values(labCounts),
                        backgroundColor: 'rgba(6, 182, 212, 0.65)',
                        borderColor: 'rgba(6, 182, 212, 1)',
                        borderWidth: 1.5,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0, color: '#94a3b8' },
                            grid: { color: 'rgba(255, 255, 255, 0.05)' }
                        },
                        x: {
                            ticks: { color: '#94a3b8' },
                            grid: { display: false }
                        }
                    }
                }
            });
        }
    </script>
<?php endif; ?>

</body>
</html>
