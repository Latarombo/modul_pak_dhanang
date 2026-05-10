<?php
$level_akses = "user";
include "../login/cek.php";
include "../admin/koneksi.php";

$sql = "SELECT * FROM news ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Data Berita</title>
</head>

<body>
  <h2>Daftar Berita</h2>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <td>No</td>
      <td>Judul</td>
      <td>Content</td>
      <td>Author</td>
      <td>Gambar</td>
      <td>Tanggal</td>
      <td>Aksi</td>
    </tr>

    <?php
    $no = 1;
    while ($row = $result->fetch_assoc()) {
    ?>

      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['title']; ?></td>
        <td>
          <?= substr($row['content'], 0, 100); ?>...
        </td>
        <td><?= $row['author']; ?></td>
        <td>
          <img src="../admin/upload/<?= $row['image']; ?>" width="100">
        </td>
        <td><?= $row['date']; ?></td>
        <td>
          <a href="detail.php?id=<?= $row['id']; ?>">Detail</a>
        </td>
      </tr>

    <?php } ?>

  </table>
  <a href="../login/logout.php">Logout</a>
</body>

</html>