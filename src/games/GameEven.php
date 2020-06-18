<?php

namespace BrainGames\GameEven;

use function BrainGames\Tmp\startGame;
const GAME_RULE = "Answer \"yes\" if the number is even, " . "otherwise answer \"no\".";
use const BrainGames\Tmp\NAMBER_OF_GAME_STEPS;

function startEvenGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $askQuestion = ((string)$value);
        $correctAnswer = ($value % 2 === 0) ? 'yes' : 'no';
        $gameData[$askQuestion] = $correctAnswer;
    }

    return startGame($gameData, GAME_RULE);
}
