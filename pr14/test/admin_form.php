<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
</head>
<body>
  <h1>Сохранение admin (JSON)</h1>
  <p><a href="index.html">← Назад</a></p>

  <form method="POST" action="save_admin.php">
    <label>
      Логин
      <input type="text" name="admin_name" required>
    </label>
    <br><br>
    <label>
      Пароль
      <input type="password" name="admin_pass" required>
    </label>
    <br><br>
    <button type="submit">saveAdmin()</button>
  </form>
</body>
</html>
