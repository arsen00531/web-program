<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "adminModel.php";

$error = $_GET["error"] ?? "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST["login"] ?? "");
    $password = $_POST["password"] ?? "";

    try {
        $pdoAdmin = connectAdminPdo();
        if (verifyAdmin($pdoAdmin, $login, $password)) {
            loginAdmin($login);
            header("Location: helloAdmin2025.php");
            exit;
        }
    } catch (PDOException $e) {
        $error = "База данных ошибка: " . $e->getMessage();
        include "adminLoginForm2025.php";
        exit;
    }

    header("Location: adminLoginForm2025.php?error=" . urlencode("Неверный логин или пароль"));
    exit;
}

include "adminLoginForm2025.php";
