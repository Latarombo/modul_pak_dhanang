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

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-wrap form-wrap-sm">
  <div class="form-head">
    <h2>Edit User</h2>
    <p>Perbarui data akun — ID tidak dapat diubah</p>
  </div>
  <div class="form-body">
    <form action="proses_edit_user.php" method="POST">
      <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">

      <div class="field-block">
        <label class="f-label">ID</label>
        <div class="f-static">#<?= htmlspecialchars($u['id']) ?> &mdash; tidak dapat diubah</div>
      </div>

      <div class="field-block">
        <label class="f-label">Username <span class="f-req">*</span></label>
        <input type="text" name="username" class="f-control" value="<?= htmlspecialchars($u['username']) ?>" required>
      </div>

      <div class="field-block">
        <label class="f-label">Password Baru</label>
        <input type="password" name="password" class="f-control" placeholder="Kosongkan jika tidak ingin mengubah">
        <p class="f-hint">Biarkan kosong untuk mempertahankan password lama</p>
      </div>

      <div class="field-block">
        <label class="f-label">Level Akses <span class="f-req">*</span></label>
        <select name="level" class="f-select" required>
          <option value="user"  <?= $u['level']=='user'  ? 'selected':'' ?>>User</option>
          <option value="admin" <?= $u['level']=='admin' ? 'selected':'' ?>>Admin</option>
        </select>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn-submit">Update</button>
        <a href="../admin.php" class="btn-cancel">Batal</a>
      </div>

    </form>
  </div>
</div>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
