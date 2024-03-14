@extends('layouts.app')
@section('content')

    <div class="text-center my-4">
        <h1>Modifica Ristorante {{$restaurant -> name}}</h1>
        <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai Ristoranti</a>
    </div>

    @if ($errors -> any())
        <div class="alert alert-danger">
            <ul class="list-inline">
                @foreach ($errors -> all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('restaurant.update', $restaurant -> id)}}" method="POST" class="container text-center">

        @csrf
        @method('PUT')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nome ristorante</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Inserisci Nome Ristorante" value="{{ $restaurant -> name }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"><strong>Indirizzo del tuo ristorante</strong></label>
                    <input type="text" class="form-control" name="address" placeholder="inserisci l'indirizzo del tuo ristorante" value="{{ $restaurant -> address }}">
                </div>
                <div class="mb-3">
                    <label for="vat_number" class="form-label"><strong>Inserisci la partita IVA</strong></label>
                    <input type="text" class="form-control" name="vat_number" placeholder="Inserisci la tua partita IVA" value="{{ $restaurant -> vat_number }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>Modifica l'immagine del tuo ristorante</strong></label>
                    <input type="file" class="form-control" name="image" placeholder="Scegli un file" value="{{ $restaurant -> image }}">
                </div>
            </div>
        </div>

        <input class="my-1 btn btn-warning mt-4" type="submit" value="Modifica">
    </form>

@endsection