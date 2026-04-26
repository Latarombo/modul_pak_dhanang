<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

$page_title = "Dashboard Admin";
$active     = "dashboard";
include '../_sidebar_open.php';
?>

<!-- Stats row -->
<?php
$total_siswa = mysqli_num_rows(mysqli_query($conn, "SELECT nis FROM tb_siswa"));
$total_user  = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM tb_user"));
?>
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-label">Total Siswa</div>
      <div class="stat-value"><?= $total_siswa ?></div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="stat-card stat-card--accent">
      <div class="stat-label">Total User</div>
      <div class="stat-value"><?= $total_user ?></div>
    </div>
  </div>
</div>

<!-- Data Siswa -->
<div class="section-card mb-4" id="siswa">
  <div class="section-header">
    <div>
      <h2 class="section-title">Data Siswa</h2>
      <p class="section-sub">Daftar siswa yang terdaftar dalam ekstrakurikuler</p>
    </div>
    <a href="CRUD_pendaftaran/create.php" class="btn-primary-custom">+ Tambah Siswa</a>
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
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
        while ($d = mysqli_fetch_array($data)):
        ?>
        <tr>
          <td><span class="mono"><?= htmlspecialchars($d['nis']); ?></span></td>
          <td><strong><?= htmlspecialchars($d['nama']); ?></strong></td>
          <td><span class="badge-kelas"><?= htmlspecialchars($d['kelas']); ?></span></td>
          <td><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
          <td>
            <?php foreach (explode(',', $d['ekskul']) as $eks): ?>
              <span class="badge-ekskul"><?= htmlspecialchars(trim($eks)) ?></span>
            <?php endforeach; ?>
          </td>
          <td>
            <div class="action-group">
              <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']); ?>" class="act-link">Detail</a>
              <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']); ?>" class="act-link act-link--edit">Edit</a>
              <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']); ?>"
                 class="act-link act-link--del"
                 onclick="return confirm('Yakin ingin menghapus siswa ini?')">Hapus</a>
            </div>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Data User -->
<div class="section-card" id="user">
  <div class="section-header">
    <div>
      <h2 class="section-title">Manajemen User</h2>
      <p class="section-sub">Kelola akun yang dapat mengakses sistem</p>
    </div>
    <a href="CRUD_user/create_user.php" class="btn-primary-custom">+ Tambah User</a>
  </div>

  <div class="table-responsive">
    <table class="table-custom">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $users = mysqli_query($conn, "SELECT * FROM tb_user");
        while ($u = mysqli_fetch_array($users)):
        ?>
        <tr>
          <td><span class="mono">#<?= htmlspecialchars($u['id']); ?></span></td>
          <td><strong><?= htmlspecialchars($u['username']); ?></strong></td>
          <td>
            <span class="badge-level badge-level--<?= $u['level'] ?>">
              <?= ucfirst($u['level']) ?>
            </span>
          </td>
          <td>
            <div class="action-group">
              <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']); ?>" class="act-link act-link--edit">Edit</a>
              <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']); ?>"
                 class="act-link act-link--del"
                 onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
            </div>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<style>
.stat-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  padding: 1.4rem 1.6rem;
}
.stat-card--accent { border-left: 4px solid var(--orange); }
.stat-label {
  font-size: .72rem;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: #aaa;
  margin-bottom: .4rem;
}
.stat-value {
  font-family: 'Playfair Display', serif;
  font-size: 2.2rem;
  color: var(--forest);
  font-weight: 700;
}

.section-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  overflow: hidden;
}
.section-header {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  padding: 1.5rem 1.8rem 1.2rem;
  border-bottom: 1px solid #f0ece4;
  gap: 1rem;
}
.section-title {
  font-family: 'Playfair Display', serif;
  font-size: 1.2rem;
  color: var(--forest);
  margin: 0 0 .2rem;
}
.section-sub { font-size: .8rem; color: #aaa; margin: 0; }

.btn-primary-custom {
  display: inline-block;
  padding: .55rem 1.1rem;
  background: var(--forest);
  color: #fff;
  border-radius: 6px;
  font-size: .82rem;
  font-weight: 500;
  text-decoration: none;
  white-space: nowrap;
  transition: background .2s;
}
.btn-primary-custom:hover { background: #3d6420; color: #fff; }

.table-custom {
  width: 100%;
  border-collapse: collapse;
}
.table-custom thead tr {
  background: #faf8f4;
}
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

.mono { font-family: monospace; font-size: .82rem; color: #888; }

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
.badge-level {
  display: inline-block;
  padding: .2rem .65rem;
  border-radius: 4px;
  font-size: .75rem;
  font-weight: 600;
}
.badge-level--admin { background: rgba(46,76,24,.12); color: var(--forest); }
.badge-level--user  { background: rgba(252,112,47,.12); color: var(--orange); }

.action-group { display: flex; gap: .5rem; flex-wrap: wrap; }
.act-link {
  font-size: .78rem;
  text-decoration: none;
  padding: .25rem .6rem;
  border-radius: 4px;
  font-weight: 500;
  transition: background .15s;
}
.act-link         { background: #f0f0f0; color: #555; }
.act-link:hover   { background: #e4e4e4; color: #333; }
.act-link--edit   { background: rgba(46,76,24,.1); color: var(--forest); }
.act-link--edit:hover { background: rgba(46,76,24,.2); color: var(--forest); }
.act-link--del    { background: rgba(220,53,69,.08); color: #dc3545; }
.act-link--del:hover { background: rgba(220,53,69,.18); color: #dc3545; }
</style>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
</body>
</html>
