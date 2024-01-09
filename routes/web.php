<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzekelo1Controller;
use App\Http\Controllers\Fusterzekelo2Controller;


Route::get('/', function () {
    return view('welcome');
})->name("fooldal");

Route::get('/fusterzekelo1',[Fusterzekelo1Controller::class,'index'])->name('fusterzekelo1');
Route::get('/fusterzekelo2',[Fusterzekelo2Controller::class,'index'])->name('fusterzekelo2');