<?php

namespace Tests\Calculator;

use App\Calculator\Mk2Calculator;
use App\Model\Change;
use PHPUnit\Framework\TestCase;

class Mk2CalculatorTest extends TestCase
{
    public function testGetSupportedModel()
    {
        $objectUnderTest = new Mk2Calculator();
        $this->assertEquals('mk2', $objectUnderTest->getSupportedModel());
    }

    public function testGetChangeEasy()
    {
        $objectUnderTest = new Mk2Calculator();
        $change = $objectUnderTest->getChange(2);
        $this->assertInstanceOf(Change::class, $change);
        $this->assertEquals(1, $change->coin2);
    }

    public function testGetChangeImpossible()
    {
        $objectUnderTest = new Mk2Calculator();
        $change = $objectUnderTest->getChange(1);
        $this->assertNull($change);
    }

    public function testGetComplexChange()
    {
        $objectUnderTest = new Mk2Calculator();
        $change = $objectUnderTest->getChange(28);
        $this->assertEquals(2, $change->bill10);
        $this->assertEquals(1, $change->bill5);
        $this->assertEquals(1, $change->coin2);

    }
}
