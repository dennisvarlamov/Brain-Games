<?php

namespace BrainGames\Cli;

  use function cli\line;
  use function cli\prompt;

function printWelcome(): int
{
    line("Welcome to the Brain Games!");

    return 0;
}

function printGameRules(string $nameOfGame): int
{
    switch ($nameOfGame) {
        case 'even':
            line("Answer \"yes\" if the number is even, " .
            "otherwise answer \"no\".");
            break;
        case 'calc':
            line("What is the result of the expression?");
            break;
        case 'gcd':
            line("Find the greatest common divisor of given numbers.");
            break;
    }
    return 0;
}

function getNAme(): string
{
    $name = prompt("May I have your name?");

    return $name;
}

function printHello(string $name): int
{
    line("Hello, %s!", $name);

    return 0;
}

function askQuestion(string $question): int
{
    line("Question: {$question}");

    return 0;
}

function answerQuestion(): string
{
    $answer = prompt("Your answer: ");

    return $answer;
}

function printCorrect(): int
{
    line("Correct!");

    return 0;
}

function wrongAnswer(string $answer, string $correctAnswer): int
{
    line("{$answer} is wrong answer ;(. Correct answer was {$correctAnswer}");

    return 0;
}

function printGameLost(string $name): int
{
    line("Let's try again, {$name}");

    return 0;
}

function printGameWin(string $name): int
{
    line("Congratulations, {$name}!");

    return 0;
}
