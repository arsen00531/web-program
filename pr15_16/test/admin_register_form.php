<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Регистрация admin</title>
</head>
<body>
  <h1>Регистрация администратора</h1>
  <p><a href="index.html">← Назад</a></p>

  <?php if (!empty($errors)): ?>
    <ul style="color:red">
      <?php foreach ($errors as $error): ?>
        <li><?= htmlspecialchars($error) ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="POST" action="register_admin.php">
    <label>Логин <input type="text" name="login" required></label><br><br>
    <label>Пароль <input type="password" name="password1" required></label><br><br>
    <label>Повтор пароля <input type="password" name="password2" required></label><br><br>
    <button type="submit">Зарегистрироваться</button>
  </form>
</body>
</html>
