<?php

function createRandomArray(int $size): array
{
    $tempArray = [];
    for ($index = 0; $index < $size; ++$index) {
        $tempArray[] = random_int(0, 10);
    }
    return $tempArray;
}

function printArray(array $tempArray): void
{
    echo "<pre>";
    print_r($tempArray);
    echo "</pre>";
}

function getTimeOfDayGreeting(): string
{
    $hour = (int)date("G");

    if ($hour >= 5 && $hour < 12) {
        return "Доброе утро";
    }
    if ($hour >= 12 && $hour < 18) {
        return "Добрый день";
    }
    if ($hour >= 18 && $hour < 23) {
        return "Добрый вечер";
    }
    return "Доброй ночи";
}

function getTodayGreetingString(): string
{
    $months = [
        1 => "января", 2 => "февраля", 3 => "марта", 4 => "апреля",
        5 => "мая", 6 => "июня", 7 => "июля", 8 => "августа",
        9 => "сентября", 10 => "октября", 11 => "ноября", 12 => "декабря",
    ];
    $weekdays = [
        1 => "понедельник", 2 => "вторник", 3 => "среда", 4 => "четверг",
        5 => "пятница", 6 => "суббота", 7 => "воскресенье",
    ];

    $greeting = getTimeOfDayGreeting();
    $day = (int)date("j");
    $month = $months[(int)date("n")];
    $year = date("Y");
    $weekday = $weekdays[(int)date("N")];

    return "$greeting! Сегодня $day $month $year года, $weekday";
}

function getDateTimeInterval(string $timeBegin, string $timeEnd): DateInterval
{
    $date1 = new DateTime($timeBegin);
    $date2 = new DateTime($timeEnd);
    return $date1->diff($date2);
}
