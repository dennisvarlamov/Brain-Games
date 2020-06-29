<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startPrimeGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $gameQuestion = ((string)$value);
        $correctAnswer = isPrime($value) ? 'yes' : 'no';
        $gameData[$gameQuestion] = $correctAnswer;
    }
    return  playGame($gameData, GAME_RULE);
}

function isPrime($operand): bool
{
    if ($operand <= 1) {
        return false;
    }
    for ($divisor = 2; $divisor <= $operand / 2; $divisor++) {
        if ($operand % $divisor === 0) {
            return false;
        }
    }
    return true;
}
