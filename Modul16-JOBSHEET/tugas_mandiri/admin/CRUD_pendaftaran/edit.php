<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

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

$hobi_list   = explode(",", $d['hobi']);
$ekskul_list = explode(",", $d['ekskul']);

$ttl_parts = explode("-", $d['ttl']);
$thn_val = $ttl_parts[0] ?? '';
$bln_val = $ttl_parts[1] ?? '';
$tgl_val = $ttl_parts[2] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data Siswa</title>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form action="proses_update.php" method="POST">
  <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']); ?>">

  <table border="0" cellpadding="5">

    <tr>
      <td>NIS</td>
      <td>:</td>
      <td><?= htmlspecialchars($d['nis']); ?> <i>(tidak dapat diubah)</i></td>
    </tr>

    <tr>
      <td>Nama</td>
      <td>:</td>
      <td><input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required></td>
    </tr>

    <tr>
      <td>Kelas</td>
      <td>:</td>
      <td>
        <select name="kelas" required>
          <option value="X"   <?= $d['kelas'] == 'X'   ? 'selected' : '' ?>>X</option>
          <option value="XI"  <?= $d['kelas'] == 'XI'  ? 'selected' : '' ?>>XI</option>
          <option value="XII" <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
        </select>
      </td>
    </tr>

    <tr>
      <td>Tgl Lahir</td>
      <td>:</td>
      <td>
        <input type="text" name="tgl" size="2" placeholder="DD"   value="<?= htmlspecialchars($tgl_val); ?>" required> /
        <input type="text" name="bln" size="2" placeholder="MM"   value="<?= htmlspecialchars($bln_val); ?>" required> /
        <input type="text" name="thn" size="4" placeholder="YYYY" value="<?= htmlspecialchars($thn_val); ?>" required>
      </td>
    </tr>

    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><textarea name="alamat" cols="30" rows="3" required><?= htmlspecialchars($d['alamat']); ?></textarea></td>
    </tr>

    <tr>
      <td>Kota</td>
      <td>:</td>
      <td><input type="text" name="kota" value="<?= htmlspecialchars($d['kota']); ?>" required></td>
    </tr>

    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td>
        <input type="radio" name="jk" value="L" <?= $d['jk'] == 'L' ? 'checked' : '' ?> required> Laki-Laki
        <input type="radio" name="jk" value="P" <?= $d['jk'] == 'P' ? 'checked' : '' ?>> Perempuan
      </td>
    </tr>

    <tr>
      <td>Hobi</td>
      <td>:</td>
      <td>
        <input type="checkbox" name="hobi[]" value="Membaca"   <?= in_array("Membaca",   $hobi_list) ? 'checked' : '' ?>> Membaca<br>
        <input type="checkbox" name="hobi[]" value="Olahraga"  <?= in_array("Olahraga",  $hobi_list) ? 'checked' : '' ?>> Olahraga<br>
        <input type="checkbox" name="hobi[]" value="Menyanyi"  <?= in_array("Menyanyi",  $hobi_list) ? 'checked' : '' ?>> Menyanyi<br>
        <input type="checkbox" name="hobi[]" value="Menari"    <?= in_array("Menari",    $hobi_list) ? 'checked' : '' ?>> Menari<br>
        <input type="checkbox" name="hobi[]" value="Traveling" <?= in_array("Traveling", $hobi_list) ? 'checked' : '' ?>> Traveling
      </td>
    </tr>

    <tr>
      <td>Ekskul</td>
      <td>:</td>
      <td>
        <select name="ekskul[]" multiple size="7">
          <option value="Pramuka"      <?= in_array("Pramuka",      $ekskul_list) ? 'selected' : '' ?>>Pramuka</option>
          <option value="Basket"       <?= in_array("Basket",       $ekskul_list) ? 'selected' : '' ?>>Basket</option>
          <option value="Volly"        <?= in_array("Volly",        $ekskul_list) ? 'selected' : '' ?>>Volly</option>
          <option value="Band"         <?= in_array("Band",         $ekskul_list) ? 'selected' : '' ?>>Band</option>
          <option value="Seni Tari"    <?= in_array("Seni Tari",    $ekskul_list) ? 'selected' : '' ?>>Seni Tari</option>
          <option value="Robotic"      <?= in_array("Robotic",      $ekskul_list) ? 'selected' : '' ?>>Robotic</option>
          <option value="Bulu Tangkis" <?= in_array("Bulu Tangkis", $ekskul_list) ? 'selected' : '' ?>>Bulu Tangkis</option>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan="3">
        <button type="submit">Update</button>
        <a href="../admin.php">Batal</a>
      </td>
    </tr>

  </table>
</form>

</body>
</html>
