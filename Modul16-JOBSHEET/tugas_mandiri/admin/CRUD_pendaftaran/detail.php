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
    header("Location: ../admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Detail Siswa — Ekskul</title>
  <?php include '../../_head_common.php'; ?>
</head>
<body>

<?php include '../../_nav_admin.php'; ?>

<div class="container py-4" style="max-width:680px;">

  <div class="mb-4">
    <a href="../admin.php" class="text-decoration-none text-muted small">
      <i class="bi bi-arrow-left me-1"></i>Kembali ke Dashboard
    </a>
    <h1 class="h3 fw-bold mt-1 mb-0">Detail Siswa</h1>
  </div>

  <div class="card mb-3">
    <div class="card-header py-2">
      <h6 class="mb-0 fw-bold"><i class="bi bi-person-vcard me-2 text-primary"></i>Identitas Siswa</h6>
    </div>
    <div class="card-body p-0">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr>
            <th class="bg-light" style="width:35%">NIS</th>
            <td><span class="fw-semibold"><?= htmlspecialchars($d['nis']) ?></span></td>
          </tr>
          <tr>
            <th class="bg-light">Nama Lengkap</th>
            <td><?= htmlspecialchars($d['nama']) ?></td>
          </tr>
          <tr>
            <th class="bg-light">Kelas</th>
            <td><span class="badge bg-secondary"><?= htmlspecialchars($d['kelas']) ?></span></td>
          </tr>
          <tr>
            <th class="bg-light">Tanggal Lahir</th>
            <td><?= date('d F Y', strtotime($d['ttl'])) ?></td>
          </tr>
          <tr>
            <th class="bg-light">Jenis Kelamin</th>
            <td>
              <?php if ($d['jk'] == 'L'): ?>
                <span class="badge bg-primary"><i class="bi bi-gender-male me-1"></i>Laki-Laki</span>
              <?php else: ?>
                <span class="badge bg-danger"><i class="bi bi-gender-female me-1"></i>Perempuan</span>
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header py-2">
      <h6 class="mb-0 fw-bold"><i class="bi bi-geo-alt me-2 text-primary"></i>Alamat &amp; Kontak</h6>
    </div>
    <div class="card-body p-0">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr>
            <th class="bg-light" style="width:35%">Alamat</th>
            <td><?= nl2br(htmlspecialchars($d['alamat'])) ?></td>
          </tr>
          <tr>
            <th class="bg-light">Kota</th>
            <td><?= htmlspecialchars($d['kota']) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-header py-2">
      <h6 class="mb-0 fw-bold"><i class="bi bi-list-check me-2 text-primary"></i>Minat &amp; Ekskul</h6>
    </div>
    <div class="card-body p-0">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr>
            <th class="bg-light" style="width:35%">Hobi</th>
            <td>
              <?php if ($d['hobi']): ?>
                <?php foreach (explode(',', $d['hobi']) as $h): ?>
                  <span class="badge bg-info text-dark me-1"><?= htmlspecialchars(trim($h)) ?></span>
                <?php endforeach; ?>
              <?php else: ?>
                <span class="text-muted">-</span>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th class="bg-light">Ekstrakurikuler</th>
            <td>
              <?php foreach (explode(',', $d['ekskul']) as $e): ?>
                <span class="badge bg-primary me-1"><?= htmlspecialchars(trim($e)) ?></span>
              <?php endforeach; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex gap-2">
    <a href="edit.php?nis=<?= urlencode($d['nis']) ?>" class="btn btn-warning">
      <i class="bi bi-pencil me-2"></i>Edit Data
    </a>
    <a href="../admin.php" class="btn btn-outline-secondary">
      <i class="bi bi-arrow-left me-2"></i>Kembali
    </a>
  </div>

</div>

<?php include '../../_scripts.php'; ?>
</body>
</html>
