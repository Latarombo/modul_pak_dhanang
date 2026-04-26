<?php
include 'koneksi.php';
$nis = $_GET['nis'];
$data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis='$nis'");
$d = mysqli_fetch_array($data);
?>

<form action="proses_update.php" method="POST">
  <input type="hidden" name="nis" value="<?= $d['nis']; ?>">

  Nama: <input type="text" name="nama" value="<?= $d['nama']; ?>"><br><br>

  Kelas:
  <select name="kelas">
    <option <?= $d['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
    <option <?= $d['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
    <option <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
  </select><br><br>

  Ekskul:
  <input type="text" name="ekskul" value="<?= $d['ekskul']; ?>"><br><br>

  <button type="submit">Update</button>
</form>