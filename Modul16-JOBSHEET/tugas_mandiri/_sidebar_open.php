<!-- _sidebar_open.php — include at top of every admin/user page -->
<?php
$username = htmlspecialchars($_SESSION['username'] ?? 'Admin');
$level    = $_SESSION['level'] ?? 'admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($page_title ?? 'Dashboard') ?> — Ekskul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Source+Sans+3:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest:       #2E4C18;
      --forest-dark:  #1e3310;
      --forest-mid:   #3d6420;
      --lime:         #E1EF97;
      --lime-dim:     rgba(225,239,151,.15);
      --orange:       #FC702F;
      --orange-dim:   rgba(252,112,47,.12);
      --cream:        #F5F2EC;
      --border:       #E2DDD4;
      --text:         #1A1A1A;
      --text-muted:   #7A7469;
      --sidebar-w:    220px;
      --sidebar-collapsed: 56px;
      --topbar-h:     56px;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--cream);
      margin: 0;
      color: var(--text);
    }

    /* ── SIDEBAR ── */
    .sidebar {
      width: var(--sidebar-w);
      min-height: 100vh;
      background: var(--forest-dark);
      position: fixed;
      top: 0; left: 0;
      display: flex;
      flex-direction: column;
      z-index: 200;
      transition: width .22s cubic-bezier(.4,0,.2,1);
      overflow: hidden;
    }

    body.sidebar-collapsed .sidebar {
      width: var(--sidebar-collapsed);
    }

    /* Brand */
    .sb-brand {
      padding: 0 0 0 0;
      height: var(--topbar-h);
      display: flex;
      align-items: center;
      border-bottom: 1px solid rgba(255,255,255,.06);
      flex-shrink: 0;
      overflow: hidden;
      white-space: nowrap;
    }
    .sb-brand-text {
      padding-left: 1.1rem;
      display: flex;
      flex-direction: column;
      gap: 1px;
    }
    .sb-eyebrow {
      font-size: .58rem;
      letter-spacing: .22em;
      text-transform: uppercase;
      color: rgba(225,239,151,.5);
      font-weight: 400;
    }
    .sb-name {
      font-family: 'Libre Baskerville', serif;
      font-size: .95rem;
      color: #fff;
      font-weight: 700;
      letter-spacing: .01em;
    }
    .sb-name span { color: var(--lime); }

    /* Toggle button */
    .sb-toggle {
      width: var(--sidebar-collapsed);
      height: var(--topbar-h);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
    }
    .sb-toggle:focus { outline: none; }
    .sb-toggle-bars {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    .sb-toggle-bars span {
      display: block;
      height: 2px;
      background: rgba(255,255,255,.55);
      border-radius: 2px;
      transition: width .2s, background .2s;
    }
    .sb-toggle-bars span:nth-child(1) { width: 18px; }
    .sb-toggle-bars span:nth-child(2) { width: 12px; }
    .sb-toggle-bars span:nth-child(3) { width: 18px; }
    .sb-toggle:hover .sb-toggle-bars span { background: var(--lime); }

    /* Nav */
    .sb-nav { flex: 1; padding: 1rem 0; overflow: hidden; }

    .sb-section {
      font-size: .58rem;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: rgba(255,255,255,.25);
      padding: .9rem 1.1rem .35rem;
      white-space: nowrap;
      overflow: hidden;
    }
    body.sidebar-collapsed .sb-section { visibility: hidden; }

    .sb-link {
      display: flex;
      align-items: center;
      gap: .75rem;
      padding: .6rem 1.1rem;
      font-size: .82rem;
      color: rgba(255,255,255,.6);
      text-decoration: none;
      white-space: nowrap;
      border-left: 3px solid transparent;
      transition: background .15s, color .15s, border-color .15s;
      overflow: hidden;
    }
    .sb-link:hover { background: rgba(255,255,255,.05); color: rgba(255,255,255,.9); }
    .sb-link.active {
      border-left-color: var(--lime);
      background: var(--lime-dim);
      color: var(--lime);
      font-weight: 600;
    }
    .sb-dot {
      width: 7px; height: 7px;
      border-radius: 50%;
      background: rgba(255,255,255,.25);
      flex-shrink: 0;
    }
    .sb-link.active .sb-dot { background: var(--lime); }
    .sb-link-label { overflow: hidden; }

    /* Footer */
    .sb-footer {
      border-top: 1px solid rgba(255,255,255,.06);
      padding: .85rem 1.1rem;
      white-space: nowrap;
      overflow: hidden;
      flex-shrink: 0;
    }
    .sb-user {
      display: flex;
      align-items: center;
      gap: .65rem;
      margin-bottom: .7rem;
    }
    .sb-avatar {
      width: 30px; height: 30px;
      border-radius: 4px;
      background: var(--lime);
      color: var(--forest-dark);
      display: flex; align-items: center; justify-content: center;
      font-family: 'Libre Baskerville', serif;
      font-weight: 700;
      font-size: .78rem;
      flex-shrink: 0;
    }
    .sb-user-name { font-size: .8rem; color: #fff; font-weight: 500; }
    .sb-user-role { font-size: .65rem; color: rgba(255,255,255,.35); text-transform: capitalize; }
    .sb-logout {
      display: block;
      padding: .42rem .8rem;
      background: rgba(252,112,47,.1);
      border: 1px solid rgba(252,112,47,.25);
      border-radius: 4px;
      color: var(--orange);
      font-size: .75rem;
      text-align: center;
      text-decoration: none;
      font-weight: 500;
      letter-spacing: .04em;
      transition: background .2s;
    }
    .sb-logout:hover { background: rgba(252,112,47,.22); color: var(--orange); }

    /* ── MAIN WRAP ── */
    .main-wrap {
      margin-left: var(--sidebar-w);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      transition: margin-left .22s cubic-bezier(.4,0,.2,1);
    }
    body.sidebar-collapsed .main-wrap {
      margin-left: var(--sidebar-collapsed);
    }

    /* ── TOPBAR ── */
    .topbar {
      height: var(--topbar-h);
      background: #fff;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1.75rem;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .topbar-left { display: flex; flex-direction: column; gap: 1px; }
    .topbar-title {
      font-family: 'Libre Baskerville', serif;
      font-size: 1.05rem;
      color: var(--forest);
      font-weight: 700;
      line-height: 1;
    }
    .topbar-breadcrumb {
      font-size: .72rem;
      color: var(--text-muted);
      letter-spacing: .02em;
    }
    .topbar-right {
      display: flex;
      align-items: center;
      gap: .5rem;
    }
    .topbar-badge {
      padding: .25rem .65rem;
      border-radius: 3px;
      font-size: .7rem;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
    }
    .topbar-badge.admin { background: rgba(46,76,24,.1); color: var(--forest); }
    .topbar-badge.user  { background: var(--orange-dim); color: var(--orange); }

    /* ── PAGE BODY ── */
    .page-body { padding: 1.75rem; flex: 1; }

    /* ── SHARED COMPONENTS (used by child pages) ── */
    .stat-card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 1.25rem 1.5rem;
    }
    .stat-label {
      font-size: .65rem;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: .4rem;
      font-weight: 600;
    }
    .stat-value {
      font-family: 'Libre Baskerville', serif;
      font-size: 2rem;
      color: var(--forest);
      font-weight: 700;
      line-height: 1;
    }
    .stat-card.accent { border-left: 3px solid var(--orange); }

    .section-card {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 6px;
      overflow: hidden;
    }
    .section-card-header {
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      background: #fff;
    }
    .section-card-title {
      font-family: 'Libre Baskerville', serif;
      font-size: 1rem;
      color: var(--forest);
      font-weight: 700;
      margin: 0 0 .1rem;
    }
    .section-card-sub {
      font-size: .75rem;
      color: var(--text-muted);
      margin: 0;
    }

    .tbl { width: 100%; border-collapse: collapse; }
    .tbl thead th {
      font-size: .65rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--text-muted);
      font-weight: 600;
      padding: .7rem 1.25rem;
      background: #FAFAF8;
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }
    .tbl tbody tr { border-bottom: 1px solid #F0EDE6; }
    .tbl tbody tr:last-child { border-bottom: none; }
    .tbl tbody tr:hover { background: #FAFAF8; }
    .tbl tbody td { padding: .8rem 1.25rem; font-size: .875rem; vertical-align: middle; }

    .chip {
      display: inline-block;
      padding: .18rem .55rem;
      border-radius: 3px;
      font-size: .7rem;
      font-weight: 600;
      letter-spacing: .04em;
    }
    .chip-kelas  { background: var(--lime); color: var(--forest); }
    .chip-ekskul { background: #EFECE5; color: #5a5248; font-weight: 400; margin: 1px 2px; }
    .chip-admin  { background: rgba(46,76,24,.1); color: var(--forest); }
    .chip-user   { background: var(--orange-dim); color: var(--orange); }

    .btn-act {
      display: inline-block;
      padding: .28rem .75rem;
      border-radius: 3px;
      font-size: .75rem;
      font-weight: 500;
      text-decoration: none;
      border: 1px solid transparent;
      cursor: pointer;
      transition: background .15s, border-color .15s;
      font-family: 'Source Sans 3', sans-serif;
    }
    .btn-act-detail { background: #F0EDE6; color: #5a5248; border-color: #E2DDD4; }
    .btn-act-detail:hover { background: #E6E2D8; color: #3a3530; }
    .btn-act-edit   { background: rgba(46,76,24,.08); color: var(--forest); border-color: rgba(46,76,24,.2); }
    .btn-act-edit:hover { background: rgba(46,76,24,.16); color: var(--forest); }
    .btn-act-delete { background: rgba(185,28,28,.06); color: #b91c1c; border-color: rgba(185,28,28,.18); }
    .btn-act-delete:hover { background: rgba(185,28,28,.12); color: #b91c1c; }

    .btn-primary-act {
      padding: .42rem 1.1rem;
      background: var(--forest);
      color: #fff;
      border: none;
      border-radius: 4px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .8rem;
      font-weight: 600;
      letter-spacing: .04em;
      text-decoration: none;
      cursor: pointer;
      transition: background .2s;
      white-space: nowrap;
    }
    .btn-primary-act:hover { background: var(--forest-mid); color: #fff; }

    .mono { font-family: 'Courier New', monospace; font-size: .8rem; color: var(--text-muted); }

    /* Form styles for child pages */
    .form-wrap {
      background: #fff;
      border: 1px solid var(--border);
      border-radius: 6px;
      max-width: 740px;
      overflow: hidden;
    }
    .form-wrap-sm { max-width: 480px; }
    .form-head {
      padding: 1.25rem 1.75rem;
      border-bottom: 1px solid var(--border);
    }
    .form-head h2 {
      font-family: 'Libre Baskerville', serif;
      font-size: 1.05rem;
      color: var(--forest);
      margin: 0 0 .15rem;
    }
    .form-head p { font-size: .78rem; color: var(--text-muted); margin: 0; }
    .form-body { padding: 1.75rem; }

    .field-block { margin-bottom: 1.25rem; }
    .field-block:last-child { margin-bottom: 0; }
    .f-label {
      display: block;
      font-size: .68rem;
      font-weight: 600;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: #555;
      margin-bottom: .4rem;
    }
    .f-req { color: var(--orange); }
    .f-hint { font-size: .7rem; color: #bbb; margin-top: .3rem; }
    .f-static {
      font-size: .875rem;
      color: var(--text-muted);
      font-family: 'Courier New', monospace;
      padding: .6rem 1rem;
      background: #FAFAF8;
      border-radius: 4px;
      border: 1px solid var(--border);
    }

    .f-control {
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: .6rem 1rem;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .9rem;
      background: #fff;
      transition: border-color .18s, box-shadow .18s;
      width: 100%;
      color: var(--text);
    }
    .f-control:focus {
      border-color: var(--forest);
      box-shadow: 0 0 0 3px rgba(46,76,24,.08);
      outline: none;
    }
    textarea.f-control { resize: vertical; min-height: 88px; }

    .date-row { display: flex; gap: .5rem; align-items: center; }
    .date-row .f-control { flex: 1; }
    .date-sep { color: #ccc; font-size: 1rem; font-weight: 300; }

    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    @media (max-width: 560px) { .grid-2 { grid-template-columns: 1fr; } }

    .f-divider { border: none; border-top: 1px solid var(--border); margin: 1.5rem 0; }
    .f-section { font-size: .62rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; color: var(--text-muted); margin-bottom: 1.1rem; }

    .toggle-group { display: flex; flex-wrap: wrap; gap: .4rem; }
    .toggle-label {
      display: flex; align-items: center; gap: .4rem;
      background: #FAFAF8;
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: .42rem .85rem;
      font-size: .82rem;
      color: #555;
      cursor: pointer;
      transition: border-color .15s, background .15s;
      user-select: none;
    }
    .toggle-label:hover { border-color: #bbb; background: #F0EDE6; }
    .toggle-label input { width: 14px; height: 14px; accent-color: var(--forest); }
    .toggle-label:has(input:checked) {
      border-color: var(--forest);
      background: rgba(46,76,24,.07);
      color: var(--forest);
      font-weight: 600;
    }

    .select-multi {
      border: 1px solid var(--border);
      border-radius: 4px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .875rem;
      padding: .4rem;
      width: 100%;
      background: #fff;
    }
    .select-multi:focus {
      border-color: var(--forest);
      box-shadow: 0 0 0 3px rgba(46,76,24,.08);
      outline: none;
    }
    .select-multi option:checked { background: var(--forest); color: #fff; }

    .f-select {
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: .6rem 1rem;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .9rem;
      background: #fff;
      width: 100%;
      color: var(--text);
      transition: border-color .18s;
    }
    .f-select:focus { border-color: var(--forest); box-shadow: 0 0 0 3px rgba(46,76,24,.08); outline: none; }

    .btn-submit {
      padding: .6rem 1.6rem;
      background: var(--forest);
      color: #fff;
      border: none;
      border-radius: 4px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .875rem;
      font-weight: 600;
      cursor: pointer;
      letter-spacing: .04em;
      transition: background .2s;
    }
    .btn-submit:hover { background: var(--forest-mid); }
    .btn-cancel {
      padding: .6rem 1.2rem;
      background: transparent;
      color: var(--text-muted);
      border: 1px solid var(--border);
      border-radius: 4px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .875rem;
      text-decoration: none;
      cursor: pointer;
      transition: border-color .2s, color .2s;
    }
    .btn-cancel:hover { border-color: #bbb; color: var(--text); }

    .btn-back {
      display: inline-block;
      margin-bottom: 1.1rem;
      font-size: .8rem;
      color: var(--text-muted);
      text-decoration: none;
      letter-spacing: .02em;
      border-bottom: 1px solid transparent;
      transition: color .15s, border-color .15s;
    }
    .btn-back:hover { color: var(--forest); border-bottom-color: var(--forest); }

    /* Welcome banner for user */
    .welcome-banner {
      background: var(--forest-dark);
      border-radius: 6px;
      padding: 1.5rem 1.75rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      border-left: 4px solid var(--lime);
    }
    .welcome-banner h2 {
      font-family: 'Libre Baskerville', serif;
      font-size: 1.2rem;
      color: #fff;
      margin: 0 0 .25rem;
    }
    .welcome-banner h2 span { color: var(--lime); }
    .welcome-banner p { font-size: .82rem; color: rgba(255,255,255,.55); margin: 0; }

    /* Detail card */
    .detail-card { background: #fff; border: 1px solid var(--border); border-radius: 6px; max-width: 680px; overflow: hidden; }
    .detail-header { padding: 1.25rem 1.75rem; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 1rem; }
    .detail-avatar { width: 46px; height: 46px; border-radius: 5px; background: var(--lime); color: var(--forest-dark); display: flex; align-items: center; justify-content: center; font-family: 'Libre Baskerville', serif; font-size: 1.2rem; font-weight: 700; flex-shrink: 0; }
    .detail-header-info h2 { font-family: 'Libre Baskerville', serif; font-size: 1.05rem; color: var(--forest); margin: 0 0 .1rem; }
    .detail-header-info p { font-size: .78rem; color: var(--text-muted); margin: 0; }
    .detail-body { padding: 0 1.75rem; }
    .detail-row { display: flex; padding: .8rem 0; border-bottom: 1px solid #F0EDE6; gap: 1rem; }
    .detail-row:last-child { border-bottom: none; }
    .detail-key { width: 155px; flex-shrink: 0; font-size: .65rem; font-weight: 600; letter-spacing: .1em; text-transform: uppercase; color: var(--text-muted); padding-top: 3px; }
    .detail-val { font-size: .875rem; color: var(--text); flex: 1; }
    .detail-footer { padding: 1rem 1.75rem; background: #FAFAF8; border-top: 1px solid var(--border); display: flex; gap: .6rem; }
  </style>
</head>
<body>

<aside class="sidebar">
  <div class="sb-brand">
    <button class="sb-toggle" id="sidebarToggle" title="Toggle sidebar">
      <div class="sb-toggle-bars">
        <span></span><span></span><span></span>
      </div>
    </button>
    <div class="sb-brand-text">
      <span class="sb-eyebrow">Sistem</span>
      <span class="sb-name">Ekstra<span>kurikuler</span></span>
    </div>
  </div>

  <nav class="sb-nav">
    <p class="sb-section">Menu</p>
    <a href="<?= ($level === 'admin') ? '../admin/admin.php' : '../user/dashboard_user.php' ?>"
       class="sb-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">
      <span class="sb-dot"></span>
      <span class="sb-link-label">Dashboard</span>
    </a>

    <?php if ($level === 'admin'): ?>
    <p class="sb-section">Administrasi</p>
    <a href="../admin/admin.php#siswa"
       class="sb-link <?= ($active ?? '') === 'siswa' ? 'active' : '' ?>">
      <span class="sb-dot"></span>
      <span class="sb-link-label">Data Siswa</span>
    </a>
    <a href="../admin/admin.php#user"
       class="sb-link <?= ($active ?? '') === 'user' ? 'active' : '' ?>">
      <span class="sb-dot"></span>
      <span class="sb-link-label">Manajemen User</span>
    </a>
    <?php endif; ?>

    <?php if ($level === 'user'): ?>
    <p class="sb-section">Aksi</p>
    <a href="../user/user.php"
       class="sb-link <?= ($active ?? '') === 'daftar' ? 'active' : '' ?>">
      <span class="sb-dot"></span>
      <span class="sb-link-label">Daftar Ekskul</span>
    </a>
    <?php endif; ?>
  </nav>

  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar"><?= strtoupper(substr($username, 0, 1)) ?></div>
      <div>
        <div class="sb-user-name"><?= $username ?></div>
        <div class="sb-user-role"><?= ucfirst($level) ?></div>
      </div>
    </div>
    <a href="../login_level/logout.php" class="sb-logout">Keluar</a>
  </div>
</aside>

<div class="main-wrap">
  <div class="topbar">
    <div class="topbar-left">
      <span class="topbar-title"><?= htmlspecialchars($page_title ?? 'Dashboard') ?></span>
      <span class="topbar-breadcrumb"><?= $username ?> &rsaquo; <?= ucfirst($level) ?></span>
    </div>
    <div class="topbar-right">
      <span class="topbar-badge <?= $level ?>"><?= ucfirst($level) ?></span>
    </div>
  </div>
  <div class="page-body">
<!-- PAGE CONTENT START -->

<script>
  // Sidebar collapse — runs immediately to avoid layout flash
  (function(){
    var collapsed = localStorage.getItem('sb') === '1';
    if(collapsed) document.body.classList.add('sidebar-collapsed');
    document.addEventListener('DOMContentLoaded', function(){
      document.getElementById('sidebarToggle').addEventListener('click', function(){
        document.body.classList.toggle('sidebar-collapsed');
        localStorage.setItem('sb', document.body.classList.contains('sidebar-collapsed') ? '1' : '0');
      });
    });
  })();
</script>
