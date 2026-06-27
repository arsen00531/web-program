<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";
require_once "adminModel.php";

requireAdmin();

if ($pdo) {
    echo "add data to BD";
    $userIdEditData = (int)($_REQUEST["userId"] ?? 0);
    $resultArray = [];

    try {
        $row = getUserById($pdo, $userIdEditData);
        if ($row !== null) {
            $resultArray[] = $row;
        }
    } catch (PDOException $e) {
        echo "База данных ошибка: " . $e->getMessage();
    }

    if (!empty($resultArray)) {
        $a = htmlspecialchars($resultArray[0]["userName"]);
        $b = (int)$resultArray[0]["userAge"];
        $c = (int)$resultArray[0]["id"];
        print("<form action='updateData.php'>
<input type='text' name='userName' value='$a'>
<input type='number' name='userAge' value='$b'>
<input type='hidden' name='userId' value='$c'>
<button type='submit'>Save data!!!</button>
</form>");
    } else {
        echo "<p>Запись не найдена.</p>";
    }
}
