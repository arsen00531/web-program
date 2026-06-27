<?php

function loadDataFromFile(string $filePath): array
{
    if (!file_exists($filePath)) {
        return [];
    }

    $json = file_get_contents($filePath);
    $data = json_decode($json, true);

    return is_array($data) ? $data : [];
}

function saveDataToFile(string $filePath, array $data): void
{
    $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents($filePath, $json);
}

function copyArray(array $source): array
{
    $copy = [];
    foreach ($source as $key => $value) {
        $copy[$key] = $value;
    }
    return $copy;
}

function createDataTable(array $rows): string
{
    if (empty($rows)) {
        return "";
    }

    $html = "<table style='width: 100%; border: 1px solid green; margin-top: 20px;' border=all>";
    $html .= "<tr><td>Имя</td><td>Email</td><td>Телефон</td></tr>";

    foreach ($rows as $row) {
        $html .= "<tr>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($row["name"] ?? "") . "</td>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($row["email"] ?? "") . "</td>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($row["phone"] ?? "") . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}

function sortByFirstColumn(array $rows, bool $desc = false): array
{
    $copy = copyArray($rows);
    $firstColumn = array_column($copy, "name");

    if ($desc) {
        array_multisort($firstColumn, SORT_DESC, $copy);
    } else {
        array_multisort($firstColumn, SORT_ASC, $copy);
    }

    return $copy;
}
