<?php
$level_akses = "admin";
include "../../login/cek.php";

$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$stmt  = $conn_l->prepare("DELETE FROM tb_user WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$hasil = $stmt->execute();

if ($hasil) {
?>
  <script language="javascript">
    document.location.href = "../index.php?page=user";
  </script>
<?php
} else {
  echo "Gagal hapus data";
}
