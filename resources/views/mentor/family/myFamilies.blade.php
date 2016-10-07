@extends('layouts.app')

@section('content')

@foreach($myFamilies as $family)

    <div class="row">
        <div class="col-md-8 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $family->name }}</h1>
                    <p class="created">Toegevoegd: {{ $family->created_at }}</p>
                    <ul>
                        <li>Aantal ouders: {{ $family->parents }}</li>
                        <li>Aantal kinderen: {{ $family->children }}</li>
                    </ul>
                    <p>{{ $family->about }}</p>
                    <a href="{{ url('/mentor/families/'.$family->id) }}">
                        <button type="button" class="btn btn-primary">
                            Profiel updaten
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endforeach

@endsection
