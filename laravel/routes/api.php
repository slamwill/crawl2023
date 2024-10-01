<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrawlWithUrlController;
use App\Http\Controllers\GoogleMapController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\S3TestController;
use App\Http\Controllers\KmsTestController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PowerLotteryNumbersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/crawl-with-url', [CrawlWithUrlController::class, 'crawlWithUrl']);
Route::get('/googleMap', [GoogleMapController::class, 'googleMap']);

Route::post('/store', [RedisController::class, 'store']);
Route::get('/retrieve', [RedisController::class, 'retrieve']);


Route::get('/getDataS3', [S3TestController::class, 'getS3']);
Route::get('/putDataS3', [S3TestController::class, 'putS3']);


Route::get('/testKmsSymmetryKey', [KmsTestController::class, 'testKmsSymmetryKey']);
Route::get('/testKmsAymmetryKey', [KmsTestController::class, 'testKmsAymmetryKey']);

Route::get('/getInvestment', [InvestmentController::class, 'getInvestment']);

Route::post('/generatePowerLotteryNumbers', [PowerLotteryNumbersController::class, 'generatePowerLotteryNumbers']);
