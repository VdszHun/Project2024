<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzekelo1Controller;
use App\Http\Controllers\Fusterzekelo2Controller;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/fusterzekelo1/beszuras",[Fusterzeklo1Controller::class, 'fust1create']);
Route::post("/fusterzekelo2/beszuras",[Fusterzeklo2Controller::class, 'fust2create']);