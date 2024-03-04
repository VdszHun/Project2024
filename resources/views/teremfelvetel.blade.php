@extends('layouts.master')
@section('title', "Terem hozzá adás")
@section('content')

<form method="POST" action="" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid mb-4 eotvos_leftmenu">

        <h1 class="text-center">Terem felvétel</h1>

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
