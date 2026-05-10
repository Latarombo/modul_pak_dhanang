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
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1a1a2e;
      --accent: #e63946;
      --gold: #f4a261;
      --light-bg: #f4f6f9;
    }
    body { font-family: 'Source Sans 3', sans-serif; background: var(--light-bg); min-height: 100vh; }

    /* NAVBAR */
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
    .navbar-right {
      margin-left: auto; display: flex; align-items: center; gap: 1rem;
    }
    .user-chip {
      display: flex; align-items: center; gap: 0.5rem;
      background: rgba(255,255,255,0.1); border-radius: 30px;
      padding: 0.35rem 0.9rem; color: #fff; font-size: 0.88rem; font-weight: 600;
    }
    .user-chip .avatar {
      width: 28px; height: 28px; background: var(--accent);
      border-radius: 50%; display: flex; align-items: center; justify-content: center;
      font-size: 0.75rem; font-weight: 700;
    }
    .btn-logout-nav {
      background: rgba(230,57,70,0.15); color: #ff8fa3;
      border: 1px solid rgba(230,57,70,0.3); border-radius: 20px;
      padding: 0.35rem 0.9rem; font-size: 0.85rem; font-weight: 600;
      text-decoration: none; transition: all 0.2s;
    }
    .btn-logout-nav:hover { background: var(--accent); color: #fff; }

    /* HERO BANNER */
    .hero-banner {
      background: linear-gradient(135deg, var(--primary) 0%, #16213e 50%, #0f3460 100%);
      margin-top: 64px;
      padding: 3.5rem 2rem 2.5rem;
      text-align: center;
      position: relative;
      overflow: hidden;
    }
    .hero-banner::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0; bottom: 0;
      background: radial-gradient(ellipse at center, rgba(230,57,70,0.12) 0%, transparent 70%);
    }
    .hero-banner .date-line {
      font-size: 0.78rem; color: rgba(255,255,255,0.5);
      letter-spacing: 2px; text-transform: uppercase; margin-bottom: 0.5rem;
    }
    .hero-banner h1 {
      font-family: 'Playfair Display', serif; font-weight: 900;
      font-size: 2.8rem; color: #fff;
      letter-spacing: -1px; line-height: 1.1; margin-bottom: 0.5rem;
    }
    .hero-banner h1 span { color: var(--accent); }
    .hero-banner p { color: rgba(255,255,255,0.6); font-size: 1rem; margin: 0; }
    .hero-divider {
      width: 48px; height: 3px; background: var(--accent);
      border-radius: 2px; margin: 1rem auto;
    }

    /* MAIN */
    .main-wrap { max-width: 1200px; margin: 0 auto; padding: 2.5rem 1.5rem 3rem; }
    .section-header {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 1.75rem;
    }
    .section-title {
      font-family: 'Playfair Display', serif; font-weight: 700;
      font-size: 1.4rem; color: var(--primary); margin: 0;
      display: flex; align-items: center; gap: 0.75rem;
    }
    .section-title::before {
      content: ''; display: inline-block;
      width: 4px; height: 22px; background: var(--accent); border-radius: 2px;
    }
    .news-count-badge {
      background: var(--primary); color: #fff;
      font-size: 0.78rem; padding: 0.25rem 0.65rem;
      border-radius: 20px; font-weight: 600;
    }

    /* NEWS CARD GRID */
    .news-card {
      background: #fff; border-radius: 16px;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 12px rgba(0,0,0,0.04);
      overflow: hidden; height: 100%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: flex; flex-direction: column;
    }
    .news-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(0,0,0,0.1);
    }
    .news-card-img {
      width: 100%; height: 200px; object-fit: cover; display: block;
      transition: transform 0.4s ease;
    }
    .news-card:hover .news-card-img { transform: scale(1.04); }
    .news-card-img-wrap { overflow: hidden; position: relative; }
    .news-card-img-placeholder {
      width: 100%; height: 200px;
      background: linear-gradient(135deg, #f0f0f0, #e0e0e0);
      display: flex; align-items: center; justify-content: center;
      color: #bbb; font-size: 3rem;
    }
    .img-overlay-tag {
      position: absolute; top: 0.75rem; left: 0.75rem;
      background: var(--accent); color: #fff;
      font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.5px; padding: 0.25rem 0.65rem; border-radius: 20px;
    }
    .news-card-body { padding: 1.25rem 1.25rem 0.75rem; flex: 1; }
    .news-card-meta {
      display: flex; align-items: center; gap: 0.75rem;
      margin-bottom: 0.75rem; flex-wrap: wrap;
    }
    .meta-author {
      display: inline-flex; align-items: center; gap: 0.3rem;
      font-size: 0.8rem; font-weight: 600; color: #4361ee;
    }
    .meta-date { font-size: 0.78rem; color: #adb5bd; }
    .news-card-title {
      font-family: 'Playfair Display', serif; font-weight: 700;
      font-size: 1.05rem; color: var(--primary); line-height: 1.35;
      margin-bottom: 0.6rem;
      display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .news-card-excerpt {
      font-size: 0.88rem; color: #6c757d; line-height: 1.6;
      display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .news-card-footer {
      padding: 0.75rem 1.25rem 1.25rem;
      border-top: 1px solid #f5f5f5; margin-top: auto;
    }
    .btn-read {
      background: var(--primary); color: #fff; border: none;
      border-radius: 8px; padding: 0.55rem 1.2rem;
      font-size: 0.85rem; font-weight: 600; text-decoration: none;
      transition: all 0.25s; display: inline-flex; align-items: center; gap: 0.35rem;
    }
    .btn-read:hover {
      background: var(--accent); color: #fff;
      transform: translateX(2px);
    }
    .no-news {
      text-align: center; padding: 4rem 2rem;
      background: #fff; border-radius: 16px; border: 1px solid #e9ecef;
    }
    .no-news i { font-size: 3.5rem; color: #dee2e6; display: block; margin-bottom: 1rem; }

    /* FOOTER */
    .site-footer {
      background: var(--primary); color: rgba(255,255,255,0.5);
      text-align: center; padding: 1.5rem;
      font-size: 0.85rem; margin-top: 2rem;
    }
    .site-footer span { color: var(--accent); }
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

  <!-- HERO -->
  <div class="hero-banner">
    <div class="date-line"><?= date('l, d F Y'); ?></div>
    <h1>Portal<span>.</span>ID</h1>
    <div class="hero-divider"></div>
    <p>Berita terkini, terpercaya, untuk Anda</p>
  </div>

  <!-- CONTENT -->
  <div class="main-wrap">
    <div class="section-header">
      <h2 class="section-title">Berita Terbaru</h2>
      <?php
      $count_result = $conn->query("SELECT COUNT(*) as total FROM news");
      $count = $count_result->fetch_assoc()['total'];
      ?>
      <span class="news-count-badge"><?= $count; ?> Berita</span>
    </div>

    <?php
    // Re-run query
    $result = $conn->query("SELECT * FROM news ORDER BY id DESC");
    ?>
    <?php if ($result && $result->num_rows > 0): ?>
      <div class="row g-4">
        <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-12 col-sm-6 col-lg-4">
          <div class="news-card">
            <div class="news-card-img-wrap">
              <?php if (!empty($row['image'])): ?>
                <img src="../admin/upload/<?= htmlspecialchars($row['image']); ?>"
                     class="news-card-img" alt="<?= htmlspecialchars($row['title']); ?>">
              <?php else: ?>
                <div class="news-card-img-placeholder"><i class="bi bi-image"></i></div>
              <?php endif; ?>
              <span class="img-overlay-tag">Berita</span>
            </div>
            <div class="news-card-body">
              <div class="news-card-meta">
                <span class="meta-author">
                  <i class="bi bi-person-fill"></i><?= htmlspecialchars($row['author']); ?>
                </span>
                <span class="meta-date">
                  <i class="bi bi-clock me-1"></i><?= date('d M Y', strtotime($row['date'])); ?>
                </span>
              </div>
              <h3 class="news-card-title"><?= htmlspecialchars($row['title']); ?></h3>
              <p class="news-card-excerpt"><?= htmlspecialchars(substr($row['content'], 0, 150)); ?>...</p>
            </div>
            <div class="news-card-footer">
              <a href="detail.php?id=<?= $row['id']; ?>" class="btn-read">
                Baca Selengkapnya <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <div class="no-news">
        <i class="bi bi-inbox"></i>
        <h5 class="text-muted">Belum Ada Berita</h5>
        <p class="text-muted">Konten berita akan muncul di sini.</p>
      </div>
    <?php endif; ?>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer">
    &copy; <?= date('Y'); ?> <span>Portal.ID</span> — Sistem Informasi Berita
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
