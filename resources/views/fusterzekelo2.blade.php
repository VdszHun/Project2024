@extends('layouts.master')
@section('title', $fusterzekelo->terem_descript.' '.$fusterzekelo->terem_szam)
@section('content')

<div>

    <div class="container-fluid mb-4 eotvos_leftmenu">

        <h1 class="text-center">{{$fusterzekelo->terem_descript}} {{$fusterzekelo->terem_szam}}</h1>

    </div>

    <div class="row">
        <div class="col-md-4 col-sm-12">

            <img src="{{asset('storage/teremkepek/'.$fusterzekelo->terem_szam.'.jpg')}}" alt="terem tervrajz" title="terem tervrajz" srcset="" class="img img-fluid rounded mb-4 ">

        </div>

        <div class="col-md-1 col-sm-12">


            <button type="button" id="bekapcs" class="btn btn-danger mb-3 w-100"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wifi-off" viewBox="0 0 16 16">
                <path d="M10.706 3.294A12.6 12.6 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4q.946 0 1.852.148zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.45 8.45 0 0 1 3.51-1.27zm2.596 1.404.785-.785q.947.362 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.5 8.5 0 0 0-1.98-.932zM8 10l.933-.933a6.5 6.5 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.53.53 0 0 1-.611.09A5.5 5.5 0 0 0 8 10m4.905-4.905.747-.747q.886.451 1.685 1.03a.485.485 0 0 1 .047.737.52.52 0 0 1-.668.05 11.5 11.5 0 0 0-1.811-1.07M9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A2 2 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75z"/>
              </svg>Leállítás</button><br>
            <button type="button" id="testled" class="btn btn-info mb-3 w-100"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">

                <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
              </svg>Teszt LED</button>


        </div>

        <div class="col-md-4 col-sm-12">

            <div class="m-2 text-center bg-secondary rounded-start p-4 text-white">
                <h6>Táblázat színjelentések:</h6>

                <div class="row justify-content-center">
                    <div class="col-3 border border-dark">Hibás adatmérés: <div class="bg-warning text-warning my-2">--</div></div>
                    <div class="col-3 border border-dark">Magas érték: <div class="bg-danger text-danger my-2">--</div></div>
                    <div class="col-3 border border-dark">Alacson érték: <div class="bg-info text-info my-2">--</div></div>
                    <div class="col-3 border border-dark">Határon belüli: <div class="bg-success text-success my-2">--</div></div>
                </div>

            </div>

        </div>

        <div class="col-md-3 col-sm-12">

            <div class="m-2 text-center eotvos_leftmenu rounded-start p-2">

                <h6>Legutóbbi riasztás:</h6>

                    <div class="row bg-secondary m-2">
                        <div class="col-6">
                            <div>

                                Hőmérséklet:

                                @foreach ($fusterzekelodata_riaszt1 as $egy)
                                    {{$egy->homerseklet}}
                                @endforeach
                                <br>

                                Páratartalom:

                                @foreach ($fusterzekelodata_riaszt2 as $egy)
                                    {{$egy->paratartalom}}
                                @endforeach

                            </div>

                        </div>
                        <div class="col-6">
                            Dátum és idő: <br>
                            2024-02-26 14:54:51
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

            <h4>A/az {{$fusterzekelo->terem_descript}} {{$fusterzekelo->terem_szam}} füstérzékelőjének adatai</h4>
            <div class="table-responsive">
                <table class="table table-dark table-stripped table-hover text-center">
                    <tr>
                        <th class="text-white bg-dark">Légminőség </th>
                        <th class="text-white bg-dark">Hőmérséklet</th>
                        <th class="text-white bg-dark">Páratartalom</th>
                        <th class="text-white bg-dark">Mérés ideje</th>
                    </tr>
                    @foreach ($fusterzekelodata as $egymeres)




                    <tr>

                        @if ($egymeres->hibakod > 1 && $egymeres->ppm == -99)
                            <td class="bg-warning text-dark">Hiba</td>
                        @elseif($egymeres->ppm > $maxppm)
                            <td class="bg-danger">{{$egymeres->ppm}} ppm</td>
                        @else
                            <td class="bg-success">{{$egymeres->ppm}} ppm</td>
                        @endif


                        @if ($egymeres->hibakod > 0 && $egymeres->homerseklet == -99)
                            <td class="bg-warning text-dark">Hiba</td>
                        @elseif($egymeres->homerseklet > $maxhofok)
                            <td class="bg-danger">{{$egymeres->homerseklet}} &deg;C</td>
                        @else
                            <td class="bg-success">{{$egymeres->homerseklet}} &deg;C</td>
                        @endif

                        @if ($egymeres->hibakod > 0 && $egymeres->paratartalom == -99)
                            <td class="bg-warning text-dark">Hiba</td>
                        @elseif($egymeres->paratartalom > $maxsnedvesseg)
                            <td class="bg-danger">{{$egymeres->paratartalom}}%</td>
                        @else

                            @if ($egymeres->paratartalom < $maxszarazsag)
                                <td class="bg-info">{{$egymeres->paratartalom}}%</td>
                            @else
                                <td class="bg-success">{{$egymeres->paratartalom}}%</td>
                            @endif


                        @endif


                        <td class="bg-primary">{{$egymeres->meres_ideje}}</td>
                    </tr>




                    @endforeach

                </table>
            </div>
            {{$fusterzekelodata->links()}}
        </div>


        </div>
    </div>


    <script>

        $('#bekapcs').click(function() {
            var eszkoz_ip = '<?php echo $fusterzekelo->eszköz_ip; ?>';

            // Adatok összeállítása
            var data = {
                eszkoz_ip: eszkoz_ip
            };

            // AJAX kérés létrehozása
            $.ajax({
                url: '/Project2024/public/sensorbekapcs',
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify(data),
                success: function(response) {
                    console.log(response);
                    // Kezeld a választ itt, ha szükséges
                },
                error: function(xhr, status, error) {
                    console.error('Hiba:', error);
                }
            });
        });

        $('#testled').click(function() {
            var eszkoz_ip = '<?php echo $fusterzekelo->eszköz_ip; ?>';

            // Adatok összeállítása
            var data = {
                eszkoz_ip: eszkoz_ip
            };

            // AJAX kérés létrehozása
            $.ajax({
                url: '/Project2024/public/sensortest',
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify(data),
                success: function(response) {
                    console.log(response);
                    // Kezeld a választ itt, ha szükséges
                },
                error: function(xhr, status, error) {
                    console.error('Hiba:', error);
                }
            });
        });


    </script>

@endsection
