<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */
function countingValleys($n, $s) {
    $startpos = 0;


    $posarr = [];


    $valleycnt = 0;


    for($i = 0; $i < $n ; $i++) {
        if($s[$i] == 'D') {
            $startpos --;

            $posarr[$i] = $startpos;  

        } else {
            $startpos ++;

            $posarr[$i] = $startpos;
        }
    }


    for($i = 0; $i < $n ; $i++) {
        if($posarr[$i] == 0 && $posarr[$i-1] < 0) 
            $valleycnt++;
    }

    return $valleycnt;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$steps = intval(trim(fgets(STDIN)));

$path = rtrim(fgets(STDIN), "\r\n");

$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");

fclose($fptr);
