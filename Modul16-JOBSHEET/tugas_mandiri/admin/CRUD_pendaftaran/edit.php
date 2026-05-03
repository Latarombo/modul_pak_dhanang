<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
  echo "NIS tidak valid! <a href='../admin.php'>Kembali</a>";
  exit;
}
$nis = $_GET['nis'];

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

$hobi_list   = explode(",", $d['hobi']);
$ekskul_list = explode(",", $d['ekskul']);
$ttl_parts   = explode("-", $d['ttl']);
$thn_val = $ttl_parts[0] ?? '';
$bln_val = $ttl_parts[1] ?? '';
$tgl_val = $ttl_parts[2] ?? '';

$page_title = "Edit Data Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<h2>Edit Data Siswa</h2>
<p>NIS tidak dapat diubah.</p>

<form action="proses_update.php" method="POST">
  <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']) ?>">

  <h3>Identitas Siswa</h3>

  <p>NIS: <strong><?= htmlspecialchars($d['nis']) ?></strong> (tidak dapat diubah)</p>

  <p>
    <label>Nama Lengkap *<br>
    <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']) ?>" required></label>
  </p>

  <p>
    <label>Kelas *<br>
    <select name="kelas" required>
      <option value="X"   <?= $d['kelas'] == 'X'   ? 'selected' : '' ?>>X</option>
      <option value="XI"  <?= $d['kelas'] == 'XI'  ? 'selected' : '' ?>>XI</option>
      <option value="XII" <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
    </select></label>
  </p>

  <p>
    Tanggal Lahir *<br>
    <label>DD: <input type="text" name="tgl" placeholder="DD" maxlength="2" value="<?= htmlspecialchars($tgl_val) ?>" required></label>
    <label>MM: <input type="text" name="bln" placeholder="MM" maxlength="2" value="<?= htmlspecialchars($bln_val) ?>" required></label>
    <label>YYYY: <input type="text" name="thn" placeholder="YYYY" maxlength="4" value="<?= htmlspecialchars($thn_val) ?>" required></label>
  </p>

  <hr>
  <h3>Alamat &amp; Kontak</h3>

  <p>
    <label>Alamat *<br>
    <textarea name="alamat" required><?= htmlspecialchars($d['alamat']) ?></textarea></label>
  </p>

  <p>
    <label>Kota *<br>
    <input type="text" name="kota" value="<?= htmlspecialchars($d['kota']) ?>" required></label>
  </p>

  <hr>
  <h3>Data Tambahan</h3>

  <p>
    Jenis Kelamin *<br>
    <label><input type="radio" name="jk" value="L" <?= $d['jk'] == 'L' ? 'checked' : '' ?> required> Laki-Laki</label>
    <label><input type="radio" name="jk" value="P" <?= $d['jk'] == 'P' ? 'checked' : '' ?>> Perempuan</label>
  </p>

  <p>
    Hobi<br>
    <?php foreach (['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'] as $h): ?>
    <label><input type="checkbox" name="hobi[]" value="<?= $h ?>" <?= in_array($h, $hobi_list) ? 'checked' : '' ?>> <?= $h ?></label>
    <?php endforeach; ?>
  </p>

  <p>
    <label>Ekstrakurikuler (Tahan Ctrl/Cmd untuk pilih lebih dari satu)<br>
    <select name="ekskul[]" multiple size="7">
      <?php foreach (['Pramuka', 'Basket', 'Volly', 'Band', 'Seni Tari', 'Robotic', 'Bulu Tangkis'] as $e): ?>
      <option value="<?= $e ?>" <?= in_array($e, $ekskul_list) ? 'selected' : '' ?>><?= $e ?></option>
      <?php endforeach; ?>
    </select></label>
  </p>

  <p>
    <button type="submit">Update Data</button>
    <a href="../admin.php">Batal</a>
  </p>

</form>

</body>
</html>
