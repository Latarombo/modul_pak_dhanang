<?php
$level_akses = "admin";
include "../login/cek.php";
include "koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Berita - Admin</title>
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
            <li class="breadcrumb-item active">Edit Berita #<?= $data['id']; ?></li>
          </ol>
        </nav>

        <h4 class="fw-bold mb-4">Edit Berita</h4>

        <div class="card border-0 shadow-sm" style="max-width: 800px;">
          <div class="card-header bg-warning bg-opacity-10 border-0 py-3">
            <div class="d-flex align-items-center gap-2">
              <div class="bg-warning bg-opacity-25 rounded p-2">
                <i class="bi bi-pencil-square text-warning fs-5"></i>
              </div>
              <div>
                <div class="fw-semibold">Form Edit Berita</div>
                <div class="text-muted small">Perbarui informasi berita di bawah ini</div>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <form method="POST" action="proses_update.php" enctype="multipart/form-data">

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">ID Berita</label>
                <input type="text" class="form-control bg-light" name="id" value="<?= $data['id']; ?>" readonly>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Judul Berita</label>
                <input type="text" class="form-control" name="title"
                  value="<?= htmlspecialchars($data['title']); ?>" required>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Konten Berita</label>
                <textarea class="form-control" name="content" rows="6" required><?= htmlspecialchars($data['content']); ?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Author / Penulis</label>
                <input type="text" class="form-control" name="author"
                  value="<?= htmlspecialchars($data['author']); ?>" required>
              </div>

              <hr class="my-4">

              <div class="mb-4">
                <label class="form-label fw-semibold small text-uppercase text-muted">Gambar Berita</label>

                <!-- Gambar saat ini -->
                <?php if (!empty($data['image'])): ?>
                  <div class="border rounded p-3 bg-light mb-3">
                    <p class="text-muted small fw-semibold mb-2"><i class="bi bi-image-fill me-1"></i>Gambar Saat Ini</p>
                    <img src="upload/<?= htmlspecialchars($data['image']); ?>"
                      class="img-fluid rounded" style="max-height:200px; object-fit:cover;" alt="Gambar saat ini">
                  </div>
                <?php endif; ?>

                <input type="hidden" name="image_lama" value="<?= htmlspecialchars($data['image']); ?>">

                <label class="form-label small text-muted">Ganti Gambar (Opsional)</label>
                <input type="file" class="form-control" name="image" accept=".jpg,.jpeg,.png,.gif"
                  onchange="previewNew(this)">
                <div class="form-text">Biarkan kosong untuk mempertahankan gambar saat ini.</div>

                <!-- Preview gambar baru -->
                <div id="newPreview" class="mt-3 d-none">
                  <p class="text-muted small fw-semibold mb-2">Preview Gambar Baru:</p>
                  <img id="newPreviewImg" src="#" alt="Preview baru"
                    class="img-fluid rounded" style="max-height:200px; object-fit:cover;">
                </div>
              </div>

              <div class="d-flex gap-2 flex-wrap">
                <button type="submit" name="submit" class="btn btn-warning fw-semibold">
                  <i class="bi bi-check-circle me-1"></i>Update Berita
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                </button>
                <a href="admin.php" class="btn btn-link text-muted text-decoration-none">Batal</a>
              </div>

            </form>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewNew(input) {
      if (input.files && input.files[0]) {
        const reader = new window.FileReader();
        reader.onload = function(e) {
          document.getElementById('newPreviewImg').src = e.target.result;
          document.getElementById('newPreview').classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>