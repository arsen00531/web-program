<?php
require_once "library.php";

$data1 = 10;
$data2 = "Ivan";
$data3 = "Ivanov";

$user1 = [];
$user1["id"] = $data1;
$user1["name"] = $data2;
$user1["surname"] = $data3;

$arr = [" Hello, ", " world ", " ! "];
$myArr2 = array_fill(0, 10, "test");
$myArr3 = range(0, 10, 1);

$user2 = [];
$user2["id"] = 20;
$user2["name"] = "Petr";
$user2["surname"] = "Petrov";

$userArray = [];
$userArray["user1"] = $user1;
$userArray["user2"] = $user2;

$resultTable4 = createTable4($user1);
$resultTable5 = createTable5($userArray);

list($a, $b) = $myArr3;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Массивы</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    h2 { border-bottom: 1px solid #ccc; margin-top: 32px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <h2>1. Ассоциативный массив</h2>
  <pre><?php print_r($arr); ?></pre>
  <pre><?php print_r($myArr2); ?></pre>
  <pre><?php print_r($myArr3); ?></pre>

  <h2>user1 — foreach</h2>
  <?php foreach ($user1 as $index): ?>
    user1Data = <?= $index ?><br><br>
  <?php endforeach; ?>

  <?php foreach ($user1 as $k => $v): ?>
    <?= "$k - $v" ?><br><br>
  <?php endforeach; ?>

  <h2>list()</h2>
  <?= $a ?><br><br>
  <?= $b ?><br><br>

  <h2>2. Таблица — createTable4</h2>
  <?= $resultTable4 ?>

  <h2>3. Двумерный массив — строки</h2>
  <?php foreach ($userArray as $v1): ?>
    <?php foreach ($v1 as $k2 => $v2): ?>
      <?= "$k2 - $v2" ?><br><br>
    <?php endforeach; ?>
    <br><br><br>
  <?php endforeach; ?>

  <h2>4. Таблица — createTable5</h2>
  <?= $resultTable5 ?>
</body>
</html>
