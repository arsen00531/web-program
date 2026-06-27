<?php
require_once "library.php";

$dataFile = __DIR__ . "/data.json";
$rows = loadDataFromFile($dataFile);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $assocArray = [
        "name" => $_POST["name"] ?? "",
        "email" => $_POST["email"] ?? "",
        "phone" => $_POST["phone"] ?? "",
    ];

    $rows[] = $assocArray;
    saveDataToFile($dataFile, $rows);
    $rows = loadDataFromFile($dataFile);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Практика 8</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { display: grid; gap: 12px; margin-bottom: 24px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; width: fit-content; }
  </style>
</head>
<body>
  <h1>Практическое занятие №8</h1>

  <form method="POST" action="index.php">
    <label>
      Имя
      <input type="text" name="name" required>
    </label>
    <label>
      Email
      <input type="email" name="email" required>
    </label>
    <label>
      Телефон
      <input type="text" name="phone" required>
    </label>
    <button type="submit">Добавить</button>
  </form>

  <?php if (!empty($rows)): ?>
    <h2>Данные из файла</h2>
    <?= createDataTable($rows) ?>

    <h2>Сортировка по первому столбцу</h2>
    <form action="sort.php" method="GET">
      <button type="submit" name="order" value="asc">По возрастанию</button>
      <button type="submit" name="order" value="desc">По убыванию</button>
    </form>
  <?php endif; ?>
</body>
</html>
