<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Pendaftaran Ekstrakurikuler</title>
  <style>
    table {
      border: 1px solid black;
      border-collapse: collapse;
      width: auto;
      margin: auto;
    }

    td {
      padding: 4px 6px;
      vertical-align: middle;
    }

    .label {
      width: 100px;
    }

    .colon {
      width: 10px;
      vertical-align: top;
      padding-top: 6px;
    }

    .top {
      vertical-align: top;
      padding-top: 6px;
    }
  </style>
</head>

<body>
  <form action="proses_pendaftaran.php" method="post" name="input">
    <table>
      <tr>
        <td colspan="3" align="center">
          <b><font color="purple" size="4">Pendaftaran Ekstrakurikuler</font></b>
        </td>
      </tr>
      <tr>
        <td colspan="3"><hr></td>
      </tr>

      <tr>
        <td class="label">NIS</td>
        <td class="colon" style="vertical-align: middle;">:</td>
        <td><input type="text" name="nis" required> <font color="red">*</font></td>
      </tr>
      <tr>
        <td class="label">Nama</td>
        <td class="colon" style="vertical-align: middle;">:</td>
        <td><input type="text" name="nama" size="30" required></td>
      </tr>
      <tr>
        <td class="label">Kelas</td>
        <td class="colon" style="vertical-align: middle;">:</td>
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
        <td class="colon" style="vertical-align: middle;">:</td>
        <td>
          <input type="text" name="tgl" size="3" maxlength="2" placeholder="DD" required> /
          <input type="text" name="bln" size="3" maxlength="2" placeholder="MM" required> /
          <input type="text" name="thn" size="5" maxlength="4" placeholder="YYYY" required>
        </td>
      </tr>
      <tr>
        <td class="label">Alamat</td>
        <td class="colon" style="vertical-align: top; padding-top: 6px;"></td>
        <td><textarea name="alamat" cols="33" rows="3" required></textarea></td>
      </tr>
      <tr>
        <td class="label">Kota</td>
        <td class="colon" style="vertical-align: middle;">:</td>
        <td><input type="text" name="kota" size="20" required></td>
      </tr>
      <tr>
        <td class="label">Jenis Kelamin</td>
        <td class="colon" style="vertical-align: middle;">:</td>
        <td>
          <input type="radio" name="jenis_kelamin" value="Laki-Laki" required> Laki-Laki
          <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
        </td>
      </tr>
      <tr>
        <td class="label top">Hobby</td>
        <td class="colon">:</td>
        <td class="top">
          <input type="checkbox" name="hobby[]" value="Membaca"> Membaca<br>
          <input type="checkbox" name="hobby[]" value="Olahraga"> Olahraga<br>
          <input type="checkbox" name="hobby[]" value="Menyanyi"> Menyanyi<br>
          <input type="checkbox" name="hobby[]" value="Menari"> Menari<br>
          <input type="checkbox" name="hobby[]" value="Traveling"> Traveling
        </td>
      </tr>
      <tr>
        <td class="label top">Pilihan Ekskul</td>
        <td class="colon">:</td>
        <td class="top">
          <select name="ekskul[]" size="7" multiple required>
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
          <input type="submit" name="Kirim" value="Kirim">
          <input type="reset" name="Cancel" value="Cancel">
        </td>
      </tr>
      <tr>
        <td colspan="3"><font color="red">*</font> Harus Di isi</td>
      </tr>
    </table>
  </form>
</body>

</html>