<?php
require_once "model.php";

$key = $_GET["key"] ?? "name";
$order = $_GET["order"] ?? "asc";
$desc = $order === "desc";

$main_array_data = sort_data_usort($key, $desc);
$sort_label = "Сортировка по $key: " . ($desc ? "убывание" : "возрастание");

include "view1.php";
