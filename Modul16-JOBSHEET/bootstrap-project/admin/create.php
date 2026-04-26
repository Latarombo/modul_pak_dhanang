<?php
$level_akses = "admin";
include "../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; }
        .card-header { background: #6a0dad; border-radius: 12px 12px 0 0 !important; }
        .form-control:focus, .form-select:focus {
            border-color: #6a0dad;
            box-shadow: 0 0 0 0.2rem rgba(106,13,173,0.2);
        }
        .form-check-input:checked { background-color: #6a0dad; border-color: #6a0dad; }
        .btn-purple { background: #6a0dad; border-color: #6a0dad; color: #fff; }
        .btn-purple:hover { background: #570aab; border-color: #570aab; color: #fff; }
        select[multiple] { height: 150px; }
    </style>
</head>
<body class="py-4">

    <div class="container" style="max-width: 680px;">
        <div class="card shadow-sm">
            <div class="card-header text-white py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-person-plus-fill me-2"></i>Pendaftaran Ekstrakurikuler
                </h5>
                <small class="opacity-75">Isi data siswa di bawah ini</small>
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

                <form action="proses_create.php" method="post">

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
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="admin.php" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Kembali
                        </a>
                        <div class="d-flex gap-2">
                            <button type="reset" class="btn btn-secondary">
                                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-purple">
                                <i class="bi bi-save me-1"></i>Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
