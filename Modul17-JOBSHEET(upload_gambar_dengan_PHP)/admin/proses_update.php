<?php
include "koneksi.php";
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
  $target = __DIR__ . "/upload/" . $image_baru;
  // Validasi ekstensi
  $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
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

$query = "UPDATE news SET title='$title', content='$content', author='$author', image='$image_baru' WHERE id='$id'";
$hasil = mysqli_query($conn, $query);
if ($hasil) {
  header('Location:admin.php');
} else {
  echo "Gagal update data";
  echo mysqli_error($conn);
}
