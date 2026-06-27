<?php
require_once "db_config.php";

$pdo = connectPdo("myFirstDataBase", DB_ROOT_USER, DB_ROOT_PASS);
$query = "SELECT * FROM myFirstDataBase.myFirstTable";
$resultQuery = $pdo->query($query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>fetch ASSOC</title>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>
  <h1>fetch(PDO::FETCH_ASSOC)</h1>
  <?php while ($tempData = $resultQuery->fetch(PDO::FETCH_ASSOC)): ?>
    <pre><?php print_r($tempData); ?></pre>
  <?php endwhile; ?>
  <p><a href="select_demo.php">← fetch() default</a></p>
</body>
</html>
