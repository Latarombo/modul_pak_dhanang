<?php
$level_akses = "admin";
include "../../login/cek.php";
?>

<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<div class="main">
  <div class="content">

    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php?page=user" class="text-decoration-none">Manajemen User</a></li>
        <li class="breadcrumb-item active">Tambah User</li>
      </ol>
    </nav>

    <h4 class="fw-bold mb-4">Tambah User</h4>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
      <div class="card-header bg-dark text-white py-3 border-0">
        <div class="d-flex align-items-center gap-2">
          <i class="bi bi-person-plus fs-5"></i>
          <div>
            <div class="fw-semibold">Form Tambah User</div>
            <div class="text-white-50 small">Isi semua kolom untuk menambah user baru</div>
          </div>
        </div>
      </div>
      <div class="card-body p-4">
        <form action="proses_tambah.php" method="POST">

          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">Username</label>
            <input type="text" class="form-control" name="username"
              placeholder="Masukkan username" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">Password</label>
            <input type="password" class="form-control" name="password"
              placeholder="Masukkan password" required>
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold small text-uppercase text-muted">Level</label>
            <select class="form-select" name="level" required>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-dark fw-semibold">
              <i class="bi bi-check-circle me-1"></i>Simpan
            </button>
            <a href="../index.php?page=user" class="btn btn-outline-secondary">
              <i class="bi bi-x-circle me-1"></i>Batal
            </a>
          </div>

        </form>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>
