<?php
if (isset($_POST['Login'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  if ($user == "smk4malang" && $pass == "123") {
    $_SESSION['login'] = true;
    header("Location: form_pendaftaran.php");
  } else {
    echo "<h2>Login Gagal</h2>";
    echo "<p>Username atau password salah.</p>";
    echo "<a href='form_login.php'>Kembali</a>";
  }
}
?>