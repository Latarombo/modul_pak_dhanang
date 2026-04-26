<?php
include 'koneksi.php';

$nis = $_GET['nis'];

mysqli_query($conn, "DELETE FROM tb_siswa WHERE nis='$nis'");

header("Location: read.php");
?>