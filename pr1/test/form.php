<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Задание 4 — данные формы на сервере</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }

    form {
      display: grid;
      gap: 12px;
      margin-bottom: 24px;
      padding: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    label {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    input {
      padding: 8px;
    }

    button {
      width: fit-content;
      padding: 8px 16px;
      cursor: pointer;
    }

    pre {
      background: #f5f5f5;
      padding: 16px;
      border-radius: 8px;
      overflow-x: auto;
    }

    .hint {
      color: #666;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h1>Получение данных формы в PHP</h1>
  <p class="hint">
    Для задания 4 submit работает по умолчанию — данные уходят на сервер.
    Сейчас метод отправки: <strong><?php echo htmlspecialchars($_SERVER["REQUEST_METHOD"]); ?></strong>
  </p>

  <form method="POST" action="form.php">
    <label>
      ФИО
      <input type="text" name="fullName" value="<?php echo htmlspecialchars($_POST['fullName'] ?? $_GET['fullName'] ?? ''); ?>">
    </label>
    <label>
      Группа
      <input type="text" name="groupName" value="<?php echo htmlspecialchars($_POST['groupName'] ?? $_GET['groupName'] ?? ''); ?>">
    </label>
    <label>
      Возраст
      <input type="number" name="age" min="16" max="100" value="<?php echo htmlspecialchars($_POST['age'] ?? $_GET['age'] ?? ''); ?>">
    </label>
    <button type="submit">Отправить на сервер</button>
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] === "GET" && !empty($_GET)): ?>
    <h2>Данные из $_GET</h2>
    <pre><?php print_r($_GET); ?></pre>

    <?php if (isset($_GET["userNameElement"])): ?>
      <?php
        $userNameData = $_GET["userNameElement"];
        echo "Hello, " . htmlspecialchars($userNameData) . " !!!!";
      ?>
    <?php endif; ?>

    <?php if (isset($_GET["fullName"])): ?>
      <?php
        $fullNameData = $_GET["fullName"];
        echo "<p>Hello, " . htmlspecialchars($fullNameData) . " !!!!</p>";
      ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST)): ?>
    <h2>Данные из $_POST</h2>
    <pre><?php print_r($_POST); ?></pre>

    <?php if (isset($_POST["fullName"])): ?>
      <?php
        $fullNameData = $_POST["fullName"];
        echo "<p>Hello, " . htmlspecialchars($fullNameData) . " !!!!</p>";
      ?>
    <?php endif; ?>
  <?php endif; ?>

  <?php if (!empty($_REQUEST)): ?>
    <h2>Данные из $_REQUEST</h2>
    <pre><?php echo print_r($_REQUEST, true); ?></pre>
  <?php endif; ?>

  <p><a href="index.html">Вернуться к клиентскому проекту (задание 3)</a></p>
  <p><a href="form-get.html">Форма с методом GET (задание 4)</a></p>
</body>
</html>
