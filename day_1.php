<?php

$file = fopen("input","r") or die("cant open file");

if ($file) {    

    while (($fileLine = fgets($file)) !== false) {
        $lineValue = intval($fileLine);
        if ($lineValue > 0) {
            $elfs[$elfNumber] += $lineValue;
        } else {
            $elfNumber += 1;
            $elfs[$elfNumber] = 0;
        }
    }

}

fclose($file);