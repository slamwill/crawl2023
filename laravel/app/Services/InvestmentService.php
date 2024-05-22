<?php

namespace App\Services;

class InvestmentService
{
    protected $kmsClient;

    public function __construct()
    {

    }

    public function getInvestment($plaintext)
    {
        $yearInput = 100;
        $yearRunning = 8;
        $rating = 1.2;
        $output = 0;
        
        for($i = 0; $i < $yearRunning; $i++) {
            echo $i+1 . " year output " . "(" . $output . "+" . $yearInput . ")" . "*" . $rating . " is ";
            $output = ($output + $yearInput) * $rating;
            echo $output . PHP_EOL . "<br>";
        }
        
        $totalAmount = $output;
        $totalCost = $yearInput * $yearRunning;
        $netProfit = $totalAmount - $totalCost;
        $netProfitPerYear = $netProfit / $yearRunning;
        echo "Total amount is " . $totalAmount . PHP_EOL . "<br>";
        echo "Total cost is " . $totalCost . PHP_EOL . "<br>";
        echo "Net profit is " . $netProfit . PHP_EOL . "<br>";
        echo "Net profit per year is " . $netProfitPerYear . PHP_EOL . "<br>";
    }
}
