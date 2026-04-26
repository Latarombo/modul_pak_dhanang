<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak valid! <a href='../admin.php'>Kembali</a>";
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM tb_user WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$u = $result->fetch_assoc();
$stmt->close();

if (!$u) {
    echo "User tidak ditemukan! <a href='../admin.php'>Kembali</a>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="proses_edit_user.php" method="POST">
  <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']); ?>">

  <table border="0" cellpadding="5">

    <tr>
      <td>ID</td>
      <td>:</td>
      <td><?= htmlspecialchars($u['id']); ?> <i>(tidak dapat diubah)</i></td>
    </tr>

    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type="text" name="username" value="<?= htmlspecialchars($u['username']); ?>" required></td>
    </tr>

    <tr>
      <td>Password Baru</td>
      <td>:</td>
      <td>
        <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
      </td>
    </tr>

    <tr>
      <td>Level</td>
      <td>:</td>
      <td>
        <select name="level" required>
          <option value="user"  <?= $u['level'] == 'user'  ? 'selected' : '' ?>>User</option>
          <option value="admin" <?= $u['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan="3">
        <button type="submit">Update</button>
        <a href="../admin.php">Batal</a>
      </td>
    </tr>

  </table>

</form>

</body>
</html>
