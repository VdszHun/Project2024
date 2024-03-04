<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helyszin;


class TeremlistaController extends Controller
{
    public function index(){

        $termek = Helyszin::all();
        return view('teremlista',['termek' => $termek]);

    }

    public function torles(Reuest $req){
        $terem=Helyszin::find($req->input('h_id'));
        $terem->delete();
        $terem['error'] = false;
        return response()->json($terem);

    }
}
