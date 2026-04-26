<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$kelas  = $_POST['kelas'];
$alamat = $_POST['alamat'];
$kota   = $_POST['kota'];
$jk     = $_POST['jk'];

// Gabung tanggal
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$ttl = $thn . "-" . $bln . "-" . $tgl;

// Hobi
$hobi = isset($_POST['hobi']) ? implode(",", $_POST['hobi']) : "";

// Ekskul multiple
$ekskul = isset($_POST['ekskul']) ? implode(",", $_POST['ekskul']) : "";

$stmt = $conn->prepare("UPDATE tb_siswa SET nama=?, kelas=?, ttl=?, alamat=?, kota=?, jk=?, hobi=?, ekskul=? WHERE nis=?");
$stmt->bind_param("sssssssss", $nama, $kelas, $ttl, $alamat, $kota, $jk, $hobi, $ekskul, $nis);
$stmt->execute();
$stmt->close();

header("Location: admin.php");
