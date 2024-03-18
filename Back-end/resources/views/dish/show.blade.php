@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $dish->restaurant->user_id)

        <style>
            h1{
                font-size: 50px;
            }

        </style>

        <section>
            <h1 class="text-center pt-5 pb-2">{{$dish -> name}}</h1>
            <div class="container text-center pt-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-lg-6">
                        <img class="card-img-top shadow-lg" src="{{ asset('storage/' . $dish -> image) }}" alt="(immagine piatto: {{ $dish -> name }})">
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
                        <div class="row">
                            <div class="col-sm-12 col-xl-4">
                                <a class="btn btn-warning" href="{{route('dish.edit', $dish -> id)}}">Modifica Piatto</a>
                            </div>
                            <div class="col-sm-12 col-xl-4 my-sm-3 my-xl-0">
                                <form id="deleteDishForm" class="d-inline" action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Cancella Piatto" class="btn btn-danger">
                                </form>
                                <div class="position" id="deleteConfirmation" style="display: none; margin-top:20px;">
                                    <p class="mt-5 pt-3">Sei sicuro di voler cancellare questo piatto?</p>
                                    <button id="confirmDelete" class="btn btn-danger">Conferma</button>
                                    <button id="cancelDelete" class="btn btn-secondary">Annulla</button>
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-xl-4">
                                <a class="btn btn-primary" href="{{route('restaurant.index', $restaurant -> id)}}">Torna al ristorante</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, qualcosa è andato storto...</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant->id)}}">Torna al tuo ristorante</a>
        </div>
        @endif
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
    
        </style>


        <script>
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