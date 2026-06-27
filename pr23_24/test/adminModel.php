<?php

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
