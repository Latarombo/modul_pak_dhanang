<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Ekskul</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --forest:  #2E4C18;
      --lime:    #E1EF97;
      --cream:   #FFEBD2;
      --orange:  #FC702F;
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      margin: 0;
      min-height: 100vh;
      background-color: var(--cream);
      font-family: 'DM Sans', sans-serif;
      display: flex;
      align-items: stretch;
    }

    /* left panel */
    .panel-left {
      width: 45%;
      background-color: var(--forest);
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 4rem 3.5rem;
      position: relative;
      overflow: hidden;
    }
    .panel-left::before {
      content: '';
      position: absolute;
      top: -80px; right: -80px;
      width: 320px; height: 320px;
      border-radius: 50%;
      background: rgba(225,239,151,.08);
    }
    .panel-left::after {
      content: '';
      position: absolute;
      bottom: -60px; left: -60px;
      width: 240px; height: 240px;
      border-radius: 50%;
      background: rgba(252,112,47,.07);
    }
    .brand-label {
      font-family: 'DM Sans', sans-serif;
      font-weight: 300;
      font-size: .75rem;
      letter-spacing: .2em;
      text-transform: uppercase;
      color: var(--lime);
      margin-bottom: 1.2rem;
    }
    .brand-title {
      font-family: 'Playfair Display', serif;
      font-size: 2.8rem;
      line-height: 1.15;
      color: #fff;
      margin-bottom: 1.5rem;
    }
    .brand-title span { color: var(--lime); }
    .brand-desc {
      font-size: .9rem;
      color: rgba(255,255,255,.55);
      line-height: 1.7;
      max-width: 280px;
    }
    .deco-line {
      width: 40px;
      height: 3px;
      background: var(--orange);
      margin: 1.5rem 0;
    }

    /* right panel */
    .panel-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 3rem 2rem;
    }
    .login-box {
      width: 100%;
      max-width: 380px;
    }
    .login-box h2 {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--forest);
      margin-bottom: .3rem;
    }
    .login-box p.sub {
      font-size: .85rem;
      color: #888;
      margin-bottom: 2.2rem;
    }

    .form-label {
      font-size: .78rem;
      font-weight: 500;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #666;
      margin-bottom: .4rem;
    }
    .form-control {
      border: 1.5px solid #ddd;
      border-radius: 6px;
      padding: .7rem 1rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .92rem;
      background: #fff;
      transition: border-color .2s;
    }
    .form-control:focus {
      border-color: var(--forest);
      box-shadow: 0 0 0 3px rgba(46,76,24,.1);
    }

    .btn-login {
      width: 100%;
      padding: .8rem;
      background: var(--forest);
      color: #fff;
      border: none;
      border-radius: 6px;
      font-family: 'DM Sans', sans-serif;
      font-size: .92rem;
      font-weight: 500;
      letter-spacing: .04em;
      cursor: pointer;
      transition: background .2s, transform .15s;
      margin-top: .5rem;
    }
    .btn-login:hover { background: #3d6420; transform: translateY(-1px); }
    .btn-login:active { transform: translateY(0); }

    .register-link {
      display: block;
      text-align: center;
      margin-top: 1.4rem;
      font-size: .85rem;
      color: #999;
    }
    .register-link a { color: var(--orange); text-decoration: none; font-weight: 500; }
    .register-link a:hover { text-decoration: underline; }

    @media (max-width: 768px) {
      body { flex-direction: column; }
      .panel-left { width: 100%; padding: 2.5rem 2rem; min-height: 220px; }
      .brand-title { font-size: 2rem; }
      .panel-right { padding: 2rem 1.2rem; }
    }
  </style>
</head>
<body>

  <div class="panel-left">
    <p class="brand-label">Sistem Informasi</p>
    <h1 class="brand-title">Pendaftaran<br><span>Ekstra&shy;kurikuler</span></h1>
    <div class="deco-line"></div>
    <p class="brand-desc">Platform pengelolaan pendaftaran ekstrakulikuler siswa secara digital, cepat, dan terstruktur.</p>
  </div>

  <div class="panel-right">
    <div class="login-box">
      <h2>Selamat datang</h2>
      <p class="sub">Masuk ke akun Anda untuk melanjutkan</p>

      <form method="post" action="proses_login.php">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>
        <div class="mb-4">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>
        <button type="submit" name="login" class="btn-login">Masuk &rarr;</button>
      </form>

      <span class="register-link">Belum punya akun? <a href="register.php">Daftar di sini</a></span>
    </div>
  </div>

</body>
</html>
