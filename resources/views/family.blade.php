@extends('layouts.familyProfile')

@section('familyprofile')

    @if(Auth::user()->mentor == false && $family->supported == 0)

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="{{ url('user/support/'.$family->id) }}">
                    <button type="button" class="btn btn-success btn-lg">
                        Steun deze familie
                    </button>
                </a >
            </div>
        </div>
    @endif
    @endsection


