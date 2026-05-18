<?php
$level_akses = "admin";
$from_sub    = true;
include "../../login/cek.php";

$host_l = "localhost"; $user_l = "root"; $pass_l = ""; $db_l = "db_latihan";
$conn_l = new mysqli($host_l, $user_l, $pass_l, $db_l);

$stmt = $conn_l->prepare("SELECT * FROM tb_user WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row    = $result->fetch_assoc();
?>

<?php include '../templates/header.php'; ?>
<?php include '../templates/sidebar.php'; ?>

<div class="main">
  <div class="content">

    <nav aria-label="breadcrumb" class="mb-3">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php?page=user" class="text-decoration-none">Manajemen User</a></li>
        <li class="breadcrumb-item active">Detail User</li>
      </ol>
    </nav>

    <h4 class="fw-bold mb-4">Detail User</h4>

    <div class="card border-0 shadow-sm" style="max-width: 600px;">
      <div class="card-body p-4">
        <table class="table table-bordered mb-0">
          <tr>
            <th style="width:40%">ID</th>
            <td><?= $row['id']; ?></td>
          </tr>
          <tr>
            <th>Username</th>
            <td><?= htmlspecialchars($row['username']); ?></td>
          </tr>
          <tr>
            <th>Level</th>
            <td>
              <span class="badge <?= $row['level'] == 'admin' ? 'bg-danger' : 'bg-primary'; ?>">
                <?= $row['level']; ?>
              </span>
            </td>
          </tr>
        </table>
      </div>
      <div class="card-footer bg-white d-flex gap-2">
        <a href="../index.php?page=user" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-dark">
          <i class="bi bi-pencil-square me-1"></i>Edit User
        </a>
      </div>
    </div>

  </div>
  <?php include '../templates/footer.php'; ?>
</div>
