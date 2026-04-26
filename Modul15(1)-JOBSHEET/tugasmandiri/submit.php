<?php
session_start();

$namauser = $_POST['username'];
$password = $_POST['password'];

if ('login sukses') {
  $_SESSION['namauser'] = $namauser;

  echo "<p>Selamat datang <b>" . $_SESSION['namauser'] . "</b></p>";
  echo "<p>Berikut ini menu navigasi Anda</p>";
  echo "<p><a href='biodata_siswa_rpl.php'>Pergi ke halaman biodata</a><br>";
}
?>