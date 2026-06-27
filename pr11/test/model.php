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
    return $errors;
}

function linkify_emails(string $text): string
{
    return preg_replace(
        '/[-\w.]+@[-\w]+(\.[-\w]+)/xs',
        '<a href="mailto:$0">$0</a>',
        $text
    );
}

function emails_to_table_html(array $users): string
{
    if (empty($users)) {
        return "";
    }

    $html = "<table border='all' style='width:100%; border-collapse:collapse; margin-top:20px;'>";
    $html .= "<tr><th>Имя</th><th>Email</th><th>Телефон</th></tr>";

    foreach ($users as $user) {
        $email = htmlspecialchars($user->email);
        $html .= "<tr>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($user->name) . "</td>";
        $html .= "<td style='text-align:center'><a href=\"mailto:$email\">$email</a></td>";
        $html .= "<td style='text-align:center'>" . htmlspecialchars($user->phone) . "</td>";
        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}
