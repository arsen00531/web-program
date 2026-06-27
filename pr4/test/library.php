<?php

function helloFunctionEcho(): void
{
    echo "<h1>Hello, World!</h1>";
}

function helloFunctionReturn(): string
{
    return "<h1>Hello, World!</h1>";
}

function calculateAverage(float $p1, float $p2, float $p3): float
{
    return ($p1 + $p2 + $p3) / 3;
}

function formatAverageAsP(float $result): string
{
    return "<p>result = $result</p>";
}

function formatAverageAsH1(float $result): string
{
    return "<h1>result = $result</h1><br><br>";
}

function formatAverageAsTableShort(float $result): string
{
    return "<table style=\"width: 100%; border: 2px solid red; margin-bottom:20px;\">
<tr>
<td style=\"text-align:center\"> result = $result</td>
</tr>
</table>";
}

function formatAverageAsTableEcho(float $result): void
{
    echo "<table style='width: 100%; border: 2px solid blue'>
<tr>
<td style='text-align:center'> result = $result</td>
</tr>
</table>
";
}

function createArray($a, $b, $c): array
{
    return [$a, $b, $c];
}

function createTable(array $mainArray): string
{
    $tableString = "<table style='width: 100%; border: 1px solid green; margin-bottom:50px;' border=all>
<tr>";
    for ($index = 0; $index < count($mainArray); ++$index) {
        $tableString .= "<td style='text-align:center'> $mainArray[$index]</td>";
    }
    $tableString .= "</tr>
</table>
";
    return $tableString;
}

function createTable2(...$mainArray): string
{
    $tableString = "<table style='width: 100%; border: 1px solid green; margin-bottom:50px;' border=all>
<tr>";
    foreach ($mainArray as $data) {
        $tableString .= "<td style='text-align:center'> $data</td>";
    }
    $tableString .= "</tr>
</table>
";
    return $tableString;
}

function calculateTimeInterval(array $timeArr1temp, array $timeArr2temp): int
{
    $beginMinutes = (int)$timeArr1temp[0] * 60 + (int)$timeArr1temp[1];
    $endMinutes = (int)$timeArr2temp[0] * 60 + (int)$timeArr2temp[1];
    return $endMinutes - $beginMinutes;
}

function formatMinutesWord(int $countMinute): string
{
    $n = abs($countMinute);
    $mod10 = $n % 10;
    $mod100 = $n % 100;

    if ($mod100 >= 11 && $mod100 <= 19) {
        return "$n минут";
    }
    if ($mod10 === 1) {
        return "$n минута";
    }
    if ($mod10 >= 2 && $mod10 <= 4) {
        return "$n минуты";
    }
    return "$n минут";
}

function aboutI(): void
{
    $i = 100;
    echo "<h1> i = $i</h1>";
}
