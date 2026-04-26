<?php
  if (isset($_POST['Pilih'])) {
    $jurusan = $_POST['jurusan'];
    echo "Jurusan Anda Adalah
    <b><font color='jurusan'>$jurusan</font></b>";
  }
?>