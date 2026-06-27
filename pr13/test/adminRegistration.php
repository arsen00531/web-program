<?php

session_start();

require_once "model.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: adminFormRegistration.html");
    exit;
}

$userName = trim($_POST["login"] ?? "");
$passData = $_POST["password"] ?? "";
$passConfirm = $_POST["passwordConfirm"] ?? "";

$errors = [];

if ($userName === "") {
    $errors[] = "Введите логин";
}

if ($passData !== $passConfirm) {
    $errors[] = "Пароли не совпадают";
}

if (!correct_password($passData)) {
    $errors = array_merge($errors, password_errors($passData));
}

if (!empty($errors)) {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
      <meta charset="UTF-8">
      <title>Ошибка регистрации</title>
    </head>
    <body>
      <h1>adminRegistration.php — ошибки</h1>
      <ul>
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
      <p><a href="adminFormRegistration.html">← К форме регистрации</a></p>
    </body>
    </html>
    <?php
    exit;
}

saveAdmin($userName, $passData);

$_SESSION["userName"] = $userName;

header("Location: helloAdmin2025.php");
exit;
