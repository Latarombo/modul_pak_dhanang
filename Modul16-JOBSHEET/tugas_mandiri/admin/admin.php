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

<!-- Stats Row -->
<div class="row g-3 mb-4">
  <div class="col-sm-6 col-lg-3">
    <div class="card border" style="border-color:#ece8e0!important; border-radius:10px;">
      <div class="card-body">
        <div class="text-uppercase fw-medium mb-1" style="font-size:.72rem;letter-spacing:.1em;color:#aaa;">Total Siswa</div>
        <div style="font-family:'Playfair Display',serif;font-size:2.2rem;color:var(--forest);font-weight:700;"><?= $total_siswa ?></div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3">
    <div class="card border" style="border-color:#ece8e0!important;border-left:4px solid var(--orange)!important;border-radius:10px;">
      <div class="card-body">
        <div class="text-uppercase fw-medium mb-1" style="font-size:.72rem;letter-spacing:.1em;color:#aaa;">Total User</div>
        <div style="font-family:'Playfair Display',serif;font-size:2.2rem;color:var(--forest);font-weight:700;"><?= $total_user ?></div>
      </div>
    </div>
  </div>
</div>

<!-- Data Siswa -->
<div class="card border mb-4" id="siswa" style="border-color:#ece8e0!important;border-radius:10px;overflow:hidden;">
  <div class="card-header bg-white d-flex align-items-start justify-content-between py-3 px-4" style="border-bottom:1px solid #f0ece4;">
    <div>
      <h2 class="mb-1" style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--forest);">Data Siswa</h2>
      <p class="mb-0 text-muted" style="font-size:.8rem;">Daftar siswa yang terdaftar dalam ekstrakurikuler</p>
    </div>
    <a href="CRUD_pendaftaran/create.php"
      class="btn btn-sm text-white fw-medium"
      style="background:var(--forest);border-radius:6px;font-size:.82rem;white-space:nowrap;">
      + Tambah Siswa
    </a>
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
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM tb_siswa");
        while ($d = mysqli_fetch_array($data)):
        ?>
          <tr>
            <td class="px-4 py-3" style="font-family:monospace;font-size:.82rem;color:#888;"><?= htmlspecialchars($d['nis']) ?></td>
            <td class="px-4 py-3"><strong style="font-size:.875rem;"><?= htmlspecialchars($d['nama']) ?></strong></td>
            <td class="px-4 py-3">
              <span class="badge fw-semibold" style="background:var(--lime);color:var(--forest);font-size:.75rem;border-radius:4px;">
                <?= htmlspecialchars($d['kelas']) ?>
              </span>
            </td>
            <td class="px-4 py-3" style="font-size:.875rem;"><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
            <td class="px-4 py-3">
              <?php foreach (explode(',', $d['ekskul']) as $eks): ?>
                <span class="badge me-1" style="background:#f0ece4;color:#555;font-size:.72rem;border-radius:3px;font-weight:400;">
                  <?= htmlspecialchars(trim($eks)) ?>
                </span>
              <?php endforeach; ?>
            </td>
            <td class="px-4 py-3">
              <div class="d-flex gap-1 flex-wrap">
                <a href="CRUD_pendaftaran/detail.php?nis=<?= urlencode($d['nis']) ?>"
                  class="btn btn-sm" style="background:#f0f0f0;color:#555;font-size:.78rem;border-radius:4px;">Detail</a>
                <a href="CRUD_pendaftaran/edit.php?nis=<?= urlencode($d['nis']) ?>"
                  class="btn btn-sm" style="background:rgba(46,76,24,.1);color:var(--forest);font-size:.78rem;border-radius:4px;">Edit</a>
                <a href="CRUD_pendaftaran/delete.php?nis=<?= urlencode($d['nis']) ?>"
                  class="btn btn-sm" style="background:rgba(220,53,69,.08);color:#dc3545;font-size:.78rem;border-radius:4px;"
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
<div class="card border" id="user" style="border-color:#ece8e0!important;border-radius:10px;overflow:hidden;">
  <div class="card-header bg-white d-flex align-items-start justify-content-between py-3 px-4" style="border-bottom:1px solid #f0ece4;">
    <div>
      <h2 class="mb-1" style="font-family:'Playfair Display',serif;font-size:1.2rem;color:var(--forest);">Manajemen User</h2>
      <p class="mb-0 text-muted" style="font-size:.8rem;">Kelola akun yang dapat mengakses sistem</p>
    </div>
    <a href="CRUD_user/create_user.php"
      class="btn btn-sm text-white fw-medium"
      style="background:var(--forest);border-radius:6px;font-size:.82rem;white-space:nowrap;">
      + Tambah User
    </a>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead style="background:#faf8f4;">
        <tr>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">ID</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Username</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Level</th>
          <th class="text-uppercase fw-medium" style="font-size:.7rem;letter-spacing:.1em;color:#aaa;padding:.8rem 1.2rem;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $users = mysqli_query($conn, "SELECT * FROM tb_user");
        while ($u = mysqli_fetch_array($users)):
        ?>
          <tr>
            <td class="px-4 py-3" style="font-family:monospace;font-size:.82rem;color:#888;">#<?= htmlspecialchars($u['id']) ?></td>
            <td class="px-4 py-3"><strong style="font-size:.875rem;"><?= htmlspecialchars($u['username']) ?></strong></td>
            <td class="px-4 py-3">
              <?php if ($u['level'] === 'admin'): ?>
                <span class="badge fw-semibold" style="background:rgba(46,76,24,.12);color:var(--forest);font-size:.75rem;border-radius:4px;">Admin</span>
              <?php else: ?>
                <span class="badge fw-semibold" style="background:rgba(252,112,47,.12);color:var(--orange);font-size:.75rem;border-radius:4px;">User</span>
              <?php endif; ?>
            </td>
            <td class="px-4 py-3">
              <div class="d-flex gap-1">
                <a href="CRUD_user/edit_user.php?id=<?= urlencode($u['id']) ?>"
                  class="btn btn-sm" style="background:rgba(46,76,24,.1);color:var(--forest);font-size:.78rem;border-radius:4px;">Edit</a>
                <a href="CRUD_user/delete_user.php?id=<?= urlencode($u['id']) ?>"
                  class="btn btn-sm" style="background:rgba(220,53,69,.08);color:#dc3545;font-size:.78rem;border-radius:4px;"
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