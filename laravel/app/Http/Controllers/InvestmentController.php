<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InvestmentService;

class InvestmentController extends Controller
{
    protected $plaintext;

    public function __construct()
    {
        $this->plaintext = 'Hello World';
    }

    
    public function getInvestment(Request $request)
    {
        $investmentService = new InvestmentService();
        $result = $investmentService->getInvestment($this->plaintext);
    }
}
