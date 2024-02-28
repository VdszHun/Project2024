<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teremFeltoltesController extends Controller
{
    public function upload(Request $req){

        $req->validate(

            [
                'fajl' => "required|mimes:png,jpg|max:100"
            ],
            [
                'fajl.required' => "kötelező a fált megadni",
                'fajl.mimes' => "Csak png,jpg típus lehet",
                'fajl.max' => "Max 100 kb lehet"
            ]

        );


    }
}
