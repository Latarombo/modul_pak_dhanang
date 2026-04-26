<?php
echo "<h1>Variabel dan Tipe Data</h1><br>";
$a = 5; // variabel bertipe integer
$b = 2.5; // variabel bertipe float
$komentar = "Selamat Datang di pemrograman web"; //string
$status = true; //variabel bertipe boolean
$buah = ["Apel", "Jeruk", "Mangga"]; //array
$kosong = null; //variabel bertipe null

// Menampilkan dengan echo
echo "Nilai variabel a adalah = $a <br>";
echo "Nilai variabel b adalah = $b <br>";
echo "Nilai variabel komentar adalah = $komentar <br>";
echo "<hr>";
// Menampilkan Boolean
echo "Nilai variabel status (boolean) adalah = ";
var_dump($status);
echo "<br><br>";
// Menampilkan Array
echo "Isi variabel array buah adalah : <br> ";
echo "<pre>";
print_r($buah);
echo "</pre>";
// Menampilkan NULL
echo "Nilai variabel kosong adalah = ";
var_dump($kosong);
?>