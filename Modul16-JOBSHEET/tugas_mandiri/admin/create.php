<?php
$level_akses = "admin";
include "../login_level/cek.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Ekstrakurikuler</title>
  <style>
    table {
      border: 1px solid black;
      border-collapse: collapse;
      margin: auto;
    }

    td {
      padding: 5px;
    }

    .label {
      width: 120px;
    }

    .colon {
      width: 10px;
    }
  </style>
</head>

<body>
  <form action="proses_create.php" method="post">
    <table>
      <tr>
        <td colspan="3" align="center">
          <b>
            <font color="purple" size="4">Pendaftaran Ekstrakurikuler</font>
          </b>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <hr>
        </td>
      </tr>

      <tr>
        <td class="label">NIS</td>
        <td class="colon">:</td>
        <td><input type="text" name="nis" required>
          <font color="red">*</font>
        </td>
      </tr>

      <tr>
        <td class="label">Nama</td>
        <td class="colon">:</td>
        <td><input type="text" name="nama" required></td>
      </tr>

      <tr>
        <td class="label">Kelas</td>
        <td class="colon">:</td>
        <td>
          <select name="kelas" required>
            <option value="">-- Pilih --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </td>
      </tr>

      <tr>
        <td class="label">Tgl Lahir</td>
        <td class="colon">:</td>
        <td>
          <input type="text" name="tgl" size="2" placeholder="DD" required> /
          <input type="text" name="bln" size="2" placeholder="MM" required> /
          <input type="text" name="thn" size="4" placeholder="YYYY" required>
        </td>
      </tr>

      <tr>
        <td class="label">Alamat</td>
        <td class="colon">:</td>
        <td><textarea name="alamat" cols="30" rows="3" required></textarea></td>
      </tr>

      <tr>
        <td class="label">Kota</td>
        <td class="colon">:</td>
        <td><input type="text" name="kota" required></td>
      </tr>

      <tr>
        <td class="label">Jenis Kelamin</td>
        <td class="colon">:</td>
        <td>
          <input type="radio" name="jk" value="L" required> Laki-Laki
          <input type="radio" name="jk" value="P"> Perempuan
        </td>
      </tr>

      <tr>
        <td class="label">Hobi</td>
        <td class="colon">:</td>
        <td>
          <input type="checkbox" name="hobi[]" value="Membaca"> Membaca<br>
          <input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br>
          <input type="checkbox" name="hobi[]" value="Menyanyi"> Menyanyi<br>
          <input type="checkbox" name="hobi[]" value="Menari"> Menari<br>
          <input type="checkbox" name="hobi[]" value="Traveling"> Traveling
        </td>
      </tr>

      <tr>
        <td class="label">Ekskul</td>
        <td class="colon">:</td>
        <td>
          <select name="ekskul[]" multiple size="5" required>
            <option value="Pramuka">Pramuka</option>
            <option value="Basket">Basket</option>
            <option value="Volly">Volly</option>
            <option value="Band">Band</option>
            <option value="Seni Tari">Seni Tari</option>
            <option value="Robotic">Robotic</option>
            <option value="Bulu Tangkis">Bulu Tangkis</option>
          </select>
        </td>
      </tr>

      <tr>
        <td colspan="3">
          <input type="submit" value="Kirim">
          <input type="reset" value="Cancel">
        </td>
      </tr>

      <tr>
        <td colspan="3">
          <font color="red">*</font> Harus diisi
        </td>
      </tr>
    </table>
  </form>
</body>

</html>
