<?php
require_once "dataFunctions.php";

$books = loadBooks();
$booksBefore1950 = loadBooksFiltered("year < '1950'");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>library — books</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
    h2 { margin-top: 32px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>База library — таблица books</h1>

  <h2>SELECT * FROM books</h2>
  <?= booksToTable($books) ?>

  <h2>SELECT * FROM books WHERE year &lt; '1950'</h2>
  <?= booksToTable($booksBefore1950) ?>
</body>
</html>
