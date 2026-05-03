<?php
$level_akses = "user";
$page_title  = "Pendaftaran Ekstrakurikuler";
$active      = "daftar";
include "../login_level/cek.php";

// Kalau sudah daftar di sesi ini, tidak boleh ke halaman ini lagi
if ($_SESSION['sudah_daftar'] === true) {
    header("Location: dashboard_user.php");
    exit();
}

include '../_sidebar_open.php';
?>

<h2>Form Pendaftaran Ekstrakurikuler</h2>
<p>* Semua field wajib diisi</p>

<form action="../admin/CRUD_pendaftaran/proses_create.php" method="post">

  <h3>1 — Data Identitas Siswa</h3>

  <p>
    <label>NIS *<br>
    <input type="text" name="nis" placeholder="Nomor Induk Siswa" required></label>
  </p>

  <p>
    <label>Kelas *<br>
    <select name="kelas" required>
      <option value="">-- Pilih --</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
    </select></label>
  </p>

  <p>
    <label>Nama Lengkap *<br>
    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required></label>
  </p>

  <p>
    Tanggal Lahir *<br>
    <label>DD: <input type="text" name="tgl" placeholder="DD" maxlength="2" required></label>
    <label>MM: <input type="text" name="bln" placeholder="MM" maxlength="2" required></label>
    <label>YYYY: <input type="text" name="thn" placeholder="YYYY" maxlength="4" required></label>
  </p>

  <p>
    Jenis Kelamin *<br>
    <label><input type="radio" name="jk" value="L" required> Laki-Laki</label>
    <label><input type="radio" name="jk" value="P"> Perempuan</label>
  </p>

  <hr>
  <h3>2 — Alamat &amp; Domisili</h3>

  <p>
    <label>Alamat Lengkap *<br>
    <textarea name="alamat" placeholder="Jalan, RT/RW, Kelurahan..." required></textarea></label>
  </p>

  <p>
    <label>Kota *<br>
    <input type="text" name="kota" placeholder="Nama kota" required></label>
  </p>

  <hr>
  <h3>3 — Minat &amp; Ekstrakurikuler</h3>

  <p>
    Hobi<br>
    <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
    <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
    <label><input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi</label>
    <label><input type="checkbox" name="hobi[]" value="Menari"> Menari</label>
    <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
  </p>

  <p>
    <label>Pilih Ekstrakurikuler * (Tahan Ctrl/Cmd untuk pilih lebih dari satu)<br>
    <select name="ekskul[]" multiple size="7" required>
      <option value="Pramuka">Pramuka</option>
      <option value="Basket">Basket</option>
      <option value="Volly">Volly</option>
      <option value="Band">Band</option>
      <option value="Seni Tari">Seni Tari</option>
      <option value="Robotic">Robotic</option>
      <option value="Bulu Tangkis">Bulu Tangkis</option>
    </select></label>
  </p>

  <hr>
  <p>
    <button type="submit">Kirim Pendaftaran</button>
    <button type="reset">Reset</button>
  </p>

</form>

</body>
</html>
