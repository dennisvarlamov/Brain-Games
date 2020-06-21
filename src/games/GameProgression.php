<?php

namespace BrainGames\GameProgression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NAMBER_OF_GAME_STEPS;

const PROGRESSION_LENGTH = 10;
const GAME_RULE = "What number is missing in the progression?";


function startProgressionGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $startProgression = random_int(0, 100);
        $stepProgression =  random_int(1, 10);
        $missingElement = rand(0, PROGRESSION_LENGTH - 1);
        $questionGame = (askQuestionGame($startProgression, $stepProgression, $missingElement));
        $correctAnswer = (string)($missingElement * $stepProgression + $startProgression);
        $gameData[$questionGame] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}

function askQuestionGame(int $start, int $step, int $missingElement): string
{
    $progression = '';
    $finish = (PROGRESSION_LENGTH - 1);
    for ($i = 0; $i <= $finish; $i++) {
        $progression .= ($i === $missingElement) ? "..  " : "$start  ";
        $start = $start + $step;
    }
    return $progression;
}
