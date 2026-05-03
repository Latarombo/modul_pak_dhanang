<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Ekskul</title>
</head>
<body>

<h1>Pendaftaran Ekstrakurikuler</h1>
<h2>Login</h2>

<form method="post" action="proses_login.php">
  <p>
    <label>Username:<br>
    <input type="text" name="username" required></label>
  </p>
  <p>
    <label>Password:<br>
    <input type="password" name="password" required></label>
  </p>
  <p>
    <button type="submit" name="login">Masuk</button>
  </p>
</form>

<p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

</body>
</html>
