<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Meres;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Meres::where('hibakod','>','0')->orderBy('meres_ideje', 'DESC')->get();
        return view('hibalista',['hibak' => $hibak]);

    }
}
