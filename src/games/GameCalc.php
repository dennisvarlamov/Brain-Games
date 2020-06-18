<?php

namespace BrainGames\GameCalc;

use function BrainGames\Tmp\startGame;

const MATH_OPS_COUNT = 4;
const MATH_OPS = array('+', '-', '*', '%');
const GAME_RULE = "What is the result of the expression?";
use const BrainGames\Tmp\NAMBER_OF_GAME_STEPS;

function startCalcGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $firstArg = random_int(0, 100);
        $secondArg = random_int(0, 100);
        $operation = rand(0, MATH_OPS_COUNT - 1);
        $askQuestion = ("{$firstArg} " .  MATH_OPS[$operation] .  " {$secondArg}");
        $correctAnswer = getCorrectAnswer($firstArg, $secondArg, $operation);
        $gameData[$askQuestion] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}

function getCorrectAnswer(int $firstArg, int $secondArg, string $operation): string
{
    switch (MATH_OPS[$operation]) {
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
