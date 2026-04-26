<?php
session_start();
include "koneksi.php";
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        header("Location: login.php?error=Username+dan+password+wajib+diisi");
        exit();
    }
    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $data   = $result->fetch_assoc();
    $stmt->close();
    if ($data) {
        if (password_verify($password, $data['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $data['username'];
            $_SESSION['level']    = $data['level'];
            if ($data['level'] === "admin") {
                header("Location: ../admin/admin.php");
            } elseif ($data['level'] === "user") {
                header("Location: ../user/user.php");
            } else {
                header("Location: login.php?error=Level+tidak+dikenali");
            }
            exit();
        } else {
            header("Location: login.php?error=wrong_password");
            exit();
        }
    } else {
        header("Location: login.php?error=user_not_found");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
