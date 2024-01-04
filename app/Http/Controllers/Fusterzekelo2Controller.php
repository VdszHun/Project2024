<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Fust2Model;

class Fusterzekelo2Controller extends Controller
{
    public function index(){
        $fusterzekelo2 = Fust2Model::orderBy('f2_id', 'DESC')->paginate(10);
        return view('fusterzekelo2',['fusterzekelo2' => $fusterzekelo2]);
    }
}
