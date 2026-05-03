<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data   = $result->fetch_assoc();
    $stmt->close();

    if ($data) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['username']     = $data['username'];
            $_SESSION['level']        = $data['level'];
            $_SESSION['sudah_daftar'] = false;

            if ($data['level'] == "admin") {
                header("Location: ../admin/admin.php");
            } elseif ($data['level'] == "user") {
                header("Location: ../user/user.php");
            }
            exit();
        } else {
            echo "Password salah! <a href='login.php'>Kembali</a>";
        }
    } else {
        echo "Username tidak ditemukan! <a href='login.php'>Kembali</a>";
    }
}
