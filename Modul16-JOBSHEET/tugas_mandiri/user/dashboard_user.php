<?php
$level_akses = "user";
$page_title  = "Dashboard";
$active      = "dashboard";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
include '../_sidebar_open.php';
?>

<style>
.welcome-banner {
  background: var(--forest);
  border-radius: 10px;
  padding: 1.8rem 2rem;
  margin-bottom: 1.8rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
}
.welcome-text h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.4rem;
  color: #fff;
  margin: 0 0 .35rem;
}
.welcome-text h2 span { color: var(--lime); }
.welcome-text p { font-size: .85rem; color: rgba(255,255,255,.6); margin: 0; }
.btn-daftar {
  display: inline-block;
  padding: .65rem 1.4rem;
  background: var(--orange);
  color: #fff;
  border-radius: 6px;
  font-size: .88rem;
  font-weight: 500;
  text-decoration: none;
  white-space: nowrap;
  transition: background .2s;
}
.btn-daftar:hover { background: #e05a1f; color: #fff; }

.section-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  overflow: hidden;
}
.section-header {
  padding: 1.4rem 1.8rem 1.2rem;
  border-bottom: 1px solid #f0ece4;
}
.section-title {
  font-family: 'Playfair Display', serif;
  font-size: 1.15rem;
  color: var(--forest);
  margin: 0 0 .2rem;
}
.section-sub { font-size: .8rem; color: #aaa; margin: 0; }

.table-custom {
  width: 100%;
  border-collapse: collapse;
}
.table-custom thead tr { background: #faf8f4; }
.table-custom th {
  padding: .8rem 1.2rem;
  font-size: .7rem;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: #aaa;
  font-weight: 500;
  text-align: left;
  border-bottom: 1px solid #f0ece4;
}
.table-custom td {
  padding: .9rem 1.2rem;
  font-size: .875rem;
  color: #444;
  border-bottom: 1px solid #f7f4f0;
  vertical-align: middle;
}
.table-custom tbody tr:last-child td { border-bottom: none; }
.table-custom tbody tr:hover { background: #fdfcfa; }

.badge-kelas {
  display: inline-block;
  padding: .2rem .6rem;
  background: var(--lime);
  color: var(--forest);
  border-radius: 4px;
  font-size: .75rem;
  font-weight: 600;
}
.badge-ekskul {
  display: inline-block;
  padding: .15rem .5rem;
  background: #f0ece4;
  color: #555;
  border-radius: 3px;
  font-size: .72rem;
  margin: 1px 2px;
}
</style>

<div class="welcome-banner">
  <div class="welcome-text">
    <h2>Halo, <span><?= htmlspecialchars($_SESSION['username']) ?></span></h2>
    <p>Lihat daftar siswa atau daftarkan diri ke ekstrakurikuler baru</p>
  </div>
  <a href="user.php" class="btn-daftar">Daftar Ekskul &rarr;</a>
</div>

<div class="section-card">
  <div class="section-header">
    <h2 class="section-title">Data Siswa Terdaftar</h2>
    <p class="section-sub">Semua siswa yang telah mendaftar ekstrakurikuler</p>
  </div>
  <div class="table-responsive">
    <table class="table-custom">
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
          <td><span style="font-family:monospace;color:#999;font-size:.82rem"><?= htmlspecialchars($d['nis']); ?></span></td>
          <td><strong><?= htmlspecialchars($d['nama']); ?></strong></td>
          <td><span class="badge-kelas"><?= htmlspecialchars($d['kelas']); ?></span></td>
          <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
          <td>
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

  </div>
</div>
</body>
</html>
