<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include "../../login_level/koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: ../admin.php");
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
    header("Location: ../admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Edit User — Ekskul</title>
  <?php include '../../_head_common.php'; ?>
</head>
<body>

<?php include '../../_nav_admin.php'; ?>

<div class="container py-4" style="max-width:480px;">

  <div class="mb-4">
    <a href="../admin.php" class="text-decoration-none text-muted small">
      <i class="bi bi-arrow-left me-1"></i>Kembali ke Dashboard
    </a>
    <h1 class="h3 fw-bold mt-1 mb-0">Edit User</h1>
  </div>

  <div class="card">
    <div class="card-header py-2">
      <h6 class="mb-0 fw-bold"><i class="bi bi-person-gear me-2 text-primary"></i>Data User</h6>
    </div>
    <div class="card-body">
      <form action="proses_edit_user.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($u['id']) ?>">

        <div class="mb-3">
          <label class="form-label fw-semibold">ID</label>
          <input type="text" class="form-control bg-light" value="#<?= htmlspecialchars($u['id']) ?>" disabled>
          <div class="form-text"><i class="bi bi-lock me-1"></i>ID tidak dapat diubah</div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($u['username']) ?>" required>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Password Baru</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
          </div>
          <div class="form-text">Biarkan kosong untuk mempertahankan password lama</div>
        </div>
        <div class="mb-4">
          <label class="form-label fw-semibold">Level Akses <span class="text-danger">*</span></label>
          <select name="level" class="form-select" required>
            <option value="user"  <?= $u['level']=='user'  ? 'selected':'' ?>>User</option>
            <option value="admin" <?= $u['level']=='admin' ? 'selected':'' ?>>Admin</option>
          </select>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-warning px-4">
            <i class="bi bi-floppy me-2"></i>Update
          </button>
          <a href="../admin.php" class="btn btn-outline-secondary px-4">Batal</a>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include '../../_scripts.php'; ?>
</body>
</html>
