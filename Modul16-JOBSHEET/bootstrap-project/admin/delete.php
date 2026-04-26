<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: admin.php");
    exit();
}
$nis = trim($_GET['nis']);
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
