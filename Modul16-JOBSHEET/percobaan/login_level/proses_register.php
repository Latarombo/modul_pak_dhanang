<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validasi input tidak kosong
    if (empty($username) || empty($password)) {
        header("Location: register.php?status=failed");
        exit();
    }

    // Validasi panjang password minimal 6 karakter
    if (strlen($password) < 6) {
        header("Location: register.php?status=failed");
        exit();
    }

    // Cek apakah username sudah ada (prepared statement)
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

    // Hash password dengan bcrypt
    $hash  = password_hash($password, PASSWORD_DEFAULT);
    $level = "user"; // Semua registrasi otomatis sebagai user

    // Simpan ke database (prepared statement)
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
