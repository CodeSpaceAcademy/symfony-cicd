<?php

namespace App\Controller;

use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("api/v1/calculator")
 */
class CalculatorController extends AbstractController
{
    public function __construct(private CalculatorService $calculatorService)
    {
    }

    /**
     * @Route("/sum", name="api.v1.calculator.sum")
     */
    public function sumAction(Request $request): Response
    {
        if (!$request->get('number1') || !$request->get('number2')) {
            return $this->json(['error' => 'you have not provided number1 or number2']);
        }
        return $this->json([
                'operation' => 'sum',
                'result' => $this->calculatorService->sum($request->get('number1'), $request->get('number2'))]
        );
    }

    /**
     * @Route("/", name="api.v1.calculator.dynamic")
     */
    public function dynamicAction(Request $request): Response
    {
        if (CalculatorService::checkActionExists($request->get('action'))) {
            return $this->json(['error' => 'your action is not on the list']);
        }
        if (!$request->get('number1') || !$request->get('number2')) {
            return $this->json(['error' => 'you have not provided number1 or number2']);
        }
        $action = $request->get('action');
        $number1 = $request->get('number1');
        $number2 = $request->get('number2');

        return $this->json([
            'operation' => $action,
            'result' => $this->calculatorService->{$action}($number1, $number2)
        ]);
    }
}