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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1a1a2e; --accent: #e63946; --light-bg: #f4f6f9;
    }
    body { font-family: 'Source Sans 3', sans-serif; background: var(--light-bg); min-height: 100vh; }
    .top-navbar {
      background: var(--primary); height: 64px;
      display: flex; align-items: center; padding: 0 2rem;
      position: fixed; top: 0; left: 0; right: 0;
      z-index: 1030; box-shadow: 0 2px 20px rgba(0,0,0,0.25);
    }
    .navbar-brand-custom {
      font-family: 'Playfair Display', serif; font-weight: 900;
      font-size: 1.5rem; color: #fff; letter-spacing: -0.5px; text-decoration: none;
    }
    .navbar-brand-custom span { color: var(--accent); }
    .navbar-right { margin-left: auto; display: flex; align-items: center; gap: 1rem; }
    .user-chip {
      display: flex; align-items: center; gap: 0.5rem;
      background: rgba(255,255,255,0.1); border-radius: 30px;
      padding: 0.35rem 0.9rem; color: #fff; font-size: 0.88rem; font-weight: 600;
    }
    .user-chip .avatar {
      width: 28px; height: 28px; background: var(--accent); border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.75rem; font-weight: 700;
    }
    .btn-logout-nav {
      background: rgba(230,57,70,0.15); color: #ff8fa3;
      border: 1px solid rgba(230,57,70,0.3); border-radius: 20px;
      padding: 0.35rem 0.9rem; font-size: 0.85rem; font-weight: 600;
      text-decoration: none; transition: all 0.2s;
    }
    .btn-logout-nav:hover { background: var(--accent); color: #fff; }

    .main-wrap {
      max-width: 860px; margin: 0 auto;
      padding: 2rem 1.5rem 4rem;
      margin-top: 64px;
    }
    .breadcrumb-nav {
      display: flex; align-items: center; gap: 0.5rem;
      font-size: 0.85rem; color: #6c757d; margin-bottom: 1.75rem;
    }
    .breadcrumb-nav a { color: var(--accent); text-decoration: none; font-weight: 600; }
    .breadcrumb-nav a:hover { text-decoration: underline; }

    /* Article */
    .article-wrap {
      background: #fff; border-radius: 20px;
      border: 1px solid #e9ecef; box-shadow: 0 2px 20px rgba(0,0,0,0.05);
      overflow: hidden;
    }
    .article-hero { position: relative; }
    .article-hero-img {
      width: 100%; max-height: 440px; object-fit: cover; display: block;
    }
    .article-hero-placeholder {
      width: 100%; height: 260px;
      background: linear-gradient(135deg, #1a1a2e, #16213e);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,0.3); font-size: 4rem;
    }
    .article-category-pill {
      position: absolute; top: 1.25rem; left: 1.25rem;
      background: var(--accent); color: #fff;
      font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
      letter-spacing: 1px; padding: 0.3rem 0.85rem; border-radius: 20px;
    }
    .article-body { padding: 2.5rem 3rem; }
    .article-meta-row {
      display: flex; align-items: center; gap: 1.25rem;
      flex-wrap: wrap; margin-bottom: 1.25rem;
    }
    .meta-chip {
      display: inline-flex; align-items: center; gap: 0.4rem;
      font-size: 0.85rem;
    }
    .meta-chip.author {
      background: #f0f4ff; color: #4361ee;
      padding: 0.35rem 0.85rem; border-radius: 20px; font-weight: 700;
    }
    .meta-chip.date { color: #adb5bd; }
    .meta-chip.id { color: #adb5bd; }
    .article-title {
      font-family: 'Playfair Display', serif; font-weight: 900;
      font-size: 2.1rem; color: var(--primary);
      line-height: 1.2; margin-bottom: 1rem;
    }
    .article-accent-line {
      width: 52px; height: 4px; background: var(--accent);
      border-radius: 2px; margin-bottom: 1.75rem;
    }
    .article-text {
      font-size: 1.05rem; line-height: 1.85; color: #3a3a3a;
    }
    .article-footer {
      padding: 1.5rem 3rem 2rem;
      border-top: 1px solid #f0f0f0; background: #fafafa;
      display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;
    }
    .btn-back-user {
      display: inline-flex; align-items: center; gap: 0.4rem;
      background: var(--primary); color: #fff;
      border-radius: 10px; padding: 0.7rem 1.5rem;
      font-size: 0.9rem; font-weight: 600;
      text-decoration: none; transition: all 0.3s;
    }
    .btn-back-user:hover {
      background: var(--accent); color: #fff;
      transform: translateX(-2px); box-shadow: 0 4px 15px rgba(230,57,70,0.3);
    }

    /* Related / sidebar info */
    .info-pill {
      display: inline-flex; align-items: center; gap: 0.35rem;
      background: #f0f0f0; color: #6c757d;
      padding: 0.35rem 0.85rem; border-radius: 20px; font-size: 0.82rem;
    }

    /* Footer */
    .site-footer {
      background: var(--primary); color: rgba(255,255,255,0.5);
      text-align: center; padding: 1.5rem; font-size: 0.85rem; margin-top: 2rem;
    }
    .site-footer span { color: var(--accent); }

    @media (max-width: 768px) {
      .article-body { padding: 1.5rem; }
      .article-footer { padding: 1rem 1.5rem; }
      .article-title { font-size: 1.5rem; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="top-navbar">
    <a href="dashboard_user.php" class="navbar-brand-custom">PORTAL<span>.</span>ID</a>
    <div class="navbar-right">
      <div class="user-chip">
        <div class="avatar"><?= strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
        <?= htmlspecialchars($_SESSION['username']); ?>
      </div>
      <a href="../login/logout.php" class="btn-logout-nav">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>
  </nav>

  <div class="main-wrap">
    <!-- Breadcrumb -->
    <div class="breadcrumb-nav">
      <a href="dashboard_user.php"><i class="bi bi-house me-1"></i>Beranda</a>
      <i class="bi bi-chevron-right" style="font-size:0.7rem;"></i>
      <span>Detail Berita</span>
    </div>

    <!-- Article -->
    <div class="article-wrap">
      <!-- Hero Image -->
      <div class="article-hero">
        <?php if (!empty($row['image'])): ?>
          <img src="../admin/upload/<?= htmlspecialchars($row['image']); ?>"
               class="article-hero-img" alt="<?= htmlspecialchars($row['title']); ?>">
        <?php else: ?>
          <div class="article-hero-placeholder"><i class="bi bi-image"></i></div>
        <?php endif; ?>
        <span class="article-category-pill">Berita</span>
      </div>

      <!-- Body -->
      <div class="article-body">
        <!-- Meta -->
        <div class="article-meta-row">
          <span class="meta-chip author">
            <i class="bi bi-person-fill"></i><?= htmlspecialchars($row['author']); ?>
          </span>
          <span class="meta-chip date">
            <i class="bi bi-calendar3"></i><?= date('d F Y, H:i', strtotime($row['date'])); ?> WIB
          </span>
          <span class="meta-chip id">
            <i class="bi bi-hash"></i><?= $row['id']; ?>
          </span>
        </div>

        <!-- Title -->
        <h1 class="article-title"><?= htmlspecialchars($row['title']); ?></h1>
        <div class="article-accent-line"></div>

        <!-- Content -->
        <div class="article-text">
          <?= nl2br(htmlspecialchars($row['content'])); ?>
        </div>
      </div>

      <!-- Footer -->
      <div class="article-footer">
        <a href="dashboard_user.php" class="btn-back-user">
          <i class="bi bi-arrow-left"></i>Kembali ke Beranda
        </a>
        <span class="info-pill"><i class="bi bi-eye"></i> Artikel #<?= $row['id']; ?></span>
        <span class="info-pill"><i class="bi bi-clock"></i><?= $row['date']; ?></span>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    &copy; <?= date('Y'); ?> <span>Portal.ID</span> — Sistem Informasi Berita
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
