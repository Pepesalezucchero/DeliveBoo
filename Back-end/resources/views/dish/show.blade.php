@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $dish->restaurant->user_id)

        <section>
            <h2 class="text-center pt-5 pb-2">{{$dish -> name}}</h2>
            <div class="container text-center pt-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-6">
                        @if ($dish -> image)
                            <img style="width: 300px" class="card-img-top" src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto {{$dish -> name}})">
                        @else
                            <img style="width: 300px" class="card-img-top" src="{{asset('images/piattodeliveboo.png')}}" alt="immagine piatto deliveboo">
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-6 pt-sm-3 px-lg-0">
                        <div class="card-body px-lg-3">
                            <h3 class="text-center pt-5 pb-2">{{$dish -> name}}</h3>
                            <h5 class="py-1"><strong>Descrizione:</h5>
                            <p></strong>{{ $dish -> description }}</p>
                            <span class="d-block py-1"><strong>Prezzo: </strong>{{ $dish -> price }} &euro;</span>
                            <p class="py-1"><strong>Disponibile: </strong>
                                @if($dish -> visible == 1)
                                Si
                                @else
                                No
                                @endif
                            </p>
                        </div>

                        <a class="btn btn-primary" href="{{route('restaurant.index', $restaurant -> id)}}">Torna al ristorante</a>
                    </div>
                </div>
            </div>
              
        </section>

        @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, non hai l'autorizzazione per accedere a questa pagina.</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant->id)}}">Torna al tuo ristorante</a>
        </div>
        @endif
        <style>
            body{
                background-image: url('{{asset('images/bg.png')}}');
                padding-bottom: 30px;
                background-repeat: no-repeat;
                background-size: cover;
                height: 100vh;
            }
            .position{
                top: 25%;
                right: 0;
                position: absolute;
                width: 100%;
                height: 200px;
                border: 1px solid black;
                background-color: #ddd;
                animation: slide-in 0.5s linear;
            }
    
            @keyframes slide-in{
                from{
                    opacity: 0;
                    top:40%;
                }
    
                to{
                    opacity: 1;
                    top: 25%;
                }
            }
            h2{
                font-size: 40px;
                color: #e69c23;
            }
    
        </style>
@endsection
