<?php

require_once "connectDB.php";
require_once "dataModel.php";
require_once "dataShow.php";

try {
    $pdoAdmin = connectAdminPdo();
    $login = $_POST["adminLogin"] ?? "";
    $pass = $_POST["adminPass"] ?? "";

    if ($login !== "" && $pass !== "") {
        insertAdmin($pdoAdmin, $login, $pass);
    }

    $adminArray = getAdminArrayFromBD($pdoAdmin);
} catch (PDOException $e) {
    echo "База данных ошибка: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>addAdmin.php</title>
</head>
<body>
  <p><a href="admin_form.html">← К форме</a></p>
  <h1>addAdmin.php — adminBase</h1>

  <pre><?php print_r($adminArray ?? []); ?></pre>
  <?php if (!empty($adminArray)): ?>
    <?php createAdminTable($adminArray); ?>
  <?php endif; ?>
</body>
</html>
