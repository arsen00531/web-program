<?php

$host = "localhost";
$data = "dataBase";
$user = "root";
$pass = "";
$chrs = "utf8mb4";
$attr = "mysql:host=$host;dbname=$data;charset=$chrs";
$opts = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
];

$hostAdmin = "localhost";
$dataAdmin = "adminBase";
$attrAdmin = "mysql:host=$hostAdmin;dbname=$dataAdmin;charset=$chrs";
