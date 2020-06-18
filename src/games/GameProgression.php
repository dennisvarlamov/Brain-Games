<?php

namespace BrainGames\GameProgression;

use function BrainGames\Cli\askQuestion;

const NUMBER_OF_PROGRESSION_ELEMENTS = 10;
use function BrainGames\Tmp\startGame;
const GAME_RULE = "What number is missing in the progression?";
use const BrainGames\Tmp\NAMBER_OF_GAME_STEPS;

function startProgressionGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $startProgression = random_int(0, 100);
        $stepProgression =  random_int(0, 10);
        $missingElement = rand(0, NUMBER_OF_PROGRESSION_ELEMENTS - 1);
        $askQuestion = (createProgression($startProgression, $stepProgression, $missingElement));
        $correctAnswer = (string)($missingElement * $stepProgression + $startProgression);
        $gameData[$askQuestion] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}

function createProgression(int $start, int $step, int $missingElement): string
{
    $progression = '';
    $lostElem =  ($missingElement * $step) + $start;
    $finish = ((NUMBER_OF_PROGRESSION_ELEMENTS - 1) * $step) + $start;
    for ($start; $start <= $finish; $start += $step) {
        $progression .= ($start !== $lostElem) ? ' ' . $start : ' ..';
    }

    return $progression;
}
