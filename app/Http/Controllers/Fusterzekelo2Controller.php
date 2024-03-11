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
        
        //a táblázatban megjelenő értékek a nagyon magas számokra, ezek szine píros lesz az érzékelő adatai közőtt.
        $maxppm = 500;
        $maxhofok = 45;
        $maxsnedvesseg = 75;
        $maxszarazsag = 5;

        $fusterzekelo = Helyszin::find($hid);
        $fusterzekelodata = Meres::where('h_id',$hid)->orderBy('m_id', 'DESC')->paginate(9);
        $fusterzekelodata_riaszt1 = Meres::where('h_id',$hid)->where('homerseklet','>' ,$maxhofok)->orderBy('meres_ideje', 'DESC')->limit(1)->get();
        $fusterzekelodata_riaszt2 = Meres::where('h_id',$hid)->where('paratartalom','<' ,$maxsnedvesseg)->where('paratartalom','<' ,$maxszarazsag)->orderBy('meres_ideje', 'DESC')->limit(1)->get();


        if($fusterzekelo){
            return view('fusterzekelo2',['fusterzekelo' => $fusterzekelo, 'fusterzekelodata' => $fusterzekelodata, 'fusterzekelodata_riaszt1' => $fusterzekelodata_riaszt1,'fusterzekelodata_riaszt2' => $fusterzekelodata_riaszt2 , 'maxppm' => $maxppm, 'maxhofok' => $maxhofok,'maxsnedvesseg' => $maxsnedvesseg , 'maxszarazsag' => $maxszarazsag]);
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
                "eszköz_ip.required" => "Hiányzó eszköz IP!",
                "ppm.required" => "Hiányzó légminőség!",
                "homerseklet.required" => "Hiányzó hőmérséklet!",
                "paratartalom.required" => "Hiányzó páratartalom!",
                "hibakod.required" => "Hiányzó hibakód!"
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
