<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("V1")->group(function () {
    Route::prefix("Auth")->group(function () {
        Route::post("login",[AuthController::class,"login"]);
        Route::post("register",[AuthController::class,"register"]);
        Route::post("logout",[AuthController::class,"logout"])->middleware('auth:sanctum');
    });
});
