@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <hr />
            <p>Hier komt de profielfoto van de familie!!!</p>
            <hr />
        </div>
    </div>


    @foreach($demands as $demand)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if($demand->accepted)
                    <h2 class="bg-success">{{ $demand->text }}</h2>
                    @else
                    <h2 class="bg-danger">{{ $demand->text }}</h2>
                @endif
            </div>
        </div>

        @endforeach

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <a href="{{ url('/demand/create/'.$family->id) }}">
                <button type="button" class="btn btn-success">
                    Aanvraag doen
                </button>
            </a>
            <a href="{{ url('/demand/'.$family->id) }}">
                <button type="button" class="btn btn-primary">
                    Bekijk aanvragen
                </button>
            </a>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('/mentor/families/'.$family->id.'/edit') }}">
                        <button type="button" class="btn btn-primary">
                            Wijzig
                        </button>
                    </a>
                    <a href="{{ url('mentor/families/'.$family->id.'/delete') }}">
                        <button class="btn btn-danger">
                            Verwijder
                        </button>
                    </a>
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

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group">
                <a href="{{ url('mentor/families/post/'.$family->id) }}">
                    <button class="btn btn-success">Voeg een update toe +</button>
                </a>
            </div>
        </div>
    </div>

    @foreach($posts as $post)

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('mentor/families/post/'.$post->id).'/edit' }}">
                        <button class="btn btn-primary">Wijzig</button>
                    </a>
                    <a href="{{ url('mentor/families/post/'.$post->id).'/delete' }}">
                        <button class="btn btn-danger">Verwijder</button>
                    </a>
                    {!! Form::open(['url' => 'mentor/families/post/switch/'.$post->id, 'class' => 'ds']) !!}
                    {{--<form id="switch" action="{{ url('mentor/families/post/switch/'.$post->id) }}" method="post">--}}
                    {{--<input type="checkbox" @if($post->show == true) checked @endif>--}}
                    {{--<div class="slider round"></div>--}}
                    <div class="btn-group btn-toggle onOff">
                        <button type="submit" class="btn btn-lg btn-default @if($post->show == true)btn-primary active @endif">ON</button>
                        <button type="submit" class="btn btn-lg btn-default @if($post->show == false)btn-primary active @elseif(1 == 1) @endif">OFF</button>
                    </div>

                    {{--{!! Form::submit('On', ['class' => 'test']) !!}--}}
                    {!! Form::close() !!}
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
