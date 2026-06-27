<?php
require_once "model.php";

startSessionIfNeeded();

if (!isAdminLoggedIn()) {
    echo "<p>Доступ только для администратора.</p>";
    echo "<p><a href=\"adminLoginForm2025.php\">Страница входа администратора</a></p>";
    exit;
}

$editId = (int)($_GET["editId"] ?? $_POST["editId"] ?? 0);

if ($_SERVER["REQUEST_METHOD"] === "POST" && $editId > 0) {
    updateUser($editId, [
        "name" => trim($_POST["name"] ?? ""),
        "age" => (int)($_POST["age"] ?? 0),
        "phone" => trim($_POST["phone"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
    ]);

    $users = loadUsers();
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head><meta charset="UTF-8"><title>editRecord2025</title></head>
    <body>
      <h1>editRecord2025.php — сохранено</h1>
      <p>editId = <?= $editId ?></p>
      <h2>Таблица после редактирования</h2>
      <?= usersToTable($users, true) ?>
      <p><a href="helloAdmin2025.php">← helloAdmin2025.php</a></p>
    </body>
    </html>
    <?php
    exit;
}

$user = getUserById($editId);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>editRecord2025</title>
</head>
<body>
  <h1>editRecord2025.php</h1>
  <p>editId = <?= $editId ?></p>

  <?php if ($user === null): ?>
    <p>Запись не найдена.</p>
  <?php else: ?>
    <h2>Редактирование записи</h2>
    <?= showEditUserForm($user) ?>
  <?php endif; ?>

  <p><a href="helloAdmin2025.php">← Назад</a></p>
</body>
</html>
