<?php
include 'cek.php';

// Ambil data
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];

// Gabung tanggal
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$ttl = $thn . "-" . $bln . "-" . $tgl;

// Hobi
$hobi = isset($_POST['hobi']) ? implode(",", $_POST['hobi']) : "";

// Ekskul multiple
$ekskul = implode(",", $_POST['ekskul']);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Hasil Biodata</title>
</head>

<body>
  <h2>Hasil Pendaftaran Anda</h2>

  <table border="1" cellpadding="5">
    <tr>
      <td>NIS</td>
      <td><?= $nis ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><?= $nama ?></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td><?= $kelas ?></td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td><?= $ttl ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $alamat ?></td>
    </tr>
    <tr>
      <td>Kota</td>
      <td><?= $kota ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><?= $jk == "L" ? "Laki-Laki" : "Perempuan" ?></td>
    </tr>
    <tr>
      <td>Hobi</td>
      <td><?= $hobi ?></td>
    </tr>
    <tr>
      <td>Ekskul</td>
      <td><?= $ekskul ?></td>
    </tr>
  </table>

  <br>
  <a href="logout.php">Logout</a>

</body>

</html>