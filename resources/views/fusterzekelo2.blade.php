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
            @foreach ($homersekletek as $hom)
            <tr>
                <td>{{$hom->h_id}}</td>
                <td>{{$leg->legminoseg}}</td>
                <td>{{$hom->hofok}} &deg;C</td>
                <td>{{$hom->paratartalom}}%</td>
                <td>{{$hom->meres_ideje}}</td>
            </tr>
            @endforeach

        </table>

        {{$homersekletek->links() }}
    </div>
</div>

@endsection