<?php
require_once "db_config.php";

try {
    $pdo = new PDO("mysql:host=localhost;dbname=myFirstDataBase", "root", "");
    echo "connect OK";
} catch (PDOException $e) {
    echo "Error connect with BD";
}
