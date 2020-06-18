<?php

namespace BrainGames\Tmp;

use function BrainGames\Cli\printWelcome;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\printHello;
use function BrainGames\Cli\answerQuestion;
use function BrainGames\Cli\printCorrect;
use function BrainGames\Cli\wrongAnswer;
use function BrainGames\CLi\printGameLost;
use function BrainGames\Cli\printGameWin;
use function cli\line;

const  NAMBER_OF_GAME_STEPS = 3;

function startGame($gameData, $gameRule): int
{
    printWelcome();
    line($gameRule);
    $userName = getName();
    printHello($userName);
    foreach ($gameData as $questionGame => $correctAnswer) {
        line("Question: %s", $questionGame);
        $answer = answerQuestion();
        if ($answer === $correctAnswer) {
            printCorrect();
        } else {
            wrongAnswer($answer, $correctAnswer);
            printGameLost($userName);
            return 0;
        }
    }
    printGameWin($userName);
    return 0;
}
