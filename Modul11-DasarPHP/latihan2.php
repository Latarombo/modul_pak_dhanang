<?php
echo "<h1>Operator Assignment</h1><hr>";
$x = 10; // Nilai Awal
echo "Nilai awal x = $x <br><br>";
// Penjumlahan
$a = $x;
$a += 5; // x = x + 5
echo "x += 5 hasilnya $a <br>";
// Pengurangan
$b = $x;
$b -= 3; // x = x - 3
echo "x -= 3 -> $b <br>";
// Perkalian
$c = $x;
$c *= 2; // x = x * 2
echo "x *= 2 -> $c <br>";
// Pembagian
$d = $x;
$d /= 2; // x = x / 2
echo "x /= 2 -> $d <br>";
// Modulus (sisa bagi)
$e = $x;
$e %= 3; // x = x % 3
echo "x %= 3 -> $e <br>";
// Pangkat (PHP 5.6+)
$f = $x;
$f **= 2; // x = x ** 2
echo "x **= 2 -> $f <br>";
// Penggabungan String
$teks = "Belajar";
$teks .= " PHP";
echo "<br>Operator .= $teks <br>";
?>