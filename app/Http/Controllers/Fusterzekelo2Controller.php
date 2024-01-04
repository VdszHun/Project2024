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

    //API
    public function fust2create(Request $req){
        $fust2validalas = Validator::make(
            $req->all(),
            [
                "f2_legminoseg" => "required",
                "f2_hofok" => "required",
                "f2_paratartalom" => "required"
            ],
            [
                "f2_legminoseg.required" => "Hiányzó légminőség!",
                "f2_hofok.required" => "Hiányzó hőmérséklet!",
                "f2_paratartalom.required" => "Hiányzó páratartalom!"
            ]
        );
        if($fust2validalas->fails()){
            $data['message'] = "Hibás adatok";
            $data['errorList'] = $fust2validalas->messages();
            return response()->json($data,400);
        }else{
            //Adatbázisba szúrni az adatokat
            $fust2adatok = new Fust2Model;
            $fust2adatok->f2_legminoseg = $req->input('f2_legminoseg');
            $fust2adatok->f2_hofok = $req->input('f2_hofok');
            $fust2adatok->f2_paratartalom = $req->input('f2_paratartalom');
            $fust2adatok->f2_meres_ideje = date('Y-m-d H:i:s');
            $fust2adatok->save();
            return response()->json($fust2adatok,201);
        }
    }
}
