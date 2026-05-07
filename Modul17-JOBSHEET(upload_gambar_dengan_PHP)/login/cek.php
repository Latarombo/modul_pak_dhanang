<?php
session_start();
// cek apakah sudah login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

// cek level (opsional, terganting halaman)
if (isset($level_akses)) {
  if ($_SESSION['level'] != $level_akses) {
    echo "Akses ditolak!";
    exit();
  }
}
