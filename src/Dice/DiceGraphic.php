<?php

declare(strict_types=1);

namespace Jos\Dice;

/**
 * A graphic dice.
 */
class DiceGraphic extends Dice
{
    public function graphic()
    {
        return "dice-" . $this->getLastRoll();
    }
}
