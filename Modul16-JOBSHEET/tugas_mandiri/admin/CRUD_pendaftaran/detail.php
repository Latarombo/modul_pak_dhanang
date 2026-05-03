<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    header("Location: ../admin.php");
    exit;
}

$nis  = $_GET['nis'];
$stmt = $conn->prepare("SELECT * FROM tb_siswa WHERE nis=?");
$stmt->bind_param("s", $nis);
$stmt->execute();
$result = $stmt->get_result();
$d      = $result->fetch_assoc();
$stmt->close();

if (!$d) {
    echo "Data tidak ditemukan! <a href='../admin.php'>Kembali</a>";
    exit;
}

$page_title = "Detail Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<h2>Detail Siswa: <?= htmlspecialchars($d['nama']) ?></h2>

<table border="1" cellpadding="5" cellspacing="0">
  <tr><th>NIS</th><td><?= htmlspecialchars($d['nis']) ?></td></tr>
  <tr><th>Nama</th><td><?= htmlspecialchars($d['nama']) ?></td></tr>
  <tr><th>Kelas</th><td><?= htmlspecialchars($d['kelas']) ?></td></tr>
  <tr><th>Tanggal Lahir</th><td><?= date('d F Y', strtotime($d['ttl'])) ?></td></tr>
  <tr><th>Alamat</th><td><?= nl2br(htmlspecialchars($d['alamat'])) ?></td></tr>
  <tr><th>Kota</th><td><?= htmlspecialchars($d['kota']) ?></td></tr>
  <tr><th>Jenis Kelamin</th><td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td></tr>
  <tr><th>Hobi</th><td><?= htmlspecialchars($d['hobi']) ?></td></tr>
  <tr><th>Ekstrakurikuler</th><td><?= htmlspecialchars($d['ekskul']) ?></td></tr>
</table>

<p>
  <a href="edit.php?nis=<?= urlencode($d['nis']) ?>">Edit Data</a> |
  <a href="../admin.php">Kembali</a>
</p>

</body>
</html>
