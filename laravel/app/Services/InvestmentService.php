<?php

namespace App\Services;

class InvestmentService
{
    public function __construct()
    {
    }

    public function getInvestment(): array
    {
        $yearInput = 100;
        $yearRunning = 8;
        $rating = 1.1;
        $output = 0;
        $result = [];

        for ($i = 0; $i < $yearRunning; $i++) {
            $year = $i + 1;
            $output = ($output + $yearInput) * $rating;
            $result[] = $this->formatYearlyOutput($year, $output, $yearInput, $rating);
        }

        $totalAmount = $output;
        $totalCost = $yearInput * $yearRunning;
        $netProfit = $totalAmount - $totalCost;
        $netProfitPerYear = $netProfit / $yearRunning;

        $result[] = "Total amount is $totalAmount";
        $result[] = "Total cost is $totalCost";
        $result[] = "Net profit is $netProfit";
        $result[] = "Net profit per year is $netProfitPerYear";

        return $result;
    }

    private function formatYearlyOutput(int $year, float $output, float $yearInput, float $rating): string
    {
        return "$year year output ($output + $yearInput) * $rating is $output";
    }
}
