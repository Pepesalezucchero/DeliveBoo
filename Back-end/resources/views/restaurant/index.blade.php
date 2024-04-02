@extends('layouts.app')

@section('content')
    <section>
    <div class="text-center mt-5">
        @if (!Auth::user()->restaurant)
            <h1>Ciao {{ Auth::user()->name }}!</h1>
            <span class="d-block my-2 fs-3">Aggiungi un ristorante per iniziare</span>
            <a class="btn btn-success mt-2 ms-2" href="{{ route('restaurant.create') }}">Aggiungi un Ristorante</a>
        @endif
    </div>
    <div class="container text-center">
        @foreach ($restaurants as $restaurant)

            @if (Auth::user()->id == $restaurant->user_id)

                <div class="row justify-content-between align-items-center pt-5">
                    <div class="col-md-12 col-lg-7">
                        @if($restaurant->image)
                            <img class="card-img-top shadow" style="height:400px;" src="{{ asset('storage/' . $restaurant->image) }}" alt="(immagine ristorante {{$restaurant->name}})">   
                        @else
                            <img class="card-img-top shadow" style="height:400px;" src="{{asset('images/ristodeliveboo.png')}}" alt="immagine ristorante deliveboo">
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <h2 class="text-center d-inline-block rest-title">{{$restaurant->name}}</h2> <a href="{{ route('restaurant.orders')}}" class="btn btn-secondary ms-3 mb-2"><i class="fa-solid fa-clipboard-list"></i></a>
                        <h6 class="card-text"><strong>Indirizzo: </strong>{{$restaurant->address}}</h6>
                        <h6 class="card-text my-4"><strong>Partita IVA: </strong>{{$restaurant->vat_number}}</h6>
                        <div class="typology d-flex justify-content-center">
                            @foreach ($restaurant->typologies as $typology)
                                <div>
                                    <h6 class="mx-1">#{{$typology->name}}</h6>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3">
                            <div class="row justify-content-center">
                                <div class="col-1">
                                    <a class="btn btn-warning" href="{{ route('restaurant.edit', $restaurant->id) }}"><i class="fa-solid fa-pen"></i></a>
                                </div>
                                <div class="col-1 mx-4">
                                    <form id="deleteRestaurantForm" action="{{ route('restaurant.delete', $restaurant->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn text-white" style="background: red; cursor: pointer;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                    <div class="position py-4" id="deleteRestaurantConfirmation" style="display: none;">
                                        <p class=" py-2 text-white">Sei sicuro di voler cancellare il tuo ristorante?</p>
                                        <button id="confirmDeleteRestaurant" class="btn btn-danger">Conferma</button>
                                        <button id="cancelDeleteRestaurant" class="btn btn-secondary">Annulla</button>
                                    </div>
                                </div>
                                <div class="col-1 ">
                                    <a class="btn btn-success" href="{{route('dish.create')}}"><i class="fa-solid fa-plus"></i></a>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>      
                </div>

                <div class="row mt-5 p-0 m-0 text-center">
                    <h2 class="text-center mb-4">I tuoi piatti: {{count($restaurant->dishes)}}</h2>
                    <table class="table">
                        <colgroup>
                            <col class="col-md-2">
                            <col class="col-6 col-md-2">
                            <col class="col-3 col-md-1">
                            <col class="col-3 col-md-2">
                            <col class="col-5 col-md-4">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col" class="d-none d-md-block">Immagine</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Disponibilità</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurant->dishes->sortBy('name') as $dish)
                                <tr class="align-middle">
                                    <td class="d-none d-md-table-cell">
                                        @if ($dish->image)
                                            <img class="my-2 rounded-circle" src="{{asset('storage/' . $dish -> image)}}" alt="immagine piatto" 
                                            style="
                                            width: 120px;
                                            height: 120px;
                                            object-fit: cover;
                                            object-position: center;
                                        ">
                                        @else
                                            <img class="my-2 rounded-circle" style="width: 100px" src="{{asset('images/piattodeliveboo.png')}}" alt="immagine piatto"
                                            style="
                                            width: 120px;
                                            height: 120px;
                                            object-fit: cover;
                                            object-position: center;
                                        ">
                                        @endif
                                    </td>
                                    <td >
                                        <p class="my-5">{{$dish->name}}</p>
                                    </td>
                                    <td>
                                        @if($dish->visible)
                                            <p class="text-success my-5">&#11044;</p>
                                        @else
                                            <p class="text-danger my-5">&#11044;</p>
                                        @endif
                                    </td>
                                    <td><p class="my-5">{{$dish->price}} &euro;</p></td>
                                    <td>
                                        <a class="btn btn-primary my-4" style="padding: 6px 20px" href="{{route ('dish.show', $dish->id) }}"><i class="fa-solid fa-eye"></i></a>  
                                        
                                        <a class="btn btn-warning mx-2 my-4" href="{{route('dish.edit', $dish->id)}}"><i class="fa-solid fa-pen"></i></a>
                                        <form id="deleteDishForm" class="d-inline" action="{{ route('dish.delete', $dish->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-white my-4" style=" background: red; cursor: pointer;">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="position py-4" id="deleteDishConfirmation" style="display: none;">
                            <p class="py-2 text-white">Sei sicuro di voler cancellare il piatto?</p>
                            <button id="confirmDeleteDish" class="btn btn-danger">Conferma</button>
                            <button id="cancelDeleteDish" class="btn btn-secondary">Annulla</button>
                        </div>
                        
                </div>   
        
            @endif

        @endforeach
    </div>
</section>
    <style scoped>
        body{
            background-image: url('{{asset('images/bg.png')}}');
            padding-bottom: 30px;
            background-repeat: repeat;
            /* background-size: cover; */
            padding-top: 80px;
        }
        .rest-title{
            font-size: 50px;
            font-weight: bold;
            color: #e69c23;
        }

        @media all and (max-width:992px){
            .rest-title{
                color: black;
            }
        }
        .rounded-circle{
            width: 150px;
        }
        .position{
            top: 0;
            right: 0;
            z-index: 50;
            position: fixed;
            width: 100%;
            padding-bottom: 10px;
            display: flex;
            align-items:center;
            background-color: #01516a;
            animation: slide-in 0.5s linear;
        }
        @keyframes slide-in{
            from{
                opacity: 0;
               
            }

            to{
                opacity: 1;
               
            }
        }
        .card-img-top{
            height: 200px;
            object-fit: cover;
            border-radius: 20px;
        }

    </style>

    <script>
            document.getElementById("deleteRestaurantForm").addEventListener("submit", function(event) {
                event.preventDefault();
                document.getElementById("deleteRestaurantConfirmation").style.display = "block";
            });

            document.getElementById("cancelDeleteRestaurant").addEventListener("click", function() {
                document.getElementById("deleteRestaurantConfirmation").style.display = "none";
            });

            document.getElementById("confirmDeleteRestaurant").addEventListener("click", function() {
                document.getElementById("deleteRestaurantForm").submit(); // Correggi l'id qui
            });


            // eliminazione piatto
            document.getElementById("deleteDishForm").addEventListener("submit", function(event) {
                event.preventDefault();
                document.getElementById("deleteDishConfirmation").style.display = "block";
            });

            document.getElementById("cancelDeleteDish").addEventListener("click", function() {
                document.getElementById("deleteDishConfirmation").style.display = "none";
            });

            document.getElementById("confirmDeleteDish").addEventListener("click", function() {
                document.getElementById("deleteDishForm").submit();
            });
    </script>
@endsection
