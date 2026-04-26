<?php
$a = 3;
$b = 5;

echo "<h1>Operator Perbandingan & Logika</h1>";

echo "a = ";
var_dump($a);
echo "<br>";

echo "b = ";
var_dump($b);
echo "<br>";

echo "a == b : ";
var_dump($a == $b);
echo "<br>";

echo "a != b : ";
var_dump($a != $b);
echo "<br>";

echo "a > b : ";
var_dump($a > $b);
echo "<br>";

echo "a < b : ";
var_dump($a < $b);
echo "<br>";

echo "(a != b) && (a < b) : ";
var_dump(($a != $b) && ($a < $b));
echo "<br>";

echo "(a != b) || (a < b) : ";
var_dump(($a != $b) || ($a < $b));
echo "<br>";
?>