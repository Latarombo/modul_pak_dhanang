<?php
$level_akses = "admin";
include "../../login_level/cek.php";

$page_title = "Tambah Data Siswa";
$active     = "siswa";
include '../../_sidebar_open.php';
?>

<a href="../admin.php" class="btn-back">&larr; Kembali ke Dashboard</a>

<div class="form-wrap">
  <div class="form-head">
    <h2>Tambah Data Siswa</h2>
    <p>Isi seluruh data dengan benar sebelum mengirim formulir</p>
  </div>
  <div class="form-body">
    <form action="proses_create.php" method="post">

      <p class="f-section">Identitas Siswa</p>

      <div class="field-block">
        <label class="f-label">NIS <span class="f-req">*</span></label>
        <input type="text" name="nis" class="f-control" placeholder="Nomor Induk Siswa" required>
      </div>

      <div class="field-block">
        <label class="f-label">Nama Lengkap <span class="f-req">*</span></label>
        <input type="text" name="nama" class="f-control" placeholder="Masukkan nama lengkap" required>
      </div>

      <div class="grid-2">
        <div class="field-block">
          <label class="f-label">Kelas <span class="f-req">*</span></label>
          <select name="kelas" class="f-select" required>
            <option value="">-- Pilih Kelas --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
        <div class="field-block">
          <label class="f-label">Tanggal Lahir <span class="f-req">*</span></label>
          <div class="date-row">
            <input type="text" name="tgl" class="f-control" placeholder="DD" maxlength="2" required>
            <span class="date-sep">/</span>
            <input type="text" name="bln" class="f-control" placeholder="MM" maxlength="2" required>
            <span class="date-sep">/</span>
            <input type="text" name="thn" class="f-control" placeholder="YYYY" maxlength="4" required>
          </div>
        </div>
      </div>

      <hr class="f-divider">
      <p class="f-section">Alamat &amp; Kontak</p>

      <div class="field-block">
        <label class="f-label">Alamat <span class="f-req">*</span></label>
        <textarea name="alamat" class="f-control" placeholder="Tulis alamat lengkap..." required></textarea>
      </div>

      <div class="field-block">
        <label class="f-label">Kota <span class="f-req">*</span></label>
        <input type="text" name="kota" class="f-control" placeholder="Nama kota" required>
      </div>

      <hr class="f-divider">
      <p class="f-section">Data Tambahan</p>

      <div class="field-block">
        <label class="f-label">Jenis Kelamin <span class="f-req">*</span></label>
        <div class="toggle-group">
          <label class="toggle-label"><input type="radio" name="jk" value="L" required> Laki-Laki</label>
          <label class="toggle-label"><input type="radio" name="jk" value="P"> Perempuan</label>
        </div>
      </div>

      <div class="field-block">
        <label class="f-label">Hobi</label>
        <div class="toggle-group">
          <label class="toggle-label"><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
          <label class="toggle-label"><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
          <label class="toggle-label"><input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi</label>
          <label class="toggle-label"><input type="checkbox" name="hobi[]" value="Menari"> Menari</label>
          <label class="toggle-label"><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
        </div>
      </div>

      <div class="field-block">
        <label class="f-label">Ekstrakurikuler <span class="f-req">*</span></label>
        <select name="ekskul[]" multiple size="7" class="select-multi" required>
          <option value="Pramuka">Pramuka</option>
          <option value="Basket">Basket</option>
          <option value="Volly">Volly</option>
          <option value="Band">Band</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Robotic">Robotic</option>
          <option value="Bulu Tangkis">Bulu Tangkis</option>
        </select>
        <p class="f-hint">Tahan Ctrl / Cmd untuk memilih lebih dari satu</p>
      </div>

      <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn-submit">Simpan Data</button>
        <button type="reset" class="btn-cancel">Batal</button>
      </div>

    </form>
  </div>
</div>

  </div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
