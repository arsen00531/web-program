<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 12 — view</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { display: grid; gap: 12px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; width: fit-content; }
    .inline label { flex-direction: row; align-items: center; gap: 8px; }
  </style>
</head>
<body>
  <h1>Форма пользователя</h1>
  <p><a href="index.html">← Назад</a></p>

  <form method="POST" action="action.php">
    <label>Имя <input type="text" name="name" required></label>
    <label>Email <input type="text" name="email" required></label>
    <label>Телефон <input type="text" name="phone" placeholder="+1(111)111-11-11" required></label>

    <fieldset>
      <legend>Пол (radio)</legend>
      <div class="inline">
        <label><input type="radio" name="gender" value="M" required> Мужской</label>
        <label><input type="radio" name="gender" value="F"> Женский</label>
      </div>
    </fieldset>

    <fieldset>
      <legend>Интересы (checkbox)</legend>
      <div class="inline">
        <label><input type="checkbox" name="interests[]" value="Спорт"> Спорт</label>
        <label><input type="checkbox" name="interests[]" value="Музыка"> Музыка</label>
        <label><input type="checkbox" name="interests[]" value="IT"> IT</label>
      </div>
    </fieldset>

    <button type="submit">Отправить</button>
  </form>
</body>
</html>
