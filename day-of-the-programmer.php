<?php

// Complete the dayOfProgrammer function below.
function dayOfProgrammer($year) {
    if($year <1918 && $year%400!=0 && $year%100==0 ) {
        $date=date_create($year.'-01-01');
        date_add($date,date_interval_create_from_date_string("254 days"));
        return date_format($date,"d.m.Y"); 
    } else if($year == 1918) {
        $date=date_create($year.'-01-01');
        date_add($date,date_interval_create_from_date_string("268 days"));
        return date_format($date,"d.m.Y");
    } else {
        $date=date_create($year.'-01-01');
        date_add($date,date_interval_create_from_date_string("255 days"));
        return date_format($date,"d.m.Y");
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$year = intval(trim(fgets(STDIN)));

$result = dayOfProgrammer($year);

fwrite($fptr, $result . "\n");

fclose($fptr);
