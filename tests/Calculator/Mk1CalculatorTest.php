<?php

namespace Tests\Calculator;

use App\Calculator\Mk1Calculator;
use App\Model\Change;
use PHPUnit\Framework\TestCase;

class Mk1CalculatorTest extends TestCase
{
    public function testGetSupportedModel()
    {
        $objectUnderTest = new Mk1Calculator();
        $this->assertEquals('mk1', $objectUnderTest->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $objectUnderTest = new Mk1Calculator();
        $change = $objectUnderTest->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(2, $change->coin1);
    }
}
