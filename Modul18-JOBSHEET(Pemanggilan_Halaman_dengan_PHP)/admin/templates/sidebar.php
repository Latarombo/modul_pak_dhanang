<div class="sidebar">
  <h2>
    <i class="bi bi-shield-lock me-1"></i>Admin Panel
  </h2>

  <div style="padding: 8px 16px; font-size:0.75rem; color:#aaa; text-transform:uppercase; margin-top:8px;">
    Menu
  </div>

  <a href="index.php?page=dashboard"
    class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
    <i class="bi bi-speedometer2 me-2"></i>Dashboard
  </a>

  <a href="index.php?page=user"
    class="<?= ($page == 'user') ? 'active' : '' ?>">
    <i class="bi bi-people me-2"></i>Manajemen User
  </a>

  <a href="index.php?page=berita"
    class="<?= ($page == 'berita') ? 'active' : '' ?>">
    <i class="bi bi-newspaper me-2"></i>Manajemen Berita
  </a>

  <hr style="border-color:#34495e; margin: 8px 0;">

  <div style="padding: 8px 16px; font-size:0.75rem; color:#aaa; text-transform:uppercase;">
    Akun
  </div>

  <div style="padding: 8px 16px; font-size:0.8rem; color:#ccc;">
    <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']); ?>
    <span class="badge bg-danger ms-1" style="font-size:0.65rem;">Admin</span>
  </div>

  <a href="../login/logout.php" style="color:#e74c3c;">
    <i class="bi bi-box-arrow-left me-2"></i>Logout
  </a>
</div>
