<?php
include __DIR__ . "/../koneksi.php";

// koneksi ke db_latihan untuk data user
$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

// total berita
$total_berita = $conn->query("SELECT COUNT(*) as total FROM news")->fetch_assoc()['total'];

// berita hari ini
$berita_hari_ini = $conn->query("SELECT COUNT(*) as total FROM news WHERE DATE(date) = CURDATE()")->fetch_assoc()['total'];

// total user
$total_user = $conn_l->query("SELECT COUNT(*) as total FROM tb_user WHERE level='user'")->fetch_assoc()['total'];
?>

<h4 class="fw-bold mb-4"><i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard</h4>

<!-- Statistik -->
<div class="row g-3 mb-4">
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-primary bg-opacity-10 rounded p-3">
          <i class="bi bi-newspaper text-primary fs-4"></i>
        </div>
        <div>
          <div class="fs-4 fw-bold"><?= $total_berita; ?></div>
          <div class="text-muted small">Total Berita</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-success bg-opacity-10 rounded p-3">
          <i class="bi bi-calendar-check text-success fs-4"></i>
        </div>
        <div>
          <div class="fs-4 fw-bold"><?= $berita_hari_ini; ?></div>
          <div class="text-muted small">Berita Hari Ini</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card border-0 shadow-sm">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="bg-warning bg-opacity-10 rounded p-3">
          <i class="bi bi-people text-warning fs-4"></i>
        </div>
        <div>
          <div class="fs-4 fw-bold"><?= $total_user; ?></div>
          <div class="text-muted small">Total User</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Berita terbaru -->
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white fw-semibold">
    <i class="bi bi-clock-history me-2 text-primary"></i>Berita Terbaru
  </div>
  <div class="card-body p-0">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-3">Judul</th>
          <th>Author</th>
          <th>Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $latest = $conn->query("SELECT * FROM news ORDER BY id DESC LIMIT 5");
        if ($latest && $latest->num_rows > 0):
          while ($row = $latest->fetch_assoc()):
        ?>
            <tr>
              <td class="ps-3 fw-semibold"><?= htmlspecialchars($row['title']); ?></td>
              <td><span class="badge bg-primary bg-opacity-10 text-primary"><?= htmlspecialchars($row['author']); ?></span></td>
              <td class="text-muted small"><?= $row['date']; ?></td>
            </tr>
          <?php endwhile; else: ?>
          <tr><td colspan="3" class="text-center text-muted py-4">Belum ada berita.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
