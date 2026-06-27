<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Форма пользователя</title>
</head>
<body>
  <h1>Добавить пользователя</h1>
  <p><a href="index.html">← Назад</a></p>

  <form method="POST" action="action.php">
    <label>Имя <input type="text" name="name" required></label><br><br>
    <label>Возраст <input type="number" name="age" min="1" max="120" required></label><br><br>
    <label>Телефон <input type="text" name="phone" required></label><br><br>
    <label>Email <input type="email" name="email" required></label><br><br>
    <button type="submit">Сохранить в БД</button>
  </form>
</body>
</html>
