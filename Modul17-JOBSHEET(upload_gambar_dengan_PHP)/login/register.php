<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Portal Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #1a1a2e;
      --accent: #e63946;
      --light-bg: #f8f5f0;
      --text-muted-custom: #6c757d;
    }
    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--light-bg);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }
    body::before {
      content: '';
      position: fixed;
      top: -50%; left: -50%;
      width: 200%; height: 200%;
      background: radial-gradient(ellipse at 80% 20%, rgba(230,57,70,0.08) 0%, transparent 50%),
                  radial-gradient(ellipse at 20% 80%, rgba(26,26,46,0.06) 0%, transparent 50%);
      z-index: 0;
    }
    .register-wrapper {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 440px;
      padding: 1rem;
    }
    .brand-header {
      text-align: center;
      margin-bottom: 2rem;
    }
    .brand-name {
      font-family: 'Playfair Display', serif;
      font-size: 2.4rem;
      font-weight: 900;
      color: var(--primary);
      letter-spacing: -1px;
      line-height: 1;
    }
    .brand-name span { color: var(--accent); }
    .brand-tagline {
      font-size: 0.85rem;
      color: var(--text-muted-custom);
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-top: 0.3rem;
    }
    .register-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(26,26,46,0.12), 0 4px 20px rgba(26,26,46,0.06);
      padding: 2.5rem;
      border: 1px solid rgba(26,26,46,0.06);
    }
    .register-card h4 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--primary);
      font-size: 1.5rem;
      margin-bottom: 0.3rem;
    }
    .register-card .subtitle {
      color: var(--text-muted-custom);
      font-size: 0.9rem;
      margin-bottom: 2rem;
    }
    .form-label {
      font-weight: 600;
      font-size: 0.85rem;
      color: var(--primary);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.4rem;
    }
    .form-control {
      border: 2px solid #e9ecef;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      font-size: 0.95rem;
      transition: all 0.25s ease;
      background: #fdfdfd;
    }
    .form-control:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 4px rgba(230,57,70,0.1);
      background: #fff;
    }
    .input-group-text {
      border: 2px solid #e9ecef;
      border-right: none;
      border-radius: 10px 0 0 10px;
      background: #f8f9fa;
      color: var(--text-muted-custom);
    }
    .input-group .form-control {
      border-left: none;
      border-radius: 0 10px 10px 0;
    }
    .input-group:focus-within .input-group-text {
      border-color: var(--accent);
    }
    .level-badge {
      background: linear-gradient(135deg, #f8f5f0, #f0ece4);
      border: 2px dashed #dee2e6;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-muted-custom);
      font-size: 0.9rem;
    }
    .level-badge .badge {
      background: var(--primary);
      color: #fff;
      font-size: 0.75rem;
      padding: 0.3rem 0.6rem;
      border-radius: 6px;
    }
    .btn-register {
      background: var(--accent);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.85rem;
      font-size: 0.95rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }
    .btn-register:hover {
      background: #c1121f;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(230,57,70,0.35);
      color: #fff;
    }
    .decorative-line {
      width: 40px;
      height: 3px;
      background: var(--accent);
      margin: 0 auto 1.5rem;
      border-radius: 2px;
    }
    .login-link {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.9rem;
      color: var(--text-muted-custom);
    }
    .login-link a {
      color: var(--accent);
      font-weight: 600;
      text-decoration: none;
    }
    .login-link a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <div class="register-wrapper">
    <div class="brand-header">
      <div class="brand-name">PORTAL<span>.</span>ID</div>
      <div class="brand-tagline">Sistem Informasi Berita</div>
    </div>

    <div class="register-card">
      <h4>Buat Akun Baru</h4>
      <p class="subtitle">Isi data berikut untuk mendaftar</p>
      <div class="decorative-line"></div>

      <form method="post" action="proses_register.php">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" name="username" placeholder="Pilih username unik" required>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Buat password kuat" required>
          </div>
        </div>
        <div class="mb-4">
          <label class="form-label">Level Akses</label>
          <div class="level-badge">
            <i class="bi bi-shield-check"></i>
            <span>Akun baru akan didaftarkan sebagai</span>
            <span class="badge">User</span>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-register w-100">
          <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
        </button>
      </form>

      <div class="login-link">
        Sudah punya akun? <a href="login.php"><i class="bi bi-box-arrow-in-right me-1"></i>Masuk di sini</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
