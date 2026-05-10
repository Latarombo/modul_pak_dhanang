<?php
$level_akses = "admin";
include "../login/cek.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Berita - Admin</title>
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
              <a href="form_upload.php" class="nav-link active text-danger fw-semibold">
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
            <li class="breadcrumb-item active">Tambah Berita</li>
          </ol>
        </nav>

        <h4 class="fw-bold mb-4">Tambah Berita</h4>

        <div class="card border-0 shadow-sm" style="max-width: 800px;">
          <div class="card-header bg-dark text-white py-3 border-0">
            <div class="d-flex align-items-center gap-2">
              <i class="bi bi-file-earmark-plus fs-5"></i>
              <div>
                <div class="fw-semibold">Form Upload Berita</div>
                <div class="text-white-50 small">Isi semua kolom untuk menambah berita baru</div>
              </div>
            </div>
          </div>
          <div class="card-body p-4">
            <form action="proses_upload.php" method="POST" enctype="multipart/form-data">

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Judul Berita</label>
                <input type="text" class="form-control" name="title"
                  placeholder="Masukkan judul berita yang menarik..." required>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Konten Berita</label>
                <textarea class="form-control" name="content" rows="6"
                  placeholder="Tulis isi berita di sini..." required></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label fw-semibold small text-uppercase text-muted">Author / Penulis</label>
                <input type="text" class="form-control" name="author"
                  placeholder="Nama penulis berita..." required>
              </div>

              <hr class="my-4">

              <div class="mb-4">
                <label class="form-label fw-semibold small text-uppercase text-muted">Gambar Berita</label>
                <input type="file" class="form-control" name="image" id="imageInput"
                  accept=".jpg,.jpeg,.png,.gif" required onchange="previewImage(this)">
                <div class="form-text">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.</div>

                <!-- Preview -->
                <div id="imgPreview" class="mt-3 d-none">
                  <p class="text-muted small fw-semibold mb-2">Preview:</p>
                  <img id="previewImg" src="#" alt="Preview"
                    class="img-fluid rounded" style="max-height:220px; object-fit:cover;">
                </div>
              </div>

              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-dark fw-semibold">
                  <i class="bi bi-cloud-upload me-1"></i>Upload Berita
                </button>
                <a href="admin.php" class="btn btn-outline-secondary">
                  <i class="bi bi-x-circle me-1"></i>Batal
                </a>
              </div>

            </form>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImage(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('previewImg').src = e.target.result;
          document.getElementById('imgPreview').classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>