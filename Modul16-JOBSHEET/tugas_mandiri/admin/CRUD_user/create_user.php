<?php
$level_akses = "admin";
include "../../login_level/cek.php";

$page_title = "Tambah User";
$active     = "user";
include '../../_sidebar_open.php';
?>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<h2>Tambah User Baru</h2>

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
