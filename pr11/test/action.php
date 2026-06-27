<?php
require_once "model.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = user_from_post();
    $errors = validate_user($user);

    if (empty($errors)) {
        save_data($user);
    }
}

$main_array_data = load_data();

include "view1.php";
