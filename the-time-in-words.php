<?php

// Complete the timeInWords function below.
function convertNumToWord($n) {
    $arr = array(
        0 => 'twelve',
        1 => 'one',
        2 => 'two', 
        3 => 'three',
        4 => 'four',
        5 => 'five', 
        6 => 'six',
        7 => 'seven',
        8 => 'eight', 
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        21 => 'twenty one',
        22 => 'twenty two',
        23 => 'twenty three',
        24 => 'twenty four',
        25 => 'twenty five',
        26 => 'twenty six',
        27 => 'twenty seven',
        28 => 'twenty eight',
        29 => 'twenty nine',
        30 => 'thirty'
    );
    return $arr[$n];
}


function timeInWords($h, $m) {
    if($m == 0) {
        return convertNumToWord($h)." o' clock";
    }else if($m ==  1) { 
        return convertNumToWord($m)." minute past ".
        convertNumToWord($h); 
    }else if($m ==  15) {
        return "quarter past ".convertNumToWord($h);
    }else if($m ==  30) {
        return "half past ".convertNumToWord($h);
    }else if($m ==  45) {
        return "quarter to ".
        convertNumToWord($h == 11 ? 0 : $h+1);
    }else if($m < 30) {
        return convertNumToWord($m)." minutes past ".
        convertNumToWord($h); 
    }else if($m > 30) {
        return convertNumToWord(60 - $m)." minutes to ".
        convertNumToWord($h == 11 ? 0 : $h+1);
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $h);

fscanf($stdin, "%d\n", $m);

$result = timeInWords($h, $m);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
