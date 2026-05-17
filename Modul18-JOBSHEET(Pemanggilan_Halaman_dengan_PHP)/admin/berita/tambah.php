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
        <li class="breadcrumb-item"><a href="../index.php?page=berita" class="text-decoration-none">Manajemen Berita</a></li>
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
        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">

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
            <a href="../index.php?page=berita" class="btn btn-outline-secondary">
              <i class="bi bi-x-circle me-1"></i>Batal
            </a>
          </div>

        </form>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>

<script>
  function previewImage(input) {
    if (input.files && input.files[0] && window.FileReader) {
      const reader = new window.FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImg').src = e.target.result;
        document.getElementById('imgPreview').classList.remove('d-none');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
