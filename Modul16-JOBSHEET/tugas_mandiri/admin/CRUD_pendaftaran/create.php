<?php
$level_akses = "admin";
include "../../login_level/cek.php";

$page_title = "Tambah Data Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<style>
.form-card {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  max-width: 720px;
}
.form-card-header {
  padding: 1.6rem 2rem 1.2rem;
  border-bottom: 1px solid #f0ece4;
}
.form-card-header h2 {
  font-family: 'Playfair Display', serif;
  font-size: 1.25rem;
  color: var(--forest);
  margin: 0 0 .2rem;
}
.form-card-header p { font-size: .82rem; color: #aaa; margin: 0; }
.form-card-body { padding: 2rem; }

.field-group { margin-bottom: 1.4rem; }
.field-label {
  display: block;
  font-size: .72rem;
  font-weight: 500;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: #666;
  margin-bottom: .45rem;
}
.required-star { color: var(--orange); margin-left: 2px; }
.field-hint { font-size: .72rem; color: #bbb; margin-top: .3rem; }

.form-control, .form-select {
  border: 1.5px solid #ddd;
  border-radius: 6px;
  padding: .65rem 1rem;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  background: #fff;
  transition: border-color .2s;
  width: 100%;
}
.form-control:focus, .form-select:focus {
  border-color: var(--forest);
  box-shadow: 0 0 0 3px rgba(46,76,24,.1);
  outline: none;
}
textarea.form-control { resize: vertical; min-height: 90px; }

.date-row { display: flex; gap: .6rem; align-items: center; }
.date-row .form-control { flex: 1; }
.date-sep { color: #bbb; font-size: 1.1rem; }

.check-group, .radio-group { display: flex; flex-wrap: wrap; gap: .5rem; }
.check-label, .radio-label {
  display: flex;
  align-items: center;
  gap: .4rem;
  background: #f7f4ef;
  border: 1.5px solid transparent;
  border-radius: 6px;
  padding: .45rem .9rem;
  font-size: .85rem;
  color: #555;
  cursor: pointer;
  transition: border-color .15s, background .15s;
  user-select: none;
}
.check-label:hover, .radio-label:hover { border-color: #ccc; background: #f0ece4; }
.check-label input, .radio-label input { width: 15px; height: 15px; accent-color: var(--forest); }
.check-label:has(input:checked),
.radio-label:has(input:checked) {
  border-color: var(--forest);
  background: rgba(46,76,24,.07);
  color: var(--forest);
  font-weight: 500;
}

.select-multi {
  border: 1.5px solid #ddd;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .88rem;
  padding: .4rem;
  width: 100%;
  background: #fff;
}
.select-multi:focus {
  border-color: var(--forest);
  box-shadow: 0 0 0 3px rgba(46,76,24,.1);
  outline: none;
}
.select-multi option { padding: .35rem .5rem; }
.select-multi option:checked { background: var(--forest); color: #fff; }

.form-divider {
  border: none;
  border-top: 1px solid #f0ece4;
  margin: 1.8rem 0;
}
.section-label-group {
  font-size: .68rem;
  font-weight: 600;
  letter-spacing: .14em;
  text-transform: uppercase;
  color: #aaa;
  margin-bottom: 1.2rem;
}

.btn-row { display: flex; gap: .75rem; margin-top: .5rem; }
.btn-submit {
  padding: .7rem 1.8rem;
  background: var(--forest);
  color: #fff;
  border: none;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  font-weight: 500;
  cursor: pointer;
  transition: background .2s;
}
.btn-submit:hover { background: #3d6420; }
.btn-reset {
  padding: .7rem 1.4rem;
  background: transparent;
  color: #888;
  border: 1.5px solid #ddd;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  cursor: pointer;
  transition: border-color .2s, color .2s;
}
.btn-reset:hover { border-color: #bbb; color: #555; }
.btn-back {
  display: inline-block;
  margin-bottom: 1.2rem;
  font-size: .82rem;
  color: #888;
  text-decoration: none;
}
.btn-back:hover { color: var(--forest); }
</style>

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-card">
  <div class="form-card-header">
    <h2>Tambah Data Siswa</h2>
    <p>Isi seluruh data dengan benar sebelum mengirim formulir</p>
  </div>
  <div class="form-card-body">
    <form action="proses_create.php" method="post">

      <p class="section-label-group">Identitas Siswa</p>

      <div class="field-group">
        <label class="field-label">NIS <span class="required-star">*</span></label>
        <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" required>
      </div>

      <div class="field-group">
        <label class="field-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
      </div>

      <div class="field-group">
        <label class="field-label">Kelas</label>
        <select name="kelas" class="form-select" required>
          <option value="">-- Pilih Kelas --</option>
          <option value="X">X</option>
          <option value="XI">XI</option>
          <option value="XII">XII</option>
        </select>
      </div>

      <div class="field-group">
        <label class="field-label">Tanggal Lahir</label>
        <div class="date-row">
          <input type="text" name="tgl" class="form-control" placeholder="DD" maxlength="2" required>
          <span class="date-sep">/</span>
          <input type="text" name="bln" class="form-control" placeholder="MM" maxlength="2" required>
          <span class="date-sep">/</span>
          <input type="text" name="thn" class="form-control" placeholder="YYYY" maxlength="4" required>
        </div>
      </div>

      <hr class="form-divider">
      <p class="section-label-group">Alamat & Kontak</p>

      <div class="field-group">
        <label class="field-label">Alamat</label>
        <textarea name="alamat" class="form-control" placeholder="Tulis alamat lengkap..." required></textarea>
      </div>

      <div class="field-group">
        <label class="field-label">Kota</label>
        <input type="text" name="kota" class="form-control" placeholder="Nama kota" required>
      </div>

      <hr class="form-divider">
      <p class="section-label-group">Data Tambahan</p>

      <div class="field-group">
        <label class="field-label">Jenis Kelamin</label>
        <div class="radio-group">
          <label class="radio-label">
            <input type="radio" name="jk" value="L" required> Laki-Laki
          </label>
          <label class="radio-label">
            <input type="radio" name="jk" value="P"> Perempuan
          </label>
        </div>
      </div>

      <div class="field-group">
        <label class="field-label">Hobi</label>
        <div class="check-group">
          <label class="check-label"><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
          <label class="check-label"><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
          <label class="check-label"><input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi</label>
          <label class="check-label"><input type="checkbox" name="hobi[]" value="Menari"> Menari</label>
          <label class="check-label"><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
        </div>
      </div>

      <div class="field-group">
        <label class="field-label">Ekstrakurikuler</label>
        <select name="ekskul[]" multiple size="7" class="select-multi" required>
          <option value="Pramuka">Pramuka</option>
          <option value="Basket">Basket</option>
          <option value="Volly">Volly</option>
          <option value="Band">Band</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Robotic">Robotic</option>
          <option value="Bulu Tangkis">Bulu Tangkis</option>
        </select>
        <p class="field-hint">Tahan Ctrl / Cmd untuk memilih lebih dari satu</p>
      </div>

      <div class="btn-row">
        <button type="submit" class="btn-submit">Simpan Data &rarr;</button>
        <button type="reset" class="btn-reset">Batal</button>
      </div>

    </form>
  </div>
</div>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
</body>
</html>
