@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">

    <h1 class="text-center">Főoldal</h1>

</div>



<div class="row">
  <div class="col-6">
    Alagsor <br>


    @for ($i = 1; $i <= 10; $i++)

        <div class="col-sm-12 col-md-3 my-3 mx-3" style="float: left; ">
          <a class="fooldal_link_no_deco" href="./fusterzekelo2/1">

            <div class="card eotvos_leftmenu" style="width: 12rem; ">
              <img src="{{asset('storage/teremkepek/1.jpg')}}" class="card-img-top" title="terem: 047" alt="terem: 047">
              <div class="card-body">
                <p class="card-text"><h4>TEREM: {{$mainpage->h_id[0]}}</h4><br/>Női mosdó</p>
              </div>
            </div>
          </a>
        </div>

    @endfor




  </div>
  <div class="col-6">
    Főld szint
  </div>
  <div class="col-6">Első emelet</div>
  <div class="col-6">Második emelet</div>
</div>



<br>

<table class="table table-striped table-bordered table-responsive ">
    <tr>
        <td>
            <h3>Alagsor</h3>

            <div class="row">


              <div class="col-smb-12 col-md-3 mb-3">
                  <a class="fooldal_link_no_deco" href="./fusterzekelo2/1">

                    <div class="card eotvos_leftmenu" style="width: 12rem;">
                      <img src="imgs/terem_alks_048.jpg" class="card-img-top" title="terem: 047" alt="terem: 047">
                      <div class="card-body">
                        <p class="card-text"><h4>TEREM: 047</h4><br/>Női mosdó</p>
                      </div>
                    </div>
                  </a>
              </div>


              <div class="col-smb-12 col-md-3 mb-3">
                <a class="fooldal_link_no_deco" href="./fusterzekelo2/1">

                  <div class="card eotvos_leftmenu" style="width: 12rem;">
                    <img src="imgs/terem_alks_048.jpg" class="card-img-top" title="terem: 047" alt="terem: 047">
                    <div class="card-body">
                      <p class="card-text"><h4>TEREM: 047</h4><br/>Női mosdó</p>
                    </div>
                  </div>
                </a>
              </div>


              <div class="col-smb-12 col-md-3 mb-3">
                <a class="fooldal_link_no_deco" href="./fusterzekelo2/1">

                  <div class="card eotvos_leftmenu" style="width: 12rem;">
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




            </div>

        </td>
    </tr>
    <tr>
        <td>
            <h3>Első elemet</h3>



          </div>

        </td>
        <td>
            <h3>Második elemet</h3>

            <div class="row">



          </div>

        </td>
    </tr>
</table>

@endsection
