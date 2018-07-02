<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 02/07/2018
 * Time: 22:02
 */

namespace App\Calculator;


use App\Model\Change;

class Mk1Calculator implements CalculatorInterface
{
    public function getSupportedModel(): string
    {
        // TODO: Implement getSupportedModel() method.

        return "mk1";
    }

    public function getChange(int $amount): ?Change
    {
        // TODO: Implement getChange() method.
        $change = new Change();

        $change->coin1 = $amount;

        return $change;
    }
}