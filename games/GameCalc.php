<?php

namespace BrainGames\GameCalc;

use function BrainGames\Cli\askQuestion;

const MATH_OPS_COUNT = 5;
const MATH_OPS = array('+', '-', '*', '/', '%');

function brainCalc(): string
{
    $firstArg = random_int(0, 100);
    $secondArg = random_int(0,100);
    $operation = rand(0,  MATH_OPS_COUNT - 1);
    askQuestion("{$firstArg} " .  MATH_OPS[$operation] .  " {$secondArg}");

    return getCorrectAnswer($firstArg, $secondArg, $operation);
}

function getCorrectAnswer(int $firstArg, int $secondArg, string $operation): string
{
    switch(MATH_OPS[$operation]) {
        case '+':
            $correctAnswer = $firstArg + $secondArg;
            break;
        case '-':
            $correctAnswer = $firstArg - $secondArg;
            break;
        case '*':
            $correctAnswer = $firstArg * $secondArg;
            break;
        case '/':
            $correctAnswer = $firstArg / $secondArg;
            break;
        case '%':
            $correctAnswer = $firstArg % $secondArg;
            break;
    }
    return $correctAnswer;
}