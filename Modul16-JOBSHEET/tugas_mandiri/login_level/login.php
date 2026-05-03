<!DOCTYPE html>
<html lang="id">
<head>
  <title>Login — Ekskul</title>
  <?php include '../_head_common.php'; ?>
  <style>
    body { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
  </style>
</head>
<body>

<div class="card p-4" style="width:100%;max-width:420px;">
  <div class="text-center mb-4">
    <span class="display-4 text-primary"><i class="bi bi-award-fill"></i></span>
    <h1 class="h4 fw-bold mt-2 mb-0">Pendaftaran Ekstrakurikuler</h1>
    <p class="text-muted small">Masuk ke akun Anda</p>
  </div>

  <?php if (isset($_GET['registered'])): ?>
  <div class="alert alert-success py-2"><i class="bi bi-check-circle me-2"></i>Registrasi berhasil! Silakan login.</div>
  <?php endif; ?>

  <?php if (isset($_GET['error'])): ?>
    <?php if ($_GET['error'] === 'password'): ?>
    <div class="alert alert-danger py-2"><i class="bi bi-x-circle me-2"></i>Password salah!</div>
    <?php elseif ($_GET['error'] === 'username'): ?>
    <div class="alert alert-danger py-2"><i class="bi bi-x-circle me-2"></i>Username tidak ditemukan!</div>
    <?php endif; ?>
  <?php endif; ?>

  <form method="post" action="proses_login.php">
    <div class="mb-3">
      <label class="form-label fw-semibold">Username</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
      </div>
    </div>
    <div class="mb-4">
      <label class="form-label fw-semibold">Password</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
      </div>
    </div>
    <button type="submit" name="login" class="btn btn-primary w-100 fw-semibold">
      <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
    </button>
  </form>

  <hr class="my-3">
  <p class="text-center text-muted small mb-0">
    Belum punya akun? <a href="register.php" class="text-primary fw-semibold">Daftar di sini</a>
  </p>
</div>

<?php include '../_scripts.php'; ?>
</body>
</html>
