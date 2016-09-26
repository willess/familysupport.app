@extends('layouts.app')

@section('content')


    @if(Auth::user()->mentor_accepted == true)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard van <span>{{ Auth::user()->first_name }}</span></div>
                        <div class="panel-body">
                        Welkom bij jouw dashboard {{ Auth::user()->first_name }}. Op deze pagina heb je een overzicht van alle functies. Je vindt er een overzicht van jouw familie(s) die je steunt. Wanneer je beslist om nog een familie te steunen kun je uit een lijst kiezen om nog een familie te steunen. Ook kun je je profiel aanpassen. Super bedankt voor uw steun!
                        </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Beheer Families
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Voeg een nieuwe familie toe
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Mijn gegevens wijzigen/inzien
                    </div>
                </div>
            </div>
        </div>

        @else
            <div class="alert alert-danger" role="alert">
                Je gegevens zijn nog niet gecontroleerd en/of je bent niet geschikt hiervoor!
            </div>
        @endif

    <h3>Jouw Gegevens:</h3>
    <p>naam: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </p>
    <p>Adres: {{ Auth::user()->address }} {{ Auth::user()->housenumber }}</p>
    <p>Postcode: {{ Auth::user()->zip }} {{ Auth::user()->city }}</p>
    <p>E-mail: {{ Auth::user()->email }}</p>
    <p>Organisatie: {{ Auth::user()->organisation }}</p>
    <p>Land: {{ Auth::user()->country }}</p>

@endsection
