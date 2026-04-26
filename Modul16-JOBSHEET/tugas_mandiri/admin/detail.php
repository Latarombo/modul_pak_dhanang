<?php
$level_akses = "admin";
include '../login_level/koneksi.php';
include "../login_level/cek.php";

// cek parameter
if (!isset($_GET['nis'])) {
    echo "NIS tidak ditemukan!";
    exit;
}

$nis = $_GET['nis'];

// ambil data
$data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nis='$nis'");
$d = mysqli_fetch_array($data);

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
<tr><td>NIS</td><td><?= $d['nis']; ?></td></tr>
<tr><td>Nama</td><td><?= $d['nama']; ?></td></tr>
<tr><td>Kelas</td><td><?= $d['kelas']; ?></td></tr>

<tr>
    <td>Tanggal Lahir</td>
    <td><?= date('d-m-Y', strtotime($d['ttl'])); ?></td>
</tr>

<tr><td>Alamat</td><td><?= $d['alamat']; ?></td></tr>
<tr><td>Kota</td><td><?= $d['kota']; ?></td></tr>

<tr>
    <td>Jenis Kelamin</td>
    <td><?= $d['jk']=='L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
</tr>

<tr><td>Hobi</td><td><?= $d['hobi']; ?></td></tr>
<tr><td>Ekskul</td><td><?= $d['ekskul']; ?></td></tr>

</table>

<br>
<a href="admin.php">Kembali</a>

</body>
</html>