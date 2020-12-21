<?php

// Complete the extraLongFactorials function below.
function extraLongFactorials($n) {
    $result = 1;
    for($i = $n; $i > 0; $i--){
        $result = bcmul($result, $i);
    }
   return $result;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

echo extraLongFactorials($n);

fclose($stdin);