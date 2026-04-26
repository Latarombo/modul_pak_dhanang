<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas Mandiri 2</title>
</head>
<body>
  <?php
$jumlah_bayar = 120000;

if ($jumlah_bayar >= 500000) {
    $diskon = 0.50;
} elseif ($jumlah_bayar >= 100000) {
    $diskon = 0.10;
} elseif ($jumlah_bayar >= 50000) {
    $diskon = 0.05;
} else {
    $diskon = 0;
}

$besar_diskon = $jumlah_bayar * $diskon;
$total_bayar = $jumlah_bayar - $besar_diskon;

echo "Jumlah Bayar : Rp " . $jumlah_bayar . "<br>";
echo "Diskon : " . ($diskon * 100) . "%<br>";
echo "Besar Diskon : Rp " . $besar_diskon . "<br>";
echo "Total Bayar : Rp " . $total_bayar;
?>
</body>
</html>