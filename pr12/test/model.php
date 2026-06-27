<?php

require_once "User.php";

define("DATA_FILE", __DIR__ . "/data.json");

function load_data(): array
{
    if (!file_exists(DATA_FILE)) {
        return [];
    }

    $rows = json_decode(file_get_contents(DATA_FILE), true);
    if (!is_array($rows)) {
        return [];
    }

    $users = [];
    foreach ($rows as $row) {
        $user = new User();
        $user->name = $row["name"] ?? "";
        $user->email = $row["email"] ?? "";
        $user->phone = $row["phone"] ?? "";
        $user->gender = $row["gender"] ?? "";
        $user->interests = $row["interests"] ?? [];
        $users[] = $user;
    }

    return $users;
}

function save_data(User $user): void
{
    $data = file_exists(DATA_FILE)
        ? json_decode(file_get_contents(DATA_FILE), true) ?: []
        : [];

    $data[] = [
        "name" => $user->name,
        "email" => $user->email,
        "phone" => $user->phone,
        "gender" => $user->gender,
        "interests" => $user->interests,
    ];

    file_put_contents(
        DATA_FILE,
        json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
    );
}

function sanitize_string(string $value): string
{
    return htmlspecialchars(strip_tags(trim($value)));
}

function user_from_post(): User
{
    $user = new User();
    $user->name = sanitize_string($_POST["name"] ?? "");
    $user->email = sanitize_string($_POST["email"] ?? "");
    $user->phone = sanitize_string($_POST["phone"] ?? "");
    $user->gender = sanitize_string($_POST["gender"] ?? "");
    $user->interests = isset($_POST["interests"]) && is_array($_POST["interests"])
        ? array_map("sanitize_string", $_POST["interests"])
        : [];
    return $user;
}

function validate_name_regex(string $name): array
{
    $errors = [];
    if (!preg_match("/^[a-zA-Zа-яА-ЯёЁ]+$/u", $name)) {
        $errors[] = "Имя: только буквы латинского или кириллического алфавита";
    }
    return $errors;
}

function validate_email_regex(string $email): array
{
    $errors = [];
    if (!preg_match("/^[-\w.]+@[-\w]+(\.[-\w]+)+$/i", $email)) {
        $errors[] = "Некорректный адрес электронной почты";
    }
    return $errors;
}

function validate_phone_regex(string $phone): array
{
    $errors = [];
    if (!preg_match("/^\+1\(\d{3}\)\d{3}-\d{2}-\d{2}$/", $phone)) {
        $errors[] = "Телефон: формат +1(111)111-11-11";
    }
    return $errors;
}

function validate_user(User $user): array
{
    $errors = validate_name_regex($user->name);
    $errors = array_merge($errors, validate_email_regex($user->email));
    $errors = array_merge($errors, validate_phone_regex($user->phone));

    if ($user->gender === "") {
        $errors[] = "Выберите пол";
    }

    return $errors;
}

function validate_password_match(string $pass1, string $pass2): array
{
    $errors = [];
    if ($pass1 !== $pass2) {
        $errors[] = "Пароли не совпадают";
    }
    return $errors;
}

function validate_password_strength(string $password): array
{
    $errors = [];
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errors[] = "Пароль: минимум 8 символов, заглавная, строчная буква и цифра";
    }
    return $errors;
}

function users_to_table_html(array $users): string
{
    if (empty($users)) {
        return "";
    }

    $html = "<table border='all' style='width:100%; border-collapse:collapse; margin-top:20px;'>";
    $html .= "<tr><th>Имя</th><th>Email</th><th>Телефон</th><th>Пол</th><th>Интересы</th></tr>";

    foreach ($users as $user) {
        $email = htmlspecialchars($user->email);
        $interests = htmlspecialchars(implode(", ", $user->interests));
        $genderLabel = $user->gender === "M" ? "Мужской" : ($user->gender === "F" ? "Женский" : $user->gender);

        $html .= "<tr>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($user->name) . "</td>";
        $html .= "<td style='text-align:center'><a href=\"mailto:$email\">$email</a></td>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($user->phone) . "</td>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($genderLabel) . "</td>";
        $html .= "<td style='text-align:center'>$interests</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}
