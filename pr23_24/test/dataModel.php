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

function findAdminByLogin(PDO $pdo, string $login): ?object
{
    $loginEsc = addslashes($login);
    $query = "SELECT * FROM admin_table WHERE login='$loginEsc' LIMIT 1";
    $resultQuery = $pdo->query($query);
    $row = $resultQuery->fetch();

    return $row ?: null;
}

function verifyAdmin(PDO $pdo, string $login, string $password): bool
{
    $admin = findAdminByLogin($pdo, $login);
    if ($admin === null) {
        return false;
    }

    return $password === ($admin->password ?? "");
}

function deleteUserById(PDO $pdo, int $userId): int
{
    $query = "DELETE FROM user_data WHERE id=$userId";
    return $pdo->exec($query);
}

function getUserById(PDO $pdo, int $userId): ?array
{
    $query = "SELECT * FROM user_data WHERE id='$userId'";
    $resultQuery = $pdo->query($query);
    $row = $resultQuery->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function updateUser(PDO $pdo, int $userId, string $name, int $age): int
{
    $nameEsc = addslashes($name);
    $query = "UPDATE user_data SET userName='$nameEsc', userAge='$age' WHERE id='$userId'";
    return $pdo->exec($query);
}
