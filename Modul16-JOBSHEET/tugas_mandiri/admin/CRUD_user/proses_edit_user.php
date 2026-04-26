<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

$id       = $_POST['id'];
$username = $_POST['username'];
$level    = $_POST['level'];
$password = $_POST['password'];

$cek = $conn->prepare("SELECT id FROM tb_user WHERE username=? AND id != ?");
$cek->bind_param("si", $username, $id);
$cek->execute();
$result_cek = $cek->get_result();
$cek->close();

if ($result_cek->num_rows > 0) {
    echo "Username sudah digunakan user lain! <a href='edit_user.php?id=" . urlencode($id) . "'>Kembali</a>";
    exit;
}

if (!empty($password)) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE tb_user SET username=?, password=?, level=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $hash, $level, $id);
} else {
    $stmt = $conn->prepare("UPDATE tb_user SET username=?, level=? WHERE id=?");
    $stmt->bind_param("ssi", $username, $level, $id);
}

$stmt->execute();
$stmt->close();

header("Location: ../admin.php");
