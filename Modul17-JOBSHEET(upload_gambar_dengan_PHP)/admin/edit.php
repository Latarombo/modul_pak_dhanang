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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1a1a2e;
      --accent: #e63946;
      --sidebar-w: 260px;
      --light-bg: #f4f6f9;
    }

    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--light-bg);
      min-height: 100vh;
    }

    .top-navbar {
      background: var(--primary);
      height: 64px;
      display: flex;
      align-items: center;
      padding: 0 1.5rem;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1030;
      box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25);
    }

    .navbar-brand-custom {
      font-family: 'Playfair Display', serif;
      font-weight: 900;
      font-size: 1.5rem;
      color: #fff;
      letter-spacing: -0.5px;
      text-decoration: none;
    }

    .navbar-brand-custom span {
      color: var(--accent);
    }

    .navbar-user {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .user-avatar {
      width: 36px;
      height: 36px;
      background: var(--accent);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      color: #fff;
      font-weight: 700;
    }

    .user-name {
      color: rgba(255, 255, 255, 0.85);
      font-size: 0.9rem;
      font-weight: 600;
    }

    .admin-badge {
      background: rgba(230, 57, 70, 0.2);
      color: #ff8fa3;
      font-size: 0.7rem;
      padding: 0.15rem 0.5rem;
      border-radius: 20px;
      border: 1px solid rgba(230, 57, 70, 0.3);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .sidebar {
      position: fixed;
      top: 64px;
      left: 0;
      width: var(--sidebar-w);
      height: calc(100vh - 64px);
      background: #fff;
      border-right: 1px solid #e9ecef;
      padding: 1.5rem 1rem;
      overflow-y: auto;
      z-index: 1020;
      box-shadow: 2px 0 20px rgba(0, 0, 0, 0.04);
    }

    .sidebar-section {
      font-size: 0.7rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #adb5bd;
      padding: 0 0.75rem;
      margin-bottom: 0.5rem;
      margin-top: 1.5rem;
    }

    .sidebar-section:first-child {
      margin-top: 0;
    }

    .sidebar-nav .nav-link {
      color: #495057;
      border-radius: 10px;
      padding: 0.65rem 0.75rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-size: 0.9rem;
      font-weight: 500;
      transition: all 0.2s;
      margin-bottom: 2px;
    }

    .sidebar-nav .nav-link:hover {
      background: linear-gradient(135deg, #fff5f5, #ffe8ea);
      color: var(--accent);
    }

    .sidebar-nav .nav-link i {
      font-size: 1.1rem;
      width: 20px;
    }

    .btn-logout-side {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      color: #dc3545;
      border-radius: 10px;
      padding: 0.65rem 0.75rem;
      font-size: 0.9rem;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-logout-side:hover {
      background: #fff5f5;
      color: #dc3545;
    }

    .main-content {
      margin-left: var(--sidebar-w);
      margin-top: 64px;
      padding: 2rem;
      min-height: calc(100vh - 64px);
    }

    .page-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.8rem;
      color: var(--primary);
      margin: 0;
    }

    .breadcrumb-custom {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.85rem;
      color: #6c757d;
      margin-top: 0.3rem;
    }

    .breadcrumb-custom a {
      color: var(--accent);
      text-decoration: none;
    }

    .form-card {
      background: #fff;
      border-radius: 20px;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
      overflow: hidden;
      max-width: 800px;
    }

    .form-card-header {
      background: linear-gradient(135deg, #f4a261, #e76f51);
      padding: 1.5rem 2rem;
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .form-card-header-icon {
      width: 48px;
      height: 48px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.3rem;
      color: #fff;
    }

    .form-card-header h5 {
      color: #fff;
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.2rem;
      margin: 0;
    }

    .form-card-header p {
      color: rgba(255, 255, 255, 0.75);
      font-size: 0.85rem;
      margin: 0;
    }

    .form-card-body {
      padding: 2rem;
    }

    .form-label {
      font-weight: 700;
      font-size: 0.82rem;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.5rem;
    }

    .form-control {
      border: 2px solid #e9ecef;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 0.95rem;
      transition: all 0.25s;
      background: #fdfdfd;
    }

    .form-control:focus {
      border-color: #f4a261;
      box-shadow: 0 0 0 4px rgba(244, 162, 97, 0.12);
      background: #fff;
    }

    .form-control[readonly] {
      background: #f8f9fa;
      color: #6c757d;
      cursor: not-allowed;
    }

    textarea.form-control {
      resize: vertical;
      min-height: 150px;
    }

    .current-img-card {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 1rem;
      border: 2px solid #e9ecef;
      margin-bottom: 1rem;
    }

    .current-img-label {
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #6c757d;
      margin-bottom: 0.75rem;
    }

    .current-img-card img {
      border-radius: 10px;
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .upload-area {
      border: 2px dashed #dee2e6;
      border-radius: 12px;
      padding: 1.5rem;
      text-align: center;
      background: #fafafa;
      cursor: pointer;
      transition: all 0.25s;
      position: relative;
    }

    .upload-area:hover {
      border-color: #f4a261;
      background: #fffbf5;
    }

    .upload-area i {
      font-size: 2rem;
      color: #adb5bd;
    }

    .upload-area p {
      color: #6c757d;
      font-size: 0.88rem;
      margin: 0.3rem 0 0;
    }

    .upload-area input[type="file"] {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      cursor: pointer;
    }

    .new-preview {
      display: none;
      margin-top: 1rem;
      border-radius: 10px;
      overflow: hidden;
    }

    .new-preview img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 10px;
    }

    .form-divider {
      border: none;
      border-top: 1px solid #f0f0f0;
      margin: 1.5rem 0;
    }

    .btn-update {
      background: #f4a261;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.85rem 2rem;
      font-size: 0.95rem;
      font-weight: 700;
      transition: all 0.3s;
    }

    .btn-update:hover {
      background: #e76f51;
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(231, 111, 81, 0.35);
    }

    .btn-reset-form {
      background: #f8f9fa;
      color: #495057;
      border: 2px solid #e9ecef;
      border-radius: 10px;
      padding: 0.85rem 1.5rem;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
    }

    .btn-reset-form:hover {
      background: #e9ecef;
    }

    .btn-cancel {
      background: transparent;
      color: #6c757d;
      border: none;
      padding: 0.85rem 1.5rem;
      font-size: 0.9rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-cancel:hover {
      color: var(--accent);
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
    }
  </style>
</head>

<body>

  <nav class="top-navbar">
    <a href="admin.php" class="navbar-brand-custom">PORTAL<span>.</span>ID</a>
    <div class="navbar-user">
      <div>
        <div class="user-name"><?= $_SESSION['username']; ?></div>
        <div class="admin-badge">Administrator</div>
      </div>
      <div class="user-avatar"><?= strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
    </div>
  </nav>

  <aside class="sidebar">
    <div class="sidebar-section">Menu Utama</div>
    <nav class="sidebar-nav">
      <a href="admin.php" class="nav-link"><i class="bi bi-newspaper"></i> Manajemen Berita</a>
      <a href="form_upload.php" class="nav-link"><i class="bi bi-plus-circle"></i> Tambah Berita</a>
    </nav>
    <div class="sidebar-section">Akun</div>
    <nav class="sidebar-nav">
      <a href="../login/logout.php" class="btn-logout-side"><i class="bi bi-box-arrow-left"></i> Logout</a>
    </nav>
  </aside>

  <main class="main-content">
    <div class="mb-4">
      <h1 class="page-title">Edit Berita</h1>
      <div class="breadcrumb-custom">
        <a href="admin.php"><i class="bi bi-house me-1"></i>Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size:0.7rem;"></i>
        <span>Edit Berita #<?= $data['id']; ?></span>
      </div>
    </div>

    <div class="form-card">
      <div class="form-card-header">
        <div class="form-card-header-icon"><i class="bi bi-pencil-square"></i></div>
        <div>
          <h5>Edit Berita</h5>
          <p>Perbarui informasi berita di bawah ini</p>
        </div>
      </div>
      <div class="form-card-body">
        <form method="POST" action="proses_update.php" enctype="multipart/form-data">

          <div class="mb-3">
            <label class="form-label"><i class="bi bi-hash me-1"></i>ID Berita</label>
            <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" readonly>
          </div>

          <div class="mb-4">
            <label class="form-label"><i class="bi bi-type me-1"></i>Judul Berita</label>
            <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($data['title']); ?>" required>
          </div>

          <div class="mb-4">
            <label class="form-label"><i class="bi bi-text-left me-1"></i>Konten Berita</label>
            <textarea class="form-control" name="content" required><?= htmlspecialchars($data['content']); ?></textarea>
          </div>

          <div class="mb-4">
            <label class="form-label"><i class="bi bi-person me-1"></i>Author / Penulis</label>
            <input type="text" class="form-control" name="author" value="<?= htmlspecialchars($data['author']); ?>" required>
          </div>

          <hr class="form-divider">

          <div class="mb-4">
            <label class="form-label"><i class="bi bi-image me-1"></i>Gambar Berita</label>

            <!-- Current Image -->
            <?php if (!empty($data['image'])): ?>
              <div class="current-img-card">
                <div class="current-img-label"><i class="bi bi-image-fill me-1"></i>Gambar Saat Ini</div>
                <img src="upload/<?= htmlspecialchars($data['image']); ?>" alt="Gambar saat ini">
              </div>
            <?php endif; ?>

            <input type="hidden" name="image_lama" value="<?= htmlspecialchars($data['image']); ?>">

            <!-- Upload Baru -->
            <div class="upload-area">
              <i class="bi bi-arrow-repeat d-block mb-2"></i>
              <p><strong>Ganti Gambar (Opsional)</strong></p>
              <p style="font-size:0.78rem;color:#adb5bd;">Biarkan kosong untuk mempertahankan gambar saat ini</p>
              <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif" onchange="previewNew(this)">
            </div>
            <div class="new-preview" id="newPreview">
              <img id="newPreviewImg" src="#" alt="Preview baru">
            </div>
          </div>

          <div class="d-flex gap-3 flex-wrap">
            <button type="submit" name="submit" class="btn-update">
              <i class="bi bi-check-circle me-2"></i>Update Berita
            </button>
            <button type="reset" name="reset" class="btn-reset-form">
              <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
            </button>
            <a href="admin.php" class="btn-cancel">
              <i class="bi bi-x-circle me-1"></i>Batal
            </a>
          </div>

        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewNew(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('newPreviewImg').src = e.target.result;
          document.getElementById('newPreview').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>