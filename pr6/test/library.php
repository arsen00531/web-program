<?php

function createTable4(array $mainArray): string
{
    $tableString = "<table style='width: 100%; border: 1px solid green; margin-bottom:50px;' border=all>";
    $tableString .= "<tr>";
    foreach ($mainArray as $v) {
        $tableString .= "<td style='text-align:center'> $v</td>";
    }
    $tableString .= "</tr>";
    $tableString .= "</table>";
    return $tableString;
}

function createTable5(array $mainArray): string
{
    $tableString = "<table style='width: 100%; border: 1px solid blue; margin-bottom:50px;' border=all>";
    foreach ($mainArray as $v1) {
        $tableString .= "<tr>";
        foreach ($v1 as $v2) {
            $tableString .= "<td style='text-align:center'> $v2</td>";
        }
        $tableString .= "</tr>";
    }
    $tableString .= "</table>";
    return $tableString;
}

function createObjectTablePublic(array $users): string
{
    $html = "<table style='width: 100%; border: 1px solid green; margin-bottom:50px;' border=all>";
    $html .= "<tr><td>id</td><td>name</td><td>surname</td></tr>";
    foreach ($users as $user) {
        $html .= "<tr>";
        $html .= "<td style='text-align:center'>{$user->id}</td>";
        $html .= "<td style='text-align:center'>{$user->name}</td>";
        $html .= "<td style='text-align:center'>{$user->surname}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}

function createObjectTablePrivate(array $users): string
{
    $html = "<table style='width: 100%; border: 1px solid blue; margin-bottom:50px;' border=all>";
    $html .= "<tr><td>id</td><td>name</td><td>surname</td></tr>";
    foreach ($users as $user) {
        $html .= "<tr>";
        $html .= "<td style='text-align:center'>{$user->getId()}</td>";
        $html .= "<td style='text-align:center'>{$user->getName()}</td>";
        $html .= "<td style='text-align:center'>{$user->getSurname()}</td>";
        $html .= "</tr>";
    }
    $html .= "</table>";
    return $html;
}
