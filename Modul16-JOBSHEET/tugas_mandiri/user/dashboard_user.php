<?php
$level_akses = "user";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

if ($_SESSION['sudah_daftar'] !== true) {
    header("Location: user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Dashboard — Ekskul</title>
  <?php include '../_head_common.php'; ?>
</head>
<body>

<!-- Navbar user -->
<nav class="navbar navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-award-fill me-2"></i>Ekskul
    </a>
    <div class="d-flex align-items-center gap-2">
      <span class="text-white-50 small"><i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']) ?></span>
      <span class="badge bg-light text-primary">User</span>
      <a href="../login_level/logout.php" class="btn btn-outline-light btn-sm ms-2">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>
  </div>
</nav>

<div class="container py-4">

  <!-- Success alert -->
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    <i class="bi bi-check-circle-fill me-2"></i>
    <strong>Pendaftaran berhasil!</strong> Data kamu sudah tersimpan.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>

  <div class="mb-4">
    <h1 class="h3 fw-bold mb-0">Dashboard</h1>
    <p class="text-muted">Halo, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>! Berikut data siswa yang terdaftar.</p>
  </div>

  <!-- Data Table -->
  <div class="card">
    <div class="card-header py-3">
      <h5 class="mb-0 fw-bold"><i class="bi bi-people me-2 text-primary"></i>Data Siswa Terdaftar</h5>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover table-bordered mb-0 align-middle">
          <thead>
            <tr>
              <th>NIS</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jenis Kelamin</th>
              <th>Ekstrakurikuler</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
            if (mysqli_num_rows($data) === 0):
            ?>
            <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data siswa.</td></tr>
            <?php else: while ($d = mysqli_fetch_array($data)): ?>
            <tr>
              <td class="fw-semibold"><?= htmlspecialchars($d['nis']) ?></td>
              <td><?= htmlspecialchars($d['nama']) ?></td>
              <td><span class="badge bg-secondary"><?= htmlspecialchars($d['kelas']) ?></span></td>
              <td>
                <?php if ($d['jk'] == 'L'): ?>
                  <span class="badge bg-primary"><i class="bi bi-gender-male me-1"></i>Laki-Laki</span>
                <?php else: ?>
                  <span class="badge bg-danger"><i class="bi bi-gender-female me-1"></i>Perempuan</span>
                <?php endif; ?>
              </td>
              <td>
                <?php foreach (explode(',', $d['ekskul']) as $e): ?>
                  <span class="badge bg-primary me-1"><?= htmlspecialchars(trim($e)) ?></span>
                <?php endforeach; ?>
              </td>
            </tr>
            <?php endwhile; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<?php include '../_scripts.php'; ?>
</body>
</html>
