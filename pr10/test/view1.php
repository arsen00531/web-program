<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Практика 10 — view1</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { margin-bottom: 24px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; margin-bottom: 8px; }
    input, select { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; margin-right: 8px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    td, th { border: 1px solid #ccc; padding: 8px; text-align: center; }
    .error { color: red; }
  </style>
</head>
<body>
  <h1>Данные</h1>

  <?php if (!empty($sort_label)): ?>
    <p><?= htmlspecialchars($sort_label) ?></p>
  <?php endif; ?>

  <?php if (!empty($search_label)): ?>
    <p><?= htmlspecialchars($search_label) ?></p>
  <?php endif; ?>

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
    <label>Телефон <input type="text" name="phone" required></label>
    <label>Возраст <input type="number" name="age" min="16" max="99" required></label>
    <button type="submit">Добавить</button>
  </form>

  <?php if (!empty($main_array_data)): ?>
    <table border="all">
      <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>Возраст</th>
      </tr>
      <?php foreach ($main_array_data as $user): ?>
        <tr>
          <td><?= htmlspecialchars($user->name) ?></td>
          <td><?= htmlspecialchars($user->email) ?></td>
          <td><?= htmlspecialchars($user->phone) ?></td>
          <td><?= htmlspecialchars((string)$user->age) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <h2>Сортировка (usort)</h2>
    <form action="sort.php" method="GET">
      <label>
        Поле
        <select name="key">
          <option value="name">name</option>
          <option value="age">age</option>
          <option value="email">email</option>
          <option value="phone">phone</option>
        </select>
      </label>
      <button type="submit" name="order" value="asc">По возрастанию</button>
      <button type="submit" name="order" value="desc">По убыванию</button>
    </form>

    <h2>Поиск</h2>
    <form action="search.php" method="GET">
      <label>
        Поле
        <select name="field">
          <option value="name">name</option>
          <option value="email">email</option>
          <option value="phone">phone</option>
          <option value="age">age</option>
        </select>
      </label>
      <label>
        Значение
        <input type="text" name="query" required>
      </label>
      <button type="submit">Найти</button>
    </form>
  <?php endif; ?>

  <p><a href="view.php">Новая форма (view.php)</a></p>
</body>
</html>
