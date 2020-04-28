<?php

namespace BrainGames\GamePrime;

use function BrainGames\Cli\askQuestion;

function brainPrime(): string
{
    $value = random_int(0, 100);
    askQuestion((string)$value);

    return getCorrectAnswer($value);
}

function getCorrectAnswer(int $value): string
{
    if ($value % 2 === 0 || $value === 1) {
        return 'no';
    }

    $result = 1;

    for ($i = 1, $middle = $value / 2; $i < $middle; $i++) {
        if ($value % $i === 0) {
            $result = $i;
        }
    }
    return ($result > 1) ? 'no' : 'yes';
}
