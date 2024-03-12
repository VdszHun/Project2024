<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Helyszin;

class teremFeltoltesController extends Controller
{
    public function upload(Request $req){

        $validator = Validator::make($req->all(), [ // Validator példányosítása
            'teremszint' => "required",
            'teremszam' => "required",
            'terem_nev' => "required",
            'ipaddress' => "required",
            'terempic' => "required|mimes:jpg|max:100"
        ],
        [
            'teremszint.required' => "Kötelező terem szintett megadni!",
            'teremszam.required' => "Kötelező terem számot megadni!",
            'terem_nev.required' => "Kötelező terem leírást megadni!",
            'ipaddress.required' => "Kötelező terem eszköz ip-t megadni!",
            'terempic.required' => "Kötelező fájlt feltölteni!",
            'terempic.mimes' => "Feltöntendő fájl csak .jpg fájlformátum lehet!",
            'terempic.max' => "A fájl maximum mérete 100 kB lehet!"
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 400);
        }else{

            $teremfelvetel = new Helyszin();
            $teremfelvetel->terem_szint = $req->input('teremszint');
            $teremfelvetel->terem_szam = $req->input('teremszam');
            $teremfelvetel->terem_descript = $req->input('terem_nev');
            $teremfelvetel->eszköz_ip = $req->input('ipaddress');
            $fileName = $req->input('teremszam').'.'.$req->terempic->extension();
            $req->terempic->storeAs('public/teremkepek',$fileName);
            $teremfelvetel->save();

            return response()->json($teremfelvetel, 201);
            return redirect()->route('/teremfelvetel');
        }
    }
}
