<?php

namespace App\Service;

class CalculatorService
{
    public const ACTIONS = [
        'sum', 'subtract', 'divide', 'multiply'
    ];

    public function __construct()
    {
    }


    public static function checkActionExists(string $action): bool
    {
        return is_bool(array_search($action, self::ACTIONS));
    }

    public function sum($param1, $param2): float
    {
        return $param1 + $param2;
    }

    public function subtract($param1, $param2): float
    {
        return $param1 - $param2;
    }

    public function divide($param1, $param2): float
    {
        if ($param2 == 0) {
            return -1;
        }
        return $param1 / $param2;
    }

    public function multiply($param1, $param2): float
    {
        return $param1 * $param2;
    }
}