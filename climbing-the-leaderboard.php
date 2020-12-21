<?php

/*
 * Complete the 'climbingLeaderboard' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY ranked
 *  2. INTEGER_ARRAY player
 */

function climbingLeaderboard($ranked, $player) {
    // Write your code here$result = [];
    $processedPlayersScores = [];
    $prevScore = null;

    foreach($ranked as $score) {
        $score = (int) $score;

        if ($prevScore === $score) {
            continue;
        }
        
        $processedPlayersScores[] = $score;
        $prevScore = $score;
    }

    $rightBorder = count($processedPlayersScores) - 1;
    $alicePlace = count($processedPlayersScores)  + 1;
    $addPlaceToResult = false;

    for ($i = 0; $i < count($player); $i++) {
        for ($j = $rightBorder; $j >= 0; $j--) {
            if ($processedPlayersScores[$j] > (int) $player[$i]) {
                $result[] = $alicePlace;
                $addPlaceToResult = false;

                break;
            }

            $alicePlace--;
            $addPlaceToResult = true;
            $rightBorder = $j - 1;
        }

        if ($addPlaceToResult) {
            $result[] = $alicePlace;
        }
    }

    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$ranked_count = intval(trim(fgets(STDIN)));

$ranked_temp = rtrim(fgets(STDIN));

$ranked = array_map('intval', preg_split('/ /', $ranked_temp, -1, PREG_SPLIT_NO_EMPTY));

$player_count = intval(trim(fgets(STDIN)));

$player_temp = rtrim(fgets(STDIN));

$player = array_map('intval', preg_split('/ /', $player_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = climbingLeaderboard($ranked, $player);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
