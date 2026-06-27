<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
    form { padding: 16px; border: 1px solid #ccc; }
    label { display: block; margin-bottom: 12px; }
    input { padding: 8px; width: 100%; max-width: 300px; }
    button { padding: 8px 16px; cursor: pointer; }
    .error { color: red; }
    .ok { color: green; }
  </style>
</head>
<body>
  <h1>Регистрация</h1>
  <p><a href="index.html">← Назад</a></p>

  <?php if (!empty($errors)): ?>
    <ul class="error">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php if (!empty($success)): ?>
    <p class="ok"><?= htmlspecialchars($success) ?></p>
  <?php endif; ?>

  <form method="POST" action="register.php">
    <label>
      Пароль
      <input type="password" name="password1" required>
    </label>
    <label>
      Повтор пароля
      <input type="password" name="password2" required>
    </label>
    <button type="submit">Зарегистрироваться</button>
  </form>
</body>
</html>
