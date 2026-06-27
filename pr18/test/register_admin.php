<?php
require_once "model.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: admin_register_form.php");
    exit;
}

$login = trim($_POST["login"] ?? "");
$password1 = $_POST["password1"] ?? "";
$password2 = $_POST["password2"] ?? "";

if ($login === "") {
    $errors[] = "Введите логин";
}

$errors = array_merge($errors, validatePasswordMatch($password1, $password2));
if (empty($errors)) {
    $errors = array_merge($errors, validatePasswordStrength($password1));
}

if (empty($errors)) {
    saveAdmin($login, $password1);
    header("Location: registered.php");
    exit;
}

include "admin_register_form.php";
