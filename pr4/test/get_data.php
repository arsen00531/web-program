<?php
require_once "library.php";

$num1 = isset($_GET["num1"]) ? (float)$_GET["num1"] : 100;
$num2 = isset($_GET["num2"]) ? (float)$_GET["num2"] : 10;
$num3 = isset($_GET["num3"]) ? (float)$_GET["num3"] : 30;

$data1 = $num1;
$data2 = $num2;
$data3 = $num3;

$result = calculateAverage($num1, $num2, $num3);
$arrayData = createArray($data1, $data2, $data3);
$resultTable = createTable($arrayData);
$resultTable2 = createTable2($data1, $data2, $data3);

$showData = function ($someArray) {
    foreach ($someArray as $dataOut) {
        echo "<i>$dataOut</i><br><br>";
    }
};

function showData2($someArray, $someFunction)
{
    $someFunction($someArray);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>get_data.php</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    h2 { border-bottom: 1px solid #ccc; }
  </style>
</head>
<body>
  <p><a href="form.html">← К форме</a></p>

  <h2>2. Среднее значение — варианты вывода</h2>
  <?php echo formatAverageAsP($result); ?>
  <?php echo formatAverageAsH1($result); ?>
  <h1>result = <?= $result ?></h1>
  <?= formatAverageAsTableShort($result) ?>
  <?php formatAverageAsTableEcho($result); ?>

  <h2>3. Массив из формы</h2>
  <table style="width: 100%; border: 1px solid green" border="all">
    <tr>
      <?php for ($index = 0; $index < count($arrayData); ++$index): ?>
        <td style="text-align:center"><?= $arrayData[$index] ?></td>
      <?php endfor; ?>
    </tr>
  </table>

  <h2>4. createTable()</h2>
  <?= $resultTable ?>

  <h2>5. createTable2()</h2>
  <?= $resultTable2 ?>

  <h2>6. Локальные переменные</h2>
  <?php
  $i = 0;
  echo "<h1> i = $i</h1>";
  aboutI();
  echo "<h1> i = $i</h1>";
  ?>

  <h2>7. Анонимные функции</h2>
  <?php $showData($arrayData); ?>
  <?php
  showData2($arrayData, function ($arrayToOut) {
      foreach ($arrayToOut as $dataOut) {
          echo "<b>$dataOut</b><br><br>";
      }
  });
  ?>
</body>
</html>
