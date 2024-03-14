@extends('layouts.app')
@section('content')

    <div class="text-center my-4">
        <h1>Nuovo Ristorante</h1>
        <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai Ristoranti</a>
    </div>

    <form action="{{route('restaurant.store')}}" method="POST" class="container text-center">

        @csrf
        @method('POST')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nome Ristorante</strong></label>
                    <input type="text" class="form-control" name="name" placeholder="Inserisci Nome Ristorante">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"><strong>Indirizzo del tuo ristorante</strong></label>
                    <input type="text" class="form-control" name="address" placeholder="inserisci l'indirizzo del tuo ristorante">
                </div>
                <div class="mb-3">
                    <label for="vat_number" class="form-label"><strong>inserisci la partita IVA</strong></label>
                    <input type="text" class="form-control" name="vat_number" placeholder="Inserisci la tua partita IVA">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"><strong>inserisci l'immagine del tuo Ristorante</strong></label>
                    <input type="file" class="form-control" name="image" placeholder="Scegli un file">
                </div>
            </div>
        </div>

        <input class="my-1 btn btn-success mt-4" type="submit" value="Crea">
    </form>
@endsection