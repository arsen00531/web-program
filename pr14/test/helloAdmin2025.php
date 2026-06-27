<?php
require_once "model.php";

$admin = loadAdmin();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>helloAdmin2025</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 0 20px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a> · <a href="admin_form.php">Изменить admin</a></p>
  <h1>helloAdmin2025.php</h1>

  <?php if ($admin === null): ?>
    <p>Данные admin не найдены. <a href="admin_form.php">Создать</a></p>
  <?php else: ?>
    <p>Логин: <?= htmlspecialchars($admin->name ?? "") ?></p>
    <p>pass (md5): <?= htmlspecialchars($admin->pass ?? "") ?></p>
    <h2>Объект из json_decode</h2>
    <pre><?php print_r($admin); ?></pre>
  <?php endif; ?>
</body>
</html>
