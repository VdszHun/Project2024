<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Meres;
use App\models\Helyszin;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Meres::where('hibakod', '>', '0')->get();
        return view('hibalista',['hibak' => $hibak]);

    }
}
