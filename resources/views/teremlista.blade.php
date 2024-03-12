@extends('layouts.master')
@section('title', "Teremlista")
@section('content')

<div class="container-fluid mb-4 eotvos_leftmenu">

    <h1 class="text-center">Teremlista</h1>

</div>


    <div class="row col-md-7 m-4">
        <table class="table table-primary table-stripped table-hover text-center align-middle table-bordered">
            <tr>
                <th>Terem #ID</th>
                <th>Teremszám</th>
                <th>Teremszint</th>
                <th>Eszköz IP</th>
                <th>Módosítás</th>
                <th>Törlés</th>
            </tr>

            @foreach ($termek as $terem)

                <tr>
                    <td>{{$terem->h_id}}</td>
                    <td>{{$terem->terem_szam}}</td>
                    <td>{{$terem->terem_szint}}</td>
                    <td>{{$terem->eszköz_ip}}</td>
                    <td><button type="button" class="btn btn-info" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                            <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11z"/>
                        </svg>
                        Módosítás
                    </button></td>
                    <td><button type="button" class="btn btn-danger" id="torlesGomb_{{$terem->h_id}}" onclick="torles({{$terem->h_id}});">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>

                        Törlés
                    </button></td>
                </tr>

            @endforeach



        </table>
    </div>

    <script>

        function torles(h_id){
            $.ajax({
                url:"./teremtorles",
                type: "POST",
                cache: false,
                async:false,
                data:{"h_id":h_id},
                headers: { // Helyes fejlécnév
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend:function(){
                    $("#torlesGomb_"+h_id).attr("disable",true);
                    $("#torlesGomb_"+h_id).html("Folyamatban...");
                },
                success:function(data){
                    if(data.error ==false){
                        $("#sor_"+h_id).remove();
                    }else{
                        $("#torlesGomb_"+h_id).attr("disable",false);
                        $("#torlesGomb_"+h_id).html("Törlés");
                    }

                }

            });
        }

    </script>

@endsection
