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

        .form-group label {
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

        .form-group input[type="text"]:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6a0dad;
        }

        .tgl-group {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .tgl-group input { width: 55px; text-align: center; }
        .tgl-group input[name="thn"] { width: 75px; }

        .radio-group, .checkbox-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-top: 4px;
        }

        .radio-group label, .checkbox-group label {
            width: auto;
            min-width: auto;
            font-weight: normal;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        select[multiple] {
            height: 140px;
        }

        .required { color: #dc3545; margin-left: 2px; }

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

        .btn-reset {
            background: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-reset:hover { background: #5a6268; }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 14px;
            color: #6a0dad;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover { text-decoration: underline; }

        .note { font-size: 13px; color: #777; margin-top: 10px; }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pendaftaran Ekstrakurikuler</h2>
        <p class="subtitle">Isi data siswa di bawah ini</p>
        <hr>

        <form action="proses_create.php" method="post">

            <div class="form-group">
                <label>NIS <span class="required">*</span></label>
                <span class="colon">:</span>
                <input type="text" name="nis" required maxlength="20">
            </div>

            <div class="form-group">
                <label>Nama <span class="required">*</span></label>
                <span class="colon">:</span>
                <input type="text" name="nama" required maxlength="100">
            </div>

            <div class="form-group">
                <label>Kelas <span class="required">*</span></label>
                <span class="colon">:</span>
                <select name="kelas" required>
                    <option value="">-- Pilih --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir <span class="required">*</span></label>
                <span class="colon">:</span>
                <div class="tgl-group">
                    <input type="text" name="tgl" placeholder="DD" maxlength="2" required>
                    <span>/</span>
                    <input type="text" name="bln" placeholder="MM" maxlength="2" required>
                    <span>/</span>
                    <input type="text" name="thn" placeholder="YYYY" maxlength="4" required>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat <span class="required">*</span></label>
                <span class="colon">:</span>
                <textarea name="alamat" rows="3" required maxlength="300"></textarea>
            </div>

            <div class="form-group">
                <label>Kota <span class="required">*</span></label>
                <span class="colon">:</span>
                <input type="text" name="kota" required maxlength="50">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin <span class="required">*</span></label>
                <span class="colon">:</span>
                <div class="radio-group">
                    <label><input type="radio" name="jk" value="L" required> Laki-Laki</label>
                    <label><input type="radio" name="jk" value="P"> Perempuan</label>
                </div>
            </div>

            <div class="form-group">
                <label>Hobi</label>
                <span class="colon">:</span>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
                    <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
                    <label><input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi</label>
                    <label><input type="checkbox" name="hobi[]" value="Menari"> Menari</label>
                    <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
                </div>
            </div>

            <div class="form-group">
                <label>Ekskul <span class="required">*</span></label>
                <span class="colon">:</span>
                <select name="ekskul[]" multiple required>
                    <option value="Pramuka">Pramuka</option>
                    <option value="Basket">Basket</option>
                    <option value="Volly">Volly</option>
                    <option value="Band">Band</option>
                    <option value="Seni Tari">Seni Tari</option>
                    <option value="Robotic">Robotic</option>
                    <option value="Bulu Tangkis">Bulu Tangkis</option>
                </select>
            </div>

            <p class="note"><span class="required">*</span> Wajib diisi &nbsp;|&nbsp; Tahan Ctrl untuk pilih lebih dari satu ekskul</p>

            <div class="form-actions">
                <button type="reset" class="btn-reset">Reset</button>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>

        <a href="admin.php" class="back-link">← Kembali ke Dashboard</a>
    </div>
</body>

</html>
