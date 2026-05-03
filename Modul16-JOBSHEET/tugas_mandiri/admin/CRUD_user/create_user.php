<?php
$level_akses = "admin";
include "../../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Tambah User — Ekskul</title>
  <?php include '../../_head_common.php'; ?>
</head>
<body>

<?php include '../../_nav_admin.php'; ?>

<div class="container py-4" style="max-width:480px;">

  <div class="mb-4">
    <a href="../admin.php" class="text-decoration-none text-muted small">
      <i class="bi bi-arrow-left me-1"></i>Kembali ke Dashboard
    </a>
    <h1 class="h3 fw-bold mt-1 mb-0">Tambah User Baru</h1>
  </div>

  <div class="card">
    <div class="card-header py-2">
      <h6 class="mb-0 fw-bold"><i class="bi bi-person-plus me-2 text-primary"></i>Data User</h6>
    </div>
    <?php if (isset($_GET["error"])): ?>
    <div class="alert alert-danger"><i class="bi bi-x-circle me-2"></i>Username sudah digunakan!</div>
    <?php endif; ?>
    <div class="card-body">
      <form action="proses_create_user.php" method="POST">
        <div class="mb-3">
          <label class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label fw-semibold">Level Akses <span class="text-danger">*</span></label>
          <select name="level" class="form-select" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-floppy me-2"></i>Simpan
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
