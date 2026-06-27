<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>view1</title>
</head>
<body>
  <h1>Данные из файла users.dat</h1>

  <?php if (!empty($users)): ?>
    <?= usersToTable($users) ?>
  <?php else: ?>
    <p>Файл пуст.</p>
  <?php endif; ?>

  <p><a href="view.php">Добавить запись</a></p>
</body>
</html>
