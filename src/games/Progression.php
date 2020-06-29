<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const PROGRESSION_LENGTH = 10;
const GAME_RULE = "What number is missing in the progression?";


function startProgressionGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $startProgression = random_int(0, 100);
        $step =  random_int(1, 10);
        $missingIndex = rand(0, PROGRESSION_LENGTH - 1);
        $gameQuestion = (makeGameQuestion($startProgression, $step, $missingIndex));
        $correctAnswer = ((string)($missingIndex * $step + $startProgression));
        $gameData[$gameQuestion] = $correctAnswer;
    }
    return playGame($gameData, GAME_RULE);
}

function makeGameQuestion(int $start, int $step, int $missingIndex): string
{
    $finish = (PROGRESSION_LENGTH - 1) * $step + $start;
    $progression = range($start, $finish, $step);
    $gameQuestion = $progression;
    $gameQuestion[$missingIndex] = '..';
    $result = implode('  ', $gameQuestion);
    return $result;
}
