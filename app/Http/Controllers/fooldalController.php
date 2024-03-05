<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Helyszin;


class fooldalController extends Controller
{

    public function main_page(){

        $alagsor = Helyszin::where('terem_szint','0')->orderBy('terem_szam', 'ASC')->get();
        $foldszint = Helyszin::where('terem_szint','1')->orderBy('terem_szam', 'ASC')->get();
        $elsoszint = Helyszin::where('terem_szint','2')->orderBy('terem_szam', 'ASC')->get();
        $masodikszint = Helyszin::where('terem_szint','3')->orderBy('terem_szam', 'ASC')->get();
        return view('welcome',['alagsor' => $alagsor, 'foldszint' => $foldszint,'elsoszint' => $elsoszint,'masodikszint' => $masodikszint]);

    }

    public function felveteindex(){

        return view('teremfelvetel');

    }
}
