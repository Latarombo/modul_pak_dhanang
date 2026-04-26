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

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-wrap">
  <div class="form-head">
    <h2>Edit Data Siswa</h2>
    <p>Perbarui informasi siswa — NIS tidak dapat diubah</p>
  </div>
  <div class="form-body">
    <form action="proses_update.php" method="POST">
      <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']) ?>">

      <p class="f-section">Identitas Siswa</p>

      <div class="field-block">
        <label class="f-label">NIS</label>
        <div class="f-static"><?= htmlspecialchars($d['nis']) ?> &mdash; tidak dapat diubah</div>
      </div>

      <div class="field-block">
        <label class="f-label">Nama Lengkap <span class="f-req">*</span></label>
        <input type="text" name="nama" class="f-control" value="<?= htmlspecialchars($d['nama']) ?>" required>
      </div>

      <div class="grid-2">
        <div class="field-block">
          <label class="f-label">Kelas <span class="f-req">*</span></label>
          <select name="kelas" class="f-select" required>
            <option value="X"   <?= $d['kelas'] == 'X'   ? 'selected' : '' ?>>X</option>
            <option value="XI"  <?= $d['kelas'] == 'XI'  ? 'selected' : '' ?>>XI</option>
            <option value="XII" <?= $d['kelas'] == 'XII' ? 'selected' : '' ?>>XII</option>
          </select>
        </div>
        <div class="field-block">
          <label class="f-label">Tanggal Lahir <span class="f-req">*</span></label>
          <div class="date-row">
            <input type="text" name="tgl" class="f-control" placeholder="DD" maxlength="2" value="<?= htmlspecialchars($tgl_val) ?>" required>
            <span class="date-sep">/</span>
            <input type="text" name="bln" class="f-control" placeholder="MM" maxlength="2" value="<?= htmlspecialchars($bln_val) ?>" required>
            <span class="date-sep">/</span>
            <input type="text" name="thn" class="f-control" placeholder="YYYY" maxlength="4" value="<?= htmlspecialchars($thn_val) ?>" required>
          </div>
        </div>
      </div>

      <hr class="f-divider">
      <p class="f-section">Alamat &amp; Kontak</p>

      <div class="field-block">
        <label class="f-label">Alamat <span class="f-req">*</span></label>
        <textarea name="alamat" class="f-control" required><?= htmlspecialchars($d['alamat']) ?></textarea>
      </div>

      <div class="field-block">
        <label class="f-label">Kota <span class="f-req">*</span></label>
        <input type="text" name="kota" class="f-control" value="<?= htmlspecialchars($d['kota']) ?>" required>
      </div>

      <hr class="f-divider">
      <p class="f-section">Data Tambahan</p>

      <div class="field-block">
        <label class="f-label">Jenis Kelamin <span class="f-req">*</span></label>
        <div class="toggle-group">
          <label class="toggle-label">
            <input type="radio" name="jk" value="L" <?= $d['jk'] == 'L' ? 'checked' : '' ?> required> Laki-Laki
          </label>
          <label class="toggle-label">
            <input type="radio" name="jk" value="P" <?= $d['jk'] == 'P' ? 'checked' : '' ?>> Perempuan
          </label>
        </div>
      </div>

      <div class="field-block">
        <label class="f-label">Hobi</label>
        <div class="toggle-group">
          <?php foreach (['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'] as $h): ?>
            <label class="toggle-label">
              <input type="checkbox" name="hobi[]" value="<?= $h ?>" <?= in_array($h, $hobi_list) ? 'checked' : '' ?>>
              <?= $h ?>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="field-block">
        <label class="f-label">Ekstrakurikuler</label>
        <select name="ekskul[]" multiple size="7" class="select-multi">
          <?php foreach (['Pramuka', 'Basket', 'Volly', 'Band', 'Seni Tari', 'Robotic', 'Bulu Tangkis'] as $e): ?>
            <option value="<?= $e ?>" <?= in_array($e, $ekskul_list) ? 'selected' : '' ?>><?= $e ?></option>
          <?php endforeach; ?>
        </select>
        <p class="f-hint">Tahan Ctrl / Cmd untuk memilih lebih dari satu</p>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn-submit">Update Data</button>
        <a href="../admin.php" class="btn-cancel">Batal</a>
      </div>

    </form>
  </div>
</div>

</div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
