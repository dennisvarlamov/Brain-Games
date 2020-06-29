<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const  NUMBER_OF_GAME_STEPS = 3;

function playGame($gameData, $gameRule)
{
    line("Welcome to the Brain Games!");
    line($gameRule);
    $userName = prompt("May I have your name?");
    line("Hello, %s!", $userName);
    foreach ($gameData as $gameQuestion => $correctAnswer) {
        line("Question: %s", $gameQuestion);
        $answer = prompt("Your answer: ");
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");
            line("Let's try again, {$userName}");
            exit;
        }
    }
    line("Congratulations, {$userName}!");
}
