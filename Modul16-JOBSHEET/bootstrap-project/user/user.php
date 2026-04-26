<?php
$level_akses = "user";
include "../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #0d6efd; border-radius: 12px 12px 0 0 !important; }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.2);
        }
        .form-check-input:checked { background-color: #0d6efd; border-color: #0d6efd; }
        select[multiple] { height: 150px; }
    </style>
</head>
<body class="py-4">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid px-4">
            <span class="navbar-brand fw-bold">
                <i class="bi bi-person-circle me-2"></i>Portal Siswa
            </span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white-50" style="font-size:14px;">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <a href="../login_level/logout.php" class="btn btn-sm btn-outline-light">
                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="max-width: 700px;">

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>Data berhasil dikirim!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-header text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-journal-plus me-2"></i>Pendaftaran Ekstrakurikuler
                </h5>
                <small class="opacity-75">Isi data di bawah ini untuk mendaftar</small>
            </div>
            <div class="card-body p-4">
                <form action="../admin/proses_create.php" method="post">

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">NIS <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="nis" class="form-control" required maxlength="20" placeholder="Masukkan NIS">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" class="form-control" required maxlength="100" placeholder="Nama lengkap">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Kelas <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="kelas" class="form-select" required>
                                <option value="">-- Pilih Kelas --</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" name="tgl" class="form-control text-center" placeholder="DD" maxlength="2" required style="max-width:70px;">
                                <span class="input-group-text">/</span>
                                <input type="text" name="bln" class="form-control text-center" placeholder="MM" maxlength="2" required style="max-width:70px;">
                                <span class="input-group-text">/</span>
                                <input type="text" name="thn" class="form-control text-center" placeholder="YYYY" maxlength="4" required style="max-width:90px;">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <textarea name="alamat" class="form-control" rows="3" required maxlength="300" placeholder="Alamat lengkap"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Kota <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="kota" class="form-control" required maxlength="50" placeholder="Nama kota">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                        <div class="col-sm-8 pt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="L" id="jkL" required>
                                <label class="form-check-label" for="jkL">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="P" id="jkP">
                                <label class="form-check-label" for="jkP">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Hobi</label>
                        <div class="col-sm-8 pt-2">
                            <?php foreach (['Membaca','Olahraga','Menyanyi','Menari','Traveling'] as $h): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hobi[]" value="<?= $h; ?>" id="hobi_<?= $h; ?>">
                                <label class="form-check-label" for="hobi_<?= $h; ?>"><?= $h; ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-semibold">Ekskul <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="ekskul[]" class="form-select" multiple required>
                                <option value="Pramuka">Pramuka</option>
                                <option value="Basket">Basket</option>
                                <option value="Volly">Volly</option>
                                <option value="Band">Band</option>
                                <option value="Seni Tari">Seni Tari</option>
                                <option value="Robotic">Robotic</option>
                                <option value="Bulu Tangkis">Bulu Tangkis</option>
                            </select>
                            <div class="form-text"><i class="bi bi-info-circle me-1"></i>Tahan <kbd>Ctrl</kbd> untuk pilih lebih dari satu.</div>
                        </div>
                    </div>

                    <p class="text-muted" style="font-size:13px;"><span class="text-danger">*</span> Wajib diisi</p>

                    <hr>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-secondary">
                            <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-1"></i>Kirim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
