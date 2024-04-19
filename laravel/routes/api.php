<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrawlWithUrlController;
use App\Http\Controllers\GoogleMapController;
use App\Http\Controllers\RedisController;


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