<?php
// koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_rpl";
$conn = new mysqli($host, $user, $pass, $db);
// cek kondisi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>