<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';
?>

<h2>Dashboard Halaman Admin</h2>
<p>Selamat datang, <?php echo $_SESSION['username']; ?></p>

<hr>

<h2>Data Siswa</h2>

<a href="create.php">+ Tambah Data</a><br><br>

<table border="1" cellpadding="10">
  <tr>
    <th>NIS</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>JK</th>
    <th>Ekskul</th>
    <th>Aksi</th>
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
      <td>
        <a href="detail.php?nis=<?= urlencode($d['nis']); ?>">Detail</a> |
        <a href="edit.php?nis=<?= urlencode($d['nis']); ?>">Edit</a> |
        <a href="delete.php?nis=<?= urlencode($d['nis']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
      </td>
    </tr>
  <?php } ?>
</table>

<br>
<a href="../login_level/logout.php">Logout</a>
