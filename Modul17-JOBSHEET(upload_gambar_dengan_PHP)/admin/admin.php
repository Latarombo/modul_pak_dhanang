<?php
$level_akses = "admin";
include "../login/cek.php";
include 'koneksi.php';
$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Data Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 fixed-top">
    <a class="navbar-brand fw-bold" href="admin.php">Portal<span class="text-danger">.</span>ID</a>
    <div class="ms-auto d-flex align-items-center gap-2">
      <span class="text-white-50 small"><i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']); ?></span>
      <span class="badge bg-danger">Admin</span>
      <a href="../login/logout.php" class="btn btn-sm btn-outline-light ms-2">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>
  </nav>

  <div class="container-fluid" style="padding-top: 70px;">
    <div class="row">

      <!-- SIDEBAR -->
      <nav class="col-md-2 d-none d-md-block bg-white border-end vh-100 position-fixed pt-3" style="top: 56px;">
        <div class="px-2">
          <p class="text-muted small text-uppercase fw-bold px-2 mb-1">Menu</p>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="admin.php" class="nav-link active text-danger fw-semibold">
                <i class="bi bi-newspaper me-2"></i>Manajemen Berita
              </a>
            </li>
            <li class="nav-item">
              <a href="form_upload.php" class="nav-link text-dark">
                <i class="bi bi-plus-circle me-2"></i>Tambah Berita
              </a>
            </li>
          </ul>
          <hr>
          <p class="text-muted small text-uppercase fw-bold px-2 mb-1">Akun</p>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a href="../login/logout.php" class="nav-link text-danger">
                <i class="bi bi-box-arrow-left me-2"></i>Logout
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- MAIN CONTENT -->
      <main class="col-md-10 ms-sm-auto px-4 py-4" style="margin-left: 16.666%;">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <div>
            <h4 class="fw-bold mb-0">Manajemen Berita</h4>
            <p class="text-muted small mb-0">Kelola seluruh konten berita</p>
          </div>
          <a href="form_upload.php" class="btn btn-danger">
            <i class="bi bi-plus-lg me-1"></i>Tambah Berita
          </a>
        </div>

        <!-- Stats -->
        <?php
        $total_result = $conn->query("SELECT COUNT(*) as total FROM news");
        $total_row = $total_result->fetch_assoc();
        $total = $total_row['total'];

        $today_result = $conn->query("SELECT COUNT(*) as today FROM news WHERE DATE(date) = CURDATE()");
        $today_row = $today_result->fetch_assoc();
        $today = $today_row['today'];

        $result = $conn->query("SELECT * FROM news ORDER BY id DESC");
        ?>
        <div class="row g-3 mb-4">
          <div class="col-sm-4">
            <div class="card border-0 shadow-sm">
              <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-danger bg-opacity-10 rounded p-3">
                  <i class="bi bi-newspaper text-danger fs-4"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold"><?= $total; ?></div>
                  <div class="text-muted small">Total Berita</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card border-0 shadow-sm">
              <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-primary bg-opacity-10 rounded p-3">
                  <i class="bi bi-calendar-check text-primary fs-4"></i>
                </div>
                <div>
                  <div class="fs-4 fw-bold"><?= $today; ?></div>
                  <div class="text-muted small">Berita Hari Ini</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card border-0 shadow-sm">
              <div class="card-body d-flex align-items-center gap-3">
                <div class="bg-success bg-opacity-10 rounded p-3">
                  <i class="bi bi-person-check text-success fs-4"></i>
                </div>
                <div>
                  <div class="fw-bold"><?= htmlspecialchars($_SESSION['username']); ?></div>
                  <div class="text-muted small">Login Sebagai</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Table -->
        <div class="card border-0 shadow-sm">
          <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-semibold"><i class="bi bi-list-ul me-2 text-danger"></i>Daftar Berita</span>
            <span class="badge bg-secondary"><?= $total; ?> berita</span>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th class="ps-3" style="width:50px">No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Author</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th style="width:140px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                  ?>
                      <tr>
                        <td class="ps-3 text-muted"><?= $no++; ?></td>
                        <td>
                          <div class="fw-semibold" style="max-width:180px;"><?= htmlspecialchars($row['title']); ?></div>
                        </td>
                        <td>
                          <span class="text-muted small"><?= htmlspecialchars(substr($row['content'], 0, 80)); ?>...</span>
                        </td>
                        <td>
                          <span class="badge bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-person-fill me-1"></i><?= htmlspecialchars($row['author']); ?>
                          </span>
                        </td>
                        <td>
                          <?php if (!empty($row['image'])): ?>
                            <img src="upload/<?= htmlspecialchars($row['image']); ?>"
                              width="70" height="50" class="rounded object-fit-cover" alt="Gambar">
                          <?php else: ?>
                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                              style="width:70px;height:50px;">
                              <i class="bi bi-image text-muted"></i>
                            </div>
                          <?php endif; ?>
                        </td>
                        <td>
                          <span class="text-muted small"><i class="bi bi-clock me-1"></i><?= $row['date']; ?></span>
                        </td>
                        <td>
                          <div class="d-flex gap-1">
                            <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-primary" title="Detail">
                              <i class="bi bi-eye"></i>
                            </a>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                              <i class="bi bi-pencil"></i>
                            </a>
                            <a href="delete.php?id=<?= $row['id']; ?>"
                              class="btn btn-sm btn-outline-danger"
                              title="Hapus"
                              onclick="return confirm('Yakin ingin menghapus berita ini?')">
                              <i class="bi bi-trash"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php
                    endwhile;
                  else:
                    ?>
                    <tr>
                      <td colspan="7" class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Belum ada berita. <a href="form_upload.php">Tambah berita pertama Anda!</a>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>