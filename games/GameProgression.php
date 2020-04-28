<?php

namespace BrainGames\GameProgression;

use function BrainGames\Cli\askQuestion;

const NUMBER_OF_PROGRESSION_ELEMENTS = 10;

function brainProgression(): string
{
    $startProgression = random_int(0, 100);
    $stepProgression =  random_int(0, 10);
    $missingElement = rand(0, NUMBER_OF_PROGRESSION_ELEMENTS - 1);
    askQuestion(createProgression($startProgression, $stepProgression, $missingElement));

    return (string)($missingElement * $stepProgression + $startProgression);
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
