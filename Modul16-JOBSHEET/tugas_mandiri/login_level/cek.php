<?php
// cek.php — always call session_start() here
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($level_akses)) {
    if ($_SESSION['level'] !== $level_akses) {
        echo "Akses ditolak!";
        exit();
    }
}
