<?php
// 1. Segitiga Siku-Siku
$alas   = 6;
$tinggi = 8;
$miring = sqrt(($alas*$alas) + ($tinggi*$tinggi));

$luasSegitiga     = 0.5 * $alas * $tinggi;
$kelilingSegitiga = $alas + $tinggi + $miring;

// 2. Persegi
$sisi = 5;
$luasPersegi     = $sisi * $sisi;
$kelilingPersegi = 4 * $sisi;

// 3. Persegi Panjang
$panjang = 10;
$lebar   = 4;
$luasPP     = $panjang * $lebar;
$kelilingPP = 2 * ($panjang + $lebar);

// 4. Lingkaran
$jari  = 7;
$phi   = 3.14;
$luasLingkaran     = $phi * $jari * $jari;
$kelilingLingkaran = 2 * $phi * $jari;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Bangun Datar</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 800px;
            margin: 30px auto;
        }
        h2 {
            background: #6a1b9a;
            color: white;
            padding: 10px;
            margin-bottom: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            background: #ffffff;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        td {
            padding: 10px;
            border: 1px solid #6a1b9a;
        }
        .highlight {
            font-weight: bold;
            background: #f3e5f5;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>1. Segitiga Siku-Siku</h2>
    <table>
        <tr><td>Alas</td><td><?= $alas; ?></td></tr>
        <tr><td>Tinggi</td><td><?= $tinggi; ?></td></tr>
        <tr class="highlight"><td>Luas</td><td><?= number_format($luasSegitiga,2); ?></td></tr>
        <tr class="highlight"><td>Keliling</td><td><?= number_format($kelilingSegitiga,2); ?></td></tr>
    </table>

    <h2>2. Persegi</h2>
    <table>
        <tr><td>Sisi</td><td><?= $sisi; ?></td></tr>
        <tr class="highlight"><td>Luas</td><td><?= number_format($luasPersegi,2); ?></td></tr>
        <tr class="highlight"><td>Keliling</td><td><?= number_format($kelilingPersegi,2); ?></td></tr>
    </table>

    <h2>3. Persegi Panjang</h2>
    <table>
        <tr><td>Panjang</td><td><?= $panjang; ?></td></tr>
        <tr><td>Lebar</td><td><?= $lebar; ?></td></tr>
        <tr class="highlight"><td>Luas</td><td><?= number_format($luasPP,2); ?></td></tr>
        <tr class="highlight"><td>Keliling</td><td><?= number_format($kelilingPP,2); ?></td></tr>
    </table>

    <h2>4. Lingkaran</h2>
    <table>
        <tr><td>Jari-jari</td><td><?= $jari; ?></td></tr>
        <tr class="highlight"><td>Luas</td><td><?= number_format($luasLingkaran,2); ?></td></tr>
        <tr class="highlight"><td>Keliling</td><td><?= number_format($kelilingLingkaran,2); ?></td></tr>
    </table>

</div>

</body>
</html>