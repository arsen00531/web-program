<?php

define("DATA_FILE", __DIR__ . "/data.json");

function load_data(): array
{
    if (!file_exists(DATA_FILE)) {
        return [];
    }

    $json = file_get_contents(DATA_FILE);
    $data = json_decode($json, true);

    return is_array($data) ? $data : [];
}

function save_data(array $record): void
{
    $data = load_data();
    $data[] = $record;

    $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents(DATA_FILE, $json);
}

function copy_array(array $source): array
{
    $copy = [];
    foreach ($source as $key => $value) {
        $copy[$key] = $value;
    }
    return $copy;
}

function sort_data(bool $desc = false): array
{
    $rows = copy_array(load_data());
    $firstColumn = array_column($rows, "name");

    if ($desc) {
        array_multisort($firstColumn, SORT_DESC, $rows);
    } else {
        array_multisort($firstColumn, SORT_ASC, $rows);
    }

    return $rows;
}
