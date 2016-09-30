@extends('layouts.app')
@section('content')

    @if(!isset(Auth::user()->profile->organisation))
    {{--@if(Auth::user()->profile->organisation == '' || !isset(Auth::user()->profile->organisation))--}}
    {{-- als accepted == false en country en organisation zijn leeg --}}

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Om gebruik te kunnen maken moet je de volgende gegevens aanvullen. Vervolgens worden deze gecontroleerd. Wanneer deze zijn goedgekeurd kun je gebruik maken van de applicatie.
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vul je gegevens aan:</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/mentor/register') }}">
                        {{ csrf_field() }}
                        {{--<div class="panel-heading">Gegevens Organisatie</div>--}}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Organisatie</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="organisation" value="{{ old('organisation') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Land Organisatie</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Voeg toe!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @else
            <p>Wacht op controle!</p>

        @endif
    </div>

@endsection
