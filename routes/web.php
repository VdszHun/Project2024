<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fusterzekelo1Controller;
use App\Http\Controllers\Fusterzekelo2Controller;
use App\Http\Controllers\fooldalController;
use App\Http\Controllers\teremFeltoltesController;
use App\Http\Controllers\TeremlistaController;
use App\Http\Controllers\hibakodokController;


Route::get('/',[fooldalController::class,'main_page'])->name('fooldal');
Route::get('/fusterzekelo2/{hid}',[Fusterzekelo2Controller::class,'index']);


Route::get('/teremfelvetel',[fooldalController::class,'felveteindex'])->name('teremplus');


Route::post('/sensorbekapcs',[fooldalController::class,'bekapcs']);
Route::post('/sensortest',[fooldalController::class,'ledtest']);

Route::get('/teremlista', [TeremlistaController::class, 'index'])->name('teremlista');
Route::post('/teremfelvetel', [teremFeltoltesController::class, 'upload']);
Route::post('/teremtorles',[TeremlistaController::class, 'torles']);
Route::get('/hibalista', [hibakodokController::class, 'index'])->name('hibakodok');

Route::get('/riasztasok', [Fusterzekelo2Controller::class, 'riasztas_index'])->name('riasztas');

