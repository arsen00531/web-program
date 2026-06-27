<?php

require_once "User.php";

define("DATA_FILE", __DIR__ . "/data.json");

function load_data(): array
{
    if (!file_exists(DATA_FILE)) {
        return [];
    }

    $json = file_get_contents(DATA_FILE);
    $rows = json_decode($json, true);

    if (!is_array($rows)) {
        return [];
    }

    $users = [];
    foreach ($rows as $row) {
        $user = new User();
        $user->name = $row["name"] ?? "";
        $user->email = $row["email"] ?? "";
        $user->phone = $row["phone"] ?? "";
        $user->age = (int)($row["age"] ?? 0);
        $users[] = $user;
    }

    return $users;
}

function save_data(User $user): void
{
    $data = [];
    if (file_exists(DATA_FILE)) {
        $data = json_decode(file_get_contents(DATA_FILE), true) ?: [];
    }

    $data[] = [
        "name" => $user->name,
        "email" => $user->email,
        "phone" => $user->phone,
        "age" => $user->age,
    ];

    file_put_contents(
        DATA_FILE,
        json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
    );
}

function copy_array(array $source): array
{
    $copy = [];
    foreach ($source as $key => $value) {
        $copy[$key] = $value;
    }
    return $copy;
}

function build_sorter(string $key): callable
{
    return function ($a, $b) use ($key) {
        return $a->$key < $b->$key;
    };
}

function sort_data_usort(string $key, bool $desc = false): array
{
    $users = copy_array(load_data());
    usort($users, build_sorter($key));

    if ($desc) {
        $users = array_reverse($users);
    }

    return $users;
}

function search_data(string $field, string $query): array
{
    $users = load_data();
    $result = [];

    foreach ($users as $user) {
        $value = (string)$user->$field;
        if (mb_stripos($value, $query) !== false) {
            $result[] = $user;
        }
    }

    return $result;
}

function user_from_post(): User
{
    $user = new User();
    $user->name = sanitize_string($_POST["name"] ?? "");
    $user->email = sanitize_string($_POST["email"] ?? "");
    $user->phone = sanitize_string($_POST["phone"] ?? "");
    $user->age = (int)trim($_POST["age"] ?? "0");
    return $user;
}

function sanitize_string(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)));
}

function validate_age(string $ageRaw): array
{
    $errors = [];
    $ageRaw = trim($ageRaw);

    if ($ageRaw === "" || !ctype_digit($ageRaw)) {
        $errors[] = "Возраст должен быть числом";
        return $errors;
    }

    $age = (int)$ageRaw;
    if (!is_int($age)) {
        $errors[] = "Возраст должен быть числом";
    }
    if ($age < 16 || $age > 99) {
        $errors[] = "Возраст должен быть от 16 до 99";
    }

    return $errors;
}

function validate_email(string $email): array
{
    $errors = [];

    $firstAt = mb_stripos($email, "@");
    if ($firstAt === false) {
        $errors[] = "В email должен быть символ @";
    } else {
        $secondAt = mb_stripos($email, "@", $firstAt + 1);
        if ($secondAt !== false) {
            $errors[] = "Символ @ должен быть только один";
        }
    }

    if (mb_strlen($email) < 6) {
        $errors[] = "Длина email не меньше 6 символов";
    }

    if (mb_strpos($email, " ") !== false) {
        $errors[] = "В email не должно быть пробелов";
    }

    if (mb_strpos($email, "#") !== false) {
        $errors[] = "В email не должно быть символа #";
    }

    return $errors;
}

function validate_name(string $name): array
{
    $errors = [];

    if (preg_match("/\d/", $name)) {
        $errors[] = "В имени не должно быть цифр";
    }

    return $errors;
}

function validate_user(User $user, string $ageRaw): array
{
    $errors = validate_name($user->name);
    $errors = array_merge($errors, validate_email($user->email));
    $errors = array_merge($errors, validate_age($ageRaw));
    return $errors;
}
