<?php
$level_akses = "admin";
include "../../login/cek.php";

$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$stmt = $conn_l->prepare("SELECT * FROM tb_user WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$data   = $result->fetch_assoc();
?>

<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<div class="main">
  <div class="content">

    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php?page=user" class="text-decoration-none">Manajemen User</a></li>
        <li class="breadcrumb-item active">Edit User #<?= $data['id']; ?></li>
      </ol>
    </nav>

    <h4 class="fw-bold mb-4">Edit User</h4>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
      <div class="card-header bg-warning bg-opacity-10 border-0 py-3">
        <div class="d-flex align-items-center gap-2">
          <div class="bg-warning bg-opacity-25 rounded p-2">
            <i class="bi bi-pencil-square text-warning fs-5"></i>
          </div>
          <div>
            <div class="fw-semibold">Form Edit User</div>
            <div class="text-muted small">Perbarui informasi user di bawah ini</div>
          </div>
        </div>
      </div>
      <div class="card-body p-4">
        <form method="POST" action="proses_edit.php">

          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">ID User</label>
            <input type="text" class="form-control bg-light" name="id" value="<?= $data['id']; ?>" readonly>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">Username</label>
            <input type="text" class="form-control" name="username"
              value="<?= htmlspecialchars($data['username']); ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">Password Baru</label>
            <input type="password" class="form-control" name="password"
              placeholder="Kosongkan jika tidak ingin mengubah password">
            <div class="form-text">Biarkan kosong untuk mempertahankan password lama.</div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-semibold small text-uppercase text-muted">Level</label>
            <select class="form-select" name="level" required>
              <option value="user"  <?= $data['level'] == 'user'  ? 'selected' : ''; ?>>User</option>
              <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
          </div>

          <div class="d-flex gap-2 flex-wrap">
            <button type="submit" name="submit" class="btn btn-warning fw-semibold">
              <i class="bi bi-check-circle me-1"></i>Update User
            </button>
            <button type="reset" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <a href="../index.php?page=user" class="btn btn-link text-muted text-decoration-none">Batal</a>
          </div>

        </form>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>
