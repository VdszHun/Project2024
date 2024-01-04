@extends('layouts.master')
@section('title', "Főoldal")
@section('content')

<div>
    <h1>Füstérzékelő 1</h1>

    <div class="table-responsive">
        <table class="table table-primary table-stripped table-hover">
            <tr>
                <th>Id</th>
                <th>Légminőség</th>
                <th>Hőmérséklet</th>
                <th>Páratartalom</th>
                <th>Mérés ideje</th>
            </tr>
            @foreach ($fusterzekelo1 as $fust1)
            <tr>
                <td>{{$fust1->f1_id}}</td>
                <td>{{$fust1->f1_legminoseg}}</td>
                <td>{{$fust1->f1_hofok}} &deg;C</td>
                <td>{{$fust1->f1_paratartalom}}%</td>
                <td>{{$fust1->f1_meres_ideje}}</td>
            </tr>
            @endforeach

        </table>

        {{$fusterzekelo1->links() }}
    </div>
</div>

@endsection