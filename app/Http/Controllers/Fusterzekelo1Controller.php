<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fusterzekelo1Controller extends Controller
{
    public function index(){
        $fusterzekelo1 = Fusterzekelo1::orderBy('f1_id', 'DESC')->paginate(10);
        return view('fusterzekelo1',['fusterzekelo1' => $fusterzekelo1]);
    }
}
