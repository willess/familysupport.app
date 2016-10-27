@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Nieuwe aanvraag
            </div>
            <div class="panel-body">
    {!! Form::open(['url' => 'demand/store/'.$id, 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('text', 'De aanvraag', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
            </div>
        </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Aanvraag doen', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
