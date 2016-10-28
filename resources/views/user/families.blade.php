@extends('layouts.app')

@section('content')

    @if(Auth::user()->accept->accepts >= 3)

        <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <h1>Alle families</h1>
            <p>Bekijk de families en kies welke jij wil steunen.</p>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            {!! Form::open(['url' => 'search', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-md-6">
                    {!! Form::text('search', null,
                                           array('required',
                                                'class'=>'form-control',
                                                'placeholder'=>'Zoek naar families')) !!}
                </div>
                {!! Form::submit('Zoeken',
                           array('class'=>'btn btn-default')) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            {!! Form::open(['url' => 'filter', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-sm-2 col-xs-4">
                    {!! Form::select('parents',  ['1' => '1', '2' => '2'], null, array('placeholder' => 'Ouders', 'class' => 'form-control')) !!}
                </div>
                <div class="col-sm-2 col-xs-4">
                    {!! Form::select('children', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'], null, array('placeholder' => 'Kinderen', 'class' => 'form-control')) !!}
                </div>
                <div class="col-sm-2 col-xs-4">
                    {!! Form::submit('Filter', array('class' => 'btn btn-default')) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <div class="form-group">
                <div class="col-sm-2 col-xs-4">
                    <a href="{{ url('user/families') }}">
                        <button class="btn btn-default">Alle Families</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

        <hr />
        @if(count($families) > 0)
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
    @else

        <div class="row">
            <div class="col-md-10 col-lg-offset-1">
                <h1>Geen families gevonden....</h1>
            </div>
        </div>
    @endif

    @else

        <h1> Je hebt nog geen 5 aanvragen geaccepteerd, Waardoor we nog niet weten of je toe bent om nieuwe families te steunen! </h1>

    @endif

@endsection
