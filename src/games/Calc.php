<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const MATH_OPERATORS = array('+', '-', '*', '%');
const GAME_RULE = "What is the result of the expression?";


function startCalcGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $operation = MATH_OPERATORS[array_rand(MATH_OPERATORS, 1)];
        $gameQuestion = "{$firstArg} {$operation} {$secondArg}";
        $correctAnswer = (string)(calculate($firstArg, $secondArg, $operation));
        $gameData[$gameQuestion] = $correctAnswer;
    }
    return playGame($gameData, GAME_RULE);
}

function calculate(int $firstArg, int $secondArg, string $operation): int
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
