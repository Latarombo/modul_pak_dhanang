<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <title>Dashboard Admin — Ekskul</title>
  <?php include '../_head_common.php'; ?>
</head>

<body>

  <?php $base = "./";
  include "../_nav_admin.php"; ?>

  <div class="container py-4">

    <!-- Page header -->
    <div class="d-flex align-items-center mb-4">
      <div>
        <h1 class="h3 fw-bold mb-0">Dashboard Admin</h1>
        <p class="text-muted mb-0">Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></p>
      </div>
    </div>

    <!-- Stats cards -->
    <?php
    $total_siswa = mysqli_num_rows(mysqli_query($conn, "SELECT nis FROM tb_siswa"));
    $total_user  = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM tb_user"));
    ?>
    <div class="row g-3 mb-4">
      <div class="col-sm-6 col-md-3">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="rounded-3 bg-primary bg-opacity-10 p-3">
              <i class="bi bi-people-fill fs-3 text-primary"></i>
            </div>
            <div>
              <div class="fs-2 fw-bold text-primary"><?= $total_siswa ?></div>
              <div class="text-muted small">Total Siswa</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="card h-100">
          <div class="card-body d-flex align-items-center gap-3">
            <div class="rounded-3 bg-success bg-opacity-10 p-3">
              <i class="bi bi-person-badge-fill fs-3 text-success"></i>
            </div>
            <div>
              <div class="fs-2 fw-bold text-success"><?= $total_user ?></div>
              <div class="text-muted small">Total User</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Data Siswa -->
    <div class="card mb-4" id="siswa">
      <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-people me-2 text-primary"></i>Data Siswa</h5>
        <a href="CRUD_pendaftaran/create.php" class="btn btn-primary btn-sm">
          <i class="bi bi-plus-lg me-1"></i>Tambah Siswa
        </a>
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
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
              if (mysqli_num_rows($data) === 0):
              ?>
                <tr>
                  <td colspan="6" class="text-center text-muted py-4">Belum ada data siswa.</td>
                </tr>
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
                    <td><?= htmlspecialchars($d['ekskul']) ?></td>
                    <td class="text-center" style="white-space:nowrap;">
                      <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']) ?>" class="btn btn-outline-info btn-sm" title="Detail">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']) ?>" class="btn btn-outline-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']) ?>"
                        class="btn btn-outline-danger btn-sm" title="Hapus"
                        onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
              <?php endwhile;
              endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Manajemen User -->
    <div class="card" id="user">
      <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h5 class="mb-0 fw-bold"><i class="bi bi-person-gear me-2 text-primary"></i>Manajemen User</h5>
        <a href="CRUD_user/create_user.php" class="btn btn-primary btn-sm">
          <i class="bi bi-plus-lg me-1"></i>Tambah User
        </a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover table-bordered mb-0 align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Level</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $users = mysqli_query($conn, "SELECT * FROM tb_user");
              if (mysqli_num_rows($users) === 0):
              ?>
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">Belum ada data user.</td>
                </tr>
                <?php else: while ($u = mysqli_fetch_array($users)): ?>
                  <tr>
                    <td class="text-muted">#<?= htmlspecialchars($u['id']) ?></td>
                    <td class="fw-semibold"><?= htmlspecialchars($u['username']) ?></td>
                    <td>
                      <?php if ($u['level'] == 'admin'): ?>
                        <span class="badge bg-danger">Admin</span>
                      <?php else: ?>
                        <span class="badge bg-secondary">User</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center" style="white-space:nowrap;">
                      <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']) ?>" class="btn btn-outline-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']) ?>"
                        class="btn btn-outline-danger btn-sm" title="Hapus"
                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                        <i class="bi bi-trash"></i>
                      </a>
                    </td>
                  </tr>
              <?php endwhile;
              endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <?php include '../_scripts.php'; ?>
</body>

</html>