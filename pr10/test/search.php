<?php
require_once "model.php";

$field = $_GET["field"] ?? "name";
$query = sanitize_string($_GET["query"] ?? "");

$main_array_data = search_data($field, $query);
$search_label = "Поиск «$query» в поле $field";

include "view1.php";
