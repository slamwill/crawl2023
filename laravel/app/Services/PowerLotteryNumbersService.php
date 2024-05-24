<?php

namespace App\Services;

class PowerLotteryNumbersService
{
    public function __construct()
    {
    }

    public function generatePowerLotteryNumbers(): array
    {
        $mainNumbers = [];
        while (count($mainNumbers) < 6) {
            $num = rand(1, 38);
            if (!in_array($num, $mainNumbers)) {
                $mainNumbers[] = $num;
            }
        }
        sort($mainNumbers);

        $specialNumber = rand(1, 8);

        $lotteryNumbers = [
            "main_numbers" => $mainNumbers,
            "special_number" => $specialNumber
        ];
    
        return $lotteryNumbers;
    }

    public function generatePowerLotteryNumbers_(): array
    {
        $mainNumbers = [];
        while (count($mainNumbers) < 6) {
            $num = rand(1, 38);
            if (!in_array($num, $mainNumbers)) {
                $mainNumbers[] = $num;
            }
        }
        sort($mainNumbers);

        $specialNumber = rand(1, 8);

        $lotteryNumbers = [
            "main_numbers" => $mainNumbers,
            "special_number" => $specialNumber
        ];
    
        return $lotteryNumbers;
    }
}
