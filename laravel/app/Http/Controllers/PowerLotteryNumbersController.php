<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PowerLotteryNumbersService;

class PowerLotteryNumbersController extends Controller
{

    public function __construct()
    {
    }

    public function generatePowerLotteryNumbers(Request $request)
    {
        $powerLotteryNumbersService = new PowerLotteryNumbersService();
        $result = $powerLotteryNumbersService->generatePowerLotteryNumbers();

        return response()->json($result);
    }
}
