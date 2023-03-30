<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post("/login",[AuthController::class,"login"]);
Route::post("/register",[AuthController::class,"register"]);
Route::middleware(["auth:sanctum"])->group(function(){

    Route::get("/user",[UserController::class,"user"]);
    Route::put("/users/info",[UserController::class,"updateInfo"]);
    Route::put("/users/password",[UserController::class,"updatePassword"]);
    Route::apiResource("users",UserController::class);

});

