<?php
$level_akses = "admin";
include '../login_level/koneksi.php';
include "../login_level/cek.php";
if (!isset($_GET['nis'])) {
  echo "NIS tidak valid!";
  exit;
}
$nis = $_GET['nis'];
$data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis='$nis'");
$d = mysqli_fetch_array($data);
?>

<form action="proses_update.php" method="POST">
  <input type="hidden" name="nis" value="<?= $d['nis']; ?>">

  Nama: <input type="text" name="nama" value="<?= $d['nama']; ?>"><br><br>

  Kelas:
  <select name="kelas">
<option value="X" <?= $d['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
<option value="XI" <?= $d['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
<option value="XII" <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
  </select><br><br>

  Ekskul:
  <input type="text" name="ekskul" value="<?= $d['ekskul']; ?>"><br><br>

  <button type="submit">Update</button>
</form>