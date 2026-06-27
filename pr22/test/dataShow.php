<?php

function createTable(array $userArray): void
{
    echo "<table style='width:100%; border-collapse:collapse;'>";
    echo "<thead><tr>";
    echo "<th>User Id</th>";
    echo "<th>User Name</th>";
    echo "<th>User Age</th>";
    echo "</tr></thead><tbody>";

    foreach ($userArray as $item) {
        echo "<tr>";
        foreach ($item as $value) {
            echo "<td style='border: 1px solid gray; text-align:center;'>";
            echo htmlspecialchars((string)$value);
            echo "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
}

function createAdminTable(array $adminArray): void
{
    echo "<table style='width:100%; border-collapse:collapse; margin-top:20px;'>";
    echo "<thead><tr><th>Id</th><th>Login</th></tr></thead><tbody>";

    foreach ($adminArray as $item) {
        echo "<tr>";
        echo "<td style='border:1px solid gray;text-align:center'>" . (int)$item->id . "</td>";
        echo "<td style='border:1px solid gray;text-align:center'>" . htmlspecialchars($item->login) . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
}
