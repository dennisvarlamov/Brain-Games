<?php

namespace BrainGames\GameEven;

use function BrainGames\Cli\askQuestion;

function brainEven(): string
{
    $value = random_int(0, 100);
    askQuestion((string)$value);

    return ($value % 2 === 0) ? 'yes' : 'no';
}
