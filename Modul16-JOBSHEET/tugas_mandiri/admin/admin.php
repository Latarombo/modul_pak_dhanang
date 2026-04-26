<?php
$level_akses = "admin";
include "../login_level/cek.php";
include '../login_level/koneksi.php';

$page_title = "Dashboard Admin";
$active     = "dashboard";
include '../_sidebar_open.php';
?>

<?php
$total_siswa = mysqli_num_rows(mysqli_query($conn, "SELECT nis FROM tb_siswa"));
$total_user  = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM tb_user"));
?>

<!-- Stats -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="stat-card">
      <div class="stat-label">Total Siswa</div>
      <div class="stat-value"><?= $total_siswa ?></div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="stat-card accent">
      <div class="stat-label">Total User</div>
      <div class="stat-value"><?= $total_user ?></div>
    </div>
  </div>
</div>

<!-- Data Siswa -->
<div class="section-card mb-4" id="siswa">
  <div class="section-card-header">
    <div>
      <p class="section-card-title">Data Siswa</p>
      <p class="section-card-sub">Daftar siswa yang terdaftar dalam ekstrakurikuler</p>
    </div>
    <a href="CRUD_pendaftaran/create.php" class="btn-primary-act">+ Tambah Siswa</a>
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
          <th>Aksi</th>
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
          <td>
            <div class="d-flex gap-1 flex-wrap">
              <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']) ?>" class="btn-act btn-act-detail">Detail</a>
              <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']) ?>" class="btn-act btn-act-edit">Edit</a>
              <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']) ?>" class="btn-act btn-act-delete"
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
  <div class="section-card-header">
    <div>
      <p class="section-card-title">Manajemen User</p>
      <p class="section-card-sub">Kelola akun yang dapat mengakses sistem</p>
    </div>
    <a href="CRUD_user/create_user.php" class="btn-primary-act">+ Tambah User</a>
  </div>
  <div class="table-responsive">
    <table class="tbl">
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
          <td><span class="mono">#<?= htmlspecialchars($u['id']) ?></span></td>
          <td><strong><?= htmlspecialchars($u['username']) ?></strong></td>
          <td>
            <span class="chip <?= $u['level'] === 'admin' ? 'chip-admin' : 'chip-user' ?>">
              <?= ucfirst($u['level']) ?>
            </span>
          </td>
          <td>
            <div class="d-flex gap-1">
              <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']) ?>" class="btn-act btn-act-edit">Edit</a>
              <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']) ?>" class="btn-act btn-act-delete"
                 onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
            </div>
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
