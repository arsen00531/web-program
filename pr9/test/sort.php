<?php
require_once "model.php";

$order = $_GET["order"] ?? "asc";
$desc = $order === "desc";

$main_array_data = sort_data($desc);
$sort_label = $desc ? "Сортировка: по убыванию" : "Сортировка: по возрастанию";

include "view1.php";
