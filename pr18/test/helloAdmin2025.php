<?php
require_once "model.php";

requireAdmin();

$users = loadUsers();
$adminName = $_SESSION["admin_login"] ?? "";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>helloAdmin2025</title>
</head>
<body>
  <h1>helloAdmin2025.php</h1>
  <p>Здравствуйте, <?= htmlspecialchars($adminName) ?>!</p>
  <p><a href="logout.php">Выход из режима администратора</a></p>

  <h2>Все пользователи (файл users.dat)</h2>
  <?= usersToTable($users, true) ?>

  <p><a href="view.php">Добавить пользователя</a></p>
</body>
</html>
