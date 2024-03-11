<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Helyszin;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Helyszin::where('hibakod','>','0')->orderBy('meres_ideje', 'DESC')->get();
        return view('hibalista',['hibak' => $hibak]);

    }
}
