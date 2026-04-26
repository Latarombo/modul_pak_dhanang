<?php
// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_rpl";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset agar karakter Indonesia (huruf khusus) tidak rusak
$conn->set_charset("utf8");
