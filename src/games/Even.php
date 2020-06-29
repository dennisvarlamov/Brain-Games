<?php

namespace BrainGames\Even;

use function BrainGames\Engine\playGame;

use const BrainGames\Engine\NUMBER_OF_GAME_STEPS;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function startEvenGame()
{
    for ($i = 0; $i < NUMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $gameQuestion = ((string)$value);
        $correctAnswer = ($value % 2 === 0) ? 'yes' : 'no';
        $gameData[$gameQuestion] = $correctAnswer;
    }

    return playGame($gameData, GAME_RULE);
}
