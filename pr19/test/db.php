<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");

function getPdo(string $database): PDO
{
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . $database . ";charset=utf8mb4";
    return new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
