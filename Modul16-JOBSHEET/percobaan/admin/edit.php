<?php
$level_akses = "admin";
include "../login_level/cek.php";
include "../login_level/koneksi.php";

// Validasi parameter NIS
if (!isset($_GET['nis']) || trim($_GET['nis']) === '') {
    header("Location: admin.php");
    exit();
}

$nis = trim($_GET['nis']);

// Ambil data dengan prepared statement
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

// Pecah hobi & ekskul yang tersimpan sebagai string CSV
$hobi_list   = !empty($d['hobi'])   ? explode(",", $d['hobi'])   : [];
$ekskul_list = !empty($d['ekskul']) ? explode(",", $d['ekskul']) : [];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            padding: 24px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border-radius: 8px;
            padding: 28px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            color: #6a0dad;
            margin-bottom: 6px;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        hr { border: none; border-top: 1px solid #ddd; margin-bottom: 20px; }

        .form-group {
            display: flex;
            align-items: flex-start;
            margin-bottom: 14px;
        }

        .form-group label.field-label {
            width: 140px;
            min-width: 140px;
            font-weight: bold;
            color: #444;
            padding-top: 8px;
            font-size: 14px;
        }

        .colon {
            padding: 8px 10px 0;
            color: #444;
        }

        .form-group input[type="text"],
        .form-group select,
        .form-group textarea {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6a0dad;
        }

        .tgl-group {
            display: flex;
            gap: 6px;
            align-items: center;
            flex: 1;
        }

        .tgl-group input { width: 55px; text-align: center; }
        .tgl-group input[name="thn"] { width: 75px; }

        .radio-group, .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-top: 4px;
            flex: 1;
        }

        .radio-group label, .checkbox-group label {
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        select[multiple] { height: 140px; }

        .readonly-field {
            flex: 1;
            padding: 8px 10px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            background: #f8f8f8;
            color: #666;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: flex-end;
        }

        .btn-submit {
            background: #6a0dad;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-submit:hover { background: #570aab; }

        .btn-cancel {
            background: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }

        .btn-cancel:hover { background: #5a6268; }

        .note { font-size: 13px; color: #777; margin-top: 10px; }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Data Siswa</h2>
        <p class="subtitle">NIS: <strong><?= htmlspecialchars($d['nis']); ?></strong></p>
        <hr>

        <form action="proses_update.php" method="POST">
            <!-- NIS disimpan sebagai hidden, tidak bisa diubah -->
            <input type="hidden" name="nis" value="<?= htmlspecialchars($d['nis']); ?>">

            <div class="form-group">
                <label class="field-label">NIS</label>
                <span class="colon">:</span>
                <div class="readonly-field"><?= htmlspecialchars($d['nis']); ?></div>
            </div>

            <div class="form-group">
                <label class="field-label">Nama</label>
                <span class="colon">:</span>
                <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required maxlength="100">
            </div>

            <div class="form-group">
                <label class="field-label">Kelas</label>
                <span class="colon">:</span>
                <select name="kelas" required>
                    <option value="X"   <?= $d['kelas'] === 'X'   ? 'selected' : ''; ?>>X</option>
                    <option value="XI"  <?= $d['kelas'] === 'XI'  ? 'selected' : ''; ?>>XI</option>
                    <option value="XII" <?= $d['kelas'] === 'XII' ? 'selected' : ''; ?>>XII</option>
                </select>
            </div>

            <div class="form-group">
                <label class="field-label">Tanggal Lahir</label>
                <span class="colon">:</span>
                <div class="tgl-group">
                    <input type="text" name="tgl" placeholder="DD" maxlength="2"
                           value="<?= date('d', strtotime($d['ttl'])); ?>" required>
                    <span>/</span>
                    <input type="text" name="bln" placeholder="MM" maxlength="2"
                           value="<?= date('m', strtotime($d['ttl'])); ?>" required>
                    <span>/</span>
                    <input type="text" name="thn" placeholder="YYYY" maxlength="4"
                           value="<?= date('Y', strtotime($d['ttl'])); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label class="field-label">Alamat</label>
                <span class="colon">:</span>
                <textarea name="alamat" rows="3" required maxlength="300"><?= htmlspecialchars($d['alamat']); ?></textarea>
            </div>

            <div class="form-group">
                <label class="field-label">Kota</label>
                <span class="colon">:</span>
                <input type="text" name="kota" value="<?= htmlspecialchars($d['kota']); ?>" required maxlength="50">
            </div>

            <div class="form-group">
                <label class="field-label">Jenis Kelamin</label>
                <span class="colon">:</span>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="jk" value="L" <?= $d['jk'] === 'L' ? 'checked' : ''; ?> required>
                        Laki-Laki
                    </label>
                    <label>
                        <input type="radio" name="jk" value="P" <?= $d['jk'] === 'P' ? 'checked' : ''; ?>>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="field-label">Hobi</label>
                <span class="colon">:</span>
                <div class="checkbox-group">
                    <?php
                    $hobi_options = ['Membaca', 'Olahraga', 'Menyanyi', 'Menari', 'Traveling'];
                    foreach ($hobi_options as $h):
                    ?>
                        <label>
                            <input type="checkbox" name="hobi[]" value="<?= $h; ?>"
                                   <?= in_array($h, $hobi_list) ? 'checked' : ''; ?>>
                            <?= $h; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="field-label">Ekskul</label>
                <span class="colon">:</span>
                <select name="ekskul[]" multiple required>
                    <?php
                    $ekskul_options = ['Pramuka', 'Basket', 'Volly', 'Band', 'Seni Tari', 'Robotic', 'Bulu Tangkis'];
                    foreach ($ekskul_options as $e):
                    ?>
                        <option value="<?= $e; ?>" <?= in_array($e, $ekskul_list) ? 'selected' : ''; ?>>
                            <?= $e; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <p class="note">Tahan Ctrl untuk pilih lebih dari satu ekskul</p>

            <div class="form-actions">
                <a href="admin.php" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
