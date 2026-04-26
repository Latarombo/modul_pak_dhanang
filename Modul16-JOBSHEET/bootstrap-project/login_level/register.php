<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #6a0dad; border-radius: 12px 12px 0 0 !important; }
        .btn-purple { background: #6a0dad; border-color: #6a0dad; color: #fff; }
        .btn-purple:hover { background: #570aab; border-color: #570aab; color: #fff; }
        .form-control:focus { border-color: #6a0dad; box-shadow: 0 0 0 0.2rem rgba(106,13,173,0.2); }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow" style="width: 420px;">
        <div class="card-header text-white text-center py-4">
            <i class="bi bi-person-plus-fill fs-1 d-block mb-1"></i>
            <h4 class="mb-0 fw-semibold">Form Register</h4>
        </div>
        <div class="card-body p-4">

            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] === 'success'): ?>
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        Register berhasil! <a href="login.php" class="alert-link">Login sekarang</a>
                    </div>
                <?php elseif ($_GET['status'] === 'exists'): ?>
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Username sudah digunakan, coba yang lain.
                    </div>
                <?php elseif ($_GET['status'] === 'failed'): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-x-circle-fill me-2"></i>
                        Register gagal. Pastikan password minimal 6 karakter.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form method="post" action="proses_register.php">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autocomplete="username">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required minlength="6" autocomplete="new-password">
                    </div>
                    <div class="form-text">Password minimal 6 karakter.</div>
                </div>
                <button type="submit" name="submit" class="btn btn-purple w-100 py-2">
                    <i class="bi bi-person-check-fill me-2"></i>Daftar
                </button>
            </form>

            <hr class="my-3">
            <p class="text-center mb-0 text-muted" style="font-size:14px;">
                Sudah punya akun? <a href="login.php" class="text-decoration-none" style="color:#6a0dad;">Login di sini</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
