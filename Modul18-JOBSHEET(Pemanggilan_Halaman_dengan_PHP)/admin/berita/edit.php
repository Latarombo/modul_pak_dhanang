<?php
$level_akses = "admin";
include "../../login/cek.php";
include __DIR__ . "/../koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
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
        <li class="breadcrumb-item"><a href="../index.php?page=berita" class="text-decoration-none">Manajemen Berita</a></li>
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
        <form method="POST" action="proses_edit.php" enctype="multipart/form-data">

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
                <img src="../upload/<?= htmlspecialchars($data['image']); ?>"
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
            <a href="../index.php?page=berita" class="btn btn-link text-muted text-decoration-none">Batal</a>
          </div>

        </form>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>

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
