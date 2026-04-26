<?php
$a = 3;
$b = 5;

echo "<h1>Operator Perbandingan & Logika</h1>";

echo "a = $a <br>";
echo "b = $b <br>";

echo "a == b : " . ($a == $b) . "<br>";
echo "a != b : " . ($a != $b) . "<br>";
echo "a > b : " . ($a > $b) . "<br>";
echo "a < b : " . ($a < $b) . "<br>";

echo "(a != b) && (a < b) : " . (($a != $b) && ($a < $b)) . "<br>";
echo "(a != b) || (a < b) : " . (($a != $b) || ($a < $b)) . "<br>";
?>