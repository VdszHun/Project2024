@extends('layouts.master')
@section('title', "Riasztások")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">

    <h1 class="text-center">Riasztások</h1>

</div>


    <div class="row col-md-7 m-4">
        <table class="table table-primary table-stripped table-hover text-center align-middle table-bordered">
            <tr>
                <th>Terem száma</th>
                <th>Terem szint</th>
                <th>Eszkőz Ip</th>
                <th>Riasztás ideje</th>

            </tr>

        @foreach ($riasztasok as $riasztas)
                <tr>
                    <dt>{{$riasztas->meres()->first()->terem_szam}}</dt>
                    <dt>{{$riasztas->meres()->first()->terem_szint}}</dt>
                    <dt>{{$riasztas->meres()->first()->eszkoz_ip}}</dt>
                    <dt>{{$riasztas->meres()->first()->meres_ideje}}</dt>
                </tr>

        @endforeach



        </table>
    </div>

@endsection
