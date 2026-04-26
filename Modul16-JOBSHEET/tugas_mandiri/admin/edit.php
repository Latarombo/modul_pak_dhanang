<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    echo "NIS tidak valid!";
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

<form action="proses_update.php" method="POST">
  <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']); ?>">

  Nama: <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>"><br><br>

  Kelas:
  <select name="kelas">
    <option value="X" <?= $d['kelas'] == 'X' ? 'selected' : '' ?>>X</option>
    <option value="XI" <?= $d['kelas'] == 'XI' ? 'selected' : '' ?>>XI</option>
    <option value="XII" <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
  </select><br><br>

  Ekskul:
  <input type="text" name="ekskul" value="<?= htmlspecialchars($d['ekskul']); ?>"><br><br>

  <button type="submit">Update</button>
</form>
