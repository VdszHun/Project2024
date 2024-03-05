@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div>

    <div class="container-fluid mb-4 eotvos_leftmenu">

        <h1 class="text-center">Füstérzékelő #({{$fusterzekelo->terem_szam}})</h1>

    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12">

            <img src="{{asset('storage/teremkepek/'.$fusterzekelo->terem_szam.'.jpg')}}" alt="terem terv rajz" title="terem terv rajz" srcset="" class="img img-fluid rounded mb-4 ">

        </div>

        <div class="col-md-1 col-sm-12">

            <button type="button" class="btn btn-danger mb-3 w-100">Leállitás</button><br>
            <button type="button" class="btn btn-info mb-3 w-100">Test led</button>


        </div>

        <div class="col-md-7 col-sm-12">

            <div class="m-2 text-center eotvos_leftmenu rounded-start p-2">

                <h6>Legutóbbi riaszás:</h6>

                    <div class="row bg-secondary m-2">
                        <div class="col-md-4">
                            Dátum és idő: <br>
                            2024-02-26 14:54:51
                        </div>
                        <div class="col-md-4">
                            Terem: <br>
                            350
                        </div>
                        <div class="col-md-4">
                            Eszköz: <br>
                            192.168.82.4
                        </div>
                    </div>

                <h6>Legutóbbi hibajelzés: </h6>

                <div class="row bg-secondary m-2">
                    <div class="col-md-4">
                        Dátum és idő: <br>
                        2024-02-26 14:54:51
                    </div>
                    <div class="col-md-4">
                        Terem: <br>
                        350
                    </div>
                    <div class="col-md-4">
                        Eszköz: <br>
                        192.168.82.4
                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-12">

            <h4>Az érzékelő adatai</h4>
            <div class="table-responsive">
                <table class="table table-primary table-stripped table-hover text-center">
                    <tr>
                        <th>Légminőség</th>
                        <th>Hőmérséklet</th>
                        <th>Páratartalom</th>
                        <th>Mérés ideje</th>
                    </tr>
                    @foreach ($fusterzekelodata as $egymeres)
                    <tr>
                        <td>{{$egymeres->ppm}} ppm</td>
                        <td>{{$egymeres->homerseklet}} &deg;C</td>
                        <td>{{$egymeres->paratartalom}}%</td>
                        <td>{{$egymeres->meres_ideje}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
            {{$fusterzekelodata->links()}}
        </div>


        </div>
    </div>





@endsection
