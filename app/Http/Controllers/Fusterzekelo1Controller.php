<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Fust1Model;

class Fusterzekelo1Controller extends Controller
{
    public function index(){
        $fusterzekelo1 = Fust1Model::orderBy('f1_id', 'DESC')->paginate(9);
        return view('fusterzekelo1',['fusterzekelo1' => $fusterzekelo1]);
    }

    //API
    public function fust1create(Request $req){
        $fust1validalas = Validator::make(
            $req->all(),
            [
                "f1_legminoseg" => "required",
                "f1_hofok" => "required",
                "f1_paratartalom" => "required"
            ],
            [
                "f1_legminoseg.required" => "Hiányzó légminőség!",
                "f1_hofok.required" => "Hiányzó hőmérséklet!",
                "f1_paratartalom.required" => "Hiányzó páratartalom!"
            ]
        );
        if($fust1validalas->fails()){
            $data['message'] = "Hibás adatok";
            $data['errorList'] = $fust1validalas->messages();
            return response()->json($data,400);
        }else{
            //Adatbázisba szúrni az adatokat
            $fust1adatok = new Fust1Model;
            $fust1adatok->f1_legminoseg = $req->input('f1_legminoseg');
            $fust1adatok->f1_hofok = $req->input('f1_hofok');
            $fust1adatok->f1_paratartalom = $req->input('f1_paratartalom');
            $fust1adatok->f1_meres_ideje = date('Y-m-d H:i:s');
            $fust1adatok->save();
            return response()->json($fust1adatok,201);
        }
    }
}