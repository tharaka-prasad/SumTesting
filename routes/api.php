<?php

use App\Http\Controllers\api\CalculationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('calculate', [CalculationController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
