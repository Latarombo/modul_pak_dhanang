<?php
$level_akses = "admin";
include "../../login/cek.php";
include __DIR__ . "/../koneksi.php";

$stmt  = $conn->prepare("DELETE FROM news WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$hasil = $stmt->execute();

// untuk reset AUTO_INCREMENT
$conn->query("ALTER TABLE news AUTO_INCREMENT = 1");

if ($hasil) {
  ?>
  <script language="javascript">
    document.location.href = "../index.php?page=berita";
  </script>
  <?php
} else {
  echo "Gagal hapus data";
}
