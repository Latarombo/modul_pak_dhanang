<?php
$level_akses = "user";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

if ($_SESSION['sudah_daftar'] !== true) {
    header("Location: user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Ekskul</title>
</head>
<body>

<nav>
  Sistem Ekstrakurikuler |
  Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (User) |
  <a href="../login_level/logout.php">Logout</a>
</nav>
<hr>

<h1>Dashboard</h1>

<p>Halo, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>! Pendaftaran ekstrakurikuler kamu berhasil.</p>

<h2>Data Siswa Terdaftar</h2>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jenis Kelamin</th>
      <th>Ekskul</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
    while ($d = mysqli_fetch_array($data)):
    ?>
    <tr>
      <td><?= htmlspecialchars($d['nis']) ?></td>
      <td><?= htmlspecialchars($d['nama']) ?></td>
      <td><?= htmlspecialchars($d['kelas']) ?></td>
      <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
      <td><?= htmlspecialchars($d['ekskul']) ?></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
