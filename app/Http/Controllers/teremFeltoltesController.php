<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helyszin;

class teremFeltoltesController extends Controller
{
    public function upload(Request $req){

        $req->validate(

            [
                'terem_szint' => "required",
                'terem_szam' => "required",
                'terem_descript' => "required",
                'eszköz_ip' => "required",
                'fajl' => "required|mimes:jpg|max:100"
            ],
            [
                'terem_szint.required' => "Kötelező terem szintett megadni!",
                'terem_szam.required' => "Kötelező terem számot megadni!",
                'terem_descript.required' => "Kötelező terem leírást megadni!",
                'eszköz_ip.required' => "Kötelező terem eszköz ip-t megadni!",
                'fajl.required' => "Kötelező fájlt feltölteni!",
                'fajl.mimes' => "Feltöntendő fájl csak .jpg fájlformátum lehet!",
                'fajl.max' => "A fájl maximum mérete 100 kB lehet!"
            ]

        );

        if ($req->fails()) {
            $data['message'] = "Hibás adatok";
            $data['errorList'] = $fust2validalas->messages();
            return response()->json($data, 400);
        } else {


                    $teremfelvetel = new Helyszin();
                    $teremfelvetel->terem_szint = $req->input('terem_szint');
                    $teremfelvetel->terem_szam = $req->input('terem_szam');
                    $teremfelvetel->terem_descript = $req->input('terem_descript');
                    $teremfelvetel->eszköz_ip = $req->input('eszköz_ip');
                    $fileName = $req->fajl->extension();
                    $req->fajl->storeAs('public/teremkepek',$terem_szam);

                    $teremfelvetel->save();

                    return response()->json($teremfelvetel, 201);

        }




    }
}
