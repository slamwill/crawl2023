<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InvestmentService;

class InvestmentController extends Controller
{

    public function __construct()
    {
    }

    
    public function getInvestment(Request $request)
    {
        $investmentService = new InvestmentService();
        $result = $investmentService->getInvestment();

        return response()->json($result);
    }
}
