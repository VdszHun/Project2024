<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Fusterzekelo2Controller extends Controller
{
    public function index(){
        $fusterzekelo2 = Fusterzekelo2::orderBy('f2_id', 'DESC')->paginate(10);
        return view('fusterzekelo2',['fusterzekelo2' => $fusterzekelo2]);
    }
}
