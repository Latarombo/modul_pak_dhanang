<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak valid! <a href='../admin.php'>Kembali</a>";
    exit;
}

$id   = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tb_user WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$u      = $result->fetch_assoc();
$stmt->close();

if (!$u) {
    echo "User tidak ditemukan! <a href='../admin.php'>Kembali</a>";
    exit;
}

$page_title = "Edit User";
$active     = "user";
include '../../_sidebar_open.php';
?>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<h2>Edit User</h2>
<p>ID tidak dapat diubah.</p>

<form action="proses_edit_user.php" method="POST">
  <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">

  <p>ID: <strong>#<?= htmlspecialchars($u['id']) ?></strong> (tidak dapat diubah)</p>

  <p>
    <label>Username *<br>
    <input type="text" name="username" value="<?= htmlspecialchars($u['username']) ?>" required></label>
  </p>

  <p>
    <label>Password Baru<br>
    <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"></label><br>
    <small>Biarkan kosong untuk mempertahankan password lama</small>
  </p>

  <p>
    <label>Level Akses *<br>
    <select name="level" required>
      <option value="user"  <?= $u['level']=='user'  ? 'selected':'' ?>>User</option>
      <option value="admin" <?= $u['level']=='admin' ? 'selected':'' ?>>Admin</option>
    </select></label>
  </p>

  <p>
    <button type="submit">Update</button>
    <a href="../admin.php">Batal</a>
  </p>

</form>

</body>
</html>
