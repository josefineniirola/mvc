<?php

declare(strict_types=1);

namespace Jos\Dice;

use function Mos\Functions\{
    renderView,
    sendResponse,
};

/**
 * Class Game.
 */

class Game
{
    public function playGame(): void
    {
        $data = [
            "header" => "Dice Game",
            "message" => "",
        ];
        $body = renderView("layout/dice.php", $data);
        sendResponse($body);
    }
}
