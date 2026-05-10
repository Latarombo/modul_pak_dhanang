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

    /* Article card */
    .article-card {
      background: #fff;
      border-radius: 20px;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
      overflow: hidden;
      max-width: 860px;
    }

    .article-img-wrap {
      position: relative;
    }

    .article-img {
      width: 100%;
      max-height: 380px;
      object-fit: cover;
      display: block;
    }

    .article-img-placeholder {
      width: 100%;
      height: 220px;
      background: linear-gradient(135deg, #f0f0f0, #e4e4e4);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #adb5bd;
      font-size: 4rem;
    }

    .article-date-overlay {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: rgba(26, 26, 46, 0.85);
      color: #fff;
      padding: 0.4rem 0.9rem;
      border-radius: 20px;
      font-size: 0.82rem;
      backdrop-filter: blur(6px);
    }

    .article-body {
      padding: 2rem 2.5rem;
    }

    .article-meta {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1.25rem;
    }

    .meta-item {
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      font-size: 0.85rem;
      color: #6c757d;
    }

    .meta-item.author {
      background: #f0f4ff;
      color: #4361ee;
      padding: 0.3rem 0.75rem;
      border-radius: 20px;
      font-weight: 600;
    }

    .article-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.9rem;
      color: var(--primary);
      line-height: 1.25;
      margin-bottom: 1rem;
    }

    .article-divider {
      width: 48px;
      height: 4px;
      background: var(--accent);
      border-radius: 2px;
      margin-bottom: 1.5rem;
    }

    .article-content {
      font-size: 1rem;
      line-height: 1.8;
      color: #444;
    }

    .article-actions {
      padding: 1.5rem 2.5rem;
      border-top: 1px solid #f0f0f0;
      background: #fafafa;
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .btn-back {
      background: #f0f0f0;
      color: #495057;
      border: none;
      border-radius: 10px;
      padding: 0.7rem 1.5rem;
      font-size: 0.9rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
    }

    .btn-back:hover {
      background: #e0e0e0;
      color: #495057;
    }

    .btn-edit-art {
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.7rem 1.5rem;
      font-size: 0.9rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s;
    }

    .btn-edit-art:hover {
      background: var(--accent);
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 4px 15px rgba(230, 57, 70, 0.3);
    }

    @media (max-width: 768px) {
      .sidebar {
        display: none;
      }

      .main-content {
        margin-left: 0;
        padding: 1rem;
      }

      .article-body {
        padding: 1.5rem;
      }

      .article-actions {
        padding: 1rem 1.5rem;
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
      <h1 class="page-title">Detail Berita</h1>
      <div class="breadcrumb-custom">
        <a href="admin.php"><i class="bi bi-house me-1"></i>Dashboard</a>
        <i class="bi bi-chevron-right" style="font-size:0.7rem;"></i>
        <span>Detail Berita</span>
      </div>
    </div>

    <div class="article-card">
      <!-- Image -->
      <div class="article-img-wrap">
        <?php if (!empty($row['image'])): ?>
          <img src="upload/<?= htmlspecialchars($row['image']); ?>" class="article-img" alt="<?= htmlspecialchars($row['title']); ?>">
        <?php else: ?>
          <div class="article-img-placeholder"><i class="bi bi-image"></i></div>
        <?php endif; ?>
        <div class="article-date-overlay">
          <i class="bi bi-calendar3 me-1"></i><?= $row['date']; ?>
        </div>
      </div>

      <!-- Body -->
      <div class="article-body">
        <div class="article-meta">
          <span class="meta-item author">
            <i class="bi bi-person-fill"></i><?= htmlspecialchars($row['author']); ?>
          </span>
          <span class="meta-item">
            <i class="bi bi-tag"></i> Berita
          </span>
          <span class="meta-item">
            <i class="bi bi-hash"></i> ID: <?= $row['id']; ?>
          </span>
        </div>
        <h2 class="article-title"><?= htmlspecialchars($row['title']); ?></h2>
        <div class="article-divider"></div>
        <div class="article-content">
          <?= nl2br(htmlspecialchars($row['content'])); ?>
        </div>
      </div>

      <!-- Actions -->
      <div class="article-actions">
        <a href="admin.php" class="btn-back"><i class="bi bi-arrow-left me-2"></i>Kembali</a>
        <a href="edit.php?id=<?= $row['id']; ?>" class="btn-edit-art"><i class="bi bi-pencil-square me-2"></i>Edit Berita</a>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>