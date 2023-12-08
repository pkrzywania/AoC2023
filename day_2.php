<?php

$file = fopen("input","r") or die("cant open file");

if ($file) {

    $maxRedCubes = 12;
    $maxGreenCubes = 13;
    $maxBlueCubes = 14;

    $idsSum = 0;

    while (($fileLine = fgets($file)) !== false) {

        //echo $fileLine;
        $canSum = true;
        $gameInfo = explode(':', $fileLine);
        $gameId = intval(explode(' ', $gameInfo[0])[1]);

        //echo 'Gra id: ' . $gameId . "\n";

        $cubesDraw = explode(';', $gameInfo[1]);

        //echo "gra " . $gameId . "losowania: \n"; 
        foreach ($cubesDraw as $draw) {
            $drawResults = explode(',', $draw);

            foreach ($drawResults as $result) {
                $result = trim($result);
                $number = explode (' ', $result)[0];
                $color = explode (' ', $result)[1];
                //echo "kolor: " . $color . ", wartosc: " . $number . "\n";
                if (($color === 'red' && $number > $maxRedCubes) ||
                    ($color === 'green' && $number > $maxGreenCubes) ||
                    ($color === 'blue' && $number > $maxBlueCubes)) {
                    $canSum = false;
                }
            }
        }

        if ($canSum) {
            $idsSum += $gameId;
        } else {
            echo $fileLine;
        }
    }

    echo "sum: " . $idsSum;

}

fclose ($file);