<?php

define("ADMIN_FILE", __DIR__ . "/admin.dat");
define("USERS_FILE", __DIR__ . "/users.dat");
define("TEXT_FILE", __DIR__ . "/mainData.txt");

function saveAdmin(string $adminNameData, string $adminPassData): void
{
    $adminData = [];
    $adminData["name"] = $adminNameData;
    $adminData["pass"] = md5($adminPassData);

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

function saveUserToFile(array $userData): void
{
    $users = loadUsersFromFile();
    $users[] = $userData;

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

function appendTextLine(string $line): void
{
    $fp = fopen(TEXT_FILE, "a") or die("Error open file to write!");
    fputs($fp, $line . "\n");
    fclose($fp);
}

function loadTextLines(): array
{
    if (!file_exists(TEXT_FILE)) {
        return [];
    }

    $myArrayFromFile = [];
    $mainIndex = 0;
    $myFileForRead = fopen(TEXT_FILE, "r") or die("Error open file to read!");

    while (!feof($myFileForRead)) {
        $myArrayFromFile["user" . $mainIndex] = fgets($myFileForRead);
        ++$mainIndex;
    }

    array_pop($myArrayFromFile);
    fclose($myFileForRead);
    return $myArrayFromFile;
}

function usersToTable(array $users): string
{
    if (empty($users)) {
        return "";
    }

    $html = "<table border='all' style='width:100%; border-collapse:collapse; margin-top:16px;'>";
    $html .= "<tr><th>Имя</th><th>Возраст</th><th>Телефон</th><th>Email</th></tr>";

    foreach ($users as $user) {
        $html .= "<tr>";
        $html .= "<td>" . htmlspecialchars($user["name"] ?? "") . "</td>";
        $html .= "<td>" . htmlspecialchars((string)($user["age"] ?? "")) . "</td>";
        $html .= "<td>" . htmlspecialchars($user["phone"] ?? "") . "</td>";
        $html .= "<td>" . htmlspecialchars($user["email"] ?? "") . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}
