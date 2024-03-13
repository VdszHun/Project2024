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
                <th>Riazstás észlelése</th>
                <th>Riasztás ideje</th>

            </tr>

        @foreach ($riasztasok as $riasztas)


        @if ($riasztas->homerseklet > $maxhofok)
            <tr>
                    <dt>{{$riasztas->helyszinek()->first()->terem_szam}}</dt>
                    <dt>{{$riasztas->helyszinek()->first()->terem_szint}}</dt>
                    <dt>{{$riasztas->helyszinek()->first()->eszkoz_ip}}</dt>
                    <dt>Magas hömérséklet



                    </dt>
                    <dt>{{$riasztas->meres_ideje}}</dt>
                </tr>


            @elseif ($riasztas->ppm > $maxppm)
            @endif

        @endforeach



        </table>



        {{$riasztasok->links()}}
    </div>

@endsection
