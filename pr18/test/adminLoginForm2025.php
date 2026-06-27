<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход admin</title>
</head>
<body>
  <h1>adminLoginForm2025.php</h1>
  <p><a href="index.html">← Назад</a></p>

  <?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form method="POST" action="adminLoginPage2025.php">
    <label>Логин <input type="text" name="login" required></label><br><br>
    <label>Пароль <input type="password" name="password" required></label><br><br>
    <button type="submit">Войти</button>
  </form>
</body>
</html>
