@extends('layouts.master')
@section('title', "Hibakódok")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">

    <h1 class="text-center">Hibák időbeli sorrendje</h1>

</div>


    <div class="row col-md-7 m-4">
        <table class="table table-primary table-stripped table-hover text-center align-middle table-bordered">
            <tr>
                <th>Mérés ID</th>
                <th>Teremszám</th>
                <th>Teremszint</th>
                <th>Eszköz IP</th>
                <th>Hiba ideje</th>
                <th>Hiba leírása</th>
                <th>Hibakód</th>

            </tr>

            @foreach ($hibak as $hiba)

                @if ($hiba->meresek->hibakod > 0)

                <tr>
                    <td>{{$hiba->meresek->m_id}}</td>
                    <td>{{$hiba->terem_szam}}</td>
                    <td>{{$hiba->terem_szint}}</td>
                    <td>{{$hiba->eszköz_ip}}</td>
                    <td>{{$hiba->meresek->meres_ideje}}</td>

                        @if ($hiba->hibakod == 1)
                            <td class="bg-info">Sikertelen páratartalom és hőmérskéklet beolvasás, ellenőrizd a kábeleket!</td>
                        @else
                            <td class="bg-white">Sikertelen levegőminőség beolvasás, ellenőrizd a kábeleket! </td>
                        @endif


                    <td>{{$hiba->hibakod}}</td>

                </tr>

                @endif

            @endforeach



        </table>
    </div>

@endsection
