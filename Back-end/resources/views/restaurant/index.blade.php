@extends('layouts.app')

@section('content')

    <div class="text-center">
        @if (!Auth::user()->restaurant)
            <h1>Ciao {{ Auth::user()->name }}!</h1>
            <span class="d-block my-2 fs-3">Crea un ristorante per iniziare</span>
            <a class="btn btn-success mt-2 ms-2" href="{{ route('restaurant.create') }}">Crea un nuovo Ristorante</a>
        @endif
    </div>
    <div class="container border text-center">
        @foreach ($restaurants as $restaurant)

            @if (Auth::user()->id == $restaurant->user_id)

                <div class="row justify-content-between align-items-center pt-5">
                    <div class="col-md-12 col-lg-7">
                        @if($restaurant -> image)
                            <img class="card-img-top shadow" style="height:400px;" src="{{ asset('storage/' . $restaurant -> image) }}" alt="(immagine ristorante {{$restaurant -> name}})">   
                        @else
                            <img class="card-img-top shadow" style="height:400px;" src="{{asset('images/ristodeliveboo.png')}}" alt="immagine ristorante deliveboo">
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <h2 class="text-center d-inline-block">{{$restaurant -> name}}</h2> <a href="{{ route('restaurant.orders')}}" class="btn btn-primary ms-3 mb-2">Vedi Ordini</a>
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
                        <div class="mt-3">
                            <a class="btn btn-warning" href="{{ route('restaurant.edit', $restaurant->id) }}">Modifica Ristorante</a>
                            <a class="btn btn-success"  href="{{route('dish.create')}}">Aggiungi un piatto</a>    
                            <div class="my-3">
                                <form id="deleteRestaurantForm" action="{{ route('restaurant.delete', $restaurant -> id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Elimina Ristorante">
                                </form>
                                <div class="position" id="deleteConfirmation" style="display: none;">
                                    <p class="mt-5 pt-3">Sei sicuro di voler cancellare il tuo ristorante?</p>
                                    <button id="confirmDelete" class="btn btn-danger">Conferma</button>
                                    <button id="cancelDelete" class="btn btn-secondary">Annulla</button>
                                </div>
                            </div>

                          
                        </div>       
                    </div>      
                </div>


                <div class="row mt-5 p-0 m-0">
                    <h2 class="text-center">I tuoi piatti: {{count($restaurant -> dishes)}}</h2>
                    @foreach ($restaurant -> dishes as $dish)
                        <div class="col-sm-12 col-lg-4 col-xl-4 col-xxl-3 mt-4 ">
                            <div class="card mb-sm-5 mb-lg-2">
                                <div class="card-text text-center">
                                    @if ($dish -> image)
                                        <img class="card-img-top" src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto {{$dish -> name}})">
                                    @else
                                        <img class="card-img-top" src="{{asset('images/piattodeliveboo.png')}}" alt="immagine piatto deliveboo">
                                    @endif
                                   
                                    <div class="card-text border-1">
                                        <h5 class="my-3"> {{$dish -> name}}</h5>  
                                    </div>
                                    <a class="btn btn-primary mb-4" href="{{route ('dish.show', $dish -> id) }}">Mostra i dettagli</a>  
                                    <div class="d-flex justify-content-center mb-3">
                                        <a class="btn btn-warning" href="{{route('dish.edit', $dish -> id)}}">Modifica</a>
                                        <div class="col-sm-12 col-xl-4 my-sm-3 my-xl-0">
                                            <form id="deleteDishForm" class="d-inline" action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Cancella" class="btn btn-danger">
                                            </form>
                                            <div class="position" id="deleteConfirmation" style="display: none; margin-top:20px;">
                                                <p class="mt-5 pt-3">Sei sicuro di voler cancellare questo piatto?</p>
                                                <button id="confirmDelete" class="btn btn-danger">Conferma</button>
                                                <button id="cancelDelete" class="btn btn-secondary">Annulla</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>   
        
            @endif

        @endforeach
    </div>

    <style>

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

        .card-img-top{
            height: 200px;
            object-fit: cover
        }

    </style>

    <script>
        // eliminazione ristorante
        document.getElementById("deleteRestaurantForm").addEventListener("submit", function(event) {
            
            event.preventDefault();
          
            document.getElementById("deleteConfirmation").style.display = "block";
        });

        document.getElementById("cancelDelete").addEventListener("click", function() {
            
            document.getElementById("deleteConfirmation").style.display = "none";
        });

        document.getElementById("confirmDelete").addEventListener("click", function() {
          
            document.getElementById("deleteRestaurantForm").submit();
        });

        // eliminazione piatto
        document.getElementById("deleteDishForm").addEventListener("submit", function(event) {
                event.preventDefault();
                document.getElementById("deleteConfirmation").style.display = "block";
        });
    
        document.getElementById("cancelDelete").addEventListener("click", function() {
            
            document.getElementById("deleteConfirmation").style.display = "none";
        });

        document.getElementById("confirmDelete").addEventListener("click", function() {
            
            document.getElementById("deleteDishForm").submit();
        });
    </script>

@endsection