<?php
$level_akses = "admin";
include "../../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah User — Ekskul</title>
</head>
<body>

<nav>
  Sistem Ekstrakurikuler |
  <a href="../admin.php">Dashboard</a> |
  <a href="../admin.php#siswa">Data Siswa</a> |
  <a href="../admin.php#user">Manajemen User</a> |
  Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (Admin) |
  <a href="../../login_level/logout.php">Logout</a>
</nav>
<hr>

<h1>Tambah User Baru</h1>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<form action="proses_create_user.php" method="POST">

  <p>
    <label>Username *<br>
    <input type="text" name="username" required></label>
  </p>

  <p>
    <label>Password *<br>
    <input type="password" name="password" required></label>
  </p>

  <p>
    <label>Level Akses *<br>
    <select name="level" required>
      <option value="user">User</option>
      <option value="admin">Admin</option>
    </select></label>
  </p>

  <p>
    <button type="submit">Simpan</button>
    <a href="../admin.php">Batal</a>
  </p>

</form>

</body>
</html>
