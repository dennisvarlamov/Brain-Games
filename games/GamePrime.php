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
    if ($value === 1 || $value === 0) {
        return 'no';
    }

    $result = 1;
    $middle = ($value > 10) ? ($value / 2) : $value;
    for ($i = 2; $i < $middle; $i++) {
        if ($value % $i === 0) {
            $result = $i;
            break;
        }
    }
    return ($result > 1) ? 'no' : 'yes';
}
