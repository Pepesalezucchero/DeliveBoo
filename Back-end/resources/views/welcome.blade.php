@extends('layouts.app')
@section('content')

<h1 class="text-center">HOMEPAGE</h1>
<p class="ms-2">Per vedere il tuo ristorante accedi qui</p>
<a class="btn btn-primary ms-2" href="{{route('login')}}">Accedi</a>

<p class="mt-2 ms-2">Per creare il tuo profilo da ristoratore e aggiungere il tuo ristorante registrati qui</p>
<a class="btn btn-primary ms-2" href="{{route('register')}}">Registrati</a>

{{-- mettere una landin page in cui si spiega come funziona deliverro per un ristoratore --}}
@endsection