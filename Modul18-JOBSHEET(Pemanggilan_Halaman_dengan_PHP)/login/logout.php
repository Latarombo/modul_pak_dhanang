<?php
session_start();
session_unset();
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
</head>

<body class="bg-light min-vh-100 d-flex align-items-center justify-content-center">

  <div class="card border-0 shadow-sm text-center" style="max-width: 380px; width: 100%;">
    <div class="card-body p-5">
      <div class="bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
        style="width:70px;height:70px;">
        <i class="bi bi-door-open text-danger fs-2"></i>
      </div>
      <h5 class="fw-bold">Anda Telah Logout</h5>
      <p class="text-muted small">Sesi Anda telah berakhir. Terima kasih sudah menggunakan Portal Berita.</p>
      <a href="login.php" class="btn btn-dark fw-semibold mt-2">
        <i class="bi bi-box-arrow-in-right me-2"></i>Login Kembali
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>