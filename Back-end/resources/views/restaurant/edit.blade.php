@extends('layouts.app')
@section('content')

    @if (Auth::check() && Auth::user()->id === $restaurant->user_id)

        {{-- <div class="text-center my-4">
            <h1>Modifica Ristorante {{$restaurant -> name}}</h1>
            <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai Ristoranti</a>
        </div> --}}

        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul class="list-inline">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('restaurant.update', $restaurant -> id)}}" method="POST" class="container text-center" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="shadow-sm card w-50 mx-auto my-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nome ristorante *</strong></label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci Nome Ristorante"  value="{{ $restaurant -> name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Indirizzo del tuo ristorante *</strong></label>
                        <input type="text"  class="form-control" name="address" placeholder="inserisci l'indirizzo del tuo ristorante" required value="{{ $restaurant -> address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="vat_number" class="form-label"><strong>Inserisci la partita IVA *</strong></label>
                        <input type="text" inputmode="numeric" minlength="11" maxlength="11" pattern="[0-9]+(\.[0-9]{1,2})?" class="form-control" title="only numbers will be accepted" name="vat_number" placeholder="Inserisci la tua partita IVA" value="{{ $restaurant -> vat_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Modifica l'immagine del tuo ristorante *</strong></label>
                        <input type="file" class="form-control" name="image" placeholder="Scegli un file" value="{{ $restaurant -> image }}" accept="image/*">
                    </div>
                    <h3 class="mt-3 mb-2">Tipologie:</h3>
                    @foreach ($typologies as $typology)
                        <div>
                            <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}" value="{{$typology -> name}}"

                                @foreach ($restaurant -> typologies as $typologyTag)
                                    @if ($typologyTag -> id == $typology -> id)
                                        checked
                                    @endif
                                @endforeach

                            >
                            <label for="typology{{ $typology -> id}}">{{ $typology -> name }}</label>
                        </div>
                    @endforeach
                    <div class="row justify-content-around pt-4">
                        <div class="col-sm-12 col-xl-4 w-100">
                            <input class="btn btn-warning " type="submit" value="Modifica">
                        </div>

                        <div class="col-sm-12 col-xl-4  mt-sm-3  my-xl-4">
                            <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai Ristoranti</a>
                        </div>
                    </div>
                </div>
                <div class="text-end m-2">
                    <em>* campo obbligatorio</em>
                </div>
            </div>
        </form>
            


    @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, qualcosa è andato storto...</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth::user()->id === $restaurant->user_id)}}">Torna al tuo ristorante</a>
        </div>
    @endif

@endsection
