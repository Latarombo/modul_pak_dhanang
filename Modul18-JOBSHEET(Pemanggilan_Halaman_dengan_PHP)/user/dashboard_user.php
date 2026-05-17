<?php
$level_akses = "user";
include "../login/cek.php";
include "../admin/koneksi.php";

$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Berita - Dashboard</title>
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

  <!-- HERO BANNER -->
  <div class="bg-dark text-white text-center py-5" style="margin-top: 56px;">
    <div class="container">
      <p class="text-white-50 small text-uppercase mb-2"><?= date('l, d F Y'); ?></p>
      <h1 class="fw-bold display-5 mb-2">Portal<span class="text-danger">.</span>ID</h1>
      <div class="border-bottom border-danger border-2 w-25 mx-auto mb-3"></div>
      <p class="text-white-50">Berita terkini, terpercaya, untuk Anda</p>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="container py-4">

    <!-- Section Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
        <span class="border-start border-danger border-3 ps-2">Berita Terbaru</span>
      </h5>
      <?php
      $count_result = $conn->query("SELECT COUNT(*) as total FROM news");
      $count = $count_result->fetch_assoc()['total'];
      ?>
      <span class="badge bg-dark"><?= $count; ?> Berita</span>
    </div>

    <?php
    $result = $conn->query("SELECT * FROM news ORDER BY id DESC");
    ?>
    <?php if ($result && $result->num_rows > 0): ?>
      <div class="row g-4">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
              <!-- Gambar -->
              <div style="height:200px; overflow:hidden;">
                <?php if (!empty($row['image'])): ?>
                  <img src="../admin/upload/<?= htmlspecialchars($row['image']); ?>"
                    class="card-img-top w-100 h-100 object-fit-cover"
                    alt="<?= htmlspecialchars($row['title']); ?>">
                <?php else: ?>
                  <div class="bg-secondary bg-opacity-10 w-100 h-100 d-flex align-items-center justify-content-center">
                    <i class="bi bi-image text-muted fs-1"></i>
                  </div>
                <?php endif; ?>
              </div>

              <div class="card-body d-flex flex-column">
                <!-- Meta -->
                <div class="d-flex flex-wrap gap-2 mb-2">
                  <span class="badge bg-danger text-white small">Berita</span>
                  <span class="text-muted small">
                    <i class="bi bi-person-fill me-1"></i><?= htmlspecialchars($row['author']); ?>
                  </span>
                  <span class="text-muted small">
                    <i class="bi bi-clock me-1"></i><?= date('d M Y', strtotime($row['date'])); ?>
                  </span>
                </div>

                <!-- Judul -->
                <h6 class="card-title fw-bold lh-base"
                  style="display:-webkit-box;-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                  <?= htmlspecialchars($row['title']); ?>
                </h6>

                <!-- Excerpt -->
                <p class="card-text text-muted small flex-grow-1"
                  style="display:-webkit-box;-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;">
                  <?= htmlspecialchars(substr($row['content'], 0, 150)); ?>...
                </p>

                <!-- Button -->
                <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-dark btn-sm mt-2 align-self-start">
                  Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <div class="text-center py-5 text-muted">
        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
        <h6>Belum Ada Berita</h6>
        <p class="small">Konten berita akan muncul di sini.</p>
      </div>
    <?php endif; ?>

  </div>

  <!-- FOOTER -->
  <footer class="bg-dark text-white-50 text-center py-3 mt-5 small">
    &copy; <?= date('Y'); ?> <span class="text-danger">Portal.ID</span> — Sistem Informasi Berita
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>