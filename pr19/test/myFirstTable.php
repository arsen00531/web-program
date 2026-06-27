<?php
require_once "db.php";

$rows = [];
$error = "";

try {
    $pdo = getPdo("myFirstDataBase");
    $rows = $pdo->query("SELECT * FROM myFirstTable")->fetchAll();
} catch (Throwable $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>myFirstDataBase</title>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>myFirstDataBase — myFirstTable</h1>

  <?php if ($error): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <p>Выполните <code>sql/myFirstDataBase.sql</code> в phpMyAdmin.</p>
  <?php else: ?>
    <table border="1" style="border-collapse:collapse;">
      <tr><th>id</th><th>myName</th><th>myAge</th></tr>
      <?php foreach ($rows as $row): ?>
        <tr>
          <td><?= (int)$row["id"] ?></td>
          <td><?= htmlspecialchars($row["myName"]) ?></td>
          <td><?= (int)$row["myAge"] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>
</body>
</html>
