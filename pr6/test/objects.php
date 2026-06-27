<?php
require_once "library.php";
require_once "User.php";

$userName = "Sergey";
$userAge = "49";
$userEmail = "sergey-246@yandex.ru";

$userSergey = new UserClass();
$userSergey->userName = $userName;
$userSergey->userAge = (int)$userAge;
$userSergey->setUserEmail($userEmail);

$testUser = new UserClass();

// --- Задание 1: открытые поля ---
$userPublic1 = new UserPublic();
$userPublic1->id = "10";
$userPublic1->name = "Ivan";
$userPublic1->surname = "Ivanov";

$userPublic2 = new UserPublic();
$userPublic2->id = "20";
$userPublic2->name = "Petr";
$userPublic2->surname = "Petrov";

$publicUsers = [$userPublic1, $userPublic2];

// --- Задание 2: закрытые поля ---
$userPrivate1 = new UserPrivate();
$userPrivate1->setId("10");
$userPrivate1->setName("Ivan");
$userPrivate1->setSurname("Ivanov");

$userPrivate2 = new UserPrivate();
$userPrivate2->setId("20");
$userPrivate2->setName("Petr");
$userPrivate2->setSurname("Petrov");

$privateUsers = [$userPrivate1, $userPrivate2];

// --- Задание 3: конструктор + объект по умолчанию ---
$defaultUser = new UserPrivate();
$privateWithDefault = [$defaultUser, $userPrivate1, $userPrivate2];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Объекты и классы</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    h2 { border-bottom: 1px solid #ccc; margin-top: 32px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <h2>1–2. Создание класса и объекта</h2>
  <pre><?php print_r($userSergey); ?></pre>

  <h2>5. Метод setUserEmail для закрытого поля</h2>
  <p>userEmail задан через setUserEmail() — прямой доступ вызовет ошибку.</p>

  <h2>6. Конструктор</h2>
  <pre><?php print_r($testUser); ?></pre>

  <h2>Задание 1. Класс с открытыми полями</h2>
  <?= createObjectTablePublic($publicUsers) ?>

  <h2>Задание 2. Класс с закрытыми полями</h2>
  <?= createObjectTablePrivate($privateUsers) ?>

  <h2>Задание 3. Конструктор + объект по умолчанию</h2>
  <?= createObjectTablePrivate($privateWithDefault) ?>
</body>
</html>
