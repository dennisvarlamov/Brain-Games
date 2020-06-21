<?php

namespace BrainGames\GameGcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NAMBER_OF_GAME_STEPS;

const GAME_RULE = "Find the greatest common divisor of given numbers.";

function startGcdGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $questionGame = "{$firstArg} {$secondArg}";
        $correctAnswer =  gcd($firstArg, $secondArg);
        $gameData[$questionGame] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}


function gcd(int $firstArg, int $secondArg): string
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
