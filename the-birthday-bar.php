<?php

// Complete the birthday function below.
function birthday($s, $d, $m) {
    $counter = 0;

    for($i = 0; $i <= sizeof($s) - $m; $i++) {
            $sum = $s[$i];
            for($j = $i + 1; $j < $i + $m; $j++) {
                $sum += $s[$j];
            }

            if($sum == $d)
                $counter++;
    }
    return $counter;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$s_temp = rtrim(fgets(STDIN));

$s = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));

$dm = explode(' ', rtrim(fgets(STDIN)));

$d = intval($dm[0]);

$m = intval($dm[1]);

$result = birthday($s, $d, $m);

fwrite($fptr, $result . "\n");

fclose($fptr);
