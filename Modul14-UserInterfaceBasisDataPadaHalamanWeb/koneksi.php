<?php
$host = "localhost";
$username = "root";
$password = ""; // Defaultnya kosong
$database = "db_biodata";
// Membuka koneksi php ke MySQL
$koneksi = mysqli_connect($host, $username, $password, $database);
// Cek Koneksi
if (!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
// Jika Koneksi berhasil bisa di coment bagian ini
// echo "Koneksi berhasil!";
?>