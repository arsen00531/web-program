<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 12 — view1</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
    form { margin-bottom: 24px; padding: 16px; border: 1px solid #ccc; }
    label { display: block; margin-bottom: 8px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; }
    .error { color: red; }
    .inline label { display: inline-flex; align-items: center; gap: 6px; margin-right: 12px; }
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
    <p>Пол:</p>
    <div class="inline">
      <label><input type="radio" name="gender" value="M" required> М</label>
      <label><input type="radio" name="gender" value="F"> Ж</label>
    </div>
    <p>Интересы:</p>
    <div class="inline">
      <label><input type="checkbox" name="interests[]" value="Спорт"> Спорт</label>
      <label><input type="checkbox" name="interests[]" value="Музыка"> Музыка</label>
      <label><input type="checkbox" name="interests[]" value="IT"> IT</label>
    </div>
    <button type="submit">Добавить</button>
  </form>

  <?php if (!empty($main_array_data)): ?>
    <?= users_to_table_html($main_array_data) ?>
  <?php endif; ?>

  <p>
    <a href="view.php">Новая форма</a> ·
    <a href="register_view.php">Регистрация</a>
  </p>
</body>
</html>
