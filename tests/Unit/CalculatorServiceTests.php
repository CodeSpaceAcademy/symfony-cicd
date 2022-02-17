<?php

namespace App\Tests\Unit;

use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorServiceTests extends KernelTestCase
{
    private CalculatorService $calculatorService;


    protected function setUp(): void
    {
        $this->calculatorService = new CalculatorService();
    }

    /**
     * @test
     */
    public function shouldReturnCorrectSumAction()
    {
        $this->assertTrue( 10 == $this->calculatorService->sum(2,8));
    }

    /**
     * @test
     */
    public function shouldReturnFalsySumAction()
    {
        $this->assertNotEquals(10, $this->calculatorService->sum(10, 10));
    }

    /**
     * @test
     */
    public function shouldReturnCorrectMultiplyAction()
    {
        $this->assertEquals(100, $this->calculatorService->multiply(10, 10));
    }

    /**
     * @test
     */
    public function shouldReturnCorrectDivideAction()
    {
        $this->assertEquals(1, $this->calculatorService->divide(10, 10));
    }

    /**
     * @test
     */
    public function shouldReturnNegativeNumberWhileDividingOn0()
    {
        $this->assertEquals(-1, $this->calculatorService->divide(100, 0));
    }

    /**
     * @test
     */
    public function shouldReturnCorrectSubtractAction()
    {
        $this->assertEquals(0, $this->calculatorService->subtract(10, 10));
    }

    /**
     * @test
     */
    public function shouldReturnIncorrectSubtract()
    {
        $this->assertNotEquals(-1, $this->calculatorService->subtract(100, 0));
    }
}