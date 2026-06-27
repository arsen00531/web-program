<?php

require_once "loginBD.php";

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    echo "Error connect with BD";
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

function connectAdminPdo(): PDO
{
    global $attrAdmin, $user, $pass, $opts;
    return new PDO($attrAdmin, $user, $pass, $opts);
}
