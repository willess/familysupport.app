@extends('layouts.app')

@section('content')

    <p>Hier komt de profielfoto van de familie!!!</p>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $family['name'] }}</h1>
                </div>
                <div class="panel-body">
                    <p>Deze familie bestaat uit <b>{{ $family['parents'] }}</b> ouder(s) met <b>{{ $family['children'] }}</b> @if($family['children'] > 1 || $family['children'] == 0) kinderen @else kind @endif</p>
                    <p>{{ $family['about'] }}</p>

                </div>
            </div>
        </div>
    </div>

@endsection
