<?php

require_once __DIR__ . "/db.php";

function loadBooks(): array
{
    $pdo = getPdo("library");
    return $pdo->query("SELECT * FROM books ORDER BY id")->fetchAll();
}

function loadBooksFiltered(string $condition): array
{
    $pdo = getPdo("library");
    $sql = "SELECT * FROM books WHERE $condition ORDER BY id";
    return $pdo->query($sql)->fetchAll();
}

function booksToTable(array $books): string
{
    if (empty($books)) {
        return "<p>Нет записей. Выполните sql/library.sql в phpMyAdmin.</p>";
    }

    $html = "<table border='1' style='border-collapse:collapse; width:100%;'>";
    $html .= "<tr><th>ID</th><th>Название</th><th>Автор</th><th>Год</th></tr>";

    foreach ($books as $book) {
        $html .= "<tr>";
        $html .= "<td>" . (int)$book["id"] . "</td>";
        $html .= "<td>" . htmlspecialchars($book["title"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($book["author"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($book["year"]) . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}
