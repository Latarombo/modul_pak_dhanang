<?php
$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$result = $conn_l->query("SELECT * FROM tb_user ORDER BY id DESC");
?>

<div class="d-flex justify-content-between align-items-center mb-4">
  <h4 class="fw-bold mb-0"><i class="bi bi-people me-2 text-primary"></i>Manajemen User</h4>
  <a href="user/tambah.php" class="btn btn-primary">
    <i class="bi bi-plus-lg me-1"></i>Tambah User
  </a>
</div>

<!-- Tabel User -->
<div class="card border-0 shadow-sm">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <span class="fw-semibold"><i class="bi bi-list-ul me-2 text-primary"></i>Daftar User</span>
    <span class="badge bg-secondary"><?= $result->num_rows; ?> user</span>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="ps-3" style="width:50px">No</th>
            <th>Username</th>
            <th>Level</th>
            <th style="width:160px">Aksi</th>
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
                <td class="fw-semibold"><?= htmlspecialchars($row['username']); ?></td>
                <td>
                  <span class="badge <?= $row['level'] == 'admin' ? 'bg-danger' : 'bg-primary'; ?>">
                    <?= $row['level']; ?>
                  </span>
                </td>
                <td>
                  <div class="d-flex gap-1">
                    <a href="user/detail.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-primary" title="Detail">
                      <i class="bi bi-eye"></i>
                    </a>
                    <a href="user/edit.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-warning" title="Edit">
                      <i class="bi bi-pencil"></i>
                    </a>
                    <a href="user/delete.php?id=<?= $row['id']; ?>"
                      class="btn btn-sm btn-outline-danger" title="Hapus"
                      onclick="return confirm('Yakin ingin menghapus user ini?')">
                      <i class="bi bi-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; else: ?>
            <tr>
              <td colspan="4" class="text-center text-muted py-5">
                <i class="bi bi-inbox fs-1 d-block mb-2"></i>Belum ada data user.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
