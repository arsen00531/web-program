<?php
require_once "db_config.php";

function fetchTable(PDO $pdo, string $query): array
{
    $rows = [];
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
}

function renderTable(array $rows, string $title): string
{
    if (empty($rows)) {
        return "<h2>$title</h2><p>Нет данных</p>";
    }

    $html = "<h2>$title</h2><table border='1' style='border-collapse:collapse;'>";
    $html .= "<tr>";
    foreach (array_keys($rows[0]) as $col) {
        $html .= "<th>" . htmlspecialchars($col) . "</th>";
    }
    $html .= "</tr>";

    foreach ($rows as $row) {
        $html .= "<tr>";
        foreach ($row as $val) {
            $html .= "<td>" . htmlspecialchars((string)$val) . "</td>";
        }
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}

$sections = [];

try {
    $pdoFirst = connectPdo("myFirstDataBase", DB_ROOT_USER, DB_ROOT_PASS);
    $sections[] = renderTable(
        fetchTable($pdoFirst, "SELECT * FROM myFirstTable ORDER BY myName"),
        "myFirstDataBase.myFirstTable (root)"
    );
} catch (Throwable $e) {
    $sections[] = "<p style='color:red'>myFirstDataBase: " . htmlspecialchars($e->getMessage()) . "</p>";
}

try {
    $pdoLib = connectPdo("library", DB_ROOT_USER, DB_ROOT_PASS);
    $sections[] = renderTable(
        fetchTable($pdoLib, "SELECT author, title, year FROM books ORDER BY author ASC, year DESC"),
        "library.books (root)"
    );
} catch (Throwable $e) {
    $sections[] = "<p style='color:red'>library: " . htmlspecialchars($e->getMessage()) . "</p>";
}

try {
    $pdoWeb = connectPdo(DB_APP_NAME, DB_APP_USER, DB_APP_PASS);
    $sections[] = renderTable(
        fetchTable($pdoWeb, "SELECT * FROM users"),
        "web.users (web_user)"
    );
    $sections[] = renderTable(
        fetchTable($pdoWeb, "SELECT id, login FROM admin"),
        "web.admin (web_user)"
    );
} catch (Throwable $e) {
    $sections[] = "<p style='color:red'>web (web_user): " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Все базы</title>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>Выборка из всех баз</h1>
  <?php foreach ($sections as $section): ?>
    <?= $section ?>
  <?php endforeach; ?>
</body>
</html>
