<?php
include "header_template.php";

$n = isset($_GET["n"]) ? (int)$_GET["n"] : 10;
$value1 = isset($_GET["value1"]) ? (int)$_GET["value1"] : 10;
$value2 = isset($_GET["value2"]) ? (int)$_GET["value2"] : 20;

echo "<p><a href=\"form.html\">← К форме</a></p>";

// --- 1. Степени двойки до n (while) ---
echo "<h2>1. Степени двойки — while</h2>";
$i = 1;
$p = 2;
while ($i <= $n) {
    echo $p . " ";
    $p = $p * 2;
    ++$i;
}
echo "<br><br>";

// --- 1. Степени двойки (do … while) ---
echo "<h2>1. Степени двойки — do … while</h2>";
$i = 1;
$p = 2;
do {
    echo $p . " ";
    $p = $p * 2;
    ++$i;
} while ($i <= $n);
echo "<br><br>";

// --- 1. Степени двойки (for) ---
echo "<h2>1. Степени двойки — for</h2>";
$p = 2;
for ($i = 1; $i <= $n; ++$i) {
    echo $p . " ";
    $p = $p * 2;
}
echo "<br><br>";

// --- 2. Чётные числа от value1 до value2 (while + continue) ---
echo "<h2>2. Чётные числа — while</h2>";
$begin = $value1;
while ($begin <= $value2) {
    if ($begin % 2 != 0) {
        ++$begin;
        continue;
    }
    echo $begin . " ";
    ++$begin;
}
echo "<br><br>";

// --- 2. Чётные числа (do … while) ---
echo "<h2>2. Чётные числа — do … while</h2>";
$begin = $value1;
if ($begin <= $value2) {
    do {
        if ($begin % 2 != 0) {
            ++$begin;
            continue;
        }
        echo $begin . " ";
        ++$begin;
    } while ($begin <= $value2);
}
echo "<br><br>";

// --- 2. Чётные числа (for) ---
echo "<h2>2. Чётные числа — for</h2>";
for ($begin = $value1; $begin <= $value2; ++$begin) {
    if ($begin % 2 != 0) {
        continue;
    }
    echo $begin . " ";
}
echo "<br><br>";

// --- 3. Сумма массива до первого отрицательного ---
echo "<h2>3. Сумма до первого отрицательного</h2>";
$myNumberArray = [1, 2, 3, 4, 5, -1, 1, 2, 3, 4, 5];
$summaArray = 0;
foreach ($myNumberArray as $data) {
    echo $data . "<br><br>";
    if ($data < 0) {
        break;
    }
    $summaArray += $data;
}
echo "summaArray = $summaArray<br><br>";

// --- 4. Элементы массива с ключами ---
echo "<h2>4. Массив с ключами</h2>";
foreach ($myNumberArray as $key => $data) {
    echo "$key --- $data<br><br>";
}

include "footer_template.php";
