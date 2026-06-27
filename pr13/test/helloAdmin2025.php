<?php

session_start();

require_once "model.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>helloAdmin2025</title>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <?php if (!empty($_SESSION["userName"])): ?>
    <h1>Hello, Admin!!!</h1>
    <p>Логин в сессии: <?= htmlspecialchars($_SESSION["userName"]) ?></p>
    <p><a href="logoutadmin2025.php">Log out</a></p>

    <?php $admin = loadAdmin(); ?>
    <?php if ($admin !== null): ?>
      <h2>Данные admin из файла</h2>
      <pre><?php print_r($admin); ?></pre>
    <?php endif; ?>
  <?php else: ?>
    <p>Сессия не открыта. Зарегистрируйте администратора:</p>
    <?php include "adminFormRegistration.html"; ?>
  <?php endif; ?>
</body>
</html>
