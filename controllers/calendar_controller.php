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
$months = [
    1 => 'Javier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Août',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
];
if (isset($_GET['month'])) {
    $monthNumber = $_GET['month'];
} else {
    $monthNumber = date('n');
}
if (isset($_GET['year'])) {
    $year = $_GET['year'];
} else {
    $year = date('Y');
}
$monthLetters = $months[$monthNumber];
$totalDaysinMonth = cal_days_in_month(CAL_GREGORIAN, $monthNumber, $year);
$firstDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, 1, $year));
$lastDayinMonth = date('N', mktime(0, 0, 0, $monthNumber, $totalDaysinMonth, $year));
$lines = $totalDaysinMonth + (7 - $lastDayinMonth) + ($firstDayinMonth - 1);
$firstCaseTimestamp = strtotime(date("$year-$monthNumber-1") . '-' . ($firstDayinMonth - 1) . 'days');
/**
 * fonction permettant de créer les dates correspondantes aux jours fériés français
 * @param int $year ex. 1979
 * @return array structure 'mm-dd' => 'jour férié'
 */
function getSpecialDays($year)
{
    // On definie le jour de pâque selon l'année choisie : on se base sur le 21 Mars
    $base = new DateTime("$year-03-21");
    $days = easter_days($year);
    // on formate cette date en format (yyyy-mm-dd) pour faciliter la manipulation par la suite
    $easterDay = $base->add(new DateInterval("P{$days}D"))->format('Y-n-d');
    $specialDays = [
        // On définie les jours fériés fixe : les classiquess 8 jours 
        // format de la clé : Month - Day, la clé permettra d'obtenir le jour férié respectif
        strtotime("$year-1-1") => '1er janvier',
        strtotime("$year-5-1") => 'Fête du travail',
        strtotime("$year-5-8") => 'Victoire des allies',
        strtotime("$year-7-14") => 'Fete nationale',
        strtotime("$year-8-15") => 'A5ssomption',
        strtotime("$year-11-1") => 'Toussaint',
        strtotime("$year-11-11") => 'Armistice',

        strtotime("$year-12-25") => 'Noël',
        // Jour feries qui dependent du jour de pâque
        strtotime("$easterDay + 1 days") => 'Lundi de paques',
        strtotime("$easterDay+ 39 days")  => 'Ascension',
        strtotime("$easterDay + 50 days") => 'Pentecote',

        // annivs apprenant LHP8
        strtotime("2023-10-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-10-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-10-18") => '18 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-10-19") => '19 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-10-20") => '20 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-11-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-11-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-11-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-11-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-11-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-12-11") => '11 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-12-12") => '12 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-12-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-12-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2023-12-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-01-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-01-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-01-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-01-18") => '18 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-01-19") => '19 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-02-12") => '12 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-02-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-02-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-02-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-02-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-03-18") => '18 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-03-19") => '19 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-03-20") => '20 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-03-21") => '21 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-03-22") => '22 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-04-08") => '23 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-04-09") => '09 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-04-10") => '10 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-04-11") => '11 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-04-12") => '12 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-05-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-05-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-05-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-05-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-05-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-06-10") => '10 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-06-11") => '11 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-06-12") => '12 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-06-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-06-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-07-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-07-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-07-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-07-18") => '18 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-07-19") => '19 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-08-26") => '26 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-08-27") => '27 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-08-28") => '28 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-08-29") => '29 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-08-30") => '30 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-09-09") => '09 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-09-10") => '10 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-09-11") => '11 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-09-12") => '12 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-09-13") => '13 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-14") => '14 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-15") => '15 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-16") => '16 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-17") => '17 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-18") => '18 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-21") => '21 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-22") => '22 <i class="bi bi-backpack3-fill"></i>',
        strtotime("2024-10-23") => '23 <i class="bi bi-backpack3-fill"></i>'
    ];
    return $specialDays;
}
$arraySpecialDays = getSpecialDays($year);
function createCase($firstCaseTimestamp, $caseNumber, $month, $arraySpecialDays)
{
    $timestamp = strtotime(date('Y-m-d', $firstCaseTimestamp) . '+' . ($caseNumber - 1) . 'days');
    if (isset($arraySpecialDays[$timestamp])) {
        return '<div class="feries text-center bg-danger border border-dark">' . $arraySpecialDays[$timestamp] . '</div>';
    } elseif (date('Y-m-d', $timestamp) == date('Y-m-d')) {
        return '<div class="text-center border border-dark bg-info">' . date('j', $timestamp) . '</div>';
    } elseif (date('n', $timestamp) == $month) {
        return '<div class="text-center border border-dark bg-white">' . date('j', $timestamp) . '</div>';
    } else {
        return '<div class="text-center border border-dark bg-secondary">' . date('j', $timestamp) . '</div>';
    }
}