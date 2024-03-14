@extends('layouts.app')
@section('content')

<div class="text-center my-4">
    <h1>Modifica Piatto {{$dish -> name}}</h1>
    <a class="btn btn-primary mb-2" href="{{route ('dish.show', $dish -> id) }}">Torna ai dettagli del piatto</a>
</div>

<form action="{{route('dish.update', $dish -> id)}}" method="POST" class="container text-center">

    @csrf
    @method('PUT')

    <div class="shadow-sm card w-50 mx-auto mt-4">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Nome del Piatto</strong></label>
                <input type="text" class="form-control" name="name" placeholder="Inserisci il nome del Piatto" value="{{ $dish -> name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Descrizione del Piatto</strong></label>
                <input type="text" class="form-control" name="description" placeholder="inserisci la descrizione del tuo Piatto" value="{{ $dish -> description }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"><strong>Inserisci il prezzo del Piatto in &euro;</strong></label>
                <input type="number" class="form-control" name="price" placeholder="Inserisci il prezzo del Piatto" value="{{ $dish -> price }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"><strong>inserisci l'immagine del tuo Piatto</strong></label>
                <input type="file" class="form-control" name="image" placeholder="Scegli un file" value="{{ $dish -> image }}">
            </div>
        </div>
    </div>

    <input class="my-1 btn btn-warning mt-4" type="submit" value="Modifica">
</form>

@endsection