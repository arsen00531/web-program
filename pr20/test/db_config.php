<?php

define("DB_HOST", "localhost");
define("DB_ROOT_USER", "root");
define("DB_ROOT_PASS", "");
define("DB_APP_USER", "web_user");
define("DB_APP_PASS", "web_pass");
define("DB_APP_NAME", "web");

function connectPdo(string $dbname, string $user, string $pass): PDO
{
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . $dbname . ";charset=utf8mb4";
    return new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
}
