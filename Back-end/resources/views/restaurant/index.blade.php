@extends('layouts.app')

@section('content')

    <div class="text-center">
        @if (!Auth::user()->restaurant) {{-- Mostra il pulsante solo se l'utente non ha già un ristorante --}}
            <a class="btn btn-success mt-2 ms-2" href="{{ route('restaurant.create') }}">Crea un nuovo Ristorante</a>
        @endif
    </div>
    <div class="container text-center">
        @foreach ($restaurants as $restaurant)
            @if (Auth::user()->id == $restaurant->user_id) {{-- Mostra solo il ristorante dell'utente loggato --}}
            <div class="row justify-content-between align-items-center pt-5">
                <div class="col-md-12 col-lg-7">
                    <img class="card-img-top shadow" src="{{ asset('storage/' . $restaurant -> image) }}" alt="(immagine ristorante {{$restaurant -> name}})">
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="card-body text-center">
                        <h2 class="text-center py-sm-4">{{$restaurant -> name}}</h2>
                        <h6 class="card-text"><strong>Indirizzo: </strong>{{$restaurant -> address}}</h6>
                        <h6 class="card-text my-4"><strong>Partita IVA: </strong>{{$restaurant -> vat_number}}</h6>
                        <div class="typology d-flex justify-content-center">
                            <h6 class="card-text text-center me-1"><strong>Tipologie: </strong></h6>
                                @foreach ($restaurant -> typologies as $typology)
                            <div>
                                <h6 class="mx-1">#{{$typology -> name}}</h6>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <a class="btn btn-warning my-3" href="{{ route('restaurant.edit', $restaurant->id) }}">Modifica Ristorante</a>
                            </div>
                            <div class="col-sm-12 col-lg-4">
                                <a class="btn btn-success" href="{{route('dish.create')}}">Aggiungi un piatto</a>
                            </div>
                            <div class="col-sm-12 col-lg-4"></div>
                        </div>
                        <div class="text-center my-4">
                           
                        </div>
                        <div class="text-center my-4">
                            
                        </div>            
                    </div>
                    <div class="text-center">
                        <form id="deleteRestaurant" action="{{ route('restaurant.delete',$restaurant->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger my-3" type="submit" value="EliminaRistorante">
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <h2 class="text-center">I tuoi piatti:</h2>
                    @foreach ($restaurant -> dishes as $dish)
                    <div class="col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mt-4 ">
                        <div class="card mb-sm-5 mb-lg-2">
                            <div class="card-text text-center">
                                <img class="card-img-top " src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto {{$dish -> name}})">
                                <div class="card-text border-1">
                                    <h5 class="my-3"> {{$dish -> name}}</h5>  
                                </div>
                                    <a class="btn btn-primary mb-4" href="{{route ('dish.show', $dish -> id) }}">Mostra i dettagli del piatto</a>  
                            </div>
                        </div>
                    </div>
                    @endforeach
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