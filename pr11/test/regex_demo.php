<?php
$matches = [];
$m = [];

preg_match("/\d+/s", "article_l23.html", $matches);
preg_match("/(\S+)@([a-z0-9.]+)/is", "Привет от somebody@mail.ru!", $m);

$text = "Адреса : sergey@sergey.ru, anna@anna.ru";
$linkedText = preg_replace(
    '/[-\w.]+@[-\w]+(\.[-\w]+)/xs',
    '<a href="mailto:$0">$0</a>',
    $text
);

$splitDemo = preg_split("/\s+/", "one two  three");
$allDigits = [];
preg_match_all("/\d+/", "article_l23.html", $allDigits);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>regex_demo</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <h2>preg_match('/\d+/s', 'article_l23.html', $matches)</h2>
  <p>$matches[0] = <?= htmlspecialchars($matches[0] ?? "") ?></p>
  <pre><?php print_r($matches); ?></pre>

  <h2>preg_match('/(\S+)@([a-z0-9.]+)/is', 'Привет от somebody@mail.ru!', $m)</h2>
  <pre><?php print_r($m); ?></pre>

  <h2>Задание 1 — preg_replace (ссылки mailto)</h2>
  <p>Исходный текст: <?= htmlspecialchars($text) ?></p>
  <p>Результат: <?= $linkedText ?></p>

  <h2>preg_match_all — все числа</h2>
  <pre><?php print_r($allDigits); ?></pre>

  <h2>preg_split — по пробелам</h2>
  <pre><?php print_r($splitDemo); ?></pre>
</body>
</html>
