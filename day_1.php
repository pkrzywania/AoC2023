<?php

$file = fopen("input","r") or die("cant open file");



if ($file) {    


    $values = [];

    while (($fileLine = fgets($file)) !== false) {
        
        // $localValue = '';
        $firstNumber = '';
        $lastNumber = '';
        
        foreach (str_split($fileLine) as $char => $value) {
            // echo $value;
            if (is_numeric($value)) {
                if ($firstNumber === '') {
                    $firstNumber = $value;
                    $lastNumber = $value;
                } else {
                    $lastNumber = $value;
                }
                
            }
        }

        $values[] = $firstNumber . $lastNumber;
        
    }


    $sum = 0;

    foreach ($values as $value) {
        $sum += intval($value);
    }

    echo "Sum: " . $sum;

}

fclose($file);