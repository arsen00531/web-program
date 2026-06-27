<?php
require_once "library.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 5</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    h2 { border-bottom: 1px solid #ccc; margin-top: 32px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <h2>1. Замыкания</h2>
  <?php
  $var1 = 100;
  $testClousure = function () use ($var1) {
      echo $var1 . "<br>";
      $var1 = 10000;
      echo $var1 . "<br>";
  };
  $testClousure();
  $var1 = 1000;
  $testClousure();
  ?>

  <h2>2. Стрелочные функции</h2>
  <?php
  $testFunction = fn($pp) => $pp * $pp;
  echo $testFunction(100) . "<br>";

  $myArray = [10, 20, 30, 40];
  $kwadrat = array_map($testFunction, $myArray);
  $kub = array_map(fn($pp) => $pp * $pp * $pp, $myArray);

  echo "<pre>";
  print_r($myArray);
  print_r($kwadrat);
  print_r($kub);
  echo "</pre>";
  ?>

  <h2>3. Математические функции</h2>
  <?php
  echo "M_PI = " . M_PI . "<br>";
  echo "M_E = " . M_E . "<br>";

  $foo = round(3.4);
  echo "round(3.4) = $foo<br>";
  $foo = round(3.5);
  echo "round(3.5) = $foo<br>";
  $foo = round(3.6);
  echo "round(3.6) = $foo<br>";
  $foo = round(123.256, 2);
  echo "round(123.256, 2) = $foo<br>";
  $foo = ceil(3.11);
  echo "ceil(3.11) = $foo<br>";
  $foo = floor(3.9999);
  echo "floor(3.9999) = $foo<br>";

  echo "rand() = " . rand() . "<br>";
  echo "rand(0, 10) = " . rand(0, 10) . "<br>";
  echo "getrandmax() = " . getrandmax() . "<br>";
  echo "random_int(0, 100) = " . random_int(0, 100) . "<br>";
  echo "min(3, 7, 1) = " . min(3, 7, 1) . "<br>";
  echo "max(3, 7, 1) = " . max(3, 7, 1) . "<br>";
  ?>

  <h2>4. Случайный массив</h2>
  <?php
  $randomArray = createRandomArray(8);
  printArray($randomArray);
  ?>

  <h2>5. Дата и время</h2>
  <?php
  echo "time() = " . time() . "<br>";
  echo date("l d F Y h:i:s A") . "<br>";
  echo "d = " . date("d") . ", j = " . date("j") . ", l = " . date("l") . "<br>";
  echo "N = " . date("N") . ", w = " . date("w") . ", W = " . date("W") . "<br>";
  echo "F = " . date("F") . ", m = " . date("m") . ", n = " . date("n") . "<br>";
  echo "t = " . date("t") . ", L = " . date("L") . ", Y = " . date("Y") . "<br>";
  echo "a = " . date("a") . ", g = " . date("g") . ", G = " . date("G") . "<br>";
  echo "h = " . date("h") . ", H = " . date("H") . ", i = " . date("i") . ", s = " . date("s") . "<br>";
  ?>

  <h2>6. Приветствие с датой</h2>
  <p><?= getTodayGreetingString() ?></p>

  <h2>7. DateTime</h2>
  <?php
  $date = new DateTime();
  echo $date->format("d-m-Y H:i:s") . "<br><br>";

  $date2 = new DateTime("2025-01-01 00:00:00");
  echo $date2->format("d.m.Y H:i:s") . "<br><br>";
  echo $date2->format(DateTime::W3C) . "<br><br>";

  $interval = $date->diff($date2);
  echo "<pre>";
  print_r($interval);
  echo "</pre>";
  echo $interval->m;
  echo $interval->d;
  echo $interval->h;
  echo $interval->i . "<br><br>";
  ?>
</body>
</html>
