<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: ../admin.php");
    exit;
}

$id  = $_GET['id'];
$cek = $conn->prepare("SELECT username FROM tb_user WHERE id=?");
$cek->bind_param("i", $id);
$cek->execute();
$result = $cek->get_result();
$user   = $result->fetch_assoc();
$cek->close();

if ($user && $user['username'] === $_SESSION['username']) {
    // Tidak bisa hapus diri sendiri — redirect dengan pesan
    header("Location: ../admin.php?error=selfdelete");
    exit;
}

$stmt = $conn->prepare("DELETE FROM tb_user WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: ../admin.php");
exit();
