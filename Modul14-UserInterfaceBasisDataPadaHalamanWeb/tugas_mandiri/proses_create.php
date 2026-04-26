<?php
include 'koneksi.php';

// Ambil data
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];

// Gabung tanggal
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$ttl = $thn . "-" . $bln . "-" . $tgl;

// Hobi
$hobi = isset($_POST['hobi']) ? implode(",", $_POST['hobi']) : "";

// Ekskul multiple
$ekskul = implode(",", $_POST['ekskul']);

// Query
$query = "INSERT INTO tb_siswa 
VALUES ('$nis','$nama','$kelas','$ttl','$alamat','$kota','$jk','$hobi','$ekskul')";

mysqli_query($conn, $query);

// Redirect
header("Location: read.php");
?>