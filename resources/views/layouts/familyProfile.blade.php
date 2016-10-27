@extends('layouts.app')

@section('content')

    @yield('familyprofile')

                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1>Aanvragen</h1>
                            </div>
                            @foreach($demands as $demand)

                            @if($demand->accepted)
                            <h2 class="bg-success">{{ $demand->text }}</h2>
                        @else
                            <h2 class="bg-danger">{{ $demand->text }}</h2>
                        <a href="{{ url('demand/accept/'.$demand->id) }}">
                            @if(Auth::user()->mentor == false)
                                <button type="button" class="btn btn-success">
                                    Accepteer
                                </button>
                            @endif
                        </a>
                            @endif
                        @endforeach

                        </div>
                    </div>
                </div>



    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <hr />
            <p>Hier komt de profielfoto van de familie!!!</p>
            <hr />
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $family['name'] }}</h1>
                </div>
                <div class="panel-body">
                    <p>Deze familie bestaat uit <b>{{ $family['parents'] }}</b> ouder(s) met <b>{{ $family['children'] }}</b> @if($family['children'] > 1 || $family['children'] == 0) kinderen. @else kind. @endif Zij wonen met z'n allen in de stad <b>{{ $family['city'] }}</b> in <b>{{ $family['country'] }}</b>.</p>
                    <p>{{ $family['about'] }}</p>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <hr />
            <p>Hier komen 5 foto's van de familie</p>
            <hr />
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Updates</h1>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $post['title'] }}</h2>
                        <p class="created">Toegevoegd: {{ $post['created_at'] }}</p>
                    </div>
                    <div class="panel-body">
                        {{ $post['body'] }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
