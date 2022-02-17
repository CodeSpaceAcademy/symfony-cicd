<?php

namespace App\Controller;

use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TaxCalculatorController extends AbstractController
{
    private array $hardcodedUser;

    public function __construct(private CalculatorService $calculatorService)
    {
        $this->hardcodedUser = [
            'name' => 'Miguel',
            'tax_to_pay' => 100,
            'current_money' => 1250,
            'monthly_pay' => 500
        ];
    }

    public function index(): Response
    {
        $this->hardcodedUser['current_money'] = $this->calculatorService->subtract($this->hardcodedUser['current_money'], 100);
        return $this->json(['user' => $this->hardcodedUser]);
    }
}