<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .navbar-brand { font-weight: 700; letter-spacing: 0.5px; }
        .sidebar-card { border: none; border-radius: 12px; }
        .table thead th { background: #6a0dad; color: #fff; border: none; }
        .table tbody tr:hover td { background: #f9f5ff; }
        .badge-nis { background: #ede7f6; color: #6a0dad; font-weight: 600; }
        .btn-tambah { background: #6a0dad; border-color: #6a0dad; }
        .btn-tambah:hover { background: #570aab; border-color: #570aab; }
        .card { border: none; border-radius: 12px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background:#6a0dad;">
        <div class="container-fluid px-4">
            <span class="navbar-brand">
                <i class="bi bi-shield-lock-fill me-2"></i>Admin Panel
            </span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white-50" style="font-size:14px;">
                    <i class="bi bi-person-circle me-1"></i>
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="../login_level/logout.php" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-4">

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php
                    if ($_GET['success'] === '1') echo 'Data siswa berhasil ditambahkan.';
                    elseif ($_GET['success'] === 'updated') echo 'Data siswa berhasil diperbarui.';
                    elseif ($_GET['success'] === 'deleted') echo 'Data siswa berhasil dihapus.';
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Terjadi kesalahan: <?php echo htmlspecialchars($_GET['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <div>
                    <h5 class="mb-0 fw-semibold" style="color:#6a0dad;">
                        <i class="bi bi-people-fill me-2"></i>Data Siswa
                    </h5>
                    <small class="text-muted">Kelola data ekstrakurikuler siswa</small>
                </div>
                <a href="create.php" class="btn btn-tambah btn-sm text-white">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Data
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Ekskul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $conn->query("SELECT nis, nama, kelas, jk, ekskul FROM tb_siswa ORDER BY nama ASC");
                            if ($result && $result->num_rows > 0):
                                while ($d = $result->fetch_assoc()):
                            ?>
                                <tr>
                                    <td><span class="badge badge-nis px-2 py-1"><?= htmlspecialchars($d['nis']); ?></span></td>
                                    <td class="fw-semibold"><?= htmlspecialchars($d['nama']); ?></td>
                                    <td><span class="badge bg-secondary"><?= htmlspecialchars($d['kelas']); ?></span></td>
                                    <td>
                                        <?php if ($d['jk'] === 'L'): ?>
                                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                                <i class="bi bi-gender-male me-1"></i>Laki-Laki
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-danger bg-opacity-10 text-danger">
                                                <i class="bi bi-gender-female me-1"></i>Perempuan
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($d['ekskul']); ?></td>
                                    <td class="text-center">
                                        <a href="detail.php?nis=<?= urlencode($d['nis']); ?>" class="btn btn-sm btn-info text-white me-1" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="edit.php?nis=<?= urlencode($d['nis']); ?>" class="btn btn-sm btn-warning text-dark me-1" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="delete.php?nis=<?= urlencode($d['nis']); ?>"
                                           class="btn btn-sm btn-danger"
                                           title="Hapus"
                                           onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($d['nama']); ?>?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                endwhile;
                            else:
                            ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                                        Belum ada data siswa.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
