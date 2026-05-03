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

  <?php if ($level === 'admin'): ?>
    <a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'admin.php' : '../admin/admin.php' ?>">Dashboard</a>
    | <a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'admin.php#siswa' : '../admin/admin.php#siswa' ?>">Data Siswa</a>
    | <a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? 'admin.php#user' : '../admin/admin.php#user' ?>">Manajemen User</a>
    | <a href="<?= strpos($_SERVER['PHP_SELF'], '/admin/') !== false ? '../login_level/logout.php' : '../login_level/logout.php' ?>">Logout</a>
  <?php endif; ?>

  <?php if ($level === 'user'): ?>
    <?php if ($_SESSION['sudah_daftar'] === true): ?>
      Dashboard
      | <a href="../login_level/logout.php">Logout</a>
    <?php else: ?>
      Pendaftaran
      | <a href="../login_level/logout.php">Logout</a>
    <?php endif; ?>
  <?php endif; ?>

  &nbsp;|&nbsp; Login sebagai: <strong><?= $username ?></strong> (<?= ucfirst($level) ?>)
</nav>

<hr>

<h1><?= htmlspecialchars($page_title ?? 'Dashboard') ?></h1>

<!-- PAGE CONTENT START -->
