<?php
include __DIR__ . "/../koneksi.php";

$total    = $conn->query("SELECT COUNT(*) as total FROM news")->fetch_assoc()['total'];
$hari_ini = $conn->query("SELECT COUNT(*) as total FROM news WHERE DATE(date)=CURDATE()")->fetch_assoc()['total'];
$result   = $conn->query("SELECT * FROM news ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold mb-0"><i class="bi bi-newspaper me-2 text-danger"></i>Manajemen Berita</h4>
  <a href="../berita/tambah.php" class="btn btn-danger">
    <i class="bi bi-plus-lg me-1"></i>Tambah Berita
  </a>
</div>

<!-- Statistik -->
<div class="row g-3 mb-4">
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-danger bg-opacity-10 rounded p-3">
          <i class="bi bi-newspaper text-danger fs-4"></i>
        </div>
        <div>
          <div class="fs-4 fw-bold"><?= $total; ?></div>
          <div class="text-muted small">Total Berita</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-primary bg-opacity-10 rounded p-3">
          <i class="bi bi-calendar-check text-primary fs-4"></i>
        </div>
        <div>
          <div class="fs-4 fw-bold"><?= $hari_ini; ?></div>
          <div class="text-muted small">Berita Hari Ini</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-success bg-opacity-10 rounded p-3">
          <i class="bi bi-person-check text-success fs-4"></i>
        </div>
        <div>
          <div class="fw-bold"><?= htmlspecialchars($_SESSION['username']); ?></div>
          <div class="text-muted small">Login Sebagai</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Tabel Berita -->
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <span class="fw-semibold"><i class="bi bi-list-ul me-2 text-danger"></i>Daftar Berita</span>
    <span class="badge bg-secondary"><?= $total; ?> berita</span>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="ps-3" style="width:50px">No</th>
            <th>Judul</th>
            <th>Konten</th>
            <th>Author</th>
            <th>Gambar</th>
            <th>Tanggal</th>
            <th style="width:140px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
          ?>
              <tr>
                <td class="ps-3 text-muted"><?= $no++; ?></td>
                <td>
                  <div class="fw-semibold" style="max-width:180px;"><?= htmlspecialchars($row['title']); ?></div>
                </td>
                <td>
                  <span class="text-muted small"><?= htmlspecialchars(substr($row['content'], 0, 80)); ?>...</span>
                </td>
                <td>
                  <span class="badge bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-person-fill me-1"></i><?= htmlspecialchars($row['author']); ?>
                  </span>
                </td>
                <td>
                  <?php if (!empty($row['image'])): ?>
                    <img src="../upload/<?= htmlspecialchars($row['image']); ?>"
                      width="70" height="50" class="rounded object-fit-cover" alt="Gambar">
                  <?php else: ?>
                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                      style="width:70px;height:50px;">
                      <i class="bi bi-image text-muted"></i>
                    </div>
                  <?php endif; ?>
                </td>
                <td>
                  <span class="text-muted small"><i class="bi bi-clock me-1"></i><?= $row['date']; ?></span>
                </td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="../berita/detail.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-primary" title="Detail">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="../berita/edit.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-warning" title="Edit">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <a href="../berita/delete.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-danger" title="Hapus"
                      onclick="return confirm('Yakin ingin menghapus berita ini?')">
                      <i class="bi bi-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; else: ?>
            <tr>
              <td colspan="7" class="text-center text-muted py-5">
                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                Belum ada berita.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
