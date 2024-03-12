@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">

    <h1 class="text-center">Főoldal</h1>

</div>

<div class="row">

    <div class="col-md-6 col-sm-12">
        <div class="m-2 text-center bg-secondary rounded-start p-4 text-white">
            <h6>Táblázat színjelentések:</h6>

            <div class="row justify-content-center">
                <div class="col-3 border border-dark">Hibás adatmérés: <div class="bg-warning text-warning my-2">--</div></div>
                <div class="col-3 border border-dark">Riasztási érték: <div class="bg-danger text-danger my-2">--</div></div>
                <div class="col-3 border border-dark">Alacsony érték: <div class="bg-info text-info my-2">--</div></div>
            </div>

        </div>
    </div>

    <div class="col-md-6 col-sm-12 table-responsive text-center">
        <div class="eotvos_leftmenu p-4">
            <h5>Legutóbbi riasztás</h4>
            <table class="table table-secondary">
                <tr>
                    <th>Terem száma</th>
                    <th>Eszköz IP</th>
                    <th>Terem szintje</th>
                    <th>Mérés Ideje</th>
                </tr>
                <tr>
                    <td>282</td>
                    <td>192.84.0.210</td>
                    <td>0</td>
                    <td>2024-02-26 14:54:51</td>
                </tr>
            </table>
        </div>

    </div>

</div>


<div class="row border border-secondary  text-white bg-dark">
  <div class="col-sm-12 col-md-6 border border-secondary">
        <h3 class="text-center">Alagsor</h3>


    @foreach ($alagsor as $egyalagsor)
    <div class="col-sm-12 col-md-3 my-3 mx-3" style="float: left; ">
      <a class="fooldal_link_no_deco" href="./fusterzekelo2/{{$egyalagsor->h_id}}">

        <div class="card eotvos_leftmenu" style="width: 12rem; ">
          <img src="{{asset('storage/teremkepek/'.$egyalagsor->terem_szam.'.jpg')}}" class="card-img-top" title="terem: {{$egyalagsor->terem_szam}}" alt="terem: {{$egyalagsor->terem_szam}}">
          <div class="card-body">
            <p class="card-text"><h4>TEREM: {{$egyalagsor->terem_szam}}</h4><br/>{{$egyalagsor->terem_descript}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach




  </div>
  <div class="col-sm-12 col-md-6 border border-secondary">
    <h3 class="text-center">Földszint</h3>

    @foreach ($foldszint as $egyfoldszint)
    <div class="col-sm-12 col-md-3 my-3 mx-3" style="float: left; ">
        <a class="fooldal_link_no_deco" href="./fusterzekelo2/{{$egyfoldszint->h_id}}">

        <div class="card eotvos_leftmenu" style="width: 12rem; ">
          <img src="{{asset('storage/teremkepek/'.$egyfoldszint->terem_szam.'.jpg')}}" class="card-img-top" title="terem: {{$egyfoldszint->terem_szam}}" alt="terem: {{$egyfoldszint->terem_szam}}">
          <div class="card-body">
            <p class="card-text"><h4>TEREM: {{$egyfoldszint->terem_szam}}</h4><br/>{{$egyfoldszint->terem_descript}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>
  <div class="col-sm-12 col-md-6 border border-secondary">
    <h3 class="text-center">Első emelet</h3>

    @foreach ($elsoszint as $egyelsoszint)
    <div class="col-sm-12 col-md-3 my-3 mx-3" style="float: left; ">
        <a class="fooldal_link_no_deco" href="./fusterzekelo2/{{$egyelsoszint->h_id}}">

        <div class="card eotvos_leftmenu" style="width: 12rem; ">
          <img src="{{asset('storage/teremkepek/'.$egyelsoszint->terem_szam.'.jpg')}}" class="card-img-top " title="terem: {{$egyelsoszint->terem_szam}}" alt="terem: {{$egyelsoszint->terem_szam}}">
          <div class="card-body">
            <p class="card-text"><h4>TEREM: {{$egyelsoszint->terem_szam}}</h4><br/>{{$egyelsoszint->terem_descript}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>


  <div class="col-sm-12 col-md-6 border border-secondary">
    <h3 class="text-center">Második emelet</h3>

    @foreach ($masodikszint as $egymasodikszint)
    <div class="col-sm-12 col-md-3 my-3 mx-3" style="float: left; ">
        <a class="fooldal_link_no_deco" href="./fusterzekelo2/{{$egymasodikszint->h_id}}">

        <div class="card eotvos_leftmenu" style="width: 12rem; ">
          <img src="{{asset('storage/teremkepek/'.$egymasodikszint->terem_szam.'.jpg')}}" class="card-img-top" title="terem: {{$egymasodikszint->terem_szam}}" alt="terem: {{$egymasodikszint->terem_szam}}">
          <div class="card-body">
            <p class="card-text"><h4>TEREM: {{$egymasodikszint->terem_szam}}</h4><br/>{{$egymasodikszint->terem_descript}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>

</div>


@endsection
