<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: " . str_repeat("../", substr_count($_SERVER['PHP_SELF'], '/') - 2) . "login_level/login.php");
    exit();
}
if (isset($level_akses)) {
    if ($_SESSION['level'] !== $level_akses) {
        http_response_code(403);
        echo "<!DOCTYPE html><html><head><title>Akses Ditolak</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'></head><body class='d-flex justify-content-center align-items-center vh-100 bg-light'>";
        echo "<div class='text-center'><h1 class='display-1 text-danger'>403</h1><h4 class='text-muted'>Akses Ditolak</h4><p class='text-secondary'>Anda tidak memiliki hak akses ke halaman ini.</p><a href='javascript:history.back()' class='btn btn-secondary'>Kembali</a></div>";
        echo "</body></html>";
        exit();
    }
}
