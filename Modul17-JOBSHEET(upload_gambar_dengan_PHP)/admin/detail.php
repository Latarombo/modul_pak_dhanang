<?php
$level_akses = "admin";
include "../login/cek.php";
include "koneksi.php";

$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Detail Berita</title>
</head>

<body>
  <h2>Detail Berita</h2>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <td>Judul</td>
      <td><?= $row['title'] ?></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><?= $row['content'] ?></td>
    </tr>
    <tr>
      <td>Author</td>
      <td><?= $row['author'] ?></td>
    </tr>
    <tr>
      <td>Gambar</td>
      <td>
        <img src="../admin/upload/<?= $row['image']; ?>" width="100">
      </td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><?= $row['date'] ?></td>
    </tr>
  </table>
  <br>
  <a href="admin.php">Kembali</a>
  <a href="edit.php">Edit</a>
</body>

</html>