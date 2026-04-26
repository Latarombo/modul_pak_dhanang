<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas-3</title>
</head>
<body>
  <?php
  $nilai = 76;
  if($nilai <= 100 && $nilai >= 86){
  echo "A";
  echo "<br>";
  echo "Keterangan: Sangat Baik";
  }elseif($nilai <= 85 && $nilai >= 76){
    echo "B";
    echo "<br>";
    echo "Keterangan: Baik";
  }elseif($nilai <= 75 && $nilai >= 66){
    echo "C";
    echo "<br>";
    echo "Keterangan: Cukup";
  }elseif($nilai <= 65 && $nilai >= 0){
    echo "D";
    echo "<br>";
    echo "Keterangan: Kurang";
  }else{
    echo "Nilai Diluar Range";
  }
  ?>
</body>
</html>