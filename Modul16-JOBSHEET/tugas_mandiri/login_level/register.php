<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register — Ekskul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest: #2E4C18;
      --lime: #E1EF97;
      --cream: #FFEBD2;
      --orange: #FC702F;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background-color: var(--cream);
      min-height: 100vh;
    }

    .panel-left {
      background-color: var(--forest);
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    .panel-left::before {
      content: '';
      position: absolute;
      top: -80px;
      right: -80px;
      width: 320px;
      height: 320px;
      border-radius: 50%;
      background: rgba(225, 239, 151, .08);
    }

    .brand-label {
      font-weight: 300;
      font-size: .75rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--lime);
    }

    .brand-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      line-height: 1.15;
      color: #fff;
    }

    .brand-title span {
      color: var(--lime);
    }

    .brand-desc {
      font-size: .9rem;
      color: rgba(255, 255, 255, .55);
      line-height: 1.7;
      max-width: 280px;
    }

    .deco-line {
      width: 40px;
      height: 3px;
      background: var(--orange);
    }

    .panel-right {
      background-color: var(--cream);
      min-height: 100vh;
    }

    .register-box h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--forest);
    }

    .form-label {
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #666;
    }

    .form-control {
      border: 1.5px solid #ddd;
      border-radius: 6px;
      font-family: 'DM Sans', sans-serif;
      font-size: .92rem;
    }

    .form-control:focus {
      border-color: var(--forest);
      box-shadow: 0 0 0 3px rgba(46, 76, 24, .1);
    }

    .btn-register {
      width: 100%;
      padding: .8rem;
      background: var(--orange);
      color: #fff;
      border: none;
      border-radius: 6px;
      font-family: 'DM Sans', sans-serif;
      font-size: .92rem;
      font-weight: 500;
      transition: background .2s, transform .15s;
    }

    .btn-register:hover {
      background: #e05a1f;
      color: #fff;
      transform: translateY(-1px);
    }

    .login-link {
      font-size: .85rem;
      color: #999;
    }

    .login-link a {
      color: var(--forest);
      text-decoration: none;
      font-weight: 500;
    }

    .login-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row g-0">

      <!-- Left Panel -->
      <div class="col-lg-5 panel-left d-flex align-items-center">
        <div class="p-5 position-relative" style="z-index:1">
          <p class="brand-label mb-3">Sistem Informasi</p>
          <h1 class="brand-title mb-3">Buat<br><span>Akun Baru</span></h1>
          <div class="deco-line my-4"></div>
          <p class="brand-desc">Daftarkan diri Anda untuk mengakses sistem pendaftaran ekstrakurikuler.</p>
        </div>
      </div>

      <!-- Right Panel -->
      <div class="col-lg-7 panel-right d-flex align-items-center justify-content-center">
        <div class="register-box w-100 px-4" style="max-width:400px">
          <h2 class="mb-1">Daftar Akun</h2>
          <p class="text-muted mb-4" style="font-size:.85rem">Isi data di bawah untuk membuat akun baru</p>

          <form method="post" action="proses_register.php">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Pilih username unik" required>
            </div>
            <div class="mb-4">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Buat password kuat" required>
            </div>
            <button type="submit" name="submit" class="btn btn-register">Buat Akun &rarr;</button>
          </form>

          <p class="login-link text-center mt-4">
            Sudah punya akun? <a href="login.php">Masuk di sini</a>
          </p>
        </div>
      </div>

    </div>
  </div>
</body>

</html>