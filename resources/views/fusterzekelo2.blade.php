@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div>

    <div class="container-fluid mb-4 eotvos_leftmenu">
    
        <h1 class="text-center">Füstérzékelő #({{$fusterzekelo->h_id}})</h1>
    
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12">
        
            <img src="{{asset('IMGS/terem_alks_.jpg')}}" alt="terem terv rajz" title="terem terv rajz" srcset="" class="img img-fluid rounded mb-4">
        
        </div>
        <div class="col-md-6 col-sm-12">

            <div class="m-2 text-center eotvos_leftmenu rounded-start p-2">

                <h6>Leguttóbi riaszás:</h6>

                    <div class="row bg-secondary m-2">
                        <div class="col-md-4">
                            Dátúm és idő: <br>
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

                <h6>Leguttóbi hiba jelzés: </h6>

                <div class="row bg-secondary m-2">
                    <div class="col-md-4">
                        Dátúm és idő: <br>
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
        <div class="col-md-6 col-sm-12">

            <h4>Az első érzékelő adatai</h4>
            <div class="table-responsive">
                <table class="table table-primary table-stripped table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Légminőség</th>
                        <th>Hőmérséklet</th>
                        <th>Páratartalom</th>
                        <th>Mérés ideje</th>
                    </tr>
                    @foreach ($fusterzekelo->meresek as $egymeres)
                    <tr>
                        <td>{{$egymeres->m_id}}</td>
                        <td>{{$egymeres->h_id}}</td>
                        <td>{{$egymeres->ppm}} &deg;C</td>
                        <td>{{$egymeres->paratartalom}}%</td>
                        <td>{{$egymeres->meres_ideje}}</td>
                    </tr>
                    @endforeach
        
                </table>
        
            </div>

        </div>

            
        </div>
    </div>





@endsection