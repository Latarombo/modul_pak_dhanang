<?php
$level_akses = "admin";
include "../../login_level/cek.php";
include '../../login_level/koneksi.php';

if (!isset($_GET['nis'])) {
    echo "NIS tidak ditemukan!";
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

$page_title = "Detail Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<style>
.detail-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  max-width: 680px;
  overflow: hidden;
}
.detail-header {
  padding: 1.6rem 2rem 1.3rem;
  border-bottom: 1px solid #f0ece4;
  display: flex;
  align-items: center;
  gap: 1.2rem;
}
.detail-avatar {
  width: 52px; height: 52px;
  border-radius: 50%;
  background: var(--lime);
  color: var(--forest);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Playfair Display', serif;
  font-size: 1.4rem;
  font-weight: 700;
  flex-shrink: 0;
}
.detail-header-info h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.25rem;
  color: var(--forest);
  margin: 0 0 .15rem;
}
.detail-header-info p { font-size: .8rem; color: #aaa; margin: 0; }

.detail-body { padding: 1.8rem 2rem; }
.detail-row {
  display: flex;
  padding: .85rem 0;
  border-bottom: 1px solid #f7f4f0;
  gap: 1rem;
}
.detail-row:last-child { border-bottom: none; }
.detail-key {
  width: 160px;
  flex-shrink: 0;
  font-size: .72rem;
  font-weight: 500;
  letter-spacing: .08em;
  text-transform: uppercase;
  color: #aaa;
  padding-top: 2px;
}
.detail-val { font-size: .9rem; color: #333; flex: 1; }
.badge-kelas {
  display: inline-block;
  padding: .2rem .65rem;
  background: var(--lime);
  color: var(--forest);
  border-radius: 4px;
  font-size: .8rem;
  font-weight: 600;
}
.badge-ekskul {
  display: inline-block;
  padding: .2rem .55rem;
  background: #f0ece4;
  color: #555;
  border-radius: 3px;
  font-size: .78rem;
  margin: 2px 3px 2px 0;
}
.detail-footer {
  padding: 1.2rem 2rem;
  background: #faf8f5;
  border-top: 1px solid #f0ece4;
  display: flex;
  gap: .7rem;
}
.btn-edit {
  padding: .6rem 1.4rem;
  background: var(--forest);
  color: #fff;
  border-radius: 6px;
  font-size: .85rem;
  font-weight: 500;
  text-decoration: none;
  transition: background .2s;
}
.btn-edit:hover { background: #3d6420; color: #fff; }
.btn-back-footer {
  padding: .6rem 1.2rem;
  background: transparent;
  color: #888;
  border: 1.5px solid #ddd;
  border-radius: 6px;
  font-size: .85rem;
  text-decoration: none;
  transition: border-color .2s;
}
.btn-back-footer:hover { border-color: #bbb; color: #555; }
.btn-back-top {
  display: inline-block;
  margin-bottom: 1.2rem;
  font-size: .82rem;
  color: #888;
  text-decoration: none;
}
.btn-back-top:hover { color: var(--forest); }
</style>

<a href="../admin.php" class="btn-back-top">&larr; Kembali ke Dashboard</a>

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
      <span class="detail-val" style="font-family:monospace"><?= htmlspecialchars($d['nis']) ?></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Nama</span>
      <span class="detail-val"><strong><?= htmlspecialchars($d['nama']) ?></strong></span>
    </div>
    <div class="detail-row">
      <span class="detail-key">Kelas</span>
      <span class="detail-val"><span class="badge-kelas"><?= htmlspecialchars($d['kelas']) ?></span></span>
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
          <span class="badge-ekskul"><?= htmlspecialchars(trim($eks)) ?></span>
        <?php endforeach; ?>
      </span>
    </div>

  </div>

  <div class="detail-footer">
    <a href="edit.php?nis=<?= urlencode($d['nis']) ?>" class="btn-edit">Edit Data &rarr;</a>
    <a href="../admin.php" class="btn-back-footer">Kembali</a>
  </div>
</div>

  </div>
</div>
</body>
</html>
