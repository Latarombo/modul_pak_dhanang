<?php
$username = htmlspecialchars($_SESSION['username'] ?? 'Admin');
$level    = $_SESSION['level'] ?? 'admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? 'Dashboard') ?> — Ekskul</title>
</head>
<body>

<nav>
  <strong>Sistem Ekstrakurikuler</strong>
  <br>
  <a href="<?= ($level === 'admin') ? '../admin/admin.php' : '../user/dashboard_user.php' ?>">Dashboard</a>

  <?php if ($level === 'admin'): ?>
  | <a href="../admin/admin.php#siswa">Data Siswa</a>
  | <a href="../admin/admin.php#user">Manajemen User</a>
  <?php endif; ?>

  <?php if ($level === 'user'): ?>
  | <a href="../user/user.php">Daftar Ekskul</a>
  <?php endif; ?>

  | Login sebagai: <strong><?= $username ?></strong> (<?= ucfirst($level) ?>)
  | <a href="../login_level/logout.php">Keluar</a>
</nav>

<hr>

<h1><?= htmlspecialchars($page_title ?? 'Dashboard') ?></h1>

<!-- PAGE CONTENT START -->
