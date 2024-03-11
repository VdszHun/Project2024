<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teremFeltoltesController extends Controller
{
    public function upload(Request $req){

        $req->validate(

            [
                'fajl' => "required|mimes:jpg|max:100"
            ],
            [
                'fajl.required' => "Kötelező fájlt feltölteni!",
                'fajl.mimes' => "Feltöntendő fájl csak .jpg fájlformátum lehet!",
                'fajl.max' => "A fájl maximum mérete 100 kB lehet!"
            ]

        );


    }
}
