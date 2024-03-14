@extends('layouts.app')
@section('content')

    <div class="card w-50 mx-auto my-4">
        <div class="card-header text-center">
            <h1 class="text-center">Ristorante {{$restaurant -> name}}</h1>
            <div class="text-center my-4">
                <a class="btn btn-success mt-2 ms-2" href="{{route('dish.create')}}">Crea un nuovo piatto</a>
            </div>
        </div>
        <div class="shadow-sm card-body text-center">
            <img class="card-img-top d-block" src="{{ asset('storage/' . $restaurant -> image) }}" alt="(immagine ristorante {{$restaurant -> name}})">
            <p class="card-text"><strong>Indizirizzo: </strong>{{$restaurant -> address}}</p>
            <span class="card-text d-block"><strong>Partita IVA: </strong>{{$restaurant -> vat_number}}</span>

            <h3 class="mt-3 mb-2">Piatti:</h3>
            @foreach ($restaurant -> dishes as $dish)
                <div class="card w-50 mx-auto mt-4">
                    <div class="card-text text-center">
                        <img class="card-img-top d-block" src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto {{$dish -> name}})">
                        <div class="card-text">
                            <h3>[ # ]<strong> {{$dish -> name}}</strong></h3>
                        </div>
                        <br>
                        <div class="text-center my-4">
                            <a class="btn btn-primary mb-2" href="{{route ('dish.show', $dish -> id) }}">Mostra i dettagli del piatto</a>
                            <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                        
                                <input type="submit" value="Cancella Piatto" class="btn btn-danger mt-2">
                            </form>
                            <a class="btn btn-warning mt-2" href="{{route('dish.edit', $dish -> id)}}">Modifica Piatto</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center">
                <a class="btn btn-primary mt-4" href="{{route('restaurant.index')}}">Torna ai tuoi Ristoranti</a>
            </div>
        </div>
    </div>

@endsection