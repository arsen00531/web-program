<?php
require_once "library.php";

$contacts = createContactsFromData();
$sortedContacts = sortContactsByName($contacts);

$ship = [
    "ship1" => ["Москва", "Красная площадь", "1"],
    "ship2" => ["Санкт-Петербург", "Невский", "10"],
];

$arr = ["а", "b", "с", "d", "е"];
$arrSlice1 = array_slice($arr, 2);
$arrSlice2 = array_slice($arr, 0, 3);

$colors = ["красный", "зеленый", "синий", "желтый"];
$colorsCopy = $colors;
$spliceOut = array_splice($colorsCopy, 2);

$fst = ["a" => 1, "b" => 2];
$snd = ["b" => 3, "c" => 4];
$mergePlus = $fst + $snd;
$mergeFunc = array_merge($fst, $snd);

$arr1 = ["a" => 1, "b" => 2];
$arr2 = ["a" => 1, "b" => 2];
$arr3 = ["a" => 1, "b" => "2"];

$diff = array_diff(["a", "b", "c"], ["b", "c", "d"]);
$intersect = array_intersect(["a", "b", "c"], ["b", "c", "d"]);

$userNameArray = ["Sergey", "Olga", "Anna"];

$searchArray = [0 => "blue", 1 => "red", 2 => "green", 3 => "red"];
$searchKey = array_search("green", $searchArray);

$sortArr = [3, 1, 4, 2];
$sortAsc = $sortArr;
sort($sortAsc);
$sortDesc = $sortArr;
rsort($sortDesc);

$assocArr = ["id" => 10, "name" => "Ivan", "city" => "Moscow"];
$asortArr = $assocArr;
asort($asortArr);
$ksortArr = $assocArr;
ksort($ksortArr);

$pushArr = ["one", "two"];
array_push($pushArr, "three", "four");
$popArr = $pushArr;
$popped = array_pop($popArr);

$randContact = $contacts[array_rand($contacts)];
$shuffleArr = ["Sergey", "Olga", "Anna"];
shuffle($shuffleArr);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Практика 7</title>
  <style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
    h2 { border-bottom: 1px solid #ccc; margin-top: 32px; }
    pre { background: #f5f5f5; padding: 12px; }
  </style>
</head>
<body>
  <p><a href="index.html">← Назад</a></p>

  <h2>1. Массив объектов (имя, email, телефон)</h2>
  <?= createContactsTable($contacts) ?>

  <h2>foreach с list / []</h2>
  <?php foreach ($ship as $key => [$fstVal, $sndVal, $thdVal]): ?>
    <b><?= $key ?></b><br>
    <li><?= $fstVal ?></li>
    <li><?= $sndVal ?></li>
    <li><?= $thdVal ?></li>
    <br>
  <?php endforeach; ?>

  <h2>Передача по значению и по ссылке</h2>
  <?php
  $new_var = 20;
  echo getSumByValue($new_var);
  echo "<br>$new_var<br>";
  $new_var2 = 20;
  echo getSumByReference($new_var2);
  echo "<br>$new_var2<br>";
  ?>

  <h2>2. array_slice — $arr не изменяется</h2>
  <pre>до: <?= print_r($arr, true) ?></pre>
  <pre>slice(2): <?= print_r($arrSlice1, true) ?></pre>
  <pre>slice(0,3): <?= print_r($arrSlice2, true) ?></pre>

  <h2>array_splice — массив изменяется</h2>
  <pre>удалено: <?= print_r($spliceOut, true) ?></pre>
  <pre>после splice: <?= print_r($colorsCopy, true) ?></pre>

  <h2>3–4. Слияние: + и array_merge</h2>
  <pre>+: <?= print_r($mergePlus, true) ?></pre>
  <pre>array_merge: <?= print_r($mergeFunc, true) ?></pre>

  <h2>5. Сравнение == и ===</h2>
  <p>arr1 == arr2: <?= $arr1 == $arr2 ? "true" : "false" ?></p>
  <p>arr1 === arr2: <?= $arr1 === $arr2 ? "true" : "false" ?></p>
  <p>arr1 == arr3: <?= $arr1 == $arr3 ? "true" : "false" ?></p>
  <p>arr1 === arr3: <?= $arr1 === $arr3 ? "true" : "false" ?></p>

  <h2>6–7. array_diff и array_intersect</h2>
  <pre>diff: <?= print_r($diff, true) ?></pre>
  <pre>intersect: <?= print_r($intersect, true) ?></pre>

  <h2>8. in_array и поиск в массиве объектов</h2>
  <?php
  if (in_array("Sergey", $userNameArray)) {
      echo "yes<br>";
  } else {
      echo "no<br>";
  }
  echo searchInContacts($contacts, "Sergey") ? "Sergey найден в contacts<br>" : "no<br>";
  echo searchInContacts($contacts, "Ivan") ? "Ivan найден<br>" : "Ivan не найден<br>";
  ?>

  <h2>9. count</h2>
  <p>count(contacts) = <?= count($contacts) ?></p>

  <h2>10. array_search</h2>
  <p>ключ green: <?= $searchKey ?></p>

  <h2>11. array_rand</h2>
  <pre><?php print_r($randContact); ?></pre>

  <h2>12. shuffle</h2>
  <pre><?php print_r($shuffleArr); ?></pre>

  <h2>13. Сортировка</h2>
  <pre>sort: <?= print_r($sortAsc, true) ?></pre>
  <pre>rsort: <?= print_r($sortDesc, true) ?></pre>
  <pre>asort: <?= print_r($asortArr, true) ?></pre>
  <pre>ksort: <?= print_r($ksortArr, true) ?></pre>

  <h2>Собственная сортировка по имени</h2>
  <?= createContactsTable($sortedContacts) ?>

  <h2>14. array_push и array_pop</h2>
  <pre>после push: <?= print_r($pushArr, true) ?></pre>
  <pre>pop = <?= $popped ?></pre>
  <pre>после pop: <?= print_r($popArr, true) ?></pre>
</body>
</html>
