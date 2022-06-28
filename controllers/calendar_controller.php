<?php
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
$monthNumber = date('n');
$monthLetters = date('F');
$totalDaysinMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
$firstDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, 1, $year));
$lastDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, $totalDaysinMonth, $year));
$lines = $totalDaysinMonth + (7 - $lastDayinMonth) + ($firstDayinMonth - 1);
$firstCaseTimestamp = strtotime(date("$year-$monthNumber-1"). '-' .($firstDayinMonth - 1). 'days');
function createCase($firstCaseTimestamp, $caseNumber, $month){
    $timestamp = strtotime(date('Y-m-d', $firstCaseTimestamp) . '+' . ($caseNumber-1) .'days');  
    if(date('Y-m-d', $timestamp) == date('Y-m-d')){
        return '<div class="text-center border border-dark bg-info">' . date('j',$timestamp) .'</div>';
    }elseif (date('n',$timestamp) == $month) {
    return '<div class="text-center border border-dark">' . date('j',$timestamp) .'</div>';
    }else {
        return '<div class="text-center border border-dark bg-secondary">' . date('j',$timestamp) .'</div>';
    }
}