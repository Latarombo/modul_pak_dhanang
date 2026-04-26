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
    echo "Data tidak ditemukan! <a href='../admin.php'>Kembali</a>";
    exit;
}

$page_title = "Detail Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="detail-card">
  <div class="detail-header">
    <div class="detail-avatar"><?= strtoupper(substr($d['nama'], 0, 1)) ?></div>
    <div class="detail-header-info">
      <h2><?= htmlspecialchars($d['nama']) ?></h2>
      <p>NIS: <?= htmlspecialchars($d['nis']) ?> &mdash; Kelas <?= htmlspecialchars($d['kelas']) ?></p>
    </div>
  </div>

  <div class="detail-body">
    <div class="detail-row">
      <span class="detail-key">NIS</span>
      <span class="detail-val mono"><?= htmlspecialchars($d['nis']) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Nama</span>
      <span class="detail-val"><strong><?= htmlspecialchars($d['nama']) ?></strong></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Kelas</span>
      <span class="detail-val"><span class="chip chip-kelas"><?= htmlspecialchars($d['kelas']) ?></span></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Tanggal Lahir</span>
      <span class="detail-val"><?= date('d F Y', strtotime($d['ttl'])) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Alamat</span>
      <span class="detail-val"><?= nl2br(htmlspecialchars($d['alamat'])) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Kota</span>
      <span class="detail-val"><?= htmlspecialchars($d['kota']) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Jenis Kelamin</span>
      <span class="detail-val"><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Hobi</span>
      <span class="detail-val"><?= htmlspecialchars($d['hobi']) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Ekstrakurikuler</span>
      <span class="detail-val">
        <?php foreach (explode(',', $d['ekskul']) as $eks): ?>
          <span class="chip chip-ekskul"><?= htmlspecialchars(trim($eks)) ?></span>
        <?php endforeach; ?>
      </span>
    </div>
  </div>

  <div class="detail-footer">
    <a href="edit.php?nis=<?= urlencode($d['nis']) ?>" class="btn-submit" style="text-decoration:none;">Edit Data</a>
    <a href="../admin.php" class="btn-cancel">Kembali</a>
  </div>
</div>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
