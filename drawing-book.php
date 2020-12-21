<?php

/*
 * Complete the pageCount function below.
 */

function pageCount($n, $p) {
    /*
     * Write your code here.
     */
    $upcnt = floor($p/2);

    if($n%2 == 0) {
        $downcnt = floor(($n+1-$p)/2);
    } else {
        $downcnt = floor(($n-$p)/2);
    }

    return $upcnt < $downcnt ? $upcnt : $downcnt; 
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

fscanf($stdin, "%d\n", $p);

$result = pageCount($n, $p);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
