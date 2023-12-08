<?php


$file = fopen("input","r") or die("cant open file");

if ($file) {    

    $values = [];

    $needle = ['0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
    'one' => 1, 'two' => 2, 'three' => 3, 'four' => 4, 'five' => 5, 'six' => 6, 'seven' => 7, 'eight' => 8, 'nine' => 9];
    
    while (($fileLine = fgets($file)) !== false) {

        $positions = [];
       
        foreach ($needle as $key => $value) {

            $position = strpos($fileLine, $key);

            while ($position !== false) {
                $positions[strval($position)] = $value;
                $position = strpos($fileLine, $key, $position + 1);
            }
        }

        ksort($positions);
        print_r ($positions);
        
        $values[] = $positions[array_key_first($positions)] . $positions[array_key_last($positions)];
    }

    $sum = 0;

    foreach ($values as $value) {
        $sum += intval($value);
    }

    echo "Sum: " . $sum;

}

fclose($file);