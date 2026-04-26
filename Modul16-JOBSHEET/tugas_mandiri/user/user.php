<?php
$level_akses = "user";
$page_title  = "Pendaftaran Ekstrakurikuler";
$active      = "daftar";
include "../login_level/cek.php";
include '../_sidebar_open.php';
?>

<style>
  .wizard-bar {
    display: flex;
    gap: 0;
    margin-bottom: 1.75rem;
    border-radius: 5px;
    overflow: hidden;
    border: 1px solid var(--border);
  }
  .wizard-step {
    flex: 1;
    padding: .6rem .8rem;
    background: #fff;
    text-align: center;
    font-size: .67rem;
    font-weight: 600;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #bbb;
    border-right: 1px solid var(--border);
  }
  .wizard-step:last-child { border-right: none; }
  .wizard-step.active { background: var(--forest); color: var(--lime); }
</style>

<div class="wizard-bar">
  <div class="wizard-step active">1 — Identitas</div>
  <div class="wizard-step active">2 — Alamat</div>
  <div class="wizard-step active">3 — Ekskul</div>
</div>

<form action="../admin/CRUD_pendaftaran/proses_create.php" method="post">

  <!-- Zone 1 -->
  <div class="form-wrap mb-3" style="max-width:100%;">
    <div class="form-head" style="display:flex;align-items:center;gap:.75rem;">
      <div style="width:26px;height:26px;border-radius:50%;background:var(--forest);color:var(--lime);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;flex-shrink:0;">1</div>
      <div>
        <h2 style="margin:0;font-size:.95rem;">Data Identitas Siswa</h2>
      </div>
    </div>
    <div class="form-body">
      <div class="grid-2">
        <div class="field-block">
          <label class="f-label">NIS <span class="f-req">*</span></label>
          <input type="text" name="nis" class="f-control" placeholder="Nomor Induk Siswa" required>
        </div>
        <div class="field-block">
          <label class="f-label">Kelas <span class="f-req">*</span></label>
          <select name="kelas" class="f-select" required>
            <option value="">-- Pilih --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>
      </div>
      <div class="field-block">
        <label class="f-label">Nama Lengkap <span class="f-req">*</span></label>
        <input type="text" name="nama" class="f-control" placeholder="Masukkan nama lengkap" required>
      </div>
      <div class="grid-2">
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
        <div class="field-block">
          <label class="f-label">Jenis Kelamin <span class="f-req">*</span></label>
          <div class="toggle-group">
            <label class="toggle-label"><input type="radio" name="jk" value="L" required> Laki-Laki</label>
            <label class="toggle-label"><input type="radio" name="jk" value="P"> Perempuan</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Zone 2 -->
  <div class="form-wrap mb-3" style="max-width:100%;">
    <div class="form-head" style="display:flex;align-items:center;gap:.75rem;">
      <div style="width:26px;height:26px;border-radius:50%;background:var(--forest);color:var(--lime);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;flex-shrink:0;">2</div>
      <div>
        <h2 style="margin:0;font-size:.95rem;">Alamat &amp; Domisili</h2>
      </div>
    </div>
    <div class="form-body">
      <div class="field-block">
        <label class="f-label">Alamat Lengkap <span class="f-req">*</span></label>
        <textarea name="alamat" class="f-control" placeholder="Jalan, RT/RW, Kelurahan..." required></textarea>
      </div>
      <div class="field-block">
        <label class="f-label">Kota <span class="f-req">*</span></label>
        <input type="text" name="kota" class="f-control" placeholder="Nama kota" required>
      </div>
    </div>
  </div>

  <!-- Zone 3 -->
  <div class="form-wrap mb-3" style="max-width:100%;">
    <div class="form-head" style="display:flex;align-items:center;gap:.75rem;">
      <div style="width:26px;height:26px;border-radius:50%;background:var(--forest);color:var(--lime);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;flex-shrink:0;">3</div>
      <div>
        <h2 style="margin:0;font-size:.95rem;">Minat &amp; Ekstrakurikuler</h2>
      </div>
    </div>
    <div class="form-body">
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
        <label class="f-label">Pilih Ekstrakurikuler <span class="f-req">*</span></label>
        <select name="ekskul[]" multiple size="7" class="select-multi" required>
          <option value="Pramuka">Pramuka</option>
          <option value="Basket">Basket</option>
          <option value="Volly">Volly</option>
          <option value="Band">Band</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Robotic">Robotic</option>
          <option value="Bulu Tangkis">Bulu Tangkis</option>
        </select>
        <p class="f-hint">Tahan Ctrl / Cmd untuk memilih lebih dari satu pilihan</p>
      </div>
    </div>
  </div>

  <!-- Submit -->
  <div class="form-wrap" style="max-width:100%;border-radius:5px;">
    <div class="form-body" style="padding:1rem 1.75rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;">
      <p style="font-size:.78rem;color:#bbb;margin:0;"><span style="color:var(--orange);">*</span> Semua field wajib diisi</p>
      <div class="d-flex gap-2">
        <button type="reset" class="btn-cancel">Reset</button>
        <button type="submit" class="btn-submit">Kirim Pendaftaran</button>
      </div>
    </div>
  </div>

</form>

</div><!-- /page-body -->
</div><!-- /main-wrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
