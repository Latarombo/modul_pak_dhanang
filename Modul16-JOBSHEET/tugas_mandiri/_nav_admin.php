<?php
// $base harus di-set sebelum include file ini
// Contoh: dari admin.php      → $base = "./";
//         dari CRUD_*/        → $base = "../";
if (!isset($base)) $base = "../";
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?= $base ?>admin.php">
      <i class="bi bi-award-fill me-2"></i>Ekskul
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAdmin">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navAdmin">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= $base ?>admin.php">
            <i class="bi bi-speedometer2 me-1"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base ?>admin.php#siswa">
            <i class="bi bi-people me-1"></i>Data Siswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $base ?>admin.php#user">
            <i class="bi bi-person-gear me-1"></i>Manajemen User
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']) ?>
            <span class="badge bg-warning text-dark ms-1">Admin</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item text-danger" href="<?= $base ?>../login_level/logout.php">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
