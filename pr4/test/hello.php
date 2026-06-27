<?php
require_once "library.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>helloFunction</title>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h2>Вариант 1 — функция выводит на экран</h2>
  <?php helloFunctionEcho(); ?>

  <h2>Вариант 2 — функция возвращает значение</h2>
  <?php echo helloFunctionReturn(); ?>
</body>
</html>
