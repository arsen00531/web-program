<?php

require_once __DIR__ . "/db.php";

initDatabase();

function saveUser(array $userData): void
{
    $pdo = getPdo();
    $stmt = $pdo->prepare("INSERT INTO users (name, age, phone, email) VALUES (:name, :age, :phone, :email)");
    $stmt->execute([
        "name" => $userData["name"],
        "age" => (int)$userData["age"],
        "phone" => $userData["phone"],
        "email" => $userData["email"],
    ]);
}

function loadUsers(): array
{
    $pdo = getPdo();
    return $pdo->query("SELECT * FROM users ORDER BY id")->fetchAll();
}

function getUserById(int $id): ?array
{
    $pdo = getPdo();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function updateUser(int $id, array $userData): void
{
    $pdo = getPdo();
    $stmt = $pdo->prepare("UPDATE users SET name = :name, age = :age, phone = :phone, email = :email WHERE id = :id");
    $stmt->execute([
        "id" => $id,
        "name" => $userData["name"],
        "age" => (int)$userData["age"],
        "phone" => $userData["phone"],
        "email" => $userData["email"],
    ]);
}

function deleteRecord(int $idToDelete): void
{
    $users = loadUsers();
    $newArray = [];

    foreach ($users as $user) {
        if ((int)$user["id"] !== $idToDelete) {
            $newArray[] = $user;
        }
    }

    if ($idToDelete > 0) {
        $pdo = getPdo();
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(["id" => $idToDelete]);
    }
}

function saveAdmin(string $login, string $password): void
{
    $pdo = getPdo();
    $hash = md5($password);

    $stmt = $pdo->prepare("INSERT INTO admin (login, password_hash) VALUES (:login, :hash)
        ON DUPLICATE KEY UPDATE login = VALUES(login), password_hash = VALUES(password_hash)");
    $stmt->execute(["login" => $login, "hash" => $hash]);
}

function findAdminByLogin(string $login): ?array
{
    $pdo = getPdo();
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE login = :login LIMIT 1");
    $stmt->execute(["login" => $login]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function verifyAdmin(string $login, string $password): bool
{
    $admin = findAdminByLogin($login);
    if ($admin === null) {
        return false;
    }
    return md5($password) === $admin["password_hash"];
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
