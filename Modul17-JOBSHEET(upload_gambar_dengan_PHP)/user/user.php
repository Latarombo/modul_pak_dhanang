<?php
$level_akses = "user";
include "../login_level/cek.php";

if ($_SESSION['sudah_daftar'] === true) {
    header("Location: dashboard_user.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Pendaftaran Ekstrakurikuler — Ekskul</title>
  <?php include '../_head_common.php'; ?>
</head>
<body>

<!-- Navbar user (sederhana, hanya username & logout) -->
<nav class="navbar navbar-dark bg-primary shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-award-fill me-2"></i>Ekskul
    </a>
    <div class="d-flex align-items-center gap-2">
      <span class="text-white-50 small"><i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($_SESSION['username']) ?></span>
      <span class="badge bg-light text-primary">User</span>
      <a href="../login_level/logout.php" class="btn btn-outline-light btn-sm ms-2">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>
  </div>
</nav>

<div class="container py-4" style="max-width:720px;">

  <div class="text-center mb-4">
    <h1 class="h3 fw-bold mb-1">Pendaftaran Ekstrakurikuler</h1>
    <p class="text-muted">Lengkapi data berikut untuk mendaftarkan diri ke ekstrakurikuler</p>
  </div>

  <!-- Progress steps indicator -->
  <div class="d-flex justify-content-center gap-3 mb-4">
    <span class="badge bg-primary px-3 py-2">1 — Identitas</span>
    <span class="text-muted align-self-center"><i class="bi bi-chevron-right"></i></span>
    <span class="badge bg-primary px-3 py-2">2 — Alamat</span>
    <span class="text-muted align-self-center"><i class="bi bi-chevron-right"></i></span>
    <span class="badge bg-primary px-3 py-2">3 — Minat</span>
  </div>

  <form action="../admin/CRUD_pendaftaran/proses_create.php" method="post">

    <!-- Step 1 -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-person-vcard me-2 text-primary"></i>1 — Data Identitas Siswa</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">NIS <span class="text-danger">*</span></label>
          <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" required>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
          <select name="kelas" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
        <div class="mb-3">
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
        <div class="mb-0">
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
      </div>
    </div>

    <!-- Step 2 -->
    <div class="card mb-3">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-primary"></i>2 — Alamat &amp; Domisili</h6>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
          <textarea name="alamat" class="form-control" rows="3" placeholder="Jalan, RT/RW, Kelurahan..." required></textarea>
        </div>
        <div class="mb-0">
          <label class="form-label fw-semibold">Kota <span class="text-danger">*</span></label>
          <input type="text" name="kota" class="form-control" placeholder="Nama kota" required>
        </div>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="card mb-4">
      <div class="card-header py-2">
        <h6 class="mb-0 fw-bold"><i class="bi bi-trophy me-2 text-primary"></i>3 — Minat &amp; Ekstrakurikuler</h6>
      </div>
      <div class="card-body">
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
          <label class="form-label fw-semibold">Pilih Ekstrakurikuler <span class="text-danger">*</span></label>
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
      <button type="submit" class="btn btn-primary px-5 fw-semibold">
        <i class="bi bi-send me-2"></i>Kirim Pendaftaran
      </button>
      <button type="reset" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
      </button>
    </div>

  </form>
</div>

<?php include '../_scripts.php'; ?>
</body>
</html>
