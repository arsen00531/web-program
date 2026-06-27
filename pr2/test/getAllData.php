<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>getAllData.php</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 800px; margin: 40px auto; padding: 0 20px; }
    h2 { margin-top: 32px; border-bottom: 1px solid #ccc; padding-bottom: 4px; }
  </style>
</head>
<body>
  <h1>Обработчик getAllData.php</h1>
  <p><a href="form.html">← Вернуться к форме</a></p>

<?php
// --- 1. Получение данных от формы (метод GET) ---
$p1 = $_GET["param1"] ?? null;
$param1 = $_GET["param1"] ?? null;
$param2 = $_GET["param2"] ?? null;
$param3 = $_GET["param3"] ?? null;
$param4 = (int)date("G");

echo "<h2>1. Полученные данные</h2>";
echo "param1 = " . htmlspecialchars((string)$param1) . "<br>";
echo "param2 = " . htmlspecialchars((string)$param2) . "<br>";
echo "param3 = " . htmlspecialchars((string)$param3) . "<br>";
echo "param4 (текущий час для switch/match) = " . $param4 . "<br><br>";

// --- 2. isset ---
echo "<h2>2. Проверка isset</h2>";
if (isset($p1)) {
    echo "p1 set<br><br>";
} else {
    echo "p1 not set<br><br>";
}

// --- 3. empty ---
echo "<h2>3. Проверка empty</h2>";
if (empty($param1)) {
    echo "param1 empty<br><br>";
} else {
    echo "param1 not empty<br><br>";
}

if (empty($param2)) {
    echo "param2 empty<br><br>";
} else {
    echo "param2 not empty<br><br>";
}

if (empty($param3)) {
    echo "param3 empty<br><br>";
} else {
    echo "param3 not empty<br><br>";
}

// --- 4. gettype (до преобразования — все string) ---
echo "<h2>4. gettype до преобразования</h2>";
echo "тип param1 — " . gettype($param1) . "<br><br>";
echo "тип param2 — " . gettype($param2) . "<br><br>";
echo "тип param3 — " . gettype($param3) . "<br><br>";

// --- 5. is_int, is_double, is_numeric, is_string ---
echo "<h2>5. Проверка типов (is_int, is_double, is_numeric, is_string)</h2>";

function checkTypes(string $name, $value): void {
    if (is_int($value)) {
        echo "$name is integer<br><br>";
    } else {
        echo "$name is not integer<br><br>";
    }

    if (is_double($value)) {
        echo "$name is double<br><br>";
    } else {
        echo "$name is not double<br><br>";
    }

    if (is_numeric($value)) {
        echo "$name is numeric<br><br>";
    } else {
        echo "$name is not numeric<br><br>";
    }

    if (is_string($value)) {
        echo "$name is string<br><br>";
    } else {
        echo "$name is not string<br><br>";
    }
}

checkTypes("param1", $param1);
checkTypes("param2", $param2);
checkTypes("param3", $param3);

// --- 6. Явное преобразование типов ---
echo "<h2>6. Явное преобразование типов</h2>";
$param1 = (int)$param1;
$param2 = doubleval($param2);

echo "после (int): param1 = $param1, тип — " . gettype($param1) . "<br><br>";
echo "после doubleval(): param2 = $param2, тип — " . gettype($param2) . "<br><br>";

// --- 7. Константы ---
echo "<h2>7. Константы</h2>";
echo "Number pi = " . M_PI . "<br><br>";
echo "Version PHP = " . PHP_VERSION . "<br><br>";

define("HELLO_VALUE", "<b>Hello, world!</b>");
echo HELLO_VALUE . "<br><br>";

if (defined("HELLO_VALUE")) {
    echo "defined HELLO_VALUE<br><br>";
} else {
    echo "not defined HELLO_VALUE<br><br>";
}

// --- 8. Операторы: инкремент / декремент ---
echo "<h2>8. Инкремент и декремент</h2>";
$param1 = 0;
$test_param1 = $param1++;
$test_param2 = ++$param1;
echo "\$test_param1 = $test_param1<br>";
echo "\$test_param2 = $test_param2<br><br>";

// --- 9. Сравнение вещественных чисел ---
echo "<h2>9. Сравнение вещественных чисел</h2>";
define("DOUBLE_EPSILON", 0.00000000001);
$fst = 4 / 3 - 1;
$snd = 1 / 3;
if (abs($fst - $snd) < DOUBLE_EPSILON) {
    echo "Числа равны<br><br>";
} else {
    echo "Числа не равны<br><br>";
}

// --- 10. Строгое сравнение === и !== ---
echo "<h2>10. Строгое сравнение</h2>";
$a = 100;
$b = "100";
echo "100 == \"100\": " . ($a == $b ? "true" : "false") . "<br>";
echo "100 === \"100\": " . ($a === $b ? "true" : "false") . "<br><br>";

// --- 11. Тернарный оператор и ?? ---
echo "<h2>11. Тернарный оператор и ??</h2>";
$greeting = ($param4 < 12) ? "Доброе утро" : "Добрый день";
echo "Тернарный: $greeting<br>";
$optional = $_GET["missing"] ?? "значение по умолчанию";
echo "?? : $optional<br><br>";

// --- 12. switch ---
echo "<h2>12. switch</h2>";
switch ($param4) {
    case 10:
        echo "Доброе утро!<br><br>";
        break;
    case 14:
        echo "Добрый день!<br><br>";
        break;
    case 18:
        echo "Добрый вечер!<br><br>";
        break;
    default:
        echo "Привет!<br><br>";
}

// --- 13. switch(true) с диапазонами ---
echo "<h2>13. switch(true) с диапазонами</h2>";
switch (true) {
    case (($param4 > 6) && ($param4 < 13)):
        echo "Доброе утро!<br><br>";
        break;
    case (($param4 > 13) && ($param4 < 17)):
        echo "Добрый день!<br><br>";
        break;
    case (($param4 > 17) && ($param4 < 23)):
        echo "Добрый вечер!<br><br>";
        break;
    default:
        echo "Привет!<br><br>";
}

// --- 14. match ---
echo "<h2>14. match</h2>";
echo match (true) {
    ($param4 > 6) && ($param4 < 13) => "Доброе утро!",
    ($param4 > 13) && ($param4 < 17) => "Добрый день!",
    ($param4 > 17) && ($param4 < 23) => "Добрый вечер!",
};
?>
</body>
</html>
