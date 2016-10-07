@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Voeg een nieuwe familie toe!
            </div>
            <div class="panel-body">

                {!! Form::open(['url' => 'mentor/families', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Familienaam', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Land', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('country', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Stad / gebied', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('parents', 'Aantal ouders', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('parents', ['1' => '1', '2' => '2'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('children', 'Aantal kinderen', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('children', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'], null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'Over de familie', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('Maak aan', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
