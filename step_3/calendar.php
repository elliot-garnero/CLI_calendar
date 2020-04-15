<?php

$open = fgets(STDIN);

while(isset($open)){
    $input = readline("Choisissez une date : ");
    if(strlen($input) <= 4){
        $year = $input;
        for($i=1; $i<=12; $i++){
            calendar($i, $year);
        }
    } else if (strpos($input, ' ') !== false){
        $year = substr($input, 4);
        $month = substr($input, 0, 2);
        calendar($month, $year);
    } else if (strpos($input, '-') !== false) {
        $month = substr($input, 5);
        $year = substr($input, 0, 4);
        calendar($month, $year);
    } else {
    }
}

function calendar ($month, $year) {
    
    $daysArray = array();
    for($d = 1; $d <= 31; $d++){
        $time = mktime(12, 0, 0, $month, $d, $year);
        if (date('m', $time) == $month) {
            $daysArray[]=date('l d m Y', $time);
            $lastDay = date('d', $time);
        }
    }

    $monthResult = getCurrDate($month);
    $day = mktime(12, 0, 0, $month, 1, $year);
    $day = date('l', $day);
    $dayResult = getDays($day, $lastDay);

    echo "=====================================".PHP_EOL;
    echo "||          ".$monthResult." ".$year."           ||".PHP_EOL;
    echo "=====================================".PHP_EOL;
    echo "| Lu | Ma | Me | Je | Ve | Sa | Di |".PHP_EOL;
    echo "-------------------------------------".PHP_EOL;
    for($i=0; $i<7; $i++){echo $dayResult[$i];}
    echo '|' . PHP_EOL;
    echo "-------------------------------------".PHP_EOL;
    for($i=7; $i<14; $i++){echo $dayResult[$i];}
    echo '|' . PHP_EOL;
    echo "-------------------------------------".PHP_EOL;
    for($i=14; $i<21; $i++){echo $dayResult[$i];}
    echo '|' . PHP_EOL;
    echo "-------------------------------------".PHP_EOL;
    for($i=21; $i<28; $i++){echo $dayResult[$i];}
    echo '|' . PHP_EOL;
    echo "-------------------------------------".PHP_EOL;
    for($i=28; $i<35; $i++){echo $dayResult[$i];}
    echo '|' . PHP_EOL . "-------------------------------------".PHP_EOL;
}

function getCurrDate ($month) {
    $monthResult = "";
    switch($month) {
        case "01":
            $monthResult = "Janvier";
        break;
        case "02":
            $monthResult = "Février";
        break;
        case "03":
            $monthResult = "Mars";
        break;
        case "04":
            $monthResult = "Avril";
        break;
        case "05":
            $monthResult = "Mai";
        break;
        case "06":
            $monthResult = "Juin";
        break;
        case "07":
            $monthResult = "Juillet";
        break;
        case "08":
            $monthResult = "Aout";
        break;
        case "09":
            $monthResult = "Septembre";
        break;
        case "10":
            $monthResult = "Octobre";
        break;
        case "11":
            $monthResult = "Novembre";
        break;
        case "12":
            $monthResult = "Décembre";
        break;
    }
    return $monthResult;
}

function getDays ($day, $lastDay) {

    $dayResult = array();
    $noDay = $lastDay;
    for($i=1; $i <= $lastDay; $i++){
        $dayResult[] = '|  ' . $i . ' ';
    }

    switch($day) {
        case "Tuesday":
            array_unshift($dayResult, '|    ');
            $noDay = $noDay + 1;
        break;
        case "Wednesday":
            for($i=1; $i<=2; $i++){array_unshift($dayResult, '|    ');}
            $noDay = $noDay + 2;
        break;
        case "Thursday":
            for($i=1; $i<=3; $i++){array_unshift($dayResult, '|    ');}
            $noDay = $noDay + 3;
        break;
        case "Friday":
            for($i=1; $i<=4; $i++){array_unshift($dayResult, '|    ');}
            $noDay = $noDay + 4;
        break;
        case "Saturday":
            for($i=1; $i<=5; $i++){array_unshift($dayResult, '|    ');}
            $noDay = $noDay + 5;
        break;
        case "Sunday":
            for($i=1; $i<=6; $i++){array_unshift($dayResult, '|    ');}
            $noDay = $noDay + 6;
        break;
    }

    while($noDay <= 35){
        $dayResult[$noDay] = '|    ';
        $noDay++;
    }
    return $dayResult;
}