<?php

namespace BrainEven\Tmp;

  use function cli\line;
  use function cli\prompt;

function brainEven(string $name): int
{
    for ($i = 0; $i < 3; $i++) {
        $value = random_int(0, 100);
        line('Question: %d', $value);
        $answer = prompt('Your answer: ');
        if (
            $value % 2 === 0 && $answer === 'yes'
                || $value % 2 === 1 && $answer === 'no'
        ) {
            line('Correct!');
        } else {
            $correctAnswer = $answer === 'yes' ? 'no' : 'yes';
            line(
                '%s is wrong answer ;(. Correct answer was %s',
                $answer,
                $correctAnswer
            );
            line("Let's try again, %s!", $name);
            break;
        }
    }
    return $i;
}

function start()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    if (brainEven($name) === 3) {
        line('Congratulations, %s!', $name);
    }
}
