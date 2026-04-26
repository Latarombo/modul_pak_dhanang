<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
</head>
<body>

<h2>Dashboard Halaman Admin</h2>
<p>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?></p>

<hr>

<h2>Data Siswa</h2>
<a href="CRUD_pendaftaran/create.php">+ Tambah Data Siswa</a><br><br>

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
        <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']); ?>">Detail</a> |
        <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']); ?>">Edit</a> |
        <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']); ?>" onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</a>
      </td>
    </tr>
  <?php } ?>
</table>

<hr>

<h2>Data User Login</h2>
<a href="CRUD_user/create_user.php">+ Tambah User</a><br><br>

<table border="1" cellpadding="10">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Level</th>
    <th>Aksi</th>
  </tr>
  <?php
  $users = mysqli_query($conn, "SELECT * FROM tb_user");
  while ($u = mysqli_fetch_array($users)) {
  ?>
    <tr>
      <td><?= htmlspecialchars($u['id']); ?></td>
      <td><?= htmlspecialchars($u['username']); ?></td>
      <td><?= htmlspecialchars($u['level']); ?></td>
      <td>
        <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']); ?>">Edit</a> |
        <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']); ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
      </td>
    </tr>
  <?php } ?>
</table>

<br>
<a href="../login_level/logout.php">Logout</a>

</body>
</html>
