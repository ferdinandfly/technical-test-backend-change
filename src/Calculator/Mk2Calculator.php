<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 02/07/2018
 * Time: 22:02
 */

namespace App\Calculator;


use App\Model\Change;

class Mk2Calculator implements CalculatorInterface
{
    public function getSupportedModel(): string
    {
        // TODO: Implement getSupportedModel() method.
        return "mk2";
    }

    public function getChange(int $amount): ?Change
    {
        // TODO: Implement getChange() method.
        $change = new Change();

        $bill10 = intval($amount/10);
        $bill5 =  intval(($amount - $bill10 *10)/ 5);
        $coin2  = intval(($amount - $bill10* 10 - $bill5*5) /2);

        $coin1 = $amount - $bill10* 10 - $bill5*5 - $coin2*2;

        $change->bill10 = $bill10 ;
        $change->bill5 = $bill5 ;
        $change->coin2 = $coin2;
        if ($coin1 !== 0 || (!$bill10 && !$bill5 && !$coin2) ){
            return null;
        }
        return  $change;
    }

}