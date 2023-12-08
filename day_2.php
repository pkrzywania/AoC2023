<?php

$file = fopen("input","r") or die("cant open file");

if ($file) {

    $maxRedCubes = 12;
    $maxGreenCubes = 13;
    $maxBlueCubes = 14;

    $idsSum = 0;

    while (($fileLine = fgets($file)) !== false) {

        $canSum = true;
        $gameInfo = explode(':', $fileLine);
        $gameId = intval(explode(' ', $gameInfo[0])[1]);

        $cubesDraw = explode(';', $gameInfo[1]);

        $maxRed = 0;
        $maxGreen = 0;
        $maxBlue = 0;

        foreach ($cubesDraw as $draw) {
            $drawResults = explode(',', $draw);

            foreach ($drawResults as $result) {
                $result = trim($result);
                $number = explode (' ', $result)[0];
                $color = explode (' ', $result)[1];
                if ($color === 'red' && $number > $maxRed) {
                    $maxRed = $number;
                } elseif ($color === 'green' && $number > $maxGreen) {
                    $maxGreen = $number;
                } elseif ($color === 'blue' && $number > $maxBlue) {
                    $maxBlue = $number;
                }
            }
        }

        $idsSum += $maxRed * $maxBlue * $maxGreen;
    }

    echo "sum: " . $idsSum;
}

fclose ($file);