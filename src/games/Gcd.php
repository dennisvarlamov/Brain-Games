<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const GAME_RULE = "Find the greatest common divisor of given numbers.";

function startGcdGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $gameQuestion = "{$firstArg} {$secondArg}";
        $correctAnswer =  (string)(gcd($firstArg, $secondArg));
        $gameData[$gameQuestion] = $correctAnswer;
    }
    return playGame($gameData, GAME_RULE);
}


function gcd(int $firstArg, int $secondArg): int
{
    $largeNumber = max($firstArg, $secondArg);
    $lowerNumber = min($firstArg, $secondArg);
    $balance = 1;
    while ($balance) {
        $balance = $largeNumber % $lowerNumber;
        $largeNumber = $lowerNumber;
        $lowerNumber = $balance;
    }

    return $largeNumber;
}
