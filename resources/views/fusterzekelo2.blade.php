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

@endsection