<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    header("Location: ../admin.php");
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
    header("Location: ../admin.php");
    exit;
}

$hobi_list   = explode(",", $d['hobi']);
$ekskul_list = explode(",", $d['ekskul']);
$ttl_parts   = explode("-", $d['ttl']);
$thn_val = $ttl_parts[0] ?? '';
$bln_val = $ttl_parts[1] ?? '';
$tgl_val = $ttl_parts[2] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Edit Siswa — Ekskul</title>
  <?php include '../../_head_common.php'; ?>
</head>
<body>

<?php include '../../_nav_admin.php'; ?>

<div class="container py-4" style="max-width:720px;">

  <div class="mb-4">
    <a href="../admin.php" class="text-decoration-none text-muted small">
      <i class="bi bi-arrow-left me-1"></i>Kembali ke Dashboard
    </a>
    <h1 class="h3 fw-bold mt-1 mb-0">Edit Data Siswa</h1>
  </div>

  <form action="proses_update.php" method="POST">
    <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']) ?>">

    <!-- Identitas -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-person-vcard me-2 text-primary"></i>Identitas Siswa</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">NIS</label>
          <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($d['nis']) ?>" disabled>
          <div class="form-text"><i class="bi bi-lock me-1"></i>NIS tidak dapat diubah</div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama']) ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
          <select name="kelas" class="form-select" required>
            <option value="X"   <?= $d['kelas']=='X'   ? 'selected':'' ?>>X</option>
            <option value="XI"  <?= $d['kelas']=='XI'  ? 'selected':'' ?>>XI</option>
            <option value="XII" <?= $d['kelas']=='XII' ? 'selected':'' ?>>XII</option>
          </select>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
          <div class="row g-2">
            <div class="col-4">
              <input type="text" name="tgl" class="form-control" placeholder="DD" maxlength="2" value="<?= htmlspecialchars($tgl_val) ?>" required>
              <div class="form-text">Hari</div>
            </div>
            <div class="col-4">
              <input type="text" name="bln" class="form-control" placeholder="MM" maxlength="2" value="<?= htmlspecialchars($bln_val) ?>" required>
              <div class="form-text">Bulan</div>
            </div>
            <div class="col-4">
              <input type="text" name="thn" class="form-control" placeholder="YYYY" maxlength="4" value="<?= htmlspecialchars($thn_val) ?>" required>
              <div class="form-text">Tahun</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Alamat -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-primary"></i>Alamat &amp; Kontak</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
          <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($d['alamat']) ?></textarea>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Kota <span class="text-danger">*</span></label>
          <input type="text" name="kota" class="form-control" value="<?= htmlspecialchars($d['kota']) ?>" required>
        </div>
      </div>
    </div>

    <!-- Data Tambahan -->
    <div class="card mb-4">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-list-check me-2 text-primary"></i>Data Tambahan</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
          <div class="d-flex gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" value="L" id="jkL" <?= $d['jk']=='L'?'checked':'' ?> required>
              <label class="form-check-label" for="jkL"><i class="bi bi-gender-male me-1 text-primary"></i>Laki-Laki</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" value="P" id="jkP" <?= $d['jk']=='P'?'checked':'' ?>>
              <label class="form-check-label" for="jkP"><i class="bi bi-gender-female me-1 text-danger"></i>Perempuan</label>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Hobi</label>
          <div class="d-flex flex-wrap gap-3">
            <?php foreach (['Membaca','Olahraga','Menyanyi','Menari','Traveling'] as $h): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="hobi[]" value="<?= $h ?>"
                     id="hobi_<?= $h ?>" <?= in_array($h, $hobi_list) ? 'checked':'' ?>>
              <label class="form-check-label" for="hobi_<?= $h ?>"><?= $h ?></label>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Ekstrakurikuler</label>
          <div class="form-text mb-2">Tahan Ctrl/Cmd untuk pilih lebih dari satu</div>
          <select name="ekskul[]" multiple class="form-select" size="7">
            <?php foreach (['Pramuka','Basket','Volly','Band','Seni Tari','Robotic','Bulu Tangkis'] as $e): ?>
            <option value="<?= $e ?>" <?= in_array($e, $ekskul_list) ? 'selected':'' ?>><?= $e ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-warning px-4">
        <i class="bi bi-floppy me-2"></i>Update Data
      </button>
      <a href="../admin.php" class="btn btn-outline-secondary px-4">Batal</a>
    </div>

  </form>
</div>

<?php include '../../_scripts.php'; ?>
</body>
</html>
