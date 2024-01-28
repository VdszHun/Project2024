@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">
    
    <h1 class="text-center">Főoldal</h1>

</div>

<table class="table table-striped table-bordered table-responsive ">
    <tr>
        <td>
            <h3>Alaksor</h3>

            <div class="row">

                <div class="col-sm-12 col-md-8 col-lg-3 m-5">

                    <a href="{{route('fusterzekelo1')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="{{asset('IMGS/terem_alks_048.jpg')}}" class="card-img-top" title="terem: 048" alt="terem: 048">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 048</h4><br/>Fiú mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
                <div class="col-sm-12 col-md-8 col-lg-3 m-5">
                 
                    <a href="{{route('fusterzekelo2')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="imgs/terem_alks_048.jpg" class="card-img-top" title="terem: 047" alt="terem: 047">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 047</h4><br/>Női mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
            
            
            </div>

        </td>
        <td>
            <h3>Főldszint</h3>

            <div class="row">

                <div class="col-sm-12 col-md-8 col-lg-3 m-5">

                    <a href="{{route('fusterzekelo1')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="{{asset('IMGS/terem_alks_048.jpg')}}" class="card-img-top" title="terem: 048" alt="terem: 148">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 048</h4><br/>Fiú mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
                <div class="col-sm-12 col-md-8 col-lg-3 m-5">
                 
                    <a href="{{route('fusterzekelo2')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="imgs/terem_alks_048.jpg" class="card-img-top" title="terem: 047" alt="terem: 147">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 047</h4><br/>Női mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
                <div class="col-sm-12 col-md-8 col-lg-3 m-5">

                    <a href="{{route('fusterzekelo1')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="{{asset('IMGS/terem_alks_048.jpg')}}" class="card-img-top" title="terem: 048" alt="terem: 108">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 048</h4><br/>Fiú mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
                <div class="col-sm-12 col-md-8 col-lg-6 m-5">
                 
                    <a href="{{route('fusterzekelo2')}}">
                    <div class="card eotvos_leftmenu" style="width: 18rem;">
                        <img src="imgs/terem_alks_048.jpg" class="card-img-top" title="terem: 047" alt="terem: 107">
                        <div class="card-body">
                          <p class="card-text"><h4>TEREM: 047</h4><br/>Női mosdó</p>
                        </div>
                      </div>
                    </a>

                </div>
            
            
            </div>

        </td>
    </tr>
    <tr>
        <td>
            <h3>Első elemet</h3>

        </td>
        <td>
            <h3>Második elemet</h3>
        </td>
    </tr>
</table>

@endsection