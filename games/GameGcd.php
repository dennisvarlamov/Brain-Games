<?php

namespace BrainGames\GameGcd;

use function BrainGames\Cli\askQuestion;

function brainGcd() : string
{
    $firstArg = random_int(0, 100);
    $secondArg = random_int(0,100);
    askQuestion("{$firstArg} {$secondArg}");

    return getCorrectAnswer($firstArg, $secondArg);
}

function getCorrectAnswer(int $firstArg, int $secondArg)
{
    $largeNumber = ($firstArg >= $secondArg) ? $firstArg : $secondArg;
    $lowerNumber = ($firstArg <= $secondArg) ? $firstArg : $secondArg;
    $balance = 1;
    $result = 0;
    while ($balance) {
        $balance = $largeNumber % $lowerNumber;
        $largeNumber = $lowerNumber;
        $lowerNumber = $balance;
    }
    return $largeNumber;
}