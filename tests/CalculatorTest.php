<?php

namespace Deg540\DockerPHPBoilerplate\Test;

use Deg540\DockerPHPBoilerplate\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldAddTwoArguments()
    {
        $calculator = new Calculator();

        $result = $calculator->add(1, 2);

        $this->assertEquals(3, $result);
    }

    /**
     * @test
     */
    public function shouldMultiplyTwoArguments()
    {
        $calculator = new Calculator();

        $result = $calculator->multiply(1, 2);

        $this->assertEquals(2, $result);
    }
}
