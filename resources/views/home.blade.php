@extends('layouts.app')

@section('content')
@section('mnu-home', 'active')
<div class="container">


    <div class="row mt-4">

        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Virtual Office - program do obsługi korespondencji wersja 0.5</div>
            <div class="card-body">
                <h5 class="card-title">Przeznaczenie</h5>
                <p class="card-text">
                    Program przeznaczony dla podmiotów oferujących usługę Wirtualne Biuro.<br>
                    Firmy korzystające z usługi, korzystają z wirtualnego adresu do korespondencji.
                    Na adres Wirtualnego Biura trafia duża ilość przesyłek pocztowych, przeznaczonych
                    dla różnych odbiorców.<br>
                    Przesyłki te należy rejestrować, powiadamiać odbiorców o nadejścciu korespondencji,
                    wydawać przesyłki za pisemnym potwierdzeniem.
                </p>
                <h5 class="card-title">Technologia</h5>
                <p class="card-text">
                    Oprogramowanie wykorzystuje:
                    <ul>
                    <li>Framework php Laravel (wersja 5.6)</li>
                    <li>Bazę danych MySQl</li>
                    <li>AngularJS</li>
                    <li>JavaScript, jQuery</li>
                    <li>Bootstrap 4</li>
                </ul>

                </p>

            </div>
        </div>

    </div>



</div>
@endsection
