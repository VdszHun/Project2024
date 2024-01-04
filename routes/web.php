<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzeklo1Controller;
use App\Http\Controllers\Fusterzeklo2Controller;


Route::get('/', function () {
    return view('welcome');
})->name("fooldal");

Route::get('/fusterzekelo1',[Fusterzeklo1Controller::class,'index'])->name('fusterzekelo1');
Route::get('/fusterzekelo2',[Fusterzeklo2Controller::class,'index'])->name('fusterzekelo2');