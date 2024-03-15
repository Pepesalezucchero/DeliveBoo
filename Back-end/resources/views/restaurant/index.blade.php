@extends('layouts.app')

@section('content')
    <h1 class="text-center">Il tuo Ristorante</h1>
    <div class="text-center">
        @if (!Auth::user()->restaurant) {{-- Mostra il pulsante solo se l'utente non ha già un ristorante --}}
            <a class="btn btn-success mt-2 ms-2" href="{{ route('restaurant.create') }}">Crea un nuovo Ristorante</a>
        @endif
    </div>
    <div class="container text-center">
        @foreach ($restaurants as $restaurant)
            @if (Auth::user()->id == $restaurant->user_id) {{-- Mostra solo il ristorante dell'utente loggato --}}
                <div class="card w-50 mx-auto mt-4">
                    <div class="card-header">
                        <h3>Ristorante: {{ $restaurant->name }}</h3>
                    </div>
                    <div class="card-body p-0">
                        <span><strong>Indirizzo: </strong>{{ $restaurant->address }}</span>
                        <div class="text-center">
                            <a class="btn btn-primary my-3" href="{{ route('restaurant.show', $restaurant->id) }}">Mostra i dettagli del ristorante</a>
                        </div>
                        <div class="text-center">
                            <form id="deleteRestaurant" action="{{ route('restaurant.delete', $restaurant->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger my-3" type="submit" value="Elimina Ristorante">
                            </form>
                            <a class="btn btn-warning my-3" href="{{ route('restaurant.edit', $restaurant->id) }}">Modifica Ristorante</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <script>
        document.getElementById("deleteRestaurant").addEventListener("submit", function(event) {
            const confirmation = confirm("Sei sicuro di voler cancellare il tuo ristorante?");
            if (!confirmation) {
                event.preventDefault();
            }
        });
    </script>
@endsection