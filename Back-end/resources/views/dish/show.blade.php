@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $dish->restaurant->user_id)

        <section class="container">
            <div class="mb-3 mt-3">
                <a class="btn back" href="{{route('restaurant.index')}}"><i class="fa-solid fa-arrow-left"></i> Torna al Ristorante</a>
            </div>
            <div class="container text-center pt-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-6 mb-4">
                        @if ($dish -> image)
                            <img class="card-img-top" src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto {{$dish -> name}})">
                        @else
                            <img class="card-img-top" src="{{asset('images/piattodeliveboo.png')}}" alt="immagine piatto deliveboo">
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-6 px-lg-0">
                        <div class="card-body px-lg-3 pb-1">
                            <h3 class="text-center pt-3 pb-2 dish-title">{{$dish -> name}}</h3>
                            {{-- <h5 class="py-1"><strong>Descrizione:</h5> --}}
                            <p></strong>{{ $dish -> description }}</p>
                            <span class="d-block py-1">{{ $dish -> price }} &euro;</span>
                            <p class="py-1">
                                @if($dish -> visible == 1)
                                Disponibile
                                @else
                                Non disponibile
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
              
        </section>

        @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, non hai l'autorizzazione per accedere a questa pagina.</h1>
            <a class="btn back" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant->id)}}">Torna al tuo ristorante</a>
        </div>
        @endif
        <style>
            body{
                background-image: url('{{asset('images/bg.png')}}');
                padding-bottom: 30px;
                background-repeat: repeat;
                padding-top: 100px;
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
            .card-img-top{
                border-radius: 20px;
            }
            .card-body{
                background-color: white;
                border-radius: 20px;
                box-shadow: 3px 3px 9px rgba(0, 0, 0, 0.444);
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
            .dish-title{
                font-size: 40px;
                color: #e69c23;
            }

            .btn.back{
                border: 1px solid #e69c23;
            }
            .btn.back:hover{
                background-color: #e69c23;
                color: white;
                transition: all ease-in-out 0.2s;;
            }
            @media all and (max-width:576px){
                .btn.back{
                    border: 1px solid #e69c23;
                    margin-left: 10px;
                }
            }
    
        </style>
@endsection
