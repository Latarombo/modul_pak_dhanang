<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    echo "NIS tidak ditemukan!";
    exit;
}

$nis = $_GET['nis'];

$stmt = $conn->prepare("SELECT * FROM tb_siswa WHERE nis=?");
$stmt->bind_param("s", $nis);
$stmt->execute();
$result = $stmt->get_result();
$d = $result->fetch_assoc();
$stmt->close();

if (!$d) {
    echo "Data tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Siswa</title>
</head>
<body>

<h2>Detail Data Siswa</h2>

<table border="1" cellpadding="10">
<tr><td>NIS</td><td><?= htmlspecialchars($d['nis']); ?></td></tr>
<tr><td>Nama</td><td><?= htmlspecialchars($d['nama']); ?></td></tr>
<tr><td>Kelas</td><td><?= htmlspecialchars($d['kelas']); ?></td></tr>
<tr>
    <td>Tanggal Lahir</td>
    <td><?= date('d-m-Y', strtotime($d['ttl'])); ?></td>
</tr>
<tr><td>Alamat</td><td><?= htmlspecialchars($d['alamat']); ?></td></tr>
<tr><td>Kota</td><td><?= htmlspecialchars($d['kota']); ?></td></tr>
<tr>
    <td>Jenis Kelamin</td>
    <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
</tr>
<tr><td>Hobi</td><td><?= htmlspecialchars($d['hobi']); ?></td></tr>
<tr><td>Ekskul</td><td><?= htmlspecialchars($d['ekskul']); ?></td></tr>
</table>

<br>
<a href="admin.php">Kembali</a>

</body>
</html>
