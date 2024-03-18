@extends('layouts.app')
@section('content')

    @if($hasRestaurant)

        <div class="container text-center mt-3">
            <h1 class="my-2">Ops, qualcosa è andato storto...</h1>
            <a class="btn btn-primary" href="{{ route('restaurant.index') }}">Torna al tuo ristorante</a>
        </div>

    @else

        <div class="text-center my-4">
            <h1>Nuovo Ristorante</h1>
            <a class="btn btn-primary" href="{{route('restaurant.index')}}">Torna ai Ristoranti</a>
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

        <form action="{{route('restaurant.store')}}" method="POST" class="container text-center" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="shadow-sm card w-50 mx-auto mt-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label"><strong>Nome Ristorante</strong> *</label>
                        <input type="text" class="form-control" name="name" placeholder="Inserisci Nome Ristorante" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><strong>Indirizzo del tuo ristorante</strong> *</label>
                        <input type="text" class="form-control" name="address" placeholder="inserisci l'indirizzo del tuo ristorante" required>
                    </div>
                    <div class="mb-3">
                        <label for="vat_number" placeholder="*" class="form-label"><strong>Inserisci la partita IVA</strong> *</label>
                        <input type="text" minlength="11" maxlength="11" name="vat_number" inputmode="numeric" placeholder="Inserisci la tua partita IVA" pattern="[0-9]+(\.[0-9]{1,2})?" title="only numbers will be accepted" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label"><strong>Inserisci l'immagine del tuo Ristorante</strong></label>
                        <input type="file" class="form-control" name="image" placeholder="Scegli un file" accept="image/*">
                    </div>
                    <div class="text-center">
                        <h3 class="mt-3 mb-2">Tipologie:</h3>
                        @foreach ($typologies as $typology)
                            <div>
                                <input type="checkbox" name="typologies[]" value="{{ $typology -> id }}" required>
                                <label for="tag{{ $typology -> id}}">{{ $typology -> name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="py-3">
                    <input class="btn btn-success w-25" type="submit" value="CREA">
                </div>
                <div class="text-end mb-2 me-2">
                    <em>* campo richiesto</em>
                </div>
            </div>
        </form>

    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="typologies[]"]');
            const submitButton = document.querySelector('button[type="submit"]');
    
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"][name="typologies[]"]:checked');
                    if (checkedCheckboxes.length > 0) {
                        checkboxes.forEach(function(checkbox) {
                            checkbox.removeAttribute("required");
                        });
                    } else {
                        checkboxes.forEach(function(checkbox) {
                            checkbox.setAttribute("required", "");
                        });
                    }
                });
            });
        });
    </script>

@endsection