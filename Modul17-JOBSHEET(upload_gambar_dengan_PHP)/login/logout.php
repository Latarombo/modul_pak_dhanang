<?php
session_start();
// hapus semua data session
session_unset();
// hancurkan session
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout - Portal Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    :root { --primary: #1a1a2e; --accent: #e63946; --light-bg: #f8f5f0; }
    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--light-bg);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .logout-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(26,26,46,0.12);
      padding: 3rem 2.5rem;
      text-align: center;
      max-width: 400px;
      width: 100%;
      border: 1px solid rgba(26,26,46,0.06);
    }
    .logout-icon {
      width: 70px; height: 70px;
      background: linear-gradient(135deg, #fff5f5, #ffe0e0);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 1.5rem;
      font-size: 2rem;
      color: var(--accent);
    }
    h4 {
      font-family: 'Playfair Display', serif;
      color: var(--primary);
      font-weight: 700;
    }
    .btn-login-back {
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.75rem 2rem;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      margin-top: 1rem;
      transition: all 0.3s;
    }
    .btn-login-back:hover {
      background: var(--accent);
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(230,57,70,0.3);
    }
  </style>
</head>
<body>
  <div class="logout-card">
    <div class="logout-icon"><i class="bi bi-door-open"></i></div>
    <h4>Anda Telah Logout</h4>
    <p class="text-muted">Sesi Anda telah berakhir. Terima kasih sudah menggunakan Portal Berita.</p>
    <a href="login.php" class="btn-login-back">
      <i class="bi bi-box-arrow-in-right me-2"></i>Login Kembali
    </a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
