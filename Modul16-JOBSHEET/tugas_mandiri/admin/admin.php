<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin — Ekskul</title>
</head>
<body>

<nav>
  Sistem Ekstrakurikuler |
  <a href="admin.php">Dashboard</a> |
  <a href="admin.php#siswa">Data Siswa</a> |
  <a href="admin.php#user">Manajemen User</a> |
  Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (Admin) |
  <a href="../login_level/logout.php">Logout</a>
</nav>
<hr>

<h1>Dashboard Admin</h1>

<?php
$total_siswa = mysqli_num_rows(mysqli_query($conn, "SELECT nis FROM tb_siswa"));
$total_user  = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM tb_user"));
?>

<p>Total Siswa: <strong><?= $total_siswa ?></strong> | Total User: <strong><?= $total_user ?></strong></p>

<h2 id="siswa">Data Siswa</h2>
<p><a href="CRUD_pendaftaran/create.php">+ Tambah Siswa</a></p>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jenis Kelamin</th>
      <th>Ekskul</th>
      <th>Aksi</th>
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
      <td>
        <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']) ?>">Detail</a> |
        <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']) ?>">Edit</a> |
        <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']) ?>"
           onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<h2 id="user">Manajemen User</h2>
<p><a href="CRUD_user/create_user.php">+ Tambah User</a></p>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Level</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $users = mysqli_query($conn, "SELECT * FROM tb_user");
    while ($u = mysqli_fetch_array($users)):
    ?>
    <tr>
      <td><?= htmlspecialchars($u['id']) ?></td>
      <td><?= htmlspecialchars($u['username']) ?></td>
      <td><?= ucfirst($u['level']) ?></td>
      <td>
        <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']) ?>">Edit</a> |
        <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']) ?>"
           onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>
