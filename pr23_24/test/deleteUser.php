<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";
require_once "adminModel.php";

requireAdmin();

if ($pdo) {
    $userIdDeleteData = (int)($_REQUEST["userId"] ?? 0);

    try {
        $affectedRowsNumber = deleteUserById($pdo, $userIdDeleteData);
        echo "Из таблицы удалена $affectedRowsNumber строка";
    } catch (PDOException $e) {
        echo "База данных ошибка: " . $e->getMessage();
    }

    $resultArray = getDataToArrayFromBD($pdo);
    createDeleteTable($resultArray);
}
