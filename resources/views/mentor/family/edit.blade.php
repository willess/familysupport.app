@extends('layouts.app')

@section('content')

    {{ $family }}

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Voeg een nieuwe familie toe!
            </div>
            <div class="panel-body">

                {!! Form::open(['url' => 'mentor/families/'.$family->id, 'method' => 'put', 'class' => 'form-horizontal']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Familienaam', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('name', $family->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Land', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('country', $family->country, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Stad / gebied', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::text('city', $family->city, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('parents', 'Aantal ouders', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('parents', ['1' => '1', '2' => '2'], $family->parents, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('children', 'Aantal kinderen', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::select('children', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'], $family->children, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('about', 'Over de familie', ['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-6">
                        {!! Form::textarea('about', $family->about, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('Wijzig', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

                {{--<form class="form-horizontal" role="form" method="post" action="{{ url('mentor/families/'.$family['id']) }}">--}}
                    {{--{{ csrf_field() }}--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="col-md-4 control-label">Familienaam</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<input id="name" type="text" class="form-control" name="name" value="{{ $family['name'] }}" required autofocus>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="country" class="col-md-4 control-label">Land</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<input id="name" type="text" class="form-control" name="country" value="{{ $family['country'] }}" required autofocus>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="city" class="col-md-4 control-label">Stad / Gebied</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<input id="name" type="text" class="form-control" name="city" value="{{ $family['city'] }}" required autofocus>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="col-md-4 control-label">Aantal ouders</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<select class="form-control"  name="parents" required autofocus>--}}
                                {{--<option value=value="{{ $family['parents'] }}">{{ $family['parents'] }}</option>--}}
                                {{--<option value="1">1</option>--}}
                                {{--<option value="2">2</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="col-md-4 control-label">Aantal kinderen</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<select class="form-control" name="children" required autofocus>--}}
                                {{--<option value=value="{{ $family['children'] }}">{{ $family['children'] }}</option>--}}
                                {{--<option value="1">1</option>--}}
                                {{--<option value="2">2</option>--}}
                                {{--<option value="3">3</option>--}}
                                {{--<option value="4">4</option>--}}
                                {{--<option value="5">5</option>--}}
                                {{--<option value="6">6</option>--}}
                                {{--<option value="7">7</option>--}}
                                {{--<option value="8">8</option>--}}
                                {{--<option value="9">9</option>--}}
                                {{--<option value="10">10</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label for="name" class="col-md-4 control-label">Over de familie</label>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<textarea class="form-control" id="name" name="about" required autofocus>{{ $family['about'] }}--}}

                            {{--</textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-6 col-md-offset-4">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--Wijzig--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</form>--}}
            </div>
        </div>
    </div>


@endsection
