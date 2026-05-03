<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register — Ekskul</title>
</head>
<body>

<h1>Daftar Akun Baru</h1>

<form method="post" action="proses_register.php">
  <p>
    <label>Username:<br>
    <input type="text" name="username" required></label>
  </p>
  <p>
    <label>Password:<br>
    <input type="password" name="password" required></label>
  </p>
  <p>
    <button type="submit" name="submit">Buat Akun</button>
  </p>
</form>

<p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>

</body>
</html>
