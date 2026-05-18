<?php
$level_akses = "admin";
include "../../login/cek.php";
include __DIR__ . "/../koneksi.php";

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$image_lama = $_POST['image_lama'];

// Mengecek file baru diupload
if ($_FILES['image']['name'] != '') {
  // Upload gambar
  $image = $_FILES['image']['name'];
  $image_baru = time() . '_' . basename($image);
  $tmp = $_FILES['image']['tmp_name'];
  $target = __DIR__ . "/../upload/" . $image_baru;

  // Validasi ekstensi
  $ext     = strtolower(pathinfo($image, PATHINFO_EXTENSION));
  $allowed = ['jpg', 'jpeg', 'png', 'gif'];

  if (!in_array($ext, $allowed)) {
    die("Format gambar tidak valid!");
  }
  if (!move_uploaded_file($tmp, $target)) {
    die("Gagal upload gambar!");
  }
} else {
  // Maka tetap pakai gambar yang lama
  $image_baru = $image_lama;
}

$stmt = $conn->prepare("UPDATE news SET title=?, content=?, author=?, image=?, date=NOW() WHERE id=?");
$stmt->bind_param("ssssi", $title, $content, $author, $image_baru, $id);
$hasil = $stmt->execute();

if ($hasil) {
  header("Location: ../index.php?page=berita");
} else {
  echo "Gagal update data";
  echo $conn->error;
}
