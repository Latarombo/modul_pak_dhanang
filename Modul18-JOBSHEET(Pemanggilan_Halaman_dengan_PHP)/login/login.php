<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Portal Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">

  <div class="w-100" style="max-width: 420px; padding: 1rem;">

    <!-- Brand -->
    <div class="text-center mb-4">
      <h2 class="fw-bold mb-1">Portal<span class="text-danger">.</span>ID</h2>
      <p class="text-muted small text-uppercase letter-spacing-2">Sistem Informasi Berita</p>
    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <h5 class="fw-bold mb-1">Selamat Datang</h5>
        <p class="text-muted small mb-4">Masuk ke akun Anda untuk melanjutkan</p>

        <form method="post" action="proses_login.php">
          <div class="mb-3">
            <label class="form-label fw-semibold small text-uppercase text-muted">Username</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="bi bi-person text-muted"></i></span>
              <input type="text" class="form-control" name="username"
                placeholder="Masukkan username" required>
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-semibold small text-uppercase text-muted">Password</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="bi bi-lock text-muted"></i></span>
              <input type="password" class="form-control" name="password"
                placeholder="Masukkan password" required>
            </div>
          </div>
          <button type="submit" name="login" class="btn btn-dark w-100 fw-semibold">
            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
          </button>
        </form>

        <hr class="my-4">
        <p class="text-center text-muted small mb-0">
          Belum punya akun?
          <a href="register.php" class="text-danger fw-semibold text-decoration-none">Daftar Sekarang</a>
        </p>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>