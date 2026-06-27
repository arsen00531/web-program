<?php
require_once "model.php";

$written = false;
$lines = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    if ($username !== "") {
        appendTextLine($username);
        $written = true;
    }
}

$lines = loadTextLines();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>text_demo</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>Работа с текстовым файлом</h1>

  <form method="POST" action="text_demo.php">
    <label>
      Строка для записи в mainData.txt
      <input type="text" name="username" required>
    </label>
    <button type="submit">Записать (режим a)</button>
  </form>

  <?php if ($written): ?>
    <p>Запись добавлена в файл.</p>
  <?php endif; ?>

  <h2>Содержимое файла</h2>
  <pre><?php print_r($lines); ?></pre>
</body>
</html>
