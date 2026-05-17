<?php
$level_akses = "admin";
include "../../login/cek.php";

$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$id       = $_POST['id'];
$username = $_POST['username'];
$level    = $_POST['level'];

if (!empty($_POST['password'])) {
  $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $conn_l->prepare("UPDATE tb_user SET username=?, password=?, level=? WHERE id=?");
  $stmt->bind_param("sssi", $username, $hash, $level, $id);
} else {
  $stmt = $conn_l->prepare("UPDATE tb_user SET username=?, level=? WHERE id=?");
  $stmt->bind_param("ssi", $username, $level, $id);
}

$hasil = $stmt->execute();

if ($hasil) {
  header("Location: ../index.php?page=user");
} else {
  echo "Gagal update user!";
  echo $conn_l->error;
}
