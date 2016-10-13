@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <h1>Alle families</h1>
            <p>Bekijk de families en kies welke jij wil steunen.</p>
        </div>
    </div>

    @foreach($families as $family)

        <div class="row">
            <div class="col-md-10 col-lg-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{ $family->name }}</h1>
                        <p class="created">Toegevoegd: {{ $family->created_at }}</p>
                        <ul>
                            <li>Aantal ouders: {{ $family->parents }}</li>
                            <li>Aantal kinderen: {{ $family->children }}</li>
                        </ul>
                        <p>{{ $family->about }}</p>
                        <a href="{{ url('family/'.$family->id) }}">
                            <button type="button" class="btn btn-primary">
                                Bekijk
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection
