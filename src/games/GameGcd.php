<?php

namespace BrainGames\GameGcd;

use function BrainGames\Tmp\startGame;

const GAME_RULE = "Find the greatest common divisor of given numbers.";
use const BrainGames\Tmp\NAMBER_OF_GAME_STEPS;

function startGcdGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $askQuestion = ("{$firstArg} {$secondArg}");
        $correctAnswer =  getCorrectAnswer($firstArg, $secondArg);
        $gameData[$askQuestion] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}


function getCorrectAnswer(int $firstArg, int $secondArg): string
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
