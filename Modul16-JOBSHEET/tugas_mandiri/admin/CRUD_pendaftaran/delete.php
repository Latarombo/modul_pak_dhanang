<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    header("Location: ../admin.php");
    exit;
}

$nis  = $_GET['nis'];
$stmt = $conn->prepare("DELETE FROM tb_siswa WHERE nis=?");
$stmt->bind_param("s", $nis);
$stmt->execute();
$stmt->close();

header("Location: ../admin.php");
exit();
