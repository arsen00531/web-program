<?php
require_once "model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $record = [
        "name" => $_POST["name"] ?? "",
        "email" => $_POST["email"] ?? "",
        "phone" => $_POST["phone"] ?? "",
    ];
    save_data($record);
}

$main_array_data = load_data();

include "view1.php";
