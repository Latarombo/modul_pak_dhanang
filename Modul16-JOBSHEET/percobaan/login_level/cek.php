<?php
// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
    header("Location: " . str_repeat("../", substr_count($_SERVER['PHP_SELF'], '/') - 2) . "login_level/login.php");
    exit();
}

// Cek level akses jika ditentukan
if (isset($level_akses)) {
    if ($_SESSION['level'] !== $level_akses) {
        http_response_code(403);
        echo "<!DOCTYPE html><html><head><title>Akses Ditolak</title></head><body>";
        echo "<h2>403 - Akses Ditolak</h2>";
        echo "<p>Anda tidak memiliki hak akses ke halaman ini.</p>";
        echo "<a href='javascript:history.back()'>Kembali</a>";
        echo "</body></html>";
        exit();
    }
}
