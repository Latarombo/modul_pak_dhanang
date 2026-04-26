<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        header("Location: register.php?status=failed");
        exit();
    }
    if (strlen($password) < 6) {
        header("Location: register.php?status=failed");
        exit();
    }
    $cek = $conn->prepare("SELECT id FROM tb_user WHERE username = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result();
    if ($cek->num_rows > 0) {
        $cek->close();
        header("Location: register.php?status=exists");
        exit();
    }
    $cek->close();
    $hash  = password_hash($password, PASSWORD_DEFAULT);
    $level = "user";
    $stmt = $conn->prepare("INSERT INTO tb_user (username, password, level) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hash, $level);
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: register.php?status=success");
    } else {
        $stmt->close();
        header("Location: register.php?status=failed");
    }
    exit();
} else {
    header("Location: register.php");
    exit();
}
