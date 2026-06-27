<?php
require_once "library.php";

$dataFile = __DIR__ . "/data.json";
$order = $_GET["order"] ?? "asc";
$desc = $order === "desc";

$rows = loadDataFromFile($dataFile);
$assocArray = copyArray($rows);
$sortedRows = sortByFirstColumn($assocArray, $desc);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>sort.php</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    button { padding: 8px 16px; cursor: pointer; margin-right: 8px; }
  </style>
</head>
<body>
  <h1>Сортировка — sort.php</h1>
  <p><a href="index.php">← К форме</a></p>
  <p>Сортировка: <?= $desc ? "по убыванию" : "по возрастанию" ?></p>

  <?php if (!empty($sortedRows)): ?>
    <?= createDataTable($sortedRows) ?>
  <?php else: ?>
    <p>Нет данных для сортировки.</p>
  <?php endif; ?>

  <form action="sort.php" method="GET">
    <button type="submit" name="order" value="asc">По возрастанию</button>
    <button type="submit" name="order" value="desc">По убыванию</button>
  </form>
</body>
</html>
