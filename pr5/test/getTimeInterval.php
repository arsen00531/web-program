<?php
require_once "library.php";

$timeBegin1 = $_GET["timeElement1"] ?? "10:00";
$timeEnd1 = $_GET["timeElement2"] ?? "12:30";

$date1 = new DateTime($timeBegin1);
$date2 = new DateTime($timeEnd1);
$interval = getDateTimeInterval($timeBegin1, $timeEnd1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>getTimeInterval.php</title>
</head>
<body>
  <p><a href="time_form.html">← К форме</a></p>

  <h2>DateTime</h2>
  <p>Начало: <?= $date1->format("H:i:s") ?></p>
  <p>Конец: <?= $date2->format("H:i:s") ?></p>

  <h2>DateInterval (diff)</h2>
  <pre><?php print_r($interval); ?></pre>

  <p>Месяцы: <?= $interval->m ?></p>
  <p>Дни: <?= $interval->d ?></p>
  <p>Часы: <?= $interval->h ?></p>
  <p>Минуты: <?= $interval->i ?></p>

  <p>Интервал: <?= $interval->h ?> ч <?= $interval->i ?> мин</p>
</body>
</html>
