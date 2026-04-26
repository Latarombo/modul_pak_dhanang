<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level    = "user";

    $cek = $conn->prepare("SELECT * FROM tb_user WHERE username=?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $result = $cek->get_result();
    $cek->close();

    if ($result->num_rows > 0) {
        echo "Username sudah digunakan! <a href='register.php'>Kembali</a>";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO tb_user (username, password, level) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hash, $level);
        if ($stmt->execute()) {
            header("Location: login.php?registered=1");
            exit();
        } else {
            echo "Register gagal! <a href='register.php'>Kembali</a>";
        }
        $stmt->close();
    }
}
