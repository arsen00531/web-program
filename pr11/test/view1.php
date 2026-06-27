<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 11 — view1</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { margin-bottom: 24px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; margin-bottom: 8px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; }
    .error { color: red; }
  </style>
</head>
<body>
  <h1>Данные</h1>

  <?php if (!empty($errors)): ?>
    <ul class="error">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="POST" action="action.php">
    <label>Имя <input type="text" name="name" required></label>
    <label>Email <input type="text" name="email" required></label>
    <label>Телефон <input type="text" name="phone" placeholder="+1(111)111-11-11" required></label>
    <button type="submit">Добавить</button>
  </form>

  <?php if (!empty($main_array_data)): ?>
    <h2>Задание 2 — таблица с mailto</h2>
    <?= emails_to_table_html($main_array_data) ?>
  <?php endif; ?>

  <p><a href="view.php">Новая форма</a> · <a href="regex_demo.php">Примеры regex</a></p>
</body>
</html>
