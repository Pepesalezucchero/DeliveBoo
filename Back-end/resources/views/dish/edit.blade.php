@extends('layouts.app')
@section('content')

    <style>
        .form-control::placeholder{
            color: black;
        }
    </style>

    @if (Auth::check() && Auth::user()->id === $dish->restaurant->user_id)

        <div class="text-center my-4">
            <h2>Modifica piatto {{$dish -> name}}</h2>
            <a class="btn btn-primary mb-2" href="{{route ('restaurant.index') }}">Torna al ristorante</a>
        </div>

        @if ($errors -> any())
            <div class="alert alert-danger">
                <ul class="list-inline">
                    @foreach ($errors -> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('dish.update', $dish -> id)}}" method="POST" class="container text-center my-3" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="shadow-sm card w-50 mx-auto mt-2">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nome del piatto *</strong></label>
                        <input type="text" required minlength="3" maxlength="40" class="form-control" name="name" placeholder="Inserisci il nome del Piatto" value="{{ $dish -> name }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><strong>Descrizione del piatto *</strong></label>
                        <textarea type="text" name="description" required class="form-control p-3">{{ $dish -> description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label"><strong>Modifica il prezzo del piatto in &euro; *</strong></label>
                        <input type="text" name="price" inputmode="numeric" title="Il campo accetta solo numeri decimali" class="form-control" pattern="[0-9]+(\.[0-9]{1,2})?" placeholder="Inserisci il prezzo del Piatto" required value="{{ $dish->price }}">
                    </div>

                <div class="row mb-3">
                    <h5>Disponibile *</h5>
                    <div class="d-flex justify-content-center">
                        <input class="me-1" type="radio" name="visible" id="visible_yes" value="1" {{ $dish->visible == 1 ? 'checked' : '' }}>
                        <label class="me-4" for="visible_yes">Si</label>
                
                        <input class="me-1" type="radio" name="visible" id="visible_no" value="0" {{ $dish->visible == 0 ? 'checked' : '' }}> 
                        <label for="visible_no">No</label>
                    </div>
                </div>
                
            </div>

                    {{-- <div class="mb-3">
                        <label for="visible" class="form-label"><strong>Modifica la disponibilità del piatto</strong></label>
                        <select name="visible" id="visible" class="form-control">
                            <option value="1" selected>Si</option>
                            <option value="0">No</option>
                        </select>
                    </div> --}}
                    
                <div class="mb-3 mx-3">
                    <label for="image" class="form-label"><strong>Modifica l'immagine del tuo piatto</strong></label>
                    <input type="file" class="form-control" name="image"placeholder="Scegli un file" accept="image/png, image/jpeg">
                </div>
            
                <div class="py-3">     
                    <input class="my-1 btn btn-warning mt-4" type="submit"value="Salva">
                </div>
                <div class="text-end mb-2 me-2">
                    <em>* campo richiesto</em>
                </div>
            </div>
        </form>

    @else()
        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, non hai l'autorizzazione per accedere a questa pagina.</h1>
            <a class="btn btn-primary" href="{{route('restaurant.show', Auth :: user() -> id === $restaurant->id)}}">Torna al tuo ristorante</a>
        </div>
    @endif

@endsection