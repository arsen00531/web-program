<?php
require_once "model.php";

$error = $_GET["error"] ?? "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");
    $password = $_POST["password"] ?? "";

    if (verifyAdmin($login, $password)) {
        loginAdmin($login);
        header("Location: helloAdmin2025.php");
        exit;
    }

    header("Location: adminLoginForm2025.php?error=" . urlencode("Неверный логин или пароль"));
    exit;
}

include "adminLoginForm2025.php";
