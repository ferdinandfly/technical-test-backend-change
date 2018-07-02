<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 02/07/2018
 * Time: 22:19
 */

namespace App\Registry;


use App\Calculator\CalculatorInterface;
use App\Calculator\Mk1Calculator;
use App\Calculator\Mk2Calculator;

class CalculatorRegistry implements CalculatorRegistryInterface
{

    public function getCalculatorFor(string $model): ?CalculatorInterface
    {
        switch ($model) {
            case "mk1":
                return new Mk1Calculator();
            case "mk2":
                return new Mk2Calculator();
            default:
                return null;
        }
    }
}