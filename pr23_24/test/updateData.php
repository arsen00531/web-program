<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";
require_once "adminModel.php";

requireAdmin();

if ($pdo) {
    echo "update data in BD";
    $nameUserData = $_REQUEST["userName"] ?? "";
    $ageUserData = (int)($_REQUEST["userAge"] ?? 0);
    $idUserData = (int)($_REQUEST["userId"] ?? 0);

    try {
        $affectedRowsNumber = updateUser($pdo, $idUserData, $nameUserData, $ageUserData);
        echo "В таблице user_data изменена $affectedRowsNumber строка";
    } catch (PDOException $e) {
        echo "База данных ошибка: " . $e->getMessage();
    }

    $resultArray = getDataToArrayFromBD($pdo);
    createDeleteEditTable($resultArray);
}
