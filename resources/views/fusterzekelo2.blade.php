@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div>

    <div class="container-fluid mb-4 eotvos_leftmenu">
    
        <h1 class="text-center">Füstérzékelő #(terem száma)</h1>
    
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12">
        
            <img src="{{asset('IMGS/terem_alks_048.jpg')}}" alt="terem terv rajz" title="terem terv rajz" srcset="" class="img img-fluid rounded mb-4">
        
        </div>
        <div class="col-md-6 col-sm-12">

            <div class="m-2 text-center eotvos_leftmenu rounded-start p-2">

                <h6>Elg útóbbi adatatok első érzékelő</h6>

                <table class="table table-primary table-stripped table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Légminőség</th>
                        <th>Hőmérséklet</th>
                        <th>Páratartalom</th>
                        <th>Mérés ideje</th>
                    </tr>
                    <tr>
                        <td>{{$fusterzekelo2[0]->f2_id}}</td>
                        <td>{{$fusterzekelo2[0]->f2_legminoseg}}</td>
                        <td>{{$fusterzekelo2[0]->f2_hofok}} &deg;C</td>
                        <td>{{$fusterzekelo2[0]->f2_paratartalom}}%</td>
                        <td>{{$fusterzekelo2[0]->f2_meres_ideje}}</td>
                    </tr>
        
                </table>

                <h6>Elg útóbbi adatatok második érzékelő</h6>

                <table class="table table-primary table-stripped table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Légminőség</th>
                        <th>Hőmérséklet</th>
                        <th>Páratartalom</th>
                        <th>Mérés ideje</th>
                    </tr>
                    <tr>
                        <td>{{$fusterzekelo2[0]->f2_id}}</td>
                        <td>{{$fusterzekelo2[0]->f2_legminoseg}}</td>
                        <td>{{$fusterzekelo2[0]->f2_hofok}} &deg;C</td>
                        <td>{{$fusterzekelo2[0]->f2_paratartalom}}%</td>
                        <td>{{$fusterzekelo2[0]->f2_meres_ideje}}</td>
                    </tr>
        
                </table>

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
                    @foreach ($fusterzekelo2 as $fust2)
                    <tr>
                        <td>{{$fust2->f2_id}}</td>
                        <td>{{$fust2->f2_legminoseg}}</td>
                        <td>{{$fust2->f2_hofok}} &deg;C</td>
                        <td>{{$fust2->f2_paratartalom}}%</td>
                        <td>{{$fust2->f2_meres_ideje}}</td>
                    </tr>
                    @endforeach
        
                </table>
        
                {{$fusterzekelo2->links() }}
            </div>

        </div>
        <div class="col-md-6 col-sm-12">

            
            <h4>Az második érzékelő adatai</h4>
            <div class="table-responsive">
                <table class="table table-primary table-stripped table-hover text-center">
                    <tr>
                        <th>Id</th>
                        <th>Légminőség</th>
                        <th>Hőmérséklet</th>
                        <th>Páratartalom</th>
                        <th>Mérés ideje</th>
                    </tr>
                    @foreach ($fusterzekelo2 as $fust2)
                    <tr>
                        <td>{{$fust2->f2_id}}</td>
                        <td>{{$fust2->f2_legminoseg}}</td>
                        <td>{{$fust2->f2_hofok}} &deg;C</td>
                        <td>{{$fust2->f2_paratartalom}}%</td>
                        <td>{{$fust2->f2_meres_ideje}}</td>
                    </tr>
                    @endforeach

                </table>

                {{$fusterzekelo2->links() }}
            </div>
        </div>
            
        </div>
    </div>





@endsection