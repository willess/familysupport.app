@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nieuwe update voor familie:</div>
                <div class="panel-body">

                    {!! Form::open(['url' => 'mentor/families/post/'.$id, 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Titel', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Tekst', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Voeg nieuwe update toe', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}


                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/mentor/families/post/'.$id) }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="name" class="col-md-4 control-label">Titel</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="name" class="col-md-4 control-label">Tekst</label>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<textarea class="form-control" id="name" name="body" required autofocus>--}}

                            {{--</textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Voeg nieuwe update toe!--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                </div>
            </div>
        </div>


@endsection
