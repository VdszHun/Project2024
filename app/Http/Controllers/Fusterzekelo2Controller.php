<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Helyszin;
use App\Models\Meres;

class Fusterzekelo2Controller extends Controller
{
    public function index($hid){
        //$fusterzekelo2 = Helyszin::orderBy('h_id', 'DESC')->paginate(9);

        $fusterzekelo = Helyszin::find($hid);
        $fusterzekelodata = Meres::where('h_id',$hid)->orderBy('m_id', 'DESC')->paginate(9);
        if($fusterzekelo){
            return view('fusterzekelo2',['fusterzekelo' => $fusterzekelo, 'fusterzekelodata' => $fusterzekelodata]);
        }
        return redirect()->route('fooldal');
        #
    }

    //API
    public function create(Request $req){
        $fust2validalas = Validator::make(
            $req->all(),
            [
                "eszköz_ip" => "required",
                "ppm" => "required",
                "homerseklet" => "required",
                "paratartalom" => "required",
                "hibakod" => "required"
            ],
            [
                "eszköz_ip.required" => "Hianyzo eszkoz ip!",
                "ppm.required" => "Hiányzó ppm ertek!",
                "homerseklet.required" => "Hiányzó homerseklet ertek!",
                "paratartalom.required" => "Hiányzó paratartalom ertek!",
                "hibakod.required" => "Hiányzó hibakod!"
            ]
        );

        if ($fust2validalas->fails()) {
            $data['message'] = "Hibás adatok";
            $data['errorList'] = $fust2validalas->messages();
            return response()->json($data, 400);
        } else {
            try {
                // Helyszín keresése az eszköz IP alapján
                $location = Helyszin::where('eszköz_ip', $req->input('eszköz_ip'))->first();

                // Ha találunk egyezést az eszköz IP-re, beszúrjuk az adatokat
                if ($location) {
                    $fustadatok = new Meres();
                    $fustadatok->h_id = $location->h_id;
                    $fustadatok->ppm = $req->input('ppm');
                    $fustadatok->homerseklet = $req->input('homerseklet');
                    $fustadatok->paratartalom = $req->input('paratartalom');
                    $fustadatok->hibakod = $req->input('hibakod');
                    $fustadatok->meres_ideje = date('Y-m-d H:i:s');

                    $fustadatok->save();

                    return response()->json($fustadatok, 201);
                } else {
                    // Ha nem talál egyezést, hibát adunk vissza
                    return response()->json(['error' => 'Nem található helyszín az adott eszköz IP-vel.'], 404);
                }
            } catch (\Exception $e) {
                // Hiba esetén visszatérés a hibakóddal
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

    }
}
