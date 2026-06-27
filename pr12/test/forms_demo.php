<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $checkBoxData = $_POST["check1"] ?? [];
    $radioData = $_POST["radio1"] ?? "";
    $selectData = $_POST["select1"] ?? [];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>forms_demo</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    form { padding: 16px; border: 1px solid #ccc; margin-bottom: 20px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>Элементы форм</h1>

  <form method="POST" action="forms_demo.php">
    <p>checkbox (name="check1[]" — массив, т.к. несколько значений):</p>
    <label><input type="checkbox" name="check1[]" value="1"> 1</label>
    <label><input type="checkbox" name="check1[]" value="2"> 2</label>
    <label><input type="checkbox" name="check1[]" value="3"> 3</label>

    <p>radio (name="radio1" — одно значение, массив не нужен):</p>
    <label><input type="radio" name="radio1" value="1"> 1</label>
    <label><input type="radio" name="radio1" value="2"> 2</label>
    <label><input type="radio" name="radio1" value="3"> 3</label>

    <p>select multiple (name="select1[]" — массив):</p>
    <select name="select1[]" multiple size="3">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
    </select>

    <br><br>
    <button type="submit">Отправить POST</button>
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
    <h2>checkbox</h2>
    <pre><?php print_r($checkBoxData); ?></pre>
    <h2>radio</h2>
    <pre><?php print_r($radioData); ?></pre>
    <h2>select</h2>
    <pre><?php print_r($selectData); ?></pre>
  <?php endif; ?>
</body>
</html>
