<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Helyszin;


class fooldalController extends Controller
{

    public function main_page(){

        $mainpage = Helyszin::all();

        return view('welcome',['mainpage' => $mainpage]);
    }

    public function felveteindex(){

        return view('teremfelvetel');

    }
}
