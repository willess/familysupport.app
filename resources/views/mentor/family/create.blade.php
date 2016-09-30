@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Voeg een nieuwe familie toe!
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="{{ url('mentor/family/create') }}">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Familienaam</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="country" class="col-md-4 control-label">Land</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-md-4 control-label">Stad / Gebied</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Aantal kinderen</label>
                        <div class="col-md-6">
                            <select class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Over de familie</label>
                        <div class="col-md-6">
                            <textarea class="form-control" id="name" name="about">

                            </textarea>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
