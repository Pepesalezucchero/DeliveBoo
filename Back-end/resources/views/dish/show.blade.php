@extends('layouts.app')
@section('content')

    <h1 class="text-center">Piatto {{$dish -> name}}</h1>
    <div class="text-center">
        <a class="btn btn-primary my-3" href="{{route('restaurant.show', $restaurant -> id)}}">Torna ai dettagli del ristorante</a>
    </div>
    <div class="container text-center mb-2">
        <div class="card w-50 mx-auto mt-3">
            <div class="card-body p-0">

                <img class="card-img-top" src="{{ asset('storage/' . $dish -> image) }}" alt="(descrizione immagine piatto: {{ $dish -> name }})">

                <span class="d-block my-1"><strong>Prezzo: </strong>{{ $dish -> price }}&euro;</span>
                <p class="my-1"><strong>Descrizione: </strong>{{ $dish -> description }}</p>
                <p  class="my-1"><strong>Disponibile: </strong>
                    @if($dish -> visible == 1)
                    Si
                    @else
                        No
                    @endif
                </p>
                <div class="text-center my-4">
                    <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                    
                        <input type="submit" value="Cancella Piatto" class="btn btn-danger mt-2">
                    </form>
                    <a class="btn btn-warning mt-2" href="{{route('dish.edit', $dish -> id)}}">Modifica Piatto</a>
                    <div class="text-center">
                        <a class="btn btn-primary mt-2" href="{{route('restaurant.show', $restaurant -> id)}}">Torna ai dettagli del ristorante</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection