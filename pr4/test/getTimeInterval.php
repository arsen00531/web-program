<?php
require_once "library.php";

$timeBegin1 = $_GET["timeElement1"] ?? "10:00";
$timeEnd1 = $_GET["timeElement2"] ?? "12:30";

$timeArr1 = explode(":", $timeBegin1);
$timeArr2 = explode(":", $timeEnd1);

$countMinute = calculateTimeInterval($timeArr1, $timeArr2);
$minutesText = formatMinutesWord($countMinute);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>getTimeInterval.php</title>
</head>
<body>
  <p><a href="time_form.html">← К форме</a></p>

  <h2>Данные из формы (строки)</h2>
  <p>timeElement1 = <?= htmlspecialchars($timeBegin1) ?></p>
  <p>timeElement2 = <?= htmlspecialchars($timeEnd1) ?></p>

  <h2>Массивы после explode</h2>
  <pre><?php print_r($timeArr1); ?></pre>
  <pre><?php print_r($timeArr2); ?></pre>

  <h2>Длительность интервала</h2>
  <p><?= $minutesText ?></p>
  <p>countMinute = <?= $countMinute ?></p>
</body>
</html>
