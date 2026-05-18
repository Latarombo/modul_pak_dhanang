<?php
$level_akses = "admin";
$from_sub    = true;
include "../../login/cek.php";
include __DIR__ . "/../koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row    = $result->fetch_assoc();
?>

<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<div class="main">
  <div class="content">

    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php?page=berita" class="text-decoration-none">Manajemen Berita</a></li>
        <li class="breadcrumb-item active">Detail Berita</li>
      </ol>
    </nav>

    <h4 class="fw-bold mb-4">Detail Berita</h4>

    <div class="card border-0 shadow-sm" style="max-width: 860px;">
      <!-- Gambar -->
      <?php if (!empty($row['image'])): ?>
        <img src="../upload/<?= htmlspecialchars($row['image']); ?>"
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
        <a href="../index.php?page=berita" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-dark">
          <i class="bi bi-pencil-square me-1"></i>Edit Berita
        </a>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>
