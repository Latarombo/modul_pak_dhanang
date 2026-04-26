<?php
if (isset($_POST['Kirim'])) {
  $nis       = $_POST['nis'];
  $nama      = $_POST['nama'];
  $kelas     = $_POST['kelas'];
  $tgl_lahir = $_POST['tgl'] . "/" . $_POST['bln'] . "/" . $_POST['thn'];
  $alamat    = $_POST['alamat'];
  $kota      = $_POST['kota'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $ekskul_arr    = $_POST['ekskul'];
  $hobby_arr     = isset($_POST['hobby']) ? $_POST['hobby'] : [];

  echo "<h2>Hasil Pendaftaran Ekstrakurikuler</h2>";
  echo "<hr>";
  echo "<b>NIS</b>           : $nis<br>";
  echo "<b>Nama</b>          : $nama<br>";
  echo "<b>Kelas</b>         : $kelas<br>";
  echo "<b>Tgl Lahir</b>     : $tgl_lahir<br>";
  echo "<b>Alamat</b>        : $alamat<br>";
  echo "<b>Kota</b>          : $kota<br>";
  echo "<b>Jenis Kelamin</b> : $jenis_kelamin<br>";

  echo "<b>Hobby</b>         : ";
  if (!empty($hobby_arr)) {
    foreach ($hobby_arr as $h) {
      echo $h . ", ";
    }
  } else {
    echo "-";
  }
  echo "<br>";

  echo "<b>Pilihan Ekskul</b>: ";
  foreach ($ekskul_arr as $e) {
    echo $e . ", ";
  }
  echo "<br>";

  echo "<hr>";
} else {
  header("Location: form_pendaftaran.php");
  exit();
}
?>