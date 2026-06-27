<?php
require_once "model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    saveUser([
        "name" => trim($_POST["name"] ?? ""),
        "age" => (int)($_POST["age"] ?? 0),
        "phone" => trim($_POST["phone"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
    ]);
}

$users = loadUsers();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Таблица users</title>
</head>
<body>
  <h1>Пользователи из MySQL</h1>
  <?= usersToTable($users) ?>
  <p><a href="view.php">Добавить ещё</a></p>
</body>
</html>
