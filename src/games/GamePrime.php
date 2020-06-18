<?php

namespace BrainGames\GamePrime;

use function BrainGames\Tmp\startGame;

const GAME_RULE = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
use const BrainGames\Tmp\NAMBER_OF_GAME_STEPS;

function startPrimeGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $askQuestion = ((string)$value);
        $correctAnswer = getCorrectAnswer($value);
        $gameData[$askQuestion] = $correctAnswer;
    }
    return  startGame($gameData, GAME_RULE);
}

function getCorrectAnswer(int $value): string
{
    if ($value === 1 || $value === 0) {
        return 'no';
    }

    $result = 1;
    $middle = ($value > 10) ? ($value / 2) : $value;
    for ($i = 2; $i < $middle; $i++) {
        if ($value % $i === 0) {
            $result = $i;
            break;
        }
    }
    return ($result > 1) ? 'no' : 'yes';
}
