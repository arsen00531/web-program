<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Практика 9 — view1</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { display: grid; gap: 12px; margin-bottom: 24px; padding: 16px; border: 1px solid #ccc; }
    label { display: flex; flex-direction: column; gap: 4px; }
    input { padding: 8px; }
    button { padding: 8px 16px; cursor: pointer; width: fit-content; margin-right: 8px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    td, th { border: 1px solid #ccc; padding: 8px; text-align: center; }
  </style>
</head>
<body>
  <h1>Данные</h1>
  <?php if (!empty($sort_label)): ?>
    <p><?= htmlspecialchars($sort_label) ?></p>
  <?php endif; ?>

  <form method="POST" action="action.php">
    <label>
      Имя
      <input type="text" name="name" required>
    </label>
    <label>
      Email
      <input type="email" name="email" required>
    </label>
    <label>
      Телефон
      <input type="text" name="phone" required>
    </label>
    <button type="submit">Добавить</button>
  </form>

  <?php if (!empty($main_array_data)): ?>
    <table border="all">
      <tr>
        <th>Имя</th>
        <th>Email</th>
        <th>Телефон</th>
      </tr>
      <?php foreach ($main_array_data as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row["name"] ?? "") ?></td>
          <td><?= htmlspecialchars($row["email"] ?? "") ?></td>
          <td><?= htmlspecialchars($row["phone"] ?? "") ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <h2>Сортировка по первому столбцу</h2>
    <form action="sort.php" method="GET">
      <button type="submit" name="order" value="asc">По возрастанию</button>
      <button type="submit" name="order" value="desc">По убыванию</button>
    </form>
  <?php endif; ?>

  <p><a href="view.php">Новая форма (view.php)</a></p>
</body>
</html>
