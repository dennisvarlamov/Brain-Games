<?php

namespace BrainGames\GameCalc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NAMBER_OF_GAME_STEPS;

const MATH_OPS = array('+', '-', '*', '%');
const GAME_RULE = "What is the result of the expression?";


function startCalcGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $operation = MATH_OPS[array_rand(MATH_OPS, 1)];
        $questionGame = "{$firstArg} {$operation} {$secondArg}";
        $correctAnswer = getCorrectAnswer($firstArg, $secondArg, $operation);
        $gameData[$questionGame] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}

function getCorrectAnswer(int $firstArg, int $secondArg, string $operation): string
{
    switch ($operation) {
        case '+':
            $correctAnswer = $firstArg + $secondArg;
            break;
        case '-':
            $correctAnswer = $firstArg - $secondArg;
            break;
        case '*':
            $correctAnswer = $firstArg * $secondArg;
            break;
        case '%':
            $correctAnswer = $firstArg % $secondArg;
            break;
    }
    return $correctAnswer;
}
