@extends('layouts.app')
@section('content')

<div class="text-center my-4">
    <h1>Modifica piatto {{$dish -> name}}</h1>
    <a class="btn btn-primary mb-2" href="{{route ('dish.show', $dish -> id) }}">Torna ai dettagli del piatto</a>
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

<form action="{{route('dish.update', $dish -> id)}}" method="POST" class="container text-center" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="shadow-sm card w-50 mx-auto mt-4">
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label"><strong>Nome del piatto</strong></label>
                <input type="text" class="form-control" name="name" placeholder="Inserisci il nome del Piatto" value="{{ $dish -> name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><strong>Descrizione del piatto</strong></label>
                <input type="text" class="form-control" name="description" placeholder="inserisci la descrizione del tuo Piatto" value="{{ $dish -> description }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label"><strong>Modifica il prezzo del piatto in &euro;</strong></label>
                <input type="text" class="form-control" name="price" placeholder="Inserisci il prezzo del Piatto" value="{{ $dish -> price }}">
            </div>

            <div class="mb-3">
                <label for="visible" class="form-label"><strong>Modifica la disponibilità del piatto</strong></label>
                <select name="visible" id="visible" class="form-control">
                    <option value="1" selected>Si</option>
                    <option value="0">No</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="image" class="form-label"><strong>Modifica l'immagine del tuo piatto</strong></label>
                <input type="file" class="form-control" name="image" placeholder="Scegli un file" value="{{ $dish -> image }}" accept="image/*">
            </div>
        </div>
    </div>

    <input class="my-1 btn btn-warning mt-4" type="submit" value="Modifica">
</form>

@endsection