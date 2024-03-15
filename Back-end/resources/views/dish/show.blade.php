@extends('layouts.app')
@section('content')

<style>
  
  body{
    background-color: #ddd
  }
  .container-fluid{
    width: 95%;
    height: 70vh;
    display: flex;
    align-items: center
  }

  h1{
    font-size: 50px;
  }

</style>

<section>
    <h1 class="text-center pt-5 pb-2">{{$dish -> name}}</h1>
    <div class="container-fluid text-center pt-4">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-lg-6 ">
                <img class="card-img-top" src="{{ asset('storage/' . $dish -> image) }}" alt="(descrizione immagine piatto: {{ $dish -> name }})">
            </div>
            <div class="col-md-12 col-lg-6 pt-sm-3 px-lg-0">
                <div class="card-body px-lg-3">
                    <h5 class="py-1"><strong>Descrizione: </h5>
                    <p></strong>{{ $dish -> description }}</p>
                    <span class="d-block py-1"><strong>Prezzo: </strong>{{ $dish -> price }}&euro;</span>
                    <p class="py-1"><strong>Disponibile: </strong>
                        @if($dish -> visible == 1)
                        Si
                        @else
                        No
                        @endif
                    </p>
                </div>
                <div class="row">
                    <div class="btn-container">
                        <a class="btn btn-warning" href="{{route('dish.edit', $dish -> id)}}">Modifica Piatto</a>
                        <form id="deleteDish" class="d-inline" action="{{ route('dish.delete', $dish->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                    
                            <input type="submit" value="Cancella Piatto" class="btn btn-danger mx-sm-3 mx-lg-1 mx-xl-3">
                        </form>
                        <a class="btn btn-primary" href="{{route('restaurant.show', $restaurant -> id)}}">Torna al ristorante</a>
                    {{-- <div class="text-center">
                        <a class="btn btn-primary mt-2" href="{{route('restaurant.show', $restaurant -> id)}}">Torna ai dettagli del ristorante</a>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.getElementById("deleteDish").addEventListener("submit", function(event) {
        const confirmation = confirm("Sei sicuro di voler cancellare questo piatto?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
</script>
@endsection


