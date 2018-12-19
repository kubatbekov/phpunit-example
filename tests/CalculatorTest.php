<?php

use PHPUnit\Framework\TestCase;
use app\srs\Calculator;

class CalculatorTest extends TestCase
{
    /**
     * @var Calculator
     */
    public $calculator;

    /**
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->calculator = new Calculator();
    }

    /**
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        $this->calculator = null;
    }

    /**
     * Data provider
     *
     * @return array
     */
    public function addDataProvider()
    {
        return [
            [1, 2.2, 3.2],
            [0, 0, 0],
            [-1, -1, -2],
            [10, 5, 15]
        ];
    }

    /**
     * Test method add
     *
     * @dataProvider addDataProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);

        $this->assertEquals($expected, $result);
    }

    /**
     * Check value type
     *
     * @dataProvider addDataProvider
     */
    public function testAddFailure($a, $b)
    {
        $result = $this->calculator->add($a, $b);

        $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_NUMERIC, $result);
    }
}