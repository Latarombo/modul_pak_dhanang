<?php
include "../login/cek.php";
include "../admin/koneksi.php";

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
  <title><?= htmlspecialchars($row['title']); ?> - Portal Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 fixed-top">
    <a class="navbar-brand fw-bold" href="dashboard_user.php">Portal<span class="text-danger">.</span>ID</a>
    <div class="ms-auto d-flex align-items-center gap-2">
      <span class="text-white-50 small d-none d-sm-inline">
        <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']); ?>
      </span>
      <a href="../login/logout.php" class="btn btn-sm btn-outline-light">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>
  </nav>

  <div class="container py-4" style="margin-top: 70px; max-width: 860px;">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard_user.php" class="text-danger text-decoration-none">
            <i class="bi bi-house me-1"></i>Beranda
          </a>
        </li>
        <li class="breadcrumb-item active">Detail Berita</li>
      </ol>
    </nav>

    <!-- Article Card -->
    <div class="card border-0 shadow-sm overflow-hidden">

      <!-- Hero Image -->
      <?php if (!empty($row['image'])): ?>
        <div style="max-height:440px; overflow:hidden; position:relative;">
          <img src="../admin/upload/<?= htmlspecialchars($row['image']); ?>"
            class="w-100 object-fit-cover d-block" style="max-height:440px;"
            alt="<?= htmlspecialchars($row['title']); ?>">
          <span class="badge bg-danger position-absolute top-0 start-0 m-3">Berita</span>
        </div>
      <?php else: ?>
        <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center"
          style="height:200px; position:relative;">
          <i class="bi bi-image text-muted fs-1"></i>
          <span class="badge bg-danger position-absolute top-0 start-0 m-3">Berita</span>
        </div>
      <?php endif; ?>

      <!-- Body -->
      <div class="card-body p-4">
        <!-- Meta -->
        <div class="d-flex flex-wrap gap-2 mb-3">
          <span class="badge bg-primary bg-opacity-10 text-primary fw-semibold">
            <i class="bi bi-person-fill me-1"></i><?= htmlspecialchars($row['author']); ?>
          </span>
          <span class="badge bg-light text-muted fw-normal">
            <i class="bi bi-calendar3 me-1"></i><?= date('d F Y, H:i', strtotime($row['date'])); ?> WIB
          </span>
          <span class="badge bg-light text-muted fw-normal">
            <i class="bi bi-hash me-1"></i>Artikel #<?= $row['id']; ?>
          </span>
        </div>

        <!-- Judul -->
        <h2 class="fw-bold mb-2"><?= htmlspecialchars($row['title']); ?></h2>
        <hr class="border-danger border-2 opacity-100 mb-4" style="width:48px;">

        <!-- Konten -->
        <div class="text-muted lh-lg" style="font-size:1.05rem;">
          <?= nl2br(htmlspecialchars($row['content'])); ?>
        </div>
      </div>

      <!-- Footer -->
      <div class="card-footer bg-white d-flex align-items-center gap-3 flex-wrap py-3">
        <a href="dashboard_user.php" class="btn btn-dark">
          <i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda
        </a>
        <span class="text-muted small"><i class="bi bi-clock me-1"></i><?= $row['date']; ?></span>
      </div>
    </div>

  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white-50 text-center py-3 mt-5 small">
    &copy; <?= date('Y'); ?> <span class="text-danger">Portal.ID</span> — Sistem Informasi Berita
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>