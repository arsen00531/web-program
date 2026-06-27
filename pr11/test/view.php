<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 11 — view</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { display: grid; gap: 12px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; width: fit-content; }
  </style>
</head>
<body>
  <h1>Форма с проверкой regex</h1>
  <p><a href="index.html">← Назад</a></p>

  <form method="POST" action="action.php">
    <label>
      Имя (латиница / кириллица)
      <input type="text" name="name" required>
    </label>
    <label>
      Email
      <input type="text" name="email" required>
    </label>
    <label>
      Телефон (+1(111)111-11-11)
      <input type="text" name="phone" placeholder="+1(111)111-11-11" required>
    </label>
    <button type="submit">Отправить</button>
  </form>
</body>
</html>
