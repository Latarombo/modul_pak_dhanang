<?php
$level_akses = "user";
$page_title  = "Dashboard";
$active      = "dashboard";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
include '../_sidebar_open.php';
?>

<p>Halo, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>! |
<a href="user.php">Daftar Ekskul</a></p>

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
