<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Meres;
use App\models\Helyszin;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Meres::where('hibakod', '>', '0')->paginate(10);
        return view('hibalista',['hibak' => $hibak]);

    }
}
