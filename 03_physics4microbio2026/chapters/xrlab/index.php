<?php
// Automatic Transparent Redirect to 3D Virtual Lab Hub
header("HTTP/1.1 301 Moved Permanently");
header("Location: ../../../virtual_lab/index.html");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url=../../../virtual_lab/index.html">
    <title>กำลงเปิดห้องปฏิบัติการเสมือนจริง 3 มิติ...</title>
    <script>
        window.location.replace("../../../virtual_lab/index.html");
    </script>
</head>
<body style="background:#0b1120;color:#94a3b8;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;">
    <div style="text-align:center;">
        <h2 style="color:#38bdf8;">🔬 กำลังเข้าสู่ 3D Virtual Physics for Microbiology Lab...</h2>
        <p>หากเบราว์เซอร์ไม่เปลี่ยนหน้าอัตโนมัติ <a href="../../../virtual_lab/index.html" style="color:#34d399;font-weight:bold;">คลิกที่นี่เพื่อเข้าสู่ห้องแล็บ</a></p>
    </div>
</body>
</html>
