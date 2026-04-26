<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #6a0dad; border-radius: 12px 12px 0 0 !important; }
        .btn-primary { background: #6a0dad; border-color: #6a0dad; }
        .btn-primary:hover { background: #570aab; border-color: #570aab; }
        .form-control:focus { border-color: #6a0dad; box-shadow: 0 0 0 0.2rem rgba(106,13,173,0.2); }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow" style="width: 400px;">
        <div class="card-header text-white text-center py-4">
            <i class="bi bi-person-lock fs-1 d-block mb-1"></i>
            <h4 class="mb-0 fw-semibold">Login Sistem</h4>
        </div>
        <div class="card-body p-4">

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php
                        $err = $_GET['error'];
                        if ($err === 'wrong_password') echo 'Password salah.';
                        elseif ($err === 'user_not_found') echo 'Username tidak ditemukan.';
                        else echo htmlspecialchars($err);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
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
                <button type="submit" name="login" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Login
                </button>
            </form>

            <hr class="my-3">
            <p class="text-center mb-0 text-muted" style="font-size:14px;">
                Belum punya akun? <a href="register.php" class="text-decoration-none" style="color:#6a0dad;">Daftar di sini</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
