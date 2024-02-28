<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzekelo1Controller;
use App\Http\Controllers\Fusterzekelo2Controller;
use App\Http\Controllers\fooldalController;
use App\Http\Controllers\teremFeltoltesController;

Route::get('/',[fooldalController::class,'main_page'])->name('fooldal');
Route::get('/fusterzekelo2/{hid}',[Fusterzekelo2Controller::class,'index']);


Route::get('/fusterzekelo1',[Fusterzekelo1Controller::class,'index'])->name('fusterzekelo1');
Route::get('/teremfelvetel',[fooldalController::class,'felveteindex'])->name('teremplus');
Route::post('/teremfeltoltes', [teremFeltoltesController::class, 'upload']);
