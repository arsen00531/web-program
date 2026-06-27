<?php
require_once "model.php";

startSessionIfNeeded();

if (!isAdminLoggedIn()) {
    echo "<p>Доступ только для администратора.</p>";
    echo "<p><a href=\"adminLoginForm2025.php\">Страница входа администратора</a></p>";
    exit;
}

$deleteId = (int)($_GET["deleteId"] ?? 0);

deleteRecord($deleteId);
$users = loadUsers();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>deleteRecord2025</title>
</head>
<body>
  <h1>deleteRecord2025.php</h1>
  <p>deleteId = <?= $deleteId ?></p>

  <h2>Таблица после удаления</h2>
  <?= usersToTable($users, true) ?>

  <p><a href="helloAdmin2025.php">← helloAdmin2025.php</a></p>
</body>
</html>
