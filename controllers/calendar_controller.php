<?php
// setlocale(LC_ALL, "fr_FR", "French");
// $days = [
//     1 => 'Monday',
//     2 => 'Tuesday',
//     3 => 'Wednesday',
//     4 => 'Thursday',
//     5 => 'Friday',
//     6 => 'Saturday',
//     7 => 'Sunday'
// ];
$day = 1;
$days = [
    1 => 'Lundi',
    2 => 'Mardi',
    3 => 'Mercredi',
    4 => 'Jeudi',
    5 => 'Vendredi',
    6 => 'Samedi',
    7 => 'Dimanche'
];

$year = date('Y');
$monthNumber = date ('n');
$monthLetters = date ('F');
$totalDaysinMonth = cal_days_in_month(CAL_GREGORIAN,$monthNumber,$year);
$firstDayinMonth = date('N', mktime(0,0,0,$monthNumber,1,$year));
$lastDayinMonth = date('N', mktime(0,0,0,$monthNumber,$totalDaysinMonth,$year));
$lines = $totalDaysinMonth + (7-$lastDayinMonth) + ($firstDayinMonth -1);
