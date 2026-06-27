<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Практика 10 — view</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { display: grid; gap: 12px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; width: fit-content; }
  </style>
</head>
<body>
  <h1>Практическое занятие №10</h1>

  <form method="POST" action="action.php">
    <label>
      Имя
      <input type="text" name="name" required>
    </label>
    <label>
      Email
      <input type="text" name="email" required>
    </label>
    <label>
      Телефон
      <input type="text" name="phone" required>
    </label>
    <label>
      Возраст
      <input type="number" name="age" min="16" max="99" required>
    </label>
    <button type="submit">Отправить</button>
  </form>
</body>
</html>
