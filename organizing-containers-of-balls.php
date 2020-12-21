<?php

// Complete the organizingContainers function below.
function organizingContainers($container) { 
    $sum_c = []; 
    foreach($container as $value) {
        $sum = 0;
        foreach($value as $item) {
            $sum += $item; 
        }
        $sum_c[] = $sum;
    }
 
    $sum_r = [];
 
    for($i = 0; $i < count($container); $i++) { 
        $sum = 0; 
        for($j = 0; $j < count($container); $j++) { 
            $sum += $container[$j][$i]; 
        } 
        $sum_r[] = $sum; 
    } 
    
    $result = array_diff($sum_c,$sum_r);
 
    if(count($result) == 0) 
        return 'Possible'; 
    else  
        return 'Impossible';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    fscanf($stdin, "%d\n", $n);

    $container = array();

    for ($i = 0; $i < $n; $i++) {
        fscanf($stdin, "%[^\n]", $container_temp);
        $container[] = array_map('intval', preg_split('/ /', $container_temp, -1, PREG_SPLIT_NO_EMPTY));
    }

    $result = organizingContainers($container);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
