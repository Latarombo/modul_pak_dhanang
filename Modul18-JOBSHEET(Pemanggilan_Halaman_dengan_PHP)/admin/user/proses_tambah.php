<?php
$level_akses = "admin";
include "../../login/cek.php";

$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$username = $_POST['username'];
$password = $_POST['password'];
$level    = $_POST['level'];

$cek = $conn_l->prepare("SELECT id FROM tb_user WHERE username = ?");
$cek->bind_param("s", $username);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
  echo "Username sudah digunakan!";
} else {
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn_l->prepare("INSERT INTO tb_user (username, password, level) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $hash, $level);
  if ($stmt->execute()) {
    header("Location: ../index.php?page=user");
  } else {
    echo "Gagal menambahkan user!";
  }
}
