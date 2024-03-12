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

    public function torles(Request $req){
        $terem = Helyszin::find($req->input('h_id'));
        if (!$terem) {
            return response()->json(['error' => true, 'message' => 'A terem nem található'], 404);
        }

        $terem->delete();
        return response()->json(['error' => false, 'message' => 'A terem sikeresen törölve lett'], 200);
    }
}
