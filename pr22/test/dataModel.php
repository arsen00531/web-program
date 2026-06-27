<?php

function getDataToArrayFromBD(PDO $pdo): array
{
    $userDataArrayTemp = [];
    $query = "SELECT * FROM `dataBase`.user_data";
    $resultQuery = $pdo->query($query);

    while ($tempData = $resultQuery->fetch()) {
        $userDataArrayTemp[] = $tempData;
    }

    return $userDataArrayTemp;
}

function insertUser(PDO $pdo, string $name, int $age): void
{
    $nameEsc = addslashes($name);
    $query = "INSERT INTO user_data VALUES (NULL, '$nameEsc', $age)";
    $pdo->query($query);
}

function insertAdmin(PDO $pdo, string $login, string $password): void
{
    $loginEsc = addslashes($login);
    $passEsc = addslashes($password);
    $query = "INSERT INTO admin_table (login, password) VALUES ('$loginEsc', '$passEsc')";
    $pdo->query($query);
}

function getAdminArrayFromBD(PDO $pdo): array
{
    $result = [];
    $query = "SELECT id, login FROM `adminBase`.admin_table";
    $resultQuery = $pdo->query($query);

    while ($row = $resultQuery->fetch()) {
        $result[] = $row;
    }

    return $result;
}
