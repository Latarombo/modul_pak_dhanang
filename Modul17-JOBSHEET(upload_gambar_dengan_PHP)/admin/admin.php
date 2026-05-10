<?php
$level_akses = "admin";
include "../login/cek.php";
include 'koneksi.php';
$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Data Berita</title>
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
    /* ── NAVBAR ── */
    .top-navbar {
      background: var(--primary);
      height: 64px;
      display: flex;
      align-items: center;
      padding: 0 1.5rem;
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 1030;
      box-shadow: 0 2px 20px rgba(0,0,0,0.25);
    }
    .navbar-brand-custom {
      font-family: 'Playfair Display', serif;
      font-weight: 900;
      font-size: 1.5rem;
      color: #fff;
      letter-spacing: -0.5px;
      text-decoration: none;
    }
    .navbar-brand-custom span { color: var(--accent); }
    .navbar-user {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    .user-avatar {
      width: 36px; height: 36px;
      background: var(--accent);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.9rem;
      color: #fff;
      font-weight: 700;
    }
    .user-name {
      color: rgba(255,255,255,0.85);
      font-size: 0.9rem;
      font-weight: 600;
    }
    .admin-badge {
      background: rgba(230,57,70,0.2);
      color: #ff8fa3;
      font-size: 0.7rem;
      padding: 0.15rem 0.5rem;
      border-radius: 20px;
      border: 1px solid rgba(230,57,70,0.3);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    /* ── SIDEBAR ── */
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
      box-shadow: 2px 0 20px rgba(0,0,0,0.04);
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
    .sidebar-section:first-child { margin-top: 0; }
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
    .sidebar-nav .nav-link:hover,
    .sidebar-nav .nav-link.active {
      background: linear-gradient(135deg, #fff5f5, #ffe8ea);
      color: var(--accent);
    }
    .sidebar-nav .nav-link i { font-size: 1.1rem; width: 20px; }
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
      margin-top: 0.5rem;
    }
    .btn-logout-side:hover {
      background: #fff5f5;
      color: #dc3545;
    }
    /* ── MAIN CONTENT ── */
    .main-content {
      margin-left: var(--sidebar-w);
      margin-top: 64px;
      padding: 2rem;
      min-height: calc(100vh - 64px);
    }
    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 2rem;
    }
    .page-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.8rem;
      color: var(--primary);
      margin: 0;
    }
    .page-subtitle {
      color: #6c757d;
      font-size: 0.9rem;
      margin: 0;
    }
    /* ── STATS CARDS ── */
    .stat-card {
      background: #fff;
      border-radius: 16px;
      padding: 1.5rem;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 12px rgba(0,0,0,0.04);
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    .stat-icon {
      width: 52px; height: 52px;
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem;
      flex-shrink: 0;
    }
    .stat-icon.red { background: linear-gradient(135deg, #fff5f5, #ffd0d4); color: var(--accent); }
    .stat-icon.blue { background: linear-gradient(135deg, #f0f4ff, #dce6ff); color: #4361ee; }
    .stat-icon.green { background: linear-gradient(135deg, #f0fff4, #d0f0dc); color: #2d6a4f; }
    .stat-value {
      font-size: 1.8rem;
      font-weight: 700;
      color: var(--primary);
      line-height: 1;
    }
    .stat-label {
      font-size: 0.82rem;
      color: #6c757d;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 600;
    }
    /* ── TABLE CARD ── */
    .table-card {
      background: #fff;
      border-radius: 16px;
      border: 1px solid #e9ecef;
      box-shadow: 0 2px 12px rgba(0,0,0,0.04);
      overflow: hidden;
    }
    .table-card-header {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .table-card-header h5 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--primary);
      margin: 0;
      font-size: 1.1rem;
    }
    .table thead th {
      background: #f8f9fa;
      color: #495057;
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      font-weight: 700;
      padding: 0.9rem 1rem;
      border-bottom: 2px solid #e9ecef;
      white-space: nowrap;
    }
    .table tbody td {
      padding: 1rem;
      vertical-align: middle;
      border-color: #f5f5f5;
      font-size: 0.9rem;
    }
    .table tbody tr:hover { background: #fafbfc; }
    .news-img {
      width: 70px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .news-img-placeholder {
      width: 70px;
      height: 50px;
      border-radius: 8px;
      background: #f0f0f0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #adb5bd;
      font-size: 1.2rem;
    }
    .content-preview {
      max-width: 220px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      color: #6c757d;
    }
    .author-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.3rem;
      background: #f0f4ff;
      color: #4361ee;
      padding: 0.2rem 0.6rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
    }
    .date-text {
      font-size: 0.82rem;
      color: #6c757d;
      white-space: nowrap;
    }
    .action-btns { display: flex; gap: 0.35rem; flex-wrap: nowrap; }
    .btn-action {
      border: none;
      border-radius: 8px;
      padding: 0.35rem 0.65rem;
      font-size: 0.8rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      white-space: nowrap;
    }
    .btn-detail { background: #f0f4ff; color: #4361ee; }
    .btn-detail:hover { background: #4361ee; color: #fff; transform: translateY(-1px); }
    .btn-edit { background: #fff8e6; color: #f4a261; }
    .btn-edit:hover { background: #f4a261; color: #fff; transform: translateY(-1px); }
    .btn-hapus { background: #fff5f5; color: var(--accent); }
    .btn-hapus:hover { background: var(--accent); color: #fff; transform: translateY(-1px); }
    .btn-tambah {
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.6rem 1.25rem;
      font-weight: 600;
      font-size: 0.9rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      transition: all 0.3s;
    }
    .btn-tambah:hover {
      background: var(--accent);
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 4px 15px rgba(230,57,70,0.3);
    }
    .no-data {
      text-align: center;
      padding: 3rem;
      color: #adb5bd;
    }
    .no-data i { font-size: 3rem; margin-bottom: 1rem; display: block; }
    .row-num {
      width: 32px; height: 32px;
      background: #f0f0f0;
      border-radius: 50%;
      display: inline-flex; align-items: center; justify-content: center;
      font-size: 0.82rem;
      font-weight: 700;
      color: #6c757d;
    }
    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main-content { margin-left: 0; padding: 1rem; }
    }
  </style>
</head>
<body>

  <!-- TOP NAVBAR -->
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

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-section">Menu Utama</div>
    <nav class="sidebar-nav">
      <a href="admin.php" class="nav-link active">
        <i class="bi bi-newspaper"></i> Manajemen Berita
      </a>
      <a href="form_upload.php" class="nav-link">
        <i class="bi bi-plus-circle"></i> Tambah Berita
      </a>
    </nav>
    <div class="sidebar-section">Akun</div>
    <nav class="sidebar-nav">
      <a href="../login/logout.php" class="btn-logout-side">
        <i class="bi bi-box-arrow-left"></i> Logout
      </a>
    </nav>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="main-content">
    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1 class="page-title">Manajemen Berita</h1>
        <p class="page-subtitle">Kelola seluruh konten berita di sini</p>
      </div>
      <a href="form_upload.php" class="btn-tambah">
        <i class="bi bi-plus-lg"></i> Tambah Berita
      </a>
    </div>

    <!-- Stats Row -->
    <?php
    $total_result = $conn->query("SELECT COUNT(*) as total FROM news");
    $total_row = $total_result->fetch_assoc();
    $total = $total_row['total'];

    $today_result = $conn->query("SELECT COUNT(*) as today FROM news WHERE DATE(date) = CURDATE()");
    $today_row = $today_result->fetch_assoc();
    $today = $today_row['today'];

    // Re-run main query
    $result = $conn->query("SELECT * FROM news ORDER BY id DESC");
    ?>
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="stat-card">
          <div class="stat-icon red"><i class="bi bi-newspaper"></i></div>
          <div>
            <div class="stat-value"><?= $total; ?></div>
            <div class="stat-label">Total Berita</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="bi bi-calendar-check"></i></div>
          <div>
            <div class="stat-value"><?= $today; ?></div>
            <div class="stat-label">Berita Hari Ini</div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="stat-card">
          <div class="stat-icon green"><i class="bi bi-person-check"></i></div>
          <div>
            <div class="stat-value"><?= htmlspecialchars($_SESSION['username']); ?></div>
            <div class="stat-label">Login Sebagai</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="table-card">
      <div class="table-card-header">
        <h5><i class="bi bi-list-ul me-2 text-danger"></i>Daftar Berita</h5>
        <span class="badge bg-secondary"><?= $total; ?> berita</span>
      </div>
      <div class="table-responsive">
        <table class="table mb-0">
          <thead>
            <tr>
              <th style="width:50px">No</th>
              <th>Judul</th>
              <th>Konten</th>
              <th>Author</th>
              <th>Gambar</th>
              <th>Tanggal</th>
              <th style="width:160px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            if ($result && $result->num_rows > 0):
              while ($row = $result->fetch_assoc()):
            ?>
            <tr>
              <td><span class="row-num"><?= $no++; ?></span></td>
              <td>
                <div class="fw-semibold text-dark" style="max-width:180px;"><?= htmlspecialchars($row['title']); ?></div>
              </td>
              <td>
                <div class="content-preview"><?= htmlspecialchars(substr($row['content'], 0, 80)); ?>...</div>
              </td>
              <td>
                <span class="author-badge">
                  <i class="bi bi-person-fill"></i>
                  <?= htmlspecialchars($row['author']); ?>
                </span>
              </td>
              <td>
                <?php if (!empty($row['image'])): ?>
                  <img src="upload/<?= htmlspecialchars($row['image']); ?>" class="news-img" alt="Gambar">
                <?php else: ?>
                  <div class="news-img-placeholder"><i class="bi bi-image"></i></div>
                <?php endif; ?>
              </td>
              <td>
                <div class="date-text"><i class="bi bi-clock me-1"></i><?= $row['date']; ?></div>
              </td>
              <td>
                <div class="action-btns">
                  <a href="detail.php?id=<?= $row['id']; ?>" class="btn-action btn-detail" title="Detail">
                    <i class="bi bi-eye"></i>
                  </a>
                  <a href="edit.php?id=<?= $row['id']; ?>" class="btn-action btn-edit" title="Edit">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <a href="delete.php?id=<?= $row['id']; ?>"
                     class="btn-action btn-hapus"
                     title="Hapus"
                     onclick="return confirm('Yakin ingin menghapus berita ini?')">
                    <i class="bi bi-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
            <?php
              endwhile;
            else:
            ?>
            <tr>
              <td colspan="7">
                <div class="no-data">
                  <i class="bi bi-inbox"></i>
                  <p>Belum ada berita. <a href="form_upload.php">Tambah berita pertama Anda!</a></p>
                </div>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
