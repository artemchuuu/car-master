<?php

namespace App\CarMaster\Service;

interface ServiceCostCalculatorInterface
{
    public function calculateTotalCost(): int;
}