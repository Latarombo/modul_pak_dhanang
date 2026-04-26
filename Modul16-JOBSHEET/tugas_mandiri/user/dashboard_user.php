<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard User</title>
</head>
<body>

<?php
$level_akses = "user";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
?>

<h2>Dashboard Halaman User</h2>
<p>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?></p>

<hr>

<h2>Data Siswa</h2>

<table border="1" cellpadding="10">
  <tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>JK</th>
    <th>Ekskul</th>
  </tr>

  <?php
  $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
  while ($d = mysqli_fetch_array($data)) {
  ?>
    <tr>
      <td><?= htmlspecialchars($d['nis']); ?></td>
      <td><?= htmlspecialchars($d['nama']); ?></td>
      <td><?= htmlspecialchars($d['kelas']); ?></td>
      <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
      <td><?= htmlspecialchars($d['ekskul']); ?></td>
    </tr>
  <?php } ?>
</table>

<br>
<a href="../login_level/logout.php">Logout</a>

</body>
</html>
