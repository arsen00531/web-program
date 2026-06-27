<?php

define("ADMIN_FILE", __DIR__ . "/fileAdminDat2025.dat");
define("USERS_FILE", __DIR__ . "/users.dat");

function writeUsersToFile(array $users): void
{
    $fp = fopen(USERS_FILE, "w") or die("Error open file to write!");
    foreach ($users as $user) {
        fputs($fp, json_encode($user, JSON_UNESCAPED_UNICODE) . "\n");
    }
    fclose($fp);
}

function loadUsersFromFile(): array
{
    if (!file_exists(USERS_FILE)) {
        return [];
    }

    $users = [];
    $myFileForRead = fopen(USERS_FILE, "r") or die("Error open file to read!");

    while (!feof($myFileForRead)) {
        $line = trim(fgets($myFileForRead));
        if ($line === "") {
            continue;
        }
        $decoded = json_decode($line, true);
        if (is_array($decoded)) {
            $users[] = $decoded;
        }
    }

    fclose($myFileForRead);
    return $users;
}

function getNextUserId(array $users): int
{
    $max = 0;
    foreach ($users as $user) {
        $max = max($max, (int)($user["id"] ?? 0));
    }
    return $max + 1;
}

function saveUser(array $userData): void
{
    $users = loadUsersFromFile();
    $userData["id"] = getNextUserId($users);
    $users[] = $userData;
    writeUsersToFile($users);
}

function loadUsers(): array
{
    return loadUsersFromFile();
}

function getUserById(int $id): ?array
{
    foreach (loadUsersFromFile() as $user) {
        if ((int)($user["id"] ?? 0) === $id) {
            return $user;
        }
    }
    return null;
}

function updateUser(int $id, array $userData): void
{
    $users = loadUsersFromFile();

    foreach ($users as &$user) {
        if ((int)($user["id"] ?? 0) === $id) {
            $user["name"] = $userData["name"];
            $user["age"] = (int)$userData["age"];
            $user["phone"] = $userData["phone"];
            $user["email"] = $userData["email"];
            break;
        }
    }
    unset($user);

    writeUsersToFile($users);
}

function deleteRecord(int $idToDelete): void
{
    if ($idToDelete <= 0) {
        return;
    }

    $users = loadUsersFromFile();
    $newArray = [];

    foreach ($users as $user) {
        if ((int)($user["id"] ?? 0) !== $idToDelete) {
            $newArray[] = $user;
        }
    }

    writeUsersToFile($newArray);
}

function saveAdmin(string $login, string $password): void
{
    $adminData = [];
    $adminData["login"] = $login;
    $adminData["pass"] = md5($password);

    $string_to_record = json_encode($adminData, JSON_UNESCAPED_UNICODE);

    $fp = fopen(ADMIN_FILE, "w") or die("Error open file to write!");
    fputs($fp, $string_to_record);
    fclose($fp);
}

function loadAdmin(): ?object
{
    if (!file_exists(ADMIN_FILE)) {
        return null;
    }

    $myFileForRead = fopen(ADMIN_FILE, "r") or die("Error open file to read!");
    $myObjectFromFile = null;

    while (!feof($myFileForRead)) {
        $string_from_file = trim(fgets($myFileForRead));
        if ($string_from_file !== "") {
            $myObjectFromFile = json_decode($string_from_file, false);
        }
    }

    fclose($myFileForRead);
    return $myObjectFromFile;
}

function verifyAdmin(string $login, string $password): bool
{
    $admin = loadAdmin();
    if ($admin === null) {
        return false;
    }

    $storedLogin = $admin->login ?? $admin->name ?? "";
    $storedPass = $admin->pass ?? "";

    return $login === $storedLogin && md5($password) === $storedPass;
}

function validatePasswordMatch(string $pass1, string $pass2): array
{
    return $pass1 === $pass2 ? [] : ["Пароли не совпадают"];
}

function validatePasswordStrength(string $password): array
{
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        return ["Пароль: минимум 8 символов, заглавная, строчная буква и цифра"];
    }
    return [];
}

function startSessionIfNeeded(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function isAdminLoggedIn(): bool
{
    startSessionIfNeeded();
    return !empty($_SESSION["admin_login"]);
}

function requireAdmin(): void
{
    startSessionIfNeeded();
    if (!isAdminLoggedIn()) {
        header("Location: adminLoginForm2025.php");
        exit;
    }
}

function loginAdmin(string $login): void
{
    startSessionIfNeeded();
    $_SESSION["admin_login"] = $login;
}

function logoutAdmin(): void
{
    startSessionIfNeeded();
    $_SESSION = [];
    session_destroy();
}
