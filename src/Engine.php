<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function cli\err;

const  NUMBER_OF_GAME_STEPS = 3;

function startGame($gameData, $gameRule)
{
    line("Welcome to the Brain Games!");
    line($gameRule);
    $userName = prompt("May I have your name?");
    line("Hello, %s!", $userName);
    foreach ($gameData as $questionGame => $correctAnswer) {
        line("Question: %s", $questionGame);
        $answer = prompt("Your answer: ");
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            err("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$userName}");
            exit;
        }
    }
    line("Congratulations, {$userName}!");
}
