<?php
$level_akses = "admin";
include "../login_level/cek.php";  // session & level dicek dulu
include "../login_level/koneksi.php";

// Validasi parameter NIS
if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: admin.php");
    exit();
}

$nis = trim($_GET['nis']);

// Hapus data dengan prepared statement (aman dari SQL Injection)
$stmt = $conn->prepare("DELETE FROM tb_siswa WHERE nis = ?");
$stmt->bind_param("s", $nis);

if ($stmt->execute()) {
    $stmt->close();
    header("Location: admin.php?success=deleted");
} else {
    $stmt->close();
    header("Location: admin.php?error=delete_failed");
}
exit();
