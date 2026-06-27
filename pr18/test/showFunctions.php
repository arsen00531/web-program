<?php

function usersToTable(array $users, bool $withAdminActions = false): string
{
    if (empty($users)) {
        return "<p>Нет записей.</p>";
    }

    $html = "<table border='all' style='width:100%; border-collapse:collapse; margin-top:16px;'>";
    $html .= "<tr><th>ID</th><th>Имя</th><th>Возраст</th><th>Телефон</th><th>Email</th>";

    if ($withAdminActions) {
        $html .= "<th>Редактировать</th><th>Удалить</th>";
    }

    $html .= "</tr>";

    foreach ($users as $user) {
        $id = (int)$user["id"];
        $html .= "<tr>";
        $html .= "<td>$id</td>";
        $html .= "<td>" . htmlspecialchars($user["name"]) . "</td>";
        $html .= "<td>" . (int)$user["age"] . "</td>";
        $html .= "<td>" . htmlspecialchars($user["phone"]) . "</td>";
        $html .= "<td>" . htmlspecialchars($user["email"]) . "</td>";

        if ($withAdminActions) {
            $html .= "<td><a href=\"editRecord2025.php?editId=$id\">Редактировать</a></td>";
            $html .= "<td><a href=\"deleteRecord2025.php?deleteId=$id\">Удалить</a></td>";
        }

        $html .= "</tr>";
    }

    $html .= "</table>";
    return $html;
}

function showEditUserForm(array $user): string
{
    $id = (int)$user["id"];
    $name = htmlspecialchars($user["name"]);
    $age = (int)$user["age"];
    $phone = htmlspecialchars($user["phone"]);
    $email = htmlspecialchars($user["email"]);

    return "
    <form method=\"POST\" action=\"editRecord2025.php\">
      <input type=\"hidden\" name=\"editId\" value=\"$id\">
      <label>Имя <input type=\"text\" name=\"name\" value=\"$name\" required></label><br><br>
      <label>Возраст <input type=\"number\" name=\"age\" value=\"$age\" min=\"1\" max=\"120\" required></label><br><br>
      <label>Телефон <input type=\"text\" name=\"phone\" value=\"$phone\" required></label><br><br>
      <label>Email <input type=\"email\" name=\"email\" value=\"$email\" required></label><br><br>
      <button type=\"submit\">Сохранить</button>
    </form>";
}
