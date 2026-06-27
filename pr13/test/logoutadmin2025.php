<?php

session_start();

echo "<h1>Good by, Admin!!!</h1>";

unset($_SESSION["userName"]);
session_unset();
session_destroy();

echo "<p><a href=\"helloAdmin2025.php\">helloAdmin2025.php</a></p>";
echo "<p><a href=\"adminFormRegistration.html\">Регистрация администратора</a></p>";
echo "<p><a href=\"index.html\">На главную</a></p>";
