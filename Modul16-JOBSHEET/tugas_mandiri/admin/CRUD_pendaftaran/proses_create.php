<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../../login_level/koneksi.php';
include "../../login_level/cek.php";

$nis    = $_POST['nis'];
$nama   = $_POST['nama'];
$kelas  = $_POST['kelas'];
$alamat = $_POST['alamat'];
$kota   = $_POST['kota'];
$jk     = $_POST['jk'];

$tgl = str_pad($_POST['tgl'], 2, '0', STR_PAD_LEFT);
$bln = str_pad($_POST['bln'], 2, '0', STR_PAD_LEFT);
$thn = $_POST['thn'];
$ttl = $thn . "-" . $bln . "-" . $tgl;

$hobi   = isset($_POST['hobi'])   ? implode(",", $_POST['hobi'])   : "";
$ekskul = isset($_POST['ekskul']) ? implode(",", $_POST['ekskul']) : "";

$stmt = $conn->prepare("INSERT INTO tb_siswa VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $nis, $nama, $kelas, $ttl, $alamat, $kota, $jk, $hobi, $ekskul);
$stmt->execute();
$stmt->close();

if ($_SESSION['level'] == "admin") {
    header("Location: ../admin.php");
} else {
    header("Location: ../../user/dashboard_user.php");
}
exit();
