<?php
$level_akses = "admin";
include "../../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Tambah Siswa — Ekskul</title>
  <?php include '../../_head_common.php'; ?>
</head>
<body>

<?php $base = "../"; include '../../_nav_admin.php'; ?>

<div class="container py-4" style="max-width:720px;">

  <div class="mb-4">
    <a href="../admin.php" class="text-decoration-none text-muted small">
      <i class="bi bi-arrow-left me-1"></i>Kembali ke Dashboard
    </a>
    <h1 class="h3 fw-bold mt-1 mb-0">Tambah Data Siswa</h1>
  </div>

  <form action="proses_create.php" method="post">

    <!-- Identitas Siswa -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-person-vcard me-2 text-primary"></i>Identitas Siswa</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">NIS <span class="text-danger">*</span></label>
          <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
          <select name="kelas" class="form-select" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
          <div class="row g-2">
            <div class="col-4">
              <input type="text" name="tgl" class="form-control" placeholder="DD" maxlength="2" required>
              <div class="form-text">Hari</div>
            </div>
            <div class="col-4">
              <input type="text" name="bln" class="form-control" placeholder="MM" maxlength="2" required>
              <div class="form-text">Bulan</div>
            </div>
            <div class="col-4">
              <input type="text" name="thn" class="form-control" placeholder="YYYY" maxlength="4" required>
              <div class="form-text">Tahun</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Alamat & Kontak -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-primary"></i>Alamat &amp; Kontak</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
          <textarea name="alamat" class="form-control" rows="3" placeholder="Tulis alamat lengkap..." required></textarea>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Kota <span class="text-danger">*</span></label>
          <input type="text" name="kota" class="form-control" placeholder="Nama kota" required>
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
              <input class="form-check-input" type="radio" name="jk" value="L" id="jkL" required>
              <label class="form-check-label" for="jkL"><i class="bi bi-gender-male me-1 text-primary"></i>Laki-Laki</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jk" value="P" id="jkP">
              <label class="form-check-label" for="jkP"><i class="bi bi-gender-female me-1 text-danger"></i>Perempuan</label>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Hobi</label>
          <div class="d-flex flex-wrap gap-3">
            <?php foreach (['Membaca','Olahraga','Menyanyi','Menari','Traveling'] as $h): ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="hobi[]" value="<?= $h ?>" id="hobi_<?= $h ?>">
              <label class="form-check-label" for="hobi_<?= $h ?>"><?= $h ?></label>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Ekstrakurikuler <span class="text-danger">*</span></label>
          <div class="form-text mb-2">Tahan Ctrl/Cmd untuk pilih lebih dari satu</div>
          <select name="ekskul[]" multiple class="form-select" size="7" required>
            <?php foreach (['Pramuka','Basket','Volly','Band','Seni Tari','Robotic','Bulu Tangkis'] as $e): ?>
            <option value="<?= $e ?>"><?= $e ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-primary px-4">
        <i class="bi bi-floppy me-2"></i>Simpan Data
      </button>
      <button type="reset" class="btn btn-outline-secondary px-4">
        <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
      </button>
      <a href="../admin.php" class="btn btn-link text-muted">Batal</a>
    </div>

  </form>
</div>

<?php include '../../_scripts.php'; ?>
</body>
</html>
