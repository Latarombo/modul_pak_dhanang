<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Ekskul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Source+Sans+3:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest:      #2E4C18;
      --forest-dark: #1e3310;
      --lime:        #E1EF97;
      --cream:       #F5F2EC;
      --orange:      #FC702F;
      --border:      #E2DDD4;
    }
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--cream);
      min-height: 100vh;
      margin: 0;
    }

    .panel-left {
      background: var(--forest-dark);
      min-height: 100vh;
      position: relative;
      overflow: hidden;
      display: flex;
      align-items: center;
    }
    /* Subtle geometric accent */
    .panel-left::before {
      content: '';
      position: absolute;
      top: 0; right: 0;
      width: 1px;
      height: 100%;
      background: linear-gradient(to bottom, transparent, rgba(225,239,151,.3), transparent);
    }
    .panel-left::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0;
      width: 100%; height: 3px;
      background: var(--orange);
    }
    .brand-block { padding: 3rem 2.8rem; position: relative; z-index: 1; }
    .brand-rule {
      width: 36px; height: 2px;
      background: var(--orange);
      margin-bottom: 1.5rem;
    }
    .brand-eyebrow {
      font-size: .65rem;
      letter-spacing: .25em;
      text-transform: uppercase;
      color: rgba(225,239,151,.55);
      font-weight: 400;
      margin-bottom: .75rem;
      display: block;
    }
    .brand-title {
      font-family: 'Libre Baskerville', serif;
      font-size: 2.2rem;
      line-height: 1.2;
      color: #fff;
      margin: 0 0 1rem;
    }
    .brand-title span { color: var(--lime); }
    .brand-desc {
      font-size: .875rem;
      color: rgba(255,255,255,.45);
      line-height: 1.75;
      max-width: 260px;
      margin: 0;
    }
    /* Decorative large text */
    .brand-deco {
      position: absolute;
      bottom: 2.5rem; right: 2rem;
      font-family: 'Libre Baskerville', serif;
      font-size: 6rem;
      color: rgba(255,255,255,.03);
      font-weight: 700;
      line-height: 1;
      user-select: none;
      pointer-events: none;
    }

    .panel-right {
      min-height: 100vh;
      background: var(--cream);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-box { width: 100%; max-width: 400px; padding: 2rem 1.5rem; }
    .login-box h2 {
      font-family: 'Libre Baskerville', serif;
      font-size: 1.5rem;
      color: var(--forest);
      margin: 0 0 .3rem;
    }
    .login-box .sub { font-size: .82rem; color: #888; margin-bottom: 2rem; }

    .f-group { margin-bottom: 1.2rem; }
    .f-label {
      display: block;
      font-size: .67rem;
      font-weight: 600;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: #555;
      margin-bottom: .4rem;
    }
    .f-control {
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: .65rem 1rem;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .9rem;
      background: #fff;
      transition: border-color .18s, box-shadow .18s;
      width: 100%;
    }
    .f-control:focus {
      border-color: var(--forest);
      box-shadow: 0 0 0 3px rgba(46,76,24,.1);
      outline: none;
    }
    .btn-login {
      width: 100%;
      padding: .75rem;
      background: var(--forest);
      color: #fff;
      border: none;
      border-radius: 4px;
      font-family: 'Source Sans 3', sans-serif;
      font-size: .9rem;
      font-weight: 600;
      letter-spacing: .05em;
      cursor: pointer;
      transition: background .2s;
      margin-top: .5rem;
    }
    .btn-login:hover { background: #3d6420; }
    .register-note {
      text-align: center;
      font-size: .82rem;
      color: #999;
      margin-top: 1.5rem;
    }
    .register-note a {
      color: var(--orange);
      text-decoration: none;
      font-weight: 500;
    }
    .register-note a:hover { text-decoration: underline; }

    /* Thin top accent bar */
    .accent-bar {
      height: 3px;
      background: linear-gradient(to right, var(--forest), var(--orange));
      margin-bottom: 2rem;
      border-radius: 2px;
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="row g-0">
      <div class="col-lg-5 panel-left">
        <div class="brand-block">
          <div class="brand-rule"></div>
          <span class="brand-eyebrow">Sistem Informasi</span>
          <h1 class="brand-title">Pendaftaran<br><span>Ekstrakurikuler</span></h1>
          <p class="brand-desc">Platform pengelolaan pendaftaran ekstrakurikuler siswa secara digital, terstruktur, dan efisien.</p>
        </div>
        <span class="brand-deco">E</span>
      </div>

      <div class="col-lg-7 panel-right">
        <div class="login-box">
          <div class="accent-bar"></div>
          <h2>Selamat Datang</h2>
          <p class="sub">Masuk ke akun Anda untuk melanjutkan</p>

          <form method="post" action="proses_login.php">
            <div class="f-group">
              <label class="f-label">Username</label>
              <input type="text" name="username" class="f-control" placeholder="Masukkan username" required>
            </div>
            <div class="f-group">
              <label class="f-label">Password</label>
              <input type="password" name="password" class="f-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" name="login" class="btn-login">Masuk</button>
          </form>

          <p class="register-note">
            Belum punya akun? <a href="register.php">Daftar di sini</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
