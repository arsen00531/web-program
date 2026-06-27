<?php

define("ADMIN_FILE", __DIR__ . "/admin.dat");

function correct_password(string $password): bool
{
    if ($password === "") {
        return false;
    }

    if (!preg_match("/[a-zA-Z]/", $password)) {
        return false;
    }

    if (!preg_match("/[0-9]/", $password)) {
        return false;
    }

    if (!preg_match("/[!@#\$%\^_\?=]/", $password)) {
        return false;
    }

    if (preg_match("/\d{3,}/", $password)) {
        return false;
    }

    if (preg_match("/[a-zA-Z]{3,}/", $password)) {
        return false;
    }

    if (preg_match("/[!@#\$%\^_\?=]{3,}/", $password)) {
        return false;
    }

    return true;
}

function password_errors(string $password): array
{
    $errors = [];

    if ($password === "") {
        $errors[] = "Пароль не может быть пустым";
        return $errors;
    }

    if (!preg_match("/[a-zA-Z]/", $password)) {
        $errors[] = "Пароль должен содержать буквы a-z или A-Z";
    }

    if (!preg_match("/[0-9]/", $password)) {
        $errors[] = "Пароль должен содержать цифру 0-9";
    }

    if (!preg_match("/[!@#\$%\^_\?=]/", $password)) {
        $errors[] = "Пароль должен содержать символ из !@#\$%^_?=";
    }

    if (preg_match("/\d{3,}/", $password)) {
        $errors[] = "Не более 2 цифр подряд";
    }

    if (preg_match("/[a-zA-Z]{3,}/", $password)) {
        $errors[] = "Не более 2 букв подряд";
    }

    if (preg_match("/[!@#\$%\^_\?=]{3,}/", $password)) {
        $errors[] = "Не более 2 служебных символов подряд";
    }

    return $errors;
}

function saveAdmin(string $adminNameData, string $adminPassData): array
{
    $adminData = [];
    $adminData["name"] = $adminNameData;
    $adminData["pass"] = md5($adminPassData);

    $string_to_record = json_encode($adminData, JSON_UNESCAPED_UNICODE);

    $fp = fopen(ADMIN_FILE, "w") or die("Error open file to write!");
    fputs($fp, $string_to_record);
    fclose($fp);

    return $adminData;
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
