<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: admin.php");
    exit();
}

$nis = trim($_GET['nis']);
$stmt = $conn->prepare("SELECT * FROM tb_siswa WHERE nis = ?");
$stmt->bind_param("s", $nis);
$stmt->execute();
$result = $stmt->get_result();
$d      = $result->fetch_assoc();
$stmt->close();

if (!$d) {
    header("Location: admin.php?error=not_found");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Siswa - <?= htmlspecialchars($d['nama']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #6a0dad; border-radius: 12px 12px 0 0 !important; }
        .info-label { color: #6c757d; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; }
        .info-value { font-size: 15px; color: #212529; }
        .avatar { width: 72px; height: 72px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; font-weight: 700; }
    </style>
</head>
<body class="py-4">

    <div class="container" style="max-width: 620px;">
        <div class="card shadow-sm">
            <div class="card-header text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-person-badge-fill me-2"></i>Detail Data Siswa
                </h5>
            </div>
            <div class="card-body p-4">

                <!-- Avatar & nama -->
                <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                    <div class="avatar <?= $d['jk'] === 'L' ? 'bg-primary bg-opacity-10 text-primary' : 'bg-danger bg-opacity-10 text-danger'; ?>">
                        <?= strtoupper(substr($d['nama'], 0, 1)); ?>
                    </div>
                    <div>
                        <h5 class="mb-0 fw-bold"><?= htmlspecialchars($d['nama']); ?></h5>
                        <span class="badge bg-secondary"><?= htmlspecialchars($d['kelas']); ?></span>
                        <?php if ($d['jk'] === 'L'): ?>
                            <span class="badge bg-primary ms-1"><i class="bi bi-gender-male me-1"></i>Laki-Laki</span>
                        <?php else: ?>
                            <span class="badge bg-danger ms-1"><i class="bi bi-gender-female me-1"></i>Perempuan</span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="info-label">NIS</div>
                        <div class="info-value fw-semibold" style="color:#6a0dad;"><?= htmlspecialchars($d['nis']); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-label">Tanggal Lahir</div>
                        <div class="info-value"><?= date('d-m-Y', strtotime($d['ttl'])); ?></div>
                    </div>
                    <div class="col-12">
                        <div class="info-label">Alamat</div>
                        <div class="info-value"><?= htmlspecialchars($d['alamat']); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-label">Kota</div>
                        <div class="info-value"><?= htmlspecialchars($d['kota']); ?></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="info-label">Hobi</div>
                        <div class="info-value"><?= !empty($d['hobi']) ? htmlspecialchars($d['hobi']) : '<span class="text-muted">-</span>'; ?></div>
                    </div>
                    <div class="col-12">
                        <div class="info-label">Ekskul</div>
                        <div class="mt-1">
                            <?php foreach (explode(',', $d['ekskul']) as $ekskul): ?>
                                <span class="badge me-1 mb-1" style="background:#ede7f6; color:#6a0dad;">
                                    <i class="bi bi-star-fill me-1" style="font-size:10px;"></i><?= htmlspecialchars(trim($ekskul)); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <hr class="mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="admin.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Kembali
                    </a>
                    <div class="d-flex gap-2">
                        <a href="edit.php?nis=<?= urlencode($d['nis']); ?>" class="btn btn-warning text-dark">
                            <i class="bi bi-pencil me-1"></i>Edit
                        </a>
                        <a href="delete.php?nis=<?= urlencode($d['nis']); ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($d['nama']); ?>?')">
                            <i class="bi bi-trash me-1"></i>Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
