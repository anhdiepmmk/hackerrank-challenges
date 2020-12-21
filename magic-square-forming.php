<?php

// Complete the formingMagicSquare function below.
function getCost($matrix, $squaremag) {
    $cost = 0;

    for($i =0; $i < 3; $i++) {
        for($j = 0; $j < 3; $j++) {
            $cost += abs($matrix[$i][$j] - $squaremag[$i][$j]);
        }
    }
    
    return $cost;
}


function formingMagicSquare($s) {
    $mgicsquare1 = [
        [8,3,4],
        [1,5,9],
        [6,7,2]
    ];

    $mgicsquare2 = [
        [6,1,8],
        [7,5,3],
        [2,9,4]
    ];

    $mgicsquare3 = [
        [2,7,6],
        [9,5,1],
        [4,3,8]
    ];

    $mgicsquare4 = [
        [4,9,2],
        [3,5,7],
        [8,1,6]
    ];

    $mgicsquare5 = [
        [4,3,8],
        [9,5,1],
        [2,7,6]
    ];

    $mgicsquare6 = [
        [2,9,4],
        [7,5,3],
        [6,1,8]
    ];

    $mgicsquare7 = [
        [6,7,2],
        [1,5,9],
        [8,3,4]
    ];

    $mgicsquare8 = [
        [8,1,6],
        [3,5,7],
        [4,9,2]
    ];

    $mincost = getCost($s, $mgicsquare1);
    $mincost =  $mincost > getCost($s, $mgicsquare2) ? getCost($s, $mgicsquare2) : $mincost;

    $mincost =  $mincost > getCost($s, $mgicsquare3) ? getCost($s, $mgicsquare3) : $mincost;

    $mincost = $mincost > getCost($s, $mgicsquare4) ? getCost($s, $mgicsquare4) : $mincost;

    $mincost = $mincost > getCost($s, $mgicsquare5) ? getCost($s, $mgicsquare5) : $mincost;

    $mincost = $mincost > getCost($s, $mgicsquare6) ? getCost($s, $mgicsquare6) : $mincost;

    $mincost = $mincost > getCost($s, $mgicsquare7) ? getCost($s, $mgicsquare7) : $mincost;

    $mincost = $mincost > getCost($s, $mgicsquare8) ? getCost($s, $mgicsquare8) : $mincost;

    return $mincost;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = array();

for ($i = 0; $i < 3; $i++) {
    fscanf($stdin, "%[^\n]", $s_temp);
    $s[] = array_map('intval', preg_split('/ /', $s_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = formingMagicSquare($s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
