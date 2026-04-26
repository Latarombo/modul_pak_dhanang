<?php
include 'koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$ekskul = $_POST['ekskul'];

mysqli_query($conn, "UPDATE tb_siswa 
SET nama='$nama', kelas='$kelas', ekskul='$ekskul'
WHERE nis='$nis'");

header("Location: read.php");
