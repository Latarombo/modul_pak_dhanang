<?php
$level_akses = "admin";
include "../../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Siswa — Ekskul</title>
</head>
<body>

<nav>
  Sistem Ekstrakurikuler |
  <a href="../admin.php">Dashboard</a> |
  <a href="../admin.php#siswa">Data Siswa</a> |
  <a href="../admin.php#user">Manajemen User</a> |
  Login sebagai: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> (Admin) |
  <a href="../../login_level/logout.php">Logout</a>
</nav>
<hr>

<h1>Tambah Data Siswa</h1>

<p><a href="../admin.php">&larr; Kembali ke Dashboard</a></p>

<form action="proses_create.php" method="post">

  <h3>Identitas Siswa</h3>

  <p>
    <label>NIS *<br>
    <input type="text" name="nis" placeholder="Nomor Induk Siswa" required></label>
  </p>

  <p>
    <label>Nama Lengkap *<br>
    <input type="text" name="nama" placeholder="Masukkan nama lengkap" required></label>
  </p>

  <p>
    <label>Kelas *<br>
    <select name="kelas" required>
      <option value="">-- Pilih Kelas --</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
    </select></label>
  </p>

  <p>
    Tanggal Lahir *<br>
    <label>DD: <input type="text" name="tgl" placeholder="DD" maxlength="2" required></label>
    <label>MM: <input type="text" name="bln" placeholder="MM" maxlength="2" required></label>
    <label>YYYY: <input type="text" name="thn" placeholder="YYYY" maxlength="4" required></label>
  </p>

  <hr>
  <h3>Alamat &amp; Kontak</h3>

  <p>
    <label>Alamat *<br>
    <textarea name="alamat" placeholder="Tulis alamat lengkap..." required></textarea></label>
  </p>

  <p>
    <label>Kota *<br>
    <input type="text" name="kota" placeholder="Nama kota" required></label>
  </p>

  <hr>
  <h3>Data Tambahan</h3>

  <p>
    Jenis Kelamin *<br>
    <label><input type="radio" name="jk" value="L" required> Laki-Laki</label>
    <label><input type="radio" name="jk" value="P"> Perempuan</label>
  </p>

  <p>
    Hobi<br>
    <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
    <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
    <label><input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi</label>
    <label><input type="checkbox" name="hobi[]" value="Menari"> Menari</label>
    <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
  </p>

  <p>
    <label>Ekstrakurikuler * (Tahan Ctrl/Cmd untuk pilih lebih dari satu)<br>
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

  <p>
    <button type="submit">Simpan Data</button>
    <button type="reset">Batal</button>
  </p>

</form>

</body>
</html>
