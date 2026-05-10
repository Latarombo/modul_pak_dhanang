<?php
$level_akses = "admin";
include "../login/cek.php";
include "koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Berita - Admin</title>
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
              <a href="admin.php" class="nav-link text-dark">
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

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php" class="text-danger text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Berita</li>
          </ol>
        </nav>

        <h4 class="fw-bold mb-4">Detail Berita</h4>

        <div class="card border-0 shadow-sm" style="max-width: 860px;">
          <!-- Gambar -->
          <?php if (!empty($row['image'])): ?>
            <img src="upload/<?= htmlspecialchars($row['image']); ?>"
              class="card-img-top object-fit-cover" style="max-height:380px;" alt="<?= htmlspecialchars($row['title']); ?>">
          <?php else: ?>
            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height:200px;">
              <i class="bi bi-image text-muted fs-1"></i>
            </div>
          <?php endif; ?>

          <div class="card-body p-4">
            <!-- Meta -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold">
                <i class="bi bi-person-fill me-1"></i><?= htmlspecialchars($row['author']); ?>
              </span>
              <span class="badge bg-light text-muted fw-normal">
                <i class="bi bi-tag me-1"></i>Berita
              </span>
              <span class="badge bg-light text-muted fw-normal">
                <i class="bi bi-hash me-1"></i>ID: <?= $row['id']; ?>
              </span>
              <span class="badge bg-light text-muted fw-normal">
                <i class="bi bi-calendar3 me-1"></i><?= $row['date']; ?>
              </span>
            </div>

            <h2 class="fw-bold mb-3"><?= htmlspecialchars($row['title']); ?></h2>
            <hr class="border-danger border-2 opacity-100 w-25 mb-3">

            <p class="text-muted lh-lg"><?= nl2br(htmlspecialchars($row['content'])); ?></p>
          </div>

          <div class="card-footer bg-white d-flex gap-2">
            <a href="admin.php" class="btn btn-secondary">
              <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-dark">
              <i class="bi bi-pencil-square me-1"></i>Edit Berita
            </a>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>