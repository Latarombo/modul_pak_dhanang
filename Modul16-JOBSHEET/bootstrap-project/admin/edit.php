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

$hobi_list   = !empty($d['hobi'])   ? explode(",", $d['hobi'])   : [];
$ekskul_list = !empty($d['ekskul']) ? explode(",", $d['ekskul']) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #e6910a; border-radius: 12px 12px 0 0 !important; }
        .form-control:focus, .form-select:focus {
            border-color: #e6910a;
            box-shadow: 0 0 0 0.2rem rgba(230,145,10,0.2);
        }
        .form-check-input:checked { background-color: #6a0dad; border-color: #6a0dad; }
        .btn-update { background: #e6910a; border-color: #e6910a; color: #fff; }
        .btn-update:hover { background: #c97e09; border-color: #c97e09; color: #fff; }
        select[multiple] { height: 150px; }
        .readonly-field { background: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6; border-radius: 6px; padding: 8px 12px; font-size: 14px; }
    </style>
</head>
<body class="py-4">

    <div class="container" style="max-width: 680px;">
        <div class="card shadow-sm">
            <div class="card-header text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-pencil-square me-2"></i>Edit Data Siswa
                </h5>
                <small class="opacity-75">NIS: <?= htmlspecialchars($d['nis']); ?></small>
            </div>
            <div class="card-body p-4">

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?php
                            $err = $_GET['error'];
                            if ($err === 'field_kosong') echo 'Semua field wajib harus diisi.';
                            elseif ($err === 'invalid_date') echo 'Tanggal lahir tidak valid.';
                            elseif ($err === 'ekskul_kosong') echo 'Pilih minimal satu ekskul.';
                            else echo htmlspecialchars($err);
                        ?>
                    </div>
                <?php endif; ?>

                <form action="proses_update.php" method="POST">
                    <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']); ?>">

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">NIS</label>
                        <div class="col-sm-8">
                            <div class="readonly-field"><?= htmlspecialchars($d['nis']); ?></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama']); ?>" required maxlength="100">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="kelas" class="form-select" required>
                                <option value="X"   <?= $d['kelas'] === 'X'   ? 'selected' : ''; ?>>X</option>
                                <option value="XI"  <?= $d['kelas'] === 'XI'  ? 'selected' : ''; ?>>XI</option>
                                <option value="XII" <?= $d['kelas'] === 'XII' ? 'selected' : ''; ?>>XII</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="tgl" class="form-control text-center" placeholder="DD" maxlength="2"
                                       value="<?= date('d', strtotime($d['ttl'])); ?>" required style="max-width:70px;">
                                <span class="input-group-text">/</span>
                                <input type="text" name="bln" class="form-control text-center" placeholder="MM" maxlength="2"
                                       value="<?= date('m', strtotime($d['ttl'])); ?>" required style="max-width:70px;">
                                <span class="input-group-text">/</span>
                                <input type="text" name="thn" class="form-control text-center" placeholder="YYYY" maxlength="4"
                                       value="<?= date('Y', strtotime($d['ttl'])); ?>" required style="max-width:90px;">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <textarea name="alamat" class="form-control" rows="3" required maxlength="300"><?= htmlspecialchars($d['alamat']); ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Kota <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="kota" class="form-control" value="<?= htmlspecialchars($d['kota']); ?>" required maxlength="50">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-sm-8 pt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="L" id="jkL" <?= $d['jk'] === 'L' ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="jkL">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="P" id="jkP" <?= $d['jk'] === 'P' ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="jkP">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Hobi</label>
                        <div class="col-sm-8 pt-2">
                            <?php foreach (['Membaca','Olahraga','Menyanyi','Menari','Traveling'] as $h): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobi[]" value="<?= $h; ?>"
                                       id="hobi_<?= $h; ?>" <?= in_array($h, $hobi_list) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="hobi_<?= $h; ?>"><?= $h; ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Ekskul <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="ekskul[]" class="form-select" multiple required>
                                <?php foreach (['Pramuka','Basket','Volly','Band','Seni Tari','Robotic','Bulu Tangkis'] as $e): ?>
                                    <option value="<?= $e; ?>" <?= in_array($e, $ekskul_list) ? 'selected' : ''; ?>><?= $e; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text"><i class="bi bi-info-circle me-1"></i>Tahan <kbd>Ctrl</kbd> untuk pilih lebih dari satu.</div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="admin.php" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-update">
                            <i class="bi bi-check-lg me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
