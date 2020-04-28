<?php

namespace BrainGames\Tmp;

use function BrainGames\Cli\printWelcome;
use function BrainGames\Cli\printGameRules;
use function BrainGames\Cli\getName;
use function BrainGames\Cli\printHello;
use function BrainGames\Cli\askQuestion;
use function BrainGames\Cli\answerQuestion;
use function BrainGames\Cli\printCorrect;
use function BrainGames\Cli\wrongAnswer;
use function BrainGames\CLi\printGameLost;
use function BrainGames\Cli\printGameWin;
use function BrainGames\GameEven\brainEven;
use function BrainGames\GameCalc\brainCalc;
use function BrainGames\GameGcd\brainGcd;
use function BrainGames\GameProgression\brainProgression;
use function cli\line;
use function cli\prompt;

const  NAMBER_OF_GAME_STEPS = 3;

function brainGames(string $userName, string $gameName): int
{
    for ($i = 0; $i < 3; $i++) {
        $correctAnswer = getCorrectAnswer($gameName);
        $answer = answerQuestion();
        if (checkSolve($answer, $correctAnswer)) {
            printCorrect();
        } else {
            wrongAnswer($answer, $correctAnswer);
            printGameLost($userName);
            break;
        }
    }
    return $i;
}

function startGame(string $gameName): int
{
    printWelcome();
    printGameRules($gameName);
    $userName = getName();
    printHello($userName);
    if (brainGames($userName, $gameName) === NAMBER_OF_GAME_STEPS) {
        printGameWin($userName);
    }

    return 0;
}

function checkSolve(string $answer, string $correctAnswer): bool
{
    return ($answer === $correctAnswer) ? true : false;
}

function getCorrectAnswer(string $gameName): string
{
    switch ($gameName) {
        case 'even':
            $correctAnswer =  brainEven();
            break;
        case 'calc':
            $correctAnswer =  brainCalc();
            break;
        case 'gcd':
            $correctAnswer = brainGcd();
            break;
        case 'progression':
            $correctAnswer = brainProgression();
    }
    return $correctAnswer;
}
