<?php

require_once "Contact.php";

function createContactsTable(array $contacts): string
{
    $html = "<table style='width: 100%; border: 1px solid green; margin-bottom:20px;' border=all>";
    $html .= "<tr><td>Имя</td><td>Email</td><td>Телефон</td></tr>";
    foreach ($contacts as $contact) {
        $html .= "<tr>";
        $html .= "<td style='text-align:center'>{$contact->name}</td>";
        $html .= "<td style='text-align:center'>{$contact->email}</td>";
        $html .= "<td style='text-align:center'>{$contact->phone}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}

function getSumByValue($var)
{
    $var = $var + 5;
    return $var;
}

function getSumByReference(&$var)
{
    $var = $var + 5;
    return $var;
}

function searchInContacts(array $contacts, string $searchName): bool
{
    foreach ($contacts as $contact) {
        if ($contact->name === $searchName) {
            return true;
        }
    }
    return false;
}

function sortContactsByName(array $contacts): array
{
    $result = $contacts;
    $count = count($result);
    for ($i = 0; $i < $count - 1; ++$i) {
        for ($j = $i + 1; $j < $count; ++$j) {
            if (strcmp($result[$i]->name, $result[$j]->name) > 0) {
                $temp = $result[$i];
                $result[$i] = $result[$j];
                $result[$j] = $temp;
            }
        }
    }
    return $result;
}

function createContactsFromData(): array
{
    $contacts = [];

    $c1 = new Contact();
    $c1->name = "Sergey";
    $c1->email = "sergey-246@yandex.ru";
    $c1->phone = "111-111";

    $c2 = new Contact();
    $c2->name = "Olga";
    $c2->email = "olga@mail.ru";
    $c2->phone = "222-222";

    $c3 = new Contact();
    $c3->name = "Anna";
    $c3->email = "anna@mail.ru";
    $c3->phone = "333-333";

    $contacts[] = $c1;
    $contacts[] = $c2;
    $contacts[] = $c3;

    return $contacts;
}
