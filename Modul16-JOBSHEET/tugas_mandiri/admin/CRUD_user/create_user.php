<?php
$level_akses = "admin";
include "../../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah User</title>
</head>
<body>

<h2>Tambah User Baru</h2>

<form action="proses_create_user.php" method="POST">

  <table border="0" cellpadding="5">

    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type="text" name="username" required></td>
    </tr>

    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" required></td>
    </tr>

    <tr>
      <td>Level</td>
      <td>:</td>
      <td>
        <select name="level" required>
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan="3">
        <button type="submit">Simpan</button>
        <a href="../admin.php">Batal</a>
      </td>
    </tr>

  </table>

</form>

</body>
</html>
