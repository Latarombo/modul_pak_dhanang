<!-- _sidebar.php — include at top of every admin/user page -->
<!-- Usage:
  $page_title = "Dashboard";
  $active = "dashboard"; // dashboard | siswa | user
  include '../_sidebar.php';
-->
<?php
// $page_title, $active, $username must be set before including
$username  = htmlspecialchars($_SESSION['username'] ?? 'Admin');
$level     = $_SESSION['level'] ?? 'admin';
$nav_items = [
  'dashboard' => ['label' => 'Dashboard',   'href' => ($level === 'admin') ? '../admin/admin.php' : '../user/dashboard_user.php'],
  'siswa'     => ['label' => 'Data Siswa',  'href' => '../admin/admin.php#siswa'],
  'user'      => ['label' => 'Manajemen User', 'href' => '../admin/admin.php#user'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $page_title ?? 'Dashboard' ?> — Ekskul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest:  #2E4C18;
      --lime:    #E1EF97;
      --cream:   #FFEBD2;
      --orange:  #FC702F;
      --sidebar-w: 240px;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      background: #F7F4EE;
      font-family: 'DM Sans', sans-serif;
      display: flex;
    }

    /* ── SIDEBAR ── */
    .sidebar {
      width: var(--sidebar-w);
      min-height: 100vh;
      background: var(--forest);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0; left: 0;
      z-index: 100;
    }
    .sidebar-brand {
      padding: 2rem 1.5rem 1.5rem;
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .sidebar-brand .eyebrow {
      font-size: .65rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: rgba(225,239,151,.6);
      font-weight: 400;
      margin-bottom: .35rem;
    }
    .sidebar-brand .brand-name {
      font-family: 'Playfair Display', serif;
      font-size: 1.25rem;
      color: #fff;
      line-height: 1.2;
    }
    .sidebar-brand .brand-name span { color: var(--lime); }

    .sidebar-nav { flex: 1; padding: 1.5rem 0; }
    .nav-section-label {
      font-size: .6rem;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: rgba(255,255,255,.3);
      padding: 0 1.5rem;
      margin-bottom: .6rem;
      margin-top: 1rem;
    }
    .nav-item-link {
      display: flex;
      align-items: center;
      gap: .7rem;
      padding: .65rem 1.5rem;
      font-size: .875rem;
      color: rgba(255,255,255,.65);
      text-decoration: none;
      transition: background .15s, color .15s;
      border-left: 3px solid transparent;
    }
    .nav-item-link:hover {
      background: rgba(255,255,255,.06);
      color: #fff;
    }
    .nav-item-link.active {
      border-left-color: var(--lime);
      background: rgba(225,239,151,.1);
      color: var(--lime);
      font-weight: 500;
    }
    .nav-item-link .arrow { margin-left: auto; font-size: .8rem; opacity: .5; }
    .nav-item-link.active .arrow { opacity: 1; }

    .sidebar-footer {
      padding: 1.2rem 1.5rem;
      border-top: 1px solid rgba(255,255,255,.08);
    }
    .user-chip {
      display: flex;
      align-items: center;
      gap: .75rem;
      margin-bottom: .9rem;
    }
    .user-avatar {
      width: 34px; height: 34px;
      border-radius: 50%;
      background: var(--lime);
      color: var(--forest);
      display: flex; align-items: center; justify-content: center;
      font-weight: 700;
      font-size: .85rem;
      flex-shrink: 0;
    }
    .user-info .name {
      font-size: .82rem;
      color: #fff;
      font-weight: 500;
    }
    .user-info .role {
      font-size: .7rem;
      color: rgba(255,255,255,.4);
      text-transform: capitalize;
    }
    .btn-logout {
      display: block;
      width: 100%;
      padding: .5rem .8rem;
      background: rgba(252,112,47,.15);
      border: 1px solid rgba(252,112,47,.3);
      border-radius: 6px;
      color: #FC702F;
      font-family: 'DM Sans', sans-serif;
      font-size: .8rem;
      text-align: center;
      text-decoration: none;
      transition: background .2s;
    }
    .btn-logout:hover { background: rgba(252,112,47,.28); color: #FC702F; }

    /* ── MAIN CONTENT ── */
    .main-wrap {
      margin-left: var(--sidebar-w);
      flex: 1;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .topbar {
      background: #fff;
      border-bottom: 1px solid #ece8e0;
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .topbar-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.3rem;
      color: var(--forest);
    }
    .topbar-breadcrumb {
      font-size: .78rem;
      color: #aaa;
    }
    .page-body {
      padding: 2rem;
      flex: 1;
    }
  </style>
</head>
<body>

<aside class="sidebar">
  <div class="sidebar-brand">
    <p class="eyebrow">Sistem</p>
    <div class="brand-name">Ekstra<span>kurikuler</span></div>
  </div>

  <nav class="sidebar-nav">
    <p class="nav-section-label">Menu Utama</p>
    <a href="<?= ($level === 'admin') ? '../admin/admin.php' : '../user/dashboard_user.php' ?>"
       class="nav-item-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">
      Dashboard <span class="arrow">&rsaquo;</span>
    </a>

    <?php if ($level === 'admin'): ?>
    <p class="nav-section-label">Administrasi</p>
    <a href="../admin/admin.php#siswa"
       class="nav-item-link <?= ($active ?? '') === 'siswa' ? 'active' : '' ?>">
      Data Siswa <span class="arrow">&rsaquo;</span>
    </a>
    <a href="../admin/admin.php#user"
       class="nav-item-link <?= ($active ?? '') === 'user' ? 'active' : '' ?>">
      Manajemen User <span class="arrow">&rsaquo;</span>
    </a>
    <?php endif; ?>

    <?php if ($level === 'user'): ?>
    <p class="nav-section-label">Aksi</p>
    <a href="../user/user.php" class="nav-item-link <?= ($active ?? '') === 'daftar' ? 'active' : '' ?>">
      Daftar Ekskul <span class="arrow">&rsaquo;</span>
    </a>
    <?php endif; ?>
  </nav>

  <div class="sidebar-footer">
    <div class="user-chip">
      <div class="user-avatar"><?= strtoupper(substr($username, 0, 1)) ?></div>
      <div class="user-info">
        <div class="name"><?= $username ?></div>
        <div class="role"><?= ucfirst($level) ?></div>
      </div>
    </div>
    <a href="../login_level/logout.php" class="btn-logout">Keluar &rarr;</a>
  </div>
</aside>

<div class="main-wrap">
  <div class="topbar">
    <span class="topbar-title"><?= $page_title ?? 'Dashboard' ?></span>
    <span class="topbar-breadcrumb"><?= $username ?> &rsaquo; <?= ucfirst($level) ?></span>
  </div>
  <div class="page-body">
