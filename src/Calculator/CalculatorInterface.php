<?php

namespace App\Calculator;

use App\Model\Change;

interface CalculatorInterface
{
    /**
     * @return string Indicates the model of automaton
     */
    public function getSupportedModel(): string;

    /**
     * @param int $amount The amount of money to turn into change
     * @return Change|null The change, or null if the operation is impossible
     */
    public function getChange(int $amount): ?Change;
}
