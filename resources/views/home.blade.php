@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard van <span>{{ Auth::user()->first_name }}</span></div>

                <div class="panel-body">
                    Welkom bij jouw dashboard {{ Auth::user()->first_name }}. Op deze pagina heb je een overzicht van alle functies. Je vindt er een overzicht van jouw familie(s) die je steunt. Wanneer je beslist om nog een familie te steunen kun je uit een lijst kiezen om nog een familie te steunen. Ook kun je je profiel aanpassen. Super bedankt voor uw steun!
                </div>
            </div>

            <h3>Jouw Gegevens:</h3>
            <p>naam: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </p>
            <p>Adres: {{ Auth::user()->address }} {{ Auth::user()->housenumber }}</p>
            <p>Postcode: {{ Auth::user()->zip }} {{ Auth::user()->city }}</p>
            <p>E-mail: {{ Auth::user()->email }}</p>

        </div>
    </div>
</div>
@endsection
