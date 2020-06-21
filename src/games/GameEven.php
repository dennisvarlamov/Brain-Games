<?php

namespace BrainGames\GameEven;

use const BrainGames\Engine\NAMBER_OF_GAME_STEPS;

use function BrainGames\Engine\startGame;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function startEvenGame(): string
{
    for ($i = 0; $i < NAMBER_OF_GAME_STEPS; $i++) {
        $value = random_int(0, 100);
        $questionGame = ((string)$value);
        $correctAnswer = ($value % 2 === 0) ? 'yes' : 'no';
        $gameData[$questionGame] = $correctAnswer;
    }

    return startGame($gameData, GAME_RULE);
}
