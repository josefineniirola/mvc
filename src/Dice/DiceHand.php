<?php

declare(strict_types=1);

namespace Jos\Dice;

/**
 * Class DiceHand.
 */

class DiceHand
{
    private $dices = [];
    private $sum = [];
    private $nrOfDices = 0;

    public function __construct(int $dices = 6)
    {
        for ($i = 0; $i < $dices; $i++) {
            $this->dices[$i] = new Dice();
            $this->nrOfDices += 1;
        }
    }

    public function roll(): void
    {
        for ($i = 0; $i < $this->nrOfDices; $i++) {
            $this->sum[$i] = 0;
            $this->sum[$i] += $this->dices[$i]->roll();
        }
    }

    public function getLastRoll(): string
    {
        $res = "";

        for ($i = 0; $i < $this->nrOfDices; $i++) {
            $res .= $this->dices[$i]->getLastRoll() . ", ";
        }
        return $res . " = " . array_sum($this->sum);
    }
}
