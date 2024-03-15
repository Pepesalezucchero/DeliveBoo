@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $dish->restaurant->user_id)  
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
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
                        <div class="text-center my-4">
                            <a class="btn btn-warning my-3" href="{{ route('restaurant.edit', $restaurant->id) }}">Modifica Ristorante</a>
                        </div>
                        <div class="text-center my-4">
                            <a class="btn btn-success" href="{{route('dish.create')}}">Aggiungi un piatto</a>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai tuoi Ristoranti</a>
                        </div>
            
                    </div>
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
                                        {{-- [ # ] --}}
                                    </div>
                                    
                                    {{-- <div class="text-center my-4"> --}}
                                        <a class="btn btn-primary mb-4" href="{{route ('dish.show', $dish -> id) }}">Mostra i dettagli del piatto</a>
                                        {{-- <form action="{{ route('dish.delete', $dish->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                        
                                            <input type="submit" value="Cancella Piatto" class="btn btn-danger mt-2">
                                        </form> --}}
                                        {{-- <a class="btn btn-warning mt-2" href="{{route('dish.edit', $dish -> id)}}">Modifica Piatto</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>   
                    </div>
                </div>

    @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, qualcosa è andato storto...</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant -> user_id)}}">Torna al tuo ristorante</a>
        </div>
    @endif  
@endsection