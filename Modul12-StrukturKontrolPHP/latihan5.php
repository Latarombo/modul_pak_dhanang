<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas-5</title>
</head>
<body>
  <?php
  $brush_price = 5;

  // Menggunakan Pengulangan for
  echo "<h2 align=\"center\">Menggunakan Pengulangan for</h2>";
  echo "<table border=\"1\" align=\"center\">";
  echo "<tr><th>Quantity</th>";
  echo "<th>Price</th></td>";
  for ($counter = 10; $counter <= 100; $counter += 10) {
    echo "<tr><td>";
    echo " $counter";
    echo "</td><td>";
    echo $brush_price * $counter;
    echo "</td></tr>";
  }
  echo "<table>";

  // Ganti inkremen dengan $counter += 5
  echo "<h2 align=\"center\">Ganti inkremen dengan \$counter += 5</h2>";
  echo "<table border=\"1\" align=\"center\">";
  echo "<tr><th>Quantity</th>";
  echo "<th>Price</th></td>";
  for ($counter = 10; $counter <= 100; $counter += 5) {
    echo "<tr><td>";
    echo " $counter";
    echo "</td><td>";
    echo $brush_price * $counter;
    echo "</td></tr>";
  }
  echo "<table>";

  // Ganti looping for dengan menggunakan while dan do while

  //menggunakan while
  echo "<h2 align=\"center\"> Ganti looping for dengan menggunakan while</h2>";
  echo "<table border=\"1\" align=\"center\">";
  echo "<tr><th>Quantity</th>";
  echo "<th>Price</th></td>";
  $counter = 10;
  while ($counter <= 100) {
    echo "<tr><td>";
    echo " $counter";
    echo "</td><td>";
    echo $brush_price * $counter;
    echo "</td></tr>";
    $counter += 10;
  }
  echo "<table>";

  // menggunakan do while
  echo "<h2 align=\"center\"> Ganti looping for dengan menggunakan do while</h2>";
  echo "<table border=\"1\" align=\"center\">";
  echo "<tr><th>Quantity</th>";
  echo "<th>Price</th></td>";
  $counter = 10;
  do {
    echo "<tr><td>";
    echo " $counter";
    echo "</td><td>";
    echo $brush_price * $counter;
    echo "</td></tr>";
    $counter += 10;
  } while ($counter <= 100);
  echo "</table>";
  ?>
</body>
</html>