<?php include 'koneksi.php'; ?>

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
      <td><?= $d['nis']; ?></td>
      <td><?= $d['nama']; ?></td>
      <td><?= $d['kelas']; ?></td>

      <!-- biar lebih jelas -->
      <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>

      <td><?= $d['ekskul']; ?></td>
      <td>
        <a href="detail.php?nis=<?= $d['nis']; ?>">Detail</a> |
        <a href="edit.php?nis=<?= $d['nis']; ?>">Edit</a> |
        <a href="delete.php?nis=<?= $d['nis']; ?>">Hapus</a>
      </td>
    </tr>
  <?php } ?>
</table>