<?php

namespace BrainGames\GameProgression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const PROGRESSION_LENGTH = 10;
const GAME_RULE = "What number is missing in the progression?";


function startProgressionGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $startProgression = random_int(0, 100);
        $step =  random_int(1, 10);
        $missingIndex = rand(0, PROGRESSION_LENGTH - 1);
        $gameQuestion = (makeQuestionGame($startProgression, $step, $missingIndex));
        $correctAnswer = ((string)($missingIndex * $step + $startProgression));
        $gameData[$gameQuestion] = $correctAnswer;
    }
    return startGame($gameData, GAME_RULE);
}

function makeQuestionGame(int $start, int $step, int $missingIndex): string
{
    $gameQuestion = array();
    $finish = (PROGRESSION_LENGTH - 1);
    $elemOfProg = $start;
    for ($i = 0; $i <= $finish; $i++) {
        $gameQuestion[] = ($i === $missingIndex) ? "..  " : "$elemOfProg  ";
        $elemOfProg = $elemOfProg + $step;
    }
    $result = implode(' ', $gameQuestion);
    return $result;
}
