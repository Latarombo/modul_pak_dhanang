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
$u = $result->fetch_assoc();
$stmt->close();

if (!$u) {
    echo "User tidak ditemukan! <a href='../admin.php'>Kembali</a>";
    exit;
}

$page_title = "Edit User";
$active     = "user";
include '../../_sidebar_open.php';
?>

<style>
.form-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  max-width: 480px;
}
.form-card-header {
  padding: 1.6rem 2rem 1.2rem;
  border-bottom: 1px solid #f0ece4;
}
.form-card-header h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.25rem;
  color: var(--forest);
  margin: 0 0 .2rem;
}
.form-card-header p { font-size: .82rem; color: #aaa; margin: 0; }
.form-card-body { padding: 2rem; }
.field-group { margin-bottom: 1.4rem; }
.field-label {
  display: block;
  font-size: .72rem;
  font-weight: 500;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: #666;
  margin-bottom: .45rem;
}
.field-hint { font-size: .72rem; color: #bbb; margin-top: .3rem; }
.field-static {
  font-size: .9rem;
  color: #888;
  font-family: monospace;
  padding: .65rem 1rem;
  background: #f7f4ef;
  border-radius: 6px;
  border: 1.5px solid #eee;
}
.form-control, .form-select {
  border: 1.5px solid #ddd;
  border-radius: 6px;
  padding: .65rem 1rem;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  background: #fff;
  transition: border-color .2s;
  width: 100%;
}
.form-control:focus, .form-select:focus {
  border-color: var(--forest);
  box-shadow: 0 0 0 3px rgba(46,76,24,.1);
  outline: none;
}
.btn-row { display: flex; gap: .75rem; margin-top: .5rem; }
.btn-submit {
  padding: .7rem 1.8rem;
  background: var(--forest);
  color: #fff;
  border: none;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  font-weight: 500;
  cursor: pointer;
  transition: background .2s;
}
.btn-submit:hover { background: #3d6420; }
.btn-cancel {
  padding: .7rem 1.2rem;
  background: transparent;
  color: #888;
  border: 1.5px solid #ddd;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  text-decoration: none;
}
.btn-cancel:hover { border-color: #bbb; color: #555; }
.btn-back {
  display: inline-block;
  margin-bottom: 1.2rem;
  font-size: .82rem;
  color: #888;
  text-decoration: none;
}
.btn-back:hover { color: var(--forest); }
</style>

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-card">
  <div class="form-card-header">
    <h2>Edit User</h2>
    <p>Perbarui data akun — ID tidak dapat diubah</p>
  </div>
  <div class="form-card-body">
    <form action="proses_edit_user.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']); ?>">

      <div class="field-group">
        <label class="field-label">ID</label>
        <div class="field-static">#<?= htmlspecialchars($u['id']); ?> &mdash; tidak dapat diubah</div>
      </div>

      <div class="field-group">
        <label class="field-label">Username</label>
        <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($u['username']); ?>" required>
      </div>

      <div class="field-group">
        <label class="field-label">Password Baru</label>
        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
        <p class="field-hint">Biarkan kosong untuk mempertahankan password lama</p>
      </div>

      <div class="field-group">
        <label class="field-label">Level Akses</label>
        <select name="level" class="form-select" required>
          <option value="user"  <?= $u['level']=='user'  ? 'selected':'' ?>>User</option>
          <option value="admin" <?= $u['level']=='admin' ? 'selected':'' ?>>Admin</option>
        </select>
      </div>

      <div class="btn-row">
        <button type="submit" class="btn-submit">Update &rarr;</button>
        <a href="../admin.php" class="btn-cancel">Batal</a>
      </div>

    </form>
  </div>
</div>

  </div>
</div>
</body>
</html>
