<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Fust1Model;

class Fusterzekelo1Controller extends Controller
{
    public function index(){
        $fusterzekelo1 = Fust1Model::orderBy('f1_id', 'DESC')->paginate(10);
        return view('fusterzekelo1',['fusterzekelo1' => $fusterzekelo1]);
    }
}
