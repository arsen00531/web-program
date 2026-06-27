<?php
require_once "model.php";

$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password1 = $_POST["password1"] ?? "";
    $password2 = $_POST["password2"] ?? "";

    $errors = validate_password_match($password1, $password2);
    if (empty($errors)) {
        $errors = validate_password_strength($password1);
    }

    if (empty($errors)) {
        $success = "Регистрация успешна. Пароль прошёл проверку сложности.";
    }
}

include "register_view.php";
