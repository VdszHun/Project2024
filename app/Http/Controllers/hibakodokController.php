<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Helyszin;

class hibakodokController extends Controller
{
    public function index(){

        $hibak = Helyszin::all();
        return view('hibalista',['hibak' => $hibak]);

    }
}
