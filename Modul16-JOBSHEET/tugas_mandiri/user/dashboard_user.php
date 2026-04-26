<?php
$level_akses = "user";
$page_title  = "Dashboard";
$active      = "dashboard";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
include '../_sidebar_open.php';
?>

<style>
  :root { --forest:#2E4C18; --lime:#E1EF97; --orange:#FC702F; }
  body { font-family:'DM Sans',sans-serif; }

  .welcome-banner { background:var(--forest); border-radius:10px; padding:1.8rem 2rem; margin-bottom:1.8rem; display:flex; align-items:center; justify-content:space-between; gap:1rem; }
  .welcome-text h2 { font-family:'Playfair Display',serif; font-size:1.4rem; color:#fff; margin:0 0 .35rem; }
  .welcome-text h2 span { color:var(--lime); }
  .welcome-text p { font-size:.85rem; color:rgba(255,255,255,.6); margin:0; }
  .btn-daftar { display:inline-block; padding:.65rem 1.4rem; background:var(--orange); color:#fff; border-radius:6px; font-size:.88rem; font-weight:500; text-decoration:none; white-space:nowrap; transition:background .2s; }
  .btn-daftar:hover { background:#e05a1f; color:#fff; }

  .badge-kelas  { display:inline-block; padding:.2rem .6rem; background:var(--lime); color:var(--forest); border-radius:4px; font-size:.75rem; font-weight:600; }
  .badge-ekskul { display:inline-block; padding:.15rem .5rem; background:#f0ece4; color:#555; border-radius:3px; font-size:.72rem; margin:1px 2px; }
</style>

<div class="welcome-banner">
  <div class="welcome-text">
    <h2>Halo, <span><?= htmlspecialchars($_SESSION['username']) ?></span></h2>
    <p>Lihat daftar siswa atau daftarkan diri ke ekstrakurikuler baru</p>
  </div>
  <a href="user.php" class="btn-daftar">Daftar Ekskul &rarr;</a>
</div>

<div class="card border" style="border-color:#ece8e0!important;border-radius:10px;overflow:hidden;">
  <div class="card-header bg-white py-3 px-4" style="border-bottom:1px solid #f0ece4;">
    <h2 class="mb-1" style="font-family:'Playfair Display',serif;font-size:1.15rem;color:var(--forest);">Data Siswa Terdaftar</h2>
    <p class="mb-0 text-muted" style="font-size:.8rem;">Semua siswa yang telah mendaftar ekstrakurikuler</p>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead style="background:#faf8f4;">
        <tr>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">NIS</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Nama</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Kelas</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Jenis Kelamin</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Ekskul</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
        while ($d = mysqli_fetch_array($data)):
        ?>
        <tr>
          <td class="px-4 py-3" style="font-family:monospace;color:#999;font-size:.82rem;"><?= htmlspecialchars($d['nis']) ?></td>
          <td class="px-4 py-3"><strong style="font-size:.875rem;"><?= htmlspecialchars($d['nama']) ?></strong></td>
          <td class="px-4 py-3"><span class="badge-kelas"><?= htmlspecialchars($d['kelas']) ?></span></td>
          <td class="px-4 py-3" style="font-size:.875rem;"><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
          <td class="px-4 py-3">
            <?php foreach (explode(',', $d['ekskul']) as $eks): ?>
              <span class="badge-ekskul"><?= htmlspecialchars(trim($eks)) ?></span>
            <?php endforeach; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
