<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzekelo1Controller;
use App\Http\Controllers\Fusterzekelo2Controller;
use App\Http\Controllers\fooldalController;


Route::get('/', function () {
    return view('welcome');
})->name("fooldal");


Route::get('/fusterzekelo2/{hid}',[Fusterzekelo2Controller::class,'index']);


Route::get('/fusterzekelo1',[Fusterzekelo1Controller::class,'index'])->name('fusterzekelo1');
Route::get('/teremfelvetel',[fooldalController::class,'felveteindex'])->name('teremplus');