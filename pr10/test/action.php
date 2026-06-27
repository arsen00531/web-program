<?php
require_once "model.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ageRaw = $_POST["age"] ?? "";
    $user = user_from_post();
    $errors = validate_user($user, $ageRaw);

    if (empty($errors)) {
        save_data($user);
    }
}

$main_array_data = load_data();

include "view1.php";
