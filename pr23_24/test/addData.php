<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";

if ($pdo) {
    $nameUserData = $_REQUEST["userName"] ?? "";
    $ageUserData = (int)($_REQUEST["userAge"] ?? 0);

    try {
        insertUser($pdo, $nameUserData, $ageUserData);
    } catch (PDOException $e) {
        echo "База данных ошибка: " . $e->getMessage();
    }

    $resultArray = getDataToArrayFromBD($pdo);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>addData.php</title>
</head>
<body>
  <p><a href="user_form.html">← К форме</a></p>
  <h1>addData.php — INSERT + таблица</h1>

  <h2>Массив объектов (FETCH_OBJ)</h2>
  <pre><?php print_r($resultArray ?? []); ?></pre>

  <h2>createTable()</h2>
  <?php if (!empty($resultArray)): ?>
    <?php createTable($resultArray); ?>
  <?php endif; ?>
</body>
</html>
