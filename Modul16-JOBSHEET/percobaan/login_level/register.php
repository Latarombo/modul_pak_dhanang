<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 380px;
        }

        h2 {
            margin-bottom: 24px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #6a0dad;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background: #6a0dad;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 8px;
        }

        .btn:hover {
            background: #570aab;
        }

        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #555;
        }

        .login-link a {
            color: #6a0dad;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .alert-error   { background: #ffe0e0; color: #c00; border: 1px solid #f5c6cb; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>

<body>
    <div class="card">
        <h2>Form Register</h2>

        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] === 'success'): ?>
                <div class="alert alert-success">Register berhasil! <a href="login.php">Login sekarang</a></div>
            <?php elseif ($_GET['status'] === 'exists'): ?>
                <div class="alert alert-error">Username sudah digunakan, coba yang lain.</div>
            <?php elseif ($_GET['status'] === 'failed'): ?>
                <div class="alert alert-error">Register gagal, coba lagi.</div>
            <?php endif; ?>
        <?php endif; ?>

        <form method="post" action="proses_register.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="new-password" minlength="6">
            </div>
            <button type="submit" name="submit" class="btn">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>

</html>
