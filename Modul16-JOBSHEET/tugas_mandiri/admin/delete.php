<?php
$level_akses = "admin";
include '../login_level/koneksi.php';
include "../login_level/cek.php";

$nis = $_GET['nis'];

mysqli_query($conn, "DELETE FROM tb_siswa WHERE nis='$nis'");

header("Location: admin.php");
?>