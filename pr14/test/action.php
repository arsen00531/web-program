<?php
require_once "model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userData = [
        "name" => trim($_POST["name"] ?? ""),
        "age" => (int)($_POST["age"] ?? 0),
        "phone" => trim($_POST["phone"] ?? ""),
        "email" => trim($_POST["email"] ?? ""),
    ];
    saveUserToFile($userData);
}

$users = loadUsersFromFile();

include "view1.php";
