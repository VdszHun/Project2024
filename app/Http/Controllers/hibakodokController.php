<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Meres;
use App\models\Helyszin;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Meres::all();
        return view('hibalista',['hibak' => $hibak]);

    }
}
