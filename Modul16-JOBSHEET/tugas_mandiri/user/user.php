<?php
$level_akses = "user";
$page_title  = "Pendaftaran Ekstrakurikuler";
$active      = "daftar";
include "../login_level/cek.php";
include '../_sidebar_open.php';
?>

<style>
/* progress strip */
.wizard-strip {
  display: flex;
  gap: 0;
  margin-bottom: 2rem;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid #ece8e0;
}
.wizard-step {
  flex: 1;
  padding: .7rem 1rem;
  background: #fff;
  text-align: center;
  font-size: .72rem;
  font-weight: 500;
  letter-spacing: .08em;
  text-transform: uppercase;
  color: #bbb;
  border-right: 1px solid #ece8e0;
  position: relative;
}
.wizard-step:last-child { border-right: none; }
.wizard-step.active { background: var(--forest); color: var(--lime); }
.wizard-step.done   { background: #f0f8e8; color: var(--forest); }

/* form zones */
.form-zone {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  margin-bottom: 1.4rem;
  overflow: hidden;
}
.form-zone-header {
  padding: 1.2rem 1.8rem 1rem;
  border-bottom: 1px solid #f0ece4;
  display: flex;
  align-items: center;
  gap: .8rem;
}
.zone-number {
  width: 28px; height: 28px;
  border-radius: 50%;
  background: var(--forest);
  color: var(--lime);
  display: flex; align-items: center; justify-content: center;
  font-size: .78rem;
  font-weight: 700;
  flex-shrink: 0;
}
.zone-title {
  font-family: 'Playfair Display', serif;
  font-size: 1rem;
  color: var(--forest);
  margin: 0;
}
.form-zone-body { padding: 1.6rem 1.8rem; }

.field-group { margin-bottom: 1.2rem; }
.field-group:last-child { margin-bottom: 0; }
.field-label {
  display: block;
  font-size: .72rem;
  font-weight: 500;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: #666;
  margin-bottom: .4rem;
}
.required-star { color: var(--orange); }
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
textarea.form-control { resize: vertical; min-height: 80px; }

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
.select-multi option:checked { background: var(--forest); color: #fff; }

.submit-zone {
  background: #fff;
  border: 1px solid #ece8e0;
  border-radius: 10px;
  padding: 1.5rem 1.8rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
}
.submit-note { font-size: .8rem; color: #bbb; }
.submit-note span { color: var(--orange); }
.btn-row { display: flex; gap: .75rem; }
.btn-submit {
  padding: .75rem 2rem;
  background: var(--orange);
  color: #fff;
  border: none;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  font-weight: 500;
  cursor: pointer;
  transition: background .2s, transform .15s;
}
.btn-submit:hover { background: #e05a1f; transform: translateY(-1px); }
.btn-reset {
  padding: .75rem 1.2rem;
  background: transparent;
  color: #888;
  border: 1.5px solid #ddd;
  border-radius: 6px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  cursor: pointer;
}
.btn-reset:hover { border-color: #bbb; color: #555; }

.row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
@media (max-width: 540px) { .row-2 { grid-template-columns: 1fr; } }
</style>

<div class="wizard-strip">
  <div class="wizard-step active">1 &mdash; Identitas</div>
  <div class="wizard-step active">2 &mdash; Alamat</div>
  <div class="wizard-step active">3 &mdash; Ekskul</div>
</div>

<form action="../admin/CRUD_pendaftaran/proses_create.php" method="post">

  <!-- ZONE 1: Identitas -->
  <div class="form-zone">
    <div class="form-zone-header">
      <div class="zone-number">1</div>
      <h3 class="zone-title">Data Identitas Siswa</h3>
    </div>
    <div class="form-zone-body">
      <div class="row-2">
        <div class="field-group">
          <label class="field-label">NIS <span class="required-star">*</span></label>
          <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" required>
        </div>
        <div class="field-group">
          <label class="field-label">Kelas</label>
          <select name="kelas" class="form-select" required>
            <option value="">-- Pilih --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
      </div>

      <div class="field-group">
        <label class="field-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
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

      <div class="field-group">
        <label class="field-label">Jenis Kelamin</label>
        <div class="radio-group">
          <label class="radio-label"><input type="radio" name="jk" value="L" required> Laki-Laki</label>
          <label class="radio-label"><input type="radio" name="jk" value="P"> Perempuan</label>
        </div>
      </div>
    </div>
  </div>

  <!-- ZONE 2: Alamat -->
  <div class="form-zone">
    <div class="form-zone-header">
      <div class="zone-number">2</div>
      <h3 class="zone-title">Alamat & Domisili</h3>
    </div>
    <div class="form-zone-body">
      <div class="field-group">
        <label class="field-label">Alamat Lengkap</label>
        <textarea name="alamat" class="form-control" placeholder="Jalan, RT/RW, Kelurahan..." required></textarea>
      </div>
      <div class="field-group">
        <label class="field-label">Kota</label>
        <input type="text" name="kota" class="form-control" placeholder="Nama kota" required>
      </div>
    </div>
  </div>

  <!-- ZONE 3: Minat & Ekskul -->
  <div class="form-zone">
    <div class="form-zone-header">
      <div class="zone-number">3</div>
      <h3 class="zone-title">Minat & Ekstrakurikuler</h3>
    </div>
    <div class="form-zone-body">
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
        <label class="field-label">Pilih Ekstrakurikuler</label>
        <select name="ekskul[]" multiple size="7" class="select-multi" required>
          <option value="Pramuka">Pramuka</option>
          <option value="Basket">Basket</option>
          <option value="Volly">Volly</option>
          <option value="Band">Band</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Robotic">Robotic</option>
          <option value="Bulu Tangkis">Bulu Tangkis</option>
        </select>
        <p class="field-hint">Tahan Ctrl / Cmd untuk memilih lebih dari satu pilihan</p>
      </div>
    </div>
  </div>

  <!-- Submit -->
  <div class="submit-zone">
    <p class="submit-note"><span>*</span> Semua field wajib diisi sebelum mengirim</p>
    <div class="btn-row">
      <button type="reset" class="btn-reset">Reset</button>
      <button type="submit" class="btn-submit">Kirim Pendaftaran &rarr;</button>
    </div>
  </div>

</form>

  </div>
</div>
</body>
</html>
