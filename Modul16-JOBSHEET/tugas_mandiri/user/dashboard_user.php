<?php
$level_akses = "user";
$page_title  = "Dashboard";
$active      = "dashboard";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
include '../_sidebar_open.php';
?>

<div class="welcome-banner">
  <div>
    <h2>Halo, <span><?= htmlspecialchars($_SESSION['username']) ?></span></h2>
    <p>Lihat daftar siswa atau daftarkan diri ke ekstrakurikuler baru</p>
  </div>
  <a href="user.php" class="btn-submit" style="text-decoration:none;white-space:nowrap;">Daftar Ekskul</a>
</div>

<div class="section-card">
  <div class="section-card-header">
    <div>
      <p class="section-card-title">Data Siswa Terdaftar</p>
      <p class="section-card-sub">Semua siswa yang telah mendaftar ekstrakurikuler</p>
    </div>
  </div>
  <div class="table-responsive">
    <table class="tbl">
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Ekskul</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
        while ($d = mysqli_fetch_array($data)):
        ?>
        <tr>
          <td><span class="mono"><?= htmlspecialchars($d['nis']) ?></span></td>
          <td><strong><?= htmlspecialchars($d['nama']) ?></strong></td>
          <td><span class="chip chip-kelas"><?= htmlspecialchars($d['kelas']) ?></span></td>
          <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
          <td>
            <?php foreach (explode(',', $d['ekskul']) as $eks): ?>
              <span class="chip chip-ekskul"><?= htmlspecialchars(trim($eks)) ?></span>
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
