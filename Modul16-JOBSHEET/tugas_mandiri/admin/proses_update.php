<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$kelas  = $_POST['kelas'];
$ekskul = $_POST['ekskul'];

$stmt = $conn->prepare("UPDATE tb_siswa SET nama=?, kelas=?, ekskul=? WHERE nis=?");
$stmt->bind_param("ssss", $nama, $kelas, $ekskul, $nis);
$stmt->execute();
$stmt->close();

header("Location: admin.php");
