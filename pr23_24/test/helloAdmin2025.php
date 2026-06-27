<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";
require_once "adminModel.php";

requireAdmin();

$adminName = $_SESSION["admin_login"] ?? "";
$resultArray = getDataToArrayFromBD($pdo);
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
  <p>Администраторский сеанс — проверка через базу <code>adminBase</code>.</p>
  <p><a href="logout.php">Выход из режима администратора</a></p>

  <h2>Пользователи (dataBase.user_data)</h2>
  <?php if (!empty($resultArray)): ?>
    <?php createDeleteEditTable($resultArray); ?>
  <?php else: ?>
    <p>Нет записей.</p>
  <?php endif; ?>

  <p><a href="user_form.html">Добавить пользователя</a></p>
  <p><a href="index.html">← На главную</a></p>
</body>
</html>
