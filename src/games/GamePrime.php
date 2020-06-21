<?php

namespace BrainGames\GamePrime;

use const BrainGames\Engine\NAMBER_OF_GAME_STEPS;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startPrimeGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $questionGame = ((string)$value);
        $correctAnswer = getCorrectAnswer($value);
        $gameData[$questionGame] = $correctAnswer;
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
