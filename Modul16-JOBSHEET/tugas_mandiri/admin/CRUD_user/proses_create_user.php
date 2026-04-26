<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$level    = $_POST['level'];

$cek = $conn->prepare("SELECT id FROM tb_user WHERE username=?");
$cek->bind_param("s", $username);
$cek->execute();
$result_cek = $cek->get_result();
$cek->close();

if ($result_cek->num_rows > 0) {
    echo "Username sudah digunakan! <a href='create_user.php'>Kembali</a>";
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO tb_user (username, password, level) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $hash, $level);
$stmt->execute();
$stmt->close();

header("Location: ../admin.php");
