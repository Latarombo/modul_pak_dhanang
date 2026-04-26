<?php
$nis        = "2026001";
$nama       = "GALANG";
$nilaiTugas = 85;
$nilaiUTS   = 80;
$nilaiUAS   = 90;

$totalNilai = $nilaiTugas + $nilaiUTS + $nilaiUAS;
$rataRata   = $totalNilai / 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tugas Mandiri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            width: 700px;
            margin: 40px auto;
        }
        h1 {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
        }
        th {
            text-align: left;
            background: #ba13ba;
            color: white;
            padding: 12px;
            font-size: 18px;
        }
        td {
            padding: 10px 12px;
            border: 1px solid #ccc;
        }
        .label {
            width: 50%;
        }
        .highlight {
            font-weight: bold;
            background: #f2e6f5;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Program Pengolahan Nilai Siswa</h1>

    <table>
        <tr>
            <th colspan="2">Laporan Hasil Belajar</th>
        </tr>
        <tr>
            <td class="label">NIS</td>
            <td>: <?php echo $nis; ?></td>
        </tr>
        <tr>
            <td class="label">Nama Siswa</td>
            <td>: <?php echo $nama; ?></td>
        </tr>
        <tr>
            <td class="label">Nilai Tugas</td>
            <td>: <?php echo $nilaiTugas; ?></td>
        </tr>
        <tr>
            <td class="label">Nilai UTS</td>
            <td>: <?php echo $nilaiUTS; ?></td>
        </tr>
        <tr>
            <td class="label">Nilai UAS</td>
            <td>: <?php echo $nilaiUAS; ?></td>
        </tr>
        <tr class="highlight">
            <td>Total Nilai</td>
            <td>: <?php echo $totalNilai; ?></td>
        </tr>
        <tr class="highlight">
            <td>Rata-rata Nilai</td>
            <td>: <?php echo number_format($rataRata, 2); ?></td>
        </tr>
    </table>
</div>

</body>
</html>
