<!DOCTYPE html>
<html lang="id">
<head>
  <title>Register — Ekskul</title>
  <?php include '../_head_common.php'; ?>
  <style>
    body { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
  </style>
</head>
<body>

<div class="card p-4" style="width:100%;max-width:420px;">
  <div class="text-center mb-4">
    <span class="display-4 text-primary"><i class="bi bi-award-fill"></i></span>
    <h1 class="h4 fw-bold mt-2 mb-0">Buat Akun Baru</h1>
    <p class="text-muted small">Daftar untuk mulai mendaftar ekskul</p>
  </div>

  <?php if (isset($_GET['error'])): ?>
    <?php if ($_GET['error'] === 'exists'): ?>
    <div class="alert alert-danger py-2"><i class="bi bi-x-circle me-2"></i>Username sudah digunakan!</div>
    <?php else: ?>
    <div class="alert alert-danger py-2"><i class="bi bi-x-circle me-2"></i>Registrasi gagal, coba lagi.</div>
    <?php endif; ?>
  <?php endif; ?>

  <form method="post" action="proses_register.php">
    <div class="mb-3">
      <label class="form-label fw-semibold">Username</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" name="username" class="form-control" placeholder="Buat username" required>
      </div>
    </div>
    <div class="mb-4">
      <label class="form-label fw-semibold">Password</label>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="Buat password" required>
      </div>
    </div>
    <button type="submit" name="submit" class="btn btn-success w-100 fw-semibold">
      <i class="bi bi-person-plus me-2"></i>Buat Akun
    </button>
  </form>

  <hr class="my-3">
  <p class="text-center text-muted small mb-0">
    Sudah punya akun? <a href="login.php" class="text-primary fw-semibold">Masuk di sini</a>
  </p>
</div>

<?php include '../_scripts.php'; ?>
</body>
</html>
