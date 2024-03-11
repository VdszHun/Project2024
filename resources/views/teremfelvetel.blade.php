@extends('layouts.master')
@section('title', "Teremhozzáadás")
@section('content')

<form method="POST"  enctype="multipart/form-data">
    @csrf

    <div class="container-fluid mb-4 eotvos_leftmenu">

        <h1 class="text-center">Teremfelvétel</h1>

    </div>

    <fieldset class="scheduler-border mb-4">
        <legend class="scheduler-border">Kérem adja meg az adatokat a terem hozzáadáshoz</legend>

        <label for="teremszam" class="mt-3">Terem száma: </label><br>
        <input type="number" name="teremszam" id="teremszam" min="0" max="400" value="{{old('teremszam')}}" required> <br>
        <label for="teremszint" class="mt-3">Terem emelet szintje: </label><br>
            <select name="teremszint" id="teremszint">
                <option value="0" selected>Alagsor</option>
                <option value="1">Földszint</option>
                <option value="2">Első elemet</option>
                <option value="3">Második elemet</option>
            </select>
            <br>
        <label for="ipaddress" class="mt-3">Terem IP címzése: </label><br>
        <input type="text" name="ipaddress" id="ipaddress" placeholder="172.16.0.0" required> <br>
        <label for="terem_nev" class="mt-3">Terem megnevezése: </label><br>
        <input type="text" name="terem_nev" id="terem_nev" placeholder="pl: Tanári, Tanterem" required> <br>
        <label for="terempic" class="mt-3">Terem képe: </label> <br>
        <input type="file" name="terempic" id="terempic" class="btn btn-secondary" required>
        <div class="text-justify"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
          </svg> 
        Kép feltöltésekor kérem figyeljen oda, hogy a kép fájlneve megegyezzen a terem számával, illetve a fájlformátum .jpg legyen.<br>
        Például: 225-ös terem esetében egy 225.jpg fájl kerüljön feltöltésre.
        </div>

    </fieldset>

    <button type="submit" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
        </svg>
        Feltöltés
    </button>



</form>

@endsection
